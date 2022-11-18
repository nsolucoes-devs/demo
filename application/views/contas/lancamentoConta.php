
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
				<h1 class="page-header">Lançamento de Conta</h1>
			</div>
		</div><!--/.row-->
				
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form role="form" method="post" action="<?php
						if($despesa != null){
						    echo base_url('contas/editaDespesa');
						}else{
						    echo base_url('contas/novaDespesa');
						} 
						?>">
                            <input type="hidden" id="idcaixa" name="idcaixa" value="<?php echo $caixaunico['id_caixa']?>">
                            <?php if($despesa != null){ ?>
                            <input type="hidden" id="iddespesa" name="iddespesa" value="<?php echo $despesa['id_despesa']?>">
                            <?php } ?>
                            <?php if($erro == 1){ ?>
                            <div class="form-group">
							    <div class="row">
							        <div class="col-md-12">
							            <div class="alert alert-danger">Não é possível inserir contas com valor maior do que o valor disponível em caixa!</div>
							        </div>
							    </div>
							</div>
							<?php } ?>
							<?php if($erro == 2){ ?>
                            <div class="form-group">
							    <div class="row">
							        <div class="col-md-12">
							            <div class="alert alert-danger">Não foi possível inserir a nova conta!</div>
							        </div>
							    </div>
							</div>
							<?php } ?>
							<?php if($erro == 3){ ?>
                            <div class="form-group">
							    <div class="row">
							        <div class="col-md-12">
							            <div class="alert alert-danger">Não é possível inserir contas para dias anteriores!</div>
							        </div>
							    </div>
							</div>
							<?php } ?>
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6" style="padding-top:10px">
        								<label>Título:</label>
        								<input type="text" class="form-control" placeholder="Identificação" id="titulo" name="titulo" required value="<?php if($despesa !=null){echo $despesa['titulo_despesa'];} ?>">
    								</div>
    								<div class="col-md-6" style="padding-top:10px">
        								<label>Tipo:</label>
        								<?php if($despesa == null){ ?>
        								<select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="tipo" name="tipo" required>
        								    <option value='' selected disabled hidden>Selecione o Tipo</option>
        								    <?php foreach($tipos as $tip){
        								        echo "<option value='" . $tip['id_tipo_conta'] . "'>" . $tip['nome_tipo_conta'] . "</option>";
        								    } ?>
        								</select>
        								<?php }else{ ?>
        								<select  style="width: 100%!important" class="js-example-basic-multiple form-control" id="tipo" name="tipo" required>
        								    <?php foreach($tipos as $tip){
        								        echo "<option ";
        								        if($despesa['tipo_conta_id'] == $tip['id_tipo_conta']){
        								            echo "selected ";
        								        }
        								        echo "value='" . $tip['id_tipo_conta'] . "'>" . $tip['nome_tipo_conta'] . "</option>";
        								    } ?>
        								</select>
        								<?php } ?>
    								</div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-6" style="padding-top:10px">
        								<label>Data:</label >
        								<input type="date" class="form-control" id="data" name="data" required value="<?php
        								if($despesa !=null){
        								    echo date('Y-m-d', strtotime(str_replace('/', '-', $despesa['data_despesa'])));
        								} 
        								?>">
    								</div>
    								<div class="col-md-6" style="padding-top:10px">
        								<label>Valor:</label>
        								<input type="text" class="form-control mascara" id="valor" name="valor" placeholder="R$ 0,00" required value="<?php if($despesa !=null){echo str_replace('.', ',', $despesa['valor_despesa']);} ?>">
    								</div>
								</div>
							</div>
							
							<div class="form-group">
							    <div class="row">
							        <div class="col-md-12" style="padding-top:10px">
        								<label>Observação:</label>
        								<textarea type="text" class="form-control" placeholder="Insira aqui a observação" id="obs" name="obs" required rows="3"><?php if($despesa !=null){echo $despesa['observacao_despesa'];} ?></textarea>
    								</div>
								</div>
							</div>
							
							<div class="form-group text-center" style="margin-top: 30px;">
							    <button type="submit" class="btn btn-primary">Cadastrar</button>&nbsp&nbsp&nbsp
							    <a class="btn btn-primary" href="<?php if($this->session->userdata('tipo_pessoa') != 3){echo base_url('contas/telaDespesas/' . $caixaunico['id_caixa']);}
							    else{echo base_url('contas/telaDespesas');}?>">Voltar</a>
							</div>
						</form>
					</div>
				</div><!-- /.panel-->
			</div><!-- /.col-->
		</div><!-- /.row-->
