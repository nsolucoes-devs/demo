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
                .select2{
                    width: 100%;
                }
                .sel-with-add{
                    width: calc(100% - 65px);
                    display: inline;
                    float: left;
                }
                .add-din{
                    width: 65px;
                    display: inline;
                    float: left;
                }
                .add-din button{
                    margin-left: 20px;
                    width: 45px;
                }
                .modal-header{
                    justify-content: unset; 
                    text-align: left;
                }
                .modal-footer{
                    position: relative;
                }
                .btn-left{
                    position: absolute;
                    top: 15px;
                    left: 15px;
                }
            </style>
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <form action="<?php if($os != null){echo base_url('manutencao/editaOrdem');}else{echo base_url('manutencao/novaOrdem');} ?>" method="post">
                    <div class="row main-row">
                        <div class="col-md-12 main-col-12">
                            
                            <?php if($os != null){ ?>
                            <input type="hidden" name="id_os" value="<?php echo $os['os_id'] ?>">
                            <input type="hidden" name="user_a" value="<?php echo $os['os_usuario_fechamento'] ?>">
                            <?php } ?>
                            
                            <div class="row">
                                <?php if(isset($os)) { ?>
                                    <div class="col-md-12 form-group">
                                        <h2>Ordem de Serviço N° <?php echo sprintf("%'03d", $os['os_id']); ?></h2>
                                    </div>
                                <?php } else {?>
                                    <div class="col-md-12 form-group">
                                        <h2>Dados da Ordem de Serviço</h2>
                                    </div>
                                <?php } ?>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Tipo de Manutenção:</label><br>
                                    <select  style="width: 100%!important" class="select2" id="tipo" name="tipo" required>
                                        <option value="" selected disabled>-- Selecione um Tipo de Manutenção --</option>
                                        <option value="CORRETIVA" <?php if($os != null){if($os['os_tipo'] == "CORRETIVA"){echo"selected";}} ?>>Corretiva</option>
                                        <option value="PREVENTIVA" <?php if($os != null){if($os['os_tipo'] == "PREVENTIVA"){echo"selected";}} ?>>Preventiva</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Data de Abertura:</label><br>
                                    <input type="date" class="form-control" id="data" name="data" required <?php if($os != null){echo "value='".$os['os_data_abertura']."'";} ?>>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Hora de Abertura:</label><br>
                                    <input type="time" class="form-control" id="hora" name="hora" required <?php if($os != null){echo "value='".$os['os_hora_abertura']."'";} ?>>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Frota Alvo:</label><br>
                                    <select  style="width: 100%!important" class="select2" id="frota" name="frota" onchange="busca_frota($(this).val(), 1)" required>
                                        <option value="" selected disabled>-- Seleciona um Frota --</option>
                                        <?php foreach($frotas as $frota){
                                            $sel = "";
                                            if($os != null){
                                                if($os['os_frota_id'] == $frota['frota_id']){$sel = "selected";}
                                            }
                                            echo "<option value='".$frota['frota_id']."' ".$sel.">".$frota['frota_placa']." | ".$frota['frota_codigo']."</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label>Dados da Frota:</label><br>
                                    <input type="text" class="form-control" id="desc" placeholder="Descrição da frota selecionada" disabled>
                                </div>
                            </div>
                            
                            <?php if($os == null){ ?>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Quilometragem Anterior (km/hr):</label><br>
                                    <input type="text" class="form-control numeral" name="km_anterior" id="km_anterior" placeholder="Quilometragem Anterior" readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Quilometragem Atual (km/hr):</label><br>
                                    <input type="text" class="form-control numeral" name="km_atual" id="km_atual" placeholder="Quilometragem Atual" required>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Próxima Quilometragem:</label><br>
                                    <input type="text" class="form-control numeral" name="km_futuro" id="km_futuro" placeholder="Quilometragem Previsto" value="0">
                                </div>
                            </div><br>
                            <?php }else{ ?>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Quilometragem Anterior (km/hr):</label><br>
                                    <input type="text" class="form-control numeral" name="km_anterior" id="km_anterior" placeholder="Quilometragem Anterior" readonly <?php if($os != null){echo "value='".$os['os_km_anterior']."'";} ?>>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Quilometragem Atual (km/hr):</label><br>
                                    <input type="text" class="form-control numeral" name="km_atual" id="km_atual" placeholder="Quilometragem Atual" required <?php if($os != null){echo "value='".$os['os_km_atual']."'";} ?>>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Situação da Ordem de Serviço</label><br>
                                    <select  style="width: 100%!important" class="select2" name="ativo" id="ativo" required>
                                        <option value="1" <?php if($os['os_status_id'] == 1){echo "selected";} ?>>Ativo</option>
                                        <option value="2" <?php if($os['os_status_id'] == 2){echo "selected";} ?>>Inativo</option>
                                    </select>
                                </div>
                            </div><br>
                            
                            
                            <div class="row" <?php if($os['os_situacao_id'] == 4){echo " style='display: block'";}else{echo "style='display: none'";} ?>>
                                <div class="col-md-3 form-group">
                                    <label>Data de Fechamento:</label><br>
                                    <input type="date" class="form-control" id="data_f" name="data_f" required <?php echo "value='".$os['os_data_fechamento']."'"; ?> readonly>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Hora de Fechamento:</label><br>
                                    <input type="time" class="form-control" id="user_f" name="hora_f" required <?php echo "value='".$os['os_hora_fechamento']."'"; ?> readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Responsável Pelo Fechamento:</label><br>
                                    <input type="text" class="form-control" id="user_f_display" name="user_f_display" required <?php echo "value='".$user_f."'"; ?> readonly>
                                    <input type="hidden" id="user_f" name="user_f" required <?php echo "value='".$os['os_usuario_fechamento']."'"; ?>>
                                </div>
                            </div><br>
                            <?php } ?>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <h4>Descrição da Manutenção</h4>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8 form-group">
                                    <label>Título da Manuteção:</label><br>
                                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título da Manutenção" required <?php if($os != null){echo "value='".$os['os_titulo']."'";} ?>>
                                </div> 
                                <div class="col-md-4 form-group">
                                    <label>Status da Manutenção:</label><br>
                                    <select  style="width: 100%!important" class="select2" name="situacao" id="situacao" required>
                                        <option value="" selected disabled>-- Selecione o Status --</option>
                                        <?php if($os == null){ 
                                            foreach($situacoes as $sit){ 
                                                if($sit['situacaoos_id'] != 4){
                                                    echo "<option value='".$sit['situacaoos_id']."'>".$sit['situacaoos_nome']."</option>";
                                                } 
                                            } 
                                        }else{ 
                                            foreach($situacoes as $sit){ 
                                                $sel = ""; 
                                                if($sit['situacaoos_id'] == $os['os_situacao_id']){$sel = "selected";}
                                                echo "<option value='".$sit['situacaoos_id']."' ".$sel.">".$sit['situacaoos_nome']."</option>";
                                            } 
                                        } ?>
                                    </select>
                                    <!--<div class="sel-with-add">
                                        <select class="select2" name="situacao" id="situacao" required>
                                            <option value="" selected disabled>-- Selecione o Status --</option>
                                            <?php foreach($situacoes as $sit){
                                                echo "<option value='".$sit['situacaoos_id']."'>".$sit['situacaoos_nome']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="add-din">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSituacao"><em class="fa fa-plus"></em></button>
                                    </div>-->
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Local da Manutenção:</label><br>
                                    <select  style="width: 100%!important" class="select2" name="local" id="local" required>
                                        <option value="" selected disabled>-- Selecione um Local --</option>
                                        <option value="EXTERNA" <?php if($os != null){if($os['os_local'] != 'EXTERNA'){echo "selected";}} ?>>Manutenção Externa</option>
                                        <option value="INTERNA" <?php if($os != null){if($os['os_local'] != 'INTERNA'){echo "selected";}} ?>>Manutenção Interna</option>
                                    </select>
                                </div>
                                <div class="col-md-8 form-group">
                                    <label>Prestador do Serviço:</label><br>
                                    <div class="sel-with-add">
                                        <select  style="width: 100%!important" class="select2" name="fornecedor" id="fornecedor" required>
                                            <option value="" selected disabled>-- Selecione o Prestador --</option>
                                            <?php foreach($fornecedores as $for){
                                                $sel = "";
                                                if($os != null){if($os['os_fornecedor_cpfcnpj'] != $for['fornecedor_cnpj']){$sel = "selected";}}
                                                echo "<option value='".$for['fornecedor_cnpj']."' ".$sel.">".$for['fornecedor_nome']."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="add-din">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFornecedor"><em class="fa fa-plus"></em></button>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Detalhes da Manutenção:</label><br>
                                    <textarea class="form-control" name="detalhes" id="detalhes" placeholder="Detalhes da Manutenção..." rows="5" required><?php if($os != null){echo $os['os_detalhe'];} ?></textarea>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12">
                            <br><br>
                            <div class="row" style="margin-bottom: 50px">
                                <div class="col-md-12 text-center">
                                    <a href="<?php echo base_url('ordemdeservicos') ?>" class="btn btn-danger">Cancelar</a>
                                    &nbsp;&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-primary"><?php if($os != null){echo "Editar";}else{echo "Abrir";} ?> Ordem</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
            <div class="modal fade" id="modalSituacao" tabindex="-1" role="dialog" aria-labelledby="modalSituacaoLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalSituacaoLabel">Nova Situação de Manutenção</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="escondeSituacao()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome da Situação</label><br>
                                    <input type="text" class="form-control" id="nome_sit" placeholder="Nome">
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="escondeSituacao()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendSituacao()">Cadastrar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modalFornecedor" tabindex="-1" role="dialog" aria-labelledby="modalFornecedorLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                        <div class="modal-header">
                            <div class="row row-c">
                                <div class="col-md-10">
                                    <h4 class="modal-title" id="modalFornecedorLabel">Novo Fornecedor</h4>
                                </div>
                                <div class="col-md-2 text-right">
                                    <button type="button" class="close" onclick="escondeFornecedor()" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-10 form-group">
                                    <label>CPF / CNPJ:</label><br>
                                    <input type="text" class="form-control cpf campo-forn" id="cpf_cnpj" placeholder="000.000.000-00">
                                </div>
                                <div class="col-md-2 form-group">
                                    <button type="button" class="btn btn-primary" onclick="searchFornecedor()" style="margin-top: 25px;"><em class="fa fa-check"></em></button>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Nome do Fornecedor:</label><br>
                                    <input type="text" class="form-control campo-forn" id="nome_forn" placeholder="Nome do Fornecedor" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Ramo de Atividade:</label><br>
                                    <input type="text" class="form-control campo-forn" id="ramo_forn" placeholder="Ramo de Atividade" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>CEP:</label><br>
                                    <input type="text" class="form-control cep campo-forn" id="cep_forn" placeholder="00000-000" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Bairro:</label><br>
                                    <input type="text" class="form-control campo-forn" id="bairro_forn" placeholder="Bairro" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-9 form-group">
                                    <label>Logradouro:</label><br>
                                    <input type="text" class="form-control campo-forn" id="logradouro_forn" placeholder="Logradouro" disabled>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label>Número:</label><br>
                                    <input type="number" class="form-control campo-forn" id="numero_forn" placeholder="00" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Cidade:</label><br>
                                    <input type="text" class="form-control campo-forn" id="cidade_forn" placeholder="Cidade" disabled>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Estado:</label><br>
                                    <input type="text" class="form-control campo-forn" id="estado_forn" placeholder="Estado" disabled>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>E-mail:</label><br>
                                    <input type="email" class="form-control campo-forn" id="email_forn" placeholder="email@email.com" disabled>
                                </div>
                            </div>
                        </div>
                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-left" onclick="escondeFornecedor()">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="sendFornecedor()">Cadastrar</button>
                        </div>

                    </div>
                </div>
            </div>
            
            <!-- ============================================================== -->
            <!-- Start Script Area  -->
            <!-- ============================================================== -->
            
            <script>
                $(document).ready(function(){
                    $('.select2').select2({theme: "bootstrap"});
                    
                    var cpfoptions = {
                        onKeyPress: function (cpf, ev, el, op) {
                            var masks = ['000.000.000-00#', '00.000.000/0000-00'];
                            $('.cpf').mask((cpf.length > 14) ? masks[1] : masks[0], op);
                        }
                    }
                    
                    $('.cpf').val().length > 11 ? $('.cpf').mask('00.000.000/0000-00', cpfoptions) : $('.cpf').mask('000.000.000-00#', cpfoptions);
                    $('.numeral').mask('000000000000');
                    $('.cep').mask('00000-000');
                    
                    <?php if($os != null){ 
                        echo "busca_frota(".$os['os_frota_id'].", 2)";
                    } ?>
                });
            </script>
            
            <script>
                function busca_frota(id, opc){
                    dados = new FormData();
                    dados.append('id', id);
                    $.ajax({
                        url: '<?php echo base_url('manutencao/buscaFrota'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        error: function(xhr, status, error) {
                            alert('busca_frota(): '+xhr.responseText);
                        },
                        success: function(data) {
                            if(data != "null" && data != "" && data != " " && data != null){
                                var ex = data.split('###');
                                $('#desc').val(ex[0]);
                                if(opc == 1){
                                    $('#km_atual').val(ex[1]);
                                    if(ex[2] != ""){
                                        $('#km_anterior').val(ex[2]);
                                    }
                                }
                            }else{
                                alert("Erro no banco");
                            }
                        },
                    });
                }
            </script>
            
            <script>
                function escondeSituacao(){
                    $('#nome_sit').val("");
                    $('#modalSituacao').modal('hide');
                }
            
                function sendSituacao(){
                    if($('#nome_sit').val() != "" && $('#nome_sit').val() != " "){
                        dados = new FormData();
                        dados.append('nome', $('#nome_sit').val());
                        $.ajax({
                            url: '<?php echo base_url('manutencao/situacaoDinamica'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(err) {
                                console.log('sendSituacao(): '+err.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    var e = data.split('###');
                                    escondeSituacao();
                                    atualizaSituacao(e[0], e[1]);
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        alert('Por favor informe um nome válido!');
                    }
                }
                
                function atualizaSituacao(nome, id){
                    $('#situacao').append('<option value="'+id+'">'+nome+'</option>');
                }
            </script>
            
            <script>
                function escondeFornecedor(){
                    $('.campo-forn').each(function(){
                        $(this).val('');
                        if(!$(this).hasClass('cpf')){
                            $(this).prop('disabled', true);
                        }
                    });
                    $('#modalFornecedor').modal('hide');
                }
                
                function searchFornecedor(){
                    if($('#cpf_cnpj').val().replace(/[^\d]+/g,'').length == 11 || $('#cpf_cnpj').val().replace(/[^\d]+/g,'').length == 14){
                        dados = new FormData();
                        dados.append('cpf_cnpj', $('#cpf_cnpj').val().replace(/[^\d]+/g,''));
                        $.ajax({
                            url: '<?php echo base_url('manutencao/searchFornecedor'); ?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            error: function(err) {
                                console.log('searchFornecedor(): '+err.responseText);
                            },
                            success: function(data) {
                                if(data != "null" && data != "" && data != " " && data != null){
                                    if(data == '1'){
                                        alert('Este CPF / CNPJ já está cadastrado no sistema!');
                                    }else{
                                        $('.campo-forn').each(function(){
                                            $(this).prop('disabled', false);
                                        });
                                    }
                                }else{
                                    alert("Erro no banco");
                                }
                            },
                        });
                    }else{
                        alert('Por favor informe um CPF / CNPJ válido!');
                    }
                }
                
                
                $("#cep_forn").keyup(function(){
                    if($("#cep_forn").val().length == 9){
            			var cep = this.value.replace(/[^0-9]/, "");
            			var url = "https://viacep.com.br/ws/"+cep+"/json/";
            			if(cep.length != 8){
            				return false;
            			}
            			$.getJSON(url, function(dadosRetorno){
            				try{
            					$("#logradouro_forn").val(dadosRetorno.logradouro);
            					$("#bairro_forn").val(dadosRetorno.bairro);
            					$("#cidade_forn").val(dadosRetorno.localidade);
            					$("#estado_forn").val(dadosRetorno.uf);
            				}catch(ex){
            				    alert("Erro na captura dos dados a partir do CEP: " + ex);
            				}
            			});
                    }
            	});
                
                function sendFornecedor(){
                    if($('#cpf_cnpj').val().replace(/[^\d]+/g,'').length == 11 || $('#cpf_cnpj').val().replace(/[^\d]+/g,'').length == 14){
                        if($('#nome_forn').val() != "" && $('#nome_forn').val() != " "){
                            if($('#ramo_forn').val() != "" && $('#ramo_forn').val() != " "){
                                if($("#cep_forn").val().length == 9){
                                    if($('#bairro_forn').val() != "" && $('#bairro_forn').val() != " "){
                                        if($('#logradouro_forn').val() != "" && $('#logradouro_forn').val() != " "){
                                            if($('#numero_forn').val() != "" && $('#numero_forn').val() != " "){
                                                if($('#cidade_forn').val() != "" && $('#cidade_forn').val() != " "){
                                                    if($('#estado_forn').val() != "" && $('#estado_forn').val() != " "){
                                                        if($('#email_forn').val() != "" && $('#email_forn').val() != " "){
                                                            
                                                            dados = new FormData();
                                                            dados.append('id', $('#cpf_cnpj').val().replace(/[^\d]+/g,''));
                                                            dados.append('nome', $('#nome_forn').val());
                                                            dados.append('ramo', $('#ramo_forn').val());
                                                            dados.append('cep', $('#cep_forn').val().replace(/[^\d]+/g,''));
                                                            dados.append('bairro', $('#bairro_forn').val());
                                                            dados.append('log', $('#logradouro_forn').val());
                                                            dados.append('num', $('#numero_forn').val());
                                                            dados.append('cid', $('#cidade_forn').val());
                                                            dados.append('uf', $('#estado_forn').val());
                                                            dados.append('email', $('#email_forn').val());
                                                            $.ajax({
                                                                url: '<?php echo base_url('manutencao/fornecedorDinamico'); ?>',
                                                                method: 'post',
                                                                data: dados,
                                                                processData: false,
                                                                contentType: false,
                                                                error: function(err) {
                                                                    console.log('sendFornecedor(): '+err.responseText);
                                                                },
                                                                success: function(data) {
                                                                    if(data != "null" && data != "" && data != " " && data != null){
                                                                        atualizaFornecedor(data);
                                                                        escondeFornecedor();
                                                                    }else{
                                                                        alert("Erro no banco");
                                                                    }
                                                                },
                                                            });
                                                            
                                                        }else{alert('Por favor digite um e-mail válido!');}
                                                    }else{alert('Por favor digite um estado válido!');}
                                                }else{alert('Por favor digite uma cidade válido!');}
                                            }else{alert('Por favor digite um número válido!');}
                                        }else{alert('Por favor digite um logradouro válido!');}
                                    }else{alert('Por favor digite um bairro válido!');}
                                }else{alert('Por favor digite um CEP válido!');}
                            }else{alert('Por favor digite um ramo de atividade válido!');}
                        }else{alert('Por favor digite um nome válido!');}
                    }else{alert('Por favor digite um CPF /CNPJ válido!');}
                }
                
                function atualizaFornecedor(id){
                    $('#fornecedor').append('<option value="'+id+'">'+$('#nome_forn').val()+'</option>');
                }
            </script>
            