            
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
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"><?php if($edita != null){echo 'Edição de Veículo';}else{echo 'Cadastro de Veículo';} ?></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Frota</li>
                                    <li class="breadcrumb-item" aria-current="page">Veículos</li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php if($edita != null){echo 'Edição de Veículo';}else{echo 'Cadastro de Veículo';} ?></li>
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
                        
                        <form action="<?php echo base_url('frota/insertFrota') ?>" method="post" enctype='multipart/form-data'>
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9">
                                <li class="nav-item">
                                    <a class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)">Dados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px; <?php if($edita == null){echo "display:none;";} ?>" id="aPneus" onclick="change(2)">Pneus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDocs" onclick="change(3)">Documentos</a>
                                </li>
                                <li class="nav-item" id="li_pneu" style="display: none">
                                    <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aPn" onclick="change(4)">Pneus Cadastro</a>
                                </li>
                            </ul>
                            
                            <div id="divDados" class="change-tab-div white-tab">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
                        
                                    <input type="hidden" id="isedit" name="isedit" <?php if($edita != null){echo "value='1'";} ?> />
                                    <input type="hidden" id="id" name="id" <?php if($edita != null){echo "value='". $edita['frota_id'] ."'";} ?>/>
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-3 form-group">
                                            <label for="placa">Placa</label><br>
                                            <input id="placa" name="placa" type="text" class="form-control" maxlength="7" placeholder="Máximo 7 caracteres"/>
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label for="codigo">Código da frota</label><br>
                                            <input id="codigo" name="codigo" type="text" class="form-control" placeholder="Ex.: 1A" maxlength="20" required>
                                        </div>
                                        
                                        <div class="col-md-6 form-group">
                                            <label for="modelo">Modelo de Veículo</label><br>
                                            <div style="width: 80%; display: inline; float: left;">
                                                <select class="js-example-basic-multiple" style="width:100%;" name="modelo" id="modelo" required>
                                                    <option selected disabled>-- Selecionar --</option>
                                                    <?php foreach($modelos as $modelo){ ?>
                                                        <option value="<?php echo $modelo['frota_modelo_id'] ?>">
                                                        <?php foreach($marcas as $marca){if($marca['frota_marca_id'] == $modelo['frota_modelo_marca_id']){ echo $marca['frota_marca_nome'] ; }} ?>
                                                        <?php echo '&nbsp;|&nbsp;' . $modelo['frota_modelo_nome'];
                                                            foreach($tipos as $tip){
                                                                if($tip['frota_tipo_id'] == $modelo['frota_modelo_tipo_id']){
                                                                    echo '&nbsp;|&nbsp;' . $tip['frota_tipo_nome'];
                                                                }
                                                            }
                                                        ?>
                                                        
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div style="width: 19%; display: inline; float: left;">
                                                <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" data-toggle="modal" data-target="#modeloCadastro"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="row">
                                        
                                        
                                        
                                        <div class="col-md-4 form-group">
                                            <label for="tipogabine">Tipo de Cabine</label><br>
                                            <div style="width: 80%; display: inline; float: left;">
                                                <select class="js-example-basic-multiple" style="width:100%;" name="tipogabine" id="tipogabine" required>
                                                    <option selected disabled>-- Selecionar --</option>
                                                    <?php foreach($tiposgabine as $tipogabine){
                                                        if($tipogabine['frota_tipogabine_suplemento'] != "1"){?>
                                                        <option value="<?php echo $tipogabine['frota_tipogabine_id'] ?>"><?php echo $tipogabine['frota_tipogabine_nome'] ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <div style="width: 19%; display: inline; float: left;">
                                                <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" data-toggle="modal" data-target="#cabineCadastro"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-1 form-group">
                                            <label for="issuplemento" style="width:100%">Suplemento?</label><br>
                                            <input id="issuplemento" name="issuplemento" type="checkbox" value="1" />
                                        </div>
                                        
                                        <div class="col-md-3">
                                        <div id="suplextypediv" class="col-md-12 form-group" style="display:none;">
                                            <label for="suplemento">Cabine Suplementar</label><br>
                                            <div style="width: 75%; display: inline; float: left;">
                                                <select class="js-example-basic-multiple" style="width:100%;" name="suplemento" id="suplemento" required disabled>
                                                    <option selected disabled>-- Selecionar --</option>
                                                    <?php foreach($tiposgabine as $tipogabine){
                                                        if($tipogabine['frota_tipogabine_suplemento'] == "1"){?>
                                                        <option value="<?php echo $tipogabine['frota_tipogabine_id'] ?>"><?php echo $tipogabine['frota_tipogabine_nome'] ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <div style="width: 24%; display: inline; float: left;">
                                                <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" data-toggle="modal" data-target="#cabineCadastro2"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="col-md-1 form-group">
                                            <label for="ismunck" style="width:100%">Munck?</label><br>
                                            <input id="ismunck" name="ismunck" type="checkbox" value="1" />
                                        </div>
                                        
                                        <div id="muncktypediv" class="col-md-3 form-group" style="display:none;">
                                            <label for="tipomunck">Tipo de Munck</label><br>
                                            <div style="width: 75%; display: inline; float: left;">
                                                <select class="js-example-basic-multiple" style="width:100%;" name="tipomunck" id="tipomunck" required disabled>
                                                    <option selected disabled>-- Selecionar --</option>
                                                    <?php foreach($tiposmunck as $tipomunck){ ?>
                                                        <option value="<?php echo $tipomunck['frota_tipomunck_id'] ?>"><?php echo $tipomunck['frota_tipomunck_nome'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div style="width: 24%; display: inline; float: left;">
                                                <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" data-toggle="modal" data-target="#munckCadastro"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                        
                                    </div>
                            
                                    <br>
                            
                                    <div class="row">
                                        
                                        <div class="col-md-4 form-group">
                                            <label for="linha">Linha de veículo</label><br>
                                            <select class="js-example-basic-multiple" style="width:100%;" name="linha" id="linha" required>
                                                <option selected disabled>-- Selecionar --</option>
                                                <?php foreach($linhas as $linha){ ?>
                                                    <option value="<?php echo $linha['frota_linha_id'] ?>"><?php echo $linha['frota_linha_nome'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-2 form-group">
                                            <label for="ano">Ano/Modelo</label><br>
                                            <input id="ano" name="ano" type="text" class="form-control" onkeypress="$(this).mask('0000/0000');" placeholder="Ex.: 1998/1999" required />
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label for="cor">Cor</label><br>
                                            <input id="cor" name="cor" type="text" class="form-control" placeholder="Ex.: Dourado" />
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label for="cambio">Tipo de Câmbio</label><br>
                                            <input id="cambio" name="cambio" type="text" class="form-control" placeholder="Manual/Automatico" required />
                                        </div>
                                        
                                    </div>
                                    
                                    <br>
                            
                                    <div class="row">
        
                                        <div class="col-md-4 form-group">
                                            <label for="renavam">Renavam</label><br>
                                            <input id="renavam" name="renavam" type="text" class="form-control" placeholder="Ex.: 21234567890" required />
                                        </div>
                                        
                                        <div class="col-md-4 form-group">
                                            <label for="chassi">Chassi</label><br>
                                            <input id="chassi" name="chassi" type="text" class="form-control" placeholder="Ex.: 9BA111AA11A000001" />
                                        </div>
                                        
                                        <div class="col-md-4 form-group">
                                            <label for="preco_compra">Preço de Compra(R$)</label><br>
                                            <input id="preco_compra" name="preco_compra" type="text" class="form-control" placeholder="0.00" />
                                        </div>
                                        
                                    </div>
                                    
                                    <br>
                            
                                    <div class="row">
        
                                        <div class="col-md-3 form-group">
                                            <label for="km">Quilometragem(Km)</label><br>
                                            <input id="km" name="km" type="text" class="form-control" placeholder="0" />
                                        </div>
                                        
                                        <div class="col-md-3 form-group">
                                            <label for="tara">Tara de Peso(Ton.)</label><br>
                                            <input id="tara" name="tara" type="text" class="form-control" placeholder="0" />
                                        </div>
                                        
                                        <div class="col-md-4 form-group">
                                            <label for="linha">Pneu de rodagem</label><br>
                                            <div style="width: 80%; display: inline; float: left;">
                                                <select class="js-example-basic-multiple" style="width:100%;" name="pneu" id="pneu" required onchange="changePneu($(this).val())">
                                                    <option selected disabled>-- Selecionar --</option>
                                                    <?php foreach($pneus as $pneu){ ?>
                                                        <option value="<?php echo $pneu['frota_pneu_id'] ?>"><?php echo $pneu['frota_pneu_marca'] . ' | Aro ' . $pneu['frota_pneu_aro'] . ' | ' . $pneu['frota_pneu_banda'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div style="width: 19%; display: inline; float: left;">
                                                <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" data-toggle="modal" data-target="#pneuCadastro"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-2 form-group" id="qtd_div" style="display: none">
                                            <label>Qtd de Pneus</label><br>
                                            <input id="qtd_p" name="qtd_p" type="text" class="form-control" placeholder="0">
                                        </div>
                                        
                                    </div>
                                    
                                    <br>
                            
                                    <div class="row" <?php if($edita == null){ echo "style='display:none;'"; } ?>>
                                        
                                        <div class="col-md-6 form-group"> 
                                            <label for="status">Status/Situação</label><br>
                                            <div style="width: 85%; display: inline; float: left;">
                                            <select class="js-example-basic-multiple" style="width:100%;" name="status" id="status" required 
                                                <?php if($edita == null){ echo "disabled"; } ?> >
                                                <option selected disabled>-- Selecionar --</option>
                                                <?php foreach($status as $st){ ?>
                                                    <option value="<?php echo $st['frota_status_id'] ?>"><?php echo $st['frota_status_nome'] ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>
                                            <div style="width: 14%; display: inline; float: left;">
                                                <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" data-toggle="modal" data-target="#situacaoCadastro"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 form-group"> 
                                            <label for="status">Ativação</label><br>
                                            <select class="js-example-basic-multiple" style="width:100%;" name="ativo" id="ativo" required 
                                                <?php if($edita == null){ echo "disabled"; } ?> >
                                                <option selected disabled>-- Selecionar --</option>
                                                <?php foreach($ativos as $ativo){ ?>
                                                    <option value="<?php echo $ativo['ativo_id'] ?>"><?php echo $ativo['ativo_tipo'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        
                                    </div>
                        
                                    <br><br>
                                </div>
                            </div>
        
                            <div id="divPneus" style="display:none;" class="change-tab-div white-tab">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
        
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <h4>Pneus Vinculados</h4>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" id="main-pneus">
                                            <?php 
                                            $corresponding = 0;
                                            foreach($pneusIndividuais as $key => $value){
                                                if($value['pneus_individual_frota_id'] == $edita['frota_id']){
                                                    $corresponding++;
                                                }
                                            }
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
                                            <tbody>
                                                <?php 
                                                    foreach($pneusIndividuais as $pi){ 
                                                        if($pi['pneus_individual_frota_id'] == $edita['frota_id']){
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
                                                            <a class="btn btn-info" style="display: none" onclick="registro('<?php echo $pi['pneus_individual_id'] ?>')"><i class="fab fa-wpforms"></i></a>
                                                        </td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#modalDesvincular" class="btn btn-danger" onclick="desvincular('<?php echo $pi['pneus_individual_id'] ?>')"><i class="fas fa-unlink"></i></a>
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
                                    <br><br>
                                </div>
                            </div>
                            
                            <div id="divDocs" style="display:none;" class="change-tab-div white-tab">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
        
                                    <!-- IMAGENS -->
                                    <!-- DOCS PRESET - START -->
                                    <hr style="display: none;">
                                    
                                    <div class="row" id="preset-docs-addnew" style="display: none;">
                                        <div class="col-md-6 text-center active-col">
                                            <br><br>
                                            <a type="button" style="align:center;" onclick="triggerAddNew()" class="preset-docs-addnew-btn"><i class="fas fa-plus-circle btn btn-primary" style="font-size:50px"></i></a>
                                            <br><br><br>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="preset-docs-picktype" style="display: none;">
                                        <div class="col-md-6 text-center" >
                                            <br><br>
                                            <label style="width:100%">Tipo de Documento</label>
                                            <select class="preset-docs-picktype-select" style="width:100%; float:center;" onchange="triggerChange()">
                                                <option id="docs-picktype-placeholder" selected disabled>-- Selecionar --</option>
                                            </select>
                                            <br><br>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="preset-docs-docs" style="display: none;">
                                        <div class="col-md-6 form-group">
                                            <div class="col-md-12" style="padding-bottom: 40px">
                                                
                                                <div class="col-md-6">
                                                    <a class="doc-link" target="_blank">
                                                        <img src="<?php  echo base_url('resources/imgs/imgplaceholder.png'); ?>" class="img-thumbnail preset-docs-docs-doc-preview" style="max-width:200px; height:auto;"/>
                                                    </a>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="input-group my-3">
                                                        
                                                        <div class="row" style="margin: 0">
                                                            <h4 class="preset-docs-docs-doc-title" style="float:left;">DOC</h4>
                                                            <!--<button type="button" class="btn btn-danger preset-docs-docs-doc-dismiss" style="float: right;">X</button>-->
                                                        </div>
                                                        <div class="row" style="margin: 0">
                                                            <input type="text" class="form-control preset-docs-docs-doc-file" placeholder="Selecione um arquivo"
                                                            disabled style="width: 100%"/>
                                                            
                                                            <div class="input-group-append" style="width: 100%">
                                                                <input type="file" class="file preset-docs-docs-doc-doc" accept=".pdf, .doc, .rtf, .xls, .ppt, .odt, .ods, .txt, .jpg, .jpeg, .png, .gif" style="display:none;" 
                                                                 onchange="triggerInputFile(this.id, event)" disabled />
                                                                <button type="button" class="browse btn btn-primary preset-docs-docs-doc-search" style="width:100%">Buscar...</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="display: none;">
                                    <!-- DOCS PRESET - END -->
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!--<h4 style="display:inline; float:left;">Documentação (<p style="display:inline;" id="docs-counter">1</p>)</h4>-->
                                            <h4 style="display:inline; float:left;">Documentação <p style="display:none;" id="docs-counter">1</p><label style="color: #c90000">&nbsp;&nbsp;**</label></h4>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-danger" style="float: left; margin-left:20px" onclick="triggerDismiss()" style="display:inline;">X</a>
                                        </div>
                                    </div>
                                    
                                    <br><br>
                                    <input type="hidden" id="docs-control" name="docs-control" value="6" />
                                    <div class="row" id="docs-div">
                                        <div id="docs-column-1" class="col-md-6 text-center active-doc fixed-doc">
                                            <div class="col-md-12">
                                                
                                                <div class="col-md-6">
                                                    <?php if($edita != null){ if($fixed != null && $fixed['documento_isimagem'] == 0){ echo "<a target='_blank' title='Clique para visualizar!' href='".base_url('uploads/').$edita['frota_codigo']."_6.pdf'>"; } } ?>
                                                    <img src="<?php  if($edita != null){
                                                        if($fixed != null && $fixed['documento_isimagem'] == 1){
                                                            echo base_url('uploads/' . $edita['frota_codigo'] . '_6.png');
                                                        }else if($fixed != null && $fixed['documento_isimagem'] == 0){
                                                            echo base_url('resources/imgs/pdf_cover.png');
                                                        }else{
                                                            echo base_url('resources/imgs/imgplaceholder.png');
                                                        }
                                                    }else{ echo base_url('resources/imgs/imgplaceholder.png'); } ?>" id="6-preview" class="img-thumbnail" style="max-width:200px; height:auto;"/>
                                                    <?php  if($edita != null){ if($fixed['documento_isimagem'] == 0){ echo "</a>"; } } ?>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="input-group my-3">
                                                        <div class="row" style="margin: 0">
                                                            <h4 style="float:left;">CRLV</h4>
                                                        </div>
                                                        <div class="row" style="margin: 0">
                                                            <input type="text" class="form-control" placeholder="Selecione um arquivo" id="6-file" disabled style="width: 100%"/>
                                                            <div class="input-group-append" style="width: 100%">
                                                                <input id="6-doc" type="file" name="6-doc" class="file" accept=".pdf, .doc, .rtf, .xls, .ppt, .odt, .ods, .txt, .jpg, .jpeg, .png, .gif" style="display:none;" 
                                                                <?php if($edita != null){ echo "disabled" ; }  ?> onchange="triggerInputFile(this.id, event)"/>
                                                                <button id="6-search" type="button" class="browse btn btn-primary" style="width:100%">Buscar...</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div id="docs-column-2" class="col-md-6 text-center active-col">
                                            <br><br><br>
                                            <a class="docs-addnew-btn" type="button" onclick="triggerAddNew()" style="align:center;"><i class="fas fa-plus-circle btn btn-primary" style="font-size:50px"></i></a>
                                            <br><br><br><br>
                                        </div>
                                    </div>
                                    <!-- IMAGENS - END -->
        
                                    <br><br>
                                </div>
                            </div>
                            
                            <div id="divPn" style="display:none;" class="change-tab-div white-tab">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
                                    
                                    <input type="hidden" name="anchor_qtd" id="anchor_qtd">
                                    <div id="mainPneus">
                                        
                                    </div>
                                    
                                    <br><br>
                                </div>
                            </div>
                            
                            <div class="row" style="">
                                <div class="col-md-12 text-center">
                                    <br><br>
                                    <a href="<?php echo base_url('frota/listagem') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <button type="submit" id="btn-save" class="btn btn-primary" style="color: white">&nbsp&nbspSalvar&nbsp&nbsp</button>
                                    <br><br>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            
            <!-- ============================================================== -->
            <!-- Modal de Desvinculação Dinâmica  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="modalDesvincular" tabindex="-1" role="dialog" aria-labelledby="modalDesvincularTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <h5 class="modal-title" id="modalDesvincularTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente desvincular o pneu?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white;" onclick="senha()">&nbsp;&nbsp;Sim&nbsp;&nbsp;</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp;&nbsp;Não&nbsp;&nbsp;</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form id="desvinculaForm" method="post">
                                        <input type="hidden" name="id_desvincula" id="id_desvincula">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite a Senha" required style="width: 50%; margin-left: 25%"><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp;&nbsp;Confirmar&nbsp;&nbsp;</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal de Visualização de Resgistro  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalRegistroTitle">Ver Registros</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12" id="receptor">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal do Cadastro Dinâmico de Modelo  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="modeloCadastro" tabindex="-1" role="dialog" aria-labelledby="modeloCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modeloCadastroLabel">Novo Modelo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formModelo">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Modelo</label><br>
                                        <input type="text" class="form-control" id="nome_modelo" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Marca</label><br>
                                        <div style="width: 80%; float: left">
                                            <select class="js-example-basic-multiple" style="width: 100%" id="marca_modelo">
                                                <option value='0' disabled selected>-- Selecione uma Opção --</option>
                                                <?php
                                                    foreach($marcas as $ma){
                                                        echo "<option value='".$ma['frota_marca_id']."'>".$ma['frota_marca_nome']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div style="width: 20%; float: left">
                                            <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" onclick="mostraMarca()"><em class="fa fa-plus"></em></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Tipo de Veículo</label><br>
                                        <div style="width: 80%; float: left">
                                            <select class="js-example-basic-multiple" style="width: 100%" id="tipo_modelo">
                                                <option value='0' disabled selected>-- Selecione uma Opção --</option>
                                                <?php
                                                    foreach($tipos as $tp){
                                                        echo "<option value='".$tp['frota_tipo_id']."'>".$tp['frota_tipo_nome']."</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div style="width: 20%; float: left">
                                            <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" onclick="mostraTipo()"><em class="fa fa-plus"></em></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal do Cadastro Dinâmico de Marca  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="marcaCadastro" tabindex="-1" role="dialog" aria-labelledby="marcaCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="marcaCadastroLabel">Nova Marca</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="escondeMarca()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formMarca">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome da Marca</label><br>
                                        <input type="text" class="form-control" id="nome_marca" placeholder="Nome">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="escondeMarca()">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal do Cadastro Dinâmico de Tipo de Veículo  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="tipoCadastro" tabindex="-1" role="dialog" aria-labelledby="tipoCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="tipoCadastroLabel">Novo Tipo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="escondeTipo()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formTipo">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Tipo</label><br>
                                        <input type="text" class="form-control" id="nome_tipo" placeholder="Nome">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="escondeTipo()">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal do Cadastro Dinâmico de Tipo de Cabine  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="cabineCadastro" tabindex="-1" role="dialog" aria-labelledby="cabineCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="cabineCadastroLabel">Novo Tipo de Cabine</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formCabine">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Novo Tipo de Cabine</label><br>
                                        <input type="text" class="form-control" id="nome_cabine" placeholder="Nome">
                                        <input type="hidden" class="form-control" id="suplemento" value="0">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="cabineCadastro2" tabindex="-1" role="dialog" aria-labelledby="cabineCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="cabineCadastroLabel">Novo Tipo de Cabine Suplementar</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formCabine2">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Novo Tipo de Cabine</label><br>
                                        <input type="text" class="form-control" id="nome_cabine2" placeholder="Nome">
                                        <input type="hidden" class="form-control" id="suplemento2" value="1">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- Modal do Cadastro Dinâmico de Tipo de Munck  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="munckCadastro" tabindex="-1" role="dialog" aria-labelledby="munckCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="munckCadastroLabel">Novo Tipo de Munck</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formMunck">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Novo Tipo de Munck</label><br>
                                        <input type="text" class="form-control" id="nome_munck" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Ano</label><br>
                                        <input type="number" class="form-control" id="ano_munck">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Modelo do Munck</label><br>
                                        <input type="text" class="form-control" id="modelo_munck" placeholder="Modelo">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal do Cadastro Dinâmico de Tipo de Pneu  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="pneuCadastro" tabindex="-1" role="dialog" aria-labelledby="pneuCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="pneuCadastroLabel">Novo Tipo de Pneu</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formPneu">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Marca</label><br>
                                        <input type="text" class="form-control" id="marca_pneu" placeholder="Marca">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Aro</label><br>
                                        <input type="text" class="form-control" id="aro_pneu" placeholder="Aro">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Banda</label><br>
                                        <input type="text" class="form-control" id="banda_pneu" placeholder="Banda">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Quantidade</label><br>
                                        <input type="number" class="form-control" id="qtd_pneu">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal do Cadastro Dinâmico de Situação  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="situacaoCadastro" tabindex="-1" role="dialog" aria-labelledby="situacaoCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="situacaoCadastroLabel">Nova Situação</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formSituacao">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome da Situação</label><br>
                                        <input type="text" class="form-control" id="nome_situacao" placeholder="Nome">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- Funções relacionadas à inicialização da página -->
            <script>
                $(document).ready(function(){
        
                    //------------------- APPLY
                    
                    $("#preco_compra").mask("#.##0,00", {reverse: true});
                    $("#renavam").mask('00000000000');
                    $("#chassi").mask('AAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z0-9]/},}});
                    $("#km").mask('0#');
                    $("#tara").mask("#0,000", {reverse: true});
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
                        
                        $("#modelo").val(data.frota_modelo_id).change();
                        
                        $("#ano").val(data.frota_ano);
                        $("#cambio").val(data.frota_cambio);
                        $("#cor").val(data.frota_cor);
                        $("#linha").val(data.frota_linha_id).change();
                        $("#preco_compra").unmask().val(data.frota_preco_compra.replace('.', ',')).mask("#.##0,00", {reverse: true});
                        $("#km").val(data.frota_km);
                        
                        $("#pneu").val(data.frota_pneu_id).change();
                        $("#tara").unmask().val(data.frota_tara.replace('.', ',')).mask("#0,000", {reverse: true});
                        
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
                            marcacao = '<?php echo $pneu['pneus_individual_marcacao'] ?>';
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
            
            <script>
                function refreshMunck(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshMunck') ?>',
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option selected disabled value=''>-- Selecionar --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_tipomunck_id+"'>"+response[i].frota_tipomunck_nome+"</option>";
                            }
                            $('#tipomunck').html(refresh);
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
            
                $('#formMunck').submit(function(e){
                    e.preventDefault();
                    if($('#nome_munck').val() != " " && $('#nome_munck').val() != ""){
                        if($('#ano_munck').val() != ""){
                            if($('#modelo_munck').val() != "" && $('#modelo_munck').val() != " "){
                                dados = new FormData();
                                dados.append('nome', $('#nome_munck').val());
                                dados.append('ano', $('#ano_munck').val());
                                dados.append('modelo', $('#modelo_munck').val());
                                $.ajax({
                                    url: '<?php echo base_url('frota/munckInsert'); ?>',
                                    method: 'post',
                                    data: dados,
                                    processData: false,
                                    contentType: false,
                                    error: function(xhr, status, error) {
                                        alert(status + " " + error + " " + xhr);
                                    },
                                    success: function(data) {
                                        if(data != "null" && data != "" && data != " " && data != null){
                                            refreshMunck();
                                            $('#munckCadastro').modal('hide');
                                        }else{
                                            alert("Erro no banco");
                                        }
                                    },
                                });
                            }else{
                                alert('Por favor digite um modelo válido!');
                            }
                        }else{
                            alert('Por favor informe um ano válido!');
                        }
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                });
            </script>
            
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
            
            <script>
                function refreshSituacao(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshSituacao') ?>',
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option selected disabled value=''>-- Selecionar --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_status_id+"'>"+response[i].frota_status_nome+"</option>";
                            }
                            $('#status').html(refresh);
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
            
                $('#formSituacao').submit(function(e){
                    e.preventDefault();
                    if($('#nome_situacao').val() != "" && $('#nome_situacao').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_situacao').val());
                        $.ajax({
                            url: '<?php echo base_url('frota/situacaoInsert'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert(status + " " + error + " " + xhr);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    refreshSituacao();
                                    $('#situacaoCadastro').modal('hide');
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
            
            <script>
                $(document).on("click", ".browse", function() {
                    var id = this.id;
                    id = id.replaceAll("-search", "");
                    var file = $(this).parents().find("#" + id + "-doc");
                    file.prop("disabled", false);
                    file.trigger("click");
                });
                
                $('input[type="file"]').change(function(e) {
                    var fileID = this.id;
                    fileID = fileID.replaceAll("-doc", "");
                    var fileName = e.target.files[0].name;
                    $("#" + fileID + "-file").val(fileName);
                    
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        if(e.target.result.includes('data:image/')){
                            document.getElementById(fileID + "-preview").src = e.target.result;
                        }else{
                            document.getElementById(fileID + "-preview").src = '<?php echo base_url('resources/imgs/pdf_cover.png') ?>';
                        }
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            </script>
            
            <script>
                jQuery.fn.outerHTML = function() {
                    return (this[0]) ? this[0].outerHTML : '';  
                };
            
                function getValidColumnId(){
                    //VAR
                    var docsDiv = $("#docs-div");
                    var validId = 0;
                
                    for(var k = 0; k < $(docsDiv).children('div').length; k++){
        		        validId++;
        		    }
        		    if(validId == 0)validId++;
        		    return validId;
                }
            		
        		$(".docs-addnew-btn").on('click', function(){
        		    //VAR
        		    var docsControl = $("#docs-control").val().split('|');
        		    var docsDiv = $("#docs-div");
        		    var activeColumn =  $(docsDiv).find(".active-col")[0];
        		    
        		    //CHANGING BUTTON FOR SELECT
        		    var pickTypeHTML = $("#preset-docs-picktype").find('*').html();
        		    activeColumn.innerHTML = pickTypeHTML;
        		    
        		    //FILLING SELECT
        		    var inflatedSelect = $(activeColumn).find('.preset-docs-picktype-select')[0];
        		    $(inflatedSelect).addClass('js-example-basic-multiple');
        		    $(inflatedSelect).removeClass('preset-docs-picktype-select');
        		    $(inflatedSelect).addClass('docs-picktype-select');
        		    
        		    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>];
        		    
        		    var selectHTML = inflatedSelect.innerHTML;
        		    
        		    documentos_tipos[0].forEach(function(currentValue, index){
        		        if(!docsControl.includes(currentValue.documentos_tipos_id)){
        		            selectHTML += "<option value='" + currentValue.documentos_tipos_id + "'>" + currentValue.documentos_tipos_nome.toUpperCase() + "</option>";
        		        }
        		    });
        		    
        		    inflatedSelect.innerHTML = selectHTML;
        		    
        		    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
        		});
            		
        		$(document).on("click", ".browse", function() {
                    var id = this.id;
                    id = id.replaceAll("-search", "");
                    var file = $(this).parents().find("#" + id + "-doc");
                    file.prop("disabled", false);
                    //file.trigger("click");
                });
                    
                function triggerAddNew(){
                    //VAR
        		    var docsControl = $("#docs-control").val().split('|');
        		    var docsDiv = $("#docs-div");
        		    var activeColumn =  $(docsDiv).find(".active-col")[0];
        		    
        		    //CHANGING BUTTON FOR SELECT
        		    var pickTypeHTML = $("#preset-docs-picktype").find('*').html();
        		    activeColumn.innerHTML = pickTypeHTML;
        		    
        		    //FILLING SELECT
        		    var inflatedSelect = $(activeColumn).find('.preset-docs-picktype-select')[0];
        		    $(inflatedSelect).addClass('js-example-basic-multiple');
        		    $(inflatedSelect).removeClass('preset-docs-picktype-select');
        		    $(inflatedSelect).addClass('docs-picktype-select');
        		    
        		    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>];
        		    
        		    var selectHTML = inflatedSelect.innerHTML;
        		    
        		    documentos_tipos[0].forEach(function(currentValue, index){
        		        if(!docsControl.includes(currentValue.documentos_tipos_id)){
        		            selectHTML += "<option value='" + currentValue.documentos_tipos_id + "'>" + currentValue.documentos_tipos_nome.toUpperCase() + "</option>";
        		        }
        		    });
        		    
        		    inflatedSelect.innerHTML = selectHTML;
        		    
        		    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                }
                
                function triggerChange(){
                    var select = $(document).find('.docs-picktype-select')[0];
                    $(select).select2('close');
                    var value = $(select).val();
                    var valueName = value;
                    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>];
                    
                    //VAR
                    var docsDiv = $("#docs-div");
            		var activeColumn =  $(docsDiv).find(".active-col")[0];
            		
            		$(docsDiv).find('.active-doc').removeClass('active-doc');
            		
            		$(activeColumn).addClass('active-doc');
            		
            		documentos_tipos[0].forEach(function(v, i){
            		    if(v.documentos_tipos_id == value){
            		        valueName = v.documentos_tipos_nome;
            		    }
            		});
            		
            		
            		//CHANGING BUTTON FOR SELECT
            		var pickTypeHTML = $("#preset-docs-docs").find('*').html();
            		activeColumn.innerHTML = pickTypeHTML;
            		
            		//GET ITEMS
            		var inflatedPreview = $(activeColumn).find('.preset-docs-docs-doc-preview')[0];
            		var inflatedTitle = $(activeColumn).find('.preset-docs-docs-doc-title')[0];
            		var inflatedDoc = $(activeColumn).find('.preset-docs-docs-doc-doc')[0];
            		var inflatedFile = $(activeColumn).find('.preset-docs-docs-doc-file')[0];
            		var inflatedSearch = $(activeColumn).find('.preset-docs-docs-doc-search')[0];
            		var inflatedLink = $(activeColumn).find('.doc-link')[0];
            		//var inflatedDismiss = $(activeColumn).find('.preset-docs-docs-doc-dismiss')[0];
            		
            		//ADD IDS TO WORK PROPERLY
            		$(inflatedPreview).attr("id", value + '-preview');
            		$(inflatedTitle).attr("id", value + '-title');
            		$(inflatedDoc).attr("id", value + '-doc');
            		$(inflatedDoc).attr("name", value + '-doc');
            		$(inflatedFile).attr("id", value + '-file');
            		$(inflatedSearch).attr("id", value + '-search');
            		$(inflatedLink).attr("id", value + '-link');
            		//$(inflatedDismiss).attr("id", valueName + '-dismiss');
            		
            		//REMOVE PRESET CLASS
            		$(inflatedPreview).removeClass('preset-docs-docs-doc-preview');
            		$(inflatedTitle).removeClass('preset-docs-docs-doc-title');
            		$(inflatedDoc).removeClass('preset-docs-docs-doc-doc').prop('disabled', false);
            		$(inflatedFile).removeClass('preset-docs-docs-doc-file');
            		$(inflatedSearch).removeClass('preset-docs-docs-doc-search');
            		$(inflatedLink).removeClass('doc-link');
            		//$(inflatedDismiss).removeClass('preset-docs-docs-doc-dismiss');
            		
            		//SET VALUES
            		$(inflatedTitle).html(valueName.toUpperCase());
            		/*
            		$(inflatedDismiss).on('click', function(){
            		    dismissDoc(valueName);
            		});
            		*/
            		
            		$("#docs-control").val($("#docs-control").val()  + "|" + value);
            		$("#docs-counter").html(parseInt($("#docs-counter").html())+1);
            		
            		var hasAllDocs = documentos_tipos[0].length == $("#docs-control").val().split('|').length;
            		if(!hasAllDocs){
            		    //INVALIDATING OLDER COL
            		    $(docsDiv).find('.active-col').removeClass('active-col');
            		    
            		    $(docsDiv).append($("#preset-docs-addnew").html());
            		    var newColumn = $(docsDiv).find('.active-col')[0];
            		    
            		    //VALIDATE NEW ACTIVE COLUMN
            		    $(newColumn).addClass('active-col');
            		    
            		    var newButton = $(newColumn).find('.preset-docs-addnew-btn')[0];
            		    $(newButton).addClass('docs-addnew-btn');
            		    $(newButton).removeClass('preset-docs-addnew-btn');
            		    
            		    $(newColumn).attr('id', "docs-column-" + getValidColumnId());
            		    
            		}
                }
                
                function triggerDismiss(){
                    var docsDiv = $("#docs-div");
            		var activeColumn = $(docsDiv).find(".active-col")[0];
            		var activeDoc = $(docsDiv).find(".active-doc")[0];
            		
            		if($(activeDoc).hasClass('fixed-doc'))return;
            		
            		//REMOVE ACTIVE
            		var passedId = $(activeDoc).attr('id');
            		
            		$(activeDoc).remove();
            		
            		//PASS THE ID FROM THE REMOVED DOC TO NEW LAST COLUMN
            		$(activeColumn).attr('id', passedId);
            		
            		//FIND NEW ACTIVE DOC
            		var newActiveDocId = "docs-column-" + (parseInt(passedId.replaceAll("docs-column-",""))-1).toString();
            		$("#" + newActiveDocId).addClass('active-doc');
            		
            		$("#docs-counter").html(parseInt($("#docs-counter").html())-1);
            		$("#docs-control").val($("#docs-control").val().substring(0, $("#docs-control").val().lastIndexOf('|')));
            		
            		//TODO
            		/*
            		*   QUANDO ELE TERMINAR DE ADICIONAR TODOS OS DOCUMENTOS POSSÍVEIS, REMOVER FARÁ COM QUE O BOTÃO "+" NÃO APAREÇA MAIS
            		*   IMPLEMENTAR PARA QUE ELE GERE UM NOVO BOTÃO "+" ASSIM QUE REMOVER O ÚLTIMO
            		*/
                }
                
                /*
                    $('input[type="file"]').on('input',function(e) {
                        var fileID = this.id;
                        fileID = fileID.replaceAll("-doc", "");
                        var fileName = e.target.files[0].name;
                        $("#" + fileID + "-file").val(fileName);
                        
                        var reader = new FileReader();
                        reader.onload = function(e) {
                             document.getElementById(fileID + "-preview").src = e.target.result;
                        };
                        reader.readAsDataURL(this.files[0]);
                    });
                */
                
                function triggerInputFile(id, e){
                    var fileID = id;
                    fileID = fileID.replaceAll("-doc", "");
                    var fileName = e.target.files[0].name;
                    $("#" + fileID + "-file").val(fileName);
                        
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(fileID + "-preview").src = e.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            </script>
            
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
            
            <script>
            var global_tipopneu_id = 0;
            var global_qtd_pneus = 0;
            var global_options = "";
            var global_data = "";
            
                function changePneu(val){
                    //$('#qtd_div').css('display', 'block');
                    global_tipopneu_id = val;
                    dados = new FormData();
                    dados.append('id', global_tipopneu_id);
                    $.ajax({
                        url: '<?php echo base_url('frota/getArrayPneus'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('qtd_p.keyup(): '+xhr.responseText);
                        },
                        success: function(data) {
                            console.log(data);
                            fillOpt(data);
                        },
                    });
                }
                
                $('#qtd_p').keyup(function(){
                    global_qtd_pneus = $('#qtd_p').val();
                    $('#anchor_qtd').val(global_qtd_pneus);
                    //$('#li_pneu').css('display', 'block');
                    populaPneus();
                });
                
                function fillOpt(data){
                    var fim = data.length - 2;
                    data = data.substr(1, fim);
                    global_data = data;
                    
                    global_options = "";
                    
                    var explode = data.split('++');
                    
                    for(var k = 0; k < explode.length; k++){
                        var inner_ex = explode[k].split('**');
                        inner_ex[1] = inner_ex[1].replace('\/', '/');
                        global_options += "<option value='"+inner_ex[0]+"'>"+inner_ex[1]+"</option>";
                    }
                    
                    if(global_qtd_pneus != 0){
                        for(var i = 0; i < global_qtd_pneus; i++){
                            $('#pneu_'+i).html("<option disabled selected>-- Selecione um Pneu --</option>"+global_options);
                        }
                    }
                }
                
                function populaPneus(){
                    var str = "<div class='row'>";
                    var array = <?php echo json_encode($posicao) ?>;
                    var options2 = "";

                    for(var i = 0; i < array.length; i++){
                        options2 += "<option value='"+array[i].posicao_id+"'>"+array[i].posicao_nome+"</option>";
                    }
                    
                    for(var i = 0; i < global_qtd_pneus; i++){
                        if(i != 0 && i%2 == 0){ str += "</div><div class='row'>"; }
                        
                        str += 
                        '<div class="col-md-4 form-group">'+
                            '<label>Pneu '+i+':</label>'+
                            '<select class="js-example-basic-multiple select-pneu" onchange="selectPneuChange(\'pneu_'+i+'\')" style="width: 100%" name="pneu_'+i+'" id="pneu_'+i+'" required>'+
                                '<option disabled selected>-- Selecione um Pneu --</option>'+
                                global_options+
                            '</select>'+
                        '</div>'+
                        '<div class="col-md-2 form-group">'+
                            '<label>Posição '+i+':</label>'+
                            '<select class="js-example-basic-multiple" style="width: 100%" name="posi_'+i+'" id="posi_'+i+'" required>'+
                                '<option disabled selected>Posição</option>'+
                                options2+
                            '</select>'+
                        '</div>';
                    }
                    str += '</div>';
                    $('#mainPneus').html(str);
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                }
                
                function selectPneuChange(id){
                    console.log(id);
                }
            </script>
            