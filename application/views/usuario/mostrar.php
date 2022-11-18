        
            <style>
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    border-radius: 5px;
                    background-color: white;
                }
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
                }
                .btn-primary{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:hover{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:focus{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-success:disabled{
                    background-color: #5cb85c;
                    border-color: #4cae4c;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <h2><?php echo $user['usuario_nome'] ?></h2>
                            </div>
                            <div class="col-md-3 form-group text-right">
                                <a class="btn btn-primary" href="<?php echo base_url('usuarios') ?>"><i class="fas fa-angle-left"></i>&nbsp;Voltar</a>
                            </div>
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>CPF</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['cpf'] ?>" disabled>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>RG</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_rg'] ?>" disabled>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Data de Nascimento</label><br>
                                <input type="date" class="form-control" value="<?php echo $user['usuario_nascimento'] ?>" disabled>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Função</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['func']['funcao_nome'] ?>" disabled>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Telefone</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_telefone'] ?>" disabled>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Celular</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_celular'] ?>" disabled>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>CEP</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_cep'] ?>" disabled>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-10 form-group">
                                <label>Logradouro</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_endereco'] ?>" disabled>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Número</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_numero'] ?>" disabled>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Bairro</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_bairro'] ?>" disabled>
                            </div>
                            <div class="col-md-5 form-group">
                                <label>Cidade</label>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_cidade'] ?>" disabled>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Estado</label><br>
                                <input type="text" class="form-control" value="<?php echo $user['usuario_estado'] ?>" disabled>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <style>
                            .semana{
                                width: 100%;
                                border: 1px solid lightgray;
                            }
                            .semana tr th{
                                background-color: lightgrey;
                                width: calc(100% / <?php echo count($dias) ?>);
                                text-align: center;
                                padding: 3px 0;
                            }
                            .semana tr td{
                                border: 1px solid lightgrey;
                                text-align: center;
                                padding: 3px 0;
                            }
                        </style>
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <h4>Dias de Acesso</h4>
                                <br>
                                <table class="semana">
                                    <thead>
                                        <tr>
                                            <?php foreach($dias as $dia){echo "<th>".$dia['dia']."</th>";} ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach($dias as $dia){echo "<td>".$dia['de']." às ".$dia['ate']."</td>";} ?>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
