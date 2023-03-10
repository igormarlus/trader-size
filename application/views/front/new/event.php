<!DOCTYPE html>
<!-- lang="en-US" -->
<? if($this->uri->segment(1) == 'futebol' || $this->uri->segment(1) == 'futbol'  ){ ?>
<html dir="ltr" lang="pt-BR" itemscope 
	itemtype="http://schema.org/Article" >
<? } ?>

<? if($this->uri->segment(1) == 'bets'){ ?>
<html dir="ltr" lang="en-GB" itemscope 
	itemtype="http://schema.org/Article" >
<? } ?>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Trader Size" />
	<meta name="autor" content="Trader Size" />

	<meta property="og:url" content="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$id_evento?>">
    <meta property="og:title" content="Intercâmbio Esportivo Online Futebol jogo: <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?>.">
	
    <meta property="og:site_name" content="Trader Size - Intercâmbio Esportivo Bets <?=$dd->evento?>">
    <meta property="og:image" content="http://www.tradersize.com/logo/logo-face.png">
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
	<title><?=str_replace(" v "," x ",$dd->evento)?> Resultado do Jogo  <?=$champ->row()->nome?>  Intercâmbio Esportivo Bets </title>
		<meta name="title" content="<?=$dd->evento?> Resultado do Jogo  <?=$champ->row()->nome?>  Intercâmbio Esportivo Bets" />
    	<meta name="description" content="Intercâmbio Esportivo Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as Intercâmbio Esportivo - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />
		<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Intercâmbio Online,Intercâmbio Esportivos,Intercâmbio Futebol,<?=$dd_evento?>">

	
	<? }else{ ?>
		<title><?=$titulo?></title>
    	<meta name="title" content="<?=$titulo?>" />
    	<meta name="description" content="Intercâmbio Esportivo Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as Intercâmbio Esportivo - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />

		<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Intercâmbio Esportivo Online,Intercâmbio Esportivo Esportivas,Intercâmbio Esportivo Futebol,<?=$dd_evento?>">
	<? } ?>
	<!-- Stylesheets
	============================================= -->
	
	<!-- <link rel="shortcut icon" href="http://tradersize.com/imagens/favicon.ico"> -->
	 <link rel="shortcut icon" href="<?=base_url()?>assets2/images/icons/favicon.png">
	 <script type="text/javascript" src="<?=base_url()?>js-front/jquery.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-6816270130378142", enable_page_level_ads: true }); </script>


<!-- ANUNCIOS GRAFICOS E TEXTOS BASICOS 
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Graficos e Textos Basicos 
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6816270130378142"
     data-ad-slot="2409353379"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
-->

<!-- PARA ARTIGO  
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-6816270130378142"
     data-ad-slot="6189295210"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
-->
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

<meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
<meta itemscope itemprop="name" rel="name"  content="<?=url_title($dd->evento)?>" />
<meta itemprop="name" content="Trader Esportivo">
<meta itemprop="logo" content="<?=base_url()?>logo/logo.png">
<meta itemscope itemprop="publisher" rel="publisher"  content="<?=$dd->dt?>" />

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="<?=base_url()?>css-front/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?=base_url()?>css-front/responsive.css" type="text/css" />
</head>
<script type="text/javascript">
	if('serviceWorker' in navigator) {
	  navigator.serviceWorker.register('<?=base_url()?>ts.js').then(function() {
	    console.log("Service Worker registered successfully");
	  }).catch(function() {
	    console.log("Service worker registration failed")
	  });
	}
</script>
<body >

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
			"Name":"<?=$dd->evento?>",
			"description": " Intercâmbio Esportivo Bet (Matched) <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> Previsão do Jogo- <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?>",
			//"startdate":"2018-06-25T18:00:00",
			"startDate": "<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->inicio,10,10)?>",
			"endDate" : "<?=$this->padrao_model->fuso_dt($dd->inicio,0,'i')?> ",
			//"startDate": "<?=$start_data?>",
			//"endtDate": "<?=$start_data?>",
			"url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>"
		}
</script>
	<script type="application/ld+json">
	{
	  "@context":"http://schema.org",
	  "@type":"BroadcastEvent",
	  "name": "Intercâmbio Esportivo - Bets: <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> Previsão do Jogo",
	  "description": "Intercâmbio Esportivo Futebol Online  no jogo: <?=$dd->evento?> <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> ",
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
	      "description": "<?=$dd->evento?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - Trader: Intercâmbio Esportivo Futebol Online. Saiba onde estão as Intercâmbio Esportivo."
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
  "name": "Trader Size - Software para Trader Esportivo. Intercâmbio Esportivo Futebol Online. Previsão dos Jogos",
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
	"headline":"<?=str_replace(" v "," x ",$dd->evento)?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?> - Intercâmbio Esportivo Futebol Online ",
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
			"logo" : "<?=base_url()?>logo/logo-face.png",
			"name":"Tradersize.com"
		},
		"keywords":["<?=$dd->evento?>","<?=$times['0']?>","<?=$times['1']?>","Intercâmbio Esportivo no Jogo <?=$dd->evento?>","<?=$dd->evento?>","<?=str_replace(" v "," x ",$dd->evento)?>","betfair","Intercâmbio Esportivo Online","Intercâmbio Esportivo Esportivas Online Futebol","Intercâmbio Esportivo Esportivas","Intercâmbio Esportivo Futebol","<?=$champ->row()->nome?>","Intercâmbio Esportivo Futebol","Pré-jogo","Live","Intercâmbio Esportivo em tempo real"]
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

		
			

			
				

				<div class="container">

					<header id="header">
						<div class="col-lg center" id="">
							<a href="<?=base_url()?><?=$this->uri->segment(1)?>" >
								<img id="logo" src="<?=base_url()?>logo/logo-face.png" alt="Logo Trader Size" >
							</a>
						</div>

						<? if(!$this->session->userdata('id')){ ?>
							
							<div class="btn-group">
						      <a class="btn btn-primary btn-large" href="#"><i class="icon-user icon-white"></i> Menu</a>
						      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						      <ul class="dropdown-menu">
						        <li><a href="<?=base_url()?><?=$this->uri->segment(1)?>"><i class="icon-pencil"></i> Jogos</a></li>
						        <li><a href="<?=base_url()?>futebol/filtro_odds"><i class="icon-trash"></i> Filtro de Odds</a></li>
						        <li><a href="<?=base_url()?>home/cadastro"><i class="icon-ban-circle"></i> Cadastro</a></li>
						        <li class="divider"></li>
						        <li><a href="<?=base_url()?>"><i class="i"></i> Login</a></li>
						      </ul>
						    </div>

						<? }else{ ?>
						    <div class="btn-group">
						      <a class="btn btn-primary btn-large" href="#"><i class="icon-user icon-white"></i> Minha Conta</a>
						      <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
						      <ul class="dropdown-menu">
						        <li><a href="<?=base_url()?>"><i class="icon-pencil"></i> Home</a></li>
						        <li class="divider"></li>
						        <li><a href="<?=base_url()?><?=$this->uri->segment(1)?>"><i class="i"></i> Jogos</a></li>
						      </ul>
						    </div>
					    <? } ?>



					</header>  
		<!--			
					<script language="javascript">
function setHomepage()
{
 if (document.all)
    {
        document.body.style.behavior='url(#default#homepage)';
  document.body.setHomePage('http://www.fasim.com.br');

    }
    else if (window.sidebar)
    {
    if(window.netscape)
    {
         try
   {  
            netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");  
         }  
         catch(e)  
         {  
    alert("Por padrão o Firefox vem com está opção bloqueada, retorne e escolha a opção permitir para tornar este site sua página incial.");  
         }
    } 
    var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
    prefs.setCharPref('browser.startup.homepage','https://tradersize.com/futebol');
 }
}
</script>
<div class="row">
			<a href="javascript:setHomepage()">Adicionar como página inicial</a>	    
		</div>
-->					
					
					<div class="row">
						<h1 itemprop="headline"> <? if($this->uri->segment(1) == 'futebol'){ ?><? }else{ ?> BETS: <? } ?> <?=str_replace(" v "," x ",$dd->evento)?></h1>
						<? if(strlen($champ->row()->nome) > 2 ){ ?>
						<h2><a href="<?=base_url()?>futebol/competition/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a></h2>
						<? } ?>

						<ol class="breadcrumb">
							
							<li>
								
								
								<? if($dd->inicio == "0000-00-00 00:00:00"){ ?>
									<?=$this->padrao_model->fuso_dt($dd->data_betfair,-7)?> 
								<? }else{ ?>
									<? #=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <? #=substr($dd->inicio,10,10)?> 
										<? 
										if($dd->country == "IT" || $dd->country == "EN" || $dd->country == "DE"){
											$fuso_diff = -3;
										} 
										?>
										<?=$this->padrao_model->fuso_dt($dd->inicio,-3,'i')?> 
										<? #=$this->padrao_model->fuso_dt($dd->data_betfair,9,'i')?> 
								<? } ?>
							</li>
							
							<li itemprop="">Previsão do Jogo</li>
						</ol>
						<h2 itemprop="keywords">Intercâmbio Esportivo Futebol Online</h2>
						<p class="display-1">
							<button type="button" class="btn btn-warning btn-large" id="bt_exptc"><i class="icon-star"></i> Análise Trader</button>
						</p>
						<div id="call_expc"></div>
					</div>
					<div class="row">


							<ul class="nav nav-tabs">
							  <li class="active"><a data-toggle="tab" href="#home">Match Odds</a></li>
							  <!--
							  <li><a data-toggle="tab" href="#menu1">Over/Under 2.5</a></li>
							  <li><a data-toggle="tab" href="#menu2">Correct Score</a></li>
							-->
							  <li><a class="dropdown-toggle" data-toggle="dropdown" href="#">Outros Mercados<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<?  
										if($this->session->userdata('id')){
										$m = 0; foreach ($mercados as $mercado) { $m++; ?>
											<li><a href="#open" class="get_mkt" title="<?=$mercado->marketId?>"><?=$mercado->marketName?> <label class="text-success"> $<?=number_format($mercado->totalMatched, 2, ',', '.')?></label></a></li>
										<? }  
										}else{ // x if
											?>
											<li><a href="<?=base_url()?>home/login">Login </a></li>
											<li><a href="<?=base_url()?>home/cadastro">Cadastre-se </a></li>

										<?	
										}
										?>
									</ul>
							  </li>
							</ul>

							<div class="tab-content">
							  <div id="home" class="tab-pane fade in active">
							    <h3>Match Odds</h3>
							    <p>
							    	<button id="id_mkt_mo" value="" class="btn btn-primary bt_refresh" data-idevento="<?=$dd->id_evento?>" data-idmkt="">Ver Mercado</button>

							    </p>
							    
							    <div class="open_aqui"></div>
							  </div>
							  <div id="menu1" class="tab-pane fade">
							    <h3>Menu 1</h3>
							    <p>Some content in menu 1.</p>
							  </div>
							  <div id="menu2" class="tab-pane fade">
							    <h3>Menu 2</h3>
							    <p>Some content in menu 2.</p>
							  </div>
							</div>


					</div>

					
				 
				</div> <!-- X CONTEINER  -->
				<div class="contanier-fluid" style="background-color: #444;color: #fff;padding: 20px">

					  <div class="col-6 col-sm-6">Trader Size - 2019 - Todos os Direitos Reservados</div>

					  <!-- Force as próximas colunas quebrarem, em uma nova linha -->
					  <div class="w-100"></div>

					  <div class="col-6 col-sm-6">
						<a href="http://tradersize.com/betfair/2018/05/22/como-usar-a-betfair-tradersize/" style="color: #fff">Como usar</a> | 
						<a href="http://tradersize.com/betfair/sobre-o-trader-size/" style="color:#fff">Sobre</a> |
							<a href="<?=base_url()?>futebol" class=""  style="color:#fff">
								Próximos Jogos
							</a> |  
					
							<a href="https://www.facebook.com/tradersize/" class=""  style="color:#fff">
								Facebook
							</a> |
							<!--
							<a target="_blank" href="https://tradersize.com/feeds/partidas.php" class="social-icon si-small si-borderless si-rss">
								<i class="icon-rss"></i>
								<i class="icon-rss"></i>
							</a>
						-->
							<a href="https://tradersize.com/feeds/jogos" class="social-icon si-small si-borderless si-rss"  style="color:#fff">
								Feeds
							</a>
						
					  </div>

					</div>

				

<!--					
					<a href="#" class="button button-desc button-3d button-rounded button-green center">Expectativa dos Mercados<span>Identifica se o jogo é OVER, UNDER, Favorito e Resultado Correto</span></a>
-->


	<!-- External JavaScripts
	============================================= -->
	

	<script type="text/javascript">
	$(document).ready(function(){

		// get id MO
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
					
				})

		})

		$(".bt_refresh").click(function(){
				
				var id_mkt = $(this).attr('data-idmkt');
				var id_evento = $(this).attr('data-idevento');
				//alert(id_mkt);
				//return false;
				var str = id_mkt;
				var res = str.replace(".", "");
				var mkt_trat = res;
				$("#mkt"+mkt_trat).html("<p>Loading...</p>");
				$("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
				$.get("<?=base_url()?>bets/get_percentual_selecions_light/"+id_evento+"/"+id_mkt , function(data){
					//alert(data);
					//$.getScript( "<?=base_url()?>js-front/plugins.js");
					$("#mkt"+mkt_trat).html(data);
					
				})

				//$("#mkt"+mkt_trat).html(" kkkk ");
				//alert("Opa 7"+mkt_trat+" - "+id_evento);
		
		}) // x bt_refresh


		$("#bt_exptc").click(function(){
			//alert("OK");
			$("#call_expc").html("Aguarde...");
			$.get("<?=base_url()?>bets/expectativ/<?=$id_evento?>" , function(data){
				$("#call_expc").html(data);
			})
		})	// x bt_expct
	}) // x ready

	</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103260353-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>