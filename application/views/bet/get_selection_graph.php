<?php header('Access-Control-Allow-Origin: *');?>
<h3 class=' title-hero' title="<? #=$runner->selectionId?>"><? #=$runner->runnerName?></h3>
    <div class="example-box-wrapper ">
        <div class="scroll-columns">
            <div class=' table table-bordered table-striped table-condensed cf' style='border:black 1px solid;width:100%'> 
<?
require_once('includes/betapi/jsonrpc-futbol.php'); 
#$qr_distinct = mysql_query("SELECT DISTINCT selection_id, selection_name FROM odds_mkt WHERE id_mkt = $id_mkt AND tipo = 'back'");
	$cont_sel = 0;
	#while ($selection = mysql_fetch_assoc($qr_distinct)) { $cont_sel++;
	#	$selectionId = $selection['selection_id'];
				?>
                    
                    <?
							
							$qr_selection = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$id_selection." AND tipo LIKE '".$tipo."' ORDER BY id asc  LIMIT 500 ")or die(mysql_error()); 
							#$qr_selection_vol = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$id_selection." AND tipo LIKE '".$tipo."' ORDER BY id desc LIMIT 100 ")or die(mysql_error()); 
							
							#$soma_valume_graph = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = $id_mkt AND selection_id = ".$id_selection." AND tipo LIKE '".$tipo."' order by dt desc LIMIT 100  ");
							
							$qr_selection_sum = mysql_query("SELECT SUM(tamanho) as total FROM odds_mkt WHERE id_mkt = $id_mkt AND selection_id = ".$id_selection." AND tipo LIKE '".$tipo."' ORDER BY id desc  LIMIT 100 ")or die(mysql_error()); 
							$soma_total = mysql_fetch_assoc($qr_selection_sum);
							
					?>
                            <!--- DADOS BACK-->
                            
                            
                            <div class="example-box-wrapper">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <?
                                            if($tipo == 'back'){ $bg = 'bg-blue'; }else{ $bg = 'bg-orange'; }
											?>
                                                                <div class="dashboard-box <?=$bg?>">
                                                                    <div class="content-wrapper">
                                                                        <div class="header">
                                                                            <?=$tipo?>   
                                                                            <span><?=$nome_selecao?></span>
                                                                        </div>
                                                                        <div class="sparkline-big-sel">
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
                                                                            $<?=number_format($soma_total['total'], 2, ',', '.')?>
                                                                        </div>
                                                                        <a href="#" class="btn btn-info float-right tooltip-button btn-md" data-placement="top" data-toggle="modal" data-target="#myModal" title="<?=$selectionId?>">
                                                                           
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            
                                            
                            
										</div>
                            </div>                                        
                 
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/sparklines/sparklines-demo.js"></script> -->