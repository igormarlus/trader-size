
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Software Trader Size BetFair - Trader Esportivo Futebol - Foco No Volume</title>
    <meta name="title" content="Trader Size BetFair - Foco No Volume" />
    <meta name="description" content="Software - Aplicação Online para Trader Esportivo Futebol Betfair" />
    <meta name="keywords" content="Betfair, Trader, Volume Trader" />
    <meta name="robots" content="index,follow" />
    <meta name="revisit-after" content="2 days" />
    <meta name="lomadee-verification" content="22481717" />
    <link rel="shortcut icon" href="<?php echo base_url()?>imagens/favicon.ico">
    
    
    <? if(base_url() == "http://www.xbitcompany.com/" || base_url() == "http://xbitcompany.com/"){ ?>
    	<link rel=”canonical” href="https://www.tradersize.com" />
    <? } ?>
<meta name="DC.title" content="Trader Size BetFair - Foco No Volume" />
    <meta name="contact" content="igor_marlus@yahoo.com.br"/>
    <meta name="url" content="https://www.tradersize.com" />
    <meta name="robots" content="index, follow"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="language" content="pt-br"/>
    <meta name="rating" content="general"/>
    <meta name="expires" content="Never">
    <meta name="company" content="Trader Size BetFair - Foco No Volume" />
    <!--
    <meta name="city" content="Recife" />
    <meta name="state" content="Pernambuco" />
    <meta name="country" content="Brasil" />
    <meta name="geo.region" content="BR-PE" />
    <meta name="geo.placename" content="Recife" />
    <meta name="geo.position" content="-8.038528584963244, -34.89220741256565" />
    -->
    
    <meta name="author" content="Igor Mrlus"/>
    <meta name="reply-to" content="igor@nuvemlab.com.br"/>
    <meta name="web_author" content="Igor Marlus"/>
    
    <!-- STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/global.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/pages/index.css" />
    
    <meta property="og:image" content="https://www.tradersize.com/img/logo.jpg" />
    
    
    
    
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="<?php echo base_url()?>" href="favicon.ico">	
	<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,400italic' rel='stylesheet' type='text/css'>-->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/motioncss.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/motioncss-widgets.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/responsive.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/animation.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/colors/color_nl.css">	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/rs-settings.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/magnific-popup.css">
    <meta name="google-site-verification" content="lBzT2iM0hr9HOxdkhWjeQ5GxTXzQ-vBX85WlMoes7HM" />
</head>

<body class="l-body">

	<!-- CANVAS -->
	<div class="l-canvas type_wide col_cont headerpos_fixed headertype_extended">
		<div class="l-canvas-h">

			<?php include('includes/site/header.php');?>

			<!-- MAIN -->
			<div class="l-main">
				<div class="l-main-h">
						
                        <!-- HOTS -->
                        <div class="l-submain">
							<div class="l-submain-h g-html">
								<h1 style="text-align: center;">Hots</h1>								
								<div class="g-hr type_short">
									<span class="g-hr-h">
										<i class="fa fa-star"></i>
									</span>
								</div>
                                <? 
								$qr_hots = $this->padrao_model->get_qr('odds_hot','desc','id',5);
								if($qr_hots->num_rows() > 0){
								?>
                                <table width="100%">
                                	<tr>
                                    	<th><strong>Evento</strong></th>
                                        <th><strong>Mercado</strong></th>
                                        <th><strong>Seleção</strong></th>
                                        <th><strong>Correspondido</strong></th>
                                    </tr>
                                <?	
									foreach($qr_hots->result() as $hot){ 
									$dd_evento = $this->padrao_model->get_by_matriz('id_evento',$hot->id_partida,'partidas')->row();
									$dd_mkt = $this->padrao_model->get_by_matriz('id_mkt',$hot->id_mkt,'mercados')->row();
									$qr_selecao = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot->id_mkt."' AND selection_id = '".$hot->selection_id."' AND selection_name <> '' LIMIT 1")->row();
								?>
										<tr>
											<td><?=$dd_evento->evento?></td>
                                            <td><?=$dd_mkt->name?></td>
                                            <td><?=$qr_selecao->selection_name?></td>
                                            <td> <?=$hot->tamanho?>%</td>
										</tr>
									<? } ?>
                                <? } ?>
                                </table>
							</div>
						</div>
                        <!--  X HOTS -->
                        
						<!-- Slider -->
						<div class="l-submain type_fullwidth border_none" style="display:none">
							<div class="l-submain-h g-html">
								<div class="g-cols">
									<div class="full-width">
										<div class="fullwidthbanner-container">
											<div class="fullwidthbanner">
												<ul>

													
		                                            <!-- SLIDE MOBILE SITE  -->
		                                            <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" data-thumb="<?php echo base_url()?>conteudo/campo2.jpeg"  data-saveperformance="off"  data-title="Slide">
		                                                
		                                                <!-- MAIN IMAGE -->
		                                                <img src="<?php echo base_url()?>conteudo/campo2.jpg"  alt="slide3"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" width="1024px">
		                                                
		                                                <!-- LAYER NR. 1 -->
		                                                <div class="tp-caption astra_bg_dark_heading_1 sfr" 
		                                                    data-x="0" 
		                                                    data-y="300"  
		                                                    data-speed="500" 
		                                                    data-start="800" 
		                                                    data-easing="easeOutExpo" 
		                                                    data-splitin="none" 
		                                                    data-splitout="none" 
		                                                    data-elementdelay="0" 
		                                                    data-endelementdelay="0" 
		                                                    data-end="8700" 
		                                                    data-endspeed="300" 
		                                                    style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">
		                                                </div>

		                                                <!-- LAYER NR. 2 -->
		                                                <div class="tp-caption astra_dark_big_text sfr" 
		                                                    data-x="0" 
		                                                    data-y="260"  
		                                                    data-speed="500" 
		                                                    data-start="1000" 
		                                                    data-easing="easeOutExpo" 
		                                                    data-splitin="none" 
		                                                    data-splitout="none" 
		                                                    data-elementdelay="0" 
		                                                    data-endelementdelay="0" 
		                                                    data-end="8700" 
		                                                    data-endspeed="300" 
		                                                    style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;display:none">Software/Aplicação Online para Trader Esportivo Futebol Betfair.
		                                                </div>

		                                                <div class="tp-caption sfb"
															data-x="0" 
		                                                    data-y="340"  
		                                                    data-speed="500" 
		                                                    data-start="1100" 
		                                                    data-easing="easeOutExpo" 
		                                                    data-splitin="none" 
		                                                    data-splitout="none" 
		                                                    data-elementdelay="0" 
		                                                    data-endelementdelay="0" 
		                                                    data-end="8700" 
		                                                    data-endspeed="300" style="display:none"> 
															<a class="g-btn type_primary size_big" href="<?php echo base_url()?>servicos/CriacaoDeSites">
															<span><i class="fa fa-check-square-o"></i> Saiba Mais</span>
															</a>
														</div>

		                                            </li>
		                                            
		                                            <!-- SLIDE MULTIPLOS DEVICES  -->
		                                            

													
		                                        </ul>
											</div>
										</div>
								
									</div>
								</div>
							</div>
						</div>
                        <div id="recursos"></div>

						<!-- Features -->
						<?php include('includes/site/features.php');?>										



						<!-- Serviços -->

						<div class="l-submain">
							<div class="l-submain-h g-html">
								<h1 style="text-align: center;">Diferencial do Software</h1>								
								<div class="g-hr type_short">
									<span class="g-hr-h">
										<i class="fa fa-star"></i>
									</span>
								</div>

								<?php include ("includes/site/servicos.php");?>							
                                
                                <?php include ("includes/site/servicos2.php");?>							

								<p style="text-align: center; padding:60px 0 0;">
									<a class="g-btn type_outline" href="<?php echo base_url()?>home/login">
									<span>Ver mais</span></a>
								</p>
							</div>
						</div>	

						<!-- Serviços -->



						<!-- Trabalhos recentes -->

						<div class="l-submain" style="display:none">

							<div class="l-submain-h g-html">

								<h1 style="text-align: center;">Parceria</h1>								

								<div class="g-hr type_short">
									<span class="g-hr-h">
										<i class="fa fa-star"></i>
									</span>
								</div>

								<div class="w-portfolio columns_3">

									<div class="w-portfolio-h">
										<div class="w-portfolio-list">
											<div class="w-portfolio-list-h">
												<? #foreach($portfolios->result() as $port){ ?>
                                                <div class="w-portfolio-item order_1 naming webdesign">
                                                    <div class="w-portfolio-item-h">
                                                        
                                                            <div class="w-portfolio-item-image">
                                                                <script type="text/javascript" src="http://ads.betfair.com/ad.aspx?pid=2816870&zid=1415"></script>
                                                                <div class="w-portfolio-item-meta">
                                                                    <h2 class="w-portfolio-item-title"><?=$port->titulo?></h2>
                                                                    <i class="fa fa-mail-forward"></i>
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="w-portfolio-item order_1 naming webdesign">
                                                    <div class="w-portfolio-item-h">
                                                        
                                                            <div class="w-portfolio-item-image">
                                                                <script type="text/javascript" src="http://ads.betfair.com/ad.aspx?pid=2816870&zid=1416"></script>
                                                                <div class="w-portfolio-item-meta">
                                                                    <h2 class="w-portfolio-item-title"><?=$port->titulo?></h2>
                                                                    <i class="fa fa-mail-forward"></i>
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="w-portfolio-item order_1 naming webdesign">
                                                    <div class="w-portfolio-item-h">
                                                        
                                                            <div class="w-portfolio-item-image">
                                                                <script type="text/javascript" src="http://ads.betfair.com/ad.aspx?pid=2816870&zid=1416"></script>
                                                                <div class="w-portfolio-item-meta">
                                                                    <h2 class="w-portfolio-item-title"><?=$port->titulo?></h2>
                                                                    <i class="fa fa-mail-forward"></i>
                                                                </div>
                                                            </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="w-portfolio-item order_1 naming webdesign">
                                                    <div class="w-portfolio-item-h">
                                                        <a class="w-portfolio-item-anchor" href="<?php echo base_url()?>novo/portfolio_cliente/<?=url_title($port->titulo)?>/<?=$port->id?>">
                                                            <div class="w-portfolio-item-image">
                                                                <img src="<?php echo base_url()?>img/servicos.jpg" alt="<?=$port->titulo?>"/>
                                                                <div class="w-portfolio-item-meta">
                                                                    <h2 class="w-portfolio-item-title"><?=$port->titulo?></h2>
                                                                    <i class="fa fa-mail-forward"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-portfolio-item order_1 naming webdesign">
                                                    <div class="w-portfolio-item-h">
                                                        <a class="w-portfolio-item-anchor" href="<?php echo base_url()?>novo/portfolio_cliente/<?=url_title($port->titulo)?>/<?=$port->id?>">
                                                            <div class="w-portfolio-item-image">
                                                                <img src="<?php echo base_url()?>img/servicos.jpg" alt="<?=$port->titulo?>"/>
                                                                <div class="w-portfolio-item-meta">
                                                                    <h2 class="w-portfolio-item-title"><?=$port->titulo?></h2>
                                                                    <i class="fa fa-mail-forward"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="w-portfolio-item order_1 naming webdesign">
                                                    <div class="w-portfolio-item-h">
                                                        <a class="w-portfolio-item-anchor" href="<?php echo base_url()?>novo/portfolio_cliente/<?=url_title($port->titulo)?>/<?=$port->id?>">
                                                            <div class="w-portfolio-item-image">
                                                                <img src="<?php echo base_url()?>img/servicos.jpg" alt="<?=$port->titulo?>"/>
                                                                <div class="w-portfolio-item-meta">
                                                                    <h2 class="w-portfolio-item-title"><?=$port->titulo?></h2>
                                                                    <i class="fa fa-mail-forward"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <? #} // x foreach ?>        
        
                                            </div>
										</div>
									</div>
								</div>

								<p style="text-align: center; padding:60px 0 0;"><a class="g-btn type_outline" href="<?php echo base_url()?>novo/portfolio"><span>Ver mais Telas</span></a></p>

							</div>
						</div>

						
						<?php #include ("includes/site/clientes.php");?>

						<?php #include("includes/site/newsletter.php");?>

					</div>
				</div>
			</div>
			<!-- /MAIN -->
		</div>
	</div>
	<!-- /CANVAS -->



<!-- FOOTER -->
<?php include('includes/site/footer2.php');?>

<!-- INÍCIO 

     JAVASCRIPT'S:
     ============================================== -->

     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery-1.9.1.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/g-alert.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.carousello.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.flexslider.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.isotope.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.magnific-popup.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.parallax.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.simpleplaceholder.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.smoothScroll.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.themepunch.plugins.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.themepunch.revolution.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/plugins.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/waypoints.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-lang.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-search.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-tabs.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-timeline.js"></script>

     <script>jQuery(window).load(function(){ jQuery('#parallax_section').parallax('50%', '-1.2'); });</script> 
     
     <!--Start of Zopim Live Chat Script
     <script type="text/javascript">
     window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
     d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
     _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
     $.src="//v2.zopim.com/?1bPzfTvgW1Zyf8QHkgcjJc5AizcX03UV";z.t=+new Date;$.
     type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
     </script>
     End of Zopim Live Chat Script-->

</body>
</html>

