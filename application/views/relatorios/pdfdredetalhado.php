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
                <img src="<?php echo base_url($banner) ?>" style="width: 35%; height: auto">
                <br><br>
                <h3 style="font-weight: bold">DEMONSTRATIVO DE RESULTADO DETALHADO - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                <br>
                <h4>PERÍODO: <?php echo "DE ".$filtros['de']." ATÉ ".$filtros['ate'] ?></h4>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="border-right: 1px solid lightgrey; padding-right: 33px">
                <h4 class="text-center">ENTRADAS: </h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 15%">Data</th>
                            <th style="width: 17%">N° Doc</th>
                            <th style="width: 38%">Tomador</th>
                            <th style="width: 20%">Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($entradas as $ent){ ?>
                        <tr>
                            <td><?php echo $ent['data'] ?></td>
                            <td><?php echo ucwords(mb_strtolower($ent['titulos_numeroserie'])) ?></td>
                            <td><?php 
                            echo substr($ent['forneclin'], 0, 25);
                            if(strlen($ent['forneclin']) > 25){echo "...";}
                            ?></td>
                            <td>R$ <?php echo $ent['valor'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6" style="padding-left: 33px">
                <h4 class="text-center">SAÍDAS: </h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 15%">Data</th>
                            <th style="width: 17%">N° Doc</th>
                            <th style="width: 38%">Tomador</th>
                            <th style="width: 20%">Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($saidas as $sai){ ?>
                        <tr>
                            <td><?php echo $sai['data'] ?></td>
                            <td><?php echo ucwords(mb_strtolower($sai['titulos_numeroserie'])) ?></td>
                            <td><?php 
                            echo substr($sai['forneclin'], 0, 20);
                            if(strlen($sai['forneclin']) > 20){echo "...";}
                            ?></td>
                            <td>R$ <?php echo $sai['valor'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-right" style="border-right: 1px solid lightgrey; border-bottom: 1px solid lightgrey; padding-bottom: 30px; padding-right: 33px">
                <br>
                <h4 style="display: inline; font-weight: bold">TOTAL: </h4>
                <input type="text" class="form-control" style="width: 200px; display: inline" value="<?php echo $totalE ?>" readonly>
            </div>
            <div class="col-md-6 text-right" style="border-bottom: 1px solid lightgrey; padding-bottom: 30px; padding-left: 33px">
                <br>
                <h4 style="display: inline; font-weight: bold">TOTAL: </h4>
                <input type="text" class="form-control" style="width: 200px; display: inline;" value="<?php echo $totalS ?>" readonly>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12 form-group text-right">
                <h4 style="display: inline; font-weight: bold">DRE: </h4>
                <input type="text" class="form-control" style="width: 200px; display: inline; font-weight: bold" value="R$ <?php echo $total ?>" readonly>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Demonstrativo de Resultado Detalhado | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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