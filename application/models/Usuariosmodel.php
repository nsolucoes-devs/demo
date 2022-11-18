<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuariosmodel extends CI_Model{
    
    public function getAll(){
        $data = $this->db->get('usuarios');
        return $data->result_array();
    }
	
	public function getByCPF($cpf){
	    $this->db->where('usuario_cpf', $cpf);
	    $users = $this->db->get('usuarios');
	    return $users->result_array();
	}
	
	public function getByCPF2($cpf){
	    $this->db->where('usuario_cpf', $cpf);
	    $users = $this->db->get('usuarios');
	    return $users->row_array();
	}
	
	public function getByID($id){
	    $this->db->where('usuario_id', $id);
	    $userid = $this->db->get('usuarios');
	    return $userid->row_array();
	}
	
	public function getId($id){
	    $this->db->where('usuario_id', $id);
	    $userid = $this->db->get('usuarios');
	    return $userid->row_array();
	}
	
	//função criada para pegar o usuario pelo user para a função de login
	public function getByUser($user){
	    $this->db->where('usuario_cpf', $user);
	    $getUser = $this->db->get('usuarios');
	    return $getUser->result_array();
	}
	
	public function UserPass($user, $pass){
	    $this->db->where('usuario_cpf', $user);
	    $this->db->where('usuario_senha', $pass);
	    $getUser = $this->db->get('usuarios');
	    return $getUser->row_array();
	}
	
	public function insert($usuario){
	    $this->db->insert('usuarios', $usuario);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function update($usuario, $id){
        $this->db->where('usuario_id', $id);
        $this->db->update('usuarios', $usuario);
    }
    
    public function delete($id){
        $this->db->where('usuario_id', $id);
        $this->db->delete('usuarios');
    }

}