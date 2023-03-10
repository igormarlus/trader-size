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


                

            
                <h2>Filtro</h2>

                <form action="<?=base_url()?>horses/historico" method="post">
                  <input type="text" name="horse1" class="" placeholder="Cavalo ou Id selection 1">
                  <input type="text" name="horse2" class="" placeholder="Cavalo ou Id selection 2">
                  <input type="submit" value="Buscar" class="btn btn-primary">
                  
                </form>



            
              <? if($_POST){ ?>

                <h3 class="page-header mb60"><?=$qr_run->num_rows()?></h3>
                <? if(strlen($_POST['horse1']) > 2){  ?>
                  <p>
                    <strong><?=$_POST['horse1']?></strong>

                    <? if(strlen($_POST['horse2']) > 2){  ?>
                      X <strong><?=$_POST['horse2']?></strong>

                    <? } ?>
                    
                  </p>
                <? } ?>

              <? } ?>




                </div>



                <? if($qr_run->num_rows() == 0){ ?>
                    <h3 class="page-header mb60">Nenhuma corrida registrada</h3>
                <? }else{ ?>
                
                <!--  class="table tb_rel table-simple"-->

                <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 0, "asc" ]]' data-page-length='200'>
                    <thead>
                        <tr>
                            
                            <th class="min-width nowrap">ID EVENTO</th>
                            
                            <th>Data</th>
                            
                            <th>Ordem</th>
                            <th>Nome do Cavalo</th>

                            <th>WIN/LOSE</th>
                            <th>BSP</th>
                            <th>IPMIN</th>
                            
                            <!--<th>Morningwap</th> -->
                            <th>Largada</th>
                            <th>Queda</th>
                            <th>PPWAP</th>
                            <th>PPMAX</th>
                            <th>PPMIN</th>
                            <th>IPMAX</th>
                            <th>Mercado</th>
                            <th>Nome</th>
                            <th>Selection ID</th>
                            

                            <th class="min-width nowrap">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? 

                        #require_once('includes/betapi/jsonrpc-futbol.php'); 
                        // contador de dados
                        $dd_largada = [];
                        $largada_sobe = 0;
                        $largada_desce = 0;

                        $desc_20 = 0;
                        $desc_50 = 0;
                        $desc_100 = 0;
                        foreach($qr_run->result() as $run){ 
                         
                        ?>
                            <tr>                                            
                                <td class="semi-bold"><?=$run->event_id?></td>

                                
                                <td class="semi-bold"><?=$run->event_dt?></td>
                                
                                <td class="semi-bold"><?=$run->ordem?></td>
                                <td class="semi-bold"><?=$run->selection_name?></td>



                                <th><?=number_format($run->win_lose, 1, '.', '');?></th>
                                <th><?=number_format($run->bsp, 2, '.', '');?></th>
                                <th><?=$run->ipmin?></th>
                                
                                <!--<th><?=number_format($run->morningwap, 2, '.', '');?></th>-->
                                <th>
                                  <? 
                                  if($run->ipmin < $run->bsp){ 
                                    $largada_desce++; 
                                    echo "Desce - ";
                                    $diferenca = $run->bsp - $run->ipmin;
                                    $metade = $run->bsp / 2;
                                    // porcentagem
                                    $descida_per = $run->bsp - ($run->bsp / 100 * $diferenca); //os parenteses são desnecessários
                                    $descida_per2 =  ($run->ipmin  * 100 )  / $run->bsp;   //$run->bsp - ($run->bsp / 100 * $diferenca); 
                                    $sobra = ($diferenca * 100) / $run->bsp;
                                    if($sobra >= 50){
                                      $desc_100++;
                                      echo "100% (<span style='color:red'>-$diferenca</span>) ";
                                    }else{




                                      if($sobra >= 20){
                                        
                                        $desc_50++;
                                        #echo "100% [<span style='color:silver'>$descida_per</span>%] <span style='color:blue'>$descida_per2</span>  <br />(<span style='color:red'>-$diferenca</span>) ";
                                        echo "50% (<span style='color:red'>-$diferenca</span>) ";
                                      }
                                      if($sobra < 20){
                                        $desc_20++;
                                        #echo "20% [<span style='color:silver'>$descida_per</span>%] <span style='color:blue'>$descida_per2</span> <br />(<span style='color:red'>-$diferenca</span>)";
                                        echo "20% (<span style='color:red'>-$diferenca</span>) ";
                                      }
                                    





                                    }
                                    

                                  ?>
                                  
                                  <? }else{ $largada_sobe++; ?>
                                  Sobe
                                  <? } ?>
                                </th>
                                <td><strong><?=number_format($sobra, 2, '.', '')?></strong>%</td>
                                <th><?=number_format($run->ppwap, 2, '.', '');?></th>
                                <th><?=$run->ppmax?></th>
                                <th><?=$run->ppmin?></th>
                                <th><?=$run->ipmax?></th>
                                <td class="semi-bold"><?=$run->event_name?></td>
                                <td class="semi-bold"><?=$run->menu_hint?></td>
                                
                                <td class="semi-bold"><?=$run->selection_id?></td>
                                




                                <td class="min-width nowrap">
                                 <a href="<?=base_url()?>" style='color:red'> Opções </a>
                                </td>
                            </tr>
                        <? } ?>    
                     </tbody>
                </table>
              
                
                
                <? } ?>

               
                 
                
   

            
                

              </div>

              <!--CARD MODELO -->

             

<!--END CARD MODELO -->
<div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">

  <div class="card my-1 slideInUp animated">

    <div class="card-header flipIn animated">
      Resultado:
    </div>


    <ul>
      <li>Total: <strong><?=$qr_run->num_rows()?></strong></li>
      <li>Subidas: <strong><?=$largada_sobe?></strong></li>
      <li>Descidas: <strong><?=$largada_desce?></strong></li>

      <li>100%: <strong><?=$desc_100?></strong></li>
      <li>50%: <strong><?=$desc_50?></strong></li>
      <li>20%: <strong><?=$desc_20?></strong></li>
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

  </body>
</html>