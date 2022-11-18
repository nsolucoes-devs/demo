<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frota extends MY_Controller {
    
    public function index(){
        $this->header('4');
        $this->load->view('icon');
        $this->footer();
    }
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('documentosmodel');
        $this->load->model('ativosmodel');
	    $this->load->model('frotamodel');
	    $this->load->model('usuariosmodel');
	    $this->load->model('manutencaomodel');
	    $this->load->model('financeiromodel');
	    $this->load->model('estoquemodel');
	    $this->load->model('cadastrosmodel');
	    $this->load->model('clientesmodel');
    }
    
    //------------------- AUTOMOVEIS - START ----------------------------------
    
	public function cadastro(){
        
        if($this->uri->segment('2')){
            $id = $this->uri->segment('2');
            $this->header('4.1', 'EDIÇÃO DE VEÍCULO / MAQUINÁRIO', 'frota', 'Frota', 'Edição de veículo/maquinário');    
        } else {
            $id = null;
            $this->header('4.1', 'CADASTRO DE VEÍCULO / MAQUINÁRIO', 'frota', 'Frota', 'Cadastro de veículo/maquinário');  
        }

	   $data = array(
            'ativos'                => $this->ativosmodel->getAll(),
            'linhas'                => $this->frotamodel->getAllLinhasAtivos(),
            //'pneus'               => $this->frotamodel->getAllTiposPneusAtivos(),
            //'pneusIndividuais'    => $this->frotamodel->getAllPneusIndividuais(),
            //'pneusRegistros'      => $this->frotamodel->getAllRegistrosPneus(),
            'status'                => $this->frotamodel->getAllStatusAtivos(),
            'marcas'                => $this->frotamodel->getAllMarcasAtivos(),
            'modelos'               => $this->frotamodel->getAllModelosAtivos(),
            'tiposgabine'           => $this->frotamodel->getAllTiposGabineAtivos(),
            'tiposmunck'            => $this->frotamodel->getAllTiposMunckAtivos(),
            'tipos'                 => $this->frotamodel->getAllTiposAtivos(),
            'documentos_tipos'      => $this->documentosmodel->getAllTiposAtivos(),
            //'posicao'             => $this->frotamodel->posicao(),
            'edita'                 => $id == null ? null : $this->frotamodel->getByIdRowArray($id),
            'fixed'                 => null,
	    );
	    
	    if(!$id == null){
	       $data['fixed'] = $this->documentosmodel->getOldByFrota(6, $data['edita']['frota_codigo']);
	    }
	   
	    $this->load->view('frota/cadastro', $data);
	    $this->footer();
	}

    public function listagem(){
	    
	    $this->acessorestrito("FROTA");
	    
	    $frota = $this->frotamodel->getAll();
	    $arg = 0;
	    foreach($frota as $veiculo){
	        $modelo = $this->frotamodel->getModeloByIdRowArray($veiculo['frota_modelo_id']);
    	    $marca = $this->frotamodel->getMarcaByIdRowArray($modelo['frota_modelo_marca_id']);
            $linhas = $this->frotamodel->getLinhaByIdRowArray($veiculo['frota_linha_id']);
            $tiposgabine = $this->frotamodel->getTipoGabineByIdRowArray($veiculo['frota_tipogabine_id']);
            $tiposmunck = $this->frotamodel->getTipoMunckByIdRowArray($veiculo['frota_tipomunck_id']);
            $status = $this->frotamodel->getStatusById($veiculo['frota_status_id']);
            $nome = $marca['frota_marca_nome'] . $modelo['frota_modelo_nome'] . "(Cabine: " . $tiposgabine['frota_tipogabine_nome'] . " ; " . $tiposmunck['frota_tipomunck_nome'] . ")";
            $frota[$arg] = [
                'veiculo'   => $nome,
                'placa'     => $veiculo['frota_placa'],
                'frota'     => $veiculo['frota_codigo'],
                'id'        => $veiculo['frota_id'],
                'ativo_id'  => $veiculo['frota_ativo_id'],
            ];
            $arg ++;
	    }
	    
	    $data['frotas'] = $frota;
	    $data['situacoes'] = $this->frotamodel->getAllStatusAtivos();
	    $data['marcas'] = $this->frotamodel->getAllMarcasAtivos();
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $data['erro'] = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    } else {
	        $data['erro'] = null;
	    }

	    $this->header('4.1', 'LISTAGEM DE VEÍCULOS / MAQUINÁRIO', 'frota', 'Frota', 'Listagem de veículos/maquinário');
	    $this->load->view('frota/listagem', $data);
	    $this->footer();
	    
	}
	
	public function getDocumentosByFrota(){
	    
	    
	    $frota = $this->input->post('frota');
	    $docs = $this->documentosmodel->getDocsByFrota($frota);
	    
	    echo json_encode($docs);
	}
	
	//------------------- AUTOMOVEIS - END ------------------------------------
	
	//------------------- PNEUs - START ---------------------------------------
	
	public function tipos_pneus($erro = null){
	    
	    $this->acessorestrito("FROTA");
        
        $data = [
            'ativos' => $this->ativosmodel->getAll(),
            'pneus' => $this->frotamodel->getAllTiposPneus()
            ];
            
        if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('4.2.2', 'LISTAGEM DE TIPOS DE PNEUS', 'frota', 'Frota', 'Listagem de tipos de pneus');
	    $this->load->view('frota/frotapneus', $data);
	    $this->footer();
	}
	
	public function unidades_pneus($erro = null){
	    
	    $this->acessorestrito("FROTA");
        
        $data = [
            'marcas' => $this->frotamodel->getAllMarcas(),
            'modelos' => $this->frotamodel->getAllModelos(),
            'frota' => $this->frotamodel->getAll(),
            'ativos' => $this->ativosmodel->getAll(),
            'pneus' => $this->frotamodel->getAllPneusIndividuais(),
            'tipospneu' => $this->frotamodel->getAllTiposPneus(),
            'registrospneu' => $this->frotamodel->getAllRegistrosPneus(),
            'situacao' => $this->frotamodel->situacao(),
            'filter_tipo' => $this->frotamodel->getAllTiposPneusAtivos(),
            ];
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $erro = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    $this->header('5.3', 'Manutenção', 'Pneus');
	    $this->load->view('frota/frotapneusindividuais', $data);
	    $this->footer();
	}
	
	//------------------- PNEUS - END -----------------------------------------
	
	//------------------- MARCAS DE VEÍCULO - START ---------------------------
	
	public function marcas($erro = null){
	    
	    $this->acessorestrito("FROTA");
        
        $data = [
            'ativos' => $this->ativosmodel->getAll(),
            'marcas' => $this->frotamodel->getAllMarcas()
            ];
	    
	    if(array_key_exists('delete', $this->session->userdata())){
	        $erro = $this->session->userdata('delete');
	        $this->session->unset_userdata('delete');
	    }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('4.3', 'LISTAGEM DE MARCAS', 'frota', 'Frota', 'Listagem de marcas');
	    $this->load->view('frota/frotamarca', $data);
	    $this->footer();
	}
	
	//------------------- MARCAS DE VEÍCULO - END -----------------------------
	
	//------------------- MODELOS DE VEÍCULO - START - ------------------------
	
	public function modelos($erro = null){
	    
	    $this->acessorestrito("FROTA");
        
        $data = [
            'marcas' => $this->frotamodel->getAllMarcas(),
            'marcas_a' => $this->frotamodel->getAllMarcasAtivos(),
            'tipos' => $this->frotamodel->getAllTipos(),
            'tipos_a' => $this->frotamodel->getAllTiposAtivos(),
            'ativos' => $this->ativosmodel->getAll(),
            'modelos' => $this->frotamodel->getAllModelos()
            ];
            
        if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('4.4', 'LISTAGEM DE MODELOS', 'frota', 'Frota', 'Listagem de modelos');
	    $this->load->view('frota/frotamodelo', $data);
	    $this->footer();
	}
	
	//------------------- MODELOS DE VEÍCULO - END ----------------------------
	
	//------------------- TIPO DE AUTOMOVEL - START ---------------------------
	
	public function tipos_veiculo($erro = null){
	    
	    $this->acessorestrito("FROTA");
	    
        $data = [
            'ativos' => $this->ativosmodel->getAll(),
            'tipos' => $this->frotamodel->getAllTipos()
            ];
            
        if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('4.5', 'LISTAGEM DE TIPOS DE VEÍCULO', 'frota', 'Frota', 'Listagem de tipos de veículo');
	    $this->load->view('frota/frotatipo', $data);
	    $this->footer();
	}
	
	//------------------- TIPO DE AUTOMOVEL - END -----------------------------
	
	//------------------- TIPO DE CABINE - START ------------------------------
	
	public function tipos_cabine($erro = null){
	    
	    $this->acessorestrito("FROTA");
        
        $data = [
            'ativos' => $this->ativosmodel->getAll(),
            'tiposgabine' => $this->frotamodel->getAllTiposGabine()
            ];
	    
	    if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('4.7', 'LISTAGEM DE TIPOS DE CABINE', 'frota', 'Frota', 'Listagem de tipos de cabine');
	    $this->load->view('frota/frotatipogabine', $data);
	    $this->footer();
	}
	
	//------------------- TIPO DE GABINE - END --------------------------------
	
	//------------------- TIPO DE MUNCK - START -------------------------------
	
	public function tipos_munck($erro = null){
	    
	    $this->acessorestrito("FROTA");
        
        $data = [
            'ativos' => $this->ativosmodel->getAll(),
            'tiposmunck' => $this->frotamodel->getAllTiposMunck()
            ];
            
        if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('4.6', 'LISTAGEM DE TIPOS DE MUNCK', 'frota', 'Frota', 'Listagem de tipos de munck');
	    $this->load->view('frota/frotatipomunck', $data);
	    $this->footer();
	}
	
	//------------------- TIPO DE MUNCK - END ---------------------------------
	
	//------------------- STATUS DE AUTOMOVEL - START -------------------------
	
	public function status($erro = null){
	    
	    $this->acessorestrito("FROTA");
        
        $data = [
            'ativos' => $this->ativosmodel->getAll(),
            'status' => $this->frotamodel->getAllStatus()
            ];
            
        if(array_key_exists('delete', $this->session->userdata())){
            $erro = $this->session->userdata('delete');
            $this->session->unset_userdata('delete');
        }
	    
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    
	    $this->header('4.8', 'LISTAGEM DE STATUS DE VEÍCULO', 'frota', 'Frota', 'Listagem de status de veículo');
	    $this->load->view('frota/frotastatus', $data);
	    $this->footer();
	}
	
	//------------------- STATUS DE AUTOMOVEL - END ---------------------------
	
	//------------------- GETTERS - START -------------------------------------
	
	
	public function getFrotaById(){
	    
	    
	    $id = $this->input->post('frota_id');
	    $frota = $this->frotamodel->getById($id);

	    echo json_encode($frota);
	}
	
	public function getFrotaByPlaca(){
	    
	    
	    $placa = $this->limpa($this->input->post('frota_placa'));
	    $frota = $this->frotamodel->getByPlaca($placa);
	    if($frota['frota_placa'] != ""){
            $frota['val'] = 1;
	    }else{
	        $frota['val'] = 0;
	    }
        
	    echo json_encode($frota);
	}
	
	public function getTipoPneuById(){
	    
	    
	    $id = $this->input->post('frota_pneu_id');
	    $frota = $this->frotamodel->getTipoPneuById($id);
	    
	    echo json_encode($frota);
	}
	
	public function getPneuIndividualById(){
	    
	    
	    $id = $this->input->post('pneus_individual_id');
	    $frota = $this->frotamodel->getPneuIndividualById($id);
	    
	    echo json_encode($frota);
	}
	
	public function getMarcaById(){
	    
	    
	    $id = $this->input->post('frota_marca_id');
	    $frota = $this->frotamodel->getMarcaById($id);
	    
	    echo json_encode($frota);
	}
	
	public function getModeloById(){
	    
	    
	    $id = $this->input->post('frota_modelo_id');
	    $frota = $this->frotamodel->getModeloById($id);
	    
	    echo json_encode($frota);
	}
	
	public function getTipoFrotaById(){
	    
	    
	    $id = $this->input->post('frota_tipo_id');
	    $frota = $this->frotamodel->getTipoById($id);
	    
	    echo json_encode($frota);
	}
	
	public function getTipoGabineById(){
	    
	    
	    $id = $this->input->post('frota_tipogabine_id');
	    $frota = $this->frotamodel->getTipoGabineById($id);
	    
	    echo json_encode($frota);
	}
	
	public function getTipoMunckById(){
	    
	    
	    $id = $this->input->post('frota_tipomunck_id');
	    $frota = $this->frotamodel->getTipoMunckByID($id);
	    
	    echo json_encode($frota);
	}
	
	public function getStatusFrotaById(){
	    
	    
	    $id = $this->input->post('frota_status_id');
	    $frota = $this->frotamodel->getStatusByID($id);
	    
	    echo json_encode($frota);
	}
	
	//------------------- GETTERS - END ---------------------------------------
	
	
	//------------------- FUNCTIONS -------------------------------------------
	
	
	//----------- FROTA
	
    public function insertFrota(){
        
        $this->load->library('moduloupload');

        $data = [
                'frota_placa'           => $this->limpa($this->refatorarString($this->input->post('placa'))),
                'frota_codigo'          => $this->input->post('codigo'),
                'frota_chassi'          => $this->input->post('chassi'),
                'frota_modelo_id'       => $this->input->post('modelo'),
                'frota_ano'             => $this->input->post('ano'),
                'frota_pneu_id'         => $this->input->post('pneu'),
                'frota_tara'            => str_replace(',', '.', $this->input->post('tara')),
                'frota_lotacao'         => str_replace(',', '.', $this->input->post('lotacao')),
                'frota_pbt'             => str_replace(',', '.', $this->input->post('pbt')),
                'frota_linha_id'        => $this->input->post('linha'),
                'frota_preco_compra'    => str_replace(',', '.', str_replace('.', '', $this->input->post('preco_compra'))),
                'frota_cambio'          => $this->refatorarString($this->input->post('cambio')),
                'frota_cor'             => $this->refatorarString($this->input->post('cor')),
                'frota_renavam'         => $this->limpa($this->input->post('renavam')),
                'frota_motor'           => $this->input->post('motor'),
                'frota_tipomunck_id'    => $this->input->post('tipomunck'),
                'frota_tipogabine_id'   => $this->input->post('tipogabine'),
                'frota_tipogabine_id'   => $this->input->post('suplemento'),
                'frota_km'              => $this->limpa($this->input->post('km')),
                'frota_eixo'            => $this->input->post('eixo'),
            ];
        
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
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            $oldDocs = $this->documentosmodel->getDocsByFrota($data['frota_codigo']);
            
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
        }
        
        $this->moduloupload->uploadByIdArray($newArray, null, $documentos_tipos, $data['frota_codigo']);

        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            $update_id = $this->input->post('id');
            
            $data['frota_id'] = $update_id;
            $data['frota_status_id'] = $this->input->post('status');
            $data['frota_ativo_id'] = $this->input->post('ativo');
            
            if($this->input->post('ismunck') == null || strlen($this->input->post('ismunck')) == 0){
                $data['frota_tipomunck_id'] = null;
            }
            
            $id = $this->frotamodel->update($data, $update_id);
        }else{
            $data['frota_ativo_id'] = 1;
            $data['frota_status_id'] = 1;
            
            if($this->input->post('ismunck') == null || strlen($this->input->post('ismunck')) == 0){
                $data['frota_tipomunck_id'] = null;
            }
            
            $id = $this->frotamodel->insert($data);
        }
        
        redirect('veiculos', 'refresh');
        
    }
    
    public function deleteFrota(){
        
        
        $id = $this->input->post('idfrota');
        $sen = MD5($this->input->post('senha'));
        
        $frota = $this->frotamodel->getByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $frota['frota_ativo_id'] = 2;
            
            $this->frotamodel->update($frota, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('veiculos'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('veiculos'), 'refresh');
        }
    }
    
    public function verFrota(){
        
        
        $id = $this->uri->segment(2);
        $frota = $this->frotamodel->getByIdRowArray($id);
        if($frota['frota_tipomunck_id'] != null){
            $munck = $this->frotamodel->getTipoMunckByIdRowArray($frota['frota_tipomunck_id']);
            $tm = $munck['frota_tipomunck_nome']."- Modelo: ".$munck['frota_tipomunck_modelo'];
        }else{
            $tm = "Não possui";
        }
        
        $manutencoes = $this->manutencaomodel->getByFrota($id);
        $newM = [];
        $m = 0;
        $totalGeral = 0;
        foreach($manutencoes as $manu){
            $manu['os_situacao'] = $this->manutencaomodel->getUnicaSituacao($manu['os_situacao_id']);
            $manu['os_data_abertura'] = date('d/m/Y', strtotime($manu['os_data_abertura']));
            if($manu['os_data_fechamento'] != null && $manu['os_data_fechamento'] != ""){
                $manu['os_data_fechamento'] = date('d/m/Y', strtotime($manu['os_data_fechamento']));
            }
            $andamentos = $this->manutencaomodel->getAndamentosByManu($manu['os_id']);
            $total = 0;
            foreach($andamentos as $and){
                $itens = $this->manutencaomodel->getItensAndamento($and['andamento_id']);
                foreach($itens as $it){
                    $aux = (int)$it['ai_qtd'] * (float)$it['ai_vlr_un'];
                    $total = (float)$total + (float)$aux;
                }
            }
            $manu['total'] = $total;
            $totalGeral = (float)$totalGeral + (float)$total;
            $newM[$m] = $manu;
            $m++;
        }
        
        $titulos = $this->financeiromodel->getTitulosByFrotaSaida($id);
        $newT = [];
        $t = 0;
        
        foreach($titulos as $tit){
            $aux_frota  = explode('¬', $tit['titulos_frota']);
            $aux_rateio = explode('¬', $tit['titulos_rateio']);
            
            $valor = 0;
            
            for($i = 0; $i < count($aux_frota); $i++){
                if($aux_frota[$i] == $id){
                    if($aux_rateio[$i] != null){
                        $valor = $aux_rateio[$i];    
                    }
                }
            }
            
            $forneclin = 'Tomador não encontrado';
            
        	$tip = substr($tit['titulos_forneclin'], 0, 1);
        	$cpfcnpj = substr($tit['titulos_forneclin'], 2);
        	if($tip == "F"){
        		$f = $this->cadastrosmodel->getFornCnpj($cpfcnpj);
        		$forneclin = $f['fornecedor_nome'];
        	}else if($tip == "C"){
        		$c = $this->clientesmodel->getCPFCNPJ($cpfcnpj);
        		$forneclin = $c['cliente_nome'];
        	}

            $newT[$t] = array(
                'titulos_id'            => $tit['titulos_id'],
                'titulos_numeroserie'   => $tit['titulos_numeroserie'],
                'titulos_numos'         => $tit['titulos_numos'],
                'titulos_tipo'          => $this->estoquemodel->getTipoUnico($tit['titulos_tipo']),
                'titulos_vencimento'    => date('d/m/Y', strtotime($tit['titulos_vencimento'])),
                'titulos_forneclin'     => $forneclin,
                'titulos_valor'         => 'R$ ' . $valor,
                'titulos_baixa'         => $tit['titulos_baixa'],
            );
            $totalGeral = (float)$totalGeral + (float)$valor;
            $t++;
        }

        $data = array(
            'frota'             => $frota,
            'modelo'            => $this->frotamodel->getModeloByIdRowArray($frota['frota_modelo_id']),
            'linha'             => $this->frotamodel->getLinhaByIdRowArray($frota['frota_linha_id']),
            'status'            => $this->frotamodel->getStatusByIdRowArray($frota['frota_status_id']),
            'cabine'            => $this->frotamodel->getTipoGabineByIdRowArray($frota['frota_tipogabine_id']),
            'munck'             => $tm,
            'docs'              => $this->documentosmodel->getDocsByFrota($frota['frota_codigo']),
            'docs_tipos'        => $this->documentosmodel->getAllTipos(),
            'manutencoes'       => $newM,
            'titulos'           => $newT,
            'totalGeral'        => number_format($totalGeral, 4, ',', '.'),
        );
            
        $data['marca'] = $this->frotamodel->getMarcaByIdRowArray($data['modelo']['frota_modelo_marca_id']);
        if($frota['frota_ativo_id'] == 1){
            $data['frota']['frota_ativo_id'] == "Ativo";
        }else if($frota['frota_ativo_id'] == 2){
            $data['frota']['frota_ativo_id'] == "Inativo";
        }

        $this->header('4', 'VISUALIZAÇÃO DE VEÍCULO / MAQUINÁRIO', 'frota', 'Frota', 'Visualização de veículo / maquinário');
	    $this->load->view('frota/verfrota', $data);
	    $this->footer();
    }
    
    function ativarVeiculo(){
	    
	    
	    $id = $this->input->post('veiculo_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $frota = $this->frotamodel->getRowById($id);
    	    $frota['frota_ativo_id'] = 1;
    	    $this->frotamodel->update($frota, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('veiculos'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('veiculos'));
        }
	}
    
    //----------- FROTA - END
    
    //----------- PNEUS - START
    
    public function insertTipoPneu(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //EDIÇÃO
            $update_id = $this->input->post('id_e');
            
            $data['frota_pneu_marca'] = $this->refatorarString($this->input->post('marca_e'));
            $data['frota_pneu_aro'] = $this->input->post('aro_e');
            $data['frota_pneu_banda'] = $this->refatorarString($this->input->post('banda_e'));
            $data['frota_pneu_quantidade'] = $this->input->post('quantidade_e');
            
            $data['frota_pneu_ativo_id'] = $this->input->post('ativo_e');
            
            $this->frotamodel->updateTipoPneu($data, $update_id);
        }else{
            //INSERÇÃO
            $data['frota_pneu_marca'] = $this->refatorarString($this->input->post('marca_c'));
            $data['frota_pneu_aro'] = $this->input->post('aro_c');
            $data['frota_pneu_banda'] = $this->refatorarString($this->input->post('banda_c'));
            $data['frota_pneu_quantidade'] = $this->input->post('quantidade_c');
            
            $data['frota_pneu_ativo_id'] = 1;
            
            $this->frotamodel->insertTipoPneu($data);
        }
        
        redirect('tipospneu', 'refresh');
    }
    
    public function deleteTipoPneu(){
        
        
        $id = $this->input->post('idpneu');
        $sen = MD5($this->input->post('senha'));
        
        $pneu = $this->frotamodel->getTipoPneuByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $pneu['frota_pneu_ativo_id'] = 2;
            
            $this->frotamodel->updateTipoPneu($pneu, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect('tipospneu', 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('tipospneu'), 'refresh');
        }
    }

    //----------- PNEUS - END
    
    //----------- PNEUS INDIVIDUAIS - START
    
    public function insertPneuIndividual(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //UPDATE

            $data = array(
                'pneus_individual_marcacao'     => $this->input->post('marcacao_e'),
                'pneus_individual_tipopneu_id'  => $this->input->post('tipopneu_e'),
                'pneus_individual_ativo_id'     => $this->input->post('ativo_e'),
                'pneus_individual_marcacao'     => $this->input->post('individual_marcacao'),
                'pneus_individual_matricula'    => $this->input->post('individual_matricula'),
                'pneus_individual_dot'          => $this->input->post('individual_dot'),
                'pneus_individual_data'         => $this->input->post('individual_data'),
                'pneus_individual_frota_id'     => $this->input->post('frota_e'),
                'pneus_individual_vida'         => $this->input->post('individual_vida'),
                );
            
            $this->frotamodel->updatePneuIndividual($data, $this->input->post('id_e'));
        }else{
            //INSERT

            $data = [
                'pneus_individual_tipopneu_id'  => $this->input->post('individual_tipopneu'),
                'pneus_individual_marcacao'     => $this->input->post('individual_marcacao'),
                'pneus_individual_matricula'    => $this->input->post('individual_matricula'),
                'pneus_individual_dot'          => $this->input->post('individual_dot'),
                'pneus_individual_data'         => $this->input->post('individual_data'),
                'pneus_individual_vida'         => $this->input->post('individual_vida'),
                ];
        
            $this->frotamodel->insertPneuIndividual($data);
        }
        
        redirect('pneus', 'refresh');
    }
    
    public function deletePneuIndividual(){
        
        
        $id = $this->input->post('idpneu');
        $sen = MD5($this->input->post('senha'));
        
        $pneu = $this->frotamodel->getPneuIndividualByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $pneu['pneus_individual_ativo_id'] = 2;
            
            $this->frotamodel->updatePneuIndividual($pneu, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('pneus'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('pneus'), 'refresh');
        }
    }
    
    public function desvincularPneuIndividual(){
        
        
        $edicao_id = $this->input->post('edicao_id_save');
        $id = $this->input->post('idpneu');
        $sen = MD5($this->input->post('senha'));
        
        $pneu = $this->frotamodel->getPneuIndividualByIdRowArray($id);
        
        if($sen == $this->session->userdata('senha')){
            $pneu['pneus_individual_frota_id'] = 0;
            
            $this->frotamodel->updatePneuIndividual($pneu, $id);
        }
        redirect('frota/cadastro?edicao_id=' . $edicao_id, 'refresh');
    }
    
    public function desvincular(){
        
        
        $id = $this->uri->segment(3);
        $pneu = $this->frotamodel->getPneuIndividualByIdRowArray($id);
        $anchor = $pneu['pneus_individual_frota_id'];
        $pneu['pneus_individual_frota_id'] = 0;
        $this->frotamodel->updatePneuIndividual($pneu, $id);
        
        redirect(base_url('frota/verFrota/').$anchor);
    }
    
    public function desvincularDinamicamente(){
        
        
        $id = $this->input->post('id');
        $sen = MD5($this->input->post('senha'));
        if($sen == $this->session->userdata('senha')){
            $pneu = $this->frotamodel->getPneuIndividualByIdRowArray($id);
            $pneu['pneus_individual_frota_id'] = 0;
            $this->frotamodel->updatePneuIndividual($pneu, $id);
            
            echo 1;
        }else{
            echo 2;
        }
    }
    
    public function refreshPneus(){
        
        
        $id = $this->input->post('id');
        $pneus = $this->frotamodel->getAllTiposPneusAtivos();
        $pneusIndividuais = $this->frotamodel->getAllPneusIndividuais();
        $pneusRegistros = $this->frotamodel->getAllRegistrosPneus();
        
        $corresponding = 0;
        $retorno = "";
        foreach($pneusIndividuais as $value){
            if($value['pneus_individual_frota_id'] == $id){
                $corresponding++;
            }
        }
        if(sizeof($pneusIndividuais) > 0 && $corresponding > 0){
            $retorno .= 
            '<table class="table table-hover table-bordered">
                <thead>
                    <th width="6%">ID</th>
                    <th width="12%">Marcação</th>
                    <th width="35%">Tipo de Pneu</th>
                    <th width="35%">Último Registro</th>
                    <th width="6%">Registros</th>
                    <th width="6%">Desvincular</th>
                </thead>
                <tbody>';
            foreach($pneusIndividuais as $pi){ 
                if($pi['pneus_individual_frota_id'] == $id){
                    $retorno .= 
                        '<tr>
                            <td>'.$pi['pneus_individual_id'].'</td>
                            <td>'.$pi['pneus_individual_marcacao'].'</td>
                            <td>';
                    foreach($pneus as $tipopneu){
                        if($tipopneu['frota_pneu_id'] == $pi['pneus_individual_tipopneu_id']){
                            $retorno .= $tipopneu['frota_pneu_marca'] . ' | Aro: ' . $tipopneu['frota_pneu_aro'] . ' | Banda: ' . $tipopneu['frota_pneu_banda'];
                        }
                    }
                    $retorno .=
                            '</td>
                            <td>';
                    if(sizeof($pneusRegistros) > 0){
                        $lastIndex = -1;
                        foreach($pneusRegistros as $key => $value){
                            if($value['pneus_registro_individual_id'] == $pi['pneus_individual_id']){
                                $lastIndex = $key;
                            }
                        }
                        if($lastIndex >= 0){
                            $retorno .=  date("d/m/Y",strtotime($pneusRegistros[$lastIndex]['pneus_registro_data'])) . ' - ' . $pneusRegistros[$lastIndex]['pneus_registro_situacao'];
                            if(strlen($pneusRegistros[$lastIndex]['pneus_registro_observacao']) > 0){
                                $retorno .= ': ' . $pneusRegistros[$lastIndex]['pneus_registro_observacao'];
                            }
                        }
                        else{
                            $retorno .= " -- ";
                        }
                    }else{
                        $retorno .= " -- ";
                    }
                    $retorno .=
                            '</td>
                            <td>
                                <a class="btn btn-info" style="display: none" onclick="registro(\''.$pi['pneus_individual_id'].'\')"><i class="fab fa-wpforms"></i></a>
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#modalDesvincular" class="btn btn-danger" onclick="desvincular(\''.$pi['pneus_individual_id'].'\')"><i class="fas fa-unlink"></i></a>
                            </td>
                        </tr>';
                }
            } 

            $retorno .=
                '</tbody>
            </table>';
        }else if(sizeof($pneusIndividuais) == 0){
            $retorno .=
            '<div class="text-center" style="width:100%">
                <br>
                <h5>Ainda não existem pneus cadastrados.</h5>
                <br><br>
            </div>';
        }else if($corresponding == 0){
            $retorno .=
            '<div class="text-center" style="width:100%">
                <br>
                <h5>Não existem pneus vinculados à este veículo.</h5>
                <br><br>
            </div>';
        }else{
            $retorno .=
            '<div class="text-center" style="width:100%">
                <br>
                <h5>Ocorreu um erro.</h5>
                <br><br>
            </div>';
        }
        
        echo $retorno;
    }
    
    public function getRegistroDinamicamente(){
        
        
        $id = $this->input->post('id');
        $registros = $this->frotamodel->getRegistrosPneu($id);
        
        $retorno = 
        "<table class='table table-hover table-bordered'>
            <thead>
                <th style='width: 10%'>Data</th>
                <th style='width: 30%'>Sitação</th>
                <th style='width: 60%'>Observação</th>
            </thead>";
    }
    
    function ativarPneu(){
	    
	    
	    $id = $this->input->post('pneu_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $pneu = $this->frotamodel->getPneuById($id);
    	    $pneu['pneus_individual_ativo_id'] = 1;
    	    $this->frotamodel->updatePneuIndividual($pneu, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('pneus'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('pneus'));
        }
	}
    
    //----------- PNEUS INDIVIDUAIS - END
    
    //----------- REGISTROS PNEUS - START
    
   public function insertRegistroPneu(){
        
        
        $situacao = $this->refatorarString($this->input->post('registro_situacao'));
        $observacao = $this->refatorarString($this->input->post('registro_observacao'));
        //DATA SETADA AUTOMATICAMENTE
        $pneuindividual_id = $this->input->post('registro_individual_id');
        
        $data = [
                'pneus_registro_situacao' => $situacao,
                'pneus_registro_observacao' => $observacao,
                'pneus_registro_individual_id' => $pneuindividual_id
            ];
        
        $this->frotamodel->insertRegistroPneu($data);
        
        redirect('pneus', 'refresh');
    }
    
    //----------- REGISTROS PNEUS - END
    
    //----------- MARCAS - START
    
   public function insertMarca(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //EDIÇÃO
            $update_id = $this->input->post('id_e');
            $data['frota_marca_ativo_id'] = $this->input->post('ativo_e');
            $data['frota_marca_nome'] = $this->refatorarString($this->input->post('nome_e'));
            $this->frotamodel->updateMarca($data, $update_id);
        }else{
            //INSERÇÃO
            $data['frota_marca_ativo_id'] = 1;
            $data['frota_marca_nome'] = $this->refatorarString($this->input->post('nome_c'));
            $this->frotamodel->insertMarca($data);
        }
        
        redirect('marcasveiculo', 'refresh');
    }
    
    public function deleteMarca(){
        
        
        $id = $this->input->post('idFrotaMarca');
        $sen = MD5($this->input->post('senha'));
        
        $marca = $this->frotamodel->getMarcaByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $marca['frota_marca_ativo_id'] = 2;
            
            $this->frotamodel->updateMarca($marca, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect('marcasveiculo', 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('marcasveiculo'), 'refresh');
        }
    }
    
    function ativarMarca(){
	    
	    
	    $id = $this->input->post('marca_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $marca = $this->frotamodel->getMarcaByIdRowArray($id);
    	    $marca['frota_marca_ativo_id'] = 1;
    	    $this->frotamodel->updateMarca($marca, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('marcasveiculo'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('marcasveiculo'));
        }
	}
    
    //----------- MARCAS - END
    
    //----------- MODELOS - START
    
    public function insertModelo(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //EDIÇÃO
            $update_id = $this->input->post('id_e');
            $data['frota_modelo_ativo_id'] = $this->input->post('ativo_e');
            $data['frota_modelo_marca_id'] = $this->input->post('marca_e');
            $data['frota_modelo_tipo_id'] = $this->input->post('tipo_e');
            $data['frota_modelo_nome'] = $this->refatorarString($this->input->post('nome_e'));
            $this->frotamodel->updateModelo($data, $update_id);
        }else{
            //INSERÇÃO
            $data['frota_modelo_ativo_id'] = 1;
            $data['frota_modelo_marca_id'] = $this->input->post('marca_c');
            $data['frota_modelo_tipo_id'] = $this->input->post('tipo_c');
            $data['frota_modelo_nome'] = $this->refatorarString($this->input->post('nome_c'));
            $this->frotamodel->insertModelo($data);
        }
        
        redirect('modelos', 'refresh');
    }
    
    public function deleteModelo(){
        
        
        $id = $this->input->post('idmodelo');
        $sen = MD5($this->input->post('senha'));
        
        $modelo = $this->frotamodel->getModeloByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $modelo['frota_modelo_ativo_id'] = 2;
            
            $this->frotamodel->updateModelo($modelo, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('modelos'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('modelos'), 'refresh');
        }
    }
    
    function ativarModelo(){
	    
	    
	    $id = $this->input->post('modelo_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $modelo = $this->frotamodel->getModeloByIdRowArray($id);
    	    $modelo['frota_modelo_ativo_id'] = 1;
    	    $this->frotamodel->updateModelo($modelo, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('modelos'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('modelos'));
        }
	}
    
    //----------- MODELOS - END
    
    //----------- TIPO - START
    
    public function insertTipoFrota(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //EDIÇÃO
            $update_id = $this->input->post('id_e');
            $data['frota_tipo_ativo_id'] = $this->input->post('ativo_e');
            $data['frota_tipo_nome'] = $this->refatorarString($this->input->post('nome_e'));
            $this->frotamodel->updateTipo($data, $update_id);
        }else{
            //INSERÇÃO
            $data['frota_tipo_ativo_id'] = 1;
            $data['frota_tipo_nome'] = $this->refatorarString($this->input->post('nome_c'));
            $this->frotamodel->insertTipo($data);
        }
        
        redirect('tiposveiculo', 'refresh');
    }
    
    public function deleteTipoFrota(){
        
        
        $id = $this->input->post('idtipofrota');
        $sen = MD5($this->input->post('senha'));
        
        $tipo = $this->frotamodel->getTipoByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $tipo['frota_tipo_ativo_id'] = 2;
            
            $this->frotamodel->updateTipo($tipo, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('tiposveiculo'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('tiposveiculo'), 'refresh');
        }
    }
    
    function ativarTipoPneu(){
	    
	    
	    $id = $this->input->post('tipopneu_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $pneu = $this->frotamodel->getTipoPneuByIdRowArray($id);
    	    $pneu['frota_pneu_ativo_id'] = 1;
    	    $this->frotamodel->updateTipoPneu($pneu, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('tipospneu'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('tipospneu'));
        }
	}
	
	function ativarTipoVeiculo(){
	    
	    
	    $id = $this->input->post('tipoveiculo_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $tipov= $this->frotamodel->getTipoByIdRowArray($id);
    	    $tipov['frota_tipo_ativo_id'] = 1;
    	    $this->frotamodel->updateTipo($tipov, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('tiposveiculo'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('tiposveiculo'));
        }
	}
    
    //----------- TIPO - END
    
    //----------- TIPO GABINE - START
    
    public function insertTipoGabine(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //EDIÇÃO
            $update_id = $this->input->post('id_e');
            $data = array(
            'frota_tipogabine_ativo_id' => $this->input->post('ativo_e'),
            'frota_tipogabine_nome' => $this->refatorarString($this->input->post('nome_e')),
            'frota_tipogabine_suplemento' => $this->input->post('suplemento'),
            );
            
            $this->frotamodel->updateTipoGabine($data, $update_id);
        }else{
            //INSERÇÃO
            $data = array(
                'frota_tipogabine_ativo_id' => 1,
                'frota_tipogabine_nome' => $this->refatorarString($this->input->post('nome_c')),
                'frota_tipogabine_suplemento' => $this->input->post('suplemento'),
            );
            $this->frotamodel->insertTipoGabine($data);
        }
        
        redirect(base_url('tiposcabine'), 'refresh');
    }
    
    public function deleteTipoGabine(){
        
        
        $id = $this->input->post('idtipogabine');
        $sen = MD5($this->input->post('senha'));
        
        $tipo = $this->frotamodel->getTipoGabineByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $tipo['frota_tipogabine_ativo_id'] = 2;
            
            $this->frotamodel->updateTipoGabine($tipo, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('tiposcabine'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('tiposcabine'), 'refresh');
        }
    }
    
    function ativarCabine(){
	    
	    
	    $id = $this->input->post('cabine_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $gabine= $this->frotamodel->getTipoGabineByIdRowArray($id);
    	    $gabine['frota_tipogabine_ativo_id'] = 1;
    	    $this->frotamodel->updateTipoGabine($gabine, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('tiposcabine'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('tiposcabine'));
        }
	}
    
    //----------- TIPO GABINE - END
    
    //----------- TIPO MUNCK - START
    
    public function insertTipoMunck(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //EDIÇÃO
            $update_id = $this->input->post('id_e');
            $data['frota_tipomunck_ativo_id'] = $this->input->post('ativo_e');
            $data['frota_tipomunck_nome'] = $this->refatorarString($this->input->post('nome_e'));
            $data['frota_tipomunck_ano'] = $this->input->post('ano_e');
            $data['frota_tipomunck_modelo'] = $this->refatorarString($this->input->post('modelo_e'));
            $this->frotamodel->updateTipoMunck($data, $update_id);
        }else{
            //INSERÇÃO
            $data['frota_tipomunck_ativo_id'] = 1;
            $data['frota_tipomunck_nome'] = $this->refatorarString($this->input->post('nome_c'));
            $data['frota_tipomunck_ano'] = $this->input->post('ano_c');
            $data['frota_tipomunck_modelo'] = $this->refatorarString($this->input->post('modelo_c'));
            $this->frotamodel->insertTipoMunck($data);
        }
        
        redirect('tiposmunck', 'refresh');
    }
    
    public function deleteTipoMunck(){
        
        
        $id = $this->input->post('idtipomunck');
        $sen = MD5($this->input->post('senha'));
        
        $tipo = $this->frotamodel->getTipoMunckByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $tipo['frota_tipomunck_ativo_id'] = 2;
            
            $this->frotamodel->updateTipoMunck($tipo, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('tiposmunck'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('tiposmunck'), 'refresh');
        }
    }
    
    function ativarMunck(){
	    
	    
	    $id = $this->input->post('munck_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $munck= $this->frotamodel->getTipoMunckByIdRowArray($id);
    	    $munck['frota_tipomunck_ativo_id'] = 1;
    	    $this->frotamodel->updateTipoMunck($munck, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('tiposmunck'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('tiposmunck'));
        }
	}
    
    //----------- TIPO MUNCK - END
    
    //----------- STATUS - START
    
    public function insertStatus(){
        
        
        if($this->input->post('isedit') != null && strlen($this->input->post('isedit')) > 0){
            //EDIÇÃO
            $update_id = $this->input->post('id_e');
            $data['frota_status_ativo_id'] = $this->input->post('ativo_e');
            $data['frota_status_nome'] = $this->refatorarString($this->input->post('nome_e'));
            $this->frotamodel->updateStatus($data, $update_id);
        }else{
            //INSERÇÃO
            $data['frota_status_ativo_id'] = 1;
            $data['frota_status_nome'] = $this->refatorarString($this->input->post('nome_c'));
            $this->frotamodel->insertStatus($data);
        }
        
        redirect('statusveiculo', 'refresh');
    }
    
    public function deleteStatus(){
        
        
        $id = $this->input->post('idstatus');
        $sen = MD5($this->input->post('senha'));
        
        $tipo = $this->frotamodel->getStatusByIdRowArray($id);
        $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        
        if($sen == $aux['usuario_senha']){
            $tipo['frota_status_ativo_id'] = 2;
            
            $this->frotamodel->updateStatus($tipo, $id);
            
            $this->session->set_userdata('delete', 1);
            redirect(base_url('statusveiculo'), 'refresh');
        }else{
            $this->session->set_userdata('delete', 2);
            redirect(base_url('statusveiculo'), 'refresh');
        }
    }
    
    function ativarStatus(){
	    
	    
	    $id = $this->input->post('status_idatv');
	    $sen = MD5($this->input->post('senha'));
        
        if($sen == $this->session->userdata('senha')){
    	    $status= $this->frotamodel->getStatusByIdRowArray($id);
    	    $status['frota_status_ativo_id'] = 1;
    	    $this->frotamodel->updateStatus($status, $id);
    	    
    	    $this->session->set_userdata('delete', 3);
    	    redirect(base_url('statusveiculo'));
        }else{
            $this->session->set_userdata('delete', 4);
            redirect(base_url('statusveiculo'));
        }
	}
    
    //----------- STATUS - END
    
    //------------------- FUNCTIONS -------------------------------------------
    
    //-> INSERÇÃO DINÂMICA DE MARCA
    public function marcaInsert(){
        
        
        $data['frota_marca_ativo_id'] = 1;
        $data['frota_marca_nome'] = $this->refatorarString($this->input->post('nome'));
        $this->frotamodel->insertMarca($data);
        
        echo 1;
    }
    
    //-> REFRESH NO SELECT DE MARCA
    public function refreshMarcas(){
        
        
        $marcas = $this->frotamodel->getAllMarcasAtivos();
        
        echo json_encode($marcas);
    }
    
    //-> INSERÇÃO DINÂMICA DE TIPO DE VEÍCULO
    public function tipoInsert(){
        
        
        $data['frota_tipo_ativo_id'] = 1;
        $data['frota_tipo_nome'] = $this->refatorarString($this->input->post('nome'));
        $this->frotamodel->insertTipo($data);
        
        echo 1;
    }
    
    //-> REFRESH NO SELECT DE TIPO DE VEÍCULO
    public function refreshTipo(){
        
        
        $tipo = $this->frotamodel->getAllTiposAtivos();
        
        echo json_encode($tipo);
    }
    
    //-> INSERÇÃO DINÂMICA DE MODELO
    public function modeloInsert(){
        
        
        $data['frota_modelo_ativo_id'] = 1;
        $data['frota_modelo_marca_id'] = $this->input->post('marca');
        $data['frota_modelo_tipo_id'] = $this->input->post('tipo');
        $data['frota_modelo_nome'] = $this->refatorarString($this->input->post('nome'));
        $this->frotamodel->insertModelo($data);
        
        echo 1;
    }
    
    //-> REFRESH NO SELECT DE MODELO
    public function refreshModelo(){
        
        
        $modelos = $this->frotamodel->getAllModelosAtivos();
        $marcas = $this->frotamodel->getAllMarcas();
        $tipos = $this->frotamodel->getAllTipos();
        
        $return = "<option selected disabled value=''>-- Selecionar --</option>";
        foreach($modelos as $md){
            $return .= "<option value='".$md['frota_modelo_id']."'>";
            foreach($marcas as $marca){
                if($marca['frota_marca_id'] == $md['frota_modelo_marca_id']){
                    $return .= $marca['frota_marca_nome']; 
                }
            }
            $return .= '&nbsp;|&nbsp;' . $md['frota_modelo_nome'] . '</option>';
        }
        
        echo $return;
    }
    
    //-> INSERÇÃO DINÂMICA DE TIPO DE CABINE
    public function cabineInsert(){
        
        
        $data= array(
        'frota_tipogabine_ativo_id' => 1,
        'frota_tipogabine_nome' => $this->refatorarString($this->input->post('nome')),
        'frota_tipogabine_suplemento' => $this->input->post('suplemento'),
        );
        $this->frotamodel->insertTipoGabine($data);
        
        echo 1;
    }
    
    //-> REFRESH NO SELECT DE TIPO DE CABINE
    public function refreshCabine($tipo){
        
        if($tipo == 1){
            $cabine = $this->frotamodel->getTiposGabineAtivos(1);    
        }else{
            $cabine = $this->frotamodel->getTiposGabineAtivos(0);
        }
        
        echo json_encode($cabine);
    }
    
    //-> INSERÇÃO DINÂMICA DE TIPO DE MUNCK
    public function munckInsert(){
        
        
        $data['frota_tipomunck_ativo_id'] = 1;
        $data['frota_tipomunck_nome'] = $this->refatorarString($this->input->post('nome'));
        $data['frota_tipomunck_ano'] = $this->input->post('ano');
        $data['frota_tipomunck_modelo'] = $this->refatorarString($this->input->post('modelo'));
        $this->frotamodel->insertTipoMunck($data);
        
        echo 1;
    }
    
    //-> REFRESH NO SELECT DE TIPO DE MUNCK
    public function refreshMunck(){
        
        
        $munck = $this->frotamodel->getAllTiposMunckAtivos();
        
        echo json_encode($munck);
    }
    
    //-> INSERÇÃO DINÂMICA DE TIPO DE PNEU
    public function pneuInsert(){
        
        
        $data['frota_pneu_marca'] = $this->refatorarString($this->input->post('marca'));
        $data['frota_pneu_aro'] = $this->input->post('aro');
        $data['frota_pneu_banda'] = $this->refatorarString($this->input->post('banda'));
        $data['frota_pneu_quantidade'] = $this->input->post('quantidade');
        
        $data['frota_pneu_ativo_id'] = 1;
        
        $this->frotamodel->insertTipoPneu($data);
        
        echo 1;
    }
    
    //-> REFRESH NO SELECT DE TIPO DE PNEU
    public function refreshPneu(){
        
        
        $pneu = $this->frotamodel->getAllTiposPneusAtivos();
        
        echo json_encode($pneu);
    }
    
    //-> INSERÇÃO DINÂMICA DE SITUAÇÃO
    public function situacaoInsert(){
        
        
        $data['frota_status_ativo_id'] = 1;
        $data['frota_status_nome'] = $this->refatorarString($this->input->post('nome'));
        $this->frotamodel->insertStatus($data);
        
        echo 1;
    }
    
    //-> REFRESH NO SELECT DE SITUAÇÃO
    public function refreshSituacao(){
        
        
        $status = $this->frotamodel->getAllStatusAtivos();
        
        echo json_encode($status);
    }
    
    //-> PEGA O ARRAY DOS PNEUS INDIVIDUAIS BASEADO NO ID PASSADO
    public function getArrayPneus(){
        
        
        $id = $this->input->post('id');
        $array = $this->frotamodel->getPneusIndividuaisByTipo($id);
        $array_r = "";
        $i = 0;
        foreach($array as $a){
            if($i == 0){
                $array_r = $a['pneus_individual_id']."**".$a['pneus_individual_marcacao'];
            }else{
                $array_r += "++".$a['pneus_individual_id']."**".$a['pneus_individual_marcacao'];
            }
            $i++;
        }
        
        echo json_encode($array_r);
    }
    
    //------------------- END FUNCTIONS ----------------------------------------
    
    //------------------- INSERT PNEUS VEÍCULO----------------------------------
    
    function vinculapneu(){
        
    }
    
    public function dinamicoPlaca(){
        
        
        $frota = $this->frotamodel->getById($this->input->post('id'));
        
        echo json_encode($frota['frota_placa']);
    }
    
    
}
