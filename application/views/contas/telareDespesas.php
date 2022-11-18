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
		<li class="active">Caixa</li>
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

                    <a style= "margin-bottom: 30px;" class="btn btn-primary" href="<?php 
                    if($this->session->userdata('tipo_pessoa') != 3){echo base_url('Contas/telareLancamentoConta2/') . $caixaunico['id_caixa'];}else{echo base_url('Contas/telareLancamentoConta/');}?>" class="plus">
                        Lançar nova despesa &nbsp<em class="fa fa-plus"></em></a>
                    <?php if($sucesso == 1){ ?>
                    <div class="alert alert-success">Nova despesa inserida com sucesso!</div>
                    <?php } ?>
                    <?php if($sucesso == 2){ ?>
                    <div class="alert alert-danger">Não foi possível inserir!</div>
                    <?php } ?>
                    <?php if($sucesso == 3){ ?>
                    <div class="alert alert-success">Nova despesa inserida com sucesso, o valor dela será descontado do caixa do dia informado!</div>
                    <?php } ?>
                    <?php if($sucesso == 4){ ?>
                    <div class="alert alert-success">Despesa excluída com sucesso!</div>
                    <?php } ?>
                    <?php if($sucesso == 5){ ?>
                    <div class="alert alert-danger">Não foi possível excluir a despesa!</div>
                    <?php } ?>
                    <?php if($despesas != null){ ?>
					<div class="tableFixHead">
					<table id="myTable" class="table table-hover table-bordered">
					    <thead>
					        <tr>
					            <th>Data</th>
					            <th>Título</th>
					            <th>Funcionário</th>
					            <th>Tipo</th>
					            <th>Valor</th>
					            <th>Observação</th>
					            <th>Já descontado?</th>
					            <th style="min-width:70px">Ações</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php foreach($despesas as $row){
					            $dtexplode = explode('/', $row['data_despesa']);
					            $dtreformatada = $dtexplode[2] . '-' . $dtexplode[1] . '-' . $dtexplode[0];
					            $dtexplode2 = explode('/', $caixaunico['abertura_caixa']);
					            $dtreformatada2 = $dtexplode2[2] . '-' . $dtexplode2[1] . '-' . $dtexplode2[0];
					            $datanova = new DateTime($dtreformatada);
					            $date = new DateTime($dtreformatada);
					            if($date == $datanova && $row['caixa_id'] == $caixaunico['id_caixa']){
					        ?>
					        <tr>
					            <td><?php echo $row['data_despesa']?></td>
					            <td><?php echo $row['titulo_despesa']?></td>
					            <td>
					                <?php
					                    foreach($funcionarios as $fun){
					                        if($fun['id_funcionario'] == $row['funcionario_id']){
					                            echo $fun['nome_funcionario'];
					                        }
					                    }
					                ?>
					            </td>
					            <td>
					                <?php foreach($tipos as $tip){
					                    if($tip['id_tipo_conta'] == $row['tipo_conta_id']){
					                        echo $tip['nome_tipo_conta'];
					                    }
					                } ?>
					            </td>
					            <td><?php echo 'R$ ' . number_format($row['valor_despesa'], 2, ',', '.')?></td>
					            <td><?php echo $row['observacao_despesa']?></td>
					            <td>
					                <?php if($row['descontado_despesa'] == 1){
					                    echo "Sim";
					                } ?>
					                <?php if($row['descontado_despesa'] == 0){
					                    echo "Não";
					                } ?>
					            </td>
					            <td>
					                <a href="<?php echo base_url('contas/retrataChamada/' . $row['id_despesa']) ?>" class="btn btn-primary"><em class="fa fa-pencil"></em></a>&nbsp
					                <a href="<?php echo base_url('contas/reexcluirDespesa/' . $row['id_despesa']) ?>" class="btn btn-danger"><em class="fa fa-trash"></em></a>
					            </td>
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
			    <a class="btn btn-primary" href="<?php echo base_url('caixa/index'); ?>"><em class="fa fa-angle-left">&nbspVoltar</em></a>
			</div>
		</div>
	</div><!--/.col-->
</div>	
