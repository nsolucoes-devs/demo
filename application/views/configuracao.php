<style>
        .main-row{
            padding-left: 10px;
            padding-right: 10px;
        }
        .main-col-12{
            padding: 20px;
        }
        .row-c{
            width: 110%;
            margin-bottom: 15px;
        }
        .white-tab{
            background-color: white;
            border-radius: 5px;
        }
        .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
            background-color: #eee;
        }
        .nav-link{
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
            color: #033557;
        }
        .nav.nav-tabs{
            border-bottom: 0;
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
    </style>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        
        <div class="row main-row">
            <div class="col-md-12 main-col-12">
                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="config-tab" data-toggle="tab" href="#config" role="tab" aria-controls="config" aria-selected="true">Configurações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="backup-tab" data-toggle="tab" href="#backup" role="tab" aria-controls="backup" aria-selected="false">Backup</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                    </li>-->
                </ul>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="config" role="tabpanel" aria-labelledby="config-tab">
                        <form id="ClienteForm" action="<?php echo base_url('configuracoes/editarconfiguracao') ?>" method="post" enctype='multipart/form-data'>
                                        <div class="row white-tab" id="divDados" style="display: block;">
                                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-2 form-group">
                                                        <label>Banner</label><br>
                                                        <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#banner').click()" id="btn_banner">Novo Banner</button>
                                                        <input style="display: none" id="banner" name="banner" type="file" class="form-control" placeholder="Arquivo Banner" value="<?php echo $cfgc_banner ?>">
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>Logo</label><br>
                                                        <button type="button" class="btn btn-primary" style="width: 100%" onclick="$('#logo').click()" id="btn_logo">Nova Logo</button>
                                                        <input style="display: none" id="logo" name="logo" type="file" class="form-control" placeholder="Logo" value="<?php echo $cfgc_logo ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2 form-group">
                                                        <label>Telefone Fixo</label><br>
                                                        <input id="tel" name="tel" type="text" class="form-control" placeholder="(00) 0000-0000" value="<?php echo $cfgc_fixo ?>">
                                                    </div>
                                                    
                                                    <div class="col-md-2 form-group">
                                                        <label>Celular 1</label><br>
                                                        <input id="cel1" name="cel1" type="text" class="form-control" placeholder="(00) 00000-0000" value="<?php echo $cfgc_cel1 ?>">
                                                    </div>
                                                    <div class="col-md-1 form-group text-center">
                                                        <label>Whats</label><br>
                                                        <input id="whats1" name="whats1" type="checkbox" value="1" style="display: inline;" <?php if($cfgc_cel1whats == 1) { echo "checked"; } ?>>
                                                    </div>
                                                    
                                                    <div class="col-md-2 form-group">
                                                        <label>Celular 2</label>
                                                        <input id="cel2" name="cel2" type="text" class="form-control" placeholder="(00) 00000-0000" value="<?php echo $cfgc_cel2 ?>">
                                                    </div>
                                                    <div class="col-md-1 form-group text-center">
                                                        <label>Whats</label><br>
                                                        <input id="whats2" name="whats2" type="checkbox" value="1" style="display: inline;" <?php if($cfgc_cel2whats == 1) { echo "checked"; } ?>>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-7 form-group">
                                                        <label>Nome Empresa/Razão Social</label><br>
                                                        <input id="razao" name="razao" type="text" class="form-control" placeholder="Nome Empresa/Razão Social" value="<?php echo $cfgc_empresa ?>" required>
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label>CNPJ</label><br>
                                                        <input id="cnpj" name="cnpj" type="text" class="form-control" placeholder="CNPJ" value="<?php echo $cfgc_cnpj ?>" required>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>Inscrição Estadual</label><br>
                                                        <input id="inscricao" name="inscricao" type="text" class="form-control" placeholder="Inscrição Estadual" value="<?php echo $cfgc_inscestadual ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-2 form-group">
                                                        <label>CEP</label><br>
                                                        <input id="cep" name="cep" type="text" class="form-control" placeholder="00000-000" data-mask="00000-000" value="<?php echo $cfgc_cep ?>" required>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <label>Endereço</label><br>
                                                        <input id="endereco" name="endereco" type="text" class="form-control" placeholder="Endereço" value="<?php echo $cfgc_endereco ?>" required>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>Número</label><br>
                                                        <input id="numero" name="numero" type="number" class="form-control" placeholder="000" value="<?php echo $cfgc_numero ?>" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-3 form-group">
                                                        <label>Complemento</label><br>
                                                        <input id="complemento" name="complemento" type="text" class="form-control" placeholder="Complemento" value="<?php echo $cfgc_complemento ?>">
                                                    </div>
                                                    <div class="col-md-3 form-group">
                                                        <label>Bairro</label><br>
                                                        <input id="bairro" name="bairro" type="text" class="form-control" placeholder="Bairro" value="<?php echo $cfgc_bairro ?>" required>
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label>Cidade</label><br>
                                                        <input id="cidade" name="cidade" type="text" class="form-control" placeholder="Cidade" value="<?php echo $cfgc_cidade ?>" required readonly>
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label>Estado</label><br>
                                                        <input id="estado" name="estado" type="text" class="form-control" placeholder="Estado" value="<?php echo $cfgc_estado ?>" required readonly>
                                                    </div>
                                                </div>
                                                
                                                <br><br>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <button type="submit" id="btn-save" class="btn btn-primary">Atualizar Dados</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    </div>
                    
                    <div class="tab-pane fade" id="backup" role="tabpanel" aria-labelledby="backup-tab">
                        <form if="BackupForm"   action="<?php echo base_url('configuracoes/backup'); ?>" method="post">
                            <br><br><br>
                            <div class="row" id="divBackup">
                                <button type="button" onclick="Aviso()" class="btn btn-warning">Realizar Backup do Sistema</button>
                            </div>
                        </form>
                    </div>
                    
                    <!--<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">  </div>-->
                    
                </div>    
                
            
            </div>
        </div>
        
    </div>
            <script>
                function Aviso(){
                    Swal.fire({
                        title: 'Deseja realizar o backup do sistema?',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: `Sim`,
                        denyButtonText: `Não`,
                        }).then((result) => {
                        
                        if (result.isConfirmed) {
                            
                            $.ajax({
                                url: '<?php echo base_url('backup'); ?>',
                                method: 'post',
                                data: null,
                                processData: false,
                                contentType: false,
                                success : function(response) {
                                        Swal.fire('Backup realizado com sucesso!', '', 'success')
                                            setTimeout(function() {
                                                Location.reload()
                                            }, 5000);
                                    },
                                    error : function(xhr, status, error) {
                                        Swal.fire('Falha ao realizar o backup!', '', 'info')
                                        console.log(xhr.responseText);
                                    }
                                });
                            
                        } else if (result.isDenied) {
                        Swal.fire('Backup cancelado', '', 'info')
                        }
                        })
                }
            </script>
            <script>
                $('#banner').change(function(){
                    $('#btn_banner').removeClass('btn-primary').addClass('btn-success').html('Sucesso!');
                });
                $('#logo').change(function(){
                    $('#btn_logo').removeClass('btn-primary').addClass('btn-success').html('Sucesso!');
                });
            </script>
            
            <script>
                $("#cep").keyup(function(){
                    
                    if($("#cep").val().length == 9){
            			var cep = this.value.replace(/[^0-9]/, "");
            			var url = "https://viacep.com.br/ws/"+cep+"/json/";
            
            			if(cep.length != 8){
            				return false;
            			}
            
            			$.getJSON(url, function(dadosRetorno){
            				try{
            					$("#endereco").val(dadosRetorno.logradouro);
            					$("#bairro").val(dadosRetorno.bairro);
            					$("#cidade").val(dadosRetorno.localidade);
            					$("#estado").val(dadosRetorno.uf);
            				}catch(ex){
            				    alert("Erro na captura dos dados a partir do CEP: " + ex);
            				}
            			});
                    }
                    
            	});
            </script>