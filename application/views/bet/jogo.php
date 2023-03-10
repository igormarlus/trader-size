<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
		#loading_cont {margin-left: 50%;}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>
<?=$dd_evento->evento?>
</title>
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


	<script type="text/javascript" src="<?=base_url()?>assets2/widgets/slidebars/slidebars.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets2/widgets/slidebars/slidebars-demo.js"></script>
	
    <!-- Sparklines charts -->
	<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines-demo.js"></script>
    

    
	<!--<script type="text/javascript" src="<?=base_url()?>js/betfair.js"></script>-->

    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        	
			

			// get odds
			var contador = 0;
			setInterval(function(){  contador++;
				//alert(<?=$type?>);
				$.get("<?=base_url()?>bet/get_odds_only/<?=$id_jogo?>/<?=$id_mkt?>/<?=$type?>" , function(data){
					//alert(data);
					//$("#valor_total_only").text(data);
					$("#loading_cont").hide();
					$(".tb_partidas").remove();
					$("#odds").append(data);
					$(".pisc").show('slow');
					
					
					// por MIM
					//alert("OK 1 a");
					
					$(".set_odd").click(function(){
						//alert("OK 2 b");
						// RESET
						$("#valor_place").val("");
						$("#lay_responsabilidade").html("");
						$("#dd_lay").val("");
						$("#calc").html("");
						$("#result_place").html("Resultado");
						var id_select = $(this).attr('title');
						//var odd = $(this).parent().text();
						//var odd = $(this).children().first().html();
						var odd = $(this).attr('lang');
						
						// pega o nome  da selação
						var tit_sel = $("#sel"+id_select).html();
						//alert(tit_sel);
						<? if($this->uri->segment('5') == 'vertical'){ ?>
						// balanço
							var balanco_atual = $("#balanco_atual").text();
							alert(balanco_atual);
							$("#valor_place").val(balanco_atual);
						<? } ?>
						//alert(odd);
						
						//alert(odd);
						//var odd =  = $(this).attr('dir');
						//var odd = $(this+":first").html();
						
						if($(this).hasClass('back')){
							var tipo = 'BACK';
							//$("#dd_lay").hide();
						}
						
						if($(this).hasClass('lay')){
							var tipo = 'LAY';
							//$("#dd_lay").show();
						}
						//alert(odd);
						
						$("#bt_place").text('Apostar: '+tit_sel+" - "+tipo);
						
						$("#odd_place").val(odd);
						$("#id_select").val(id_select);
						$("#tipo").val(tipo);
						
                           
						$("#basic-dialog").dialog({
							modal: true,
							minWidth: 300,
							minHeight: 100,
							closeOnEscape: true,dialogClass: "",
							show: "fadeIn"
						});
						$('.ui-widget-overlay').addClass('bg-green opacity-60');
						
						$("#valor_place").focus();
						
						//#valor_place #odd_place
						/*
						$("#valor_place").keyup(function() {
							var odd_place = $(this).val();
							alert(val_odd);
						});
						*/
						$("#valor_place").keyup(function() {
							
						  //alert( "Handler for .keydown() called." );
						  var aposta_valor = $("#valor_place").val();
						  var lucro_calc =  aposta_valor * odd;
						  //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
						  var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
						  //var lucro_float = lucro.replace(".","");
					      //lucro_float = lucro_float.replace(",",".");
						  //lucro_float =  parseFloat(lucro_float);
						  //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
						  $("#calc").html(parseFloat(lucro));
						  $("#sel_balanco_"+id_select).html(parseFloat(lucro));
						  // percentual
						  var soma_t = lucro - aposta_valor;
						  //var soma_total_lay = mysql_fetch_assoc($soma_lay);
						  var pecentual_ganho = (lucro * 100) / soma_t;
						  //$("#lucro_percentual").html(lucro+" "+aposta_valor+" ("+soma_t+")="+pecentual_ganho);
						  var soma_t_t = Math.round(soma_t*Math.pow(10,2))/Math.pow(10,2);
						  //$("#lucro_percentual").html(parseFloat(soma_t_t));
						  var lucro_percentual = parseFloat(soma_t_t);
						  //alert(lucro_percentual);
						  $("#lay_responsabilidade").html(lucro_percentual+aposta_valor);
						  
						  if(tipo == "BACK"){
								$("#lucro_percentual").html("Lucro: "+lucro_percentual);
						  }
							
						  if(tipo == "LAY"){
							$("#lucro_percentual").html("Responsabilidade: "+lucro_percentual);
						  }
						  
						  
						});
						$('#valor_place').on('change',function() {
						  //alert( "Handler for .keydown() called." );
						  var aposta_valor = $("#valor_place").val();
						  var lucro_calc =  aposta_valor * odd;
						  //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
						  var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
						  //var lucro_float = lucro.replace(".","");
					      //lucro_float = lucro_float.replace(",",".");
						  //lucro_float =  parseFloat(lucro_float);
						  //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
						  $("#calc").html(parseFloat(lucro));
						  
						  // percentual
						  var soma_t = lucro - aposta_valor;
						  //var soma_total_lay = mysql_fetch_assoc($soma_lay);
						  var pecentual_ganho = (lucro * 100) / soma_t;
						  //$("#lucro_percentual").html(lucro+" "+aposta_valor+" ("+soma_t+")="+pecentual_ganho);
						  var soma_t_t = Math.round(soma_t*Math.pow(10,2))/Math.pow(10,2);
						  //$("#lucro_percentual").html(parseFloat(soma_t_t));
						  var lucro_percentual = parseFloat(soma_t_t);
						  //alert(lucro_percentual);
						  $("#lay_responsabilidade").html(lucro_percentual+aposta_valor);
						  
						  if(tipo == "BACK"){
								$("#lucro_percentual").html("Lucro: "+lucro_percentual);
						  }
							
						  if(tipo == "LAY"){
							$("#lucro_percentual").html("Responsabilidade: "+lucro_percentual);
						  }
						  
						  
						});
						
						
						
						
						$("#bt_place").click(function(){
							
							var len = $("#valor_place").val();
							
							if(len < 2){
								alert("Insira um valor válido");
								$("#valor_place").focus();
								//return false;
							}
							var side_tipo = $("#tipo").val();
							 if (confirm('Você confirma sua aposta '+side_tipo+'  no '+tit_sel+' ?')) {
								$("#bt_place").text('Aguarde...');
								$("#status_place").val('aguarde');

								$("#bt_place").attr("disabled","disabled");
							}else{
								return false;
							}
							
							
							alert("foi");
							
							//alert(tipo);
							var id_mkt = $("#id_mkt").val();
							var id_selection = $("#id_select").val();
							var tipo = $("#tipo").val();
							var size = $("#odd_place").val();
							var valor = $("#valor_place").val();
							//alert(parseFloat(size)+" "+parseFloat(valor));
							$.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){
								
								//$("#bt_place").hide();
								$("#bt_place").attr("disabled",false);
								$("#bt_place").text('Apostar');
								$("#result_place").html("");
								$("#result_place").html(data);
								// fecha janela modal
								
								$(".badge_new_bet").addClass('bg-yellow');
								$(".bt_apostas").show();
								
								$('#basic-dialog').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		                            $(this).removeClass();
		                            $("#status_place").val('');
		                        });
								
								//$("#basic-dialog").dialog("close");
								
								//open('right');
								
								
								// abre apostas
								//$('html').addClass('sb-active sb-active-right'); // Add active classes.
								//$(".sb-right").addClass('sb-active');
								//animate($right, '-' + $right.css('width'), 'right'); // Animation
								/*
								setTimeout(function() {
									rightActive = true;
									if (typeof callback === 'function') callback(); // Run callback function.
								}, 400); // Set active variables.
								*/
								//alert("Opa 22");
							})
							//return false;
						})
						
						//alert(id_select+" "+odd);
						
					})
					
					// pie porcentagens
					if(contador > 3){
					
						$('.chart-alt-10').easyPieChart({
						barColor: 'rgba(255,255,255,255.4)',
						trackColor: 'rgba(255,255,255,0.1)',
						scaleColor: 'transparent',
						lineCap: 'round',
						rotate: -90,
						lineWidth: 4,
						size: 100,
						animate: 2500,
						onStep: function(value) {
							this.$el.find('span').text(~~value);
						}
					});
					}
					/*
					$('.set_odd').on('touchend click', function(event) {
						eventHandler(event, $(this)); // Handle the event.
						toggle('left'); // Toggle the left Slidbar.
						var id_select = $(this).attr('title');
						//var odd = $(this).parent().text();
						var odd = $(this).children().first().html();
						//var odd =  = $(this).attr('dir');
						//var odd = $(this+":first").html();
						alert(id_select+" "+odd);
						toggle('left');
					});
					
					*/
					
					$(".bt_cashout").click(function(){
						//alert("Opa 10");
						
						
						 if (confirm('Você confirma seu Cashout ?')) {
								cashout(this);
							}else{
								return false;
							}
						
					})
	
	
	
		function cashout(elemento){						
								//var len = $("#valor_place").val();
								var id_mkt = $(elemento).val();
								var id_selection = $(elemento).attr('title');
								var tipo = $(elemento).attr('data-type');
								var size = $(elemento).attr('data-direction');
								var valor = $(elemento).attr('data-title');


								//alert("Info: "+id_mkt+" - "+id_selection+" "+tipo+" Size: "+size+" Price:"+valor);
								//return false;
								//alert("Opa3");
								//return false;

								// aguarde
								$("#pre_cash").show();
								$(".bt_cashout").hide();


								//alert(tipo);
								//var id_mkt = $("#id_mkt").val();
								//var id_selection = $("#id_select").val();
								//var tipo = $("#tipo").val();
								//var size = $("#odd_place").val();
								//var valor = $("#valor_place").val();
								//alert(parseFloat(size)+" "+parseFloat(valor));
								var x=0;
								$.post('<?=base_url()?>bet/cashout' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){ x++;
									alert("dat: "+data);
									alert("Cashout bem Sucedido!");
									if(x > 1){
										$("#pre_cash").hide();
										$(".bt_cashout").show();
									}


								})
								//return false;
		}
					
					//alert("a");
				});		
				
			}, 3000);
			
			
			<? if($dd_config->graph_all == '1'){ ?> 
			// get graph			
			setInterval(function(){ 
				
				$.get("<?=base_url()?>bet/get_odds_graph/<?=$id_jogo?>/<?=$id_mkt?>" , function(data){
					//alert(data);
					//$("#valor_total_only").text(data);
					$(".tb_partidas_graph").remove();
					$("#odds_graph").append(data);
					$(".pisc").show('slow');
					
					
					$(".btn-md").click(function(){
						//alert("OK 2 b");
						var id_select = $(this).attr('title');
						//var odd = $(this).parent().text();
						if($(this).hasClass('back')){
							var tipo = 'back';
						}
						if($(this).hasClass('lay')){
							var tipo = 'lay';
						}
							
							<? if($this->agent->is_mobile()){ ?>
								var modal_w = 200;
							<? }else{?>
								var modal_w = 600;
							<? } ?>
							
						
							$("#myModal").dialog({
								modal: true,
								
								minWidth: modal_w,
								minHeight: 200,
								dialogClass: "",
								show: "fadeIn"
							});
							$.get("<?=base_url()?>bet/get_selection_graph/<?=$id_mkt?>/"+id_select+"/"+tipo , function(graph){
								$("#cont_graph").html(graph);
								
								$(function() {
									"use strict";
								
									$(".sparkline-big-sel").sparkline('html', {
										type: 'line',
										width: '85%',
										height: '80',
										highlightLineColor: '#ffffff',
										lineColor: '#ffffff',
										fillColor: 'transparent',
										lineWidth: 1,
										spotColor: '#ffffff',
										minSpotColor: '#ffffff',
										maxSpotColor: '#ffffff',
										highlightSpotColor: '#000000',
										spotRadius: 4
									});
								
								});
								//alert("Va");
							});
                          /* 
						$("#basic-dialog").dialog({
							modal: true,
							minWidth: 500,
							minHeight: 200,
							dialogClass: "",
							show: "fadeIn"
						});
						*/
						//$('.ui-widget-overlay').addClass('bg-green opacity-60');
						

						
						//alert(id_select+" "+odd);
						
					})
					
					
					
					
					$(function() {
						"use strict";
					
						$(".sparkline-big").sparkline('html', {
							type: 'line',
							width: '85%',
							height: '80',
							highlightLineColor: '#ffffff',
							lineColor: '#ffffff',
							fillColor: 'transparent',
							lineWidth: 1,
							spotColor: '#ffffff',
							minSpotColor: '#ffffff',
							maxSpotColor: '#ffffff',
							highlightSpotColor: '#000000',
							spotRadius: 4
						});
					
					});
					
					$(function() {
						"use strict";
					
						$(".sparkline-bar-big-color").sparkline('html', {
							type: 'bar',
							height: '90',
							width: '85%',
							barWidth: 6,
							barSpacing: 2,
							zeroAxis: false,
							barColor: '#9CD159',
							negBarColor: '#9CD159'
						});
					
					});
					
					
					// chama as funções dos gráficos
					$(function() {
	
						// graficos PIE
						
						var dataSet_back = [
							
							<?
							include("includes/mysqli_con.php");
							$qr_distinct = mysqli_query($con,"SELECT DISTINCT selection_id, selection_name FROM odds_mkt WHERE id_mkt = ".$id_mkt." AND tipo = 'back' ");
							$cont_sel = 0;
							while ($selection = mysqli_fetch_assoc($qr_distinct)) { $cont_sel++;
								$nome_sel = $selection['selection_name'];
								$soma = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND selection_id = ".$selection['selection_id']." AND tipo = 'back' order by id desc LIMIT 10  ");
								$soma_total = mysqli_fetch_assoc($soma);
								
								// css
								if($cont_sel == 1){
									$color = 'success';
								}
								if($cont_sel == 2){
									$color = 'info';
								}
								if($cont_sel == 3){
									$color = 'danger';
								}
								if($cont_sel == 4){
									$color = 'gray';
								}
								if($cont_sel == 5){
									$color = 'primary';
								}
								if($cont_sel == 6){
									$color = 'success';
								}
								
								
								?>
								
								<? #if($row_size["tipo"] == 'back'){ ?>
									{label: "<?=$nome_sel." ".$cont_sel?>", data: <?=$soma_total['soma']?>, color: getUIColor('<?=$color?>') },
								<? #} ?>	
								<? /*if($row_size["tipo"] == 'lay'){ ?>
									{label: "<?=$nome_sel." selection_name"." "?>", data: 1119630000, color: getUIColor('danger') },
									
								<? } */ ?>	
								
								
								
								
								

								
							<? } // x wihle selection ?>

						];
						
						var dataSet_lay = [
							
							<?
							include("includes/mysqli_con.php");
							$qr_distinct = mysqli_query($con,"SELECT DISTINCT selection_id, selection_name FROM odds_mkt WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' ");
							$cont_sel = 0;
							while ($selection = mysqli_fetch_assoc($qr_distinct)) { $cont_sel++;
								$nome_sel = $selection['selection_name'];
								$soma = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND selection_id = ".$selection['selection_id']." AND tipo = 'lay' order by id desc LIMIT 10 ");
								$soma_total = mysqli_fetch_assoc($soma);
								
								// css
								if($cont_sel == 1){
									$color = 'success';
								}
								if($cont_sel == 2){
									$color = 'info';
								}
								if($cont_sel == 3){
									$color = 'danger';
								}
								if($cont_sel == 4){
									$color = 'gray';
								}
								if($cont_sel == 5){
									$color = 'primary';
								}
								if($cont_sel == 6){
									$color = 'warning';
								}
								
								
								?>
								
								<? #if($row_size["tipo"] == 'back'){ ?>
									{label: "<?=$nome_sel." ".$cont_sel?>", data: <?=$soma_total['soma']?>, color: getUIColor('<?=$color?>') },
								<? #} ?>	
								<? /*if($row_size["tipo"] == 'lay'){ ?>
									{label: "<?=$nome_sel." selection_name"." "?>", data: 1119630000, color: getUIColor('danger') },
									
								<? } */ ?>	
								
								
								
								
								
								//{label: "<? #=$row_size["selection_name"]?>", data: 1119630000, color: getUIColor('info') },
								
							<? } // x wihle selection ?>
							/*
							{label: "Asia", data: 1119630000, color: getUIColor('info') },
							{ label: "Latin America", data: 690950000, color: getUIColor('warning') },
							{ label: "Africa", data: 1012960000, color: getUIColor('danger') },
							{ label: "Oceania", data: 5100000, color: getUIColor('gray') },
							{ label: "Europe", data: 727080000, color: getUIColor('primary') },
							{ label: "North America", data: 344120000, color: getUIColor('success') }
							*/
						];
						
					
						
						var data = [],
							series = Math.floor(Math.random() * 5) + 3;
					
						for (var i = 0; i < series; i++) {
							data[i] = {
								label: "Series" + (i + 1),
								data: Math.floor(Math.random() * 100) + 1
							}
						}
						
						$.plot('#data-donut-1', dataSet_back, {
							series: {
								pie: {
									show: true
								},
							},
							tooltip: true,
							tooltipOpts: {
								content: "%p.0%, %s"
							},
							grid: {
								hoverable: true,
								clickable: true
							}
						});
					
						$.plot('#data-donut-2', dataSet_lay, {
							series: {
								pie: {
									show: true
								},
							},
							tooltip: true,
							tooltipOpts: {
								content: "%p.0%, %s"
							},
							grid: {
								hoverable: true,
								clickable: true
							}
						});
						
						
					
					});
					
					
					
					
				});		
				
			}, 6000);
			<? } ?>
		});
    </script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K3KFW8V');</script>
<!-- End Google Tag Manager -->

</head>


<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K3KFW8V"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="sb-site">

    <? include("includes/bet/favoritos.php"); ?>

<div class="sb-slidebar bg-black sb-right sb-style-overlay">
<? include("includes/bet/place_trader-din.php"); ?>
</div>
    <div id="loading">
        <div class="svg-icon-loader">
            <img src="<?=base_url()?>assets2/images/svg-loaders/puff.svg" width="40" alt="">
        </div>
    </div>
    
    <input type="text" id="status_place" value="" name="">
    
    

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
        $('#datatable-example').dataTable();
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
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });
	
	$(document).ready(function(){
		$(".favoritar").click(function(){
			var id_mkt_fav = $(this).attr('title');
			var fav = 0;
			if($(this).hasClass("icon-linecons-star")){
				$(this).removeClass('icon-linecons-star');
				$(this).addClass('icon-star');
				fav = 1;
				//alert("n fav");
			}else{
			
			//if($(this).hasClass("icon-star")){
				$(this).removeClass('icon-star');
				$(this).addClass('icon-linecons-star');
				fav = 0;
				//alert("fav");
			}
			$.post('<?=base_url()?>bet/set_fav' , {'id_mkt' : id_mkt_fav , 'id_evento' : <?=$id_jogo?>  } , function(data){
				//alert(data);
				
			})
			
			//alert("OK");
			
			//$(this).removeClass('icon-linecons-star');
			//$(this).addClass('icon-star');
			//alert(id_mkt_fav);
			return false;
		})
	})

</script>

<!-- Chart.js -->

<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-core.js"></script>-->
<?  #if($this->session->userdata('nivel') == '1'){  ?>    

<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-doughnut.js"></script>-->
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-demo-1.js"></script> -->



<!-- Flot charts -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-resize.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-stack.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-pie.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-tooltip.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-demo-1.js"></script> 




<script language="javascript">
$(function() {

    //Interacting with Data Points example

    var sin = [], cos = [];
	/*
    for (var i = 0; i < 554; i += 31) {
        sin.push([i, Math.random(i)]);
        cos.push([i, Math.random(i)]);
    }
	*/
	<?
	include("includes/mysqli_con.php");
	$qr_distinct = mysqli_query($con,"SELECT DISTINCT selection_id FROM odds_mkt");
	$cont_sel = 0;
	while ($selection = mysqli_fetch_assoc($qr_distinct)) { $cont_sel++;
		$qr_mkt = mysqli_query($con,"SELECT * FROM odds_mkt WHERE id_mkt = ".$id_mkt." AND selection_id = '".$selection['selection_id']."' AND tipo = 'back' ORDER BY dt asc ")or die(mysqli_error($con)); 
		while ($row_size = mysqli_fetch_assoc($qr_mkt)) {
		#echo ",".$row["odd"];
		?>
			<? #if($cont_sel == '0'){ ?>
				sin.push([<?=$row_size["tamanho"]?>, <?=$row_size["tamanho"]?>]);
			<? #} ?>	
			<? #if($cont_sel == '1'){ ?>
				//cos.push([<? #=$row_size["tamanho"]-10?>, <? #=$row_size["tamanho"]?>]);
			<? #} ?>	
		<? }  ?>
	<? } // x wihle selection ?>
	<?
	/*
	$this->db->order_by('dt','asc');
	$this->db->where('tipo','lay');
	$qr_graf = $this->db->get('odds_mkt');
	foreach($qr_graf->result() as $dd_graf){ ?>
		//sin.push([<?=$dd_graf->odd?>, <?=$dd_graf->odd?>]);
        cos.push([<?=$dd_graf->odd?>, <?=$dd_graf->odd?>]);
	<? } */ ?>
	/*

    var plot = $.plot($("#data-example-1"),
        [{ data: sin, label: "Back" }, { data: cos, label: "Lay" }], {
            series: {

                shadowSize: 0,
                lines: {
                    show: true,
                    lineWidth: 2
                },
                points: { show: true }
            },
            grid: {
                labelMargin: 10,
                hoverable: true,
                clickable: true,
                borderWidth: 1,
                borderColor: 'rgba(82, 167, 224, 0.06)'
            },
            legend: {
                backgroundColor: '#fff'
            },
            yaxis: { tickColor: 'rgba(0, 0, 0, 0.06)', font: {color: 'rgba(0, 0, 0, 0.4)'}},
            xaxis: { tickColor: 'rgba(0, 0, 0, 0.06)', font: {color: 'rgba(0, 0, 0, 0.4)'}},
            colors: [getUIColor('success'), getUIColor('gray')],
            tooltip: true,
            tooltipOpts: {
                content: "x: %x, y: %y"
            }
        });

    var previousPoint = null;
    $("#data-example-1").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));
    });

    $("#data-example-1").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });
*/

});
</script>
<? #}  ?>

<!-- Owl carousel -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.css">
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel-demo.js"></script>


        


<style type="text/css">
.set_odd{cursor:pointer}
/*
.tb_partidas{
	width:80%;
}

.tb_partidas td{
	border:black 1px solid;
	padding:5px;
	text-align:center;
	font-size:18px;
	width:100px;
	font-weight:bold
}

.tb_partidas td small{
	font-size:12px;
	font-weight:normal;
}
*/
</style>

<? if($this->agent->is_mobile()){ ?>
<div class="content-box">
	
    <h3 class="content-box-header" style="background-color:#ffb80c;color:#000">
        Trader Size
    </h3>
    
</div>
<? } ?>

<div class="row">
    <div class="col-md-12">


<div class="row">
	<div class="col-md-12">
        <div class="content-box">
            
            <h3 class="content-box-header content-box-header-alt bg-blue">
         
            <span class="icon-separator">
                <i class="glyph-icon icon-soccer-ball-o"></i>
            </span>
            <span class="header-wrapper">
                Bem vindo ao Evento -  <?=$dd_evento->evento?>
                <small title="<?=$dd_evento->id_competition?>">Início: 
				<? #=$this->padrao_model->converte_data(substr($dd_evento->inicio,0,10))?> | 
				<? #=substr($dd_evento->inicio,10,10)?>

                
                 <?														 
				$data_eve = substr($dd_evento->inicio,0,10);
				$hora_eve = substr($dd_evento->inicio,11,8);
				
				?>
				<? #=$data_eve?> <? #=$hora_eve?>
				<?=$data_eve?>
				<?
				$date_time  = new DateTime( $hora_eve );
				$diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
				echo $diff->format( '%H:%i:%S' ); // 05:10:00
                #=$this->padrao_model->get_by_matriz('id_competition',$dd_evento->id_competition,'betfair_competitions')->row()->nome
				?>
                </small>
            </span>
               
               <span class="header-buttons">
               <a target="_blank" style="color:#000" href="http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$id_mkt?>"> 
               <i class="glyph-icon icon-share-square"></i>
               </a> 
               |
               <a target="_blank" style="color:#000" href="<?=base_url()?>bet/clear_mkt/<?=$id_mkt?>"> 
               <i class="glyph-icon icon-remove" title="Limpar Dados do Mercado"></i>
               </a>
               </span>
            </h3>
            
        </div>
    </div>
</div>

<div class="row" style="display:none">
<iframe src="https://videoplayer.betfair.com/GetPlayer.do?tr=266&eID=<?=$this->uri->segment(3)?>&contentType=viz&contentOnly=true&statsToggle=show" width="500px" height="250px"></iframe>

</div>

<div class="content-box" style="display:none" >
	
    <h3 class="content-box-header" style="background-color:#ffb80c;color:#000">
        <a target="_blank" style="color:#000" href="http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$id_mkt?>"> 
          Bet In Betfair
        </a>
    </h3>
    
</div>

<!--
<div class="row">
	<div class="col-md-12">	
		<iframe src="https://www.betfair.com/exchange/plus/pop-out-live-stream/28751087?feedType=matchStats"></iframe>
	</div>
</div>
-->

<div class="row">
    <div class="col-md-12">
		<div class="content-box" >
        
        
        <h3 class="content-box-header content-box-header-alt bg-blue">
            <span class="icon-separator">
            	<a href="https://tradersize.com/betfair/2018/05/22/como-usar-a-betfair-tradersize/" target="_blank">
	                <i class="glyph-icon icon-question" style="color: #fff" title="Ajuda"></i>
	            </a>
            </span>
            <span class="header-wrapper">
                Modos de visualizações
                <small>Modo de visualização das Odds: <?=$type?></small>
            </span>
			
			 <? if ($this->agent->is_mobile() == true ){ ?>
			 <div class="form-group">
                		<select name="sel_mod" id="sel_mod" class="form-control" style="width: 50%;margin-left: 70px">
                			<? if($type == '' || $type == 'basic'){ $sel_mod = 'selected'; }else{ $sel_mod = ''; } ?>
                			<option selected="<?=$sel_mod?>"  class="" value="<?=base_url()?>bet/betjogo/<?=$id_jogo.'/'.$id_mkt?>">Basic</option>
                			<? if($type == 'box'){ $sel_mod = 'selected'; }else{ $sel_mod = ''; } ?>
                			
                			<option selected="<?=$sel_mod?>" class="form-control" value="<?=base_url()?>bet/betjogo/<?=$id_jogo.'/'.$id_mkt.'/box'?>">Boxs </option>
                			<!--
                			<? if($type == 'vertical'){ $sel_mod = 'selected'; }else{ $sel_mod = ''; } ?>
                			<option selected="<?=$sel_mod?>" class="form-control"  value="<?=base_url()?>bet/betjogo/<?=$id_jogo.'/'.$id_mkt.'/vertical'?>">Odds Verticais</option> -->
                		</select>
                		<script type="text/javascript">
                			$(document).ready(function(){
                				//alert("Ops1");
                				$("#sel_mod").change(function(){
                					var url = $(this).val();
                					//alert(url);
                					location.href=url;
                					
                				})
                			})
                		</script>
			</div>
			<?  } else { ?>
            <span class="header-buttons">
            <!--
                <a href="#" class="btn btn-sm btn-link font-white" title="">Link</a>
                <a href="#" class="btn btn-sm btn-default no-border" title="">Small</a>
            -->    
                


              

	                <? 
					if (($this->agent->is_mobile() &&  $type == '') || ($type == 'basic')  ){ $class_act_mod = 'btn-default no-border'; }else{  $class_act_mod = 'btn-link font-white'; }
					?>
					<a href="<?=base_url()?>bet/betjogo/<?=$id_jogo.'/'.$id_mkt.'/basic'?>" class="btn btn-sm btn-hover glyph-icon icon-tablet <?=$class_act_mod?>">
						<span>Modo Básico</span>
						<!--<i class="glyph-icon icon-tablet"></i>-->
					</a>
					
					<? 
					if ((!$this->agent->is_mobile() &&  $type == '') || ($type == 'box')  ){ $class_act_mod = 'btn-default no-border'; }else{  $class_act_mod = 'btn-link font-white'; }
					?>
					
					<a href="<?=base_url()?>bet/betjogo/<?=$id_jogo.'/'.$id_mkt.'/box'?>" class="btn btn-sm btn-hover glyph-icon icon-tasks <?=$class_act_mod?>">
						<span>Modo Box</span>
						<!--<i class="glyph-icon icon-tasks"></i>-->
					</a>
					
					<? 
					if ( $type == 'vertical'  ){ $class_act_mod = 'btn-default no-border'; }else{  $class_act_mod = 'btn-link font-white'; }
					?>
					<a href="<?=base_url()?>bet/betjogo/<?=$id_jogo.'/'.$id_mkt.'/vertical'?>" class="btn btn-sm btn-hover glyph-icon icon-sort-amount-desc <?=$class_act_mod?>">
						
						<span>Odds Verticais</span>
						<!--<i class="glyph-icon icon-sort-amount-desc"></i>-->
					</a>
            </span>
            <? } ?>
        </h3>
        
        
	
</div>
	</div>
</div>

	</div>
</div>


<div class="row">
    <div class="col-md-12">
        
        
        <div class="panel">
       	    <!-- DEFINIR MERCADO SUSPENSO -->
            <div class="panel-body" style="background-color:#">
            
            <div id="loading_cont" class="" style="border:red 0px solid;width:120px;height:120px;display:block" >
                <div class="svg-icon-loader">
                    <!--<img src="<?=base_url()?>assets2/images/svg-loaders/puff.svg" width="40" alt="">-->
                    <img src="<?=base_url()?>assets2/images/svg-loaders/ball-triangle.svg">
                </div>
            </div>
            
             <!-- MODAL -->
             <div class="example-box-wrapper">
                <div class="modal" id="myModal" role="dialog" aria-labelledby="myModalLabel">
                <!--<div class="modal" id="myModal" aria-labelledby="myModalLabel">-->
                   <!-- <div class="modal-dialog">-->
                        <div class="modal-content">
                            <div class="modal-header">                             
                                <h4 class="modal-title">Gráfico Completo</h4>
                            </div>
                            <div class="modal-body" id="cont_graph">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <!--<button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    <!--</div>-->
                </div>
             </div>   
            
            
            
            <!--
            <p><?=$this->session->userdata("token")?></p>
            <p><?=$this->session->userdata("token_type")?></p>
            -->
            
                <div id='odds'></div>

                <div id="legends">
	                	<div class="panel-body">
		                <h3 class="title-hero">
		                    Legenda dos Percentuais correspondidos na soma BACK ou LAY:
		                </h3>


	                	<div class="example-box-wrapper">	

	                	<div class="row" style="font-size: 12px;font-family: arial;text-align: right;"> 

	                		<div class="col-md-3">              
			                    <button class="btn btn-success">
			                        <i class="glyph-icon icon-money
			                        "></i>
			                    	<div class="ripple-wrapper"></div>
			                	</button>
			                	Mais de 85% 
							</div>
							<div class="col-md-3">  

			                    <button class="btn btn-info">
			                        <i class="glyph-icon icon-money"></i>
			                    </button>
			                    Entre 65% e 85%
			                </div>
							<div class="col-md-3">              
			                    <button class="btn btn-danger">
			                        <i class="glyph-icon icon-money"></i>
			                    </button>
			                    Entre 30% e 65% 
		                   </div>
							<div class="col-md-3">  
			                    <button class="btn btn-purple">
			                        <i class="glyph-icon icon-money"></i>
			                    </button>
			                    Menos de 30%
			                </div>
		                </div>
	                </div>
                </div>
                </div>
                
              	<div id="odds_graph"></div>          
                
                
              </div>
                    
              <div class="" id="basic-dialog" title="Apostar" aria-hidden="true" style="display:none;width:30%">
                        <div class="pad10A">
                        
                            <input type="hidden" id="id_select" value="" >
                            <input type="hidden" id="id_mkt" value="<?=$id_mkt?>" >
                            <input type="hidden" id="tipo"  >
                            <!--
                            <input type="number" id="odd_place"   placeholder="Odd">
                            <input type="number"  id="valor_place" value="" placeholder="Valor">
                            -->
                            <div class="input-group bootstrap-touchspin">
                            
                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                            	<input id="odd_place" placeholder="Odd" class="form-control" value="" name="touchspin-demo-4" style="display: block;" type="number" step="0.01"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;">
                            </span>
                                <span class="input-group-btn-vertical"  style="display:none">
                                    <button class="btn btn-default bootstrap-touchspin-up" type="button">
                                        <i class="glyph-icon icon-plus"></i><div class="ripple-wrapper"></div>
                                    </button>
                                    <button class="btn btn-default bootstrap-touchspin-down" type="button">
                                        <i class="glyph-icon icon-minus"></i>
                                    </button>
                                </span>
                            </div>
                            
                            
                            <div class="input-group bootstrap-touchspin">
                            
                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                            	<input id="valor_place" placeholder="Valor" class="form-control" value="" name="touchspin-demo-4" style="display: block;" type="number" step="0.01"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;">
                            </span>
                                <span class="input-group-btn-vertical" style="display:none">
                                    <button class="btn btn-default bootstrap-touchspin-up" type="button">
                                        <i class="glyph-icon icon-plus"></i><div class="ripple-wrapper"></div>
                                    </button>
                                    <button class="btn btn-default bootstrap-touchspin-down" type="button">
                                        <i class="glyph-icon icon-minus"></i>
                                    </button>
                                </span>
                            </div>
                            
                            
                            
                        </div>
                        
                        <div class="pad15A">
                            <div class="divider mrg15T mrg15B"></div>
                            <div class="text-center">
                                    <!--<i class="glyph-icon icon-linecons-money"></i>-->
                                    <!--<button type="button"  class="btn btn-blue btn-file" >Apostar</button>-->
                                    <button type="button" class="btn btn-success active" data-toggle="button" id="bt_place">Apostar<div class="ripple-wrapper"></div></button>
                    
                            </div>
                        </div>
                        <p align="center"><button class="btn btn-primary  sb-open-right bt_apostas" style="display:none">
                            Visualizar Apostas
                            <div class="ripple-wrapper"></div>
                        </button></p>
                       
                            <div class="tile-box tile-box-alt bg-green">
                                <div class="tile-header" id="result_place">
                                    Resultado
                                </div>
                                <div class="tile-content-wrapper" id="result_place-antigo">
                                    <i class="glyph-icon icon-linecons-money"></i>
                                    
                                    <div class="tile-content">
                                        <span>$</span>
                                        <label id="calc"></label>
                                    </div>
                                    <small id="dd_lay" style="display:none">
                                        <i class="glyph-icon icon-caret-up"></i>
                                        +<label id="lay_responsabilidade"></label> responsabilidade
                                    </small>
                                    <small>
                                        <i class="glyph-icon icon-caret-up"></i>
                                        <label id="lucro_percentual"></label>
                                    </small>
                                
                                	
                   </div> <!-- X COL painel -->
            
	          </div> <!-- X COL 12 -->
          
        </div> <!-- X COL 12 -->
              
              
              
             

                    
                    <div class="panel mrg20T" style="display:none">
                        <div class="panel-body">
                            <h3 class="title-hero">
                                Gráfico das Odds
                                
                            </h3>
                            <div class="example-box-wrapper">
                                <div id="data-example-1" class="mrg20B" style="width: 100%; height: 300px;"></div>
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

<!--  MODAL -->
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/dialog/dialog.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/dialog/dialog-demo.js"></script>

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


<!-------------->
<!-- Chart.js -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-core.js"></script>
<?  #if($this->session->userdata('nivel') == '1'){  ?>    
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-doughnut.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/chart-js/chart-demo-1.js"></script> -->



<!-- Flot charts

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-resize.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-stack.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-pie.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-tooltip.js"></script>
<!-- <script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/flot/flot-demo-1.js"></script> -->

</div>
</body>
</html>