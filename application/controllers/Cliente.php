<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends MY_Controller
{
    public function index(){
        $this->listagem();
    }
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('clientesmodel');
        $this->load->model('usuariosmodel');
        $this->load->model('cadastrosmodel');
    }
    
    private function uploadImage($formName, $newFileName){
        $config = [
            'upload_path' => "./uploads/",
			'allowed_types' => "png|PNG",
			'overwrite' => TRUE,
			'max_size' => "4096000",
			'max_height' => "2000",
			'max_width' => "2000",
			'file_name' => $newFileName . ".png"
            ];

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if($this->upload->do_upload($formName)){
            return true;
        }else{
            return false;
        }
    }
    
	public function listagem($erro = null){
	    
	    $this->load->model('frotamodel');
	    $this->load->model('financeiromodel');
	    $this->acessorestrito('CADASTROS');
	    $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(3) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('clientes/f/' . $filtro . '/');
            $config["total_rows"] = $this->clientesmodel->get_countFiltro($filtro);    
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            
            $data['clientes'] = $this->clientesmodel->getAllFiltro($filtro, 10, $page);
            
        } else {
            $config = array();
            $config["base_url"] = base_url('clientes/n/');
            $config["total_rows"] = $this->clientesmodel->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            
            $data['clientes'] = $this->clientesmodel->getAllPag(10, $page);
        }
	    
	    $data['veiculos'] = $this->frotamodel->getAtivosDisponiveis();
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $erro = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    }
	    
        $clienteabc = $this->clientesmodel->getAll();
        $aray = [];
        $cont = 0;
        foreach($clienteabc as $c){
            $idcliente = 'C|' . $c['cliente_cpfcnpj'];
            $somar = 0;
            $titulos = $this->financeiromodel->getTitulosByForneclin($idcliente);
            
            if(strlen($c['cliente_cpfcnpj']) == 14){
                $cpf = $this->mask($c['cliente_cpfcnpj'], '##.###.###/####-##');
            } else {
                $cpf = $this->mask($c['cliente_cpfcnpj'], '###.###.###-##');
            }
            
            foreach($titulos as $t){
                $somar = $somar + $t['titulos_valorpago']; 
            }
            
            $aray[$cont] = array(
                'cpf'       => $cpf,
                'nome'      => $c['cliente_nome'],
                'cidade'    => $c['cliente_cidade'],
                'estado'    => $c['cliente_estado'],
                'total'     => $somar,
            );
            $cont++;
        }
        
        $data['clienteabc'] = $aray;
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
	    
	    $this->header('6.4', 'Listagem de Clientes', 'cadastros', 'Cadastros', 'Listagem de Clientes');
	    $this->load->view('cliente/clientelistagem', $data);
	    $this->footer();
	}
	
	public function listagemABC($erro = null){
	    
	    $this->load->model('frotamodel');
	    $this->load->model('financeiromodel');
	    $this->acessorestrito('CADASTROS');
	    $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(3) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('cliente/listagemABC/f/' . $filtro . '/');
            $config["total_rows"] = $this->clientesmodel->get_countFiltro($filtro);    
            $config["per_page"] = 10;
            $config["uri_segment"] = 5;
            
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            
            $clienteabc = $this->clientesmodel->getAllFiltro($filtro, 10, $page);
            
        } else {
            $config = array();
            $config["base_url"] = base_url('cliente/listagemABC/n/');
            $config["total_rows"] = $this->clientesmodel->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            
            $clienteabc = $this->clientesmodel->getAllPag(10, $page);
        }
	    
	    $data['veiculos'] = $this->frotamodel->getAtivosDisponiveis();
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $erro = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    }
	    
        $aray = [];
        $cont = 0;
        foreach($clienteabc as $c){
            $idcliente = 'C|' . $c['cliente_cpfcnpj'];
            $somar = 0;
            $titulos = $this->financeiromodel->getTitulosByForneclin($idcliente);
            
            if(strlen($c['cliente_cpfcnpj']) == 14){
                $cpf = $this->mask($c['cliente_cpfcnpj'], '##.###.###/####-##');
            } else {
                $cpf = $this->mask($c['cliente_cpfcnpj'], '###.###.###-##');
            }
            
            foreach($titulos as $t){
                $somar = $somar + $t['titulos_valorpago']; 
            }
            
            $aray[$cont] = array(
                'cpf'       => $cpf,
                'nome'      => $c['cliente_nome'],
                'cidade'    => $c['cliente_cidade'],
                'estado'    => $c['cliente_estado'],
                'total'     => $somar,
            );
            $cont++;
        }
        
        $data['clienteabc'] = $aray;
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
	    
	    $this->header('6.4', 'Listagem de Clientes', 'cadastros', 'Cadastros', 'Listagem de Clientes');
	    $this->load->view('cliente/clienteabc', $data);
	    $this->footer();
	}
	
	function ativarCliente(){
	    
	    
	    $id = $this->input->post('cliente_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $cliente = $this->clientesmodel->getCPFCNPJ($id);
    	    $cliente['cliente_ativo_id'] = 1;
    	    $this->clientesmodel->update($cliente, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('clientes'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('clientes'));
        }
	}

    public function cadastro(){
	    
        $this->load->model('documentosmodel');

	    $data['ativos'] = $this->cadastrosmodel->getAtivos();
	    $data['edita'] = null;
	    $data['documentos_tipos'] = $this->documentosmodel->getAllTiposAtivos();
	    
	    $this->header('6.4', 'CADASTRO DE CLIENTE', 'cadastros', 'Cadastros', 'Cadastro de cliente');
	    $this->load->view('cliente/clientecad', $data);
	    $this->footer();
	}
	
	public function getClienteByCPF(){
	    
	    
	    $id = $this->input->post('cliente_cpf');
	    $cliente = $this->clientesmodel->getByCPFCNPJ($id);
	    
	    echo json_encode($cliente);
	}
	
    public function insertCliente(){
        
        $this->load->model('documentosmodel');
        $this->load->library('moduloupload');
        
        $data = array(
                'cliente_cpfcnpj'       => $this->limpa($this->input->post('cnpj')),                    //
                'cliente_nome'          => $this->refatorarString($this->input->post('nome')),          //
                'cliente_rg'            => $this->input->post('rg'),                                    //
                'cliente_fantasia'      => $this->refatorarString($this->input->post('fantasia')),      //
                'cliente_ramo'          => $this->refatorarString($this->input->post('ramo')),          //
                'cliente_cont'          => $this->refatorarString($this->input->post('complemento')),   //
                'cliente_telcont'       => $this->limpa($this->input->post('tel_r')),                   //
                'cliente_cep'           => $this->limpa($this->input->post('cep')),                     //
                'cliente_numero'        => $this->input->post('numero'),                                //
                'cliente_complemento'   => $this->refatorarString($this->input->post('complemento')),   //
                'cliente_endereco'      => $this->refatorarString($this->input->post('endereco')),      //
                'cliente_bairro'        => $this->refatorarString($this->input->post('bairro')),        //
                'cliente_cidade'        => $this->refatorarString($this->input->post('cidade')),        //
                'cliente_estado'        => $this->refatorarString($this->input->post('estado')),        //
                'cliente_fixo'          => $this->limpa($this->input->post('tel')),                     //
                'cliente_cel1'          => $this->limpa($this->input->post('cel1')),                    //
                'cliente_cel2'          => $this->limpa($this->input->post('cel2')),                    //
                'cliente_nascimento'    => $this->input->post('nascimento'),                            //
                'cliente_ativo_id'      => 1,                                                           //
                'cliente_razao'         => $this->refatorarString($this->input->post('razao')),         //
                'cliente_email'         => $this->lowcase($this->input->post('email')),                 //
                'cliente_ie'            => $this->limpa($this->input->post('ie')),                      //
                'cliente_banco'         => $this->input->post('banco'),   
                'cliente_agencia'       => $this->input->post('agencia'),   
                'cliente_agencia_d'     => $this->input->post('agencia_d'),   
                'cliente_conta'         => $this->input->post('conta'),   
                'cliente_conta_d'       => $this->input->post('conta_d'),   
                'cliente_tit_cpfcnpj'   => $this->limpa($this->input->post('titular_cpfcnpj')),   
                'cliente_tit_nome'      => $this->refatorarString($this->input->post('titular_nome')),
            );
           
        $documentos_tipos = $this->documentosmodel->getAllTipos();
        $docsIdArray = explode('|', $this->input->post('docs-control'));
        
        $newArray = [];
        $index = 0;
        foreach($docsIdArray as $doc){
            if(!empty($_FILES[$doc.'-doc']['name'])){
                $newArray[$index] = $doc;
                $index++;
            }
        }
        
        $this->moduloupload->uploadByIdArray($newArray, 'c_'.$this->limpa($this->input->post('cpfcnpj')), $documentos_tipos);    
        
        $this->clientesmodel->insert($data); 
        
        redirect(base_url('clientes'));
    }
    
    public function telaEdita(){
        
        $this->load->model('documentosmodel');
        
        $cpf = $this->uri->segment(2);
        $data['edita'] = $this->clientesmodel->getCPFCNPJ($cpf);
        $data['ativos'] = $this->cadastrosmodel->getAtivos();
        $data['documentos_tipos'] = $this->documentosmodel->getAllTiposAtivos();
	    $data['fixed'] = $this->documentosmodel->getOldDoc(1, 'c_'.$cpf);
        if($data['fixed'] == ""){
            $data['fixed'] = null;
        }
	    
	    $this->header('6.4', 'EDIÇÃO DE CLIENTE', 'cadastros', 'Cadastros', 'Edição de cliente');
	    $this->load->view('cliente/clientecad', $data);
	    $this->footer();
    }
    
    public function verificaCliente(){
	    
	    
	    $form = $this->clientesmodel->getCPFCNPJ($this->input->post('cnpj'));
	    
	    echo json_encode($form);
	}
    
    public function updateCliente(){
        
        $this->load->model('documentosmodel');
        $this->load->library('moduloupload');
        
        $data = array(
                'cliente_cpfcnpj'       => $this->limpa($this->input->post('index')),                    //
                'cliente_nome'          => $this->refatorarString($this->input->post('nome')),          //
                'cliente_rg'            => $this->input->post('rg'),                                    //
                'cliente_fantasia'      => $this->refatorarString($this->input->post('fantasia')),      //
                'cliente_ramo'          => $this->refatorarString($this->input->post('ramo')),          //
                'cliente_cont'          => $this->refatorarString($this->input->post('complemento')),   //
                'cliente_telcont'       => $this->limpa($this->input->post('tel_r')),                   //
                'cliente_cep'           => $this->limpa($this->input->post('cep')),                     //
                'cliente_numero'        => $this->input->post('numero'),                                //
                'cliente_complemento'   => $this->refatorarString($this->input->post('complemento')),   //
                'cliente_endereco'      => $this->refatorarString($this->input->post('endereco')),      //
                'cliente_bairro'        => $this->refatorarString($this->input->post('bairro')),        //
                'cliente_cidade'        => $this->refatorarString($this->input->post('cidade')),        //
                'cliente_estado'        => $this->refatorarString($this->input->post('estado')),        //
                'cliente_fixo'          => $this->limpa($this->input->post('tel')),                     //
                'cliente_cel1'          => $this->limpa($this->input->post('cel1')),                    //
                'cliente_cel2'          => $this->limpa($this->input->post('cel2')),                    //
                'cliente_nascimento'    => $this->input->post('nascimento'),                            //
                'cliente_ativo_id'      => $this->input->post('ativo'),                            //
                'cliente_razao'         => $this->refatorarString($this->input->post('razao')),         //
                'cliente_email'         => $this->lowcase($this->input->post('email')),                 //
                'cliente_ie'            => $this->limpa($this->input->post('ie')),                      //
                'cliente_banco'         => $this->input->post('banco'),   
                'cliente_agencia'       => $this->input->post('agencia'),   
                'cliente_agencia_d'     => $this->input->post('agencia_d'),   
                'cliente_conta'         => $this->input->post('conta'),   
                'cliente_conta_d'       => $this->input->post('conta_d'),   
                'cliente_tit_cpfcnpj'   => $this->limpa($this->input->post('titular_cpfcnpj')),   
                'cliente_tit_nome'      => $this->refatorarString($this->input->post('titular_nome')),
            );
        
        $documentos_tipos = $this->documentosmodel->getAllTipos();
        $docsIdArray = explode('|', $this->input->post('docs-control'));
        $i = 0;
        $newDocs = [];
        foreach($docsIdArray as $doc){
            if(!empty($_FILES[$doc.'-doc']['name'])){
                $newDocs[$i] = $doc;
                $i++;
            }
        }
        
        $oldDocs = $this->documentosmodel->getByTitularCPFCNPJ('c_'.$this->limpa($this->input->post('index')));
        
        foreach($oldDocs as $od){
            $contDoc = 0;
            
            foreach($docsIdArray as $doc){
                if($od['documento_tipo_id'] == $doc){
                    $contDoc++;
                }
            }
            if($contDoc == 0){
                $this->documentosmodel->delete($od['documento_id']);
            }
        }
        
        $this->moduloupload->uploadByIdArray($newDocs, 'c_'.$this->limpa($this->input->post('index')), $documentos_tipos); 
            
        $this->clientesmodel->update($data, $this->limpa($this->input->post('index'))); 
        
        redirect(base_url('clientes'));
    }
    
    public function deleteCliente(){
        
        
        $cpf = $this->input->post('cpfcli');
        $sen = MD5($this->input->post('senha'));
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $cliente = $this->clientesmodel->getCPFCNPJ($cpf);
            $cliente['cliente_ativo_id'] = 2;
            $this->clientesmodel->update($cliente, $cpf);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('clientes'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('clientes'), 'refresh');
        }
    }
    
    public function verCliente(){
        
        $this->load->model('documentosmodel');
        $this->load->model('frotamodel');
        
        $cpfcnpj = $this->uri->segment(2);
        $locacoes = $this->clientesmodel->getLocacoesByCliente($cpfcnpj);
        $newArray = [];
        $i = 0;
        
        foreach($locacoes as $loc){
            $veiculo = $this->frotamodel->getByIdRowArray($loc['locacao_frota_id']);
            $modelo = $this->frotamodel->getModeloByIdRowArray($veiculo['frota_modelo_id']);
            $marca = $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']);
            $tipo = $this->frotamodel->getTipoByIdRowArray($modelo['frota_modelo_tipo_id']);
            
            if($veiculo['frota_placa'] != ""){
                $veiculo = "Frota ".$veiculo['frota_codigo']." | Placa ".$veiculo['frota_placa']." | ".$marca['frota_marca_nome'].", ".$modelo['frota_modelo_nome'].", Ano ".$veiculo['frota_ano'].", ".$veiculo['frota_cor']." - ".$tipo['frota_tipo_nome'];
            }else{
                $veiculo = "Frota ".$veiculo['frota_codigo']." | ".$marca['frota_marca_nome'].", ".$modelo['frota_modelo_nome'].", Ano ".$veiculo['frota_ano'].", ".$veiculo['frota_cor']." - ".$tipo['frota_tipo_nome'];
            }
            if($loc['locacao_data_fim'] != null){
                $fim = $loc['locacao_data_fim'];
            }else{
                $fim = "--";
            }
            
            $newArray[$i]['id'] = $loc['locacao_id'];
            $newArray[$i]['veiculo'] = $veiculo;
            $newArray[$i]['data_inicio'] = $loc['locacao_data_inicio'];
            $newArray[$i]['data_fim'] = $fim;
            $i++;
        }

        $cliente = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
        
        if(strlen($cliente['cliente_cpfcnpj']) == 14){
            $cliente['cpfcnpj'] = $this->mask($cliente['cliente_cpfcnpj'], "##.###.###/####-##");
        }else if(strlen($cliente['cliente_cpfcnpj']) == 11){
            $cliente['cpfcnpj'] = $this->mask($cliente['cliente_cpfcnpj'], "###.###.###-##");
        }else{
            $cliente['cpfcnpj'] = "";
        }
        
        if(strlen($cliente['cliente_tit_cpfcnpj']) == 14){
            $cliente['cliente_tit_cpfcnpj'] = $this->mask($cliente['cliente_tit_cpfcnpj'], "##.###.###/####-##");
        }else if(strlen($cliente['cliente_tit_cpfcnpj']) == 11){
            $cliente['cliente_tit_cpfcnpj'] = $this->mask($cliente['cliente_tit_cpfcnpj'], "###.###.###-##");
        }else{
            $cliente['cliente_tit_cpfcnpj'] = "";
        }
        
        if(strlen($cliente['cliente_telcont']) == 11){
            $cliente['telcont'] = $this->mask($cliente['cliente_telcont'], "(##) #####-####");
        }else if(strlen($cliente['cliente_telcont']) == 10){
            $cliente['telcont'] = $this->mask($cliente['cliente_telcont'], "(##) ####-####");
        }else{
            $cliente['telcont'] = "";
        }

        $data = array(
                'cliente'       => $cliente,
                'docs'          => $this->documentosmodel->getByTitularCPFCNPJ('c_'.$cpfcnpj),
                'tipos_docs'    => $this->documentosmodel->getAllTipos(),
                'locacoes'      => $newArray,
            );
        
        $this->header('6.4', 'VISUALIZAÇÃO DE CLIENTE', 'cadastros', 'Cadastros', 'Visualização de cliente');
        $this->load->view('cliente/clienteunico', $data);
        $this->footer();
    }
    
    public function getDocumentosByCpfCnpj(){
	    
	    $this->load->model('documentosmodel');
	    
	    $cpfcnpj = $this->input->post('cpfcnpj');
	    $docs = $this->documentosmodel->getByTitularCPFCNPJ($cpfcnpj);
	    
	    echo json_encode($docs);
	}
	
	public function vincular(){
	    
	    $this->load->model('frotamodel');
	    date_default_timezone_set('America/Sao_Paulo');
	    
	    $new = array(
	            'locacao_cliente_id'    => $this->input->post('vinculo_id'),
	            'locacao_frota_id'      => $this->input->post('vinculo_veic'),
	            'locacao_data_inicio'   => date('d/m/Y'),
	            'locacao_data_fim'      => null,
	        );
	   
	   $this->clientesmodel->novoVinculo($new);
	   
	   $frota = $this->frotamodel->getByIdRowArray($new['locacao_frota_id']);
	   $frota['frota_status_id'] = 2;
	   
	   $err = $this->frotamodel->update($frota, $frota['frota_id']);
	   
	   $this->listagem();
	}
	
	public function desvincular(){
	    
	    $this->load->model('frotamodel');
	    date_default_timezone_set('America/Sao_Paulo');
	    
	    $id = $this->uri->segment(3);
	    $old = $this->clientesmodel->getLocacaoById($id);
	    $old['locacao_data_fim'] = date('d/m/Y');
	    
	    $this->clientesmodel->updateLocacao($old, $id);
	    
	    $frota = $this->frotamodel->getByIdRowArray($old['locacao_frota_id']);
	    $frota['frota_status_id'] = 1;
	    
	    $err = $this->frotamodel->update($frota, $frota['frota_id']);
	    
	    redirect(base_url('mostrarcliente/').$old['locacao_cliente_id']);
	}
	
	public function relatorioGeral(){
	    
	    
	    $data['clientes'] = $this->clientesmodel->getAll();
	    
	    $this->load->view('recursos/headerSimples');
	    $this->load->view('cliente/relatorioGeral', $data);
	    $this->load->view('recursos/footerSimples');
	}
	
	public function relatorioUnico(){
	    
	    $this->load->model('frotamodel');
	    $this->load->model('documentosmodel');
	    $this->load->model('configuracaomodel');
	    
	    $cpfcnpj = $this->input->post('cpfcnpj');
	    $locacoes = $this->clientesmodel->getLocacoesByCliente($cpfcnpj);
        $newArray = [];
        $i = 0;
        foreach($locacoes as $loc){
            $veiculo = $this->frotamodel->getByIdRowArray($loc['locacao_frota_id']);
            $modelo = $this->frotamodel->getModeloByIdRowArray($veiculo['frota_modelo_id']);
            $marca = $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']);
            $tipo = $this->frotamodel->getTipoByIdRowArray($modelo['frota_modelo_tipo_id']);
            if($veiculo['frota_placa'] != ""){
                $veiculo = "Frota ".$veiculo['frota_codigo']." | Placa ".$veiculo['frota_placa']." | ".$marca['frota_marca_nome'].", ".$modelo['frota_modelo_nome'].", Ano ".$veiculo['frota_ano'].", ".$veiculo['frota_cor']." - ".$tipo['frota_tipo_nome'];
            }else{
                $veiculo = "Frota ".$veiculo['frota_codigo']." | ".$marca['frota_marca_nome'].", ".$modelo['frota_modelo_nome'].", Ano ".$veiculo['frota_ano'].", ".$veiculo['frota_cor']." - ".$tipo['frota_tipo_nome'];
            }
            if($loc['locacao_data_fim'] != null){
                $fim = $loc['locacao_data_fim'];
            }else{
                $fim = "--";
            }
            $newArray[$i]['id'] = $loc['locacao_id'];
            $newArray[$i]['veiculo'] = $veiculo;
            $newArray[$i]['data_inicio'] = $loc['locacao_data_inicio'];
            $newArray[$i]['data_fim'] = $fim;
            $i++;
        }
        
        $cliente = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
        if(strlen($cliente['cliente_cpfcnpj']) == 14){$cliente['cpfcnpj'] = $this->mask($cliente['cliente_cpfcnpj'], "##.###.###/####-##");}else if(strlen($cliente['cliente_cpfcnpj']) == 11){$cliente['cpfcnpj'] = $this->mask($cliente['cliente_cpfcnpj'], "###.###.###-##");}else{$cliente['cpfcnpj'] = "";}
        if(strlen($cliente['cliente_tit_cpfcnpj']) == 14){$cliente['tit_cpfcnpj'] = $this->mask($cliente['cliente_tit_cpfcnpj'], "##.###.###/####-##");}else if(strlen($cliente['cliente_tit_cpfcnpj']) == 11){$cliente['tit_cpfcnpj'] = $this->mask($cliente['cliente_tit_cpfcnpj'], "###.###.###-##");}else{$cliente['tit_cpfcnpj'] = "";}
        if(strlen($cliente['cliente_telcont']) == 11){$cliente['telcont'] = $this->mask($cliente['cliente_telcont'], "(##) #####-####");}else if(strlen($cliente['cliente_telcont']) == 10){$cliente['telcont'] = $this->mask($cliente['cliente_telcont'], "(##) ####-####");}else{$cliente['telcont'] = "";}
        if(strlen($cliente['cliente_fixo']) == 11){$cliente['fixo'] = $this->mask($cliente['cliente_fixo'], "(##) #####-####");}else if(strlen($cliente['cliente_fixo']) == 10){$cliente['fixo'] = $this->mask($cliente['cliente_fixo'], "(##) ####-####");}else{$cliente['fixo'] = "";}
        if(strlen($cliente['cliente_cel1']) == 11){$cliente['cel1'] = $this->mask($cliente['cliente_cel1'], "(##) #####-####");}else if(strlen($cliente['cliente_cel1']) == 10){$cliente['cel1'] = $this->mask($cliente['cliente_cel1'], "(##) ####-####");}else{$cliente['cel1'] = "";}
        if(strlen($cliente['cliente_cel2']) == 11){$cliente['cel2'] = $this->mask($cliente['cliente_cel2'], "(##) #####-####");}else if(strlen($cliente['cliente_cel2']) == 10){$cliente['cel2'] = $this->mask($cliente['cliente_cel2'], "(##) ####-####");}else{$cliente['cel2'] = "";}
        $cliente['cep'] = $this->mask($cliente['cliente_cep'], "#####-###");
        
        $data = array(
                'cliente'       => $cliente,
                'locacoes'      => $newArray,
                'docs'          => $this->documentosmodel->getByTitularCPFCNPJ('c_'.$cpfcnpj),
                'tipos_docs'    => $this->documentosmodel->getAllTipos(),
                'banner'        => $this->configuracaomodel->banner(),
            );
            
        $this->load->view('recursos/headerSimples');
        $this->load->view('cliente/relatorioUnico', $data);
        $this->load->view('recursos/footerSimples');
	}
}