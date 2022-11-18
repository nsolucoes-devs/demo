<?php

class Notafiscal extends MY_Controller{
    
    /*
        $this->load->helper('mpdf');
        $html = $this->load->view(PAGINA, DADOS, true);
        pdf_create($html, NOMEARQUIVO . date('d/m/y'), TRUE);
    */
    
    //function que carrega a view de index da nota fiscal
    public function index(){
        $this->load->database();
        $this->load->model('contas/Notafiscalmodel');
        
        $data['notasfiscais'] = $this->Notafiscalmodel->getNotas();
        
        $this->header(11);
        $this->load->view('contas/telaNotasFiscais', $data);
        $this->footer();
    }
    
    //function que carrega a view de vizualização unica
    public function notaUnica(){
        $this->load->database();
        $this->load->model('contas/Notafiscalmodel');
        $this->load->model('cidades/Cidades');
        $this->load->model('estados/Estados');
        $this->load->model('fornecedoresmodel');
        $this->load->model('Produtosmodel');
        $this->load->model('estoque_produto/crudestoque');
        
        $id = $this->uri->segment(3);
        $data['notafiscal'] = $this->Notafiscalmodel->getNotaUnica($id);
        $data['notafiscal']['cpf_transp'] = $this->mask($data['notafiscal']['cpf_transp'], '###.###.###-##');
        $data['cidades'] = $this->Cidades->getCidades();
        $data['estados'] = $this->Estados->getEstados();
        $data['fornecedor'] = $this->fornecedoresmodel->getById($data['notafiscal']['fornecedor_id']);
        $data['loja']['cnpj_loja'] = $this->mask($data['loja']['cnpj_loja'], '##.###.###/####-##');
        $data['tiposfatura'] = $this->Notafiscalmodel->getFaturas();
        $itens = $this->Notafiscalmodel->getItens($data['notafiscal']['id_nf']);
        if($itens != null){
            $str = null;
            foreach($itens as $itn){
                $estoque = $this->crudestoque->getEstoqueLoja($data['notafiscal']['loja_id']);
                foreach($estoque as $est){
                    if($est['id_estoque'] == $itn['estoque_id']){
                        $prod = $this->produtosmodel->getById($est['produto_id']);
                        $str = $str . "<tr>" .
                        "<td>" . $prod['codigo_produto'] . ' | ' . $est['modelo_produto'] . "</td>" .
                        "<td>" . $prod['nome_produto'] . ' | ' . $est['modelo_produto'] . "</td>" .
                        "<td>" . $itn['unidade'] . "</td>" .
                        "<td>" . $itn['quantidade'] . "</td>" .
                        "<td>" . $itn['preco_unidade'] . "</td>" .
                        "<td>" . $itn['preco_total'] . "</td>" .
                        "<td>" . $itn['bc_icms'] . "</td>" .
                        "<td>" . $itn['valor_icms'] . "</td>" .
                        "<td>" . $itn['valor_ipi'] . "</td>" .
                        "</tr>";
                    }
                }
            }
            $data['itens'] = $str;
        }else{
            $data['itens'] = null;
        }
        $data['produtos'] = $this->produtosmodel->getProdutos();
        
        $this->header(11);
        $this->load->view('contas/notaUnica', $data);
        $this->footer();
    }
    
    //função que vai chamar a tela para edição
    public function editaNota(){
        $id = $this->uri->segment(3);
        $this->telaCadastro(null, null, $id);
    }
    
    //função que vai carregar a view de cadastro
    public function telaCadastro($erro=null, $aux=null, $id=null){
        $this->load->database();
        $this->load->model('contas/Notafiscalmodel');
        $this->load->model('cidades/Cidades');
        $this->load->model('estados/Estados');
        $this->load->model('fornecedoresmodel');
        $this->load->model('Produtosmodel');
        $this->load->model('estoque_produto/crudestoque');
        $this->load->model('cores/crudcores');
        
        if($erro == null){
            $data['erro'] = 0;
        }else{
            $data['erro'] = $erro;
        }
        if($aux == null){
            $data['aux'] = 0;
        }else{
            $data['aux'] = $aux;
        }
        if($id != null){
            $data['nota'] = $this->Notafiscalmodel->getNotaUnica($id);
            $data['nota']['cpf_transp'] = $this->mask($data['nota']['cpf_transp'], '###.###.###-##');
        }else{
            $id = $this->uri->segment(3);
            $data['nota2'] = $this->Notafiscalmodel->getNotaUnica($id);
            if($data['nota2'] != null){
                $data['nota'] = $this->Notafiscalmodel->getNotaUnica($id);
            }else{
                $data['nota'] = null;
            }
        }
        if($id != null ){
            $itens = $this->Notafiscalmodel->getItens($id);
            $str = null;
            foreach($itens as $itn){
                $estoque = $this->crudestoque->getEstoqueLoja($data['nota']['loja_id']);
                foreach($estoque as $est){
                    if($est['id_estoque'] == $itn['estoque_id']){
                        $cores = $this->crudcores->getCores();
                        foreach($cores as $cor){
                            if($cor['id_cor'] == $est['cor_produto']){
                                $prod = $this->Produtosmodel->getById($est['produto_id']);
                                $str = $str . "<tr>" .
                                "<td>" . $prod['codigo_produto'] . "</td>" .
                                "<td>" . $prod['nome_produto'] . ' | ' . $est['modelo_produto'] . ' | ' . $cor['nome_cor'] . "</td>" .
                                "<td>" . $itn['unidade'] . "</td>" .
                                "<td>" . $itn['quantidade'] . "</td>" .
                                "<td>" . $itn['preco_unidade'] . "</td>" .
                                "<td>" . $itn['preco_total'] . "</td>" .
                                "<td>" . $itn['bc_icms'] . "</td>" .
                                "<td>" . $itn['valor_icms'] . "</td>" .
                                "<td>" . $itn['valor_ipi'] . "</td>" .
                                "</tr>";
                            }
                        }
                    }
                }
            }
            $data['itens'] = $str;
        }else{
            $data['itens'] = null;
        }
        $data['cidades'] = $this->Cidades->getCidades();
        $data['estados'] = $this->Estados->getEstados();
        $data['fornecedores'] = $this->fornecedoresmodel->getAll();
        $data['tiposfatura'] = $this->Notafiscalmodel->getFaturas();
        $data['produtos'] = $this->Produtosmodel->getAll();
        
        $this->header(11);
        $this->load->view('contas/cadastroNota', $data);
        $this->footer();
    }
    
    //função que vai controlar o submit de cadastro
    public function controlaCadastro(){
        $limpeza = array('/', '.', '-', ',');
        $limpaponto = array('.');
	    $cpf_transp = str_replace($limpeza, "", $this->input->post('cpf_transp'));
        if(empty($this->input->post('bc_icms'))){
	        $bc_icms = 0.00;
	    }else{
	        $bc_icms = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('bc_icms')));
	    }
	    if(empty($this->input->post('valor_icms'))){
	        $valor_icms = 0.00;
	    }else{
	        $valor_icms = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_icms')));
	    }
	    if(empty($this->input->post('bc_icms_sub'))){
	        $bc_icms_sub = 0.00;
	    }else{
	        $bc_icms_sub = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('bc_icms_sub')));
	    }
	    if(empty($this->input->post('valor_icms_sub'))){
	        $valor_icms_sub = 0.00;
	    }else{
	        $valor_icms_sub = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_icms_sub')));
	    }
	    if(empty($this->input->post('valor_total_prod'))){
	        $valor_total_prod = 0.00;
	    }else{
	        $valor_total_prod = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_total_prod')));
	    }
	    if(empty($this->input->post('valor_frete'))){
	        $valor_frete = 0.00;
	    }else{
	        $valor_frete = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_frete')));
	    }
	    if(empty($this->input->post('valor_seg'))){
	        $valor_seg = 0.00;
	    }else{
	        $valor_seg = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_seg')));
	    }
	    if(empty($this->input->post('desconto'))){
	        $desconto = 0.00;
	    }else{
	        $desconto = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('desconto')));
	    }
	    if(empty($this->input->post('outros'))){
	        $outros = 0.00;
	    }else{
	        $outros = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('outros')));
	    }
	    if(empty($this->input->post('valor_ipi'))){
	        $valor_ipi = 0.00;
	    }else{
	        $valor_ipi = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_ipi')));
	    }
	    if(empty($this->input->post('valor_total'))){
	        $valor_total = 0.00;
	    }else{
	        $valor_total = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_total')));
	    }
        $nota = array(
                'fornecedor_id'     => $this->input->post('fornecedor'),
                'nome_nf'           => $this->input->post('nome'),
                'numero_nf'         => $this->input->post('numero'),
                'folha_nf'          => $this->input->post('folhas'),
                'serie_nf'          => $this->input->post('serie'),
                'loja_id'           => $this->input->post('destinatario'),
                'data_emissao'      => $this->input->post('data_emissao'),
                'data_saida'        => $this->input->post('data_saida'),
                'hora_saida'        => $this->input->post('hora_saida'),
                'tipo_fatura'       => $this->input->post('tipo'),
                'bc_icms'           => $bc_icms,
                'valor_icms'        => $valor_icms,
                'bc_icms_sub'       => $bc_icms_sub,
                'valor_icms_sub'    => $valor_icms_sub,
                'valor_total_prod'  => $valor_total_prod,
                'valor_frete'       => $valor_frete,
                'valor_seg'         => $valor_seg,
                'desconto'          => $desconto,
                'outros'            => $outros,
                'valor_total_ipi'   => $valor_ipi,
                'valor_total_nota'  => $valor_total,
                'nome_transp'       => $this->input->post('nome_transp'),
                'placa_veic'        => $this->input->post('placa_transp'),
                'uf_placa'          => $this->input->post('uf_placa_transp'),
                'cpf_transp'        => $cpf_transp,
                'cidade_transp'     => $this->input->post('cidade'),
                'estado_transp'     => $this->input->post('estado'),
                'qtde_transp'       => $this->input->post('qtde_transp'),
                'especie_transp'    => $this->input->post('especie_transp'),
                'peso_bruto'        => str_replace(',', "", $this->input->post('pesobruto')),
                'peso_liq'          => str_replace(',', "", $this->input->post('pesoliq')),
            );
        if(!empty($this->input->post('btn_item'))){
            $this->cadastrarSemRedirect($nota);
        }
        if(!empty($this->input->post('cadastrar'))){
            $this->cadastrarNota($nota);
        }
    }
    
    //função que vai controlar o submit de atualizar
    public function controlaAtualizacao(){
        $limpeza = array('/', '.', '-', ',');
        $limpaponto = array('.');
	    $cpf_transp = str_replace($limpeza, "", $this->input->post('cpf_transp'));
	    $id = $this->input->post('id');
	    if(empty($this->input->post('bc_icms'))){
	        $bc_icms = 0.00;
	    }else{
	        $bc_icms = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('bc_icms')));
	    }
	    if(empty($this->input->post('valor_icms'))){
	        $valor_icms = 0.00;
	    }else{
	        $valor_icms = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_icms')));
	    }
	    if(empty($this->input->post('bc_icms_sub'))){
	        $bc_icms_sub = 0.00;
	    }else{
	        $bc_icms_sub = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('bc_icms_sub')));
	    }
	    if(empty($this->input->post('valor_icms_sub'))){
	        $valor_icms_sub = 0.00;
	    }else{
	        $valor_icms_sub = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_icms_sub')));
	    }
	    if(empty($this->input->post('valor_total_prod'))){
	        $valor_total_prod = 0.00;
	    }else{
	        $valor_total_prod = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_total_prod')));
	    }
	    if(empty($this->input->post('valor_frete'))){
	        $valor_frete = 0.00;
	    }else{
	        $valor_frete = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_frete')));
	    }
	    if(empty($this->input->post('valor_seg'))){
	        $valor_seg = 0.00;
	    }else{
	        $valor_seg = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_seg')));
	    }
	    if(empty($this->input->post('desconto'))){
	        $desconto = 0.00;
	    }else{
	        $desconto = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('desconto')));
	    }
	    if(empty($this->input->post('outros'))){
	        $outros = 0.00;
	    }else{
	        $outros = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('outros')));
	    }
	    if(empty($this->input->post('valor_ipi'))){
	        $valor_ipi = 0.00;
	    }else{
	        $valor_ipi = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_ipi')));
	    }
	    if(empty($this->input->post('valor_total'))){
	        $valor_total = 0.00;
	    }else{
	        $valor_total = str_replace(',', '.', str_replace($limpaponto, "", $this->input->post('valor_total')));
	    }
        $nota = array(
                'fornecedor_id'     => $this->input->post('fornecedor'),
                'nome_nf'           => $this->input->post('nome'),
                'numero_nf'         => $this->input->post('numero'),
                'folha_nf'          => $this->input->post('folhas'),
                'serie_nf'          => $this->input->post('serie'),
                'loja_id'           => $this->input->post('destinatario'),
                'data_emissao'      => $this->input->post('data_emissao'),
                'data_saida'        => $this->input->post('data_saida'),
                'hora_saida'        => $this->input->post('hora_saida'),
                'tipo_fatura'       => $this->input->post('tipo'),
                'bc_icms'           => $bc_icms,
                'valor_icms'        => $valor_icms,
                'bc_icms_sub'       => $bc_icms_sub,
                'valor_icms_sub'    => $valor_icms_sub,
                'valor_total_prod'  => $valor_total_prod,
                'valor_frete'       => $valor_frete,
                'valor_seg'         => $valor_seg,
                'desconto'          => $desconto,
                'outros'            => $outros,
                'valor_total_ipi'   => $valor_ipi,
                'valor_total_nota'  => $valor_total,
                'nome_transp'       => $this->input->post('nome_transp'),
                'placa_veic'        => $this->input->post('placa_transp'),
                'uf_placa'          => $this->input->post('uf_placa_transp'),
                'cpf_transp'        => $cpf_transp,
                'cidade_transp'     => $this->input->post('cidade'),
                'estado_transp'     => $this->input->post('estado'),
                'qtde_transp'       => $this->input->post('qtde_transp'),
                'especie_transp'    => $this->input->post('especie_transp'),
                'peso_bruto'        => str_replace(',', "", $this->input->post('pesobruto')),
                'peso_liq'          => str_replace(',', "", $this->input->post('pesoliq')),
            );
        if(!empty($this->input->post('btn_item'))){
            $this->atualizaSemRedirect($nota, $id);
        }
        if(!empty($this->input->post('cadastrar'))){
            $this->atualizaNota($nota, $id);
        }
    }
    
    //função que vai cadastrar no banco de dados
    public function cadastrarNota($nota){
        $this->load->database();
        $this->load->model('contas/Notafiscalmodel');

        if(strlen($nota['cpf_transp']) != 11){
            $this->telaCadastro(2);
        }else{
            $id = $this->Notafiscalmodel->inserirNota($nota);
            if($id != null){
                $data['notasfiscais'] = $this->Notafiscalmodel->getNotas();
                
                $this->header(11);
                $this->load->view('contas/telaNotasFiscais', $data);
                $this->footer();
            }else{
                $this->telaCadastro(1);
            }
        }
    }
    
    public function cadastrarSemRedirect($nota){
        $this->load->database();
        $this->load->model('contas/Notafiscalmodel');
        
        if(strlen($nota['cpf_transp']) != 11){
            $this->telaCadastro(2);
        }else{
            $id = $this->Notafiscalmodel->inserirNota($nota);
            if($id != null){
                $this->telaItem($id);
            }else{
                $this->telaCadastro(1);
            }
        }
    }
    
    //function que carrega a tela de iserção de item
    public function telaItem($id){
        $this->load->database();
        $this->load->model('estoque_produto/crudestoque');
        $this->load->model('Produtosmodel');
        $this->load->model('contas/Notafiscalmodel');
        $this->load->model('cores/crudcores');
        
        $data['produtos'] = $this->Produtosmodel->getAll();
        $data['id'] = $id;
        $data['cores'] = $this->crudcores->getcores();
        $data['nota'] = $this->Notafiscalmodel->getNotaUnica($id);
        $data['estoque'] = $this->crudestoque->getEstoqueLoja($data['nota']['loja_id']);
        $this->header(11);
        $this->load->view('contas/itensNota', $data);
        $this->footer();
    }
    
    //function que insere o item da nota
    public function insereItem(){
        $this->load->database();
        $limpeza = array('/', '.', '-', ',');
        $this->load->model('contas/Notafiscalmodel');
        $this->load->model('estoque_produto/crudestoque');
        
        $item = array(
                'nota_id'       => $this->input->post('nf_id'),
                'estoque_id'    => $this->input->post('produto_id'),
                'quantidade'    => $this->input->post('quantidade'),
                'unidade'       => $this->input->post('unidade'),
                'preco_unidade' => str_replace($limpeza, ".", $this->input->post('preco_unidade')),
                'preco_total'   => str_replace($limpeza, ".", $this->input->post('preco_total')),
                'bc_icms'       => str_replace($limpeza, ".", $this->input->post('bc_icms')),
                'valor_icms'    => str_replace($limpeza, ".", $this->input->post('valor_icms')),
                'valor_ipi'     => str_replace($limpeza, ".", $this->input->post('valor_ipi')),
                'nf_excluida'   => 0,
            );
        $estoquenovo = $this->crudestoque->getEstoqueId($item['estoque_id']);
        $estoquenovo['estoque'] = $estoquenovo['estoque'] + $item['quantidade'];
        $update = $this->crudestoque->atualizarEstoque($estoquenovo, $item['estoque_id']);
        $retorno = $this->Notafiscalmodel->insereItem($item);
        if($retorno != null){
            $this->telaCadastro(null, 1, $this->input->post('nf_id'));
        }
    }
    
    //function que exclui uma nota
    public function excluirNota($id=null){
        $this->load->database();
	    $this->load->model('contas/Notafiscalmodel');
	    $this->load->model('estoque_produto/crudestoque');
	    
	    if($id == null){
	        $id = $this->input->post('idnf');
	    }
	    $antiga = $this->Notafiscalmodel->getNotaUnica($id);
	    $antiga['motivo_exclusao'] = $this->input->post('motivo');
	    $antiga['funcionario_exclusao'] = $this->session->userdata('id_pessoa');
	    $this->Notafiscalmodel->deletarNota($id);
	    $ex = $this->Notafiscalmodel->inserirNotaExcluida($antiga);
	    $itens = $this->Notafiscalmodel->getItensEx($antiga['id_nf']);
	    foreach($itens as $itn){
	        if($itn['nf_excluida'] == 0){
	            $itn['nf_excluida'] = $ex;
	            $estoquenovo = $this->crudestoque->getEstoqueId($itn['estoque_id']);
	            $estoquenovo['estoque'] = $estoquenovo['estoque'] - $itn['quantidade'];
	            $update = $this->crudestoque->atualizarEstoque($estoquenovo, $itn['estoque_id']);
	            $this->Notafiscalmodel->updateItem($itn['id_inf'], $itn);
	        }
	    }
	    
	    $this->index();
	}
	
	//function que atualiza uma nota
	public function atualizaNota($nota, $id){
        $this->load->database();
        $this->load->model('contas/Notafiscalmodel');
        
        if(strlen($nota['cpf_transp']) != 11){
            $this->telaCadastro(2);
        }else{
            $update = $this->Notafiscalmodel->updateNota($id, $nota);
            if($update != null){
                $data['notasfiscais'] = $this->Notafiscalmodel->getNotas();
                
                $this->header(11);
                $this->load->view('contas/telaNotasFiscais', $data);
                $this->footer();
            }else{
                $this->telaCadastro(1);
            }
        }
    }
    
    //function que atualiza uma nota sem redirect
	public function atualizaSemRedirect($nota, $id){
        $this->load->database();
        $this->load->model('contas/Notafiscalmodel');
        
        if(strlen($nota['cpf_transp']) != 11){
            $this->telaCadastro(2);
        }else{
            $update = $this->Notafiscalmodel->updateNota($id, $nota);
            if($update != null){
                $this->telaItem($id);
            }else{
                $this->telaCadastro(1);
            }
        }
    }
}