<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Trader Size" />

	<meta property="og:url" content="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$id_evento?>">
    <meta property="og:title" content="Apostas Bets no jogo: <?=$dd->evento?>.">
	
    <meta property="og:site_name" content="Trader Size - Apostas Bets <?=$dd->evento?>">
    <meta property="og:image" content="http://www.tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="image/png">
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="<?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> | Saiba onde está o Dinheiro!">
    
    
    
	<meta charset="UTF-8">
	<title><?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> |   Apostas - Bets</title>
    <meta name="title" content="<?=$dd->evento?> | <?=substr($dd->inicio,0,10)?> Apostas Bets" />
    <meta name="description" content="Trader Size: <?=$dd->evento?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> | Saiba onde estão as apostas - Bets no jogo: <?=$dd->evento?> "  />
	<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, <?=$dd_evento?>">
	<!-- Stylesheets
	============================================= -->
	

	<link rel="stylesheet" href="<?=base_url()?>css-front/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/calendar.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url()?>css-front/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />


	
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
</head>

<body class="stretched">
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KFW8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
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
			"description": " Apostas Bet (Matched) <?=$dd->evento?>",
			//"startdate":"2018-06-25T18:00:00",
			"startDate": "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
			"url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>"
		}
</script>
	<script type="application/ld+json">
	{
	  "@context":"http://schema.org",
	  "@type":"BroadcastEvent",
	  "name": "Apostas - Bets: <?=$dd->evento?>",
	  "description": "Saiba onde estão as apostas (dinheiro) no jogo: <?=$dd->evento?>",
	  "isLiveBroadcast": "http://schema.org/True",
	  "videoFormat": "HD",
	  "startDate": "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
	  "endDate" : "<?=substr($dd->inicio,0,10)?> <?=substr($dd->inicio,10,10)?>",
	   "image": "https://tradersize.com/img/logo.jpg",
	   //"url": "https://tradersize.com",
	   "url": "<?=str_replace(".com/",".com",base_url()).$_SERVER['REQUEST_URI']?>",
	  "broadcastOfEvent": {
	    "@type": "SportsEvent",
	    "name": "<?=$dd->evento?>",
	    "description": "<?=$dd->evento?> - Saiba onde está o dinheiro",
	    //"availability": 10,
	    //"price" : 100,
	    "url" : "https://www.tradersize.com",
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
		    "name" : "Trader Size - Saiba onde está o Dinheiro",
		    "availability": "http://schema.org/InStock",
		    "url": "https://tradersize.com",
		    "price": "100.00",
		    "priceCurrency": "USD",
		    "validFrom": "<?=date("Y-m-d H:m:s")?>"

		  },
	    "location": {
	      "@type": "City",
	      "name": "Trader Size",
	      "address" : "Betfair",
	      "description": "<?=$dd->evento?> - Trader: Bolsa esportiva"
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
  "name": "Trader Size - Software para Trader Esportivo",
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
			<div class="content-wrap">

				

			
				<div class="container clearfix">

					<div class="col_three_fifth bothsidebar nobottommargin">

						<div class="fancy-title title-border">
							<h1> Apostas/Bets <?=$dd->evento?></h1>
						</div>

						<div id="posts" class="events small-thumbs">
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

					 <h2 ><span style="color: #ffb901">Mercados mais correspondidos:</span></h2>         
                	
                    <div class="col12">
						<? 
						$m = 0; 
						foreach ($mercados as $mercado) { 
						$m++;
						#foreach ($this->bet_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5') as $mercado) { $m++;
						?>
                        
                            <h3 title="<?=$mercado->marketId?>">
                                <span><?=$m?>º   <?=$mercado->marketName?></span> - 
                                <small>
                                	
                                <a style="font-size:12px;color:#06F" target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$mercado->marketId?>">
                             Betfair Exchange
                             </a>
                                </small>
                                
                            </h3>

                            <h5>Total Matched: $<?=number_format($mercado->totalMatched, 2, ',', '.')?></h5>
                            
                            
                            
                            <div class="entry clearfix">
                            
                            <?
                            $qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$mercado->marketId."' AND   tipo = 'back' AND selection_name <> '' "); 	
							#echo "<h2>".$qr_selecoes->num_rows()."</h2>";
							if($qr_selecoes->num_rows() > 0){ ?>
							<!--
							<table class="pricing" style="width:100%;border:red 0px solid;">
                            <tbody><tr>
                                <th></th>
                                <th>back</th>
                                <th>Lay</th>
                            </tr>
                        -->
                            <div class="entry-image hidden-sm">
								<ul class="skills">
							<?php $s=0; foreach($qr_selecoes->result() as $selecao){ $s++;
								$qr_num = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' "); 	
								
								#$soma_back_sel_ci = $this->db->query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' order by id desc LIMIT 5  ");
								
								
								$soma_back_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by id desc LIMIT 5  ");
								$soma_back = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId." AND tipo = 'back' order by id desc LIMIT 5  ");
								$soma_total_sel_back = mysql_fetch_assoc($soma_back_sel);
								$soma_total_back = mysql_fetch_assoc($soma_back);
								$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
						
								
								#$pecentual_back = 10;
							?>
                            
	                            
								
										<li data-percent="<?=$pecentual_back?>">
											<span title="<?=$selecao->selection_name?>: <?=$pecentual_back?>%"><?=$selecao->selection_name?> </span> <br>
											<div class="progress" title="<?=$selecao->selection_name?>: <?=$pecentual_back?>%">
												<div class="progress-percent"><div class="counter counter-inherit counter-instant"><span data-from="0" data-to="<?=$pecentual_back?>" data-refresh-interval="30" data-speed="1000"></span>%</div></div>
											</div>
											

										</li>
									
                                
                              
		
		
                                
                    			<? } // x forach ?>
                    				</ul>
								</div>
								
								<div class="entry-c">
									<div class="entry-title">
										<h2><a target="_blank" href="#">   <?=$mercado->marketName?></a></h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><span class="label label-success">Free</span></li>
										<li><a href="#"><i class="icon-money"></i> $<?=number_format($mercado->totalMatched, 2, ',', '.')?></a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> <?=$m?>º</a></li>
									</ul>
									<div class="entry-content">
										<? if(!$this->session->userdata('id')){ ?>
											<a href="<?=base_url()?>home/cadastro" class="btn btn-info">Refresh </a> 
											<a href="<?=base_url()?>home/cadastro" class="btn btn-success">VIP</a>
											<button type="button" disabled="" class="btn btn-warning">Betfair</button>
										<? }else{ ?>
											<button  class="btn btn-info">Refresh </button> 
											<button type="button" disabled="" class="btn btn-warning">Betfair</button>
											<!--
											<a href="<?=base_url()?>home/cadastro" class="btn btn-success">VIP</a>
											-->
										<? } ?>
									</div>
								</div>
								
                       
							<? }else{ // x if`num_rows ?>
                        		
                        		<div class="entry-c ">
									
									<a href="<?=base_url()?>home/cadastro" class="btn btn-info">Seja VIP</a> 
									<a href="<?=base_url()?>home/login" class="btn btn-success">Login</a> 
								
								</div>


                            <? } ?>
                        </div>
                            
                        <? } // x foreacdh ?>
                
               </div>

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
							<ul class="cat-list">
								<? foreach($mais->result() as $jogo){ ?>
									<li><a href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
		                        <? } ?>
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
						<!--
						<iframe src="//player.vimeo.com/video/30626474" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					-->

					</div>

					<div class="clear"></div>

					<div id="oc-clients-full" class="owl-carousel owl-carousel-full image-carousel bottommargin-sm carousel-widget" data-margin="30" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false"data-items-xxs="2" data-items-xs="3" data-items-sm="4" data-items-md="5" data-items-lg="6" style="display: none;">

						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/1.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src<=base_url()?>images/clients/2.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/3.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/4.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/5.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/6.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/7.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/8.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/9.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/10.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/11.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/12.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/13.png" alt="Clients"></a></div>
						<div class="oc-item"><a href="http://logofury.com/"><img src="<=base_url()?>images/clients/14.png" alt="Clients"></a></div>

					</div>


				</div>

				<div class="section footer-stick notopmargin" style="display: none;">

					<h4 class="uppercase center"><span>Attendees</span> Feedback</h4>

					<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<div class="slide">
									<div class="testi-image">
										<a href="#"><img src="<=base_url()?>images/testimonials/3.jpg" alt="Customer Testimonails"></a>
									</div>
									<div class="testi-content">
										<p>Similique fugit repellendus expedita excepturi iure perferendis provident quia eaque. Repellendus, vero numquam?</p>
										<div class="testi-meta">
											Steve Jobs
											<span>Apple Inc.</span>
										</div>
									</div>
								</div>
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
	</script>

</body>
</html>