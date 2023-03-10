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
    <title>    Xbitcompany  - Atividades Diárias</title>
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
                                	<h1 class="page-header mb60">Atividades Diárias</h1>
    
   									<div id="made-in-ny"></div>
                                
                                <button id="check" type="button" class="btn" style="display:none">Check-in</button>
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
	
    
    <!-- vimeo -->
    <script src="https://player.vimeo.com/api/player.js"></script>
    <script>
    var options = {
        id: 59777392,
        width: 640,
		autoplay: true,
		byline: false,
		portrait: false,
        loop: false
    };

    var player = new Vimeo.Player('made-in-ny', options);

    player.setVolume(0);

    player.on('play', function() {
        console.log('played the video!');
    });
	
		
		player.on('pause', function(data) {
			// data is an object containing properties specific to that event
			//alert(data);
		});
		
		player.on('ended', function(data) {
			// data is an object containing properties specific to that event
			//alert("Acabou");
			$("#check").show('slow');
			$("#check").click(function(){
				$(this).hide();
				alert("Subir Bônus");
			})
		});
		
	
	
	
</script>
    
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
