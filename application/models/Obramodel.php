<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Obramodel extends CI_Model{
    public $obra_nome;
    public $obra_cidade;
    public $obra_estado;
    public $obra_cliente;
    public $obra_tipo;
    public $obra_responsavel;
    public $obra_engenheiro;
    public $obra_gestor;
    public $obra_gestor_empresa;
    public $obra_data_inicial;
    public $obra_data_final;
    public $obra_valor;
    public $obra_numero_contrato;
    public $obra_relatorio;
    public $obra_calcular_valor;
    public $obra_valor_final;
    
    public function index()
    {
        $query = $this->db->get();
        echo '<pre>';
        print_r($query->result());
        echo '</pre>';
        die();
        return $query->result();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('obra', ['obra_id' => $id]);
        return $query->row();
    }
    
    public function create()
    {
        $this->obra_nome = $this->input->post('nome');
        $this->obra_cidade = $this->input->post('cidade');
        $this->obra_estado = $this->input->post('estado');
        $this->obra_cliente = $this->input->post('cliente');
        $this->obra_tipo = $this->input->post('tipo');
        $this->obra_responsavel = $this->input->post('responsavel');
        $this->obra_engenheiro = $this->input->post('engenheiro');
        $this->obra_gestor = $this->input->post('gestor');
        $this->obra_gestor_empresa = $this->input->post('gestor_empresa');
        $this->obra_data_inicial = $this->input->post('data_inicial');
        $this->obra_data_final = $this->input->post('data_final');
        $this->obra_valor = $this->input->post('valor');
        $this->obra_numero_contrato = $this->input->post('numero_contrato');
        $this->obra_relatorio = $this->input->post('relatorio');
        $this->obra_calcular_valor = $this->input->post('calcular_valor');
        $this->obra_valor_final = $this->input->post('valor_final');
        
        $this->db->insert('obra', $this);
    }
}