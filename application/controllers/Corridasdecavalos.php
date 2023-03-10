<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Corridasdecavalos extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->padrao_model->indexador();
    }

	
	function index() {
		//redirect("");
		#echo "ss";
		#return false;
		/*
		$dados['title'] = '';
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			//$this->load->view('site/hots_home' , $dados);	
			#$this->load->view('site/bts_home' , $dados);	
			
		}else{ 
			#$this->load->view('site/index' , $dados);	
		}
		*/
		
		
		$this->load->model('betfront_model');
		//$this->load->model('bet_model');

		if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;

		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		#$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 AND inicio > NOW() ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		#$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 AND inicio > NOW()  LIMIT 10"); // brasileiro seiria A
		
		#$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A

		#$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}
		

		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$dados['proximos'] = $this->betfront_model->getSoccers($APP_KEY, $SESSION_TOKEN) ;
		$hoje = date("Y-d-m");
		$hora = date("h:i:s");
		
		#$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair BETWEEN '$hoje $hora' AND '$hoje 23:59:00' ORDER BY data_betfair asc LIMIT 100 ");
		#$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair > NOW()  ORDER BY data_betfair asc LIMIT 100 ");

		#echo $dados['proximos']->num_rows();
		#return false;
		


		#$this->load->view('front/home-list' , $dados);	
		#$this->load->view('front/new/eventos' , $dados);
		$this->load->view("horses/eventos" , $dados);
		

	}

	

	

	function proximos() {
		#echo "ss";
		#return false;
		/*
		$dados['title'] = '';
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			//$this->load->view('site/hots_home' , $dados);	
			#$this->load->view('site/bts_home' , $dados);	
			
		}else{
			#$this->load->view('site/index' , $dados);	
		}
		*/
		
		#$this->load->model('bet_model');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		#$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 AND inicio > NOW() ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		#$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 AND inicio > NOW()  LIMIT 10"); // brasileiro seiria A
		
		#$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A

		#$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}
		

		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$dados['proximos'] = $this->betfront_model->getSoccers($APP_KEY, $SESSION_TOKEN) ;
		$hoje = date("Y-d-m");
		$hora = date("h:i:s");
		
		#$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair BETWEEN '$hoje $hora' AND '$hoje 23:59:00' ORDER BY data_betfair asc LIMIT 100 ");
		$dados['proximos'] = $this->db->query("SELECT * FROM partidas WHERE data_betfair > NOW()  ORDER BY data_betfair asc LIMIT 100 ");

		#echo $dados['proximos']->num_rows();
		#return false;

		#$this->load->view('front/home-list' , $dados);	
		#$this->load->view('front/new/eventos-proximos' , $dados);
		redirect("futebol");

	}
	
	
	function team($team_str="") {
		$this->load->model('bet_model');
		#$this->load->helper('language');

		#$this->lang->load('front','english');
		$dados['q'] = str_replace("-"," ",$team_str);
		#$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
		$dados['team_str'] = $team_str;
		if($team_str != '' ){

			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,$team_str);
		}
		
		$this->load->view('front/new/busca' , $dados);	

	}
	function time($team_str="") {
		#$this->load->helper('language');

		#$this->lang->load('front','portuguese-brazilian');
		
		$dados['q'] = str_replace("-"," ",$team_str);
		#$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
		$dados['team_str'] = $team_str;
		if($team_str != '' ){

			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,$team_str);
		}
		
		$this->load->view('front/new/busca' , $dados);	

	}



	function q($qr=""){
		#if(isset($_POST['q'])){
		$this->load->model('bet_model');
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,$qr);
		#}
		#echo "Opa";
		#return false;
		$dados['q'] = $qr;
		if($_POST){
			$dados['q'] = $this->input->post('q');
		}

		$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$this->load->view('front/busca' , $dados);	
		$this->load->view('front/new/busca' , $dados);	
	}
	
	
	function corrida($evento='',$id_mkt,$id_evento=0) {
		if(!$this->session->userdata('id')){
			#redirect('home/login');
		}
		$this->load->model('betfront_model');
		 if($this->session->userdata('token')){
		 	$this->load->model('bet_model');
		 }
		#echo "a";
		#return false;
		#if($id_evento == 0){
		#	redirect('futebol');
		#}
		 /*
		$qr_dd = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
		if($qr_dd->num_rows() == 0){
			$qr_dd_bk = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas_bk');
			if($qr_dd_bk->num_rows() == 0){
				redirect('futebol');
			}else{
				$dados['dd'] = $qr_dd_bk->row();
			}
			
		}else{
			$dados['dd'] = $qr_dd->row();
		}
		$dados['id_evento'] = $id_evento;
		*/
		
		#$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);
		#print_r($dados['mercados']);
		#if (empty($dados['mercados'])) {
		    //echo 'redirect';
		 #   redirect('futebol');
		#}
		//return false;

		#echo $qr_dd->num_rows()."<br />";
		#echo count($dados['mercados'])." <-";

		// INSERT REGISTRO ####################
		#$dados['mercados_mais'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'1');
		

		#$matchodds = $this->betfront_model->getMarketings_matchodds($APP_KEY, $SESSION_TOKEN,$id_evento);
		#print_r($dados['mercados_mais']);
		#echo "<br>";
		#echo $dados['mercados_mais'][0]->marketId;
		#$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$dados['mercados_mais'][0]->marketId);
		#foreach($mkts as $odd){ 
			#$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			#print_r($marketBook);
			#$this->mostrar($odd, $marketBook,$dados['mercados_mais'][0]->marketId,$id_evento);
		#}
		#return false;
		########################## FIM INSERT
		

		
		
		$dados['titulo'] = "Trader Horse Race";
		$dados['title'] = "Trader Horse Race";
		$dados['id_mkt'] = $id_mkt;
		//$this->load->view('front/new/evento' , $dados);	
		#$this->load->view('2019/jogo' , $dados);	
		$this->load->view("2020/corrida" , $dados);

	} // X FN


	

	function mostrar($odd, $marketBook,$id_mkt,$id_jogo)
					{
						$dd_odds = array();
						$f = 0;
						$ff = 0;
						#function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
						#{
							foreach ($marketBook->runners as $runner) {
									$selection_name = $runner->runnerName;
									if ($runner->selectionId == $selectionId) break;
									$selectionId = $runner->selectionId;
									
									if($f == 1){
										$atual = 1;
									}else{
										$atual = 0;
									}

									echo "<h1>BACK ".$selection_name." ---- ".$selection_name."</h1>";	
									echo "<p>(".$runner->selectionId.")</p>";	
									#print_r($runner);
									foreach ($runner->ex->availableToBack as $availableToBack){$f++;
										#print_r($availableToBack);
										$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	
										echo "################";
										echo "<br>";
										echo mysql_num_rows($qr_num);
										echo "<br>";
										if(mysql_fetch_assoc($qr_num) == 0){
											mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_name`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selection_name."' , '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP)");
										}else{
											mysql_query("UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size."  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" );
										}

										
										if($f == 1){
											// define odd atual
											$qr_up_atual = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual = mysql_fetch_assoc($qr_up_atual);
												mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual['id']." ");
										
												//  ################ HOTS
												$soma_back_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_back = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'lay' order by id desc LIMIT 5  ");
												$soma_total_sel_back = mysql_fetch_assoc($soma_back_sel);
												$soma_total_back = mysql_fetch_assoc($soma_back);
												if($soma_total_sel_back['soma'] > 0){
													$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
												}else{
													$pecentual_back = 0;
												}
												#echo number_format($pecentual_back, 2, ',', '.').'%';
												if($pecentual_back > 85){
														
													
													if($availableToBack->price > 1.3 && $pecentual_back < 100){
													
														$qr_hot = mysql_query("SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
														if(mysql_num_rows($qr_hot) == 0 ){
															mysql_query("INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
																					 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'lay', '".$selectionId."', '".$selection_name."', '".$availableToBack->price."' , ".$pecentual_back.")")or die(mysql_error());
														}else{
															mysql_query("UPDATE `odds_hot` SET `odd` = '".$availableToBack->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_back." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND `side` =  'lay' ");
														}
													}
													
												}

										} // x if f == 1
										


										echo " <br> @".$availableToBack->price." | ".$availableToBack->size;;
									}
									echo "<h1>Lay - ".$selection_name."</h1>";
									echo "<p>(".$runner->selectionId.")</p>";	
									$L = 0;
									foreach ($runner->ex->availableToLay as $availableToLay){$L++;
										
										if($L == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}

										$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysql_error()); 
										
										if(mysql_num_rows($qr_num) == 0){
											mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_name`,  `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selection_name."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP)");
										}else{
											mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  );
										}

										if($L == 1){

												#mysql_query("UPDATE `odds_mkt` SET  `agora` = 0  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												
												$qr_up_atual_lay = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual_lay = mysql_fetch_assoc($qr_up_atual_lay);
												mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual_lay['id']." ");

												$soma_lay_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_lay = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by id desc LIMIT 5  ");
												$soma_total_sel_lay = mysql_fetch_assoc($soma_lay_sel);
												$soma_total_lay = mysql_fetch_assoc($soma_lay);
												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}
													## HOTS ############################		
												if($pecentual_lay > 85){
														########## LAY - IONSERI NO BANCO
													if($availableToLay->price > 1.3 && $pecentual_lay < 100){
															$qr_hot = mysql_query("SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
															if(mysql_num_rows($qr_hot) == 0 ){
																mysql_query("INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
												 						VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', '".$selection_name."', '".$availableToLay->price."' , ".$pecentual_lay.")")or die(mysql_error());
															}else{
																mysql_query("UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'back' ");
															}

													}
												}

										}	

										echo "<br> @".$availableToLay->price." ".$availableToLay->size;;
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
	
	function fim(){
		echo "<h1>CORRIDA ENCERRADA</h1>";
	}

	function get_dados_run(){
		#echo "OK";
		#return false;
		//$this->db->query("TRUNCATE TABLE runs_dd_horses_dia");
		

		#$this->db->query("TRUNCATE TABLE runs_dd_horses_dia");
		// verifica se o id_mkt está em runs_horse
		$qr_id_mkt = $this->db->query("SELECT DISTINCT id_mkt FROM runs_dd_horses_dia");
		foreach ($qr_id_mkt->result() as $dd_dd) {
			# code...
			#echo print_r($dd_dd);
			$qr_runs = $this->db->query("SELECT * FROM runs_horses WHERE marketId = '".$dd_dd->id_mkt."' ");

			if($qr_runs->num_rows() == 0){
				$this->db->query("DELETE  FROM runs_dd_horses_dia WHERE id_mkt = '".$dd_dd->id_mkt."' ");
			}


			#echo $dd_dd->id_mkt."(".$qr_runs->num_rows().")";
			#echo "<br>";
			// deletear se n houver o id do mercado em runs_horses (num_rows == 0)
		}

		#return false;


		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$this->load->model('betfront_model');
		$qr_runs = $this->db->query("SELECT * FROM runs_horses WHERE metadados = '0' and 
					(countryCode = 'GB' OR 
					countryCode = 'IE' OR
					countryCode = 'US'
					
					) 
			ORDER BY inicio asc ");

		/*
		$qr_runs = $this->db->query("SELECT * FROM runs_horses WHERE metadados = '0' and 
					(countryCode = 'GB' OR 
					countryCode = 'IE' ) 
			ORDER BY inicio asc ");
		*/
		/*$qr_runs = $this->db->query("SELECT * FROM runs_horses WHERE marketid =  '1.189027344'
			ORDER BY inicio asc "); */
			
		#$qr_runs = $this->db->query("SELECT * FROM runs_horses WHERE  marketid = '1.185024046' ");
		
		if($qr_runs->num_rows() == 0){
			echo "<h1>Todos os dados registrados com sucesso</h1>";
		}
		if($qr_runs->num_rows() > 0){
			echo "<h1>***************************8</h1>";
			foreach($qr_runs->result() as $run){
				// EVENT 
				//
				$dds_run = $this->betfront_model->get_dd_id_mkt($APP_KEY,$SESSION_TOKEN,$run->marketId,"EVENT");
				echo "<span style='color>:green'>";
				print_r($dds_run);
				echo "</span>";
				foreach($dds_run as $dd_run){
					echo "<h1>Dados da Corrida ***:</h1>";
					print_r($dds_run[0]->event);

					################# ATUALIZA no DB #########
		            #$dd_hora = array('data_tratada' => $dds_run[0]->event->openDate);
					#$this->db->where('id',$run->marketId);
					#$this->db->update('runs_horses' , $dd_hora);
				
				echo "<p>".$dds_run[0]->event->openDate."</p>";
				echo "<p>".$dds_run[0]->marketName."</p>";
				echo "<p>".$dds_run[0]->event->name."</p>";
				echo "<p>".$dds_run[0]->event->countryCode."</p>";
				echo "<p>".$dds_run[0]->event->timezone."</p>";
				echo "<p>".$dds_run[0]->event->venue."</p>";
				

				}
				
				echo "<br>";
				$dds = $this->betfront_model->get_dd_id_mkt($APP_KEY,$SESSION_TOKEN,$run->marketId);

				foreach($dds as $dd){
					echo "<h1> ".$dd->marketName." ".$dd->marketId."</h1>";
					echo "<h1> ".count($dd->runners)."</h1>";
					echo "<br>";
					for($c=0; $c<count($dd->runners); $c++){
						print_r($dd->runners[$c]);
						foreach($dd->runners[$c] as $key => $val){
							if($key != 'metadata'){
								echo "<h4>".$key.": ".$val." </h4>";
								if($key == 'runnerName'){
									$nm_cavalo = $val;
								}
							}else{

								if(isset($val)){
									#echo "<span style='color:red'>".$val."</span>";
								}
								#}
								// gerar array do insert
								$dd_horse = array();
								$dd_horse['id_mkt'] = $dd->marketId;


								#if($key == 'runnerName'){
								$dd_horse['cavalo'] = $nm_cavalo;
								#}


								echo "<ul>";
									foreach($val as $key2 => $dd2){
										echo "<li><strong>".$key2."</strong>: <label style='color:darkgreen'> ".$dd2." </label></li>";
										$dd_horse[$key2] = $dd2;
										if($key2 == "JOCKEY_NAME" || $key2 == "TRAINER_NAME"){
											$str_key = $dd2;
											$nm_sem_acento = str_replace("'", "", $str_key);
											$nm_sem_acento = str_replace(".", "", $str_key);
											$dd_horse[$key2] = $nm_sem_acento;
										}
									}
									
									unset($dd_horse['FORECASTPRICE_NUMERATOR']);
									unset($dd_horse['FORECASTPRICE_DENOMINATOR']);

									$this->db->where($dd_horse);
									$qr_verifica = $this->db->get('runs_dd_horses');

									$this->db->where($dd_horse);
									$qr_verifica_dia = $this->db->get('runs_dd_horses_dia');

									echo "<h1 style='color:red'>".$qr_verifica->num_rows()." === </h1>";
									echo "<p style='color:green'>".$dd_horse['id_mkt']."</p>";
									if($qr_verifica->num_rows() == 0){
										$this->db->insert('runs_dd_horses' , $dd_horse);
										#$this->db->insert('runs_dd_horses_dia' , $dd_horse);
									}
									if($qr_verifica_dia->num_rows() == 0){
										#$this->db->insert('runs_dd_horses' , $dd_horse);
										$this->db->insert('runs_dd_horses_dia' , $dd_horse);
									}
								echo "</ul>";

							}
						}
						echo  "<br><hr>";
					}
				}

				echo  "<br><br>";

				echo $run->marketId;
				echo "<br>";
				#print_r($dds);
				// tira a corrida da fila
				$dd_metadados = array('metadados' => 1);
				$this->db->where('id',$run->id);
				$this->db->update('runs_horses' , $dd_metadados);
			}
		}
		#echo "OK";

		$n = 2;
		$status_checkin = array('status' => 1);
		$this->db->where('id',$n);
		$this->db->update('cron_checkin' , $status_checkin);
	}



	
	
	
}
