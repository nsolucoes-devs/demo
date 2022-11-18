
            <style>
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
                .white-tab{
                    background-color: white;
                    border-radius: 5px;
                }
                .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
                    background-color: #eee;
                }
                .nav.nav-tabs{
                    border-bottom: 0;
                }
                .nav-link{
                    border-top-right-radius: 10px;
                    border-top-left-radius: 10px;
                    color: #033557;
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
                        
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eef5f9;">
                            <li class="nav-item">
                                <a href="<?php echo base_url('fornecedores') ?>" class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px"><b>FORNECEDOR</b></a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('cadastros/fornecedoresAbc') ?>" class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px"><b>FORNECEDOR ABC</b></a>
                            </li>
                        </ul>
                        
                       <div class="row white-tab" id="divFor" style="display: block;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px; margin-top: 1%;">
                                
                                <div>
                                    <?php if($this->session->userdata('editar') == 1){ ?>
                                        <a href="<?php echo base_url('cadastrarfornecedor') ?>" class="btn btn-primary" style='color: white'>Novo Fornecedor</a>
                                        &nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" data-target="#modalFiltro"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                    <?php } ?>
                                    <?php if($this->session->userdata('ativar') == 1){ ?>
                                        <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                                    <?php } ?>
                                </div>
                                
                                <div id="divfiltro" class="row" style="margin-left: calc(100% - 250px);">
                                    <label style="position: relative; right: 20%; top: 32px; font-size: 14px;">Procurar:</label>
                                    <form action="<?php echo base_url('fornecedores') ?>" method="post">
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
                				    <table id="myTableForn" class="table table-hover table-bordered">
                				        <thead>
                				            <tr>
                				                <th style="width: 63%">Nome</th>
                				                <th style="width: 17%">CNPJ</th>
                				                <th style="width: 20%">Ação</th>
                				            </tr>
                				        </thead>
                				        <tbody>
                				            <?php foreach($fornecedores as $f){ ?>
                				            <?php if($this->session->userdata('ativar') == 1){ ?>
                				            <tr <?php if($f['fornecedor_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                				                <td style="padding-top: 12px!important;">
                                                    <div class="encurtar" title="<?php echo ucwords(mb_strtolower($f['fornecedor_nome']));?>">
                                                        <?php echo ucwords(strtolower(mb_strtoupper($f['fornecedor_nome']))) ?>
                                                    </div>
                                                </td>
                				                <td style="padding-top: 12px!important;" class="cpfOuCnpj"><?php echo $f['fornecedor_cnpj'] ?></td>
                				                <?php if($f['fornecedor_ativo_id'] != 2) { ?>
                    				                <td style="text-align: center">
                    				                    <?php if($this->session->userdata('ver') == 1){ ?>
                    			                        <a href="<?php echo base_url('mostrarfornecedor/').$f['fornecedor_cnpj'] ?>" style="font-size: 12px" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    			                        <?php } ?>
                    			                        <?php if($this->session->userdata('editar') == 1){ ?>
                    			                        <a href="<?php echo base_url('editarfornecedor/').$f['fornecedor_cnpj'] ?>" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
                    			                        <?php } ?>
                    			                        <?php if($this->session->userdata('excluir') == 1){ ?>
                    			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="setaExcluir('<?php echo $f['fornecedor_cnpj'] ?>')"><i class="fas fa-trash"></i></i></a>
                    			                        <?php } ?>
                    			                    </td>
                    			                 <?php } else { ?>
                        			                 <td style="text-align: center">
                        			                    <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $f['fornecedor_cnpj'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                        			                 </td>
                    			                 <?php } ?>
                				            </tr>
                				            <?php } else if($f['fornecedor_ativo_id'] != 2){  ?>
                				                <tr>
                				                <td style="padding-top: 12px!important;"><?php echo mb_strtoupper($f['fornecedor_nome']) ?></td>
                				                <td style="padding-top: 12px!important;" class="cpfOuCnpj"><?php echo $f['fornecedor_cnpj'] ?></td>
                				                <td style="text-align: center">
                			                        <?php if($this->session->userdata('ver') == 1){ ?>
                			                        <a href="<?php echo base_url('mostrarfornecedor/').$f['fornecedor_cnpj'] ?>" style="font-size: 12px" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                			                        <?php } ?>
                			                        <?php if($this->session->userdata('editar') == 1){ ?>
                			                        <a href="<?php echo base_url('editarfornecedor/').$f['fornecedor_cnpj'] ?>" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
                			                        <?php } ?>
                			                        <?php if($this->session->userdata('excluir') == 1){ ?>
                			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="setaExcluir('<?php echo $f['fornecedor_cnpj'] ?>')"><i class="fas fa-trash"></i></i></a>
                			                        <?php } ?>
                			                    </td>
                				            </tr>
                				        <?php } } ?>
                				        </tbody>
                				    </table>
                				    <?php if($fornecedores == null){ ?>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p> Nenhum fornecedores encontrado.</p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> fornecedores encontrados</b></p>
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
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <!-- ModalReativar -->
                        <div class="modal fade" id="modalAtivar" tabindex="-1" role="dialog" aria-labelledby="modalAtivarTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja reativar o fornecedor?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('cadastros/ativarFornecedor') ?>" method="post">
                                        <input type="hidden" name="fornecedor_idatv" id="fornecedor_idatv">
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
            
            
            <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="exampleModalLongTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o fornecedor?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('cadastros/excluirFornecedor') ?>" method="post">
                                        <input type="hidden" name="cnpjforn" id="cnpjforn">
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
            
            <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="text-align: left; justify-content: unset;">
                            <h5 class="modal-title" id="modalEditarTitle">Mensagem do Sistema</h5>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-7 form-group">
                                    <label>Nome: &nbsp;</label><label id="nome" style="font-size: 16px; color: black"></label>
                                </div>
                                <div class="col-md-5 form-group">
                                    <label>CNPJ: &nbsp;</label><label id="cnpj" style="font-size: 16px; color: black"></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 form-group">
                                    <label>Representante: &nbsp;</label><label id="nome_r" style="font-size: 16px; color: black"></label>
                                </div>
                                <div class="col-md-5 form-group">
                                    <label>Situação: &nbsp;</label><label id="ativo" style="font-size: 16px; color: black"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspVoltar&nbsp&nbsp</button>
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
                        
                        <form action="<?php echo base_url('relatoriofornecedores') ?>" method="post" target="_blank">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Estado</label><br>
                                        <select class="select2-filtro" id="filtro_estado" name="estado" style="width: 100%!important">
                                            <option value="">-- Todos --</option>
                                            <?php foreach($ufs as $uf){
                                                echo "<option value='".$uf."'>".$uf."</option>";
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
                    $('.select2-filtro').select2({theme: "bootstrap", dropdownParent: $('#modalFiltro')});
                    $('.js-example-basic-multiple').select2({theme: "bootstrap"});
                    
                    var SPMaskBehavior2 = function (val) {
                      return val.replace(/\D/g, '').length === 14 ? '00.000.000/0000-00' : '000.000.000-00#';
                    },
                    spOptions2 = {
                      onKeyPress: function(val, e, field, options) {
                          field.mask(SPMaskBehavior.apply({}, arguments), options);
                        }
                    };
                    
                    $('.cpfOuCnpj').mask(SPMaskBehavior2, spOptions2);
                    
                    <?php 
                        if(isset($erro)){
                            if($erro == 1){
                                echo "Swal.fire(
                                '',
                                'Fornecedor excluído com sucesso!',
                                'success'
                                )";
                            }
                            else if($erro == 2){
                                echo "Swal.fire(
                                '',
                                'Não foi possivel excluir a fornecedor pois a senha inserida estava incorreta!',
                                'error'
                                )";
                            }
                            else if($erro == 3){
                                echo "Swal.fire(
                                '',
                                'Fornecedor reativado com sucesso!',
                                'success'
                                )";
                            }
                            else if($erro == 4){
                                echo "Swal.fire(
                                '',
                                'Não foi possivel reativar o fornecedor pois a senha inserida estava incorreta!',
                                'error'
                                )";
                            }
                        }
                    ?>
                });
            </script>
            
            <script>
                function setaExcluir(cnpj){
                    document.getElementById('cnpjforn').value = cnpj;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('fornecedor_idatv').value = id;
                }
                function setaEditar(cnpj){
                    dados = new FormData();
                    dados.append('cnpj', cnpj);
                    $.ajax({
                        url: '<?php echo base_url('cadastros/getFornecedor'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                          var err = eval("(" + xhr.responseText + ")");
                          alert(err.Message);
                        },
                        success: function(data) {
                            if(data != "null"){
                                var spl = data.split('|');
                                $('#nome').html(spl[0]);
                                $('#cnpj').html(spl[1]);
                                $('#nome_r').html(spl[2]);
                                $('#ativo').html(spl[3]);
                            }else{
                                alert("Erro na banco");
                            }
                        },
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
            
            <script>
                function hideFiltro(){
                    $('#filtro_estado').val('').change();
                    $('#modalFiltro').modal('hide');
                }
                $('#modalFiltro').on('hidden.bs.modal', function () {
                    hideFiltro();
                });
            </script>
            