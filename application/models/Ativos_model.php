<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ativos_model extends CI_Model
{
    public $ativos_descricao;
    public $ativos_marca;
    public $ativos_modelo;
    public $ativos_numero_serie;
    public $ativos_data_fabricacao;
    public $ativos_data_entrada;
    public $ativos_valor;
    public $ativos_local;
    public $ativos_status;
    public $ativos_quantidade;

    public function index()
    {
        $query = $this->db->order_by('ativos_id', 'DESC')->get('ativos');
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('ativos', ['ativos_id' => $id]);
        return $query->row();
    }

    public function create()
    {
        $this->ativos_descricao = $this->input->post('descricao');
        $this->ativos_marca = $this->input->post('marca');
        $this->ativos_modelo = $this->input->post('modelo');
        $this->ativos_numero_serie = $this->input->post('numero_serie');
        $this->ativos_data_fabricacao = $this->input->post('data_fabricacao');
        $this->ativos_data_entrada = $this->input->post('data_entrada');
        $this->ativos_valor = $this->input->post('valor');
        $this->ativos_local = $this->input->post('local');
        $this->ativos_status = $this->input->post('status');
        $this->ativos_quantidade = $this->input->post('quantidade');

        $this->db->insert('ativos', $this);
    }

    public function update($id)
    {
        $this->ativos_descricao = $this->input->post('descricao');
        $this->ativos_marca = $this->input->post('marca');
        $this->ativos_modelo = $this->input->post('modelo');
        $this->ativos_numero_serie = $this->input->post('numero_serie');
        $this->ativos_data_fabricacao = $this->input->post('data_fabricacao');
        $this->ativos_data_entrada = $this->input->post('data_entrada');
        $this->ativos_valor = $this->input->post('valor');
        $this->ativos_local = $this->input->post('local');
        $this->ativos_status = $this->input->post('status');
        $this->ativos_quantidade = $this->input->post('quantidade');

        $this->db->update('ativos', $this, ['ativos_id' => $id]);
    }

    public function destroy($id)
    {
        $this->db->delete('ativos', ['ativos_id' => $id]);
    }
}
