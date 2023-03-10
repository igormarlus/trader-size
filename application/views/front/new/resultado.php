<!DOCTYPE html>
<!-- lang="en-US" -->
<? if($this->uri->segment(1) == 'futebol'){ ?>
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

	<meta property="og:url" content="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$id_evento?>">
    <meta property="og:title" content="Apostas Online Futebol jogo: <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> - <?=$champ->row()->nome?>.">
	
    <meta property="og:site_name" content="Trader Size - Apostas Bets <?=$dd->evento?>">
    <meta property="og:image" content="http://www.tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="https://tradersize.com/logo/logo-face.png">
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="<?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> | Saiba onde está o Dinheiro!">
    
    
    
	<meta charset="UTF-8">
	<? if(count($mercados) == 0){ ?>
	<title> Resultado <?=str_replace(" v "," x ",$dd->evento)?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Bets </title>
		<meta name="title" content=" Resultado <?=$dd->evento?> Resultado do Jogo  <?=$champ->row()->nome?>  Apostas Bets" />
    	<meta name="description" content="Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> | Saiba onde estão as apostas - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />
		<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online,Apostas Esportivas,Apostas Futebol,<?=$dd_evento?>">

	
	<? }else{ ?>
		<title><?=str_replace(" v "," x ",$dd->evento)?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=$champ->row()->nome?> Previsão do Jogo |   Apostas - Bets</title>
    	<meta name="title" content="<?=$dd->evento?> | <?=substr($dd->inicio,0,10)?> <?=$champ->row()->nome?> Previsão do Jogo Apostas Bets" />
    	<meta name="description" content="Apostas Online Futebol no Jogo <?=str_replace(" v "," x ",$dd->evento)?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> | Saiba onde estão as apostas - Bets no jogo: <?=str_replace(" v "," x ",$dd->evento)?> "  />

		<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, Apostas Online,Apostas Esportivas,Apostas Futebol,<?=$dd_evento?>">
	<? } ?>
	<!-- Stylesheets
	============================================= -->
	
	 <link rel="shortcut icon" href="http://tradersize.com/imagens/favicon.ico">
	<link rel="stylesheet" href="<?=base_url()?>css-front/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/dark.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url()?>css-front/font-icons.css" type="text/css" /> 
	<link rel="stylesheet" href="<?=base_url()?>css-front/animate.css" type="text/css" />
	<!--<link rel="stylesheet" href="<?=base_url()?>css-front/calendar.css" type="text/css" /> -->

	<link rel="stylesheet" href="<?=base_url()?>css-front/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="https://tradersize.com/feeds/partidas.php" />
	<!--  OUTRAS LINGUAGENS -->
	<link rel="canonical" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
	<meta property="og:url" content="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
	
	<link rel="alternate" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="pt-PT">
	<link rel="alternate" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="pt-BR">
	<link rel="alternate" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en">
	<link rel="alternate" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="es-ES">
	<link rel="alternate" href="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="es">
	<link rel="alternate" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en-GB">
	<link rel="alternate" href="" hreflang="es-PE">
	<link rel="alternate" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" hreflang="en-KE">
	
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K3KFW8V');</script>
<!-- End Google Tag Manager -->   


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6816270130378142",
    enable_page_level_ads: true
  });
</script>

<style>
.chart-samples ul { list-style: none; }

.chart-samples h4 {
	text-transform: uppercase;
	margin-bottom: 20px;
	font-weight: 400;
}

.chart-samples li {
	font-size: 16px;
	line-height: 2.2;
	font-weight: 600;
}

.chart-samples li a:not(:hover) { color: #AAA; }
</style>
</head>

<body class="stretched">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KFW8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
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
						"@id":"<?=base_url()?>futebol/competition/<?=url_title($champ->row()->nome)?>/<?=$champ->row()->id_competition?>","name":"Próximos Jogos <?=$champ->row()->nome?> "}
					},
			{
				"@type":"ListItem","position":3,
					"item":
					{"@id":"<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>","name":"<?=$dd->evento?>"}}]}
	</script>

	<script type="application/ld+json" jsonldtype="SportEvent">
		{
			"@context":"http://schema.org","@type":"SportsEvent",
		"awayteam":[{
			"@type":"SportsTeam",
			"name":"<?=$times['1']?>",
			"sport":"Futebol"
		}],
		"hometeam":[{
			"@type":"SportsTeam",
			"name":"<?=$times['0']?>",
			"sport":"Futebol"
		}],
			"location":[
			{
				"@type":"Place",
				"address":[{
					"@type":"PostalAddress",
					"name":"Internacional"
				}],
				"name":"<?=$champ->row()->nome?>"
			}],
			"Name":"<?=$dd->evento?>",
			"description": " Apostas Bet (Matched) <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> Previsão do Jogo- <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?>",
			//"startdate":"2018-06-25T18:00:00",
			"startDate": "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
			"url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>"
		}
</script>
	<script type="application/ld+json">
	{
	  "@context":"http://schema.org",
	  "@type":"BroadcastEvent",
	  "name": "Apostas - Bets: <?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> Previsão do Jogo",
	  "description": "Apostas Online Futebol no jogo: <?=$dd->evento?> <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> ",
	  "isLiveBroadcast": "http://schema.org/True",
	  "videoFormat": "HD",
	  "startDate": "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
	  "endDate" : "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
	   "image": "https://tradersize.com/img/logo.jpg",
	   //"url": "https://tradersize.com",
	   "url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>",
	  "broadcastOfEvent": {
	    "@type": "SportsEvent",
	    "name": "<?=$dd->evento?> - <?=$champ->row()->nome?> ",
	    "description": "<?=str_replace(" v "," x ",$dd->evento)?> - <?=$champ->row()->nome?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> -  Saiba onde está o dinheiro",
	    //"availability": 10,
	    //"price" : 100,
	    "url" : "<?=base_url()?>bets/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
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

	    "startDate": "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
	    "endDate" : "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
	    "offers": {
		    "@type": "Offer",
		    "name" : "Trader Size - <?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> Saiba onde está o Dinheiro",
		    "availability": "http://schema.org/InStock",
		    "url": "https://tradersize.com",
		    "price": "100.00",
		    "priceCurrency": "USD",
		    "validFrom": "<?=date("Y-m-d H:m:s")?>"

		  },
	    "location": {
	      "@type": "City",
	      "name": "<?=$champ->row()->nome?>",
	      "address" : "Betfair",
	      "description": "<?=$dd->evento?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> - Trader: Apostas Online Futebol. Saiba onde estão as Apostas."
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
  "name": "Trader Size - Software para Trader Esportivo. Apostas Online Esportivas Futebol. Previsão dos Jogos",
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
		"@id":"<?=base_url()?>bets/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"
		},
	"headline":"<?=str_replace(" v "," x ",$dd->evento)?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> - <?=$champ->row()->nome?> - Apostas Online Futebol ",
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
			"logo": "https://tradersize.com/logo/logo-face.png",
			"name":"Tradersize.com"
		},
		"keywords":["<?=$dd->evento?>","<?=$times['0']?>","<?=$times['1']?>","Apostas no Jogo <?=$dd->evento?>","<?=$dd->evento?>","<?=str_replace(" v "," x ",$dd->evento)?>","betfair","Apostas Online","Apostas Esportivas Online Futebol","Apostas Esportivas","Apostas Futebol","<?=$champ->row()->nome?>","Apostas Futebol","Pré-jogo","Live","apostas em tempo real","Previsão do Jogo","Previsões de Jogos"]
		}   
	</script>

	<script type='application/ld+json'>{
		"@context":"http://schema.org",
		"@type":"WebSite",
		"@id":"#website",
		"url":"<?=base_url()?>bets/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>",
		"name":"Tradersize.com",
		"potentialAction":{"@type":"SearchAction",
		"target":"<?=base_url()?>futebol/q={search_term_string}","query-input":"required name=search_term_string"}}</script>
		<meta itemscope itemprop="mainEntityOfPage"  itemType="https://schema.org/WebPage" itemid="<?=base_url()?>futebol/jogo/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>"/>

		<meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
		<meta itemprop="name" content="Tradersize.com">
		<meta itemscope itemprop="publisher" rel="publisher"  content="<?=$dd->dt?>" />
			

			<section id="page-title" class="page-title-center">

				<div class="container clearfix">
					<h1 itemprop="headline"> <? if($this->uri->segment(1) == 'futebol'){ ?>Apostas: <? }else{ ?> BETS: <? } ?> <?=str_replace(" v "," x ",$dd->evento)?></h1>
					<span itemprop="keywords"><strong><?=$champ->row()->nome?></strong></span>
					<ol class="breadcrumb">
						
						<li><?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=substr($dd->inicio,10,10)?>
						
						</li>
						
						<li itemprop="keyword">Resultado do Jogo</li>
					</ol>
					<h2 itemprop="keywords">Estatísticas de Odds do Jogo</h2>

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
					<? if($mkts->num_rows() == 0){ ?>	
						<h4>Sem dados. </h4>
<p>
                		
                		<a href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"  class="button button-3d button-rounded button-orange"><i class="icon-tag"></i>Ver Mercados</a> 
                	</p>

						



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


					 <h3 ><span style="color: ">Mercados Mais Correspondidos:</span></h3>         
                	<p>
                		
                		<a href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"  class="button button-3d button-rounded button-orange"><i class="icon-tag"></i>Ver Mercados</a> 
                	</p>
                	<div class="box">
								<!-- SHARE FACE -->
							  <div class="fb-share-button" 
							    data-href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" 
							    data-layout="button_count" style="float: left;">
								  </div>

								<? #if($this->agent->is_mobile()){ ?>
								<!--  mobile -->
								<a href="whatsapp://send?text=<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>" target="_blank" class="wpusb-link wpusb-btn " title="Compartilhar via WhatsApp" rel="nofollow" data-whatsapp-wpusb="https://web.whatsapp.com/">
									   <img width="25px" src="https://cdn.icon-icons.com/icons2/840/PNG/512/Whatsapp_icon-icons.com_66931.png">
									   
									</a>
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
						foreach ($mkts->result() as $mercado) { 
						$m++;
						if($m > 0){
						$id_css = str_replace(".","", $mercado->id_mkt);
						#foreach ($this->bet_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5') as $mercado) { $m++;
						?>
							
                            <div class="entry clearfix">
                            
                            <?
                            $qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$mercado->id_mkt."' AND   tipo = 'back' AND selection_name <> '' "); 	
							foreach($qr_selecoes->result() as $sel){
								$qr_odds = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$mercado->id_mkt."' AND selection_id = ".$sel->selection_id." AND tipo = 'back' ORDER BY id asc ")or die(mysql_error()); 
								
								#$qr_selection_vol = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id asc ")or die(mysql_error()); 
							}

							?>
								
							<!--	
	                       	<h2><?=$mercado->id_mkt?></h2>
	                       	<h3><?=$qr_selecoes->num_rows()?> :: <?=$qr_odds->num_rows()?> </h3>
	                       -->

	                       	<div class="bottommargin divcenter" style="max-width: 750px; min-height: 350px;">
								<canvas id="chart-<?=$id_css?>"></canvas>
							</div>
						<? } ?>
                        </div>
                            
                        <? } // x foreacdh ?>
                        <div  itemtype="https://schema.org/Person">
							<p temtype="https://schema.org/Person" itemprop="name" itemscope>Trader Size</p>
							<p temtype="https://schema.org/Person" itemprop="author" itemscope>Trader Size</p>
						</div>
                
               
					
               </div>
               <? } ?>

					<p><a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a></p>

						</div>

					</div>

					<div class="col_two_fifth nobottommargin col_last">

						<div class="fancy-title title-border">
							<h4>Mais Jogos <?=$champ->row()->nome?></h4>
						</div>

						<div id="" class="bottommargin">
							<ul class="cat-list" itemscope itemtype="https://schema.org/WebPage">
								<? /*foreach($mais->result() as $jogo){ ?>
									<li><a href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>" itemprop="relatedLink"> <?=str_replace(" v "," x ",$jogo->evento)?></a></li>
		                        <? }*/ ?>
							</ul>
						</div>


						<div class="fancy-title title-border">
							<h4>Mais</h4>
						</div>
						<!--
						<div class="col_full  col-4 clearfix" data-lightbox="gallery">
							<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
						</div>-->
						<div class="col_full  col-4 clearfix" data-lightbox="">
							<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
						</div>

						<div class="fancy-title title-border">
							<h4>Video</h4>
						</div>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/6kBzDqzoFTo?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						

					
					<? include("includes/front-futebol/menu_competicoes.php"); ?>


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
	<script type="text/javascript" src="<?=base_url()?>js-front/functions.js"></script>

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
			})
		})

	</script>

	<!-- Charts JS
	============================================= -->
	<script type="text/javascript" src="<?=base_url()?>js-front/chart.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js-front/chart-utils.js"></script>

	<script type="text/javascript">
		var MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		var config = {
			type: 'line',
			data: {
				labels: ["0min", "15min", "30min", "45min", "60min", "70min", "90min"],
				datasets: [{
					label: "My First dataset",
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					],
					fill: false,
				}, {
					label: "My Second dataset",
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					],
				}]
			},
			options: {
				responsive: true,
				title:{
					display:true,
					text:'Line Chart'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		/////////////////////// DADOS DINAMICO
		var customTooltips = function (tooltip) {
			$(this._chart.canvas).css("cursor", "pointer");

			var positionY = this._chart.canvas.offsetTop;
			var positionX = this._chart.canvas.offsetLeft;

			$(".chartjs-tooltip").css({
				opacity: 0,
			});

			if (!tooltip || !tooltip.opacity) {
				return;
			}

			if (tooltip.dataPoints.length > 0) {
				tooltip.dataPoints.forEach(function (dataPoint) {
					var content = [dataPoint.xLabel, dataPoint.yLabel].join(": ");
					var $tooltip = $("#tooltip-" + dataPoint.datasetIndex);

					$tooltip.html(content);
					$tooltip.css({
						opacity: 1,
						top: positionY + dataPoint.y + "px",
						left: positionX + dataPoint.x + "px",
					});
				});
			}
		};
		<?
			$mm=0;
			foreach ($mkts->result() as $mercado) { 
				$qr_mercado = $this->padrao_model->get_by_matriz('id_mkt',$mercado->id_mkt,'mercados');
				if($qr_mercado->num_rows() > 0){
					$nm_mkt = $qr_mercado->row()->name;
				}else{
					$nm_mkt = "Indefinido";
				}
				$mm++;
				$id_css = str_replace(".","", $mercado->id_mkt);
			?>
		var config<?=$id_css?> = {
			type: 'line',
			data: {
				labels: ["0min", "15min", "30min", "45min", "60min", "70min", "90min"],
				datasets: [
				<?
				$qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$mercado->id_mkt."' AND   tipo = 'back' AND selection_name <> '' "); 	
				$sel_color = 0; 
				foreach($qr_selecoes->result() as $sel){ $sel_color++;
					$qr_odds = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$mercado->id_mkt."' AND selection_id = ".$sel->selection_id." AND tipo = 'back' AND odd < 400  ORDER BY dt_update asc ")or die(mysql_error()); 
					if($sel_color == 1){
						$cor = "green";
					}
					if($sel_color == 2){
						$cor = "blue";
					}
					if($sel_color == 3){
						$cor = "orange";
					}
					if($sel_color == 4){
						$cor = "black";
					}
					if($sel_color == 5){
						$cor = "yellow";
					}
					if($sel_color == 6){
						$cor = "purple";
					}
					if($sel_color == 7){
						$cor = "black";
					}
					if($sel_color == 8){
						$cor = "green";
					}
					if($sel_color == 9){
						$cor = "silver";
					}
					#$qr_selection_vol = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id asc ")or die(mysql_error()); 
				?>	
				{
					label: "<?=$sel->selection_name?>",
					backgroundColor: window.chartColors.<?=$cor?>,
					borderColor: window.chartColors.<?=$cor?>,
					data: [
					<? foreach($qr_odds->result() as $odd){ ?>
						<?=$odd->odd?>,
					<? } ?>

					],
					fill: false,
				},
				<? } ?> 
				]
			},
			options: {
				responsive: true,
				title:{
					display:true,
					text:'<?=$nm_mkt?>'
				},
				tooltips: {
					//mode: 'index',
					//intersect: true,
					enabled: true,
					mode: 'index',
					intersect: false,
					custom: customTooltips
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Time'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Odds'
						}
					}]
				}
			}
		};
		<? } // x foreach ?>

		window.onload = function() {
			//alert(randomScalingFactor());
			<?
			$m=0;
			foreach ($mkts->result() as $mercado) { 
				$m++;
				$id_css = str_replace(".","", $mercado->id_mkt);
			?>
				var ctx<?=$id_css?> = document.getElementById("chart-<?=$id_css?>").getContext("2d");
				window.myLine = new Chart(ctx<?=$id_css?>, config<?=$id_css?>);
			<? } ?>
			
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});

			});

			window.myLine.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var colorName = colorNames[config.data.datasets.length % colorNames.length];
			var newColor = window.chartColors[colorName];
			var newDataset = {
				label: 'Dataset ' + config.data.datasets.length,
				backgroundColor: newColor,
				borderColor: newColor,
				data: [],
				fill: false
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());
			}

			config.data.datasets.push(newDataset);
			window.myLine.update();
		});

		document.getElementById('addData').addEventListener('click', function() {
			if (config.data.datasets.length > 0) {
				var month = MONTHS[config.data.labels.length % MONTHS.length];
				config.data.labels.push(month);

				config.data.datasets.forEach(function(dataset) {
					dataset.data.push(randomScalingFactor());
				});

				window.myLine.update();
			}
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myLine.update();
		});

		document.getElementById('removeData').addEventListener('click', function() {
			config.data.labels.splice(-1, 1); // remove the label first

			config.data.datasets.forEach(function(dataset, datasetIndex) {
				dataset.data.pop();
			});

			window.myLine.update();
		});

	</script>

</body>
</html>