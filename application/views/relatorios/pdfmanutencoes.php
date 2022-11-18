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
                <img src="<?php echo base_url().$banner ?>" style="width: 35%; height: auto">
                <br><br>
                <h3 style="font-weight: bold">ORDENS DE SERVIÇO  - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                
                <?php if($filtros['tipo'] != "" || $filtros['frota'] != "" || $filtros['de'] != "" || $filtros['ate'] != ""){ 
                    $str1 = $str2 = $str3 = $str4 = "";
                    if($filtros['tipo'] != ""){
                        $str1 = "TIPO: ".$filtros['tipo']; 
                    }
                    if($filtros['frota'] != "" && $filtros['frota'] != " | "){
                        $str2 = "FROTA: ".$filtros['frota']; 
                    }
                    if($filtros['de'] != ""){
                        $str3 = "INÍCIO: ".$filtros['de']; 
                    }
                    if($filtros['ate'] != ""){
                        $str4 = "FIM: ".$filtros['ate']; 
                    }else if($filtros['ate'] == ""){
                        $str4 = "FIM: INDEFINIDO";
                    }
                ?>
                <br>
                <h4>
                    FILTROS ATIVOS: 
                    <?php 
                        echo $str1;
                        if($str1 != "" && $str2 != ""){echo ", ".$str2;}else{echo $str2;}
                        if(($str1 != "" || $str2 != "") && $str3 != ""){echo ", ".$str3;}else{echo $str3;}
                        if(($str1 != "" || $str2 != "" || $str3 != "") && $str4 != ""){echo ", ".$str4;}else{echo $str4;}
                    ?>
                </h4>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <div style="width: 70%; display: inline; float: left;">
                    <h4 style="padding-top: 20px"><b>MANUTENÇÕES:</b></h4>
                </div>
                <div style="width: 30%; display: inline; float: right;" class="text-center">
                    <h4 style="border-radius: 4px; border: 2px solid black; padding: 10px 15px"><b>CUSTO TOTAL: R$ <?php echo number_format($total, 4, ',', '.') ?></b></h4>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 7%">N° OS</th>
                            <th style="width: 15%">Data - Hora</th>
                            <th style="width: 15%">Frota</th>
                            <th style="width: 10%">Tipo</th>
                            <th style="width: 33%">Título</th>
                            <th style="width: 10%">Situação</th>
                            <th style="width: 10%">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($manutencoes as $manu) { ?>
                        <tr>
                            <td><?php echo sprintf("%'03d", $manu['os_id']) ; ?></td>
                            <td><?php echo $manu['data']." - ".$manu['os_hora_abertura'] ?></td>
                            <td><?php echo $manu['frota'] ?></td>
                            <td><?php echo $manu['os_tipo'] ?></td>
                            <td><?php echo $manu['os_titulo'] ?></td>
                            <td><?php echo $manu['situacao']?>   
                            </td>
                            <td>R$ <?php echo number_format($manu['total'], 4, ',', '.') ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Ordens de Serviço | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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