<?php header('Access-Control-Allow-Origin: *');  ?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/justgage/justgage.css">
<style type="text/css">
	.set_odd{
		width:20%;
	}
</style>
<?
require_once('includes/betapi/jsonrpc-futbol.php'); 
	$APP_KEY = 'qD8D8WZ300PJGjbN';
	foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 

		//print_r($odd);
		########## 	MOSTRA AS ODDS
		#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
		$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
#		$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
		function mostrar($odd, $marketBook,$id_mkt)
		{
			#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
			$dd_odds = array();
			function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
			{
				
				// Get selection
				$f = 0;
				$ff = 0;
				foreach ($marketBook->runners as $runner) 
					if ($runner->selectionId == $selectionId) break;?>
                    <thead class="cf">
                    <tr style=''>
                    	<th colspan='2' style="background-color:#75c2fd;color:#000;text-align: right;font-weight: bold;">Back </th>
                        <th colspan='2' style="background-color:#f293a8;color:#000;font-weight: "> Lay</th> 
                        </tr>
					<tr>
                    </thead>
                    <?
					foreach ($runner->ex->availableToBack as $availableToBack){$f++;
					// inseri no banco 					
					$dd_odds = array(
						#'id_user' => $this->session->userdata('id'),
						#'id_mkt' => $nextHorseRacingMarket->marketId,
						'selection_id' => $selectionId,
						'tamanho' => $availableToBack->price,
						'odd' => $availableToBack->size
					);
					
					if($f == 1){
						$atual = 1;
					}else{
						$atual = 0;
					}
					
					$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	
					
					if(mysql_fetch_assoc($qr_num) == 0){
						mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`) VALUES ('".$id_partida."','".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP)");
					}else{
						mysql_query("UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size."  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back'" );
					}
					
					
						if($f ==1){
							
							#mysql_query("UPDATE `odds_mkt` SET `atual` = '1' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back'" );
							
							#$qr_selection = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'back' ORDER BY id desc  LIMIT 10 ")or die(mysql_error()); 
							#$qr_selection_vol = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'back' ORDER BY id desc LIMIT 10 ")or die(mysql_error()); 
					?>
                            <!--- DADOS BACK-->
                            <td>
                            

                            <div class="row" style="text-align:center">
                            <?
							
							$soma_back_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
							$soma_back = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
							$soma_total_sel_back = mysql_fetch_assoc($soma_back_sel);
							$soma_total_back = mysql_fetch_assoc($soma_back);
							$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
							#echo number_format($pecentual_back, 2, ',', '.').'%';
							
							?>
							<strong><?=number_format($pecentual_back, 2, ',', '.').'%'?></strong>
							<div style="font-size: 10px">
								<?
								#$qr_lasts = mysql_query("SELECT SUM (tamanho) as total FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND tipo = 'back' AND id_mkt = ".$id_mkt." ORDER BY dt_update desc LIMIT 3 " )or die(mysql_error());
								#echo ' '.$soma_total_sel_back['soma'];
								?>
								<?=number_format($soma_total_sel_back['soma'], 2, ',', '.')?>
							</div>
															
                            <!--
                            
                                <div class="col-md-4">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <div class="pad10A">
                                                <div id="g1" class="xs-gauge"></div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                -->
                                                
                                </div> 
                                     
                            </td>
                            <td class="set_odd basic-dialog back" lang="<?=$availableToBack->price;?>" style="background-color:#75c2fd;text-align:center;color:#000;width: 5em"  title="<?=$selectionId?>">
                                <label class="preco"><?=$availableToBack->price;?></label>
                                <br>
                                <small><?=$availableToBack->size?></small>
                            </td>
					<?
						}
                    }
					$L = 0;
					foreach ($runner->ex->availableToLay as $availableToLay){ $L++;
					
					// inseri no banco 
					/*
					$dd_odds = array(
						#'id_user' => $this->session->userdata('id'),
						'id_mkt' => $nextHorseRacingMarket->marketId,
						'selection_id' => $selectionId,
						'tamanho' => $availableToBack->price,
						'odd' => $availableToBack->size,
						'tipo' => 'lay'
					);
					*/
					if($L == 1){
						$atual = 1;
					}else{
						$atual = 0;
					}
					/*
					if(!isset($selectionId)){
						echo "<h1 style='color:red'>SUSPENSO</h1>";
					}
					echo "<h1>".$selectionId."</h1>";
					*/
					$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysql_error()); 
					
					if(mysql_num_rows($qr_num) == 0){
						mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`) VALUES ('".$id_partida."','".$id_mkt."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP)");
					}else{
						mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay'" );
					}
					
						if($L == 1){
							#mysql_query("UPDATE `odds_mkt` SET `atual` = '1' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay'" );
							
						#$qr_selection_lay = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 5 ")or die(mysql_error()); 	
						#$qr_selection_vol_lay = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 5 ")or die(mysql_error()); 	
						?>
							<td style='background-color:#f293a8;text-align:center;color:#000;width:5em' class='set_odd basic-dialog lay' lang="<?=$availableToLay->price;?>"  title="<?=$selectionId?>" lang='<?=$dd_vert_lay['odd']?>'>
								<label class='preco'><?=$availableToLay->price?></label>
								<br>
								<small><?=$availableToLay->size?></small>
							</td>
                            <td>
                            	<div class="row" style="text-align:center">
                                            <!--- LAY -->
											<?
                                            $soma_lay_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
                                            $soma_lay = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ");
                                            $soma_total_sel_lay = mysql_fetch_assoc($soma_lay_sel);
											$soma_total_lay = mysql_fetch_assoc($soma_lay);
											$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
                                            #echo ;
                                            
                                            ?>
                                            <strong><?=number_format($pecentual_lay, 2, ',', '.').'%'?></strong>
                                            <div style="font-size: 10px">
			                                	<?=number_format($soma_total_sel_lay['soma'], 2, ',', '.')?>
			                                </div>
		                                </div>
		                                

                                        
                                        <div class="col-md-2" style="display:none">
                                            <a href="#" title="Example tile shortcut" class="tile-box tile-box-alt btn-info">
                                                <div class="tile-header">
                                                    Porcentagem
                                                </div>
                                                <div class="tile-content-wrapper">
                                                    <div class="chart-alt-10 easyPieChart" data-percent="<? echo number_format($pecentual_lay, 2, ',', '.').'%'; ?>" style="width: 100px; height: 100px; line-height: 100px;"><span>75</span>%<canvas width="100" height="100"></canvas></div>
                                                </div>
                                            </a>
                                        </div>
                                        
                            </td>
						<?
						}
                    }
					?>
					</tr>
                    
					
				
			<? }
			#echo "<tr>";
			#echo "<h2 class='tb_partidas'>" . $odd->marketName."</h2>";
			?>
            <!--
            <h2 class="title-hero tb_partidas" title="">
            Mercado: <strong><?=$odd->marketName?></strong>
            </h2>
            <h2 class="title-hero tb_partidas" title="">
            Correspondido: <strong>$<?=number_format($odd->totalMatched, 2, ',', '.');?></strong>
            </h2>
            -->
            <?
			
            $last_match_qr = mysql_query("SELECT total_matched,bg FROM odds_mkt WHERE id_mkt = '$id_mkt' ORDER BY 'dt','desc' LIMIT 1")or die(mysql_error());
			$last_match = mysql_fetch_assoc($last_match_qr);
			if($last_match['total_matched'] > $odd->totalMatched){
				$bg = 'red';
				$seta = 'icon-caret-down';
				$sinal = "-";
				$dif = $last_match['total_matched'] -  $odd->totalMatched;
				$diferenca = number_format($dif, 2, ',', '.');
			}
			if($last_match['total_matched'] < $odd->totalMatched){
				$bg = 'green';
				$seta = 'icon-caret-up';
				$sinal = "+";
				$dif =  $odd->totalMatched - $last_match['total_matched'];
				$diferenca = number_format($dif, 2, ',', '.');
			}
			if($last_match['total_matched'] == $odd->totalMatched){
				$bg = $last_match['bg'];
				$seta = $last_match['bg'];;
				$sinal = "";
				$dif = $last_match['diferenca'];
				#$diferenca = number_format($dif, 2, ',', '.');
				$diferenca = $dif;
			}
			?>
            <div class="tile-box tile-box-alt bg-<?=$bg?> tb_partidas" style="margin-bottom:30px;">
                <div class="tile-header" id="nm_mkt"><?=$odd->marketName?></div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-tag"></i>
                    <div class="tile-content">
                        <span>$</span>
                        <?=number_format($odd->totalMatched, 2, ',', '.');?>
                    </div>
                    <small>
                        <i class="glyph-icon <?=$seta?>"></i>
                         <?=$sinal?><?=$diferenca?> 
                         <? if(isset($last_match['total_matched']) && $last_match['total_matched'] > 0){ ?>
	                         (<?=number_format($last_match['total_matched'], 2, ',', '.')?>)
                         <? } ?>
                    </small>
                </div>
            </div>            
            <?
			#echo "<small class='tb_partidas'>MarketId: " . $odd->marketId."</small>";
			foreach ($odd->runners as $runner) {
				mysql_query("UPDATE `odds_mkt` SET `selection_name` = '".$runner->runnerName."' , `total_matched` = '".$odd->totalMatched."' , `bg` = '".$bg."' , `diferenca` = '".$diferenca."' WHERE selection_id = '".$runner->selectionId."'");
			?>	
				<!--<h3 id="sel<?=$runner->selectionId?>" class='tb_partidas title-hero' title="<?=$runner->selectionId?>"><?=$runner->runnerName?></h3> -->
                <div class="example-box-wrapper tb_partidas">
		            <div class="">
		            	<table class='tb_partidas table table-bordered table-striped table-condensed cf' style='border:black 0px solid;width:100%'> 
		            	<tr style=''>
		                    	<th colspan='4' style="background-color:#;color:#000;text-align: left;font-weight: bold;"><?=$runner->runnerName?></th>
		                        
							<tr>
							</table>
                        <table class='tb_partidas table table-bordered table-striped table-condensed cf' style='border:#dfdfdf 1px solid;width:100%'> 
                        	
                            <?=printAvailablePrices_odd($runner->selectionId, $marketBook,$odd->marketId,$id_jogo) ?>
                        </table>
                </div>
                </div>
			<?
            }
			
				
				
		}

	
	}
				
?>
<div class="title-box tile-box-alt bg-<? #=$bg?> tb_partidas" style="margin-bottom:30px;background-color: #ffb80c">
	<div class="tile-header" id="">Bets</div>
	<div class="tile-content-wrapper" style="">
		<i class="glyph-icon icon-money"></i>
		<div class="tile-content" title="100">
			<span>$</span>

			<? #=$APP_KEY.' ----- < > ---- '.$SESSION_TOKEN." -> ".$id_mkt?>
			<? /* foreach($this->bet_model->list_bets_atual('6A1cQNtoRmi0GDOS', 'SESSION_TOKEN') as $dd_bet_now_mkt){ count($dd_bet_now_mkt);  ?>

			<? } */ 
			############################################################################################ INICIO CASH OUT
			$entradas = $this->bet_model->list_bets_by_mkt('6A1cQNtoRmi0GDOS', $SESSION_TOKEN,$id_mkt) ;
			$cont_entr_geral = 0;
			$cont_entr = -1;
			#echo count($entradas)." ++ ";
			#print_r($entradas);
			#if(!empty($entradas)){
				
			
				#for($b=0; $b<count($entradas); $b++){ $cont_entr_geral++;
			echo "<table border='1' style='font-size:12px;width:100%'>";
												   echo "<tr style='font-size:12px;padding:10px'> <td>Seleção</td> <td>Odd Entrada</td>  <td>Odd Atual (Cashout)</td> <td>Stake(Resp.)</td><td>Side</td><td>Lucro</td></tr>";
					$total_back = 0;
					$total_lay = 0;
					$lucro_total = 0;
					$stake_total_back = 0;
					$stake_total_lay = 0;
					$odd_total_back = 0;
					$odd_total_lay = 0;
					foreach($entradas as $dd_entr){ $cont_entr++;
												   
						for($e=0; $e<count($dd_entr); $e++){  #$tg++;
							#echo "(((".count($cont_entr).")))";						   
							$id_mkt_entr = $dd_entr[$e]->marketId;

							if($id_mkt_entr == $id_mkt){

								$id_selection_entr = $dd_entr[$e]->selectionId;
								$odd_entrada_entr = 	$dd_entr[$e]->priceSize->price;
								
								// defini vars do cash out
								$bet_price = $dd_entr[$e]->priceSize->price;
								$bet_size = $dd_entr[$e]->priceSize->size;
								$bet_selection_id = $dd_entr[$e]->selectionId;
								$bet_mkt_id = $id_mkt_entr;
								
								$side_entr = 	$dd_entr[$e]->side;
									
								
								if($side_entr == "BACK"){
									$side_cash = 'lay';
									$stake_entr = 	$dd_entr[$e]->priceSize->size;
									
								}
								if($side_entr == "LAY"){
									$side_cash = 'back';
									$stake_entr = 	($dd_entr[$e]->priceSize->size * $dd_entr[$e]->priceSize->price) - $dd_entr[$e]->priceSize->size;
								}
								
										
								$qr_lasts = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$id_selection_entr." AND tipo = '".$side_cash."' AND id_mkt = ".$id_mkt_entr." ORDER BY dt_update desc LIMIT 1" )or die(mysql_error());
								
								$dd_last = mysql_fetch_assoc($qr_lasts);
								$odd_atual_entr	 = $dd_last['odd'];		
								
								
								if($side_entr == "BACK"){
									$bg_cash_s = '#0083ca';
									
									$lucro = $odd_entrada_entr * $stake_entr;
									
									#$balanco = ($odd_atual_entr / $odd_entrada_entr) * $stake_entr;
									$balanco = ($odd_entrada_entr / $odd_atual_entr) * $stake_entr;
									#$balanco = round($balanco,2);
									#<td>".$id_mkt_entr."</td>
									$lucro_total += $lucro;
									$stake_total += $stake_entr;
									$stake_total_back += $stake_entr;
									$total_back += $lucro;
									$odd_total_back += $dd_entr[$e]->priceSize->price;
									
									#if($balanco > $stake_entr) {$bg_cash = 'success';}
									#if($balanco < $stake_entr) {$bg_cash = 'danger';}
									#if($balanco == $stake_entr) {$bg_cash = 'danger';}
								}
								if($side_entr == "LAY"){
									
									$lucro = ($odd_entrada_entr * $dd_entr[$e]->priceSize->size) - $stake_entr;
									$balanco = ($odd_atual_entr / $odd_entrada_entr) * $stake_entr;
									#$balanco = (  $odd_entrada_entr / $odd_atual_entr) * $stake_entr;
									#$balanco = round($balanco,2);
									#<td>".$id_mkt_entr."</td>
									$lucro_total += $lucro;
									$stake_total += $stake_entr;
									$stake_total_lay += $lucro;
									$bg_cash_s = '#e91e63';
									$total_lay += $lucro;
									$odd_total_lay += $dd_entr[$e]->priceSize->price;
									
									#if($balanco > $stake_entr) {$bg_cash = 'success';}
									#if($balanco < $stake_entr) {$bg_cash = 'danger';}
									#if($balanco == $stake_entr) {$bg_cash = 'danger';}
									
								}
								$nm_mkt_sel = $this->padrao_model->get_by_matriz('selection_id',$id_selection_entr,'odds_mkt')->row()->selection_name;
								
								$nm_mkt_sel = $this->db->query(" SELECT * FROM odds_mkt where selection_id = '".$id_selection_entr."' AND selection_name <> '' ")->row()->selection_name;
								
								echo "<tr style='background-color:".$bg_cash_s.";color:#fff;font-size:12px;padding:10px'>  <td>".$nm_mkt_sel."</td><td>@".$odd_entrada_entr."</td>  <td>@".$odd_atual_entr."</td> <td>$".$stake_entr." (".$lucro.")</td><td>".$side_entr."</td><td>".$lucro."</td></tr>";
								#echo "<br>";
								#echo "$ ".$balanco;
								

								?>
								

						<?		
								#print_r($dd_entr[$cont_entr]);
							} // x if ==
					#}
						} // c for
												   
					} // x foreach
					$total_back = round($total_back,2);
					$total_lay = round($total_lay,2);
			
					if(($total_back == $total_lay) && $stake_total > 0 ) {
						$balanco_atual = ($total_back / $total_lay) * $stake_total;
						$balanco_atual = number_format($balanco_atual, 2, ',', '.');
						#$balanco_atual = 100;
					}else{
						
						$balanco_atual = number_format($balanco, 2, ',', '.');
						#$balanco_atual = 200;
					}
					#echo "<tr style='background-color:green;color:#fff;font-size:12px;padding:10px'> <td></td> <td>".$total_back."</td>  <td>".$total_lay."</td> <td>-</td><td>".$lucro_total."</td><td id='balanco_atual'>".$balanco_atual."</td></tr>";
					
					echo "<tr style='background-color:green;color:#fff;font-size:12px;padding:10px'> <td>".$total_back."</td> <td>".$odd_total_back." : ".$odd_total_lay."</td>  <td>".$total_lay."</td> <td>".$stake_total_lay." : ".$stake_total_back."</td><td>".$lucro_total."</td><td id='balanco_atual'>".$balanco_atual."</td></tr>";
			
						echo "</table>";
			
			#} // if empty
			#print_r($entradas);
			/*
			for($b=0; $b<count($entradas); $b++){ #$tg++;
												 echo "[".$entradas[$b]."]";
				
					if(isset($entradas[$b])){
					$bet_idbet = $entradas[$b]->betId;
					$bet_mkt_id = $entradas[$b]->marketId;
					$bet_selection_id = $entradas[$b]->selectionId;
					#$dd_bet_where = array('id_mkt' => $bet_mkt_id , 'selection_id' => $bet_selection_id);
					#$this->db->where($dd_bet_where);
					#$dd_bet_mkt = $this->db->get('odds_mkt');
					
					echo "(".$id_mkt.")";
					
				} // x if isset
				
			} // x for
			*/
			#echo $entradas[0];
			#print_r($entradas);
			#echo count($entradas);
			#echo "<br />";
			#echo "<span style='font-size:10px'>";
			#print_r($entradas);
			#echo "</span>";
			################################################################################################# FIM CASH OUT
			?>
			<? if($total_back == $total_lay){ ?>
				<button type="button" disabled class="btn btn-lg "><?=$balanco_atual?></div> </button>
			<? }else{ ?>
		<!--
				<button type="button" class="btn btn-block btn-<?=$bg_cash?> btn-lg ">Cash Out <BR><?=$balanco_atual?></div></button>
				-->
				<?
				$stakes = $stake_total_back.' - '.$stake_total_lay;
				
				#if($stake_total_back < $stake_total_lay){
					$dif = $stake_total_lay - $stake_total_back;	 
				#}else{
					#$dif =  $stake_total_back - $stake_total_lay;	 
				#}
				
				// define cor de fundo do botao cashout
				$ativo = '';
				if($balanco > 0 && ($balanco > $stake_entr) ) {$bg_cash = 'success'; }
				if($balanco < $stake_entr) {
					if($dif > 0){
						$bg_cash = '';
						$ativo = 'disabled="disabled"'; 
					}else{
						$bg_cash = 'danger';
					}
				}
				if($balanco == 0) {$bg_cash = '';}

				?>
				
				<button class="btn-lg btn-block btn-<?=$bg_cash?> bt_cashout" <?=$ativo?> data-type="<?=$side_entr?>" data-price="<?=
						$bet_price?>"  data-title="<?=$bet_price?>" data-direction="<?=$bet_size;?>" data-size="<?=$bet_size;?>" title="<?=$bet_selection_id?>" value="<?=$bet_mkt_id?>" style="font-size: 20px">
						Cash Out $ 
						<? #if($stake_total_back < $stake_total_lay){ ?>
						<? if($dif > $balanco_atual){ ?>
							
							<? anchor_popup('segments', 'text', attribs); if($dif == $stake_entr) {?>
								
								(<strong><?=number_format($dif, 2, ',', '.');?></strong>) *
							<? }else{ ?>

								<? if( ($odd_total_back > $odd_total_lay) && ($stake_total_back < $stake_total_lay) ){?>
									<?=number_format($dif, 2, ',', '.');?>
								
								<? }else{ ?>
								
								(<strong><?=number_format($balanco_atual, 2, ',', '.');?></strong>) -  <?=$balanco_atual?> +

								<? } ?>
							<? } ?>



						<? }else{ ?>
							<? if( ($odd_total_back > $odd_total_lay) && ($stake_total_back < $stake_total_lay) ){?>

									<? #=$dif?>
									<?=number_format($dif, 2, ',', '.');?> - #

								<? }else{  ?>

									(<strong><?=number_format($balanco_atual, 2, '.', ',');?></strong>)  - <?=$balanco_atual?>
								<? } ?>	
						<?  } ?>
						<!-- [ <?=$dif.' > '.$balanco_atual.' '.$stake_total?> ] -->
					 <!-- -------- (<?=$stakes.' = '.$dif?>) <?=$total_back.' == '.$total_lay?> -->
				</button>	
		
				<p id="pre_cash" align="center" style="display: none"><img src="<?=base_url()?>assets2/images/svg-loaders/ball-triangle.svg"></div>
			<? } ?>
		</div>
		<small>
			<i class="glyph-icon"></i>
			 
		</small>
	</div>
</div>  
<?
$data = mostrar($odd, $marketBook,$id_mkt);
#echo $data;
?>
<!--
<script type="text/javascript" src="<?=base_url()?>assets2/js-core/raphael.js"></script>
-->
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/justgage/justgage.js"></script>-->
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/justgage/justgage-demo.js"></script> -->
<script type="text/javascript">


$(document).ready(function(){
	
	var nm_mkt = $("#nm_mkt").text();
	var title_atual = $("#nm_evento").html();
	$("title").html(nm_mkt+' '+title_atual);
	
})

/* justGage charts */


/*
$(function() {
    "use strict";
    //var g1, g2, g3, g4, g5;
	var g1;

    window.onload = function() {
        var g1 = new JustGage({
            id: "g1",
            //value: getRandomInt(0, 100),
			value: <?=$pecentual_back?>,
			
            min: 0,
            max: 100,
            title: "Big Fella",
            label: "pounds"
        });

        var g2 = new JustGage({
            id: "g2",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Small Buddy",
            label: "oz"
        });

        var g3 = new JustGage({
            id: "g3",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Tiny Lad",
            label: "oz"
        });

        var g4 = new JustGage({
            id: "g4",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Little Pal",
            label: "oz"
        });

        var g5 = new JustGage({
            id: "g5",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            title: "Little Pal",
            label: "oz"
        });

        setInterval(function() {
            g1.refresh(getRandomInt(50, 100));
            //g2.refresh(getRandomInt(50, 100));
            //g3.refresh(getRandomInt(0, 50));
            //g4.refresh(getRandomInt(0, 50));
            //g5.refresh(getRandomInt(0, 50));

        }, 2500);
    };
});
*/
</script>