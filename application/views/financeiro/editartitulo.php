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
                .row-c{
                    width: 110%;
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
                .sel-with-add{
                    width: calc(100% - 65px);
                    display: inline;
                    float: left;
                }
                .sel-with-add select{
                    width: 100%;
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
                                <form action="<?php echo base_url('financeiro/atualizaTitulo') ?>" method="post">
                                    
                                <input type="hidden" name="id_editar" id="id_editar" value="<?php echo $titulo['titulos_id'] ?>">
                                
                                <div class="row" style="margin-top: 1%; margin-bottom: 1%">
                                    <div class="col-md-12">
                                        <div id="conclusao">
                                            <div class="row">
                                                <div class="col-md-12 text-center form-group">
                                                    <h3><b>EDIÇÃO DE TÍTULO</b></h3>
                                                    <hr style="margin-top: 0">
                                                </div>
                                                
                                                <div class="col-md-3 form-group">
                                                    <label for="numser"><b>N° Doc:</b></label>
                                                    <input class="form-control" type="text" name="numser" id="numser" maxlength="26" value="<?php echo $titulo['titulos_numeroserie'] ?>">
                                                </div>
                                                <div class="col-md-3 form-group">
                                                    <label for="tipo"><b>Tipo:</b></label>
                                                    <select onchange="buscarEspecie()" style="width: 100%!important" class="select2" id="tipo" name="tipo">
                                                        <option value="" selected disabled> Selecione </option>
                                                        <option value="ENTRADA">Entrada</option>
                                                        <option value="SAIDA">Saída</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label for="tipo"><b>Espécie:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="especie" name="especie" required>
                                                        <option value="" selected disabled> Selecione </option>
                                                        
                                                    </select>
                                                </div>
                                                
                                                
                                                <div class="col-md-3 form-group">
                                                    <label><b>Data Vencimento:</b></label>
                                                     <input class="form-control" type="date" name="vencimento" id="vencimento" value="<?php echo $titulo['titulos_vencimento'] ?>">
                                                </div>

                                                <div class="col-md-2 form-group">
                                                    <label><b>Valor: </b></label>
                                                    <input type="text" name="valor" id="valor" class="valor form-control" value="<?php echo $titulo['titulos_valor'] ?>">
                                                </div>
                                                
                                                <div class="col-md-2 form-group">
                                                    <label><b>N° OS: </b></label>
                                                    <input type="text" name="numos" id="numos" class="form-control" value="<?php echo $titulo['titulos_numos'] ?>">
                                                </div>
                                                
                                                <div class="col-md-5 form-group">
                                                    <label for="fornecedor"><b>Tomador:</b></label>
                                                    <select style="width: 100%!important" class="select2" id="forneclin" name="forneclin" required>
                                                        <option value="" selected disabled>Selecione o Tomador</option>
                                                        <?php foreach($forcli as $fcs){?>
                                                        <option value="<?php echo $fcs['id'];?>"><?php echo ucwords(strtolower($fcs['nome']));?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                                
                                                
                                                
                                                
                                                

                                                <div class="col-md-12 form-group">
                                                    <label><b>Observação:</b></label>
                                                    <textarea style="height: 100px" class="form-control" name="obs" id="obs"><?php echo $titulo['titulos_observacao'] ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <hr style="position: relative;margin: 0;top: 10px;">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row" style="position: relative;top: calc(100% - 25px)!important;">
                                                        <div class="col-md-12 text-right">
                                                            <a href="<?php echo base_url('movimentosfinanceiro') ?>"><button type="button" class="btn btn-secondary">Voltar</button></a>
                                                            <button type="submit" class="btn btn-primary">Editar</button>
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
                    $('.select2').select2({theme: "bootstrap"});
                    $('.valor').mask("#.##0,0000", {reverse: true});
                    $('#forneclin').val('<?php echo $titulo['titulos_forneclin'] ?>').change();
                    $('#tipo').val('<?php echo $titulo['titulos_IO'] ?>').change();
                    $('#especie').val('<?php echo $titulo['titulos_tipo'] ?>').change();
                })
            </script>
            
            <script>
                function buscarEspecie(){
                    dados = new FormData();
                    dados.append('tipo', $('#tipo').val());
                    $.ajax({
                        url: '<?php echo base_url('financeiro/pegarEspecies'); ?>',
                        method: 'post',
                        data: dados,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        error: function(xhr, status, error) {
                            alert('baixaTitulo(value): Erro, verifique o console');
                            console.log('baixaTitulo(value): '+xhr.responseText);
                        },
                        success: function(data) {
                            $('#especie').empty();
                            
                            for(i = 0; i < data.length;i++){
                                $('#especie').append($('<option>', {
                                    value: data[i].tm_id,
                                    text: data[i].tm_nome,
                                }));
                            }
                        },
                    });
                }
            </script>

 

            
