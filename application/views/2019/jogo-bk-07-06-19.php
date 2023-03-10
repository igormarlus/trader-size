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

    <link rel="stylesheet" href="<?=base_url()?>vendor-porto/fontawesome-free/css/all.min.css">
  
    <!--<link rel="stylesheet" href="<?=base_url()?>vendor-porto/simple-line-icons/css/simple-line-icons.min.css">-->

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Trader Size" />
  <meta name="autor" content="Trader Size" />

  <meta property="og:url" content="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$id_evento?>">
    <meta property="og:title" content="Apostas Esportiva Online Futebol jogo: <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?>.">
  
    <meta property="og:site_name" content="Trader Size - Apostas Esportiva Bets <?=$dd->evento?>">
    <meta property="og:image" content="https://www.tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="https://tradersize.com/logo/logo-face.png">
    <meta property="og:image:width" content="240" />
    <meta property="og:image:height" content="206" />
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="<?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde está o Dinheiro!">
    
    
    
  <meta charset="UTF-8">
  <? if(count($mercados) == 0){ ?>
  <title><?=str_replace(" v "," x ",$dd->evento)?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Esportiva Bets </title>
    <meta name="title" content="<?=$dd->evento?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Esportiva Bets" />
      <meta name="description" content="Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Vejam onde estão as apostas no trader esportivo em Tempo Real - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />
    <meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online,Apostas Esportivas,Apostas Futebol,<?=$dd_evento?>">

  
  <? }else{ ?>
    <title><?=$titulo?></title>
      <meta name="title" content="<?=$titulo?>" />
      <meta name="description" content="Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as Apostas Esportiva - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />

    <meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online Futebol,Apostas Esportiva Esportivas,Apostas Esportiva Futebol,<?=$dd_evento?>">
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
<?
    $times = explode(' x ',$dd->evento); 
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
            "@id":"<?=base_url()?><?=$this->uri->segment(1)?>/competition/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>","name":"Próximos Jogos <?=$champ->row()->nome?> "}
          },
      {
        "@type":"ListItem","position":3,
          "item":
          {"@id":"<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>","name":"<?=$dd->evento?>"}}]}
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
      "startDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
      "endDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
      //"endDate" : "<?=$this->padrao_model->fuso_dt($dd->inicio,0,'i')?> ",
      //"startDate": "<?=$start_data?>",
      //"endtDate": "<?=$start_data?>",
      "performer" : "Trader Size",
      "url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>"
    }
</script>
  <script type="application/ld+json">
  {
    "@context":"http://schema.org",
    "@type":"BroadcastEvent",
    "name": "Apostas Online Futebol - Bets: <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> Previsão do Jogo",
    "description": "Vejam as Apostas Online de Futebol no jogo: <?=$dd->evento?> <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> ",
    "isLiveBroadcast": "http://schema.org/True",
    "videoFormat": "HD",
    "startDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
    "endDate" : "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
     "image": "https://tradersize.com/img/logo.jpg",
     //"url": "https://tradersize.com",
     "url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>",
    "broadcastOfEvent": {
      "@type": "SportsEvent",
      "name": "<?=$dd->evento?> - <?=$champ->row()->nome?> ",
      "description": "<?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> -  Saiba onde está o dinheiro",
      //"availability": 10,
      //"price" : 100,
      "url" : "<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
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

      "startDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->data_betfair,10,10)?>",
      "endDate" : "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->data_betfair,10,10)?>",
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
    "@id":"<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"
    },
  "headline":"<?=str_replace(" v "," x ",$dd->evento)?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?> - Apostas  Futebol Online ",
  "url":"<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
  
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
    "keywords":["<?=$dd->evento?>","<?=$times['0']?>","<?=$times['1']?>","Apostas Esportiva no Jogo <?=$dd->evento?>","<?=$dd->evento?>","<?=str_replace(" v "," x ",$dd->evento)?>","betfair","Apostas Esportiva Online","Apostas Esportiva Esportivas Online Futebol","Apostas Esportiva Esportivas","Apostas Esportiva Futebol","<?=$champ->row()->nome?>","Apostas Esportiva Futebol","Pré-jogo","Intercambio","Apostas Esportiva em tempo real"]
    }   
  </script>

  <script type='application/ld+json'>{
    "@context":"http://schema.org",
    "@type":"WebSite",
    "@id":"#website",
    "url":"<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
    "name":"Tradersize.com",
    "potentialAction":{"@type":"SearchAction",
    "target":"<?=base_url()?>futebol/q={search_term_string}","query-input":"required name=search_term_string"}}</script>
    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?=base_url()?>futebol/jogo/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>"/>

    <meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
    <meta itemscope itemprop="name" rel="name"  content="<?=url_title($dd->evento)?>" />
    <meta itemprop="name" content="Apostas Online Futebol">
    <meta itemprop="logo" content="<?=base_url()?>logo/logo.png">
    <meta itemscope itemprop="publisher" rel="publisher"  content="<?=$dd->dt?>" />


<!-- Fixed navbar -->
  <!-- NAVBAR -->
    <? /* if($this->agent->is_mobile()){ ?>
        <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url()?>logo/aguia-ts.png" alt="Logo Trader Size"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>">HOME</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>home/login">LOGIN</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>futebol">PRÓXIMOS JOGOS</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>futebol/filtro_odds">FILTRO DE ODDS</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>betfair/sobre-o-trader-size/">SOBRE</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?=base_url()?>betfair/2018/05/22/como-usar-a-betfair-tradersize/">COMO USAR</a>
            </li>
           
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <? }else{ */ ?>
  
      <nav class="navbar navbar-expand-xl navbar-light bg-gradient-light navbar-fixed-top">
      <div class="container">
        

          <a class="navbar-brand h1 text-primary mb-0" href="#">

            <img src="<?=base_url()?>logo/logo.png" width="40" height="auto" class="d-inline-block align-top mr-2" alt="TRADER SIZE LOGO" style="max-height: 120px">
            

          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
            <span class="navbar-toggler-icon"><i class="icon-menu icons"> </span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSite" style="background-color: #">

            <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>">HOME</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>home/login">LOGIN</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>futebol">PRÓXIMOS JOGOS</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>futebol/filtro_odds">FILTRO DE ODDS</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>betfair/sobre-o-trader-size/">SOBRE</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>betfair/2018/05/22/como-usar-a-betfair-tradersize/">COMO USAR</a>
              </li>

            </ul>

            <form class="form-inline" method="post" action="<?=base_url()?>futebol/q/">

              <input class="form-control ml-4 mr-2" type="search" placeholder="Buscar" name="q">
              <button class="btn btn-success" type="submit">Ok</button>

            </form>

          </div>

         </div>

      </nav>
      <? # } // x else mobile ?>
   
      
<!-- NAVBAR END--->

<!-- BREADCRUMB -->
      <div class="container">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 bg-white">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>futebol/">Jogos</a></li>
              <li class="breadcrumb-item active" aria-current="page"><?=str_replace(" v "," x ",$dd->evento)?></li>
            </ol>

        </nav>

      </div>
<!-- END BREADCRUMB -->




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">

<!-- PAGE-TITLE-CONTAINER -->
        <div class="container">

          <div class="row fadeInLeft animated">

            <a class="text-secondary align-middle mr-2 ml-1 mt-1" href="#"><i class="fas fa-bell"></i></a><h2 style="font-size: 25px"><?=str_replace(" v "," x ",$dd->evento)?></h2>

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
                      <a href="<?=base_url()?>futebol/competition/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
                      

                        
                      </h5>
                  <? } ?>
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

<!--CARD MODELO -->
              <div class="card my-1  rotateInDownLeft animated" id="mercados">
                   
                    <div class="card-body bg-warning"><label>Mercados</label> 


                      <p class="text-right" style="margin-bottom:0px">Por Correspondência</p>
                   

                    </div>
                   
                    
                    
                  </div>

              <?  
                #if($this->session->userdata('id')){
                $m = 0; foreach ($mercados as $mercado) { $m++; ?>
                  <!--
                  <li class="nav-link <?=$act?>"><a href="#open" class="get_mkt" title="<?=$mercado->marketId?>"><?=$mercado->marketName?> <label class="text-success"> </label></a></li>-->
                  <? if($mercado->marketName != "Asian Handicap"){?>
                  <!--
                  <button data-idevento="29307743" data-idmkt="1.159386497" class="button button-3d button-rounded button-green bt_refresh"><i class="icon-refresh"></i>Refresh</button>

                  <button data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>" class="button button-3d button-rounded button-green bt_mkt"><i class="icon-refresh"></i>Refresh</button>
                  -->



                  <div class="card my-1 bt_mkt zoomIn animated" data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>" style="cursor:pointer" id="bt<?=str_replace(".","",$mercado->marketId)?>">
                    <? if($mercado->totalMatched > 50000){ $class_mkt = 'bg-success text-white'; }else{ $class_mkt = "bg-dark text-white bgbtmkt"; } ?>
                    <div class="card-body <?=$class_mkt?>"><label id="nm_mkt_<?=str_replace(".","",$mercado->marketId)?>"><?=$mercado->marketName?></label> 


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

              <div class="card my-1">
                <div class="card-header">
                  Sobre o Jogo <strong><?=str_replace(" v "," x ",$dd->evento)?></strong>
                </div>

                <div class="card-body">
                  <!-- TEXTO PARA SEO -->
                  <p>
                    Veja aonde as pessoas estão apostando no jogo entre <strong><?=str_replace(" v "," x ",$dd->evento)?></strong> ao vivo e em tempo real. 
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
                    <label class="text-red" style="color: red">NÓS NÃO FAZEMOS APOSTAS NO TRADER SIZE.</label> Através de códigos e muita lógica de programação conseguimos obter os dados das apostas através da <a target="_blank" href="https://betfair.com">Betfair</a> e trabalhamos neles com o objetivo de informar aos nossos usuários aonde as pessoas estão apostando, tudo isso em <strong>TEMPO REAL</strong>.
                  </p>
                  <p>
                    Você pode acompanhar as informações através de porcentagens referente aos volumes de cada seleção. Explicando melhor, em uma situação do mercado Match Odds ou Probabilidades (Quem vence a partida), existem 3 seleções, Time da casa (HOME), empate (DRAW) e visitante (Away). A soma das apostas nas 3 seleções dividida pela quantidade, nos retorna exatamente o comportamento das apostas (mercados) naquele determinado momento.
                  </p>
                  <p>A maioria dos jogos tendem a ter mais volume de apostas perto do início do jogo. Alguns jogos mais importantes costumam ter volumes até mesmo dias antes do evento.</p>
                  <h3>Mais detalhes sobre os times:</h3>
                  <p>Próximos Jogos: <a href="<?=base_url()?>futebol/team/<?=str_replace(" ","-",$times[0])?>"> <?=$times[0]?></a></p>
                  <p>Próximos Jogos: <a href="<?=base_url()?>futebol/team/<?=str_replace(" ","-",$times[1])?>"><?=$times[1]?></a></p>
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

              <div class="card my-1 slideInIp animated">

                <div class="card-header zoomIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;">Match Odds</a>
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

                    <div class="open_aqui"></div>
                    <p align="center">
                      <button style="display: none;" id="id_mkt_mo" value="" class="btn btn-success bt_refresh bounceIn animated" data-idevento="<?=$dd->id_evento?>" data-idmkt="">Refresh</button>
                      <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_mkts"><i class="icon-star"></i> Outros mercados</button>
                    </p>
                  </p>
                </div>

                

              </div>

              
              

              

<!--END CARD MODELO -->

<!--CARD MODELO -->

              <div class="card my-1 bounceInDown animated">
                <div class="card-header">
                  Análise Trader
                </div>

                <div class="card-body">
                  <h5 class="card-title text-center">Confira a <strong>Expectativa do Mercado</strong> para esse jogo:</h5>
                  <p align="center">
                  <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_exptc"><i class="icon-star"></i> Clique Aqui</button>
                </p>
                <p align="center">Prognósticos apostas desportivas futebol esperadas pelas casas de apostas.</p>
                  <br />
                  <br />

                <p id="call_expc" align="center"></p>

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

<div class="footer-copyright bg-tertiary py-5">
          <div class="container-fluid py-4 px-5">
            <div class="row justify-content-between">
              <div class="col-auto">
                <p class="text-color-light font-weight-light opacity-4 mb-0">© Copyright 2019. All Rights Reserved.</p>
              </div>
              <div class="col-auto">
                <ul class="list list-inline list-unstyled mb-0">
                  <li class="list-inline-item mr-0 mb-0"><a href="https://www.instagram.com/tradersize/" class="text-color-light font-weight-bold" target="_blank"><i class="fab fa-instagram mr-1"></i> INSTAGRAM</a></li>
                  <li class="list-inline-item mb-0 mx-4"><a href="https://www.youtube.com/channel/UCUWiGyIYeL6TMz7ymwuQFCA" class="text-color-light font-weight-bold" target="_blank"><i class="fab fa-youtube mr-1"></i> YOUTUBE</a></li>
                  <li class="list-inline-item mb-0"><a href="https://facebook.com/tradersize/" class="text-color-light font-weight-bold" target="_blank"><i class="fab fa-facebook-f mr-1"></i> FACEBOOK</a></li>

                  <li class="list-inline-item mb-0"><a href="https://tradersize.com/feeds/jogos" class="text-color-light font-weight-bold" target="_blank"><i class="fas fa-rss"></i> FEEDS</a></li>


                  
                </ul>
              </div>
            </div>
          </div>
        </div>









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

    // get id MO MATCH ODDS
    $.get("<?=base_url()?>bets/get_id_mkt/"+<?=$this->uri->segment(4)?>, function(data){
      //alert(data);
      var id_mkt_mo = data;
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
          
        })

    })


    // get id MO CORRECT SCORE
    $.get("<?=base_url()?>bets/get_id_mkt/CORRECT_SCORE"+<?=$this->uri->segment(4)?>, function(data){
      //alert(data);
      var id_mkt_cc = data;
      //alert("CC: "+id_mkt_cc);
      //var str = id_mkt;
      
      var res = id_mkt_cc.replace(".", "");
      var mkt_trat = res;
      $("#id_mkt_cc").val(mkt_trat);
      $("#id_mkt_cc").attr('data-idmkt',id_mkt_cc);
      $(".open_aqui_cc").attr('id','mkt'+mkt_trat);

      // carrega MO
      $("#mkt_cc"+mkt_trat).html("<p>Loading...</p>");
      $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+<?=$id_evento?>+"/"+id_mkt_cc , function(dataini){
          //alert(data);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $("#mkt_cc"+mkt_trat).html(dataini);

          $("#id_mkt_cc").show();
          
        })
      

    })

    $(".bt_refresh").click(function(){
        $(this).html("aguarde...");
        var id_mkt = $(this).attr('data-idmkt');
        var id_evento = $(this).attr('data-idevento');
        var id_elemento = $(this).attr('id');

        //testAnim_c_class("id_mkt_mo","bounceOutRight"); // desktop

        alert(id_mkt);
        //return false;

        var str = id_mkt;
        var res = str.replace(".", "");
        var mkt_trat = res;

        $("#mkt"+mkt_trat).html("Loading...<br /><br />");
        /*
        $("#mkt"+mkt_trat).html("<p>Loading...</p>");
        $("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
        */
        $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+id_evento+"/"+id_mkt , function(data){
          //alert(data);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $("#mkt"+mkt_trat).html(data);
          $("#"+id_elemento).html("Refresh");
          
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
        
       //testAnim("tit_mkt_now","bounceOutUp");
        
       // alert("OKK 3");
        var id_mkt = $(this).attr('data-idmkt');
        var id_evento = $(this).attr('data-idevento');
        var id_elemento = $(this).attr('id');

		    //testAnim(id_elemento,"bounceOutRight"); // desktop
        //testAnim(id_elemento,"bounceOutUp");
        testAnim(id_elemento,"flipInY");
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

     // })
    })  // x bt_expct

  }) // x ready

  </script>

  </body>
</html>