<style>
@media print {
      .body * {
        visibility: hidden;
      }
      .printable, .printable * {
        visibility: visible;
      }
      .dontprint{
        visibility: hidden;  
      }
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="card-body d-flex justify-content-center" style="position:absolute; margin: 8px 15px;">
                    <button type="button" class="btn btn-secondary dontprint" onclick="Impressao()">Imprimir</button>
                </div>
                <div class="row">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table printable" style="width:-webkit-fill-available;">
                                            <thead>
                                                <tr style="height:35px;">
                                                    <th colspan="3" style="text-align:center">CHECK-LIST - CAMINHÕES DAMETTO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr style="height:35px;">
                                                    <td colspan="3">Local: <?php echo $local;?></td>
                                                </tr>
                                                <tr style="height:35px;">    
                                                    <td>Data: <?php echo $data;?></td>
                                                    <td>Placa: <?php echo $placa; ?></td>
                                                    <td>Hodômetro: <?php echo $hodômetro; ?></td>
                                                </tr>
                                                <tr style="height:35px;">
                                                    <td colspan="3">Responsável pela Inspeção: <?php echo $responsavel;?></td>
                                                </tr>
                                                <tr style="height:35px;">    
                                                    <td colspan="3">Chave de Validação: <?php echo $chave;?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" >
                                        <table class="table" style="border: 2px solid black; width:-webkit-fill-available;">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width:50%">Chech-List - Itens</th>
                                                    <th scope="col">Conferido</th>
                                                    <th scope="col">Observações</th>
                                                    <th>Foto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $cat=0; for($i=0; $i<count($itens); $i++){?>
                                                    <tr style="height:35px;">
                                                    <?php if($itens[$i]['item_categoria_id'] != $cat){
                                                        $cat = $itens[$i]['item_categoria_id'];
                                                        for($j=0; $j<count($categorias); $j++){
                                                            if($cat == $categorias[$j]['categoria_id']){
                                                                $categoriaNome = $categorias[$j]['categoria_nome'];
                                                            }
                                                        }
                                                    ?>
                                                        <td colspan="4" style="border:2px solid black; margin-top:10px; color:white; background-color:lightslategrey;">
                                                            <?php echo $categoriaNome;?>
                                                        </td>
                                                    </tr>
                                                    <tr style="height:35px;">
                                                        <?php }?>
                                                        <td style="margin-top:10px;">
                                                            <?php echo $itens[$i]['item_nome'];?>
                                                        </td>
                                                        <td style="margin-top:10px; text-align:-webkit-center;">
                                                            <div class="form-check" style="pointer-events:none">
                                                                <input class="form-check-input" type="checkbox" <?php if($checados[$i] == "S"){echo "checked";}?> >
                                                            </div>
                                                        </td>
                                                        <td style="margin-top:10px; text-align:-webkit-center;">
                                                            <?php echo $observacoes[$i];?>
                                                        </td>
                                                        <?php if($itens[$i]['item_foto'] == 1){?>
                                                        <td style="margin-top:10px; text-align:-webkit-center;">
                                                            <?php if($fotos[$i] != ""){ ?><a href="<?php echo base_url('imagens/checklist/'.$fotos[$i]);?>" target="_blank"><button type="button" class="btn btn-light"><span class="material-icons">image</span></button></a><?php } ?>
                                                        </td>
                                                        <?php }else{?>
                                                            <td></td>
                                                        <?php }?>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Desenvolvido por <a href="https://nsolucoes.digital/" target="_blank">NSoluções</a> &copy; 2020. Versão 1.1.101.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
</body>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script>
        function Impressao(){
            window.print();
        }
    </script>