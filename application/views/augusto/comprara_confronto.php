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


<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
    
  <meta charset="UTF-8">
 
    <title>Horses - Compara Confrontos</title>
   
   
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



            </div>



            <div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">

              <div class="card my-1" id=""> 
                <? 
                #$qr = $this->db->query("SELECT * FROM runs_horses ORDER BY id desc ");
                $qr = $this->db->query("SELECT * FROM runs_horses WHERE data_timezone > NOW() ORDER BY id desc ");
                $c =  0; 
                foreach($qr->result() as $dd ){ 
                  $c++; 
                ?>
                    <? #=print_r($dd)?>
                    [<?=$c?>]<p id="m_<?=$c?>"><?=$dd->marketId?></p>
                  <br />
                <? } ?>
               </div>



            </div>






        </div>

<!-- END CONTAINER MAIN -->

      </div>

<!-- END CONTAINER SECTION -->


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


  }) // x ready

  </script>


  

  <script type="text/javascript" >
  

$(document).ready(function() {
  //alert("OKK");
  var cont = 0; 
  var elemento = "";
  var total = <?=$qr->num_rows()?>;

    setInterval(function(){ 
      cont++;
      $("#m_"+cont).css('color','red');
      elemento = $("#m_"+cont).html();
      $("#m_"+cont).html(elemento+" -----PEGOU 1 de "+total+" ---- "+elemento);
      //$("#display_call").html("");
      //alert("RUN "+cont); 
      
      $.get("https://tradersize.com/horses/compara_runs/"+elemento , function(data){
        $("#display_call").html(data);
        $("#m_"+cont).html(data);
      })
      

    }, 
    5000);

  



} );


  </script>

  </body>
</html>