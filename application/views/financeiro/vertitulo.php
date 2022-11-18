
            <style>
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
                    background-color: white;
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
                #filhos .trigger_hidden:hover{
                    background-color: #F2F2F2;
                }
                #filhos .hidden_row { 
                    display: none;
                    background-color: #eee; 
                }
            </style>
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">

                        <div class="row">
                            <div class="col-md-9 form-group">
                                <h2>N° do Título: <?php echo $pai['nserie'] ?></h2>
                            </div>
                            <div class="col-md-3 form-group text-right">
                                <br>
                                <a class="btn btn-primary" href="<?php echo base_url('movimentosfinanceiro') ?>"><em class="fa fa-angle-left"></em>&nbsp;Voltar</a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label>Vencimento</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['vencimento'] ?>" readonly>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Data da Baixa</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['data_baixa'] ?>" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Responsável Pela Baixa</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['responsavel'] ?>" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Tipo</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['tipo'] ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label>Frota</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['frota'] ?>" readonly>
                            </div>
                            <div class="col-md-7 form-group">
                                <label>Fornecedor/Cliente</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['forneclin'] ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>Valor Total</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['valor'] ?>" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Desconto (<span class="text-success">-</span>)</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['desconto'] ?>" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Acréscimo (<span class="text-danger">+</span>)</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['acrescimo'] ?>" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Valor Pago</label><br>
                                <input type="text" class="form-control" value="<?php echo $pai['pago'] ?>" readonly>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Observação</label>
                                <textarea class="form-control" rows=2 readonly><?php echo $pai['obs'] ?></textarea>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Títulos Vinculados:</label><br>
                                <table id="filhos" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%"></th>
                                            <th style="width: 10%">Vencimento</th>
                                            <th style="width: 30%">N° do Título</th>
                                            <th style="width: 30%">Tipo</th>
                                            <th style="width: 15%">Valor Pago</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 0; foreach($filhos as $f){ ?>
                                        <tr class="trigger_hidden">
                                            <td class="text-center">
                                                
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="outside-btn">
                                                            <button id="btn<?php echo $i; ?>" type="button" class="btn-expand" onclick="showHideRow('hidden_row<?php echo $i; ?>');"><em class="fa fa-plus"></em></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                            <td><?php echo $f['vencimento'] ?></td>
                                            <td><?php echo $f['nserie'] ?></td>
                                            <td><?php echo $f['tipo'] ?></td>
                                            <td><?php echo $f['valor'] ?></td>
                                        </tr>
                                        <tr id="hidden_row<?php echo $i; ?>" class="hidden_row">
                                            <td colspan=5> 
                                                <div class="row">
                                                    <div class="col-md-7 form-group">
                                                        <label>Fornecedor/Cliente</label><br>
                                                        <input type="text" class="form-control" value="<?php echo $f['forneclin'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-5 form-group">
                                                        <label>Frota</label><br>
                                                        <input type="text" class="form-control" value="<?php echo $f['frota'] ?>" readonly>
                                                    </div>
                                                    
                                                    <div class="col-md-3 form-group">
                                                        <label>Juros</label><br>
                                                        <input type="text" class="form-control" value="<?php echo $f['juros'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label>Multa</label><br>
                                                        <input type="text" class="form-control" value="<?php echo $f['multa'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label>Desconto</label><br>
                                                        <input type="text" class="form-control" value="<?php echo $f['desconto'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label>Valor</label><br>
                                                        <input type="text" class="form-control" value="<?php echo $f['valor'] ?>" readonly>
                                                    </div>
                                                    
                                                    <div class="col-md-12 form-group">
                                                        <label>Observação</label><br>
                                                        <textarea class="form-control" rows=2 readonly><?php echo $f['obs'] ?></textarea>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <br>
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    
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
                