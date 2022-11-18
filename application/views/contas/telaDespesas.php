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
                    if($this->session->userdata('tipo_pessoa') != 3){echo base_url('Contas/telaLancamentoConta2/') . $caixaunico['id_caixa'];}else{echo base_url('Contas/telaLancamentoConta/');}?>" class="plus">
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
					            <th>Obs.</th>
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
					            <td><a onclick="setaObs(<?php echo $row['id_despesa'] . ", '" . $row['data_despesa'] . "', '" . $row['titulo_despesa'] . "'";?>)" data-toggle="modal" data-target="#modalObs" class="btn btn-primary"  class="trash"><em class="fa fa-eye"></em></a></td>
					            <td>
					                <?php if($row['descontado_despesa'] == 1){
					                    echo "Sim";
					                } ?>
					                <?php if($row['descontado_despesa'] == 0){
					                    echo "Não";
					                } ?>
					            </td>
					            <td>
					                <a href="<?php echo base_url('contas/trataChamada/' . $row['id_despesa']) ?>" class="btn btn-primary"><em class="fa fa-pencil"></em></a>&nbsp
					                <a href="<?php echo base_url('contas/excluirDespesa/' . $row['id_despesa']) ?>" class="btn btn-danger"><em class="fa fa-trash"></em></a>
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

<div class="modal" id="modalObs">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Observação da Despesa</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <br><br>
        <div class="row">
            <div class="col-md-6"><label>Data: &nbsp</label><input style="border: 0px" type="text" disabled id="datamodal"></input></div>
            <div class="col-md-6"><label>Título: &nbsp</label><input style="border: 0px" type="text" disabled id="titulo"></input></div>
        </div>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
          
        <div class="form-group">
            <div class="row">
                <div class="col-md-12"><label>Observação: &nbsp</label><label id="obs"></label></div>
            </div>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
      </div>

    </div>
  </div>
</div>

<script>
    function setaObs(valor, datadesp, tit) {
        document.getElementById('datamodal').value = datadesp;
        document.getElementById('titulo').value = tit;
        
        var dados = new FormData();
        dados.append('id', valor);
        $.ajax({
            url: '<?php echo base_url('contas/setaId'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                if(data == "null"){
                    alert('Erro');
                }else{
                    document.getElementById('obs').innerHTML = data;
                }
        
            },
        });
    }
</script>
