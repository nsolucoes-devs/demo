<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Estoquemodel extends CI_Model{
    
    public function getTipos(){

        $data = $this->db->get('tipos_movimento');
        
        return $data->result_array();
    }
    
    public function getTipos2(){

        $data = $this->db->get('tipos_movimento');
        return $data->result_array();
    }
    
    public function getTiposProd(){
        $this->db->where('tm_produto', 1);
        return $this->db->get('tipos_movimento')->result_array();
    }
    
    public function getTiposServ(){
        $this->db->where('tm_servico', 1);
        return $this->db->get('tipos_movimento')->result_array();
    }
    
    public function getTiposAtivos(){
        $this->db->where('tm_ativo_id', 1);
        $data = $this->db->get('tipos_movimento');
        return $data->result_array();
    }
    
    public function getTipoUnico($id){
        $this->db->where('tm_id', $id);
        $data = $this->db->get('tipos_movimento');
        return $data->row_array();
    }
    
    public function getTipoUnicoNome($id){
        $this->db->where('tm_id', $id);
        $data = $this->db->get('tipos_movimento')->row_array();
        return $data['tm_nome'];
    }
    
    public function getTipo($id){
        $this->db->where('tm_id', $id);
        $data = $this->db->get('tipos_movimento')->row_array();
        return $data['tm_tipo'];
    }
    
    public function insertTipo($new){
        $this->db->insert('tipos_movimento', $new);
        return $this->db->insert_id();
    }
    
    public function editTipo($edit, $id){
        $this->db->where('tm_id', $id);
        $this->db->update('tipos_movimento', $edit);
    }
    
    public function unikey($chave){
        $this->db->where('notafiscal_chave', $chave);
        $data = $this->db->get('notasfiscais');
        return $data->row_array();
    }
    
    public function getLastIdNota(){
        $this->db->order_by('notafiscal_id', 'DESC');
        $data = $this->db->get('notasfiscais')->row_array();
        return $data['notafiscal_id'];
    }
    
    public function putnota($dados){
        $this->db->insert('notasfiscais', $dados);
        return $this->db->insert_id();
    }
    
    public function getNotas(){
        $this->db->where('notafiscal_cliente', 0);
        $data = $this->db->get('notasfiscais');
        return $data->result_array();
    }
    
    public function getNotasClientes(){
        $this->db->where('notafiscal_cliente', 1);
        $data = $this->db->get('notasfiscais');
        return $data->result_array();
    }
    
    public function getNotasFilter($filtros){
        if($filtros['forn'] != ""){
            $this->db->where('notafiscal_fornecedor', $filtros['forn']);
        }
        $retrieve = $this->db->get('notasfiscais');
        $retrieve = $retrieve->result_array();
        
        $newR = [];
        
        if($filtros['de'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['notafiscal_dtemissao']);
                if((int)$dt >= (int)$filtros['de']){
                    if($filtros['ate'] != ""){
                        if((int)$dt <= (int)$filtros['ate']){
                            if($filtros['peca'] != ""){
                                $rt['estoque'] = $this->getEstoquesByNotaFilter($rt['notafiscal_id'], $filtros['peca']);
                            }else{
                                $rt['estoque'] = $this->getEstoquesByNota($rt['notafiscal_id']);
                            }
                            
                            $newR[$i] = $rt;
                            $i++;
                        }
                    }else{
                        if($filtros['peca'] != ""){
                            $rt['estoque'] = $this->getEstoquesByNotaFilter($rt['notafiscal_id'], $filtros['peca']);
                        }else{
                            $rt['estoque'] = $this->getEstoquesByNota($rt['notafiscal_id']);
                        }
                            
                        $newR[$i] = $rt;
                        $i++;
                    }
                }
                
            }
        }else if($filtros['ate'] != ""){
            $i = 0;
            foreach($retrieve as $rt){
                $dt = strtotime($rt['notafiscal_dtemissao']);
                if((int)$dt <= (int)$filtros['ate']){
                    if($filtros['peca'] != ""){
                        $rt['estoque'] = $this->getEstoquesByNotaFilter($rt['notafiscal_id'], $filtros['peca']);
                    }else{
                        $rt['estoque'] = $this->getEstoquesByNota($rt['notafiscal_id']);
                    }
                    
                    $newR[$i] = $rt;
                    $i++;
                }
            }
        }else{
            $i = 0;
            foreach($retrieve as $rt){
                if($filtros['peca'] != ""){
                    $rt['estoque'] = $this->getEstoquesByNotaFilter($rt['notafiscal_id'], $filtros['peca']);
                }else{
                    $rt['estoque'] = $this->getEstoquesByNota($rt['notafiscal_id']);
                }
                
                $newR[$i] = $rt;
                $i++;
            }
        }
        
        return $newR;
    }
    
    public function updateNota($nota, $id){
        $this->db->where('notafiscal_id', $id);
        $this->db->update('notasfiscais', $nota);
    }
    
    public function getNotaUnica($id){
        $this->db->where('notafiscal_id', $id);
        $data = $this->db->get('notasfiscais');
        return $data->row_array();
    }
    
    public function deleteNota($id){
        $this->db->where('notafiscal_id', $id);
        $this->db->delete('notasfiscais');
    }
    
    public function produtoById($id){
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos');
        return $data->row_array();
    }
    
    public function updateprodutoById($dados, $id){
        $this->db->where('produto_id', $id);
        $this->db->update('produtos', $dados);
    }
    
    public function insertUpdateId($dados){
        $this->db->insert('produtos', $dados);
        return $this->db->insert_id();
    }
    
    public function getLastIdProduto(){
        $this->db->order_by('produto_id', 'DESC');
        //$this->db->limit(1);
        $data = $this->db->get('produtos');
        return $data->row_array();
    }
    
    public function updateEstoqueId($new, $old){
        $this->db->set('estoque_produto_id', $new);
        $this->db->where('estoque_produto_id', $old);
        $this->db->update('estoque');
    }
    
    public function updateEstoque($est, $id){
        $this->db->where('estoque_id', $id);
        $this->db->update('estoque', $est);
    }
    
    public function deleteEstoque($id){
        $this->db->where('estoque_id', $id);
        $this->db->delete('estoque');
    }
    
    public function deleteEstoqueByNota($id){
        $this->db->where('estoque_nota_id', $id);
        $this->db->delete('estoque');
    }
    
    public function getEstoqueById($id){
        $this->db->where('estoque_id', $id);
        $data = $this->db->get('estoque');
        return $data->row_array();
    }
    
    public function getEstoquesByNota($id){
        $this->db->where('estoque_nota_id', $id);
        return $this->db->get('estoque')->result_array();
    }
    
    public function getEstoquesByNotaFilter($id, $filter){
        $this->db->where('estoque_nota_id', $id);
        $this->db->where('estoque_produto_id', $filter);
        $data = $this->db->get('estoque');
        return $data->result_array();
    }
    
    public function getEstoquesByNotaAndProduto($id, $produto){
        $this->db->where('estoque_nota_id', $id);
        $this->db->where('estoque_produto_id', $produto);
        return $this->db->get('estoque')->row_array();
    }
    
    public function insertEstoque($new){
        $this->db->insert('estoque', $new);
        return $this->db->insert_id();
    }
    
    public function insertNotaServico($new){
        $this->db->insert('nota_servicos', $new);
    }
    
    public function getNotaServicos($id){
        $this->db->where('ns_nota_id', $id);
        return $this->db->get('nota_servicos')->result_array();
    }
    
    public function getNotaServico($id){
        $this->db->where('ns_id', $id);
        return $this->db->get('nota_servicos')->row_array();
    }
    
    public function getNotaServicoDouble($nota, $servico){
        $this->db->where('ns_nota_id', $nota);
        $this->db->where('ns_servico_id', $servico);
        return $this->db->get('nota_servicos')->row_array();
    }
    
    public function updateNotaServico($ns, $id){
        $this->db->where('ns_id', $id);
        $this->db->update('nota_servicos', $ns);
    }
    
    public function deleteNotaServico($id){
        $this->db->where('ns_id', $id);
        $this->db->delete('nota_servicos');
    }
    
    public function deleteNotaServicoByNota($id){
        $this->db->where('ns_nota_id', $id);
        $this->db->delete('nota_servicos');
    }
    
    
    
    
    public function get_countNotasFiltro($filter = null) {
        $this->db->select(" COUNT(*) as pages");
        if($filter != null){
            $aux_data = explode('/', $filter);
            if(count($aux_data) == 2){
                $filtrodata = $aux_data[1] . '-' . $aux_data['0'];
            } else if(count($aux_data) == 3){
                $filtrodata = $aux_data[2] . '-' .$aux_data[1] . '-' . $aux_data['0'];
            } else {
                $filtrodata = $filter;
            }
            
            $filtrovalor = str_replace('R$', '', $filter);
            $filtrovalor = str_replace(' ', '', $filtrovalor);
            $filtrovalor = str_replace('.', '', $filtrovalor);
            $filtrovalor = str_replace(',', '.', $filtrovalor);
            
            $this->db->join('tipos_movimento', 'notasfiscais.notafiscal_operacao = tipos_movimento.tm_id');
            $this->db->join('fornecedores', 'notasfiscais.notafiscal_fornecedor = fornecedores.fornecedor_cnpj');
            $this->db->like('tm_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('fornecedor_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_dtemissao', trim($filtrodata), 'both');
            $this->db->or_like('notafiscal_numero', trim($filter), 'both');
            $this->db->or_like('notafiscal_serie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_especie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_valorfinal', trim($filtrovalor), 'both');
        }
        $a = $this->db->get('notasfiscais')->row_array();
        return $a['pages'];
    }
    
    public function getAllNotasFiltro($filter = null, $limit, $start){
        if($filter != null){
            $aux_data = explode('/', $filter);
            if(count($aux_data) == 2){
                $filtrodata = $aux_data[1] . '-' . $aux_data['0'];
            } else if(count($aux_data) == 3){
                $filtrodata = $aux_data[2] . '-' .$aux_data[1] . '-' . $aux_data['0'];
            } else {
                $filtrodata = $filter;
            }
            
            $filtrovalor = str_replace('R$', '', $filter);
            $filtrovalor = str_replace(' ', '', $filtrovalor);
            $filtrovalor = str_replace('.', '', $filtrovalor);
            $filtrovalor = str_replace(',', '.', $filtrovalor);
            
            $this->db->join('tipos_movimento', 'notasfiscais.notafiscal_operacao = tipos_movimento.tm_id');
            $this->db->join('fornecedores', 'notasfiscais.notafiscal_fornecedor = fornecedores.fornecedor_cnpj');
            $this->db->like('tm_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('fornecedor_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_dtemissao', trim($filtrodata), 'both');
            $this->db->or_like('notafiscal_numero', trim($filter), 'both');
            $this->db->or_like('notafiscal_serie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_especie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_valorfinal', trim($filtrovalor), 'both');
        }
        $this->db->order_by('notafiscal_id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('notasfiscais')->result_array();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    public function get_countNotasClientesFiltro($filter = null) {
        
        $this->db->select(" COUNT(*) as pages");
        if($filter != null){
            $aux_data = explode('/', $filter);
            if(count($aux_data) == 2){
                $filtrodata = $aux_data[1] . '-' . $aux_data['0'];
            } else if(count($aux_data) == 3){
                $filtrodata = $aux_data[2] . '-' .$aux_data[1] . '-' . $aux_data['0'];
            } else {
                $filtrodata = $filter;
            }
            
            $filtrovalor = str_replace('R$', '', $filter);
            $filtrovalor = str_replace(' ', '', $filtrovalor);
            $filtrovalor = str_replace('.', '', $filtrovalor);
            $filtrovalor = str_replace(',', '.', $filtrovalor);
            
            $this->db->join('tipos_movimento', 'notasfiscais.notafiscal_operacao = tipos_movimento.tm_id');
            $this->db->join('clientes', 'notasfiscais.notafiscal_fornecedor = clientes.cliente_cpfcnpj');
            $this->db->like('tm_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('cliente_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_dtemissao', trim($filtrodata), 'both');
            $this->db->or_like('notafiscal_numero', trim($filter), 'both');
            $this->db->or_like('notafiscal_serie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_especie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_valorfinal', trim($filtrovalor), 'both');
        }
        $a = $this->db->get('notasfiscais')->row_array();
        return $a['pages'];
    }
    
    public function getAllNotasClientesFiltro($filter = null, $limit, $start){
        if($filter != null){
            $aux_data = explode('/', $filter);
            if(count($aux_data) == 2){
                $filtrodata = $aux_data[1] . '-' . $aux_data['0'];
            } else if(count($aux_data) == 3){
                $filtrodata = $aux_data[2] . '-' .$aux_data[1] . '-' . $aux_data['0'];
            } else {
                $filtrodata = $filter;
            }
            
            $filtrovalor = str_replace('R$', '', $filter);
            $filtrovalor = str_replace(' ', '', $filtrovalor);
            $filtrovalor = str_replace('.', '', $filtrovalor);
            $filtrovalor = str_replace(',', '.', $filtrovalor);
            
            $this->db->join('tipos_movimento', 'notasfiscais.notafiscal_operacao = tipos_movimento.tm_id');
            $this->db->join('clientes', 'notasfiscais.notafiscal_fornecedor = clientes.cliente_cpfcnpj');
            $this->db->like('tm_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('cliente_nome', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_dtemissao', trim($filtrodata), 'both');
            $this->db->or_like('notafiscal_numero', trim($filter), 'both');
            $this->db->or_like('notafiscal_serie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_especie', trim($this->tirarAcentos($filter)), 'both');
            $this->db->or_like('notafiscal_valorfinal', trim($filtrovalor), 'both');
        }
        $this->db->order_by('notafiscal_id', 'desc');
        $this->db->limit($limit, $start);
        return $this->db->get('notasfiscais')->result_array();
    }
    
    public function tirarAcentos($string){
       return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

}