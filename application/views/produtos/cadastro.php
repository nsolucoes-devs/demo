        
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
                
                <div class="row main-row">
                    <form action="<?php echo base_url('produtos/insertProduto') ?>" method="post">
                        <div class="col-md-12 main-col-12">
                            <input type="hidden" id="id" name="id" value=""/>
                    
                            <div class="row">
                                <div class="col-md-<?php if(isset($edicao_id)){ echo "6";}else{ echo "9";}?> form-group">
                                    <label for="nome">Nome</label><br>
                                    <input id="nome" name="nome" type="text" class="form-control" placeholder="Nome da peça" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="codigo">Código da Peça</label>
                                    <input id="codigo" name="codigo" type="text" class="form-control" placeholder="Código da Peça" required>
                                </div>
                            
                                <?php if(isset($edicao_id)){ ?>
                                <div class="col-md-3 form-group">
                                    <label for="ativo">Ativo: </label><br>
                                    <select class="js-example-basic-multiple disabled-field" style="width: 100%!important; float:right;" name="ativo" id="ativo" required>
                                        <?php foreach($ativos as $ativo){?>
                                            <option value="<?php echo $ativo['ativo_id'];?>"><?php echo $ativo['ativo_tipo'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <?php } else { ?>
                                <div class="col-md-3 form-group" style="display:none;">
                                    <label for="ativo">Ativo</label><br>
                                    <select class="js-example-basic-multiple" style="width: 100%!important;" name="ativo" id="ativo" required>
                                        <option id="ativo-placeholder" selected value="1">Ativo</option>
                                    </select>
                                </div>
                                <?php } ?>
                            </div>
            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="modelo">Modelo</label><br>
                                    <input id="modelo" name="modelo" type="text" class="form-control disabled-field" placeholder="Modelo do Produto" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="fabricante">Fabricante</label><br>
                                    <input id="fabricante" name="fabricante" type="text" class="form-control" placeholder="Fabricante do Produto" required>
                                </div>
                            </div>
            
                            <br>
                            <hr style="height: 1px; background-color: #ccc; border: none;">
                            <br>
                            
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="preco_custo">Preço Unitário (R$)</label><br>
                                    <input id="precocusto" name="precocusto" type="text" class="form-control valor" placeholder="R$00,00" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="preco_venda">Preço de Custo (R$)</label><br>
                                    <input id="precovenda" name="precovenda" type="text" class="form-control valor" placeholder="R$00,00" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="fornecedor">Fornecedor</label><br>
                                    <select class="js-example-basic-multiple" style="width: 100%!important;" name="fornecedor" id="fornecedor" required>
                                        <option id="ativo-placeholder-fornecedor" selected disabled value="">-- Selecionar --</option>
                                        <?php foreach($fornecedores as $fornecedor){ ?>
                                             <option value="<?php echo $fornecedor['fornecedor_cnpj'] ?>"><?php echo $fornecedor['fornecedor_nome'] ?></option>;
                                        <?php } ?>
                                    </select>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label>Grupo de Peças</label><br>
                                    <select class="js-example-basic-multiple" style="width: 100%!important;" name="grupo" id="grupo" required>
                                        <option value="" selected disabled>-- Selecione um grupo de peças --</option>
                                        <?php foreach($grupos as $gp){
                                            echo "<option value='".$gp['gp_id']."'>".$gp['gp_nome']."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Qtd Mínima em Estoque</label><br>
                                    <input type="number" class="form-control" name="qtd_min" id="qtd_min" required placeholder="0">
                                </div>
                            </div>
                            
                            <br>
                            <hr style="height: 1px; background-color: #ccc; border: none;"><br>
                            <br>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="un_medida">Unidade de medida</label><br>
                                    <select class="select2-medida" style="width: 100%!important;" name="un_medida" id="un_medida" required>
                                        <option id="ativo-placeholder-medida" selected disabled value="">-- Selecionar uma unidade de comprimento --</option>
                                        <?php foreach($medidas as $med){ 
                                            if($med['medidas_tipo'] == "comprimento"){?>
                                             <option value="<?php echo $med['medidas_id'] ?>"><?php echo $med['medidas_nome']."(".$med['medidas_sigla'].")"; ?></option>;
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="comprimento">Comprimento</label><br>
                                    <input id="comprimento" name="comprimento" type="number" class="form-control" placeholder="Ex.: 10" required>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="largura">Largura</label><br>
                                    <input id="largura" name="largura" type="number" class="form-control" placeholder="Ex.: 10" required>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label for="altura">Altura</label><br>
                                    <input id="altura" name="altura" type="number" class="form-control" placeholder="Ex.: 10" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="un_peso">Unidade de peso</label><br>
                                    <select class="select2-medida" style="width: 100%!important;" name="un_peso" id="un_peso" required>
                                        <option id="ativo-placeholder-peso" selected disabled value="">-- Selecionar uma unidade de peso --</option>
                                        <?php foreach($medidas as $med){ 
                                            if($med['medidas_tipo'] == "peso"){?>
                                             <option value="<?php echo $med['medidas_id'] ?>"><?php echo $med['medidas_nome']."(".$med['medidas_sigla'].")"; ?></option>;
                                        <?php }} ?>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="peso">Peso</label><br>
                                    <input id="peso" name="peso" type="number" class="form-control" placeholder="Ex.: 10" required>
                                </div>
                            </div>
                            
                            <br>
                            <hr style="height: 1px; background-color: #ccc; border: none;">
                            <br>
                            
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="sku">SKU</label><br>
                                    <input id="sku" name="sku" type="text" class="form-control" maxsize="64" >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="ncm">NCM</label><br>
                                    <input id="ncm" name="ncm" type="text" class="form-control" maxsize="12" >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="cest">CEST</label><br>
                                    <input id="cest" name="cest" type="text" class="form-control" maxsize="12" >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="upc">UPC</label><br>
                                    <input id="upc" name="upc" type="text" class="form-control" maxsize="12"  >
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="ean">EAN</label><br>
                                    <input id="ean" name="ean" type="text" class="form-control" maxsize="14" >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="jan">JAN</label><br>
                                    <input id="jan" name="jan" type="text" class="form-control" maxsize="13" >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="isbn">ISBN</label><br>
                                    <input id="isbn" name="isbn" type="text" class="form-control" maxsize="17" >
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="mpn">MPN</label><br>
                                    <input id="mpn" name="mpn" type="text" class="form-control" maxsize="64" >
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="detalhes">Detalhes</label><br>
                                    <textarea id="detalhes" name="detalhes" type="text" class="form-control" style="resize:none;" rows="4" ></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12"><br><br></div>
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('pecas') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <button type="submit" id="btn-save" class="btn btn-primary disabled-field" style="color: white">&nbsp&nbspSalvar&nbsp&nbsp</button>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <button type="button" id="btn-clear" class="btn btn-primary disabled-field" style="color: white">&nbsp&nbspLimpar&nbsp&nbsp</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <br><br>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    
                    $('.select2-medida').select2({theme: "bootstrap"});
                    $('.valor').mask("#.##0,00", {reverse: true});
                    
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                    
                    function autoFillByID(id){
                        var dados = {
                            'produto_id': id
                        };
                    
                        $.ajax({
                            url : '<?php echo base_url('produtos/getProdutoByID') ?>',
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
                    
                        $('.disabled-field').removeAttr('disabled');
                    }
                    
                    <?php 
                        if(isset($edicao_id)){
                            echo "
                                autoFillByID(". $edicao_id ."); 
                            ";
                    
                        }
                    ?>
                    
                    
                    function treatAutofillData(data){
                        
                        $("#id").val(data.produto_id);
                        $("#nome").val(data.produto_nome);
                        $("#codigo").val(data.produto_codigo);
                        $("#precocusto").unmask().val(data.produto_preco_custo).mask("#.##0,00", {reverse: true});
                        $("#precovenda").unmask().val(data.produto_preco_venda).mask("#.##0,00", {reverse: true});
                        $("#fabricante").val(data.produto_fabricante);
                        $("#fornecedor").val(data.produto_fornecedor_cnpj).change();
                        $("#detalhes").val(data.produto_detalhes);
                        $("#modelo").val(data.produto_modelo);
                        $("#qtd_min").val(data.produto_qtdminimo);
                        $("#grupo").val(data.produto_grupo_id).change();
                        $("#ativo").val(data.produto_ativo_id).change();
                        //IDENTIFICADORES
                        $("#sku").val(data.produto_sku);
                        $("#ncm").val(data.produto_ncm);
                        $("#cest").val(data.produto_cest);
                        $("#upc").val(data.produto_upc);
                        $("#ean").val(data.produto_ean);
                        $("#jan").val(data.produto_jan);
                        $("#isbn").val(data.produto_isbn);
                        $("#mpn").val(data.produto_mpn);
                        //MEDIDAS
                        $("#un_medida").val(data.produto_un_medida);
                        $("#un_peso").val(data.produto_un_peso);
                        $("#comprimento").val(data.produto_comprimento);
                        $("#largura").val(data.produto_largura);
                        $("#altura").val(data.produto_altura);
                        $("#peso").val(data.produto_peso);
                        
                    }
                    
                    $("#btn-clear").click(function(){
                        window.location.href = '<?php echo base_url('cadastrarpeca') ?>';
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
                       
                });             
            </script>
