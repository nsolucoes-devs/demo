            <style>
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                }
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
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
                    color: #033557;
                }
                .nav.nav-tabs{
                    border-bottom: 0;
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
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <form id="ClienteForm" action="<?php echo base_url('configuracoes/editarperfil') ?>" method="post" enctype='multipart/form-data'>
                                
                            <div class="row white-tab" id="divDados" style="display: block;">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
                                    <br>
                                    <div class="row xdiv">
                                        <div class="col-md-12 form-group">
                                            <label>Nome</label><br>
                                            <input id="nome" name="usuario_nome" type="text" class="form-control x" placeholder="Nome" value="<?php echo $usuario_nome ?>">
                                        </div>
                                    </div>
                                    <div class="row xdiv">
                                        <div class="col-md-4 form-group">
                                            <label>CPF / CNPJ</label><br>
                                            <input id="cnpj" name="usuario_cpf" type="text" class="form-control" placeholder="000.000.000-00" value="<?php echo $usuario_cpf ?>" readonly>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Registro Geral (RG)</label><br>
                                            <input id="rg" name="usuario_rg" type="text" class="form-control x" placeholder="Registro Geral (RG)" value="<?php echo $usuario_rg ?>">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Data de Nascimento</label><br>
                                            <input id="nascimento" name="usuario_nascimento" type="date" class="form-control x" placeholder="Data de Nascimento" value="<?php echo $usuario_nascimento ?>">
                                        </div>
                                    </div>
                                    
                                    <hr class="xlin" style="height: 1px; background-color: #ccc; border: none;">
                                    
                                    <div class="row xdiv">
                                        <div class="col-md-3 form-group">
                                            <label>CEP</label><br>
                                            <input id="cep" name="usuario_cep" type="text" class="form-control x" placeholder="00000-000" value="<?php echo $usuario_cep;  ?>">
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <label>Logradouro</label><br>
                                            <input id="endereco" name="usuario_endereco" type="text" class="form-control x" placeholder="Logradouro" value="<?php echo $usuario_endereco ?>">
                                        </div>
                                        
                                    </div>
                    
                                    <div class="row xdiv">
                                        <div class="col-md-2 form-group">
                                            <label>Número</label><br>
                                            <input id="numero" name="usuario_numero" type="text" class="form-control x" placeholder="000" value="<?php echo $usuario_numero ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Complemento</label><br>
                                            <input id="complemento" name="usuario_complemento" type="text" class="form-control x" placeholder="Complemento" value="<?php echo $usuario_complemento ?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Bairro</label><br>
                                            <input id="bairro" name="usuario_bairro" type="text" class="form-control x" placeholder="Bairro" value="<?php echo $usuario_bairro ?>">
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Cidade</label><br>
                                            <input id="cidade" name="usuario_cidade" type="text" class="form-control x" placeholder="Cidade" value="<?php echo $usuario_cidade ?>">
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Estado</label><br>
                                            <input id="estado" name="usuario_estado" type="text" class="form-control x" placeholder="Estado" value="<?php echo $usuario_estado ?>">
                                        </div>
                                    </div>
                                    
                                    <hr class="xlin" style="height: 1px; background-color: #ccc; border: none;">
                                    
                                    <div class="row xdiv">
                                        <div class="col-md-12 form-group">
                                            <label>E-mail</label><br>
                                            <input id="email" name="usuario_email" type="text" class="form-control x" placeholder="email@mail.com" value="<?php echo $usuario_email ?>">
                                        </div>
                                    </div>
                                    <div class="row xdiv">
                                        <div class="col-md-6 form-group">
                                            <label>Telefone Fixo</label><br>
                                            <input id="tel" name="usuario_telefone" type="text" class="form-control x" placeholder="(00) 0000-0000" value="<?php echo $usuario_telefone ?>">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Celular</label><br>
                                <input id="cel" name="usuario_celular" type="text" class="form-control x" placeholder="(00) 00000-0000" value="<?php echo $usuario_celular ?>">
                                        </div>
                                    </div>
                                    
                                    <br><br>
                                    
                                </div>
                                <div class="row xdiv">
                                <div class="col-md-12 text-center">
                                    <button type="submit" id="btn-save" class="btn btn-primary">&nbsp&nbspAtualizar Dados&nbsp&nbsp</button>&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <button style="max-width: 150px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Atualizar Senha</button>
                                </div>
                            </div>
                            <br><br>
                            </div>
                            
                            <br><br>
                        </form>
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5><h3>Atualizar a sua senha</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="https://logistica.nsolucoes.digital/trocasenha" method="post">
                            <input type="password" id="senha" name="senha" maxlength="11">
                            <button type="submit" class="btn btn-primary">Salvar nova senha</button>    
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            
            
            <script>
                $(document).ready(function(){
        
                    var SPMaskBehavior = function (val) {
                        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                    },
                    spOptions = {
                        onKeyPress: function(val, e, field, options) {
                            field.mask(SPMaskBehavior.apply({}, arguments), options);
                        }
                    };
                    
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('#cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                    $('#cnpj').val().length > 11 ? $('#cnpj').mask('00.000.000/0000-00', cpfoptions) : $('#cnpj').mask('000.000.000-00#', cpfoptions);
                    $('#tel').mask(SPMaskBehavior, spOptions);
                    $('#cel').mask(SPMaskBehavior, spOptions);
                    $('#tel_r').mask(SPMaskBehavior, spOptions);
                    $('#cep').mask('00000-000', {reverse: true}, {'translation': {0: {pattern: /[0-9*]/}}});
                    
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('#titular_cpfcnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('#titular_cpfcnpj').val().length > 11 ? $('#titular_cpfcnpj').mask('00.000.000/0000-00', cpfoptions) : $('#titular_cpfcnpj').mask('000.000.000-00#', cpfoptions);
                    
                    <?php if($edita != null){ ?>
                        getImgEdit('<?php echo $edita['cliente_cpfcnpj']; ?>');
                    <?php } ?>
                });
            </script>
            
            <script>
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
                        if(e.target.result.includes('data:image/')){
                            document.getElementById(fileID + "-preview").src = e.target.result;
                        }else{
                            document.getElementById(fileID + "-preview").src = '<?php echo base_url('resources/imgs/pdf_cover.png') ?>';
                        }
                    };
                    reader.readAsDataURL(this.files[0]);
                });
            </script>
            
            <script>
                 function change(value){
                    if(value == 1){
                        document.getElementById('aDados').style.backgroundColor = "white";
                        document.getElementById('aDoc').style.backgroundColor = "#eee";
                        document.getElementById('aPag').style.backgroundColor = "#eee";
                        
                        document.getElementById('divDados').style.display = "block";
                        document.getElementById('divDocs').style.display = "none";
                        document.getElementById('divPag').style.display = "none";
                    }else if(value == 2){
                        document.getElementById('aDados').style.backgroundColor = "#eee";
                        document.getElementById('aDoc').style.backgroundColor = "white";
                        document.getElementById('aPag').style.backgroundColor = "#eee";
                        
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "block";
                        document.getElementById('divPag').style.display = "none";
                    }else if(value == 3){
                        document.getElementById('aDados').style.backgroundColor = "#eee";
                        document.getElementById('aDoc').style.backgroundColor = "#eee";
                        document.getElementById('aPag').style.backgroundColor = "white";
                        
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "none";
                        document.getElementById('divPag').style.display = "block";
                    }
                }
            </script>
            
            <script>
                $("#cnpj").keyup(function(){
                    if($('#cnpj').val().replace(/[^\d]+/g,'').length > 11){
                        $('#raz').css('display', 'block');
                        $('#razao').prop('required', true);
                        $('#ie').prop('required', true);
                    }else{
                        $('#raz').css('display', 'none');
                        $('#razao').prop('required', false);
                        $('#ie').prop('required', false);
                    }
                });
            </script>
            
            <script>
                $("#cep").keyup(function(){
                    
                    if($("#cep").val().length == 9){
            			var cep = this.value.replace(/[^0-9]/, "");
            			var url = "https://viacep.com.br/ws/"+cep+"/json/";
            
            			if(cep.length != 8){
            				return false;
            			}
            
            			$.getJSON(url, function(dadosRetorno){
            				try{
            					$("#endereco").val(dadosRetorno.logradouro);
            					$("#bairro").val(dadosRetorno.bairro);
            					$("#cidade").val(dadosRetorno.localidade);
            					$("#estado").val(dadosRetorno.uf);
            				}catch(ex){
            				    alert("Erro na captura dos dados a partir do CEP: " + ex);
            				}
            			});
                    }
                    
            	});
            </script>
            
            <script>
                function cnpjSearch(){
                    
                    var cnpj = $('#cnpj').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;
                    var dados = {'cnpj': cnpj};
                    
                    if(tam == 14 || tam == 11){
                        $('.x').prop('disabled', false);
            
                        $.ajax({
                            url : '<?php echo base_url('cliente/verificaCliente') ?>',
                            type : "POST",
                            dataType : "json",
                            data : dados,
                            success : function(res) {
                                if(res != null){
                                    $('#ClienteForm').attr('action', '<?php echo base_url('cliente/updateCliente') ?>');
                                    $('#cnpj').prop('disabled', true);
                                    $('.xdiv').css('display', 'block');
                                    $('.xlin').css('display', 'block');
                                    $('#divbtn').css('display', 'none');
                                    $('#space').css('display', 'none');
            
                                    $('#index').val(res.cliente_cpfcnpj);
                                    $('#nome').val(res.cliente_nome);
                                    $('#cep').val(res.cliente_cep);
                                    $('#numero').val(res.cliente_numero);
                                    $('#complemento').val(res.cliente_complemento);
                                    $('#endereco').val(res.cliente_endereco);
                                    $('#bairro').val(res.cliente_bairro);
                                    $('#cidade').val(res.cliente_cidade);
                                    $('#estado').val(res.cliente_estado);
                                    $('#tel').val(res.cliente_fixo);
                                    $('#cel').val(res.cliente_cel1);
                                    $('#ativo').val(res.cliente_ativo_id);
                                    $('#email').val(res.cliente_email);
                                    $('#ramo').val(res.cliente_ramo);
                                    $('#tel_r').val(res.cliente_tel_representante);
                                    $('#nome_r').val(res.cliente_representante);
                                    
                                    if(res.cliente_cpfcnpj == 14){
                                        $('#raz').css('display', 'block');
                                        $('#razao').val(res.cliente_razao);
                                        $('#razao').prop('required', true);
                                        $('#ie').val(res.cliente_ie);
                                        $('#ie').prop('required', true);
                                    }else{
                                        $('#raz').css('display', 'none');
                                        $('#razao').val('');
                                        $('#razao').prop('required', false);
                                        $('#ie').val('');
                                        $('#ie').prop('required', false);
                                    }
                                    
                                    var rg = "<?php echo base_url('uploads/')?>" + res.cliente_cpfcnpj + "_rg.png";
                                    var cpf = "<?php echo base_url('uploads/')?>" + res.cliente_cpfcnpj + "_cpf.png";
                                    var hab = "<?php echo base_url('uploads/')?>" + res.cliente_cpfcnpj + "_hab.png";
                                    
                                    $('#rg-preview').attr('src', rg);
                                    $('#cpf-preview').attr('src', cpf);
                                    $('#hab-preview').attr('src', hab);
                                    
                                    $('#rg-file').val(res.cliente_cpfcnpj + "_rg.png");
                                    $('#cpf-file').val(res.cliente_cpfcnpj + "_cpf.png");
                                    $('#hab-file').val(res.cliente_cpfcnpj + "_hab.png");
            
                                    $('#rg-doc').prop('disabled', true);
                                    $('#cpf-doc').prop('disabled', true);
                                    $('#hab-doc').prop('disabled', true);
                                }else{
                                    $('.xdiv').css('display', 'block');
                                    $('#raz').css('display', 'none');
                                    $('.xlin').css('display', 'block');
                                    
                                    var cnpj = $("#cnpj").val();
                                    var tam = cnpj.replace(/[^\d]+/g,'');
                                    
                            			$.ajax({
                            				//O campo URL diz o caminho de onde virá os dados, concatenando com o valor digitado no CNPJ
                            				url: '<?php echo base_url('cadastros/cnpj/') ?>'+cnpj.replace(/[^\d]+/g,''),
                            				dataType: 'json',
                            				
                            				success: function(resposta){
                            					//Confere se houve erro e o imprime
                            					if(resposta.status == "ERROR"){
                            					    if(tam.length > 11){
                            						    alert(resposta.message + "\nPor favor, digite os dados manualmente.");
                            					    }else if(tam.length = 11){
                            					        alert("CPF informado. \nPor favor, preencha os dados manualmente.");
                            					    }
                            						$("#post #nome").focus().select();
                            						return false;
                            					}
                            					//Agora basta definir os valores que você deseja preencher automaticamente nos campos.
                            					$('#nome').val(resposta.nome);
                            					$("#razao").val(resposta.fantasia);
                            					$("#ramo").val(resposta.atividade_principal[0].text + " (" + resposta.atividade_principal[0].code + ")");
                            					$("#tel").val(resposta.telefone);
                            					$("#email").val(resposta.email);
                            					$("#endereco").val(resposta.logradouro);
                            					$("#complemento").val(resposta.complemento);
                            					$("#bairro").val(resposta.bairro);
                            					$("#cidade").val(resposta.municipio);
                            					$("#estado").val(resposta.uf);
                            					$("#cep").val(resposta.cep);
                            					$("#numero").val(resposta.numero);
                            				}
                            			});

                                }
                            },
                            error : function(xhr, status, error) {
                                alert('Caiu neste erro 1');
                            }
                        });
                    }else{
                        $('.x').prop('disabled', true);
                        alert('Digite um CPF ou CNPJ válido!');
                    }
                }
                
                <?php if($edita != null){ ?>
                    var cnpj = $('#cnpj').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;
                    var dados = {'cnpj': cnpj};
                    
                    if(tam == 14 || tam == 11){
                        $('.x').prop('disabled', false);
            
                        $.ajax({
                            url : '<?php echo base_url('clientes/verificaCliente') ?>',
                            type : "POST",
                            dataType : "json",
                            data : dados,
                            success : function(res) {
                                if(res != null){
                                    $('#cnpj').prop('disabled', true);
                                    $('.xdiv').css('display', 'block');
                                    $('#raz').css('display', 'none');
                                    $('.xlin').css('display', 'block');
                                    $('#divbtn').css('display', 'none');
                                    $('#space').css('display', 'none');
                                }else{
                                    $('.xdiv').css('display', 'block');
                                    $('#raz').css('display', 'none');
                                    $('.xlin').css('display', 'block');
                                }
                            },
                            error : function(xhr, status, error) {
                                console.log('Caiu neste erro 2');
                            }
                        });
                    }else{
                        $('.x').prop('disabled', true);
                        alert('Digite um CPF ou CNPJ válido!');
                    }
                <?php } ?>
            </script>
            
            <script>
                jQuery.fn.outerHTML = function() {
                    return (this[0]) ? this[0].outerHTML : '';  
                };
            
                function getValidColumnId(){
                    //VAR
                    var docsDiv = $("#docs-div");
                    var validId = 0;
                
                    for(var k = 0; k < $(docsDiv).children('div').length; k++){
        		        validId++;
        		    }
        		    if(validId == 0)validId++;
        		    return validId;
                }
            		
        		$(".docs-addnew-btn").on('click', function(){
        		    //VAR
        		    var docsControl = $("#docs-control").val().split('|');
        		    var docsDiv = $("#docs-div");
        		    var activeColumn =  $(docsDiv).find(".active-col")[0];
        		    
        		    //CHANGING BUTTON FOR SELECT
        		    var pickTypeHTML = $("#preset-docs-picktype").find('*').html();
        		    activeColumn.innerHTML = pickTypeHTML;
        		    
        		    //FILLING SELECT
        		    var inflatedSelect = $(activeColumn).find('.preset-docs-picktype-select')[0];
        		    $(inflatedSelect).addClass('js-example-basic-multiple');
        		    $(inflatedSelect).removeClass('preset-docs-picktype-select');
        		    $(inflatedSelect).addClass('docs-picktype-select');
        		    
        		    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>];
        		    
        		    var selectHTML = inflatedSelect.innerHTML;
        		    
        		    documentos_tipos[0].forEach(function(currentValue, index){
        		        if(!docsControl.includes(currentValue.documentos_tipos_id)){
        		            selectHTML += "<option value='" + currentValue.documentos_tipos_id + "'>" + currentValue.documentos_tipos_nome.toUpperCase() + "</option>";
        		        }
        		    });
        		    
        		    inflatedSelect.innerHTML = selectHTML;
        		    
        		    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
        		});
            		
        		$(document).on("click", ".browse", function() {
                    var id = this.id;
                    id = id.replaceAll("-search", "");
                    var file = $(this).parents().find("#" + id + "-doc");
                    file.prop("disabled", false);
                    //file.trigger("click");
                });
                    
                function triggerAddNew(){
                    //VAR
        		    var docsControl = $("#docs-control").val().split('|');
        		    var docsDiv = $("#docs-div");
        		    var activeColumn =  $(docsDiv).find(".active-col")[0];
        		    
        		    //CHANGING BUTTON FOR SELECT
        		    var pickTypeHTML = $("#preset-docs-picktype").find('*').html();
        		    activeColumn.innerHTML = pickTypeHTML;
        		    
        		    //FILLING SELECT
        		    var inflatedSelect = $(activeColumn).find('.preset-docs-picktype-select')[0];
        		    $(inflatedSelect).addClass('js-example-basic-multiple');
        		    $(inflatedSelect).removeClass('preset-docs-picktype-select');
        		    $(inflatedSelect).addClass('docs-picktype-select');
        		    
        		    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>];
        		    
        		    var selectHTML = inflatedSelect.innerHTML;
        		    
        		    documentos_tipos[0].forEach(function(currentValue, index){
        		        if(!docsControl.includes(currentValue.documentos_tipos_id)){
        		            selectHTML += "<option value='" + currentValue.documentos_tipos_id + "'>" + currentValue.documentos_tipos_nome.toUpperCase() + "</option>";
        		        }
        		    });
        		    
        		    inflatedSelect.innerHTML = selectHTML;
        		    
        		    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                }
                
                function triggerChange(){
                    var select = $(document).find('.docs-picktype-select')[0];
                    $(select).select2('close');
                    var value = $(select).val();
                    var valueName = value;
                    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>];
                    
                    //VAR
                    var docsDiv = $("#docs-div");
            		var activeColumn =  $(docsDiv).find(".active-col")[0];
            		
            		$(docsDiv).find('.active-doc').removeClass('active-doc');
            		
            		$(activeColumn).addClass('active-doc');
            		
            		documentos_tipos[0].forEach(function(v, i){
            		    if(v.documentos_tipos_id == value){
            		        valueName = v.documentos_tipos_nome;
            		    }
            		});
            		
            		
            		//CHANGING BUTTON FOR SELECT
            		var pickTypeHTML = $("#preset-docs-docs").find('*').html();
            		activeColumn.innerHTML = pickTypeHTML;
            		
            		//GET ITEMS
            		var inflatedPreview = $(activeColumn).find('.preset-docs-docs-doc-preview')[0];
            		var inflatedTitle = $(activeColumn).find('.preset-docs-docs-doc-title')[0];
            		var inflatedDoc = $(activeColumn).find('.preset-docs-docs-doc-doc')[0];
            		var inflatedFile = $(activeColumn).find('.preset-docs-docs-doc-file')[0];
            		var inflatedSearch = $(activeColumn).find('.preset-docs-docs-doc-search')[0];
            		var inflatedLink = $(activeColumn).find('.doc-link')[0];
            		//var inflatedDismiss = $(activeColumn).find('.preset-docs-docs-doc-dismiss')[0];
            		
            		//ADD IDS TO WORK PROPERLY
            		$(inflatedPreview).attr("id", value + '-preview');
            		$(inflatedTitle).attr("id", value + '-title');
            		$(inflatedDoc).attr("id", value + '-doc');
            		$(inflatedDoc).attr("name", value + '-doc');
            		$(inflatedFile).attr("id", value + '-file');
            		$(inflatedSearch).attr("id", value + '-search');
            		$(inflatedLink).attr("id", value + '-link');
            		//$(inflatedDismiss).attr("id", valueName + '-dismiss');
            		
            		//REMOVE PRESET CLASS
            		$(inflatedPreview).removeClass('preset-docs-docs-doc-preview');
            		$(inflatedTitle).removeClass('preset-docs-docs-doc-title');
            		$(inflatedDoc).removeClass('preset-docs-docs-doc-doc').prop('disabled', false);
            		$(inflatedFile).removeClass('preset-docs-docs-doc-file');
            		$(inflatedSearch).removeClass('preset-docs-docs-doc-search');
            		$(inflatedLink).removeClass('doc-link');
            		//$(inflatedDismiss).removeClass('preset-docs-docs-doc-dismiss');
            		
            		//SET VALUES
            		$(inflatedTitle).html(valueName.toUpperCase());
            		/*
            		$(inflatedDismiss).on('click', function(){
            		    dismissDoc(valueName);
            		});
            		*/
            		
            		$("#docs-control").val($("#docs-control").val()  + "|" + value);
            		$("#docs-counter").html(parseInt($("#docs-counter").html())+1);
            		
            		var hasAllDocs = documentos_tipos[0].length == $("#docs-control").val().split('|').length;
            		if(!hasAllDocs){
            		    //INVALIDATING OLDER COL
            		    $(docsDiv).find('.active-col').removeClass('active-col');
            		    
            		    $(docsDiv).append($("#preset-docs-addnew").html());
            		    var newColumn = $(docsDiv).find('.active-col')[0];
            		    
            		    //VALIDATE NEW ACTIVE COLUMN
            		    $(newColumn).addClass('active-col');
            		    
            		    var newButton = $(newColumn).find('.preset-docs-addnew-btn')[0];
            		    $(newButton).addClass('docs-addnew-btn');
            		    $(newButton).removeClass('preset-docs-addnew-btn');
            		    
            		    $(newColumn).attr('id', "docs-column-" + getValidColumnId());
            		    
            		}
                }
                
                function triggerDismiss(){
                    var docsDiv = $("#docs-div");
            		var activeColumn = $(docsDiv).find(".active-col")[0];
            		var activeDoc = $(docsDiv).find(".active-doc")[0];
            		
            		if($(activeDoc).hasClass('fixed-doc'))return;
            		
            		//REMOVE ACTIVE
            		var passedId = $(activeDoc).attr('id');
            		
            		$(activeDoc).remove();
            		
            		//PASS THE ID FROM THE REMOVED DOC TO NEW LAST COLUMN
            		$(activeColumn).attr('id', passedId);
            		
            		//FIND NEW ACTIVE DOC
            		var newActiveDocId = "docs-column-" + (parseInt(passedId.replaceAll("docs-column-",""))-1).toString();
            		$("#" + newActiveDocId).addClass('active-doc');
            		
            		$("#docs-counter").html(parseInt($("#docs-counter").html())-1);
            		$("#docs-control").val($("#docs-control").val().substring(0, $("#docs-control").val().lastIndexOf('|')));
            		
            		//TODO
            		/*
            		*   QUANDO ELE TERMINAR DE ADICIONAR TODOS OS DOCUMENTOS POSSÍVEIS, REMOVER FARÁ COM QUE O BOTÃO "+" NÃO APAREÇA MAIS
            		*   IMPLEMENTAR PARA QUE ELE GERE UM NOVO BOTÃO "+" ASSIM QUE REMOVER O ÚLTIMO
            		*/
                }
                
                /*
                    $('input[type="file"]').on('input',function(e) {
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
                */
                
                function triggerInputFile(id, e){
                    var fileID = id;
                    fileID = fileID.replaceAll("-doc", "");
                    var fileName = e.target.files[0].name;
                    $("#" + fileID + "-file").val(fileName);
                        
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(fileID + "-preview").src = e.target.result;
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
            </script>
            
            <script>
                function getImgEdit(val){
                    var dadosdoc = {'cnpj': val};
                    
                    $.ajax({
                        url : '<?php echo base_url('cadastros/getDocumentosByCnpj') ?>',
                        type : 'POST',
                        dataType : 'json',
                        data : dadosdoc,
                        success : function(response) {
                            treatAutofillDocs(response);
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
                
                function treatAutofillDocs(data){
                    var documentos_tipos = [<?php echo json_encode($documentos_tipos) ?>][0];
                    for(var i = 0; i < data.length; i++){
                        var idDocAtual = data[i].documento_tipo_id; //DOCUMENTOS_TIPOS_ID
                        var docAtual = $(document).find("#" + idDocAtual + "-doc");
                        if(docAtual.length == 0){
                            //TODO //CRIAR NOVO DOC //////////////////////////////////////////////////// VERIFICAR SE DISPARA OU NÃO
                            var activeCol = $("#docs-div").find(".active-col")[0];
                            var ac_btn = $(activeCol).find(".docs-addnew-btn")[0];
                            $(ac_btn).trigger('click');
                            
                            var ac_sel = $(activeCol).find(".docs-picktype-select")[0];
                            $(ac_sel).val(idDocAtual).change();
                            
        		            $("#docs-counter").html(parseInt($("#docs-counter").html())+1);
        		            
        		            var ac_input = $(document).find("#" + idDocAtual + "-doc");
        		            $(ac_input).prop('required', false);
                        }
                        if(data[i].documento_isimagem == 1){
                            $("#" + idDocAtual + "-preview").attr('src', '<?php echo base_url('uploads/') ?>' + data[i].documento_titular_cpfcnpj + "_" + idDocAtual + ".png");
                        }else{
                            $("#" + idDocAtual + "-preview").attr('src', '<?php echo base_url('resources/imgs/pdf_cover.png') ?>');
                            var ac_link = $(document).find("#"+idDocAtual+"-link");
                            ac_link.prop('href', '<?php echo base_url('uploads/') ?>'+data[i].documento_titular_cpfcnpj+"_"+idDocAtual+".pdf");
                        }
                        for(var k in documentos_tipos){
                            if(documentos_tipos[k].documentos_tipos_id == idDocAtual){
                                $("#" + idDocAtual + "-title" ).html(documentos_tipos[k].documentos_tipos_nome);
                                $("#" + idDocAtual + "-file" ).html(documentos_tipos[k].documentos_tipos_nome + "");
                            } 
                        }
                    
                    }
                }
            </script>
            