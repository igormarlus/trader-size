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


 
    
  <meta charset="UTF-8">
 
    <title>Horses</title>
      <meta name="title" content="Próximas  Corridas de Cavalos " />
   
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

             

                <form action="<?=base_url()?>horses/set_classificacao" method="post">
                  <input type="text" name="id_mkt" value="<?=$qr_run->row()->id_mkt?>">
                  <input type="text" name="event_id" value="<?=$qr_run->row()->event_id?>">
                  <input type="text" name="hora" value="<?=$qr_run->row()->hora?>">

                  <input type="text" name="win_place" id="win_place" value="<?=$win_place?>" style="border:green 1px solid">

                  
                  <? 
                 # echo "<h1>".$qr_run->num_rows()."</h1>";
                    if($qr_run->num_rows() > 0){ ?>
                    <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 1, "asc" ]]' data-page-length='200'>
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Evend ID</th>
                          <th>data</th>
                          <th>hora</th>
                          
                          <th>Cavalos</th>
                          <th>Classificação</th>
                          <th>Posisionamento</th>
                          <th>Info</th>

                          <th>Jockey</th>
                          <th>Treinador</th>
                          


                          <th>...</th>


                          <th>Comentário</th>
                          <th>TS</th>
                      </tr>
                      </thead>

                      <?
                      $id_evento_atual = 0;
                      foreach($qr_run->result() as $run){
                        //print_r($run);
                         # $qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$run->marketId,'odds_mkt_horses'); 
                          #echo "<h1>".$qr_mkt->num_rows()."</h1>";
                           #if($qr_mkt->num_rows() > 0){

                        $qr_dd_run = $this->db->query("SELECT * FROM runs_dd_horses WHERE id_mkt = '".$qr_run->row()->id_mkt."' AND cavalo = '".$run->cavalo."' ");
                        if($qr_dd_run->num_rows() > 0){

                          $dd_horse_meta = $qr_dd_run->row();
                          $id_horse_meta = $dd_horse_meta->id;
                          $nm_jockey = $dd_horse_meta->JOCKEY_NAME;
                          $nm_treinador = $dd_horse_meta->TRAINER_NAME;

                          $dd_jockey = $this->db->query("SELECT * FROM jockeys WHERE nome = '".$nm_jockey."'  ");
                          $dd_treinador = $this->db->query("SELECT * FROM treinadores WHERE nome = '".$nm_treinador."'  ");


                        }else{
                          $nm_jockey = "";
                          $nm_treinador = "";
                          $id_horse_meta = 0;
                        }

                        ?>

                            
                            <tr class="  bt_mais" style="cursor: pointer;font-size: 11px" title="<?=$run->id?>">
                              <td ><?=$run->id?></td>
                              <th><?=$run->event_id?></th>
                              <td><?=$run->data_trat?></td>
                              <td><?=$run->hora?></td>
                              <td><?=$run->cavalo?></td>
                          
                              
                              <th>
                                <select name="classificacao_<?=$run->id?>" classe="sel_classificao" title="<?=$id_horse_meta?>">
                                  <? if($run->classificacao != ""){ ?>
                                    <option value="<?=$run->classificacao?>"><?=$run->classificacao?></option>
                                  <? } ?>
                                  <? for($c=1; $c<41; $c++){ ?>
                                    <option value="<?=$c?>"><?=$c?></option>
                                  <? } ?>
                                  <option value="BD">BD</option>
                                  <option value="CO">CO</option>
                                  <option value="DSQ">DSQ</option>
                                  <option value="F">F</option>
                                  <option value="PU">PU</option>
                                  <option value="REF">REF</option>
                                  <option value="RO">RO</option>
                                  <option value="RR">RR</option>
                                  <option value="UR">UR</option>
                                </select>
                              </th>
                              <th><input value="<?=$run->posicionamento?>" type="text" name="posicionamento_<?=$run->id?>" placeholder="Posicionamento"></th>
                              <th><input value="<?=$run->info_adicional?>" type="text" name="info_<?=$run->id?>" placeholder="Info"></th>

                              <th>
                                <?=$nm_jockey?> <?=$dd_jockey->num_rows()?>
                                <br>
                                (<?=$qr_dd_run->num_rows()?>)
                                <? if($dd_jockey->num_rows() > 0){?>
                                    Corridas: <input type="text" name="" value="<?=$dd_jockey->row()->qtd_corridas?> +1"><br>
                                    Vitorias: <input type="text" name="" value="<?=$dd_jockey->row()->vitorias?>"><br>
                                    Vitorias Place: <input type="text" name="" value="<?=$dd_jockey->row()->vitorias_place?>"><br>

                                    % Vitorias : <input type="text" name="" value="<?=$dd_jockey->row()->porcentagem_win?>"><br>
                                    % Vitorias Place: <input type="text" name="" value="<?=$dd_jockey->row()->porcentagem_win_place?>"><br>
                                <? } ?>
                              </th>
                              <th>
                                <?=$nm_treinador?> - <?=$dd_jockey->num_rows()?>
                                <? if($dd_treinador->num_rows() > 0){?>
                                    Corridas: <input type="text" name="" value="<?=$dd_treinador->row()->qtd_corridas?>"><br>
                                    Vitorias: <input type="text" name="" value="<?=$dd_treinador->row()->vitorias?>"><br>
                                    Vitorias Place: <input type="text" name="" value="<?=$dd_treinador->row()->vitorias_place?>"><br>

                                    % Vitorias : <input type="text" name="" value="<?=$dd_treinador->row()->porcentagem_win?>"><br>
                                    % Vitorias Place: <input type="text" name="" value="<?=$dd_treinador->row()->porcentagem_win_place?>"><
                                <? } ?>
                                
                              </th>

                              <th>
                                ----  -----
                              </th>
                              <th><input value="<?=$run->comentario?>" type="text" name="comentario_<?=$run->id?>" placeholder="Comentário"></th>
                              <th><input value="<?=$run->ts?>" type="text" name="ts_<?=$run->id?>"  placeholder="TS"></th>
                            </tr>
                          
                            

                          <? #} // x if num_rows)() ?>
                      <? } // x foreach ?>

                    </table>
                  <? } ?>
                  <P><input type="submit" name="" value="Salvar"></P>
                </form>

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
    <!--<script src="<?=base_url()?>jack/node_modules/jquery/dist/jquery.js"></script> -->

    <!--<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>-->

    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    


    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  
    
    <script src="<?=base_url()?>jack/node_modules/popper.js/dist/umd/popper.js"></script>
  
    <script src="<?=base_url()?>jack/node_modules/bootstrap/dist/js/bootstrap.js"></script>

    


<!-- JS  CRIADOS -->
<script type="text/javascript">
  /*
function testAnim(e,x) {
	$('#'+e).removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	  $(this).removeClass();
	});
};	
*/


 
  </script>


  



  <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->


  <script type="text/javascript" class="init">
  

$(document).ready(function() {

    // default gerar fila


    alert("OPA 12");
   

   $(".sel_classificao").change(function(){
    alert("OK 1");
    // var id_horse_run = $(this).attr('title');
     //alert(id_horse_run);
     //var classificacao = $(this).val();
     //alert(classificacao);
   })

  


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
  //var table = $('#tb_rel').DataTable();




} );


  </script>

  </body>
</html>