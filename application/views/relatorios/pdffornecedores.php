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
                <h3 style="font-weight: bold">FORNECEDORES  - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
                <br>
                <?php if($filtro != "" && $filtro != null){
                    echo "<h4>FILTRO DE ESTADO ATIVO: ".$filtro."</h4>";
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <div>
                    <h4 style="padding-top: 20px"><b>FORNECEDORES:</b></h4>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 15%">CNPJ</th>
                            <th style="width: 28%">Nome</th>
                            <th style="width: 11%">Telefone Fixo</th>
                            <th style="width: 11%">Celular</th>
                            <th style="width: 5%">Estado</th>
                            <th style="width: 15%">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($fornecedores as $f){ ?>
                        <tr>
                            <td><?php echo $f['cpfcnpj'] ?></td>
                            <td><?php echo $f['fornecedor_nome'] ?></td>
                            <td><?php echo $f['tel'] ?></td>
                            <td><?php echo $f['cel'] ?></td>
                            <td><?php echo $f['fornecedor_estado'] ?></td>
                            <td><?php echo $f['fornecedor_email'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; width: 100%; margin-bottom: -30px; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Fornecedores | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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