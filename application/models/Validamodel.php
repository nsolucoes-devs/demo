<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Validamodel extends CI_Model{
    
    public function dias($id){
        $this->db->where('usuario_id', $id);
        $data = $this->db->get('usuarios');
        return $data->row_array();
    }
    
    public function permissao($id){
        $this->db->where('funcao_id', $id);
        $data = $this->db->get('funcao');
        return $data->row_array();
        
    }
    
}