<style>
    .span-data{
        font-weight: bold;
    }
    .td-impar{
        background-color: #eee!important;
    }
    .inside-table{
        width: 100%;
    }
    .inside-table tr{
        font-size: 11px;
    }
    .inside-table tr:hover{
        background-color: #eee!important;
    }
    .inside-table td{
        border: 0;
    }
    .inside-table th{
        border: 0;
        border-bottom: 0px!important;
    }
    .sep-tr{
        border-top: 2px solid lightgrey;
    }
    .title-inside{
        font-weight: bold;
    }
</style>

<div class="row">
    <div class="col-md-12" id="main" style="padding: 20px 40px">
        <br><br>
        <div class="row">
            <div class="col-md-12 form-group text-center">
                <button onclick="pdf()" id="pdf" class="btn btn-primary" style="float: left">.PDF</button>
                <img src="<?php echo base_url('resources/imgs/logo.png') ?>" style="width: 35%; height: auto">
                <br><br>
                <h3 style="font-weight: bold">PNEU N° <?php echo sprintf("%'03d", $id) ?> - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <h4>DESCRIÇÃO DO PNEU: </h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="height: 0px">
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                            <th style="width: 8.33%; padding: 0; margin: 0; border: 0; line-height: 0"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">Matrícula: </span><?php echo $pneu['pneus_individual_matricula'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Marcação de Fogo: </span><?php echo $pneu['pneus_individual_marcacao'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">DOT: </span><?php echo $pneu['pneus_individual_dot'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Vinculado: </span><?php echo $pneu['frota'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=4><span class="span-data">Marca: </span><?php echo $pneu['tipo']['frota_pneu_marca'] ?></td>
                            <td colspan=4><span class="span-data">Aro: </span><?php echo $pneu['tipo']['frota_pneu_aro'] ?></td>
                            <td colspan=4><span class="span-data">Banda: </span><?php echo $pneu['tipo']['frota_pneu_banda'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <h4>REGISTROS:</h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 20%">Data - Hora</th>
                            <th style="width: 25%">Situação</th>
                            <th style="width: 55%">Observação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($registros as $rg){ ?>
                        <tr>
                            <td><?php echo $rg['data']." - ".$rg['hora'] ?></td>
                            <td><?php echo $rg['pneus_registro_situacao'] ?></td>
                            <td><?php echo $rg['pneus_registro_observacao'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Pneu Sintético | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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
    function pdf(){
        $('#pdf').css('display', 'none');
        $('#footer').css('display', 'block');
        window.print();
        $('#footer').css('display', 'none');
        $('#pdf').css('display', 'block');
    }
</script>