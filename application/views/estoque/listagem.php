            <style>
                body{
                    padding-right: 0!important;
                }
            
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
                    border-radius: 5px;
                    background-color: white;
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
                
                .modal-dialog.nota{
                    width: 80%;
                    max-width: 100%;
                    margin: 3% 0 0 11%;
                }
                .modal-dialog.filtro{
                    width: 60%;
                    max-width: 100%;
                    margin: 3% 20% 0 20%;
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
                .nav-tabs {
                    border-bottom: 0;
                }
                .nav.nav-tabs{
                    border-bottom: 0;
                }
                .sel-with-add{
                    width: calc(100% - 55px);
                    display: inline;
                    float: left;
                }
                .sel-with-add select{
                    width: 100%;
                }
                .add-din{
                    width: 55px;
                    display: inline;
                    float: left;
                }
                .add-din button{
                    margin-left: 15px;
                    width: 40px;
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

                        <div style="margin-bottom: 10px">
                            <?php if($this->session->userdata('editar') == 1) { ?>
                            <a class="btn btn-primary" href="<?php echo base_url('financeiro/cadastroNota') ?>" class="plus">Lançamento</a>
                            <a class="btn btn-primary" data-toggle="modal" data-target="#filtroModal"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                            <?php } ?>
                            <?php if($this->session->userdata('ativar') == 1) { ?>
                            <a class="btn-info-red" onclick="mostraInfo()"><em class="fa fa-question"></em></a>
                            <?php } ?>
                        </div>

                        <div id="divfiltro" class="row" style="margin-left: calc(100% - 250px);">
                            <label style="position: relative; right: 20%; top: 32px; font-size: 14px;">Procurar:</label>
                            <form action="<?php echo base_url('movimentosestoque') ?>" method="post">
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
                            <table id="myTableMovimentos" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 5%">Data</th>
                                        <th style="width: 15%">N° Doc</th>
                                        <th style="width: 15%">Tipo</th>
                                        <th style="width: 20%">Tomador</th>
                                        <th style="width: 20%">Espécie</th>
                                        <th style="width: 15%">Valor</th>
                                        <th style="width: 1%">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($movimentos as $mv){ ?>
        					        <tr>
        					            <td style="padding-top: 12px!important;"><?php echo $mv['emissao']; ?></td>
        					            
        					            <td style="vertical-align: middle;">
                                            <div class="encurtar" title="<?php echo ucwords(mb_strtolower($mv['numeroserie']));?>">
                                                <?php echo ucwords(mb_strtolower($mv['numeroserie'])) ?>
                                            </div>
                                        </td>
                                        
                                        <td style="vertical-align: middle;">
                                            <div class="encurtar" title="<?php echo ucwords(mb_strtolower($mv['tipo']));?>">
                                                <?php echo ucwords(mb_strtolower($mv['tipo'])) ?>
                                            </div>
                                        </td>
                                        
                                        <td style="vertical-align: middle;">
                                            <div class="encurtar" title="<?php echo ucwords(mb_strtolower($mv['forneclin']));?>">
                                                <?php echo ucwords(mb_strtolower($mv['forneclin'])) ?>
                                            </div>
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <div class="encurtar" title="<?php echo ucwords(mb_strtolower($mv['especie']));?>">
                                                <?php echo ucwords(mb_strtolower($mv['especie'])) ?>
                                            </div>
                                        </td>
        					            <td style="padding-top: 12px!important;"><?php echo $mv['valor'] ?></td>
        					            <td style="text-align: center;">
        					                <?php if($this->session->userdata('ver') == 1 || $this->session->userdata('editar') == 1 || $this->session->userdata('excluir') == 1) { ?>
                                                <div class="btn-group dropleft">
                                                        <button type="button" class="btn btn-primary" style="height: 20px;width: 20px;border-radius: 4px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <em style="position: absolute;top: 4px;left: 7px; font-size: 11px;" class="fa fa-bars"></em>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                        <?php if($this->session->userdata('ver') == 1) { ?>
                                                        <a class="dropdown-item" href="<?php echo base_url('financeiro/vernota/').$mv['id'] ?>">Ver</a>
                                                        <?php } ?>
                                                        <?php if($this->session->userdata('editar') == 1) { ?>
                                                        <a class="dropdown-item" href="<?php echo base_url('financeiro/editarnota/').$mv['id'] ?>">Editar</a>
                                                        <?php } ?>
                                                        <?php if($this->session->userdata('excluir') == 1) { ?>
                                                        <a data-toggle="modal" data-target="#modalExcluir" style="cursor: pointer" class="dropdown-item" onclick="excluirNota(<?php echo $mv['id'] ?>)">Excluir</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
        					            </td>
        					        </tr>
        					        <?php } ?>
                                </tbody>
                            </table>
                            <?php if($movimentos == null){ ?>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p>Nenhum movimento de estoque encontrado.</p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p style="position: absolute; left: 4%; color: #033557;"><b><?php echo $qtd_itens_pag ?> movimento(s) de estoque encontrado(s)</b></p>
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
            
            <div class="modal fade" id="rmvEstoque" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Reduzir Estoque</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideModal('rmv')" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('estoque/reduzirEstoque') ?>" method="post">
                            <input type="hidden" id="id_rmv" name="id_rmv">
                            
                            <div class="modal-body">
                                
                                <div class="row">
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Quantidade</label><br>
                                        <input type="number" class="form-control" min="0" name="qtd_rmv" id="qtd_rmv" placeholder="0" >
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Data</label>
                                        <input type="date" class="form-control" name="data_rmv" id="data_rmv" requrired value="<?php echo date('Y-m-d') ?>">
                                    </div>
                                    
                                    <div class="col-md-12 form-group">
                                        <label>Motivo</label><br>
                                        <textarea class="form-control" name="detalhes_rmv" id="detalhes_rmv" placeholder="Detalhes..." ></textarea>
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="hideModal('rmv')">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Reduzir</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="filtroModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog filtro" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Selecione os Filtros</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideFiltro()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form action="<?php echo base_url('relatorios/pdfmovimentos') ?>" method="post" target="_blank">
                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Peça</label><br>
                                        <select class="select2-peca" id="filtro_peca" style="width:100%!important" name="filtro_peca">
                                            <option value="" disabled selected>-- Selecione uma Peça --</option>
                                            <?php foreach($produtos as $prod){
                                                echo "<option value='".$prod['produto_id']."'>".$prod['produto_nome']." | ".$prod['produto_modelo']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Fornecedor</label><br>
                                        <select class="select2-fornecedor" id="filtro_forn"  style="width:100%!important" name="filtro_forn">
                                            <option value="" disabled selected>-- Selecione um Fornecedor --</option>
                                            <?php foreach($fornecedores as $forn){
                                                echo "<option value='".$forn['fornecedor_cnpj']."'>".$forn['fornecedor_nome']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>De</label><br>
                                        <input type="date" class="form-control" id="filtro_de" name="filtro_de">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Até</label><br>
                                        <input type="date" class="form-control" id="filtro_ate" name="filtro_ate">
                                    </div>
                                </div>
                                
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="hideFiltro()">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                            </div>  
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="tipoModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document" style="margin-top: 21%;">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Tipo de Movimento</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="tipoHide()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                       <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome</label><br>
                                    <input type="text" class="form-control" id="tipo_nome" placeholder="Nome">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Tipo</label><br>
                                    <select class="tipo-select2" id="tipo_tipo"  style="width: 100%!important">
                                        <option value="0" selected disabled>-- Selecione --</option>
                                        <option value="ENTRADA">Entrada</option>
                                        <option value="SAIDA">Saída</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <div class="col-md-10" style="padding-left: 0">
                                        <label>Movimenta Estoque?</label><br>
                                        <label>Devolução?</label><br>
                                        <label>Nota Fiscal?</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="checkbox" id="tipo_movimenta" value="1"><br>
                                        <input type="checkbox" id="tipo_devolucao" value="1"><br>
                                        <input type="checkbox" id="tipo_nota" value="1" checked>
                                    </div>
                                    
                                    <div class="col-md-12" style="padding: 0">
                                        <div class="col-md-6" style="padding-right: 5; padding-left: 0">
                                            <input type="radio" name="tipo_item" value="1" id="tipo_produto" checked>&nbsp;<label>Produto</label>
                                        </div>
                                        <div class="col-md-6" style="padding-right: 0; padding-left: 5">
                                            <input type="radio" name="tipo_item" value="2" id="tipo_servico">&nbsp;<label>Serviço</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="tipoHide()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="tipoSubmit()">Adicionar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="addfc" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog filtro" role="document" style="margin-top: 10%;">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Fornecedor</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hidefc()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                       <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-md-6 form-group">
                                    <label>Tipo de Inserção</label><br>
                                    <select  style="width: 100%!important" class="select2-search block-sel" id="tipo_fc">
                                        <option value="1">Fornecedor</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>CPF/CNPJ</label><br>
                                    <div class="sel-with-add">
                                        <input class="form-control cnpj" id="cpfcnpj_fc" placeholder="000.000.000-00">
                                    </div>
                                    <div class="add-din">
                                        <button type="button" class="btn btn-primary" onclick="cnpjSearch()"><em class="fa fa-search"></em></button>
                                    </div>
                                </div>
                                
                                <div class="col-md-8 form-group">
                                    <label>Nome</label><br>
                                    <input type="text" class="form-control disabled" id="nome_fc" placeholder="Nome" disabled>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Ramo</label><br>
                                    <input type="text" class="form-control disabled" id="ramo_fc" placeholder="Ramo" disabled>
                                </div>
                                
                                <div class="col-md-3 form-group">
                                    <label>CEP</label><br>
                                    <input type="text" class="form-control disabled cep" id="cep_fc" placeholder="00000-000" disabled>
                                </div>
                                <div class="col-md-7 form-group">
                                    <label>Logradouro</label><br>
                                    <input type="text" class="form-control cep-disabled" id="logradouro_fc" placeholder="Logradouro" disabled>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>N°</label><br>
                                    <input type="text" class="form-control cep-disabled number" id="num_fc" placeholder="0" disabled>
                                </div>
                                
                                <div class="col-md-4 form-group">
                                    <label>Bairro</label><br>
                                    <input type="text" class="form-control cep-disabled" id="bairro_fc" placeholder="Bairro" disabled>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Complemento</label><br>
                                    <input type="text" class="form-control cep-disabled" id="complemento_fc" placeholder="Complemento" disabled>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Cidade</label><br>
                                    <input type="text" class="form-control cep-disabled" id="cidade_fc" placeholder="Cidade" disabled>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>Estado</label><br>
                                    <input type="text" class="form-control cep-disabled" id="estado_fc" placeholder="Estado" disabled>
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>E-mail</label><br>
                                    <input type="email" class="form-control disabled" id="email_fc" placeholder="mail@mail.com" disabled>
                                </div>

                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hidefc()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendfc()">Adicionar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="novaPeca" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Nova Peça</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hidePeca()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_nome" placeholder="Nome">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Código da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_codigo" placeholder="Código">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Modelo da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_modelo" placeholder="Modelo">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Preço de Custo (R$):</label><br>
                                    <input type="text" class="form-control valor" id="peca_custo" placeholder="0,00">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Preço de Venda (R$):</label><br>
                                    <input type="text" class="form-control valor" id="peca_venda" placeholder="0,00">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>Fabricante:</label><br>
                                    <input type="text" class="form-control" id="peca_fabricante" placeholder="Fabricante">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>Fornecedor:</label><br>
                                    <select class="peca-select2" id="peca_fornecedor"  style="width: 100%!important">
                                        <option value="" disabled selected>-- Selecione um Fornecedor --</option>
                                        <?php foreach($fornecedores as $forn){
                                            echo "<option value='".$forn['fornecedor_cnpj']."'>".$forn['fornecedor_nome']."</option>";
                                        } ?>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hidePeca()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendPeca()">Cadastrar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="novoServ" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Novo Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideServ()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label>Nome</label>
                                    <input type="text" class="form-control" id="serv_nome" placeholder="Nome">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Valor</label>
                                    <input type="text" class="form-control valor" id="serv_valor" placeholder="0,00">
                                </div>
                            </div>
                        </div>
                            
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" onclick="hideServ()">Cancelar</button>
                            &nbsp;&nbsp;
                            <button type="button" class="btn btn-primary" onclick="novoServ()">Adicionar</button>
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
                            <h4>Deseja realmente excluir a nota?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white;" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                            <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php echo base_url('estoque/excluirNota') ?>" method="post">
                                        <input type="hidden" name="idnota" id="idnota">
                                        <input type="hidden" name="callback" id="callback" value="movimentosestoque">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="border: 1px color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
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
                function excluirNota(id){
                    $('#idnota').val(id);
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
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
                function tipoDinamico(){
                    $('#tipoModal').modal('show');
                    $('#notaModal').modal('hide');
                }
                
                function tipoHide(){
                    $('#tipoModal').modal('hide');
                    $('#notaModal').modal('show');
                    
                    $('#tipo_nome').val('');
                    $('#tipo_tipo').val('0').change();
                    $('#tipo_movimenta').prop('checked', false);
                    $('#tipo_devolucao').prop('checked', false);
                    $('#tipo_nota').prop('checked', true);
                    $('#tipo_produto').click();
                }
                
                $('#tipo_produto').click(function(){
                    $('#tipo_movimenta').prop('disabled', false);
                    $('#tipo_devolucao').prop('disabled', false);
                });
                
                $('#tipo_servico').click(function(){
                    $('#tipo_movimenta').prop({'disabled' : true, 'checked' : false});
                    $('#tipo_devolucao').prop({'disabled' : true, 'checked' : false});
                });
                
                function tipoSubmit(){
                    if($('#tipo_nome').val() != "" && $('#tipo_nome').val() != " "){
                        if($('#tipo_tipo').val() != "" && $('#tipo_tipo').val() != "0"){
                            dados = new FormData();
                            dados.append('nome', $('#tipo_nome').val());
                            dados.append('tipo', $('#tipo_tipo').val());
                            
                            if($('#tipo_movimenta').prop('checked') == true){
                                dados.append('movimenta', 1);
                            }else{
                                dados.append('movimenta', 0);
                            }
                            
                            if($('#tipo_devolucao').prop('checked') == true){
                                dados.append('devolucao', 1);
                            }else{
                                dados.append('devolucao', 0);
                            }
                            
                            if($('#tipo_nota').prop('checked') == true){
                                dados.append('nota', 1);
                            }else{
                                dados.append('nota', 0);
                            }
                            
                            if($('#tipo_produto').prop('checked') == true){
                                dados.append('item_add', 1);
                            }else{
                                dados.append('item_add', 2);
                            }
                            
                            $.ajax({
                                url: '<?php echo base_url('financeiro/dynamicNewTipo'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                error: function(xhr, status, error) {
                                    alert('tipoSubmit(): Erro, verifique o console');
                                    console.log('tipoSubmit(): '+xhr.responseText);
                                },
                                success: function(data) {
                                    if(data != "null" && data != "" && data != " " && data != null){
                                        novo = jQuery.parseJSON(data);
                                        if(novo.tm_movimenta_estoque == '0' || novo.tm_movimenta_estoque == 0){
                                            var opt = '<option value="'+novo.tm_id+'">'+novo.tm_nome+'</option>';
                                            $('#operacao').append(opt);
                                            if($('#tipo_anchor').val() == ""){
                                                $('#tipo_anchor').val(novo.tm_id+'☺'+novo.tm_nota_fiscal+'☺'+novo.tm_produto+'☺'+novo.tm_servico);
                                            }else{
                                                $('#tipo_anchor').val($('#tipo_anchor').val()+'☻'+novo.tm_id+'☺'+novo.tm_nota_fiscal+'☺'+novo.tm_produto+'☺'+novo.tm_servico);
                                            }
                                        }
                                        tipoHide();
                                    }else{
                                        alert("Erro no banco");
                                    }
                                },
                            });
                        }else{
                            alert('Por favor selecione um tipo!');
                        }
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                }
            </script>
            
            <script>
                function dynamicFC(){
                    $('#addfc').modal('show');
                    $('#notaModal').modal('hide');
                }
                
                function hidefc(){
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('.cnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('#addfc').modal('hide');
                    $('#notaModal').modal('show');
                    $('.disabled').prop('disabled', true);
                    $('.cep-disabled').prop('disabled', true);
                    $('.block-sel').prop('disabled', false);
                    
                    $('#tipo_fc').val(1).change();
                    $('#cpfcnpj_fc').unmask().val('');
                    $('#cpfcnpj_fc').val().length > 11 ? $('#cpfcnpj_fc').mask('00.000.000/0000-00', cpfoptions) : $('#cpfcnpj_fc').mask('000.000.000-00#', cpfoptions);
                    $('#nome_fc').val('');
                    $('#ramo_fc').val('');
                    $('#cep_fc').unmask().val('').mask('00000-000');
                    $('#logradouro_fc').val('');
                    $('#num_fc').unmask().val('').mask("0#");
                    $('#bairro_fc').val('');
                    $('#complemento_fc').val('');
                    $('#cidade_fc').val('');
                    $('#estado_fc').val('');
                    $('#email_fc').val('');
                }
                
                function cnpjSearch(){
                    
                    var cnpj = $('#cpfcnpj_fc').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;

                    if(tam == 14 || tam == 11){
                        dados = new FormData();
                        dados.append('cnpj', cnpj);
                        dados.append('tipo', $('#tipo_fc').val());
                        $.ajax({
                            url: '<?php echo base_url('financeiro/verificaFC') ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert('cnpjSearch(): Erro, verifique o console');
                                console.log('cnpjSearch(): '+xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    if(data == 1){
                                        alert('O CPF/CNPJ inserido já está inserido no banco!');
                                        $('.disabled').prop('disabled', true);
                                        $('.block-sel').prop('disabled', false);
                                    }else if(data == 2){
                                        $('.block-sel').prop('disabled', true);
                                        $('.disabled').prop('disabled', false);
                                    }
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        $('.disabled').prop('disabled', true);
                        alert('Digite um CPF ou CNPJ válido!');
                    }
                }
                
                $("#cep_fc").keyup(function(){
                    
                    if($("#cep_fc").val().length == 9){
            			var cep = this.value.replace(/[^0-9]/, "");
            			var url = "https://viacep.com.br/ws/"+cep+"/json/";
            
            			if(cep.length != 8){
            				return false;
            			}
            
            			$.getJSON(url, function(dadosRetorno){
            				try{
            					$("#logradouro_fc").val(dadosRetorno.logradouro);
            					$("#bairro_fc").val(dadosRetorno.bairro);
            					$("#cidade_fc").val(dadosRetorno.localidade);
            					$("#estado_fc").val(dadosRetorno.uf);
            					$('.cep-disabled').prop('disabled', false);
            				}catch(ex){
            				    alert("Erro na captura dos dados a partir do CEP: " + ex);
            				}
            			});
                    }
                    
            	});
            	
            	function sendfc(){
            	    var cnpj = $('#cpfcnpj_fc').val().replace(/[^\d]+/g,'');
                    var tam = cnpj.length;

                    if(tam == 14 || tam == 11){
                        if($('#nome_fc').val() != ''){
                            if($('#ramo_fc').val() != ''){
                                var cep = $("#cep_fc").val().replace(/[^0-9]/, "");
                                if(cep.length == 8){
                                    if($('#logradouro_fc').val() != ''){
                                        if($('#num_fc').val() != ''){
                                            if($('#bairro_fc').val() != ''){
                                                if($('#cidade_fc').val() != ''){
                                                    if($('#estado_fc').val() != ''){
                                                        if($('#email_fc').val() != ''){
                                                            
                                                            dados = new FormData();
                                                            dados.append('cnpj', cnpj);
                                                            dados.append('tipo', $('#tipo_fc').val());
                                                            dados.append('nome', $('#nome_fc').val());
                                                            dados.append('ramo', $('#ramo_fc').val());
                                                            dados.append('cep', cep);
                                                            dados.append('logradouro', $('#logradouro_fc').val());
                                                            dados.append('num', $('#num_fc').val());
                                                            dados.append('bairro', $('#bairro_fc').val());
                                                            dados.append('complemento', $('#complemento_fc').val());
                                                            dados.append('cidade', $('#cidade_fc').val());
                                                            dados.append('estado', $('#estado_fc').val());
                                                            dados.append('email', $('#email_fc').val());
                                                            $.ajax({
                                                                url: '<?php echo base_url('financeiro/novoFC') ?>',
                                                                method: 'post',
                                                                data: dados,
                                                                processData: false,
                                                                contentType: false,
                                                                error: function(xhr, status, error) {
                                                                    alert('sendfc(): Erro, verifique o console');
                                                                    console.log('sendfc(): '+xhr.responseText);
                                                                },
                                                                success: function(data) {
                                                                    if(data != "null" && data != "" && data != " " && data != null){
                                                                        item = jQuery.parseJSON(data);
                                                                        
                                                                        if(item.id.indexOf('F')> -1){
                                                                            var auxvalue = item.id.substr(2);
                                                                            var opt = '<option value="'+auxvalue+'">'+item.nome+'</option>';
                                                                            $('#fornecedor').append(opt);
                                                                        }
                                                                        
                                                                        hidefc();
                                                                    }else{
                                                                        alert("Erro no banco");
                                                                    }
                                                                },
                                                            });
                                                            
                                                        }else{
                                                            alert('Por favor informe um e-mail válido!');
                                                        }
                                                    }else{
                                                        alert('Por favor informa um estado válido!');
                                                    }
                                                }else{
                                                    alert('Por favor informe uma cidade válida!');
                                                }
                                            }else{
                                                alert('Por favor informe um bairro válido!');
                                            }
                                        }else{
                                            alert('Por favor insira um número válido!');
                                        }
                                    }else{
                                        alert('Por favor informe um logradouro válido!');
                                    }
                                }else{
                                    alert('Por favor insira um CEP válido!');
                                }
                            }else{
                                alert('Por favor informe um ramo válido!');
                            }
                        }else{
                            alert('Por favor informe um nome válido!');
                        }
                    }else{
                        alert('Por favor insira um CPF/CNPJ válido!');
                    }
            	}
            </script>
            
            <script type="text/javascript">
                function add_prod(){
                    var ctE = parseInt($('#ctE').val());
                    
                	var div1 = document.createElement('div');
                	div1.id = 'E'+ctE;
                	//var delLink = '<div  class="col-md-1" style="text-align:right;margin-right:65px"><a href="javascript:delItE('+ ctE +')">Remover</a></div>';   + delLink;
                	div1.innerHTML = document.getElementById('newlinkproduto').innerHTML;
                	document.getElementById('newproduto').appendChild(div1);
                	
                	$('#E'+ctE).find('select').last().prop('id', 'sel_'+ctE).prop('name', 'produto['+ctE+']');
                	$('#E'+ctE).children('.col-md-2').first().find('input').last().prop('id', 'qtd_'+ctE).prop('name', 'quantia['+ctE+']');
                	$('#E'+ctE).children().last().find('input').last().prop('id', 'vlr_'+ctE).prop('name', 'valor['+ctE+']');
                	$('#E'+ctE).prop('class', 'dynamic-el');
                	
                	setMask($('#E'+ctE).find('input').last(), $('#E'+ctE).find('input').first());
                	initializeSelect2($('#E'+ctE).find('select'));
                	
                	ctE++;
                    $('#ctE').val(ctE);
                }
                
                function delItE(eleId){
                	d = document.getElementById('E'+eleId);
                	d.remove();
                }
                
                function initializeSelect2(selectElementObj) {
                    selectElementObj.select2({theme: 'bootstrap', dropdownParent: $('#notaModal')});
                }
                
                function setMask(vlr, qtd){
                    vlr.mask("#.##0,0000", {reverse: true});
                    qtd.mask("0#");
                }
            </script>
            
            <script type="text/javascript">
                function add_serv(){
                    var ctD = parseInt($('#ctD').val());
                    
                	var div1 = document.createElement('div');
                	div1.id = 'D'+ctD;
                	//var delLink = '<div  class="col-md-1" style="text-align:right;margin-right:65px"><a href="javascript:delItE('+ ctE +')">Remover</a></div>';   + delLink;
                	div1.innerHTML = document.getElementById('newlinkservico').innerHTML;
                	document.getElementById('newservico').appendChild(div1);
                	
                	$('#D'+ctD).find('select').last().prop('id', 'serv_'+ctD).prop('name', 'servico['+ctD+']');
                	$('#D'+ctD).children('.col-md-2').first().find('input').last().prop('id', 'qtdServ_'+ctD).prop('name', 'quantiaServ['+ctD+']');
                	$('#D'+ctD).children().last().find('input').last().prop('id', 'vlrServ_'+ctD).prop('name', 'valorServ['+ctD+']');
                	$('#D'+ctD).prop('class', 'dynamic-elD');
                	
                	setMaskD($('#D'+ctD).find('input').last(), $('#D'+ctD).find('input').first());
                	initializeSelect2D($('#D'+ctD).find('select'));
                	
                	ctD++;
                    $('#ctD').val(ctD);
                }
                
                function delItD(eleId){
                	d = document.getElementById('D'+eleId);
                	d.remove();
                }
                
                function initializeSelect2D(selectElementObj) {
                    selectElementObj.select2({theme: 'bootstrap', dropdownParent: $('#notaModal')});
                }
                
                function setMaskD(vlr, qtd){
                    vlr.mask("#.##0,0000", {reverse: true});
                    qtd.mask("0#");
                }
            </script>
            
            <script>
                function pegaValor(id, pos){
                    var newPos = pos.substr(4);
                    var array = <?php echo json_encode($produtos) ?>;
                    var check = 0;

                    for(var i = 0; i < array.length; i++){
                        if(id == array[i].produto_id){
                            check = 1;
                            $('#vlr_'+newPos).unmask().val(array[i].produto_preco_custo).mask("#.##0,0000", {reverse: true});
                        }
                    }
                    
                    if(check == 0){
                        var dp = $('#dp').val().split('☻');
                        for(var i = 0; i < dp.length; i++){
                            var ex = dp[i].split('☺');
                            if(ex[0] == id){
                                $('#vlr_'+newPos).unmask().val(ex[1]).mask("#.##0,0000", {reverse: true});
                            }
                        }
                    }
                }
                
                function pegaValorServ(id, pos){
                    var newPos = pos.substr(5);
                    var array = <?php echo json_encode($servicos) ?>;
                    var check = 0;

                    for(var i = 0; i < array.length; i++){
                        if(id == array[i].servico_id){
                            check = 1;
                            $('#vlrServ_'+newPos).unmask().val(array[i].servico_custo).mask("#.##0,0000", {reverse: true});
                        }
                    }
                    
                    if(check == 0){
                        var ds = $('#ds').val().split('☻');
                        for(var i = 0; i < ds.length; i++){
                            var ex = ds[i].split('☺');
                            if(ex[0] == id){
                                $('#vlrServ_'+newPos).unmask().val(ex[1]).mask("#.##0,0000", {reverse: true});
                            }
                        }
                    }
                }
            </script>

            <script>
                function checkNota(val){
                    var tipos = <?php echo json_encode($operacoes) ?>;
                    var check = 0;
                    
                    for(var i = 0; i < tipos.length; i++){
                        if(tipos[i].tm_id == val){
                            var check = 1;
                            if(tipos[i].tm_nota_fiscal == 0){
                                $('#dados_nota').css('display', 'none');
                                $('#numero').prop('required', false);
                                $('#serie').prop('required', false);
                            }else{
                                $('#dados_nota').css('display', 'block');
                                $('#numero').prop('required', true);
                                $('#serie').prop('required', true);
                            }
                            
                            if(tipos[i].tm_produto == 1){
                                $('#ctE').val(1);
                                $('#ctD').val(0);
                                $('#nav-itens-tab').css('display', 'block');
                                $('#nav-itens2-tab').css('display', 'none');
                                $('.dynamic-elD').each(function(){
                                    $(this).remove();
                                });
                                $('#serv_0').val('').change();
                                $('#qtdServ_0').val('');
                                $('#vlrServ_0').val('');
                                $('#ctD').val(0);
                            }else if(tipos[i].tm_servico == 1){
                                $('#ctD').val(1);
                                $('#ctE').val(0);
                                $('#nav-itens2-tab').css('display', 'block');
                                $('#nav-itens-tab').css('display', 'none');
                                $('.dynamic-el').each(function(){
                                    $(this).remove();
                                });
                                $('#sel_0').val('').change();
                                $('#qtd_0').val('');
                                $('#vlr_0').val('');
                                $('#ctE').val(0);
                            }
                        }
                    }
                    
                    if(check == 0){
                        var anchor = $('#tipo_anchor').val().split('☻');
                        for(var i = 0; i < anchor.length; i++){
                            var ex = anchor[i].split('☺');
                            if(val == ex[0]){
                                if(parseInt(ex[1]) == 0){
                                    $('#dados_nota').css('display', 'none');
                                    $('#numero').prop('required', false);
                                    $('#serie').prop('required', false);
                                }else{
                                    $('#dados_nota').css('display', 'block');
                                    $('#numero').prop('required', true);
                                    $('#serie').prop('required', true);
                                }
                                
                                if(parseInt(ex[2]) == 1){
                                    $('#nav-itens-tab').css('display', 'block');
                                    $('#nav-itens2-tab').css('display', 'none');
                                    $('.dynamic-elD').each(function(){
                                        $(this).remove();
                                    });
                                    $('#serv_0').val('').change();
                                    $('#qtdServ_0').val('');
                                    $('#vlrServ_0').val('');
                                    $('#ctE').val(1);
                                    $('#ctD').val(0);
                                }else if(parseInt(ex[3]) == 1){
                                    $('#nav-itens2-tab').css('display', 'block');
                                    $('#nav-itens-tab').css('display', 'none');
                                    $('.dynamic-el').each(function(){
                                        $(this).remove();
                                    });
                                    $('#sel_0').val('').change();
                                    $('#qtd_0').val('');
                                    $('#vlr_0').val('');
                                    $('#ctD').val(1);
                                    $('#ctE').val(0);
                                }
                            }
                        }
                    }
                }
            </script>
            
            <script>
                $(document).ready(function(){
                    $('.select2-modal').select2({theme: "bootstrap", dropdownParent: $('#notaModal')});
                    $('.select2-peca').select2({theme: "bootstrap", dropdownParent: $('#filtroModal')});
                    $('.peca-select2').select2({theme: "bootstrap", dropdownParent: $('#novaPeca')});
                    $('.select2-fornecedor').select2({theme: "bootstrap", dropdownParent: $('#filtroModal')});
                    $('.tipo-select2').select2({theme: "bootstrap", dropdownParent: $('#tipoModal')});
                    
                    $('.valor').mask("#.##0,0000", {reverse: true});
                    $('.number').mask("0#");
                    
                    <?php 
                        if(isset($erro)) { 
                            if($erro == 1){
                                echo "Swal.fire(
                                '',
                                'Nota editada com sucesso!',
                                'success'
                                )";
                            }
                            else if($erro == 2){
                                echo "Swal.fire(
                                '',
                                'Não foi possivel excluir a nota pois a senha inserida estava incorreta!',
                                'error'
                                )";
                            }
                            else if($erro == 3){
                                echo "Swal.fire(
                                '',
                                'Não foi possivel excluir a nota pois está vinculada a outro título!',
                                'error'
                                )";
                            }
                            else if($erro == 4){
                                echo "Swal.fire(
                                '',
                                'Nota excluída com sucesso!',
                                'success'
                                )";
                            }
                        } 
                    ?>
                });
            </script>
            
            <script>
                function setField(campo, id){
                    $('#id_'+campo).val(id);
                }
                
                function hideModal(type){
                    $('#'+type+'Estoque').modal('hide');
                }
            </script>
            
            <script>
                function change(value){
        
                    var div = $(".change-tab-div").toArray();
                    var btn = $(".change-tab-btn").toArray();
                    var affectedIndex = value - 1;
                    
                    div.forEach(function(v, i){
                        if(i == affectedIndex){
                            $(v).css('display', 'block');
                        }else{
                            $(v).css('display', 'none');
                        }
                    });
                    
                    btn.forEach(function(v, i){
                        if(i == affectedIndex){
                            $(v).css('background-color', 'white');
                        }else{
                            $(v).css('background-color', '#eee');
                        }
                    });
                }
            </script>
            
            <script>
                function hideFiltro(){
                    $('#filtro_peca').val('').change();
                    $('#filtro_forn').val('').change();
                    $('#filtro_de').val('');
                    $('#filtro_ate').val('');
                    
                    $('#filtroModal').modal('hide');
                }
            </script>
            
            <script>
                $('#form_lanca').on('submit', function(e){
                    if($('#nav-itens-tab').css('display') == 'block'){
                        if($('#sel_0').val() != null && $('#sel_0').val() != ""){
                            if($('#qtd_0').val() != null && $('#qtd_0').val() != ""){
                                if($('#vlr_0').val() != null && $('#vlr_0').val() != ""){
                                    $('#form_lanca').submit();
                                }else{
                                    e.preventDefault();
                                    alert('Por favor insira um valor válido!');
                                }
                            }else{
                                e.preventDefault();
                                alert('Por favor informe uma quantia válida!');
                            }
                        }else{
                            e.preventDefault();
                            alert('Por favor selecione um item na aba de itens!');
                        }
                    }
                    
                    if($('#nav-itens2-tab').css('display') == 'block'){
                        if($('#serv_0').val() != null && $('#serv_0').val() != ""){
                            if($('#qtdServ_0').val() != null && $('#qtdServ_0').val() != ""){
                                if($('#vlrServ_0').val() != null && $('#vlrServ_0').val() != ""){
                                    $('#form_lanca').submit();
                                }else{
                                    e.preventDefault();
                                    alert('Por favor insira um valor válido!');
                                }
                            }else{
                                e.preventDefault();
                                alert('Por favor informe uma quantia válida!');
                            }
                        }else{
                            e.preventDefault();
                            alert('Por favor selecione um item na aba de itens!');
                        }
                    }
                });
            </script>
            
            <script>
                function dynamicPeca(){
                    $('#novaPeca').modal('show');
                    $('#notaModal').modal('hide');
                }
                
                function hidePeca(){
                    $('#peca_nome').val('');
                    $('#peca_codigo').val('');
                    $('#peca_modelo').val('');
                    $('#peca_fabricante').val('');
                    $('#peca_fornecedor').get(0).selectedIndex = 0;
                    $('#peca_fornecedor').change();
                    $('#peca_custo').unmask().val('').mask("#.##0,0000", {reverse: true});
                    $('#peca_venda').unmask().val('').mask("#.##0,0000", {reverse: true});
                    $('#novaPeca').modal('hide');
                    $('#notaModal').modal('show');
                }
                
                function sendPeca(){
                    if($('#peca_nome').val() != "" && $('#peca_nome').val() != " "){
                        if($('#peca_codigo').val() != "" && $('#peca_codigo').val() != " "){
                            if($('#peca_modelo').val() != "" && $('#peca_modelo').val() != " "){
                                if($('#peca_fabricante').val() != "" && $('#peca_fabricante') != " "){
                                    if($('#peca_fornecedor').get(0).selectedIndex != 0){
                                        var custo = $('#peca_custo').val().replaceAll('.', '').replace(',', '.');
                                        if(custo != ""){
                                            var venda = $('#peca_venda').val().replaceAll('.', '').replace(',', '.');
                                            if(venda != ""){
                                                
                                                dados = new FormData();
                                                dados.append('nome', $('#peca_nome').val());
                                                dados.append('custo', $('#peca_custo').val());
                                                dados.append('venda', $('#peca_venda').val());
                                                dados.append('codigo', $('#peca_codigo').val());
                                                dados.append('fabricante', $('#peca_fabricante').val());
                                                dados.append('fornecedor', $('#peca_fornecedor').val());
                                                dados.append('modelo', $('#peca_modelo').val());
                                                $.ajax({
                                                    url: '<?php echo base_url('manutencao/pecaDinamica'); ?>',
                                                    method: 'post',
                                                    data: dados,
                                                    processData: false,
                                                    contentType: false,
                                                    error: function(xhr, status, error) {
                                                        alert('sendPeca(): Error, check console');
                                                        console.log(xhr.responseText);
                                                    },
                                                    success: function(data) {
                                                        if(data != "null" && data != "" && data != " " && data != null){
                                                            peca = jQuery.parseJSON(data);
                                                            
                                                            var op = "<option value='"+peca.produto_id+"'>"+peca.produto_nome+" | "+peca.produto_modelo+"</option>";
                                                            
                                                            $('#nav-itens').find('select').each(function(){
                                                                $(this).append(op);
                                                            });
                                                            
                                                            hidePeca();
                                                            
                                                            if($('#dp').val() == ""){
                                                                $('#dp').val(peca.produto_id+"☺"+peca.produto_preco_custo);
                                                            }else{
                                                                $('#dp').val("☻"+peca.produto_id+"☺"+peca.produto_preco_custo);
                                                            }
                                                        }else{
                                                            alert("Erro no banco");
                                                        }
                                                    },
                                                });
                                                
                                            }else{
                                                alert('Por favor informe um preço de venda válido!');
                                            }
                                        }else{
                                            alert('Por favor informe um preço de custo válido!');
                                        }
                                    }else{
                                        alert('Por favor selecione um fornecedor válido!');
                                    }
                                }else{
                                    alert('Por favor insira um fabricante válido!');
                                }
                            }else{
                                alert('Por favor insira um modelo válido!');
                            }
                        }else{
                            alert('Por favor insira um código válido!');
                        }
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                }
            </script>
            
            <script>
                function dynamicServ(){
                    $('#novoServ').modal('show');
                    $('#notaModal').modal('hide');
                }
                
                function hideServ(){
                    $('#serv_nome').val('');
                    $('#serv_valor').unmask().val('').mask("#.##0,0000", {reverse: true});
                    
                    $('#novoServ').modal('hide');
                    $('#notaModal').modal('show');
                }
                
                function novoServ(){
                    if($('#serv_nome').val() != "" && $('#serv_nome').val() != " "){
                        if($('#serv_valor').val() != "" && $('#serv_valor').val() != " "){
                            dados = new FormData();
                            dados.append('nome', $('#serv_nome').val());
                            dados.append('valor', $('#serv_valor').val());
                            $.ajax({
                                url: '<?php echo base_url('financeiro/servicoDinamico'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                error: function(xhr, status, error) {
                                    alert('novoServ(): Erro, verifique o console');
                                    console.log('novoServ(): '+xhr.responseText);
                                },
                                success: function(data) {
                                    if(data != "null" && data != "" && data != " " && data != null){
                                        serv = jQuery.parseJSON(data);
                                        var opt = "<option value='"+serv.servico_id+"'>"+serv.servico_nome+"</option>";
                                        $('#nav-itens2').find('select').each(function(){
                                            $(this).append(opt);
                                        });
                                        hideServ();
                                        
                                        if($('#ds').val() == ""){
                                            $('#ds').val(serv.servico_id+"☺"+serv.servico_custo);
                                        }else{
                                            $('#ds').val("☻"+serv.servico_id+"☺"+serv.servico_custo);
                                        }
                                    }else{
                                        alert("Erro no banco");
                                    }
                                },
                            });
                        }else{
                            alert('Por favor insira um valor válido!');
                        }
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                }
            </script>
            