<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientesmodel extends CI_Model{
    
    public function getAll(){
        $data = $this->db->get('clientes');
        return $data->result_array();
    }
    
    public function getAllAtivos(){
        $this->db->where('cliente_ativo_id', 1);
        $data = $this->db->get('clientes');
        return $data->result_array();
    }
	
	public function getCPFCNPJ($cpfcnpj){
	    $this->db->where('cliente_cpfcnpj', $cpfcnpj);
	    $cliente = $this->db->get('clientes');
	    return $cliente->row_array();
	}
	
	public function getCPFCNPJNome($cpfcnpj){
	    $this->db->where('cliente_cpfcnpj', $cpfcnpj);
	    $cliente = $this->db->get('clientes')->row_array();
	    return $cliente['cliente_nome'];
	}
	
	public function getByCPFCNPJ($cpfcnpj){
	    $this->db->where('cliente_cpfcnpj', $cpfcnpj);
	    $cliente = $this->db->get('clientes');
	    return $cliente->result_array();
	}
	
	public function insert($cliente){
	    $this->db->insert('clientes', $cliente);
	}
	
	public function update($cliente, $cpf){
        $this->db->where('cliente_cpfcnpj', $cpf);
        $this->db->update('clientes', $cliente);
    }
    
    public function delete($cpf){
        $this->db->where('cliente_cpfcnpj', $cpf);
        $this->db->delete('clientes');
    }
    
    public function novoVinculo($new){
        $this->db->insert('locacao', $new);
    }
    
    public function getLocacoesByCliente($cliente){
        $this->db->where('locacao_cliente_id', $cliente);
        $data = $this->db->get('locacao');
        return $data->result_array();
    }
    
    public function getLocacaoById($id){
        $this->db->where('locacao_id', $id);
        $data = $this->db->get('locacao');
        return $data->row_array();
    }
    
    public function updateLocacao($new, $id){
        $this->db->where('locacao_id', $id);
        $this->db->update('locacao', $new);
    }
    
    
    
    
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('cliente_ativo_id', 1);
        $a = $this->db->get('clientes')->row_array();
        return $a['pages'];
    }
    
    public function getAllPag($limit, $start){
        $this->db->where('cliente_ativo_id', 1);
        $this->db->limit($limit, $start);
        return $this->db->get('clientes')->result_array();
    }
    
    public function get_countFiltro($filter) {
        $filtrocpf    = str_replace('.', '', $filter);
        $filtrocpf    = str_replace('/', '', $filtrocpf);
        $filtrocpf    = str_replace('-', '', $filtrocpf);
        $filtrocpf    = str_replace(' ', '', $filtrocpf);
        $filtroestado = str_replace(' ', '', $filter);
        
        
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('cliente_ativo_id', 1);
        $this->db->like('cliente_cpfcnpj', $filtrocpf, 'both');
        $this->db->or_like('cliente_nome', trim($this->tirarAcentos($filter)), 'both');
        $this->db->or_like('cliente_cidade', trim($this->tirarAcentos($filter)), 'both');
        $this->db->or_like('cliente_estado', $this->tirarAcentos($filtroestado), 'both');
        
        $a = $this->db->get('clientes')->row_array();
        return $a['pages'];
    }
    
    public function getAllFiltro($filter, $limit, $start){
        $filtrocpf = str_replace('.', '', $filter);
        $filtrocpf = str_replace('/', '', $filtrocpf);
        $filtrocpf = str_replace('-', '', $filtrocpf);
        $filtrocpf    = str_replace(' ', '', $filtrocpf);
        $filtroestado = str_replace(' ', '', $filter);
        
        $this->db->where('cliente_ativo_id', 1);
        $this->db->like('cliente_cpfcnpj', $filtrocpf, 'both');
        $this->db->or_like('cliente_nome', trim($this->tirarAcentos($filter)), 'both');
        $this->db->or_like('cliente_cidade', trim($this->tirarAcentos($filter)), 'both');
        $this->db->or_like('cliente_estado', $this->tirarAcentos($filtroestado), 'both');
        $this->db->limit($limit, $start);
        return $this->db->get('clientes')->result_array();
    }
    
    public function tirarAcentos($string){
       return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
    
}