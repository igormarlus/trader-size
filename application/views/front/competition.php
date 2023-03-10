<!DOCTYPE html> 
<html>
<head>
	<meta charset="UTF-8">
	<title>Software Trader Size BetFair - Trader Esportivo Futebol - Foco No Volume</title>
    <meta name="title" content="Software Trader Size BetFair - Trader Esportivo Futebol - Foco No Volume" />
    <meta name="description" content="Software - Aplicação Online para Trader Esportivo Futebol Betfair" />
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
		<section class="main">
        	
            
			
            <section class="columns">
				<h2><span> Jogos <?=$competition->nome?></span></h2>
                
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
						$n=0; foreach($proximos as $odd){  $n++; 
						$id_evento = $this->padrao_model->get_by_matriz('id_mkt',$odd->marketId,'odds_mkt')->row()->id_partida;
						$dd_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas')->row();
						if($odd->totalMatched > 1000 && ($dd_evento->evento != '') ){
						?>
                        <tr>
                            <td><?=$dd_evento->dt?></td>
                            <td><?=$odd->marketName?></td>
                            <td>
                            	<a target="_blank" href="<?=base_url()?>futebol/jogo/<?=url_title($dd_evento->evento)?>/<?=$id_evento?>"><?=$dd_evento->evento?></a>
                            </td>
                            <td style="font-size:11px">$<?=number_format($odd->totalMatched, 2, ',', '.');?></td>
                        </tr>
                        <? } // x if ?>
                        <? } // x foreach ?>
                    
                    </table>
                <br>
                <h2><span>Outros Jogos</span></h2>
                <br>
				<div class="col3">
					<h3>UEFA Champions League </h3>
					<ul class="cat-list">
						<? foreach($uefa->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>France Ligue 1</h3>
					<ul class="cat-list">
                    	<? foreach($frances->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>Itália A</h3>
					<ul class="cat-list">
						<? foreach($italia->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div>
                
			</section>
            
            
            <section class="columns">
				<div class="col3">
					<h3>Brasileiro A</h3>
					<ul class="cat-list">
                    	<? foreach($brasileirao->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>Brasileiro B</h3>
					<ul class="cat-list">
						<? foreach($brasileirao_b->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div><div class="col3">
					<h3>Premier League</h3>
					<ul class="cat-list">
						<? foreach($premier_liga->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
                        <? } ?>
					</ul>
				</div>
                
			</section>
            
            
            <section class="columns">
				
				<div class="col3">
					<h3>Primeira Liga Portugal</h3>
					<ul class="cat-list">
                    	<? foreach($primeira_liga->result() as $jogo){ ?>
							<li><a title="<?=$jogo->inicio?>" href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
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
							<li><a title="<?=$jogo->inicio?>"href="<?=base_url()?>futebol/jogo/<?=url_title($jogo->evento)?>/<?=$jogo->id_evento?>"><?=$jogo->evento?></a></li>
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

			<section class="columns popular-objects">
				<h2><span>Mais Correspondidos</span></h2>
				<div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div>
					<a href="#">Under/Over 1.5</a><br><span class="price"><strong>10259,54</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">BTS</a><br><span class="price"><strong>139,99</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">Match Odds</a><br><span class="price"><strong>259,99</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">Under/Over 3.5</a><br><span class="price"><strong>259,99</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">Match Odds</a><br><span class="price"><strong>139,99</strong> $</span>
				</div>
				<div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div>
					<a href="#">Under/Over 1.5</a><br><span class="price"><strong>10259,54</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">BTS</a><br><span class="price"><strong>139,99</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">Match Odds</a><br><span class="price"><strong>259,99</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">Under/Over 3.5</a><br><span class="price"><strong>259,99</strong> $</span>
				</div><div class="col5">
					<div class="img"><a href="#"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#">Match Odds</a><br><span class="price"><strong>139,99</strong> $</span>
				</div>
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