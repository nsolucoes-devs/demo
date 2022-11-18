<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Motoristasmodel extends CI_Model{
    
    public function getAll(){
        $data = $this->db->get('motoristas');
        return $data->result_array();
    }
	
	public function getById($id){
	    $this->db->where('motorista_id', $id);
	    $userid = $this->db->get('motoristas');
	    return $userid->row_array();
	}
	
	public function getByCPF($cpf){
	    $this->db->where('motorista_cpf', $cpf);
	    $motorista = $this->db->get('motoristas');
	    return $motorista->row_array();
	}
	
	public function getByIdRowArray($id){
	    $this->db->where('motorista_id', $id);
	    $userid = $this->db->get('motoristas');
	    return $userid->row_array();
	}
	
	public function getByChassiVeiculo($chassi){
	    $this->db->where('motorista_veiculochassi', $chassi);
	    $userid = $this->db->get('motoristas');
	    return $userid->result_array();
	}
	
	public function insert($motorista){
	    $this->db->insert('motoristas', $motorista);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function update($motorista, $id){
        $this->db->where('motorista_id', $id);
        $this->db->update('motoristas', $motorista);
    }
    
    public function delete($id){
        $this->db->where('motorista_id', $id);
        $this->db->delete('motoristas');
    }
    
    
    public function get_countMotoristasFiltro($filter = null) {
        
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('motorista_ativo_id', 1);
        if($filter != null){
            $filtrocpf = str_replace('.', '', $filter);
            $filtrocpf = str_replace('-', '', $filtrocpf);
            $filtrocpf = str_replace(' ', '', $filtrocpf);
            
            $filtrotelefone = str_replace('(', '', $filter);
            $filtrotelefone = str_replace(')', '', $filtrotelefone);
            $filtrotelefone = str_replace('-', '', $filtrotelefone);
            $filtrotelefone = str_replace(' ', '', $filtrotelefone);
            
            $this->db->like('motorista_nome', trim($filter), 'both');
            $this->db->or_like('motorista_cpf', $filtrocpf, 'both');
            $this->db->or_like('motorista_tel', trim($filtrotelefone), 'both');
            $this->db->or_like('motorista_cidade', trim($filter), 'both');
            $this->db->or_like('motorista_estado', trim($filter), 'both');
        }
        $a = $this->db->get('motoristas')->row_array();
        return $a['pages'];
    }
    
    public function getAllMotoristasFiltro($filter = null, $limit, $start){
        $this->db->where('motorista_ativo_id', 1);
        if($filter != null){
            $filtrocpf = str_replace('.', '', $filter);
            $filtrocpf = str_replace('-', '', $filtrocpf);
            $filtrocpf = str_replace(' ', '', $filtrocpf);
            
            $filtrotelefone = str_replace('(', '', $filter);
            $filtrotelefone = str_replace(')', '', $filtrotelefone);
            $filtrotelefone = str_replace('-', '', $filtrotelefone);
            $filtrotelefone = str_replace(' ', '', $filtrotelefone);
            
            $this->db->like('motorista_nome', trim($filter), 'both');
            $this->db->or_like('motorista_cpf', $filtrocpf, 'both');
            $this->db->or_like('motorista_tel', trim($filtrotelefone), 'both');
            $this->db->or_like('motorista_cidade', trim($filter), 'both');
            $this->db->or_like('motorista_estado', trim($filter), 'both');
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('motorista_id', 'desc');
        return $this->db->get('motoristas')->result_array();
    }

}