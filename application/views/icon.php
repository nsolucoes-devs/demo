<style>
    .mdi {
        font-size: 60px;
        color: white;
    }

    .tile-footer {
        text-align: center;
    }

    .body {
        border-radius: 7px;
        text-align: center;

    }

    .mcor-s {
        font-size: 60px;
        color: white;
    }

    .tile-primary-s {
        background-color: black !important;
        padding: 10px;
        border-radius: 5px;
    }

    a:hover .tile-body-sair,
    a:hover .mcor-s {
        color: white !important;
        background-color: grey !important;
    }

    a:hover .tile-body-perfil,
    a:hover .mcor-p {
        color: black !important;
        background-color: white !important;
    }

    a:hover .tile-body-cadastros,
    a:hover .mcor-c {
        color: black !important;
        background-color: #9da9b0 !important;
    }

    a:hover .tile-body-estoque,
    a:hover .mcor-e {
        color: black !important;
        background-color: #afeeee !important;
    }

    a:hover .tile-body-frota,
    a:hover .mcor-f {
        color: black !important;
        background-color: #ffe0ff !important;
    }

    a:hover .tile-body-manutencao,
    a:hover .mcor-m {
        color: black !important;
        background-color: #ffb6c1 !important;
    }

    a:hover .tile-body-financeiro,
    a:hover .mcor-fi {
        color: black !important;
        background-color: #ffffed !important;
    }

    a:hover .tile-body-checklist,
    a:hover .mcor-cl {
        color: black !important;
        background-color: #c8a2c8 !important;
    }

    .tile-primary {
        background-color: #033557 !important;
        padding: 10px;
        border-radius: 5px;
    }

    .tile-footer b {
        color: white;
    }
</style>

<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">MENU</h4>
                    <div class="row">
                        
                        <?php if ($pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('perfil'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-perfil body">
                                            <i class="mcor-p mdi mdi-account-circle"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>PERFIL</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('notificacoes'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-perfil body">
                                            <i class="mcor-p mdi mdi-account-circle"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>NOTIFICAÇÕES</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('configuracao'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-perfil body">
                                            <i class="mcor-p mdi mdi-account-circle"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>CONFIGURACÕES</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        <?php } ?>

                        <?php if ($pag == '6' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('clientes'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-cadastros body">
                                            <i class="mcor-c mdi mdi-account-plus"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>CLIENTES</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('fornecedores'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-cadastros body">
                                            <i class="mcor-c mdi mdi-account-plus"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>FORNECEDORES</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('motoristas'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-cadastros body">
                                            <i class="mcor-c mdi mdi-account-plus"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>MOTORISTAS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('usuarios'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-cadastros body">
                                            <i class="mcor-c mdi mdi-account-plus"></i>
                                        </div>
                                        <h></h>
                                        <div class="tile-footer">
                                            <b>USUÁRIOS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('funcoes'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-cadastros body">
                                            <i class="mcor-c mdi mdi-account-plus"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>FUNCÕES</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('documentos'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-cadastros body">
                                            <i class="mcor-c mdi mdi-account-plus"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>TIPOS DE DOCUMENTOS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        <?php } ?>

                        <?php if ($pag == '3' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('pecas'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-estoque body">
                                            <i class="mcor-e mdi mdi-package-variant-closed"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>PEÇAS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('movimentosestoque'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-estoque body">
                                            <i class="mcor-e mdi mdi-package-variant-closed"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>MOVIMENTO DE ESTOQUE</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('operacoesestoque'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-estoque body">
                                            <i class="mcor-e mdi mdi-package-variant-closed"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>OPERAÇÕES DE ESTOQUE</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        <?php } ?>

                        <?php if ($pag == '4' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('veiculos'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>VEÍCULOS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('pneus'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>CADASTRO DE PNEUS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('tipospneu'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>TIPOS DE PNEUS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('marcasveiculo'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>MARCAS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <br>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('modelos'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>MODELOS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('tiposveiculo'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>TIPOS DE VEÍCULO</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('tiposmunck'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>TIPOS DE MUNCK</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('tiposcabine'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>TIPOS DE CABINE</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <br>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('statusveiculo'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-frota body">
                                            <i class="mcor-f mdi mdi-truck"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>STATUS DE VEÍCULO</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        <?php } ?>

                        <?php if ($pag == '5' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('obra/listagem'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-estoque body">
                                            <i class="mcor-e mdi mdi-worker"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>LISTAGEM</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('obra/cadastro'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-estoque body">
                                            <i class="mcor-e mdi mdi-worker"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>CADASTRO</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        <?php } ?>

                        <?php if ($pag == '9' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('ativo/listagem'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-estoque body">
                                            <i class="mcor-e mdi mdi-monitor"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>LISTAGEM</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('ativo/cadastro'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-estoque body">
                                            <i class="mcor-e mdi mdi-monitor"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>CADASTRO</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>                            
                        <?php } ?>

                        <?php if ($pag == '7' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('ordemdeservicos'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-manutencao body">
                                            <i class="mcor-m mdi mdi-wrench"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>MANUTENÇÕES</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('servicos'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-manutencao body">
                                            <i class="mcor-m mdi mdi-wrench"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>SERVIÇOS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <!-- <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('manutencaopneus'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-manutencao body">
                                            <i class="mcor-m mdi mdi-wrench"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>PNEUS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div> -->
                        <?php } ?>

                        <?php if ($pag == '2' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('movimentosfinanceiro'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-financeiro body">
                                            <i class="mcor-fi mdi mdi-bank"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>LANÇAMENTO DE NOTAS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('financeiro/notasfiscais'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-financeiro body">
                                            <i class="mcor-fi mdi mdi-bank"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>Notas Fiscais</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <!--
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <a href="<?php echo base_url('todasdespesas'); ?>">
                                        <div class="title tile-primary">
                                            <div class="tile-body-financeiro body">
                                                <i class="mcor-fi mdi mdi-bank"></i>
                                            </div>
                                            <div class="tile-footer">
                                                <b>DESPESAS</b>
                                            </div>
                                        </div>
                                        </a>
                                        <br>
                                    </div>
                                    -->
                        <?php } ?>

                        <?php if ($pag == '8' || $pag == '0') { ?>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('checkitens'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-checklist body">
                                            <i class="mcor-cl mdi mdi-playlist-check"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>CADASTRO DE ITENS</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('checkgerar'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-checklist body">
                                            <i class="mcor-cl mdi mdi-playlist-check"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>GERAR CHECKLIST</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <a href="<?php echo base_url('checkpreencher'); ?>">
                                    <div class="title tile-primary">
                                        <div class="tile-body-checklist body">
                                            <i class="mcor-cl mdi mdi-playlist-check"></i>
                                        </div>
                                        <div class="tile-footer">
                                            <b>PREENCHER CHECKLIST</b>
                                        </div>
                                    </div>
                                </a>
                                <br>
                            </div>
                        <?php } ?>

                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <a href="<?php echo base_url('sair'); ?>">
                                <div class="title tile-primary-s">
                                    <div class="tile-body-sair body">
                                        <i class="mcor-s mdi mdi-exit-to-app"></i>
                                    </div>
                                    <div class="tile-footer">
                                        <b>SAIR</b>
                                    </div>
                                </div>
                            </a>
                            <br>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->