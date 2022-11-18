<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiro extends MY_Controller {
    
    public function index(){
        $this->header('2');
        $this->load->view('icon');
        $this->footer();
    }
    
	public function __construct(){
        parent::__construct();
	    $this->load->database();
	    $this->load->model('frotamodel');
	    $this->load->model('financeiromodel');
	    $this->load->model('fornecedoresmodel');
	    $this->load->model('estoquemodel');
	    $this->load->model('modalmodel');
	    $this->load->model('clientesmodel');
	    $this->load->model('cadastrosmodel');
	    $this->load->model('produtosmodel');
	    $this->load->model('manutencaomodel');
	    $this->load->model('usuariosmodel');
	    date_default_timezone_set('America/Sao_Paulo');
	}
	
	function mask($mask, $str){
        $str = str_replace(" ","",$str);
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        }
        return $mask;
    }
    private function Money($valor){
        $valor = number_format($valor, 4, ",", ".");
        return $valor;
    }
    private function atraso($valor){
        $data = strtotime(date('Y-m-d'));
        $diferenca = ($data - strtotime($valor))/86400;
        return $diferenca;
    }
	private function reformatavalor($valor){
	    $valor = str_replace(".", "", $valor);
	    $valor = str_replace(",", ".", $valor);
	    return $valor;
	}

	private function formatadata($valor){
	    $valor = date("d/m/Y", strtotime ($valor));
	    return $valor;
	}
	private function fornecedorcliente(){
	    
	    
	    $fornecedor = $this->fornecedoresmodel->getAll();
	    $cliente = $this->clientesmodel->getAll();
	    
	    $fornclin;
	    $aux = 0;
	    foreach($fornecedor as $for){
	        $fornclin[$aux]['id'] = "F|".$for['fornecedor_cnpj'];
	        $fornclin[$aux]['nome'] = $for['fornecedor_nome'];
	        $aux++;
	    }
	    foreach($cliente as $cli){
	        $fornclin[$aux]['id'] = "C|".$cli['cliente_cpfcnpj'];
	        $fornclin[$aux]['nome'] = $cli['cliente_nome'];
	        $aux++;
	    }
	    
	    return $fornclin;
	    
	}
	private function apagar($valor, $porcento, $dias=null, $multa=null){
	    if($dias == null){
	        $valor = $valor-($valor*($porcento/100)) ;
	    }else{
	        $valor = $valor+($valor*($multa/100))+($dias*($valor*($porcento/100)));
	    }
	    return $valor;
	}
	private function tipos($valor){
	    
	    $aux = $this->estoquemodel->getTipoUnico($valor);
	    return $aux['tm_nome'];
	}
	private function chaveunica(){
        
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuwxyz0123456789-_";
        $string = '';
        for($i = 0; $i < 15; $i++){
            $string .= $chars[mt_rand(0,62)];
        }
        
        $date = date('Y-m-d H:m:s');
        
        $salt = "Chave Secreta que vai ser utilizada para gerar a chave de acesso!";
        $chave = $date.$string.$salt;
        
        for($i= 0; $i < 10; $i++){
            $chave = hash('sha256', $chave);
        }
        
        if($this->estoquemodel->unikey($chave) != ""){
            $this->chaveunica();
        }else{
            return $chave;
        }
    }
	private function titulos($completo, $baixa, $filtros = null){
	    
	    
	    if($filtros == null){
	        $filtros = array(
	           'for'   => null,
	           'tipo'  => null,
	           'baixa' => null,
	           'de'    => null,
	           'ate'   => null,
	        );
	    }
	    
	    $aux = $this->financeiromodel->getTitulosFilter($filtros);
	    $cont=0;
	    $titulos = null;
	    if(count($aux)>0){
    	    foreach($aux as $a){
                if($a['titulos_completo'] == $completo && $a['titulos_baixa'] == $baixa){
    	            $help = $this->atraso($a['titulos_vencimento']);
    	            if($help > 0){
    	                $apagar = $this->apagar($a['titulos_valor'], $a['titulos_juros'], $help, $a['titulos_multa']);
    	            }elseif($help < 0){
    	                $apagar = $this->apagar($a['titulos_valor'], $a['titulos_desconto']);
    	                $help = 0;
    	            }elseif($help == 0){
    	                $apagar = $a['titulos_valor'];
    	            }
    	            
	                $fc = substr($a['titulos_forneclin'], 0, 1);
                    $cpfcnpj = substr($a['titulos_forneclin'], 2);
                    
                    if($fc == "C"){
                        $f_c = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
                        $f_c = $f_c['cliente_nome'];
                    }else if($fc == "F"){
                        $f_c = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
                        $f_c = $f_c['fornecedor_nome'];
                    }else if($fc == 0 || $fc == '0'){
                        $f_c = "NÃO POSSUI";
                    }
        	            
        	        $titulos[$cont] = array(
        	            'titulos_id'            => $a['titulos_id'],
        	            'titulos_vencimento'    => $a['titulos_vencimento'],
        	            'titulos_numeroserie'   => $a['titulos_numeroserie'],
        	            'titulos_tipo'          => $this->tipos($a['titulos_tipo']),
        	            'titulos_atraso'        => $help,
        	            'titulos_valor'         => "R$ ".$this->Money($a['titulos_valor']),
        	            'titulos_juros'         => $a['titulos_juros'],
        	            'titulos_multa'         => $a['titulos_multa'],
        	            'titulos_desconto'      => $a['titulos_desconto'],
        	            'titulos_valorpago'     => "R$ ".$this->Money($a['titulos_valorpago']),
        	            'titulos_frota'         => $a['titulos_frota'],
        	            'titulos_observacao'    => $a['titulos_observacao'],
        	            'titulos_baixa'         => $a['titulos_baixa'],
        	            'titulos_apagar'        => "R$ ".$this->Money($apagar),
        	            'multiplos_valor'       => $apagar,
        	            'multiplos_forneclin'   => $f_c,
        	            );    
        	       $cont++;
                }
    	    }
	    }else{
	        $titulos = null;
	    }
	    return $titulos;
	}
	private function fechadas(){
	    
	    $this->load->model('usuariosmodel');
	    $aux = $this->financeiromodel->getTitulos();
	    $titulos = null;
	    $cont=0;
	    if(count($aux)>0){
    	    foreach($aux as $a){
    	        if($a['titulos_baixa'] == 1){
    	            $user = $this->usuariosmodel->getByID($a['titulos_user_baixa']);
    	            
        	        $titulos[$cont] = array(
        	            'titulos_id'            => $a['titulos_id'],
        	            'titulos_numeroserie'   => $a['titulos_numeroserie'], 
        	            'titulos_tipo'          => $this->tipos($a['titulos_tipo']), 
        	            'titulos_valorpago'     => "R$ ".$this->Money($a['titulos_valorpago']), 
        	            'titulos_data_baixa'    => $a['titulos_data_baixa'],
        	            'titulos_user_baixa'    => $user['usuario_nome'],
        	            );   
        	       $cont++;
                }
    	    }
	    }else{
	        $titulos = null;
	    }
	    return $titulos;
	}
	
    public function lancatitulo(){
        
        $aux = $this->estoquemodel->getTipoUnico($this->input->post('especie'));
        
        $dt = $this->input->post('vencimento');
        $newDt = [];
        if($this->input->post('recorrente') == 1 || $this->input->post('recorrente') == "1"){
            $vezes = intval($this->input->post('repeticao'));
            for($i = 0; $i < $vezes; $i++){
                $newDt[$i] = date('Y-m-d', strtotime($dt.' +'.$i.' month'));
            }
        }else{
            $vezes = 1;
            $newDt[0] = $dt;
        }
        
        $x = 1;
        for($i = 0; $i < $vezes; $i++){
            if($i == 0){
                $newDt[$i] = $this->input->post('vencimento');
            }
            if($vezes > 1){
                $numser = 'RC- ' . $this->refatorarString($this->input->post('numser')) . ' ' . $x . '/' . $vezes;
                $x++;
            } else {
                $numser = $this->refatorarString($this->input->post('numser'));
            }

            $data = array(
                'titulos_vencimento'    => $newDt[$i],
                'titulos_numeroserie'   => $numser,
                'titulos_tipo'          => $this->input->post('forma'),
                'titulos_forneclin'     => $this->input->post('forneclin'),
                'titulos_atraso'        => "0",
                'titulos_valor'         => $this->reformatavalor($this->input->post('valor')),
                'titulos_juros'         => 0.00,
                'titulos_multa'         => 0.00,
                'titulos_desconto'      => 0.00,
                'titulos_valorpago'     => "0.0",
                'titulos_formapag'      => "",        
                'titulos_frota'         => null,
                'titulos_rateio'        => null,
                'titulos_observacao'    => $this->refatorarString($this->input->post('obs')),
                'titulos_pagobs'        => "",
                'titulos_IO'            => $aux['tm_tipo'],
                'titulos_baixa'         => 0,
                'titulos_completo'      => 1,
                'titulos_numos'         => $this->input->post('numos'),
            );
            
            $this->financeiromodel->putTitulos($data);
            
        }
        
        $this->session->set_userdata('mensagem_titulos_criar', 1);
        
        redirect(base_url('movimentosfinanceiro'));
    }
    
    public function controleMovimento(){
        
        $this->header('7');
        $this->load->view('financeiro/controleMovimento');
        $this->footer();
    }
    
    public function indice(){
        
        $this->acessorestrito('FINANCEIRO');
        $this->load->library("pagination");
        
        $filtro = [];
        
        $filtro['forneclin']    = mb_strtoupper($this->input->post('forneclin'));
        $filtro['data']         = mb_strtoupper($this->input->post('periodo'));
        $filtro['texto']        = mb_strtoupper($this->input->post('texto'));
        if(!$filtro['data']){
            $filtro['data'] = date('d/m/Y') . ' - ' . date('d/m/Y');
        }
        $filtro['tipo'] = mb_strtoupper($this->input->post('tipo'));
        
        if($this->uri->segment(2) == 'f'){
            $testeurl = strtoupper(urldecode($this->uri->segment(3))); 
            $aux_url = explode('¬', $testeurl);
            $filtro['data']         = str_replace('A','/', $aux_url[0]);
            $filtro['tipo']         = $aux_url[1];
            $filtro['forneclin']    = $aux_url[2];
            $filtro['texto']        = $aux_url[3];
        } else {
            $testeurl = str_replace('/', 'a', $filtro['data']) . '¬' . $filtro['tipo'] . '¬' . $filtro['forneclin'] . '¬' . $filtro['texto'] ;
        }
        
        $config = array();
        $uri_segment = 4;
        if($filtro){
            $config["base_url"] = base_url('movimentosfinanceiro/f/'. $testeurl .'/');
        } else {
            $config["base_url"] = base_url('movimentosfinanceiro/n/');
            $uri_segment = 3;
        }
        
        $config["total_rows"] = $this->financeiromodel->get_countAbertasFiltro($filtro);    
        $config["per_page"] = 10;
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $this->pagination->initialize($config);
        
        $itens = $this->financeiromodel->getAllAbertasFiltro($filtro, 10, $page);
            
        $titulos = [];
        $cont = 0;
    
        foreach($itens as $i){
            $aux_forneclin = explode('|', $i['titulos_forneclin']);
            if(count($aux_forneclin) == 2){
                if($aux_forneclin[0] == 'C'){
                    $c = $this->clientesmodel->getCPFCNPJ($aux_forneclin[1]);
                    $forneclin_nome = $c['cliente_nome'];
                } else {
                    $f = $this->fornecedoresmodel->getByIdRowArray($aux_forneclin[1]);
                    $forneclin_nome = $f['fornecedor_nome'];
                }
            } else {
                $forneclin_nome = 'Não foi encontrado';
            }

            $tm = $this->financeiromodel->getTM($i['titulos_tipo']);
        	            
            $titulos[$cont] = array(
                'titulos_id'            => $i['titulos_id'],
                'titulos_numeroserie'   => $i['titulos_numeroserie'],
                'titulos_tipo'          => $tm['tm_tipo'], 
                'titulos_valor'         => 'R$ ' . number_format($i['titulos_valor'], 4,',','.'),
                'titulos_especie'       => $tm['tm_nome'], 
                'titulos_vencimento'    => $i['titulos_vencimento'],
                'titulos_fornecedor'    => $forneclin_nome,
                'titulos_atraso'        => $help = $this->atraso($i['titulos_vencimento']),
            );
            $cont++;
        }
        
        $data= array(
            'estoques'      => $this->produtosmodel->estoqueAll(),
            'produtos'      => $this->produtosmodel->getAll(),
            'servicos'      => $this->manutencaomodel->getAllServAtivos(),
            'fornecedores'  => $this->fornecedoresmodel->getAll(),
            'frota'         => $this->frotamodel->getAll(),
            'titulos'       => $titulos,
            'forcli'        => $this->fornecedorcliente(),
            'contas'        => $this->financeiromodel->getContas(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'operacoes'     => $this->estoquemodel->getTiposAtivos(),
            'chave'         => $this->chaveunica(),
            'nota'          => intval($this->estoquemodel->getLastIdNota())+1,
	        'movimentos'    => $this->estoquemodel->getNotas(),
        );
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
        
        $this->header('2.1', 'Lançamento de Títulos', 'financeiro', 'Financeiro', 'Lançamento de Títulos');
        $this->load->view('financeiro/controleMovimento', $data);
        $this->footer();
    }
    
    public function relatorios(){
        
        $this->acessorestrito('FINANCEIRO');
        $this->load->library("pagination");


        $this->header('2.1', 'Lançamento de Títulos', 'financeiro', 'Financeiro', 'Lançamento de Títulos');
        $this->load->view('financeiro/relatorios');
        $this->footer();
    }
    
    public function baixados(){
        
        $this->acessorestrito('FINANCEIRO');
        $this->load->library("pagination");
        
        $filtro = [];
        
        $filtro['forneclin']    = mb_strtoupper($this->input->post('forneclin'));
        $filtro['data']         = mb_strtoupper($this->input->post('periodo'));
        $filtro['texto']        = mb_strtoupper($this->input->post('texto'));
        if(!$filtro['data']){
            $filtro['data'] = date('d/m/Y') . ' - ' . date('d/m/Y');
        }
        $filtro['tipo'] = mb_strtoupper($this->input->post('tipo'));
        
        if($this->uri->segment(3) == 'f'){
            $testeurl = strtoupper(urldecode($this->uri->segment(4))); 
            $aux_url = explode('¬', $testeurl);
            $filtro['data']         = str_replace('A','/', $aux_url[0]);
            $filtro['tipo']         = $aux_url[1];
            $filtro['forneclin']    = $aux_url[2];
            $filtro['texto']        = $aux_url[3];
        } else {
            $testeurl = str_replace('/', 'a', $filtro['data']) . '¬' . $filtro['tipo'] . '¬' . $filtro['forneclin'] . '¬' . $filtro['texto'];
        }
        
        $config = array();
        $uri_segment = 5;
        if($filtro){
            $config["base_url"] = base_url('financeiro/baixados/f/'. $testeurl .'/');
        } else {
            $config["base_url"] = base_url('financeiro/baixados/n/');
            $uri_segment = 4;
        }
        
        $config["total_rows"] = $this->financeiromodel->get_countBaixadosFiltro($filtro);    
        $config["per_page"] = 10;
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $this->pagination->initialize($config);
        
        $itens = $this->financeiromodel->getAllBaixadosFiltro($filtro, 10, $page);
        
        $baixados = [];
        $cont = 0;
    
        foreach($itens as $i){
            $user = $this->usuariosmodel->getByID($i['titulos_user_baixa']);
            if($user){
                $nome_user = $user['usuario_nome'];
            } else {
                $nome_user = 'Usuário não encontrado';
            }
            
            $aux_forneclin = explode('|', $i['titulos_forneclin']);
            if(count($aux_forneclin) == 2){
                if($aux_forneclin[0] == 'C'){
                    $c = $this->clientesmodel->getCPFCNPJ($aux_forneclin[1]);
                    $forneclin_nome = $c['cliente_nome'];
                } else {
                    $f = $this->fornecedoresmodel->getByIdRowArray($aux_forneclin[1]);
                    $forneclin_nome = $f['fornecedor_nome'];
                }
            } else {
                $forneclin_nome = 'Não foi encontrado';
            }

            $tm = $this->financeiromodel->getTM($i['titulos_tipo']);
        	            
            $baixados[$cont] = array(
                'titulos_id'            => $i['titulos_id'],
                'titulos_numeroserie'   => $i['titulos_numeroserie'],
                'titulos_tipo'          => $tm['tm_tipo'], 
                'titulos_user_baixa'    => $nome_user, 
                'titulos_valorpago'     => 'R$ ' . number_format($i['titulos_valorpago'], 2,',','.'),
                'titulos_data_baixa'    => $i['titulos_data_baixa'],
                'titulos_fornecedor'    => $forneclin_nome,
                'titulos_especie'       => $tm['tm_nome'],
            );
            $cont++;
        }
        
        $data= array(
            'estoques'      => $this->produtosmodel->estoqueAll(),
            'produtos'      => $this->produtosmodel->getAll(),
            'servicos'      => $this->manutencaomodel->getAllServAtivos(),
            'fornecedores'  => $this->fornecedoresmodel->getAll(),
            'frota'         => $this->frotamodel->getAll(),
            'baixados'      => $baixados,
            'forcli'        => $this->fornecedorcliente(),
            'contas'        => $this->financeiromodel->getContas(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'operacoes'     => $this->estoquemodel->getTiposAtivos(),
            'chave'         => $this->chaveunica(),
            'nota'          => intval($this->estoquemodel->getLastIdNota())+1,
	        'movimentos'    => $this->estoquemodel->getNotas(),
        );
        if($this->session->userdata('senhaErro')){
            $this->session->unset_userdata('senhaErro');
            $data['senhaErro'] = true;
        }
        if($this->session->userdata('exclusaoSucesso')){
            $this->session->unset_userdata('exclusaoSucesso');
            $data['exclusaoSucesso'] = true;
        }
        if($this->session->userdata('exclusaoErro')){
            $this->session->userdata('exclusaoErro');
            $data['exclusaoErro'] = true;
        }
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];

        $this->header('2.1', 'Lançamento de Títulos', 'financeiro', 'Financeiro', 'Lançamento de Títulos');
        $this->load->view('financeiro/baixados', $data);
        $this->footer();
    }
    
    public function incompletos(){
        
        $this->acessorestrito('FINANCEIRO');
        $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(3) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('financeiro/incompletos/f/' . $filtro . '/');
            $config["total_rows"] = $this->financeiromodel->get_countIncompletosFiltro($filtro);    
            $config["per_page"] = 10;
            $config["uri_segment"] = 5;
            
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
            
            $itens = $this->financeiromodel->getAllIncompletosFiltro($filtro, 10, $page);
            
        } else {
            $config = array();
            $config["base_url"] = base_url('financeiro/incompletos/n/');
            $config["total_rows"] = $this->financeiromodel->get_countIncompletos();
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            
            $itens = $this->financeiromodel->getAllIncompletos(10, $page);
        }
        
        $incompletos = [];
        $cont = 0;
    
        foreach($itens as $i){
        	            
            $incompletos[$cont] = array(
                'titulos_id'            => $i['titulos_id'],
                'titulos_numeroserie'   => $i['titulos_numeroserie'],
                'titulos_tipo'          => $this->tipos($i['titulos_tipo']), 
                'titulos_valor'         => 'R$ ' . number_format($i['titulos_valor'], 2,',','.'),
                'titulos_apagar'        => 'R$ ' . number_format($i['titulos_valor'], 2,',','.'),
            );
            $cont++;
        }
        
        $data= array(
            'estoques'      => $this->produtosmodel->estoqueAll(),
            'produtos'      => $this->produtosmodel->getAll(),
            'servicos'      => $this->manutencaomodel->getAllServAtivos(),
            'fornecedores'  => $this->fornecedoresmodel->getAll(),
            'frota'         => $this->frotamodel->getAll(),
            'pendencias'    => $incompletos,
            'forcli'        => $this->fornecedorcliente(),
            'contas'        => $this->financeiromodel->getContas(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'operacoes'     => $this->estoquemodel->getTiposAtivos(),
            'chave'         => $this->chaveunica(),
            'nota'          => intval($this->estoquemodel->getLastIdNota())+1,
	        'movimentos'    => $this->estoquemodel->getNotas(),
        );
        
        if($this->session->userdata('senhaErro')){
            $this->session->unset_userdata('senhaErro');
            $data['senhaErro'] = true;
        }
        if($this->session->userdata('exclusaoSucesso')){
            $this->session->unset_userdata('exclusaoSucesso');
            $data['exclusaoSucesso'] = true;
        }
        if($this->session->userdata('exclusaoErro')){
            $this->session->userdata('exclusaoErro');
            $data['exclusaoErro'] = true;
        }
        
        $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];

        $this->header('2.1', 'Lançamento de Títulos', 'financeiro', 'Financeiro', 'Lançamento de Títulos');
        $this->load->view('financeiro/incompletos', $data);
        $this->footer();
    }
    
    public function baixatitulo(){
        
        
        $id = $this->input->post('tituloId');
        $aux = $this->financeiromodel->getTitulo($id);

        
        $data = array(
        'titulos_vencimento'    => $aux['titulos_vencimento'],
        'titulos_numeroserie'   => $aux['titulos_numeroserie'],
        'titulos_tipo'          => $aux['titulos_tipo'],
        'titulos_forneclin'     => $aux['titulos_forneclin'],
        'titulos_atraso'        => 0,
        'titulos_valor'         => $aux['titulos_valor'],
        'titulos_juros'         => $aux['titulos_juros'],
        'titulos_multa'         => $aux['titulos_multa'],
        'titulos_desconto'      => $aux['titulos_desconto'],
        'titulos_valorpago'     => $this->reformatavalor($this->input->post('valor')),
        'titulos_frota'         => $this->input->post('frotas'),
        'titulos_rateio'        => $this->input->post('valoresFrota'),
        'titulos_observacao'    => $aux['titulos_observacao'],
        'titulos_formapag'      => $this->input->post('forma'),
        'titulos_pagobs'        => $this->input->post('obs'),
        'titulos_IO'            => $aux['titulos_IO'],
        'titulos_baixa'         => 1,
        'titulos_completo'      => 1,
        'titulos_data_baixa'    => date('Y-m-d', strtotime($this->input->post('conData'))),
        'titulos_user_baixa'    => $this->session->userdata('user_id'),
        );
        
        $this->financeiromodel->updateTitulos($id, $data);
        
        $this->session->set_userdata('mensagem_titulos_baixa', 1);
        
        redirect(base_url('movimentosfinanceiro'));
    }
    
    public function modalbaixa(){
        
        $aux = $this->modalmodel->modaltitulo($this->input->post('id'));
        
        echo $aux;
    }
    
    public function dynamicNewTipo(){
        
        
        $prod = ($this->input->post('item_add') == 1 ? 1 : 0);
        $serv = ($this->input->post('item_add') == 2 ? 1 : 0);
        
        $new = array(
                'tm_nome'               => $this->refatorarString($this->input->post('nome')),
                'tm_tipo'               => $this->input->post('tipo'),
                'tm_movimenta_estoque'  => $this->input->post('movimenta'),
                'tm_nota_fiscal'        => $this->input->post('nota'),
                'tm_possui_movimento'   => 0,
                'tm_devolucao'          => $this->input->post('devolucao'),
                'tm_ativo_id'           => 1,
                'tm_produto'            => $prod,
                'tm_servico'            => $serv,
            );
            
        $new['tm_id'] = $this->estoquemodel->insertTipo($new);
        
        echo json_encode($new);
    }
    
    public function servicoDinamico(){
        
        
        $new = array(
                'servico_nome'      => $this->refatorarString($this->input->post('nome')),
                'servico_custo'     => $this->reformatavalor($this->input->post('valor')),
                'servico_ativo_id'  => 1
            );
        
        $new['servico_id'] = $this->manutencaomodel->insertServ($new);
        
        echo json_encode($new);
    }
    
    public function servicoDinamicoReturnAll(){
        
        
        $new = array(
                'servico_nome'      => $this->refatorarString($this->input->post('nome')),
                'servico_custo'     => $this->reformatavalor($this->input->post('valor')),
                'servico_ativo_id'  => 1
            );
        
        $this->manutencaomodel->insertServ($new);
        
        $servicos = $this->manutencaomodel->getAllServAtivos();
        $servics = [];
        $cont = 0;
        
        foreach($servicos as $s){
            $s['servico_nome']  = ucwords(mb_strtolower($s['servico_nome']));
            $s['servico_custo'] = number_format($s['servico_custo'], 4, ',', '.');
            $servics[$cont] = $s;
            $cont++;
        }
        
        echo json_encode($servics);
    }
    
    public function verificaFC(){
        
        
        $cnpj = $this->input->post('cnpj');
        
        if($this->input->post('tipo') == 1){
            $forn = $this->cadastrosmodel->getFornCnpj($cnpj);
            if($forn != null && $forn != ""){
                echo 1;
            }else{
                echo 2;
            }
        }else if($this->input->post('tipo') == 2){
            $cliente = $this->clientesmodel->getCPFCNPJ($cnpj);
            if($cliente != null && $cliente != ""){
                echo 1;
            }else{
                echo 2;
            }
        }
    }
    
    public function novoFC(){
        
        
        if($this->input->post('tipo') == 1){
            
            $new = array(
                    'fornecedor_cnpj'           => $this->input->post('cnpj'),
                    'fornecedor_nome'           => $this->refatorarString($this->input->post('nome')),
                    'fornecedor_ramo'           => $this->refatorarString($this->input->post('ramo')),
                    'fornecedor_cep'            => $this->input->post('cep'),
                    'fornecedor_endereco'       => $this->refatorarString($this->input->post('logradouro')),
                    'fornecedor_numero'         => $this->input->post('num'),
                    'fornecedor_bairro'         => $this->refatorarString($this->input->post('bairro')),
                    'fornecedor_complemento'    => $this->refatorarString($this->input->post('complemento')),
                    'fornecedor_cidade'         => $this->refatorarString($this->input->post('cidade')),
                    'fornecedor_estado'         => $this->refatorarString($this->input->post('estado')),
                    'fornecedor_email'          => $this->input->post('email'),
                    'fornecedor_ativo_id'       => 1
                );
            
            $id = $this->cadastrosmodel->insertFornecedor($new);
            
            $retorno = array(
                    'id'    => 'F|'.$this->input->post('cnpj'),
                    'nome'  => $this->refatorarString($this->input->post('nome'))
                );
            
            echo json_encode($retorno);
            
        }else if($this->input->post('tipo') == 2){
            
            $new = array(
                    'cliente_cpfcnpj'           => $this->input->post('cnpj'),
                    'cliente_nome'              => $this->refatorarString($this->input->post('nome')),
                    'cliente_fantasia'          => $this->refatorarString($this->input->post('nome')),
                    'cliente_ramo'              => $this->refatorarString($this->input->post('ramo')),
                    'cliente_cep'               => $this->input->post('cep'),
                    'cliente_endereco'          => $this->refatorarString($this->input->post('logradouro')),
                    'cliente_numero'            => $this->input->post('num'),
                    'cliente_bairro'            => $this->refatorarString($this->input->post('bairro')),
                    'cliente_complemento'       => $this->refatorarString($this->input->post('complemento')),
                    'cliente_cidade'            => $this->refatorarString($this->input->post('cidade')),
                    'cliente_estado'            => $this->refatorarString($this->input->post('estado')),
                    'cliente_email'             => $this->input->post('email'),
                    'cliente_ativo_id'          => 1
                );
                
            $this->clientesmodel->insert($new);
            
            $retorno = array(
                    'id'    => 'C|'.$this->input->post('cnpj'),
                    'nome'  => $this->refatorarString($this->input->post('nome'))
                );
            
            echo json_encode($retorno);
        }
    }
    
    public function pegaFechada(){
        
        $this->load->model('usuariosmodel');
        
        $id = $this->input->post('id');
        
        $ttl = $this->financeiromodel->getTitulo($id);
        $fc = substr($ttl['titulos_forneclin'], 0, 1);
        $cpfcnpj = substr($ttl['titulos_forneclin'], 2);
        $frota = $this->frotamodel->getRowById($ttl['titulos_frota']);
        $user = $this->usuariosmodel->getByID($ttl['titulos_user_baixa']);
        
        if($fc == "C"){
            $f_c = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
            $f_c = $f_c['cliente_nome'];
        }else if($fc == "F"){
            $f_c = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
            $f_c = $f_c['fornecedor_nome'];
        }else if($fc == 0 || $fc == '0'){
            $f_c = null;
        }
        
        if($frota != null && $frota != ""){
            $frota = $frota['frota_placa']." | ".$frota['frota_codigo'];
        }else{
            $frota = null;
        }
        
        $refatora = array(
                'id'                => $id,
                'vencimento'        => $ttl['titulos_vencimento'],
                'numero'            => $ttl['titulos_numeroserie'],
                'fornecliente'      => $f_c,
                'tipo'              => $this->tipos($ttl['titulos_tipo']),
                'valor'             => "R$ ".$this->Money($ttl['titulos_valor']),
                'juros'             => $ttl['titulos_juros'],
                'multa'             => $ttl['titulos_multa'],
                'desconto'          => $ttl['titulos_desconto'],
                'valor_pago'        => "R$ ".$this->Money($ttl['titulos_valorpago']),
                'forma'             => $ttl['titulos_formapag'],
                'frota'             => $frota,
                'observacao'        => $ttl['titulos_observacao'],
                'tipo_movimento'    => $ttl['titulos_IO'],
                'data_baixa'        => date('d/m/Y', strtotime($ttl['titulos_data_baixa'])),
                'responsavel'       => $user['usuario_nome'],
                'hidden_tipo'       => $ttl['titulos_tipo'],
            );
            
        echo json_encode($refatora);
    }
    
    public function pegaAberto(){
        
        $this->load->model('usuariosmodel');
        
        $id = $this->input->post('id');
        
        $ttl = $this->financeiromodel->getTitulo($id);
        $fc = substr($ttl['titulos_forneclin'], 0, 1);
        $cpfcnpj = substr($ttl['titulos_forneclin'], 2);
        $frota = $this->frotamodel->getRowById($ttl['titulos_frota']);
        
        if($fc == "C"){
            $f_c = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
            $f_c = $f_c['cliente_nome'];
        }else if($fc == "F"){
            $f_c = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
            $f_c = $f_c['fornecedor_nome'];
        }else if($fc == 0 || $fc == '0'){
            $f_c = null;
        }
        
        if($frota != null && $frota != ""){
            $frota = $frota['frota_placa']." | ".$frota['frota_codigo'];
        }else{
            $frota = null;
        }
        
        $refatora = array(
                'id'                => $id,
                'vencimento'        => $ttl['titulos_vencimento'],
                'numero'            => $ttl['titulos_numeroserie'],
                'fornecliente'      => $f_c,
                'tipo'              => $this->tipos($ttl['titulos_tipo']),
                'atraso'            => $this->atraso($ttl['titulos_vencimento']),
                'valor'             => "R$ ".$this->Money($ttl['titulos_valor']),
                'juros'             => $ttl['titulos_juros'],
                'multa'             => $ttl['titulos_multa'],
                'desconto'          => $ttl['titulos_desconto'],
                'frota'             => $frota,
                'observacao'        => $ttl['titulos_observacao'],
                'tipo_movimento'    => $ttl['titulos_IO'],
            );
            
        echo json_encode($refatora);
    }
    
    public function completatitulo(){
        
        $id = $this->input->post('id_completa');
        $old = $this->financeiromodel->getTitulo($id);
        
        $new = array(
            'titulos_vencimento'    => $this->input->post('vencimento_completa'),
            'titulos_numeroserie'   => $old['titulos_numeroserie'],
            'titulos_forneclin'     => $this->input->post('forneclin_completa'),
            'titulos_tipo'          => $old['titulos_tipo'],
            'titulos_atraso'        => $old['titulos_atraso'],
            'titulos_valor'         => $old['titulos_valor'],
            'titulos_juros'         => $this->input->post('juros_completa'),
            'titulos_multa'         => $this->input->post('multa_completa'),
            'titulos_desconto'      => $this->input->post('desconto_completa'),
            'titulos_valorpago'     => $old['titulos_valorpago'],
            'titulos_formapag'      => $old['titulos_formapag'],
            'titulos_frota'         => $old['titulos_frota'],
            'titulos_observacao'    => $this->refatorarString($this->input->post('observacao_completa')),
            'titulos_IO'            => $old['titulos_IO'],
            'titulos_completo'      => 1,
            'titulos_baixa'         => $old['titulos_baixa'],
            'titulos_data_baixa'    => $old['titulos_data_baixa'],
            'titulos_user_baixa'    => $old['titulos_user_baixa'],
            );
            
        $this->financeiromodel->updateTitulos($id, $new);
        redirect(base_url('movimentosfinanceiro'));
    }
    
    public function disparaModal(){
        $id = $this->uri->segment(3);
        $baixa = $this->uri->segment(4);
        $this->session->set_userdata('id_financeiro', $id);
        $this->session->set_userdata('baixa_financeiro', $baixa);
        
        redirect(base_url('movimentosfinanceiro'));
    }
    
    public function reabrirtitulo(){
        
        $this->load->model('logger');
        
        $id = $this->input->post('id_reabrir');
        $senha = MD5($this->input->post('senha'));
        
        if($senha == $this->session->userdata('senha')){
            $ttl = $this->financeiromodel->getTitulo($id);
            
            if($ttl['titulos_tipo'] != 0){
                $ttl['titulos_valorpago'] = 0.00;
                $ttl['titulos_formapag'] = "";
                $ttl['titulos_data_baixa'] = null;
                $ttl['titulos_baixa'] = 0;
                $ttl['titulos_user_baixa'] = null;
                
                $this->financeiromodel->updateTitulos($id, $ttl);
                
                $log = array(
                        'log_user_id'   => $this->session->userdata('user_id'),
                        'log_user_nome' => $this->session->userdata('nome'),
                        'log_titulo_id' => $id,
                        'log_data'      => date('d/m/Y'),
                        'log_hora'      => date('H:i')
                    );
                $this->logger->insertLogReaberturaTitulo($log);
    
                $this->session->set_userdata('err_titulo', 2);
            }else{
                $filhos = $this->financeiromodel->getFilhosTitulo($id);
                $ids = "";
                
                foreach($filhos as $fil){
                    $fil['titulos_valorpago'] = 0.00;
                    $fil['titulos_formapag'] = "";
                    $fil['titulos_data_baixa'] = null;
                    $fil['titulos_baixa'] = 0;
                    $fil['titulos_user_baixa'] = null;
                    $fil['titulos_id_pai'] = 0;
                    
                    $this->financeiromodel->updateTitulos($fil['titulos_id'], $fil);
                    
                    if($ids == ""){
                        $ids = $fil['titulos_id'];
                    }else{
                        $ids .= "|".$fil['titulos_id'];
                    }
                }
                $log = array(
                        'log_user_id'   => $this->session->userdata('user_id'),
                        'log_user_nome' => $this->session->userdata('nome'),
                        'log_titulo_id' => $ids,
                        'log_data'      => date('d/m/Y'),
                        'log_hora'      => date('H:i')
                    );
                $this->logger->insertLogReaberturaTitulo($log);
                
                $this->financeiromodel->deletePai($id);
                $this->session->set_userdata('err_titulo', 2);
            }
        }else{
            $this->session->set_userdata('err_titulo', 1);
        }
        
        redirect(base_url('financeiro/baixados'));
    }
    
    public function getTituloEdit(){
        
        
        $id = $this->input->post('id');
        $ttl = $this->financeiromodel->getTitulo($id);
        
        echo json_encode($ttl);
    }
    
    public function atualizaTitulo(){
        
        
        $id = $this->input->post('id_editar');
        $aux = $this->estoquemodel->getTipoUnico($this->input->post('especie'));
        
        $aux_titulo = $this->financeiromodel->getTitulo($id);
        
        $aux_recorrente = explode('RC- ', $aux_titulo['titulos_numeroserie']);
        if(count($aux_recorrente) > 1){
            $aux_numser = str_replace('RC- ', '', $this->refatorarString($this->input->post('numser')));
            $numser = 'RC- ' . $aux_numser;
        } else {
            $numser = $this->refatorarString($this->input->post('numser'));
        }
        
        $new = array(
            'titulos_vencimento'    => $this->input->post('vencimento'),
            'titulos_numeroserie'   => $numser,
            'titulos_tipo'          => $this->input->post('especie'),
            'titulos_forneclin'     => $this->input->post('forneclin'),
            'titulos_atraso'        => "0",
            'titulos_valor'         => $this->reformatavalor($this->input->post('valor')),
            'titulos_juros'         => 0.00,
            'titulos_multa'         => 0.00,
            'titulos_desconto'      => 0.00,
            'titulos_valorpago'     => "0.0",
            'titulos_formapag'      => "",        
            'titulos_frota'         => null,
            'titulos_observacao'    => $this->refatorarString($this->input->post('obs')),
            'titulos_pagobs'        => "",
            'titulos_IO'            => $aux['tm_tipo'],
            'titulos_baixa'         => 0,
            'titulos_completo'      => 1,
            'titulos_numos'         => $this->input->post('numos'),
        );
        
        $this->financeiromodel->updateTitulos($id, $new);
        $this->session->set_userdata('edit_titulo', 1);
        
        redirect(base_url('movimentosfinanceiro'));
    }
    
    public function multiplos(){
        
        $this->acessorestrito('FINANCEIRO');
        
        $data= array(
            'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
        );
        
        $this->header('2.1', 'Baixa de Múltiplos Títulos', 'financeiro', 'Financeiro', 'Baixa de Múltiplos Títulos');
        $this->load->view('financeiro/multiplos', $data);
        $this->footer();
    }
    
    public function agenda($date){
        
        $this->acessorestrito('FINANCEIRO');
        
        $data= array(
            'frota'         => $this->frotamodel->getAll(),
            'titulos'       => $this->titulos(1, 0),
            'pendencias'    => $this->titulos(0, 0),
            'baixados'      => $this->fechadas(),
            'forcli'        => $this->fornecedorcliente(),
            'contas'        => $this->financeiromodel->getContas(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'pagina'        => 2,
            'data'          => $date,
            );

        $this->header('2.1', 'Controle de Movimento', 'financeiro', 'Financeiro', 'Controle de Movimento');
        $this->load->view('financeiro/controleMovimento', $data);
        $this->footer();
    }
    
    public function titulobaixa(){
        
        
        //$str = $this->reformatavalor($this->input->post('desconto')).":".$this->reformatavalor($this->input->post('acrescimo'));
        $tm = $this->financeiromodel->getTM($this->input->post('especie'));
        
        $new = array(
            'titulos_vencimento'    => $this->input->post('vencimento'),
            'titulos_numeroserie'   => "BM - ".$this->refatorarString($this->input->post('numser')),
            'titulos_forneclin'     => $this->input->post('forneclin'),
            'titulos_tipo'          => $this->input->post('especie'),
            'titulos_atraso'        => 0,
            'titulos_valor'         => $this->reformatavalor($this->input->post('valor')),
            'titulos_juros'         => 0.00,
            'titulos_multa'         => 0.00,
            'titulos_desconto'      => 0.00,
            'titulos_valorpago'     => (float)$this->reformatavalor($this->input->post('valor')),
            'titulos_formapag'      => $this->input->post('forma'),
            'titulos_frota'         => $this->input->post('frotas'),
            'titulos_rateio'        => $this->input->post('valoresFrota'),
            'titulos_observacao'    => $this->refatorarString($this->input->post('conTitulo') . $this->input->post('obs')),
            'titulos_IO'            => $tm['tm_tipo'],
            'titulos_completo'      => 1,
            'titulos_baixa'         => 1,
            'titulos_data_baixa'    => $this->input->post('baixa'),
            'titulos_user_baixa'    => $this->session->userdata('user_id'),
            'titulos_pagobs'        => '',
            'titulos_numos'         => $this->input->post('numos'),
        );
        
        $id = $this->financeiromodel->insertTitulo($new);
        
        $ex = explode('¬', $this->input->post('titulos'));
        for($i = 0; $i < count($ex); $i++){
            $ttl = $this->financeiromodel->getTitulo($ex[$i]);
            $ttl['titulos_id_pai']      = $id;
            $ttl['titulos_baixa']       = 1;
            $ttl['titulos_data_baixa']  = $new['titulos_data_baixa'];
            $ttl['titulos_user_baixa']  = $new['titulos_user_baixa'];
            $ttl['titulos_pagobs']      = $new['titulos_observacao'];
            $ttl['titulos_valorpago']   = $new['titulos_valorpago'];
            $ttl['titulos_formapag']    = $new['titulos_formapag'];
            
            $this->financeiromodel->updateTitulos($ex[$i], $ttl);
        }
        
        $this->session->set_userdata('mensagem_titulos', 1);
        
        redirect(base_url('movimentosfinanceiro'));
    }
    
    public function vertitulo(){
        
        $this->load->model('usuariosmodel');
        
        $id = $this->uri->segment(2);
        $pai = $this->financeiromodel->getTitulo($id);
        $filhos = $this->financeiromodel->getFilhosTitulo($id);
        
        $fc = substr($pai['titulos_forneclin'], 0, 1);
        $cpfcnpj = substr($pai['titulos_forneclin'], 2);
        $frota = $this->frotamodel->getRowById($pai['titulos_frota']);
        $user = $this->usuariosmodel->getByID($pai['titulos_user_baixa']);
        
        if($fc == "C"){
            $f_c = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
            $f_c = $f_c['cliente_nome'];
        }else if($fc == "F"){
            $f_c = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
            $f_c = $f_c['fornecedor_nome'];
        }else if($fc == 0 || $fc == '0'){
            $f_c = "NÃO POSSUI";
        }
        
        if($frota != null && $frota != ""){
            $frota = $frota['frota_placa']." | ".$frota['frota_codigo'];
        }else{
            $frota = "NÃO POSSUI";
        }
        
        $da = explode(':', $pai['titulos_pagobs']);
        
        $new = array(
                'id'            => $id,
                'vencimento'    => $pai['titulos_vencimento'],
                'nserie'        => $pai['titulos_numeroserie'],
                'forneclin'     => $f_c,
                'tipo'          => $this->tipos($pai['titulos_tipo'])." (".$pai['titulos_IO'].")",
                'valor'         => "R$ ".$this->Money($pai['titulos_valor']),
                'desconto'      => "R$ ".$this->Money($da[0]),
                'acrescimo'     => "R$ ".$this->Money($da[1]),
                'pago'          => "R$ ".$this->Money($pai['titulos_valorpago']),
                'forma'         => $pai['titulos_formapag'],
                'frota'         => $frota,
                'obs'           => $pai['titulos_observacao'],
                'data_baixa'    => $this->formatadata($pai['titulos_data_baixa']),
                'responsavel'   => $user['usuario_nome'],
            );
        
        $newF = [];
        $i = 0;
        foreach($filhos as $son){
            $fc_son = substr($son['titulos_forneclin'], 0, 1);
            $cpfcnpj_son = substr($son['titulos_forneclin'], 2);
            $frota_son = $this->frotamodel->getRowById($son['titulos_frota']);
            $user_son = $this->usuariosmodel->getByID($son['titulos_user_baixa']);
            
            if($fc_son == "C"){
                $f_c_son = $this->clientesmodel->getCPFCNPJ($cpfcnpj_son);
                $f_c_son = $f_c_son['cliente_nome'];
            }else if($fc == "F"){
                $f_c_son = $this->cadastrosmodel->getFornCnpj($cpfcnpj_son);
                $f_c_son = $f_c_son['fornecedor_nome'];
            }else if($fc_son == 0 || $fc_son == '0'){
                $f_c_son = "NÃO POSSUI";
            }
            
            if($frota_son != null && $frota_son != ""){
                $frota_son = $frota_son['frota_placa']." | ".$frota_son['frota_codigo'];
            }else{
                $frota_son = "NÃO POSSUI";
            }
            
            $newF[$i] = array(
                    'id'            => $son['titulos_id'],
                    'vencimento'    => $son['titulos_vencimento'],
                    'nserie'        => $son['titulos_numeroserie'],
                    'forneclin'     => $f_c_son,
                    'tipo'          => $this->tipos($son['titulos_tipo']),
                    'valor'         => "R$ ".$this->Money($son['titulos_valor']),
                    'juros'         => $son['titulos_juros']."%",
                    'multa'         => $son['titulos_multa']."%",
                    'desconto'      => $son['titulos_desconto']."%",
                    'pago'          => "R$ ".$this->Money($son['titulos_valorpago']),
                    'forma'         => $son['titulos_formapag'],
                    'frota'         => $frota_son,
                    'obs'           => $son['titulos_observacao'],
                    'movimento'     => $son['titulos_IO'],
                    'data_baixa'    => $this->formatadata($son['titulos_data_baixa']),
                    'responsavel'   => $user_son['usuario_nome'],
                    'pagobs'        => $son['titulos_pagobs'],
                );
            $i++;
        }
        
        $data = array(
                'pai'       => $new,
                'filhos'    => $newF,
            );
            
        $this->header('2.1', 'Visualização de Múltiplos Títulos', 'financeiro', 'Financeiro', 'Visualização de Múltiplos Títulos');
        $this->load->view('financeiro/vertitulo', $data);
        $this->footer();
    }
    
    public function excluirTitulo(){
        $this->load->database();
	    $this->load->model('financeiromodel');
        
        $confSenha = MD5($this->input->post('senhaConfirm'));
        $tituloID = $this->input->post('tituloId');
        $senha = $this->session->userdata('senha');
        
        if ($confSenha == $senha){
            $aux = $this->financeiromodel->delTitulo($tituloID);
            if($aux == 1){
                $this->session->set_userdata('mensagem_excluir_titulo_sucesso', 1);
            }else{
                $this->session->set_userdata('mensagem_excluir_titulo_erro', 1);
            }
        }else{
            $this->session->set_userdata('mensagem_excluir_titulo_senha', 1);
        }
        
        redirect('movimentosfinanceiro');
    }
    
    public function notasfiscais(){
	    
	    $this->acessorestrito("ESTOQUE");
	    $this->load->model('clientesmodel');
	    
	    $this->load->library("pagination");
        
        $filtro = mb_strtoupper($this->input->post('filtro'));
        if($this->uri->segment(3) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(4))); 
        } 
        
        $uri_segment = 5;
        $config = array();
        if($filtro){
            $config["base_url"] = base_url('financeiro/notasfiscais/f/' . $filtro . '/');
        } else {
            $config["base_url"] = base_url('financeiro/notasfiscais/n/');
            $uri_segment = 4;
        }
        
        $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
        $config["uri_segment"] = $uri_segment;
        
        $config["total_rows"] = $this->estoquemodel->get_countNotasFiltro($filtro);    
        $config["per_page"] = 10;
        
        $this->pagination->initialize($config);
        
        $movimentos    = $this->estoquemodel->getAllNotasFiltro($filtro, 10, $page);
        
	    $data = array(
	        'estoques'      => $this->produtosmodel->estoqueAll(),
	        'produtos'      => $this->produtosmodel->getAll(),
	        'servicos'      => $this->manutencaomodel->getAllServAtivos(),
	        'fornecedores'  => $this->fornecedoresmodel->getAll(),
	        'operacoes'     => $this->estoquemodel->getTiposAtivos(),
	        'chave'         => $this->chaveunica(),
	        'nota'          => intval($this->estoquemodel->getLastIdNota())+1,
	        'movimentos'    => $movimentos,
	    );
	    
	    $data['pag_links']      = $this->pagination->create_links();
        $data['filtro']         = $filtro;
        $data['qtd_itens_pag']  = $config["total_rows"];
        
	    $array = [];
	    $cont = 0;
	    
	    foreach($movimentos as $mv){
	        $tipo = $this->estoquemodel->getTipoUnico($mv['notafiscal_operacao']);
	        
	        $tomador_nome = "Não encontrado";
	        if($mv['notafiscal_cliente'] == 1){
	            $cliente = $this->clientesmodel->getCPFCNPJ($mv['notafiscal_fornecedor']);    
	            $tomador_nome = $cliente['cliente_nome'];
	        } else {
	            $fornecedor = $this->fornecedoresmodel->getByIdRowArray($mv['notafiscal_fornecedor']);
	            $tomador_nome = $fornecedor['fornecedor_nome'];
	        }
	        
	        
	        $array[$cont] = array(
	            'id'            => $mv['notafiscal_id'],
	            'emissao'       => date('d/m/Y', strtotime($mv['notafiscal_dtemissao'])),
	            'numeroserie'   => $mv['notafiscal_numero'].$mv['notafiscal_serie'],
	            'tipo'          => $tipo['tm_nome'],
	            'cliente'       => $tomador_nome,
	            'especie'       => $mv['notafiscal_especie'],
	            'valor'         => 'R$ ' . number_format($mv['notafiscal_valorfinal'],4,',','.'),
	        );
	        $cont++;
	    }
	    
	    if($this->session->userdata('erro')){
	        $data['erro'] = $this->session->userdata('erro');
	        $this->session->unset_userdata('erro');
	    } else {
	        $data['erro'] = null;
	    }
	    
	    $data['movimentos'] = $array;
	    
	    $this->header('2.2', 'Notas Fiscais', 'financeiro', 'Financeiro', 'Notas Fiscais');
	    $this->load->view('financeiro/notafiscal', $data);
	    $this->footer();
	}
	
	public function populaT(){
	    
	    
	    $filtro = array(
	        'tipo'          => $this->input->post('especie'),
	        'forneclin'     => $this->input->post('forneclin'),
	    );
	    
	    $itens = $this->financeiromodel->populaT($filtro);
	    
	    $titulos    = [];
	    $cont       = 0;
	    
        foreach($itens as $i){
            $aux_forneclin = explode('|', $i['titulos_forneclin']);
            if(count($aux_forneclin) == 2){
                if($aux_forneclin[0] == 'C'){
                    $c = $this->clientesmodel->getCPFCNPJ($aux_forneclin[1]);
                    $forneclin_nome = $c['cliente_nome'];
                } else {
                    $f = $this->fornecedoresmodel->getByIdRowArray($aux_forneclin[1]);
                    $forneclin_nome = $f['fornecedor_nome'];
                }
            } else {
                $forneclin_nome = 'Não foi encontrado';
            }

            $tm = $this->financeiromodel->getTM($i['titulos_tipo']);
        	            
            $titulos[$cont] = array(
                'id'            => $i['titulos_id'],
                'numeroserie'   => ucwords(mb_strtolower($i['titulos_numeroserie'])),
                'valor'         => 'R$ ' . number_format($i['titulos_valor'], 4,',','.'),
                'tipo'          => ucwords(mb_strtolower($tm['tm_nome'])), 
                'vencimento'    => date('d/m/Y', strtotime($i['titulos_vencimento'])),
                'fornecedor'    => ucwords(mb_strtolower($forneclin_nome)),
            );
            $cont++;
        }
	    
	    
	    echo json_encode($titulos);
	}
	
	public function chamarBaixa(){
	    
	    $id = $this->uri->segment('3');
	    
	    $data = array(
	        'titulo'        => $this->financeiromodel->getTitulo($id),  
	        'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
	    );
	    
	    $this->header('2.1', 'Baixa de Título', 'financeiro', 'Financeiro', 'Baixa de Título');
        $this->load->view('financeiro/baixa', $data);
        $this->footer();
	}
	
	public function verBaixa(){
	    
	    $id = $this->uri->segment('3');
	    
	    $aux = $this->financeiromodel->getTitulo($id);
	    
	    $user = $this->usuariosmodel->getByID($aux['titulos_user_baixa']);
	    
	    $aux_frota      = explode('¬', $aux['titulos_frota']);
	    $aux_rateio     = explode('¬', $aux['titulos_rateio']);
	    
	    $cont = 0;
	    $texto_rateio = "";
	    
	    foreach($aux_frota as $a){
	        $frota          = $this->frotamodel->getById($a);
	        if($cont == 0){
	            $texto_rateio   = $frota['frota_codigo'] . ' - ' . $frota['frota_placa'] .': R$ '. $aux_rateio[$cont];    
	        } else {
	            $texto_rateio   = $texto_rateio . '&#13;' . $frota['frota_codigo'] . ' - ' . $frota['frota_placa'] .': R$ '. $aux_rateio[$cont];    
	        }
	        
	        $cont++;
	    }
	    
	    $data = array(
	        'titulo'        => $aux,  
	        'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'usuario'       => $user,
            'rateio'        => $texto_rateio
	    );
	    
	    $this->header('2.1', 'Visualização de Baixa', 'financeiro', 'Financeiro', 'Visualização de Baixa');
        $this->load->view('financeiro/verbaixa', $data);
        $this->footer();
	}
	
	public function cadastroTitulo(){
	    
	    
	    $data = array(
	        'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
	    );
	    
	    $this->header('2.1', 'Lançamento de Título', 'financeiro', 'Financeiro', 'Lançamento de Título');
        $this->load->view('financeiro/titulo', $data);
        $this->footer();
	}
	
	public function pegarEspecies(){
	    
	    echo json_encode($this->financeiromodel->getTMByTipo($this->input->post('tipo')));
	}
	
	public function mostrarTitulo(){
	    
	    $id = $this->uri->segment('3');
	    
	    $aux = $this->financeiromodel->getTitulo($id);
	    
	    $user = $this->usuariosmodel->getByID($aux['titulos_user_baixa']);
	    
	    $aux_recorrent = explode('RC- ', $aux['titulos_numeroserie']);
	    
	    $recorrente = 0;
	    if(count($aux_recorrent) == 2){
	        $recorrente = 1;
	    } 
	    
	    $data = array(
	        'titulo'        => $aux,  
	        'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'usuario'       => $user,
            'recorrente'    => $recorrente,
	    );
	    
	    $this->header('2.1', 'Visualização de Título', 'financeiro', 'Financeiro', 'Visualização de Título');
        $this->load->view('financeiro/mostrartitulo', $data);
        $this->footer();
	}
	
	public function editarTitulo(){
	    
	    $id = $this->uri->segment('3');
	    
	    $aux = $this->financeiromodel->getTitulo($id);
	    
	    $user = $this->usuariosmodel->getByID($aux['titulos_user_baixa']);
	    
	    $data = array(
	        'titulo'        => $aux,  
	        'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'usuario'       => $user,
	    );
	    
	    $this->header('2.1', 'Edição de Título', 'financeiro', 'Financeiro', 'Edição de Título');
        $this->load->view('financeiro/editartitulo', $data);
        $this->footer();
	}
	
	public function cadastroNota(){
	    
	    
	    $data= array(
            'estoques'      => $this->produtosmodel->estoqueAll(),
            'produtos'      => $this->produtosmodel->getAll(),
            'servicos'      => $this->manutencaomodel->getAllServAtivos(),
            'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'contas'        => $this->financeiromodel->getContas(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'operacoes'     => $this->estoquemodel->getTiposAtivos(),
            'chave'         => $this->chaveunica(),
            'nota'          => intval($this->estoquemodel->getLastIdNota())+1,
	        'movimentos'    => $this->estoquemodel->getNotas(),
	        'fornecedores'  => $this->fornecedoresmodel->getAll(),
        );
        
        $this->header('2.1', 'Lançamento de Nota Fiscal', 'financeiro', 'Financeiro', 'Lançamento de Nota Fiscal');
        $this->load->view('financeiro/cadastronota', $data);
        $this->footer();
	}
	
	public function verNota(){
	    
	    $id = $this->uri->segment('3');
	    
	    $produtos = $servicos = [];
	    $cont = $totalgeral = 0;
	    
	    $estoque = $this->estoquemodel->getEstoquesByNota($id);
	    
	    foreach($estoque as $r){
	        $produto = $this->produtosmodel->getByIdRowArray($r['estoque_produto_id']);
	        
	        $produtos[$cont] = array(
	            'nome'      =>    ucwords(mb_strtolower($produto['produto_nome'])),
	            'valor'     =>    'R$ ' . number_format($r['estoque_valor'], 4, ',', '.'),
	            'qtd'       =>    $r['estoque_quantidade'],
	            'total'     =>    'R$ ' . number_format($r['estoque_valor'] * $r['estoque_quantidade'], 4, ',', '.'), 
	        );
	        
	        $totalgeral += $r['estoque_valor'] * $r['estoque_quantidade'];
	        $cont++;
	    }
	    
	    $servicos = $this->estoquemodel->getNotaServicos($id);
	    $cont = 0;
	    foreach($servicos as $s){
	        $servico = $this->manutencaomodel->getServById($s['ns_servico_id']);
	        
	        $servicos[$cont] = array(
	            'nome'      => ucwords(mb_strtolower($servico['servico_nome'])),
	            'valor'     => 'R$ ' . number_format($s['ns_preco'], 4, ',', '.'),
	            'qtd'       => $s['ns_qtd'],
	            'total'     => 'R$ ' . number_format($s['ns_qtd'] * $s['ns_preco'], 4, ',', '.'),
	        );
	        
	        $totalgeral += $s['ns_qtd'] * $s['ns_preco'];
	        $cont++;
	    }
	    
	    $nota = $this->estoquemodel->getNotaUnica($id);
	    
	    $data = array(
	        'nota'          => $nota, 
	        'tipo'          => $this->estoquemodel->getTipoUnico($nota['notafiscal_operacao']),
	        'produtos'      => $produtos,
	        'servicos'      => $servicos,
	        'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos2(),
            'totalgeral'    => 'R$ ' . number_format($totalgeral, 4, ',', '.'),
	    );
	    
	    $this->header('2.2', 'Visualização de Nota Fiscal', 'financeiro', 'Financeiro', 'Visualização de Nota Fiscal');
        $this->load->view('financeiro/vernota', $data);
        $this->footer();
	}
	
	
	public function editarNota(){
	    
	    $id = $this->uri->segment('3');
	    
	    $produtos = $servicos = [];
	    $cont = $totalgeral = 0;
	    
	    $estoque = $this->estoquemodel->getEstoquesByNota($id);
	    
	    foreach($estoque as $r){
	        $produto = $this->produtosmodel->getByIdRowArray($r['estoque_produto_id']);
	        
	        $produtos[$cont] = array(
	            'id'        =>    $produto['produto_id'],
	            'id_nota'   =>    $r['estoque_id'],
	            'nome'      =>    ucwords(mb_strtolower($produto['produto_nome'])),
	            'valor'     =>    number_format($r['estoque_valor'], 4, ',', '.'),
	            'qtd'       =>    $r['estoque_quantidade'],
	            'total'     =>    number_format($r['estoque_valor'] * $r['estoque_quantidade'], 4, ',', '.'), 
	        );
	        
	        $totalgeral += $r['estoque_valor'] * $r['estoque_quantidade'];
	        $cont++;
	    }
	    
	    $servicos = $this->estoquemodel->getNotaServicos($id);
	    $cont = 0;
	    foreach($servicos as $s){
	        $servico = $this->manutencaomodel->getServById($s['ns_servico_id']);
	        
	        $servicos[$cont] = array(
	            'id'        => $servico['servico_id'],
	            'id_nota'   => $s['ns_id'],
	            'nome'      => ucwords(mb_strtolower($servico['servico_nome'])),
	            'valor'     => number_format($s['ns_preco'], 4, ',', '.'),
	            'qtd'       => $s['ns_qtd'],
	            'total'     => number_format($s['ns_qtd'] * $s['ns_preco'], 4, ',', '.'),
	        );
	        
	        $totalgeral += $s['ns_qtd'] * $s['ns_preco'];
	        $cont++;
	    }
	    
	    $nota = $this->estoquemodel->getNotaUnica($id);
	    
	    $data = array(
	        'nota'          => $nota,  
	        'tipo'          => $this->estoquemodel->getTipoUnico($nota['notafiscal_operacao']),
	        'movprodutos'   => $produtos,
	        'movservicos'   => $servicos,
	        'frota'         => $this->frotamodel->getAll(),
            'forcli'        => $this->fornecedorcliente(),
            'tipos_e'       => $this->estoquemodel->getTipos(),
            'totalgeral'    => 'R$ ' . number_format($totalgeral, 4, ',', '.'),
            'produtos'      => $this->produtosmodel->getAll(),
            'servicos'      => $this->manutencaomodel->getAllServAtivos(),
	    );
	    
	    $this->session->set_userdata('uri_back', $_SERVER['HTTP_REFERER']);
	    
	    $this->header('2.2', 'Edição de Nota Fiscal', 'financeiro', 'Financeiro', 'Edição de Nota Fiscal');
        $this->load->view('financeiro/editarnota', $data);
        $this->footer();
	}
	
	public function updateBaixaData(){
	    $this->load->database();
	    $this->load->model('financeiromodel');
	    $this->financeiromodel->updateDataBaixado($this->input->post('idBaixa'), $this->input->post('novaData'));
	    
	    
	    echo json_encode('ok');
	}
	
}