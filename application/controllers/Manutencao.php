<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manutencao extends MY_Controller
{

    public function index()
    {
        $this->header('7');
        $this->load->view('icon');
        $this->footer();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('manutencaomodel');
        $this->load->model('ativosmodel');
        $this->load->model('fornecedoresmodel');
        $this->load->model('cadastrosmodel');
        $this->load->model('frotamodel');
        $this->load->model('produtosmodel');
        $this->load->model('usuariosmodel');
        date_default_timezone_set('America/Sao_Paulo');
    }

    // **========================================================================**
    // ||                        Funções de Manutenção                           ||
    // **========================================================================**

    public function listagem($id = null)
    {

        $this->acessorestrito('MANUTENÇÃO');

        $this->load->library("pagination");

        $filtro = mb_strtoupper($this->input->post('filtro'));
        if ($this->uri->segment(2) == 'f') {
            $filtro = strtoupper(urldecode($this->uri->segment(3)));
        }

        $uri_segment = 4;
        $config = array();
        if ($filtro) {
            $config["base_url"] = base_url('ordemdeservicos/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('ordemdeservicos/n/');
            $uri_segment = 3;
        }

        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;

        $config["total_rows"] = $this->manutencaomodel->get_countManutencaoFiltro($filtro);
        $config["per_page"] = 10;

        $this->pagination->initialize($config);

        $data = array(
            'ordens'    => $this->manutencaomodel->getAllManutencaoFiltro($filtro, 10, $page),
            'frotas'    => $this->frotamodel->getAll(),
            'situacoes' => $this->manutencaomodel->getAllSituacao(),
            'servicos'  => $this->manutencaomodel->getAllServAtivos(),
            'pecas'     => $this->produtosmodel->getAtivos(),
            'insert'    => $id,
        );

        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];

        if (array_key_exists('ordem', $this->session->userdata())) {
            $data['andamento'] = $this->session->userdata('ordem');
            $this->session->unset_userdata('ordem');
        } else {
            $data['andamento'] = null;
        }

        if (array_key_exists('edita', $this->session->userdata())) {
            $data['edt'] = $this->session->userdata('edita');
            $this->session->unset_userdata('edita');
        } else {
            $data['edt'] = null;
        }

        if (array_key_exists('exclui', $this->session->userdata())) {
            $data['err'] = $this->session->userdata('exclui');
            $this->session->unset_userdata('exclui');
        } else {
            $data['err'] = null;
        }


        if (array_key_exists('reativar', $this->session->userdata())) {
            $data['reat'] = $this->session->userdata('reativar');
            $this->session->unset_userdata('reativar');
        } else {
            $data['reat'] = null;
        }

        if (array_key_exists('delete', $this->session->userdata())) {
            $data['reab'] = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        } else {
            $data['reab'] = null;
        }

        /*
        if(array_key_exists('erro', $this->session->userdata())){
            $data['enc'] = $this->session->userdata('erro');
            $this->session->unset_userdata('erro');
        } else {
            $data['enc'] = null;
        }
        */

        $this->header('7.1', 'LISTAGEM DE ORDEM DE SERVIÇOS', 'manutencao', 'Manutenção', 'Listagem de ordem de servicos');
        $this->load->view('manutencao/listagem', $data);
        $this->footer();
    }

    public function verOrdem($id = null, $err = null)
    {


        if ($id != null) {
            $os_id = $id;
        } else {
            $os_id = $this->uri->segment(2);
        }

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
        $data['err'] = $err;
        $data['os']['total'] = number_format($total_geral, 4, ',', '.');
        $data['os']['os_situacao'] = $situacao['situacaoos_nome'];
        $data['os']['os_prestador'] = $prest['fornecedor_nome'];
        $data['os']['os_frota'] = 'Placa: ' . $frota['frota_placa'] . " - " . $marca['frota_marca_nome'] . $modelo['frota_modelo_nome'];

        if ($data['os']['os_usuario_fechamento'] != null) {
            $user = $this->usuariosmodel->getByID($data['os']['os_usuario_fechamento']);
            $data['user_f'] = $user['usuario_nome'];
        }

        $this->header('7.1', 'VISUALIZAÇÃO DE ORDEM DE SERVIÇO', 'manutencao', 'Manutenção', 'Visualização de ordem de servico');
        $this->load->view('manutencao/mostrar', $data);
        $this->footer();
    }

    public function cadastro()
    {


        $data = array(
            'os'            => null,
            'situacoes'     => $this->manutencaomodel->getAllSituacao(),
            'frotas'        => $this->frotamodel->getAtivos(),
            'fornecedores'  => $this->fornecedoresmodel->getAtivos(),
        );

        $this->header('7.1', 'CADASTRO DE ORDEM DE SERVIÇO', 'manutencao', 'Manutenção', 'Cadastro de ordem de serviço');
        $this->load->view('manutencao/cadastro', $data);
        $this->footer();
    }

    function ativarOS()
    {


        $id = $this->input->post('os_idatv');
        $sen = MD5($this->input->post('senha'));

        if ($sen == $this->session->userdata('senha')) {
            $os = $this->manutencaomodel->getUnico($id);
            $os['os_status_id'] = 1;
            $this->manutencaomodel->editManu($os, $id);

            $this->session->set_userdata('reativar', 1);
            redirect(base_url('ordemdeservicos'));
        } else {
            $this->session->set_userdata('reativar', 2);
            redirect(base_url('ordemdeservicos'));
        }
    }

    public function edicao()
    {


        $id = $this->uri->segment(2);

        $data = array(
            'os'            => $this->manutencaomodel->getUnico($id),
            'situacoes'     => $this->manutencaomodel->getAllSituacao(),
            'frotas'        => $this->frotamodel->getAtivos(),
            'fornecedores'  => $this->fornecedoresmodel->getAtivos(),
        );

        if ($data['os']['os_usuario_fechamento'] != null) {
            $user = $this->usuariosmodel->getByID($data['os']['os_usuario_fechamento']);
            $data['user_f'] = $user['usuario_nome'];
        } else {
            $data['user_f'] = null;
        }

        $this->header('7.1', 'EDIÇÃO DE ORDEM DE SERVIÇO', 'manutencao', 'Manutenção', 'Edição de ordem de serviço');
        $this->load->view('manutencao/cadastro', $data);
        $this->footer();
    }

    public function novaOrdem()
    {


        $new = array(
            'os_tipo'               => $this->refatorarString($this->input->post('tipo')),
            'os_data_abertura'      => $this->input->post('data'),
            'os_data_fechamento'    => null,
            'os_hora_abertura'      => $this->input->post('hora'),
            'os_hora_fechamento'    => null,
            'os_usuario_abertura'   => $this->session->userdata('user_id'),
            'os_usuario_fechamento' => null,
            'os_frota_id'           => $this->input->post('frota'),
            'os_km_futuro'           => $this->input->post('km_futuro'),
            'os_km_atual'           => $this->input->post('km_atual'),
            'os_km_anterior'        => $this->input->post('km_anterior'),
            'os_titulo'             => $this->refatorarString($this->input->post('titulo')),
            'os_local'              => $this->refatorarString($this->input->post('local')),
            'os_fornecedor_cnpjcpf' => $this->input->post('fornecedor'),
            'os_detalhe'            => $this->refatorarString($this->input->post('detalhes')),
            'os_situacao_id'        => $this->input->post('situacao'),
            'os_status_id'          => 1,
        );

        $id = $this->manutencaomodel->insertManutencao($new);

        $frota = $this->frotamodel->getRowById($this->input->post('frota'));
        $frota['frota_km'] = $this->input->post('km_atual');
        $ed = $this->frotamodel->update($frota, $frota['frota_id']);

        $this->listagem($id);
    }

    public function editaOrdem()
    {


        $id = $this->input->post('id_os');

        if ($this->input->post('situacao') != 4) {
            $df = null;
            $hf = null;
            $uf = null;
        } else {
            $df = $this->input->post('data_f');
            $hf = $this->input->post('hora_f');
            $uf = $this->input->post('user_f');
        }

        $edit = array(
            'os_tipo'               => $this->refatorarString($this->input->post('tipo')),
            'os_data_abertura'      => $this->input->post('data'),
            'os_data_fechamento'    => $df,
            'os_hora_abertura'      => $this->input->post('hora'),
            'os_hora_fechamento'    => $hf,
            'os_usuario_abertura'   => $this->input->post('user_a'),
            'os_usuario_fechamento' => $uf,
            'os_frota_id'           => $this->input->post('frota'),
            'os_km_futuro'           => $this->input->post('km_futuro'),
            'os_km_atual'           => $this->input->post('km_atual'),
            'os_km_anterior'        => $this->input->post('km_anterior'),
            'os_titulo'             => $this->refatorarString($this->input->post('titulo')),
            'os_local'              => $this->refatorarString($this->input->post('local')),
            'os_fornecedor_cnpjcpf' => $this->input->post('fornecedor'),
            'os_detalhe'            => $this->refatorarString($this->input->post('detalhes')),
            'os_situacao_id'        => $this->input->post('situacao'),
            'os_status_id'          => $this->input->post('ativo'),
        );

        $this->manutencaomodel->editManu($edit, $id);

        $frota = $this->frotamodel->getRowById($this->input->post('frota'));
        $frota['frota_km'] = $this->input->post('km_atual');
        $ed = $this->frotamodel->update($frota, $frota['frota_id']);

        $this->session->set_userdata('edita', $id);
        redirect(base_url('ordemdeservicos'), 'refresh');
    }

    public function buscaFrota()
    {


        $frota = $this->frotamodel->getByIdRowArray($this->input->post('id'));
        $modelo = $this->frotamodel->getModeloByIdRowArray($frota['frota_modelo_id']);
        $marca = $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']);

        $check = $this->manutencaomodel->pegaUltimaByFrota($frota['frota_id']);

        if ($check != null && $check != "") {
            $km = $check['os_km_atual'];
        } else {
            $km = "";
        }

        $return = 'Placa: ' . $frota['frota_placa'] . " - " . $marca['frota_marca_nome'] . $modelo['frota_modelo_nome'] . "###" . $frota['frota_km'] . "###" . $km;

        echo $return;
    }

    public function situacaoDinamica()
    {


        $data['situacaoos_nome'] = $this->refatorarString($this->input->post('nome'));
        $id = $this->manutencaomodel->insertSituacao($data);

        echo $data['situacaoos_nome'] . '###' . $id;
    }

    public function searchFornecedor()
    {


        $cpf_cnpj = $this->input->post('cpf_cnpj');
        $check = $this->cadastrosmodel->getFornCnpj($cpf_cnpj);

        if ($check != null && $check != "") {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function fornecedorDinamico()
    {


        $new = array(
            'fornecedor_nome'       => $this->refatorarString($this->input->post('nome')),
            'fornecedor_cnpj'       => $this->input->post('id'),
            'fornecedor_ramo'       => $this->refatorarString($this->input->post('ramo')),
            'fornecedor_ativo_id'   => 1,
            'fornecedor_cep'        => $this->input->post('cep'),
            'fornecedor_numero'     => $this->input->post('num'),
            'fornecedor_endereco'   => $this->refatorarString($this->input->post('log')),
            'fornecedor_bairro'     => $this->refatorarString($this->input->post('bairro')),
            'fornecedor_cidade'     => $this->refatorarString($this->input->post('cid')),
            'fornecedor_estado'     => $this->refatorarString($this->input->post('uf')),
            'fornecedor_email'      => $this->input->post('email'),
        );

        $id = $this->cadastrosmodel->insertFornecedor($new);

        echo $id;
    }

    public function encerrarOS()
    {


        $id = $this->input->post('encerrar_id');
        $senha = MD5($this->input->post('encerrar_senha'));
        $manu = $this->manutencaomodel->getUnico($id);

        if ($senha == $this->session->userdata('senha')) {
            $manu['os_data_fechamento'] = date('Y-m-d');
            $manu['os_hora_fechamento'] = date('H:i');
            $manu['os_usuario_fechamento'] = $this->session->userdata('user_id');
            $manu['os_situacao_id'] = 4;

            $this->manutencaomodel->editManu($manu, $id);

            $this->verOrdem($id, 3);
        } else {
            $this->verOrdem($id, 4);
        }
    }

    public function excluirOS()
    {


        $id = $this->input->post('id_excluir');
        $senha = MD5($this->input->post('senha'));

        if ($senha == $this->session->userdata('senha')) {
            $manu = $this->manutencaomodel->getUnico($id);

            $manu['os_status_id'] = 2;
            $this->manutencaomodel->editManu($manu, $id);

            //$this->listagem(null, null, $id);
            $this->session->set_userdata('exclui', $id);
            redirect(base_url('ordemdeservicos'), 'refresh');
        } else {
            //$this->listagem(null, null, 99999999999);
            $this->session->set_userdata('exclui', 99999999999);
            redirect(base_url('ordemdeservicos'), 'refresh');
        }
    }

    public function reabrirOS()
    {

        $this->load->model('logger');

        $id = $this->input->post('id_reabrir');
        $senha = MD5($this->input->post('senha_reabrir'));

        if ($this->session->userdata('senha') == $senha) {
            $manu = $this->manutencaomodel->getUnico($id);

            $log = array(
                'log_user_id'   => $this->session->userdata('user_id'),
                'log_user_nome' => $this->session->userdata('nome'),
                'log_os_id'     => $id,
                'log_data'      => date('Y-m-d'),
                'log_hora'      => date('H:i'),
            );

            $this->logger->insertLogReaberturaOS($log);

            $manu['os_data_fechamento'] = null;
            $manu['os_hora_fechamento'] = null;
            $manu['os_usuario_fechamento'] = null;
            $manu['os_situacao_id'] = 1;

            $this->manutencaomodel->editManu($manu, $id);

            //$this->listagem(null, null, null, $id);
            $this->session->set_userdata('delete', $id);
            redirect(base_url('ordemdeservicos'), 'refresh');
        } else {
            //$this->listagem(null, null, null, 99999999999);
            $this->session->set_userdata('delete', 99999999999);
            redirect(base_url('ordemdeservicos'), 'refresh');
        }
    }

    public function encerrarOSListagem()
    {


        $id = $this->input->post('id_encerrar');
        $senha = MD5($this->input->post('senha_encerrar'));

        if ($this->session->userdata('senha') == $senha) {
            $manu = $this->manutencaomodel->getUnico($id);

            $manu['os_data_fechamento'] = date('Y-m-d');
            $manu['os_hora_fechamento'] = date('H:i');
            $manu['os_usuario_fechamento'] = $this->session->userdata('user_id');
            $manu['os_situacao_id'] = 4;

            $this->manutencaomodel->editManu($manu, $id);

            //$this->verOrdem($id, 3);
            //$this->session->set_userdata('ordem', 3);
            redirect(base_url('mostrarordemdeservico/' . $id), 'refresh');
        } else {
            //$this->listagem(null, null, null, null, 1);
            $this->session->set_userdata('erro', 1);
            redirect(base_url('ordemdeservicos'), 'refresh');
        }
    }

    // **=======================================================================**
    // ||                        Funções de Andamento                           ||
    // **=======================================================================**

    public function lancarAndamento()
    {


        $data = array(
            'edit'          => null,
            'servicos'      => $this->manutencaomodel->getAllServAtivos(),
            'pecas'         => $this->produtosmodel->getAtivos(),
            'id'            => $this->input->post('os_id'),
            'fornecedores'  => $this->fornecedoresmodel->getAtivos(),
        );

        $this->header('7.1', 'CADASTRO DE ANDAMENTO', 'manutencao', 'Manutenção', 'Cadastro de andamento');
        $this->load->view('manutencao/andamento', $data);
        $this->footer();
    }

    public function editarAndamento()
    {


        $and = $this->manutencaomodel->getAndamentoUnico($this->uri->segment(3));

        $data = array(
            'edit'          => $and,
            'servicos'      => $this->manutencaomodel->getAllServAtivos(),
            'pecas'         => $this->produtosmodel->getAtivos(),
            'id'            => $and['andamento_os_id'],
            'fornecedores'  => $this->fornecedoresmodel->getAtivos(),
            'itens_p'       => $this->manutencaomodel->getPecasAndamento($and['andamento_id']),
            'itens_s'       => $this->manutencaomodel->getServsAndamento($and['andamento_id']),
        );

        $this->header('7');
        $this->load->view('manutencao/andamentoCOPIA', $data);
        $this->footer();
    }

    public function getServAndamento()
    {


        $serv = $this->manutencaomodel->getServById($this->input->post('id'));

        echo json_encode($serv);
    }

    public function getPecaAndamento()
    {


        $peca = $this->produtosmodel->getByIdRowArray($this->input->post('id'));

        echo json_encode($peca);
    }

    public function novoAndamento()
    {


        $new = array(
            'andamento_os_id'   => $this->input->post('os_id'),
            'andamento_data'    => $this->input->post('data'),
            'andamento_hora'    => $this->input->post('hora'),
            'andamento_titulo'  => $this->refatorarString($this->input->post('titulo')),
            'andamento_detalhe' => $this->refatorarString($this->input->post('detalhes')),
        );

        $id = $this->manutencaomodel->insertAndamento($new);

        $itens = explode('▓▓', $this->input->post('anchor_list'));
        for ($i = 2; $i < count($itens); $i++) {
            $ex = explode('☼☼', $itens[$i]);
            if ($ex[1] == 's') {
                $tip = 'SERVIÇO';
            } else {
                $tip = 'PEÇA';
            }
            $newItem = array(
                'ai_andamento_id'   => $id,
                'ai_tipo'           => $tip,
                'ai_item_id'        => $ex[0],
                'ai_qtd'            => $ex[2],
                'ai_vlr_un'         => str_replace(',', '.', str_replace('.', '', $ex[3])),
            );
            $this->manutencaomodel->insertAndamentoItem($newItem);
        }

        //$this->listagem(null, $this->input->post('os_id'));
        $this->session->set_userdata('ordem', $this->input->post('os_id'));
        redirect(base_url('ordemdeservicos'));
    }

    public function mudaAndamento()
    {


        $edit = array(
            'andamento_os_id'   => $this->input->post('os_id'),
            'andamento_data'    => $this->input->post('data'),
            'andamento_hora'    => $this->input->post('hora'),
            'andamento_titulo'  => $this->refatorarString($this->input->post('titulo')),
            'andamento_detalhe' => $this->refatorarString($this->input->post('detalhes')),
        );

        $id = $this->input->post('and_id');

        $this->manutencaomodel->editAndamento($edit, $id);

        $andamento_pecas = $this->manutencaomodel->getPecasAndamento($id);
        $andamento_servs = $this->manutencaomodel->getServsAndamento($id);
        $j = $k = 0;
        $arrayPecas = [];
        $arrayServs = [];

        $itens = explode('▓▓', $this->input->post('anchor_list'));
        for ($i = 2; $i < count($itens); $i++) {
            $ex = explode('☼☼', $itens[$i]);
            if ($ex[1] == 's') {
                $arrayServs[$k] = array(
                    'ai_andamento_id'   => $id,
                    'ai_tipo'           => 'SERVIÇO',
                    'ai_item_id'        => $ex[0],
                    'ai_qtd'            => $ex[2],
                    'ai_vlr_un'         => str_replace(',', '.', str_replace('.', '', $ex[3])),
                );
                $k++;
            } else {
                $arrayPecas[$j] = array(
                    'ai_andamento_id'   => $id,
                    'ai_tipo'           => 'PEÇA',
                    'ai_item_id'        => $ex[0],
                    'ai_qtd'            => $ex[2],
                    'ai_vlr_un'         => str_replace(',', '.', str_replace('.', '', $ex[3])),
                );
                $j++;
            }
        }

        $this->organizaItens($andamento_pecas, $arrayPecas);
        $this->organizaItens($andamento_servs, $arrayServs);

        redirect(base_url('manutencao/verOrdem/') . $this->input->post('os_id'), 'refresh');
        //redirect(base_url('manutencao/verOrdem/').$this->input->post('os_id'), 'refresh'); 
    }

    public function organizaItens($andamento_itens, $arrayItens)
    {


        foreach ($andamento_itens as $ai) {
            $check = 0;
            foreach ($arrayItens as $arr) {
                if ($arr['ai_item_id'] == $ai['ai_item_id']) {
                    $check = 1;
                    $this->manutencaomodel->editItemAndamento($ai['ai_id'], $arr);
                }
            }

            if ($check == 0) {
                $this->manutencaomodel->deleteItemAndamento($ai['ai_id']);
            }
        }

        foreach ($arrayItens as $arr) {

            $check = 0;
            foreach ($andamento_itens as $ai) {
                if ($arr['ai_item_id'] == $ai['ai_item_id']) {
                    $check = 1;
                }
            }

            if ($check == 0) {
                $this->manutencaomodel->insertAndamentoItem($arr);
            }
        }
    }

    public function excluirAndamento()
    {


        $id = $this->input->post('id_excluir');
        $senha = MD5($this->input->post('senha'));
        $anchor = $this->input->post('anchor_id');

        if ($senha == $this->session->userdata('senha')) {
            $this->manutencaomodel->delPecasServsByAnd($id);
            //devolver estoque
            $this->manutencaomodel->delAndamento($id);
            $this->verOrdem($anchor, 1);
        } else {
            $this->verOrdem($anchor, 2);
        }
    }

    public function pecaDinamica()
    {


        $new = array(
            'produto_nome'              => $this->refatorarString($this->input->post('nome')),
            'produto_preco_custo'       => str_replace(',', '.', str_replace('.', '', $this->input->post('custo'))),
            'produto_preco_venda'       => str_replace(',', '.', str_replace('.', '', $this->input->post('venda'))),
            'produto_codigo'            => $this->refatorarString($this->input->post('codigo')),
            'produto_fabricante'        => $this->refatorarString($this->input->post('fabricante')),
            'produto_detalhes'          => '',
            'produto_fornecedor_cnpj'   => $this->input->post('fornecedor'),
            'produto_modelo'            => $this->refatorarString($this->input->post('modelo')),
            'produto_un_medida'         => '',
            'produto_comprimento'       => 0,
            'produto_largura'           => 0,
            'produto_altura'            => 0,
            'produto_un_peso'           => '',
            'produto_peso'              => 0,
            'produto_ativo_id'          => 1,
        );

        $id = $this->produtosmodel->insert($new);
        $new['produto_id'] = $id;

        echo json_encode($new);
    }

    public function pecaDinamicaReturnAll()
    {


        $new = array(
            'produto_nome'              => $this->refatorarString($this->input->post('nome')),
            'produto_preco_custo'       => str_replace(',', '.', str_replace('.', '', $this->input->post('custo'))),
            'produto_preco_venda'       => str_replace(',', '.', str_replace('.', '', $this->input->post('venda'))),
            'produto_codigo'            => $this->refatorarString($this->input->post('codigo')),
            'produto_fabricante'        => $this->refatorarString($this->input->post('fabricante')),
            'produto_detalhes'          => '',
            'produto_fornecedor_cnpj'   => $this->input->post('fornecedor'),
            'produto_modelo'            => $this->refatorarString($this->input->post('modelo')),
            'produto_un_medida'         => '',
            'produto_comprimento'       => 0,
            'produto_largura'           => 0,
            'produto_altura'            => 0,
            'produto_un_peso'           => '',
            'produto_peso'              => 0,
            'produto_ativo_id'          => 1,
        );

        $this->produtosmodel->insert($new);

        $produtos = $this->produtosmodel->getAll();

        $products = [];
        $cont = 0;

        foreach ($produtos as $p) {
            $p['produto_nome']          = ucwords(mb_strtolower($p['produto_nome']));
            $p['produto_modelo']        = ucwords(mb_strtolower($p['produto_modelo']));
            $p['produto_preco_custo']   = number_format($p['produto_preco_custo'], 4, ',', '.');

            $products[$cont] = $p;
            $cont++;
        }

        echo json_encode($products);
    }

    // **======================================================================**
    // ||                        Funções de Serviços                           ||
    // **======================================================================**

    public function servicos($new = null, $edit = null, $exc = null, $reat = null)
    {

        $this->acessorestrito('MANUTENÇÃO');

        $this->load->library("pagination");

        $filtro = mb_strtoupper($this->input->post('filtro'));
        if ($this->uri->segment(2) == 'f') {
            $filtro = strtoupper(urldecode($this->uri->segment(3)));
        }

        $uri_segment = 4;
        $config = array();
        if ($filtro) {
            $config["base_url"] = base_url('servicos/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('servicos/n/');
            $uri_segment = 3;
        }

        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;

        $config["total_rows"] = $this->manutencaomodel->get_countServicosFiltro($filtro);
        $config["per_page"] = 10;

        $this->pagination->initialize($config);

        $data['servicos'] = $this->manutencaomodel->getAllServicoFiltro($filtro, 10, $page);

        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];



        if (array_key_exists('modal', $this->session->userdata())) {
            $data['new'] = $this->session->userdata('modal');
            $this->session->unset_userdata('modal');
        } else {
            $data['new'] = null;
        }

        if (array_key_exists('edital', $this->session->userdata())) {
            $data['edit'] = $this->session->userdata('edital');
            $this->session->unset_userdata('edital');
        } else {
            $data['edit'] = null;
        }

        if (array_key_exists('exclui', $this->session->userdata())) {
            $data['exc'] = $this->session->userdata('exclui');
            $this->session->unset_userdata('exclui');
        } else {
            $data['exc'] = null;
        }

        if (array_key_exists('reativar', $this->session->userdata())) {
            $data['reat'] = $this->session->userdata('reativar');
            $this->session->unset_userdata('reativar');
        } else {
            $data['reat'] = null;
        }

        $this->header('7.2', 'LISTAGEM DE SERVIÇOS', 'manutencao', 'Manutenção', 'listagem de serviços');
        $this->load->view('manutencao/servicos', $data);
        $this->footer();
    }

    public function novoServico()
    {


        $new = array(
            'servico_nome'      => $this->refatorarString($this->input->post('nome')),
            'servico_custo'     => str_replace(',', '.', str_replace('.', '', $this->input->post('valor'))),
            'servico_ativo_id'  => 1,
        );

        $id = $this->manutencaomodel->insertServ($new);

        $this->session->set_userdata('modal', $id);
        redirect(base_url('servicos'));
    }

    public function getServico()
    {


        $id = $this->input->post('id');
        $servico = $this->manutencaomodel->getServById($id);

        echo json_encode($servico);
    }

    public function editarServico()
    {


        $edit  = array(
            'servico_nome'      => $this->refatorarString($this->input->post('nome_edit')),
            'servico_custo'     => str_replace(',', '.', str_replace('.', '', $this->input->post('valor_edit'))),
            'servico_ativo_id'  => $this->input->post('ativo_edit'),
        );
        $id = $this->input->post('id_edit');

        $this->manutencaomodel->editServ($edit, $id);

        //$this->servicos(null, $id);
        $this->session->set_userdata('edital', $id);
        redirect(base_url('servicos'));
    }

    public function excluirServico()
    {


        $id = $this->input->post('id_excluir');
        $senha = MD5($this->input->post('senha'));

        if ($senha == $this->session->userdata('senha')) {
            $servico = $this->manutencaomodel->getServById($id);
            $servico['servico_ativo_id'] = 2;
            $this->manutencaomodel->editServ($servico, $id);

            //$this->servicos(null, null, 2);
            $this->session->set_userdata('exclui', 2);
            redirect(base_url('servicos'), 'refresh');
        } else {
            //$this->servicos(null, null, 1);
            $this->session->set_userdata('exclui', 1);
            redirect(base_url('servicos'), 'refresh');
        }
    }

    public function servDinamico()
    {


        $new = array(
            'servico_nome'      => $this->refatorarString($this->input->post('nome')),
            'servico_ativo_id'  => 1,
            'servico_custo'     => str_replace(',', '.', str_replace('.', '', $this->input->post('valor'))),
        );

        $id = $this->manutencaomodel->insertServ($new);
        $new['servico_id'] = $id;

        echo json_encode($new);
    }

    function ativarServico()
    {


        $id = $this->input->post('servico_idatv');
        $sen = MD5($this->input->post('senha'));

        if ($sen == $this->session->userdata('senha')) {
            $servico = $this->manutencaomodel->getServById($id);
            $servico['servico_ativo_id'] = 1;
            $this->manutencaomodel->editServ($servico, $id);

            $this->session->set_userdata('reativar', 1);
            redirect(base_url('servicos'));
        } else {
            $this->session->set_userdata('reativar', 2);
            redirect(base_url('servicos'));
        }
    }

    // **======================================================================**
    // ||                        Funções de Garantia                           ||
    // **======================================================================**

    public function insertGarantia()
    {


        $data = null;
        $km = null;

        if ($this->input->post('garantia_tipo') == 1) {
            $km = $this->input->post('garantia_val');
        } else if ($this->input->post('garantia_tipo') == 2) {
            $data = $this->input->post('garantia_val');
        } else if ($this->input->post('garantia_tipo') == 3) {
            $ex = explode('|', $this->input->post('garantia_val'));
            $km = $ex[0];
            $data = $ex[1];
        }

        $new = array(
            'garantia_os_id'        => $this->input->post('os_id'),
            'garantia_item_id'      => $this->input->post('item_id'),
            'garantia_item_tipo'    => $this->input->post('item_tipo'),
            'garantia_km'           => $km,
            'garantia_data'         => $data,
        );

        $id = $this->manutencaomodel->insertGarantia($new);

        if ($this->input->post('garantia_tipo') == 1) {
            echo 'Até ' . $km . ' km';
        } else if ($this->input->post('garantia_tipo') == 2) {
            echo 'Até ' . date('d/m/Y', strtotime($data));
        } else if ($this->input->post('garantia_tipo') == 3) {
            echo 'Até ' . $km . ' km e/ou até ' . date('d/m/Y', strtotime($data));
        }
    }

    public function pegaGarantia()
    {


        $id = $this->input->post('os');
        $item = $this->input->post('id');
        if ($this->input->post('tipo') == 's') {
            $tipo = 'SERVIÇO';
        } else {
            $tipo = 'PEÇA';
        }

        $garantia = $this->manutencaomodel->getGarantiaByParams($id, $tipo, $item);

        echo json_encode($garantia);
    }

    public function editaGarantia()
    {


        $km = null;
        $data = null;
        if ($this->input->post('tipo_garantia') == 1) {
            $km = $this->input->post('val');
        } else if ($this->input->post('tipo_garantia') == 2) {
            $data = $this->input->post('val');
        } else if ($this->input->post('tipo_garantia') == 3) {
            $ex = explode('|', $this->input->post('val'));
            $km = $ex[0];
            $data = $ex[1];
        }

        $id = $this->input->post('id');

        $edit = array(
            'garantia_os_id'        => $this->input->post('os'),
            'garantia_item_id'      => $this->input->post('item'),
            'garantia_item_tipo'    => $this->input->post('tipo'),
            'garantia_km'           => $km,
            'garantia_data'         => $data,
        );

        $this->manutencaomodel->editGarantia($edit, $id);

        if ($this->input->post('tipo_garantia') == 1) {
            echo 'Até ' . $km . ' km';
        } else if ($this->input->post('tipo_garantia') == 2) {
            echo 'Até ' . date('d/m/Y', strtotime($data));
        } else if ($this->input->post('tipo_garantia') == 3) {
            echo 'Até ' . $km . ' km e/ou até ' . date('d/m/Y', strtotime($data));
        }
    }
}
