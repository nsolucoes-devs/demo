            <script> //$.fn.modal.Constructor.prototype.enforceFocus = function() {}; </script>
            
            <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
            
            
            <style>
                .tableFixHead          { height: auto;}
                .tableFixHead thead th { position: sticky; top: 0; }
                
                /* Just common table stuff. Really. */
                table  { border-collapse: collapse; width: 100%; }
                th, td { padding: 10px!important; }
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
                
                .encurtar{
                    display: -webkit-box;
                    overflow: hidden;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    word-break: break-word;
                    line-height: 11px!important;
                }
                
                .pagination-links a{
                    color: #033557;
                    text-decoration: none;
                    padding: 5px;
                    font-size: 13px;
                    margin: 2px;
                    border: 1px solid #033557;
                    border-radius: 3px;
                }
                
                .pagination-links strong{
                    padding: 5px;
                    font-size: 13px;
                    color: #033557;
                    border: 1px solid #033557;
                    border-radius: 3px;
                }
                
                .pagination-links{
                    text-align: right;
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
                                <a href="<?php echo base_url('financeiro/baixados') ?>" class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px;"><b>TÍTULOS BAIXADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('financeiro/relatorios') ?>" class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;"><b>RELATÓRIOS</b></a>
                            </li>
                        </ul>

                        <div class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px;">
                                <div class="row" style="margin-top: 0">
                                    <div class="col-md-12 text-right form-group">
                                        <div class="btn-group dropleft">
                                            <button title="Lançamentos" type="button" class="btn btn-primary" style="position: relative; top: -38px; right: 30px; border-radius: 4px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-copy"></i></button>
                                            <div class="dropdown-menu" style="top: -6px!important; right: 28px!important;">
                                                <a class="dropdown-item" href="<?php echo base_url('financeiro/cadastroNota') ?>">Nota Fiscal</a>
                                                <a class="dropdown-item" href="<?php echo base_url('financeiro/cadastroTitulo') ?>">Título</a>
                                            </div>
                                        </div>
                                        
                                        <a href="<?php echo base_url('multiplostitulos') ?>" title="Baixa de multíplos títulos"><button style="position: absolute;right: 0;top: -38px;" type="button" class="btn btn-primary"><i class="far fa-arrow-alt-circle-down"></i></button></a>
                                    </div>
                                </div>
                                
                                <form action="<?php echo base_url('financeiro/baixados') ?>" method="post">
                                    <div class="row" style="margin-top: 0">
                                        <div class="col-md-3 form-group">
                                            <label>Período</label>
                                            <input style="margin-right: auto;" value="<?php echo $filtro['data'] ?>" type="text" name="periodo" id="periodo" class="form-control col-11" />
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Tipo</label>
                                            <select style="margin-right: auto;" class="form-control col-11" name="tipo" id="tipo">
                                                <option value="TODOS">Todos</option>    
                                                <option value="ENTRADA">Entrada</option>    
                                                <option value="SAIDA">Saída</option>    
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Tomador</label>
                                            <select style="width: 100%!important" class="select2-custom" id="forneclin" name="forneclin">
                                                <option value="" selected>Todos</option>
                                                <?php foreach($forcli as $fcs){?>
                                                <option value="<?php echo $fcs['id'];?>"><?php echo $fcs['nome'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Texto</label>
                                            <input type="text" onchange="filtrodisable()" onkeyup="filtrodisable()" class="form-control" id="texto" name="texto" value="<?php echo $filtro['texto'] ?>">
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <button style="margin-bottom: calc(0% - 61px);" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </form>
                                
                                <div class="tableFixHead">
                                    <table id="myTableBaixados" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 7%">Baixa</th>
                                                <th style="width: 10%">Nº Doc</th>
                                                <th style="width: 10%">Pago</th>
                                                <th style="width: 15%">Tomador</th>
                                                <th style="width: 5%">Tipo</th>
                                                <th style="width: 15%">Espécie</th>
                                                <th style="width: 5%">Responsável</th>
                					            <th style="width: 1%!important"></th>
                                            </tr>
                                        </thead>
                                         <tbody>
                                            <?php if($baixados != null){ foreach($baixados as $ttl){ ?>
                                                <tr style="font-size: 13px;">
                                                    <td>
                                                        <?php echo date('d/m/Y', strtotime($ttl['titulos_data_baixa']));?>
                                                    </td>
                                                    <td>
                                                        <div class="encurtar" title="<?php echo ucwords(mb_strtolower($ttl['titulos_numeroserie']));?>">
                                                            <?php echo ucwords(mb_strtolower($ttl['titulos_numeroserie']));?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo $ttl['titulos_valorpago'];?>
                                                    </td>
                                                    <td>
                                                        <div class="encurtar" title="<?php echo ucwords(mb_strtolower($ttl['titulos_fornecedor']));?>">
                                                            <?php echo ucwords(mb_strtolower($ttl['titulos_fornecedor']));?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php echo ucwords(mb_strtolower($ttl['titulos_tipo']));?>
                                                    </td>
                                                    <td>
                                                        <div class="encurtar" title="<?php echo ucwords(mb_strtolower($ttl['titulos_especie']));?>">
                                                            <?php echo ucwords(mb_strtolower($ttl['titulos_especie']));?>
                                                        </div>
                                                    </td>
                                                    
                                                    
                                                    <td>
                                                        <div class="encurtar" title="<?php echo ucwords(mb_strtolower($ttl['titulos_user_baixa']));?>">
                                                            <?php echo ucwords(mb_strtolower($ttl['titulos_user_baixa']));?>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php if($this->session->userdata('ver') == 1 || $this->session->userdata('ativar') == 1) { ?>
                                                            <div class="btn-group dropleft">
                                                                <button type="button" class="btn btn-primary" style="height: 20px;width: 20px;border-radius: 4px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <em style="position: absolute;top: 4px;left: 7px; font-size: 11px;" class="fa fa-bars"></em>
                                                        </button>
                                                                <div class="dropdown-menu">
                                                                    <?php if($this->session->userdata('ver') == 1) { ?>
                                                                    <a class="dropdown-item" href="<?php echo base_url('financeiro/verBaixa/') . $ttl['titulos_id'] ?>">Ver</a>
                                                                    <?php } ?>
                                                                    <?php if($this->session->userdata('ativar') == 1) { ?>
                                                                    <a class="dropdown-item" onclick="reabrir(<?php echo $ttl['titulos_id'] ?>)">Reabrir</a>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } } ?>    
                                            </tbody>
                                    </table>
                                    <?php if($baixados == null){ ?>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p> Nenhum título baixado encontrado.</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> títulos baixados encontrados</b></p>
                                        <?php if($pag_links){ ?>
                                            <br>
                                            <p class="pagination-links"><?php echo $pag_links; ?></p>
                                        <?php } else { ?>
                                            <p class="pagination-links">&nbsp;</p>
                                        <?php } ?>
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
            
            <div class="modal fade" id="addfc2" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-fc" role="document" style="margin-top: 10%;">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Fornecedor/Cliente</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hidefc2()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                       <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-md-6 form-group">
                                    <label>Tipo de Inserção</label><br>
                                    <select  style="width: 100%!important" class="select2-search block-sel" id="tipo_fc2">
                                        <option value="1">Fornecedor</option>
                                        <option value="2">Cliente</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>CPF/CNPJ</label><br>
                                    <div class="sel-with-add">
                                        <input class="form-control cnpj" id="cpfcnpj_fc2" placeholder="000.000.000-00">
                                    </div>
                                    <div class="add-din">
                                        <button type="button" class="btn btn-primary" onclick="cnpjSearch2()"><em class="fa fa-search"></em></button>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 form-group">
                                    <label>Nome</label><br>
                                    <input type="text" class="form-control disabled" id="nome_fc2" placeholder="Nome" disabled>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Ramo</label><br>
                                    <input type="text" class="form-control disabled" id="ramo_fc2" placeholder="Ramo" disabled>
                                </div>
                                
                                <div class="col-md-3 form-group">
                                    <label>CEP</label><br>
                                    <input type="text" class="form-control disabled cep" id="cep_fc2" placeholder="00000-000" disabled>
                                </div>
                                <div class="col-md-7 form-group">
                                    <label>Logradouro</label><br>
                                    <input type="text" class="form-control cep-disabled" id="logradouro_fc2" placeholder="Logradouro" disabled>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>N°</label><br>
                                    <input type="text" class="form-control cep-disabled number" id="num_fc2" placeholder="0" disabled>
                                </div>
                                
                                <div class="col-md-4 form-group">
                                    <label>Bairro</label><br>
                                    <input type="text" class="form-control cep-disabled" id="bairro_fc2" placeholder="Bairro" disabled>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Complemento</label><br>
                                    <input type="text" class="form-control cep-disabled" id="complemento_fc2" placeholder="Complemento" disabled>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Cidade</label><br>
                                    <input type="text" class="form-control cep-disabled" id="cidade_fc2" placeholder="Cidade" disabled>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>Estado</label><br>
                                    <input type="text" class="form-control cep-disabled" id="estado_fc2" placeholder="Estado" disabled>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>E-mail</label><br>
                                    <input type="email" class="form-control disabled" id="email_fc2" placeholder="mail@mail.com" disabled>
                                </div>

                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hidefc2()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendfc2()">Adicionar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalfechado" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-ver" role="document" style="margin-top: 10%;">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Ver Título</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal"aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <div class="row row-padding">
                                        <div class="col-md-5 form-group">
                                            <label>N° Série</label><br>
                                            <input type="text" class="form-control" id="num_ver" readonly>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label>Tipo</label><br>
                                            <input type="text" class="form-control" id="tipo_ver" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-padding">
                                        <div class="col-md-12 form-group">
                                            <label>Fonecedor/Cliente</label><br>
                                            <input type="text" class="form-control" id="forncli_ver" readonly>
                                        </div>
                                    </div>

                                    <div class="row row-padding">
                                        <div class="col-md-7 form-group">
                                            <label>Frota</label><br>
                                            <input type="text" class="form-control" id="frota_ver" readonly>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label>Movimentação</label><br>
                                            <input type="text" class="form-control" id="movi_ver" readonly>
                                        </div>
                                    </div>

                                    <div class="row row-padding">
                                        <div class="col-md-3 form-group">
                                            <label>Vencimento</label><br>
                                            <input type="text" class="form-control" id="vencimento_ver" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Juros</label><br>
                                            <input type="text" class="form-control" id="juros_ver" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Multa</label><br>
                                            <input type="text" class="form-control" id="multa_ver" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Desconto</label><br>
                                            <input type="text" class="form-control" id="desconto_ver" readonly>
                                        </div>
                                    </div>

                                    <div class="row row-padding">
                                        <div class="col-md-4 form-group">
                                            <label>Data da Baixa</label><br>
                                            <input type="text" class="form-control" id="databaixa_ver" readonly>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Valor Pago</label><br>
                                            <input type="text" class="form-control" id="pago_ver" readonly>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Forma de Pagamento</label><br>
                                            <input type="text" class="form-control" id="forma_ver" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-padding">
                                        <div class="col-md-12 form-group">
                                            <label>Responsável Pela Baixa</label><br>
                                            <input type="text" class="form-control" id="responsavel_ver" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-padding">
                                        <div class="col-md-12 form-group">
                                            <label>Observação</label><br>
                                            <textarea class="form-control" rows=2 id="observacao_ver" readonly></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <a class="btn btn-primary" id="ver_pai" style="display: none"><em class="fa fa-eye"></em></a>
                            <a class="btn btn-primary" id="pdf_fechado" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="reabrirT" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Reabrir Título</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="e_senha()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente reabrir o título?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('financeiro/reabrirtitulo') ?>" method="post">
                                        <input type="hidden" name="id_reabrir" id="id_reabrir">
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
            
            <div class="modal fade" id="excluirFinal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Confirme a senha</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <form action="excluirtitulo" method="post">
                            <div class="modal-body">
                                <input class="form-control" type="text" name="senhaConfirm" id="senhaConfirm">
                                <input type="hidden" name="tituloId" id="tituloId">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Confirmar</button>
                                <button type="button" class="btn btn-danger" >Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            <script>
                function filtrodisable(){
                    if($('#texto').val() != "" && $('#texto').val() != " " && $('#texto').val() != null){
                        $('#periodo').attr('disabled', true);
                    } else {
                        $('#periodo').attr('disabled', false);
                    }
                }
            </script>
            
            <script>
                
                <?php if(isset($senhaErro)){?>
                    alert("Senha incorreta!");
                <?php } ?>
                
            </script>            
            
            <script>
                $(document).ready(function(){
                    filtrodisable();
                    
                    $('input[name="periodo"]').daterangepicker({
                      "locale": {
                        "format": "DD/MM/YYYY",
                        "separator": " - ",
                        "applyLabel": "Aplicar",
                        "cancelLabel": "Cancelar",
                        "daysOfWeek": [
                          "Dom",
                          "Seg",
                          "Ter",
                          "Qua",
                          "Qui",
                          "Sex",
                          "Sab"
                        ],
                        "monthNames": [
                          "Janeiro",	
                          "Fevereiro",
                          "Março",
                          "Abril",
                          "Maio",
                          "Junho",
                          "Julho",
                          "Agosto",
                          "Setembro",
                          "Outubro",
                          "Novembro",
                          "Dezembro"
                        ],
                        "firstDay": 1
                      }
                    });
                    
                    <?php if($filtro['tipo']){ ?>
                        $('#tipo').val('<?php echo $filtro['tipo'] ?>').change();
                    <?php } ?>
                    <?php if($filtro['forneclin']){ ?>
                        $('#forneclin').val('<?php echo $filtro['forneclin'] ?>').change();
                    <?php } ?>
                    
                    $('.select2-modal').select2({theme: "bootstrap", dropdownParent: $('#notaModal')});
                    
                    $('.select2-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalFiltro')});
                    $('.selectcadastrotitulo-filtro').select2({theme: "bootstrap", dropdownParent: $('#completaModal')});
                    $('.selectlancatitulo-filtro').select2({theme: "bootstrap", dropdownParent: $('#lancatituloModalCenter')});
                    $('.selecteditarlancatitulo-filtro').select2({theme: "bootstrap", dropdownParent: $('#modaleditar')});
                    $('.select2-multi').select2({theme: "bootstrap", dropdownParent: $('#modalMulti')});
                    $('.sel-dre-mes').select2({theme: "bootstrap", dropdownParent: $('#modalDre')});
                    $('.select2-forma').select2({theme: "bootstrap", dropdownParent: $('#baixaModalCenter')});
                    
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('.cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('.select2-custom').select2({theme: "bootstrap"});
                    $('.number').mask("0#");
                    $('.valor').mask("#.##0,0000", {reverse: true});
                    $('.cnpj').val().length > 11 ? $('.cnpj').mask('00.000.000/0000-00', cpfoptions) : $('.cnpj').mask('000.000.000-00#', cpfoptions);
                    $('.cep').mask("00000-000");
                    $('.decimal').mask("#0.0000", {reverse: true});
                    
                    
                    <?php if(isset($data)){ ?>
                        table.search("<?php echo str_replace("_", "/", $data);?>").draw();
                    <?php }?>
                    
                    <?php if($this->session->userdata('id_financeiro')){
                        $id = $this->session->userdata('id_financeiro');
                        $baixa = 0;
                        if($this->session->userdata('baixa_financeiro')){
                            $baixa = $this->session->userdata('baixa_financeiro');
                            $this->session->unset_userdata('baixa_financeiro');
                        }
                        $this->session->unset_userdata('id_financeiro');
                        if($baixa == 1){
                            echo "verFechado(".$id.")";
                        }else{
                            echo "verAberto(".$id.")";
                        }
                    } ?>
                    
                    <?php if($this->session->userdata('err_titulo')){
                        $err = $this->session->userdata('err_titulo');
                        $this->session->unset_userdata('err_titulo');
                        echo "alertErr(".$err.")";
                    } ?>
                    
                    <?php if($this->session->userdata('edit_titulo')){
                        $this->session->unset_userdata('edit_titulo');
                        echo "
                        Swal.fire(
                            '',
                            'Título editado com sucesso!',
                            'success'
                        )
                        ";
                    } ?>
                });
                
                function alertErr(err){
                    if(err == 1){
                        Swal.fire(
                            'Erro',
                            'Não foi possivel reabrir o título pois a senha inserida estava incorreta!',
                            'error'
                        )
                    }else if(err == 2){
                        Swal.fire(
                            '',
                            'Título reaberto com sucesso!',
                            'success'
                        )
                    }
                }
            </script>
            
            <script>
                function mostraAtraso(){
                    Swal.fire(
                        'O que são esses títulos destacados em azul?',
                        'Estes itens em azul são os títulos que possuem um atraso com relação a data de vencimento',
                        'info'
                    )
                }
            </script>
            
            <script>
                function verFechado(id){
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('financeiro/pegaFechada'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('verFechado(id): Erro, verifique o console');
                            console.log('verFechado(id): '+xhr.responseText);
                        },
                        success: function(data) {
                            ttl = jQuery.parseJSON(data);
                            
                            var aux_data = ttl.vencimento.split('-');
                            var data_vencimento = aux_data[2] + '/' + aux_data[1] + '/' + aux_data[0];
                            
                            $('#num_ver').val(ttl.numero);
                            $('#tipo_ver').val(ttl.tipo);
                            $('#forncli_ver').val(ttl.fornecliente);
                            $('#frota_ver').val(ttl.frota);
                            $('#vencimento_ver').val(data_vencimento);
                            $('#juros_ver').val(ttl.juros+'%');
                            $('#multa_ver').val(ttl.multa+'%');
                            $('#desconto_ver').val(ttl.desconto+'%');
                            $('#databaixa_ver').val(ttl.data_baixa);
                            $('#pago_ver').val(ttl.valor_pago);
                            $('#forma_ver').val(ttl.forma);
                            $('#responsavel_ver').val(ttl.responsavel);
                            $('#observacao_ver').html(ttl.observacao);
                            $('#movi_ver').val(ttl.tipo_movimento);
                            $('#pdf_fechado').prop('href', '<?php echo base_url('relatoriotitulo/') ?>'+ttl.id);
                            
                            if(ttl.hidden_tipo == "20" || ttl.hidden_tipo == 20){
                                $('#ver_pai').css('display', 'block').prop('href', '<?php echo base_url('vertitulo/') ?>'+id);
                            }else{
                                $('#ver_pai').css('display', 'none').prop('href', '#');
                            }
                            
                            $('#modalfechado').modal('show');
                        },
                    });
                }
            </script>
            
            <script>
                function reabrir(id){
                    $('#id_reabrir').val(id);
                    $('#reabrirT').modal('show');
                }
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                function e_senha(){
                    $('#formsenha').css('display', 'none');
                    $('#senha').val("");
                    $('#senha').prop('type', 'password');
                    $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                }
                $('#reabrirT').on('hidden.bs.modal', function(){
                    e_senha();
                });
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

          
            