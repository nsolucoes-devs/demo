<style>
    .tableFixHead          { overflow-y: auto; height: 600px; }
    .tableFixHead thead th { position: sticky; top: 0; }
    
    /* Just common table stuff. Really. */
    table  { border-collapse: collapse; width: 100%; }
    th, td { padding: 8px 16px; }
    th     { background:#eee; }
</style>

<br>
<section id="main-content">
    <section class="wrapper">
        
        <div class="row">
            <div class="col-md-6">
                <h3>Manutenção > Listagem de Serviços</h3>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <a data-toggle="modal" data-target="#modalCadastro" class="btn btn-primary" style="margin-top: 20px; border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">Novo Serviço</a>
            </div>
        </div>
        
        <hr style="height: 1px; background-color: #ccc; border: none;">
        
        <div class="row" style="margin-left: 0px; margin-right: 0px">
            <div class="col-md-12" style="background-color: white;">
                <br>
                
                <?php if($erro == 1){ ?>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <h4 class="text-danger">Erro: A senha informada estava incorreta, por favor tente novamente!</h4>
                    </div>
                </div>
                <?php } ?>
                
                <div class="tableFixHead">
                    <table id="myTableServ" class="table table-hover table-bordered">
                          <thead>
                                <tr>
                                    <th>Serviço</th>
                                    <th style="width: 180px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($servicos as $s){ 
			                        if($this->session->userdata('c_a') != 1 && $s['servico_ativo_id'] != 2){    
                                ?>
                                <tr>
                                    <td><?php echo $s['servico_nome'] ?></td>
                                    <td>
                                        <?php if($this->session->userdata('c_v') == 1){ ?>
    			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $s['servico_id'] ?>)" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
    			                        &nbsp&nbsp
    			                        <?php } ?>
    			                        <?php if($this->session->userdata('c_e') == 1){ ?>
    			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $s['servico_id'] ?>)" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
    			                        &nbsp&nbsp
    			                        <?php } ?>
    			                        <?php if($this->session->userdata('c_d') == 1){ ?>
    			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $s['servico_id'] ?>')"><i class="fas fa-trash"></i></i></a>
    			                        <?php } ?>
                                    </td>
                                </tr>
                                <?php }else if($this->session->userdata('c_a') == 1){ ?>
                                <tr <?php if($s['servico_ativo_id'] == 2){echo "style='background-color: #eaeaea'";} ?>>
                                    <td><?php echo $s['servico_nome'] ?></td>
                                    <td>
                                        <?php if($this->session->userdata('c_v') == 1){ ?>
    			                        <a style="font-size: 12px" data-toggle="modal" data-target="#modalVer" onclick="ver(<?php echo $s['servico_id'] ?>)" class="btn btn-primary btn-modal-toggle"><i class="fas fa-eye"></i></a>
    			                        &nbsp&nbsp
    			                        <?php } ?>
    			                        <?php if($this->session->userdata('c_e') == 1){ ?>
    			                        <a data-toggle="modal" data-target="#modalEditar" onclick="editar(<?php echo $s['servico_id'] ?>)" class="btn btn-primary" style="font-size: 12px"><i class="fas fa-pencil-alt"></i></a>
    			                        &nbsp&nbsp
    			                        <?php } ?>
    			                        <?php if($this->session->userdata('c_d') == 1){ ?>
    			                        <a data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" style="font-size: 12px" onclick="excluir('<?php echo $s['servico_id'] ?>')"><i class="fas fa-trash"></i></i></a>
    			                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Serviço</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                    </table>
                </div>
                
                <br> 
            </div>
        </div>
        <br><br>
    </section>
</section>

<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalCadastroLabel">Cadastro de Serviço</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <form method="post" action="<?php echo base_url('manutencao/novoServ') ?>">
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-md-8 form-group">
                            <label>Nome do Serviço</label><br>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Serviço" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Custo</label><br>
                            <input type="text" class="form-control" id="custo" name="custo" placeholder="0,00" required>
                        </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Peça</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" id="peca" onchange="getProd($(this).val())">
                                <option value="0" disabled selected>-- Selecione uma Peça --</option>
                                <?php foreach($produtos as $p){ ?>
                                <option value="<?php echo $p['produto_id'] ?>"><?php echo $p['produto_nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Quantidade</label><br>
                            <input type="text" class="form-control" id="qtde" placeholder="0" disabled>
                        </div>
                        <div class="col-md-3 form-group" style="margin-top: 23px">
                            <button disabled type="button" id="addpeca" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white"><i class="fas fa-plus"></i></button>
                            &nbsp;&nbsp;
                            <button disabled type="button" id="rmvpeca" class="btn btn-danger"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    
                    <br>
                    <input type="hidden" name="lista" id="lista" onchage="">
                    
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <table class="table table-hover table-bordered myTableSemRecurso">
                                <thead>
                                    <tr>
                                        <th style="width: 80%">Peça</th>
                                        <th style="width: 20%">Qtde</th>
                                    </tr>
                                </thead>
                                <tbody id="bodylista"></tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modalVer" tabindex="-1" role="dialog" aria-labelledby="modalVerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalVerLabel">Visualizar Serviço</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7 form-group">
                        <label>Nome do Serviço</label><br>
                        <label id="nome_v" style="font-size: 16px; color: black"></label>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>Status</label><br>
                        <label id="ativo" style="font-size: 16px; color: black"></label>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Custo</label><br>
                        <label style="font-size: 16px; color: black">R$&nbsp;</label><label id="custo_v" style="font-size: 16px; color: black"></label>
                    </div>
                </div>
                
                <br>
                
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Peças</label><br>
                        <label id="lista_v" style="font-size: 16px; color: black; width: 100%"></label>
                    </div>
                </div>
            </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalEditarLabel">Edição de Serviço</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="btn_cancel()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <form method="post" action="<?php echo base_url('manutencao/editarServ') ?>">
                <input type="hidden" name="id_e" id="id_e">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7 form-group">
                            <label>Nome do Serviço</label><br>
                            <input type="text" class="form-control" id="nome_e" name="nome_e" placeholder="Nome do Serviço" required>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Status</label>
                            <select class="js-example-basic-multiple x" style="width:100%;" name="ativo_e" id="ativo_e" required>
                                
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Custo</label><br>
                            <input type="text" class="form-control" id="custo_e" name="custo_e" placeholder="0,00" required>
                        </div>
                    </div>
                    
                    <br>
                    
                    <div class="row">
                        <div class="col-md-7 form-group">
                            <label>Peça</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" id="peca_e" onchange="getProdE($(this).val())">
                                <option value="0" disabled selected>-- Selecione uma Peça --</option>
                                <?php foreach($produtos as $p){ ?>
                                <option value="<?php echo $p['produto_id'] ?>"><?php echo $p['produto_nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Quantidade</label><br>
                            <input type="text" class="form-control" id="qtde_e" placeholder="0" disabled>
                        </div>
                        <div class="col-md-2 form-group" style="margin-top: 23px">
                            <button disabled type="button" id="addpeca_e" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white"><i class="fas fa-plus"></i></button>
                            <!--&nbsp;&nbsp;
                            <button disabled type="button" id="rmvpeca_e" class="btn btn-danger"><i class="fas fa-minus"></i></button>-->
                        </div>
                    </div>
                    
                    <br>
                    <input type="hidden" name="lista_e" id="lista_e">

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <table class="table table-hover table-bordered myTableSemRecurso">
                                <thead>
                                    <tr>
                                        <th style="width: 70%">Peça</th>
                                        <th style="width: 20%">Qtde</th>
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>
                                <tbody id="bodylista_e"></tbody>
                            </table>
                        </div>
                    </div>
                
                </div>
                
                <br>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="float: left" onclick="btn_cancel()">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_att" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">Atualizar Lista</button>
                    &nbsp;&nbsp;
                    <button type="submit" class="btn btn-primary" id="btn_sub" disabled>Salvar</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="modalExcluirTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalCadastroLabel">Excluir Serviço</h4>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="modal-body">
                <h4>Deseja realmente excluir p serviço?</h4>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white; float: left" onclick="senha()">&nbsp&nbspSim&nbsp&nbsp</button>
                <button class="btn btn-danger" data-dismiss="modal">&nbsp&nbspNão&nbsp&nbsp</button>
                <br><br>
                <div class="row" id="formsenha" style="display: none">
                    <div class="col-md-12 text-center">
                        <form action="<?php echo base_url('manutencao/apagarServ') ?>" method="post">
                            <input type="hidden" name="serv_id" id="serv_id">
                            <label style="font-size: 16px">Confirme a senha</label><br>
                            <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite a Senha" required style="width: 50%; margin-left: 25%"><br>
                            <button type="submit" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    $('#btn_att').on('click', function(){
        $('#btn_sub').prop('disabled', false);
    });
    
    function btn_cancel(){
        $('#btn_sub').prop('disabled', true);
        $('#peca_e').val(0);
        $('#peca_e').trigger('change');
        $('#qtde_e').val('');
        $('#qtde_e').prop('disabled', true);
        $('#addpeca_e').prop('disabled', true);
        $('#rmvpeca_e').prop('disabled', true);
    }
</script>

<script>
    var idprod;
    var qtdeprod;
    var nomeprod;
    var qtdemax;
    var contador = 0;

    function getProd(id){
        if(id != null){
            dados = new FormData();
            dados.append('id', id);
            $.ajax({
                url: '<?php echo base_url('manutencao/getProd'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                },
                success: function(data) {
                    if(data != "null"){
                        $('#qtde').prop('disabled', false);
                        var spl = data.split('|');
                        
                        idprod = spl[0];
                        nomeprod = spl[1];
                        qtdemax = spl[3];
                    }else{
                        alert("Erro na banco");
                    }
                },
            });
        }
    }
    
    $('#qtde').keyup(function() {
        var val = $('#qtde').val();
        if(val > 0){
            qtdeprod = val;
            $('#addpeca').prop('disabled', false);
        }
    });
    
    $('#addpeca').click(function() {
        $('#rmvpeca').prop('disabled', false);
        var licheck = $('#lista').val();
        var liex = licheck.split('|');
        var find = licheck.indexOf("|");
        var lico = liex.length;
        var aux = 0;
        
        if(licheck != ""){
            if(find != -1){
                for(var i = 0; i < lico; i++){
                    var elex = liex[i].split('{');
                    if(idprod == parseInt(elex[0])){
                        elex[1] = parseInt(elex[1]) + parseInt(qtdeprod);
                        $('#q'+i).html(elex[1]);
                        aux++;
                    }
                    if(i == 0){
                        licheck = elex[0] + "{" + elex[1];
                    }else{
                        licheck += "|" + elex[0] + "{" + elex[1];
                    }
                }
                if(aux == 0){
                    var blista = $('#bodylista').html();
                    blista += '<tr id="tr'+contador+'"><td id="n'+contador+'">'+nomeprod+'</td><td id="q'+contador+'">'+qtdeprod+'</td></tr>';
                    $('#bodylista').html(blista);
                    contador++;
                    licheck += "|"+idprod+"{"+qtdeprod;
                }
            }else{
                var elex = liex[0].split('{');
                if(idprod == parseInt(elex[0])){
                    elex[1] = parseInt(elex[1]) + parseInt(qtdeprod);
                    licheck = elex[0] + "{" + elex[1];
                    var n = contador - 1;
                    $('#q'+n).html(elex[1]);
                }else{
                    licheck += "|"+idprod+"{"+qtdeprod;
                    var blista = $('#bodylista').html();
                    blista += '<tr id="tr'+contador+'"><td id="n'+contador+'">'+nomeprod+'</td><td id="q'+contador+'">'+qtdeprod+'</td></tr>';
                    $('#bodylista').html(blista);
                    contador++;
                }
                
            }
            $('#lista').val(licheck);
        }else{
            var blista = $('#bodylista').html();
            var trash = '<tr class="odd"><td valign="top" colspan="2" class="dataTables_empty"> </td></tr>';
            var clear = blista.split(trash);
            clear[0] += '<tr id="tr'+contador+'"><td id="n'+contador+'">'+nomeprod+'</td><td id="q'+contador+'">'+qtdeprod+'</td></tr>';
            $('#bodylista').html(clear[0]);
            
            var lista = $('#lista').val();
            if(lista == ""){
                lista = idprod+"{"+qtdeprod;
            }else{
                lista += "|"+idprod+"{"+qtdeprod;
            }
            $('#lista').val(lista);
            qtdemax = parseInt(qtdemax) - parseInt(qtdeprod);
            contador++;
        }
    });
    
    $('#rmvpeca').click(function() {
        var lista = $('#lista').val();
        if(lista == ""){
            alert('Não há elementos para remover!');
        }else{
            var ex = lista.split('|');
            var tam = ex.length - 1;
            var newlista = "";
            for(var i = 0; i < tam; i++){
                if(i == 0){
                    newlista = ex[i];
                }else{
                    newlista += "|"+ex[i];
                }
            }
            $('#lista').val(newlista);
            
            contador--;
            var blista = $('#bodylista').html();
            var trash = 'tr'+contador;
            var clear = blista.split(trash);
            $('#bodylista').html(clear[0]);
            
            var ex2 = ex[tam].split('{');
            qtdemax = parseInt(qtdemax) + parseInt(ex2[1]);
        }
    });
</script>

<script>
    function ver(id){
        dados = new FormData();
        dados.append('id', id);
        $.ajax({
            url: '<?php echo base_url('manutencao/getServ'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            success: function(data) {
                if(data != "null"){
                    var spl = data.split('|');
                    $('#nome_v').html(spl[0]);
                    $('#ativo').html(spl[1]);
                    $('#lista_v').html(spl[2]);
                    $('#custo_v').html(spl[3]);
                }else{
                    alert("Erro na banco");
                }
            },
        });
    }
</script>

<script>
    var idprod_e;
    var qtdeprod_e;
    var nomeprod_e;
    var qtdemax_e;
    var contador_e;

    function editar(id){
        dados = new FormData();
        dados.append('id', id);
        $.ajax({
            url: '<?php echo base_url('manutencao/getServEdita'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            success: function(data) {
                if(data != "null"){
                    var spl = data.split('##');
                    $('#id_e').val(spl[0]);
                    $('#nome_e').val(spl[1]);
                    $('#ativo_e').html(spl[2]);
                    $('#lista_e').val(spl[3]);
                    $('#bodylista_e').html(spl[4]);
                    $('#custo_e').val(spl[5]);
                    contador_e = parseInt(spl[6]);
                    $('#rmvpeca_e').prop('disabled', false);
                }else{
                    alert("Erro na banco");
                }
            },
        });
    }
    
    function alteraQtd(value, id, prod){
        if(value == 0 || value == ""){
            var lista = $('#lista_e').val();
            var find = lista.indexOf("|");
            var body = $('#bodylista_e').html();
            var pos = id.substr(3);
            var nova = "";
            var newb = "";
            alert(pos);
    
            if(find != -1){
                var el = lista.split('|');
                var con = el.length;
                for(var i = 0; i < con; i++){
                    var ex = el[i].split('{');
                    if(ex[0] != prod){
                        var trash = '<tr id="tr'+pos+'">';
                        var clear = body.split(trash);
                        var pos1 = parseInt(pos) + 1;
                        var next = '<tr id="tr'+pos1+'">';
                        var check = body.indexOf(next);
                        if(clear.length > 1 && check != -1){
                            var prox = clear[1].split(next);
                            
                            body = clear[0]+next+prox[1];
                        }else{
                            body = clear[0];
                        }
                        if(i == 0){
                            nova = ex[0]+"{"+ex[1];
                        }else{
                            nova += "|"+ex[0]+"{"+ex[1];
                        }
                    }
                }
                var pos1 = parseInt(pos) + 1;
                $('#bodylista_e').html(body);
                $('#tr'+pos1).attr('id', 'tr'+pos);
                $('#qtd'+pos1).attr('id', 'qtd'+pos).attr('name', 'qtd'+pos);
                contador_e--;
                
                var findpipe = nova.indexOf("|");
                if(findpipe == 0){
                    nova = nova.substr(1);
                }
                $('#lista_e').val(nova);
            }else{
                $('#bodylista_e').html('');
                $('#lista_e').val('');
            }
        }else{
            $('#'+id).attr("value", value);
            var lista = $('#lista_e').val();
            var find = lista.indexOf("|");
            var nova = "";
            
            if(find != -1){
                var el = lista.split('|');
                var con = el.length;
                for(var i = 0; i < con; i++){
                    var ex = el[i].split('{');
                    if(ex[0] == prod){
                        ex[1] = value;
                    }
                    if(i == 0){
                        nova = ex[0]+"{"+ex[1];
                    }else{
                        nova += "|"+ex[0]+"{"+ex[1];
                    }
                    $('#lista_e').val(nova);
                }
            }else{
                var ex = lista.split('{');
                nova = ex[0]+'{'+value;
                $('#lista_e').val(nova);
            }
        }
    }

    function getProdE(id){
        if(id != null){
            dados = new FormData();
            dados.append('id', id);
            $.ajax({
                url: '<?php echo base_url('manutencao/getProd'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                },
                success: function(data) {
                    if(data != "null"){
                        $('#qtde_e').prop('disabled', false);
                        var spl = data.split('|');
                        
                        idprod_e = spl[0];
                        nomeprod_e = spl[1];
                        qtdemax_e = spl[3];
                    }else{
                        alert("Erro na banco");
                    }
                },
            });
        }
    }
    
    $('#qtde_e').keyup(function() {
        var val = $('#qtde_e').val();
        if(val > 0){
            qtdeprod_e = val;
            $('#addpeca_e').prop('disabled', false);
        }
    });
    
    $('#addpeca_e').click(function() {
        var licheck = $('#lista_e').val();
        var liex = licheck.split('|');
        var find = licheck.indexOf("|");
        var lico = liex.length;
        var aux = 0;
        
        if(licheck != ""){
            if(find != -1){
                for(var i = 0; i < lico; i++){
                    var elex = liex[i].split('{');
                    if(idprod_e == parseInt(elex[0])){
                        elex[1] = parseInt(elex[1]) + parseInt(qtdeprod_e);
                        $('#qtd'+i).attr('value', elex[1]);
                        //$('#qtd'+i).val(elex[1]);
                        aux++;
                    }
                    if(i == 0){
                        licheck = elex[0] + "{" + elex[1];
                    }else{
                        licheck += "|" + elex[0] + "{" + elex[1];
                    }
                }
                if(aux == 0){
                    var blista = $('#bodylista_e').html();
                    blista += '<tr id="tr'+contador_e+'"><td style="width: 70%">'+nomeprod_e+'</td><td style="width: 20%"><input type="number" onfocusout="alteraQtd($(this).val(), $(this).attr(\'id\'), '+qtdeprod_e+')" name="qtd'+contador_e+'" id="qtd'+contador_e+'" value="'+qtdeprod_e+'"></td><td style="width: 10%"><button type="button" class="btn btn-danger" onclick="rmvpeca_e(\'tr'+contador_e+'\', '+idprod_e+')"><i class="fas fa-minus"></i></button></td></tr>';
                    $('#bodylista_e').html(blista);
                    contador_e++;
                    licheck += "|"+idprod_e+"{"+qtdeprod_e;
                }
            }else{
                var elex = liex[0].split('{');
                if(idprod_e == parseInt(elex[0])){
                    elex[1] = parseInt(elex[1]) + parseInt(qtdeprod_e);
                    licheck = elex[0] + "{" + elex[1];
                    var n = contador_e - 1;
                    //$('#qtd'+n).val(elex[1]);
                    $('#qtd'+n).attr('value', elex[1]);
                }else{
                    licheck += "|"+idprod_e+"{"+qtdeprod_e;
                    var blista = $('#bodylista_e').html();
                    
                    blista += '<tr id="tr'+contador_e+'"><td style="width: 70%">'+nomeprod_e+'</td><td style="width: 20%"><input type="number" onfocusout="alteraQtd($(this).val(), $(this).attr(\'id\'), '+qtdeprod_e+')" name="qtd'+contador_e+'" id="qtd'+contador_e+'" value="'+qtdeprod_e+'"></td><td style="width: 10%"><button type="button" class="btn btn-danger" onclick="rmvpeca_e(\'tr'+contador_e+'\', '+idprod_e+')"><i class="fas fa-minus"></i></button></td></tr>';
                    $('#bodylista_e').html(blista);
                    contador_e++;
                }
            }
            $('#lista_e').val(licheck);
        }else{
            var blista = $('#bodylista_e').html();
            var trash = '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty"> </td></tr>';
            var clear = blista.split(trash);
            clear[0] += '<tr id="tr'+contador_e+'"><td style="width: 70%">'+nomeprod_e+'</td><td style="width: 20%"><input type="number" onfocusout="alteraQtd($(this).val(), $(this).attr(\'id\'), '+qtdeprod_e+')" name="qtd'+contador_e+'" id="qtd'+contador_e+'" value="'+qtdeprod_e+'"></td><td style="width: 10%"><button type="button" class="btn btn-danger" onclick="rmvpeca_e(\'tr'+contador_e+'\', '+idprod_e+')"><i class="fas fa-minus"></i></button></td></tr>';
            $('#bodylista_e').html(clear[0]);
            
            var lista = $('#lista_e').val();
            if(lista == ""){
                lista = idprod_e+"{"+qtdeprod_e;
            }else{
                lista += "|"+idprod_e+"{"+qtdeprod_e;
            }
            $('#lista_e').val(lista);
            contador_e++;
        }
    });
    
    function rmvpeca_e(id, prod){
        var lista = $('#lista_e').val();
        var find = lista.indexOf("|");
        var body = $('#bodylista_e').html();
        var pos = id.substr(2);
        var nova = "";
        var newb = "";

        if(find != -1){
            var el = lista.split('|');
            var con = el.length;
            for(var i = 0; i < con; i++){
                var ex = el[i].split('{');
                if(ex[0] != prod){
                    var trash = '<tr id="tr'+pos+'">';
                    var clear = body.split(trash);
                    var pos1 = parseInt(pos) + 1;
                    var next = '<tr id="tr'+pos1+'">';
                    var check = body.indexOf(next);
                    if(clear.length > 1 && check != -1){
                        var prox = clear[1].split(next);
                        
                        body = clear[0]+next+prox[1];
                    }else{
                        body = clear[0];
                    }
                    if(i == 0){
                        nova = ex[0]+"{"+ex[1];
                    }else{
                        nova += "|"+ex[0]+"{"+ex[1];
                    }
                }
            }
            var pos1 = parseInt(pos) + 1;
            $('#bodylista_e').html(body);
            $('#tr'+pos1).attr('id', 'tr'+pos);
            $('#qtd'+pos1).attr('id', 'qtd'+pos).attr('name', 'qtd'+pos);
            contador_e--;
            
            var findpipe = nova.indexOf("|");
            if(findpipe == 0){
                nova = nova.substr(1);
            }
            $('#lista_e').val(nova);
        }else{
            $('#bodylista_e').html('');
            $('#lista_e').val('');
        }
    }
    
    /*$('#rmvpeca_e').click(function() {
        var lista = $('#lista_e').val();
        if(lista == ""){
            alert('Não há elementos para remover!');
        }else{
            var ex = lista.split('|');
            var tam = ex.length - 1;
            var newlista = "";
            for(var i = 0; i < tam; i++){
                if(i == 0){
                    newlista = ex[i];
                }else{
                    newlista += "|"+ex[i];
                }
            }
            $('#lista_e').val(newlista);
            
            contador_e--;
            var blista = $('#bodylista_e').html();
            var trash = 'tr'+contador;
            var clear = blista.split(trash);
            $('#bodylista_e').html(clear[0]);
            
            var ex2 = ex[tam].split('{');
            qtdemax_e = parseInt(qtdemax_e) + parseInt(ex2[1]);
        }
    });*/
</script>

<script>
    function excluir(id){
        document.getElementById('serv_id').value = id;
    }
    function senha(){
        document.getElementById('formsenha').style.display = "block";
    }
</script>

<script>
    $(document).ready(function(){
        $('#custo').mask("#.##0,00", {reverse: true});
        $('#custo_e').mask("#.##0,00", {reverse: true});
        
        $('#myTableServ').DataTable( {
            "order": [[ 0, "asc" ]],
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado- refaça sua busca",
                "info": "Mostrando _PAGE_ de _PAGES_",
                "infoEmpty": "Sem registros disponíves",
                "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                "sSearch":       "Procurar:",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                }
            },
            "columns": [
                {"Serviço": "first", "orderable": true},
                {"Ação": "second", "orderable": false},
            ],
            initComplete: function () {
                this.api().columns([0]).every( function () {
                    var column = this;
                    var select = $('<select class="js-example-basic-multiple" style="width: 100%"><option value="">Todos</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                             column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                                } );
       
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        } );
    });
</script>