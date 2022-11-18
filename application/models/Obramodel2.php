<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Obramodel2 extends CI_Model{
    
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
    
}