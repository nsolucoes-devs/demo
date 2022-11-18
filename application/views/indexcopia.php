<style>
    .page{
        min-height: 5px!important;
    }
    .limited-view{
        overflow-y: auto; 
        overflow-x: hidden; 
        height: 260px; 
    }
</style>

<?php if(isset($calendar)){?>
<style>
            table {
                  width: 100%;
                  font-size: 16px;
            }
            table .header{
                background-color: #033557;
                font-size: 22px;
                font-weight: bold;
                text-align: center;
                color: #ffffff;
            }
            table .week{
                background-color: #D0E4F5;
                font-size: 16px;
                text-align: center;
                color: #000000;
            }
            table .highlight{
                background-color: #033557;
                font-size: 16px;
                text-align: center;
                color: #FFFFFF;
                border-radius: 15px;
                width: 25px;
            }
            table td, table th {
                  border: 1px solid #AAAAAA;
                  padding: 3px 2px;
                  text-align: -webkit-center;
            }
            table a{
                color: red;
            }
</style>
<?php }?>

<?php if(isset($chart)){?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart'], 'language':'pt'});
        google.charts.setOnLoadCallback(drawChart1);
        <?php echo $chart;?>
    </script>
<?php }?>            
<?php if(isset($chart2)){?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart'], 'language':'pt'});
        google.charts.setOnLoadCallback(drawChart2);
        <?php echo $chart2;?>
    </script>
<?php }?>            
<?php if(isset($chart3)){?>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart'], 'language':'pt'});
        google.charts.setOnLoadCallback(drawChart3);
        <?php echo $chart3;?>
    </script>
<?php }?>            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3>Bem vindo(a), <?php $aux = explode(" ", $this->session->userdata('nome')); echo $aux[0]; ?>!</h3>
                    </div>
                </div>
            
            <?php if($datasenha > 90){?>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p><h3><b>Sua senha não é trocada à <?php echo $datasenha;?> dias.</b></h3></p>
                                <p><h4 align="right">Deseja atualizá-la?</h4></p>
                                <button style="float: right;" type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
                                  Atualizar Senha
                                </button>
                            </div>
                        </div>  
                    </div>
                </div>
            
            <?php }?>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <div class="row">
                    <?php if(isset($calendar)){?>
                    <div class="col-md-8">
                        <h1 style="text-align:center"><b>AGENDA FINANCEIRA</b></h1>
                        <h4 style="text-align:center"> Verifique os títulos a pagar por data.</h4>
                        <div class="card">
                            <div class="card-body">
                                <?php echo $calendar; ?>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Alertas</h4>
                                <div class="feed-widget">
                                    <ul class="list-style-none feed-body m-0 p-b-20 limited-view">
                                        <?php 
                                        
                                        $tam = count($notificacoes);
                                        $i = 0;
                                        foreach ($notificacoes as $not){ ?>
                                        <div class="row pt7 <?php if($i < ($tam - 1)){echo "line-bot";} ?>">
                                            <div class="col-md-2">
                                                <div class="bolota2">
                                                    <em class="mdi <?php echo $not['icon'] ?>"></em>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="margin-bottom: 0"><b><?php echo $not['notificacao_tipo'] ?></b></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p style="margin-bottom: 0" class="notifyText2"><?php echo $not['notificacao'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <?php $i++; } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <script type = "text/javascript">
                 google.charts.load('current', {packages: ['corechart']});     
                </script>
                <script language = "JavaScript">
                  function drawChart() {
                  // Define the chart to be drawn.
                   var data = google.visualization.arrayToDataTable([
                    ['Dinheiro', ''],
                    ['Entrada', <?php echo 2000; ?>],
                    ['Saída', 500],
                    ]);

                   var options = {title: 'Movimentação diária:'}; 

                   // Instantiate and draw the chart.
                   var chart = new google.visualization.BarChart(document.getElementById('chart3_div'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
                <div class="row">
                    <?php if(isset($chart)){?> 
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="chart3_div">
                                    <!--GRAFICO AQUI-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if(isset($chart2)){?>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="chart2_div"></div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                    <?php if(isset($chart3)){?>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="chart1_div"></div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>