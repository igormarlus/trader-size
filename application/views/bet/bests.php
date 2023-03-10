
<!DOCTYPE html> 
<html lang="en"><head>

    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>Trader Size - Correspondidos</title>
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
    <!--
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-core.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-widget.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-mouse.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-position.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/transition.js"></script>
-->
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/modernizr.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-cookie.js"></script>





</head>
<? require_once('includes/betapi/jsonrpc-futbol.php');  ?>

    <body>
    	
    <div id="sb-site">
    <? include("includes/bet/favoritos.php"); ?>

<div class="sb-slidebar bg-black sb-right sb-style-overlay">
<? if($this->session->userdata('nivel') > 0){ include("includes/bet/place_trader-din.php"); } ?>
</div>
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
        
        <div id="page-content-wrapper" style="padding-top: 0px">
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
      // var table =  $('.tb_rel').dataTable();
	   var table = $('.tb_rel').dataTable( {
		   			<? if($live == ''){ ?>
					paging: true,
					select: true,
					<? } ?>
					scrollX: true,
					searching: true,
				    ordering:  false
					
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
			 
	

		$(".dataTables_filter input").attr('style','border:#ffb900 1px solid');
		$(".dataTables_filter input").attr('placeholder','Search');



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



<div class="row">
    <div class="col-md-12">
        
      

        <div class="panel">
            
            <div class="panel-body">
                
                <div class="example-box-wrapper">
                
                
                <div class="content-box">
                    <h3 class="content-box-header bg-blue">
                        <a href="#" style="color:#fff"> Jogos Por Correspondências</a>
                    </h3>
                    <!--
                    <div class="content-box-wrapper">
                        <a href="<?=base_url()?>bet/campeonatos">Acrescente e Remova as competições de acordo com seu planejamento.</a>
                    </div>
                    -->
                </div>
                
                
                <div class="content-box">
                    <h3 class="content-box-header " style="background-color:#ffb900">
                        <a href="<?=base_url()?>bet" style="color:#000"> Filtro: <?  echo $mercado;  ?> </a>
                    </h3>
                    
                    <div class="content-box-wrapper">
                    	
                        <form action="<?=base_url()?>bet/bests" id="form_filter" method="post">

						<h3 class="title-hero">
							Mercados
						</h3>
                        	<select name="query" id="filter_qr"  class="form-control">
                            	<option value="MATCH_ODDS">Selecione o Mercado</option>
                                <option value="MATCH_ODDS">MATCH_ODDS</option>
                                <option value="CORRECT_SCORE">CORRECT_SCORE</option>
                                <option value="DRAW_NO_BET">DRAW_NO_BET</option>
                                <option value="FIRST_HALF_GOALS_05">FIRST_HALF_GOALS_05</option>
                                <option value="FIRST_HALF_GOALS_15">FIRST_HALF_GOALS_15</option>
                                
                                <option value="OVER_UNDER_05">OVER_UNDER_05</option>                                
                                <option value="OVER_UNDER_15">OVER_UNDER_15</option>
                                <option value="OVER_UNDER_25">OVER_UNDER_25</option>
                                <option value="OVER_UNDER_35">OVER_UNDER_35</option>
                                <option value="OVER_UNDER_45">OVER_UNDER_45</option>
                                
                                <option value="OVER_UNDER_55">OVER_UNDER_55</option>
                                <option value="OVER_UNDER_65">OVER_UNDER_65</option>
                                <option value="OVER_UNDER_75">OVER_UNDER_75</option>
                                
                                <option value="BOTH_TEAMS_TO_SCORE">BOTH_TEAMS_TO_SCORE</option>
                                
                                
                            </select>
                        </form>
                    </div>
                    
                </div>
					<? if ($this->agent->is_mobile()){}else{ ?>
				<div class="panel-body">
					
					<div class="example-box-wrapper" style="display: none;">
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/MATCH_ODDS" role="button">MATCH ODDS</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/CORRECT_SCORE" role="button">CORRECT SCORE</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/DRAW_NO_BET" role="button">DRAW NO BET</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/CORRECT_SCORE" role="button">CORRECT SCORE</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/FIRST_HALF_GOALS_05" role="button">FIRST_HALF_GOALS_05</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/FIRST_HALF_GOALS_15" role="button">FIRST_HALF_GOALS_15</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_05" role="button">OVER/UNDER 0.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_15" role="button">OVER_UNDER 1.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_25" role="button">OVER_UNDER 2.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_35" role="button">OVER_UNDER 3.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_45" role="button">OVER_UNDER 4.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_55" role="button">OVER_UNDER 5.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_65" role="button">OVER_UNDER 6.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_75" role="button">OVER_UNDER 7.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/OVER_UNDER_85" role="button">OVER_UNDER 8.5</a>
						<a class="btn btn-default" href="<?=base_url()?>bet/bests/BOTH_TEAMS_TO_SCORE" role="button">BOTH_TEAMS_TO_SCORE</a>
						
					</div>
				</div>	
                <? } ?>
                
              
                      
                      <div class="panel">
                      			
	                               <!-- <a href="<?=base_url()?>bet/hots/live" class="btn btn-danger" title="Live On">No Live</a>-->
                                    <a href="<?=base_url()?>bet/bests/<?=$mercado?>" class="btn btn btn-success" title="Refresh">Refresh</a>
                                
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in" style="height: 0px;">

                                <table cellpadding="0" cellspacing="0" border="0" id="" class="table table-striped table-bordered tb_rel" data-order='[[ 0, "desc" ]]' data-page-length='50'>
                                <thead class="dd_old">
                                <tr>
                                    <th>Posição</th>
                                    <!--<th>Início</th>-->
                                    <th>Evento</th>
                                    <!--<th>Competição</th> -->
                                    <th>Mercado</th>
                                    <th data-class-name="priority">Correspondido</th>
                                </tr>
                                </thead>
                                <tbody class="dd_old" id="load_tr">
                                <? $a = 5; if($a >= 0){ require_once('includes/betapi/jsonrpc-futbol.php');  ?>
                    
            
			                        <? $posicao = 0; foreach($this->bet_model->getMarketings_best($APP_KEY, $SESSION_TOKEN,1,50,$mercado) as $dd){ $posicao++; ?> 
											
                                            <?
													
													$qr_odds_mkt = $this->padrao_model->get_by_matriz('id_mkt',$dd->marketId,'odds_mkt');
													
													if($qr_odds_mkt->num_rows() > 0){
														$id_partida_ = $qr_odds_mkt->row()->id_partida;
														$id_partida = $this->padrao_model->get_by_matriz('id_evento',$id_partida_,'partidas')->row()->inicio;
														#$id_partida = $qr_odds_mkt->row()->id_partida;
														$data_inicio = $this->padrao_model->converte_data(substr($id_partida,0,10));
													}else{	
														#$id_partida = "No data";		
														$data_inicio = "No data";								
														#$dd_partida = $this->bet_model->get_id_evento($dd->marketId,$APP_KEY, $SESSION_TOKEN);
														#$id_partida = $dd_partida[0]->event->id;
														#print_r($dd_partida[0]);
														#$id_partida = 0;
													}
													
											?>
													<tr class="odd gradeA tr_old" style="background-color:<? #=$bg_tr?>">
													
														<td>
                                                        <?=$posicao?>º
														<? #=$dd->marketId?>
                                                        <? #=$id_partida?>
                                                        
                                                        
                                                        <? #=print_r($dd_partida[0]->event->id);?>
                                                        
														<? #=$dt_reg?>
                                                        
                                                        <?
														/*
														$data_eve = substr($hot_evento['inicio'],0,10);
														$hora_eve = substr($hot_evento['inicio'],11,8);
														?>
														<?=$data_eve?> <? #=$hora_eve?>
														<br>
														<?
														$agora = date('H:i:s');
														#echo $agora;
														$date_time  = new DateTime( $hora_eve );
														$diff       = $date_time->diff( new DateTime( $agora ) );				
														echo $diff->format( '%H:%i:%S' ); // 05:10:00
														*/
														?>
                                                        
                                                        
                                                        </td>
                                                        <!--<td><?=$data_inicio?></td>-->
														
														<td>
														<!--<a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$dd->marketId?>" target="_blank">		-->
                                                        <a href="<?=base_url()?>bet/get_by_id_mkt/<?=$dd->marketId?>" target="_blank">
                                                        <? if($qr_odds_mkt->num_rows() > 0){ ?>
                                                        	<?
                                                        	#$dd_partida = $this->padrao_model->get_by_matriz('id_evento',$qr_odds_mkt->row()->id_partida,'partidas')->row();
                                                        	$dd_partida_qr = $this->db->query("SELECT partidas.id_competition, partidas.inicio , partidas.evento , betfair_competitions.id_competition, betfair_competitions.nome as nm_camp FROM partidas
INNER JOIN betfair_competitions
ON partidas.id_competition = betfair_competitions.id_competition  WHERE partidas.id_evento = '".$qr_odds_mkt->row()->id_partida."' ");
                                                        	$dd_partida = $dd_partida_qr->row();
                                                        	#echo "--";
                                                        	if($dd_partida_qr->num_rows() == 0){ ?>

                                                        		<? $n=0; foreach($dd->runners as $mais_info){ $n++; ?>  
	                                                            	<? if($n <= 3){ ?>
		                                                            	| <?=$mais_info->runnerName?> 
	                                                                <? } ?>
																<? } ?>
																<? #=print_r($dd)?>

                                                        	<? }else{ ?>

                                                        		<?=$dd_partida->evento;?>



                                                        	<? } ?>
														<? }else{ ?>
                                                        	<? $n=0; foreach($dd->runners as $mais_info){ $n++; ?>  
                                                            	<? if($n <= 3){ ?>
	                                                            	| <?=$mais_info->runnerName?> 
                                                                <? } ?>
															<? } ?>
                                                        <? } ?>
															
                                                        </a>
                                                        </td>
                                                        <td>
                                                        <a href="<?=base_url()?>bet/get_by_id_mkt/<?=$dd->marketId?>" target="_blank">
															
															<?=$dd->marketName?>

                                                            </a>
                                                            <br>
                                                            <? //=print_r($dd)?>
                                                            </td>
                                                        </td>
										
                                                        <td><? #=$matched?><?=number_format($dd->totalMatched, 2, ',', '.')?></td>
                                                   
														
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