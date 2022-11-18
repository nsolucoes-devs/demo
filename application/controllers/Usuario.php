<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
	    $this->load->model('usuariosmodel');
	    $this->load->model('ativosmodel');
	    $this->load->model('cadastrosmodel');
    }
    
    public function index(){
        redirect(base_url('usuarios'));
    }
    
	public function cadastro(){
        
	    
	    $data['funcoes'] = $this->cadastrosmodel->getFuncoes();
	    $data['ativos'] = $this->ativosmodel->getAll();
        
        if($this->uri->segment(2)){
            $data['edita'] = $this->usuariosmodel->getByID($this->uri->segment(2));
        }else{
            $data['edita'] = null;
        }
	    
	    if($this->uri->segment(2)){
	        $this->header('6.1.1', 'Edição de Usuário', 'cadastros', 'Usuários', 'Edição de Usuário');
	    } else {
	        $this->header('6.1.1', 'Cadastro de Usuário', 'cadastros', 'Usuários', 'Cadastro de Usuário');    
	    }
	    
	    $this->load->view('usuario/cadastro', $data);
	    $this->footer();
	}

	//--------------------------------------------------------------------
    
    public function pesquisa($erro = null){
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $erro = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    }
	    
	    $this->acessorestrito('CADASTROS');
        $data['users'] = $this->usuariosmodel->getAll();
	    
	    if($this->session->userdata('insert') != TRUE){
	        $data['insert'] = null;
	    }else{
            $data['insert'] = TRUE;
	    }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('6.1.1', 'Listagem de Usuários', 'cadastros', 'Cadastros', 'Listagem de Usuários');
	    $this->load->view('usuario/pesquisa', $data);
	    $this->footer();
	    
	}
	
	public function mostrar(){
	    
	    
	    $id = $this->uri->segment(2);
	    
	    $data['user'] = $this->usuariosmodel->getByID($id);
	    $data['user']['func'] = $this->cadastrosmodel->getFuncId($data['user']['usuario_funcao_id']);
	    $data['user']['cpf'] = $this->mask($data['user']['usuario_cpf'], '###.###.###-##');
	    
	    if($data['user']['usuario_telefone'] != ""){
	        if(strlen($data['user']['usuario_telefone']) == 10){
	            $data['user']['usuario_telefone'] = $this->mask($data['user']['usuario_telefone'], '(##) ####-####');
	        }else{
	            $data['user']['usuario_telefone'] = $this->mask($data['user']['usuario_telefone'], '(##) #####-####');
	        }
	    }
	    
	    if($data['user']['usuario_celular'] != ""){
	        if(strlen($data['user']['usuario_celular']) == 10){
	            $data['user']['usuario_celular'] = $this->mask($data['user']['usuario_celular'], '(##) ####-####');
	        }else{
	            $data['user']['usuario_celular'] = $this->mask($data['user']['usuario_celular'], '(##) #####-####');
	        }
	    }
	    
	    $dias = [];
	    
	    if($data['user']['usuario_trabalho'] != null){
	        $ex = explode('|', $data['user']['usuario_trabalho']);
	        
	        for($i = 0; $i < count($ex); $i++){
    	        $e = explode('-', $ex[$i]);
    	        if($e[0] == "seg"){$dia = "Segunda";}else if($e[0] == "ter"){$dia = "Terça";}else if($e[0] == "qua"){$dia = "Quarta";}else if($e[0] == "qui"){$dia = "Quinta";}if($e[0] == "sex"){$dia = "Sexta";}if($e[0] == "sab"){$dia = "Sábado";}if($e[0] == "dom"){$dia = "Domingo";}
    	        $dias[$i] = array(
    	                'dia'   => $dia,
    	                'de'    => $e[1],
    	                'ate'   => $e[2],
    	        );
	        }   
	    }
	    
	    $data['dias'] = $dias;
	    
	    $this->header('6.1.1', 'Ver Usuário', 'cadastros', 'Cadastros', 'Ver usuário');
	    $this->load->view('usuario/mostrar', $data);
	    $this->footer();
	}
	
	//--------------------------------------------------------------------
	
	
	public function getUsuarioById(){
	    
	    
	    $id = $this->input->post('usuario_id');
	    $user = $this->usuariosmodel->getByID($id);
	    
	    echo json_encode($user);
	}
	
	public function getUsuarioByCPF(){
	    
	    
	    $cpf = $this->input->post('usuario_cpf');
	    $user = $this->usuariosmodel->getByCPF2($cpf);
	    
	    echo json_encode($user);
	}
	
	public function getFuncaoById(){
	    
	    
	    $id = $this->input->post('usuario_funcao_id');
	    $func = $this->cadastrosmodel->getFuncaoById($id);
	    
	    echo json_encode($func);
	}
	
    public function insertUsuario(){
        
        
        $usuario_trabalho = $this->input->post('dias');
        $usuario_trabalho_formatted = "";
        
        if($usuario_trabalho != null){
            foreach($usuario_trabalho as $dia){
                if(strlen($usuario_trabalho_formatted) > 0) $usuario_trabalho_formatted .= "|";
                $hr_entrada = $this->input->post($dia . "-entrada");
                $hr_saida = $this->input->post($dia . "-saida");
                $usuario_trabalho_formatted .= $dia . "-" . $hr_entrada . "-" . $hr_saida;
            }
        }
        
        $data = [
            'usuario_cpf' => $this->limpa($this->input->post('cpf')),
            'usuario_nome' => $this->refatorarString($this->input->post('nome')),
            'usuario_rg' => $this->input->post('rg'),
            'usuario_telefone' => $this->limpa($this->input->post('telefone')),
            'usuario_nascimento' => $this->input->post('nascimento'),
            'usuario_cep' => $this->limpa($this->input->post('cep')),
            'usuario_endereco' => $this->refatorarString($this->input->post('endereco')),
            'usuario_numero' => $this->limpa($this->input->post('numero')),
            'usuario_bairro' => $this->refatorarString($this->input->post('bairro')),
            'usuario_cidade' => $this->refatorarString($this->input->post('cidade')),
            'usuario_estado' => $this->refatorarString($this->input->post('estado')),
            'usuario_celular' => $this->limpa($this->input->post('celular')),
            'usuario_funcao_id' => $this->input->post('funcao'),
            'usuario_ativo_id' => $this->input->post('ativo'),
            'usuario_senha' => MD5($this->limpa($this->input->post('cpf'))),
            'usuario_datasenha' => date("Y-m-d"),
            'usuario_trabalho' => $usuario_trabalho_formatted,
            'usuario_permissao' => '2',
            ];
        
        if($this->input->post('id') != null){
            if(strlen($this->input->post('id')) > 0){
                $update_id = $this->input->post('id');
                $data['usuario_id'] = $update_id; 
                $this->usuariosmodel->update($data, $update_id);
            }
        }else{
            $this->usuariosmodel->insert($data);
            $this->session->set_userdata('insert', 'TRUE');
        }
        
        redirect(base_url('usuarios'));
    }
    
    public function deleteUsuario(){
        
        $id = $this->input->post('iduser');
        
        $user = $this->usuariosmodel->getId($id);
        $sen = MD5($this->input->post('senha'));
        $help = $this->usuariosmodel->getId($this->session->userdata('user_id'));
        
        
        if($sen == $help['usuario_senha']){
            $user['usuario_ativo_id'] = 2;
            
            $this->usuariosmodel->update($user, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('usuarios'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('usuarios'), 'refresh');
        }
    }
    
    
    public function resetSenha(){
        
        
	    $id = $this->input->post('usuario_id');
	    $user = $this->usuariosmodel->getByID($id);
	    
	    $user['usuario_senha'] = MD5($user['usuario_cpf']);
	    
	    $this->usuariosmodel->update($user, $id);
    }
    
    function ativarUsuario(){
	    
	    
	    $id = $this->input->post('usuario_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $user = $this->usuariosmodel->getId($id);
    	    $user['usuario_ativo_id'] = 1;
    	    $this->usuariosmodel->update($user, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('usuarios'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('usuarios'));
        }
	}
    
}
