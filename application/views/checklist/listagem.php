            <style>
                .tableFixHead          { overflow-y: auto; height: 450px;}
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
                        <div style="margin-bottom: 10px">
                            <a class="btn btn-primary" style='color: white' data-toggle="modal" data-target="#modalCategoria" >Nova Categoria</a>
                            <a class="btn btn-primary" style='color: white' data-toggle="modal" data-target="#modalItem" >Novo Item</a>
                        </div>
                    <?php }?>
                        <?php if($erro != null){ ?>
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <h3 class="text-danger">Erro: A senha informada estava incorreta, por favor tente novamente!</h3>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <div class="input-group-append" style="position: absolute; right: 55px; height: 5.6%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        
                        <div class="tableFixHead">
        				    <table id="myTableFunc" class="table table-hover table-bordered">
        				        <thead>
        				            <tr>
        				                <th style="width: 35%">Categoria</th>
        				                <th style="width: 35%">Item</th>
        				                <th style="width: 15%">Imagem</th>
        				                <th style="width: 15%">Ações</th>
        				            </tr>
        				        </thead>
        				        <tbody>
        				            <?php foreach($itens as $itm){ ?>
                				            <tr>
                				                
                				                <td style="vertical-align: middle;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($itm['item_categoria_id']));?>">
                                                        <?php echo ucwords(strtolower($itm['item_categoria_id'])) ?>
                                                    </div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($itm['item_nome']));?>">
                                                        <?php echo ucwords(strtolower($itm['item_nome'])) ?>
                                                    </div>
                                                </td>
                				                <td style="padding-top: 12px!important;"><?php if($itm['item_foto'] == 1){ echo ucwords(strtolower("SIM"));}else{ echo ucwords(strtolower("NÃO"));}?></td>
                				                <td>
                			                        <?php if($this->session->userdata('excluir') == 1 ){?>
                			                            <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="setaExcluir('<?php echo $itm['item_id']; ?>')"><i class="fas fa-trash"></i></i></a>
                			                        <?php }?>
                			                        <?php if($this->session->userdata('ativar') == 1 ){?>
                			                            <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $itm['item_id']; ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                			                        <?php }?>
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
            <div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="modalItemTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <form action="<?php echo base_url('checklist/novoitem');?>" method="post">
                            <div class="modal-body">
                                <h4>Informar a novo Item</h4>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label id="item">Nome do Item</label>
                                        <input class="form-control" name="item" id="item" type="text" placeholder="Nome do Item">
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label id="importancia">Nível de Importância</label>
                                        <input class="form-control" name="importancia" id="importancia" type="number" placeholder="Nível de Importância" min="1" max="99">
                                    </div>
                                    <div class="col-md-7 form-group">
                                        <label id="categoria_id">Categoria</label>
                                        <select class="js-example-basic-multiple selectcadastroitem-filtro"  style="width: 100%!important" name="categoria_id" id="categoria_id" required>
                                            <option id="ativo-placeholder" selected>-- Selecionar --</option>
                                            <?php foreach($categorias as $ctg){?>
                                            <option value="<?php echo $ctg['categoria_id']?>"><?php echo $ctg['categoria_nome'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group text-center">
                                        <label>Aceita Foto?</label><br>
                                        <input type="checkbox" id="foto" name="foto" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="position: relative">
                                <button class="btn btn-primary" type="submit" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">Salvar</button>
                                <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="modalCategoriaTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <form action="<?php echo base_url('checklist/novacategoria');?>" method="post">
                        <div class="modal-body">
                            <h4>Informar a nova Categoria</h4>
                            <div class="row">
                                <div class="col-md-7">
                                    <label id="categoria">Categória</label>
                                    <input class="form-control" name="categoria" id="categoria" type="text" placeholder="Nome da Categoria">
                                </div>
                                <div class="col-md-5">
                                    <label id="importancia">Nível de Importância</label>
                                    <input class="form-control" name="importancia" id="importancia" type="number" placeholder="Nível de Importância" min="1" max="10">
                                </div>    
                            </div>
                        
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" type="submit" style="position: absolute; top: 15px; left: 15px; color: white; float: left">Salvar</button>
                            <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
                                    <form action="<?php echo base_url('checklist/reativar') ?>" method="post">
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
                                    <form action="<?php echo base_url('checklist/desativar') ?>" method="post">
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
            
            <div class="modal fade" id="modalFuncao" tabindex="-1" role="dialog" aria-labelledby="modalFuncao" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="text-nome" name="text-nome">Funcao</h4>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body" style="background-color: white; padding-bottom: 0px">
                            <div class="row">
                                <div class="col-md-12" id="text-permissao">
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                    $('.selectcadastroitem-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalItem')});
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
                });
            </script>
            
            <script>
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
            