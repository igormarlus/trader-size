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
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/edit-dash.css">
    <title>    Xbitcompany </title>
</head>

<body class="open hide-secondary-sidebar">
    <div class="admin-wrapper">
        <?php include("includes/dash/menu.php");?>
        <!-- /.admin-navigation -->

        <div class="admin-content">
            <div class="admin-content-inner">
                <?php include("includes/dash/header.php"); ?>
                <!-- /.admin-content-header -->

                <div class="admin-content-main" style="background-image:url(<?=base_url()?>img/bg-backoffice.jpg);background-position:50%;background-size:100%;background-repeat:no-repeat">
                    <div class="admin-content-main-inner">
                        <div class="container-fluid">
                        	
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <div class="activity">
                                        <ul>
                                            <li>
                                                <div class="icon orange">
                                                    <i class="fa fa-cc-mastercard"></i>
                                                </div><!-- /.icon -->
                                    
                                                <div class="content">
                                                    Saldo: <strong>R$ 500,00</strong>
                                                </div><!-- /.content -->
                                            </li>
                                        </ul>
                                    </div>
                              </div>
                    		
                            <div class="col-sm-12 col-md-3">
                                    <div class="activity">
                                        <ul>
                                            <li>
                                                <div class="icon green">
                                                    <i class="fa fa-pencil"></i>
                                                </div><!-- /.icon -->
                                    
                                                <div class="content">
                                                    Coins: <strong>180</strong>
                                                    
                                                </div><!-- /.content -->
                                            </li>
                                        </ul>
                                    </div>
                              </div>
                            
                                <div class="col-sm-12 col-md-3">
                                    <div class="activity">
                                        <ul>
                                            <li>
                                                <div class="icon cyan">
                                                    <i class="fa fa-users"></i>
                                                </div><!-- /.icon -->
                                    
                                                <div class="content">
                                                    Rede: <strong>8</strong>
                                                </div><!-- /.content -->
                                            </li>
                                        </ul>
                                    </div>
                              </div>
                              <div class="col-sm-12 col-md-3">
                                    <div class="activity">
                                        <ul>
                                            <li>
                                                <div class="icon red">
                                                    <i class="fa fa-times"></i>
                                                </div><!-- /.icon -->
                                    
                                                <div class="content">
                                                    Pendentes (diretos): <strong>5</strong> 
                                                </div><!-- /.content -->
                                            </li>
                                        </ul>
                                    </div>
                              </div>
                              
                              </div>
                    		  <br />
                              
                              <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="activity">
                                        <ul>
                                            <li>
                                                <div class="icon green">
                                                    <i class="fa fa-users"></i>
                                                </div><!-- /.icon -->
                                    
                                                <div class="content">
                                                    Esquerda: <strong><?=$bonus_e-$bonus_e2?></strong>
                                                </div><!-- /.content -->
                                            </li>
                                        </ul>
                                    </div>
                              </div>
                    		
                            <div class="col-sm-12 col-md-6">
                                    <div class="activity">
                                        <ul>
                                            <li>
                                                <div class="icon green">
                                                    <i class="fa fa-users"></i>
                                                </div><!-- /.icon -->
                                    
                                                <div class="content">
                                                    Direita: <strong><?=$bonus_d-$bonus_d2?></strong>
                                                    
                                                </div><!-- /.content -->
                                            </li>
                                        </ul>
                                    </div>
                              </div>
                            
                            
                              
                              </div>
                              
                              <br />
                              
                              <div class="row">
                                  <div class="col-sm-12 col-md-12">
                                        <div class="activity">
                                            <ul>
                                            	<? if($dd->plano == '0'){ ?>
                                                    <li>
                                                        <div class="icon red">
                                                            <i class="fa fa-times"></i>
                                                        </div><!-- /.icon -->
                                            
                                                        <div class="content">
                                                            Pagamento pendente. <a href="<?=base_url()?>dash/upgrade">clique aqui</a> para efetuar.
                                                        </div><!-- /.content -->
                                                    </li>
                                                <? } ?>
                                                <? if($dd->senha2 == ''){ ?>
                                                    <li>
                                                        <div class="icon red">
                                                            <i class="fa fa-times"></i>
                                                        </div><!-- /.icon -->
                                            
                                                        <div class="content">
                                                            Senha secundária. <a href="<?=base_url()?>dash/minha_conta#senha2">clique aqui</a> para editar.
                                                        </div><!-- /.content -->
                                                    </li>
                                                <? } ?>
                                                <? if($dd->verificado == '0'){ ?>
                                                    <li>
                                                        <div class="icon red">
                                                            <i class="fa fa-times"></i>
                                                        </div><!-- /.icon -->
                                            
                                                        <div class="content">
                                                            Dados cadastrais incompletos. Faça o Upload dos seus documentos.
                                                        </div><!-- /.content -->
                                                    </li>
                                                <? } ?>
                                                <? if($dd->endereco == '' && $dd->endereco == 'cep' ){ ?>
                                                    <li>
                                                        <div class="icon red">
                                                            <i class="fa fa-times"></i>
                                                        </div><!-- /.icon -->
                                            
                                                        <div class="content">
                                                            Dados cadastrais. Endereço incompleto.
                                                        </div><!-- /.content -->
                                                    </li>
                                                <? } ?>
                                                
                                            </ul>
                                        </div>
                                  </div>
                              </div>
                              
                              
                              
                              
                              
                              <br />
                              <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="activity">
                                            <ul>
                                                <li>
                                                    <div class="content">
	                                                    <h5>Link de Indicação.</h5>
                                                        <a href="<?=base_url()?>home/cadastro/<?=$this->session->userdata('login')?>" target="_blank">
	                                                        <?=base_url()?>home/cadastro/<?=$this->session->userdata('login')?>
                                                        </a>
                                                    </div><!-- /.content -->
                                                </li>
                                            </ul>
                                        </div>
                                  </div>
                             
                                    <div class="col-sm-12 col-md-6">
                                        <div class="activity">
                                            <ul>
                                                <li>    
                                                <div class="content">
                                                <h5>Alterar Lado de Cadastro.</h5>
													<? if($dd->lado == 'e'){ ?>
                                                        Esquerda
                                                    <? }else{  ?>
                                                        Direita
                                                    <? } ?>
                                                     -
                                                    <a href="<?=base_url()?>dash/set_lado/" >
                                                        Alterar
                                                    </a>
                                                    
                                                        
                                                   
                                                 </div>   
                                                </li>
                                            </ul>
                                        </div>
                                  </div>
								</div>                              
                            
                        	
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        
                                        <? if($this->session->userdata('nivel') == 10){ ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div id="chart">
                                                    <svg></svg>
                                                </div><!-- /#chart -->
                                            </div>
                                        </div>
                                        <? } ?>
                                        
                                        <div class="row" style="display:none">
                                        <h3 class="page-header">Minha Rede (<?=$rede_e->num_rows()?>)</h3>
                                            <?php
                                            /*
                                            $f = 0;
                                            while($f < 1){
                                                #echo "<h1>Linha ".$f."</h1>";
                                                #$qr = $this->usuarios_model->get_rede($id_user,$lado);		
                                                if($rede_e->num_rows() == 0){
                                                    #echo $id_user." - "."<br />";
                                                    #echo "<p>nivel 1 (".$f.")</p>";
                                                    return $id_user;
                                                    $f++;
                                                    #return false;
                                                    #break;
                                                }else{	
                                                        $id_user = $rede_e->row()->id_user;
                                                        $dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
                                                ?>		
                                                <div class="col-sm-4 col-md-6 col-lg-4">
                                                    <div class="property-preview">
                                                        <div class="property-preview-image">
                                                            <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user?>" class="property-preview-action">
                                                                <i class="fa fa-times"></i>
                                                            </a><!-- /.property-preview-action -->
                                            
                                                            <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user?>">
                                                                <img src="assets/img/tmp/medium/1.jpg" alt="">
                                                            </a>
                                                        </div><!-- /.property-preview-image -->
                                            
                                                        <div class="property-preview-content">
                                                            <h2><a href="admin-dashboard.html#"><?=$dd_user->login?></a></h2>
                                                            <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user?>" class="property-preview-action-secondary">Ver Rede</a>
                                                        </div><!-- /.property-preview-content -->
                                                    </div><!-- /.property-preview -->
                                                </div><!-- /.col-* -->			
                                                    
                                                <?    
                                                }
                                            }  */ 
                                            ?>
                                                
                                            
                                            <div class="col-sm-4 col-md-6 col-lg-4" style="display:none">
                                                    <div class="property-preview">
                                                        <div class="property-preview-image">
                                                            <a href="<?=base_url()?>dash/rede_binaria/<?=$id_user?>" class="property-preview-action">
                                                                <i class="fa fa-times"></i>
                                                            </a><!-- /.property-preview-action -->
                                            
                                                            <a href="<?=base_url()?>dash/rede_binaria/<? #=$id_user?>">
                                                                <img src="assets/img/tmp/medium/1.jpg" alt="">
                                                            </a>
                                                        </div><!-- /.property-preview-image -->
                                            
                                                        <div class="property-preview-content">
                                                            <h2><a href="admin-dashboard.html#"><? #=$dd_user->login?></a></h2>
                                                            <a href="<?=base_url()?>dash/rede_binaria/<? #=$id_user?>" class="property-preview-action-secondary">Ver Rede</a>
                                                        </div><!-- /.property-preview-content -->
                                                    </div><!-- /.property-preview -->
                                                </div><!-- /.col-* -->			
                                            
                                            <div class="col-sm-4 col-md-6 col-lg-4" style="">
                                                <div class="property-preview">
                                                    <div class="property-preview-image">
                                                        <a href="admin-dashboard.html#" class="property-preview-action">
                                                            <i class="fa fa-times"></i>
                                                        </a><!-- /.property-preview-action -->
                                        
                                                        <a href="admin-dashboard.html#">
                                                            <img src="assets/img/tmp/medium/2.jpg" alt="">
                                                        </a>
                                                    </div><!-- /.property-preview-image -->
                                        
                                                    <div class="property-preview-content">
                                                        <h2><a href="admin-dashboard.html#">Login</a></h2>
                                                        <a href="admin-dashboard.html#" class="property-preview-action-secondary">Ver Rede</a>
                                                    </div><!-- /.property-preview-content -->
                                                </div><!-- /.property-preview -->
                                            </div><!-- /.col-* -->
                                        
                                            <div class="col-sm-4 col-md-6 col-lg-4" style="">
                                                <div class="property-preview">
                                                    <div class="property-preview-image">
                                                        <a href="admin-dashboard.html#" class="property-preview-action">
                                                            <i class="fa fa-times"></i>
                                                        </a><!-- /.property-preview-action -->
                                        
                                                        <a href="admin-dashboard.html#">
                                                            <img src="assets/img/tmp/medium/3.jpg" alt="">
                                                        </a>
                                                    </div><!-- /.property-preview-image -->
                                        
                                                    <div class="property-preview-content">
                                                        <h2><a href="admin-dashboard.html#">Login</a></h2>
                                                        <a href="admin-dashboard.html#" class="property-preview-action-secondary">Ver Rede</a>
                                                    </div><!-- /.property-preview-content -->
                                                </div><!-- /.property-preview -->
                                            </div><!-- /.col-* -->
                                        
                                            <div class="col-sm-4 col-md-6 col-lg-4">
                                                <div class="property-preview">
                                                    <div class="property-preview-image">
                                                        <a href="admin-dashboard.html#" class="property-preview-action">
                                                            <i class="fa fa-times"></i>
                                                        </a><!-- /.property-preview-action -->
                                        
                                                        <a href="admin-dashboard.html#">
                                                            <img src="assets/img/tmp/medium/4.jpg" alt="">
                                                        </a>
                                                    </div><!-- /.property-preview-image -->
                                        
                                                    <div class="property-preview-content">
                                                        <h2><a href="admin-dashboard.html#">Login</a></h2>
                                                        <a href="admin-dashboard.html#" class="property-preview-action-secondary">Ver Rede</a>
                                                    </div><!-- /.property-preview-content -->
                                                </div><!-- /.property-preview -->
                                            </div><!-- /.col-* -->
                                        
                                            <div class="col-sm-4 col-md-6 col-lg-4">
                                                <div class="property-preview">
                                                    <div class="property-preview-image">
                                                        <a href="admin-dashboard.html#" class="property-preview-action">
                                                            <i class="fa fa-times"></i>
                                                        </a><!-- /.property-preview-action -->
                                        
                                                        <a href="admin-dashboard.html#">
                                                            <img src="assets/img/tmp/medium/5.jpg" alt="">
                                                        </a>
                                                    </div><!-- /.property-preview-image -->
                                        
                                                    <div class="property-preview-content">
                                                        <h2><a href="admin-dashboard.html#">Login</a></h2>
                                                        <a href="admin-dashboard.html#" class="property-preview-action-secondary">Ver Rede</a>
                                                    </div><!-- /.property-preview-content -->
                                                </div><!-- /.property-preview -->
                                            </div><!-- /.col-* -->
                                        
                                            <div class="col-sm-4 col-md-6 col-lg-4">
                                                <div class="property-preview">
                                                    <div class="property-preview-image">
                                                        <a href="admin-dashboard.html#" class="property-preview-action">
                                                            <i class="fa fa-times"></i>
                                                        </a><!-- /.property-preview-action -->
                                        
                                                        <a href="admin-dashboard.html#">
                                                            <img src="assets/img/tmp/medium/6.jpg" alt="">
                                                        </a>
                                                    </div><!-- /.property-preview-image -->
                                        
                                                    <div class="property-preview-content">
                                                        <h2><a href="admin-dashboard.html#">Login</a></h2>
                                                        <a href="admin-dashboard.html#" class="property-preview-action-secondary">Ver Rede</a>
                                                    </div><!-- /.property-preview-content -->
                                                </div><!-- /.property-preview -->
                                            </div><!-- /.col-* -->
                                        </div><!-- /.row -->
                                                </div><!-- /.col-* -->
            
                    <div class="col-sm-12 col-md-6" style="display:none">
                        <h3 class="page-header">Bônus Recentes</h3>
            
            <div class="activity">
                <ul>
                
                	<? foreach($bonus->result() as $bon){ ?>
                    <li>
                        <div class="icon orange">
                            <i class="fa fa-cc-mastercard"></i>
                        </div><!-- /.icon -->
            
                        <div class="content">
                            <?=$this->padrao_model->converte_data(substr($bon->dt,0,10))?> -  <?=$bon->valor?> - <?=$bon->descricao?> 
                        </div><!-- /.content -->
                    </li>
                    <? } ?>
                    <? /* ?>
                    <li>
                        <div class="icon red">
                            <i class="fa fa-times"></i>
                        </div><!-- /.icon -->
            
                        <div class="content">
                            Property <a href="admin-dashboard.html#">#5432</a> has been published by <a href="admin-dashboard.html#">admin</a>.
                        </div><!-- /.content -->
                    </li>
            		
                    <li>
                        <div class="icon cyan">
                            <i class="fa fa-pencil"></i>
                        </div><!-- /.icon -->
            
                        <div class="content">
                            Admin  property with ID <a href="admin-dashboard.html#">#12345</a>.
                        </div><!-- /.content -->
                    </li>
            
                    <li>
                        <div class="icon teal">
                            <i class="fa fa-bug"></i>
                        </div><!-- /.icon -->
            
                        <div class="content">
                            System has reported 3 new bugs.
                        </div><!-- /.content -->
                    </li>
            		
            
                    <li>
                        <div class="icon brown">
                            <i class="fa fa-users"></i>
                        </div><!-- /.icon -->
            
                        <div class="content">
                            8 users are avaiting registration confimations.
                        </div><!-- /.content -->
                    </li>
            
                    <li>
                        <div class="icon green">
                            <i class="fa fa-paypal"></i>
                        </div><!-- /.icon -->
            
                        <div class="content">
                            PayPal transaction has been completed. <a href="admin-dashboard.html#">View more</a>
                        </div><!-- /.content -->
                    </li>
            
                    <li>
                        <div class="icon red">
                            <i class="fa fa-times"></i>
                        </div><!-- /.icon -->
            
                        <div class="content">
                            Property <a href="admin-dashboard.html#">#5432</a> has been published by <a href="admin-dashboard.html#">admin</a>.
                        </div><!-- /.content -->
                    </li>
					<? */ ?>
                </ul>
            </div><!-- /.activity -->
                    </div><!-- /.col-* -->
                </div>


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
