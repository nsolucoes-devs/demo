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
		<li class="active">Notas Fiscais</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Notas Fiscais</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">

                    <a style= "margin-bottom: 30px;" class="btn btn-primary" href="<?php echo base_url('notafiscal/telaCadastro') ?>" class="plus">
                        Adicionar Nova Nota Fiscal &nbsp<em class="fa fa-plus"></em></a>
					<div class="tableFixHead">
					<table id="myTable" class="table table-hover table-bordered">
					    <thead>
					        <tr>
					            <th>Número</th>
					            <th>Nome da Nota</th>
					            <th style='min-width: 150px;'>Ações</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php foreach($notasfiscais as $row){?>
					        <tr>
					            <td style="min-width:70px"><?php echo $row['numero_nf']?></td>
					            <td style="min-width:150px"><?php echo $row['nome_nf']?></td>
					            <td style="min-width:100px">
					                <a style="margin-left:1px" class="btn btn-primary" href="<?php echo base_url('Notafiscal/notaUnica/') . $row['id_nf'] ?>"  class="edit"><em class="fa fa-eye"></em></a>&nbsp&nbsp&nbsp
						            <?php if($this->session->userdata('tipo_pessoa') == 1 || $this->session->userdata('tipo_pessoa') == 4){ ?>
						            <a style="margin-left:1px" class="btn btn-primary" href="<?php echo base_url('notafiscal/editaNota/' . $row['id_nf']) ?>" class="edit"><em class="fa fa-pencil"></em></a>&nbsp&nbsp&nbsp
    								<a style="margin-left:1px" data-toggle="modal" data-target="#modalExcluirNota" class="btn btn-danger" onclick="setaDadosNf('<?php echo $row['id_nf'];?>')" class="trash"><em class="fa fa-trash"></em></a>
    								<?php } ?>
							    </td>
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
		
<div class="modal" id="modalExcluirNota">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Deseja excluir a nota?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        
      <!-- Modal body -->
      <div class="modal-body">
          <form id="modalExemplo" method="post" action="<?php echo base_url('notafiscal/excluirNota') ?>">
             <input type="hidden" name="idnf" id="idnf">
             <label>Motivo da Exclusão:</label><br>
             <textarea type="text" class="form-control" placeholder="Insira aqui o motivo" id="motivo" name="motivo" rows="3" required></textarea><br>
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
