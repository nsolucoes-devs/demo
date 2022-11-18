<style>
    .tableFixHead {
        overflow-y: auto;
        height: auto;
    }

    .tableFixHead thead th {
        position: sticky;
        top: 0;
    }

    /* Just common table stuff. Really. */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        padding: 8px 16px;
    }

    th {
        background: #eee;
    }

    .main-row {
        padding-left: 10px;
        padding-right: 10px;
    }

    .main-col-12 {
        padding: 20px;
        background-color: white;
        border-radius: 5px;
    }

    .dataTables_wrapper .row {
        width: 101%;
        margin-bottom: 15px;
    }

    .pagination {
        margin-top: 0px;
    }

    .dataTables_length label select {
        margin-left: 10px;
        margin-right: 10px;
    }

    .row-c {
        width: 110%;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #033557;
        border-color: #033557;
    }

    .btn-primary:hover {
        background-color: #033557;
        border-color: #033557;
    }

    .btn-primary:focus {
        background-color: #033557;
        border-color: #033557;
    }

    .btn-primary:not(:disabled):not(.disabled).active,
    .btn-primary:not(:disabled):not(.disabled):active,
    .show>.btn-primary.dropdown-toggle {
        background-color: #033557;
        border-color: #033557;
    }

    .pagination>.active>a {
        background-color: #033557;
    }

    .pagination>.active>a:hover {
        background-color: #033557;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: white;
        border-color: white;
    }

    .btn-info-red {
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

    .btn-info-red:hover {
        color: black;
    }

    .swal2-title {
        font-size: 25px;
    }

    .swal2-content {
        font-size: 20px;
    }

    .swal2-styled.swal2-confirm {
        font-size: 15px;
    }

    @media (min-width: 500px) {
        .swal2-popup.swal2-modal.swal2-show {
            width: 40%;
        }
    }

    .see-pass {
        width: 10%;
        margin-left: -4px;
        margin-top: -2px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .passwd {
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
                    <?php if ($this->session->userdata('editar')) { ?>
                        <div style="margin-bottom: 10px">
                            <a href="<?php echo base_url('cadastroveiculo'); ?>" class="btn btn-primary" style='color: white'>Novo Veículo / Maquinário</a>
                            &nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" data-target="#modalFiltro"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                            <?php if ($this->session->userdata('ativar')) { ?>
                                <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                    <?php } ?>

                    <div class="input-group-append" style="position: absolute; right: 41px;height: 3.6%; z-index: 2;">
                        <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                    </div>

                    <div class="tableFixHead">
                        <table id="myTableFrota" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 60%">Veículo / Maquinário</th>
                                    <th style="width: 10%">Placa</th>
                                    <th style="width: 10%">Frota</th>
                                    <th style="width: 20%">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($frotas as $veiculo) { ?>
                                    <?php if ($this->session->userdata('ativar')) { ?>
                                        <tr <?php if ($veiculo['ativo_id'] == 2) {
                                                echo "style='color: red;'";
                                            } ?>>
                                            <td style="padding-top: 12px!important;"><?php echo ucwords(strtolower($veiculo['veiculo'])) ?></td>
                                            <td style="padding-top: 12px!important;"><?php echo $veiculo['placa'] ?></td>
                                            <td style="padding-top: 12px!important;"><?php echo $veiculo['frota'] ?></td>
                                            <?php if ($veiculo['ativo_id'] != 2) { ?>
                                                <td style="text-align: center">
                                                    <?php if ($this->session->userdata('ver')) { ?>
                                                        <a style="font-size: 12px" href="<?php echo base_url('mostrarveiculo/') . $veiculo['id'] ?>" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
                                                    <?php } ?>
                                                    <?php if ($this->session->userdata('editar')) { ?>
                                                        <a style="font-size: 12px" href="<?php echo base_url('editarveiculo/') . $veiculo['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    <?php } ?>
                                                    <?php if ($this->session->userdata('excluir')) { ?>
                                                        <a id="modalExcluirTitle" data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir(<?php echo $veiculo['id'] ?>)"><i class="fas fa-trash"></i></a>
                                                    <?php } ?>
                                                </td>
                                            <?php } else { ?>
                                                <td style="text-align: center">
                                                    <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $veiculo['id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <?php } else {
                                        if ($veiculo['ativo_id'] == 1) {
                                        ?>
                                            <tr>
                                                <td style="padding-top: 12px!important;"><?php echo $veiculo['veiculo'] ?></td> <!-- PLACA -->
                                                <td style="padding-top: 12px!important;"><?php echo $veiculo['placa'] ?></td> <!-- PLACA -->
                                                <td style="padding-top: 12px!important;"><?php echo $veiculo['frota'] ?></td> <!-- FROTA -->
                                                <td style="text-align: center">
                                                    <?php if ($this->session->userdata('ver') == 1) { ?>
                                                        <a style="font-size: 12px" href="<?php echo base_url('mostrarveiculo/') . $veiculo['id'] ?>" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
                                                        &nbsp;&nbsp;
                                                    <?php } ?>
                                                    <?php if ($this->session->userdata('editar') == 1) { ?>
                                                        <a style="font-size: 12px" href="<?php echo base_url('editarveiculo/') . $veiculo['id'] ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    <?php } ?>
                                                    <?php if ($this->session->userdata('excluir') == 1) { ?>
                                                        &nbsp;&nbsp;
                                                        <a id="modalExcluirTitle" data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir(<?php echo $veiculo['id'] ?>)"><i class="fas fa-trash"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                <?php }
                                    }
                                } ?>
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
                        <h4>Deseja reativar o veículo/maquinário?</h4>
                    </div>
                    <div class="modal-footer" style="position: relative">
                        <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                        <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                        <br><br>
                        <div class="row row-c" id="formsenha1" style="display: none">
                            <div class="col-md-12 text-center">
                                <form action="<?php echo base_url('frota/ativarVeiculo') ?>" method="post">
                                    <input type="hidden" name="veiculo_idatv" id="veiculo_idatv">
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

        <!-- modalExcluir -->
        <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="justify-content: unset; text-align: left">
                        <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                    </div>
                    <div class="modal-body">
                        <h4>Deseja realmente excluir o veículo/maquinário da frota?</h4>
                    </div>
                    <div class="modal-footer" style="position: relative">
                        <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                        <button class="btn btn-danger" data-dismiss="modal" onclick="hideExc()">&nbsp&nbspNão&nbsp&nbsp</button>
                        <br><br>
                        <div class="row row-c" id="formsenha" style="display: none">
                            <div class="col-md-12 text-center">
                                <form action="<?php echo base_url('frota/deleteFrota') ?>" method="post">
                                    <input type="hidden" name="idfrota" id="idfrota">
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

        <div class="modal fade" id="modalFrota" tabindex="-1" role="dialog" aria-labelledby="modalVerLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header" style="justify-content: unset; text-align: left">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="modal-title" id="modalVerLabel">Visualização de <p id="linha_v" style="display:inline; padding:0px; margin:0px;">Veículo / Maquinário</p> da Frota</h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="row row-c">
                            <div class="col-md-8 form-group">
                                <label style="font-size: 19px;">Veículo / Maquinário: </label><br>&nbsp;&nbsp;
                                <!-- marca - modelo (ano) -->
                                <label id="automovel_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-3 form-group">
                                <label style="font-size: 19px;">Frota: </label><br>&nbsp;&nbsp;
                                <label id="codigo_v" style="font-size: 16px; color: black">--</label>
                            </div>
                        </div>
                        <div class="row row-c">
                            <div class="col-md-8 form-group">
                                <label style="font-size: 19px;">Tipo de Pneus: </label><br>&nbsp;&nbsp;
                                <label id="pneu_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-2 form-group">
                                <label style="font-size: 19px;">Câmbio: </label><br>&nbsp;&nbsp;
                                <label id="cambio_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-2 form-group">
                                <label style="font-size: 19px;">Cor: </label><br>&nbsp;&nbsp;
                                <label id="cor_v" style="font-size: 16px; color: black">--</label>
                            </div>
                        </div>
                        <div class="row row-c">
                            <div class="col-md-4 form-group">
                                <label style="font-size: 19px;">Placa: </label><br>&nbsp;&nbsp;
                                <label id="placa_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="font-size: 19px;">Chassi: </label><br>&nbsp;&nbsp;
                                <label id="chassi_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="font-size: 19px;">Renavam: </label><br>&nbsp;&nbsp;
                                <label id="renavam_v" style="font-size: 16px; color: black">--</label>
                            </div>
                        </div>
                        <div class="row row-c">
                            <div class="col-md-6 form-group">
                                <label style="font-size: 19px;">Tipo de Gabine: </label><br>&nbsp;&nbsp;
                                <label id="tipogabine_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <label style="font-size: 19px;">Tipo de Munck: </label><br>&nbsp;&nbsp;
                                <label id="tipomunck_v" style="font-size: 16px; color: black">--</label>
                            </div>
                        </div>
                        <div class="row row-c">
                            <div class="col-md-6 form-group">
                                <label style="font-size: 19px;">Última quilometragem: </label><br>&nbsp;&nbsp;
                                <label id="km_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <label style="font-size: 19px;">Peso/Tara (Ton.): </label><br>&nbsp;&nbsp;
                                <label id="tara_v" style="font-size: 16px; color: black">--</label>
                            </div>
                        </div>
                        <div class="row row-c">
                            <div class="col-md-6 form-group">
                                <label style="font-size: 19px;">Status/Situação: </label><br>&nbsp;&nbsp;
                                <label id="status_v" style="font-size: 16px; color: black">--</label>
                            </div>
                            <div class="col-md-6 form-group">
                                <label style="font-size: 19px;">Ativação: </label><br>&nbsp;&nbsp;
                                <label id="ativo_v" style="font-size: 16px; color: black">--</label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <div class="row row-c">
                            <div class="col-md-10">
                                <h4 class="modal-title">Filtros</h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <button type="button" class="close" onclick="hideFiltro()" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <form action="<?php echo base_url('relatorioveiculos'); ?>" method="post" target="_blank">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Situação</label><br>
                                    <select style="width: 100%!important" class="select2-filtro" id="filtro_situacao" name="status">
                                        <option value="">-- Todas --</option>
                                        <?php foreach ($situacoes as $sit) {
                                            echo "<option value='" . $sit['frota_status_id'] . "'>" . $sit['frota_status_nome'] . "</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Marcas</label><br>
                                    <select style="width: 100%!important" class="select2-filtro" id="filtro_marca" name="marca">
                                        <option value="">-- Todas --</option>
                                        <?php foreach ($marcas as $mc) {
                                            echo "<option value='" . $mc['frota_marca_id'] . "'>" . $mc['frota_marca_nome'] . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="hideFiltro()">Cancelar</button>
                            &nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">Gerar PDF</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('.select2-filtro').select2({
                    theme: "bootstrap",
                    dropdownParent: $('#modalFiltro')
                });
                $('#myTableFrota').DataTable({
                    "order": [
                        [0, "asc"]
                    ],
                    "language": {
                        "lengthMenu": "Mostrando _MENU_",
                        "zeroRecords": "Nada encontrado- refaça sua busca",
                        "info": "Mostrando _PAGE_ de _PAGES_",
                        "infoEmpty": "Sem registros disponíves",
                        "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                        "sSearch": "Procurar:",
                        "searchPlaceholder": "Digite sua busca",
                        "paginate": {
                            "previous": "Anterior",
                            "next": "Próximo",
                        }
                    },
                    "columns": [{
                            "Veículo": "first",
                            "orderable": true
                        },
                        {
                            "Placa": "second",
                            "orderable": true
                        },
                        {
                            "Frota": "third",
                            "orderable": true
                        },
                        {
                            "Ação": "fourth",
                            "orderable": false
                        },
                    ],
                });
                $('select[name ="myTableFrota_length"]').select2({
                    minimumResultsForSearch: -1,
                    theme: "bootstrap"
                });
                $('#myTableFrota_length').find('.select2').css({
                    'margin-right': '10px',
                    'margin-left': '10px',
                    'text-align': 'center',
                });
                <?php
                if ($erro == 1) {
                    echo "Swal.fire(
                            '',
                            'Veículo excluído com sucesso!',
                            'success'
                            )";
                } else if ($erro == 2) {
                    echo "Swal.fire(
                            '',
                            'Não foi possível excluir o veículo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                } else if ($erro == 3) {
                    echo "Swal.fire(
                            '',
                            'Veículo reativado com sucesso!',
                            'success'
                            )";
                } else if ($erro == 4) {
                    echo "Swal.fire(
                            '',
                            'Não foi possível reativar o veículo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                }
                ?>
            });
        </script>

        <script>
            function setaExcluir(id) {
                $('#idfrota').val(id);
            }

            function senha() {
                document.getElementById('formsenha').style.display = "block";
            }

            function setaAtivar(id) {
                document.getElementById('veiculo_idatv').value = id;
            }

            function senha1() {
                document.getElementById('formsenha1').style.display = "block";
            }
        </script>

        <script>
            $('#senha_btn').on('click', function() {
                const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                $('#senha').prop('type', type);
                if (type == "text") {
                    $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });

            function senha() {
                $('#formsenha').css('display', 'block');
            }

            function hideExc() {
                $('#senha').val('');
                $('#senha').prop('type', 'password');
                $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                $('#formsenha').css('display', 'none');
                $('#excEst').modal('hide');
            }

            $('#excEst').on('hidden.bs.modal', function() {
                hideExc();
            });
        </script>

        <script>
            function hideFiltro() {
                $('#filtro_marca').val('').change();
                $('#filtro_situacao').val('').change();
                $('#modalFiltro').modal('hide');
            }
            $('#modalFiltro').on('hidden.bs.modal', function() {
                hideFiltro();
            });
        </script>

        <script>
            $('#senha_btn_a').on('click', function() {
                const type = $('#senha_a').prop('type') === 'password' ? 'text' : 'password';
                $('#senha_a').prop('type', type);
                if (type == "text") {
                    $('#senha_btn_a').children().removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    $('#senha_btn_a').children().removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });
        </script>