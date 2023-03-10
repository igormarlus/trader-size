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

              

              <div class="card my-1" id="">
                <a href="<?=base_url()?>cron/get_soccer" target="_blank" class="btn btn-primary">Pegar mais Jogos</a>
              </div>
               <div class="card my-1" id="">
                <a href="<?=base_url()?>a2/sels" target="_blank" class="btn btn-success">Jogos Selecionados</a>
              </div>


              <div class="card my-1" id="display_call"> ... </div>

              

            
<!--CARD MODELO -->
              <!-- MATCH ODDS -->


              <div class="card my-1 slideInUp animated">

                <div class="card-header flipIn animated">
                

            
                  <? /*
                 # echo "<h1>".$qr_run->num_rows()."</h1>";
                    if($qr_jogos->num_rows() > 0){ ?>
                    <form action="<?=base_url()?>a2/set_jogos"  method="post">
                      <p><input type="submit" value="Salvar" class="btn btn-success"></p>
                    <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 0, "asc" ]]' data-page-length='200'>
                      <thead>
                      <tr>
                          <th>ID </th>
                          <th>ID evento</th>
                          <th>Check</th>
                          <th>Horário</th>
                          <th>Jogo</th>
                          <th>Odd</th>
                          <th>Volume</th>
                          <th></th>
                      </tr>
                      </thead>

                       <?    
                                foreach($qr_jogos->result() as $jogo){
                                    #if($run->countryCode == "GB" || $run->countryCode == "IR" || $run->countryCode == "US"){
                                      #$id_mkt_trat = str_replace(".", "", $run->marketId);
                        ?>
                                        <tr style="display: ;" class="mais<?=$jogo->id?> fadeInLeft animated">
                                          <th><?=$jogo->id?></th>
                                          <th><?=$jogo->id_partida?></th>
                                          <th>
                                            <input type="checkbox" value="<?=$jogo->id_partida?>_<?=$jogo->id?>" name="runs[]" title="<?=$jogo->id?>" />
                                          <!--  
                                            <input type="text" value="" placeholder="Odd" name="odd<?=$jogo->id_evento?>_<?=$jogo->id?>"  />
                                          -->
                                            <br />
                                            <? # =$run->marketId?> <? #=$id_mkt_trat?>
                                          </th>
                                          <th>
                                            <?=$this->padrao_model->converte_data(substr($jogo->data_betfair,0,10))?> |
                                            <?=substr($jogo->data_betfair,11,8)?>
                                          </th>
                                          <td><?=$jogo->evento?></td>
                                          <td><?=$jogo->odd?></td>
                                          <th><? #=$this->db->query("SELECT odd FROM odds_mkt_horses WHERE selection_id = ".$sel->selection_id." AND tipo = 'back' ORDER BY  dt_update desc LIMIT 1")->row()->odd?> <?=$jogo->tamanho?> </th>
                                        </tr>
                                    <? #} // x if GB IRE ?>
                            <? } // x foreach ?>


                          <? } // x if num_rows)() ?>
                     

                    </table>
                    <p><input type="submit" value="Salvar" class="btn btn-success"></p>
                  </form>
               <? */ ?>




            





                </div>



                <? if($jogos->num_rows() == 0){ ?>
                    <h3 class="page-header mb60">Nenhum jogo registrado</h3>
                <? }else{ ?>
                
                <!--  class="table tb_rel table-simple"-->
                 <form action="<?=base_url()?>a2/set_jogos"  method="post">
                 <p><input type="submit" value="Salvar" class="btn btn-success"></p>
                <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 0, "asc" ]]' data-page-length='200'>
                    <thead>
                        <tr>
                            
                            <th class="min-width nowrap">QTD</th>
                            <th>Check</th>
                            <th>Jogo</th>
                            <th>Mercado</th>
                            <th>Status</th>
                            <th>Seleção</th>
                            
                            <th>Dt Visita</th>
                            <th>Fila</th>
                            <th class="min-width nowrap">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? 

                        require_once('includes/betapi/jsonrpc-futbol.php'); 
                        foreach($mercados->result() as $mkt){ 
                          $where_mkt = array('id_mkt' => $mkt->id_mkt);
                          $this->db->where($where_mkt);
                          $qr_odds_mkt = $this->db->get('odds_mkt');
                          $dd_mkt = $qr_odds_mkt->row(); 
                          #$qr_odds_mkt = 

                          // tb PARTIDAS
                          $where_jg = array('id_evento' => $dd_mkt->id_partida);
                          $this->db->where($where_jg);
                          $qr_partida = $this->db->get('partidas');
                        
                          if($qr_partida->num_rows() > 0){
                            $nm_jogo = $qr_partida->row()->evento;
                        }else{
                          $nm_jogo = "No data";
                        }

                        // TB mercados
                        $where_mkt = array('id_mkt' => $mkt->id_mkt);
                        $qr_mkt = $this->db->get('mercados');
                        if($qr_mkt->num_rows() > 0){
                          $fila = $qr_mkt->row()->fila; 
                          $status_mkt = $qr_mkt->row()->status; 
                        }else{
                          $fila = "-";
                          $status_mkt = "-";
                        }
                        ?>
                            <tr>                                            
                                <td class="semi-bold"><?=$qr_odds_mkt->num_rows()?></td>
                                <td>
                                  <input type="checkbox" value="<?=$dd_mkt->id_partida?>_<?=$mkt->id_mkt?>" name="runs[]" title="<?=$mkt->id_mkt?>" />
                                </td>
                                <td><?=$nm_jogo?></td>
                                <td> <? #=$mkt->id_mkt?> <? #=$this->padrao_model->get_by_id($user->patrocinador,'user')->row()->login?>
                                  <a href="<?=base_url()?>bet/betjogo/<?=$dd_mkt->id_partida?>/<?=$mkt->id_mkt?>" target="_blank">
                                  <?
                                  #echo $APP_KEY." - ".$SESSION_TOKEN;
                                  if($total < 2000){
                                    foreach( $this->bet_model->get_nm_mkt($APP_KEY, $SESSION_TOKEN,$dd_mkt->id_partida,$mkt->id_mkt) as $odd){
                                      $totalMatched = $odd->totalMatched;
                                      echo $odd->marketName;
                                    }
                                  }else{
                                    echo $mkt->id_mkt;
                                  }
                                  ?>
                                </a>
                                </td>
                                <td> 
                                   <? #=$totalMatched?>
                                   <?=$status_mkt?>/<?=$qr_mkt->num_rows()?>
                                
                                  
                                </td>
                                <td>
                                  <?=$qr_odds_mkt->row()->selection_name?>
                                    <? # $dt_cadastro = $this->padrao_model->converte_data(substr($user->dt,0,10))?> 
                                    <? #=$dt_cadastro?>
                                    <? #=substr($user->dt,10,10)?>
                                    
                                </td>
                                <td>
                                    <?=$this->padrao_model->converte_data(substr($dd_mkt->dt,0,10))?> 
                                </td>


                                <td>

                                  <?=$fila?>
                                  
                                </td>




                                <td class="min-width nowrap">
                                 <a href="<?=base_url()?>dash/rem_mkt/<?=$mkt->id_mkt?>" style='color:red'> Remover </a>
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