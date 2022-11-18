            <style>
                .see-data{
                    color: black;
                    font-size: 16px;
                }
                .see-place{
                    font-size: 14px;
                }
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    border-radius: 5px;
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
                .btn-primary:disabled{
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
                .btn-success:disabled{
                    background-color: #5cb85c;
                    border-color: #4cae4c;
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
                                <a class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px" id="aDados" onclick="change(1)"><b>DADOS</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="background-color: #eee; cursor: pointer; font-size: 18px" id="aDoc" onclick="change(2)"><b>DOCUMENTOS</b></a>
                            </li>
                        </ul>
                            
                        <div class="row white-tab" id="divDados" style="display: block;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-9 form-group">
                                        <h2><?php echo $motorista['motorista_nome'] ?></h2>
                                    </div>
                                    <div class="col-md-3 form-group text-right">
                                        <a class="btn btn-primary" href="<?php echo base_url('motoristas') ?>"><i class="fas fa-angle-left"></i>&nbsp;Voltar</a>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label>CPF</label><br>
                                        <input type="text" class="form-control" value="<?php echo $cpf ?>" disabled>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>RG</label><br>
                                        <input type="text" class="form-control" value="<?php echo $motorista['motorista_rg'] ?>" disabled>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Data de Nascimento</label><br>
                                        <input type="date" class="form-control" value="<?php echo $motorista['motorista_nascimento'] ?>" disabled>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Telefone</label><br>
                                        <input type="text" class="form-control" value="<?php echo $tel1 ?>" disabled>
                                    </div>
                                </div>
                                
                                <?php if($empresa != null){ ?>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Empresa</label><br>
                                        <input type="text" class="form-control" value="<?php echo $empresa ?>" disabled>
                                    </div>
                                </div>
                                <?php } ?>
                                
                                <hr>
                                
                                <div class="row">
                                    <div class="col-md-2 form-group">
                                        <label>CEP</label><br>
                                        <input type="text" class="form-control" value="<?php echo $motorista['motorista_cep'] ?>" disabled>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label>Logradouro</label><br>
                                        <input type="text" class="form-control" value="<?php echo $motorista['motorista_endereco'] ?>" disabled>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label>Número</label><br>
                                        <input type="text" class="form-control" value="<?php echo $motorista['motorista_numero'] ?>" disabled>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Bairro</label><br>
                                        <input type="text" class="form-control" value="<?php echo $motorista['motorista_bairro'] ?>" disabled>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label>Cidade</label><br>
                                        <input type="text" class="form-control" value="<?php echo $motorista['motorista_cidade'] ?>" disabled>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Estado</label><br>
                                        <input type="text" class="form-control" value="<?php echo $motorista['motorista_estado'] ?>" disabled>
                                    </div>
                                </div>
                                
                                <br><br>
                            </div>
                        </div>
                        
                        <div class="row white-tab" id="divDocs" style="display: none;">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <br><br><br>
                                
                                <style>
                                    .doc-col{
                                        padding: 0px 10% 0px 10%;
                                        margin-bottom: 15px;
                                    }
                                    .doc-img{
                                        width: 100%;
                                        height: auto;
                                    }
                                    .doc-col h4{
                                        font-weight: bold;
                                        text-align: center;
                                    }
                                </style>
                                
                                <div class="row">
                                    
                                    <?php foreach($docs as $doc){ ?>
                                    
                                    <div class="col-md-3 doc-col">
                                        <?php if($doc['documento_isimagem'] == 1){ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/m_').$motorista['motorista_cpf']."_".$doc['documento_tipo_id'].".png" ?>">
                                            <img class="doc-img" src="<?php echo base_url('uploads/m_').$motorista['motorista_cpf']."_".$doc['documento_tipo_id'].".png" ?>">
                                        </a>
                                        <?php }else{ ?>
                                        <a target="_blank" href="<?php echo base_url('uploads/m_').$motorista['motorista_cpf']."_".$doc['documento_tipo_id'].".pdf" ?>">
                                            <img class="doc-img" src="<?php echo base_url('resources/imgs/pdf_cover.png') ?>">
                                        </a>
                                        <?php } ?>
                                        <?php foreach($tipos_docs as $td){
                                            if($td['documentos_tipos_id'] == $doc['documento_tipo_id']){
                                                echo "<h4>".mb_strtoupper($td['documentos_tipos_nome'])."</h4><br>";
                                            }
                                        } ?>
                                    </div>
                                    
                                    <?php } ?>
                                    
                                </div>
                                
                                <br><br>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <script>
                function change(value){
                    if(value == 1){
                        document.getElementById('aDados').style.backgroundColor = "white";
                        document.getElementById('aDoc').style.backgroundColor = "#eee";

                        document.getElementById('divDados').style.display = "block";
                        document.getElementById('divDocs').style.display = "none";
                    }else if(value == 2){
                        document.getElementById('aDados').style.backgroundColor = "#eee";
                        document.getElementById('aDoc').style.backgroundColor = "white";

                        document.getElementById('divDados').style.display = "none";
                        document.getElementById('divDocs').style.display = "block";
                    }
                }
            </script>
            