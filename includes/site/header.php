<!-- HEADER -->

<div class="l-header">
  <div class="l-header-h">
    <div class="l-subheader at_top">
      <div class="l-subheader-h i-cf">
        <div class="w-contacts">
          <div class="w-contacts-h">
            <div class="w-contacts-list">
              <div class="w-contacts-item for_phone"> <i class="fa fa-phone"></i> <span class="w-contacts-item-name">Whatsapp:</span> <span class="w-contacts-item-value"><a title="Telefone Site" href="https://api.whatsapp.com/send?phone=5581995274189">Whatsapp</a></span> </div>
              <div class="w-contacts-item for_email"> <i class="fa fa-envelope"></i> <span class="w-contacts-item-name">Email:</span> <span class="w-contacts-item-value"><a title="Email da Site" href="mailto:conato@tradersize.com">contato@tradersize.com</a></span> </div>
              <div style="display:none" class="w-contacts-item for_email"> <i class="fa fa-map-marker"></i> <span class="w-contacts-item-name">Localização:</span> <span class="w-contacts-item-value"><a title="Localização da Site" href="https://goo.gl/maps/4VT0r" target="_blank">Localização no mapa</a></span> </div>
            </div>
          </div>
        </div>
        <div class="w-socials">
          <div class="w-socials-h">
            <div class="w-socials-list">
              <!--
              <div class="w-socials-item facebook"> <a title="ir para o Facebook da Site" class="w-socials-item-link" target="_blank" href="https://pt-br.facebook.com/"> <i class="fa fa-facebook"></i> </a>
                <div class="w-socials-item-popup">
                  <div class="w-socials-item-popup-h"> <span class="w-socials-item-popup-text">Facebook</span> </div>
                </div>
              </div>
              <div class="w-socials-item instagram"> <a title="ir para o Instagram da Site " class="w-socials-item-link" target="_blank" href="https://instagram.com/"> <i class="fa fa-instagram"></i> </a>
                <div class="w-socials-item-popup">
                  <div class="w-socials-item-popup-h"> <span class="w-socials-item-popup-text">Instagram</span> </div>
                </div>
              </div>
              <div class="w-socials-item twitter"> <a title="ir para o Twitter da Site " class="w-socials-item-link" target="_blank" href="https://twitter.com/"> <i class="fa fa-twitter"></i> </a>
                <div class="w-socials-item-popup">
                  <div class="w-socials-item-popup-h"> <span class="w-socials-item-popup-text">Twitter</span> </div>
                </div>
              </div>
              <div class="w-socials-item gplus"> <a title="ir para o Google Plus da Site" class="w-socials-item-link" target="_blank" href="https://plus.google.com/u/0/112724120495451736643/posts"> <i class="fa fa-google-plus"></i> </a>
                <div class="w-socials-item-popup">
                  <div class="w-socials-item-popup-h"> <span class="w-socials-item-popup-text">Google</span> </div>
                </div>
              </div>
              <div class="w-socials-item linkedin"> <a title="ir para o Linkedin da Site" class="w-socials-item-link" target="_blank" href="https://www.linkedin.com/company/nuvem-lab"> <i class="fa fa-linkedin"></i> </a>
                <div class="w-socials-item-popup">
                  <div class="w-socials-item-popup-h"> <span class="w-socials-item-popup-text">LinkedIn</span> </div>
                </div>
              </div>
              <div class="w-socials-item twitter"> <a title="ir para o Blog da Site" class="w-socials-item-link item-link-text" target="_blank" href="http://.com.br/blog"> <i class="fa fa-wordpress"></i> Blog </a>
                <div class="w-socials-item-popup">
                  <div class="w-socials-item-popup-h"> <span class="w-socials-item-popup-text">Blog</span> </div>
                </div>
              </div>
              -->
              <style type="text/css">
              	.form_login input{
					padding:2px;
					width:30%;
					height:36px;
				}
              </style>
              <div class="form_login">
              <? #=$_SESSION[0]?>
             	<? if($this->session->userdata('id')){ ?>
	                Olá <?=$this->session->userdata('login')?>, 
                  <a class="g-btn type_primary size_small" href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=<?=base_url()?>bet">
                  Minha Conta</a> | <a href="<?=base_url()?>dash/sair">Sair</a>	
                    <? #=print_r($this->session->userdata);   ?>
                    <!--
                    <form action="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=<?=base_url()?>bet" method="post">
                      
                      <div>
                      
                        <input type="text" style="height:30px" name="login" value="" placeholder="Login Betfair" required="required" />
                        <input type="password" style="height:30px" name="senha" value="" placeholder="Senha" required="required" />
                       
                        <button type="submit"  class="g-btn type_primary size_small" style="margin-top:0px">Entrar pela Betfair</button>
                      </div>
                    </form>
                    -->
                <? }else{ ?>
                    <!--<form action="<?=base_url()?>home/logar" method="post">-->
                    
                      <div style="">
                      <!--
                        <input type="text" style="height:30px" name="login" value="" placeholder="Login Betfair" required="required" />
                        <input type="password" style="height:30px" name="senha" value="" placeholder="Senha" required="required" />
                       --> 
                        <a href="<?=base_url()?>home/cadastro"  class="g-btn type_primary size_small" style="margin-top:0px">Cadastrar</a>
                        <a href="<?=base_url()?>home/login"  class="g-btn type_primary size_small" style="margin-top:0px">Login</a>
                      </div>
                    
                <? } ?>
             
            </div>
              
          
              
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-subheader at_middle">
      <div class="l-subheader-h i-cf"> 
        
        <!-- LOGO -->
        
        <div class="w-logo">
          <div class="w-logo-h"> 
              <a class="w-logo-link" href="<?php echo base_url()?>"> 
                <img class="w-logo-img" src="<?php echo base_url()?>img/logo.jpg" alt="Site">
                <span class="w-logo-title"> <span class="w-logo-title-h">Site - Trader Size</span> </span> 
              </a> 
         </div>
        </div>
        
        <!-- SEARCH -->
        
        
       
        
        <!-- NAV -->
        
        <nav class="w-nav">
          <div class="w-nav-h">
            <div class="w-nav-control"> <i class="fa fa-bars"></i> </div>
            <div class="w-nav-list layout_hor width_auto float_right level_1">
              <div class="w-nav-list-h">
                <div class="w-nav-item level_1 active">
                  <div class="w-nav-item-h"> <a href="<?php echo base_url()?>" class="w-nav-anchor level_1"> <span class="w-nav-icon"><i class="fa fa-star"></i></span> <span class="w-nav-title">Início</span> <span class="w-nav-hint"></span> </a> </div>
                </div>
                
                
                
                
                
              	 
                
                
                
                <div class="w-nav-item level_1">
                  <div class="w-nav-item-h"> <a href="mailto:contato@tradersize.com" class="w-nav-anchor level_1"> <span class="w-nav-icon"><i class="fa fa-star"></i></span> <span class="w-nav-title">Contato</span> <span class="w-nav-hint"></span> </a> </div>
                </div>
                
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
</div>

<!-- /HEADER -->