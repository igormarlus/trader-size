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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/realsite.css">
    
    <title>    Trader Size - Login Betfair</title>
</head>

<body style="background-image:url(<? #=base_url()?>img/bg-backoffice.jpg);background-position:50%;background-size:100%;background-repeat:no-repeat">

<div class="page-wrapper">
                <div class="header header-standard">
   <div class="header-topbar">
       <div class="container">
           <div class="header-topbar-left">
               <ol class="breadcrumb">
                   <li><a href="<?=base_url()?>">Voltar</a></li>
               </ol>
           </div><!-- /.header-topbar-left -->
           <!-- /.header-topbar-right -->
       </div><!-- /.container -->
   </div><!-- /.header-topbar -->

   <!-- /.container -->
</div><!-- /.header-->
    
    <div class="main" >
        
        <div class="container" >
            <div class="content">
                <div class="col-sm-4 col-sm-offset-4">
                	<p>
                    	<img src="<?=base_url()?>img/logo-dash.png" alt="Trader Size - Login"
                    </p>
    				<h2 class="page-header center" style="display:none">Login Betfair</h2>

    <div class="box">
                                   
                                    <? if($cb == 'invalid'){ ?> 
                                    <div class="g-alert type_error with_close" id="contact_form_error_message">
                                        <div class="g-alert-close"> &#10005; </div>
                                        <div class="g-alert-body">
                                            <p>Login ou senha inválidos! <br> Solicite sua senha enviando um e-mail para:<br><strong> contato@tradersize.com</strong></p>
                                        </div>
                                    </div>
                                    <? } ?>
                                    
                                    <form class="g-form" action="<?=base_url()?>home/logar" method="post" id="form_cadastro">
                                    <!--<form class="g-form" action="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=<?=base_url()?>bet" method="post" id="">
                                       -->
                                       
                                       
                                                   
                                                    <div class="g-form-row" id="phone_row">
                                                        <div class="form-group">
                                                            <input type="text" name="login" id="username" class="form-control" placeholder="Login"  required>
                                                        </div>
                                                        <div class="" id="login_state"></div>
                                                    </div>
                                                    <div id="senhas" style="display:">
                                                            <div class="form-group">
                                                                <input type="password" name="senha" id="password" class="form-control" placeholder="senha"  required>
                                                            </div>
                                                           
                                                    </div>
                                                    
                                                    <div class="g-form-row">
                                                        <div class="form-group"></div>
                                                        <div class="form-group">
                                                            <button class="btn type_primary" id="send_cadastro" style="display:">Entrar</button>
                                                        </div>
                                                    </div>
                                                
                                            
                                                
                                    </form>
    
                                    
    </div><!-- /.row -->
</div><!-- /.col-* -->
            </div><!-- /.content -->
        </div><!-- /.container -->

            </div><!-- /.main -->

                        <div id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-top-inner">
                <nav>
                    <ul class="nav nav-pills">
                        <a title="Ir para Início" href="<?php echo base_url()?>" style="color:#fff">Início</a>
                    </ul>
                </nav>
            </div><!-- /.footer-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.footer-top -->

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-inner">
                <div class="footer-bottom-left">
                    &copy; 2017 Trader Size.
                </div><!-- /.footer-bottom-left -->

            </div><!-- /.footer-bottom-inner -->
        </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
</div><!-- /.footer -->
            </div><!-- /.page-wrapper-->

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
<!--
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-transit/jquery.transit.js"></script>


<script type="text/javascript" src="<?=base_url()?>assets/js/realsite.js"></script>
-->

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
