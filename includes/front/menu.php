<aside>
			<section>
				<h3><span>Home</span></h3>
				<ul>
					<li><a href="<?=base_url()?>bets">Início</a> </li>
                    <li><a href="<?=base_url()?>home/cadastro">Cadastro</a> </li>
				</ul>
			</section>
            <section>
				<h3><span>Principais Competições</span></h3>
				<ul>
					<li><a href="<?=base_url()?>futebol/campeonato/UEFA-Champions-League/228">UEFA Champions League</a> </li>
					<li><a href="<?=base_url()?>futebol/campeonato/brasileiro-serie-a/13">Brasileiro Série A</a> </li>
					<li><a href="<?=base_url()?>futebol/campeonato/primeira-liga/99">Primeira Liga</a> </li>
                    <li><a href="<?=base_url()?>futebol/campeonato/French-Ligue-1/55">French Ligue 1</a> </li>
					<li><a href="<?=base_url()?>futebol/campeonato/Premier-League/10932509">Premier League</a> </li>
                    <li><a href="<?=base_url()?>futebol/campeonato/la-liga/4905">La liga</a> </li>
                    
					
				</ul>
			</section>
            <!--
            <section>
				<h3><span>Destaque</span></h3>
				<ul class="recent-comments">
					<li>
						<a href="#"><img src="<?=base_url()?>img/bola_icon.png" alt="Jogo"></a>
						<p class="comment-head"><span class="who"><a href="#">Paris St-G v Anderlecht</a></span> </p>
						<p>10/11/2017</p>
					</li>
                    <li>
						<a href="#"><img src="<?=base_url()?>img/bola_icon.png" alt="Jogo"></a>
						<p class="comment-head"><span class="who"><a href="#">Lyon v Everton</a></span> </p>
						<p>10/11/2017</p>
					</li>
                    <li>
						<a href="#"><img src="<?=base_url()?>img/bola_icon.png" alt="Jogo"></a>
						<p class="comment-head"><span class="who"><a href="#">Braga v Chaves</a></span> </p>
						<p>10/11/2017</p>
					</li>
				</ul>
			</section>
	-->
            
            <section>
				<h3><span>Todas Competições</span></h3>
				<ul>
                	<? foreach($campeonatos as $dd){ ?>                    
						<li><a href="<?=base_url()?>futebol/campeonato/<?=url_title($dd->competition->name)?>/<?=$dd->competition->id?>"><?=$dd->competition->name?></a></li>
                    <? }  ?>
				</ul>
			</section>
            
         
		</aside>