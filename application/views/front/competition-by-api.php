<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
    <title>Próximos Jogos Futebol <? if($competition->nome == ''){ ?><? $nm_url = $this->uri->segment(3); echo str_replace("-"," ",$nm_url); ?> <? }else{ ?><?=$competition->nome?><? } ?> Apostas Futebol Online </title>
    <meta name="title" content="Próximos Jogos Futebol <? if($competition->nome == ''){ ?><? $nm_url = $this->uri->segment(3); echo str_replace("-"," ",$nm_url); ?> <? }else{ ?><?=$competition->nome?><? } ?>" />
    <meta name="description" content="Apostas Esportivas Online Futebol <?=$competition->nome?> 
    <?  foreach($jogos as $jogo_meta){ ?><?=str_replace(" v "," x ",$jogo_meta->event->name)?> | <? } ?>" 
    />

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
                        
						<? $n=0; 
							foreach($jogos as $jogo){  

								$n++;  
								$times = explode(' v ',$jogo->event->name);

								#$dd = $jogo;
								$dd = $this->padrao_model->get_by_matriz('id_evento',$jogo->event->id,'partidas')->row();	
								$times = explode(' v ',$jogo->event->name); 

							?>

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
										"name":"<?=$competition->nome?>"
									}],
									"Name":"<?=$jogo->event->name?>",
									"description": " Mercados mais correspontidos (Matched) <?=$jogo->event->name?>. ",
									//"startdate":"2018-06-25T18:00:00",
									"startDate": "<?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?>",
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

                        <tr>
                        	<!--<div itemscope itemtype="http://schema.org/BroadcastEvent">-->
                        		<div>
                        		
                        		<div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[0]?>" />
							    </div>

							    <div itemprop="competitor" itemscope itemtype="http://schema.org/SportsTeam">
							      <meta itemprop="name" content="<?=$times[1]?>" />
							    </div>
                            <td><?=substr($jogo->event->openDate,0,10)?> <?=substr($jogo->event->openDate,10,10)?></td>
                            <!--<td><?=$jogo->evento?></td>-->
                            <td>
                            	<!--<div itemprop="broadcastOfEvent" itemscope itemtype="http://schema.org/SportsEvent">-->
                            		<div itemprop="broadcastOfEvent">
                            		<meta itemprop="location" content="Betfair" />
                            		<a href="<?=base_url()?><?=$this->uri->segment(1)?>/jogo/<?=url_title($jogo->event->name)?>/<?=$jogo->event->id?>" class="">
                            			<?=$jogo->event->name?>

                            		</a>
               
                            	
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