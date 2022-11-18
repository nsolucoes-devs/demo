            <style>
                .tableFixHead          { overflow-y: auto; height: 450px; padding-left: 15px; }
                .tableFixHead thead th { position: sticky; top: 0; }
                
                /* Just common table stuff. Really. */
                table  { border-collapse: collapse; width: 100%; }
                th, td { padding: 8px 16px; }
                th     { background:#eee; }
                
                #text-permissao th{
                    background: white;
                }
                
                .main-row{
                    padding-left: 10px;
                    padding-right: 10px;
                }
                .main-col-12{
                    padding: 20px;
                    background-color: white;
                    border-radius: 5px;
                }
                .dataTables_wrapper .row{
                    width: 101%;
                    margin-bottom: 15px;
                }
                .pagination{
                    margin-top: 0px;
                }
                .dataTables_length label select{
                    margin-left: 10px;
                    margin-right: 10px;
                }
                .row-c{
                    width: 110%;
                    margin-bottom: 15px;
                }
                .btn-primary{
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
                .pagination>.active>a{
                    background-color: #033557;
                }
                .pagination>.active>a:hover{
                    background-color: #033557;
                }
                .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
                    background: white;
                    border-color: white;
                }
                .btn-info-red{
                    float: right;
                    margin-right: 15px;
                    width: 25px;
                    height: 25px;
                    border: 2px solid black;
                    border-radius: 50%;
                    text-align: center;
                    color: red;
                    cursor: pointer;
                }
                .btn-info-red:hover{
                    color: black;
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
                @media (min-width: 500px){
                    .swal2-popup.swal2-modal.swal2-icon-info.swal2-show{
                        width: 40%;
                    }
                }
                .see-pass{
                    width: 10%;
                    margin-left: -4px;
                    margin-top: -2px;
                    border-top-left-radius: 0;
                    border-bottom-left-radius: 0;
                }
                .passwd{
                    width: 50%;
                    display: inline;
                    border-top-right-radius: 0;
                    border-bottom-right-radius: 0;
                }
            </style>
        
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <div class="row main-row">
                    <div class="col-md-12 main-col-12" style="height:450px;">
                    
                    <?php if($this->session->userdata('editar') == 1 ){?>
                        <div style="margin-bottom: 20px">
                            <a class="btn btn-primary" style='color: white' data-toggle="modal" data-target="#modalCheckList" >CheckList</a>
                        </div>
                    <?php }?>
                        <?php if($erro != null){ ?>
                        <div class="row" style="margin-bottom: 20px">
                            <div class="col-md-12">
                                <h3 class="text-danger">Erro: A senha informada estava incorreta, por favor tente novamente!</h3>
                            </div>
                        </div>
                        <?php } ?>
                        <div style="height:100%;">
        				    <iframe id="iframe" style="width:-webkit-fill-available; height:100%;"></iframe>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
           
            <div class="modal fade" id="modalCheckList" tabindex="-1" role="dialog" aria-labelledby="modalCheckListTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h4> Chave do CheckList</h4>
                            <input type="text" id="chave" name="chave">
                        </div>
                        <div class="modal-footer" style="position: relative">
                            <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary see-pass" id="senha_btn" onclick="setaChecklist()"><em class="fa fa-eye"></em></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                function setaChecklist(){
                    $('#modalCheckList').modal('hide');
                    var chave = document.getElementById('chave').value;
                    var src = "https://logistica.nsolucoes.digital/checklist/list/";
                    document.getElementById('iframe').src= src+chave;
                }
            </script>

            <script>
                $(document).ready(function(){
                    $('#myTableFunc').DataTable( {
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
                            {"Categoria": "first", "orderable": true},
                            {"Item": "second", "orderable": false},
                            {"Imagem": "third", "orderable": false},
                            {"Ação": "fourth", "orderable": false},
                        ],
                    } );
                    $('select[name ="myTableFunc_length"]').select2({
                        minimumResultsForSearch: -1,
                        theme: "bootstrap"
                    });
                    $('#myTableFunc_length').find('.select2').css({
                        'margin-right'  : '10px',
                        'margin-left'   : '10px',
                        'text-align'    : 'center',
                    });
                });
            </script>
            
            <script>
            $(document).ready(function() {
                <?php for($i=1; $i<$aux; $i++){?>
                    $("#multiple-<?php echo $i;?>").select2({
                        tags: "true",
                        multiple: "true",
                    });
                <?php }?>
                
                $("#select-frota").select2({});
                $("#select-cliente").select2({});
            };
                
                function setaExcluir(id){
                    document.getElementById('funcao_id').value = id;
                }
                function setaAtivar(id){
                    document.getElementById('funcao_idatv').value = id;
                }
                function senha(){
                    document.getElementById('formsenha').style.display = "block";
                }
                function senha1(){
                    document.getElementById('formsenha1').style.display = "block";
                }
                
            </script>
            
            <script>
                $('.btn-modal-toggle').on('click', function(){
                    $("#modalFuncao").modal('hide');
                    var button = $(this);
                    var recipient = button.data('funcao');
                
                    var dados = {
                            'funcao_id': recipient
                        };
                    $.ajax({
                        url : '<?php echo base_url('cadastros/getFuncaoById') ?>',
                        type : "POST",
                        dataType : "json",
                        data : dados,
                        success : function(response) {
                            res = response[0];
                            
                            $("#text-nome").html(res.funcao_nome);
                            var permissaoTexto = "<table class='table table-hover table-bordered'>"
                                    +"<thead>"
            				            + "<tr>"
            				                + "<th style='width: 32%;'></th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Ver</th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Editar</th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Excluir</th>"
            				                + "<th style='width: 17%; text-align: center; border-bottom: 1px solid black;'>Ativar</th>"
            				            + "</tr>"
        				            + "</thead>"
        				            + "<tbody>";
        				            
                            var permissao = res.funcao_permissao;
                            var permissaoSplit = permissao.split('|');
                        
                            for(var i in permissaoSplit) {
                                permissaoTexto += "<tr>";
                                
                                var permissao = permissaoSplit[i];
                                var codPermissoes = permissao.split('-')[1];
                                
                                var nomeController = permissao.split('-')[0];
                                
                                permissaoTexto += "<th style='border-right: 1px solid black;'>" + nomeController + "</th>";
                                
                                for(var i=0; i<4; i++){
                                    if(codPermissoes.charAt(i) == '0'){
                                        permissaoTexto += "<th style='text-align: center; border: 1px solid black;'><i class='fas fa-times text-danger'></i></th>";
                                    }else { 
                                        permissaoTexto += "<th style='text-align: center; border: 1px solid black;'><i class='fas fa-check text-success'></i></th>";
                                    } 
                                }
                                
                                permissaoTexto += "</tr>";
                            }
                            
                            permissaoTexto += "</tbody></table>";
                            
                            $("#text-permissao").html(permissaoTexto);
                            $("#modalFuncoes").modal('show');
                            
                        },
                        error : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(status + " " + error + " " + err);
                        }
                    });
                });
            </script>
            
            <script>
                $('#senha_btn').on('click', function(){
                    const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
                    $('#senha').prop('type', type);
                    if(type == "text"){
                        $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
                    }else{
                        $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
                    }
                });
            </script>
            