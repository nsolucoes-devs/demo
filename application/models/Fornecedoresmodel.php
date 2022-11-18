<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fornecedoresmodel extends CI_Model{
    
    public function getAll(){
        $data = $this->db->get('fornecedores');
        return $data->result_array();
    }
	
	public function getById($id){
	    $this->db->where('fornecedor_id', $id);
	    $fornecedor = $this->db->get('fornecedores');
	    return $fornecedor->result_array();
	}
	
	public function getByIdRowArray($id){
	    $this->db->where('fornecedor_cnpj', $id);
	    $fornecedor = $this->db->get('fornecedores');
	    return $fornecedor->row_array();
	}
	
	public function getByCNPJRowArray($id){
	    $this->db->where('fornecedor_cnpj', $id);
	    $fornecedor = $this->db->get('fornecedores');
	    return $fornecedor->row_array();
	}
	
	public function insert($fornecedor){
	    $this->db->insert('fornecedores', $fornecedor);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function update($fornecedor, $id){
        $this->db->where('fornecedor_id', $id);
        $this->db->update('fornecedores', $fornecedor);
    }
    
    public function delete($id){
        $this->db->where('fornecedor_id', $id);
        $this->db->delete('fornecedores');
    }

    public function getAtivos(){
        $this->db->where('fornecedor_ativo_id', 1);
        $forns = $this->db->get('fornecedores');
        return $forns->result_array();
    }
}