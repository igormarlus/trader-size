<!DOCTYPE html>
<!-- lang="en-US" -->
<html >

<head>

	<title>Seja Bem Vindo ao Trader Size</title>
    
    
	<meta charset="UTF-8">
	
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
	

<!--
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6816270130378142",
    enable_page_level_ads: true
  });
</script>

-->
<script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
</script>

</head>

<body class="stretched">
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<? include("includes/front-futebol/header.php"); ?>
		
		<div class="container clearfix">
			
	
			<section id="page-title" class="page-title-center">

			<div class="container clearfix">
				<h1>Olá <?=$this->session->userdata('nome')?></h1>
				<span>Selecione uma opção abaixo:</span>
				<!--
				<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Shortcodes</a></li>
					<li class="active">Page Titles</li>
				</ol>-->
			</div>

		</section>
<!--
		<div class="col_half panel panel-default">
			<div class="panel-heading">
				<h2 class="panel-title">Entrar no Trader Size</h2>
			</div>
			<div class="panel-body">
				<a href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=https://tradersize.com/bet" target="_blank" class="button button-desc button-3d button-yellow button-rounded center" style="color:#000"><div>Entrar no Trader Size</div><span>É necessário ter uma conta na Betfair</span></a>			
			</div>
		</div>
	-->

		<div class="col_full panel panel-default" align="center">
			<div class="panel-heading">
				<h2 class="panel-title">Área Pública</h2>
			</div>
			<div class="panel-body">
			<a href="<?=base_url()?>futebol" target="_blank" class="button button-desc button-3d button-rounded  center" style="color:#fff">Próximos Jogos<span>Área Pública Próximos Jogos</span></a>
			</div>
		</div>

		<div class="line"></div>

		<p style="text-align:center">
				Para entrar na aplicação Trader Size é necessário ter uma conta na <a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank">Betfair</a>.<br>
				O Trader Size não tem acesso a nenhuma informação referente a login e senha concedido no ato do login, <br>a Betfair nos fornece apenas um código temporário que serve apenas para validação e verificação do Login.
				
			
			<p align="center">Caso ainda não tenha uma conta na Betfair, <a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank">Clique aqui</a>.</p>

		
		</div>

		</div>	
		

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

</body>
</html>