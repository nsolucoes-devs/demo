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
                
                .local-active, .local-active p, .local-active i{
                    color: #4a4646!important;
                    background: #dfecf5!important;
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
                                <form action="<?php echo base_url('titulobaixa') ?>" method="post">
                                    
                                <input type="hidden" name="titulos" id="titulos">
                                <input type="hidden" name="frotas" id="frotas">
                                <input type="hidden" name="valoresFrota" id="valoresFrota">
                                
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
                                        <div id="div-detalhe" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Detalhes</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-titulo" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Títulos</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-rateio" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Rateio</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-conclusao" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Conclusão</b></p>
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
                                                    <h3><b>PARÂMETROS DO TÍTULO</b></h3>
                                                    <hr style="margin-top: 0">
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
                                                    <label for="tipo"><b>Espécie:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="especie" name="especie" required disabled>
                                                        <option value="" selected disabled> Selecione </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="numser"><b>N° Doc:</b></label>
                                                    <input class="form-control" type="text" name="numser" id="numser" maxlength="26" required>
                                                </div>
                                                
                                                <div class="col-md-8 form-group">
                                                    <label for="fornecedor"><b>Tomador:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forneclin" name="forneclin" required>
                                                        <option value="" selected disabled>Selecione o Tomador</option>
                                                        <?php foreach($forcli as $fcs){?>
                                                        <option value="<?php echo $fcs['id'];?>"><?php echo ucwords(strtolower($fcs['nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="numser"><b>N° OS:</b></label>
                                                    <input class="form-control" type="text" name="numos" id="numos" maxlength="26">
                                                </div>
                                            </div>
                                            <div class="row" style="position: relative;top: 86px!important;">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 0;">
                                                </div>
                                                <div class="col-md-12 form-group text-right">
                                                    <button type="button" onclick="detalhe()" class="btn btn-primary">Próximo</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div id="detalhe" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>DETALHES</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <label><b>Data vencimento:</b></label>
                                                    <input class="form-control" type="date" name="vencimento" id="vencimento" value="<?php echo date('Y-m-d') ?>">
                                                </div>
                                                <div class="col-md-3">
                                                    <label><b>Data baixa:</b></label>
                                                    <input class="form-control" type="date" name="baixa" id="baixa" value="<?php echo date('Y-m-d') ?>">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="forma"><b>Forma de pagamento:</b></label>
                                                    <select class="select2" id="forma" name="forma">
                                                        <option value="" disabled selected> Selecione </option>
                                                        <option value='DINHEIRO'>DINHEIRO</option>
                                                        <option value='PIX'>PIX</option>
                                                        <option value='TRANSFERENCIA'>TRANSFERÊNCIA</option>
                                                        <option value='BOLETO'>BOLETO</option>
                                                        <option value='CARTÃO DE CREDITO'>CARTÃO DE CRÉDITO</option>
                                                        <option value='PERMUTA'>PERMUTA</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="valor"><b>Valor:</b></label>
                                                    <input class="valor form-control" type="text" name="valor" id="valor">
                                                </div>
                                                
                                                <div class="col-md-12 form-group">
                                                    <label for="obs"><b>Observação:</b></label>
                                                    <textarea class="form-control" rows=2 name="obs" id="obs"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 40px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: 66px!important;">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" onclick="irTipo()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="titulo()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div id="titulo" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>TÍTULOS</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor Total:</b></label>
                                                    <input type="text" name="valorTotal" id="valorTotal" class="valor form-control" value="0,0000" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label><b>Restante:</b></label>
                                                    <input type="text" name="restante" id="restante" class="valor form-control" value="0,0000" readonly>
                                                </div>
                                                <div class="col-md-4 form-group text-right">
                                                    <button type="button" style="margin-top: 25px;" class="btn-block btn btn-primary" data-toggle="modal" data-target="#addTitulo" id="buttonTitulo">Adicionar Título</button>
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 2%;">
                                                    <table id="multi2" class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 15%!important">Vencimento</th>
                                                                <th class="text-center" style="width: 20%!important">Nº DOC</th>
                                                                <th class="text-center" style="width: 20%!important">Espécie</th>
                                                                <th class="text-center" style="width: 20%!important">Tomador</th>
                                                                <th class="text-center" style="width: 15%!important">Valor</th>
                                                                <th style="width: 15%!important"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabela-titulo">
                                                            
                                                        </tbody>
                                                        <p style="text-align: center" id="aviso-titulo">Nenhum título selecionado</p>
                                                    </table>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 40px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 35px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <div class="custom-control custom-switch text-left" style="top: calc(100% - 30px); width: 50%">
                                                                <input type="checkbox" class="custom-control-input" id="switch1" checked>
                                                                <label class="custom-control-label" for="switch1">Tem rateio de frota?</label>
                                                            </div>
                                                            <button type="button" onclick="detalhe()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="rateio('titulo')" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div id="rateio" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>RATEIO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                
                                                <div class="col-md-4 form-group">
                                                    <label><b>Valor Total:</b></label>
                                                    <input type="text" name="valorTotalFrota" id="valorTotalFrota" class="valor form-control" value="0,0000" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label><b>Restante:</b></label>
                                                    <input type="text" name="restanteFrota" id="restanteFrota" class="valor form-control" value="0,0000" readonly>
                                                </div>
                                                <div class="col-md-4 form-group text-right">
                                                    <button type="button" style="margin-top: 25px;" class="btn-block btn btn-primary" data-toggle="modal" data-target="#addFrota" id="buttonFrota">Adicionar Frota</button>
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 2%;">
                                                    <table id="multi2" class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 15%!important">Frota</th>
                                                                <th class="text-center" style="width: 20%!important">Placa</th>
                                                                <th class="text-center" style="width: 15%!important">Valor</th>
                                                                <th style="width: 15%!important"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabela-frota">
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="margin: 0">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 20px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" onclick="titulo()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="conclusao('normal')" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="conclusao" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>CONCLUSÃO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label><b>N° Doc:</b></label>
                                                    <input type="text" id="conIdentificao" name="conIdentificao" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label><b>N° OS:</b></label>
                                                    <input type="text" id="conNumos" name="conNumos" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label><b>Tomador:</b></label>
                                                    <input type="text" id="conForneclin" name="conForneclin" class="form-control" readonly>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data Vencimento:</b></label>
                                                     <input type="date" name="conVen" id="conVen" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data Baixa:</b></label>
                                                     <input type="date" name="conData" id="conData" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label><b>Forma de pagamento: </b></label>
                                                    <input type="text" name="conForma" id="conForma" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label><b>Total Baixa: </b></label>
                                                    <input type="text" name="conTotal" id="conTotal" class="form-control" readonly>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Tipo:</b></label>
                                                    <input type="text" id="conTipo" id="conTipo" class="form-control" readonly>
                                                </div>
                                                <div class="col-md-9 form-group">
                                                    <label><b>Espécie:</b></label>
                                                    <input type="text" id="conEspecie" id="conEspecie" class="form-control" readonly>
                                                </div>
                                                
                                                <div class="col-md-5 form-group">
                                                    <label><b>Rateio Frotas:</b></label>
                                                    <textarea style="height: 150px" class="form-control" id="conRateio" name="conRateio" disabled></textarea>
                                                </div>
                                                <div class="col-md-7 form-group">
                                                    <label><b>Títulos:</b></label>
                                                     <textarea style="height: 150px" class="form-control" id="conTitulo" name="conTitulo" readonly></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 10px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 20px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" onclick="rateio('conclusao')" class="btn btn-primary">Anterior</button>    
                                                            <button type="submit" class="btn btn-primary">Salvar</button>    
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
                <div class="modal fade" id="addTitulo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" style="width: 80%;margin: 1% 0 0 10%;max-width: 100%;}">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>ADICIONAR TÍTULO</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <p style="font-size: 15px; text-align: center"><b>Clique no título para adicionar</b></p>
                        <table id="multi" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class='text-center' style="width: 5%!important">Vencimento</th>
                                    <th class='text-center' style="width: 25%!important">Nº DOC</th>
                                    <th class='text-center' style="width: 10%!important">Espécie</th>
                                    <th class='text-center' style="width: 20%!important">Tomador</th>
                                    <th class='text-center' style="width: 40%!important">Valor</th>
                                </tr>
                            </thead>
                            <tbody id="tabela-complet">
                             
                            </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
                
                
                
            <!-- Modal -->
                <div class="modal fade" id="addFrota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document" style="width: 50%;margin: 5% 0 0 25%;max-width: 100%;}">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>ADICIONAR FROTA</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <p style="font-size: 15px;position: absolute;top: 20px;left: 33px;"><b>Clique na frota para adicionar</b></p>
                        <table id="frota" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class='text-center' style="width: 40%!important">Frota</th>
                                    <th class='text-center' style="width: 60%!important">Placa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($frota as $f){ ?>
                                   <tr style='cursor: pointer;' id="frota_<?php echo $f['frota_id'] ?>" onclick='colocarFrota(<?php echo $f['frota_id'] ?>)'>
                                        <td class='text-center' id="codigo_<?php echo $f['frota_id'] ?>"><?php echo $f['frota_codigo'] ?></td>
                                        <td class='text-center' id="placa_<?php echo $f['frota_id'] ?>"><?php echo $f['frota_placa'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>
                  </div>
                </div>
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    var table = $('#frota').DataTable( {
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
                            $('#especie').empty();
                            
                            for(i = 0; i < data.length;i++){
                                $('#especie').append($('<option>', {
                                    value: data[i].tm_id,
                                    text: data[i].tm_nome,
                                }));
                            }
                            $('#especie').prop('disabled', false);
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
                    
                    $('#detalhe').hide();
                    $('#div-detalhe').removeClass('local-active');
                    
                    $('#titulo').hide();
                    $('#div-titulo').removeClass('local-active');
                    
                    $('#rateio').hide();
                    $('#div-rateio').removeClass('local-active');
                    
                    $('#conclusao').hide();
                    $('#div-conclusao').removeClass('local-active');
                }
            </script>
            
            <script>
                function detalhe(){
                    if($('#tipo2').val() == "" || $('#tipo2').val() == " " || $('#tipo2').val() == null){
                        $('#tipo2').focus();
                        Swal.fire('','Selecione um tipo!','error');
                    } else {
                        if($('#especie').val() == "" || $('#especie').val() == " " || $('#especie').val() == null){
                            $('#especie').focus();
                            Swal.fire('','Selecione a espécie!','error');
                        } else {
                            if($('#numser').val() == "" || $('#numser').val() == " " || $('#numser').val() == null){
                                $('#numser').focus();
                                Swal.fire('','Informa o número do documento da baixa!','error');
                            } else {
                                if($('#forneclin').val() == "" || $('#forneclin').val() == " " || $('#forneclin').val() == null){
                                    $('#forneclin').focus();
                                    Swal.fire('','Selecione um fornecedor ou cliente!','error');
                                } else {
                                    populaT();
                                    
                                    $('#tipo').hide();
                                    $('#div-tipo').removeClass('local-active');
                                    $('#div-tipo').children().children().last().children().removeClass('fa-square-o')
                                    $('#div-tipo').children().children().last().children().addClass('fa-check-square-o')
                                    $('#div-tipo').addClass('local-con');
                                    
                                    $('#detalhe').show();
                                    $('#div-detalhe').addClass('local-active');
                                    
                                    $('#titulo').hide();
                                    $('#div-titulo').removeClass('local-active');
                                    
                                    $('#rateio').hide();
                                    $('#div-rateio').removeClass('local-active');
                                    
                                    $('#conclusao').hide();
                                    $('#div-conclusao').removeClass('local-active');
                                }
                            }
                        }
                    }
                }
            </script>
            
            <script>    
                function titulo(){
                    if($('#vencimento').val() == "" || $('#vencimento').val() == " " || $('#vencimento').val() == null){
                        $('#vencimento').focus();
                        Swal.fire('','Selecione uma data de vencimento!','error');
                    } else {
                        if($('#baixa').val() == "" || $('#baixa').val() == " " || $('#baixa').val() == null){
                            $('#baixa').focus();
                            Swal.fire('','Selecione uma data para a baixa!','error');
                        } else {
                            if($('#forma').val() == "" || $('#forma').val() == " " || $('#forma').val() == null){
                                $('#forma').focus();
                                Swal.fire('','Selecione uma forma de pagamento!','error');
                            } else {
                                if($('#valor').val() == "" || $('#valor').val() == " " || $('#valor').val() == null){
                                    $('#valor').focus();
                                    Swal.fire('','Digite o valor a ser pago!','error');
                                } else {
                                    $('#tipo').hide();
                                    $('#div-titulo').removeClass('local-active');
                                    
                                    $('#detalhe').hide();
                                    $('#div-detalhe').removeClass('local-active');
                                    $('#div-detalhe').children().children().last().children().removeClass('fa-square-o')
                                    $('#div-detalhe').children().children().last().children().addClass('fa-check-square-o')
                                    $('#div-detalhe').addClass('local-con');
                                    
                                    $('#titulo').show();
                                    $('#div-titulo').addClass('local-active');
                                    
                                    $('#rateio').hide();
                                    $('#div-rateio').removeClass('local-active');
                                    
                                    $('#conclusao').hide();
                                    $('#div-conclusao').removeClass('local-active');
                                    
                                    $('#restante').val('R$ ' + $('#valor').val());
                                    $('#valorTotal').val('R$ ' + $('#valor').val());
                                    
                                    somarTudo();
                                }
                            }
                        }
                    }
                }
            </script>
            
            <script>
                function rateio(local){
                    if(local == 'titulo'){
                        if($('#restante').val() == '0,0000'){
                            if($('#switch1').prop('checked')){
                                $('#tipo').hide();
                                $('#div-tipo').removeClass('local-active');
                                
                                $('#detalhe').hide();
                                $('#div-detalhe').removeClass('local-active');
                                
                                $('#titulo').hide();
                                $('#div-titulo').removeClass('local-active');
                                $('#div-titulo').children().children().last().children().removeClass('fa-square-o')
                                $('#div-titulo').children().children().last().children().addClass('fa-check-square-o')
                                $('#div-titulo').addClass('local-con');
                                
                                $('#rateio').show();
                                $('#div-rateio').addClass('local-active');
                                
                                $('#conclusao').hide();
                                $('#div-conclusao').removeClass('local-active');
                                
                                $('#valorTotalFrota').val($('#valor').val());
                                somarTudoFrota();
                            } else {
                                conclusao('direto');
                                mostrarFinal('direto');
                            }
                            
                        } else {
                            Swal.fire('','Confira o valor total dos títulos!','error');
                        }
                    } else {
                        if($('#switch1').prop('checked')){
                            rateio('titulo');
                        } else {
                            titulo();
                        }
                    }
                    
                    
                }
            </script>
            
            <script>
                function conclusao(local){
                    
                    
                    if(local == 'normal'){
                       if($('#restanteFrota').val() == '0,0000'){
                            $('#tipo').hide();
                            $('#div-tipo').removeClass('local-active');
                            
                            $('#detalhe').hide();
                            $('#div-detalhe').removeClass('local-active');
                            
                            $('#titulo').hide();
                            $('#div-titulo').removeClass('local-active');
                            
                            $('#rateio').hide();
                            $('#div-rateio').removeClass('local-active');
                            $('#div-rateio').children().children().last().children().removeClass('fa-square-o')
                            $('#div-rateio').children().children().last().children().addClass('fa-check-square-o')
                            $('#div-rateio').addClass('local-con');
                            
                            $('#conclusao').show();
                            $('#div-conclusao').addClass('local-active');
                            
                            mostrarFinal('normal');
                        } else {
                            Swal.fire('','Confira o valor total do rateio das frotas!','error');
                        } 
                    } else {
                        $('#tipo').hide();
                        $('#div-tipo').removeClass('local-active');
                        
                        $('#detalhe').hide();
                        $('#div-detalhe').removeClass('local-active');
                        
                        $('#titulo').hide();
                        $('#div-titulo').removeClass('local-active');
                        $('#div-titulo').children().children().last().children().removeClass('fa-square-o')
                        $('#div-titulo').children().children().last().children().addClass('fa-check-square-o')
                        $('#div-titulo').addClass('local-con');
                        
                        $('#rateio').hide();
                        $('#div-rateio').removeClass('local-active');
                        $('#div-rateio').children().children().last().children().removeClass('fa-square-o')
                        $('#div-rateio').children().children().last().children().addClass('fa-check-square-o')
                        $('#div-rateio').addClass('local-con');
                        
                        $('#conclusao').show();
                        $('#div-conclusao').addClass('local-active');
                    }
                    
                }
            </script>
            
            <script>
                function mostrarFinal(local){
                    $('#conTotal').val('R$ ' + $('#valor').val());
                    $('#conForma').val($("#forma option:selected").text());
                    $('#conData').val($('#baixa').val());
                    $('#conVen').val($('#vencimento').val());
                    $('#conForneclin').val($("#forneclin option:selected").text());
                    $('#conEspecie').val($("#especie option:selected").text());
                    $('#conIdentificao').val($('#numser').val());
                    $('#conNumos').val($('#numos').val());
                    $('#conTipo').val($('#tipo2').val());
                    var titulos = "";
                    var idTitulos = "";
                        
                    $('.Ftitulo').each(function(){
                        titulos = titulos + $(this).children().eq(1).children().children().html();
                        titulos = titulos + ' - ' + $(this).children().eq(4).html();
                        titulos = titulos + '&#13;';
                        
                        var idTitulo = $(this).prop('id').split('_');
                        
                        if(idTitulos == ""){
                            idTitulos = idTitulo[1];
                        } else {
                            idTitulos = idTitulos + '¬' + idTitulo[1];
                        }
                    })
                    
                    $('#titulos').val(idTitulos);
                    
                    $('#conTitulo').html(titulos);

                    if(local == 'normal'){
                        var rateio = "";
                        
                        var idFrotas    = "";
                        var fValores    = "";
                        
                        $('.Ffrota').each(function(){
                            rateio = rateio + $(this).children().first().html();
                            rateio = rateio + ' - ' + $(this).children().eq(1).html();
                            rateio = rateio + ' - R$' + $(this).children().eq(2).children().val();
                            rateio = rateio + '&#13;';
                            
                            var idFrota = $(this).prop('id').split('_');
                            var fValor = $(this).children().eq(2).children().val();
                        
                            if(idFrotas == ""){
                                idFrotas    = idFrota[1];
                                fValores    = fValor.replaceAll('.','').replace(',','.');
                            } else {
                                idFrotas    = idFrotas + '¬' + idFrota[1];
                                fValores    = fValores + '¬' + fValor.replaceAll('.','').replace(',','.');
                            }
                        })
                        
                        $('#frotas').val(idFrotas);
                        $('#valoresFrota').val(fValores);
                        
                        $('#conRateio').html(rateio);
                    } else {
                        $('#conRateio').html('Não tem rateio de frota');
                    }
                    
                }
            </script>
            
<!-----  SCRIPTS REFERENTES AOS TÍTULOS INICIO |||||||| SCRIPTS REFERENTES AOS TÍTULOS INICIO ||||||| SCRIPTS REFERENTES AOS TÍTULOS INICIO-->
<!-----  SCRIPTS REFERENTES AOS TÍTULOS INICIO |||||||| SCRIPTS REFERENTES AOS TÍTULOS INICIO ||||||| SCRIPTS REFERENTES AOS TÍTULOS INICIO-->
<!-----  SCRIPTS REFERENTES AOS TÍTULOS INICIO |||||||| SCRIPTS REFERENTES AOS TÍTULOS INICIO ||||||| SCRIPTS REFERENTES AOS TÍTULOS INICIO-->
            
            <script>
                function populaT(){
                    var table = $('#multi').DataTable();
                    table.destroy();
                    
                    dados = new FormData();
                    dados.append('especie', $('#especie').val());
                    dados.append('forneclin', $('#forneclin').val());
                    
                    $.ajax({
                        url: '<?php echo base_url('financeiro/populaT'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        error: function(xhr, status, error) {
                            alert('populaT: Erro, verifique o console');
                            console.log('populaT: '+xhr.responseText);
                        },
                        success: function(data) {
                            $('#tabela-complet').empty();
                            
                            if(data != ''){
                                for(i = 0; i < data.length; i++){
                                    construirTabela(data[i].id, data[i].vencimento, data[i].numeroserie, data[i].tipo, data[i].fornecedor, data[i].valor, '#tabela-complet');
                                }
                                
                                iniciarDataTable();
                            } else {
                                irTipo();
                                Swal.fire('','Nenhum título encontrado!','error');
                            }
                        },
                    });
                }
            </script>
            
            <script>
                function construirTabela(id, vencimento, numeroserie, tipo, forneclin, valor, tabela){
                    if(tabela == '#tabela-complet'){
                        var td = "<tr style='cursor: pointer;'  id='titulo_"+id+"'  onclick='colocarTitulo("+id+")'>" + 
                            "<td class='text-center' style='padding-top: 4px!important;' id='venc_"+id+"'>" + vencimento + "</td>" +
                            "<td style='padding-top: 9px!important;' id='numser_"+id+"'><div class='encurtar' title='" + numeroserie + "'>" + numeroserie + "</div></td>" +
                            "<td style='padding-top: 9px!important;' id='tipo_"+id+"'><div class='encurtar' title='" + tipo + "'>" + tipo + "</div></td>" +
                            "<td style='padding-top: 9px!important;' id='forneclin_"+id+"'><div class='encurtar' title='" + forneclin + "'>" + forneclin + "</div></td>" +
                            "<td class='text-center' style='padding-top: 4px!important;' id='valor_"+id+"'>" + valor + "</td>" + 
                        "</tr>" ;
                    } else {
                        var td = "<tr class='Ftitulo' id='Ftitulo_"+id+"'>" + 
                            "<td class='text-center' id='Fvenc_"+id+"'>" + vencimento + "</td>" +
                            "<td style='padding-top: 7px!important;' id='Fnumser_"+id+"'><div class='encurtar' title='" + numeroserie + "'>" + numeroserie + "</div></td>" +
                            "<td style='padding-top: 7px!important;' id='Ftipo_"+id+"'><div class='encurtar' title='" + tipo + "'>" + tipo + "</div></td>" +
                            "<td style='padding-top: 7px!important;' id='Fforneclin_"+id+"'><div class='encurtar' title='" + forneclin + "'>" + forneclin + "</div></td>" +
                            "<td class='text-center Fvalor' id='Fvalor_"+id+"'>" + valor + "</td>" + 
                            "<td class='text-center'>" +
                                "<i style='font-size: 20px;padding-top: 5px; color: red; cursor: pointer;' class='fa fa-times' aria-hidden='true' onclick='remove("+id+")'></i>" + 
                            "</td>" +
                        "</tr>" ;
                    }
                        
    
                    $(tabela).append(td);
                    
                }
            </script>
            
            <script>
                function iniciarDataTable(){
                    var table = $('#multi').DataTable( {
                        "order": [[ 0, "desc" ]],
                        "language": {
                            "lengthMenu": "Mostrar _MENU_",
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
                }
            </script>
            
            <script>
                function colocarTitulo(id){
                    if(checarTituloExistente(id) == false){
                        construirTabela(id, $('#venc_' + id).html(), $('#numser_' + id).html(), $('#tipo_' + id).html(), $('#forneclin_' + id).html(), $('#valor_' + id).html(), '#tabela-titulo');    
                    }
                    
                    $('#aviso-titulo').hide();
                    somarTudo();
                    $('#addTitulo').modal('hide');
                }
            </script>
            
            <script>
                function checarTituloExistente(id){
                    var bool = false;
                    
                    $('#titulo_'+id).css('background', '#cadfff');
                    
                    $('.Fvalor').each(function(){
                        var aux = $(this).attr('id').split('_');
                        if(aux[1] == id){
                            bool = true;
                        }
                    })
                    
                    return bool;
                }
            </script>
            
            <script>
                function somarTudo(){
                    var total = 0;
                    
                    $('.Fvalor').each(function(){
                        total = total + parseFloat($(this).html().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    })
                    
                    restante = $('#valor').val().replaceAll('.','').replace(',','.') - total;
                    
                    if(restante >= 0){
                        $('#restante').unmask().val(restante.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    } else if(restante < 0){
                        var gui = $('#restante').unmask().val(restante.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        $('#restante').val('R$ -' + gui.val());
                    }
                    
                    
                }
            </script>
            
            <script>
                function remove(id){
                    $('#titulo_'+id).css('background', 'white');
                    $('#Ftitulo_'+id).remove();
                    somarTudo();
                }
            </script>
            
<!-----  SCRIPTS REFERENTES AOS TÍTULOS FIM |||||||| SCRIPTS REFERENTES AOS TÍTULOS FIM ||||||| SCRIPTS REFERENTES AOS TÍTULOS FIM-->
<!-----  SCRIPTS REFERENTES AOS TÍTULOS FIM |||||||| SCRIPTS REFERENTES AOS TÍTULOS FIM ||||||| SCRIPTS REFERENTES AOS TÍTULOS FIM-->
<!-----  SCRIPTS REFERENTES AOS TÍTULOS FIM |||||||| SCRIPTS REFERENTES AOS TÍTULOS FIM ||||||| SCRIPTS REFERENTES AOS TÍTULOS FIM-->
 
 
 
 
 
 
 
 
<!-----  SCRIPTS REFERENTES A FROTA INICIO |||||||| SCRIPTS REFERENTES A FROTA INICIO ||||||| SCRIPTS REFERENTES A FROTA INICIO-->
<!-----  SCRIPTS REFERENTES A FROTA INICIO |||||||| SCRIPTS REFERENTES A FROTA INICIO ||||||| SCRIPTS REFERENTES A FROTA INICIO-->
<!-----  SCRIPTS REFERENTES A FROTA INICIO |||||||| SCRIPTS REFERENTES A FROTA INICIO ||||||| SCRIPTS REFERENTES A FROTA INICIO-->
            
            <script>
                var gbl_frota = "";
            </script>
            
            
            <script>
                function colocarFrota(id){
                    if(checarFrotaExistente(id) == false){
                        construirTabelaFrota(id, $('#codigo_'+id).html(), $('#placa_'+id).html());    
                    }
                    
                    $('#aviso-frota').hide();
                    somarTudoFrota();
                    $('#addFrota').modal('hide');
                }
            </script>


            <script>
                function construirTabelaFrota(id, codigo, placa){
                    var td = "<tr class='Ffrota' id='Ffrota_"+id+"'>" + 
                        "<td class='text-center'>" + codigo + "</td>" +
                        "<td class='text-center'>" + placa + "</td>" +
                        "<td class='text-center'><input value='0,0000' onfocusout='somarTudoFrota()' id='valorFrota_"+id+"' type='text' class='valor valorFrota form-control'></td>" + 
                        "<td class='text-center'>" +
                            "<i style='font-size: 20px;padding-top: 5px; color: red; cursor: pointer;' class='fa fa-times' aria-hidden='true' onclick='removeFrota("+id+")'></i>" + 
                        "</td>" +
                    "</tr>" ;
                    
                    
                    $('#tabela-frota').append(td);
                    
                }
            </script>

            <script>
                function removeFrota(id){
                    $('#frota_'+id).css('background', 'white');
                    $('#Ffrota_'+id).remove();
                    somarTudoFrota();
                }
            </script>

            <script>
                function checarFrotaExistente(id){
                    var bool = false;
                    
                    $('#frota_'+id).css('background', '#cadfff');
                    
                    $('.valorFrota').each(function(){
                        var aux = $(this).attr('id').split('_');
                        if(aux[1] == id){
                            bool = true;
                        }
                    })
                    
                    return bool;
                }
            </script>
            
            <script>
                function somarTudoFrota(){
                    var total = 0;
                    
                    $('.valorFrota').each(function(){
                        total = total + parseFloat($(this).val().replace('R$ ', '').replaceAll('.','').replace(',','.'));
                    })
                    
                    restante = $('#valor').val().replaceAll('.','').replace(',','.') - total;
                    
                    if(restante >= 0){
                        $('#restanteFrota').unmask().val(restante.toFixed(4)).mask("#.##0,0000", {reverse: true});
                    } else if(restante < 0){
                        var gui = $('#restanteFrota').unmask().val(restante.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        $('#restanteFrota').val('R$ -' + gui.val());
                    }
                    
                    
                }
            </script>

































<!-----  SCRIPTS REFERENTES A FROTA FIM |||||||| SCRIPTS REFERENTES A FROTA FIM ||||||| SCRIPTS REFERENTES A FROTA FIM-->
<!-----  SCRIPTS REFERENTES A FROTA FIM |||||||| SCRIPTS REFERENTES A FROTA FIM ||||||| SCRIPTS REFERENTES A FROTA FIM-->
<!-----  SCRIPTS REFERENTES A FROTA FIM |||||||| SCRIPTS REFERENTES A FROTA FIM ||||||| SCRIPTS REFERENTES A FROTA FIM-->
            
