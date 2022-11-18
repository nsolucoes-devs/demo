<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ativo extends MY_Controller
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

    //------------------- AUTOMOVEIS - START ----------------------------------

    public function cadastro()
    {


        if ($this->uri->segment('2')) {
            $id = $this->uri->segment('2');
        } else {
            $id = null;
        }


        if ($this->uri->segment(2)) {
            $this->header('9', 'EDIÇÃO DE ATIVO', 'ativo', 'Ativo', 'Edição de ativo');
        } else {
            $this->header('9', 'CADASTRO DE ATIVO', 'ativo', 'Ativo', 'Cadastro de ativo');
        }

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
        $this->ativos->create();

        redirect(base_url('ativos'), 'refresh');
    }
}
