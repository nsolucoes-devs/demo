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
                <h3 style="font-weight: bold">FORNECEDOR SINTÉTICO - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <h4>DADOS DO FORNECEDOR: </h4>
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
                            <td class="td-impar" colspan=12><span class="span-data">Nome: </span><?php echo $forn['fornecedor_nome'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=3><span class="span-data">CNPJ/CPF: </span><?php echo $forn['cpfcnpj'] ?></td>
                            <td colspan=6><span class="span-data">Razão: </span><?php echo $forn['fornecedor_razao'] ?></td>
                            <td colspan=3><span class="span-data">Inscrição Estadual: </span><?php echo $forn['fornecedor_ie'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=6><span class="span-data">Endereço: </span><?php echo $forn['fornecedor_endereco'] ?></td>
                            <td class="td-impar" colspan=6><span class="span-data">Bairro: </span><?php echo $forn['fornecedor_bairro'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=3><span class="span-data">Complemento: </span><?php echo $forn['fornecedor_complemento'] ?></td>
                            <td colspan=3><span class="span-data">CEP: </span><?php echo $forn['cep'] ?></td>
                            <td colspan=3><span class="span-data">Cidade: </span><?php echo $forn['fornecedor_cidade'] ?></td>
                            <td colspan=3><span class="span-data">Estado: </span><?php echo $forn['fornecedor_estado'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-impar" colspan=8><span class="span-data">Representante: </span><?php echo $forn['fornecedor_representante'] ?></td>
                            <td class="td-impar" colspan=4><span class="span-data">Tel Representante: </span><?php echo $forn['tel_representante'] ?></td>
                        </tr>
                        <tr>
                            <td colspan=3><span class="span-data">Tel Empresa: </span><?php echo $forn['fixo'] ?></td>
                            <td colspan=3><span class="span-data">Celular: </span><?php echo $forn['cel'] ?></td>
                            <td colspan=6><span class="span-data">E-mail: </span><?php echo $forn['fornecedor_email'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Fornecedor Sintético | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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