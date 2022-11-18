<style>
    .tableFixHead          { overflow-y: auto; height: 300px; }
    .tableFixHead thead th { position: sticky; top: 0; }
    
    /* Just common table stuff. Really. */
    table  { border-collapse: collapse; width: 100%; }
    th, td { padding: 8px 16px; }
    th     { background:#eee; }
</style>

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
				<h1 class="page-header">Cadastro de Nota Fiscal</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
			    <form role="form" method="post" action="<?php 
			        if(!isset($nota)){
			            echo base_url("notafiscal/controlaCadastro");
			        }else{
			            echo base_url("notafiscal/controlaAtualizacao");
			        }
			    ?>">
			        <?php if($erro == 1){
			            ?><?php
			        } ?>
			        <?php if($erro == 2){
			            ?><div class="alert alert-danger">Não foi possível inserir! Por favor, insira um CPF válido para o Transportador!</div><?php
			        } ?>
    				<div class="panel panel-default">
    					<div class="panel-body">
    					    <?php if(isset($nota)){
    					        echo "<input type='hidden' class='form-control' id='id' name='id' value=". $nota['id_nf'] .">";
    					    } ?>
						    <h4>Dados da Nota Fiscal</h4>
                            <div class="form-group">
							    <div class="row">
							        <div class="col-md-12">
							            <label>Natureza da Operação: </label>
								        <input class="form-control" type="text" placeholder="Natureza" id="nome" name="nome" 
								        value="<?php if(isset($nota)){echo $nota['nome_nf'];} ?>" required>
								    </div>
							    </div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Fornecedor: </label>
								        <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="fornecedor" name="fornecedor" required>
                                            <option value='' selected disabled hidden>Selecione o Fornecedor</option>
                                            <?php foreach($fornecedores as $row) {
                                                    echo "<option ";
                                                    if(isset($nota) && $row['id_fornecedor'] == $nota['fornecedor_id']){echo "selected";}
                                                    echo " value='" . $row['id_fornecedor'] . "' > " . $row['nome_fornecedor'] . "</option>";
                                                }
                                            ?>
                                        </select>
							        </div>
							        <div class="col-md-6">
							            <label>Número: </label>
								        <input class="form-control" type="text" placeholder="Número" id="numero" name="numero"
								        value="<?php if(isset($nota)){echo $nota['numero_nf'];} ?>"required>
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Páginas: </label>
								        <input class="form-control" type="text" placeholder="Páginas" id="folhas" name="folhas"
								        value="<?php if(isset($nota)){echo $nota['folha_nf'];} ?>"required>
							        </div>
							        <div class="col-md-6">
							            <label>Série: </label>
								        <input class="form-control" type="text" placeholder="Série" id="serie" name="serie"
								        value="<?php if(isset($nota)){echo $nota['serie_nf'];} ?>"required>
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-4">
							            <label>Data de Emissão: </label>
								        <input class="form-control" type="date" id="data_emissao" name="data_emissao"
								        value="<?php if(isset($nota)){echo $nota['data_emissao'];} ?>" required>
							        </div>
							        <div class="col-md-4">
							            <label>Data de Saída: </label>
								        <input class="form-control" type="date" id="data_saida" name="data_saida"
								        value="<?php if(isset($nota)){echo $nota['data_saida'];} ?>" required>
							        </div>
							        <div class="col-md-4">
							            <label>Hora de Saída: </label>
								        <input class="form-control" data-mask="00:00" type="text" id="hora_saida" name="hora_saida" placeholder="Hora"
								        value="<?php if(isset($nota)){echo $nota['hora_saida'];} ?>"required>
							        </div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="panel panel-default">
    					<div class="panel-body">
    					    
    					    <h4>Dados do Destinatário</h4>
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Destinatário: </label>
								        <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="destinatario" name="destinatario" required>
                                            <option value='' selected disabled hidden>Selecione o Destinatário</option>
                                            <?php foreach($lojas as $row) {
                                                    echo "<option ";
                                                    if(isset($nota) && $row['id_loja'] == $nota['loja_id']){echo "selected";}
                                                    echo " value='" . $row['id_loja'] . "' > " . $row['nome_loja'] . "</option>";
                                                }
                                            ?>
                                        </select>
							        </div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="panel panel-default">
    					<div class="panel-body">
    					    
    					    <h4>Cálculo de Impostos</h4>
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-12">
							            <label>Tipo de Fatura: </label>
								        <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="tipo" name="tipo" required>
                                            <option value='' selected disabled hidden>Selecione o Tipo de Fatura</option>
                                            <?php foreach($tiposfatura as $row) {
                                                    echo "<option ";
                                                    if(isset($nota) && $row['id_fatura'] == $nota['tipo_fatura']){echo "selected";}
                                                    echo " value='" . $row['id_fatura'] . "' > " . $row['nome_fatura'] . "</option>";
                                                }
                                            ?>
                                        </select>
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-4">
							            <label>Base de Cálculo do ICMS: </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="bc_icms" name="bc_icms"
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['bc_icms']);} ?>">
							        </div>
							        <div class="col-md-4">
							            <label>Valor do ICMS: </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="valor_icms" name="valor_icms" 
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['valor_icms']);} ?>">
							        </div>
							        <div class="col-md-4">
							            <label>Base de Cálculo do ICMS Subst.: </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="bc_icms_sub" name="bc_icms_sub"
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['bc_icms_sub']);} ?>">
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-4">
							            <label>Valor do ICMS Subst.: </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="valor_icms_sub" name="valor_icms_sub"
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['valor_icms_sub']);} ?>">
							        </div>
							        <div class="col-md-4">
							            <label>Valor do IPI: </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="valor_ipi" name="valor_ipi" 
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['valor_total_ipi']);} ?>">
							        </div>
							        <div class="col-md-4">
							            <label>Valor do Frete (Campo não obrigatório): </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="valor_frete" name="valor_frete"
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['valor_frete']);} ?>">
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-4">
							            <label>Valor do Seguro (Campo não obrigatório): </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="valor_seg" name="valor_seg"
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['valor_seg']);} ?>">
							        </div>
							        <div class="col-md-4">
							            <label>Desconto (Campo não obrigatório): </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="desconto" name="desconto" 
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['desconto']);} ?>">
							        </div>
							        <div class="col-md-4">
							            <label>Outros Valores (Campo não obrigatório): </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="outros" name="outros"
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['outros']);} ?>">
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Valor Total dos Produtos: </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="valor_total_prod" name="valor_total_prod" 
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['valor_total_prod']);} ?>"required>
							        </div>
							        <div class="col-md-6">
							            <label>Valor Total da Nota: </label>
								        <input class="form-control mascara" type="text" placeholder="R$" id="valor_total" name="valor_total" 
								        value="<?php if(isset($nota)){echo str_replace('.', ',', $nota['valor_total_nota']);} ?>"required>
							        </div>
								</div>
							</div>
						
						</div>
					</div>
					<div class="panel panel-default">
    					<div class="panel-body">
    					    
    					    <h4>Transportador/Volumes Transportados</h4>
    					    <div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Nome: </label>
								        <input class="form-control" type="text" placeholder="Nome" id="nome_transp" name="nome_transp" 
								        value="<?php if(isset($nota)){echo $nota['nome_transp'];} ?>"required>
							        </div>
							        <div class="col-md-6">
							            <label>CPF Transportador: </label>
								        <input class="form-control" type="text" data-mask="000.000.000-00" placeholder="000.000.000-00" id="cpf_transp" name="cpf_transp" 
								        value="<?php if(isset($nota)){echo $nota['cpf_transp'];} ?>"required>
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Placa do Veículo: </label>
								        <input class="form-control" type="text" placeholder="Placa" id="placa_transp" name="placa_transp" 
								        value="<?php if(isset($nota)){echo $nota['placa_veic'];} ?>"required>
							        </div>
							        <div class="col-md-6">
							            <label>UF: </label>
								        <input class="form-control" type="text" placeholder="UF" id="uf_placa_transp" name="uf_placa_transp" 
								        value="<?php if(isset($nota)){echo $nota['uf_placa'];} ?>"required>
							        </div>
								</div>
							</div>
    					    
    					    <!-- row de estado/cidade -->
    					    <div class="form-group">
							    <div class="row">
            					    <div class="col-md-6">
        							    <label>Estado</label><br>
            			                <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="estado" name="estado" required
            			                onchange='test($(this).val())'>
                                            <option value='' selected disabled hidden>Selecione o Estado</option>
                                            <?php foreach($estados as $row) {
                                                    echo "<option ";
                                                    if(isset($nota) && $nota['estado_transp'] == $row['id_estado']){echo "selected";}
                                                    echo " value='" . $row['id_estado'] . "' > " . $row['nome_estado'] . " - " . $row['uf_estado'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <label style="padding-left: 16px">Cidade</label><br>
                                    <div class="col-md-6" style="display:<?php if(isset($nota)){echo 'block';}else{echo 'none';} ?>" id="divCid">
            			                <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="cidade" name="cidade" required>
            			                    <?php if(isset($nota)){
                                                foreach($cidades as $cid){
                                                    if($cid['estado_id'] == $nota['estado_transp']){
                                                        echo "<option ";
                                                        if($cid['id_cidade'] == $nota['cidade_transp']){echo 'selected ';}
                                                        echo "value='" . $cid['id_cidade'] . "'>" . $cid['nome_cidade'] . "</option>";
                                                    }
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
							</div>
                            
                            <div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Quantidade: </label>
								        <input class="form-control" type="text" placeholder="0" id="qtde_transp" name="qtde_transp" 
								        value="<?php if(isset($nota)){echo $nota['qtde_transp'];} ?>"required>
							        </div>
							        <div class="col-md-6">
							            <label>Espécie: </label>
								        <input class="form-control" type="text" placeholder="Ex.: Caixa" id="especie_transp" name="especie_transp" 
								        value="<?php if(isset($nota)){echo $nota['especie_transp'];} ?>"required>
							        </div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6">
							            <label>Peso Bruto: </label>
								        <input class="form-control mascarapeso" type="text" placeholder="0.0" id="pesobruto" name="pesobruto" 
								        value="<?php if(isset($nota)){echo $nota['peso_bruto'];} ?>"required>
							        </div>
							        <div class="col-md-6">
							            <label>Peso Líquido: </label>
								        <input class="form-control mascarapeso" type="text" placeholder="0.0" id="pesoliq" name="pesoliq" 
								        value="<?php if(isset($nota)){echo $nota['peso_liq'];} ?>"required>
							        </div>
								</div>
							</div>
                            
						</div>
					</div>
					<div class="panel panel-default">
    					<div class="panel-body">
    					    <h4>Itens da Nota Fiscal</h4>
    					    <button id="btn_item" name="btn_item" type="submit" style="margin-bottom: 30px;" value="1" class="btn btn-primary">
                            Adicionar Item &nbsp<em class="fa fa-plus"></em></button>
    					    <div class="tableFixHead">
					            <table id="myTable" class="table table-hover table-bordered">
            					    <thead>
            					        <tr>
            					            <th>Código</th>
            					            <th>Descrição</th>
            					            <th>Un.</th>
            					            <th>Qtde.</th>
            					            <th>Preço Un.</th>
            					            <th>Preço total</th>
            					            <th>BC ICMS</th>
            					            <th>Valor ICMS</th>
            					            <th>Valor IPI</th>
            					        </tr>
            					    </thead>
            					    <tbody id="itens">
            					        <?php echo $itens; ?>
            					    </tbody>
            					 </table>
					        </div>
					    </div>
					</div>
    				<div class="form-group text-center" style="margin-top: 30px;">
					    <button type="submit" class="btn btn-primary" id="cadastrar" value="1" name="cadastrar"><?php 
                        if(!isset($nota)){
			                echo "Cadastrar";
			            }else{
			                echo "Atualizar";
			            } ?></button>&nbsp&nbsp&nbsp
					    <a class="btn btn-primary" href="<?php echo base_url('notafiscal/index') ?>">Voltar</a>
					</div>
				</form>
			</div><!-- /.col-->
		</div><!-- /.row-->

<script type="text/javascript">
    
var base_url = '<? echo base_url() ?>';

function test(id_estado){
    document.getElementById('divCid').style.display = 'block';
    $.post(base_url+"lojas/cidadePorEstado", {
        id_estado : id_estado
    }, function(data){
        $('#cidade').html(data);
    });
}
</script>
