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
        $this->load->model('obramodel', 'obras');
        $this->load->model('usuariosmodel');
        $this->load->model('manutencaomodel');
        $this->load->model('financeiromodel');
        $this->load->model('estoquemodel');
        $this->load->model('cadastrosmodel');
        $this->load->model('clientesmodel'); 
        
        $this->load->model('obramodel2');
    }

    //------------------- AUTOMOVEIS - START ----------------------------------

    public function cadastro()
    {
        
        if ($this->uri->segment('2')) {
            $id = $this->uri->segment('2');
        } else {
            $id = null;
        }
        
        if ($id == null) {
            $data = [
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
                //'edita'             => $this->obramodel->getByIdRowArray2(),
            ];
        } else {
            
            $data = [
                'ativos'            => $this->ativosmodel->getAll(),
                'documentos_tipos'  => $this->documentosmodel->getAllTiposAtivos(),
                //'posicao'           => $this->frotamodel->posicao(),
                'edita'             => [],
                'frota'             => [],
                'modelo'            => [],
                'linha'             => [],
                'status'            => [],
                'cabine'            => [],
                'munck'             => [],
                'docs'              => [],
                'docs_tipos'        => [],
                'manutencoes'       => [],
                'titulos'           => [],
                'totalGeral'        => 0.000
            ];
             
            if ($id != null) {
                $data['fixed'] = $this->documentosmodel->getOldByFrota(6, $data['edita']['frota_codigo']);
            } else {
                $data['fixed'] = null;
            }
        }

        if ($this->uri->segment(2)) {
            $this->header('5', 'EDIÇÃO DE OBRA', 'obra', 'Obra', 'Edição de obra');
        } else {
            $this->header('5', 'CADASTRO DE OBRA', 'obra', 'Obra', 'Cadastro de obra');
        }

        $this->load->view('obra/cadastro', $data);
        $this->footer();
    }

    public function listagem()
    {

        $this->acessorestrito("FROTA");

        $frota = $this->frotamodel->getAll();
        /*
        $data['obras'] = $this->obramodel->getAll();
        $data['situacoes'] = $this->frotamodel->getAllStatusAtivos();
        $data['marcas'] = $this->frotamodel->getAllMarcasAtivos();
        */
        $data['obras'] = $this->obramodel2->getAll();
        
        
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
    
    
    public function insertObra() {
        
        /*
            [docs-control] => 6 
            [anchor_qtd] =>
        */
        
            $dados = array(
                'obra_nome'             => $_POST['nome'],
                'obra_cidade'           => $_POST['cidade'],
                'obra_estado'           => $_POST['estado'],
                'obra_cliente'          => $_POST['cliente'],
                'obra_tipo'             => $_POST['tipo'],
                'obra_responsavel'      => $_POST['responsavel'],
                'obra_engenheiro'       => $_POST['engenheiro'],
                'obra_gestor'           => $_POST['gestor'],
                'obra_gestor_empresa'   => $_POST['gestor_empresa'],
                'obra_data_inicial'     => $_POST['data_inicial'],
                'obra_data_final'       => $_POST['data_final'],
                'obra_valor'            => str_replace(",", ".", str_replace(".", "",$_POST['valor'])),
                'obra_numero_contrato'  => $_POST['numero_contrato'],
                //'obra_relatorio'        => $_POST['relatorio'],
                //'obra_calcular_valor'   => $_POST['calcular_valor'],
                //'obra_valor_final'      => $_POST['valor_final'],
                'created_at'            => date('Y-m-d H:m:s'),
                'obra_codigo'           => '',
                );
                
            if(array_key_exists('id', $_POST)){
                $dados['obra_id'] = $_POST['id'];
            }
            $this->obramodel2->cruObra($dados);
            redirect(base_url('obras'));
    }
}
