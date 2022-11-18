            <style>
            
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    border-radius: 5px;
                }
                .white-tab{
                    background-color: white;
                    border-radius: 5px;
                }
                .local{
                    padding: 6px 9px;
                    border: 1px solid #e0e0e0;
                    background: #efefef;
                }
                
                .local-active, .local-active p, .local-active i{
                    color: #4a4646!important;
                    background: #dfecf5!important;
                }
                .local-con, .local-con p{
                    color: #4a4646!important;
                    background: #dfecf5!important
                }
                
                .local-con i{
                    color: #20c34b!important;
                }
                
                .local-i{
                    color: #c3c3c3;
                    font-size: 30px;
                    margin-left: calc(100% - 25px);
                    margin-top: -12px;
                    margin-left: 10px;
                }
                .local-title{
                    font-size: 11px;
                    text-transform: uppercase;
                    color: #c3c3c3;
                }
                .dataTables_wrapper .row{
                    width: 101%;
                    margin-bottom: 15px;
                }
                .encurtar{
                    display: -webkit-box;
                    overflow: hidden;
                    -webkit-line-clamp: 1;
                    -webkit-box-orient: vertical;
                    word-break: break-word;
                    line-height: 11px!important;
                }
                
                .swal2-title{
                    font-size: 25px;
                }
                .swal2-content{
                    font-size: 20px;
                }
                .swal2-styled.swal2-confirm{
                    font-size: 15px;
                }
                .check-inside{
                    width: 18px;
                    height: 18px;
                }
                .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
                    padding: 3px!important;    
                }
                .pagination{
                    width: 700px!important;
                    margin: 1px 0!important;
                }
                .pagination>li>a, .pagination>li>span{
                    padding: 2px 7px!important;
                    margin: -3px 0;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button{
                    padding: 0!important;
                }

                
                
                
                
                
.custom-control-label { 
  padding-top: 0.5rem;
  padding-left: 2rem;
  padding-bottom: 0.1rem;
}

.custom-switch .custom-control-label::before {
  left: -2.25rem;
  height: 2rem;
  width: 3.5rem;    
  pointer-events: all;
  border-radius: 1rem;
}

.custom-switch .custom-control-label::after {
  top: calc(0.25rem + 2px);
  left: calc(-2.25rem + 2px);
  width: calc(2rem - 4px);   
  height: calc(2rem - 4px);  
  background-color: #adb5bd;
  border-radius: 2rem;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .custom-switch .custom-control-label::after {
    transition: none;
  }
}

.custom-switch .custom-control-input:checked ~ .custom-control-label::after {
  background-color: #fff;
  -webkit-transform: translateX(1.5rem); //translateX(0.75rem);
  transform: translateX(1.5rem); //translateX(0.75rem);
}

.custom-control-input:checked~.custom-control-label:before {
    color: #fff;
    border-color: #6dca4b!important;
    background-color: #6dca4b!important;
}
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                @media (min-width: 500px){
                    .swal2-popup.swal2-modal.swal2-show{
                        width: 40%;
                    }
                }
            </style>

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12">
                        <div class="change-tab-div white-tab">
                            <div class="col-md-12" style="background-color:white; border-radius: 5px">
                                <form action="<?php echo base_url('financeiro/baixatitulo') ?>" method="post">
                                <input type="hidden" name="tituloId" id="tituloId" value="<?php echo $titulo['titulos_id'] ?>">
                                <div class="row" style="margin-top: 1%; margin-bottom: 1%">
                                    <div class="col-md-12">
                                        <div id="conclusao">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>VISUALIZAÇÃO DE BAIXA</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="numser"><b>N° Doc:</b></label>
                                                    <input class="form-control" type="text" name="numser" id="numser" maxlength="26" value="<?php echo $titulo['titulos_numeroserie'] ?>" required readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="numser"><b>N° OS:</b></label>
                                                    <input class="form-control" type="text" name="numos" id="numos" maxlength="26" value="<?php echo $titulo['titulos_numos'] ?>" required readonly>
                                                </div>
                                                <div class="col-md-5 form-group">
                                                    <label for="fornecedor"><b>Tomador:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forneclin" name="forneclin" required disabled>
                                                        <option value="" selected disabled>Selecione o Tomador</option>
                                                        <?php foreach($forcli as $fcs){?>
                                                        <option value="<?php echo $fcs['id'];?>"><?php echo ucwords(strtolower($fcs['nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data Vencimento:</b></label>
                                                     <input class="form-control" type="date" name="vencimento" id="vencimento" value="<?php echo $titulo['titulos_vencimento'];?>" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data Baixa:</b></label>
                                                     <input class="form-control" type="date" name="baixa" id="baixa" value="<?php echo $titulo['titulos_data_baixa'];?>" readonly>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="forma"><b>Forma de pagamento:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forma" name="forma" disabled>
                                                        <option value="" disabled selected> Selecione </option>
                                                        <option value='DINHEIRO'>DINHEIRO</option>
                                                        <option value='PIX'>PIX</option>
                                                        <option value='TRANSFERENCIA'>TRANSFERÊNCIA</option>
                                                        <option value='BOLETO'>BOLETO</option>
                                                        <option value='CARTÃO DE CREDITO'>CARTÃO DE CRÉDITO</option>
                                                        <option value='PERMUTA'>PERMUTA</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label><b>Total Baixa: </b></label>
                                                    <input type="text" name="conTotal" id="conTotal" class="form-control" value="R$ <?php echo number_format($titulo['titulos_valorpago'],4,',','.') ?>" readonly>
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-4 form-group">
                                                    <label for="tipo"><b>Tipo:</b></label>
                                                    <input type="text" class="form-control" value="<?php echo $titulo['titulos_IO'] ?>" readonly>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="tipo"><b>Espécie:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="especie" name="especie" required disabled>
                                                        <option value="" selected disabled> Selecione </option>
                                                        <?php foreach($tipos_e as $cnt){?>
                                                            <option value="<?php echo $cnt['tm_id'];?>"><?php echo ucwords(strtolower($cnt['tm_nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label for="tipo"><b>Responsável:</b></label>
                                                    <input type="text" class="form-control" value="<?php echo $usuario['usuario_nome'] ?>" readonly>
                                                </div>
                                                
                                                <div class="col-md-5 form-group">
                                                    <label><b>Rateio Frotas:</b></label>
                                                    <textarea style="height: 150px" class="form-control" disabled><?php echo $rateio ?></textarea>
                                                </div>
                                                <div class="col-md-7 form-group">
                                                    <label><b>Observação:</b></label>
                                                    <textarea style="height: 150px" class="form-control" disabled><?php echo $titulo['titulos_observacao'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 10px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 20px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <button type="button" onclick="releaseBaixa()" id="btnBaixaChange" class="btn btn-danger">Alterar Data Baixa</button>
                                                            <a href="<?php echo base_url('financeiro/baixados') ?>"><button type="button" onclick="rateio('conclusao')" class="btn btn-primary">Voltar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <script>
                $(document).ready(function(){
                    var table = $('#frota').DataTable( {
                        "order": [[ 0, "desc" ]],
                        "language": {
                            "lengthMenu": "",
                            "zeroRecords": "Nenhum registro encontrado",
                            "info": "",
                            "infoEmpty": "",
                            "infoFiltered": "(filtrado _MAX_ dos registros totais)",
                            "sSearch":       "Procurar:",
                            "paginate": {
                                "previous": "Anterior",
                                "next": "Próximo",
                            }
                        },
                    });
                    $('select[name ="multi_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#multi_length').find('.select2').css({
                        'margin-right'  : '5px',
                        'margin-left'   : '5px',
                        'text-align'    : 'center',
                    });
                    
                    $('.select2').select2({theme: "bootstrap"});
                    $('.valor').mask("#.##0,0000", {reverse: true});
                    
                     $('#especie').val(<?php echo $titulo['titulos_tipo'] ?>).change();
                     $('#forneclin').val('<?php echo $titulo['titulos_forneclin'] ?>').change();
                     $('#forma').val('<?php echo $titulo['titulos_formapag'] ?>').change();
                })
            </script>
            <script>
                function conclusao(local){
                    if(local == 'normal'){
                       if($('#restanteFrota').val() == '0,0000'){
                            $('#tipo').hide();
                            $('#div-tipo').removeClass('local-active');
                            
                            $('#detalhe').hide();
                            $('#div-detalhe').removeClass('local-active');
                            
                            $('#rateio').hide();
                            $('#div-rateio').removeClass('local-active');
                            $('#div-rateio').children().children().last().children().removeClass('fa-square-o')
                            $('#div-rateio').children().children().last().children().addClass('fa-check-square-o')
                            $('#div-rateio').addClass('local-con');
                            
                            $('#conclusao').show();
                            $('#div-conclusao').addClass('local-active');
                            
                            mostrarFinal('normal');
                        } else {
                            Swal.fire('','Confira o valor total do rateio das frotas!','error');
                        } 
                    } else {
                        $('#tipo').hide();
                        $('#div-tipo').removeClass('local-active');
                        
                        $('#detalhe').hide();
                        $('#div-detalhe').removeClass('local-active');
                        
                        $('#rateio').hide();
                        $('#div-rateio').removeClass('local-active');
                        $('#div-rateio').children().children().last().children().removeClass('fa-square-o')
                        $('#div-rateio').children().children().last().children().addClass('fa-check-square-o')
                        $('#div-rateio').addClass('local-con');
                        
                        $('#conclusao').show();
                        $('#div-conclusao').addClass('local-active');
                    }
                    
                }
            </script>
            <script>
                function mostrarFinal(local){
                    $('#conTotal').val('R$ ' + $('#valor').val());
                    $('#conForma').val($("#forma option:selected").text());
                    $('#conData').val($('#baixa').val());
                    $('#conVen').val($('#vencimento').val());
                    $('#conForneclin').val($("#forneclin option:selected").text());
                    $('#conEspecie').val($("#especie option:selected").text());
                    $('#conIdentificao').val($('#numser').val());

                    if(local == 'normal'){
                        var rateio = "";
                        
                        $('.Ffrota').each(function(){
                            rateio = rateio + $(this).children().first().html();
                            rateio = rateio + ' - ' + $(this).children().eq(1).html();
                            rateio = rateio + ' - R$' + $(this).children().eq(2).children().val();
                            rateio = rateio + '&#13;';
                        })
                        
                        $('#conRateio').html(rateio);
                    } else {
                        $('#conRateio').html('Não tem rateio de frota');
                    }
                    
                }
            </script>
            <script>
                function releaseBaixa(){
                    var a = document.getElementById('baixa');
                    
                    if(a.readOnly){
                        document.getElementById('baixa').removeAttribute('readonly');
                        document.getElementById('btnBaixaChange').innerText = 'Atualizar';
                    }else {
                        document.getElementById('baixa').readOnly = true;
                        document.getElementById('btnBaixaChange').innerText = 'Alterar Data Baixa';
                        var novaData = document.getElementById("baixa").value;
                        console.log(novaData);
                        updateBaixa(novaData);
                    }
                }
                function updateBaixa(novaData){
                    dados = new FormData();
                    dados.append('idBaixa', <?php echo $this->uri->segment(3);?>);
                    dados.append('novaData', novaData);
		            
                    $.ajax({
                        url: '<?php echo base_url('financeiro/updateBaixaData');?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        
                        error: function(data, xhr, status, error) {
                            console.log(error);
                        },
                        success: function(data) {
                            let timerInterval
                            Swal.fire({
                              title: 'Atualizando!',
                              timer: 1000,
                              timerProgressBar: true,
                              didOpen: () => {
                                Swal.showLoading()
                                const b = Swal.getHtmlContainer().querySelector('b')
                                timerInterval = setInterval(() => {
                                  b.textContent = Swal.getTimerLeft()
                                }, 100)
                              },
                              willClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                console.log('I was closed by the timer')
                              }
                            })
                        },
                    });
                }
                
            </script>
 

            
