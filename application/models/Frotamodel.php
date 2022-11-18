<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Frotamodel extends CI_Model{
    
    public function getAll(){
        $data = $this->db->get('frota');
        return $data->result_array();
    }
    
    public function getAllAtivo(){
        $this->db->where('frota_ativo_id', 1);
        $data = $this->db->get('frota');
        return $data->result_array();
    }
	
	public function getById($id){
	    $this->db->where('frota_id', $id);
	    $userid = $this->db->get('frota');
	    return $userid->row_array();
	}
	
	public function getRowById($id){
	    $this->db->where('frota_id', $id);
	    $userid = $this->db->get('frota');
	    return $userid->row_array();
	}
	
	public function getByIdPlacaCod($id){
	    $this->db->where('frota_id', $id);
	    $frota = $this->db->get('frota')->row_array();
	    return $frota['frota_placa']." | ".$frota['frota_codigo'];
	}
	
	public function getByPlaca($placa){
	    $this->db->where('frota_placa', $placa);
	    $frota = $this->db->get('frota');
	    return $frota->row_array();
	}
	
	public function getByIdRowArray($id){
	    $this->db->where('frota_id', $id);
	    return $this->db->get('frota')->row_array();
	}
	
	public function getByIdRowArray2(){
	    return $this->db->get('frota')->row_array();
	}
	
	public function insert($frota){
	    $this->db->insert('frota', $frota);
        $error = $this->db->insert_id();
        return $error;
	}
	
	public function update($frota, $id){
        $this->db->where('frota_id', $id);
        $this->db->update('frota', $frota);
    }
    
    public function delete($id){
        $this->db->where('frota_id', $id);
        $this->db->delete('frota');
        return $this->db->error();
    }
    
    public function getAtivos(){
        $this->db->where('frota_ativo_id', 1);
        $frotas = $this->db->get('frota');
        return $frotas->result_array();
    }
    
    public function getFrotasFiltered($filter){
        if($filter['status'] != null && $filter['status'] != ""){
            $this->db->where('frota_status_id', $filter['status']);
        }
        return $this->db->get('frota')->result_array();
    }
    
    public function getAtivosDisponiveis(){
        $this->db->where('frota_ativo_id', 1);
        $this->db->where('frota_status_id', 1);
        $data = $this->db->get('frota');
        return $data->result_array();
    }
    
    //---------------------- TIPOS DE PNEUS - START ----------------------------

    public function getAlltIPOSPneus(){
        $data = $this->db->get('frota_pneus');
        return $data->result_array();
    }
    
    public function getAllTiposPneusAtivos(){
        $this->db->where('frota_pneu_ativo_id', 1);
        $data = $this->db->get('frota_pneus');
        return $data->result_array();
    }
	
	public function getTipoPneuById($id){
	    $this->db->where('frota_pneu_id', $id);
	    $userid = $this->db->get('frota_pneus');
	    return $userid->result_array();
	}
	
	public function getTipoPneuByIdRowArray($id){
	    $this->db->where('frota_pneu_id', $id);
	    $userid = $this->db->get('frota_pneus');
	    return $userid->row_array();
	}
	
	public function insertTipoPneu($pneu){
	    $this->db->insert('frota_pneus', $pneu);
        $error = $this->db->error();
        return $error;
	}
	
	public function updateTipoPneu($pneu, $id){
        $this->db->where('frota_pneu_id', $id);
        $this->db->update('frota_pneus', $pneu);
        return $this->db->error();
    }
    
    public function deleteTipoPneu($id){
        $this->db->where('frota_pneu_id', $id);
        $this->db->delete('frota_pneus');
        return $this->db->error();
    }

    //---------------------- TIPOS DE PNEUS - END ------------------------------
    
    //---------------------- PNEUS INDIVIDUAIS - START -------------------------

    public function getAllPneusIndividuais(){
        $data = $this->db->get('frota_pneus_individuais');
        return $data->result_array();
    }
    
    public function getAllPneusIndividuaisFiltered($filtros){
        if($filtros['frota'] != "" && $filtros['frota'] != null){
            $this->db->where('pneus_individual_frota_id', $filtros['frota']);
        }
        if($filtros['marca'] != "" && $filtros['marca'] != null){
            $this->db->where('pneus_individual_tipopneu_id', $filtros['marca']);
        }
        return $this->db->get('frota_pneus_individuais')->result_array();
    }
    
    public function getPneusAtivosUsos(){
        $this->db->where('pneus_individual_ativo_id', 1);
        $this->db->or_where('pneus_individual_ativo_id', 3);
        $data = $this->db->get('frota_pneus_individuais');
        return $data->result_array();
    }
    
    public function getPneusAtivos(){
        $this->db->where('pneus_individual_ativo_id', 1);
        $data = $this->db->get('frota_pneus_individuais');
        return $data->result_array();
    }
    
    public function getAllSitucacao(){
        $data = $this->db->get('situacaopneus');
        return $data->result_array();
    }
    
    public function getPneuAtivos(){
	    $this->db->where('pneus_individual_ativo_id', 1);
	    $userid = $this->db->get('frota_pneus_individuais');
	    return $userid->result_array();
	}
    
    public function getPneuByFrota($id){
	    $this->db->where('pneus_individual_frota_id', $id);
	    $userid = $this->db->get('frota_pneus_individuais');
	    return $userid->result_array();
	}
    
    public function getPneuById($id){
	    $this->db->where('pneus_individual_id', $id);
	    $userid = $this->db->get('frota_pneus_individuais');
	    return $userid->row_array();
	}
    
	public function getPneuIndividualByMarcacao($marcacao){
	    $this->db->where('pneus_individual_marcacao', $marcacao);
	    $userid = $this->db->get('frota_pneus_individuais');
	    return $userid->result_array();
	}
	
	public function getPneuIndividualById($id){
	    $this->db->where('pneus_individual_id', $id);
	    $userid = $this->db->get('frota_pneus_individuais');
	    return $userid->result_array();
	}
	
	public function getPneuIndividualByIdRowArray($id){
	    $this->db->where('pneus_individual_id', $id);
	    $userid = $this->db->get('frota_pneus_individuais');
	    return $userid->row_array();
	}
	
	public function insertPneuIndividual($pneui){
	    $this->db->insert('frota_pneus_individuais', $pneui);
        $error = $this->db->error();
        return $error;
	}
	
	public function updatePneuIndividual($pneui, $id){
        $this->db->where('pneus_individual_id', $id);
        $this->db->update('frota_pneus_individuais', $pneui);
    }
    
    public function replacePneu($dados){
        $this->db->replace('frota_pneus_individuais', $dados);
    }
    
    public function deletePneuIndividual($id){
        $this->db->where('pneus_individual_id', $id);
        $this->db->delete('frota_pneus_individuais');
        return $this->db->error();
    }
    
    public function getPneusIndividuaisByTipo($tipo){
        $this->db->where('pneus_individual_tipopneu_id', $tipo);
        $this->db->where('pneus_individual_ativo_id', 1);
        $data = $this->db->get('frota_pneus_individuais');
        return $data->result_array();
    }

    //---------------------- PNEUS INDIVIDUAIS - END ---------------------------
    
    //---------------------- REGISTRO PNEUS - START ----------------------------

    public function getAllRegistrosPneus(){
        $data = $this->db->get('frota_pneus_registros');
        return $data->result_array();
    }
	
	public function getRegistroPneuByMarcacao($marcacao){
	    $this->db->where('pneus_registro_marcacao', $marcacao);
	    $userid = $this->db->get('frota_pneus_registros');
	    return $userid->result_array();
	}
	
	public function getRegistrosPeloPneuId($id){
	    $this->db->where('pneus_registro_individual_id', $id);
	    return $this->db->get('frota_pneus_registros')->result_array();
	}
	
	public function getRegistroPneuById($id){
	    $this->db->where('pneus_registro_id', $id);
	    $userid = $this->db->get('frota_pneus_registros');
	    return $userid->row_array();
	}
	
	public function insertRegistroPneu($registro){
	    $this->db->insert('frota_pneus_registros', $registro);
        $error = $this->db->error();
        return $error;
	}
	
	public function getRegistrosPneu($id){
	    $this->db->where('pneus_registro_id', $id);
	    $reg = $this->db->get('frota_pneus_registros');
	    return $reg->result_array();
	}
    
    public function deleteRegistroPneu($id){
        $this->db->where('pneus_registro_id', $id);
        $this->db->delete('frota_pneus_registros');
        return $this->db->error();
    }

    //---------------------- REGISTRO PNEUS - END ------------------------------
    
    //---------------------- LINHA - START -------------------------------------
    
    public function getAllLinhas(){
        $data = $this->db->get('frota_linhas');
        return $data->result_array();
    }
    
    public function getAllLinhasAtivos(){
        $this->db->where('frota_linha_ativo_id', 1);
        $data = $this->db->get('frota_linhas');
        return $data->result_array();
    }
    
    public function getLinhaByIdRowArray($id){
        $this->db->where('frota_linha_id', $id);
	    $linha = $this->db->get('frota_linhas');
	    return $linha->row_array();
    }
    
    //---------------------- LINHA - END ---------------------------------------
    
    //---------------------- TIPO DE AUTOMOVEL - START -------------------------
    
    public function getAllTipos(){
        $data = $this->db->get('frota_tipo');
        return $data->result_array();
    }
    
    public function getAllTiposAtivos(){
        $this->db->where('frota_tipo_ativo_id', 1);
        $data = $this->db->get('frota_tipo');
        return $data->result_array();
    }
    
    public function getAllPlusFrota($id){
        $this->db->where('pneus_individual_ativo_id', 1);
        $this->db->or_where('pneus_individual_ativo_id', 3);
        $this->db->where('pneus_individual_frota_id', $id);
        $data = $this->db->get('frota_pneus_individuais');
        return $data->result_array();
    }
    
    
    public function getTipoById($id){
        $this->db->where('frota_tipo_id', $id);
	    $frota = $this->db->get('frota_tipo');
	    return $frota->result_array();
    }
    
    public function getTipoByIdRowArray($id){
        $this->db->where('frota_tipo_id', $id);
	    $frota = $this->db->get('frota_tipo');
	    return $frota->row_array();
    }
    
    public function insertTipo($tipo){
	    $this->db->insert('frota_tipo', $tipo);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function updateTipo($tipo, $id){
        $this->db->where('frota_tipo_id', $id);
        $this->db->update('frota_tipo', $tipo);
    }
    
    public function deleteTipo($id){
        $this->db->where('frota_tipo_id', $id);
        $this->db->delete('frota_tipo');
    }
    
    //---------------------- TIPO DE AUTOMOVEL - END ---------------------------
    
    //---------------------- MARCAS - START ------------------------------------
    
    public function getAllMarcas(){
        $data = $this->db->get('frota_marcas');
        return $data->result_array();
    }
    
    public function getAllMarcasAtivos(){
        $this->db->where('frota_marca_ativo_id', 1);
        $data = $this->db->get('frota_marcas');
        return $data->result_array();
    }
    
    public function getMarcaById($id){
        $this->db->where('frota_marca_id', $id);
	    $frota = $this->db->get('frota_marcas');
	    return $frota->result_array();
    }
    
    public function getMarcaByIdRowArray($id){
        $this->db->where('frota_marca_id', $id);
	    $frota = $this->db->get('frota_marcas');
	    return $frota->row_array();
    }
    
    public function insertMarca($tipo){
	    $this->db->insert('frota_marcas', $tipo);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function updateMarca($tipo, $id){
        $this->db->where('frota_marca_id', $id);
        $this->db->update('frota_marcas', $tipo);
    }
    
    public function deleteMarca($id){
        $this->db->where('frota_marca_id', $id);
        $this->db->delete('frota_marcas');
    }
    
    //---------------------- MARCAS - END --------------------------------------
    
    //---------------------- MODELOS - START -----------------------------------
    
    public function getAllModelos(){
        $data = $this->db->get('frota_modelos');
        return $data->result_array();
    }
    
    public function getAllModelosAtivos(){
        $this->db->where('frota_modelo_ativo_id', 1);
        $data = $this->db->get('frota_modelos');
        return $data->result_array();
    }
    
    public function getModeloById($id){
        $this->db->where('frota_modelo_id', $id);
	    $frota = $this->db->get('frota_modelos');
	    return $frota->result_array();
    }
    
    public function getModeloByIdRowArray($id){
        $this->db->where('frota_modelo_id', $id);
	    $frota = $this->db->get('frota_modelos');
	    return $frota->row_array();
    }
    
    public function insertModelo($modelo){
	    $this->db->insert('frota_modelos', $modelo);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function updateModelo($modelo, $id){
        $this->db->where('frota_modelo_id', $id);
        $this->db->update('frota_modelos', $modelo);
    }
    
    public function deleteModelo($id){
        $this->db->where('frota_modelo_id', $id);
        $this->db->delete('frota_modelos');
    }
    
    //---------------------- MODELOS - END -------------------------------------
    
    //---------------------- TIPO DE GABINE - START ----------------------------
    
    public function getAllTiposGabine(){
        $data = $this->db->get('frota_tipogabine');
        return $data->result_array();
    }
    
    public function getAllTiposGabineAtivos(){
        $this->db->where('frota_tipogabine_ativo_id', 1);
        $data = $this->db->get('frota_tipogabine');
        return $data->result_array();
    }
    
    public function getTiposGabineAtivos($id){
        $this->db->where('frota_tipogabine_ativo_id', 1);
        $this->db->where('frota_tipogabine_suplemento', $id);
        $data = $this->db->get('frota_tipogabine');
        return $data->result_array();
    }
    
    public function getTipoGabineById($id){
        $this->db->where('frota_tipogabine_id', $id);
	    $frota = $this->db->get('frota_tipogabine');
	    return $frota->result_array();
    }
    
    public function getTipoGabineByIdRowArray($id){
        $this->db->where('frota_tipogabine_id', $id);
	    $frota = $this->db->get('frota_tipogabine');
	    return $frota->row_array();
    }
    
    public function insertTipoGabine($gabine){
	    $this->db->insert('frota_tipogabine', $gabine);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function updateTipoGabine($gabine, $id){
        $this->db->where('frota_tipogabine_id', $id);
        $this->db->update('frota_tipogabine', $gabine);
    }
    
    public function deleteTipoGabine($id){
        $this->db->where('frota_tipogabine_id', $id);
        $this->db->delete('frota_tipogabine');
    }
    
    //---------------------- TIPO DE GABINE - END ------------------------------

    //---------------------- TIPO DE MUNCK - START -----------------------------
    
    public function getAllTiposMunck(){
        $data = $this->db->get('frota_tipomunck');
        return $data->result_array();
    }
    
    public function getAllTiposMunckAtivos(){
        $this->db->where('frota_tipomunck_ativo_id', 1);
        $data = $this->db->get('frota_tipomunck');
        return $data->result_array();
    }
    
    public function getTipoMunckById($id){
        $this->db->where('frota_tipomunck_id', $id);
	    $frota = $this->db->get('frota_tipomunck');
	    return $frota->result_array();
    }
    
    public function getTipoMunckByIdRowArray($id){
        $this->db->where('frota_tipomunck_id', $id);
	    $frota = $this->db->get('frota_tipomunck');
	    return $frota->row_array();
    }
    
    public function insertTipoMunck($munck){
	    $this->db->insert('frota_tipomunck', $munck);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function updateTipoMunck($munck, $id){
        $this->db->where('frota_tipomunck_id', $id);
        $this->db->update('frota_tipomunck', $munck);
    }
    
    public function deleteTipoMunck($id){
        $this->db->where('frota_tipomunck_id', $id);
        $this->db->delete('frota_tipomunck');
    }
    
    //---------------------- TIPO DE MUNCK - END -------------------------------
    
    //---------------------- STATUS DE AUTOMOVEL - START -----------------------
    
    public function getAllStatus(){
        $data = $this->db->get('frota_status');
        return $data->result_array();
    }
    
    public function getAllStatusAtivos(){
        $this->db->where('frota_status_ativo_id', 1);
        $data = $this->db->get('frota_status');
        return $data->result_array();
    }
    
    public function getStatusById($id){
        $this->db->where('frota_status_id', $id);
	    $frota = $this->db->get('frota_status');
	    return $frota->result_array();
    }
    
    public function getStatusByIdRowArray($id){
        $this->db->where('frota_status_id', $id);
	    $frota = $this->db->get('frota_status');
	    return $frota->row_array();
    }
    
    public function insertStatus($status){
	    $this->db->insert('frota_status', $status);
        $id = $this->db->insert_id();
        return $id;
	}
	
	public function updateStatus($status, $id){
        $this->db->where('frota_status_id', $id);
        $this->db->update('frota_status', $status);
    }
    
    public function deleteStatus($id){
        $this->db->where('frota_status_id', $id);
        $this->db->delete('frota_status');
    }
    
    //---------------------- STATUS DE AUTOMOVEL - END -------------------------
    
    public function situacao(){
        $data = $this->db->get('situacaopneus');
        return $data->result_array();
    }
    
    public function posicao(){
        $data = $this->db->get('posicao');
        return $data->result_array();
    }
    
    public function regpneu($data){
        $this->db->insert('frota_pneus_registros', $data);
    }
    
    public function buscaFrota($id){
        $this->db->where('frota_codigo', strtoupper($id));
        $a = $this->db->get('frota')->row_array();
        
        return $a['frota_eixo'];
    }
    
    public function retornaPneus(){
        $this->db->select('pneus_individual_id, pneus_individual_marcacao, pneus_individual_matricula, pneus_individual_dot, pneus_individual_frota_id');
        $this->db->where('pneus_individual_ativo_id !=', 2);
        $a = $this->db->get('frota_pneus_individuais')->result_array();
        return $a;
    }
    
    public function buscaPneusFrota($id){
        $this->db->where('frota_codigo', strtoupper($id));
        $a = $this->db->get('frota')->row_array();
        $placa = $a['frota_placa'];
        $eixos = $a['frota_eixo'];
        $this->db->select('pneus_individual_id as id, pneus_individual_marcacao as mc, pneus_individual_matricula as mt, pneus_individual_dot as dot, pneus_individual_posicao as pos');
        $this->db->where('pneus_individual_ativo_id !=', 2);
        $this->db->where('pneus_individual_frota_id', $a['frota_id']);
        $a = $this->db->get('frota_pneus_individuais')->result_array();
        
        if($a){
            $dados['eixos'] = $eixos;
            $dados['placa'] = $placa;
            foreach($a as $a){
                if($a['pos'] == 'step'){
                    $dados['step'] = array( 'id' => $a['id'], 'nome' => $a['mc']." | ".$a['mt']." | ".$a['dot'], 'posicao' => 'step' );
                }elseif($a['pos'] == 'R-int-1'){
                    $dados['Rint1'] = array( 'id' => $a['id'], 'nome' => $a['mc']." | ".$a['mt']." | ".$a['dot'], 'posicao' => 'R-int-1' );
                }elseif($a['pos'] == 'L-int-1'){
                    $dados['Lint1'] = array( 'id' => $a['id'], 'nome' => $a['mc']." | ".$a['mt']." | ".$a['dot'], 'posicao' => 'L-int-1' );
                }else{
                    for($i=2; $i<=$eixos; $i++){
                        if($a['pos'] == 'R-int-'.$i){
                            $dados['Rint'.$i] = array( 'id' => $a['id'], 'nome' => $a['mc']." | ".$a['mt']." | ".$a['dot'], 'posicao' => 'R-int-'.$i );
                        }elseif($a['pos'] == 'R-ext-'.$i){
                            $dados['Rext'.$i] = array( 'id' => $a['id'], 'nome' => $a['mc']." | ".$a['mt']." | ".$a['dot'], 'posicao' => 'R-ext-'.$i );
                        }elseif($a['pos'] == 'L-int-'.$i){
                            $dados['Lint'.$i] = array( 'id' => $a['id'], 'nome' => $a['mc']." | ".$a['mt']." | ".$a['dot'], 'posicao' => 'L-int-'.$i );
                        }elseif($a['pos'] == 'L-ext-'.$i){
                            $dados['Lext'.$i] = array( 'id' => $a['id'], 'nome' => $a['mc']." | ".$a['mt']." | ".$a['dot'], 'posicao' => 'L-ext-'.$i );
                        }
                    }
                }
            }
        }else{
            $dados = 0;
        }
        
        return $dados;
        
    }
    
    public function resgataPneus(){
        $this->db->select('pneus_individual_id as id, pneus_individual_marcacao as mc, pneus_individual_matricula as mt, pneus_individual_dot as dot');
        $this->db->where('pneus_individual_ativo_id !=', 2);
        $this->db->where('pneus_individual_frota_id', 0);
        $a = $this->db->get('frota_pneus_individuais')->result_array();
        return $a;
    }
    
    public function gravaPneus($idF, $idP, $pos){
        
        $this->db->select('frota_id, frota_km');
        $this->db->where('frota_codigo', strtoupper($idF));
        $a = $this->db->get('frota')->row_array();
        
       
        $this->db->where('pneus_individual_posicao', $pos);
        $this->db->where('pneus_individual_frota_id', $a['frota_id']);
        $b = $this->db->get('frota_pneus_individuais')->row_array();
        
        $b['pneus_individual_posicao'] = "";
        $b['pneus_individual_frota_id'] = "";
        
        $this->db->replace('frota_pneus_individuais', $b);
        
        
        $this->db->where('pneus_individual_id', $idP);
        $c = $this->db->get('frota_pneus_individuais')->row_array();
        
        $c['pneus_individual_posicao'] = $pos;
        $c['pneus_individual_frota_id'] = $a['frota_id'];
        
        $this->db->replace('frota_pneus_individuais', $c);
        
        $pneu = $c['pneus_individual_marcacao']." | ".$c['pneus_individual_matricula']." | ".$c['pneus_individual_dot'];
        return $pneu;
        
    }
    
    public function apagaPneu($frota, $eixo, $pos){
        $this->db->select('frota_id, frota_km');
        $this->db->where('frota_codigo', strtoupper($frota));
        $a = $this->db->get('frota')->row_array();
        
        if($pos == 1){
            $pneu1 = "R-ext-".$eixo;
            $pneu2 = "L-ext-".$eixo;
        }elseif($pos == 2){
            $pneu1 = "R-int-".$eixo;
            $pneu2 = "L-int-".$eixo;
        }
        
        $this->db->where('pneus_individual_posicao', $pneu1);
        $this->db->where('pneus_individual_frota_id', $a['frota_id']);
        $b = $this->db->get('frota_pneus_individuais')->row_array();
        
        $b['pneus_individual_frota_id'] = null;
        $b['pneus_individual_posicao'] = null;
        $b['pneus_individual_kminicial'] = $a['frota_km'];
        
        $this->db->replace('frota_pneus_individuais', $b);
        
        $this->db->where('pneus_individual_posicao', $pneu2);
        $this->db->where('pneus_individual_frota_id', $a['frota_id']);
        $c = $this->db->get('frota_pneus_individuais')->row_array();
        
        $c['pneus_individual_frota_id'] = null;
        $c['pneus_individual_posicao'] = null;
        $c['pneus_individual_kminicial'] = $a['frota_km'];
        
        $this->db->replace('frota_pneus_individuais', $c);
        
    }
}