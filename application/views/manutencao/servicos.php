        
            <style>
                .tableFixHead          { height: auto; }
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
                
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <div style="margin-bottom: 0px">
                            <?php if($this->session->userdata('editar') == 1) { ?>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#novoServico" style='color: white'>Novo Serviço</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1) { ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                        
                        <div id="divfiltro" class="row" style="margin-left: calc(100% - 250px);">
                            <label style="position: relative; right: 20%; top: 32px; font-size: 14px;">Procurar:</label>
                            <form action="<?php echo base_url('servicos') ?>" method="post">
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
                            <table id="myTableServ" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 7%">N°</th>
                                        <th style="width: 58%">Nome</th>
                                        <th style="width: 15%">Valor</th>
                                        <th style="width: 20%">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($servicos as $sv){ ?>
                                    <?php if($this->session->userdata('ativar') == 1) { ?>
                                    <tr <?php if($sv['servico_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                                        <td style="padding-top: 12px!important;"><?php echo sprintf("%'03d", $sv['servico_id']); ?></td>
                                        <td style="padding-top: 12px!important;"><?php echo ucwords(strtolower($sv['servico_nome'])) ?></td>
                                        <td style="padding-top: 12px!important;">R$ <?php echo number_format($sv['servico_custo'], 4, ',', '.') ?></td>
                                        <?php if($sv['servico_ativo_id'] != 2) { ?>
                                            <td style="text-align: center;">
                                                <?php if($this->session->userdata('ver') == 1) { ?>
                                                <a data-toggle="modal" data-target="#verServico" style="font-size: 12px" class="btn btn-primary" onclick="setaVer(<?php echo $sv['servico_id'] ?>)"><i class="fas fa-eye"></i></a>
                                                <?php }  ?>
                                                <?php if($this->session->userdata('editar') == 1) { ?>
                                                <a data-toggle="modal" data-target="#editServico" style="font-size: 12px" class="btn btn-primary" onclick="setaEdit(<?php echo $sv['servico_id'] ?>)"><i class="fas fa-pen"></i></a>
                                                <?php } ?>
                                                <?php if($this->session->userdata('excluir') == 1) { ?>
                                                <a data-toggle="modal" data-target="#excluirServico" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir(<?php echo $sv['servico_id'] ?>)"><i class="fas fa-trash"></i></a>
                                                <?php } ?>
                                            </td>
                                        <?php } else { ?>
                                            <td style="text-align: center;">
                                                <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $sv['servico_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <?php } else if($sv['servico_ativo_id'] != 2) { ?>
                                        <tr>
                                            <td  style="padding-top: 12px!important;"><?php echo sprintf("%'03d", $sv['servico_id']); ?></td>
                                            <td  style="padding-top: 12px!important;"><?php echo ucwords(strtolower($sv['servico_nome'])) ?></td>
                                            <td  style="padding-top: 12px!important;">R$ <?php echo number_format($sv['servico_custo'], 4, ',', '.') ?></td>
                                            <td style="text-align: center;">
                                                <?php if($this->session->userdata('ver') == 1) { ?>
                                                <a data-toggle="modal" data-target="#verServico" style="font-size: 12px" class="btn btn-primary" onclick="setaVer(<?php echo $sv['servico_id'] ?>)"><i class="fas fa-eye"></i></a>
                                                <?php } ?>
                                                <?php if($this->session->userdata('editar') == 1) { ?>
                                                <a data-toggle="modal" data-target="#editServico" style="font-size: 12px" class="btn btn-primary" onclick="setaEdit(<?php echo $sv['servico_id'] ?>)"><i class="fas fa-pen"></i></a>
                                                <?php } ?>
                                                <?php if($this->session->userdata('excluir') == 1) { ?>
                                                <a data-toggle="modal" data-target="#excluirServico" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir(<?php echo $sv['servico_id'] ?>)"><i class="fas fa-trash"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                            <?php if($servicos == null){ ?>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p>Nenhum serviço encontrado.</p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> serviço(s) encontrado(s)</b></p>
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
                            <h4>Deseja reativar o serviço?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('manutencao/ativarServico') ?>" method="post">
                                        <input type="hidden" name="servico_idatv" id="servico_idatv">
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
            
            <div class="modal fade" id="novoServico" tabindex="-1" role="dialog" aria-labelledby="novoServicoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="novoServicoLabel">Novo Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('manutencao/novoServico') ?>" method="post">
                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Serviço:</label><br>
                                        <input type="text" class="form-control" placeholder="Nome do Serviço" id="nome" name="nome" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Valor do Serviço:</label><br>
                                        <input type="text" class="form-control" placeholder="0,0000" id="valor" name="valor" required>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="editServico" tabindex="-1" role="dialog" aria-labelledby="editServicoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="editServicoLabel">Editar Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('manutencao/editarServico') ?>" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id_edit" id="id_edit">
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Nome do Serviço:</label><br>
                                        <input type="text" class="form-control" placeholder="Nome do Serviço" id="nome_edit" name="nome_edit" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Valor do Serviço:</label><br>
                                        <input type="text" class="form-control" placeholder="0,0000" id="valor_edit" name="valor_edit" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Status:</label><br>
                                        <select  style="width: 100%!important" class="selecteditarservico-filtro" name="ativo_edit" id="ativo_edit" required>
                                            <option value="1">Ativo</option>
                                            <option value="2">Inativo</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer" style="position: relative">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="position: absolute; top: 15px; left: 15px">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="verServico" tabindex="-1" role="dialog" aria-labelledby="verServicoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="verServicoLabel">Ver Serviço</h4>
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
                                <div class="col-md-12 form-group">
                                    <label>Nome do Serviço:</label><br>
                                    <p id="nome_ver"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Valor do Serviço:</label><br>
                                    <p id="valor_ver"></p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Status:</label><br>
                                    <p id="ativo_ver"></p>
                                </div>
                            </div>
                            
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="excluirServico" tabindex="-1" role="dialog" aria-labelledby="excluirServicoTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="excluirServicoLabel">Excluir Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o serviço?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="e_senha()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('manutencao/excluirServico') ?>" method="post">
                                        <input type="hidden" name="id_excluir" id="id_excluir">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.selecteditarservico-filtro').select2({theme: "bootstrap", dropdownParent: $('#editServico')});
                    $('#valor').mask("#.##0,00", {reverse: true});
                    $('#valor_edit').mask("#.##0,00", {reverse: true});

                    
                    <?php if($new != null){ ?>
                    Swal.fire(
                        '',
                        'Serviço inserido com sucesso!',
                        'success'
                    )
                    <?php } ?>
                    
                    <?php if($edit != null){ ?>
                    var id = '<?php echo sprintf("%'03d", $edit); ?>';
                    Swal.fire(
                        '',
                        'Serviço N° '+id+' foi alterado com sucesso!',
                        'success'
                    )
                    <?php } ?>
                    
                    <?php if($exc == 2){ ?>
                    Swal.fire(
                        '',
                        'Serviço excluido com sucesso!',
                        'success'
                    )
                    <?php }else if($exc == 1){ ?>
                    Swal.fire(
                        'Erro',
                        'Não foi possivel excluir o serviço, pois a senha inserida estava incorreta!',
                        'error'
                    )
                    <?php } ?>
                    <?php if($reat == 1){ ?>
                    Swal.fire(
                        '',
                        'Serviço reativado com sucesso!',
                        'success'
                    )
                    <?php }else if($reat == 2){ ?>
                    Swal.fire(
                        'Erro',
                        'Não foi possível reativar o serviço, pois a senha inserida estava incorreta!',
                        'error'
                    )
                    <?php } ?>
                });
            </script>
            
            <script>
                function setaEdit(id){
                    $('#id_edit').val(id);
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('manutencao/getServico'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('setaEdit('+id+'): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data != "null" && data != "" && data != " " && data != null){
                                serv = jQuery.parseJSON(data);
                                $('#nome_edit').val(serv.servico_nome);
                                $('#valor_edit').unmask().val(serv.servico_custo).mask("#.##0,00", {reverse: true});
                                $('#ativo_edit').val(serv.servico_ativo_id);
                            }else{
                                alert("Erro no banco");
                            }
                        },
                    });
                }
            </script>
            
            <script>
                function setaVer(id){
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('manutencao/getServico'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('setaEdit('+id+'): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data != "null" && data != "" && data != " " && data != null){
                                serv = jQuery.parseJSON(data);
                                $('#nome_ver').html(serv.servico_nome);
                                $('#valor_ver').html('R$ '+parseFloat(serv.servico_custo.replace('.', ',')).toFixed(4));
                                if(serv.servico_ativo_id == 1){
                                    $('#ativo_ver').html('Ativo');
                                }else{
                                    $('#ativo_ver').html('Inativo');
                                }
                            }else{
                                alert("Erro no banco");
                            }
                        },
                    });
                }
            </script>
            
            <script>
                function setaExcluir(id){
                    $('#id_excluir').val(id);
                }
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                function e_senha(){
                    $('#formsenha').css('display', 'none');
                    $('#senha').val("");
                }
                function setaAtivar(id){
                    document.getElementById('servico_idatv').value = id;
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
                $('#senha_btn').on('click', function(){
                    const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
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
            