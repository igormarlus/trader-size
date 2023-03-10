<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bet extends CI_Controller {

	function index() {
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#$dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
		if($dados['dd']->nivel == '0'){ 
			#redirect('bet/hots');
		}
		
		// get campeonatos

		$meus = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes',50);
		$c = 0;
		$campeonatos = "";
		if($meus->num_rows() > 0){
			foreach($meus->result() as $dd_comp){ $c++;
				if($c == 1){
					$campeonatos =	$dd_comp->id_competicao;
				}else{
					$campeonatos .=	",".$dd_comp->id_competicao;
				}
			}
		}else{
			$dados['campeonatos'] = '228,4905,13,10932509';
		}
		

		$dados['campeonatos'] = $campeonatos;

		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$this->load->view('bet/base' , $dados);	
		#echo "OK";
	}
	
	function hots($live='',$min=0) {
		
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['live'] = $live;
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		// caso não espeja adimplente 
		if($dados['dd']->status == '0'){ 
			#redirect('bet');
		}
		
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		
		$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=100,$inicio=0);
		
		if($min > 0){ //query com mais de 100K correspondido
			#$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE "'',$ord='desc',$campo='id',$limit=100,$inicio=0);
		}
		
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$this->load->view('bet/hots' , $dados);	
		#echo "OK";
	}
	
	function hots_only(){
		#$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=100,$inicio=0);
		$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='dt_upgrade',$limit=100,$inicio=0);
		#$call = json_decode($dados['hots']);
		#return $call;
		$this->load->view('bet/hots_only' , $dados);	
	}
	
	
	#### CORRESPONDIDOS
	function bests($mercado='') { 
		$this->load->model('bet_model');
		#$this->upload->do_upload($field_name);$live = "";
		if(isset($_POST['query'])){
			$mercado = $_POST['query'];
		}
		if($mercado == ''){
			$mercado = "MATCH_ODDS";
		}
		$dados['mercado'] = $mercado;
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		#$this->upload->do_upload($field_name);$dados['live'] = $live;
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		// caso não espeja adimplente 
		if($dados['dd']->status == '0'){ 
			#redirect('bet');
		}
		
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		
		#$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=100,$inicio=0);
		
		
		
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$this->load->view('bet/bests' , $dados);	
		#echo "OK";
	}
	
	function busca() {
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		
		$id_user = $this->session->userdata('id');
		
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		// get campeonatos
		$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$this->load->view('bet/busca' , $dados);	
	}
	
	function horses() {
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		

		if($dados['dd']->nivel == '0'){ 
#			redirect('bet/hots');
		}
		
		// get corridas
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');		
		$this->load->view('bet/horses' , $dados);	
		#echo "OK";
	}
	
	function horse_mkt($id_mkt){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo $id_mkt;
		$qr = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$id_mkt);
		redirect('bet/jogo/'.$qr[0]->event->id.'/'.$id_mkt);
		#echo $qr[0]->event->id." -- ".$qr->event;
		#echo "<br>";
		#print_r($qr);
	}
	

	function revoke(){
		$this->load->model('conta_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo "asd";
		$this->conta_model->revoke($APP_KEY, $SESSION_TOKEN);
		#$this->bet_model->revoke($APP_KEY, $SESSION_TOKEN);

	}

	function ativar(){
		$this->load->model('conta_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo $id_mkt;
		$this->conta_model->ativar($APP_KEY, $SESSION_TOKEN);
		


		#redirect('bet/jogo/'.$qr[0]->event->id.'/'.$id_mkt);
		#echo $qr[0]->event->id." -- ".$qr->event;
		#echo "<br>";
		#print_r($qr);
	}

	function afiliados(){
		$this->load->model('conta_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo $id_mkt;
		$this->conta_model->afiliados($APP_KEY, $SESSION_TOKEN);
		


		#redirect('bet/jogo/'.$qr[0]->event->id.'/'.$id_mkt);
		#echo $qr[0]->event->id." -- ".$qr->event;
		#echo "<br>";
		#print_r($qr);
	}
	

	function get_by_id_mkt($id_mkt){
		$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#echo $id_mkt;

		$qr = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$id_mkt);
		#echo "opa";
		#echo $qr[0]->event->id." ".$id_mkt;
		redirect('bet/betjogo/'.$qr[0]->event->id.'/'.$id_mkt ,'refresh');
		#echo $qr[0]->event->id." -- ".$qr->event;
		#echo "<br>";
		#print_r($qr);
	}
	
	###### SETAR FAVORITO
	function set_fav(){
		$this->usuarios_model->set_fav();
	}
	
	
	function betfairapi(){
		#$this->load->view('betfairapi/jsonrpc');
		$this->load->view('betfairapi/index');
	}
	
	function baseapi(){
		#$this->load->view('betfairapi/jsonrpc');
		$this->load->view('betfairapi/base');
	}
	
	function jogo($id_jogo){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		foreach ($this->bet_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_jogo,'1') as $jogo) { 
				
		}
		redirect("bet/betjogo/".$id_jogo."/".$jogo->marketId);
	}
	
	function betjogo($id_jogo,$id_mkt='',$type=""){
		$this->load->model('bet_model');
		$this->load->model('usuarios_model');
		
		require_once('includes/betapi/jsonrpc-futbol.php');
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$dados['dd_config'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'user_configs')->row();
		$dados['id_jogo'] = $id_jogo;
		$dados['id_evento'] = $id_jogo;
		
		$dados['dd_evento']  = $this->padrao_model->get_by_matriz('id_evento',$id_jogo,'partidas')->row();
		if($id_mkt <> ""){
			$dados['id_mkt'] = $id_mkt;
		}
		$mkt = $this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,0,$id_mkt);
		$dados['nm_mkt_c'] = $mkt[0]->marketName;
		if($mkt[0]->marketName == 'Correct Score'){
			$type = 'basic';
		}
		#echo $mkt[0]->marketName;
		#print_r($mkt[0]);
		#return false;
		#echo $type;
		$dados['type'] = $type;
		#print_r($mkt);
		#return false;
		#$this->load->view('bet/jogo-js' , $dados);
		$this->load->view('bet/jogo' , $dados);
	}

	function betjogonew($id_jogo,$id_mkt='',$type="box"){

		require_once('includes/betapi/jsonrpc-futbol.php');
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$dados['dd_config'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'user_configs')->row();
		$dados['id_jogo'] = $id_jogo;
		$dados['id_evento'] = $id_jogo;
		
		$dados['dd_evento']  = $this->padrao_model->get_by_matriz('id_evento',$id_jogo,'partidas')->row();
		if($id_mkt <> ""){
			$dados['id_mkt'] = $id_mkt;
		}
		$mkt = $this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,0,$id_mkt);
		$dados['nm_mkt_c'] = $mkt[0]->marketName;
		if($mkt[0]->marketName == 'Correct Score'){
			$type = 'basic';
		}
		#echo $mkt[0]->marketName;
		#print_r($mkt[0]);
		#return false;
		#echo $type;
		$dados['type'] = $type;
		#print_r($mkt);
		#return false;
		#$this->load->view('bet/jogo-js' , $dados);
		$this->load->view('bet/jogo-din' , $dados);
	}

	function bot($id_jogo,$id_mkt='',$type="box"){
		require_once('includes/betapi/jsonrpc-futbol.php');
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$dados['id_jogo'] = $id_jogo;
		$dados['id_evento'] = $id_jogo;
		
		$dados['dd_evento']  = $this->padrao_model->get_by_matriz('id_evento',$id_jogo,'partidas')->row();
		if($id_mkt <> ""){
			$dados['id_mkt'] = $id_mkt;
		}
		$mkt = $this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,0,$id_mkt);
		$dados['nm_mkt_c'] = $mkt[0]->marketName;
		if($mkt[0]->marketName == 'Correct Score'){
			$type = 'basic';
		}
		$dados['evento'] = $this->bet_model->get_id_evento_bot($APP_KEY, $SESSION_TOKEN,$id_mkt)[0]->event;
		#echo $mkt[0]->marketName;
		#print_r($mkt[0]);
		#return false;
		#echo $type;
		$dados['type'] = $type;
		#print_r($mkt);
		#return false;
		#$this->load->view('bet/jogo-js' , $dados);
		$this->load->view('bet/horse/bot' , $dados);
	}
	
	
	function bethorse($id_jogo,$id_mkt='',$type="vertical"){
		require_once('includes/betapi/jsonrpc-futbol.php');
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$dados['dd_config'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'user_configs')->row();
		$dados['id_jogo'] = $id_jogo;
		$dados['id_evento'] = $id_jogo;
		
		$dados['dd_evento']  = $this->padrao_model->get_by_matriz('id_evento',$id_jogo,'partidas')->row();
		if($id_mkt <> ""){
			$dados['id_mkt'] = $id_mkt;
		}
		$mkt = $this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,0,$id_mkt);
		$dados['nm_mkt_c'] = $mkt[0]->marketName;
		if($mkt[0]->marketName == 'Correct Score'){
			$type = 'basic';
		}
		#echo $mkt[0]->marketName;
		#print_r($mkt[0]);
		#return false;
		#echo $type;
		$dados['type'] = $type;
		#print_r($mkt);
		#return false;
		#$this->load->view('bet/jogo-js' , $dados);
		$this->load->view('bet//horse/jogo-din' , $dados);
	}
	function get_odds($id_jogo, $id_mkt){
		#header('Access-Control-Allow-Origin: *');
		#header('Access-Control-Allow-Origin: '.base_url().'');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 
		
							//print_r($odd);
							########## 	MOSTRA AS ODDS
							$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
							$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);

		}
					
		
		
		$data = $this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
		echo $data;
	}
	
	function get_odds_sel($id_partida, $id_mkt=''){
		//echo "Opa";
		header("Access-Control-Allow-Origin: '".base_url()."'");
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$APP_KEY = 'qD8D8WZ300PJGjbN';


		foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 
		
							//print_r($odd);
							########## 	MOSTRA AS ODDS
							$marketBook = $this->bet_model->getMarketBook_by_mkt($APP_KEY, $SESSION_TOKEN,$id_mkt);
							//print_r($marketBook->runners);

							echo json_encode($marketBook);
							#$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);

		}
					
		//echo "Opa2";
		
		//$data = $this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
		//echo $data;




	}
	
	function get_odds_only($id_partida, $id_mkt='',$type=''){
		header("Access-Control-Allow-Origin: '".base_url()."'");
		#$this->load->helper('url');
		$this->load->model('bet_model');
		$this->load->library('user_agent');
		
		#echo $id_partida;
		#return false;
		
		$dados_g['id_jogo'] = $id_partida;
		$dados_g['id_partida'] = $id_partida;
		$dados_g['id_eve'] = $id_partida;
		#print_r($dados_g);
		#return false;
		if($id_mkt == ''){
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			$APP_KEY = 'qD8D8WZ300PJGjbN';
			foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_partida,$query="MATCH_ODDS") as $odd){ 
					#$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					#$this->bet_model->printMarketIdRunnersAndPrices_list($odd, $marketBook);
					$dados_g['id_mkt'] = $odd->marketId;
			}
		}else{
			#require_once('includes/betapi/jsonrpc-futbol.php'); 
			#$dados['APP_KEY'] = $APP_KEY;
			#$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
			$dados_g['id_mkt'] = $id_mkt;
		}
		#echo $id_jogo;
		#$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $id_mkt);
		#print_r($marketBook);
		if($type == ""){ // default
			if ($this->agent->is_mobile()){
					$this->load->view('bet/odds' , $dados_g);
			}else{
					$this->load->view('bet/odds_boxs' , $dados_g);
					#$this->load->view('bet/odds_boxs_light' , $dados_g);

					
			}
		}else{ // type selecionado
			if($type == 'basic'){
				#$this->load->view('bet/odds' , $dados_g);
				#$this->load->view('bet/odds_boxs_base' , $dados_g);
				$this->load->view('bet/odds_boxs' , $dados_g);
			}
			
			if($type == 'vertical'){
				$this->load->view('bet/odds_vertical_base' , $dados_g);
			}
			
			if($type == 'box'){
				$this->load->view('bet/odds_boxs_base' , $dados_g);
			}
			
			
		}
		
		#$this->load->view('bet/odds' , $dados);
		
	}
	
	// get apostas abertas
	function apostas_abertas(){
		$this->load->model('bet_model');
		#header('Access-Control-Allow-Origin: *');
		#header('Access-Control-Allow-Origin: '.base_url().'');
		$this->load->view('bet/apostas_abertas');
	}
	
	function get_odds_graph($id_jogo, $id_mkt){
		#header('Access-Control-Allow-Origin: '.base_url().'');
		$dados['id_jogo'] = $id_jogo;
		$dados['id_mkt'] = $id_mkt;
		#$this->load->view('bet/odds_graph' , $dados);
		
		// configuração do usuario
		$dd_user_config = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'user_configs')->row();
		$dados['dd_user_config'] = $dd_user_config;
		#echo $dd_user_config->graph_odds;
		if($dd_user_config->graph_odds == '0'){
			$this->load->view('bet/odds_graph_lay_out' , $dados);
		}else{
			#$this->load->view('bet/odds_graph_odds' , $dados);
			$this->load->view('bet/odds_graph' , $dados);
			#$this->load->view('bet/odds_graph_back_lay' , $dados);
			
		}
		
	}
	
	function place_bet(){
		#header('Access-Control-Allow-Origin: *');
		#header('Access-Control-Allow-Origin: '.base_url().'');
		$this->load->model('bet_model');
		$id_mkt = $this->input->post('id_mkt');
		$id_selection = $this->input->post('id_selection');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$size = $this->input->post('size');
		#echo $size;
		$set = $this->bet_model->placeBet($APP_KEY, $SESSION_TOKEN, $id_mkt, $id_selection);
		#echo $set;
		$this->bet_model->printBetResult($set);
		#print_r($_POST);
	}
	

	function cancel_bet(){
		$this->load->model('bet_model');
		#header('Access-Control-Allow-Origin: *');
		#header('Access-Control-Allow-Origin: '.base_url().'');
		$betId = $this->input->post('betId');
		#$id_selection = $this->input->post('id_selection');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$size = $this->input->post('size');
		#echo $size;
		$set = $this->bet_model->cancelBet($APP_KEY, $SESSION_TOKEN, $betId);
		#echo $set;
		#$this->bet_model->printBetResult($set);
		#print_r($_POST);
	}

	function cashout(){
		#header('Access-Control-Allow-Origin: *');
		#header('Access-Control-Allow-Origin: '.base_url().'');
		$this->load->model('cashout_model');
		#$this->bet_model->teste();
		#return false;
		$id_mkt = $this->input->post('id_mkt');
		$id_selection = $this->input->post('id_selection');
		$tipo = $this->input->post('tipo');
		$id_jogo = $this->padrao_model->get_by_matriz('id_mkt',$id_mkt,'odds_mkt',1)->row()->id_partida;
		
		
		#$valor = floatval($this->input->post('valor'));
		#$size_post = $this->input->post('size');
		#$size = str_replace(",",".",$size_post);
		#$size_db = floatval($size_post);
		
		#echo "id_jogo = ".$id_jogo;
		#return false;
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$APP_KEY = 'qD8D8WZ300PJGjbN'; // sem delay
		$cc=0;
		$odds = $this->bet_model->getOdds($APP_KEY, $SESSION_TOKEN, $id_mkt,$id_selection);
		#echo $odds;
		#print_r($odds);
		
		// pega odd atual
		foreach($odds as $odd){
			$id_selection_dd = $odd->selectionId;
			if($id_selection == $odd->selectionId){
				if($tipo == "BACK"){
					$side_cash = "LAY";
					#echo "(".$id_selection_dd.") == ".$id_selection." --- --";
					#print_r($odd->ex->availableToLay[0]);
					$odd_saida = $odd->ex->availableToLay[0]->price;
				}
				if($tipo == "LAY"){
					$side_cash = "BACK";
					#print_r($odd->ex->availableToBack[0]);
					$odd_saida = $odd->ex->availableToBack[0]->price;
				}
			}
			
		}
		
		
		#echo "OOOOOOPPPAAA";
		#return false;
		/*
		foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,0,$id_mkt) as $odd){ $cc++;
		
			$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			// seta o placeorder pro cash out
			$odd_now = $this->cashout_model->odd_atual($odd, $marketBook,$id_mkt,$id_jogo);
				#echo "[".count($odd_now)."]";																	  
			
		
		}
		*/
		#echo $odd_now->odd_agora;
		#echo "((".$odd_now."))";
		$odd_atual = $odd_saida;
		#$odd_trat = str_replace(",",".",$odd_atual);
		$odd_trat = $odd_saida;
		$odd_fl = floatval($odd_saida);
		#print_r($odd_atual);
		#echo "(".$odd_now['odd'].")";
		#$balanco_odd =  $odd_correspondida / $odd_trat;
		#echo $balanco_odd;
		#echo $odd_atual.' <> '.$odd_trat;
		#return false;
		
		if($tipo == "BACK"){
			$side_cash = "LAY";
		}
		if($tipo == "LAY"){
			$side_cash = "BACK";
		}
		$tipo = strtoupper($this->input->post('tipo'));
		$valor = floatval($this->input->post('valor'));
		$stake = floatval($this->input->post('size'));
		
		#$stake = floatval($this->input->post('size'));
		$odd_correspondida = floatval($_POST['valor']);
		
		
		
		#$lucro  = ($odd_correspondida * $stake) -$stake;
		
		#$balanco_atual = ($odd_atual  * $stake) - $stake;
		#$balanco_atual =   $lucro - $balanco_atual;
		if($tipo == "BACK"){
			$balanco_atual = ($odd_correspondida / $odd_saida) * $stake; // OFICIAL Q TAVA PEGANDO
			#$balanco_atual = ($odd_saida / $dd_correspondida) * $stake; // valor de saida
		}
		if($tipo == "LAY"){
			#$balanco_atual = ($odd_saida / $dd_correspondida) * $stake; // valor de saida
			$balanco_atual = ($odd_correspondida / $odd_saida) * $stake; // valor de saida
		}
		$balanco_trat = str_replace(".",",",$balanco_atual);
		$balanco_float = round($balanco_atual, 2);
		
		echo "Saída: ".$odd_saida.'\n';
		echo $balanco_atual.' '.$side_cash." -- ".$balanco_float;
		$set = $this->bet_model->placeBet_out('6A1cQNtoRmi0GDOS', $odd_saida, $id_mkt, $id_selection,$balanco_float);
		$this->bet_model->printBetResult($set);
		#echo " = (".$odd_correspondida." / ".$odd_saida.")"." - ".$stake;
		#echo "(".$odd_atual.")";
		#echo "SAIDA: (".$odd_correspondida.' / '.$odd_atual.') * '.$stake ;# $balanco_atual;
		
		#echo $balanco_atual;
		
		#$balanco_atual = ($odd_atual  * $stake) - $stake;
		#if($balanco_atual > $lucro){
		#	$balanco =  $balanco_atual - $lucro;
		#}else{
		#	$balanco =  $lucro - $balanco_atual ;
		#}
		
		// back
		#$lucro = ($odd_correspondida  * $stake) - $stake;
		
		
		
		// lay
		#$lucro = ($odd_correspondida  * $stake);# - $dd_bet_now[$b]->sizeMatched;	
		#$balanco_atual = ($odd_atual  * $stake) - $stake;
		#$balanco_atual =  $balanco_atual - $lucro;
		
		#echo $lucro.' '.$balanco_atual;
		#echo "@".$odd_atual."  $".$balanco." SIDE: ".$side_cash;
		
		
		#$size_post = $this->input->post('size');
		#$size = str_replace(",",".",$size_post);
		#$size_db = floatval($size_post);
		
		// get odd atual
		#include('include/bet/only_odd.php');
		
		#$resultado = $this->list_bets_by_mkt($appKey, $sessionToken, $marketId);
		#print_r(resultado);
		
		
		$params = '{"marketId":"' . $id_mkt . '",
					"instructions":
						 [{"selectionId":"' . $id_selection . '",
						   "side":"'.$side_cash.'",
						   "orderType":
						   "LIMIT",
						   "limitOrder":{"price":'.$odd_atual.',
										"size":'.$balanco_atual.',
										"persistenceType":"LAPSE"}
						   }], "customerRef":"tradersize"}';
		#$jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'placeOrders', $params);
		#$set = $jsonResponse[0]->result;
		#$this->bet_model->printBetResult($set);
					
		#$set = $this->bet_model->cashout($APP_KEY, $SESSION_TOKEN, $id_mkt, $id_selection);
		#print_r($set);
		#$this->bet_model->printBetResult($set);
		#print_r($_POST);
	}
	
	function get_selection_graph($id_mkt,$id_selection,$tipo){
		
		#$this->load->library('user_agent');
		if($this->agent->is_mobile()){
			$dados['modal_w'] = 200;
		}else{
			$dados['modal_w'] = 500;
		}
		/*
		echo $dados['modal_w'];
		return false;
		*/
		
		$dados['id_selection'] = $id_selection;
		$dados['nome_selecao'] = $this->padrao_model->get_by_matriz('selection_id',$id_selection,'odds_mkt')->row()->selection_name;
		#echo $dados['selection_name'];
		#return false;
		$dados['id_mkt'] = $id_mkt;
		$dados['tipo'] = $tipo;
		$this->load->view('bet/get_selection_graph' , $dados);
	}
	// seta tipo de grafico do usuario
	function set_conf_user_graph($id_evento,$id_mkt,$status){
		$new_conf = array('graph_odds' => $status);
		$this->db->where('id_user',$this->session->userdata('id'));
		$this->db->update('user_configs',$new_conf);
		redirect("bet/betjogo/".$id_evento."/".$id_mkt);
	}
	
	################## CAMPEONATOS
	function campeonatos(){
		$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		#echo $SESSION_TOKEN.'<br>';
		#echo $this->session->userdata('token');
		#echo "<br>";
		$dados['campeonatos'] = $this->bet_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$this->load->view('bet/campeonatos' , $dados);	
	}
	
	function set_competicao(){
		$competicoes = $_POST['competicoes'];
		foreach($competicoes as $dd){
			#echo $dd;
			$where = array('id_user' => $this->session->userdata('id') , 'id_competicao' => $dd);
			$this->db->where($where);
			$qr_ver = $this->db->get('bet_competicoes');
			if($qr_ver->num_rows() == 0){
				$this->db->insert('bet_competicoes',$where);
			}
			
		}
		redirect('bet/campeonatos');
	}

	############################### CONFIG
	function config(){
		$this->load->model('bet_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['dd'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'user_configs')->row();
		#echo $SESSION_TOKEN.'<br>';
		#echo $this->session->userdata('token');
		#echo "<br>";
		#$dados['campeonatos'] = $this->bet_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$this->load->view('bet/config' , $dados);	
	}
	
	function set_conf(){
		#$competicoes = $_POST['competicoes'];
		#print_r($_POST);
		$dd_conf = array('id_user' => $this->session->userdata('id'));
		
		if(isset($_POST['graph_odds'])){
			$dd_conf['graph_odds'] = 1;
		}else{
			$dd_conf['graph_odds'] = 0;
		}
		#echo $dd_conf['graph_odds'];

		$where = array('id_user' => $this->session->userdata('id'));
		$this->db->where($where);
		$qr_ver = $this->db->update('user_configs' , $dd_conf);
		redirect('bet/config');
		#return false;
		
			
		
		
	}
	
	function times($cb=''){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		#echo $SESSION_TOKEN.'<br>';
		#echo $this->session->userdata('token');
		#echo "<br>";
		$dados['cb'] = $cb;
		$dados['times'] = $this->db->query("SELECT * FROM times WHERE time <> '' ORDER BY time asc");
		$this->load->view('bet/times' , $dados);	
	}
	function set_coment(){
		if($_POST){
			if(strlen($_POST['coment']) > 5){
				$dd_set = array( 'id_user' => $this->session->userdata('id'), 'id_time' => $_POST['id_time'] , 'coment' => $_POST['coment']);
				$this->db->insert('times_comentarios',$dd_set);
				redirect("bet/times/seted");
			}
		}else{
			redirect("bet/times");
		}
	}
	
	function get_all_eventos(){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$qr = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		$qr = $this->padrao_model->get_qr('betfair_competitions');
		foreach($qr->result() as $meu){
			$competicao = $this->padrao_model->get_by_matriz('id_competition',$meu->id_competition,'betfair_competitions')->row()->nome;
			echo $competicao;
			echo "<br>";
			foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$meu->id_competition) as $jogo) {
				
							$qr_num = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$jogo->event->id."'"); 	
							
							if(mysql_fetch_assoc($qr_num) == 0){
								mysql_query("INSERT INTO `partidas` (`id_evento`,`evento`,`id_competition`) VALUES ('".$jogo->event->id."','".$jogo->event->name."' , '".$meu->id_competition."')")or die(mysql_error());
							}
							
							echo "<p>".$jogo->event->name."</p>";

				
			}
		}
		#echo "OK";
	}
	
	function percorrer_url(){
		$this->load->view('bet/percorrer_url');
	}
	
	
	function rem_compet($id_competition){
		$where = array('id_user' => $this->session->userdata('id') , 'id_competicao' => $id_competition);
		$this->db->where($where);
		$this->db->delete('bet_competicoes');
		#echo $qr->num_rows();
		redirect('bet/campeonatos');
	}
	
	
	
	function loginbetfair(){
		$this->load->view('betfairapi/login');
	}
	
	function sair(){
		$this->session->sess_destroy();
		redirect('home/login');
	}
	
	function login(){
		#header('Content-type: text/xml');
		//require_once('includes/betapi/jsonrpc-futbol.php'); 
		#$this->bet_model->login($APP_KEY, $SESSION_TOKEN);
		$this->load->view('betfairapi/login2');
		#$this->load->view('bet/login.xml');
		###################################
		

	} // x fn login
	
	
	
	function icones(){
		#echo "asdsd";
		$this->load->view('bet/icones');
	}
	
	function pagamento($cb=''){
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['cb'] = $cb;
		$verifica_licenca_user = $this->usuarios_model->verifica_licenca_user($this->session->userdata('id'));
		$dados['licenca'] = $verifica_licenca_user;
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		
		$this->load->view('bet/pagamento' , $dados);
	}
	
	function pay($id_plano,$cb=''){
		#redirect('bet');
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dd_plano = $this->padrao_model->get_by_id($id_plano,'user_plano')->row();

		// insert no bd
		$dd_licenca_financeiro = array(
			'id_ass' => $id_user,
			#'vencimento_fn' => $this->padrao_model->converte_data($vencimento),
			#'pagamento_fn' => date('Y-d-m'),
			'valor_fn' => $dd_plano->valor,
			'status_fn' => 'pendente',
			'descricao' => "Adesão Plano: ".$dd_plano->nome
		);
		$this->db->insert('financeiro' , $dd_licenca_financeiro); 
		$cod = $this->db->insert_id();
		#$cod = "1000";
		
		// https://developers.astropay.com/
		// https://merchant.astropay.com/
		#$invoice = $dd->id."-".$cod;
		$invoice = $cod;
		$amount = $dd_plano->valor;
		$iduser = '571477'; 
		$name = $dd->login;
		$email = $dd->email;
		$bank = 160; 
		$country = "BR"; 
		$currency = "USD"; 
		$description = "Plano: ".$dd_plano->nome; 
		$cpf = "06030689444";  
		$sub_code = "55"; 
		$return_url = "https://tradersize.com/home/pagamento/"; 
		$confirmation_url = "https://tradersize.com/home/pagamento/"; 
		#$return_url = ""; 
		#$confirmation_url = ""; 

		
		
/*		// SANDBOX	
		$invoice = $cod;
		$amount = $dd_plano->valor;
		$iduser = $dd->id; 
		$bank = "VI"; 
		$country = "BR"; 
		$currency = "USD"; 
		$description = "TS"; 
		$cpf = "00003456789";  
		$name = $dd->login;
		$email = $dd->email;
		$sub_code = ""; 
		$return_url = ""; 
		$confirmation_url = ""; 
		$country = "BR";

*/
		// sand box
		#require_once 'includes/AstroPayStreamline.class.php';
		#$aps = new AstroPayStreamline();
		#$response = $aps->newinvoice($invoice, $amount, 'VI', 'BR', $iduser, $cpf, $name, $email);
		// teste
		#$response = $aps->newinvoice($invoice, 10, 'VI', 'BR', 'user123', '012345678', 'User Name', 'user@gmail.com');
		// x teste
		// live
		require_once("includes/AstroPayDirect.class.php");
		$aps = new AstroPayDirect();
		$response = $aps->create($invoice, $amount, $iduser, 'VI', $country, $currency, $description, $cpf, $sub_code, $return_url, $confirmation_url, $response_type = 'json'); 

		#echo $invoice.' , '.$amount.' , '.$iduser.' , '.$bank.' , '.$country.' , '.$currency.' , '.$description.' , '.$cpf.' , '. $sub_code;
		#return false;

		$decoded_response = json_decode($response);
		print_r($decoded_response);
		#return false;
		if($decoded_response->status==0){
		      $url = $decoded_response->link;
		      header("Location: $url");
		      die();
		}else{
		      //manage error here
		      $error = $decoded_response->desc;
		      echo $error;
		} 


		#$apd = new AstroPayDirect();
		#$banks = $apd->get_banks_by_country('BR', 'json');

		#$new_pag = new AstroPayDirect();
		#$pagamento = $new_pag->create($invoice, $amount, $iduser, $bank, $country, $currency, $description, $cpf, $sub_code, $return_url, $confirmation_url, $response_type = 'json'); 


		#$pagamento = $apd->create($invoice, $amount, $iduser, $bank, $country, $currency, $description, $cpf, $sub_code, $return_url, $confirmation_url, $response_type = 'json');
		
		#$apd = new AstroPayStreamline();
		#$banks = $apd->get_banks_by_country('BR', 'json');
		#$pagamento = $apd->newinvoice($invoice, $amount, $iduser, $bank, $country, $currency, $description, $cpf, $sub_code, $return_url, $confirmation_url, $response_type = 'json');

		#$pagamento = $apd->newinvoice($invoice, $amount, $bank, $country, $iduser, $cpf, $name, $email, $currency='', $description, $bdate='', $address='', $zip='', $city='', $state='', $return_url='', $confirmation_url='');

		#echo $new_pag->create($invoice, $amount, $iduser, $bank, $country, $currency, $description, $cpf, $sub_code, $return_url, $confirmation_url, $response_type = 'json'); 

		#echo $pagamento;

		#{
		#	befault: $response_type = 'json';
		#}
		

		#echo "OK 2";

		#$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		#$dados['cb'] = $cb;
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');
		
		#$this->load->view('bet/pagamento' , $dados);
	}

	// coinpayments

	function paycoins($id_plano){
		$dd_plano = $this->padrao_model->get_by_id($id_plano,'user_plano')->row();
		require('includes/coinpayments/coinpayments.inc.php');
		$cps = new CoinPaymentsAPI();
		$cps->Setup('D3b4f93E148bbB2dAB988564b98c0bcD36fd365B2A77eda9Bf7e96FEA7c37987', '1d8f4b15868578977d33975e9c48815aba4eaf120e7580e6d4b5111f032e07a8');
		$valor = $dd_plano->valor;
		$req = array(
			'amount' => $valor,
			'currency1' => 'USD',
			'currency2' => 'BTC',
			'address' => '', // leave blank send to follow your settings on the Coin Settings page
			'item_name' => 'Plano: '.$dd_plano->nome,
			'ipn_url' => base_url().'home/ipn',
			#'ipn_url' => base_url().'ipn_handler.php',
		);
		// See https://www.coinpayments.net/apidoc-create-transaction for all of the available fields
		
		$result = $cps->CreateTransaction($req);
		if ($result['error'] == 'ok') {
			#$le = php_sapi_name() == 'cli' ? "\n" : '<br />';
			#print 'Transaction created with ID: '.$result['result']['txn_id'].$le;
			#print 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).' BTC'.$le;
			#print 'Status URL: '.$result['result']['status_url'].$le;
			$url = $result['result']['status_url'];
			
			
			$dd_financeiro = array(
				'id_user' => $this->session->userdata('id'),				
				'plano' => $id_plano,
				'descricao' => "Adesão TS",
				'txn_id' => $result['result']['txn_id'],
				#'lado' => $lado,
				'valor' =>$valor
			);
			
			$this->db->insert('financeiro_coin',$dd_financeiro);
			
			
			
			header("Location: $url");
		} else {
			print 'Error: '.$result['error']."\n";
		}
		
		$this->db->where(array('id_user' => $this->session->userdata('id') , '')); 
		
		// simples
/*		
		$result = $cps->CreateTransactionSimple(10.00, 'USD', 'BTC', '', 'ipn_url', 'igor_marlus@yahoo.com.br');
		if ($result['error'] == 'ok') {
			$le = php_sapi_name() == 'cli' ? "\n" : '<br />';
			print 'Transaction created with ID: '.$result['result']['txn_id'].$le;
			print 'Buyer should send '.sprintf('%.08f', $result['result']['amount']).' BTC'.$le;
			print 'Status URL: '.$result['result']['status_url'].$le;
		} else {
			print 'Error: '.$result['error']."\n";
		}
*/
		echo "OK";
	}
	// x coinpayments
	
	function set_licence(){
		if($_POST['key_licenca']){
		// dados da licenca	
		$key = $this->input->post('key_licenca');
		$qr_licenca = $this->padrao_model->get_by_matriz('key_serial',$key,'user_seriais');
		if($qr_licenca->num_rows() == 0){
			redirect('bet/pagamento/cod_invalid');
		}else{
			
			$dd_licenca = $qr_licenca->row();
			if($dd_licenca->id_user_use == 0){
				
				$dd_set_lic = array('id_user_use' => $this->session->userdata('id') , 'dt_uso' => date("Y-m-d"));
				//echo "Opa 4";
				$this->db->where('key_serial',$key);
				$this->db->update('user_seriais',$dd_set_lic);
				
				## ATIVA USUARIO
				// tb financeiro
				$dias = 30;
				
				if($dd_licenca->valor > 100){
					$dias = 90;
				}
				
				$vencimento = $this->usuarios_model->calcData(date('d/m/Y'),$dias,'c'); // habilitacao
				$dd_licenca_financeiro = array(
					'id_ass' => $this->session->userdata('id'),
					'vencimento_fn' => $this->padrao_model->converte_data($vencimento),
					'pagamento_fn' => date('Y-d-m'),
					'valor_fn' => $dd_licenca->valor,
					'status_fn' => 'pago',
					'descricao' => "Ativado pelo Serial"
				);
				$this->db->insert('financeiro' , $dd_licenca_financeiro);
				
				
				// seta plano em user
				$dd_up_plano = array('plano' => 1 , 'status' => '1');
				$this->db->where('id',$this->session->userdata('id'));
				$this->db->update('user' , $dd_up_plano);
				
				redirect('bet/pagamento/seted');
				
			}else{
				redirect('bet/pagamento/cod_invalid');
			}
			
		}
		
		
			
			
			
			
		}
	}
	
	
	function saldo(){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$this->bet_model->getAccountFunds($APP_KEY, $SESSION_TOKEN);
		
	}
	
	// teste
	function get_competicoes(){
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$cpts = "13,81";
		#$cpts = array();
		#$cpts[0] = "13";
		#$cpts[1] = "81";
		
		$meus = $this->padrao_model->get_by_matriz('id_user',5,'bet_competicoes');
		$campeonatos = "";
		$c=0;
		foreach($meus->result() as $dd_comp){ $c++;
			if($c == 1){
				$campeonatos =	$dd_comp->id_competicao;
			}else{
				$campeonatos .=	",".$dd_comp->id_competicao;
			}
		}
		#echo $campeonatos;
		#return false;
		foreach ($this->bet_model->getSoccers_competitions($APP_KEY, $SESSION_TOKEN,$campeonatos) as $jogo) { 
		
			echo $jogo->event->name;
			echo "<br>";
                                            
		} 
	}

	// limpar dados do mkt
	function clear_mkt($id_mkt){
		$this->db->where('id_mkt',$id_mkt);
		$this->db->delete('odds_mkt');
		echo "Dados Removidos com sucesso!";
	}

	function create_prices_odds(){
		$num = 1;
		//$n = parseFloat($num);
		#$variavel = '1.1';
		#$valor_float = floatval ($variavel);
		for($n=1; $n<1000; $n++){
			#$num = parseFloat($n);
			#$num = $num + 0.01;
			#echo $num."<br />";
			$num = number_format($n, 2, '.', ',');
			//$n1 = $num+0.1;
			$n1 = $num+0.91;
			$n2 = $num+0.92;
			$n3 = $num+0.93;
			$n4 = $num+0.94;
			$n5 = $num+0.95;
			$n6 = $num+0.96;
			$n7 = $num+0.97;
			$n8 = $num+0.98;
			$n9 = $num+0.99;
			echo $n." (".$n2.")";
			echo $n." (".$n3.")";
			echo $n." (".$n4.")";
			echo $n." (".$n5.")";
			echo $n." (".$n6.")";
			echo $n." (".$n7.")";
			echo $n." (".$n8.")";
			echo $n." (".$n9.")";
			echo "<br>";
			$dd1 = array('price' => $n1);
			$dd2 = array('price' => $n2);
			$dd3 = array('price' => $n3);
			$dd4 = array('price' => $n4);
			$dd5 = array('price' => $n5);
			$dd6 = array('price' => $n6);
			$dd7 = array('price' => $n7);
			$dd8 = array('price' => $n8);
			$dd9 = array('price' => $n9);
			/*
			$this->db->insert('odds_prices' , $dd1);
			$this->db->insert('odds_prices' , $dd2);
			$this->db->insert('odds_prices' , $dd3);
			$this->db->insert('odds_prices' , $dd4);
			$this->db->insert('odds_prices' , $dd5);
			$this->db->insert('odds_prices' , $dd6);
			$this->db->insert('odds_prices' , $dd7);
			$this->db->insert('odds_prices' , $dd8);
			$this->db->insert('odds_prices' , $dd9);
			*/
												
		}
		
	}
		
}
