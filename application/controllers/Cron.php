<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {

	function teste(){
		echo "ok";
	}
		
	
	function proximos_jogos(){

		#require_once('includes/mysqli_con.php');
		require_once('includes/mysqli_con2.php');
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php');
		#echo $APP_KEY.' - '.$SESSION_TOKEN;
		#return false;
		foreach ($this->betfront_model->getSoccers($APP_KEY, $SESSION_TOKEN) as $jogo) { 
			$hora_ld = strtotime(substr($jogo->event->openDate,11,8)); // horario de londres
			$data_eve = substr($jogo->event->openDate,0,10);
			$hora_eve = substr($jogo->event->openDate,11,8);
			$time = date("h:i:s", mktime($hora_ld -3 ));
			#date('d/m/Y', strtotime('+90 days', strtotime($d['publicacao'])))
			$tempo_time = strtotime('+1 Hour', strtotime($jogo->event->openDate));
			$inicio = date("Y-d-m h:i:s", $tempo_time);
			$qr_ver = mysqli_query($con,"SELECT * FROM partidas WHERE id_evento = '".$jogo->event->id."' ");
			$num_ver = mysqli_num_rows($qr_ver);
			if($num_ver == 0){
				$evento = str_replace('"','',stripslashes($jogo->event->name));
				$evento = str_replace("'","",$evento);
				mysqli_query($con,"REPLACE INTO `partidas` (`id_evento`,`evento`, `inicio`,`data_betfair`,`country`,`timezone`,`fonte`) VALUES ('".$jogo->event->id."','".$evento."' ,  '".$inicio."' , '".$jogo->event->openDate."', '".$jogo->event->countryCode."', '".$jogo->event->timezone."' , 'proximos_jogos'  )")or die(mysqli_error($con));
			}else{
				$evento = "Null";
			}
			#$teste_e = "Atlético";
			#echo $teste_e;
			#return false;

			//print_r($jogo);
			echo "<br>";
			echo " ".$evento." Hora: (".$tempo_time.") <b>".$data_eve." ".$hora_eve." </b> - ".$jogo->event->name." ".$num_ver ;
			echo "<br/>";
			echo "</hr>";

		}
		echo "opa";
		return false;

	}

	function get_soccer(){
		#$jogo = "opa ã Ãtlético";
		#echo utf8_decode($jogo);
		#return false;
		$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php');
		require_once('includes/mysqli_con.php');
		$meus = $this->padrao_model->get_by_matriz('id_user',5,'bet_competicoes');
		$parar = 0;
		foreach($meus->result() as $meu){ $parar++;
			############ TESTAR E EVITAR CARREGAR TUDO
			/*if($parar > 2){
				return false;
			}
			*/
			foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$meu->id_competicao) as $jogo) { 
				$hora_ld = strtotime(substr($jogo->event->openDate,11,8)); // horario de londres
				#$h_ld   = strtotime(substr($hora_ld,0,2)); // horario de londres
				#$m_ld = strtotime(substr($hora_ld,4,2)); // horario de londres
				#$s_ld = strtotime(substr($hora_ld,8,2)); // horario de londres
				#$hora_aqui = strtotime("now");
				#$diferenca = $hora_ld - $hora_aqui;
				#$unixtime = $diferenca;
				$time = date("h:i:s", mktime($hora_ld -3 ));
				#$data_soma = date('d/m/Y', mktime(0, 0, 0, $mes_pub, $dia_pub + $dias, $ano_pub));
				

				#print_r($jogo);
				#return false;
				######### INSERI NO BD
				$qr_num = mysqli_query($con,"SELECT * FROM partidas WHERE id_evento = '".$jogo->event->id."'") or die(mysqli_error($con)); 	
				$num = mysqli_num_rows($qr_num);
				
	            $data_eve = substr($jogo->event->openDate,0,10);
				$hora_eve = substr($jogo->event->openDate,11,8);
				?>
	             <? #=$hora_eve?>
	            
	            <?
	            $date_time  = new DateTime( $hora_eve );
				$diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
				#echo $diff->format( '%H:%i:%S' ); // 05:10:00
					
				
				
				if(mysqli_num_rows($qr_num) == 0){
					mysqli_query($con,"INSERT INTO `partidas` (`id_evento`,`evento`,`id_competition`,`inicio`,`timezone`,`fonte`) VALUES ('".$jogo->event->id."','".$jogo->event->name."' , '".$meu->id_competicao."' , '".$data_eve.' '.$diff->format( '%H:%i:%S' )."','".$jogo->event->timezone."' , 'get_soccer')") or die(mysqli_error($con));
				}else{
					$dds = mysqli_fetch_assoc($qr_num);
					$id_cometition = $dds['id_competition'];
					if($id_cometition == 0){
						mysqli_query($con,"UPDATE partidas SET id_competition = '".$meu->id_competicao."' WHERE id = '".$dds['id']."'") or die(mysqli_error($con));
						print_r($dds);
					}
					#$dd_evento = mysql_fetch_assoc($qr_num));
					#print $dd_evento;
					#echo $dd_evento['inicio'];
				}
				#if($meu->id_competicao == 13){
					echo $meu->id_competicao.' '.$jogo->event->name."(".mysqli_num_rows($qr_num).")";
				#}
				echo "<br>";
			}
		}

		echo "OK";
	}
	
	
	// get_odds
	function get_odds($mercado=1){
		$this->load->model('bet_model');
		#if($mkt > 0){
		#echo $mercado;
		#	return false;
		#}
		if($mercado == 1){
			$mkt = "Over/Under 1.5 Goals";
		}
		
		
		if($mercado == 0){
			$mkt = "Match Odds";
		}
		
		if($mercado == 101){
			$mkt = "Draw no Bet";
		}
		
		if($mercado == "05"){
			$mkt = "Over/Under 0.5 Goals";
		}
		
		if($mercado == 121){
			$mkt = "Correct Score";
		}
		if($mercado == 2){
			$mkt = "Over/Under 2.5 Goals";
		}
		if($mercado == 3){
			$mkt = "Over/Under 3.5 Goals";
		}
		if($mercado == 4){
			$mkt = "Over/Under 4.5 Goals";
		}
		if($mercado == 5){
			$mkt = "Over/Under 5.5 Goals";
		}
		if($mercado == 6){
			$mkt = "Over/Under 6.5 Goals";
		}
		if($mercado == 7){
			$mkt = "Over/Under 7.5 Goals";
		}
		if($mercado == 8){
			$mkt = "Over/Under 8.5 Goals";
		}
		if($mercado == 005){
			$mkt = "First Half Goals 0.5";
		}
		if($mercado == 015){
			$mkt = "First Half Goals 1.5";
		}
		
		if($mercado == 11){
			$mkt = "Both teams to Score?";
		}
		

		if($mercado == 05){
			$mkt = "Over/Under 0.5 Goals";
		}

		$dados['mercado'] = $mercado;
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo "OK";
		echo $mkt;
		$where = array('name' => $mkt,'status' => 0);
		$this->db->where($where);
		$this->db->order_by('fila','asc');
		$this->db->limit(1);

		$qr = $this->db->get('mercados');
		if($qr->num_rows() == 0){
			echo "Sem mercados";
			return false;
		}
		
		foreach($qr->result() as $dd_mkt){
			
			// fila anda
			$new_vez = array ('fila' => $dd_mkt->fila+1);
			$this->db->where('id',$dd_mkt->id);
			$this->db->update('mercados',$new_vez);
			
			#echo $dd_mkt->id_mkt." (".$dd_mkt->fila.")";
			#echo "<br><br>";
			
			#$dd_evento = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$dd_mkt->id_mkt);
			#print_r($dd_evento); 
			#return false;
			#echo $dd_mkt->id_mkt;
			#return false;
			
			$id_jogo = $this->get_id_evento_bot($dd_mkt->id_mkt);
			#echo "aa";
			#return false;
			#$dados['id_jogo'] = 0;
			
			
			
			$id_mkt = $dd_mkt->id_mkt;
			echo $id_mkt.' - '.$id_jogo;
			echo "<br>";
			#return false;
			############################## GET ODDS DO MERCADO
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			#$APP_KEY = 'qD8D8WZ300PJGjbN';
			#$APP_KEY = '6A1cQNtoRmi0GDOS'; //ccccccccc     meu id vendor
			#$APP_KEY = 'qD8D8WZ300PJGjbN'; // LIVE
			#$SESSION_TOKEN = 'cnEEv5hjDUcY9/BDPOq3xMX2K478JFihZiYY3Ov+eeI='; // igormarlus

			$mkts = $this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt);

			#echo "<br><br>";
			$mkts_rows = count($mkts);
			#print_r($mkts);
			#echo "<h1>".$mkts_rows."</h1>";
			// remove mercados encerrados
			include("includes/mysqli_con.php");
			if($mkts_rows == 0){

				// cadastra em outra tabela para registro
				/*
				mysql_query("INSERT INTO `historico` SET 
					`id_evento`=111, 
					`id_mkt`='".$id_mkt."', 
					`nm_evento`='nome evento',
					`nm_mkt`='nome mkt',
					`result`='win' 
					");
				*/
				
				#mysqli_query($con,"DELETE FROM mercados WHERE id_mkt = '".$id_mkt."'");
				mysqli_query($con,"DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."'");
				#mysqli_query($con,"DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."'");
				return false;
			}
			foreach($mkts as $odd){ 
				/*
				print_r($odd);
				if(is_array($odd)){
					echo "sim";
				}else{
					echo "nao";
				}
				*/
				########## 	MOSTRA AS ODDS
				#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
				$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);

				#echo count($odd);
				#echo "<br>";
				#echo count($marketBook);

				#print_r($odd);
				#foreach($odd as $dd){
				#	printr_r($dd);
				#}
				#echo "<br>";
				#echo "<br>";
				#echo "<br>";
				#print_r($marketBook);

				function mostrar($odd, $marketBook,$id_mkt,$id_jogo)
					{
						include("includes/mysqli_con.php");
						$dd_odds = array();
						$f = 0;
						$ff = 0;
						#function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
						#{
							foreach ($marketBook->runners as $runner) {
									#$selection_name = $runner->runnerName;
									#if ($runner->selectionId == $selectionId) break;
									$selectionId = $runner->selectionId;
									#echo "<br><br>--------";
									#print_r($runner);
									#cho "<br>^^^<br>";
									#echo "<br>";
									#echo "***************";
									if($f == 1){
										$atual = 1;
									}else{
										$atual = 0;
									}

									#$qr_dd_sel = $this->padrao_model->get_by_matriz('id_selection',$runner->selectionId,'selections');
									$qr_dd_sel = mysqli_query($con,"SELECT * FROM selections WHERE   id_selection = '".$runner->selectionId."' "); 
									$qr_sel_type = mysqli_query($con,"SELECT * FROM selections_types WHERE   id_mkt = '".$id_mkt."' AND id_selection = '".$runner->selectionId."' "); 

									$tem_nm = mysqli_num_rows($qr_dd_sel);
									$tem_tp = mysqli_num_rows($qr_sel_type);

									if($tem_nm > 0){
										$dd_sel = mysqli_fetch_assoc($qr_dd_sel);
										$nm_sel = $dd_sel['name'] ;
									}else{
										$nm_sel = "indefinido";
									}

									if($tem_tp > 0){
										$dd_sel_tp = mysqli_fetch_assoc($qr_sel_type);
										$tp_sel = $dd_sel_tp['tipo'] ;
									}else{
										$tp_sel = "indefinido";
									}

									echo "<h5>BACK ".$nm_sel."  -- ".$tp_sel." (".$runner->selectionId.") </h5>";	
									#echo "<p></p>";	
									foreach ($runner->ex->availableToBack as $availableToBack){$f++;
										print_r($availableToBack);
										$qr_num = mysqli_query($con,"SELECT id_mkt FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	
										
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
										}else{
											mysqli_query($con,"UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size." , `dt_update` = CURRENT_TIMESTAMP  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" );
										}

										
										if($f == 1){
											// define odd atual


											// DEFINI SUBIDA E QUEDA DE ODDS ####################
											if($mkt = "Match Odds"){

												if($tp_sel == "Zebra" && ($availableToBack->price < 2.5 && $availableToBack->price > 1.2) ){
													/*
													$dd_hot_odds = array(
														'id_partida' => $id_jogo,
														'id_mkt' => $id_mkt,
														'selection_id' => $selectionId,
														'odd' => $availableToBack->price,
														'resultado' => '33',
														'tipo' => 'back',
														'side' => 'back'
													);
													$this->db->insert('odds_hot' , $dd_hot_odds);
													*/
													$qr_verifica = mysqli_query($con,"SELECT * FROM odds_hot WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$selectionId." AND resultado = 33  ");

													if(mysqli_num_rows($qr_verifica) == 0 ){

														mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `resultado`, `odd` ) 
																						 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', '33', '".$availableToBack->price."')")or die(mysqli_error($con));
													}
												}

												if($tp_sel == "Favorito" && $availableToBack->price > 2){
													/*
													$dd_hot_odds = array(
														'id_partida' => $id_jogo,
														'id_mkt' => $id_mkt,
														'selection_id' => $selectionId,
														'odd' => $availableToBack->price,
														'resultado' => '33',
														'tipo' => 'back',
														'side' => 'back'
													);
													$this->db->insert('odds_hot' , $dd_hot_odds);
													*/
													$qr_verifica = mysqli_query($con,"SELECT * FROM odds_hot WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$selectionId." AND resultado = 33  ");

													if(mysqli_num_rows($qr_verifica) == 0 ){
														mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `resultado`, `odd` ) 
																						 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '33', '".$availableToBack->price."')")or die(mysqli_error($con));
													}
												}

												// Super Favorito
												if($tp_sel == "Super Favorito" && $availableToBack->price > 1.7){
													/*
													$dd_hot_odds = array(
														'id_partida' => $id_jogo,
														'id_mkt' => $id_mkt,
														'selection_id' => $selectionId,
														'odd' => $availableToBack->price,
														'resultado' => '33',
														'tipo' => 'back',
														'side' => 'back'
													);
													$this->db->insert('odds_hot' , $dd_hot_odds);
													*/
													$qr_verifica = mysqli_query($con,"SELECT * FROM odds_hot WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$selectionId." AND resultado = 33  ");

													if(mysqli_num_rows($qr_verifica) == 0 ){
														mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `resultado`, `odd` ) 
																						 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '33', '".$availableToBack->price."')")or die(mysqli_error($con));
													}
												}

												#################################
											}

											/*
											$qr_up_atual = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual = mysql_fetch_assoc($qr_up_atual);
												*/
												#mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual['id']." ");
										
												//  ################ HOTS
												
												$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
												$soma_total_back = mysqli_fetch_assoc($soma_back);
												if($soma_total_sel_back['soma'] > 0){
													$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
												}else{
													$pecentual_back = 0;
												}
												
												#echo number_format($pecentual_back, 2, ',', '.').'%';
												$pecentual_back = 0;
												// CORRECT SCORE
												if($mkt == "Correct Score"){
													if($pecentual_back > 15){
														echo "<h1>ESSSSSE</h1>";

														$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
														if(mysqli_num_rows($qr_hot) == 0 ){
															mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
																					 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error());
														}else{
															mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_back." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'lay' ");
														}
													}

												}
												if($pecentual_back > 85){
														
													
													if($availableToBack->price > 1.3 && $pecentual_back < 100){
													
														$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
														if(mysqli_num_rows($qr_hot) == 0 ){
															mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
																					 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error());
														}else{
															mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_back." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'lay' ");
														}
													} 
													
												}

										} // x if f == 1
										


										#echo " <br> @".$availableToBack->price." | ".$availableToBack->size;;
									}
									echo "<h5>Lay - ".$nm_sel." (".$runner->selectionId.")</h5>";
									#echo "<p></p>";	
									$L = 0;

									foreach ($runner->ex->availableToLay as $availableToLay){$L++;
										print_r($availableToLay);
										
										if($L == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}

										$qr_num = mysqli_query($con,"SELECT id_mkt FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysql_error()); 
										
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
										}else{
											mysqli_query($con,"UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' , `dt_update` = CURRENT_TIMESTAMP WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  );
										}

										if($L == 1){

												#mysqli_query($con,"UPDATE `odds_mkt` SET  `agora` = 0  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												/*
												$qr_up_atual_lay = mysqli_query($con,"SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual_lay = mysql_fetch_assoc($qr_up_atual_lay);
												*/
												#mysqli_query($con,"UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual_lay['id']." ");
												

												$soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_total_sel_lay = mysqli_fetch_assoc($soma_lay_sel);
												$soma_total_lay = mysqli_fetch_assoc($soma_lay);
												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}
													## HOTS ############################		
												if($pecentual_lay > 85){
														########## LAY - IONSERI NO BANCO
													if($availableToLay->price > 1.3 && $pecentual_lay < 100){
															$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
															if(mysqli_num_rows($qr_hot) == 0 ){
																mysqli_query($con,"INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
												 						VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', '".$selection_name."', '".$availableToLay->price."' , ".$pecentual_lay.")")or die(mysql_error());
															}else{
																mysqli_query($con,"UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'back' ");
															}

													}
												}
												

										}	

										#echo "<br> @".$availableToLay->price." ".$availableToLay->size;;
									}


								#
								#echo "BACK<br>";	
								#print_r($runner->ex->availableToBack);
								#echo "<br>";	
								echo "<br>";	
								echo "<br>";	
								#echo "LAY<br>";	
								#print_r($runner->ex->availableToLay);
							}
						
					}


			}
			#$this->load->view('bot/get_odds' , $dados);
			#$this->load->view('bot/get_odds_mkt' , $dados);
			
			

		} // x qr result

		mostrar($odd, $marketBook,$id_mkt,$id_jogo);	


		echo "*****************************";
			foreach($mkts as $dd){
				#print_r($dd);
				echo "<h2> - ".$dd->marketName."</h2>";
				foreach($dd->runners as $run){
					$selection_name_trat = str_replace("'", "", $run->runnerName);
					echo "*-*-*<h2>".$run->runnerName." (".$dd->marketId.")</h2>";
					echo "<h4> --".$run->selectionId."</h4>";
					if($run->runnerName != ""){
						$qr_up = mysqli_query($con,"UPDATE `odds_mkt` SET `selection_name` = '".$selection_name_trat."'  WHERE selection_id = '".$run->selectionId."' AND id_mkt = '".$dd->marketId."'   ")or die(mysql_error());
					}
					
				}
				
			}
		

	} // fn


	function get_id_evento_bot($id_mkt=""){
		#echo "asd";
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$APP_KEY =  "";
		#$SESSION_TOKEN = "";
		#$APP_KEY = 'y0clajxo6wMU4bn0'; //CYANE     meu id vendor
		$APP_KEY = 'sl4K5RkqJvpsKvPc'; //AUGUSTO     meu id vendor

		$qr_token = $this->db->query("SELECT * FROM token");
		$token_betfair = $qr_token->row()->token;
		
		
		#$SESSION_TOKEN = 'WbGq/+LhHwMTjKDQiVSgy7hqC7skcDlBYfxUVIOcfck='; // igormarlus
		$SESSION_TOKEN = $token_betfair; // igormarlus
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($id_mkt == ""){
			$id_mkt = "1.132317942";
		}
		#echo $id_mkt;
		#$APP_KEY = 'qD8D8WZ300PJGjbN'; // LIVE
		$dd = $this->bet_model->get_id_evento_bot($APP_KEY, $SESSION_TOKEN,$id_mkt);
		print_r($dd);
		include("includes/mysqli_con.php");
		if (empty($dd)) {
			
			if( strlen($id_mkt) > 5 ){
				mysqli_query($con,"UPDATE `runs_horses` SET `fechado` = '1' WHERE `marketId` = '$id_mkt' LIMIT 1")or die(mysqli_error($con));
			}
				echo " <strong> $id_mkt - </strong> FECHADO";

		}else{
			#print_r($dd);
			#$id_evento  = $dd[0]->event->id;
			$id_evento  = $dd[0]->event->id;
			mysqli_query($con,"UPDATE `runs_horses` SET `fechado` = '0' WHERE `marketId` = '$id_mkt' LIMIT 1")or die(mysqli_error($con));
			return $id_evento;
		}
		//echo "dsasaasassa";
	}
	function set_result(){
		$dds = array(
			'id_partida' => $this->input->post('id_partida'),
			'id_home' => $this->input->post('id_home'),
			'id_away' => $this->input->post('id_away'),
			'home_gols' => $this->input->post('home_gols'),
			'away_gols' => $this->input->post('away_gols'),
		);
		$this->db->where('id_partida',$this->input->post('id_partida'));
		$qr_ver = $this->db->get('resultados');
		if($qr_ver->num_rows() == 0){
			$this->db->insert('resultados' , $dds);
		}else{
			$this->db->where('id_partida',$this->input->post('id_partida'));
			$qr_ver = $this->db->update('resultados' , $dds);
		}
		$refer	= $this->agent->referrer();
		$red = str_replace(base_url(), '', $refer);
		redirect($red);
	}
	function del_partidas_passadas(){
		#$this->db->query("DELETE FROM partidas WHERE inicio < now()");
	}


	############### get resultados
		function get_resultados($query="CORRECT_SCORE"){
			return false;
			$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 

		$qr_cc = $this->db->query("SELECT DISTINCT p.evento,  p.fim, p.inicio, o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.tipo = 'back'  AND m.name = 'Correct Score' ORDER BY p.inicio asc  LIMIT 20 ");

/*
$qr_cc = $this->db->query("SELECT DISTINCT p.evento,  p.fim, p.inicio, o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.tipo = 'back'  AND m.name = 'Correct Score' AND p.inicio < NOW() AND p.fim = 0 ORDER BY p.inicio asc  LIMIT 20 "); */
		echo $qr_cc->num_rows()." *** ";
		#print_r($qr_cc->result());
		$n=0; foreach($qr_cc->result() as $dds){ $n++;
			echo $dds->id_mkt." ".$dds->evento." <strong> ".$dds->inicio."</strong>:";
			echo "<br>";
			$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $dds->id_mkt);
			$qr_verifica_resul = $this->padrao_model->get_by_matriz('id_partida',$dds->id_partida,'resultados');
			if($qr_verifica_resul->num_rows() > 0){
				echo "Já foi<br>";
			}else{
			#print_r($mkt[$n]); 
				foreach($mkt[$n]->runners as $sel){
					echo $sel->selectionId." - ".$sel->status." <br>";
					if($sel->status == "WINNER"){
						$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."' ");
						if($qr_name_sel->num_rows() > 0){
							// trata times
							$times = explode(' v ',$dds->evento); 
							#$nm_time_home = $times['0'];
							#$nm_time_home = $times['1'];
							#$id_home = $this->betfront_model->get_id_time($times['0']);
							#$id_away = $this->betfront_model->get_id_time($times['1']);


							####### HOME						
							$home = $this->betfront_model->get_id_time($times['0']);
							echo $times['0']." *************** ";
							if($home->num_rows() > 0){
								$id_home = $home->row()->id;
							}else{
								$dd_new_time = array("time" => $times['0']);
								$this->db->insert('times', $dd_new_time);
								$id_home = $this->db->insert_id();
							}

							####### VISITANTE
							$away = $this->betfront_model->get_id_time($times['1']);
							if($away->num_rows() > 0){
								$id_away = $away->row()->id;
							}else{
								$dd_new_time = array("time" => $times['1']);
								$this->db->insert('times', $dd_new_time);
								$id_away = $this->db->insert_id();
							}
							
							// trata resultado
							
							$gols = explode(' - ',$qr_name_sel->row()->selection_name); 
							$home_gols = $gols['0'];
							$away_gols = $gols['1'];
							// inseri na tb resultados
							$dd_result = array(
								'id_partida' => $dds->id_partida,
								'id_home' => $id_home,
								'id_away' => $id_away,
								'home_gols' => $home_gols,
								'away_gols' => $away_gols
							);
							$this->db->insert('resultados' , $dd_result);
							$dd_fim = array('fim' => 1);
							$this->db->where('id_evento',$dds->id_partida);
							$this->db->update('partidas' , $dd_fim);
							
							print_r($dd_result);
							echo $qr_name_sel->row()->selection_name;
							echo "<hr><br>";
						}
					}
				}
			}
			
			echo "<br><hr /><br>";
		}

		#$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
		#get_mercado_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15");
		$arr = array();
		$mkt = array();
		$n = 0;
		/*
		#echo "OKK";
				#getMarketings_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15")
		foreach($this->bet_model->get_mercado_closed($APP_KEY, $SESSION_TOKEN,$query) as $odd){  $n++;
				#print_r($odd);
				$correspondido = (int) number_format($odd->totalMatched, 2, ',', '.');
				$correspondido_float =  number_format($odd->totalMatched, 2, ',', '.');
				$limite = number_format(1000, 2, ',', '.');
				$match_len = strlen($correspondido_float);
				#$correspondido = $odd->totalMatched;
				
				#if($match_len > 8){
				#if($odd->totalMatched > 1000 OR $query == "OVER_UNDER_85" OR $query == "OVER_UNDER_75" OR $query == "MATCH_ODDS" ){
				if($odd->totalMatched >= 0){
					$this->db->where('id_mkt',$odd->marketId);
					$qr_ver = $this->db->get('mercados');
					if($qr_ver->num_rows() == 0){
						$dd_mkt = array(
							'id_mkt' => $odd->marketId,
							'total_matched	' => $correspondido,
							'name' => $odd->marketName,
							'fila' => 0
						);
						
							$this->db->insert('mercados' , $dd_mkt);
						
					}
					echo "<br>";
					echo $correspondido." <> ".$correspondido_float." | ".$match_len;
					echo "<br>";
					echo "<a href='".base_url()."bet/horse_mkt/".$odd->marketId."' target='_blank'>".$odd->marketId." </a> (".$qr_ver->num_rows().")";
					echo "<a href='https://www.betfair.com/exchange/plus/football/market/".$odd->marketId."' target='_blank'>Betfair </a> (".$qr_ver->num_rows().")";
				
					echo "<br>";
					echo $odd->marketName.' - ';
					echo $correspondido;
					echo "<br>";

					#print_r($odd);
					#echo "<br>";
					$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					echo $mkt[$n]->status."<br>";
					echo "Wins: ".$mkt[$n]->numberOfWinners."<br>";
					echo "Complete: ".$mkt[$n]->complete."<br>";
					echo "Delay ".$mkt[$n]->betDelay."<br>";
					echo "Live".$mkt[$n]->inplay."<br>";
					#print_r($mkt[$n]->runners);
					echo "<ul>";
						foreach($mkt[$n]->runners as $dd_sel){
							echo "<li>".$dd_sel->status." ********** </li>";
						}
					echo "</ul>";
					#echo $mkt[$n]->version."<br>";
					
					print_r($mkt[$n]);
					#$arr[$n] = $this->bet_model->printMarketIdRunnersAndPrices($odd, $mkt[$n],$odd->marketId);
				} // x if de contagem de casas decimais
		}
		
		*/
	}

#######################  CORRECT SCORE
function get_mkt_cc($query="CORRECT_SCORE"){
		$this->load->model('betfront_model');
		$this->load->model('bet_model');
		#return false;

		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#get_mercado_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15");
		$arr = array()
;		$mkt = array();
		$n = 0;
		
				#getMarketings_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15")
		foreach($this->bet_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,$query) as $odd){  $n++;
				print_r($odd);
				$correspondido = (int) number_format($odd->totalMatched, 2, ',', '.');
				$correspondido_float =  number_format($odd->totalMatched, 2, ',', '.');
				$limite = number_format(1000, 2, ',', '.');
				$match_len = strlen($correspondido_float);
				#$correspondido = $odd->totalMatched;
				
				#if($match_len > 8){
				#if($odd->totalMatched > 1000 OR $query == "OVER_UNDER_85" OR $query == "OVER_UNDER_75" OR $query == "MATCH_ODDS" OR $query == "CORRECT_SCORE" ){
				#if($odd->totalMatched >= 0){
					$this->db->where('id_mkt',$odd->marketId);
					$qr_ver = $this->db->get('mercados');
					$qr_id_evento = $this->betfront_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$odd->marketId);
					$id_evento = $qr_id_evento[0]->event->id;
					echo "<h1>".$id_evento."</h1>";
					#if($qr_ver->num_rows() == 0){
						$dd_mkt = array(
							'id_evento' => $id_evento,
							'id_mkt' => $odd->marketId,
							'total_matched	' => $correspondido,
							'name' => $odd->marketName,
							'fila' => 0
						);
						$qr_dupli = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'mercados_cc')->num_rows();
						if($qr_dupli == 0){
							$this->db->insert('mercados_cc' , $dd_mkt);
						}
						
					#}
					echo "<br>";
					echo $correspondido." <> ".$correspondido_float." | ".$match_len;
					echo "<br>";
					echo "<a href='".base_url()."bet/horse_mkt/".$odd->marketId."' target='_blank'>".$odd->marketId." </a> (".$qr_ver->num_rows().")";
					echo "<a href='https://www.betfair.com/exchange/plus/football/market/".$odd->marketId."' target='_blank'>Betfair </a> (".$qr_ver->num_rows().")";
				
					echo "<br>";
					echo $odd->marketName.' - ';
					echo $correspondido;
					echo "<br>";

					#print_r($odd);
					#echo "<br>";
					$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					echo $mkt[$n]->status."<br>";
					echo "Wins: ".$mkt[$n]->numberOfWinners."<br>";
					echo "Complete: ".$mkt[$n]->complete."<br>";
					echo "Delay ".$mkt[$n]->betDelay."<br>";
					echo "Live".$mkt[$n]->inplay."<br>";
					#print_r($mkt[$n]->runners);
					echo "<ul>";
						foreach($mkt[$n]->runners as $dd_sel){
							echo "<li>".$dd_sel->status." ********** </li>";
						}
					echo "</ul>";
					#echo $mkt[$n]->version."<br>";
					
					print_r($mkt[$n]);
					#$arr[$n] = $this->bet_model->printMarketIdRunnersAndPrices($odd, $mkt[$n],$odd->marketId);
				#} // x if de contagem de casas decimais
		} // X FOREACH
		
		
	}	

function get_resultados_cc(){
			#return false;
			$this->load->model('betfront_model');
			require_once('includes/betapi/jsonrpc-futbol.php'); 

			#$qr_cc = $this->db->query("SELECT * FROM mercados_cc WHERE status = '0' ORDER BY id asc LIMIT 10 ");	
			$qr_cc = $this->db->query("SELECT * FROM mercados WHERE status = '0' ORDER BY id asc LIMIT 10 ");	

			$n = 0; foreach($qr_cc->result() as $dds){ $n++;
					#$dd_mkt_evento = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$dds->id_evento."'");
					#if($dd_mkt_evento->num_rows() > 0){
						$id_evento = $dds->id_evento; 
					#}else{
					#	echo "Não ta  na tb partidas: ".$dds->id_mkt;
						#return false;
					#}
					$qr_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
					if($qr_evento->num_rows() > 0){
						$dd_evento = $qr_evento->row();
					}else{

					}
					echo $dds->id_mkt." ".$dd_evento->evento." <strong> ".$dds->id_evento."</strong>: (".$qr_evento->num_rows().")";
					echo "<br>";
					$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $dds->id_mkt);
					
					$qr_verifica_resul = $this->padrao_model->get_by_matriz('id_partida',$dds->id_evento,'resultados');
					if($qr_verifica_resul->num_rows() > 0){
						echo "Já foi<br>";
					}else{
						

						foreach($mkt[$n]->runners as $sel){
							echo $sel->selectionId." - ".$sel->status." <br>";
							#print_r($mkt[$n]->runners);
							echo "<br>";
							if($sel->status == "WINNER"){
								$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."' AND selection_name <> '' ");
								if($qr_evento->num_rows() > 0){
									// trata times
									$times = explode(' v ',$dd_evento->evento); 
									#$nm_time_home = $times['0'];
									#$nm_time_home = $times['1'];
									#$id_home = $this->betfront_model->get_id_time($times['0']);
									#$id_away = $this->betfront_model->get_id_time($times['1']);


									####### HOME						
									$home = $this->betfront_model->get_id_time($times['0']);
									echo $times['0']." *************** *(".$qr_name_sel->num_rows().") ";
									if($home->num_rows() > 0){
										$id_home = $home->row()->id;
									}else{
										$dd_new_time = array("time" => $times['0']);
										$this->db->insert('times', $dd_new_time);
										$id_home = $this->db->insert_id();
									}

									####### VISITANTE
									$away = $this->betfront_model->get_id_time($times['1']);
									if($away->num_rows() > 0){
										$id_away = $away->row()->id;
									}else{
										$dd_new_time = array("time" => $times['1']);
										$this->db->insert('times', $dd_new_time);
										$id_away = $this->db->insert_id();
									}
									
									// trata resultado
									
									$gols = explode(' - ',$qr_name_sel->row()->selection_name); 
									$home_gols = $gols['0'];
									$away_gols = $gols['1'];
									// inseri na tb resultados
									$dd_result = array(
										'id_partida' => $dds->id_evento,
										'id_home' => $id_home,
										'id_away' => $id_away,
										'home_gols' => $home_gols,
										'away_gols' => $away_gols
									);
									$this->db->insert('resultados' , $dd_result);
									$dd_fim = array('fim' => 1);
									$this->db->where('id_evento',$dds->id_partida);
									$this->db->update('partidas' , $dd_fim);

									// updatre mercados_cc
									$dd_cc_fim = array('status' => 1);
									$this->db->where('id',$dds->id);
									$this->db->update('mercados_cc' , $dd_cc_fim);


									
									#print_r($dd_result);
									echo $qr_name_sel->row()->selection_name;
									echo "<hr><br>";
								}
							} // x if winner
						}// x foreach


					} // x else ja foi	
				echo $dd_m->id_mkt."<br>";
				#print_r($mkt[$n]);
				echo "<br>";
			} // x foreach

}



################################## pegar resultado do mercado
function get_mkt_resultados($tipo="gols"){

			#echo "opa";
			#return false;
			$this->load->model('betfront_model');
			$this->load->model('bet_model');
			require_once('includes/betapi/jsonrpc-futbol.php'); 

			$db2 = $this->load->database('db2', TRUE);
    		#$this->db2 = $db2;
    		#$dados['db2'] = $db2;

			#$qr_cc = $this->db->query("SELECT * FROM mercados_cc WHERE status = '0' ORDER BY id asc LIMIT 10 ");	
			#$qr_cc = $this->db->query("SELECT * FROM mercados WHERE status = '0' ORDER BY id desc LIMIT 10,10 ");	
			if($tipo == "gols"){
				$qr_gols = $this->db->query("SELECT * FROM mercados WHERE (name LIKE '%over%' OR name LIKE '%First%' ) AND status = '0' ORDER BY RAND() LIMIT 200 ");	
			}
			if($tipo == "win"){
				$qr_gols = $this->db->query("SELECT * FROM mercados WHERE name = 'Match Odds' AND status = '0' ORDER BY RAND() LIMIT 20 ");	
			}

			if($tipo == "cc"){
				$qr_gols = $this->db->query("SELECT * FROM mercados_cc WHERE name = 'Correct Score' AND status = '0' ORDER BY id_evento desc LIMIT 200");	
			}

			

			$n = 0; foreach($qr_gols->result() as $dds){ $n++;
					#$dd_mkt_evento = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$dds->id_evento."'");
					#if($dd_mkt_evento->num_rows() > 0){
						$id_evento = $dds->id_evento; 
					#}else{
					#	echo "Não ta  na tb partidas: ".$dds->id_mkt;
						#return false;
					#}
					$qr_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
					if($qr_evento->num_rows() == 0){
						$qr_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas_bk');
					}
					$dd_evento = $qr_evento->row();
					$id_evento = $dd_evento->id_evento;
					echo "<h1>".$dd_evento->evento."</h1>";
					echo "<h4>".$dd_evento->inicio."</h4>";
					if($qr_evento->num_rows() > 0){
						$dd_evento = $qr_evento->row();
					}else{

					}
					echo $dds->id_mkt." ".$dds->id_evento."</strong>: (".$qr_evento->num_rows().")";

					if($qr_evento->num_rows() == 0 && $tipo == "cc"){
						$dd_cc_fim = array('status' => 1);
						$this->db->where('id',$dds->id);
						$this->db->update('mercados_cc' , $dd_cc_fim);
					}
					echo "<br>";
					$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $dds->id_mkt);
					
					$qr_verifica_resul = $this->padrao_model->get_by_matriz('id_partida',$dds->id_evento,'resultados');
					#echo "opa 2";
					#return false;
					if($qr_verifica_resul->num_rows() > 0){
						echo "Já foi<br>";
					}else{
						

						foreach($mkt[$n]->runners as $sel){
							echo $sel->selectionId." - ".$sel->status." <br>";
							if($sel->status == "WINNER"){
								$status_type = 1;
								$dd_up_status = array('win' => $status_type);
								$where_type = array('id_mkt' => $dds->id_mkt , 'id_selection' => $sel->selectionId);
								$this->db->where($where_type);
								$this->db->update('selections_types',$dd_up_status);
							}

							$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt WHERE  id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."' AND selection_name <> '' ");
							if($qr_name_sel->num_rows() > 0){
								echo $qr_name_sel->row()->selection_name;
							}else{
								$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt_bk WHERE  id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."'");
							}
							#print_r($mkt[$n]->runners);
							echo "<br>";
							#if($sel->status == "WINNER" || $sel->status == "REMOVED"){
							if($sel->status == "WINNER"){
								if($tipo == "cc"){
									$dd_cc_fim = array('status' => 1);
									$this->db->where('id',$dds->id);
									$this->db->update('mercados_cc' , $dd_cc_fim);
								}
								#$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt WHERE selection_id = '".$sel->selectionId."' AND id_mkt = '".$dds->id_mkt."' ");

								
								#$arr_where = array('selection_id' => $sel->selectionId , 'id_mkt' => $dds->id_mkt);
								#$this->db->where($arr_where);
								#$qr_name_sel = $this->db->get('odds_mkt');
								if($qr_name_sel->num_rows() > 0 ){
									echo "<h1>".$qr_name_sel->row()->selection_name."</h1>";
								}
								echo $sel->selectionId." -- (".$qr_evento->num_rows().")--- ".$dds->id_mkt."<br><br><hr />";
								//if($qr_name_sel->num_rows() > 0){
								if($qr_evento->num_rows() > 0){


									// UPDATE NA TB DOS RESULTADOS
									$this->db->query("UPDATE `odds_mkt_bk` SET `id_partida`='".$id_evento."' , `selection_name`='".$qr_name_sel->row()->selection_name."' WHERE id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."'");
									
									// trata resultado
									
									#$gols = explode(' - ',$qr_name_sel->row()->selection_name); 
									#$home_gols = $gols['0'];
									#$away_gols = $gols['1'];
									// inseri na tb resultados
									$qr_sel = $this->padrao_model->get_by_matriz('id_selection',$sel->selectionId,'selections');
									$dd_sel = $qr_sel->row();
									$dd_result = array(
										'id_partida' => $id_evento,
										'id_selection' => $sel->selectionId,
										#'evento' => $dd_evento->evento,
										'id_mkt' => $dds->id_mkt,
										'id_mercado' => $dds->id_mkt,
										'winner' => $dd_sel->name, 
										'status' => 1
										#'id_home' => $id_home,
										#'id_away' => $id_away,
										#'home_gols' => $home_gols,
										#'away_gols' => $away_gols
									);
									/*
									$this->db->where('id_mkt',$dds->id_mkt);
									$qr_hots = $this->db->get('odds_hot');
									if($qr_hots->num_rows() > 0){
										$dd_result['odd'] = $qr_hots->odd;
									}
									*/
									if($tipo == "cc"){
										$dd_result['id_partida'] = $id_evento;
									}
									if($sel->status == "WINNER"){
										$this->db->where($dd_result);
										$qr_dupli = $this->db->get('mkt_result');
										echo "<h1>DUPLI - ".$qr_dupli->num_rows()."</h1>";
										if($qr_dupli->num_rows() == 0){
											$this->db->insert('mkt_result' , $dd_result);
											echo "SET ****<br />";

											echo "ID partida: ".$id_evento."<br>";
										echo "Selection name = ".$dd_sel->name;
										echo "<hr><br>";
										}
									}
									
									#$dd_fim = array('fim' => 1);
									#$this->db->where('id_evento',$dds->id_partida);
									#$this->db->update('partidas' , $dd_fim);

									// updatre mercados_cc
									if($tipo == "cc"){
										$dd_cc_fim = array('status' => 1);
										$this->db->where('id',$dds->id);
										$this->db->update('mercados_cc' , $dd_cc_fim);
									}else{
										$dd_cc_fim = array('status' => 1);
										$this->db->where('id',$dds->id);
										$this->db->update('mercados' , $dd_cc_fim);
									}

									// remove odds_mkt
									$this->db->where('id_mkt',$dds->id_mkt);
									$this->db->delete('odds_mkt');


									
									#print_r($dd_result);
									
								}
							} // x if winner or removed
						}// x foreach


					} // x else ja foi	
				#echo $dd_m->id_mkt."<br>";
				#print_r($mkt[$n]);
				echo "<br>";
			} // x foreach

}

function set_placar_jogo(){

	$qr_resultados = $this->db->query("SELECT * FROM mkt_result WHERE placar = 0 AND id_partida > 0 ORDER BY id desc  LIMIT 500");

	foreach($qr_resultados->result() as $dd){
		echo "3";
		$qr_evento = $this->padrao_model->get_by_matriz('id_evento',$dd->id_partida,'partidas');
		if($qr_evento->num_rows() == 0){
			$qr_evento = $this->padrao_model->get_by_matriz('id_evento',$dd->id_partida,'partidas_bk');
		}
		$dd_evento = $qr_evento->row();
		$id_evento = $dd_evento->id_evento;
		$times = explode(" x ", $dd_evento->evento);
		$home = $times[0];
		$away = $times[1];

		$qr_home = $this->db->query("SELECT * FROM selections WHERE name = '".$home."' ");
		$qr_away = $this->db->query("SELECT * FROM selections WHERE name = '".$away."' ");
		if($qr_home->num_rows() > 0){
			$id_home = $qr_home->row()->id_selection;			
		}else{
			$id_home = 0;
		}
		if($qr_away->num_rows() > 0){
			$id_away = $qr_away->row()->id_selection;			
		}else{
			$id_away = 0;
		}

		$placar = $dd->winner;
		$gols = explode(" - ", $placar);
		$gols_home = $gols[0];
		$gols_away = $gols[1];
		if($gols_home == "Any Other Away Win"){
			$gols_away = 4;
			$gols_home = 0;
		}

		if($gols_away == "Any Other Home Win"){
			$gols_home = 4;
			$gols_away = 0;
		}

		
		$this->db->where('id_partida',$dd->id_partida);
		$qr_resul_verifica = $this->db->get('resultados');
		if($qr_resul_verifica->num_rows() == 0){

			$dd_resultados = array(
				'id_partida' => $dd->id_partida,
				'id_home' => $id_home,
				'id_away' => $id_away,
				'home_gols' => $gols_home,
				'away_gols' => $gols_away
			);
			$this->db->insert('resultados' , $dd_resultados);

		}

		$dd_placar = array('placar' => 1);
		$this->db->where('id',$dd->id);	
		$this->db->update('mkt_result' , $dd_placar);

		echo "<h4>".$dd_evento->evento." (".$qr_resul_verifica->num_rows().")</h1>";
		echo "<h2>".$dd->winner."  </h1>";
		echo "<h6>Casa: ".$home." (".$id_home.") [".$gols_home."]</h6>";
		echo "<h6>Fora: ".$away." (".$id_away.") [".$gols_away."]</h6>";


		
		#print_r($dd);
		echo "<hr />";
		echo "<br />";
	}

}

function get_mkt_resultados_bk($tipo="gols"){

			#echo "opa";
			#return false;
			$this->load->model('betfront_model');
			$this->load->model('bet_model');
			require_once('includes/betapi/jsonrpc-futbol.php'); 

			#$qr_cc = $this->db->query("SELECT * FROM mercados_cc WHERE status = '0' ORDER BY id asc LIMIT 10 ");	
			#$qr_cc = $this->db->query("SELECT * FROM mercados WHERE status = '0' ORDER BY id desc LIMIT 10,10 ");	
			if($tipo == "gols"){
				$qr_gols = $this->db->query("SELECT * FROM mercados WHERE (name LIKE '%over%' OR name LIKE '%First%' ) AND status = '0' ORDER BY RAND() LIMIT 200 ");	
			}
			if($tipo == "win"){
				$qr_gols = $this->db->query("SELECT * FROM mercados WHERE name = 'Match Odds' AND status = '0' ORDER BY RAND() LIMIT 20 ");	
			}

			if($tipo == "cc"){
				$qr_gols = $this->db->query("SELECT * FROM mercados_cc WHERE name = 'Correct Score' AND status = '0' ORDER BY RAND() LIMIT 20 ");	
			}

			

			$n = 0; foreach($qr_gols->result() as $dds){ $n++;
					#$dd_mkt_evento = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$dds->id_evento."'");
					#if($dd_mkt_evento->num_rows() > 0){
						$id_evento = $dds->id_evento; 
					#}else{
					#	echo "Não ta  na tb partidas: ".$dds->id_mkt;
						#return false;
					#}
					$qr_evento = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
					if($qr_evento->num_rows() > 0){
						$dd_evento = $qr_evento->row();
					}else{

					}
					echo $dds->id_mkt." ".$dds->id_evento."</strong>: (".$qr_evento->num_rows().")";
					echo "<br>";
					$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $dds->id_mkt);
					
					$qr_verifica_resul = $this->padrao_model->get_by_matriz('id_partida',$dds->id_evento,'resultados');
					#echo "opa 2";
					#return false;
					if($qr_verifica_resul->num_rows() > 0){
						echo "Já foi<br>";
					}else{
						

						foreach($mkt[$n]->runners as $sel){
							echo $sel->selectionId." - ".$sel->status." <br>";
							if($sel->status == "WINNER"){
								$status_type = 1;
								$dd_up_status = array('win' => $status_type);
								$where_type = array('id_mkt' => $dds->id_mkt , 'id_selection' => $sel->selectionId);
								$this->db->where($where_type);
								$this->db->update('selections_types',$dd_up_status);
							}

							$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt WHERE  id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."' AND selection_name <> '' ");
							if($qr_name_sel->num_rows() > 0){
								echo $qr_name_sel->row()->selection_name;
							}else{
								$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt_bk WHERE  id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."'");
							}
							#print_r($mkt[$n]->runners);
							echo "<br>";
							if($sel->status == "WINNER" || $sel->status == "REMOVED"){
								#$qr_name_sel = $this->db->query("SELECT * FROM odds_mkt WHERE selection_id = '".$sel->selectionId."' AND id_mkt = '".$dds->id_mkt."' ");

								
								#$arr_where = array('selection_id' => $sel->selectionId , 'id_mkt' => $dds->id_mkt);
								#$this->db->where($arr_where);
								#$qr_name_sel = $this->db->get('odds_mkt');
								if($qr_name_sel->num_rows() > 0 ){
									echo "<h1>".$qr_name_sel->row()->selection_name."</h1>";
								}
								echo $sel->selectionId." -- (".$qr_name_sel->num_rows().")--- ".$dds->id_mkt."<br><br><hr />";
								if($qr_name_sel->num_rows() > 0){


									// UPDATE NA TB DOS RESULTADOS
									$this->db->query("UPDATE `odds_mkt_bk` SET `id_partida`='".$qr_name_sel->row()->id_partida."' , `selection_name`='".$qr_name_sel->row()->selection_name."' WHERE id_mkt = '".$dds->id_mkt."' AND selection_id = '".$sel->selectionId."'");
									
									// trata resultado
									
									#$gols = explode(' - ',$qr_name_sel->row()->selection_name); 
									#$home_gols = $gols['0'];
									#$away_gols = $gols['1'];
									// inseri na tb resultados
									$dd_result = array(
										'id_partida' => $dds->id_evento,
										'id_selection' => $sel->selectionId,
										#'evento' => $dd_evento->evento,
										'id_mkt' => $dds->id_mkt,
										'id_mercado' => $dds->id_mkt,
										'winner' => $qr_name_sel->row()->selection_name, 
										'status' => 1
										#'id_home' => $id_home,
										#'id_away' => $id_away,
										#'home_gols' => $home_gols,
										#'away_gols' => $away_gols
									);
									/*
									$this->db->where('id_mkt',$dds->id_mkt);
									$qr_hots = $this->db->get('odds_hot');
									if($qr_hots->num_rows() > 0){
										$dd_result['odd'] = $qr_hots->odd;
									}
									*/
									$this->db->where($dd_result);
									$qr_dupli = $this->db->get('mkt_result');
									echo "<h1>DUPLI - ".$qr_dupli->num_rows()."</h1>";
									if($qr_dupli->num_rows() == 0){
										$this->db->insert('mkt_result' , $dd_result);
										echo "SET ****<br />";
									}
									
									#$dd_fim = array('fim' => 1);
									#$this->db->where('id_evento',$dds->id_partida);
									#$this->db->update('partidas' , $dd_fim);

									// updatre mercados_cc ##################################
									$dd_cc_fim = array('status' => 1);
									$this->db->where('id',$dds->id);
									$this->db->update('mercados' , $dd_cc_fim);

									// remove odds_mkt
									$this->db->where('id_mkt',$dds->id_mkt);
									$this->db->delete('odds_mkt');


									
									#print_r($dd_result);
									echo "ID partida: ".$qr_name_sel->row()->id_partida."<br>";
									echo "Selection name = ".$qr_name_sel->row()->selection_name;
									echo "<hr><br>";
								}
							} // x if winner or removed
						}// x foreach


					} // x else ja foi	
				#echo $dd_m->id_mkt."<br>";
				#print_r($mkt[$n]);
				echo "<br>";
			} // x foreach

}

function selections_type(){
	$qr = $this->db->query("SELECT * FROM selections_types ORDER BY id desc LIMIT 20");
	foreach ($qr->result() as $dd) {
		$qr_sel1 = $this->padrao_model->get_by_matriz('id_selection',$dd->id_selection,'selections');
		if($qr_sel1->num_rows() == 0){
			$sel1 = "Indefinido";
		}else{
			$sel1 = $qr_sel1->row()->name;
		}
		if($sel1 != "The Draw"){
			echo "<h3>".$dd->id_mkt."</h3>";
			echo "<strong>$sel1</strong>: ".$dd->tipo." @".$dd->odd;
			#print_r($dd);
			echo "<BR><HR>";
		}
	}
}

//  REMOVE CORRIDA DA FILA
function end_fila($tipo="win"){


	$this->load->model('betfront_model');
	$this->load->model('bet_model');
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	if($tipo == "win"){
		$qr_win_fila = $this->db->query("SELECT * FROM runs_horses WHERE countryCode <> 'AV'  AND status = 1 ORDER BY marketId");
	}

	if($tipo == "avb"){
		$qr_win_fila = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId");
	}
	if($qr_win_fila->num_rows() > 0){
		$cc = 0;
		foreach($qr_win_fila->result() as $fila){ $cc++;
			$mkt = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $fila->marketId);
			#print_r($mkt);
			#echo $cc;
			#echo "<br>";
			#echo "OIKJ";
			#return false;

			if($mkt->status == "CLOSED" || $mkt->status == "REMOVED"){

				print_r($mkt);
				echo $cc;
				echo "<br>";


				$dd_status = array('status' => 2);
				$this->db->where('marketId',$fila->marketId);
				$this->db->update('runs_horses',$dd_status);


				$this->db->where('id_mkt',$fila->marketId);
				$this->db->delete('odds_mkt_horses');

				#$this->db->where('id_mkt',$fila->marketId);
				#$this->db->delete('odds_mkt_horses_dia');


				echo "<h1><strong style='color:red'>Removida</strong> ".$fila->marketId." ".$mkt->status."</h1>";
				echo "<br><hr />";
				// remove odds
				#$this->db->where('id_mkt',$fila->marketId);
				#$this->db->delete('odds_mkt_horses');
			}else{
				if($mkt->status == "SUSPENDED"){
					echo "<h1><strong style='color:orange'>Suspensa</strong> ".$fila->marketId." ".$mkt->status."</h1>";
				}else{
					echo "...";
				}
			}
			
		}
	}

}

function ver_resultados(){
	$qr = $this->db->query("SELECT * FROM mkt_result order by id desc LIMIT 10");
	echo "<h1>".$qr->num_rows()."</h1>";
	foreach($qr->result() as $dd){
		$qr_odds = $this->db->query("SELECT * FROM odds_mkt_bk WHERE id_mkt = '".$dd->id_mercado."' order by id desc LIMIT 10");
		echo "<h3>".$dd->id_mercado." (".$qr_odds->num_rows().") - ".$qr_odds->row()->nm_mkt." </h3>";
		if($qr_odds->num_rows() > 0){
			echo "<ul>";
				foreach($qr_odds->result() as $odd){
					echo "<li>".$odd->selection_id."</li>";
				}
			echo "</ul>";
		}
	}
}

function set_bk_odds_mkt(){
	/*
	$hots_ended = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE h.resultado = 22 AND m.status = 1 ORDER BY id desc LIMIT 500");
	*/			
	/*
	$hots_ended = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE m.status = 1 ORDER BY id desc LIMIT 500");
	*/

	$mercados_ended = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM mercados  m 
				INNER JOIN odds_hot h ON m.id_mkt = h.id_mkt
				WHERE m.status = 1 ORDER BY id desc LIMIT 500");
	#echo $mercados_ended->num_rows;
	#return false;
	$c=0;
	foreach($mercados_ended->result() as $hot){ $c++;

		$qr_selecao = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot->id_mkt."' AND selection_id = '".$hot->selection_id."' AND selection_name <> '' ORDER BY id asc LIMIT 1");

		$qr_selecao_bk = $this->db->query("SELECT * FROM odds_mkt_bk WHERE id_mkt = '".$hot->id_mkt."' AND selection_id = '".$hot->selection_id."' AND selection_name <> '' LIMIT 1");

		$qr_selecao_bk_mkt = $this->db->query("SELECT * FROM odds_mkt_bk WHERE id_mkt = '".$hot->id_mkt."' LIMIT 1");


		echo " [".$c."]  ".$hot->id_partida."  ".$hot->id_mkt."  ".$hot->selection_id." (".$qr_selecao->row()->selection_name.") -- @".$qr_selecao->row()->odd."<br>";
		echo "<ul>";
			echo "<li>".$qr_selecao->num_rows()." - odds_mkt</li>";
			echo "<li>".$qr_selecao_bk->num_rows()." - odds_mkt_bk</li>";
			echo "<li>".$qr_selecao_bk_mkt->num_rows()." - odds_mkt_bk mkt</li>";
		echo "</ul>";
		if($qr_selecao_bk->num_rows() == 0){
			echo "<p>".$qr_selecao->row()->selection_name."</p>";

			/*
			if($qr_selecao_bk_mkt->num_rows() == 1){
				echo "<h1>UPDATE</h1>";
				$this->db->query("UPDATE `odds_mkt_bk` SET `id_partida`='".$hot->id_partida."' , `selection_name`='".$qr_selecao->row()->selection_name."' WHERE id_mkt = '".$hot->id_mkt."' AND selection_id = '".$hot->selection_id."'");
			}*/
			

			#if($qr_selecao_bk_mkt->num_rows() == 0){
				$dd_odds_mkt_bk = array(
					'id_partida' => $hot->id_partida,
					'id_mkt' => $hot->id_mkt,
					'selection_id' => $hot->selection_id,
					#'nm_mkt' => ,
					'selection_name' => $qr_selecao->row()->selection_name,
					'odd' => $qr_selecao->row()->odd,
				);
				if($qr_selecao_bk->num_rows() > 0){
					#$this->db->insert('odds_mkt_bk' , $dd_odds_mkt_bk);
				
					#$this->db->where('id_mkt',$hot->id_mkt);
					#$this->db->delete('odds_mkt');

				}


			#}
		} // x if num_rows

		if(
			$qr_selecao->num_rows() == 1 &&
			$qr_selecao_bk->num_rows() == 1 &&
			$qr_selecao_bk_mkt->num_rows() == 1 
		){
			#$this->db->where('id_mkt',$hot->id_mkt);
			#$this->db->delete('odds_mkt');
		}

	} // x foreach

	echo $mercados_ended->num_rows();
	echo "<br>OK";
}

###############  FACEBOOK
	function publi_post(){
		// ID facebook = 10215316871132477
		// TOKEN DE ACESSO = EAABqZApjvtoMBAOOFgNiYm399ZAhMitmBvQKVmi4zGBm9j5fkR61nGV8u7N5g8tLSkXckTBc1i6ZBZAhWBH0ePnCe6SG9OpUN2DGMJLAqSdfZAIfBkh24ZAhap6OGsQgFF5lMZBZCZB41lqm6erbj7JeB99ZBDI5whxV2eYJMKTLpVM5ZAKTZCsHddIpKl4CJ6njUOlSPiXYN8948TT6QAZCoBZCqcplWJRqcS0rixtulSaNhNlQZDZD
		// id _page = 982236548586109
		$check = false;
		#$hots_qr = $this->db->query("SELECT * FROM odds_hot WHERE  face_publi = 0 ORDER BY id desc limit 1");
		
		$hots_qr = $this->db->query("SELECT  DISTINCT  p.id_evento,h.id_mkt,  p.evento,   h.face_publi , h.dt_upgrade, m.selection_name,h.tipo,h.tamanho, me.name 
FROM odds_hot as h
INNER JOIN odds_mkt as m ON h.id_mkt = m.id_mkt
INNER JOIN mercados as me ON h.id_mkt = me.id_mkt
INNER JOIN partidas as p ON h.id_partida = p.id_evento
WHERE h.face_publi = 0  AND m.selection_name <> '' AND h.tamanho < 100 ORDER BY h.dt_upgrade asc ");


		if($hots_qr->num_rows() > 0){
			echo $hots_qr->num_rows();
			echo "<hr>";
			echo $hots_qr->row()->evento;
			echo "<br>";
			echo $hots_qr->row()->selection_name;
			echo "<br>";
			echo $hots_qr->row()->tamanho;
			echo "<hr>";
		}
		if($check == true){
			// Dados da API
			$page_id = '982236548586109';
			$page_access_token = 'EAABqZApjvtoMBAKjHO8tqfdL2IO8EIZBRuI6ZCTRifGsk1SZCZAIFiZBPUpD2ATQ8kF1vIjF6ZCjVVYe4xmPO0IwtDtz6GuoC4RLJVT6KNNpbuoN9AclW0rZArHqHrxY5aaAg3UzetdExUTLeCZBgqL9JW8gLucuMhjoM4R6ybRkQ7tXuJ4T7tt609Tb7bNh1vZAsZD';
			// Monta o post do FB
			$data['message'] = "Apostas para  Brasil de Pelotas x Coritiba";
			// uma imagem para o seu post (opcional)
			#$data['picture'] = "https://scontent.frec6-1.fna.fbcdn.net/v/t1.0-9/21078742_982241235252307_4954350907449402965_n.png?_nc_cat=0&oh=9a67abfc323c84f74d8414bff11fee1a&oe=5BF92E73";
			// um link para quando clicarem no seu post
			$data['link'] = "https://tradersize.com/bets/jogo/Brasil-de-Pelotas-v-Coritiba/28866048";
			// descrição do post
			$data['description'] = "Campeonato Brasileiro Série B";
			// subtítulo
			$data['caption'] = "Informação atualizada em " . date("d/m/Y H:i:s");
			$data['access_token'] = $page_access_token;
			// Efetua a chamada da API
			$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $post_url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$return = curl_exec($ch);
			// Escreve na tela o retorno da API
			echo($return);			
			curl_close($ch);
		}

	}

	function publi_post_hots(){
		// ID facebook = 10215316871132477
		// TOKEN DE ACESSO = EAABqZApjvtoMBAOOFgNiYm399ZAhMitmBvQKVmi4zGBm9j5fkR61nGV8u7N5g8tLSkXckTBc1i6ZBZAhWBH0ePnCe6SG9OpUN2DGMJLAqSdfZAIfBkh24ZAhap6OGsQgFF5lMZBZCZB41lqm6erbj7JeB99ZBDI5whxV2eYJMKTLpVM5ZAKTZCsHddIpKl4CJ6njUOlSPiXYN8948TT6QAZCoBZCqcplWJRqcS0rixtulSaNhNlQZDZD
		// id _page = 982236548586109
		$check = true;
		#$hots_qr = $this->db->query("SELECT * FROM odds_hot WHERE  face_publi = 0 ORDER BY id desc limit 1");
		//echo "::".TOKEN_FACE;

		$hots_qr = $this->db->query("SELECT * FROM odds_hot WHERE face_publi = 0   AND tamanho < 100 AND resultado = 0 ORDER BY fila asc LIMIT 1 ");



		if($hots_qr->num_rows() > 0){
			$n_fila = $hots_qr->row()->fila+1;
			$dd_new_fila = array('fila' => $n_fila);
			$this->db->where('id',$hots_qr->row()->id);
			$this->db->update("odds_hot",$dd_new_fila);
			
			$dd_partida = $this->padrao_model->get_by_matriz('id_evento',$hots_qr->row()->id_partida,'partidas');
			if($dd_partida->num_rows() > 0){
				$evento = $dd_partida->row()->evento;
			}else{

				$dd_partida_bk = $this->padrao_model->get_by_matriz('id_evento',$hots_qr->row()->id_partida,'partidas_bk');
				if($dd_partida_bk->num_rows() > 0){
					$evento = $dd_partida_bk->row()->evento;

				}else{
					$evento = "Não definido";
					$check = false;
				}
			}

			#$dd_mkt = $this->padrao_model->get_by_matriz('id_mkt',$hots_qr->row()->id_mkt,'partidas');
			$dd_mkt = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hots_qr->row()->id_mkt."' AND selection_id =  '".$hots_qr->row()->selection_id."'  ");
			if($dd_mkt->num_rows() > 0){
				$sel = $dd_mkt->row()->selection_name;
			}else{
				$sel = "Selection Não definido";
				$check = false;
			}
			echo "<h1>".$hots_qr->row()->id."</h1>";

			$texto_face = "Apostas: ".$evento." | ".$sel." (".$hots_qr->row()->tipo.")  ".$hots_qr->row()->tamanho."% Correspondido. ";
			$texto_face .= "#apostas #futebol #apostasesportivas #apostasonline #bet #apostador #tipster #o #tradingesportivo #palpites #futebolaovivo #palpitesdefutebol #bettingtips #trader #sportingbet #apostafutebol #futebolbrasileiro #apostaesportiva #traderesportivo #loucosporfutebol #apaixonadoporfutebol #bets #futebolnaveia #esporte #betting #tips #traders #dinheiro #betfair #bhfyp";
			//$texto_face .= " #betfair #traderesportivo #bets #futebol #trader #bolsaesportiva ";
			// MAIS TAGS
			//$texto_face .= "  #trading #traderesportivo #punteresportivo #sportpicks #footballtips #bettingtips #tipster #aposta #apostasesportivas #apostasonline #188bet #rivalo #bet365 #betway ";
			/*
			echo $hots_qr->num_rows();
			echo "<hr>";
			echo $evento;
			echo "<br>";
			echo $hots_qr->row()->id_mkt."  ".$sel." (".$hots_qr->row()->selection_id.") ";
			echo "<br>";
			echo $hots_qr->row()->tamanho."%";
			echo "<br>";
			echo $hots_qr->row()->tipo;
			echo "<hr>";
			*/
			

			$link = base_url()."futebol/jogo/".url_title($evento)."/".$hots_qr->row()->id_partida;
			echo $texto_face;
			echo "<br>";
			echo $link;
			echo "<br>";
			echo " ---- ".$check;

			if($check == true){
				// Dados da API
				$page_id = '982236548586109';
				$page_access_token = TOKEN_FACE;
				// Monta o post do FB
				$data['message'] = $texto_face;
				// uma imagem para o seu post (opcional)
				$data['picture'] = "https://tradersize.com/logo/logo-face.png";
				// um link para quando clicarem no seu post
				$data['link'] = $link;
				// descrição do post
				$data['description'] = "Trader Size ".$evento;
				// subtítulo
				$data['caption'] = "Informação atualizada em " . date("d/m/Y H:i:s");
				$data['access_token'] = $page_access_token;
				// Efetua a chamada da API
				$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $post_url);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$return = curl_exec($ch);
				// Escreve na tela o retorno da API
				print_r($return);			
				curl_close($ch);

				$dd_ja_foi = array('face_publi' => '1');
				$this->db->where('id',$hots_qr->row()->id);
				$this->db->update('odds_hot' , $dd_ja_foi);
			}


		}else{
			echo "No Hots";
		}
		

	}

	function partidas_bk(){
		#echo "opaa";
		#$this->db->order_by('inicial','asc');
		#$this->db->limit("500");
		$qr_total = $this->db->query(" SELECT * FROM partidas");
		if($qr_total->num_rows() < 2200){
			return false;
		}else{
			$limite = $qr_total->num_rows() - 2000;
		}
		$qr = $this->db->query(" SELECT * FROM partidas ORDER BY id asc LIMIT $limite");
		echo $qr->num_rows();
		
		foreach($qr->result() as $p){
			echo $p->id;
			$id_del = $p->id;
			unset($p->id);
			print_r($p);
			echo "<br><hr>";
			#$this->db->where('id_evento',$p->id_evento);
			#$qr_ver = $this->db->get('partidas_bk');
			$qr_ver = $qr = $this->db->query(" SELECT * FROM partidas_bk WHERE id_evento = ".$p->id_evento." ");
			if($qr_ver->num_rows() == 0){
				$this->db->insert('partidas_bk' , $p);
			}
			
			$this->db->where('id',$id_del);
			$this->db->delete('partidas');
		}
		redirect('cron/proximos_jogos');
		
	}
	///////////////////// TWITTER
	function twt(){
		$this->twitar("Primeiro Twitter", "TraderSize", "N2009Lab");	
	}
	function twitar($mensagem, $usuario, $senha){		
		$mensagem = stripslashes(htmlspecialchars($mensagem));
		$usuario = stripslashes(htmlspecialchars($usuario));
		$senha = stripslashes(htmlspecialchars($senha));  
		$headers = stream_context_create(array(
			'http' => array(
			'method'  => 'POST',
			'header'  => sprintf("Authorization: Basic %s\r\n", base64_encode($usuario.':'.$senha)).
			"Content-type: application/x-www-form-urlencoded\r\n",
			'content' => http_build_query(array('status' => $mensagem)),
			'timeout' => 10
			),
		));
		$ret = file_get_contents('http://twitter.com/statuses/update.xml', false, $headers);
		return (false !== $ret); 
		echo "<br />";
		echo "Twitando BOT...<br>";
		echo $mensagem;
	}



	////////////////////// HORSES
	function get_runs($red=""){
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 

		$t = 0; foreach ($this->betfront_model->get_run_Horses($APP_KEY, $SESSION_TOKEN,7,700) as $jogo) { $t++;
			$dd_evento = $this->betfront_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$jogo->marketId);
			#echo "<h1>".$t."</h1>";
			
			$num_rows = $this->padrao_model->get_by_matriz('marketId',$jogo->marketId,'runs_horses')->num_rows();
			if($num_rows == 0){
	           // include("includes/bet/horses_list_tb.php");
				// INSERT DB
				$dd_run = array(
				  'id_evento' => $dd_evento[0]->event->id,
				  'nome' => $dd_evento[0]->event->name,
				  'marketId' => $jogo->marketId ,
				  'marketName' => $jogo->marketName ,
				  'totalMatched' => $jogo->totalMatched ,
				  'countryCode' => $dd_evento[0]->event->countryCode,
				  'timezone' => $dd_evento[0]->event->timezone,
				  'local' => $dd_evento[0]->event->venue,
				  'inicio' => $dd_evento[0]->event->openDate,
				  'open_date' => $dd_evento[0]->event->openDate
				);
				$this->db->insert('runs_horses',$dd_run);
			}
			if($red == ""){
				print_r($jogo);
				echo "<hr />";
				print_r($dd_evento);

				echo "<br /><br /><br />";
			}




        } // x foreach
        if($red != ""){
        	redirect('horses/next');
        }else{
			echo "ok";
		}
	}

	function proximos20(){
		#echo "OK";
		#return false;

		#$this->db->order_by('inicio','asc');
		#$this->db->limit(20);
		#$qr = $this->db->get('runs_horses');

		echo "<h1>ATUALIZANDO PRÓXIMAS 4 CORRIDAS...</h1>";
		// ORDER BY data_timezone
		/*
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE (status < 2) AND


								(countryCode = 'GB' OR 
								countryCode = 'IE' OR
								countryCode = 'US' OR
								countryCode = 'AU') 

								ORDER BY data_timezone asc
								LIMIT 4

			");
		*/
		
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE (status < 2) AND


								(countryCode = 'GB' OR 
								countryCode = 'IE' OR
								countryCode = 'US' OR
								countryCode = 'AU') 

								ORDER BY data_timezone asc
								

			");
		
		$qr_fila = $this->db->query("SELECT * FROM runs_horses WHERE (status = 1) AND


								(countryCode = 'GB' OR 
								countryCode = 'IE' OR
								countryCode = 'US' OR
								countryCode = 'AU') 

								ORDER BY data_tratada asc
								

			"); // LIMIT 4
		$vez = 0;
		echo "Antes: ".$qr->num_rows()." - ".$qr_fila->num_rows(); 
		echo "<br />";
		foreach($qr->result() as $run){ $vez++;
			
			if($vez <= 4){
				$status_fila = 1;
			}else{
				$status_fila = 0;
			}
			$dd_status = array('status' => $status_fila , 'vez' => $vez);
			$this->db->where('id',$run->id);
			$this->db->update('runs_horses' ,$dd_status);

			echo "<strong>".$run->countryCode." - ".$run->marketId."</strong> ".$run->data_timezone." ".$run->marketId." (".$run->status.") [".$vez."] s ".$status_fila." ";
			echo "<br />";
		}

		echo "<br>";
		echo "Depois: ".$qr->num_rows()." - ".$qr_fila->num_rows(); 

	}
	// get_odds
	function get_odds_horses($mercado=1,$ordem=0,$qtd=300){

		
		$this->load->model('bet_model');
		$this->load->model('betfront_model');

		$mkt = "WIN";

		$dados['mercado'] = $mercado;
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo "OK";
		//echo $mkt;
		$country = "GB";
		#$country = "AU";
		#$country = "US";
		#$where = array('status' => 0, 'countryCode' => 'GB');
		#$where = array('status' => 0, 'countryCode' => $country);
		if($qtd == 300){
			$where = array('status' => 0);
			$status_where = "status = 0 ";
		}
		if($qtd == 20 || $qtd == 'avb'){
			$where = array('status' => 1);
			$status_where = "status = 1 ";
		}

		#$this->db->where($where);
		if($ordem == 0){
			$this->db->order_by('fila','asc');
			$order_by = "ORDER BY fila asc";
		}else{
			$this->db->order_by('id','asc');
			$order_by = "ORDER BY id asc";
		}
		#$this->db->order_by('id','asc');
		#$this->db->limit(1,0);
		#$qr = $this->db->get('runs_horses');


		#$qr = $this->db->query("SELECT * FROM runs_horses WHERE (countryCode = 'GB' OR countryCode = 'AV' OR countryCode = 'US' OR countryCode = 'IE' OR countryCode = 'AU' ) AND $status_where $order_by LIMIT 1 ");

		$vez = 1;


		if($qtd == "avb"){
			#echo "<h1 style='color:red'>OPA OPA</h1>";


			$qr_vez = $this->db->query("SELECT * FROM fila WHERE tipo = 'avb'");
			$nova_vez = $qr_vez->row()->fila;
			if($nova_vez > 4){
				$nova_fila = 1;
			}else{
				$nova_fila = $nova_vez + 1;				
			}
			$dd_fila = array('fila' => $nova_fila);
			$this->db->where('tipo','avb');
			$this->db->update('fila',$dd_fila);


			$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV' AND vez = $nova_vez  AND $status_where ORDER BY RAND() LIMIT 1 ");

		}else{

			

			$qr_vez = $this->db->query("SELECT * FROM fila WHERE tipo = 'win'");
			$nova_vez = $qr_vez->row()->fila;
			if($nova_vez > 4){
				$nova_fila = 1;
			}else{
				$nova_fila = $nova_vez + 1;				
			}
			$dd_fila = array('fila' => $nova_fila);
			$this->db->where('tipo','win');
			$this->db->update('fila',$dd_fila);
			//$nova_fila = $qr_vez->row()->fila;

			//RANDOMICO
			if($qtd == "300"){
				$qr = $this->db->query("SELECT * FROM runs_horses WHERE (countryCode = 'GB'  OR countryCode = 'US' OR countryCode = 'IE' OR countryCode = 'AU' ) AND $status_where ORDER BY fila asc LIMIT 1 ");
			}else{
				$qr = $this->db->query("SELECT * FROM runs_horses WHERE (countryCode = 'GB'  OR countryCode = 'US' OR countryCode = 'IE' OR countryCode = 'AU' ) AND vez = $nova_vez AND $status_where ORDER BY RAND() LIMIT 1 ");
			}
		
		#$qr = $this->db->query("SELECT * FROM runs_horses WHERE (countryCode = 'GB'  OR countryCode = 'US' OR countryCode = 'IE' OR countryCode = 'AU' ) AND $status_where $order_by LIMIT 1 ");

		}
		

		if($qr->num_rows() == 0){
			echo "Sem mercados (Vez: $nova_vez)";
			return false;
		}


		
		foreach($qr->result() as $dd_mkt){


			if($qtd == "300"){
				$new_vez = array ('fila' => $dd_mkt->fila+1);
				$this->db->where('id',$dd_mkt->id);
				$this->db->update('runs_horses',$new_vez);

			}else{
				// fila anda
				if( $dd_mkt->fila > 5 ){
					#$new_vez = array ('fila' => 0);
					$new_vez = array ('fila' => 0);
					#$new_vez = array ('fila' => $dd_mkt->fila+1);
				}else{
					$new_vez = array ('fila' => $dd_mkt->fila+1);
				}
				$this->db->where('id',$dd_mkt->id);
				$this->db->update('runs_horses',$new_vez);
			}


			
			#echo $dd_mkt->id_mkt." (".$dd_mkt->fila.")";
			#echo "<br><br>";
			
			#$dd_evento = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$dd_mkt->id_mkt);
			#print_r($dd_evento); 
			#return false;
			echo "<h2>".$dd_mkt->local." (".$dd_mkt->id.")  ----- ".$dd_mkt->countryCode."</h2>";
			#return false;
			
			$id_jogo = $this->get_id_evento_bot($dd_mkt->marketId);
			#echo $id_jogo."<br>";
			#return false;
			#$dados['id_jogo'] = 0;


			#echo $mercado;
			#return false;
			
			
			
			$id_mkt = $dd_mkt->marketId;
			//echo "aqui";
			#return false;
			############################## GET ODDS DO MERCADO
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			#$APP_KEY = 'qD8D8WZ300PJGjbN';
			#$APP_KEY = '6A1cQNtoRmi0GDOS'; //ccccccccc     meu id vendor
			#$APP_KEY = 'qD8D8WZ300PJGjbN'; // LIVE
			#$SESSION_TOKEN = 'cnEEv5hjDUcY9/BDPOq3xMX2K478JFihZiYY3Ov+eeI='; // igormarlus
			
			$get_id_mkt = $this->betfront_model->get_id_mkt_api($APP_KEY, $SESSION_TOKEN,0,$id_mkt);
			$id_partida = $get_id_mkt[0]->event->id;
			echo "<h3>".$id_partida."</h3>";
			echo "<h3 style='color:green'>".$id_mkt."</h3>";
			#print_r($get_id_mkt[0]);
			echo "<br><hr><br>";
			#$mercados = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_partida,10);
			$mercados = $this->betfront_model->getMarketings_horses($APP_KEY, $SESSION_TOKEN,$id_partida);
			

			 $m = 0; foreach ($mercados as $mercado) { $m++;
			 	if($mercado->marketType == "MATCH_BET"){
			 		$avb_mkt = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_partida,"MATCH_BET");
			 		#echo "<h1 style='color:red'>".print_r($avb_mkt)."</h1>";

			 		$dd_avb = array('id_avb' =>  $avb_mkt[0]->marketId);
			 		$this->db->where('id_mkt',$id_mkt);
			 		$this->db->update('odds_mkt_horses' , $dd_avb);
			 		echo "<h2>".$mercado->marketType." AVB  <strong>".$avb_mkt[0]->marketId."</strong></h2>";
			 		// INSERI NA FILA
			 		$qr_verifica_avb = $this->padrao_model->get_by_matriz('marketId',$avb_mkt[0]->marketId,'runs_horses');
			 		if($qr_verifica_avb->num_rows() == 0){
			 			#$call = "INSERIDO NA FILA";
			 			$call = "NAO ESTA NA FILA";
			 			$dd_fila = array(
			 				'id_evento' => $id_partida,
			 				'marketId' => $avb_mkt[0]->marketId,
			 				'marketName' => "AVB",
			 				'status' => 1,
			 				'fila' => 0
			 			);
			 			#$this->db->insert('runs_horses', $dd_fila);

			 		}else{
			 			$call = "Ja tem";
			 		}

			 		echo "<h2 style='color:blue'> ******".$qr_verifica_avb->num_rows()." $call</h2>";





			 	} // x if MATCH_BET
			 	#echo "<h2>".$mercado->marketType."</h2>";
			 	#echo "<br></hr>";
			} // x foreach

			#print_r($mercados);
			#echo $get_id_mkt[0]->marketId." --- ";
			#echo "<br><hr><br>";


			

			#echo "<br><hr><br>";

			$mkts = $this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt);

			//echo $id_mkt.' - '.$dd_mkt->id_evento;
			//echo "<br>3333";

			#echo "<br><br>";
			$mkts_rows = count($mkts);
			#print_r($mkts);
			//echo "<h1>".$mkts_rows."</h1>";
			// remove mercados encerrados


			################# ATUALIZA HORARIO CORRETO #########
			/*
			$dds_run = $this->betfront_model->get_dd_id_mkt($APP_KEY,$SESSION_TOKEN,$id_mkt,"EVENT");
			$data_tratada = '--';
			foreach($dds_run[0]->event as $key => $dd_hora){
				if($key == "openDate"){
					$data_tratada = $dd_hora;
					echo "<h1 style='color:green'>".$key." --- ".$dd_hora."</h1>";
				}
				#print_r($dd_hora);	
			}
			#print_r($dds_run);
			*/
			$dds_run2 = $this->betfront_model->get_dd_id_mkt($APP_KEY,$SESSION_TOKEN,$id_mkt,"MARKET_DESCRIPTION");
			$data_tratada2 = '--';
			#print_r($dds_run2);
			
			foreach($dds_run2[0] as $key => $dd_hora2){
				
				if($key == "description"){
					#foreach($dd_hora2->description as $key2 => $description){
						#print_r($dd_hora2);
						#echo "<br><hr>";
						$data_tratada2 = $dd_hora2->marketTime;
						#echo "<h1 style='color:blue'> +++ ".$data_tratada2."</h1>";
						$data_timezone = $this->padrao_model->calc_data($dd_hora2->marketTime);

						$new_data_local = $this->padrao_model->calc_data($data_timezone);

						echo "<h2>".$data_timezone." [".$new_data_local."] <strong style='color:red'>*****</strong> </h2>";
						################# ATUALIZA no DB #########
			            $dd_hora = array(
			            	'data_tratada' => $data_tratada2 , 
			            	'data_timezone' => $data_timezone,
			            	'data_local' => $new_data_local
			            );
						$this->db->where('id',$dd_mkt->id);
						$this->db->update('runs_horses' , $dd_hora);

					#}
					
				}else{

					#echo "<h1 style='color:orange'>".$key." +++ ".$dd_hora2."</h1>";

				}
				#print_r($dd_hora);	
			} 
			#print_r($dds_run);


			################# ATUALIZA no DB #########
            #$dd_hora = array('data_tratada' => $data_tratada);
			#$this->db->where('id',$dd_mkt->id);
			#$this->db->update('runs_horses' , $dd_hora);



			#################### ARQUIVA DE ACORDO COM O HORARIO

			
            $data_i = substr($dd_mkt->open_date,0,10);
            $hora_i = substr($dd_mkt->open_date,11,8);
            $now = date("H:i:s");

            $minutos =  strtotime("03:00:00");   

            $now_time = strtotime($now) - $minutos;
            $now_tz = date("H:i:s" , $now_time);


            #echo "<br>";
            $data_br = $this->padrao_model->converte_data($data_i);
            #echo "".$data_i;
            #echo " ".$hora_i."  Data/hora corrida";
            $minutos_c =  strtotime("01:20:00");   
            $dt_evento = $data_i." ".$hora_i;
            $dt_evento_time = strtotime($hora_i) - $minutos_c;
            #echo " ".date("H:i:s" , $dt_evento_time)."  Data/hora corrida<br>";
            #echo "<br>".$now." Data/hora servidor<br>";
            #echo "".$now_tz." Data/hora servidor Tratada<br>";
            //echo date("H:i:s" , $minutos);
            //echo "<br><h2>".$dd_mkt->id."</h2><hr>";


            $dteDiff  = $now_time - $dt_evento_time;
            $dte      = new datetime(date('H:i:s'));
            $dte      = $dteDiff;
            #echo  "Total " . $dte . "<br>";
            #echo "Restam ".date("H:i:s" , $dte)."<br>";
            
            
            #echo $this->padrao_model->fuso_dt($data_i." ".$hora_i,1);
            
            #$tempo_limite_timestamp = -216;
            if($country == "GB" ){
	            $tempo_limite_timestamp = -6250; //  GB Chepstow, Stratford  ## 5 MIN ANTES
	        }
	        if($country == "US" ){
	            $tempo_limite_timestamp = 7500; //  US
	        }

	        #echo "<br>".$dte." - ".$country;
            if($dte > $tempo_limite_timestamp){
            	#echo "<br><b>faltam menos de 5</b><br>";
            	#mysql_query("UPDATE `runs_horses` SET `status`=1 WHERE marketId = '".$id_mkt."'");
				#echo $id_mkt." FIM <a href='".base_url()."horses/next'>Atualizar</a> ";
				#redirect('horses/next' , 'refresh');

            }else{
            	#echo "<br><b>faltam mais de 5</b><br>";
            }




			if($mkts_rows == 0){

				// cadastra em outra tabela para registro
 				/*
				mysql_query("INSERT INTO `historico` SET 
					`id_evento`=111, 
					`id_mkt`='".$id_mkt."', 
					`nm_evento`='nome evento',
					`nm_mkt`='nome mkt',
					`result`='win' 
					");
				*/
				#mysql_query("DELETE FROM runs_horses WHERE marketId = '".$id_mkt."'");
				#mysql_query("DELETE FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."'");
				

					############  REMOVE ODDS #############
				include("includes/mysqli_con.php");
				#mysqli_query($con,"UPDATE `runs_horses` SET `status`= 2 WHERE marketId = '".$id_mkt."'");
				

				#mysqli_query($con,"DELETE FROM  `runs_horses`  WHERE marketId = '".$id_mkt."'");
				mysqli_query($con,"DELETE FROM  `odds_mkt_horses`  WHERE id_mkt = '".$id_mkt."'");
				



				#echo $id_mkt." FIM ";
				#redirect('horses/next');
				#mysql_query("DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."'");
			}else{
				#echo "<h3>".$id_partida."</h3>";
				echo "<p class='bounceInLeft animated'>".$id_mkt." Lendo...</p>";
			}


			
			foreach($mkts as $odd){ 
				
				#print_r($odd);
				if(is_array($odd)){
					#echo "sim";
				}else{
					#echo "nao";
				}
				
				########## 	MOSTRA AS ODDS
				#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
				$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
				echo "<h1>*****".$marketBook->status."</h1>";

				#echo count($odd);
				#echo "<br>";
				#echo count($marketBook);
				#echo "<p>---------------------------</p>";
				#print_r($marketBook);
				#foreach($odd as $dd){
				#	printr_r($dd);
				#}
				#echo "<br>";
				#echo "<br>";
				#echo "******************************************<br>";
				//print_r($marketBook);
				echo "<h2 style='color:orange'>".$marketBook->status."</h2>";
				if($marketBook->status == "CLOSED"){
					#$this->db->where('marketId',$marketBook->marketId);
					#$this->db->delete('runs_horses');
					if(strlen($id_mkt) > 5){
						#include("includes/mysqli_con.php");
						#mysqli_query($con,"UPDATE `runs_horses` SET `status`= 7 WHERE marketId = '".$id_mkt."' LIMIT 1");
					}

					#$this->db->where('id_mkt',$marketBook->marketId);
					#$this->db->delete('odds_mkt_horses');
				}
				

				function mostrar($odd, $marketBook,$id_mkt,$id_jogo,$qtd)
					{
						$dd_odds = array();
						$f = 0;
						$ff = 0;
						$id_partida = $id_jogo;
						#function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
						#{
							foreach ($marketBook->runners as $runner) {
								#print_r($runner);
								#if($runner->runnerName){
								#	$selection_name = $runner->runnerName;
								#	if ($runner->selectionId == $selectionId) break;
									$selectionId = $runner->selectionId;
								#}
									#echo "<br><br>--------";
									#print_r($runner);
									#echo "<br>^^^<br>";
									#echo "<br>";
									#echo "***************";
									if($f == 1){
										$atual = 1;
									}else{
										$atual = 0;
									}

									#echo "<h1>BACK ".$selection_name."</h1>";	
									#echo "<p>(".$runner->selectionId.")</p>";	
									include("includes/mysqli_con.php");
									foreach ($runner->ex->availableToBack as $availableToBack){ $f++;
										//print_r($availableToBack);
										$qr_num = mysqli_query($con,"SELECT id_mkt FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	
										
										if(mysqli_num_rows($qr_num) == 0){
											#echo "<h1>".$id_partida."</h1>";
											mysqli_query($con,"INSERT INTO `odds_mkt_horses` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`,`dt_update`) VALUES ('".$id_partida."','".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)")or die(mysqli_error($con));
										}else{
											mysqli_query($con,"UPDATE `odds_mkt_horses` SET `tamanho` = ".$availableToBack->size." , `dt_update` = CURRENT_TIMESTAMP  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" );
										}

										#echo "<h1 style='color:orange'> F = ".$f." ************* ".$qtd." QTD</h1>";
										
										if($f == 1 || $f == 4){
											
											// define odd atual
											/*
											$qr_up_atual = mysql_query("SELECT * FROM `odds_mkt_horses` WHERE selection_id = ".$selectionId." AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual = mysql_fetch_assoc($qr_up_atual);
												*/
												#mysql_query("UPDATE `odds_mkt_horses` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt_horses`.`id` = ".$atual['id']." ");
										
												//  ################ HOTS
												/*
												$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ")or die(mysqli_error($con));

												$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ")or die(mysqli_error($con));

												$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
												$soma_total_back = mysqli_fetch_assoc($soma_back);
												if($soma_total_sel_back['soma'] > 0){
													$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
												}else{
													$pecentual_back = 0;
												}
												*/


												######################## PEGA CAVALO E JOGA NO AVB #######################
												#echo "<h1 style='color:red'> F = ".$f." ************* ".$qtd." QTD</h1>";
												if($qtd == "avb"){
													echo "<h1 style='color:green'>AVB</h1>";
													$qr_avb_horses = mysqli_query($con,"SELECT * FROM selections_avb WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' "); 	

													$tem_avb_horse = mysqli_num_rows($qr_avb_horses);
													if($tem_avb_horse == 0){

														echo "<h1 style='color:green'>INSERIDO (".$selection_name.") *(".$tem_avb_horse.") (".$availableToBack->price.") (".$availableToBack->price."</h1>";

														mysqli_query($con,"INSERT INTO `selections_avb` (`id_mkt`,  `selection_id`, `selection_name`, `odd`,`percentual` ) 
																					 VALUES (".$id_mkt."' , '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error($con));

													}else{

														echo "<h3 style='color:purple'> UPDATE (".$selection_name.") ".$pecentual_back."% ".$availableToBack->price."</h3>";

														mysqli_query($con,"UPDATE `selections_avb` SET `data` = '".date("Y-m-d)")."' , `odd` = '".$availableToBack->price."' ,`percentual` = ".$pecentual_back." , `dt_update` = CURRENT_TIMESTAMP  WHERE selection_id = '".$selectionId."'  AND id_mkt = '".$id_mkt."'" );

													}

													#$this->db->where('selection_name',$run->runnerName);
													#$qr_avb = $this->db->get('selections_avb');
													#echo "<h1 style='red'>*()*)(*)(".$qr_avb->num_rows()."</h1>";
													
												}
												####################### X CAVALOS AVB ################### 
												
												#echo number_format($pecentual_back, 2, ',', '.').'%';
												$pecentual_back = 0;
												#if($pecentual_back > 85){
														
													/*
													if($availableToBack->price > 1.95 && $availableToBack->price < 2.3){
													
														$qr_hot = mysqli_query($con,"SELECT * FROM odds_hot_horses WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
														if(mysqli_num_rows($qr_hot) == 0 ){
															mysqli_query($con,"INSERT INTO `odds_hot_horses` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
																					 VALUES ( ".$id_partida." ,'".$id_mkt."', 'back', '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error());
														}else{
															mysqli_query($con,"UPDATE `odds_hot_horses` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_back." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'back' ");
														}
													} 
													*/
													
												#}

										} // x if f == 1
										


										#echo " <br> @".$availableToBack->price." | ".$availableToBack->size;;
									}
									#echo "<h1>Lay - ".$selection_name."</h1>";
									#echo "<p>(".$runner->selectionId.")</p>";	
									$L = 0;

									foreach ($runner->ex->availableToLay as $availableToLay){$L++;
										
										if($L == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}

										$qr_num = mysqli_query($con,"SELECT id_mkt FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysqli_error($con)); 
										
										if(mysqli_num_rows($qr_num) == 0){
											mysqli_query($con,"INSERT INTO `odds_mkt_horses` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`,`dt_update`) VALUES ('".$id_partida."','".$id_mkt."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
										}else{
											mysqli_query($con,"UPDATE `odds_mkt_horses` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' , `dt_update` = CURRENT_TIMESTAMP WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  );
										}

										if($L == 1){

												#mysql_query("UPDATE `odds_mkt` SET  `agora` = 0  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												/*
												$qr_up_atual_lay = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual_lay = mysql_fetch_assoc($qr_up_atual_lay);
												*/
												#mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual_lay['id']." ");
												

												$soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_total_sel_lay = mysqli_fetch_assoc($soma_lay_sel);
												$soma_total_lay = mysqli_fetch_assoc($soma_lay);
												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}
													## HOTS ############################		
												if($pecentual_lay > 85){
														########## LAY - IONSERI NO BANCO
													if($availableToLay->price > 1.95 && $availableToLay->price > 2.3){
															/*
															$qr_hot = mysql_query("SELECT * FROM odds_hot_horses WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
															if(mysql_num_rows($qr_hot) == 0 ){
																mysql_query("INSERT INTO `odds_hot_horses` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
												 						VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', '".$selection_name."', '".$availableToLay->price."' , ".$pecentual_lay.")")or die(mysql_error());
															}else{
																mysql_query("UPDATE `odds_hot_horses` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'back' ");
															} */

													}
												}
												

										}	

										#echo "<br> @".$availableToLay->price." ".$availableToLay->size;;
									}

									#echo "<h2 style='color:red'>OK 8</h2>";
									#return false;


								#
								#echo "BACK<br>";	
								#print_r($runner->ex->availableToBack);
								#echo "<br>";	
								#echo "<br>";	
								#echo "<br>";	
								#echo "LAY<br>";	
								#print_r($runner->ex->availableToLay);
							}
						
					}


			}
			#$this->load->view('bot/get_odds' , $dados);
			#$this->load->view('bot/get_odds_mkt_horses' , $dados);
			
			

		} // x qr result
		#echo "<h2 style='color:red'>".$id_partida." </h2>";
		mostrar($odd, $marketBook,$id_mkt,$id_partida,$qtd);	


		#echo "*****************************";
			foreach($mkts as $dd){

				#print_r($dd);
				#echo "<h2> - ".$dd->marketName."</h2>";
				foreach($dd->runners as $run){
					$selection_name_trat = str_replace("'", "", $run->runnerName);
					echo "*-*-*<h2 style='color:blue'>".$run->runnerName." (".$selection_name_trat.") (".$dd->marketId.")</h2>";
					echo "<h4> --".$run->selectionId."</h4>";
					if($run->runnerName != ""){
						echo "-----------------------------------";
						include('includes/mysqli_con.php');
						// VERIFICA NOME DO CAVALO NA TAEBLA selections_horses
						#$this->db->where('name',$run->runnerName);
						#$qr_name = $this->db->get('selections_horses');
						$data_run = substr($dd_mkt->inicio, 0,10);
						$hora_run = substr($dd_mkt->inicio, 11,8);
						$qr_name = mysqli_query($con,"SELECT * FROM `selections_horses` WHERE pais = '".$dd_mkt->countryCode."' AND `name` = '".$selection_name_trat."'  limit 1  ")or die(mysqli_error($con));
						$num_name = mysqli_num_rows($qr_name);


						// CADASTRA E ATUALIZA NOMES DOS CAVALOS NA TABELA selections_horses
						#echo "*-*-*<h2 style='color:green'> +++++++".$qr_name->num_row()." (".substr($dd_mkt->open_date,0,10).")</h2>";
						#echo "<h2 style='color:green'> +++++++".$num_name." (".$dd_mkt->open_date.") <br> ".$data_run." <br/> ".$hora_run." </h2>";


						
						if($num_name == 0){
							mysqli_query($con,"INSERT INTO `selections_horses` (`name`,`pais`,`data_corrida`,`data_hora`) VALUES ('".$selection_name_trat."','".$dd_mkt->countryCode."' ,'".$data_run."' , '".$data_run." ".$hora_run."')") or die(mysqli_error($con));
						}else{
							mysqli_query($con,"UPDATE `selections_horses` SET `data_corrida` = '".$data_run."' , 
								 `data_hora` =   '".$data_run." ".$hora_run."' WHERE name = '".$selection_name_trat."' AND pais = '".$dd_mkt->countryCode."'  ")or die(mysqli_error($con));

						}
						

						$qr_up = mysqli_query($con,"UPDATE `odds_mkt_horses` SET `selection_name` = '".$selection_name_trat."'  WHERE selection_id = '".$run->selectionId."' AND id_mkt = '".$dd->marketId."'   ")or die(mysqli_error($con));

						// VERIFICA AVB
						
						$this->db->where('selection_name',$selection_name_trat);
						$qr_avb = $this->db->get('selections_avb');
						echo "<h1 style='color:red'> ++ ".$qr_avb->num_rows()." tem no horses_avb</h1>";
						if($qr_avb->num_rows() > 0){
							echo "<hr />";
							echo "<p> @".$qr_avb->row->odd."  ".$qr_avb->row->percentual." % <p/>";
							echo "<hr />";
							$id_mkt_avb = $qr_avb->row()->id_mkt;
							echo "<h1 style='color:red'>Mandou esse: ".$id_mkt_avb."</h1>";
							$dd_status_avb = array('status' => 1);
							$this->db->where('marketId',$id_mkt_avb);
							$this->db->update('runs_horses',$dd_status_avb);
						}
					}
					
				}
				
			}
		

	} // fn

	function new_hots($live=""){
		#echo "OPppa";
		if($live == ""){
			$qr_hots = $this->db->query("SELECT * FROM odds_hot WHERE view = 0 AND resultado = 0");
			#$qr_hots = $this->db->query("SELECT * FROM odds_hot WHERE  resultado = 0");
		}
		if($live == "33"){
			$qr_hots = $this->db->query("SELECT * FROM odds_hot WHERE view = 0 AND resultado = 33");
			#$qr_hots = $this->db->query("SELECT * FROM odds_hot WHERE  resultado = 33");
		}
		$dados['hots'] = $qr_hots;
		$dados['live'] = $live;
		$this->load->view('2020/tr_hots' , $dados);
	}


	function clear_odds_mkt(){
		$qr = $this->db->get('odds_mkt');
		$qr_hots = $this->db->get('odds_hot');

		echo $qr->num_rows();
		echo "<br>";
		if($qr->num_rows() > 10000){
			$sub = $qr->num_rows() - 10000;
			echo $sub;
			$this->db->query("DELETE FROM odds_mkt ORDER BY id asc LIMIT $sub");
		}

		if($qr_hots->num_rows() > 200){
			$sub_hot = $qr_hots->num_rows() - 200;
			echo $sub_hot;
			$this->db->query("DELETE FROM odds_hot ORDER BY id asc LIMIT $sub_hot");
		}
	} // x fn



	// FUNÇÃO AUGUSTO PARA O THRPOST
	function replace_name_tb(){
		
		$this->db->query("delete from corridas_cavalos_2022 where selection_name like '%lengths%'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Reverse FC'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Forecast'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Reverse Forecast'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Rrverse FC'");
		$this->db->query("delete from corridas_cavalos_2022 where selection_name like '%£%'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name like '%Forecsat%'");
		$this->db->query("delete from corridas_cavalos_2022 where selection_name = 'yes'");
		$this->db->query("delete from corridas_cavalos_2022 where selection_name = 'no'");
	
		echo "OK";
	}
	
	
}
