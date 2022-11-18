        
            <style>
                .tableFixHead          { overflow-y: auto; height: 500px; padding-left: 15px; }
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
                .select2{
                    width: 100%;
                }
            </style>
        
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Listagem de Tipos de Movimento</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Estoque</li>
                                    <li class="breadcrumb-item">Tipos de Movimento</li>
                                    <li class="breadcrumb-item active" aria-current="page">Listagem</li>
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
                        
                        <div>
                            <a style= "margin-bottom: 30px;" class="btn btn-primary" data-toggle="modal" data-target="#addTipo">Adicionar Tipo</a>

                            <!-- validação de permissão -->
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                        </div>
                        
                        <div class="tableFixHead">
                            <table id="myTableTipos" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 68%">Nome</th>
                                        <th style="width: 12%">Tipo</th>
        					            <th style="width: 20%">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tipos as $tp){ ?>
                                    <tr <?php if($tp['tm_ativo_id'] == 2){echo "style='background-color: #ff0000; color:white'";} ?>>
                                        <td><?php echo $tp['tm_nome'] ?></td>
                                        <td><?php echo $tp['tm_tipo'] ?></td>
                                        <td class="text-center">
                                            <?php if($tp['tm_ativo_id'] == 1){ ?>
                                            <button type="button" class="btn btn-primary" onclick="setVer(<?php echo $tp['tm_id'] ?>)"><em class="fa fa-eye"></em></button>
                                            &nbsp;&nbsp;
                                            <?php } ?>
                                            <button type="button" class="btn btn-primary" onclick="setField('edit', <?php echo $tp['tm_id'] ?>)"><em class="fa fa-pen"></em></button>
                                            <?php if($tp['tm_ativo_id'] == 1){ ?>
                                            &nbsp;&nbsp;
                                            <button type="button" class="btn btn-danger" onclick="setRmv(<?php echo $tp['tm_id'].", ".$tp['tm_possui_movimento'] ?>)"><em class="fa fa-trash"></em></button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <div class="modal fade" id="addTipo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Tipo de Movimento</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideModal('add')" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('estoque/novoTipo') ?>" method="post">

                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome</label><br>
                                        <input type="text" class="form-control" name="nome_add" id="nome_add" placeholder="Nome" required>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Tipo</label><br>
                                        <select  style="width: 100%!important" class="select2-custom" name="tipo_add" id="tipo_add" required>
                                            <option value="" selected disabled>-- Selecione --</option>
                                            <option value="ENTRADA">Entrada</option>
                                            <option value="SAIDA">Saída</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <div class="col-md-10" style="padding-left: 0">
                                            <label>Movimenta Estoque?</label><br>
                                            <label>Devolução?</label><br>
                                            <label>Nota Fiscal?</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="checkbox" name="movimenta_add" id="movimenta_add" value="1"><br>
                                            <input type="checkbox" name="devolucao_add" id="devolucao_add" value="1"><br>
                                            <input type="checkbox" name="nota_add" id="nota_add" value="1">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="hideModal('add')">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="editTipo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Editar Tipo de Movimento</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideModal('edit')" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('estoque/editaTipo') ?>" method="post">
                            <input type="hidden" name="id_edit" id="id_edit">

                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome</label><br>
                                        <input type="text" class="form-control" name="nome_edit" id="nome_edit" placeholder="Nome" required>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Tipo</label><br>
                                        <select  style="width: 100%!important" class="select2-custom" name="tipo_edit" id="tipo_edit" required>
                                            <option value="" selected disabled>-- Selecione --</option>
                                            <option value="ENTRADA">Entrada</option>
                                            <option value="SAIDA">Saída</option>
                                        </select>
                                        <br>
                                        <label>Ativo</label><br>
                                        <select  style="width: 100%!important" class="select2-custom" name="ativo_edit" id="ativo_edit" required>
                                            <option value="" selected disabled>-- Selecione --</option>
                                            <option value="1">Ativo</option>
                                            <option value="2">Inativo</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <div class="col-md-10" style="padding-left: 0">
                                            <label>Movimenta Estoque?</label><br>
                                            <label>Devolução?</label><br>
                                            <label>Nota Fiscal?</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="checkbox" name="movimenta_edit" id="movimenta_edit" value="1"><br>
                                            <input type="checkbox" name="devolucao_edit" id="devolucao_edit" value="1"><br>
                                            <input type="checkbox" name="nota_edit" id="nota_edit" value="1">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="hideModal('edit')">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="rmvTipo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Excluir Tipo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o tipo?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('estoque/deletaTipo') ?>" method="post">
                                        <input type="hidden" name="id_rmv" id="id_rmv">
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
            
            <div class="modal fade" id="verTipo" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Ver Tipo de Movimento</h4>
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
                                <div class="col-md-10 form-group">
                                    <label>Nome</label><br>
                                    <input type="text" class="form-control" id="nome_ver" readonly>
                                </div>
                                <div class="col-md-2 form-group" style="padding-top: 25px;">
                                    <button type="button" id="ativo_ver"></button>
                                </div>
                                
                                <div class="col-md-5 form-group">
                                    <label>Tipo</label><br>
                                    <input type="text" class="form-control" id="tipo_ver" readonly>
                                </div>
                                
                                <div class="col-md-7 form-group">
                                    <div class="col-md-9">
                                        <label>Movimenta Estoque?</label>
                                        <br>
                                        <label>Devolução?</label>
                                        <br>
                                        <label>Nota Fiscal?</label>
                                    </div>
                                    <div class="col-md-3">
                                        <label id="movimento_ver"></label>
                                        <br>
                                        <label id="devolucao_ver"></label>
                                        <br>
                                        <label id="nota_ver"></label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.select2-custom').select2({theme: "bootstrap"});

                    $('#myTableTipos').DataTable( {
                        "order": [[ 0, "asc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ registros por página",
                            "zeroRecords": "Nenhum registro encontrado",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"Nome": "first", "orderable": true},
                            {"Tipo": "second", "orderable": true},
                            {"Ações": "third", "orderable": false},
                        ],
                    });
                    $('select[name ="myTableTipos_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableTipos_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    
                    <?php if($erro != null){ ?>
                    Swal.fire(
                        'Erro',
                        'Não foi possivel excluir o tipo pois a senha inserida estava incorreta!',
                        'error'
                    )
                    <?php } ?>
                });
            </script>
            
            <script>
                $('#addTipo').on('hidden.bs.modal', function () {
                    hideModal('add');
                });
                
                $('#editTipo').on('hidden.bs.modal', function () {
                    hideModal('edit');
                });
            
                function hideModal(type){
                    $('#'+type+'Tipo').modal('hide');
                    
                    $('#nome_'+type).val("");
                    $('#tipo_'+type).val("").change();
                    $('#movimenta_'+type).prop('checked', false);
                    $('#devolucao_'+type).prop('checked', false);
                    $('#nota_'+type).prop('checked', false);
                }
                
                function setField(type, id){
                    $('#id_'+type).val(id);
                    
                    if(type == 'edit'){
                        dados = new FormData();
                        dados.append('id', $('#id_edit').val());
                        $.ajax({
                            url: '<?php echo base_url('estoque/getTipo'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert('setField(type, id): '+xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    tipo = jQuery.parseJSON(data);
                                    
                                    if(tipo.tm_possui_movimento == 0){
                                        $('#nome_edit').val(tipo.tm_nome);
                                        $('#tipo_edit').val(tipo.tm_tipo).change();
                                        $('#ativo_edit').val(tipo.tm_ativo_id).change();
                                        
                                        if(tipo.tm_movimenta_estoque == 1){
                                            $('#movimenta_edit').prop('checked', true);
                                        }
                                        if(tipo.tm_nota_fiscal == 1){
                                            $('#nota_edit').prop('checked', true);
                                        }
                                        if(tipo.tm_devolucao == 1){
                                            $('#devolucao_edit').prop('checked', true);
                                        }
                                        $('#editTipo').modal('show');
                                    }else{
                                        Swal.fire(
                                            'Erro',
                                            'Não é possível fazer alterações neste item, pois há movimentos cadastros com ele, exlcua os movimentos para poder editar este item!',
                                            'error'
                                        )
                                    }
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }
                }
            </script>
            
            <script>
                function setRmv(id, possui){
                    if(possui == 0){
                        $('#id_rmv').val(id);
                        $('#rmvTipo').modal('show');
                    }else{
                        Swal.fire(
                            'Erro',
                            'Não é possível fazer alterações neste item, pois há movimentos cadastros com ele, exclua os movimentos para poder excluir este item!',
                            'error'
                        )
                    }
                }
            
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                function e_senha(){
                    $('#formsenha').css('display', 'none');
                    $('#senha').val("");
                }
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
                function setVer(id){
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('estoque/getTipo'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('setVer(id): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data != "null" && data != "" && data != " " && data != null){
                                tipo = jQuery.parseJSON(data);
                                
                                $('#nome_ver').val(tipo.tm_nome);
                                $('#tipo_ver').val(tipo.tm_tipo);
                                
                                if(tipo.tm_movimenta_estoque == 1){
                                    $('#movimento_ver').html('Sim');
                                }else{
                                    $('#movimento_ver').html('Não');
                                }
                                
                                if(tipo.tm_nota_fiscal == 1){
                                    $('#nota_ver').html('Sim');
                                }else{
                                    $('#nota_ver').html('Não');
                                }
                                
                                if(tipo.tm_devolucao == 1){
                                    $('#devolucao_ver').html('Sim');
                                }else{
                                    $('#devolucao_ver').html('Não');
                                }
                                
                                if(tipo.tm_ativo_id == 1){
                                    $('#ativo_ver').addClass('btn btn-success').prop('disabled', true).html('Ativo');
                                }else{
                                    $('#ativo_ver').addClass('btn btn-danger').prop('disabled', true).html('Inativo');
                                }
                                
                                $('#verTipo').modal('show');
                            }else{
                                alert("Erro no banco");
                            }
                        },
                    });
                }
            </script>
            