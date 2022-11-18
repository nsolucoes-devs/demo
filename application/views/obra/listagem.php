        
            <style>
                .tableFixHead          { overflow-y: auto; height: auto;}
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
                .dataTables_filter {
                position: relative;
                }

                .dataTables_filter input {
                    width: 250px;
                    height: 32px;
                    background: #fcfcfc;
                    border: 1px solid #aaa;
                    border-radius: 5px;
                    box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
                    text-indent: 10px;
                }

                .dataTables_filter .fa-search {
                    position: absolute;
                    top: 10px;
                    left: auto;
                    right: 10px;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <?php if($this->session->userdata('editar')) { ?>
                        <div style="margin-bottom: 10px">
                            <a href="<?php echo base_url('cadastroobras'); ?>" class="btn btn-primary" style='color: white'>Nova Obra</a>
                            &nbsp;&nbsp;<a class="btn btn-primary"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                            <?php if($this->session->userdata('ativar')){ ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        
                        <!-- <div class="input-group-append" style="position: absolute; right: 41px;height: 3.6%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div> -->
                        
                        <div class="tableFixHead">
                            <table id="myTableFrota" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="d-none"></th>
                                        <th style="width: 60%">Nome</th>
                                        <th style="width: 10%">Cidade</th>
                                        <th style="width: 10%">Estado</th>
                                        <th style="width: 20%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php print_r($obras) ?>
                                    <?php foreach ($obras as $i => $obra) : ?>
                                        <tr>
                                            <td class="d-none"><?= $i ?></td>
                                            <td class="text-center"><?= $obra['obra_nome'] ?></td>
                                            <td class="text-center"><?= $obra->obra_cidade ?></td>
                                            <td class="text-center"><?= $obra->obra_estado ?></td>
           
                                            <td class="text-center">
                                                <a style="font-size: 12px" href="<?= base_url('ativos/edit/') . $obra->obra_id ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                <a onclick="destroyObra(<?= $obra->obra_id ?>)" style="font-size: 12px" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            

            <script>
                $(document).ready(function(){
                    $('.select2-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalFiltro')});
                    $('#myTableFrota').DataTable( {
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
                            {"Veículo": "first", "orderable": true},
                            {"Placa": "second", "orderable": true},
                            {"Frota": "third", "orderable": true},
                            {"Ação": "fourth", "orderable": false},
                        ],
                    });
                    $('select[name ="myTableFrota_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableFrota_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Veículo excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possível excluir o veículo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Veículo reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar o veículo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>

                    $('[type=search]').each(function() {
                        $(this).attr("placeholder", "Pesquisar...");
                        $(this).before('<span class="fa fa-search" id="basic-addon2"></span>');
                    });

                });
            </script>
            
            <script>
                function setaExcluir(id){
                    $('#idfrota').val(id);
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('veiculo_idatv').value = id;
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
                
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                
                function hideExc(){
                    $('#senha').val('');
                    $('#senha').prop('type', 'password');
                    $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    $('#formsenha').css('display', 'none');
                    $('#excEst').modal('hide');
                }
                
                $('#excEst').on('hidden.bs.modal', function () {
                    hideExc();
                });
            </script>
            
            <script>
                function hideFiltro(){
                    $('#filtro_marca').val('').change();
                    $('#filtro_situacao').val('').change();
                    $('#modalFiltro').modal('hide');
                }
                $('#modalFiltro').on('hidden.bs.modal', function () {
                    hideFiltro();
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