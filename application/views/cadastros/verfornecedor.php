            <style>
                .tableFixHead{
                    overflow-y: auto;
                    height: 600px;
                    padding-left: 15px;
                }
                .tableFixHead thead th{
                    position: sticky;
                    top: 0;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                th, td{
                    padding: 8px 16px;
                }
                th{
                    background: #eee;
                }
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
                .nav.nav-tabs{
                    border-bottom: 0;
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
                .btn-success:disabled{
                    background-color: #5cb85c;
                    border-color: #4cae4c;
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
                .pagination>.active>a, .pagination>.active>a:hover {
                    background-color: #033557;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
                    background: white;
                    border-color: white;
                }
                .border-c{
                    border-radius: 4px;
                    background-color: #033557;
                    padding: 7px 15px;
                    margin-top: 3px;
                    display: inline;
                    color: white;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9;">
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)"><b>DADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDoc" onclick="change(2)"><b>DOCUMENTOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aPag" onclick="change(3)"><b>DADOS DE PAGAMENTO</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aFat" onclick="change(4)"><b>FATURAMENTO</b></a>
                            </li>
                        </ul>
                            
                        <div class="row white-tab" id="divDados" style="display: block;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <h3><?php echo $fornecedor['fornecedor_nome'] ?></h3>
                                    </div>
                                    <div class="col-md-3 form-group text-right" style="padding-top: 20px">
                                        <a style="color: white" class="btn btn-primary" href="<?php echo base_url('fornecedores') ?>"><i class="fas fa-chevron-left"></i>&nbsp; Voltar</a>
                                        &nbsp;&nbsp;<a class="btn btn-primary" href="<?php echo base_url('relatoriofornecedor/').$cnpj ?>" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>CNPJ / CPF</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_cnpj'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Razão</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_razao'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Inscrição Estadual</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_ie'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-7 form-group">
                                        <label>Endereço</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_endereco'].", ".$fornecedor['fornecedor_numero'] ?>" readonly>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label>Bairro</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_bairro'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Complemento</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_complemento'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>CEP</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_cep'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Cidade</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_cidade'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Estado</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_estado'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label>Representante</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_representante'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Tel Representante</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_tel_representante'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Tel Empresa</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_fixo'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Celular</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_cel1'] ?>" readonly>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>E-mail</label><br>
                                        <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_email'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <br>
                            </div>
                        </div>
                        
                        <div class="row white-tab" id="divDocs" style="display: none;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br><br>
                                
                                <style>
                                    .doc-col{
                                        padding: 0px 10% 0px 10%;
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
                                    
                                    <div class="col-md-3 doc-col">
                                        
                                        <?php if($doc['documento_isimagem'] == 1){ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/').$cnpj."_".$doc['documento_tipo_id'].".png" ?>">
                                            <img class="doc-img" src="<?php echo base_url('uploads/').$cnpj."_".$doc['documento_tipo_id'].".png" ?>">
                                        </a>
                                        <?php }else{ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/').$cnpj."_".$doc['documento_tipo_id'].".pdf" ?>">
                                            <img class="doc-img" src="<?php echo base_url('resources/imgs/pdf_cover.png') ?>">
                                        </a>
                                        <?php } ?>
                                        <?php foreach($tipos_docs as $td){
                                            if($td['documentos_tipos_id'] == $doc['documento_tipo_id']){
                                                echo "<h4 style='text-align: center'>".mb_strtoupper($td['documentos_tipos_nome'])."</h4><br>";
                                            }
                                        } ?>
                                    </div>
                                    
                                    <?php } ?>
                                    
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                        
                        <div class="row white-tab" id="divPag" style="display: none;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>CNPJ / CPF do Titular</label><br>
                                            <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_titular_cpfcnpj'] ?>" readonly>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <label>Nome do Titular</label><br>
                                            <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_titular_nome'] ?>" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Banco</label><br>
                                            <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_banco'] ?>" readonly>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Agência</label><br>
                                            <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_agencia'] ?> - <?php echo $fornecedor['fornecedor_agencia_d'] ?>" readonly>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Conta</label><br>
                                            <input type="text" class="form-control" value="<?php echo $fornecedor['fornecedor_conta'] ?> - <?php echo $fornecedor['fornecedor_conta_d'] ?>" readonly>
                                        </div>
                                    </div>
                                    
                                <br><br>
                            </div>
                        </div>
                        
                        <div class="row white-tab" id="divFat" style="display: none;">

                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                    <div class="row">
                                        <div class="col-md-12 form-group text-right" style="padding-top: 20px">
                                            <h4 class="border-c text-center"><b>Total: R$ <?php echo $total ?>&nbsp;&nbsp;</b></h4>
                                            &nbsp;&nbsp;<a style="margin-top: -3.8px" class="btn btn-primary" data-toggle="modal" data-target="#modalFiltro"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                        </div>
                                    </div>
                                <br>
                                    
                                    <div class="tableFixHead">
                    				    <table id="myTableForVer" class="table table-hover table-bordered">
                    				        <thead>
                    				            <tr>
                    				                <th style="width: 20%">Data de Vencimento</th>
                    				                <th style="width: 20%">N° de Série</th>
                    				                <th style="width: 20%">Tipo</th>
                    				                <th style="width: 20%">Baixado</th>
                    				                <th style="width: 20%">Valor</th>
                    				            </tr>
                    				        </thead>
                    				        <tbody>
                    				            <?php foreach($titulos as $titulo) { ?>
                    				            <tr>
                    				                <td><?php echo date('d/m/Y', strtotime($titulo['vencimento'])); ?></td>
                    				                <td><?php echo $titulo['numeroserie'] ?></td>
                    				                <td><?php echo $titulo['tipo'] ?></td>
                    				                <td><?php echo $titulo['baixa'] ?></td>
                    				                <td>R$ <?php echo number_format($titulo['valor'],2, ',' , '.'); ?></td>
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
            
            <div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row" style="width: 110%;">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Filtro</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" style="padding: 5px;" aria-label="Close"><span aria-hidden="true" onclick="escondeFiltro()">&times;</span></button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('relatoriotitulosforne') ?>" target="_blank">
                            <input type="hidden" value="<?php echo $fornecedor['fornecedor_cnpj'] ?>" name="cnpj">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Tipo</label><br>
                                        <select class="selectfornetitu-filtro"  style="width: 100%!important" id="filtro_tipo" name="filtro">
                                            <option value="">-- Todos --</option>
                                            <option value="1">Baixado</option>
                                            <option value="0">Não Baixado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Data Início</label><br>
                                        <input type="date" class="form-control" id="dt_inicio" name="dt_inicio">
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Data Fim</label><br>
                                        <input type="date" class="form-control" id="dt_fim" name="dt_fim">
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="escondeFiltro()">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Gerar PDF</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <script>
            
                $("#card").flip();
                
                function change(value){
                    if(value == 1){
                        document.getElementById('aDados').style.backgroundColor = "white";
                        document.getElementById('aDoc').style.backgroundColor = "#eee";
                        document.getElementById('aPag').style.backgroundColor = "#eee";
                        document.getElementById('aFat').style.backgroundColor = "#eee";
                        
                        document.getElementById('divDados').style.display = "block";
                        document.getElementById('divDocs').style.display = "none";
                        document.getElementById('divPag').style.display = "none";
                        document.getElementById('divFat').style.display = "none";
                    }else if(value == 2){
                        document.getElementById('aDados').style.backgroundColor = "#eee";
                        document.getElementById('aDoc').style.backgroundColor = "white";
                        document.getElementById('aPag').style.backgroundColor = "#eee";
                        document.getElementById('aFat').style.backgroundColor = "#eee";
                        
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "block";
                        document.getElementById('divPag').style.display = "none";
                        document.getElementById('divFat').style.display = "none";
                    }else if(value == 3){
                        document.getElementById('aDados').style.backgroundColor = "#eee";
                        document.getElementById('aDoc').style.backgroundColor = "#eee";
                        document.getElementById('aPag').style.backgroundColor = "white";
                        document.getElementById('aFat').style.backgroundColor = "#eee";
                        
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "none";
                        document.getElementById('divPag').style.display = "block";
                        document.getElementById('divFat').style.display = "none";
                    }else if(value == 4){
                        document.getElementById('aDados').style.backgroundColor = "#eee";
                        document.getElementById('aDoc').style.backgroundColor = "#eee";
                        document.getElementById('aPag').style.backgroundColor = "#eee";
                        document.getElementById('aFat').style.backgroundColor = "white";
                        
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "none";
                        document.getElementById('divPag').style.display = "none";
                        document.getElementById('divFat').style.display = "block";
                    }
                }
            </script>
            
            <script>
                $(document).ready(function(){
                    $('.selectfornetitu-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalFiltro')});
                    $('#myTableForVer').DataTable( {
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
                    });
                    $('select[name ="myTableForVer_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableForVer_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                });
            </script>
            
            <script>
                function escondeFiltro(){
                    $('#filtro_tipo').val('').change();
                    $('#filtro_frota').val('').change();
                    $('#foltro_de').val('');
                    $('#foltro_ate').val('');
                    
                    $('#modalFiltro').modal('hide');
                }
                
                $('#modalFiltro').on('hidden.bs.modal', function () {
                    escondeFiltro();
                });
            </script>
            
            