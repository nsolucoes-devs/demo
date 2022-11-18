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

            <?php if ($this->session->userdata('editar')) { ?>
                <div class="mb-3">
                    <a href="<?= base_url('cadastroativos') ?>" class="btn btn-primary">Novo Ativo</a>
                    <a href="<?= base_url('relatorios/pdfativos') ?>" class="btn btn-primary"><em class="fa fa-file-o mr-2"></em>PDF</a>
                </div>
            <?php } ?>

            <div class="tableFixHead">
                <table id="ativos_table" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <td class="d-none">#</td>
                            <th class="col-md-1">Entrada</th>
                            <th class="col-md-1">Qtd</th>
                            <th class="col-md-3">Descrição</th>
                            <th class="col-md-2">Valor</th>
                            <th class="col-md-2">Local</th>
                            <th class="col-md-1">Status</th>
                            <th class="col-md-2">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ativos) : ?>
                            <?php foreach ($ativos as $i => $ativo) : ?>
                                <tr>
                                    <td class="d-none"><?= $i ?></td>
                                    <td><?= date('d/m/Y', strtotime($ativo->ativos_data_entrada)) ?></td>
                                    <td class="text-center"><?= $ativo->ativos_quantidade ?></td>
                                    <td>
                                        <?php if (strlen($ativo->ativos_descricao) > 30) {
                                            echo Firstlette(substr($ativo->ativos_descricao, 0, 30) . "...");
                                        } else {
                                            echo Firstlette($ativo->ativos_descricao);
                                        } ?>
                                    </td>
                                    <!-- <td><?= $ativo->ativos_marca ?></td>
                                    <td><?= Firstlette($ativo->ativos_modelo) ?></td>
                                    <td><?= $ativo->ativos_numero_serie ?></td>
                                    <td><?= date('d/m/Y', strtotime($ativo->ativos_data_fabricacao)) ?></td> -->
                                    <td><?= 'R$ ' . number_format($ativo->ativos_valor, 2, ',', '.') ?></td>
                                    <td>
                                        <?php if (strlen($ativo->ativos_local) > 15) {
                                            echo Firstlette(substr($ativo->ativos_local, 0, 15) . "...");
                                        } else {
                                            echo Firstlette($ativo->ativos_local);
                                        } ?>
                                    </td>
                                    <td class="text-center"><?= $ativo->ativos_status ? 'Ativo' : 'Inativo' ?></td>
                                    <td class="text-center">
                                        <a style="font-size: 12px" href="<?= base_url('ativos/edit/') . $ativo->ativos_id ?>" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                        <a onclick="destroyAtivo(<?= $ativo->ativos_id ?>)" style="font-size: 12px" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <? else : ?>
                            <tr>
                                <td colspan="7" class="text-center">Nenhum ativo cadastrado</td>
                            </tr>
                        <?php endif ?>
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
    $(document).ready(function() {
        $('#ativos_table').DataTable({
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
            }
        });

        $('[type=search]').each(function() {
            $(this).before('<span class="fa fa-search" id="basic-addon2"></span>');
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
    const baseURL = '<?= base_url() ?>'

    function destroyAtivo(id) {
        Swal.fire({
            title: 'Tem certeza que quer deletar esse ativo?',
            showCancelButton: true,
            confirmButtonText: 'Deletar Ativo',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#D9534F',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: `${baseURL}ativos/destroy/${id}`,
                    success: function(response) {
                        Swal.fire('Ativo deletado!', '', 'success');
                        window.location.reload();
                    },
                });
            }
        })
    }
</script>