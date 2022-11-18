<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Financeiromodel extends CI_Model{
    
    public function getTitulos(){
        $this->db->where('titulos_id_pai', 0);
        $data = $this->db->get('titulos');
        return $data->result_array();
    }
    
    public function getTitulo($id){
        $this->db->where('titulos_id', $id);
        $data = $this->db->get('titulos');
        return $data->row_array();
    }
    
    public function getTitulosByMonth($mes){
        $this->db->where("titulos_vencimento LIKE '%-".$mes."-%'");
		$this->db->where("titulos_baixa", 0);
		$this->db->select('titulos_vencimento');
		return $this->db->get('titulos')->result_array();
    }
    
    public function getTituloByNota($nota){
        $this->db->where('titulos_numeroserie', $nota);
        $data = $this->db->get('titulos');
        return $data->row_array();
    }
    
    public function getNotaByForne($id){
        $this->db->where('notafiscal_fornecedor', $id);
        $dados = $this->db->get('notasfiscais');
        return $dados->result_array();
    }
    
    public function somarNotas($id){
        $this->db->select('sum(notafiscal_valorfinal) as soma');
        $this->db->where('notafiscal_fornecedor', $id);
        $dados = $this->db->get('notasfiscais')->row_array();
        return $dados['soma'];    
    }
    
    public function getTM($id){
        $this->db->where('tm_id', $id);
        $data = $this->db->get('tipos_movimento');
        return $data->row_array();
    }
    
    
    public function getTMByTipo($tipo){
        $this->db->where('tm_id >', 0);
        $this->db->where('tm_tipo', $tipo);
        return $this->db->get('tipos_movimento')->result_array();
    }
    
    
    public function getTitulosByFrota($frota){
        $this->db->where('titulos_frota', $frota);
        $data = $this->db->get('titulos');
        return $data->result_array();
    }
    
    public function getTitulosByForneclin($fornecedor){
        $this->db->where('titulos_forneclin', $fornecedor);
        $data = $this->db->get('titulos');
        return $data->result_array();
    }
    
    public function getTitulosByForneclinFiltro($fornecedor, $filtro){
        $this->db->where('titulos_forneclin', $fornecedor);
        $this->db->where('titulos_baixa', $filtro);
        $data = $this->db->get('titulos');
        return $data->result_array();
    }
    
    public function getTitulosByFrotaSaida($frota){
        $this->db->like('titulos_frota', $frota, 'none');
        $this->db->or_like('titulos_frota', $frota . '¬', 'after');
        $this->db->or_like('titulos_frota', '¬' . $frota, 'before');
        $this->db->or_like('titulos_frota', '¬' . $frota. '¬', 'both');
        $this->db->where('titulos_id_pai', 0);
        $this->db->where('titulos_IO', 'SAIDA');
        $this->db->where('titulos_baixa', 1);
        $data = $this->db->get('titulos');
        return $data->result_array();
    }
    
    public function getTitulosdate($id, $data){
        if($data['dt_inicio'] && $data['dt_fim']){
            $this->db->where("titulos_vencimento BETWEEN '". date('Y-m-d', strtotime($data['dt_inicio'])). "' and '". date('Y-m-d', strtotime($data['dt_fim']))."'");
            if($data['baixa'] != null){
                $this->db->where('titulos_baixa', $data['baixa']);
            }
            $this->db->where('titulos_forneclin', $id);
            $dados = $this->db->get('titulos');
            return $dados->result_array();
        } else if($data['dt_inicio']) {
            $this->db->where('titulos_vencimento >=', date('Y-m-d', strtotime($data['dt_inicio'])));
            if($data['baixa'] != null){
                $this->db->where('titulos_baixa', $data['baixa']);
            }
            $this->db->where('titulos_forneclin', $id);
            $dados = $this->db->get('titulos');
            return $dados->result_array();
        } else if($data['dt_fim']) {
            $this->db->where('titulos_vencimento <=', date('Y-m-d', strtotime($data['dt_fim'])));
            if($data['baixa'] != null){
                $this->db->where('titulos_baixa', $data['baixa']);
            }
            $this->db->where('titulos_forneclin', $id);
            $dados = $this->db->get('titulos');
            return $dados->result_array();
        } else {
            $this->db->where('titulos_forneclin', $id);
            $this->db->where('titulos_baixa', $data['baixa']);
            $dados = $this->db->get('titulos');
            return $dados->result_array();
        }
    }
    
    public function getTitulosSinteticoDRE($fil){
        $this->db->where('titulos_baixa', 1);
        $this->db->where('titulos_id_pai', 0);
        $this->db->where("titulos_vencimento BETWEEN '". date('Y-m-d', strtotime($fil['inicio'])). "' and '". date('Y-m-d', strtotime($fil['final']))."'");
        $this->db->order_by('titulos_vencimento', 'asc');
        return $this->db->get('titulos')->result_array();
    }
    
    public function getTitulosDRE($fil){
        $this->db->where('titulos_baixa', 1);
        $this->db->where('titulos_id_pai', 0);
        if($fil['de'] != null && $fil['ate'] != null){
            $this->db->where("titulos_vencimento BETWEEN '". date('Y-m-d', strtotime($fil['de'])). "' and '". date('Y-m-d', strtotime($fil['ate']))."'");
        }else if($fil['de'] != null){
            $this->db->where('titulos_vencimento >=', date('Y-m-d', strtotime($fil['de'])));
        }else if($fil['ate'] != null){
             $this->db->where('titulos_vencimento <=', date('Y-m-d', strtotime($fil['ate'])));
        }
        $this->db->order_by('titulos_vencimento', 'asc');
        return $this->db->get('titulos')->result_array();
    }
    
    public function getTitulosFecha($data){
        $this->db->where('titulos_baixa', 1);
        $this->db->where('titulos_id_pai', 0);
        $this->db->where('titulos_data_baixa', $data);
        return $this->db->get('titulos')->result_array();
    }
    
    public function getTitulosByFrotaSaidaFilter($frota, $filtros){
        $this->db->like('titulos_frota', $frota, 'none');
        $this->db->or_like('titulos_frota', $frota . '¬', 'after');
        $this->db->or_like('titulos_frota', '¬' . $frota, 'before');
        $this->db->or_like('titulos_frota', '¬' . $frota. '¬', 'both');
        $this->db->where('titulos_id_pai', 0);
        $this->db->where('titulos_baixa', 1);
        $this->db->where('titulos_IO', 'SAIDA');
        $this->db->order_by('titulos_id', 'desc');
        $retrieve = $this->db->get('titulos');
        $retrieve = $retrieve->result_array();
        
        $newR = [];
        if($filtros['inicio'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['titulos_vencimento']);
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
                $dt = strtotime($rt['titulos_vencimento']);
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
    
    public function getTitulosFilter($filtros){
        if($filtros['tipo'] != null && $filtros['tipo'] != ""){
            $this->db->where('titulos_IO', $filtros['tipo']);
        }
        if($filtros['baixa'] != null && $filtros['baixa'] != ""){
            $this->db->where('titulos_baixa', $filtros['baixa']);
        }
        
        if(isset($filtros['for'])){ 
            if($filtros['for'] != null && $filtros['for'] != ""){
                $this->db->where('titulos_forneclin', $filtros['for']);
            }
        }
        
        $this->db->where('titulos_id_pai', 0);
        $this->db->where('titulos_completo', 1);
        $this->db->order_by('titulos_vencimento', 'asc');
        $retrieve = $this->db->get('titulos');
        $retrieve = $retrieve->result_array();
        
        $newR = [];
        if($filtros['de'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['titulos_vencimento']);
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
                $dt = strtotime($rt['titulos_vencimento']);
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
    
    public function getFilhosTitulo($id){
        $this->db->where('titulos_id_pai', $id);
        return $this->db->get('titulos')->result_array();
    }
    
    public function putTitulos($data){
        $this->db->insert('titulos', $data);
    }
    
    public function insertTitulo($data){
        $this->db->insert('titulos', $data);
        return $this->db->insert_id();
    }
    
    public function getContas(){
        $this->db->where('tm_movimenta_estoque', 0);
        $this->db->where('tm_ativo_id', 1);
        $data = $this->db->get('tipos_movimento');
        return $data->result_array();
    }
    
    public function getConta($id){
        $this->db->where('contas_id', $id);
        $data = $this->db->get('contas');
        return $data->row_array();
    }

    public function updateTitulos($id, $new){
        $this->db->where('titulos_id', $id);
        $this->db->update('titulos', $new);
    }
    
    public function deletePai($id){
        $this->db->where('titulos_id', $id);
        $this->db->delete('titulos');
    }
    
    public function delTitulo($id){
        $this->db->where('titulos_id', $id);
        $this->db->delete('titulos');
        return 1;
    }
    
    public function getTitulosBaixadosByData($inicio, $fim){
        $this->db->where('titulos_baixa', 1);
        $this->db->where('titulos_id_pai', 0);
        $this->db->where('titulos_vencimento >=', $inicio);
        $this->db->where('titulos_vencimento <=', $fim);
        return $this->db->get('titulos')->result_array();
    }
    
    public function getTitulosBaixadosByDataQuantidade($inicio, $fim){
        $this->db->select('count(titulos_baixa) as contador');
        $this->db->where('titulos_baixa', 0);
        $this->db->where('titulos_vencimento >=', $inicio);
        $this->db->where('titulos_vencimento <=', $fim);
        $data = $this->db->get('titulos')->row_array();
        return $data['contador'];
    }
    
    
    
    

    
    public function get_countBaixadosFiltro($filter) {
        if($filter['data']){
            $data           = $filter['data'];
            $aux_data       = explode(' - ', $filter['data']);
            $aux_primeira   = explode('/', $aux_data[0]);
            $aux_segunda    = explode('/', $aux_data[1]);
        }
        
        $this->db->join('tipos_movimento t', 'titulos.titulos_tipo = t.tm_id');
        if($filter['texto']){
            $this->db->join('usuarios u', 'titulos.titulos_user_baixa = u.usuario_id');
            $this->db->like('u.usuario_nome', $filter['texto']);
        }
        
        if($filter['tipo'] != 'TODOS'){
            $this->db->like('t.tm_tipo', $filter['tipo']);    
        }
        
        if($filter['texto']){
            $this->db->or_like('t.tm_nome', $filter['texto']);   
            $this->db->or_like('titulos_numeroserie', $filter['texto']);   
        }
        
        $this->db->where('titulos_id_pai', 0);
        $this->db->where('titulos_baixa', 1);
        $this->db->where('titulos_completo', 1);
        
        if($filter['data'] && !$filter['texto']){
            $this->db->where('titulos_data_baixa >=', $aux_primeira[2] . '-' . $aux_primeira[1] . '-' . $aux_primeira[0]);
            $this->db->where('titulos_data_baixa <=', $aux_segunda[2] . '-' . $aux_segunda[1] . '-' . $aux_segunda[0]);
        }

        $result = $this->db->get('titulos')->result_array();
        
        $array = [];
        $cont = 0;
        
        if($filter['forneclin']){
            foreach($result as $r){
                if($r['titulos_forneclin'] == $filter['forneclin']){
                    $array[$cont] = $r;
                    $cont++;
                }
            }
            return count($array);
        } else {
            return count($result);
        }
    }
    
    public function getAllBaixadosFiltro($filter, $limit, $start){
        if($filter['data']){
            $data           = $filter['data'];
            $aux_data       = explode(' - ', $filter['data']);
            $aux_primeira   = explode('/', $aux_data[0]);
            $aux_segunda    = explode('/', $aux_data[1]);
        }
        
        $this->db->join('tipos_movimento t', 'titulos.titulos_tipo = t.tm_id');
        if($filter['texto']){
            $this->db->join('usuarios u', 'titulos.titulos_user_baixa = u.usuario_id');
            $this->db->like('u.usuario_nome', $filter['texto']);
        }
       
        if($filter['tipo'] != 'TODOS'){
            $this->db->like('t.tm_tipo', $filter['tipo']);    
        }
        
        if($filter['texto']){
            $this->db->or_like('t.tm_nome', $filter['texto']);   
            $this->db->or_like('titulos_numeroserie', $filter['texto']);   
        }
        
        $this->db->where('titulos_id_pai', 0);
        $this->db->where('titulos_baixa', 1);
        $this->db->where('titulos_completo', 1);
        
        if($filter['data'] && !$filter['texto']){
            $this->db->where('titulos_data_baixa >=', $aux_primeira[2] . '-' . $aux_primeira[1] . '-' . $aux_primeira[0]);
            $this->db->where('titulos_data_baixa <=', $aux_segunda[2] . '-' . $aux_segunda[1] . '-' . $aux_segunda[0]);
        }
        
        if(!$filter['forneclin']){
            $this->db->limit($limit, $start);
        }
        $this->db->order_by('titulos_vencimento', 'asc');
        $result = $this->db->get('titulos')->result_array();
        
        $array = [];
        $cont = 0;
        $array2 = [];
        $cont2 = 0;
        
        if($filter['forneclin']){
            foreach($result as $r){
                if($r['titulos_forneclin'] == $filter['forneclin']){
                    $array[$cont] = $r;
                    $cont++;
                }
            }
        
            for($i = $start; $i < count($array);$i++){
                if($i < $limit + $start){
                    $array2[$cont2] = $array[$i];
                    $cont2++;
                }
            }
            return $array2;
        } else {
            return $result;
        }
    }
    
    
    
    
    
    public function get_countIncompletos() {
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('titulos_completo', 0);
        $this->db->where('titulos_baixa', 0);
        $a = $this->db->get('titulos')->row_array();
        return $a['pages'];
    }
    
    public function getAllIncompletos($limit, $start){
        $this->db->where('titulos_completo', 0);
        $this->db->where('titulos_baixa', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by('titulos_id', 'desc');
        return $this->db->get('titulos')->result_array();
    }
    
    public function get_countIncompletosFiltro($filter) {
        $filtrovalor = str_replace('R$', '', $filter);
        $filtrovalor = str_replace(' ', '', $filtrovalor);
        $filtrovalor = str_replace('.', '', $filtrovalor);
        $filtrovalor = str_replace(',', '.', $filtrovalor);
        $filtrovalor = str_replace(' ', '.', $filtrovalor);
        
        $this->db->select(" COUNT(*) as pages");
        $this->db->join('tipos_movimento', 'titulos.titulos_tipo = tipos_movimento.tm_id');
        $this->db->where('titulos_completo', 0);
        $this->db->like('tm_nome', trim($this->tirarAcentos($filter)), 'both');
        $this->db->or_like('titulos_numeroserie', trim($filter), 'both');
        $this->db->or_like('titulos_valor', $filtrovalor, 'both');
        $a = $this->db->get('titulos')->row_array();
        return $a['pages'];
    }
    
    public function getAllIncompletosFiltro($filter, $limit, $start){
        $filtrovalor = str_replace('R$', '', $filter);
        $filtrovalor = str_replace(' ', '', $filtrovalor);
        $filtrovalor = str_replace('.', '', $filtrovalor);
        $filtrovalor = str_replace(',', '.', $filtrovalor);
        $filtrovalor = str_replace(' ', '.', $filtrovalor);
        
        $this->db->join('tipos_movimento', 'titulos.titulos_tipo = tipos_movimento.tm_id');
        $this->db->where('titulos_completo', 0);
        $this->db->like('tm_nome', trim($this->tirarAcentos($filter)), 'both');
        $this->db->or_like('titulos_numeroserie', trim($filter), 'both');
        $this->db->or_like('titulos_valor', $filtrovalor, 'both');
        $this->db->limit($limit, $start);
        $this->db->order_by('titulos_id', 'desc');
        return $this->db->get('titulos')->result_array();
    }
    
    
    
    
    
    
    
    public function get_countAbertasFiltro($filter = null) {
        if(!$filter['texto']){
            $this->db->join('tipos_movimento t', 'titulos.titulos_tipo = t.tm_id');
            
            if($filter['tipo'] != 'TODOS'){
                $this->db->like('t.tm_tipo', $filter['tipo']);    
            }
            
            if($filter['data']){
                $data           = $filter['data'];
                $aux_data       = explode(' - ', $filter['data']);
                $aux_primeira   = explode('/', $aux_data[0]);
                $aux_segunda    = explode('/', $aux_data[1]);
                $this->db->where('titulos_vencimento >=', $aux_primeira[2] . '-' . $aux_primeira[1] . '-' . $aux_primeira[0]);
                $this->db->where('titulos_vencimento <=', $aux_segunda[2] . '-' . $aux_segunda[1] . '-' . $aux_segunda[0]);
            }
        } else {
            $this->db->join('tipos_movimento t', 'titulos.titulos_tipo = t.tm_id');
            
            $this->db->or_like('t.tm_nome', $filter['texto'], 'both');   
            $this->db->or_like('titulos_numeroserie', $filter['texto'], 'both');   
        }
        
        $this->db->where('titulos_baixa', 0);
        $this->db->where('titulos_completo', 1);
        
        $result = $this->db->get('titulos')->result_array();
        
        $array = [];
        $cont = 0;
        
        if($filter['forneclin']){
            foreach($result as $r){
                if($r['titulos_forneclin'] == $filter['forneclin']){
                    $array[$cont] = $r;
                    $cont++;
                }
            }
            return count($array);
        } else {
            return count($result);
        }
        
    }
    
    public function getAllAbertasFiltro($filter = null, $limit, $start){
        if(!$filter['texto']){

            $this->db->join('tipos_movimento t', 'titulos.titulos_tipo = t.tm_id');
            
            if($filter['tipo'] != 'TODOS'){
                $this->db->like('t.tm_tipo', $filter['tipo']);    
            }
            
            if($filter['data']){
                $data           = $filter['data'];
                $aux_data       = explode(' - ', $filter['data']);
                $aux_primeira   = explode('/', $aux_data[0]);
                $aux_segunda    = explode('/', $aux_data[1]);
                $this->db->where('titulos_vencimento >=', $aux_primeira[2] . '-' . $aux_primeira[1] . '-' . $aux_primeira[0]);
                $this->db->where('titulos_vencimento <=', $aux_segunda[2] . '-' . $aux_segunda[1] . '-' . $aux_segunda[0]);
            }
        } else {
            $this->db->join('tipos_movimento t', 'titulos.titulos_tipo = t.tm_id');
            
            $this->db->like('t.tm_nome', $filter['texto']);   
            $this->db->or_like('titulos_numeroserie', $filter['texto']);   
        }
        
        $this->db->where('titulos_baixa', 0);
        $this->db->where('titulos_completo', 1);
        
        if(!$filter['forneclin']){
            $this->db->limit($limit, $start);
        }
        $this->db->order_by('titulos_vencimento', 'asc');
        $result = $this->db->get('titulos')->result_array();
        
        $array = [];
        $cont = 0;
        $array2 = [];
        $cont2 = 0;
        
        if($filter['forneclin']){
            foreach($result as $r){
                if($r['titulos_forneclin'] == $filter['forneclin']){
                    $array[$cont] = $r;
                    $cont++;
                }
            }
        
            for($i = $start; $i < count($array);$i++){
                if($i < $limit + $start){
                    $array2[$cont2] = $array[$i];
                    $cont2++;
                }
            }
            return $array2;
        } else {
            return $result;
        }
    }
    
    public function tirarAcentos($string){
       return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }
    
    public function populaT($filtro){
        $this->db->where('titulos_tipo', $filtro['tipo']);
        $this->db->where('titulos_completo', 1);
        $this->db->where('titulos_baixa', 0);
        $this->db->where('titulos_forneclin', $filtro['forneclin']);
        return $this->db->get('titulos')->result_array();
    }
    
    public function updateDataBaixado($id, $data){
        $this->db->where('titulos_id', $id);
        $a = $this->db->get('titulos')->row_array();
        
        $a['titulos_data_baixa'] = $data;
        
        $this->db->replace('titulos', $a);
    }
    
}