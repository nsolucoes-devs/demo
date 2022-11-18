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
                <h3 style="font-weight: bold"><?php echo $cliente['cliente_nome'] ?> - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <h4><b>DADOS DO CLIENTE:</b></h4>
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
                            <td class="td-impar" colspan=3><span class="span-data">CPF / CNPJ: </span><?php echo $cliente['cpfcnpj'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">RG: </span><?php echo $cliente['cliente_rg'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Incrição Estadual: </span><?php echo $cliente['cliente_ie'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Nascimento: </span><?php echo date('d/m/Y', strtotime($cliente['cliente_nascimento'])) ?></td>
                        </tr>
                        <tr>
                            <td colspan=4><span class="span-data">Nome Fantasia: </span><?php echo $cliente['cliente_fantasia'] ?></td>
                            <td colspan=4><span class="span-data">Razão Social: </span><?php echo $cliente['cliente_razao'] ?></td>
                            <td colspan=4><span class="span-data">Ramo de Atividade: </span><?php echo $cliente['cliente_ramo'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=5><span class="span-data">Rua: </span><?php echo $cliente['cliente_endereco'] ?></td>
                            <td class="td-impar" colspan=1><span class="span-data">N°: </span><?php echo $cliente['cliente_numero'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Bairro: </span><?php echo $cliente['cliente_bairro'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Complemento: </span><?php echo $cliente['cliente_complemento'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=2><span class="span-data">CEP: </span><?php echo $cliente['cep'] ?></td>
                            <td colspan=3><span class="span-data">Cidade: </span><?php echo $cliente['cliente_cidade'] ?></td>
                            <td colspan=1><span class="span-data">Estado: </span><?php echo $cliente['cliente_estado'] ?></td>
                            <td colspan=3><span class="span-data">E-mail: </span><?php echo $cliente['cliente_email'] ?></td>
                            <td colspan=3><span class="span-data">Telefone Fixo: </span><?php echo $cliente['fixo'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=2><span class="span-data">Celular 1: </span><?php echo $cliente['cel1'] ?></td>
                            <td class="td-impar" colspan=2><span class="span-data">Celular 2: </span><?php echo $cliente['cel2'] ?></td>
                            <td class="td-impar" colspan=5><span class="span-data">Contato Nome: </span><?php echo $cliente['cliente_cont'] ?></td>
                            <td class="td-impar" colspan=3><span class="span-data">Contato Tel: </span><?php echo $cliente['telcont'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=3><span class="span-data">CPF / CNPJ do Titular: </span><?php echo $cliente['tit_cpfcnpj'] ?></td>
                            <td colspan=3><span class="span-data">Nome do Titular: </span><?php echo $cliente['cliente_cont'] ?></td>
                            <td colspan=2><span class="span-data">Banco: </span><?php echo $cliente['cliente_banco'] ?></td>
                            <td colspan=2><span class="span-data">Agência: </span><?php echo $cliente['cliente_agencia']." - ".$cliente['cliente_agencia_d'] ?></td>
                            <td colspan=2><span class="span-data">Conta: </span><?php echo $cliente['cliente_conta']." - ".$cliente['cliente_conta_d'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php if($locacoes != null){ ?>
        
        <div class="row">
            <div class="col-md-12 form-group">
                <h4><b>HISTÓRICO DE LOCAÇÕES:</b></h4>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee">
                            <th>ID</th>
                            <th>Veículo</th>
                            <th>De</th>
                            <th>Até</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($locacoes as $loc){ ?>
                        <tr>
                            <td><?php echo $loc['id'] ?></td>
                            <td><?php echo $loc['veiculo'] ?></td>
                            <td><?php echo $loc['data_inicio'] ?></td>
                            <td><?php echo $loc['data_fim'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <?php } ?>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Cliente Sintético | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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
