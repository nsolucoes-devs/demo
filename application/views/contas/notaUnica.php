<style>
    .tableFixHead          { overflow-y: auto; height: 500px; }
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
				<li class="active">Notas Fiscais</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Visualização de Nota Fiscal</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
					    <div class="col-md-12">
					        
    					    <label style="font-size:18px; color:black;">Dados da Nota</label>
    						<div class="row">
    						    <div class="col-md-12" style="border: 1px solid black;">
    						       <label>Natureza da Operação:</label>
    						       <p><?php echo $notafiscal['nome_nf'] ?></p>
    						    </div>
    						</div>
    						<div class="row">
    						    <div class="col-md-6" style="border: 1px solid black;">
    						        <label>Número da Nota:</label>
    						        <p><?php echo $notafiscal['numero_nf'] ?></p>
    						    </div>
    						    <div class="col-md-3" style="border: 1px solid black;">
    						        <label>N° de Folhas:</label>
    						        <p><?php echo $notafiscal['folha_nf'] ?></p>
    						    </div>
    						    <div class="col-md-3" style="border: 1px solid black;">
    						        <label>Série:</label>
    						        <p><?php echo $notafiscal['serie_nf'] ?></p>
    						    </div>
    						</div><br>
    						
    						<label style="font-size:18px; color:black;">Destinátario / Remetente</label>
    						<div class="row">
    						    <div class="col-md-7" style="border: 1px solid black;">
    						        <label>Endereço:</label>
    						        <p><?php echo $loja['endereco_loja'] ?></p>
    						    </div>
    						    <div class="col-md-5" style="border: 1px solid black;">
    						        <label>CNPJ:</label>
    						        <p><?php echo $loja['cnpj_loja'] ?></p>
    						    </div>
    						</div>
    						<div class="row">
    						    <div class="col-md-7" style="border: 1px solid black;">
    						        <label>Cidade:</label>
    						        <p><?php
    						        foreach($cidades as $cid){
    						            if($cid['id_cidade'] == $loja['cidade_id']){
    						                echo $cid['nome_cidade'];
    						            }
    						        } ?></p>
    						    </div>
    						    <div class="col-md-5" style="border: 1px solid black;">
    						        <label>Estado:</label>
    						        <p><?php
    						        foreach($estados as $est){
    						            if($est['id_estado'] == $loja['estado_id']){
    						                echo $est['uf_estado'];
    						            }
    						        } ?></p>
    						    </div>
    						</div><br>
    						
    						<label style="font-size:18px; color:black;">Dados de Saída</label>
    						<div class="row">
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Data de Emissão:</label>
    						        <p><?php 
    						        $dtex = explode('-', $notafiscal['data_emissao']);
    						        $dtre = $dtex[2] . '/' . $dtex[1] . '/' . $dtex[0];
    						        echo $dtre;
    						        ?></p>
    						    </div>
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Data de Saída:</label>
    						        <p><?php 
    						        $dtex = explode('-', $notafiscal['data_saida']);
    						        $dtre = $dtex[2] . '/' . $dtex[1] . '/' . $dtex[0];
    						        echo $dtre;
    						        ?></p>
    						    </div>
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Hora de Saída:</label>
    						        <p><?php echo $notafiscal['hora_saida'] ?></p>
    						    </div>
    						</div><br>
    						
    						<label style="font-size:18px; color:black;">Cálculo do Imposto</label>
    						<div class="row">
    						    <div class="col-md-3" style="border: 1px solid black;">
    						        <label>Base de Cálculo do ICMS:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['bc_icms'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>Valor do ICMS:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['valor_icms'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Base de Cálculo do ICMS Subst.:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['bc_icms_sub'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-3" style="border: 1px solid black;">
    						        <label>Valor do ICMS Subst.:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['valor_icms_sub'], 2, ',', '.'); ?></p>
    						    </div>
    						</div>
    						<div class="row">
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>Valor do Seguro:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['valor_seg'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>Valor do Frete:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['valor_frete'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>Desconto:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['desconto'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>Outros:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['outros'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Valor Total IPI:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['valor_total_ipi'], 2, ',', '.'); ?></p>
    						    </div>
    						</div>
    						<div class="row">
    						    <div class="col-md-6" style="border: 1px solid black;">
    						        <label>Valor Total dos Produtos:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['valor_total_prod'], 2, ',', '.'); ?></p>
    						    </div>
    						    <div class="col-md-6" style="border: 1px solid black;">
    						        <label>Valor Total da Nota:</label>
    						        <p><?php echo 'R$ '.number_format($notafiscal['valor_total_nota'], 2, ',', '.'); ?></p>
    						    </div>
    						</div><br>
    						
    						<label style="font-size:18px; color:black;">Transportador / Volumes Transportados</label>
    						<div class="row">
    						    <div class="col-md-7" style="border: 1px solid black;">
    						        <label>Nome:</label>
    						        <p><?php echo $notafiscal['nome_transp']; ?></p>
    						    </div>
    						    <div class="col-md-5" style="border: 1px solid black;">
    						        <label>CPF:</label>
    						        <p><?php echo $notafiscal['cpf_transp']; ?></p>
    						    </div>
    						</div>
    						<div class="row">
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Cidade:</label>
    						        <p><?php
    						        foreach($cidades as $cid){
    						            if($cid['id_cidade'] == $notafiscal['cidade_transp']){
    						                echo $cid['nome_cidade'];
    						            }
    						        } ?></p>
    						    </div>
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>UF:</label>
    						        <p><?php
    						        foreach($estados as $est){
    						            if($est['id_estado'] == $notafiscal['estado_transp']){
    						                echo $est['uf_estado'];
    						            }
    						        } ?></p>
    						    </div>
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Placa:</label>
    						        <p><?php echo $notafiscal['placa_veic']; ?></p>
    						    </div>
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>UF Placa:</label>
    						        <p><?php echo $notafiscal['uf_placa']; ?></p>
    						    </div>
    						</div>
    						<div class="row">
    						    <div class="col-md-2" style="border: 1px solid black;">
    						        <label>Quantidade:</label>
    						        <p><?php echo $notafiscal['qtde_transp']; ?></p>
    						    </div>
    						    <div class="col-md-4" style="border: 1px solid black;">
    						        <label>Espécie:</label>
    						        <p><?php echo $notafiscal['especie_transp']; ?></p>
    						    </div>
    						    <div class="col-md-3" style="border: 1px solid black;">
    						        <label>Peso Bruto:</label>
    						        <p><?php echo $notafiscal['peso_bruto']; ?></p>
    						    </div>
    						    <div class="col-md-3" style="border: 1px solid black;">
    						        <label>Peso Líquido:</label>
    						        <p><?php echo $notafiscal['peso_liq']; ?></p>
    						    </div>
    						</div><br>
    						
    						<label style="font-size:18px; color:black;">Itens da Nota</label>
    						<div class="tableFixHead">
            					<table id="myTable" class="table table-hover table-bordered">
            					    <thead>
            					        <tr>
            					            <th>Código</th>
            					            <th>Descrição</th>
            					            <th>Un</th>
            					            <th>Qtde</th>
            					            <th>Preço Un</th>
            					            <th>Preço Total</th>
            					            <th>BC ICMS</th>
            					            <th>Vlr. ICMS</th>
            					            <th>Vlr. IPI</th>
            					        </tr>
            					    </thead>
            					    <tbody>
            					        <?php echo $itens; ?>
            					    </tbody>
            					 </table>
        					</div>
    						
    						<div name="panel-body-footer" class="form-group text-center" style="margin-top: 30px;">
    						    <a class="btn btn-primary" href="<?php echo base_url('notafiscal/index') ?>">Voltar</a>
    						</div>
						</div>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div><!-- /.row-->
	
