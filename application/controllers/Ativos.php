<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ativos extends MY_Controller
{

    public function index()
    {
        $this->header('9');
        $this->load->view('icon');
        $this->footer();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('ativos_model', 'ativos');
    }

    public function cadastro()
    {
        $this->header('9', 'CADASTRO DE ATIVO', 'ativo', 'Ativo', 'Cadastro de ativo');
        $this->load->view('ativo/cadastro');
        $this->footer();
    }

    public function listagem()
    {

        $data['ativos'] = $this->ativos->index();
        $data['erro'] = null;

        $this->header('9', 'LISTAGEM DE ATIVO', 'ativo', 'Ativo', 'Listagem de ativo');
        $this->load->view('ativo/listagem', $data);
        $this->footer();
    }

    public function create()
    {
        if ($this->input->method() !== 'post') {
            return redirect(base_url('ativos'), 'refresh');
        }

        $this->ativos->create();

        return redirect(base_url('ativos'), 'refresh');
    }

    public function edit($id)
    {
        $data['ativo'] = $this->ativos->getById($id);

        $this->header('9', 'EDIÇÃO DE ATIVO', 'ativo', 'Ativo', 'Edição de ativo');
        $this->load->view('ativo/edicao', $data);
        $this->footer();
    }

    public function update($id)
    {
        if ($this->input->method() !== 'post') {
            return redirect(base_url('ativos'), 'refresh');
        }

        $this->ativos->update($id);

        return redirect(base_url('ativos'), 'refresh');
    }

    public function destroy($id)
    {
        if ($this->input->method() !== 'post') {
            return redirect(base_url('ativos'), 'refresh');
        }

        $this->ativos->destroy($id);

        return redirect(base_url('ativos'), 'refresh');
    }
}
