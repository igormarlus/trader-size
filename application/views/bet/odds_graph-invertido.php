<?php header('Access-Control-Allow-Origin: *');?>
<? if($dd_user_config->graph_odds == 1){ $sel_g_odd  = 'btn-info'; }else{ $sel_g_odd = ''; } ?>
<a href="<?=base_url()?>bet/set_conf_user_graph/<?=$id_jogo?>/<?=$id_mkt?>/1" class="btn <?=$sel_g_odd?> float-right  tb_partidas_graph">
    By Price
</a>


<? if($dd_user_config->graph_odds == 0){ $sel_g_odd  = 'btn-info'; }else{ $sel_g_odd = ''; } ?>
<a href="<?=base_url()?>bet/set_conf_user_graph/<?=$id_jogo?>/<?=$id_mkt?>/0" class="btn <?=$sel_g_odd?> float-right  tb_partidas_graph">
    By Size
</a>
<h3 class='tb_partidas_graph title-hero' title="<? #=$runner->selectionId?>"><? #=$runner->runnerName?></h3>
    <div class="example-box-wrapper tb_partidas_graph">
        <div class="scroll-columns">
            <div class='tb_partidas_graph table table-bordered table-striped table-condensed cf' style='border:black 0px solid;width:100%'> 
<?
require_once('includes/betapi/jsonrpc-futbol.php'); 
$qr_distinct = mysql_query("SELECT DISTINCT selection_id, selection_name FROM odds_mkt WHERE id_mkt = $id_mkt AND tipo = 'back'");
	$cont_sel = 0;
	while ($selection = mysql_fetch_assoc($qr_distinct)) { $cont_sel++;
		$selectionId = $selection['selection_id'];
				?>
                    
                    
                    <?
					
							$qr_selection_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'back'")or die(mysql_error()); 
							$selection_num = mysql_num_rows($qr_selection_num);
							if($selection_num > 20){
								$inicio = $selection_num - 10;
							}else{
								$inicio = 0;
							}
							$qr_selection = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'back' ORDER BY id asc  LIMIT $inicio,10 ")or die(mysql_error()); 
							
							$qr_selection_vol = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'back' ORDER BY id asc LIMIT 500 ")or die(mysql_error()); 
					?>
                            <!--- DADOS BACK-->
                            
                            
                            <div class="example-box-wrapper">
                                        <div class="row">
                                            <div class="col-md-6">
                                                                <div class="dashboard-box bg-blue">
                                                                    <div class="content-wrapper">
                                                                        <div class="header">
                                                                            Back  <strong title="Odds registradas">(<?=$selection_num?>)</strong>
                                                                            <span><?=$selection['selection_name']?></span>
                                                                        </div>
                                                                        <div class="sparkline-big">
                                                                        <? while ($row = mysql_fetch_assoc($qr_selection)) {
                                                                           	echo $row["tamanho"].",";
																			$last =  $row["tamanho"];
																			
                                                                           }
																		   echo $last;
																		   ?>
                                                                  
                                                                            
                                                                      </div>
                                                                    </div>
                                                                    <div class="button-pane">
                                                                        <div class="size-md float-left heading">
                                                                            Back: <?=$selection['selection_name']?>
                                                                        </div>
                                                                        <a href="#" class="btn btn-info float-right tooltip-button btn-md back" data-placement="top" data-toggle="modal" data-target="#myModal" title="<?=$selectionId?>">
                                                                            <i class="glyph-icon icon-plus"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            
                                            <div class="col-md-6">
                                            <div class="dashboard-box bg-white content-box">
                                                    <div class="content-wrapper">
                                                        <div class="header">
                                                            Volume
                                                            <span>Back</span>
                                                        </div>
                                                        <div class="center-div sparkline-bar-big-color">
														<? $total_vol_back = 0; while ($row_vol = mysql_fetch_assoc($qr_selection_vol)) { $total_vol_back += $row_vol["tamanho"];
																if($row_vol["tamanho"] > 0){
																	echo $row_vol["tamanho"].",";	
																	$last =  $row_vol["tamanho"];
																}
															   } // x while
															   echo $last;
															   ?>
                                                       
                                                        </div>
                                                    </div>
                                                    <div class="button-pane">
                                                        <div class="size-md float-left heading">
                                                        <?
														$soma = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 500  ");
														$soma_total = mysql_fetch_assoc($soma);
                                                        ?>
                                                            $<?=number_format($soma_total['soma'], 2, ',', '.')?>
                                                        </div>
                                                        <a href="#" class="btn btn-info float-right tooltip-button" data-placement="top" title="Remove comment">
                                                            <!-- <i class="glyph-icon icon-plus"></i>-->
                                                            <?=$selection['selection_name']?>
                                                        </a>
                                                    </div>
                                              </div>
                                            </div>
                            
										</div>
                            </div>                                        
                           
					<?
						
                    }
					$L = 0;


$qr_distinct_lay = mysql_query("SELECT DISTINCT selection_id, selection_name FROM odds_mkt WHERE id_mkt = $id_mkt AND tipo = 'lay'");
	$cont_sel = 0;
	while ($selection = mysql_fetch_assoc($qr_distinct_lay)) {
	$selectionId = $selection['selection_id'];
					
						#if($L == 1){
						$qr_selection_lay = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 10 ")or die(mysql_error()); 	
						$qr_selection_vol_lay = mysql_query("SELECT * FROM odds_mkt WHERE  id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 500 ")or die(mysql_error()); 	
						
						$qr_selection_num_lay = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$selectionId." AND tipo LIKE 'lay'")or die(mysql_error()); 
						
						$selection_num_lay = mysql_num_rows($qr_selection_num_lay);
						
						?>
							
                            	<div class="example-box-wrapper">
                                        <div class="row">
                                            <!--- LAY -->
                                               
                                            <div class="col-md-6">
                                            <div class="dashboard-box bg-white content-box">
                                                    <div class="content-wrapper">
                                                        <div class="header">
                                                            Volume
                                                            <span>Lay</span>
                                                        </div>
                                                        <div class="center-div sparkline-bar-big-color">
                                                        <? $total_lay = 0; while ($row = mysql_fetch_assoc($qr_selection_vol_lay)) { $total_lay += $row["tamanho"];		
																	if( $row["tamanho"] > 0){
                                                                           	echo $row["tamanho"].",";
																			$last =  $row_vol["tamanho"];
																	}
                                                                           }
																		   echo $last;
																		   ?>
                                                                           
                                                        <?	
                                                        /*
                                                            $this->db->order_by('dt','desc');
                                                            $this->db->limit('999');
                                                            $where_odd = array('tipo'=> 'lay' , 'selection_id' => $runner->selectionId);
                                                            $this->db->where($where_odd);
                                                            $qr_graf = $this->db->get('odds_mkt');
                                                            $total_volume_lay = 0;
                                                            foreach($qr_graf->result() as $dd_graf){ $total_volume_lay += $dd_graf->tamanho;  ?><?=$dd_graf->tamanho?>,<? }  
                                                            */
                                                        ?>
                                                        </div>
                                                    </div>
                                                    <div class="button-pane">
                                                        <div class="size-md float-left heading">
                                                        <?
														$soma = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 10  ");
														$soma_total = mysql_fetch_assoc($soma);
                                                        ?>
                                                            $<?=number_format($soma_total['soma'], 2, ',', '.')?>
                                                        </div>
                                                        <a href="#" class="btn btn-info float-right tooltip-button" data-placement="top" title="Remove comment">
                                                        <?=$selection['selection_name']?>
                                                            <!-- <i class="glyph-icon icon-plus"></i>-->
                                                            <? #=$qr_graf->num_rows()?>
                                                        </a>
                                                        
                                                    </div>
                                              </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-6">
                                                <div class="dashboard-box bg-primary">
                                                    <div class="content-wrapper">
                                                        <div class="header">
                                                            Lay <strong title="Odds registradas">(<?=$selection_num_lay?>)</strong>
                                                            <span><?=$selection['selection_name']?></span>
                                                        </div>
                                                        <div class="sparkline-big">
														<? while ($row_vol_lay = mysql_fetch_assoc($qr_selection_lay)) {
															echo $row_vol_lay["tamanho"].",";
															$last = $row_vol_lay["tamanho"];
														   }
														   echo $last;
														?>
                                                           
                                                        <?	
                                                        /*
                                                            $this->db->order_by('dt','desc');
                                                            $this->db->limit('999');
                                                            $where_odd = array('tipo'=> 'lay' , 'selection_id' => $runner->selectionId);
                                                            $this->db->where($where_odd);
                                                            $qr_graf = $this->db->get('odds_mkt');
                                                            foreach($qr_graf->result() as $dd_graf){ ?><?=$dd_graf->odd?>,<? } echo $dd_graf->odd;  */ ?>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="button-pane">
                                                        <div class="size-md float-left heading">
                                                            Lay: <?=$selection['selection_name']?>
                                                        </div>
                                                        <a href="#" class="btn btn-info float-right tooltip-button btn-md lay" data-placement="top" data-toggle="modal" data-target="#myModal" title="<?=$selectionId?>">
                                                                            <i class="glyph-icon icon-plus"></i>
                                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
		                                </div>
                                </div>
                           
						<?
						#}
                    }
					?>
					
            <h2 class="title-hero tb_partidas_graph" title="">
                <? #=$odd->marketName?>
            </h2>
            <?
			#echo "<small class='tb_partidas_graph'>MarketId: " . $odd->marketId."</small>";
			#foreach ($odd->runners as $runner) {
			
			?>	
				
                            <? #=printAvailablePrices($runner->selectionId, $marketBook,$odd->marketId) ?>
                        
                        </div>
                </div>
                </div>
			<?
          #  }
			
				
				

?>

<div class="col-md-6 tb_partidas_graph">
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Volumes por Seleções (Geral) - Back
            </h3>
            <div class="example-box-wrapper clearfix">
                <div id="data-donut-1" style="width: 100%; height: 200px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6 tb_partidas_graph" >
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Volumes por Seleções (Geral) - Lay
            </h3>
            <div class="example-box-wrapper clearfix">
                <div id="data-donut-2" style="width: 100%; height: 200px;"></div>
            </div>
        </div>
    </div>
</div>





<!--
<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Volume por Seleção
            </h3>
            <div class="example-box-wrapper">
                <div id="hero-area" class="graph"></div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
            Odds
            </h3>
            <div class="example-box-wrapper">
                <div id="data-example-3" style="width: 100%; height: 344px;"></div>
            </div>
        </div>
    </div>
</div>
-->



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
	/*
	$this->db->order_by('dt','asc');
	$this->db->where('tipo','back');
	$qr_graf = $this->db->get('odds_mkt');
	foreach($qr_graf->result() as $dd_graf){ ?>
		sin.push([<?=$dd_graf->odd?>, <?=$dd_graf->odd?>]);
        cos.push([<?=$dd_graf->odd?>, <?=$dd_graf->odd?>]);
	<? }  */ ?>
	
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
<!-- Sparklines charts -->
<!--
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines-demo.js"></script>

<!-- Owl carousel -->
<!--
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.css">
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/owlcarousel/owlcarousel-demo.js"></script>
-->
<!--
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/morris/morris.js"></script>
<!-- Morris charts demo 
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/morris/morris-demo.js"></script>
-->