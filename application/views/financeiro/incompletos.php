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
                            <li class="nav-item">
                                <a href="<?php echo base_url('financeiro/incompletos') ?>" class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px;"><b>TÍTULOS INCOMPLETOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('movimentosfinanceiro') ?>" class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;"><b>TÍTULOS ABERTOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('financeiro/baixados') ?>" class="nav-link change-tab-btn" style="background-color: #eee; cursor: pointer; font-size: 18px;"><b>TÍTULOS BAIXADOS</b></a>
                            </li>
                        </ul>

                        <div class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                <br>
                                <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> títulos incompletos encontrados</b></p>
                                <div id="divfiltro" class="row" style="margin-left: 73%;">
                                    <form action="<?php echo base_url('financeiro/incompletos') ?>" method="post">
                                        <div class="col-md-12 text-right">
                                            <div id="campo-filtro" class="input-group mb-3" style="width: 120%; margin-left: auto; margin-bottom: 2%">
                                                <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Filtro" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php if(isset($filtro)){ echo $filtro; } ?>">
                                                  <div class="input-group-append" style="cursor: pointer;position: absolute;right: 0px;height: 100%;z-index: 2;">
                                                    <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                                                  </div>
                                            </div>
                                         </div> 
                                    </form>
                                 </div>
                                
                                <div class="tableFixHead">
                                    <table id="myTablePendencias" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="display: none">ID</th>
                                                <th>Nº/Série</th>
                                                <th>Tipo</th>
                                                <th>Valor</th>
                                                <th>À Pagar</th>
                					            <th style="width: 48px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if($pendencias != null){ foreach($pendencias as $ttl){ ?>    
                                            <tr>
                                                <td style="display: none"><?php echo $ttl['titulos_id'] ?></td>
                                                <td><?php echo $ttl['titulos_numeroserie'];?></td>
                                                <td><?php echo $ttl['titulos_tipo'];?></td>
                                                <td><?php echo $ttl['titulos_valor'];?></td>
                                                <td><?php echo $ttl['titulos_apagar'];?></td>
                                                <td class="text-center">
                                                    <?php if($this->session->userdata('editar')) { ?>
                                                    <button type="button" class="btn btn-primary" onclick="completar(<?php echo $ttl['titulos_id'] ?>)"><em class="fa fa-pen"></em></button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } } ?>    
                                        </tbody>
                                    </table>
                                    <?php if($pendencias == null){ ?>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p> Nenhum título incompleto encontrado.</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br>
                                        <p class="pagination-links"><?php echo $pag_links; ?></p>
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
            
            <!-- MODAL DE LANAÇMENTO DE NOTA FISCAL -->
            <div class="modal fade" id="notaModal" tabindex="-1" role="dialog" aria-labelledby="notaModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="width: 80%;max-width: 100%; margin: 3% 0 0 11%;">
                    <div class="modal-content">
                        <form action="<?php echo base_url('estoque/notafiscal');?>" method="post" id="form_lanca">
                            <div class="modal-header">
                                <h3 class="modal-title" id="notaModalLabel">Cadastro de Nota Fiscal</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="ds" value="">
                                <input type="hidden" id="dp" value="">
                  
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link" id="nav-dados-tab" data-toggle="tab" href="#nav-dados" role="tab" aria-controls="nav-dados" aria-selected="false"><b>DADOS</b></a>
                                        <a class="nav-item nav-link" id="nav-itens-tab" data-toggle="tab" href="#nav-itens" role="tab" aria-controls="nav-itens" aria-selected="false" style="display: none"><b>ITENS</b></a>
                                        <a class="nav-item nav-link" id="nav-servs-tab" data-toggle="tab" href="#nav-servs" role="tab" aria-controls="nav-servs" aria-selected="false" style="display: none"><b>ITENS</b></a>
                                    </div>
                                </nav>
                                
                                <hr>
                                
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade active in" id="nav-dados" role="tabpanel" aria-labelledby="nav-dados-tab">
                                        <div class="col-md-12">
                                            <div class="col-md-12 form-group">
                                                <h2>N° Movimento <?php echo $nota;?></h2>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12 form-group">
                                                <label>Chave de Acesso: </label>
                                                <input class="form-control" id="chave" name="chave" value="<?php echo $chave;?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Natureza da Operação: </label>
                                                <div class="sel-with-add">
                                                    <select style="width: 100%!important" class="select2-modal" id="operacao" name="operacao" onchange="checkNota($(this).val())" required>
                                                        <option value="" selected disabled>Selecione a Natureza da Operação</option>
                                                    <?php foreach($operacoes as $ope){ if($ope['tm_id'] > 0){?>
                                                        <option value="<?php echo $ope['tm_id'];?>"><?php echo $ope['tm_nome'];?></option>
                                                    <?php }}?>
                                                    </select>
                                                </div>
                                                <div class="add-din">
                                                    <input type="hidden" id="tipo_anchor" value="">
                                                    <button type="button" class="btn btn-primary" onclick="dynamicTipo('notaModal')"><em class="fa fa-plus"></em></button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Fornecedor/Cliente: </label>
                                                <div class="sel-with-add">
                                                    <select style="width: 100%!important" class="select2-modal" id="fornecedor" name="fornecedor" required>
                                                        <option value="" selected disabled>Selecione o Fornecedor/Cliente</option>
                                                        <?php foreach($forcli as $fcs){?>
                                                        <option value="<?php echo $fcs['id'];?>"><?php echo $fcs['nome'];?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="add-din">
                                                    <button type="button" class="btn btn-primary" onclick="dynamicFC('notaModal')"><em class="fa fa-plus"></em></button>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div id="dados_nota" style="display: none">
                
                                            <div class="col-md-12 form-group">
                                                <div class="col-md-3">
                                                    <label>Número: </label>
                                                    <input class="form-control" type="text" placeholder="Número" id="numero" name="numero">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Série: </label>
                                                    <input class="form-control" type="text" placeholder="Série" id="serie" name="serie">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Páginas: </label>
                                                    <input class="form-control" type="text" placeholder="Páginas" id="folhas" name="folhas">
                                                </div>
                                                <div class="col-md-3">
                                                <label>Espécie: </label>
                                                <select  style="width: 100%!important" class="select2-modal" id="especie" name="especie" >
                                                    <option value="NOTA FISCAL">NOTA FISCAL</option>
                                                    <option value="NOTA DE SERVIÇO">NOTA DE SERVIÇO</option>
                                                    <option value="CUPOM FISCAL">CUPOM FISCAL</option>
                                                    <option value="RECIBO">RECIBO</option>
                                                </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 form-group">
                                                <div class="col-md-4">
                                                    <label>Data de Emissão: </label>
                                                    <input class="form-control" type="date" id="dtemissao" name="dtemissao" value="<?php echo date('Y-m-d');?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Data de Saída: </label>
                                                    <input class="form-control" type="date" id="dtsaida" name="dtsaida" value="<?php echo date('Y-m-d');?>">
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Hora de Saída: </label>
                                                    <input class="form-control" data-mask="00:00:00" type="text" id="hsaida" name="hsaida"  value="<?php echo date('H:m:s');?>" >
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 form-group">
                                                <div class="col-md-3">
                                                    <label>Transportadora: </label>
                                                    <input class="form-control" type="text" placeholder="Nome" id="nometrans" name="nometrans">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>CNPJ Transportador: </label>
                                                    <input class="form-control cnpj" type="text" data-mask="00.000.000/0000-00" placeholder="00.000.000/0000-00" id="cnpjtrans" name="cnpjtrans">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Placa do Veículo: </label>
                                                    <input class="form-control" type="text" placeholder="Placa" id="placa_veic" name="placa_veic">
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Valor Frete: </label>
                                                    <input class="form-control valor" type="text" placeholder="0" id="vlrfrete" name="vlrfrete">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12 form-group">
                                                
                                                <div class="col-md-4">
                                                    <p style="height: 30px; text-align: right; margin-top: 10px;"><label>Base de Cálculo do ICMS: </label></p>
                                                    <p style="height: 30px; text-align: right; margin-top: 10px;"><label>Valor do ICMS: </label></p>
                                                    <p style="height: 30px; text-align: right; margin-top: 10px;"><label>Valor do IPI: </label></p>
                                                </div>
                                                <div class="col-md-2">    
                                                    <p><input class="form-control mascara valor" type="text" placeholder="R$" id="bc_icms" name="bc_icms"></p>
                                                    <p><input class="form-control mascara valor" type="text" placeholder="R$" id="valor_icms" name="valor_icms"></p>
                                                    <p><input class="form-control mascara valor" type="text" placeholder="R$" id="valor_ipi" name="valor_ipi"></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <p style="height: 30px; text-align: right; margin-top: 10px;"><label>Base de Cálculo do ICMS Subst: </label></p>
                                                    <p style="height: 30px; text-align: right; margin-top: 10px;"><label>Valor do ICMS Subst: </label></p>
                                                </div>
                                                <div class="col-md-2">
                                                    <p><input class="form-control mascara valor" type="text" placeholder="R$" id="bc_icms_sub" name="bc_icms_sub"></p>
                                                    <p><input class="form-control mascara valor" type="text" placeholder="R$" id="valor_icms_sub" name="valor_icms_sub"></p>
                                                </div>
                                                
                                            </div>
                
                                        </div>
                
                                    </div>
                                    
                                    <div class="tab-pane fade" id="nav-itens" role="tabpanel" aria-labelledby="nav-itens-tab" style="max-height: 60vh; overflow: auto">
                                        <div class="col-md-12">
                                            <div class="col-md-12 form-group">
                                                <a href="javascript:add_prod()"><button type="button" class="btn btn-primary btn-sm"><em class="fa fa-plus" aria-hidden="true"></em>&nbsp;&nbsp;Adicionar Item na Nota</button></a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary btn-sm" onclick="dynamicPeca('notaModal')"><em class="fa fa-plus" aria-hidden="true"></em>&nbsp;&nbsp;Cadastrar Novo Item</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <div class="col-md-8">
                                                    <label>Produto</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Quantidade</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Valor Unitário</label>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-12" id="newproduto">
                                            <div>
                                                <div class="col-md-8 form-group">
                                                    <select class="select2-modal" name="produto[0]" id="sel_0"  style="width: 100%!important" onchange="pegaValor($(this).val(), $(this).prop('id'))">
                                                        <option selected disabled value="">-- Selecionar --</option>
                                                        <?php foreach($produtos as $pdt){ ?>
                                                        <option value="<?php echo $pdt['produto_id'];?>"> <?php echo $pdt['produto_nome']." | ".$pdt['produto_modelo'];?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" class="form-control" name="quantia[0]" id="qtd_0" placeholder="0">
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" class="form-control valor" name="valor[0]" id="vlr_0" placeholder="R$ 0,0000">
                                                </div>
                                            </div>
                                        </div>
                
                                        <!-- Padrão. esta será a informação inserida acima -->
                                        <div id="newlinkproduto" style="display:none" class="col-md-3">
                                            <div class="col-md-8 form-group">
                                                <select class="dynamic-select" name="produto[]"  style="width: 100%!important" onchange="pegaValor($(this).val(), $(this).prop('id'))">
                                                    <option selected disabled value="">-- Selecionar --</option>
                                                    <?php foreach($produtos as $pdt){ ?>
                                                    <option value="<?php echo $pdt['produto_id'];?>"> <?php echo $pdt['produto_nome']." | ".$pdt['produto_modelo'];?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <input type="text" class="form-control" name="quantia[]" placeholder="0">
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <input type="text" class="form-control" name="valor[]" placeholder="R$ 0,0000">
                                            </div>
                                        </div>
                                            
                							        
                                    </div>
                                    
                                    <div class="tab-pane fade" id="nav-servs" role="tabpanel" aria-labelledby="nav-servs-tab" style="max-height: 60vh; overflow: auto">
                                        <div class="col-md-12">
                                            <div class="col-md-12 form-group">
                                                <a href="javascript:add_serv()"><button type="button" class="btn btn-primary btn-sm"><em class="fa fa-plus" aria-hidden="true"></em>&nbsp;Adicionar Novo Item</button></a>
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn btn-primary btn-sm" onclick="dynamicServ()"><em class="fa fa-plus" aria-hidden="true"></em>&nbsp;&nbsp;Cadastrar Novo Item</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div>
                                                <div class="col-md-8">
                                                    <label>Serviço</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Quantidade</label>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Valor Unitário</label>
                                                </div>
                                            </div>  
                                        </div>
                                        <div class="col-md-12" id="newservico">
                                            <div>
                                                <div class="col-md-8 form-group">
                                                    <select class="select2-modal" name="servico[0]" id="serv_0"  style="width: 100%!important" onchange="pegaValorServ($(this).val(), $(this).prop('id'))">
                                                        <option selected disabled value="">-- Selecionar --</option>
                                                        <?php foreach($servicos as $serv){ ?>
                                                        <option value="<?php echo $serv['servico_id'];?>"> <?php echo $serv['servico_nome'] ;?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" class="form-control number" name="quantiaServ[0]" id="qtdServ_0" placeholder="0">
                                                </div>
                                                <div class="col-md-2 form-group">
                                                    <input type="text" class="form-control valor" name="valorServ[0]" id="vlrServ_0" placeholder="R$ 0,0000">
                                                </div>
                                            </div>
                                        </div>
                
                                        <!-- Padrão. esta será a informação inserida acima -->
                                        <div id="newlinkservico" style="display:none" class="col-md-3">
                                            <div class="col-md-8 form-group">
                                                <select class="dynamic-select" name="servico[]"  style="width: 100%!important" onchange="pegaValorServ($(this).val(), $(this).prop('id'))">
                                                    <option selected disabled value="">-- Selecionar --</option>
                                                    <?php foreach($servicos as $serv){ ?>
                                                    <option value="<?php echo $serv['servico_id'];?>"> <?php echo $serv['servico_nome'] ;?> </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <input type="text" class="form-control" name="quantiaServ[]" placeholder="0">
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <input type="text" class="form-control" name="valorServ[]" placeholder="R$ 0,0000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                            
                            <input type="hidden" id="ctE" name="ctE" value="0">
                            <input type="hidden" id="ctD" name="ctD" value="0">
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="lancatituloModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-nota" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"><h2>Lançar Boleto</h2></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link" id="nav-titulo-tab" data-toggle="tab" href="#nav-titulo" role="tab" aria-controls="nav-titulo" aria-selected="false"><b>DADOS</b></a>
                                    <a class="nav-item nav-link" id="nav-frota-tab" data-toggle="tab" href="#nav-frota" role="tab" aria-controls="nav-frota" aria-selected="false"><b>FROTA</b></a>
                                </div>
                            </nav>
                                
                            <hr>
                            
                            <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade active in" id="nav-titulo" role="tabpanel" aria-labelledby="nav-titulo-tab">
                            
                                        <form action="<?php echo base_url('financeiro/lancatitulo');?>" method="post">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label>Tipo</label><br>
                                            <div class="sel-with-add">
                                                <select  style="width: 100%!important" id="tipo_lanca" name="tipo" class="form-control selectlancatitulo-filtro" required>
                                                    <option selected disabled value="">-- Selecione tipo de Conta --</option>
                                                    <?php foreach($contas as $cnt){?>
                                                    <option value="<?php echo $cnt['tm_id'];?>"><?php echo $cnt['tm_nome'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="add-din">
                                                <button type="button" class="btn btn-primary" onclick="dynamicTipo('lancatituloModalCenter')"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Fornecedor/Cliente</label><br>
                                            <div class="sel-with-add">
                                                <select  style="width: 100%!important" id="forneclin_lanca" name="forneclin"class="form-control selectlancatitulo-filtro" required>
                                                    <option selected disabled value="">-- Fornecedor/Cliente --</option>
                                                    <?php foreach($forcli as $fcs){?>
                                                    <option value="<?php echo $fcs['id'];?>"><?php echo $fcs['nome'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="add-din">
                                                <button type="button" class="btn btn-primary" onclick="dynamicFC('lancatituloModalCenter')"><em class="fa fa-plus"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 5px; margin-bottom: 5px">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Vencimento</label>
                                            <input type="date" id="vencimento" name="vencimento" class="form-control" value="<?php echo date('Y-m-d') ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Identificação</label>
                                            <input type="text" id="numser" name="numser" class="form-control" placeholder="Identificação" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Valor</label>
                                            <input type="text" id="valor" name="valor" class="form-control valor" placeholder="0,0000" required>
                                        </div>
                                    </div>
                                    <hr style="margin-top: 5px; margin-bottom: 5px">
                                    <div class="row">
                                        <div class="col-md-2 form-group">
                                            <label>Desconto(%)</label>
                                           <input type="number" id="desc" name="desc" class="form-control" placeholder="0" step=".0001">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Juros(%)</label>
                                            <input type="number" id="juros" name="juros" class="form-control" placeholder="0" step=".0001">
                                        </div>
                                        <div class="col-md-2 form-group">
                                             <label>Multa(%)</label>
                                            <input type="number" id="multa" name="multa" class="form-control" placeholder="0" step=".0001">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label>Observações</label>
                                            <textarea type="text" id="obs" name="obs" rows=2 class="form-control"></textarea>
                                        </div>
                                    </div>
                                    
                                    <hr style="margin-top: 5px; margin-bottom: 5px">
                                    
                                    <div class="row">
                                        <div class="col-md-6 form-group" style="padding-top: 5px">
                                            <label>Este título será recorrente?</label>&nbsp;
                                            <input type="checkbox" id="recorrente" name="recorrente" value="1" style="display: inline;">&nbsp;<label>Sim</label>
                                        </div>
                                        <div class="col-md-6 form-group" id="div_repeticao" style="display: none">
                                            <label>Quantos meses se repetirão: </label>
                                            <input type="number" min="2" id="repeticao" name="repeticao" class="form-control" style="display: inline; width: 100px" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                
                                </div>
                            
                                
                                <div class="tab-pane fade" id="nav-frota" role="tabpanel" aria-labelledby="nav-frota-tab">
                                       <div class="row">
                                            <div class="col-md-12 form-group">
                                                <a href="javascript:add_frota()"><button type="button" class="btn btn-primary btn-sm"><em class="fa fa-plus" aria-hidden="true"></em>&nbsp;Adicionar Nova Frota</button></a>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="col-md-8">
                                                <label>Frota</label>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Valor</label>
                                            </div>  
                                        </div>
                                        <div class="col-md-12" id="newfrota" style="height: 400px; overflow: scroll;">
                                            <div class="col-md-8 form-group">
                                                <select  style="width: 100%!important" id="frota_lanca" name="frota[]" class="selectlancatitulo-filtro">
                                                   <option selected disabled value="">-- Selecione a Frota --</option>
                                                    <?php foreach($frota as $frt){?>
                                                        <option value="<?php echo $frt['frota_id'];?>"><?php echo $frt['frota_codigo']."-".$frt['frota_placa'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" class="form-control valor" onchange="contar_frota()" name="valorfrota[]" id="vlr_frota_0" placeholder="R$ 0,0000">
                                            </div>
                                        </div>
                                        
                                        <!-- Padrão. esta será a informação inserida acima -->
                                        <div id="newlinkfrota" style="display:none" class="col-md-12">
                                            <div class="col-md-8 form-group">
                                                <select class="dynamic-select" name="frota[]"  style="width: 100%!important">
                                                    <option selected disabled value="">-- Selecione a Frota --</option>
                                                    <?php foreach($frota as $frt){?>
                                                        <option value="<?php echo $frt['frota_id'];?>"><?php echo $frt['frota_codigo']."-".$frt['frota_placa'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" class="form-control valor" onchange="contar_frota()" name="valorfrota[]" placeholder="R$ 0,0000">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12 text-right">
                                            <h4>Valor Total <span id="valor_total_frota">0,0000</span></h4>
                                        </div>
                                        
                                </div>   
                                
                            </div>
                                
                    			<label style="width: 5%"></label>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Lançar Título</button>
                                </div>
                            </form>
                                
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        
            <div class="modal fade" id="baixaModalCenter" tabindex="-1" role="dialog" aria-hidden="true"></div>        

            <div class="modal fade" id="addtipo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="margin-top: 21%;">
                    <div class="modal-content">
                        
                        <input type="hidden" id="addtipo_callback">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Tipo de Movimento</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hidetipo()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                       <div class="modal-body">
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome</label><br>
                                    <input type="text" class="form-control" id="nome_tipo" placeholder="Nome">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Tipo</label><br>
                                    <select class="select2-custom" id="tipo_tipo"  style="width: 100%!important">
                                        <option value="" selected disabled>-- Selecione --</option>
                                        <option value="ENTRADA">Entrada</option>
                                        <option value="SAIDA">Saída</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col-md-10" style="padding-left: 0">
                                        <label>Movimenta Estoque?</label><br>
                                        <label>Devolução?</label><br>
                                        <label>Nota Fiscal?</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" id="movimenta_tipo" value="1"><br>
                                        <input type="checkbox" id="devolucao_tipo" value="1"><br>
                                        <input type="checkbox" id="nota_tipo" value="1" checked>
                                    </div>
                                    
                                    <div class="col-md-12" style="padding: 0">
                                        <div class="col-md-6" style="padding-right: 5; padding-left: 0">
                                            <input type="radio" name="item_add" value="1" id="produto_add" checked>&nbsp;<label>Produto</label>
                                        </div>
                                        <div class="col-md-6" style="padding-right: 0; padding-left: 5">
                                            <input type="radio" name="item_add" value="2" id="servico_add">&nbsp;<label>Serviço</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hidetipo()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendtipo()">Adicionar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="addfc" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-fc" role="document" style="margin-top: 10%;">
                    <div class="modal-content">
                        
                        <input type="hidden" id="addfc_callback">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Fornecedor/Cliente</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hidefc()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                       <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-md-6 form-group">
                                    <label>Tipo de Inserção</label><br>
                                    <select  style="width: 100%!important" class="select2-search block-sel" id="tipo_fc">
                                        <option value="1">Fornecedor</option>
                                        <option value="2">Cliente</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>CPF/CNPJ</label><br>
                                    <div class="sel-with-add">
                                        <input class="form-control cnpj" id="cpfcnpj_fc" placeholder="000.000.000-00">
                                    </div>
                                    <div class="add-din">
                                        <button type="button" class="btn btn-primary" onclick="cnpjSearch()"><em class="fa fa-search"></em></button>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 form-group">
                                    <label>Nome</label><br>
                                    <input type="text" class="form-control disabled" id="nome_fc" placeholder="Nome" disabled>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Ramo</label><br>
                                    <input type="text" class="form-control disabled" id="ramo_fc" placeholder="Ramo" disabled>
                                </div>
                                
                                <div class="col-md-3 form-group">
                                    <label>CEP</label><br>
                                    <input type="text" class="form-control disabled cep" id="cep_fc" placeholder="00000-000" disabled>
                                </div>
                                <div class="col-md-7 form-group">
                                    <label>Logradouro</label><br>
                                    <input type="text" class="form-control cep-disabled" id="logradouro_fc" placeholder="Logradouro" disabled>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>N°</label><br>
                                    <input type="text" class="form-control cep-disabled number" id="num_fc" placeholder="0" disabled>
                                </div>
                                
                                <div class="col-md-4 form-group">
                                    <label>Bairro</label><br>
                                    <input type="text" class="form-control cep-disabled" id="bairro_fc" placeholder="Bairro" disabled>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Complemento</label><br>
                                    <input type="text" class="form-control cep-disabled" id="complemento_fc" placeholder="Complemento" disabled>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Cidade</label><br>
                                    <input type="text" class="form-control cep-disabled" id="cidade_fc" placeholder="Cidade" disabled>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>Estado</label><br>
                                    <input type="text" class="form-control cep-disabled" id="estado_fc" placeholder="Estado" disabled>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>E-mail</label><br>
                                    <input type="email" class="form-control disabled" id="email_fc" placeholder="mail@mail.com" disabled>
                                </div>

                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hidefc()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendfc()">Adicionar</button>
                        </div>

                    </div>
                </div>
            </div>
            
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

            <div class="modal fade" id="modalaberto" tabindex="-1" role="dialog" aria-hidden="true">
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
                                            <input type="text" class="form-control" id="num_ver_aberto" readonly>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label>Tipo</label><br>
                                            <input type="text" class="form-control" id="tipo_ver_aberto" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-padding">
                                        <div class="col-md-12 form-group">
                                            <label>Fonecedor/Cliente</label><br>
                                            <input type="text" class="form-control" id="forncli_ver_aberto" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-padding">
                                        <div class="col-md-7 form-group">
                                            <label>Frota</label><br>
                                            <input type="text" class="form-control" id="frota_ver_aberto" readonly>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label>Movimentação</label><br>
                                            <input type="text" class="form-control" id="movi_ver_aberto" readonly>
                                        </div>
                                    </div>

                                    <div class="row row-padding">
                                        <div class="col-md-3 form-group">
                                            <label>Vencimento</label><br>
                                            <input type="text" class="form-control" id="vencimento_ver_aberto" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Juros</label><br>
                                            <input type="text" class="form-control" id="juros_ver_aberto" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Multa</label><br>
                                            <input type="text" class="form-control" id="multa_ver_aberto" readonly>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Desconto</label><br>
                                            <input type="text" class="form-control" id="desconto_ver_aberto" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row row-padding">
                                        <div class="col-md-12 form-group">
                                            <label>Observação</label><br>
                                            <textarea class="form-control" rows=2 id="observacao_ver_aberto" readonly></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            &nbsp;&nbsp;<a class="btn btn-primary" id="pdf_aberto" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="completaModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="margin-top: 10%;">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Completar Cadastro de Título</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" aria-label="Close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('financeiro/completatitulo'); ?>">
                            <input type="hidden" name="id_completa" id="id_completa">
                            
                            <div class="modal-body">
                                <div class="row">
                                    
                                    <div class="col-md-7 form-group">
                                        <label>Fornecedor/Cliente</label><br>
                                        <div class="sel-with-add">
                                            <select id="forneclin_completa" name="forneclin_completa" class="form-control selectcadastrotitulo-filtro"  style="width: 100%!important" required>
                                                <option selected disabled value="">-- Fornecedor/Cliente --</option>
                                                <option value="0">Nenhum</option>
                                                <?php foreach($forcli as $fcs){?>
                                                <option value="<?php echo $fcs['id'];?>"><?php echo $fcs['nome'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="add-din">
                                            <button type="button" class="btn btn-primary" onclick="dynamicFC2()"><em class="fa fa-plus"></em></button>
                                        </div>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label>Vencimento</label><br>
                                        <input type="date" class="form-control" id="vencimento_completa" name="vencimento_completa" required>
                                    </div>
                                    
                                    <div class="col-md-4 form-group">
                                        <label>Juros</label><br>
                                        <input type="number" class="form-control" id="juros_completa" name="juros_completa" step=".01">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Multa</label><br>
                                        <input type="number" class="form-control" id="multa_completa" name="multa_completa" step=".01">
                                    </div>
                                    <div class="col-md-4  form-group">
                                        <label>Desconto</label><br>
                                        <input type="number" class="form-control" id="desconto_completa" name="desconto_completa" step=".01">
                                    </div>
                                    <div class="col-md-12  form-group">
                                        <label>Observação</label><br>
                                        <textarea class="form-control" rows="2" name="observacao_completa" id="observacao_completa"></textarea>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Completar</button>
                            </div>
                        </form>

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

            <div class="modal fade" id="modaleditar" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-nota" role="document" style="margin-top: 10%;">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Editar Título</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal"aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?= base_url('financeiro/atualizaTitulo') ?>" method="post">
                            <input type="hidden" name="id_editar" id="id_editar">
                            
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Tipo de Movimentação</label><br>
                                                <select  style="width: 100%!important" id="tipo_editar" name="tipo" class="selecteditarlancatitulo-filtro">
                                                    <?php foreach($tipos_e as $cnt){?>
                                                    <option value="<?php echo $cnt['tm_id'];?>"><?php echo $cnt['tm_nome'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Fornecedor/Cliente</label><br>
                                                <select  style="width: 100%!important" id="forneclin_editar" name="forneclin" class="selecteditarlancatitulo-filtro" required>
                                                    <option disabled value="">-- Fornecedor/Cliente --</option>
                                                    <?php foreach($forcli as $fcs){?>
                                                    <option value="<?php echo $fcs['id'];?>"><?php echo $fcs['nome'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-4 form-group">
                                                <label>Vencimento</label><br>
                                                <input type="date" class="form-control" id="vencimento_editar" name="vencimento" required>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Identificação</label><br>
                                                <input type="text" class="form-control" id="identificacao_editar" name="identificacao" required>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Valor</label><br>
                                                <input type="text" class="form-control" id="valor_editar" name="valor" required>
                                            </div>
                                            
                                            <div class="col-md-2 form-group">
                                                <label>Desconto(%)</label><br>
                                                <input type="number" class="form-control" id="desconto_editar" name="desconto" step=".0001">
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Juros(%)</label><br>
                                                <input type="number" class="form-control" id="juros_editar" name="juros" step=".0001">
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <label>Multas(%)</label><br>
                                                <input type="number" class="form-control" id="multas_editar" name="multas" step=".0001">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Frota</label><br>
                                                <select  style="width: 100%!important" class="selecteditarlancatitulo-filtro" id="frota_editar" name="frota">
                                                    <option disabled value="">-- Selecione a Frota --</option>
                                                    <?php foreach($frota as $frt){?>
                                                    <option value="<?php echo $frt['frota_id'];?>"><?php echo $frt['frota_codigo']."-".$frt['frota_placa'];?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-12 form-group">
                                                <label>Observação</label><br>
                                                <textarea class="form-control" id="oserbavacao_editar" name="observacao" rows=2></textarea>
                                            </div>
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Filtros</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideFiltro()" aria-label="Close">
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
                                            <option value="2">Abertos</option>
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

            <div class="modal fade" id="modalMulti" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Selecione o Tipo de Título</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('multiplostitulos') ?>" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Tipo</label><br>
                                        <select  style="width: 100%!important" class="select2-multi" id="multi_tipo" name="tipo" required>
                                            <option value="" selected disabled>-- Selecione o Tipo --</option>
                                            <option value="ENTRADA">Entrada</option>
                                            <option value="SAIDA">Saída</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Fornecedor/Cliente: </label>
                                        <select style="width: 100%!important" class="select2-multi" id="multi_fornecedor" name="fornecedor" required>
                                            <option value="" selected disabled>Selecione o Fornecedor/Cliente</option>
                                            <?php foreach($forcli as $fcs){?>
                                            <option value="<?php echo $fcs['id'];?>"><?php echo $fcs['nome'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">OK</button>
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
                                    <button type="button" class="close" onclick="hidedre()" aria-label="Close">
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
                                                <input type="month" class="form-control" name="inicio" id="sintetico_inicio">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Final do Período</label><br>
                                                <input type="month" class="form-control" name="final" id="sintetico_final">
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
                                    <button type="button" class="close" onclick="hidecaixa()" aria-label="Close">
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

            <div class="modal fade" id="novaPeca" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <input type="hidden" id="novaPeca_callback">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Nova Peça</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hidePeca()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_nome" placeholder="Nome">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Código da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_codigo" placeholder="Código">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Modelo da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_modelo" placeholder="Modelo">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Preço de Custo (R$):</label><br>
                                    <input type="text" class="form-control valor" id="peca_custo" placeholder="0,0000">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Preço de Venda (R$):</label><br>
                                    <input type="text" class="form-control valor" id="peca_venda" placeholder="0,0000">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>Fabricante:</label><br>
                                    <input type="text" class="form-control" id="peca_fabricante" placeholder="Fabricante">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>Fornecedor:</label><br>
                                    <select class="select2-peca" id="peca_fornecedor"  style="width: 100%!important">
                                        <option value="" disabled selected>-- Selecione um Fornecedor --</option>
                                        <?php foreach($fornecedores as $forn){
                                            echo "<option value='".$forn['fornecedor_cnpj']."'>".$forn['fornecedor_nome']."</option>";
                                        } ?>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hidePeca()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendPeca()">Cadastrar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="novoServ" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Novo Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideServ()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="serv_nome" placeholder="Nome">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Valor</label>
                                    <input type="text" class="form-control" id="serv_valor" placeholder="0,0000">
                                </div>
                            </div>
                        </div>
                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="hideServ()">Cancelar</button>
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-primary" onclick="novoServ()">Adicionar</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
            <div class="modal fade" id="excluirModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Excluir Título</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <p>Realmente deseja excluir este título?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close">Não</button>
                            <button type="button" class="btn btn-danger" onclick="excluirFinaliza()">Sim</button>
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
                function excluirTitulo(id){
                    document.getElementById('tituloId').value = id;
                    $('#excluirModal').modal('show');
                }
                function excluirFinaliza(){
                    $('#excluirModal').modal('hide');
                    $('#excluirFinal').modal('show');
                }
                
                <?php if(isset($senhaErro)){?>
                    alert("Senha incorreta!");
                <?php } ?>
                
                <?php if(isset($exclusaoSucesso)){?>
                    alert("Titulo excluido com sucesso!");
                <?php } ?>
                
                <?php if(isset($exclusaoErro)){?>
                    alert("Titulo não pode ser excluido! Verifique se não existem boletos ou notas vinculadas ao título.");
                <?php } ?>
                
            </script>            
            
            <script type="text/javascript">
                function add_prod(){   
                    var ctE = parseInt($('#ctE').val());
                	var div1 = document.createElement('div');
                	div1.id = 'E'+ctE;
                	//var delLink = '<div  class="col-md-1" style="text-align:right;margin-right:65px"><a href="javascript:delItE('+ ctE +')">Remover</a></div>';   + delLink;
                	div1.innerHTML = document.getElementById('newlinkproduto').innerHTML;
                	document.getElementById('newproduto').appendChild(div1);
                	
                	$('#E'+ctE).find('select').last().prop('id', 'sel_'+ctE).prop('name', 'produto['+ctE+']');
                	$('#E'+ctE).children('.col-md-2').first().find('input').last().prop('id', 'qtd_'+ctE).prop('name', 'quantia['+ctE+']');
                	$('#E'+ctE).children().last().find('input').last().prop('id', 'vlr_'+ctE).prop('name', 'valor['+ctE+']');
                	
                	setMask($('#E'+ctE).find('input').last(), $('#E'+ctE).find('input').first());
                	initializeSelect2($('#E'+ctE).find('select'));
                	
                	ctE++;
                    $('#ctE').val(ctE);
                }
                
                var ctF = 0;

                function add_frota(){   
                    ctF++;
                	var div1 = document.createElement('div');
                	div1.id = 'E'+ctF;
                	div1.innerHTML = document.getElementById('newlinkfrota').innerHTML;
                	document.getElementById('newfrota').appendChild(div1);
                	
                	$('#E'+ctF).find('select').last().prop('id', 'sel_'+ctF).prop('name', 'frota['+ctF+']');
                	$('#E'+ctF).children('.col-md-4').first().find('input').last().prop('id', 'qtd_'+ctF).prop('name', 'quantia['+ctF+']');
                	$('#E'+ctF).children().last().find('input').last().prop('id', 'vlr_frota_'+ctF).prop('name', 'valor['+ctF+']');
                	
                	setMask($('#E'+ctF).find('input').last(), $('#E'+ctF).find('input').first());
                	select2($('#E'+ctF).find('select'));
                }
                
                function contar_frota(){
                    var total = 0;
                    
                    for(i = 0; i <= ctF;i++){
                        console.log(parseFloat($('#vlr_frota_' + i).val().replaceAll('.','').replace(',','.')) + 10);
                        if(parseFloat($('#vlr_frota_' + i).val())){
                            total = total + parseFloat($('#vlr_frota_' + i).val().replaceAll('.','').replace(',','.'));    
                        } else {
                            total = total + 0;
                        }
                    }
                    
                    //var formatadovalor = total.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                    
                    var formatadovalor = total.toFixed(2);
                    
                    $('#valor_total_frota').html(total);
                }
                
                function delItE(eleId){
                	d = document.getElementById('E'+eleId);
                	d.remove();
                }
                
                function initializeSelect2(selectElementObj) {
                    selectElementObj.select2({theme: 'bootstrap', dropdownParent: $('#notaModal')});
                }
                
                
                function select2(selectElementObj) {
                    selectElementObj.select2({theme: 'bootstrap', dropdownParent: $('#lancatituloModalCenter')});
                }
                
                function setMask(vlr, qtd){
                    vlr.mask("#.##0,0000", {reverse: true});
                    qtd.mask("0#");
                }
            </script>
            
            <script type="text/javascript">
                function add_serv(){
                    var ctD = parseInt($('#ctD').val());
                    
                	var div1 = document.createElement('div');
                	div1.id = 'D'+ctD;
                	//var delLink = '<div  class="col-md-1" style="text-align:right;margin-right:65px"><a href="javascript:delItE('+ ctE +')">Remover</a></div>';   + delLink;
                	div1.innerHTML = document.getElementById('newlinkservico').innerHTML;
                	document.getElementById('newservico').appendChild(div1);
                	
                	$('#D'+ctD).find('select').last().prop('id', 'serv_'+ctD).prop('name', 'servico['+ctD+']');
                	$('#D'+ctD).children('.col-md-2').first().find('input').last().prop('id', 'qtdServ_'+ctD).prop('name', 'quantiaServ['+ctD+']');
                	$('#D'+ctD).children().last().find('input').last().prop('id', 'vlrServ_'+ctD).prop('name', 'valorServ['+ctD+']');
                	$('#D'+ctD).prop('class', 'dynamic-elD');
                	
                	setMaskD($('#D'+ctD).find('input').last(), $('#D'+ctD).find('input').first());
                	initializeSelect2D($('#D'+ctD).find('select'));
                	
                	ctD++;
                    $('#ctD').val(ctD);
                }
                
                function delItD(eleId){
                	d = document.getElementById('D'+eleId);
                	d.remove();
                }
                
                function initializeSelect2D(selectElementObj) {
                    selectElementObj.select2({theme: 'bootstrap', dropdownParent: $('#notaModal')});
                }
                
                function setMaskD(vlr, qtd){
                    vlr.mask("#.##0,0000", {reverse: true});
                    qtd.mask("0#");
                }
            </script>
            
            <script>
                function pegaValor(id, pos){
                    var newPos = pos.substr(4);
                    var array = <?php echo json_encode($produtos) ?>;
                    var check = 0;

                    for(var i = 0; i < array.length; i++){
                        if(id == array[i].produto_id){
                            check = 1;
                            $('#vlr_'+newPos).unmask().val(array[i].produto_preco_custo).mask("#.##0,0000", {reverse: true});
                        }
                    }
                    
                    if(check == 0){
                        var dp = $('#dp').val().split('☻');
                        for(var i = 0; i < dp.length; i++){
                            var ex = dp[i].split('☺');
                            if(ex[0] == id){
                                $('#vlr_'+newPos).unmask().val(ex[1]).mask("#.##0,0000", {reverse: true});
                            }
                        }
                    }
                }
                
                function pegaValorServ(id, pos){
                    var newPos = pos.substr(5);
                    var array = <?php echo json_encode($servicos) ?>;
                    var check = 0;

                    for(var i = 0; i < array.length; i++){
                        if(id == array[i].servico_id){
                            check = 1;
                            $('#vlrServ_'+newPos).unmask().val(array[i].servico_custo).mask("#.##0,0000", {reverse: true});
                        }
                    }
                    
                    if(check == 0){
                        var ds = $('#ds').val().split('☻');
                        for(var i = 0; i < ds.length; i++){
                            var ex = ds[i].split('☺');
                            if(ex[0] == id){
                                $('#vlrServ_'+newPos).unmask().val(ex[1]).mask("#.##0,0000", {reverse: true});
                            }
                        }
                    }
                }
            </script>
        
            <script>
            <?php if(isset($pagina)){ ?>
                window.onload = function change(){
        
                    var div = $(".change-tab-div").toArray();
                    var btn = $(".change-tab-btn").toArray();
                    var affectedIndex = <?php echo $pagina; ?> -1;
                    
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
                };
            <?php }?>
            </script>
            
            <script>
                function checkNota(val){
                    var tipos = <?php echo json_encode($operacoes) ?>;
                    var check = 0;
                    
                    for(var i = 0; i < tipos.length; i++){
                        if(tipos[i].tm_id == val){
                            var check = 1;
                            if(tipos[i].tm_nota_fiscal == 0){
                                $('#dados_nota').css('display', 'none');
                                $('#numero').prop('required', false);
                                $('#serie').prop('required', false);
                            }else{
                                $('#dados_nota').css('display', 'block');
                                $('#numero').prop('required', true);
                                $('#serie').prop('required', true);
                            }
                            
                            if(tipos[i].tm_produto == 1){
                                $('#ctE').val(1);
                                $('#ctD').val(0);
                                $('#nav-itens-tab').css('display', 'block');
                                $('#nav-servs-tab').css('display', 'none');
                                $('.dynamic-elD').each(function(){
                                    $(this).remove();
                                });
                                $('#serv_0').val('').change();
                                $('#qtdServ_0').val('');
                                $('#vlrServ_0').val('');
                                $('#ctD').val(0);
                            }else if(tipos[i].tm_servico == 1){
                                $('#ctD').val(1);
                                $('#ctE').val(0);
                                $('#nav-servs-tab').css('display', 'block');
                                $('#nav-itens-tab').css('display', 'none');
                                $('.dynamic-el').each(function(){
                                    $(this).remove();
                                });
                                $('#sel_0').val('').change();
                                $('#qtd_0').val('');
                                $('#vlr_0').val('');
                                $('#ctE').val(0);
                            }
                        }
                    }
                    
                    if(check == 0){
                        var anchor = $('#tipo_anchor').val().split('☻');
                        for(var i = 0; i < anchor.length; i++){
                            var ex = anchor[i].split('☺');
                            if(val == ex[0]){
                                if(parseInt(ex[1]) == 0){
                                    $('#dados_nota').css('display', 'none');
                                    $('#numero').prop('required', false);
                                    $('#serie').prop('required', false);
                                }else{
                                    $('#dados_nota').css('display', 'block');
                                    $('#numero').prop('required', true);
                                    $('#serie').prop('required', true);
                                }
                                
                                if(parseInt(ex[2]) == 1){
                                    $('#nav-itens-tab').css('display', 'block');
                                    $('#nav-itens2-tab').css('display', 'none');
                                    $('.dynamic-elD').each(function(){
                                        $(this).remove();
                                    });
                                    $('#serv_0').val('').change();
                                    $('#qtdServ_0').val('');
                                    $('#vlrServ_0').val('');
                                    $('#ctE').val(1);
                                    $('#ctD').val(0);
                                }else if(parseInt(ex[3]) == 1){
                                    $('#nav-itens2-tab').css('display', 'block');
                                    $('#nav-itens-tab').css('display', 'none');
                                    $('.dynamic-el').each(function(){
                                        $(this).remove();
                                    });
                                    $('#sel_0').val('').change();
                                    $('#qtd_0').val('');
                                    $('#vlr_0').val('');
                                    $('#ctD').val(1);
                                    $('#ctE').val(0);
                                }
                            }
                        }
                    }
                }
            </script>
            
            <script>
                $('#form_lanca').on('submit', function(e){
                    if($('#nav-itens-tab').css('display') == 'block'){
                        if($('#sel_0').val() != null && $('#sel_0').val() != ""){
                            if($('#qtd_0').val() != null && $('#qtd_0').val() != ""){
                                if($('#vlr_0').val() != null && $('#vlr_0').val() != ""){
                                    $('#form_lanca').submit();
                                }else{
                                    e.preventDefault();
                                    alert('Por favor insira um valor válido!');
                                }
                            }else{
                                e.preventDefault();
                                alert('Por favor informe uma quantia válida!');
                            }
                        }else{
                            e.preventDefault();
                            alert('Por favor selecione um item na aba de itens!');
                        }
                    }
                    
                    if($('#nav-servs-tab').css('display') == 'block'){
                        if($('#serv_0').val() != null && $('#serv_0').val() != ""){
                            if($('#qtdServ_0').val() != null && $('#qtdServ_0').val() != ""){
                                if($('#vlrServ_0').val() != null && $('#vlrServ_0').val() != ""){
                                    $('#form_lanca').submit();
                                }else{
                                    e.preventDefault();
                                    alert('Por favor insira um valor válido!');
                                }
                            }else{
                                e.preventDefault();
                                alert('Por favor informe uma quantia válida!');
                            }
                        }else{
                            e.preventDefault();
                            alert('Por favor selecione um item na aba de itens!');
                        }
                    }
                });
            </script>
            
            <script>
                function baixaTitulo(value){
                    dados = new FormData();
                    dados.append('id', value);
                    $.ajax({
                        url: '<?php echo base_url('financeiro/modalbaixa'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('baixaTitulo(value): Erro, verifique o console');
                            console.log('baixaTitulo(value): '+xhr.responseText);
                        },
                        success: function(data) {
                            $('#baixaModalCenter').html(data);
                            $('#baixaModalCenter').modal('show');
                        },
                    });
                }
            </script>
            
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
                    
                    $('#peca_fornecedor').select2({theme: "bootstrap", dropdownParent: $('#novaPeca')});
                    $('#peca_custo').mask("#.##0,0000", {reverse: true});
                    $('#peca_venda').mask("#.##0,0000", {reverse: true});
                    $('#serv_valor').mask("#.##0,0000", {reverse: true});
                    
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
                function dynamicTipo(local){
                    $('#addtipo').modal('show');
                    $('#'+local).modal('hide');
                    $('#addtipo_callback').val(local);
                }
            
                function hidetipo(){
                    $('#nome_tipo').val('');
                    $('#tipo_tipo').val('');
                    $('#tipo_tipo').change();
                    $('#movimenta_tipo').prop('checked', false);
                    $('#devolucao_tipo').prop('checked', false);
                    $('#nota_tipo').prop('checked', true);
                    
                    $('#produto_add').click();
                    
                    $('#addtipo').modal('hide');
                    var callback = $('#addtipo_callback').val();
                    $('#'+callback).modal('show');
                }
                
                $('#servico_add').on('click', function(){
                    $('#movimenta_tipo').prop({'checked': false, 'disabled': true});
                    $('#devolucao_tipo').prop({'checked': false, 'disabled': true});
                });
                
                $('#produto_add').on('click', function(){
                    $('#movimenta_tipo').prop('disabled', false);
                    $('#devolucao_tipo').prop('disabled', false);
                });
                
                function sendtipo(){
                    if($('#nome_tipo').val() != ""){
                        if($('#tipo_tipo').val() != ""){
                            dados = new FormData();
                            dados.append('nome', $('#nome_tipo').val());
                            dados.append('tipo', $('#tipo_tipo').val());
                            
                            if($('#movimenta_tipo').prop('checked') == true){
                                dados.append('movimenta', 1);
                            }else{
                                dados.append('movimenta', 0);
                            }
                            
                            if($('#devolucao_tipo').prop('checked') == true){
                                dados.append('devolucao', 1);
                            }else{
                                dados.append('devolucao', 0);
                            }
                            
                            if($('#nota_tipo').prop('checked') == true){
                                dados.append('nota', 1);
                            }else{
                                dados.append('nota', 0);
                            }
                            
                            if($('#produto_add').prop('checked') == true){
                                dados.append('item_add', 1);
                            }else{
                                dados.append('item_add', 2);
                            }
                            
                            $.ajax({
                                url: '<?php echo base_url('financeiro/dynamicNewTipo'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                error: function(xhr, status, error) {
                                    alert('sendtipo(): Erro, verifique o console');
                                    console.log('sendtipo(): '+xhr.responseText);
                                },
                                success: function(data) {
                                    if(data != "null" && data != "" && data != " " && data != null){
                                        novo = jQuery.parseJSON(data);
                                        if(novo.tm_movimenta_estoque == '0' || novo.tm_movimenta_estoque == 0){
                                            var opt = '<option value="'+novo.tm_id+'">'+novo.tm_nome+'</option>';
                                            $('#tipo_lanca').append(opt);
                                            $('#operacao').append(opt);
                                            if($('#tipo_anchor').val() == ""){
                                                $('#tipo_anchor').val(novo.tm_id+'☺'+novo.tm_nota_fiscal+'☺'+novo.tm_produto+'☺'+novo.tm_servico);
                                            }else{
                                                $('#tipo_anchor').val($('#tipo_anchor').val()+'☻'+novo.tm_id+'☺'+novo.tm_nota_fiscal+'☺'+novo.tm_produto+'☺'+novo.tm_servico);
                                            }
                                        }
                                        hidetipo();
                                    }else{
                                        alert("Erro no banco");
                                    }
                                },
                            });
                        }else{
                            alert('Por favor selecione um tipo válido!');
                        }
                    }else{
                        alert('Por favor informe um nome válido!');
                    }
                }
            </script>
            
            <script>
                function dynamicFC2(){
                    $('#addfc2').modal('show');
                    $('#completaModal').modal('hide');
                }
                
                function hidefc2(){
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('.cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('#addfc2').modal('hide');
                    $('#completaModal').modal('show');
                    $('.disabled').prop('disabled', true);
                    $('.cep-disabled').prop('disabled', true);
                    $('.block-sel').prop('disabled', false);
                    
                    $('#tipo_fc2').val(1).change();
                    $('#cpfcnpj_fc2').unmask().val('');
                    $('#cpfcnpj_fc2').val().length > 11 ? $('#cpfcnpj_fc2').mask('00.000.000/0000-00', cpfoptions) : $('#cpfcnpj_fc2').mask('000.000.000-00#', cpfoptions);
                    $('#nome_fc2').val('');
                    $('#ramo_fc2').val('');
                    $('#cep_fc2').unmask().val('').mask('00000-000');
                    $('#logradouro_fc2').val('');
                    $('#num_fc2').unmask().val('').mask("0#");
                    $('#bairro_fc2').val('');
                    $('#complemento_fc2').val('');
                    $('#cidade_fc2').val('');
                    $('#estado_fc2').val('');
                    $('#email_fc2').val('');
                }
                
                function cnpjSearch2(){
                    
                    var cnpj = $('#cpfcnpj_fc2').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;

                    if(tam == 14 || tam == 11){
                        dados = new FormData();
                        dados.append('cnpj', cnpj);
                        dados.append('tipo', $('#tipo_fc2').val());
                        $.ajax({
                            url: '<?php echo base_url('financeiro/verificaFC') ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert('cnpjSearch2(): Erro, verifique o console');
                                console.log('cnpjSearch2(): '+xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    if(data == 1){
                                        alert('O CPF/CNPJ inserido já está inserido no banco!');
                                        $('.disabled').prop('disabled', true);
                                        $('.block-sel').prop('disabled', false);
                                    }else if(data == 2){
                                        $('.block-sel').prop('disabled', true);
                                        $('.disabled').prop('disabled', false);
                                    }
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        $('.disabled').prop('disabled', true);
                        alert('Digite um CPF ou CNPJ válido!');
                    }
                }
                
                $("#cep_fc2").keyup(function(){
                    
                    if($("#cep_fc2").val().length == 9){
            			var cep = this.value.replace(/[^0-9]/, "");
            			var url = "https://viacep.com.br/ws/"+cep+"/json/";
            
            			if(cep.length != 8){
            				return false;
            			}
            
            			$.getJSON(url, function(dadosRetorno){
            				try{
            					$("#logradouro_fc2").val(dadosRetorno.logradouro);
            					$("#bairro_fc2").val(dadosRetorno.bairro);
            					$("#cidade_fc2").val(dadosRetorno.localidade);
            					$("#estado_fc2").val(dadosRetorno.uf);
            					$('.cep-disabled').prop('disabled', false);
            				}catch(ex){
            				    alert("Erro na captura dos dados a partir do CEP: " + ex);
            				}
            			});
                    }
                    
            	});
            	
            	function sendfc2(){
            	    var cnpj = $('#cpfcnpj_fc2').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;

                    if(tam == 14 || tam == 11){
                        if($('#nome_fc2').val() != ''){
                            if($('#ramo_fc2').val() != ''){
                                var cep = $("#cep_fc2").val().replace(/[^0-9]/, "");
                                if(cep.length == 8){
                                    if($('#logradouro_fc2').val() != ''){
                                        if($('#num_fc2').val() != ''){
                                            if($('#bairro_fc2').val() != ''){
                                                if($('#cidade_fc2').val() != ''){
                                                    if($('#estado_fc2').val() != ''){
                                                        if($('#email_fc2').val() != ''){
                                                            
                                                            dados = new FormData();
                                                            dados.append('cnpj', cnpj);
                                                            dados.append('tipo', $('#tipo_fc2').val());
                                                            dados.append('nome', $('#nome_fc2').val());
                                                            dados.append('ramo', $('#ramo_fc2').val());
                                                            dados.append('cep', cep);
                                                            dados.append('logradouro', $('#logradouro_fc2').val());
                                                            dados.append('num', $('#num_fc2').val());
                                                            dados.append('bairro', $('#bairro_fc2').val());
                                                            dados.append('complemento', $('#complemento_fc2').val());
                                                            dados.append('cidade', $('#cidade_fc2').val());
                                                            dados.append('estado', $('#estado_fc2').val());
                                                            dados.append('email', $('#email_fc2').val());
                                                            $.ajax({
                                                                url: '<?php echo base_url('financeiro/novoFC') ?>',
                                                                method: 'post',
                                                                data: dados,
                                                                processData: false,
                                                                contentType: false,
                                                                error: function(xhr, status, error) {
                                                                    alert('sendfc2(): Erro, verifique o console');
                                                                    console.log('sendfc2(): '+xhr.responseText);
                                                                },
                                                                success: function(data) {
                                                                    if(data != "null" && data != "" && data != " " && data != null){
                                                                        item = jQuery.parseJSON(data);
                                                                        
                                                                        var opt = '<option value="'+item.id+'">'+item.nome+'</option>';
                                                                        $('#forneclin_lanca').append(opt);
                                                                        $('#forneclin_completa').append(opt);
                                                                        
                                                                        hidefc2();
                                                                    }else{
                                                                        alert("Erro no banco");
                                                                    }
                                                                },
                                                            });
                                                            
                                                        }else{
                                                            alert('Por favor informe um e-mail válido!');
                                                        }
                                                    }else{
                                                        alert('Por favor informa um estado válido!');
                                                    }
                                                }else{
                                                    alert('Por favor informe uma cidade válida!');
                                                }
                                            }else{
                                                alert('Por favor informe um bairro válido!');
                                            }
                                        }else{
                                            alert('Por favor insira um número válido!');
                                        }
                                    }else{
                                        alert('Por favor informe um logradouro válido!');
                                    }
                                }else{
                                    alert('Por favor insira um CEP válido!');
                                }
                            }else{
                                alert('Por favor informe um ramo válido!');
                            }
                        }else{
                            alert('Por favor informe um nome válido!');
                        }
                    }else{
                        alert('Por favor insira um CPF/CNPJ válido!');
                    }
            	}
            </script>
            
            <script>
                function dynamicFC(local){
                    $('#addfc').modal('show');
                    $('#'+local).modal('hide');
                    $('#addfc_callback').val(local);
                }
                
                function hidefc(){
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('.cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('#addfc').modal('hide');
                    var callback = $('#addfc_callback').val();
                    $('#'+callback).modal('show');
                    $('.disabled').prop('disabled', true);
                    $('.cep-disabled').prop('disabled', true);
                    $('.block-sel').prop('disabled', false);
                    
                    $('#tipo_fc').val(1).change();
                    $('#cpfcnpj_fc').unmask().val('');
                    $('#cpfcnpj_fc').val().length > 11 ? $('#cpfcnpj_fc').mask('00.000.000/0000-00', cpfoptions) : $('#cpfcnpj_fc').mask('000.000.000-00#', cpfoptions);
                    $('#nome_fc').val('');
                    $('#ramo_fc').val('');
                    $('#cep_fc').unmask().val('').mask('00000-000');
                    $('#logradouro_fc').val('');
                    $('#num_fc').unmask().val('').mask("0#");
                    $('#bairro_fc').val('');
                    $('#complemento_fc').val('');
                    $('#cidade_fc').val('');
                    $('#estado_fc').val('');
                    $('#email_fc').val('');
                }
                
                function cnpjSearch(){
                    
                    var cnpj = $('#cpfcnpj_fc').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;

                    if(tam == 14 || tam == 11){
                        dados = new FormData();
                        dados.append('cnpj', cnpj);
                        dados.append('tipo', $('#tipo_fc').val());
                        $.ajax({
                            url: '<?php echo base_url('financeiro/verificaFC') ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert('cnpjSearch(): Erro, verifique o console');
                                console.log('cnpjSearch(): '+xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    if(data == 1){
                                        alert('O CPF/CNPJ inserido já está inserido no banco!');
                                        $('.disabled').prop('disabled', true);
                                        $('.block-sel').prop('disabled', false);
                                    }else if(data == 2){
                                        $('.block-sel').prop('disabled', true);
                                        $('.disabled').prop('disabled', false);
                                    }
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        $('.disabled').prop('disabled', true);
                        alert('Digite um CPF ou CNPJ válido!');
                    }
                }
                
                $("#cep_fc").keyup(function(){
                    
                    if($("#cep_fc").val().length == 9){
            			var cep = this.value.replace(/[^0-9]/, "");
            			var url = "https://viacep.com.br/ws/"+cep+"/json/";
            
            			if(cep.length != 8){
            				return false;
            			}
            
            			$.getJSON(url, function(dadosRetorno){
            				try{
            					$("#logradouro_fc").val(dadosRetorno.logradouro);
            					$("#bairro_fc").val(dadosRetorno.bairro);
            					$("#cidade_fc").val(dadosRetorno.localidade);
            					$("#estado_fc").val(dadosRetorno.uf);
            					$('.cep-disabled').prop('disabled', false);
            				}catch(ex){
            				    alert("Erro na captura dos dados a partir do CEP: " + ex);
            				}
            			});
                    }
                    
            	});
            	
            	function sendfc(){
            	    var cnpj = $('#cpfcnpj_fc').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;

                    if(tam == 14 || tam == 11){
                        if($('#nome_fc').val() != ''){
                            if($('#ramo_fc').val() != ''){
                                var cep = $("#cep_fc").val().replace(/[^0-9]/, "");
                                if(cep.length == 8){
                                    if($('#logradouro_fc').val() != ''){
                                        if($('#num_fc').val() != ''){
                                            if($('#bairro_fc').val() != ''){
                                                if($('#cidade_fc').val() != ''){
                                                    if($('#estado_fc').val() != ''){
                                                        if($('#email_fc').val() != ''){
                                                            
                                                            dados = new FormData();
                                                            dados.append('cnpj', cnpj);
                                                            dados.append('tipo', $('#tipo_fc').val());
                                                            dados.append('nome', $('#nome_fc').val());
                                                            dados.append('ramo', $('#ramo_fc').val());
                                                            dados.append('cep', cep);
                                                            dados.append('logradouro', $('#logradouro_fc').val());
                                                            dados.append('num', $('#num_fc').val());
                                                            dados.append('bairro', $('#bairro_fc').val());
                                                            dados.append('complemento', $('#complemento_fc').val());
                                                            dados.append('cidade', $('#cidade_fc').val());
                                                            dados.append('estado', $('#estado_fc').val());
                                                            dados.append('email', $('#email_fc').val());
                                                            $.ajax({
                                                                url: '<?php echo base_url('financeiro/novoFC') ?>',
                                                                method: 'post',
                                                                data: dados,
                                                                processData: false,
                                                                contentType: false,
                                                                error: function(xhr, status, error) {
                                                                    alert('sendfc(): Erro, verifique o console');
                                                                    console.log('sendfc(): '+xhr.responseText);
                                                                },
                                                                success: function(data) {
                                                                    if(data != "null" && data != "" && data != " " && data != null){
                                                                        item = jQuery.parseJSON(data);
                                                                        
                                                                        var opt = '<option value="'+item.id+'">'+item.nome+'</option>';
                                                                        $('#forneclin').append(opt);
                                                                        $('#forneclin_completa').append(opt);
                                                                        
                                                                        if(item.id.indexOf('F')> -1){
                                                                            var auxvalue = item.id.substr(2);
                                                                            var opt = '<option value="'+auxvalue+'">'+item.nome+'</option>';
                                                                            $('#fornecedor').append(opt);
                                                                        }

                                                                        hidefc();
                                                                    }else{
                                                                        alert("Erro no banco");
                                                                    }
                                                                },
                                                            });
                                                            
                                                        }else{
                                                            alert('Por favor informe um e-mail válido!');
                                                        }
                                                    }else{
                                                        alert('Por favor informa um estado válido!');
                                                    }
                                                }else{
                                                    alert('Por favor informe uma cidade válida!');
                                                }
                                            }else{
                                                alert('Por favor informe um bairro válido!');
                                            }
                                        }else{
                                            alert('Por favor insira um número válido!');
                                        }
                                    }else{
                                        alert('Por favor informe um logradouro válido!');
                                    }
                                }else{
                                    alert('Por favor insira um CEP válido!');
                                }
                            }else{
                                alert('Por favor informe um ramo válido!');
                            }
                        }else{
                            alert('Por favor informe um nome válido!');
                        }
                    }else{
                        alert('Por favor insira um CPF/CNPJ válido!');
                    }
            	}
            </script>
            
            <script>
                function dynamicServ(){
                    $('#novoServ').modal('show');
                    $('#notaModal').modal('hide');
                }
                
                function hideServ(){
                    $('#serv_nome').val('');
                    $('#serv_valor').unmask().val('').mask("#.##0,0000", {reverse: true});
                    
                    $('#novoServ').modal('hide');
                    $('#notaModal').modal('show');
                }
                
                function novoServ(){
                    if($('#serv_nome').val() != "" && $('#serv_nome').val() != " "){
                        if($('#serv_valor').val() != "" && $('#serv_valor').val() != " "){
                            dados = new FormData();
                            dados.append('nome', $('#serv_nome').val());
                            dados.append('valor', $('#serv_valor').val());
                            $.ajax({
                                url: '<?php echo base_url('financeiro/servicoDinamico'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                error: function(xhr, status, error) {
                                    alert('novoServ(): Erro, verifique o console');
                                    console.log('novoServ(): '+xhr.responseText);
                                },
                                success: function(data) {
                                    if(data != "null" && data != "" && data != " " && data != null){
                                        serv = jQuery.parseJSON(data);
                                        var opt = "<option value='"+serv.servico_id+"'>"+serv.servico_nome+"</option>";
                                        $('.select2-modal').append(opt);
                                        $('.dynamic-select').append(opt);
                                        hideServ();
                                        
                                        if($('#ds').val() == ""){
                                            $('#ds').val(serv.servico_id+"☺"+serv.servico_custo);
                                        }else{
                                            $('#ds').val("☻"+serv.servico_id+"☺"+serv.servico_custo);
                                        }
                                    }else{
                                        alert("Erro no banco");
                                    }
                                },
                            });
                        }else{
                            alert('Por favor insira um valor válido!');
                        }
                    }else{
                        alert('Por favor insira um nome válido!');
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
                
                function verAberto(id){
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('financeiro/pegaAberto'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('verAberto(id): Erro, verifique o console');
                            console.log('verAberto(id): '+xhr.responseText);
                        },
                        success: function(data) {
                            ttl = jQuery.parseJSON(data);
                            
                            var aux_data = ttl.vencimento.split('-');
                            var data_vencimento = aux_data[2] + '/' + aux_data[1] + '/' + aux_data[0];
                            
                            $('#num_ver_aberto').val(ttl.numero);
                            $('#tipo_ver_aberto').val(ttl.tipo);
                            $('#forncli_ver_aberto').val(ttl.fornecliente);
                            $('#frota_ver_aberto').val(ttl.frota);
                            $('#vencimento_ver_aberto').val(data_vencimento);
                            $('#juros_ver_aberto').val(ttl.juros+'%');
                            $('#multa_ver_aberto').val(ttl.multa+'%');
                            $('#desconto_ver_aberto').val(ttl.desconto+'%');
                            $('#observacao_ver_aberto').html(ttl.observacao);
                            $('#movi_ver_aberto').val(ttl.tipo_movimento);
                            $('#pdf_aberto').prop('href', '<?php echo base_url('relatoriotitulo/') ?>'+ttl.id);
                            
                            $('#modalaberto').modal('show');
                        },
                    });
                }
            </script>
            
            <script>
                function completar(id){
                    $('#id_completa').val(id);
                    $('#completaModal').modal('show');
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
            
            <script>
                function editarTitulo(id){
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('financeiro/getTituloEdit'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('editarTitulo(id): Erro, verifique o console');
                            console.log('editarTitulo(id): '+xhr.responseText);
                        },
                        success: function(data) {
                            ttl = jQuery.parseJSON(data);
                            
                            $('#id_editar').val(id);
                            $('#tipo_editar').val(ttl.titulos_tipo).change();
                            $('#forneclin_editar').val(ttl.titulos_forneclin).change();
                            $('#vencimento_editar').val(ttl.titulos_vencimento);
                            $('#identificacao_editar').val(ttl.titulos_numeroserie);
                            $('#valor_editar').val(ttl.titulos_valor).mask("#.##0,0000", {reverse: true});
                            $('#desconto_editar').unmask().val(ttl.titulos_desconto);
                            $('#juros_editar').unmask().val(ttl.titulos_juros);
                            $('#multas_editar').unmask().val(ttl.titulos_multa);
                            $('#frota_editar').val(ttl.titulos_frota).change();
                            $('#oserbavacao_editar').html(ttl.titulos_observacao);
                            
                            $('#modaleditar').modal('show');
                        },
                    });
                }
            </script>
            

            
            
            <script>
                function hideFiltro(){
                    $('#filtro_tipo').val('').change();
                    $('#filtro_baixa').val('').change();
                    $('#filtro_de').val('');
                    $('#filtro_ate').val('');
                    
                    $('#modalFiltro').modal('hide');
                }
                
                $('#modalFiltro').on('hidden.bs.modal', function () {
                    hideFiltro();
                });
            </script>
            
            <script>
                $('#recorrente').on('change', function(){
                    if($(this).is(":checked")){
                        $('#div_repeticao').css('display', 'block');
                        $('#repeticao').prop('required', true);
                    }else{
                        $('#div_repeticao').css('display', 'none');
                        $('#repeticao').prop('required', false);
                    }
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
            
            <script>
                function dynamicPeca(local){
                    $('#novaPeca').modal('show');
                    $('#'+local).modal('hide');
                    $('#novaPeca_callback').val(local);
                }
                
                function hidePeca(){
                    $('#peca_nome').val('');
                    $('#peca_codigo').val('');
                    $('#peca_modelo').val('');
                    $('#peca_fabricante').val('');
                    $('#peca_fornecedor').get(0).selectedIndex = 0;
                    $('#peca_fornecedor').change();
                    $('#peca_custo').unmask().val('').mask("#.##0,0000", {reverse: true});
                    $('#peca_venda').unmask().val('').mask("#.##0,0000", {reverse: true});
                    $('#novaPeca').modal('hide');
                    var callback = $('#novaPeca_callback').val();
                    $('#'+callback).modal('show');
                }
                
                function sendPeca(){
                    if($('#peca_nome').val() != "" && $('#peca_nome').val() != " "){
                        if($('#peca_codigo').val() != "" && $('#peca_codigo').val() != " "){
                            if($('#peca_modelo').val() != "" && $('#peca_modelo').val() != " "){
                                if($('#peca_fabricante').val() != "" && $('#peca_fabricante') != " "){
                                    if($('#peca_fornecedor').get(0).selectedIndex != 0){
                                        var custo = $('#peca_custo').val().replaceAll('.', '').replace(',', '.');
                                        if(custo != ""){
                                            var venda = $('#peca_venda').val().replaceAll('.', '').replace(',', '.');
                                            if(venda != ""){
                                                
                                                dados = new FormData();
                                                dados.append('nome', $('#peca_nome').val());
                                                dados.append('custo', $('#peca_custo').val());
                                                dados.append('venda', $('#peca_venda').val());
                                                dados.append('codigo', $('#peca_codigo').val());
                                                dados.append('fabricante', $('#peca_fabricante').val());
                                                dados.append('fornecedor', $('#peca_fornecedor').val());
                                                dados.append('modelo', $('#peca_modelo').val());
                                                $.ajax({
                                                    url: '<?php echo base_url('manutencao/pecaDinamica'); ?>',
                                                    method: 'post',
                                                    data: dados,
                                                    processData: false,
                                                    contentType: false,
                                                    error: function(xhr, status, error) {
                                                        alert('sendPeca(): Error, check console');
                                                        console.log(xhr.responseText);
                                                    },
                                                    success: function(data) {
                                                        if(data != "null" && data != "" && data != " " && data != null){
                                                            peca = jQuery.parseJSON(data);
                                                            
                                                            var op = "<option value='"+peca.produto_id+"'>"+peca.produto_nome+" | "+peca.produto_modelo+"</option>";
                                                            
                                                            $('#nav-tabContent').find('select').each(function(){
                                                                $(this).append(op);
                                                            });
                                                            
                                                            hidePeca();
                                                            
                                                            if($('#dp').val() == ""){
                                                                $('#dp').val(peca.produto_id+"☺"+peca.produto_preco_custo);
                                                            }else{
                                                                $('#dp').val("☻"+peca.produto_id+"☺"+peca.produto_preco_custo);
                                                            }
                                                        }else{
                                                            alert("Erro no banco");
                                                        }
                                                    },
                                                });
                                                
                                            }else{
                                                alert('Por favor informe um preço de venda válido!');
                                            }
                                        }else{
                                            alert('Por favor informe um preço de custo válido!');
                                        }
                                    }else{
                                        alert('Por favor selecione um fornecedor válido!');
                                    }
                                }else{
                                    alert('Por favor insira um fabricante válido!');
                                }
                            }else{
                                alert('Por favor insira um modelo válido!');
                            }
                        }else{
                            alert('Por favor insira um código válido!');
                        }
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                }
            </script>
          
            