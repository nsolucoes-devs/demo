        
            <style>
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
                .xdiv{
                    display: none;
                }
                .xlin{
                    display: none;
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
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"><b><?php if($edita != null){ echo "EDIÇÃO DE CLIENTES"; }else{ echo "CADASTRO DE CLIENTES"; } ?></b></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Cadastros</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php if($edita != null){ echo "Edição de Cliente"; }else{ echo "Cadastro de Cliente"; } ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <form id="clienteForm" action="<?php if($edita != null){ echo base_url('cliente/updateCliente'); }else{ echo base_url('cliente/insertCliente'); } ?>" method="post" enctype='multipart/form-data'>
                            
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9">
                                <li class="nav-item">
                                    <a class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)">Dados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDoc" onclick="change(2)">Documentos</a>
                                </li>
                            </ul>
                            
                            <div class="row white-tab" id="divDados" style="display: block;">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <a class="btn btn-primary" href="<?php echo base_url('cliente/listagem') ?>"><i class="fas fa-backward"></i>&nbsp;Voltar</a>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>CPF / CNPJ (Somente Números)</label><br>
                                            <input id="cpfcnpj" name="cpfcnpj" type="text" class="form-control" placeholder="000.000.000-00" required <?php if($edita != null){echo "value='".$edita['cliente_cpfcnpj']."' disabled";} ?>>
                                                <input type="hidden" name="index" id="index" <?php if($edita != null){echo "value='".$edita['cliente_cpfcnpj']."'";} ?>>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <a id="divbtn" onclick="cpfcnpjSearch()" class="btn btn-primary" style="margin-top: 22px;"><i class="fa fa-search"></i></a>
                                            <label id="space">&nbsp;&nbsp;&nbsp;</label>
                                            <a href="<?php echo base_url('cliente/cadastro') ?>" class="btn btn-danger" style="margin-top: 22px"><i class="fas fa-sync-alt"></i></a>
                                        </div>
                                        <div class="col-md-6 form-group text-right">
                                            <label style="color: #c90000; margin-top: 20px">Campos marcados com ** NÃO são obrigatórios!</label>
                                        </div>
                                    </div>
                    
                                    <div id="cpfrow" class="row xdiv">
                                        <div class="col-md-6 form-group">
                                            <label>Nome Completo</label><br>
                                            <input id="nome" name="nome" type="text" class="form-control x" placeholder="Nome Completo" required disabled <?php if($edita != null){$t = strlen($edita['cliente_cpfcnpj']); if($t == 11){echo "value='" . $edita['cliente_nome'] . "'";} } ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Nascimento</label><br>
                                            <input id="nascimento" name="nascimento" type="date" class="form-control x" required disabled <?php if($edita != null){$t = strlen($edita['cliente_cpfcnpj']); if($t == 11){echo "value='" . $edita['cliente_nascimento'] . "'";} } ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>RG</label><br>
                                            <input id="rg" name="rg" type="text" class="form-control x" placeholder="RG" required disabled <?php if($edita != null){$t = strlen($edita['cliente_cpfcnpj']); if($t == 11){echo "value='" . $edita['cliente_rg'] . "'";} } ?>>
                                        </div>
                                    </div>
                                    
                                    <div id="cnpjrow" class="row" style="display: none">
                                        <div class="col-md-6 form-group">
                                            <label>Razão Social</label><br>
                                            <input id="razao" name="razao" type="text" class="form-control x" placeholder="Razão Social" disabled <?php if($edita != null){$t = strlen($edita['cliente_cpfcnpj']); if($t == 14){echo "value='" . $edita['cliente_razao'] . "'";} } ?>>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Nome Fantasia</label><br>
                                            <input id="fantasia" name="fantasia" type="text" class="form-control x" placeholder="Nome Fantasia" disabled <?php if($edita != null){$t = strlen($edita['cliente_cpfcnpj']); if($t == 14){echo "value='" . $edita['cliente_fantasia'] . "'";} } ?>>
                                        </div>
                                    </div>
                                    
                                    <hr class="xlin" style="height: 1px; background-color: #ccc; border: none;">
                                    
                                    <div class="row xdiv">
                                        <div class="col-md-3 form-group">
                                            <label>CEP</label><br>
                                            <input id="cep" name="cep" type="text" class="form-control x" placeholder="00000-000" required disabled <?php if($edita != null){echo "value='".$edita['cliente_cep']."'";} ?>>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label>Logradouro</label><br>
                                            <input id="endereco" name="endereco" type="text" class="form-control x" placeholder="Logradouro" required disabled <?php if($edita != null){echo "value='".$edita['cliente_endereco']."'";} ?>>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Número</label><br>
                                            <input id="numero" name="numero" type="text" class="form-control x" placeholder="000" required disabled <?php if($edita != null){echo "value='".$edita['cliente_numero']."'";} ?>>
                                        </div>
                                    </div>
                    
                                    <div class="row xdiv">
                                        <div class="col-md-3 form-group">
                                            <label>Bairro</label><br>
                                            <input id="bairro" name="bairro" type="text" class="form-control x" placeholder="Bairro" required disabled <?php if($edita != null){echo "value='".$edita['cliente_bairro']."'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Complemento</label><label style="color: #c90000">&nbsp;&nbsp;**</label><br>
                                            <input id="complemento" name="complemento" type="text" class="form-control x" placeholder="Complemento" disabled <?php if($edita != null){echo "value='".$edita['cliente_complemento']."'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Cidade</label><br>
                                            <input id="cidade" name="cidade" type="text" class="form-control x" placeholder="Cidade" required disabled <?php if($edita != null){echo "value='".$edita['cliente_cidade']."'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Estado</label><br>
                                            <input id="estado" name="estado" type="text" class="form-control x" placeholder="Estado" required disabled <?php if($edita != null){echo "value='".$edita['cliente_estado']."'";} ?>>
                                        </div>
                                    </div>
                                    
                                    <hr class="xlin" style="height: 1px; background-color: #ccc; border: none;">
                                    
                                    <div class="row xdiv">
                                        <div class="col-md-12 form-group">
                                            <label>E-mail</label><br>
                                            <input id="email" name="email" type="text" class="form-control x" placeholder="email@mail.com" required disabled <?php if($edita != null){echo "value='".$edita['cliente_email']."'";} ?>>
                                        </div>
                                    </div>
                                    <div class="row xdiv">
                                        <div class="col-md-4 form-group">
                                            <label>Telefone Fixo</label><label style="color: #c90000">&nbsp;&nbsp;**</label><br>
                                            <input id="telefone" name="telefone" type="text" class="form-control x" placeholder="(00) 0000-0000" disabled <?php if($edita != null){echo "value='".$edita['cliente_fixo']."'";} ?>>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Celular 1</label><label style="color: #c90000">&nbsp;&nbsp;**</label><br>
                                            <input id="celular1" name="celular1" type="text" class="form-control x" placeholder="(00) 00000-0000" disabled <?php if($edita != null){echo "value='".$edita['cliente_cel1']."'";} ?>>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Celular 2</label><label style="color: #c90000">&nbsp;&nbsp;**</label><br>
                                            <input id="celular2" name="celular2" type="text" class="form-control x" placeholder="(00) 00000-0000" disabled <?php if($edita != null){echo "value='".$edita['cliente_cel2']."'";} ?>>
                                        </div>
                                    </div>
                                    <div class="row xdiv">
                                        <div class="col-md-8 form-group">
                                            <label>Inscrição Estadual</label><label style="color: #c90000">&nbsp;&nbsp;**</label><br>
                                            <input id="ie" name="ie" type="text" class="form-control x" placeholder="Inscrição Estadual" disabled>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Ativo</label><br>
                                            <select class="js-example-basic-multiple x"  style="width: 100%!important" name="ativo" id="ativo" required disabled>
                                                <?php foreach($ativos as $ativo){
                                                    if($edita != null){
                                                        if($ativo['ativo_id'] == $edita['cliente_ativo_id']){$sel = " selected ";}else{$sel = "";}
                                                        if($this->session->userdata('y_a') == 1){
                                                            echo '<option value="'.$ativo['ativo_id'].'" '.$sel.'>'.$ativo['ativo_tipo'].'</option>';
                                                        }else if($edita['cliente_ativo_id'] == 2){
                                                            if($ativo['ativo_id'] == 2){
                                                                echo '<option value="'.$ativo['ativo_id'].'" '.$sel.'>'.$ativo['ativo_tipo'].'</option>';
                                                            }
                                                        }else{
                                                            if($ativo['ativo_id'] != 2){
                                                                echo '<option value="'.$ativo['ativo_id'].'" '.$sel.'>'.$ativo['ativo_tipo'].'</option>';
                                                            }
                                                        }
                                                    }else if($ativo['ativo_id'] != 2){
                                                        echo '<option value="'.$ativo['ativo_id'].'" '.$sel.'>'.$ativo['ativo_tipo'].'</option>';
                                                    }
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <br><br>
                                    
                                </div>
                            </div>
                            
                            <div class="row white-tab" id="divDocs" style="display: none;">
                                
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
                                    
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
                                        <div class="col-md-6 form-group">
                                            <div class="col-md-12" style="padding-bottom: 40px">
                                                
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
                                                            <input type="text" class="form-control preset-docs-docs-doc-file" placeholder="Selecione um arquivo"
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
                                            <h4 style="display:inline; float:left;">Documentação <p style="display:none;" id="docs-counter">1</p><label style="color: #c90000">&nbsp;&nbsp;**</label></h4>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-danger" style="float: left; margin-left:20px" onclick="triggerDismiss()" style="display:inline;">X</a>
                                        </div>
                                    </div>
                                    
                                    <br><br>
                                    
                                    <input type="hidden" id="docs-control" name="docs-control" value="1" />
                                    <div class="row" id="docs-div">
                                        <div id="docs-column-1" class="col-md-6 text-center active-doc fixed-doc">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <?php if($edita != null){ if($fixed != null && $fixed['documento_isimagem'] == 0){ echo "<a target='_blank' title='Clique para visualizar!' href='".base_url('uploads/c_').$edita['cliente_cpfcnpj']."_1.pdf'>"; } } ?>
                                                    <img src="<?php  if($edita != null){
                                                        if($fixed != null && $fixed['documento_isimagem'] == 1){
                                                            echo base_url('uploads/c_' . $edita['cliente_cpfcnpj'] . '_1.png');
                                                        }else if($fixed != null && $fixed['documento_isimagem'] == 0){
                                                            echo base_url('resources/imgs/pdf_cover.png');
                                                        }else{
                                                            echo base_url('resources/imgs/imgplaceholder.png');
                                                        }
                                                    }else{ echo base_url('resources/imgs/imgplaceholder.png'); } ?>" id="1-preview" class="img-thumbnail" style="max-width:200px; height:auto;"/>
                                                    <?php  if($edita != null){ if($fixed['documento_isimagem'] == 0){ echo "</a>"; } } ?>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="input-group my-3">
                                                        <div class="row" style="margin: 0">
                                                            <h4 style="float:left;">CPF / CNPJ</h4>
                                                        </div>
                                                        <div class="row" style="margin: 0">
                                                            <input type="text" class="form-control" placeholder="Selecione um arquivo" id="1-file" disabled style="width: 100%"/>
                                                            <div class="input-group-append" style="width: 100%">
                                                                <input id="1-doc" type="file" name="1-doc" class="file" accept=".pdf, .doc, .rtf, .xls, .ppt, .odt, .ods, .txt, .jpg, .jpeg, .png, .gif" style="display:none;" 
                                                                <?php if($edita != null){ echo "disabled" ; }  ?> onchange="triggerInputFile(this.id, event)" />
                                                                <button id="1-search" type="button" class="browse btn btn-primary" style="width:100%">Buscar...</button>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div id="docs-column-2" class="col-md-6 text-center active-col">
                                            <br><br><br>
                                            <a class="docs-addnew-btn" type="button" onclick="triggerAddNew()" style="align:center;"><i class="fas fa-plus-circle btn btn-primary" style="font-size:50px"></i></a>
                                            <br><br><br><br>
                                        </div>
                                    </div>
                                    <!-- IMAGENS - END -->
                                    <br><br>
                                </div>
                                
                            </div>
                            
                            <br><br>
                            <div class="row xdiv">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('cliente/listagem') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <button type="submit" id="btn-save" class="btn btn-primary">&nbsp&nbspSalvar&nbsp&nbsp</button>
                                </div>
                            </div>
                            <br><br>
                        </form>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
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
                            $('#cpfcnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                    $('#cpfcnpj').val().length > 11 ? $('#cpfcnpj').mask('00.000.000/0000-00', cpfoptions) : $('#cpfcnpj').mask('000.000.000-00#', cpfoptions);
                    $('#telefone').mask('(00) 0000-0000', {'translation': {0: {pattern: /[0-9*]/}}});
                    $('#celular1').mask(SPMaskBehavior, spOptions);
                    $('#celular2').mask(SPMaskBehavior, spOptions);
                    $('#cep').mask('00000-000', {reverse: true}, {'translation': {0: {pattern: /[0-9*]/}}});
                
                    <?php if($edita != null){ ?>
                        getImgEdit('<?php echo "c_" . $edita['cliente_cpfcnpj']; ?>');
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
                        
                        document.getElementById('divDados').style.display = "block";
                        document.getElementById('divDocs').style.display = "none";
                    }else{
                        document.getElementById('aDados').style.backgroundColor = "#eee";
                        document.getElementById('aDoc').style.backgroundColor = "white";
                        
                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "block";
                    }
                }
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
                $('#cpfcnpj').keyup(function(){
                    
                    var cpfcnpj = $('#cpfcnpj').val().replace(/[^\d]+/g,'');
                    var tam = cpfcnpj.length;
                    
                    if(tam >= 11){
                        
                        if(tam > 11){
                            $('#razao').prop('required', true);
                            $('#fantasia').prop('required', true);
                            
                            $('#nome').prop('required', false);
                            $('#nascimento').prop('required', false);
                            $('#rg').prop('required', false);
                        }else{
                            $('#nome').prop('required', true);
                            $('#nascimento').prop('required', true);
                            $('#rg').prop('required', true);
                            
                            $('#razao').prop('required', false);
                            $('#fantasia').prop('required', false);
                        }
                    }
                });
                
                <?php if($edita != null){ ?>
                var cpfcnpj = $('#cpfcnpj').val().replace(/[^\d]+/g,'');
                var tam = cpfcnpj.length;
                
                if(tam >= 11){
            
                    if(tam > 11){
                        $('#razao').prop('required', true);
                        $('#fantasia').prop('required', true);
                        
                        $('#nome').prop('required', false);
                        $('#nascimento').prop('required', false);
                        $('#rg').prop('required', false);
                    }else{
                        $('#nome').prop('required', true);
                        $('#nascimento').prop('required', true);
                        $('#rg').prop('required', true);
                        
                        $('#razao').prop('required', false);
                        $('#fantasia').prop('required', false);
                    }
                }
                <?php } ?>
            </script>
            
            <script>
                function cpfcnpjSearch(){
                    
                    var cpfcnpj = $('#cpfcnpj').val().replace(/[^\d]+/g,'');
                    var tam = cpfcnpj.length;
                    var dados = {'cpfcnpj': cpfcnpj};
                    
                    if(tam >= 11){
                        $('.x').prop('disabled', false);
                        
                        if(tam == 11){
            
                            $.ajax({
                                url : '<?php echo base_url('cliente/verificaCliente') ?>',
                                type : "POST",
                                dataType : "json",
                                data : dados,
                                success : function(res) {
                                    if(res != null){
                                        $('#clienteForm').attr('action', '<?php echo base_url('cliente/updateCliente') ?>');
                                        $('#cpfcnpj').prop('disabled', true);
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                        $('#divbtn').css('display', 'none');
                                        $('#cpfrow').css('display', 'block');
                                        $('#cnpjrow').css('display', 'none');
                                        
                                        $('#index').val(res.cliente_cpfcnpj);
                                        $('#nome').val(res.cliente_nome);
                                        $('#rg').val(res.cliente_rg);
                                        $('#nascimento').val(res.cliente_nascimento);
                                        $('#razao').val(res.cliente_razao);
                                        $('#fantasia').val(res.cliente_fantasia);
                                        $('#cep').val(res.cliente_cep);
                                        $('#numero').val(res.cliente_numero);
                                        $('#complemento').val(res.cliente_complemento);
                                        $('#endereco').val(res.cliente_endereco);
                                        $('#bairro').val(res.cliente_bairro);
                                        $('#cidade').val(res.cliente_cidade);
                                        $('#estado').val(res.cliente_estado);
                                        $('#telefone').val(res.cliente_fixo);
                                        $('#celular1').val(res.cliente_cel1);
                                        $('#celular2').val(res.cliente_cel2);
                                        $('#ativo').val(res.cliente_ativo_id);
                                        $('#email').val(res.cliente_email);
                                        $('#ie').val(res.cliente_ie);
                                    }else{
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                        $('#cpfrow').css('display', 'block');
                                        $('#cnpjrow').css('display', 'none');
                                    }
                                },
                                error : function(xhr, status, error) {
                                    alert('erro');
                                }
                            });
                            
                        }else if(tam == 14){
                            
                            $.ajax({
                                url : '<?php echo base_url('cliente/verificaCliente') ?>',
                                type : "POST",
                                dataType : "json",
                                data : dados,
                                success : function(res) {
                                    if(res != null){
                                        $('#clienteForm').attr('action', '<?php echo base_url('cliente/updateCliente') ?>');
                                        $('#cpfcnpj').prop('disabled', true);
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                        $('#divbtn').css('display', 'none');
                                        $('#cnpjrow').css('display', 'block');
                                        $('#cpfrow').css('display', 'none');
                
                                        $('#index').val(res.cliente_cpfcnpj);
                                        $('#nome').val(res.cliente_nome);
                                        $('#rg').val(res.cliente_rg);
                                        $('#nascimento').val(res.cliente_nascimento);
                                        $('#razao').val(res.cliente_razao);
                                        $('#fantasia').val(res.cliente_fantasia);
                                        $('#cep').val(res.cliente_cep);
                                        $('#numero').val(res.cliente_numero);
                                        $('#complemento').val(res.cliente_complemento);
                                        $('#endereco').val(res.cliente_endereco);
                                        $('#bairro').val(res.cliente_bairro);
                                        $('#cidade').val(res.cliente_cidade);
                                        $('#estado').val(res.cliente_estado);
                                        $('#telefone').val(res.cliente_fixo);
                                        $('#celular1').val(res.cliente_cel1);
                                        $('#celular2').val(res.cliente_cel2);
                                        $('#ativo').val(res.cliente_ativo_id);
                                        $('#email').val(res.cliente_email);
                                        $('#ie').val(res.cliente_ie);
                                    }else{
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                        $('#cnpjrow').css('display', 'block');
                                        $('#cpfrow').css('display', 'none');
                                    }
                                },
                                error : function(xhr, status, error) {
                                    alert('erro');
                                }
                            });
                            
                        }else{
                            
                            $('#cpfcnpj').prop('disabled', false);
                            $('.xdiv').css('display', 'none');
                            $('.xlin').css('display', 'none');
                            $('#divbtn').css('display', 'block');
                            alert('Digite um CPF ou CNPJ válido!');
                            
                        }
                    }else{
                        $('.x').prop('disabled', true);
                        alert('Digite um CPF ou CNPJ válido!');
                    }
                }
                
                <?php if($edita != null){ ?>
                    var cpfcnpj = $('#cpfcnpj').val().replace(/[^\d]+/g,'');
                    var tam = cpfcnpj.length;
                    var dados = {'cpfcnpj': cpfcnpj};
                    
                    if(tam >= 11){
                        $('.x').prop('disabled', false);
                        
                        if(tam == 11){
                
                            $.ajax({
                                url : '<?php echo base_url('cliente/verificaCliente') ?>',
                                type : "POST",
                                dataType : "json",
                                data : dados,
                                success : function(res) {
                                    if(res != null){
                                        $('#cpfcnpj').prop('disabled', true);
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                        $('#divbtn').css('display', 'none');
                                        $('#cpfrow').css('display', 'block');
                                        $('#cnpjrow').css('display', 'none');
                                    }else{
                                        $('#cpfrow').css('display', 'block');
                                        $('#cnpjrow').css('display', 'none');
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                    }
                                },
                                error : function(xhr, status, error) {
                                    alert('erro');
                                }
                            });
                            
                        }else if(tam == 14){
                            
                            $.ajax({
                                url : '<?php echo base_url('cliente/verificaCliente') ?>',
                                type : "POST",
                                dataType : "json",
                                data : dados,
                                success : function(res) {
                                    if(res != null){
                                        $('#cpfcnpj').prop('disabled', true);
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                        $('#divbtn').css('display', 'none');
                                        $('#cnpjrow').css('display', 'block');
                                        $('#cpfrow').css('display', 'none');
                                    }else{
                                        $('.xdiv').css('display', 'block');
                                        $('.xlin').css('display', 'block');
                                    }
                                },
                                error : function(xhr, status, error) {
                                    alert('erro');
                                }
                            });
                            
                        }else{
                            
                            $('#cpfcnpj').prop('disabled', false);
                            $('.xdiv').css('display', 'none');
                            $('.xlin').css('display', 'none');
                            $('#divbtn').css('display', 'block');
                            alert('Digite um CPF ou CNPJ válido!');
                            
                        }
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
                    var dadosdoc = {'cpfcnpj': val};
                    
                    $.ajax({
                        url : '<?php echo base_url('cliente/getDocumentosByCpfCnpj') ?>',
                        type : 'POST',
                        dataType : 'json',
                        data : dadosdoc,
                        success : function(response) {
                            treatAutofillDocs(response);
                        },
                        error : function(xhr, status, error) {
                            alert("getImgEdit: " + status + " " + error + " " + xhr);
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
            