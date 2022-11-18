<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manutencaomodel extends CI_Model {

	// **========================================================================**
    // ||                        Funções de Manutenção                           ||
    // **========================================================================**
    
    public function getAll(){
        $this->db->order_by("os_id", "desc");
        return $this->db->get('ordem_servico')->result_array();
    }
    
    public function pegaUltimaByFrota($frota){
        $this->db->where('os_frota_id', $frota);
        $this->db->order_by("os_id", "desc");
        return $this->db->get('ordem_servico')->row_array();
    }
    
    public function insertManutencao($new){
        $this->db->insert('ordem_servico', $new);
        return $this->db->insert_id();
    }
    
    public function getUnico($id){
        $this->db->where('os_id', $id);
        return $this->db->get('ordem_servico')->row_array();
    }
    
    public function editManu($edit, $id){
        $this->db->where('os_id', $id);
        $this->db->update('ordem_servico', $edit);
    }
    
    public function getByFrota($id){
        $this->db->where('os_frota_id', $id);
        return $this->db->get('ordem_servico')->result_array();
    }
    
    public function getByFrotaFilter($id, $filtros){
        $this->db->where('os_frota_id', $id);
        if($filtros['tipo'] != null && $filtros['tipo'] != ""){
            $this->db->where('os_tipo', $filtros['tipo']);
        }
        $this->db->order_by('os_id', 'desc');
        $retrieve = $this->db->get('ordem_servico')->result_array();

        $newR = [];
        if($filtros['inicio'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['os_data_abertura']);
                if((int)$dt >= (int)$filtros['inicio']){
                    if($filtros['final'] != ""){
                        if((int)$dt <= (int)$filtros['final']){
                            $newR[$i] = $rt;
                            $i++;
                        }
                    }else{
                        $newR[$i] = $rt;
                        $i++;
                    }
                }
            }
        }else if($filtros['final'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['os_data_abertura']);
                if((int)$dt <= (int)$filtros['final']){
                    $newR[$i] = $rt;
                    $i++;
                }
            }
        }else{
            $i = 0;
            foreach($retrieve as $rt){
                $newR[$i] = $rt;
                $i++;
            }
        }
        
        return $newR;
    }
    
    public function getFiltered($filtros){
        if($filtros['tipo']!=null && $filtros['tipo']!=""){
            $this->db->where('os_tipo', $filtros['tipo']);
        }
        if($filtros['frota']!=null && $filtros['frota']!=""){
            $this->db->where('os_frota_id', $filtros['frota']);
        }
        $retrieve = $this->db->get('ordem_servico')->result_array();
        
        $newR = [];
        if($filtros['de'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['os_data_abertura']);
                if((int)$dt >= (int)$filtros['de']){
                    if($filtros['ate'] != ""){
                        if((int)$dt <= (int)$filtros['ate']){
                            $newR[$i] = $rt;
                            $i++;
                        }
                    }else{
                        $newR[$i] = $rt;
                        $i++;
                    }
                }
            }
        }else if($filtros['ate'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['os_data_abertura']);
                if((int)$dt <= (int)$filtros['ate']){
                    $newR[$i] = $rt;
                    $i++;
                }
            }
        }else{
            $i = 0;
            foreach($retrieve as $rt){
                $newR[$i] = $rt;
                $i++;
            }
        }
        
        return $newR;
    }
    
    public function getAllAbertas(){
        $this->db->order_by('os_id', 'desc');
        $this->db->where("os_situacao_id", 1);
        $this->db->limit(5);
        $os = $this->db->get('ordem_servico')->result_array();
        
        $array = [];
        $cont = 0;
        
        foreach($os as $o){
            $this->db->where('frota_id', $o['os_frota_id']);
            $frota = $this->db->get('frota')->row_array();
            
            $array[$cont] = array(
                'id'        => $o['os_id'],
                'frota'     => $frota['frota_codigo'] . ' - ' . $frota['frota_placa'],
                'tipo'      => $o['os_tipo'],
                'data'      => date('d/m/Y', strtotime($o['os_data_abertura'])) . ' - ' . $o['os_hora_abertura'],
                'titulo'    => $o['os_titulo'],
            );
            $cont++;
        }
        
        return $array;
    }
    
    public function getCustoFrota($inicio, $fim){
        $this->db->select('frota_id, frota_codigo');
        $this->db->where('frota_ativo_id', 1);
        $frota = $this->db->get('frota')->result_array();
        
        $array = [];
        $cont = 0;
        
        foreach($frota as $f){
            $this->db->select('os_id');
            $this->db->where('os_frota_id', $f['frota_id']);
            $this->db->where('os_data_abertura <=', $inicio);
            $this->db->where('os_data_abertura >=', $fim);
            $os = $this->db->get('ordem_servico')->result_array();
            
            $custo = 0;
            
            foreach($os as $o){
                $this->db->select('andamento_id');
                $this->db->where('andamento_os_id', $o['os_id']);
                $anda = $this->db->get('andamento')->result_array();
                foreach($anda as $a){
                    $this->db->select('ai_qtd, ai_vlr_un');
                    $this->db->where('ai_andamento_id', $a['andamento_id']);
                    $item = $this->db->get('andamento_itens')->result_array();
                    foreach($item as $i){
                        $custo = $custo + ($i['ai_qtd'] * $i['ai_vlr_un']);        
                    }
                }
            }

            $this->db->select('titulos_frota, titulos_rateio');
            $this->db->where('titulos_vencimento <=', $inicio);
            $this->db->where('titulos_vencimento >=', $fim);
            $this->db->where('titulos_id_pai', 0);
            $this->db->where('titulos_baixa', 1);
            $this->db->where('titulos_IO', 'SAIDA');
            $this->db->like('titulos_frota', $f['frota_id'], 'none');
            $this->db->or_like('titulos_frota', $f['frota_id'] . '¬', 'after');
            $this->db->or_like('titulos_frota', '¬' . $f['frota_id'], 'before');
            $this->db->or_like('titulos_frota', '¬' . $f['frota_id']. '¬', 'both');
            $titulos = $this->db->get('titulos')->result_array();
            
            foreach($titulos as $tit){
                $aux_frota  = explode('¬', $tit['titulos_frota']);
                $aux_rateio = explode('¬', $tit['titulos_rateio']);
                
                for($i = 0; $i < count($aux_frota); $i++){
                    if($aux_frota[$i] == $f['frota_id']){
                        if($aux_rateio[$i] != null){
                            $custo = $custo + (float)$aux_rateio[$i];
                        }
                    }
                }
            }
            
            $array[$cont] = array(
                'frota' =>  $f['frota_codigo'],
                'custo' =>  $custo,
            );
            $cont++;
        }
        
        return $array;
    }
    
    
    
    
    public function get_countManutencaoFiltro($filter = null) {
        
        $this->db->select(" COUNT(*) as pages");
        if($filter != null){
            $aux_data = explode('/', $filter);
            if(count($aux_data) == 2){
               $filtrodata = $aux_data[1] . '-' . $aux_data[0];
            } else if(count($aux_data) == 3){
               $filtrodata =  $aux_data[2] . '-' . $aux_data[1] . '-' . $aux_data[0]; 
            } else {
                $filtrodata = $filter;
            }
            
            $this->db->join('frota', 'ordem_servico.os_frota_id = frota.frota_id');
            $this->db->join('situacaoos', 'ordem_servico.os_situacao_id = situacaoos.situacaoos_id');
            $this->db->like('frota_codigo', trim($filter));
            $this->db->or_like('frota_placa', trim($filter), 'both');
            $this->db->or_like('situacaoos_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('os_id', trim($filter), 'both');
            $this->db->or_like('os_tipo', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('os_data_abertura', trim($filtrodata), 'both');
            $this->db->or_like('os_hora_abertura', trim($filter), 'both');
            $this->db->or_like('os_titulo', trim($this->tirarAcentos($filter)), 'both');      
        }
        $a = $this->db->get('ordem_servico')->row_array();
        return $a['pages'];
    }
    
    public function getAllManutencaoFiltro($filter = null, $limit, $start){
        if($filter != null){
            $aux_data = explode('/', $filter);
            if(count($aux_data) == 2){
               $filtrodata = $aux_data[1] . '-' . $aux_data[0];
            } else if(count($aux_data) == 3){
               $filtrodata =  $aux_data[2] . '-' . $aux_data[1] . '-' . $aux_data[0]; 
            } else {
                $filtrodata = $filter;
            }
            
            $this->db->join('frota', 'ordem_servico.os_frota_id = frota.frota_id');
            $this->db->join('situacaoos', 'ordem_servico.os_situacao_id = situacaoos.situacaoos_id');
            $this->db->like('frota_codigo', trim($filter));
            $this->db->or_like('frota_placa', trim($filter), 'both');
            $this->db->or_like('situacaoos_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('os_id', trim($filter), 'both');
            $this->db->or_like('os_tipo', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('os_data_abertura', trim($filtrodata), 'both');
            $this->db->or_like('os_hora_abertura', trim($filter), 'both');
            $this->db->or_like('os_titulo', trim($this->tirarAcentos($filter)), 'both');    
        }
        $this->db->order_by('os_id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('ordem_servico')->result_array();
    }
    
    public function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
    
    // **======================================================================**
    // ||                        Funções de Andamento                          ||
    // **======================================================================**
    
    public function insertAndamento($new){
        $this->db->insert('andamento', $new);
        return $this->db->insert_id();
    }
    
    public function insertAndamentoItem($new){
        $this->db->insert('andamento_itens', $new);
    }
    
    public function getAndamentosByManu($manu){
        $this->db->where('andamento_os_id', $manu);
        return $this->db->get('andamento')->result_array();
    }
    
    public function getAllAndamento(){
        return $this->db->get('andamento')->result_array();
    }
    
    public function getAndamentoUnico($id){
        $this->db->where('andamento_id', $id);
        return $this->db->get('andamento')->row_array();
    }
    
    public function getItensAndamento($and){
        $this->db->where('ai_andamento_id', $and);
        return $this->db->get('andamento_itens')->result_array();
    }
    
    public function getItensPeca($id){
        $this->db->where('ai_item_id', $id);
        $this->db->where('ai_tipo', 'PEÇA');
        return $this->db->get('andamento_itens')->result_array();
    }
    
    public function getPecasAndamento($and){
        $this->db->where('ai_andamento_id', $and);
        $this->db->where('ai_tipo', 'PEÇA');
        return $this->db->get('andamento_itens')->result_array();
    }
    
    public function getServsAndamento($and){
        $this->db->where('ai_andamento_id', $and);
        $this->db->where('ai_tipo', 'SERVIÇO');
        return $this->db->get('andamento_itens')->result_array();
    }
    
    public function editItemAndamento($id, $item){
        $this->db->where('ai_id', $id);
        $this->db->update('andamento_itens', $item);
    }
    
    public function deleteItemAndamento($id){
        $this->db->where('ai_id', $id);
        $this->db->delete('andamento_itens');
    }
    
    public function delPecasServsByAnd($id){
        $this->db->where('ai_andamento_id', $id);
        $this->db->delete('andamento_itens');
    }
    
    public function delAndamento($id){
        $this->db->where('andamento_id', $id);
        $this->db->delete('andamento');
    }
    
    public function editAndamento($edit, $id){
        $this->db->where('andamento_id', $id);
        $this->db->update('andamento', $edit);
    }
    
    // **======================================================================**
    // ||                        Funções de Situação                           ||
    // **======================================================================**

    public function getAllSituacao(){
        return $this->db->get('situacaoos')->result_array();
    }

    public function insertSituacao($nome){
        $this->db->insert('situacaoos', $nome);
        return $this->db->insert_id();
    }
    
    public function getUnicaSituacao($id){
        $this->db->where('situacaoos_id', $id);
        return $this->db->get('situacaoos')->row_array();
    }
    
    public function getUnicaSituacaoNome($id){
        $this->db->where('situacaoos_id', $id);
        $data = $this->db->get('situacaoos')->row_array();
        return $data['situacaoos_nome'];
    }
    
    // **======================================================================**
    // ||                        Funções de Serviços                           ||
    // **======================================================================**
    
    public function getServById($id){
        $this->db->where('servico_id', $id);
        return $this->db->get('servicos')->row_array();
    }
    
    public function getAllServAtivos(){
        $this->db->where('servico_ativo_id', 1);
        return $this->db->get('servicos')->result_array();
    }
    
    public function getAllServ(){
        return $this->db->get('servicos')->result_array();
    }
    
    public function insertServ($new){
        $this->db->insert('servicos', $new);
        return $this->db->insert_id();
    }

    public function editServ($edit, $id){
        $this->db->where('servico_id', $id);
        $this->db->update('servicos', $edit);
    }
    
    
    
   
    
    
    public function get_countServicosFiltro($filter = null) {
        $this->db->select(" COUNT(*) as pages");
        if($filter != null){
            $filtrovalor = str_replace('R$','', $filter);
            $filtrovalor = str_replace(' ','', $filtrovalor);
            $filtrovalor = str_replace('.','', $filtrovalor);
            $filtrovalor = str_replace(',','.', $filtrovalor);
            
            $this->db->like('servico_id', $filter);
            $this->db->or_like('servico_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('servico_custo', $filtrovalor, 'both');
        }
        $this->db->where('servico_ativo_id', 1);
        $a = $this->db->get('servicos')->row_array();
        return $a['pages'];
    }
    
    public function getAllServicoFiltro($filter = null, $limit, $start){
        if($filter != null){
            $filtrovalor = str_replace('R$','', $filter);
            $filtrovalor = str_replace(' ','', $filtrovalor);
            $filtrovalor = str_replace('.','', $filtrovalor);
            $filtrovalor = str_replace(',','.', $filtrovalor);
            
            $this->db->like('servico_id', $filter);
            $this->db->or_like('servico_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('servico_custo', $filtrovalor, 'both');
        }
        $this->db->where('servico_ativo_id', 1);
        $this->db->order_by('servico_id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('servicos')->result_array();
    }
    
    // **======================================================================**
    // ||                        Funções de Garantia                           ||
    // **======================================================================**
    
    public function insertGarantia($new){
        $this->db->insert('garantia', $new);
        return $this->db->insert_id();
    }
    
    public function getGarantiasPecasByOs($os){
        $this->db->where('garantia_os_id', $os);
        $this->db->where('garantia_item_tipo', 'PEÇA');
        return $this->db->get('garantia')->result_array();
    }
    
    public function getGarantiasServsByOs($os){
        $this->db->where('garantia_os_id', $os);
        $this->db->where('garantia_item_tipo', 'SERVIÇO');
        return $this->db->get('garantia')->result_array();
    }
    
    public function getGarantiaByParams($os, $tipo, $item){
        $this->db->where('garantia_os_id', $os);
        $this->db->where('garantia_item_tipo', $tipo);
        $this->db->where('garantia_item_id', $item);
        return $this->db->get('garantia')->row_array();
    }
    
    public function editGarantia($edit, $id){
        $this->db->where('garantia_id', $id);
        $this->db->update('garantia', $edit);
    }
    
    // **======================================================================**
    // ||                        Funções de Financeiro                           ||
    // **======================================================================**
    
    public function lancaTitulo($id){
        $this->db->where('os_id', $id);
        $os = $this->db->get('ordem_servico')->row_array();
        
        $this->db->where('frota_id', $os['os_frota_id']);
        $frota = $this->db->get('frota')->row_array();
        
        $this->db->where('andamento_os_id', $id);
        $aux = $this->db->get('andamento')->result_array();
        
        $vl_pc = $vl_sr = 0;
        
        foreach($aux as $row){
            //SELECT * FROM `andamento_itens` WHERE `ai_andamento_id` = 1
            $this->db->where('ai_andamento_id', $row['andamento_id']);
            $aux2 = $this->db->get('andamento_itens')->result_array();
            foreach($aux2 as $row2){
                if($row2['ai_tipo'] == "PEÇA"){
                    $vl_pc .= $row2['ai_vlr_un'] * $row2['ai_qtd'];
                }else{
                    $vl_sr .= $row2['ai_vlr_un'] * $row2['ai_qtd'];
                }
            }
        }
        
        $titulo = array(
                    'titulos_vencimento'    => "",
                    'titulos_numeroserie'   => "",
                    'titulos_forneclin'     => "",
                    'titulos_tipo'          => "",
                    'titulos_atraso'        => "",
                    'titulos_valor'         => $vl_pc + $vl_sr,
                    'titulos_juros'         => "",
                    'titulos_multa'         => "",
                    'titulos_desconto'      => "",
                    'titulos_valorpago'     => "",
                    'titulos_formapag'      => "",
                    'titulos_frota'         => $frota['frota_codigo'],
                    'titulos_observacao'    => "TITULO GERADO APÓS FINALIZAÇÃO DE ORDEM DE SERVIÇO Nº".$os['os_id'].", ABERTA EM ".$os['os_data_abertura']." E ENCERRADA EM ".$os['os_data_fechamento'],
                    'titulos_IO'            => "",
                    'titulos_completo'      => 0,
                    'titulos_baixa'         => "",
                    'titulos_data_baixa'    => "",
                    'titulos_user_baixa'    => "",
                    'titulos_pagobs'        => "",
                    'titulos_id_pai'        => "",
                );
    }
}