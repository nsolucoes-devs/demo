            
            <style>
                .tableFixHead          { overflow-y: auto; height: 600px;}
                .tableFixHead thead th { position: sticky; top: 0; }
                
                .tableFixHead2          { overflow-y: auto; height: 400px;}
                .tableFixHead2 thead th { position: sticky; top: 0; }
                
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
                @media (min-width: 768px){
                    #modalVer .modal-dialog {
                        width: 50%;
                        max-width: 50%;
                        margin: 30px auto;
                    }
                    #modalVer .modal-content{
                        width: 100%;
                    }
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
                
                .encurtar{
                    display: -webkit-box;
                    overflow: hidden;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    word-break: break-word;
                    line-height: 11px!important;
                }
                .dropdown-item{
                    color: black;
                    text-decoration: none;
                    width: 100%;
                    cursor: pointer;
                    background-color: white;
                }
                .dropdown-item:hover{
                    background-color: lightgrey;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        
                        
                        <div style="margin-bottom: 10px;">
                            <div style="margin-left: 91%; font-size: 20px;">
                                <div class="btn-group dropleft">
                                    <button type="button" class="btn btn-primary" style="border-radius: 5px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bars"></i></i></button>
                                    <div class="dropdown-menu" style="top: 33px!important; right: 0px!important;">
                                        <a style="cursor: pointer;" data-toggle="modal" data-target="#modalIndividual" class="dropdown-item">Cadastro de Pneu</a>
                                        <a style="cursor: pointer;" class="dropdown-item" data-toggle="modal" data-target="#modalFiltro">PDF</a>
                                    </div>
                                </div>
                                <a class="btn btn-primary" style="border-radius: 5px;" href="<?php echo base_url('tipospneu')?>"><i class="fas fa-dot-circle"></i></a>
                            </div>
                            <!--
                            <?php if($this->session->userdata('editar') == 1) { ?>
                            <a data-toggle="modal" data-target="#modalIndividual" class="btn btn-primary" style="color: white">Cadastro de Pneu</a>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#modalFiltro"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1){ ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                            -->
                        </div>
                        
                        <br>
                        
                        <div class="input-group-append" style="position: absolute; right: 55px; height: 4.4%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        
                        <div class="tableFixHead">
                            <table id="myTableTipo" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:5%">ID</th>
                                        <th style="width:20%">Marcação</th>
                                        <th style="width:30%">Tipo</th>
                                        <th style="width:23%">Vinculado à Frota</th>
                                        <th style="width:22%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($pneus as $pneu){ ?>
                                    <?php if($this->session->userdata('ativar') == 1){ ?>
                                    <tr <?php if($pneu['pneus_individual_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                                        <td style="padding-top: 12px!important;"><?php echo $pneu['pneus_individual_id'] ?></td>
                                        <td style="padding-top: 12px!important;"><?php echo mb_strtoupper($pneu['pneus_individual_marcacao']) ?></td>
                                        <td style="vertical-align: middle;">
                                            <?php foreach($tipospneu as $tipopneu){
                                                if($tipopneu['frota_pneu_id'] == $pneu['pneus_individual_tipopneu_id']){ ?>
                                                <div class="encurtar" title="<?php echo ucwords(mb_strtolower($tipopneu['frota_pneu_marca'])) . ' | Aro: ' . ucwords(strtolower($tipopneu['frota_pneu_aro'])) . ' | Banda: ' . ucwords(strtolower($tipopneu['frota_pneu_banda']));?>">
                                                    <?php echo ucwords(strtolower(mb_strtoupper($tipopneu['frota_pneu_marca'])) . ' | Aro: ' . ucwords(strtolower($tipopneu['frota_pneu_aro'])) . ' | Banda: ' . ucwords(strtolower($tipopneu['frota_pneu_banda']))); ?>
                                                </div>
                                                <?php }} ?>
                                        </td>
                                        <td style="padding-top: 12px!important;">
                                            <?php if($pneu['pneus_individual_frota_id'] == 0){
                                                    echo 'Nenhum';
                                                }else{
                                                    foreach($frota as $veiculo){
                                                        if($veiculo['frota_id'] == $pneu['pneus_individual_frota_id']){
                                                            foreach($modelos as $modelo){
                                                                if($modelo['frota_modelo_id'] == $veiculo['frota_modelo_id']){
                                                                    foreach($marcas as $marca){
                                                                        if($marca['frota_marca_id'] == $modelo['frota_modelo_marca_id']){
                                                                            echo $veiculo['frota_placa'] . ' | ' . $veiculo['frota_codigo'];
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <?php if($pneu['pneus_individual_ativo_id'] != 2) { ?>
                                            <td class="text-center">
                                                <?php if($this->session->userdata('editar') == 1){ ?>
            			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalRegistro" onclick="registro('<?php echo $pneu['pneus_individual_id']?>', '<?php echo $pneu['pneus_individual_marcacao'] ?>')" class="btn btn-info btn-modal-toggle" alt="Novo Registro" title="Novo Registro"><i class="fab fa-wpforms"></i></a>
            			                        <?php } ?>
            			                        <?php if($this->session->userdata('ver') == 1){ ?>
            			                        <a data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $pneu['pneus_individual_id'] ?>)" class="btn btn-primary" style="font-size: 12px" alt="Ver" title="Ver"><i class="fas fa-eye"></i></a>
            			                        <?php } ?>
            			                        <?php if($this->session->userdata('editar') == 1){ ?>
            			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $pneu['pneus_individual_id'] ?>)" class="btn btn-primary" style="font-size: 12px" alt="Editar Pneu" title="Editar Pneu"><i class="fas fa-pencil-alt"></i></a>
            			                        <?php } ?>
            			                        <?php if($this->session->userdata('excluir') == 1){ ?>
            			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $pneu['pneus_individual_id'] ?>')" alt="Inativar Pneu" title="Inativar Pneu"><i class="fas fa-trash"></i></a>
            			                        <?php } ?>
                                            </td>
                                        <?php } else { ?>
                                            <td class="text-center">
                                                <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $pneu['pneus_individual_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } else if($pneu['pneus_individual_ativo_id'] != 2) { ?>
                                    <tr>
                                        <td><?php echo $pneu['pneus_individual_id'] ?></td>
                                        <td><?php echo $pneu['pneus_individual_marcacao'] ?></td>
                                        <td>
                                            <?php 
                                                foreach($tipospneu as $tipopneu){
                                                    if($tipopneu['frota_pneu_id'] == $pneu['pneus_individual_tipopneu_id']){
                                                        echo $tipopneu['frota_pneu_marca'] . ' | Aro: ' . $tipopneu['frota_pneu_aro'] . ' | Banda: ' . $tipopneu['frota_pneu_banda'];
                                                    }    
                                                } 
                                            ?>
                                        </td>
                                        <td>
                                            <?php 
                                                if($pneu['pneus_individual_frota_id'] == 0){
                                                    echo 'Nenhum';
                                                }else{
                                                    foreach($frota as $veiculo){
                                                        if($veiculo['frota_id'] == $pneu['pneus_individual_frota_id']){
                                                            foreach($modelos as $modelo){
                                                                if($modelo['frota_modelo_id'] == $veiculo['frota_modelo_id']){
                                                                    foreach($marcas as $marca){
                                                                        if($marca['frota_marca_id'] == $modelo['frota_modelo_marca_id']){
                                                                            echo $veiculo['frota_id'] . ' | ' . $marca['frota_marca_nome'] . ' ' . $modelo['frota_modelo_nome']; 
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align: center">
                                            <?php if($this->session->userdata('editar') == 1){ ?>
        			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalRegistro" onclick="registro('<?php echo $pneu['pneus_individual_id']?>', '<?php echo $pneu['pneus_individual_marcacao'] ?>')" class="btn btn-info btn-modal-toggle" alt="Novo Registro" title="Novo Registro"><i class="fab fa-wpforms"></i></a>
        			                        <?php } ?>
        			                        <?php if($this->session->userdata('ver') == 1){ ?>
        			                        <a data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $pneu['pneus_individual_id'] ?>)" class="btn btn-primary" style="font-size: 12px" alt="Ver" title="Ver"><i class="fas fa-eye"></i></a>
        			                        <?php } ?>
        			                        <?php if($this->session->userdata('editar') == 1){ ?>
        			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $pneu['pneus_individual_id'] ?>)" class="btn btn-primary" style="font-size: 12px" alt="Editar" title="Editar"><i class="fas fa-pencil-alt"></i></a>
        			                        <?php } ?>
        			                        <?php if($pneu['pneus_individual_ativo_id'] == 1){ if($this->session->userdata('excluir') == 1){ ?>
        			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $pneu['pneus_individual_id'] ?>' )" alt="Inativar" title="Inativar"><i class="fas fa-trash"></i></a>
        			                        <?php } } ?>
                                        </td>
                                    </tr>
                                    <?php } } ?>
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
                            <h4>Deseja reativar o pneu?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('frota/ativarPneu') ?>" method="post">
                                        <input type="hidden" name="pneu_idatv" id="pneu_idatv">
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
            
            <div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistroLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalRegistro">Novo Registro de Situação de Pneu</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('frota/insertRegistroPneu') ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="hidden" id="registro_individual_id" name="registro_individual_id" required/>
                                        <label>Pneu Alvo</label><br>
                                        <input type="text" class="form-control" id="registro_individual_id_show" name="registro_individual_id_show" disabled/>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Situação</label><br>
                                        <select class="selectsituacao-filtro"  style="width: 100%!important" name="registro_situacao" id="registro_situacao" required>
                                            <option selected disabled>-- Novo, semi-novo, usado, reparo ... --</option>
                                            <?php foreach($situacao as $sit){ ?>
                                                <option value="<?php echo $sit['situacaopneus_nome']; ?>"><?php echo $sit['situacaopneus_nome']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Observação</label><br>
                                        <textarea type="text" class="form-control" id="registro_observacao" name="registro_observacao" 
                                        style="resize:none;" rows="3" placeholder="..."></textarea>
                                    </div>
                                </div><br>
                            </div>
                        
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Lançar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalIndividual" tabindex="-1" role="dialog" aria-labelledby="modalIndividualLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; tex-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalIndividual">Cadastro de Pneu Individual</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('frota/insertPneuIndividual') ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Tipo de Pneu</label>
                                        <select class="selectpneuindividual-filtro"  style="width: 100%!important" name="individual_tipopneu" id="individual_tipopneu" required>
                                            <option value="">-- Selecionar --</option>
                                            <?php foreach($tipospneu as $tipopneu){ ?>
                                                <option value="<?php echo $tipopneu['frota_pneu_id'] ?>"><?php echo $tipopneu['frota_pneu_marca'] . ' | Aro: ' . $tipopneu['frota_pneu_aro'] . ' | Banda: ' . $tipopneu['frota_pneu_banda'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Número de Matrícula</label><br>
                                        <input type="text" class="form-control" id="individual_matricula" name="individual_matricula" placeholder="Ex.: 225/55 R 17 97 W" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>DOT</label><br>
                                        <input type="text" class="form-control" id="individual_dot" name="individual_dot" placeholder="Ex.: 225/55 R 17 97 W" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Marcação de Fogo</label><br>
                                        <input type="text" class="form-control" id="individual_marcacao" name="individual_marcacao" placeholder="Ex.: 225/55 R 17 97 W" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Data de Movimento</label><br>
                                        <input type="text" class="form-control" id="individual_data" name="individual_data" value="<?php echo date('d-m-Y'); ?>" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Vida Útil (Km)</label><br>
                                        <input type="number" class="form-control" id="individual_vida" name="individual_vida" min="0" placeholder="Ex.: 500" required>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; left: 15px; top: 15px">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVerLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalVerLabel">Visualizar Pneu</h4>
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
                                <div class="col-md-4">
                                    <label>Marcação:</label>
                                    <h4 id="marcacao_v"></h4>
                                </div>
                                <div class="col-md-6">
                                    <label>Atualmente vinculado à:</label>
                                    <h4 id="vinculo_v"></h4>
                                </div>
                                <div class="col-md-2">
                                    <label>Ativação</label>
                                    <h4 id="ativo_v"></h4>
                                </div>
                            </div><br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="tableFixHead2">
                                        <table id="myTableRegistros" class="table table-hover table-bordered">
                                              <thead>
                                                    <tr>
                                                        <th style="width:1%">Data</th>
                                                        <th style="width:1%">Situação</th>
                                                        <th style="width:10%">Observação</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="registros_v">
                                                    <!-- -->
                                                </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            <a class="btn btn-primary" href="" id="link_pdf" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                        </div>
            
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalEditarLabel">Edição de Pneu</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('frota/insertPneuIndividual') ?>">
                            <input type="hidden" name="isedit" id="isedit" value="1"/>
                            <input type="hidden" name="id_e" id="id_e">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Tipo de Pneu</label>
                                        <select class="selecteditar-filtro"  style="width: 100%!important" name="tipopneu_e" id="tipopneu_e" required>
                                            <option selected value="">-- Selecionar --</option>
                                            <?php foreach($tipospneu as $tipopneu){ ?>
                                                <option value="<?php echo $tipopneu['frota_pneu_id'] ?>"><?php echo $tipopneu['frota_pneu_marca'] . ' | Aro: ' . $tipopneu['frota_pneu_aro'] . ' | Banda: ' . $tipopneu['frota_pneu_banda'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Veículo vinculado</label>
                                        <select class="selecteditar-filtro"  style="width: 100%!important" name="frota_e" id="frota_e" required>
                                            <option selected value="">-- Selecionar --</option>
                                            <option value="0">Nenhum</option>
                                            <?php foreach($frota as $veiculo){ ?>
                                                <option value="<?php echo $veiculo['frota_id'] ?>">
                                                    <?php 
                                                        foreach($modelos as $modelo){
                                                            if($modelo['frota_modelo_id'] == $veiculo['frota_modelo_id']){
                                                                foreach($marcas as $marca){
                                                                    if($marca['frota_marca_id'] == $modelo['frota_modelo_marca_id']){
                                                                        
                                                                        echo $veiculo['frota_id'] . ' | ' . $marca['frota_marca_nome'] . ' ' . $modelo['frota_modelo_nome'];
                                                                        
                                                                        if(isset($veiculo['frota_cor']) && !empty($veiculo['frota_cor'])){
                                                                            echo ' (' . $veiculo['frota_cor'] . ')';
                                                                        }
                                                                        
                                                                        if(isset($veiculo['frota_placa']) && !empty($veiculo['frota_placa'])){
                                                                            echo ' - ' . $veiculo['frota_placa'];
                                                                        }
                                                                        
                                                                        if(isset($veiculo['frota_chassi']) && !empty($veiculo['frota_chassi'])){
                                                                            echo ' - ' . $veiculo['frota_chassi'];
                                                                        }
                                                                        
                                                                        if(isset($veiculo['frota_renavam']) && !empty($veiculo['frota_renavam'])){
                                                                            echo ' - ' . $veiculo['frota_renavam'];
                                                                        }
                                                                        
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Matrícula</label><br>
                                        <input type="text" class="form-control" id="matricula_e" name="individual_matricula" placeholder="Ex.: 225/55 R 17 97 W" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>DOT</label><br>
                                        <input type="text" class="form-control" id="dot_e" name="individual_dot" placeholder="Ex.: 225/55 R 17 97 W" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Marcação de Fogo</label><br>
                                        <input type="text" class="form-control" id="marcacao_e" name="individual_marcacao" placeholder="Ex.: 225/55 R 17 97 W" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Vida Útil (km)</label><br>
                                        <input type="number" class="form-control" id="vida_e" min="0" name="individual_vida" placeholder="Ex.: 500" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Ativação</label>
                                        <select class="selecteditar-filtro"  style="width: 100%!important" name="ativo_e" id="ativo_e" required>
                                                <option value="1">Ativo</option>
                                                <option value="3">Em uso</option>
                                                <option value="2">Inativo</option>
                                        </select>
                                    </div>
                            </div>
                            </div>
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalCadastroLabel">Excluir Cadastro de Pneu</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o cadastro de pneu?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('frota/deletePneuIndividual') ?>" method="post">
                                        <input type="hidden" name="idpneu" id="idpneu">
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
            
            <div class="modal fade" id="modalFiltro" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Filtros</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideFiltro()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('relatoriopneus'); ?>" method="post" target="_blank">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Frota Vinculada</label><br>
                                        <select  style="width: 100%!important" class="select2-filtro" id="filtro_frota" name="frota">
                                            <option value="">-- Todas --</option>
                                            <?php foreach($frota as $ft){
                                            echo "<option value='".$ft['frota_id']."'>".$ft['frota_placa']." | ".$ft['frota_codigo']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Marcas</label><br>
                                        <select  style="width: 100%!important" class="select2-filtro" id="filtro_marca" name="marca">
                                            <option value="">-- Todas --</option>
                                            <?php foreach($filter_tipo as $ft){
                                            echo "<option value='".$ft['frota_pneu_id']."'>".$ft['frota_pneu_marca']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="hideFiltro()">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Gerar PDF</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                    $('.selectpneuindividual-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalIndividual')});
                    $('.selectsituacao-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalRegistro')});
                    $('.selecteditar-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalEditar')});
                    $('.select2-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalFiltro')});
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
                            {"ID": "first", "orderable": true},
                            {"Marcação": "second", "orderable": true},
                            {"Tipo de Pneu": "third", "orderable": true},
                            {"Vinculado à": "fourth", "orderable": true},
                            {"Ação": "fifth", "orderable": false},
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
                    
                    $('#myTableRegistros').DataTable( {
                        "order": [[ 0, "asc" ]],
                        "language": {
                            "lengthMenu": "Mostrando _MENU_ ",
                            "zeroRecords": "Nada encontrado- refaça sua busca",
                            "info": "Mostrando _PAGE_ de _PAGES_",
                            "infoEmpty": "Sem registros disponíves",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                        "columns": [
                            {"Data": "first", "orderable": true},
                            {"Situação": "second", "orderable": false},
                            {"Observação": "third", "orderable": false}
                        ],
                    } );
                    $('select[name ="myTableRegistros_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableRegistros_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Pneu excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possivel excluir o pneu pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Pneu reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar o pneu pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
                });
            </script>
            
            <script>
                function registro(id, marcacao){
                    $("#registro_individual_id").attr('value', id);
                    $("#registro_individual_id_show").attr('value', "Registo do Pneu: " + id + " | " + marcacao);
                }
                function ver(id){
                    var marcacao = "";
                    <?php foreach($pneus as $pneu){ ?>
                        if(id == '<?php echo $pneu['pneus_individual_id'] ?>'){
                            marcacao = '<?php echo $pneu['pneus_individual_marcacao'] ?>';
                            url = '<?php echo base_url('relatoriopneu/') ?>';
                            $('#link_pdf').attr('href', url+id);
                        }
                    <?php } ?>
                    $("#marcacao_v").html(marcacao);
                    
                    var vinculo = "Nenhum";
                    <?php foreach($pneus as $pneu){ ?>
                        if(id == '<?php echo $pneu['pneus_individual_id'] ?>'){
                            <?php foreach($frota as $veiculo){ ?>
                                if('<?php echo $veiculo['frota_id'] ?>' == '<?php echo $pneu['pneus_individual_frota_id'] ?>'){
                                    <?php 
                                        foreach($modelos as $modelo){ 
                                            if($veiculo['frota_modelo_id'] == $modelo['frota_modelo_id']){
                                                foreach($marcas as $marca){
                                                    if($marca['frota_marca_id'] == $modelo['frota_modelo_marca_id']){
                                    ?>
                                                        vinculo = "<?php echo $veiculo['frota_id'] ?>" + " | " + "<?php echo $marca['frota_marca_nome'] ?>" + " " + "<?php echo $modelo['frota_modelo_nome'] ?>";
                                    <?php 
                                                    }
                                                }
                                            }
                                        }
                                    ?>
                                }
                            <?php } ?>
                            if('<?php echo $pneu['pneus_individual_ativo_id'] ?>' == '1'){
                                $("#ativo_v").html('Ativo');    
                            }else{
                                $("#ativo_v").html('Inativo');
                            }
                        }
                    <?php } ?>
                    $("#vinculo_v").html(vinculo);
                    
                    var registros = "";
                    <?php foreach($registrospneu as $regp) { ?>
                        if(id == '<?php echo $regp['pneus_registro_individual_id'] ?>'){
                            registros += 
                            "<tr>" +
                                "<td>" + 
                                    "<?php echo date("d/m/Y H:i", strtotime($regp['pneus_registro_data'])) ?>" +
                                "</td>" +
                                "<td>" + 
                                    "<?php echo $regp['pneus_registro_situacao'] ?>" +
                                "</td>" +
                                "<td>" + 
                                    "<?php echo $regp['pneus_registro_observacao'] ?>" +
                                "</td>" +
                            "</tr>";
                        }
                    <?php } ?>
                    if(registros.length == 0){
                        registros = "<tr class='odd'><td valign='top' colspan='3' class='dataTables_empty'>Nada encontrado- refaça sua busca</td></tr>";
                    }
                    $("#registros_v").html(registros);
                    
                    
                    $("#myTableRegistros").change();
                }
                function editar(id){
                    <?php foreach($pneus as $pneu){ ?>
                        if(id == '<?php echo $pneu['pneus_individual_id'] ?>'){
                            $("#id_e").val(id);
                            $("#marcacao_e").val('<?php echo $pneu['pneus_individual_marcacao'] ?>');
                            $("#tipopneu_e").val('<?php echo $pneu['pneus_individual_tipopneu_id'] ?>').change();
                            $("#frota_e").val('<?php echo $pneu['pneus_individual_frota_id'] ?>').change();
                            $("#ativo_e").val('<?php echo $pneu['pneus_individual_ativo_id'] ?>').change();
                            $("#vida_e").val('<?php echo $pneu['pneus_individual_vida'] ?>').change();
                            $("#matricula_e").val('<?php echo $pneu['pneus_individual_matricula'] ?>').change();
                            $("#dot_e").val('<?php echo $pneu['pneus_individual_dot'] ?>').change();
                        }
                    <?php } ?>
                }
                function excluir(id){
                    document.getElementById('idpneu').value = id;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('pneu_idatv').value = id;
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
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
            
            <script>
                function hideFiltro(){
                    $('#filtro_marca').val('').change();
                    $('#filtro_situacao').val('').change();
                    $('#modalFiltro').modal('hide');
                }
                $('#modalFiltro').on('hidden.bs.modal', function () {
                    hideFiltro();
                });
            </script>
            