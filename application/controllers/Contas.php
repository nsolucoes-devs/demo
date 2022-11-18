<?php

class Contas extends MY_Controller{
 
    //função que vai carregar a tela de tipos de contas
    public function telaTiposContas($erro=null, $delete=null){
        $this->load->database();
        $this->load->model('contas/tiposcontas');
        
        if($erro != null){
            $data['erro'] = $erro;
        }else{
            $data['erro'] = null;
        }
        if($delete != null){
            $data['delete'] = $delete;
        }else{
            $data['delete'] = null;
        }
        
        $data['tipos'] = $this->tiposcontas->getTipos();
        
        $this->header(11);
        $this->load->view('contas/telaTiposContas', $data);
        $this->footer();
    }
    
    //função que vai chamar a tela de cadastro de tipo
    public function telaCadastro(){
        $this->header('2.2', 'CADASTRO DE TIPO DE CONTA', 'tipoconta', 'Financeiro', 'Cadastro de Tipo de Conta');
        $this->load->view('contas/cadastroTipo');
        $this->footer();
    }
    
    //função que vai chamar a inserção de tipo
    public function adicionarTipo(){
        $this->load->database();
        $this->load->model('contas/tiposcontas');
        $tipo = array('nome_tipo_conta' => $this->input->post('tipo'),);
        $id = $this->tiposcontas->insertTipo($tipo);
        if($id != null){
            $erro = 1;
            $this->telaTiposContas($erro);
        }else{
            $erro = 2;
            $this->telaTiposContas($erro);
        }
    }
      
      
    //função que vai excluir um tipo
    public function excluirTipo(){
        $this->load->database();
        $this->load->model('contas/tiposcontas');
        
        $id = $this->input->post('idtipo');
        $this->tiposcontas->deleteTipo($id);
        $delete = 1;
        
        $this->telaTiposContas(null, $delete);
    }
    
    //função que vai chamar a tela de despesas
	public function telaDespesas($sucesso=null, $idaux=null){
	    $this->load->database();
	    $this->load->model('contas/tiposcontas');
	    $this->load->model('caixa/caixamodel');
	    $this->load->model('contas/contasmodel');
	    $this->load->model('funcionarios/crudfuncionarios');
	    if($sucesso != null){
	        $data['sucesso'] = $sucesso;
	    }else{
	        $data['sucesso'] = null;
	    }
	    if($this->session->userdata('tipo_pessoa') == 3){
	        $data['caixaunico'] = $this->caixamodel->pegarCaixaAbertoLoja($this->session->userdata('loja_id'));
	    }else{
	        if($idaux == null){
	            $id = $this->uri->segment(3);
	        }else{
	            $id = $idaux;
	        }
	        $data['caixaunico'] = $this->caixamodel->pegarCaixaUnico($id);
	    }
	    $data['funcionarios'] = $this->crudfuncionarios->getFuncionarios();
	    $data['tipos'] = $this->tiposcontas->getTipos();
	    $data['despesas'] = $this->contasmodel->getDespesasCaixa($data['caixaunico']['abertura_caixa']);
	    $this->header(8);
	    $this->load->view('contas/telaDespesas', $data);
	    $this->footer();
	}
	
	public function telareDespesas($sucesso=null, $idaux=null){
	    $this->load->database();
	    $this->load->model('contas/tiposcontas');
	    $this->load->model('caixa/caixamodel');
	    $this->load->model('contas/contasmodel');
	    $this->load->model('funcionarios/crudfuncionarios');
	    if($sucesso != null){
	        $data['sucesso'] = $sucesso;
	    }else{
	        $data['sucesso'] = null;
	    }
	    if($this->session->userdata('tipo_pessoa') == 3){
	        $data['caixaunico'] = $this->caixamodel->pegarCaixaAbertoLoja2($this->session->userdata('loja_id'));
	    }else{
	        if($idaux == null){
	            $id = $this->uri->segment(3);
	        }else{
	            $id = $idaux;
	        }
	        $data['caixaunico'] = $this->caixamodel->pegarCaixaUnico($id);
	    }
	    $data['funcionarios'] = $this->crudfuncionarios->getFuncionarios();
	    $data['tipos'] = $this->tiposcontas->getTipos();
	    $data['despesas'] = $this->contasmodel->getDespesasCaixa($data['caixaunico']['reabertura_data']);
	    $this->header(8);
	    $this->load->view('contas/telareDespesas', $data);
	    $this->footer();
	}
    
    //função que vai carregar a tela de lançamento de conta
    public function telaLancamentoConta($erro=null, $despesa=null){
	    $this->load->database();
	    $this->load->model('caixa/caixamodel');
	    $this->load->model('contas/tiposcontas');
	    
	    if($despesa != null){
	        $data['despesa'] = $despesa;
	    }else{
	        $data['despesa'] = null;
	    }
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    $data['caixaunico'] = $this->caixamodel->pegarCaixaAbertoLoja($this->session->userdata('loja_id'));
	    $data['tipos'] = $this->tiposcontas->getTipos();
	    
	    $this->header(8);
	    $this->load->view('contas/lancamentoConta', $data);
	    $this->footer();
	}
	
	public function telareLancamentoConta($erro=null, $despesa=null){
	    $this->load->database();
	    $this->load->model('caixa/caixamodel');
	    $this->load->model('contas/tiposcontas');
	    
	    if($despesa != null){
	        $data['despesa'] = $despesa;
	    }else{
	        $data['despesa'] = null;
	    }
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    $data['caixaunico'] = $this->caixamodel->pegarCaixaAbertoLoja2($this->session->userdata('loja_id'));
	    $data['tipos'] = $this->tiposcontas->getTipos();
	    
	    $this->header(8);
	    $this->load->view('contas/relancamentoConta', $data);
	    $this->footer();
	}
	
	//função que vai carregar a tela de lançamento de conta para adm e super adm
	public function telaLancamentoConta2($erro=null, $idaux=null, $despesa=null){
	    $this->load->database();
	    $this->load->model('caixa/caixamodel');
	    $this->load->model('contas/tiposcontas');
	    
	    if($despesa != null){
	        $data['despesa'] = $despesa;
	    }else{
	        $data['despesa'] = null;
	    }
	    if($idaux == null){
	        $id = $this->uri->segment(3);
	    }else{
	        $id = $idaux;
	    }
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    $data['caixaunico'] = $this->caixamodel->pegarCaixaUnico($id);
	    $data['tipos'] = $this->tiposcontas->getTipos();
	    
	    $this->header(8);
	    $this->load->view('contas/lancamentoConta', $data);
	    $this->footer();
	}
	
		public function telareLancamentoConta2($erro=null, $idaux=null, $despesa=null){
	    $this->load->database();
	    $this->load->model('caixa/caixamodel');
	    $this->load->model('contas/tiposcontas');
	    
	    if($despesa != null){
	        $data['despesa'] = $despesa;
	    }else{
	        $data['despesa'] = null;
	    }
	    if($idaux == null){
	        $id = $this->uri->segment(3);
	    }else{
	        $id = $idaux;
	    }
	    if($erro != null){
	        $data['erro'] = $erro;
	    }else{
	        $data['erro'] = null;
	    }
	    $data['caixaunico'] = $this->caixamodel->pegarCaixaUnico($id);
	    $data['tipos'] = $this->tiposcontas->getTipos();
	    
	    $this->header(8);
	    $this->load->view('contas/relancamentoConta', $data);
	    $this->footer();
	}
    
    //função que vai inserir uma despesa
    public function novaDespesa(){
        $this->load->database();
        $this->load->model('contas/tiposcontas');
        $this->load->model('caixa/caixamodel');
        $this->load->model('contas/contasmodel');
        $dtexplode = explode('-', $this->input->post('data'));
        $date = $dtexplode[2] . '/' . $dtexplode[1] . '/' . $dtexplode[0];
        $despesa = array(
                'caixa_id'              => $this->input->post('idcaixa'),
                'titulo_despesa'        => $this->input->post('titulo'),
                'tipo_conta_id'         => $this->input->post('tipo'),
                'data_despesa'          => $date,
                'valor_despesa'         => str_replace(',', '.', str_replace('.', '', $this->input->post('valor'))),
                'observacao_despesa'    => $this->input->post('obs'),
                'funcionario_id'        => $this->session->userdata('id_pessoa'),
            );
        $cxloja = $this->caixamodel->pegarCaixaUnico($this->input->post('idcaixa'));
        $despesa['loja_id'] = $cxloja['loja_id'];
        $dtver = new DateTime($this->input->post('data'));
        $dtatual = new DateTime(date('Y-m-d'));
        if($dtver == $dtatual){
            $caixanovo = $this->caixamodel->pegarCaixaAbertoId($despesa['caixa_id']);
            if($caixanovo['troco_atual'] < $despesa['valor_despesa']){
                $erro = 1;
                if($this->session->userdata('tipo_pessoa') != 3){
                    $this->telaLancamentoConta2($erro, $despesa['caixa_id']);
                }else{
                    $this->telaLancamentoConta($erro);
                }
            }else{
                $caixanovo['troco_atual'] = $caixanovo['troco_atual'] - $despesa['valor_despesa'];
                $this->caixamodel->atualizarTroco($caixanovo, $despesa['caixa_id']);
                $despesa['descontado_despesa'] = 1;
                $id = $this->contasmodel->insertDespesa($despesa);
                if($id != null){
                    $sucesso = 1;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaDespesas($sucesso, $despesa['caixa_id']);
                    }else{
                        $this->telaDespesas($sucesso);
                    }
                }else{
                    $erro = 2;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaLancamentoConta2($erro, $despesa['caixa_id']);
                    }else{
                        $this->telaLancamentoConta($erro);
                    }
                }
            }
        }else if($dtver > $dtatual){
            $caixanovo = $this->caixamodel->pegarCaixaAbertoId($despesa['caixa_id']);
            if($caixanovo['troco_atual'] < $despesa['valor_despesa']){
                $erro = 1;
                if($this->session->userdata('tipo_pessoa') != 3){
                    $this->telaLancamentoConta2($erro, $despesa['caixa_id']);
                }else{
                    $this->telaLancamentoConta($erro);
                }
            }else{
                $despesa['descontado_despesa'] = 0;
                $id = $this->contasmodel->insertDespesa($despesa);
                if($id != null){
                    $sucesso = 3;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaDespesas($sucesso, $despesa['caixa_id']);
                    }else{
                        $this->telaDespesas($sucesso);
                    }
                }else{
                    $erro = 2;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaLancamentoConta2($erro, $despesa['caixa_id']);
                    }else{
                        $this->telaLancamentoConta($erro);
                    }
                }
            }
        }else{
            $erro = 3;
            if($this->session->userdata('tipo_pessoa') != 3){
                $this->telaLancamentoConta2($erro, $despesa['caixa_id']);
            }else{
                $this->telaLancamentoConta($erro);
            }
        }
        
        //$this->load->view('teste', $data);
    }
    
    public function novareDespesa(){
        $this->load->database();
        $this->load->model('contas/tiposcontas');
        $this->load->model('caixa/caixamodel');
        $this->load->model('contas/contasmodel');
        $dtexplode = explode('-', $this->input->post('data'));
        $date = $dtexplode[2] . '/' . $dtexplode[1] . '/' . $dtexplode[0];
        $despesa = array(
                'caixa_id'              => $this->input->post('idcaixa'),
                'titulo_despesa'        => $this->input->post('titulo'),
                'tipo_conta_id'         => $this->input->post('tipo'),
                'data_despesa'          => $date,
                'valor_despesa'         => str_replace(',', '.', str_replace('.', '', $this->input->post('valor'))),
                'observacao_despesa'    => $this->input->post('obs'),
                'funcionario_id'        => $this->session->userdata('id_pessoa'),
            );
        $cxloja = $this->caixamodel->pegarCaixaUnico($this->input->post('idcaixa'));
        $despesa['loja_id'] = $cxloja['loja_id'];
        $dtver = new DateTime($this->input->post('data'));
        $dtatual = new DateTime(date('Y-m-d'));
        if($dtver == $dtatual){
            $caixanovo = $this->caixamodel->pegarCaixaAbertoId2($despesa['caixa_id']);
            if($caixanovo['troco_atual'] < $despesa['valor_despesa']){
                $erro = 1;
                if($this->session->userdata('tipo_pessoa') != 3){
                    $this->telareLancamentoConta2($erro, $despesa['caixa_id']);
                }else{
                    $this->telareLancamentoConta($erro);
                }
            }else{
                $caixanovo['troco_atual'] = $caixanovo['troco_atual'] - $despesa['valor_despesa'];
                $this->caixamodel->atualizarTroco($caixanovo, $despesa['caixa_id']);
                $despesa['descontado_despesa'] = 1;
                $id = $this->contasmodel->insertDespesa($despesa);
                if($id != null){
                    $sucesso = 1;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telareDespesas($sucesso, $despesa['caixa_id']);
                    }else{
                        $this->telareDespesas($sucesso);
                    }
                }else{
                    $erro = 2;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telareLancamentoConta2($erro, $despesa['caixa_id']);
                    }else{
                        $this->telareLancamentoConta($erro);
                    }
                }
            }
        }else if($dtver > $dtatual){
            $caixanovo = $this->caixamodel->pegarCaixaAbertoId2($despesa['caixa_id']);
            if($caixanovo['troco_atual'] < $despesa['valor_despesa']){
                $erro = 1;
                if($this->session->userdata('tipo_pessoa') != 3){
                    $this->telareLancamentoConta2($erro, $despesa['caixa_id']);
                }else{
                    $this->telareLancamentoConta($erro);
                }
            }else{
                $despesa['descontado_despesa'] = 0;
                $id = $this->contasmodel->insertDespesa($despesa);
                if($id != null){
                    $sucesso = 3;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telareDespesas($sucesso, $despesa['caixa_id']);
                    }else{
                        $this->telareDespesas($sucesso);
                    }
                }else{
                    $erro = 2;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telareLancamentoConta2($erro, $despesa['caixa_id']);
                    }else{
                        $this->telareLancamentoConta($erro);
                    }
                }
            }
        }else{
            $erro = 3;
            if($this->session->userdata('tipo_pessoa') != 3){
                $this->telareLancamentoConta2($erro, $despesa['caixa_id']);
            }else{
                $this->telareLancamentoConta($erro);
            }
        }
        
        //$this->load->view('teste', $data);
    }
    
    //função que vai excluir uma despesa
    public function excluirDespesa(){
        $this->load->database();
        $this->load->model('contas/contasmodel');
        $this->load->model('caixa/caixamodel');
        
        $id = $this->uri->segment(3);
        $despesa = $this->contasmodel->getDespesaId($id);
        $caixa = $this->caixamodel->pegarCaixaUnicoData($despesa['caixa_id'], $despesa['data_despesa']);
        if($caixa != null){
            $caixa['troco_atual'] = $caixa['troco_atual'] + $despesa['valor_despesa'];
            $this->caixamodel->atualizarTroco($caixa, $caixa['id_caixa']);
            $this->contasmodel->deleteDespesa($id);
            $sucesso = 4;
            if($this->session->userdata('tipo_pessoa') != 3){
                $this->telaDespesas($sucesso, $despesa['caixa_id']);
            }else{
                $this->telaDespesas($sucesso);
            }
        }else{
            $sucesso = 5;
            if($this->session->userdata('tipo_pessoa') != 3){
                $this->telaDespesas($sucesso, $despesa['caixa_id']);
            }else{
                $this->telaDespesas($sucesso);
            }
        }
    }
    
    public function reexcluirDespesa(){
        $this->load->database();
        $this->load->model('contas/contasmodel');
        $this->load->model('caixa/caixamodel');
        
        $id = $this->uri->segment(3);
        $despesa = $this->contasmodel->getDespesaId($id);
        $caixa = $this->caixamodel->pegarCaixaUnicoData2($despesa['caixa_id'], $despesa['data_despesa']);
        if($caixa != null){
            $caixa['troco_atual'] = $caixa['troco_atual'] + $despesa['valor_despesa'];
            $this->caixamodel->atualizarTroco($caixa, $caixa['id_caixa']);
            $this->contasmodel->deleteDespesa($id);
            $sucesso = 4;
            if($this->session->userdata('tipo_pessoa') != 3){
                $this->telareDespesas($sucesso, $despesa['caixa_id']);
            }else{
                $this->telareDespesas($sucesso);
            }
        }else{
            $sucesso = 5;
            if($this->session->userdata('tipo_pessoa') != 3){
                $this->telareDespesas($sucesso, $despesa['caixa_id']);
            }else{
                $this->telareDespesas($sucesso);
            }
        }
    }
    
    //função que vai tratar a chamada da tela de edição
    public function trataChamada(){
        $id = $this->uri->segment(3);
        $this->load->database();
        $this->load->model('contas/contasmodel');
        $despesa = $this->contasmodel->getDespesaId($id);
        if($this->session->userdata('tipo_pessoa') != 3){
            $this->telaLancamentoConta2(null, $despesa['caixa_id'], $despesa);
        }else{
            $this->telaLancamentoConta(null, $despesa);
        }
    }
    
    public function retrataChamada(){
        $id = $this->uri->segment(3);
        $this->load->database();
        $this->load->model('contas/contasmodel');
        $despesa = $this->contasmodel->getDespesaId($id);
        if($this->session->userdata('tipo_pessoa') != 3){
            $this->telareLancamentoConta2(null, $despesa['caixa_id'], $despesa);
        }else{
            $this->telareLancamentoConta(null, $despesa);
        }
    }
    
    //função que vai editar uma despesa
    public function editaDespesa(){
        $this->load->database();
        $this->load->model('contas/tiposcontas');
        $this->load->model('caixa/caixamodel');
        $this->load->model('contas/contasmodel');
        $dtexplode = explode('-', $this->input->post('data'));
        $date = $dtexplode[2] . '/' . $dtexplode[1] . '/' . $dtexplode[0];
        $iddespesa = $this->input->post('iddespesa');
        $despesavelha = $this->contasmodel->getDespesaId($iddespesa);
        $despesa = array(
                'caixa_id'              => $this->input->post('idcaixa'),
                'titulo_despesa'        => $this->input->post('titulo'),
                'tipo_conta_id'         => $this->input->post('tipo'),
                'data_despesa'          => $date,
                'valor_despesa'         => str_replace(',', '.', str_replace('.', '', $this->input->post('valor'))),
                'observacao_despesa'    => $this->input->post('obs'),
                'funcionario_id'        => $this->session->userdata('id_pessoa'),
            );
        $cxloja = $this->caixamodel->pegarCaixaUnico($this->input->post('idcaixa'));
        $despesa['loja_id'] = $cxloja['loja_id'];
        $dtver = new DateTime($this->input->post('data'));
        $dtatual = new DateTime(date('Y-m-d'));
        if($dtver == $dtatual){
            $caixanovo = $this->caixamodel->pegarCaixaAbertoId($despesa['caixa_id']);
            if($caixanovo['troco_atual'] < $despesa['valor_despesa']){
                $erro = 1;
                if($this->session->userdata('tipo_pessoa') != 3){
                    $this->telaLancamentoConta2($erro, $despesa['caixa_id'], $despesa);
                }else{
                    $this->telaLancamentoConta($erro, $despesa);
                }
            }else{
                $dif = 0;
                if($despesavelha['valor_despesa'] > $despesa['valor_despesa']){
                    $dif = $despesavelha['valor_despesa'] - $despesa['valor_despesa'];
                    $caixanovo['troco_atual'] = $caixanovo['troco_atual'] + $dif;
                }else if($despesa['valor_despesa'] > $despesavelha['valor_despesa']){
                    $dif = $despesa['valor_despesa'] - $despesavelha['valor_despesa'];
                    $caixanovo['troco_atual'] = $caixanovo['troco_atual'] - $dif;
                }
                $this->caixamodel->atualizarTroco($caixanovo, $despesa['caixa_id']);
                $despesa['descontado_despesa'] = 1;
                $id = $this->contasmodel->atualizarDespesa($despesa, $iddespesa);
                if($id != null){
                    $sucesso = 1;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaDespesas($sucesso, $despesa['caixa_id']);
                    }else{
                        $this->telaDespesas($sucesso);
                    }
                }else{
                    $erro = 2;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaLancamentoConta2($erro, $despesa['caixa_id'], $despesa);
                    }else{
                        $this->telaLancamentoConta($erro, $despesa);
                    }
                }
            }
        }else if($dtver > $dtatual){
            $caixanovo = $this->caixamodel->pegarCaixaAbertoId($despesa['caixa_id']);
            if($caixanovo['troco_atual'] < $despesa['valor_despesa']){
                $erro = 1;
                if($this->session->userdata('tipo_pessoa') != 3){
                    $this->telaLancamentoConta2($erro, $despesa['caixa_id'], $despesa);
                }else{
                    $this->telaLancamentoConta($erro, $despesa);
                }
            }else{
                $despesa['descontado_despesa'] = 0;
                $id = $this->contasmodel->atualizarDespesa($despesa, $iddespesa);
                if($id != null){
                    $sucesso = 3;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaDespesas($sucesso, $despesa['caixa_id']);
                    }else{
                        $this->telaDespesas($sucesso);
                    }
                }else{
                    $erro = 2;
                    if($this->session->userdata('tipo_pessoa') != 3){
                        $this->telaLancamentoConta2($erro, $despesa['caixa_id'], $despesa);
                    }else{
                        $this->telaLancamentoConta($erro, $despesa);
                    }
                }
            }
        }else{
            $erro = 3;
            if($this->session->userdata('tipo_pessoa') != 3){
                $this->telaLancamentoConta2($erro, $despesa['caixa_id'], $despesa);
            }else{
                $this->telaLancamentoConta($erro, $despesa);
            }
        }
        
        //$this->load->view('teste', $data);
    }
    
    //função que vai chamar a tela de todas as despesas
    public function telaTodasDespesas($erro=null){
        $this->load->database();
        $this->load->model('contas/contasmodel');
        $this->load->model('contas/tiposcontas');
        $this->load->model('funcionarios/crudfuncionarios');
        $this->load->model('lojas/crudlojas');
        
        if($erro != null){
            $data['erro'] = $erro;
        }else{
            $data['erro'] = null;
        }
        
        $data['lojas'] = $this->crudlojas->getLojas();
        $data['despesas'] = $this->contasmodel->getDespesas();
        $data['funcionarios'] = $this->crudfuncionarios->getFuncionarios();
        $data['tipos'] = $this->tiposcontas->getTipos();
        
        $this->header(11);
        $this->load->view('contas/telaTodasDespesas', $data);
        $this->footer();
    }
    
    //função que vai dar baixa em uma conta
    public function baixarConta(){
        $this->load->database();
        $this->load->model('contas/contasmodel');
        $this->load->model('caixa/caixamodel');
        
        $id = $this->uri->segment(3);
        $despesanova = $this->contasmodel->getDespesaId($id);
        $caixaaberto = $this->caixamodel->pegarCaixaAbertoLoja($despesanova['loja_id']);
        if($caixaaberto != null){
            $despesanova['data_despesa'] = date('d/m/Y');
            $despesanova['descontado_despesa'] = 1;
            if($caixaaberto['troco_atual'] < $despesanova['valor_despesa']){
                $erro = 2;
                $this->telaTodasDespesas($erro);
            }else{
                $erro = 3;
                $caixaaberto['troco_atual'] = $caixaaberto['troco_atual'] - $despesanova['valor_despesa'];
                $this->contasmodel->atualizarDespesa($despesanova, $despesanova['id_despesa']);
                $this->caixamodel->atualizarTroco($caixaaberto, $caixaaberto['id_caixa']);
                $this->telaTodasDespesas($erro);
            }
        }else{
            $erro = 1;
            $this->telaTodasDespesas($erro);
        }
    }
    
    //função que vai setar a id da despesa
	public function setaId(){
	    $id = $this->input->post('id');
	    $this->load->model('contas/contasmodel');
	    
	    $data = $this->contasmodel->getDespesaId($id);
        $obs = $data['observacao_despesa'];
	    echo $obs;
	}
    
}