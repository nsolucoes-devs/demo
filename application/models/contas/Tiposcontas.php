<?php

class Tiposcontas extends MY_Model  {
 
    //função que vai pegar todos os tipos do banco de dados
    public function getTipos(){
        $tipos = $this->db->get('tipo_conta');
        return $tipos->result_array();
    }
   
   //função que vai pegar o tipo pelo id do banco de dados
    public function getTipoId($id){
        $this->db->where('id_tipo_conta', $id);
        $tipos = $this->db->get('tipo_conta');
        return $tipos->result_array();
    }
   
   //função que vai inserir um tipo novo no banco de dados
   public function insertTipo($tipo){
       $this->db->insert('tipo_conta', $tipo);
       $tipoid = $this->db->insert_id();
	   
		return $tipoid;
   }
   
   //função que vai deletar um tipo do banco com base no id passado
   public function deleteTipo($id){
       $this->db->where('id_tipo_conta', $id);
       $this->db->delete('tipo_conta');
   }
   
}