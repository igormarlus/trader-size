<div class="widget widget_links clearfix">

	<h4>Destaque</h4>
	<ul itemscope itemtype="https://schema.org/WebPage">
		<li>
				<a href="https://tradersize.com/futebol/competition/copa-Sao-Paulo-2019/823332">
					<strong itemprop="keywords"><i class="icon-star"></i> Copa São Paulo 2019 - Copinha </strong>
				</a>
			</li>
		<li><a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/UEFA-Champions-League/228"><i class="icon-star"></i> UEFA Champions League</a> </li>
		<li><a itemprop="relatedLink" href="<?=base_url()?>bets/competition/Friendlies-Club/8616295"> <i class="icon-globe"></i> Friendlies Club</a> </<li>
		<!--
		<li><a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/Copa-Libertadores/62815">Copa Libertadores</a> </<li>	
		<!--	
		<li><a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/brasileiro-serie-a/13" >Brasileiro Série A</a> </li>
		<li><a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/brasileiro-serie-b/321319" >Brasileiro Série B</a> </li>
	-->
	</ul>	

	<br />
		<h5>Futebol Internacional</h5>
	<ul itemscope itemtype="https://schema.org/WebPage">

		
		
		<li data-animate="slideInRight"><img alt="La Liga" src="//flagpedia.net/data/flags/mini/es.png" width="30" height="20" /> <a href="<?=base_url()?>bets/competition/Spanish-La-Liga/117">  Spanish La Liga </a> </li>		
		
		<li data-animate="slideInRight"><img alt="La Liga" src="//flagpedia.net/data/flags/mini/de.png" width="30" height="20" />
				<a href="<?=base_url()?>futebol/competition/German-Bundesliga-1/59">
					<span itemprop="keywords"> German Bundesliga 1</span>
					
				</a>
			</li>

		<li data-animate="slideInRight"><img alt="Italy" src="//flagpedia.net/data/flags/mini/it.png" width="30" height="20" /> <a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/primeira-liga/81" >Italy</a> </li>

		<li data-animate="slideInRight"><img alt="Premier League" src="//flagpedia.net/data/flags/mini/pt.png" width="30" height="20" />
			<a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/primeira-liga/99" >Primeira Liga
			</a> 
		</li data-animate="slideInRight">
        <li><img alt="France" src="//flagpedia.net/data/flags/mini/fr.png" width="30" height="20" /> <a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/French-Ligue-1/55" itemprop="keywords">French Ligue 1</a> </li>

		<li data-animate="slideInRight"><img alt="Premier League" src="//flagpedia.net/data/flags/mini/gb.png" width="30" height="20" /> <a itemprop="relatedLink" href="<?=base_url()?>futebol/competition/Premier-League/10932509" itemprop="keywords">Premier League</a> </li>

		
		<!--<li><a href="<?=base_url()?>futebol/competition/Premier-League1/35" >Premier League 1 </a> </li>
		<li><a href="<?=base_url()?>futebol/competition/Premier-League2/37" >Premier League 2 </a> </li> -->

		<li data-animate="slideInRight"><img alt="Premier League" src="//flagpedia.net/data/flags/mini/ru.png" width="30" height="20" /> <a href="<?=base_url()?>futebol/competition/Russian-Division-1/880458"> Russian Division 1 </a> </li>


        
	</ul>

</div>
<? if($this->uri->segment(2) != "competition"){ ?>
<div class="widget widget_links clearfix">

	<h4>Todas as Competições</h4>
	<ul>
		<? foreach($campeonatos as $dd){ ?>                    
			<li data-animate="flipInY">
				<a  href="<?=base_url()?>futebol/competition/<?=url_title($dd->competition->name)?>/<?=$dd->competition->id?>">
					<span itemprop="keywords"><?=$dd->competition->name?></span>
					
				</a>
			</li>
        <? }  ?>
	</ul>

</div>
<? } ?>
