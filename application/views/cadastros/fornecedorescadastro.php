        
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
                        
                        <form id="fornecedorForm" action="<?php if($edita != null){ echo base_url('cadastros/updateFornecedor'); }else{ echo base_url('cadastros/insertFornecedor'); } ?>" method="post" enctype='multipart/form-data'>
                        
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9;">
                                <li class="nav-item">
                                    <a class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)"><b>DADOS</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDoc" onclick="change(2)"><b>DOCUMENTOS</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aPag" onclick="change(3)"><b>DADOS DE PAGAMENTO</b></a>
                                </li>
                            </ul>
                                
                            <div class="row white-tab" id="divDados" style="display: block;">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
                                    
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <a class="btn btn-primary" href="<?php echo base_url('fornecedores') ?>"><i class="fas fa-backward"></i>&nbsp;Voltar</a>
                                        </div>
                                    </div>
                                    
                                    <br>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>CPF / CNPJ (Somente Números)</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="cnpj" name="cnpj" type="text" class="form-control" placeholder="000.000.000-00" required <?php if($edita != null){echo "value='".$edita['fornecedor_cnpj']."' disabled";} ?>>
                                                <input type="hidden" name="index" id="index" <?php if($edita != null){echo "value='".$edita['fornecedor_cnpj']."'";} ?>>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <a id="divbtn" onclick="cnpjSearch()" class="btn btn-primary" style="margin-top: 22px;"><i class="fa fa-search"></i></a>
                                            <label id="space">&nbsp;&nbsp;&nbsp;</label>
                                            <a href="<?php echo base_url('cadastros/novoFornecedor') ?>" class="btn btn-danger" style="margin-top: 22px"><i class="fas fa-sync-alt"></i></a>
                                        </div>
                                        <div class="col-md-6 form-group text-right">
                                            <label style="color: #c90000; margin-top: 20px">Campos marcados com * são obrigatórios!</label>
                                        </div>
                                    </div>
        
                                    <div class="row xdiv">
                                        <div class="col-md-7 form-group">
                                            <label>Nome</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="nome" name="nome" type="text" class="form-control x" placeholder="Nome" required disabled <?php if($edita != null){echo "value='" . $edita['fornecedor_nome'] . "'";} ?>>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label>Ramo de Atividade</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="ramo" name="ramo" type="text" class="form-control x" placeholder="Ramo de Atividade" required disabled <?php if($edita != null){echo "value='" . $edita['fornecedor_ramo'] . "'";} ?>>
                                        </div>
                                    </div>
        
                                    <div class="row xdiv" style="display: block;">
                                        <div class="col-md-7 form-group">
                                            <label>Razão Social</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="razao" name="razao" type="text" class="form-control x" placeholder="Razão Social"  required disabled <?php if($edita != null){echo "value='" . $edita['fornecedor_razao'] . "'";} ?>>
                                        </div>
                                        <div class="col-md-5 form-group">
                                            <label>Inscrição Estadual</label><br>
                                            <input id="ie" name="ie" type="text" class="form-control x" placeholder="Inscrição Estadual" disabled <?php if($edita != null){echo "value='" . $edita['fornecedor_ie'] . "'";} ?>>
                                        </div>
                                    </div>
                                    
                                    <div class="row xdiv">
                                        <div class="col-md-8">
                                            <label>Nome do Representante (Vendedor)</label><br>
                                            <input id="nome_r" name="nome_r" type="text" class="form-control x" placeholder="Nome do Representante" disabled <?php if($edita != null){echo "value='" . $edita['fornecedor_representante'] . "'";}?>>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Telefone do Representante</label><br>
                                            <input id="tel_r" name="tel_r" type="text" class="form-control x" placeholder="(00) 00000-0000" disabled <?php if($edita != null){echo "value='" . $edita['fornecedor_tel_representante'] . "'";}?>>
                                        </div>
                                    </div>
                                    
                                    <hr class="xlin" style="height: 1px; background-color: #ccc; border: none;">
                                    
                                    <div class="row xdiv">
                                        <div class="col-md-3 form-group">
                                            <label>CEP</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="cep" name="cep" type="text" class="form-control x" placeholder="00000-000" required disabled <?php if($edita != null){echo "value='".$edita['fornecedor_cep']."'";} ?>>
                                        </div>
                                        <div class="col-md-7 form-group">
                                            <label>Logradouro</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="endereco" name="endereco" type="text" class="form-control x" placeholder="Logradouro" required disabled <?php if($edita != null){echo "value='".$edita['fornecedor_endereco']."'";} ?>>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <label>Número</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="numero" name="numero" type="text" class="form-control x" placeholder="000" required disabled <?php if($edita != null){echo "value='".$edita['fornecedor_numero']."'";} ?>>
                                        </div>
                                    </div>
                    
                                    <div class="row xdiv">
                                        <div class="col-md-3 form-group">
                                            <label>Bairro</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="bairro" name="bairro" type="text" class="form-control x" placeholder="Bairro" required disabled <?php if($edita != null){echo "value='".$edita['fornecedor_bairro']."'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Complemento</label>
                                            <input id="complemento" name="complemento" type="text" class="form-control x" placeholder="Complemento" disabled <?php if($edita != null){echo "value='".$edita['fornecedor_complemento']."'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Cidade</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="cidade" name="cidade" type="text" class="form-control x" placeholder="Cidade" required disabled readonly <?php if($edita != null){echo "value='".$edita['fornecedor_cidade']."'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Estado</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="estado" name="estado" type="text" class="form-control x" placeholder="Estado" required disabled readonly <?php if($edita != null){echo "value='".$edita['fornecedor_estado']."'";} ?>>
                                        </div>
                                    </div>
                                    
                                    <hr class="xlin" style="height: 1px; background-color: #ccc; border: none;">
                                    
                                    <div class="row xdiv">
                                        <div class="col-md-12 form-group">
                                            <label>E-mail</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <input id="email" name="email" type="text" class="form-control x" placeholder="email@mail.com" required disabled <?php if($edita != null){echo "value='".$edita['fornecedor_email']."'";} ?>>
                                        </div>
                                    </div>
                                    <div class="row xdiv">
                                        <div class="col-md-4 form-group">
                                            <label>Telefone Fixo</label>
                                            <input id="tel" name="tel" type="text" class="form-control x" placeholder="(00) 0000-0000" disabled <?php if($edita != null){echo "value='".$edita['fornecedor_fixo']."'";} ?>>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Celular</label>
                                            <input id="cel" name="cel" type="text" class="form-control x" placeholder="(00) 00000-0000" disabled <?php if($edita != null){echo "value='".$edita['fornecedor_cel1']."'";} ?>>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label>Ativo</label><label style="color: #c90000">&nbsp;&nbsp;*</label><br>
                                            <select class="js-example-basic-multiple x"  style="width: 100%!important" name="ativo" id="ativo" required disabled>
                                                <?php foreach($ativos as $ativo){
                                                    if($edita != null){
                                                        if($ativo['ativo_id'] == $edita['fornecedor_ativo_id']){$sel = " selected ";}else{$sel = "";}
                                                        if($this->session->userdata('y_a') == 1){
                                                            echo '<option value="'.$ativo['ativo_id'].'" '.$sel.'>'.$ativo['ativo_tipo'].'</option>';
                                                        }else if($edita['fornecedor_ativo_id'] == 2){
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
                                            <select class="preset-docs-picktype-select"  style="width: 100%!important; float:center" onchange="triggerChange()">
                                                <option id="docs-picktype-placeholder" selected disabled>-- Selecionar --</option>
                                            </select>
                                            <br><br>
                                        </div>
                                    </div>
                                    
                                    <div class="row" id="preset-docs-docs" style="display: none;">
                                        <div class="col-md-6 form-group">
                                            <div class="col-md-12" style="padding-bottom: 40px">
                                                
                                                <div class="col-md-6">
                                                    <a class="doc-link" target="_blank">
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
                                            <h4 style="display:inline; float:left;">Documentação <p style="display:none;" id="docs-counter">1</p></h4>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <a class="btn btn-danger" style="float: left; margin-left:20px" onclick="triggerDismiss()" style="display:inline;">X</a>
                                        </div>
                                    </div>
                                    
                                    <br><br>
                                    
                                    <input type="hidden" id="docs-control" name="docs-control" value="5" />
                                    <div class="row" id="docs-div">
                                        <div id="docs-column-1" class="col-md-6 text-center active-doc fixed-doc">
                                            <div class="col-md-12">
                                                
                                                <div class="col-md-6">
                                                    <?php if($edita != null){ if($fixed != null && $fixed['documento_isimagem'] == 0){ echo "<a target='_blank' title='Clique para visualizar!' href='".base_url('uploads/').$edita['fornecedor_cnpj']."_5.pdf'>"; } } ?>
                                                    <img src="<?php  if($edita != null){
                                                        if($fixed != null && $fixed['documento_isimagem'] == 1){
                                                            echo base_url('uploads/' . $edita['fornecedor_cnpj'] . '_5.png');
                                                        }else if($fixed != null && $fixed['documento_isimagem'] == 0){
                                                            echo base_url('resources/imgs/pdf_cover.png');
                                                        }else{
                                                            echo base_url('resources/imgs/imgplaceholder.png');
                                                        }
                                                    }else{ echo base_url('resources/imgs/imgplaceholder.png'); } ?>" id="5-preview" class="img-thumbnail" style="max-width:200px; height:auto;"/>
                                                    <?php  if($edita != null){ if($fixed['documento_isimagem'] == 0){ echo "</a>"; } } ?>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <div class="input-group my-3">
                                                        <div class="row" style="margin: 0">
                                                            <h4 style="float:left;">CNPJ</h4>
                                                        </div>
                                                        <div class="row" style="margin: 0">
                                                            <input type="text" class="form-control" placeholder="Selecione um arquivo" id="5-file" value="<?php if(isset($_GET['edicao_id'])){ echo $_GET['edicao_id'] . '_5.png'; } ?>" disabled style="width: 100%"/>
                                                            <div class="input-group-append" style="width: 100%">
                                                                <input id="5-doc" type="file" name="5-doc" class="file" accept=".pdf, .doc, .rtf, .xls, .ppt, .odt, .ods, .txt, .jpg, .jpeg, .png, .gif" style="display:none;" 
                                                                <?php if($edita != null){ echo "disabled" ; }  ?> onchange="triggerInputFile(this.id, event)"/>
                                                                <button id="5-search" type="button" class="browse btn btn-primary" style="width:100%">Buscar...</button>
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
                            
                            <div class="row white-tab" id="divPag" style="display: none;">
                                <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                    <br><br>
                                    
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>CPF / CNPJ do Titular</label><br>
                                            <input type="text" class="form-control" name="titular_cpfcnpj" id="titular_cpfcnpj" placeholder="CPF / CNPJ" <?php if($edita != null){echo "value='" . $edita['fornecedor_titular_cpfcnpj'] . "'";} ?>>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <label>Nome do Titular</label><br>
                                            <input type="text" class="form-control" name="titular_nome" id="titular_nome" placeholder="Nome" <?php if($edita != null){echo "value='" . $edita['fornecedor_titular_nome'] . "'";} ?>>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>Banco</label><br>
                                            <input type="text" class="form-control" name="banco" id="banco" placeholder="Banco" <?php if($edita != null){echo "value='" . $edita['fornecedor_banco'] . "'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Agência</label><br>
                                            <input type="text" class="form-control" maxlength="10" name="agencia" id="agencia" placeholder="Agência" <?php if($edita != null){echo "value='" . $edita['fornecedor_agencia'] . "'";} ?>>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <label>Dig.</label><br>
                                            <input type="text" class="form-control" maxlength="2" name="agencia_d" id="agencia_d" placeholder="Dígito" <?php if($edita != null){echo "value='" . $edita['fornecedor_agencia_d'] . "'";} ?>>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <label>Conta</label><br>
                                            <input type="text" class="form-control" maxlength="10" name="conta" id="conta" placeholder="Conta" <?php if($edita != null){echo "value='" . $edita['fornecedor_conta'] . "'";} ?>>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <label>Dig.</label><br>
                                            <input type="text" class="form-control" maxlength="2" name="conta_d" id="conta_d" placeholder="Dígito" <?php if($edita != null){echo "value='" . $edita['fornecedor_conta_d'] . "'";} ?>>
                                        </div>
                                    </div>
                                    
                                    <br><br>
                                </div>
                            </div>
                            <br><br>
                            <div class="row xdiv">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('fornecedores') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
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
                        getImgEdit('<?php echo $edita['fornecedor_cnpj']; ?>');
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
                    }else{
                        $('#raz').css('display', 'none');
                        $('#razao').prop('required', false);
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
                            url : '<?php echo base_url('cadastros/verificaFornecedor') ?>',
                            type : "POST",
                            dataType : "json",
                            data : dados,
                            success : function(res) {
                                if(res != null){
                                    $('#fornecedorForm').attr('action', '<?php echo base_url('cadastros/updateFornecedor') ?>');
                                    $('#cnpj').prop('disabled', true);
                                    $('.xdiv').css('display', 'block');
                                    $('.xlin').css('display', 'block');
                                    $('#divbtn').css('display', 'none');
                                    $('#space').css('display', 'none');
            
                                    $('#index').val(res.fornecedor_cnpj);
                                    $('#nome').val(res.fornecedor_nome);
                                    $('#cep').val(res.fornecedor_cep);
                                    $('#numero').val(res.fornecedor_numero);
                                    $('#complemento').val(res.fornecedor_complemento);
                                    $('#endereco').val(res.fornecedor_endereco);
                                    $('#bairro').val(res.fornecedor_bairro);
                                    $('#cidade').val(res.fornecedor_cidade);
                                    $('#estado').val(res.fornecedor_estado);
                                    $('#tel').val(res.fornecedor_fixo);
                                    $('#cel').val(res.fornecedor_cel1);
                                    $('#ativo').val(res.fornecedor_ativo_id);
                                    $('#email').val(res.fornecedor_email);
                                    $('#ramo').val(res.fornecedor_ramo);
                                    $('#tel_r').val(res.fornecedor_tel_representante);
                                    $('#nome_r').val(res.fornecedor_representante);
                                    
                                    if(res.fornecedor_cnpj == 14){
                                        $('#raz').css('display', 'block');
                                        $('#razao').val(res.fornecedor_razao);
                                        $('#razao').prop('required', true);
                                        $('#ie').val(res.fornecedor_ie);
                                    }else{
                                        $('#raz').css('display', 'none');
                                        $('#razao').val('');
                                        $('#razao').prop('required', false);
                                        $('#ie').val('');
                                    }
                                    
                                    var rg = "<?php echo base_url('uploads/')?>" + res.fornecedor_cnpj + "_rg.png";
                                    var cpf = "<?php echo base_url('uploads/')?>" + res.fornecedor_cnpj + "_cpf.png";
                                    var hab = "<?php echo base_url('uploads/')?>" + res.fornecedor_cnpj + "_hab.png";
                                    
                                    $('#rg-preview').attr('src', rg);
                                    $('#cpf-preview').attr('src', cpf);
                                    $('#hab-preview').attr('src', hab);
                                    
                                    $('#rg-file').val(res.fornecedor_cnpj + "_rg.png");
                                    $('#cpf-file').val(res.fornecedor_cnpj + "_cpf.png");
                                    $('#hab-file').val(res.fornecedor_cnpj + "_hab.png");
            
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
                                alert('erro');
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
                            url : '<?php echo base_url('cadastros/verificaFornecedor') ?>',
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
                                alert('erro');
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
            