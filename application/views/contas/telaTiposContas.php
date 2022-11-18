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
		<li class="active">Tipos de Contas</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tipos de Contas</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">

                    <a style= "margin-bottom: 30px;" class="btn btn-primary" href="<?php echo base_url('contas/telaCadastro'); ?>" class="plus">
                        Adicionar Novo Tipo &nbsp<em class="fa fa-plus"></em></a>
                    <?php if($erro == 1){ ?>
                    <div class="alert alert-success">Novo tipo de conta inserido com sucesso!</div>
                    <?php } ?>
                    <?php if($erro == 2){ ?>
                    <div class="alert alert-danger">Não foi possível inserir!</div>
                    <?php } ?>
                    <?php if($delete == 1){ ?>
                    <div class="alert alert-success">Excluído com sucesso!</div>
                    <?php } ?>
					<div class="tableFixHead">
					<table id="myTable" class="table table-hover table-bordered">
					    <thead>
					        <tr>
					            <th>Nome do Tipo</th>
					            <?php if($this->session->userdata('tipo_pessoa') == 1 || $this->session->userdata('tipo_pessoa') == 4){ ?>
					            <th>Ações</th>
					            <?php } ?>
					        </tr>
					    </thead>
					    <tbody>
					        <?php foreach($tipos as $row){?>
					        <tr>
					            <td style="min-width:150px"><?php echo $row['nome_tipo_conta']?></td>
					            <?php if($this->session->userdata('tipo_pessoa') == 1 || $this->session->userdata('tipo_pessoa') == 4){ ?>
					            <td style="min-width:100px">
    								<a style="margin-left:1px" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" onclick="setaDadosTipoConta('<?php echo $row['id_tipo_conta'] ?>')" class="trash"><em class="fa fa-trash"></em></a>
							    </td>
							    <?php } ?>
					        </tr>
					        <?php } ?>
					    </tbody>
					 </table>
					</div>
			</div>
			<div class="panel-footer">
			    
			</div>
		</div>
		
	</div><!--/.col-->
</div>	
		
<div class="modal" id="modalExcluir">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Deseja excluir o Tipo de Conta?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        
      <!-- Modal body -->
      <div class="modal-body">
          <form id="modalExemplo" method="post" action="<?php echo base_url('contas/excluirTipo') ?>">
             <input type="hidden" name="idtipo" id="idtipo">
             <button type="submit" class="btn btn-success">Sim</button>
          </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
      </div>

    </div>
  </div>
</div>
