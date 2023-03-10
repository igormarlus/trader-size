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
    <link rel="amphtml" href="<?=base_url()?>futebol/amp/<?=$this->uri->segment(3)?>/<?=$id_evento?>/">

    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">

    <!--<link rel="stylesheet" href="<?=base_url()?>vendor-porto/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/utils.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/fontawesome/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/linecons/linecons.css">


<!-- -->

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Trader Size" />
  <meta name="autor" content="Trader Size" />

  <meta property="og:url" content="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$id_evento?>">
  <? if(!empty($champ)){ ?>
    <meta property="og:title" content="Apostas Esportiva Online Futebol jogo: <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?>">
   <? }else{ ?> 
   <meta property="og:title" content="Apostas Esportiva Online Futebol jogo: <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?>  - <?=$champ->row()->nome?>..">
   <? } ?>
  
    <meta property="og:site_name" content="Trader Size - Apostas Esportiva Bets <?=$dd->evento?>">
    <meta property="og:image" content="https://tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="image/png">
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="<?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde está o Dinheiro! Odds futebol">
    
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="https://tradersize.com/feeds/jogos" />
  <!--  OUTRAS LINGUAGENS -->
  <link rel="canonical" href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
  <meta property="og:url" content="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
  
  <link rel="alternate" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="pt-PT">
  <link rel="alternate" href="<?=base_url()?>futebol/prognostico/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="pt-PT">
  <link rel="alternate" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en-GB">
    
  <meta charset="UTF-8">
  <? if(count($mercados) == 0){ ?>
  <title> &#129351;  <?=str_replace(" v "," x ",$dd->evento)?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Esportiva Bets </title>
    <meta name="title" content="<?=$dd->evento?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Esportiva Bets" />
      <meta name="description" content="Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as apostas no trader esportivo em Tempo Real - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?>. Prognósticos apostas desportivas futebol esperados pelas casas de apostas. "  />
    <meta name="keywords" content="<?=$dd->evento?> ,Betfair, trader, trader esportivo, Apostas Online,Apostas Esportivas,Apostas Futebol,<? #=$dd_evento?>">

  
  <? }else{ ?>
    <title>  <?=$titulo?></title>
      <meta name="title" content="<?=$titulo?>" />
      <meta name="description" content="Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as Apostas Esportiva - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?>. Prognósticos apostas desportivas futebol esperados pelas casas de apostas. "  />

    <meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online Futebol,Apostas Esportiva Esportivas,Apostas Esportiva Futebol,<?=$dd->evento?>">
  <? } ?>

  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-4921369568713372",
          enable_page_level_ads: true
     });
</script>






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


       footer {
          position: fixed;
          bottom:0;
          left:0;
          background-color: #ebd077;
          width: 100%;
          height: 20%;
          padding-left: 1em;

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


<!--<script src="//code.jivosite.com/widget.js" data-jv-id="qPbexb9dvS" async></script> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

  </head>



  <body>

      <a href="https://api.whatsapp.com/send?phone=5581999468046&text=Ol%C3%A1!%20Gostaria%20de%20saber%20sobre%20*Tradersize*" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
    z-index:1000;" target="_blank">
  <i style="margin-top:16px" class="fa fa-whatsapp"></i>
  </a>


    <!-- MODAL -->
    <? if($this->session->userdata('id')){ ?>
    <div class="modal fade" id="modal_bets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apostas/Bets</h5>
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

    <!-- Modal GRAFICOS -->
  <div class="modal fade" id="modal_graph" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times; </button>
          
        </div>
        <div class="modal-body" id="graph_ts">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
        </div>
      </div>
    </div>
  </div>
</div>


    



    <? } ?>
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
    "name": "Apostas Online Futebol - Bets: <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> Previsão do Jogo",
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
      "url" : "<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
      
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
    "@id":"<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"
    },
  "headline":"<?=str_replace(" v "," x ",$dd->evento)?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?> - Trader Esportivo  Futebol Online ",
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
    "keywords":["<?=$dd->evento?>","<?=$times['0']?>","<?=$times['1']?>","Trader Esportivo Esportiva no Jogo <?=$dd->evento?>","<?=$dd->evento?>","<?=str_replace(" v "," x ",$dd->evento)?>","betfair","Trader Esportivo Esportiva Online","Trader Esportivo Esportiva Esportivas Online Futebol","Trader Esportivo Esportiva Esportivas","Trader Esportivo Esportiva Futebol","<?=$champ->row()->nome?>","Trader Esportivo Esportiva Futebol","Pré-jogo","Intercambio","Trader Esportivo Esportiva em tempo real"]
    }   
  </script>

  <script type='application/ld+json'>{
    "@context":"http://schema.org",
    "@type":"WebSite",
    "@id":"#website",
    "url":"<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
    "name":"Tradersize.com",
    "potentialAction":{"@type":"SearchAction",
    "target":"<?=base_url()?>futebol/q={search_term_string}","query-input":"required name=search_term_string"}}</script>
    <meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?=base_url()?>futebol/jogo/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>"/>

    <meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
    <meta itemscope itemprop="name" rel="name"  content="<?=url_title($dd->evento)?>" />
    <meta itemprop="name" content="Trader Esportivo Online Futebol">
    <meta itemprop="logo" content="<?=base_url()?>logo/logo.png">
    <meta itemscope itemprop="publisher" rel="publisher"  content="<?=$dd->dt?>" />



<? if($this->session->userdata('id')){ ?>
  <?php include("includes/2019/header-fix.php");?>   
<? }else{ ?>
  <?php # include("includes/2019/header.php");?>
  <?php include("includes/2019/header-fix.php");?>   
<? } ?>
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
              <? if(!empty($champ->row()->nome)){ ?>
              <? if(strlen($champ->row()->nome) > 2 ){?>
                    <li class="breadcrumb-item">
                      <a href="<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
                      </li>
                  <? } ?>
              <? } ?>    
              <li class="breadcrumb-item active" aria-current="page"><?=str_replace(" v "," x ",$dd->evento)?></li>
            </ol>

        </nav>

      </div>
<!-- END BREADCRUMB -->

<? if($this->session->userdata('login') && !$this->session->userdata('token')) { ?>
<!--
  <div class="container" style="margin-top: 3em">
    <div class="alert alert-danger">Para realizar Trader Esportivo é necessário <a href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=https://tradersize.com/bet">fazer o login na Betfair via Trader Size</a>. Caso não tenha conta na Betfair, <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142">registre-se grátis</a> e <strong>GANHE BÔNUS.</strong> </div>


  <div class="alert alert-danger">

  To place bets you must <a href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=https://tradersize.com/bet">login to Betfair via Trader Size</a>. If you don't have a Betfair account, <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142">sign up for free </a> and get bonuses.
  </div>

  </div>
-->

<? } ?>




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">

<!-- PAGE-TITLE-CONTAINER -->
        <div class="container">
          
          <br />
          <br />
          <div class="row">
            
            <h2 style="font-size: 20px" class=""> 
              <label class="fadeInLeft animated">
                <i class="glyph-icon icon-soccer-ball-o "></i> 
              </label>
              <?=str_replace(" v "," x ",$dd->evento)?> 
              <label class="fadeInRight animated">
                <i class="glyph-icon icon-soccer-ball-o"></i> 
              </label>
            </h2>
          </div>



          <div class="box">

              <?
              $qr_id_mkt = $this->db->query("SELECT id_mkt FROM odds_mkt WHERE id_partida = '".$id_evento."' LIMIT 1 ");
              

              if($qr_id_mkt->num_rows() > 0){

                $id_mkt = $qr_id_mkt->row()->id_mkt;
              
                $qr_sels = $this->db->query("SELECT DISTINCT selection_name FROM odds_mkt WHERE id_mkt = '".$id_mkt."' ");
                ?>
                <? /*
                          foreach ($qr_sels->result() as $sel) { 
                            $qr_sum = $this->db->query("SELECT SUM(tamanho) as soma  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_name = '".$sel->selection_name."' ");
                            $soma = (int) $qr_sum->row()->soma;
                        ?>

                <p><?=$soma?></p>
                <? } */ ?>

                <? /* if($qr_sels->num_rows() > 0 ){?>
                  <div class="container">
                      <div class="row">
                      <div class="col-sm">    
                          <div id="piechart_3d"></div>
                      </div>
                      <div class="col-sm">
                        <div id="barchart_values"></div>
                      </div>

                      </div>
                    </div>
                <? } */ ?>
              </div>

            <? } ?>




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

<!--CARD MODELO wobble -->
              <div class="card border-white my-1 fadeIn  animated">

                <div class="card-body bg-bggray text-center p-3">
                  <div class="h6" style="font-size: 13px">INFORMAÇÕES DA PARTIDA</div>
                  <h3>Odds Futebol</h3>
                  <? if(!empty($champ->row()->nome)){ ?>
                  <? if(strlen($champ->row()->nome) > 2 ){?>
                    <h5>
                      <a href="<?=base_url()?>futebol/campeonato/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
                      

                        
                      </h5>
                  <? } ?>
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
                                  <? if(isset($dd->inicio)){ ?>
                                  <? #=strlen($dd->inicio)?>
                                    <?=$this->padrao_model->fuso_dt($dd->inicio,-3,'i')?> 
                                    <?$dd->inicio?>
                                  <? } ?>
                              <? } ?>
                              <br>
                              <p>(<?=$dd->timezone?> - <?=$dd->country?>)</p>

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
                          <div class="card border-white my-1 fadeIn animated" style="background-color: #fff">

                            <div class="card-body  text-center p-3" style="background-color: #fff">
                              <p><?=$dd->sofascore?></p>
                            </div>
                          </div>
                      <? } ?>
                    <? }else{ ?>
                    <? if($this->session->userdata('id')){ ?>
                    <form action="<?=base_url()?>futebol/sofascore" method='post'>
                      <input type="hidden" name="id_evento" value="<?=$dd->id_evento?>">
                    <input placeholder="Cole o Código do Sofascore para acompanhar pelo Trader Size" type="text" class="form-control" name="sofascore"><input type="submit" value="Send" class="btn btn-success">
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
                  <!--
                  <li class="nav-link <?=$act?>"><a href="#open" class="get_mkt" title="<?=$mercado->marketId?>"><?=$mercado->marketName?> <label class="text-success"> </label></a></li>-->
                  <? if($mercado->marketName != "Asian Handicap"){?>
                  <!--
                  <button data-idevento="29307743" data-idmkt="1.159386497" class="button button-3d button-rounded button-green bt_refresh"><i class="icon-refresh"></i>Refresh</button>

                  <button data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>" class="button button-3d button-rounded button-green bt_mkt"><i class="icon-refresh"></i>Refresh</button>
                  -->



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
                    Veja onde as pessoas estão apostando no jogo entre <strong><?=str_replace(" v "," x ",$dd->evento)?></strong> ao vivo e em tempo real e <strong>Odds Futebol</strong>. 
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
                    Aqui no Trader Size você pode acompanhar os mercados <strong>Odds Futebol</strong> separadamente como, Match Odds (<strong>Probabilidades</strong>), <strong>Over 1.5</strong>, <strong>Over 2.5</strong>, <strong>Correct Score</strong>, <strong>BTS (Ambas Marcam) </strong> entre outros. <br>
                    Através de algorítimos complexos e dinâmicos, conseguimos transformar ou traduzir para você <strong> dados em Informações amigáveis</strong> para o melhor entendimento sobre as <strong>apostas esportivas online</strong>. 
                    <label class="text-red" style="color: red">NÓS NÃO FAZEMOS APOSTAS NO TRADER SIZE.</label> Através de códigos e muita lógica de programação conseguimos obter os dados das apostas através da <a target="_blank" href="https://betfair.com">Betfair</a> e trabalhamos neles com o objetivo de informar aos nossos usuários onde as pessoas estão apostando, tudo isso em <strong>TEMPO REAL</strong>.
                  </p>
                  <p>
                    Você pode acompanhar as informações através de porcentagens referente aos volumes de cada seleção. Explicando melhor, em uma situação do mercado Match Odds ou Probabilidades (Quem vence a partida), existem 3 seleções, Time da casa (HOME), empate (DRAW) e visitante (Away). <strong>A soma das apostas nas 3 seleções dividida pela quantidade das mesmas</strong>, nos retorna exatamente o comportamento das apostas (mercados) naquele determinado momento.
                  </p>
                  <p>A maioria dos jogos tendem a ter mais volume de apostas perto do início do jogo. Alguns jogos mais importantes costumam ter volumes até mesmo dias antes do evento.</p>
                  <h3>Mais detalhes sobre os times:</h3>
                  <p>Próximos Jogos: <a href="<?=base_url()?>futebol/q/<?=str_replace(" ","-",$times[0])?>"> <?=$times[0]?></a></p>
                  <p>Próximos Jogos: <a href="<?=base_url()?>futebol/q/<?=str_replace(" ","-",$times[1])?>"><?=$times[1]?></a></p>
                  <p>Vejam onde estão as apostas e as <strong>Odds Futebol</strong> no trader esportivo em Tempo Real. Acompanhe em modo de porcentagens as <strong>Apostas Online de Futebol</strong></p>

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

              


                <div class="tab-content">

                  <div id="mercado_ativo" class="tab-pane active">  

                    

<!--CARD MODELO -->
              <!-- MATCH ODDS -->
              <div class="card my-1 fadeInUp animated">

                <div class="card-header" id="">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <button data-toggle="tab"  href="#mercado_ativo" class="nav-link active" href="#mercado_ativo" id="tit_mkt_now" style="font-weight: bold;"><label id="tab_tit">Match Odds</label></a>
                    </li>
                    <? if($this->session->userdata('id')){ ?>
                    <!--
	                    <li class="nav-item">
	                      <!--<button class="nav-link" data-toggle="tab"  href="#box_graph">Graph</button> 
	                      <button type="button" data-toggle="modal" data-target="#modal_graph">Open Modal</button>
	                    </li> -->

                    <? }  ?>
                  <!--  
                    <li class="nav-item">
                      <a class="nav-link" href="#">Contra (LAY)</a>
                    </li>
                  -->
                  </ul>
                </div>
                
                
                <div class="tab-content">

	                <div id="mercado_ativo" class="tab-pane active">	

		                <div class="card-body fadeInLeft animated">

		                  <div align="right" class="float-right">
		                      <div class="form-check form-check-inline checkbox">
		                        <input class="form-check-input" type="checkbox" name="auto" id="bt_auto" value="1" style="">
		                        <label class="form-check-label btn btn-outline-success" for="bt_auto" style="font-family: sans-serif;" > <i class="glyph-icon icon-refresh"></i> AUTO REFRESH - Atualiza Odds Futebol</label>
                            <? if($this->session->userdata('id')){ ?>
                            <audio id="audio">
                               <source src="<?=base_url()?>includes/aguia.mp3" type="audio/mp3" />
                            </audio>
                            <? } ?>

		                      </div>
		                    </div>

		                  <p class="mt-2 mb-2">
		                    <!--<h3 class="card-title text-left " id="tit_mkt_now">Match Odds</h3>-->
		                    
                        <div class="debugg"></div>
		                    <div class="open_aqui"></div>
		                    
		                    <p align="center">
		                      <button style="display: none;" id="id_mkt_mo" value="" class="btn btn-success bt_refresh tada animated" data-idevento="<?=$dd->id_evento?>" data-idmkt=""> <i class="glyph-icon icon-refresh"></i> Refresh</button>
		                      <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_mkts"><i class="glyph-icon icon-star"></i> Outros mercados</button>
		                    </p>
		                  </p>

		                </div> <!-- X CARD BODY -->
		            </div> <!--  X  TAB PANE -->

		            <div id="box_graph" class="tab-pane fade">
    					    <h3>GRAFICOS</h3>

    					    <p>Gráficos de Odds.</p>
    					  </div>


	            </div> <!-- X TAB-CONTENT -->

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
              <div class="card my-1 fadeInUp animated">
                <div class="card-header">
                  <strong>Análise Trader</strong>
                </div>

                <div class="card-body">
                  <h5 class="card-title text-center">Confira a <strong>Expectativa do Mercado</strong> para esse jogo:</h5>
                  <p align="center">
                  <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_exptc"><i class="glyph-icon icon-soccer-ball-o"></i> Clique Aqui</button>
                  
                </p>
                <p align="center">Prognósticos Trader Esportivo  futebol esperados pelas casas de apostas.</p>
                  <br />
                  <br />

                <p id="call_expc" align="center"></p>

                </div>

              </div>

<!--END CARD MODELO -->
              <div class="card my-1 fadeInUp animated">

                <div class="card-header" id="">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <button data-toggle="tab"  href="#mercado_ativo" class="nav-link active" href="#mercado_ativo" id="tit_mkt_now" style="font-weight: bold;"><label id="tab_tit">Últimos resultados</label></a>
                    </li>
                  
                  
                </div>

              <div class="card-body fadeInLeft animated">
                      <?
                      
                      $dd_evento = $dd;
                      #$id_evento = $dd->id;
                      #echo "********* - ".$dd->evento." - *********";
                      $times = explode(" v ", $dd->evento);
                      if(!isset($times[1])){
                        $times = explode(" x ", $dd->evento);
                      }
                      $home = $times[0];
                      $away = $times[1];
                      #print_r($times);

                      $qr_home = $this->db->query("SELECT * FROM selections WHERE name = '".$home."' ");
                      $qr_away = $this->db->query("SELECT * FROM selections WHERE name = '".$away."' ");
                      if($qr_home->num_rows() > 0){
                        $id_home = $qr_home->row()->id_selection;     
                      }else{
                        $id_home = 0;
                      }
                      if($qr_away->num_rows() > 0){
                        $id_away = $qr_away->row()->id_selection;     
                      }else{
                        $id_away = 0;
                      }
                      $qr_home_results = $this->db->query("SELECT * FROM resultados WHERE id_home = $id_home OR id_away = $id_home ORDER BY id_partida asc");
                      $qr_away_results = $this->db->query("SELECT * FROM resultados WHERE id_home = $id_away OR id_away = $id_away ORDER BY id_partida asc ");
                      ?>
                      <? #=$dd->evento?>
                      <!--
                      <br>
                      <?=$id_home?> (<strong><?=$qr_home_results->num_rows()?></strong>) <br>
                      <?=$id_away?> (<strong><?=$qr_away_results->num_rows()?></strong>) <br>
                    -->
                    <style type="text/css">
                      .placar{
                        font-size: 11px;
                      }
                      
                    </style>
                    <?
                    $col_s = "12";
                    if($this->agent->is_mobile()){
                      $col_s = "12";
                    }

                    $over_0_5 = 0;
                    $over_1_5 = 0;
                    $over_2_5 = 0;
                    $over_3_5 = 0;

                    $home_over_0_5 = 0;
                    $home_over_1_5 = 0;
                    $home_over_2_5 = 0;
                    $home_over_0_5 = 0;



                    $over_0_5_away = 0;
                    $over_1_5_away = 0;
                    $over_2_5_away = 0;
                    $over_3_5_away = 0;

                    $away_over_0_5 = 0;
                    $away_over_1_5 = 0;
                    $away_over_2_5 = 0;
                    $away_over_0_5 = 0;

                    $resultados_home = [];
                    ?>
                      <div class="row" class="placar">
                          <div class="col-6 col-sm-12">
                            <h3><?=$home?></h3>
                            <? if($qr_home_results->num_rows() > 0 && $id_home > 0){ ?>
                            <table class="table placar">
                              <? foreach($qr_home_results->result() as $jogo_result){ ?>
                                <?
                                $qr_evento = $this->padrao_model->get_by_matriz('id_evento',$jogo_result->id_partida,'partidas');
                                if($qr_evento->num_rows() == 0){
                                  $qr_evento = $this->padrao_model->get_by_matriz('id_evento',$jogo_result->id_partida,'partidas_bk');
                                }
                                $dd_partida = $qr_evento->row();
                                $gols_total = $jogo_result->home_gols + $jogo_result->away_gols;

                                if(!isset($resultados_home["$jogo_result->home_gols-$jogo_result->away_gols"])){
                                      $resultados_home["$jogo_result->home_gols-$jogo_result->away_gols"] = 1;
                                    }else{
                                      $resultados_home["$jogo_result->home_gols-$jogo_result->away_gols"]++;
                                    }

                                if($jogo_result->home_gols == "Any Other Draw"){
                                  $gols_total = 8;
                                }
                                if($jogo_result->home_gols == "Any Other Home Win" || $jogo_result->home_gols == "Any Other Ayay Win"){
                                  $gols_total = 4;
                                }

                                if($gols_total > 0){$over_0_5++;}
                                if($gols_total > 1){$over_1_5++;}
                                if($gols_total > 2){$over_2_5++;}
                                if($gols_total > 3){$over_3_5++;}
                                ?>
                                <tr>
                                  <td><?=substr($dd_partida->inicio,0,10)?></td>
                                  <td><?=str_replace($home, "<a href='".base_url()."futebol/time/".$home."'><strong>$home</strong></a>", $dd_partida->evento)?> <?#=$dd_partida->evento?></td>
                                  <td><strong><?=$jogo_result->home_gols?></strong> x <strong><?=$jogo_result->away_gols?></strong></td>
                                  <td>  <?=$gols_total?> Gol(s)</td>
                                </tr>
                                
                              <? } ?>
                              <tr>
                                
                              </tr>
                              </table>
                              <h4>Gols <a href="<?=base_url()?>futebol/time/<?=$home?>"><?=$home?></a></h4>
                              <table class="table" style="font-size: 12px;border:red 0px solid">
                                <tr>
                                  <th><strong>Gols</strong></th>
                                  <th><strong>Over/partidas</strong></th>
                                  <th><strong>Over</strong></th>
                                  <th><strong>Under</strong></th>
                                </tr>
                                <tr style="">
                                  <td><strong>0.5</strong></td><td align="rigth">  <?=$over_0_5?>/<?=$qr_home_results->num_rows()?></td>
                                  <td>
                                    <?
                                    $calc_0_5 = ($over_0_5 * 100) / $qr_home_results->num_rows();
                                    $calc_0_5_under = 100 - $calc_0_5;
                                    $class_badge = "alert";
                                    $class_badge_under = "alert";
                                    if($calc_0_5 >= 80){
                                      $class_badge = "alert alert-success";
                                    }
                                    if($calc_0_5_under >= 80){
                                      $class_badge_under = "alert alert-success";
                                    }
                                    ?>
                                    <strong class="<?=$class_badge?>"><?=round($calc_0_5,2)?>%</strong> 
                                    
                                  </td>
                                  <td><strong class="<?=$class_badge_under?>"><?=round($calc_0_5_under,2)?>%</strong> </td>
                                </tr>
                                <tr style="">
                                  <td><strong>1.5</strong></td><td>  <?=$over_1_5?>/<?=$qr_home_results->num_rows()?></td>
                                  <td>
                                    <?
                                    $calc_1_5 = ($over_1_5 * 100) / $qr_home_results->num_rows();
                                    $calc_1_5_under = 100 - $calc_1_5 ;
                                    $class_badge = "alert";
                                    if($calc_1_5 >= 80){
                                      $class_badge = "alert alert-success";
                                    }
                                    if($calc_1_5_under >= 80){
                                      $class_badge_under = "alert alert-success";
                                    }
                                    ?>
                                    <strong class="<?=$class_badge?>"><?=round($calc_1_5,2)?>%</strong> 
                                    
                                  </td>
                                  <td><strong class="<?=$class_badge_under?>"><?=round($calc_1_5_under,2)?>%</strong> </td>
                                </tr>
                                <tr style="">
                                  <td><strong>2.5</strong></td><td> <?=$over_2_5?>/<?=$qr_home_results->num_rows()?></td>
                                  <td>
                                    <?
                                    $calc_2_5 = ($over_2_5 * 100) / $qr_home_results->num_rows();
                                    $calc_2_5_under = 100 - $calc_2_5 ;
                                    $class_badge = "alert";
                                    if($calc_2_5 >= 80){
                                      $class_badge = "alert alert-success";
                                    }
                                    if($calc_2_5_under >= 80){
                                      $class_badge_under = "alert alert-success";
                                    }
                                    ?>
                                    <strong class="<?=$class_badge?>"><?=round($calc_2_5,2)?>%</strong> 
                                    
                                  </td>
                                  <td><strong class="<?=$class_badge_under?>"><?=round($calc_2_5_under,2)?>%</strong> </td>
                                </tr>
                                <tr style="">
                                  <td><strong>3.5</strong></td><td> <?=$over_3_5?>/<?=$qr_home_results->num_rows()?></td>
                                  <td>
                                    <?
                                    $calc_3_5 = ($over_3_5 * 100) / $qr_home_results->num_rows();
                                    $calc_3_5_under = 100 - $calc_3_5 ;
                                    $class_badge = "alert";
                                    if($calc_3_5 >= 80){
                                      $class_badge = "alert alert-success";
                                    }
                                    if($calc_3_5_under >= 80){
                                      $class_badge_under = "alert alert-success";
                                    }
                                    ?>
                                    <strong class="<?=$class_badge?>"><?=round($calc_3_5,2)?>%</strong> 
                                    
                                  </td>
                                  <td><strong class="<?=$class_badge_under?>"><?=round($calc_3_5_under,2)?>%</strong> </td>
                                </tr>
                              </table>
                              <? } ?>

                              <h4>Placares <a href="<?=base_url()?>futebol/time/<?=$home?>"><?=$home?></a></h4>
                                <table class="table">
                                  <?
                                  foreach ($resultados_home as $placar => $qtd) {?>
                                  <tr>
                                    <td><?=$placar?></td><td> <?=$qtd?>/<?=count($resultados_home)?></td>
                                  </tr>
                                  <? } ?>
                                </table>


                            </div>


                            <div class="col-6 col-sm-12">
                              <?
                              $resultados_away = [];
                              ?>
                              <h3><?=$away?></h3>
                                <? if($qr_away_results->num_rows() > 0  && $id_away > 0){ ?>
                                <table class="table placar">
                                  <? foreach($qr_away_results->result() as $jogo_result){ ?>
                                    <?
                                    $qr_evento = $this->padrao_model->get_by_matriz('id_evento',$jogo_result->id_partida,'partidas');
                                    if($qr_evento->num_rows() == 0){
                                      $qr_evento = $this->padrao_model->get_by_matriz('id_evento',$jogo_result->id_partida,'partidas_bk');
                                    }
                                    $dd_partida = $qr_evento->row();
                                    $gols_total_away = $jogo_result->home_gols + $jogo_result->away_gols;

                                    if(!isset($resultados_away["$jogo_result->home_gols-$jogo_result->away_gols"])){
                                      $resultados_away["$jogo_result->home_gols-$jogo_result->away_gols"] = 1;
                                    }else{
                                      $resultados_away["$jogo_result->home_gols-$jogo_result->away_gols"]++;
                                    }
                                    
                                    if($jogo_result->home_gols == "Any Other Draw"){
                                      $gols_total_away = 8;
                                    }
                                    if($jogo_result->home_gols == "Any Other Home Win" || $jogo_result->home_gols == "Any Other Ayay Win"){
                                      $gols_total_away = 4;
                                    }

                                      if($gols_total_away > 0){$over_0_5_away++;}
                                      if($gols_total_away > 1){$over_1_5_away++;}
                                      if($gols_total_away > 2){$over_2_5_away++;}
                                      if($gols_total_away > 3){$over_3_5_away++;}
                                    ?>
                                    <tr>
                                      <td><?=substr($dd_partida->inicio,0,10)?></td>
                                      <td><?=str_replace($away, "<a href='".base_url()."futebol/time/".$away."'><strong>$away</strong></a>", $dd_partida->evento)?><? #=$dd_partida->evento?></td>
                                      <td><strong><?=$jogo_result->home_gols?></strong> x <strong><?=$jogo_result->away_gols?></strong></td>
                                      <td>  <?=$gols_total_away?> Gol(s)</td>
                                    </tr>
                                    <h6>  <? #=$jogo_result->id_partida?></h6>
                                  <? } ?>
                                  </table>

                                  <h4>Gols <a href="<?=base_url()?>futebol/time/<?=$away?>"><?=$away?></a></h4>
                                    <table class="table" style="font-size: 12px;border:red 0px solid">
                                      <tr>
                                        <th><strong>Gols</strong></th>
                                        <th><strong>Over/partidas</strong></th>
                                        <th><strong>Over</strong></th>
                                        <th><strong>Under</strong></th>
                                      </tr>
                                      <tr style="">
                                        <td><strong>0.5</strong></td><td align="rigth">  <?=$over_0_5_away?>/<?=$qr_away_results->num_rows()?></td>
                                        <td>
                                          <?
                                          $calc_0_5_away = ($over_0_5_away * 100) / $qr_away_results->num_rows();
                                          $calc_0_5_under_away = 100 - $calc_0_5_away ;
                                          $class_badge = "alert";
                                          if($calc_0_5_away >= 80){
                                            $class_badge = "alert alert-success";
                                          }
                                          if($calc_0_5_under_away >= 80){
                                            $class_badge_under_away = "alert alert-success";
                                          }
                                          ?>
                                          <strong class="<?=$class_badge?>"><?=round($calc_0_5_away,2)?>%</strong> 
                                          
                                        </td>
                                        <td><strong class="<?=$class_badge_under_away?>"><?=round($calc_0_5_under_away,2)?>%</strong> </td>
                                      </tr>
                                      <tr style="">
                                        <td><strong>1.5</strong></td><td>  <?=$over_1_5_away?>/<?=$qr_away_results->num_rows()?></td>
                                        <td>
                                          <?
                                          $calc_1_5_away = ($over_1_5_away * 100) / $qr_away_results->num_rows();
                                          $calc_1_5_under_away = 100 - $calc_1_5_away ;
                                          $class_badge = "alert";
                                          if($calc_1_5_away >= 80){
                                            $class_badge = "alert alert-success";
                                          }
                                          if($calc_1_5_under_away >= 80){
                                            $class_badge_under_away = "alert alert-success";
                                          }
                                          
                                          ?>
                                          <strong class="<?=$class_badge?>"><?=round($calc_1_5_away,2)?>%</strong> 
                                          
                                        </td>
                                        <td><strong class="<?=$class_badge_under_away?>"><?=round($calc_1_5_under_away,2)?>%</strong> </td>
                                      </tr>
                                      <tr style="">
                                        <td><strong>2.5</strong></td><td> <?=$over_2_5_away?>/<?=$qr_away_results->num_rows()?></td>
                                        <td>
                                          <?
                                          $calc_2_5_away = ($over_2_5_away * 100) / $qr_away_results->num_rows();
                                          $calc_2_5_under_away = 100 - $calc_2_5_away ;
                                          $class_badge = "alert";
                                          if($calc_2_5_away >= 80){
                                            $class_badge = "alert alert-success";
                                          }
                                          if($calc_2_5_under_away >= 80){
                                            $class_badge_under_away = "alert alert-success";
                                          }
                                          ?>
                                          <strong class="<?=$class_badge?>"><?=round($calc_2_5_away,2)?>%</strong> 
                                          
                                        </td>
                                        <td><strong class="<?=$class_badge_under_away?>"><?=round($calc_2_5_under_away,2)?>%</strong> </td>
                                      </tr>
                                      <tr style="">
                                        <td><strong>3.5</strong> </td><td> <?=$over_3_5_away?>/<?=$qr_away_results->num_rows()?></td>
                                        <td>
                                          <?
                                          $calc_3_5_away = ($over_3_5_away * 100) / $qr_away_results->num_rows();
                                          $calc_3_5_under_away = 100 - $calc_3_5_away ;
                                          $class_badge = "alert";
                                          if($calc_3_5_away >= 80){
                                            $class_badge = "alert alert-success";
                                          }
                                          if($calc_3_5_under_away >= 80){
                                            $class_badge_under_away = "alert alert-success";
                                          }
                                          ?>
                                          <strong class="<?=$class_badge?>"><?=round($calc_3_5_away,2)?>%</strong> 
                                          
                                        </td>
                                        <td><strong class="<?=$class_badge_under_away?>"><?=round($calc_3_5_under_away,2)?>%</strong> </td>
                                      </tr>
                                    </table>

                                <? } ?>
                                <h4>Placares <a href="<?=base_url()?>futebol/time/<?=$away?>"><?=$away?></a></h4>
                                <table class="table">
                                  <?
                                  foreach ($resultados_away as $placar => $qtd) {?>
                                  <tr>
                                    <td><?=$placar?></td><td> <?=$qtd?>/<?=count($resultados_away)?></td>
                                  </tr>
                                  <? } ?>
                                </table>
                              </div>

                        </div>
                     



                    </div>
                  </div>
                </div>


              </div>
              
              
              <!-- BODOG 
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

                

              </div> -->

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
                    <a href="https://ads.betfair.com/redirect.aspx?pid=2816870&bid=10506" target="_blank" ><img src="https://ads.betfair.com/renderImage.aspx?pid=2816870&bid=10506" border=0 style=""></img>Betfair Trader Esportivo Justas da Bolsa Esportiva</a>
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


            <div class="row" style="padding: 2em">
              <p >   
               Saiba onde as pessoas estão apostando no jogo de futebol entre <strong><?=$dd->evento?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> às <?=substr($dd->inicio,10,6)?>h (Local)</strong>, você pode obter informações valiosas sobre as tendências de apostas e as probabilidades de um determinado resultado de cada mercado separadamente. Isso pode ajudar você a tomar decisões informadas sobre suas apostas e aumentar suas chances de ganhar.
              </p>

              <p>
                Uma ferramenta que mostra essas <strong>informações são extremamente úteis para os apostadores</strong>. Ela fornece informações sobre onde as pessoas estão apostando, quais são as probabilidades de um determinado resultado e quais são as tendências de apostas. Isso ajuda os apostadores a tomar decisões informadas sobre suas apostas e aumentar suas chances de ganhar.
              </p>
              <p>
                Além disso, essa ferramenta também pode ajudar os <strong>apostadores a entender melhor o mercado de apostas</strong> e a identificar oportunidades de apostas lucrativas. Isso pode ajudar os apostadores a maximizar seus lucros e minimizar seus riscos.
              </p>
              <p>
                Portanto, <strong>saber onde as pessoas estão apostando em jogos de futebol é extremamente importante</strong> para os apostadores. Uma ferramenta que mostra essas informações pode ajudar os apostadores a tomar decisões informadas e aumentar suas chances de ganhar. 
              </p>
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

    <!--<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" /> -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  


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
          //alert(<?=$id_evento?>);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $("#mkt"+mkt_trat).html(dataini);

          $("#id_mkt_mo").show();
          testAnim("bt_clear","flipInX");

          


          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");

                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();


                targetOffset = $("#sel"+selection_id_bet).offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);




              });
              $("#cancel_bet").click(function(){

                $("#footer_bet").hide();

              })
          
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
            //console.log("get..."+c);           
            c = 0;
            
            //alert("foi em "+tempo+" "+c+" sec");


          
          
  //alert("foi");
            // SOM DA AGUIA
            

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

            /* ########################################*/
            $.get("<?=base_url()?>bets/get_odds_api/"+id_evento+"/"+id_mkt , function(data){
              //alert(data);
              //$.getScript( "<?=base_url()?>js-front/plugins.js");
              //$("#mkt"+mkt_trat).html(data);
              //$(".open_aqui").html(data);
             // $("#"+id_elemento).html("Refresh");
              $('.bt_refresh').html("Refresh");
              testAnim("bt_clear","flipInX");


              


              $(".bt_back").hover(function(){

                $(".back").attr("style","background-color:#00f");

              });


              var parsed = JSON.parse(data);
              var cont_back = 0;
              var cont_lay = 0;
              var soma_total_back = parseFloat(0);
              var soma_total_lay = 0;

              var total_sel_back = 0;
              var total_sel_lay = 0;

              var total_soma_sel_back = 0;
              var total_soma_sel_lay = 0;

              var percentual_back_sel = 0;
              var percentual_lay_sel = 0;

              var color_perc = "#000";

              console.log(parsed);
          //parsed.each(function(pvalue,index,ar){
            var conteudo = "";
            var contador_geral = 0;
            for (var data in parsed) {
              contador_geral++;
              //console.log(parsed.status);
              if(parsed.status == "OPEN"){
                $("#status_live").html(parsed.status).css('color','green');
              }
              if(parsed.status == "SUSPENDED"){
                $("#status_live").html(parsed.status).css('color','#f00');
              }
              if(parsed.status == "CLOSED"){
                $("#status_live").html(parsed.status).css('color','red');
              }
              $("#status_live").html(parsed.status);
              var total_match = parsed.totalMatched.toLocaleString('pt-br', {minimumFractionDigits: 2});
              var odd_back_now = 0
              var money_back_now = 0
              $("#total_correspondidos").html("$ "+total_match);
                      console.log( JSON.stringify(parsed.runners) );

                      parsed.runners.forEach(function(sels) {
                        // pegue aqui os dados do item, por exemplo:
                        console.log(sels.selectionId);
                        // ODDS BACK

                        if(contador_geral > 1){
                          return false;
                        }

                        sels.ex.availableToBack.forEach(function(sels_dd) { cont_back++;
                          soma_total_back += sels_dd.size;
                          console.log(sels_dd.size+" = "+soma_total_back+" ("+cont_back+")");

                          $("#size_back_"+cont_back+"_"+sels.selectionId).val(sels_dd.size);
                          total_sel_back += sels_dd.size;
                          
                          if(cont_back == 1){

                            
                            // SUBIDA E DESCIDA DE ODD
                            odd_back_now = parseFloat($("#odd_back_"+sels.selectionId).html()); 
                            if(odd_back_now > sels_dd.price){
                              $("#gap_back_"+sels.selectionId).html("<i class='fa fa-arrow-circle-down' style='color:green'></i>");
                            }
                            if(odd_back_now < sels_dd.price){
                              $("#gap_back_"+sels.selectionId).html("<i class='fa fa-arrow-circle-up' style='color:red'></i>");
                            }
                            if(odd_back_now == sels_dd.price){
                              $("#gap_back_"+sels.selectionId).html("<i class='fa fa-stop-circle-o'></i>");
                            }
                            $("#odd_back_"+sels.selectionId).html(sels_dd.price);
                            

                            //$("#percentual_back_"+sels.selectionId).html(sels_dd.size);
                            testAnim("odd_back_"+sels.selectionId,"flipInX");
                          }
                        });
                        $("#total_size_back"+sels.selectionId).val(total_sel_back);
                        total_soma_sel_back = total_soma_sel_back+total_sel_back;
                        console.log("PARCIAL BACK: "+total_soma_sel_back+" Contador geral: "+contador_geral);
                        cont_back = 0;
                        total_sel_back = 0;
                        //var soma_total_back_trat = soma_total_back.toFixed(2).replace(".",",");
                        //var soma_total_back_trat = soma_total_back.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                        //var soma_total_back_trat = soma_total_back.toLocaleString('pt-br', {minimumFractionDigits: 2});
                        $("#soma_total_back").html(total_soma_sel_back.toLocaleString('pt-br', {minimumFractionDigits: 2}));

                        // ############# PERCENTUAL #####################
                        var total_back_sels = soma_total_back;
                        var total_back_sels_trat = parseInt(total_back_sels);
                        for(var i=0; i<$(".total_size_back").length; i++){
                          var val_total_sel = $(".total_size_back").eq(i).val();
                          var id_total_sel = $(".total_size_back").eq(i).attr('title');
                          if(val_total_sel.length > 2){

                            var val_total_sel_trat = parseInt(val_total_sel);
                            var sel_total = parseFloat($("#total_size_back"+id_total_sel).val()).toFixed(2);
                            var soma_total_back_float = parseFloat(soma_total_back).toFixed(2); 
                             console.log("TOTAL BACK: "+sel_total+" selectionid: "+id_total_sel+" TOTAL: "+total_soma_sel_back);
                            var percentual_back_sel_div =  (sel_total  * 100  ) / total_soma_sel_back ;

                            if(percentual_back_sel_div < 30){
                              color_perc = '#f00';
                            }
                            if(percentual_back_sel_div > 85){
                              color_perc = 'green';
                            }
                            if(percentual_back_sel_div > 30 && percentual_back_sel_div < 85){
                              color_perc = '#000';
                            }

                            // SUBIDA E DESCIDA MONEY
                            money_back_now = $("#percentual_back_"+id_total_sel).html().replace("%","");
                            money_back_now = parseFloat(money_back_now); 
                            if(money_back_now < percentual_back_sel_div){
                              $("#gap_money_back_"+sels.selectionId).html("<i class='fa fa-arrow-circle-down' style='color:red'></i>");
                            }
                            if(money_back_now > percentual_back_sel_div){
                              $("#gap_money_back_"+sels.selectionId).html("<i class='fa fa-arrow-circle-up' style='color:green'></i>");
                            }
                            if(money_back_now == percentual_back_sel_div){
                              $("#gap_money_back_"+sels.selectionId).html("<i class='fa fa-stop-circle-o'></i>");
                            }
                            
                            $("#percentual_back_"+id_total_sel).html(percentual_back_sel_div.toFixed(2)+"%").css('color',color_perc);
                            $("#progress_back_"+id_total_sel).html(percentual_back_sel_div.toFixed(2)+"%").attr('aria-valuenow',percentual_back_sel_div.toFixed(2)).css('width',percentual_back_sel_div.toFixed(2));
                            
                          }
                        } // x for
                        
                            //$("#percentual_back_"+id_total_sel).html(percentual_back_sel.toFixed(2));
                        
                        //$("#percentual_back_"+sels.selectionId).html(val_total_sel+"0000");
                        //alert(total_id_sel);

                        // ODDS LAY
                        sels.ex.availableToLay.forEach(function(sels_dd) { cont_lay++;
                          soma_total_lay += sels_dd.size;
                          console.log(sels_dd.size+" = "+soma_total_lay+" ("+cont_lay+")");

                          $("#size_lay_"+cont_lay+"_"+sels.selectionId).val(sels_dd.size);
                          total_sel_lay += sels_dd.size;
                          
                          if(cont_lay == 1){
                            $("#odd_lay_"+sels.selectionId).html(sels_dd.price);
                            //$("#percentual_lay_"+sels.selectionId).html(sels_dd.size);
                            testAnim("odd_lay_"+sels.selectionId,"flipInX");
                          }
                        });

                        $("#total_size_lay"+sels.selectionId).val(total_sel_lay);
                        total_soma_sel_lay = total_soma_sel_lay+total_sel_lay;
                        console.log("PARCIAL lay: "+total_soma_sel_lay+" Contador geral: "+contador_geral);
                        cont_lay = 0;
                        total_sel_lay = 0;


                        //var soma_total_lay_trat = soma_total_lay.toFixed(2).replace(".",",");
                        //var soma_total_lay_trat = soma_total_lay.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                        //var soma_total_lay_trat = soma_total_lay.toLocaleString('pt-br', {minimumFractionDigits: 2});
                        $("#soma_total_lay").html(total_soma_sel_lay.toLocaleString('pt-br', {minimumFractionDigits: 2}));

                        // ############# PERCENTUAL #####################
                        var total_lay_sels = soma_total_lay;
                        var total_lay_sels_trat = parseInt(total_lay_sels);
                        //alert($(".total_size_lay").length);
                        for(var i=0; i<$(".total_size_lay").length; i++){
                          //alert("AQUI 5");
                          var val_total_sel = $(".total_size_lay").eq(i).val();
                          var id_total_sel = $(".total_size_lay").eq(i).attr('title');
                          if(val_total_sel.length > 2){

                            var val_total_sel_trat = parseInt(val_total_sel);
                            var sel_total = parseFloat($("#total_size_lay"+id_total_sel).val()).toFixed(2);
                            var soma_total_lay_float = parseFloat(soma_total_lay).toFixed(2); 
                             console.log("TOTAL lay: "+sel_total+" selectionid: "+id_total_sel+" TOTAL: "+total_soma_sel_lay);
                            var percentual_lay_sel_div =  (sel_total  * 100  ) / total_soma_sel_lay ;

                            if(percentual_lay_sel_div < 30){
                              color_perc = '#f00';
                            }
                            if(percentual_lay_sel_div > 85){
                              color_perc = 'green';
                            }
                            if(percentual_lay_sel_div > 30 && percentual_back_sel_div < 85){
                              color_perc = '#000';
                            }

                           /*
                            $("#percentual_lay_"+id_total_sel).html(percentual_lay_sel_div.toFixed(2)+"%").css('color',color_perc);
                            $("#progress_lay_"+id_total_sel).html(percentual_lay_sel_div.toFixed(2)+"%").attr('aria-valuenow',percentual_lay_sel_div.toFixed(2)).css('width',percentual_lay_sel_div.toFixed(2));
                            */

                            $("#percentual_lay_"+id_total_sel).html(percentual_lay_sel_div.toFixed(2)+"%").css('color',color_perc);

                            $("#progress_lay_"+id_total_sel).html(percentual_lay_sel_div.toFixed(2)+"%").attr('aria-valuenow',percentual_back_sel_div.toFixed(2)).css('width',percentual_lay_sel_div.toFixed(2));
                          }
                        } // x for


                    });
                      
                  //});



              //console.log(" +++++++-");
              conteudo += parsed;
              $(".debugg").html(conteudo);
              
              
          };
          
          //alert(count(parsed));


          $(".debugg").html(parsed);
          $("#"+id_elemento).html("Refresh");
          testAnim("bt_clear","flipInX");

              // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");

                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });
              

              $("#cancel_bet").click(function(){

                $("#footer_bet").hide();

              })
              
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
          var audio = document.getElementById('audio');
          //audio.play();
          testAnim("logo_ts","heartBeat");


          
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

          // BEEEEEEEEEEETS
          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");
                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });
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
        $.get("<?=base_url()?>bets/get_odds_api/"+id_evento+"/"+id_mkt , function(data){
          //alert(mkt_trat);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          
         // $("#mkt"+mkt_trat).html(data);


          var parsed = JSON.parse(data);
          var cont_back = 0;
          var cont_lay = 0;
          var soma_total_back = parseFloat(0);
          var soma_total_lay = 0;
          console.log(parsed);
          //parsed.each(function(pvalue,index,ar){
            var conteudo = "";
            for (var data in parsed) {
              if(parsed.status == "OPEN"){
                $("#status_live").html(parsed.status).css('color','red');
              }
              if(parsed.status == "OPEN"){
                $("#status_live").html(parsed.status);
              }
              
              $(".total_correspondidos").html(parsed.totalMatched+"***-*-*-*");
              /*
              for(parsed.runners in sels){

                console.log( JSON.stringify(sels) );

              }
              */
             //console.log( JSON.stringify(parsed.runners) );
            /*
              $(parsed.runners).each(function (run) {
                  console.log(run);
                  //$('.product-slider').append(item.NmProduto);
                 // console.log( JSON.stringify(run) );
              });
              */

                  //$.each(parsed.runners, function (key, run) {
                      //console.log(item);
                      //$('.product-slider').append(item.NmProduto);
                      //console.log(run+" - "+key);
                     /* $.each(run.availableToBack , function(back_key, back){
                        //console.log( JSON.stringify(back) );
                        $("#odd_back_"+run.selectionId).html(back.price+"--");
                      })
                      */
                      console.log( JSON.stringify(parsed.runners) );

                      parsed.runners.forEach(function(sels) {
                        // pegue aqui os dados do item, por exemplo:
                        console.log(sels.selectionId);

                        sels.ex.availableToBack.forEach(function(sels_dd) { cont_back++;
                          soma_total_back = parseFloat(sels_dd.size+soma_total_back);
                          console.log(soma_total_back+" ------------- "+sels_dd.size+" = "+soma_total_back.toFixed(2));
                          
                          if(cont_back == 1){
                            $("#odd_back_"+sels.selectionId).html(sels_dd.price+" "+cont_back);
                            //$("#percentual_back_"+sels.selectionId).html(sels_dd.size);
                            testAnim("odd_back_"+sels.selectionId,"flipInX");
                          }
                        });
                        cont_back = 0;
                        //var total_back_match = soma_total_back.toLocaleString('pt-br', {minimumFractionDigits: 2});
                        //alert(total_back_match);
                        $("#soma_total_back").html(soma_total_back.toLocaleString('pt-br', {minimumFractionDigits: 2}));

                        sels.ex.availableToLay.forEach(function(sels_dd) { cont_lay++;
                          console.log(sels_dd.price);
                          soma_total_lay = parseFloat(sels_dd.size+soma_total_lay);
                          console.log(sels_dd.size+" = "+soma_total_lay.toFixed(2));
                          if(cont_lay == 1){
                            $("#odd_lay_"+sels.selectionId).html(sels_dd.price+" "+cont_lay);
                            $("#percentual_lay_"+sels.selectionId).html(sels_dd.size);
                            testAnim("odd_lay_"+sels.selectionId,"flipInX");
                          }
                        });
                        cont_lay = 0;;
                    });
                      
                  //});



              console.log(" +++++++-");
              conteudo += parsed;
              $(".debugg").html(conteudo);
              
              
          };
          
          //alert(count(parsed));


          $(".debugg").html(parsed);
          $("#"+id_elemento).html("Refresh");
          testAnim("bt_clear","flipInX");


          return false;

          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");
                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });
          
          
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

          // BEEEEEEEEEEETS
          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");
                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });

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
      <?  if($this->agent->is_mobile()){ ?>
        $("#valor_place").focus(function(){
          $("#footer_bet").attr("style","margin-bottom:1em;");
          $("#footer_bet").attr("style","height:30%;");
        });
        $("#valor_place").blur(function(){
          $("#footer_bet").attr("style","margin-bottom:0em;");
          $("#footer_bet").attr("style","height:20%;");
        });
      <? } ?>
    // configura campos
    $("#valor_place,#odd_place").keyup(function() {
              
              //alert( "Handler for .keydown() called." );
              var id_select = $("#selection_id_bet").val();
              var tipo = $("#lado_bet").val();
              var odd = $("#odd_place").val();
              odd = parseFloat(odd);
              var aposta_valor = $("#valor_place").val();
              var lucro_calc =  aposta_valor * odd;
              //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
              var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
              //var lucro_float = lucro.replace(".","");
                //lucro_float = lucro_float.replace(",",".");
              //lucro_float =  parseFloat(lucro_float);
              //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
              var lucro_str = parseFloat(lucro);
              $("#calc").html("Lucro: "+lucro_str);
              $("#sel_balanco_"+id_select).html(parseFloat(lucro));
              //$("#bt_place").attr("value","Apostar: "+lucro_str);
              // percentual
              var soma_t = lucro - aposta_valor;
              //var soma_total_lay = mysql_fetch_assoc($soma_lay);
              var pecentual_ganho = (lucro * 100) / soma_t;
              //$("#lucro_percentual").html(lucro+" "+aposta_valor+" ("+soma_t+")="+pecentual_ganho);
              var soma_t_t = Math.round(soma_t*Math.pow(10,2))/Math.pow(10,2);
              //$("#lucro_percentual").html(parseFloat(soma_t_t));
              var lucro_percentual = parseFloat(soma_t_t);
              //alert(lucro_percentual);
              $("#lay_responsabilidade").html(lucro_percentual+aposta_valor);
              
              if(tipo == "BACK"){
                $("#lucro_percentual").html("Lucro: "+lucro_percentual);
              }
              
              if(tipo == "LAY"){
              $("#lucro_percentual").html("Responsabilidade: "+lucro_percentual);
              }
              
              
            });
    // PLACEBET
    String.prototype.stripHTML = function() {return this.replace(/<.*?>/g, '');}
    $("#bt_place").click(function(){
              <? if(!$this->session->userdata('id')){ ?>
                alert("Faça o Login para efetuar a aposta.");
                return false;
                <? } ?>
              
              var len = $("#valor_place").val();
              var id_mkt = $("#id_mkt_bet").val();
              var id_selection = $("#selection_id_bet").val();
              var tipo = $("#lado_bet").val();
              var size = $("#odd_place").val();
              var valor = $("#valor_place").val();
              /*
              if(len < 2){
                alert("Insira um valor válido");
                $("#valor_place").focus();
                //return false;
              }
              */
              var tit_sel = $("#nm_selection").html();
              var tit_sem_tags = tit_sel.stripHTML();
              var side_tipo = tipo;
               if (confirm('Você confirma sua aposta '+side_tipo+'  no '+tit_sem_tags+' na odd '+size+'?')) {
                $("#bt_place").text('Aguarde...');
                $("#result_place").show();
                $("#result_place").append('<img src="https://tradersize.com/assets2/images/svg-loaders/three-dots.svg" alt="" width="60">');
                $("#result_place").val('aguarde');

                $("#bt_place").attr("disabled","disabled");
              }else{
                return false;
              }
              
              
              //alert("foi");
              
              //alert(tipo);
              
              //alert(parseFloat(size)+" "+parseFloat(valor));
              $.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){
                
                //$("#bt_place").hide();
                $("#bt_place").attr("disabled",false);
                $("#bt_place").text('Apostar');
                $("#result_place").html("");
                //$("#result_place").html(data);
                $(".box_place").hide();
                $("#bt_ok").show();
                $("#result_place").html("Aposta Realizada! - BET ID: "+data);

                $("#bt_ok").click(function(){
                  $("#result_place").html("");
                  $("#result_place").hide();
                  $("#valor_place").val("");
                  $("#id_mkt_bet").val("");
                  $("#selection_id_bet").val("");
                  $("#lado_bet").val("");
                  $("#odd_place").val("");
                  $("#valor_place").val("");
                  $("#calc").html("");
                  $(".box_place").show();
                  $("#footer_bet").hide();
                  $("#bt_ok").hide();

                  if(data.length > 3){
                  	$("#bets_refresh").click();
                  	
                  }


                })

                
                // fecha janela modal
                /*
                $(".badge_new_bet").addClass('bg-yellow');
                $(".bt_apostas").show();
                
                $('#basic-dialog').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                                $(this).removeClass();
                                $("#status_place").val('');
                            });
                */
                //$("#basic-dialog").dialog("close");
                
                //open('right');
                
                
                // abre apostas
                //$('html').addClass('sb-active sb-active-right'); // Add active classes.
                //$(".sb-right").addClass('sb-active');
                //animate($right, '-' + $right.css('width'), 'right'); // Animation
                /*
                setTimeout(function() {
                  rightActive = true;
                  if (typeof callback === 'function') callback(); // Run callback function.
                }, 400); // Set active variables.
                */
                //alert("Opa 22");
              })
              //return false;
            })





    // calcula descida das odds por minutos
    $("#bt_calc_cdom").click(function(){
      var odd_calc = $("#odd_place").val();
      var odd_t = parseFloat(odd_calc);
      
      
      var tempo_jogo = parseFloat($("#tempo_jogo").val());
      var tempo_restante = 90 - tempo_jogo;
      var odd_trat_decimal = odd_t.toFixed(2);
      var odd_trat_decimal = odd_trat_decimal.replace(".", "");
      
     
      if(odd_trat_decimal > 100){
        var odd_trat_cem =  odd_trat_decimal - 100;
      }else{

      }
      
      var cdom = odd_trat_cem / tempo_restante ;// C alculo D escida O dds Minuto
      $("#odds_by_min").val(cdom);

      //alert(tempo_jogo+" "+tempo_restante+" odd: "+odd_trat_decimal+" -100 = "+odd_trat_cem+" CDOM = "+cdom );
      //return false;
    })
      
    

  }) // x ready

  </script>


  <!-- JS MODAL -->
    <? if($this->session->userdata('id')){ ?>
    <script type="text/javascript">

      $(document).ready(function(){


        <? if($this->session->userdata('id')){ ?>
         //auto();
         $("#bt_auto").click();
       <? } ?>








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




  <style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .box_place{
      padding-top: 0.5em
    }
    .col-sm{
      padding-left: 0px;
      padding-right:0px;
    }
    #odd_place , #valor_place{
      border: #ffb80c 1px solid;
      height: 2em;
      width: 5em;
      padding: 0.5em;
      
    }
    .nm_selection{
      font-size: 0.6em;
      padding-left: 0.5em
    }
   <? }else{ ?> 
    .box_place{
      padding-top: 1em
    }

    #odd_place , #valor_place{
      border: #ffb80c 1px solid;
      height: 90%;
      width: 90%;
      padding: 0.5em;
    }

    .bt_back{
      text-align:left;
      cursor:pointer;
      background-color: #dbefff;
      
    }
    .bt_back:hover{
    	background-color:#75c2fd;
    }
    .bt_lay{
      text-align:left;
      cursor:pointer;
      background-color: #fee9ee;
      
    }
    .bt_lay:hover{
    	background-color:lightpink;
    }


   <? } ?>
   .col-sm{
      border:red 0px solid;
    }
    

    /* INPUTS DE ENTRADA SIZE */
    .ipt_size {
      display: none ; 
      border: silver 0px solid;
      font-size: 11px;
      margin-bottom: 2px; 
      color: #333;
      background-color: none;
      background: transparent;
      width: 100%;

    }
    .total_size{
      display: none ;
      border: #000 0px solid;
      border-top: #000 1px solid;
      font-size: 11px;
      font-weight: bold;
      background: transparent;
      width: 100%;

    }
  </style>
  <footer class="footer navbar-fixed-bottom bounceInUp animated" id="footer_bet" style="display:none "> 
    <input type="hidden"  id="selection_id_bet" />
    <input type="hidden"  id="id_mkt_bet" />
    <input type="hidden"  id="lado_bet" />
    
    
    

    <div class="container box_place">

      <div class="row" style="">
        <div class="col-sm">
          <input type="number" step="0.01" id="odd_place" />
        </div>
        <div class="col-sm">
          <input type="number" step="0.01" id="valor_place" placeholder=" valor " />
        </div>
        <div class="col-sm">
          <button id="bt_place"  class="btn btn-success">Apostar</button>
        </div>
      </div>

        <div class="row">
            <div class="col-sm">
              <label id="nm_selection"></label>
            </div>
        
          

          <div class="col-sm">
            <div id="calc" style="color: green;font-weight: bold;font-size: 1em"></div>
            <label id="lucro"></label>

             <? /* if($this->session->userdata('id') ){ ?>
                <input type="number"  id="tempo_jogo" placeholder="Tempo Jogo" title="Tempo de Jogo (Ex: 75 - de 0 à 90)" style="width: 100px">
                <input type="number" step="0.0001" id="odds_by_min" style="width: 100px" title="Cálculo da Descida das Odds por Minuto">
                <button type="button" id="bt_calc_cdom" class="btn" style="width: 100px;border:#fff 2px solid" title="Cálculo de Descida das Odds por Minuto">CDOM</button>
             <? } */ ?>


          </div>

          <div class="col-sm"  style="margin-top: 0.5em">
            <a id="cancel_bet" style="cursor: pointer;color:red;margin-top: 0.5em" >Cancelar</a>
          </div>
        </div>


      </div>

      <p align="center">

	
        <div class="alert alert-success" id="result_place" style="text-align: center;border:red 0px solid;display: none" align="center" >

        	

        
          
        </div>
        <button  id="bt_ok" class="btn btn-success  btn-lg btn-block" style="display: none;t;">OK</button>
    </p>



  </div>
    
  </footer>
<?
if($this->agent->is_mobile()){
  $width_pizza = "300px";
}else{
  $width_pizza = "500px";
}
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  /*
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Valores Correspondidos'],
      <? 
        foreach ($qr_sels->result() as $sel) { 

          $qr_sum = $this->db->query("SELECT SUM(tamanho) as soma  FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_name = '".$sel->selection_name."' AND tipo = 'lay' ");
          $soma = (int) $qr_sum->row()->soma;
      ?>

          ["<?=$sel->selection_name?>",     <?=$soma?> ],
      <? } ?>
      
      ['last',    0]
    ]);

    var options = {
      title: 'Dinheiro correspondido no Mercado',
      is3D: true,
      width: 400,
      height: 400,

    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  } */
</script>
<script type="text/javascript">
  /*
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Element", "Valor", { role: "style" } ],
          <? 
              foreach ($qr_sels->result() as $sel) { 

                $qr_sum = $this->db->query("SELECT SUM(tamanho) as soma  FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_name = '".$sel->selection_name."' AND tipo = 'lay' ");
                $soma = (int) $qr_sum->row()->soma;
            ?>
          ["<?=$sel->selection_name?>", <?=$soma?>, "#0062cc"],
          <? } ?>
          //['0', 0, 'stroke-color: blue; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                         { calc: "stringify",
                           sourceColumn: 1,
                           type: "string",
                           role: "annotation" },
                         2]);

        var options = {
          title: "BACK",
          width: 400,
          height: 200,
          bar: {groupWidth: "10%"},
          legend: { position: "right" },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }*/
    </script>

  </body>
</html>