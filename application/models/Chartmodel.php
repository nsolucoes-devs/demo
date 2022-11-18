<?php

class Chartmodel extends CI_Model {
            
    function chartFrotaManu(){
        //SELECT COUNT(`os_frota_id`), `frota_codigo` FROM `ordem_servico` INNER JOIN `frota` ON (`os_frota_id` = `frota_id`) GROUP BY `frota_codigo`
        $this->db->select('COUNT(os_frota_id), frota_codigo');
        $this->db->join('frota', '`os_frota_id` = `frota_id`', 'inner');
        $this->db->group_by('frota_codigo');
        $aux = $this->db->get('ordem_servico')->result_array();

        $html = "
            function drawChart1() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Código de Frota');
                data.addColumn('number', 'OS');
                data.addRows([";
                for($i=0; $i<count($aux); $i++){
                    $html .= "['".$aux[$i]['frota_codigo']."', ".$aux[$i]['COUNT(os_frota_id)']." ],";
                }
                $html .= "]);
        
                // Set chart options
                var options = {
                        'legend':'right',
                        'title':'Frota em Manutenção',
                        'is3D':true,
                        'width':500,
                        'height':300
                };
                var chart = new google.visualization.PieChart(document.getElementById('chart1_div'));
                chart.draw(data, options);
            }";
        return $html;
    }
    
    function chartPecasOs(){
        //SELECT COUNT(`os_frota_id`), `frota_codigo` FROM `ordem_servico` INNER JOIN `frota` ON (`os_frota_id` = `frota_id`) GROUP BY `frota_codigo`
        $this->db->select('COUNT(os_frota_id), frota_codigo');
        $this->db->join('frota', '`os_frota_id` = `frota_id`', 'inner');
        $this->db->group_by('frota_codigo');
        $aux = $this->db->get('ordem_servico')->result_array();

        $html = "
            function drawChart2() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Código de Frota');
                data.addColumn('number', 'OS');
                data.addRows([";
                for($i=0; $i<count($aux); $i++){
                    $html .= "['".$aux[$i]['frota_codigo']."', ".$aux[$i]['COUNT(os_frota_id)']." ],";
                }
                $html .= "]);
        
                // Set chart options
                var options = {
                        'legend':'right',
                        'title':'Frota em Manutenção',
                        'is3D':true,
                        'width':500,
                        'height':300
                };
                var chart = new google.visualization.PieChart(document.getElementById('chart2_div'));
                chart.draw(data, options);
            }";
        return $html;
    }
    
    function chartIO(){
        $date = date('Y-m-01');
        $datefim = date('Y-m-t');
        $this->db->select('titulos_vencimento, SUM(titulos_valorpago), titulos_IO');
        $this->db->where("titulos_vencimento BETWEEN '".$date."' AND '".$datefim."'");
        $this->db->group_by('titulos_vencimento, titulos_IO');
        $aux = $this->db->get('titulos')->result_array();

        $html = "
            function drawChart3() {
                var data = google.visualization.arrayToDataTable([
                    ['Data', 'Entrada', 'Saída'],";
        $j=0;
        for($i=0; $i<(count($aux));){
            if($aux[$i]['titulos_IO'] = 'ENTRADA' && $aux[$i+1]['titulos_IO'] = 'SAIDA'){
                $dt = explode("-", $aux[$i]['titulos_vencimento']);
                $html .= "['".$dt[2]."', ".$aux[$i]['titulos_valorpago'].", ".$aux[$i+1]['SUM(titulos_valorpago)']."],";
                $i = $i+2;
            }elseif($aux[$i]['titulos_IO'] = 'ENTRADA' && $aux[$i+1]['titulos_IO'] = 'ENTRADA'){
                $dt = explode("-", $aux[$i]['titulos_vencimento']);
                $html .= "['".$dt[2]."', ".$aux[$i]['SUM(titulos_valorpago)'].", 0],";
                $i = $i+1;
            }elseif($aux[$i]['titulos_IO'] = 'SAIDA'){
                $dt = explode("-", $aux[$i]['titulos_vencimento']);
                $html .= "['".$dt[2]."', 0, ".$aux[$i]['SUM(titulos_valorpago)']."],";
                $i = $i+1;
            }
            $j++;
        }
        $html .="]);
                var options = {
                        'legend':{ position: 'bottom' },
                        'title':'Movimento de Entrada e Saída (Mês Atual)',
                        'curveType': 'function',
                        'width':600,
                        'height':300
                };
                var chart = new google.visualization.LineChart(document.getElementById('chart3_div'));
                chart.draw(data, options);
            }";
        return $html;

    }
}