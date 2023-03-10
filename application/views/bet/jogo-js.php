<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title>Trade BACK-UP JS</title>
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

	<script type="text/javascript" src="<?=base_url()?>assets2/betfair.js"></script>
	<script language="javascript">
    
	
    </script>
    <script type="text/javascript">
        $(window).load(function(){
			
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        	
			//DemoApiNgClient();
			
			//$("#testejs").html(findHorseRaceId());
			

		
			setInterval(function(){ 
				//alert("Hello"+<?=$id_jogo?>+" - "+<?=$id_mkt?>); 
				//total = total + 10;
				
				
				
				
				$.get("http://www.xbitcompany.com/bet/get_odds_graph/<?=$id_jogo?>/<?=$id_mkt?>" , function(data){
					//alert(data);
					//$("#valor_total_only").text(data);
					$(".tb_partidas").remove();
					$("#odds").append(data);
					$(".pisc").show('slow');
					
					
					// por MIM
					//alert("OK 1 a");
					
					$(".set_odd").click(function(){
						//alert("OK 2 b");
						var id_select = $(this).attr('title');
						//var odd = $(this).parent().text();
						var odd = $(this).children().first().html();
						//alert(odd);
						//var odd =  = $(this).attr('dir');
						//var odd = $(this+":first").html();
						
						if($(this).hasClass('back')){
							var tipo = 'BACK';
						}
						
						if($(this).hasClass('lay')){
							var tipo = 'LAY';
						}
						alert(odd);
						
						$("#odd_place").val(odd);
						$("#id_select").val(id_select);
						$("#tipo").val(tipo);
                           
						$("#basic-dialog").dialog({
							modal: true,
							minWidth: 500,
							minHeight: 200,
							dialogClass: "",
							show: "fadeIn"
						});
						$('.ui-widget-overlay').addClass('bg-green opacity-60');
						
						$("#valor_place").focus();
						
						
						$("#bt_place").click(function(){
							
							//alert(tipo);
							var id_mkt = $("#id_mkt").val();
							var id_selection = $("#id_select").val();
							var tipo = $("#tipo").val();
							var size = $("#odd_place").val();
							var valor = $("#valor_place").val();
							alert(parseFloat(size)+" "+parseFloat(valor));
							$.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){
								$("#result_place").html(data);
							})
							//return false;
						})
						
						//alert(id_select+" "+odd);
						
					})
					
			
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
					
					
					//alert("a");
				});		
				
			}, 20000);
		
		});
    </script>



</head>


<body>
<div id="sb-site">
    
    <? include("includes/bet/favoritos.php"); ?>

<div class="sb-slidebar bg-black sb-right sb-style-overlay">
<? include("includes/bet/place_trader.php"); ?>
</div>
    <div id="loading">
        <div class="svg-icon-loader">
            <img src="<?=base_url()?>assets2/images/svg-loaders/bars.svg" width="40" alt="">
        </div>
    </div>

    <div id="page-wrapper">
        <div id="mobile-navigation">
    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
</div>
<? require_once('includes/betapi/jsonrpc-futbol.php');  ?>
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
	
	$qr_distinct = mysql_query("SELECT DISTINCT selection_id FROM odds_mkt");
	$cont_sel = 0;
	while ($selection = mysql_fetch_assoc($qr_distinct)) { $cont_sel++;
		$qr_mkt = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = ".$id_mkt." AND selection_id = '".$selection['selection_id']."' AND tipo = 'back' ORDER BY dt asc ")or die(mysql_error()); 
		while ($row_size = mysql_fetch_assoc($qr_mkt)) {
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


});
</script>
<? #}  ?>
<!-- Sparklines charts -->

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines-demo.js"></script>

<!-- Owl carousel -->

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.css">
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel-demo.js"></script>


        


<style type="text/css">
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

<div id="page-title">
    <h2><?=$id_jogo?></h2>
    <p>Bem vindo a Partida</p>

</div>

<div class="row">
    <div class="col-md-12">
        
        <div class="panel">
            <div id="page-title">
                <h2>
                <?
                // mostra o padrão
				/*
					foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_jogo,$query="MATCH_ODDS") as $odd){ 
									
									
										echo  $odd->marketName;
									
										
								}
				*/
				?>
                
                </h2>
                
                <div id="testejs"></div>
                
            
            </div>
            <div class="panel-body">
                <div id='odds'></div>
                <?
				if(isset($id_mkt)){
					
					
					foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 
								
						#echo "<h2>";
							#echo  $odd->marketName."[".$odd->selectionId."]".$odd->marketId;
							#echo "<p id='odds'>";
							//print_r($odd);
							########## 	MOSTRA AS ODDS
							$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
							$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
						#	echo "</p>";
						#echo "</p>";
					}
					
				}else{ 
					// mostra o padrão
					foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_jogo,$query="MATCH_ODDS") as $odd){ 
									$id_mkt = $odd->marketId;
									echo "<h2>";
										echo  $odd->marketName."[".$odd->selectionId."]".$odd->marketId;
										echo "<p id='odds'>";
										//print_r($odd);
										########## 	MOSTRA AS ODDS
										$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
										$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
										echo "</p>";
								}
								
				}
				?>
                        
                        
                        
              </div>
                    
              <div class="" id="basic-dialog" title="Apostar">
                        <div class="pad10A">
                        
                            <input type="text" id="id_select" value="" >
                            <input type="text" id="id_mkt" value="<?=$id_mkt?>" >
                            <input type="text" id="tipo"  >
                            <input type="number" id="odd_place"   placeholder="Odd">
                            <input type="number"  id="valor_place" value="" placeholder="Valor">
                            
                        </div>
                        
                        <div class="pad15A">
                            <div class="divider mrg15T mrg15B"></div>
                            <div class="text-center">
                                    <i class="glyph-icon icon-refresh"></i>
                                    <button type="button"  class="btn btn-default btn-file" id="bt_place">Apostar</button>
                    
                            </div>
                        </div>
                        
                       
                            <div class="tile-box tile-box-alt bg-green">
                                <div class="tile-header">
                                    Resultado
                                </div>
                                <div class="tile-content-wrapper" id="result_place">
                                    <i class="glyph-icon icon-tag"></i>
                                    <div class="tile-content">
                                        <span>$</span>
                                        120
                                    </div>
                                    <small>
                                        <i class="glyph-icon icon-caret-up"></i>
                                        +7,6% descrição do ganho
                                    </small>
                                </div>
                            </div>
                        
                    </div>
                    
                    <div class="panel mrg20T">
                        <div class="panel-body">
                            <h3 class="title-hero">
                                Gráfico das Odds
                                
                            </h3>
                            <div class="example-box-wrapper">
                                <div id="data-example-1" class="mrg20B" style="width: 100%; height: 300px;"></div>
                            </div>
                        </div>
                    </div>
                    <? 
					 // monta os graficos de acordo com o id da seleção
					 $f = 0;
					 $ff = 0;
					$runners = getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt);
					foreach ($runners->runners as $runner) { $f++;
						foreach ($runner->ex->availableToBack as $availableToBack){ $ff++;
							if( $ff == 1 || $ff == 4 || $ff == 7){
							echo "<h1 title='".$runner->selectionId."'>".$runners->runnerName." ".$runner->selectionId."</h1>";
						?>	
                        
                        
                        
                        <div class="example-box-wrapper">
                                        <div class="row">
                                        <!-- BACK -->
                                                <div class="col-md-4">
                                                    <div class="dashboard-box bg-blue-alt">
                                                        <div class="content-wrapper">
                                                            <div class="header">
                                                                Back
                                                                <span><?=$runner->selectionId?></span>
                                                            </div>
                                                            <div class="sparkline-big">
                                                            <?	
                                                                $this->db->order_by('dt','desc');
																$this->db->limit('999');
                                                                $where_odd = array('tipo'=> 'back' , 'selection_id' => $runner->selectionId);
                                                                $this->db->where($where_odd);
																$qr_graf = $this->db->get('odds_mkt');
                                                                foreach($qr_graf->result() as $dd_graf){ ?><?=$dd_graf->odd?>,<? } echo $dd_graf->odd; ?>
                                                          </div>
                                                        </div>
                                                        <div class="button-pane">
                                                            <div class="size-md float-left heading">
                                                                Back: <?=$qr_graf->num_rows()?>
                                                            </div>
                                                            <a href="#" class="btn btn-info float-right tooltip-button" data-placement="top" title="Remove comment">
                                                                <i class="glyph-icon icon-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                <div class="dashboard-box bg-white content-box">
                                                        <div class="content-wrapper">
                                                            <div class="header">
                                                                Volume
                                                                <span>Back</span>
                                                            </div>
                                                            <div class="center-div sparkline-bar-big-color">
                                                            <?	
                                                                $this->db->order_by('dt','desc');
																$this->db->limit('999');
                                                                $where_odd = array('tipo'=> 'back' , 'selection_id' => $runner->selectionId);
                                                                $this->db->where($where_odd);
																$qr_graf = $this->db->get('odds_mkt');
																$total_volume_back = 0;
                                                                foreach($qr_graf->result() as $dd_graf){ $total_volume_back += $dd_graf->tamanho; ?><?=$dd_graf->tamanho?>,<? }  
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="button-pane">
                                                            <div class="size-md float-left heading">
                                                                <?=number_format($total_volume_back, 2, ',', '.')?>
                                                            </div>
                                                            <a href="#" class="btn btn-info float-right tooltip-button" data-placement="top" title="Remove comment">
                                                                <!-- <i class="glyph-icon icon-plus"></i>-->
                                                                <?=$qr_graf->num_rows()?>
                                                            </a>
                                                        </div>
                                                  </div>
                                                </div>
                                                
                                                <!--- LAY -->
                                                
                                                <div class="col-md-2">
                                                <div class="dashboard-box bg-white content-box">
                                                        <div class="content-wrapper">
                                                            <div class="header">
                                                                Volume
                                                                <span>Lay</span>
                                                            </div>
                                                            <div class="center-div sparkline-bar-big-color">
                                                            <?	
                                                                $this->db->order_by('dt','desc');
																$this->db->limit('999');
                                                                $where_odd = array('tipo'=> 'lay' , 'selection_id' => $runner->selectionId);
                                                                $this->db->where($where_odd);
																$qr_graf = $this->db->get('odds_mkt');
																$total_volume_lay = 0;
                                                                foreach($qr_graf->result() as $dd_graf){ $total_volume_lay += $dd_graf->tamanho;  ?><?=$dd_graf->tamanho?>,<? }  
                                                            ?>
                                                            </div>
                                                        </div>
                                                        <div class="button-pane" >
                                                            <div class="size-md float-left heading">
                                                                <?=number_format($total_volume_lay, 2, ',', '.')?>
                                                            </div>
                                                            <a href="#" class="btn btn-info float-right tooltip-button" data-placement="top" title="Remove comment">
                                                                <!-- <i class="glyph-icon icon-plus"></i>-->
                                                                <?=$qr_graf->num_rows()?>
                                                            </a>
                                                        </div>
                                                  </div>
                                                </div>
                                                
                                                
                                                <div class="col-md-4">
                                                    <div class="dashboard-box bg-orange">
                                                        <div class="content-wrapper">
                                                            <div class="header">
                                                                Lay
                                                                <span><?=$runner->selectionId?></span>
                                                            </div>
                                                            <div class="sparkline-big">
                                                            <?	
                                                                $this->db->order_by('dt','desc');
																$this->db->limit('999');
                                                                $where_odd = array('tipo'=> 'lay' , 'selection_id' => $runner->selectionId);
                                                                $this->db->where($where_odd);
																$qr_graf = $this->db->get('odds_mkt');
                                                                foreach($qr_graf->result() as $dd_graf){ ?><?=$dd_graf->odd?>,<? } echo $dd_graf->odd;  ?>
                                                            </div>
                                                        </div>
                                                        <div class="button-pane">
                                                            <div class="size-md float-left heading">
                                                                Lay: <?=$qr_graf->num_rows()?>
                                                            </div>
                                                            <a href="#" class="btn btn-black float-right tooltip-button" data-placement="left" title="Remove comment">
                                                                <i class="glyph-icon icon-cog"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                          </div>
                        </div>
                         <? } // x if ?>           
                        
						<? }
					}
					?>
                    
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

</div>
</body>
</html>