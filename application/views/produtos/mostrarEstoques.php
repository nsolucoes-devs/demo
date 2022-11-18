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
		<h1 class="page-header">Estoques - <?php echo $produto['nome_produto']?></h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			
			<div class="panel-body">
                    <a style= "margin-bottom: 30px;" class="btn btn-primary" href="<?php echo base_url('produtos/listaProdutos');?>" >
                        Voltar</a>&nbsp&nbsp&nbsp
                    <a style= "margin-bottom: 30px;" class="btn btn-primary" href="<?php echo base_url('estoque/telaCadastroEstoque/') . $produto['id_produto']?>" class="plus">
                        Adicionar Novo Estoque &nbsp<em class="fa fa-plus"></em></a>
					<div class="tableFixHead">
					<table id="myTable" class="table table-hover table-bordered">
					    <thead>
					        <tr>
					            <th>Modelo</th>
					            <th>Preço</th>
					            <th>Opção</th>
					            <th>Quantidade</th>
					            <th>Loja</th>
					            <th style="width: 20%">Ações</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php foreach($estoques as $row){?>
					        <tr>
					            <td><?php echo $row['modelo_produto']?></td>
					            <td>R$ <?php echo $row['venda_produto']?></td>
					            <td><?php foreach($tipos as $row2) if($row['tipo_produto_id'] == $row2['id_tipo']) echo $row2['nome_tipo'];?></td>
					            <td><?php echo $row['estoque']?></td>
					            <td><?php foreach($lojas as $row2){
					                        if($row2['id_loja'] == $row['loja_id']){
					                            echo $row2['nome_loja'];
					                        }
					            }?></td>
					            <td style="max-width:70px; min-width: 150px">
					                <a style="margin-left:1px" class="btn btn-primary" href="<?php echo base_url('estoque/mostrarEstoque/') . $row['id_estoque'];?>"  class="edit"><em class="fa fa-eye"></em></a>&nbsp&nbsp&nbsp
						            <a style="margin-left:1px" class="btn btn-primary" href="<?php echo base_url('estoque/telaEdicaoEstoque/') . $row['id_estoque'];?>" class="edit"><em class="fa fa-pencil"></em></a>&nbsp&nbsp&nbsp
    								<a class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir" onclick="setaDadosModal('<?php echo $row['id_estoque'];?>')" class="trash"><em class="fa fa-trash"></em></a>
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
