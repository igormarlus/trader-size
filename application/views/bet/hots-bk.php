
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



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

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

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datatable/datatable.css">
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable-tabletools.js"></script>


<script type="text/javascript">

    /* Datatables basic */
/*
    $(document).ready(function() {
       $('.tb_rel').dataTable();
	   table.fnSort( [ [1,'asc'] ] );
    });
	*/
	$(document).ready(function() {
       var table =  $('.tb_rel').dataTable();
	   table.fnSort( [ [0,'desc'] ] );
    });

    /* Datatables hide columns */

    $(document).ready(function() {
		
		$(".check_resultado").click(function(){
			var id = $(this).val();
  		    //alert(id);
			var status = 0;
			 if($(this).is(':checked')) { //Retornar true ou false 
				 //alert("CheckBox marcado."); 
				 status = 1;
			 }else{ 
				//alert("CheckBox desmarcado."); 
				status = 0
			 }
			 $.get("<?=base_url()?>botbet/set_hot/"+id+"/"+status , function(data){
				 //alert("OK");
			 })
		}); 
			 
			

	})
		
		/*
        var table = $('.tb_rel').DataTable( {
            "scrollY": "300px",
          //  "paging": false
        } );
		 
		//table.fnSort( [ [0,'desc'] ] );
		
        $('#datatable-hide-columns_filter').hide();

        $('a.toggle-vis').on( 'click', function (e) {
            e.preventDefault();

            // Get the column API object
            var column = table.column( $(this).attr('data-column') );

            // Toggle the visibility
            column.visible( ! column.visible() );
        } );
  
*/
    /* Datatable row highlight */

   
		
		
		// ########## DINAMIZAR utilizar o setInterval
		/*
		$('#example').dataTable( {
		  "ajax": {
			"url": "data.json",
			"data": {
				"user_id": 451
			}
		  }
		} );
		
		// OU
		
		$('#example').DataTable( {
			serverSide: true,
			ajax: '/data-source'
		} );
		
		
		
		
        $('#datatable-row-highlight tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('tr-selected');
        } );
    



  
        $('.dataTables_filter input').attr("placeholder", "Buscar...");
		*/
  

</script>

<!-- Chart.js 

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

<!-- Owl carousel 

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.css">
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel-demo.js"></script>
-->
<div class="row">
    <div class="col-md-12">
        
      

        <div class="panel">
            
            <div class="panel-body">
                
                <div class="example-box-wrapper">
                
                
                <div class="content-box">
                    <h3 class="content-box-header bg-blue">
                        <a href="<?=base_url()?>bet/campeonatos" style="color:#fff"> Jogos Por Volume</a>
                    </h3>
                    <!--
                    <div class="content-box-wrapper">
                        <a href="<?=base_url()?>bet/campeonatos">Acrescente e Remova as competições de acordo com seu planejamento.</a>
                    </div>
                    -->
                </div>
                
                <!--
                
                    <div class="panel-group" id="accordion">
                    
                        <div class="panel">
                                
                                <div id="collapse1" class="panel-collapse collapse in" style="height: 0px;">

                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered tb_rel">
                                <thead>
                                <tr>
                                    <th>Data de Regsitro</th>
                                    <th>Evento</th>
                                    <th>Mercado</th>
                                    <th>Seleção</th>
                                    <th>Odd</th>
                                    <th>Porcentagem</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <? /* if($meus->num_rows() > 0){ ?>
                    
            
			                        <? foreach($meus->result() as $meu){ ?>
										<? $t=0;  foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$meu->id_competicao) as $jogo) { $t++; ?>
                                            <?php include("includes/bet/eventos_hots_tb.php");?> 
                                        <? } ?>
                                
											<? } // x foreach ?>
                                                
                                <? } // x if num_rows() */ ?>
                               
                                </tbody>
                                </table>
                                    
                          </div>
                      </div>
						                
                             -->           
                      
                      
                      <div class="panel">
                                
                                <div id="collapse1" class="panel-collapse collapse in" style="height: 0px;">

                                <table cellpadding="0" cellspacing="0" border="0" id="" class="table table-striped table-bordered tb_rel" data-order='[[ 0, "desc" ]]' data-page-length='50'>
                                <thead>
                                <tr>
                                    <th data-class-name="priority">Data de Regsitro</th>
                                    <th>Evento</th>
                                    <th>Mercado</th>
                                    <th>Seleção</th>
                                    <th>Odd</th>
                                    <th>Porcentagem</th>
                                    <th>Resultado</th>
                                    <?
                                    $dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
									if($dd_user_adm > 0){ 
									?>
                                    <th>Ação</th>
                                    <? } ?>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                <? if($hots->num_rows() > 0){ ?>
                    
            
			                        <? foreach($hots->result() as $dd){ ?>
										<? #$t=0;  foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$meu->id_competicao) as $jogo) { $t++; ?>
                                            
											
                                            <?
                                            # if(mysql_num_rows($qr_num) > 0){
												#while($dd = mysql_fetch_assoc($qr_num)){
													$dt_reg = $dd->dt;
													$hot_id_mkt = $dd->id_mkt;
													$hot_selection = $dd->selection_id;
													$hot_odd = $dd->odd;
													$hot_volume = $dd->tamanho; 
													
													$qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' LIMIT 1");
													$hot_selecao = mysql_fetch_assoc($qr_selecao);
													
													$qr_evento = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$dd->id_partida."'");
													$hot_evento = mysql_fetch_assoc($qr_evento);
													
													$qr_mercado = mysql_query("SELECT * FROM mercados WHERE id_mkt = '".$hot_id_mkt."'");
													$hot_mercado = mysql_fetch_assoc($qr_mercado);
											?>
													<tr class="odd gradeA">
													
														<td><?=$dt_reg?></td>
														 
														<td>
															<a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bet/betjogo/<?=$dd->id_partida?>/<?=$hot_id_mkt?>" style="color:#000;font-size:12px">
															<?=$hot_evento['evento']?>
															</a>
														</td>
														
														<td><?=$hot_mercado['name']?> </td>
														<td><?=$hot_selecao['selection_name']?></td>
														<td><?=$hot_odd?></td>
														<td><?=$hot_volume?>%</td>
                                                        <td>
															<? if($dd->status == 0){ ?>
                  											...                                          
															<? }else{ ?>
                                                            <i class="glyph-icon tooltip-button demo-icon icon-check" title="" data-original-title=".icon-check"></i>
                                                            <? } ?>
                                                        </td>
                                                        <?
														$dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
														if($dd_user_adm > 0){ 
														?>
                                                        
														<td>
                                                        	<? if($dd->status == 1){ $check_sel = 'checked';}else{ $check_sel = ''; } ?>
                                                        	<input type="checkbox" <?=$check_sel?> name="" class="check_resultado" value="<?=$dd->id?>" >
                                                        </td>
														<? } ?>
														
														
													</tr>
													<? #} // x while ?>
											<? #} // x if ?>   
											
											
                                            
                                            
                                            
                                        <? } ?>
                                
											<? } // x foreach ?>
                                                
                                <? #} // x if num_rows()  ?>
                               
                                </tbody>
                                </table>
                                    
                                    		
                          </div>
                      </div>                  
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                 
                                    
                                    
                                    
                  </div>
                                <!----- X ACORDION ----->
                            
                        
                        <!---------------------->
                        
                            
                            
                            
                            
                            
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

<!-- Widgets init for demo 

<script type="text/javascript" src="<?=base_url()?>assets2/js-init/widgets-init.js"></script>

<!-- Theme layout -->

<script type="text/javascript" src="<?=base_url()?>assets2/themes/admin/layout.js"></script>

</div>
</body>
</html>