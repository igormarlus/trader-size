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

  <meta property="og:url" content="<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>">
    <meta property="og:title" content="<?=$champ->row()->nome?> Apostas Esportiva Online Futebol ">
  
    <meta property="og:site_name" content="Trader Size <?=$champ->row()->nome?> Apostas  Bets Esportiva Online">
    <meta property="og:image" content="https://www.tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="https://tradersize.com/logo/logo-face.png">
    <meta property="og:image:width" content="240" />
    <meta property="og:image:height" content="206" />
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="<?=$champ->row()->nome?> Apostas. Vejam onde estão as apostas no trader esportivo em Tempo Real. Acompanhe em modo de porcentagens às Apostas Online de Futebol. Saiba onde está o Dinheiro!">
    
    
    
  <meta charset="UTF-8">
 
    <title><?=$champ->row()->nome?> Apostas Esportiva Online</title>
      <meta name="title" content="<?=$champ->row()->nome?> Apostas  Bets Esportiva Online" />
      <meta name="description" content="Apostas Online Futebol <?=$champ->row()->nome?> | Saiba onde estão as Apostas Esportiva"  />

    <meta name="keywords" content="<?=$champ->row()->nome?>,Betfair, trader, trader esportivo, Apostas Online Futebol,Apostas Esportiva Esportivas,Apostas Esportiva Futebol">
 






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



  </head>



  <body>
  
  <script type='application/ld+json'>
  {
    "@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[
    {
      "@type":"ListItem","position":1,
      "item":
      {"@id":"<?=base_url()?>futebol/","name":"Trader Size - Jogos Futebol Hoje"}},


      {
        "@type":"ListItem","position":2,
          "item":{
            "@id":"<?=base_url()?><?=$this->uri->segment(1)?>/compeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>","name":"Próximos Jogos <?=$champ->row()->nome?> "}
          }
      ]}
  </script>

  
 
  
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "SoftwareApplication",
  "name": "Trader Size - Software para Trader Esportivo. Apostas Futebol Online. Previsão dos Jogos",
  "operatingSystem": "Windows 7",
  "applicationCategory": "http://schema.org/GameApplication",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.6",
    "ratingCount": "8864"
  },
  "offers": {
    "@type": "Offer",
    "price": "100.00",
    "priceCurrency": "USD"
  }
}
</script>

 <script type="application/ld+json">
   {
    "@context":"http://schema.org",
  "@type": "Article",
  "image": "https://tradersize.com/logo/logo-face.png",
  
  "mainEntityOfPage":{
    "@type":"WebPage",
    "@id":"<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>/"
    },
  "headline":"<?=$champ->row()->nome?> - Apostas Online Futebol ",
  "url":"<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>/",
  
  "thumbnailUrl":"",
  "dateCreated":"<?=date("Y-m-d H:i:s")?>",
    "datePublished":"<?=date("Y-m-d H:i:s")?>",
    "dateModified":"<?=date("Y-m-d H:i:s")?>",
    "articleSection":"Futebol",
    "author":[{"@type":"Person","name":"Trader Size"}],
    "creator":["Trader Size"],
    "publisher":{
      "@type":"Organization",
      "logo" : "<?=base_url()?>logo/logo.png",
      "name":"Tradersize.com"
    },
    "keywords":["<?=$champ->row()->nome?>","Apostas Esportiva no Jogo <?=$champ->row()->nome?>","<?=$champ->row()->nome?>","betfair","Apostas Esportiva Online","Apostas Esportiva Esportivas Online Futebol","Apostas Esportiva Esportivas","Apostas Esportiva Futebol","<?=$champ->row()->nome?>","Apostas Esportiva Futebol","Pré-jogo","Intercambio","Apostas Esportiva em tempo real"]
    }   
  </script>

  <script type='application/ld+json'>{
    "@context":"http://schema.org",
    "@type":"WebSite",
    "@id":"#website",
    "url":"<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>",
    "name":"Tradersize.com",
    "potentialAction":{"@type":"SearchAction",
    "target":"<?=base_url()?>futebol/q={search_term_string}","query-input":"required name=search_term_string"}}</script>
    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?=base_url()?>futebol/jogo/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>/"/>

    <meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
    <meta itemscope itemprop="name" rel="name"  content="<?=$champ->row()->nome?>" />
    <meta itemprop="name" content="Apostas Online Futebol">
    <meta itemprop="logo" content="<?=base_url()?>logo/logo.png">



   
<?php include("includes/2019/header.php");?>
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
              <li class="breadcrumb-item"><a href="<?=base_url()?>futebol/">Jogos</a></li>
              <? if(strlen($champ->row()->nome) > 2 ){?>
                    <li class="breadcrumb-item">
                      <a href="<?=base_url()?>futebol/competition/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
                      </li>
                  <? } ?>
              
            </ol>

        </nav>

      </div>
<!-- END BREADCRUMB -->




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">

<!-- PAGE-TITLE-CONTAINER -->
        <div class="container">

          <div class="row fadeInLeft animated">

            <a class="text-secondary align-middle mr-2 ml-1 mt-1" href="#"><i class="fas fa-bell"></i></a><h2 style="font-size: 25px"><?=$champ->row()->nome?></h2>

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
                  <h3 class="h6" style="font-size: 13px">Apostas Futebol Online</h3>
                  <? if(strlen($champ->row()->nome) > 2 ){?>
                    <h5>
                      <a href="<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
                      

                        
                      </h5>
                  <? } ?>
                  <!--<div>
                    <p class="mb-0">
                      <span><strong>Data de início :
                      </strong> 

                              <? if($dd->inicio == "0000-00-00 00:00:00"){ ?>
                                  <?=$this->padrao_model->fuso_dt($dd->data_betfair,-7)?> 
                              <? }else{ ?>
                                  <? 
                                  if($dd->country == "IT" || $dd->country == "EN" || $dd->country == "DE"){
                                    $fuso_diff = -3;
                                  } 
                                  ?>
                                  <?=$this->padrao_model->fuso_dt($dd->inicio,-3,'i')?> 
                              <? } ?>

                      </strong>

                      </span>
                    </p>
                </div> -->


                </div>

              </div>
<!--END CARD MODELO -->

<!--CARD MODELO -->
                  <? include("includes/2019/menu_competicoes.php"); ?>

                <?  
               # }
                ?>

              <div class="card my-1">
                <div class="card-header">
                  Sobre o Trader SIze</strong>
                </div>

                <div class="card-body">
                  <!-- TEXTO PARA SEO -->
                  <p>
                    Veja aonde as pessoas estão apostando na competição <strong><?=$champ->row()->nome?></strong> ao vivo e em tempo real. 
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
<!-- END COLUNA-1 -->

<!-- COLUNA 2 -->
            <div class="col-lg-8 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">

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
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Próximos Jogos <?=$champ->row()->nome?></a>
                    </li>
                  </ul>
                </div>

                <? $n=0; 
                 # foreach($jogos as $jogo){
                 /*  

                    $n++;  
                    $times = explode(' v ',$jogo->event->name);

                    #$dd = $jogo;
                    #$dd = $this->padrao_model->get_by_matriz('id_evento',$jogo->event->id,'partidas')->row();  
                    $times = explode(' v ',$jogo->event->name); 
                    */

                  ?>
                  <ul class="list-group">
                      <? $n=0; 
                        foreach($jogos as $jogo){  

                          $n++;  
                          $times = explode(' v ',$jogo->event->name);

                          #$dd = $jogo;
                          #$dd = $this->padrao_model->get_by_matriz('id_evento',$jogo->event->id,'partidas')->row();  
                          $times = explode(' v ',$jogo->event->name); 

                        ?>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a target="_blank" href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>/" itemprop="relatedLink">
                          <?=str_replace(" v "," x ",$jogo->event->name)?>
                        </a>
                        <span class="badge badge-primary badge-pill"><?=$this->padrao_model->converte_data(substr($jogo->event->openDate,0,10))?></span>
                        
                      </li>
                      <? #} // x foreach ?>
                  </ul>
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

    <script type="application/ld+json" jsonldtype="SportEvent">
  {
    "@context":"http://schema.org","@type":"SportsEvent",
  
    "location":[
    {
      "@type":"Place",
      "address":[{
        "@type":"PostalAddress",
        "name":"Internacional"
      }],
      "name":"<?=$champ->row()->nome?>"
    }],
    "Name":"<?=$jogo->event->name?>",
    "description": " Mercados mais correspontidos (Matched) <?=$jogo->event->name?>. ",
    //"startdate":"2018-06-25T18:00:00",
    "startDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
    "endDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
    "url": "<?=base_url()?>bets/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>/"
  }
</script>
<?
$times = explode(' v ',$jogo->event->name);
?>
<script type="application/ld+json">
  {
    "@context":"http://schema.org",
    "@type":"BroadcastEvent",
    "name": "Apostas - Bets: <?=str_replace(" v "," x ",$jogo->event->name)?>",
    "description": "Saiba onde estão as apostas (dinheiro) no jogo: <?=$jogo->event->name?>",
    "isLiveBroadcast": "http://schema.org/True",
    "videoFormat": "HD",
    "startDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
    "endDate" : "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
     "image": "https://tradersize.com/img/logo.jpg",
     "url": "https://tradersize.com",
    "broadcastOfEvent": {
      "@type": "SportsEvent",
      "name": "<?=str_replace(" v "," x ",$jogo->event->name)?>",
      "description": "Apostas esportivas nos jogos <?=$champ->row()->nome?> - <?=str_replace(" v "," x ",$jogo->event->name)?> Apostas Futebol Online",
      //"availability": 10,
      //"price" : 100,
      "url" : "https://www.tradersize.com",
      "image": "https://tradersize.com/img/logo.jpg",
      
      "startDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
      "endDate" : "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
      "offers": {
        "@type": "Offer",
        "name" : "Trader Size - Saiba onde está o Dinheiro",
        "availability": "http://schema.org/InStock",
        "url": "https://tradersize.com",
        "price": "100.00",
        "priceCurrency": "USD",
        "validFrom": "<?=date("Y-m-d H:m:s")?>"

      },
      "location": {
        "@type": "Place",
        "name": "<?=$champ->row()->nome?>",
        "address" : "Betfair",
        "description": "<?=str_replace(" v "," x ",$jogo->event->name)?> - <?=$champ->row()->nome?> - Apostas Futebol Online"
      },
      "performer": {
        "@type": "PerformingGroup",
        "name": "Betfair"
        }
    }
  }
  </script>

                  <? } // x foreach ?>


                <div class="card-body fadeInLeft animated">
                    



                </div>

                

              </div>

              <!--CARD MODELO -->

             

<!--END CARD MODELO -->

<!-- BETFAIR -->
              <div class="card my-1 slideInIp animated">

              
                <div class="card-body fadeInLeft animated">
                  <p class="mt-2 mb-2">


                    <?  if($this->agent->is_mobile()){ ?>
                    <a href="https://ads.betfair.com/redirect.aspx?pid=2816870&bid=10506" target="_blank" ><img src="https://ads.betfair.com/renderImage.aspx?pid=2816870&bid=10506" border=0 style=""></img>Betfair Apostas Justas da Bolsa Esportiva</a>
                    <? }else{ ?>

                   <a href="http://ads.betfair.com/redirect.aspx?pid=2816870&amp;bid=8142" target="_blank">
                            <span class="img-border"><img alt="Betfair" src="https://tradersize.com/imagens/banner/banner-betfair.jpg" style="display:" width="500px" border="0"></span>
                            </a>

                   <?  } ?>
                    </p>
                  </p>
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

   

  }) // x ready

  </script>

  </body>
</html>