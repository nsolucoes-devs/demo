            <style>
                .tableFixHead          { overflow-y: auto; height: 600px; padding-left: 15px;}
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
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <style>
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
                                .swal2-popup.swal2-modal.swal2-icon-info.swal2-show{
                                    width: 40%;
                                }
                            }
                        </style>
                        <div style="padding-left: 15px; padding-bottom: 10px">
                            <?php if($this->session->userdata('editar') == 1) { ?>
                            <a href="<?php echo base_url('cadastrarusuario'); ?>" class="btn btn-success" style='border-color: #033557; background-color: #033557; color: white'>Novo Usuário</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1) { ?> 
                                <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>
                        
                        <div class="input-group-append" style="position: absolute; right: 38px; height: 4.4%; z-index: 2;">
                            <span style="background: white; border: 1px solid lightgrey" class="input-group-text" id="basic-addon2"><i style="font-size: 18px; cursor: pointer; color: #033557!important;" class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                                                  
                        <div class="tableFixHead">  
                            <table id="myTableUsuario" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>CPF</th>
                                        <th>Cidade</th>
                                        <th>Estado</th>
                                        <th style="width: 180px">Ação</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($users as $user){
                                        if($user['usuario_id'] > 4){
                                            if($this->session->userdata('ativar') == 1){
                                    ?>
                                    <tr <?php if($user['usuario_ativo_id'] == 2){echo "style='color: #ff0000;'";} ?>>
                                            <td style="vertical-align: middle;">
                                                <div class="encurtar" title="<?php echo ucwords(mb_strtolower($user['usuario_nome']));?>">
                                                    <?php echo ucwords(strtolower($user['usuario_nome'])); ?>
                                                </div>
                                            </td>
                                            <td style="padding-top: 12px!important;">
                                                <?php
                                                    if(ctype_digit($user['usuario_cpf']) && strlen($user['usuario_cpf']) == 11){
        				                                $cpf = substr($user['usuario_cpf'], 0, 3).".".substr($user['usuario_cpf'], 3, 3).".".substr($user['usuario_cpf'], 6, 3)."-".substr($user['usuario_cpf'], 9);
        				                                echo $cpf;
                                                    }else{
                                                        echo $user['usuario_cpf'];
                                                    }
        				                        ?>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <div class="encurtar" title="<?php echo ucwords(mb_strtolower($user['usuario_cidade']));?>">
                                                    <?php echo ucwords(strtolower($user['usuario_cidade'])); ?>
                                                </div>
                                            </td>
                                            <td style="padding-top: 12px!important;"><?php echo $user['usuario_estado']; ?></td>
                                            <?php if($user['usuario_ativo_id'] != 2) { ?>
                                                <td style="text-align: center;">
                                                    <?php if($this->session->userdata('ver') == 1) { ?>
                                                    <a style="font-size: 12px" href="<?php echo base_url('mostrarusuario/').$user['usuario_id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('editar') == 1) { ?>
                                                    <a style="font-size: 12px" href="<?php echo base_url('editarusuario/' . $user['usuario_id']) ?>" class="btn btn-primary" ><i class="fas fa-pencil-alt"></i></a>
                                                    <?php } ?>
                                                    <?php if($this->session->userdata('excluir') == 1) { ?>
                                                    <a data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir('<?php echo $user['usuario_id'] ?>')"><i class="fas fa-trash"></i></a>
                                                    <?php } ?>
                                                </td>
                                            <?php } else { ?>
                                                <td class="text-center">
                                                    <a data-toggle="modal" data-target="#modalAtivar" class="btn btn-danger" style="font-size: 12px" onclick="setaAtivar('<?php echo $user['usuario_id'] ?>')"><i class="fas fa-exclamation-triangle"></i></i></a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } else if($user['usuario_ativo_id'] != 2) { ?>
                                        <tr <?php if($user['usuario_ativo_id'] == 2){echo "style='background-color: #ff0000; color:white'";} ?>>
                                            <td style="vertical-align: middle;">
                                                <div class="encurtar" title="<?php echo ucwords(mb_strtolower($user['usuario_nome']));?>">
                                                    <?php echo ucwords(strtolower($user['usuario_nome'])); ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?php
                                                    if(ctype_digit($user['usuario_cpf']) && strlen($user['usuario_cpf']) == 11){
        				                                $cpf = substr($user['usuario_cpf'], 0, 3).".".substr($user['usuario_cpf'], 3, 3).".".substr($user['usuario_cpf'], 6, 3)."-".substr($user['usuario_cpf'], 9);
        				                                echo $cpf;
                                                    }else{
                                                        echo $user['usuario_cpf'];
                                                    }
        				                        ?>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <div class="encurtar" title="<?php echo ucwords(mb_strtolower($user['usuario_cidade']));?>">
                                                    <?php echo ucwords(strtolower($user['usuario_cidade'])); ?>
                                                </div>
                                            </td>
                                            <td><?php echo $user['usuario_estado']; ?></td>
                                            <td style="text-align: center;">
                                                <?php if($this->session->userdata('ver') == 1) { ?>
                                                <a style="font-size: 12px" href="<?php echo base_url('mostrarusuario/').$user['usuario_id'] ?>" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                <?php } ?>
                                                <?php if($this->session->userdata('editar') == 1) { ?>
                                                <a style="font-size: 12px" href="<?php echo base_url('editarusuario/' . $user['usuario_id']) ?>" class="btn btn-primary" ><i class="fas fa-pencil-alt"></i></a>
                                                <?php } ?>
                                                <?php if($this->session->userdata('excluir') == 1) { ?>
                                                <a data-toggle="modal" data-target="#modalExcluir" style="font-size: 12px" class="btn btn-danger" onclick="setaExcluir('<?php echo $user['usuario_id'] ?>')"><i class="fas fa-trash"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } } } ?>
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
                            <h4>Deseja reativar o usuário?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha1()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha1" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('usuario/ativarUsuario') ?>" method="post">
                                        <input type="hidden" name="usuario_idatv" id="usuario_idatv">
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
                            <h4>Deseja realmente excluir o usuário?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; border: 1px solid #033557; background-color: #033557; color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('usuario/deleteUsuario') ?>" method="post">
                                        <input type="hidden" name="iduser" id="iduser">
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
            
            <!-- ModalUsuario -->
            <div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="modalUsuario" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header" style="padding: 3px; justify-content: unset">
                            <div class="row row-c">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="close" data-dismiss="modal" style="margin-right: 5px">&times;</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body" style="background-color: #eaeaea; padding-bottom: 0px">
                            <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eaeaea">
                                <li class="nav-item">
                                    <a class="nav-link" style="background-color: white; cursor: pointer" id="aDados" onclick="change(1)">Dados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="cursor: pointer" id="aDias" onclick="change(2)">Dias</a>
                                </li>
                            </ul>
                            <div class="row" id="divDados" style="display: block;">
                                <div class="col-md-12" style="background-color: white">
                                    <br>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-9">
                                            <label>Nome: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-nome"></label>
                                        </div>
                                        <div class="col-md-3 text-right" id="ativo">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label>CPF: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-cpf"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>RG: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-rg"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Data de Nascimento: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-dt"></label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-4">
                                            <label>Função: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-funcao" name="text-funcao"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Telefone: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-telefone"></label>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Celular: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-celular"></label>
                                        </div>
                                    </div>
                                    
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <label>Endereco: </label>
                                            <br>
                                            <label style="color: black; font-size: 16px" id="text-endereco"></label>
                                        </div>    
                                    </div>
            
                                    <br>
                                </div>
                            </div>
                            <div class="row" id="divDias" style="display: none">
                                <div class="col-md-12" style="background-color: white">
                                    <br>
            
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Dias e Horário de Acesso:</label>
                                            <br><br>
                                            <label style="color: black; font-size: 16px" id="text-trabalho"></label>
                                        </div>
                                    </div>
            
                                    <br>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                $(document).ready(function(){
                    $('#myTableUsuario').DataTable( {
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
                            {"Nome": "first", "orderable": true},
                            {"CPF": "second", "orderable": true},
                            {"Cidade": "third", "orderable": true},
                            {"Estado": "fourth", "orderable": true},
                            {"Ação": "fifth", "orderable": false},
                        ],
                    });
                    $('select[name ="myTableUsuario_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableUsuario_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                    <?php 
                        if($erro == 1){
                            echo "Swal.fire(
                            '',
                            'Usuário excluído com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 2){
                            echo "Swal.fire(
                            '',
                            'Não foi possivel excluir a usuário pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                        else if($erro == 3){
                            echo "Swal.fire(
                            '',
                            'Usuário reativado com sucesso!',
                            'success'
                            )";
                        }
                        else if($erro == 4){
                            echo "Swal.fire(
                            '',
                            'Não foi possível reativar o usuário pois a senha inserida estava incorreta!',
                            'error'
                            )";
                        }
                    ?>
                });
            </script>
            
            <script>
                function setaExcluir(id){
                    document.getElementById('iduser').value = id;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
                function setaAtivar(id){
                    document.getElementById('usuario_idatv').value = id;
                }
            </script>
            
            <script>
                function change(value){
                    if(value == 1){
                        document.getElementById('aDados').style = "background-color: white; cursor: pointer";
                        document.getElementById('aDias').style = "background-color: #eaeaea; cursor: pointer";
                        document.getElementById('divDados').style.display = "block";
                        document.getElementById('divDias').style.display = "none";
                    }else{
                        document.getElementById('aDias').style = "background-color: white; cursor: pointer";
                        document.getElementById('aDados').style = "background-color: #eaeaea; cursor: pointer";
                        document.getElementById('divDias').style.display = "block";
                        document.getElementById('divDados').style.display = "none";
                    }
                }
            </script>
            
            <script>
                $('.btn-modal-toggle').on('click', function(){
                    $("#modalUsuario").modal('hide');
                    var button = $(this);
                    var recipient = button.data('usuario');
                
                    var dados = {
                            'usuario_id': recipient
                        };
                    $.ajax({
                        url : '<?php echo base_url('usuario/getUsuarioById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                        
                            $("#text-cpf").unmask();
                            $("#text-cpf").html(res.usuario_cpf);
                            $("#text-cpf").mask("000.000.000-00");
                            
                            $('#text-rg').html(res.usuario_rg);
                            $("#text-nome").html(res.usuario_nome);
                            
                            var ex = res.usuario_nascimento.split('-');
                            var dt = ex[2]+"/"+ex[1]+"/"+ex[0];
                            $('#text-dt').html(dt);
                            
                            $("#text-telefone").unmask();
                            $("#text-telefone").html(res.usuario_telefone);
                            if(res.usuario_telefone.length == 10){$("#text-telefone").mask("(00) 0000-0000");}
                            else if(res.usuario_telefone.length == 11){$("#text-telefone").mask("(00) 0 0000-0000");}
                            
                            $("#text-celular").unmask();
                            if(res.usuario_celular != null && res.usuario_celular != ""){
                                $("#text-celular").html(res.usuario_celular);
                            }else{
                                $("#text-celular").html("Não possui");
                            }
                            if(res.usuario_celular.length == 10){$("#text-celular").mask("(00) 0000-0000");}
                            else if(res.usuario_celular.length == 11){$("#text-celular").mask("(00) 0 0000-0000");}
                        
                            var atv;
                            if(res.usuario_ativo_id == 1){
                                atv = "<button disabled class='btn btn-success' style='background-color: #5cb85c;border-color: #4cae4c;'>Ativo</button>";
                            }else if(res.usuario_ativo_id == 2){
                                atv = "<button disabled class='btn btn-danger'>Inativo</button>";
                            }
                            $('#ativo').html(atv);
                        
                            var endereco = res.usuario_endereco + ", nº " + res.usuario_numero + ", " + res.usuario_cep + ", " + res.usuario_cidade + " - " + res.usuario_estado;
                            $("#text-endereco").html(endereco);
                        
                            if(res.usuario_trabalho != null && res.usuario_trabalho != ""){
                                var trabalhoTexto = "";
                                var trabalho = res.usuario_trabalho;
                                var trabalhoSplitPipe = trabalho.split('|');
                            
                                for(var i in trabalhoSplitPipe) {
                                    if(trabalhoTexto.length > 0){trabalhoTexto += "<br>";}
                                    var trabalhoDia = trabalhoSplitPipe[i];
                                    var diaReferente = trabalhoDia.split('-')[0];
                                    var hrEntrada = trabalhoDia.split('-')[1];
                                    var hrSaida = trabalhoDia.split('-')[2];
                                    trabalhoTexto += diaReferente.toUpperCase() + ": " + hrEntrada + " às " + hrSaida;
                                }
                                $("#text-trabalho").html(trabalhoTexto);
                            }else{
                                $("#text-trabalho").html("Não possui");
                            }
                        
                            var dadosFuncao = {
                                'usuario_funcao_id': res.usuario_funcao_id
                            }
                        
                            $.ajax({
                                url : '<?php echo base_url('usuario/getFuncaoById') ?>',
                                type : "POST",
                                dataType : "json",
                                data : dadosFuncao,
                                success : function(response) {
                                    res = response[0];
                                    $("#text-funcao").html(res.funcao_nome);
                                    
                                    //END OF QUERY
                                    $("#modalUsuario").modal('show');
                                },
                                error : function(xhr, status, error) {
                                    var err = eval("(" + xhr.responseText + ")");
                                alert(status + " " + error + " " + err);
                                }
                            });
                        },
                        error : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(status + " " + error + " " + err);
                        }
                    });
                });
                $('#modalUsuario').on('shown.bs.modal', function (e) {
                    /*
                    var button = $(e.relatedTarget);
                    var recipient = button.data('usuario');
                
                    var dados = {
                            'usuario_id': recipient
                        };
                    $.ajax({
                        url : '<?php // echo base_url('usuario/getUsuarioById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                        
                            $("#text-cpf").unmask();
                            $("#text-cpf").html(res.usuario_cpf);
                            $("#text-cpf").mask("000.000.000-00");
                            
                            $("#text-nome").html(res.usuario_nome);
                            
                            $("#text-telefone").unmask();
                            $("#text-telefone").html(res.usuario_telefone);
                            if(res.usuario_telefone.length == 10){$("#text-telefone").mask("(00) 0000-0000");}
                            else if(res.usuario_telefone.length == 11){$("#text-telefone").mask("(00) 0 0000-0000");}
                        
                            var endereco = res.usuario_endereco + ", nº " + res.usuario_numero + ", " + res.usuario_cidade + " - " + res.usuario_estado;
                            $("#text-endereco").html(endereco);
                        
                            var trabalhoTexto = "";
                            var trabalho = res.usuario_trabalho;
                            var trabalhoSplitPipe = trabalho.split('|');
                        
                            for(var i in trabalhoSplitPipe) {
                                if(trabalhoTexto.length > 0){trabalhoTexto += "<br>";}
                                var trabalhoDia = trabalhoSplitPipe[i];
                                var diaReferente = trabalhoDia.split('-')[0];
                                var hrEntrada = trabalhoDia.split('-')[1];
                                var hrSaida = trabalhoDia.split('-')[2];
                                trabalhoTexto += diaReferente.toUpperCase() + ": " + hrEntrada + " às " + hrSaida;
                            }
                            $("#text-trabalho").html(trabalhoTexto);
                        
                            var dadosFuncao = {
                                'usuario_funcao_id': res.usuario_funcao_id
                            }
                        
                            $.ajax({
                                url : '<?php // echo base_url('usuario/getFuncaoById') ?>',
                                type : "POST",
                                dataType : "json",
                                data : dadosFuncao,
                                success : function(response) {
                                    res = response[0];
                                    $("#text-funcao").html(res.funcao_nome);
                                },
                                error : function(xhr, status, error) {
                                    var err = eval("(" + xhr.responseText + ")");
                                alert(status + " " + error + " " + err);
                                }
                            });
                        },
                        error : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(status + " " + error + " " + err);
                        }
                    });
                    */
                });
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
