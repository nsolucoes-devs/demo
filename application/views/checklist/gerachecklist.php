            <style>
                .tableFixHead          { overflow-y: auto; height: 450px; padding-left: 15px; }
                .tableFixHead thead th { position: sticky; top: 0; }
                
                /* Just common table stuff. Really. */
                table  { border-collapse: collapse; width: 100%; }
                th, td { padding: 8px 16px; }
                th     { background:#eee; }
                
                #text-permissao th{
                    background: white;
                }
                
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    background-color: white;
                    border-radius: 5px;
                }
                .dataTables_wrapper .row{
                    width: 101%;
                    margin-bottom: 15px;
                }
                .pagination{
                    margin-top: 0px;
                }
                .dataTables_length label select{
                    margin-left: 10px;
                    margin-right: 10px;
                }
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
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
                .pagination>.active>a{
                    background-color: #033557;
                }
                .pagination>.active>a:hover{
                    background-color: #033557;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
                    background: white;
                    border-color: white;
                }
                .btn-info-red{
                    float: right;
                    margin-right: 15px;
                    width: 25px;
                    height: 25px;
                    border: 2px solid black;
                    border-radius: 50%;
                    text-align: center;
                    color: red;
                    cursor: pointer;
                }
                .btn-info-red:hover{
                    color: black;
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
                @media (min-width: 500px){
                    .swal2-popup.swal2-modal.swal2-icon-info.swal2-show{
                        width: 40%;
                    }
                }
                .see-pass{
                    width: 10%;
                    margin-left: -4px;
                    margin-top: -2px;
                    border-top-left-radius: 0;
                    border-bottom-left-radius: 0;
                }
                .passwd{
                    width: 50%;
                    display: inline;
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0;
                }
                .encurtar{
                    display: -webkit-box;
                    overflow: hidden;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    word-break: break-word;
                    line-height: 11px!important;
                }
            </style>
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                    
                    <?php if($this->session->userdata('editar') == 1 ){?>
                        <div style="margin-bottom: 10px; padding-left: 15px">
                            <a class="btn btn-primary" style='color: white' data-toggle="modal" data-target="#modalCheckList" >Criar novo CheckList</a>
                        </div>
                    <?php }?>
                        <?php if($erro != null){ ?>
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <h3 class="text-danger">Erro: A senha informada estava incorreta, por favor tente novamente!</h3>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="input-group-append" style="position: absolute; right: 40px; height: 5.6%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        
                        <div class="tableFixHead">
        				    <table id="myTableFunc" class="table table-hover table-bordered">
        				        <thead>
        				            <tr>
        				                <th style="width: 55%">Cliente</th>
        				                <th style="width: 5%">Frota</th>
        				                <th style="width: 5%">Finalizada</th>
        				                <th style="width: 35%">Chave</th>
        				            </tr>
        				        </thead>
        				        <tbody>
        				            <?php foreach($checklists as $ckl){ ?>
                				            <tr>
                				                <td style="vertical-align: middle;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($ckl['checklist_cliente']));?>">
                                                        <?php echo ucwords(strtolower($ckl['checklist_cliente'])) ?>
                                                    </div>
                                                </td>
                				                <td style="padding-top: 12px!important;"><?php echo $ckl['checklist_frota'];?></td>
                				                <td style="padding-top: 12px!important;" class="text-center"><?php if($ckl['checklist_finalizada'] == 1){ echo "SIM";}else{ echo "NÃO";}?></td>
                				                <td style="vertical-align: middle;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($ckl['checklist_chave']));?>">
                                                        <?php echo ucwords(strtolower($ckl['checklist_chave'])) ?>
                                                    </div>
                                                </td>
                				            </tr>
                				        <?php }?>    
        				        </tbody>
        				    </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="modalCheckList" tabindex="-1" role="dialog" aria-labelledby="modalCheckListTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Gerar de Novo CheckList</h5>
                        </div>
                        <form action="<?php echo base_url('checklist/novochecklist');?>" method="post">         
                            <div class="modal-body col-md-12">
                                <div class="col-md-3">
                                    <h4>Cliente</h4>
                                </div>
                                <div class="col-md-9">
                                    <select class="js-example-basic-single"  style="width: 100%!important" name="cliente" id="cliente" required>
                                            <option id="ativo-placeholder" selected>-- Selecionar --</option>
                                            <?php foreach($clientes as $cli){?>
                                            <option value="<?php echo $cli['cliente_cpfcnpj']?>"><?php echo $cli['cliente_nome'];?></option>
                                            <?php }?>
                                    </select>
                                </div>
                                <br>
                            </div>
                            <div class="modal-body col-md-12">
                                <div class="col-md-3">
                                    <h4>Frota</h4>
                                </div>
                                <div class="col-md-9">
                                    <select class="js-example-basic-single"  style="width: 100%!important" name="frota" id="frota" required>
                                            <option id="ativo-placeholder" selected>-- Selecionar --</option>
                                            <?php foreach($frota as $frt){?>
                                            <option value="<?php echo $frt['frota_id']?>"><?php echo $frt['frota_codigo'];?></option>
                                            <?php }?>
                                    </select>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <nav>
                                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <?php foreach($categorias as $cat){  
                                            $nome = explode(" ", $cat['categoria_nome']); 
                                            if(count($nome) == 1 ){
                                                $place = 0;
                                            }else{
                                                $place = 1;
                                            }
                                        ?>
                                            <a class="nav-item nav-link" id="nav-<?php echo $nome[$place];?>-tab" data-toggle="tab" href="#nav-<?php echo $nome[$place];?>" role="tab" aria-controls="nav-<?php echo $nome[$place];?>" aria-selected="true"><?php echo $cat['categoria_nome'];?></a>
                                        <?php }?>
                                      </div>
                                    </nav>
                                    <div class="tab-content col-md-12" id="nav-tabContent" style="margin-bottom: 20px">
                                        <?php $aux=1; foreach($categorias as $cat){
                                            $nome = explode(" ", $cat['categoria_nome']); 
                                            if(count($nome) == 1 ){
                                                $place = 0;
                                            }else{
                                                $place = 1;
                                            }
                                        ?>
                                            <div style="margin-top: 20px" class="tab-pane fade" id="nav-<?php echo $nome[$place];?>" role="tabpanel" aria-labelledby="nav-<?php echo $nome[$place];?>-tab">
                                                <select class="multi-select-box" id="multiple-<?php echo $aux; $aux++;?>" name="itens[]" multiple="multiple"  style="width: 100%!important">
                                                    <?php foreach($itens as $itn){ if($cat['categoria_id'] == $itn['item_categoria_id']){?>
                                                        <option value="<?php echo $itn['item_id']?>"><?php echo $itn['item_nome']?></option>
                                                    <?php }}?>
                                                </select>
                                            </div>
                                        <?php }?>             
                                    </div>
                                    
                                </div>
                                <br><br>
                                <div class="col-md-3">
                                    <h4 class="form-check-label">Chave</h4>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-input" width="auto" type="text" value="<?php echo $chave;?>" id="chave" name="chave" style="width:95%;">
                                </div>
                                <br>
                                <div class="modal-footer" style="position: relative">
                                    <button class="btn btn-primary" type="submit" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">Salvar</button>
                                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            </div>
            
            <div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="modalAtivarTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja reativar a função?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('cadastros/ativarFuncao') ?>" method="post">
                                        <input type="hidden" name="funcao_idatv" id="funcao_idatv">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir a função?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('cadastros/apagarFuncao') ?>" method="post">
                                        <input type="hidden" name="funcao_id" id="funcao_id">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <link rel="stylesheet" href="<?php echo base_url('resources/lib/multi-select-box/dist/') ?>css/bootstrap-multiselect.css" type="text/css">
            <script type="text/javascript" src="<?php echo base_url('resources/lib/multi-select-box/dist/') ?>js/bootstrap-multiselect.js"></script>
            
            <div class="modal fade" id="erroModal" tabindex="-1" role="dialog" aria-labelledby="erroModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chave já usada e ativa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="modal-body">
                        A chave utilizada no checklist já foi utilizada e encontra-se ativa no sistema. Finalize o checklist antes de utilizar novamente a chave.
                        Ou cadastre com uma nova chave.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                    </div>
                </div>
            </div>
            
            
            <style>
                .btn-group{
                    width: 100%;
                }
            
                button.multiselect.dropdown-toggle.custom-select{
                    padding: 5px 10px;
                    height: auto;
                    border: 1px solid grey;
                    border-radius: 5px;
                }
                
                span.multiselect-selected-text{
                    font-size: 14px;
                }
                
                .multiselect-container.dropdown-menu{
                    width: 100%;
                }
                
                span.form-check{
                    padding: 0!important;
                }
                
                label.form-check-label.font-weight-bold, label.form-check-label{
                    margin-left: 18px;
                }
            </style>

            <script>
                $(document).ready(function(){
                    $('#myTableFunc').DataTable( {
                        "order": [[ 0, "asc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_",
                            "zeroRecords": "Nada encontrado- refaça sua busca",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "Sem registros disponíves",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "searchPlaceholder": "Digite sua busca",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"Categoria": "first", "orderable": true},
                            {"Item": "second", "orderable": false},
                            {"Imagem": "third", "orderable": false},
                            {"Ação": "fourth", "orderable": false},
                        ],
                    } );
                    $('select[name ="myTableFunc_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableFunc_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    $('.multi-select-box').multiselect({
                        enableFiltering: true,
                        includeSelectAllOption: true,
                        filterPlaceholder: 'Procurar...',
                        nonSelectedText: 'Nenhum selecionado',
                        allSelectedText: 'Todos selecionados',
                        nSelectedText: 'selecionados',
                        selectAllText:' Selecionar todos',
                        numberDisplayed: 1,
                    });
                });
            </script>
            
            <script>
                <?php if($this->session->userdata('erro') == 1){?>
                        $(document).ready(function() {
                            $('#erroModal').modal('show');
                        });
                <?php }?>
                
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2({
                        dropdownParent: $('#modalCheckList'),
                        multiple: true,
                        minimumResultsForSearch: -1,
                    });
                
                    $('.js-example-basic-single').select2({dropdownParent: $('#modalCheckList')});
                });
                
                function setaExcluir(id){
                    document.getElementById('funcao_id').value = id;
                }
                function setaAtivar(id){
                    document.getElementById('funcao_idatv').value = id;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
                
            </script>
            
            <script>
                $('.btn-modal-toggle').on('click', function(){
                    $("#modalFuncao").modal('hide');
                    var button = $(this);
                    var recipient = button.data('funcao');
                
                    var dados = {
                            'funcao_id': recipient
                        };
                    $.ajax({
                        url : '<?php echo base_url('cadastros/getFuncaoById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                            
                            $("#text-nome").html(res.funcao_nome);
                            var permissaoTexto = "<table class='table table-hover table-bordered'>"
                                    +"<thead>"
            				            + "<tr>"
            				                + "<th style='width: 32%;'></th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Ver</th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Editar</th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Excluir</th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Ativar</th>"
            				            + "</tr>"
        				            + "</thead>"
        				            + "<tbody>";
        				            
                            var permissao = res.funcao_permissao;
                            var permissaoSplit = permissao.split('|');
                        
                            for(var i in permissaoSplit) {
                                permissaoTexto += "<tr>";
                                
                                var permissao = permissaoSplit[i];
                                var codPermissoes = permissao.split('-')[1];
                                
                                var nomeController = permissao.split('-')[0];
                                
                                permissaoTexto += "<th style='border-right: 1px solid black;'>" + nomeController + "</th>";
                                
                                for(var i=0; i<4; i++){
                                    if(codPermissoes.charAt(i) == '0'){
                                        permissaoTexto += "<th style='text-align: center; border: 1px solid black;'><i class='fas fa-times text-danger'></i></th>";
                                    }else { 
                                        permissaoTexto += "<th style='text-align: center; border: 1px solid black;'><i class='fas fa-check text-success'></i></th>";
                                    } 
                                }
                                
                                permissaoTexto += "</tr>";
                            }
                            
                            permissaoTexto += "</tbody></table>";
                            
                            $("#text-permissao").html(permissaoTexto);
                            $("#modalFuncoes").modal('show');
                            
                        },
                        error : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(status + " " + error + " " + err);
                        }
                    });
                });
            </script>
            
            <script>
                $('#senha_btn').on('click', function(){
                    const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            