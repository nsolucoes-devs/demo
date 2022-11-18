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
                <h3 style="font-weight: bold">TÍTULO N° <?php echo sprintf("%'03d", $titulo['titulos_id']) ; ?> - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <h4>DESCRIÇÃO DO TÍTULO: </h4>
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
                    <?php $i = $titulo['titulos_baixa']; ?>
                    <tbody>
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">N° Série: </span><?php echo $titulo['titulos_numeroserie']; ?></td>
                            <td class="td-impar" colspan=<?php if($i != 1) { echo '4';} else { echo '5';} ?>><span class="span-data">Tipo: </span><?php echo $titulo['titulos_tipo']['tm_nome']?></td>
                            <?php if ($i != 1) { ?>
                            <td class="td-impar" colspan=3><span class="span-data">Valor à Pagar: </span>R$ <?php echo number_format($titulo['titulos_valor'], 4, ',', '.') ?></td>
                            <?php } ?>
                            <td class="td-impar" colspan=<?php if($i != 1) { echo '2';} else { echo '4';} ?>><span class="span-data"><?php if($i != 1) { echo 'Atraso (Dias): ';} else { echo 'Responsável pela Baixa: ';} ?></span><?php echo $titulo['titulos_responsavel']['usuario_nome'].$atraso ?></td>
                        </tr>
                        <tr>
                            <td colspan=4><span class="span-data">Fornecedor/Cliente: </span><?php echo $titulo['titulos_forneclin'] ;?></td>
                            <td colspan=4><span class="span-data">Frota: </span><?php if($titulo['titulos_frota']) { echo $titulo['titulos_frota']['frota_placa']. ' | ' .$titulo['titulos_frota']['frota_codigo']; } ?></td>
                            <td colspan=4><span class="span-data">Movimentação: </span><?php echo $titulo['titulos_IO'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">Vencimento: </span><?php echo $titulo['titulos_vencimento'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Juros: </span><?php echo $titulo['titulos_juros'] ?> %</td>
                            <td class="td-impar" colspan=3><span class="span-data">Multa: </span><?php echo $titulo['titulos_multa'] ?> %</td>
                            <td class="td-impar" colspan=3><span class="span-data">Desconto: </span><?php echo $titulo['titulos_desconto'] ?> %</td>
                        </tr>
                        <?php if ($i == 1) { ?>
                        <tr>
                            <td colspan=4><span class="span-data">Data da Baixa: </span> <?php echo $titulo['titulos_data_baixa'] ?></td>
                            <td colspan=4><span class="span-data">Valor Pago: </span>R$ <?php echo number_format($titulo['titulos_valorpago'], 4, ',', '.') ?></td>
                            <td colspan=4><span class="span-data">Forma de Pagamento: </span> <?php echo $titulo['titulos_formapag'] ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <?php if ($i != 1) { ?>
                                <td colspan=12><span class="span-data">Observação: </span> <?php echo $titulo['titulos_observacao'] ?></td>
                            <?php } else { ?>
                                <td class="td-impar" colspan=12><span class="span-data">Observação: </span><?php echo $titulo['titulos_observacao'] ?></td>
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Título Sintético | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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