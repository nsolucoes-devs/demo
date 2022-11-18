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
		<li>Produtos</li>
		<li>Estoques</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Estoques -</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
                    <a style= "margin-bottom: 30px;" class="btn btn-primary" href="<?php echo base_url('home/index');?>" >
                        Voltar</a>
                    <a style= "margin-bottom: 30px;" class="btn btn-primary" href="<?php  ?>" class="plus">
                        <em class="fa fa-plus"></em></a>
					<div class="tableFixHead">
					<table id="myTable" class="table table-hover table-bordered">
					    <thead>
					        <tr>
					            <th style="width: 27%">Nome</th>
					            <th style="width: 28%">Modelo</th>
					            <th style="width: 20%">Fabricante</th>
					            <th style="width: 10%">Quantidade</th>
					            <th style="width: 15%">Ações</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php foreach($produto as $row){ $sum=0;?>
					        <tr>
					            <td><?php echo $row['produto_nome']?></td>
					            <td><?php echo $row['produto_modelo']?></td>
					            <td><?php echo $row['produto_fabricante'];?></td>
					            <td><?php foreach ($estoques as $est){ if($row['produto_id'] == $est['estoque_produto_id']){ $sum = $sum + $est['estoque_quantidade']; }}echo $sum;?></td>
					            <td style="max-width:70px; min-width: 150px">
					                <a style="" class="btn btn-success" class="edit"><em class="fa fa-plus"></em></a>
					                <a style="" class="btn btn-danger" class="edit"><em class="fa fa-minus"></em></a>
						            <a style="" class="btn btn-primary" class="edit"><em class="fa fa-eye"></em></a>
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
		
<div class="modal" id="modalExcluir">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Deseja excluir o modelo?</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        
      <!-- Modal body -->
      <div class="modal-body">
          <form id="modalExemplo" method="post" action="<?php echo base_url('estoque/excluirEstoque') ;?>">
             <input type="hidden" name="campo" id="campo">
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
