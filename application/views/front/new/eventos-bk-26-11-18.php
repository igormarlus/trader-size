<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Trader Size" />

	<meta charset="UTF-8">
	<title>Próximos Jogos  Futebol HOJE - Trader Esportivo Futebol - Previsões de Jogos - Apostas Online  </title>
    <meta name="title" content="Próximos Jogos Futebol HOJE - Trader Esportivo Futebol -  Previsões de Jogos  - Apostas Online, Apostas Bets,  Tempo Real" />
    <meta name="description" content="Futebol HOJE Apostas Esportivas Futebol. Próximos Jogos Mercados mais correspondidos. Previsões de Jogos "  />
	<meta name="keywords" content="Betfair, trader, trader esportivo, ">
	
	<!-- Stylesheets
	============================================= -->
	
	
	 <link rel="shortcut icon" href="http://tradersize.com/imagens/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="https://tradersize.com/feeds/partidas.php" />

	<link rel="stylesheet" href="<?=base_url()?>css-front/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/animate.css" type="text/css" />
	<!--<link rel="stylesheet" href="<?=base_url()?>css-front/calendar.css" type="text/css" /> -->

	<link rel="stylesheet" href="<?=base_url()?>css-front/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	
	<!--<title>Próximos Jogos - Trader Esportivo Futebol - Apostas Bet</title>-->

<!-- Global site tag (gtag.js) - Google Analytics 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-103260353-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-103260353-1');
</script>
-->

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6816270130378142",
    enable_page_level_ads: true
  });
</script>

</head>

<body class="stretched">
<div id="fb-root"></div>
<!--
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

			<div class="content-wrap">

				

			
				<div class="container clearfix">

					<div class="col_three_fifth bothsidebar nobottommargin">

						<div class="fancy-title title-border">
							<h3 itemprop="keywords"><a href="<?=base_url()?>futebol/proximos">Próximos Jogos Futebol HOJE</a></h3>

						</div>
			
						<div id="posts" class="events small-thumbs">
						<h4>Mais Correspondidos - TOP 20</h4>
						<table class="table table-responsive" itemscope itemtype="https://schema.org/WebPage">
						<? 
						#$n=0; foreach($copa2018->result() as $jogo){  $n++;  $times = explode(' v ',$jogo->evento);
						$qtd_view = 0;
						$pode_ver = 2;
						if($this->session->userdata('id')){
							$pode_ver = 100;
						} 
						#$n=0; foreach($proximos->result() as $dd_evento){  $n++;  $competition = ""; 

						$posicao = 0; foreach($this->betfront_model->getMarketings_best($APP_KEY, $SESSION_TOKEN,1,20,'MATCH_ODDS') as $dd){ $posicao++; 
							$times = array();	
							$t=0;
							foreach( $dd->runners as $time ){ $t++;
								#print_r($time);
								#echo $time->runnerName;
								$times[$t] = $time->runnerName;
							}
							$tit_jogo = $times[1]." v ".$times[2];
							$qr_partida = $this->db->query("SELECT * FROM partidas WHERE evento = '".$tit_jogo."' ");
							#$dd_evento_qr = $this->betfront_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$dd->marketId);
							#$dd_evento = $dd_evento_qr[0]->event;
						

							#$id_evento = $dd_evento->id_evento;
							#$dd_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas')->row();
							#$competition = $this->padrao_model->get_by_id($dd_evento->id_competition,'betfair_competitions')->row()->nome;
							#if($odd->totalMatched > 0 && ($dd_evento->evento != '') ){
									$qtd_view++;
							#		$times = explode(' v ',$dd_evento->evento); 
									
								?>
								<!-- NOVA ESTRUTURA 
									<div class="entry-content">
									<ul class="list-group">
										<li class="list-group-item"><?=$times[1]?> x <?=$times[2]?> <small>Veja mais</small> </li>
										<li class="list-group-item">Embreagens</li>
										<li class="list-group-item">Coroa e Pinhão</li>
										<li class="list-group-item">Cruzetas</li>
										<li class="list-group-item">Eixos</li>
										<li class="list-group-item">Trizetas</li>
									</ul>
								</div>
								-->
								<tr>
									<td><strong title="<?=$dd->timezone?>"><?=$dd->openDate?></strong></td>
									<td>
										<?#=$qr_odds_mkt->num_rows()?>
										<?bb #=print_r($dd)?>
										<?#=$dd_evento->countryCode?>
									<? #=print_r($dd_evento)?>
									</td>
								
									<td>
										<h3 style="font-size: 14px">
											<? #=print_r($times)?>
											<? if( $qr_partida->num_rows() > 0 ){  $dd_evento =  $qr_partida->row();   ?>
											<a itemprop="relatedLink" title="<?=$dd_evento->evento?>"  href="<?=base_url()?>futebol/jogo/<?=url_title($dd_evento->evento)?>/<?=$dd_evento->id_evento?>">

												<? #=str_replace(" v "," x ","aaaa")?>	
												<?=$times[1]?> x <?=$times[2]?> 
											</a> 
											<? }else{ ?>
												
											<a itemprop="relatedLink" title="<?=$dd_evento->name?>"  href="<?=base_url()?>bets/jogo_by_mkt/<?=$dd->marketId?>">

												<? #=str_replace(" v "," x ","aaaa")?>	
												<?=$times[1]?> x <?=$times[2]?> 
											</a>

											<? } ?>
											
											<? /* $n=0; foreach($dd->runners as $mais_info){ $n++; ?>  
                                            	<? if($n <= 3){ ?>
                                                	| <?=$mais_info->runnerName?> 
                                                <? } ?>
											<? } */ ?>
										</h3>
									</td>
									<td>
										
										$<?=number_format($dd->totalMatched, 2, ',', '.')?>
									</td>
								
									<td>
											
										
										
										<? if( $qr_partida->num_rows() > 0 ){  $dd_evento =  $qr_partida->row();   ?>
											<a itemprop="relatedLink" title="<? #=$dd_evento->id_evento?>" href="<?=base_url()?>futebol/jogo/<?=url_title($dd_evento->evento)?>/<?=$dd_evento->id_evento?>" class="btn btn-success">Veja Mais</a>
											<? }else{ ?>
												
											<a itemprop="relatedLink" title="<? #=$dd_evento->id_evento?>" href="<?=base_url()?>bets/jogo_by_mkt/<?=$dd->marketId?>" class="btn btn-success">Veja Mais</a>
											<? #=$this->padrao_model->converte_data(substr($dd_evento->data_betfair,0,10))?> <? #=substr($dd_evento->data_betfair,10,10)?>
											<? } ?>
									</td>
									<!-- SHARE FACE 
									<td>		
										
									  <div class="fb-share-button" 
									    data-href="<?=base_url()?>futebol/jogo/<?=url_title($dd_evento->name)?>/<?=$dd_evento->id?>" 
									    data-layout="button_count">
									  </div>
											
									</td>-->
								
							</tr>
							<? #} // x if ?>	
							<? } ?>
							</table>



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





							<? /* $n=0; foreach($copa2018->result() as $jogo){  $n++;  $times = explode(' v ',$jogo->evento); 
								$dd = $jogo;	
								$times = explode(' v ',$dd->evento); 
							
							?>
							<div class="entry clearfix">
								
								<!-- BK <div class="entry-image hidden-sm">
									<a href="#">
										<img src="<=base_url()?>images/events/thumbs/2.jpg" alt="Nemo quaerat nam beatae iusto minima vel">
										<div class="entry-date">16<span>Apr</span></div>
									</a>
								</div> -->

								<div class="entry-image hidden-sm">
									<ul class="skills">
										<?=$this->betfront_model->get_percentual_selecions($dd->id_evento)?>
									</ul>
								</div>


								<div class="entry-c">
									<div class="entry-title">
										<h2><a target="_blank" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></h2>
										<!-- SHARE FACE -->
												  <div class="fb-share-button" 
												    data-href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>" 
												    data-layout="button_count">
												  </div>
									</div>
									<ul class="entry-meta clearfix">
										<li><span class="label label-success">Aberto</span></li>
										<li><a href="#"><i class="icon-time"></i> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=substr($dd->inicio,10,10)?></a></li>
										
									</ul>
									<div class="entry-content">
										<a href="<?=base_url()?>home/cadastro" class="btn btn-info">VIP</a> <a href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>" class="btn btn-success">Veja Mais</a>
									</div>
								</div>
							</div>
							<? } */ ?>
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

						

						
							
							<? include("includes/front-futebol/menu_competicoes.php"); ?>

						


						<div class="fancy-title title-border">
							<h4>Betfair</h4>
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
	<script type="text/javascript" src="<?=base_url()?>js-front/plugins-cp.js"></script>
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

	
	<!-- Google Analytics Content Experiment code 
<script>function utmx_section(){}function utmx(){}(function(){var
k='156078638-0',d=document,l=d.location,c=d.cookie;
if(l.search.indexOf('utm_expid='+k)>0)return;
function f(n){if(c){var i=c.indexOf(n+'=');if(i>-1){var j=c.
indexOf(';',i);return escape(c.substring(i+n.length+1,j<0?c.
length:j))}}}var x=f('__utmx'),xx=f('__utmxx'),h=l.hash;d.write(
'<sc'+'ript src="'+'http'+(l.protocol=='https:'?'s://ssl':
'://www')+'.google-analytics.com/ga_exp.js?'+'utmxkey='+k+
'&utmx='+(x?x:'')+'&utmxx='+(xx?xx:'')+'&utmxtime='+new Date().
valueOf()+(h?'&utmxhash='+escape(h.substr(1)):'')+
'" type="text/javascript" charset="utf-8"><\/sc'+'ript>')})();
</script><script>utmx('url','A/B');</script>
 End of Google Analytics Content Experiment code -->


</body>
</html>