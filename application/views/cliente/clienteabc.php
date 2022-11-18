<style>
                .tableFixHead          { height: auto; }
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
                    margin-bottom: 15px;
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
                .white-tab{
                    background-color: white;
                    border-radius: 5px;
                }
                .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
                    background-color: #eee;
                }
                .nav.nav-tabs{
                    border-bottom: 0;
                }
                .nav-link{
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                    color: #033557;
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
                
                .encurtar{
                    display: -webkit-box;
                    overflow: hidden;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    word-break: break-word;
                    line-height: 11px!important;
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
                                <a href="<?php echo base_url('clientes') ?>" class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px"><b>CLIENTE</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('cliente/listagemABC') ?>" class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px"><b>CLIENTE ABC</b></a>
                            </li>
                        </ul>
                        
                        <div class="row white-tab" id="divCliAbc">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                
                                <div class="row" style="margin-top: 1%">
                                    <div class="col-md-12">
                                        <?php if($this->session->userdata('editar') == 1 ){ ?>
                                            <a class="btn btn-primary" href="<?php echo base_url('relatorioclienteabc') ?>" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                        <?php } ?>
                                    </div>
                                </div>
                                
                                <div id="divfiltro" class="row" style="margin-left: calc(100% - 250px);">
                                    <label style="position: relative; right: 20%; top: 32px; font-size: 14px;">Procurar:</label>
                                    <form action="<?php echo base_url('cliente/listagemABC') ?>" method="post">
                                        <div class="col-md-12 text-right">
                                            <div id="campo-filtro" class="input-group mb-3" style="width: 120%; margin-left: auto; margin-bottom: 2%">
                                                <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Digite sua busca" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php if(isset($filtro)){ echo $filtro; } ?>">
                                                  <div class="input-group-append" style="cursor: pointer;position: absolute;right: 0px;height: 100%;z-index: 2;">
                                                    <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                                                  </div>
                                            </div>
                                         </div> 
                                    </form>
                                 </div>
                                
                                <div class="tableFixHead">
                                <table id="myTableClienteabc" class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="17%" style="text-align: center; vertical-align: middle;">CPF</th>
                                            <th width="46%" style="text-align: center; vertical-align: middle;">Nome</th>
                                            <th width="10%" style="text-align: center; vertical-align: middle;">Cidade</th>
                                            <th width="5%"  style="text-align: center; vertical-align: middle;">Estado</th>
                                            <th width="22%" style="text-align: center; vertical-align: middle;">Total Compra</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($clienteabc as $c) { ?>
                                            <tr>
                                                <td><?php echo $c['cpf']    ?></td>
                                                <td style="vertical-align: middle;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($c['nome']));?>">
                                                        <?php echo ucwords(strtolower($c['nome']))?>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($c['cidade']));?>">
                                                        <?php echo ucwords(strtolower($c['cidade'])) ?>
                                                    </div>
                                                </td>
                                                <td><?php echo $c['estado'] ?></td>
                                                <td>R$ <?php echo number_format($c['total'], 4 , ',' , '.');  ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                
                                <?php if($clienteabc == null){ ?>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <p> Nenhum cliente encontrado.</p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div> 
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> clientes encontrados</b></p>
                                    <?php if($pag_links){ ?>
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