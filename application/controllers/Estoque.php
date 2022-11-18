<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoque extends MY_Controller {
        
    public function index(){
        $this->header('3');
        $this->load->view('icon');
        $this->footer();
    }
    
	public function __construct(){
        parent::__construct();
	    $this->load->database();
	    $this->load->model('produtosmodel');
	    $this->load->model('estoquemodel');
	    $this->load->model('fornecedoresmodel');
	    $this->load->model('produtosmodel');
	    $this->load->model('usuariosmodel');
	    $this->load->model('cadastrosmodel');
	    $this->load->model('financeiromodel');
	    $this->load->model('manutencaomodel');
	    $this->load->model('clientesmodel');
	    date_default_timezone_set('America/Sao_Paulo');
	}
	
	function reformatavalor($valor){
	    $valor = str_replace(".", "", $valor);
	    $valor = str_replace(",", ".", $valor);
	    return $valor;
	}
	
	public function indice(){
	    
	    $this->acessorestrito("ESTOQUE");
	    
	    $this->load->library("pagination");
        
        $filtro = mb_strtoupper($this->input->post('filtro'));
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        } 
        
        $uri_segment = 4;
        $config = array();
        if($filtro){
            $config["base_url"] = base_url('movimentosestoque/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('movimentosestoque/n/');
            $uri_segment = 3;
        }
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $config["total_rows"] = $this->estoquemodel->get_countNotasFiltro($filtro);    
        $config["per_page"] = 10;
        
        $this->pagination->initialize($config);
        
        $movimentos = $this->estoquemodel->getAllNotasFiltro($filtro, 10, $page);
        
	    $data = array(
	        'estoques'      => $this->produtosmodel->estoqueAll(),
	        'produtos'      => $this->produtosmodel->getAll(),
	        'servicos'      => $this->manutencaomodel->getAllServAtivos(),
	        'fornecedores'  => $this->fornecedoresmodel->getAll(),
	        'operacoes'     => $this->estoquemodel->getTiposAtivos(),
	        'chave'         => $this->chaveunica(),
	        'nota'          => intval($this->estoquemodel->getLastIdNota())+1,
	    );
	    
	    $array     = [];
	    $cont   = 0;
	    
	    foreach($movimentos as $mv){
	        $tipo = $this->estoquemodel->getTipoUnico($mv['notafiscal_operacao']);
	        
	        $tomador_nome = "Não encontrado";
	        if($mv['notafiscal_cliente'] == 1){
	            $cliente = $this->clientesmodel->getCPFCNPJ($mv['notafiscal_fornecedor']);    
	            $tomador_nome = $cliente['cliente_nome'];
	        } else {
	            $fornecedor = $this->fornecedoresmodel->getByIdRowArray($mv['notafiscal_fornecedor']);
	            $tomador_nome = $fornecedor['fornecedor_nome'];
	        }
	        
	        
	        $array[$cont] = array(
	            'id'            => $mv['notafiscal_id'],
	            'emissao'       => date('d/m/Y', strtotime($mv['notafiscal_dtemissao'])),
	            'numeroserie'   => $mv['notafiscal_numero'].$mv['notafiscal_serie'],
	            'tipo'          => $tipo['tm_nome'],
	            'forneclin'     => $tomador_nome,
	            'especie'       => $mv['notafiscal_especie'],
	            'valor'         => 'R$ ' . number_format($mv['notafiscal_valorfinal'],4,',','.'),
	        );
	        $cont++;
	    }
	    
	    $data['movimentos'] = $array;
	    
	    $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
	    
	    if($this->session->userdata('erro')){
	        $data['erro'] = $this->session->userdata('erro');
	        $this->session->unset_userdata('erro');
	    } else {
	        $data['erro'] = null;
	    }
	    
	    $this->header('3.1', 'Movimentos de Estoque', 'estoque', 'Estoque', 'Movimentos de Estoque');
	    $this->load->view('estoque/listagem', $data);
	    $this->footer();
	}
	
	public function adicionaEstoque(){
	    
	    
	    $new = array(
	            'estoque_produto_id'    => $this->input->post('id_add'),
	            'estoque_data_insert'   => $this->input->post('data_add'),
	            'estoque_quantidade'    => $this->input->post('qtd_add'),
	            'estoque_nota_id'       => $this->refatorarString($this->input->post('nota_add')),
	            'estoque_detalhes'      => $this->refatorarString($this->input->post('detalhes_add')),
	            'estoque_usuario'       => $this->session->userdata('user_id'),
	        );
	        
	   $this->produtosmodel->insertEstoque($new);
	   
	   redirect(base_url('movimentosestoque'), 'refresh');
	}
	
	public function reduzirEstoque(){
	    
	    
	    $rmv = array(
	            'estoque_produto_id'    => $this->input->post('id_rmv'),
	            'estoque_data_insert'   => $this->input->post('data_rmv'),
	            'estoque_quantidade'    => "-".$this->input->post('qtd_rmv'),
	            'estoque_nota_id'       => $this->refatorarString($this->input->post('nota_rmv')),
	            'estoque_detalhes'      => $this->refatorarString($this->input->post('detalhes_rmv')),
	            'estoque_usuario'       => $this->session->userdata('user_id'),
	        );
	       
	   $this->produtosmodel->insertEstoque($rmv);
	   redirect(base_url('movimentosestoque'), 'refresh');
	}
	
	public function mostrar(){
	    
	    $this->acessorestrito("ESTOQUE");
	    
	    $id = $this->uri->segment(2);
	    
	    $data = array(
	            'estoques'  => $this->produtosmodel->getEstoqueByProd($id),
	            'produto'   => $this->produtosmodel->getByIdRowArray($id),
	        );
	    
	    $this->header('3.1', 'VISUALIZAÇÃO DE PEÇA DO ESTOQUE', 'estoque', 'Estoque', 'Visualização de peça do estoque');
	    $this->load->view('estoque/mostrar', $data);
	    $this->footer();
	}
	
	// **===============================================================================**
    // ||                        Funções de Tipo de Movimento                           ||
    // **===============================================================================**
    
    public function tiposMovimento($erro = null){
        
        $this->acessorestrito("ESTOQUE");
        if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
        
        $data = array(
                'tipos'     => $this->estoquemodel->getTipos(),
                'erro'      => $erro,
        );
        
        $this->header('3.2', 'OPERAÇÕES DE ESTOQUE', 'estoque', 'Estoque', 'Operações de Estoque');
        $this->load->view('estoque/listagemTiposMovimento', $data);
        $this->footer();
    }
    public function novoTipo(){
        
        
        $movimenta = ($this->input->post('movimenta_add') != null ? '1' : '0');
        $devolucao = ($this->input->post('devolucao_add') != null ? '1' : '0');
        $prod = ($this->input->post('item_add') == 1 ? 1 : 0);
        $serv = ($this->input->post('item_add') == 2 ? 1 : 0);
        $nota = ($this->input->post('nota_add') != null ? '1' : '0');
        
        $new = array(
                'tm_nome'               => $this->refatorarString($this->input->post('nome_add')),
                'tm_tipo'               => $this->input->post('tipo_add'),
                'tm_movimenta_estoque'  => $movimenta,
                'tm_nota_fiscal'        => $nota,
                'tm_possui_movimento'   => 0,
                'tm_devolucao'          => $devolucao,
                'tm_ativo_id'           => 1,
                'tm_produto'            => $prod,
                'tm_servico'            => $serv,
            );
            
        $id = $this->estoquemodel->insertTipo($new);

        redirect(base_url('operacoesestoque'), 'refresh');
    }
    public function editaTipo(){
        
        
        $movimenta = ($this->input->post('movimenta_edit') != null ? '1' : '0');
        $devolucao = ($this->input->post('devolucao_edit') != null ? '1' : '0');
        $prod = ($this->input->post('item_edit') == 1 ? 1 : 0);
        $serv = ($this->input->post('item_edit') == 2 ? 1 : 0);
        $nota = ($this->input->post('nota_edit') != null ? '1' : '0');
        $id = $this->input->post('id_edit');
        
        $edit = array(
                'tm_nome'               => $this->refatorarString($this->input->post('nome_edit')),
                'tm_tipo'               => $this->input->post('tipo_edit'),
                'tm_movimenta_estoque'  => $movimenta,
                'tm_nota_fiscal'        => $nota,
                'tm_possui_movimento'   => 0,
                'tm_devolucao'          => $devolucao,
                'tm_ativo_id'           => $this->input->post('ativo_edit'),
                'tm_produto'            => $prod,
                'tm_servico'            => $serv,
            );
            
        $this->estoquemodel->editTipo($edit, $id);
        
        redirect(base_url('operacoesestoque'), 'refresh');
    }
    public function getTipo(){
        
        
        $id = $this->input->post('id');
        $tipo = $this->estoquemodel->getTipoUnico($id);
        
        echo json_encode($tipo);
    }
    public function deletaTipo(){
        
        
        $id = $this->input->post('id_rmv');
        $senha = MD5($this->input->post('senha'));
        
        if($senha == $this->session->userdata('senha')){
            $tipo = $this->estoquemodel->getTipoUnico($id);
            
            $tipo['tm_ativo_id'] = 2;
            $this->estoquemodel->editTipo($tipo, $id);
            
            $this->session->set_userdata('delete', 2);
            redirect(base_url('operacoesestoque'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 1);
            redirect(base_url('operacoesestoque'), 'refresh');
        }
    }
    
    // **===============================================================================**
    // ||                        Funções de Notas Fiscais                               ||
    // **===============================================================================**
    
    function chaveunica(){
        
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789-_";
        $string = '';
        for($i = 0; $i < 15; $i++){
            $string .= $chars[mt_rand(0,62)];
        }
        
        $date = date('Y-m-d H:m:s');
        
        $salt = "Chave Secreta que vai ser utilizada para gerar a chave de acesso!";
        $chave = $date.$string.$salt;
        
        for($i= 0; $i < 10; $i++){
            $chave = hash('sha256', $chave);
        }
        
        if($this->estoquemodel->unikey($chave) != ""){
            $this->chaveunica();
        }else{
            return $chave;
        }
    }
    
    function notafiscal(){
        
        
        $forneclin = explode('|', $this->input->post('forneclin'));
        
        if($forneclin[0] == 'F'){
            $forneclin[0] = 0;
        } else {
            $forneclin[0] = 1;
        }
        
        $data = array(
            'notafiscal_chave'        =>  $this->input->post('chave'),
            'notafiscal_valoricmssub' =>  $this->reformatavalor($this->input->post('subicms')),
            'notafiscal_bcicmssub'    =>  $this->reformatavalor($this->input->post('basesubicms')),
            'notafiscal_bcicms'       =>  $this->reformatavalor($this->input->post('baseicms')),
            'notafiscal_valoripi'     =>  $this->reformatavalor($this->input->post('ipi')),
            'notafiscal_valoricms'    =>  $this->reformatavalor($this->input->post('icms')),
            'notafiscal_vlrfrete'     =>  $this->reformatavalor($this->input->post('frete')),
            'notafiscal_placaveic'    =>  $this->input->post('placa'),
            'notafiscal_cnpjtrans'    =>  $this->input->post('cnpj'),
            'notafiscal_nometrans'    =>  $this->input->post('transportadora'),
            'notafiscal_dtemissao'    =>  $this->input->post('emissao'),
            'notafiscal_especie'      =>  $this->input->post('especie'),
            'notafiscal_serie'        =>  $this->input->post('serie'),
            'notafiscal_numero'       =>  $this->input->post('numero'),
            'notafiscal_fornecedor'   =>  $forneclin[1],
            'notafiscal_operacao'     =>  $this->input->post('operacao'),
            'notafiscal_cliente'      =>  $forneclin[0],
            'notafiscal_valorfinal'   =>  $this->reformatavalor($this->input->post('valor')),
            'notafiscal_numos'        =>  $this->input->post('numos'),
            'notafiscal_acrescimo'    =>  $this->reformatavalor($this->input->post('acrescimo')),
            'notafiscal_desconto'     =>  $this->reformatavalor($this->input->post('desconto')),
        );
        
            
        $id = $this->estoquemodel->putnota($data);
        $helper = $this->estoquemodel->getTipoUnico($this->input->post('operacao'));
        
        if($this->input->post('ctE') != 0 || $this->input->post('ctE') != '0'){
            
            $produtos   = explode('¬', $this->input->post('produtos'));
            $quantias   = explode('¬', $this->input->post('quantidades'));
            $valor      = explode('¬', $this->input->post('produtovalores'));
            
            
            for($i=0; $i<count($produtos); $i++){
                if($helper['tm_movimenta_estoque'] == "1"){
                    
                    if($helper['tm_tipo'] == "ENTRADA"){

                        $dados = array(
                            'estoque_produto_id'    => $produtos[$i],
                            'estoque_produto_ancora'=> $produtos[$i],
                            'estoque_data_insert'   => $this->input->post('emissao'),
                            'estoque_quantidade'    => $quantias[$i],
                            'estoque_nota_id'       => $id,
                            'estoque_detalhes'      => "",
                            'estoque_usuario'       => $this->session->userdata('user_id'),
                            'estoque_valor'         => $valor[$i],
                        );
                        
                        $prod = $this->estoquemodel->produtoById($produtos[$i]);
                        if($prod['produto_preco_custo'] != $valor[$i]){
                            $OldId = $prod['produto_id'];
                            
                            $prod['produto_ativo_id'] = 4;
                            $this->estoquemodel->updateprodutoById($prod, $OldId);
                            
                            $newId                          = $this->estoquemodel->getLastIdProduto();
                            $prod['produto_id']             = $newId['produto_id']+1;
                            $prod['produto_preco_custo']    = $valor[$i];
                            $prod['produto_ativo_id']       = 1;
                            $newId                          = $this->estoquemodel->insertUpdateId($prod);
                            
                            $this->estoquemodel->updateEstoqueId($newId, $OldId);
                            
                            $dados['estoque_produto_id'] = $newId;
                        }
                    }elseif($helper['tm_tipo'] == "SAIDA"){
                        $dados = array(
                            'estoque_produto_id'    => $produtos[$i],
                            'estoque_data_insert'   => $this->input->post('emissao'),
                            'estoque_quantidade'    => "-".$quantias[$i],
                            'estoque_nota_id'       => $id,
                            'estoque_detalhes'      => "",
                            'estoque_usuario'       => $this->session->userdata('user_id'),
                            'estoque_valor'         => $valor[$i],                        
                        );
                        
                        $prod = $this->estoquemodel->produtoById($produtos[$i]);
                        if($prod['produto_preco_custo'] != $valor[$i]){
                            $OldId = $prod['produto_id'];
                            
                            $prod['produto_ativo_id'] = 4;
                            $this->estoquemodel->updateprodutoById($prod, $OldId);
                            
                            $newId                          = $this->estoquemodel->getLastIdProduto();
                            $prod['produto_id']             = $newId['produto_id']+1;
                            $prod['produto_preco_custo']    = $valor[$i];
                            $prod['produto_ativo_id']       = 1;
                            $newId                          = $this->estoquemodel->insertUpdateId($prod);
                            
                            $this->estoquemodel->updateEstoqueId($newId, $OldId);
                            
                        }
                    }
                    
                    $datatitulo = array(
                        'numeroserie'   => $this->input->post('numero'). $this->input->post('serie'),
                        'forneclin'     => $this->input->post('forneclin'),
                        'tipo'          => $helper['tm_id'],
                        'valor'         => $this->reformatavalor($this->input->post('valor')),
                        'IO'            => $helper['tm_tipo'],
                    );
                    
                    $this->addTituloIncompleto($datatitulo);
                }else{

                    $dados = array(
                        'estoque_produto_id'    => $produtos[$i],
                        'estoque_produto_ancora'=> $produtos[$i],
                        'estoque_data_insert'   => $this->input->post('emissao'),
                        'estoque_quantidade'    => $quantias[$i],
                        'estoque_nota_id'       => $id,
                        'estoque_detalhes'      => "",
                        'estoque_usuario'       => $this->session->userdata('user_id'),
                        'estoque_valor'         => $valor[$i],
                    );
                    
                    $datatitulo = array(
                        'numeroserie'   => $this->input->post('numero'). $this->input->post('serie'),
                        'forneclin'     => $this->input->post('forneclin'),
                        'tipo'          => $helper['tm_id'],
                        'valor'         => $this->reformatavalor($this->input->post('valor')),
                        'IO'            => $helper['tm_tipo'],
                    );
                    
                    $this->addTituloIncompleto($datatitulo);
                }
                $this->produtosmodel->insertEstoque($dados);
            }
        }
        
        if($this->input->post('ctD') != 0 || $this->input->post('ctD') != '0'){
            $servicos = explode('¬', $this->input->post('servicos'));
            $quantias = explode('¬', $this->input->post('servicosqtd'));
            $valor = explode('¬', $this->input->post('servicosvalores'));
            $valortotal = 0;
            
            for($i=0; $i<count($servicos); $i++){
                $new = array(
                        'ns_nota_id'    => $id,
                        'ns_servico_id' => $servicos[$i],
                        'ns_preco'      => $valor[$i],
                        'ns_qtd'        => $quantias[$i],
                    );
                    
                $this->estoquemodel->insertNotaServico($new);
            }
            
            $datatitulo = array(
                'numeroserie'   => $this->input->post('numero'). $this->input->post('serie'),
                'forneclin'     => $this->input->post('forneclin'),
                'tipo'          => $helper['tm_id'],
                'valor'         => $this->reformatavalor($this->input->post('valor')),
                'IO'            => $helper['tm_tipo'],
            );
            
            $this->addTituloIncompleto($datatitulo);
            
        }
        
        if($forneclin[0] == 0){
            redirect(base_url('movimentosestoque'));    
        } else {
            redirect(base_url('financeiro/notasfiscais'));    
        }
        
    }
    
    function updatenotafiscal(){
        
        
        $forneclin = explode('|', $this->input->post('forneclin'));
        
        if($forneclin[0] == 'F'){
            $forneclin[0] = 0;
        } else {
            $forneclin[0] = 1;
        }
        
        $id = $this->input->post('id');
        
        $data = array(
            'notafiscal_chave'        =>  $this->input->post('chave'),
            'notafiscal_valoricmssub' =>  $this->reformatavalor($this->input->post('subicms')),
            'notafiscal_bcicmssub'    =>  $this->reformatavalor($this->input->post('basesubicms')),
            'notafiscal_bcicms'       =>  $this->reformatavalor($this->input->post('baseicms')),
            'notafiscal_valoripi'     =>  $this->reformatavalor($this->input->post('ipi')),
            'notafiscal_valoricms'    =>  $this->reformatavalor($this->input->post('icms')),
            'notafiscal_vlrfrete'     =>  $this->reformatavalor($this->input->post('frete')),
            'notafiscal_placaveic'    =>  $this->input->post('placa'),
            'notafiscal_cnpjtrans'    =>  $this->input->post('cnpj'),
            'notafiscal_nometrans'    =>  $this->input->post('transportadora'),
            'notafiscal_dtemissao'    =>  $this->input->post('emissao'),
            'notafiscal_especie'      =>  $this->input->post('especie'),
            'notafiscal_serie'        =>  $this->input->post('serie'),
            'notafiscal_numero'       =>  $this->input->post('numero'),
            'notafiscal_fornecedor'   =>  $forneclin[1],
            'notafiscal_operacao'     =>  $this->input->post('operacao'),
            'notafiscal_cliente'      =>  $forneclin[0],
            'notafiscal_valorfinal'   =>  $this->reformatavalor($this->input->post('valor')),
            'notafiscal_numos'        =>  $this->input->post('numos'),
            'notafiscal_acrescimo'    =>  $this->reformatavalor($this->input->post('acrescimo')),
            'notafiscal_desconto'     =>  $this->reformatavalor($this->input->post('desconto')),
        );
        
        
        $helper = $this->estoquemodel->getTipoUnico($this->input->post('operacao'));
        
        $produtoremover = explode('¬', $this->input->post('produtosremove'));
        foreach($produtoremover as $r){
            $this->estoquemodel->deleteEstoque($r);
        }
        
        $servicoremover = explode('¬', $this->input->post('servicosremove'));
        foreach($servicoremover as $s){
            $this->estoquemodel->deleteNotaServico($s);
        }
        
        if($this->input->post('ctE') != 0 || $this->input->post('ctE') != '0'){
            
            $produtos   = explode('¬', $this->input->post('produtos'));
            $quantias   = explode('¬', $this->input->post('quantidades'));
            $valor      = explode('¬', $this->input->post('produtovalores'));
            
            for($i=0; $i<count($produtos); $i++){
                
                $estoqueproduto = $this->estoquemodel->getEstoquesByNotaAndProduto($id, $produtos[$i]);
                
                if($helper['tm_movimenta_estoque'] == "1"){
                    
                    if($helper['tm_tipo'] == "ENTRADA"){

                        $dados = array(
                            'estoque_produto_id'    => $produtos[$i],
                            'estoque_produto_ancora'=> $produtos[$i],
                            'estoque_data_insert'   => $this->input->post('emissao'),
                            'estoque_quantidade'    => $quantias[$i],
                            'estoque_nota_id'       => $id,
                            'estoque_detalhes'      => "",
                            'estoque_usuario'       => $this->session->userdata('user_id'),
                            'estoque_valor'         => $valor[$i],
                        );
                        
                        $prod = $this->estoquemodel->produtoById($produtos[$i]);
                        
                        if($prod['produto_preco_custo'] != $valor[$i]){
                            $OldId = $prod['produto_id'];
                            
                            $prod['produto_ativo_id'] = 4;
                            $this->estoquemodel->updateprodutoById($prod, $OldId);
                            
                            $newId                          = $this->estoquemodel->getLastIdProduto();
                            $prod['produto_id']             = $newId['produto_id']+1;
                            $prod['produto_preco_custo']    = $valor[$i];
                            $prod['produto_ativo_id']       = 1;
                            $newId                          = $this->estoquemodel->insertUpdateId($prod);
                            
                            $this->estoquemodel->updateEstoqueId($newId, $OldId);
                            
                            $dados['estoque_produto_id'] = $newId;
                        }
                    }elseif($helper['tm_tipo'] == "SAIDA"){
                        $dados = array(
                            'estoque_produto_id'    => $produtos[$i],
                            'estoque_data_insert'   => $this->input->post('emissao'),
                            'estoque_quantidade'    => "-".$quantias[$i],
                            'estoque_nota_id'       => $id,
                            'estoque_detalhes'      => "",
                            'estoque_usuario'       => $this->session->userdata('user_id'),
                            'estoque_valor'         => $valor[$i],                        
                        );
                        
                        $prod = $this->estoquemodel->produtoById($produtos[$i]);
                        if($prod['produto_preco_custo'] != $valor[$i]){
                            $OldId = $prod['produto_id'];
                            
                            $prod['produto_ativo_id'] = 4;
                            $this->estoquemodel->updateprodutoById($prod, $OldId);
                            
                            $newId                          = $this->estoquemodel->getLastIdProduto();
                            $prod['produto_id']             = $newId['produto_id']+1;
                            $prod['produto_preco_custo']    = $valor[$i];
                            $prod['produto_ativo_id']       = 1;
                            $newId                          = $this->estoquemodel->insertUpdateId($prod);
                            
                            $this->estoquemodel->updateEstoqueId($newId, $OldId);
                            
                        }
                    }
                    
                    $datatitulo = array(
                        'numeroserie'   => $this->input->post('numero'). $this->input->post('serie'),
                        'forneclin'     => $this->input->post('forneclin'),
                        'tipo'          => $helper['tm_id'],
                        'valor'         => $this->reformatavalor($this->input->post('valor')),
                        'IO'            => $helper['tm_tipo'],
                    );
                    
                    $this->addTituloIncompleto($datatitulo);
                }else{

                    $dados = array(
                        'estoque_produto_id'    => $produtos[$i],
                        'estoque_produto_ancora'=> $produtos[$i],
                        'estoque_data_insert'   => $this->input->post('emissao'),
                        'estoque_quantidade'    => $quantias[$i],
                        'estoque_nota_id'       => $id,
                        'estoque_detalhes'      => "",
                        'estoque_usuario'       => $this->session->userdata('user_id'),
                        'estoque_valor'         => $valor[$i],
                    );
                    
                    
                    $datatitulo = array(
                        'numeroserie'   => $this->input->post('numero'). $this->input->post('serie'),
                        'forneclin'     => $this->input->post('forneclin'),
                        'tipo'          => $helper['tm_id'],
                        'valor'         => $this->reformatavalor($this->input->post('valor')),
                        'IO'            => $helper['tm_tipo'],
                    );
                    
                    $this->addTituloIncompleto($datatitulo);
                }
                
                if($estoqueproduto){
                    $this->estoquemodel->updateEstoque($dados, $estoqueproduto['estoque_id']);    
                } else {
                    $this->produtosmodel->insertEstoque($dados);       
                }
            }
        }
        
        if($this->input->post('ctD') != 0 || $this->input->post('ctD') != '0'){
            $servicos = explode('¬', $this->input->post('servicos'));
            $quantias = explode('¬', $this->input->post('servicosqtd'));
            $valor = explode('¬', $this->input->post('servicosvalores'));
            
            for($i=0; $i<count($servicos); $i++){
                
                $notaservico = $this->estoquemodel->getNotaServicoDouble($id, $servicos[$i]);
                
                $new = array(
                        'ns_nota_id'    => $id,
                        'ns_servico_id' => $servicos[$i],
                        'ns_preco'      => $valor[$i],
                        'ns_qtd'        => $quantias[$i],
                    );
                    
                if($notaservico){
                    $this->estoquemodel->updateNotaServico($new, $notaservico['ns_id']);
                } else {
                    $this->estoquemodel->insertNotaServico($new);    
                }
            }
            
            $datatitulo = array(
                'numeroserie'   => $this->input->post('numero'). $this->input->post('serie'),
                'forneclin'     => $this->input->post('forneclin'),
                'tipo'          => $helper['tm_id'],
                'valor'         => $this->reformatavalor($this->input->post('valor')),
                'IO'            => $helper['tm_tipo'],
            );
            
            $this->addTituloIncompleto($datatitulo);
            
        }
        
        $this->estoquemodel->updateNota($data, $id);
        
        $uri_back = $this->session->userdata('uri_back');
        
        $this->session->unset_userdata('uri_back');
        
        redirect($uri_back);
    }
    
    public function addTituloIncompleto($datatitulo){
        $nota = array(
            'titulos_vencimento'    => "",
            'titulos_numeroserie'   => $datatitulo['numeroserie'],
            'titulos_forneclin'     => $datatitulo['forneclin'],
            'titulos_tipo'          => $datatitulo['tipo'],
            'titulos_atraso'        => 0,
            'titulos_valor'         => $datatitulo['valor'],
            'titulos_juros'         => 0,
            'titulos_multa'         => 0,
            'titulos_desconto'      => 0,
            'titulos_valorpago'     => 0,
            'titulos_formapag'      => "",
            'titulos_frota'         => "",
            'titulos_observacao'    => "",
            'titulos_IO'            => $datatitulo['IO'],
            'titulos_completo'      => 0,
            'titulos_baixa'         => 0,
        );
        
        //$this->produtosmodel->insertTitulo($nota);
    }
    
    public function verNota(){
        
        $this->acessorestrito("ESTOQUE");
        $this->load->model('clientesmodel');
        
        $id = $this->uri->segment(2);
        $nota = $this->estoquemodel->getNotaUnica($id);
        $nota['notafiscal_operacao'] = $this->estoquemodel-> getTipoUnico($nota['notafiscal_operacao']);
        $estoques = $this->estoquemodel->getEstoquesByNota($nota['notafiscal_id']);
        
        if($nota['notafiscal_cliente'] == 1){
            if($nota['notafiscal_fornecedor'] != 0){
                $nota['notafiscal_fornecedor'] = $this->clientesmodel->getCPFCNPJ($nota['notafiscal_fornecedor']);
            }
        } else {
            if($nota['notafiscal_fornecedor'] != 0){
                $nota['notafiscal_fornecedor'] = $this->cadastrosmodel->getFornCnpj($nota['notafiscal_fornecedor']);
            }
        }
        
        
        $newArr = [];
        $servs = [];
        
        if($estoques != "" && $estoques != null){
            $cont = 0;
            foreach($estoques as $est){
                $newArr[$cont] = $est;
                $newArr[$cont]['estoque_produto'] = $this->produtosmodel->getByIdRowArray($est['estoque_produto_id']);
                $newArr[$cont]['estoque_produto']['produto_fornecedor'] = $this->cadastrosmodel->getFornCnpj($newArr[$cont]['estoque_produto']['produto_fornecedor_cnpj']);
                $newArr[$cont]['estoque_usuario'] = $this->usuariosmodel->getByID($est['estoque_usuario']);
                
                $cont++;
            }
        }
        
        $servicos = $this->estoquemodel->getNotaServicos($id);
        
        if($servicos != '' && $servicos != null){
            $cont = 0;
            foreach($servicos as $ser){
                $servs[$cont] = $ser;
                $servs[$cont]['ns_servico'] = $this->manutencaomodel->getServById($ser['ns_servico_id']);
                $servs[$cont]['ns_uni'] = number_format($ser['ns_preco'], 4, ',', '.');
                $servs[$cont]['total'] = (int)$ser['ns_qtd'] * (float)$ser['ns_preco'];
                $servs[$cont]['total'] = number_format($servs[$cont]['total'], 4, ',', '.');
                
                $cont++;
            }
        }
        
        if($this->session->userdata('erro_exc_item')){
            $err = $this->session->userdata('erro_exc_item');
            $this->session->unset_userdata('erro_exc_item');
        }else{
            $err = null;
        }
        
        $data = array(
            'produtos'      => null,
            'nota'          => $nota,
            'estoques'      => $newArr,
            'erro'          => $err,
            'edita'         => null,
            'servicos'      => $servs,
            'base_servicos' => $this->manutencaomodel->getAllServ(),
            'tipos'         => $this->estoquemodel->getTipos(),
        );
        
        if($nota['notafiscal_cliente'] == 1) { 
            $this->header('2.2', 'Visualização de Movimento de Nota', 'financeiro', 'Financeiro', 'Visualização de Movimento de Nota');
        } else {
            $this->header('3.1', 'Visualização de Movimento de Nota', 'estoque', 'Movimento de Estoque', 'Visualização de Movimento de Nota');
        }
        
        
        $this->load->view('estoque/movimentoUnico', $data);
        $this->footer();
    }
    
    public function editNotaServ(){
        
        
        $id = $this->input->post('id');
        $old = $this->estoquemodel->getNotaServico($id);
        $nota = $this->estoquemodel->getNotaUnica($old['ns_nota_id']);
        $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
        
        $nota['notafiscal_valorfinal'] = (float)$nota['notafiscal_valorfinal'] - ((float)$old['ns_preco'] * (int)$old['ns_qtd']);
        
        $new = array(
                'ns_nota_id'    => $old['ns_nota_id'],
                'ns_servico_id' => $this->input->post('servico'),
                'ns_preco'      => $this->reformatavalor($this->input->post('valor')),
                'ns_qtd'        => $this->input->post('qtd'),
            );
            
        $nota['notafiscal_valorfinal'] = (float)$nota['notafiscal_valorfinal'] + ((float)$new['ns_preco'] * (int)$new['ns_qtd']);
        $titulo['titulos_valor'] = $nota['notafiscal_valorfinal'];
        
        $this->estoquemodel->updateNotaServico($new, $id);
        $this->estoquemodel->updateNota($nota, $old['ns_nota_id']);
        $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
        
        $callback = $this->input->post('callback');
        redirect(base_url().$callback."/".$old['ns_nota_id']);
    }
    
    public function addNotaServ(){
        
        
        $id = $this->input->post('id');
        $nota = $this->estoquemodel->getNotaUnica($id);
        $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
        
        $new = array(
                'ns_nota_id'    => $id,
                'ns_servico_id' => $this->input->post('servico'),
                'ns_preco'      => $this->reformatavalor($this->input->post('valor')),
                'ns_qtd'        => $this->input->post('qtd'),
            );
        
        $nota['notafiscal_valorfinal'] = (float)$nota['notafiscal_valorfinal'] + ((float)$new['ns_preco'] * (int)$new['ns_qtd']);
        $titulo['titulos_valor'] = $nota['notafiscal_valorfinal'];
        
        $this->estoquemodel->insertNotaServico($new);
        $this->estoquemodel->updateNota($nota, $id);
        $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
        
        redirect(base_url('editarnota/').$id);
    }
    
    public function excluirNota(){
        
        
        $id = $this->input->post('idnota');
        $senha = MD5($this->input->post('senha'));
        $callback = $this->input->post('callback');
        
        if($this->session->userdata('senha') == $senha){
            $nota = $this->estoquemodel->getNotaUnica($id);
            $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
            if($titulo){
                $this->session->set_userdata('erro', 3);
            } else {
                $this->estoquemodel->deleteEstoqueByNota($id);
                $this->estoquemodel->deleteNotaServicoByNota($id);
                $this->estoquemodel->deleteNota($id);
                $this->session->set_userdata('erro', 4);
            }
        }else{
            $this->session->set_userdata('erro', 2);
        }
        
        redirect(base_url($callback));
    }
    
    public function deletaNotaServico(){
        
        
        $id = $this->input->post('id');
        $senha = MD5($this->input->post('senha'));
        $callback = $this->input->post('callback');
        
        if($this->session->userdata('senha') == $senha){
            $ns = $this->estoquemodel->getNotaServico($id);
            $this->estoquemodel->deleteNotaServico($id);
            $nota = $this->estoquemodel->getNotaUnica($ns['ns_nota_id']);
            $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
            
            $nota['notafiscal_valorfinal'] = (float)$nota['notafiscal_valorfinal'] - ((float)$ns['ns_preco'] * (int)$ns['ns_qtd']);
            $titulo['titulos_valor'] = $nota['notafiscal_valorfinal'];
            
            $this->estoquemodel->updateNota($nota, $nota['notafiscal_id']);
            $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
            
            $this->session->set_userdata('erro_exc_item', 1);
            redirect(base_url().$callback."/".$nota['notafiscal_id']);
        }else{
            $this->session->set_userdata('erro_exc_item', 2);
            redirect(base_url().$callback."/".$nota['notafiscal_id']);
        }
    }
    
    public function atualizaEstoque(){
        
        
        $id = $this->input->post('id');
        $vlr = $this->reformatavalor($this->input->post('vlr'));
        $qtd = $this->input->post('qtd');
        $total = 0;
        
        $est = $this->estoquemodel->getEstoqueById($id);
        $est['estoque_quantidade'] = $qtd;
        $est['estoque_valor'] = $vlr;
        $est_total = (float) $vlr * (int) $qtd;
        $this->estoquemodel->updateEstoque($est, $id);
        
        $nota = $this->estoquemodel->getNotaUnica($est['estoque_nota_id']);
        $estoques = $this->estoquemodel->getEstoquesByNota($nota['notafiscal_id']);
        $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
        
        foreach($estoques as $es){
            $sub = (int) $es['estoque_quantidade'] * (float) $es['estoque_valor'];
            $total = (float) $total + (float) $sub;
        }
        $total = (float) $total + (float) $nota['notafiscal_vlrfrete'];
        
        $nota['notafiscal_valorfinal'] = $total;
        $titulo['titulos_valor'] = $total;
        
        $this->estoquemodel->updateNota($nota, $nota['notafiscal_id']);
        $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
        
        $data = array(
                'total_nota'    => number_format($total, 4, ',', '.'),
                'total'         => number_format($est_total, 4, ',', '.'),
            );
        echo json_encode($data);
    }
    
    public function deletaItem(){
        
        
        $id = $this->input->post('id_excluir');
        $senha = MD5($this->input->post('senha'));
        $anchor = $this->input->post('anchor_id');
        
        if($this->session->userdata('senha') == $senha){
            $est = $this->estoquemodel->getEstoqueById($id);
            $this->estoquemodel->deleteEstoque($id);
            
            $total = 0;
            $nota = $this->estoquemodel->getNotaUnica($est['estoque_nota_id']);
            $estoques = $this->estoquemodel->getEstoquesByNota($nota['notafiscal_id']);
            $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
            
            foreach($estoques as $es){
                $sub = (int) $es['estoque_quantidade'] * (float) $es['estoque_valor'];
                $total = (float) $total + (float) $sub;
            }
            $total = (float) $total + (float) $nota['notafiscal_vlrfrete'];
            
            $nota['notafiscal_valorfinal'] = $total;
            $titulo['titulos_valor'] = $total;
            
            $this->estoquemodel->updateNota($nota, $nota['notafiscal_id']);
            $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
            
            $this->session->set_userdata('erro_exc_item', 1);
            
            redirect(base_url('mostrarnota/').$anchor);
        }else{
            $this->session->set_userdata('erro_exc_item', 2);
            
            redirect(base_url('mostrarnota/').$anchor);
        }
    }
    
    public function editarnota(){
        
        $this->acessorestrito("ESTOQUE");
        
        $id = $this->uri->segment(2);
        $nota = $this->estoquemodel->getNotaUnica($id);
        $nota['notafiscal_operacao'] = $this->estoquemodel-> getTipoUnico($nota['notafiscal_operacao']);
        $estoques = $this->estoquemodel->getEstoquesByNota($nota['notafiscal_id']);
        
        if($nota['notafiscal_fornecedor'] != 0){
            $nota['notafiscal_fornecedor'] = $this->cadastrosmodel->getFornCnpj($nota['notafiscal_fornecedor']);
        }
        
        $cont = 0;
        $newArr = [];
        foreach($estoques as $est){
            $newArr[$cont] = $est;
            $newArr[$cont]['estoque_produto'] = $this->produtosmodel->getByIdRowArray($est['estoque_produto_id']);
            $newArr[$cont]['estoque_produto']['produto_fornecedor'] = $this->cadastrosmodel->getFornCnpj($newArr[$cont]['estoque_produto']['produto_fornecedor_cnpj']);
            $newArr[$cont]['estoque_usuario'] = $this->usuariosmodel->getByID($est['estoque_usuario']);
            
            $cont++;
        }
        
        $servicos = $this->estoquemodel->getNotaServicos($id);
        
        $cont = 0;
        $servs = [];
        if($servicos != '' && $servicos != null){
            foreach($servicos as $ser){
                $servs[$cont] = $ser;
                $servs[$cont]['ns_servico'] = $this->manutencaomodel->getServById($ser['ns_servico_id']);
                $servs[$cont]['ns_uni'] = number_format($ser['ns_preco'], 4, ',', '.');
                $servs[$cont]['total'] = (int)$ser['ns_qtd'] * (float)$ser['ns_preco'];
                $servs[$cont]['total'] = number_format($servs[$cont]['total'], 4, ',', '.');
                
                $cont++;
            }
        }
        
        if($this->session->userdata('erro_exc_item')){
            $err = $this->session->userdata('erro_exc_item');
            $this->session->unset_userdata('erro_exc_item');
        }else{
            $err = null;
        }
        
        $data = array(
                'produtos'      => $this->produtosmodel->getAll(),
                'nota'          => $nota,
                'estoques'      => $newArr,
                'erro'          => $err,
                'edita'         => 1,
                'servicos'      => $servs,
                'base_servicos' => $this->manutencaomodel->getAllServ(),
            );
            
        if(count($data['estoques']) > 0){
            $data['tipos'] = $this->estoquemodel->getTiposProd();
        }else if(count($data['servicos']) > 0){
            $data['tipos'] = $this->estoquemodel->getTiposServ();
        }else{
            $data['tipos'] = $this->estoquemodel->getTipos();
        }
            
        if($nota['notafiscal_cliente'] == 1) { 
            $this->header('2.2', 'Edição de Movimento de Nota', 'financeiro', 'Financeiro', 'Edição de Movimento de Nota');
        } else {
            $this->header('3.1', 'Edição de Movimento', 'estoque', 'Movimento de Estoque', 'Edição de Movimento');
        }
            
        $this->load->view('estoque/movimentoUnico', $data);
        $this->footer();
    }
    
    public function newItem(){
        
        
        $pos = 1+(int)$this->input->post('pos');
        
        $new = array(
                'estoque_produto_ancora'    => $this->input->post('id'),
                'estoque_produto_id'        => $this->input->post('id'),
                'estoque_data_insert'       => date('Y-m-d'),
                'estoque_quantidade'        => $this->input->post('qtd'),
                'estoque_valor'             => $this->reformatavalor($this->input->post('vlr')),
                'estoque_nota_id'           => $this->input->post('anchor'),
                'estoque_detalhes'          => '',
                'estoque_usuario'           => $this->session->userdata('user_id'),
            );
            
        $prod = $this->estoquemodel->produtoById($this->input->post('id'));
        if($prod['produto_preco_custo'] != $this->reformatavalor($this->input->post('vlr'))){
            $OldId = $prod['produto_id'];
            
            $prod['produto_ativo_id'] = 4;
            $this->estoquemodel->updateprodutoById($prod, $OldId);
            
            $newId = $this->estoquemodel->getLastIdProduto();
            $prod['produto_id'] = $newId['produto_id']+1;
            $prod['produto_preco_custo'] = $this->reformatavalor($this->input->post('vlr'));
            $prod['produto_ativo_id'] = 1;
            $newId = $this->estoquemodel->insertUpdateId($prod);
            
            $this->estoquemodel->updateEstoqueId($newId, $OldId);
            
            $new['estoque_produto_id'] = $newId;
        }    
        
        $new['estoque_id'] = $this->estoquemodel->insertEstoque($new);
        
        $new['estoque_produto'] = $this->produtosmodel->getByIdRowArray($new['estoque_produto_id']);
        $new['estoque_produto']['produto_fornecedor'] = $this->cadastrosmodel->getFornCnpj($new['estoque_produto']['produto_fornecedor_cnpj']);
        $new['estoque_usuario'] = $this->usuariosmodel->getByID($new['estoque_usuario']);
        
        $res = (float) $new['estoque_valor'] * (int) $new['estoque_quantidade'];
        
        $tr = 
        '<tr class="trigger_hidden">
            <td class="text-center">
                
                <div class="row">
                    <div class="col-md-4" style="padding-right: 0">
                        <div class="outside-btn">
                            <button id="btn'.$pos.'" type="button" class="btn-expand" onclick="showHideRow(\'hidden_row'.$pos.'\');"><em class="fa fa-plus"></em></button>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 0; padding-right: 0">
                        <div class="outside-btn">
                            <button id="edit'.$pos.'" type="button" class="btn-expand" style="background-color: blue" onclick="allowEdit('.$pos.');" data-id="'.$new['estoque_id'].'"><em style="left: 3px; top: 3px; font-size: 9px" class="fa fa-pen"></em></button>
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-left: 0px;">
                        <div class="outside-btn">
                            <button type="button" class="btn-expand" style="background-color: red" onclick="setaExc('.$new['estoque_id'].')"><em style="left: 3px" class="fa fa-times"></em></button>
                        </div>
                    </div>
                </div>
                
            </td>
            <td>'.date('d/m/Y', strtotime($new['estoque_data_insert'])).'</td>
            <td id="td_qtd'.$pos.'">'.$new['estoque_quantidade'].'</td>
            <td>'.$new['estoque_produto']['produto_nome']." | ".$new['estoque_produto']['produto_modelo'].'</td>
        </tr>
        <tr id="hidden_row'.$pos.'" class="hidden_row">
            <td colspan=4> 
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="col-md-3 form-group">
                            <label>Código da Peça</label><br>
                            <input type="text" class="form-control" value="'.$new['estoque_produto']['produto_codigo'].'" readonly>
                        </div>
                        <div class="col-md-5 form-group">
                            <label>Nome da Peça</label><br>
                            <input type="text" class="form-control" value="'.$new['estoque_produto']['produto_nome'].'" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Modelo da Peça</label><br>
                            <input type="text" class="form-control" value="'.$new['estoque_produto']['produto_modelo'].'" readonly>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Fabricante</label><br>
                            <input type="text" class="form-control" value="'.$new['estoque_produto']['produto_fabricante'].'" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Fornecedor</label><br>
                            <input type="text" class="form-control" value="'.$new['estoque_produto']['produto_fornecedor']['fornecedor_nome'].'" readonly>
                        </div>
                        
                        <div class="col-md-3 form-group">
                            <label>Valor da Peça</label><br>
                            <input type="text" class="form-control" value="R$ '.number_format($new['estoque_produto']['produto_preco_custo'], 4, ',', '.').'" readonly>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Valor no Movimento</label><br>
                            <input type="text" class="form-control allow_'.$pos.'" id="vlr_'.$pos.'" placeholder="0,00" value="R$ '.number_format($new['estoque_valor'], 4, ',', '.').'" readonly>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Qtd</label><br>
                            <input type="text" class="form-control num allow_'.$pos.'" id="qtd_'.$pos.'" placeholder="0" value="'.$new['estoque_quantidade'].'" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Valor Total na Nota</label><br>
                            <input type="text" class="form-control" id="total_'.$pos.'" value="'.number_format($res, 4, ',', '.').'" readonly>
                        </div>
                        
                    </div>
                </div>
            </td>
        </tr>';
        
        $nota = $this->estoquemodel->getNotaUnica($this->input->post('anchor'));
        $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
        $nota['notafiscal_valorfinal'] = (float) $nota['notafiscal_valorfinal'] + (float) $res;
        $titulo['titulos_valor'] = (float) $titulo['titulos_valor'] + (float) $res;
            
        $this->estoquemodel->updateNota($nota, $nota['notafiscal_id']);
        $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
        
        $data = array(
                'total' => number_format($nota['notafiscal_valorfinal'], 4, ',', '.'),
                'table' => $tr,
            );
            
        echo json_encode($data);
    }
    
    public function deletaItemEdicao(){
        
        
        $id = $this->input->post('id_excluir');
        $senha = MD5($this->input->post('senha'));
        $anchor = $this->input->post('anchor_id');
        $est = $this->estoquemodel->getEstoqueById($id);
        
        if($this->session->userdata('senha') == $senha){
            $this->estoquemodel->deleteEstoque($id);
            
            $total = 0;
            $nota = $this->estoquemodel->getNotaUnica($est['estoque_nota_id']);
            $estoques = $this->estoquemodel->getEstoquesByNota($nota['notafiscal_id']);
            $titulo = $this->financeiromodel->getTituloByNota($nota['notafiscal_numero'].$nota['notafiscal_serie']);
            
            foreach($estoques as $es){
                $sub = (int) $es['estoque_quantidade'] * (float) $es['estoque_valor'];
                $total = (float) $total + (float) $sub;
            }
            $total = (float) $total + (float) $nota['notafiscal_vlrfrete'];
            
            $nota['notafiscal_valorfinal'] = $total;
            $titulo['titulos_valor'] = $total;
            
            $this->estoquemodel->updateNota($nota, $nota['notafiscal_id']);
            $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
            
            $this->session->set_userdata('erro_exc_item', 1);
        }else{
            $this->session->set_userdata('erro_exc_item', 2);
        }
        
        $old = $this->estoquemodel->getNotaUnica($est['estoque_nota_id']);
        
        $newFrete = $this->reformatavalor($this->input->post('exc_frete'));
        $valorfinal = ((float) $old['notafiscal_valorfinal'] - (float) $old['notafiscal_vlrfrete']) + (float) $newFrete;
        
        $new = array(
                'notafiscal_numero'         => $old['notafiscal_numero'],
                'notafiscal_serie'          => $old['notafiscal_serie'],
                'notafiscal_folhas'         => $this->input->post('exc_folhas'),
                'notafiscal_fornecedor'     => $old['notafiscal_fornecedor'],
                'notafiscal_operacao'       => $old['notafiscal_operacao'],
                'notafiscal_especie'        => $this->input->post('exc_especie'),
                'notafiscal_dtemissao'      => $this->input->post('exc_dtemissao'),
                'notafiscal_dtsaida'        => $this->input->post('exc_dtsaida'),
                'notafiscal_hsaida'         => $this->input->post('exc_hrsaida'),
                'notafiscal_nometrans'      => $this->refatorarString($this->input->post('exc_transp')),
                'notafiscal_cnpjtrans'      => $this->limpa($this->input->post('exc_transp_cnpj')),
                'notafiscal_placaveic'      => $this->input->post('exc_placa'),
                'notafiscal_vlrfrete'       => $newFrete,
                'notafiscal_valoricms'      => $this->reformatavalor($this->input->post('exc_icms')),
                'notafiscal_valoripi'       => $this->reformatavalor($this->input->post('exc_ipi')),
                'notafiscal_bcicmssub'      => $this->reformatavalor($this->input->post('exc_bc_icms_sub')),
                'notafiscal_valoricmssub'   => $this->reformatavalor($this->input->post('exc_icms_sub')),
                'notafiscal_chave'          => $old['notafiscal_chave'],
                'notafiscal_valorfinal'     => $valorfinal
            );
        
        $this->estoquemodel->updateNota($new, $old['notafiscal_id']);
        
        redirect(base_url('editarnota/').$anchor);
    }
    
    public function atualizaNota(){
        
        
        $id = $this->input->post('hidden_id');
        $old = $this->estoquemodel->getNotaUnica($id);
        
        $newFrete = $this->reformatavalor($this->input->post('frete'));
        $valorfinal = ((float) $old['notafiscal_valorfinal'] - (float) $old['notafiscal_vlrfrete']) + (float) $newFrete;
        
        $new = array(
                'notafiscal_numero'         => $old['notafiscal_numero'],
                'notafiscal_serie'          => $old['notafiscal_serie'],
                'notafiscal_folhas'         => $this->input->post('folhas'),
                'notafiscal_fornecedor'     => $old['notafiscal_fornecedor'],
                'notafiscal_operacao'       => $old['notafiscal_operacao'],
                'notafiscal_especie'        => $this->input->post('especie'),
                'notafiscal_dtemissao'      => $this->input->post('dt_emissao'),
                'notafiscal_dtsaida'        => $this->input->post('dt_saida'),
                'notafiscal_hsaida'         => $this->input->post('hr_saida'),
                'notafiscal_nometrans'      => $this->refatorarString($this->input->post('transp')),
                'notafiscal_cnpjtrans'      => $this->limpa($this->input->post('transp_cnpj')),
                'notafiscal_placaveic'      => $this->input->post('placa'),
                'notafiscal_vlrfrete'       => $newFrete,
                'notafiscal_valoricms'      => $this->reformatavalor($this->input->post('icms')),
                'notafiscal_valoripi'       => $this->reformatavalor($this->input->post('ipi')),
                'notafiscal_bcicmssub'      => $this->reformatavalor($this->input->post('bc_icms_sub')),
                'notafiscal_valoricmssub'   => $this->reformatavalor($this->input->post('icms_sub')),
                'notafiscal_chave'          => $old['notafiscal_chave'],
                'notafiscal_valorfinal'     => $valorfinal
            );
        
        $titulo = $this->financeiromodel->getTituloByNota($old['notafiscal_numero'].$old['notafiscal_serie']);
        $titulo['titulos_valor'] = $valorfinal;
        $this->financeiromodel->updateTitulos($titulo['titulos_id'], $titulo);
        
        if($this->input->post('operacao')){
            $new['notafiscal_operacao'] = $this->input->post('operacao');
        }
        
        $this->estoquemodel->updateNota($new, $old['notafiscal_id']);
        
        redirect(base_url('editarnota/').$id);
    }
    
    function ativarOperacao(){
	    
	    
	    $id = $this->input->post('operacao_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $tipo = $this->estoquemodel->getTipoUnico($id);
    	    $tipo['tm_ativo_id'] = 1;
    	    $this->estoquemodel->editTipo($tipo, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('operacoesestoque'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('operacoesestoque'));
        }
	}


}