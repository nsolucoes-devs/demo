<style>
    body {
        padding-right: 0!important
    }
    .main-row{
        padding-left: 10px;
        padding-right: 10px;
    }
    .main-col-12{
        padding: 20px;
        border-radius: 5px;
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
    .disabled-field{}
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
    .modal-header{
        justify-content: unset; 
        text-align: left;
    }
    .modal-footer{
        position: relative;
    }
    .btn-left{
        position: absolute;
        top: 15px;
        left: 15px;
    }

    .e-pneus{
        display: flex;
        flex-direction: row-reverse;
        position: absolute;
        padding-top: 20px;
        right: 0px;
        width: 100%;
        height: 70px;
    }
    .d-pneus{
        display: flex;
        padding-top: 20px;
        position: absolute;
        left: 0px;
        width: 100%;
        height: 70px;
    }
    .eixo-h{
        border-top: 3px solid black;
        margin: 0px;
        position: relative;
    }
    .eixo-v{
        position: absolute;
        font-weight: bold;
        font-size: 20px;
        top: 15px;
        left: 40%;
    }
    .btn.btn-primary.btn-custom, .btn.btn-primary.btn-custom:active{
        width: 35px;
        height: 35px;
        background-color: transparent;
        border: 0;
        color: green;
        border-radius: 50%;
    }
    .btn.btn-primary.btn-custom:focus{
        outline: 0px;
    }
    .btn-ativo{
        margin-top: 10px;
    }
    .pneu{
        height: 35px;
        margin-top: 7%;
    }
    .img-pneu{
        height: 70px;
        width: auto;
        margin: 5px 5px;
    }
    .custom-20-e{
        width: 20%;
        text-align: right;
        flex-direction: row-reverse;
        display: flex;
    }
    .custom-80-e{
        flex-direction: row-reverse;
        display: flex;
        width: 80%;
        text-align: right;
    }
    .custom-20-d{
        width: 20%;
        text-align: left;
    }
    .custom-80-d{
        width: 80%;
        text-align: left;
    }
    .custom-80-e button{
        margin-top: 7%;
    }
    .top-car{
        border-top: 1px solid black;
        border-right: 1px solid black;
        border-left: 1px solid black;
        padding-right: 10px;
        padding-left: 10px;
    }
    .mid-car{
        border-right: 1px solid black;
        border-left: 1px solid black;
        padding-right: 10px;
        padding-left: 10px;
    }
    .bot-car{
        border-right: 1px solid black;
        border-left: 1px solid black;
        border-bottom: 1px solid black;
        padding-bottom: 20px;
        padding-right: 10px;
        padding-left: 10px;
    }
    .full-car{
        border-top: 1px solid black;
        border-right: 1px solid black;
        border-left: 1px solid black;
        border-bottom: 1px solid black;
        padding-bottom: 20px;
        padding-right: 10px;
        padding-left: 10px;
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
    .swal2-html-container{
        font-size: 20px!important;   
    }
    
    .swal2-popup{
        width: 45em!important;
    }
    
    
    #pneuAdd{
        position: relative;
        bottom: 34px;
        left: 64%;
        border-radius: 4px;
    }
    
    .swal2-popup .swal2-styled.swal2-confirm {
        background-color: #3a0b0c!important;
    }
    .swal2-title{
        font-size: 25px!important;
    }
    .swal2-content{
        font-size: 20px;
    }
    .swal2-styled.swal2-confirm{
        font-size: 15px;
    }    
    
    .botaoProx {
        width: 66%!important;
    }
    
    .divProx {
        top: 60px!important;
        left: 67.8%!important;
    }
    
    /* RESUMO */
    
    #objImpressao {
        margin-bottom: -43%;
    }
    
    .image-pneu-resumo{
        margin-top: 20px; 
        position: relative; 
        right: 31%;
    }
    
    .image2-pneu-resumo{
        margin-top: 12%;
    }
    
    .image3-pneu-resumo{
        margin-left: 60%;
        margin-top: 12%;
    }
    
    #pneusResumo{
        position: relative;
        left: 39%;
        width: 100%;
        bottom: 421px;
    }
    
    .title-eixo{
        padding-left: 3%;
    }
    
    .title-esquerdo{
        padding-left: 2%;
    }
    
    .title-direito{
        padding-left: 7%;
    }
    
    .traco-resumo{
        position: relative;
        right: 23%;
        width: 55%;
        margin-top: 1%;
    }
    
    .eixo-id{
        margin-top: 1.4%;
    }
    
    .row-eixo-id{
        width: 330%;
    }
    
    .posicao-eixo{
        position: relative;
        top: 1px; 
        left: 6%;
    }
    
    .info-esquerdo{
        position: relative;
        right: 10%;
    }
    
    .info-direito{
        position: relative;
        right: 25%;
    }
    
    .size-tittle{
        width: 200%;
    }
    
    .input-int{
        width: 190%;
        position: relative;
        right: 60%;
        bottom: 3px;
    }
    
    .input-ext{
        width: 190%;
        position: relative;
        right: 60%;
        bottom: 2px;
    }
    
    .tittle-step{
        position: relative;
        left: 1.5%;
        top: 10px;
    }
    
    #pos-step1{
        position: relative;
        top: 8px;
        width: 64.5%;
        right: 88px;
    }
    
    #pos-step2{
        position: relative;
        top: 8px;
        width: 64.5%;
        right: 88px;
    }
    
    @media print {
        
        body * {
            visibility: hidden;
        }
        
        #objImpressao, #objImpressao * {
            visibility: visible;
        }
        
        #objImpressaoCab, #objImpressaoCab * {
            visibility: visible;
            position: relative;
            bottom: 180px;
            left: 10%;
        }
        
        #objImpressao {
            width: 175%;
            position: relative;
            right: 15%;
            bottom: 60px;
            
            -webkit-transform: rotate(-90deg);
        }
        
        #subtitulo-imp, #subtitulo-imp * {
            visibility: visible;
            position: relative;
            bottom: 65px;
        }
        
        .posicao-h2 {
            position: relative;
            bottom: 220px!important;
            right: 2%;
        }
        
        #pos-step1{
            width: 62.7%;
        }
        
        .custom-20-e {
            width: 16%;
        }    
        
        .imp_step {
            width: 22%!important;
        }
    }
</style>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    
    <div class="row main-row">
        <div class="col-md-12 main-col-12" style="padding: 0px;">
            <div class="card">
                    <input  type="hidden" name="frota" id="frota" value="<?php echo $frota;?>">
                    <div class="white-tab">
                        <div class="col-md-12" style="background-color:white; border-radius: 5px; padding: 3px;">
                               
                        <div class="col-md-2" style="padding-left: 0;">
                            <div id="div-veic" class="local local-active">
                                <div class="row" style="height: 40px;margin-top: 25px;">
                                    <div class="col-md-6">
                                        <p class="local-title"><b>Veículo</b></p>
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
                            <div id="div-resumo" class="local">
                                <div class="row" style="height: 40px;margin-top: 25px;">
                                    <div class="col-md-6">
                                        <p class="local-title"><b>Resumo</b></p>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <i class="local-i fa fa-square-o" aria-hidden="true"></i>
                                    </div>-->
                                </div>
                            </div>
                        </div>  
                         
                        <div class="col-md-10" style="padding: 0">
                        
                            <div id="divVeiculo">
                                <div class="row text-center" style="margin-top: 20px">
                                    <div class="col-md-2 offset-md-2 form-group">
                                        <p style="margin-top: 4%;"><b>Busque sua Frota:</b></p>
                                    </div>
                                    <div class="col-md-2" id="divBusca" style="width: 120%; position: relative; left: 0">
                                        <input type="text" id="bscFrota" class="form-control" placeholder="Buscar frota"/>
                                        <buttom style="position: relative; bottom: 34px; left: 66%;" onclick="resgataFrota();" id="buscaFrota" name="BuscaFrota" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></buttom>
                                    </div>
                                    <div class="col-md-2" style="position: relative; left: 5%;">
                                        <button onclick="newPneuGroup()" name="qtd_eixos" id="qtd_eixos" style="position: relative; top: -1px; left: -5%;" class="btn btn-primary" type="button">Adicionar eixos</button>
                                    </div>
                                </div> 
                                
                                <div class="col-md-12">
                                    <hr style="margin-top: 0;">
                                </div>
                                
                                <div class="row" id="eixo_1" style="margin-top: 20px; position: relative; right: 7.9%;">
                                    <div class="col-md-5">
                                        <div class="e-pneus">
                                            <div class="custom-20-e">
                                                <img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Frontal Esquerdo">
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="func_1" style="margin-top: 12%;"></div>          
                                    </div>
                                    <div class="col-md-2 text-center full-car">
                                        <br>
                                        <h4>1</h4>
                                        <hr class="eixo-h" id="1_hr">
                                    </div>      
                                    <div class="col-md-5">
                                        <div class="d-pneus">
                                            <div class="custom-20-d">
                                                <img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Frontal Direito">
                                            </div>
                                        </div>
                                        <div class="col-md-2" id="func_1" style="margin-left: 60%; margin-top: 12%;"></div>
                                    </div>
                                     
                                </div>
                                
                                <button type="button" id="btn-impressao" onclick="imprimir2()" class="btn btn-primary" style="width:10%; color:white; position: relative; left: 74%; top: 74px; z-index: 2">Imprimir</button>
                           
                                <div class="row">
                                    <div class="col-md-4 text-center" id="divProx" style="position: relative; left: 73%;">
                                        <br><br> <!--botaoproximo-->
                                        <button type="button" id="proximo1" onclick="proximo();" class="btn btn-primary" style="width:33%; color:white;">Editar</button>
                                        <br><br>
                                    </div>
                                </div>    
                            
                            </div>
                            <div id="divPneus" style="display: none">    
                                <div class="col-md-12" style="background-color:white; border-radius: 5px; padding: 8px;">
                                    <div class="row">
                                        <div class="col-md-12 form-group text-right">
                                            <a type="button" onclick="selectPneus()" class="btn btn-primary" data-toggle="modal" data-target="#modalDefLado">Inserir / Atualizar Pneu</a>
                                            <a href="<?php echo base_url('manutencaopneus');?>" class="btn btn-danger">Cancelar</a>
                                        </div> 
                                         
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="tableFixHead" style="position: relative;">
                                            <table id="myTableCliente" class="table table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%" style="text-align: center; vertical-align: middle;">Eixo</th>
                                                        <th width="45%" style="text-align: center; vertical-align: middle;">Esquerdo</th>
                                                        <th width="45%" style="text-align: center; vertical-align: middle;">Direito</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                        <tr id="rowEixo_1">
                                                            <td style="vertical-align: middle;" class="text-center" style="height: 70px!important">
                                                                 <b>1</b>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <div class="row">
                                                                    <div class="col-md-3" style="position: relative; left: 2.2%">
                                                                        <label> Interno </label><br>
                                                                        <input style="width: 250%" type="text" id="L-int-1" name="L-int-1" readonly>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <div class="row">
                                                                    <div class="col-md-3" style="position: relative; left: 2.2%">
                                                                        <label> Interno </label><br>
                                                                        <input style="width: 250%" type="text" id="R-int-1" name="R-int-1" readonly>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>    
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <br><br>
                                        <button type="button" id="btn-save2" onclick="voltar()" class="btn btn-primary" style="width:10%; color:white;">Voltar</button>
                                        <button type="button" id="btn-prox2" onclick="proximo2();" class="btn btn-primary" style="width:10%; color:white;">Próximo</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>  
                            
                            <!-- RESUMO -->
                            
                            <div id="divResumo" style="display: none">
                                
                                <div id="objImpressaoCab" style="visibility: hidden;">
                                    <img style="height: 80px; width: 50%;" src="<?php echo base_url('resources/');?>imgs/logo2.png" alt="user">
                                </div>
                                
                                <div id="subtitulo-imp" style="visibility: hidden;">
                                    <h2 class="text-center posicao-h2"> RELAÇÂO DE PNEUS </h2>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label> Frota: </label>
                                            <input type="text" class="text-center" id="frota-res" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label> Placa: </label>
                                            <input type="text" class="text-center" id="placa-res" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="objImpressao">
                                    <div class="row image-pneu-resumo" id="eixo_resumo_1">
                                        <div class="col-md-5">
                                            <div class="e-pneus">
                                                <div class="custom-20-e">
                                                    <img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Frontal Esquerdo">
                                                </div>
                                            </div>
                                            <div class="col-md-2 image2-pneu-resumo" id="func_1"></div>          
                                        </div>
                                        <div class="col-md-2 text-center full-car">
                                            <br>
                                            <h4>1</h4>
                                            <hr class="eixo-h" id="1_hr">
                                        </div>      
                                        <div class="col-md-5">
                                            <div class="d-pneus">
                                                <div class="custom-20-d">
                                                    <img src="<?php echo base_url('resources/imgs/pneu.png') ?>" class="img-pneu" title="Pneu Frontal Direito">
                                                </div>
                                            </div>
                                            <div class="col-md-2 image3-pneu-resumo" id="func_1"></div>
                                        </div>
                                         
                                    </div>
                                    
                                    <div id="pneusResumo">
                                        <div class="row">
                                            <div class="col-md-2 title-eixo">
                                                <label> Eixo: </label>
                                            </div>
                                            <div class="col-md-2 title-esquerdo">
                                                <label> Esquerdo: </label>
                                            </div>
                                            <div class="col-md-2 title-direito">
                                                <label> Direito: </label>
                                            </div>
                                        </div>
                                        
                                        <hr class="traco-resumo" id="hr_resumo">
                                    
                                        <div class="row" id="resumo-eixo-1">
                                            <div class="col-md-2 eixo-id">
                                                <div class="row row-eixo-id">
                                                    <div class="col-md-2 posicao-eixo">
                                                        <b> 1 </b>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 info-esquerdo" style="top: 12px;"> <!-- esquerdo -->
                                                <div class="row size-tittle">
                                                    <div class="col-md-2">
                                                        <label> Interno: </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="input-int" type="text" id="L-pos-int-1" name="L-pos-int-1" readonly>
                                                    </div>
                                                </div>
                                            </div>    
                                            <div class="col-md-5 info-direito" style="top: 12px;"> <!-- direito -->   
                                                <div class="row size-tittle">
                                                    <div class="col-md-2">
                                                        <label> Interno: </label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input  class="input-int" type="text" id="R-pos-int-1" name="R-pos-int-1" readonly>
                                                    </div>
                                                </div>
                                            </div>                                        
                                        </div>
                                    
                                        <div class="row" id="step1pos">
                                        	<div class="col-md-2 tittle-step">
                                        		<b> Step: </b>
                                        	</div>
                                        	<div class="col-md-10">
                                        		<input id="pos-step1" type="text" readonly>
                                        	</div>
                                        </div>
                                    
                                        <br>
                                        
                                    </div>
                                
                                </div>
                           
                            
                                <div class="row">
                                    <div class="col-md-12 text-center" id="divProx" style="position: relative; left: -8%; top: 16px;">
                                        <br><br>
                                                <button type="button" id="btn-voltar2" onclick="voltar2()" class="btn btn-primary" style="width:10%; color:white;">Voltar</button>
                                            
                                                <button type="button" id="btn-impressao" onclick="imprimir()" class="btn btn-primary" style="width:10%; color:white;">Imprimir</button>
                                            
                                                <button type="button" id="btn-finalizar" onclick="finalizar()" class="btn btn-primary" style="width:10%; color:white;">Finalizar</button>
                                            
                                        <br><br>
                                    </div>
                                </div>  
                                
                            </div>
                            
                            
                        </div>
                        
                        
                        
                    </div>
                    
                
            </div>
    </div>
</div>

<!-- modals -->
            <div class="modal fade" id="modalDefLado" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Inserção de Pneu em Frota</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                            <div class="modal-body">
                                <input type="hidden" id="idFrota" name="idFrota">
                                <div class="row">
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Pneu </label>
                                        <select class="form-control col-12" name="sel_pneu" id="sel_pneu" required>
                                            <option value="" selected disabled>-- Selecione --</option>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Qual eixo: </label>
                                        <select class="form-control col-12" name="sel_eixo" id="sel_eixo" onchange="selectStep()" required>
                                            <option value="" selected disabled>-- Selecione --</option>
                                            <option value="step" id="sel_step">Step</option>
                                            <option value="1" selected>Eixo 1</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 form-group" id="div_sel_pos">
                                        <label>Direita ou esquerda: </label>
                                        <select class="form-control col-12" name="sel_pos" id="sel_pos" required>
                                            <option value="" selected disabled>-- Selecione --</option>
                                            <option value="R"> Direita </option>
                                            <option value="L"> Esquerda </option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 form-group" id="div_sel_loc">
                                        <label>Interno/Externo: </label>
                                        <select class="form-control col-12" name="sel_loc" id="sel_loc" required>
                                            <option value="" selected disabled>-- Selecione --</option>
                                            <option value="int"> Interno </option>
                                            <option value="ext"> Externo </option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="button" onclick="inserirPneuDinamico()" class="btn btn-primary">Gravar</button>
                            </div>

                    </div>
                </div>
            </div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var gbl_pos = 1;
</script>

<script>
    function selectStep() { 
        var selectEixo = document.getElementById("sel_eixo").value;
    	if (selectEixo == "step"){
    		$('#div_sel_pos').hide();
    		$('#sel_pos').val('stp-pos');
    		$('#div_sel_loc').hide();
    		$('#sel_loc').val('stp-loc');
    	} else {
    		$('#div_sel_pos').show();
    		$('#div_sel_loc').show();
    	}
    }
</script>

<script>

    var input = document.getElementById("bscFrota");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("buscaFrota").click();
        }
    });

    function resgataFrota(){
        
        var a = document.getElementById("bscFrota").value;
        
        document.getElementById('idFrota').value = a;
        var sel = document.getElementById('sel_eixo');
        var eio = 1;
        var dados = {
            'frota': a
        };
        $.ajax({
            url : '<?php echo base_url('pneus/frotaPneus') ?>',
            type : 'POST',
            dataType : 'json',
            data : dados,
            success : function(res) {
                if(res == null){
                    Swal.fire('','Veículo não existente, ou sem eixos e pneus definidos!','error',)
                }
                for (var i = 0; i < res-1 ; i++) {
                    newPneuGroup();
                    document.getElementById("buscaFrota").setAttribute("disabled","disabled");
                    document.getElementById("buscaFrota").removeAttribute("onclick");
                    montaEixos();
                    eio++;
                    var option = document.createElement("option");
                    option.value = eio;
                    option.text = 'Eixo ' + eio;
                    sel.appendChild(option);
                }
                resgataPneus(a);
            },
            error : function(xhr, status, error) {
                alert(status + " " + error + " " + xhr);
            }
        });
    }
    
    function inserirPneuDinamico(){
        dadosgui = new FormData();
        dadosgui.append('idfrota', document.getElementById("bscFrota").value);
        dadosgui.append('idpneu', $('#sel_pneu').val());
        if ($('#sel_eixo').val() == 'step'){
            dadosgui.append('posicao', 'step');
        }else {
            dadosgui.append('posicao', $('#sel_pos').val() + '-' + $('#sel_loc').val() + '-' + $('#sel_eixo').val());
        }
        
        $.ajax({
            url : '<?php echo base_url('pneus/gravaPneu') ?>',
            method: 'post',
            data: dadosgui,
            processData: false,
            contentType: false,
            
            success : function(res) {
                console.log(res);
                
                $('#modalDefLado').modal('hide');
                
                if ($('#sel_eixo').val() == 'step'){
                    $('#Step1').val(res);
                } else {
                    $('#'+$('#sel_pos').val() + '-' + $('#sel_loc').val() + '-' + $('#sel_eixo').val()).val(res);
                }
                
            },
            error : function(xhr, status, error) {
                alert(status + " " + error + " " + xhr);
            }
        });
    }
    
    function resgataPneus(frota){
        var dados = {
            'frota': frota
        };
        $.ajax({
            url : '<?php echo base_url('pneus/resgataPneusFrota') ?>',
            type : 'POST',
            dataType : 'json',
            data : dados,
            success : function(res) {
                console.log(res);
                for (const a of Object.entries(res)) {
                    if (a[0] == 'placa') {
                        $('#placa-res').val(a[1]);
                    }    
                    if(a[1]['posicao'] == 'step'){
                        addStep(gbl_pos);
                    }
                    
                    if(a[1]['posicao']){
                        var posicao = a[1]['posicao'].split('-');    
                        if(posicao[0] == 'L'){
                            if(posicao[2] != 0 && posicao[2] != 1){
                                addPneuR(posicao[2]);
                            }
                        }
                    }
                }
                
                for (const a of Object.entries(res)) {
                    if(a[1]['posicao'] == 'step'){
                        $('#Step1').val(a[1]['nome']);    
                    } else {
                        $('#Step2').val(a[1]['nome']);    
                    }
                    
                    $('#'+a[1]['posicao']).val(a[1]['nome']);
                }
                
            },
            error : function(xhr, status, error) {
                alert(status + " " + error + " " + xhr);
            }
        });
    }
    
    
    function selectPneus(){
        $.ajax({
            url : '<?php echo base_url('pneus/resgataPneus') ?>',
            type : 'POST',
            dataType : 'json',
            success : function(res) {
                for(i = 0; i < res.length; i++){
                    $('#sel_pneu').append('<option value='+ res[i].id+'>' + res[i].mc +' | '+ res[i].mt +' | '+ res[i].dot + '</option>');
                }
                
                verificarEixos();
            },
            error : function(xhr, status, error) {
                alert(status + " " + error + " " + xhr);
            }
        });
    }
    
    function verificarEixos(){
        for(i = 1; i <= gbl_pos; i++){
            var verifica = document.getElementById('L-int-'+ i);
            
            console.log(i);
            console.log(verifica);
            
            if(!verifica){
                $("#sel_eixo option[value='"+i+"']").remove();    
            }
            
        }
    }
    
    
    function montaEixos(){
        var pai = gbl_pos - 1;
        //alert('rowEixo_'+ pai);
        var eixo = gbl_pos;
        var html = "<tr id='rowEixo_" + eixo + "'><td style='height: 70px!important; vertical-align: middle;' class='text-center'>" + eixo + "</td><td style='vertical-align: middle;' id='L-pos-" + eixo + "'></td><td style='vertical-align: middle;' id='R-pos-" + eixo + "'></td></tr>";
    
        var d1 = document.getElementById('rowEixo_'+ pai);
        d1.insertAdjacentHTML('afterend', html);
    }
    
    function removeEixos(val){
        document.getElementById('rowEixo_' + val).remove();
    }
    
    function inserePneu(val){
        var eixo = val;
        if (document.getElementById('L-pos-int-'+ eixo)){
            var html1 = "<div class='row'><div class='col-md-3' style='position: relative; left: 2.2%' id='L-pos-int-" + eixo + "'><label> Interno </label><br><input style='width: 250%' type='text' id='L-int-" + eixo + "' name='L-int-" + eixo + "' readonly></div><div class='col-md-3' style='position: relative; left: 22%' id='L-pos-ext-" + eixo + "'><label> Externo </label><br><input style='width: 250%' type='text' id='L-ext-" + eixo + "' name='L-ext-" + eixo + "' readonly></div></div>";
            var html2 = "<div class='row'><div class='col-md-3' style='position: relative; left: 2.2%' id='R-pos-int-" + eixo + "'><label> Interno </label><br><input style='width: 250%' type='text' id='R-int-" + eixo + "' name='L-int-" + eixo + "' readonly></div><div class='col-md-3' style='position: relative; left: 22%' id='R-pos-ext-" + eixo + "'><label> Externo </label><br><input style='width: 250%' type='text' id='R-ext-" + eixo + "' name='L-ext-" + eixo + "' readonly></div></div>";
        }else{
            var html1 = "<div class='row'><div class='col-md-3' style='position: relative; left: 2.2%' id='L-pos-int-" + eixo + "'><label> Interno </label><br><input style='width: 250%' type='text' id='L-int-" + eixo + "' name='L-int-" + eixo + "' readonly></div></div>";
            var html2 = "<div class='row'><div class='col-md-3' style='position: relative; left: 2.2%' id='R-pos-int-" + eixo + "'><label> Interno </label><br><input style='width: 250%' type='text' id='R-int-" + eixo + "' name='L-int-" + eixo + "' readonly></div></div>";
        }
        
        
        var d1 = document.getElementById('R-pos-'+ eixo);
        d1.innerHTML = html2;
        
        var d2 = document.getElementById('L-pos-'+ eixo);
        d2.innerHTML = html1;
        
        
    }
    
    function insereStep(){
        var eixo = gbl_pos;
        if (document.getElementById('Step1')){
            document.getElementById('rowStep').remove();
            var html = "<tr id='rowStep'><td style='vertical-align: middle;' class='text-center'>Step</td><td style='vertical-align: middle;'><div class='row'><div class='col-md-12'><div class='col-md-12' style='padding-left: 1%; padding-right: 1%'><label> Step </label><br><input style='width: 100%' type='text' id='Step1' name='Step1' readonly></div></div></div></td><td style='vertical-align: middle;'><div class='row'><div class='col-md-12'><label> Step 2 </label><br><input style='width: 100%' type='text' id='Step2' name='Step2' readonly></div></div></td></tr>";
        }else{
            var html = "<tr id='rowStep'><td style='vertical-align: middle;' class='text-center'>Step</td><td colspan='2' style='vertical-align: middle;'><div class='row'><div class='col-md-12'><div class='col-md-12' style='padding-left: 1%; padding-right: 1%'><label> Step </label><br><input style='width: 100%' type='text' id='Step1' name='Step1' readonly></div></div></div></td></tr>";
        }
        var d1 = document.getElementById('rowEixo_'+ eixo);
        d1.insertAdjacentHTML('afterend', html);
    }
    
    function retiraStep(){
        var eixo = gbl_pos;
        if (document.getElementById('Step2')){
            document.getElementById('rowStep').remove();
            var html = "<tr id='rowStep'><td style='vertical-align: middle;' class='text-center'>Step</td><td colspan='2' style='vertical-align: middle;'><div class='row'><div class='col-md-12'><label> Step </label><br><input style='width: 100%' type='text' id='Step1' name='Step1' readonly></div></div></td></tr>";
            var d1 = document.getElementById('rowEixo_'+ eixo);
            d1.insertAdjacentHTML('afterend', html);
        }else{
            document.getElementById('rowStep').remove();
        }
        
    }
    
    function removePneu(val, pos){
        var eixo = val;
        if (document.getElementById('L-pos-ext-'+ eixo)){
            var html1 = "<div class='row'><div class='col-md-3' style='position: relative; left: 2.2%' id='L-pos-int-" + eixo + "'><label> Interno </label><br><input style='width: 250%' type='text' id='L-int-" + eixo + "' name='L-int-" + eixo + "' readonly></div></div>";
            var html2 = "<div class='row'><div class='col-md-3' style='position: relative; left: 2.2%' id='R-pos-int-" + eixo + "'><label> Interno </label><br><input style='width: 250%' type='text' id='R-int-" + eixo + "' name='L-int-" + eixo + "' readonly></div></div>";
        }else{
            var html1 = "";
            var html2 = "";
        }
        
        var d1 = document.getElementById('R-pos-'+ eixo);
        d1.innerHTML = html2;
        
        var d2 = document.getElementById('L-pos-'+ eixo);
        d2.innerHTML = html1;
        
        dados = new FormData();
        dados.append('idfrota', document.getElementById("bscFrota").value);
        dados.append('eixo', eixo);
        dados.append('pos', pos);
        
        $.ajax({
            url : '<?php echo base_url('pneus/removePneuVeiculo') ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            
            success : function(res) {
                console.log("SIM");
            },
            error : function(xhr, status, error) {
                console.log("Não");
            }
        });
    }
    
</script>

<script>
    function escolherPneu(){
       $('#txtBusca').focus();
        
       Swal.fire(
            'Não é possivel editar',
            'Escolha um pneu',
            'error',
        )
    }
</script>
<script>
    function proximo(){
        var prox = document.getElementById("proximo1");
        var a = document.getElementById("bscFrota").value; 
        var verificaStep = document.getElementById("e_S1");
        
        if (verificaStep != null){
            $('#sel_step').show();
        } else {
            $('#sel_step').hide();
        }
        
        if(a != ""){
            
            $('#divVeiculo').hide();
            $('#divPneus').show();
            
            $('#div-pneu').addClass('local-active');
            
            $('#div-veic').removeClass('local-active');
            $('#div-veic').children().children().last().children().removeClass('fa-square-o')
            $('#div-veic').children().children().last().children().addClass('fa-check-square-o')
            $('#div-veic').addClass('local-con');
        
        } else {
            
            Swal.fire(
            'Escolha uma frota',
            '',
            'error',
        )
        
        }
    }
</script> 

<script>
    
    function next2(){
        
        $('#divPneus').hide();
        $('#divResumo').show();
        
        $('#div-resumo').addClass('local-active');
        
        $('#div-pneu').removeClass('local-active');
        $('#div-pneu').children().children().last().children().removeClass('fa-square-o')
        $('#div-pneu').children().children().last().children().addClass('fa-check-square-o')
        $('#div-pneu').addClass('local-con');
        
    }
    
    var gbl_cont = 0;
 
</script>
<script>
    function proximo2(){
        
        $('#objImpressaoCab').hide();
        $('#subtitulo-imp').hide();
        var a = document.getElementById("bscFrota").value;
        $('#frota-res').val(a);
        
        var a3 = document.getElementById('L-int-1');
        var c3 = document.getElementById('R-int-1');
        
        var e = document.getElementById('Step1');
        var f = document.getElementById('Step2');
        
        if (a3) {
            var a4 = a3.value;
        }
        
        if (c3) {
            var c4 = c3.value;
        }
        
        if (e) {
            var e2 = e.value;
        }
        
        if (f) {
            var f2 = f.value;
        }

        if (a3 == "" || c3 == "" || e2 == "" || f2 == "" ){
            var boolean2 = true;
            
            Swal.fire(
                'Preencha todos os campos',
                '',
                'error',
            )
        } else {
            var boolean2 = false;
        }            
        
        if (boolean2 == false){
            
            for(var i=2; i <= gbl_pos; i++){
                
                var a = document.getElementById('L-int-' + i);
                var b = document.getElementById('L-ext-' + i);
                var c = document.getElementById('R-int-' + i);
                var d = document.getElementById('R-ext-' + i);
                
                if (a) {
                    var a2 = a.value;
                }
                
                if (b) {
                    var b2 = b.value;
                }
                
                if (c) {
                    var c2 = c.value;
                }
                
                if (d) {
                    var d2 = d.value;
                }
                
                if (a2 == "" || b2 == "" || c2 == "" || d2 == ""){
                    var boolean = true;
                    
                    Swal.fire(
                        'Preencha todos os campos',
                        '',
                        'error',
                    )
                    
                    break;
                } else {
                    var boolean = false;
                }
                    
            }
            
        }
        
        if (boolean == false){
            next2();
        }
        
        $('.resumo2').remove();
        
        for (var x = gbl_pos; x > 1; x--){
                var eixo = x; 
                var html3 = "<div class='row resumo2' id='resumo-eixo-" + eixo + " ' style='margin-top: 2%;'><div class='col-md-2 eixo-id'><div class='row row-eixo-id'><div class='col-md-2 posicao-eixo'><b>"+ eixo +"</b></div></div></div><div class='col-md-5 info-esquerdo'><div class='row size-tittle'><div class='col-md-2'><label> Interno: </label></div><div class='col-md-2'><input class='input-int' type='text' id='L-pos-int2-" + eixo + "' name='L-pos-int2-" + eixo + "' readonly></div></div><div class='row size-tittle'><div class='col-md-2'><label> Externo: </label></div><div class='col-md-2'><input class='input-ext' type='text' id='L-pos-ext2-" + eixo + "' name='L-pos-ext2-" + eixo + "' readonly></div></div></div><div class='col-md-5 info-direito'><div class='row size-tittle'><div class='col-md-2'><label> Interno: </label></div><div class='col-md-2'><input  class='input-int' type='text' id='R-pos-int2-" + eixo + "' name='R-pos-int2-" + eixo + "' readonly></div></div><div class='row size-tittle'><div class='col-md-2'><label> Externo: </label></div><div class='col-md-2'><input class='input-ext' type='text' id='R-pos-ext2-" + eixo + "' name='R-pos-ext2-" + eixo + "' readonly></div></div></div></div>";
                
                var d3 = document.getElementById('resumo-eixo-' + 1);
                d3.insertAdjacentHTML('afterend', html3);  
                
                var inputVal1  = $('#L-int-1').val();
                var inputVal2  = $('#R-int-1').val();
                
                var inputValue1 = $('#L-int-' + x).val();
                var inputValue2 = $('#L-ext-' + x).val();
                var inputValue3 = $('#R-int-' + x).val();
                var inputValue4 = $('#R-ext-' + x).val();
                
                if (inputVal1){
                    $('#L-pos-int-1').val(inputVal1);
                }
                
                if (inputVal2){
                    $('#R-pos-int-1').val(inputVal2);
                }
                
                
                if (inputValue1){
                    $('#L-pos-int2-' + x).val(inputValue1);
                }
                
                if (inputValue2){
                    $('#L-pos-ext2-' + x).val(inputValue2);
                }
                
                if (inputValue3){
                    $('#R-pos-int2-' + x).val(inputValue3);
                }
                
                if (inputValue4){
                    $('#R-pos-ext2-' + x).val(inputValue4);
                }
                
                var auxiliar = 1;
        }
        
            var stepTest = document.getElementById('Step1');
            
            if (stepTest != null){
                
                $('#step1pos').show();
                
                valueStep1 = $('#Step1').val();
                $('#pos-step1').val(valueStep1);
            } else {
                $('#step1pos').hide();
            }
    
    }
</script> 
<script>   
    function voltar(){
        $('#divVeiculo').show();
        $('#divPneus').hide();
        
        $('#div-pneu').removeClass('local-active');
        
        $('#div-veic').addClass('local-active');
        $('#div-veic').children().children().last().children().addClass('fa-square-o')
        $('#div-veic').children().children().last().children().removeClass('fa-check-square-o')
        $('#div-veic').removeClass('local-con');
    }
    
    function voltar2(){
        $('#divPneus').show();
        $('#divResumo').hide();
        
        $('#div-resumo').removeClass('local-active');
        
        $('#div-pneu').addClass('local-active');
        $('#div-pneu').children().children().last().children().addClass('fa-square-o')
        $('#div-pneu').children().children().last().children().removeClass('fa-check-square-o')
        $('#div-pneu').removeClass('local-con');
    }
    
    function imprimir(){
        $('#objImpressaoCab').show();
        $('#subtitulo-imp').show();
        window.print();
        $('#objImpressaoCab').hide();
        $('#subtitulo-imp').hide();
    }
    
    function imprimir2(){
        var a = document.getElementById("bscFrota").value; 
        
        if(a != ""){
            proximo();
            proximo2();
            $('#objImpressaoCab').show();
            $('#subtitulo-imp').show();
            window.print();
            $('#objImpressaoCab').hide();
            $('#subtitulo-imp').hide();
        } else {
            Swal.fire(
            'Escolha uma frota',
            '',
            'error',
            )
        }    
    }
    
    function finalizar(){
        window.location.href = "https://logistica.nsolucoes.digital/manutencaopneus";
    }

</script>
<script>
    function addPneuR(val){
        
        var pneu1 = document.getElementById('e_' + val + 'R1');
        var pneu2 = document.getElementById('e_' + val + 'R2');
        var pneu3 = document.getElementById('e_' + val + 'L1');
        var pneu4 = document.getElementById('e_' + val + 'L2');
        
        var posPneu = 0;
        
        if (pneu1 && pneu3){
            if (pneu2 && pneu4){
                posPneu = 0;  
                Swal.fire(
                    '',
                    'Limite de pneus atingido',
                    'error',
                )
            }else{
                inserePneu(val)
                posPneu = 2;
            }  
        }else{
            inserePneu(val)
            posPneu = 1;
        }
            
        if (posPneu != 0) {
            var img2 = "<img src='<?php echo base_url('resources/imgs/pneu.png') ?>' id='e_"+val+"L"+posPneu+"' class='img-pneu' title='Pneu Esquerdo'>";
            $('#imgL_' + val).append(img2);
            var img4 = "<img src='<?php echo base_url('resources/imgs/pneu.png') ?>' id='e_res_"+val+"L"+posPneu+"' class='img-pneu' title='Pneu Esquerdo'>";
            $('#imgL_res_' + val).append(img4);
            
            if (posPneu == 1){
                var img = "<img src='<?php echo base_url('resources/imgs/pneu.png') ?>' style='position: relative;left: -20%;' id='e_"+val+"R"+posPneu+"' class='img-pneu' title='Pneu Direito'>";
                $('#imgR_' + val).append(img);
                var img3 = "<img src='<?php echo base_url('resources/imgs/pneu.png') ?>' style='position: relative;left: -20%;' id='e_res_"+val+"R"+posPneu+"' class='img-pneu' title='Pneu Direito'>";
                $('#imgR_res_' + val).append(img3);
            }else{
                var img = "<img src='<?php echo base_url('resources/imgs/pneu.png') ?>' style='position: relative;left: 135%;' id='e_"+val+"R"+posPneu+"' class='img-pneu' title='Pneu Direito'>";
                $('#imgR_' + val).append(img);
                var img3 = "<img src='<?php echo base_url('resources/imgs/pneu.png') ?>' style='position: relative;left: 135%;' id='e_res_"+val+"R"+posPneu+"' class='img-pneu' title='Pneu Direito'>";
                $('#imgR_res_' + val).append(img3);
            }
        } 
    }
</script>
<script>
    function removePneuR(val){
        var pneu1 = document.getElementById('e_' + val + 'R1');
        var pneu2 = document.getElementById('e_' + val + 'R2');
        var pneu3 = document.getElementById('e_' + val + 'L1');
        var pneu4 = document.getElementById('e_' + val + 'L2');
        
        var posPneu = 0;
        
        if (pneu1 && pneu3){
            if (pneu2 && pneu4){
                posPneu = 2;  
                removePneu(val, posPneu);
            }else{
                posPneu = 1;
                removePneu(val, posPneu);
            }  
        }else{
            posPneu = 0;
        }
        
        if (posPneu != 0){
            $('#e_'+val+'R'+posPneu).remove();
            $('#e_'+val+'L'+posPneu).remove();
            $('#e_res_'+val+'R'+posPneu).remove();
            $('#e_res_'+val+'L'+posPneu).remove();
        }
    }
    
    function addStep(val){
        var pneu1 = document.getElementById('e_S1');
        
        var posPneu = 0;
        
        if (pneu1){
                posPneu = 0; 
                Swal.fire(
                    '',
                    'Limite de pneus atingido',
                    'error',
                )
        }else{
            insereStep();
            posPneu = 1;
        }
            
        if (posPneu != 0) {
            if (posPneu == 1){
                var img = "<img src='<?php echo base_url('resources/imgs/pneu-deitado.png') ?>' style='height: 29px!important; position: relative; bottom: 58px; right: 330%;' id='e_S"+posPneu+"' class='img-pneu' title='Pneu Direito'>";
                $('#imgS_' + val).append(img);
                var img2 = "<img src='<?php echo base_url('resources/imgs/pneu-deitado.png') ?>' style='height: 29px!important; position: relative; bottom: -30px; right: 215%;' id='e_res_S"+posPneu+"' class='img-pneu' title='Pneu Direito'>";
                $('#imgS_res_' + val).append(img2);
            }
        } 
    }
    
    function removeStep(val){
        var pneu1 = document.getElementById('e_S1');
        
        var posPneu = 0;
        
        if (pneu1){
                retiraStep();
                posPneu = 1;
        }else{
            posPneu = 0;
        }
        
        if (posPneu != 0){
            $('#e_S'+posPneu).remove();
            $('#e_res_S'+posPneu).remove();
        }
    }
    
    /*function newVazio(val){
        
        var pos = parseInt(val)+1;
        document.getElementById('qtd_eixos').value = pos;
        document.getElementById('func_' + val).style.display="none";
        var html ="<div class='row' id='eixo_" + pos + "' style='justify-content:center;'><div class='row' style='margin-top:-1px; width:100%;'><div class='col-md-5'><div class='e-pneus'><div class='custom-20-e'></div><div class='custom-80-e'></div></div></div><div class='col-md-2 text-center full-car'><br><h4>" + pos + "</h4><hr class='eixo-h' id='" + pos + "_hr'><div id='func_" + pos + "'><button style='max-height:25px;' type='button' class='btn btn-primary btn-custom btn-vazio btn-ativo' onclick='newVazio(" + pos + ")' title='Novo Eixo Sem Pneus'><em style='color: blue' class='fa fa-arrow-down'></em></button><button style='max-height:25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='newPneuGroup(" + pos + ")' title='Novo Eixo Com Pneus'><em class='fa fa-plus'></em></button><button style='max-height:25px;' type='button' class='btn btn-primary btn-custom btn-rem btn-ativo' onclick='rmvEixo(" + pos + ")' title='Remover Último Eixo'><em style='color: red' class='fa fa-close'></em></button></div></div><div class='col-md-5'><div class='d-pneus'><div class='custom-20-d'></div><div class='custom-80-d'></div></div></div></div>";
        var d1 = document.getElementById('eixo_'+val);
        d1.insertAdjacentHTML('afterend', html);
    }*/    
    
    /*function pneuGroupResumo(){
        for (i = 2; i<=gbl_pos; i++){
            var val = i - 1;
            document.getElementById('qtd_eixos').value = i;
            var html ="<div class='row' id='eixo_" + i + "' style='margin-top: -1px; position: relative; right: -9.4%;'><div class='col-md-3'><div class='e-pneus'><div class='custom-20-e' id='imgL_"+ i +"'></div></div></div><div class='col-md-2' id='funcL_" + i + "' style='margin-left: -16.7%; margin-top: 2.2%; position: relative; right: 4%; display: block!important'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removePneuGroup()' title='Remover eixo'><em class='fas fa-times' style='color: red'></em></button></div><div class='col-md-2 text-center full-car'><br><h4>" + i + "</h4><hr class='eixo-h' id='" + i + "_hr'></div><div class='col-md-3'><div class='d-pneus'><div class='custom-20-e' id='imgR_"+ i +"'></div></div></div><div class='col-md-2' id='funcR_" + i + "' style='margin-left: 56.4%; margin-top: -8.3%; display: block!important'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='addPneuR("+i+")' title='Adicionar Pneu'><em class='fa fa-plus'></em></button><button style='max-height: 25px; position: relative; bottom: 0px; right: 0px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removePneuR("+i+")' title='Remover Pneu'><em class='fa fa-minus'></em></button></div><div id='divStep_"+ i +"' class='col-md-3' style='position: relative; right: 43%; top: 35px;'><div class='e-pneus'><div class='custom-20-e' id='imgS_"+ i +"'></div></div><div class='col-md-2' id='func_" + i + "' style='margin-top: 12%; display: block!important; padding-left: 4%'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='addStep("+i+")' title='Adicionar Stepe'><em class='fa fa-plus'></em></button><button style='max-height: 25px; position: relative; bottom: 35px; right: 34px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removeStep("+i+")' title='Remover Step'><em class='fa fa-minus'></em></button></div></div></div>";
        
            var d1 = document.getElementById('eixo_'+ val);
            d1.insertAdjacentHTML('afterend', html);
            
        }
    }*/    
</script>
<script>
    function newPneuGroup(){
        var posAnt = gbl_pos;
        gbl_pos++;
        $('#divStep_'+ posAnt).remove();
        $('#funcL_' + posAnt).remove();
        $('#func_' + posAnt).remove();
        var val = gbl_pos - 1;
        document.getElementById('qtd_eixos').value = gbl_pos;
        var html ="<div class='row' id='eixo_" + gbl_pos + "' style='margin-top: -1px; position: relative; right: -9.4%;'><div class='col-md-3'><div class='e-pneus'><div class='custom-20-e' id='imgL_"+ gbl_pos +"'></div></div></div><div class='col-md-2' id='funcL_" + gbl_pos + "' style='margin-left: -16.7%; margin-top: 2.2%; position: relative; right: 4%; display: block!important'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removePneuGroup()' title='Remover eixo'><em class='fas fa-times' style='color: red'></em></button></div><div class='col-md-2 text-center full-car'><br><h4>" + gbl_pos + "</h4><hr class='eixo-h' id='" + gbl_pos + "_hr'></div><div class='col-md-3'><div class='d-pneus'><div class='custom-20-e' id='imgR_"+ gbl_pos +"'></div></div></div><div class='col-md-2' id='funcR_" + gbl_pos + "' style='margin-left: 56.4%; margin-top: -8.3%; display: block!important'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='addPneuR("+gbl_pos+")' title='Adicionar Pneu'><em class='fa fa-plus'></em></button><button style='max-height: 25px; position: relative; bottom: 0px; right: 0px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removePneuR("+gbl_pos+")' title='Remover Pneu'><em class='fa fa-minus'></em></button></div><div id='divStep_"+ gbl_pos +"' class='col-md-3' style='position: relative; right: 43%; top: 35px;'><div class='e-pneus'><div class='custom-20-e' id='imgS_"+ gbl_pos +"'></div></div><div class='col-md-2' id='func_" + gbl_pos + "' style='margin-top: 12%; display: block!important; padding-left: 4%'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='addStep("+gbl_pos+")' title='Adicionar Stepe'><em class='fa fa-plus'></em></button><button style='max-height: 25px; position: relative; bottom: 35px; right: 34px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removeStep("+gbl_pos+")' title='Remover Step'><em class='fa fa-minus'></em></button></div></div></div>";
        var d1 = document.getElementById('eixo_'+ val);
        d1.insertAdjacentHTML('afterend', html);
        
        var html2="<div class='row' id='eixo_resumo_" + gbl_pos + "' style='margin-top: -1px; position: relative; right: 13.7%;'><div class='col-md-3'><div class='e-pneus'><div class='custom-20-e' id='imgL_res_"+ gbl_pos +"'></div></div></div><div class='col-md-2 text-center full-car'><br><h4>" + gbl_pos + "</h4><hr class='eixo-h' id='" + gbl_pos + "_res_hr'></div><div class='col-md-3'><div class='d-pneus'><div class='custom-20-e' id='imgR_res_"+ gbl_pos +"'></div></div></div><div id='divStep_res_"+ gbl_pos +"' class='col-md-3' style='position: relative; right: 43%; top: 35px;'><div class='e-pneus'><div class='custom-20-e imp_step' id='imgS_res_"+ gbl_pos +"'></div></div></div></div>";
        var d2 = document.getElementById('eixo_resumo_' + val);
        d2.insertAdjacentHTML('afterend', html2);
        
        $('#divProx').removeClass('divProx');
        $('#btn-save').removeClass('botaoProx');
    }
</script>
<script>
    function removePneuGroup(){
        
        $('#divStep_'+ gbl_pos).remove();
        $('#funcL_' + gbl_pos).remove();
        $('#func_' + gbl_pos).remove();
        
        
        var val = gbl_pos;
        removeEixos(val);
        var d1 = document.getElementById('eixo_'+ val);
        d1.remove();
        
        gbl_pos--;
        if (gbl_pos != 1){
            
            var val = gbl_pos;
            var html = "<div class='col-md-2' id='funcL_" + gbl_pos + "' style='margin-left: -16.7%; margin-top: 2.2%; position: relative; right: -28.7%; bottom: 84px; display: block!important'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removePneuGroup()' title='Remover eixo'><em class='fas fa-times' style='color: red'></em></button></div><div id='divStep_"+ gbl_pos +"' class='col-md-3' style='position: relative; right: -39.3%; top: 38px; height: 74px;'><div class='e-pneus'><div class='custom-20-e' id='imgS_"+ gbl_pos +"'></div></div></div><div class='col-md-2' id='func_" + gbl_pos + "' style='margin-top: 8%; display: block!important; padding-left: 6%; position: relative; left: 10.5%;'><button style='max-height: 25px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='addStep("+gbl_pos+")' title='Adicionar Stepe'><em class='fa fa-plus'></em></button><button style='max-height: 25px; position: relative; bottom: 35px; right: 34px;' type='button' class='btn btn-primary btn-custom btn-eixo btn-ativo' onclick='removeStep("+gbl_pos+")' title='Remover Step'><em class='fa fa-minus'></em></button></div>"
            var d1 = document.getElementById('eixo_'+ val);
            d1.insertAdjacentHTML('afterend', html);
            
            $('#btn-save').addClass('botaoProx');
            $('#divProx').addClass('divProx');
        }else {
            $('#divProx').removeClass('divProx');
            $('#btn-save').removeClass('botaoProx');
        }
        
        
    }
    
    /*function rmvEixo(val){
        if(val == 1){
            alert('Não pode remover eixo frontal!');
        }else{
            var pos = parseInt(val)-1;    
            document.getElementById('qtd_eixos').value = pos;
            document.getElementById('func_' + pos).style.display="block";
            document.getElementById('eixo_'+val).remove();
        }
    }*/
        
</script>
