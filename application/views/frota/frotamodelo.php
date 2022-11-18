        
            <style>
                body {
                    padding-right: 0!important
                }
                .tableFixHead          { overflow-y: auto; height: 600px;}
                .tableFixHead thead th { position: sticky; top: 0; }
                
                /* Just common table stuff. Really. */
                table  { border-collapse: collapse; width: 100%; }
                th, td { padding: 8px 16px; }
                th     { background:#eee; }
                
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    background-color: white;
                    border-radius: 5px;
                }
                .dataTables_wrapper .row{
                    width: 101%;
                    margin-bottom: 15px;
                }
                .pagination{
                    margin-top: 0px;
                }
                .dataTables_length label select{
                    margin-left: 10px;
                    margin-right: 10px;
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
                .pagination>.active>a{
                    background-color: #033557;
                }
                .pagination>.active>a:hover{
                    background-color: #033557;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
                    background: white;
                    border-color: white;
                }
                .btn-info-red{
                    float: right;
                    margin-right: 15px;
                    width: 25px;
                    height: 25px;
                    border: 2px solid black;
                    border-radius: 50%;
                    text-align: center;
                    color: red;
                    cursor: pointer;
                }
                .btn-info-red:hover{
                    color: black;
                }
                .swal2-title{
                    font-size: 25px;
                }
                .swal2-content{
                    font-size: 20px;
                }
                .swal2-styled.swal2-confirm{
                    font-size: 15px;
                }
                @media (min-width: 500px){
                    .swal2-popup.swal2-modal.swal2-show{
                        width: 40%;
                    }
                }
                .see-pass{
                    width: 10%;
                    margin-left: -4px;
                    margin-top: -2px;
                    border-top-left-radius: 0;
                    border-bottom-left-radius: 0;
                }
                .passwd{
                    width: 50%;
                    display: inline;
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0;
                }
                .modal-header{
                    justify-content: unset; 
                    text-align: left;
                }
                .modal-footer{
                    position: relative;
                }
                .btn-left{
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
                        
                        <div style="margin-bottom: 10px">
                            <?php if($this->session->userdata('editar') == 1) { ?>
                            <a data-toggle="modal" data-target="#modalCadastro" class="btn btn-primary" style="color: white">Novo Modelo</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1){ ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                            
                        <div class="input-group-append" style="position: absolute; right: 55px; height: 4.4%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>    
                            
                        <div class="tableFixHead">
                            <table id="myTableTipo" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Marca</th>
                                        <th style="width: 180px">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($modelos as $modelo){ ?>
    			                    <?php if($this->session->userdata('ativar') == 1){ ?>
                                        <tr <?php if($modelo['frota_modelo_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                                            <td style="padding-top: 12px!important;"><?php echo ucwords(strtolower(mb_strtoupper($modelo['frota_modelo_nome']))) ?></td>
                                            <td style="padding-top: 12px!important;"><?php foreach($marcas as $marca){if($modelo['frota_modelo_marca_id'] == $marca['frota_marca_id']){echo ucwords(strtolower(mb_strtoupper($marca['frota_marca_nome'])));}} ?></td>
                                            <?php if($modelo['frota_modelo_ativo_id'] != 2){ ?>
                                                <td class="text-center">
                                                    <?php if($this->session->userdata('ver') == 1){ ?>
                			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $modelo['frota_modelo_id'] ?>)" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
                			                        <?php } ?>
                			                        <?php if($this->session->userdata('editar') == 1){ ?>
                			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $modelo['frota_modelo_id'] ?>)" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
                			                        <?php } ?>
                			                        <?php if($this->session->userdata('excluir') == 1){ ?>
                			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $modelo['frota_modelo_id'] ?>')"><i class="fas fa-trash"></i></i></a>
                			                        <?php } ?>
                                                </td>
                                            <?php } else { ?>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $modelo['frota_modelo_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } else if($modelo['frota_modelo_ativo_id'] != 2){ ?>
                                    <tr>
                                        <td style="padding-top: 12px!important;"><?php echo ucwords(strtolower(mb_strtoupper($modelo['frota_modelo_nome']))) ?></td>
                                        <td style="padding-top: 12px!important;"><?php foreach($marcas as $marca){if($modelo['frota_modelo_marca_id'] == $marca['frota_marca_id']){echo ucwords(strtolower(mb_strtoupper($marca['frota_marca_nome'])));}} ?></td>
                                        <td style="text-align: center">
                                            <?php if($modelo['frota_modelo_ativo_id'] == 1){ if($this->session->userdata('ver') == 1){ ?>
        			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $modelo['frota_modelo_id'] ?>)" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
        			                        &nbsp;&nbsp;
        			                        <?php } } ?>
        			                        <?php if($this->session->userdata('editar') == 1){ ?>
        			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $modelo['frota_modelo_id'] ?>)" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
        			                        <?php } ?>
        			                        <?php if($modelo['frota_modelo_ativo_id'] == 1){ if($this->session->userdata('excluir') == 1){ ?>
        			                        &nbsp;&nbsp;
        			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $modelo['frota_modelo_id'] ?>')"><i class="fas fa-trash"></i></i></a>
        			                        <?php } } ?>
                                        </td>
                                    </tr>
                                    <?php } 
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <!-- modalReativar -->
            <div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="modalAtivarTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja reativar a modelo?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('frota/ativarModelo') ?>" method="post">
                                        <input type="hidden" name="modelo_idatv" id="modelo_idatv">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha_a" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn_a"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalCadastroLabel">Cadastro de Modelo de Veículo/Maquinário</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('frota/insertModelo') ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Nome do Modelo</label><br>
                                        <input type="text" class="form-control" id="nome_c" name="nome_c" placeholder="Ex.: 113H" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Marca</label><br>
                                        <div style="width: 85%; float: left;">
                                            <select class="selectcadastromodelo-filtro"  style="width: 100%!important" id="marca_c" name="marca_c" required>
                                                <option disabled selected>-- Selecionar --</option>
                                                <?php foreach($marcas_a as $marca){ ?>
                                                    <option value="<?php echo $marca['frota_marca_id'] ?>"><?php echo $marca['frota_marca_nome'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div style="width: 14%; float: left;">
                                            <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" onclick="showMarca()"><em class="fa fa-plus"></em></button>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Tipo de Veículo/Maquinário</label><br>
                                        <div style="width: 85%; float: left;">
                                            <select class="selectcadastromodelo-filtro" id="tipo_c" name="tipo_c"  style="width: 100%!important" required>
                                                <option disabled selected>-- Selecionar --</option>
                                                <?php foreach($tipos_a as $tipo){ ?>
                                                    <option value="<?php echo $tipo['frota_tipo_id'] ?>"><?php echo $tipo['frota_tipo_nome'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div style="width: 14%; float: left;">
                                            <button type="button" class="btn btn-primary" style="margin-left: 20%; width: 80%" onclick="showTipo()"><em class="fa fa-plus"></em></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVerLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalVerLabel">Visualizar Modelo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label>Nome do Modelo</label><br>
                                    <label id="nome_v" style="font-size: 16px; color: black"></label>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Ativação</label><br>
                                    <label id="ativo_v" style="font-size: 16px; color: black"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Marca</label><br>
                                    <label id="marca_v" style="font-size: 16px; color: black"></label>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Tipo de Veículo</label><br>
                                    <label id="tipo_v" style="font-size: 16px; color: black"></label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
            
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalEditarLabel">Edição de Modelo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('frota/insertModelo') ?>">
                            <input type="hidden" name="isedit" id="isedit" value="1"/>
                            <input type="hidden" name="id_e" id="id_e">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-8 form-group">
                                        <label>Nome do Modelo</label><br>
                                        <input type="text" class="form-control" id="nome_e" name="nome_e" placeholder="Ex.: 113H" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Ativação</label>
                                        <select class="selecteditarmodelo-filtro"  style="width: 100%!important" name="ativo_e" id="ativo_e" required>
                                            <?php foreach($ativos as $ativo){ ?>
                                                <option value="<?php echo $ativo['ativo_id'] ?>"><?php echo $ativo['ativo_tipo'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Marca</label>
                                        <select class="selecteditarmodelo-filtro"  style="width: 100%!important" name="marca_e" id="marca_e" required>
                                            <?php foreach($marcas_a as $marca){ ?>
                                                <option value="<?php echo $marca['frota_marca_id'] ?>"><?php echo $marca['frota_marca_nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Tipo</label>
                                        <select class="selecteditarmodelo-filtro"  style="width: 100%!important" name="tipo_e" id="tipo_e" required>
                                            <?php foreach($tipos_a as $tipo){ ?>
                                                <option value="<?php echo $tipo['frota_tipo_id'] ?>"><?php echo $tipo['frota_tipo_nome'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalCadastroLabel">Excluir Modelo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o modelo de veículo?</h4>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary btn-left" style="color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('frota/deleteModelo') ?>" method="post">
                                        <input type="hidden" name="idmodelo" id="idmodelo">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal de Cadastro Dinâmico de Marca  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="marcaModal" tabindex="-1" role="dialog" aria-labelledby="marcaModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="marcaModalLabel">Nova Marca</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" aria-label="Close" onclick="hideMarca()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formMarca">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome da Marca</label><br>
                                        <input type="text" class="form-control" id="nome_marca" placeholder="Nome" required oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="hideMarca()">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Modal de Cadastro Dinâmico de Tipo de Vaeículo  -->
            <!-- ============================================================== -->
            <div class="modal fade" id="tipoModal" tabindex="-1" role="dialog" aria-labelledby="tipoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="tipoModalLabel">Novo Tipo</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" aria-label="Close" onclick="hideTipo()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form id="formTipo">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Tipo de Veículo</label><br>
                                        <input type="text" class="form-control" id="nome_tipo" placeholder="Nome" required oninput="this.setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="hideTipo()">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                    $('.selectcadastromodelo-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalCadastro')});
                    $('.selecteditarmodelo-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalEditar')});
                    $('#myTableTipo').DataTable( {
                        "order": [[ 0, "asc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_",
                            "zeroRecords": "Nada encontrado- refaça sua busca",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "Sem registros disponíves",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "searchPlaceholder": "Digite sua busca",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"Modelo": "first", "orderable": true},
                            {"Marca": "second", "orderable": true},
                            {"Ação": "second", "orderable": false},
                        ],
                    } );
                    $('select[name ="myTableTipo_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableTipo_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Modelo excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possivel excluir o modelo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Modelo reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar o modelo pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
                });
            </script>
            
            <script>
                function ver(id){
                    
                    var dados = {
                        'frota_modelo_id': id
                    };
                            
                    $.ajax({
                        url : '<?php echo base_url('frota/getModeloById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                            $("#nome_v").html(res.frota_modelo_nome);
                            
                            <?php foreach($marcas as $marca){ ?>
                                if(res.frota_modelo_marca_id == '<?php echo $marca['frota_marca_id'] ?>'){
                                    $("#marca_v").html('<?php echo $marca['frota_marca_nome'] ?>');
                                }
                            <?php } ?>
                            <?php foreach($tipos as $tipo){ ?>
                                if(res.frota_modelo_tipo_id == '<?php echo $tipo['frota_tipo_id'] ?>'){
                                    $("#tipo_v").html('<?php echo $tipo['frota_tipo_nome'] ?>');
                                }
                            <?php } ?>
                            
                            if(res.frota_modelo_ativo_id == 2){
                                $("#ativo_v").html('Inativo');
                            }else{
                                $("#ativo_v").html('Ativo');
                            }
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
                function editar(id){
                    var dados = {
                        'frota_modelo_id': id
                    };
                            
                    $.ajax({
                        url : '<?php echo base_url('frota/getModeloById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                            $("#id_e").val(res.frota_modelo_id);
                            $("#nome_e").val(res.frota_modelo_nome);
                            $("#ativo_e").val(res.frota_modelo_ativo_id).change();
                            $("#marca_e").val(res.frota_modelo_marca_id).change();
                            $("#tipo_e").val(res.frota_modelo_tipo_id).change();
                        },
                        error : function(xhr, status, error) {
                            alert(status + " " + error + " " + xhr);
                        }
                    });
                }
            </script>
            
            <script>
                function excluir(id){
                    document.getElementById('idmodelo').value = id;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('modelo_idatv').value = id;
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
            </script>
            
            <script>
                function showMarca(){
                    $('#modalCadastro').css('display', 'none');
                    $('#marcaModal').modal('show');
                }
                
                function hideMarca(){
                    $('#marcaModal').modal('hide');
                    $('#nome_marca').val('');
                    $('#modalCadastro').css('display', 'block');
                }
                
                $('#formMarca').submit(function(e){
                    e.preventDefault();
                    if($('#nome_marca').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_marca').val());
                        $.ajax({
                            url: '<?php echo base_url('frota/marcaInsert'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert('formMarca.submit(): ' + xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    refreshMarca();
                                    hideMarca()
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        document.getElementById('nome_marca').setCustomValidity('Por favor, insira um nome válido!');
                        document.getElementById('nome_marca').reportValidity()
                    }
                });
                
                function refreshMarca(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshMarcas') ?>',
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option disabled selected>-- Selecionar --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_marca_id+"'>"+response[i].frota_marca_nome+"</option>";
                            }
                            $('#marca_c').html(refresh);
                        },
                        error : function(xhr, status, error) {
                            alert('refreshMarca(): ' + xhr.responseText);
                        }
                    });
                }
            </script>
            
            <script>
                function showTipo(){
                    $('#modalCadastro').css('display', 'none');
                    $('#tipoModal').modal('show');
                }
                
                function hideTipo(){
                    $('#tipoModal').modal('hide');
                    $('#nome_tipo').val('');
                    $('#modalCadastro').css('display', 'block');
                }
                
                $('#formTipo').submit(function(e){
                    e.preventDefault();
                    if($('#nome_tipo').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_tipo').val());
                        $.ajax({
                            url: '<?php echo base_url('frota/tipoInsert'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert('formTipo.submit(): ' + xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    refreshTipo();
                                    hideTipo()
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        document.getElementById('nome_tipo').setCustomValidity('Por favor, insira um nome válido!');
                        document.getElementById('nome_tipo').reportValidity()
                    }
                });
                
                function refreshTipo(){
                    $.ajax({
                        url : '<?php echo base_url('frota/refreshTipo') ?>',
                        type : 'POST',
                        dataType : 'json',
                        success : function(response) {
                            var refresh = "<option disabled selected>-- Selecionar --</option>";
                            for(var i = 0; i < response.length; i++){
                                refresh += "<option value='"+response[i].frota_tipo_id+"'>"+response[i].frota_tipo_nome+"</option>";
                            }
                            $('#tipo_c').html(refresh);
                        },
                        error : function(xhr, status, error) {
                            alert('refreshTipo(): ' + xhr.responseText);
                        }
                    });
                }
            </script>
            
            <script>
                $('#senha_btn').on('click', function(){
                    const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            
            <script>
                $('#senha_btn_a').on('click', function(){
                    const type = $('#senha_a').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha_a').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn_a').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn_a').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            