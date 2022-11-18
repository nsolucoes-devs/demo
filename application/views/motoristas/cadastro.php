
        
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
                .inline{
                    display: inline;
                }    
                label{
                    font-size: 15px;
                }
                .disabled-field{}
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
                <form method="post" enctype='multipart/form-data' action="<?php if($motorista != null){echo base_url('motoristas/editMotorista/'.$motorista['motorista_id']);}else{echo base_url('motoristas/insertMotorista');}?>">
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9; border-bottom: 0">
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)"><b>DADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDoc" onclick="change(2)"><b>DOCUMENTOS</b></a>
                            </li>
                        </ul>
                        
                        <div id="divDados" class="white-tab"> <!-- div docs -->
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br>
                                
                                <input type="hidden" id="id" name="id" value=""/>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="cpf">CPF</label><br>
                                        <input id="cpf" name="cpf" type="text" class="form-control disabled-field" <?php if($motorista != null){echo "value='".$motorista['motorista_cpf']."' disabled";}?> onkeypress="$(this).mask('000.000.000-00');" placeholder="123.456.789-00" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="rg">RG</label><br>
                                        <input id="rg" name="rg" type="text" class="form-control disabled-field" <?php if($motorista != null){echo "value='".$motorista['motorista_rg']."'";}else{echo "disabled";}?> placeholder="XX-00.000.000" required>
                                    </div>
                                    <?php if($motorista != null){ ?>
                                    <div class="col-md-3 form-group">
                                        <label for="ativo">Ativo</label><br>
                                        <select class="js-example-basic-multiple disabled-field"  style="width: 100%!important" name="ativo" id="ativo" required <?php if(!$motorista != null){echo "disabled";}?>>
                                            <option id="ativo-placeholder" selected disabled value="">-- Selecionar --</option>
                                            <?php foreach($ativos as $ativo){ ?>
                                                <option value="<?php echo $ativo['ativo_id'] ?>"><?php echo $ativo['ativo_tipo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <?php } else { ?>
                                    <div class="col-md-3 form-group" style="display:none;">
                                        <label for="ativo">Ativo</label>
                                        <select class="js-example-basic-multiple disabled-field"  style="width: 100%!important" name="ativo" id="ativo" required>
                                            <option id="ativo-placeholder" selected value="1">Ativo</option>
                                        </select> <br>
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-3 form-group">
                                        <label for="nascimento">Data de Nascimento</label><br>
                                        <input id="nascimento" name="nascimento" type="date" class="form-control disabled-field" <?php if($motorista != null){echo "value='".$motorista['motorista_nascimento']."'";}else{echo "disabled";}?> placeholder="Ex.: João da Silva" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label for="nome">Nome</label><br>
                                        <input id="nome" name="nome" type="text" class="form-control disabled-field" <?php if($motorista != null){echo "value='".$motorista['motorista_nome']."'";}else{echo "disabled";}?> placeholder="Ex.: João da Silva" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="telefone">Telefone</label><br>
                                        <input id="telefone" name="telefone" type="text" class="tel form-control disabled-field" <?php if($motorista != null){echo "value='".$motorista['motorista_tel']."'";}else{echo "disabled";}?> placeholder="Ex.: (00)0000-0000">
                                    </div>
                                </div>
                                
                                <br>
                                <hr style="height: 1px; background-color: #ccc; border: none;">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Empresa</label><br>
                                        <select class="js-example-basic-multiple disabled-field"  style="width: 100%!important" name="cliente" id="cliente">
                                            <option value="0" <?php if($motorista == null)echo "selected"; ?>>-- Nenhum --</option>
                                            <?php foreach($clientes as $cli){
                                                $sel = "";
                                                if($motorista != null){
                                                    if($cli['cliente_cpfcnpj'] == $motorista['motorista_cliente_cpfcnpj']){
                                                        $sel = " selected ";
                                                    }
                                                }
                                                if(strlen($cli['cliente_cpfcnpj']) == 11){
                                                    $cpfcnpj = substr($cli['cliente_cpfcnpj'], 0, 3).".".substr($cli['cliente_cpfcnpj'], 3, 3).".".substr($cli['cliente_cpfcnpj'], 6, 3)."-".substr($cli['cliente_cpfcnpj'], 9);
                                                }else{
                                                    $cpfcnpj = substr($cli['cliente_cpfcnpj'], 0, 2).".".substr($cli['cliente_cpfcnpj'], 2, 3).".".substr($cli['cliente_cpfcnpj'], 5, 3)."/".substr($cli['cliente_cpfcnpj'], 8, 4)."-".substr($cli['cliente_cpfcnpj'], 12);
                                                }
                                                echo "<option value='".$cli['cliente_cpfcnpj']."'".$sel.">".$cpfcnpj;
                                                if($cli['cliente_nome'] != ""){
                                                    echo " | ".$cli['cliente_nome'];
                                                }elseif($cli['cliente_fantasia'] != ""){
                                                    echo " | ".$cli['cliente_fantasia'];
                                                }
                                                echo " | ".$cli['cliente_cidade']."/".$cli['cliente_estado']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <br>
                                <hr style="height: 1px; background-color: #ccc; border: none;">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="cep">CEP</label><br>
                                        <input id="cep" name="cep" type="text" class="form-control disabled-field" <?php if($motorista != null){echo "value='".$motorista['motorista_cep']."'";}else{echo "disabled";}?> onkeypress="$(this).mask('00000-000');" placeholder="12345-678" required>
                                    </div>
                                    <div class="col-md-7 form-group">
                                        <label for="endereco">Logradouro</label><br>
                                        <input id="endereco" name="endereco" type="text" class="form-control" <?php if($motorista != null){echo "value='".$motorista['motorista_endereco']."'";}else{echo "disabled";}?> placeholder="Ex.: Rua Delfim Moreira" required>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label for="numero">Número</label><br>
                                        <input id="numero" name="numero" type="number" class="form-control" <?php if($motorista != null){echo "value='".$motorista['motorista_numero']."'";}else{echo "disabled";}?> placeholder="Ex.: 999" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="bairro">Bairro</label><br>
                                        <input id="bairro" name="bairro" type="text" class="form-control" <?php if($motorista != null){echo "value='".$motorista['motorista_bairro']."'";}else{echo "disabled";}?> placeholder="Ex.: Centro" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="cidade">Cidade</label><br>
                                        <input id="cidade" name="cidade" type="text" class="form-control" <?php if($motorista != null){echo "value='".$motorista['motorista_cidade']."'";}else{echo "disabled";}?> placeholder="Ex.: Uberaba" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="estado">Estado</label><br>
                                        <input id="estado" name="estado" type="text" class="form-control" <?php if($motorista != null){echo "value='".$motorista['motorista_estado']."'";}else{echo "disabled";}?> placeholder="Ex.: Minas Gerais" required>
                                    </div>
                                </div>
                            
                                <br><br>
                            </div>
                            
                            <br><br>
                        </div>
                        
                        <div id="divDocs" class="white-tab" style="display:none"> <!-- div docs -->
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br>
                                
                                <div class="row" style="padding:5px; width:100%"></div>
                                <!-- IMAGENS -->
                                <!-- DOCS PRESET - START -->
                                <hr style="display: none;">
                                
                                <div class="row" id="preset-docs-addnew" style="display: none;">
                                    <div class="col-md-6 text-center active-col">
                                        <br><br>
                                        <a type="button" style="align:center;" onclick="triggerAddNew()" class="preset-docs-addnew-btn"><i class="fas fa-plus-circle btn btn-primary" style="font-size:50px"></i></a>
                                        <br><br><br>
                                    </div>
                                </div>
                                
                                <div class="row" id="preset-docs-picktype" style="display: none;">
                                    <div class="col-md-6 text-center" >
                                        <br><br>
                                        <label style="width:100%">Tipo de Documento</label>
                                        <select class="preset-docs-picktype-select"  style="width: 100%!important; float:center;" onchange="triggerChange()" required>
                                            <option id="docs-picktype-placeholder" selected disabled>-- Selecionar --</option>
                                        </select>
                                        <br><br>
                                    </div>
                                </div>
                                
                                <div class="row" id="preset-docs-docs" style="display: none;">
                                    <div class="col-md-6 form-group" style="margin-bottom:40px">
                                        <div class="col-md-12">
                                            
                                            <div class="col-md-6">
                                                <a target="_blank" class="doc-link">
                                                    <img src="<?php  echo base_url('resources/imgs/imgplaceholder.png'); ?>" class="img-thumbnail preset-docs-docs-doc-preview" style="max-width:200px; height:auto;"/>
                                                </a>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group my-3">
                                                    
                                                    <div class="row" style="margin: 0">
                                                        <h4 class="preset-docs-docs-doc-title" style="float:left;">DOC</h4>
                                                        <!--<button type="button" class="btn btn-danger preset-docs-docs-doc-dismiss" style="float: right;">X</button>-->
                                                    </div>
                                                    
                                                    <div class="row" style="margin: 0">
                                                        <input type="text" class="form-control preset-docs-docs-doc-file" placeholder="Selecione uma imagem"
                                                        disabled style="width: 100%"/>
                                                    
                                                        <div class="input-group-append" style="width: 100%">
                                                            <input type="file" class="file preset-docs-docs-doc-doc" accept=".pdf, .doc, .rtf, .xls, .ppt, .odt, .ods, .txt, .jpg, .jpeg, .png, .gif" style="display:none;" 
                                                             onchange="triggerInputFile(this.id, event)" disabled />
                                                            <button type="button" class="browse btn btn-primary preset-docs-docs-doc-search" style="width:100%">Buscar...</button>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <hr style="display: none;">
                                <!-- DOCS PRESET - END -->
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <!--<h4 style="display:inline; float:left;">Documentação (<p style="display:inline;" id="docs-counter">1</p>)</h4>-->
                                        <h4 style="display:inline; float:left;">Documentação <p style="display:none;" id="docs-counter">1</p></h4>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="#" class="btn btn-danger" style="float: left; margin-left:20px" onclick="triggerDismiss()" style="display:inline;">X</a>
                                    </div>
                                </div>
                                
                                <br><br>
                                
                                <input type="hidden" id="docs-control" name="docs-control" value="3" />
                                <div class="row" id="docs-div">
                                    <div id="docs-column-1" class="col-md-6 form-group text-center active-doc fixed-doc">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <?php if($motorista != null){ if($fixed != null && $fixed['documento_isimagem'] == 0){ echo "<a target='_blank' title='Clique para visualizar!' href='".base_url('uploads/m_').$motorista['motorista_cpf']."_3.pdf'>"; } } ?>
                                                <img src="<?php if($motorista!= null){
                                                    if($fixed != null && $fixed['documento_isimagem'] == 1){
                                                        echo base_url('uploads/m_' . $motorista['motorista_cpf'] . '_3.png');
                                                    }else if($fixed != null && $fixed['documento_isimagem'] == 0){
                                                        echo base_url('resources/imgs/pdf_cover.png');
                                                    }else{
                                                        echo base_url('resources/imgs/imgplaceholder.png');
                                                    }
                                                }else{ echo base_url('resources/imgs/imgplaceholder.png'); } ?>" id="3-preview" class="img-thumbnail" style="max-width:200px; height:auto;"/>
                                                <?php if($motorista != null){ if($fixed['documento_isimagem'] == 0){ echo "</a>"; } } ?>    
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="input-group my-3">
                                                    <div class="row" style="margin: 0">
                                                        <h4 style="float:left;">CNH</h4>
                                                    </div>
                                                    <div class="row" style="margin: 0">
                                                        <input type="text" class="form-control" placeholder="Selecione uma imagem" id="3-file" disabled style="width: 100%"/>
                                                        <div class="input-group-append" style="width: 100%">
                                                            <input id="3-doc" type="file" name="3-doc" class="file" accept=".pdf, .doc, .rtf, .xls, .ppt, .odt, .ods, .txt, .jpg, .jpeg, .png, .gif" style="display:none;" 
                                                            <?php if($motorista != null){ echo "disabled" ; }  ?> onchange="triggerInputFile(this.id, event)" />
                                                            <button id="3-search" type="button" class="browse btn btn-primary" style="width:100%">Buscar...</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div id="docs-column-2" class="col-md-6 form-group text-center active-col" style="margin-bottom:40px">
                                        <br><br><br>
                                        <a class="docs-addnew-btn" type="button" onclick="triggerAddNew()" style="align:center;"><i class="fas fa-plus-circle btn btn-primary" style="font-size:50px"></i></a>
                                        <br><br><br><br>
                                    </div>
                                </div>
                                <!-- IMAGENS - END -->
                                <div class="row" style="padding:5px; width:100%"></div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <br><br>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url('motoristas') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                &nbsp&nbsp&nbsp&nbsp
                                <button type="submit" id="btn-save" class="btn btn-primary <?php if($motorista == null){echo 'disabled-field" disabled';}?> style="color: white">&nbsp&nbspSalvar&nbsp&nbsp</button>
                                &nbsp&nbsp&nbsp&nbsp
                                <button type="button" id="btn-clear" class="btn btn-primary <?php if($motorista == null){echo 'disabled-field" disabled';}?> style="color: white">&nbsp&nbspLimpar&nbsp&nbsp</button>
                            </div>
                        </div>
                        <br><br>
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
                
                    $('.tel').mask(SPMaskBehavior, spOptions);
                    
                    function autoFillByID(id){
                        var dados = {
                            'motorista_id': id
                        };
                    
                        $.ajax({
                            url : '<?php echo base_url('motoristas/getMotoristaById') ?>',
                            type : 'POST',
                            dataType : 'json',
                            data : dados,
                            success : function(res) {
                                treatAutofillData(res);
                                
                                var dadosdoc = {
                                    'motorista_cpf': 'm_'+res.motorista_cpf
                                };
                                
                                $.ajax({
                                    url : '<?php echo base_url('motoristas/getDocumentosMotoristaByCpf') ?>',
                                    type : 'POST',
                                    dataType : 'json',
                                    data : dadosdoc,
                                    success : function(response) {
                                        treatAutofillDocs(response);
                                    },
                                    error : function(xhr, status, error) {
                                        alert('AutoFillDocs: ' + xhr.responseText);
                                    }
                                });
                                
                            },
                            error : function(xhr, status, error) {
                                alert('AutoFillData: ' + xhr.responseText);
                            }
                        });
                    
                        $('.disabled-field').removeAttr('disabled');
                    }
                    
                    <?php 
                        if($motorista != null){
                            echo "autoFillByID(". $motorista['motorista_id'] ."); ";
                        }
                    ?>
                    
                    function getNumbersFromCPF(cpf){
                        return cpf.replaceAll(".", "").replaceAll("-", "");
                    }
                    
                    $("#cpf").keyup(function() {
                        if($("#cpf").val().length == 14){
                            var dados = {
                                'cpf': getNumbersFromCPF($("#cpf").val())
                            };
                            $.ajax({
                                url : '<?php echo base_url('motoristas/getByCPF') ?>',
                                type : "POST",
                                dataType : "json",
                                data : dados,
                                success : function(res) {
                                    treatAutofillData(res);
                                    
                                    var dadosdoc = {
                                        'motorista_cpf': 'm_'+res.motorista_cpf
                                    };
                                    
                                    $.ajax({
                                        url : '<?php echo base_url('motoristas/getDocumentosMotoristaByCpf') ?>',
                                        type : 'POST',
                                        dataType : 'json',
                                        data : dadosdoc,
                                        success : function(response) {
                                            treatAutofillDocs(response);
                                        },
                                        error : function(xhr, status, error) {
                                            alert('AutoFillDocs: ' + xhr.responseText);
                                        }
                                    });
                                },
                                error : function(xhr, status, error) {
                                    alert(xhr.responseText);
                                }
                            });
                            $(".disabled-field").removeAttr('disabled');
                        }
                    });  
                    
                    function treatAutofillData(data){
                        
                        if($("#cpf").val().length == 0)$("#cpf").val(data.motorista_cpf);
                        $("#id").val(data.motorista_id);
                        $("#nome").val(data.motorista_nome);
                        
                        //anchor
                        
                        $("#rg").val(data.motorista_rg);
                        $("#nascimento").val(data.motorista_nascimento);
                        $("#cep").val(data.motorista_cep);
                        $("#endereco").val(data.motorista_endereco);
                        $("#numero").val(data.motorista_numero);
                        $("#bairro").val(data.motorista_bairro);
                        $("#cidade").val(data.motorista_cidade);
                        $("#estado").val(data.motorista_estado);
                        
                        $("#telefone").unmask().val(data.motorista_tel);
                        $("#telgerente").unmask().val(data.motorista_telgerente);
                        $("#telempresa").unmask().val(data.motorista_telempresa);
                        
                        spOptions = {
                            onKeyPress: function(val, e, field, options) {
                                field.mask(SPMaskBehavior.apply({}, arguments), options);
                            }
                        };
                    
                        $('.tel').mask(SPMaskBehavior, spOptions);
                        
                        $("#ativo").val(data.motorista_ativo_id).change();
                        
                        $("#endereco").prop("disabled", false);
            			$("#numero").prop("disabled", false);
            			$("#bairro").prop("disabled", false);
            			$("#cidade").prop("disabled", false);
            		    $("#estado").prop("disabled", false);
                    }
                    
                    
                    //DOCS
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
                                
                                $("#docs-control").val($("#docs-control").val()  + "|" +idDocAtual);
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
                    
                    $("#btn-clear").click(function(){
                        window.location.href = '<?php echo base_url('cadastromotorista') ?>';
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
            						
            						$("#endereco").prop("disabled", false);
            						$("#numero").prop("disabled", false);
            						$("#cidade").prop("disabled", false);
            						$("#estado").prop("disabled", false);
            						$("#bairro").prop("disabled", false);
            					}catch(ex){
            					    alert("Erro na captura dos dados a partir do CEP: " + ex);
            					}
            				});
                        }
            		});
                    
                });     
            
            
                //DOCS
                //// DOCUMENTOS - START
            		
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
                        file.trigger("click");
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
                        if(e.target.result.includes('data:image/')){
                            document.getElementById(fileID + "-preview").src = e.target.result;
                        }else{
                            document.getElementById(fileID + "-preview").src = '<?php echo base_url('resources/imgs/pdf_cover.png') ?>';
                        }
                    };
                    reader.readAsDataURL(e.target.files[0]);
                }
                
                //// DOCUMENTOS - END
                
                function change(value){
                    if(value == 1){
                        document.getElementById('aDados').style.backgroundColor = "white";
                        document.getElementById('aDoc').style.backgroundColor = "#eaeaea";
                        
                        document.getElementById('divDados').style.display = "block";
                        document.getElementById('divDocs').style.display = "none";
                    }else{
                        document.getElementById('aDados').style.backgroundColor = "#eaeaea";
                        document.getElementById('aDoc').style.backgroundColor = "white";
                        
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "block";
                    }
                }
            </script>