
<section id="main-content">
    
    <section class="wrapper">
        
        <div class="row">
            <div class="col-md-12">
                <h3>Manutenção > Cadastro</h3>
            </div>
        </div>
        
        <hr style="height: 1px; background-color: #ccc; border: none;">
        
        <div class="row" style="margin-left: 0px; margin-right: 0px">
            <form action="<?php echo base_url('manutencao/insertManutencao') ?>" method="post" id="myForm">
                
                <div class="col-md-12" style="margin-bottom: 70px">
                
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="background-color: #eaeaea">
                        <li class="nav-item">
                            <a class="nav-link" style="background-color: white; cursor: pointer; font-size: 18px" id="aFrota" onclick="change(1)">Dados do Veículo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="background-color: #f0f0f0; cursor: pointer; font-size: 18px" id="aServs" onclick="change(2)">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="background-color: #f0f0f0; cursor: pointer; font-size: 18px" id="aPecas" onclick="change(3)">Peças</a>
                        </li>
                    </ul>
                    
                    <div class="row" id="divFrota" style="display: block;">
                        <div class="col-md-12" style="background-color:white; border-radius: 5px">
                            <br><br>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Tipo de Manutenção</label><br>
                                    <select class="select2-search" style="width: 100%" id="tipo" name="tipo" required onchange="defineTipo($(this).val())">
                                        <option disabled selected value="0">-- Selecione o Serviço --</option>
                                        <option value="1">Corretiva</option>
                                        <option value="2">Preventiva</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group" id="divDe">
                                    <label>De</label><br>
                                    <input type="datetime-local" class="form-control" id="de" name="de" placeholder="00/00/0000" required>
                                </div>
                                <div class="col-md-3 form-group" id="divAte">
                                    <label>Até</label><br>
                                    <input type="datetime-local" class="form-control" id="ate" name="ate" placeholder="00/00/0000" required>
                                </div>
                                <div class="col-md-3 form-group" id="divPrev" style="display: none">
                                    <label>Data de Agendamento</label><br>
                                    <input type="datetime-local" class="form-control" id="dt_agen" name="dt_agen" placeholder="00/00/0000">
                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="row x">
                                <div class="col-md-3 form-group">
                                    <label>Frota</label><br>
                                    <select class="select2-search" style="width: 100%" id="frota" name="frota" required onchange="buscaFrota($(this).val())">
                                        <option disabled selected value=0"">-- Selecione uma Frota --</option>
                                        <?php foreach($frotas as $f){ ?>
                                        <option value="<?php echo $f['frota_id'] ?>"><?php echo $f['frota_codigo'] . " | " . $f['frota_placa'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>Placa</label><br>
                                    <input type="text" class="form-control" id="p_input" disabled placeholder="ABC0000">
                                    <input type="hidden" id="placa" name="placa" required>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>KM Veículo</label><br>
                                    <input type="text" class="form-control" id="km" name="km" placeholder="0" required>
                                </div>
                                <div class="col-md-5 form-group">
                                    <label>Título da Manutenção</label><br>
                                    <input type="text" class="form-control" id="resumo" name="resumo" placeholder="Título da Manutenção" required>
                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="row x">
                                <div id="divDes" class="col-md-6 form-group">
                                    <label>Descrição</label><br>
                                    <textarea class="form-control" name="desc" id="desc" rows="9" style="resize: none" required></textarea>
                                </div>
                                <div id="divMec" class="col-md-6 form-group">
                                    <label>Análise do Mecânico</label><br>
                                    <textarea class="form-control" name="analise" id="analise" rows="9" style="resize: none"></textarea>
                                </div>
                            </div>
                            
                            <br><br><br>
                            
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('manutencao/listagem') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <a class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white" onclick="valida(2)">&nbsp&nbspContinuar&nbsp&nbsp</a>
                                </div>
                            </div>
                            
                            <br><br>
                        </div>
                    </div>
                    
                    <div class="row" id="divServs" style="display: none;">
                        <div class="col-md-12" style="background-color:white; border-radius: 5px">
                            <br><br>
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <h4>Lista de Serviços</h4>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a id="btnAddServico" data-toggle="modal" data-target="#modalCadastro" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">Adicionar Serviço</a>
                                    <a id="btnAddServicoPrev" data-toggle="modal" data-target="#modalCadastroPrev" class="btn btn-primary" style="display: none; border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">Adicionar Serviço</a>
                                </div>
                            </div>
                            
                            <br>
                            <input type="hidden" name="services" id="services">
                            <input type="hidden" id="position" value="0">
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-bordered myTableSemRecurso">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th>Prestador</th>
                                                <th>Qtde. Peças</th>
                                                <th>Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listaServices">
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <br><br>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('manutencao/listagem') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <a class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white" onclick="valida(3)">&nbsp&nbspContinuar&nbsp&nbsp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" id="divPecas" style="display: none;">
                        <div class="col-md-12" style="background-color:white; border-radius: 5px">
                            <br><br>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Lista de Peças por Serviço</h4>
                                </div>
                            </div>
                            
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-hover table-bordered myTableSemRecurso">
                                        <thead>
                                            <tr>
                                                <th>Serviço</th>
                                                <th>Peças</th>
                                            </tr>
                                        </thead>
                                        <tbody id="listaPecasServico">
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <br><br>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('manutencao/listagem') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                                    &nbsp&nbsp&nbsp&nbsp
                                    <button type="submit" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">&nbsp&nbspSalvar e Voltar&nbsp&nbsp</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </section>
</section>

<div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalCadastroLabel">Adicionar Serviço</h4>
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
                    <div class="col-md-6 form-group">
                        <label>Serviço</label><br>
                        <select class="js-example-basic-multiple" style="width: 100%" id="serv" onchange="preencheLista($(this).val())">
                            <option value="0" disabled selected>-- Selecione um Serviço --</option>
                            <?php foreach($servicos as $serv){ ?>
                            <option value="<?php echo $serv['servico_id'] ?>"><?php echo $serv['servico_nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Prestador</label><br>
                        <input type="text" class="form-control" id="nome_prestador" placeholder="Prestador">
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
                <input type="hidden" name="lista" id="lista">
                
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
                <button type="button" id="cancelLista" class="btn btn-danger" data-dismiss="modal" style="float: left">Cancelar</button>
                <button type="button" id='addLista' class="btn btn-primary">Adicionar</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="modalCadastroPrev" tabindex="-1" role="dialog" aria-labelledby="modalCadastroPrevLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">
                        <h4 class="modal-title" id="modalCadastroPrevLabel">Adicionar Serviço</h4>
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
                    <div class="col-md-6 form-group">
                        <label>Serviço</label><br>
                        <select class="js-example-basic-multiple" style="width: 100%" id="servPrev">
                            <option value="0" disabled selected>-- Selecione um Serviço --</option>
                            <?php foreach($servicos as $serv){ ?>
                            <option value="<?php echo $serv['servico_id'] ?>"><?php echo $serv['servico_nome'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Prestador</label><br>
                        <input type="text" class="form-control" id="nome_prestadorPrev" placeholder="Prestador">
                    </div>
                </div>
                
            </div>
        
            <div class="modal-footer">
                <button type="button" id="cancelListaPrev" class="btn btn-danger" data-dismiss="modal" style="float: left">Cancelar</button>
                <button type="button" id='addListaPrev' class="btn btn-primary">Adicionar</button>
            </div>

        </div>
    </div>
</div>

<!-- document.ready() -->
<script>
var km;
    $(document).ready(function(){
        $('.select2-aux').select2({theme: "bootstrap"});
        $('#km').mask('0000000000', {'translation': {0: {pattern: /[0-9*]/}}});
        $('#qtde').mask('0000000000', {'translation': {0: {pattern: /[0-9*]/}}});
        
        $('#divDes').css('display', 'none');
        $('#divMec').css('display', 'none');
    });
</script>

<script>
    function valida(value) {
        if(value == 2){
            var tipo = document.getElementById("tipo").value;
            var de = document.getElementById("de").value;
            var ate = document.getElementById("ate").value;
            var dt_agen = document.getElementById("dt_agen").value;
            var frota = document.getElementById("frota").value;
            var p_input = document.getElementById("p_input").value;
            var km = document.getElementById("km").value;
            var resumo = document.getElementById("resumo").value;
            var desc = document.getElementById("desc").value;
            var analise = document.getElementById("analise").value;
            if(tipo == 1){
                if(tipo == '' || de == '' || ate == '' || frota == '' || p_input == '' || km == '' || resumo == '' || desc == '' || analise == '') {
                    alert("Preencha todos os campos!");
                }
                else {
                    change(value);
                }
            }else if(tipo == 2){
                if(tipo == '' || dt_agen == '' || frota == '' || p_input == '' || km == '' || resumo == '' || desc == '') {
                    alert("Preencha todos os campos!");
                    alert(dt_agen);
                }
                else {
                    change(value);
                }
            }
        }
        if(value == 3){
            var services = document.getElementById("analise").value;
            var position = document.getElementById("position").value;
            if(services == '' || position == '') {
                alert("Insira pelo menos um serviço!");
            }
            else {
                change(value);
            }   
        }
    }
</script>

<!-- change() // Função que muda as tabs -->
<script>
     function change(value){
        if(value == 1){
            $('#aFrota').css('background-color', 'white');
            $('#aServs').css('background-color', '#f0f0f0');
            $('#aPecas').css('background-color', '#f0f0f0');
            
            $('#divFrota').css('display', 'block');
            $('#divServs').css('display', 'none');
            $('#divPecas').css('display', 'none');
        }else if(value == 2){
            $('#aFrota').css('background-color', '#f0f0f0');
            $('#aServs').css('background-color', 'white');
            $('#aPecas').css('background-color', '#f0f0f0');
            
            $('#divFrota').css('display', 'none');
            $('#divServs').css('display', 'block');
            $('#divPecas').css('display', 'none');
        }else if(value == 3){
            $('#aFrota').css('background-color', '#f0f0f0');
            $('#aServs').css('background-color', '#f0f0f0');
            $('#aPecas').css('background-color', 'white');
            
            $('#divFrota').css('display', 'none');
            $('#divServs').css('display', 'none');
            $('#divPecas').css('display', 'block');
        }
    }
</script>

<!-- buscaFrota(placa) // Função que faz a consulta ajax para autopreenher os campos relacionados à frota -->
<script>
    function buscaFrota(id){
        dados = new FormData();
        dados.append('id', id);
        $.ajax({
            url: '<?php echo base_url('manutencao/getFrota'); ?>',
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
                    $('#p_input').val(spl[0]);
                    $('#placa').val(spl[0]);
                    $('#km').val(spl[1]);
                    km = parseInt(spl[1]);
                }else{
                    alert("Erro na banco");
                }
            },
        });
    }
</script>

<script>
    var idprod;
    var qtdeprod;
    var nomeprod;
    var qtdemax;
    var contador = 0;

    function preencheLista(id){
        if(id != 0){
            dados = new FormData();
            dados.append('id', id);
            $.ajax({
                url: '<?php echo base_url('manutencao/teste'); ?>',
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
                        $('#bodylista').html(spl[0]);
                        contador = spl[1];
                        $('#lista').val(spl[2]);
                    }else{
                        alert("Erro no banco");
                    }
                },
            });
        }
    }
    
    function alteraQtd(value, id){
        $('#'+id).attr("value", value);
    }
    
    function getProd(id){
        if(id != 0){
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
</script>

<!-- 
getProd(id)
$('#qtde').keyup()
$('#addpeca').click()
$('#rmvpeca').click()
Funções de dentro do modal de inserção de serviço na lista 
-->
<!--<script>

    var idprod;
    var qtdeprod;
    var nomeprod;
    var qtdemax;
    var contador = 0;

    function getProd(id){
        if(id != 0){
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
        if(parseInt(qtdeprod) > parseInt(qtdemax)){
            alert('Por favor informe outra quantidade, a quantidade máxima permitida é: '+qtdemax+'!');
        }else{
            $('#rmvpeca').prop('disabled', false);
            var blista = $('#bodylista').html();
            var trash = '<tr class="odd"><td valign="top" colspan="2" class="dataTables_empty"> </td></tr>';
            var clear = blista.split(trash);
            clear[0] += '<tr id="tr'+contador+'"><td>'+nomeprod+'</td><td>'+qtdeprod+'</td></tr>';
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
</script>-->

<!-- 
$('addLista').click()
$('cancelaLista').click()
Funções dos botões principais do modal (CORRETIVA)
-->
<!--<script>
    $('#addLista').click(function(){
        var serv = $('#serv').val();
        var nome = $('#nome_prestador').val();
        var pecas = $('#lista').val();
        var pos = $('#position').val();
        
        if(pecas == ""){
            pecas = "0{0";
        }
        
        if(serv == 0){
            alert('Por favor selecione um serviço!');
        }else if(nome == ""){
            alert('Por favor informe o prestador!');
        }else{
            var services = $('#services').val();
            if(services == ""){
                services = pos+"%%"+serv+";;"+nome+";;"+pecas;
            }else{
                services += "##"+pos+"%%"+serv+";;"+nome+";;"+pecas;
            }
            $('#services').val(services);
            $('#modalCadastro').modal('hide');
            
            dados = new FormData();
            dados.append('id', serv);
            $.ajax({
                url: '<?php echo base_url('manutencao/getServManu'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                },
                success: function(data) {
                    if(data != "null"){
                        var ls = $('#listaServices').html();
                        var trash = '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty"> </td></tr>';
                        var cl = ls.split(trash);
                        cl[0] += "<tr id='tr"+pos+"'><td style='width:40%'>"+data+"</td><td style='width:40%'>"+nome+"</td><td style='width:20%'>"+
                        "<button type='button' class='btn btn-primary' onclick='destacarPecas("+pos+")'><i class='far fa-eye'></i></button>&nbsp;&nbsp;&nbsp;"+
                        "<button type='button' class='btn btn-danger' onclick='rmvListaServices("+pos+")'><i class='fas fa-times'></i></button>"+
                        "</td></tr>";
                        $('#listaServices').html(cl[0]);
                        var expecas = pecas.split('|');
                        var index = expecas.length;
                        var strpecas = "";
                        var qtdpecas = "";
                        for(var j = 0; j < index; j++){
                            var prodex = expecas[j].split('{');
                            if(j == 0){
                                strpecas = prodex[0];
                                qtdpecas = prodex[1];
                            }else{
                                strpecas += "|"+prodex[0];
                                qtdpecas += "|"+prodex[1];
                            }
                        }
                        dados2 = new FormData();
                        dados2.append('ids', strpecas);
                        dados2.append('qtd', qtdpecas);
                        $.ajax({
                            url: '<?php echo base_url('manutencao/getProds'); ?>',
                            method: 'post',
                            data: dados2,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert(xhr.responseText);
                            },
                            success: function(data2) {
                                if(data2 != "null"){
                                    var lps = $('#listaPecasServico').html();
                                    var trashp = '<tr class="odd"><td valign="top" colspan="2" class="dataTables_empty"> </td></tr>';
                                    var cpl = lps.split(trashp);
                                    cpl[0] += "<tr id='pecas"+pos+"'><td style='width: 50%'>"+data+"</td><td style='width: 50%'>"+data2+"</td></tr>";
                                    $('#listaPecasServico').html(cpl[0]);
                                    pos++;
                                    $('#position').val(pos);
                                }else{
                                    alert("Erro na banco");
                                }
                            },
                        });
                    }else{
                        alert("Erro na banco");
                    }
                },
            });

            idprod = null;
            qtdeprod = null;
            nomeprod = null;
            qtdemax = null;
            contador = 0;
            
            $('#serv').val(0);
            $('#serv').trigger('change');
            $('#nome_prestador').val("");
            $('#lista').val("");
            $('#bodylista').html("");
            $('#peca').val(0);
            $('#peca').trigger('change');
            $('#qtde').prop('disabled', true);
            $('#qtde').val("");
            $('#addpeca').prop('disabled', true);
            $('#rmvpeca').prop('disabled', true);
        }
    });
    
    $('#cancelLista').click(function(){
        idprod = null;
        qtdeprod = null;
        nomeprod = null;
        qtdemax = null;
        contador = 0;
        
        $('#serv').val(0);
        $('#serv').trigger('change');
        $('#nome_prestador').val("");
        $('#lista').val("");
        $('#bodylista').html("");
        $('#peca').val(0);
        $('#peca').trigger('change');
        $('#qtde').prop('disabled', true);
        $('#qtde').val("");
        $('#addpeca').prop('disabled', true);
        $('#rmvpeca').prop('disabled', true);
    });
    
</script>-->

<!-- 
$('addListaPrev').click()
$('cancelaListaPrev').click()
Funções dos botões principais do modal (PREVENTIVA)
-->
<script>
    $('#addListaPrev').click(function(){
        var serv = $('#servPrev').val();
        var nome = $('#nome_prestadorPrev').val();
        var pos = $('#position').val();
        
        if(serv == 0){
            alert('Por favor selecione um serviço!');
        }else if(nome == ""){
            alert('Por favor informe o prestador!');
        }else{
            dados = new FormData();
            dados.append('id', serv);
            $.ajax({
                url: '<?php echo base_url('manutencao/getProdsServ'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                },
                success: function(pecas) {
                    if(pecas != "null"){
                        var services = $('#services').val();
                        if(services == ""){
                            services = pos+"%%"+serv+";;"+nome+";;"+pecas;
                        }else{
                            services += "##"+pos+"%%"+serv+";;"+nome+";;"+pecas;
                        }
                        $('#services').val(services);
                        $('#modalCadastroPrev').modal('hide');
                        
                        dados2 = new FormData();
                        dados2.append('id', serv);
                        $.ajax({
                            url: '<?php echo base_url('manutencao/getServManu'); ?>',
                            method: 'post',
                            data: dados2,
                            processData: false,
                            contentType: false,
                            error: function(xhr, status, error) {
                                alert(xhr.responseText);
                            },
                            success: function(data) {
                                if(data != "null"){
                                    var ls = $('#listaServices').html();
                                    var trash = '<tr class="odd"><td valign="top" colspan="3" class="dataTables_empty"> </td></tr>';
                                    var cl = ls.split(trash);
                                    cl[0] += "<tr id='tr"+pos+"'><td style='width:40%'>"+data+"</td><td style='width:40%'>"+nome+"</td><td style='width:20%'>"+
                                    "<button type='button' class='btn btn-primary' onclick='destacarPecas("+pos+")'><i class='far fa-eye'></i></button>&nbsp;&nbsp;&nbsp;"+
                                    "<button type='button' class='btn btn-danger' onclick='rmvListaServices("+pos+")'><i class='fas fa-times'></i></button>"+
                                    "</td></tr>";
                                    $('#listaServices').html(cl[0]);
                                    var expecas = pecas.split('|');
                                    var index = expecas.length;
                                    var strpecas = "";
                                    var qtdpecas = "";
                                    for(var j = 0; j < index; j++){
                                        var prodex = expecas[j].split('{');
                                        if(j == 0){
                                            strpecas = prodex[0];
                                            qtdpecas = prodex[1];
                                        }else{
                                            strpecas += "|"+prodex[0];
                                            qtdpecas += "|"+prodex[1];
                                        }
                                    }
                                    dados3 = new FormData();
                                    dados3.append('ids', strpecas);
                                    dados3.append('qtd', qtdpecas);
                                    $.ajax({
                                        url: '<?php echo base_url('manutencao/getProds'); ?>',
                                        method: 'post',
                                        data: dados3,
                                        processData: false,
                                        contentType: false,
                                        error: function(xhr, status, error) {
                                            alert(xhr.responseText);
                                        },
                                        success: function(data2) {
                                            if(data2 != "null"){
                                                var lps = $('#listaPecasServico').html();
                                                var trashp = '<tr class="odd"><td valign="top" colspan="2" class="dataTables_empty"> </td></tr>';
                                                var cpl = lps.split(trashp);
                                                cpl[0] += "<tr id='pecas"+pos+"'><td style='width: 50%'>"+data+"</td><td style='width: 50%'>"+data2+"</td></tr>";
                                                $('#listaPecasServico').html(cpl[0]);
                                                pos++;
                                                $('#position').val(pos);
                                            }else{
                                                alert("Erro na banco");
                                            }
                                        },
                                    });
                                }else{
                                    alert("Erro na banco");
                                }
                            },
                        });
                    }else{
                        alert("Erro na banco");
                    }
                },
            });
            $('#servPrev').val(0);
            $('#servPrev').trigger('change');
            $('#nome_prestadorPrev').val("");
        }
    });

    $('#cancelListaPrev').click(function(){
        $('#servPrev').val(0);
        $('#servPrev').trigger('change');
        $('#nome_prestadorPrev').val("");
    });
</script>

<!-- 
rmvListaServices(pos) 
destacarPecas(pos)
Funções dos botões da listagem de serviços
-->
<script>
    function rmvListaServices(pos){
        var services = $('#services').val();
        var ex = services.split('##');
        var tam = ex.length;
        var novo = "";
        for(var i = 0; i < tam; i++){
            var sub = ex[i].split('%%');
            if(sub[0] == pos){
                
            }else{
                if(i == 0){
                    novo = ex[i];
                }else{
                    novo += "##"+ex[i];
                }
            }
        }
        $('#services').val(novo);
        
        var position = $('#position').val();
        if((position - 1) == pos){
            var ls = $('#listaServices').html();
            var trash = '<tr id="tr'+pos+'">';
            var cl = ls.split(trash);
            $('#listaServices').html(cl[0]);
            
            var lps = $('#listaPecasServico').html();
            var trash2 = 'pecas'+pos;
            var cpl = lps.split(trash2);
            $('#listaPecasServico').html(cpl[0]);
            
            position--;
            $('#position').val(position);
        }else{
            var ls = $('#listaServices').html();
            var p = parseInt(pos) + 1;
            var prox = '<tr id="tr'+p+'">';
            var trash = '<tr id="tr'+pos+'">';
            var cl = ls.split(trash);
            var cl_p = cl[1].split(prox);
            $('#listaServices').html(cl[0]+prox+cl_p[1]);
            
            var lps = $('#listaPecasServico').html();
            var proxp = 'pecas'+p;
            var trash2 = 'pecas'+pos;
            var cpl = lps.split(trash2);
            var cl_pp = cpl[1].split(proxp);
            $('#listaPecasServico').html(cpl[0]+proxp+cl_pp[1]);
        }
    }
    
    function destacarPecas(pos){
        $('#aFrota').css('background-color', '#f0f0f0');
        $('#aServs').css('background-color', '#f0f0f0');
        $('#aPecas').css('background-color', 'white');
        
        $('#divFrota').css('display', 'none');
        $('#divServs').css('display', 'none');
        $('#divPecas').css('display', 'block');
        
        var lista = $('#listaPecasServico').html();
        var filho = $('#listaPecasServico').children();
        var qtd = $('#listaPecasServico').children().length;
        for(var i = 0; i < qtd; i++){
            if($(filho[i]).attr('id') == "pecas"+pos){
                $(filho[i]).css({'background-color' : 'red', 'color' : 'white'});
            }else{
                $(filho[i]).css({'background-color' : 'white', 'color' : '#797979'});
            }
        }
    }
</script>

<!-- defineTipo(val) // Função que habilita e desabilita os campos com base no tipo de manutenção -->
<script>
    function defineTipo(val){
        if(val == 1){
            $('#divPrev').css('display', 'none');
            $('#dt_agen').prop('required', false);
            $('#divDe').css('display', 'block');
            $('#de').prop('required', true);
            $('#divAte').css('display', 'block');
            $('#ate').prop('required', true);
            $('#btnAddServico').css('display', 'inline-block');
            $('#btnAddServicoPrev').css('display', 'none');
            
            $('#divDes').removeClass('col-md-12');
            $('#divDes').addClass('col-md-6');
            $('#divMec').css('display', 'block');
            $('#divMec').prop('required', true);
        }else if(val == 2){
            $('#divPrev').css('display', 'block');
            $('#dt_agen').prop('required', true);
            $('#divDe').css('display', 'none');
            $('#de').prop('required', false);
            $('#divAte').css('display', 'none');
            $('#ate').prop('required', false);
            $('#btnAddServico').css('display', 'none');
            $('#btnAddServicoPrev').css('display', 'inline-block');
            
            $('#divDes').removeClass('col-md-6');
            $('#divDes').addClass('col-md-12');
            $('#divMec').css('display', 'none');
            $('#divMec').prop('required', false);
        }
    }
</script>