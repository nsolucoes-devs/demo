<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastros extends MY_Controller {
        
    public function index(){
        $this->header('6');
        $this->load->view('icon');
        $this->footer();
    }

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('cadastrosmodel');
        $this->load->model('documentosmodel');
        $this->load->model('ativosmodel');
        $this->load->model('controladoresmodel');
        $this->load->model('usuariosmodel');
    }

    //  **=======================================================================================**
    //  ||                                 FUNÇÕES DE FUNÇÕES                                    ||
    //  **=======================================================================================**
    
    //chama a tela de listagem de funções
    public function funcoes($erro = null){
        
        
        $this->acessorestrito("CADASTROS");
        
        $data['funcoes'] = $this->cadastrosmodel->getFuncoes();

        if($this->session->userdata('delete')){
            $data['erro'] = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }else{
            $data['erro'] = null;
        }
        
        $this->header('6.1.2', 'LISTAGEM DE FUNÇÕES', 'cadastros', 'Cadastros', 'Funções');
		$this->load->view('cadastros/funcoeslistagem', $data);
		$this->footer();
    }
    
    //chama a tela de cadastro de novas funções
    public function novaFuncao(){
        
        $this->acessorestrito("CADASTROS");
        
        if($this->session->userdata('erro')){
            $erro = $this->session->userdata('erro');
            $this->session->unset_userdata('erro');
        }else{
            $erro = null;
        }
        
        $data = array(
            'erro' => $erro,
            'controladores' => $this->controladoresmodel->getAll(),
            'ativos' => $this->cadastrosmodel->getAtivos(),
            );
        
        if($this->uri->segment(2)){
            $data['edicao_id'] = $this->uri->segment(2);
            $pag = '6.1.2';
            $titulo = 'PERMISSÕES DE USUÁRIOS';
            $raiz = 'cadastros';
            $local = 'Usuários';
            $funcao = 'Edição de Permissão';
        }else{
            $pag = '6.1.2';
            $titulo = 'PERMISSÕES DE USUÁRIOS';
            $raiz = 'cadastros';
            $local = 'Usuários';
            $funcao = 'Permissão de Usuários';
        }

        $this->header($pag, $titulo, $raiz, $local, $funcao);
		$this->load->view('cadastros/funcoescadastro', $data);
		$this->footer();
    }
    
    //busca função pelo id 
    function getFuncaoById(){
	    
	    
	    $funcao_id = $this->input->post('funcao_id');
	    $funcao = $this->cadastrosmodel->getFuncaoById($funcao_id);
	    
	    echo json_encode($funcao);
	}
    
    //insere uma nova função no database
	function insertFuncao(){
	    
	    
	    $controladores = $this->controladoresmodel->getAll();
        $permissao = "";
        $helper=0;
        foreach($controladores as $ctrl){
            if($helper >0){
                $permissao .= "|";
            }
            $s = 'VEDA';
            $aux = $this->input->post('p-'.$ctrl['controlador_id']);
            if($aux){
                for($i=0; $i<count($aux); $i++){
                    if($aux[$i] == "v"){
                        $s = str_replace('V', '1', $s);
                    }
                    if($aux[$i] == "e"){
                        $s = str_replace('E', '1', $s);
                    }
                    if($aux[$i] == "d"){
                        $s = str_replace('D', '1', $s);
                    }
                    if($aux[$i] == "a"){
                        $s = str_replace('A', '1', $s);
                    }
                }
            }    
                $replace = array("V", "E", "D", "A");
                $s = str_replace($replace, '0', $s);
                $permissao .= $ctrl['controlador_nome']."-".$s;
                $helper++;
        }
        
	    if($this->input->post('id') == ""){
	        $a = $this->cadastrosmodel->getByName($this->input->post('nome'));
	        if(count($a) > 0){
	            $this->session->set_userdata('erro', "Já existe esta função cadastrada.");
	            redirect(base_url('cadastros/novaFuncao'));
	        }else{
	            $a = array(
	                'funcao_nome'       => $this->input->post('nome'),
	                'funcao_permissao'  => $permissao, 
	                'funcao_ativo_id'   => $this->input->post('ativo'),
	                );
	            $this->cadastrosmodel->insertFuncao($a);
	           }
	    }else{
	            $a = array(
	                'funcao_id'         => $this->input->post('id'),
	                'funcao_nome'       => $this->input->post('nome'),
	                'funcao_permissao'  => $permissao, 
	                'funcao_ativo_id'   => $this->input->post('ativo'),
	                );
	           $this->cadastrosmodel->updateFuncao($a);
    	    }
    	    redirect(base_url('cadastros/funcoes'));
    }

	function apagarFuncao(){
	    
	    
	    $id = $this->input->post('funcao_id');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $func = $this->cadastrosmodel->getFuncId($id);
    	    $func['funcao_ativo_id'] = 2;
    	    $this->cadastrosmodel->updateFuncao($func);
    	    
    	    $this->session->set_userdata('delete', 1);
    	    redirect(base_url('funcoes'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('funcoes'));
        }
	}
	
	function ativarFuncao(){
	    
	    
	    $id = $this->input->post('funcao_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $func = $this->cadastrosmodel->getFuncId($id);
    	    $func['funcao_ativo_id'] = 1;
    	    $this->cadastrosmodel->updateFuncao($func);
    	    
    	    redirect(base_url('cadastros/funcoes'));
        }else{
            $this->session->set_userdata('erro', 1);
            redirect(base_url('cadastros/funcoes'));
        }
	}
	
	//  **===========================================================================================**
    //  ||                                 FUNÇÕES DE FORNECEDORES                                   ||
    //  **===========================================================================================**
    
    public function fornecedores(){
        
        $this->acessorestrito("CADASTROS");
        $this->load->model('financeiromodel');
        
        $this->load->library("pagination");
        
        $filtro = mb_strtoupper($this->input->post('filtro'));
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        } 
        
        $uri_segment = 4;
        $config = array();
        if($filtro){
            $config["base_url"] = base_url('fornecedores/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('fornecedores/n/');
            $uri_segment = 3;
        }
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $config["total_rows"] = $this->cadastrosmodel->get_countFornecedoresFiltro($filtro);    
        $config["per_page"] = 10;
        
        $this->pagination->initialize($config);
        
        $data['fornecedores'] = $this->cadastrosmodel->getAllFornecedoresFiltro($filtro, 10, $page);
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];


        if(array_key_exists('delete', $this->session->userdata())){
            $data['erro'] = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        } else {
            $data['erro'] = null;
        }

        $this->header('6.2', 'LISTAGEM DE FORNECEDORES', 'cadastros', 'Cadastros', 'Fornecedores');
		$this->load->view('cadastros/fornecedoreslistagem', $data);
		$this->footer();
    }
    
    public function fornecedoresAbc(){
        
        $this->acessorestrito("CADASTROS");
        $this->load->model('financeiromodel');
        
        $this->load->library("pagination");
        
        $filtro = mb_strtoupper($this->input->post('filtro'));
        if($this->uri->segment(3) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        } 
        
        $uri_segment = 5;
        $config = array();
        if($filtro){
            $config["base_url"] = base_url('cadastros/fornecedoresAbc/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('cadastros/fornecedoresAbc/n/');
            $uri_segment = 4;
        }
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $config["total_rows"] = $this->cadastrosmodel->get_countFornecedoresFiltro($filtro);    
        $config["per_page"] = 10;
        
        $this->pagination->initialize($config);
        
        $fabc = $this->cadastrosmodel->getAllFornecedoresFiltro($filtro, 10, $page);
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
        
        $cont = 0;
        
        $data['fabc'] = [];
        
        foreach($fabc as $f){
            $data['fabc'][$cont] = array(
                'fixo'  => $f['fornecedor_fixo'],
                'cel'   => $f['fornecedor_cel1'],
                'nome'  => $f['fornecedor_nome'],
                'cnpj'  => $f['fornecedor_cnpj'],
                'total' => number_format($this->financeiromodel->somarNotas($f['fornecedor_cnpj']), 2,',','.'),
            );
            $cont++;
        }
        
        if(array_key_exists('delete', $this->session->userdata())){
            $data['erro'] = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        } else {
            $data['erro'] = null;
        }
        
        $this->header('6.2', 'LISTAGEM DE FORNECEDORES', 'cadastros', 'Cadastros', 'Fornecedores');
		$this->load->view('cadastros/fornecedoresabc', $data);
		$this->footer();
    }
    
    public function novoFornecedor(){
        
        $this->acessorestrito("CADASTROS");
        
        $this->load->model('documentosmodel');
        
        $data['ativos'] = $this->cadastrosmodel->getAtivos();
        $data['edita'] = null;
        $data['documentos_tipos'] = $this->documentosmodel->getAllTiposAtivos();
        
        
        if($this->uri->segment(2)){
            $this->header(6.2, 'EDIÇÂO DE FORNECEDOR', 'cadastros', 'Cadastros', 'Edição de Fornecedor');    
        } else {
            $this->header(6.2, 'CADASTRO DE FORNECEDOR', 'cadastros', 'Cadastros', 'Cadastro de Fornecedor');    
        }
            
		$this->load->view('cadastros/fornecedorescadastro', $data);
		$this->footer();
    }
	
	function verificaFornecedor(){
	    
	    
	    $forn = $this->cadastrosmodel->getFornCnpj($this->input->post('cnpj'));
	    
	    echo json_encode($forn);
	}
    
    function insertFornecedor(){
        
        $this->load->model('documentosmodel');
        $this->load->library('moduloupload');
        
        $cnpj = $this->limpa($this->input->post('cnpj'));

        $new = array(
                'fornecedor_nome'               => $this->refatorarString($this->input->post('nome')),
                'fornecedor_cnpj'               => $this->limpa($cnpj),
                'fornecedor_representante'      => $this->refatorarString($this->input->post('nome_r')),
                'fornecedor_tel_representante'  => $this->limpa($this->input->post('tel_r')),
                'fornecedor_ramo'               => $this->refatorarString($this->input->post('ramo')),
                'fornecedor_ativo_id'           => $this->input->post('ativo'),
                'fornecedor_cep'                => $this->limpa($this->input->post('cep')),
                'fornecedor_numero'             => $this->limpa($this->input->post('numero')),
                'fornecedor_endereco'           => $this->refatorarString($this->input->post('endereco')),
                'fornecedor_complemento'        => $this->refatorarString($this->input->post('complemento')),
                'fornecedor_bairro'             => $this->refatorarString($this->input->post('bairro')),
                'fornecedor_cidade'             => $this->refatorarString($this->input->post('cidade')),
                'fornecedor_estado'             => $this->refatorarString($this->input->post('estado')),
                'fornecedor_fixo'               => $this->limpa($this->input->post('tel')),
                'fornecedor_cel1'               => $this->limpa($this->input->post('cel')),
                'fornecedor_email'              => strtolower($this->input->post('email')),
                'fornecedor_razao'              => $this->refatorarString($this->input->post('razao')),
                'fornecedor_titular_cpfcnpj'    => $this->limpa($this->input->post('titular_cpfcnpj')),
                'fornecedor_banco'              => $this->refatorarString($this->input->post('banco')),
                'fornecedor_agencia'            => $this->input->post('agencia'),
                'fornecedor_agencia_d'          => $this->input->post('agencia_d'),
                'fornecedor_conta'              => $this->input->post('conta'),
                'fornecedor_conta_d'            => $this->input->post('conta_d'),
                'fornecedor_titular_nome'       => $this->refatorarString($this->input->post('titular_nome')),
                'fornecedor_ie'                 => $this->input->post('ie'),
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
        
        $this->moduloupload->uploadByIdArray($newArray, $cnpj, $documentos_tipos);
        
        $this->cadastrosmodel->insertFornecedor($new);
        redirect(base_url('fornecedores'));
    }
    
    function excluirFornecedor(){
        
        
        $cnpj = $this->input->post('cnpjforn');
        $sen = MD5($this->input->post('senha'));
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        
        if($sen == $aux['usuario_senha']){
            $old = $this->cadastrosmodel->getFornCnpj($cnpj);
            
            $old['fornecedor_ativo_id'] = 2;
            
            $this->cadastrosmodel->updateFornecedor($old, $cnpj);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('fornecedores'));
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('fornecedores'));
        }
    }
    
    function getDocumentosByCnpj(){
	    
	    $this->load->model('documentosmodel');
	    
	    $cnpj = $this->input->post('cnpj');
	    $docs = $this->documentosmodel->getByTitularCPFCNPJ($cnpj);
	    
	    echo json_encode($docs);
	}
    
    public function editaFornecedor(){
        
        $this->acessorestrito("CADASTROS");
        
        $this->load->model('documentosmodel');
        $cnpj = $this->uri->segment(2);
        $data['edita'] = $this->cadastrosmodel->getFornCnpj($cnpj);
        $data['ativos'] = $this->cadastrosmodel->getAtivos();
        $data['documentos_tipos'] = $this->documentosmodel->getAllTiposAtivos();
        $data['fixed'] = $this->documentosmodel->getOldDoc(5, $cnpj);
        if($data['fixed'] == ""){
            $data['fixed'] = null;
        }

        $this->header('6.2', 'EDIÇÃO DE FORNECEDOR', 'fornecedores', 'Cadastros', 'Edição de Fornecedor');
		$this->load->view('cadastros/fornecedorescadastro', $data);
		$this->footer();
    }
    
    function updateFornecedor(){
        
        $this->load->model('documentosmodel');
        $this->load->library('moduloupload');
        
        $cnpj = $this->limpa($this->input->post('index'));
        
        $new = array(
                'fornecedor_nome'               => $this->refatorarString($this->input->post('nome')),
                'fornecedor_cnpj'               => $this->limpa($cnpj),
                'fornecedor_representante'      => $this->refatorarString($this->input->post('nome_r')),
                'fornecedor_tel_representante'  => $this->limpa($this->input->post('tel_r')),
                'fornecedor_ramo'               => $this->refatorarString($this->input->post('ramo')),
                'fornecedor_ativo_id'           => $this->input->post('ativo'),
                'fornecedor_cep'                => $this->limpa($this->input->post('cep')),
                'fornecedor_numero'             => $this->limpa($this->input->post('numero')),
                'fornecedor_endereco'           => $this->refatorarString($this->input->post('endereco')),
                'fornecedor_complemento'        => $this->refatorarString($this->input->post('complemento')),
                'fornecedor_bairro'             => $this->refatorarString($this->input->post('bairro')),
                'fornecedor_cidade'             => $this->refatorarString($this->input->post('cidade')),
                'fornecedor_estado'             => $this->refatorarString($this->input->post('estado')),
                'fornecedor_fixo'               => $this->limpa($this->input->post('tel')),
                'fornecedor_cel1'               => $this->limpa($this->input->post('cel')),
                'fornecedor_email'              => $this->lowcase($this->input->post('email')),
                'fornecedor_razao'              => $this->refatorarString($this->input->post('razao')),
                'fornecedor_titular_cpfcnpj'    => $this->limpa($this->input->post('titular_cpfcnpj')),
                'fornecedor_banco'              => $this->refatorarString($this->input->post('banco')),
                'fornecedor_agencia'            => $this->input->post('agencia'),
                'fornecedor_agencia_d'          => $this->input->post('agencia_d'),
                'fornecedor_conta'              => $this->input->post('conta'),
                'fornecedor_conta_d'            => $this->input->post('conta_d'),
                'fornecedor_titular_nome'       => $this->refatorarString($this->input->post('titular_nome')),
                'fornecedor_ie'                 => $this->input->post('ie'),
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
        
        $oldDocs = $this->documentosmodel->getByTitularCPFCNPJ($cnpj);
        
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
        
        $this->moduloupload->uploadByIdArray($newDocs, $cnpj, $documentos_tipos);
            
        $this->cadastrosmodel->updateFornecedor($new, $cnpj);
        redirect(base_url('cadastros/fornecedores'));
    }
    
    function getFornecedor(){
        
        
        $cnpj = $this->input->post('cnpj');
        $unq = $this->cadastrosmodel->getFornCnpj($cnpj);
        $cnpj = substr($unq['fornecedor_cnpj'], 0, 2).".".substr($unq['fornecedor_cnpj'], 2, 3).".".substr($unq['fornecedor_cnpj'], 5, 3)."/".substr($unq['fornecedor_cnpj'], 8, 4)."-".substr($unq['fornecedor_cnpj'], 12, 2);
        $ativo = $this->cadastrosmodel->getAtivoId($unq['fornecedor_ativo_id']);
        
        $str = $unq['fornecedor_nome'] . "|" . $cnpj . "|" . $unq['fornecedor_representante'] . "|" . $ativo['ativo_tipo'];
        
        echo $str;
    }
    
    public function verfornecedor(){
        
        $this->acessorestrito("CADASTROS");
        $this->load->model('documentosmodel');
        $this->load->model('financeiromodel');
        
        $cnpj = $this->uri->segment('2');
        $fornecedor = $this->cadastrosmodel->getFornCnpj($cnpj);
        $data['cnpj'] = $fornecedor['fornecedor_cnpj'];
        if(strlen($fornecedor['fornecedor_cnpj']) == 14){
            $fornecedor['fornecedor_cnpj'] = $this->mask($fornecedor['fornecedor_cnpj'], "##.###.###/####-##");
        }else{
            $fornecedor['fornecedor_cnpj'] = $this->mask($fornecedor['fornecedor_cnpj'], "###.###.###-##");
        }
        
        if(strlen($fornecedor['fornecedor_titular_cpfcnpj']) == 14){
            $fornecedor['fornecedor_titular_cpfcnpj'] = $this->mask($fornecedor['fornecedor_titular_cpfcnpj'], "##.###.###/####-##");
        }else{
            $fornecedor['fornecedor_titular_cpfcnpj'] = $this->mask($fornecedor['fornecedor_titular_cpfcnpj'], "###.###.###-##");
        }
        
        if(strlen($fornecedor['fornecedor_tel_representante']) == 11){
            $fornecedor['fornecedor_tel_representante'] = $this->mask($fornecedor['fornecedor_tel_representante'], "(##) #####-####");
        }else{
            $fornecedor['fornecedor_tel_representante'] = $this->mask($fornecedor['fornecedor_tel_representante'], "(##) ####-####");
        }
        if(strlen($fornecedor['fornecedor_fixo']) == 11){
            $fornecedor['fornecedor_fixo'] = $this->mask($fornecedor['fornecedor_fixo'], "(##) #####-####");
        }else{
            $fornecedor['fornecedor_fixo'] = $this->mask($fornecedor['fornecedor_fixo'], "(##) ####-####");
        }
        if(strlen($fornecedor['fornecedor_cel1']) == 11){
            $fornecedor['fornecedor_cel1'] = $this->mask($fornecedor['fornecedor_cel1'], "(##) #####-####");
        }else{
            $fornecedor['fornecedor_cel1'] = $this->mask($fornecedor['fornecedor_cel1'], "(##) ####-####");
        }
        $fornecedor['fornecedor_cep'] = $this->mask($fornecedor['fornecedor_cep'], "#####-###");
        
        $somar = 0;
        $idFornecedor = 'F|' . $cnpj;
        $cont = 0;
        $aray = [];
        $titulosF = $this->financeiromodel->getTitulosByForneclin($idFornecedor);
        foreach($titulosF as $ti){
            $somar = $somar + $ti['titulos_valor'];
            $tipo = $this->financeiromodel->getTM($ti['titulos_tipo']);
            if($ti['titulos_baixa'] == 1){
                $baixa = 'SIM';
            } else {
                $baixa = 'NÃO';
            }
            $aray[$cont] = array(
                'vencimento' => $ti['titulos_vencimento'],
                'numeroserie' => $ti['titulos_numeroserie'],
                'tipo' => $tipo['tm_nome'],
                'valor' => $ti['titulos_valor'],
                'baixa' => $baixa,
            );
            $cont++;
        }
        
        $data['total'] = number_format($somar, 4, ',' , '.');
        $data['titulos'] = $aray;
        $data['fornecedor'] = $fornecedor;
        $data['tipos_docs'] = $this->documentosmodel->getAllTipos();
        $data['docs'] = $this->documentosmodel->getByTitularCPFCNPJ($cnpj);
        $data['cnpj'] = $cnpj;
        
        $this->header('6.2', 'VER FORNECEDOR', 'cadastros', 'Cadastros', 'Ver Fornecedor');
		$this->load->view('cadastros/verfornecedor', $data);
		$this->footer();
    }
    
    function cnpj($cnpj){
        header('Access-Control-Allow-Origin: https://logistica.nsolucoes.digital'); 
        //Garantir que seja lido sem problemas
        header("Content-Type: text/plain");
        
        //Capturar CNPJ
        $cnpj = preg_replace('/\D/', '', $cnpj); //Retira os caracteres que não são dígitos

        

        ///Criando Comunicação cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.receitaws.com.br/v1/cnpj/".$cnpj);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Comente esta linha quando o seu site estiver rodando em https
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $retorno = curl_exec($ch);
        curl_close($ch);

        $retorno = json_decode($retorno); //Ajuda a ser lido mais rapidamente
        echo json_encode($retorno, JSON_PRETTY_PRINT);

    }
    
    function ativarFornecedor(){
	    
	    
	    $id = $this->input->post('fornecedor_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $fornecedor = $this->cadastrosmodel->getFornCnpj($id);
    	    $fornecedor['fornecedor_ativo_id'] = 1;
    	    $this->cadastrosmodel->updateFornecedor($fornecedor, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('fornecedores'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('fornecedores'));
        }
	}
    
    //  **===========================================================================================**
    //  ||                                 FUNÇÕES DE DOCUMENTOS                                     ||
    //  **===========================================================================================**
    
    public function tipos_documentos($erro = null){
        
        $this->acessorestrito("CADASTROS");
        
        $data['documentos_tipos'] = $this->documentosmodel->getAllTipos();
        $data['ativos'] = $this->ativosmodel->getAll();
        
        if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
        
        if($erro != null){
            $data['erro'] = $erro;
        }else{
            $data['erro'] = null;
        }

        $this->header('6.3', 'LISTAGEM DE DOCUMENTOS', 'cadastros', 'Cadastros', 'Documentos');
		$this->load->view('cadastros/documentos', $data);
		$this->footer();
    }
    
    function getTipoDocumentoById(){
        
        
        $id = $this->input->post('documentos_tipos_id');
        $documento = $this->documentosmodel->getTipoById($id);
        
        echo json_encode($documento);
    }
    
    function insertTipoDocumento(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //UPDATE
            $update_id = $this->input->post('id_e');
            
            $data['documentos_tipos_nome'] = $this->refatorarString($this->input->post('nome_e'));
            $data['documentos_tipos_ativo_id'] = $this->input->post('ativo_e');
            
            $this->documentosmodel->updateTipo($data, $update_id);
        }else{
            //INSERT
        
           $data['documentos_tipos_nome'] = $this->refatorarString($this->input->post('nome_c'));
           $data['documentos_tipos_ativo_id'] = 1;
        
           $this->documentosmodel->insertTipo($data);
        }
        
        redirect('documentos', 'refresh');
    }
    
    function deleteTipoDocumento(){
        
        
        $id = $this->input->post('iddocumento');
        $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
            $documento = $this->cadastrosmodel->getFornCnpj($id);
            
            $documento['documentos_tipos_ativo_id'] = 2;
            
            $this->documentosmodel->updateTipo($documento, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect('documentos', 'refresh');
        }
        else {
            $this->session->set_userdata('delete', 2);
            redirect('documentos', 'refresh');
        }
        
        
    }
    
    function ativarDocumento(){
	    
	    
	    $id = $this->input->post('documento_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $doc = $this->documentosmodel->getByTipoId($id);
    	    $doc['documentos_tipos_ativo_id'] = 1;
    	    $this->documentosmodel->updateTipo($doc, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('documentos'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('documentos'));
        }
	}
    
}
