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
    
    .entrada{
        width: 70%;
        margin: auto;
    }
    .saida{
        width: 70%;
        margin: auto;
    }
    
    .title-d{
        font-size: 20px;
        font-weight: bold;
    }
    .val-d{
        font-size: 24px;
        font-weight: bold;
    }
    .div-row{
        border-bottom: 1px solid lightgrey;
        padding-bottom: 40px;
    }
</style>

<div class="row">
    <div class="col-md-12" id="main" style="padding: 20px 30px">
        <br><br>
        <div class="row">
            <div class="col-md-12 form-group text-center">
                <button onclick="pdf()" id="pdf" class="btn btn-primary" style="float: left">.PDF</button>
                <img src="<?php echo base_url($banner) ?>" style="width: 35%; height: auto">
                <br><br>
                <h3 style="font-weight: bold">DEMONSTRATIVO DE RESULTADO SINTÉTICO - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                <br>
                <h4>PERÍODO: <?php echo $filtros['inicio']." ATÉ ".$filtros['final'] ?></h4>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                
                <?php $i = 0; foreach($meses as $m){ ?>
                <div class="row <?php if($i < count($meses)){echo "div-row";} ?>" style="padding-top: 20px;">
                    <div class="col-md-12 form-group">
                        <h4><?php echo $m['mes']." DE ".$m['ano'] ?></h4>
                    </div>
                    
                    <div class='col-md-6 form-group text-center'>
                        <div class="entrada alert alert-success">
                            <span class="title-d">Entradas</span><br>
                            <span class="val-d">R$ <?php echo number_format($m['totalE'], 4, ',', '.') ?></span>
                        </div>
                    </div>
                    <div class='col-md-6 form-group text-center'>
                        <div class="saida alert alert-danger">
                            <span class="title-d">Saídas</span><br>
                            <span class="val-d">R$ <?php echo number_format($m['totalS'], 4, ',', '.') ?></span>
                        </div>
                    </div>
                    <div class="col-md-12 form-group text-right" style="padding-top: 30px">
                        <h4 style="display: inline; font-weight: bold">RESULTADO: </h4>
                        <input type="text" class="form-control" style="width: 200px; display: inline; font-weight: bold" value="R$ <?php $total = (float)$m['totalE'] - (float)$m['totalS']; echo number_format($total, 4, ',', '.'); ?>" readonly>
                    </div>
                </div>
                <?php } ?>
            
            </div>
        </div>

        <br><br>
        <div class="row">
            <div class="col-md-12 form-group text-right">
                <h4 style="display: inline; font-weight: bold">DRE DO PERÍODO: </h4>
                <input type="text" class="form-control" style="width: 200px; display: inline; font-weight: bold" value="R$ <?php echo number_format($totalDRE, 4, ',', '.') ?>" readonly>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Demonstrativo de Resultado Sintético | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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