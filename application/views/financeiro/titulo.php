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
                .row-c{
                    width: 110%;
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
                .sel-with-add{
                    width: calc(100% - 65px);
                    display: inline;
                    float: left;
                }
                .sel-with-add select{
                    width: 100%;
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
                                <form action="<?php echo base_url('financeiro/lancatitulo') ?>" method="post">
                                
                                <div class="row" style="padding: 2%;">
                                    <div class="col-md-12">
                                        <div id="conclusao">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>LANÇAMENTO DE TÍTULO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label for="numser"><b>N° Doc:</b></label>
                                                    <input class="form-control" type="text" name="numser" id="numser" maxlength="26" required>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="tipo"><b>Tipo:</b></label>
                                                    <select onchange="buscarEspecie()" style="width: 100%!important" class="form-control" id="tipo" name="tipo" required>
                                                        <option value="" selected disabled> Selecione </option>
                                                        <option value="ENTRADA">Entrada</option>
                                                        <option value="SAIDA">Saída</option>
                                                    </select>
                                                </div>
                                                <!--<div class="col-md-5 form-group">-->
                                                <!--    <label for="tipo"><b>Espécie:</b></label>-->
                                                <!--    <select style="width: 100%!important" class="select2" id="especie" name="especie" required disabled>-->
                                                <!--        <option value="" selected disabled> Selecione </option>-->
                                                        
                                                <!--    </select>-->
                                                <!--</div>-->
                                                <div class="col-md-5 form-group">
                                                    <label for="forma"><b>Forma de pagamento:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forma" name="forma">
                                                        <option value="" disabled selected> Selecione </option>
                                                        <option value='DINHEIRO'>DINHEIRO</option>
                                                        <option value='PIX'>PIX</option>
                                                        <option value='TRANSFERENCIA'>TRANSFERÊNCIA</option>
                                                        <option value='BOLETO'>BOLETO</option>
                                                        <option value='CARTÃO DE CREDITO'>CARTÃO DE CRÉDITO</option>
                                                        <option value='PERMUTA'>PERMUTA</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-1 form-group">
                                                    <button style="margin-top: 45%;" type="button" class="btn-block btn btn-primary" onclick="dynamicTipo('lancatituloModalCenter')"><em class="fa fa-plus"></em></button>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data Vencimento:</b></label>
                                                     <input class="form-control" type="date" name="vencimento" id="vencimento" value="<?php echo date('Y-m-d') ?>" required>
                                                </div>

                                                <div class="col-md-2 form-group">
                                                    <label><b>Valor: </b></label>
                                                    <input type="text" name="valor" id="valor" class="valor form-control" required>
                                                </div>
                                                
                                                <div class="col-md-2 form-group">
                                                    <label><b>N° OS: </b></label>
                                                    <input type="text" name="numos" id="numos" class="form-control">
                                                </div>
                                                
                                                <div class="col-md-4 form-group">
                                                    <label for="fornecedor"><b>Tomador:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forneclin" name="forneclin" required>
                                                        <option value="" selected disabled>Selecione o Tomador</option>
                                                        <?php foreach($forcli as $fcs){?>
                                                        <option value="<?php echo $fcs['id'];?>"><?php echo ucwords(strtolower($fcs['nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-md-1 form-group">
                                                    <button style="margin-top: 45%;" type="button" class="btn-block btn btn-primary" onclick="dynamicFC('lancatituloModalCenter')"><em class="fa fa-plus"></em></button>
                                                </div>
                                                
                                                
                                                
                                                
                                                

                                                <div class="col-md-12 form-group">
                                                    <label><b>Observação:</b></label>
                                                    <textarea style="height: 100px" class="form-control" name="obs" id="obs"></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 10px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 60px)!important;">
                                                        <div class="custom-control custom-switch text-left" style="left: 3%; top: 25px; width: 50%">
                                                            <input onchange="recorrenteChange()" type="checkbox" class="custom-control-input" id="switch1" name="recorrente" value="1">
                                                            <label class="custom-control-label" for="switch1">Este título será recorrente?</label>
                                                            
                                                            <div id="div_repeticao" style="width: 100%; position: absolute;top: 0;left: 260px;display: none">
                                                                <label>Quantos meses se repetirão: </label>
                                                                <input type="number" min="2" id="repeticao" name="repeticao" class="form-control" style="display: inline; width: 100px" placeholder="0">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 text-right">
                                                            <a href="<?php echo base_url('movimentosfinanceiro') ?>"><button type="button" class="btn btn-secondary">Voltar</button></a>
                                                            <button type="submit" class="btn btn-primary">Cadastrar</button>
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
            
            <!---MODAL-->
            <div class="modal fade" id="addtipo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="margin-top: 2%;">
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
                                    <select class="select2" id="tipo_tipo"  style="width: 100%!important">
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
            
            
            
            <!---MODAL-->
            <div class="modal fade" id="addfc" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-fc" role="document" style="width: 60%;margin: 1% 0 0 20%;max-width: 100%;">
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
            
            
            
            
            <script>
                $(document).ready(function(){
                    $('.select2').select2({theme: "bootstrap"});
                    $('.valor').mask("#.##0,0000", {reverse: true});
                    
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('.cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('.number').mask("0#");
                    $('.cep').unmask().val('').mask('00000-000');
                    $('.cnpj').val().length > 11 ? $('.cnpj').mask('00.000.000/0000-00', cpfoptions) : $('.cnpj').mask('000.000.000-00#', cpfoptions);
                })
            </script>
            
            <script>
                function buscarEspecie(){
                    dados = new FormData();
                    dados.append('tipo', $('#tipo').val());
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
                                            
                                            if(novo.tm_tipo == $('#tipo').val()){
                                                $('#especie').append(opt);    
                                            }
                                            
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
            function recorrenteChange(){
                if($('#switch1').prop('checked')){
                    $('#div_repeticao').show();
                } else {
                    $('#div_repeticao').hide();
                    $('#repeticao').val('');
                }
            }
        </script>
 

            
