<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Futbol extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->padrao_model->indexador();
    }

function index() {
		
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
		
		$this->load->model('bet_model');
		
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
		$this->load->view('front/new/eventos' , $dados);

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
		
		$this->load->model('bet_model');
		
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
		$this->load->view('front/new/eventos-proximos' , $dados);

	}
	
	
	function team($team_str="") {
		#$this->load->helper('language');

		#$this->lang->load('front','english');
		$dados['q'] = str_replace("-"," ",$team_str);
		$this->load->model('bet_model');
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
		$this->load->model('bet_model');
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
		#$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		

		###################  OUTRAS COMPETIÇÕES
		/*
		$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 AND inicio > NOW() ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 AND inicio > NOW()  LIMIT 10"); // brasileiro seiria A
		
		$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		################### XXXXXXXXXXXXXXXXXXX

		$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		*/
		$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$this->load->view('front/busca' , $dados);	
		$this->load->view('front/new/busca' , $dados);	
	}
	
	function tabelas() {
		#echo "ss";
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
		
		$this->load->model('bet_model');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 LIMIT 10"); // brasileiro seiria A
		
		$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}
		
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		$this->load->view('front/tabelas' , $dados);	

	}
	
	function jogo($evento='',$id_evento=0) {
		echo "Site em manutenção";
		return false;
		$this->load->model('betfront_model');
		if($id_evento == 0){
			redirect('futbol');
		}
		$qr_dd = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
		if($qr_dd->num_rows() == 0){
			$qr_dd_bk = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas_bk');
			if($qr_dd_bk->num_rows() == 0){
				redirect('futebol');
			}else{
				$dados['dd'] = $qr_dd_bk->row();
				$dados['dd_evento'] = $qr_dd_bk->row();
			}
			
		}else{
			$dados['dd'] = $qr_dd->row();
			$dados['dd_evento'] = $qr_dd->row();
		}
		$dados['id_evento'] = $id_evento;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);

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
		

		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); 
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		
		$this->load->view('front/jogo' , $dados);	
		#$this->load->view('front/new/evento' , $dados);	

	} // X FN

	function prognostico($evento='',$id_evento=0) {
		if($id_evento == 0){
			redirect('futebol');
		}
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
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		if($this->session->userdata('id')) { $limit_mkt = 20; }else{ $limit_mkt = 5; }
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,$limit_mkt);


		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		$titulo = "Prognóstico ".str_replace(" v "," x ",$dados['dd']->evento)." - ";
		if($this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10)) == "Data invalida"){
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->inicio,0,10));
			$dados['start_data'] =substr($dados['dd']->inicio,0,10)."".substr($dados['dd']->inicio,10,10);  
		}else{
			$titulo .= $this->padrao_model->converte_data(substr($dados['dd']->data_betfair,0,10));
			$dados['start_data'] = substr($dados['dd']->data_betfair,0,10)."".substr($dados['dd']->data_betfair,10,10);  
		}
		if(strlen($dados['champ']->row()->nome) > 2){
			$titulo .= " - ".$dados['champ']->row()->nome;
		}
		$dados['titulo'] = $titulo;
		//$this->load->view('front/new/evento' , $dados);	
		$this->load->view('2019/prognostico' , $dados);	

	}

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
	
	function competition($nm_competiion,$id_competition){
		$this->load->model("betfront_model");
		if($id_competition == ""){
			redirect('/bets');
		}
		#echo "opa1";
		#return false;
		if( strpos($id_competition, "html") == true){
			#echo "É";
			redirect('/bets');
		}
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		/*
		$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 ORDER BY inicio asc LIMIT 10"); // brasileiro seiria A
		$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 LIMIT 10"); // brasileiro seiria A
		
		$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		*/
		$dados['competition'] = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions')->row();
		
		#$dados['jogos'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = ".$id_competition." AND inicio > NOW()  ORDER BY inicio asc "); // brasileiro seiria A
		$dados['jogos'] = $this->betfront_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$id_competition);

		$this->load->view('front/competition-by-api' , $dados);	
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$this->load->view('front/new/competitions' , $dados);	
		#$this->load->view('front/new/competitions-betfair' , $dados);	
		
		
		
	}
	function eventos(){
		$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A

		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');

		$this->load->view('front/new/eventos' , $dados);
	}

	function apostas($evento='',$id_evento=0) {
		$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		#echo "opa 1";
		#return false;
		if($id_evento == 0){
			redirect('');
		}
		$qr_dd = $this->padrao_model->get_by_matriz('id_evento',$id_evento,'partidas');
		if($qr_dd->num_rows() == 0){
			redirect('');
		}
		
		$dados['dd'] = $qr_dd->row();
		$dados['id_evento'] = $id_evento;
		
		$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');

		// INSERT REGISTRO ####################
		$dados['mercados_mais'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'1');
		#$matchodds = $this->betfront_model->getMarketings_matchodds($APP_KEY, $SESSION_TOKEN,$id_evento);
		#print_r($dados['mercados_mais']);
		#echo "<br>";
		#echo $dados['mercados_mais'][0]->marketId;
		$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$dados['mercados_mais'][0]->marketId);
		foreach($mkts as $odd){ 
			$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			#print_r($marketBook);
			#$this->mostrar($odd, $marketBook,$dados['mercados_mais'][0]->marketId,$id_evento);
		}
		#return false;
		########################## FIM INSERT
		

		$dados['mais'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$dados['dd']->id_competition."'  LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A
		
		#$this->load->view('front/jogo' , $dados);	
		$this->load->view('front/new/evento' , $dados);	
	}


	############## FILTRAR ODDS
	function filtro_odds($expect="") {
		
		$qr = $this->db->query("SELECT DISTINCT p.evento, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd < 1.5 AND o.odd > 1.2 AND o.tipo = 'back'  AND m.name = 'Match Odds' ");
		
		#$dados['champ'] = $this->padrao_model->get_by_matriz('id_competition',$dados['dd']->id_competition,'betfair_competitions');
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$dados['mercados'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5');

		// INSERT REGISTRO ####################
		#$dados['mercados_mais'] = $this->betfront_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'1');
		#$matchodds = $this->betfront_model->getMarketings_matchodds($APP_KEY, $SESSION_TOKEN,$id_evento);
		#print_r($dados['mercados_mais']);
		#echo "<br>";
		#echo $dados['mercados_mais'][0]->marketId;
		/*
		$mkts = $this->betfront_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$dados['mercados_mais'][0]->marketId);
		foreach($mkts as $odd){ 
			$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			#print_r($marketBook);
			#$this->mostrar($odd, $marketBook,$dados['mercados_mais'][0]->marketId,$id_evento);
		}
		*/
		#return false;
		########################## FIM INSERT
		$resultados = 0;

		if($expect == "over"){
			$qr = $this->db->query("SELECT DISTINCT p.evento, p.data_betfair, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd < 1.3 AND o.tipo = 'back'  AND m.name = 'Over/Under 0.5 Goals' AND o.selection_name LIKE '%over%' ");
		}

		if($expect == "under"){
			$qr = $this->db->query("SELECT DISTINCT p.evento, p.data_betfair, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd > 1 AND o.odd < 1.3 AND o.tipo = 'back'  AND m.name = 'Over/Under 0.5 Goals' AND o.selection_name LIKE '%under%' ");
		}



		if($_POST){
			$de = $this->input->post('de');
			$ate = $this->input->post('ate');
			$mercado = $this->input->post('mercado');
			
			$qr = $this->db->query("SELECT DISTINCT p.evento, p.data_betfair, p.id_evento, p.inicio ,o.id_mkt , o.dt_update, o.selection_name,o.tipo,o.odd,o.id_partida,o.atual , m.name 
FROM odds_mkt as o
INNER JOIN mercados as m ON o.id_mkt = m.id_mkt
INNER JOIN partidas as p ON o.id_partida = p.id_evento
WHERE o.odd < '".$ate."' AND o.odd > '".$de."' AND o.tipo = 'back'  AND m.name = '".$mercado."' ");

			#$resultados =  $qr->num_rows();
			#$dados['qr'] = $qr;
			#print_r($qr->result());
			#return false;

		} // X IF POST

		
		$resultados =  $qr->num_rows();
		#echo "opa 6";
		#return false;
		$dados['qr'] = $qr;

		$dados['expect'] = $expect;
		$dados['resultados'] = $resultados;


		#echo $resultados;
		#return false;
		$dados['mais'] = $this->db->query("SELECT * FROM partidas   LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		#$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 LIMIT 10"); // brasileiro seiria A


		
		#$this->load->view('front/jogo' , $dados);	
		$this->load->view('front/new/filtro_odds' , $dados);	

	} // X FN
	
	
}
