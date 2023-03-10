<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Botbet extends CI_Controller {

	function get_soccers() {
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$campeonatos = $this->bet_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		
		foreach($campeonatos as $dd){	
			$t=0;  
			echo "<h1>".$dd->competition->name."</h1>";
			foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$dd->competition->id) as $jogo) { $t++;
			
			/*
			$qr_num = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$jogo->event->id."'"); 				
			if(mysql_fetch_assoc($qr_num) == 0){
				mysql_query("INSERT INTO `partidas` (`id_evento`,`evento`,`id_competition`,`inicio`) VALUES ('".$jogo->event->id."','".$jogo->event->name."' , '".$jogo->event->id."' , '".$jogo->event->openDate."')")or die(mysql_error());
			}
			*/
			
			
			echo $jogo->event->name;
			echo "<p>".print_r($jogo)."</p>";
			echo "<br>";
			
			}
		}
				echo "OK";		
		#$this->load->view('bet/base' , $dados);	
	}
	
	function get_times() {
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$campeonatos = $this->bet_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$qtd = 0;
		foreach($campeonatos as $dd){	 $qtd++;
			$t=0;  
			echo "<h1>".$dd->competition->name."</h1>";
			#if($qtd < 10){
				foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$dd->competition->id) as $jogo) { $t++;
				
				$dd_evento = explode(" v ",$jogo->event->name);
				
				
				$qr_num = mysql_query("SELECT * FROM times WHERE time = '".$dd_evento[0]."'"); 				
				if(mysql_fetch_assoc($qr_num) == 0){
					mysql_query("INSERT INTO `times` (`time`) VALUES ('".$dd_evento[0]."')")or die(mysql_error());
				}
				
				$qr_num2 = mysql_query("SELECT * FROM times WHERE time = '".$dd_evento[1]."'"); 				
				if(mysql_fetch_assoc($qr_num) == 0){
					mysql_query("INSERT INTO `times` (`time`) VALUES ('".$dd_evento[1]."')")or die(mysql_error());
				}
				
				
				
				
				echo $dd_evento[0]." x ".$dd_evento[0];
				echo "<br>";
				
				}
			#}else{
			#	return false;
			#}
		}
				echo "OK";		
		#$this->load->view('bet/base' , $dados);	
	}
	
	function percorrer_url(){
		$this->load->view('bet/percorrer_url');
	}
	
	function get_odd_evento($id_evento,$query="OVER_UNDER_15"){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#get_mercado_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15");
		$arr = array();
		$mkt = array();
		$n = 0;
		#echo "OKK";
				#getMarketings_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15")
		foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_evento,$query="OVER_UNDER_15") as $odd){  $n++;
				#print_r($odd);
				#echo "<br>";
				$mkt[$n] = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
				$arr[$n] = $this->bet_model->printMarketIdRunnersAndPrices($odd, $mkt[$n],$odd->marketId);
		}
		
		
	}
	
	function get_mkt_evento($query="OVER_UNDER_15"){
		$this->load->model('bet_model');
		#return false;
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#get_mercado_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15");
		$arr = array()
;		$mkt = array();
		$n = 0;
		#echo "OKK";
				#getMarketings_query($appKey, $sessionToken,$id_evento,$query="OVER_UNDER_15")
		foreach($this->bet_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,$query) as $odd){  $n++;
				print_r($odd);
				echo "<h2>Get selecions</h2>";
				foreach($odd->runners as $dd_sels){
					$qr_verifica_sel_existe = $this->padrao_model->get_by_matriz('id_selection',$dd_sels->selectionId,'selections');
					if($qr_verifica_sel_existe->num_rows() == 0){
						$dd_insert_sel = array(
							'id_selection' => $dd_sels->selectionId,
							'name' => $dd_sels->runnerName
						);
						$this->db->insert('selections' , $dd_insert_sel);
						print_r($dd_sels);
						echo "<b>Id _selection:</b> ".$dd_sels->selectionId;
						echo "<b>Name _selection:</b> ".$dd_sels->runnerName;
						echo "</b>*****<br>";
					}
				}
				echo "<hr /><br><br>";
				#return false;
				$correspondido = (int) number_format($odd->totalMatched, 2, ',', '.');
				$correspondido_float =  number_format($odd->totalMatched, 2, ',', '.');

				#$disponivel = (int) number_format($odd->totalAvailable, 2, ',', '.');
				#$disponivel_float =  number_format($odd->totalAvailable, 2, ',', '.');

				$limite = number_format(1000, 2, ',', '.');
				$match_len = strlen($correspondido_float);
				#$correspondido = $odd->totalMatched;
				
				#if($match_len > 8){
				#if($odd->totalMatched > 1000 OR $query == "OVER_UNDER_85" OR $query == "OVER_UNDER_05" OR $query == "MATCH_ODDS"  OR $query == "CORRECT_SCORE"  ){
				if($odd->totalMatched >= 100){ 
				#if($odd->totalMatched > 1000 ){
					print_r($odd);

					echo "<hr /><br>parte 1<br>";

					$this->db->where('id_mkt',$odd->marketId);
					$qr_ver = $this->db->get('mercados');
					if($qr_ver->num_rows() == 0){
						$dd_mkt = array(
							'id_mkt' => $odd->marketId,
							'total_matched	' => $correspondido,
							#'total_disponivel' => $disponivel,
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



/*

					stdClass Object ( 
						[marketId] => 1.160647649 
						[isMarketDataDelayed] => 1 
						[status] => SUSPENDED 
						[betDelay] => 0 
						[bspReconciled] => 
						[complete] => 1 
						[inplay] => 
						[numberOfWinners] => 1 
						[numberOfRunners] => 2 
						[numberOfActiveRunners] => 2 
						[lastMatchTime] => 2019-07-22T23:14:13.220Z 
						[totalMatched] => 166.36 
						[totalAvailable] => 417.45 
						[crossMatching] => 1 
						[runnersVoidable] => 
						[version] => 2865151461 
						[runners] => Array ( 
							[0] => stdClass Object ( 
								[selectionId] => 1221385 
								[handicap] => 0 
								[status] => ACTIVE 
								[lastPriceTraded] => 9.4 
								[totalMatched] => 0 
								[ex] => stdClass Object ( 
									[availableToBack] => Array ( 
										[0] => stdClass Object ( 
											[price] => 1.02 
											[size] => 136.03 
										) 
										[1] => stdClass Object ( 
											[price] => 1.01 
											[size] => 138.25 
										) 
									) [availableToLay] => Array ( ) 
									[tradedVolume] => Array ( ) 
								) 
							) 
							[1] => stdClass Object ( 
								[selectionId] => 1221386 
								[handicap] => 0 
								[status] => ACTIVE 
								[lastPriceTraded] => 1.12 
								[totalMatched] => 0 
								[ex] => stdClass Object ( 
									[availableToBack] => Array ( 
										[0] => stdClass Object ( 
											[price] => 1.11 
											[size] => 18 ) 
										[1] => stdClass Object ( 
											[price] => 1.01 
											[size] => 2.23 ) 
									) 
									[availableToLay] => Array ( 
										[0] => stdClass Object ( 
											[price] => 1.28 
											[size] => 16.31 
										) [1] => stdClass Object ( 
											[price] => 1.36 
											[size] => 31.46 
										) [2] => stdClass Object ( 
											[price] => 1.5 
											[size] => 14.75 
										) 
									) [tradedVolume] => Array ( ) 
								) 
							) 
						) 
					) stdClass Object ( 
						[marketId] => 1.160639169 
						[marketName] => Over/Under 1.5 Goals 
						[totalMatched] => 166.130175 
						[runners] => Array ( 
							[0] => stdClass Object ( 
								[selectionId] => 1221385 
								[runnerName] => Under 1.5 Goals 
								[handicap] => 0 [sortPriority] => 1 
							) [1] => stdClass Object ( 
								[selectionId] => 1221386 
								[runnerName] => Over 1.5 Goals 
								[handicap] => 0 
								[sortPriority] => 2 ) 
						) 
					) 



*/


					echo $mkt[$n]->status."<br>";
					echo "Wins: ".$mkt[$n]->numberOfWinners."<br>";
					echo "Complete: ".$mkt[$n]->complete."<br>";
					echo "Delay ".$mkt[$n]->betDelay."<br>";
					echo "Live".$mkt[$n]->inplay."<br>";
					#print_r($mkt[$n]->runners);
					if($qr_ver->num_rows() == 0){
						echo "<ul>";
							foreach($mkt[$n]->runners as $dd_sel){

								$dd_mkt_bk = array(
									'id_mkt' => $odd->marketId,
									'nm_mkt' => $odd->marketName,
									'selection_id' => $dd_sel->selectionId,
									'odd' => $dd_sel->lastPriceTraded,
									'total_matched' => $mkt[$n]->totalMatched,
									'tamanho' => $mkt[$n]->totalAvailable,
								);
								#$this->db->insert('odds_mkt_bk',$dd_mkt_bk);
								$tipo = "N definido";
								if($dd_sel->lastPriceTraded < 1.3 ){
									$tipo = "Super Favorito";
								}
								if($dd_sel->lastPriceTraded > 1.3 && $dd_sel->lastPriceTraded < 1.75  ){
									$tipo = "Favorito";
								}
								if($dd_sel->lastPriceTraded > 1.75 && $dd_sel->lastPriceTraded < 3  ){
									$tipo = "Equilibrado";
								}
								if($dd_sel->lastPriceTraded > 3 ){
									$tipo = "Zebra";
								}
								echo "<h2>Tipo: ".$tipo."  odd: ".$dd_sel->lastPriceTraded."</h2>";

								$dd_types = array(
									'id_mkt' => $odd->marketId,
									'id_selection' => $dd_sel->selectionId
									//'tipo' => $tipo
								);

								$this->db->where($dd_types);
								$qr_verifica_type = $this->db->get('selections_types');

								if($qr_verifica_type->num_rows() == 0){
									$dd_types['tipo'] = $tipo;
									$dd_types['odd'] = $dd_sel->lastPriceTraded;
									$this->db->insert('selections_types' , $dd_types);
								}

								#echo "<li>".$mkt[$n]->runners->runnerName."</li>";

								#echo "<li>".$mkt[$n]->runners[$n]->runnerName." +++++ </li>";
								echo "<li>".print_r($mkt[$n])." ********** </li>";
							}
						echo "</ul>";
					} // x if num_rows
					#echo $mkt[$n]->version."<br>";
					
					print_r($mkt[$n]);
					#$arr[$n] = $this->bet_model->printMarketIdRunnersAndPrices($odd, $mkt[$n],$odd->marketId);
				} // x if de contagem de casas decimais
		}
		
		
	}
	// get_odds
	function get_odds($mercado=1){
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
		

		
		$dados['mercado'] = $mercado;
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo "OK";
		$where = array('name' => $mkt);
		$this->db->where($where);
		$this->db->order_by('fila','asc');
		$this->db->limit(1);
		$qr = $this->db->get('mercados');
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

			$dados['id_jogo'] = $this->get_id_evento_bot($dd_mkt->id_mkt);
			#$dados['id_jogo'] = 0;
			
			
			
			$dados['id_mkt'] = $dd_mkt->id_mkt;
			echo $dd_mkt->id_mkt.' - '.$dados['id_jogo'];
			return false;
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			$APP_KEY = 'y0clajxo6wMU4bn0';
			foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 

				//print_r($odd);
				########## 	MOSTRA AS ODDS
				#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
				$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
				print_r($odd);
				echo "<br>";
				echo "<br>";
				echo "<br>";
				print_r($marketBook);

			}
			#$this->load->view('bot/get_odds' , $dados);
			#$this->load->view('bot/get_odds_mkt' , $dados);
			
			

		} // x qr result
	}

	function get_odds_mkt($mercado=1){

		if($mercado == 1){
			$mkt = "Over/Under 1.5 Goals";
		}
		
		if($mercado == 0){
			$mkt = "Match Odds";
		}
		
		if($mercado == 101){
			$mkt = "Draw no Bet";
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
		if($mercado == "05"){
			$mkt = "Over/Under 0.5 Goals";
		}

		#echo $mkt;
		#return false;
		
		$dados['mercado'] = $mercado;
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo "OK";
		$where = array('name' => $mkt, 'status' => 0);
		$this->db->where($where);
		$this->db->order_by('dt','asc');
		$this->db->limit(1);
		$qr = $this->db->get('mercados');

		#echo "OKK ".$qr->num_rows();
		#return false;
		foreach($qr->result() as $dd_mkt){

			// fila anda
			// fila 
			if($dd_mkt->fila >= 3){
				$fila = 0;
			}else{
				$fila =  $dd_mkt->fila+1;	
			}
			$new_vez = array ('fila' =>$fila);
			$this->db->where('id',$dd_mkt->id);
			$this->db->update('mercados',$new_vez);
			
			#echo $dd_mkt->id_mkt." (".$dd_mkt->fila.")";
			#echo "<br><br>";
			
			#$dd_evento = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$dd_mkt->id_mkt);
			#print_r($dd_evento); 
			#return false;

			$dados['id_jogo'] = $this->get_id_evento($dd_mkt->id_mkt);
			#$dados['id_jogo'] = 0;

			#print_r($dd_mkt);
			#return false;
			
			
			
			$dados['id_mkt'] = $dd_mkt->id_mkt;
			echo "OPA";
			
			$this->load->view('bet/odds_boxs' , $dados);
			#$this->load->view('bot/get_odds_mkt' , $dados);
			
			

		} // x qr result
	} // x fn

	####### HORSES ########
	// mercados_horses
	function get_odds_mkt_horses($mercado=1){
		/*
		if($mercado == 1){
			$mkt = "Over/Under 1.5 Goals";
		}
		
		if($mercado == 0){
			$mkt = "Match Odds";
		}
		
		if($mercado == 101){
			$mkt = "Draw no Bet";
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
		if($mercado == "05"){
			$mkt = "Over/Under 0.5 Goals";
		}
		*/

		#echo $mkt;
		#return false;
		
		$dados['mercado'] = $mercado;
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo "OK";
		#$where = array('name' => $mkt, 'status' => 0);
		$where = array('status' => 0);
		$this->db->where($where);
		$this->db->order_by('dt','asc');
		$this->db->limit(1);
		$qr = $this->db->get('mercados_horses');
		foreach($qr->result() as $dd_mkt){
			
			// fila anda
			// fila 
			if($dd_mkt->fila >= 3){
				$fila = 0;
			}else{
				$fila =  $dd_mkt->fila+1;	
			}
			$new_vez = array ('fila' =>$fila);
			$this->db->where('id',$dd_mkt->id);
			$this->db->update('mercados_horses',$new_vez);
			
			#echo $dd_mkt->id_mkt." (".$dd_mkt->fila.")";
			#echo "<br><br>";
			
			#$dd_evento = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$dd_mkt->id_mkt);
			#print_r($dd_evento); 
			#return false;
			$dados['id_jogo'] = $this->get_id_evento($dd_mkt->id_mkt);
			#$dados['id_jogo'] = 0;
			
			
			
			$dados['id_mkt'] = $dd_mkt->id_mkt;
			
			$this->load->view('bet/odds_boxs_horses' , $dados);
			#$this->load->view('bot/get_odds_mkt' , $dados);
			
			print_r($dd_mkt);
			

		} // x qr result
	} // x fn
	
	function get_odd_by_mkt($mercado=1){
		$dados['mercado'] = $mercado;
		$this->load->view('bot/get_odd_by_mkt' , $dados);
	}

	function get_odd_a2($mercado=1){
		$dados['mercado'] = $mercado;
		$this->load->view('bot/get_odd_a2' , $dados);
	}

	function get_odds_mkt_a2($mercado=1,$tipo="a2"){
		$this->load->model('bet_model');
		if($mercado == 1){
			$mkt = "Over/Under 1.5 Goals";
		}
		
		if($mercado == 0){
			$mkt = "Match Odds";
		}
		
		if($mercado == 101){
			$mkt = "Draw no Bet";
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
		if($mercado == 55){
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
		if($mercado == "05"){
			$mkt = "Over/Under 0.5 Goals";
		}
		if($mercado === "005"){
			$mkt = "First Half Goals 0.5";
		}
		if($mercado === "015"){
			$mkt = "First Half Goals 1.5";
		}

		if($mercado === "025"){
			$mkt = "First Half Goals 2.5";
		}
		
		if($mercado == 11){
			$mkt = "Both teams to Score?";
		}
		
		$dados['id_user'] = $this->session->userdata('id');

		#echo $mkt;
		#return false;
		
		$dados['mercado'] = $mercado;
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo "OK";
		$where = array('name' => $mkt, 'status' => 0);
		$this->db->where($where);
		$this->db->order_by('dt','asc');
		$this->db->limit(1);
		$qr = $this->db->get('mercados');
		echo $qr->num_rows();
		foreach($qr->result() as $dd_mkt){
			
						// fila anda
			// fila 
			if($dd_mkt->fila >= 3){
				$fila = 0;
			}else{
				$fila =  $dd_mkt->fila+1;	
			}
			$new_vez = array ('fila' =>$fila);
			$this->db->where('id',$dd_mkt->id);
			$this->db->update('mercados',$new_vez);
			
			#echo $dd_mkt->id_mkt." (".$dd_mkt->fila.")";
			#echo "<br><br>";
			
			#$dd_evento = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$dd_mkt->id_mkt);
			#print_r($dd_evento); 
			#return false;
			$dados['id_jogo'] = $this->get_id_evento($dd_mkt->id_mkt);
			#echo $dados['id_jogo'];
			#return false;
			#$dados['id_jogo'] = 0;
			
			
			
			$dados['id_mkt'] = $dd_mkt->id_mkt;
			if($tipo == 'a2'){
				$this->load->view('bet/odds_boxs_a2' , $dados);
			}
			if($tipo == 'hot'){
				$this->load->view('bet/odds_boxs_hots' , $dados);
			}
			#$this->load->view('bet/odds_boxs_a2' , $dados);
			#$this->load->view('bot/get_odds_mkt' , $dados);
			
			

		} // x qr result
	} // x fn
	
	// function set resultado
	function set_hot_resultado($id,$status){
		$dd = array('resultado' => $status);
		$this->db->where('id',$id);
		$this->db->update('odds_hot' , $dd);
		echo "OK";
	}
	// set status
	function set_hot($id,$status){
		$dd = array('status' => $status);
		$this->db->where('id',$id);
		$this->db->update('odds_hot' , $dd);
		echo "OK";
	}
	
	
	function get_id_evento($id_mkt=""){
		$this->load->model('bet_model');
		#echo "asd";
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$APP_KEY =  "";
		#$SESSION_TOKEN = "";
		#$APP_KEY = '6A1cQNtoRmi0GDOS'; //ccccccccc     meu id vendor
		#$APP_KEY = 'qD8D8WZ300PJGjbN'; // LIVE
		#$SESSION_TOKEN = 'wLLSvQJwr516By3gemg4OEtyTPE6L1EJSUvFScyNDmE='; // igormarlus
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$APP_KEY = 'sl4K5RkqJvpsKvPc';
		$SESSION_TOKEN = $token_betfair;
		if($id_mkt == ""){
			$id_mkt = "1.132317942";
		}
		#echo $id_mkt;
		$dd = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$id_mkt);
		if (empty($dd)) {
			#echo "NULLLLL";
			include("includes/mysqli_con.php");
			mysqli_query($con,"UPDATE `mercados` SET `status` = '1' WHERE `mercados`.`id_mkt` = '$id_mkt'")or die(mysqli_error($con));
				echo "FECHADO";

		}else{
			//print_r($dd);
			#return false;
			#$id_evento  = $dd[0]->event->id;
			$id_evento  = $dd[0]->event->id;
			return $id_evento;
		}
		//echo "dsasaasassa";
	}
	
	function get_id_evento_bot($id_mkt=""){
		$qr_token = $this->db->query("SELECT * FROM token");
		$token_betfair = $qr_token->row()->token;
		#echo "asd";
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$APP_KEY =  "";
		#$SESSION_TOKEN = "";
		#$APP_KEY = 'y0clajxo6wMU4bn0'; //cyane     meu id vendor
		#$APP_KEY = 'qD8D8WZ300PJGjbN'; // LIVE
		$APP_KEY = 'sl4K5RkqJvpsKvPc'; //AUGUSTO     meu id vendor
		#$SESSION_TOKEN = 'WbGq/+LhHwMTjKDQiVSgy7hqC7skcDlBYfxUVIOcfck='; // igormarlus
		$SESSION_TOKEN = $token_betfair; // igormarlus
		#require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($id_mkt == ""){
			$id_mkt = "1.132317942";
		}
		#echo $id_mkt;
		$dd = $this->bet_model->get_id_evento_bot($APP_KEY, $SESSION_TOKEN,$id_mkt);
		#print_r($dd);
		#$id_evento  = $dd[0]->event->id;
		//print_r($dd[0]);
		$id_evento  = $dd[0]->event->id;
		return $id_evento;
		//echo "dsasaasassa";
	}


	function get_horses() {
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
			$t=0;  
			echo "<h1>".$dd->competition->name."</h1>";
			foreach ($this->bet_model->getHorses($APP_KEY, $SESSION_TOKEN,7) as $jogo) { $t++;
			
			/*
			$qr_num = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$jogo->event->id."'"); 				
			if(mysql_fetch_assoc($qr_num) == 0){
				mysql_query("INSERT INTO `partidas` (`id_evento`,`evento`,`id_competition`,`inicio`) VALUES ('".$jogo->event->id."','".$jogo->event->name."' , '".$jogo->event->id."' , '".$jogo->event->openDate."')")or die(mysql_error());
			}
			
			*/
			echo "<a target='_blank' href='".base_url()."bet/jogo/".$jogo->event->id."'>".$jogo->event->openDate.': '.$jogo->event->name."</a>";
			echo "<br>";
			
			}
			echo "OK";		
		} // x fn
		
		// fn para testar api
		function get_competitions(){
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			$qr = $this->bet_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
			#print_r($qr);
			#$this->db->query("TRUNCATE TABLE betfair_competitions");
			foreach($qr as $dd){
				//print_r($dd);
				$this->db->where('id_competition',$dd->competition->id);
				$qr_ver = $this->db->get('betfair_competitions');
				echo "<h3>".$dd->competition->name." (".$dd->competition->id.") ".$qr_ver->num_rows()."</h3>";
				if($qr_ver->num_rows() == 0 ){
					$dd_insert = array('id_competition' => $dd->competition->id , 'nome_pt' => $dd->competition->name);
					$this->db->insert('betfair_competitions' , $dd_insert);
				}else{
					$dd_up = array('nome_pt' => $dd->competition->name);
					$this->db->where('id_competition',$dd->competition->id);
					$this->db->update('betfair_competitions' , $dd_up);
				}
				
				echo "<br />";	
			}
			echo "OK";
		}
		
				
		#$this->load->view('bet/base' , $dados);	
	

	############### get resultados
	function get_resultados($query="CORRECT_SCORE"){
			$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
/*
		$qr_cc = $this->db->query("SELECT DISTINCT o.id_partida,  p.fim, p.inicio, o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.tipo = 'back'  AND m.name = 'Correct Score' AND p.inicio < NOW() AND p.fim = 0 ORDER BY p.id_evento desc  LIMIT 20 ");
		*/
		#echo "opa";
		#return false;

		$qr_cc = $this->db->query("SELECT DISTINCT o.id_partida, p.evento, p.fim,  o.id_mkt , o.tipo, o.id_partida , m.name , p.inicio
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.tipo = 'back'  AND m.name = 'Correct Score' AND p.fim = 0 ORDER BY p.id_evento desc  LIMIT 20 ");

		echo $qr_cc->num_rows();

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
	
	// seta resultado do bot
	function set_status_hot($id,$val,$red=0){
		$dd = array('status' => $val);
		$this->db->where('id',$id);
		$this->db->update('odds_hot' , $dd);
		if($red == 1){
			redirect('futebol/hots/2');
		}
	}
	
	
}
