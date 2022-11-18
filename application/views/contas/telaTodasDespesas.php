
<style>
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
		<li class="active">Contas</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Despesas</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
			    <?php if($erro == 3){ ?>
			        <div class="alert alert-success">Despesa baixada com sucesso, o valor dela foi descontado do caixa da loja!</div>
			    <?php }else if($erro == 1){ ?>
			        <div class="alert alert-danger">Não foi possível efetuar a baixa, pois a loja não possui caixa aberto ainda!</div>
			    <?php }else if($erro == 2){ ?>
			        <div class="alert alert-danger">Impossível efetuar baixa, pois o valor da despesa é maior do que o valor disponível em caixa!</div>
			    <?php } ?>
                    <?php if(!empty($despesas)){ ?>
					<div class="tableFixHead">
					<table id="myTable" class="table table-hover table-bordered">
					    <thead>
					        <tr>
					            <th>Data</th>
					            <th>Título</th>
					            <th>Funcionário</th>
					            <th>Loja</th>
					            <th>Tipo</th>
					            <th>Valor</th>
					            <th>Observação</th>
					            <th>Baixar Título?</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php foreach($despesas as $dep){ 
					            if($dep['descontado_despesa'] == 0){
					        ?>
					        <tr>
					            <td><?php echo $dep['data_despesa'] ?></td>
					            <td><?php echo $dep['titulo_despesa'] ?></td>
					            <td><?php foreach($funcionarios as $fun){
					                if($fun['id_funcionario'] == $dep['funcionario_id']){
					                    echo $fun['nome_funcionario'];
					                }
					            } ?></td>
					            <td>
					                <?php 
					                    foreach($lojas as $loj){
					                        if($loj['id_loja'] == $dep['loja_id']){
					                            echo $loj['nome_loja'];
					                        }
					                    }
					                ?>
					            </td>
					            <td><?php foreach($tipos as $tip){
					                if($tip['id_tipo_conta'] == $dep['tipo_conta_id']){
					                    echo $tip['nome_tipo_conta'];
					                }
					            } ?></td>
					            <td><?php echo "R$ " . number_format($dep['valor_despesa'], 2, ',', '.') ?></td>
					            <td><?php echo $dep['observacao_despesa'] ?></td>
					            <td><a href="<?php echo base_url('contas/baixarConta/' . $dep['id_despesa']) ?>" class="btn btn-primary">Baixar</a></td>
					        </tr>
					        <?php } } ?>
					    </tbody>
					 </table>
					</div>
					<?php }else{ ?>
					    <h3 class="page-header">Não há despesas</h3>
					<?php } ?>
			</div>
			<div class="panel-footer">
			    
			</div>
		</div>
	</div><!--/.col-->
</div>	
