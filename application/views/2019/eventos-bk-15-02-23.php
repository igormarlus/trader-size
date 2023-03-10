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

  <!--<link rel="stylesheet" href="<?=base_url()?>jack/node_modules/bootstrap/compilados/bootstrap.css">-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   

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
    
    <meta property="og:description" content="Acompanhe as Apostas online e em tempo real. Vejam onde estão as apostas no trader esportivo em Tempo Real. Acompanhe em modo de porcentagens às Apostas Online de Futebol. Saiba onde está o Dinheiro!">
    
    
    
  <meta charset="UTF-8">
 
    <title>Apostas Esportiva Online</title>
      <meta name="title" content="Apostas  Esportiva Online" />
      <meta name="description" content="Apostas Online Futebol - Próximos Jogos | Saiba onde estão as Apostas Esportiva"  />

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


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-4921369568713372",
          enable_page_level_ads: true
     });
</script>


<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/utils.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/fontawesome/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/linecons/linecons.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!--<script src="//code.jivosite.com/widget.js" data-jv-id="qPbexb9dvS" async></script> -->

  </head>



  <body>

        <a href="https://api.whatsapp.com/send?phone=5581999468046&text=Ol%C3%A1!%20Gostaria%20de%20saber%20sobre%20*Tradersize*" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
    z-index:1000;" target="_blank">
  <i style="margin-top:16px" class="fa fa-whatsapp"></i>
  </a

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



   
<?php include("includes/2019/header-fix.php");?>
<!-- NAVBAR END--->

<!-- BREADCRUMB -->
<style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .breadcrumb-item,.breadcrumb-item a{font-size: 11px}
  <? } ?>

</style>
      <div class="container">

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

<? } */?>



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

<!-- COLUNA 1-->
            <div class="col-lg-4 col-sm-12 col-md-6 order-xl-2 order-md-2 order-sm-3 pl-1 pr-1 text-justify">

<!-- CARD PADRÃO LETREIRO DE JOG -->
              <div class="card border-black mt-3" style="display: none">

                <div class="card-body p-3 text-center bg-white">

                  <div class="row">

                    <div class="container col-4 col-sm-4 m-auto p-0">

                      <div class="media justify-content-center">
                        <img src="<?=base_url()?>jack/img/football_2833.png" style="width: 56px; height: 56px;">
                      </div>

                      <button type="button" class="btn btn-outline-primary btn-sm mt-3">SEGUIR</button>

                    </div>

                    <div class="container col-4 col-sm-4 m-auto p-0">

                      <div class="media justify-content-center">
                        <span class="h2">37 dias</span>
                      </div>

                    </div>

                    <div class="container col-4 col-sm-4 m-auto p-0">

                      <div class="media justify-content-center">
                        <img src="<?=base_url()?>jack/img/football_2824.png" style="width: 56px; height: 56px;">
                      </div>

                      <button type="button" class="btn btn-outline-primary btn-sm mt-3">SEGUIR</button>

                    </div>

                  </div>

                </div>

              </div>
<!-- END CARD PADRÃO --LETREIRO--DE--JOGO -->


<!--CARD MODELO -->
              <div class="card border-white my-1 wobble animated">

                <div class="card-body bg-bggray text-center p-3">
                  <h3 class="h6">Apostas Futebol Online</h3>
                  
                

                </div>

              </div>
<!--END CARD MODELO -->

<!--CARD MODELO -->
                  <? #include("includes/2019/menu_competicoes.php"); ?>

                <?  
               # }
                ?>

              
<!-- END COLUNA-1 -->

<!-- COLUNA 2 -->
            <div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">

      

<!--CARD MODELO -->
              <!-- MATCH ODDS -->


              <div class="card my-1 slideInIp animated">

                <div class="card-header zoomIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Próximos Jogos mais correspondidos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?=base_url()?>futebol/resultados" id="" style="font-weight: bold;">Últimos resultados</a>
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

   

                <div class="">
                    



                </div>
                  <!-- table-hover table-borded -->
                <table class="datatable datetable table-responsive " id="tb_rel" data-order='[[ 1, "desc" ]]' data-page-length='200' id="tb_rel" style="width: 100%">
                      <thead style="width: 100%">
                      <tr>
                          <th>Evento</th>
                          <th>Matched</th>
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

            $posicao = 0; foreach($this->betfront_model->getMarketings_best($APP_KEY, $SESSION_TOKEN,1,50,'MATCH_ODDS') as $dd){ $posicao++; 
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


                        <?
                        require_once('includes/betapi/jsonrpc-futbol.php'); 
                        #$dados['APP_KEY'] = $APP_KEY;
                        #$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
                        #echo $APP_KEY;
                        $dd_evento_qr = $this->betfront_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$dd->marketId);
                        $dd_evento = $dd_evento_qr[0]->event;
                        #echo base_url().'futebol/jogo/'.url_title($dd_evento->name).'/'.$dd_evento->id.'/';
                        ?>


                        <? #=$this->betfront_model->jogo_by_mkt_link($dd->marketId)?> 
                        <a  class='clique' style="text-decoration: none"   href="<?=base_url()?>futebol/jogo/<?=url_title($dd_evento->name).'/'.$dd_evento->id.'/'?>" itemprop="relatedLink" id="eve<?=str_replace(".","",$dd->marketId)?>"  title="<?=$times[1]?> x <?=$times[2]?>">
                          <? #=str_replace(" v "," x ",$jogo->event->name)?><?=$tit_jogo?>
                        </a>
                      </td>
                      <td class="badge badge-success" style="margin-top:0.5em " style="color:green">
                        <? #=number_format($dd->totalMatched, 2, ',', '.')?><?=$dd->totalMatched?>
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

            <div class="card my-1">
                <div class="card-header">
                  Sobre o Trader SIze </strong>
                </div>

                <div class="card-body">
                  <!-- TEXTO PARA SEO -->
                  <p>
                    Veja onde as pessoas estão apostando na competição  ao vivo e em tempo real. 
                    Aqui no Trader Size você pode acompanhar os mercados separadamente como, Match Odds (<strong>Probabilidades</strong>), <strong>Over 1.5</strong>, <strong>Over 2.5</strong>, <strong>Correct Score</strong>, <strong>BTS (Ambas Marcam) </strong> entre outros. <br>
                    Através de algorítimos complexos e dinâmicos, conseguimos transformar ou traduzir para você <strong> dados em Informações amigáveis</strong> para o melhor entendimento sobre as <strong>apostas esportivas online</strong>. 
                    <label class="text-red" style="color: red">NÓS NÃO FAZEMOS APOSTAS NO TRADER SIZE.</label> Através de códigos e muita lógica de programação conseguimos obter os dados das apostas através da <a target="_blank" href="https://betfair.com">Betfair</a> e trabalhamos neles com o objetivo de informar aos nossos usuários aonde as pessoas estão apostando, tudo isso em <strong>TEMPO REAL</strong>.
                  </p>
                  <p>
                    Você pode acompanhar as informações através de porcentagens referente aos volumes de cada seleção. Explicando melhor, em uma situação do mercado Match Odds ou Probabilidades (Quem vence a partida), existem 3 seleções, Time da casa (HOME), empate (DRAW) e visitante (Away). <strong>A soma das apostas nas 3 seleções dividida pela quantidade das mesmas</strong>, nos retorna exatamente o comportamento das apostas (mercados) naquele determinado momento.
                  </p>
                  <p>Vejam onde estão as apostas no trader esportivo em Tempo Real. Acompanhe em modo de porcentagens às <strong>Apostas Online de Futebol</strong></p>

                  <p>A plataforma Trade Size é totalmente Responsiva, onde a aplicação web é adaptada de acordo com o dispositivo acessado, sendo ele Desktop ou Mobile.</p>
                </div>

              </div>
<!--END CARD MODELO -->

<!--CARD MODELO -->

<!--
              <div class="card my-1">

                <div class="card-body">Área 3</div>

              </div>

              <div class="card my-1">

                <div class="card-body">Área 4</div>

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
  
    <!--<script src="<?=base_url()?>jack/node_modules/bootstrap/dist/js/bootstrap.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

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