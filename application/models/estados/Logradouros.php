<?php

class Logradouros extends CI_Model  {
    
    
    //Recupera todos os Estados do banco
    public function getLogradouros(){
        $estados = $this->db->get('logradouro');
        
        return $estados->result_array();
    }
    
}