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
                <h3 style="font-weight: bold">VEÍCULOS / MAQUINÁRIOS - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <!--<div>-->
                <!--    <h4 style="padding-top: 20px"><b>VEÍCULOS / MAQUINÁRIOS:</b></h4>-->
                <!--</div>-->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 25%">Veículo / Maquinário</th>
                            <th style="width: 7%">Placa</th>
                            <th style="width: 7%">Frota</th>
                            <th style="width: 5%">Km / Hr</th>
                            <th style="width: 10%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($veiculos as $veiculo) { ?>
                        <tr>
                            <td><?php echo $veiculo['nome'] ?></td>
                            <td><?php echo $veiculo['placa'] ?></td>
                            <td><?php echo $veiculo['frota'] ?></td>
                            <td><?php echo $veiculo['km'] ?></td>
                            <td><?php echo $veiculo['status'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Veículos / Maquinários | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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