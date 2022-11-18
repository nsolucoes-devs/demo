<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relatorios extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('configuracaomodel');

        $this->load->model('estoquemodel');
        $this->load->model('cadastrosmodel');
        $this->load->model('clientesmodel');
        $this->load->model('produtosmodel');
        $this->load->model('usuariosmodel');
        $this->load->model('financeiromodel');
        $this->load->model('frotamodel');
        $this->load->model('manutencaomodel');
        $this->load->model('fornecedoresmodel');
        $this->load->model('ativos_model', 'ativos');
    }
    private function header_simples()
    {
        $this->load->view('recursos/headerSimples');
    }
    private function footer_simples()
    {
        $this->load->view('recursos/footerSimples');
    }
    private function apagar($valor, $porcento, $dias = null, $multa = null)
    {
        if ($dias == null) {
            $valor = $valor - ($valor * ($porcento / 100));
        } else {
            $valor = $valor + ($valor * ($multa / 100)) + ($dias * ($valor * ($porcento / 100)));
        }
        return $this->Money($valor);
    }
    private function atraso($valor)
    {
        $data = strtotime(date('Y-m-d'));
        $diferenca = ($data - strtotime($valor)) / 86400;
        return $diferenca;
    }
    private function Money($valor)
    {
        $valor = number_format($valor, 4, ",", ".");
        return $valor;
    }

    public function pdfnota()
    {

        $id = $this->uri->segment(2);

        $nota = $this->estoquemodel->getNotaUnica($id);
        $nota['notafiscal_operacao'] = $this->estoquemodel->getTipoUnico($nota['notafiscal_operacao']);
        $nota['notafiscal_cnpjtrans'] = $this->mask($nota['notafiscal_cnpjtrans'], "##.###.###/####-##");
        $estoques = $this->estoquemodel->getEstoquesByNota($nota['notafiscal_id']);

        if ($nota['notafiscal_fornecedor'] != 0) {
            $nota['notafiscal_fornecedor'] = $this->cadastrosmodel->getFornCnpj($nota['notafiscal_fornecedor']);
        }

        $cont = 0;
        $newArr = [];
        foreach ($estoques as $est) {
            $newArr[$cont] = $est;
            $newArr[$cont]['estoque_produto'] = $this->produtosmodel->getByIdRowArray($est['estoque_produto_id']);
            $newArr[$cont]['estoque_produto']['produto_fornecedor'] = $this->cadastrosmodel->getFornCnpj($newArr[$cont]['estoque_produto']['produto_fornecedor_cnpj']);
            $newArr[$cont]['estoque_usuario'] = $this->usuariosmodel->getByID($est['estoque_usuario']);

            $cont++;
        }

        $data = array(
            'nota'      => $nota,
            'estoques'  => $newArr,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfnota', $data);
        $this->footer_simples();
    }

    public function pdfmovimentos()
    {

        $filtros = array(
            'peca'  => $this->input->post('filtro_peca'),
            'forn'  => $this->input->post('filtro_forn'),
            'de'    => strtotime($this->input->post('filtro_de')),
            'ate'   => strtotime($this->input->post('filtro_ate')),
        );

        $movimentos = $this->estoquemodel->getNotasFilter($filtros);
        $newM = [];
        $i = 0;
        $total = 0;
        foreach ($movimentos as $mov) {
            $newE = [];
            $j = 0;
            foreach ($mov['estoque'] as $est) {
                $est['produto'] = $this->produtosmodel->getByIdRowArray($est['estoque_produto_id']);
                $newE[$j] = $est;
                $j++;
            }
            $mov['estoque'] = $newE;
            $mov['fornecedor'] = $this->cadastrosmodel->getFornCnpj($mov['notafiscal_fornecedor']);
            $mov['notafiscal_operacao'] = $this->estoquemodel->getTipoUnico($mov['notafiscal_operacao']);
            $newM[$i] = $mov;
            $total = (float) $total + (float) $mov['notafiscal_valorfinal'];
            $i++;
        }

        if ($filtros['de'] != "") {
            $filtros['de'] = date('d/m/Y', strtotime($this->input->post('filtro_de')));
        }
        if ($filtros['ate'] != "") {
            $filtros['ate'] = date('d/m/Y', strtotime($this->input->post('filtro_ate')));
        }
        if ($filtros['peca'] != "") {
            $filtros['peca'] = $this->produtosmodel->getByIdRowArray($filtros['peca']);
        }
        if ($filtros['forn'] != "") {
            $filtros['forn'] = $this->cadastrosmodel->getFornCnpj($filtros['forn']);
        }

        $data = array(
            'movimentos'    => $newM,
            'filtros'       => $filtros,
            'total'         => $total,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfmovimentos', $data);
        $this->footer_simples();
    }

    public function pdftitulo()
    {
        $id = $this->uri->segment(2);

        $titulo = $this->financeiromodel->getTitulo($id);
        if ($titulo['titulos_frota'] != null) {
            $titulo['titulos_frota'] = $this->frotamodel->getRowById($titulo['titulos_frota']);
        }
        if ($titulo['titulos_baixa'] != 1) {
            $dt = strtotime(date('Y-m-d'));
            $data['atraso'] = ($dt - strtotime($titulo['titulos_vencimento'])) / 86400;
        } else {
            $data['atraso'] = null;
        }

        $titulo['titulos_vencimento'] = date('d/m/Y', strtotime($titulo['titulos_vencimento']));
        if ($titulo['titulos_forneclin'] != "0" && $titulo['titulos_forneclin'] != null) {
            $fc = substr($titulo['titulos_forneclin'], 0, 1);
            $cpfcnpj = substr($titulo['titulos_forneclin'], 2);

            if ($fc == "C") {
                $f_c = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
                $f_c = $f_c['cliente_nome'];
            } else if ($fc == "F") {
                $f_c = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
                $f_c = $f_c['fornecedor_nome'];
            } else if ($fc == 0 || $fc == '0') {
                $f_c = null;
            }

            $titulo['titulos_forneclin'] = $f_c;
        }

        if ($titulo['titulos_user_baixa'] != null) {
            $titulo['titulos_responsavel'] = $this->usuariosmodel->getByID($titulo['titulos_user_baixa']);
        } else {
            $titulo['titulos_responsavel'] = null;
        }

        $titulo['titulos_tipo'] = $this->estoquemodel->getTipoUnico($titulo['titulos_tipo']);

        $data['titulo'] = $titulo;

        $this->header_simples();
        $this->load->view('relatorios/pdftitulo', $data);
        $this->footer_simples();
    }

    public function pdftitulos()
    {


        $filtros = array(
            'tipo'  => $this->input->post('tipo'),
            'baixa' => $this->input->post('baixa'),
        );

        if ($this->input->post('de') != "") {
            $filtros['de'] = strtotime($this->input->post('de'));
        } else {
            $filtros['de'] = null;
        }
        if ($this->input->post('ate') != "") {
            $filtros['ate'] = strtotime($this->input->post('ate'));
        } else {
            $filtros['ate'] = null;
        }

        $titulos = $this->financeiromodel->getTitulosFilter($filtros);
        $newT = [];
        $i = 0;
        $totalPago = 0;

        foreach ($titulos as $ttl) {
            $ttl['data'] = date('d/m/Y', strtotime($ttl['titulos_vencimento']));

            if ($ttl['titulos_baixa'] == 1 || $ttl['titulos_baixa'] == "1") {
                $ttl['baixa'] = "Baixado";
                $totalPago = (float)$totalPago + (float)$ttl['titulos_valorpago'];
            } else {
                $ttl['baixa'] = "Aberto";
            }

            $aux = explode('|', $ttl['titulos_forneclin']);

            if ($aux[0] == 'C') {
                $c              = $this->clientesmodel->getCPFCNPJ($aux[1]);
                $forneclin_nome = $c['cliente_nome'];
            } else {
                $f              = $this->fornecedoresmodel->getByIdRowArray($aux[1]);
                $forneclin_nome = $f['fornecedor_nome'];
            }

            $ttl['tomador']     = ucwords(mb_strtolower($forneclin_nome));
            $ttl['especie']     = ucwords(mb_strtolower($this->estoquemodel->getTipoUnicoNome($ttl['titulos_tipo'])));
            $ttl['tipo']        = ucwords(mb_strtolower($this->estoquemodel->getTipo($ttl['titulos_tipo'])));
            $newT[$i]           = $ttl;
            $i++;
        }

        if ($filtros['baixa'] == 1 || $filtros['baixa'] == '1') {
            $newF['baixa'] = "FECHADOS";
        } else if ($filtros['baixa'] == 0 || $filtros['baixa'] == '0') {
            $newF['baixa'] = "ABERTOS";
        } else {
            $newF['baixa'] = "";
        }

        $newF['tipo'] = $this->estoquemodel->getTipoUnicoNome($filtros['tipo']);

        if ($this->input->post('de') != "") {
            $newF['de'] = date('d/m/Y', strtotime($this->input->post('de')));
        } else {
            $newF['de'] = null;
        }

        if ($this->input->post('ate') != "") {
            $newF['ate'] = date('d/m/Y', strtotime($this->input->post('ate')));
        } else {
            $newF['ate'] = null;
        }

        $data = array(
            'filtros'   => $newF,
            'banner'    => $this->configuracaomodel->banner(),
            'total'     => $totalPago,
            'titulos'   => $newT,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdftitulos', $data);
        $this->footer_simples();
    }

    public function pdfdredetalhado()
    {

        if ($this->input->post('inicio') != "") {
            $filtros['de'] = $this->input->post('inicio');
        } else {
            $filtros['de'] = null;
        }
        if ($this->input->post('final') != "") {
            $filtros['ate'] = $this->input->post('final');
        } else {
            $filtros['ate'] = null;
        }

        $titulos = $this->financeiromodel->getTitulosDRE($filtros);

        $ie = $is = $totalE = $totalS = 0;
        $newE = $newS = [];
        foreach ($titulos as $ttl) {
            if ($ttl['titulos_forneclin'] != "0" && $ttl['titulos_forneclin'] != null) {
                $fc = substr($ttl['titulos_forneclin'], 0, 1);
                $cpfcnpj = substr($ttl['titulos_forneclin'], 2);

                if ($fc == "C") {
                    $f_c = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
                    $f_c = $f_c['cliente_nome'];
                } else if ($fc == "F") {
                    $f_c = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
                    $f_c = $f_c['fornecedor_nome'];
                } else if ($fc == 0 || $fc == '0') {
                    $f_c = "NAO POSSUI";
                }
            } else {
                $f_c = "NAO POSSUI";
            }

            $ttl['forneclin'] = ucwords(mb_strtolower($f_c));
            $ttl['valor'] = $this->Money($ttl['titulos_valorpago']);
            $ttl['data'] = date('d/m/Y', strtotime($ttl['titulos_vencimento']));

            if ($ttl['titulos_IO'] == "ENTRADA") {
                $totalE = (float)$totalE + (float)$ttl['titulos_valorpago'];
                $newE[$ie] = $ttl;
                $ie++;
            } else if ($ttl['titulos_IO'] == "SAIDA") {
                $totalS = (float)$totalS + (float)$ttl['titulos_valorpago'];
                $newS[$is] = $ttl;
                $is++;
            }
        }

        if ($this->input->post('inicio') != "") {
            $newF['de'] = date('d/m/Y', strtotime($this->input->post('inicio')));
        } else {
            $newF['de'] = null;
        }
        if ($this->input->post('final') != "") {
            $newF['ate'] = date('d/m/Y', strtotime($this->input->post('final')));
        } else {
            $newF['ate'] = null;
        }

        $total = (float)$totalE - (float)$totalS;

        $data = array(
            'filtros'   => $newF,
            'banner'    => $this->configuracaomodel->banner(),
            'entradas'  => $newE,
            'saidas'    => $newS,
            'totalE'    => "R$ " . $this->Money($totalE),
            'totalS'    => "R$ " . $this->Money($totalS),
            'total'     => number_format($total, 4, ',', '.'),
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfdredetalhado', $data);
        $this->footer_simples();
    }

    public function pdfdresintetico()
    {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

        $filtros = array(
            'inicio' => $this->input->post('inicio2') . "-01",
            'final'  => date('Y-m-t', strtotime($this->input->post('final2'))),
        );

        $titulos = $this->financeiromodel->getTitulosSinteticoDRE($filtros);

        if (substr($this->input->post('inicio2'), 5) == "03") {
            $i_aux = "MAR&Ccedil;O";
        } else {
            $i_aux = mb_strtoupper(strftime('%B', strtotime($this->input->post('inicio2')))) . " DE " . substr($this->input->post('inicio2'), 0, 4);
        }

        if (substr($this->input->post('final2'), 5) == "03") {
            $f_aux = "MAR&Ccedil;O";
        } else {
            $f_aux = mb_strtoupper(strftime('%B', strtotime($this->input->post('final2')))) . " DE " . substr($this->input->post('final2'), 0, 4);
        }

        $newFiltros = array(
            'inicio' => $i_aux,
            'final'  => $f_aux,
        );

        $meses = [];
        $totalDRE = 0;
        foreach ($titulos as $ttl) {
            $ex = explode('-', $ttl['titulos_vencimento']);
            if (array_key_exists($ex[0] . $ex[1], $meses)) {
                if ($ttl['titulos_IO'] == "ENTRADA") {
                    $meses[$ex[0] . $ex[1]]['totalE'] = (float)$meses[$ex[0] . $ex[1]]['totalE'] + (float)$ttl['titulos_valorpago'];
                } else if ($ttl['titulos_IO'] == "SAIDA") {
                    $meses[$ex[0] . $ex[1]]['totalS'] = (float)$meses[$ex[0] . $ex[1]]['totalS'] + (float)$ttl['titulos_valorpago'];
                }
            } else {
                $e = $s = 0;
                if ($ttl['titulos_IO'] == "ENTRADA") {
                    $e = (float)$ttl['titulos_valorpago'];
                } else if ($ttl['titulos_IO'] == "SAIDA") {
                    $s = (float)$ttl['titulos_valorpago'];
                }
                if ($ex[1] == "03") {
                    $m_aux = "MAR&Ccedil;O";
                } else {
                    $m_aux = mb_strtoupper(strftime('%B', strtotime($ex[0] . "-" . $ex[1])));
                }

                $meses[$ex[0] . $ex[1]] = array(
                    'mes'       => $m_aux,
                    'n_mes'     => $ex[1],
                    'ano'       => $ex[0],
                    'totalE'    => $e,
                    'totalS'    => $s,
                );
            }

            $meses[$ex[0] . $ex[1]]['resultado'] = (float)$meses[$ex[0] . $ex[1]]['totalE'] - (float)$meses[$ex[0] . $ex[1]]['totalS'];
        }

        foreach ($meses as $m) {
            $totalDRE = (float)$totalDRE + (float)$m['resultado'];
        }

        $data = array(
            'banner'    => $this->configuracaomodel->banner(),
            'meses'     => $meses,
            'filtros'   => $newFiltros,
            'totalDRE'  => $totalDRE,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfdresintetico', $data);
        $this->footer_simples();
    }

    public function pdfveiculo()
    {
        $id = $this->input->post('id_filtro');
        $filtros = array(
            'tipo'      => $this->input->post('tipo_manu'),
            'inicio'    => strtotime($this->input->post('dt_inicio')),
            'final'     => strtotime($this->input->post('dt_fim')),
        );

        $veiculo = $this->frotamodel->getByIDRowArray($id);
        $modelo = $this->frotamodel->getModeloByIdRowArray($veiculo['frota_modelo_id']);
        $totalGeral = 0;

        $manutencao = $this->manutencaomodel->getByFrotaFilter($id, $filtros);

        $newM = [];
        $m = 0;
        foreach ($manutencao as $manu) {
            $andamentos = $this->manutencaomodel->getAndamentosByManu($manu['os_id']);
            $total = 0;
            foreach ($andamentos as $and) {
                $itens = $this->manutencaomodel->getItensAndamento($and['andamento_id']);
                foreach ($itens as $it) {
                    $aux = (int)$it['ai_qtd'] * (float)$it['ai_vlr_un'];
                    $total = (float)$total + (float)$aux;
                }
            }
            $manu['total'] = $total;
            $totalGeral = (float)$totalGeral + (float)$total;
            $newM[$m] = $manu;
            $m++;
        }

        $titulos = $this->financeiromodel->getTitulosByFrotaSaidaFilter($id, $filtros);

        $newT = [];
        $t = 0;
        foreach ($titulos as $tit) {
            $aux_frota  = explode('¬', $tit['titulos_frota']);
            $aux_rateio = explode('¬', $tit['titulos_rateio']);

            $valor = 0;

            for ($i = 0; $i < count($aux_frota); $i++) {
                if ($aux_frota[$i] == $id) {
                    if ($aux_rateio[$i] != null) {
                        $valor = $aux_rateio[$i];
                    }
                }
            }

            $tit['titulos_tipo'] = $this->estoquemodel->getTipoUnico($tit['titulos_tipo']);
            $tit['titulos_vencimento'] = date('d/m/Y', strtotime($tit['titulos_vencimento']));
            if ($tit['titulos_forneclin'] != "0" && $tit['titulos_forneclin'] != null) {
                $tip = substr($tit['titulos_forneclin'], 0, 1);
                $cpfcnpj = substr($tit['titulos_forneclin'], 2);
                if ($tip == "F") {
                    $tit['forne'] = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
                    $tit['cli'] = null;
                } else if ($tip == "C") {
                    $tit['cli'] = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
                    $tit['forne'] = null;
                }
            } else {
                $tit['cli'] = null;
                $tit['forne'] = null;
            }
            $tit['titulos_valor'] = $valor;

            $newT[$t] = $tit;

            $totalGeral = (float)$totalGeral + (float)$valor;
            $t++;
        }

        $data = array(
            'veiculo'       => $veiculo,
            'modelo'        => $modelo,
            'marca'         => $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']),
            'cabine'        => $this->frotamodel->getTipoGabineByIdRowArray($veiculo['frota_tipogabine_id']),
            'munck'         => $this->frotamodel->getTipoMunckByIdRowArray($veiculo['frota_tipomunck_id']),
            'linha'         => $this->frotamodel->getLinhaByIdRowArray($veiculo['frota_linha_id']),
            'status'        => $this->frotamodel->getStatusByIdRowArray($veiculo['frota_status_id']),
            'manutencao'    => $newM,
            'situacao'      => $this->manutencaomodel->getAllSituacao(),
            'banner'        => $this->configuracaomodel->banner(),
            'titulos'       => $newT,
            'total'         => number_format($totalGeral, 4, ',', '.'),
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfveiculo', $data);
        $this->footer_simples();
    }

    public function pdfveiculos()
    {
        $filtros = array(
            'status'    => $this->input->post('status'),
            'marca'     => $this->input->post('marca'),
        );

        $frotas = $this->frotamodel->getFrotasFiltered($filtros);
        $veiculos[] = 0;
        $cont = 0;
        foreach ($frotas as $frota) {
            $modelo = $this->frotamodel->getModeloByIdRowArray($frota['frota_modelo_id']);
            if ($filtros['marca'] != "" && $filtros['marca'] != null) {
                if ($modelo['frota_modelo_marca_id'] == $filtros['marca']) {
                    $marca = $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']);
                    $cabine = $this->frotamodel->getTipoGabineByIdRowArray($frota['frota_tipogabine_id']);
                    $munck = $this->frotamodel->getTipoMunckByIdRowArray($frota['frota_tipomunck_id']);
                    $status = $this->frotamodel->getStatusByIdRowArray($frota['frota_status_id']);
                    $veiculos[$cont] = array(
                        'nome'      => $marca['frota_marca_nome'] . ' ' . $modelo['frota_modelo_nome'] . ' - ' . $cabine['frota_tipogabine_nome'] . ' - ' . $munck['frota_tipomunck_nome'],
                        'placa'     => $frota['frota_placa'],
                        'frota'     => $frota['frota_codigo'],
                        'km'        => $frota['frota_km'],
                        'status'    => $status['frota_status_nome'],
                    );
                    $cont++;
                }
            } else {
                $marca = $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']);
                $cabine = $this->frotamodel->getTipoGabineByIdRowArray($frota['frota_tipogabine_id']);
                $munck = $this->frotamodel->getTipoMunckByIdRowArray($frota['frota_tipomunck_id']);
                $status = $this->frotamodel->getStatusByIdRowArray($frota['frota_status_id']);
                $veiculos[$cont] = array(
                    'nome'      => $marca['frota_marca_nome'] . ' ' . $modelo['frota_modelo_nome'] . ' - ' . $cabine['frota_tipogabine_nome'] . ' - ' . $munck['frota_tipomunck_nome'],
                    'placa'     => $frota['frota_placa'],
                    'frota'     => $frota['frota_codigo'],
                    'km'        => $frota['frota_km'],
                    'status'    => $status['frota_status_nome'],
                );
                $cont++;
            }
        }

        if ($filtros['marca'] != null && $filtros['marca'] != "") {
            $filtros['marca'] = $this->frotamodel->getMarcaByIdRowArray($filtros['marca']);
        } else {
            $filtros['marca'] = "";
        }

        if ($filtros['status'] != null && $filtros['status'] != "") {
            $filtros['status'] = $this->frotamodel->getStatusByIdRowArray($filtros['status']);
        } else {
            $filtros['status'] = "";
        }

        $data = array(
            'veiculos'  => $veiculos,
            'filtros'   => $filtros,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfveiculos', $data);
        $this->footer_simples();
    }

    public function pdfmanutencao()
    {
        $os_id = $this->uri->segment(2);

        $data = array(
            'os'                => $this->manutencaomodel->getUnico($os_id),
            'garantias_pecas'   => $this->manutencaomodel->getGarantiasPecasByOs($os_id),
            'garantias_servs'   => $this->manutencaomodel->getGarantiasServsByOs($os_id),
        );

        $andamentos = $this->manutencaomodel->getAndamentosByManu($data['os']['os_id']);
        $situacao = $this->manutencaomodel->getUnicaSituacao($data['os']['os_situacao_id']);
        $prest = $this->cadastrosmodel->getFornCnpj($data['os']['os_fornecedor_cnpjcpf']);
        $frota = $this->frotamodel->getByIdRowArray($data['os']['os_frota_id']);
        $modelo = $this->frotamodel->getModeloByIdRowArray($frota['frota_modelo_id']);
        $marca = $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']);

        $i = 0;
        $newAnd = [];
        $total_pecas = 0;
        $total_servs = 0;
        $array_p = [];
        $array_s = [];
        foreach ($andamentos as $and) {
            $pecas = $this->manutencaomodel->getPecasAndamento($and['andamento_id']);
            $servs = $this->manutencaomodel->getServsAndamento($and['andamento_id']);

            $j = 0;
            $re_pecas = [];
            $and_p_val = 0;
            foreach ($pecas as $pc) {
                $prod = $this->produtosmodel->getByIdRowArray($pc['ai_item_id']);
                $total = (float) $pc['ai_vlr_un'] * (int) $pc['ai_qtd'];

                $re_pecas[$j] = array(
                    'nome'      => $prod['produto_nome'] . " | " . $prod['produto_modelo'],
                    'qtd'       => $pc['ai_qtd'],
                    'valor_un'  => number_format($pc['ai_vlr_un'], 4, ',', '.'),
                    'total'     => number_format($total, 4, ',', '.'),
                );

                //-> Se não existe nenhum elemento "$pc['ai_item_id']" no $array_p;
                if (isset($array_p[$pc['ai_item_id']]) === false) {
                    $array_p[$pc['ai_item_id']] = array(
                        'id'        => $pc['ai_item_id'],
                        'nome'      => $prod['produto_nome'] . " | " . $prod['produto_modelo'],
                        'qtd'       => $pc['ai_qtd'],
                        'valor_un'  => $pc['ai_vlr_un'],
                    );
                } else {
                    $array_p[$pc['ai_item_id']]['qtd'] = (int) $array_p[$pc['ai_item_id']]['qtd'] + $pc['ai_qtd'];
                }

                $total_pecas = (float)$total_pecas + (float)$total;
                $and_p_val = (float)$and_p_val + (float)$total;

                $j++;
            }

            $j = 0;
            $re_servs = [];
            $and_s_val = 0;
            foreach ($servs as $sv) {
                $serv = $this->manutencaomodel->getServById($sv['ai_item_id']);
                $total = (float) $sv['ai_vlr_un'] * (int) $sv['ai_qtd'];

                $re_servs[$j] = array(
                    'nome'      => $serv['servico_nome'],
                    'qtd'       => $sv['ai_qtd'],
                    'valor_un'  => number_format($sv['ai_vlr_un'], 4, ',', '.'),
                    'total'     => number_format($total, 4, ',', '.'),
                );

                //-> Se não existe nenhum elemento "$sv['ai_item_id']" no $array_s;
                if (isset($array_s[$sv['ai_item_id']]) === false) {
                    $array_s[$sv['ai_item_id']] = array(
                        'id'        => $sv['ai_item_id'],
                        'nome'      => $serv['servico_nome'],
                        'qtd'       => $sv['ai_qtd'],
                        'valor_un'  => $sv['ai_vlr_un'],
                    );
                } else {
                    $array_s[$sv['ai_item_id']]['qtd'] = (int) $array_s[$sv['ai_item_id']]['qtd'] + $sv['ai_qtd'];
                }

                $total_servs = (float)$total_servs + (float)$total;
                $and_s_val = (float)$and_s_val + (float)$total;

                $j++;
            }

            $newAnd[$i] = array(
                'id'        => $and['andamento_id'],
                'data'      => date('d/m/y', strtotime($and['andamento_data'])),
                'hora'      => $and['andamento_hora'],
                'titulo'    => $and['andamento_titulo'],
                'detalhes'  => $and['andamento_detalhe'],
                'pecas'     => $re_pecas,
                'servs'     => $re_servs,
                'total_sv'  => number_format($and_s_val, 4, ',', '.'),
                'total_pc'  => number_format($and_p_val, 4, ',', '.'),
            );

            $i++;
        }

        $total_geral = (float)$total_servs + (float)$total_pecas;

        $data['andamentos'] = $newAnd;
        $data['pecas'] = $array_p;
        $data['servs'] = $array_s;
        $data['total_p'] = number_format($total_pecas, 4, ',', '.');
        $data['total_s'] = number_format($total_servs, 4, ',', '.');
        $data['os']['total'] = number_format($total_geral, 4, ',', '.');
        $data['os']['os_situacao'] = $situacao['situacaoos_nome'];
        $data['os']['os_prestador'] = $prest['fornecedor_nome'];
        $data['os']['os_frota'] = 'Placa: ' . $frota['frota_placa'] . " - " . $marca['frota_marca_nome'] . $modelo['frota_modelo_nome'];

        if ($data['os']['os_usuario_fechamento'] != null) {
            $user = $this->usuariosmodel->getByID($data['os']['os_usuario_fechamento']);
            $data['user_f'] = $user['usuario_nome'];
        }

        $this->header_simples();
        $this->load->view('relatorios/pdfmanutencao', $data);
        $this->footer_simples();
    }

    public function pdfmanutencoes()
    {
        $filtros = array(
            'tipo'  => $this->input->post('tipo'),
            'frota' => $this->input->post('frota'),
        );

        if ($this->input->post('de') != "") {
            $filtros['de'] = strtotime($this->input->post('de'));
        } else {
            $filtros['de'] = null;
        }

        if ($this->input->post('ate') != "") {
            $filtros['ate'] = strtotime($this->input->post('ate'));
        } else {
            $filtros['ate'] = null;
        }

        $manutencoes = $this->manutencaomodel->getFiltered($filtros);
        $newM = [];
        $i = 0;
        $total = 0;
        foreach ($manutencoes as $manu) {
            $manu['situacao'] = $this->manutencaomodel->getUnicaSituacaoNome($manu['os_situacao_id']);
            $manu['data'] = date('d/m/Y', strtotime($manu['os_data_abertura']));
            $manu['frota'] = $this->frotamodel->getByIdPlacaCod($manu['os_frota_id']);
            $andamentos = $this->manutencaomodel->getAndamentosByManu($manu['os_id']);
            $subtotal = 0;
            foreach ($andamentos as $and) {
                $itens = $this->manutencaomodel->getItensAndamento($and['andamento_id']);
                $sub = 0;
                foreach ($itens as $it) {
                    $sub = (float)$it['ai_vlr_un'] * (int)$it['ai_qtd'];
                    $subtotal = (float)$subtotal + (float)$sub;
                }
            }
            $manu['total'] = $subtotal;
            $total = (float)$total + (float)$subtotal;
            $newM[$i] = $manu;
            $i++;
        }

        $newF = array(
            'tipo'  => $filtros['tipo'],
            'frota' => $this->frotamodel->getByIdPlacaCod($filtros['frota']),
        );

        if ($this->input->post('de') != "") {
            $newF['de'] = date('d/m/Y', strtotime($this->input->post('de')));
        } else {
            $newF['de'] = null;
        }

        if ($this->input->post('ate') != "") {
            $newF['ate'] = date('d/m/Y', strtotime($this->input->post('ate')));
        } else {
            $newF['ate'] = null;
        }

        $data = array(
            'total'         => $total,
            'manutencoes'   => $newM,
            'filtros'       => $newF,
            'banner'        => $this->configuracaomodel->banner(),
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfmanutencoes', $data);
        $this->footer_simples();
    }

    public function pdffornecedor()
    {

        $cnpj = $this->uri->segment(2);

        $forn = $this->cadastrosmodel->getFornCnpj($cnpj);
        $forn['cep'] = $this->mask($forn['fornecedor_cep'], "#####-###");
        if (strlen($cnpj) == 14) {
            $forn['cpfcnpj'] = $this->mask($cnpj, "##.###.###/####-##");
        } else {
            $forn['cpfcnpj'] = $this->mask($cnpj, "###.###.###-##");
        }
        if (strlen($forn['fornecedor_tel_representante']) == 11) {
            $forn['tel_representante'] = $this->mask($forn['fornecedor_tel_representante'], "(##) #####-####");
        } else if (strlen($forn['fornecedor_tel_representante']) == 10) {
            $forn['tel_representante'] = $this->mask($forn['fornecedor_tel_representante'], "(##) ####-####");
        } else {
            $forn['tel_representante'] = "";
        }
        if (strlen($forn['fornecedor_cel1']) == 11) {
            $forn['cel'] = $this->mask($forn['fornecedor_cel1'], "(##) #####-####");
        } else if (strlen($forn['fornecedor_cel1']) == 10) {
            $forn['cel'] = $this->mask($forn['fornecedor_cel1'], "(##) ####-####");
        } else {
            $forn['cel'] = "";
        }
        if (strlen($forn['fornecedor_fixo']) == 11) {
            $forn['fixo'] = $this->mask($forn['fornecedor_fixo'], "(##) #####-####");
        } else if (strlen($forn['fornecedor_fixo']) == 10) {
            $forn['fixo'] = $this->mask($forn['fornecedor_fixo'], "(##) ####-####");
        } else {
            $forn['fixo'] = "";
        }

        $data['forn'] = $forn;

        $this->header_simples();
        $this->load->view('relatorios/pdffornecedor', $data);
        $this->footer_simples();
    }

    public function pdffornecedores()
    {

        $estado = $this->input->post('estado');

        $fornecedores = $this->cadastrosmodel->getFornecedoresFiltered($estado);
        $newF = [];
        $i = 0;
        foreach ($fornecedores as $f) {
            if (strlen($f['fornecedor_cnpj']) == 14) {
                $f['cpfcnpj'] = $this->mask($f['fornecedor_cnpj'], "##.###.###/####-##");
            } else if (strlen($f['fornecedor_cnpj']) == 11) {
                $f['cpfcnpj'] = $this->mask($f['fornecedor_cnpj'], "###.###.###-##");
            }

            if (strlen($f['fornecedor_fixo']) == 11) {
                $f['tel'] = $this->mask($f['fornecedor_fixo'], "(##) #####-####");
            } else if (strlen($f['fornecedor_fixo']) == 10) {
                $f['tel'] = $this->mask($f['fornecedor_fixo'], "(##) ####-####");
            } else {
                $f['tel'] = "";
            }

            if (strlen($f['fornecedor_cel1']) == 11) {
                $f['cel'] = $this->mask($f['fornecedor_cel1'], "(##) #####-####");
            } else if (strlen($f['fornecedor_cel1']) == 10) {
                $f['cel'] = $this->mask($f['fornecedor_cel1'], "(##) ####-####");
            } else {
                $f['cel'] = "";
            }

            $newF[$i] = $f;
            $i++;
        }

        $data = array(
            'banner'        => $this->configuracaomodel->banner(),
            'filtro'        => $estado,
            'fornecedores'  => $newF,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdffornecedores', $data);
        $this->footer_simples();
    }

    public function pdfpneu()
    {
        $id = $this->uri->segment(2);
        $pneu = $this->frotamodel->getPneuById($id);

        if ($pneu['pneus_individual_frota_id'] != null && $pneu['pneus_individual_frota_id'] != "") {
            $pneu['frota'] = $this->frotamodel->getByIdPlacaCod($pneu['pneus_individual_frota_id']);
        } else {
            $pneu['frota'] = "NENHUM";
        }

        $pneu['tipo'] = $this->frotamodel->getTipoPneuByIdRowArray($pneu['pneus_individual_tipopneu_id']);
        $registros = $this->frotamodel->getRegistrosPeloPneuId($id);
        $newR = [];
        $i = 0;
        foreach ($registros as $rg) {
            $ex = explode(' ', $rg['pneus_registro_data']);
            $rg['data'] = date('d/m/Y', strtotime($ex[0]));
            $rg['hora'] = $ex[1];
            $newR[$i] = $rg;
            $i++;
        }

        $data = array(
            'registros' => $newR,
            'pneu'      => $pneu,
            'id'        => $id,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfpneu', $data);
        $this->footer_simples();
    }

    public function pdfpneus()
    {
        $filtros = array(
            'frota' => $this->input->post('frota'),
            'marca' => $this->input->post('marca'),
        );

        $data = array(
            'pneus'     => $this->frotamodel->getAllPneusIndividuaisFiltered($filtros),
            'tipos'     => $this->frotamodel->getAlltIPOSPneus(),
            'frotas'    => $this->frotamodel->getAll(),
            'filtros'   => array(
                'frota' => $this->frotamodel->getByIdPlacaCod($filtros['frota']),
                'marca' => $this->frotamodel->getTipoPneuByIdRowArray($filtros['marca']),
            ),
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfpneus', $data);
        $this->footer_simples();
    }

    public function pdfproduto()
    {
        $soma = 0;
        $peca = $this->produtosmodel->getByIdRowArray($this->uri->segment(2));
        $fornecedor = $this->cadastrosmodel->getFornCnpj($peca['produto_fornecedor_cnpj']);
        $estoques = $this->produtosmodel->getEstoqueByProd($peca['produto_id']);
        foreach ($estoques as $estoque) {
            $soma = $soma + $estoque['estoque_quantidade'];
        }
        $data = array(
            'peca' => $peca,
            'fornecedor' => $fornecedor,
            'quantidade' => $soma,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfproduto', $data);
        $this->footer_simples();
    }

    public function pdfprodutos()
    {
        $grupo = $this->input->post('grupo');

        $pecas = $this->produtosmodel->getAllProdutoAtivoFilter($grupo);
        $estoques = $this->produtosmodel->estoqueAll();

        $np = [];
        $i = 0;
        foreach ($pecas as $p) {
            $p['grupo'] = $this->produtosmodel->getGrupoUnico($p['produto_grupo_id']);
            $np[$i] = $p;
            $i++;
        }

        if ($grupo != null && $grupo != "") {
            $grupo = $this->produtosmodel->getGrupoUnico($grupo);
        }

        $data = array(
            'grupo'     => $grupo,
            'pecas'     => $np,
            'estoques'  => $estoques,
        );

        $this->header_simples();
        $this->load->view('relatorios/pdfprodutos', $data);
        $this->footer_simples();
    }

    public function pdftitulosfornecedor()
    {
        $cnpj = $this->input->post('cnpj');
        $idFornecedor = 'F|' . $this->limpa($cnpj);
        $cont = 0;
        $aray = [];

        if ($this->input->post('filtro') != "" || $this->input->post('dt_inicio') != "" || $this->input->post('dt_fim') != "") {
            if ($this->input->post('filtro') != "") {
                $fil['baixa'] = $this->input->post('filtro');
            } else {
                $fil['baixa'] = null;
            }

            if ($this->input->post('dt_inicio') != "") {
                $fil['dt_inicio'] = $this->input->post('dt_inicio');
            } else {
                $fil['dt_inicio'] = null;
            }

            if ($this->input->post('dt_fim') != "") {
                $fil['dt_fim'] = $this->input->post('dt_fim');
            } else {
                $fil['dt_fim'] = null;
            }

            $titulosF = $this->financeiromodel->getTitulosdate($idFornecedor, $fil);
        } else {
            $titulosF = $this->financeiromodel->getTitulosByForneclin($idFornecedor);
        }

        $somar = 0;
        foreach ($titulosF as $ti) {
            $somar = $somar + $ti['titulos_valor'];
            $tipo = $this->financeiromodel->getTM($ti['titulos_tipo']);
            if ($ti['titulos_baixa'] == 1) {
                $baixa = 'SIM';
            } else {
                $baixa = 'NAO';
            }
            $aray[$cont] = array(
                'vencimento'    => $ti['titulos_vencimento'],
                'numeroserie'   => $ti['titulos_numeroserie'],
                'tipo'          => $tipo['tm_nome'],
                'valor'         => $ti['titulos_valor'],
                'baixa'         => $baixa,
            );
            $cont++;
        }
        $data['titulos'] = $aray;
        $data['somar'] = $somar;
        if (strlen($cnpj) == 14) {
            $maskcnpj = $this->mask($cnpj, "##.###.###/####-##");
        } else if (strlen($cnpj) == 11) {
            $maskcnpj = $this->mask($cnpj, "###.###.###-##");
        } else {
            $maskcnpj = $cnpj;
        }

        $data['cnpj'] = $maskcnpj;

        $this->header_simples();
        $this->load->view('relatorios/pdftitulosfornecedor', $data);
        $this->footer_simples();
    }

    public function pdffornecedorabc()
    {
        $forne = $this->cadastrosmodel->getFornecedores();
        $vetor = [];
        $cont = 0;
        foreach ($forne as $f) {
            $somar = 0;
            if ($f['fornecedor_fixo']) {
                if (strlen($f['fornecedor_fixo']) == 11) {
                    $tel = $this->mask($f['fornecedor_fixo'], '(##) #####-####');
                } else {
                    $tel = $this->mask($f['fornecedor_fixo'], '(##) ####-####');
                }
            } else {
                if (strlen($f['fornecedor_cel1']) == 11) {
                    $tel = $this->mask($f['fornecedor_cel1'], '(##) #####-####');
                } else {
                    $tel = $this->mask($f['fornecedor_cel1'], '(##) ####-####');
                }
            }

            if (strlen($f['fornecedor_cnpj']) == 14) {
                $cnpj = $this->mask($f['fornecedor_cnpj'], '##.###.###/####-##');
            } else {
                $cnpj = $this->mask($f['fornecedor_cnpj'], '###.###.###-##');
            }

            $notas = $this->financeiromodel->getNotaByForne($f['fornecedor_cnpj']);
            foreach ($notas as $nota) {
                $somar = $somar + $nota['notafiscal_valorfinal'];
            }

            $vetor[$cont] = array(
                'nome'      => $f['fornecedor_nome'],
                'cnpj'      => $cnpj,
                'telefone'  => $tel,
                'total'     => $somar,
            );
            $cont++;
        }
        // Array Sort - Inicio
        function arraySort($array, $on, $order = SORT_ASC)
        {
            $new_array = array();
            $sortable_array = array();

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $k2 => $v2) {
                            if ($k2 == $on) {
                                $sortable_array[$k] = $v2;
                            }
                        }
                    } else {
                        $sortable_array[$k] = $v;
                    }
                }

                switch ($order) {
                    case SORT_ASC:
                        asort($sortable_array);
                        break;
                    case SORT_DESC:
                        arsort($sortable_array);
                        break;
                }

                foreach ($sortable_array as $k => $v) {
                    $new_array[$k] = $array[$k];
                }
            }

            return $new_array;
        }
        //Array Sort - Final

        $data['fornecedores'] = arraySort($vetor, 'total', SORT_DESC);

        $this->header_simples();
        $this->load->view('relatorios/pdffornecedorabc', $data);
        $this->footer_simples();
    }

    public function pdfclienteabc()
    {
        $clienteabc = $this->clientesmodel->getAll();
        $aray = [];
        $cont = 0;
        foreach ($clienteabc as $c) {
            $idcliente = 'C|' . $c['cliente_cpfcnpj'];
            $somar = 0;
            $titulos = $this->financeiromodel->getTitulosByForneclin($idcliente);

            if (strlen($c['cliente_cpfcnpj']) == 14) {
                $cpf = $this->mask($c['cliente_cpfcnpj'], '##.###.###/####-##');
            } else {
                $cpf = $this->mask($c['cliente_cpfcnpj'], '###.###.###-##');
            }

            foreach ($titulos as $t) {
                $somar = $somar + $t['titulos_valorpago'];
            }

            $aray[$cont] = array(
                'cpf'       => $cpf,
                'nome'      => $c['cliente_nome'],
                'cidade'    => $c['cliente_cidade'],
                'estado'    => $c['cliente_estado'],
                'total'     => $somar,
            );
            $cont++;
        }

        // Array Sort - Inicio
        function arraySort($array, $on, $order = SORT_ASC)
        {
            $new_array = array();
            $sortable_array = array();

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $k2 => $v2) {
                            if ($k2 == $on) {
                                $sortable_array[$k] = $v2;
                            }
                        }
                    } else {
                        $sortable_array[$k] = $v;
                    }
                }

                switch ($order) {
                    case SORT_ASC:
                        asort($sortable_array);
                        break;
                    case SORT_DESC:
                        arsort($sortable_array);
                        break;
                }

                foreach ($sortable_array as $k => $v) {
                    $new_array[$k] = $array[$k];
                }
            }

            return $new_array;
        }
        //Array Sort - Final

        $data['clienteabc'] = arraySort($aray, 'total', SORT_DESC);

        $this->header_simples();
        $this->load->view('relatorios/pdfclienteabc', $data);
        $this->footer_simples();
    }

    public function pdfprodutoabc()
    {
        $produtos = $this->produtosmodel->getAllProdutoAtivo4();
        $cont = 0;
        $p = [];
        foreach ($produtos as $d) {
            $somar = 0;
            $andamentos = $this->manutencaomodel->getItensPeca($d['produto_id']);
            foreach ($andamentos as $anda) {
                $somar = $somar + ($anda['ai_qtd'] * $anda['ai_vlr_un']);
            }
            $p[$cont] = array(
                'nome'          => $d['produto_nome'],
                'modelo'        => $d['produto_modelo'],
                'fabricante'    => $d['produto_fabricante'],
                'total'         => $somar,
                'ativo'         => $d['produto_ativo_id'],
            );
            $cont++;
        }

        // Array Sort - Inicio
        function arraySort($array, $on, $order = SORT_ASC)
        {
            $new_array = array();
            $sortable_array = array();

            if (count($array) > 0) {
                foreach ($array as $k => $v) {
                    if (is_array($v)) {
                        foreach ($v as $k2 => $v2) {
                            if ($k2 == $on) {
                                $sortable_array[$k] = $v2;
                            }
                        }
                    } else {
                        $sortable_array[$k] = $v;
                    }
                }

                switch ($order) {
                    case SORT_ASC:
                        asort($sortable_array);
                        break;
                    case SORT_DESC:
                        arsort($sortable_array);
                        break;
                }

                foreach ($sortable_array as $k => $v) {
                    $new_array[$k] = $array[$k];
                }
            }

            return $new_array;
        }
        //Array Sort - Final

        $data['produtoabc'] = arraySort($p, 'total', SORT_DESC);

        $this->header_simples();
        $this->load->view('relatorios/pdfprodutoabc', $data);
        $this->footer_simples();
    }

    public function fechamentoCaixa()
    {

        $titulos = $this->financeiromodel->getTitulosFecha($this->input->post('dia'));

        $ie = $is = $totalE = $totalS = 0;
        $newE = $newS = [];

        foreach ($titulos as $t) {
            if ($t['titulos_forneclin'] != 0 || $t['titulos_forneclin'] != null) {
                $aux = explode('|', $t['titulos_forneclin']);
                if ($aux[0] == 'C') {
                    $nomeclin = $this->clientesmodel->getCPFCNPJ($aux[1]);
                    $nome = $nomeclin['cliente_nome'];
                } else if ($aux[0] == 'F') {
                    $nomefor = $this->fornecedoresmodel->getByCNPJRowArray($aux[1]);
                    $nome = $nomefor['fornecedor_nome'];
                } else {
                    $nome = "Nao Possui";
                }

                if ($t['titulos_IO'] == 'ENTRADA') {
                    $newE[$ie] = array(
                        'ntitulo'   => ucwords(mb_strtolower($t['titulos_numeroserie'])),
                        'nome'      => ucwords(mb_strtolower($nome)),
                        'valor'     => $t['titulos_valorpago'],
                    );
                    $ie++;
                    $totalE = $totalE + $t['titulos_valorpago'];
                } else if ($t['titulos_IO'] == 'SAIDA') {
                    $newS[$is] = array(
                        'ntitulo'   => ucwords(mb_strtolower($t['titulos_numeroserie'])),
                        'nome'      => ucwords(mb_strtolower($nome)),
                        'valor' => $t['titulos_valorpago'],
                    );
                    $is++;
                    $totalS = $totalS + $t['titulos_valorpago'];
                }
            }
        }

        $saldo = $totalE - $totalS;

        $data = array(
            'banner'    => $this->configuracaomodel->banner(),
            'dia'       => $this->input->post('dia'),
            'entradas'  => $newE,
            'saidas'     => $newS,
            'totale'    => $totalE,
            'totals'    => $totalS,
            'total'     => $saldo,
        );



        $this->header_simples();
        $this->load->view('relatorios/pdffechamentocaixa', $data);
        $this->footer_simples();
    }

    public function pdfativos()
    {
        $data['ativos'] = $this->ativos->index();
        $data['banner'] =  $this->configuracaomodel->banner();

        $total = 0;

        foreach ($data['ativos'] as $ativo) {
            if ($ativo->ativos_status == 1) {
                $total += $ativo->ativos_valor;
            }
        }

        $data['total'] = $total;

        $this->header_simples();
        $this->load->view('relatorios/pdfativos', $data);
        $this->footer_simples();
    }
}
