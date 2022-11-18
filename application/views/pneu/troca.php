            <style>
                body {
                    padding-right: 0!important
                }
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    border-radius: 5px;
                }
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
                }
                .inline{
                    display: inline;
                }    
                label{
                    font-size: 15px;
                }
                .disabled-field{}
                .white-tab{
                    background-color: white;
                    border-radius: 5px;
                }
                .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
                    background-color: #eee;
                }
                .nav-link{
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                }
                .btn-primary{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:disabled{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:hover{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:focus{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{
                    background-color: #033557;
                    border-color: #033557;
                }
                .modal-header{
                    justify-content: unset; 
                    text-align: left;
                }
                .modal-footer{
                    position: relative;
                }
                .btn-left{
                    position: absolute;
                    top: 15px;
                    left: 15px;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        <div class="card">
                            <form action="<?php echo base_url('pneus/update');?>" method="post" id="update">
                                <?php if($tires != null){?>
                                <input type="hidden" value="0" name="troca">
                                <h5 class="card-header"><?php echo $frota['frota_codigo']." - ".$frota['frota_placa'] ?></h5>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $local; ?> de pneus</h5>
                                
                                    <div class="col-md-4 main-col-4" style="height:100px">
                                        <h3><b><center>Lado Esquerdo</center></b></h3>
                                    </div>
                                    <div class="col-md-4 main-col-4" style="height:100px">
                                        <h3><b><center>Veículo</center></b></h3>
                                    </div>
                                    <div class="col-md-4 main-col-4" style="height:100px">
                                        <h3><b><center>Lado Direito</center></b></h3>
                                    </div>
                                    
                                <?php   $aux = 0;
                                        $num = count($esq);
                                        $sel = 0;
                                while($aux < $num){
                                    if($aux == 0){
                                ?>
                                        <!-- Pneus Esquerdo Frontal -->
                                        <div class="col-md-4 main-col-4"style="height:100px">
                                            <h5><b><left><label>Pneu Atual: </label>
                                                <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $esq[$aux]){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                ?>
                                            <br><label>Novo Pneu: </label>
                                                <select   style="width: 100%!important" name="esq[<?php echo $aux;?>]" id="sel<?php $sel++; echo $sel;?>">
                                                    <?php foreach($pneus as $pneu){?>
                                                        <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $esq[$aux]){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                </select>
                                            </left></b></h5>
                                        </div>    
                                        <!-- Esquema do Veículo Frontal -->
                                        <div class="col-md-4 main-col-4">
                                            <div class="col-md-6 main-col-6">
                                                <img src="<?php echo base_url('resources/imgs/pneus/frontesq.jpg');?>" style="height:100px; margin-left: 6px">
                                            </div>
                                            <div class="col-md-6 main-col-6">
                                                <img src="<?php echo base_url('resources/imgs/pneus/frontdir.jpg');?>" style="height:100px; margin-left: -10px">
                                            </div>
                                        </div>    
                                        <!-- Pneus Direito Frontal-->
                                        <div class="col-md-4 main-col-4" style="text-align:right; height:100px">
                                            <h5><b><right>
                                                <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $dir[$aux]){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                ?>
                                                <label> :Pneu Atual</label>
                                            <br>
                                                <select   style="width: 100%!important" name="dir[<?php echo $aux;?>]" id="sel<?php $sel++; echo $sel;?>" style="direction:rtl">
                                                    <?php foreach($pneus as $pneu){?>
                                                        <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $dir[$aux]){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                </select>
                                                <label> :Novo Pneu</label>
                                            </right></b></h5>
                                        </div>
                                        
                                        <!-- Pneus Esquerdo -->
                                <?php 
                                        $aux++;}else
                                        {
                                        if($esq[$aux+1] == null || $esq[$aux] == null){
                                ?>  
                                            <?php if($esq[$aux] != null){ $help = $esq[$aux]; $id=$aux;}elseif($esq[$aux+1] != null){ $help = $esq[$aux+1];$id=$aux+1;}else{ $help = null;} ?>
                                            <div class="col-md-4 main-col-4" style="height:100px">
                                                <?php if($help != null){?>
                                                <h5><b><left><label>Pneu Atual: </label>
                                                    <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $help){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                    ?>
                                                    <br><label>Novo Pneu: </label>
                                                    <select   style="width: 100%!important" name="esq[<?php echo $id;?>]" id="sel<?php $sel++; echo $sel;?>">
                                                    <?php foreach($pneus as $pneu){?>
                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $help){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                    </select>
                                                </left></b></h5>
                                                <?php }else{ echo "&nbsp";} ?>
                                            </div>
                                <?php 
                                        }elseif($esq[$aux+1] != null && $esq[$aux] != null){
                                ?> 
                                        <div class="col-md-2 main-col-2" style="height:100px; text-align:center; ">
                                                <h5><b><left><label>Pneu Atual: </label>
                                                    <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $esq[$aux+1]){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                    ?>
                                                    <br><label>Novo Pneu: </label>
                                                    <select   style="width: 100%!important" name="esq[<?php echo $aux+1;?>]" id="sel<?php $sel++; echo $sel;?>">
                                                    <?php foreach($pneus as $pneu){?>
                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $esq[$aux+1]){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                    </select>
                                                </left></b></h5>
                                        </div>
                                        <div class="col-md-2 main-col-2" style="height:100px;text-align:center; ">
                                                <h5><b><left><label>Pneu Atual: </label>
                                                    <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $esq[$aux]){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                    ?>
                                                    <br><label>Novo Pneu: </label>
                                                    <select   style="width: 100%!important" name="esq[<?php echo $aux;?>]" id="sel<?php $sel++; echo $sel;?>">
                                                    <?php foreach($pneus as $pneu){?>
                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $esq[$aux]){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                    </select>
                                                </left></b></h5>
                                        </div>  
                                <?php 
                                        }
                                ?>
                                        <!-- Esquema do Veículo  -->
                                        <div class="col-md-4 main-col-4">
                                            <div class="col-md-6 main-col-6">
                                                <img src="<?php 
                                                    if($aux+2 < $num){
                                                        if($esq[$aux] == null && $esq[$aux+1] == null){
                                                            echo base_url('resources/imgs/pneus/sideesqnone.jpg');
                                                        }elseif($esq[$aux] == null && $esq[$aux+1] != null){
                                                            echo base_url('resources/imgs/pneus/sideesqsingl.jpg');
                                                        }elseif($esq[$aux] != null && $esq[$aux+1] == null){
                                                            echo base_url('resources/imgs/pneus/sideesqsingl.jpg');
                                                        }elseif($esq[$aux] != null && $esq[$aux+1] != null){
                                                            echo base_url('resources/imgs/pneus/sideesqdoub.jpg');
                                                        }
                                                    }else{
                                                        if($esq[$aux] == null && $esq[$aux+1] != null){
                                                            echo base_url('resources/imgs/pneus/backesqsingl.jpg');
                                                        }elseif($esq[$aux] != null && $esq[$aux+1] == null){
                                                            echo base_url('resources/imgs/pneus/backesqsingl.jpg');
                                                        }elseif($esq[$aux] != null && $esq[$aux+1] != null){
                                                            echo base_url('resources/imgs/pneus/backesqdoub.jpg');
                                                        }
                                                    }
                                                ?>" style="height:100px; margin-left: 4px">
                                            </div>
                                            <div class="col-md-6 main-col-6">
                                                <img src="<?php 
                                                    if($aux+2 < $num){
                                                        if($dir[$aux] == null && $dir[$aux+1] == null){
                                                            $mg = -12;
                                                            echo base_url('resources/imgs/pneus/sidedirnone.jpg');
                                                        }elseif($dir[$aux] == null && $dir[$aux+1] != null){
                                                            $mg = -8;
                                                            echo base_url('resources/imgs/pneus/sidedirsingl.jpg');
                                                        }elseif($dir[$aux] != null && $dir[$aux+1] == null){
                                                            $mg = -8;
                                                            echo base_url('resources/imgs/pneus/sidedirsingl.jpg');
                                                        }elseif($dir[$aux] != null && $dir[$aux+1] != null){
                                                            $mg = -8;
                                                            echo base_url('resources/imgs/pneus/sidedirdoub.jpg');
                                                        }
                                                    }else{
                                                        if($dir[$aux] == null && $dir[$aux+1] != null){
                                                            $mg = -8;
                                                            echo base_url('resources/imgs/pneus/backdirsingl.jpg');
                                                        }elseif($dir[$aux] != null && $dir[$aux+1] == null){
                                                            $mg = -8;
                                                            echo base_url('resources/imgs/pneus/backdirsingl.jpg');
                                                        }elseif($dir[$aux] != null && $dir[$aux+1] != null){
                                                            $mg = -8;
                                                            echo base_url('resources/imgs/pneus/backdirdoub.jpg');
                                                        }
                                                    }
                                                ?>" style="height:100px; margin-left: <?php echo $mg;?>px">
                                            </div>
                                        </div>    
                                        
                                        <!-- Pneus Direito -->
                                <?php        
                                        if($dir[$aux+1] == null || $dir[$aux] == null){
                                ?>  
                                            <?php if($dir[$aux] != null){ $help = $dir[$aux]; $id=$aux;}elseif($dir[$aux+1] != null){ $help = $dir[$aux+1]; $id=$aux+1;}else{ $help = null;} ?>
                                            <div class="col-md-4 main-col-4" style="height:100px; text-align:right;">
                                                <?php if($help != null){?>
                                                <h5><b><left>
                                                    <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $help){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                    ?>
                                                    <label> :Pneu Atual</label>
                                                    <br>
                                                    <select  name="dir[<?php echo $id;?>]" id="sel<?php $sel++; echo $sel;?>"   style="width: 100%!important; direction:rtl">
                                                    <?php foreach($pneus as $pneu){?>
                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $help){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                    </select>
                                                    <label> :Novo Pneu</label>
                                                </left></b></h5>
                                                <?php }else{ echo "&nbsp";} ?>
                                            </div>
                                <?php 
                                        }elseif($dir[$aux+1] != null && $dir[$aux] != null){
                                ?> 
                                        <div class="col-md-2 main-col-2" style="height:100px; text-align:center; ">
                                                <h5><b><left><label>Pneu Atual: </label>
                                                    <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $dir[$aux]){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                    ?>
                                                    <br><label>Novo Pneu: </label>
                                                    <select  name="dir[<?php echo $aux;?>]" id="sel<?php $sel++; echo $sel;?>"  style="width: 100%!important; direction:rtl">
                                                    <?php foreach($pneus as $pneu){?>
                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $dir[$aux]){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                    </select>
                                                </left></b></h5>
                                        </div>
                                        <div class="col-md-2 main-col-2" style="height:100px; text-align:center; ">
                                                <h5><b><left><label>Pneu Atual: </label>
                                                    <?php foreach($pneus as $pneu){
                                                    if($pneu['pneus_individual_id'] == $dir[$aux+1]){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                                    ?>
                                                    <br><label>Novo Pneu: </label>
                                                    <select  name="dir[<?php echo $aux+1;?>]" id="sel<?php $sel++; echo $sel;?>"  style="width: 100%!important; direction:rtl;">
                                                    <?php foreach($pneus as $pneu){?>
                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $dir[$aux+1]){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                                    <?php }?>
                                                    </select>
                                                </left></b></h5>
                                        </div>
                                        
                                <?php 
                                        }
                                    $aux +=2;
                                    }
                                }
                                ?>
                                    <div class="col-md-12 main-col-12" style="height:100px; text-align:center; ">
                                        <h5><b><left>
                                            <label>Step Atual: </label>
                                            <?php foreach($pneus as $pneu){
                                            if($pneu['pneus_individual_id'] == $step['id']){ echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];}}
                                            ?>
                                            <br><label>Novo Step: </label>
                                            <select  name="step" id="sel<?php echo $step['id'];?>"  style="width: 100%!important; direction:rtl;">
                                            <?php foreach($pneus as $pneu){?>
                                            <option value="<?php echo $pneu['pneus_individual_id'];?>" <?php if($pneu['pneus_individual_id'] == $step['id']){ echo "selected";}?>><?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?></option>
                                            <?php }?>
                                            </select>
                                        </left></b></h5>
                                    </div>
                                </div>
                                <?php } else{?>
                                    <div class="card-body">
                                        <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                            <input type="hidden" value="1" name="troca">    
                                            <input type="hidden" name="qtd_eixos" id="qtd_eixos" value="1">
                                            <style>
                                                .e-pneus{
                                                    display: flex;
                                                    flex-direction: row-reverse;
                                                    position: absolute;
                                                    padding-top: 20px;
                                                    right: 0px;
                                                    width: 100%;
                                                    height: 70px;
                                                }
                                                .d-pneus{
                                                    display: flex;
                                                    padding-top: 20px;
                                                    position: absolute;
                                                    left: 0px;
                                                    width: 100%;
                                                    height: 70px;
                                                }
                                                .eixo-h{
                                                    border-top: 3px solid black;
                                                    margin: 0px;
                                                    position: relative;
                                                }
                                                .eixo-v{
                                                    position: absolute;
                                                    font-weight: bold;
                                                    font-size: 20px;
                                                    top: 15px;
                                                    left: 40%;
                                                }
                                                .btn.btn-primary.btn-custom, .btn.btn-primary.btn-custom:active{
                                                    width: 35px;
                                                    height: 35px;
                                                    background-color: transparent;
                                                    border: 0;
                                                    color: green;
                                                    border-radius: 50%;
                                                }
                                                .btn.btn-primary.btn-custom:focus{
                                                    outline: 0px;
                                                }
                                                .btn-ativo{
                                                    margin-top: 10px;
                                                }
                                                .pneu{
                                                    height: 35px;
                                                    margin-top: 7%;
                                                }
                                                .img-pneu{
                                                    height: 70px;
                                                    width: auto;
                                                    margin: 5px 5px;
                                                }
                                                .custom-20-e{
                                                    width: 20%;
                                                    text-align: right;
                                                    flex-direction: row-reverse;
                                                    display: flex;
                                                }
                                                .custom-80-e{
                                                    flex-direction: row-reverse;
                                                    display: flex;
                                                    width: 80%;
                                                    text-align: right;
                                                }
                                                .custom-20-d{
                                                    width: 20%;
                                                    text-align: left;
                                                }
                                                .custom-80-d{
                                                    width: 80%;
                                                    text-align: left;
                                                }
                                                .custom-80-e button{
                                                    margin-top: 7%;
                                                }
                                                .top-car{
                                                    border-top: 1px solid black;
                                                    border-right: 1px solid black;
                                                    border-left: 1px solid black;
                                                    padding-right: 10px;
                                                    padding-left: 10px;
                                                }
                                                .mid-car{
                                                    border-right: 1px solid black;
                                                    border-left: 1px solid black;
                                                    padding-right: 10px;
                                                    padding-left: 10px;
                                                }
                                                .bot-car{
                                                    border-right: 1px solid black;
                                                    border-left: 1px solid black;
                                                    border-bottom: 1px solid black;
                                                    padding-bottom: 20px;
                                                    padding-right: 10px;
                                                    padding-left: 10px;
                                                }
                                                .full-car{
                                                    border-top: 1px solid black;
                                                    border-right: 1px solid black;
                                                    border-left: 1px solid black;
                                                    border-bottom: 1px solid black;
                                                    padding-bottom: 20px;
                                                    padding-right: 10px;
                                                    padding-left: 10px;
                                                }
                                            </style>
                                            <div>
                                                <div class="row text-center" style="margin-top: 20px">
                                                    <div class="col-md-5">
                                                        <h3>Lado Esquerdo</h3>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <h3>Eixos</h3>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <h3>Lado Direito</h3>
                                                    </div>
                                                </div>
                                                <div class="row" id="eixo_1" style="margin-top: 20px">
                                                    <div class="col-md-5">
                                                        <div class="e-pneus">
                                                            <div class="custom-20-e">
                                                                <img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Frontal Esquerdo">
                                                            </div>
                                                            <div class="custom-80-e">
                                                                <select  style="width: 100%!important" class="pneu p-sel" name="pneufrontalE" id="pneuE_0" onchange="salvaSelecionados($(this).val(), 0, 0)" title="Selecione o Pneu Frontal Esquerdo">
                                                                    <option selected disabled>-- Selecionar --</option>
                                                                    <?php foreach($pneusIndividuais as $pneu){ ?>
                                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>"> <?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 text-center full-car">
                                                        <br>
                                                        <h4>1</h4>
                                                        <hr class="eixo-h" id="first_hr">
                                                        <!--<span class="eixo-v">|<br>-->
                                                            <button style="max-height: 25px;" type="button" class="btn btn-primary btn-custom btn-vazio btn-ativo" onclick="newVazio()" title="Novo Eixo Sem Pneus"><em style="color: blue" class="fa fa-arrow-down"></em></button>
                                                            <button style="max-height: 25px;" type="button" class="btn btn-primary btn-custom btn-eixo btn-ativo" onclick="newEixo()" title="Novo Eixo Com Pneus"><em class="fa fa-plus"></em></button>
                                                            <button style="max-height: 25px;" type="button" class="btn btn-primary btn-custom btn-rem btn-ativo" onclick="rmvEixo()" title="Remover Último Eixo"><em style="color: red" class="fa fa-close"></em></button>
                                                        <!--</span>-->
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="d-pneus">
                                                            <div class="custom-20-d">
                                                                <img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Frontal Direito">
                                                            </div>
                                                            <div class="custom-80-d">
                                                                <select  style="width: 100%!important" class="pneu p-sel" name="pneufrontalD" id="pneuD_0" onchange="salvaSelecionados($(this).val(), 0, 1)" title="Selecione o Pneu Frontal Direito">
                                                                    <option selected disabled>-- Selecionar --</option>
                                                                    <?php foreach($pneusIndividuais as $pneu){ ?>
                                                                    <option value="<?php echo $pneu['pneus_individual_id'];?>"> <?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?> </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="pneus_content">
                                                </div>
                                                <div id="pneus_step">
                                                    <div class="d-pneus">
                                                        <div>
                                                            <img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Frontal Direito">
                                                        </div>
                                                        <div>
                                                            <select  style="width: 100%!important" class="pneu p-sel" name="pneustep" id="pneustep" onchange="salvaSelecionados($(this).val(), 0, 1)" title="Selecione o Pneu Step">
                                                                <option selected disabled>-- Selecionar Step --</option>
                                                                <?php foreach($pneusIndividuais as $pneu){ ?>
                                                                <option value="<?php echo $pneu['pneus_individual_id'];?>"> <?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'];?> </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- COMEÇO - conteúdo que vai ser copiado -->
                                            <div style="display: none" id="new_eixo">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="hidden" class="anchor-e" value="0">
                                                        <div class="e-pneus">
                                                            <div class="custom-20-e">
                                                            </div>
                                                            <div class="custom-80-e">
                                                                <button type="button" class="btn btn-primary btn-custom btn-e" title="Adicionar Pneu Esquerdo"><em class="fa fa-plus"></em></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <br>
                                                        <h4 class="h4-eixo"></h4>
                                                        <hr class="eixo-h">
                                                        <!--<span class="eixo-v">|<br>-->
                                                            <button style="max-height: 25px;" type="button" class="btn btn-primary btn-custom btn-vazio" onclick="newVazio()" title="Novo Eixo Sem Pneus"><em style="color: blue" class="fa fa-arrow-down"></em></button>
                                                            <button style="max-height: 25px;" type="button" class="btn btn-primary btn-custom btn-eixo" onclick="newEixo()" title="Novo Eixo Com Pneus"><em class="fa fa-plus"></em></button>
                                                            <button style="max-height: 25px;" type="button" class="btn btn-primary btn-custom btn-rem" onclick="rmvEixo()" title="Remover Último Eixo"><em style="color: red" class="fa fa-close"></em></button>
                                                        <!--</span>-->
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="hidden" class="anchor-d" value="0">
                                                        <div class="d-pneus">
                                                            <div class="custom-20-d">
                                                            </div>
                                                            <div class="custom-80-d">
                                                                <button type="button" class="btn btn-primary btn-custom btn-d" style="margin-top: 7%" title="Adicionar Pneu Direito"><em class="fa fa-plus"></em></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- FIM - conteúdo que vai ser copiado -->
                                            <br><br><br>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div>
                                    <div class="col-md-4 main-col-4">
                                        <?php if($tires != null){?><input type="hidden" name="aux" value="<?php echo $num;?>"><?php } ?>
                                        <input type="hidden" name="frota" value="<?php echo $frota['frota_id'];?>">
                                    </div>
                                    <div class="col-md-4 main-col-4" style="text-align: center; margin-left:5px">
                                        <a href="<?php echo base_url('manutencaopneus');?>"><button type="button" class="btn btn-danger">Cancelar</button></a>
                                        <button type=<?php if($tires != null){echo "'button' onclick='valida()'";}else{ echo "'submit'";}?> class="btn btn-success">Atualizar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
<script>
    function valida() {
        
        <?php for($a = 1; $a <= $sel; $a++){?>
        var sel<?php echo $a;?> = document.getElementById('sel<?php echo $a;?>');
	    var val<?php echo $a;?> = sel<?php echo $a;?>.options[sel<?php echo $a;?>.selectedIndex].value;
	    <?php } ?>
        var flag = 0;
        
        <?php for($a = 1; $a <= $sel; $a++){
                for($b = $a+1; $b <= $sel; $b++){?>
                    if(val<?php echo $a;?> === val<?php echo $b;?>){
                     flag = 1;
                     alert("Existem pneus duplicados!")
                     document.getElementById('sel<?php echo $a;?>').style.color = 'red';
                     document.getElementById('sel<?php echo $b;?>').style.color = 'red';
                    }
        <?php   }
            }?>
        
	    if(flag == 1){
            
	    }else{
	        document.getElementById("update").submit();
	    }
    }
</script>
<!-- Funções relacionadas à inicialização da página -->
            <script>
                $(document).ready(function(){
        
                    //------------------- APPLY
                    
                    //$('.p-sel').select2({theme: 'bootstrap'});
                    $("#preco_compra").mask("#.##0,00", {reverse: true});
                    $("#renavam").mask('00000000000');
                    $("#chassi").mask('AAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z0-9]/},}});
                    $("#km").mask('0#');
                    $(".peso").mask("#0,000", {reverse: true});
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                    
                    
                    //------------------- FUNCTIONS
                    
                    $("#ismunck").on('change', function(){
                        if($("#ismunck").is(":checked")){
                            $("#muncktypediv").css("display", "inline");
                            $("#tipomunck").prop("disabled", false);
                        }else{
                            $("#muncktypediv").css("display", "none");
                            $("#tipomunck").prop("disabled", true);
                        }
                    });
                    
                   $("#issuplemento").on('change', function(){
                        if($("#issuplemento").is(":checked")){
                            $("#suplextypediv").css("display", "inline");
                            $("#suplemento").prop("disabled", false);
                        }else{
                            $("#suplextypediv").css("display", "none");
                            $("#suplemento").prop("disabled", true);
                        }
                    }); 
                    
                    $("#placa").keyup(function(){
                        autoFillByPlaca($("#placa").val());
                    });
                    
                    function autoFillByPlaca(val){
                        var dados = {
                            'frota_placa': val
                        };
                    
                        $.ajax({
                            url : '<?php echo base_url('frota/getFrotaByPlaca') ?>',
                            type : 'POST',
                            dataType : 'json',
                            data : dados,
                            success : function(res) {
                                if(res.val == 1){
                                    treatAutofillData(res);
                                }
                            },
                            error : function(xhr, status, error) {
                                alert(status + " " + error + " " + xhr);
                            }
                        });
                    }
                    
                    function autofillById(id){
                        var dados = {
                            'frota_id': id
                        };
                    
                        $.ajax({
                            url : '<?php echo base_url('frota/getFrotaById') ?>',
                            type : 'POST',
                            dataType : 'json',
                            data : dados,
                            success : function(response) {
                                res = response[0];
                                treatAutofillData(res);
                            },
                            error : function(xhr, status, error) {
                                alert(status + " " + error + " " + xhr);
                            }
                        });
                    }
                    
                    function treatAutofillData(data){
                        
                        $("#isedit").val(1);
                        $("#id").val(data.frota_id);
                        
                        $("#placa").val(data.frota_placa);
                        
                        $("#codigo").val(data.frota_codigo);
                        
                        $("#chassi").val(data.frota_chassi);
                        $("#renavam").val(data.frota_renavam);
                        $("#motor").val(data.frota_motor);
                        
                        $("#modelo").val(data.frota_modelo_id).change();
                        
                        $("#ano").val(data.frota_ano);
                        $("#cambio").val(data.frota_cambio);
                        $("#cor").val(data.frota_cor);
                        $("#linha").val(data.frota_linha_id).change();
                        $("#preco_compra").unmask().val(data.frota_preco_compra.replace('.', ',')).mask("#.##0,00", {reverse: true});
                        $("#km").val(data.frota_km);
                        
                        $("#pneu").val(data.frota_pneu_id).change();
                        $("#tara").unmask().val(data.frota_tara.replace('.', ',')).mask("#0,000", {reverse: true});
                        $("#lotacao").unmask().val(data.frota_lotacao.replace('.', ',')).mask("#0,000", {reverse: true});
                        $("#pbt").unmask().val(data.frota_pbt.replace('.', ',')).mask("#0,000", {reverse: true});
                        
                        $("#tipogabine").val(data.frota_tipogabine_id);
                        $("#tipogabine").change();
                        
                        $("#status").val(data.frota_status_id).change();
                        $("#ativo").val(data.frota_ativo_id).change();
                        
                        if(data.frota_tipomunck_id != null){
                            if(data.frota_tipomunck_id.length > 0){
                                $("#ismunck").trigger('click');
                                $("#tipomunck").val(data.frota_tipomunck_id);
                                $("#tipomunck").change();
                            }
                        }
                    }
                    
                    function ver(id){
                    var marcacao = "";
                    <?php foreach($pneusIndividuais as $pneu){ ?>
                        if(id == '<?php echo $pneu['pneus_individual_id'] ?>'){
                            marcacao = '<?php echo $pneu['pneus_individual_marcacao']." / ".$pneu['pneus_individual_matricula']." / ".$pneu['pneus_individual_dot'] ?>';
                        }
                    <?php } ?>
                    $("#marcacao_v").html(marcacao);
                    
                    
                    var registros = "";
                    <?php foreach($pneusRegistros as $regp) { ?>
                        if(id == '<?php echo $regp['pneus_registro_individual_id'] ?>'){
                            registros += 
                            "<tr>" +
                                "<td>" + 
                                    "<?php echo date("d/m/Y H:i", strtotime($regp['pneus_registro_data'])) ?>" +
                                "</td>" +
                                "<td>" + 
                                    "<?php echo $regp['pneus_registro_situacao'] ?>" +
                                "</td>" +
                                "<td>" + 
                                    "<?php echo $regp['pneus_registro_observacao'] ?>" +
                                "</td>" +
                            "</tr>";
                        }
                    <?php } ?>
                    if(registros.length == 0){
                        registros = "<tr class='odd'><td valign='top' colspan='3' class='dataTables_empty'>Nada encontrado- refaça sua busca</td></tr>";
                    }
                    $("#registros_v").html(registros);
                    
                    
                    $("#myTableRegistros").change();
                }
                    
                    <?php if($edita != null){
                        echo "autofillById('" . $edita['frota_id'] . "');";
                        echo "getImgEdit('" . $edita['frota_codigo'] . "');";
                    } ?>
                });
            </script>
            
            <!-- Função change(), que controla as tabs -->
            <script>
                function change(value){
        
                    var div = $(".change-tab-div").toArray();
                    var btn = $(".change-tab-btn").toArray();
                    var affectedIndex = value - 1;
                    
                    div.forEach(function(v, i){
                        if(i == affectedIndex){
                            $(v).css('display', 'block');
                        }else{
                            $(v).css('display', 'none');
                        }
                    });
                    
                    btn.forEach(function(v, i){
                        if(i == affectedIndex){
                            $(v).css('background-color', 'white');
                        }else{
                            $(v).css('background-color', '#eee');
                        }
                    });
                }
            </script>
            
            <!-- Funções do modal de cadastro de marca -->
            <script>
                /**
                 * Função que vai esconder o modal de modelo
                 * e mostrar o modal de marca
                 */
                function mostraMarca(){
                    $('#modeloCadastro').css('display', 'none');
                    $('#marcaCadastro').modal('show');
                }
                
                /**
                 * Função que vai esconder o modal de marca
                 * e mostrar o modal de modelo
                 */
                function escondeMarca(){
                    $('#marcaCadastro').modal('hide');
                    $('#modeloCadastro').css('display', 'block');
                }
                
                /**
                 * Função que vai fazer o refresh do select após a inserção dinâmica
                 */
                function refreshMarca(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshMarcas') ?>',
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option value='0' disabled selected>-- Selecione uma Opção --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_marca_id+"'>"+response[i].frota_marca_nome+"</option>";
                            }
                            $('#marca_modelo').html(refresh);
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
            
                /**
                 * Função que trata os dados do form e envia para o controller,
                 * para ser feita a inserção dinâmica
                 */
                $('#formMarca').submit(function(e){
                    e.preventDefault();
                    if($('#nome_marca').val() != "" && $('#nome_marca').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_marca').val());
                        $.ajax({
                            url: '<?php echo base_url('frota/marcaInsert'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert(status + " " + error + " " + xhr);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    refreshMarca();
                                    escondeMarca();
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                });
            </script>
            
            <!-- Funções do modal de cadastro de tipo de veículo -->
            <script>
                /**
                 * Função que vai esconder o modal de modelo
                 * e mostrar o modal de tipo de veículo
                 */
                function mostraTipo(){
                    $('#modeloCadastro').css('display', 'none');
                    $('#tipoCadastro').modal('show');
                }
                
                /**
                 * Função que vai esconder o modal de tipo de veículo
                 * e mostrar o modal de cadastro
                 */
                function escondeTipo(){
                    $('#tipoCadastro').modal('hide');
                    $('#modeloCadastro').css('display', 'block');
                }
                
                /**
                 * Função que vai fazer o refresh no select após a inserção dinâmica
                 */
                function refreshTipo(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshTipo') ?>',
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option value='0' disabled selected>-- Selecione uma Opção --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_tipo_id+"'>"+response[i].frota_tipo_nome+"</option>";
                            }
                            $('#tipo_modelo').html(refresh);
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
                
                /**
                 * Função que vai tratar os dados do modal e enviar para o controller poder fazer a inserção dinâmica
                 */
                $('#formTipo').submit(function(e){
                    e.preventDefault();
                    if($('#nome_tipo').val() != "" && $('#nome_tipo').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_tipo').val());
                        $.ajax({
                            url: '<?php echo base_url('frota/tipoInsert'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert(status + " " + error + " " + xhr);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    refreshTipo();
                                    escondeTipo();
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                });
            </script>
            
            <!-- Funções do modal de cadastro de modelo -->
            <script>
                /**
                 * Função que faz o refresh do select após a inserção dinâmica
                 */
                function refreshModelo(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshModelo') ?>',
                        method: 'post',
                        processData: false,
                        contentType: false,
                        success : function(response) {
                            $('#modelo').html(response);
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
            
                $('#formModelo').submit(function(e){
                    e.preventDefault();
                    if($('#nome_modelo').val() != " " && $('#nome_modelo').val() != ""){
                        if($('#marca_modelo').val() != 0){
                            if($('#tipo_modelo').val() != 0){
                                dados = new FormData();
                                dados.append('nome', $('#nome_modelo').val());
                                dados.append('marca', $('#marca_modelo').val());
                                dados.append('tipo', $('#tipo_modelo').val());
                                $.ajax({
                                    url: '<?php echo base_url('frota/modeloInsert'); ?>',
                                    method: 'post',
                                    data: dados,
                                    processData: false,
                                    contentType: false,
                                    error: function(xhr, status, error) {
                                        alert(status + " " + error + " " + xhr);
                                    },
                                    success: function(data) {
                                        if(data != "null" && data != "" && data != " " && data != null){
                                            e.preventDefault();
                                            refreshModelo();
                                            $('#modeloCadastro').modal('hide');
                                        }else{
                                            e.preventDefault();
                                            alert("Erro no banco");
                                        }
                                    },
                                });
                            }else{
                                e.preventDefault();
                                alert('Por favor selecione um tipo válido!');
                            }
                        }else{
                            e.preventDefault();
                            alert('Por favor selecione uma marca válida!');
                        }
                    }else{
                        e.preventDefault();
                        alert('Por favor insira um nome válido!');
                    }
                });
            </script>
            
            <!-- Funções do modal de cadastro de cabine -->
            <script>
                function refreshCabine(id){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshCabine/') ?>'+id,
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option selected disabled value=''>-- Selecionar --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_tipogabine_id+"'>"+response[i].frota_tipogabine_nome+"</option>";
                            }
                            if(id == 1){
                                $('#suplemento').html(refresh);
                            }else{
                                $('#tipogabine').html(refresh);
                            }
                        },
                        error : function(xhr, status, error) {
                            alert(xhr.responseText);
                        }
                    });
                }
            
                $('#formCabine').submit(function(e){
                    e.preventDefault();
                    if($('#nome_cabine').val() != "" && $('#nome_cabine').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_cabine').val());
                        dados.append('suplemento', $('#suplemento').val());
                        $.ajax({
                            url: '<?php echo base_url('frota/cabineInsert'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert(status + " " + error + " " + xhr);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    refreshCabine(0);
                                    $('#cabineCadastro').modal('hide');
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                });
                
                $('#formCabine2').submit(function(e){
                    e.preventDefault();
                    if($('#nome_cabine2').val() != "" && $('#nome_cabine2').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_cabine2').val());
                        dados.append('suplemento', $('#suplemento2').val());
                        $.ajax({
                            url: '<?php echo base_url('frota/cabineInsert'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert(xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    refreshCabine(1);
                                    $('#cabineCadastro2').modal('hide');
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                });                
            </script>
            
            <!-- Funções do modal de cadastro de tipo de pneu -->
            <script>
                function refreshPneu(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshPneu') ?>',
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option selected disabled value=''>-- Selecionar --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_pneu_id+"'>"+response[i].frota_pneu_marca+" | Aro "+response[i].frota_pneu_aro+" | "+response[i].frota_pneu_banda+"</option>";
                            }
                            $('#pneu').html(refresh);
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
            
                $('#formPneu').submit(function(e){
                    e.preventDefault();
                    if($('#marca_pneu').val() != "" && $('#marca_pneu').val() != " "){
                        if($('#aro_pneu').val() != "" && $('#aro_pneu').val() != " "){
                            if($('#banda_pneu').val() != "" & $('#banda_pneu').val() != " "){
                                if($('#qtd_pneu').val() != 0){
                                    dados = new FormData();
                                    dados.append('marca', $('#marca_pneu').val());
                                    dados.append('aro', $('#aro_pneu').val());
                                    dados.append('banda', $('#banda_pneu').val());
                                    dados.append('quantidade', $('#qtd_pneu').val());
                                    $.ajax({
                                        url: '<?php echo base_url('frota/pneuInsert'); ?>',
                                        method: 'post',
                                        data: dados,
                                        processData: false,
                                        contentType: false,
                                        error: function(xhr, status, error) {
                                            alert(status + " " + error + " " + xhr);
                                        },
                                        success: function(data) {
                                            if(data != "null" && data != "" && data != " " && data != null){
                                                refreshPneu();
                                                $('#pneuCadastro').modal('hide');
                                            }else{
                                                alert("Erro no banco");
                                            }
                                        },
                                    });
                                }else{
                                    alert('Por favor insira uma quantidade válida!');
                                }
                            }else{
                                alert('Por favor insira uma banda válida!');
                            }
                        }else{
                            alert('Por favor insira um aro válido!');
                        }
                    }else{
                        alert('Por favor insira uma marca válida!');
                    }
                });
            </script>


            <!-- Funções relacionadas a quando for modo de edição -->
            <script>
                function getImgEdit(val){
                    var dadosdoc = {'frota': val};
                    
                    $.ajax({
                        url : '<?php echo base_url('frota/getDocumentosByFrota') ?>',
                        type : 'POST',
                        dataType : 'json',
                        data : dadosdoc,
                        success : function(response) {
                            treatAutofillDocs(response);
                        },
                        error : function(xhr, status, error) {
                            alert("getImgEdit: " + xhr.responseText);
                        }
                    });
                }
                
                function treatAutofillDocs(data){
                    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>][0];
                    for(var i = 0; i < data.length; i++){
                        var idDocAtual = data[i].documento_tipo_id; //DOCUMENTOS_TIPOS_ID
                        var docAtual = $(document).find("#" + idDocAtual + "-doc");
                        if(docAtual.length == 0){
                            //TODO //CRIAR NOVO DOC //////////////////////////////////////////////////// VERIFICAR SE DISPARA OU NÃO
                            var activeCol = $("#docs-div").find(".active-col")[0];
                            var ac_btn = $(activeCol).find(".docs-addnew-btn")[0];
                            $(ac_btn).trigger('click');
                            
                            var ac_sel = $(activeCol).find(".docs-picktype-select")[0];
                            $(ac_sel).val(idDocAtual).change();
                            
        		            $("#docs-counter").html(parseInt($("#docs-counter").html())+1);
        		            
        		            var ac_input = $(document).find("#" + idDocAtual + "-doc");
        		            $(ac_input).prop('required', false);
                        }
                        if(data[i].documento_isimagem == 1){
                            $("#" + idDocAtual + "-preview").attr('src', '<?php echo base_url('uploads/') ?>' + data[i].documento_frota + "_" + idDocAtual + ".png");
                        }else{
                            $("#" + idDocAtual + "-preview").attr('src', '<?php echo base_url('resources/imgs/pdf_cover.png') ?>');
                            var ac_link = $(document).find("#"+idDocAtual+"-link");
                            ac_link.prop('href', '<?php echo base_url('uploads/') ?>'+data[i].documento_frota+"_"+idDocAtual+".pdf");
                        }
                        for(var k in documentos_tipos){
                            if(documentos_tipos[k].documentos_tipos_id == idDocAtual){
                                $("#" + idDocAtual + "-title" ).html(documentos_tipos[k].documentos_tipos_nome);
                                $("#" + idDocAtual + "-file" ).html(documentos_tipos[k].documentos_tipos_nome + "");
                            } 
                        }
                    
                    }
                }
            </script>
            
            <!-- Funções relacionadas a listagem de pneus vinculados -->
            <script>
                function desvincular(id){
                    $('#id_desvincula').val(id);
                }
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                
                $('#desvinculaForm').submit(function(e){
                    e.preventDefault();
                    
                    dados = new FormData();
                    dados.append('id', $('#id_desvincula').val());
                    dados.append('senha', $('#senha').val());
                    $.ajax({
                        url: '<?php echo base_url('frota/desvincularDinamicamente'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('desvinculaForm: '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data == 1){
                                alert("Desvinculado com sucesso!");
                                refreshPneus();
                                $('#modalDesvincular').modal('hide');
                                $('#senha').val("");
                                $('#id_desvincula').val("");
                                $('#formsenha').css('display', 'none');
                            }else{
                                alert("Senha incorreta, tente novamente!");
                            }
                        },
                    });
                });
                
                function refreshPneus(){
                    dados = new FormData();
                    dados.append('id', <?php echo $edita['frota_id'] ?>);
                    $.ajax({
                        url: '<?php echo base_url('frota/refreshPneus'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('refreshPneus: '+xhr.responseText);
                        },
                        success: function(data) {
                            $('#main-pneus').html(data);
                        },
                    });
                }
            </script>
            
            <!-- Funções relacionadas ao cadastro de registros -->
            <script>
                function registro(id){
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('frota/getRegistroDinamicamente'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('registro: '+xhr.responseText);
                        },
                        success: function(data) {
                            $('#receptor').html(data);
                        },
                    });
                }
            </script>
            
            <!-- Funções do Anderson relacionadas ao geramento dinâmico de pneus para a vinculação -->
            <script type="text/javascript">
                function validate(frm)
                {
                	var eleD = frm.elements['pneufrontalD[]'];
                	var eleE = frm.elements['pneufrontalE[]'];
                	if (! eleD.length)
                	{
                		alert(eleD.value);
                	}
                	for(var i=0; i<eleD.length; i++)
                	{
                		alert(eleD[i].value);
                	}
                	if (! eleE.length)
                	{
                		alert(eleE.value);
                	}
                	for(var i=0; i<eleE.length; i++)
                	{
                		alert(eleE[i].value);
                	}
                	return true;
                }
                
                var ctE = 0;
                var ctD = 0;
                
                function add_feedE()
                {   
                    ctE++;
                	var div1 = document.createElement('div');
                	div1.id = 'E'+ctE;
                	var delLink = '<div  class="col-md-1" style="text-align:right;margin-right:65px"><a href="javascript:delItE('+ ctE +')">Del</a></div>';
                	div1.innerHTML = document.getElementById('newlinktplE').innerHTML + delLink;
                	document.getElementById('newlinkE').appendChild(div1);
                	
                	var divanchor = document.getElementById('E'+ctE);
                	divanchor.children[0].children[0].name = "pneueixoE["+ctE+"]";
                }
                function add_feedD()
                {   
                    ctD++;                	                    
                	var div1 = document.createElement('div');
                	div1.id = 'D'+ctD;
                    var delLink = '<div  class="col-md-1" style="text-align:right;margin-right:65px"><a href="javascript:delItD('+ ctD +')">Del</a></div>';
                	div1.innerHTML = document.getElementById('newlinktplD').innerHTML + delLink;
                	document.getElementById('newlinkD').appendChild(div1);
                	
                	var divanchor = document.getElementById('D'+ctD);
                	divanchor.children[0].children[0].name = "pneueixoD["+ctD+"]";
                }
                
                function delItE(eleId)
                {
                	d = document.getElementById('E'+eleId);
                	d.remove();
                }
                function delItD(eleId)
                {
                	d = document.getElementById('D'+eleId);
                	d.remove();
                }

            </script>
            
            <!-- Funções relacionadas aos selects de pneu -->
            <script>
                //-> Variável global para saber quantos eixos tem
                var global_eixo = 1;
                
                //-> Arrays globais que servem de mapa para saber os pneus selecionados em cada select
                var global_selecteds_e = [];
                var global_selecteds_d= [];
            
                //-> Função que adiciona um novo eixo com pneus
                function newEixo(){
                    $('#first_hr').css('padding-bottom', '25px');
                    $('.btn-ativo').each(function(){
                        $(this).css('display', 'none');
                        $(this).removeClass("btn-ativo");
                    });
                    
                    global_eixo++;
                    
                    var newE = $("#new_eixo").html();
                    var old = $('#pneus_content').html();
                    $('#pneus_content').html(old + newE);
                    
                    $('#pneus_content').find('.btn-eixo').last().addClass('btn-ativo');
                    $('#pneus_content').find('.btn-vazio').last().addClass('btn-ativo');
                    $('#pneus_content').find('.btn-rem').last().addClass('btn-ativo');
                    $('#pneus_content').find('.row').last().prop('id', 'eixo_' + global_eixo);
                    
                    $('#pneus_content').find('.row').last().find('.btn-e').attr('onClick', 'newPneuE(' + global_eixo + ')');
                    $('#pneus_content').find('.row').last().find('.btn-d').attr('onClick', 'newPneuD(' + global_eixo + ')');
                    $('#pneus_content').find('.row').eq(-2).find('.eixo-h').css('padding-bottom', '25px');
                    
                    $('#pneus_content').find('.row').last().find('.col-md-2').last().addClass('bot-car');
                    var check = parseInt(global_eixo) - 1;
                    if(check == 1){
                        $('#eixo_1').find('.col-md-2').last().removeClass('full-car').addClass('top-car');
                    }else{
                        $('#pneus_content').find('.row').eq(-2).find('.col-md-2').last().removeClass('bot-car').addClass('mid-car');
                    }
                    
                    $('#pneus_content').find('.anchor-e').last().prop('id', 'anchor_e_' + global_eixo).removeClass('anchor-e');
                    $('#pneus_content').find('.anchor-d').last().prop('id', 'anchor_d_' + global_eixo).removeClass('anchor-d');

                    $('#pneus_content').find('.row').last().find('.h4-eixo').last().html(global_eixo).removeClass('h4-eixo');
                
                    $('#qtd_eixos').val(global_eixo);
                }
                
                //-> Função que adiciona um novo eixo sem pneus
                function newVazio(){
                    $('#first_hr').css('padding-bottom', '25px');
                    $('.btn-ativo').each(function(){
                        $(this).css('display', 'none');
                        $(this).removeClass("btn-ativo");
                    });
                    
                    global_eixo++;
                    
                    var newE = $("#new_eixo").html();
                    var old = $('#pneus_content').html();
                    $('#pneus_content').html(old + newE);
                    
                    $('#pneus_content').find('.btn-eixo').last().addClass('btn-ativo');
                    $('#pneus_content').find('.btn-vazio').last().addClass('btn-ativo');
                    $('#pneus_content').find('.btn-rem').last().addClass('btn-ativo');
                    $('#pneus_content').find('.row').last().prop('id', 'eixo_' + global_eixo);
                    
                    $('#pneus_content').find('.row').last().find('.btn-e').remove();
                    $('#pneus_content').find('.row').last().find('.btn-d').remove();
                    $('#pneus_content').find('.row').eq(-2).find('.eixo-h').css('padding-bottom', '25px');
                    
                    $('#pneus_content').find('.row').last().find('.col-md-2').last().addClass('bot-car');
                    var check = parseInt(global_eixo) - 1;
                    if(check == 1){
                        $('#eixo_1').find('.col-md-2').last().removeClass('full-car').addClass('top-car');
                    }else{
                        $('#pneus_content').find('.row').eq(-2).find('.col-md-2').last().removeClass('bot-car').addClass('mid-car');
                    }
                    
                    $('#pneus_content').find('.anchor-e').last().prop('id', 'anchor_e_' + global_eixo).removeClass('anchor-e');
                    $('#pneus_content').find('.anchor-d').last().prop('id', 'anchor_d_' + global_eixo).removeClass('anchor-d');

                    $('#pneus_content').find('.row').last().find('.h4-eixo').last().html(global_eixo).removeClass('h4-eixo');
                
                    $('#qtd_eixos').val(global_eixo);
                }
                
                //-> Função que remove o último eixo
                function rmvEixo(){
                    if(global_eixo == 2 && global_eixo != 1){
                        $('#eixo_1').find('h4').last().addClass('h4-eixo');
                        
                        $('#anchor_d_' + global_eixo).addClass('anchor-d');
                        $('#anchor_e_' + global_eixo).addClass('anchor-e');
                        
                        $('#eixo_1').find('.btn-rem').last().addClass('btn-ativo');
                        $('#eixo_1').find('.btn-vazio').last().addClass('btn-ativo');
                        $('#eixo_1').find('.btn-eixo').last().addClass('btn-ativo');
                        
                        $('#first_hr').css('padding-bottom', '0px');
                        
                        removeSelEixo(global_eixo);

                        $('#eixo_' + global_eixo).remove();
                        
                        global_eixo--;
                        
                        if(global_eixo == 1){
                            $('#eixo_1').find('.col-md-2').last().removeClass('top-car').addClass('full-car');
                        }
                        
                        $('.btn-ativo').each(function(){
                            $(this).css('display', 'inline');
                        });
                    }else if(global_eixo != 1){
                        $('#pneus_content').find('.row').eq(-2).find('h4').last().addClass('h4-eixo');
                        
                        $('#anchor_d_' + global_eixo).addClass('anchor-d');
                        $('#anchor_e_' + global_eixo).addClass('anchor-e');
                        
                        $('#pneus_content').find('.btn-rem').eq(-2).addClass('btn-ativo');
                        $('#pneus_content').find('.btn-vazio').eq(-2).addClass('btn-ativo');
                        $('#pneus_content').find('.btn-eixo').eq(-2).addClass('btn-ativo');
                        
                        $('#pneus_content').find('.row').eq(-2).find('.eixo-h').css('padding-bottom', '0px');
                        $('#pneus_content').find('.row').eq(-2).find('.col-md-2').last().removeClass('mid-car').addClass('bot-car');
                        
                        removeSelEixo(global_eixo);
                        
                        $('#eixo_' + global_eixo).remove();
                        
                        global_eixo--;
                        
                        $('.btn-ativo').each(function(){
                            $(this).css('display', 'inline');
                        });
                    }else if(global_eixo == 1){
                        removeSelecionados(0, 0);
                        removeSelecionados(0, 1);
                    }
                
                    $('#qtd_eixos').val(global_eixo);
                }
                
                //-> Função que adiciona um novo pneu na esquerda no eixo
                function newPneuE(eixo){
                    var rmvbtn = '<button type="button" class="btn btn-primary btn-custom btn-rmv" onclick="rmvPneuE(' + eixo + ')" title="Remover Pneu Esquerdo"><em style="color: red" class="fa fa-minus"></em></button>'
                    var anchor = "";
                    if($('#anchor_e_' + eixo).val() < 1){
                        var res = parseInt($('#anchor_e_' + eixo).val()) + 1;
                        $('#anchor_e_' + eixo).val(res);
                        
                        var btn = $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-e').last().prop("outerHTML");
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-e').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-rmv').last().remove();

                        var old = $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html();
                        var d_pneu = $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-20-e').last().html();
                        var array = [<?php echo json_encode($pneusIndividuais); ?>];
                        
                        if($('#anchor_e_' + eixo).val() == 1){
                            var id = (parseInt(eixo) - 1) * 2 - 1;
                        }else if($('#anchor_e_' + eixo).val() == 2){
                            var id = (parseInt(eixo) - 1) * 2;
                        }
                        
                        var newP = '<select style="width: 100%!important;" class="pneu" name="pneueixoE[' + id + ']" id="pneuE_' + id + '" onchange="salvaSelecionados($(this).val(), '+id+', 0)" title="Selecione o Pneu Esquerdo Interno"></select>';
                        var newImg = '<img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Esquerdo Interno">';

                        $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html(old + newP + btn + rmvbtn);
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-20-e').last().html(d_pneu + newImg);
                        
                        refresh_unico(id, 'E');
                        
                        anchor = 'pneuE_' + id;
                    }else{
                        var res = parseInt($('#anchor_e_' + eixo).val()) + 1;
                        $('#anchor_e_' + eixo).val(res);
                        
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-e').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-rmv').last().remove();
                        
                        var old = $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html();
                        var d_pneu = $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-20-e').last().html();
                        var array = [<?php echo json_encode($pneusIndividuais); ?>];
                        
                        if($('#anchor_e_' + eixo).val() == 1){
                            var id = (parseInt(eixo) - 1) * 2 - 1;
                        }else if($('#anchor_e_' + eixo).val() == 2){
                            var id = (parseInt(eixo) - 1) * 2;
                        }
                        
                        var newP = '<select style="width: 100%!important" class="pneu" name="pneueixoE[' + id + ']" id="pneuE_' + id + '" onchange="salvaSelecionados($(this).val(), '+id+', 0)" title="Selecione o Pneu Esquerdo Externo"></select>';
                        var newImg = '<img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Esquerdo Externo">';

                        $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html(old + newP + rmvbtn);
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-20-e').last().html(d_pneu + newImg);
                        
                        refresh_unico(id, 'E');
                        
                        anchor = 'pneuE_' + id;
                    }
                    
                    //initializeSelect2($('#'+anchor));
                }
                
                //-> Função que adiciona um novo pneu na direita no eixo
                function newPneuD(eixo){
                    var rmvbtn = '<button type="button" class="btn btn-primary btn-custom btn-rmv" onclick="rmvPneuD(' + eixo + ')" title="Remover Pneu Direito"><em style="color: red" class="fa fa-minus"></em></button>'
                    var anchor = "";
                    if($('#anchor_d_' + eixo).val() < 1){
                        var res = parseInt($('#anchor_d_' + eixo).val()) + 1;
                        $('#anchor_d_' + eixo).val(res);
                        
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-d').last().css('margin-top', '0%');
                        var btn = $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-d').last().prop("outerHTML");
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-d').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-rmv').last().remove();

                        var old = $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html();
                        var d_pneu = $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-20-d').last().html();
                        var array = [<?php echo json_encode($pneusIndividuais); ?>];
                        
                        if($('#anchor_d_' + eixo).val() == 1){
                            var id = (parseInt(eixo) - 1) * 2 - 1;
                        }else if($('#anchor_d_' + eixo).val() == 2){
                            var id = (parseInt(eixo) - 1) * 2;
                        }
                        
                        var newP = '<select style="width: 100%!important" class="pneu" name="pneueixoD[' + id + ']" id="pneuD_' + id + '" onchange="salvaSelecionados($(this).val(), '+id+', 1)" title="Selecione o Pneu Direito Interno"></select>';
                        var newImg = '<img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Direito Interno">';

                        $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html(old + newP + btn + rmvbtn);
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-20-d').last().html(d_pneu + newImg);
                        
                        refresh_unico(id, 'D');
                        
                        anchor = 'pneuD_' + id;
                    }else{
                        var res = parseInt($('#anchor_d_' + eixo).val()) + 1;
                        $('#anchor_d_' + eixo).val(res);
                        
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-d').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-rmv').last().remove();
                        
                        var old = $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html();
                        var d_pneu = $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-20-d').last().html();
                        var array = [<?php echo json_encode($pneusIndividuais); ?>];
                        
                        if($('#anchor_d_' + eixo).val() == 1){
                            var id = (parseInt(eixo) - 1) * 2 - 1;
                        }else if($('#anchor_d_' + eixo).val() == 2){
                            var id = (parseInt(eixo) - 1) * 2;
                        }
                        
                        var newP = '<select  style="width: 100%!important" class="pneu" name="pneueixoD[' + id + ']" id="pneuD_' + id + '" onchange="salvaSelecionados($(this).val(), '+id+', 1)" title="Selecione o Pneu Direito Externo"></select>';
                        var newImg = '<img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Direito Externo">';
                        
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html(old + newP + rmvbtn);
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-20-d').last().html(d_pneu + newImg);
                        
                        refresh_unico(id, 'D');
                        
                        anchor = 'pneuD_' + id;
                    }
                    
                    //initializeSelect2($('#'+anchor));
                }
                
                function initializeSelect2(selectElementObj) {
                    selectElementObj.select2({theme: 'bootstrap'});
                }
                
                //-> Função que remove o último pneu inserido na esquerda do eixo
                function rmvPneuE(eixo){
                    if($('#anchor_e_' + eixo).val() == 1){
                        var check = $('#eixo_' + eixo).find('.e-pneus').last().find('select').last().val();
                        
                        $('#eixo_' + eixo).find('.e-pneus').last().find('select').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('img').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-rmv').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-e').last().remove();
                        
                        var btn = '<button type="button" class="btn btn-primary btn-custom btn-e" onclick="newPneuE(' + eixo + ')" title="Adicionar Pneu Esquerdo"><em class="fa fa-plus"></em></button>'
                        var old = $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html(old + btn);
                        
                        var res = parseInt($('#anchor_e_' + eixo).val()) - 1;
                        $('#anchor_e_' + eixo).val(res);
                        
                        var id = (parseInt(eixo) - 1) * 2 - 1;
                    }else{
                        var rmvbtn = $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-rmv').last().prop("outerHTML");
                        var check = $('#eixo_' + eixo).find('.e-pneus').last().find('select').last().val();
                        
                        $('#eixo_' + eixo).find('.e-pneus').last().find('select').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('img').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-rmv').last().remove();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.btn-e').last().remove();
                        
                        var btn = '<button type="button" class="btn btn-primary btn-custom btn-e" onclick="newPneuE(' + eixo + ')"><em class="fa fa-plus" title="Adicionar Pneu Esquerdo"></em></button>'
                        var old = $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html();
                        $('#eixo_' + eixo).find('.e-pneus').last().find('.custom-80-e').last().html(old + btn + rmvbtn);
                    
                        var res = parseInt($('#anchor_e_' + eixo).val()) - 1;
                        $('#anchor_e_' + eixo).val(res);
                        
                        var id = (parseInt(eixo) - 1) * 2;
                    }
                    if(check != null){
                        removeSelecionados(id, 0);
                    }
                }
                
                //-> Função que remove o último pneu inserido na direita do eixo
                function rmvPneuD(eixo){
                    if($('#anchor_d_' + eixo).val() == 1){
                        var check = $('#eixo_' + eixo).find('.d-pneus').last().find('select').last().val();
                        
                        $('#eixo_' + eixo).find('.d-pneus').last().find('select').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('img').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-rmv').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-d').last().remove();
                        
                        var btn = '<button type="button" style="margin-top: 7%" class="btn btn-primary btn-custom btn-d" onclick="newPneuD(' + eixo + ')" title="Adicionar Pneu Direito"><em class="fa fa-plus"></em></button>'
                        var old = $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html(old + btn);
                        
                        var res = parseInt($('#anchor_d_' + eixo).val()) - 1;
                        $('#anchor_d_' + eixo).val(res);
                        
                        var id = (parseInt(eixo) - 1) * 2 - 1;
                    }else{
                        var rmvbtn = $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-rmv').last().prop("outerHTML");
                        var check = $('#eixo_' + eixo).find('.d-pneus').last().find('select').last().val();
                        
                        $('#eixo_' + eixo).find('.d-pneus').last().find('select').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('img').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-rmv').last().remove();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.btn-d').last().remove();
                        
                        var btn = '<button type="button" class="btn btn-primary btn-custom btn-d" onclick="newPneuD(' + eixo + ')" title="Adicionar Pneu Direito"><em class="fa fa-plus"></em></button>'
                        var old = $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html();
                        $('#eixo_' + eixo).find('.d-pneus').last().find('.custom-80-d').last().html(old + btn + rmvbtn);
                    
                        var res = parseInt($('#anchor_d_' + eixo).val()) - 1;
                        $('#anchor_d_' + eixo).val(res);
                        
                        var id = (parseInt(eixo) - 1) * 2;
                    }
                    if(check != null){
                        removeSelecionados(id, 1);
                    }
                }
                
                //-> Função que salva no array quando um pneu é selecionado
                function salvaSelecionados(val, id, lado){
                    if(lado == 0){
                        global_selecteds_e[id] = val;
                    }else{
                        global_selecteds_d[id] = val;
                    }
                    refresh_pneu();
                }
                
                //-> Função que remove um pneu selecionado do array
                function removeSelecionados(id, lado){
                    if(lado == 0){
                        global_selecteds_e[id] = null;
                    }else{
                        global_selecteds_d[id] = null;
                    }
                    refresh_pneu();
                }
                
                //-> Função que remove todos os pneus selecionados do eixo
                function removeSelEixo(eixo){
                    $('#eixo_'+eixo).find('select').each(function(){
                        if($(this).val() != null){
                            var id = $(this).prop('id').substr(6);
                            var lado = $(this).prop('id').substr(4, 1);
                            if(lado == "E"){
                                global_selecteds_e[id] = null;
                            }else if(lado == "D"){
                                global_selecteds_d[id] = null;
                            }
                        }
                    });
                    refresh_pneu();
                }
                
                //-> Refresh em todos os selects
                function refresh_pneu(){
                    var array = [<?php echo json_encode($pneusIndividuais); ?>];
                    $('.pneu').each(function(){
                        var id = $(this).prop('id').substr(6);
                        var idfull = $(this).prop('id');
                        var lado = $(this).prop('id').substr(4, 1);
                        var newP = '<option selected disabled>-- Selecionar --</option>';
                        
                        array[0].forEach(function(currentValue, index){
                            
                            var teme = false;
                            for(var i = 0; i < global_selecteds_e.length; i++){
                                if(global_selecteds_e[i] == currentValue.pneus_individual_id){teme = true;}
                            }
                            
                            var temd = false;
                            for(var i = 0; i < global_selecteds_d.length; i++){
                                if(global_selecteds_d[i] == currentValue.pneus_individual_id){temd = true;}
                            }
                            
                            var sel = "";
                            
                            if(lado == "E"){
                                if(global_selecteds_e[id] == currentValue.pneus_individual_id){sel = " selected ";}
                            }else if(lado == "D"){
                                if(global_selecteds_d[id] == currentValue.pneus_individual_id){sel = " selected ";}
                            }
                            
                            if(!teme && !temd){
                                newP += '<option value="' + currentValue.pneus_individual_id + '">' + currentValue.pneus_individual_marcacao + ' / ' + currentValue.pneus_individual_matricula + ' / ' + currentValue.pneus_individual_dot  + '</option>';
                            }else if((teme || temd) && sel != ""){
                                newP += '<option value="' + currentValue.pneus_individual_id + '" ' + sel + '>' + currentValue.pneus_individual_marcacao + ' / ' + currentValue.pneus_individual_matricula + ' / ' + currentValue.pneus_individual_dot + '</option>';
                            }
                            
                        });
                        
                        $('#'+idfull).html(newP);
                    });
                }
                
                //-> Refresh em um select expícico
                function refresh_unico(id, lado){
                    var array = [<?php echo json_encode($pneusIndividuais); ?>];
                    var idfull = 'pneu'+lado+'_'+id;
                    var newP = '<option selected disabled>-- Selecionar --</option>';
                    
                    array[0].forEach(function(currentValue, index){
                        
                        var teme = false;
                        for(var i = 0; i < global_selecteds_e.length; i++){
                            if(global_selecteds_e[i] == currentValue.pneus_individual_id){teme = true;}
                        }
                        
                        var temd = false;
                        for(var i = 0; i < global_selecteds_d.length; i++){
                            if(global_selecteds_d[i] == currentValue.pneus_individual_id){temd = true;}
                        }
                        
                        var sel = "";
                        
                        if(lado == "E"){
                            if(global_selecteds_e[id] == currentValue.pneus_individual_id){sel = " selected ";}
                        }else if(lado == "D"){
                            if(global_selecteds_d[id] == currentValue.pneus_individual_id){sel = " selected ";}
                        }
                        
                        if(!teme && !temd){
                            newP += '<option value="' + currentValue.pneus_individual_id + '">' + currentValue.pneus_individual_marcacao + ' / ' + currentValue.pneus_individual_matricula + ' / ' + currentValue.pneus_individual_dot  + '</option>';
                        }else if((teme || temd) && sel != ""){
                            newP += '<option value="' + currentValue.pneus_individual_id + '" ' + sel + '>' + currentValue.pneus_individual_marcacao + ' / ' + currentValue.pneus_individual_matricula + ' / ' + currentValue.pneus_individual_dot  + '</option>';
                        }
                        
                    });
                    
                    $('#'+idfull).html(newP);
                }
            </script>