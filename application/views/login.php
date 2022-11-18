<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="N Soluções Agência Digital - www.nsoluti.com.br" />
        <title>Logística</title>
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('resources/'); ?>assets/img/favicon.ico">

        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
	    <meta property="og:description" content=""/>
	    <meta name="twitter:title" content="" />
	    <meta name="twitter:image" content="" />
	    <meta name="twitter:url" content="" />
	    <meta name="twitter:card" content="" />
        <!-- Facebook and Twitter integration end -->

        <link href="<?php echo base_url('resources');?>/imgs/apple-touch-icon.png" rel="apple-touch-icon">
        <link href="<?php echo base_url('resources');?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url('resources');?>/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url('resources');?>/css/style-responsive.css" rel="stylesheet">
        <script src="<?php echo base_url('resources');?>/lib/jquery/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/14793ef9b8.js" crossorigin="anonymous"></script>

    </head>

    <body onload="erro()">
        
        <style>
            .btn-theme{
                background-color: #033557;
                border-color: #033557;
            }
            .btn-theme:hover{
                background-color: #033557;
                border-color: #033557;
            }
            .btn-theme:focus{
                background-color: #033557;
                border-color: #033557;
            }
            ::selection {
                background: #fff;
                color: #033557;
            }
        </style>
        
        <!-- **********************************************************************************************************************************************************
            Connteúdo Principal
        *********************************************************************************************************************************************************** -->
        <div id="login-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center" style="margin-top: 10%; margin-bottom: 50px;">
                        <img src="<?php echo base_url('resources/imgs/logonova.png') ?>" style="width: 70%; height: auto">
                    </div>
                </div>
                <form class="form-login" action="<?php echo base_url('login/validar'); ?>" method="post" style="margin-top: 0px">
                    <h2 class="form-login-heading" style="background-color: #033557">Validar Credenciais</h2>
                    <div class="login-wrap">
                        <input type="text" class="form-control" placeholder="Usuário" autofocus name="login" id="login">
                        <br>
                        <input type="password" class="form-control" placeholder="Senha" name="senha" id="senha">
                        <br>
                        <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> ACESSAR</button>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <a data-toggle="modal" data-target="#esqueci" style="font-size: 14px; cursor: pointer">Esqueci minha senha</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        
    
        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-dialog">
        
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #033557">
                        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
                        <h4 class="modal-title">Mensagem do Sistema</h4>
                    </div>
                    <div class="modal-body">
                        <p id="msg_erro" style="font-size: 20px"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
        
            </div>
        </div>
        
        <div id="esqueci" class="modal">
            <div class="modal-dialog">
        
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #033557">
                        <button type="button" class="close" data-dismiss="modal" style="color: white">&times;</button>
                        <h4 class="modal-title">Mensagem do Sistema</h4>
                    </div>
                    <div class="modal-body">
                        <p style="font-size: 20px">Para efetuar a alteração da sua senha, por favor entre em contato com um administrador!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
        
            </div>
        </div>
        
        <script src="<?php echo base_url('resources');?>/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('resources');?>/lib/jquery.backstretch.min.js"></script>
        <script>
            function erro(){
                var aux = <?php echo $erro ?>;
                if(aux == null){
                    document.getElementById('msg_erro').innerHTML = "Sem erro";
                    $('#myModal').modal('show');
                }else if(aux == 1){
                    document.getElementById('msg_erro').innerHTML = "Usuário incorreto!";
                    $('#myModal').modal('show');
                }else if(aux == 2){
                    document.getElementById('msg_erro').innerHTML = "Senha incorreta!";
                    $('#myModal').modal('show');
                }else if(aux == 3){
                    document.getElementById('msg_erro').innerHTML = "Usuário inativo, contate um administrador para realizar a reativação!";
                    $('#myModal').modal('show');
                }
            }
        
            $.backstretch("img/login-bg.jpg", {
                speed: 500
            });
        </script>

    </body>

</html>