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
    .custom-border{
        font-size: 14px;
        border-radius: 4px;
        border: 2px solid black;
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
                <h3 style="font-weight: bold">RELATÓRIO DE MOVIMENTOS - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                
                <?php if($filtros['peca'] != "" || $filtros['forn'] != "" || $filtros['de'] != "" || $filtros['ate'] != ""){ 
                    $str1 = $str2 = $str3 = $str4 = "";
                    if($filtros['peca'] != ""){
                        $str1 = "PEÇAS: ".$filtros['peca']['produto_nome']; 
                    }
                    if($filtros['forn'] != ""){
                        $str2 = "FORNECEDOR: ".$filtros['forn']['fornecedor_nome']; 
                    }
                    if($filtros['de'] != ""){
                        $str3 = "DE ".$filtros['de']; 
                    }
                    if($filtros['ate'] != ""){
                        $str4 = "ATÉ ".$filtros['ate']; 
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
                <h4>MOVIMENTOS:</h4>
                <table class="table table-hover table-bordered">
                    <?php $i = 0; foreach($movimentos as $mov){ ?>
                    <?php if($i != 0){echo '<tr><td colspan=6></td></tr>';} ?>
                    <thead>
                        <tr style="background-color: #eee;">
                            <th>Nº Série</th>
                            <th>Data</th>
                            <th>Tipo</th>
                            <th>Fornecedor</th>
                            <th>Espécie</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $mov['notafiscal_numero'].$mov['notafiscal_serie'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($mov['notafiscal_dtemissao'])) ?></td>
                            <td><?php echo $mov['notafiscal_operacao']['tm_nome'] ?></td>
                            <td><?php echo $mov['fornecedor']['fornecedor_nome'] ?></td>
                            <td><?php echo $mov['notafiscal_especie'] ?></td>
                            <td>R$ <?php echo number_format($mov['notafiscal_valorfinal'], 4, ',', '.') ?></td>
                        </tr>
                        <?php if($mov['estoque'] != null && $mov['estoque'] != ""){ ?>
                        <tr style="background-color: #eee;">
                            <td colspan=6>
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr style="background-color: #eee;">
                                            <th>Peça</th>
                                            <th>Fabricante</th>
                                            <th>Qtd</th>
                                            <th>Valor Un.</th>
                                            <th>Valor Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($mov['estoque'] as $est){ ?>
                                        <tr>
                                            <td><?php echo $est['produto']['produto_nome']." | ".$est['produto']['produto_modelo'] ?></td>
                                            <td><?php echo $est['produto']['produto_fabricante'] ?></td>
                                            <td><?php echo $est['estoque_quantidade'] ?></td>
                                            <td>R$ <?php echo number_format($est['estoque_valor'], 4, ',', '.') ?></td>
                                            <?php $res = (float) $est['estoque_valor'] * (int) $est['estoque_quantidade']; ?>
                                            <td>R$ <?php echo number_format($res, 4, ',', '.') ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php $i++; } ?>
                </table>
                <div class="row">
                    <div class="col-md-12 form-group text-right">
                        <table style="width: 100%">
                            <thead>
                                <tr>
                                    <td style="width: 70%"></td>
                                    <td class="custom-border text-center" style="width: 30%"><b>TOTAL DOS MOVIMENTOS: R$ <?php echo number_format($total, 4, ',', '.') ?></b></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Relatório de Movimentos | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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