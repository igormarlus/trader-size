<!doctype html>
<html dir="ltr" lang="en-GB">

  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="<?=base_url()?>jack/node_modules/bootstrap/compilados/bootstrap.css">
   

  <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 
    
  <meta charset="UTF-8">
 
    <title>Full Trader</title>
      <meta name="title" content="campeonato/ Apostas  Bets Esportiva Online" />
   
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

              <div class="card my-1" id="display_call"> ... </div>

            
<!--CARD MODELO -->
              <!-- MATCH ODDS -->


              <div class="card my-1 slideInUp animated">

                <div class="card-header flipIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Jogos (<?=$jogos->num_rows()?>)</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link btn btn-success" href="<?=base_url()?>fulltrader" style="font-weight: bold;"> Atualizar</a>
                    </li>

                    
                  </ul>
                  <br><br>

                  <?
                  /*
                  if($qr_run->num_rows() > 0){
                    foreach($qr_run->result() as $run){
                      $qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$run->marketId,'odds_mkt_horses');
                      if($qr_mkt->num_rows() > 0){
                        $qr_sels = $this->db->query("SELECT DISTINCT selection_id,odd , selection_name FROM odds_mkt_horses WHERE id_mkt = '".$run->marketId."' ");
                        echo "<h1><a href='https://www.betfair.com/exchange/plus/horse-racing/market/".$run->marketId."' target='_blank'>".$run->nome." (".$run->countryCode.")</a></h1>";
                        echo "<h3>".$run->inicio."</h3>";
                        echo "<ul>";
                          foreach($qr_sels->result() as $sel){
                            echo "<li>".$sel->selection_name." - ".$sel->odd."</li>";
                          }
                        echo "</ul>";
                        echo "<p>".$qr_sels->num_rows()."</p>";
                      }
                    }
                  }
                  */
                  ?>

                  <? 
                 # echo "<h1>".$qr_run->num_rows()."</h1>";
                    if($jogos->num_rows() > 0){ ?>
                    <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 0, "asc" ]]' data-page-length='200'>
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Horário</th>
                          <th>Partida</th>
                          <th>Mercado</th>
                          <th>Mkts</th>
                          <th>QTD Mkts</th>
                      </tr>
                      </thead>

                      <?
                      foreach($jogos->result() as $jogo){ ?>
                        
                        

                            
                            <tr class="bg-default  bt_mais" style="cursor: pointer;">
                              
                              <th><?=$jogo->id_evento?></th>
                              <th><?=$jogo->inicio?></th>
                              <th><?=$jogo->evento?></th>
                              <th><?=$jogo->name?></th>
                              <th><?=$jogo->id_mkt?></th>
                              <th><?=$this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt WHERE id_partida = '".$jogo->id_evento."' ")->num_rows()?>
                                
                              </th>
                              
                            </tr>








                         
                      <? } // x foreach ?>

                    </table>
                  <? } ?>




            





                </div>

               
                 
                
   

            
                

              </div>

              <!--CARD MODELO -->

             

<!--END CARD MODELO -->


              
              
              

              

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


    setInterval(function(){ 
      //$("#display_call").html("");
      //alert("Hello"); 
      /*
      $.get("https://tradersize.com/cron/get_odds_horses/1/0" , function(data){
        $("#display_call").html(data);
      })
      */

    }, 
    5000);

  


  $(".bt_mais").click(function(){
    var id = $(this).attr('title');
    $(".mais"+id).show();
    //alert(id);

  })




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

  </body>
</html>