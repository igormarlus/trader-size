<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/style.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/swiper.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?=base_url()?>css-front/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?=base_url()?>css-front/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Trader Size - Login Betfair</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('<?=base_url()?>images/parallax/home/1.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container vertical-middle divcenter clearfix">

						

						<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
							<div class="panel-body" style="padding: 40px;">
								<div class="row center">
									<a href="<?=base_url()?>"><img src="<?=base_url()?>img/logo-login.png" alt="Trader Size"></a>
								</div>

								
								<? if($cb == "conf_invalid"){ ?>
										<p class="alert-danger" style="padding:1em">Confirmação de senha Inválido</p>
									<? } ?>
								<br>
								<form id="login-form" name="login-form" class="nobottommargin" action="<?=base_url()?>home/set_new_senha" method="post">
									<input type="hidden" value="<?=$pin?>" name="pin">
									<h4>Olá <?=$dd->nome?></h4>
									<? if($cb == "invalid"){ ?>
										<p class="alert-danger" style="padding:1em">Acesso Inválido</p>
									<? } ?>
									<? if($cb == "einvalid"){ ?>
										<p class="alert-danger" style="padding:1em">E-mail não registrado ou Inválido</p>
									<? } ?>

									

									<div class="col_full">
										<label for="login-form-password">Senha:</label>
										<input type="password" name="senha" id="password" value="" class="form-control not-dark" />
									</div>
									<div class="col_full">
										<label for="login-form-password">Confirmar Senha:</label>
										<input type="password" name="senha_confirm" id="password_conf" value="" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-green nomargin" id="login-form-submit" name="login-form-submit" value="login">Salvar</button>
									</div>

								</form>
								

								<div class="line line-sm"></div>
								<!--
								<div class="center">
									<h4 style="margin-bottom: 15px;">Ou Faça oLogin com:</h4>
									<a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
									<span class="hidden-xs">or</span>
									<a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
								</div> -->
							</div>
						</div>

						<div class="row center dark"><small>Copyrights &copy; Todos os direitos reservados - Trader Size.</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url()?>js-front/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>js-front/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="<?=base_url()?>js-front/functions.js"></script>

</body>
</html>