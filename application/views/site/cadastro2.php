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

    <title>Trader Size - Cadastro</title>



<!-- Global site tag (gtag.js) - Google AdWords: 803602665 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-803602665"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-803602665');
</script>


</head>

<body style="background-image:url(<?=base_url()?>img/bg-backoffice.jpg);background-position:50%;background-size:100%;background-repeat:no-repeat;height:100%">

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
    
    <div class="main">
        
        <div class="container">
            <div class="content">
                <div class="">
    <!--<h2 class="page-header center">Cadastro</h2>-->

    <div class="box">
        							<? if($cb == 'seted'){ ?>
                                    <div class="g-alert type_success with_close" id="contact_form_success_message">
                                        <div class="g-alert-close"> &#10005; </div>
                                        <div class="g-alert-body">
                                            <p><b>Obrigado!</b> Seu cadastro foi realizado com sucesso.</p>
                                            <p>Você recebeu um e-mail de confirmação.</p>
                                        </div>
                                    </div>
                                    


                                    <!-- Event snippet for Cadstro conversion page -->
                                    <script>
                                      gtag('event', 'conversion', {'send_to': 'AW-803602665/HZkaCIrP9YIBEOmBmP8C'});
                                    </script>

                                    <script>
                                      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                                      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                                      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                                      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

                                      ga('create', 'UA-103260353-1', 'auto');
                                      ga('send', 'pageview');

                                    </script>

                                             



                                    <? } ?>
                                    <div class="g-alert type_error with_close" id="contact_form_error_message" style="opacity: 0; display: none;">
                                        <div class="g-alert-close"> &#10005; </div>
                                        <div class="g-alert-body">
                                            <p>Mensagem não enviada!</p>
                                        </div>
                                    </div>
                                    <? if($cb == ''){ ?>
                                    
                                    <form class="g-form" action="<?=base_url()?>home/cadastrar" method="post" id="form_cadastro">
                                        <? if($user == false){ $display = 'none'; ?>
                                                <div class="g-form-row" id="name_row">
                                                    <div class="form-group">
                                                        <input type="text" name="patrocinador" class="form-control" id="patrocinador" placeholder="Informe o Login de quem te indicou. Caso não tenha, utilize o login tradersize" value="tradersize">
                                                    </div>
                                                    <div class="g-alert type_success" id="confirmacao" style="display:none">
                                                        
                                                        
                                                            <div class="promotion" id="res"></div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <br><br>
                                                <div class="g-form-row">
                                                    <div class="form-group">
                                                        <button class="btn type_primary" type="button" id="bt_verifica_patrocinio">Verificar</button>
                                                    </div>
                                                </div>
                                          <? }else{ $display = ''; ?>
                                                <div class="g-alert type_success with_close" id="contact_form_success_message">
                                                    <div class="promotion">
                                                    <h2>Cadastro Trader Size</h2>
                                                    	<!--
                                                        <p><b>Indicação:</b> <?=$dd_user->nome?></p>
                                                        <p><b>Login:</b> <strong><?=$dd_user->login?></strong></p>
                                                        -->
                                                        <input type="hidden" name="patrocinador" value="<?=$dd_user->id?>" >
                                                    </div>
                                                </div>
                                                
                                                <? /*if($this->session->userdata('id')){ ?>
                                                <div class="g-form-row" id="name_row">
                                                    <div class="form-group">
                                                        <label class="form-control" for="name">Lado do cadastro</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="lado">
                                                            <option value="d">Direita</option>
                                                            <option value="e">Esquerda</option>
                                                        </select>
                                                    </div>
                                                    <div class="g-form-row-state" id="name_state"></div>
                                                </div>
                                                <? } */?>
                                                
                                                
                                          <? } ?>
                                                
                                                <div id="info" style="display:<?=$display?>">
                                                <h4>Preencha o formulário</h4>
                                                <input type="hidden" name="refer" value="<?=$this->agent->referrer();?>">

                                                    <div class="g-form-row" id="name_row">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" name="nome" id="name" value="" placeholder="Nome Completo" required>
                                                        </div>
                                                        <div class="g-form-row-state" id="name_state"></div>
                                                    </div>
                                                    
                                                    <div class="g-form-row" id="name_row" style="display: none;">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="dt_nascimento" value="" id="dt_nascimento" placeholder="Data de Nascimento" >
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="g-form-row" id="name_row">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="cpf" id="cpf" value="99999999999" placeholder="CPF" required>
                                                        </div>
                                                        
                                                    </div>
                                                    -->
                                                    <div class="g-form-row" id="name_row" style="display: none;">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="nacionalidade" value="" id="nacionalidade" placeholder="Nacionalidade" >
                                                        </div>
                                                        
                                                    </div>
                                                    

                                                        <div class="form-group">
                                                            <input type="email" name="email" placeholder="E-mail" value="" class="form-control" id="email" required>
                                                        </div>
                                                        <div class="g-form-row-state" id="email_state"></div>

                                                    
                                                    

                                                        <div class="form-group">
                                                            <input type="email" name="conf_email" placeholder="Confirmar E-mail" value="" class="form-control" id="conf_email" oncut="return false" required>
                                                        </div>
                                                        <div class="form-group" style="display: none;">
                                                            <input type="text" name="telefone" value="" placeholder="Telefone" class="form-control telefone"   id="telefone">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <select name="plano_cadastro" class="form-control" required id="plano_cadastro">
                                                            	<option class="form-group" value="1">Escolha seu Plano</option>
                                                            	<?php foreach($this->padrao_model->get_qr('user_plano','asc','id')->result() as $plano){?>																	<? if($id_plano == $plano->id){ 
                                                                        $sel_plano = 'selected'; 
                                                                    }else{ 
                                                                        $sel_plano = ''; 
                                                                    } ?>
                                                                	<option <?=$sel_plano?>  class="form-group" value="<?=$plano->id?>"> <?=$plano->nome?></option>
                                                                    <? #} ?>
                                                                <? } ?>
                                                            </select>
                                                        </div>
                                                    
                                                    
                                                    <div class="g-form-row" id="phone_row" style="display: none;">
                                                        <div class="form-group">
                                                            <input type="text" name="login" id="login" class="form-control" placeholder="Login" >
                                                        </div>
                                                        <div class="" id="login_state"></div>
                                                    </div>
                                                    <div id="senhas" style="display:">
                                                            <div class="form-group">
                                                                <input type="password" name="senha" id="senha" class="form-control" placeholder="senha"  required>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" name="conf_senha" class="form-control" placeholder="Confirmar senha" id="conf_senha" required>
                                                            </div>
                                                    </div>
                                                    <div class="g-form-row">
                                                        <div class="form-group"></div>
                                                        <div class="form-group">
                                                            <button class="btn btn-success" id="send_cadastro" style="display:">Cadastrar</button>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                
                                    </form>
    
                                    <? } ?>
    </div><!-- /.row -->
</div><!-- /.col-* -->
            </div><!-- /.content -->
        </div><!-- /.container -->

            </div><!-- /.main -->

                        <!-- /.footer -->
            </div><!-- /.page-wrapper-->

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-transit/jquery.transit.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/dropdown.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap/assets/javascripts/bootstrap/collapse.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<!--<script type="text/javascript" src="<?=base_url()?>assets/libraries/bootstrap-fileinput/js/fileinput.min.js"></script> -->

<script type="text/javascript" src="<?=base_url()?>assets/libraries/autosize/jquery.autosize.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/isotope/dist/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/OwlCarousel/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery.scrollTo/jquery.scrollTo.min.js"></script>

<script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing&amp;sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/infobox.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/markerclusterer.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/jquery-google-map/jquery-google-map.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/lib/d3.v3.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/lib/d3.v3.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/libraries/nvd3/nv.d3.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/js/realsite.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/charts.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/map.js"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-39841036-7', 'auto');
  ga('send', 'pageview');

</script>


<script type="text/javascript" src="<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/jquery.js"></script> 
	<script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/jquery.bgiframe.min.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/jquery.ajaxQueue.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/thickbox-compressed.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/jquery.autocomplete.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/localdata.js'></script>
    <script src="<?php echo base_url()?>js/site/jquery.maskedinput.js" type="text/javascript"></script> 
    
     <script language="javascript" type="text/javascript">
	$(document).ready(function(){
	
		$("#patrocinador").autocomplete("<?=base_url()?>auto/search.php", {
			formatItem: function(data, i, n, value) {
				return "<strong class='' " + value + "'/> " + value.split(";")[0];
			},
			formatResult: function(data, value) {
				return value.split(";")[0];
			}
		});	
		
		
		$("#bt_verifica_patrocinio").click(function(){
		var patrocinador = $("#patrocinador").val();
		
		
		
		
		
		$.post('<?=base_url()?>home/verifica_patrocinador' , { 'q' : patrocinador } , function(call){
			
			if(call == "Nenhum Resultado Encontrado."){
				$("#info").hide();
				$("#bt_verifica_patrocinio").show();
				$("#confirmacao").show();
				$("#res").html(call);	
			}else{			
				$("#bt_verifica_patrocinio").hide();
				$("#confirmacao").show();
				$("#res").html(call);	
				$("#info").fadeIn('slow');
				//$("g-form-row-state").show();
				//$("#name_state").html(call);	
			}
		})
		
	})
	
	$("#conf_email").bind('paste', function(e) {
        e.preventDefault();
		alert("Não é permitido copiar e colar.");
    });
	/*
	$("#login").blur(function(){
		var login = $("#login").val();
		$.post('<?=base_url()?>home/verifica_login' , { 'q' : login } , function(call){
			alert(login);
			if(call == "1"){
				$("#login_state").html("<span style='color:green;padding:10px'>Liberado</span>");
				$("#senhas").show();
				$("#send_cadastro").show();
				//alert("1");
				//return false;
			}else{			
				$("#login_state").html("<span style='color:red;padding:10px'>Login Existente</span>");
				$("#senhas").hide();
				$("#send_cadastro").hide();
				//alert("0");
			}
		})
		
	})
    */
	
	
	
	}) // x ready
	</script>
    <script type="text/javascript" src="<?php echo base_url()?>js/site/cadastro.js"></script>
    


</body>
</html>
