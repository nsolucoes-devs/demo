<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="N Soluções Agência Digital - www.nsoluti.com.br" />
    <title>Gestão de Frotas</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('resources/'); ?>assets/img/favicon.ico">
    
    <!--<link href="<?php echo base_url('resources');?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url('resources/js/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('resources/js/select2/dist/css/select2-bootstrap.min.css'); ?>" rel="stylesheet" />
    <script src="<?php echo base_url('resources');?>/lib/jquery/jquery.min.js"></script>
    <link href="<?php echo base_url('resources');?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- CSS do novo template -->
    <link href="<?php echo base_url('template/assets/libs/chartist/dist/chartist.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('template/dist/css/style.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('template/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/14793ef9b8.js" crossorigin="anonymous"></script>
    
    <!-- teste flip -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/nnattawat/flip/master/dist/jquery.flip.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

</head>
    
<body>
    
    <style>
        .drop-selected{
            color: black!important;
        }
        .margin-menu{
            margin-left: 10%;
        }
    </style>
    
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand">
                        <b class="logo-icon">
                            GERENCIAMENTO DE FROTAS
                        </b>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        
        <!-- ==============================================================
                Array
                (
                    [0] => Usuarios
                    [1] => Cadastros
                    [2] => Produtos
                    [3] => Manutenção
                    [4] => Frota
                )
             ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <div class="row">
                                <div class="col-12 text-center" style="padding: 20px 20% 0px 20%">
                                    <a href="<?php echo base_url('home/index') ?>">
                                        <img src="<?php echo base_url('resources/imgs/') ?>logo.png" style="width: 100%;">
                                    </a>
                                </div>
                                <div class="col-12 text-center" style="padding-top: 40px">
                                    <p style="font-size: 1.5em"><b><?php $aux = explode(" ", $this->session->userdata('nome')); echo $aux[0]; ?></b></p>
                                </div>
                            </div>
                        </li>

                        
                        
                        <li class="sidebar-item <?php if($pag == '1'){echo "selected";} ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false" href="<?php echo base_url('home/index') ?>">
                                <i class="mdi mdi-sitemap"></i>
                                <span class="hide-menu">Home</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php if($pag == '2'){echo "selected";} ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" aria-expanded="false" data-toggle="collapse">
                                <i class="mdi mdi-contacts"></i>
                                <span class="hide-menu">Cadastros</span>
                            </a>
                            <ul class="collapse list-unstyled margin-menu" id="cadastrosSubmenu" style="margin-left: 20px">
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" aria-expanded="false" data-toggle="collapse">
                                        <i class="mdi mdi-account-multiple"></i>
                                        <span class="hide-menu">Usuários</span>
                                    </a>
                                    <ul class="collapse list-unstyled" id="cadastrosSubmenu2" style="margin-left: 40px">
                                        <li class="sidebar-item" style="padding-right: 60px"> 
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('usuario/index') ?>" aria-expanded="false">
                                                <i class="mdi mdi-animation"></i>
                                                <span class="hide-menu">Listagem</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item" style="padding-right: 60px"> 
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('cadastros/funcoes') ?>" aria-expanded="false">
                                                <i class="mdi mdi-wrench"></i>
                                                <span class="hide-menu">Funções</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('cadastros/fornecedores') ?>" aria-expanded="false">
                                        <i class="mdi mdi-human-handsdown"></i>
                                        <span class="hide-menu">Fornecedores</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('cadastros/tipos_documentos') ?>" aria-expanded="false">
                                        <i class="mdi mdi-archive"></i>
                                        <span class="hide-menu">Tipos de Documentos</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('cliente/listagem') ?>" aria-expanded="false">
                                        <i class="mdi mdi-human-handsup"></i>
                                        <span class="hide-menu">Clientes</span>
                                    </a>
                                </li>
                                
                                <li class="sidebar-item <?php if($pag == '3'){echo "selected";} ?>"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('motoristas/listagem') ?>" aria-expanded="false">
                                        <i class="mdi mdi-worker"></i>
                                        <span class="hide-menu">Motoristas</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sidebar-item <?php if($pag == '8'){echo "selected";} ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="#" aria-expanded="false" data-toggle="collapse">
                                <i class="mdi mdi-layers"></i>
                                <span class="hide-menu">Estoque</span>
                            </a>
                            <ul class="collapse list-unstyled margin-menu" id="cadastrosSubmenu3" style="margin-left: 20px">
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('estoque/indice') ?>" aria-expanded="false">
                                        <i class="mdi mdi-chart-bar"></i>
                                        <span class="hide-menu">Movimento de Estoque</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('estoque/tiposMovimento') ?>" aria-expanded="false">
                                        <i class="mdi mdi-chart-bar"></i>
                                        <span class="hide-menu">Tipos de Movimento</span>
                                    </a>
                                </li>

                                <li class="sidebar-item <?php if($pag == '4'){echo "selected";} ?>"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('produtos/listagem') ?>" aria-expanded="false">
                                        <i class="mdi mdi-screwdriver"></i>
                                        <span class="hide-menu">Peças</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-item <?php if($pag == '5'){echo "selected";} ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="#" aria-expanded="false" data-toggle="collapse">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span class="hide-menu">Manutenção</span>
                            </a>
                            <ul class="collapse list-unstyled margin-menu" id="cadastrosSubmenu3" style="margin-left: 20px">
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('manutencao/listagem') ?>" aria-expanded="false">
                                        <i class="mdi mdi-format-align-justify"></i>
                                        <span class="hide-menu">Listagem</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('manutencao/servicos') ?>" aria-expanded="false">
                                        <i class="mdi mdi-view-dashboard"></i>
                                        <span class="hide-menu">Serviços</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('pneus/indice') ?>" aria-expanded="false">
                                        <i class="mdi mdi-checkbox-multiple-blank-circle"></i>
                                        <span class="hide-menu">Pneus</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php if($pag == '6'){echo "selected";} ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" aria-expanded="false" data-toggle="collapse">
                                <i class="mdi mdi-truck"></i>
                                <span class="hide-menu">Frota</span>
                            </a>
                            <ul class="collapse list-unstyled margin-menu" id="cadastrosSubmenu5" style="margin-left: 20px">
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/listagem') ?>" aria-expanded="false">
                                        <i class="mdi mdi-truck-delivery"></i>
                                        <span class="hide-menu">Veículos</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" aria-expanded="false" data-toggle="collapse">
                                        <i class="mdi mdi-checkbox-multiple-blank-circle"></i>
                                        <span class="hide-menu">Pneus</span>
                                    </a>
                                    <ul class="collapse list-unstyled" id="cadastrosSubmenu6" style="margin-left: 40px">
                                        <li class="sidebar-item" style="padding-right: 60px"> 
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/unidades_pneus') ?>" aria-expanded="false">
                                                <i class="mdi mdi-arrow-right-bold-circle"></i>
                                                <span class="hide-menu">Cadastro de Pneus</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item" style="padding-right: 60px"> 
                                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/tipos_pneus') ?>" aria-expanded="false">
                                                <i class="mdi mdi-checkbox-blank-circle-outline"></i>
                                                <span class="hide-menu">Tipos de Pneus</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/marcas') ?>" aria-expanded="false">
                                        <i class="mdi mdi-octagram"></i>
                                        <span class="hide-menu">Marcas</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/modelos') ?>" aria-expanded="false">
                                        <i class="mdi mdi-camera-rear"></i>
                                        <span class="hide-menu">Modelos</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/tipos_veiculo') ?>" aria-expanded="false">
                                        <i class="mdi mdi-ambulance"></i>
                                        <span class="hide-menu">Tipos de Veículos</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/tipos_munck') ?>" aria-expanded="false">
                                        <i class="mdi mdi-water-pump"></i>
                                        <span class="hide-menu">Tipos de Munck</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/tipos_cabine') ?>" aria-expanded="false">
                                        <i class="mdi mdi-truck-trailer"></i>
                                        <span class="hide-menu">Tipos de Cabine</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('frota/status') ?>" aria-expanded="false">
                                        <i class="mdi mdi-car-wash"></i>
                                        <span class="hide-menu">Status de Veículo</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item <?php if($pag == '7'){echo "selected";} ?>"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="#" aria-expanded="false" data-toggle="collapse">
                                <i class="mdi mdi-margin"></i>
                                <span class="hide-menu">Financeiro</span>
                            </a>
                            <ul class="collapse list-unstyled margin-menu" id="cadastrosSubmenu3" style="margin-left: 20px">
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('financeiro/indice') ?>" aria-expanded="false">
                                        <i class="mdi mdi-file-send"></i>
                                        <span class="hide-menu">Lançamento de Notas</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('contas/telaCadastro') ?>" aria-expanded="false">
                                        <i class="mdi mdi-library-plus"></i>
                                        <span class="hide-menu">Tipos de Contas</span>
                                    </a>
                                </li>
                                <li class="sidebar-item" style="padding-right: 20px"> 
                                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('contas/telaTodasDespesas') ?>" aria-expanded="false">
                                        <i class="mdi mdi-book-multiple-variant"></i>
                                        <span class="hide-menu">Despesas</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('login/sair') ?>" aria-expanded="false">
                                <i class="mdi mdi-exit-to-app"></i>
                                <span class="hide-menu">Sair</span>
                            </a>
                        </li>
                        
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <script>
                window.onload = function(){
                    $('.sidebar-link').each(function(){
                        if($(this).hasClass('active')){
                            $(this).removeClass('active');
                        }
                    });
                    $('.collapse').each(function(){
                        if($(this).hasClass('in')){
                            $(this).removeClass('in');
                        }
                    });
                }
            </script>