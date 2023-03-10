<!doctype html>
<? if($this->uri->segment(1) == 'futebol' || $this->uri->segment(1) == 'futbol'  ){ ?>
<html dir="ltr" lang="pt-br">
<? } ?>

<? if($this->uri->segment(1) == 'bets'){ ?>
<html dir="ltr" lang="en-GB">
<? } ?>
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="<?=base_url()?>jack/node_modules/bootstrap/compilados/bootstrap.css">
   

  <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 
    
  <meta charset="UTF-8">
 
    <title> Histórico de Corridas</title>
   
   
    <style type="text/css">
      .bt_mkt:active{
        background-color: #ffb900;
      
}      .bt_mkt:hover{
        background-color: #ffb900;
      }

      .bt_mkt .card-body:hover{
        background-color: #ff0000;
      }

      .bgbtmkt:hover{
        background-color: #ffb900;
      }

      .bgbtmkt:active{
        background-color: #ffb900;
      }

       

    </style>


<!--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script src="<?=base_url()?>highcharts/code/highcharts.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/data.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/series-label.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>
-->
<script src="<?=base_url()?>highcharts/code/highcharts.js"></script>
<!--
<script src="<?=base_url()?>highcharts/code/highcharts-3d.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>
-->
<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />


  </head>



  <body>
  



   
<?php #include("includes/2019/header.php");?>
<!-- NAVBAR END--->

<!-- BREADCRUMB -->
<style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .breadcrumb-item,.breadcrumb-item a{font-size: 11px}
  <? } ?>

</style>

<!-- END BREADCRUMB -->




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">




<!-- CONTAINER MAIN -->
        <div class="container p-0">

          <div class="row">

            <div class="container pl-1 pr-1"> <!-- LINHA -->
              <div class="col-lg-12 col-sm-12 col-12 order-sm-1 border-top"></div>
            </div>


<!-- END COLUNA-1 -->

    


<!-- COLUNA 2 -->
            <div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">



              <div class="row" id="topo"></div>

              

             
              
            <div class="card my-1 slideInUp animated" >

                <div class="card-header flipIn animated">

                  <h2>Filtros <?=$ordem?>º</h2>

                  <form action="<?=base_url()?>horses/favoritos" method="post" style=''>
                    <div class="form-group">
                    <input type="number" name="ordem" class="form-control form-text" value="1" placeholder="ORDEM">
                    <br />
                    
                    <input type="text"  name="pista" class=" form-control form-text" placeholder="Pista">
                    <br>
                    <!--
                    <select name="pista" class="form-text text-muted">
                      <option value="" selected="selected">Pistas (<?=$pistas->num_rows()?>)</option>>
                      <? /* foreach($pistas->result() as $pista){ ?>
                        <option value="<?=$pista->menu_hint?>"><?=$pista->menu_hint?></option>
                      <? } */  ?>
                    </select> 
                  -->

                    

                    <input type="text"  name="distancia" class="form-control form-text" placeholder="Distância">
                    <!--
                    <select name="pista" class="form-control">
                      <option class="form-text text-muted" value="" selected="selected">Distâncias  (<?=$distancias->num_rows()?>)</option>>
                      <? /* foreach($distancias->result() as $distancia){ ?>
                        <option class="form-text text-muted" value="<?=$distancia->event_name?>"><?=$distancia->event_name?></option>
                      <? } */ ?>
                    </select>
                  -->
                    <br>

                    <input type="text" name="odd2" class="form-control" style="width: 300px;float: right" placeholder="ODD 2 menor que:">

                    <input type="text"  name="odd1" class="form-control" style="width: 300px;" placeholder="ODD 1 Maior que:">

                    <br />


                    <input type="text"  name="ipmin" class="form-control form-text" placeholder="IPMIN">
                    
                    <br>

                    <input type="text" name="data_de" class="form-control" style="width: 300px;" placeholder="(Entre) dd/mm/aaaa">


                    <input type="text"  name="data_ate" class="form-control" style="width: 300px;" placeholder="(E) dd/mm/aaaa ">
                    <br />
                    <input type="submit" value="Buscar" class="btn btn-primary">

                  </div>
                    
                  </form>


                </div>
            </div>
            
<!--CARD MODELO -->
              


              <div class="card my-1 slideInUp animated" >

                <div class="card-header flipIn animated">

            
              <? if($_POST){ ?>

                <h3 class="page-header mb60"><?=$qr_vencedores->num_rows()?> resultados</h3>
                <? if(strlen($_POST['distancia']) > 1){  ?>
                  <p>
                    Distancia: <strong><?=$_POST['distancia']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['pista']) > 1){  ?>
                  <p>
                    Pista: <strong><?=$_POST['pista']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['odd1']) > 0){  ?>
                  <p>
                    Odd De: <strong><?=$_POST['odd1']?></strong> até Odd De: <strong><?=$_POST['odd2']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['ipmin']) > 0){  ?>
                  <p>
                    IPMIN <=  <strong><?=$_POST['ipmin']?></strong>
                  </p>
                <? } ?>

              <? }  ?>




                </div>

              <?
              $lucro_total = 0;
              $total_perda = 0;

              ?>

                <? if($qr_vencedores->num_rows() == 0){ ?>
                    <h3 class="page-header mb60">Nenhuma corrida registrada</h3>
                <? }else{ ?>

                <div class="container">

                  <div class="row">

                    <div id="container" class="box_refresh" style="width: 100%; height: 400px; margin: 0 auto"></div>
                    

                  </div>


                  <div class="row">

                    
                  <div class="col-sm" style="background-color: lightgreen">
                      
                    <h2>Vencedores (<? print_r($qr_vencedores_total->row()->tudo)?>) </h2>
                
                        <?
                          $lucro_total = 0;  
                          foreach($qr_vencedores->result() as $dd_venc){
                            if($_POST){
                              if(strlen($_POST['ipmin']) > 0){
                                $lucro =  ($_POST['ipmin'] * 93) - 93;
                                $multiplicador = $_POST['ipmin'];
                              }else{
                                $lucro =  ($dd_venc->bsp * 93) - 93;
                                $multiplicador = $dd_venc->bsp;

                              }
                            }else{
                              $lucro =  ($dd_venc->bsp * 93) - 93;
                              $multiplicador = $dd_venc->bsp;
                            }
                            $lucro_total += $lucro;

                        ?>
                            <p>
                            <strong><?=$dd_venc->data_evento?> - <?=$dd_venc->menu_hint?></strong> <i><?=$dd_venc->event_name?></i> <br/> 
                              $<u><?=$lucro_total?></u> ---- 
                              93 * <?=$multiplicador?> 
                              | Lucro: <strong><?=$lucro?></strong>-- 
                              <br />
                              -----------------IPMIN <strong><?=$dd_venc->ipmin?></strong><br />
                              -----------------BSP <strong><?=$dd_venc->bsp?></strong>
                            </p>
                        <? } ?>

                         
                    </div>



                    <div class="col-sm" style="background-color: #900;color:white">
                      <h2>Perdedores (<?=$qr_perdedores_total->row()->tudo?>) </h2>
                
                        <?  
                          $total_perda = $qr_perdedores_total->row()->tudo * 100;
                          $total_sub = 0;
                          foreach($qr_perdedores->result() as $dd_perd){ 
                            $total_sub -= -100;

                        ?>

                            <p> - <?=$total_sub?> - 100  </p>

                            <p>
                            <strong><?=$dd_perd->data_evento?> - <?=$dd_perd->menu_hint?></strong> <i><?=$dd_perd->event_name?></i> <br/> 
                              <br />
                              -----------------IPMIN <strong><?=$dd_perd->ipmin?></strong><br />
                              -----------------BSP <strong><?=$dd_perd->bsp?></strong>
                            </p>

                        <? } ?>

                    </div>

              
                  </div>
                </div>
                
                
                <? } // x else ?>

               
                 
                
   

            
                

              </div>

              <!--CARD MODELO -->

             

<!--END CARD MODELO -->
<div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify" id="resultado_geral">

  <div class="card my-1 slideInUp animated">

    <div class="card-header flipIn animated">
      Resultado:
    </div>


    <ul>
      <li>Total Ganho: $ <strong style="color:green"><?=number_format($lucro_total, 2, ',', '.')?></strong></li>
      <li>Total Perdido: $ <strong style="color:red"><?=number_format($total_perda, 2, ',', '.')?></strong></li>
    </ul>
  </div>

</div>


              
              
              

              

<!--END CARD MODELO -->



<!--CARD MODELO -->
<!--
              <div class="card my-1">

                <div class="card-body">Área 1.3</div>

              </div>



              <div class="card my-1">

                <div class="card-body">Área 1.4</div>

              </div>
-->
<!--END CARD MODELO -->

            </div>






        </div>

<!-- END CONTAINER MAIN -->

      </div>

<!-- END CONTAINER SECTION -->


<?php include("includes/2019/footer.php");?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=base_url()?>jack/node_modules/jquery/dist/jquery.js"></script>
    
    <script src="<?=base_url()?>jack/node_modules/popper.js/dist/umd/popper.js"></script>
  
    <script src="<?=base_url()?>jack/node_modules/bootstrap/dist/js/bootstrap.js"></script>
  


<!-- JS  CRIADOS -->
<script type="text/javascript">
function testAnim(e,x) {
	$('#'+e).removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	  $(this).removeClass();
	});
};	



  $(document).ready(function(){

    $( "#resultado_geral" ).clone().appendTo( "#topo" );

   $(".clique").click(function(){
     var id_ani = $(this).attr('id');
     //alert(id_ani);
      testAnim(id_ani,'jello');
      //return false;
   })

  }) // x ready

  </script>


  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" class="init">
  

$(document).ready(function() {


   

  



  // DataTable
  var table = $('#tb_rel').DataTable();

  // Apply the search
  /*
  table.columns().every( function () {
    var that = this;

    $( 'input', this.footer() ).on( 'keyup change', function () {
      if ( that.search() !== this.value ) {
        that.search( this.value ).draw();
      }
    } );
  } );
  */

} );


  </script>



  <!-- GRAFICOS -->
  <script type="text/javascript">
Highcharts.chart('container', {
    chart: {
            //type: 'area'
            type: 'line',
        
    },
    title: {
        
        text: "GRAFICO"
        
    },
    subtitle: {
        text: 'Fonte: betfair.com'
    },
    xAxis: {
            //categories: ['+15min', '11min', '10min', '9min', '8min', '7min', '6min', '5min', '4min', '3min', '2min', '1min']
            
            categories: [
            <? foreach($qr_datas->result() as $dt){ ?>
                '<?=$dt->data_evento?>',
            <? } ?>
            '<?=$dt->data_evento?>'
            ] 
        <? #} ?>
        <? /* if($tipo == 'odd'){ ?>
            categories: ['+15min', '11min', '10min', '9min', '8min', '7min', '6min', '5min', '4min', '3min', '2min', '1min']
        <? } */ ?>
        
    },
    yAxis: {
        title: {
            text: 'Titulo'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [
        <? #foreach($sels->result() as $sel){ 
            #$sel_nome = "null";
            #$qr_sel = $this->padrao_model->get_by_matriz('id_selection',$sel->selection_id,'selections');
            #if($qr_sel->num_rows() > 0){
                /*if($tipo == 'odd'){
                    if($side == 'back'){
                        $side = 'lay';
                    }
                    if($side == 'lay'){
                        $side = 'back';
                    }
                } */
                #$sel_nome = "Sel nome";
                #$qr_regs = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$sel->selection_id." AND tipo = '".$side."' ORDER BY dt_update desc LIMIT 20");
            #}
        ?>
            {
                name: "Ganhos",
                color: '#0F0',
                data: [
                    
                    <? 
                    foreach($qr_vencedores->result() as $venc){ 
                     // $qr_data = $this->
                      $ganho = $venc->bsp * 93;
                    ?>
                      <?=$ganho?>,
                    <? } ?>
                    <?=$ganho?>
                    ]
            },
            {
                name: "Perdas",
                color: '#F00',
                data: [
                    <? foreach($qr_perdedores->result() as $perd){ $perda = $perd->bsp * 93; ?>
                      <?=$perda?>,
                    <? } ?>
                    <?=$perda?>
                    ]
            },
            {
                name: "Testes",
                color: '#333',
                    data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5,
    {y: 216.4, marker: { fillColor: '#BF0B23', radius: 10 } }, 194.1, 95.6, 54.4]
            }
    <? #} ?> 
    ]
    
});

      
        </script>

  </body>
</html>