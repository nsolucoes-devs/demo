        
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
            color: #033557;
        }
        .nav-tabs {
            border-bottom: 0;
        }

        /* Just common table stuff. Really. */
        table  { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 16px; }
        th     { background:#eee; }
        
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
        #manuTable tbody tr td{
            font-size: 12px;
        }
        #titleTable tbody tr td{
            font-size: 12px;
        }
        .row-c{
            width: 110%;
            margin-bottom: 15px;
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
        .modal-filter{
            max-width: 50%;
            width: 50%;
            margin 0 25% 0 25%;
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
                                <a class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)"><b>DADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDocs" onclick="change(2)"><b>DOCUMENTOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aCusto" onclick="change(3)"><b>CUSTO FROTA</b></a>
                            </li>
                        </ul>
                        
                        <div id="divDados" class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <h2><?php echo $frota['frota_placa']." - ".$frota['frota_codigo'] ?></h2>
                                    </div>
                                    <div class="col-md-3 form-group text-right">
                                        <a style="color: white" class="btn btn-primary" href="<?php echo base_url('veiculos') ?>"><i class="fas fa-chevron-left"></i>&nbsp; Voltar</a>
                                    </div>
                                </div>
                                
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Renavam</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_renavam'] ?>" readonly>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label>Chassi</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_chassi'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>N° do Motor</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_motor'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Modelo</label><br>
                                        <input type="text" class="form-control" value="<?php echo $modelo['frota_modelo_nome']." - ".$marca['frota_marca_nome'] ?>" readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Qtd Eixos</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_eixo'] ?>" readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Ano/Modelo</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_ano'] ?>" readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Cor</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_cor'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Câmbio</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_cambio'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Linha</label><br>
                                        <input type="text" class="form-control" value="<?php echo $linha['frota_linha_nome'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Status/Situação</label><br>
                                        <input type="text" class="form-control" value="<?php echo $status['frota_status_nome'] ?>" readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Km / Hr</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_km'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Preço de Compra</label><br>
                                        <input type="text" class="form-control" value="<?php echo "R$ ".number_format($frota['frota_preco_compra'], 4, ',', '.') ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Peso de Tara</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_tara'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Peso Lotação</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_lotacao'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Peso Bruto Total (PBT)</label><br>
                                        <input type="text" class="form-control" value="<?php echo $frota['frota_pbt'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Cabine</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cabine['frota_tipogabine_nome'] ?>" readonly>
                                    </div>
                                    <?php if($frota['frota_tipomunck_id'] != null){ ?>
                                    <div class="col-md-6 form-group">
                                        <label>Munck</label><br>
                                        <input type="text" class="form-control" value="<?php echo $munck ?>" readonly>
                                    </div>
                                    <?php } ?>
                                </div>
                            
                                <br>
                            </div>
                        </div>
                        
                        <div id="divDocs" style="display:none;" class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br>
                                
                                <style>
                                    .doc-col{
                                        padding: 0px 5% 0px 5%;
                                        margin-bottom: 15px;
                                    }
                                    .doc-img{
                                        width: 100%;
                                        height: auto;
                                    }
                                    .doc-col h3{
                                        font-weight: bold;
                                        text-align: center;
                                    }
                                </style>
                                
                                <div class="row">
                                    
                                    <?php foreach($docs as $doc){ ?>
                                    
                                    <div class="col-md-4 doc-col">
                                        <?php foreach($docs_tipos as $td){
                                            if($td['documentos_tipos_id'] == $doc['documento_tipo_id']){
                                                echo "<h3>".mb_strtoupper($td['documentos_tipos_nome'])."</h3><br>";
                                            }
                                        } ?>
                                        <?php if($doc['documento_isimagem'] == 1){ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/').$frota['frota_placa']."_".$doc['documento_tipo_id'].".png" ?>">
                                            <img class="doc-img" src="<?php echo base_url('uploads/').$frota['frota_placa']."_".$doc['documento_tipo_id'].".png" ?>">
                                        </a>
                                        <?php }else{ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/').$frota['frota_placa']."_".$doc['documento_tipo_id'].".pdf" ?>">
                                            <img class="doc-img" src="<?php echo base_url('resources/imgs/pdf_cover.png') ?>">
                                        </a>
                                        <?php } ?>
                                    </div>
                                    
                                    <?php } ?>
                                    
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                        
                        <div id="divCusto" style="display:none;" class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <style>
                                    .border-c{
                                        border-radius: 4px;
                                        background-color: #033557;
                                        padding: 7px 15px;
                                        margin-top: 3px;
                                        display: inline;
                                        color: white;
                                    }
                                </style>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <h4 style="font-weight: bold">&nbsp;&nbsp;Manutenções | <?php echo $frota['frota_placa']." - ".$frota['frota_codigo'] ?></h4>
                                    </div>
                                    <div class="col-md-6 form-group text-right">
                                        <h4 class="border-c text-center"><b>Custo Total: R$ <?php echo $totalGeral ?>&nbsp;&nbsp;</b></h4>
                                        <!--&nbsp;&nbsp;<a style="margin-top: -2px" class="btn btn-primary" href="<?php echo base_url('relatorioveiculo/').$frota['frota_id'] ?>" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>-->
                                        &nbsp;&nbsp;<a style="margin-top: -2px" class="btn btn-primary" onclick="modalFiltro(<?php echo $frota['frota_id'] ?>)"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                    </div>
                                    
                                    <div class="col-md-12 form-group">    
                                        <br>
                                        <div class="tableFixHead">
                                            <table id="manuTable" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>N° OS</th>
                                                        <th>Data - Hora</th>
                                                        <th>Tipo</th>
                                                        <th>Km / Hr</th>
                                                        <th>Título</th>
                                                        <th>Situação</th>
                                                        <th>Valor</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($manutencoes as $manu){ ?>
                                                    <tr>
                                                        <td><?php echo sprintf("%'03d", $manu['os_id']) ; ?></td>
                                                        <td><?php echo $manu['os_data_abertura']." - ".$manu['os_hora_abertura'] ?></td>
                                                        <td><?php echo $manu['os_tipo'] ?></td>
                                                        <td><?php echo $manu['os_km_atual'] ?></td>
                                                        <td><?php echo substr($manu['os_titulo'], 0, 40); if(strlen($manu['os_titulo']) > 40){echo "...";} ?></td>
                                                        <td><?php echo $manu['os_situacao']['situacaoos_nome'] ?></td>
                                                        <td>R$ <?php echo number_format($manu['total'], 4, ',', '.') ?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?php echo base_url('mostrarordemdeservico/').$manu['os_id'] ?>" target="_blank"><em class="fa fa-eye"></em></a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        
                                        <h4 style="font-weight: bold">&nbsp;&nbsp;Títulos</h4>
                                        <br>
                                        
                                        <div class="tableFixHead">
                                            <table id="titleTable" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 15%!important">N° Doc</th>
                                                        <th style="width: 1%!important">Data</th>
                                                        <th style="width: 20%!important">Tipo</th>
                                                        <th style="width: 25%!important">Tomador</th>
                                                        <th style="width: 15%!important">N° OS</th>
                                                        <th style="width: 10%!important">Valor</th>
                                                        <th style="width: 1%!important"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($titulos as $ti){ ?>
                                                    <tr>
                                                        <td><?php echo $ti['titulos_numeroserie'] ?></td>
                                                        <td><?php echo $ti['titulos_vencimento'] ?></td>
                                                        <td><?php echo $ti['titulos_tipo']['tm_nome'] ?></td>
                                                        <td><?php echo $ti['titulos_forneclin'];?></td>
                                                        <td><?php echo $ti['titulos_numos'] ?></td>
                                                        <td><?php echo $ti['titulos_valor'] ?></td>
                                                        <td>
                                                            <a class="btn btn-primary" href="<?php echo base_url('financeiro/verBaixa/').$ti['titulos_id'] ?>" target="_blank"><em class="fa fa-eye"></em></a>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <br>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
        </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-filter" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Filtros</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" aria-label="Close" data-dismiss="modal" onclick="resetFiltros()"><span aria-hidden="true">&times;</span></button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('relatorioveiculo') ?>" method="post" target="_blank">
                            <input type="hidden" id="id_filtro" name="id_filtro">
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Tipo de Manutenção</label><br>
                                        <select  style="width: 100%!important" class="select2-search" id="tipo_manu" name="tipo_manu">
                                            <option value="">-- Nenhum --</option>
                                            <option value="CORRETIVA">CORRETIVA</option>
                                            <option value="PREVENTIVA">PREVENTIVA</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Data Início</label><br>
                                        <input type="date" class="form-control" id="dt_inicio" name="dt_inicio">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Data Fim</label><br>
                                        <input type="date" class="form-control" id="dt_fim" name="dt_fim">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="resetFiltros()">Fechar</button>
                                &nbsp;&nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Gerar PDF</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- ============================================================== -->
            <!-- Script Area Start  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('#manuTable').DataTable( {
                        "order": [[ 0, "desc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ registros por página",
                            "zeroRecords": "Nada encontrado- refaça sua busca",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "Sem registros disponíves",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"N° OS": "first", "orderable": true},
                            {"Data - Hora": "second", "orderable": true},
                            {"Tipo": "third", "orderable": true},
                            {"Km": "fourth", "orderable": true},
                            {"Título": "fifth", "orderable": true},
                            {"Situação": "sixth", "orderable": true},
                            {"Valor": "seventh", "orderable": true},
                            {"": "eighth", "orderable": false},
                        ],
                    });
                    $('select[name ="manuTable_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#manuTable_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    
                    $('#titleTable').DataTable( {
                        "order": [[ 0, "desc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ registros por página",
                            "zeroRecords": "Nada encontrado- refaça sua busca",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "Sem registros disponíves",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"N° Doc": "first", "orderable": true},
                            {"Data": "second", "orderable": true},
                            {"Tipo": "third", "orderable": true},
                            {"Tomador": "fourth", "orderable": true},
                            {"N° OS": "fifth", "orderable": true},
                            {"Valor": "sixth", "orderable": true},
                            {"": "seventh", "orderable": false},
                        ],
                    });
                    $('select[name ="titleTable_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#titleTable_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    }); 
                });
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
                function modalFiltro(id){
                    console.log(id);
                    $('#id_filtro').val(id);
                    $('#modalFiltro').modal('show');
                }
                
                function resetFiltros(){
                    $('#tipo_manu').val('').change();
                    $('#dt_inicio').val('');
                    $('#dt_fim').val('');
                    $('#modalFiltro').modal('hide');
                }
            </script>
            