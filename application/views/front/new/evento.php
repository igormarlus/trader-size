<!DOCTYPE html>
<!--<html dir="ltr" lang="pt-BR" itemscope 
	itemtype="http://schema.org/Article" > -->
<!-- lang="en-US" -->
<? if($this->uri->segment(1) == 'futebol' || $this->uri->segment(1) == 'futbol'  ){ ?>
<html dir="ltr" lang="pt-BR">
<? } ?>

<? if($this->uri->segment(1) == 'bets'){ ?>
<html dir="ltr" lang="en-GB">
<? } ?>

<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Trader Size" />
	<meta name="autor" content="Trader Size" />

	<meta property="og:url" content="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$id_evento?>">
    <meta property="og:title" content="Apostas Esportiva Online Futebol jogo: <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?>.">
	
    <meta property="og:site_name" content="Trader Size - Apostas Esportiva Bets <?=$dd->evento?>">
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
	<title><?=str_replace(" v "," x ",$dd->evento)?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Esportiva Bets </title>
		<meta name="title" content="<?=$dd->evento?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Esportiva Bets" />
    	<meta name="description" content="Apostas Esportiva Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as Apostas Esportiva - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />
		<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online,Apostas Esportivas,Apostas Futebol,<?=$dd_evento?>">

	
	<? }else{ ?>
		<title><?=$titulo?></title>
    	<meta name="title" content="<?=$titulo?>" />
    	<meta name="description" content="Apostas Esportiva Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> | Saiba onde estão as Apostas Esportiva - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />

		<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Esportiva Online,Apostas Esportiva Esportivas,Apostas Esportiva Futebol,<?=$dd_evento?>">
	<? } ?>
	<!-- Stylesheets
	============================================= -->
	
	<!-- <link rel="shortcut icon" href="http://tradersize.com/imagens/favicon.ico"> -->
	 <link rel="shortcut icon" href="<?=base_url()?>assets2/images/icons/favicon.png">
	<link rel="stylesheet" href="<?=base_url()?>css-front/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/style.css" type="text/css" />
	
	<!--<link rel="stylesheet" href="<?=base_url()?>css-front/dark.css" type="text/css" />-->

	<link rel="stylesheet" href="<?=base_url()?>css-front/font-icons.css" type="text/css" /> 

	<link rel="stylesheet" href="<?=base_url()?>css-front/animate.css" type="text/css" />
	<!--<link rel="stylesheet" href="<?=base_url()?>css-front/calendar.css" type="text/css" /> -->

	<link rel="stylesheet" href="<?=base_url()?>css-front/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="https://tradersize.com/feeds/jogos" />
	<!--  OUTRAS LINGUAGENS -->
	<link rel="canonical" href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
	<meta property="og:url" content="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
	
	<link rel="alternate" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="pt-PT">
	<link rel="alternate" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en-GB">
<!--
	<link rel="alternate" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="pt-BR">

	<link rel="alternate" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en">
	<link rel="alternate" href="<?=base_url()?>futbol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="es-ES">
	<link rel="alternate" href="<?=base_url()?>futbol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="es">
	
	<link rel="alternate" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en-KE">
	
	-->
<!--
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6816270130378142",
    enable_page_level_ads: true
  });
</script>
-->
<!--
<script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
</script>
-->

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

<!--
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-6816270130378142", enable_page_level_ads: true }); </script>
</head>
-->
<!--
<script type="text/javascript">
	if('serviceWorker' in navigator) {
	  navigator.serviceWorker.register('<?=base_url()?>ts.js').then(function() {
	    console.log("Service Worker registered successfully");
	  }).catch(function() {
	    console.log("Service worker registration failed")
	  });
	}
</script>
-->

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> <script> (adsbygoogle = window.adsbygoogle || []).push({ google_ad_client: "ca-pub-6816270130378142", enable_page_level_ads: true }); </script>

<body class="stretched">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KFW8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!--
<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script> -->
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<? include("includes/front-futebol/header.php"); ?>

		
		<!-- Content
		============================================= -->
		<section id="content">
		
		<?
		$times = explode(' v ',$dd->evento); 
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
			"description": " Apostas Esportiva Bet (Matched) <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> Previsão do Jogo- <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?>",
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
	  "name": "Apostas Esportiva - Bets: <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> - <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> Previsão do Jogo",
	  "description": "Apostas Esportiva Futebol Online  no jogo: <?=$dd->evento?> <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> ",
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
	      "description": "<?=$dd->evento?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - Trader: Apostas Esportiva Futebol Online. Saiba onde estão as Apostas Esportiva."
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
  "name": "Trader Size - Software para Trader Esportivo. Apostas Esportiva Futebol Online. Previsão dos Jogos",
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
	"headline":"<?=str_replace(" v "," x ",$dd->evento)?> <?=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> - <?=$champ->row()->nome?> - Apostas Esportiva Futebol Online ",
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
		<meta itemprop="name" content="Trader Esportivo">
		<meta itemprop="logo" content="<?=base_url()?>logo/logo.png">
		<meta itemscope itemprop="publisher" rel="publisher"  content="<?=$dd->dt?>" />
			

			<section id="page-title" class="page-title-center">

				<div class="container clearfix">
					<h1 itemprop="headline"> <? if($this->uri->segment(1) == 'futebol'){ ?>Apostas: <? }else{ ?> BETS: <? } ?> <?=str_replace(" v "," x ",$dd->evento)?></h1>
					<? if(strlen($champ->row()->nome) > 2 ){ ?>
					<a href="<?=base_url()?>futebol/competition/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>" itemprop="keywords"><strong><?=$champ->row()->nome?></strong></a>
					<? } ?>
					<ol class="breadcrumb">
						
						<li>
							
							
							<? if($dd->inicio == "0000-00-00 00:00:00"){ ?>
							
							<? #=$this->padrao_model->converte_data(substr($dd->data_betfair,0,10))?> <? #=substr($dd->data_betfair,10,10)?> *
							<?
								#$data_evento = substr($dd->data_betfair,0,10)." ".substr($dd->data_betfair,10,10);
								#echo $dada_evento;

							?>
							<?=$this->padrao_model->fuso_dt($dd->data_betfair,-7)?> 
							<? #=$this->padrao_model->fuso_dt($data_evento,-3,'i')?> 
			
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
						
						
							
							<? #=$dd->inicio?>
						
						</li>
						
						<li itemprop="">Previsão do Jogo</li>
					</ol>
					<h2 itemprop="keywords">Apostas Esportiva Futebol Online</h2>
<!--					
					<a href="#" class="button button-desc button-3d button-rounded button-green center">Expectativa dos Mercados<span>Identifica se o jogo é OVER, UNDER, Favorito e Resultado Correto</span></a>
-->

					<h3>Expectativa do Mercado</h3>
					<button id="bt_exptc"  class="button button-desc button-3d button-yellow button-rounded center" style="color:#000"><div>Análise Trader</div><span>Clique para Verificar</span></button>
					<div id="call_expc"></div>

				</div>

			</section>

			<div class="content-wrap">
				
				
				

			
				<div class="container clearfix">

					<div class="col_three_fifth bothsidebar nobottommargin">
					<!--
						<div class="fancy-title title-border">
							<h1 itemprop="headline"> Apostas/Bets <br /><?=str_replace(" v "," x ",$dd->evento)?></h1>
						</div>
					-->
						

						<!--
						<h2 itemprop="keywords">Apostas Online Futebol</h2>
							<h3 itemprop="datePublished" datetime="<?=date("Y-m-d")?>">  <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=substr($dd->inicio,10,10)?>
							
							</h3>
							
						<h4 itemprop="keywords"><strong><?=$champ->row()->nome?></strong></h4>
						-->
						<div id="posts" class="events small-thumbs" itemprop="articleBody">
						<!--
							<div class="entry clearfix">
								<div class="entry-image hidden-sm">
									<a href="#">
										<div class="entry-date">10<span>Apr</span></div>
									</a>
								</div>
								<div class="entry-c">
									<div class="entry-title">
										<h2><a href="#">Inventore voluptates velit totam ipsa tenetur</a></h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><span class="label label-warning">Private</span></li>
										<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Melbourne</a></li>
									</ul>
									<div class="entry-content">
										<a href="#" class="btn btn-default" disabled="disabled">Buy Tickets</a> <a href="#" class="btn btn-danger">Read More</a>
									</div>
								</div>
							</div>
						-->
					<? if(count($mercados) == 0){ ?>	
						<h4>Mercados Encerrados. </h4>


						<? if($this->session->userdata('id')){ ?>
								<? if($this->session->userdata('nivel') == '1'){ 
									####### HOME
									$home = $this->betfront_model->get_id_time($times['0']);
									if($home->num_rows() > 0){
										$id_home = $home->row()->id;
									}else{
										$dd_new_time = array("time" => $times['0']);
										$this->db->insert('times', $dd_new_time);
										$id_home = $this->db->insert_id();
									}

									####### VISITANTE
									$away = $this->betfront_model->get_id_time($times['1']);
									if($away->num_rows() > 0){
										$id_away = $away->row()->id;
									}else{
										$dd_new_time = array("time" => $times['1']);
										$this->db->insert('times', $dd_new_time);
										$id_away = $this->db->insert_id();
									}
									#echo ;
								?>
								<form action="<?=base_url()?>cron/set_result" method="post">
									<input type="hidden" name="id_partida" value="<?=$dd->id_evento?>">
									<table class="table">
										<tr>
											<td><? #=$dd_res->id_home?> <input type="text" name="id_home" value="<?=$id_home?>">  </td>
											<td><input type="number" value="" name="home_gols" placeholder="0" required=""></td>
											<td><input type="number" value="" name="away_gols" placeholder="0" required=""></td>
											<td><? #=$dd_res->id_away?> <input type="text" name="id_away" value="<?=$id_away?>"></td>
										</tr>
										<tr>
											<td colspan="3"><input type="submit" value="Salvar"></td>
										</tr>

									</table>
								</form>
								<? } ?>
							<? } ?>




						<? 
						$qr_resultado = $this->padrao_model->get_by_matriz('id_partida',$dd->id_evento,'resultados'); 
						if($qr_resultado->num_rows() > 0){
							$dd_res = $qr_resultado->row();
						?>
							<h2>Resultado: <?=str_replace(" v "," x ",$dd->evento)?> </h2>
							
							

							<div class="row clearfix bottommargin-lg common-height">
							<!--
								<div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: rgb(81, 88, 117); height: 326px;">
									<div>
										<!--<i class="i-plain i-xlarge divcenter icon-line2-directions"></i> 
										<div class="counter counter-lined"  style="font-size: 16px"></div>
										<h5>Home</h5>
									</div>
								</div>
							-->

								<div class="col-md-6 col-sm-6 dark center col-padding" style="background-color: rgb(87, 111, 158); height: 326px;">
									<div>
										<!--<i class="i-plain i-xlarge divcenter icon-line2-graph"></i>-->
										<div class="counter counter-lined"><span data-from="0" data-to="<?=$dd_res->home_gols?>" data-refresh-interval="100" data-speed="2500"><?=$dd_res->home_gols?></span></div>
										<h5><?=$this->padrao_model->get_by_id($dd_res->id_home,"times")->row()->time?></h5>
										<h6>HOME</h6>
										
									</div>
								</div>

								<div class="col-md-6 col-sm-6 dark center col-padding" style="background-color: rgb(102, 151, 185); height: 326px;">
									<div>
										<!--<i class="i-plain i-xlarge divcenter icon-line2-layers"></i> -->
										<div class="counter counter-lined"><span data-from="0" data-to="<?=$dd_res->away_gols?>" data-refresh-interval="25" data-speed="3500"><?=$dd_res->away_gols?></span></div>
										<h5> <? #=$dd_res->id_away?> <?=$this->padrao_model->get_by_id($dd_res->id_away,"times")->row()->time?></h5>
										<h6>Away</h6>
									</div>
								</div>
								<!--
								<div class="col-md-3 col-sm-6 dark center col-padding" style="background-color: rgb(136, 195, 216); height: 326px;">
									<div>
										<i class="i-plain i-xlarge divcenter icon-line2-directions"></i> 
										<div class="counter counter-lined" style="font-size: 14px"></div>
										<h5>Away</h5>
									</div>
								</div>-->

							</div>

						<? } ?>
					<? }else{ ?>


					 <h3 ><span style="color: ">Mercados Mais Correspondidos Exchange:</span></h3>         
                	
                	<p>
                		
                		<a href="<?=base_url()?>bets/resultado/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"  class="button button-3d button-rounded button-orange"><i class="icon-chart"></i>Gráficos de Odds</a> 
                	</p>
                	<div class="box">
								<!-- SHARE FACE 
							  <div class="fb-share-button" 
							    data-href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" 
							    data-layout="button_count" style="float: left;">
								  </div> -->

								<? #if($this->agent->is_mobile()){ ?>
								<!--  mobile 
								<a href="whatsapp://send?text=<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" target="_blank" class="wpusb-link wpusb-btn " title="Compartilhar via WhatsApp" rel="nofollow" data-whatsapp-wpusb="https://web.whatsapp.com/">
									   <img width="25px" src="https://cdn.icon-icons.com/icons2/840/PNG/512/Whatsapp_icon-icons.com_66931.png" alt="Enviar Via Whatsapp">
									   
									</a>
									<a href="https://whatsfacil.com/41906f" target="_blank">Chamar no Whatsapp</a>
								-->
								<? /* }else{ ?>	

								<!-- WEB -->	
								  <a href="https://web.whatsapp.com/send?text=<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" target="_blank" class="wpusb-link wpusb-btn " title="Compartilhar via WhatsApp" rel="nofollow" data-whatsapp-wpusb="https://web.whatsapp.com/">

									   <i class="wpusb-icon-whatsapp-square-plus "></i>
									   <img width="25px" src="https://cdn.icon-icons.com/icons2/840/PNG/512/Whatsapp_icon-icons.com_66931.png">
									   
									</a>
								<? } */ ?>
								

							</div>	
					
                    <div class="col12" >
						<? 
						$m = 0; 
						foreach ($mercados as $mercado) { 
						$m++;
						#foreach ($this->bet_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5') as $mercado) { $m++;
						?>
							
                            
                            <div class="entry clearfix">
                           
                            <?

                            $qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$mercado->marketId."' AND   tipo = 'back' AND selection_name <> '' "); 	
							#echo "<h2>".$qr_selecoes->num_rows()."</h2>";
							#if($qr_selecoes->num_rows() > 0){ ?>
							<!--
							<table class="pricing" style="width:100%;border:red 0px solid;">
                            <tbody><tr>
                                <th></th>
                                <th>back</th>
                                <th>Lay</th>
                            </tr>
                        -->

							<div class="entry-c">
									<div class="entry-title">
										<h2><a target="_blank" href="#">   <?=$mercado->marketName?></a></h2>
									</div>
									<ul class="entry-meta clearfix">
										
										<li><span class="label label-success">Aberto</span></li>
										<li><a href="#"><i class="icon-money"></i> $<?=number_format($mercado->totalMatched, 2, ',', '.')?></a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> <?=$m?>º</a></li>
									</ul>
									<div class="entry-content">
										<? if(!$this->session->userdata('id')){ ?>
											<button data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>" class="button button-3d button-rounded button-green bt_refresh"><i class="icon-refresh"></i>Refresh</button> 
											<!--<a href="<?=base_url()?>home/cadastro" class="btn btn-success">VIP</a> -->
											<a  href="<?=base_url()?>home/login" class="button button-3d button-rounded button-aqua"><i class="icon-user"></i>Login</a>
										<? }else{ ?>
											<button  class="button button-3d button-rounded button-green bt_refresh" data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>">
												<i class="icon-refresh"></i>Refresh </button> 


											<?
											$qr_sess_betfair = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
											if($qr_sess_betfair->vendor_cliente > 0){
											?>
												<a target="_blank" href="<?=base_url()?>bet/betjogo/<?=$dd->id_evento?>/<?=$mercado->marketId?>"  class="button button-3d button-rounded button-amber"><i class="icon-user"></i> Betfair </a>
											<? }else{ ?>
												<button type="button" disabled="disabled" title="Login Betfair" class="button button-3d button-rounded button-amber"><i class="icon-user"></i> Betfair </button>

											<? } ?>

											
											<!--
											<a href="<?=base_url()?>home/cadastro" class="btn btn-success">VIP</a>
											-->
										<? } ?>
									</div>
								</div>

                            <div class="entry-c" id="mkt<?=str_replace(".","",$mercado->marketId)?>">
								
								<? if($this->session->userdata('id')){ ?>
									<ul class="skills" >
										<?=$this->betfront_model->get_percentual_selecions($dd->id_evento,$mercado->marketId)?>
									</ul>
								<? }else{ ?>	
									<? if($mercado->marketName == "Match Odds" ){  ?>
										<ul class="skills" >
											<?=$this->betfront_model->get_percentual_selecions($dd->id_evento,$mercado->marketId)?>
										</ul>
									<? }else{ ?>
										
										<a href="<?=base_url()?>home/cadastro" class="button button-desc button-border button-rounded center">Seja VIP<span>Acesso a TODOS OS MERCADOS</span></a>
									<? }  ?>
								<? } ?>
                    			
							</div>
								
								
								
                       
							<? #}else{ // x if`num_rows ?>
                        	<!--	
                        		<div class="entry-c ">
									
									<a href="<?=base_url()?>home/cadastro" class="btn btn-info">Seja VIP</a>  
									<button data-idevento="<?=$dd->id_evento?>" data-idmkt="<?=$mercado->marketId?>" class="btn btn-info bt_refresh">Refresh  </button> 
									<a href="<?=base_url()?>home/login" class="btn btn-success">Login</a> 
								
								</div>
							-->


                            <? #} ?>
                        </div>
                            
                        <? } // x foreacdh ?>
                        <div  itemtype="https://schema.org/Person">
							<p temtype="https://schema.org/Person" itemprop="name" itemscope>Trader Size</p>
							<p temtype="https://schema.org/Person" itemprop="author" itemscope>Trader Size</p>
						</div>
                
               
					
               </div>
               <? } ?>
<!--
					<p><a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a></p>
                        -->

						</div>

					</div>

					<div class="col_two_fifth nobottommargin col_last">
						


						<!-- LOMADEE - BEGIN 
						<script src="//ad.lomadee.com/banners/script.js?sourceId=36037061&dimension=8&height=250&width=250&method=0" type="text/javascript" language="javascript"></script>
						<!-- LOMADEE - END -->
						<!-- FONTE: https://www.buscape.com.br/camisa-de-times-de-futebol -->
						<!--
							<a target="_blank" href="http://oferta.vc/v2/6564ec0bf">
									<h4>Camisa Azul da Seleção Brasileira</h4>
							</a>
							<a target="_blank" href="http://oferta.vc/v2/6564ec0bf">
								<img src="<?=base_url()?>imagens/produtos/camisa-selecao-brasileira-torcedor-copa-do-mundo-2018.jpg">
							</a>

						-->
						<a target="_blank" href="https://go.hotmart.com/U11947561G">
									<h4>Curso de  Trader Esportivo</h4>
							</a>
							<a target="_blank" href="https://go.hotmart.com/U11947561G">
								<img src="<?=base_url()?>imagens/curso-trading.png" alt="Curso Trader Esportivo">
							</a>

							<hr>
							
						<br>
						<div class="fancy-title title-border">
							<h4>Mais Jogos <?=$champ->row()->nome?></h4>
						</div>

						<div id="" class="bottommargin">
							<ul class="cat-list" itemscope itemtype="https://schema.org/WebPage">
								<? foreach($mais->result() as $jogo){ ?>
									<li><a href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>" itemprop="relatedLink"> <?=str_replace(" v "," x ",$jogo->evento)?></a></li>
		                        <? } ?>
							</ul>
						</div>


						<div class="fancy-title title-border">
							<h4>Mais</h4>
						</div>
						<amp-auto-ads type="adsense"
						              data-ad-client="ca-pub-6816270130378142">
						</amp-auto-ads>
						<!--
						<div class="col_full  col-4 clearfix" data-lightbox="gallery">
							<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
						</div>-->
						<!--
						<div class="col_full  col-4 clearfix" data-lightbox="">
							<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
						</div>
					-->
						<!--
						<div class="fancy-title title-border">
							<h4>Video</h4>
						</div>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/6kBzDqzoFTo?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						-->

					
					<? # include("includes/front-futebol/menu_competicoes.php"); ?>


					</div>

					<div class="clear"></div>

					


				</div>

				
			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<? include("includes/front-futebol/footer.php"); ?>

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url()?>js-front/jquery.js"></script>

	<script type="text/javascript" src="<?=base_url()?>js-front/plugins.js"></script> 
	<!--
	<script type="text/javascript" src="<?=base_url()?>js-front/jquery.calendario.js"></script>

	<script type="text/javascript" src="<?=base_url()?>js-front/events-data.js"></script>
	<!--
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
	<script type="text/javascript" src="js/jquery.gmap.js"></script>
-->

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url()?>js-front/functions-cp.js"></script>

	<script type="text/javascript">
		/*
		jQuery(document).ready( function($){
			var newDate = new Date(2016, 9, 31);
			$('#countdown-ex1').countdown({until: newDate});
		});

		var cal = $( '#calendar' ).calendario( {
			onDayClick : function( $el, $contentEl, dateProperties ) {

				for( var key in dateProperties ) {
					console.log( key + ' = ' + dateProperties[ key ] );
				}

			},
			caldata : canvasEvents
		} ),
		$month = $( '#calendar-month' ).html( cal.getMonthName() ),
		$year = $( '#calendar-year' ).html( cal.getYear() );

		$( '#calendar-next' ).on( 'click', function() {
			cal.gotoNextMonth( updateMonthYear );
		} );
		$( '#calendar-prev' ).on( 'click', function() {
			cal.gotoPreviousMonth( updateMonthYear );
		} );
		$( '#calendar-current' ).on( 'click', function() {
			cal.gotoNow( updateMonthYear );
		} );

		function updateMonthYear() {
			$month.html( cal.getMonthName() );
			$year.html( cal.getYear() );
		}

		$('#google-map4').gMap({
			 address: 'Australia',
			 maptype: 'ROADMAP',
			 zoom: 3,
			 markers: [
				{
					address: "Melbourne, Australia",
					html: "Melbourne, Australia"
				},
				{
					address: "Sydney, Australia",
					html: "Sydney, Australia"
				},
				{
					address: "Perth, Australia",
					html: "Perth, Australia"
				}
			 ],
			 doubleclickzoom: false,
			 controls: {
				 panControl: true,
				 zoomControl: true,
				 mapTypeControl: false,
				 scaleControl: false,
				 streetViewControl: false,
				 overviewMapControl: false
			 }
		});
		*/
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".bt_refresh").click(function(){
				
				var id_mkt = $(this).attr('data-idmkt');
				var id_evento = $(this).attr('data-idevento');

				var str = id_mkt;
				var res = str.replace(".", "");
				var mkt_trat = res;
				$("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
				$.get("<?=base_url()?>bets/get_percentual_selecions/"+id_evento+"/"+id_mkt , function(data){
					
					//alert(data);
					
					//$.getScript( "<?=base_url()?>js-front/plugins.js");
					
					$("#mkt"+mkt_trat).html(data);
					SEMICOLON.widget.progress();
					$(".skills-animated").css('background-color','#5bc0de');
					$(".skills-animated").css('color','black');
					//$(".skills-animated").css('text-align','right');
					$(".skills-animated").css('font-weight','bold');
					//SEMICOLON.widget.runRoundedSkills("#mkt"+mkt_trat,'50');
					// progress skills-animated
					//SEMICOLON.widget.runRoundedSkills(".progress",'50');

					
					
				})

				//$("#mkt"+mkt_trat).html(" kkkk ");
				//alert("Opa 7"+mkt_trat+" - "+id_evento);
		
		}) // x bt_refresh


		$("#bt_exptc").click(function(){
			//alert("OK");
			$("#call_expc").html("Aguarde...");
			$("#bt_exptc").removeClass('button-yellow');
			$("#bt_exptc").addClass('button-green');
			$.get("<?=base_url()?>bets/expectativ/<?=$id_evento?>" , function(data){
				$("#call_expc").html(data);
			})
		})	// x bt_expct
	}) // x ready

	</script>

</body>
</html>