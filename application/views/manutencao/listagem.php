<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
    $mobile = 1;
} else {
    $mobile = 0;
}
?>

<style>
    .tableFixHead {
        height: auto;
        padding-left: 15px;
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

    #myTableManu tbody tr td {
        font-size: 12px;
    }

    #myTableSemRecurso_wrapper tbody tr td,
    #myTableSemRecurso_wrapper thead tr th {
        font-size: 12px;
    }

    #myTableSemRecurso_wrapper .row {
        width: 110%;
    }

    .dropdown-item {
        font-size: 14px;
        cursor: pointer;
    }

    .sel-with-add {
        width: calc(100% - 130px);
        display: inline;
        float: left;
    }

    .sel-with-add.select2 {
        width: 100%;
    }

    .add-din {
        width: 130px;
        display: inline;
        float: left;
    }

    .add-din button {
        margin-left: 18px;
        width: 45px;
    }

    .inside-list {
        max-width: 60px;
    }

    .pagination-links a {
        color: #033557;
        text-decoration: none;
        padding: 5px;
        font-size: 13px;
        margin: 2px;
        border: 1px solid #033557;
        border-radius: 3px;
    }

    .pagination-links strong {
        padding: 5px;
        font-size: 13px;
        color: #033557;
        border: 1px solid #033557;
        border-radius: 3px;
    }

    .pagination-links {
        text-align: right;
    }

    .encurtar {
        display: -webkit-box;
        overflow: hidden;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        word-break: break-word;
        line-height: 11px !important;
    }
</style>

<link href="<?php base_url('resources/js/select2.css') ?>" rel="stylesheet" />
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <div class="row main-row">
        <div class="col-md-12 main-col-12">

            <div style="margin-bottom: 0px">
                <?php if ($this->session->userdata('editar')) { ?>
                    <a href="<?php echo base_url('cadastrarordemdeservico') ?>" class="btn btn-primary" style='color: white'>Nova Ordem de Serviço</a>
                    &nbsp;&nbsp;
                    <a class="btn btn-primary" data-toggle="modal" data-target="#modalFiltro"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                <?php } ?>
                <?php if ($this->session->userdata('ativar')) { ?>
                    <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                <?php } ?>

            </div>

            <div id="divfiltro" class="row" style="margin-left: calc(100% - 250px);">
                <label style="position: relative; right: 20%; top: 32px; font-size: 14px;">Procurar:</label>
                <form action="<?php echo base_url('ordemdeservicos') ?>" method="post">
                    <div class="col-md-12 text-right">
                        <div id="campo-filtro" class="input-group mb-3" style="width: 120%; margin-left: auto; margin-bottom: 2%">
                            <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Digite sua busca" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php if (isset($filtro)) {
                                                                                                                                                                                                            echo $filtro;
                                                                                                                                                                                                        } ?>">
                            <div class="input-group-append" style="cursor: pointer;position: absolute;right: 0px;height: 100%;z-index: 2;">
                                <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <?php if ($mobile == 0) { ?>
                <div class="tableFixHead">
                    <table id="myTableManu" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 6%">N°</th>
                                <th style="width: 13%">Frota - Placa</th>
                                <th style="width: 10%">Tipo</th>
                                <th style="width: 14%">Data - Hora</th>
                                <th style="width: 36%">Título</th>
                                <th style="width: 14%">Status</th>
                                <th style="width: 7%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ordens as $os) { ?>
                                <?php if ($this->session->userdata('ativar')) { ?>
                                    <tr <?php if ($os['os_status_id'] == 2) {
                                            echo "style='background-color: #ff0000; color:white'";
                                        } ?>>
                                        <td style="vertical-align: middle;"><?php echo sprintf("%'03d", $os['os_id']); ?></td>
                                        <td style="vertical-align: middle;">
                                            <?php
                                            foreach ($frotas as $f) {
                                                if ($f['frota_id'] == $os['os_frota_id']) {
                                                    echo $f['frota_codigo'] . " - " . $f['frota_placa'];
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?php echo ucwords(strtolower($os['os_tipo'])); ?></td>
                                        <td style="vertical-align: middle;"><?php echo date('d/m/Y', strtotime($os['os_data_abertura'])) . " - " . $os['os_hora_abertura']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <?php
                                            $tam = strlen($os['os_titulo']);
                                            echo ucwords(strtolower(substr($os['os_titulo'], 0, 35)));
                                            if ($tam > 35) {
                                                echo "...";
                                            }
                                            ?>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <?php
                                            foreach ($situacoes as $sit) {
                                                if ($sit['situacaoos_id'] == $os['os_situacao_id']) {
                                                    echo ucwords(strtolower($sit['situacaoos_nome']));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <?php if ($os['os_status_id'] != 2) { ?>
                                            <td style="text-align: center">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</button>
                                                    <div class="dropdown-menu">
                                                        <?php if ($this->session->userdata('editar')) { ?>
                                                            <form action="<?php echo base_url('cadastrarandamento') ?>" method="post">
                                                                <input type="hidden" name="os_id" value="<?php echo $os['os_id'] ?>">
                                                                <button type="submit" class="dropdown-item">Novo Andamento</button>
                                                            </form>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('ver')) { ?>
                                                            <a class="dropdown-item" href="<?php echo base_url('mostrarordemdeservico/') . $os['os_id'] ?>">Ver</a>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('editar')) { ?>
                                                            <a class="dropdown-item" href="<?php echo base_url('editarordemdeservico/') . $os['os_id'] ?>">Editar</a>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('ativar')) {
                                                            if ($os['os_situacao_id'] != 4) { ?>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#encerrarOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_encerrar')">Encerrar O.S</a>
                                                            <?php }
                                                            if ($os['os_situacao_id'] == 4) { ?>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#reabrirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_reabrir')">Reabrir O.S</a>
                                                        <?php }
                                                        } ?>
                                                        <?php if ($this->session->userdata('excluir')) { ?>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#excluirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_excluir')">Excluir</a>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </td>
                                        <?php } else { ?>
                                            <td style="text-align: center">
                                                <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $os['os_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } else if ($os['os_status_id'] != 2) { ?>
                                    <tr>
                                        <td><?php echo sprintf("%'03d", $os['os_id']); ?></td>
                                        <td>
                                            <?php
                                            foreach ($frotas as $f) {
                                                if ($f['frota_id'] == $os['os_frota_id']) {
                                                    echo $f['frota_codigo'] . " - " . $f['frota_placa'];
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $os['os_tipo']; ?></td>
                                        <td><?php echo date('d/m/Y', strtotime($os['os_data_abertura'])) . " - " . $os['os_hora_abertura']; ?></td>
                                        <td>
                                            <?php
                                            $tam = strlen($os['os_titulo']);
                                            echo substr($os['os_titulo'], 0, 35);
                                            if ($tam > 35) {
                                                echo "...";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            foreach ($situacoes as $sit) {
                                                if ($sit['situacaoos_id'] == $os['os_situacao_id']) {
                                                    echo $sit['situacaoos_nome'];
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</button>
                                                <div class="dropdown-menu">

                                                    <?php if ($os['os_status_id'] == 1) { ?><?php if ($this->session->userdata('editar')) { ?>
                                                    <form action="<?php echo base_url('cadastrarandamento') ?>" method="post">
                                                        <input type="hidden" name="os_id" value="<?php echo $os['os_id'] ?>">
                                                        <button type="submit" class="dropdown-item">Novo Andamento</button>
                                                    </form>
                                                <?php } ?>
                                                <?php if ($this->session->userdata('ver')) { ?>
                                                    <a class="dropdown-item" href="<?php echo base_url('mostrarordemdeservico/') . $os['os_id'] ?>">Ver</a>
                                            <?php }
                                                    } ?>

                                            <?php if ($this->session->userdata('editar')) { ?>
                                                <a class="dropdown-item" href="<?php echo base_url('editarordemdeservico/') . $os['os_id'] ?>">Editar</a>
                                            <?php } ?>
                                            <?php if ($os['os_status_id'] == 1) { ?><?php if ($this->session->userdata('ativar')) { ?>

                                            <?php if ($os['os_situacao_id'] != 4) { ?>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#encerrarOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_encerrar')">Encerrar O.S</a>
                                            <?php } else {  ?>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#reabrirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_reabrir')">Reabrir O.S</a>
                                            <?php }  ?>

                                            <a class="dropdown-item" data-toggle="modal" data-target="#excluirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_excluir')">Excluir</a>
                                    <?php }
                                                                                }  ?>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <?php if ($ordens == null) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p> Nenhuma ordem de serviço encontrada.</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p class="pagination-links"><?php echo $pag_links; ?></p>
                    </div>
                </div>
            <?php } else { ?>
                <div class="tableFixHead">
                    <table id="myTableManu" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 90%">Informações</th>
                                <th style="width: 10%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ordens as $os) { ?>
                                <?php if ($this->session->userdata('ativar')) { ?>
                                    <tr <?php if ($os['os_status_id'] == 2) {
                                            echo "style='background-color: #ff0000; color:white'";
                                        } ?>>
                                        <td>
                                            <b><?php echo sprintf("%'03d", $os['os_id']); ?></b><br>

                                            <b>
                                                <?php
                                                foreach ($frotas as $f) {
                                                    if ($f['frota_id'] == $os['os_frota_id']) {
                                                        echo $f['frota_codigo'] . " - " . $f['frota_placa'];
                                                    }
                                                }
                                                ?></b><br>

                                            <b><?php echo $os['os_tipo']; ?></b><br>

                                            <b><?php echo date('d/m/Y', strtotime($os['os_data_abertura'])) . " - " . $os['os_hora_abertura']; ?></b><br>

                                            <b>
                                                <?php
                                                $tam = strlen($os['os_titulo']);
                                                echo substr($os['os_titulo'], 0, 35);
                                                if ($tam > 35) {
                                                    echo "...";
                                                }
                                                ?></b><br>

                                            <b>
                                                <?php
                                                foreach ($situacoes as $sit) {
                                                    if ($sit['situacaoos_id'] == $os['os_situacao_id']) {
                                                        echo $sit['situacaoos_nome'];
                                                    }
                                                }
                                                ?></b><br>
                                        </td>
                                        <?php if ($os['os_status_id'] != 2) { ?>
                                            <td style="text-align: center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
                                                    <div class="dropdown-menu">
                                                        <?php if ($this->session->userdata('editar')) { ?>
                                                            <form action="<?php echo base_url('cadastrarandamento') ?>" method="post">
                                                                <input type="hidden" name="os_id" value="<?php echo $os['os_id'] ?>">
                                                                <button type="submit" class="dropdown-item">Novo Andamento</button>
                                                            </form>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('ver')) { ?>
                                                            <a class="dropdown-item" href="<?php echo base_url('mostrarordemdeservico/') . $os['os_id'] ?>">Ver</a>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('editar')) { ?>
                                                            <a class="dropdown-item" href="<?php echo base_url('editarordemdeservico/') . $os['os_id'] ?>">Editar</a>
                                                        <?php } ?>
                                                        <?php if ($this->session->userdata('ativar')) {
                                                            if ($os['os_situacao_id'] != 4) { ?>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#encerrarOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_encerrar')">Encerrar O.S</a>
                                                            <?php }
                                                            if ($os['os_situacao_id'] == 4) { ?>
                                                                <a class="dropdown-item" data-toggle="modal" data-target="#reabrirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_reabrir')">Reabrir O.S</a>
                                                        <?php }
                                                        } ?>
                                                        <?php if ($this->session->userdata('excluir')) { ?>
                                                            <a class="dropdown-item" data-toggle="modal" data-target="#excluirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_excluir')">Excluir</a>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </td>
                                        <?php } else { ?>
                                            <td style="text-align: center">
                                                <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $os['os_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } else if ($os['os_status_id'] != 2) { ?>
                                    <tr>
                                        <td>
                                            <?php echo sprintf("%'03d", $os['os_id']); ?>

                                            <?php
                                            foreach ($frotas as $f) {
                                                if ($f['frota_id'] == $os['os_frota_id']) {
                                                    echo $f['frota_codigo'] . " - " . $f['frota_placa'];
                                                }
                                            }
                                            ?>

                                            <?php echo $os['os_tipo']; ?>

                                            <?php echo date('d/m/Y', strtotime($os['os_data_abertura'])) . " - " . $os['os_hora_abertura']; ?>

                                            <?php
                                            $tam = strlen($os['os_titulo']);
                                            echo substr($os['os_titulo'], 0, 35);
                                            if ($tam > 35) {
                                                echo "...";
                                            }
                                            ?>

                                            <?php
                                            foreach ($situacoes as $sit) {
                                                if ($sit['situacaoos_id'] == $os['os_situacao_id']) {
                                                    echo $sit['situacaoos_nome'];
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <div class="btn-group dropleft">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</button>
                                                <div class="dropdown-menu">

                                                    <?php if ($os['os_status_id'] == 1) { ?><?php if ($this->session->userdata('editar')) { ?>
                                                    <form action="<?php echo base_url('cadastrarandamento') ?>" method="post">
                                                        <input type="hidden" name="os_id" value="<?php echo $os['os_id'] ?>">
                                                        <button type="submit" class="dropdown-item">Novo Andamento</button>
                                                    </form>
                                                <?php } ?>
                                                <?php if ($this->session->userdata('ver')) { ?>
                                                    <a class="dropdown-item" href="<?php echo base_url('mostrarordemdeservico/') . $os['os_id'] ?>">Ver</a>
                                            <?php }
                                                    } ?>

                                            <?php if ($this->session->userdata('editar')) { ?>
                                                <a class="dropdown-item" href="<?php echo base_url('editarordemdeservico/') . $os['os_id'] ?>">Editar</a>
                                            <?php } ?>
                                            <?php if ($os['os_status_id'] == 1) { ?><?php if ($this->session->userdata('ativar')) { ?>

                                            <?php if ($os['os_situacao_id'] != 4) { ?>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#encerrarOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_encerrar')">Encerrar O.S</a>
                                            <?php } else {  ?>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#reabrirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_reabrir')">Reabrir O.S</a>
                                            <?php }  ?>

                                            <a class="dropdown-item" data-toggle="modal" data-target="#excluirOrdem" onclick="setaField(<?php echo $os['os_id'] ?>, '#id_excluir')">Excluir</a>
                                    <?php }
                                                                                }  ?>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                    <?php if ($ordens == null) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p> Nenhuma ordem de serviço encontrada.</p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> clientes encontrados</b></p>
                        <?php if ($pag_links) { ?>
                            <p class="pagination-links"><?php echo $pag_links; ?></p>
                        <?php } else { ?>
                            <p class="pagination-links">&nbsp;</p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
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
                <h4>Deseja reativar a ordem de serviço?</h4>
            </div>
            <div class="modal-footer" style="position: relative">
                <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                <br><br>
                <div class="row row-c" id="formsenha1" style="display: none">
                    <div class="col-md-12 text-center">
                        <form action="<?php echo base_url('manutencao/ativarOS') ?>" method="post">
                            <input type="hidden" name="os_idatv" id="os_idatv">
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

<div class="modal fade" id="modalAndamento" tabindex="-1" role="dialog" aria-labelledby="modalAndamentoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <div class="row row-c">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalAndamentoLabel">Lançar Andamento</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" onclick="escondeAndamento()" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Título:</label><br>
                        <input type="text" class="form-control and-field" id="and_tituolo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>Data:</label><br>
                        <input type="date" class="form-control and-field" id="and_data">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Hora:</label><br>
                        <input type="time" class="form-control and-field" id="and_hora">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Detalhes:</label><br>
                        <textarea class="form-control and-field" id="and_detalhes" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Lançar Serviço:</label><br>
                        <div class="sel-with-add">
                            <select style="width: 100%!important" class="select2-and and-field" id="and_servico">
                                <option value="" selected disabled>-- Selecione o Serviço --</option>
                                <?php
                                foreach ($servicos as $serv) {
                                    echo '<option value="' . $serv['servico_id'] . '">' . $serv['servico_nome'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="add-din">
                            <button type="button" class="btn btn-success" onclick="addList(1)"><em class="fa fa-search"></em></button>
                            <button type="button" class="btn btn-primary"><em class="fa fa-plus"></em></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Lançar Peça:</label><br>
                        <div class="sel-with-add">
                            <select style="width: 100%!important" class="select2-and and-field" id="and_peca">
                                <option value="" selected disabled>-- Selecione a Peça --</option>
                                <?php
                                foreach ($pecas as $pc) {
                                    echo "<option value='" . $pc['produto_id'] . "'>" . $pc['produto_nome'] . " | " . $pc['produto_modelo'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="add-din">
                            <button type="button" class="btn btn-success" onclick="addList(2)"><em class="fa fa-search"></em></button>
                            <button type="button" class="btn btn-primary"><em class="fa fa-plus"></em></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="hidden" name="anchor_list" id="anchor_list">
                        <table id="myTableSemRecurso" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th style="width: 65px;">Qtd</th>
                                    <th style="width: 110px">Vlr</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="and_list">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-left" onclick="escondeAndamento()">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="sendAndamento()">Cadastrar</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="excluirOrdem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: unset; text-align: left">
                <div class="row row-c">
                    <div class="col-md-10">
                        <h4 class="modal-title">Excluir Ordem de Serviço</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="e_senha('excluirOrdem')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <h4>Deseja realmente excluir a ordem de serviço?</h4>
            </div>
            <div class="modal-footer" style="position: relative">
                <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha('excluirOrdem')">Sim</button>
                <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha('excluirOrdem')">Não</button>
                <br><br>
                <div class="row row-c formsenha" style="display: none">
                    <div class="col-md-12 text-center">
                        <form action="<?php echo base_url('manutencao/excluirOS') ?>" method="post">
                            <input type="hidden" name="id_excluir" id="id_excluir">
                            <label style="font-size: 16px">Confirme a senha</label><br>
                            <input class="form-control passwd senha" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                            <button type="button" class="btn btn-primary see-pass senha_btn" id="senha_btn"><em class="fa fa-eye"></em></button>
                            <br><br>
                            <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reabrirOrdem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: unset; text-align: left">
                <div class="row row-c">
                    <div class="col-md-10">
                        <h4 class="modal-title">Reabrir Ordem de Serviço</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="e_senha('reabrirOrdem')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <h4>Deseja realmente reabrir a ordem de serviço?</h4>
            </div>
            <div class="modal-footer" style="position: relative">
                <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha('reabrirOrdem')">Sim</button>
                <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha('reabrirOrdem')">Não</button>
                <br><br>
                <div class="row row-c formsenha" style="display: none">
                    <div class="col-md-12 text-center">
                        <form action="<?php echo base_url('manutencao/reabrirOS') ?>" method="post">
                            <input type="hidden" name="id_reabrir" id="id_reabrir">
                            <label style="font-size: 16px">Confirme a senha</label><br>
                            <input class="form-control passwd senha" type="password" name="senha_reabrir" id="senha_reabrir" placeholder="Digite a Senha" required>
                            <button type="button" class="btn btn-primary see-pass senha_btn"><em class="fa fa-eye"></em></button>
                            <br><br>
                            <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="encerrarOrdem" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="justify-content: unset; text-align: left">
                <div class="row row-c">
                    <div class="col-md-10">
                        <h4 class="modal-title">Encerrar Ordem de Serviço</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="e_senha('encerrarOrdem')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <h4>Deseja realmente encerrar a ordem de serviço?</h4>
            </div>
            <div class="modal-footer" style="position: relative">
                <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha('encerrarOrdem')">Sim</button>
                <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha('encerrarOrdem')">Não</button>
                <br><br>
                <div class="row row-c formsenha" style="display: none">
                    <div class="col-md-12 text-center">
                        <form action="<?php echo base_url('manutencao/encerrarOSListagem') ?>" method="post">
                            <input type="hidden" name="id_encerrar" id="id_encerrar">
                            <label style="font-size: 16px">Confirme a senha</label><br>
                            <input class="form-control passwd senha" type="password" name="senha_encerrar" id="senha_encerrar" placeholder="Digite a Senha" required>
                            <button type="button" class="btn btn-primary see-pass senha_btn"><em class="fa fa-eye"></em></button>
                            <br><br>
                            <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                        </form>
                    </div>
                </div>

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
                        <h4 class="modal-title">Filtro</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true" onclick="escondeFiltro()">&times;</span></button>
                    </div>
                </div>
            </div>

            <form method="post" action="<?php echo base_url('relatoriomanutencoes') ?>" target="_blank">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tipo de O.S</label><br>
                            <select style="width: 100%!important" class="form-control" id="filtro_tipo" name="tipo">
                                <option value="">-- Todos --</option>
                                <option value="CORRETIVA">Corretiva</option>
                                <option value="PREVENTIVA">Preventiva</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Frota</label><br>
                            <select style="width: 100%!important" class="form-control select2-filtro" id="filtro_frota" name="frota">
                                <option value="">-- Todas --</option>
                                <?php foreach ($frotas as $f) {
                                    echo "<option value='" . $f['frota_id'] . "'>" . $f['frota_placa'] . " | " . $f['frota_codigo'] . "</option>";
                                } ?>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>De</label><br>
                            <input type="date" class="form-control" id="foltro_de" name="de">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Até</label><br>
                            <input type="date" class="form-control" id="foltro_ate" name="ate">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="escondeFiltro()">Cancelar</button>
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary">Gerar PDF</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- Start Script Area  -->
<!-- ============================================================== -->

<script src="<?php base_url('resources/js/select2.full.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('.select2-filtro').select2({
            theme: "bootstrap",
            dropdownParent: $('#modalFiltro')
        });
    });
</script>

<script>
    function setaAtivar(id) {
        document.getElementById('os_idatv').value = id;
    }

    function senha1() {
        document.getElementById('formsenha1').style.display = "block";
    }
</script>

<script>
    $(document).ready(function() {

        <?php if ($insert != null) { ?>
            var id = <?php echo $insert; ?>;
            Swal.fire(
                'Inserido com sucesso!',
                'Ordem de Serviço N° ' + id + ' foi inserida com sucesso!',
                'success'
            )
        <?php } ?>

        <?php if ($edt != null) { ?>
            var id = <?php echo $edt; ?>;
            Swal.fire(
                'Editada com sucesso!',
                'Ordem de Serviço N° ' + id + ' foi editada com sucesso!',
                'success'
            )
        <?php } ?>

        <?php if ($andamento != null) { ?>
            var id = <?php echo $andamento; ?>;
            Swal.fire(
                'Andamento lançado com sucesso!',
                'Para visualizar os detalhes do andamento abra a ordem de serviço n° ' + id,
                'success'
            )
        <?php } ?>

        <?php if ($err != 99999999999 && $err != null) { ?>
            var id = <?php echo $err; ?>;
            Swal.fire(
                '',
                'A Ordem de Serviço n° ' + id + ' foi excluida com sucesso',
                'success'
            )
        <?php } else if ($err == 99999999999) { ?>
            Swal.fire(
                'Erro',
                'Não foi possível excluir a Ordem de Serviço, pois a senha inserida estava incorreta!',
                'error'
            )
        <?php } ?>

        <?php if ($reab != 99999999999 && $reab != null) { ?>
            var id = <?php echo $reab; ?>;
            Swal.fire(
                '',
                'A Ordem de Serviço n° ' + id + ' foi reaberta com sucesso',
                'success'
            )
        <?php } else if ($reab == 99999999999) { ?>
            Swal.fire(
                'Erro',
                'Não foi possível reabrir a Ordem de Serviço, pois a senha inserida estava incorreta!',
                'error'
            )
        <?php } ?>

        <?php if ($enc != null) { ?>
            Swal.fire(
                'Erro',
                'Não foi possível encerrar a Ordem de Serviço, pois a senha informada estava incorreta!',
                'error'
            )
        <?php } ?>

        <?php if ($reat == 1) { ?>
            Swal.fire(
                '',
                'A ordem de serviço foi reativada com sucesso',
                'success'
            )
        <?php } ?>

        <?php if ($reat == 2) { ?>
            Swal.fire(
                'Erro',
                'Não foi possível reativar a ordem de serviço, pois a senha informada estava incorreta!',
                'error'
            )
        <?php } ?>

        $('#myTableSemRecurso').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false,
            "language": {
                "zeroRecords": " ",
            }
        });
    });
</script>

<script>
    function setaAndamento(id) {

    }

    function escondeAndamento() {
        $('#modalAndamento').modal('hide');
        $('.and-field').each(function() {
            $(this).val("");
        });
        $('#and_list').html("");
    }

    function sendAndamento() {

    }

    var global_servs = [];
    var global_pecas = [];
    var global_svals = [];
    var global_index = 1;

    function addList(val) {
        if (val == 1) {
            //serviço
            if ($('#and_servico').val() != "" && $('#and_servico').val() != null) {
                dados = new FormData();
                dados.append('id', $('#and_servico').val());
                $.ajax({
                    url: '<?php echo base_url('manutencao/getServAndamento'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    error: function(xhr, status, error) {
                        alert('addList(serv): ' + xhr.responseText);
                    },
                    success: function(data) {
                        if (data != "null" && data != "" && data != " " && data != null) {
                            serv = jQuery.parseJSON(data);
                            if (typeof global_servs[serv.servico_id] === 'undefined') {
                                //não tem ainda
                                global_servs[serv.servico_id] = 1;
                                global_svals[serv.servico_id] = serv.servico_custo;

                                var tr =
                                    '<tr id="tr_s' + serv.servico_id + '">' +
                                    '<td>' + global_index + '</td>' +
                                    '<td>' + serv.servico_nome + '</td>' +
                                    '<td><input class="inside-list" type="number" id="input_' + global_index + '" value="' + global_servs[serv.servico_id] + '" onfocusout="notNull(\'input_' + global_index + '\')" oninput="this.setCustomValidity(\'\')" onchange="mudaValor(\'input_' + global_index + '\', ' + serv.servico_id + ')"></td>' +
                                    '<td>R$ <input style="width: 90px" type="text" id="valor_' + global_index + '" value="' + serv.servico_custo + '" onfocusout="notNull(\'valor_' + global_index + '\')" oninput="this.setCustomValidity(\'\')"></td>' +
                                    "</tr>";

                                if (global_index == 1) {
                                    $('#and_list').html(tr);
                                } else {
                                    $('#and_list').append(tr);
                                }
                                $("#valor_" + global_index).mask("#.##0,00", {
                                    reverse: true
                                });

                                global_index++;
                            } else {
                                //já tem
                                global_servs[serv.servico_id] = global_servs[serv.servico_id] + 1;

                                var glb = global_index - 1;
                                $('#input_' + glb).val(global_servs[serv.servico_id]);
                            }
                        } else {
                            alert("Erro no banco");
                        }
                    },
                });
            } else {
                alert('Por favor selecione um serviço!');
            }
        } else if (val == 2) {
            //peça
            if ($('#and_peca').val() != "" && $('#and_peca').val() != null) {
                dados = new FormData();
                dados.append('id', $('#and_peca').val());
                $.ajax({
                    url: '<?php echo base_url('manutencao/getPecaAndamento'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    error: function(xhr, status, error) {
                        alert('addList(peça): ' + xhr.responseText);
                    },
                    success: function(data) {
                        if (data != "null" && data != "" && data != " " && data != null) {
                            peca = jQuery.parseJSON(data);
                            if (typeof global_pecas[peca.produto_id] === 'undefined') {
                                //não tem ainda
                                global_pecas[peca.produto_id] = 1;

                                var tr =
                                    '<tr id="tr_s' + peca.produto_id + '">' +
                                    '<td>' + global_index + '</td>' +
                                    '<td>' + peca.produto_nome + '</td>' +
                                    '<td><input class="inside-list" type="number" id="input_' + global_index + '" value="' + global_pecas[peca.produto_id] + '" onfocusout="notNull(\'input_' + global_index + '\')" oninput="this.setCustomValidity(\'\')" onchange="mudaValor2(\'input_' + global_index + '\', ' + peca.produto_id + ')"></td>' +
                                    '<td>R$ <input style="width: 90px" type="text" id="valor_' + global_index + '" value="' + peca.produto_preco_venda + '" onfocusout="notNull(\'valor_' + global_index + '\')" oninput="this.setCustomValidity(\'\')"></td>' +
                                    "</tr>";

                                if (global_index == 1) {
                                    $('#and_list').html(tr);
                                } else {
                                    $('#and_list').append(tr);
                                }
                                $("#valor_" + global_index).mask("#.##0,00", {
                                    reverse: true
                                });

                                global_index++;
                            } else {
                                //já tem
                                global_pecas[peca.produto_id] = global_pecas[peca.produto_id] + 1;

                                var glb = global_index - 1;
                                $('#input_' + glb).val(global_pecas[peca.produto_id]);
                            }
                        } else {
                            alert("Erro no banco");
                        }
                    },
                });
            } else {
                alert('Por favor selecione uma peça!');
            }
        }
    }
</script>

<script>
    function notNull(id) {
        if ($('#' + id).val() == "" || $('#' + id).val() == " " || $('#' + id).val() == 0 || $('#' + id).val() == "0") {
            document.getElementById(id).setCustomValidity('Por favor, informe um valor válido!');
            document.getElementById(id).reportValidity();
        }
    }

    function mudaValor(id, e) {
        global_servs[e] = parseInt($('#' + id).val());
    }

    function mudaValor2(id, e) {
        global_pecas[e] = parseInt($('#' + id).val());
    }
</script>

<script>
    function setaField(id, field) {
        $(field).val(id);
    }

    function senha(modal) {
        $('#' + modal).find('.formsenha').last().css('display', 'block');
    }

    function e_senha(modal) {
        $('#' + modal).find('.formsenha').last().css('display', 'none');
        $('#' + modal).find('.passwd').last().val("");
    }
    $('.senha_btn').on('click', function() {
        const type = $(this).parent().find('.senha').last().prop('type') === 'password' ? 'text' : 'password';
        $(this).parent().find('.senha').last().prop('type', type);
        if (type == "text") {
            $(this).children().removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            $(this).children().removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
</script>

<script>
    function escondeFiltro() {
        $('#filtro_tipo').val('').change();
        $('#filtro_frota').val('').change();
        $('#foltro_de').val('');
        $('#foltro_ate').val('');

        $('#modalFiltro').modal('hide');
    }

    $('#modalFiltro').on('hidden.bs.modal', function() {
        escondeFiltro();
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