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
 
    <title>Horses</title>
      <meta name="title" content="Próximas (<?=$qtd?>) Corridas de Cavalos " />
   
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
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Cavalos Hist (<?=$qr_run->num_rows()?>)</a>
                    </li>

                    <li class="nav-item">
                      <a target="_blank" class="nav-link btn btn-dark" href="<?=base_url()?>cron/get_runs" style="font-weight: bold;"> MAIS CORRIDAS **</a>
                    </li>

    
                    
                    <li class="nav-item">
                      <a class="nav-link btn btn-danger" href="<?=base_url()?>horses/next/20" style="font-weight: bold;"> Pegar Todas</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link btn btn-success" href="<?=base_url()?>horses/next/20" style="font-weight: bold;"> Próximas 5</a>
                    </li>


                     <li class="nav-item">
                      <a class="nav-link btn btn-warning" href="<?=base_url()?>horses/clear" style="font-weight: bold;"> Reset (Limpa e pega prox. 400)</a>
                    </li>

                    
                  </ul>
                  <br><br>

                  <h2><?=$qtd?></h2>


                  <? 
                 # echo "<h1>".$qr_run->num_rows()."</h1>";
                    if($qr_run->num_rows() > 0){ ?>
                    <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 1, "asc" ]]' data-page-length='200'>
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Evend ID</th>
                          <th>Data</th>
                          <th>Hora</th>
                          <th>Tipo</th>
                          <th>Corrida</th>
                          <th>Pista</th>
                          <th>Local</th>
                          
                          <th>Cavalos</th>
                          <th>Opções</th>
                      </tr>
                      </thead>

                      <?
                      $id_evento_atual = 0;
                      foreach($qr_run->result() as $run){
                        //print_r($run);
                         # $qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$run->marketId,'odds_mkt_horses'); 
                          #echo "<h1>".$qr_mkt->num_rows()."</h1>";
                           #if($qr_mkt->num_rows() > 0){

                        ?>

                            
                            <tr class="  bt_mais" style="cursor: pointer;font-size: 11px" title="<?=$run->id?>">
                              <td ><?=$run->id?></td>
                              <th><?=$run->event_id?></th>
                              
                              <td><?=$run->data_trat?></td>
                              <td><?=$run->hora?></td>
                              <td><?=$run->tipo?></td>
                              <th> -- </th>
                              <td><?=$run->cavalo?></td>
                              <th><?=$run->pista?></th>
                              <th><?=$run->corredores?></th>
                              
                              <th>
                                <a target="_blank" class="  btn-outline" href="<?=base_url()?>horses/dd_hist/<?=$run->id_mkt?>">Editar</a>  - 
                              </th>
                              
                            </tr>
                            <?
                            if($id_evento_atual != $run->event_id){
                              $id_evento_atual = $run->event_id;
                             ?> 
                             <td >FIM</td>
                              <th><?=$run->event_id?></th>
                              
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                            <? } ?>

                          <? #} // x if num_rows)() ?>
                      <? } // x foreach ?>

                    </table>
                  <? } ?>

                </div>

               

              </div>



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

    // default gerar fila



   

   

  


  $(".bt_mais").click(function(){
    var id = $(this).attr('title');
    $(".mais"+id).show();
    //alert(id);

  })



  // Setup - add a text input to each footer cell
  $('#td_rel tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
  } );

  // DataTable
  var table = $('#tb_rel').DataTable();




} );


  </script>

  </body>
</html>