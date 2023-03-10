
<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>Trader Size</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Favicons -->

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>assets2/images/icons/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>assets2/images/icons/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>assets2/images/icons/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>assets2/images/icons/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="<?=base_url()?>assets2/images/icons/favicon.png">



    <!-- HELPERS -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/animate.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/boilerplate.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/border-radius.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/grid.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/page-transitions.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/spacing.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/typography.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/utils.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/colors.css">

<!-- MATERIAL -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/material/ripple.css">

<!-- ELEMENTS -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/badges.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/buttons.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/content-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/dashboard-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/forms.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/images.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/info-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/invoice.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/loading-indicators.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/menus.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/panel-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/response-messages.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/responsive-tables.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/ribbon.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/social-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/tables.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/tile-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/timeline.css">

<!-- ICONS -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/fontawesome/fontawesome.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/linecons/linecons.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/spinnericon/spinnericon.css">


<!-- WIDGETS -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/accordion-ui/accordion.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/calendar/calendar.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/carousel/carousel.css">

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/justgage/justgage.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/morris/morris.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/piegage/piegage.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/xcharts/xcharts.css">

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/chosen/chosen.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/colorpicker/colorpicker.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datatable/datatable.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datepicker/datepicker.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datepicker-ui/datepicker.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/dialog/dialog.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/dropdown/dropdown.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/dropzone/dropzone.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/file-input/fileinput.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/input-switch/inputswitch.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/input-switch/inputswitch-alt.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/ionrangeslider/ionrangeslider.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/jcrop/jcrop.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/jgrowl-notifications/jgrowl.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/loading-bar/loadingbar.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/maps/vector-maps/vectormaps.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/markdown/markdown.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/modal/modal.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/multi-select/multiselect.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/multi-upload/fileupload.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/nestable/nestable.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/noty-notifications/noty.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/popover/popover.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/pretty-photo/prettyphoto.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/progressbar/progressbar.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/range-slider/rangeslider.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/slidebars/slidebars.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/slider-ui/slider.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/tabs-ui/tabs.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/timepicker/timepicker.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/tocify/tocify.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/tooltip/tooltip.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/touchspin/touchspin.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/uniform/uniform.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/wizard/wizard.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/xeditable/xeditable.css">

<!-- SNIPPETS -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/chat.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/files-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/login-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/notification-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/progress-box.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/todo.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/user-profile.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/snippets/mobile-navigation.css">

<!-- APPLICATIONS -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/applications/mailbox.css">

<!-- Admin theme -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/themes/admin/layout.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/themes/admin/color-schemes/default.css">

<!-- Components theme -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/themes/components/default.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/themes/components/border-radius.css">




<!-- Admin responsive -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/responsive-elements.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/admin-responsive.css">

    <!-- JS Core -->

    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-core.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-core.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-widget.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-mouse.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-position.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/transition.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/modernizr.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-cookie.js"></script>

	
    




    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>



</head>
<? require_once('includes/betapi/jsonrpc-futbol.php');  ?>

    <body>
    <div id="sb-site">
    <? include("includes/bet/favoritos.php"); ?>

<div class="sb-slidebar bg-black sb-right sb-style-overlay">
<? include("includes/bet/place_trader.php"); ?>
</div>
    <div id="loading">
        <div class="svg-icon-loader">
            <img src="<?=base_url()?>assets2/images/svg-loaders/puff.svg" width="40" alt="">
        </div>
    </div>

    <div id="page-wrapper">
        <div id="mobile-navigation">
    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
</div>

<? include("includes/bet/menu.php"); ?>
        
        <div id="page-content-wrapper">
            <div id="page-content">
                <? include("includes/dash/header_new.php"); ?>
                

                    

<!-- Skycons -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/skycons/skycons.js"></script>

<!-- Data tables -->

<!--<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable-tabletools.js"></script>

<script type="text/javascript">

    /* Datatables basic */

    $(document).ready(function() {
        $('.tb_rel').dataTable();
    });

    /* Datatables hide columns */

    $(document).ready(function() {
        var table = $('#datatable-hide-columns').DataTable( {
            "scrollY": "300px",
            "paging": false
        } );

        $('#datatable-hide-columns_filter').hide();

        $('a.toggle-vis').on( 'click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column( $(this).attr('data-column') );

            // Toggle the visibility
            column.visible( ! column.visible() );
        } );
    } );

    /* Datatable row highlight */

    $(document).ready(function() {
        var table = $('#datatable-row-highlight').DataTable();

        $('#datatable-row-highlight tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('tr-selected');
        } );
    });



    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Buscar...");
    });

</script>

<!-- Chart.js -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-core.js"></script>
<?  #if($this->session->userdata('nivel') == '1'){  ?>    
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-doughnut.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-demo-1.js"></script> -->
<script language="javascript">
<? #if($this->session->userdata('nivel') == '1'){ ?>

<? #} ?>


</script>


<!-- Flot charts 

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-resize.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-stack.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-pie.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-tooltip.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-demo-1.js"></script>
<? #}  ?>
<!-- Sparklines charts 

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines-demo.js"></script>

<!-- Owl carousel -

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.css">
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel-demo.js"></script>
-->
<div id="page-title">

    <? if($licenca == 0){ ?>
           <!--
            <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                Pagamento Pendente
            </button>
            -->
          <? if ($this->agent->is_mobile()){ echo "<br><br><br>"; } ?>
             <div class="alert alert-danger">
                <div class="bg-red alert-icon">
                    <i class="glyph-icon icon-times"></i>
                </div>
                <div class="alert-content">
                    <h4 class="alert-title">Licença Expirada</h4>
                   <p>Sua licença expirou! Confira abaixo nossas opções ou procure um de nossos Traders revendedores.</p>
                </div>
            </div>     
            <? }else{ ?>
            <div class="alert alert-success">
                <div class="bg-green alert-icon">
                    <i class="glyph-icon icon-check"></i>
                </div>
                <div class="alert-content">
                    <h4 class="alert-title">Conta Ativada</h4>
                    <p>Sua conta está ativa com todos os recursos e novidades do Trader Size</p>
                </div>
            </div>
            <? } ?>
</div>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/frontend-elements/pricing-table.css">
<div class="container">

		<!-----  MODAL ---------->
       
            

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Dados de Pagamento</h4>
                        </div>
                        <div class="modal-body">
                        <!--    
                            <p>Envie o pagamento para Carteira Bitcoin: <strong>19XtU9VeHBy9eJr6Z4QmUUt3Lex94T732k</strong></p>
                        -->
                            <p>Após o pagamento, envie o comprovante para o e-mail <a href="mailto:pagamento@tradersize.com">pagamento@tradersize.com</a></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">OK, Entendido</button>
                        </div>
                    </div>
                </div>
            </div>
</div>

        <!------ X MODAL ------>


	<? if($licenca == '0'){ ?>
        <div class="content-box pad25A">

            <div class="pricing-box-alt clearfix">
    			<h3 class="text-center font-size-23 mrg25T mrg25B">
    	            <span>Chave de Ativação</span>
	            </h3>
    
        <div class="row  mrg20T">
            <div class=" col-md-12 content-box">
                <!--<h3 class="pricing-title">Código de Licença de Uso</h3>-->
                <p align="center">Caso não tenha, procure um de nossos afiliados ou solicite enviando um e-mail para <a href="mailto:pagamento@tradersize.com">pagamento@tradersize.com</a></p>
                
                <? if($cb == 'cod_invalid'){ ?>
	                <h3 class="text-center font-size-23 mrg25T mrg25B" style="color:red">Código Inválido</h3>                
                <? } ?>
                
                <? if($cb == 'seted'){ ?>
	                <h3 class="text-center font-size-23 mrg25T mrg25B" style="color:green">Parabéns!! Sua ativação foi efetuada com sucesso.</h3>                
                <? } ?>
                
                <form action="<?=base_url()?>bet/set_licence" method="post">
                <div class="pad25A">
                    <!--<a href="#" class="btn btn-lg text-transform-upr btn-black font-size-12" title="">Aderir Agora!</a>-->
                    
                    <input class="form-control" name="key_licenca" placeholder="Insira Aqui a chave de ativação" type="text" required style="border: lightgreen 1px solid;">
                    
                </div>
                
                <div class="pad25A center">
                    <!--<a href="#" class="btn btn-lg text-transform-upr btn-black font-size-12" title="">Aderir Agora!</a>-->
                    <button type="submit" class="btn btn-success btn-lg text-transform-upr btn-black font-size-12">
                        Verificar
                    </button>
                </div>
                </form>
            </div>
            
            
        </div>

		</div>
	</div>
    <? } ?>
    
    

    <div class="content-box pad25A">

            <div class="pricing-box-alt clearfix">
    			<h3 class="text-center font-size-23 mrg25T mrg25B">
    	            <span>Planos</span>
	            </h3>

        <div class="row pricing-table mrg20T">
            <div class="pricing-box col-md-4 content-box">
                <h3 class="pricing-title">+30 Dias</h3>
                <div class="pricing-specs">
                    <span><sup>$</sup>10</span>
                    <i>1 Mês de Licença</i>
                </div>
                <ul>
                    <li>Acesso Total</li>
                    <li>Odds Live</li>
                    <li>Mais Correspondidos</li>
                    <!-- <li><i class="glyph-icon icon-times font-size-23 font-red"></i> Banca Trade Size</li>-->
                    <li>Mercados Hots</li>
                    
                </ul>
                <div class="pad25A">
                    <!--<a href="#" class="btn btn-lg text-transform-upr btn-black font-size-12" title="">Aderir Agora!</a>-->
                    <a target="_blank" class="btn btn-success btn-md btn-lg text-transform-upr btn-black font-size-12" href="<?=base_url()?>bet/pay/2">
                        Aderir Agora!
                    </a><br><br>
                    <a target="_blank" class="btn btn-warning btn-md btn-lg text-transform-upr btn-black font-size-12" href="<?=base_url()?>bet/paycoins/2">
                        <i class="glyph-icon tooltip-button icon-btc" title="" data-original-title=".icon-btc"></i>
                        Pagar com Bitcoin!
                    </a>
                </div>
            </div>
            <div class="pricing-box col-md-4 content-box">
                <h3 class="pricing-title">1 Ano</h3>
                <div class="pricing-specs">
                    <span><sup>$</sup>100</span>
                    <i>12 Meses de Licença</i>
                </div>
                <ul>
                    <li>Acesso Total</li>
                    <li>Odds Live</li>
                    <li>Mais Correspondidos</li>
                    <!-- <li><i class="glyph-icon icon-times font-size-23 font-red"></i> Banca Trade Size</li>-->
                    <li>Mercados Hots</li>
                </ul>
                <div class="pad25A">
                    <!--<a href="#" class="btn btn-lg text-transform-upr btn-black font-size-12" title="">Aderir Agora!</a>-->
                    <a target="_blank" class="btn btn-success btn-md btn-lg text-transform-upr btn-black font-size-12" href="<?=base_url()?>bet/pay/3">
                        Aderir Agora!
                    </a><br><br>
                    <a target="_blank" class="btn btn-warning btn-md btn-lg text-transform-upr btn-black font-size-12" href="<?=base_url()?>bet/paycoins/3">
                        <i class="glyph-icon tooltip-button icon-btc" title="" data-original-title=".icon-btc"></i>
                        Pagar com Bitcoin!
                    </a>
                </div>
            </div>
            <div class="pricing-box pricing-best col-md-4 content-box">
                <h3 class="pricing-title bg-blue">Revenda</h3>
                <div class="pricing-specs">
                    <span><sup>$</sup>1000</span>
                    <i>20 Anos de Licença</i>
                </div>
                <ul>
                    <li>Acesso Ilimitado</li>
                    <li>Odds Live</li>
                    
                    <li>Mercados Hots</li>
                    <li>Mercados Mais Correspondidos</li>
                    <li>Ganho de 100% sobre cada licença</li>
                </ul>
                <div class="pad25A">
                    <!--<a href="#" class="btn btn-lg text-transform-upr btn-primary font-size-14" title="">Aderir Agora!</a>-->
                    <a target="_blank" class="btn btn-success btn-md btn-lg text-transform-upr btn-black font-size-12" href="<?=base_url()?>bet/pay/3">
                        Aderir Agora!
                    </a><br><br>
                    <a target="_blank" class="btn btn-warning btn-md btn-lg text-transform-upr btn-black font-size-12" href="<?=base_url()?>bet/paycoins/4">
                        <i class="glyph-icon tooltip-button icon-btc" title="" data-original-title=".icon-btc"></i>
                        Pagar com Bitcoin!
                    </a>
                </div>
            </div>
        </div>

		</div>
	</div>
</div>

        </div>

        
        

    </div>
    
    
    
    
    
    
    <!-- x if -->
</div>

                

            </div>
        </div>
    </div>


    <!-- WIDGETS -->

<!-- Bootstrap Modal -->

<!--<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/modal/modal.css">-->
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/modal/modal.js"></script>

<!-- JS Interactions -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/interactions-ui/resizable.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/interactions-ui/draggable.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/interactions-ui/sortable.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/interactions-ui/selectable.js"></script>

<!-- jQueryUI Dialog -->

<!--<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/dialog/dialog.css">-->
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/dialog/dialog.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/dialog/dialog-demo.js"></script>






<!-- Bootstrap Dropdown -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/dropdown/dropdown.js"></script>

<!-- Bootstrap Tooltip -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/tooltip/tooltip.js"></script>

<!-- Bootstrap Popover -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/popover/popover.js"></script>

<!-- Bootstrap Progress Bar -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/progressbar/progressbar.js"></script>

<!-- Bootstrap Buttons -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/button/button.js"></script>

<!-- Bootstrap Collapse -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/collapse/collapse.js"></script>

<!-- Superclick -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/superclick/superclick.js"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/input-switch/inputswitch-alt.js"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/slimscroll/slimscroll.js"></script>

<!-- Slidebars -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/slidebars/slidebars.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/slidebars/slidebars-demo.js"></script>

<!-- PieGage -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/piegage/piegage.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/piegage/piegage-demo.js"></script>

<!-- Screenfull -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/screenfull/screenfull.js"></script>

<!-- Content box -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/content-box/contentbox.js"></script>

<!-- Material -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/material/material.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/material/ripples.js"></script>


<!-- Overlay -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/overlay/overlay.js"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="<?=base_url()?>assets2/js-init/widgets-init.js"></script>

<!-- Theme layout -->

<script type="text/javascript" src="<?=base_url()?>assets2/themes/admin/layout.js"></script>

</div>
</body>
</html>