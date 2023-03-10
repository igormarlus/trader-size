<div id="page-header">

	
    <div id="header-nav-left">
        <a class="header-btn" id="logout-btn" href="<?=base_url()?>bet/config" title="Config">
            <i class="glyph-icon icon-cog"></i>
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
                            <a href="#" title="" class="change-img">Change photo</a>
                            <img src="<?=base_url()?>logo/logo.png" alt="">
                        </div>
                        <? $dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row(); ?>
                        <? $dd_config = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'user_configs')->row(); ?>
                        <div class="user-info">
                            <span>
                                <?=$this->session->userdata('nome')?>
                                
                                <!--<p><?=print_r($this->session->userdata)?></p>-->
                                <i><? #=$this->padrao_model->get_by_id($this->session->userdata('plano'),'user_plano')->row()->nome?></i>
                            </span>
                            <span>
                           Saldo:  <?=$this->bet_model->get_fundos()->availableToBetBalance?> <? #=number_format($fundos->availableToBetBalance, 2, ',', '.'); // availableToBetBalance ?> 
                           (<?=$this->bet_model->get_dd_conta()->currencyCode?>) <br>
                             <?=$this->bet_model->get_dd_conta()->timezone?> 
                             <? 
                             if( $dd->linguagem == "" ){ 
                                $dd_lang = array('linguagem' => $this->bet_model->get_dd_conta()->localeCode);
                                $this->db->where('id',$this->session->userdata('id'));
                                $this->db->update('user',$dd_lang);
                                }
                             ?> 
                           - <?=$this->bet_model->get_dd_conta()->localeCode?> 
                           
                           <? #print_r($this->bet_model->get_dd_conta())?>
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
	#if($dd_user_adm == "0" || $dd_user_adm == "1"){ 
	?>
    <div id="header-nav-right">
        <a href="#" class="hdr-btn popover-button" title="Search" data-placement="bottom" data-id="#popover-search">
            <i class="glyph-icon icon-search"></i>
        </a>
        <div class="hide" id="popover-search">
            <div class="pad5A box-md">
                <div class="input-group">
                <form action="<?=base_url()?>bet/busca" method="post">
                    <input type="text" name="q" class="form-control" placeholder="Search here ...">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary" href="#">Search</button>
                    </span>
                </form>
                </div>
            </div>
        </div>
        <div class="dropdown" id="dashnav-btn">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Preferências">
                <i class="glyph-icon icon-linecons-cog"></i>
            </a>
            <div class="dropdown-menu float-left">
                <div class="box-sm">
                    <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix" style="display:none">
                        <a href="#" class="btn vertical-button hover-blue-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                            </span>
                            Dashboard
                        </a>
                        <a href="#" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                            </span>
                            Widgets
                        </a>
                        <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                            </span>
                            Tables
                        </a>
                        <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                            </span>
                            Charts
                        </a>
                        <a href="#" class="btn vertical-button hover-purple" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                            </span>
                            Buttons
                        </a>
                        <a href="#" class="btn vertical-button hover-azure" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                            </span>
                            Panels
                        </a>
                    </div>
                    <div class="divider"></div>
                    <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                        <a href="<?=base_url()?>" class="btn vertical-button remove-border btn-info" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-dashboard opacity-80 font-size-20"></i>
                            </span>
                            Início
                        </a>
                        <a href="<?=base_url()?>bet/bests" class="btn vertical-button remove-border btn-danger" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                            </span>
                            Mercados
                        </a>
                        <a href="#" class="btn vertical-button remove-border btn-purple" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                            </span>
                            Gráficos
                        </a>
                        <a href="https://myaccount.betfair.com/payments/deposit" target="_blank" class="btn vertical-button remove-border btn-azure" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-arrow-up opacity-80 font-size-20"></i>
                            </span>
                            Depositar
                        </a>
                        <a href="https://myaccount.betfair.com/summary/accountsummary" target="_blank" class="btn vertical-button remove-border btn-yellow" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                            </span>
                            Conta Betfair
                        </a>
                        <a href="https://myaccount.betfair.com/summary/accountstatement" target="_blank" class="btn vertical-button remove-border btn-warning" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-line-chart opacity-80 font-size-20"></i>
                            </span>
                            Histórico
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen" style="display:none">
            <i class="glyph-icon icon-arrows-alt"></i>
        </a>
        
        <div class="dropdown" id="notifications-btn">
            <a data-toggle="dropdown" href="#" title="">
                <span class="small-badge"></span>
                <i class="glyph-icon icon-linecons-megaphone"></i>
            </a>
            <div class="dropdown-menu box-md float-left">

                <div class="popover-title display-block clearfix pad10A">
                    Notifications
                    <a class="text-transform-cap font-primary font-normal btn-link float-right" href="#" title="View more options">
                        More options...
                    </a>
                </div>
                <div class="scrollable-content scrollable-slim-box">
                    <ul class="no-border notifications-box">
                    <? 
                    include("includes/mysqli_con.php");
					$qr_noti = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='dt',$limit=5,$inicio=0);
					foreach($qr_noti->result() as $dd_not){ 
					$qr_selecao_not = mysqli_query($con,"SELECT * FROM odds_mkt WHERE id_mkt = '".$dd_not->id_mkt."' AND selection_id = '".$dd_not->selection_id."' ORDER BY id desc LIMIT 1");
                    $hot_selecao_not = mysqli_fetch_assoc($qr_selecao_not);
					?>
                        <li>
                            <span class="bg-danger icon-notification glyph-icon icon-bullhorn"></span>
                            <span class="notification-text"><?=$hot_selecao_not['selection_name']; //$dd_not->selection_id?></span>
                            <div class="notification-time">
                                <?=$dd_not->tamanho?>
                                <!--<span class="glyph-icon icon-clock-o"></span>-->%
                            </div>
                        </li>
                     <? } ?>   
                        <!--
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-users"></span>
                            <span class="notification-text font-blue">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-green icon-notification glyph-icon icon-sitemap"></span>
                            <span class="notification-text font-green">A success message example.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-azure icon-notification glyph-icon icon-random"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-ticket"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-blue icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text font-blue">Alternate notification styling.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-purple icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-green icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text font-green">A success message example.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-purple icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-user"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                        </li>
                        -->
                    </ul>
                </div>
                <div class="button-pane button-pane-alt pad5T pad5L pad5R text-center">
                    <a href="<?=base_url()?>bet/hots" class="btn btn-flat btn-primary" title="View all notifications">
                        View all
                    </a>
                </div>
            </div>
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
            <div class="dropdown-menu pad0A box-sm float-left" id="progress-dropdown">
                <div class="scrollable-content scrollable-slim-box">
                    <ul class="no-border progress-box progress-box-links">
                        <li>
                            <a href="#" title="Banca">
                                <div class="progress-title">
                                    Banca
                                    
                                    <?
									$fundos = $this->bet_model->get_fundos();
									/*
									
									stdClass Object (     
									[availableToBetBalance] => 0     
									[exposure] => 0     
									[retainedCommission] => 0     
									[exposureLimit] => -10000     
									[discountRate] => 0     
									[pointsBalance] => 0     
									[wallet] => UK )                                                                          
									
									*/
									
                                    //number_format($this->bet_model->get_fundos()->availableToBetBalance, 2, ',', '.'); // availableToBetBalance 
									#print_r($fundos->availableToBetBalance);
									?>
                                    <br>
                                    <b><?=$fundos->availableToBetBalance?></b>
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="<?=$fundos->availableToBetBalance?>">
                                    <div class="progressbar-value bg-blue-alt">
                                        <div class="progressbar-overlay"></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li> 
                            <a href="#" title="">
                                <div class="progress-title">
                                    Stake Sugerida
                                    <?
									$stakeSug = $fundos->availableToBetBalance * 0.05;
									?>
                                    <b><?=number_format($stakeSug, 2, ',', '.')?></b>
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="<?=$stakeSug?>">
                                    <div class="progressbar-value bg-black">
                                        <div class="progressbar-overlay"></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Exposto">
                                <div class="progress-title">
                                    Exposto
                                    <br>
                                    <b><?=number_format(abs($fundos->exposure), 2, ',', '.')?></b>
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="<?=abs($fundos->exposure)?>">
                                    <div class="progressbar-value bg-red">
                                        <div class="progressbar-overlay"></div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#" title="Balanço">
                                <div class="progress-title">
                                    Próximo Álvo
                                    <?
                                    $alvo_dia = $fundos->availableToBetBalance * 0.03 + ($fundos->availableToBetBalance) ;
									?>
                                    <b><?=number_format($alvo_dia, 2, ',', '.')?></b>
                                </div>
                                <div class="progressbar-smaller progressbar" data-value="<?=$fundos->availableToBetBalance?>">
                                    <div class="progressbar-value bg-green"></div>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="button-pane button-pane-alt pad5A text-center">
                    <a href="#" class="btn btn-flat display-block font-normal hover-green" title="Fechar">
                        Fechar
                    </a>
                </div>
            </div>
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
        
        <? if($this->uri->segment(2) == "betjogo"){ ?>
        
            <? if ($this->agent->is_mobile() == true ){ ?>

                    <h2 class="content-box-header-alt" style=";width: 100%;background-color: #fff"><?=$dd_evento->evento?></h2> 
            <? }else{ ?>

	               <h2 class="content-box-header-alt" style="padding-left:50%"><?=$dd_evento->evento?></h2>
               <? } ?>
        <? } ?>
        
        
        
        
        
   <!--     
        <div class="dropdown" id="cloud-btn">
            <a href="#" data-toggle="dropdown" data-placement="bottom" class="tooltip-button popover-button-header hdr-btn sb-toggle-right" title="Apostas">
            <span class="small-badge badge_new_bet">&nbsp;</span>
                <i class="glyph-icon icon-linecons-money"></i>
            </a>
        </div>
-->
    </div><!-- #header-nav-right -->
	<? #} ?>
</div>