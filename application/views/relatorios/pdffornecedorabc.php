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
                <h3 style="font-weight: bold">Fornecedores ABC  - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <div>
                    <h4 style="padding-top: 20px"><b>FORNECEDORES ABC:</b></h4>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr style="background-color: #eee;">
                            <th style="width: 25%">Nome</th>
                            <th style="width: 7%">CNPJ</th>
                            <th style="width: 7%">Telefone</th>
                            <th style="width: 5%">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($fornecedores as $f) { ?>
                        <tr>
                            <td><?php echo $f['nome'] ?></td>
                            <td><?php echo $f['cnpj'] ?></td>
                            <td><?php if($f['telefone'] != "() -"){echo $f['telefone'];}else{echo "NÃO INSERIDO";} ?></td>
                            <td>R$ <?php echo number_format($f['total'], 4, ',' , '.') ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <footer id="footer" style="position: fixed; bottom: 0; text-align: center; margin-bottom: -30px; margin-bottom: -30px; width: 100%; display: none">
            <div class="row">
                <div class="col-md-5 text-left">
                    <p><b>Fornecedores ABC | <?php echo date('d/m/Y - H:i:s') ?></b></p>
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