        
            <style>
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    background-color: white;
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
                .check-box{
                    padding-right: 0px;
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
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <form action="<?php echo base_url('usuario/insertUsuario') ?>" method="post">                
                    <div class="row main-row">
                        <div class="col-md-12 main-col-12">
                            
    
                                <input type="hidden" id="id" name="id" value="">
                                <!-- -->
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="cpf">CPF</label>
                                        <input id="cpf" name="cpf" type="text" class="form-control disabled-field" placeholder="123.456.789-00" required> <br>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="rg">RG</label>
                                        <input id="rg" name="rg" type="text" class="form-control disabled-field" placeholder="Ex.: XX-00.000.000" required disabled> <br>
                                    </div>
                                </div>
                                <!-- -->
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <label for="nome">Nome Completo</label>
                                        <input id="nome" name="nome" type="text" class="form-control disabled-field" placeholder="Ex.: João da Silva" required disabled> <br>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="nascimento">Data de Nascimento</label>
                                        <input id="nascimento" name="nascimento" type="date" class="form-control disabled-field" placeholder="Ex.: 09/09/1999" required disabled> <br>
                                    </div>
                                </div>
                                <!-- -->
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="telefone">Telefone</label>
                                        <input id="telefone" name="telefone" type="text" class="form-control disabled-field" placeholder="Ex.: (00)0000-0000" required disabled> <br>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="celular">Celular</label>
                                        <input id="celular" name="celular" type="text" class="form-control disabled-field" placeholder="Ex.: (00)0000-0000" disabled> <br>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="funcao">Função</label>
                                        <select class="js-example-basic-multiple disabled-field"  style="width: 100%!important" name="funcao" id="funcao" required disabled>
                                            <option selected disabled value="">-- Selecionar --</option>
                                            <?php foreach($funcoes as $funcao){?>
                                                <option id="<?php echo "funcao-" . $funcao['funcao_id'] ?>" value="<?php echo $funcao['funcao_id'] ?>"><?php echo $funcao['funcao_nome'] ?></option>
                                            <?php } ?>
                                        </select> <br>
                                    </div>
            
                                    <div class="col-md-3 form-group">
                                        <label for="ativo">Ativo</label>
                                        <select class="js-example-basic-multiple disabled-field"  style="width: 100%!important" name="ativo" id="ativo" required disabled>
                                            <option id="ativo-placeholder" selected disabled value="">-- Selecionar --</option>
                                            <?php foreach($ativos as $ativo){?>
                                                <option value="<?php echo $ativo['ativo_id'];?>"><?php echo $ativo['ativo_tipo'];?></option>
                                            <?php } ?>
                                        </select> <br>
                                    </div>
                                </div>
                                <!-- -->
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="cep">CEP</label>
                                        <input id="cep" name="cep" type="text" class="form-control disabled-field" onkeypress="$(this).mask('00000-000');" placeholder="12345-678" required disabled> <br>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label for="endereco">Logradouro</label>
                                        <input id="endereco" name="endereco" type="text" class="form-control" placeholder="Ex.: Rua Delfim Moreira" required disabled> <br>
                                    </div>
                                </div>
                                <!-- -->
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="numero">Número</label>
                                        <input id="numero" name="numero" type="text" class="form-control" placeholder="Ex.: 999" required disabled> <br>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="bairro">Bairro</label>
                                        <input id="bairro" name="bairro" type="text" class="form-control" placeholder="Preencha corretamente o CEP" required disabled> <br>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="cidade">Cidade</label>
                                        <input id="cidade" name="cidade" type="text" class="form-control" placeholder="Preencha corretamente o CEP" required disabled> <br>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label for="estado">Estado</label>
                                        <input id="estado" name="estado" type="text" class="form-control" placeholder="Preencha corretamente o CEP" required disabled> <br>
                                    </div>
                                </div>
                                <!-- -->
                                <hr style="height: 1px; background-color: #ccc; border: none;">
                                <div class="row">
                                    <div class="col-md-12" style="margin-bottom:20px">
                                        <h3>Dias de Acesso</h3>
                                    </div>
                                </div>
                                <!-- -->
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div class="col-md-3 check-box">
                                            <input class="day inline disabled-field" type="checkbox" id="seg" name="dias[]" value="seg" disabled/>
                                            <label class="inline" for="seg" style="width: 50px; display:inline;">Seg</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="hora-entrada inline" type="text" id="seg-entrada" name="seg-entrada" placeholder="Ex.: 08:00" disabled style="width: 40%" />
                                            <p class="inline" style="width: 10%">&nbsp;às&nbsp;</p>
                                            <input class="hora-saida inline" type="text" id="seg-saida" name="seg-saida" placeholder="Ex.: 18:00" disabled style="width: 40%" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="col-md-3 check-box">
                                            <input class="day inline disabled-field" type="checkbox" id="ter" name="dias[]" value="ter" disabled/>
                                            <label class="inline" for="ter" style="width: 50px; display: inline;">Ter</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="hora-entrada inline" type="text" id="ter-entrada" name="ter-entrada" placeholder="Ex.: 08:00" disabled style="width: 40%" />
                                            <p class="inline" style="width: 10%">&nbsp;às&nbsp;</p>
                                            <input class="hora-saida inline" type="text" id="ter-saida" name="ter-saida" placeholder="Ex.: 18:00" disabled style="width: 40%" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="col-md-3 check-box">
                                            <input class="day inline disabled-field" type="checkbox" id="qua" name="dias[]" value="qua" disabled/>
                                            <label class="inline" for="qua" style="width: 50px; display: inline;">Qua</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="hora-entrada inline" type="text" id="qua-entrada" name="qua-entrada" placeholder="Ex.: 08:00" disabled style="width: 40%" />
                                            <p class="inline" style="width: 10%">&nbsp;às&nbsp;</p>
                                            <input class="hora-saida inline" type="text" id="qua-saida" name="qua-saida" placeholder="Ex.: 18:00" disabled style="width: 40%" />
                                        </div>
                                    </div>
                                </div>
                                <!-- -->
                                <br>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div class="col-md-3 check-box">
                                            <input class="day inline disabled-field" type="checkbox" id="qui" name="dias[]" value="qui" disabled/>
                                            <label class="inline" for="qui" style="width: 50px; display: inline;">Qui</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="hora-entrada inline" type="text" id="qui-entrada" name="qui-entrada" placeholder="Ex.: 08:00" disabled style="width: 40%" />
                                            <p class="inline" style="width: 10%">&nbsp;às&nbsp;</p>
                                            <input class="hora-saida inline" type="text" id="qui-saida" name="qui-saida" placeholder="Ex.: 18:00" disabled style="width: 40%" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="col-md-3 check-box">
                                            <input class="day inline disabled-field" type="checkbox" id="sex" name="dias[]" value="sex" disabled/>
                                            <label class="inline" for="sex" style="width: 50px; display: inline;">Sex</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="hora-entrada inline" type="text" id="sex-entrada" name="sex-entrada" placeholder="Ex.: 08:00" disabled style="width: 40%" />
                                            <p class="inline" style="width: 10%">&nbsp;às&nbsp;</p>
                                            <input class="hora-saida inline" type="text" id="sex-saida" name="sex-saida" placeholder="Ex.: 18:00" disabled style="width: 40%" />
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <div class="col-md-3 check-box">
                                            <input class="day inline disabled-field" type="checkbox" id="sab" name="dias[]" value="sab" disabled/>
                                            <label class="inline" for="sab" style="width: 50px; display: inline;">Sab</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="hora-entrada inline" type="text" id="sab-entrada" name="sab-entrada" placeholder="Ex.: 08:00" disabled style="width: 40%" />
                                            <p class="inline" style="width: 10%">&nbsp;às&nbsp;</p>
                                            <input class="hora-saida inline" type="text" id="sab-saida" name="sab-saida" placeholder="Ex.: 18:00" disabled style="width: 40%" />
                                        </div>
                                    </div>
                                </div>
                                <!-- -->
                                <br>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <div class="col-md-3 check-box">
                                            <input class="day inline disabled-field" type="checkbox" id="dom" name="dias[]" value="dom" disabled>
                                            <label class="inline" for="dom" style="width: 50px; display: inline; font-size: 14px">Dom</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="hora-entrada inline" type="text" id="dom-entrada" name="dom-entrada" placeholder="Ex.: 08:00" disabled style="width: 40%" />
                                            <p class="inline" style="width: 10%" >&nbsp;às&nbsp;</p>
                                            <input class="hora-saida inline" type="text" id="dom-saida" name="dom-saida" placeholder="Ex.: 18:00" disabled style="width: 40%" />
                                        </div>
                                    </div>
                                </div>
                                <!-- -->
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary disabled-field" id="irrestrito" disabled>Acesso Irrestrito</button>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-primary disabled-field" id="revogar" disabled>Reiniciar Dias e Horas</button>
                                    </div>
                                </div>
                            
                            
                        </div>
                        <div class="col-md-12">
                            <br><br>
                            <div class="row" style="margin-bottom: 50px">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('usuarios') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <button type="submit" id="btn-save" class="btn btn-primary disabled-field" style="color: white" disabled>&nbsp&nbspSalvar&nbsp&nbsp</button>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <button type="button" id="btn-clear" class="btn btn-primary disabled-field" style="color: white" disabled>&nbsp&nbspLimpar&nbsp&nbsp</button>
                                    <?php if($edita != null){ ?>
                                        &nbsp&nbsp&nbsp&nbsp
                                        <button type="button" id="btn-password-reset" class="btn btn-danger disabled-field" onclick="resetSenha()" disabled>&nbsp&nbspResetar Senha&nbsp&nbsp</button>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                    var SPMaskBehavior = function (val) {
                        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                    },
                    spOptions = {
                        onKeyPress: function(val, e, field, options) {
                            field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                    };
                
                    $('#telefone').mask(SPMaskBehavior, spOptions);
                    $('#celular').mask(SPMaskBehavior, spOptions);
                    $('#cpf').mask('000.000.000-00');
                    $('.hora-entrada').mask('00:00');
                    $('.hora-saida').mask('00:00');
                    
                    function autoFillByID(id){
                        var dados = {
                            'usuario_id': id
                        };
                    
                        $.ajax({
                            url : '<?php echo base_url('usuario/getUsuarioById') ?>',
                            type : 'POST',
                            dataType : 'json',
                            data : dados,
                            success : function(res) {
                                treatAutofillData(res);
                            },
                            error : function(xhr, status, error) {
                                alert(status + " " + error + " " + xhr);
                            }
                        });
                    
                        $('.disabled-field').removeAttr('disabled');
                    }
                    
                    <?php 
                        if($edita != null){
                            echo "autoFillByID(". $edita['usuario_id'] ."); ";
                    
                        }
                    ?>
                    
                    function getNumbersFromCPF(cpf){
                        return cpf.replaceAll(".", "").replaceAll("-", "");
                    }
                    
                    $("input[type=checkbox]").on('change', function(){
                        var id = this.id;
                        if($(this).is(":checked")){
                            $("#" + id + "-entrada").prop('required', true);
                            $("#" + id + "-saida").prop('required', true);
                            $("#" + id + "-entrada").prop('disabled', false);
                            $("#" + id + "-saida").prop('disabled', false);
                        }else{
                            $("#" + id + "-entrada").prop('required', false);
                            $("#" + id + "-saida").prop('required', false);
                            $("#" + id + "-entrada").prop('disabled', true);
                            $("#" + id + "-saida").prop('disabled', true);
                        }
                    });
                    
                    $("#cpf").keyup(function() {
                        if($("#cpf").val().length == 14){
                            
                            var dados = new FormData();
                            dados.append('usuario_cpf', getNumbersFromCPF($("#cpf").val()));

                            $.ajax({
                                url : '<?php echo base_url('usuario/getUsuarioByCPF') ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                success : function(response) {
                                    if(response != "null"){
                                        res = jQuery.parseJSON(response);
                                        treatAutofillData(res);
                                    }
                                },
                                error : function(xhr, status, error) {
                                    var err = eval("(" + xhr.responseText + ")");
                                alert(status + " " + error + " " + err);
                                }
                            });
                            
                            
                            $(".disabled-field").removeAttr('disabled');
                        }
                    });  
                    
                    function treatAutofillData(data){
                        
                        var SPMaskBehavior = function (val) {
                            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                        },
                        spOptions = {
                            onKeyPress: function(val, e, field, options) {
                                field.mask(SPMaskBehavior.apply({}, arguments), options);
                        }
                        };
                        
                        if($("#cpf").val().length == 0)$("#cpf").unmask().val(data.usuario_cpf).mask('000.000.000-00');
                        $("#id").val(data.usuario_id);
                        $("#nome").val(data.usuario_nome);
                        
                        $("#telefone").unmask().val(data.usuario_telefone).mask(SPMaskBehavior, spOptions);
                        $("#celular").unmask().val(data.usuario_celular).mask(SPMaskBehavior, spOptions);
                        $("#rg").val(data.usuario_rg);
                        $("#nascimento").val(data.usuario_nascimento);
                        $("#cep").val(data.usuario_cep);
                        $("#endereco").val(data.usuario_endereco);
                        $("#numero").val(data.usuario_numero);
                        $("#cidade").val(data.usuario_cidade);
                        $("#bairro").val(data.usuario_bairro);
                        $("#estado").val(data.usuario_estado);
            
                        $("#funcao").val(data.usuario_funcao_id).change();
                        $("#ativo").val(data.usuario_ativo_id).change();
                        
                        //$("#permissao").val(data.usuario_permissao);
                        
                        
                        //FORMATAR TRABALHO
                        var trabalho = data.usuario_trabalho;
                        var trabalhoSplitPipe = trabalho.split('|');
                        for(var i in trabalhoSplitPipe) {
                            var trabalhoDia = trabalhoSplitPipe[i];
                            var diaReferente = trabalhoDia.split('-')[0];
                            var hrEntrada = trabalhoDia.split('-')[1];
                            var hrSaida = trabalhoDia.split('-')[2];
                            $("#" + diaReferente).prop("checked", true);
                            $("#" + diaReferente + "-entrada").prop("disabled", false);
                            $("#" + diaReferente + "-saida").prop("disabled", false);
                            $("#" + diaReferente + "-entrada").prop("required", true);
                            $("#" + diaReferente + "-saida").prop("required", true);
                            $("#" + diaReferente + "-entrada").unmask().val(hrEntrada).mask('00:00');
                            $("#" + diaReferente + "-saida").unmask().val(hrSaida).mask('00:00');
                        } 
                        $("#endereco").prop("disabled", false);
            			$("#numero").prop("disabled", false);
            			$("#bairro").prop("disabled", false);
            			$("#cidade").prop("disabled", false);
            		    $("#estado").prop("disabled", false);
                    }
                    
                    $("#btn-clear").click(function(){
                        window.location.href = '<?php echo base_url('cadastrarusuario') ?>';
                        /*
                        $("input").each(function(){
                            $(this).val(""); 
                            $(this).prop("disabled", true);
                        });
                        $("select").each(function(){
                            $(this).val("").change();
                            $(this).prop("disabled", true);
                        });
                        $("input[type=checkbox]").each(function(){
                           $(this).prop("checked", false); 
                        });
                        $("button").prop("disabled", true);
                        
                        $("#btn-save").val("Salvar");
                        $("#cpf").prop("disabled", false);
                        */
                    });
                    
                    $("#btn-password-reset").click(function(){
                        if($("#id").val().length > 0){
                            var dados = {
                                'usuario_id': $("#id").val()
                            };
                        $.ajax({
                            url : '<?php echo base_url('usuario/resetSenha') ?>',
                            type : "POST",
                            data : dados,
                            success : function(response) {
                                alert('Senha alterada para o CPF.');
                            },
                            error : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(status + " " + error + " " + err);
                            }
                        });
                        }
                    });
                    
                    $("#cep").keyup(function(){
                        if($("#cep").val().length == 9){
                            // Remove tudo o que não é número para fazer a pesquisa
            				var cep = this.value.replace(/[^0-9]/, "");
            				
            				// Validação do CEP; caso o CEP não possua 8 números, então cancela
            				// a consulta
            				if(cep.length != 8){
            					return false;
            				}
            				
            				// A url de pesquisa consiste no endereço do webservice + o cep que
            				// o usuário informou + o tipo de retorno desejado (entre "json",
            				// "jsonp", "xml", "piped" ou "querty")
            				var url = "https://viacep.com.br/ws/"+cep+"/json/";
            				
            				// Faz a pesquisa do CEP, tratando o retorno com try/catch para que
            				// caso ocorra algum erro (o cep pode não existir, por exemplo) a
            				// usabilidade não seja afetada, assim o usuário pode continuar//
            				// preenchendo os campos normalmente
            				$.getJSON(url, function(dadosRetorno){
            					try{
            						// Preenche os campos de acordo com o retorno da pesquisa
            						$("#endereco").val(dadosRetorno.logradouro);
            						$("#cidade").val(dadosRetorno.localidade);
            						$("#estado").val(dadosRetorno.uf);
            						$("#bairro").val(dadosRetorno.bairro);
            						$("#bairro").prop("disabled", false);
            						$("#endereco").prop("disabled", false);
            						$("#numero").prop("disabled", false);
            						$("#cidade").prop("disabled", false);
            						$("#estado").prop("disabled", false);
            					}catch(ex){
            					    alert("Erro na captura dos dados a partir do CEP: " + ex);
            					}
            				});
                        }
            		});
                       
                });             
            </script>
            
            <script>
                $('#irrestrito').on('click', function(){
                    $('.day').each(function(){
                        $(this).prop('checked', true);
                    });
                    $('.hora-entrada').each(function(){
                        $(this).unmask().val('00:00').mask('00:00');
                        $(this).prop('disabled', false).prop('required', true);
                    });
                    $('.hora-saida').each(function(){
                        $(this).unmask().val('23:59').mask('00:00');
                        $(this).prop('disabled', false).prop('required', true);
                    });
                });
                
                $('#revogar').on('click', function(){
                    $('.day').each(function(){
                        $(this).prop('checked', false);
                    });
                    $('.hora-entrada').each(function(){
                        $(this).unmask().val('').mask('00:00');
                        $(this).prop('disabled', true).prop('required', false);
                    });
                    $('.hora-saida').each(function(){
                        $(this).unmask().val('').mask('00:00');
                        $(this).prop('disabled', true).prop('required', false);
                    });
                });
            </script>
            