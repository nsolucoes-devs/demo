            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer" style="font-size: 11px; text-align: right;">
                 Gestão de Frotas | NSoluções &copy; 2021. Versão 2.0.1.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><h3>Atualizar a sua senha</h3></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url('trocasenha');?>" method="post">
                            <input type="password" id="senha" name="senha" maxlength="11">
                            <button type="submit" class="btn btn-primary">Salvar nova senha</button>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <?php if($senha == true){?>
                <script>
                    $(document).ready(function() {
                        $('#exampleModal').modal('show');
                    })
                </script>
            <?php }?>        
        
        
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('resources');?>/js/popper.min.js"></script>
    <!--<script src="<?php echo base_url('resources');?>/lib/bootstrap/js/bootstrap.min.js"></script>-->
    
    <script src="<?php echo base_url('template/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('template/dist/js/app-style-switcher.js') ?>"></script>
    <script src="<?php echo base_url('template/dist/js/waves.js') ?>"></script>
    <script src="<?php echo base_url('template/dist/js/sidebarmenu.js') ?>"></script>
    <script src="<?php echo base_url('template/dist/js/custom.js') ?>"></script>
    <script src="<?php echo base_url('template/assets/libs/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?php echo base_url('template/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
    <script src="<?php echo base_url('template/dist/js/pages/dashboards/dashboard1.js') ?>"></script>
    
    <script src="<?php echo base_url('resources/js/datatables/datatable/js/jquery.dataTables.js')?>" charset="utf8"></script>
	<script src="<?php echo base_url('resources/js/datatables/datatable/js/jquery.dataTables.min.js');?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('resources/js/datatables/datatable/js/dataTables.bootstrap.min.js');?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('resources/js/select2/dist/js/select2.min.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('resources/js/select2-multi-checkboxes/select2.multi-checkboxes.js'); ?>" type="text/javascript" ></script>
    <script src="<?php echo base_url('resources');?>/js/jquery_mask/dist/jquery.mask.min.js" type="text/javascript" ></script>
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script type="application/javascript">
        $(document).ready(function() {
            $('.select2-search').select2({theme: "bootstrap"});

            $('.money').mask("#.##0,00", {reverse: true});
            $('.cep').mask('00000-000') ;
            $('.phone').mask('0000-0000');
        });
        
        function inicializaSelectPneu(){
            $('.pneu').select2({theme: "bootstrap"});
        }
        
    </script>
    
    <script>
        function mostraInfo(){
            Swal.fire(
                'O que são esses itens destacados em vermelho?',
                'Estes itens em vermelho são os itens que possuem a situação "Inativo", eles aparecem apenas para quem possue o nível de permissão de reativação.',
                'info'
            )
        }
    </script>

</body>

</html>
