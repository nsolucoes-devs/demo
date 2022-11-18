            <style>
            
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
                .local{
                    padding: 6px 9px;
                    border: 1px solid #e0e0e0;
                    background: #efefef;
                }
                
                .local-active p, .local-active i{
                    color: #4a4646!important;
                    
                }
                .local-active{
                    background: #acd1ea!important;
                }
                
                .local-con, .local-con p{
                    color: #4a4646!important;
                    background: #dfecf5!important
                }
                
                .local-con i{
                    color: #20c34b!important;
                }
                
                .local-i{
                    color: #c3c3c3;
                    font-size: 30px;
                    margin-left: calc(100% - 25px);
                    margin-top: -12px;
                    margin-left: 10px;
                }
                .local-title{
                    font-size: 11px;
                    text-transform: uppercase;
                    color: #c3c3c3;
                }
                .dataTables_wrapper .row{
                    width: 101%;
                    margin-bottom: 15px;
                }
                .encurtar{
                    display: -webkit-box;
                    overflow: hidden;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    word-break: break-word;
                    line-height: 11px!important;
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
                .check-inside{
                    width: 18px;
                    height: 18px;
                }
                .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
                    padding: 3px!important;    
                }
                .pagination{
                    width: 700px!important;
                    margin: 1px 0!important;
                }
                .pagination>li>a, .pagination>li>span{
                    padding: 2px 7px!important;
                    margin: -3px 0;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button{
                    padding: 0!important;
                }
                .row-c{
                    width: 110%;
                }
                
                
                
                
                
.custom-control-label { 
  padding-top: 0.5rem;
  padding-left: 2rem;
  padding-bottom: 0.1rem;
}

.custom-switch .custom-control-label::before {
  left: -2.25rem;
  height: 2rem;
  width: 3.5rem;    
  pointer-events: all;
  border-radius: 1rem;
}

.custom-switch .custom-control-label::after {
  top: calc(0.25rem + 2px);
  left: calc(-2.25rem + 2px);
  width: calc(2rem - 4px);   
  height: calc(2rem - 4px);  
  background-color: #adb5bd;
  border-radius: 2rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .custom-switch .custom-control-label::after {
    transition: none;
  }
}

.custom-switch .custom-control-input:checked ~ .custom-control-label::after {
  background-color: #fff;
  -webkit-transform: translateX(1.5rem); //translateX(0.75rem);
  transform: translateX(1.5rem); //translateX(0.75rem);
}

.custom-control-input:checked~.custom-control-label:before {
    color: #fff;
    border-color: #6dca4b!important;
    background-color: #6dca4b!important;
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
                        <div class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <form id="formulario" action="<?php echo base_url('estoque/notafiscal') ?>" method="post">
                                    
                                <input type="hidden" name="produtos" id="produtos">
                                <input type="hidden" name="quantidades" id="quantidades">
                                <input type="hidden" name="produtovalores" id="produtovalores">
                                
                                <input type="hidden" name="servicos" id="servicos">
                                <input type="hidden" name="servicosqtd" id="servicosqtd">
                                <input type="hidden" name="servicosvalores" id="servicosvalores">
                                
                                <input type="hidden" id="ctE" name="ctE" value="0">
                                <input type="hidden" id="ctD" name="ctD" value="0">
                                
                                <div class="row" style="margin-top: 1%; margin-bottom: 1%">
                                    <div class="col-md-2">
                                        <div id="div-tipo" class="local local-active">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Parâmetro</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-produto" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Itens</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-telaValor" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Valores</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-conclusao" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Resumo</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div id="tipo">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>PARÂMETROS DA NOTA</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-5 form-group">
                                                    <label for="numser"><b>Número:</b></label>
                                                    <input class="form-control" type="text" name="numero" id="numero" maxlength="26" placeholder="Digite o número" required>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="numser"><b>Série:</b></label>
                                                    <input class="form-control" type="text" name="serie" id="serie" maxlength="26" placeholder="Digite a série" required>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data emissão:</b></label>
                                                    <input class="form-control" type="date" name="emissao" id="emissao" value="<?php echo date('Y-m-d') ?>">
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-4 form-group">
                                                    <label for="acrescimo"><b>Acréscimo:</b></label>
                                                    <input class="valor form-control" type="text" name="acrescimo" id="acrescimo" placeholder="Valor do acréscimo">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="desconto"><b>Desconto:</b></label>
                                                    <input class="valor form-control" type="text" name="desconto" id="desconto" placeholder="Valor do desconto">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="valor"><b>Valor da nota:</b></label>
                                                    <input class="valor form-control" type="text" name="valor" id="valor" placeholder="Valor total nota">
                                                </div>
                                                
                                            
                                                <div class="col-md-4 form-group">
                                                    <label for="tipo"><b>Espécie:</b></label>
                                                    <select  style="width: 100%!important" class="select2" id="especie" name="especie" >
                                                        <option value="" selected disabled>Selecione a Espécie</option>
                                                        <option value="NOTA FISCAL">Nota Fiscal</option>
                                                        <option value="NOTA DE SERVIÇO">Nota De Serviço</option>
                                                        <option value="CUPOM FISCAL">Cupom Fiscal</option>
                                                        <option value="RECIBO">Recibo</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="tipo"><b>Tipo:</b></label>
                                                    <select onchange="buscarEspecie()" style="width: 100%!important" class="select2" id="tipo2" name="tipo" required>
                                                        <option value="" selected disabled> Selecione </option>
                                                        <option value="ENTRADA">Entrada</option>
                                                        <option value="SAIDA">Saída</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="tipo"><b>Operação:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="operacao" name="operacao" required disabled>
                                                        <option value="" selected disabled> Selecione a Operação</option>
                                                        <?php foreach($tipos_e as $cnt){?>
                                                            <option value="<?php echo $cnt['tm_id'];?>"><?php echo ucwords(strtolower($cnt['tm_nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-7 form-group">
                                                    <label for="fornecedor"><b>Tomador:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forneclin" name="forneclin" required>
                                                        <option value="" selected disabled>Selecione o Tomador</option>
                                                        <?php foreach($forcli as $fcs){?>
                                                        <option value="<?php echo $fcs['id'];?>"><?php echo ucwords(strtolower($fcs['nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="chave"><b>Número OS:</b></label>
                                                    <input class="form-control" type="text" name="numos" id="numos" placeholder="Digite o número da OS">
                                                </div>
                                                
                                                
                                                <div class="col-md-9 form-group">
                                                    <label for="chave"><b>Chave de acesso:</b></label>
                                                    <input class="form-control" type="text" name="chave" id="chave" placeholder="Digite a chave de acesso">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="frete"><b>Frete:</b></label>
                                                    <input class="valor form-control" type="text" name="frete" id="frete" placeholder="Digite o valor do frete" value="0,0000">
                                                </div>
                                                
                                            </div>
                                            <div class="row" style="position: relative; top: 10px!important;">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 0;">
                                                </div>
                                                <div class="col-md-12 form-group text-right">
                                                    <button type="button" onclick="produto()" class="btn btn-primary">Próximo</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div id="produto" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>ITENS</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-6 form-group">
                                                    <label><b>Total Itens:</b></label>
                                                    <input type="text" name="valorTotal" id="valorTotal" class="col-8 valor form-control" value="0,0000" readonly>
                                                </div>
                                                
                                                <div class="col-md-6 form-group text-right">
                                                    <button style="margin-top: 25px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addServico" id="buttonServico">Adicionar Serviço</button>
                                                    <button style="margin-top: 25px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProduto" id="buttonProduto">Adicionar Produto</button>
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 1%">
                                                    <table id="multi2" class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 1%!important"></th>
                                                                <th class="text-center" style="width: 30%!important">Item</th>
                                                                <th class="text-center" style="width: 15%!important">Valor</th>
                                                                <th class="text-center" style="width: 7%!important">Qtd</th>
                                                                <th class="text-center" style="width: 20%!important">Total</th>
                                                                <th class="text-center" style="width: 5%!important"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabela-produto">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 10px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: 9px!important;">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" onclick="irTipo()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="telaValor()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="telaValor" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>VALORES</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-6 form-group">
                                                    <label><b>Base de cálculo do ICMS:</b></label>
                                                    <input class="valor form-control" type="text" name="baseicms" id="baseicms" placeholder="R$" value="0,0000">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label><b>Base de Cálculo do ICMS de Substituição:</b></label>
                                                    <input class="valor form-control" type="text" name="basesubicms" id="basesubicms" placeholder="R$" value="0,0000">
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor do ICMS:</b></label>
                                                    <input class="valor form-control" type="text" name="icms" id="icms" placeholder="R$" value="0,0000">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor do ICMS de Substituição:</b></label>
                                                    <input class="valor form-control" type="text" name="subicms" id="subicms" placeholder="R$" value="0,0000">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor do IPI:</b></label>
                                                    <input class="valor form-control" type="text" name="ipi" id="ipi" placeholder="R$" value="0,0000">
                                                </div>
                                                
                                                <div id="temtransportadora" style="width: 100%; display: none">
                                                    <div class="col-md-12 form-group">
                                                        <hr style="position: relative;margin: 0;top: 5px;">
                                                    </div>
                                                    
                                                    <div class="col-md-4 form-group">
                                                        <label><b>Transportadora:</b></label>
                                                        <input class="form-control" type="text" name="transportadora" id="transportadora">
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label><b>CNPJ transportador:</b></label>
                                                        <input class="form-control cnpj" type="text" name="cnpj" id="cnpj">
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label><b>Placa do veículo:</b></label>
                                                        <input class="form-control" type="text" name="placa" id="placa">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 30px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 55px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <div class="custom-control custom-switch text-left" style="top: calc(100% - 30px); width: 50%">
                                                                <input onchange="temTransporte()" type="checkbox" class="custom-control-input" id="switch1">
                                                                <label class="custom-control-label" for="switch1">Tem transportadora?</label>
                                                            </div>
                                                            <button type="button" onclick="produto()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="conclusao()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="conclusao" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>RESUMO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-5 form-group" style="border: 1px solid lightgrey;border-radius: 5px;padding: 10px;">
                                                    <h4 class="text-center"><b>Parâmetros</b></h4>
                                                    <hr>
                                                    <p><b>Tomador:</b> <span id="conForneclin"></span></p>
                                                    <p><b>Data emissão:</b> <span id="conEmissao"></span></p>
                                                    <p><b>Espécie:</b> <span id="conEspecie"></span></p>
                                                    <p><b>Operação:</b> <span id="conOperacao"></span></p>
                                                    <p><b>Número:</b> <span id="conNumero"></span></p>
                                                    <p><b>Série:</b> <span id="conSerie"></span></p>
                                                </div>
                                                
                                                <div class="col-md-6 offset-md-1 form-group" style="overflow: auto;height: 300px;margin-left: 55px; border: 1px solid lightgrey;border-radius: 5px;padding: 10px;">
                                                    <h4 class="text-center"><b>Itens</b></h4>
                                                    <hr>
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 5%!important"></th>
                                                                <th class="text-center" style="width: 30%!important">Item</th>
                                                                <th class="text-center" style="width: 5%!important">Qtd</th>
                                                                <th class="text-center" style="width: 20%!important">Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabela-itens">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                                <div class="col-md-12 form-group">
                                                    <hr style="margin-top: 10px; margin-bottom: 10px;">
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label><b>Frete:</b></label>
                                                    <input type="text"  id="conFrete" name="conFrete" class="form-control" readonly>
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label><b>Total Itens:</b></label>
                                                    <input type="text" id="conProdutos" name="conProdutos" class="form-control" readonly>
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label><b>Total Imposto(s):</b></label>
                                                    <input type="text"  id="conImposto" name="conImposto"class="form-control" readonly>
                                                </div>
                                                
                                                <div class="col-md-6 form-group" style="padding-top: 31px;">
                                                    <p><b>Confira se os valores estão corretos com a Nota</b></p>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Somatória:</b></label>
                                                    <input type="text" id="conTotal" name="conTotal" class="form-control" readonly>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Valor total da Nota:</b></label>
                                                    <input type="text" id="conValor" name="conValor" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 10px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 20px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" onclick="telaValor()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="salvar()" class="btn btn-primary">Salvar</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
                
            <!-- Modal -->
                <div class="modal fade" id="addProduto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" style="width: 70%;margin: 1% 0 0 15%;max-width: 100%;}">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>ADICIONAR PRODUTO</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <p style="font-size: 15px;position: absolute;top: 20px;left: 33px;"><b>Clique no produto para adicionar</b></p>
                        <table id="produto_table" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 40%!important">Produto</th>
                                    <th style="width: 60%!important">Modelo</th>
                                    <th style="width: 60%!important">Valor</th>
                                </tr>
                            </thead>
                            <tbody id="tabelamodal_produto">
                                <?php foreach($produtos as $p){ ?>
                                   <tr style='cursor: pointer;' id="produto_<?php echo $p['produto_id'] ?>" onclick='colocarProduto(<?php echo $p['produto_id'] ?>)'>
                                        <td id="nome_<?php echo $p['produto_id'] ?>"><?php echo ucwords(strtolower($p['produto_nome'])) ?></td>
                                        <td id="modelo_<?php echo $p['produto_id'] ?>"><?php echo ucwords(strtolower($p['produto_modelo'])) ?></td>
                                        <td id="valor_<?php echo $p['produto_id'] ?>">R$ <?php echo number_format($p['produto_preco_custo'],4,',','.') ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-md-4 text-left" style="margin-top: -6%;">
                            <button type="button" class="btn btn-primary" onclick="dynamicPeca('addProduto')">Cadastrar Peça</button>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
                
            
            <!-- Modal -->
                <div class="modal fade" id="addServico" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" style="width: 70%;margin: 1% 0 0 15%;max-width: 100%;}">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>ADICIONAR SERVIÇO</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <p style="font-size: 15px;position: absolute;top: 20px;left: 33px;"><b>Clique no serviço para adicionar</b></p>
                        <table id="servico_table" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 40%!important">Serviço</th>
                                    <th style="width: 60%!important">Valor</th>
                                </tr>
                            </thead>
                            <tbody id="tabelamodal_servico">
                                <?php foreach($servicos as $s){ ?>
                                   <tr style='cursor: pointer;' id="servico_<?php echo $s['servico_id'] ?>" onclick='colocarServico(<?php echo $s['servico_id'] ?>)'>
                                        <td id="servicoNome_<?php echo $s['servico_id'] ?>"><?php echo ucwords(strtolower($s['servico_nome'])) ?></td>
                                        <td id="servicoValor_<?php echo $s['servico_id'] ?>">R$ <?php echo number_format($s['servico_custo'],4,',','.') ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-md-4 text-left" style="margin-top: -6%;">
                            <button type="button" class="btn btn-primary" onclick="dynamicServ()">Cadastrar Serviço</button>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
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
                                        <select class="select2" id="peca_fornecedor"  style="width: 100%!important">
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
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    var table = $('#produto_table').DataTable( {
                        "order": [[ 0, "desc" ]],
                        "language": {
                            "lengthMenu": "",
                            "zeroRecords": "Nenhum registro encontrado",
                            "info": "",
                            "infoEmpty": "",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                    });
                    $('select[name ="multi_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#multi_length').find('.select2').css({
                        'margin-right'  : '5px',
                        'margin-left'   : '5px',
                        'text-align'    : 'center',
                    });
                    
                    
                    
                    var table = $('#servico_table').DataTable( {
                        "order": [[ 0, "desc" ]],
                        "language": {
                            "lengthMenu": "",
                            "zeroRecords": "Nenhum registro encontrado",
                            "info": "",
                            "infoEmpty": "",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                    });
                    $('select[name ="multi_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#multi_length').find('.select2').css({
                        'margin-right'  : '5px',
                        'margin-left'   : '5px',
                        'text-align'    : 'center',
                    });
                    
                    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                    $('.select2').select2({theme: "bootstrap"});
                    $('.valor').mask("#.##0,0000", {reverse: true});
                })
            </script>
            
            <script>
                function buscarEspecie(){
                    dados = new FormData();
                    dados.append('tipo', $('#tipo2').val());
                    $.ajax({
                        url: '<?php echo base_url('financeiro/pegarEspecies'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        error: function(xhr, status, error) {
                            alert('baixaTitulo(value): Erro, verifique o console');
                            console.log('baixaTitulo(value): '+xhr.responseText);
                        },
                        success: function(data) {
                            $('#operacao').empty();
                            
                            for(i = 0; i < data.length;i++){
                                $('#operacao').append($('<option>', {
                                    value: data[i].tm_id,
                                    text: data[i].tm_nome,
                                }));
                            }
                            $('#operacao').prop('disabled', false);
                        },
                    });
                }
            </script>
            
            <script>
                function irTipo(){
                    $('#tipo').show();
                    $('#div-tipo').addClass('local-active');
                    $('#div-tipo').children().children().last().children().addClass('fa-square-o')
                    $('#div-tipo').children().children().last().children().removeClass('fa-check-square-o')
                    $('#div-tipo').removeClass('local-con');
                    
                    $('#produto').hide();
                    $('#div-produto').removeClass('local-active');
                    
                    $('#telaValor').hide();
                    $('#div-telaValor').removeClass('local-active');
                    
                    $('#conclusao').hide();
                    $('#div-conclusao').removeClass('local-active');
                }
            </script>
            
            <script>
                function produto(){
                    if($('#numero').val() == "" || $('#numero').val() == " " || $('#numero').val() == null){
                        $('#numero').focus();
                        Swal.fire('','Digite o número!','error');
                    } else {
                        if($('#serie').val() == "" || $('#serie').val() == " " || $('#serie').val() == null){
                            $('#serie').focus();
                            Swal.fire('','Digite a série!','error');
                        } else {
                            if($('#emissao').val() == "" || $('#emissao').val() == " " || $('#emissao').val() == null){
                                $('#emissao').focus();
                                Swal.fire('','Selecione uma data de emissão!','error');
                            } else {
                                if($('#valor').val() == "" || $('#valor').val() == " " || $('#valor').val() == null){
                                    $('#valor').focus();
                                    Swal.fire('','Digite o valor total da nota!','error');
                                } else {
                                    if($('#especie').val() == "" || $('#especie').val() == " " || $('#especie').val() == null){
                                        $('#especie').focus();
                                        Swal.fire('','Selecione a espécie!','error');
                                    } else {
                                        if($('#tipo2').val() == "" || $('#tipo2').val() == " " || $('#tipo2').val() == null){
                                            $('#tipo2').focus();
                                            Swal.fire('','Selecione um tipo!','error');
                                        } else {
                                            if($('#operacao').val() == "" || $('#operacao').val() == " " || $('#operacao').val() == null){
                                                $('#operacao').focus();
                                                Swal.fire('','Selecione uma operação!','error');
                                            } else {
                                                if($('#forneclin').val() == "" || $('#forneclin').val() == " " || $('#forneclin').val() == null){
                                                    $('#forneclin').focus();
                                                    Swal.fire('','Selecione um tomador!','error');
                                                } else {
                                                    $('#tipo').hide();
                                                    $('#div-tipo').removeClass('local-active');
                                                    $('#div-tipo').children().children().last().children().removeClass('fa-square-o')
                                                    $('#div-tipo').children().children().last().children().addClass('fa-check-square-o')
                                                    $('#div-tipo').addClass('local-con');
                                                    
                                                    $('#produto').show();
                                                    $('#div-produto').removeClass('local-con');
                                                    $('#div-produto').children().children().last().children().addClass('fa-square-o')
                                                    $('#div-produto').children().children().last().children().removeClass('fa-check-square-o')
                                                    $('#div-produto').addClass('local-active');
                                                    
                                                    $('#telaValor').hide();
                                                    $('#div-telaValor').removeClass('local-active');
                                                    
                                                    $('#conclusao').hide();
                                                    $('#div-conclusao').removeClass('local-active');
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            </script>
            
            <script>
                function telaValor(){

                    $('#tipo').hide();
                    $('#div-tipo').removeClass('local-active');
                    
                    $('#produto').hide();
                    $('#div-produto').removeClass('local-active');
                    $('#div-produto').children().children().last().children().removeClass('fa-square-o')
                    $('#div-produto').children().children().last().children().addClass('fa-check-square-o')
                    $('#div-produto').addClass('local-con');
                    
                    $('#telaValor').show();
                    $('#div-telaValor').removeClass('local-con');
                    $('#div-telaValor').children().children().last().children().addClass('fa-square-o')
                    $('#div-telaValor').children().children().last().children().removeClass('fa-check-square-o')
                    $('#div-telaValor').addClass('local-active');
                    
                    
                    $('#conclusao').hide();
                    $('#div-conclusao').removeClass('local-active');
                }
            </script>
            
            <script>
                function conclusao(){
                    mostrarFinal();
                    
                    $('#tipo').hide();
                    $('#div-tipo').removeClass('local-active');
                    
                    $('#produto').hide();
                    $('#div-produto').removeClass('local-active');
                    
                    $('#telaValor').hide();
                    $('#div-telaValor').removeClass('local-active');
                    $('#div-telaValor').children().children().last().children().removeClass('fa-square-o')
                    $('#div-telaValor').children().children().last().children().addClass('fa-check-square-o')
                    $('#div-telaValor').addClass('local-con');
                    
                    $('#conclusao').show();
                    $('#div-conclusao').addClass('local-active');
                }
            </script>
            
            <script>
                function mostrarFinal(){
                    var imposto         = 0;
                    var baseIcms        = parseFloat($('#baseicms').val().replaceAll('.','').replace(',','.'));
                    var baseSubIcms     = parseFloat($('#basesubicms').val().replaceAll('.','').replace(',','.'));
                    var icms            = parseFloat($('#icms').val().replaceAll('.','').replace(',','.'));
                    var subIcms         = parseFloat($('#subicms').val().replaceAll('.','').replace(',','.'));
                    var ipi             = parseFloat($('#ipi').val().replaceAll('.','').replace(',','.'));
                    var frete           = $('#frete').val();
                    var totalProdutos   = $('#valorTotal').val();
                    var total           = 0;
                    var valor           = $('#valor').val();
                    var produtosId      = "";
                    var produtoqtd      = "";
                    var produtovalores  = "";
                    var servicosId      = "";
                    var servicosqtd     = "";
                    var servicosvalores = "";
                    var contadorProduto = 0;
                    var contadorServico = 0;
                    
                    $('#tabela-itens').empty();
                    
                    $('.fProduto').each(function(){
                        var aux = $(this).attr('id').split('_');
                        
                        var td = "<tr>"+
                        "<td><b>P</b></td>"+
                        "<td>"+$('#fNome_'+aux[1]).children().html()+"</td>"+
                        "<td>"+$('#fQtd_'+aux[1]).val()+"</td>"+
                        "<td>"+$('#fTotal_'+aux[1]).html()+"</td>"+
                        "</tr>";
                        
                        $('#tabela-itens').append(td);
                        
                        if(produtosId == ""){
                            produtosId      = aux[1];
                            produtoqtd      = $('#fQtd_'+aux[1]).val().replace(',','.');
                            produtovalores  = $('#fValor_'+aux[1]).val().replace('R$ ','').replaceAll('.','').replace(',','.');
                        } else {
                            produtosId      = produtosId + '¬' + aux[1];
                            produtoqtd      = produtoqtd + '¬' + $('#fQtd_'+aux[1]).val().replace(',','.'); 
                            produtovalores  = produtovalores + '¬' + $('#fValor_'+aux[1]).val().replace('R$ ','').replaceAll('.','').replace(',','.');
                        }
                        
                        contadorProduto++;
                    })
                    
                    $('.fServico').each(function(){
                        var aux = $(this).attr('id').split('_');
                        
                        var td = "<tr>"+
                        "<td><b>S</b></td>"+
                        "<td>"+$('#fServicoNome_'+aux[1]).children().html()+"</td>"+
                        "<td>"+$('#fServicoQtd_'+aux[1]).val()+"</td>"+
                        "<td>"+$('#fServicoTotal_'+aux[1]).html()+"</td>"+
                        "</tr>";
                        
                        $('#tabela-itens').append(td);
                        
                        if(servicosId == ""){
                            servicosId       = aux[1];
                            servicosqtd      = $('#fServicoQtd_'+aux[1]).val().replace(',','.');
                            servicosvalores  = $('#fServicoValor_'+aux[1]).val().replace('R$ ','').replaceAll('.','').replace(',','.');
                        } else {
                            servicosId       = servicosId + '¬' + aux[1];
                            servicosqtd      = servicosqtd + '¬' + $('#fServicoQtd_'+aux[1]).val().replace(',','.'); 
                            servicosvalores  = servicosvalores + '¬' + $('#fServicoValor_'+aux[1]).val().replace('R$ ','').replaceAll('.','').replace(',','.');
                        }
                        
                        contadorServico++;
                    })
                    
                    
                    
                    imposto = baseIcms + baseSubIcms + icms + subIcms + ipi;
                    
                    total = parseFloat(totalProdutos.replace('R$ ', '').replaceAll('.','').replace(',','.')) + parseFloat(frete.replaceAll('.','').replace(',','.'));
                    
                    console.log(totalProdutos.replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    console.log(frete.replaceAll('.','').replace(',','.'));
                    console.log(imposto);
                    
                    $('#conForneclin').html($("#forneclin option:selected").text());
                    var data = $("#emissao").val().split('-');
                    
                    
                    $('#conEmissao').html(data[2]+'/'+data[1]+'/'+data[0]);
                    $('#conEspecie').html($("#especie option:selected").text());
                    $('#conOperacao').html($("#operacao option:selected").text());
                    $('#conNumero').html($("#numero").val());
                    $('#conSerie').html($("#serie").val());
                    
                    $('#conProdutos').val(totalProdutos);
                    
                    $('#conFrete').val(frete);
                    $('#conFrete').val('R$ ' + $('#conFrete').val());
                    
                    $('#conImposto').unmask().val(imposto.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    $('#conImposto').val('R$ ' + $('#conImposto').val());
                    
                    $('#conValor').val(valor);
                    $('#conValor').val('R$ ' + $('#conValor').val());
                    
                    $('#conTotal').unmask().val(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    $('#conTotal').val('R$ ' + $('#conTotal').val());
                    
                    $('#produtos').val(produtosId);
                    $('#quantidades').val(produtoqtd);
                    $('#produtovalores').val(produtovalores);
                    
                    $('#servicos').val(servicosId);
                    $('#servicosqtd').val(servicosqtd);
                    $('#servicosvalores').val(servicosvalores);
                    
                    $('#ctE').val(contadorProduto);
                    $('#ctD').val(contadorServico);
                }
            </script>
            
            <script>
                function temTransporte(){
                    if($('#switch1').prop('checked')){
                        $('#temtransportadora').show();
                    } else {
                        $('#temtransportadora').hide();
                        $('#transportadora').val('');
                        $('#cnpj').val('');
                        $('#placa').val('');
                    }
                }
            </script>
            
            <script>
                function salvar(){
                    if($('#conTotal').val() == $('#conValor').val()){
                        $('#formulario').submit();
                    } else {
                        $('#conTotal').focus();
                        $('#conValor').focus();
                        Swal.fire('','Valores da nota está incorreto!','error');
                    }
                }
            </script>
 
            <script>
                function somarTudo(){
                    var totalGeral = 0;
                    
                    $('.fProduto').each(function(){
                        var total = 0;
                        
                        var aux = $(this).attr('id').split('_');
                        
                        total = parseFloat($('#fQtd_'+aux[1]).val().replace(',','.')) * parseFloat($('#fValor_'+aux[1]).val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                        
                        $('#fTotal_'+aux[1]).unmask().html(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        $('#fTotal_'+aux[1]).html('R$ '+$('#fTotal_'+aux[1]).html());
                        
                        totalGeral = totalGeral + total;
                    })
                    
                    $('.fServico').each(function(){
                        var total = 0;
                        
                        var aux = $(this).attr('id').split('_');
                        
                        total = parseFloat($('#fServicoQtd_'+aux[1]).val().replace(',','.')) * parseFloat($('#fServicoValor_'+aux[1]).val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                        
                        $('#fServicoTotal_'+aux[1]).unmask().html(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        $('#fServicoTotal_'+aux[1]).html('R$ '+$('#fServicoTotal_'+aux[1]).html());
                        
                        totalGeral = totalGeral + total;
                    })
                    
                    $('#valorTotal').unmask().val(totalGeral.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    $('#valorTotal').val('R$ '+$('#valorTotal').val());

                }
            </script>
            
            
 
 
 
 
<!-----  SCRIPTS REFERENTES A PRODUTO INICIO |||||||| SCRIPTS REFERENTES A PRODUTO INICIO ||||||| SCRIPTS REFERENTES A PRODUTO INICIO-->
<!-----  SCRIPTS REFERENTES A PRODUTO INICIO |||||||| SCRIPTS REFERENTES A PRODUTO INICIO ||||||| SCRIPTS REFERENTES A PRODUTO INICIO-->
<!-----  SCRIPTS REFERENTES A PRODUTO INICIO |||||||| SCRIPTS REFERENTES A PRODUTO INICIO ||||||| SCRIPTS REFERENTES A PRODUTO INICIO-->
            
            <script>
                function colocarProduto(id){
                    if(checarProdutoExistente(id) == false){
                        construirTabelaProduto(id, $('#nome_'+id).html(), $('#valor_'+id).html());    
                    }
                    
                    somarTudo();
                    $('#addProduto').modal('hide');
                }
            </script>


            <script>
                function construirTabelaProduto(id, produto, valor){
                    var td = "<tr class='fProduto' id='fProduto_"+id+"'>" + 
                        "<td style='padding-top: 7px!important;' class='text-center'><b>P</b></td>" +
                        "<td style='padding-top: 13px!important;' id='fNome_"+id+"'><div class='encurtar' title='"+produto+"'>" + produto + "</div></td>" +
                        "<td class='text-center'><input onfocusout='somarTudo()' type='text' id='fValor_"+id+"' class='valor form-control' value='" + valor.replace('R$ ','') + "'></td>" +
                        "<td class='text-center'><input value='1' onfocusout='somarTudo()' min='1' id='fQtd_"+id+"' type='text' class='qtdProduto form-control'></td>" + 
                        "<td style='padding-top: 9px!important;' id='fTotal_"+id+"' class='totalProduto'></td>" + 
                        "<td class='text-center'>" +
                            "<i style='font-size: 20px;padding-top: 5px; color: red; cursor: pointer;' class='fa fa-times' aria-hidden='true' onclick='removeProduto("+id+")'></i>" + 
                        "</td>" +
                    "</tr>" ;
                    
                    $('#tabela-produto').append(td);
                    
                }
            </script>

            <script>
                function removeProduto(id){
                    $('#produto_'+id).css('background', 'white');
                    $('#fProduto_'+id).remove();
                    somarTudo();
                }
            </script>

            <script>
                function checarProdutoExistente(id){
                    var bool = false;
                    
                    $('#produto_'+id).css('background', '#cadfff');
                    
                    $('.totalProduto').each(function(){
                        var aux = $(this).attr('id').split('_');
                        if(aux[1] == id){
                            bool = true;
                        }
                    })
                    
                    return bool;
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
                                                    url: '<?php echo base_url('manutencao/pecaDinamicaReturnAll'); ?>',
                                                    method: 'post',
                                                    data: dados,
                                                    processData: false,
                                                    contentType: false,
                                                    dataType: 'json',
                                                    error: function(xhr, status, error) {
                                                        alert('sendPeca(): Error, check console');
                                                        console.log(xhr.responseText);
                                                    },
                                                    success: function(data) {
                                                        $('#produto_table').empty();
                                                        
                                                        for(i = 0; i < data.length; i++){
                                                            var tr_produto = "<tr style='cursor: pointer;' id='produto_"+data[i].produto_id+"' onclick='colocarProduto("+data[i].produto_id+")'>" +
                                                                "<td id='nome_"+data[i].produto_id+"'>"+data[i].produto_nome+"</td>"+
                                                                "<td id='modelo_"+data[i].produto_id+"'>"+data[i].produto_modelo+"</td>"+
                                                                "<td id='valor_"+data[i].produto_id+"'>R$ "+data[i].produto_preco_custo+"</td>"+
                                                            "</tr>";
                                                            
                                                            $('#produto_table').append(tr_produto);
                                                        }
                                                        
                                                        $('#produto_table').DataTable( {
                                                            destroy: true,
                                                            "language": {
                                                                "lengthMenu": "",
                                                                "zeroRecords": "Nenhum registro encontrado",
                                                                "info": "",
                                                                "infoEmpty": "",
                                                                "infoFiltered": "",
                                                                "sSearch":       "Procurar:",
                                                                "paginate": {
                                                                    "previous": "Anterior",
                                                                    "next": "Próximo",
                                                                }
                                                            },
                                                        } );
                                                        
                                                        hidePeca();

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
            


<!-----  SCRIPTS REFERENTES A PRODUTO FIM |||||||| SCRIPTS REFERENTES A PRODUTO FIM ||||||| SCRIPTS REFERENTES A PRODUTO FIM-->
<!-----  SCRIPTS REFERENTES A PRODUTO FIM |||||||| SCRIPTS REFERENTES A PRODUTO FIM ||||||| SCRIPTS REFERENTES A PRODUTO FIM-->
<!-----  SCRIPTS REFERENTES A PRODUTO FIM |||||||| SCRIPTS REFERENTES A PRODUTO FIM ||||||| SCRIPTS REFERENTES A PRODUTO FIM-->



            <script>
                function colocarServico(id){
                    if(checarServicoExistente(id) == false){
                        construirTabelaServico(id, $('#servicoNome_'+id).html(), $('#servicoValor_'+id).html());    
                    }
                    
                    somarTudo();
                    $('#addServico').modal('hide');
                }
            </script>


            <script>
                function construirTabelaServico(id, servico, valor){
                    var td = "<tr class='fServico' id='fServico_"+id+"'>" + 
                        "<td style='padding-top: 8px!important;' class='text-center'><b>S</b></td>" +
                        "<td style='padding-top: 13px!important;' id='fServicoNome_"+id+"'><div class='encurtar' title='"+servico+"'>" + servico + "</div></td>" +
                        "<td class='text-center'><input onfocusout='somarTudo()' type='text'  id='fServicoValor_"+id+"' class='valor form-control' value='" + valor.replace('R$ ','') + "'></td>" +
                        "<td class='text-center'><input value='1' onfocusout='somarTudo()' min='1' id='fServicoQtd_"+id+"' type='text' class='qtdServico form-control'></td>" + 
                        "<td style='padding-top: 9px!important;' id='fServicoTotal_"+id+"' class='totalServico'></td>" + 
                        "<td class='text-center'>" +
                            "<i style='font-size: 20px;padding-top: 5px; color: red; cursor: pointer;' class='fa fa-times' aria-hidden='true' onclick='removeServico("+id+")'></i>" + 
                        "</td>" +
                    "</tr>" ;
                    
                    $('#tabela-produto').append(td);
                    
                }
            </script>

            <script>
                function removeServico(id){
                    $('#servico_'+id).css('background', 'white');
                    $('#fServico_'+id).remove();
                    somarTudo();
                }
            </script>

            <script>
                function checarServicoExistente(id){
                    var bool = false;
                    
                    $('#servico_'+id).css('background', '#cadfff');
                    
                    $('.totalServico').each(function(){
                        var aux = $(this).attr('id').split('_');
                        if(aux[1] == id){
                            bool = true;
                        }
                    })
                    
                    return bool;
                }
            </script>
            
            
            <script>
                function dynamicServ(){
                    $('#novoServ').modal('show');
                    $('#addServico').modal('hide');
                }
                
                function hideServ(){
                    $('#serv_nome').val('');
                    $('#serv_valor').unmask().val('').mask("#.##0,0000", {reverse: true});
                    
                    $('#novoServ').modal('hide');
                    $('#addServico').modal('show');
                }
                
                function novoServ(){
                    if($('#serv_nome').val() != "" && $('#serv_nome').val() != " "){
                        if($('#serv_valor').val() != "" && $('#serv_valor').val() != " "){
                            dados = new FormData();
                            dados.append('nome', $('#serv_nome').val());
                            dados.append('valor', $('#serv_valor').val());
                            $.ajax({
                                url: '<?php echo base_url('financeiro/servicoDinamicoReturnAll'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                dataType: 'json',
                                error: function(xhr, status, error) {
                                    alert('novoServ(): Erro, verifique o console');
                                    console.log('novoServ(): '+xhr.responseText);
                                },
                                success: function(data) {
                                    $('#servico_table').empty();
                                    
                                    for(i = 0; i < data.length; i++){
                                        var tr_servico = "<tr style='cursor: pointer;' id='servico_"+data[i].servico_id+"' onclick='colocarServico("+data[i].servico_id+")'>" + 
                                            "<td id='servicoNome_"+data[i].servico_id+"'>"+data[i].servico_nome+"</td>" + 
                                            "<td id='servicoValor_"+data[i].servico_id+"'>R$ "+data[i].servico_custo+"</td>" + 
                                        "</tr>";
                                    
                                        $('#servico_table').append(tr_servico);
                                    }
                                    
                                    $('#servico_table').DataTable( {
                                        destroy: true,
                                        "language": {
                                            "lengthMenu": "",
                                            "zeroRecords": "Nenhum registro encontrado",
                                            "info": "",
                                            "infoEmpty": "",
                                            "infoFiltered": "",
                                            "sSearch":       "Procurar:",
                                            "paginate": {
                                                "previous": "Anterior",
                                                "next": "Próximo",
                                            }
                                        },
                                    } );
                                    
                                           
                                    
                                    hideServ();
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
            
