<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Controladoresmodel extends CI_Model{
    
    public function getAll(){
        $data = $this->db->get('controladores');
        return $data->result_array();
    }
	
	public function getById($id){
	    $this->db->where('controlador_id', $id);
	    $fornecedor = $this->db->get('controladores');
	    return $fornecedor->result_array();
	}
	
	public function getByIdRowArray($id){
	    $this->db->where('controlador_id', $id);
	    $fornecedor = $this->db->get('controladores');
	    return $fornecedor->row_array();
	}
	
	public function insert($fornecedor){
	    $this->db->insert('controladores', $fornecedor);
        return $this->db->error();
	}
	
	public function update($fornecedor, $id){
        $this->db->where('controlador_id', $id);
        $this->db->update('controladores', $fornecedor);
        return $this->db->error();
    }
    
    public function delete($id){
        $this->db->where('controlador_id', $id);
        $this->db->delete('controladores');
        return $this->db->error();
    }

    public function getAtivos(){
        $this->db->where('controlador_ativo_id', 1);
        $forns = $this->db->get('controladores');
        return $forns->result_array();
    }
}