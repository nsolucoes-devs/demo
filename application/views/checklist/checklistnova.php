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
                                        <div id="div-clienteTela" class="local local-active">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Clientes</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-cinterna" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Cabine Interna</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-seletrico" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Sistema Elétrico</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-cexterna" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Cabine Externa</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-pneu" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Pneus</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-carroceria" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Carroceria</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-csuplementar" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Cabine Suplementar</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="div-final" class="local">
                                            <div class="row" style="height: 40px;margin-top: 25px;">
                                                <div class="col-md-6">
                                                    <p class="local-title"><b>Final</b></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div id="clienteTela">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>CLIENTES</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-12 form-group">
                                                    <label for="cliente"><b>Cliente:</b></label>
                                                    <select class="select2" style="width: 100%!important" name="cliente" id="cliente" required>
                                                        <option value="" selected disabled> Selecione </option>
                                                        <?php foreach($clientes as $c){ ?>
                                                            <option value="<?php echo $c['cliente_cpfcnpj'] ?>"><?php echo $c['cliente_nome'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-2 form-group">
                                                    <label for="frota"><b>Frota:</b></label>
                                                    <select class="select2" style="width: 100%!important" type="text" name="frota" id="frota" onchange="trocarFrota()" required>
                                                        <option value="" selected disabled> Selecione </option>
                                                        <?php foreach($frota as $f){ ?>
                                                            <option value="<?php echo $f['frota_id'] ?>"> <?php echo $f['frota_codigo'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Placa:</b></label>
                                                    <input class="form-control" type="text" name="placa" id="placa" placeholder="Selecione a Frota" readonly>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label for="data"><b>Data:</b></label>
                                                    <input class="form-control" type="date" name="data" id="data">
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label for="local"><b>Local:</b></label>
                                                    <input class="form-control" type="text" name="local" id="local" placeholder="Digite o local">
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-6 form-group">
                                                    <label for="hodometro"><b>Hodometro:</b></label>
                                                    <input class="form-control" type="text" name="hodometro" id="hodometro" placeholder="Digite o Hodometro">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="chave"><b>Chave:</b></label>
                                                    <input class="form-control" type="text" name="chave" id="chave" placeholder="Digite a Chave">
                                                </div>
                                                
                                                
                                                <div class="col-md-12 form-group">
                                                    <label for="responsavel"><b>Responsável:</b></label>
                                                    <input class="form-control" type="text" name="responsavel" id="responsavel" placeholder="Digite o Responsável">
                                                </div>
                                            
                                            </div>
                                            <div class="row" style="position: relative; top: 10px!important;">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 0;">
                                                </div>
                                                <div class="col-md-12 form-group text-right">
                                                    <button type="button" onclick="cinterna()" class="btn btn-primary">Próximo</button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div id="cinterna" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>CABINE INTERNA VERIFICAÇÃO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 1%">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 35%!important">Nome</th>
                                                                <th class="text-center" style="width: 10%!important">Verificado</th>
                                                                <th class="text-center" style="width: 35%!important">Observação</th>
                                                                <th class="text-center" style="width: 20%!important">Imagem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($cinterna as $c){ ?>
                                                                <tr class="Ccinterna">
                                                                    <td style="padding-top: 1.2%!important"><?php echo ucwords(mb_strtolower($c['item_nome'])) ?></td>
                                                                    <td class="text-center"><input style="height: 23px;" class="form-control" type="checkbox" id="boxcinterna_<?php echo $c['item_id'] ?>"></td>
                                                                    <td class="text-center"><input class="form-control" type="text" id="obscinterna_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php if($c['item_foto'] == 1){ ?>
                                                                        <td><input class="form-control" type="file" id="filecinterna_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php } ?>
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
                                                            <button type="button" onclick="clienteTela()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="seletrico()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div id="seletrico" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>SISTEMA ELETRÍCO VERIFICAÇÃO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 1%">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 35%!important">Nome</th>
                                                                <th class="text-center" style="width: 10%!important">Verificado</th>
                                                                <th class="text-center" style="width: 35%!important">Observação</th>
                                                                <th class="text-center" style="width: 20%!important">Imagem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($seletrico as $s){ ?>
                                                                <tr class="Cseletrico">
                                                                    <td style="padding-top: 1.2%!important"><?php echo ucwords(mb_strtolower($s['item_nome'])) ?></td>
                                                                    <td class="text-center"><input value="1" style="height: 23px;" class="form-control" type="checkbox" id="boxseletrico_<?php echo $s['item_id'] ?>"></td>
                                                                    <td class="text-center"><input class="form-control" type="text" id="obsseletrico_<?php echo $s['item_id'] ?>"></td>
                                                                    <?php if($c['item_foto'] == 1){ ?>
                                                                        <td><input class="form-control" type="file" id="fileseletrico_<?php echo $s['item_id'] ?>"></td>
                                                                    <?php } ?>
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
                                                            <button type="button" onclick="cinterna()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="cexterna()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="cexterna" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>CABINE EXTERNA VERIFICAÇÃO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 1%">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 35%!important">Nome</th>
                                                                <th class="text-center" style="width: 10%!important">Verificado</th>
                                                                <th class="text-center" style="width: 35%!important">Observação</th>
                                                                <th class="text-center" style="width: 20%!important">Imagem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($cexterna as $c){ ?>
                                                                <tr class="Ccexterna">
                                                                    <td style="padding-top: 1.2%!important"><?php echo ucwords(mb_strtolower($c['item_nome'])) ?></td>
                                                                    <td class="text-center"><input value="1" style="height: 23px;" class="form-control" type="checkbox" id="boxcexterna_<?php echo $c['item_id'] ?>"></td>
                                                                    <td class="text-center"><input class="form-control" type="text" id="obscexterna_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php if($c['item_foto'] == 1){ ?>
                                                                        <td><input class="form-control" type="file" id="filecexterna_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php } ?>
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
                                                            <button type="button" onclick="seletrico()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="pneu()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        <div id="pneu" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>PNEUS VERIFICAÇÃO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 1%">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 35%!important">Nome</th>
                                                                <th class="text-center" style="width: 10%!important">Verificado</th>
                                                                <th class="text-center" style="width: 35%!important">Observação</th>
                                                                <th class="text-center" style="width: 20%!important">Imagem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($pneu as $p){ ?>
                                                                <tr class="Cpneu">
                                                                    <td style="padding-top: 1.2%!important"><?php echo ucwords(mb_strtolower($p['item_nome'])) ?></td>
                                                                    <td class="text-center"><input value="1" style="height: 23px;" class="form-control" type="checkbox" id="boxpneu_<?php echo $p['item_id'] ?>"></td>
                                                                    <td class="text-center"><input class="form-control" type="text" id="obspneu_<?php echo $p['item_id'] ?>"></td>
                                                                    <?php if($c['item_foto'] == 1){ ?>
                                                                        <td><input class="form-control" type="file" id="filepneu_<?php echo $p['item_id'] ?>"></td>
                                                                    <?php } ?>
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
                                                            <button type="button" onclick="cexterna()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="carroceria()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="carroceria" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>CARROCERIA VERIFICAÇÃO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 1%">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 35%!important">Nome</th>
                                                                <th class="text-center" style="width: 10%!important">Verificado</th>
                                                                <th class="text-center" style="width: 35%!important">Observação</th>
                                                                <th class="text-center" style="width: 20%!important">Imagem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($carroceria as $c){ ?>
                                                                <tr class="Ccarroceria">
                                                                    <td style="padding-top: 1.2%!important"><?php echo ucwords(mb_strtolower($c['item_nome'])) ?></td>
                                                                    <td class="text-center"><input value="1" style="height: 23px;" class="form-control" type="checkbox" id="boxcarroceria_<?php echo $c['item_id'] ?>"></td>
                                                                    <td class="text-center"><input class="form-control" type="text" id="obscarroceria_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php if($c['item_foto'] == 1){ ?>
                                                                        <td><input class="form-control" type="file" id="filecarroceria_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php } ?>
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
                                                            <button type="button" onclick="pneu()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="csuplementar()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="csuplementar" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>CABINE SUPLEMENTAR VERIFICAÇÃO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-12 form-group" style="margin-top: 1%">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 35%!important">Nome</th>
                                                                <th class="text-center" style="width: 10%!important">Verificado</th>
                                                                <th class="text-center" style="width: 35%!important">Observação</th>
                                                                <th class="text-center" style="width: 20%!important">Imagem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach($csuplementar as $c){ ?>
                                                                <tr class="Ccsuplementar">
                                                                    <td style="padding-top: 1.2%!important"><?php echo ucwords(mb_strtolower($c['item_nome'])) ?></td>
                                                                    <td class="text-center"><input value="1" style="height: 23px;" class="form-control" type="checkbox" id="boxcsuplementar_<?php echo $c['item_id'] ?>"></td>
                                                                    <td class="text-center"><input class="form-control" type="text" id="obscsuplementar_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php if($c['item_foto'] == 1){ ?>
                                                                        <td><input class="form-control" type="file" id="filecsuplementar_<?php echo $c['item_id'] ?>"></td>
                                                                    <?php } ?>
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
                                                            <button type="button" onclick="carroceria()" class="btn btn-primary">Anterior</button>    
                                                            <button type="button" onclick="final()" class="btn btn-primary">Próximo</button>    
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div id="final" style="display: none">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>VERIFICADOS</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-12 text-center form-group">
                                                    <table class="table table-hover table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center" style="width: 20%!important">Categória</th>
                                                                <th class="text-center" style="width: 30%!important">Nome</th>
                                                                <th class="text-center" style="width: 40%!important">Observação</th>
                                                                <th class="text-center" style="width: 30%!important">Imagem</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tabela-final">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 10px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 20px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" onclick="csuplementar()" class="btn btn-primary">Anterior</button>    
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


            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.select2').select2({theme: "bootstrap"});
                })
            </script>
            
            
            <script>
                function clienteTela(){
                    $('#clienteTela').show();
                    $('#div-clienteTela').addClass('local-active');
                    $('#div-clienteTela').children().children().last().children().addClass('fa-square-o')
                    $('#div-clienteTela').children().children().last().children().removeClass('fa-check-square-o')
                    $('#div-clienteTela').removeClass('local-con');
                    
                    $('#cinterna').hide();
                    $('#div-cinterna').removeClass('local-active');
                    
                    $('#seletrico').hide();
                    $('#div-seletrico').removeClass('local-active');
                    
                    $('#cexterna').hide();
                    $('#div-cexterna').removeClass('local-active');
                    
                    $('#pneu').hide();
                    $('#div-pneu').removeClass('local-active');
                    
                    $('#carroceria').hide();
                    $('#div-carroceria').removeClass('local-active');
                    
                    $('#csumplementar').hide();
                    $('#div-csumplementar').removeClass('local-active');
                }
            </script>
            
            <script>
                function validacaoInput(id, mensagem){
                    if($('#'+id).val() == "" || $('#'+id).val() == " " || $('#'+id).val() == null){
                        $('#'+id).focus();
                        Swal.fire('',mensagem,'error');
                        
                        return true;
                    } else {
                        return false;
                    }
                }
            </script>
            
            <script>
                function verificarChave(){
                    dados = new FormData();
                    dados.append('chave', $('#chave').val());
                    
                    var boolean = false;
                    
                    $.ajax({
                        url: '<?php echo base_url('checklist/verificarChave'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        error: function(xhr, status, error) {
                            alert('novoServ(): Erro, verifique o console');
                            console.log('verificarChave(): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data == true){
                                $('#chave').focus();
                                Swal.fire('','Está chave já está sendo utilizada, digite outra.','error');
                                clienteTela();
                            } 
                        }
                    });
                    
                    return boolean;
                }
            </script>
            
            <script>
                function passarTela(ativo, inativo, primeiro, segundo, terceiro, quarto, quinto, sexto){
                    $('#'+primeiro).hide();
                    $('#div-'+primeiro).removeClass('local-active');
                    
                    $('#'+segundo).hide();
                    $('#div-'+segundo).removeClass('local-active');
                    
                    $('#'+terceiro).hide();
                    $('#div-'+terceiro).removeClass('local-active');
                    
                    $('#'+quarto).hide();
                    $('#div-'+quarto).removeClass('local-active');
                    
                    $('#'+quinto).hide();
                    $('#div-'+quinto).removeClass('local-active');
                    
                    $('#'+sexto).hide();
                    $('#div-'+sexto).removeClass('local-active');
                    
                    $('#'+inativo).hide();
                    $('#div-'+inativo).removeClass('local-active');
                    $('#div-'+inativo).children().children().last().children().removeClass('fa-square-o')
                    $('#div-'+inativo).children().children().last().children().addClass('fa-check-square-o')
                    $('#div-'+inativo).addClass('local-con');
                    
                    $('#'+ativo).show();
                    $('#div-'+ativo).removeClass('local-con');
                    $('#div-'+ativo).children().children().last().children().addClass('fa-square-o')
                    $('#div-'+ativo).children().children().last().children().removeClass('fa-check-square-o')
                    $('#div-'+ativo).addClass('local-active');
                }
            </script>
            
            <script>
                function cinterna(){
                    if(validacaoInput('cliente', 'Selecione o Cliente')){
                    } else {
                        if(validacaoInput('frota', 'Selecione a Frota')){
                        } else {
                            if(validacaoInput('placa', 'Selecione a Placa')){
                            } else {
                                if(validacaoInput('data', 'Selecione a Data')){
                                } else {
                                    if(validacaoInput('local', 'Selecione o Local')){
                                    } else {
                                        if(validacaoInput('hodometro', 'Digite o Hodometro')){
                                        } else {
                                            if(validacaoInput('chave', 'Digite a Chave')){
                                            } else {
                                                if(validacaoInput('responsavel', 'Digite o Responsável')){
                                                } else {
                                                    passarTela('cinterna', 'clienteTela', 'seletrico', 'cexterna', 'pneu', 'carroceria', 'csuplementar', 'final');
                                                    verificarChave();
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
                function seletrico(){
                    passarTela('seletrico', 'cinterna', 'clienteTela', 'cexterna', 'pneu', 'carroceria', 'csuplementar', 'final');
                }
            </script>
            
            <script>
                function cexterna(){
                    passarTela('cexterna', 'seletrico', 'clienteTela', 'cinterna', 'pneu', 'carroceria', 'csuplementar', 'final');
                }
            </script>
            
            <script>
                function pneu(){
                    passarTela('pneu', 'cexterna', 'clienteTela', 'cinterna', 'seletrico', 'carroceria', 'csuplementar', 'final');
                }
            </script>
            
            <script>
                function carroceria(){
                    passarTela('carroceria', 'pneu', 'clienteTela', 'cexterna', 'cinterna', 'seletrico', 'csuplementar', 'final');
                }
            </script>
            
            <script>
                function csuplementar(){
                    passarTela('csuplementar', 'carroceria', 'clienteTela', 'cexterna', 'pneu', 'cinterna', 'seletrico', 'final');
                }
            </script>
            
            <script>
                function final(){
                    mostrarFinal();
                    
                    passarTela('final', 'csuplementar', 'clienteTela', 'cexterna', 'pneu', 'cinterna', 'seletrico', 'carroceria');
                }
            </script>
            
            <script>
                function mostrarFinal(){
                    $('#tabela-final').empty();
                    
                    montaTabela('Ccinterna', 'cinterna', 'Cabine Interna');
                    
                    montaTabela('Cseletrico', 'seletrico', 'Sistema Eletríco');
                    
                    montaTabela('Ccexterna', 'cexterna', 'Cabine externa');
                    
                    montaTabela('Cpneu', 'pneu', 'Pneus');
                    
                    montaTabela('Ccarroceria', 'carroceria', 'Carroceria');
                    
                    montaTabela('Ccsuplementar', 'csuplementar', 'Cabine Suplementar');
                }
            </script>
            
            <script>
                function montaTabela(tabela, id, nome){
                    $('.'+tabela).each(function(){
                        if($(this).children().next().children().is(':checked')){
                            var idFile      = $(this).children().next().next().next().children().attr('id');
                            var idMiniatura = "";
                            
                            if(idFile){
                                var aux         = idFile.split('_');
                                var idMiniatura = 'm'+id+'_' + aux[1];
                            }
                            
                            var td = "<tr>"+
                                "<td>"+nome+"</td>"+
                                "<td>"+$(this).children().first().html()+"</td>"+
                                "<td>"+$(this).children().next().next().children().val()+"</td>"+
                                "<td><img style='width: 50px; height: 50px;' id='"+idMiniatura+"'/></td>"+
                            "</tr>";
                            
                            $('#tabela-final').append(td);
                            
                            if(idFile){
                                if ($('#'+idFile).prop('files')[0]) {
                                    var file = new FileReader();
                                    file.onload = function(e) {
                                        document.getElementById(idMiniatura).src = e.target.result;
                                    };       
                                    file.readAsDataURL($('#'+idFile).prop('files')[0]);
                                }
                            }
                        }
                    });
                }
            </script>
            

            <script>
                function trocarFrota(){
                    dados = new FormData();
                    dados.append('id', $('#frota').val());
                    $.ajax({
                        url: '<?php echo base_url('frota/dinamicoPlaca'); ?>',
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
                            $('#placa').val(data);
                        }
                    });
                }    
            </script>
           