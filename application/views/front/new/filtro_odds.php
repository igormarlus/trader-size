<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Trader Size" />

	<meta charset="UTF-8">
	<title>Filtro de Odds Betfair  Futebol HOJE   </title>
    <meta name="title" content="Filtro de Odds Betfair  Futebol HOJE" />
    <meta name="description" content="Filtro de Odds - Buscar Odds Betfair - Apostas Esportivas Futebol. "  />
	<meta name="keywords" content="Betfair, trader, trader esportivo, ">
	
	<!-- Stylesheets
	============================================= -->
	
	
	<!-- <link rel="shortcut icon" href="http://tradersize.com/imagens/favicon.ico">-->
	 <link rel="shortcut icon" href="<?=base_url()?>assets2/images/icons/favicon.png">
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
<meta name="theme-color" content="#ffffff">
</head>

<body class="stretched">
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

			<div class="content-wrap">

				

			
				<div class="container clearfix">

					<div class="col_three_fifth bothsidebar nobottommargin">

						<div class="fancy-title title-border">
							<h3>Filtro de Odds:</h3>
						</div>

						<div id="posts" class="events small-thumbs">
						
						<div class="fancy-title title-border topmargin-sm">
							<h4>Predefinidos</h4>
						</div>
						
						<div class="box">

							<a href="<?=base_url()?>futebol/filtro_odds/under" class="button button-3d button-large button-rounded button-teal">UNDER</a>
							<a href="<?=base_url()?>futebol/filtro_odds/over" class="button button-3d button-large button-rounded button-green">OVER</a>
							<a href="<?=base_url()?>futebol/filtro_odds/bts" class="button button-3d button-large button-rounded button-blue">BTS</a>
						
						</div>
						<div class="fancy-title title-border topmargin-sm">
							<h4>Filtro Personalizado</h4>
						</div>
						<? 
						#$n=0; foreach($copa2018->result() as $jogo){  $n++;  $times = explode(' v ',$jogo->evento);
						$qtd_view = 0;
						$pode_ver = 2;
						if($this->session->userdata('id')){
							$pode_ver = 100;
						} 
						?>


						<div class="contact-widget">

							<div class="contact-form-result"></div>
							<?
							if($_POST){
								$dd_de = $this->input->post('de');
								$dd_ate = $this->input->post('ate');
								$dd_mercado = $this->input->post('mercado');
							}else{
								$dd_de = 1.5;
								$dd_ate = 2.1;
								$dd_mercado = "Match Odds";
							}
							?>
							<form class="nobottommargin" id="" name="" action="<?=base_url()?>futebol/filtro_odds" method="post">

								<div class="form-process"></div>

								<div class="col_one_third">
									<label for="template-contactform-name">De <small>*</small></label>
									<input type="float" id="de" step="any" name="de" placeholder="1.5" value="<?=$dd_de?>" class="sm-form-control required" />
								</div>

								<div class="col_one_third">
									<label for="template-contactform-email">Até <small>*</small></label>
									<input type="float" id="ate" step="any" placeholder="2.1" name="ate" value="<?=$dd_ate?>" class="required sm-form-control" />
								</div>

								<div class="col_one_third col_last">
									<label for="template-contactform-phone">Mercado</label>
									<select id="template-contactform-service" name="mercado" class="sm-form-control">
										<? if($_POST){ ?>
											<option value="<?=$dd_mercado?>" selected="selected"><?=$dd_mercado?></option>
											<option value="Match Odds">Match Odds</option>
										<? } else{ ?>
											<option value="Match Odds" selected="selected">Match Odds</option>
										<? } ?>
										<option value="">-- Selecione --</option>
										
										<option value="Correct Score">Correct Score</option>
										<option value="Both teams to Score?">Both teams to Score?</option>
										<option value="Over/Under 0.5 Goals">Over/Under 0.5 Goals</option>
										<option value="Over/Under 1.5 Goals">Over/Under 1.5 Goals</option>
										<option value="Over/Under 2.5 Goals">Over/Under 2.5 Goals</option>
										<option value="Over/Under 3.5 Goals">Over/Under 3.5 Goals</option>
										<option value="Over/Under 4.5 Goals">Over/Under 4.5 Goals</option>
										<option value="Over/Under 5.5 Goals">Over/Under 5.5 Goals</option>
										<option value="Over/Under 6.5 Goals">Over/Under 6.5 Goals</option>
									</select>
								</div>

								

								<div class="clear"></div>

								<div class="col_full" style="display: none;">
									<label for="template-contactform-message">Mensagem <small>*</small></label>
									<textarea class="required sm-form-control" id="template-contactform-message" name="mensagem" rows="6" cols="30"></textarea>
								</div>

								<div class="col_full hidden">
									<input type="text" id="" name="refer" value="<?=$this->agent->referrer()?>" class="sm-form-control" />
								</div>

								<div class="col_full">
									<button class="button button-3d nomargin" type="submit" id="" name="" value="submit">Filtrar</button>
								</div>

							</form>

						</div>
						<!-- X WIDGET -->
						<? if($_POST || $expect != ''){ ?>
						<? if($resultados > 0){ ?>
						<h4>Resultados: <?=$this->input->post('mercado')?></h4>

						<? if($expect != ''){ ?>
							<h5>Jogos com expectativas <strong style="text-transform: uppercase;"><?=$expect?> </strong> </h5>
						<? } ?>

							<div class="table-responsive">
							  <table class="table">
								<thead>
								  <tr>
									<th>Início</th>
									<th>Jogo</th>
									<th>Mercado</th>
									<th>Seleção</th>
									<th>@Odd</th>
									<th>Lado</th>
									
								  </tr>
								</thead>
								<tbody>
									<? 
									$cont = 0;
									$ids_mkt = array();
									foreach($qr->result() as $dd){ 
										$cont++;
										if($cont > 1){
											#$jafoi = filter_var_array($ids_mkt,$dd->id_mkt);
											$tem = array_search($dd->id_mkt, $ids_mkt); 
											#$jafoi = var_dump(filter_var($dd->id_mkt, $ids_mkt));

										}
										if($tem == ""){
											$ids_mkt[$cont] = $dd->id_mkt;

										?>
										  <tr>
											<td>
												<? if(isset($dd->data_betfair)){ ?>
													<? #=$dd->data_betfair?>
													<?=substr($dd->data_betfair,0,10)?> <?=substr($dd->data_betfair,11,8)?> 
												<? } ?>
												
													
											</td>
											<td><a target="_blank" href="<?=base_url()?>bets/jogo/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>"><strong><?=$dd->evento?></strong></a></td>
											<td><?=$dd->name?></td>
											<td><?=$dd->selection_name?></td>
											<td><strong><?=$dd->odd?></strong></td>
											<td><?=$dd->tipo?> </td>
											
										  </tr>
									  <? } ?>
								  <? } ?>
								  
								</tbody>
							  </table>
							</div>
							<? } ?>

							<? if($qr->num_rows() == 0){ ?>
								<p>Nenhum Jogo Encontrado</p>
							<? } ?>
							<? } ?>


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
	<!--<script type="text/javascript" src="<?=base_url()?>js-front/plugins.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js-front/events-data.js"></script>-->
	<!--
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDMxJ92oBkSnVNHFX3R8XhtYQPEgk1_IiI"></script>
	<script type="text/javascript" src="js/jquery.gmap.js"></script>
-->

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url()?>js-front/functions.js"></script>

	

</body>
</html>