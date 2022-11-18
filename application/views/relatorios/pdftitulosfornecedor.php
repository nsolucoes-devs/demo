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
                <img src="<?php echo base_url('resources/imgs/banner.png') ?>" style="width: 35%; height: auto">
                <br><br>
                <h3 style="font-weight: bold">TÍTULOS FORNECEDOR N° <?php echo $cnpj ?> - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <div style="width: 70%; display: inline; float: left;">
                    <h4 style="padding-top: 20px"><b>TÍTULOS:</b></h4>
                </div>
                <div style="width: 30%; display: inline; float: right;" class="text-center">
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 20%">Data de Vencimento</th>
                    	    <th style="width: 20%">N° de Série</th>
                            <th style="width: 20%">Tipo</th>
                    	    <th style="width: 20%">Baixado</th>
                    		<th style="width: 20%">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($titulos as $ttl){ ?>
                        <tr>
                            <td><?php echo date('d/m/Y', strtotime($ttl['vencimento'])); ?></td>
                            <td><?php echo $ttl['numeroserie'] ?></td>
                            <td><?php echo $ttl['tipo'] ?></td>
                            <td><?php echo $ttl['baixa'] ?></td>
                            <td>R$ <?php echo number_format($ttl['valor'], 4, ',', '.') ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="col-md-12 text-right">
                    <h4><span class="span-data">Total: </span>R$ <?php echo number_format($somar, '4', ',' , '.') ?></h4>
                </div>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Títulos Fornecedor | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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