<?php

class Notafiscalmodel extends CI_Model  {
    
    //função que pega as notas do banco de dados
    public function getNotas(){
        $nfs = $this->db->get('notas_fiscais');
        return $nfs->result_array();
    }
    
    //função que pega uma nota fiscal pelo id
    public function getNotaUnica($id){
        $this->db->where('id_nf', $id);
        $nf = $this->db->get('notas_fiscais');
        return $nf->row_array();
    }
    
    //função que pega os tipos de faturas do banco de dados
    public function getFaturas(){
        $tipo = $this->db->get('tipo_fatura');
        return $tipo->result_array();
    }
    
    //função que pega os itens pelo id da nota fiscal
    public function getItens($id){
        $this->db->where('nota_id', $id);
        $this->db->where('nf_excluida', 0);
        $itens = $this->db->get('itens_nota_fiscal');
        return $itens->result_array();
    }
    
    //função que pega os itens pelo id da nota fiscal excluida
    public function getItensEx($id){
        $this->db->where('nota_id', $id);
        $itens = $this->db->get('itens_nota_fiscal');
        return $itens->result_array();
    }
    
    //função que vai inserir uma nova nota no banco
    public function inserirNota($nota){
        $this->db->insert('notas_fiscais', $nota);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //função que vai inserir uma nova nota no banco
    public function inserirNotaExcluida($nota){
        $this->db->insert('notas_excluidas', $nota);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //função que exclui uma nota pelo id
    public function deletarNota($id){
	    $this->db->where('id_nf', $id);
	    $this->db->delete('notas_fiscais');
	}
	
	//função que insere os itens da nota
	public function insereItem($item){
	    $this->db->insert('itens_nota_fiscal', $item);
	    $id = $this->db->insert_id();
	    
	    return $id;
	}
	
	//função que atualiza uma nota
	public function updateNota($id, $nota){
        $this->db->where('id_nf', $id);
        $update = $this->db->update('notas_fiscais', $nota);
        return $update;
    }
    
    //função que atualiza um item
	public function updateItem($id, $item){
        $this->db->where('id_inf', $id);
        $update = $this->db->update('itens_nota_fiscal', $item);
        return $update;
    }
}