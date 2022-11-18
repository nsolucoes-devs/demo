<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logger extends CI_Model {
	
	// **=====================================================================**
    // || Funções de Log de Acesso                                            ||
    // **=====================================================================**
    
	public function adicionarLog($log){
	    $this->db->insert('log_acesso', $log);
	}
	
	// **=====================================================================**
    // || Funções de Log de Reabertura de OS                                  ||
    // **=====================================================================**
    
    public function insertLogReaberturaOS($log){
        $this->db->insert('log_reabertura_os', $log);
    }
    
    // **=====================================================================**
    // || Funções de Log de Reabertura de Título                              ||
    // **=====================================================================**
    
    public function insertLogReaberturaTitulo($log){
        $this->db->insert('log_reabertura_titulo', $log);
    }
}