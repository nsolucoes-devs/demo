            <style>
                .tableFixHead          { overflow-y: auto; height: 450px; padding-right: 10px;}
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
                    margin-right: 30px;
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
                    .swal2-popup.swal2-modal.swal2-show{
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
            </style>
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">

                    <?php if($this->session->userdata('editar') == 1 ){?>
                        <div style="padding-bottom: 1%;">
                            
                            <a href="<?php echo base_url('cadastrarfuncao') ?>" class="btn btn-primary" style='color: white'>Nova Função</a>
                            
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            
                        </div>
                    <?php }?>
                        
                        <div class="input-group-append" style="position: absolute; right: 49px; height: 5.5%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        
                        <div class="tableFixHead">
        				    <table id="myTableFunc" class="table table-hover table-bordered">
        				        <thead>
        				            <tr>
        				                <th style="width: 79%">Funções</th>
        				                
        				                <th style="width: 21%">Ação</th>
        				                
        				                
        				            </tr>
        				        </thead>
        				        <tbody>
        				            <?php foreach($funcoes as $funcao){ 
                                        if($this->session->userdata('ativar') == 1 ){?>                                       
                                          <?php if($this->session->userdata('ativar') == 1){ ?>
                				            <tr <?php if($funcao['funcao_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                				                <td style="padding-top: 12px!important;"><?php echo ucwords(strtolower($funcao['funcao_nome'])); ?></td>
                				                <?php if($funcao['funcao_ativo_id'] != 2) { ?>
                				                <td class="text-center">
                				                    <?php if($this->session->userdata('ver') == 1 ){?>
                			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalFuncao" data-funcao="<?php echo $funcao['funcao_id'] ?>" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
                			                        <?php }?>
                			                        <?php if($this->session->userdata('editar') == 1 ){?>
                			                        <a href="<?php echo base_url('editarfuncao/') . $funcao['funcao_id'] ?>" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
                			                        <?php }?>
                			                        <?php if($this->session->userdata('excluir') == 1 ){?>
                			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="setaExcluir('<?php echo $funcao['funcao_id'] ?>')"><i class="fas fa-trash"></i></i></a>
                			                        <?php }?>
                			                    </td>
                			                    <?php } else { ?>
                    			                    <td class="text-center">
                        			                    <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $funcao['funcao_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                    			                    </td>
                			                    <?php } ?>
                				            </tr>
        				            <?php }else{
        				                        if($funcao['funcao_ativo_id'] == 1){?>
        				                    <tr>
                				                <td style="padding-top: 12px!important;"><?php echo $funcao['funcao_nome']; ?></td>
                				                <td style="text-align: center;">
                				                    <?php if($this->session->userdata('ver') == 1 ){?>
                			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalFuncao" data-funcao="<?php echo $funcao['funcao_id'] ?>" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
                			                        <?php }?>
                			                        <?php if($this->session->userdata('editar') == 1 ){?>
                			                        <a href="<?php echo base_url('cadastros/novaFuncao/') . $funcao['funcao_id'] ?>" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
                			                        <?php }?>
                			                        <?php if($this->session->userdata('excluir') == 1 ){?>
                			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="setaExcluir('<?php echo $funcao['funcao_id'] ?>')"><i class="fas fa-trash"></i></i></a>
                			                        <?php }?>
                			                    </td>
                				            </tr>
        				            <?php } } }else{?>
        				                <tr>
            				                <td style="padding-top: 12px!important;"><?php echo $funcao['funcao_nome']; ?></td>
            				                <td style="text-align: center;">
            				                    <?php if($this->session->userdata('ver') == 1 ){?>
            			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalFuncao" data-funcao="<?php echo $funcao['funcao_id'] ?>" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
            			                        <?php }?>
            			                        <?php if($this->session->userdata('editar') == 1 ){?>
            			                        <a href="<?php echo base_url('cadastros/novaFuncao/') . $funcao['funcao_id'] ?>" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
            			                        <?php }?>
            			                        <?php if($this->session->userdata('excluir') == 1 ){?>
            			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="setaExcluir('<?php echo $funcao['funcao_id'] ?>')"><i class="fas fa-trash"></i></i></a>
            			                        <?php }?>
            			                    </td>
            				            </tr>
        				            <?php } }?>
        				        </tbody>
        				    </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
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
                            {"Funções": "first", "orderable": true},
                            {"Ação": "second", "orderable": false},
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
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Função excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possivel excluir a funcao pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Função reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar a funcao pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
                });
            </script>
            
            <script>
                function setaExcluir(id){
                    document.getElementById('funcao_id').value = id;
                }
                function setaAtivar(id){
                    document.getElementById('funcao_idatv').value = id;
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
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
            