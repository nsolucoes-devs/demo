
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
                .nav-link{
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                    color: #033557;
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
                                <a class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;" onclick="change(2)"><b>MOVIMENTAÇÃO</b></a>
                            </li>
                        </ul>
                        
                        <div class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                        
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <h2><?php echo $prod['produto_nome'] ?></h2>
                                    </div>
                                    
                                    <div class="col-md-3 form-group text-right">
                                        <a class="btn btn-primary" href="<?php echo base_url('pecas') ?>"><em class="fa fa-angle-left"></em>&nbsp;Voltar</a>
                                        &nbsp;&nbsp;
                                        <!--<a class="btn btn-primary"  target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>-->
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Código</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_codigo'] ?>" readonly>
                                    </div>
                                    
                                    <div class="col-md-5 form-group">
                                        <label>Modelo</label><br>
                                        <input type"text" class="form-control" value="<?php echo $prod['produto_modelo'] ?>" readonly>
                                    </div>
                                    
                                    <div class="col-md-4 form-group">
                                        <label>Fabricante</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_fabricante'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Fornecedor</label><br>
                                        <input type="text" class="form-control" value="<?php echo $forn ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Preço de Custo (R$)</label><br>
                                        <input type="text" class="form-control" value="R$ <?php echo number_format($prod['produto_preco_custo'], 4, ',', '.') ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Preço de Venda (R$)</label><br>
                                        <input type="text" class="form-control" value="R$ <?php echo number_format($prod['produto_preco_venda'], 4, ',', '.') ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label>Grupo de Peças</label><br>
                                        <input type="text" class="form-control" value="<?php echo $grupo['gp_nome'] ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Qtd Mínima em Estoque</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_qtdminimo'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>Unidade de Medida</label><br>
                                        <input type="text" class="form-control" value="<?php echo $un_medida['medidas_nome']." (".$un_medida['medidas_sigla'].")" ?>" readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Comprimento x Largura x Altura</label><br>
                                        <input type="text" class="form-control" value="<?php echo number_format($prod['produto_comprimento'], 4, ',', '.')." x ".number_format($prod['produto_largura'], 4, ',', '.')." x ".number_format($prod['produto_altura'], 4, ',', '.') ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Unidade de Peso</label><br>
                                        <input type="text" class="form-control" value="<?php echo $un_peso['medidas_nome']." (".$un_peso['medidas_sigla'].")" ?>" readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Peso</label><br>
                                        <input type="text" class="form-control" value="<?php echo number_format($prod['produto_peso'], 4, ',', '.') ?>" readonly>
                                    </div>
                                </div>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>SKU</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_sku'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>NCM</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_ncm'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>CEST</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_cest'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>UPC</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_upc'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>EAN</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_ean'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>JAN</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_jan'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>ISBN</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_isbn'] ?>" readonly>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>MPN</label><br>
                                        <input type="text" class="form-control" value="<?php echo $prod['produto_mpn'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Detalhes</label><br>
                                        <textarea class="form-control" rows=3 readonly><?php echo $prod['produto_detalhes'] ?></textarea>
                                    </div>
                                </div>
 
                                <br>
                            </div>
                        </div>
                        
                        <div style="display:none;" class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <h4>Lista de Movimentos:</h4><br>
                                        <div class="tableFixHead">
                                            <table id="myTableAnd" class="table table-hover table-bordered">
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
                                                            
                                                            <div class="row">
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
                                                                    <p class="title-inside">Detalhes do Andamento:</p>
                                                                    <p class="detalhes">Detalhes</p>
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
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
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
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <h4>Subtotal: R$ </h4>
                                                                </div>
                                                                <div class="col-md-6 text-right">
                                                                    <h4>Subtotal: R$ </h4>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
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
