        
            <style>
                .see-data{
                    color: black;
                    font-size: 16px;
                }
                .see-place{
                    font-size: 14px;
                }
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    border-radius: 5px;
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
                /* Style the tab */
                .l-tab {
                    float: left;
                    width: 11%;
                }
                
                /* Style the buttons that are used to open the tab content */
                .l-tab button {
                    display: block;
                    background-color: #ddd;
                    color: #5a5a5a;
                    padding: 22px 16px;
                    width: 100%;
                    border: none;
                    outline: none;
                    text-align: left;
                    cursor: pointer;
                    transition: 0.3s;
                }
                
                /* Change background color of buttons on hover */
                .l-tab button:hover {
                    background-color: #e6e6e6;
                }
                
                /* Create an ativo/current "l-tab button" class */
                .l-tab button.ativo {
                    background-color: white;
                    color: black;
                }
                
                /* Style the tab content */
                .l-tabcontent {
                    float: left;
                    padding: 12px 24px 12px 24px;
                    width: 89%;
                    min-height: 300px;
                    border-left: none;
                    display: none;
                    background-color: white;
                }
                
                .l-tabcontent.ativo{
                    display: block;
                }
                
                .doc-col{
                    padding: 0px 10% 0px 10%;
                    margin-bottom: 15px;
                }
                .doc-img{
                    width: 100%;
                    height: auto;
                }
                .doc-col h4{
                    font-weight: bold;
                    text-align: center;
                }
                .btn-success:disabled{
                    background-color: #5cb85c;
                    border-color: #4cae4c;
                }
            </style>
        
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Veículo Único</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Frota</li>
                                    <li class="breadcrumb-item" aria-current="page">Veículos</li>
                                    <li class="breadcrumb-item active" aria-current="page">Veículo Único</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <div class="l-tab">
                            <button class="l-tablinks ativo" onclick="openTab(event, 'dados')">Dados</button>
                            <button class="l-tablinks" onclick="openTab(event, 'docs')">Documentos</button>
                            <button class="l-tablinks" onclick="openTab(event, 'pneus')">Pneus</button>                            
                            <button class="l-tablinks" onclick="openTab(event, 'historico')">Histórico</button>
                        </div>
                        
                        <div id="dados" class="l-tabcontent ativo">
                            <div class="row">
                                <div class="col-md-10 form-group">
                                    <h3><b>Frota: <?php echo $frota['frota_codigo'] ?></b></h3>
                                </div>
                                <div class="col-md-2 form-group text-right">
                                    <h3>
                                    <?php if($frota['frota_ativo_id'] == 1){ ?>
                                    <button type="button" disabled class="btn btn-success">Ativo</button>
                                    <?php }else{ ?>
                                    <button type="button" disabled class="btn btn-danger">Inativo</button>
                                    <?php } ?>
                                    </h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 form-group">
                                    <p>Chassi: <?php echo $frota['frota_chassi'] ?></p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <p>Renavam: <?php echo $frota['frota_renavam'] ?></p>
                                </div>
                                <div class="col-md-3 form-group" <?php if($frota['frota_placa'] == "")echo "style='display: none'"; ?>>
                                    <p>Placa: <?php echo $frota['frota_placa'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <p>Detalhes: <b><?php echo $modelo ?></b></p>
                                </div>
                            </div>
                            <div class="row" <?php if($cabine != null || $munck != null){echo "style='display: block'";}else{echo "style='display: none'";}?>>
                                <div class="col-md-6 form-group">
                                    <p>Tipo de Cabine: <?php echo $cabine['frota_tipogabine_nome'] ?></p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <p>Tipo de Munck: <?php echo $munck ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <p>Tipo de Pneus: <?php echo $pneu ?></p>
                                </div>
                                <div class="col-md-4 form-group">
                                    <p>Câmbio: <?php echo $frota['frota_cambio'] ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <p>Situação: <?php echo $status ?></p>
                                </div>
                                <div class="col-md-3 form-group">
                                    <p>Peso (Tara): <?php echo $frota['frota_tara'] ?></p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <p>Km: <?php echo $frota['frota_km'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div id="pneus" class="l-tabcontent">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <h3><b>Pneus Vinculados</b></h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                    $corresponding = 0;
                                    foreach($pneusIndividuais as $key => $value){if($value['pneus_individual_frota_id'] == $frota['frota_id']){$corresponding++;}}
                                    if(sizeof($pneusIndividuais) > 0 && $corresponding > 0){ ?>
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <th width="6%">ID</th>
                                            <th width="12%">Marcação</th>
                                            <th width="35%">Tipo de Pneu</th>
                                            <th width="35%">Último Registro</th>
                                            <th width="6%">Registros</th>
                                            <th width="6%">Desvincular</th>
                                        </thead>
                                        <tbody class="tb">
                                            <?php 
                                                foreach($pneusIndividuais as $pi){ 
                                                    if($pi['pneus_individual_frota_id'] == $frota['frota_id']){
                                            ?>
                                                <tr>
                                                    <td><?php echo $pi['pneus_individual_id'] ?></td>
                                                    <td><?php echo $pi['pneus_individual_marcacao'] ?></td>
                                                    <td>
                                                    <?php 
                                                        foreach($pneus as $tipopneu){
                                                            if($tipopneu['frota_pneu_id'] == $pi['pneus_individual_tipopneu_id']){
                                                                echo $tipopneu['frota_pneu_marca'] . ' | Aro: ' . $tipopneu['frota_pneu_aro'] . ' | Banda: ' . $tipopneu['frota_pneu_banda'];
                                                            }
                                                        }
                                                    ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        if(sizeof($pneusRegistros) > 0){
                                                            $lastIndex = -1;
                                                            foreach($pneusRegistros as $key => $value){
                                                                if($value['pneus_registro_individual_id'] == $pi['pneus_individual_id']){
                                                                    $lastIndex = $key;
                                                                }
                                                            }
                                                            if($lastIndex >= 0){
                                                                echo date("d/m/Y",strtotime($pneusRegistros[$lastIndex]['pneus_registro_data'])) . ' - ' . $pneusRegistros[$lastIndex]['pneus_registro_situacao'];
                                                                if(strlen($pneusRegistros[$lastIndex]['pneus_registro_observacao']) > 0){
                                                                    echo ': ' . $pneusRegistros[$lastIndex]['pneus_registro_observacao'];
                                                                }
                                                            }
                                                            else{
                                                                echo " -- ";
                                                            }
                                                        }else{
                                                            echo " -- ";
                                                        }
                                                    ?>
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#modalRegistros" class="btn btn-info" onclick="registro(<?php echo $pi['pneus_individual_id'] ?>)"><i class="fab fa-wpforms"></i></a>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-danger" href="<?php echo base_url('frota/desvincular/'.$pi['pneus_individual_id']); ?>"><i class="fas fa-unlink"></i></a>
                                                    </td>
                                                </tr>
                                            <?php 
                                                    }
                                                } 
                                            ?>
                                        </tbody>
                                    </table>
                                    <?php }else if(sizeof($pneusIndividuais) == 0){ ?>
                                        <div class="text-center" style="width:100%">
                                            <br>
                                            <h5>Ainda não existem pneus cadastrados.</h5>
                                            <br><br>
                                        </div>
                                    <?php }else if($corresponding == 0){ ?>
                                        <div class="text-center" style="width:100%">
                                            <br>
                                            <h5>Não existem pneus vinculados à este veículo.</h5>
                                            <br><br>
                                        </div>
                                    <?php }else{ ?>
                                        <div class="text-center" style="width:100%">
                                            <br>
                                            <h5>Ocorreu um erro.</h5>
                                            <br><br>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <div id="docs" class="l-tabcontent">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <h3><b>Documentação</b></h3>
                                </div>
                            </div>
                            <div class="row">
                                <?php foreach($docs as $doc){ ?>
                                <div class="col-md-3 doc-col">
                                    <?php if($doc['documento_isimagem'] == 1){ ?>
                                    <a target="_blank" href="<?php echo base_url('uploads/').$frota['frota_codigo']."_".$doc['documento_tipo_id'].".png" ?>">
                                        <img class="doc-img" src="<?php echo base_url('uploads/').$frota['frota_codigo']."_".$doc['documento_tipo_id'].".png" ?>">
                                    </a>
                                    <?php }else{ ?>
                                    <a target="_blank" href="<?php echo base_url('uploads/').$frota['frota_codigo']."_".$doc['documento_tipo_id'].".pdf" ?>">
                                        <img class="doc-img" src="<?php echo base_url('resources/imgs/pdf_cover.png') ?>">
                                    </a>
                                    <?php } 
                                    foreach($docs_tipos as $td){
                                        if($td['documentos_tipos_id'] == $doc['documento_tipo_id']){
                                            echo "<h4>".mb_strtoupper($td['documentos_tipos_nome'])."</h4><br>";
                                        }
                                    } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div id="historico" class="l-tabcontent">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <h3><b>Histórico</b></h3>
                                </div>
                            </div>
                            <div class="row">
                                ...
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <script>
                function openTab(evt, div) {
                    // Declare all variables
                    var i, tabcontent, tablinks;
                
                    // Get all elements with class="l-tabcontent" and hide them
                    tabcontent = document.getElementsByClassName("l-tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                
                    // Get all elements with class="l-tablinks" and remove the class ativo"
                    tablinks = document.getElementsByClassName("l-tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" ativo", "");
                    }
                
                    // Show the current tab, and add an "ativo" class to the link that opened the tab
                    document.getElementById(div).style.display = "block";
                    evt.currentTarget.className += " ativo";
                }
            </script>
            