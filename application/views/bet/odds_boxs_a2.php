<?php header('Access-Control-Allow-Origin: *');  ?>
<!--
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/justgage/justgage.css">
-->

<?
include("includes/mysqli_con.php");
require_once('includes/betapi/jsonrpc-futbol.php'); 
	$APP_KEY = '6A1cQNtoRmi0GDOS';
	$cont_bet = 0;
	#$id_user_session = $this->session->userdata('id');
	define("id_user_session",$this->session->userdata('id'));
	
	foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 

		//print_r($odd);
		########## 	MOSTRA AS ODDS
		#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
		$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
#		$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
		
							function mostrar($odd, $marketBook,$id_mkt,$id_jogo)
							{
								#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
								$dd_odds = array();
								function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
								{
									
									// Get selection
									$f = 0;
									$ff = 0;
									?>
					
									<?
									
									if($marketBook->status != 'OPEN'){ // defini mercado suspenso ou fechado
										
										if($marketBook->status == 'CLOSED'){
												include("includes/mysqli_con.php");
												echo $id_mkt."***";
												mysqli_query($con,"UPDATE `mercados` SET `status` = '1' WHERE `mercados`.`id_mkt` = '$id_mkt'")or die(mysqli_error($con));
												echo "REMOVIDO";
												return false;
												#mysql_query("DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error());
												#mysql_query("DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error());
												#redirect('bet/bests');
										}


									}
									
									foreach ($marketBook->runners as $runner) 
										if ($runner->selectionId == $selectionId) break;?>
										
                                        
                                        
                                        <!--
										<div class="example-box-wrapper">
											<div class="row">
												
												<div class="col-md-6 " style="border-bottom:#B2E4FF 1px solid;color:#0083ca;text-align:right;font-weight:bold">
												   
                                                        
                                                        <span class="bs-label label-info"> BACK</span>
                                                    <div class="ripple-wrapper"></div>
                                                 
                                                   
												</div>
												
											  
											  
												<div class="col-md-6" style="border-bottom:#FCE2EA 1px solid;color:#e91e63;font-weight:bold">
												

                                                        <span class="bs-label label-primary"> LAY</span>
                                                        
                                                    <div class="ripple-wrapper"></div>
                                                

												</div>
											</div>
										</div> -->
										
										<!--
										<thead class="cf">
										<tr style=''>
											<th  style="background-color:#0083ca;color:#fff">Back:</th>
											<th  style="background-color:#f9677e;color:#fff">Lay:</th> 
											</tr>
										<tr>
										</thead>
										-->
										<?
										$total_size_back = 0;
										foreach ($runner->ex->availableToBack as $availableToBack){$f++;
											$total_size_back += $availableToBack->size;														   
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

										include("includes/mysqli_con.php");

										
										$qr_num = mysqli_query($con,"SELECT id_mkt FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	
										$num = mysqli_num_rows($qr_num);

										echo "<h1>".mysqli_num_rows($qr_num)."</h1>";
										
										
										
										if($num == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)")or die (mysqli_error($con));
										}else{
											/*
											mysqli_query($con,"UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size." , `dt_update` = CURRENT_TIMESTAMP  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" );
											*/
										}
										
										
										
											if($f == 1){
												
											

										?>
												<!--- DADOS BACK-->
									   <!-- <td>-->
										<div class="example-box-wrapper">
											<div class="row">
												
					
												
												<?

												/*
												
												$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by dt_update desc LIMIT 5  ");
												$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by dt_update desc LIMIT 5  ");
												$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
												$soma_total_back = mysqli_fetch_assoc($soma_back);
												if($soma_total_sel_back['soma'] > 0){
													$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
												}else{
													$pecentual_back = 0;
												}
												#echo number_format($pecentual_back, 2, ',', '.').'%';
												#if($pecentual_back > 85){
													$bg_class = "btn-success";

													#$pecentual_back = $soma_total_back['soma'];
													*/

													?>



													<?
												
												if( $availableToBack->price > 1.85 && $availableToBack->price < 2.30){ 
													$cont_bet = rand(5, 15);
													
												#if( ($availableToBack->price > 1.3 && $pecentual_back < 100) || ($pecentual_back > 90 && $availableToBack->price > 1.1 ) ){
												#if($pecentual_back < 100){
													
													#	mysql_query("INSERT INTO `odds_hot` (`id_user`, `id_partida`, `id_mkt`, `nm_mkt`, `selection_id`, `selection_name`, `tamanho`, `odd`, `tipo`, `total_matched`) VALUES ('".$this->session->userdata('id')."', '".$id_jogo."', '".$id_mkt."', 'MatchOdds', '".$selectionId."', 'Náutico', NULL, '".$availableToBack->price."', 'back', '0')")or die(mysql_error());
													$id_sel_bet = $selectionId;
													if($selectionId == "5851482"){
														$id_sel_bet = 5851483;
													}
													echo "<h2>".$id_sel_bet." ".$selectionId."</h2>";

													$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$id_sel_bet."' AND id_user = ".constant("id_user_session")."  ");
													echo "<h3>ROW HOTS: ".mysqli_num_rows($qr_hot)."</h3>";
													if(mysqli_num_rows($qr_hot) == 0 ){

														#echo "<h2>PASSOU * 11</h2>";


														$qr_sel = mysqli_query($con,"SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$id_sel_bet."' AND selection_name <> '' "); 	
														if(mysqli_num_rows($qr_sel) == 0){
															$selecao = "indefinido";
														}else{
															$dd_sel = mysqli_fetch_assoc($qr_sel);
															$selecao = $dd_sel['selection_name'];
														}

														$pattern = 'Under';
														?>

														<script type="text/javascript">
															$(document).ready(function(){
																console.log(" Selecao: *** <?=$selecao?>");
															});
														</script>

														<?

														#if (preg_match($pattern, $selecao)) {
														/*
														if ($selecao == "Under 0.5 Goals" || 
															$selecao == "Over 1.5 Goals"  ||
															$selecao == "Over 2.5 Goals"  ||
															$selecao == "Over 3.5 Goals"  ||
															$selecao == "Over 4.5 Goals" ||
															$selecao == "Over 5.5 Goals" || 
															$selecao == "No" 
															#$selecao == "No" 
														){
															*/
															
															if($selectionId == '5851482' || // UNDER 0.5
															$selectionId == "5851483"  || // over 0.5
															$selectionId == "Over 2.5 Goals"  ||
															$selectionId == "No" 
															#$selecao == "No" 
														){

															#echo "<h2>PASSOU * 222</h2>";

														#$this->db->where('id_partida',$id_jogo);
														#$qr_verifica_partida = $this->db->get('partidas_bet');	
														#$qr_verifica_partida = mysqli_query($con,"SELECT * FROM partidas_bet WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND id_partida = '".$id_jogo."' "); 
														$qr_verifica_partida = mysqli_query($con,"SELECT * FROM partidas_bet WHERE id_partida = '".$id_jogo."' "); 
															
														if(mysqli_num_rows($qr_verifica_partida) > 0){
															echo "<h3>ESSE FOI SELECIONADO</h3>";
														#if ($selecao != "" ) {
														  $bet =  ' -- Entrar';
												?>
														  <audio id="audio">
														   <source src="<?=base_url()?>includes/pi.mp3" type="audio/mp3" />
														</audio>

														  <script type="text/javascript">
																$(document).ready(function(){
																	var audio = document.getElementById('audio');
																	audio.play(); 
																	console.log(" bet ----- <?=$cont_bet?>");
																	$("#entradas").append("<p class='alert alert-warning'><a href='https://www.betfair.com/exchange/plus/football/market/<?=$id_mkt?>' target='_blank'>Entrar no mercado <?=$id_mkt?> </a> <br>$selectionId = <?=$selectionId?> (<?=$selecao?>)** [<?=$bet?>] <span class='bet<?=$cont_bet?>'>**</span> </p> <br />");


																	// PLACE BET VIA javascript
																	//alert("OK 1");
																	/*
																	$(".bet<?=$selecionId?>").html("Aguardando...");
*/

																	var stake = $("#stake").val();
																	/*
																	//alert(stake);
																	$.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : <?=$id_mkt?> , 'id_selection' : <?=$selectionId?> , 'tipo' : 'back', 'size' : 1.85 , 'valor' : stake } , function(data){
																			$(".bet<?=$cont_bet?>").html(data);
																			
																		});
																	*/
																	

																	//alert("OK 2");


																}); // x ready
															</script>


														<?
														
														
														mysqli_query($con,"INSERT INTO `odds_hot` (`id_user`,`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` , `resultado` ) 
																				 VALUES ( ".constant("id_user_session")." , ".$id_jogo." ,'".$id_mkt."', 'back', '".$id_sel_bet."', 'Time', '".$availableToBack->price."' , 50 , 22)")or die(mysqli_error($con));
														


														} else {
														  $bet = ' -- N entrar';
														}

													} // x else num_rows() partidas_bet
														?>

														


														<?
														
													}else{
														mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = 0 WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'back' ");
													}
												}
												
												
													
												#} // x if


												
												
												?>
												
												
										
												
												<!--</td>
												<td class="set_odd basic-dialog back" style="background-color:;text-align:center;color:#000"  title="<?=$selectionId?>">
												-->
												<!--
													<label class="preco"><?=$availableToBack->price;?></label>
													<br>
													<small><?=$availableToBack->size?></small>
													-->
												<div class="col-md-3">
												
												
													<div class="tile-box tile-box-alt bg-blue set_odd back" lang="<?=$availableToBack->price;?>" title="<?=$selectionId?>">
														<div class="tile-header">
															BACK *** (<?=constant("id_user_session");?>)
														</div>
														<div class="tile-content-wrapper">
															<i class="glyph-icon icon-linecons-tag"></i>
															<div class="tile-content preco">
															<?
															/*
															#$qr_lasts = mysql_query();
															$qr_lasts = mysqli_query($con,"SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND tipo = 'back' AND id_mkt = ".$id_mkt." ORDER BY dt_update desc LIMIT 1,1 " )or die(mysqli_error($con));
															$dd_last = mysqli_fetch_assoc($qr_lasts);
															#echo mysql_num_rows($qr_lasts);
															#echo "<label style='font-size:12px'>".$dd_last['odd']."</label>";
															if($dd_last['odd'] > $availableToBack->price){
																$seta_odd = 'down';
															?>	
															<span><i class="glyph-icon icon-caret-down" style="color:green" title="Previous: <?=$dd_last['odd']?>"></i></span>
															<? }else{
																$seta_odd = 'up';
															?>
															<span><i class="glyph-icon icon-caret-up" style="color:red" title="Previous: <?=$dd_last['odd']?>"></i></span>
															<? } */ ?>
																
																
																<?=$availableToBack->price;?>
															</div>
															<small>
																<i class="glyph-icon icon-caret-up"></i>
																+<?=$availableToBack->size?> 
															</small>
														</div>
														
														</div>
													
												</div>
										   
													
													
											  <!--  </td>-->
										<?
											}
										}
										$L = 0;
										$total_size_lay = 0;												
										foreach ($runner->ex->availableToLay as $availableToLay){ $L++;
											$total_size_lay += $availableToLay->size;												
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
										include("includes/mysqli_con.php");
										/*
										$qr_num = mysqli_query($con,"SELECT id_mkt FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysqli_error($con)); 
										
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)")or die (mysqli_error($con));
										}else{
											mysqli_query($con,"UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' , `dt_update` = CURRENT_TIMESTAMP WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  )or die(mysqli_error($con));
										}
										*/
										
											if($L == 1){
												
												
												//limpa os atuais
												#mysql_query("UPDATE `odds_mkt` SET  `agora` = 0  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												
												/*
												$qr_up_atual_lay = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual_lay = mysql_fetch_assoc($qr_up_atual_lay);
												mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual_lay['id']." ");
												*/
												
												#mysql_query("UPDATE `odds_mkt` SET `atual` = '1' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay'" );
												
											#$qr_selection_lay = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 5 ")or die(mysql_error()); 	
											#$qr_selection_vol_lay = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 5 ")or die(mysql_error()); 	
											?>
											<!--
												
											  	<!--- LAY -->
												<?
												/*
												$soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by dt_update desc LIMIT 5  ");
												$soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by dt_update desc LIMIT 5  ");
												$soma_total_sel_lay = mysqli_fetch_assoc($soma_lay_sel);
												$soma_total_lay = mysqli_fetch_assoc($soma_lay);
												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}
												*/
												#echo number_format($pecentual_lay, 2, ',', '.').'%';
												?>
											
													<div class="col-md-3">
													
													
														<div class="tile-box tile-box-alt  set_odd lay" lang="<?=$availableToLay->price;?>" title="<?=$selectionId?>">
															<div class="tile-header">
																Lay 
															</div>
															<div class="tile-content-wrapper">
																<i class="glyph-icon icon-linecons-money"></i>
																<div class="tile-content preco">
																	<?
																	
																	
																	?>	
																	<span><i class="glyph-icon icon-caret-down" style="color:" title="Previous: <? #=$dd_last_lay['odd']?>"></i></span>
																	
																	<?=$availableToLay->price;?>
																</div>
																<small>
																	<i class="glyph-icon icon-caret-up"></i>
																	+<?=$availableToLay->size?>
																</small>
															</div>
															
														</div>
														
											   
													</div>
													
												<!--    
												</td>
												<td>
												-->
													
																
															
															
															<?
															#if($pecentual_lay > 85){
															#	$bg_class = "btn-success";
																
																
																
																
																########## LAY - IONSERI NO BANCO
																/*
																if($availableToLay->price > 1.99 && $availableToLay->price < 2.10 ){

																	/*
		$qr_hot = mysql_query("SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
				if(mysql_num_rows($qr_hot) == 0 ){
					mysql_query("INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` , `resultado` ) 
											 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', 'Time', '".$availableToLay->price."' , ".$pecentual_lay." , 22)")or die(mysql_error());
				}else{
					mysql_query("UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'lay' ");
				}
				*/

																#if( ($availableToLay->price > 1.3 && $pecentual_lay < 100) || ($pecentual_lay > 90 && $availableToLay->price > 1.1 ) ){
																#if($pecentual_lay < 100){
																	
																	#	mysql_query("INSERT INTO `odds_hot` (`id_user`, `id_partida`, `id_mkt`, `nm_mkt`, `selection_id`, `selection_name`, `tamanho`, `odd`, `tipo`, `total_matched`) VALUES ('".$this->session->userdata('id')."', '".$id_jogo."', '".$id_mkt."', 'MatchOdds', '".$selectionId."', 'Náutico', NULL, '".$availableToLay->price."', 'back', '0')")or die(mysql_error());
																	
																	## inserir lay em HOTS
																	/*
																	$qr_hot = mysql_query("SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
																	if(mysql_num_rows($qr_hot) == 0 ){
																		mysql_query("INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `nm_mkt`, `selection_id`, `selection_name`, `odd`,`tamanho`,`side` ) 
																								 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'MatchOdds', '".$selectionId."', 'Time', '".$availableToLay->price."' , ".$pecentual_lay." , 'lay')")or die(mysql_error());
																	}else{
																		mysql_query("UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."'  ");
																	}
																	
																}
																*/
																
																
																
															#}
															
															
															
															?>
															
															
													<div class="col-md-3">
														<a href="#" title="Soma dos valores correspondidos nas Seleções LAY dividido pela quantidade de seleções LAY" class="tile-box tile-box-alt <? #=$bg_class?>" style="height: 180px">
															<div class="tile-header">
															  
																
															
															
															
															
															</div>
															
														</a>
													</div>
												
																	
												
												</div>
											</div>
															
															
											  <!--  </td>-->
											<?
											}
										}
										?>
										<!--</tr>-->
										
										
									
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
								include("includes/mysqli_con.php");
								/*
								$last_match_qr = mysqli_query($con,"SELECT total_matched,bg FROM odds_mkt WHERE id_mkt = '$id_mkt' ORDER BY 'dt','desc' LIMIT 1,1")or die(mysqli_error($con));
								$last_match = mysqli_fetch_assoc($last_match_qr);
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
								*/
								?>
								<!--
								<div class="tile-box tile-box-alt bg-<?=$bg?> tb_partidas" style="margin-bottom:30px;">
									<div class="tile-header" id="nm_mkt"><?=$odd->marketName?></div>
									<div class="tile-content-wrapper" style="">
										<i class="glyph-icon icon-tag"></i>
										<div class="tile-content" title="<?=$odd->totalMatched?>">
											<span>$</span>
											<? #=number_format($odd->totalMatched, 2, ',', '.');?>
											<? #$this->bet_model->get_fundos()->availableToBetBalance?>
											<? #$odd->totalMatched?>
											<?=$sinal?><?=$diferenca?> 
											
										</div>
										<small>
											<i class="glyph-icon <?=$seta?>"></i>
											 <?=$sinal?><?=$diferenca?> 
											 <? if(isset($last_match['total_matched']) && $last_match['total_matched'] > 0){ ?>
												 (<? #=number_format($last_match['total_matched'], 2, ',', '.')?>)
											 <? } ?>
										</small>
									</div>
								</div>  -->
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
                                        <? 
                                        if($marketBook->status == "CLOSED"){
                                        #("DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error()); 
                                    	#mysql_query("DELETE FROM mercados WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error()); 
                                    	mysqli_query($con,"DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."' ")or die(mysqli_error($con)); 
                                    	}
                                        ?>
                                    </h3>
								
								<? } ?>
                                </div>
								<?
								#echo "<small class='tb_partidas'>MarketId: " . $odd->marketId."</small>";
								foreach ($odd->runners as $runner) {
									mysqli_query($con,"UPDATE `odds_mkt` SET `selection_name` = '".$runner->runnerName."' , `total_matched` = '".$odd->totalMatched."' , `bg` = '' , `diferenca` = '' WHERE selection_id = '".$runner->selectionId."' AND id_mkt = '".$id_mkt."'  ORDER BY dt_update desc LIMIT 1");
								?>	
								
																

								<div class="example-box-wrapper tb_partidas">
									<div class="row">
										<div class="col-md-2">
											<h3 id="sel<?=$runner->selectionId?>" class='tb_partidas title-hero content-box-header' title="<?=$runner->selectionId?>"><?=$runner->runnerName?> <? if($runner->handicap != 0){ echo $runner->handicap; } ?> </h3>
											<? # if( $runner->$handicap <> '0' ){ echo  $runner->$handicap; } ?>
											<p><? #=print_r($runner)?></p>
											<p>
											<? 
											if($marketBook->status == 'CLOSED' ){
												#echo "---***--".$id_mkt;	
												#mysql_query("DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error());
											}
											?>
												
											</p>
											
											<label id="sel_balanco_<?=$runner->selectionId?>">-- <? #=$lucro?> </label>
										</div>
										
										<div class="col-md-10">
										
										<!--    <table class='tb_partidas table table-bordered table-striped table-condensed cf' style='border:black 0px solid;width:100%'> -->
												<?=printAvailablePrices_odd($runner->selectionId, $marketBook,$odd->marketId,$id_jogo) ?>
										   <!-- </table>-->
										
										</div>
										<!--
										<div class="col-md-4">
										</div>
										-->
										
								   </div>
							   </div>
									<!--
									<h3 class='tb_partidas title-hero content-box-header bg-blue' title="<?=$runner->selectionId?>"><?=$runner->runnerName?></h3>
									<div class="example-box-wrapper tb_partidas">
										<div class="">
											<table class='tb_partidas table table-bordered table-striped table-condensed cf' style='border:black 1px solid;width:100%'> 
												<? #=printAvailablePrices_odd($runner->selectionId, $marketBook,$odd->marketId,$id_jogo) ?>
											</table>
									</div>
									</div>
									-->
								<?
								}
			
				
				
					} // x mostrar
			
	
	}
				
?>
<!--<h2 class="tb_partidas">ODDS a2</h2> -->
<div href="#" title="Example box" class="tile-box btn btn-warning tb_partidas" style='display: none'>
	<div class="tile-header">
		Cash Out
		<div class="float-right">
			<i class="glyph-icon icon-caret-up"></i>
			+55%
		</div>
	</div>
	<div class="tile-content-wrapper" style="display: none;">
		<i class="glyph-icon icon-money"></i>
		<div class="tile-content">
			<span>$</span>
			
			
			<? #=$APP_KEY.' ----- < > ---- '.$SESSION_TOKEN." -> ".$id_mkt?>
			<? /* foreach($this->bet_model->list_bets_atual('6A1cQNtoRmi0GDOS', 'SESSION_TOKEN') as $dd_bet_now_mkt){ count($dd_bet_now_mkt);  ?>

			<? } */ 
			############################################################################################ INICIO CASH OUT
			#echo $SESSION_TOKEN." ** *  *";
			$this->load->model('bet_model');
			$entradas = $this->bet_model->list_bets_by_mkt('6A1cQNtoRmi0GDOS', $SESSION_TOKEN,$id_mkt) ;
			$cont_entr_geral = 0;
			$cont_entr = -1;
			#echo count($entradas)." ++ ";
			#print_r($entradas);
			#if(!empty($entradas)){
				
			/*
				#for($b=0; $b<count($entradas); $b++){ $cont_entr_geral++;
			foreach($entradas as $dd_entr){ $cont_entr++;
				#echo $cont_entr."((()))";						   
				$id_mkt_entr = $dd_entr[$cont_entr]->marketId;

				if($id_mkt_entr == $id_mkt){

					$id_selection_entr = $dd_entr[$cont_entr]->selectionId;
					$odd_entrada_entr = 	$dd_entr[$cont_entr]->priceSize->price;
					$stake_entr = 	$dd_entr[$cont_entr]->priceSize->size;


					$qr_lasts = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$id_selection_entr." AND tipo = 'back' AND id_mkt = ".$id_mkt_entr." ORDER BY dt_update desc LIMIT 1,1 " )or die(mysql_error());
					$dd_last = mysql_fetch_assoc($qr_lasts);
					$odd_atual_entr	 = $dd_last['odd'];		

					$balanco = ($odd_entrada_entr / $odd_atual_entr) * $stake_entr;
					$balanco = round($balanco,2);

					#echo $id_mkt_entr." |  @".$odd_entrada_entr." / ".$odd_atual_entr." $".$stake_entr;
					#echo "<br>";
					#echo "$ ".$balanco;
					if($balanco > $stake_entr) {$bg_cash = 'success';}
					if($balanco < $stake_entr) {$bg_cash = 'danger';}
					if($balanco == $stake_entr) {$bg_cash = 'block';}

					?>
					*** <?=number_format($balanco, 2, ',', '.')?>

			<?		
					#print_r($dd_entr[$cont_entr]);
				}
			#}
			}
			*/
			
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
			
			
			
			
		</div>
	</div>
<div class="ripple-wrapper"></div>
</div>
<? if($id_jogo == ""){ $id_jogo = 333; } ?>
<h1><?=$id_jogo?></h1>
<h3>(<a href="https://www.betfair.com/exchange/plus/football/market/<?=$id_mkt?>" target="_blank"><?=$id_mkt?>)</a></h3>
<h4>
	<?
	#$this->db->where('id_partida',$id_jogo);
	#$qr_verifica_partida = $this->db->get('partidas_bet');
	$qr_verifica_partida = mysqli_query($con,"SELECT * FROM partidas_bet WHERE id_partida = '".$id_jogo."' ");
	#echo "Sel: ".$qr_verifica_partida->num_rows();
	echo "Sel num_rows: ".mysqli_num_rows($qr_verifica_partida);
	?>
	
</h4>
<div class="title-box tile-box-alt bg-<? #=$bg?> tb_partidas" style="margin-bottom:30px;background-color: #ffb80c;display: none">
	<div class="tile-header" id="">Bets</div>
	<div class="tile-content-wrapper" style="">
		<i class="glyph-icon icon-money"></i>
		<div class="tile-content" title="100">
			<span>$</span>

			<?=$APP_KEY.' ----- < > ---- '.$SESSION_TOKEN." -> ".$id_mkt?>
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
					$lucro_total_back = 0;
					$lucro_total_lay = 0;
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
									$lucro_total_back +=  $dd_entr[$e]->priceSize->price * $dd_entr[$e]->priceSize->size;
									
								}
								if($side_entr == "LAY"){
									$side_cash = 'back';
									$stake_entr = 	($dd_entr[$e]->priceSize->size * $dd_entr[$e]->priceSize->price) - $dd_entr[$e]->priceSize->size;

									$lucro_total_lay += ($dd_entr[$e]->priceSize->size * $dd_entr[$e]->priceSize->price) - $dd_entr[$e]->priceSize->size;
									#$lucro_total_lay = $lucro_total_lay_calc - $stake_entr;
								}
								
										
								$qr_lasts = mysqli_query($con,"SELECT * FROM `odds_mkt` WHERE selection_id = ".$id_selection_entr." AND tipo = '".$side_cash."' AND id_mkt = ".$id_mkt_entr." ORDER BY dt_update desc LIMIT 1" )or die(mysql_error());
								
								$dd_last = mysqli_fetch_assoc($qr_lasts);
								$odd_atual_entr	 = $dd_last['odd'];		
								
								/*
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
									#$balanco = ($odd_atual_entr / $odd_entrada_entr) * $stake_entr;
									$balanco_lay = (  $odd_entrada_entr / $odd_atual_entr) * $stake_entr;
									$balanco =  $stake_entr - $balanco_lay;
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

								*/
								

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
				
				// lay
				if($stake_total_back < $stake_total_lay){
					if($balanco > 0 && ($odd_total_lay < $odd_atual_entr) ) {$bg_cash = 'success'; }	
				}
				// back
				if($stake_total_back > $stake_total_lay){
					if($balanco < $stake_entr) {
						//  DESATIVA CASHOUT
						if($dif > 0){

							$bg_cash = '';
							$ativo = 'disabled="disabled"'; 
							$ativo = "";


						}else{
							$bg_cash = 'danger';
						}
					}
				}
				if($balanco == 0) {$bg_cash = '';}
				
				?>
				
				<button class="btn-lg btn-block btn-<?=$bg_cash?> bt_cashout" <?=$ativo?> data-type="<?=$side_entr?>" data-price="<?=
						$bet_price?>"  data-title="<?=$bet_price?>" data-direction="<?=$bet_size;?>" data-size="<?=$bet_size;?>" title="<?=$bet_selection_id?>" value="<?=$bet_mkt_id?>" style="font-size: 20px">
						 <?=$lucro_total_back.' - '.$lucro_total_lay?> Cash Out $ 
						<? #if($stake_total_back < $stake_total_lay){ ?>
						<? if($dif > $balanco_atual){ ?>
							
							<? anchor_popup('segments', 'text', attribs); if($dif == $stake_entr) {?>
								
								(<strong><?=number_format($dif, 2, ',', '.');?></strong>) *
							<? }else{ ?>

								<? if( ($odd_total_back > $odd_total_lay) && ($stake_total_back < $stake_total_lay) ){?>
									<?=number_format($dif, 2, ',', '.');?>
								
								<? }else{ ?>
								
								(<strong><?=number_format($balanco_atual, 2, '.', '.');?></strong>)   <?=$balanco_atual?> +
				
								<? #=$balanco.' > 0 && ('.$odd_total_lay.' < '.$odd_atual_entr.'('.$dif.')'?>

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




<? ########################################### TOTAL MATCHED
			/*
            $last_match_qr = mysqli_query($con,"SELECT total_matched,bg FROM odds_mkt WHERE id_mkt = '$id_mkt' ORDER BY 'dt','desc' LIMIT 1")or die(mysqli_error($con));
			$last_match = mysqli_fetch_assoc($last_match_qr);
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
				#$diferenca = $dif;
			}
			*/
			if (!empty($odd)) { // veridfca array em branco
			?>
            <div class="tile-box tile-box-alt bg-<? #=$bg?> tb_partidas" style="margin-bottom:30px;">
                <div class="tile-header" id="nm_mkt"><?=$odd->marketName?></div>
                <div class="tile-content-wrapper">
                    <i class="glyph-icon icon-tag"></i>
                    <div class="tile-content">
                        <span>$</span>
                        <?=number_format($odd->totalMatched, 2, ',', '.');?>
                    </div>
                    <small>
                        <i class="glyph-icon <? #=$seta?>"></i>
                         <? # =$sinal?><? #=$diferenca?> 
                         <? if(isset($last_match['total_matched']) && $last_match['total_matched'] > 0){ ?>
	                         (<?=number_format($last_match['total_matched'], 2, ',', '.')?>)
                         <? } ?>  Matched
                    </small>
                </div>
            </div>  
            <? } ?>

<?
$data = mostrar($odd, $marketBook,$id_mkt,$id_jogo);
#echo $data;
?>
<!--
<script type="text/javascript" src="<?=base_url()?>assets2/js-core/raphael.js"></script>
-->
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/justgage/justgage.js"></script>-->
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/justgage/justgage-demo.js"></script> -->
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/content-box/contentbox.js"></script> -->

<!-- PieGage
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/piegage/piegage.css">
<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/piegage/piegage.js"></script>
<!--<script type="text/javascript" src="<?=base_url()?>assets2/widgets/charts/piegage/piegage-demo.js"></script>-->


<? if($this->uri->segment(2) == 'get_odd_by_mkt'){ // caso esteja pegando via bot ?>
<script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-core.js"></script>
<? } ?>
<script type="text/javascript">


$(document).ready(function(){
	
	var nm_mkt = $("#nm_mkt").text();
	var title_atual = $("#nm_evento").html();
	$("title").html(nm_mkt+' '+title_atual);
	
	
	
	
	
	
})


</script>