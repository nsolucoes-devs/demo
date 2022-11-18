            
            <style>
                .tableFixHead          { overflow-y: auto; height: 600px;}
                .tableFixHead thead th { position: sticky; top: 0; }
                
                /* Just common table stuff. Really. */
                table  { border-collapse: collapse; width: 100%; }
                th, td { padding: 8px 16px; }
                th     { background:#eee; }
                
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
                        
                        <div style="margin-bottom: 10px">
                            <?php if($this->session->userdata('editar') == 1){ ?>
                            <a data-toggle="modal" data-target="#modalCadastro" class="btn btn-primary" style="color: white">Nova Marca</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1){ ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                        
                        <div class="input-group-append" style="position: absolute; right: 55px; height: 4.4%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        
                        <div class="tableFixHead">
                            <table id="myTableTipo" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome da Marca</th>
                                        <th style="width: 180px">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($marcas as $marca){ ?>
                                    <?php if($this->session->userdata('ativar') == 1){ ?>
                                    <tr <?php if($marca['frota_marca_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                                        <td style="padding-top: 12px!important;"><?php echo ucwords(strtolower(mb_strtoupper($marca['frota_marca_nome']))) ?></td>
                                        <?php if($marca['frota_marca_ativo_id'] != 2) { ?>
                                            <td class="text-center">
                                                <?php if($this->session->userdata('ver') == 1){ ?>
            			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $marca['frota_marca_id'] ?>)" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
            			                        <?php } ?>
            			                        <?php if($this->session->userdata('editar') == 1){ ?>
            			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $marca['frota_marca_id'] ?>)" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
            			                        <?php } ?>
            			                        <?php if($this->session->userdata('excluir') == 1){ ?>
            			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $marca['frota_marca_id'] ?>')"><i class="fas fa-trash"></i></i></a>
            			                        <?php } ?>
                                            </td>
                                        <?php } else { ?>
                                            <td class="text-center">
                                                <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $marca['frota_marca_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } else if($marca['frota_marca_ativo_id'] != 2){ ?>
                                    <tr>
                                        <td><?php echo mb_strtoupper($marca['frota_marca_nome']) ?></td>
                                        <td style="text-align: center">
                                            <?php if($marca['frota_marca_ativo_id'] == 1){ if($this->session->userdata('ver') == 1){ ?>
        			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $marca['frota_marca_id'] ?>)" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
        			                        &nbsp;&nbsp;
        			                        <?php } } ?>
        			                        <?php if($this->session->userdata('editar') == 1){ ?>
        			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $marca['frota_marca_id'] ?>)" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
        			                        <?php } ?>
        			                        <?php if($marca['frota_marca_ativo_id'] == 1){ if($this->session->userdata('excluir') == 1){ ?>
        			                        &nbsp;&nbsp;
        			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $marca['frota_marca_id'] ?>')"><i class="fas fa-trash"></i></i></a>
        			                        <?php } }} ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <!-- modalReativado -->
            <div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="modalAtivarTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja reativar a marca?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('frota/ativarMarca') ?>" method="post">
                                        <input type="hidden" name="marca_idatv" id="marca_idatv">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha_a" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn_a"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalCadastroLabel">Cadastro de Marca</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('frota/insertMarca') ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nome da Marca</label><br>
                                        <input type="text" class="form-control" id="nome_c" name="nome_c" placeholder="Ex.: Scania" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVerLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalVerLabel">Visualizar Marca</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label>Nome da Marca</label><br>
                                    <label id="nome_v" style="font-size: 16px; color: black"></label>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Ativo</label><br>
                                    <label id="ativo_v" style="font-size: 16px; color: black"></label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
            
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalEditarLabel">Edição de Marca</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('frota/insertMarca') ?>">
                            <input type="hidden" name="isedit" id="isedit" value="1"/>
                            <input type="hidden" name="id_e" id="id_e">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label>Nome da Marca</label><br>
                                        <input type="text" class="form-control" id="nome_e" name="nome_e" placeholder="Ex.: Truck" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Ativação</label>
                                        <select class="selecteditarmarca-filtro"  style="width: 100%!important" name="ativo_e" id="ativo_e" required>
                                            <?php foreach($ativos as $ativo){ ?>
                                                <option value="<?php echo $ativo['ativo_id'] ?>"><?php echo $ativo['ativo_tipo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalCadastroLabel">Excluir Marca</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <h4>Deseja realmente excluir a marca?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('frota/deleteMarca') ?>" method="post">
                                        <input type="hidden" name="idFrotaMarca" id="marca">
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

            <script>
                $(document).ready(function(){
                    $('.selecteditarmarca-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalEditar')});
                    $('#myTableTipo').DataTable( {
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
                            {"Nome da Marca": "first", "orderable": true},
                            {"Ação": "second", "orderable": false},
                        ],
                    } );
                    $('select[name ="myTableTipo_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableTipo_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Marca excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possivel excluir a marca pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Marca reativada com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar a marca pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
                });
            </script>
            
            <script>
                function ver(id){
                    
                    var dados = {
                        'frota_marca_id': id
                    };
                            
                    $.ajax({
                        url : '<?php echo base_url('frota/getMarcaById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                            $("#nome_v").html(res.frota_marca_nome);
                            
                            if(res.frota_marca_ativo_id == 2){
                                $("#ativo_v").html('Inativo');
                            }else{
                                $("#ativo_v").html('Ativo');
                            }
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
                function editar(id){
                    var dados = {
                        'frota_marca_id': id
                    };
                            
                    $.ajax({
                        url : '<?php echo base_url('frota/getMarcaById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                            $("#id_e").val(res.frota_marca_id);
                            $("#nome_e").val(res.frota_marca_nome);
                            $("#ativo_e").val(res.frota_marca_ativo_id).change();
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
            </script>
            
            <script>
                function excluir(id){
                    document.getElementById('marca').value = id;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('marca_idatv').value = id;
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
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
            
            <script>
                $('#senha_btn_a').on('click', function(){
                    const type = $('#senha_a').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha_a').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn_a').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn_a').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            