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
            </style>
    <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title"><b>MANUTENÇÃO</b></h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Cadastros</li>
                                    <li class="breadcrumb-item active" aria-current="page">Fornecedores</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    <section id="main-content">
    <section class="wrapper">
        
        <div class="row">
            <div class="col-md-6">
                <h3>Manutenção > Listagem</h3>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <a href="<?php echo base_url('manutencao/novaManutencao') ?>" class="btn btn-primary" style="margin-top: 20px; border: 1px solid #4ECDC4; background-color: #4ECDC4; color: white">Nova Manutenção</a>
            </div>
        </div>
        
        <hr style="height: 1px; background-color: #ccc; border: none;">
        
        <div class="row" style="margin-left: 0px; margin-right: 0px">
            <div class="col-md-12" style="background-color: white;">
                <br>
                
                <div class="tableFixHead">
                    <table id="myTableManu" class="table table-hover table-bordered">
                          <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                    <th>Frota</th>
                                    <th style="width: 180px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Data</th>
                                    <th>Frota</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                    </table>
                </div>
                
                <br> 
            </div>
        </div>
        <br><br>
    </section>
</section>

<script>

    $(document).ready(function(){
        $('#myTableManu').DataTable( {
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
                {"Tipo": "first", "orderable": true},
                {"Data": "second", "orderable": true},
                {"Frota": "third", "orderable": true},
                {"Ação": "fourth", "orderable": false},
            ],
            initComplete: function () {
                this.api().columns([0]).every( function () {
                    var column = this;
                    var select = $('<select class="js-example-basic-multiple" style="width: 100%"><option value="">Todos</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                             column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                                } );
       
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
                this.api().columns([1]).every( function () {
                    var column = this;
                    var select = $('<select class="js-example-basic-multiple" style="width: 100%"><option value="">Todos</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                             column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                                } );
       
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
                this.api().columns([2]).every( function () {
                    var column = this;
                    var select = $('<select class="js-example-basic-multiple" style="width: 100%"><option value="">Todos</option></select>')
                        .appendTo( $(column.footer()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                             column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                                } );
       
                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }
        } );
    });
</script>