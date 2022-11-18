<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obra extends MY_Controller
{

    public function index()
    {
        $this->header('5');
        $this->load->view('icon');
        $this->footer();
    }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('documentosmodel');
        $this->load->model('ativosmodel');
        $this->load->model('frotamodel');
        $this->load->model('obramodel');
        $this->load->model('usuariosmodel');
        $this->load->model('clientesmodel');     
    }

    //------------------- AUTOMOVEIS - START ----------------------------------

    public function cadastro()
    {        
        if ($this->uri->segment('2')) {
            $id = $this->uri->segment('2');
            $this->header('5', 'EDIÇÃO DE OBRA', 'obra', 'Obra', 'Edição de obra');
        } else {
            $this->header('5', 'CADASTRO DE OBRA', 'obra', 'Obra', 'Cadastro de obra');
            $id = false;
        }

        $data = array(
            'ativos'            => $this->ativosmodel->getAll(),
            'linhas'            => $this->frotamodel->getAllLinhas(),
            //'pneus'             => $this->frotamodel->getAllTiposPneusAtivos(),
            //'pneusIndividuais'  => $this->frotamodel->getAllPneusIndividuais(),
            //'pneusRegistros'    => $this->frotamodel->getAllRegistrosPneus(),
            'status'            => $this->frotamodel->getAllStatusAtivos(),
            'marcas'            => $this->frotamodel->getAllMarcasAtivos(),
            'modelos'           => $this->frotamodel->getAllModelosAtivos(),
            'tiposgabine'       => $this->frotamodel->getAllTiposGabineAtivos(),
            'tiposmunck'        => $this->frotamodel->getAllTiposMunckAtivos(),
            'tipos'             => $this->frotamodel->getAllTiposAtivos(),
            'documentos_tipos'  => $this->documentosmodel->getAllTiposAtivos(),
            //'posicao'           => $this->frotamodel->posicao(),
            'edita'             => $id ? $this->obramodel->getById($id) : null,
            'fixed'             => null,
        ); 

        if (!$data['edita']) {
            redirect(base_url('obras', 'refresh'));
        }

        echo '213';


        $data['fixed'] = $this->documentosmodel->getOldByFrota(6, @$data['edita']->frota_codigo);
        $data['totalGeral'] = 0.000;

        $this->load->view('obra/cadastro', $data);
        $this->footer();
    }

    public function listagem() {

        $this->acessorestrito("FROTA");

        $frota = $this->frotamodel->getAll();
        /*
        $data['obras'] = $this->obramodel->getAll();
        $data['situacoes'] = $this->frotamodel->getAllStatusAtivos();
        $data['marcas'] = $this->frotamodel->getAllMarcasAtivos();
        */
        $data['obras'] = $this->obramodel->getAll();
        
        
        if (array_key_exists('delete', $this->session->userdata())) {
            $data['erro'] = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        } else {
            $data['erro'] = null;
        }
        
        $this->header('5', 'LISTAGEM DE OBRAS', 'obra', 'Obra', 'Listagem de obras');
        $this->load->view('obra/listagem', $data);
        $this->footer();
    } 
    
    
    public function core() {
        
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[11]');
        $this->form_validation->set_rules('telefone', 'Telefone', 'trim|required');

        if (!$this->input->post('id_usuario')) {
            $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[13]');
        }

        if ($this->form_validation->run() == TRUE) {     

            $dados = array(
                'obra_nome'             => addslashes($_POST['obra_nome']),
                'obra_cidade'           => addslashes($_POST['obra_cidade']),
                'obra_estado'           => addslashes($_POST['obra_estado']),
                'obra_cliente'          => addslashes($_POST['obra_cliente']),
                'obra_tipo'             => addslashes($_POST['obra_tipo']),
                'obra_responsavel'      => addslashes($_POST['obra_responsavel']),
                'obra_engenheiro'       => addslashes($_POST['obra_engenheiro']),
                'obra_gestor'           => addslashes($_POST['obra_gestor']),
                'obra_gestor_empresa'   => addslashes($_POST['obra_gestor_empresa']),
                'obra_data_inicial'     => addslashes($_POST['obra_data_inicial']),
                'obra_data_final'       => addslashes($_POST['obra_data_final']),
                'obra_valor'            => addslashes(formatoDecimal($_POST['obra_valor'])),
                'obra_numero_contrato'  => addslashes($_POST['obra_numero_contrato']),
                'obra_codigo'           => '',
            );
                
            if(array_key_exists('id', $_POST)){
                $dados['obra_id'] = $_POST['id'];
            }

            $this->obramodel->cruObra($dados);
            redirect(base_url('obras', 'refresh'));

        } else {
            $this->cadastro();
        }
    }
}
