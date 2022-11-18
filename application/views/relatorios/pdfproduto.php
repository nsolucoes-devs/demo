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
                <h3 style="font-weight: bold">PEÇA N° <?php echo $this->uri->segment(2); ?>- <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <h4>DESCRIÇÃO DO PEÇA: </h4>
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
                            <td class="td-impar" colspan=4><span class="span-data">Código: <?php echo $peca['produto_codigo'] ?></span></td>
                            <td class="td-impar" colspan=4><span class="span-data">Modelo: <?php echo $peca['produto_modelo'] ?></span></td>
                            <td class="td-impar" colspan=4><span class="span-data">Fabricante: <?php echo $peca['produto_fabricante'] ?></span></td>
                        </tr>
                        <tr>
                            <td colspan=4><span class="span-data">Fornecedor: <?php echo $fornecedor['fornecedor_nome'] ?></span></td>
                            <td colspan=3><span class="span-data">Preço de Custo: R$ <?php echo number_format($peca['produto_preco_custo'], 4, ',', '.') ?></span></td>
                            <td colspan=3><span class="span-data">Preço de Venda: R$ <?php echo number_format($peca['produto_preco_venda'], 4, ',', '.'); ?></span></td>
                            <td colspan=2><span class="span-data">QTD: <?php echo $quantidade ?></span></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">Un de Medida: <?php echo $peca['produto_un_medida'] ?></span></td>
                            <td class="td-impar" colspan=5><span class="span-data">Comprimento X Largura X Altura: <?php echo number_format($peca['produto_comprimento'], 4) . ' X ' . number_format($peca['produto_largura'], 4) . ' X ' . number_format($peca['produto_altura'], 4)?></span></td>
                            <td class="td-impar" colspan=2><span class="span-data">Un de Peso: <?php echo $peca['produto_un_peso'] ?></span></td>
                            <td class="td-impar" colspan=2><span class="span-data">Peso: <?php echo number_format($peca['produto_peso'], 4) ?></span></td>
                        </tr>
                        <tr>
                            <td colspan=3><span class="span-data">SKU: <?php echo $peca['produto_sku'] ?></span></td>
                            <td colspan=3><span class="span-data">NCM: <?php echo $peca['produto_ncm'] ?></span></td>
                            <td colspan=3><span class="span-data">CEST: <?php echo $peca['produto_cest'] ?></span></td>
                            <td colspan=3><span class="span-data">UPC: <?php echo $peca['produto_upc'] ?></span></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">EAN: <?php echo $peca['produto_ean'] ?></span></td>
                            <td class="td-impar" colspan=3><span class="span-data">JAN: <?php echo $peca['produto_jan'] ?></span></td>
                            <td class="td-impar" colspan=3><span class="span-data">ISBN: <?php echo $peca['produto_isbn'] ?></span></td>
                            <td class="td-impar" colspan=3><span class="span-data">MPN: <?php echo $peca['produto_mpn'] ?></span></td>
                        </tr>
                        <tr>
                            <td colspan=12><span class="span-data">Detalhes: <?php echo $peca['produto_detalhes'] ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Peça | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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