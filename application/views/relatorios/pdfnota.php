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
                <h3 style="font-weight: bold">MOVIMENTO N° <?php echo sprintf("%'03d", $nota['notafiscal_id']); ?> - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <h4>DESCRIÇÃO DO MOVIMENTO: </h4>
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
                            <td class="td-impar" colspan=3><span class="span-data">Número da Nota: </span><?php echo $nota['notafiscal_numero'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Série da Nota: </span><?php echo $nota['notafiscal_serie'] ?></td>
                            <td class="td-impar" colspan=1><span class="span-data">Folhas: </span><?php echo $nota['notafiscal_folhas'] ?></td>
                            <td class="td-impar" colspan=5><span class="span-data">Tipo da Operação: </span><?php echo $nota['notafiscal_operacao']['tm_nome'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=3><span class="span-data">Espércie da Nota: </span><?php echo $nota['notafiscal_especie'] ?></td>
                            <td colspan=2><span class="span-data">Data Emissão: </span><?php echo date('d/m/Y', strtotime($nota['notafiscal_dtemissao'])) ?></td>
                            <td colspan=2><span class="span-data">Data Saida: </span><?php echo date('d/m/Y', strtotime($nota['notafiscal_dtsaida'])) ?></td>
                            <td colspan=2><span class="span-data">Hora Saida: </span><?php echo $nota['notafiscal_hsaida'] ?></td>
                            <td colspan=3><span class="span-data">Transportadora: </span><?php echo $nota['notafiscal_nometrans'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">CNPJ: </span><?php echo $nota['notafiscal_cnpjtrans'] ?></td>
                            <td class="td-impar" colspan=2><span class="span-data">Placa do Veículo: </span><?php echo $nota['notafiscal_placaveic'] ?></td>
                            <td class="td-impar" colspan=7><span class="span-data">Fornecedor: </span><?php echo $nota['notafiscal_fornecedor']['fornecedor_nome'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=2><span class="span-data">Valor Frete: </span>R$ <?php echo number_format($nota['notafiscal_vlrfrete'], 4, ',', '.') ?></td>
                            <td colspan=2><span class="span-data">Valor ICMS: </span>R$ <?php echo number_format($nota['notafiscal_valoricms'], 4, ',', '.') ?></td>
                            <td colspan=2><span class="span-data">Valor IPI: </span>R$ <?php echo number_format($nota['notafiscal_valoripi'], 4, ',', '.') ?></td>
                            <td colspan=2><span class="span-data">Base ICMS Sub: </span>R$ <?php echo number_format($nota['notafiscal_bcicmssub'], 4, ',', '.') ?></td>
                            <td colspan=2><span class="span-data">Valor ICMS Sub: </span>R$ <?php echo number_format($nota['notafiscal_valoricmssub'], 4, ',', '.') ?></td>
                            <td colspan=2><span class="span-data">Valor Final: </span>R$ <?php echo number_format($nota['notafiscal_valorfinal'], 4, ',', '.') ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <h4>PRODUTOS:</h4>
                <table class="table table-hover table-bordered">
                    <?php foreach($estoques as $est){ ?>
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 10%">Data</th>
                            <th style="width: 10%">Qtd</th>
                            <th style="width: 80%">Produto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo date('d/m/Y', strtotime($est['estoque_data_insert'])) ?></td>
                            <td><?php echo $est['estoque_quantidade'] ?></td>
                            <td><?php echo $est['estoque_produto']['produto_nome']." | ".$est['estoque_produto']['produto_modelo'] ?></td>
                        </tr>
                        <tr style="background-color: #eee;">
                            <td colspan=3>
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
                                        <tr style="background-color: #eee;">
                                            <td colspan=3><span class="span-data">Código da Peça: </span><?php echo $est['estoque_produto']['produto_codigo'] ?></td>
                                            <td colspan=5><span class="span-data">Nome da Peça: </span><?php echo $est['estoque_produto']['produto_nome'] ?></td>
                                            <td colspan=4><span class="span-data">Modelo da Peça: </span><?php echo $est['estoque_produto']['produto_modelo'] ?></td>
                                        </tr>
                                        <tr style="background-color: #eee;">
                                            <td colspan=6><span class="span-data">Fabricante: </span><?php echo $est['estoque_produto']['produto_fabricante'] ?></td>
                                            <td colspan=6><span class="span-data">Fornecedor: </span><?php echo $est['estoque_produto']['produto_fornecedor']['fornecedor_nome'] ?></td>
                                        </tr>
                                        <tr style="background-color: #eee;">
                                            <td colspan=3><span class="span-data">Valor da Peça: </span>R$ <?php echo number_format($est['estoque_produto']['produto_preco_custo'], 4, ',', '.') ?></td>
                                            <td colspan=3><span class="span-data">Valor no Movimento: </span>R$ <?php echo number_format($est['estoque_valor'], 4, ',', '.') ?></td>
                                            <td colspan=2><span class="span-data">Qtd: </span><?php echo $est['estoque_quantidade'] ?></td>
                                            <?php $res = (float) $est['estoque_valor'] * (int) $est['estoque_quantidade']; ?>
                                            <td colspan=4><span class="span-data">Valor Total na Nota: </span>R$ <?php echo number_format($res, 4, ',', '.') ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Movimento Sintético | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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