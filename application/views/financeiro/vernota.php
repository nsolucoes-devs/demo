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
                
                .local-con{
                    background: #dfecf5;
                }
                
                .local-con p{
                    color: #4a4646;
                }
                
                .local-con i{
                    color: #20c34b;
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
                                
                                <div class="row" style="margin-top: 1%; margin-bottom: 1%">
                                    <div class="col-md-2">
                                        <div id="div-tipo" class="local local-con local-active">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Parâmetro</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-check-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-produto" class="local local-con">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Itens</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-check-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-telaValor" class="local local-con">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Valores</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-check-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-conclusao" class="local local-con">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Resumo</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-check-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div id="tipo">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>PARÂMETROS DA NOTA #<?php echo $nota['notafiscal_id'] ?></b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-5 form-group">
                                                    <label for="numser"><b>Número:</b></label>
                                                    <input class="form-control" type="text" name="numero" id="numero" maxlength="26" value="<?php echo $nota['notafiscal_numero'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="numser"><b>Série:</b></label>
                                                    <input class="form-control" type="text" name="serie" id="serie" maxlength="26" value="<?php echo $nota['notafiscal_serie'] ?>" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data emissão:</b></label>
                                                    <input class="form-control" type="date" name="emissao" id="emissao" value="<?php echo $nota['notafiscal_dtemissao'] ?>" readonly>
                                                </div>
                                                
                                                
                                                <div class="col-md-4 form-group">
                                                    <label for="acrescimo"><b>Acréscimo:</b></label>
                                                    <input class="valor form-control" type="text" name="acrescimo" id="acrescimo" placeholder="Valor do acréscimo" value="<?php echo $nota['notafiscal_acrescimo'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="desconto"><b>Desconto:</b></label>
                                                    <input class="valor form-control" type="text" name="desconto" id="desconto" placeholder="Valor do desconto" value="<?php echo $nota['notafiscal_desconto'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="valor"><b>Valor da nota:</b></label>
                                                    <input class="form-control" type="text" name="valor" id="valor" value="<?php echo 'R$ ' . number_format($nota['notafiscal_valorfinal'], 4,',','.') ?>" readonly>
                                                </div>
                                                
                                                
                                                <div class="col-md-4 form-group">
                                                    <label for="tipo"><b>Espécie:</b></label>
                                                    <select  style="width: 100%!important" class="select2" id="especie" name="especie" disabled>
                                                        <option value="" selected disabled>Selecione a Espécie</option>
                                                        <option value="NOTA FISCAL">NOTA FISCAL</option>
                                                        <option value="NOTA DE SERVIÇO">NOTA DE SERVIÇO</option>
                                                        <option value="CUPOM FISCAL">CUPOM FISCAL</option>
                                                        <option value="RECIBO">RECIBO</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="tipo"><b>Tipo:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="tipo2" name="tipo" disabled>
                                                        <option value="" selected disabled> Selecione </option>
                                                        <option value="ENTRADA">Entrada</option>
                                                        <option value="SAIDA">Saída</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="tipo"><b>Operação:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="operacao" name="operacao" disabled>
                                                        <option value="" selected disabled> Selecione a Operação</option>
                                                        <?php foreach($tipos_e as $cnt){?>
                                                            <option value="<?php echo $cnt['tm_id'];?>"><?php echo ucwords(strtolower($cnt['tm_nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-7 form-group">
                                                    <label for="fornecedor"><b>Tomador:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forneclin" name="forneclin" disabled>
                                                        <option value="" selected disabled>Selecione o Tomador</option>
                                                        <?php foreach($forcli as $fcs){?>
                                                        <option value="<?php echo $fcs['id'];?>"><?php echo ucwords(strtolower($fcs['nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="chave"><b>Número OS:</b></label>
                                                    <input class="form-control" type="text" name="numos" id="numos" placeholder="Digite o número da OS" value="<?php echo $nota['notafiscal_numos'] ?>" readonly>
                                                </div>
                                                
                                                
                                                <div class="col-md-9 form-group">
                                                    <label for="chave"><b>Chave de acesso:</b></label>
                                                    <input class="form-control" type="text" name="chave" id="chave" value="<?php echo $nota['notafiscal_chave'] ?>" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="frete"><b>Frete:</b></label>
                                                    <input class="form-control" type="text" name="frete" id="frete" value="<?php echo 'R$ ' . number_format($nota['notafiscal_vlrfrete'], 4,',','.') ?>" readonly>
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
                                                    <input type="text" name="valorTotal" id="valorTotal" class="col-8 form-control" value="<?php echo $totalgeral ?>" readonly>
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
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($produtos as $p){ ?>
                                                                <tr>
                                                                    <td><b>P</b></td>
                                                                    <td><?php echo $p['nome'] ?></td>
                                                                    <td><?php echo $p['valor'] ?></td>
                                                                    <td><?php echo (float)$p['qtd'] ?></td>
                                                                    <td><?php echo $p['total'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            
                                                            <?php foreach($servicos as $s){ ?>
                                                                <tr>
                                                                    <td><b>S</b></td>
                                                                    <td><?php echo $s['nome'] ?></td>
                                                                    <td><?php echo $s['valor'] ?></td>
                                                                    <td><?php echo (float)$s['qtd'] ?></td>
                                                                    <td><?php echo $s['total'] ?></td>
                                                                </tr>
                                                            <?php } ?>
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
                                                            <button type="button" onclick="tipo()" class="btn btn-primary">Anterior</button>    
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
                                                    <input class="form-control" type="text" name="baseicms" id="baseicms" placeholder="R$" value="<?php echo 'R$ ' . number_format($nota['notafiscal_bcicms'], 4, ',','.') ?>" readonly>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label><b>Base de Cálculo do ICMS de Substituição:</b></label>
                                                    <input class="form-control" type="text" name="basesubicms" id="basesubicms" placeholder="R$" value="<?php echo 'R$ ' . number_format($nota['notafiscal_bcicmssub'], 4 ,',','.') ?>" readonly>
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor do ICMS:</b></label>
                                                    <input class="form-control" type="text" name="icms" id="icms" placeholder="R$" value="<?php echo 'R$ ' . number_format($nota['notafiscal_valoricms'], 4,',','.') ?>" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor do ICMS de Substituição:</b></label>
                                                    <input class="form-control" type="text" name="subicms" id="subicms" placeholder="R$" value="<?php echo 'R$ ' . number_format($nota['notafiscal_valoricmssub'], 4,',','.') ?>" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor do IPI:</b></label>
                                                    <input class="form-control" type="text" name="ipi" id="ipi" placeholder="R$" value="<?php echo 'R$ ' . number_format($nota['notafiscal_valoripi'], 4,',','.') ?>" readonly>
                                                </div>
                                                
                                                <div id="temtransportadora" style="width: 100%; display: none">
                                                    <div class="col-md-12 form-group">
                                                        <hr style="position: relative;margin: 0;top: 5px;">
                                                    </div>
                                                    
                                                    <div class="col-md-4 form-group">
                                                        <label><b>Transportadora:</b></label>
                                                        <input class="form-control" type="text" name="transportadora" id="transportadora" value="<?php echo $nota['notafiscal_nometrans'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label><b>CNPJ transportador:</b></label>
                                                        <input class="form-control cnpj" type="text" name="cnpj" id="cnpj" value="<?php echo $nota['notafiscal_cnpjtrans'] ?>" readonly>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label><b>Placa do veículo:</b></label>
                                                        <input class="form-control" type="text" name="placa" id="placa" value="<?php echo $nota['notafiscal_placaveic'] ?>" readonly>
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
                                                                <input onchange="temTransporte()" type="checkbox" class="custom-control-input" id="switch1" disabled>
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
                                                        <tbody>
                                                            <?php foreach($produtos as $p){ ?>
                                                                <tr>
                                                                    <td><b>P</b></td>
                                                                    <td><?php echo $p['nome'] ?></td>
                                                                    <td><?php echo (float)$p['qtd'] ?></td>
                                                                    <td><?php echo $p['total'] ?></td>
                                                                </tr>
                                                            <?php } ?>
                                                            
                                                            <?php foreach($servicos as $s){ ?>
                                                                <tr>
                                                                    <td><b>S</b></td>
                                                                    <td><?php echo $s['nome'] ?></td>
                                                                    <td><?php echo (float)$s['qtd'] ?></td>
                                                                    <td><?php echo $s['total'] ?></td>
                                                                </tr>
                                                            <?php } ?>
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
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('#especie').val('<?php echo $nota['notafiscal_especie'] ?>').change();
                    $('#operacao').val(<?php echo $nota['notafiscal_operacao'] ?>).change();
                    $('#forneclin').val('<?php if($nota['notafiscal_cliente'] == 1) { echo 'C|' . $nota['notafiscal_fornecedor']; } else {echo 'F|' . $nota['notafiscal_fornecedor']; };?>').change();
                    $('#tipo2').val('<?php echo $tipo['tm_tipo'] ?>').change();
                    
                    <?php if($nota['notafiscal_nometrans'] != null){ ?>
                        $('#switch1').attr('checked', true);
                        temTransporte();
                    <?php } ?>
                    
                    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                    $('.select2').select2({theme: "bootstrap"});
                    $('.valor').mask("#.##0,0000", {reverse: true});
                })
            </script>
            
            <script>
                function tipo(){
                    $('#tipo').show();
                    $('#div-tipo').addClass('local-active');
                    
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

                    $('#tipo').hide();
                    $('#div-tipo').removeClass('local-active');
                    
                    $('#produto').show();
                    $('#div-produto').addClass('local-active');
                    
                    $('#telaValor').hide();
                    $('#div-telaValor').removeClass('local-active');
                    
                    $('#conclusao').hide();
                    $('#div-conclusao').removeClass('local-active');

                }
            </script>
            
            <script>
                function telaValor(){

                    $('#tipo').hide();
                    $('#div-tipo').removeClass('local-active');
                    
                    $('#produto').hide();
                    $('#div-produto').removeClass('local-active');
                    
                    $('#telaValor').show();
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
                    
                    $('#conclusao').show();
                    $('#div-conclusao').addClass('local-active');
                }
            </script>
            
            <script>
                function mostrarFinal(){
                    var produtos        = 'Produto - Quantidade - Total'; 
                    var imposto         = 0;
                    var baseIcms        = parseFloat($('#baseicms').val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    var baseSubIcms     = parseFloat($('#basesubicms').val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    var icms            = parseFloat($('#icms').val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    var subIcms         = parseFloat($('#subicms').val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    var ipi             = parseFloat($('#ipi').val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    var frete           = $('#frete').val();
                    var totalProdutos   = $('#valorTotal').val();
                    var total           = 0;
                    var valor           = $('#valor').val();
                    
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
                    })
                    
                    
                    imposto = baseIcms + baseSubIcms + icms + subIcms + ipi;
                    
                    total = parseFloat(totalProdutos.replace('R$ ', '').replaceAll('.','').replace(',','.')) + parseFloat(frete.replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    
                    $('#conForneclin').html($("#forneclin option:selected").text());
                    var data = $("#emissao").val().split('-');
                    
                    
                    $('#conEmissao').html(data[2]+'/'+data[1]+'/'+data[0]);
                    $('#conEspecie').html($("#especie option:selected").text());
                    $('#conOperacao').html($("#operacao option:selected").text());
                    $('#conNumero').html($("#numero").val());
                    $('#conSerie').html($("#serie").val());
                    
                    $('#conProdutos').val(totalProdutos);
                    
                    $('#conFrete').val(frete);
                    
                    $('#conImposto').unmask().val(imposto.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    $('#conImposto').val('R$ ' + $('#conImposto').val());
                    
                    $('#conValor').val(valor);
                    
                    $('#conTotal').unmask().val(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    $('#conTotal').val('R$ ' + $('#conTotal').val());
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
                function somarTudo(){
                    var totalGeral = 0;
                    
                    $('.fProduto').each(function(){
                        var total = 0;
                        
                        var aux = $(this).attr('id').split('_');
                        
                        total = parseFloat($('#fQtd_'+aux[1]).val().replace(',','.')) * parseFloat($('#fValor_'+aux[1]).html().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                        
                        $('#fTotal_'+aux[1]).unmask().html(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        $('#fTotal_'+aux[1]).html('R$ '+$('#fTotal_'+aux[1]).html());
                        
                        totalGeral = totalGeral + total;
                    })
                    
                    $('.fServico').each(function(){
                        var total = 0;
                        
                        var aux = $(this).attr('id').split('_');
                        
                        total = parseFloat($('#fServicoQtd_'+aux[1]).val().replace(',','.')) * parseFloat($('#fServicoValor_'+aux[1]).html().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                        
                        $('#fServicoTotal_'+aux[1]).unmask().html(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        $('#fServicoTotal_'+aux[1]).html('R$ '+$('#fServicoTotal_'+aux[1]).html());
                        
                        totalGeral = totalGeral + total;
                    })
                    
                    $('#valorTotal').unmask().val(totalGeral.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    $('#valorTotal').val('R$ '+$('#valorTotal').val());

                }
            </script>
 

            
