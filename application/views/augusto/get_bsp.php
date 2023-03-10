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
 
    <title>GET BPS</title>
      
   
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

              
              

              

            
<!--CARD MODELO -->
              <!-- MATCH ODDS -->


              <div class="card my-1 slideInUp animated">

                <div class="card-header flipIn animated">
               <h1><?=$qr_win_fila->num_rows()?></h1>

                  <?
                  
                  if($qr_win_fila->num_rows() > 0){
                    $v = -1;
                    foreach($qr_win_fila->result() as $run){ $v++;
                      #$qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$run->marketId,'odds_mkt_horses');
                      

                     # if($qr_mkt->num_rows() > 0){
                       # $qr_sels = $this->db->query("SELECT DISTINCT selection_id,odd , selection_name FROM odds_mkt_horses WHERE id_mkt = '".$run->marketId."' ");
                        echo "<h1 style='' id='run_".$v."' class='runs'> ".$run->inicio.": ".$run->nome." ".$run->countryCode." - <a href='https://www.betfair.com/exchange/plus/horse-racing/market/".$run->marketId."' target='_blank'>Betfair</a></h1>";
                        #echo "<h3>".$run->inicio."</h3>";
                        #echo "<ul>";
                         # foreach($qr_sels->result() as $sel){
                          #  echo "<li>".$sel->selection_name." - ".$sel->odd."</li>";
                          #}
                        #echo "</ul>";
                        #echo "<p>".$qr_sels->num_rows()."</p>";
                       
                      #}


                    }
                  }
                  
                  ?>

                </div>
              </div>



              <div class="card my-1" id="end_fila" style="max-height: 100px"> ... </div>
              <div class="card my-1" id="display_call" style="max-height: 500px"> ... </div>

              <!--CARD MODELO -->

             

<!--END CARD MODELO -->


              
              
              

              



            </div>






        </div>

<!-- END CONTAINER MAIN -->

      </div>

<!-- END CONTAINER SECTION -->


<?php #include("includes/2019/footer.php");?>

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




  </script>


  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" class="init">
  

$(document).ready(function() {

    // default gerar fila

    var vez = -1;

    setInterval(function(){ vez++;
      //$("#display_call").html("");
      //alert("Hello"); 
      //$(".runs").css('color','#000');
      //$("#run_"+vez).css('color','blue');

      $(".runs").attr('style','color:#000');
      $("#run_"+vez).attr('style','color:#00f');
      $("#display_call").html("Aguardando ("+vez+")...");
      $.get("<?=base_url()?>horses/get_bsp/0/"+vez , function(data){
        $("#display_call").html(data);

      })
      $("#end_fila").html(vez);
      //alert(vez+" --- ");
      if(vez == <?=$qr_win_fila->num_rows()?>){
        vez = 0;
      }


    }, 
    30000);

    setInterval(function(){ 
      $("#display_call").html("Atualizando....");
      location.reload();

    }, 
    260000);




  



} );


  </script>

  </body>
</html>