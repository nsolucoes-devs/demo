        
            <style>
                .tableFixHead          { overflow-y: auto; }
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
                                <a href="<?php echo base_url('clientes') ?>" class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px" id="aCli"><b>CLIENTE</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('cliente/listagemABC') ?>" class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aCliAbc"><b>CLIENTE ABC</b></a>
                            </li>
                        </ul>
                        
                        <div class="row white-tab" id="divCli" style="display: block;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px; margin-top: 1%">
                        
                                <?php if($this->session->userdata('editar') == 1 ){?>
                                <a href="<?php echo base_url('cadastrarcliente'); ?>" class="btn btn-primary" style="color: white">Novo Cliente</a>&nbsp;&nbsp;
                                <a class="btn btn-primary" href="<?php echo base_url('clienterelatoriogeral') ?>" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                <?php }?>
                                <?php if($this->session->userdata('ativar') == 1){ ?>
                                <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                                <?php } ?>
                                
                                <div id="divfiltro" class="row" style="margin-left: calc(100% - 250px);">
                                    <label style="position: relative; right: 20%; top: 32px; font-size: 14px;">Procurar:</label>
                                    <form action="<?php echo base_url('clientes') ?>" method="post">
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
                                    <table id="myTableCliente" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th width="17%" style="text-align: center; vertical-align: middle;">CPF</th>
                                                <th width="46%" style="text-align: center; vertical-align: middle;">Nome</th>
                                                <th width="10%" style="text-align: center; vertical-align: middle;">Cidade</th>
                                                <th width="5%"  style="text-align: center; vertical-align: middle;">Estado</th>
                                                <th width="22%" style="text-align: center; vertical-align: middle;">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($clientes as $cliente){?>
                                            <?php if($this->session->userdata('ativar') == 1 ){?> 
                                             <tr <?php if($cliente['cliente_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                                                <td style="vertical-align: middle;">
                                                    <?php 
                                                    $tam = strlen($cliente['cliente_cpfcnpj']);
                                                    if($tam == 11){
                                                        $cpfcnpj = substr($cliente['cliente_cpfcnpj'], 0, 3).".".substr($cliente['cliente_cpfcnpj'], 3, 3).".".substr($cliente['cliente_cpfcnpj'], 6, 3)."-".substr($cliente['cliente_cpfcnpj'], 9); 
                                                    }else{
                                                        $cpfcnpj = substr($cliente['cliente_cpfcnpj'], 0, 2).".".substr($cliente['cliente_cpfcnpj'], 2, 3).".".substr($cliente['cliente_cpfcnpj'], 5, 3)."/".substr($cliente['cliente_cpfcnpj'], 8, 4)."-".substr($cliente['cliente_cpfcnpj'], 12);
                                                    }
                                                    echo $cpfcnpj;
                                                    ?>
                                                </td>
                                                <td style="vertical-align: middle;"> 
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($cliente['cliente_nome']));?>">
                                                        <?php echo ucwords(strtolower($cliente['cliente_nome'])) ?>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($cliente['cliente_cidade']));?>">
                                                        <?php echo ucwords(strtolower($cliente['cliente_cidade'])) ?>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $cliente['cliente_estado'] ?></td>
                                                <?php if($cliente['cliente_ativo_id'] != 2){ ?>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <?php if($this->session->userdata('ver') == 1 ){?>
                                                        <a style="font-size: 12px" href="<?php echo base_url('mostrarcliente/').$cliente['cliente_cpfcnpj'];?>" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
                                                        <?php } ?>
                                                        <?php if($this->session->userdata('editar') == 1 ){?>
                                                        <a style="font-size: 12px" href="<?php echo base_url('editarcliente/') . $cliente['cliente_cpfcnpj'];?>" class="btn btn-primary" ><i class="fas fa-pencil-alt"></i></a>
                                                        <?php if($cliente['cliente_ativo_id'] != 2){ ?>
                                                        <a data-toggle="modal" data-target="#modalVincular" style="font-size: 12px" class="btn btn-primary" onclick="setaVinculo('<?php echo $cliente['cliente_cpfcnpj'] ?>')"><em class="fa fa-link"></em></a>
                                                        <?php } ?>
                                                        <?php if($this->session->userdata('excluir') == 1 ){?>
                                                        <a data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir('<?php echo $cliente['cliente_cpfcnpj'] ?>')"><i class="fas fa-trash"></i></a>
                                                        <?php } } ?>
                                                    </td>
                                                <?php } else if($cliente['cliente_ativo_id'] == 2) { ?>
                                                    <td style="text-align: center; vertical-align: middle;">
                                                        <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $cliente['cliente_cpfcnpj'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                            <?php } else if($cliente['cliente_ativo_id'] == 1 && $this->session->userdata('ver') == 1 ) { ?>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <?php 
                                                    $tam = strlen($cliente['cliente_cpfcnpj']);
                                                    if($tam == 11){
                                                        $cpfcnpj = substr($cliente['cliente_cpfcnpj'], 0, 3).".".substr($cliente['cliente_cpfcnpj'], 3, 3).".".substr($cliente['cliente_cpfcnpj'], 6, 3)."-".substr($cliente['cliente_cpfcnpj'], 9); 
                                                    }else{
                                                        $cpfcnpj = substr($cliente['cliente_cpfcnpj'], 0, 2).".".substr($cliente['cliente_cpfcnpj'], 2, 3).".".substr($cliente['cliente_cpfcnpj'], 5, 3)."/".substr($cliente['cliente_cpfcnpj'], 8, 4)."-".substr($cliente['cliente_cpfcnpj'], 12);
                                                    }
                                                    echo $cpfcnpj;
                                                    ?>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <?php
                                                    $tam = strlen($cliente['cliente_cpfcnpj']);
                                                    if($tam == 11){
                                                        $nome = $cliente['cliente_nome'];
                                                    }else{
                                                        $nome = $cliente['cliente_fantasia'];
                                                    }
                                                    echo mb_strtoupper($nome);
                                                    ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $cliente['cliente_cidade'] ?></td>
                                                <td style="vertical-align: middle;"><?php echo $cliente['cliente_estado'] ?></td>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <?php if($this->session->userdata('ver') == 1 ){?>
                                                    <a style="font-size: 12px" href="<?php echo base_url('mostrarcliente/').$cliente['cliente_cpfcnpj'];?>" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('editar') == 1 ){?>
                                                    <a style="font-size: 12px" href="<?php echo base_url('editarcliente/') . $cliente['cliente_cpfcnpj'];?>" class="btn btn-primary" ><i class="fas fa-pencil-alt"></i></a>
                                                    <?php if($cliente['cliente_ativo_id'] != 2){ ?>
                                                    <a data-toggle="modal" data-target="#modalVincular" style="font-size: 12px" class="btn btn-primary" onclick="setaVinculo('<?php echo $cliente['cliente_cpfcnpj'] ?>')"><em class="fa fa-link"></em></a>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('excluir') == 1 ){?>
                                                    <a data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir('<?php echo $cliente['cliente_cpfcnpj'] ?>')"><i class="fas fa-trash"></i></a>
                                                    
                                                    <?php } } ?>
                                                </td>
                                            </tr>
                                            <?php } } ?>
                                        </tbody>
                                    </table>
                                    
                                    <?php if($clientes == null){ ?>
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
            
            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o cliente?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('cliente/deleteCliente') ?>" method="post">
                                        <input type="hidden" name="cpfcli" id="cpfcli">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ModalReativar -->
            <div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="modalAtivarTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja reativar o cliente?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('cliente/ativarCliente') ?>" method="post">
                                        <input type="hidden" name="cliente_idatv" id="cliente_idatv">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha_a" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn_a"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ModalCliente -->
            <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalCliente" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row">
                                <div class="col-md-11">
                                    <h5 class="modal-title">Dados do Cliente</h5>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body" style="background-color: #eaeaea; padding-bottom: 0px">
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eaeaea">
                                <li class="nav-item">
                                    <a class="nav-link" style="background-color: white; cursor: pointer" id="aDados" onclick="change(1)">Dados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="cursor: pointer" id="aEnd" onclick="change(2)">Endereço</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="cursor: pointer" id="aDoc" onclick="change(3)">Documentos</a>
                                </li>
                            </ul>
                            <div class="row" id="divDados" style="display: block;">
                                <div class="col-md-12" style="background-color: white">
                                    <br>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label>Nome: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-nome" name="text-nome">Nome Completo</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label>CPF: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-cpf">XXX.XXX.XXX-XX</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>RG: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-rg">XX XXX XXX-X</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label>Telefone Fixo: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-fixo">(XX) XXXX-XXXX</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-6">
                                            <label>Celular 1: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-cel1">(XX) XXXXX-XXXX</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Celular 2: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-cel2">(XX) XXXXX-XXXX</label>
                                        </div>
                                    </div>
                                    
                                    <br>
                                </div>
                            </div>
                            <div class="row" id="divEnd" style="display: none">
                                <div class="col-md-12" style="background-color: white">
                                    <br>
            
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label>Endereco: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-endereco">Rua X, nº X</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label>Bairro: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-bairro">X</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Cidade: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-cidade">X</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Estado: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-estado">XX</label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label>CEP: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-cep">XXXXX-XXX</label>
                                        </div>
                                    </div>
            
                                    <br>
                                </div>
                            </div>
                            <div class="row" id="divDoc" style="display: none">
                                <div class="col-md-12" style="background-color: white">
                                    <br>
            
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label style="color: black; font-size: 16px">&nbsp;&nbsp;RG:</label><br>
                                            <a id="text-doc-rg-link" target="_blank" href="#"><img id="text-doc-rg" style="max-width: 200px;  max-height: 100px;"/></a>
                                        </div>
                                        <div class="col-md-4">
                                            <label style="color: black; font-size: 16px">&nbsp;&nbsp;CPF:</label><br>
                                            <a id="text-doc-cpf-link" target="_blank" href="#"><img id="text-doc-cpf" style="max-width: 200px;  max-height: 100px;"/></a>
                                        </div>
                                        <div class="col-md-4">
                                            <label style="color: black; font-size: 16px">&nbsp;&nbsp;Habilitação:</label><br>
                                            <a id="text-doc-hab-link" target="_blank" href="#"><img id="text-doc-hab" style="max-width: 200px;  max-height: 100px;"/></a>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalVincular" tabindex="-1" role="dialog" aria-labelledby="modalVincular" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c" style="margin-bottom: 0px">
                                <div class="col-md-11">
                                    <h5 class="modal-title">Vincular Veículo</h5>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('cliente/vincular') ?>" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Selecione o Veículo a ser vinculado</label><br>
                                        <input type="hidden" name="vinculo_id" id="vinculo_id">
                                        <select class="select2-teste" name="vinculo_veic" id="vinculo_veic" style="width: 100%!important" required>
                                            <option disabled selected>-- Selecione um Veículo --</option>
                                            <?php foreach($veiculos as $veic){
                                                $frota = "";
                                                if($veic['frota_placa'] != ""){
                                                    $frota = $veic['frota_codigo'] . " | " . $veic['frota_placa'];
                                                }else{
                                                    $frota = $veic['frota_codigo'];
                                                }
                                                echo "<option value='".$veic['frota_id']."'>".$frota."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px; color: white;">Fechar</button>
                                <button type="submit" class="btn btn-primary">&nbsp&nbspVincular&nbsp&nbsp</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                    $('.select2-teste').select2({theme: "bootstrap", dropdownParent: $('#modalVincular')});
                    
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Cliente excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possivel excluir o cliente pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        } else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Cliente Reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar o cliente pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
                });
            </script>
            
            <script>
                function setaExcluir(cpf){
                    document.getElementById('cpfcli').value = cpf;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('cliente_idatv').value = id;
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
            </script>
            
            <script>
                function change(value){
                    if(value == 1){
                        document.getElementById('aDados').style = "background-color: white; cursor: pointer";
                        document.getElementById('aEnd').style = "background-color: #eaeaea; cursor: pointer";
                        document.getElementById('aDoc').style = "background-color: #eaeaea; cursor: pointer";
                        
                        document.getElementById('divDados').style.display = "block";
                        document.getElementById('divEnd').style.display = "none";
                        document.getElementById('divDoc').style.display = "none";
                    }else if(value == 2){
                        document.getElementById('aEnd').style = "background-color: white; cursor: pointer";
                        document.getElementById('aDados').style = "background-color: #eaeaea; cursor: pointer";
                        document.getElementById('aDoc').style = "background-color: #eaeaea; cursor: pointer";
                        
                        document.getElementById('divEnd').style.display = "block";
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDoc').style.display = "none";
                    }else{
                        document.getElementById('aDoc').style = "background-color: white; cursor: pointer";
                        document.getElementById('aDados').style = "background-color: #eaeaea; cursor: pointer";
                        document.getElementById('aEnd').style = "background-color: #eaeaea; cursor: pointer";
                        
                        document.getElementById('divDoc').style.display = "block";
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divEnd').style.display = "none";
                    }
                }
            </script>
            
            <script>
                $('#senha_btn').on('click', function(){
                    const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
                $('#senha_btn_a').on('click', function(){
                    const type = $('#senha_a').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha_a').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn_a').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn_a').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            
            <script>
                function setaVinculo(id){
                    $('#vinculo_id').val(id);
                }
            </script>
            
            <script>
            
                $("#card").flip();
                
                function change(value){
                    if(value == 1){
                        document.getElementById('aCli').style.backgroundColor = "white";
                        document.getElementById('aCliAbc').style.backgroundColor = "#eee";
                        
                        document.getElementById('divCli').style.display = "block";
                        document.getElementById('divCliAbc').style.display = "none";
                    }else if(value == 2){
                        document.getElementById('aCli').style.backgroundColor = "#eee";
                        document.getElementById('aCliAbc').style.backgroundColor = "white";
                        
                        document.getElementById('divCli').style.display = "none";
                        document.getElementById('divCliAbc').style.display = "block";
                    }
                }
            </script>
            
            