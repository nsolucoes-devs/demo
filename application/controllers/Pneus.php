<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pneus extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('fornecedoresmodel');
        $this->load->model('ativosmodel');
	    $this->load->model('produtosmodel');
	    $this->load->model('usuariosmodel');
    }
    
    public function indice(){
        $this->load->model('frotamodel');
        $data = array(
            'frota'    => $this->frotamodel->getAllAtivo(),
            'pneu'     => $this->frotamodel->getPneusAtivosUsos(),
            'situacao' => $this->frotamodel->getAllSitucacao(),
            'pneulivre'     => $this->frotamodel->getPneusAtivos(),
            );
        $this->header('5.3', 'PNEUS', 'manutencao', 'Manutenção', 'Pneus');
        $this->load->view('pneu/indice', $data);
        $this->footer();
    }
    
    public function rodizio(){
        $this->load->model('frotamodel');
        
        $frota = $this->frotamodel->getRowById($this->input->post('frota'));
        $pneus = $this->frotamodel->getPneuByFrota($this->input->post('frota'));
        
        $step = null;
        $tam = 0;
        if(count($pneus) > 0){
            foreach($pneus as $pneu){
                if($pneu['pneus_individual_posicao'] != "STEP"){
                    $aux = explode("|", $pneu['pneus_individual_posicao']);
                    $tires[] = array(
                        'id'        =>  $pneu['pneus_individual_id'],
                        'posicao'   =>  $aux[1],
                        'lado'      =>  $aux[0],
                        );
                    if($tam < $aux[1]){
                        $tam = $aux[1];
                    }
                }else{
                    $step = array(
                        'id'        =>  $pneu['pneus_individual_id'],
                        'posicao'   =>  "STEP",
                        'lado'      =>  "STEP",
                        );
                }
            }
            for($j=0; $j<count($tires); $j++){
                for($i=0; $i<=$tam; $i++){
                    if(!isset($esq[$i])){
                        $esq[$i] = null;
                    }
                    if($tires[$j]['lado'] == 'ESQ'){
                        if($tires[$j]['posicao'] == $i){
                            $esq[$i] = $tires[$j]['id'];    
                        }
                    }
                    
                    if(!isset($dir[$i])){
                        $dir[$i] = null;
                    }
                    if($tires[$j]['lado'] == 'DIR'){
                        if($tires[$j]['posicao'] == $i){
                            $dir[$i] = $tires[$j]['id'];    
                        }
                    }
                }
            }
            $data = array(
                'local' => "Rodízio",
                'esq'   => $esq,
                'dir'   => $dir,
                'pneus' => $pneus,
                'frota' => $frota,
                'tires' => 1,
                'step'  => $step,
            );
            $this->header('5.3', 'RODÍZIO DE PNEUS', 'manutencao', 'Manutenção', 'Rodízio de pneus');
        $this->load->view('pneu/troca', $data);
        $this->footer();
        }else{
            $this->troca($this->input->post('frota'));
        }
        
    }
    
    public function troca(){
        $this->load->model('frotamodel');
        $frota = $this->input->post('frota');
        $aux = $this->frotamodel->getPneuByFrota($frota);
        $eixo = 0;
        $i=0;
        $j=0;
        foreach($aux as $a){
            $helper = explode("¬", $a['pneus_individual_posicao']);
            if(strpos($a['pneus_individual_posicao'], "¬")){
                $helper = explode("¬", $a['pneus_individual_posicao']);
                if($helper[1] > $eixo){
                    $eixo = $helper[1];
                }
                $vazio[$j] = $helper[1];
            }else{
                $vazio[$j] = 0;
            }
            if($a['pneus_individual_posicao'] == 'STEP'){
                $step = $a['pneus_individual_marcacao']." | ".$a['pneus_individual_matricula']." | ".$a['pneus_individual_dot'];
            }elseif($a['pneus_individual_posicao'] == 'ESQ-FRT'){
                $frontalE = $a['pneus_individual_marcacao']." | ".$a['pneus_individual_matricula']." | ".$a['pneus_individual_dot'];
            }elseif($a['pneus_individual_posicao'] == 'DIR-FRT'){
                $frotalD = $a['pneus_individual_marcacao']." | ".$a['pneus_individual_matricula']." | ".$a['pneus_individual_dot'];
            }else{
                $pneus[$i] = $a['pneus_individual_posicao']."+".$a['pneus_individual_marcacao']." | ".$a['pneus_individual_matricula']." | ".$a['pneus_individual_dot'];
                $i++;
            }
            $j++;
        }
        
        for($k=2; $k<=$eixo; $k++){
            for($y=0; $y<count($vazio); $y++){
                if($vazio[$y] == $k){
                    $eixoVazio[$k] = 'pneus';
                    for($w=0; $w<count($pneus); $w++){
                        $pn = explode("¬", $pneus[$w]);
                        $pns = explode("+", $pn[1]);
                        if($pns[0] == $k){
                            if($pn[0] == 'DIR-EXT'){
                                $compose[$k]['DIR-EXT'] = $pns[1];
                            }elseif($pn[0] == 'ESQ-EXT'){
                                $compose[$k]['ESQ-EXT'] = $pns[1]; 
                            }elseif($pn[0] == 'ESQ-INT'){
                                $compose[$k]['ESQ-INT'] = $pns[1]; 
                            }elseif($pn[0] == 'DIR-INT'){
                                $compose[$k]['DIR-INT'] = $pns[1]; 
                            }
                        }
                    }
                    
                }else{
                    $eixoVazio[$k] = 'vazio';
                }
            }
        }
        
        
        $data = array(
            'frota'     => $frota,
            'eixos'     => $eixo,
            'frontalE'  => $frontalE,
            'frontalD'  => $frotalD,
            'step'      => $step,
            'pneus'     => $compose,
            'eixoVazio' => $eixoVazio,
        );
        
        $this->header('5.3', 'TROCA DE PNEUS', 'manutencao', 'Manutenção', 'Trocar pneus');
        $this->load->view('pneu/troca', $data);
        $this->footer();
        
    }
    
    public function vincula(){
        $this->load->model('frotamodel');
        $data['pneusIndividuais'] = $this->frotamodel->getAllPneusIndividuais();
        $data['frota'] = $this->input->post('frota');
        $this->header('5.3', 'VINCULAÇÃO DE PNEUS', 'manutencao', 'Manutenção', 'Vincular pneus');
        $this->load->view('pneu/cambagem', $data);
        $this->footer();
    }
    
    public function update(){
        $this->load->model('frotamodel');
        if($this->input->post('troca') == 0){
            $pneus = $this->frotamodel->getPneuByFrota($this->input->post('frota'));
    
            $count = $this->input->post('aux');
            $help = $this->input->post('dir');
            $help2 = $this->input->post('esq');
            $frota = $this->frotamodel->getRowById($this->input->post('frota'));
            
            for($i=0; $i <$count; $i++){
                if(isset($help[$i])){
                    $dir[$i] = $help[$i];
                }else{
                    $dir[$i] = null;
                } 
                if(isset($help2[$i])){
                    $esq[$i] = $help2[$i];
                }else{
                    $esq[$i] = null;
                }
            }
            
            $pneus = $this->frotamodel->getPneuByFrota($this->input->post('frota'));
            
            foreach($pneus as $pnu){
                $pnu['pneus_individual_posicao'] = null;
                $pnu['pneus_individual_ativo_id'] = "1";            
                $pnu['pneus_individual_frota_id'] = null;
                $this->frotamodel->updatePneuIndividual($pnu, $pnu['pneus_individual_id']);
            }
            
            
            for($i=0; $i <$count; $i++){
                $aux = $this->frotamodel->getPneuById($dir[$i]);
                if($aux !== null){
                    $aux['pneus_individual_kminicial'] = $frota['frota_km'];
                    $aux['pneus_individual_posicao'] = "DIR|".$i;
                    $aux['pneus_individual_ativo_id'] = "3";            
                    $aux['pneus_individual_frota_id'] = $frota['frota_id'];
                    $this->frotamodel->updatePneuIndividual($aux, $aux['pneus_individual_id']);
                }
            }
            for($i=0; $i <$count; $i++){
                $aux = $this->frotamodel->getPneuById($esq[$i]);
                if($aux !== null){
                    $aux['pneus_individual_kminicial'] = $frota['frota_km'];
                    $aux['pneus_individual_posicao'] = "ESQ|".$i;
                    $aux['pneus_individual_ativo_id'] = "3";
                    $aux['pneus_individual_frota_id'] = $frota['frota_id'];
                    $this->frotamodel->updatePneuIndividual($aux, $aux['pneus_individual_id']);
                }
            }
        }else{
            $frontalE = $this->input->post('pneufrontalE[]');
            $frontalD = $this->input->post('pneufrontalD[]');
            $eixos = $this->input->post('qtd_eixos');
            $pneusE = $this->input->post('pneueixoE');
            $pneusD = $this->input->post('pneueixoD');
            $id = $this->input->post('frota');
            $step = $this->input->post('pneustep');
   
            $this->inspneus($frontalE, $frontalD, $eixos, $pneusE, $pneusD, $id, $step);
        }
        
        redirect(base_url('pneus/indice'));
    }
    
    public function movimento(){
        $this->load->model('frotamodel');
        
        $pneu = $this->input->post('pneu');
        $ocor = $this->input->post('ocorr');
        $subs = $this->input->post('pneusubs');
        $obs = $this->input->post('obs');
        
        $aux = $this->frotamodel->getPneuById($pneu);
        
        $aux2 = $this->frotamodel->getRowById($aux['pneus_individual_frota_id']);
        
        if($subs != 0){
            $new = $this->frotamodel->getPneuById($subs);
            
            $new['pneus_individual_ativo_id'] = $aux['pneus_individual_ativo_id'];
            $new['pneus_individual_posicao'] = $aux['pneus_individual_posicao'];
            $new['pneus_individual_frota_id'] = $aux['pneus_individual_frota_id'];
            $new['pneus_individual_kminicial'] = $aux2['frota_km'];
            
            $aux['pneus_individual_ativo_id'] = 2;
            $aux['pneus_individual_posicao'] = null;
            $aux['pneus_individual_frota_id'] = null;
            $aux['pneus_individual_kminicial'] = $aux2['frota_km'];

            $this->frotamodel->updatePneuIndividual($new, $new['pneus_individual_id']);
        }else{
            $aux['pneus_individual_kminicial'] = $aux2['frota_km']; 
        }
            
        $this->frotamodel->updatePneuIndividual($aux, $aux['pneus_individual_id']);        
        
        $situ = $this->frotamodel->situacao();
        
        $reg = array(
            'pneus_registro_situacao'       => $this->input->post('ocorr'),
            'pneus_registro_observacao'     => $this->input->post('obs'),
            'pneus_registro_data'           => $this->input->post('data')." ".date('H:m:s'),
            'pneus_registro_individual_id'  => $this->input->post('pneu'),
            );
        foreach($situ as $st){
            if($st['situacaopneus_id'] == $reg['pneus_registro_situacao']){
                $reg['pneus_registro_situacao'] = $st['situacaopneus_nome'];
            }
        }
        
        
        
        $this->frotamodel->regpneu($reg);
        
        redirect(base_url('manutencaopneus'));
        
    }
    
    function inspneus($frontalE, $frontalD, $eixos, $pneusE, $pneusD, $id, $step){
        $this->load->model('frotamodel');
        
        for($i=0; $i<$eixos; $i++){
            if($i==0){
                $tiresE[$i] = $frontalE;
                $tiresD[$i] = $frontalD;
            }elseif($i>0){
                $aux = $i*2;
                
                if(isset($pneusE[$aux-1])){
                    $tiresE[$aux-1] = $pneusE[$aux-1];
                }else{
                    $tiresE[$aux-1] = null;
                }
                if(isset($pneusE[$aux])){
                    $tiresE[$aux] = $pneusE[$aux];
                }else{
                    $tiresE[$aux] = null;
                }
                if(isset($pneusD[$aux-1])){
                    $tiresD[$aux-1] = $pneusD[$aux-1];
                }else{
                    $tiresD[$aux-1] = null;
                }
                if(isset($pneusD[$aux])){
                    $tiresD[$aux] = $pneusD[$aux];
                }else{
                    $tiresD[$aux] = null;
                }
            }
        }

        for($i=0; $i<sizeof($tiresE); $i++){
            if($tiresE[$i] != null){
                $dados = $this->frotamodel->getPneuIndividualByIdRowArray($tiresE[$i]);
                $dados['pneus_individual_frota_id'] = $id;
                $dados['pneus_individual_posicao'] = 'ESQ|'.$i;
                $dados['pneus_individual_kmtroca'] = 0;
                $dados['pneus_individual_kminicial'] = 0;

                $this->frotamodel->replacePneu($dados);
            }
        }
        
        for($i=0; $i<sizeof($tiresD); $i++){
            if($tiresD[$i] != null){
                $dados = $this->frotamodel->getPneuIndividualByIdRowArray($tiresD[$i]);
                
                $dados['pneus_individual_frota_id'] = $id;
                $dados['pneus_individual_posicao'] = 'DIR|'.$i;
                $dados['pneus_individual_kmtroca'] = 0;
                $dados['pneus_individual_kminicial'] = 0;

                $this->frotamodel->replacePneu($dados);
            }
        }
        
        if($step != null){
                $dados = $this->frotamodel->getPneuIndividualByIdRowArray($step);
                
                $dados['pneus_individual_frota_id'] = $step;
                $dados['pneus_individual_posicao'] = 'STEP';
                $dados['pneus_individual_kmtroca'] = 0;
                $dados['pneus_individual_kminicial'] = 0;

                $this->frotamodel->replacePneu($dados);
            }
        
    }
    
    function insertpneus(){
        $this->load->model('frotamodel');
        $frota = $this->frotamodel->getById($this->input->post('frota'));
        $km = $frota['frota_km'];
        $id = $frota['frota_id'];
        $frontalE = $this->input->post('pneuEF');
        $frontalD = $this->input->post('pneuDF');
        $step = $this->input->post('pneuSTP');
        $eixos = $this->input->post('qtd_eixos');
        
        $f = $this->frotamodel->getByMarcacaoIndividual($frontalE);
        $dados5 = array(
            'pneus_individual_id'           => $f['pneus_individual_id'],
            'pneus_individual_data'         => $f['pneus_individual_data'],
            'pneus_individual_tipopneu_id'  => $f['pneus_individual_tipopneu_id'],
            'pneus_individual_ativo_id'     => $f['pneus_individual_ativo_id'],
            'pneus_individual_marcacao'     => $f['pneus_individual_marcacao'],
            'pneus_individual_matricula'    => $f['pneus_individual_matricula'],
            'pneus_individual_dot'          => $f['pneus_individual_dot'],
            'pneus_individual_frota_id'     => $id,
            'pneus_individual_posicao'      => 'ESQ-FRT',
            'pneus_individual_kminicial'    => $f['pneus_individual_kminicial'],
            'pneus_individual_kmtroca'      => $f['pneus_individual_kmtroca'],
            'pneus_individual_registro_id'  => $f['pneus_individual_registro_id'],
            'pneus_individual_vida'         => $f['pneus_individual_vida'],
            );
        $this->frotamodel->replacePneu($dados5);
        
        $g = $this->frotamodel->getByMarcacaoIndividual($frontalD);
        $dados6 = array(
            'pneus_individual_id'           => $g['pneus_individual_id'],
            'pneus_individual_data'         => $g['pneus_individual_data'],
            'pneus_individual_tipopneu_id'  => $g['pneus_individual_tipopneu_id'],
            'pneus_individual_ativo_id'     => $g['pneus_individual_ativo_id'],
            'pneus_individual_marcacao'     => $g['pneus_individual_marcacao'],
            'pneus_individual_matricula'    => $g['pneus_individual_matricula'],
            'pneus_individual_dot'          => $g['pneus_individual_dot'],
            'pneus_individual_frota_id'     => $id,
            'pneus_individual_posicao'      => 'DIR-FRT',
            'pneus_individual_kminicial'    => $g['pneus_individual_kminicial'],
            'pneus_individual_kmtroca'      => $g['pneus_individual_kmtroca'],
            'pneus_individual_registro_id'  => $g['pneus_individual_registro_id'],
            'pneus_individual_vida'         => $g['pneus_individual_vida'],
            );
        $this->frotamodel->replacePneu($dados6);
        
        $h = $this->frotamodel->getByMarcacaoIndividual($step);
        $dados7 = array(
            'pneus_individual_id'           => $h['pneus_individual_id'],
            'pneus_individual_data'         => $h['pneus_individual_data'],
            'pneus_individual_tipopneu_id'  => $h['pneus_individual_tipopneu_id'],
            'pneus_individual_ativo_id'     => $h['pneus_individual_ativo_id'],
            'pneus_individual_marcacao'     => $h['pneus_individual_marcacao'],
            'pneus_individual_matricula'    => $h['pneus_individual_matricula'],
            'pneus_individual_dot'          => $h['pneus_individual_dot'],
            'pneus_individual_frota_id'     => $id,
            'pneus_individual_posicao'      => 'STEP',
            'pneus_individual_kminicial'    => $h['pneus_individual_kminicial'],
            'pneus_individual_kmtroca'      => $h['pneus_individual_kmtroca'],
            'pneus_individual_registro_id'  => $h['pneus_individual_registro_id'],
            'pneus_individual_vida'         => $h['pneus_individual_vida'],
            );
        $this->frotamodel->replacePneu($dados7);
        
        
        for($i=1; $i<=$eixos; $i++){
            if($this->input->post('pneuEE'.$i) !== null){
                $a = $this->frotamodel->getByMarcacaoIndividual($this->input->post('pneuEE'.$i));
                
                $dados1 = array(
                    'pneus_individual_id'           => $a['pneus_individual_id'],
                    'pneus_individual_data'         => date("d/m/Y"),
                    'pneus_individual_tipopneu_id'  => $a['pneus_individual_tipopneu_id'],
                    'pneus_individual_ativo_id'     => $a['pneus_individual_ativo_id'],
                    'pneus_individual_marcacao'     => $a['pneus_individual_marcacao'],
                    'pneus_individual_matricula'    => $a['pneus_individual_matricula'],
                    'pneus_individual_dot'          => $a['pneus_individual_dot'],
                    'pneus_individual_frota_id'     => $id,
                    'pneus_individual_posicao'      => 'ESQ-EXT¬'.$i,
                    'pneus_individual_kminicial'    => $a['pneus_individual_kminicial'],
                    'pneus_individual_kmtroca'      => $a['pneus_individual_kmtroca'],
                    'pneus_individual_registro_id'  => $a['pneus_individual_registro_id'],
                    'pneus_individual_vida'         => $a['pneus_individual_vida'],
                    );
                $this->frotamodel->replacePneu($dados1);
            }
            
            if($this->input->post('pneuEI'.$i) !== null){
                $b = $this->frotamodel->getByMarcacaoIndividual($this->input->post('pneuEI'.$i));
                $dados2 = array(
                    'pneus_individual_id'           => $b['pneus_individual_id'],
                    'pneus_individual_data'         => $b['pneus_individual_data'],
                    'pneus_individual_tipopneu_id'  => $b['pneus_individual_tipopneu_id'],
                    'pneus_individual_ativo_id'     => $b['pneus_individual_ativo_id'],
                    'pneus_individual_marcacao'     => $b['pneus_individual_marcacao'],
                    'pneus_individual_matricula'    => $b['pneus_individual_matricula'],
                    'pneus_individual_dot'          => $b['pneus_individual_dot'],
                    'pneus_individual_frota_id'     => $id,
                    'pneus_individual_posicao'      => 'ESQ-INT¬'.$i,
                    'pneus_individual_kminicial'    => $b['pneus_individual_kminicial'],
                    'pneus_individual_kmtroca'      => $b['pneus_individual_kmtroca'],
                    'pneus_individual_registro_id'  => $b['pneus_individual_registro_id'],
                    'pneus_individual_vida'         => $b['pneus_individual_vida'],
                    );
                $this->frotamodel->replacePneu($dados2);
            }
            
            if($this->input->post('pneuDI'.$i) !== null){
                $c = $this->frotamodel->getByMarcacaoIndividual($this->input->post('pneuDI'.$i));
                $dados3 = array(
                    'pneus_individual_id'           => $c['pneus_individual_id'],
                    'pneus_individual_data'         => $c['pneus_individual_data'],
                    'pneus_individual_tipopneu_id'  => $c['pneus_individual_tipopneu_id'],
                    'pneus_individual_ativo_id'     => $c['pneus_individual_ativo_id'],
                    'pneus_individual_marcacao'     => $c['pneus_individual_marcacao'],
                    'pneus_individual_matricula'    => $c['pneus_individual_matricula'],
                    'pneus_individual_dot'          => $c['pneus_individual_dot'],
                    'pneus_individual_frota_id'     => $id,
                    'pneus_individual_posicao'      => 'DIR-INT¬'.$i,
                    'pneus_individual_kminicial'    => $c['pneus_individual_kminicial'],
                    'pneus_individual_kmtroca'      => $c['pneus_individual_kmtroca'],
                    'pneus_individual_registro_id'  => $c['pneus_individual_registro_id'],
                    'pneus_individual_vida'         => $c['pneus_individual_vida'],
                    );
                $this->frotamodel->replacePneu($dados3);
            }
            
            if($this->input->post('pneuDE'.$i) !== null){
                $d = $this->frotamodel->getByMarcacaoIndividual($this->input->post('pneuDE'.$i));
                $dados4 = array(
                    'pneus_individual_id'           => $d['pneus_individual_id'],
                    'pneus_individual_data'         => $d['pneus_individual_data'],
                    'pneus_individual_tipopneu_id'  => $d['pneus_individual_tipopneu_id'],
                    'pneus_individual_ativo_id'     => $d['pneus_individual_ativo_id'],
                    'pneus_individual_marcacao'     => $d['pneus_individual_marcacao'],
                    'pneus_individual_matricula'    => $d['pneus_individual_matricula'],
                    'pneus_individual_dot'          => $d['pneus_individual_dot'],
                    'pneus_individual_frota_id'     => $id,
                    'pneus_individual_posicao'      => 'DIR-EXT¬'.$i,
                    'pneus_individual_kminicial'    => $d['pneus_individual_kminicial'],
                    'pneus_individual_kmtroca'      => $d['pneus_individual_kmtroca'],
                    'pneus_individual_registro_id'  => $d['pneus_individual_registro_id'],
                    'pneus_individual_vida'         => $d['pneus_individual_vida'],
                    );
                $this->frotamodel->replacePneu($dados4);
            }
        }
        
        redirect(base_url('manutencaopneus'));
        
    }
    
    function frotaPneus(){
        $this->load->database();
        $this->load->model('frotamodel');
        
        $frota = $this->input->post('frota');
        
        $a = $this->frotamodel->buscaFrota($frota);
        
        echo json_encode($a);
    }
    
    function retrievePneus(){
        $this->load->database();
        $this->load->model('frotamodel');
        
        $a = $this->frotamodel->retornaPneus();
        
        echo json_encode($a);
    }
    
    function resgataPneusFrota(){
        $this->load->database();
        $this->load->model('frotamodel');
        
        $frota = $this->input->post('frota');
        
        $a = $this->frotamodel->buscaPneusFrota($frota);
        
        echo json_encode($a);
    }
    
    function resgataPneus(){
        $this->load->database();
        $this->load->model('frotamodel');
        
        $frota = $this->input->post('frota');
        
        $a = $this->frotamodel->resgataPneus($frota);
        
        echo json_encode($a);
    }
    
    function gravaPneu(){
        $this->load->database();
        $this->load->model('frotamodel');
        
        $pneu = $this->frotamodel->gravaPneus($this->input->post('idfrota'), $this->input->post('idpneu'), $this->input->post('posicao'));
        
        echo $pneu;
    }
    
    function removePneuVeiculo(){
        $this->load->database();
        $this->load->model('frotamodel');
        
        $this->frotamodel->apagaPneu($this->input->post('idfrota'), $this->input->post('eixo'), $this->input->post('pos'));
    }
    
}