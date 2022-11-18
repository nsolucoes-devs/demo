
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Nota Fiscal</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Inserção de Itens da Nota</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					    <form role="form" method="post" action="<?php echo base_url('notafiscal/insereItem') ?>">
					        <input type="hidden" name="nf_id" id="nf_id" value="<?php echo $id ?>">
        				    <h4>Insira os Dados do Item</h4>
        				    <div class="form-group">
        					    <div class="row">
        					        <div class="col-md-6">
                                        <label>Código do Produto: </label>
                                        <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="produto_id" name="produto_id" required>
                                            <option value='' selected disabled hidden>Selecione o Produto</option>
                                            <?php foreach($produtos as $row2) {
                                                foreach($estoque as $row){
                                                    if($row['produto_id'] == $row2['id_produto']){
                                                        foreach($cores as $cor){
                                                            if($cor['id_cor'] == $row['cor_produto']){
                                                                echo "<option ";
                                                                echo " value='" . $row['id_estoque'] . "' > " . $row2['nome_produto'] . ' | ' . $row['modelo_produto'] . ' | ' . $cor['nome_cor'] . "</option>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
        					    <div class="row">
        					        <div class="col-md-6">
                                        <label>Unidade de Medida: </label>
                                        <input class="form-control" type="text" name="unidade" id="unidade" required>
                                    </div>
        					        <div class="col-md-6">
                                        <label>Quantidade Total de Itens: </label>
                                        <input class="form-control" type="number" name="quantidade" id="quantidade" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
        					    <div class="row">
        					        <div class="col-md-6">
                                        <label>Preço por Unidade: </label>
                                        <input class="form-control mascara" type="text" name="preco_unidade" id="preco_unidade" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Base de Cálculo ICMS: </label>
                                        <input class="form-control mascara" type="text" name="bc_icms" id="bc_icms" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
        					    <div class="row">
        					        <div class="col-md-6">
                                        <label>Valor ICMS: </label>
                                        <input class="form-control mascara" type="text" name="valor_icms" id="valor_icms" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Valor IPI: </label>
                                        <input class="form-control mascara" type="text" name="valor_ipi" id="valor_ipi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Preço Total: </label>
                                        <input class="form-control mascara" type="text" name="preco_total" id="preco_total" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
        					    <div class="row">
        					        <div id="erro" class="col-md-12 alert alert-danger" style="display: none;">
        					            Por favor, preencha todos os campos!
        					        </div>
        					    </div>
                            </div>
                            <div class="form-group text-center" style="margin-top: 30px;">
        					    <button type="submit" class="btn btn-primary">Inserir</button>&nbsp&nbsp&nbsp
        					    <a class="btn btn-primary" href="<?php echo base_url('notafiscal/telaCadastro/' . $id) ?>">Voltar</a>
        					</div>
        				</form>
                    </div>
                </div>
			</div><!-- /.col-->
		</div><!-- /.row-->

