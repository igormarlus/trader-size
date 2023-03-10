<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto:400,300,500,700&amp;subset=latin,latin-ext">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/bootstrap-fileinput/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/nvd3/nv.d3.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/libraries/OwlCarousel/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/realsite-admin.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/realsite.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/edit-dash.css">

    <title>    Xbitcompany </title>
</head>

<body class="    open hide-secondary-sidebar
">
    <div class="admin-wrapper">
        <?php include("includes/dash/menu.php");?>
        <!-- /.admin-navigation -->

        <div class="admin-content">
            <div class="admin-content-inner">
                <?php include("includes/dash/header.php"); ?>
                <!-- /.admin-content-header -->

                <div class="admin-content-main">
                    <div class="admin-content-main-inner">
                        <div class="container-fluid">
                                <div class="box">
                                	<h1 class="page-header mb60">Upgrade</h1>
    
   								
                                
                                
                                
                                
                                
                                <div class="pricing">
                                    <h2 class="page-header mb60">Tabela de Planos</h2>
                                
                                    <div class="row">
                                      <? if($dd->plano == 0){ ?>
											<? 
                                            foreach($planos->result() as $plano){ 
                                                if($plano->id == '1'){ //  mostra apenas o plano partnees
                                                if($plano->id == $dd->plano){ $atual = "popular"; }else{ $atual = ''; }
                                            ?>
                                            <div class="col-sm-6 col-md-12">
                                                <div class="pricing-col <?=$atual?>">
                                                    <div class="pricing-header">
                                                        <div class="pricing-title"><?=$plano->nome?></div><!-- /.pricing-title -->
                                                        <div class="pricing-value">$ <?=$plano->pontos?></div><!-- /.pricing-value -->
                                                        <div class="pricing-duration">por ano</div><!-- /.pricing-duration -->
                                                        <? if($dd->plano <= $plano->id){ ?>
                                                        	
                                                            <?  
															$where_plano = array('id_user' => $dd->id , 'id_plano' => $plano->id);
															$this->db->where($where_plano);
															$qr_plano = $this->db->get('user_upgrade');
															#echo "<h2 style='color:red'>".$qr_plano->num_rows()." | ".$dd->id." - ".$plano->id."</h2>";
															if($qr_plano->num_rows() == 0){
															?>
																<a href="<?=base_url()?>dash/set_plano/<?=$plano->id?>" class="btn">UPGRADE</a>
                                                            <? }else{ ?>`
                                                            	<p style="color:#06C"><strong>Aguardando Confirmação</strong></p>
                                                            <? } ?>
                                                        
                                                        
                                                           <!-- <a href="<?=base_url()?>dash/set_plano/<?=$plano->id?>" class="btn">UPGRADE</a> -->
                                                            
                                                            
                                                            
                                                        <? } ?>
                                                    </div><!-- /.pricing-header -->
                                    
                                                    <div class="pricing-content">
                                                        <ul>
                                                            <li><?=$plano->pontos?> pagamentos</li>
                                                            <li>10 Cursos</li>
                                                            <li>bônus Indi.</li>
                                                        </ul>
                                                    </div><!-- /.pricing-content -->
                                                </div><!-- /.pricing-col-->
                                            </div>
                                            <? } ?>
                                            <? } ?>
                                    	<?  } ?>
                                        
                                		<? 
										if($dd->plano > 0){
											foreach($planos->result() as $plano){ 
												if($plano->id <> '1'){ // n mostra o plano partnees
												if($plano->id == $dd->plano){ $atual = "popular"; }else{ $atual = ''; }
											?>
											<div class="col-sm-6 col-md-4">
												<div class="pricing-col <?=$atual?>">
													<div class="pricing-header">
														<div class="pricing-title"><?=$plano->nome?></div><!-- /.pricing-title -->
														<div class="pricing-value">$ <?=$plano->pontos?></div><!-- /.pricing-value -->
														<div class="pricing-duration">por ano</div><!-- /.pricing-duration -->
									
														<? if($dd->plano < $plano->id){ ?>
                                                        	<?  
															$where_plano = array('id_user' => $dd->id , 'id_plano' => $plano->id);
															$this->db->where($where_plano);
															$qr_plano = $this->db->get('user_upgrade');
															#echo "<h2 style='color:red'>".$qr_plano->num_rows()." | ".$dd->id." - ".$plano->id."</h2>";
															if($qr_plano->num_rows() == 0){
															?>
																<a href="<?=base_url()?>dash/set_plano/<?=$plano->id?>" class="btn">UPGRADE</a>
                                                            <? }else{ ?>`
                                                            	<p style="color:#06C"><strong>Aguardando Confirmação</strong></p>
                                                            <? } ?>
														<? } ?>
													</div><!-- /.pricing-header -->
									
													<div class="pricing-content">
														<ul>
															<li><?=$plano->pontos?> pagamentos</li>
															<li>10 Cursos</li>
															<li>bônus Indi.</li>
														</ul>
													</div><!-- /.pricing-content -->
												</div><!-- /.pricing-col-->
											</div>
											<? } ?>
											<? } ?>
                                        <? } ?>
                                
                                        
                                
                                        
                                    </div><!-- /.row -->
                                </div>
                                	
								</div><!-- /.box -->



<!-- /.center -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.admin-content-main-inner -->
                </div><!-- /.container-fluid -->
				<?php include("includes/dash/footer.php");?>
                <!-- /.admin-content-footer -->

            </div><!-- /.admin-content-main-inner -->
        </div><!-- /.admin-content -->
    </div><!-- /.admin-landing-wrapper -->

    <script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-transit/jquery.transit.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/transition.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/dropdown.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/collapse.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/libraries/autosize/jquery.autosize.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/isotope/dist/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/OwlCarousel/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery.scrollTo/jquery.scrollTo.min.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&amp;sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/infobox.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/markerclusterer.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/jquery-google-map.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/lib/d3.v3.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/nv.d3.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/examples/stream_layers.js"></script>

    <script type="text/javascript" src="<?=base_url()?>assets/js/realsite-admin.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/map.js"></script>

    
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39841036-7', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
