<div id="page-header">

	
    <div id="header-nav-left">
        <a class="header-btn" id="logout-btn" href="lockscreen-3.html" title="Lockscreen page example">
            <i class="glyph-icon icon-linecons-lock"></i>
        </a>
        <div class="user-account-btn dropdown">
            <a href="#" title="Minha Conta" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="<?=base_url()?>logo/logo.png" alt="Trader Size">
                <span><?=$this->session->userdata('login')?> <? #=$this->session->userdata('id')?> 
                </span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-right">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Trader Size</a>
                            <img src="<?=base_url()?>logo/logo.png" alt="">
                        </div>
                        <div class="user-info">
                            <span>
                                <?=$this->session->userdata('nome')?>
                                
                                <p><a href="<?=base_url()?>">Início</a></p>
                                <i><? #=$this->padrao_model->get_by_id($this->session->userdata('plano'),'user_plano')->row()->nome?></i>
                            </span>
                           
                            <!--
                            <a href="<?=base_url()?>dash/minha_conta" title="Editar Conta">Editar Conta</a>
                            <a href="<?=base_url()?>dash/upgrade" title="View notifications"><? #=$this->bet_model->getAccountFunds($APP_KEY, $SESSION_TOKEN)?></a>
                            -->
                        </div>
                    </div>
                    <div class="divider"></div>
                    <ul class="reset-ul mrg5B" style="display:none">
                        <li>
                            <a href="#">
                                Exemplo 11
                                <i class="glyph-icon float-right icon-caret-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Exemplo 11 22
                                <i class="glyph-icon float-right icon-caret-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>dash/minha_conta">
                                Minha Conta
                                <i class="glyph-icon float-right icon-caret-right"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="button-pane button-pane-alt pad5L pad5R text-center">
                        <a href="<?=base_url()?>dash/sair" class="btn btn-flat display-block font-normal btn-danger">
                            <i class="glyph-icon icon-power-off"></i>
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #header-nav-left -->
	<? 
	$dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
	if($dd_user_adm == "10"){ 
	?>
    <div id="header-nav-right">
        <a href="#" class="hdr-btn popover-button" title="Search" data-placement="bottom" data-id="#popover-search">
            <i class="glyph-icon icon-search"></i>
        </a>
        <div class="hide" id="popover-search">
            
        </div>
        <div class="dropdown" id="dashnav-btn">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Preferências">
                <i class="glyph-icon icon-linecons-cog"></i>
            </a>
            
        </div>
        <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen" style="display:none">
            <i class="glyph-icon icon-arrows-alt"></i>
        </a>
        
        <div class="dropdown" id="notifications-btn">
            <a data-toggle="dropdown" href="#" title="">
                <span class="small-badge"></span>
                <i class="glyph-icon icon-linecons-megaphone"></i>
            </a>
            
        </div>
        
        <style type="text/css">
        .progress-title b{
			border:red 0px solid;
			margin-top:5px;
		}
        </style>
        <div class="dropdown" id="progress-btn">
            <a data-toggle="dropdown" href="#" title="">
                <span class="small-badge"></span>
                <i class="glyph-icon icon-linecons-params"></i>
            </a>
            
        </div>
        <div class="dropdown" id="">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button hdr-btn sb-toggle-left" title="Favoritos">
                <i class="glyph-icon icon-linecons-star"></i>
            </a>
        </div>
        
        <div class="dropdown" id="">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button hdr-btn sb-toggle-right" title="Apostas">
                <i class="glyph-icon icon-linecons-money"></i>
            </a>
        </div>
        
   <!--     
        <div class="dropdown" id="cloud-btn">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="tooltip-button popover-button-header hdr-btn sb-toggle-right" title="Apostas">
            <span class="small-badge badge_new_bet">&nbsp;</span>
                <i class="glyph-icon icon-linecons-money"></i>
            </a>
        </div>
-->
    </div><!-- #header-nav-right -->
	<? } ?>
</div>