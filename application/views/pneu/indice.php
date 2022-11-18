            <div class="container-fluid" style="height: 82vh">
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" style="text-align: center; align-items: center; padding-bottom: 15px">
                            <label style="float: right; text-align: center;"><h3><b>Cadastro</b></h3></label>
                            <a href="<?php echo base_url('pneus');?>" style="max-width: 150px;" type="button" class="btn btn-warning"><i class="fa fa-times-circle fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card" style="text-align: center; align-items: center; padding-bottom: 15px">
                            <label style="float: right; text-align: center;"><h3><b>Vinculação</b></h3></label>
                            <a href="<?php echo base_url('vinculapneus');?>" ><button style="max-width: 150px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#vinculaModal"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

<div class="modal fade" id="trocaModal" tabindex="-1" role="dialog" aria-labelledby="trocaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('trocarpneus');?>" method="post" >
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Selecione a frota</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select  style="width: 100%!important" class="selectfrota" name="frota" style="width: 50%">>
                        <?php foreach($frota as $ftr){?>
                            <option value="<?php echo $ftr['frota_id']?>"><?php echo $ftr['frota_codigo']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>            

<div class="modal fade" id="cambagemModal" tabindex="-1" role="dialog" aria-labelledby="cambagemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('rodiziopneus');?>" method="post" >
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Selecione a frota</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <select  style="width: 100%!important" class="selectpneu" name="frota" style="width: 50%">>
                        <?php foreach($frota as $ftr){?>
                            <option value="<?php echo $ftr['frota_id']?>"><?php echo $ftr['frota_codigo']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>            

<div class="modal fade" id="movimentoModal" tabindex="-1" role="dialog" aria-labelledby="movimentoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo base_url('pneus/movimento');?>" method="post" >
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Atualização de Pneus</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Selecione o Pneu: </label><br>
                            <select class="selectmov" name="pneu" id="pneu" style="width: 100%!important">
                                <?php foreach($pneu as $pnu){?>
                                    <option value="<?php echo $pnu['pneus_individual_id']?>"><?php echo $pnu['pneus_individual_marcacao']." - ".$pnu['pneus_individual_matricula']." - ".$pnu['pneus_individual_dot'];?></option>
                                <?php }?>
                            </select>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Ocorrência: </label><br>
                            <select onchange="selected(this.value)" class="selectmov" name="ocorr" id="ocorr"  style="width: 100%!important">
                                <?php foreach($situacao as $stc){?>
                                    <option value="<?php echo $stc['situacaopneus_id']?>"><?php echo $stc['situacaopneus_nome'];?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Data:</label><br>
                            <input type="date" class="form-control" name="data" id="data" value="<?php echo date('Y-m-d');?>">
                        </div>
                        
                        <div class="col-md-12 form-group" style="display: none" id="subs">
                            <label>Pneu Substituto: </label>
                            <select class="selectpneu" name="pneusubs" id="pneusubs"  style="width: 100%!important">
                                <option value="0">Selecione o pneu substituto</option>
                                <?php foreach($pneulivre as $pnl){?>
                                    <option value="<?php echo $pnl['pneus_individual_id']?>"><?php echo $pnl['pneus_individual_marcacao']." - ".$pnl['pneus_individual_matricula']." - ".$pnl['pneus_individual_dot'];?></option>
                                <?php }?>
                            </select>
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <label>Observações</label>
                            <input type="text" maxlength="200" name="obs" id="obs" placeholder="Insira detalhes aqui!" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.selectfrota').select2({theme: "bootstrap", dropdownParent: $('#trocaModal')});
        $('.selectfrota2').select2({theme: "bootstrap", dropdownParent: $('#vinculaModal')});
        $('.selectpneu').select2({theme: "bootstrap", dropdownParent: $('#cambagemModal')});
        $('.selectmov').select2({theme: "bootstrap", dropdownParent: $('#movimentoModal')});
    });
</script>
<script>
    function selected(value){
	        if(value != 5){
                document.getElementById('subs').style.display = 'none';
                console.log(value);
            }else{
                document.getElementById('subs').style.display = 'block';
                console.log('block: '+value);
            }
}
</script>