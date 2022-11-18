<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentosmodel extends CI_Model{
    
    //--------------------------------------------------------------------------
    
    public function getAllTipos(){
        $data = $this->db->get('documentos_tipos');
        return $data->result_array();
    }
    
    public function getAllTiposAtivos(){
        $this->db->where('documentos_tipos_ativo_id', 1);
        $data = $this->db->get('documentos_tipos');
        return $data->result_array();
    }
    
    public function getTipoById($id){
        $this->db->where('documentos_tipos_id', $id);
        $data = $this->db->get('documentos_tipos');
        return $data->result_array();
    }
    
    public function insertTipo($tipo){
        $this->db->insert('documentos_tipos', $tipo);
        $err = $this->db->error();
        return $err;
    }
    
    //--------------------------------------------------------------------------
    
    public function getAll(){
        $data = $this->db->get('documentos');
        return $data->result_array();
    }
    
    public function getByTipoId($tipo_id){
        $this->db->where('documento_tipo_id', $tipo_id);
	    $documento = $this->db->get('documentos');
	    return $documento->row_array();
    }
	
	public function getByTitularCPFCNPJ($cpfcnpj){
	    $this->db->where('documento_titular_cpfcnpj', $cpfcnpj);
	    $documento = $this->db->get('documentos');
	    return $documento->result_array();
	}
	
	public function getById($id){
	    $this->db->where('documento_id', $id);
	    $documento = $this->db->get('documentos');
	    return $documento->result_array();
	}
	
	public function getByIdRowArray($id){
	    $this->db->where('documento_id', $id);
	    $documento = $this->db->get('documentos');
	    return $documento->row_array();
	}
	
	public function insert($documento){
	    $this->db->insert('documentos', $documento);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function update($documento, $id){
        $this->db->where('documento_id', $id);
        $this->db->update('documentos', $documento);
    }
    
    public function updateTipo($documento, $id){
        $this->db->where('documentos_tipos_id', $id);
        $this->db->update('documentos_tipos', $documento);
    }
    
    public function delete($id){
        $this->db->where('documento_id', $id);
        $this->db->delete('documentos');
    }
    
    public function search($id, $identificador){
        $this->db->where('documento_tipo_id', $id);
        $this->db->where('documento_titular_cpfcnpj', $identificador);
        $get = $this->db->get('documentos');
        $get = $get->row_array();
        
        if($get != "" && $get != null && $get != " "){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function search2($id, $identificador){
        $this->db->where('documento_tipo_id', $id);
        $this->db->where('documento_frota', $identificador);
        $get = $this->db->get('documentos');
        $get = $get->row_array();
        
        if($get != "" && $get != null && $get != " "){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function getOldDoc($id, $identificador){
        $this->db->where('documento_tipo_id', $id);
        $this->db->where('documento_titular_cpfcnpj', $identificador);
        $old = $this->db->get('documentos');
        return $old->row_array();
    }
    
    public function updateTypeDoc($id, $new){
        $this->db->where('documento_id', $id);
        $this->db->update('documentos', $new);
    }
    
    public function getDocsByFrota($frota){
        $this->db->where('documento_frota', $frota);
        $docs = $this->db->get('documentos');
        return $docs->result_array();
    }
    
    public function getOldByFrota($id, $frota){
        $this->db->where('documento_tipo_id', $id);
        $this->db->where('documento_frota', $frota);
        $old = $this->db->get('documentos');
        return $old->row_array();
    }

}