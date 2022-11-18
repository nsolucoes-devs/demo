<style>
    .span-data {
        font-weight: bold;
    }

    .td-impar {
        background-color: #eee !important;
    }

    .inside-table {
        width: 100%;
    }

    .inside-table tr {
        font-size: 11px;
    }

    .inside-table tr:hover {
        background-color: #eee !important;
    }

    .inside-table td {
        border: 0;
    }

    .inside-table th {
        border: 0;
        border-bottom: 0px !important;
    }

    .sep-tr {
        border-top: 2px solid lightgrey;
    }

    .title-inside {
        font-weight: bold;
    }

    .total {
        font-size: 25px;
    }
</style>

<div class="row">
    <div class="col-md-12" id="main" style="padding: 20px 40px">
        <div class="row">
            <div class="col-md-12 form-group text-center">
                <button onclick="pdf()" id="pdf" class="btn btn-primary" style="float: left">.PDF</button>
                <img src="<?php echo base_url() . $banner ?>" style="width: 35%; height: auto">
                <h3 class="py-4">Lista de Ativos | <?= date('d/m/Y - H:i:s') ?></h3>
            </div>
        </div>
        <div class="row">

            <div class="w-100">
                <table id="ativos_table" class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Entrada</th>
                            <th>Qtd</th>
                            <th>Descrição</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Nº de Serie</th>
                            <th>Fabricação</th>
                            <th>Valor</th>
                            <th>Local</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ativos) : ?>
                            <?php foreach ($ativos as $ativo) : ?>
                                <tr>
                                    <td><?= date('d/m/Y', strtotime($ativo->ativos_data_entrada)) ?></td>
                                    <td><?= $ativo->ativos_quantidade ?></td>
                                    <td><?= Firstlette($ativo->ativos_descricao) ?></td>
                                    <td><?= Firstlette($ativo->ativos_marca) ?></td>
                                    <td><?= Firstlette($ativo->ativos_modelo) ?></td>
                                    <td><?= $ativo->ativos_numero_serie ?></td>
                                    <td><?= date('d/m/Y', strtotime($ativo->ativos_data_fabricacao)) ?></td>
                                    <td><?= 'R$ ' . number_format($ativo->ativos_valor, 2, ',', '.') ?></td>
                                    <td><?= Firstlette($ativo->ativos_local) ?></td>
                                    <td><?= $ativo->ativos_status ? 'Ativo' : 'Inativo' ?></td>
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

            <div class="col-md-12 d-flex justify-content-end">
                <p class="total">
                    Total de Ativos <?= 'R$ ' . number_format($total, 2, ',', '.') ?>
                </p>
            </div>


            <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
                <div class="row">
                    <div class="col-md-5 text-left">
                        <p><b>Lista de Ativos | <?php echo date('d/m/Y - H:i:s') ?></b></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <p>Gerenciamento de Frotas | N Soluções</p>
                    </div>
                </div>
                <br><br>
            </footer>

        </div>
    </div>

    <script>
        function pdf() {
            $('#pdf').css('display', 'none');
            $('#footer').css('display', 'block');
            window.print();
            $('#footer').css('display', 'none');
            $('#pdf').css('display', 'block');
        }
    </script>