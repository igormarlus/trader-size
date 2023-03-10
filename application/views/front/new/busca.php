<!DOCTYPE html>
<? if($this->uri->segment(2) == "team" ){ ?>
<html dir="ltr" lang="en-US">
<? } ?>
<? if($this->uri->segment(2) == "time" || $this->uri->segment(2) == "time" ){ ?>
<html dir="ltr" lang="pt-BR">
<? } ?>
<head>

	<? if($this->uri->segment(2) == "team" ){ ?>
		<link rel="canonical" href="<?=base_url()?><?=$this->uri->segment(1)?>/team/<?=url_title($dd->evento)?>/<?=$dd->id_evento?>">
	<? } ?>
	<? if($this->uri->segment(2) == "time" || $this->uri->segment(2) == "time" ){ ?>
		<link rel="canonical" href="<?=base_url()?><?=$this->uri->segment(1)?>/time/<?=$q?>">
	<? } ?>

	

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Trader Size" />

    <title>Próximos Jogos <?=$q?>  Futebol   </title>
    <meta name="title" content="Próximos Jogos Futebol <?=$q?>" />
    <meta name="description" content=" Próximos jogos <?=$q?> <? foreach ($busca as $jogo) { echo $jogo->event->name.", "; } ?>  Apostas Esportivas Online Futebol. " />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">


  
	<meta name="keywords" content="<?=$q?>,Betfair, trader, trader esportivo, Intercâmbio Online">

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

	<!-- Document Title
	============================================= -->
	
	


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
		
		

		
		<!-- Content
		============================================= -->
		
		<section id="content">

			<div class="content-wrap">

				<? if($this->uri->segment(2) == "team" || $this->uri->segment(2) == "time" ){ ?>
                            <script type="application/ld+json">
							{
							"@context": "http://schema.org",
							"@type": "SportsTeam",
							"name": "<?=$q?>"
							}
							</script>
							<? } ?>

			
				<div class="container clearfix">

					<!-- NOVA AREA -->
					<div class="card-body fadeInLeft animated">
                      <?
                      
                      #$dd_evento = $dd;
                      #$id_evento = $dd->id;
                      #echo "********* - ".$dd->evento." - *********";
                      #$times = explode(" v ", $dd->evento);
                      #if(!isset($times[1])){
                      #  $times = explode(" x ", $dd->evento);
                      #}
                      #$home = $times[0];
                      #$away = $times[1];
                      #print_r($times);
                      /*
                      $qr_home = $this->db->query("SELECT * FROM selections WHERE name = '".$home."' ");
                      #$qr_away = $this->db->query("SELECT * FROM selections WHERE name = '".$away."' ");
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
                      */
                      ?>
                      <? #=$dd->evento?>
                      <!--
                      <br>
                      
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
                          <div class="col-12 col-sm-12">
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
                                  <td><?=str_replace($home, "<strong>$home</strong>", $dd_partida->evento)?> <?#=$dd_partida->evento?></td>
                                  <td><strong><?=$jogo_result->home_gols?></strong> x <strong><?=$jogo_result->away_gols?></strong></td>
                                  <td>  <?=$gols_total?> Gol(s)</td>
                                </tr>
                                
                              <? } ?>
                              <tr>
                                
                              </tr>
                              </table>
                              <h4>Gols <?=$home?></h4>
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

                              <h4>Placares <?=$home?></h4>
                                <table class="table">
                                  <?
                                  foreach ($resultados_home as $placar => $qtd) {?>
                                  <tr>
                                    <td><?=$placar?></td><td> <?=$qtd?>/<?=count($resultados_home)?></td>
                                  </tr>
                                  <? } ?>
                                </table>


                            </div>

					<!--  X NOVA AREA -->



					<div class="col_three_fifth bothsidebar nobottommargin">
							<h1>Próximos Jogos <strong><?=$q?></strong></h1>
						<div class="fancy-title title-border">
							<h2 style="text-transform: uppercase;">
								
								Search: <strong><?=$q?></strong>
							</h2>
							
						</div>

						<div id="posts" class="events small-thumbs">

							<h4>Intercâmbio Futebol Online</h4>


							<? #$n=0; foreach($jogos->result() as $jogo){  $n++;  
								$t=0;  foreach ($busca as $jogo) { $t++;

								$times = explode(' v ',$jogo->event->name); 
								$dd = $jogo;	
								#$times = explode(' v ',$dd->evento); 

							?>
							<?
                                $hora_ld = strtotime(substr($jogo->event->openDate,11,8)); // horario de londres
                                $time = date("h:i:s", mktime($hora_ld -3 ));
                                $data_eve = substr($jogo->event->openDate,0,10);
                                $hora_eve = substr($jogo->event->openDate,11,8);
                                ?>
                                 <? #=$hora_eve?>                                        
                                <?
                                $date_time  = new DateTime( $hora_eve );
                                $diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
                                #echo $diff->format( '%H:%i:%S' ); // 05:10:00
                            ?>
							
                             <script type="application/ld+json">
							   {
							   	"@context":"http://schema.org",
								"@type": "Article",
								"image": "https://tradersize.com/logo/logo-face.png",
								"mainEntityOfPage":{
									"@type":"WebPage",
									"@id":"<?=base_url()?>futebol/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>"
									},
								"headline":"<?=$jogo->event->name?> <?=$this->padrao_model->converte_data(substr($jogo->event->openDate,0,10))?> - Intercâmbio Online Futebol ",
								"url":"<?=base_url()?>futebol/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>",
								"thumbnailUrl":"",
								"dateCreated":"<?=$dd->dt?>",
									"datePublished":"<?=$jogo->event->openDate?>",
									"dateModified":"<?=date("Y-m-d H:i:s")?>",
									"articleSection":"Futebol",
									"author":[{"@type":"Person","name":"Trader Size"}],
									"creator":["Trader Size"],
									"publisher":{
										"@type":"Organization",
										"logo": "https://tradersize.com/logo/logo-face.png",
										"name":"Tradersize.com"
									},
									"keywords":["<?$jogo->event->name?>","<?=$times['0']?>","<?=$times['1']?>","Intercâmbio no Jogo <?=$jogo->event->name?>","<?=$jogo->event->name?>","<?=str_replace(" v "," x ",$jogo->event->name)?>","betfair","Intercâmbio Online","Intercâmbio Esportivas Online Futebol","Intercâmbio Esportivas","Intercâmbio Futebol","Intercâmbio Futebol","Pré-jogo","Live","Intercâmbio em tempo real"]
									}   
								</script>
                            <script type='application/ld+json'>
							{
								"@context":"https://schema.org","@type":"BreadcrumbList","itemListElement":[
								{
									"@type":"ListItem","position":1,
									"item":
									{"@id":"<?=base_url()?>","name":"Trader Size - Próximos Jogos <?=$q?>"}},


									{
										"@type":"ListItem","position":2,
											"item":{
												"@id":"<?=base_url()?>futebol/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>","name":"Próximos Jogos <?=$jogo->event->name?> "}
											}
									]}
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
										"name":"Betfair"
									}],
									"Name":"<?=$jogo->event->name?>",
									"description": " Mercados mais correspontidos (Matched) <?=$jogo->event->name?>. ",
									//"startdate":"2018-06-25T18:00:00",
									"startDate": "<?=$jogo->event->openDate?>",
									"url": "<?=base_url()?>futebol/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>"
								}
						</script>
							<script type="application/ld+json">
	{
	  "@context":"http://schema.org",
	  "@type":"BroadcastEvent",
	  "name": "Intercâmbio - Bets: <?=$jogo->event->name?>",
	  "description": "Saiba onde estão as apostas (dinheiro) no jogo: <?=$jogo->event->name?>",
	  "isLiveBroadcast": "http://schema.org/True",
	  "videoFormat": "HD",
	  "startDate": "<?=$jogo->event->openDate?>",
	  "endDate" : "<?=$jogo->event->openDate?>",
	   "image": "https://tradersize.com/img/logo.jpg",
	   "url": "https://tradersize.com",
	  "broadcastOfEvent": {
	    "@type": "SportsEvent",
	    "name": "<?=$jogo->event->name?>",
	    "description": "<?=$jogo->event->name?> -  Intercâmbio Futebol Online",
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

	    "startDate": "<?=$jogo->event->openDate?>",
	    "endDate" : "<?=$jogo->event->openDate?>",
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
	      "description": "<?=$jogo->event->name?>  Intercâmbio Futebol Online"
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
									<a href="<?=base_url()?>bets/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>">
										<img src="<?=base_url()?>images/parallax/home/1.jpg" alt="<?=$jogo->event->name?>">
										<div class="entry-date"><?=substr($jogo->event->openDate,8,2)?>
											<span><?=$this->padrao_model->mes(substr($jogo->event->openDate,5,2))?></span>
										</div>
									</a>
								</div>


								<div class="entry-c">
									<div class="entry-title">
										<h2 itemscope itemtype="https://schema.org/WebPage"><a target="_blank" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>" itemprop="relatedLink"><?=$jogo->event->name?></a></h2>
									</div>
									<ul class="entry-meta clearfix">
										<li><span class="label label-success">Aberto</span></li>
										<li><a href="#"><i class="icon-time"></i> <?=$this->padrao_model->converte_data(substr($jogo->event->openDate,0,10))?></a></li>
										<li><a href="#"><i class="icon-map-marker2"></i> Perth</a></li>
									</ul>
									<div class="entry-content">
										<a href="<?=base_url()?>home/cadastro" class="btn btn-info">VIP</a> <a href="<?=base_url()?>bets/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>" class="btn btn-success">Veja Mais</a>
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
							<h4>Intercâmbio Futebol Online</h4>
							<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
						</div>


						<div class="fancy-title title-border">
							<h4>Video de Apresentação</h4>
						</div>
						<iframe width="560" height="315" src="https://www.youtube.com/embed/QKR8YGhpE5E" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

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