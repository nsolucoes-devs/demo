
        
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
                    background-color: white;
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
                #myTableEst .trigger_hidden:hover{
                    background-color: #F2F2F2;
                }
                #myTableEst .hidden_row { 
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
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <h2><?php echo $produto['produto_nome'] ?></h2>
                            </div>
                            <div class="col-md-3 form-group text-right">
                                <a class="btn btn-primary" href="<?php echo base_url('movimentosestoque') ?>"><em class="fa fa-angle-left"></em>&nbsp;Voltar</a>
                                &nbsp;&nbsp;
                                <a class="btn btn-primary" href="#" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>Código</label><br>
                                <input type="text" class="form-control" value="<?php echo $produto['produto_codigo'] ?>" readonly>
                            </div>
                            <div class="col-md-5 form-group">
                                <label>Modelo</label><br>
                                <input type="text" class="form-control" value="<?php echo $produto['produto_modelo'] ?>" readonly>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Fabricante</label><br>
                                <input type="text" class="form-control" value="<?php echo $produto['produto_fabricante'] ?>" readonly>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Lista de Andamentos:</label><br>
                                <div class="tableFixHead">
                                    <table id="myTableEst" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%"></th>
                                                <th style="width: 9%">Data</th>
                                                <th style="width: 7%">Hora</th>
                                                <th style="width: 79%">Título</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="trigger_hidden">
                                                <td class="text-center">
                                                    
                                                    <div class="row text-center">
                                                        <div class="col-md-12">
                                                            <div class="outside-btn">
                                                                <button id="btn1" type="button" class="btn-expand" onclick="showHideRow('hidden_row1');"><em class="fa fa-plus"></em></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr id="hidden_row1" class="hidden_row">
                                                <td colspan=4> 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="title-inside">Title</p>
                                                            <p class="detalhes">Data</p>
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
                                                                    <tr class="sep-tr">
                                                                        <td style="width: 50%"></td>
                                                                        <td style="width: 10%"></td>
                                                                        <td style="width: 20%"></td>
                                                                        <td style="width: 20%"></td>
                                                                    </tr>
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
                                                                    <tr class="sep-tr">
                                                                        <td style="width: 50%"></td>
                                                                        <td style="width: 10%">/td>
                                                                        <td style="width: 20%"></td>
                                                                        <td style="width: 20%"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <h4>Subtotal: </h4>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <h4>Subtotal: </h4>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
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
            