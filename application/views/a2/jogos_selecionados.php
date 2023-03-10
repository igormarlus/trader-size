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
 
    <title> Check Jogos A2</title>
   
   
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
                






                </div>



                <? if($jogos->num_rows() == 0){ ?>
                    <h3 class="page-header mb60">Nenhum jogo registrado</h3>
                <? }else{ ?>
                

                <div class="card my-1" id="">
                <a href="<?=base_url()?>a2/check" target="_blank" class="btn btn-primary">Voltar</a>
              </div>
                <!--  class="table tb_rel table-simple"-->
                 <form action="<?=base_url()?>a2/set_jogos"  method="post">
                 <p><input type="submit" value="Salvar" class="btn btn-success"></p>
                <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 0, "asc" ]]' data-page-length='200'>
                    <thead>
                        <tr>
                            
                            <th class="min-width nowrap">ID</th>
                            
                            <th>Jogo</th>
                            <th>Mercado</th>
                            <th>Status</th>
                            <th>Seleção</th>
                            <th>Odd</th>
                            
                            <th>Dt Registro</th>
                            <th>--</th>
                            <th class="min-width nowrap">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? 

                        foreach($jogos->result() as $dd){
                          $dd_partida = $this->padrao_model->get_by_matriz('id_evento',$dd->id_partida,'partidas')->row();
                        ?>
                            <tr>                                            
                                <td class="semi-bold"><?=$dd->id?></td>
                                
                                <td><?=$dd_partida->evento?></td>
                                <td> <? #=$mkt->id_mkt?> <? #=$this->padrao_model->get_by_id($user->patrocinador,'user')->row()->login?>
                                  <a href="https://www.betfair.com/exchange/plus/football/market/<?=$dd->id_mkt?>" target="_blank">
                                 Betfair
                                </a>
                                </td>
                                <td> 
                                   <? #=$totalMatched?>
                                   <?=$dd->status?>
                                
                                  
                                </td>
                                <td><?=$dd->selection_id?></td>
                                <td><?=$dd->odd?></td>
                                <td>
                                    <?=$this->padrao_model->converte_data(substr($dd->dt,0,10))?> 
                                </td>


                                <td>

                                 
                                  
                                </td>




                                <td class="min-width nowrap">
                                 <a href="<?=base_url()?>a2/rem_mkt/<?=$dd->id_mkt?>" style='color:red'> Remover </a>
                                </td>
                            </tr>
                        <? } ?>    
                     </tbody>
                </table>
              </form>
                
                
                <? } ?>

               
                 
                
   

            
                

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

  /*
    setInterval(function(){ 
      //$("#display_call").html("");
      //alert("Hello"); 
      // cron/get_odds_horses/1/1
      // horses/get_hots
      $.get("<?=base_url()?>botbet/get_odds_mkt/0" , function(data){
        //alert("opa");
        $("#display_call").html(data);
      })

    }, 
    7000);
    */

  



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