<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Software Trader Size BetFair - Trader Esportivo Futebol - Weight of Money</title>
    <meta name="title" content="Software Trader Size BetFair - Trader Esportivo Futebol - Weight of Money" />
    <meta name="description" content="Software - Aplicação Online baseada no Weight of money" />
	<meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Signika:600,400,300' rel='stylesheet' type='text/css'>
	<link href="<?=base_url()?>css/front/style.css" rel="stylesheet" type="text/css" media="screen">
    <link href="<?=base_url()?>css/front/style-colors.css" rel="stylesheet" type="text/css" media="screen">
    
	<link href="<?=base_url()?>css/front/style-headers.css" rel="stylesheet" type="text/css" media="screen">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<link href="style-ie.css" rel="stylesheet" type="text/css" media="screen">
	<![endif]-->
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K3KFW8V');</script>
<!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KFW8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --
	<div class="home color-blue">
	<!-- HEADER -->
    <? include("includes/front/header.php"); ?>
	

	
    
	<section class="content reverse">
		<section class="main">
        	
        	<? if($team_str != '' ){ ?>
    	
        <section class="columns">
				<h2><span>Search: <strong><?=$team_str?></strong></span></h2>
                
                <table class="pricing">
                        <tbody>
                        <!--
                        <tr>
                            <th>Data/Hora</th>
                            <th>Mercado</th>
                            <th>Evento</th>
                            <th>Correspondido</th>
                        </tr>
                        -->
                        </tbody>
                   <? $t=0;  foreach ($busca as $jogo) { $t++; 	
                   	$dd = $jogo;
                   	$times = explode(' v ',$jogo->event->name); 	
                   	?>
						
                        <script type="application/ld+json">
	{
	  "@context":"http://schema.org",
	  "@type":"BroadcastEvent",
	  "name": "Apostas - Bets: <?=$jogo->event->name?>",
	  "description": "Saiba onde estão as apostas (dinheiro) no jogo: <?=$jogo->event->name?>",
	  "isLiveBroadcast": "http://schema.org/True",
	  "videoFormat": "HD",
	  "startDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
	  "endDate" : "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
	   "image": "https://tradersize.com/img/logo.jpg",
	   "url": "https://tradersize.com",
	  "broadcastOfEvent": {
	    "@type": "SportsEvent",
	    "name": "<?=$jogo->event->name?>",
	    "description": "<?=$jogo->event->name?> - Saiba onde está o dinheiro",
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
                        		
                                <tr class="odd gradeA">
        
						            <td>
											
											<?
                                            $hora_ld = strtotime(substr($jogo->event->openDate,11,8)); // horario de londres
                                            $time = date("h:i:s", mktime($hora_ld -3 ));
                                            $data_eve = substr($jogo->event->openDate,0,10);
                                            $hora_eve = substr($jogo->event->openDate,11,8);
                                            ?>
                                             <? #=print_r($jogo)?>                                        
                                            <?
                                            $date_time  = new DateTime( $hora_eve );
                                            $diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
                                            #echo $diff->format( '%H:%i:%S' ); // 05:10:00
                                        ?>
                                            <?=$data_eve?>
                                            <?=$diff->format( '%H:%i:%S' )?>
    
	                                </td>
             
                                    <td>
                                        <a target='_blank' title="<?=$jogo->event->id?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>" style="color:#000;font-size:12px">
                                        <?=$jogo->event->name?>
                                        </a>
                                    </td>
                                    <td>
										<?=$this->padrao_model->get_by_matriz('id_competition',$meu->id_competicao,'betfair_competitions')->row()->nome?> 
                                    </td>
                                    <td>
                                   		<?=$jogo->marketCount?>
                        
                                    </td>
                                    
            
        </tr>
                                
							
                            							

	              <? } // x foreach ?>
                    
              </table>
                
			</section>
        
    
    
    <? } ?>    
				
            <section class="columns">
				<h2><span>Próximos Jogos</span></h2>
                
                <table class="pricing">
                        <tbody>
                        <!--
                        <tr>
                            <th>Data/Hora</th>
                            <th>Mercado</th>
                            <th>Evento</th>
                            <th>Correspondido</th>
                        </tr>
                        -->
                        </tbody>
                        <? 
						$n=0; foreach($proximos as $odd){  $n++;  $competition = ""; 
						$id_evento = $this->padrao_model->get_by_matriz('id_mkt',$odd->marketId,'odds_mkt')->row()->id_partida;
						$dd_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas')->row();
						$competition = $this->padrao_model->get_by_id($dd_evento->id_competition,'betfair_competitions')->row()->nome;
						if($odd->totalMatched > 1000 && ($dd_evento->evento != '') ){
						?>
                        <tr>
                        	<!--<div itemscope itemtype="http://schema.org/BroadcastEvent">-->
                        	<div >
                        		<meta itemprop="startDate" content="<?=$dd_evento->dt?>" />
	                            <td>
	                            	<? #=print_r($dd_evento)?>
	                            	<span itemprop="startDate" content="<?=$dd_evento->dt?>"><?=$dd_evento->dt?></span></td>
								<div>
									<!--<div itemprop="broadcastOfEvent" itemscope itemtype="http://schema.org/SportsEvent"> -->
		                            <td><span itemprop="name"><?=$odd->marketName?></span></td>
		                            <td>
		                            	<? #=$competition?> -

		                            </td>
		                            <td>
		                            	<a target="_blank" href="<?=base_url()?>bets/jogo/<?=url_title($dd_evento->evento)?>/<?=$id_evento?>">
		                            		<span itemprop="description"><?=$dd_evento->evento?></span>
		                            		</a>
		                            </td>
		                            <td>
		                            		$ <?=number_format($odd->totalMatched, 2, ',', '.')?>
		                            </td>
	                        	</div>
                        	</div>
                            
                        </tr>
                        <? } // x if ?>
                        <? } // x foreach ?>
                    
                    </table>


                <br>
                <h2><span>Outros Jogos</span></h2>
                <br>
				<div class="col2">
					
						<h3><span itemprop="name">Copa do Mundo 2018 Russia </span></h3>
						
						<div itemprop="competitor" itemscope itemtype="http://schema.org/BroadcastEvent">
					      <meta itemprop="name" content="UEFA Champions League" />
					    </div>
						<ul class="cat-list">
							<? foreach($copa2018->result() as $jogo){ 
								$times = explode(' v ',$jogo->evento); 
								?>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>

								<div itemscope itemtype="http://schema.org/BroadcastEvent">
								<li>
									<span itemprop="startDate" content="2015-07-05T15:30-07:00" style="font-size: 10px"><?=$jogo->inicio?></span>
									<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[0]?>" />
								    </div>


								    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[1]?>" />
								    </div>
									
									<a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>">  <span itemprop="description"><?=$jogo->evento?></span></a>
									
								</li>
								</div>
	                        <? } ?>
						</ul>
					
				</div><div class="col2">

					
						<h3><span itemprop="name">MLS </span></h3>
						<div itemprop="competitor" itemscope itemtype="http://schema.org/BroadcastEvent">
					      <meta itemprop="name" content="France Ligue 1" />
					    </div>
						<ul class="cat-list">
							<? foreach($mls->result() as $jogo){ 
								$times = explode(' v ',$jogo->evento); 
								?>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>
								<div itemscope itemtype="http://schema.org/BroadcastEvent">
								<li>
									<span itemprop="startDate" content="2015-07-05T15:30-07:00" style="font-size: 10px"><?=$jogo->inicio?></span>
									<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[0]?>" />
								    </div>

								    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[1]?>" />
								    </div>
									
									<a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>">  <span itemprop="description"><?=$jogo->evento?></span></a>
									
								</li>
								</div>
	                        <? } ?>
						</ul>
					
				</div><div class="col2" style="display: none;">
					
						<h3><span itemprop="name">Itália A </span></h3>
						<div itemprop="competitor" itemscope itemtype="http://schema.org/BroadcastEvent">
					      <meta itemprop="name" content="Itália A" />
					    </div>
						<ul class="cat-list">
							<? foreach($italia->result() as $jogo){ 
								$times = explode(' v ',$jogo->evento); 
								?>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>
								<div itemscope itemtype="http://schema.org/BroadcastEvent">
								<li>
									<span itemprop="startDate" content="2015-07-05T15:30-07:00" style="font-size: 10px"><?=$jogo->inicio?></span>
									<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[0]?>" />
								    </div>

								    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[1]?>" />
								    </div>
									
									<a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>">  <span itemprop="description"><?=$jogo->evento?></span></a>
									
								</li>
								</div>
	                        <? } ?>
						</ul>
					
				</div><div class="col2" style="display: none;">
					
						<h3><span itemprop="name">MLS </span></h3>
						<div itemprop="competitor" itemscope itemtype="http://schema.org/BroadcastEvent">
					      <meta itemprop="name" content="MLS" />
					    </div>
						<ul class="cat-list">
							<? foreach($mls->result() as $jogo){ 
								$times = explode(' v ',$jogo->evento); 
								?>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>
								<div itemscope itemtype="http://schema.org/BroadcastEvent">
								<li>
									<span itemprop="startDate" content="2015-07-05T15:30-07:00" style="font-size: 10px"><?=$jogo->inicio?></span>
									<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[0]?>" />
								    </div>

								    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[1]?>" />
								    </div>
									
									<a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>">  <span itemprop="description"><?=$jogo->evento?></span></a>
									
								</li>
								</div>
	                        <? } ?>
						</ul>
					
				</div>
                
			</section>
            
            
            <section class="columns">
				<div class="col2">
					
						<h3><span itemprop="name">Brasileiro A </span></h3>
						<div itemprop="competitor" itemscope itemtype="http://schema.org/BroadcastEvent">
					      <meta itemprop="name" content="Brasileiro A" />
					    </div>
						<ul class="cat-list">
							<? foreach($brasileirao->result() as $jogo){ 
								$times = explode(' v ',$jogo->evento); 
								?>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>
								<div itemscope itemtype="http://schema.org/BroadcastEvent">
								<li>
									<span itemprop="startDate" content="2015-07-05T15:30-07:00" style="font-size: 10px"><?=$jogo->inicio?></span>
									<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[0]?>" />
								    </div>

								    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[1]?>" />
								    </div>
									
									<a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>">  <span itemprop="description"><?=$jogo->evento?></span></a>
									
								</li>
								</div>
	                        <? } ?>
						</ul>
					
				</div><div class="col2">
					
						<h3><span itemprop="name">Brasileiro B </span></h3>
						<div itemprop="competitor" itemscope itemtype="http://schema.org/BroadcastEvent">
					      <meta itemprop="name" content="Brasileiro B" />
					    </div>
						<ul class="cat-list">
							<? foreach($brasileirao_b->result() as $jogo){ 
								$times = explode(' v ',$jogo->evento); 
								?>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>
								<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>
								<div itemscope itemtype="http://schema.org/BroadcastEvent">
								<li>
									<span itemprop="startDate" content="2015-07-05T15:30-07:00" style="font-size: 10px"><?=$jogo->inicio?></span>
									<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[0]?>" />
								    </div>

								    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[1]?>" />
								    </div>
									
									<a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>">  <span itemprop="description"><?=$jogo->evento?></span></a>
									
								</li>
								</div>
	                        <? } ?>
						</ul>
					
				</div>
                
			</section>
            
            
            <section class="columns" style="display: none;">
				
				<div class="col1">
					
						<h3><span itemprop="name">Copa do Mundo 2018 </span></h3>
						<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
					      <meta itemprop="name" content="Copa do Mundo 2018" />
					    </div>
						<ul class="cat-list">
							<? foreach($copa2018->result() as $jogo){ 
								$times = explode(' v ',$jogo->evento); 
								?>
								<div itemscope itemtype="http://schema.org/BroadcastEvent">
								<li>
									<span itemprop="startDate" content="2015-07-05T15:30-07:00" style="font-size: 10px"><?=$jogo->inicio?></span>
									<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[0]?>" />
								    </div>

								    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
								      <meta itemprop="name" content="<?=$times[1]?>" />
								    </div>
									
									<a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>">  <span itemprop="description"><?=$jogo->evento?></span></a>
									
								</li>
								</div>
	                        <? } ?>
						</ul>
					
                
			</section>
                        
			
            
            

			

			

			<section class="product-list-full">
				<h2  style="display:none"><span>Heading</span></h2>
				<ul style="display:none">
					<li>
						<div class="img"><a href="#"><img src="<?=base_url()?>images/temp/89.jpg" alt=""></a></div>
						<h3><a href="#">Aenean vulputate eleifend tellus</a></h3>
						<dl class="product-data">
							<dt>Category:</dt>
							<dd><a href="#">Dresses</a></dd>
							<dt>Type:</dt>
							<dd><a href="#">Leggins</a></dd>
							<dt>Color:</dt>
							<dd><a href="#">Black</a></dd>
							<dt>Brand:</dt>
							<dd><a href="#">Gucci</a></dd>
						</dl>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
					</li>
					<li>
						<div class="img"><a href="#"><img src="<?=base_url()?>images/temp/90.jpg" alt=""></a></div>
						<h3><a href="#">Aenean vulputate eleifend tellus</a></h3>
						<dl class="product-data">
							<dt>Category:</dt>
							<dd><a href="#">Dresses</a></dd>
							<dt>Type:</dt>
							<dd><a href="#">Leggins</a></dd>
							<dt>Color:</dt>
							<dd><a href="#">Black</a></dd>
							<dt>Brand:</dt>
							<dd><a href="#">Gucci</a></dd>
						</dl>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
					</li>
					<li>
						<div class="img"><a href="#"><img src="<?=base_url()?>images/temp/91.jpg" alt=""></a></div>
						<h3><a href="#">Aenean vulputate eleifend tellus</a></h3>
						<dl class="product-data">
							<dt>Category:</dt>
							<dd><a href="#">Dresses</a></dd>
							<dt>Type:</dt>
							<dd><a href="#">Leggins</a></dd>
							<dt>Color:</dt>
							<dd><a href="#">Black</a></dd>
							<dt>Brand:</dt>
							<dd><a href="#">Gucci</a></dd>
						</dl>
						<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas.</p>
					</li>
				</ul>
			</section>

			<? include("includes/front/mais_correspondidos.php"); ?>  
			
			<? #include("includes/front/classificacoes.php"); ?>  
		</section>
		
        <!-- menu-->
        <? include("includes/front/menu.php"); ?>
		
		classificacoes
        
		<a href="#top" class="go-top">Go to top of page</a>
	</section>
	<!-- footer -->
    <? include("includes/front/footer.php");?>
	</div>

	<script type="text/javascript" src="<?=base_url()?>js/front/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js/front/scripts.js"></script>
	<!--[if lt IE 9]>
		<script type="text/javascript" src="js/ie.js"></script>
	<![endif]-->
</body>

</html>