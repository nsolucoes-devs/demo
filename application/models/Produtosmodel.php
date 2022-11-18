<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Produtosmodel extends CI_Model{
    
    // **======================================================================**
    // ||                        Funções de Produtos                           ||
    // **======================================================================**
    
    public function getAll(){
        $this->db->where('produto_ativo_id', 1);        
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
    
    public function getAllProdutoAtivoFilter($grupo){
        $this->db->where('produto_ativo_id != ', 4);
        if($grupo != null &&$grupo != ""){
            $this->db->where('produto_grupo_id', $grupo);
        }
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
    
     public function getAllProdutoAtivo4(){
        $this->db->where('produto_ativo_id != ', 4);
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
    
    public function getAllProdutos(){
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
	
	public function getById($id){
	    $this->db->where('produto_id', $id);
	    $userid = $this->db->get('produtos');
	    return $userid->result_array();
	}
	
	public function getByIdRowArray($id){
	    $this->db->where('produto_id', $id);
	    $userid = $this->db->get('produtos');
	    return $userid->row_array();
	}
	
	public function insert($produto){
	    $this->db->insert('produtos', $produto);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function update($produto, $id){
        $this->db->where('produto_id', $id);
        $this->db->update('produtos', $produto);
    }
    
    public function delete($id){
        $this->db->where('produto_id', $id);
        $this->db->delete('produtos');
    }
    
    public function getByCnpjAtivos($cnpj){
        $this->db->where('produto_fornecedor_cnpj', $cnpj);
        $this->db->where('produto_ativo_id', 1);
        $prod = $this->db->get('produtos');
        return $prod->result_array();
    }
    
    public function getAtivos(){
        $this->db->where('produto_ativo_id', 1);
        $prod = $this->db->get('produtos');
        return $prod->result_array();
    }
    
    public function medidas(){
        $aux = $this->db->get('medidas');
        return $aux->result_array();
    }
    
    public function getMedida($id){
        $this->db->where('medidas_id', $id);
        $data = $this->db->get('medidas');
        return $data->row_array();
    }
    
    
    
    public function get_countProdutosFiltro($filter = null) {
        
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('produto_ativo_id', 1);
        if($filter != null){
            $this->db->like('produto_nome', trim($filter), 'both');
            $this->db->or_like('produto_modelo', trim($filter), 'both');
            $this->db->or_like('produto_fabricante', trim($filter), 'both');
        }
        $a = $this->db->get('produtos')->row_array();
        return $a['pages'];
    }
    
    public function getAllProdutosFiltro($filter = null, $limit, $start){
        $this->db->where('produto_ativo_id', 1);
        if($filter != null){
            $this->db->like('produto_nome', trim($filter), 'both');
            $this->db->or_like('produto_modelo', trim($filter), 'both');
            $this->db->or_like('produto_fabricante', trim($filter), 'both');
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('produto_id', 'desc');
        return $this->db->get('produtos')->result_array();
    }
    
    // **=====================================================================**
    // ||                        Funções de Estoque                           ||
    // **=====================================================================**
    
    public function estoqueAll(){
        $data = $this->db->get('estoque');
        return $data->result_array();
    }
    
    public function getEstoqueByProd($prod){
        $this->db->where('estoque_produto_id', $prod);
        $data = $this->db->get('estoque');
        return $data->result_array();
    }
    
    public function insertEstoque($new){
        $this->db->insert('estoque', $new);
    }
    
    public function insertTitulo($dados){
        $this->db->insert('titulos', $dados);
    }
    
    //-> **---------------------------------------------------------------------**
    //-> ||                             GRUPOS DE PEÇAS                         ||
    //-> **---------------------------------------------------------------------**
    
    public function getGrupos(){
        return $this->db->get('grupos_pecas')->result_array();
    }
    
    public function insertGrupo($new){
        $this->db->insert('grupos_pecas', $new);
    }
    
    public function editGrupo($new, $id){
        $this->db->where('gp_id', $id);
        $this->db->update('grupos_pecas', $new);
    }
    
    public function getGrupoUnico($id){
        $this->db->where('gp_id', $id);
        return $this->db->get('grupos_pecas')->row_array();
    }
    
    public function gruposAtivos(){
        $this->db->where('gp_ativo_id', 1);
        return $this->db->get('grupos_pecas')->result_array();
    }
}