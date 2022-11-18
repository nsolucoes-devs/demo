<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
	    $this->load->database();
	    $this->load->model('Calendariomodel');
	    $this->load->model('Chartmodel');
	    $this->load->model('usuariosmodel');
	    $this->load->model('validamodel');
	    $this->load->model('financeiromodel');
	    $this->load->model('manutencaomodel');
	    date_default_timezone_set('America/Sao_Paulo');
	}
    
	function newpass(){
	    $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
	    $aux['usuario_senha'] = MD5($this->input->post('senha'));
	    $aux['usuario_datasenha'] = date("Y-m-d");
	    $this->usuariosmodel->update($aux, $this->session->userdata('user_id'));
	    redirect(base_url('home/index'));
	}
	
	public function index(){
        $this->acessorestrito('Home', 'full');
	    $aux = $this->usuariosmodel->getByID($this->session->userdata('user_id'));
        $permissao = $this->validamodel->permissao($this->session->userdata("funcao"));
        $permissao = explode('|', $permissao['funcao_permissao']);
        $j=0;
        for($i=0; $i<count($permissao); $i++){
            $permas = explode('-',$permissao[$i]);
            $libera[$i] = $permas[0];
            
        }
	    $notificacoes = $this->alertas($libera);
	    
	    foreach($notificacoes as $not){
	        $alertas[$j] = array(
	            'link'              => $not['link'],
	            'icon'              => $not['icon'],
                'data'              => $not['data'],
                'notificacao_tipo'  => $not['notificacao_tipo'],
                'notificacao'       => $not['notificacao'],
                );
            $j++;
	    }

	    $data = array(
            'datasenha'     => (strtotime(date('Y-m-d')) - strtotime($aux['usuario_datasenha']))/86400,
            'alertas'       => $alertas,
            'notificacoes'  => $alertas,
            'calendar'      => $this->Calendariomodel->getcalender(),
            'chart'         => $this->Chartmodel->chartFrotaManu(),
            //'chart2'        => $this->Chartmodel->chartPecasOs(),
            //'chart3'        => $this->Chartmodel->chartIO(),
            'os'            => $this->manutencaomodel->getAllAbertas(),
        );
        
        if($aux['usuario_senha'] == MD5($aux['usuario_cpf'])){
	        $data['senha'] = true;
	    }else{
	        $data['senha'] = false;
	    }
	    
	    $this->header('1');
		$this->load->view('index', $data);
		$this->footer();
	}
	
	public function dadosFinanceiro(){
	    
	    $dias = $this->input->post('dias');
	    
	    $fim = date('Y-m-d');
	    if($dias != 1){
	        $inicio = date('Y-m-d', strtotime('-'.$dias.' days'));    
	    } else {
	        $inicio = date('Y-m-d');
	    }
	    
	    $totalentrada = 0;
	    $totalsaida = 0;
	    
	    $titulos = $this->financeiromodel->getTitulosBaixadosByData($inicio, $fim);
	    $quantidade = $this->financeiromodel->getTitulosBaixadosByDataQuantidade($inicio, $fim);
	    
	    foreach($titulos as $t){
	        if($t['titulos_IO'] == "ENTRADA"){
	            $totalentrada = $totalentrada + $t['titulos_valorpago'];
	        } else if($t['titulos_IO'] == "SAIDA"){
	            $totalsaida = $totalsaida + $t['titulos_valorpago'];
	        }
	    }
	    
	    $inicio_os = date('Y-m-d');
	    if($dias != 1){
	        $fim_os = date('Y-m-d', strtotime('-'.$dias.' days'));    
	    } else {
	        $fim_os = date('Y-m-d');
	    }
	    
	    $arr = $this->manutencaomodel->getCustoFrota($inicio_os, $fim_os);
	    
	    array_multisort( array_column( $arr, 'custo' ), SORT_DESC, SORT_NUMERIC, $arr );
	    
	    $array = array(
	        'receber'   => $totalentrada,
	        'pagar'     => $totalsaida,
	        'quantidade'=> $quantidade,
	        'frotas'    => $arr,
	    );
	    
	    echo json_encode($array);
	}
	
	
	public function getCalendar() { 
            
            
            $data = array();
            $curentDate = date('Y-m-d', time());
            if ($this->input->post('page') !== null) {
                $malestr = str_replace("?", "", $this->input->post('page'));
                $navigation = explode('/', $malestr);
                $getYear = $navigation[1];
                $getMonth = $navigation[2];
            } else {
                $getYear = date('Y');
                $getMonth = date('m');
            }
            if ($this->input->post('year') !== null) {
                $getYear = $this->input->post('year');
            }
            if ($this->input->post('month') !== null) {
                $getMonth = $this->input->post('month'); 
            }
 
            $already_selected_value = $getYear;
            $earliest_year = 1950;
            $startYear = '';
            $googleEventArr = array();
            $calendarData = array();
 
            $class = 'href="'.base_url('movimentosfinanceiro/f/').'{day}'. 'a' . $getMonth . 'a' . $getYear .' - '. '{day}' .'a'. $getMonth . 'a' . $getYear. '¬TODOS¬¬/"';
 
            $startYear .= '<div class="col-md-6"><div class="select-control"><select name="year" id="setYearVal" class="form-control">';
        foreach (range
                (date
                        ('Y') + 50, $earliest_year) as $x) {
            $startYear .= '<option value="' . $x . '"' . ($x == $already_selected_value ? ' selected="selected"' : '') . '>' . $x . '</option>';
        }
        $startYear .= '</select></div></div>';
        $startMonth = '<div class="col-md-6"><div class="select-control"><select name="mont h" id="setMonthVal" class="form-control"><option value="0">Selecione o Mês</option>
            <option value="01" ' . ('01' == $getMonth ? ' selected="selected"' : '') . '>Janeiro</option>
            <option value="02" ' . ('02' == $getMonth ? ' selected="selected"' : '') . '>Fevereiro</option>
            <option value="03" ' . ('03' == $getMonth ? ' selected="selected"' : '') . '>Março</option>
            <option value="04" ' . ('04' == $getMonth ? ' selected="selected"' : '') . '>Abril</option>
            <option value="05" ' . ('05' == $getMonth ? ' selected="selected"' : '') . '>Maio</option>
            <option value="06" ' . ('06' == $getMonth ? ' selected="selected"' : '') . '>Junho</option>
            <option value="07" ' . ('07' == $getMonth ? ' selected="selected"' : '') . '>Julho</option>
            <option value="08" ' . ('08' == $getMonth ? ' selected="selected"' : '') . '>Agosto</option>
            <option value="09" ' . ('09' == $getMonth ? ' selected="selected"' : '') . '>Setembro</option>
            <option value="10" ' . ('10' == $getMonth ? ' selected="selected"' : '') . '>Outubro</option>
            <option value="11" ' . ('11' == $getMonth ? ' selected="selected"' : '') . '>Novembro</option>
            <option value="12" ' . ('12' == $getMonth ? ' selected="selected"' : '') . '>Dezembro</option>
    </select></div></div>';
    
        $prefs['template'] = '        
 
        {table_open}<table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
 
        {heading_row_start}<tr style="border:none;">{/heading_row_start}
 
        {heading_previous_cell}<th style="border:none;" class="padB"><a class="calnav" data-calvalue="{previous_url}" href="javascript:void(0);"><i class="fa fa-chevron-left fa-fw"></i></a></th>{/heading_previous_cell}
        {heading_title_cell}<th style="border:none;" colspan="{colspan}"><div class="row">' . $startMonth . '' . $startYear . '</div></th>{/heading_title_cell}
        {heading_next_cell}<th style="border:none;" class="padB"><a class="calnav" data-calvalue="{next_url}" href="javascript:void(0);"><i class="fa fa-chevron-right fa-fw"></i></a></th>{/heading_next_cell}
 
        {heading_row_end}</tr>{/heading_row_end}
 
        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<th>{week_day}</th>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}
 
        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
 
        {cal_cell_content}<a ' . $class . ' id="data-' . $getYear . '-' . $getMonth . '-' . '{day}">{day}</a>{content}{/cal_cell_content}
        {cal_cell_content_today}<a ' . $class . ' id="data-' . $getYear . '-' . $getMonth . '-' . '{day}">{day}</a>{content}<div class="highlight"></div>{/cal_cell_content_today}
 
        {cal_cell_no_content}<a ' . $class . ' id="data-' . $getYear . '-' . $getMonth . '-' . '{day}">{day}</a>{/cal_cell_no_content}
        {cal_cell_no_content_today}<a ' . $class . ' id="data-' . $getYear . '-' . $getMonth . '-' . '{day}">{day}</a><div class="highlight"></div>{/cal_cell_no_content_today}
 
        {cal_cell_blank}&nbsp;{/cal_cell_blank}
 
        {cal_cell_other}{day}{/cal_cel_other}
 
        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}
 
        {table_close}</table>{/table_close}';
        $prefs['start_day'] = 'monday';
        $prefs['day_type'] = 'long';
        $prefs['show_next_prev'] = TRUE;
        $prefs['next_prev_url'] = '?';
 
        // load calendar library 
        $this->load->library('calendar', $prefs);
        
		$aux = $this->financeiromodel->getTitulosByMonth($getMonth);
		
	    foreach($aux as $dts){
	        $a = explode("-", $dts['titulos_vencimento']);
	        $data[(int)$a[2]] = base_url('movimentosfinanceiro/f/'.$a[2]."a".$a[1]."a".$a[0]." - ".$a[2]."a".$a[1]."a".$a[0].'¬TODOS¬¬/');
	    }

        
        $data['calendar'] = $this->calendar->generate($getYear, $getMonth, $calendarData, $this->uri->segment(3), $this->uri->segment(4));
        echo $data['calendar'];
    }

}
