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
                
                <div class="row">
                    <div class="col-12">
                        <form action="<?php echo base_url('checklistFinalizar');?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="chave" value="<?php echo $id;?>">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table printable" style="border: 1px solid black;" >
                                            <thead>
                                                <tr>
                                                    <th colspan="3" style="text-align:center">CHECK-LIST - CAMINHÕES DAMETTO</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3">Local:
                                                        <input class="form-input" type="text" id="local" name="local" style="width: 95%;">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>    
                                                    <td>Data: <?php echo $data;?></td>
                                                    <td>Placa: <?php echo $placa; ?></td>
                                                    <td>Hodômetro: <?php echo $hodômetro; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">Responsável pela Inspeção:
                                                        <input class="form-input" type="text" id="responsavel" name="responsavel" style="width: 80%;">
                                                    </td>
                                                    
                                                </tr>
                                                <tr>    
                                                    <td colspan="3">Chave de Validação: <?php echo $id;?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" >
                                        <table class="table" style="border: 1px solid black;">
                                            <thead>
                                        <tr>
                                            <th scope="col">Chech-List - Itens</th>
                                            <th scope="col">Confere</th>
                                            <th scope="col">Observação</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                        <?php $cat=0; foreach($itens as $itn){
                                            if($cat != $itn['item_categoria_id']){
                                                $cat = $itn['item_categoria_id'];
                                            ?>
                                            <tr>
                                                <td colspan="4" style="color:white; background-color:lightslategrey">
                                                    <?php echo $itn['item_categoria'];?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $itn['item_nome'];?>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="S" name="id-<?php echo $itn['item_id'];?>">
                                                        <label class="form-check-label" for="<?php echo $itn['item_id'];?>">
                                                            &nbsp&nbsp&nbsp&nbspOK!
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" id="obs-<?php echo $itn['item_id'];?>" name="obs-<?php echo $itn['item_id'];?>" class="dontprint">
                                                </td>
                                                <?php if($itn['item_foto'] == 1){?>
                                                <td>
                                                    <input type="file" class="form-control-file dontprint" id="foto-<?php echo $itn['item_id'];?>" name="foto-<?php echo $itn['item_id'];?>" accept="image/png,image/jpeg,image/jpg,image/bmp" >
                                                </td>
                                                <?php }else{?>
                                                    <td></td>
                                                <?php }?>    
                                            </tr>
                                        <?php }else{?>
                                            <tr>
                                                <td>
                                                    <?php echo $itn['item_nome'];?>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="S" name="id-<?php echo $itn['item_id'];?>">
                                                        <label class="form-check-label" for="<?php echo $itn['item_id'];?>">
                                                            &nbsp&nbsp&nbsp&nbspOK!
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" id="obs-<?php echo $itn['item_id'];?>" name="obs-<?php echo $itn['item_id'];?>" >
                                                </td>
                                                <?php if($itn['item_foto'] == 1){?>
                                                <td>
                                                    <input type="file" class="form-control-file dontprint" id="foto-<?php echo $itn['item_id'];?>" name="foto-<?php echo $itn['item_id'];?>" accept="image/png,image/jpeg,image/jpg,image/bmp" >
                                                </td>
                                                <?php }else{?>
                                                    <td></td>
                                                <?php }?>
                                            </tr>
                                        <?php }}?>
                                    </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary dontprint">Finalizar</button>&nbsp
                                    <button type="button" class="btn btn-secondary dontprint" onclick="Impressao()">Imprimir</button>
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
                Desenvolvido por <a href="https://nsolucoes.digital/" target="_blank">NSoluções</a> &copy; 2020. Versão 1.1.227.
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
    <script>
        function Impressao(){
            alert("Apenas irá imprimir seu relatório, não esqueça de finalizar para salvar os dados!");
            window.print();
        }
    </script>