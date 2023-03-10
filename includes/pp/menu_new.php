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
        <a href="<?=base_url()?>dash" target="" title="Admin BackOffice">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Inicio</span>
        </a>
    <li>
    <? if($dd->executivo == '1'){ ?>
    <li>
        <a href="<?=base_url()?>dash/cadastros" target="" title="Admin BackOffice">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Cadastros</span>
        </a>
    <li>
    <? } ?>
    

    <li>
        <a href="<?=base_url()?>" title="Ir para Ferramenta Trader Size" target="_blank">
            <i class="glyph-icon icon-linecons-tv"></i>
            <span>Ir Trader Size</span>
        </a>
    <li style="display:none">
        <a href="javascript:void(0);" title="Meus Dados">
            <i class="glyph-icon icon-linecons-wallet"></i>
            <span>Meus dados</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="<?=base_url()?>" title="Perfil"><span>Perfil</span></a></li>
                <li><a href="<?=base_url()?>" title="Enviar Documentos"><span>Enviar documentos</span></a></li>
                
                <li><a href="<?=base_url()?>" title="Dados Financeiro"><span>Dados Financeiros</span></a></li>
                
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="<?=base_url()?>dash/estoque" title="Estoques de Licenças">
            <i class="glyph-icon icon-cubes"></i>
            <span>Estoque</span>
        </a>
    </li>
    
    <li>
        <a href="<?=base_url()?>dash/unilever" title="Rede">
            <i class="glyph-icon icon-users"></i>
            <span>Rede</span>
        </a>
        <!--
        <div class="sidebar-submenu">

            <ul>
                <li><a href="<?=base_url()?>dash/unilever" title="Form elements"><span>indicados diretos</span></a></li>
                <li><a href="#" title="Form validation"><span>Unilével</span></a></li>
                <li><a href="#" title="Pickers"><span>Plano de Carreira</span></a></li>
                
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>
    <li>
        <a href="javascript:void(0);" title="Financeiro">
            <i class="glyph-icon icon-linecons-money"></i>
            <span>Financiero</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="<?=base_url()?>dash/financeiro" title="Extrato da Conta"><span>Extrato</span></a></li>
                <li><a href="<?=base_url()?>dash/financeiro" title="Saque - Aguardando Liberação"><span>Saques</span>
                <label style="color:red;font-size:10px">Aguardando liberação</label></a></li>
                <!--
                <li><a href="data-tables.html" title="Data tables"><span>Invoice</span></a></li>
                <li><a href="advanced-datatables.html" title="Advanced data tables"><span>Meus saques</span></a></li>
                <li><a href="fixed-datatables.html" title="Fixed data tables"><span>Transferir saldo</span></a></li>
                <li><a href="responsive-datatables.html" title="Responsive data tables"><span>Pagar invoice</span></a></li>
                -->
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>

    <li>
        <a href="javascript:void(0);" title="Financeiro">
            <i class="glyph-icon icon-linecons-money"></i>
            <span>Robô Size</span>
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="<?=base_url()?>dash/" title="Configurações"><span>Configuração</span></a></li>
                <li><a href="<?=base_url()?>dash/" title="Prognóstico"><span>Prognóstico</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu -->
    </li>

    <li>
        <a href="<?=base_url()?>dash/sair" title="Sair">
            <i class="glyph-icon icon-sign-out"></i>
            <span>Sair</span>
        </a>
        <!-- .sidebar-submenu -->
    </li>
    
    <!--
    <li>
        <a href="javascript:void(0);" title="Maps">
            <i class="glyph-icon icon-linecons-sound"></i>
            <span>Downloads</span>
        </a>
        <div class="sidebar-submenu">

            

        </div>
    </li>
   
    <li>
        <a href="javascript:void(0);" title="Pages">
            <i class="glyph-icon icon-linecons-fire"></i>
            <span>Graduações</span>
            
        </a>
        <div class="sidebar-submenu">

            <ul>
                <li><a href="helper-classes.html" title="Helper classes"><span>Helper classes</span></a></li>
                <li><a href="page-transitions.html" title="Page transitions"><span>Page transitions</span></a></li>
                <li><a href="animations.html" title="Animations"><span>Animations</span></a></li>
            </ul>

        </div><!-- .sidebar-submenu 
    </li>-->
</ul><!-- #sidebar-menu -->
    </div>
</div>