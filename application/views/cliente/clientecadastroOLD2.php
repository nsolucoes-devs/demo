<style>
    .inline{
        display: inline;
    }    
    label{
        font-size: 15px;
    }
    .disabled-field{}
    .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
        margin: 0;
        padding: 0;
        border: none;
        box-shadow: none;
        text-align: center;
    }
    .kv-avatar {
        display: inline-block;
    }
    .kv-avatar .file-input {
        display: table-cell;
        width: 213px;
    }
    .kv-reqd {
        color: red;
        font-family: monospace;
        font-weight: normal;
    }
</style>

<br>
<section id="main-content">
    <section class="wrapper">
        
        <div class="row">
            <div class="col-md-12">
                <h3>Clientes > <?php if(isset($_GET['edicao_cpf'])){echo 'Edição de Cliente';}else{echo 'Cadastro de Cliente';} ?></h3>
            </div>
        </div>
        
        <hr style="height: 1px; background-color: #ccc; border: none;">
        
        <div class="row" style="margin-left: 0px; margin-right: 0px">
            
            <form id="clienteForm" action="<?php echo base_url('cliente/insertCliente') ?>" method="post" enctype='multipart/form-data'>
                <div class="col-md-12" style="background-color:white;">
                    <br>
                
                    <input type="hidden" id='isedit' name='isedit'/>
                    <div class="row">
                        <div class="col-md-4 form-group" style="position: relative">
                            <label for="cpf" style="display: inline; max-width:20%;">CPF</label>
                            <input id="cpf" name="cpf" type="text" class="form-control disabled-field" onkeypress="$(this).mask('000.000.000-00');" placeholder="123.456.789-00"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <?php if(isset($_GET['edicao_cpf'])){ ?>
                        <div class="col-md-4 form-group" style="margin-top: 10px; height: 45px; background-color: transparent; position: absolute; cursor: not-allowed;">
                        </div>
                        <?php } ?>
                    </div>
    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="nome" style="display: inline; max-width:20%;">Nome Completo</label>
                            <input id="nome" name="nome" type="text" class="form-control disabled-field" placeholder="Ex.: João da Silva"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="nascimento" style="display: inline; max-width:20%;">Nascimento</label>
                            <input id="nascimento" name="nascimento" type="date" class="form-control disabled-field" placeholder="01/01/2001"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="rg" style="display: inline; max-width:30%;">RG</label>
                            <input id="rg" name="rg" type="text" class="form-control disabled-field" placeholder="Ex.: XX-12.345.678"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                    </div>
                    
                    <hr style="height: 1px; background-color: #ccc; border: none;">
                    
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="cep" style="display: inline; max-width:20%;">CEP</label>
                            <input id="cep" name="cep" type="text" class="form-control disabled-field" onkeypress="$(this).mask('00000-000');" placeholder="12345-678"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-7 form-group">
                            <label for="endereco" style="display: inline; max-width:30%;">Logradouro</label>
                            <input id="endereco" name="endereco" type="text" class="form-control" placeholder="Ex.: Rua Delfim Moreira"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="numero" style="display: inline; max-width:30%;">Numero</label>
                            <input id="numero" name="numero" type="text" class="form-control" placeholder="Ex.: 509"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                    </div>
    
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label for="bairro" style="display: inline; max-width:20%;">Bairro</label>
                            <input id="bairro" name="bairro" type="text" class="form-control" placeholder="Ex.: Centro"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="complemento" style="display: inline; max-width:50%;">Complemento</label>
                            <input id="complemento" name="complemento" type="text" class="form-control" placeholder="Ex.: apt., blc., lte. etc"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="cidade" style="display: inline; max-width:30%;">Cidade</label>
                            <input id="cidade" name="cidade" type="text" class="form-control" placeholder="Ex.: Uberaba"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-3 form-group">
                            <label for="estado" style="display: inline; max-width:30%;">Estado</label>
                            <input id="estado" name="estado" type="text" class="form-control" placeholder="Ex.: Minas Gerais"
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                    </div>
                    
                    <hr style="height: 1px; background-color: #ccc; border: none;">
                    
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="telefone" style="display: inline; max-width:20%;">Telefone Fixo</label>
                            <input id="telefone" name="telefone" type="text" class="form-control disabled-field" placeholder="Ex.: (12) 3456-7890"
                            style="display:inline; width:100%; float:right;" onkeypress="$(this).mask('(00) 0000-0000');" required disabled> <br>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="celular1" style="display: inline; max-width:30%;">Celular 1</label>
                            <input id="celular1" name="celular1" type="text" class="form-control disabled-field" placeholder="Ex.: (12) 3 4567-8900"
                            style="display:inline; width:100%; float:right;" onkeypress="$(this).mask('(00) 0 0000-0000');" required disabled> <br>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="celular2" style="display: inline; max-width:30%;">Celular 2</label>
                            <input id="celular2" name="celular2" type="text" class="form-control disabled-field" placeholder="Ex.: (12) 3 4567-8900"
                            style="display:inline; width:100%; float:right;" onkeypress="$(this).mask('(00) 0 0000-0000');" disabled> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label for="beneficio1" style="display: inline; max-width:30%;">Beneficio 1</label>
                            <input id="beneficio1" name="beneficio1" type="text" class="form-control disabled-field" placeholder="Ex.: "
                            style="display:inline; width:100%; float:right;" required disabled> <br>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="beneficio2" style="display: inline; max-width:30%;">Beneficio 2</label>
                            <input id="beneficio2" name="beneficio2" type="text" class="form-control disabled-field" placeholder="Ex.: "
                            style="display:inline; width:100%; float:right;" disabled> <br>
                        </div>
                        <div class="col-md-4 form-group">
                            <label for="ativo">Ativo</label>
                            <select class="js-example-basic-multiple disabled-field"  style="width: 100%!important" name="ativo" id="ativo" required disabled>
                                <?php foreach($ativos as $ativo){
                                    if(isset($_GET['edicao_cpf'])){
                                        if($this->session->userdata('y_a') == 1){
                                            echo '<option value="'.$ativo['ativo_id'].'">'.$ativo['ativo_tipo'].'</option>';
                                        }else{
                                            if($ativo['ativo_id'] == 2){
                                                echo '<option value="'.$ativo['ativo_id'].'">'.$ativo['ativo_tipo'].'</option>';
                                            }
                                        }
                                    }else if($ativo['ativo_id'] != 2){
                                        echo '<option value="'.$ativo['ativo_id'].'">'.$ativo['ativo_tipo'].'</option>';
                                    }
                                } ?>
                            </select>
                        </div>
                    </div>
                    
                    <hr style="height: 1px; background-color: #ccc; border: none;">
                    
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom:20px">
                            <h3>Documentação</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>RG</h3>
                        </div>
                        <div class="col-md-6">
                            <h3>CPF</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="ml-2 col-md-6">
                                    <img src="
                                    <?php if(isset($_GET['edicao_cpf'])){
                                                echo base_url('uploads/' . $_GET['edicao_cpf'] . '_rg.png');
                                            }else{
                                                echo base_url('resources/imgs/imgplaceholder.png');
                                            } ?>
                                    
                                    " id="rg-preview" class="img-thumbnail" style="max-width:200px; height:auto;"/>
                                </div>
                                <div class="ml-2 col-md-6">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" placeholder="Selecione uma imagem" id="rg-file" 
                                        value="<?php if(isset($_GET['edicao_cpf'])){ echo $_GET['edicao_cpf'] . '_rg.png'; } ?>" disabled style="width: 100%"/>
                                        <div class="input-group-append">
                                            <input id="rg-doc" type="file" name="rg-doc" form="clienteForm" class="file" accept="image/png" style="display:none;" 
                                            <?php if(isset($_GET['edicao_cpf'])){ echo "disabled" ; } ?> required />
                                            <button id="rg-search" type="button" class="browse btn btn-primary">Buscar...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <div class="ml-2 col-sm-6">
                                    <img src="
                                    <?php if(isset($_GET['edicao_cpf'])){
                                                echo base_url('uploads/' . $_GET['edicao_cpf'] . '_cpf.png');
                                            }else{
                                                echo base_url('resources/imgs/imgplaceholder.png');
                                            } ?>
                                    
                                    " id="cpf-preview" class="img-thumbnail" style="max-width:200px; height:auto;"/>
                                </div>
                                <div class="ml-2 col-sm-6">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" placeholder="Selecione uma imagem" id="cpf-file" 
                                        value="<?php if(isset($_GET['edicao_cpf'])){ echo $_GET['edicao_cpf'] . '_cpf.png'; } ?>" disabled style="width: 100%"/>
                                        <div class="input-group-append">
                                            <input id="cpf-doc" type="file" name="cpf-doc" form="clienteForm" class="file" accept="image/png" style="display:none;" 
                                            <?php if(isset($_GET['edicao_cpf'])){ echo "disabled" ; } ?> required />
                                            <button id="cpf-search" type="button" class="browse btn btn-primary">Buscar...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Habilitação</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <br>
                                <div class="ml-2 col-sm-6">
                                    <img src="
                                    <?php if(isset($_GET['edicao_cpf'])){
                                                echo base_url('uploads/' . $_GET['edicao_cpf'] . '_rg.png');
                                            }else{
                                                echo base_url('resources/imgs/imgplaceholder.png');
                                            } ?>
                                    
                                    " id="hab-preview" class="img-thumbnail" style="max-width:200px; height:auto;"/>
                                </div>
                                <div class="ml-2 col-sm-6">
                                    <div class="input-group my-3">
                                        <input type="text" class="form-control" placeholder="Selecione uma imagem" id="hab-file" 
                                        value="<?php if(isset($_GET['edicao_cpf'])){ echo $_GET['edicao_cpf'] . '_hab.png'; } ?>" disabled style="width: 100%"/>
                                        <div class="input-group-append">
                                            <input id="hab-doc" type="file" name="hab-doc" form="clienteForm" class="file" accept="image/png" style="display:none;" 
                                            <?php if(isset($_GET['edicao_cpf'])){ echo "disabled" ; } ?> required />
                                            <button id="hab-search" type="button" class="browse btn btn-primary">Buscar...</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <br><br>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="<?php echo base_url('cliente/listagem') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                    &nbsp&nbsp&nbsp&nbsp
                    <button type="submit" id="btn-save" class="btn btn-primary disabled-field" disabled>&nbsp&nbspSalvar&nbsp&nbsp</button>
                    &nbsp&nbsp&nbsp&nbsp
                    <button id="btn-clear" class="btn btn-primary disabled-field" disabled>&nbsp&nbspLimpar&nbsp&nbsp</button>
                </div>
            </div>
            </form>
        </div>
        <br><br>
    </section>
</section>

<script>
    $(document).ready(function(){
        
        $('.js-example-basic-multiple').select2({theme: "bootstrap"});
        
        /* função da mascara do telefone
        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length == 11 ? '(00) 00000-0000' : '(00) 0000-0000';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('#telefone').mask(SPMaskBehavior, spOptions);
        */
        
        function getNumbersFromCPF(cpf){
            return cpf.replaceAll(".", "").replaceAll("-", "");
        }
        
        function autoFillByCPF(cpf){
            
            var dados = {
                'cliente_cpf': cpf
            };
        
            $.ajax({
                url : '<?php echo base_url('cliente/getClienteByCPF') ?>',
                type : 'POST',
                dataType : 'json',
                data : dados,
                success : function(response) {
                    res = response[0];
                    treatAutofillData(res);
                    
                },
                error : function(xhr, status, error) {
                    alert(status + " " + error + " " + xhr);
                }
            });
            
            /*
            $("cpf-preview").attr("src", writePath + cpf_fileName);
            $("rg-preview").attr("src", writePath + rg_fileName);
            $("hab-preview").attr("src", writePath + hab_fileName);
            $("cpf-file").val(cpf_fileName);
            $("rg-file").val(rg_fileName);
            $("hab-file").val(hab_fileName);
            */
        
            $('.disabled-field').removeAttr('disabled');
        }
        
        <?php 
            if(isset($_GET['edicao_cpf'])){
                $edicao_cpf = $_GET['edicao_cpf'];
                
                echo "
                    autoFillByCPF(". $edicao_cpf ."); 
                ";
        
            }
        ?>
        
        $("#cpf").keyup(function() {
            if($("#cpf").val().length == 14){
                
                var dados = {
                    'cliente_cpf': getNumbersFromCPF($("#cpf").val())
                };
                
                $.ajax({
                    url : '<?php echo base_url('cliente/getClienteByCPF') ?>',
                    type : "POST",
                    dataType : "json",
                    data : dados,
                    success : function(response) {
                        res = response[0];
                        treatAutofillData(res);
                    },
                    error : function(xhr, status, error) {
                        alert(status + " " + error + " " + err);
                    }
                });
                
                
                $(".disabled-field").removeAttr('disabled');
            }
        });  
        
        function treatAutofillData(data){
            
            if($("#cpf").val().length == 0)$("#cpf").val(data.cliente_cpf);
            if(data.cliente_nome.length > 0){
                $("#isedit").replaceWith('<input type="hidden" id="isedit" name="isedit" value="1" />');
            }
            $("#nome").val(data.cliente_nome);
            $("#rg").val(data.cliente_rg);
            
            $("#cep").unmask();
            $("#cep").val(data.cliente_cep);
            $("#cep").mask("00000-000");
            
            $("#numero").val(data.cliente_numero);
            $("#numero").prop("disabled",false);
            $("#complemento").val(data.cliente_complemento);
            $("#complemento").prop("disabled",false);
            $("#endereco").val(data.cliente_endereco);
            $("#endereco").prop("disabled",false);
            $("#bairro").val(data.cliente_bairro);
            $("#bairro").prop("disabled",false);
            $("#cidade").val(data.cliente_cidade);
            $("#cidade").prop("disabled",false);
            $("#estado").val(data.cliente_estado);
            $("#estado").prop("disabled",false);
            
            $("#ativo").val(data.cliente_ativo_id).change();
            $("#ativo").prop("disabled",false);
            
            $("#telefone").unmask();
            $("#telefone").val(data.cliente_fixo);
            $("#telefone").mask('(00) 0000-0000');
            
            $("#celular1").unmask();
            $("#celular1").val(data.cliente_cel1);
            $("#celular1").mask('(00) 0 0000-0000');
            
            $("#celular2").unmask();
            $("#celular2").val(data.cliente_cel2);
            $("#celular2").mask('(00) 0 0000-0000');
            
            $("#nascimento").val(data.cliente_nascimento);
            
            $("#beneficio1").val(data.cliente_beneficio1);
            $("#beneficio2").val(data.cliente_beneficio2);
            
        }
        
        $("#btn-clear").click(function(){
            $("input").each(function(){
                $(this).val(""); 
                $(this).prop("disabled", true);
            });
            $("select").each(function(){
                $(this).val("").change();
                $(this).prop("disabled", true);
            });
            $("button").prop("disabled", true);
            
            $("#btn-save").val("Salvar");
            $("#cpf").prop("disabled", false);
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
						$("#bairro").val(dadosRetorno.bairro);
						$("#cidade").val(dadosRetorno.localidade);
						$("#estado").val(dadosRetorno.uf);
						
						$("#endereco").prop("disabled", false);
						$("#numero").prop("disabled", false);
						$("#cidade").prop("disabled", false);
						$("#estado").prop("disabled", false);
						$("#bairro").prop("disabled", false);
						$("#complemento").prop("disabled", false);
					}catch(ex){
					    alert("Erro na captura dos dados a partir do CEP: " + ex);
					}
				});
            }
		});
    
        $(document).on("click", ".browse", function() {
            var id = this.id;
            id = id.replaceAll("-search", "");
            var file = $(this).parents().find("#" + id + "-doc");
            file.prop("disabled", false);
            file.trigger("click");
        });
        
        $('input[type="file"]').change(function(e) {
            var fileID = this.id;
            fileID = fileID.replaceAll("-doc", "");
            var fileName = e.target.files[0].name;
            $("#" + fileID + "-file").val(fileName);
            
            var reader = new FileReader();
            reader.onload = function(e) {
                 document.getElementById(fileID + "-preview").src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
        
    });
</script>
