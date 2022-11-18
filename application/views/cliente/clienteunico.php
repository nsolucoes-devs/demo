        
            <style>
                .tableFixHead          { overflow-y: auto; height: 600px; padding-left: 15px; }
                .tableFixHead thead th { position: sticky; top: 0; }
                
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
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
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
                .btn-primary{
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
                .custom-img{
                    width: 100%;
                    height: auto;
                }
                .custom-div{
                    padding: 0px 10% 0px 10%;
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
                div#tableVeics_wrapper .row{
                    width: 100%;
                    margin-bottom: 15px;
                }
                .nav-tabs {
                    border-bottom: 0;
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
                                <a class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)"><b>DADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDoc" onclick="change(2)"><b>DOCUMENTOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aVeic" onclick="change(3)"><b>VEÍCULOS</b></a>
                            </li>
                        </ul>
                    
                        <div class="change-tab-div row white-tab" id="divDados" style="display: block;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <h2><?php echo $cliente['cliente_nome'] ?></h2>
                                    </div>
                                    <div class="col-md-3 form-group text-right" style="padding-top: 25px">
                                        <a class="btn btn-primary" href="<?php echo base_url('clientes') ?>"><i class="fas fa-angle-left"></i>&nbsp;Voltar</a>
                                        &nbsp;&nbsp;
                                        <form target="_blank" action="<?php echo base_url('clienterelatoriounico') ?>" method="post" style="display: inline">
                                            <input type="hidden" name="cpfcnpj" value="<?php echo $cliente['cliente_cpfcnpj'] ?>">
                                            <button type="submit" class="btn btn-primary">PDF</button>
                                        </form>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>CPF / CNPJ</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cpfcnpj'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>RG</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_rg'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Inscrição Estadual</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_ie'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Nascimento</label><br>
                                        <input type="text" class="form-control" value="<?php echo date("d/m/Y", strtotime($cliente['cliente_nascimento'])); ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Nome Fantasia</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_fantasia'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Razão Social</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_razao'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Ramo de Atividade</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_ramo'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Logradouro</label><br>
                                        <input type="text" class="form-control" value="<?php 
                                            echo $cliente['cliente_endereco'].", ".$cliente['cliente_numero'];
                                            if($cliente['cliente_complemento'] != null){echo ", ".$cliente['cliente_complemento'];}
                                            echo " - ".$cliente['cliente_bairro']."; ".$cliente['cliente_cidade']." - ".$cliente['cliente_estado']." - ";
                                            echo substr($cliente['cliente_cep'], 0, 5)."-".substr($cliente['cliente_cep'], 5);
                                            ?>" readonly>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <label>Contato Nome</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_cont'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Contato Telefone</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['telcont'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Telefone</label><br>
                                        <input type="text" class="form-control" value="<?php echo "(".substr($cliente['cliente_fixo'], 0, 2).") ".substr($cliente['cliente_fixo'], 2, 4)."-".substr($cliente['cliente_fixo'], 6); ?>" readonly>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label>Celular(es)</label><br>
                                        <input type="text" class="form-control" value="<?php 
                                            echo "(".substr($cliente['cliente_cel1'], 0, 2).") ".substr($cliente['cliente_cel1'], 2, 5)."-".substr($cliente['cliente_cel1'], 7); 
                                            if($cliente['cliente_cel2'] != null){
                                                echo " / (".substr($cliente['cliente_cel2'], 0, 2).") ".substr($cliente['cliente_cel2'], 2, 5)."-".substr($cliente['cliente_cel2'], 7);
                                            }
                                            ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>E-mail</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_email'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>CNPJ / CPF do Titular</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_tit_cpfcnpj'] ?>" readonly>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label>Nome do Titular</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_tit_nome'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Banco</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_banco'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Agência</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_agencia'] ?> - <?php echo $cliente['cliente_agencia_d'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Conta</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cliente['cliente_conta'] ?> - <?php echo $cliente['cliente_conta_d'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                    
                        <div class="change-tab-div row white-tab" id="divDocs" style="display: none;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br>
                                
                                <style>
                                    .doc-col{
                                        padding: 0px 7% 0px 7%;
                                        margin-bottom: 15px;
                                    }
                                    .doc-img{
                                        width: 80%;
                                        height: auto;
                                    }
                                    .doc-col h3{
                                        font-weight: bold;
                                        text-align: center;
                                    }
                                </style>
                                
                                <div class="row">
                                    
                                    <?php foreach($docs as $doc){ ?>
                                    
                                    <div class="col-md-3 doc-col text-center">
                                        <?php foreach($tipos_docs as $td){
                                            if($td['documentos_tipos_id'] == $doc['documento_tipo_id']){
                                                echo "<h3>".mb_strtoupper($td['documentos_tipos_nome'])."</h3><br>";
                                            }
                                        } 
                                        if($doc['documento_isimagem'] == 1){ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/c_').$cliente['cliente_cpfcnpj']."_".$doc['documento_tipo_id'].".png" ?>">
                                            <img class="doc-img" src="<?php echo base_url('uploads/c_').$cliente['cliente_cpfcnpj']."_".$doc['documento_tipo_id'].".png" ?>">
                                        </a>
                                        <?php }else{ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/c_').$cliente['cliente_cpfcnpj']."_".$doc['documento_tipo_id'].".pdf" ?>">
                                            <img class="doc-img" src="<?php echo base_url('resources/imgs/pdf_cover.png') ?>">
                                        </a>
                                        <?php } ?>
                                    </div>
                                    
                                    <?php } ?>
                                    
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                        
                        <div class="change-tab-div row white-tab" id="divVeic" style="display: none;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br>
                    
                                <div class="tableFixHead">
                                    <table id="tableVeics" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Veículo</th>
                                                <th>De</th>
                                                <th>Até</th>
                                                <th style="width: 70px">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($locacoes as $loc){ ?>
                                            
                                            <tr>
                                                <td><?php echo $loc['id'] ?></td>
                                                <td><?php echo $loc['veiculo'] ?></td>
                                                <td><?php echo $loc['data_inicio'] ?></td>
                                                <td><?php echo $loc['data_fim'] ?></td>
                                                <td class="text-center">
                                                    <?php if($loc['data_fim'] == "--"){ ?>
                                                    <a class="btn btn-danger" href="<?php echo base_url('cliente/desvincular/').$loc['id'] ?>"><em class="fas fa-unlink"></em></a>
                                                    <?php } ?>
                                                </td>
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
                $(document).ready(function(){
                    $('#tableVeics').DataTable( {
                        "order": [[ 0, "asc" ]],
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
                            {"ID": "first", "orderable": true},
                            {"Veículo": "second", "orderable": true},
                            {"De": "third", "orderable": true},
                            {"Até": "fourth", "orderable": true},
                            {"Ação": "fifth", "orderable": false},
                        ],
                    } );
                    $('select[name ="tableVeics_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#tableVeics_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                });
            </script>
            