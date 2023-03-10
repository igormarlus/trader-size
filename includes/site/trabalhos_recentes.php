<div class="l-submain">
	<div class="l-submain-h g-html">
	
		<h1 style="text-align: center;">Trabalhos Recentes</h1>						
		
		<div class="g-hr type_short">
			<span class="g-hr-h">
				<i class="fa fa-star"></i>
			</span>
		</div>
		
		<div class="w-portfolio columns_4">
			<div class="w-portfolio-h">
				<div class="w-portfolio-list">
					<div class="w-portfolio-list-h">

						<? foreach($portfolios->result() as $port){ ?>
						<div class="w-portfolio-item order_1 naming webdesign">
							<div class="w-portfolio-item-h">
								<a class="w-portfolio-item-anchor" href="<?php echo base_url()?>novo/portfolio_cliente/<?=url_title($port->titulo)?>/<?=$port->id?>">
									<div class="w-portfolio-item-image">
										<img src="<?php echo base_url().$port->imagem?>" alt="<?=$port->titulo?>"/>
										<div class="w-portfolio-item-meta">
											<h2 class="w-portfolio-item-title"><?=$port->titulo?></h2>
											<i class="fa fa-mail-forward"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
                        <? } // x foreach ?>
                        
                        <!--        
						<div class="w-portfolio-item">
							<div class="w-portfolio-item-h">
								<a class="w-portfolio-item-anchor" href="project-another-slider.html">
									<div class="w-portfolio-item-image">
										<img src="<?php echo base_url()?>img/placeholder/500x500.gif" alt=""/>
										<div class="w-portfolio-item-meta">
											<h3 class="w-portfolio-item-title">Business Solutions</h3>
											<i class="fa fa-mail-forward"></i>
										</div>
									</div>
								</a>
							</div>
						</div>

						<div class="w-portfolio-item">
							<div class="w-portfolio-item-h">
								<a class="w-portfolio-item-anchor" href="project-another-slider.html">
									<div class="w-portfolio-item-image">
										<img src="<?php echo base_url()?>img/placeholder/500x500.gif" alt=""/>
										<div class="w-portfolio-item-meta">
											<h3 class="w-portfolio-item-title">Custom Templates</h3>
											<i class="fa fa-mail-forward"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="w-portfolio-item">
							<div class="w-portfolio-item-h">
								<a class="w-portfolio-item-anchor" href="project-another-slider.html">
									<div class="w-portfolio-item-image">
										<img src="<?php echo base_url()?>img/placeholder/500x500.gif" alt=""/>
										<div class="w-portfolio-item-meta">
											<h3 class="w-portfolio-item-title">Website Design</h3>
											<i class="fa fa-mail-forward"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
						<div class="w-portfolio-item">
							<div class="w-portfolio-item-h">
								<a class="w-portfolio-item-anchor" href="project-another-slider.html">
									<div class="w-portfolio-item-image">
										<img src="<?php echo base_url()?>img/placeholder/500x500.gif" alt=""/>
										<div class="w-portfolio-item-meta">
											<h3 class="w-portfolio-item-title">Old Town Street</h3>
											<i class="fa fa-mail-forward"></i>
										</div>
									</div>
								</a>
							</div>
						</div>-->
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="g-hr type_short">
			<span class="g-hr-h">
				<i class="fa fa-star"></i>
			</span>
		</div>
		
		<p style="text-align: center;"><a class="g-btn type_primary" href="<?php echo base_url()?>"><i class="fa fa-briefcase"></i>Ver Portfólio Completo</a></p>
	
	</div>
</div>