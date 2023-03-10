<title>Trader Size - Correspondidas</title>
<div id="page-sidebar">
    <div id="header-logo" class="logo-bg" style="background-image:url(<?=base_url()?>logo/logo-dash2.png);background-repeat:no-repeat">
        <a href="<?=base_url()?>" class="logo-content-bi" title="BET">
            &nbsp; <i>&nbsp;</i>
            <span>&nbsp;</span>
        </a>
        <a href="<?=base_url()?>" class="logo-content-small" title="BET" style="background-image:none">
            &nbsp;<i>&nbsp;</i>
            <span>&nbsp;</span>
        </a>
        <a id="close-sidebar" href="#" title="Close sidebar">
            <i class="glyph-icon icon-outdent"></i>
        </a>
    </div>
    <div class="scroll-sidebar">
        <ul id="sidebar-menu">
    
    <li class="header"><span>Dashboard</span></li>
    <li>
        <a href="<?=base_url()?>bet" title="Home">
            <i class="glyph-icon icon-linecons-doc"></i>
            <span>Início</span>
        </a>
        <!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="https://myaccount.betfair.com/payments/deposit" target="_blank" title="Depósito">
            <i class="glyph-icon icon-mail-reply"></i>
            <span>Depósito</span>
        </a>
        
    </li>
    <li>
        <a href="#" class="sb-open-right" title="Apostas">
            <i class="glyph-icon icon-linecons-money"></i>
            <span>Apostas</span>
        </a>
        
    </li>
    
    
    <!--
    <li>
        <a href="<?=base_url()?>bet/horses" title="Hots" style="">
            <i class="glyph-icon" background-image:url(<?=base_url()?>imagens/horse-32.png><img src="<?=base_url()?>imagens/horse-32.png" /></i>
            <span>Horses</span>
        </a>

    </li>
    -->
    <li>
        <a href="<?=base_url()?>bet/hots" title="Hots">
            <i class="glyph-icon icon-fire"></i>
            <span>Hots</span>
        </a>
        <!-- .sidebar-submenu -->
    </li>
    
    <li>
        <a href="<?=base_url()?>bet/bests" title="Hots">
            <i class="glyph-icon icon-signal"></i>
            <span>Correspondidos</span>
        </a>
        <!-- .sidebar-submenu -->
    </li>
    
    <!--
    <li>
        <a href="javascript:void(0);" title="Minha Conta">
            <i class="glyph-icon icon-linecons-user"></i>
            <span>Minha Conta</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="<?=base_url()?>dash/minha_conta" title="Perfil"><span>Perfil</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu 
    </li>
    -->
    <li>
        <a href="<?=base_url()?>bet/times" title="GET Mercados">
            <i class="glyph-icon icon-linecons-doc"></i>
            <span>Times</span>
        </a>
        
    </li>
	<? 
	$dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->executivo;
	if($dd_user_adm > 0){ 
	?>
    
    
    
    <li>
        <a href="<?=base_url()?>bet/campeonatos" title="GET Mercados">
            <i class="glyph-icon  icon-mail-reply-all"></i>
            <span>Admin</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li>
                    <a href="<?=base_url()?>dash/cadastros" title="Usuários Cadastrados" target="_blank">
                        Cadastros
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>dash/cadastros" title="Ativar Pagamentos" target="_blank">
                        Ativações
                    </a>
                </li>
            </ul>

        </div><!-- .sidebar-submenu -->
        <!-- .sidebar-submenu -->
    </li>
    
    
    <li>
        <a href="<?=base_url()?>bet/campeonatos" title="GET Mercados">
            <i class="glyph-icon  icon-mail-reply-all"></i>
            <span>GET Mercados</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
            	
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/MATCH_ODDS" title="Pegar Mercados" target="_blank">
                        MATCH_ODDS
                    </a>
                </li>
                
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/DRAW_NO_BET" title="Pegar Mercados" target="_blank">
                        DRAW_NO_BET
                    </a>
                </li>
                
                
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/CORRECT_SCORE" title="Pegar Mercados" target="_blank">
                        CORRECT_SCORE
                    </a>
                </li>
                
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_05" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_05
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/FIRST_HALF_GOALS_05" title="Pegar Mercados" target="_blank">
                        FIRST_HALF_GOALS_05
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/FIRST_HALF_GOALS_15" title="Pegar Mercados" target="_blank">
                        FIRST_HALF_GOALS_15
                    </a>
                </li>
                
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_15
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_25" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_25
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_35" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_35
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_45" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_45
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_mkt_evento/BOTH_TEAMS_TO_SCORE" title="Pegar Mercados" target="_blank">
                        BOTH_TEAMS_TO_SCORE
                    </a>
                </li>
                
                
                
                
            </ul>

        </div><!-- .sidebar-submenu -->
        <!-- .sidebar-submenu -->
    </li>
    
    <li>
        <a href="<?=base_url()?>bet/campeonatos" title="GET ODDS">
            <i class="glyph-icon icon-mail-reply-all"></i>
            <span>GET ODDS</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
            	
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/0" title="Pegar Mercados" target="_blank">
                        MATCH_ODDS
                    </a>
                </li>
                
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/101" title="Pegar Mercados" target="_blank">
                        DRAW_NO_BET
                    </a>
                </li>
                
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/121" title="Pegar Mercados" target="_blank">
                        CORRECT_SCORE
                    </a>
                </li>
                
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/05" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_05
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/005" title="Pegar Mercados" target="_blank">
                        FIRST_HALF_GOALS_05
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/015" title="Pegar Mercados" target="_blank">
                        FIRST_HALF_GOALS_15
                    </a>
                </li>
                
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_15
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/2" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_25
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/3" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_35
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/4" title="Pegar Mercados" target="_blank">
                        OVER_UNDER_45
                    </a>
                </li>
                <li>
                    <a href="<?=base_url()?>botbet/get_odd_by_mkt/11" title="Pegar Mercados" target="_blank">
                        BOTH_TEAMS_TO_SCORE
                    </a>
                </li>
                
                
                
                
            </ul>

        </div><!-- .sidebar-submenu -->
        <!-- .sidebar-submenu -->
    </li>
    <? } // x if menu bots ?>
    <li>
        <a href="<?=base_url()?>bet/campeonatos" title="Competições">
            <i class="glyph-icon  icon-soccer-ball-o"></i>
            <span>Campeonatos</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
            	
                <li>
                <a href="<?=base_url()?>bet/campeonatos" title="Campeonatos">
                Gerenciar
                    <span class="bs-label badge-yellow"></span>
                </a>
                </li>
                
                
            </ul>

        </div><!-- .sidebar-submenu -->
        <!-- .sidebar-submenu -->
    </li>
    <? 
	$dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
	if($this->uri->segment(2) == 'betjogo'){ 
	?>
    <li >
        <a href="javascript:void(0);" title="Mercados">
            <i class="glyph-icon icon-tag"></i>
            <span>Mercados</span>
        </a>
        <? if($this->uri->segment(2) == "betjogo"){ ?>
            <div class="sidebar-submenu">
    
                <ul style="list-style:none;list-style:none;">
                	<? $dd = 0;
						foreach ($this->bet_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_jogo,'50') as $jogo) { $dd++;
						/*	
							$qr_num_mkt = mysql_query("SELECT * FROM odds_mkt WHERE id_partida = '".$id_jogo."' AND id_mkt = ".$jogo->marketId.""); 
						if(mysql_fetch_assoc($qr_num_mkt) == 0){
							mysql_query("INSERT INTO `odds_mkt` (`id_mkt`, `nm_mkt`,`id_partida`, `total_matched`,`dt`) VALUES ('".$id_mkt."', '".$jogo->marketName."','".$id_jogo."', '".number_format($jogo->totalMatched, 2, ',', '.')."',  CURRENT_TIMESTAMP)");
						}else{
							#mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToBack->size."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back'" );
						}	
						*/
								?>
                                <!--
								<li>
                                <? #=print_r($jogo)?>
                                <a href="<?=base_url()?>bet/betjogo/<?=$id_jogo?>/<?=$jogo->marketId?>" title="<?=$jogo->marketId?>"><?=$jogo->marketName?></a> <?=number_format($jogo->totalMatched, 2, ',', '.');?> 
                                </li>
                                -->
                                <li style="list-style:none;list-style:none !important;list-style:none;margin:0px 0px 0px 0px">
                                
                                    <a class="sf-with-ul" style="font-size:11px;margin:0px 0px 0px 0px" href="<?=base_url()?>bet/betjogo/<?=$id_jogo?>/<?=$jogo->marketId?>" title="<?=$jogo->marketId?>">
                                    <?
                                    // class favoritos
									if($this->usuarios_model->verifica_fav($jogo->marketId,$id_jogo) == true){ $class_fav = 'icon-star'; }else{ $class_fav = 'icon-linecons-star'; }
									?>
                                    <i class="glyph-icon <?=$class_fav?> favoritar" title="<?=$jogo->marketId?>"></i>
                                        <!--<i class="glyph-icon icon-linecons-mail"></i>-->
                                        <span><?=$jogo->marketName?></span>
                                        <span class="bs-badge badge-danger"><?=number_format($jogo->totalMatched, 2, ',', '.');?> </span>
                                    </a>
                                   
                                </li>
                                
                                
								<?
                                #$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $jogo->marketId);
								#printMarketIdRunnersAndPrices($jogo, $marketBook);
							#}
							
							
						}
					?>
                
                    
                </ul>
    
            </div><!-- .sidebar-submenu -->
        <? } ?>
    </li>
    
    <? } ?>
    
    <li>
        <a href="<?=base_url()?>bet/sair" title="Maps">
            <i class="glyph-icon icon-sign-out"></i>
            <span>Sair</span>
        </a>
        <!-- .sidebar-submenu -->
    </li>
    
</ul><!-- #sidebar-menu -->
    </div>
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103260353-1', 'auto');
  ga('send', 'pageview');

</script>