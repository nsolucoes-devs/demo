        
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
                        <div class="input-group-append" style="position: absolute; right: 55px; height: 4.4%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        
                        <div class="tableFixHead">
                            <table id="myTableFrota" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Ve??culo</th>
                                        <th style="width: 10%">N?? Frota</th>
                                        <th style="width: 10%">Placa</th>
                                        <th style="width: 20%">A????o</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="veic"></td>
                                        <td id="frota"></td>
                                        <td id="placa"></td>
                                        <td>
                                            <a style="font-size: 12px" href="" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            &nbsp;&nbsp;
                                            <a style="font-size: 12px" href="<?php echo base_url('vinculapneus') ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a> <!-- falta id do veiculo com dados -->
                                        </td>
                                    </tr>
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
            
            
            
            
            
            <div class="modal fade" id="modalVerVeic" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Ve??culo</h4>
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
                                <div class="col-md-6">
                                    <label> Frota: </label>
                                    <input id="frotaveic" name="frotaveic" class="form-control" value="frota" readonly> <!-- falta value -->
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <label> Eixo: </label>
                                        <input id="eixoveic" name="eixoveic" class="form-control" value="eixo" readonly> <!-- falta value -->
                                    </div>
                                    <div class="col-md-4">
                                        <label> Lado: </label>
                                        <input id="ladoroda" name="lado" class="form-control" value="direito" readonly> <!-- falta value -->
                                    </div>
                                    <div class="col-md-4">
                                        <label> Posi????o: </label>
                                        <input id="int_ext_roda" name="int_ext_roda" class="form-control" value="Interno" readonly> <!-- falta value -->
                                    </div>
                                </div>
                            </div>   
                                
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Sair</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                    $('.select2-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalFiltro')});
                    $('#myTableFrota').DataTable( {
                        "order": [[ 0, "asc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_",
                            "zeroRecords": "Nada encontrado- refa??a sua busca",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "Sem registros dispon??ves",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "searchPlaceholder": "Digite sua busca",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Pr??ximo",
                            }
                        },
                        "columns": [
                            {"Ve??culo": "first", "orderable": true},
                            {"Placa": "second", "orderable": true},
                            {"Frota": "third", "orderable": true},
                            {"A????o": "fourth", "orderable": false},
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
                            'Ve??culo exclu??do com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'N??o foi poss??vel excluir o ve??culo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Ve??culo reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'N??o foi poss??vel reativar o ve??culo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
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