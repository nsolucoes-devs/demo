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
                <?php if($erro != null){?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $erro;?>        
                    </div>
                <?php }?>
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        <form action="<?php echo base_url('cadastros/insertFuncao'); ?>" method="post">
                            <input type="hidden" id="id" name="id" value="<?php if(isset($edicao_id)){echo $edicao_id;} ?>">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label for="nome">Nome da Função: </label><br>
                                    <input id="nome" name="nome" type="text" class="form-control disabled-field" placeholder="Ex.: Gerente" style="width:100%; float:right;" required> <br>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="ativo">Ativo: </label><br>
                                    <select class="js-example-basic-multiple disabled-field"  style="width: 100%!important; float:right;" name="ativo" id="ativo" required>
                                        <?php foreach($ativos as $ativo){?>
                                            <option value="<?php echo $ativo['ativo_id'];?>"><?php echo $ativo['ativo_tipo'];?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <!-- -->
                            <h3>Permissões</h3>
                            <?php foreach($controladores as $permissao){ ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <label for="permissao-<?php echo $permissao['controlador_id'] ?>"><h4><?php echo $permissao['controlador_nome'] ?></h4></label>
                                        </div>
                                        <div style="width:100%; background-color:red;">
                                            <div class="col-md-2" style="text-align:center; margin-top: 5px;">
                                                <input id="<?php echo $permissao['controlador_id']?>-v" name="p-<?php echo $permissao['controlador_id']?>[]" type="checkbox" value="v">
                                                <label for="<?php echo $permissao['controlador_id']?>-v">Ver</label>
                                            </div>
                                            <div class="col-md-2" style="text-align:center; margin-top: 5px;">
                                                <input id="<?php echo $permissao['controlador_id']?>-e" name="p-<?php echo $permissao['controlador_id']?>[]" type="checkbox" value="e">
                                                <label for="<?php echo $permissao['controlador_id']?>-e">Editar</label>
                                            </div>
                                            <div class="col-md-2" style="text-align:center; margin-top: 5px;">
                                                <input id="<?php echo $permissao['controlador_id']?>-d" name="p-<?php echo $permissao['controlador_id']?>[]" type="checkbox" value="d">
                                                <label for="<?php echo $permissao['controlador_id']?>-d">Excluir</label>
                                            </div>
                                            <div class="col-md-2" style="text-align:center; margin-top: 5px;">
                                                <input id="<?php echo $permissao['controlador_id']?>-a" name="p-<?php echo $permissao['controlador_id']?>[]" type="checkbox" value="a">
                                                <label for="<?php echo $permissao['controlador_id']?>-a">Ativar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr style="border-width: 5px; color:gray; background-color:gray; margin-top: 5px; margin-bottom: 5px;">
                            <?php } ?>

                            <div class="row">
                                <div class="col-md-4">
                                    <a id="check-all" href="#">Marcar tudo</a> | <a id="uncheck-all" href="#">Desmarcar tudo</a>
                                </div>
                            </div>

                    </div>
                    <div class="col-md-12">
                        <br><br>
                        <div class="row" style="margin-bottom: 40px">
                            <div class="col-md-12 text-center">
                                <a href="<?php echo base_url('funcoes') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                &nbsp&nbsp&nbsp&nbsp
                                <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspSalvar e Voltar&nbsp&nbsp</button>
                                <!--&nbsp&nbsp&nbsp&nbsp
                                <a href="" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">&nbsp&nbspSalvar e Continuar&nbsp&nbsp</a>-->
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                    <?php 
                        if(isset($edicao_id)){
                            echo " autoFillByID(". $edicao_id .");";
                        }
                    ?>
                });
            </script>
            
            <script>
                $("#check-all").on('click', function(){
                    $("input[type=checkbox]").prop("checked", true);
                });
                
                $("#uncheck-all").on('click', function(){
                    $("input[type=checkbox]").prop("checked", false);
                });
            </script>
            
            <script>
                function autoFillByID(id){
                    var dados = {
                        'funcao_id': id
                    };
                
                    $.ajax({
                        url : '<?php echo base_url('cadastros/getFuncaoByID') ?>',
                        type : 'POST',
                        dataType : 'json',
                        data : dados,
                        success : function(response) {
                            res = response[0];
                            
                            $("#id").val(res.funcao_id);
                            $("#nome").val(res.funcao_nome);
                            $("#ativo").val(res.funcao_ativo_id);
                            
                            var permissao = res.funcao_permissao;
                            var permissaoSplitPipe = permissao.split('|');
                            
                            
                            for(i in permissaoSplitPipe){
                                var permissaoCodigo = permissaoSplitPipe[i].split('-')[1];
                                var controllerId = parseInt(i)+1;
                                if(permissaoCodigo.charAt(0) == '1'){
                                    $("#" + controllerId + "-v").prop("checked", true);
                                }
                                if(permissaoCodigo.charAt(1) == '1'){
                                    $("#" + controllerId + "-e").prop("checked", true);
                                }
                                if(permissaoCodigo.charAt(2) == '1'){
                                    $("#" + controllerId + "-d").prop("checked", true);
                                }
                                if(permissaoCodigo.charAt(3) == '1'){
                                    $("#" + controllerId + "-a").prop("checked", true);
                                }
                            }
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                
                    $('.disabled-field').removeAttr('disabled');
                }
            </script>