<?php

class MY_Controller extends CI_Controller {
    /*
     * Este controller deve estender o CI_Controller normalmente, pois aqui não precisamos fazer verificação de senha, já que
     * não tem sentido querer proteger a tela de login. ;)
     * A função abaixo simplesmente verifica se o conteúdo da variável logado na sessão é igual a 1, caso seja, então, então não faz nada, caso não seja
     * então redireciona novamente para o controller de login.
     */
     /*
     $sessao = array(
    	'logado'    => TRUE,
    	'user_id'   => $login['usuario_id'],
    	'nome'      => $login['usuario_nome'],
    	'permissao' => $login['usuario_permissao'],
    	'senha'     => $senha,
    	'funcao'    => $login['usuario_funcao_id'],
        );
     */
     
    public function __construct(){
        parent::__construct();

        $logado = $this->session->userdata("logado");
        
        if ($logado != TRUE){
            redirect(base_url('Login/index'));
        }else{
            $this->logger();
        }
        
        
    }
    
    function refatorarString($str) {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        //$str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
        //$str = preg_replace('/[^a-z0-9]/i', '_', $str);
        //$str = preg_replace('/_+/', '_', $str);
        $str = strtoupper($str);
        return $str;
    }
    
    function lowcase($str){
        $str = strtolower($str);
        return $str;
    }
    
    function mask($val, $mask){
        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
            if($mask[$i] == '#') {
                if(isset($val[$k]))
                $maskared .= $val[$k++];
            } else {
                if(isset($mask[$i]))  
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
    
    function limpa($string){
        $helper = array(",", ".", "(", ")", "+", "-", " ", "/");
        return str_replace($helper, "", $string);
    }
    
    //Registra os controllers e funções que estão sendo acessadas
    public function logger(){
        $this->load->database();
        $this->load->model('logger');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'log_nome'          => $this->session->userdata('nome'),
            'log_datahora'      => date('d/m/Y H:i:s'),
            'log_usuario_id'    => $this->session->userdata('user_id'),
            'log_controller'    => $this->uri->segment(1) . "/" . $this->uri->segment(2),
            'log_reg'           => json_encode($_POST),
        );
        
        $this->logger->adicionarLog($log);
    }
    
    //Carrega a view de header
    public function header($pag = null, $titulo = null, $raiz = null, $local = null, $funcao = null){
        //date_default_timezone_get ('America/Sao_Paulo');
	    $this->load->database();
	    $this->load->model('validamodel');
        $permissao = $this->validamodel->permissao($this->session->userdata("funcao"));
        $permissao = explode('|', $permissao['funcao_permissao']);
          
        
        for($i=0; $i<count($permissao); $i++){
            $aux = explode('-',$permissao[$i]);
            if($aux[1] != '0000'){
                $libera[$i] = $aux[0];
            }
        }
        
        /*
        $x = $this->alertas($libera);
        $w = count($x);
        */
        
        $data = array(
            'titulo'        => $titulo,
            'raiz'          => $raiz,
            'local'         => $local,
            'funcao'        => $funcao,
            'pag'           => $pag,
            'links'         => $libera,
            'alertas'       => null,
            'notificacao'   => null,
        );
        
        $this->load->view('recursos/headerNew', $data);
    }
    
    //Carrega a view de footer
    public function footer(){
        $data['senha'] = false;
        $this->load->view('recursos/footer', $data);
    }
    
    function acessorestrito($place=null, $tipo=null){
        //date_default_timezone_get ('America/Sao_Paulo');
	    $this->load->database();
	    $this->load->model('validamodel');
        
        $this->session->unset_userdata("ver");
        $this->session->unset_userdata("editar");
        $this->session->unset_userdata("excluir");
        $this->session->unset_userdata("ativar");
        
        $aux = $this->validamodel->dias($this->session->userdata("user_id"));
        $txt = explode('|', $aux['usuario_trabalho']);
        
        $dia = date('N');
        $hora = date('H:m');
        
        $IO = explode("-", $txt[$dia-1]);
        
        if($hora >= $IO[1] && $hora <= $IO[2]){
            $permissao = $this->validamodel->permissao($this->session->userdata("funcao"));
            $permissao = explode('|', $permissao['funcao_permissao']);
            
            for($i=0; $i<count($permissao); $i++){
                $aux = explode('-',$permissao[$i]);
                $libera[$aux[0]] = $aux[1];
            }
            
            if($tipo != "full"){
                if(array_key_exists($place, $libera) ){
                    if(substr($libera[$place], 0, 1) == 1){
                        $this->session->set_userdata("ver", 1);
                    }
                    if(substr($libera[$place], 1, 1) == 1){
                        $this->session->set_userdata("editar", 1);
                    }
                    if(substr($libera[$place], 2, 1) == 1){
                        $this->session->set_userdata("excluir", 1);
                    }
                    if(substr($libera[$place], 3, 1) == 1){
                        $this->session->set_userdata("ativar", 1);
                    }
                }
            }   
        }else{
            echo "<script>alert('Horário de acesso restrito, tente novamente dentro do horário de expediente, ou contate o administrador!');</script>
            <script> window.location.href ='". base_url('login/sair') ."';</script>";
            }
    }
    
    function alertas($place){
        $j=0;
        
        foreach($place as $plc){

            if($plc == "HOME"){ }
            
            if($plc == "CADASTROS"){ }
            
            if($plc == "CHECKLIST"){ }
            
            /*
            if($plc == "FINANCEIRO"){ 
                $auxiliar = $this->financeiro();
                foreach($auxiliar as $aux){
                    $dados[$j] = array(
                        'link'              => $aux['link'],
                        'tipo'              => $aux['tipo'],
                        'icon'              => $aux['icon'],
                        'notificacao_tipo'  => $aux['notificacao_tipo'],
                        'notificacao_id'    => $aux['notificacao_id'],
                        'notificacao'       => $aux['notificacao'],
                        'data'              => $aux['data'],
                        );
                    $j++;
                }
            }
            
            
            if($plc == "ESTOQUE"){
                $auxiliar = $this->estoque();
                foreach($auxiliar as $aux){
                    $dados[$j] = array(
                        'link'              => $aux['link'],
                        'tipo'              => $aux['tipo'],
                        'icon'              => $aux['icon'],
                        'notificacao_tipo'  => $aux['notificacao_tipo'],
                        'notificacao_id'    => $aux['notificacao_id'],
                        'notificacao'       => $aux['notificacao'],
                        'data'              => $aux['data'],
                        );
                    $j++;
                }
            }
            
            if($plc == "FROTA"){
                $auxiliar = $this->frota();
                foreach($auxiliar as $aux){
                    $dados[$j] = array(
                        'link'              => $aux['link'],
                        'tipo'              => $aux['tipo'],
                        'icon'              => $aux['icon'],
                        'notificacao_tipo'  => $aux['notificacao_tipo'],
                        'notificacao_id'    => $aux['notificacao_id'],
                        'notificacao'       => $aux['notificacao'],
                        'data'              => $aux['data'],
                        );
                    $j++;
                }
            }
            */
            
            if($plc == "MANUTENÇÃO"){
                $auxiliar = $this->manutencao();
                foreach($auxiliar as $aux){
                    $dados[$j] = array(
                        'link'              => $aux['link'],
                        'tipo'              => $aux['tipo'],
                        'icon'              => $aux['icon'],
                        'notificacao_tipo'  => $aux['notificacao_tipo'],
                        'notificacao_id'    => $aux['notificacao_id'],
                        'notificacao'       => $aux['notificacao'],
                        'data'              => $aux['data'],
                        );
                    $j++;
                }
            }
        }
        return $dados;
    }
    
    function estoque(){
        $this->load->database();
        $this->load->model('notificacoesmodel');
        
        $data = $this->notificacoesmodel->estoque();
        return $data;
    }
    
    function financeiro(){
        $this->load->database();
        $this->load->model('notificacoesmodel');
        
        $data = $this->notificacoesmodel->financeiro();
        return $data;
    }
    
    function frota(){
        $this->load->database();
        $this->load->model('notificacoesmodel');
        
        $data = $this->notificacoesmodel->frota();
        return $data;
    }
    
    function manutencao(){
        $this->load->database();
        $this->load->model('notificacoesmodel');
        
        $data = $this->notificacoesmodel->manutencao();
        return $data;
    }
    
}
