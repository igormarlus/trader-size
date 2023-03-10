<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Xbitcompany - Cadastro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="<?php echo base_url()?>" href="favicon.ico">	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/motioncss.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/motioncss-widgets.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/responsive.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/animation.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/colors/color_nl.css">	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/rs-settings.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/magnific-popup.css">
    <meta name="google-site-verification" content="8T1hw9nj5T12kXxRUm0Vd4BCMGkiH5WUuWFEqCTCqp8" />
    
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/autocomplete/jquery.autocomplete.css" />
    <!--<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/autocomplete/thickbox.css" />-->
    
</head>

<body class="">

	<!-- CANVAS -->
	

			<?php include('includes/site/header.php');?>

			<div class="main">
                <div class="container">
                    <div class="content">
                        <div class="col-sm-4 col-sm-offset-4">
                        <h2 class="page-header center">Login Form</h2>
            
                           <div class="box">		
                
                                <div class="one-half">
                                
                                    <h4>Cadastro</h4>
                        
                                    
                                    <? if($cb == 'seted'){ ?>
                                    <div class="g-alert type_success with_close" id="contact_form_success_message">
                                        <div class="g-alert-close"> &#10005; </div>
                                        <div class="g-alert-body">
                                            <p><b>Obrigado!</b> Seu cadastro foi realizado com sucesso.</p>
                                        </div>
                                    </div>
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
                                        <div class="g-form-group">
                                            <div class="g-form-group-rows">
                                                
                                                <div class="g-form-row" id="name_row">
                                                    <div class="g-form-row-label">
                                                        <label class="g-form-row-label-h" for="patrocinador">Login do Patrocinador (*)</label>
                                                    </div>
                                                    <div class="g-form-row-field">
                                                        <input type="text" name="patrocinador" id="patrocinador" placeholder="Informe o Login do Seu Patrocinador">
                                                    </div>
                                                    <div class="g-alert type_success" id="confirmacao" style="display:none">
                                                        <div class="g-alert-close"> &#10005; </div>
                                                        <div class="g-alert-body">
                                                            <p id="res"></p>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="g-form-row-state" id="name_state"></div>
                                                </div>
                                                
                                                <div class="g-form-row">
                                                    <div class="g-form-row-label"></div>
                                                    <div class="g-form-row-field">
                                                        <button class="g-btn type_primary" type="button" id="bt_verifica_patrocinio">Verificar</button>
                                                    </div>
                                                </div>
                                          <? }else{ $display = ''; ?>
                                                <div class="g-alert type_success with_close" id="contact_form_success_message">
                                                    <div class="g-alert-close"> &#10005; </div>
                                                    <div class="g-alert-body">
                                                        <p><b>Patrocinador</b> <?=$dd_user->nome?> - <strong><?=$dd_user->login?></strong></p>
                                                        <input type="hidden" name="patrocinador" value="<?=$dd_user->id?>" >
                                                    </div>
                                                </div>
                                                
                                                <? if($this->session->userdata('id')){ ?>
                                                <div class="g-form-row" id="name_row">
                                                    <div class="g-form-row-label">
                                                        <label class="g-form-row-label-h" for="name">Lado do cadastro</label>
                                                    </div>
                                                    <div class="g-form-row-field">
                                                        <select name="lado">
                                                            <option value="d">Direita</option>
                                                            <option value="e">Esquerda</option>
                                                        </select>
                                                    </div>
                                                    <div class="g-form-row-state" id="name_state"></div>
                                                </div>
                                                <? } ?>
                                                
                                                
                                          <? } ?>
                                                
                                                <div id="info" style="display:<?=$display?>">
                                                <h4>Preencha o formulário</h4>
                                                    <div class="g-form-row" id="name_row">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="name">Nome Completo (*)</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <input type="text" name="nome" id="name" required>
                                                        </div>
                                                        <div class="g-form-row-state" id="name_state"></div>
                                                    </div>
                                                    
                                                    <div class="g-form-row" id="name_row">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="name">Data de Nascimento (*)</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <input type="text" name="dt_nascimento" id="dt_nascimento" required>
                                                        </div>
                                                        <div class="g-form-row-state" id="name_state"></div>
                                                    </div>
                                                    
                                                    <div class="g-form-row" id="name_row">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="empresa">CPF (*)</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <input type="text" name="cpf" id="cpf" required>
                                                        </div>
                                                        <div class="g-form-row-state" id="name_state"></div>
                                                    </div>
                                                    
                                                    <div class="g-form-row" id="email_row">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="email">E-mail (*)</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <input type="email" name="email" id="email" required>
                                                        </div>
                                                        <div class="g-form-row-state" id="email_state"></div>
                                                    </div>
                                                    
                                                    <div class="g-form-row" id="email_row">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="email">Confirmar E-mail (*)</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <input type="email" name="conf_email" id="conf_email" oncut="return false" required>
                                                        </div>
                                                        <div class="g-form-row-state" id="email_state"></div>
                                                    </div>
                                                    
                                                    <div class="g-form-row" id="phone_row">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="phone">Telefone (*)</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <input type="text" name="telefone" class="telefone" required id="telefone">
                                                        </div>
                                                        <div class="g-form-row-state" id="telefone"></div>
                                                    </div>
                                                    
                                                    <div class="g-form-row" id="">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="phone">Plano</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <select name="plano_cadastro" class="" required id="plano_cadastro">
                                                            	<?php foreach($this->padrao_model->get_qr('user_plano')->result() as $plano){?>
                                                                	<option value="<?=$plano->id?>"><?=$plano->nome?></option>
                                                                <? } ?>
                                                            </select>
                                                        </div>
                                                        <div class="g-form-row-state" id="telefone"></div>
                                                    </div>
                                                
                                                
                                                    <hr />
                                                    <br>
                                                    <br>
        
                                                    
                                                    <div class="g-form-row" id="phone_row">
                                                        <div class="g-form-row-label">
                                                            <label class="g-form-row-label-h" for="login">Login (*)</label>
                                                        </div>
                                                        <div class="g-form-row-field">
                                                            <input type="text" name="login" id="login" required>
                                                        </div>
                                                        <div class="" id="login_state"></div>
                                                    </div>
                                                    <div id="senhas" style="display:none">
                                                        <div class="g-form-row" id="phone_row">
                                                            <div class="g-form-row-label">
                                                                <label class="g-form-row-label-h" for="senha">Senha (*)</label>
                                                            </div>
                                                            <div class="g-form-row-field">
                                                                <input type="password" name="senha" id="senha" required>
                                                            </div>
                                                            <div class="g-form-row-state" id="phone_state"></div>
                                                        </div>
                                                        
                                                        
                                                        <div class="g-form-row" id="phone_row">
                                                            <div class="g-form-row-label">
                                                                <label class="g-form-row-label-h" for="conf_senha">Confirmar Senha (*)</label>
                                                            </div>
                                                            <div class="g-form-row-field">
                                                                <input type="password" name="conf_senha" id="conf_senha" required>
                                                            </div>
                                                            <div class="g-form-row-state" id="phone_state"></div>
                                                        </div>
                                                    </div>
             
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="g-form-row">
                                                        <div class="g-form-row-label"></div>
                                                        <div class="g-form-row-field">
                                                            <button class="g-btn type_primary" id="send_cadastro" style="display:none">Cadastrar</button>
                                                        </div>
                                                    </div>
                                                
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </form>
    
                                    <? } ?>
                                    
                                </div>
                                
                                
                            </div><!-- /.row -->
                        </div><!-- /.col-* -->
                   </div><!-- /.content -->
                </div><!-- /.container -->
    
                </div><!-- /.main -->
			</div>
					<!-- X CADASTRO -->

					




<!-- FOOTER -->
<?php include('includes/site/footer2.php');?>

<!-- INÍCIO 

     JAVASCRIPT'S:
     ============================================== -->

     <!--<script type="text/javascript" src="<?php echo base_url()?>js/site/jquery-1.9.1.js"></script> -->
     <!--<script type="text/javascript" src="<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/jquery.js"></script> -->
     <!--<script type="text/javascript" src="<?=base_url()?>js/jquery3.js"></script> -->
     
     
     
     <script type="text/javascript" src="<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/jquery.js"></script> 
	<script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/jquery.bgiframe.min.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/jquery.ajaxQueue.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/thickbox-compressed.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/jquery.autocomplete.js'></script>
    <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery-autocomplete/lib/localdata.js'></script>
    
    
     <script language="javascript" type="text/javascript">
	$(document).ready(function(){
	
		$("#patrocinador").autocomplete("<?=base_url()?>auto/search.php", {
			formatItem: function(data, i, n, value) {
				return "<strong" + value + "'/> " + value.split(";")[0];
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
	
	$("#login").blur(function(){
		var login = $("#login").val();
		$.post('<?=base_url()?>home/verifica_login' , { 'q' : login } , function(call){
			//alert(call);
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
	
	
	
	}) // x ready
	</script>
    <script type="text/javascript" src="<?php echo base_url()?>js/site/cadastro.js"></script>
    
    
     <!--<script type="text/javascript" src="<?php echo base_url()?>js/site/jquery-1.9.1.js"></script> -->
     <!--<script type="text/javascript" src="<?php echo base_url()?>js/site/g-alert.js"></script> -->
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.carousello.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.flexslider.js"></script>
     <!--<script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.isotope.js"></script>-->
     <!--<script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.magnific-popup.js"></script> -->
     <!--<script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.parallax.js"></script>-->
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
     
     <script src="<?php echo base_url()?>js/site/jquery.maskedinput.js" type="text/javascript"></script> 
     
	<!--
     <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery.bgiframe.min.js'></script>
	 <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery.ajaxQueue.js'></script>
     <script type='text/javascript' src='<?=base_url()?>js/autocomplete/thickbox-compressed.js'></script>
     <script type='text/javascript' src='<?=base_url()?>js/autocomplete/jquery.autocomplete.min.js'></script>
     <script type='text/javascript' src='<?=base_url()?>js/autocomplete/localdata.js'></script>
    -->
    
	
    
    
     

     <!--<script>jQuery(window).load(function(){ jQuery('#parallax_section').parallax('50%', '-1.2'); });</script> -->
     
     
     
   

     
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

