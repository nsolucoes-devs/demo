<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastrosmodel extends CI_Model{
    
    //pega todas as linhas da tabela 'ativo'
    public function getAtivos(){
        $ativos = $this->db->get('ativo <', 2);
        return $ativos->result_array();
    }
    
    //pega um ativo unido pelo id
    public function getAtivoId($id){
        $this->db->where('ativo_id', $id);
        $ativo = $this->db->get('ativo');
        return $ativo->row_array();
    }
    
    //  **=======================================================================================**
    //  ||                                 FUNÇÕES DE FUNÇÕES                                    ||
    //  **=======================================================================================**
    
    //pega todas as linhas da tabela 'funcao'
    public function getFuncoes(){
        $this->db->where('funcao_id >', "1");
        $func = $this->db->get('funcao');
        return $func->result_array();
    }
    
    //insere uma novao função no database
    public function insertFuncao($new){
        $this->db->insert('funcao', $new);
        return $this->db->insert_id();
    }
    
    public function updateFuncao($new){
        $this->db->replace('funcao', $new);
    }
    
    public function deleteFuncao($id){
        $this->db->where('funcao_id', $id);
        $this->db->delete('funcao');
    }
    
    public function getFuncId($id){
	    $this->db->where('funcao_id', $id);
	    $funcao = $this->db->get('funcao');
	    return $funcao->row_array();
	}
	
	public function getFuncaoById($id){
	    $this->db->where('funcao_id', $id);
	    $funcao = $this->db->get('funcao');
	    return $funcao->result_array();
	}
    
    //busca função pelo id
    public function getFunctionByID($id){
	    $this->db->where('funcao_id', $id);
	    $funcao = $this->db->get('funcao');
	    return $funcao->result_array();
	}
	
	public function getByName($name){
	    $this->db->where('funcao_nome', $name);
	    $funcao = $this->db->get('funcao');
	    return $funcao->result_array();
	}
	
	//  **===========================================================================================**
    //  ||                                 FUNÇÕES DE FORNECEDORES                                   ||
    //  **===========================================================================================**
    
    //pega todas as linhas da tabela 'fornecedores'
    public function getFornecedores(){
        $forn = $this->db->get('fornecedores');
        return $forn->result_array();
    }
    
    public function getFornecedoresGrouped(){
        $this->db->group_by('fornecedor_estado');
        $forn = $this->db->get('fornecedores');
        return $forn->result_array();
    }
    
    public function getFornecedoresFiltered($estado){
        if($estado != "" && $estado != null){
            $this->db->where('fornecedor_estado', $estado);
        }
        return $this->db->get('fornecedores')->result_array();
    }
    
    //insere um novo fornecedor no database
    public function insertFornecedor($new){
        $this->db->insert('fornecedores', $new);
        return $this->db->insert_id();
    }
    
    public function updateFornecedor($new, $cnpj){
        $this->db->where('fornecedor_cnpj', $cnpj);
        $this->db->update('fornecedores', $new);
    }
    
    public function deleteFornecedor($cnpj){
        $this->db->where('fornecedor_cnpj', $cnpj);
        $this->db->delete('fornecedores');
    }
    
    public function getFornCnpj($cnpj){
	    $this->db->where('fornecedor_cnpj', $cnpj);
	    $forn = $this->db->get('fornecedores');
	    return $forn->row_array();
	}
	
	public function getFornCnpjNome($cnpj){
	    $this->db->where('fornecedor_cnpj', $cnpj);
	    $forn = $this->db->get('fornecedores')->row_array();
	    return $forn['fornecedor_nome'];
	}
	
	public function getFornByCnpj($cnpj){
	    $this->db->where('fornecedor_cnpj', $cnpj);
	    $fornecedor = $this->db->get('fornecedores');
	    return $fornecedor->result_array();
	}
	
	
	
	
	
	
	
	

    
    public function get_countFornecedoresFiltro($filter = null) {
        
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('fornecedor_ativo_id', 1);
        if($filter != null){
            $filtrocnpj = str_replace('.', '', $filter);
            $filtrocnpj = str_replace('/', '', $filtrocnpj);
            $filtrocnpj = str_replace('-', '', $filtrocnpj);
            $filtrocnpj = str_replace(' ', '', $filtrocnpj);
            
            $this->db->like('fornecedor_cnpj', $filtrocnpj, 'both');
            $this->db->or_like('fornecedor_nome', trim($this->tirarAcentos($filter)), 'both');
        }
        $a = $this->db->get('fornecedores')->row_array();
        return $a['pages'];
    }
    
    public function getAllFornecedoresFiltro($filter = null, $limit, $start){
        $this->db->where('fornecedor_ativo_id', 1);
        if($filter != null){
            $filtrocnpj = str_replace('.', '', $filter);
            $filtrocnpj = str_replace('/', '', $filtrocnpj);
            $filtrocnpj = str_replace('-', '', $filtrocnpj);
            $filtrocnpj = str_replace(' ', '', $filtrocnpj);
            
            $this->db->like('fornecedor_cnpj', $filtrocnpj);
            $this->db->or_like('fornecedor_nome', trim($this->tirarAcentos($filter)), 'both');
        }
        $this->db->limit($limit, $start);
        return $this->db->get('fornecedores')->result_array();
    }
    
    public function tirarAcentos($string){
       return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
}