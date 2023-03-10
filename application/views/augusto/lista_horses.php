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

              
              <div class="card my-1" id="end_fila" style="max-height: 100px"> ... </div>
              <div class="card my-1" id="display_call" style="max-height: 500px"> ... </div>

              

            
<!--CARD MODELO -->
              <!-- MATCH ODDS -->


              <div class="card my-1 slideInUp animated">

                <div class="card-header flipIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Próximas Corridas (<?=$qr_run->num_rows()?>)</a>
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

                    
                    <!--
                     <li class="nav-item">
                      <a class="nav-link btn btn-default" href="<?=base_url()?>horses/finished" style="font-weight: bold;"> Arquivadas</a>
                    </li> -->

                    

                    

                     <li class="nav-item">
                      <a class="nav-link btn btn-warning" href="<?=base_url()?>horses/clear" style="font-weight: bold;"> Reset (Limpa e pega prox. 400)</a>
                    </li>

                    
                  </ul>
                  <br><br>

                  <h2><?=$qtd?></h2>

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
                    if($qr_run->num_rows() > 0){ ?>
                    <table class="table table-hover table-responsive" id="tb_rel" data-order='[[ 2, "asc" ]]' data-page-length='200'>
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Data</th>
                          <th>Marketid</th>
                          <!--<th>Horário (TZ)</th> -->
                          <th>Hora timezone</th> 
                          <!--<th>Timezone <br> Europe -3h</th>-->
                          <th>Status</th>
                          <th>Odds_mkt_horses</th>
                          <th>Metadados</th>
                          <th>AVB</th>
                          <th>Corrida</th>
                          <th>Percurso</th>
                          <th>Local</th>
                          <th>País</th>
                          <th>Cavalos</th>
                          
                      </tr>
                      </thead>

                      <?
                      foreach($qr_run->result() as $run){
                        //print_r($run);
                          $qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$run->marketId,'odds_mkt_horses'); 
                          #echo "<h1>".$qr_mkt->num_rows()."</h1>";
                           if($qr_mkt->num_rows() > 0){?>

                            
                            <tr class="  bt_mais" style="cursor: pointer;font-size: 11px" title="<?=$run->id?>">
                              <td ><?=$run->id?></td>
                              <td>
                                <?=substr($run->inicio,0,10)?>
                                
                              </td>
                              <td ><?=$run->marketId?></td>
                              <!--
                              <td>
                                <? #=substr($run->data_tratada,11,8)?>
                                  <?
                                  #$new_data = $this->padrao_model->calc_data($run->data_tratada);
                                  $new_data = $run->data_timezone;
                                  echo $new_data;
                                  ?>
                                </td>-->
                              
                              <td><?=substr($run->data_tratada,0,20)?></td>

                              <!--<td><?=$run->timezone?></td> -->
                              <td>
                                <? if($run->status  == '2'){?>
                                  <span class="badge badge-danger">Encerrada</span>
                                <? } ?>
                                <? if($run->status  == '1'){?>
                                  <span class="badge badge-success">Na fila</span>
                                <? } ?>
                                <? if($run->status  == '0'){?>
                                  <span class="badge badge-warning">Aguardando</span>
                                <? } ?>
                                
                              </td>
                              <td>
                                <?
                                $qr_mkt_horses = $this->padrao_model->get_by_matriz('id_mkt',$run->marketId,'odds_mkt_horses');
                                ?>
                                <? if($qr_mkt_horses->num_rows() == 0){ ?>
                                  <span class="badge badge-danger">NÃO</span>
                                <? }else{ ?>
                                
                                  <span class="badge badge-success" title="<?=$run->marketid?>">SIM</span>
                                <? } ?>
                              </td>
                              <th>
                                <? 
                                $qr_metadados = $this->db->query("SELECT * FROM runs_dd_horses WHERE id_mkt = ".$run->marketId." ")->num_rows();
                                echo $qr_metadados;
                                ?>
                                  
                                </th>
                              <td>
                                <? if($qr_mkt->row()->id_avb == 0){ ?>
                                  <span class="badge badge-danger">NÃO</span>
                                <? } ?>
                                <? if($qr_mkt->row()->id_avb != 0){ ?>
                                  <span class="badge badge-success" title="<?=$qr_mkt->row()->id_avb?>">SIM</span>
                                <? } ?>
                              </td>
                              <td><a target="_blank" href="https://traderhorserace.com/money/corridasdecavalos/run/<?=$run->marketId?>"><?=$run->nome?></a></td>
                              <td><?=$run->marketName?></td>
                              <th><?=$run->local?></th>
                              <th><?=$run->countryCode?></th>
                              <th><?#=$sel->selection_name?> 
                                <!--<a class="btn btn-success  btn-outline" href="<?=base_url()?>horses/arq/<?=$run->id?>">Arquivar</a> -->
                                <a target="_blank" class="  btn-outline" href="<?=base_url()?>horses/edit_run/<?=$run->marketId?>">Editar</a>  - 

                                <a target="_blank" class="  btn-outline" href="<?=base_url()?>horses/confronto/<?=$run->marketId?>">Confronto</a>  - 
                                <a target="_blank" class="  btn-outline" href="<?=base_url()?>corridasdecavalos/corrida/weightofmoney/<?=$run->marketId?>">TS</a> - 

                                <a href="https://www.betfair.com/exchange/plus/horse-racing/market/<?=$run->marketId?>" target="_blank">Betfair</a>


                                <!--
                                <br />
                                <input type="text" name="id_mkt_avb" class="form-control" placeholder="ID MKT AVB
                                ">-->
                              </th>
                              
                            </tr>







                       <?   /* $qr_sels = $this->db->query("SELECT DISTINCT selection_id, selection_name FROM odds_mkt_horses WHERE id_mkt = '".$run->marketId."' ORDER BY odd asc "); 
                                foreach($qr_sels->result() as $sel){
                                  if($run->countryCode == "GB" || $run->countryCode == "US" ){
                      ?>
                                      <tr style="display: ;" class="mais<?=$run->id?> fadeInLeft animated">
                                        <th><?=$run->id?></th>
                                        <th>
                                          <?=$run->open_date?>
                                        </th>
                                        <td><?=$run->nome?></td>
                                        <td><?=$run->marketName?></td>
                                        <th><?=$run->local?></th>
                                        <th><?=$run->countryCode?></th>
                                        <th><?=$sel->selection_name?></th>
                                        <th><?=$this->db->query("SELECT odd FROM odds_mkt_horses WHERE selection_id = ".$sel->selection_id." AND tipo = 'back' ORDER BY  dt_update desc LIMIT 1")->row()->odd?></th>
                                      </tr>
                                  <? } // x if GB IRE ?>
                          <? } */ // x qr sel ?>


                          <? } // x if num_rows)() ?>
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

    // default gerar fila

    var cont_vez = 0;
    var cont_html = "";

    setInterval(function(){ 
      //$("#display_call").html("");
      //alert("Hello"); 
      $.get("<?=base_url()?>cron/get_odds_horses/1/0/<?=$qtd?>" , function(data){
        cont_vez++;
        //if(cont_vez == 1100){
        //  window.location.href = "<?=base_url()?>horses/next/20";
        //}
        cont_html = "<h1>"+cont_vez+"</h1>";
        $("#display_call").html(cont_html+" "+data);

      })

    }, 
    5000);

    <? if($qtd == "20"){?>
        $.get("<?=base_url()?>cron/proximos20" , function(data){
          $("#display_call").html(data);
        });
        setInterval(function(){ 
          //$("#display_call").html("");
          //alert("Hello"); 
          $.get("<?=base_url()?>cron/proximos20" , function(data){
            $("#display_call").html(data);
          });

        }, 
        60000);


        // remove da fila
        setInterval(function(){ 
          //$("#display_call").html("");
          //alert("Hello"); 
          $.get("<?=base_url()?>cron/end_fila" , function(data){
            $("#end_fila").html(data);
          });

        }, 
        30000);


    <? } ?>

    <? if($qtd == "avb"){?>
        $.get("<?=base_url()?>horses/get_avbs" , function(data){
            $("#display_call").html(data);
          });
        setInterval(function(){ 
          //$("#display_call").html("");
          //alert("Hello"); 
          $.get("<?=base_url()?>horses/get_avbs" , function(data){
            $("#display_call").html(data);
          })

        }, 
        10000);

        // remove da fila
        setInterval(function(){ 
          //$("#display_call").html("");
          //alert("Hello"); 
          $.get("<?=base_url()?>cron/end_fila/avb" , function(data){
            $("#end_fila").html(data);
          });

        }, 
        30000);


    <? } ?>

  


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