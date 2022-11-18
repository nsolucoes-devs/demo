<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends MY_Controller {
    
    public function index(){
        $this->header('0');
        $this->load->view('icon');
        $this->footer();
    }
    
    public function perfil(){
        $this->load->database();
        $this->load->model('configuracaomodel');
        
        $id = $this->session->userdata('user_id');
        $data = $this->configuracaomodel->getByIdUsuario($id);
        
        if(strlen($this->limpa($data['usuario_cpf'])) == 11){
            $data['usuario_cpf'] = $this->mask($data['usuario_cpf'], '###.###.###-##');
        } else if(strlen($this->limpa($data['usuario_cpf'])) == 14){
            $data['usuario_cpf'] = $this->mask($data['usuario_cpf'], '##.###.###/###-##');
        }
        
        if(strlen($this->limpa($data['usuario_telefone'])) == 10){
            $data['usuario_telefone'] = $this->mask($data['usuario_telefone'], '(##) ####-####');
        } else if(strlen($this->limpa($data['usuario_telefone'])) == 11){
            $data['usuario_telefone'] = $this->mask($data['usuario_telefone'], '(##) #####-####');
        }
        
        if(strlen($this->limpa($data['usuario_celular'])) == 10){
            $data['usuario_celular'] = $this->mask($data['usuario_celular'], '(##) ####-####');
        } else if(strlen($this->limpa($data['usuario_celular'])) == 11){
            $data['usuario_celular'] = $this->mask($data['usuario_celular'], '(##) #####-####');
        }
        
        $data['usuario_nome'] = $this->refatorarstring($data['usuario_nome']);
        $data['usuario_cep'] = $this->mask($data['usuario_cep'], '#####-####');
        
        $this->header('0', 'CONFIGURAÇÕES DE PERFIL', 'configuracoes', 'Configuracoes', 'Perfil');
        $this->load->view('perfil', $data);
        $this->footer();
    }
    
    public function editarperfil(){
        $this->load->database();
        $this->load->model('configuracaomodel');
        
        $id = $this->session->userdata('user_id');
        
        $data = array(
            'usuario_nome' => $this->input->post('usuario_nome'),
            'usuario_cpf' => $this->limpa($this->input->post('usuario_cpf')),
            'usuario_rg' => $this->limpa($this->input->post('usuario_rg')),
            'usuario_nascimento' => $this->input->post('usuario_nascimento'),
            'usuario_cep' => $this->limpa($this->input->post('usuario_cep')),
            'usuario_endereco' => $this->refatorarstring($this->input->post('usuario_endereco')),
            'usuario_numero' => $this->input->post('usuario_numero'),
            'usuario_complemento' => $this->refatorarstring($this->input->post('usuario_complemento')),
            'usuario_bairro' => $this->refatorarstring($this->input->post('usuario_bairro')),
            'usuario_cidade' => $this->refatorarstring($this->input->post('usuario_cidade')),
            'usuario_estado' => $this->refatorarstring($this->input->post('usuario_estado')),
            'usuario_email' => $this->input->post('usuario_email'),
            'usuario_telefone' => $this->limpa($this->input->post('usuario_telefone')),
            'usuario_celular' => $this->limpa($this->input->post('usuario_celular')),
            );
        
        $this->configuracaomodel->updateUsuario($data, $id);
        
        redirect(base_url('perfil'), 'refresh');
    }
    
    public function configuracao(){
        $this->load->database();
        $this->load->model('configuracaomodel');
        
        $data = $this->configuracaomodel->getConfiguracao();
        $data['cfgc_cnpj'] = $this->mask($data['cfgc_cnpj'], '##.###.###/####-##');
        
        if(strlen($this->limpa($data['cfgc_fixo'])) == 10){
            $data['cfgc_fixo'] = $this->mask($data['cfgc_fixo'], '(##) ####-####');
        } else if(strlen($this->limpa($data['cfgc_fixo'])) == 11){
            $data['cfgc_fixo'] = $this->mask($data['cfgc_fixo'], '(##) #####-####');
        }
        
        if(strlen($this->limpa($data['cfgc_cel1'])) == 10){
            $data['cfgc_cel1'] = $this->mask($data['cfgc_cel1'], '(##) ####-####');
        } else if(strlen($this->limpa($data['cfgc_cel1'])) == 11){
            $data['cfgc_cel1'] = $this->mask($data['cfgc_cel1'], '(##) #####-####');
        }
        
        if(strlen($this->limpa($data['cfgc_cel2'])) == 10){
            $data['cfgc_cel2'] = $this->mask($data['cfgc_cel2'], '(##) ####-####');
        } else if(strlen($this->limpa($data['cfgc_cel2'])) == 11){
            $data['cfgc_cel2'] = $this->mask($data['cfgc_cel2'], '(##) #####-####');
        }
        
        
        $this->header('0', 'CONFIGURAÇÕES', 'configuracoes', 'Configuracoes', 'Configurações');
        $this->load->view('configuracao', $data);
        $this->footer();
    }
    
    public function editarconfiguracao(){
        $this->load->database();
        $this->load->model('configuracaomodel');
        $this->load->library('moduloupload');
        
        $data = array(
            'cfgc_empresa'      => $this->refatorarString($this->input->post('razao')),
            'cfgc_cep'          => $this->limpa($this->input->post('cep')),
            'cfgc_numero'       => $this->input->post('numero'),
            'cfgc_complemento'  => $this->refatorarString($this->input->post('complemento')),
            'cfgc_inscestadual' => $this->input->post('inscricao'),
            'cfgc_cnpj'         => $this->limpa($this->input->post('cnpj')),
            'cfgc_endereco'     => $this->refatorarString($this->input->post('endereco')),
            'cfgc_bairro'       => $this->refatorarString($this->input->post('bairro')),
            'cfgc_cidade'       => $this->refatorarString($this->input->post('cidade')),
            'cfgc_estado'       => $this->refatorarString($this->input->post('estado')),
            'cfgc_fixo'         => $this->limpa($this->input->post('tel')),
            'cfgc_cel1'         => $this->limpa($this->input->post('cel1')),
            'cfgc_cel2'         => $this->limpa($this->input->post('cel2')),
            'cfgc_cel1whats'    => $this->input->post('whats1'),
            'cfgc_cel2whats'    => $this->input->post('whats2'),
            'cfgc_banner'       => 'resources/imgs/banner.png',
            'cfgc_logo'         => 'resources/imgs/logo.png',
        );
        
        if($_FILES['banner']['tmp_name']){
            $this->moduloupload->uploadImage('banner', 'banner', '/resources/imgs/');    
        }
        if($_FILES['logo']['tmp_name']){
            $this->moduloupload->uploadImage('logo', 'logo', '/resources/imgs/');
        }

        $this->configuracaomodel->updateConfiguracao($data);
        
        redirect(base_url('configuracao'), 'refresh');
    }
 
    public function backup(){
        $prefs = array(
        'tables'        => array(),                     // Array of tables to backup.
        'ignore'        => array(),                     // List of tables to omit from the backup
        'format'        => 'zip',                       // gzip, zip, txt
        'filename'      => date('Y-m-d_H:m:s').".sql",  // File name - NEEDED ONLY WITH ZIP FILES
        'add_drop'      => TRUE,                        // Whether to add DROP TABLE statements to backup file
        'add_insert'    => TRUE,                        // Whether to add INSERT data to backup file
        'newline'       => "\n"                         // Newline character used in backup file
);
        $this->load->dbutil();
        $backup = $this->dbutil->backup();
        $this->load->helper('file');
        write_file('/backup/', $backup);

        //$this->load->helper('download');
        //force_download('mybackup.gz', $backup);
    }
}
