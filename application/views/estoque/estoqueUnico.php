		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li>Produtos</li>
				<li>Estoques</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php if(isset($estoque['id_estoque'])) echo "Estoque " . $estoque['modelo_produto'] . " - " . $produto['nome_produto'] ; else echo "Cadastro de Estoque - " . $produto['nome_produto']?></h1>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" method="post" action="<?php if(!isset($estoque['id_estoque'])) echo base_url('estoque/cadastroEstoque/'); else echo base_url('estoque/atualizarEstoque/');?>">
    					    <input type="hidden" id="produto_id" name="produto_id" value="<?php echo $produto['id_produto']?>">
    					    <?php if(isset($estoque)){ ?>
    					        <input type="hidden" id="estoque_id" name="estoque_id" value="<?php echo $estoque['id_estoque']?>">
    					    <?php } ?>
    					    
							<?php if($this->session->userdata('tipo_pessoa') != 3){?>
							<div class="row">
    							<div class="form-group col-md-12">
    							    <?php if(!isset($mostrar)) {?>
                                    <label>Loja</label><br>
        			                <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="loja" name="loja" >
                                        <?php if(!isset($estoque['loja_id'])) echo"<option value='' selected hidden>Selecione a Loja</option>"?>
                                        <?php foreach($lojas as $row) {
                                                echo "<option "; 
                                                if(isset($estoque['loja_id']) && $estoque['loja_id'] == $row['id_loja']){ echo " selected ";}
                                                echo "value='" . $row['id_loja'] . "' > " . $row['nome_loja'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                    <?php } else {?>
                					<div><label>Loja: &nbsp</label> <?php 
                                        foreach($lojas as $row) {
                                            if($estoque['loja_id'] == $row['id_loja']){
                                                echo $row['endereco_loja'];
                                            }
                                        }
                                    ?></div>
                					<?php } ?>
    							</div>
							</div>
							<?php } else {?>
							    <input type="hidden" id="loja" name="loja" value="<?php echo $this->session->userdata('loja_id');?>">
							<?php } ?>
							
							<div class="row">
    					        <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4">
    								<label>Modelo</label>
    								<input class="form-control"
    								type="text" placeholder="Modelo" id="modelo" name="modelo" <?php if(isset($estoque)) echo "value = '" . $estoque['modelo_produto'] . "'"?>>
    							</div>
    							<?php } else {?>
            					<div class="form-group col-md-4">
        				            <div><label>Modelo: &nbsp</label> <?php echo $estoque['modelo_produto']?></div>
        				        </div>
            					<?php } ?>
    							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4 ">
    								<label style="margin-right: 5px;">SKU:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;"
        								type="text" placeholder="SKU" id="sku" name="sku" <?php if(isset($estoque)) echo "value = '" . $estoque['sku'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>SKU: &nbsp</label> <?php echo $estoque['sku']?></div>
        				        </div>
    							<?php } ?>
							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group form-inline col-md-4">
    								<label style="margin-right: 5px;">NCM:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;"
        								type="text" placeholder="NCM" id="ncm" name="ncm" <?php if(isset($estoque)) echo "value = '" . $estoque['ncm'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>NCM: &nbsp</label> <?php echo $estoque['ncm']?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4">
    								<label>Opção</label>
        			                <select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="tipo_produto" name="tipo_produto" >
                                        <?php echo"<option value='0' hidden>Selecione a Opção</option>"?>
                                        <?php foreach($tipos as $row) {
                                                echo "<option";
                                                if(isset($estoque) && $estoque['tipo_produto_id'] == $row['id_tipo']) echo " selected ";
                                                echo " value='" . $row['id_tipo'] . "' > " . $row['nome_tipo'] . "</option>";
                                            }
                                        ?>
                                    </select>
    							</div>
    							<?php } else {?>
            					<div class="form-group col-md-4">
        				            <div><label>Opção: &nbsp</label> <?php 
                                        foreach($tipos as $row2) {
                                            if($estoque['tipo_produto_id'] == $row2['id_tipo']){
                                                echo $row2['nome_tipo'];
                                            }
                                        }
                                    ?></div>
        				        </div>
            					<?php } ?>
            					
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group form-inline col-md-4">
    								<label style="margin-right: 5px;">CEST:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;"
        								type="text" placeholder="CEST" id="cest" name="cest" <?php if(isset($estoque)) echo "value = '" . $estoque['cest'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>CEST: &nbsp</label> <?php echo $estoque['cest']?></div>
        				        </div>
    							<?php } ?>
	
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group form-inline col-md-4">
    								<label style="margin-right: 5px;">UPC:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;" 
        								type="text" placeholder="UPC" id="upc" name="upc" <?php if(isset($estoque)) echo "value = '" . $estoque['upc'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>UPC: &nbsp</label> <?php echo $estoque['upc']?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4">
    								<label>Localização</label>
    								<input class="form-control"  
    								type="text" placeholder="Localização" id="localizacao" name="localizacao" <?php if(isset($estoque)) echo "value = '" . $estoque['localizacao_produto'] . "'"?>>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>Localização: &nbsp</label> <?php echo $estoque['localizacao_produto']?></div>
        				        </div>
    							<?php } ?>
    							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group form-inline col-md-4">
    								<label style="margin-right: 5px;">EAN:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;"
        								type="text" placeholder="EAN" id="ean" name="ean" <?php if(isset($estoque)) echo "value = '" . $estoque['ean'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>EAN: &nbsp</label> <?php echo $estoque['ean']?></div>
        				        </div>
    							<?php } ?>
							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group form-inline col-md-4">
    								<label style="margin-right: 5px;">JAN:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;"
        								type="text" placeholder="JAN" id="jan" name="jan" <?php if(isset($estoque)) echo "value = '" . $estoque['jan'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>JAN: &nbsp</label> <?php echo $estoque['jan']?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4">
    								<label>Quantidade</label>
    								<input class="form-control"  
    								type="number" placeholder="Quantidade" id="qtd" name="qtd" <?php if(isset($estoque)) echo "value = '" . $estoque['estoque'] . "'"?>>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>Quantidade: &nbsp</label> <?php echo $estoque['estoque']?></div>
        				        </div>
    							<?php } ?>
    							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group form-inline col-md-4">
    								<label style="margin-right: 5px;">ISBN:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;"
        								type="text" placeholder="ISBN" id="isbn" name="isbn" <?php if(isset($estoque)) echo "value = '" . $estoque['isbn'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>ISBN: &nbsp</label> <?php echo $estoque['isbn']?></div>
        				        </div>
    							<?php } ?>
							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group form-inline col-md-4">
    								<label style="margin-right: 5px;">MPN:</label>
    								<div class="form-inline">
        								<label style="margin-right: 5px;"><?php echo strtoupper($produto['id_produto'])?></label>
        								<input class="form-control" style="min-width: 250px;"
        								type="text" placeholder="MPN" id="mpn" name="mpn" <?php if(isset($estoque)) echo "value = '" . $estoque['mpn'] . "'"?>>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>MPN: &nbsp</label> <?php echo $estoque['mpn']?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Estoque Mínimo</label>
    								<input class="form-control"  
    								type="number" placeholder="Mínimo por venda" id="min_est" name="min_est" <?php if(isset($estoque)) echo "value = '" . $estoque['min_estoque'] . "'"?>>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Estoque Mínimo: &nbsp</label> <?php echo $estoque['min_estoque']?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4">
    								<label>Valor de Custo</label>
    								<input type="text" class="form-control mascara" value="<?php if(isset($estoque)) echo $estoque['valor_produto'];?>" 
        								placeholder="R$" id="custo" name="custo">
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>Valor de Custo: &nbsp</label>R$ <?php echo $estoque['valor_produto']?></div>
        				        </div>
    							<?php } ?>
    							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4">
    								<label>Valor de Venda</label>
    								<input type="text" class="form-control mascara" value="<?php if(isset($estoque)) echo $estoque['venda_produto'];?>" 
        								placeholder="R$" id="venda" name="venda">
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>Valor de Venda: &nbsp</label>R$ <?php echo $estoque['venda_produto']?></div>
        				        </div>
    							<?php } ?>
    							
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-4">
    								<label>Mínimo por venda</label>
    								<input class="form-control"  
    								type="number" placeholder="Mínimo por venda" id="minimo" name="minimo" <?php if(isset($estoque)) echo "value = '" . $estoque['qtd_minima'] . "'"?>>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-4">
        				            <div><label>Mínimo por venda: &nbsp</label> <?php echo $estoque['qtd_minima']?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Reduzir estoque?</label>
    								<div class="row">
    								    <div class="col-md-12">
    								        <input type="radio" id="sim" name="reduzirestoque" value="1" <?php if(!isset($estoque) || (isset($estoque) && $estoque['reduzir_estoque_produto'] == 1))  echo "checked";?>>
    								        <label for="sim" style="margin-right: 10px;">Sim</label> 
    								        <input type="radio" id="nao" name="reduzirestoque" value="0" <?php if(isset($estoque) && $estoque['reduzir_estoque_produto'] == 0)  echo "checked";?>>
    								        <label for="nao">Não</label>
    								    </div>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Reduzir estoque: &nbsp</label> <?php if($estoque['reduzir_estoque_produto'] == 1) echo "Sim"; else echo "Não"?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Se esgotado</label>
    								<select  style="width: 100%!important" id="esgotado" name="esgotado" class="form-control">
    								    <option value="1" <?php if(isset($estoque) && $estoque['se_esgotado_produto'] == 1)  echo "selected";?>>2 a 3 dias</option>
    								    <option value="2" <?php if(isset($estoque) && $estoque['se_esgotado_produto'] == 2)  echo "selected";?>>Em estoque</option>
    								    <option value="3" <?php if(isset($estoque) && $estoque['se_esgotado_produto'] == 3)  echo "selected";?>>Esgotado</option>
    								    <option value="4" <?php if(isset($estoque) && $estoque['se_esgotado_produto'] == 4)  echo "selected";?>>Sob orçamento</option>
    								</select>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Se esgotado: &nbsp</label> <?php if($estoque['se_esgotado_produto'] == 1) echo "2 a 3 dias";
        				                else if($estoque['se_esgotado_produto'] == 2) echo "Em estoque";
        				                else if($estoque['se_esgotado_produto'] == 3) echo "Esgotado";
        				                else if($estoque['se_esgotado_produto'] == 4) echo "Sob orçamento";?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Precisa de frete?</label>
    								<div class="row">
    								    <div class="col-md-12">
    								        <input type="radio" id="sim1" name="precisafrete" value="1" <?php if(!isset($estoque) || (isset($estoque) && $estoque['precisa_frete_produto'] == 1))  echo "checked";?>>
    								        <label for="sim1" style="margin-right: 10px;">Sim</label>
    								        <input type="radio" id="nao2" name="precisafrete" value="0" <?php if(isset($estoque) && $estoque['precisa_frete_produto'] == 0)  echo "checked";?>>
    								        <label for="nao2">Não</label>
    								    </div>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Precisa de frete: &nbsp</label> <?php if($estoque['precisa_frete_produto'] == 1) echo "Sim"; else echo "Não"?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Disponível a partir de</label>
    								<div class="row">
    								    <div class="col-md-4">
    								        <input class="form-control" 
    								        type="date" id="datadisponivel" name="datadisponivel" <?php if(isset($estoque)) echo "value = '" . $estoque['data_disponivel_produto'] . "'"?>>
    								    </div>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Disponível a partir de: &nbsp</label> <?php echo $estoque['data_disponivel_produto']?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Unidade de medida</label>
    								<select  style="width: 100%!important" id="unidademedida" name="unidademedida" class="form-control" onchange="mostrarDimensao()">
    								    <option value="0" hidden <?php if(isset($estoque) && $estoque['unidade_medida_produto'] == 0)  echo "selected"; if (!isset($estoque)) echo "selected"?>>Selecione a unidade</option>
    								    <option value="1" <?php if(isset($estoque) && $estoque['unidade_medida_produto'] == 1)  echo "selected";?>>Centímetro</option>
    								    <option value="2" <?php if(isset($estoque) && $estoque['unidade_medida_produto'] == 2)  echo "selected";?>>Milímetro</option>
    								    <option value="3" <?php if(isset($estoque) && $estoque['unidade_medida_produto'] == 3)  echo "selected";?>>Polegada</option>
    								</select>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Unidade de medida: &nbsp</label> <?php if($estoque['unidade_medida_produto'] == 0) echo "Não Selecionado";
        				                else if($estoque['unidade_medida_produto'] == 1) echo "Centímetro";
        				                else if($estoque['unidade_medida_produto'] == 2) echo "Milímetro";
        				                else if($estoque['unidade_medida_produto'] == 3) echo "Polegada"; ?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row" id="divDim" style="<?php if(!isset($estoque) || (isset($estoque) && $estoque['unidade_medida_produto'] == 0)) echo 'display:none;'?>">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Dimensões (C x L x A)</label>
    								<div class="row">
    								    <div class="col-md-4">
    								        <input class="form-control"  type="number" placeholder="Comprimento" id="comprimento" name="comprimento" <?php if(isset($estoque)) echo "value = '" . number_format($estoque['comprimento_produto'], 4) . "'"?>>
    								    </div>
    								    <div class="col-md-4">
    								        <input class="form-control"  type="number" placeholder="Largura" id="largura" name="largura" <?php if(isset($estoque)) echo "value = '" . number_format($estoque['largura_produto'], 4) . "'"?>>
    								    </div>
    								    <div class="col-md-4">
    								        <input class="form-control"  type="number" placeholder="Altura" id="altura" name="altura" <?php if(isset($estoque)) echo "value = '" . number_format($estoque['altura_produto'], 4) . "'"?>>
    								    </div>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Comprimento: &nbsp</label> <?php echo number_format($estoque['comprimento_produto'], 4)?></div>
        				        </div>  
        				        <div class="form-group col-md-12">
        				            <div><label>Altura: &nbsp</label> <?php echo number_format($estoque['altura_produto'], 4)?></div>
        				        </div>
        				        <div class="form-group col-md-12">
        				            <div><label>Largura: &nbsp</label> <?php echo number_format($estoque['largura_produto'], 4)?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row" >
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Unidade de peso</label>
    								<select  style="width: 100%!important" id="unidadepeso" name="unidadepeso" class="form-control" onchange="mostrarPeso()">
    								    <option value="0" hidden <?php if(isset($estoque) && $estoque['unidade_peso_produto'] == 0)  echo "selected"; if (!isset($estoque)) echo "selected"?>>Selecione a unidade</option>
    								    <option value="1" <?php if(isset($estoque) && $estoque['unidade_peso_produto'] == 1)  echo "selected";?>>Quilograma</option>
    								    <option value="2" <?php if(isset($estoque) && $estoque['unidade_peso_produto'] == 2)  echo "selected";?>>Grama</option>
    								    <option value="3" <?php if(isset($estoque) && $estoque['unidade_peso_produto'] == 3)  echo "selected";?>>Libra</option>
    								    <option value="4" <?php if(isset($estoque) && $estoque['unidade_peso_produto'] == 4)  echo "selected";?>>Onça</option>
    								</select>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Unidade de peso: &nbsp</label> <?php if($estoque['unidade_peso_produto'] == 0) echo "Não Selecionado";
        				                else if($estoque['unidade_peso_produto'] == 1) echo "Quilograma";
        				                else if($estoque['unidade_peso_produto'] == 2) echo "Grama";
        				                else if($estoque['unidade_peso_produto'] == 3) echo "Libra"; 
        				                else if($estoque['unidade_peso_produto'] == 4) echo "Onça";?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row" id="divPeso"  style="<?php if(!isset($estoque) || (isset($estoque) && $estoque['unidade_peso_produto'] == 0)) echo 'display:none;'?>">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Peso</label>
    								<input class="form-control" <?php if(isset($estoque)) echo "value = '" . number_format($estoque['peso_produto'], 4) . "'"?>
    								type="number" placeholder="Peso" id="peso" name="peso">
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Peso: &nbsp</label> <?php echo number_format($estoque['peso_produto'], 4)?></div>
        				        </div>
    							<?php } ?>
							</div>
							
							<div class="row">
							    <?php if(!isset($mostrar)) {?>
    							<div class="form-group col-md-12">
    								<label>Situação</label>
    								<div class="row">
    								    <div class="col-md-12">
    								        <input type="radio" id="habilitado" name="situacao" value="1" <?php if(!isset($estoque) || (isset($estoque) && $estoque['situacao_produto'] == 1))  echo "checked";?>>
    								        <label for="habilitado" style="margin-right: 10px;">Habilitado</label>
    								        <input type="radio" id="desabilitado" name="situacao" value="0" <?php if(isset($estoque) && $estoque['situacao_produto'] == 0)  echo "checked";?>>
    								        <label for="desabilitado">Desabilitado</label>
    								    </div>
    								</div>
    							</div>
    							<?php } else {?>
    							<div class="form-group col-md-12">
        				            <div><label>Situação: &nbsp</label> <?php if($estoque['situacao_produto'] == 1) echo "Habilitado"; else echo "Desabilitado"?></div>
        				        </div>
    							<?php } ?>
							</div>
    						
							<div class="form-group text-center" style="margin-top: 30px;">
							    <?php if(!isset($mostrar)) {?>
							    <button type="submit" class="btn btn-primary"><?php if(!isset($estoque['id_estoque'])) echo "Cadastrar"; else echo "Salvar"?></button>&nbsp&nbsp&nbsp
							    <?php } ?>
							    <a class="btn btn-primary" href="<?php echo base_url('estoque/listaEstoque/') . $produto['id_produto']?>">Voltar</a>
							</div>
				
						</form>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div><!-- /.row-->
		
<script>
    function mostrarDimensao(){
        var dimensao = document.getElementById('unidademedida').value;
        
        if(dimensao == 0){
            document.getElementById('divDim').style.display = "none";
        }else{
            document.getElementById('divDim').style.display = "block";
        }
    }
    
    function mostrarPeso(){
        var unidadePeso = document.getElementById('unidadepeso').value;
        
        if(unidadePeso == 0){
            document.getElementById('divPeso').style.display = "none";
        }else{
            document.getElementById('divPeso').style.display = "block";
        }
    }
</script>