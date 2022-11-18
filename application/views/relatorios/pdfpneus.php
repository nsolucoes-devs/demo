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
                <h3 style="font-weight: bold">PNEUS  - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                <?php if(($filtros['frota'] != null && $filtros['frota'] != "") || ($filtros['marca'] != null && $filtros['marca'] != "")){
                    $str = "";
                    if($filtros['frota'] != "" && $filtros['frota'] != null){
                        $str = "FROTA: ".$filtros['frota'];
                    }
                    if($filtros['marca'] != "" && $filtros['marca'] != null){
                        if($str == ""){
                            $str = "MARCA: ".$filtros['marca']['frota_pneu_marca'];
                        }else{
                            $str .= ", MARCA: ".$filtros['marca']['frota_pneu_marca'];
                        }
                    }
                    echo "<h4>FILTROS ATIVOS: ".$str."</h4><br>";
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <div>
                    <h4 style="padding-top: 20px"><b>PNEUS:</b></h4>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 20%">Marcação</th>
                            <th style="width: 20%">Matrícula</th>
                            <th style="width: 25%">Marca / Aro / Banda</th>
                            <th style="width: 15%">Vinculado à Frota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pneus as $pneu) { ?>
                        <tr>
                            <td><?php echo $pneu['pneus_individual_marcacao'] ?></td>
                            <td><?php echo $pneu['pneus_individual_matricula'] ?></td>
                            <td><?php foreach($tipos as $tipo){
                                if($tipo['frota_pneu_id'] == $pneu['pneus_individual_tipopneu_id']){
                                    echo $tipo['frota_pneu_marca'] . ' / ' . $tipo['frota_pneu_aro'] . ' / ' . $tipo['frota_pneu_banda'];
                                }
                            }
                            ?>
                            </td>
                            <td><?php foreach($frotas as $frota) { 
                                if($frota['frota_id'] == $pneu['pneus_individual_frota_id']) {
                                    echo $frota['frota_codigo'] . ' / ' . $frota['frota_placa'];
                                }  
                                
                                } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Pneus | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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