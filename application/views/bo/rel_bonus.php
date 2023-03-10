<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
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
                                	<h1 class="page-header mb60">Relatório de bônus</h1>
    
   								<? if($bonus->num_rows() == 0){ ?>
                                	<h3 class="page-header mb60">Nenhum bônus registrado</h3>
                                <? }else{ ?>
                                
                                <table class="table table-simple">
                                    <thead>
                                        <tr>
                                            
                                            <th class="min-width nowrap">ID</th>
                                            
                                            <th>Usuario</th>
                                            <th>Bônus</th>
                                            <th>Tipo</th>
                                            <th>Data</th>
                                            <th class="min-width nowrap"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<? foreach($bonus->result() as $dd_bonus){ ?>
                                    		<tr>                                            
                                                <td class="semi-bold"><?=$dd_bonus->id?></td>
                                                <td>
                                                   <?=$this->padrao_model->get_by_id($dd_bonus->id_user_mov,'user')->row()->login?>
                                                </td>
                                                <td> 
												
												<? if($dd_bonus->status == '1'){ ?>
                                                	<span style="color:red"><?=$dd_bonus->valor?> </span>
                                                <? }else{ ?>
                                                	<?=$dd_bonus->valor?> 
                                                <? } ?>
                                                
                                                </td>
                                                <td><?=$dd_bonus->descricao?></td>
                                                <td><?=$this->padrao_model->converte_data(substr($dd_bonus->dt,0,10))?></td>
                                                <td class="min-width nowrap"><a href="#" class="btn-standard">Detalhes</a></td>
                                            </tr>
                                        <? } ?>    
                                     </tbody>
                                </table>
                                
                                
                                <? } ?>
                                	
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
