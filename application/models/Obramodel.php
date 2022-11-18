<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Obramodel extends CI_Model{
    
    public function getAll(){
        return $this->db->get('obra')->result_array();
    }
    
    public function cruObra($dados){         
        if(array_key_exists('obra_id', $dados)){
            unset($dados['created_at']);
            $this->db->replace('obra', $dados); 
        }else{
            $this->db->insert('obra', $dados);
        }
    }
    
    public function getById($id = NULL) {
        if ($id) {
            $this->db->where('obra_id',  $id);
            return $this->db->get('obra')->row();
        }
    }
}