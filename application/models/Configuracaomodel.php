<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracaomodel extends CI_Model{

    public function banner(){
        $data = $this->db->get("configuracoes");
        $banner = $data->row_array();
        return $banner['cfgc_banner'];
    }
    
    public function getByIdUsuario($id){
        $this->db->where('usuario_id', $id);
        $usuario = $this->db->get('usuarios');
        return $usuario->row_array();
    }
    
    public function updateUsuario($new, $id){
        $this->db->where('usuario_id', $id);
        $this->db->update('usuarios', $new);
    }
    
    public function getConfiguracao(){
        $this->db->where('cfgc_id', 1);
        $config = $this->db->get('configuracoes');
        return $config->row_array();
    }
    
    public function updateConfiguracao($new){
        $this->db->where('cfgc_id', 1);
        $this->db->update('configuracoes', $new);
    }
    
}