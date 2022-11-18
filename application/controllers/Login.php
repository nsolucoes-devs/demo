<?php

class Login extends CI_Controller {
    
    // FUNÇÃO QUE VAI CARREGAR A TELA LOGIN
    public function index($erro = null){
        $this->load->database();
        $data = array(
            'erro' => $erro,
        );
        
        if(array_key_exists('logado', $this->session->userdata())){
            if($_SESSION['logado'] == 1){
                redirect('inicio','refresh');
            }
	    }
	    
        $this->load->view('login', $data);
    }
    
    // FUNÇÃO QUE VAI VALIDAR O LOGIN
    public function validar(){
        $this->load->database();
        $this->load->model('usuariosmodel');

        //RETIRA OS DADOS DO FORMULARIO E PREPARA PARA VERIFICAR
        $user = $this->input->post("login");
        $senha = MD5($this->input->post("senha"));

        //VERIFICA DADOS DO USUARIO NO BANCO
        $login = $this->usuariosmodel->UserPass($user, $senha);

        // VERIFICA SE O USUÁRIO EXISTE NO BANCO
        if($login){
            
                // SE SIM, VERIFICA SE O USUÁRIO NÃO ESTÁ DESATIVADO
            if($login['usuario_ativo_id'] != 2){
                        
                        // SE NÃO, CRIA OS ATRIBUTOS DO COOKIE E JÁ CRIA O COOKIE
                        $sessao = array(
                        	'logado'    => TRUE,
                        	'user_id'   => $login['usuario_id'],
                        	'nome'      => $login['usuario_nome'],
                        	'permissao' => $login['usuario_permissao'],
                        	'senha'     => $senha,
                        	'funcao'    => $login['usuario_funcao_id'],
                        );
                        
                        // REDIRECIONA PARA A HOME DO PAINEL
                	    $this->session->set_userdata($sessao);
                        redirect(base_url('inicio'));
                        
                }else{
                    
                    // ERRO: USUÁRIO INATIVO
                    $erro = 3;
                    $this->index($erro);
                }
            }else{
                
                //ERRO: SENHA INCORRETA
                $erro = 2;
                $this->index($erro);
            }
    }
    
    //Função que vai deslogar do painel financeiro e encerrar a sessão
    public function sair(){
        session_destroy();
        $this->index();
    }
    
    public function checkList(){
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $check = $this->checklistmodel->getChecklistsByKey($this->input->post('id'));
            $frota = $this->checklistmodel->getChecklistsByKey($check['checklist_frota']);
            
            $checkitem = explode("|", $check['checklist_elementos']);
            
            for($i=0; $i<count($checkitem); $i++){
                $itm = $this->checklistmodel->getItensById($checkitem[$i]);
                $itens[$i] = array(
                    'item_id'               => $itm['item_id'],
                    'item_categoria_id'     => $itm['item_categoria_id'],
                    'item_categoria'        => $this->checklistmodel->getCategoriaNameById($itm['item_categoria_id']),
                    'item_nome'             => $itm['item_nome'],
                    'item_foto'             => $itm['item_foto'],
                    );
            }

            $data = array(
                'id'        => $this->input->post('id'),
                'local'     => "",
                'data'      => date('d-m-Y'),
                'placa'     => $frota['frota_placa'],
                'hodômetro' => $frota['frota_km'],
                'itens'     => $itens,
                'categorias'=> $this->checklistmodel->getCategorias(),
                );
            $this->load->view('recursos/headerSimples');   
            $this->load->view('checklist/list', $data);
            $this->load->view('recursos/footerSimples');
        }
    
    public function finalizar(){
        $this->load->database();
        $this->load->model('checklistmodel');
        $chave = $this->input->post('chave');
        $checklist = $this->checklistmodel->getChecklistsByKey($chave);
        
        $elem = explode("|", $checklist['checklist_elementos']);
        
        $obs = $check = $fotos = "";
        
        for($i=0; $i<count($elem); $i++){
            
            $obs .= $this->input->post('obs-'.$elem[$i]);
            $check .= $this->input->post('id-'.$elem[$i]);
            
            if(!empty($_FILES['foto-'.$elem[$i]]['name'])){
                $t = explode(".", $_FILES['foto-'.$elem[$i]]['name']);
                $fotos .= $this->upload('foto-'.$elem[$i], $chave."_".$i.".".$t[1]);
            }else{
                $fotos .= "";
            }
            
            if($i+1 < count($elem)){
                $obs .= "|";
                $check .= "|";
                $fotos .= "|";
            }
        }
        $checklist['checklist_responsavel'] = $this->input->post('responsavel');
        $checklist['checklist_local'] = $this->input->post('local');
        $checklist['checklist_checados'] = $check;
        $checklist['checklist_observacoes'] = $obs;
        $checklist['checklist_fotos'] = $fotos;
        $checklist['checklist_finalizada'] = 1;
        
        $this->checklistmodel->updateCheckList($checklist);
        
        $this->load->view('sucess');
        
    }
    
    public function upload($name, $check)
        {
                $config['upload_path']          = 'imagens/checklist';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['file_name']            = $check;
                
                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($name))
                {
                        $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        
                        return $data['upload_data']['file_name'];
                }
        }
    
    
    
}