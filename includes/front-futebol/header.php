<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder i-plain"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a itemprop="url" href="<?=base_url()?>bets" class="standard-logo"  data-dark-logo="<?=base_url()?>logo/logo-face.png"><img itemprop="logo image" src="<?=base_url()?>logo/logo-face.png" alt="Trader Size Logo"></a>
						<a href="<?=base_url()?>bets" class="retina-logo" data-dark-logo="<?=base_url()?>img/logo-dash.png"><img src="<?=base_url()?>img/logo-login.png" alt="Trader Size Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="one-page-menu">
							<? if(!$this->session->userdata('id')){ ?>
							<li class="current"><a href="<?=base_url()?>futebol" data-href="#section-home"><div><i class="icon-screen i-alt"></i>Home</div></a></li>
							<li class="current"><a href="<?=base_url()?>home/login" data-href="#section-home"><div><i class="icon-ok"></i>Login</div></a></li>
							<li><a href="<?=base_url()?>futebol" target="_blank" ><div> <i class="icon-share i-alt"></i>Próximos Jogos</div></a></li>
							<li><a href="<?=base_url()?>futebol/filtro_odds" target="_blank"><div><i class="icon-search3 i-alt"></i>Filtro de Odds</div></a></li></li>
							<li class="current"><a href="http://tradersize.com/betfair/sobre-o-trader-size/" target="_blank"><div><i class="icon-plus"></i>Sobre</div></a></li>
							<li><a target="_blank" href="http://tradersize.com/betfair/2018/05/22/como-usar-a-betfair-tradersize/" ><div><i class="icon-book3"></i>Como Usar</div></a></li>
							<? }else{ ?>
								<li><a href="<?=base_url()?>"><div><i class="icon-user i-alt"></i> Minha Conta</div></a></li>
								<li><a href="<?=base_url()?>futebol"><div><i class="icon-share i-alt"></i> Próximos Jogos</div></a></li>
								<li><a href="<?=base_url()?>futebol/filtro_odds" target="_blank"><div><i class="icon-search3 i-alt"></i>Filtro de Odds</div>
								
								
								<li><a href='<?=base_url()?>bet/sair'> <div> Logout</div></a></li>

							<? } ?>
						</ul>
						<div id="top-search">
							<div class="fbox-icon">
							<a href="#" id="top-search-trigger"><i class="icon-search3  i-plain"></i><i class="icon-line-cross"></i></a>
							</div>
							<form action="<?=base_url()?>futebol/q" method="post">
								<input name="q" class="form-control" value="" placeholder="Search..." type="text">
							</form>
						</div>
						<? if (!$this->session->userdata('id')){ ?>
						<div id="top-cart" class="">
							<a href="#" id="top-cart-trigger"><i class="icon-money"></i><span>3</span></a>
							<div class="top-cart-content">
								<div class="top-cart-title">
									<h4>Créditos</h4>
								</div>
								<div class="top-cart-items">
									<div class="top-cart-item clearfix">
										<!--
										<div class="top-cart-item-image">
											<a href="#"><img src="images/shop/small/1.jpg" alt="Blue Round-Neck Tshirt"></a>
										</div>
									-->
										<div class="top-cart-item-desc">
											<a href="#">Use o botão refresh para ver as porcentagens dos mercados.</a>
											<!--<span class="top-cart-item-price">$19.99</span>
											<span class="top-cart-item-quantity">x 2</span>-->
										</div>
									</div>
								</div>
								<div class="top-cart-action clearfix" style="">
									
									<button class="button button-3d button-small nomargin fright button-green">Refresh</button>
								</div>
							</div>
						</div>
						<? } ?>



						

					</nav><!-- #primary-menu end -->

				</div>

			</div>
		</header><!-- #header end -->