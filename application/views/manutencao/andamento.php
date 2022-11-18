        
            <style>
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    background-color: white;
                    border-radius: 5px;
                }
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
                }
                .inline{
                    display: inline;
                }    
                label{
                    font-size: 15px;
                }
                .btn-primary{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:disabled{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:hover{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:focus{
                    background-color: #033557;
                    border-color: #033557;
                }
                .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle{
                    background-color: #033557;
                    border-color: #033557;
                }
                .modal-header{
                    justify-content: unset; 
                    text-align: left;
                }
                .modal-footer{
                    position: relative;
                }
                #myTableSemRecurso_wrapper tbody tr td, #myTableSemRecurso_wrapper thead tr th{
                    font-size: 12px;
                }
                #myTableSemRecurso_wrapper .row{
                    width: 110%;
                }
                .sel-with-add{
                    width: calc(100% - 130px);
                    display: inline;
                    float: left;
                }
                .sel-with-add select{
                    width: 100%;
                }
                .add-din{
                    width: 130px;
                    display: inline;
                    float: left;
                }
                .add-din button{
                    margin-left: 18px;
                    width: 45px;
                }
                .inside-list{
                    width: 100%;
                }
                .inside-a{
                    cursor: pointer;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <form action="<?php echo base_url('manutencao/novoAndamento') ?>" method="post" id="form_and">
                    <div class="row main-row">
                        <div class="col-md-12 main-col-12">
                            <input type="hidden" name="os_id" value="<?php echo $id ?>">
                            
                            <div class="row">
                                <div class="col-md-7 form-group">
                                    <label>Título:</label><br>
                                    <input type="text" class="form-control and-field" name="titulo" placeholder="Título" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Data:</label><br>
                                    <input type="date" class="form-control and-field" name="data" required>
                                </div>
                                <div class="col-md-2 form-group">
                                    <label>Hora:</label><br>
                                    <input type="time" class="form-control and-field" name="hora" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Detalhes:</label><br>
                                    <textarea class="form-control and-field" name="detalhes" rows="3" placeholder="Detalhes..." required></textarea>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Lançar Serviço:</label><br>
                                    <div class="sel-with-add">
                                        <select  style="width: 100%!important" class="select2-and and-field" id="and_servico">
                                            <option value="" selected disabled>-- Selecione o Serviço --</option>
                                            <?php
                                                foreach($servicos as $serv){
                                                    echo '<option value="'.$serv['servico_id'].'">'.$serv['servico_nome'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="add-din">
                                        <button type="button" class="btn btn-success" onclick="addList(1)"><em class="fa fa-check-circle-o"></em></button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novoServ"><em class="fa fa-plus"></em></button>
                                    </div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Lançar Peça:</label><br>
                                    <div class="sel-with-add">
                                        <select  style="width: 100%!important" class="select2-and and-field" id="and_peca">
                                            <option value="" selected disabled>-- Selecione a Peça --</option>
                                            <?php 
                                                foreach($pecas as $pc){
                                                    echo "<option value='".$pc['produto_id']."'>".$pc['produto_codigo']." - ".$pc['produto_nome']." / ".$pc['produto_modelo']."</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="add-din">
                                        <button type="button" class="btn btn-success" onclick="addList(2)"><em class="fa fa-check-circle-o"></em></button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#novoPeca"><em class="fa fa-plus"></em></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input type="hidden" name="anchor_list" id="anchor_list">
                                    <table id="myTableSemRecurso" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">ID</th>
                                                <th style="width: 47%">Nome</th>
                                                <th style="width: 7%">Qtd</th>
                                                <th style="width: 13%;">Unitário</th>
                                                <th style="width: 13%;">Total</th>
                                                <th style="width: 5%"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="and_list">
                                           
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-primary">Atualizar Valores</button>
                                    <h4>Valor Total R$ <span id="valor_total">0</span></h4>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        
                        <div class="col-md-12">
                            <br><br>
                            <div class="row" style="margin-bottom: 50px">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('ordemdeservicos') ?>" class="btn btn-danger">Cancelar</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-primary">Lançar Andamento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <div class="modal fade" id="novoServ" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Novo Serviço</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hideServ()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome do Serviço:</label><br>
                                    <input type="text" class="form-control" id="serv_nome" placeholder="Nome">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Valor do Serviço:</label><br>
                                    <input type="text" class="form-control valor" id="serv_valor" placeholder="0,00">
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hideServ()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendServ()">Cadastrar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="novoPeca" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title">Nova Peça</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="hidePeca()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_nome" placeholder="Nome">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Código da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_codigo" placeholder="Código">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Modelo da Peça:</label><br>
                                    <input type="text" class="form-control" id="peca_modelo" placeholder="Modelo">
                                </div>
                                
                                <div class="col-md-6 form-group">
                                    <label>Preço de Custo (R$):</label><br>
                                    <input type="text" class="form-control valor" id="peca_custo" placeholder="0,00">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Preço de Venda (R$):</label><br>
                                    <input type="text" class="form-control valor" id="peca_venda" placeholder="0,00">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>Fabricante:</label><br>
                                    <input type="text" class="form-control" id="peca_fabricante" placeholder="Fabricante">
                                </div>
                                
                                <div class="col-md-12 form-group">
                                    <label>Fornecedor:</label><br>
                                    <select class="select2-peca" id="peca_fornecedor"  style="width: 100%!important">
                                        <option value="" disabled selected>-- Selecione um Fornecedor --</option>
                                        <?php foreach($fornecedores as $forn){
                                            echo "<option value='".$forn['fornecedor_cnpj']."'>".$forn['fornecedor_nome']."</option>";
                                        } ?>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="hidePeca()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendPeca()">Cadastrar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.select2-and').select2({theme: "bootstrap"});
                    $('.select2-peca').select2({theme: "bootstrap", dropdownParent: $('#novoPeca')});
                    
                    $('.valor').mask("#.####0,0000", {reverse: true});
                    
                    $('#myTableSemRecurso').DataTable( {
                        "paging":   false,
                        "ordering": false,
                        "info":     false,
                        "searching": false,
                        "language": {
                            "zeroRecords": " ",
                        }
                    } );
                });
            </script>
            
            <script>
                
                var global_servs = [];
                var global_pecas = [];
                var global_svals = [];
                var global_pvals = [];
                var global_index = 1;
                var global_els = [];
                var global_total = 0;
                
                function addList(val){
                    if(val == 1){
                        //serviço
                        if($('#and_servico').val() != "" && $('#and_servico').val() != null){
                            dados = new FormData();
                            dados.append('id', $('#and_servico').val());
                            $.ajax({
                                url: '<?php echo base_url('manutencao/getServAndamento'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                error: function(xhr, status, error) {
                                    alert('addList(serv): '+xhr.responseText);
                                },
                                success: function(data) {
                                    if(data != "null" && data != "" && data != " " && data != null){
                                        serv = jQuery.parseJSON(data);
                                        if(typeof global_servs[serv.servico_id] === 'undefined' || global_servs[serv.servico_id] == null){
                                            //não tem ainda
                                            global_servs[serv.servico_id] = 1;
                                            global_svals[serv.servico_id] = serv.servico_custo;
                                            
                                            var tr = 
                                            '<tr id="'+global_index+'">'+
                                                '<td class="td_id">'+global_index+'</td>'+
                                                '<td><b>SERVIÇO:&nbsp;&nbsp;</b>'+serv.servico_nome+'</td>'+
                                                '<td><input class="inside-list" type="number" step="any" id="input_s'+serv.servico_id+'" value="'+global_servs[serv.servico_id]+'" onfocusout="notNull(\'input_s'+serv.servico_id+'\')" oninput="this.setCustomValidity(\'\')" onchange="mudaValor(\'input_s'+serv.servico_id+'\', '+serv.servico_id+')"></td>'+
                                                '<td>R$ <input style="width: 82%" type="text" id="valor_s'+serv.servico_id+'" value="'+serv.servico_custo+'" onfocusout="changeTotal(\'valor_s'+serv.servico_id+'\')" oninput="this.setCustomValidity(\'\')"></td>'+
                                                '<td>R$ <input style="width: 82%" type="text" id="total_s'+serv.servico_id+'" value="'+serv.servico_custo+'" disabled></td>'+
                                                '<td class="text-center"><a class="inside-a" onclick="removeEl($(this).parent().parent().prop(\'id\'), 1, '+serv.servico_id+')"><em class="fa fa-times text-danger" style="font-size: 16px"></em></a></td>'+
                                            '</tr>';
                                            
                                            valor_total(serv.servico_custo);
                                            
                                            if(global_index == 1){
                                                $('#and_list').html(tr);
                                            }else{
                                                $('#and_list').append(tr);
                                            }
                                            $("#valor_s"+serv.servico_id).mask("#.##0,0000", {reverse: true});
                                            $("#total_s"+serv.servico_id).mask("#.##0,0000", {reverse: true});
                                            
                                            global_index++;
                                        }else{
                                            //já tem
                                            global_servs[serv.servico_id] = global_servs[serv.servico_id] + 1;
                                            var valor = global_servs[serv.servico_id] * parseFloat(global_svals[serv.servico_id]);
                                            $('#input_s'+serv.servico_id).val(global_servs[serv.servico_id]);
                                            $('#total_s'+serv.servico_id).unmask().val(valor.toFixed(4)).mask("#.##0,0000", {reverse: true});
                                            valor_total(serv.servico_custo);
                                        }
                                    }else{
                                        alert("Erro no banco");
                                    }
                                },
                            });
                        }else{
                            alert('Por favor selecione um serviço!');
                        }
                    }else if(val == 2){
                        //peça
                        if($('#and_peca').val() != "" && $('#and_peca').val() != null){
                            dados = new FormData();
                            dados.append('id', $('#and_peca').val());
                            $.ajax({
                                url: '<?php echo base_url('manutencao/getPecaAndamento'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                error: function(xhr, status, error) {
                                    alert('addList(peça): '+xhr.responseText);
                                },
                                success: function(data) {
                                    if(data != "null" && data != "" && data != " " && data != null){
                                        peca = jQuery.parseJSON(data);
                                        if(typeof global_pecas[peca.produto_id] === 'undefined' || global_pecas[peca.produto_id] == null){
                                            //não tem ainda
                                            global_pecas[peca.produto_id] = 1;
                                            global_pvals[peca.produto_id] = peca.produto_preco_custo;

                                            var tr = 
                                            '<tr id="'+global_index+'">'+
                                                '<td class="td_id">'+global_index+'</td>'+
                                                '<td><b>PEÇA:&nbsp;&nbsp;</b>'+peca.produto_nome+' | '+peca.produto_modelo+'</td>'+
                                                '<td><input class="inside-list" type="number" step="any" id="input_p'+peca.produto_id+'" value="'+global_pecas[peca.produto_id]+'" onfocusout="notNull(\'input_p'+peca.produto_id+'\')" oninput="this.setCustomValidity(\'\')" onchange="mudaValor2(\'input_p'+peca.produto_id+'\', '+peca.produto_id+')"></td>'+
                                                '<td>R$ <input style="width: 82%" type="text" id="valor_p'+peca.produto_id+'" value="'+peca.produto_preco_custo+'" onfocusout="changeTotal(\'valor_p'+peca.produto_id+'\')" oninput="this.setCustomValidity(\'\')"></td>'+
                                                '<td>R$ <input style="width: 82%" type="text" id="total_p'+peca.produto_id+'" value="'+peca.produto_preco_custo+'" disabled></td>'+
                                                '<td class="text-center"><a class="inside-a" onclick="removeEl($(this).parent().parent().prop(\'id\'), 2, '+peca.produto_id+')"><em class="fa fa-times text-danger" style="font-size: 16px"></em></a></td>'+
                                            '</tr>';
                                            
                                           valor_total(peca.produto_preco_custo);
                                            
                                            if(global_index == 1){
                                                $('#and_list').html(tr);
                                            }else{
                                                $('#and_list').append(tr);
                                            }
                                            $("#valor_p"+peca.produto_id).mask("#.##0,0000", {reverse: true});
                                            $("#total_p"+peca.produto_id).mask("#.##0,0000", {reverse: true});
                                            
                                            global_index++;
                                        }else{
                                            //já tem
                                            global_pecas[peca.produto_id] = global_pecas[peca.produto_id] + 1;
                                            var valor = global_pecas[peca.produto_id] * parseFloat(global_pvals[peca.produto_id]);
                                            $('#input_p'+peca.produto_id).val(global_pecas[peca.produto_id]);
                                            $('#total_p'+peca.produto_id).unmask().val(valor.toFixed(4)).mask("#.##0,0000", {reverse: true});
                                            valor_total(peca.produto_preco_custo);
                                        }
                                    }else{
                                        alert("Erro no banco");
                                    }
                                },
                            });
                        }else{
                            alert('Por favor selecione uma peça!');
                        }
                    }
                }
            </script>
            
            <script>
                function notNull(id){
                    if($('#'+id).val() == "" && $('#'+id).val() == " " && $('#'+id).val() == 0 && $('#'+id).val() == "0"){
                        document.getElementById(id).setCustomValidity('Por favor, informe um valor válido!');
                        document.getElementById(id).reportValidity();
                    }
                }
                
                function changeTotal(id){
                    var aux = $('#'+id).val().replace('.', '').replace(',', '.');
                    
                    if(aux.length <= 2){
                        aux = parseFloat(aux).toFixed(4);
                        $('#'+id).unmask().val(aux).mask("#.##0,0000", {reverse: true});
                    }

                    if(aux == "" || aux == " "){
                        document.getElementById(id).setCustomValidity('Por favor, informe um valor válido!');
                        document.getElementById(id).reportValidity();
                    }else{
                        var num = id.substr(7);
                        var tip = id.substr(6, 1);
                        if(tip == "s"){
                            var valor = parseFloat($('#'+id).val().replaceAll('.', '').replace(',', '.')) * global_servs[num];
                            valor_mudar($('#total_s'+num).val(), valor);
                            if(parseFloat(aux).toFixed(4) != parseFloat(global_svals[num]).toFixed(4)){
                                global_svals[num] = parseFloat($('#'+id).val().replaceAll('.', '').replace(',', '.')).toFixed(4);
                                $('#total_s'+num).unmask().val(parseFloat(valor).toFixed(4)).mask("#.##0,0000", {reverse: true});
                                $('#'+id).attr('value', parseFloat($('#'+id).val().replaceAll('.', '').replace(',', '.')).toFixed(4));
                            }
                        }else{
                            var valor = parseFloat($('#'+id).val().replaceAll('.', '').replace(',', '.')) * global_pecas[num];
                            valor_mudar($('#total_p'+num).val(), valor);
                            if(parseFloat(aux).toFixed(4) != parseFloat(global_pvals[num]).toFixed(4)){
                                global_pvals[num] = parseFloat($('#'+id).val().replaceAll('.', '').replace(',', '.')).toFixed(4);
                                $('#total_p'+num).unmask().val(parseFloat(valor).toFixed(4)).mask("#.##0,0000", {reverse: true});
                                $('#'+id).attr('value', parseFloat($('#'+id).val().replaceAll('.', '').replace(',', '.')).toFixed(4));
                            }
                        }
                    }
                }
                
                function mudaValor(id, e){
                    global_servs[e] = parseFloat($('#'+id).val());
                    var total = parseFloat(global_servs[e]) * parseFloat(global_svals[e]);
                    valor_mudar($('#total_s' + e).val(), total);
                    $('#total_s'+e).unmask().val(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                }
                
                function valor_total(valor){
                    global_total = parseFloat(global_total) + parseFloat(valor);
                    $('#valor_total').unmask().html(global_total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                }
                
                function valor_mudar(antigo, novo){
                    var calc = novo - parseFloat(antigo.replaceAll('.', '').replace(',', '.'));
                    global_total = global_total + calc;
                    $('#valor_total').unmask().html(global_total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                }
                
                function mudaValor2(id, e){
                    global_pecas[e] = parseFloat($('#'+id).val());
                    var total = parseFloat(global_pecas[e]) * parseFloat(global_pvals[e]);
                    valor_mudar($('#total_p' + e).val(), total);
                    $('#total_p'+e).unmask().val(total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                }
                
                function removeEl(id, tipo, el){
                    if(tipo == 1){
                        global_total = global_total - $('#total_s' + el).val().replaceAll('.', '').replace(',', '.');
                        $('#valor_total').unmask().html(global_total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        global_servs[el] = null;
                        $('#'+id).detach();
                        global_index = 1;
                        $('.td_id').each(function(){
                            $(this).parent().prop('id', global_index);
                            $(this).html(global_index);
                            global_index++;
                        });
                    }else{
                        global_total = global_total - $('#total_p' + el).val().replaceAll('.', '').replace(',', '.');
                        $('#valor_total').unmask().html(global_total.toFixed(4)).mask("#.##0,0000", {reverse: true});
                        global_pecas[el] = null;
                        $('#'+id).detach();
                        global_index = 1;
                        $('.td_id').each(function(){
                            $(this).parent().prop('id', global_index);
                            $(this).html(global_index);
                            global_index++;
                        });
                    }
                }
            </script>
            
            <script>
                $('#form_and').submit(function(ev){
                    var str = "null▓▓";
                    $('#and_list').find('tr').each(function(){
                        var id = $(this).find('input').last().prop('id').substr(7);
                        var tipo = $(this).find('input').last().prop('id').substr(6, 1);
                        var qtd = $('#input_'+tipo+id).val();
                        var vlr = $('#valor_'+tipo+id).val();
                        
                        str += "▓▓" + id + "☼☼" + tipo + "☼☼" + qtd + "☼☼" + vlr;
                    });
                    $('#anchor_list').val(str);
                });
            </script>
            
            <script>
                function hideServ(){
                    $('#serv_nome').val('');
                    $('#serv_valor').unmask().val('').mask("#.####0,0000", {reverse: true});
                    $('#novoServ').modal('hide');
                }
            
                function sendServ(){
                    if($('#serv_nome').val() != '' && $('#serv_nome').val() != ' '){
                        if($('#serv_valor').val() != ''){
                            dados = new FormData();
                            dados.append('nome', $('#serv_nome').val());
                            dados.append('valor', $('#serv_valor').val());
                            $.ajax({
                                url: '<?php echo base_url('manutencao/servDinamico'); ?>',
                                method: 'post',
                                data: dados,
                                processData: false,
                                contentType: false,
                                error: function(xhr, status, error) {
                                    alert('sendServ(): Error, check console');
                                    console.log(xhr.responseText);
                                },
                                success: function(data) {
                                    if(data != "null" && data != "" && data != " " && data != null){
                                        serv = jQuery.parseJSON(data);
                                        
                                        var op = "<option value='"+serv.servico_id+"'>"+serv.servico_nome+"</option>";
                                        $('#and_servico').append(op);
                                        hideServ();
                                    }else{
                                        alert("Erro no banco");
                                    }
                                },
                            });
                        }else{
                            alert('Por favor insira um valor válido!');
                        }
                    }else{
                        alert('Por favor informe um nome válido!');
                    }
                }
            </script>
            
            <script>
                function hidePeca(){
                    $('#peca_nome').val('');
                    $('#peca_codigo').val('');
                    $('#peca_modelo').val('');
                    $('#peca_fabricante').val('');
                    $('#peca_fornecedor').get(0).selectedIndex = 0;
                    $('#peca_fornecedor').change();
                    $('#peca_custo').unmask().val('').mask("#.##0,0000", {reverse: true});
                    $('#peca_venda').unmask().val('').mask("#.##0,0000", {reverse: true});
                    $('#novoPeca').modal('hide');
                }
                
                function sendPeca(){
                    if($('#peca_nome').val() != "" && $('#peca_nome').val() != " "){
                        if($('#peca_codigo').val() != "" && $('#peca_codigo').val() != " "){
                            if($('#peca_modelo').val() != "" && $('#peca_modelo').val() != " "){
                                if($('#peca_fabricante').val() != "" && $('#peca_fabricante') != " "){
                                    if($('#peca_fornecedor').get(0).selectedIndex != 0){
                                        var custo = $('#peca_custo').val().replaceAll('.', '').replace(',', '.');
                                        if(custo != ""){
                                            var venda = $('#peca_venda').val().replaceAll('.', '').replace(',', '.');
                                            if(venda != ""){
                                                
                                                dados = new FormData();
                                                dados.append('nome', $('#peca_nome').val());
                                                dados.append('custo', $('#peca_custo').val());
                                                dados.append('venda', $('#peca_venda').val());
                                                dados.append('codigo', $('#peca_codigo').val());
                                                dados.append('fabricante', $('#peca_fabricante').val());
                                                dados.append('fornecedor', $('#peca_fornecedor').val());
                                                dados.append('modelo', $('#peca_modelo').val());
                                                $.ajax({
                                                    url: '<?php echo base_url('manutencao/pecaDinamica'); ?>',
                                                    method: 'post',
                                                    data: dados,
                                                    processData: false,
                                                    contentType: false,
                                                    error: function(xhr, status, error) {
                                                        alert('sendPeca(): Error, check console');
                                                        console.log(xhr.responseText);
                                                    },
                                                    success: function(data) {
                                                        if(data != "null" && data != "" && data != " " && data != null){
                                                            peca = jQuery.parseJSON(data);
                                                            
                                                            var op = "<option value='"+peca.produto_id+"'>"+peca.produto_nome+" | "+peca.produto_modelo+"</option>";
                                                            $('#and_peca').append(op);
                                                            hidePeca();
                                                        }else{
                                                            alert("Erro no banco");
                                                        }
                                                    },
                                                });
                                                
                                            }else{
                                                alert('Por favor informe um preço de venda válido!');
                                            }
                                        }else{
                                            alert('Por favor informe um preço de custo válido!');
                                        }
                                    }else{
                                        alert('Por favor selecione um fornecedor válido!');
                                    }
                                }else{
                                    alert('Por favor insira um fabricante válido!');
                                }
                            }else{
                                alert('Por favor insira um modelo válido!');
                            }
                        }else{
                            alert('Por favor insira um código válido!');
                        }
                    }else{
                        alert('Por favor insira um nome válido!');
                    }
                }
            </script>
            