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
                            <?php if($this->session->userdata('editar') == 1) { ?>
                            <a data-toggle="modal" data-target="#add" class="btn btn-primary" style='color: white'>Novo Grupo de Peças</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1) { ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                        
                        <div class="input-group-append" style="position: absolute; right: 55px; height: 4.4%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        
                        <div class="tableFixHead">
                            <table id="tableGrupo" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th style="width: 120px">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($grupos as $gp){ ?>
                                    <?php if($this->session->userdata('ativar') == 1) { ?>
                                        <tr <?php if($gp['gp_ativo_id'] == 2){ echo "style='color: #ff0000;'"; }?>>
                                            <td style="padding-top: 12px!important;"><?php echo ucwords(strtolower($gp['gp_nome'])) ?></td>
                                            <?php if($gp['gp_ativo_id'] != 2) { ?>
                                                <td class="text-center">
                                                    <?php if($this->session->userdata('editar') == 1) { ?>
                                                    <a onclick="edit(<?php echo $gp['gp_id'] ?>)" class="btn btn-primary"><em class="fa fa-pen"></em></a>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('excluir')){ ?>
                                                    <a onclick="del(<?php echo $gp['gp_id'] ?>)" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                                    <?php } ?>
                                                </td>
                                            <?php } else { ?>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $gp['gp_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } else if($gp['gp_ativo_id'] != 2) { ?>
                                        <tr>
                                            <td style="padding-top: 12px!important;"><?php echo $gp['gp_nome'] ?></td>
                                            <td class="text-center">
                                                <?php if($this->session->userdata('editar') == 1) { ?>
                                                <a onclick="edit(<?php echo $gp['gp_id'] ?>)" class="btn btn-primary"><em class="fa fa-pen"></em></a>
                                                <?php } ?>
                                                <?php if($this->session->userdata('excluir')){ ?>
                                                <a onclick="del(<?php echo $gp['gp_id'] ?>)" class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <!-- modalReativar -->
            <div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="modalAtivarTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja reativar o grupo?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('produtos/ativarGrupo') ?>" method="post">
                                        <input type="hidden" name="grupo_idatv" id="grupo_idatv">
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
            
            
            <div class="modal fade modal-not-del" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Novo Grupo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('produtos/novoGrupo') ?>" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Grupo</label><br>
                                        <input type="text" class="form-control" name="nome" id="add_nome" placeholder="Nome" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade modal-not-del" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Editar Grupo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('produtos/editarGrupo') ?>" method="post">
                            <input type="hidden" id="edit_id" name="id">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label>Nome do Grupo</label><br>
                                        <input type="text" class="form-control" name="nome" id="edit_nome" placeholder="Nome" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Status</label><br>
                                        <select style="width: 100%!important" class="sel-edit" name="ativo" id="edit_ativo">
                                            <option value="1">Ativo</option>
                                            <option value="2">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="del" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Deletar Grupo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o grupo?</h4>
                        </div>
                        
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('produtos/deletarGrupo') ?>" method="post">
                                        <input type="hidden" name="id" id="del_id">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.sel-edit').select2({theme: "bootstrap", dropdownParent: $('#edit')});
                    $('#tableGrupo').DataTable( {
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
                            {"Nome": "first", "orderable": true},
                            {"Ação": "second", "orderable": false},
                        ],
                    } );
                    $('select[name ="tableGrupo_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#tableGrupo_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    
                    <?php if($valid == 1){
                        echo 
                        "Swal.fire(
                            '',
                            'Novo grupo criado com sucesso!',
                            'success'
                        )";
                    }else if($valid == 2){
                        echo 
                        "Swal.fire(
                            '',
                            'Grupo editado com sucesso!',
                            'success'
                        )";
                    }else if($valid == 3){
                        echo 
                        "Swal.fire(
                            '',
                            'Grupo excluido com sucesso!',
                            'success'
                        )";
                    }else if($valid == 4){
                        echo 
                        "Swal.fire(
                            'Erro',
                            'Não foi possivel excluir o grupo pois a senha inserida estava incorreta!',
                            'error'
                        )";
                    } else if($valid == 5){
                        echo 
                        "Swal.fire(
                            '',
                            'Grupo reativado com sucesso!',
                            'success'
                        )";
                    }else if($valid == 6){
                        echo 
                        "Swal.fire(
                            'Erro',
                            'Não foi possível reativar o grupo pois a senha inserida estava incorreta!',
                            'error'
                        )";
                    } ?>
                });
            </script>
            
            <script>
                function edit(id){
                    var grupos = <?php echo json_encode($grupos); ?>;
                    for(var i = 0; i < grupos.length; i++){
                        if(grupos[i].gp_id == id){
                            $('#edit_nome').val(grupos[i].gp_nome);
                            $('#edit_ativo').val(grupos[i].gp_ativo_id).change();
                            $('#edit_id').val(id);
                            $('#edit').modal('show');
                        }
                    }
                }
                
                $('.modal-not-del').on('hidden.bs.modal', function(){
                    $('#'+$(this).prop('id')+'_nome').val('');
                    $('#'+$(this).prop('id')).modal('hide');
                });
            </script>
            
            <script>
                function del(id){
                    $('#del_id').val(id);
                    $('#del').modal('show')
                }
                
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                
                function e_senha(){
                    $('#formsenha').css('display', 'none');
                    $('#senha').val("");
                }
                
                $('#del').on('hidden.bs.modal', function(){
                    e_senha();
                });
                
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
            
            <script>
                function setaAtivar(id){
                    document.getElementById('grupo_idatv').value = id;
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
            </script>
            