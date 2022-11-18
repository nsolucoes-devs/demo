<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacoesmodel extends CI_Model{
    
    /*HOME
    CADASTROS
    CHECKLIST
    >Home: mdi-home
    >Cadastros: mdi-account-plus
    >Checklist: mdi-playlist-check

    
    */
    
    public function estoque(){
        $j=0;
        
        $this->db->where('produto_ativo_id', 1);
        $this->db->select('produto_id, produto_qtdminimo, produto_nome');
        $aux = $this->db->get('produtos')->result_array();
        for($i=0; $i<count($aux); $i++){
            $this->db->where('produto_ativo_id', $aux[$i]['produto_id']);
            $this->db->select("SUM('estoque_quantidade')");
            $aux2 = $this->db->get('produtos');
            
            if($aux[$i]['produto_qtdminimo'] <= $aux2){
                $dados[$j] = array(
                    'link'              => 'mostrarpeca/'.$aux[$i]['produto_id'],
                    'tipo'              => 'estoque',
                    'icon'              => 'mdi-package-variant-closed',
                    'notificacao_tipo'  => "QUANTIDADE DO ESTOQUE",
                    'notificacao_id'    => $aux[$i]['produto_id'],
                    'notificacao'       => "Quantidade mínima atingida ou ultrapassada do produto ".$aux[$i]['produto_nome'],
                    'data'              => date('d-m-Y'),
                    );
                $j++;    
            }
        }
        return $dados;
    }
    
    public function financeiro(){
        $j=0;
        $dataI = date('Y-m-d');
        $dataF = date('Y-m-d', strtotime('+5 days'));
        
        $this->db->where('titulos_completo', 0);
        $this->db->select('titulos_id, titulos_IO, titulos_numeroserie');
        $aux = $this->db->get('titulos')->result_array();
        for($i=0; $i<count($aux); $i++){
            $dados[$j] = array(
                'link'              => 'movimentosfinanceiro',
                'tipo'              => 'financeiro',
                'icon'              => 'mdi-bank',
                'notificacao_tipo'  => "TÍTULOS COM PENDENCIA",
                'notificacao_id'    => $aux[$i]['titulos_id'],
                'notificacao'       => "Título nº/série:".$aux[$i]['titulos_numeroserie']." encontra-se com informações pendentes.",
                'data'              => date('d-m-Y'),
                );
            $j++;    
        }
        
        $this->db->where("titulos_vencimento BETWEEN '".$dataI."' AND '".$dataF."'");
        $this->db->select('titulos_id, titulos_vencimento, titulos_numeroserie, titulos_valor');
        $aux = $this->db->get('titulos')->result_array();
        for($i=0; $i<count($aux); $i++){
            $dados[$j] = array(
                'link'                  => 'movimentosfinanceiro',
                'tipo'                  => 'financeiro',
                'icon'                  => 'mdi-bank',
                'notificacao_tipo'    => "TÍTULOS COM VENCIMENTO PRÓXIMO",
                'notificacao_id'        => $aux[$i]['titulos_id'],
                'notificacao'     => "Título nº/série:".$aux[$i]['titulos_numeroserie']."com valor de ".$aux[$i]['titulos_valor']." vencimento em".$aux[$i]['titulos_vencimento'],
                'data'                  => date('d-m-Y'),
                );
            $j++;    
        }
        
        $this->db->where("titulos_vencimento < '".$dataI."'");
        $this->db->select('titulos_id, titulos_vencimento, titulos_numeroserie, titulos_valor');
        $aux = $this->db->get('titulos')->result_array();
        for($i=0; $i<count($aux); $i++){
            $dados[$j] = array(
                'link'                  => 'movimentosfinanceiro',
                'tipo'                  => 'financeiro',
                'icon'                  => 'mdi-bank',
                'notificacao_tipo'    => "TÍTULOS VENCIDOS",
                'notificacao_id'        => $aux[$i]['titulos_id'],
                'notificacao'     => "Título nº/série:".$aux[$i]['titulos_numeroserie']."com valor de ".$aux[$i]['titulos_valor']." vencido em".$aux[$i]['titulos_vencimento'],
                'data'                  => date('d-m-Y'),
                );
            $j++;    
        }
        
        return $dados;
    }

    public function frota(){
        $id=0;
        $j=0;
        for($i=0; $i<1; $i++){
            $dados[$j] = array(
                'link'              => 'mostrarveiculo/'.$id, //pneus (com o $id como uma coluna)
                'tipo'              => 'frota',
                'icon'              => 'mdi-truck',
                'notificacao_tipo'  => "",
                'notificacao_id'    => "",
                'notificacao'       => "",
                'data'              => date('d-m-Y'),
                );
            $j++;    
        }
        return $dados;
    }
    
    public function manutencao(){
        $j=0;
        $dataI = date('Y-m-d');
        $dataF = date('Y-m-d', strtotime('+5 days'));
        $dados = null;
        
        $this->db->where('os_situacao_id', 1);
        $this->db->select('os_id, os_data_abertura, os_hora_abertura, os_frota_id, ');
        $aux = $this->db->get('ordem_servico')->result_array();
        if($aux != null && $aux != ""){
            for($i=0; $i<1; $i++){
                $this->db->where('frota_id', $aux[$i]['os_frota_id']);
                $this->db->select('frota_codigo');
                $frota = $this->db->get('frota')->row_array();
                $dados[$j] = array(
                    'link'              => 'mostrarordemdeservico/'.$aux[$i]['os_id'],
                    'tipo'              => 'manutencao',
                    'icon'              => 'mdi-wrench',
                    'notificacao_tipo'  => "OS ABERTAS",
                    'notificacao_id'    => $aux[$i]['os_id'],
                    'notificacao'       => "Ordem de serviço nº ".$aux[$i]['os_id'].", aberta no dia ".date('d/m/Y', strtotime($aux[$i]['os_data_abertura']))." as ".$aux[$i]['os_hora_abertura'].", para o veículo ".$frota['frota_codigo'].".",
                    'data'              => date('d-m-Y'),
                );
                $j++;    
            }
        }
        return $dados;
    }
    
    public function checklist(){}
    public function cadastros(){}
    public function home(){}
}    