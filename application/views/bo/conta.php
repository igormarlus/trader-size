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
    <title>Perfil - Xbitcompany</title>
</head>

<body id="dash-perfil" class="open hide-secondary-sidebar">
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
                        
                        
                        <? if($cb == 'seted'){ ?>
                        <ul class="activity">
                            <li style="background-color:#B7FFC9">
                               
                                <div class="content">
                                    Dados Salvo com sucesso!
                                </div><!-- /.content -->
                            </li>
                        </ul>
                        <? } ?>
                        <form action="<?=base_url()?>dash/set_perfil" method="post" id="set_perfil">
                                
                                
                                
                                <div class="box">
                                <h3 class="page-header">Dados de Rede</h3>
    							
                                <h5>Alterar Lado de Cadastro.</h5>
                               	<div class="form-grou">
                                
                                <div class="property-amenitie">
                                <div class="radio-lado property-amenitie">
                                    <ul>
                                        <?php if($dd->lado == 'e'){ $check = "checked"; }else{ $check = ''; }?>
                                        <li class="left">                                            
                                            <input type="radio" name="lado" id="lado-e" value="e" <?=$check?>>
                                            <label for="lado-e">Esquerdo</label>
                                        </li>
                                        <?php if($dd->lado == 'd'){ $check = "checked"; }else{ $check = ''; }?>
                                        <li class="right">                                            
                                            <input type="radio" name="lado" id="lado-d" value="d" <?=$check?>>
                                            <label for="lado-d">Direito</label>
                                        </li>
                                    </ul>
                                </div>
                                
                                
                                </div>
                                
                            </div><!-- /.box -->
                                
                                
                                
                                
                      	<div class="box">
                                <h3 class="page-header">Meus Dados</h3>
                        </div>    
                        
                                <div class="col-sm-6">
                                            <div class="box">
                                                <div class="form-group">
                                                    <input class="form-control" title="Nome" name="nome" type="text" placeholder="Nome" value="<?=$dd->nome?>">
                                                </div><!-- /.form-group -->
                                                <div class="form-group">
                                                    <input class="form-control" title="Data de Nascimento" name="dt_nascimento" id="dt_nascimento" placeholder="Data de Nascimento" value="<?=$this->padrao_model->converte_data($dd->dt_nascimento)?>" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                    <input class="form-control" title="Telefone" id="telefone" name="telefone" placeholder="Telefone" value="<?=$dd->telefone?>" />
                                                </div><!-- /.form-group -->
                                            
                                            </div> <!-- /.box -->
                                </div>   
    							<div class="col-sm-6">
                                	<div class="box">
                                
                                            <div class="form-group">
                                                <input class="form-control" title="Login" name="login" disabled placeholder="login" value="<?=$dd->login?>" />
                                            </div><!-- /.form-group -->
        
                                            <div class="form-group">
                                                <input class="form-control" title="E-mail" name="email" disabled placeholder="E-mail" value="<?=$dd->email?>" />
                                            </div><!-- /.form-group -->
                                            
                                            <div class="form-group">
                                                <input class="form-control" title="CPF" id="cpf" name="cpf" disabled placeholder="CPF" value="<?=$dd->cpf?>" />
                                      </div>      </div><!-- /.form-group -->
                                        
                                </div>
                                        
                                


<div class="row">
    <div class="col-sm-12">
        <div class="box">
        
        <div class="row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <input id="" class="form-control" name="nacionalidade" value="<?=$dd->nacionalidade?>" type="text" placeholder="Nacionalidade" >
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->
            </div>    
        
        </div>

        <div class="box">
        <h3 class="page-header">Endereço</h3>    
				
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input id="cep" class="form-control" name="cep" value="<?=$dd->cep?>" type="text" placeholder="CEP" onBlur="getEndereco()">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->
            </div>    
nacionalidade
            <div class="row">
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input class="form-control" type="text" placeholder="Endereço" id="endereco" name="endereco" value="<?=$dd->endereco?>" >
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->

                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input class="form-control" type="text" placeholder="Número" id="numero" name="numero" value="<?=$dd->numero?>">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
            
            <div class="row">
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input class="form-control" type="text" placeholder="Complemento" id="complemento" name="complemento" value="<?=$dd->complemento?>">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->

                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input class="form-control" type="text" placeholder="Bairro" id="bairro" name="bairro" value="<?=$dd->bairro?>">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->
                
                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input class="form-control" type="text" placeholder="Cidade" id="cidade" name="cidade" value="<?=$dd->cidade?>">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->

                <div class="col-sm-3">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <input class="form-control" type="text" placeholder="UF" id="uf" name="uf" value="<?=$dd->uf?>" maxlength="2" style="text-transform:uppercase">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->
             </div>  
             
             
             
             
             <div class="row">
            <h3 class="page-header" id="senha2">Senha de Segurança</h2>
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                        <input class="form-control" type="password" placeholder="Senha de Segurança" id="senha_seguranca" name="senha_seguranca" value="" >
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->

                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa fa-briefcase"></i></span>
                        <input class="form-control" type="password" placeholder="Senha de Segurança" id="senha_seguranca_confirm" name="senha_seguranca_confirm" value="">
                    </div><!-- /.form-group -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
              
                <div class="g-form-row">
                    <div class="g-form-row-label"></div>
                    <div class="g-form-row-field">
                        <button class="g-btn btn type_primary" id="send_cadastro" style="">Salvar</button>
                    </div>
                </div>
                
            </div>
            
            <? if($dd->plano == "0"){ ?>
            <div class="g-form-row">
                <div class="g-form-row-label"></div>
                <div class="g-form-row-field">
                    <a class="g-btn btn type_primary" href="<?=base_url()?>dash/out" id="fechar_conta" style="">Encerrar Conta</a>
                </div>
            </div>
            <? } ?>
            
        </div><!-- /.box -->
    </div>

    
</div><!-- /.row -->
</form>


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
	
    <script src="<?php echo base_url()?>js/site/jquery.maskedinput.js" type="text/javascript"></script> 
    <script type="text/javascript">
	
	$("#telefone").mask("(99) 99999999?9");
	$("#cpf").mask("999.999.999.99");
	$("#cep").mask("99999-999");
	$("#dt_nascimento").mask("99/99/9999");
	
	
	$("#set_perfil").submit(function(){
		var senha_seguranca = $("#senha_seguranca").val();
		var senha_seguranca_confirm = $("#senha_seguranca_confirm").val();
		
		if(senha_seguranca != senha_seguranca_confirm){
			alert("Confirmação de Senha de Segurança Inválida");
			$("#conf_email").focus();
			return false;
		}
	})
	
	function getEndereco() {  

           // Se o campo CEP não estiver vazio  

           if($.trim($("#cep").val()) != ""){  

               /* 

                   Para conectar no serviço e executar o json, precisamos usar a função 

                   getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros 

                   dataTypes não possibilitam esta interação entre domínios diferentes 

                   Estou chamando a url do serviço passando o parâmetro "formato=javascript" e o CEP digitado no formulário 

                   http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val() 

               */  

               $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){  

                   // o getScript dá um eval no script, então é só ler!  

                   //Se o resultado for igual a 1  

                   if(resultadoCEP["resultado"]){  

                       // troca o valor dos elementos  

                       $("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));  

                       $("#bairro").val(unescape(resultadoCEP["bairro"]));  

                       $("#cidade").val(unescape(resultadoCEP["cidade"]));  

                       $("#uf").val(unescape(resultadoCEP["uf"]));  

                   }else{  

                       alert("Endereço não encontrado");  

                   }  

               });  

           }  

   }  
   
   $("#fechar_conta").click(function(){
	   if (confirm('Deseja realmente deletar esta conta?')) {
			alert('O registro foi deletado!');
		} else {
			//alert('O registro não foi deletado');
		}
	   
	   
   })
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
