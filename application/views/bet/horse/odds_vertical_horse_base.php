<?php header('Access-Control-Allow-Origin: *');  ?>

<!--<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/justgage/justgage.css"> -->
<div class="tb_partidas">
<style type="text/css">
	.box_escada{
		height: 500px;
		border:silver 1px solid;
		overflow:scroll; 
	}

</style>	
	
<?
require_once('includes/betapi/jsonrpc-futbol.php'); 
	
?>
	
	
</div>
<?
	// ODDS
	$APP_KEY = 'qD8D8WZ300PJGjbN';
	$sel_atual = "";
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
                    	<th style="background-color:#0083ca;color:#fff;border-top-left-radius: 20px">Back:
							<?
				
							$soma_back_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
							$soma_back = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
							$soma_total_sel_back = mysql_fetch_assoc($soma_back_sel);
							$soma_total_back = mysql_fetch_assoc($soma_back);
							$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
							echo number_format($pecentual_back, 2, ',', '.').'%';

							?>
						</th>
                        <th style="text-align:center">Size</th>
                        <th style="text-align:center">Odds Back </th>
                        <th style="text-align:center">Odds Lay</th>
                        <th style="text-align:center">Size</th>
                        <th style="background-color:#f9677e;color:#fff;border-top-right-radius: 20px">Lay:
							<?
							$soma_lay_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
							$soma_lay = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ");
							$soma_total_sel_lay = mysql_fetch_assoc($soma_lay_sel);
							$soma_total_lay = mysql_fetch_assoc($soma_lay);
							$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
							echo number_format($pecentual_lay, 2, ',', '.').'%';
							?>
						</th> 
                        
					</tr>
                    </thead>
                    <tr>
                    <?
					foreach ($runner->ex->availableToBack as $availableToBack){$f++;
						if ($runner->selectionId == $bet_selection_id_ativo && $bet_side_ativo == 'BACK' ){ $sel_atual = "****";  }else{ $sel_atual = ""; } 
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
						$odd_atual_back = $availableToBack->price;
						$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	

						if(mysql_fetch_assoc($qr_num) == 0){
							mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`) VALUES ('".$id_partida."','".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP)");
						}else{
							mysql_query("UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size."  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back'" );
						}


						if($f == 1){
					?>
                            
                            <td class="set_odd basic-dialog back" style="background-color:#0083ca;text-align:center;color:#000;vertical-align:text-top;width:60px"  title="<?=$selectionId?>"  lang="<?=$availableToBack->price;?>" valign="top">
                                <label class="preco"><?=$availableToBack->price;?></label>
                                <?=$sel_atual?>
                                
                                <strong>
                                
									<div class="row" style="text-align:center">
										<?
/*
										$soma_back_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
										$soma_back = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ");
										$soma_total_sel_back = mysql_fetch_assoc($soma_back_sel);
										$soma_total_back = mysql_fetch_assoc($soma_back);
										$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
										echo number_format($pecentual_back, 2, ',', '.').'%';
*/
										?>
										<br>
										<i class="glyph-icon icon-linecons-money"></i>

									</div> 
                                
                                </strong>
                                
                            </td>
                            <td> $0,00</td>
                            <td>
                            	<div class='box_escada'>
		                            <?
		                            $qr_v_back = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND tipo = 'back' ORDER BY odd desc ")or die(mysql_error()); 
									while($dd_vert_back = mysql_fetch_assoc($qr_v_back)){
										//$tostr = strval($dd_vert_back['odd']);
										$odd_trat = round($dd_vert_back['odd'],2);
										$odd_trat = str_replace(".","_",$odd_trat);								
										$nm_class = "o_".$selectionId.'_'.$odd_trat.'b';
									?>
		                            	<? if($dd_vert_back['odd'] == $odd_atual_back){ $bg_color_back = '0083ca'; }else{ $bg_color_back = 'B7DBFF'; }; ?>
		                            	<div class="set_odd basic-dialog back <?=$nm_class?>" title="<?=$selectionId?>_<?=$nm_class?>"  lang="<?=$availableToBack->price;?>" style="padding:2px;text-align:center;color:#000;border:black 1px solid;background-color:#<?=$bg_color_back?>;width:80px;height: auto" >
												
		                                <label class='preco' style="font-size: 10px;"><?=$dd_vert_back['odd']?> <? #=$nm_class?> </label>
										<br>
										<small class="volume<?=$nm_class?>"><?=$dd_vert_back['tamanho']?></small>
		                                </div>
		                            
									<? } ?>   
                                
                                </div>
                            </td>
					<?
						} // x if $f == 1
                    } // x foreach $runners
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
					$odd_atual_lay = $availableToLay->price;
					$size_atual_lay = $availableToLay->size;
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
                        	<td valign="top">
                        		<div class='box_escada'>
		                            <?
		                            $qr_v_lay = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND tipo = 'lay' ORDER BY odd desc ")or die(mysql_error()); 
									while($dd_vert_lay = mysql_fetch_assoc($qr_v_lay)){
										$odd_trat = round($dd_vert_lay['odd'],2);
										$odd_trat = str_replace(".","_",$odd_trat);								
										$nm_class = "o_".$selectionId.'_'.$odd_trat.'l';
									?>
		                            <? if($dd_vert_lay['odd'] == $odd_atual_lay){ $bg_color_lay = 'f9677e'; }else{ $bg_color_lay = 'FFD5EA'; }; ?>
		                            	<div style="padding:5px;text-align:center;color:#000;border:black 1px solid;background-color:#<?=$bg_color_lay?>;width:80px" class='set_odd basic-dialog lay <?=$nm_class?>'  title="<?=$selectionId?>" lang="<?=$dd_vert_lay['odd']?>">
		                                <label class='preco'><?=$dd_vert_lay['odd']?></label>
		                                <br>
										<small class="volume<?=$nm_class?>"><?=$dd_vert_lay['tamanho']?>  </small>
		                                </div>
                            		<? } ?>   
                            	</div> 
                            </td>
							<td style="color:red">
								$0,00
                            </td>
                            <td style='background-color:#f9677e;text-align:center;color:#000;vertical-align:text-top;padding:5px;width:60px' class='set_odd basic-dialog lay'  title="<?=$selectionId?>">
                            
								<label class='preco'><?=$availableToLay->price?></label>
								<br>
								
                                
                                <strong>
                                
                                <div class="row" style="text-align:center">
                                    <!--- LAY -->
                                    <?
								/*	
                                    $soma_lay_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
                                    $soma_lay = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
                                    $soma_total_sel_lay = mysql_fetch_assoc($soma_lay_sel);
                                    $soma_total_lay = mysql_fetch_assoc($soma_lay);
                                    $pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
                                    echo number_format($pecentual_lay, 2, ',', '.').'%';
								*/
                                    ?>
                                </div>
                                <br>
                                    <i class="glyph-icon icon-linecons-money"></i>
                                </strong>
                                
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

			<div class="col-md-12 tb_partidas" style="margin-bottom:30px">
				<? if($marketBook->status == 'OPEN'){ // OPEN, SUSPENDED, CLOSED (settled) ?>


					<h3 class="content-box-header bg-green">
						<i class="glyph-icon icon-cog"></i>
						<?=$marketBook->status?>
					</h3>

				<? }else{ ?>

				   <h3 class="content-box-header bg-red">
						<i class="glyph-icon icon-cog"></i>
						<?=$marketBook->status?>
					</h3>

				<? } ?>
			</div>

            <div class="example-box-wrapper tb_partidas">       
            <?
			#echo "<small class='tb_partidas'>MarketId: " . $odd->marketId."</small>";
			
			foreach ($odd->runners as $runner) {
				mysql_query("UPDATE `odds_mkt` SET `selection_name` = '".$runner->runnerName."' , `total_matched` = '".$odd->totalMatched."' , `bg` = '".$bg."' , `diferenca` = '".$diferenca."' WHERE selection_id = '".$runner->selectionId."'");
			?>	
				<div class="col-md-6 tb_partidas" style='border:red 0px solid;margin-bottom:20px;display:'> 
					
                   
                       
                            <table class='tb_partidas table table-bordered' style='border: #ffb80c 1px solid;padding:10px;border-radius: 20px;margin-bottom: 15px '> 
								<thead class="cf">
									<tr style=''>
					                    	<th colspan="7">
					                    		<h3 id="sel<?=$runner->selectionId?>" class='tb_partidas title-hero' title="<?=$runner->selectionId?>" style="border-radius:0px;border-bottom:#ffb80c 1px solid;width:auto;"><strong><?=$runner->runnerName?></strong>
												
												<a target="_blank" style="color:#000;float: right;" href="<?=base_url()?>bet/clear_mkt/<?=$id_mkt?>"> 
								               <i class="glyph-icon icon-refresh" title="Limpar Dados do Mercado"></i>
								               </a>

					                    		</h3>
					                    	</th> 
				                        
									</tr>
								</thead>




                                <?=printAvailablePrices_odd($runner->selectionId, $marketBook,$odd->marketId,$id_jogo) ?>
                            </table>
                       
            	</div>

                
			<? } ?>
			
		</div>		
				
	<?	}

	
	}
?>				

<div class="title-box tile-box-alt bg-<? #=$bg?> tb_partidas" style="margin-bottom:30px;background-color: #ffb80c">
	<div class="tile-header" id="">Cash Out</div>
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
												   echo "<tr style='font-size:12px;padding:10px'>  <td>Seleção</td><td>Odd Entrada</td>  <td>Odd Atual (Cashout)</td> <td>Stake</td><td>Side</td><td>Lucro</td></tr>";
					$total_back = 0;
					$total_lay = 0;
					$lucro_total = 0;
					foreach($entradas as $dd_entr){ $cont_entr++;

						for($e=0; $e<count($dd_entr); $e++){  #$tg++;
							#echo "(((".count($cont_entr).")))";						   
							$id_mkt_entr = $dd_entr[$e]->marketId;

							if($id_mkt_entr == $id_mkt){

								$id_selection_entr = $dd_entr[$e]->selectionId;
								$odd_entrada_entr = 	$dd_entr[$e]->priceSize->price;
								$stake_entr = 	$dd_entr[$e]->priceSize->size;
								$side_entr = 	$dd_entr[$e]->side;


								if($side_entr == "BACK"){
									$side_cash = 'lay';

								}
								if($side_entr == "LAY"){
									$side_cash = 'back';

								}


								$qr_lasts = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$id_selection_entr." AND tipo = '".$side_cash."' AND id_mkt = ".$id_mkt_entr." ORDER BY dt_update desc LIMIT 1,1 " )or die(mysql_error());

								$dd_last = mysql_fetch_assoc($qr_lasts);
								$odd_atual_entr	 = $dd_last['odd'];		
								$lucro = $odd_entrada_entr * $stake_entr;
								$balanco = ($odd_entrada_entr / $odd_atual_entr) * $stake_entr;
								#$balanco = round($balanco,2);
								#<td>".$id_mkt_entr."</td>
								$lucro_total += $lucro;
								$stake_total += $stake_entr;
								if($side_entr == "BACK"){
									$bg_cash = '#0083ca';
									$total_back += $lucro;
								}
								if($side_entr == "LAY"){
									$bg_cash = '#e91e63';
									$total_lay += $lucro;
								}
								echo "<tr style='background-color:".$bg_cash.";color:#fff;font-size:12px;padding:10px'>  <td>".$this->padrao_model->get_by_matriz('selection_id',$id_selection_entr,'odds_mkt')->row()->selection_name."</td><td>@".$odd_entrada_entr."</td>  <td>@".$odd_atual_entr."</td> <td>$".$stake_entr."</td><td>".$side_entr."</td><td>".$lucro."</td></tr>";
								#echo "<br>";
								#echo "$ ".$balanco;
								if($balanco > $stake_entr) {$bg_cash = 'success';}
								if($balanco < $stake_entr) {$bg_cash = 'danger';}
								if($balanco == $stake_entr) {$bg_cash = 'block';}

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
					}else{
						$balanco_atual = number_format($balanco, 2, ',', '.');
					}
					echo "<tr style='background-color:green;color:#fff;font-size:12px;padding:10px'><td></td>  <td>".$total_back."</td>  <td>".$total_lay."</td> <td>-</td><td>".$lucro_total."</td><td id='balanco_atual'>".$balanco_atual."</td></tr>";
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
				<button type="button" class="btn btn-<?=$bg_cash?> btn-lg ">Cash Out <BR><?=$balanco_atual?></div></button>
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