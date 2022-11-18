<style>
    body {
        padding-right: 0 !important
    }

    .main-row {
        padding-left: 10px;
        padding-right: 10px;
    }

    .main-col-12 {
        padding: 20px;
        border-radius: 5px;
    }

    .row-c {
        width: 110%;
        margin-bottom: 15px;
    }

    .inline {
        display: inline;
    }

    label {
        font-size: 15px;
    }

    .white-tab {
        background-color: white;
        border-radius: 5px;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        background-color: #eee;
    }

    .nav-link {
        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        color: #033557;
    }

    .nav-tabs {
        border-bottom: 0;
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

    .btn-primary:not(:disabled):not(.disabled).active,
    .btn-primary:not(:disabled):not(.disabled):active,
    .show>.btn-primary.dropdown-toggle {
        background-color: #033557;
        border-color: #033557;
    }

    .modal-header {
        justify-content: unset;
        text-align: left;
    }

    .modal-footer {
        position: relative;
    }

    .btn-left {
        position: absolute;
        top: 15px;
        left: 15px;
    }
</style>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <div class="row main-row">
        <div class="col-md-12 main-col-12">

            <form action="<?php echo base_url('ativos/create') ?>" method="POST">

                <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9">
                    <li class="nav-item">
                        <a class="nav-link change-tab-btn" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)"><b>DADOS</b></a>
                    </li>
                </ul>

                <div id="divDados" class="change-tab-div white-tab">
                    <div class="col-md-12" style="background-color:white; border-radius: 5px">


                        <div class="row">

                            <div class="col-md-12 form-group mb-4">
                                <label for="descricao">Descrição</label>
                                <input id="descricao" name="descricao" type="text" class="form-control" required />
                            </div>


                            <div class="col-md-4 form-group mb-4">
                                <label for="marca">Marca</label>
                                <input id="marca" name="marca" type="text" class="form-control" required />
                            </div>

                            <div class="col-md-4 form-group mb-4">
                                <label for="modelo">Modelo</label>
                                <input id="modelo" name="modelo" type="text" class="form-control" required />
                            </div>

                            <div class="col-md-4 form-group mb-4">
                                <label for="numero_serie">N° Série</label>
                                <input id="numero_serie" name="numero_serie" type="text" class="form-control" required />
                            </div>


                            <div class="col-md-4 form-group mb-4">
                                <label for="data_fabricacao">Data Fabricação</label>
                                <input id="data_fabricacao" name="data_fabricacao" type="date" class="form-control" required />
                            </div>

                            <div class="col-md-4 form-group mb-4">
                                <label for="data_entrada">Data Entrada</label>
                                <input id="data_entrada" name="data_entrada" type="date" class="form-control" required />
                            </div>

                            <div class="col-md-4 form-group mb-4">
                                <label for="valor">Valor</label>
                                <input id="valor" name="valor" type="text" class="form-control money" maxlength="30" />
                            </div>

                            <div class="col-md-4 form-group mb-4">
                                <label for="local">Local</label>
                                <input id="local" name="local" type="text" class="form-control" required />
                            </div>

                            <div class="col-md-4 form-group mb-4">
                                <label for="quantidade">Quantidade</label>
                                <input id="quantidade" name="quantidade" type="number" class="form-control" required />
                            </div>

                            <div class="col-md-4 form-group mb-4">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control" aria-label="Seleciane o status do ativo" required>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>


                        </div>

                        <br><br>
                    </div>
                </div>


                <div id="divPn" style="display:none;" class="change-tab-div white-tab">
                    <div class="col-md-12" style="background-color:white; border-radius: 5px">
                        <br><br>

                        <input type="hidden" name="anchor_qtd" id="anchor_qtd">
                        <div id="mainPneus">

                        </div>

                        <br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br><br>
                        <a href="<?php echo base_url('ativos') ?>" class="btn btn-danger">Cancelar</a>
                        &nbsp
                        <button type="submit" id="btn-save" class="btn btn-primary" style="color: white">Salvar</button>
                        <br><br>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->