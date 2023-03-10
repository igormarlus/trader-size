<!DOCTYPE html> 
<html>
<head>

<meta property="og:url" content="<?=base_url()?>futebol/jogo/<?=url_title($dd->evento)?>/<?=$id_evento?>">
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

    <link rel="amphtml" href="<?=base_url()?>futebol/amp/<?=$this->uri->segment(3)?>/<?=$id_evento?>/">
    
    
    
	<meta charset="UTF-8">
	<title><?=$dd->evento?> - <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> |  Saiba onde está o dinheiro - Apostas - Bets</title>
    <meta name="title" content="<?=$dd->evento?> | <?=substr($dd->inicio,0,10)?> | Saiba onde está o dinheiro no jogo:<?=$dd->evento?>" />
    <meta name="description" content="Trader Size: <?=$dd->evento?> - <? if($champ->num_rows() > 0){?><?=$champ->row()->nome?><? } ?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> | Saiba onde estão as apostas - Bets no jogo: <?=$dd->evento?> "  />
	<meta name="keywords" content="<?=$dd->evento?>,Betfair, trader, trader esportivo, <?=$dd_evento->evento?>">
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


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6816270130378142",
    enable_page_level_ads: true
  });
</script>

</head>

<body><div class="home color-blue">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KFW8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) --
	<!-- HEADER -->
    <? include("includes/front/header.php"); ?>
	

	
    <?
		$times = explode(' x ',$dd->evento); 
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
			"description": " Mercados mais correspontidos (Matched) <?=$dd->evento?>",
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


	<!-- GOOGLE GALERY -->

	<section class="content reverse">
		<section class="main">
        	
			
            <section class="columns">
            	<? if($id_evento == 0){ ?>
            	<h2>Jogo Encerrado</h2>
            	<? }else{ ?>
            	<div vocab="">
            		<? if($champ->num_rows() > 0){?>
				  		<span property="name"><?=$champ->row()->nome?></span>
				  	<? }else{ ?>
				  		<span property="name"><?=$dd->evento?></span>
				  	<? } ?>
				  
				  <meta property="isLiveBroadcast" content="http://schema.org/True" />
				  <div property="broadcastOfEvent" typeof="SportsEvent">
				    <? if($champ->num_rows() > 0){?>
				  		<span property="name"><?=$champ->row()->nome?></span>
				  	<? }else{ ?>
				  		<span property="name"><?=$dd->evento?></span>
				  	<? } ?>


				    <div property="competitor" typeof="SportsTeam">
				      <meta property="name" content="<?=$times['0']?>" />

				    </div>
				    <div property="competitor" typeof="SportsTeam">
				      <meta property="name" content="<?=$times['1']?>" />
				    </div>

				    <meta property="startDate" content="<?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))
				    ?> <?=substr($dd->inicio,10,10)?>" />
				    <meta property="location" content="Betfair" />
				  </div>
				</div>
				<h1><span style="font-size: 14px" property="startDate" content="<?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=substr($dd->inicio,10,10)?>"><?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=substr($dd->inicio,10,10)?> </span> <br /> <?=$dd->evento?></h1>
                

				<?if($champ->num_rows() > 0){?>
                <h2><span property="description"><?=$champ->row()->nome?></span></h2>
                <? } ?>

                <? } // x  else if fim de jogo ?>
                
                
                <!--<a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142&redirecturl=https://www.betfair.com/sport/football/event?eventId=<?=$dd->id_evento?>">
                <h3 style="padding:20px;background-color:#fdb800;font-weight:bold">
                             Ver na Betfair - Sportbook </span>
                             </h3></a> -->
                    <a target="_blank" href="<?=base_url()?>">
                <h3 style="padding:20px;background-color:#fdb800;font-weight:bold;font-size:14px">
                             Software/Aplicação Web Betfair <br> Saiba Onde Está o Dinheiro nos Mercados. 
                             <strong style="color: #fff">Teste Grátis </strong>
                             </h3>

                    <h2><span>Mercados mais correspondidos:</span></h2>         
                	
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
                            
                            
                            
                            
                            
                            <?
                            $qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$mercado->marketId."' AND   tipo = 'back' AND selection_name <> '' "); 	
							#echo "<h2>".$qr_selecoes->num_rows()."</h2>";
							if($qr_selecoes->num_rows() > 0){ ?>
							<table class="pricing" style="width:100%;border:red 0px solid;">
                            <tbody><tr>
                                <th></th>
                                <th>back</th>
                                <th>Lay</th>
                            </tr>
							<? $s=0; foreach($qr_selecoes->result() as $selecao){ $s++;
								#$qr_num = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' "); 	
								include("includes/mysqli_con.php");
								$soma_back_sel_ci = $this->db->query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' order by id desc LIMIT 5  ");
								
								
								$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by id desc LIMIT 5  ");
								$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId." AND tipo = 'back' order by id desc LIMIT 5  ");
								$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
								$soma_total_back = mysqli_fetch_assoc($soma_back);
								$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
								
								
							?>
                            
                            <!--- LAY -->
											<?
                                            $soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId."  AND selection_id = ".$selecao->selection_id." AND tipo = 'lay' order by id desc LIMIT 5  ");
                                            $soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId." AND tipo = 'lay' order by id desc LIMIT 5  ");
                                            $soma_total_sel_lay = mysqli_fetch_assoc($soma_lay_sel);
											$soma_total_lay = mysqli_fetch_assoc($soma_lay);
											$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
                                            #echo number_format($pecentual_lay, 2, ',', '.').'%';
                                            ?>
                            <!--<p class="progress"><span class="fill"><span><?=$selecao->selection_name?> <?=number_format($pecentual_back, 2, ',', '.');?>%</span></span></p>
                            	<h6><?=$selecao->selection_name?> -  - <?=$soma_back_sel_ci->row()->soma?> <p class="price"> <span><?=$pecentual_back?>%</span> </p></h6>-->
                                
                                
                                
                                <tr>
                                    <td><?=$selecao->selection_name?></td>
                                    <td><?=number_format($pecentual_back, 2, ',', '.');?>%</td>
                                    <td style="background-color:#f7f7f7"><?=number_format($pecentual_lay, 2, ',', '.');?>%</td>
                                </tr>
                                
		
		
                                
                    <? } // x forach ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">$ <?=number_format($mercado->totalMatched, 2, ',', '.');?> </td>
                        </tr>
                    </tbody>
                    </table>
							<? }else{ // x if`num_rows ?>
                            <p>Dados privados  <a href="<?=base_url()?>" title="Ir para Trader Size" >Saiba Mais</a> </p>
                            <? } ?>
						<?
							
							?>
                            
                        <? } // x foreacdh ?>
                </div>       
                       <div class="col12">
                            <h3 title="">
                                <span>Betfair</span>
                                
                            </h3>
                            
                            <a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >
                            <img width="500px" alt="Betfair" src="<?=base_url()?>imagens/banner/banner-betfair.jpg" border=0 style="display:" ></img >
                            </a>
                            
                       </div>      
                	
                
                
				<div class="col12">
					<h3>Mais jogos dessa competição</h3>
					<ul class="cat-list">
						<? foreach($mais->result() as $jogo){ ?>
							<li><a href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div>
                
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
			
			<section class="columns">

				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<script>
				     (adsbygoogle = window.adsbygoogle || []).push({
				          google_ad_client: "ca-pub-6816270130378142",
				          enable_page_level_ads: true
				     });
				</script>
			</section>
            

			<? #include("includes/front/mais_correspondidos.php"); ?>  
		</section>
		
        <!-- menu-->
        <? include("includes/front/menu.php"); ?>
        
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