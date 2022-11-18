<?php

class Calendariomodel extends CI_Model {

	public function template(){
	    $template = "
    	    {table_open}<table>{/table_open}
    
            {heading_row_start}<tr class='header'>{/heading_row_start}
    
            {heading_previous_cell}<th><a style='color: white!important' id='anteriorGui'>&lt;</a></th>{/heading_previous_cell}
            {heading_title_cell}<th colspan='{colspan}'>{heading}</th>{/heading_title_cell}
            {heading_next_cell}<th><a style='color: white!important;' id='proximoGui'>&gt;</a></th>{/heading_next_cell}
    
            {heading_row_end}</tr>{/heading_row_end}
    
            {week_row_start}<tr class='week'>{/week_row_start}
            {week_day_cell}<td>{week_day}</td>{/week_day_cell}
            {week_row_end}</tr>{/week_row_end}
    
            {cal_row_start}<tr>{/cal_row_start}
            {cal_cell_start}<td>{/cal_cell_start}
            {cal_cell_start_today}<td>{/cal_cell_start_today}
            {cal_cell_start_other}<td class='other-month'>{/cal_cell_start_other}
    
            {cal_cell_content}<a href='{content}'>{day}</a>{/cal_cell_content}
            {cal_cell_content_today}<div class='highlight'><a href='{content}'>{day}</a></div>{/cal_cell_content_today}
    
            {cal_cell_no_content}{day}{/cal_cell_no_content}
            {cal_cell_no_content_today}<div class='highlight'>{day}</div>{/cal_cell_no_content_today}
    
            {cal_cell_blank}&nbsp;{/cal_cell_blank}
    
            {cal_cell_other}{day}{/cal_cel_other}
    
            {cal_cell_end}</td>{/cal_cell_end}
            {cal_cell_end_today}</td>{/cal_cell_end_today}
            {cal_cell_end_other}</td>{/cal_cell_end_other}
            {cal_row_end}</tr>{/cal_row_end}
    
            {table_close}</table>{/table_close}
        ";
        return $template;
	}
	
	
	public function __construct(){
		$this->prefs = array(
            'local_time'        => time(),
            'start_day'         => 'sunday',
            'month_type'        => 'long',
            'day_type'          => 'long',
            'show_next_prev'    => TRUE,
            'next_prev_url'     => '?',
            'show_other_days'   => FALSE,
            'template'          => $this->template(),
		);
    }
        
	public function getcalender(){
		$this->load->library('calendar',$this->prefs); // Load calender livraria
		if($this->uri->segment(2)){
		    $aux = explode('-', $this->uri->segment(2) .'-'.$this->uri->segment(3).'-01');
		} else {
		    $aux = explode('-', date('Y-m-d'));    
		}
		$year = $aux[0];
		$month = $aux[1];
		$day = $aux[2];
		$this->db->where("titulos_vencimento LIKE '%-".$month."-%'");
		$this->db->where("titulos_baixa", 0);
		$this->db->select('titulos_vencimento');
		$aux = $this->db->get('titulos')->result_array();
		
		if($aux != null && $aux != ""){
		    foreach($aux as $dts){
		        $a = explode("-", $dts['titulos_vencimento']);
		        $data[(int)$a[2]] = base_url('movimentosfinanceiro/f/'.$a[2]."a".$a[1]."a".$a[0]." - ".$a[2]."a".$a[1]."a".$a[0].'¬TODOS¬¬/');
		    }

		    return $this->calendar->generate($year , $month , $data);
		}else{
		    return $this->calendar->generate($year , $month);
		}
	}

}