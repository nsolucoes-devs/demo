<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Checklistmodel extends CI_Model{

    public function addCategoria($dados){
        $this->db->insert('categorias', $dados);
    }

    public function addItem($dados){
        $this->db->insert('itens', $dados);
    }
    
    public function getCategorias(){
        return $this->db->get('categorias')->result_array();
    }
    
    public function getCategoriaNameById($id){
        $this->db->where('categoria_id', $id);
        $aux = $this->db->get('categorias')->row_array();
        return $aux['categoria_nome'];
    }
    
    public function getItens(){
        $this->db->order_by('item_categoria_id', 'ASC');
        return $this->db->get('itens')->result_array();
    }
    
    public function get($id){
        $this->db->where('item_categoria_id', $id);
        return $this->db->get('itens')->result_array();
    }
    
    public function getItensById($id){
        $this->db->where('item_id', $id);
        return $this->db->get('itens')->row_array();
    }
    
    public function updateItens($item){
        $this->db->replace('itens', $item);
    }
    
    public function getCategoriasById($id){
        $this->db->where('categoria_id', $id);
        return $this->db->get('categorias')->row_array();
        
    }
    
    public function getClientes(){
        return $this->db->get('clientes')->result_array();
    }
    
    public function getChave($chave){
        $this->db->where('checklist_finalizada', 1);
        $this->db->where('checklist_chave', $chave);
        return $this->db->get('checklist')->row_array();
    }
    
    public function getfrota(){
        return $this->db->get('frota')->result_array();
    }
    
    public function getfrotaById($id){
        $this->db->where('frota_id', $id);
        return $this->db->get('frota')->row_array();
    }
    
    public function addChecklist($dados){
        $this->db->insert('checklist', $dados);
    }
    
    public function getChecklistsAtivo(){
        $this->db->where('checklist_finalizada', 0);
        return $this->db->get('checklist')->result_array();
    }
    
    public function getChecklistsByKey($chave){
        $this->db->where('checklist_chave', $chave);
        return $this->db->get('checklist')->row_array();
    }
    
    public function updateCheckList($dados){
        $this->db->replace('checklist', $dados);
    }
    
    public function retriveActiveKey($key){
        $this->db->where('checklist_chave', $key);
        $this->db->where('checklist_finalizada', 0);
        return $this->db->get('checklist')->row_array();
    }
    
    public function removeitem($key){
        $this->db->where('item_id', $key);
        $this->db->delete('itens');
    }
    
    public function getChecklistsCompleto(){
        $this->db->where('checklist_finalizada', 1);
        return $this->db->get('checklist')->result_array();
    }
    
    public function checklistCompleto($id){
        $this->db->where('checklist_id', $id);
        $a = $this->db->get('checklist')->row_array();
        
        $elm = explode("|", $a['checklist_elementos']);
        $ckd = explode("|", $a['checklist_checados']);
        $obs = explode("|", $a['checklist_observacoes']);
        $pic = explode("|", $a['checklist_fotos']);
        
        for($i=0; $i<count($elm); $i++){
            $this->db->where('item_id', $elm[$i]);
            $elm[$i] = $this->db->get('itens')->row_array();
        }
        
        $this->db->select('categoria_id, categoria_nome');
        $c = $this->db->get('categorias')->result_array();
        
        $dados = array(
            'local'         => $a['checklist_local'],
            'data'          => $a['checklist_data'],
            'placa'         => $a['checklist_placa'],
            'hodômetro'     => $a['checklist_hodometro'],
            'chave'         => $a['checklist_chave'],
            'responsavel'   => $a['checklist_responsavel'],
            'categorias'    => $c,
            'itens'         => $elm,
            'checados'      => $ckd,
            'observacoes'   => $obs,
            'fotos'         => $pic,
            );
        return $dados;
    }
}
