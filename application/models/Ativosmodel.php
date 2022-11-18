<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ativosmodel extends CI_Model
{

    public function getAll()
    {
        $this->db->order_by('ativo_id', 'ASC');
        $this->db->limit(2);
        $data = $this->db->get('ativo');
        return $data->result_array();
    }
}
