<div id="page-header">

	
    <div id="header-nav-left">
        <a class="header-btn" id="logout-btn" href="lockscreen-3.html" title="Lockscreen page example">
            <i class="glyph-icon icon-linecons-lock"></i>
        </a>
        <div class="user-account-btn dropdown">
            <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                <img width="28" src="<?=base_url()?>logo/logo.png" alt="Profile image">
                <span><?=$this->session->userdata('login')?> 
                </span>
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <div class="dropdown-menu float-right">
                <div class="box-sm">
                    <div class="login-box clearfix">
                        <div class="user-img">
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="<?=base_url()?>logo/logo.png" alt="">
                        </div>
                        <div class="user-info">
                            <span>
                                <?=$this->session->userdata('nome')?>
                                <i><? #=$this->padrao_model->get_by_id($this->session->userdata('plano'),'user_plano')->row()->nome?></i>
                            </span>
                            <span>
                          **
                            </span>
                            <!--
                            <a href="<?=base_url()?>dash/minha_conta" title="Editar Conta">Editar Conta</a>
                            <a href="<?=base_url()?>dash/upgrade" title="View notifications"><? #=$this->bet_model->getAccountFunds($APP_KEY, $SESSION_TOKEN)?></a>
                            -->
                        </div>
                    </div>
                    <div class="divider"></div>
                    
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
	</div>
</div>