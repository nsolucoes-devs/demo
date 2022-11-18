            <style>
                .tableFixHead2          { overflow-y: auto; height: 600px; padding-left: 15px; }
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
                    border-radius: 5px;
                    background-color: white;
                }
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
                }
                .inline{
                    display: inline;
                }    
                label{
                    font-size: 15px;
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
                #myTableList .trigger_hidden:hover{
                    background-color: #F2F2F2;
                }
                #myTableList .hidden_row { 
                    display: none;
                    background-color: #eee; 
                }
                .outside-btn{
                    width: 21px;
                    height: 21px;
                    border-radius: 50%;
                    text-align: center;
                    border: 1px solid black;
                    position: relative;
                    margin: auto;
                }
                .btn-expand{
                    width: 19px;
                    height: 19px;
                    border-radius: 50%;
                    text-align: center;
                    border: 2px solid white;
                    background-color: #00bd1f;
                    padding: 0px;
                    position: absolute;
                    top: 0;
                    left: 0;
                }
                .btn-expand em{
                    color: white;
                    font-size: 12px;
                    position: absolute;
                    top: 2px;
                    left: 2px;
                    text-shadow: 1px 0 0 grey, -1px 0 0 grey, 0 1px 0 grey, 0 -1px 0 grey, 1px 1px grey, -1px -1px 0 grey, 1px -1px 0 grey, -1px 1px 0 grey;
                }
                .btn-expand:focus{
                    outline: none;
                }
                .inside-table tr{
                    font-size: 11px;
                }
                .inside-table tr:hover{
                    background-color: #eee!important;
                }
                .inside-table td{
                    border: 0;
                }
                .inside-table th{
                    border: 0;
                    border-bottom: 0px!important;
                }
                .sep-tr{
                    border-top: 2px solid lightgrey;
                }
                .title-inside{
                    font-weight: bold;
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
                .select2{
                    width: 100%!important;
                }
            </style>

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        
                        <?php if($edita != null){ ?>
                        <form method="post" action="<?php echo base_url('atualizanota') ?>">
                            <input type="hidden" name="hidden_id" value="<?php echo $nota['notafiscal_id'] ?>">
                        <?php } ?>
                        
                        <div class="row">
                            <div class="col-md-9 form-group">
                                <h2>Movimento N° <?php echo sprintf("%'03d", $nota['notafiscal_id']); ?></h2>
                            </div>
                            <div class="col-md-3 form-group text-right">
                                <?php if($nota['notafiscal_cliente'] == 1) { ?>
                                    <a class="btn btn-primary" href="<?php echo base_url('financeiro/notasfiscais') ?>"><em class="fa fa-angle-left"></em>&nbsp;Voltar</a>
                                <?php } else { ?>
                                    <a class="btn btn-primary" href="<?php echo base_url('movimentosestoque') ?>"><em class="fa fa-angle-left"></em>&nbsp;Voltar</a>
                                <?php } ?>
                                <?php if($edita == null){ ?>
                                &nbsp;&nbsp;
                                <a class="btn btn-primary" href="<?php echo base_url('relatorios/pdfnota/').$nota['notafiscal_id'] ?>" target="_blank"><em class="fa fa-file-o"></em>&nbsp;&nbsp;PDF</a>
                                <?php } ?>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label>Número do Documento</label><br>
                                <input type="text" class="form-control" id="docs" name="docs" value="<?php echo $nota['notafiscal_numero'] ?>" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Série do Documento</label><br>
                                <input type="text" class="form-control" id="serie" name="serie" value="<?php echo $nota['notafiscal_serie'] ?>" readonly>
                            </div>
                            <div class="col-md-5 form-group">
                                <label>Tipo da Operação</label><br>
                                <select class="s-select2" id="operacao" name="operacao" disabled>
                                    <?php foreach($tipos as $tp){
                                        $s = "";
                                        if($tp['tm_id'] == $nota['notafiscal_operacao']['tm_id']){$s = "selected";}
                                        echo "<option value='".$tp['tm_id']."' ".$s.">".$tp['tm_nome']."</option>";
                                    } ?>
                                </select>
                            </div>
                            <div class="col-md-1 form-group">
                                <label>&nbsp</label><br>
                                <button type="button" class="btn btn-danger" onclick="release()"><em class="fa fa-lock"></em></button>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label>Espécie do Documento</label><br>
                                <?php if($edita != null){ ?>
                                <select  style="width: 100%!important" class="select2-search editable" name="especie" id="especie">
                                    <option value="NOTA FISCAL" <?php if($nota['notafiscal_especie'] == "NOTA FISCAL"){echo "selected";} ?>>NOTA FISCAL</option>
                                    <option value="NOTA DE SERVIÇO" <?php if($nota['notafiscal_especie'] == "NOTA DE SERVIÇO"){echo "selected";} ?>>NOTA DE SERVIÇO</option>
                                    <option value="CUPOM FISCAL" <?php if($nota['notafiscal_especie'] == "CUPOM FISCAL"){echo "selected";} ?>>CUPOM FISCAL</option>
                                    <option value="RECIBO" <?php if($nota['notafiscal_especie'] == "RECIBO"){echo "selected";} ?>>RECIBO</option>
                                </select>
                                <?php }else{ ?>
                                <input type="text" class="form-control" value="<?php echo $nota['notafiscal_especie'] ?>" readonly>
                                <?php } ?>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Data de Emissão</label><br>
                                <input type="date" class="form-control editable" value="<?php echo $nota['notafiscal_dtemissao'] ?>" readonly name="dt_emissao" id="dtemissao">
                            </div>
                            <div class="col-md-5 form-group">
                                <?php if($nota['notafiscal_cliente'] == 1){ ?>
                                    <label>Cliente</label><br>
                                    <input type="text" class="form-control" value="<?php echo $nota['notafiscal_fornecedor']['cliente_nome'] ?>" readonly>
                                <?php } else { ?>
                                    <label>Fornecedor</label><br>
                                    <input type="text" class="form-control" value="<?php echo $nota['notafiscal_fornecedor']['fornecedor_nome'] ?>" readonly>
                                <?php } ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-5 form-group">
                                <label>Transportadora</label><br>
                                <input type="text" class="form-control editable" value="<?php echo $nota['notafiscal_nometrans'] ?>" readonly name="transp" id="transp">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>CNPJ</label><br>
                                <input type="text" class="form-control editable cnpj" value="<?php echo $nota['notafiscal_cnpjtrans'] ?>" readonly name="transp_cnpj" id="transp_cnpj">
                            </div>
                            <div class="col-md-3 form-group">
                                <label>Placa do Veículo</label><br>
                                <input type="text" class="form-control editable" value="<?php echo $nota['notafiscal_placaveic'] ?>" readonly name="placa" id="placa">
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row">
                            
                            <div class="col-md-2 form-group">
                                <label>Valor ICMS</label><br>
                                <input type="text" class="form-control editable valor" value="R$ <?php echo number_format($nota['notafiscal_valoricms'], 4, ',', '.') ?>" readonly name="icms" id="icms">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Valor ICMS</label><br>
                                <input type="text" class="form-control editable valor" value="R$ <?php echo number_format($nota['notafiscal_valoricms'], 4, ',', '.') ?>" readonly name="icms" id="icms">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Valor IPI</label><br>
                                <input type="text" class="form-control editable valor" value="R$ <?php echo number_format($nota['notafiscal_valoripi'], 4, ',', '.') ?>" readonly name="ipi" id="ipi">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Base ICMS Sub</label><br>
                                <input type="text" class="form-control editable valor" value="R$ <?php echo number_format($nota['notafiscal_bcicmssub'], 4, ',', '.') ?>" readonly name="bc_icms_sub" id="bc_icms_sub">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Valor ICMS Sub</label><br>
                                <input type="text" class="form-control editable valor" value="R$ <?php echo number_format($nota['notafiscal_valoricmssub'], 4, ',', '.') ?>" readonly name="icms_sub" id="icms_sub">
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-2 form-group">
                                <label>Valor Frete</label><br>
                                <input type="text" class="form-control editable valor" value="R$ <?php echo number_format($nota['notafiscal_vlrfrete'], 4, ',', '.') ?>" readonly name="frete" id="frete">
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Valor Final</label><br>
                                <input type="text" class="form-control" id="nota_final" value="R$ <?php echo number_format($nota['notafiscal_valorfinal'], 4, ',', '.') ?>" readonly>
                            </div>
                        </div>

                        <hr>
                        
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Lista de Produtos:</label>
                                <?php if($edita != null){ 
                                if(count($estoques) > 0){ ?>
                                <a style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addItem">Adicionar Produto</a>
                                <?php }else if(count($servicos) > 0){ ?>
                                <a style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addServ">Adicionar Serviço</a>
                                <?php } } ?>
                                <br><br>
                                <div class="tableFixHead">
                                    <table id="myTableList" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <?php if(count($estoques) > 0){ ?>
                                                <th style="width: 10%"></th>
                                                <th style="width: 9%">Data</th>
                                                <th style="width: 8%">Qtd</th>
                                                <th style="width: 73%">Produto</th>
                                                <?php } 
                                                if(count($servicos) > 0){ ?>
                                                <th style="width: 7%"></th>
                                                <th style="width: 61%">Serviço</th>
                                                <th style="width: 13%">Unitário</th>
                                                <th style="width: 6%">Qtd</th>
                                                <th style="width: 13%">Total</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody id="list_prod">
                                            <?php $i = 0; foreach($estoques as $est){ ?>
                                            <tr class="trigger_hidden">
                                                <td class="text-center">
                                                    
                                                    <div class="row">
                                                        <div class="col-md-4" style="padding-right: 0">
                                                            <div class="outside-btn">
                                                                <button id="btn<?php echo $i ?>" type="button" class="btn-expand" onclick="showHideRow('hidden_row<?php echo $i ?>');"><em class="fa fa-plus"></em></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="padding-left: 0; padding-right: 0">
                                                            <div class="outside-btn">
                                                                <button id="edit<?php echo $i ?>" type="button" class="btn-expand" style="background-color: blue" onclick="allowEdit(<?php echo $i ?>);" data-id="<?php echo $est['estoque_id'] ?>"><em style="left: 3px; top: 3px; font-size: 9px" class="fa fa-pen"></em></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4" style="padding-left: 0px;">
                                                            <div class="outside-btn">
                                                                <button type="button" class="btn-expand" style="background-color: red" onclick="setaExc(<?php echo $est['estoque_id'] ?>)"><em style="left: 3px" class="fa fa-times"></em></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                                <td><?php echo date('d/m/Y', strtotime($est['estoque_data_insert'])) ?></td>
                                                <td id="td_qtd<?php echo $i ?>"><?php echo $est['estoque_quantidade'] ?></td>
                                                <td><?php echo $est['estoque_produto']['produto_nome']." | ".$est['estoque_produto']['produto_modelo'] ?></td>
                                            </tr>
                                            <tr id="hidden_row<?php echo $i ?>" class="hidden_row">
                                                <td colspan=4> 
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            
                                                            <div class="col-md-3 form-group">
                                                                <label>Código da Peça</label><br>
                                                                <input type="text" class="form-control" value="<?php echo $est['estoque_produto']['produto_codigo'] ?>" readonly>
                                                            </div>
                                                            <div class="col-md-5 form-group">
                                                                <label>Nome da Peça</label><br>
                                                                <input type="text" class="form-control" value="<?php echo $est['estoque_produto']['produto_nome'] ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label>Modelo da Peça</label><br>
                                                                <input type="text" class="form-control" value="<?php echo $est['estoque_produto']['produto_modelo'] ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="col-md-6 form-group">
                                                                <label>Fabricante</label><br>
                                                                <input type="text" class="form-control" value="<?php echo $est['estoque_produto']['produto_fabricante'] ?>" readonly>
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <?php if($nota['notafiscal_cliente'] == 1){ ?>
                                                                    <label>Cliente</label><br>
                                                                <?php } else { ?>
                                                                    <label>Fornecedor</label><br>
                                                                <?php } ?>
                                                                <input type="text" class="form-control" value="<?php echo $est['estoque_produto']['produto_fornecedor']['fornecedor_nome'] ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="col-md-3 form-group">
                                                                <label>Valor da Peça</label><br>
                                                                <input type="text" class="form-control" value="R$ <?php echo number_format($est['estoque_produto']['produto_preco_custo'], 4, ',', '.') ?>" readonly>
                                                            </div>
                                                            <div class="col-md-3 form-group">
                                                                <label>Valor no Movimento</label><br>
                                                                <input type="text" class="form-control allow_<?php echo $i ?>" id="vlr_<?php echo $i ?>" placeholder="0,00" value="R$ <?php echo number_format($est['estoque_produto']['produto_preco_custo'], 4, ',', '.') ?>" readonly>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <label>Qtd</label><br>
                                                                <input type="text" class="form-control num allow_<?php echo $i ?>" id="qtd_<?php echo $i ?>" placeholder="0" value="<?php echo $est['estoque_quantidade'] ?>" readonly>
                                                            </div>
                                                            <div class="col-md-4 form-group">
                                                                <label>Valor Total na Nota</label><br>
                                                                <?php $res = (float) $est['estoque_valor'] * (int) $est['estoque_quantidade']; ?>
                                                                <input type="text" class="form-control" id="total_<?php echo $i ?>" value="<?php echo number_format($res, 4, ',', '.') ?>" readonly>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; } ?>
                                            
                                            <?php foreach($servicos as $serv){ ?>
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-6" style="padding-right: 0">
                                                            <div class="outside-btn">
                                                                <button type="button" class="btn-expand" style="background-color: blue" onclick="abreModalEdita(<?php echo $serv['ns_id'] ?>)"><em style="left: 3px; top: 3px; font-size: 9px" class="fa fa-pen"></em></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" style="padding-left: 0px;">
                                                            <div class="outside-btn">
                                                                <button type="button" class="btn-expand" style="background-color: red" onclick="deletaNS(<?php echo $serv['ns_id'] ?>)"><em style="left: 3px" class="fa fa-times"></em></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?php echo $serv['ns_servico']['servico_nome'] ?></td>
                                                <td>R$ <?php echo $serv['ns_uni'] ?></td>
                                                <td><?php echo $serv['ns_qtd'] ?></td>
                                                <td>R$ <?php echo $serv['total'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <?php if($edita != null){ ?>
                        <div class="row">
                            <div class="col-md-12 form-group text-center">
                                <button type="submit" class="btn btn-primary">Concluir Edição</button>
                            </div>
                        </div>

                        </form>
                        <?php } ?>
                        
                        <br><br>
                        
                    </div>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <div class="modal fade" id="releaseModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Deseja realmente editar o Tipo da Operação?</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideExc()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="hideExc()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha" style="display: none">
                                <div class="col-md-12 text-center">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="passwordVerify" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white" onclick="verifypassword()">Confirmar</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="excEst" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Excluir Item</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideExc()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <h4>Deseja realmente excluir o item do movimento?</h4>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senhamov()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" onclick="hideExc()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha2" style="display: none">
                                <div class="col-md-12 text-center">
                                    <form action="<?php if($edita == null){echo base_url('estoque/deletaItem');}else{echo base_url('estoque/deletaItemEdicao');} ?>" method="post">
                                        <input type="hidden" name="id_excluir" id="id_excluir">
                                        <input type="hidden" name="anchor_id" value="<?php echo $nota['notafiscal_id'] ?>">
                                        
                                        <input type="hidden" name="exc_folhas" id="exc_folhas">
                                        <input type="hidden" name="exc_especie" id="exc_especie">
                                        <input type="hidden" name="exc_dtemissao" id="exc_dtemissao">
                                        <input type="hidden" name="exc_dtsaida" id="exc_dtsaida">
                                        <input type="hidden" name="exc_hrsaida" id="exc_hrsaida">
                                        <input type="hidden" name="exc_transp" id="exc_transp">
                                        <input type="hidden" name="exc_transp_cnpj" id="exc_transp_cnpj">
                                        <input type="hidden" name="exc_placa" id="exc_placa">
                                        <input type="hidden" name="exc_frete" id="exc_frete">
                                        <input type="hidden" name="exc_icms" id="exc_icms">
                                        <input type="hidden" name="exc_ipi" id="exc_ipi">
                                        <input type="hidden" name="exc_bc_icms_sub" id="exc_bc_icms_sub">
                                        <input type="hidden" name="exc_icms_sub" id="exc_icms_sub">
                                        
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
            
            <div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Item</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideItem()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Produto</label><br>
                                    <select  style="width: 100%!important" class="select2-search" id="produto" onchange="buscaPreco($(this).val())">
                                        <option value="--" disabled selected>-- Selecione um Produto --</option>
                                        <?php foreach($produtos as $prod){
                                            echo "<option value='".$prod['produto_id']."'>".$prod['produto_nome']." | ".$prod['produto_modelo']."</option>";
                                        } ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Quantidade</label><br>
                                    <input type="text" class="form-control num" id="qtd_prod" placeholder="0">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Valor Unitário</label><br>
                                    <input type="text" class="form-control valor" id="vlr_prod" placeholder="0,00">
                                </div>
                            </div>
                            
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hideItem()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendAdd()">Adicionar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="addServ" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Adicionar Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideServ()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('estoque/addNotaServ') ?>">
                            <input type="hidden" name="id" value="<?php if($edita != null){ echo $nota['notafiscal_id']; } ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Serviço</label><br>
                                        <select style="width: 100%!important" class="add-select2" id="add_servico" name="servico" onchange="buscaPrecoServ($(this).val())">
                                            <option value="--" disabled selected>-- Selecione um Serviço --</option>
                                            <?php foreach($base_servicos as $bs){
                                                echo "<option value='".$bs['servico_id']."'>".$bs['servico_nome']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Quantidade</label><br>
                                        <input type="text" class="form-control num" id="add_qtd" name="qtd" placeholder="0">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Valor Unitário</label><br>
                                        <input type="text" class="form-control valor" id="add_valor" name="valor" placeholder="0,00">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-left" onclick="hideServ()">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="editItem" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Editar Item</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <form method="post" action="<?php echo base_url('estoque/editNotaServ') ?>">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="callback" value="<?php if($edita == null){echo "mostrarnota";}else{echo "editarnota";} ?>">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label>Serviços</label>
                                        <select class="edit-select2" name="servico" id="edit_servico" required onchange="pegaValor($(this).val())">
                                            <?php foreach($base_servicos as $bs){
                                                echo "<option value='".$bs['servico_id']."'>".$bs['servico_nome']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    
                                    <input type="hidden" id="aux">
                                    
                                    <div class="col-md-4 form-group">
                                        <label>Quantidade</label>
                                        <input type="text" class="form-control num" name="qtd" id="edit_qtd" required>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label>Valor Unitário</label>
                                        <input type="text" class="form-control valor" name="valor" id="edit_valor" required>
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
            
            <div class="modal fade" id="deletaNSModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="justify-content: unset; text-align: left">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Deseja realmente deletar este serviço?</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-primary" style="position: absolute; top: 15px; left: 15px; color: white; float: left" onclick="senha_ns()">Sim</button>
                            <button class="btn btn-danger" data-dismiss="modal" data-dismiss="modal" onclick="reseta_delete()">Não</button>
                            <br><br>
                            <div class="row row-c" id="formsenha_ns" style="display: none">
                                <form method="post" action="<?php echo base_url('estoque/deletaNotaServico') ?>">
                                    <input type="hidden" name="callback" value="<?php if($edita == null){echo "mostrarnota";}else{echo "editarnota";} ?>">
                                    <input type="hidden" name="id" id="id_ns">
                                    <div class="col-md-12 text-center">
                                        <label style="font-size: 16px">Confirme a senha</label><br>
                                        <input class="form-control passwd" type="password" name="senha" id="senha_ns" placeholder="Digite a Senha" required>
                                        <button type="button" class="btn btn-primary see-pass" id="senha_btn_ns"><em class="fa fa-eye"></em></button>
                                        <br><br>
                                        <button type="submit" class="btn btn-primary" style="color: white">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            <script src="<?php echo base_url('resources/md5js/js/md5.min.js');?>"></script>
            <script>
                function release(){
                    $('#releaseModal').modal('show');
                }
                
                function verifypassword(){
                    var aux = md5(document.getElementById("passwordVerify").value);
                    var pass = "<?php echo $this->session->userdata('senha');?>";
                    
                    if(aux == pass){
                        document.getElementById('operacao').removeAttribute('disabled');
                        $('#releaseModal').modal('hide');
                    }else{
                        alert("Senha incorreta!")
                    }
                };
            </script>
            
            <script>
                $(document).ready(function(){
                    $('.num').mask('0#');
                    
                    $('.s-select2').select2({theme: "bootstrap"});
                    $('.edit-select2').select2({theme: "bootstrap", dropdownParent: $('#editItem')});
                    $('.select2-search').select2({theme: "bootstrap", dropdownParent: $('#addItem')});
                    $('.add-select2').select2({theme: "bootstrap", dropdownParent: $('#addServ')});
                    
                    <?php if($edita != null){ ?>
                    $('.editable').prop('readonly', false);
                    $('.valor').mask("#.##0,00", {reverse: true});
                    $('.hora').mask("00:00:00");
                    $('.cnpj').mask("00.000.000/0000-00");
                    <?php } ?>
                    
                    <?php if($erro == 1){ ?>
                    Swal.fire(
                        '',
                        'Item excluído com sucesso!',
                        'success'
                    )
                    <?php }else if($erro == 2){ ?>
                    Swal.fire(
                        'Erro',
                        'Não foi possivel excluir o item pois a senha inserida estava incorreta!',
                        'error'
                    )
                    <?php }?>
                });
            </script>
            
            <script>
                function showHideRow(row) { 
                    $("#" + row).toggle();
                    var id = row.substr(10);
                    if($("#"+row).css('display') == 'none'){
                        $('#btn'+id).css('background-color', '#00bd1f');
                        $('#btn'+id).find('em').last().removeClass('fa-minus').addClass('fa-plus');
                    }else{
                        $('#btn'+id).css('background-color', 'red');
                        $('#btn'+id).find('em').last().removeClass('fa-plus').addClass('fa-minus');
                    }
                } 
            </script>
            
            <script>
                <?php if(count($servicos) > 0){ ?>
                function abreModalEdita(id){
                    var servs = <?php echo json_encode($servicos) ?>;
                    for(var i = 0; i < servs.length; i++){
                        if(servs[i].ns_id == id){
                            $('#aux').val('0');
                            $('#id').val(id);
                            $('#edit_servico').val(servs[i].ns_servico_id).change();
                            $('#edit_qtd').unmask().val(servs[i].ns_qtd).mask('0#');
                            $('#edit_valor').unmask().val(servs[i].ns_preco).mask("#.##0,00", {reverse: true});
                            $('#editItem').modal('show');
                        }
                    }
                }
                
                function pegaValor(id){
                    if($('#aux').val() != '0'){
                        var servs = <?php echo json_encode($base_servicos) ?>;
                        for(var i = 0; i < servs.length; i++){
                            if(servs[i].servico_id == id){
                                $('#edit_valor').unmask().val(servs[i].servico_custo).mask("#.##0,00", {reverse: true});
                            }
                        }
                    }else{
                        $('#aux').val('1');
                    }
                }
                
                function buscaPrecoServ(id){
                    var servs = <?php echo json_encode($base_servicos) ?>;
                    for(var i = 0; i < servs.length; i++){
                        if(servs[i].servico_id == id){
                            $('#add_valor').unmask().val(servs[i].servico_custo).mask("#.##0,00", {reverse: true});
                        }
                    }
                }
                
                function deletaNS(id){
                    $('#id_ns').val(id);
                    $('#deletaNSModal').modal('show');
                }
                
                function senha_ns(){
                    $('#formsenha_ns').css('display', 'block');
                }
                
                $('#senha_btn_ns').on('click', function(){
                    const type = $('#senha_ns').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha_ns').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn_ns').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn_ns').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
                
                function reseta_delete(){
                    $('#formsenha_ns').css('display', 'none');
                    $('#senha_ns').prop('type', 'password').val('');
                    $('#senha_btn_ns').children().removeClass("fa-eye-slash").addClass("fa-eye");
                }
                
                function hideServ(){
                    $('#add_servico').val('').change();
                    $('#add_qtd').unmask().val('').mask('0#');
                    $('#add_valor').unmask().val('').mask("#.##0,00", {reverse: true});
                    $('#addServ').modal('hide');
                }
                <?php } ?>
            
                function allowEdit(i){
                    if($('#vlr_'+i).prop('readonly') == true){
                        $('#edit'+i).css('background-color', '#00bd1f');
                        $('#edit'+i).find('em').last().removeClass('fa-pen').addClass('fa-check');
                        
                        var anchor_vlr = $('#vlr_'+i).val().substr(3);
                        $('#vlr_'+i).val(anchor_vlr).mask("#.##0,00", {reverse: true});
                        $('#vlr_'+i).prop('readonly', false);
                        $('#qtd_'+i).prop('readonly', false);
                    }else{
                        if($('#qtd_'+i).val() != "0" && $('#qtd_'+i).val() != "" && $('#qtd_'+i).val() != 0){
                            if($('#vlr_'+i).val() != "" && $('#vlr_'+i).val() != " "){
                                $('#edit'+i).css('background-color', 'blue');
                                $('#edit'+i).find('em').last().removeClass('fa-check').addClass('fa-pen');
                            
                                sendEdit(i);

                                $('#td_qtd'+i).html($('#qtd_'+i).val());
                                var anchor_vlr = $('#vlr_'+i).val();
                                $('#vlr_'+i).unmask().val('R$ '+anchor_vlr);
                                $('#vlr_'+i).prop('readonly', true);
                                $('#qtd_'+i).prop('readonly', true);
                            }else{
                                alert('Por favor informa um valor válido!');
                            }
                        }else{
                            alert('Por favor insira uma quantidade acima de 0!');
                        }
                    }
                }
                
                function sendEdit(i){
                    dados = new FormData();
                    dados.append('id', $('#edit'+i).data('id'));
                    dados.append('vlr', $('#vlr_'+i).val());
                    dados.append('qtd', $('#qtd_'+i).val());
                    $.ajax({
                        url: '<?php echo base_url('estoque/atualizaEstoque'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('sendEdit(i): Erro, por favor verifique o console.');
                            console.log('sendEdit(i): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data != "null" && data != "" && data != " " && data != null){
                                res = jQuery.parseJSON(data);
                                $('#nota_final').val(res.total_nota);
                                $('#total_'+i).val(res.total);
                            }else{
                                alert("Erro no banco");
                            }
                        },
                    });
                }
            </script>
            
            <script>
                function setaExc(id){
                    $('#id_excluir').val(id);
                    $('#excEst').modal('show');
                    
                    <?php if($edita != null){ ?>
                     $('#exc_folhas').val($('#folhas').val());
                     $('#exc_especie').val($('#especie').val());
                     $('#exc_dtemissao').val($('#dtemissao').val());
                     $('#exc_dtsaida').val($('#dtsaida').val());
                     $('#exc_hrsaida').val($('#hrsaida').val());
                     $('#exc_transp').val($('#transp').val());
                     $('#exc_transp_cnpj').val($('#transp_cnpj').val());
                     $('#exc_placa').val($('#placa').val());
                     $('#exc_frete').val($('#frete').val());
                     $('#exc_icms').val($('#icms').val());
                     $('#exc_ipi').val($('#ipi').val());
                     $('#exc_bc_icms_sub').val($('#bc_icms_sub').val());
                     $('#exc_icms_sub').val($('#icms_sub').val());
                    <?php } ?>
                }
                
                function senha(){
                    $('#formsenha').css('display', 'block');
                }
                
                function senhamov(){
                    $('#formsenha2').css('display', 'block');
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
                
                function hideExc(){
                    $('#senha').val('');
                    $('#senha').prop('type', 'password');
                    $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    $('#formsenha').css('display', 'none');
                    $('#excEst').modal('hide');
                }
                
                $('#excEst').on('hidden.bs.modal', function () {
                    hideExc();
                });
            </script>
            
            <script>
                function hideItem(){
                    $('#produto').val('--').change();
                    $('#qtd_prod').unmask().val('').mask('0#');
                    $('#vlr_prod').unmask().val('').mask("#.##0,00", {reverse: true});
                    
                    $('#addItem').modal('hide');
                }
            
                $('#addItem').on('hidden.bs.modal', function(){
                    hideItem();
                });
            
                function buscaPreco(val){
                    var prods = <?php echo json_encode($produtos); ?>;
                    
                    for(var i = 0; i < prods.length; i++){
                        if(val == prods[i].produto_id){
                            $('#vlr_prod').unmask().val(prods[i].produto_preco_custo).mask("#.##0,00", {reverse: true});
                        }
                    }
                }
                
                function sendAdd(){
                    if($('#produto').val() != "--" && $('#produto').val() != ""){
                        if($('#qtd_prod').val() != "" && $('#qtd_prod').val() != 0){
                            if($('#vlr_prod').val() != ""){
                                
                                var pos = $('#list_prod').find('tr').last().prop('id').substr(10);
                                
                                dados = new FormData();
                                dados.append('id', $('#produto').val());
                                dados.append('vlr', $('#vlr_prod').val());
                                dados.append('qtd', $('#qtd_prod').val());
                                dados.append('anchor', <?php echo $nota['notafiscal_id'] ?>);
                                dados.append('pos', pos);
                                $.ajax({
                                    url: '<?php echo base_url('estoque/newItem'); ?>',
                                    method: 'post',
                                    data: dados,
                                    processData: false,
                                    contentType: false,
                                    error: function(xhr, status, error) {
                                        alert('sendAdd(): Erro, por favor verifique o console.');
                                        console.log('sendAdd(): '+xhr.responseText);
                                    },
                                    success: function(data) {
                                        if(data != "null" && data != "" && data != " " && data != null){
                                            var arr = jQuery.parseJSON(data);
                                            
                                            $('#nota_final').val(arr.total);
                                            $('#list_prod').append(arr.table);
                                            hideItem();
                                        }else{
                                            alert("Erro no banco");
                                        }
                                    },
                                });
                                
                            }else{
                                alert('Por favor insira um valor válido!');
                            }
                        }else{
                            alert('Por favor insira uma quantidade válida e/ou acima de 0!');
                        }
                    }else{
                        alert('Por favor selecione um produto primeiro!');
                    }
                }
            </script>
            