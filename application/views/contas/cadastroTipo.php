
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Tipos de Contas</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Cadastro de Tipo</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" method="post" action="<?php echo base_url('contas/adicionarTipo') ?>">

							<div class="form-group">
							    <div class="row">
							        <div class="col-md-12">
        								<label>Nome:</label>
        								<input type="text" class="form-control" placeholder="Nome do novo tipo" id="tipo" name="tipo" required>
    								</div>
								</div>
							</div>
							
							<div class="form-group text-center" style="margin-top: 30px;">
							    <button type="submit" class="btn btn-primary">Cadastrar</button>&nbsp&nbsp&nbsp
							    <a class="btn btn-primary" href="<?php echo base_url('contas/telaTiposContas')?>">Voltar</a>
							</div>
						</form>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div><!-- /.row-->
