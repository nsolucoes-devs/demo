<?php

class Contasmodel extends MY_Model  {
    
    //função que inserir uma nova despesa
    public function insertDespesa($despesa){
        $this->db->insert('despesas', $despesa);
        $despesaid = $this->db->insert_id();
	   
		return $despesaid;
    }
    
    //função que retorna todas as despesas de uma data
    public function getDespesasCaixa($dt){
        $this->db->where('data_despesa', $dt);
        $desp = $this->db->get('despesas');
        
        return $desp->result_array();
    }
    
    //função que retorna todas as despesas de um caixa
    public function getDespesasCaixaId($id){
        $this->db->where('caixa_id', $id);
        $desp = $this->db->get('despesas');
        
        return $desp->result_array();
    }
    
    //função que retorna todas as despesas de uma data e loja
    public function getDespesasCaixaDtLoja($dt, $loja){
        $this->db->where('data_despesa', $dt);
        $this->db->where('loja_id', $loja);
        $desp = $this->db->get('despesas');
        
        return $desp->result_array();
    }
    
    //função que retorna todas as despesas de uma loja
    public function getDespesasLoja($loja){
        $this->db->where('loja_id', $loja);
        $desp = $this->db->get('despesas');
        
        return $desp->result_array();
    }
    
    //função que retorna todas as despesas
    public function getDespesas(){
        $desp = $this->db->get('despesas');
        
        return $desp->result_array();
    }
    
    //função que retorna a despesas pelo id
    public function getDespesaId($id){
        $this->db->where('id_despesa', $id);
        $desp = $this->db->get('despesas');
        
        return $desp->row_array();
    }
    
    //função que vai atualizar uma despesa
	public function atualizarDespesa($despesa, $id){
	    $this->db->where('id_despesa', $id);
	    $update = $this->db->update('despesas', $despesa);
	    return $update;
	}
	
	//função que vai deletar uma despesa
   public function deleteDespesa($id){
       $this->db->where('id_despesa', $id);
       $this->db->delete('despesas');
   }
}