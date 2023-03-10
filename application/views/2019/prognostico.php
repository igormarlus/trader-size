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
    <!--<link rel="stylesheet" href="<?=base_url()?>css/bootstrap.css"> -->

    <!--<link rel="stylesheet" href="<?=base_url()?>css/bootstrap.css">  -->
    
  <!--
    <link rel="stylesheet" href="<?=base_url()?>jack/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <link rel="stylesheet" href="<?=base_url()?>jack/node_modules/bootstrap/compilados/Style.css">
  -->

    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">

    <!--<link rel="stylesheet" href="<?=base_url()?>vendor-porto/fontawesome-free/css/all.min.css"> -->
  
    <!--<link rel="stylesheet" href="<?=base_url()?>vendor-porto/simple-line-icons/css/simple-line-icons.min.css">-->

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Trader Size" />
  <meta name="autor" content="Trader Size" />

  <meta property="og:url" content="<?=base_url()?><?=$this->uri->segment(1)?>/prognostico/<?=url_title($dd->evento)?>/<?=$id_evento?>">
    <meta property="og:title" content="<?=$titulo?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?>.">
  
    <meta property="og:site_name" content="Trader Size - Prognóstico Apostas Esportiva Bets <?=$dd->evento?>">
    <meta property="og:image" content="https://www.tradersize.com/logo/logo-face.png">
    <meta property="og:image" content="https://tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="image/png">
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="<?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde está o Dinheiro!">
    
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="https://tradersize.com/feeds/jogos" />
  <!--  OUTRAS LINGUAGENS -->
  <link rel="canonical" href="<?=base_url()?><?=$this->uri->segment(1)?>/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
  <meta property="og:url" content="<?=base_url()?>futebol/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
  
  <link rel="alternate" href="<?=base_url()?>futebol/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="pt-PT">
  <link rel="alternate" href="<?=base_url()?>bets/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en-GB">
    
  <meta charset="UTF-8">
  <? if(count($mercados) == 0){ ?>
  <title> <?=$titulo?> </title>
    <meta name="title" content="<?=$titulo?>" />
      <meta name="description" content="Prognóstico Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as apostas no trader esportivo em Tempo Real - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?>. Prognósticos apostas desportivas futebol esperados pelas casas de apostas. "  />
    <meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online,Apostas Esportivas,Apostas Futebol,<?=$dd_evento?>">

  
  <? }else{ ?>
    <title><?=$titulo?></title>
      <meta name="title" content="<?=$titulo?>" />
      <meta name="description" content="Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as Apostas Esportiva - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?>. Prognósticos apostas desportivas futebol esperados pelas casas de apostas. "  />

    <meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online Futebol,Apostas Esportiva Esportivas,Apostas Esportiva Futebol,<?=$dd_evento->evento?>">
  <? } ?>






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

       #bt_clear:active{
        /*border: silver 1px solid;*/
        opacity: 20%;

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
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ECD078">
  <meta name="msapplication-TileColor" content="#ECD078">
  <meta name="theme-color" content="#ECD078">


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-6816270130378142", enable_page_level_ads: true }); </script>


  </head>



  <body>
<?
    $nome_evento = str_replace(" v "," x ",$dd->evento);
    $times = explode(' x ',$nome_evento); 
  ?>

  <script type='application/ld+json'>
  {
    "@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[
    {
      "@type":"ListItem","position":1,
      "item":
      {"@id":"<?=base_url()?>futebol","name":"Trader Size - Jogos Futebol Hoje"}},


      {
        "@type":"ListItem","position":2,
          "item":{
            "@id":"<?=base_url()?><?=$this->uri->segment(1)?>/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>","name":"Próximos Jogos <?=$champ->row()->nome?> "}
          },
      {
        "@type":"ListItem","position":3,
          "item":
          {"@id":"<?=base_url()?><?=$this->uri->segment(1)?>/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>","name":"<?=$dd->evento?>"}}]}
  </script>

  <script type="application/ld+json" jsonldtype="SportEvent">
    {
      "@context":"http://schema.org","@type":"SportsEvent",
    "awayteam":[{
      "@type":"SportsTeam",
      "name":"<?=$times['1']?>",
      "sport":"Futbol"
      <? if(strlen($champ->row()->nome) > 2 ){?>
      ,"memberOf": [
        {
          "@type": "SportsOrganization",
          "name": "<?=$champ->row()->nome?>"
        }
      ]
      <? } ?>


    }],
    "hometeam":[{
      "@type":"SportsTeam",
      "name":"<?=$times['0']?>",
      "sport":"Futebol"
      <? if(strlen($champ->row()->nome) > 2 ){?>
      ,"memberOf": [
        {
          "@type": "SportsOrganization",
          "name": "<?=$champ->row()->nome?>"
        }
      ]
      <? } ?>
    }],
      "location":[
      {
        "@type":"Place",
        "address":[{
          "@type":"PostalAddress",
          "name":"Internacional"
        }],
        <? if(strlen($champ->row()->nome) > 2 ){?>
        "name":"<?=$champ->row()->nome?>"
        <? }else{ ?>
          "name":"<?=$dd->evento?>"
        <? } ?>
      }],
      "offers": {
         "@type": "Offer",
          "price": "10.00",
          "priceCurrency": "USD",
          "url": "<?=base_url()?>",
          "availability": "<?=base_url()?>",
          "validFrom" : "<?=date("Y-m-d")?>"
        },
      "image": "https://tradersize.com/img/logo.jpg",
      "Name":"<?=$dd->evento?>",
      "description": " Vejam as Apostas online de Futebol Bet (Matched) <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> Previsão do Jogo- <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?>",
      //"startdate":"2018-06-25T18:00:00",
      //"startDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
      //"endDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
      //"endDate" : "<?=$this->padrao_model->fuso_dt($dd->inicio,0,'i')?> ",
      "startDate": "<?=$start_data?>",
      //"endtDate": "<?=$start_data?>",
      <? if(substr($dd->inicio,0,10) == "0000-00-00"){ ?>
        "endDate" : "<?=substr($start_data,0,10)?> 23:59:59",
      <? }else{ ?>
        "endDate" : "<?=substr($dd->inicio,0,10)?> 23:59:59",
      <? } ?>
      "performer" : "Trader Size",
      "url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>"
    }
</script>
  <script type="application/ld+json">
  {
    "@context":"http://schema.org",
    "@type":"BroadcastEvent",
    "name": "Apostas Online Futebol - Prognóstico: <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> Previsão do Jogo",
    "description": "Vejam as Apostas Online de Futebol no jogo: <?=$dd->evento?> <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> ",
    "isLiveBroadcast": "http://schema.org/True",
    "startDate": "<?=$start_data?>",
      <? if(substr($dd->inicio,0,10) == "0000-00-00"){ ?>
        "endDate" : "<?=substr($start_data,0,10)?> 23:59:59",
      <? }else{ ?>
        "endDate" : "<?=substr($dd->inicio,0,10)?> 23:59:59",
      <? } ?>
    "videoFormat": "HD",
    //"startDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
    //"endDate" : "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
     "image": "https://tradersize.com/img/logo.jpg",
     //"url": "https://tradersize.com",
     "url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>",
     
    "broadcastOfEvent": {
      "@type": "SportsEvent",
      "name": "<?=$dd->evento?> - <?=$champ->row()->nome?> ",
      "description": "<?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> -  Saiba onde está o dinheiro",
      //"availability": 10,
      //"price" : 100,
      "url" : "<?=base_url()?>bets/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
      
      "image": "https://tradersize.com/img/logo.jpg",
      "competitor": [
        {
          "@type": "SportsTeam",
          "sport": "Futebol",
          "name": "<?=$times['0']?>"
        },
        {
          "@type": "SportsTeam",
          "sport": "Futebol",
          "name": "<?=$times['1']?>"
        }
     

      ],

      //"startDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->data_betfair,10,10)?>",
      //"endDate" : "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->data_betfair,10,10)?>",
      //"startDate": "<?=$dd->inicio?>",
      //"endDate" : "<?=substr($dd->inicio,0,10)?> 23:59:59",
      "startDate": "<?=$start_data?>",
      <? if(substr($dd->inicio,0,10) == "0000-00-00"){ ?>
        "endDate" : "<?=substr($start_data,0,10)?> 23:59:59",
      <? }else{ ?>
        "endDate" : "<?=substr($dd->inicio,0,10)?> 23:59:59",
      <? } ?>
      "offers": {
        "@type": "Offer",
        "name" : "Trader Size - <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> Saiba onde está o Dinheiro",
        "availability": "http://schema.org/InStock",
        "url": "https://tradersize.com",
        "price": "100.00",
        "priceCurrency": "USD",
        "validFrom": "<?=date("Y-m-d H:m:s")?>"

      },
      "location": {
        "@type": "City",
        <? if(strlen($champ->row()->nome) > 2 ){ ?>
        "name": "<?=$champ->row()->nome?>",
        <? }else{ ?>
          "name": "<?=$dd->evento?>",
        <? } ?>
        "address" : "Betfair",
        "description": "<?=$dd->evento?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - Trader: Apostas Futebol Online. Saiba onde estão as Apostas Esportiva."
      },
      "performer": {
        "@type": "PerformingGroup",
        "name": "Betfair"
        }
    }
  }
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
    "@id":"<?=base_url()?>bets/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"
    },
  "headline":"<?=$titulo?> - <?=$champ->row()->nome?> - Apostas  Futebol Online ",
  "url":"<?=base_url()?>futebol/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
  
  "thumbnailUrl":"",
  "dateCreated":"<?=$dd->dt?>",
    "datePublished":"<?=$dd->dt?>",
    "dateModified":"<?=date("Y-m-d H:i:s")?>",
    "articleSection":"Futebol",
    "author":[{"@type":"Person","name":"Trader Size"}],
    "creator":["Trader Size"],
    "publisher":{
      "@type":"Organization",
      "logo" : "<?=base_url()?>logo/logo.png",
      "name":"Tradersize.com"
    },
    "keywords":["<?=$dd->evento?>","<?=$times['0']?>","<?=$times['1']?>","Apostas Esportiva no Jogo <?=$dd->evento?>","<?=$dd->evento?>","<?=str_replace(" v "," x ",$dd->evento)?>","betfair","Apostas Esportiva Online","Apostas Esportiva Esportivas Online Futebol","Apostas Esportiva Esportivas","Apostas Esportiva Futebol","<?=$champ->row()->nome?>","Apostas Esportiva Futebol","Pré-jogo","Intercambio","Apostas Esportiva em tempo real","prognóstico"]
    }   
  </script>

  <script type='application/ld+json'>{
    "@context":"http://schema.org",
    "@type":"WebSite",
    "@id":"#website",
    "url":"<?=base_url()?>bets/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
    "name":"Tradersize.com",
    "potentialAction":{"@type":"SearchAction",
    "target":"<?=base_url()?>futebol/q={search_term_string}","query-input":"required name=search_term_string"}}</script>
    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?=base_url()?>futebol/prognostico/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>"/>

    <meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
    <meta itemscope itemprop="name" rel="name"  content="<?=url_title($dd->evento)?>" />
    <meta itemprop="name" content="Apostas Online Futebol">
    <meta itemprop="logo" content="<?=base_url()?>logo/logo.png">
    <meta itemscope itemprop="publisher" rel="publisher"  content="<?=$dd->dt?>" />



   
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
                      <a href="<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
                      </li>
                  <? } ?>
              <li class="breadcrumb-item active" aria-current="page"> Prognóstico <?=str_replace(" v "," x ",$dd->evento)?></li>
            </ol>

        </nav>

      </div>
<!-- END BREADCRUMB -->




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">

<!-- PAGE-TITLE-CONTAINER -->
        <div class="container">

          <div class="row fadeInLeft animated">

            <a class="text-secondary align-middle mr-2 ml-1 mt-1" href="#"><i class="fas fa-bell"></i></a><h2 style="font-size: 25px">Prognóstico <?=str_replace(" v "," x ",$dd->evento)?></h2>

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

<!-- VOTE BUTTONS ---->
              <div class="card border-white my-2">
                <h2 class="card-title text-center mt-2" style="font-size: 15px">Quem Vence?</h2>
                <div class="btn-group btn-block mt-2" role="group" aria-label="vote-buttons-group" style="width:100%">
                  <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" type="button" class="btn btn-success" style="width:33%">1</a>
                  <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" type="button" class="btn btn-secondary" style="width:33%">x</a>
                  <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" type="button" class="btn btn-primary" style="width:33%">2</a>
                </div>
              </div>
<!-- END VOTE BUTTONS --->

<!--CARD MODELO -->
              <div class="card border-white my-1 wobble animated">

                <div class="card-body bg-bggray text-center p-3">
                  <div class="h6" style="font-size: 13px">INFORMAÇÕES DA PARTIDA</div>
                  <? if(strlen($champ->row()->nome) > 2 ){?>
                    <h5>
                      <a href="<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
                      

                        
                      </h5>
                  <? } ?>
                  <h6><a id="link_betfair" style="display: none" href="#" target="_blank">Ver na Betfair</a></h6>
                  <div>
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

                </div>
                </div>

              </div>
              <!--END CARD MODELO -->


                    <!-- SOFASCORE -->
                    <? if(strlen($dd->sofascore) > 2){ ?>
                      <?  if(!$this->agent->is_mobile()){ ?>
                          <div class="card border-white my-1 wobble animated" style="background-color: #fff">

                            <div class="card-body  text-center p-3" style="background-color: #fff">
                              <p><?=$dd->sofascore?></p>
                            </div>
                          </div>
                      <? } ?>
                    <? } ?>

              <!--CARD MODELO -->
              <div class="card my-1 bg-warning rotateInDownLeft animated" id="mercados">
                   
                    <div class="card-body bg-warning"><label>Mercados</label> 


                      <p class="text-right" style="margin-bottom:0px">Por Correspondência</p>
                   

                    </div>
                   
                    
                    
                  </div>

              <?  
                #if($this->session->userdata('id')){
                $m = 0; foreach ($mercados as $mercado) { $m++; ?>
                  
                  <? if($mercado->marketName != "Asian Handicap"){?>
                  



                  <div class="card my-1 bt_mkt zoomIn animated" data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>" style="cursor:pointer" id="bt<?=str_replace(".","",$mercado->marketId)?>">
                    <? if($mercado->totalMatched > 50000){ $class_mkt = 'bg-success text-white'; }else{ $class_mkt = "bg-dark text-white bgbtmkt"; } ?>
                    <div class="card-body <?=$class_mkt?>"><i class="icon icon-locked"></i><label class="tit_mkts" id="nm_mkt_<?=str_replace(".","",$mercado->marketId)?>"><?=$mercado->marketName?></label> 


                      <p class="text-right" style="margin-bottom:0px">$ <?=number_format($mercado->totalMatched, 2, ',', '.')?> </p>
                   

                    </div>
                   
                    
                    
                  </div>
                  <? } ?>


                <? }  
                #}else{ // x if
                  ?>

                <?  
               # }
                ?>
                <? if(!$this->session->userdata('id')){ ?>
                <div class="card my-1 zoomIn animated">
                    
                    <div class="card-body bg-warning"><label id=""><strong>Acesso a todos os mercados</strong></label> 


                      <p class="text-right" ><a class="badge badge-primary" style="padding-:15px;font-size:16px" href="<?=base_url()?>home/cadastro">Cadastre-se</a></p>
                   

                    </div>
                   
                    
                    
                  </div>
                <? } ?>

              <div class="card my-1">
                <div class="card-header">
                  Sobre o Jogo <strong><?=str_replace(" v "," x ",$dd->evento)?></strong>
                </div>

                <div class="card-body">
                  <!-- TEXTO PARA SEO -->
                  <p>
                    Veja onde as pessoas estão apostando no jogo entre <strong><?=str_replace(" v "," x ",$dd->evento)?></strong> ao vivo e em tempo real. 
                    <? if($dd->inicio == "0000-00-00 00:00:00"){ ?>
                       A previsão do jogo (TIMEZONE BRASÍLIA) é  <?=$this->padrao_model->fuso_dt($dd->data_betfair,-7)?>. 
                    <? }else{ ?>
                        <? 
                        if($dd->country == "IT" || $dd->country == "EN" || $dd->country == "DE"){
                          $fuso_diff = -3;
                        } 
                        ?>
                       A previsão do jogo (TIMEZONE BRASÍLIA) é  <?=$this->padrao_model->fuso_dt($dd->inicio,-3,'i')?>. 
                    <? } ?>
                    Aqui no Trader Size você pode acompanhar os mercados separadamente como, Match Odds (<strong>Probabilidades</strong>), <strong>Over 1.5</strong>, <strong>Over 2.5</strong>, <strong>Correct Score</strong>, <strong>BTS (Ambas Marcam) </strong> entre outros. <br>
                    Através de algorítimos complexos e dinâmicos, conseguimos transformar ou traduzir para você <strong> dados em Informações amigáveis</strong> para o melhor entendimento sobre as <strong>apostas esportivas online</strong>. 
                    <label class="text-red" style="color: red">NÓS NÃO FAZEMOS APOSTAS NO TRADER SIZE.</label> Através de códigos e muita lógica de programação conseguimos obter os dados das apostas através da <a target="_blank" href="https://betfair.com">Betfair</a> e trabalhamos neles com o objetivo de informar aos nossos usuários onde as pessoas estão apostando, tudo isso em <strong>TEMPO REAL</strong>.
                  </p>
                  <p>
                    Você pode acompanhar as informações através de porcentagens referente aos volumes de cada seleção. Explicando melhor, em uma situação do mercado Match Odds ou Probabilidades (Quem vence a partida), existem 3 seleções, Time da casa (HOME), empate (DRAW) e visitante (Away). <strong>A soma das apostas nas 3 seleções dividida pela quantidade das mesmas</strong>, nos retorna exatamente o comportamento das apostas (mercados) naquele determinado momento.
                  </p>
                  <p>A maioria dos jogos tendem a ter mais volume de apostas perto do início do jogo. Alguns jogos mais importantes costumam ter volumes até mesmo dias antes do evento.</p>
                  <h3>Mais detalhes sobre os times:</h3>
                  <p>Próximos Jogos: <a href="<?=base_url()?>futebol/team/<?=str_replace(" ","-",$times[0])?>"> <?=$times[0]?></a></p>
                  <p>Próximos Jogos: <a href="<?=base_url()?>futebol/team/<?=str_replace(" ","-",$times[1])?>"><?=$times[1]?></a></p>
                  <p>Vejam onde estão as apostas no trader esportivo em Tempo Real. Acompanhe em modo de porcentagens as <strong>Apostas Online de Futebol</strong></p>

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
              <div class="card my-1 slideInUp animated">

                <div class="card-header" id="">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;"><label id="tab_tit">Match Odds</label></a>
                    </li>
                    <!--
                    <li class="nav-item">
                      <a class="nav-link" href="#">A favor (BACK)</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Contra (LAY)</a>
                    </li>
                  -->
                  </ul>
                </div>
                
                
                <div class="card-body fadeInLeft animated">

                  <div align="right" class="float-right">
                      <div class="form-check form-check-inline checkbox">
                        <input class="form-check-input" type="checkbox" name="auto" id="bt_auto" value="1" style="">
                        <label class="form-check-label btn btn-outline-success" for="bt_auto" style="font-family: sans-serif;" >AUTO REFRESH</label>
                      </div>
                    </div>

                  <p class="mt-2 mb-2">
                    <!--<h3 class="card-title text-left " id="tit_mkt_now">Match Odds</h3>-->
                    

                    <div class="open_aqui"></div>
                    <p align="center">
                      <button style="display: none;" id="id_mkt_mo" value="" class="btn btn-success bt_refresh tada animated" data-idevento="<?=$dd->id_evento?>" data-idmkt="">Refresh</button>
                      <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_mkts"><i class="icon-star"></i> Outros mercados</button>
                    </p>
                  </p>
                </div>

                <? #if($this->session->userdata('id')){ ?>
                <br />
                    <div class="card col-full w-100 bg-success mb-3">
                      
                      <div class="card-body">
                        <strong class="card-title" style="color: #fff">REFRESH AUTO</strong>
                      </div>
                      
                        <ol class="breadcrumb mb-0 bg-white">
                          <li class="breadcrumb-item">


                            <!------------>

                            <!------------>

                            <div class="form-group">
                              <select class="form-control" name="tempo" id="tempo">
                                <option value="3">3 Segundos</option>
                                <option value="5" selected="">5 Segundos</option>
                                <option value="10">10 Segundos</option>
                                <option value="15">15 Segundos</option>
                              </select>
                            </div>

                          </li>
                          <li class="breadcrumb-item">

                            <!-- Material checked -->
<!--<div class="form-check">
  <input type="checkbox" class="form-check-input" id="materialChecked2" checked>
  <label class="form-check-label" for="materialChecked2">Material checked</label>
</div>-->

                            

                          </li>

                        </ol>
                    </div>
                  
                    <? #} ?>



                

              </div>






              <!-- SOFASCORE -->
                    <? if(strlen($dd->sofascore) > 2){ ?>
                      <?  if($this->agent->is_mobile()){ ?>
                          <div class="card border-white my-1 wobble animated" style="background-color: #fff">

                            <div class="card-body  text-center p-3" style="background-color: #fff">
                              <p><?=$dd->sofascore?></p>
                            </div>
                          </div>
                      <? } ?>
                    <? } ?>

              <!--CARD MODELO -->
              <div class="card my-1 bounceInDown animated">
                <div class="card-header">
                  Prognóstico Análise Trader
                </div>

                <div class="card-body">
                  <h5 class="card-title text-center">Confira a <strong>Expectativa do Mercado</strong> para esse jogo:</h5>
                  <p align="center">
                  <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_exptc"><i class="icon-star"></i> Clique Aqui</button>
                </p>
                <p align="center">Prognósticos apostas desportivas futebol esperados pelas casas de apostas.</p>
                  <br />
                  <br />

                <p id="call_expc" align="center"></p>

                </div>

              </div>

<!--END CARD MODELO -->
              
              <!-- BODOG -->
              <div class="card my-1 slideInIp animated">

              
                <div class="card-body fadeInLeft animated">
                  <p class="mt-2 mb-2">


                    <?  if($this->agent->is_mobile()){ ?>
                    <a href="https://record.bettingpartners.com/_DzHLrGq3dIG2a4LA_kpO2MohXDijJpw6/1/"  target="%TARGET%%"><img src="https://cdn4.imagestore.lv/bodog/affiliates/vivo/Vivo_300x250-pt.gif" width="%WIDTH%%" height="%HEIGHT%%" alt="" style="border:none;"/></a>
                    <? }else{ ?>

                   <a href="https://record.bettingpartners.com/_DzHLrGq3dIG2a4LA_kpO2L7OSOjP4e24/1/"  target="%TARGET%%"><img src="https://cdn4.imagestore.lv/bodog/affiliates/vivo/Vivo_728x90-pt.gif" width="%WIDTH%%" height="%HEIGHT%%" alt="" style="border:none;"/></a>

                   <?  } ?>
                    </p>
                  </p>
                </div>

                

              </div>

              <!-- CORRECT SCORE -->
              <div class="card my-1 slideInIp animated">

                <div class="card-header zoomIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_cc" style="font-weight: bold;">Correct Score</a>
                    </li>
                    <!--
                    <li class="nav-item">
                      <a class="nav-link" href="#">A favor (BACK)</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#">Contra (LAY)</a>
                    </li>
                  -->
                  </ul>
                </div>

                <div class="card-body fadeInLeft animated">
                  <p class="mt-2 mb-2">
                    <!--<h3 class="card-title text-left " id="tit_mkt_now">Match Odds</h3>-->

                    <div class="open_aqui_cc"></div>
                    <p align="center">
                      <button style="display: none;" id="id_mkt_cc" value="" class="btn btn-success bt_refresh bounceIn animated" data-idevento="<?=$dd->id_evento?>" data-idmkt="">Refresh</button>
                      <!--
                      <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_mkts"><i class="icon-star"></i> Outros mercados</button>
                    -->
                    </p>
                  </p>
                </div>

                

              </div>

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
    testAnim("bt_clear","flipInX");

    $('#bt_auto').prop('indeterminate', true);

    var tempo = $("#tempo").val();
    var sec = tempo+"000";

    // get id MO MATCH ODDS 
    $.get("<?=base_url()?>bets/get_id_mkt/"+<?=$this->uri->segment(4)?>, function(data){
      //alert(data);
      var id_mkt_mo = data;
      $("#link_betfair").show().attr('href','http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/'+id_mkt_mo);
      //var str = id_mkt;
      var res = id_mkt_mo.replace(".", "");
      var mkt_trat = res;
      $("#id_mkt_mo").val(mkt_trat);
      $("#id_mkt_mo").attr('data-idmkt',id_mkt_mo);
      $(".open_aqui").attr('id','mkt'+mkt_trat);

      // carrega MO
      $("#mkt"+mkt_trat).html("<p>Loading...</p>");
      $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+<?=$id_evento?>+"/"+id_mkt_mo , function(dataini){
          //alert(data);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $("#mkt"+mkt_trat).html(dataini);

          $("#id_mkt_mo").show();
          testAnim("bt_clear","flipInX");
          
        })

    }) 


    // get id MO CORRECT SCORE
    $.get("<?=base_url()?>bets/get_id_mkt/"+<?=$this->uri->segment(4)?>+"/CORRECT_SCORE", function(data){
      //alert(data);
      var id_mkt_cc = data;
      //alert("CC: "+id_mkt_cc);
      //var str = id_mkt;

      var res = id_mkt_cc.replace(".", "");
      var mkt_trat = res;
      $("#id_mkt_cc").val(mkt_trat);
      $("#id_mkt_cc").attr('data-idmkt',id_mkt_cc);
      $(".open_aqui_cc").attr('id','mkt'+mkt_trat);

      // carrega CC
      $("#mkt"+mkt_trat).html("<p>Loading...</p>");
      $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+<?=$id_evento?>+"/"+id_mkt_cc , function(dataini){
          //alert(dataini);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $("#mkt"+mkt_trat).html(dataini);

          $("#id_mkt_cc").show();
          
        })

    })

    <? // if($this->session->userdata('id')){ ?>
      var c=1;
      function auto(){
        c++;
        //console.log("opa  "+c);
        var tempo = $("#tempo").val();
          var sec = tempo+"000";
          if(tempo == c){
            console.log("get..."+c);           
            c = 0;
            
            //alert("foi em "+tempo+" "+c+" sec");
          
          
  //alert("foi");
            $('.bt_refresh').html("aguarde...");
            var id_mkt = $(".bt_refresh").attr('data-idmkt');
            var id_evento = $(".bt_refresh").attr('data-idevento');
            var id_elemento = $(".bt_refresh").attr('id');

            //testAnim_c_class("id_mkt_mo","bounceOutRight"); // desktop

            //alert(id_mkt);
            //return false;

            var str = id_mkt;
            var res = str.replace(".", "");
            var mkt_trat = res;

            //$("#mkt"+mkt_trat).html("Loading...<br /><br />");
            /*
            $("#mkt"+mkt_trat).html("<p>Loading...</p>");
            $("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
            */
            $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+id_evento+"/"+id_mkt , function(data){
              //alert(data);
              //$.getScript( "<?=base_url()?>js-front/plugins.js");
              $("#mkt"+mkt_trat).html(data);
              $(".open_aqui").html(data);
             // $("#"+id_elemento).html("Refresh");
              $('.bt_refresh').html("Refresh");
              testAnim("bt_clear","flipInX");
              
              
            }) // x get
          }
      } // x fn
       
       $("#bt_auto").click(function(){
         <? if(!$this->session->userdata('id')){ ?>
          //alert("logar");
          window.location.href = "<?=base_url()?>home/login";
         <? } ?>

        var check = $('#bt_auto').is(':checked');
        if(check == true){
         // $(".item3").show();
         $("#bt_auto > label").removeClass('btn-outline-success');
         $("#bt_auto > label").addClass('btn-success');
         console.log("ativo  ");
         $(".bt_refresh").html("aguarde...");
          var liga = setInterval(auto,1000);
          testAnim("bt_clear","flipInX");
        }else{
          $("#bt_auto > label").removeClass('btn-success');
          $("#bt_auto > label").addClass('btn-outline-success');
         // $(".item3").hide('slow');
         console.log("desativado  ");
         window.location.href = "<?=base_url()?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>";
          //clearInterval(liga);
          //clearInterval(auto);
        }
        
      })
      // setInterval(auto,1000);
      //} // fecha var auto
    

    <? //} // x if sesssion ?>

    $(".bt_refresh").click(function(){
        $(this).html("aguarde...");
        var id_mkt = $(this).attr('data-idmkt');
        var id_evento = $(this).attr('data-idevento');
        var id_elemento = $(this).attr('id');

        //testAnim_c_class("id_mkt_mo","bounceOutRight"); // desktop

        //alert(id_mkt);
        //return false;

        var str = id_mkt;
        var res = str.replace(".", "");
        var mkt_trat = res;

       // $("#mkt"+mkt_trat).html("");

        //$("#mkt"+mkt_trat).html("Loading...<br /><br />");
        /*
        $("#mkt"+mkt_trat).html("<p>Loading...</p>");
        $("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
        */
        $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+id_evento+"/"+id_mkt , function(data){
          //alert(mkt_trat);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          
          $("#mkt"+mkt_trat).html(data);
          $(".open_aqui").html(data);
          $("#"+id_elemento).html("Refresh");
          testAnim("bt_clear","flipInX");
          
          
        })

        //$("#mkt"+mkt_trat).html(" kkkk ");
        //alert("Opa 7"+mkt_trat+" - "+id_evento);
    
    }) // x bt_refresh

    $(".bt_mkt").click(function(evt){
      
		    evt.preventDefault();
        var delay;

        delay = setInterval(function(){ 
          // animação para subir o a pagina para o top
          targetOffset = $("#tit_mkt_now").offset().top;
          $('html, body').animate({ 
            scrollTop: targetOffset - 100
          }, 1000);
        }, 600);
       // delay;
        
      // testAnim("tit_mkt_now","bounceOutUp");
        
       // alert("OKK 3");
        var id_mkt = $(this).attr('data-idmkt');
        var id_evento = $(this).attr('data-idevento');
        var id_elemento = $(this).attr('id');

		    //testAnim(id_elemento,"bounceOutRight"); // desktop
        //testAnim(id_elemento,"bounceOutUp");
        testAnim(id_elemento,"flipInX");
        //testAnim("tab_tit","flipInX");
        
        //testAnim("tit_mkt_now","flipInY");
        //alert(id_elemento);

        //return false;
        var str = id_mkt;
        var res = str.replace(".", "");
        var mkt_trat = res;
        var nm_mkt = $("#nm_mkt_"+res).html();
        $("#tit_mkt_now").html(nm_mkt);
        //alert(nm_mk);
        $(".open_aqui").html("<p>Loading...</p>");
        $("#id_mkt_mo").attr('value',res);
        $("#id_mkt_mo").attr('data-idevento',<?=$dd->id_evento?>);
        $("#id_mkt_mo").attr('data-idmkt',id_mkt);

        
        /*
        $("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
        */

        $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+id_evento+"/"+id_mkt , function(data){
          //alert(data);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $(".open_aqui").html(data);
          //$("#"+id_elemento).html("Refresh");

          clearInterval(delay);
          
        })

        //$("#mkt"+mkt_trat).html(" kkkk ");
        //alert("Opa 7"+mkt_trat+" - "+id_evento);
    
    }) // x bt_refresh


    $("#bt_exptc").click(function(){
      //alert("OK");
      $("#call_expc").html("Aguarde...");
      $.get("<?=base_url()?>bets/expectativ/<?=$id_evento?>" , function(data){
        $("#call_expc").html(data);

        targetOffset = $("#bt_exptc").offset().top;
        $('html, body').animate({ 
          scrollTop: targetOffset - 100
        }, 1000);

      })
    })  // x bt_expct




  // bt_mkts
  $("#bt_mkts").click(function(){
      //alert("OK");
      //$("#call_expc").html("Aguarde...");
     // $.get("<?=base_url()?>bets/expectativ/<?=$id_evento?>" , function(data){
     //$("#call_expc").html(data);

        targetOffset = $("#mercados").offset().top;
        $('html, body').animate({ 
          scrollTop: targetOffset - 200
        }, 1000);



       /* $('.tit_mkts').removeClass().addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $(this).removeClass();
        }); */

     // })
    })  // x bt_expct

  }) // x ready

  </script>

  </body>
</html>