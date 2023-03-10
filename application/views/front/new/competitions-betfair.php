<!DOCTYPE html>
<? if($this->uri->segment(1) == "bets"){ ?>
<html dir="ltr" lang="en-US">
<? } ?>
<? if($this->uri->segment(1) == "futebol"){ ?>
<html dir="ltr" lang="pt-BR">
<? } ?>
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Trader Size" />


    <title>Apostas Futebol <? if($competition->nome == ''){ ?><? $nm_url = $this->uri->segment(3); echo str_replace("-"," ",$nm_url); ?> <? }else{ ?><?=$competition->nome?><? } ?>  </title>
    <meta name="title" content="Apostas Futebol <? if($competition->nome == ''){ ?><? $nm_url = $this->uri->segment(3); echo str_replace("-"," ",$nm_url); ?> <? }else{ ?><?=$competition->nome?><? } ?>" />
    <meta name="description" content="Apostas Esportivas Online Futebol <?=$competition->nome?> 
    <?  foreach($jogos as $jogo_meta){ ?><?=str_replace(" v "," x ",$jogo_meta->event->name)?> | <? } ?>" 
    />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">


  
	<meta name="keywords" content="Betfair, trader, trader esportivo, Apostasd Online">

	<!-- Stylesheets
	============================================= -->
	 <link rel="shortcut icon" href="http://tradersize.com/imagens/favicon.ico">
	

	<link rel="stylesheet" href="<?=base_url()?>css-front/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/dark.css" type="text/css" />
	<!--<link rel="stylesheet" href="<?=base_url()?>css-front/calendar.css" type="text/css" /> -->

	<link rel="stylesheet" href="<?=base_url()?>css-front/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	

	<link rel="alternate" href="<?=base_url()?>futebol/competition/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>" hreflang="pt-BR">
	<link rel="alternate" href="<?=base_url()?>bets/competition/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>" hreflang="en-GB">
	<!-- Document Title
	============================================= -->
	
	<link rel="canonical" href="<?=base_url()?><?=$this->uri->segment(1)?>/competition/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>">


<!-- Google Tag Manager 
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
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<? include("includes/front-futebol/header.php"); ?>

		
		<script type='application/ld+json'>
	{
		"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[
		{
			"@type":"ListItem","position":1,
			"item":
			{"@id":"<?=base_url()?>futebol","name":"Trader Size - Jogos Hoje"}},


			{
				"@type":"ListItem","position":2,
					"item":{
						"@id":"<?=base_url()?>futebol/competition/<?=url_title($competition->nome)?>/<?=$competition->id_competition?>","name":"Apostas <?=$competition->nome?> "}
					}
			]}
	</script>

		
		<!-- Content
		============================================= -->
		
		<section id="content">

			<div class="content-wrap">

				

			
				<div class="container clearfix">

					<div class="col_three_fifth bothsidebar nobottommargin">

						<div class="fancy-title title-border">
							<h1 style="text-transform: uppercase;">
								Jogos 
								<? if($competition->nome == ''){ ?>
			                     <?
			                     $nm_url = $this->uri->segment(3);
								 echo str_replace("-"," ",$nm_url);
								 ?> 
			                    <? }else{ ?>
									<strong><?=$competition->nome?> </strong>
			                    <? } ?>
							</h1>
							
						</div>

						<div id="posts" class="events small-thumbs">

							<h4>Apostas Futebol <strong><?=$competition->nome?></h4>


							<? $n=0; 
							foreach($jogos as $jogo){  

								$n++;  
								$times = explode(' v ',$jogo->event->name);

								#$dd = $jogo;
								#$dd = $this->padrao_model->get_by_matriz('id_evento',$jogo->event->id,'partidas')->row();	
								$times = explode(' v ',$jogo->event->name); 

							?>
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
										"name":"<?=$competition->nome?>"
									}],
									"Name":"<?=$jogo->event->name?>",
									"description": " Mercados mais correspontidos (Matched) <?=$jogo->event->name?>. ",
									//"startdate":"2018-06-25T18:00:00",
									"startDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
									"endDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
									"url": "<?=base_url()?>bets/jogo/<?=url_title($jogo->event->name)?>/<?=$dd->id_evento?>"
								}
						</script>
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
	    "description": "<?=str_replace(" v "," x ",$jogo->event->name)?> - <?=$competition->nome?> Apostas Futebol Online",
	    //"availability": 10,
	    //"price" : 100,
	    "url" : "https://www.tradersize.com",
	    "image": "https://tradersize.com/img/logo.jpg",
	    "competitor": [
	      {
	        "@type": "SportsTeam",
	        "name": "<?=$times['0']?>"
	      },
	      {
	        "@type": "SportsTeam",
	        "name": "<?=$times['1']?>"
	      }
	   

	    ],

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
	      "@type": "City",
	      "name": "<?=$competition->nome?>",
	      "address" : "Betfair",
	      "description": "<?=str_replace(" v "," x ",$jogo->event->name)?> - <?=$competition->nome?> - Apostas Futebol Online"
	    },
	    "performer": {
		    "@type": "PerformingGroup",
		    "name": "Betfair"
		    }
	  }
	}
	</script>
							<div class="entry clearfix">
								
								
								<div class="entry-image hidden-sm">
									<a href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>">
										<img src="<?=base_url()?>images-front/parallax/home/1.jpg" alt="<?=$jogo->evento?>">
										<div class="entry-date"><?=substr($jogo->event->openDate,8,2)?>
											<span><?=$this->padrao_model->mes(substr($jogo->event->openDate,5,2))?></span>
										</div>
									</a>
								</div>


								<div class="entry-c">
									<div class="entry-title">
										<h2 itemscope itemtype="https://schema.org/WebPage"><a target="_blank" href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>" itemprop="relatedLink"><?=str_replace(" v "," x ",$jogo->event->name)?></a></h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><span class="label label-success">Aberto</span></li>
										<li><a href="#"><i class="icon-time"></i> <?=$jogo->event->openDate?></a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Perth</a></li>
									</ul>
									<div class="entry-content">
										<a href="<?=base_url()?>home/cadastro" class="btn btn-info">VIP</a> <a href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>" class="btn btn-success">Veja Mais</a>
									</div>
								</div>
							</div>
							<? } ?>
							<!--
							<div class="entry clearfix">
								<div class="entry-image hidden-sm">
									<a href="#">
										<img src="<?=base_url()?>images/events/thumbs/3.jpg" alt="Ducimus ipsam error fugiat harum recusandae">
										<div class="entry-date">3<span>May</span></div>
									</a>
								</div>
								<div class="entry-c">
									<div class="entry-title">
										<h2><a href="#">Ducimus ipsam error fugiat harum recusandae</a></h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><span class="label label-info">Public</span></li>
										<li><a href="#"><i class="icon-time"></i> 11:00 - 19:00</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Melbourne</a></li>
									</ul>
									<div class="entry-content">
										<a href="#" class="btn btn-default">Buy Tickets</a> <a href="#" class="btn btn-danger">Read More</a>
									</div>
								</div>
							</div>

							<div class="entry clearfix">
								<div class="entry-image hidden-sm">
									<a href="#">
										<img src="<?=base_url()?>images/events/thumbs/4.jpg" alt="Nisi officia adipisci molestiae aliquam">
										<div class="entry-date">16<span>Jun</span></div>
									</a>
								</div>
								<div class="entry-c">
									<div class="entry-title">
										<h2><a href="#">Nisi officia adipisci molestiae aliquam</a></h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><span class="label label-warning">Private</span></li>
										<li><a href="#"><i class="icon-time"></i> 12:00 - 18:00</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> New York</a></li>
									</ul>
									<div class="entry-content">
										<a href="#" class="btn btn-info">RSVP</a> <a href="#" class="btn btn-danger">Read More</a>
									</div>
								</div>
							</div>
							-->
							<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
						</div>

					</div>

					<div class="col_two_fifth nobottommargin col_last">

						

						
							
							<? #include("includes/front-futebol/menu_competicoes.php"); ?>

						


						<div class="fancy-title title-border">
							<h4>Apostas Futebol Online</h4>
							<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
						</div>

<!--
						<div class="fancy-title title-border">
							<h4>Video de Apresentação</h4>
						</div>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/6kBzDqzoFTo?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

						<!--<iframe src="//player.vimeo.com/video/30626474" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->

					</div>

					<div class="clear"></div>

				


				</div>

				<div class="section footer-stick notopmargin">

					<h4 class="uppercase center"><span>Betfair</span> Application</h4>

					<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<div class="slide">
									<div class="" align="center">
										<a href="https://apps.betfair.com/trading/trader-size/" target="_blank">
											<img src="<?=base_url()?>images/vendor_logo_stacked.png" alt="Licença Betfair" style="width:200px" align="center">
										</a>
									</div>
									<div class="testi-content">
										<p>
Acompanhe os volumes dos mercados através de gráficos e porcentagens atualizados em tempo real, melhorando sua intuição de analisar rapidamente as situações dos eventos.
										</p>
										<div class="testi-meta">
											Igor Marlus
											<span>Fundador.</span>
										</div>
									</div>
								</div>
								<!--
								<div class="slide">
									<div class="testi-image">
										<a href="#"><img src="<=base_url()?>images/testimonials/2.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Natus voluptatum enim quod necessitatibus quis expedita harum provident eos obcaecati id culpa corporis molestias.</p>
										<div class="testi-meta">
											Collis Ta'eed
											<span>Envato Inc.</span>
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="testi-image">
										<a href="#"><img src="<=base_url()?>images/testimonials/1.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Incidunt deleniti blanditiis quas aperiam recusandae consequatur ullam quibusdam cum libero illo rerum!</p>
										<div class="testi-meta">
											John Doe
											<span>XYZ Inc.</span>
										</div>
									</div>
								</div>
							-->
							</div>
						</div>
					</div>

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

	
</body>
</html>