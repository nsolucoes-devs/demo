            <script> //$.fn.modal.Constructor.prototype.enforceFocus = function() {}; </script>
            <style>
                .tableFixHead          { height: auto; padding-left: 15px; }
                .tableFixHead thead th { position: sticky; top: 0; }
                
                /* Just common table stuff. Really. */
                table  { border-collapse: collapse; width: 100%; }
                th, td { padding: 8px 16px; }
                th     { background:#eee; }
                
                .modal { overflow: auto !important; }
                body { padding-right: 0!important; }
                
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    border-radius: 5px;
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
                .row-c{
                    width: 110%;
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
                .btn-info-red{
                    float: right;
                    margin-right: 15px;
                    width: 25px;
                    height: 25px;
                    border: 2px solid black;
                    border-radius: 50%;
                    text-align: center;
                    color: red;
                    cursor: pointer;
                }
                .nav-link{
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                    color: #033557;
                }
                .nav-tabs {
                    border-bottom: 0;
                }
                .btn-info-red:hover{
                    color: black;
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
                    .modal-nota{
                        min-width: 60%;
                        margin-left: 20%;
                        margin-right: 20%;
                    }
                    .modal-fc{
                        min-width: 60%;
                        margin-left: 20%;
                        margin-right: 20%;
                    }
                    .modal-ver{
                        min-width: 50%;
                        margin-left: 25%;
                        margin-right: 25%;
                    }
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
                .modal-nota .select2{
                    width: 100%!important;
                }
                .sel-with-add{
                    width: calc(100% - 55px);
                    display: inline;
                    float: left;
                }
                .sel-with-add select{
                    width: 100%;
                }
                .add-din{
                    width: 55px;
                    display: inline;
                    float: left;
                }
                .add-din button{
                    margin-left: 15px;
                    width: 40px;
                }
                .nav-tabs {
                    border-bottom: 0;
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
                .bordered-div{
                    border: 1px solid grey;
                    padding-top: 5px;
                    padding-bottom: 5px;
                }
                .row-padding{
                    padding-left: 15px;
                    padding-right: 15px;
                }
                .dropdown-menu{
                    
                }
                .dropdown-item{
                    color: black;
                    text-decoration: none;
                    width: 100%;
                    cursor: pointer;
                    background-color: white;
                }
                .dropdown-item:hover{
                    background-color: lightgrey;
                }
                .table{
                    margin-left: 0!important;
                    margin-right: 0!important;
                    width: 100%!important;
                }
                
                .sel-with-add{
                    width: calc(100% - 65px);
                    display: inline;
                    float: left;
                }
                .add-din{
                    width: 65px;
                    display: inline;
                    float: left;
                }
                .add-din button{
                    margin-left: 20px;
                    width: 45px;
                }
                span.select2-dropdown.select2-dropdown--below{
                    margin-top: 0 !important;
                }
                
                .pagination-links a{
                    color: #033557;
                    text-decoration: none;
                    padding: 5px;
                    font-size: 20px;
                    margin: 2px;
                }
                
                .pagination-links strong{
                    padding-bottom: 2px!important;
                    padding: 6px;
                    font-size: 20px;
                    border-bottom: 3px solid #033557;
                    color: #033557;
                }
                
            </style>

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9">
                            <!--
                            <li class="nav-item">
                                <a href="<?php echo base_url('financeiro/incompletos') ?>" class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;"><b>TÍTULOS INCOMPLETOS</b></a>
                            </li>
                            -->
                            <li class="nav-item">
                                <a href="<?php echo base_url('movimentosfinanceiro') ?>" class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;"><b>TÍTULOS ABERTOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('financeiro/baixados') ?>" class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;"><b>TÍTULOS BAIXADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('financeiro/relatorios') ?>" class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px;"><b>RELATÓRIOS</b></a>
                            </li>
                        </ul>

                        <div class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px;">
                                <div class="row" style="margin-top: 1%">
                                    <div class="col-md-4">
                                        <div class="card" data-toggle="modal" data-target="#modalFiltro" style="padding: 10%; cursor: pointer;">
                                            <div class="card-body" style="padding: 2%; background-color: #033557; border-radius: 5px; margin-right: 30%;">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p style="padding-left: 20px; padding-top: 10px; font-size: 20px; color: white"><b>PDF</b></p>        
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <em style="padding-right: 11px!important; padding-top: 8px; font-size: 30px; color: white" class="fa fa-file-o"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card"  data-toggle="modal" data-target="#modalDre" style="padding: 10%; cursor: pointer;">
                                            <div class="card-body" style="padding: 2%; background-color: #033557; border-radius: 5px; margin-right: 30%;">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p style="padding-left: 20px; padding-top: 10px; font-size: 20px; color: white"><b>DRE</b></p>        
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <em style="padding-right: 11px!important; padding-top: 8px; font-size: 30px; color: white" class="fa fa-file"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card" data-toggle="modal" data-target="#modalCaixa" style="padding: 10%; cursor: pointer;">
                                            <div class="card-body" style="padding: 2%; background-color: #033557; border-radius: 5px; margin-right: 30%;">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p style="padding-left: 20px; padding-top: 10px; font-size: 20px; color: white"><b>CAIXA</b></p>        
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <em style="padding-right: 11px!important; padding-top: 8px; font-size: 30px; color: white" class="fa fa-calculator"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
  
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Filtros</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button style="padding-top: 1%;" type="button" class="close" onclick="hideFiltro()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('relatoriotitulos') ?>" method="post" target="_blank">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Tipo</label><br>
                                        <select  style="width: 100%!important" class="select2-filtro" id="filtro_tipo" name="tipo">
                                            <option value="">-- Todos --</option>
                                            <option value="ENTRADA">Entrada</option>
                                            <option value="SAIDA">Saída</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Situação</label><br>
                                        <select  style="width: 100%!important" class="select2-filtro" id="filtro_baixa" name="baixa">
                                            <option value="">-- Todas --</option>
                                            <option value="0">Abertos</option>
                                            <option value="1">Fechados</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <label>De</label><br>
                                        <input type="date" class="form-control" id="filtro_de" name="de">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Até</label><br>
                                        <input type="date" class="form-control" id="filtro_ate" name="ate">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="hideFiltro()">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Gerar PDF</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalDre" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Demonstrativo de Resultado</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button style="padding-top: 1%;" type="button" class="close" onclick="hidedre()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formdre" method="post" target="_blank" action="<?php echo base_url('relatorios/pdfdredetalhado') ?>">
                            <div class="modal-body">
                                
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active" id="link-1">
                                        <a class="nav-link" style="cursor: pointer" onclick="changedre(1)">Detalhado</a>
                                    </li>
                                    <li class="nav-item" id="link-2">
                                        <a class="nav-link" style="cursor: pointer" onclick="changedre(2)">Sintético</a>
                                    </li>
                                </ul>
                                
                                <div class="tab-content">
                                    
                                    <div class="tab-pane" id="tab-1" style="display: block">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Início do Período</label><br>
                                                <input type="date" class="form-control" name="inicio" id="detalhado_inicio" required>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Final do Período</label><br>
                                                <input type="date" class="form-control" name="final" id="detalhado_final" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="tab-2">
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Início do Período</label><br>
                                                <input type="month" class="form-control" name="inicio2" id="sintetico_inicio">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Final do Período</label><br>
                                                <input type="month" class="form-control" name="final2" id="sintetico_final">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="hidedre()">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Gerar DRE</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalCaixa" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Fechamento de Caixa</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button style="padding-top: 1%;" type="button" class="close" onclick="hidecaixa()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('relatorios/fechamentoCaixa') ?>" method="post" target="_blank">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Informe o Dia</label><br>
                                        <input type="date" class="form-control" id="caixa_dia" name="dia" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="hidecaixa()">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Fechar Caixa</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.select2-modal').select2({theme: "bootstrap", dropdownParent: $('#notaModal')});
                    
                    $('.select2-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalFiltro')});
                    $('.selectcadastrotitulo-filtro').select2({theme: "bootstrap", dropdownParent: $('#completaModal')});
                    $('.selectlancatitulo-filtro').select2({theme: "bootstrap", dropdownParent: $('#lancatituloModalCenter')});
                    $('.selecteditarlancatitulo-filtro').select2({theme: "bootstrap", dropdownParent: $('#modaleditar')});
                    $('.select2-multi').select2({theme: "bootstrap", dropdownParent: $('#modalMulti')});
                    $('.sel-dre-mes').select2({theme: "bootstrap", dropdownParent: $('#modalDre')});
                    $('.select2-forma').select2({theme: "bootstrap", dropdownParent: $('#baixaModalCenter')});
                    $('.select2-custom').select2({theme: "bootstrap"});


                });
            </script>
            
            <script>
                function hidedre(){
                    $('#link-1').addClass('active');
                    $('#link-2').removeClass('active');
                    
                    $('#tab-1').css('display', 'block');
                    $('#tab-2').css('display', 'none');
                    
                    $('#detalhado_inicio').prop('required', true).val('');
                    $('#detalhado_final').prop('required', true).val('');
                    
                    $('#sintetico_inicio').prop('required', false).val('');
                    $('#sintetico_final').prop('required', false).val('');
                    
                    $('#formdre').prop('action', '<?php echo base_url('relatorios/pdfdredetalhado') ?>');changedre(1);
                    $('#modalDre').modal('hide');
                }
                
                function hideFiltro(){
                    $('#modalFiltro').modal('hide');
                }
                
                function changedre(val){
                    if(val == 1){
                        $('#link-1').addClass('active');
                        $('#link-2').removeClass('active');
                        
                        $('#tab-1').css('display', 'block');
                        $('#tab-2').css('display', 'none');
                        
                        $('#detalhado_inicio').prop('required', true);
                        $('#detalhado_final').prop('required', true);
                        
                        $('#sintetico_inicio').prop('required', false);
                        $('#sintetico_final').prop('required', false);
                        
                        $('#formdre').prop('action', '<?php echo base_url('relatorios/pdfdredetalhado') ?>');
                    }else if(val == 2){
                        $('#link-2').addClass('active');
                        $('#link-1').removeClass('active');
                        
                        $('#tab-2').css('display', 'block');
                        $('#tab-1').css('display', 'none');
                        
                        $('#sintetico_inicio').prop('required', true);
                        $('#sintetico_final').prop('required', true);
                        
                        $('#detalhado_inicio').prop('required', false);
                        $('#detalhado_final').prop('required', false);
                        
                        $('#formdre').prop('action', '<?php echo base_url('relatorios/pdfdresintetico') ?>');
                    }
                }
            </script>
            
            <script>
                function hidecaixa(){
                    $('#caixa_dia').val('');
                    $('#modalCaixa').modal('hide');
                }
            </script>

          
            