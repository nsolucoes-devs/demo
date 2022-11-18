<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklist extends MY_Controller {

        function novacategoria(){
            $this->load->database();
            $this->load->model('checklistmodel');
            $dados = array(
                'categoria_nome'        => $this->input->post('categoria'),
                'categoria_posicao'     => $this->input->post('importancia'),
                );
            $this->checklistmodel->addCategoria($dados);
            redirect(base_url('checkitens'));
        }
        
        function novoitem(){
            $this->load->database();
            $this->load->model('checklistmodel');
            
            if($this->input->post('foto') == null){
                $foto = 0;
            }else{
                $foto = $this->input->post('foto');
            }
            
            $dados = array(
                'item_nome'         => $this->input->post('item'),
                'item_posicao'      => $this->input->post('importancia'),
                'item_categoria_id' => $this->input->post('categoria_id'),
                'item_foto'         => $foto,
                );
            $this->checklistmodel->addItem($dados);
            redirect(base_url('checkitens'));
        }
        
        function desativar(){
            $this->load->database();
            $this->load->model('checklistmodel');
            $this->checklistmodel->removeitem($this->input->post('funcao_id'));
            redirect(base_url('checkitens'));
        }
        
        function reativar(){
            $this->load->database();
            $this->load->model('checklistmodel');
            $aux = $this->checklistmodel->getItensById($this->input->post('funcao_idatv'));
            $aux['item_ativo'] = 1;
            $this->checklistmodel->updateItens($aux);
            redirect(base_url('checkitens'));
        }
        
        function chave(){
            $this->load->database();
            $this->load->model('checklistmodel');
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789-_";
            $string = '';
            for($i = 0; $i < 10; $i++){
                $string .= $chars[mt_rand(0,62)];
            }
            
            $date = date('Y-m-d H:m:s');
            
            $chave = $date.$string;
            
            for($i= 0; $i < 10; $i++){
                $chave = hash('md5', $chave);
            }
            
            if($this->checklistmodel->getChave($chave) != ""){
                $this->chave();
            }else{
                return $chave;
            }
        }
        
        function novochecklist(){
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $item = "";
            $itens = $this->input->post('itens');
            for($i=0; $i<count($itens); $i++){
                $item .= $itens[$i];
                if(isset($itens[$i+1])){
                $item .= "|";
                }
            }
            
            $chave = $this->input->post('chave');
            
            $Z = $this->checklistmodel->retriveActiveKey($chave);
            
            if($Z == 0 || $Z == null){
                $dados = array(
                    'checklist_cliente'     => $this->input->post('cliente'),
                    'checklist_frota'       => $this->input->post('frota'),
                    'checklist_elementos'   => $item,
                    'checklist_chave'       => $chave,
                    'checklist_fotos'       => "",
                    'checklist_finalizada'  => 0,
                    );
                $this->checklistmodel->addChecklist($dados);
                redirect(base_url('checkgerar'));
            }else{
                $this->session->set_userdata('erro', 1);
                redirect(base_url('checkgerar'));
            }
        }
        
        public function itens(){
            $this->acessorestrito("CHECKLIST");
            
            $pag = '7.1';
            $titulo = 'LISTA DE ITENS';
            $raiz = '#';
            $local = 'CheckList';
            $funcao = 'Itens';
            
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $itens = $this->checklistmodel->getItens();
            for($i=0; $i<count($itens); $i++){
                
                $aux = $this->checklistmodel->getCategoriasById($itens[$i]['item_categoria_id']);
                $itens[$i]['item_categoria_id'] = $aux['categoria_nome'];
            }
            
            $data = array(
                'erro' => null,
                'itens' => $itens,
                'categorias' => $this->checklistmodel->getCategorias(),
                );
            
            $this->header($pag, $titulo, $raiz, $local, $funcao);
            $this->load->view('checklist/listagem', $data);
            $this->footer();
        }
        
        public function gerar(){
            $this->acessorestrito("CHECKLIST");
            
            $pag = '7.2';
            $titulo = 'CHECKLISTS';
            $raiz = '#';
            $local = 'CheckList';
            $funcao = 'CheckList';
            
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $itens = $this->checklistmodel->getItens();
            for($i=0; $i<count($itens); $i++){
                
                $aux = $this->checklistmodel->getCategoriasById($itens[$i]['item_categoria_id']);
                $itens[$i]['item_categoria_id'] = $aux['categoria_nome'];
            }
            
            $checks = $this->checklistmodel->getChecklistsAtivo();
            $itens = $this->checklistmodel->getItens();
            $categorias = $this->checklistmodel->getCategorias();
            $clientes = $this->checklistmodel->getClientes();
            $chave = $this->chave();
            $frota = $this->checklistmodel->getFrota();
            
            for($i=0; $i<count($checks);$i++){
                foreach($clientes as $cli){
                    if($checks[$i]['checklist_cliente'] == $cli['cliente_cpfcnpj']){
                        $checks[$i]['checklist_cliente'] = $cli['cliente_nome'];
                    }
                }
                foreach($frota as $frt){
                    if($checks[$i]['checklist_frota'] == $frt['frota_id']){
                        $checks[$i]['checklist_frota'] = $frt['frota_codigo'];
                    }
                }
            }

            $data = array(
                'erro'      => null,
                'itens'     => $itens,
                'categorias'=> $categorias,
                'clientes'  => $clientes,
                'chave'     => $this->chave(),
                'frota'     => $frota,
                'checklists'=> $checks,
                );
                
            $this->header($pag, $titulo, $raiz, $local, $funcao);
            $this->load->view('checklist/gerachecklist', $data);
            $this->footer();
        }
        
        public function preencher(){
            $this->acessorestrito("CHECKLIST");
            
            $pag = '7.3';
            $titulo = 'CHECKLISTS';
            $raiz = '#';
            $local = 'CheckList';
            $funcao = 'CheckList';
            
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $data = array(
                'erro' => null,
                );
            
            
            $this->header($pag, $titulo, $raiz, $local, $funcao);
            $this->load->view('checklist/checklist', $data);
            $this->footer();
            
        }
        
        public function list($id=null){
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $check = $this->checklistmodel->getChecklistsByKey($id);
            $frota = $this->checklistmodel->getfrotaById($check['checklist_frota']);
            
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
                'id'        => $id,
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
        
        public function listagem(){
            $this->acessorestrito("CHECKLIST");
            
            $pag = '7.4';
            $titulo = 'CHECKLISTS FINALIZADOS';
            $raiz = '#';
            $local = 'CheckList';
            $funcao = 'CheckList';
            
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $itens = $this->checklistmodel->getItens();
            for($i=0; $i<count($itens); $i++){
                
                $aux = $this->checklistmodel->getCategoriasById($itens[$i]['item_categoria_id']);
                $itens[$i]['item_categoria_id'] = $aux['categoria_nome'];
            }
            
            $checks = $this->checklistmodel->getChecklistsCompleto();
            $itens = $this->checklistmodel->getItens();
            $categorias = $this->checklistmodel->getCategorias();
            $clientes = $this->checklistmodel->getClientes();
            $chave = $this->chave();
            $frota = $this->checklistmodel->getFrota();
            
            for($i=0; $i<count($checks);$i++){
                foreach($clientes as $cli){
                    if($checks[$i]['checklist_cliente'] == $cli['cliente_cpfcnpj']){
                        $checks[$i]['checklist_cliente'] = $cli['cliente_nome'];
                    }
                }
                foreach($frota as $frt){
                    if($checks[$i]['checklist_frota'] == $frt['frota_id']){
                        $checks[$i]['checklist_frota'] = $frt['frota_codigo'];
                    }
                }
            }

            $data = array(
                'erro'      => null,
                'itens'     => $itens,
                'categorias'=> $categorias,
                'clientes'  => $clientes,
                'chave'     => $this->chave(),
                'frota'     => $frota,
                'checklists'=> $checks,
                );
                
            $this->header($pag, $titulo, $raiz, $local, $funcao);
            $this->load->view('checklist/listcheck', $data);
            $this->footer();
        }
        
        public function visualizar(){
            $this->load->database();
            $this->load->model('checklistmodel');
            $a = $this->checklistmodel->checklistCompleto($this->input->post('checklist_id'));
            
            $this->load->view('checklist/listacompleta', $a);
            
        }
        
        public function novaCheckList(){
            $this->acessorestrito("CHECKLIST");
            
            $this->load->database();
            $this->load->model('checklistmodel');
            
            
            $data = array(
                'cinterna'      => $this->checklistmodel->get(3),
                'seletrico'     => $this->checklistmodel->get(4),
                'cexterna'      => $this->checklistmodel->get(5),
                'pneu'          => $this->checklistmodel->get(6),
                'carroceria'    => $this->checklistmodel->get(7),
                'csuplementar'  => $this->checklistmodel->get(8),
                'clientes'      => $this->checklistmodel->getClientes(),
                'frota'         => $this->checklistmodel->getFrota(),
            );
                
            $this->header(7.4, 'CHECKLISTS FINALIZADOS', '#', 'Checklist', 'Checklist');
            $this->load->view('checklist/checklistnova', $data);
            $this->footer();
        }
        
        public function verificarChave(){
            $this->load->database();
            $this->load->model('checklistmodel');
            
            $chave = $this->checklistmodel->getChecklistsByKey($this->input->post('chave'));
            
            if($chave){
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        }
        
}   