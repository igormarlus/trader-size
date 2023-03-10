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
 
    <title>Horses</title>
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
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Cavalos (<?=$qr_run->num_rows()?>)</a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link btn btn-success" href="<?=base_url()?>horses/next" style="font-weight: bold;"> Atualizar</a>
                    </li>

                     <li class="nav-item">
                      <a class="nav-link btn btn-warning" href="<?=base_url()?>horses/finished" style="font-weight: bold;"> Arquivadas</a>
                    </li>

                     <li class="nav-item">
                      <a class="nav-link btn btn-danger" href="<?=base_url()?>horses/clear" style="font-weight: bold;"> Limpar</a>
                    </li>

                    
                  </ul>
                  <br><br>
                  <div class="row">
                    <a target="_blank" class="btn btn-warning" href="<?=base_url()?>horses/matches/<?=$id_mkt?>">Confrontos encontrados</a>
                  </div>


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
                #print_r($qr_run->conn_id);
                #echo "<br>";
                #echo "<br>";
                #echo "************* ".$qr_run->$qr_run->conn_id->stat;
                #foreach($qr_run->$qr_run->conn_id as $log){
                  #echo $log;
                  #echo "<br>";
                #}
                echo "<hr>";

                #echo "País: ".$pais;


                ############################
                 echo "<h1>Cavalos ".$qr_run->num_rows()."</h1>";

                    if($qr_run->num_rows() > 0){ ?>
                    <h2><?=$pais?></h2>
                    <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 0, "asc" ]]' data-page-length='200' style="width: 100%">
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Cavalo</th>
                          <th>Sel</th>
                          <th>Registros</th>
                          <th>BSPs</th>
                          <th>Wins</th>
                          <th>dd4</th>
                          <th>Resultado Confronto</th>
                      </tr>
                      </thead>

                      <?

                      foreach($qr_run->result() as $run){
                        #print_r($run);
                          $qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$id_mkt,'odds_mkt_horses'); 
                          #echo "<h1>".$qr_mkt->num_rows()."</h1>";
                           if($qr_mkt->num_rows() > 0){?>

                            
                            <tr class="  bt_mais" style="cursor: pointer;" title="<? #=$run->id?>">
                              <th>ID <?#=$run->id?></th>
                              <th>
                                <?
                                $qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$run->selection_id."' ");
                                if($qr_sel->num_rows() > 0){
                                ?>
                                  <?=$qr_sel->row()->selection_name?>
                                <? }else{ ?>
                                  Indefinido
                                <? } ?>
                                
                                
                               
                                
                              </th>
                              <td><?=$run->selection_id?></td>
                              <td>
                                
                                <?
                                $total_anos = 0;
                                #$qr_hist = $this->db->query("SELECT COUNT(id) as qtd FROM corridas_cavalos_place WHERE selection_id = '".$run->selection_id."' ");

                                #$qr_hist = $this->db->query("SELECT COUNT(id) as qtd FROM corridas_cavalos_2019 WHERE selection_id = '".$run->selection_id."' ");
                                ?>
                                <?#=$qr_hist->row()->qtd?><br>

                                <? 
                                for($a=15; $a<21; $a++){ 

                                  $ano_fim = $a;
                                  if(strlen($a) == 1){
                                    $ano_fim = "0".$a;
                                    
                                  }
                                  echo $ano_fim;
                                  ##  GB
                                  #$qr_hist = $this->db->query("SELECT COUNT(id) as qtd FROM corridas_cavalos_20$ano_fim WHERE selection_id = '".$run->selection_id."' ");
                                  ##  AU
                                  $qr_hist = $this->db->query("SELECT COUNT(id) as qtd FROM corridas_cavalos".$pais_sigla."_20".$ano_fim." WHERE selection_id = '".$run->selection_id."' OR selection_name = '".$qr_sel->row()->selection_name."' ");
                                  if($qr_hist->row()->qtd > -1){ ?>
                                    <label id="tem_<?=$run->selection_id?>_<?=$ano_fim?>" style="color: green">0</label>
                                    <? echo "20".$ano_fim." (<a target='_blank' href='".base_url()."horses/compara/".$id_mkt."/".$run->selection_id."/20$ano_fim'>".$qr_hist->row()->qtd."</a>) <br />";
                                    ?>
                                    <!-- GET JAVA SCRIPT -->
                                    <script type="text/javascript">
                                      $(document).ready(function(){
                                        
                                        $("#tem_<?=$run->selection_id?>_<?=$ano_fim?>").html("aguardando");
                                        $.get("<?=base_url()?>horses/compara_qtd/<?=$id_mkt?>/<?=$run->selection_id?>/20<?=$ano_fim?>/<?=$pais?>" , function(qtd){

                                          $("#tem_<?=$run->selection_id?>_<?=$ano_fim?>").html(qtd);
                                          //alert(qtd);

                                        });
                                       // alert("tem_<?=$run->selection_id?>_<?=$ano_fim?>");
                                      })
                                    </script> 

                                    <!-- X GET -->
                                  <?}
                                  #echo $ano_fim." | ";
                                ?>
                                <? } // x for ?>


                                <?
                                #echo "<span style='font-size:10px'>";
                               # print_r($qr_hist->conn_id);
                                #echo "</span>";
                                ?>

                                
                                
                              </td>
                              <th>
                                
                                <?
                                /*
                                if($qr_hist->row()->qtd > 0){
                                  $qr_bsp = $this->db->query("SELECT bsp,win_lose FROM corridas_cavalos WHERE selection_id = '".$run->selection_id."' ");
                                  ?>
                                  <select> 
                                  <? foreach($qr_bsp->result() as $bsp){ ?>
                                      <option><?=$bsp->bsp;?></option>
                                  <? }?>
                                  </select>
                                <? }else{
                                  echo "NO data";
                                }
                                */
                                ?>

                              </th>
                              <th>
                                
                                <?
                                $wins = $this->db->query("SELECT * FROM corridas_cavalos WHERE selection_id = '".$run->selection_id."' AND win_lose = 1 ");
                                ?>
                                <?=$wins->num_rows()?>
                                
                                
                              </th>
                              <th>
                                <button class="bt_confr" value="<?=$run->selection_id?>" title="<?=$id_mkt?>">Confrontar</button>
                                <a target="_blank" href="<?=base_url()?>horses/compara/<?=$id_mkt?>/<?=$run->selection_id?>"> Outra aba</a>
                                
                              </th>
                              <th>
                                <div id="aq<?=$run->selection_id?>"></div>
                                
                              </th>
                            </tr>


                          <? } // x if num_rows)() ?>
                      <? } // x foreach ?>

                    </table>
                  <? } ?>




            

        



                </div>

               
                 
                
   

            
                

              </div>

              <!--CARD MODELO -->

              <div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify" id="aqui">
                Resultado da comparação
              </div>

             

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
    //alert("OK 3");
    console.log("OK 3");

    //alert(<?=$qr_run->num_rows()?>);
    <?
    /*
    foreach($qr_run->result() as $run){
         // print_r($run);
          $qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$id_mkt,'odds_mkt_horses'); ?>

          //alert(<?=$qr_mkt->num_rows()?>);

          <?
          
           if($qr_mkt->num_rows() > 0){
            $total_anos = 0;

            ############### DEFINI TABELA ###############
           
          

            #$qr_hist = $this->db->query("SELECT COUNT(id) as qtd FROM corridas_cavalos_2019 WHERE selection_id = '".$run->selection_id."' ");
            $qr_hist = $this->db->query("SELECT COUNT(id) as qtd FROM corridas_cavalos".$pais_sigla."_20".$ano_fim." WHERE selection_id = '".$run->selection_id."' ");
            ?>
            //alert(<?=$qr_hist->row()->qtd?>);
            <?
                    #if($qr_hist->row()->qtd > -1){



                      for($a=15; $a<20; $a++){ 
                                  $ano_fim = $a;
                                  if(strlen($a) == 1){
                                    $ano_fim = "0".$a;
                                    
                                  }
                                  $qr_hist = $this->db->query("SELECT COUNT(id) as qtd FROM corridas_cavalos".$pais_sigla."_20".$ano_fim." WHERE selection_id = '".$run->selection_id."' ");
                                  if($qr_hist->row()->qtd > 3){ ?>
                                    
                                        $("#tem_<?=$run->selection_id?>_<?=$ano_fim?>").html("verificando");
                                        $.get("<?=base_url()?>horses/compara_qtd/<?=$id_mkt?>/<?=$run->selection_id?>/20<?=$ano_fim?>" , function(qtd){
                                          $("#tem_<?=$run->selection_id?>_<?=$ano_fim?>").html(qtd);


                                        });
                                     
                                    

                                    
                                  <? }
                                  #echo $ano_fim." | ";
                                ?>
                                <? } // x for 







                    #} // x if qtd
          } // x if
        } // x foreach
        */
    ?>

   $(".clique").click(function(){
     var id_ani = $(this).attr('id');
     //alert(id_ani);
      testAnim(id_ani,'jello');
      //return false;
   });

   $(".bt_confr").click(function(){
      var id_mkt = $(this).attr('title');
      var id_sel = $(this).val();
      //alert(id_mkt+" - "+id_sel);
      $("#aq"+id_sel).html("aguarde...");
      $.get("<?=base_url()?>horses/compara/"+id_mkt+"/"+id_sel , function(data){
        $("#aqui").html(data);
        $("#aq"+id_sel).html(data);
      })
   })



  }) // x ready

  </script>


  

  <script type="text/javascript" class="init">
  

$(document).ready(function() {

/*
    setInterval(function(){ 
      //$("#display_call").html("");
      //alert("Hello"); 
      $.get("https://tradersize.com/cron/get_odds_horses/1/0" , function(data){
        $("#display_call").html(data);
      })

    }, 
    2000);

  */


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