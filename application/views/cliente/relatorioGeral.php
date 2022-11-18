<div class="row">
    <div class="col-md-12" id="main" style="padding: 20px 40px">
        
        <div class="row">
            <div class="col-md-12 form-group text-center">
                <button onclick="pdf()" id="pdf" class="btn btn-primary" style="float: left">.PDF</button>
                <img src="<?php echo base_url('resources/imgs/banner.png') ?>" style="width: 35%; height: auto">
                <br><br>
                <h4>Relatório de Clientes - <?php date_default_timezone_set('America/Sao_Paulo'); echo date('d/m/Y') ?></h4>
            </div>
        </div>
        <br><br>
        
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>CPF / CNPJ</th>
                    <th>Nome</th>
                    <th>Cidade - UF</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cli){ ?>
                <tr>
                    <td>
                        <?php
                            if(strlen($cli['cliente_cpfcnpj']) == 11){
                                $cpfcnpj = substr($cli['cliente_cpfcnpj'], 0, 3).".".substr($cli['cliente_cpfcnpj'], 3, 3).".".substr($cli['cliente_cpfcnpj'], 6, 3)."-".substr($cli['cliente_cpfcnpj'], 9); 
                            }else{
                                $cpfcnpj = substr($cli['cliente_cpfcnpj'], 0, 2).".".substr($cli['cliente_cpfcnpj'], 2, 3).".".substr($cli['cliente_cpfcnpj'], 5, 3)."/".substr($cli['cliente_cpfcnpj'], 8, 4)."-".substr($cli['cliente_cpfcnpj'], 12);
                            }
                            echo $cpfcnpj;
                        ?>
                    </td>
                    <td>
                        <?php
                            $tam = strlen($cli['cliente_cpfcnpj']);
                            if($tam == 11){
                                $nome = $cli['cliente_nome'];
                            }else{
                                $nome = $cli['cliente_fantasia'];
                            }
                            echo mb_strtoupper($nome);
                        ?>
                    </td>
                    <td><?php echo $cli['cliente_cidade']." - ".$cli['cliente_estado'] ?></td>
                    <td><?php echo $cli['cliente_email'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <footer style="position: fixed; bottom: 0; text-align: center; width: 100%">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Desenvolvido por NSoluções</p>
                </div>
            </div>
        </footer>
        
    </div>
</div>

<script>
    function pdf(){
        $('#pdf').css('display', 'none');
        $('#main').css('padding', '0px 15px');
        window.print();
        $('#main').css('padding', '20px 40px');
        $('#pdf').css('display', 'block');
    }
</script>