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
                <h3 style="font-weight: bold">ORDEM DE SERVIÇO N° <?php echo $os['os_id'] ?> - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <h3>DESCRIÇÃO DA ORDEM DE SERVIÇO: </h3>
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
                            <td class="td-impar" colspan=12><span class="span-data">Título: </span><?php echo $os['os_titulo'] ?></td>
                        </tr>
                        
                        <tr>
                            <td colspan=4><span class="span-data">Tipo de Manutenção: </span><?php echo $os['os_tipo'] ?></td>
                            <td colspan=4><span class="span-data">Local da Manutenção: </span><?php echo $os['os_local'] ?></td>
                            <td colspan=4><span class="span-data">Status da Manutenção: </span><?php echo $os['os_situacao'] ?></td>
                        </tr>
                        
                        <tr>
                            <td class="td-impar" colspan=3><span class="span-data">Data de Abertura: </span><?php echo date('d/m/Y', strtotime($os['os_data_abertura'])) ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Hora de Abertura: </span><?php echo $os['os_hora_abertura'] ?></td>
                            <td class="td-impar" colspan=6><span class="span-data">Prestador do Serviço: </span><?php echo $os['os_prestador'] ?></td>
                        </tr>
                        
                        <tr>
                            <td colspan=8><span class="span-data">Frota: </span><?php echo $os['os_frota'] ?></td>
                            <td colspan=2><span class="span-data">Km / Hr Atual: </span><?php echo $os['os_km_atual'] ?></td>
                            <td colspan=2><span class="span-data">Km / Hr Anterior: </span><?php echo $os['os_km_anterior'] ?></td>
                        </tr>
                        
                        <tr>
                            <td class="td-impar" colspan=12 style="text-align: justify"><span class="span-data">Detalhes: </span><br><?php echo $os['os_detalhe'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <h3>ANDAMENTOS:</h3>
                <table class="table table-hover table-bordered">
                    <?php foreach($andamentos as $and){ ?>
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 10%">Data</th>
                            <th style="width: 7%">Hora</th>
                            <th>Título</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $and['data'] ?></td>
                            <td><?php echo $and['hora'] ?></td>
                            <td><?php echo $and['titulo'] ?></td>
                        </tr>
                        <tr style="background-color: #eee;">
                            <td colspan=3>
                                <p><?php echo $and['detalhes'] ?></p>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="title-inside span-data">Peças:</p>
                                        <table class="inside-table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Qtd</th>
                                                    <th>Unitário</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($and['pecas'] as $pc){ ?>
                                                <tr class="sep-tr">
                                                    <td style="width: 50%"><?php echo $pc['nome'] ?></td>
                                                    <td style="width: 10%"><?php echo $pc['qtd'] ?></td>
                                                    <td style="width: 20%">R$ <?php echo $pc['valor_un'] ?></td>
                                                    <td style="width: 20%">R$ <?php echo $pc['total'] ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <p class="title-inside span-data">Serviços:</p>
                                        <table class="inside-table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Qtd</th>
                                                    <th>Unitário</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($and['servs'] as $sv){ ?>
                                                <tr class="sep-tr">
                                                    <td style="width: 50%"><?php echo $sv['nome'] ?></td>
                                                    <td style="width: 10%"><?php echo $sv['qtd'] ?></td>
                                                    <td style="width: 20%">R$ <?php echo $sv['valor_un'] ?></td>
                                                    <td style="width: 20%">R$ <?php echo $sv['total'] ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h4><span class="span-data">Subtotal: </span>R$ <?php echo $and['total_pc'] ?></h4>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h4><span class="span-data">Subtotal: </span>R$ <?php echo $and['total_sv'] ?></h4>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <h3>VALORES:</h3>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 33.33%">PEÇAS</th>
                            <th style="width: 33.33%">SERVIÇOS</th>
                            <th style="width: 33.33%">TOTAL DA O.S</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="font-size: 20px">R$ <?php echo $total_p ?></td>
                            <td style="font-size: 20px">R$ <?php echo $total_s ?></td>
                            <td style="font-size: 20px">R$ <?php echo $os['total'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php if($os['os_situacao_id'] == 4){ ?>
        <div class="row">
            <div class="col-md-12 form-group">
                <h3>ENCERRAMENTO:</h3>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 25%">Data de Fechamento</th>
                            <th style="width: 25%">Hora de Fechamento</th>
                            <th style="width: 50%">Responsável pelo Fechamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo date('d/m/Y', strtotime($os['os_data_fechamento'])) ?></td>
                            <td><?php echo $os['os_hora_fechamento'] ?></td>
                            <td><?php echo $user_f ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Ordem de Serviço Sintética | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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