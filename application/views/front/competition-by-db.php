<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
    <title>Jogos <? if($competition->nome == ''){ ?><? $nm_url = $this->uri->segment(3); echo str_replace("-"," ",$nm_url); ?> <? }else{ ?><?=$competition->nome?><? } ?></title>
    <meta name="title" content="Jogos <? if($competition->nome == ''){ ?><? $nm_url = $this->uri->segment(3); echo str_replace("-"," ",$nm_url); ?> <? }else{ ?><?=$competition->nome?><? } ?>" />
    <meta name="description" content="<? foreach($jogos->result() as $jogo_meta){ ?><?=$jogo_meta->evento?> | <? } ?>" />
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
</head>

<body><div class="home color-blue">
	<!-- HEADER -->
    <? include("includes/front/header.php"); ?>
	

	
    

	<section class="content reverse">
		<section class="main" style="padding: 1em">
        	
            
			
            <section class="columns">
				<h2>
                <span>Jogos 
					<? if($competition->nome == ''){ ?>
                     <?
                     $nm_url = $this->uri->segment(3);
					 echo str_replace("-"," ",$nm_url);
					 ?>
                    <? }else{ ?>
						<?=$competition->nome?>
                    <? } ?>
                    </span>
                </h2>
                
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
						$n=0; foreach($jogos->result() as $jogo){  $n++;  $times = explode(' v ',$jogo->evento); 
						$dd = $jogo;

						#$id_evento = $this->padrao_model->get_by_matriz('id_mkt',$odd->marketId,'odds_mkt')->row()->id_partida;
						#$dd_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas')->row();
						#if($odd->totalMatched > 1000 && ($dd_evento->evento != '') ){
						?>

						<?

		$times = explode(' v ',$dd->evento); 
	?>
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
	   "url": "https://tradersize.com",
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
	        "name": "<?=$times['0']?>"
	      },
	      {
	        "@type": "SportsTeam",
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

                        <tr>
                        	<!--<div itemscope itemtype="http://schema.org/BroadcastEvent">-->
                        		<div>
                        		<meta itemprop="startDate" content="<?=$jogo->inicio?>" />
                        		<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>

							    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>
                            <td><?=$jogo->inicio?></td>
                            <!--<td><?=$jogo->evento?></td>-->
                            <td>
                            	<!--<div itemprop="broadcastOfEvent" itemscope itemtype="http://schema.org/SportsEvent">-->
                            		<div itemprop="broadcastOfEvent">
                            		<meta itemprop="location" content="Betfair" />
                            	<a target="_blank" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><span itemprop="description"><?=$jogo->evento?></span></a> 
                            	
                            </div>
                            </td>
                           </div>
                        </tr>
                        <? #} // x if ?>
                        <? } // x foreach ?>
                    
                    </table>
                <br>
                <h2><span>Outros Jogos</span></h2>
                <br>
				<div class="col3">
					<h3>UEFA Champions League </h3>
					<ul class="cat-list">
						<? foreach($uefa->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>France Ligue 1</h3>
					<ul class="cat-list">
                    	<? foreach($frances->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>Itália A</h3>
					<ul class="cat-list">
						<? foreach($italia->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div>
                
			</section>
            
            
            <section class="columns">
				<div class="col3">
					<h3>Brasileiro A</h3>
					<ul class="cat-list">
                    	<? foreach($brasileirao->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>Brasileiro B</h3>
					<ul class="cat-list">
						<? foreach($brasileirao_b->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>Premier League</h3>
					<ul class="cat-list">
						<? foreach($premier_liga->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div>
                
			</section>
            
            
            <section class="columns">
				
				<div class="col3">
					<h3>Primeira Liga Portugal</h3>
					<ul class="cat-list">
                    	<? foreach($primeira_liga->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>MLS</h3>
					<ul class="cat-list">
						<? foreach($mls->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>Amistoso</h3>
					<ul class="cat-list">
						<? foreach($amistoso->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>bets/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
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