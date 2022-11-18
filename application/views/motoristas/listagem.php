        
            <style>
                .tableFixHead          { height: auto;}
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
                
                .pagination-links a{
                    color: #033557;
                    text-decoration: none;
                    padding: 5px;
                    font-size: 13px;
                    margin: 2px;
                    border: 1px solid #033557;
                    border-radius: 3px;
                }
                
                .pagination-links strong{
                    padding: 5px;
                    font-size: 13px;
                    color: #033557;
                    border: 1px solid #033557;
                    border-radius: 3px;
                }
                
                .pagination-links{
                    text-align: right;
                }
                
                .encurtar{
                    display: -webkit-box;
                    overflow: hidden;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    word-break: break-word;
                    line-height: 11px!important;
                }

            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">

                        <div>
                            <?php if($this->session->userdata('editar') == 1) { ?>
                            <a href="<?php echo base_url('cadastrarmotorista'); ?>" class="btn btn-primary" style='color: white'>Novo Motorista</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1) { ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                        
                        <div id="divfiltro" class="row" style="margin-left: calc(100% - 250px);">
                            <label style="position: relative; right: 20%; top: 32px; font-size: 14px;">Procurar:</label>
                            <form action="<?php echo base_url('motoristas') ?>" method="post">
                                <div class="col-md-12 text-right">
                                    <div id="campo-filtro" class="input-group mb-3" style="width: 120%; margin-left: auto; margin-bottom: 2%">
                                        <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Digite sua busca" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php if(isset($filtro)){ echo $filtro; } ?>">
                                          <div class="input-group-append" style="cursor: pointer;position: absolute;right: 0px;height: 100%;z-index: 2;">
                                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                                          </div>
                                    </div>
                                 </div> 
                            </form>
                        </div>

                        <div class="tableFixHead">
                            <table id="myTableMotorista" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Telefone</th>
                                        <th>Cidade</th>
                                        <th style="width: 180px">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($motoristas as $motorista){ ?>
                                    <?php if($this->session->userdata('ativar') == 1) { ?>
                                    <tr <?php if($motorista['motorista_ativo_id'] == 2){ echo "style='color: #ff0000;'"; }?>>
                                        <td style="vertical-align: middle;">
                                            <div class="encurtar" title="<?php echo ucwords(mb_strtolower($motorista['motorista_nome']));?>">
                                                <?php echo ucwords(strtolower($motorista['motorista_nome'])) ?>
                                            </div>
                                        </td>
                                        <td style="padding-top: 12px!important;" class="cpf"><?php echo $motorista['motorista_cpf'] ?></td>
                                        <td style="padding-top: 12px!important;" class="telefone"><?php echo $motorista['motorista_tel'] ?></td>
                                        <td style="vertical-align: middle;">
                                            <div class="encurtar" title="<?php echo ucwords(mb_strtolower($motorista['motorista_cidade'])) . ' - ' . $motorista['motorista_estado'];?>">
                                                <?php echo ucwords(strtolower($motorista['motorista_cidade'])) . ' - ' . $motorista['motorista_estado'] ?>
                                            </div>
                                        </td>
                                        <?php if($motorista['motorista_ativo_id'] != 2) { ?>
                                            <td style="text-align: center">
                                                <?php if($this->session->userdata('ver') == 1) { ?>
                                                <a style="font-size: 12px" href="<?php echo base_url('mostrarmotorista/'.$motorista['motorista_id']); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                &nbsp;&nbsp;
                                                <?php } ?>
                                                <?php if($this->session->userdata('editar') == 1) { ?>
                                                <a style="font-size: 12px" href="<?php echo base_url('editarmotorista/'.$motorista['motorista_id']); ?>" class="btn btn-primary" ><i class="fas fa-pencil-alt"></i></a>
                                                <?php } ?>
                                                <?php if($this->session->userdata('excluir') == 1) { ?>
                                                &nbsp;&nbsp;
                                                <a data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir('<?php echo $motorista['motorista_id'] ?>')"><i class="fas fa-trash"></i></a>
                                                <?php } ?>
                                            </td>
                                        <?php } else { ?>
                                            <td style="text-align: center">
                                                <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $motorista['motorista_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } else if($motorista['motorista_ativo_id'] != 2) { ?>
                                        <tr>
                                        <td style="padding-top: 12px!important;"><?php echo $motorista['motorista_nome'] ?></td>
                                        <td style="padding-top: 12px!important;"><?php echo $motorista['motorista_cpf'] ?></td>
                                        <td style="padding-top: 12px!important;"><?php echo $motorista['motorista_tel'] ?></td>
                                        <td style="padding-top: 12px!important;"><?php echo $motorista['motorista_cidade'] . ' - ' . $motorista['motorista_estado'] ?></td>
                                        <td style="text-align: center">
                                            <?php if($this->session->userdata('ver') == 1) { ?>
                                            <a style="font-size: 12px" href="<?php echo base_url('mostrarmotorista/'.$motorista['motorista_id']); ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                            &nbsp;&nbsp;
                                            <?php } ?>
                                            <?php if($this->session->userdata('editar') == 1) { ?>
                                            <a style="font-size: 12px" href="<?php echo base_url('editarmotorista/'.$motorista['motorista_id']); ?>" class="btn btn-primary" ><i class="fas fa-pencil-alt"></i></a>
                                            <?php } ?>
                                            <?php if($this->session->userdata('excluir') == 1) { ?>
                                            &nbsp;&nbsp;
                                            <a data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir(<?php echo $motorista['motorista_id'] ?>)"><i class="fas fa-trash"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                            <?php if($motoristas == null){ ?>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p> Nenhum motoristas encontrado.</p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> motoristas encontrados</b></p>
                                <?php if($pag_links){ ?>
                                    <p class="pagination-links"><?php echo $pag_links; ?></p>
                                <?php } else { ?>
                                    <p class="pagination-links">&nbsp;</p>
                                <?php } ?>
                            </div>
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
                            <h4>Deseja reativar o motorista?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('motoristas/ativarMotorista') ?>" method="post">
                                        <input type="hidden" name="motorista_idatv" id="motorista_idatv">
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
            
            
            <!-- modalExcluir -->
            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; tex-align: left">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o motorista?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('motoristas/deleteMotorista') ?>" method="post">
                                        <input type="hidden" name="idmotorista" id="idmotorista">
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
            
            <script>
                $(document).ready(function(){
                    $('.cpf').mask('000.000.000-00', {reverse: true});
                     
                    var SPMaskBehavior = function (val) {
                      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                    },
                    spOptions = {
                      onKeyPress: function(val, e, field, options) {
                          field.mask(SPMaskBehavior.apply({}, arguments), options);
                        }
                    };
                    
                    $('.telefone').mask(SPMaskBehavior, spOptions);
                    
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Motorista excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possivel excluir a motorista pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Motorista reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar o motorista pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
                });
            </script>
            
            <script>
                function setaExcluir(id){
                    document.getElementById('idmotorista').value = id;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('motorista_idatv').value = id;
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
            