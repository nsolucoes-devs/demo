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
                <h3 style="font-weight: bold">VEÍCULO N° <?php echo sprintf("%'03d", $veiculo['frota_id']) ; ?>  - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <h4><b>DESCRIÇÃO DO VEÍCULO:</b></h4>
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
                            <td class="td-impar" colspan=2><span class="span-data">Placa: </span><?php echo $veiculo['frota_placa'] ?></td>
                            <td class="td-impar" colspan=2><span class="span-data">Frota: </span><?php echo $veiculo['frota_codigo'] ?></td>
                            <td class="td-impar" colspan=4><span class="span-data">Modelo: </span><?php echo $modelo['frota_modelo_nome'] . ' - ' .$marca['frota_marca_nome']?></td>
                            <td class="td-impar" colspan=2><span class="span-data">Ano/Modelo: </span><?php echo $veiculo['frota_ano'] ?></td>
                            <td class="td-impar" colspan=2><span class="span-data">Cor: </span><?php echo $veiculo['frota_cor'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=4><span class="span-data">Renavam: </span><?php echo $veiculo['frota_renavam'] ?></td>
                            <td colspan=4><span class="span-data">Chassi: </span><?php echo $veiculo['frota_chassi'] ?></td>
                            <td colspan=4><span class="span-data">N° do Motor: </span><?php echo $veiculo['frota_motor'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">Câmbio: </span><?php echo $veiculo['frota_cambio'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Linha: </span><?php echo $linha['frota_linha_nome'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Status/Situação: </span><?php echo $status['frota_status_nome'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Km: </span><?php echo $veiculo['frota_km'] ?></td>
                        </tr>
 
                        <tr>
                            <td colspan=3><span class="span-data">Preço de Compra: </span>R$ <?php echo number_format($veiculo['frota_preco_compra'], 4, ',', '.') ?></td>
                            <td colspan=3><span class="span-data">Peso de Tara: </span><?php echo $veiculo['frota_tara'] ?></td>
                            <td colspan=3><span class="span-data">Peso Lotação: </span> <?php echo $veiculo['frota_lotacao'] ?></td>
                            <td colspan=3><span class="span-data">Peso Bruto Total(PBT): </span> <?php echo $veiculo['frota_pbt'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=6><span class="span-data">Cabine: </span><?php echo $cabine['frota_tipogabine_nome'] ?></td>
                            <td class="td-impar" colspan=6><span class="span-data">Munck: </span><?php echo $munck['frota_tipomunck_nome'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 form-group">
                <div style="width: 70%; display: inline; float: left;">
                    <h4 style="padding-top: 20px"><b>MANUTENÇÕES:</b></h4>
                </div>
                <div style="width: 30%; display: inline; float: right;" class="text-center">
                    <h4 style="border-radius: 4px; border: 2px solid black; padding: 10px 15px"><b>CUSTO TOTAL: R$ <?php echo $total ?></b></h4>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 7%">N° OS</th>
                            <th style="width: 15%">Data - Hora</th>
                            <th style="width: 10%">Tipo</th>
                            <th style="width: 7%">Km</th>
                            <th style="width: 41%">Título</th>
                            <th style="width: 10%">Situação</th>
                            <th style="width: 10%">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($manutencao as $manu) { ?>
                        <tr>
                            <td><?php echo sprintf("%'03d", $manu['os_id']) ; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($manu['os_data_abertura'])) ?> - <?php echo $manu['os_hora_abertura'] ?></td>
                            <td><?php echo $manu['os_tipo'] ?></td>
                            <td><?php echo $manu['os_km_atual'] ?></td>
                            <td><?php echo $manu['os_titulo'] ?></td>
                            <td><?php foreach($situacao as $situa) {
                                    if($situa['situacaoos_id'] == $manu['os_situacao_id']){
                                        echo $situa['situacaoos_nome'];
                                    } 
                                }
                                ?>   
                            </td>
                            <td>R$ <?php echo number_format($manu['total'], 4, ',', '.') ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <h4><b>TÍTULOS:</b></h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 15%">N° Doc</th>
                            <th style="width: 10%">Data</th>
                            <th style="width: 20%">Tipo</th>
                            <th style="width: 25%">Tomador</th>
                            <th style="width: 15%">N° OS</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($titulos as $ttl){ ?>
                        <tr>
                            <td><?php echo $ttl['titulos_numeroserie'] ?></td>
                            <td><?php echo $ttl['titulos_vencimento']  ?></td>
                            <td><?php echo $ttl['titulos_tipo']['tm_nome'] ?></td>
                            <td><?php
                                if($ttl['cli'] != null){
                                    echo $ttl['cli']['cliente_nome'];
                                }else if($ttl['forne'] != null){
                                    echo $ttl['forne']['fornecedor_nome'];
                                }else{
                                    echo "NÃO POSSUI";
                                }
                            ?></td>
                            <td><?php echo $ttl['titulos_numos'] ?></td>
                            <td>R$ <?php if(!is_array($ttl['titulos_valor']) && is_numeric($ttl['titulos_valor'])){echo number_format($ttl['titulos_valor'], 4, ',', '.');}else {echo number_format(0, 4, ',', '.');}   ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Frota Sintética | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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