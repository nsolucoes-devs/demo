<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
    $mobile = 1;
} else {
    $mobile = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="N Soluções Agência Digital - www.nsoluti.com.br" />
    <title>Gestão de Frotas</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('resources/'); ?>assets/img/favicon.ico">

    <link href="<?php echo base_url('resources'); ?>/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url('resources/js/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('resources/js/select2/dist/css/select2-bootstrap.min.css'); ?>" rel="stylesheet" />
    <script src="<?php echo base_url('resources'); ?>/lib/jquery/jquery.min.js"></script>
    <link href="<?php echo base_url('resources'); ?>/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />

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

    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>


    <!-- Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>

<body>
    <style>
        .drop-selected {
            color: black !important;
        }

        .ativado {
            background-color: #9da9b0 !important;
        }

        .ativado span {
            color: white !important;
        }

        .ativado .mdi {
            color: white !important;
        }

        .ativo {
            background-color: #033557 !important;
        }

        .ativo span {
            color: white !important;
        }

        .ativo .mdi {
            color: white !important;
        }

        .ativo .icone {
            color: white !important;
        }

        .sub-item-ativado {
            background-color: #9da9b0 !important;
        }

        .sub-sub-item-ativado {
            background-color: #e4edf2 !important;
        }

        .principal {
            background-color: #033557 !important;
        }

        .principal span {
            color: white !important;
        }

        .principal .mdi {
            color: white !important;
        }

        .navbar .notification {
            position: absolute;
            top: 5px;
            border: 1px solid #FFF;
            right: 10px;
            font-size: 9px;
            background: #f44336;
            color: #FFFFFF;
            min-width: 20px;
            padding: 0px 5px;
            height: 20px;
            border-radius: 10px;
            text-align: center;
            line-height: 19px;
            vertical-align: middle;
            display: block;
        }

        .tablet {
            display: inline;
        }

        .list-unstyled {
            margin-left: 10%;
        }

        .dropdown-toggle:after {
            border-top: 0 !important;
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5" style="z-index: 5;">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a style="margin-left: auto" class="navbar-brand" href="<?php echo base_url('inicio'); ?>">
                        <img style="height: 80px; width: 147px;" src="<?php echo base_url('resources/'); ?>imgs/logobranca.png" alt="user">&nbsp;
                        <?php if ($mobile == 0) { ?>
                            <b class="logo-icon" style="padding-left: 95%; font-size: 23px;">
                                GESTÃO DE FROTAS
                            </b>
                        <?php } ?>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a style="margin-left: auto" class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i style="margin-top: 25%; color: #2d2d2d; border-radius: 50px;background: #b3b3b3;padding: 8px; font-size: 20px;" class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="<?php echo base_url('perfil'); ?>">
                                    <i class="ti-user m-r-5 m-l-5"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#notifyModal">
                                    <i class="ti-wallet m-r-5 m-l-5"></i>
                                    Notificações
                                </a>
                                <a class="dropdown-item" href="<?php echo base_url('configuracao'); ?>"><i class="ti-settings m-r-5 m-l-5"></i>
                                    Configurações
                                </a>
                                <a class="dropdown-item" href="<?php echo base_url('login/sair'); ?>">
                                    <i class="mdi mdi-exit-to-app"></i>
                                    <span class="hide-menu">Sair</span>
                                </a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">

                        <li class="tablet sidebar-item <?php if ($pag == '1') {
                                                            echo "selected";
                                                        } ?>">
                            <a id="ref0" class="<?php if ($pag == '1') {
                                                    echo "ativo";
                                                } ?> sidebar-link  waves-effect waves-dark sidebar-link" href="<?php echo base_url('inicio'); ?>" aria-expanded="false">
                                <i class="mdi mdi-home"></i>
                                <span class="hide-menu"><b>Dashboard</b></span>
                            </a>
                        </li>

                        <?php if (in_array("CADASTROS", $links)) { ?>
                            <li class="tablet sidebar-item <?php if ($pag == '6') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref1" onclick="trocaicone1()" class="<?php if ($pag > '6' && $pag < '7') {
                                                                                echo "ativo";
                                                                            } ?> <?php if ($pag == '6') {
                                                                                        echo "principal";
                                                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url('#'); ?>" aria-expanded="false" data-toggle="collapse">
                                    <i class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu"><b>Cadastros</b></span>
                                    <i id="iconeid1" class="fa fa-plus-square-o icone" aria-hidden="true" style="font-size: 10px"></i>
                                </a>
                                <ul id="ul6" class="collapse list-unstyled">
                                    <li class="tablet sidebar-item <?php if ($pag == '6.4') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '6.4') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('clientes'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Clientes</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '6.2') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '6.2') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('fornecedores'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Fornecedores</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '6.5') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '6.5') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('motoristas'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Motoristas</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '6.1') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a id="ref2" onclick="trocaicone2()" class="<?php if ($pag == '6.1.1' || $pag == '6.1.2') {
                                                                                        echo "sub-item-ativado";
                                                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url('#'); ?>" aria-expanded="false" data-toggle="collapse">
                                            <span class="hide-menu" style="padding-left: 20px;">&bull; Usuários</span>
                                            <i id="iconeid2" class="fa fa-plus-square-o icone" aria-hidden="true" style="font-size: 10px"></i>
                                        </a>
                                        <ul class="collapse list-unstyled">
                                            <li class="tablet sidebar-item <?php if ($pag == '6.1.1') {
                                                                                echo "selected";
                                                                            } ?>">
                                                <a class="<?php if ($pag == '6.1.1') {
                                                                echo "sub-sub-item-ativado";
                                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('usuarios'); ?>" aria-expanded="false">
                                                    <span class="hide-menu" style="padding-left: 40px;">Listagem</span>
                                                </a>
                                            </li>
                                            <li class="tablet sidebar-item <?php if ($pag == '6.1.2') {
                                                                                echo "selected";
                                                                            } ?>">
                                                <a class="<?php if ($pag == '6.1.2') {
                                                                echo "sub-sub-item-ativado";
                                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('funcoes'); ?>" aria-expanded="false">
                                                    <span class="hide-menu" style="padding-left: 40px;">Funções</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="tablet sidebar-item <?php if ($pag == '6.3') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '6.3') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('documentos'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Tipos de Documentos</span>
                                        </a>
                                    </li>


                                </ul>
                            </li>
                        <?php } ?>

                        <?php if (in_array("ESTOQUE", $links)) { ?>
                            <li class="tablet sidebar-item <?php if ($pag == '3') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref3" onclick="trocaicone3()" class="<?php if ($pag > '3' && $pag < '4') {
                                                                                echo "ativo";
                                                                            } ?> <?php if ($pag == '3') {
                                                                                        echo "principal";
                                                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url(); ?>" aria-expanded="false" data-toggle="collapse">
                                    <i class="mdi mdi-package-variant-closed"></i>
                                    <span class="hide-menu"><b>Estoque</b></span>
                                    <i id="iconeid3" class="fa fa-plus-square-o icone" aria-hidden="true" style="font-size: 10px"></i>
                                </a>
                                <ul id="ul3" class="collapse list-unstyled">
                                    <li class="tablet sidebar-item <?php if ($pag == '3.3') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '3.3') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('pecas'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Peças</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '3.1') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '3.1') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('movimentosestoque'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Movimento de Estoque</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '3.2') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '3.2') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('operacoesestoque'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Operações de Estoque</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '3.4') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '3.4') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('grupospecas'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Grupos de Peças</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if (in_array("FROTA", $links)) { ?>
                            <li class="tablet sidebar-item <?php if ($pag == '4') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref4" onclick="trocaicone4()" class="<?php if ($pag > '4' && $pag < '5') {
                                                                                echo "ativo";
                                                                            } ?> <?php if ($pag == '4') {
                                                                                        echo "principal";
                                                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url('#'); ?>" aria-expanded="false" data-toggle="collapse">
                                    <i class="mdi mdi-truck"></i>
                                    <span class="hide-menu"><b>Frota</b></span>
                                    <i id="iconeid4" class="fa fa-plus-square-o icone" aria-hidden="true" style="font-size: 10px"></i>
                                </a>

                                <ul id="ul4" class="collapse list-unstyled">
                                    <li class="tablet sidebar-item <?php if ($pag == '4.1') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '4.1') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('veiculos'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Veículos</span>
                                        </a>
                                    </li>
                            </li>
                            <li class="tablet sidebar-item <?php if ($pag == '4.3') {
                                                                echo "selected";
                                                            } ?>">
                                <a class="<?php if ($pag == '4.3') {
                                                echo "ativado";
                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('marcasveiculo'); ?>" aria-expanded="false">
                                    <span class="hide-menu" style="padding-left: 20px;">Marcas</span>
                                </a>
                            </li>
                            <li class="tablet sidebar-item <?php if ($pag == '4.4') {
                                                                echo "selected";
                                                            } ?>">
                                <a class="<?php if ($pag == '4.4') {
                                                echo "ativado";
                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('modelos'); ?>" aria-expanded="false">
                                    <span class="hide-menu" style="padding-left: 20px;">Modelos</span>
                                </a>
                            </li>
                            <li class="tablet sidebar-item <?php if ($pag == '4.5') {
                                                                echo "selected";
                                                            } ?>">
                                <a class="<?php if ($pag == '4.5') {
                                                echo "ativado";
                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('tiposveiculo'); ?>" aria-expanded="false">
                                    <span class="hide-menu" style="padding-left: 20px;">Tipos</span>
                                </a>
                            </li>
                            <li class="tablet sidebar-item <?php if ($pag == '4.6') {
                                                                echo "selected";
                                                            } ?>">
                                <a class="<?php if ($pag == '4.6') {
                                                echo "ativado";
                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('tiposmunck'); ?>" aria-expanded="false">
                                    <span class="hide-menu" style="padding-left: 20px;">Tipos de Munck</span>
                                </a>
                            </li>
                            <li class="tablet sidebar-item <?php if ($pag == '4.7') {
                                                                echo "selected";
                                                            } ?>">
                                <a class="<?php if ($pag == '4.7') {
                                                echo "ativado";
                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('tiposcabine'); ?>" aria-expanded="false">
                                    <span class="hide-menu" style="padding-left: 20px;">Tipos de Cabine</span>
                                </a>
                            </li>
                            <li class="tablet sidebar-item <?php if ($pag == '4.8') {
                                                                echo "selected";
                                                            } ?>">
                                <a class="<?php if ($pag == '4.8') {
                                                echo "ativado";
                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('statusveiculo'); ?>" aria-expanded="false">
                                    <span class="hide-menu" style="padding-left: 20px;">Status de Veículo</span>
                                </a>
                            </li>
                            </ul>
                            </li>
                        <?php } ?>

                        <?php if (in_array("OBRA", $links)) { ?>
                            <li class="tablet sidebar-item <?php if ($pag == '5') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref5" onclick="trocaicone5()" class="<?php if ($pag > '5' && $pag < '6') {
                                                                                echo "ativo";
                                                                            } ?> <?php if ($pag == '5') {
                                                                                        echo "principal";
                                                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url('obras'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-worker"></i>
                                    <span class="hide-menu"><b>Obras</b></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (in_array("ATIVOS", $links)) { ?>
                            <li class="tablet sidebar-item <?php if ($pag == '9') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref9" class="<?php if ($pag > '9' && $pag < '10') {
                                                        echo "ativo";
                                                    } ?> <?php if ($pag == '9') {
                                                                echo "principal";
                                                            } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('ativos'); ?>" aria-expanded="false">
                                    <i class="mdi mdi-monitor"></i>
                                    <span class="hide-menu"><b>Ativos</b></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (in_array("MANUTENÇÃO", $links)) { ?>
                            <li class="tablet sidebar-item <?php if ($pag == '7') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref7" onclick="trocaicone7()" class="<?php if ($pag > '7' && $pag < '8') {
                                                                                echo "ativo";
                                                                            } ?> <?php if ($pag == '7') {
                                                                                        echo "principal";
                                                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url('#'); ?>" aria-expanded="false" data-toggle="collapse">
                                    <i class="mdi mdi-wrench"></i>
                                    <span class="hide-menu"><b>Manutenção</b></span>
                                    <i id="iconeid7" class="fa fa-plus-square-o icone" aria-hidden="true" style="font-size: 10px"></i>
                                </a>
                                <ul id="ul7" class="collapse list-unstyled">
                                    <li class="tablet sidebar-item <?php if ($pag == '7.1') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '7.1') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('ordemdeservicos'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Listagem</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '7.2') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '7.2') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('servicos'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;" style="padding-left: 20px;">Serviços</span>
                                        </a>
                                    </li>
                                    <!--<li class="tablet sidebar-item <?php if ($pag == '7.3') {
                                                                            echo "selected";
                                                                        } ?>"> -->
                                    <!--    <a class="<?php if ($pag == '7.3') {
                                                            echo "ativado";
                                                        } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('manutencaopneus'); ?>" aria-expanded="false">-->
                                    <!--        <span class="hide-menu" style="padding-left: 20px;">Pneus</span>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                </ul>
                            </li>
                        <?php } ?>

                        <?php if (in_array("FINANCEIRO", $links)) { ?>
                            <li class="tablet sidebar-item <?php if ($pag == '2') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref7" onclick="trocaicone7()" class="<?php if ($pag == '2') {
                                                                                echo "ativado";
                                                                            } ?>  <?php if ($pag == '2') {
                                                                                        echo "principal";
                                                                                    } ?>  <?php if ($pag > '2' && $pag < '3') {
                                                                                                echo "ativo";
                                                                                            } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url('financeiro'); ?>" aria-expanded="false" data-toggle="collapse">
                                    <i class="mdi mdi-bank"></i>
                                    <span class="hide-menu"><b>Financeiro</b></span>
                                    <i id="iconeid7" class="fa fa-plus-square-o icone" aria-hidden="true" style="font-size: 10px"></i>
                                </a>
                                <ul id="ul2" class="collapse list-unstyled">
                                    <li class="tablet sidebar-item <?php if ($pag == '2.1') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '2.1') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('movimentosfinanceiro'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Lançamentos</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '2.2') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '2.2') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('financeiro/notasfiscais'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Notas Fiscais</span>
                                        </a>
                                    </li>
                                    <!--<li class="tablet sidebar-item <?php if ($pag == '2.2') {
                                                                            echo "selected";
                                                                        } ?>">
                                            <a class="<?php if ($pag == '2.2') {
                                                            echo "ativado";
                                                        } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('tipoconta'); ?>" aria-expanded="false">
                                                <span class="hide-menu" style="padding-left: 20px;">Tipos de Contas</span>
                                            </a>
                                        </li>
                                        <li class="tablet sidebar-item <?php if ($pag == '2.3') {
                                                                            echo "selected";
                                                                        } ?>"> 
                                            <a class="<?php if ($pag == '2.3') {
                                                            echo "ativado";
                                                        } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('todasdespesas'); ?>" aria-expanded="false">
                                                <span class="hide-menu" style="padding-left: 20px;">Despesas</span>
                                            </a>
                                        </li>-->
                                </ul>
                            </li>
                        <?php } ?>

                        <?php //if (in_array("CHECKLIST", $links)) { ?>
                            <!-- <li class="tablet sidebar-item <?php if ($pag == '8') {
                                                                echo "selected";
                                                            } ?>">
                                <a id="ref8" onclick="trocaicone8()" class="<?php if ($pag > '8' && $pag < '7') {
                                                                                echo "ativo";
                                                                            } ?> <?php if ($pag == '8') {
                                                                                        echo "principal";
                                                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link dropdown-toggle" href="<?php echo base_url('#'); ?>" aria-expanded="false" data-toggle="collapse">
                                    <i class="mdi mdi-playlist-check"></i>
                                    <span class="hide-menu"><b>Checklist</b></span>
                                    <i id="iconeid8" class="fa fa-plus-square-o icone" aria-hidden="true" style="font-size: 10px"></i>
                                </a>
                                <ul id="ul8" class="collapse list-unstyled">
                                    <li class="tablet sidebar-item <?php if ($pag == '8.1') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '8.1') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('checkitens'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Cadastro de Itens</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '8.4') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '8.4') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('checklistagem'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Checklist Preenchidos</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '8.2') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '8.2') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('checkgerar'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Gerar CheckList</span>
                                        </a>
                                    </li>
                                    <li class="tablet sidebar-item <?php if ($pag == '8.3') {
                                                                        echo "selected";
                                                                    } ?>">
                                        <a class="<?php if ($pag == '8.3') {
                                                        echo "ativado";
                                                    } ?> sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('checkpreencher'); ?>" aria-expanded="false">
                                            <span class="hide-menu" style="padding-left: 20px;">Preencher CheckList</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                        <?php //} ?>

                <li class="tablet sidebar-item <?php if ($pag == '8') {
                                                    echo "selected";
                                                } ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url('login/sair'); ?>" aria-expanded="false">
                        <i class="mdi mdi-exit-to-app"></i>
                        <span class="hide-menu"><b>Sair</b></span>
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
            <?php if ($pag != '1') { ?>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="page-title"><b><?php echo $titulo ?></b></h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<? echo base_url($raiz); ?>"><?php echo $local ?></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><?php echo $funcao ?></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
            <?php } ?>

            <!-- **===================================** -->
            <!-- ||         NotifyModal START         || -->
            <!-- **===================================** -->
            <style>
                .fix-row {
                    margin-right: -15px;
                    margin-left: -15px;
                    width: 110%;
                }

                @media (min-width: 500px) {
                    #notifyModal .modal-dialog {
                        width: 60% !important;
                        max-width: 60% !important;
                        margin: 5% 20% 0 20% !important;
                    }
                }

                @media (max-width: 499px) {
                    #notifyModal .modal-dialog {
                        width: 90% !important;
                        max-width: 90% !important;
                        margin: 2% 5% 0 5% !important;
                    }
                }

                #notifyModal .modal-title {
                    font-size: 16px;
                }

                #notifyModal .modal-header {
                    justify-content: unset;
                    text-align: left;
                    padding: 10px 15px 10px 15px;
                }

                #notifyModal .close {
                    padding: 5px 7px;
                }

                .rc10 {
                    width: 83.33333333%;
                    float: left;
                    min-height: 1px;
                    padding: 0 15px 0 15px;
                }

                .rc2 {
                    width: 16.66666667%;
                    float: left;
                    min-height: 1px;
                    padding: 0 15px 0 15px;
                }

                .bolota {
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    background-color: #033557;
                    text-align: center;
                }

                .bolota em {
                    color: white;
                    font-size: 34px;
                }

                .bolota2 {
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background-color: #033557;
                    text-align: center;
                    padding-top: 2px;
                }

                .bolota2 em {
                    color: white;
                    font-size: 24px;
                }

                .line-bot {
                    border-bottom: 1px solid lightgrey;
                    padding-bottom: 7px;
                }

                .pt7 {
                    padding-top: 7px;
                }

                #notifyModal .modal-body {
                    overflow-y: auto;
                    height: 400px;
                }

                #notifyModal .modal-body .row {
                    margin-left: 0;
                    margin-right: 5px;
                }

                #notifyModal .modal-body p {
                    margin-bottom: 0;
                }

                .btn-primary {
                    background-color: #033557;
                    border-color: #033557;
                }

                .btn-primary:disabled {
                    background-color: #033557;
                    border-color: #033557;
                }

                .btn-primary:hover {
                    background-color: #033557;
                    border-color: #033557;
                }

                .btn-primary:focus {
                    background-color: #033557;
                    border-color: #033557;
                }

                .notifyText {
                    margin-bottom: 0;
                    font-size: 16px;
                }

                .notifyText {
                    margin-bottom: 0;
                    font-size: 12px;
                }
            </style>

            <!-- **===================================** -->
            <!-- ||          NotifyModal END          || -->
            <!-- **===================================** -->

            <script>
                $(document).ready(function() {

                    if ($("#ref0").hasClass("ativo") == false) {

                        if ($("#ref1").hasClass("ativo")) {
                            $("#iconeid1").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                            if ($("#ref2").hasClass("sub-item-ativado")) {
                                $("#iconeid2").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                            }
                        } else if ($("#ref3").hasClass("ativo")) {
                            $("#iconeid3").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        } else if ($("#ref4").hasClass("ativo")) {
                            $("#iconeid4").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                            if ($("#ref5").hasClass("sub-item-ativado")) {
                                $("#iconeid5").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                            }
                        } else if ($("#ref6").hasClass("ativo")) {
                            $("#iconeid6").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        } else if ($("#ref7").hasClass("ativo")) {
                            $("#iconeid7").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        } else if ($("#ref8").hasClass("ativo")) {
                            $("#iconeid8").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        };
                    }

                });
            </script>

            <script>
                function trocaicone1() {
                    if ($("#iconeid1").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone2() {
                    if ($("#iconeid2").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid2").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone3() {
                    if ($("#iconeid3").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone4() {
                    if ($("#iconeid4").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid4").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone5() {
                    if ($("#iconeid5").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone6() {
                    if ($("#iconeid6").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone7() {
                    if ($("#iconeid7").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone8() {
                    if ($("#iconeid8").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    }
                }

                function trocaicone9() {
                    if ($("#iconeid9").hasClass("fa fa-minus-square-o")) {
                        $("#iconeid9").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                    } else {
                        $("#iconeid1").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid2").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid3").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid4").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid5").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid6").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid7").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid8").removeClass("fa fa-minus-square-o").addClass("fa fa-plus-square-o");
                        $("#iconeid9").removeClass("fa fa-plus-square-o").addClass("fa fa-minus-square-o");
                    }
                }
            </script>