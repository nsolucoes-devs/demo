<style>
    .x{
        display: block;
    }
</style>

<br>
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
            <input type="hidden" id="id" name="id">
            
                <div class="col-md-12" style="background-color: white;">
                    <br><br>
                    
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Tipo de Manutenção</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" id="tipo" name="tipo" required onchange="defineTipo($(this).val())">
                                <option value="1">Corretiva</option>
                                <option value="2">Preventiva</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group" id="divPrev" style="display: none">
                            <label>Data de Agendamento</label><br>
                            <input type="date" class="form-control" id="dt_agen" name="dt_agen" placeholder="00/00/0000">
                        </div>
                    </div>
                    
                    <br>
                    
                    <div class="row x">
                        <div class="col-md-3 form-group">
                            <label>Frota</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" id="frota" name="frota" required onchange="buscaFrota($(this).val())">
                                <option disabled selected>-- Selecione uma Frota --</option>
                                <?php foreach($frotas as $f){ ?>
                                <option value="<?php echo $f['frota_chassi'] ?>"><?php echo $f['frota_codigo'] . " | " . $f['frota_codigo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Placa</label><br>
                            <input type="text" class="form-control" id="p_input" disabled placeholder="ABC0000">
                            <input type="hidden" id="placa" name="placa" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>KM Veículo</label><br>
                            <input type="text" class="form-control" id="km" name="km" placeholder="0" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Mão de Obra</label><br>
                            <input type="text" class="form-control" id="mao" name="mao" placeholder="Mão de Obra" required>
                        </div>
                    </div>

                    <br>
                    
                    <input type="hidden" name="cont" id="cont" value="2">
                    
                    <div class="row x" id="servDiv">
                        <div class="col-md-4 form-group">
                            <label>Data</label><br>
                            <input type="date" class="form-control" id="dt" name="dt" placeholder="00/00/0000" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Custo do Serviço</label><br>
                            <input type="text" class="form-control" id="custo" name="custo" placeholder="0,00" required>
                        </div>
                        <div class="col-md-1 form-group text-center">
                            <label>Adicionar</label><br>
                            <button type="button" class="btn btn-primary" onclick="addServ()" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="col-md-1 form-group text-center">
                            <label>Remover</label><br>
                            <button type="button" class="btn btn-danger" onclick="removeServ()"><i class="fas fa-minus"></i></button>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Tipo de Serviço</label><br>
                            <select class="select2-aux y" style="width: 100%" id="serv1" name="serv1" required>
                                <option disabled selected>-- Selecione um Serviço --</option>
                                <?php foreach($servicos as $serv){ ?>
                                <option value="<?php echo $serv['servico_id'] ?>"><?php echo $serv['servico_nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <br>
                    
                    <div class="row x">
                        <div class="col-md-4 form-group">
                            <label>Fornecedor / Prestador</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" id="fornecedor" name="fornecedor" required onchange="buscaForn($(this).val())">
                                <option disabled selected>-- Selecione um Fornecedor --</option>
                                <?php foreach($fornecedores as $f){ ?>
                                <option value="<?php echo $f['fornecedor_cnpj'] ?>"><?php echo $f['fornecedor_nome'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Peças a Trocar</label><br>
                            <select class="js-example-basic-multiple" style="width: 100%" id="peca" name="peca" disabled onchange="setaIdProd($(this).val())">
                            </select>
                        </div>
                        <div class="col-md-1 form-group text-center">
                            <label>Adicionar</label><br>
                            <button id="addProd" type="button" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white" disabled><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="col-md-1 form-group text-center">
                            <label>Remover</label><br>
                            <button id="removeProd" type="button" class="btn btn-danger" disabled><i class="fas fa-minus"></i></button>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Custo Peças</label><br>
                            <input type="text" class="form-control" id="custo_pecas" placeholder="0,00" disabled>
                            <input type="hidden" id="c_pecas" name="c_pecas" value="0">
                        </div>
                    </div>
                    
                    <br>
                    
                    <div class="row x">
                        <div class="col-md-12">
                            <label>Lista das Peças</label><br>
                            <textarea class="form-control" id="list" rows="7" style="resize: none" disabled></textarea>
                            <input type="hidden" id="lista" name="lista">
                        </div>
                    </div>
                    
                    <br><br>
                    
                    <div class="row x">
                        <div class="col-md-6 form-group">
                            <label>Análise do Mecânico</label><br>
                            <textarea class="form-control" name="analise" id="analise" rows="9" style="resize: none" required></textarea>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Descrição</label><br>
                            <textarea class="form-control" name="desc" id="desc" rows="9" style="resize: none" required></textarea>
                        </div>
                    </div>
                    
                    <br><br>
                </div>
            </div>
            
            <br><br>
            
            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-12 text-center">
                    <a href="<?php echo base_url('manutencao/listagem') ?>" class="btn btn-danger">&nbsp&nbspCancelar&nbsp&nbsp</a>
                    &nbsp&nbsp&nbsp&nbsp
                    <button type="submit" class="btn btn-primary" style="border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">&nbsp&nbspSalvar e Voltar&nbsp&nbsp</button>
                </div>
            </div>
        </form>
        <br><br>
        
    </section>
</section>

<script>
    $(document).ready(function(){
        $('.select2-aux').select2({theme: "bootstrap"});
        $('#km').mask('0000000000', {'translation': {0: {pattern: /[0-9*]/}}});
        $('#custo').mask('#.##0,00', { reverse: true });
    });
</script>

<script>
    function addServ(){
        var cont = $('#cont').val();
        var div = $('#servDiv');
        var html = '<div class="col-md-3 form-group" id="div'+cont+'">' +
            '<label>Tipo de Serviço</label><br>' +
            '<select form="myForm" class="select2-aux y" id="serv' + cont + '" name="serv' + cont + '" style="width: 100%" required value="0">' +
                '<option value="0" disabled selected>-- Selecione um Serviço --</option>' +
                '<?php foreach($servicos as $serv){ ?>' +
                '<option value="<?php echo $serv['servico_id'] ?>"><?php echo $serv['servico_nome'] ?></option>' +
                '<?php } ?>' +
           '</select>' +
        '</div>';
        
        $('#servDiv').append(html);
        cont++;
        $('#cont').val(cont);
        $('.select2-aux:last').select2({theme: "bootstrap"});
    }
    
    $(".select2-aux").each(function() {
        $(this).prop('required', true);
    });
    
    function removeServ(){
        if($('#cont').val() != 2){
            var cont = $('#cont').val() - 1;
            var div = $('#servDiv');
            var actual = $(div).find('#div'+cont);
            $(actual).remove();
            $('#cont').val(cont);
        }else{
            alert('Não há mais elementos para remover!');
        }
    }
</script>

<script>
    function buscaFrota(chassi){
        dados = new FormData();
        dados.append('chassi', chassi);
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
                }else{
                    alert("Erro na banco");
                }
            },
        });
    }
</script>

<script>
    function buscaForn(cnpj){
        dados = new FormData();
        dados.append('cnpj', cnpj);
        $.ajax({
            url: '<?php echo base_url('manutencao/getProds'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
                alert(xhr.responseText);
            },
            success: function(data) {
                if(data != "null"){
                    $('#peca').html(data);
                    $('#peca').prop('disabled', false);
                }else{
                    alert("Erro na banco");
                }
            },
        });
    }
</script>

<script>
    function setaIdProd(id){
        $('#addProd').val(id);
        $('#addProd').attr('onClick', 'buscaProd('+id+');');
        $('#addProd').prop('disabled', false);
        
        $('#removeProd').val(id);
        $('#removeProd').attr('onClick', 'deletaProd('+id+');');
        $('#removeProd').prop('disabled', false);
    }
    
    function buscaProd(id){
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
                    
                    var lista = $('#lista').val();
                    lista += spl[0]+"|";
                    $('#lista').val(lista);
                    
                    var txta = $('#list').html();
                    txta += spl['1']+", ";
                    $('#list').html(txta);
                    
                    var preco = parseFloat($('#c_pecas').val());
                    preco = parseFloat(preco) + parseFloat(spl[2]);
                    $('#c_pecas').val(parseFloat(preco).toFixed(2));
                    $('#custo_pecas').val(parseFloat(preco).toFixed(2))
                }else{
                    alert("Erro na banco");
                }
            },
        });
    }
    
    function deletaProd(id){
        var aux = $('#lista').val();
        var cont = aux.length;
        if(cont > 0){
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
                        
                        var id_l = spl[0].length + 1;
                        var lista = $('#lista').val();
                        var lista_l = lista.length - id_l;
                        lista = lista.substr(0, lista_l);
                        $('#lista').val(lista);
                        
                        var nome_l = spl[1].length + 2;
                        var txta = $('#list').html();
                        var txta_l = txta.length - nome_l;
                        txta = txta.substr(0, txta_l);
                        $('#list').html(txta);
                        
                        var preco = parseFloat($('#c_pecas').val());
                        preco = parseFloat(preco) - parseFloat(spl[2]);
                    $('#c_pecas').val(parseFloat(preco).toFixed(2));
                    $('#custo_pecas').val(parseFloat(preco).toFixed(2))
                    }else{
                        alert("Erro na banco");
                    }
                },
            });
        }else{
            alert("Não há mais elementos para remover!");
        }
    }
</script>

<script>
    $('#myForm').submit(function(evt){
        var aux = 0;
        
        $(".select2-aux").each(function() {
            if($(this).val() == null){
                aux++;
            }
        });
        
        if(aux != 0){
            evt.preventDefault();
            alert('Por favor selecione todos os campos "Tipo de Serviço"!');
        }else{
            var cont = $('#cont').val() - 1;
            $('#cont').val(cont);
            $('#myForm').submit();
        }
    });
</script>

<script>
    function defineTipo(val){
        if(val == 1){
            $('#divPrev').css('display', 'none');
            $('#dt_agen').prop('required', false);
        }else if(val == 2){
            $('#divPrev').css('display', 'block');
            $('#dt_agen').prop('required', true);
        }
    }
</script>