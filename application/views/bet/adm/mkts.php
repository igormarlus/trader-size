
<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>Trader Size - Marketings</title>
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



<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->

    <script type="text/javascript">
		/*
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
		*/
    </script>



</head>
<? require_once('includes/betapi/jsonrpc-futbol.php');  ?>

    <body>
    <div id="sb-site">
    <? include("includes/bet/favoritos.php"); ?>

    <div id="loadi">
        <div class="svg-icon-loader">
            <img src="<?=base_url()?>assets2/images/svg-loaders/puff.svg" width="40" alt="">
        </div>
    </div>

    <div id="page-wrapper">
        <div id="mobile-navigation">
    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
</div>

<? include("includes/bet/menu.php"); ?>
        
        <div id="page-content-wrapper" style="padding: 0px">
            <div id="page-content">
                <? include("includes/dash/header.php"); ?>
                

                    

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
      // var table =  $('.tb_rel').dataTable();
	   var table = $('.tb_rel').dataTable( {
		   			<? if($live == ''){ ?>
					paging: true,
					select: true,
					<? } ?>
					scrollX: true,
					searching: true,
				    ordering:  true
					
				} );
				
		//		table_new.fnSort( [ [0,'desc'] ] );
	   table.fnSort( [ [0,'desc'] ] );
	   
	   $('.tb_rel tbody').on( 'click', 'tr', function () {
			$(this).toggleClass('tr-selected');
		} );
	   
	   
	   // FILTRO
	   $("#filter_qr").change(function(){
		   $("#form_filter").submit();
		})
	   
	   
	   
	
	  
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
		
		
		//
		/*
		setInterval(function(){ 
			 $('.tb_rel').dataTable( {
				"ajax": '<?=base_url()?>bet/hots_only'
			} );
		}, 5000);
		
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
                        <a href="#" style="color:#fff"> Marketings (<?=$mercados->num_rows()?>) (<?=$total?>)</a>
                    </h3>
                    <h4 class="content-box-header bg-red">
                    	<a href="<?=base_url()?>dash/clear_mkt" style='color:white' > Limpar </a>
                    </h4>
                    <!--
                    <div class="content-box-wrapper">
                        <a href="<?=base_url()?>bet/campeonatos">Acrescente e Remova as competições de acordo com seu planejamento.</a>
                    </div>
                    -->
                </div>
                
                
                
                <? if($jogos->num_rows() == 0){ ?>
                    <h3 class="page-header mb60">Nenhum jogo registrado</h3>
                <? }else{ ?>
                
                <table class="table tb_rel table-simple">
                    <thead>
                        <tr>
                            
                            <th class="min-width nowrap">QTD</th>
                            
                            <th>Jogo</th>
                            <th>Mercado</th>
                            <th>Status</th>
                            <th>Seleção</th>
                            
                            <th>Dt Visita</th>
                            <th>Fila</th>
                            <th class="min-width nowrap">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? 
                        require_once('includes/betapi/jsonrpc-futbol.php'); 
                        foreach($mercados->result() as $mkt){ 
                        	$where_mkt = array('id_mkt' => $mkt->id_mkt);
                        	$this->db->where($where_mkt);
                        	$qr_odds_mkt = $this->db->get('odds_mkt');
                        	$dd_mkt = $qr_odds_mkt->row(); 
                        	#$qr_odds_mkt = 

                        	// tb PARTIDAS
                        	$where_jg = array('id_evento' => $dd_mkt->id_partida);
                        	$this->db->where($where_jg);
                        	$qr_partida = $this->db->get('partidas');
                        
	                        if($qr_partida->num_rows() > 0){
	                        	$nm_jogo = $qr_partida->row()->evento;
	                    	}else{
	                    		$nm_jogo = "No data";
	                    	}

	                    	// TB mercados
	                    	$where_mkt = array('id_mkt' => $mkt->id_mkt);
	                    	$qr_mkt = $this->db->get('mercados');
	                    	if($qr_mkt->num_rows() > 0){
	                    		$fila = $qr_mkt->row()->fila; 
	                    		$status_mkt = $qr_mkt->row()->status; 
	                    	}else{
	                    		$fila = "-";
	                    		$status_mkt = "-";
	                    	}
                        ?>
                            <tr>                                            
                                <td class="semi-bold"><?=$qr_odds_mkt->num_rows()?></td>
                                <td><?=$nm_jogo?></td>
                                <td> <? #=$mkt->id_mkt?> <? #=$this->padrao_model->get_by_id($user->patrocinador,'user')->row()->login?>
                                	<a href="<?=base_url()?>bet/betjogo/<?=$dd_mkt->id_partida?>/<?=$mkt->id_mkt?>" target="_blank">
                                	<?
                                	#echo $APP_KEY." - ".$SESSION_TOKEN;
                                	if($total < 2000){
	                                	foreach( $this->bet_model->get_nm_mkt($APP_KEY, $SESSION_TOKEN,$dd_mkt->id_partida,$mkt->id_mkt) as $odd){
		                                	$totalMatched = $odd->totalMatched;
		                                	echo $odd->marketName;
	                                	}
                                	}else{
                                		echo $mkt->id_mkt;
                                	}
                                	?>
                                </a>
                                </td>
                                <td> 
                                   <? #=$totalMatched?>
                                   <?=$status_mkt?>/<?=$qr_mkt->num_rows()?>
                                
                                  
                                </td>
                                <td>
                                	<?=$qr_odds_mkt->row()->selection_name?>
                                    <? # $dt_cadastro = $this->padrao_model->converte_data(substr($user->dt,0,10))?> 
                                    <? #=$dt_cadastro?>
                                    <? #=substr($user->dt,10,10)?>
                                    
                                </td>
                                <td>
                                    <?=$this->padrao_model->converte_data(substr($dd_mkt->dt,0,10))?> 
                                </td>


                                <td>

                                	<?=$fila?>
                                	
                                </td>




                                <td class="min-width nowrap">
                                 <a href="<?=base_url()?>dash/rem_mkt/<?=$mkt->id_mkt?>" style='color:red'> Remover </a>
                                </td>
                            </tr>
                        <? } ?>    
                     </tbody>
                </table>
                
                
                <? } ?>
                    
                
                
                
              
                      
                      
                                    		
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