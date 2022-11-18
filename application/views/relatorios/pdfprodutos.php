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
                <h3 style="font-weight: bold">PEÇAS  - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                <?php if($grupo != null && $grupo != ""){ 
                echo "<br><h4>FILTRO DE GRUPO ATIVO: ".$grupo['gp_nome']."</h4>";
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <div>
                    <h4 style="padding-top: 20px"><b>PEÇAS:</b></h4>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 5%">ID</th>
                            <th style="width: 10%">Código</th>
                            <th style="width: 20%">Nome</th>
                            <th style="width: 15%">Modelo</th>
                            <th style="width: 15%">Grupo de Peças</th>
                            <th style="width: 7%">QTD</th>
                            <th style="width: 7%">Preço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pecas as $peca) { ?>
                        <tr>
                            <td><?php echo $peca['produto_id'] ?></td>
                            <td><?php echo $peca['produto_codigo'] ?></td>
                            <td><?php echo $peca['produto_nome'] ?></td>
                            <td><?php echo $peca['produto_modelo'] ?></td>
                            <td><?php echo $peca['grupo']['gp_nome'] ?></td>
                            <td><?php $soma = 0; foreach($estoques as $estoque) { 
                                if($estoque['estoque_produto_id'] == $peca['produto_id']){
                                    $soma = $soma + $estoque['estoque_quantidade'];
                                }
                            } echo $soma; ?>
                            </td>
                            <td>R$ <?php echo number_format($peca['produto_preco_venda'], 4, ',', '.'); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Peças | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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