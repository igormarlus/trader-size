<div class="admin-navigation" style="background:#FFF !important">
    <div class="admin-navigation-inner" style="background:#FFF !important">
        <nav>
            <ul class="menu">
                <li class="">
                    <a href="admin-property-add.html#" class="btn">
                        Logo
                    </a>
                </li>
                
                <li>&nbsp;</li>
               
                <li class="avatar">
                    <a href="#">
                        <img src="<?=base_url()?>assets/img/tmp/agents/female.jpg" alt="">

                        <span class="avatar-content">
                            <span class="avatar-title" style="color:#000"><?=$this->session->userdata('nome')?></span>
                            <span class="avatar-subtitle" style="color:#000">Membro</span>
                            <!--<span class="avatar-subtitle">Plano: <?=$this->padrao_model->get_by_id($this->session->userdata('plano'),'user_plano')->row()->nome?></span> -->
                            
                        </span><!-- /.avatar-content -->
                    </a>
                </li>
				<li class="separador"> &nbsp; </li>
				<?php if($this->session->userdata('nivel') == '1'){ ?>
                <li>
                	<ul>
                        <li class="<?=$act?>" style="color:#000">
                            <a href="<?=base_url()?>dash/cadastros"><strong style="color:#000"><i class="fa fa-check-square-o" aria-hidden="true"></i></strong> <span style="color:#000">Cadastros</span></a>
                        </li>
                        <li class="<?=$act?>" style="color:#000">
                            <a href="<?=base_url()?>dash/upgrades"><strong style="color:#000"><i class="fa fa-arrow-up" aria-hidden="true"></i></strong> <span style="color:#000">Upgrades</span></a>
                        </li>
                        <li class="<?=$act?>" style="color:#000">
                            <a href="<?=base_url()?>dash/docs"><strong style="color:#000"><i class="fa fa-file" aria-hidden="true"></i></strong> <span style="color:#000">Documentos Enviados</span></a>
                        </li>
                        <li class="separador"> &nbsp; </li>
                    </ul>
                </li>    
                <?php } ?>
                
                
                
				<?php if($this->uri->total_segments() == 1){ $act = 'active'; }else{ $act = ''; } ?>
                <li class="<?=$act?>" style="color:#000">
                    <a href="<?=base_url()?>dash"><strong style="color:#000"><i class="fa fa-briefcase"></i></strong> <span style="color:#000">Dashboard</span></a>
                </li>
                
				<?php if($this->uri->segment(2) == 'minha_conta'){ $act = 'active'; }else{ $act = ''; } ?>
                <li class="<?=$act?>" style="color:#000">
                    <a href="<?=base_url()?>dash/minha_conta"><strong style="color:#000"><i class="fa fa-user" aria-hidden="true"></i></i></strong> <span style="color:#000">Perfil</span></a>
                </li>
                
                <?php if($this->uri->segment(2) == 'atividades'){ $act = 'active'; }else{ $act = ''; } ?>
                <li class="<?=$act?>" style="color:#000">
                    <a href="<?=base_url()?>dash/atividades"><strong style="color:#000"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></strong> <span style="color:#000">Atividades diárias</span></a>
                </li>
                
				<?php if($this->uri->segment(2) == 'upgrade'){ $act = 'active'; }else{ $act = ''; } ?>
                <li class="<?=$act?>" style="color:#000">
                    <a style="color:#000" href="<?=base_url()?>dash/upgrade"><strong style="color:#000"><i class="fa fa-arrow-up" aria-hidden="true"></i></strong> <span style="color:#000">Upgrade</span></a>
                </li>
				<?php if($this->uri->segment(2) == 'rede_binaria'){ $act = 'active'; }else{ $act = ''; } ?>
                <li class="<?=$act?>" style="color:#000">
                    <a href="<?=base_url()?>dash/rede_binaria"><strong style="color:#000"><i class="fa fa-users"></i></strong> <span style="color:#000">Rede Binária</span></a>
                </li>
				<?php if($this->uri->segment(2) == 'bonus'){ $act = 'active'; }else{ $act = ''; } ?>
                <li class="<?=$act?>" style="color:#000">
                    <a href="<?=base_url()?>dash/bonus"><strong style="color:#000"><i class="fa fa-list-ol" aria-hidden="true"></i></strong> <span style="color:#000">Relatório de bônus</span></a>
                </li>
                
                

                <li id="drop-1" class="group-list">
                    <strong style="color:#000"><i class="fa fa-usd" aria-hidden="true"></i></strong> <span style="color:#000">Financeiro</span>
                </li>
                <? if($this->uri->segment(2) == 'financeiro'){ $act = 'active'; }else{ $act = ''; } ?>
                <li id="drop-1_item <?=$act?>" class="group-list-item">
                    <a href="<?=base_url()?>dash/financeiro"><strong style="color:#000"><i class="fa fa-exchange" aria-hidden="true"></i></strong> <span style="color:#000">Relatório</span></a>
                </li>
                
                <li id="drop-1_item" class="group-list-item">
                    <a href="<?=base_url()?>dash/financeiro"><strong style="color:#000"><i class="fa fa-exchange" aria-hidden="true"></i></strong> <span style="color:#000">Transferências</span></a>
                </li>

                <li class="">
                    <a href="<?=base_url()?>dash/"><strong style="color:#000"><i class="fa fa-plus-square" aria-hidden="true"></i></strong> <span style="color:#000">Materiais Complementares</span></a>
                </li>

                

                

                <li>
                    <a href="<?=base_url()?>dash/sair"><strong style="color:#000"><i class="fa fa-sign-out"></i></strong> <span style="color:#000">Sair</span></a>
                </li>
            </ul>
        </nav>
        <!--
        <div class="projects">
            <h2>Projects</h2>

            <ul>
                <li class="orange"><a href="admin-property-add.html#">Web Analytics</a></li>
                <li class="green"><a href="admin-property-add.html#">Custom Development</a></li>
                <li class="lime"><a href="admin-property-add.html#">Property Filtering</a></li>
                <li class="deep-orange"><a href="admin-property-add.html#">Social Marketing</a></li>
                <li class="yellow"><a href="admin-property-add.html#">Agents Management</a></li>
            </ul>
        </div> /.projects -->
        <div class="layer"></div>
    </div><!-- /.admin-navigation-inner -->
</div>
<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#drop-1_item").hide();
	$("#drop-1").click(function(){
		$("#drop-1_item").show();
		});
	
});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-103260353-1', 'auto');
  ga('send', 'pageview');

</script>