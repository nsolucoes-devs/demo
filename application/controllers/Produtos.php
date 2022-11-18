<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('url', 'form', 'http');
        $this->load->model('fornecedoresmodel');
        $this->load->model('ativosmodel');
	    $this->load->model('produtosmodel');
	    $this->load->model('usuariosmodel');
	    $this->load->model('cadastrosmodel');
    }
    
    public function index(){
        redirect('pecas', 'refresh');
    }
    
	public function cadastro(){
        
	    
	    $data = [
	        'fornecedores'  => $this->fornecedoresmodel->getAll(),
	        'ativos'        => $this->ativosmodel->getAll(),
	        'medidas'       => $this->produtosmodel->medidas(),
	        'grupos'        => $this->produtosmodel->gruposAtivos(),
	        ];
        
        
        if($this->uri->segment(2) !== null){
            $data['edicao_id'] =  $this->uri->segment(2);
        }
	    
	    if($this->uri->segment(2)){
	        $this->header('3.3', 'EDIÇÃO DE PEÇA', 'estoque', 'Estoque', 'Edição de peça');    
	    }
	    else {
	        $this->header('3.3', 'CADASTRO DE PEÇA', 'estoque', 'Estoque', 'Cadastro de peça');
	    }
	    $this->load->view('produtos/cadastro', $data);
	    $this->footer();
	}
	
	public function checklist() {
	    
	    
	    $data = [
	        ];
	    
	    $this->header('8');
	    $this->load->view('produtos/checklist', $data);
	    $this->footer();
	}

	//--------------------------------------------------------------------
    
    public function listagem($erro = null){
	    
	    $this->load->model('manutencaomodel');
	    $this->acessorestrito('ESTOQUE');
	    
	    $this->load->library("pagination");
        
        $filtro = mb_strtoupper($this->input->post('filtro'));
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        } 
        
        $uri_segment = 4;
        $config = array();
        if($filtro){
            $config["base_url"] = base_url('pecas/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('pecas/n/');
            $uri_segment = 3;
        }
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $config["total_rows"] = $this->produtosmodel->get_countProdutosFiltro($filtro);    
        $config["per_page"] = 10;
        
        $this->pagination->initialize($config);
        
        $data['produtos'] = $this->produtosmodel->getAllProdutosFiltro($filtro, 10, $page);
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $data['erro'] = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    } else {
	        $data['erro'] = null;
	    }
	    
        $data['grupos']    = $this->produtosmodel->getGrupos();
        
	    $this->header('3.3', 'LISTAGEM DE PEÇAS', 'estoque', 'Estoque', 'Listagem de peças');
	    $this->load->view('produtos/listagem', $data);
	    $this->footer();
	    
	}
	
	//--------------------------------------------------------------------
    
    public function listagemAbc(){
	    
	    $this->load->model('manutencaomodel');
	    $this->acessorestrito('ESTOQUE');
	    
	    $this->load->library("pagination");
        
        $filtro = mb_strtoupper($this->input->post('filtro'));
        if($this->uri->segment(3) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        } 
        
        $uri_segment = 5;
        $config = array();
        if($filtro){
            $config["base_url"] = base_url('produtos/listagemAbc/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('produtos/listagemAbc/n/');
            $uri_segment = 4;
        }
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $config["total_rows"] = $this->produtosmodel->get_countProdutosFiltro($filtro);    
        $config["per_page"] = 10;
        
        $this->pagination->initialize($config);
        
        $produtos = $this->produtosmodel->getAllProdutosFiltro($filtro, 10, $page);
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
        
        $cont = 0;
        
        $data['produtosabc'] = null;
 
        foreach($produtos as $d){
            $somar = 0;
            $andamentos = $this->manutencaomodel->getItensPeca($d['produto_id']);
            foreach($andamentos as $anda){
                $somar = $somar + ($anda['ai_qtd'] * $anda['ai_vlr_un']);
            }
            $data['produtosabc'][$cont] = array(
                'nome'          => $d['produto_nome'],
                'modelo'        => $d['produto_modelo'],
                'fabricante'    => $d['produto_fabricante'],
                'total'         => $somar,
                'ativo'         => $d['produto_ativo_id'],
            );
            $cont++;
        }
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $data['erro'] = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    } else {
	        $data['erro'] = null;
	    }
	    
	    $this->header('3.3', 'LISTAGEM DE PEÇAS', 'estoque', 'Estoque', 'Listagem de peças');
	    $this->load->view('produtos/listagemabc', $data);
	    $this->footer();
	    
	}
	
	//--------------------------------------------------------------------
	
	
	public function getProdutoById(){
	    
	    
	    $id = $this->input->post('produto_id');
	    $produto = $this->produtosmodel->getByID($id);
	    
	    echo json_encode($produto);
	}
	
    public function insertProduto(){
        
        
        //$this->input->post('');

        $data = [
            'produto_nome' =>  $this->refatorarString($this->input->post('nome')),
            'produto_codigo' => $this->input->post('codigo'),
            'produto_fabricante' => $this->refatorarString($this->input->post('fabricante')),
            'produto_detalhes' => $this->refatorarString($this->input->post('detalhes')),
            'produto_preco_custo' => str_replace(',', '.', str_replace('.', '', $this->input->post('precocusto'))),
            'produto_preco_venda' => str_replace(',', '.', str_replace('.', '', $this->input->post('precovenda'))),
            'produto_fornecedor_cnpj' => $this->input->post('fornecedor'),
            'produto_modelo' => $this->refatorarString($this->input->post('modelo')),
            'produto_sku' => $this->input->post('sku'),
            'produto_ncm' => $this->input->post('ncm'),
            'produto_cest' => $this->input->post('cest'),
            'produto_upc' => $this->input->post('upc'),
            'produto_ean' => $this->input->post('ean'),
            'produto_jan' => $this->input->post('jan'),
            'produto_isbn' => $this->input->post('isbn'),
            'produto_mpn' => $this->input->post('mpn'),
            'produto_un_medida' => $this->refatorarString($this->input->post('un_medida')),
            'produto_un_peso' => $this->refatorarString($this->input->post('un_peso')),
            'produto_comprimento' => $this->input->post('comprimento'),
            'produto_largura' => $this->input->post('largura'),
            'produto_altura' => $this->input->post('altura'),
            'produto_peso' => $this->input->post('peso'),
            'produto_qtdminimo' => $this->input->post('qtd_min'),
            'produto_grupo_id' => $this->input->post('grupo'),
            'produto_ativo_id' => $this->input->post('ativo'),
            ];

        
        if($this->input->post('id') != null){
            if(strlen($this->input->post('id')) > 0){
                $data['produto_id'] = $this->input->post('id'); 
                $this->produtosmodel->update($data, $this->input->post('id'));
            }
        }else{
            $this->produtosmodel->insert($data);
        }
        
        redirect('pecas', 'refresh');
    }
    
    public function deleteProduto(){
        
        
        $id = $this->input->post('idproduto');
        $sen = MD5($this->input->post('senha'));
        
        $user = $this->produtosmodel->getByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $user['produto_ativo_id'] = 2;
            
            $this->produtosmodel->update($user, $id);
            
            //print_r('ativo do ' . $id . ' alterada com a senha ' . $sen);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('pecas'), 'refresh');
        }else{
            //$this->listagem(1);
            $this->session->set_userdata('delete', 2);
            redirect(base_url('pecas'), 'refresh');
        }
    }
    
    public function mostrar(){
        
        
        $id = $this->uri->segment(2);
        $prod = $this->produtosmodel->getByIdRowArray($id);
        $fornecedor = $this->cadastrosmodel->getFornCnpj($prod['produto_fornecedor_cnpj']);
        
        $data = array(
                'prod'          => $prod,
                'forn'          => $fornecedor['fornecedor_nome'],
                'un_medida'     => $this->produtosmodel->getMedida($prod['produto_un_medida']),
                'un_peso'       => $this->produtosmodel->getMedida($prod['produto_un_peso']),
                'grupo'         => $this->produtosmodel->getGrupoUnico($prod['produto_grupo_id']),
            );
        
        $this->header('3.3', 'VISUALIZAÇÃO DE PEÇA', 'estoque', 'Estoque', 'Visualização de peça');
	    $this->load->view('produtos/mostrar', $data);
	    $this->footer();
    }
    
    //-> **---------------------------------------------------------------------**
    //-> ||                             GRUPOS DE PEÇAS                         ||
    //-> **---------------------------------------------------------------------**
    
    public function gruposPecas(){
        
        
        if($this->session->userdata('grupos_vali')){
            $data['valid'] = $this->session->userdata('grupos_vali');
            $this->session->unset_userdata('grupos_vali');
        }else{
            $data['valid'] = null;
        }
        
        $data['grupos'] = $this->produtosmodel->getGrupos();
        
        $this->header('3.4', 'GROPOS DE PEÇAS', 'estoque', 'Estoque', 'Grupos de peças');
        $this->load->view('produtos/grupos', $data);
        $this->footer();
    }
    
    public function novoGrupo(){
        
        
        $new = array(
                'gp_nome'       => $this->refatorarString($this->input->post('nome')),
                'gp_ativo_id'   => 1,
            );
            
        $this->produtosmodel->insertGrupo($new);
        $this->session->set_userdata('grupos_vali', 1);
        
        redirect(base_url('grupospecas'));
    }
    
    public function editarGrupo(){
        
        
        $new = array(
                'gp_nome'       => $this->refatorarString($this->input->post('nome')),
                'gp_ativo_id'   => $this->input->post('ativo'),
            );
            
        $this->produtosmodel->editGrupo($new, $this->input->post('id'));
        $this->session->set_userdata('grupos_vali', 2);
        
        redirect(base_url('grupospecas'));
    }
    
    public function deletarGrupo(){
        
        
        $senha = MD5($this->input->post('senha'));
        $id = $this->input->post('id');
        
        if($senha == $this->session->userdata('senha')){
            $gp = $this->produtosmodel->getGrupoUnico($id);
            $gp['gp_ativo_id'] = 2;
            $this->produtosmodel->editGrupo($gp, $id);
            
            $this->session->set_userdata('grupos_vali', 3);
        }else{
            $this->session->set_userdata('grupos_vali', 4);
        }
        redirect(base_url('grupospecas'));
    }
    
    function ativarProduto(){
	    
	    
	    $id = $this->input->post('produto_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $peca = $this->produtosmodel->getByIdRowArray($id);
    	    $peca['produto_ativo_id'] = 1;
    	    $this->produtosmodel->update($peca, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('pecas'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('pecas'));
        }
	}
	
		
	function ativarGrupo(){
	    
	    
	    $id = $this->input->post('grupo_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $tipo = $this->produtosmodel->getGrupoUnico($id);
    	    $tipo['gp_ativo_id'] = 1;
    	    $this->produtosmodel->editGrupo($tipo, $id);
    	    
    	    $this->session->set_userdata('grupos_vali', 5);
    	    redirect(base_url('grupospecas'));
        }else{
            $this->session->set_userdata('grupos_vali', 6);
            redirect(base_url('grupospecas'));
        }
	}
}
