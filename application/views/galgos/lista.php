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

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Trader Size" />
  <meta name="autor" content="Trader Size" />

    <meta property="og:url" content="<?=base_url()?>futebol/">
    <meta property="og:title" content=" Apostas Esportiva Online Futebol ">
  
    <meta property="og:site_name" content="Trader Size  Apostas Esportiva Online">
    <meta property="og:image" content="https://tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="image/png">
    
    
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="Acompanhe as Apostas online e em tempo real. Vejam onde estão as apostas no trader esportivo em Tempo Real. Acompanhe em modo de porcentagens às Apostas Online de Galgos. Saiba onde está o Dinheiro!">
    
    
    
  <meta charset="UTF-8">
 
    <title>Corrida de Galgos</title>
      <meta name="title" content="Corrida de Galgos" />
      <meta name="description" content="Apostas Online Galgos - Próximas Corridas | Saiba onde estão as Apostas "  />

    <meta name="keywords" content=",Betfair, trader, trader esportivo, Apostas Online Futebol,Apostas Esportiva Esportivas,Apostas Esportiva Futebol">
 






    <style type="text/css">
      .bt_mkt:active{
        background-color: #ffb900;
      }
      .bt_mkt:hover{
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

    <script type="text/javascript">
    if('serviceWorker' in navigator) {
      navigator.serviceWorker.register('<?=base_url()?>ts.js').then(function() {
        console.log("Service Worker registered successfully");
      }).catch(function() {
        console.log("Service worker registration failed")
      });
    }
  </script>

  <!--  PARA MOBILE -->
  <!-- icones para mobile -->
  <link rel="icon" href="<?=base_url()?>imagens/icons/icon-32.png" sizes="32x32" />
  <link rel="icon" href="<?=base_url()?>imagens/icons/icon-178.png" sizes="192x192" />
  <link rel="icon" href="<?=base_url()?>imagens/icons/icon-178.png" alt="180.png">
  <meta name="msapplication-TileImage" content="<?=base_url()?>imagens/icons/icon-270.png">


  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>imagens/icons/icon-178.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>assets2/images/icons/favicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ECD078">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">




<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/utils.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/fontawesome/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/linecons/linecons.css">

<script src="//code.jivosite.com/widget.js" data-jv-id="qPbexb9dvS" async></script>

  </head>



  <body>

  <!-- MODAL -->
    <? if($this->session->userdata('token')){ ?>
    <div class="modal fade" id="modal_bets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apostas/Bets</h5>
            <h4>
              <svg viewBox="0 0 8 8"><use xlink:href="#project"></use></svg>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="box" align="center" style="border:red 0px solid;padding:20px;display:none" id="loading_bets">
                    <img src="<?=base_url()?>assets2/images/svg-loaders/three-dots.svg" alt="" width="60">
            </div>

            <div class="pad15A" id="apostas_abertas">
              <p align="center" style="padding:1em;color:#fff"> Nenhuma Aposta </p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            
          </div>
        </div>
      </div>
    </div>
    <? } ?>  
  
 

  
 
  


  

    <meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
    <meta itemscope itemprop="name" rel="name"  content="Trader Size" />
    <meta itemprop="name" content="Apostas Online Futebol">
    <meta itemprop="logo" content="<?=base_url()?>logo/logo.png">
    <meta itemscope itemprop="publisher" rel="publisher"  content="<?=date("Y-m-d")?>" />



   
<?php # include("includes/2019/header-fix.php");?>
<!-- NAVBAR END--->

<!-- BREADCRUMB -->
<style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .breadcrumb-item,.breadcrumb-item a{font-size: 11px}
  <? } ?>

</style>
      <div class="container" style="display: none;">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 bg-white">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>futebol">Jogos</a></li>
              
            </ol>

        </nav>

      </div>
<!-- END BREADCRUMB -->

<? /* if($this->session->userdata('login') && !$this->session->userdata('token')) { ?>
  <div class="container" style="margin-top: 3em">
    <div class="alert alert-danger">Para realizar apostas é necessário <a href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=https://tradersize.com/bet">fazer o login na Betfair via Trader Size</a>. Caso não tenha conta na Betfair, <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142">registre-se grátis</a> e <strong>GANHE BÔNUS.</strong> </div>


  <div class="alert alert-danger">

  To place bets you must <a href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=https://tradersize.com/bet">login to Betfair via Trader Size</a>. If you don't have a Betfair account, <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142">sign up for free </a> and get bonuses.
  </div>

  </div>

<? } */ ?>



<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">

<!-- PAGE-TITLE-CONTAINER -->
        <div class="container">

          <div class="row fadeInLeft animated">

            <a class="text-secondary align-middle mr-2 ml-1 mt-1" href="#"><i class="fas fa-bell"></i></a><h2 style="font-size: 25px"><? #=str_replace(" v "," x ",$dd->evento)?></h2>

          </div>

        </div>
<!-- END PAGE TITLE-CONTAINER -->




<!-- CONTAINER MAIN -->
        <div class="container p-0">

          <div class="row">

            <div class="container pl-1 pr-1"> <!-- LINHA -->
              <div class="col-lg-12 col-sm-12 col-12 order-sm-1 border-top"></div>
            </div>


<!-- COLUNA 2 -->
            <div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">

              <div class="card mt-3 border-white">

                <!-- 16:9 aspect ratio 
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7zVYuXfD86I"></iframe>
                </div>
              -->

              </div>

<!--CARD MODELO -->
              <!-- MATCH ODDS -->


              <div class="card my-1 slideInIp animated">

                <div class="card-header zoomIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Próximas COrrigas (Galgos)</a>
                    </li>
                  </ul>
                </div>

               
                  <!--<ul class="list-group">
                     <?  /*
            #$n=0; foreach($copa2018->result() as $jogo){  $n++;  $times = explode(' v ',$jogo->evento);
            $qtd_view = 0;
            $pode_ver = 2;
            $n=0; 
            if($this->session->userdata('id')){
              $pode_ver = 100;
            } 
            #$n=0; foreach($proximos->result() as $dd_evento){  $n++;  $competition = ""; 

            $posicao = 0; foreach($this->betfront_model->getMarketings_best($APP_KEY, $SESSION_TOKEN,1,50,'MATCH_ODDS') as $dd){ $posicao++; 

                    #$n++;  
                    #$times = explode(' v ',$jogo->event->name);

                    #$dd = $jogo;
                    #$dd = $this->padrao_model->get_by_matriz('id_evento',$jogo->event->id,'partidas')->row();  
                    $times = explode(' v ',$dd->event->name); 

                  ?>
                      <? 
                        
                          $jogo = $dd;    
                          $n++;  
                          $times = explode(' v ',$dd->event->name);

                          #$dd = $jogo;
                          #$dd = $this->padrao_model->get_by_matriz('id_evento',$jogo->event->id,'partidas')->row();  
                          $times = explode(' v ',$dd->event->name); 

                          $times = array(); 
                      $t=0;
                      foreach( $dd->runners as $time ){ $t++;
                        #print_r($time);
                        #echo $time->runnerName;
                        $times[$t] = $time->runnerName;
                      }
                      $tit_jogo = $times[1]." v ".$times[2];

                        ?>
                      <li class="list-group-item d-flex justify-content-between align-items-center bounceInUp animated" itemprop="relatedLink" title="<?=$times[1]?> x <?=$times[2]?>">
                        <a  title="<?=$dd_evento->name?>" class='clique'   href="<?=base_url()?>bets/jogo_by_mkt/<?=$dd->marketId?>" itemprop="relatedLink" id="eve<?=str_replace(".","",$dd->marketId)?>">
                          <? #=str_replace(" v "," x ",$jogo->event->name)?><?=$tit_jogo?>
                        </a>
                        <span class="badge badge-success badge-pill">$<?=number_format($dd->totalMatched, 2, ',', '.')?></span>
                      </li>
                      <? } */ // x foreach ?>
                    
                  </ul> -->
                  <!--
                  <a target="_blank" href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>" itemprop="relatedLink">
                    <div class="card my-1 bt_mkt zoomIn animated" data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>" style="cursor:pointer" id="bt<?=str_replace(".","",$mercado->marketId)?>">
                      
                      <div class="card-body bg-success text-white">
                        <h2 itemscope itemtype="https://schema.org/WebPage"><?=str_replace(" v "," x ",$jogo->event->name)?></h2>


                        <p class="text-right" style="margin-bottom:0px"><?=$this->padrao_model->converte_data(substr($jogo->event->openDate,0,10))?> </p>
                     

                      </div>
                    </div>
                  </a>
                -->

   

                <div class="card-body fadeInLeft animated">
                    



                </div>

                <table class="table table-hover table-borded" id="tb_rel" data-order='[[ 1, "desc" ]]' data-page-length='200' id="tb_rel" style="width: 100%">
                      <thead style="width: 100%">
                      <tr>
                          <th>Evento</th>
                          <th>Matched</th>
                          <th>Mercado</th>
                          <th>Debug</th>
                      </tr>
                      </thead>
                  <tbody style="width: 100%">
                  <? 
            #$n=0; foreach($copa2018->result() as $jogo){  $n++;  $times = explode(' v ',$jogo->evento);
            $qtd_view = 0;
            $pode_ver = 2;
            $n=0; 
            if($this->session->userdata('id')){
              $pode_ver = 100;
            } 
            #$n=0; foreach($proximos->result() as $dd_evento){  $n++;  $competition = ""; 

            $posicao = 0; foreach($this->betfront_model->getMarketings_best($APP_KEY, $SESSION_TOKEN,4339,50,'WIN') as $dd){ $posicao++; 
              //print_r($dd);
                    

                  ?>
                  <? 
                    
                      #$jogo = $dd;    
                      $n++;  
                      #$times = explode(' v ',$dd->event->name);

                      #$dd = $jogo;
                      #$dd = $this->padrao_model->get_by_matriz('id_evento',$jogo->event->id,'partidas')->row();  
                      #$times = explode(' v ',$dd->event->name); 

                      #$times = array(); 
                      $t=0;
                      foreach( $dd->runners as $time ){ $t++;
                        #print_r($time);
                        #echo $time->runnerName;
                        $times[$t] = $time->runnerName;
                      }
                      $tit_jogo = $times[1]." <label style='color:#000'>x</label> ".$times[2];

                    ?>  
                    <tr class="bounceInUp animated" style="width: 100%;">
                      <td>
                        <a  class='clique'   href="<?=base_url()?>galgos/run/<?=$dd->marketId?>" itemprop="relatedLink" id="eve<?=str_replace(".","",$dd->marketId)?>"  title="<?=$times[1]?> x <?=$times[2]?>">
                          <? #=str_replace(" v "," x ",$jogo->event->name)?><?=$tit_jogo?>
                        </a>
                      </td>
                      <td class="badge badge-success badge-pill" style="margin-top:0.5em ">
                        <? #=number_format($dd->totalMatched, 2, ',', '.')?><?=$dd->totalMatched?>
                      </td>
                      <td><?=$dd->marketName?></td>
                      <td>
                        <?=print_r($dd)?>
                      </td>
                    </tr>
                    <? } // x foreach ?>

                  </tbody>

                </table>


                

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
    <!--
    <script src="<?=base_url()?>jack/node_modules/jquery/dist/jquery.js"></script>
    
    <script src="<?=base_url()?>jack/node_modules/popper.js/dist/umd/popper.js"></script>
  
    <script src="<?=base_url()?>jack/node_modules/bootstrap/dist/js/bootstrap.js"></script>
  -->

  <script src="<?=base_url()?>jack/node_modules/jquery/dist/jquery.js"></script>
    
    <script src="<?=base_url()?>jack/node_modules/popper.js/dist/umd/popper.js"></script>
  
    <script src="<?=base_url()?>jack/node_modules/bootstrap/dist/js/bootstrap.js"></script>

  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


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




<script>
  $(document).ready(function(){
   // alert("otas");
    $("#bt_todas").click(function(){
      $(".mais_cmptt").show();
    })


    // DataTable
  var table = $('#tb_rel').DataTable();


  })
</script>


<!-- JS MODAL -->
    <? if($this->session->userdata('token')){ ?>
    <script type="text/javascript">

      $(document).ready(function(){







      var tmp = 0;

    $("#bets_refresh").click(function(){
      //alert("Oppa");
      $("#loading_bets").show();
      $("#apostas_abertas").html('');
      $.get("<?=base_url()?>bet/apostas_abertas" , function(data){
        //$("#loading_cont").hide();
        //$(".old_placed").remove();
        $("#apostas_abertas").html('');
        $("#apostas_abertas").append(data);
        $("#loading_bets").hide();
        //$(".pisc").show('slow');
        
        //alert("Opa 3");
        
        
        $('.progressbar').each(function() {
          var bar = $(this);
          var max = $(this).attr('data-value');
    
          progress(max, bar);
        });
        
        
      
      
        $(".bt_cashout").click(function(){
          cashout(this);
        })
        
        
        $(".bt_cancel").click(function(){
          cancel_bet(this);
        })
    
    }); 


  
  
  //}, 7000);
  
  }) // x click
    
  $(".bt_cashout").click(function(){
    cashout(this);
  })
  

  $(".bt_cancel").click(function(){
    cancel_bet(this);
  })

  function cancel_bet(elemento){
    var idbet = $(elemento).attr("data-price");
    $.post('<?=base_url()?>bet/cancel_bet' , {'betId' : idbet } , function(data){
        alert(data);
        $("#idbet"+idbet).hide();
    });
      //alert(idbet+"Opaa6");
  }

}); // x ready
    </script>

    <? } // x if token ?>

  </body>
</html>