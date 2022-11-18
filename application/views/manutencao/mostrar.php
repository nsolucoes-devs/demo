
        
            <style>
                .tableFixHead2          { overflow-y: auto; height: 600px; padding-left: 15px; }
                .tableFixHead2 thead th { position: sticky; top: 0; }

                /* Just common table stuff. Really. */
                table  { border-collapse: collapse; width: 100%; }
                th, td { padding: 8px 16px; }
                th     { background:#eee; }
            
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    border-radius: 5px;
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
                    color: #033557;
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
                .pagination>.active>a{
                    background-color: #033557;
                }
                .pagination>.active>a:hover{
                    background-color: #033557;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
                    background: white;
                    border-color: white;
                }
                .dataTables_wrapper .row{
                    width: 101%;
                    margin-bottom: 15px;
                }
                .pagination{
                    margin-top: 0px;
                }
                .dataTables_length label select{
                    margin-left: 10px;
                    margin-right: 10px;
                }
                #myTableAnd .trigger_hidden:hover{
                    background-color: #F2F2F2;
                }
                #myTableAnd .hidden_row { 
                    display: none;
                    background-color: #eee; 
                }
                .outside-btn{
                    width: 21px;
                    height: 21px;
                    border-radius: 50%;
                    text-align: center;
                    border: 1px solid black;
                    position: relative;
                    margin: auto;
                }
                .btn-expand{
                    width: 19px;
                    height: 19px;
                    border-radius: 50%;
                    text-align: center;
                    border: 2px solid white;
                    background-color: #00bd1f;
                    padding: 0px;
                    position: absolute;
                    top: 0;
                    left: 0;
                }
                .btn-expand em{
                    color: white;
                    font-size: 12px;
                    position: absolute;
                    top: 2px;
                    left: 2px;
                    text-shadow: 1px 0 0 grey, -1px 0 0 grey, 0 1px 0 grey, 0 -1px 0 grey, 1px 1px grey, -1px -1px 0 grey, 1px -1px 0 grey, -1px 1px 0 grey;
                }
                .btn-expand:focus{
                    outline: none;
                }
                .inside-table tr{
                    font-size: 11px;
                }
                .inside-table tr:hover{
                    background-color: #eee!important;
                }
                .inside-table td{
                    border: 0;
                }
                .inside-table th{
                    border: 0;
                    border-bottom: 0px!important;
                }
                .sep-tr{
                    border-top: 2px solid lightgrey;
                }
                .title-inside{
                    font-weight: bold;
                }
                .nav-tabs {
                    border-bottom: 0;
                }
                .see-pass{
                    width: 10%;
                    margin-left: -4px;
                    margin-top: -2px;
                    border-top-left-radius: 0;
                    border-bottom-left-radius: 0;
                }
                .passwd{
                    width: 50%;
                    display: inline;
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0;
                }
                .swal2-title{
                    font-size: 25px;
                }
                .swal2-content{
                    font-size: 20px;
                }
                .swal2-styled.swal2-confirm{
                    font-size: 15px;
                }
                @media (min-width: 500px){
                    .swal2-popup.swal2-modal.swal2-show{
                        width: 40%;
                    }
                }
                .p_val{
                    font-size: 20px;
                }
                .p_val_num{
                    font-size: 20px;
                    font-weight: bold;
                }
                .edit-garantia{
                    color: darkblue;
                    cursor: pointer;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9">
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px" onclick="change(1)"><b>DADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;" onclick="change(2)"><b>PEÇAS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;" onclick="change(3)"><b>SERVIÇOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;" onclick="change(4)"><b>GARANTIA</b></a>
                            </li>
                        </ul>
                        
                        <div class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                        
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <h2>Ordem de Serviço N° <?php echo sprintf("%'03d", $os['os_id']); ?></h2>
                                    </div>
                                    <div class="col-md-3 form-group text-right">
                                        <a class="btn btn-primary" href="<?php echo base_url('ordemdeservicos') ?>"><em class="fa fa-angle-left"></em>&nbsp;Voltar</a>
                                        &nbsp;&nbsp;
                                        <a class="btn btn-primary" href="<?php echo base_url('relatorioos/').$os['os_id'] ?>" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Título da Ordem de Serviço:</label><br>
                                        <textarea class="form-control" rows="2" readonly><?php echo $os['os_titulo'] ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Tipo da Manutenção:</label><br>
                                        <input type="text" class="form-control" value="<?php echo $os['os_tipo'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Local da Manutenção:</label><br>
                                        <input type="text" class="form-control" value="<?php echo $os['os_local'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Status da Manutenção:</label><br>
                                        <input type="text" class="form-control" value="<?php echo $os['os_situacao'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Data de Abertura:</label><br>
                                        <input type="date" class="form-control" value="<?php echo $os['os_data_abertura'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Hora de Abertura:</label><br>
                                        <input type="time" class="form-control" value="<?php echo $os['os_hora_abertura'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Subtotal:</label><br>
                                        <input type="text" class="form-control" value="R$ <?php echo $os['total'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label>Frota:</label><br>
                                        <input type="text" class="form-control" value="<?php echo $os['os_frota'] ?>" readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Km / Hr Atual:</label><br>
                                        <input type="number" class="form-control" value="<?php echo $os['os_km_atual'] ?>" readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Km / Hr Anterior:</label><br>
                                        <input type="number" class="form-control" value="<?php echo $os['os_km_anterior'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Prestador do Serviço:</label><br>
                                        <input type="text" class="form-control" value="<?php echo $os['os_prestador'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Detalhes:</label><br>
                                        <textarea class="form-control" rows="3" readonly><?php echo $os['os_detalhe'] ?></textarea>
                                    </div>
                                </div>
                                
                                <hr>
        
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Lista de Andamentos:</label><br>
                                        <div class="tableFixHead">
                                            <table id="myTableAnd" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10%"></th>
                                                        <th style="width: 9%">Data</th>
                                                        <th style="width: 7%">Hora</th>
                                                        <th style="width: 74%">Título</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i = 0; foreach($andamentos as $and){ ?>
                                                    <tr class="trigger_hidden">
                                                        <td class="text-center">
                                                            
                                                            <div class="row">
                                                                <div <?php if($os['os_situacao_id'] != 4){echo 'class="col-md-4" style="padding-right: 0px"';}else{echo 'class="col-md-12"';} ?>>
                                                                    <div class="outside-btn">
                                                                        <button id="btn<?php echo $i; ?>" type="button" class="btn-expand" onclick="showHideRow('hidden_row<?php echo $i; ?>');"><em class="fa fa-plus"></em></button>
                                                                    </div>
                                                                </div>
                                                                <?php if($os['os_situacao_id'] != 4){ ?>
                                                                <div class="col-md-4" style="padding-left: 0px; padding-right: 0px">
                                                                    <div class="outside-btn">
                                                                        <a class="btn-expand" style="background-color: blue" href="<?php echo base_url('manutencao/editarAndamento/').$and['id'] ?>"><em style="left: 3px; top: 3px; font-size: 9px" class="fa fa-pen"></em></a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" style="padding-left: 0px;">
                                                                    <div class="outside-btn">
                                                                        <button type="button" class="btn-expand" style="background-color: red" data-toggle="modal" data-target="#excAnd" onclick="setaExc(<?php echo $and['id'] ?>)"><em style="left: 3px" class="fa fa-times"></em></button>
                                                                    </div>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                            
                                                        </td>
                                                        <td><?php echo $and['data'] ?></td>
                                                        <td><?php echo $and['hora'] ?></td>
                                                        <td><?php echo $and['titulo'] ?></td>
                                                    </tr>
                                                    <tr id="hidden_row<?php echo $i; ?>" class="hidden_row">
                                                        <td colspan=4> 
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p class="title-inside">Detalhes do Andamento:</p>
                                                                    <p class="detalhes"><?php echo $and['detalhes'] ?></p>
                                                                    <br>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    
                                                                    <p class="title-inside">Peças:</p>
                                                                    <table class="inside-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nome</th>
                                                                                <th>Qtd</th>
                                                                                <th>Unitário</th>
                                                                                <th>Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($and['pecas'] as $pc){ ?>
                                                                            <tr class="sep-tr">
                                                                                <td style="width: 50%"><?php echo $pc['nome'] ?></td>
                                                                                <td style="width: 10%"><?php echo $pc['qtd'] ?></td>
                                                                                <td style="width: 20%">R$ <?php echo $pc['valor_un'] ?></td>
                                                                                <td style="width: 20%">R$ <?php echo $pc['total'] ?></td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                </div>
                                                                <div class="col-md-6">
                                                                    
                                                                    <p class="title-inside">Serviços:</p>
                                                                    <table class="inside-table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Nome</th>
                                                                                <th>Qtd</th>
                                                                                <th>Unitário</th>
                                                                                <th>Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php foreach($and['servs'] as $sv){ ?>
                                                                            <tr class="sep-tr">
                                                                                <td style="width: 50%"><?php echo $sv['nome'] ?></td>
                                                                                <td style="width: 10%"><?php echo $sv['qtd'] ?></td>
                                                                                <td style="width: 20%">R$ <?php echo $sv['valor_un'] ?></td>
                                                                                <td style="width: 20%">R$ <?php echo $sv['total'] ?></td>
                                                                            </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <h4>Subtotal: R$ <?php echo $and['total_pc'] ?></h4>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <h4>Subtotal: R$ <?php echo $and['total_sv'] ?></h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $i++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <?php if($os['os_situacao_id'] == 4){ ?>
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-7 form-group">
                                        <h3>Informações de Encerramento</h3>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12 form-group">
                                                <label>Responsável pelo Fechamento</label><br>
                                                <input type="text" class="form-control" value="<?php echo $user_f ?>" readonly>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Data de Fechamento:</label><br>
                                                <input type="date" class="form-control" value="<?php echo $os['os_data_fechamento'] ?>" readonly>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Hora de Fechamento:</label><br>
                                                <input type="text" class="form-control" value="<?php echo $os['os_hora_fechamento'] ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 form-group" style="border-left: 1px solid lightgrey">
                                        <h3>Valores da Ordem de Serviço</h3>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-5 form-group" style="padding-right: 0px">
                                                <p class="p_val">Peças: </p>
                                                <p class="p_val">Serviços: </p>
                                                <hr>
                                                <p class="p_val">Valor da O.S: </p>
                                            </div>
                                            <div class="col-md-7 form-group" style="padding-left: 0px">
                                                <p class="p_val_num">R$ <?php echo $total_p ?></p>
                                                <p class="p_val_num">R$ <?php echo $total_s ?></p>
                                                <hr>
                                                <p class="p_val_num">R$ <?php echo $os['total'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <a data-toggle="modal" data-target="#confirmaEncerrar" class="btn btn-primary">Encerrar O.S</a>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <br><br>
                            </div>
                        </div>
                        
                        <div style="display:none;" class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <h3>Lista de Peças</h3>
                                    </div>
                                </div>
                                
                                <div class="tableFixHead2">
                                    <table id="lista-table1" class="lista-table table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Qtd</th>
                                                <th>Valor Unitário</th>
                                                <th>Valor Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($pecas as $pc){ ?>
                                            <tr>
                                                <td><?php echo $pc['nome'] ?></td>
                                                <td><?php echo $pc['qtd'] ?></td>
                                                <td><?php echo number_format($pc['valor_un'], 4, ',', '.') ?></td>
                                                <td>
                                                    <?php 
                                                    $total = (float) $pc['valor_un'] * (int) $pc['qtd'];
                                                    echo number_format($total, 4, ',', '.') ;
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                        
                        <div style="display:none;" class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <h3>Lista de Serviços</h3>
                                    </div>
                                </div>
                                
                                <div class="tableFixHead2">
                                    <table id="lista-table2" class="lista-table table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Qtd</th>
                                                <th>Valor Unitário</th>
                                                <th>Valor Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($servs as $sv){ ?>
                                            <tr>
                                                <td><?php echo $sv['nome'] ?></td>
                                                <td><?php echo $sv['qtd'] ?></td>
                                                <td><?php echo number_format($sv['valor_un'], 4, ',', '.') ?></td>
                                                <td>
                                                    <?php 
                                                    $total = (float) $sv['valor_un'] * (int) $sv['qtd'];
                                                    echo number_format($total, 4, ',', '.') ;
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                        
                        <div style="display:none;" class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br>
                                <div class="tableFixHead2">
                                    <table id="lista_garantia" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th style="width: 10%">Tipo</th>
                                                <th style="width: 7%">Qtd</th>
                                                <th>Garantia</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($pecas as $pc){ ?>
                                            <tr id="p_<?php echo $pc['id'] ?>">
                                                <td><?php echo $pc['nome'] ?></td>
                                                <td>PEÇA</td>
                                                <td><?php echo $pc['qtd'] ?></td>
                                                
                                                <?php
                                                    $aux = 0;
                                                    $gar = "";
                                                    foreach($garantias_pecas as $gp){
                                                        if($gp['garantia_item_id'] == $pc['id']){
                                                            $aux++;
                                                            if($gp['garantia_km'] != null && $gp['garantia_data'] != null){
                                                                $gar = "Até ".$gp['garantia_km']." km e/ou até ".date('d/m/Y', strtotime($gp['garantia_data']));
                                                            }else if($gp['garantia_km'] == null && $gp['garantia_data'] != null){
                                                                $gar = "Até ".date('d/m/Y', strtotime($gp['garantia_data']));
                                                            }else if($gp['garantia_km'] != null && $gp['garantia_data'] == null){
                                                                $gar = "Até ".$gp['garantia_km']." km";
                                                            }
                                                        }
                                                    }
                                                    if($aux != 0){
                                                        echo '<td>';
                                                        echo '<em class="fa fa-pen edit-garantia"></em>&nbsp;&nbsp;';
                                                        echo $gar;
                                                        echo '</td>';
                                                    }else{
                                                        if($os['os_situacao_id'] != 4){
                                                ?>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary" onclick="setaGarantia('PEÇA', '<?php echo $pc['id'] ?>')" data-toggle="modal" data-target="#garantia"><em class="fa fa-plus"></em></button>
                                                </td>
                                                <?php }else{echo "<td></td>";} } ?>
                                                    
                                            </tr>
                                            <?php } ?>
                                            <?php foreach($servs as $sv){ ?>
                                            <tr id="s_<?php echo $sv['id'] ?>">
                                                <td><?php echo $sv['nome'] ?></td>
                                                <td>SERVIÇO</td>
                                                <td><?php echo $sv['qtd'] ?></td>
                                                
                                                <?php
                                                    $aux = 0;
                                                    $gar = "";
                                                    foreach($garantias_servs as $gs){
                                                        if($gs['garantia_item_id'] == $sv['id']){
                                                            $aux++;
                                                            if($gs['garantia_km'] != null && $gs['garantia_data'] != null){
                                                                $gar = "Até ".$gs['garantia_km']." km e/ou até ".date('d/m/Y', strtotime($gs['garantia_data']));
                                                            }else if($gs['garantia_km'] == null && $gs['garantia_data'] != null){
                                                                $gar = "Até ".date('d/m/Y', strtotime($gs['garantia_data']));
                                                            }else if($gs['garantia_km'] != null && $gs['garantia_data'] == null){
                                                                $gar = "Até ".$gs['garantia_km']." km";
                                                            }
                                                        }
                                                    }
                                                    if($aux != 0){
                                                        echo '<td>';
                                                        echo '<em class="fa fa-pen edit-garantia"></em>&nbsp;&nbsp;';
                                                        echo $gar;
                                                        echo '</td>';
                                                    }else{
                                                        if($os['os_situacao_id'] != 4){
                                                ?>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary" onclick="setaGarantia('SERVIÇO', '<?php echo $sv['id'] ?>')" data-toggle="modal" data-target="#garantia"><em class="fa fa-plus"></em></button>
                                                </td>
                                                <?php }else{echo "<td></td>";} } ?>
                                                
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <div class="modal fade" id="excAnd" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Excluir Andamento</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o andamento?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('manutencao/excluirAndamento') ?>" method="post">
                                        <input type="hidden" name="id_excluir" id="id_excluir">
                                        <input type="hidden" name="anchor_id" id="anchor_id" value="<?php echo $os['os_id'] ?>">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="confirmaEncerrar" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Encerrar Ordem de Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente encerrar a ordem de serviço?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha2()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha2()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha2" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('manutencao/encerrarOS') ?>" method="post">
                                        <input type="hidden" name="encerrar_id" id="encerrar_id" value="<?php echo $os['os_id'] ?>">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="encerrar_senha" id="encerrar_senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn2"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="garantia" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Atribuir Garantia</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <input type="hidden" id="hidden_id">
                            <input type="hidden" id="hidden_tipo">
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Selecione o tipo de garantia:</label><br>
                                    <select  style="width: 100%!important" class="select2-search" id="tipo_garantia" onchange="trocaTipo($(this).val())">
                                        <option value="" selected disabled id="default">-- Selecione um tipo --</option>
                                        <option value="1">Garantia por Km/Hr</option>
                                        <option value="2">Garantia por Data</option>
                                        <option value="3">Garantia por Km/Hr e Data</option>
                                    </select>
                                </div>
                                
                                <div id="row_km" style="display: none" class="col-md-6 form-group">
                                    <label>Informe o Km/Hr (Números):</label><br>
                                    <input type="text" class="form-control" id="km_garantia" placeholder="0">
                                </div>

                                <div id="row_data" style="display: none" class="col-md-6 form-group">
                                    <label>Informe a Data:</label><br>
                                    <input type="date" class="form-control" id="data_garantia">
                                </div>
                            </div>

                        </div>
                        
                        <div class="modal-footer" style="position: relative">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendGarantia()">Atribuir</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="edit_garantia" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Editar Garantia</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <input type="hidden" id="edit_hidden_id">
                            <input type="hidden" id="edit_hidden_tipo">
                            <input type="hidden" id="edit_hidden_item">
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Selecione o tipo de garantia:</label><br>
                                    <select  style="width: 100%!important" class="select2-search" id="edit_tipo_garantia" onchange="trocaTipo2($(this).val())">
                                        <option value="1">Garantia por Km</option>
                                        <option value="2">Garantia por Data</option>
                                        <option value="3">Garantia por Km e Data</option>
                                    </select>
                                </div>
                                
                                <div id="edit_row_km" style="display: none" class="col-md-6 form-group">
                                    <label>Informe o Km (Números):</label><br>
                                    <input type="text" class="form-control" id="edit_km_garantia" placeholder="0">
                                </div>

                                <div id="edit_row_data" style="display: none" class="col-md-6 form-group">
                                    <label>Informe a Data:</label><br>
                                    <input type="date" class="form-control" id="edit_data_garantia">
                                </div>
                            </div>

                        </div>
                        
                        <div class="modal-footer" style="position: relative">
                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendGarantia2()">Editar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.lista-table').DataTable( {
                        "order": [[ 0, "asc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ registros por página",
                            "zeroRecords": "Nenhum registro encontrado",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"Nome": "first", "orderable": true},
                            {"Qtd": "second", "orderable": true},
                            {"Valor Unitário": "third", "orderable": true},
                            {"Valor Total": "fourth", "orderable": true},
                        ],
                    });
                    $('select[name ="lista-table1_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('select[name ="lista-table2_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('.lista-table_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    
                    $('#lista_garantia').DataTable( {
                        "order": [[ 0, "asc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ registros por página",
                            "zeroRecords": "Nenhum registro encontrado",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"Nome": "first", "orderable": true},
                            {"Tipo": "second", "orderable": true},
                            {"Qtd": "third", "orderable": true},
                            {"Garantia": "fourth", "orderable": true},
                        ],
                    });
                    $('select[name ="lista_garantia_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#lista_garantia_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    
                    <?php if($err == 1){ ?>
                    Swal.fire(
                        '',
                        'Andamento excluido com sucesso!',
                        'success'
                    )
                    <?php }else if($err == 2){ ?>
                    Swal.fire(
                        'Erro',
                        'Não foi possivel excluir o andamento pois a senha inserida estava incorreta!',
                        'error'
                    )
                    <?php }else if($err == 3){ ?>
                    Swal.fire(
                        '',
                        'Ordem de Serviço encerrada com sucesso!',
                        'success'
                    )
                    <?php }else if($err == 4){ ?>
                    Swal.fire(
                        'Erro',
                        'Não foi possivel encerrar a O.S. pois a senha inserida estava incorreta!',
                        'error'
                    )
                    <?php } ?>
                });
            </script>
            
            <script>
                function showHideRow(row) { 
                    $("#" + row).toggle();
                    var id = row.substr(10);
                    if($("#"+row).css('display') == 'none'){
                        $('#btn'+id).css('background-color', '#00bd1f');
                        $('#btn'+id).find('em').last().removeClass('fa-minus').addClass('fa-plus');
                    }else{
                        $('#btn'+id).css('background-color', 'red');
                        $('#btn'+id).find('em').last().removeClass('fa-plus').addClass('fa-minus');
                    }
                } 
            </script>
            
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
            
            <script>
                function setaExc(id){
                    $('#id_excluir').val(id);
                }
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                function e_senha(){
                    $('#formsenha').css('display', 'none');
                    $('#senha').val("");
                }
                $('#senha_btn').on('click', function(){
                    const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            
            <script>
                function senha2(){
                    $('#formsenha2').css('display', 'block');
                }
                function e_senha2(){
                    $('#formsenha2').css('display', 'none');
                    $('#encerrar_senha').val("");
                }
                $('#senha_btn2').on('click', function(){
                    const type = $('#encerrar_senha').prop('type') === 'password' ? 'text' : 'password';
                    $('#encerrar_senha').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn2').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn2').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            
            <script>
                function setaGarantia(tipo, id){
                    $('#hidden_id').val(id);
                    $('#hidden_tipo').val(tipo);
                }
                
                function trocaTipo(val){
                    if(val == 1){
                        $('#row_data').css('display', 'none');
                        $('#row_km').css('display', 'block');
                    }else if(val == 2){
                        $('#row_km').css('display', 'none');
                        $('#row_data').css('display', 'block');
                    }else if(val == 3){
                        $('#row_km').css('display', 'block');
                        $('#row_data').css('display', 'block');
                    }
                }
                
                function sendGarantia(){
                    var tipo = "";
                    var garantia = "";
                    
                    if($('#tipo_garantia').val() != ""){
                        if($('#tipo_garantia').val() == 1){
                            if($('#km_garantia').val() != ""){
                                tipo = $('#tipo_garantia').val();
                                garantia = $('#km_garantia').val();
                            }else{
                                alert('Por favor insira um Km válido!');
                            }
                        }else if($('#tipo_garantia').val() == 2){
                            if($('#data_garantia').val() != ""){
                                tipo = $('#tipo_garantia').val();
                                garantia = $('#data_garantia').val();
                            }else{
                                alert('Por favor informe uma data válida!');
                            }
                        }else if($('#tipo_garantia').val() == 3){
                            if($('#data_garantia').val() != ""){
                                if($('#km_garantia').val() != ""){
                                    tipo = $('#tipo_garantia').val();
                                    garantia = $('#km_garantia').val() + "|" + $('#data_garantia').val();
                                }else{
                                    alert('Por favor insira um Km válido!');
                                }
                            }else{
                                alert('Por favor informe uma data válida!');
                            }
                        }
                    }else{
                        alert('Por favor selecione um tipo de garantia!');
                    }
                    
                    if(tipo != "" && garantia != ""){
                        dados = new FormData();
                        dados.append('os_id', '<?php echo $os['os_id'] ?>');
                        dados.append('item_id', $('#hidden_id').val());
                        dados.append('item_tipo', $('#hidden_tipo').val());
                        dados.append('garantia_tipo', tipo);
                        dados.append('garantia_val', garantia);
                        console.log(garantia);
                        $.ajax({
                            url: '<?php echo base_url('manutencao/insertGarantia'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert('sendGarantia(): '+xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    var tip = "";
                                    var id = $('#hidden_id').val();
                                    if($('#hidden_tipo').val() == "PEÇA"){tip = "p_";}else{tip = "s_";}
                                    $('#'+tip+id).find("td").last().html('<em class="fa fa-pen edit-garantia"></em>&nbsp;&nbsp;'+data);
                                    
                                    $('#km_garantia').val("");
                                    $('#data_garantia').val("");
                                    
                                    $('#default').prop('disabled', false);
                                    $('#tipo_garantia').get(0).selectedIndex = 0;
                                    $('#tipo_garantia').change();
                                    $('#default').prop('disabled', true);
                                    
                                    $('#row_data').css('display', 'none');
                                    $('#row_km').css('display', 'none');
                                    $('#garantia').modal('hide');
                                    
                                    location.reload();
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }
                    
                }
            </script>
            
            <script>
                $('.edit-garantia').on('click', function(){
                    var id = $(this).parent().parent().prop('id').substr(2);
                    var tipo = $(this).parent().parent().prop('id').substr(0, 1);
                    
                    dados = new FormData();
                    dados.append('id', id);
                    dados.append('tipo', tipo);
                    dados.append('os', <?php echo $os['os_id'] ?>);
                    $.ajax({
                        url: '<?php echo base_url('manutencao/pegaGarantia'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('.edit-garantia.click(): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data != "null" && data != "" && data != " " && data != null){
                                arr = jQuery.parseJSON(data);
                                
                                $('#edit_hidden_id').val(arr.garantia_id);
                                $('#edit_hidden_tipo').val(arr.garantia_item_tipo);
                                $('#edit_hidden_item').val(arr.garantia_item_id);
                                
                                if(arr.garantia_km != null && arr.garantia_data != null){
                                    $('#edit_tipo_garantia').get(0).selectedIndex = 2;
                                    $('#edit_tipo_garantia').change();
                                    
                                    $('#edit_row_km').css('display', 'block');
                                    $('#edit_row_data').css('display', 'block');
                                    
                                    $('#edit_km_garantia').val(arr.garantia_km);
                                    $('#edit_data_garantia').val(arr.garantia_data);
                                    
                                }else if(arr.garantia_km != null && arr.garantia_data == null){
                                    $('#edit_tipo_garantia').get(0).selectedIndex = 0;
                                    $('#edit_tipo_garantia').change();
                                    
                                    $('#edit_row_km').css('display', 'block');
                                    $('#edit_row_data').css('display', 'none');
                                    
                                    $('#edit_km_garantia').val(arr.garantia_km);
                                    $('#edit_data_garantia').val('');
                                    
                                }else if(arr.garantia_km == null && arr.garantia_data != null){
                                    $('#edit_tipo_garantia').get(0).selectedIndex = 1;
                                    $('#edit_tipo_garantia').change();
                                    
                                    $('#edit_row_km').css('display', 'none');
                                    $('#edit_row_data').css('display', 'block');
                                    
                                    $('#edit_km_garantia').val('');
                                    $('#edit_data_garantia').val(arr.garantia_data);
                                }
                                
                                $('#edit_garantia').modal('show');
                            }else{
                                alert("Erro no banco");
                            }
                        },
                    });
                });
                
                function trocaTipo2(val){
                    if(val == 1){
                        $('#edit_row_km').css('display', 'block');
                        $('#edit_row_data').css('display', 'none');
                    }else if(val == 2){
                        $('#edit_row_km').css('display', 'none');
                        $('#edit_row_data').css('display', 'block');
                    }else if(val == 3){
                        $('#edit_row_km').css('display', 'block');
                        $('#edit_row_data').css('display', 'block');
                    }
                }
                
                function sendGarantia2(){
                    dados = new FormData();
                    dados.append('id', $('#edit_hidden_id').val());
                    dados.append('tipo', $('#edit_hidden_tipo').val());
                    dados.append('os', <?php echo $os['os_id'] ?>);
                    dados.append('tipo_garantia', $('#edit_tipo_garantia').val());
                    dados.append('item', $('#edit_hidden_item').val());
                    
                    if($('#edit_tipo_garantia').val() == 1){
                        dados.append('val', $('#edit_km_garantia').val());
                    }else if($('#edit_tipo_garantia').val() == 2){
                        dados.append('val', $('#edit_data_garantia').val());
                    }else if($('#edit_tipo_garantia').val() == 3){
                        var garantia = $('#edit_km_garantia').val() + "|" + $('#edit_data_garantia').val();
                        dados.append('val', garantia);
                    }
                    
                    $.ajax({
                        url: '<?php echo base_url('manutencao/editaGarantia'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('sendGarantia2(): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data != "null" && data != "" && data != " " && data != null){
                                
                                var tip = "";
                                var id = $('#edit_hidden_item').val();
                                if($('#edit_hidden_tipo').val() == "PEÇA"){tip = "p_";}else{tip = "s_";}
                                $('#'+tip+id).find("td").last().html('<em class="fa fa-pen edit-garantia"></em>&nbsp;&nbsp;'+data);
                                
                                $('#edit_km_garantia').val("");
                                $('#edit_data_garantia').val("");
                                
                                $('#edit_row_data').css('display', 'none');
                                $('#edit_row_km').css('display', 'none');
                                $('#edit_garantia').modal('hide');
                                
                            }else{
                                alert("Erro no banco");
                            }
                        },
                    });
                }
            </script>
            
            <script>
                function setaEdit(id){
                    $('#edit_and_id').val(id);
                }
                
                function sendEditAnd(){
                    
                }
            </script>
                