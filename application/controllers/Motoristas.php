<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Motoristas extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
	    $this->load->library('moduloupload');
	    $this->load->model('documentosmodel');
        $this->load->model('ativosmodel');
	    $this->load->model('motoristasmodel');
	    $this->load->model('clientesmodel');
	    $this->load->model('usuariosmodel');
    }
    
    public function index(){
        $this->listagem();
    }
    
	public function cadastro($id=null){
        
	    
	    $data = [
	        'documentos_tipos' => $this->documentosmodel->getAllTiposAtivos(),
	        'ativos' => $this->ativosmodel->getAll(),
	        'clientes' => $this->clientesmodel->getAllAtivos(),
	        ];

        if($id != null){
            $data['motorista'] = $this->motoristasmodel->getById($id);
            $data['edicao_id'] = $id;
            
            $data['fixed'] = $this->documentosmodel->getOldDoc(3, 'm_'.$data['motorista']['motorista_cpf']);
        }else{
            $data['fixed'] = null;
            $data['motorista'] = null;
        }
        
	    if($this->uri->segment(2)){
	        $this->header('6.5', 'EDIÇÃO DE MOTORISTA', 'cadastros', 'Cadastros', 'Edição de motorista');
	    } else {
	        $this->header('6.5', 'CADASTRO DE MOTORISTA', 'cadastros', 'Cadastros', 'Cadastro de motorista');
	    }
	    
	    $this->load->view('motoristas/cadastro', $data);
	    $this->footer();
	}

	//--------------------------------------------------------------------
    
    public function listagem(){
	    
	    
	    $this->load->library("pagination");
        
        $filtro = mb_strtoupper($this->input->post('filtro'));
        if($this->uri->segment(3) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        } 
        
        $uri_segment = 4;
        $config = array();
        if($filtro){
            $config["base_url"] = base_url('motoristas/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('motoristas/n/');
            $uri_segment = 3;
        }
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $config["total_rows"] = $this->motoristasmodel->get_countMotoristasFiltro($filtro);    
        $config["per_page"] = 10;
        
        $this->pagination->initialize($config);
        
        $data['motoristas'] = $this->motoristasmodel->getAllMotoristasFiltro($filtro, 10, $page);
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $data['erro'] = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    } else {
	        $data['erro'] = null;
	    }
        
	    $this->header('6.5', 'LISTAGEM DE MOTORISTAS', 'cadastros', 'Cadastros', 'Listagem de motoristas');
	    $this->load->view('motoristas/listagem', $data);
	    $this->footer();
	    
	}
	
	public function ver(){
        
        
        $id = $this->uri->segment(2);
        
        $data['motorista'] = $this->motoristasmodel->getById($id);
        
        if(strlen($data['motorista']['motorista_tel']) == 11){
            $data['tel1'] = $this->mask($data['motorista']['motorista_tel'], '(##) #####-####');
        }else if(strlen($data['motorista']['motorista_tel']) == 10){
            $data['tel1'] = $this->mask($data['motorista']['motorista_tel'], '(##) ####-####');
        }else{
            $data['tel1'] = ""; 
        }
        
        if($data['motorista']['motorista_cliente_cpfcnpj'] != 0){
            $empresa = $this->clientesmodel->getCPFCNPJ($data['motorista']['motorista_cliente_cpfcnpj']);
            if($data['motorista']['motorista_cliente_cpfcnpj'] == 11){
                $empresa['cpfcnpj'] = $this->mask($data['motorista']['motorista_cliente_cpfcnpj'], '###.###.###-##');
            }else{
                $empresa['cpfcnpj'] = $this->mask($data['motorista']['motorista_cliente_cpfcnpj'], '##.###.###.####-##');
            }
            $data['empresa'] = $empresa['cpfcnpj'].", ".$empresa['cliente_nome'].$empresa['cliente_fantasia']." - ".$empresa['cliente_cidade'].", ".$empresa['cliente_estado'];
        }else{
            $data['empresa'] = null;
        }
        
        $data['cpf'] = $this->mask($data['motorista']['motorista_cpf'], '###.###.###-##');
        $data['cep'] = $this->mask($data['motorista']['motorista_cep'], '#####-###');
        $data['docs'] = $this->documentosmodel->getByTitularCPFCNPJ('m_'.$data['motorista']['motorista_cpf']);
        $data['tipos_docs'] = $this->documentosmodel->getAllTipos();
        
        $this->header('6.5', 'VER MOTORISTA', 'cadastros', 'Cadastros', 'Ver Motorista');
	    $this->load->view('motoristas/vermotorista', $data);
	    $this->footer();
    }
	
	//--------------------------------------------------------------------
	
	
	public function getMotoristaById(){
	    
	    
	    $id = $this->input->post('motorista_id');
	    $motorista = $this->motoristasmodel->getById($id);
	    
	    echo json_encode($motorista);
	}
	
	public function getDocumentosMotoristaByCpf(){
	    
	    
	    $id = $this->input->post('motorista_cpf');
	    $docs = $this->documentosmodel->getByTitularCPFCNPJ($id);
	    
	    echo json_encode($docs);
	}
	
    public function insertMotorista(){
        
        
        $motorista_cpf = $this->limpa($this->input->post('cpf'));

        $data = array(
                'motorista_cpf' => $motorista_cpf,
                'motorista_rg' => $this->input->post('rg'),
                'motorista_nome' => $this->refatorarString($this->input->post('nome')),
                'motorista_nascimento' => $this->input->post('nascimento'),
                'motorista_cep' => $this->limpa($this->input->post('cep')),
                'motorista_endereco' => $this->refatorarString($this->input->post('endereco')),
                'motorista_numero' => $this->limpa($this->input->post('numero')),
                'motorista_bairro' => $this->refatorarString($this->input->post('bairro')),
                'motorista_cidade' => $this->refatorarString($this->input->post('cidade')),
                'motorista_estado' => $this->refatorarString($this->input->post('estado')),
                'motorista_tel' => $this->limpa($this->input->post('telefone')),
                'motorista_ativo_id' => 1,
                'motorista_cliente_cpfcnpj' => $this->input->post('cliente'),
            );
        
        //FILES - START
        $documentos_tipos = $this->documentosmodel->getAllTipos();
        $docsIdArray = explode('|', $this->input->post('docs-control'));
        
        $newArray = [];
        $index = 0;
        foreach($docsIdArray as $doc){
            if(!empty($_FILES[$doc.'-doc']['name'])){
                $newArray[$index] = $doc;
                $index++;
            }
        }
        
        $this->moduloupload->uploadByIdArray($newArray, 'm_'.$motorista_cpf, $documentos_tipos);
        //FILES - END
        
        if($this->input->post('id') != null){
            if(strlen($this->input->post('id')) > 0){
                $update_id = $this->input->post('id');
                $data['motorista_id'] = $update_id; 
                
                $this->motoristasmodel->update($data, $update_id);
            }
        }else{
            $this->motoristasmodel->insert($data);
        }
        
        redirect(base_url('motoristas'));
    }
    
    public function deleteMotorista(){
        
        
        $id = $this->input->post('idmotorista');
        $sen = MD5($this->input->post('senha'));
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        
        
        $user = $this->motoristasmodel->getByIdRowArray($id);
        
        if($sen == $aux['usuario_senha']){
            $user['motorista_ativo_id'] = 2;
            
            
            $this->motoristasmodel->update($user, $id);
            
            //print_r('ativo do ' . $id . ' alterada com a senha ' . $sen);
            
            $this->session->set_userdata('delete', 1);
            redirect('motoristas', 'refresh');
        }else{
            //print_r('ativo nПлкo alterado');
            $this->session->set_userdata('delete', 2);
            redirect(base_url('motoristas'), 'referesh');
        }
    }
    
    public function editMotorista($id){
        
        
        $motorista_cpf = $this->limpa($this->input->post('cpf'));

        $data = array(
                'motorista_cpf' => $motorista_cpf,
                'motorista_rg' => $this->input->post('rg'),
                'motorista_nome' => $this->refatorarString($this->input->post('nome')),
                'motorista_nascimento' => $this->input->post('nascimento'),
                'motorista_cep' => $this->limpa($this->input->post('cep')),
                'motorista_endereco' => $this->refatorarString($this->input->post('endereco')),
                'motorista_numero' => $this->limpa($this->input->post('numero')),
                'motorista_bairro' => $this->refatorarString($this->input->post('bairro')),
                'motorista_cidade' => $this->refatorarString($this->input->post('cidade')),
                'motorista_estado' => $this->refatorarString($this->input->post('estado')),
                'motorista_tel' => $this->limpa($this->input->post('telefone')),
                'motorista_ativo_id' => $this->input->post('ativo'),
                'motorista_cliente_cpfcnpj' => $this->input->post('cliente'),
            );
        
        //FILES - START
        $documentos_tipos = $this->documentosmodel->getAllTipos();
        $docsIdArray = explode('|', $this->input->post('docs-control'));
        
        $newArray = [];
        $index = 0;
        foreach($docsIdArray as $doc){
            if(!empty($_FILES[$doc.'-doc']['name'])){
                $newArray[$index] = $doc;
                $index++;
            }
        }
        
        $oldDocs = $this->documentosmodel->getByTitularCPFCNPJ('m_'.$motorista_cpf);

        foreach($oldDocs as $od){
            $contDoc = 0;
            foreach($docsIdArray as $doc){
                if($od['documento_tipo_id'] == $doc){
                    $contDoc++;
                }
            }
            if($contDoc == 0){
                $this->documentosmodel->delete($od['documento_id']);
            }
        }
        
        $this->moduloupload->uploadByIdArray($newArray, 'm_'.$motorista_cpf, $documentos_tipos);
        //FILES - END

        $this->motoristasmodel->update($data, $id);

        redirect(base_url('motoristas'));
    }

    public function getByCPF(){
        
        
        $cpf = $this->input->post('cpf');
        $moto = $this->motoristasmodel->getByCPF($cpf);
        
        echo json_encode($moto);
    }
    
    function ativarMotorista(){
	    
	    
	    $id = $this->input->post('motorista_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $moto = $this->motoristasmodel->getById($id);
    	    $moto['motorista_ativo_id'] = 1;
    	    $this->motoristasmodel->update($moto, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('motoristas'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('motoristas'));
        }
	}
}
