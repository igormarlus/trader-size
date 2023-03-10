<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bot extends CI_Controller {

	function index() {
		if($this->session->userdata('nivel') <> '1'){
			redirect('dash');
		}
		$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#$this->load->view('bo/base' , $dados);	
		$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		$this->load->view('dash/bot/eventos' , $dados);	
	}
	
	function cadastrar(){
		
		$valor = str_replace("R$ ","",$_POST['valor']);
		$valor = str_replace(".","",$valor);
		$valor = str_replace(",",".",$valor);
		
		$evento = $this->input->post('evento');
		$status = $this->input->post('status');
		$bet_placed = $this->input->post('bet_placed');
		$bet_id = $this->input->post('bet_id');
		
		$dd = array(
			'evento' => $evento,
			'status' => $status,
			'matched' => $valor,
			'bet_placed' => $bet_placed,
			'bet_id' => $bet_id
		);
		$this->db->insert('bot_eventos' , $dd);
		redirect('bot');
		
		#echo $valor;
	}
	
	function evento_edit($id_evento){
		
		#$this->db->where('id',$id_evento);
		#$dados['eve'] = $this->db->get('bot_eventos')-row();
		#echo $id_evento;
		$dados['id_evento'] = $id_evento;
		$this->load->view('dash/bot/eventos_edit' , $dados);	
		
	}
	
	function edit($id_evento){
		
		$valor = str_replace("R$ ","",$_POST['valor']);
		$valor = str_replace(".","",$valor);
		$valor = str_replace(",",".",$valor);
		
		$evento = $this->input->post('evento');
		$status = $this->input->post('status');
		$bet_placed = $this->input->post('bet_placed');
		$bet_id = $this->input->post('bet_id');
		
		$dd = array(
			'evento' => $evento,
			'status' => $status,
			'matched' => $valor,
			'bet_placed' => $bet_placed,
			'bet_id' => $bet_id
		);
		
		if($status == "SETTLED"){
			$dd['pl'] = $valor;
		}
		
		if(isset($_POST['red'])){
			$dd['red'] = '1';
		}
		
		$this->db->where('id',$id_evento);
		$this->db->update('bot_eventos' , $dd);
		redirect('bot');
		
		
	}
	
	function betfairapi(){
		#$this->load->view('betfairapi/jsonrpc');
		$this->load->view('betfairapi/index');
	}
	
	function baseapi(){
		#$this->load->view('betfairapi/jsonrpc');
		$this->load->view('betfairapi/base');
	}
	function betjogo($id_jogo){
		$dados['id_jogo'] = $id_jogo;
		$this->load->view('betfairapi/jogo' , $dados);
		#$this->load->view('bet/jogo' , $dados);
	}
	
	function loginbetfair(){
		$this->load->view('betfairapi/login');
	}



	#########################  BOT A2
	function a2($mkt='all',$status=0) {
		
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['mkt'] = $mkt;
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();

		$dados['status'] = $status;
		
		// caso não espeja adimplente 
		if($dados['dd']->status == '0'){ 
			#redirect('bet');
		}
		
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');

		/*
		SELECT a.vei_nome, a.vei_cor, b.mar_nome FROM Veiculo a
		INNER JOIN Marca b ON a.mar_id = b.mar_id
		*/
		if($mkt == 'all'){

			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE h.resultado = 22 AND m.status = $status");

		}else{

			if($mkt == '0.5ht'){
				$mkt = 'First Half Goals 0.5';
			}
			if($mkt == '1.5ht'){
				$mkt = 'First Half Goals 1.5';
			}

			if($mkt == '0.5'){
				$mkt = 'Over/Under 0.5 Goals';
			}

			if($mkt == '1.5'){
				$mkt = 'Over/Under 1.5 Goals';
			}
			if($mkt == '2.5'){
				$mkt = 'Over/Under 2.5 Goals';
			}

			if($mkt == '3.5'){
				$mkt = 'Over/Under 3.5 Goals';
			}

			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE h.resultado = 22 AND m.status = $status AND m.name = '".$mkt."' ");

		}

		if($status > 0){ //query com mais de 100K correspondido
			#$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE "'',$ord='desc',$campo='id',$limit=100,$inicio=0);
		}
		
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		
		$this->load->view('bot/a2' , $dados);	 
		
	}

	function rem_hots_a2($id,$mkt){

		$this->db->where('id',$id);
		$dd_hot = $this->db->get('odds_hot')->row();

		$this->db->where('id_mkt',$dd_hot->id_mkt);
		$this->db->delete('odds_mkt');
		

		$this->db->where('id',$id);
		$this->db->delete('odds_hot');
		redirect('bot/a2/'.$mkt.'/1');
	}
	


	############################### HORSES
	#########################  BOT A2
	function horses($mkt='all',$status=0) {
		
		#if($this->session->userdata('nivel') <> '1'){
		#	redirect('dash');
		#}
		#$this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['mkt'] = $mkt;
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();

		$dados['status'] = $status;
		
		// caso não espeja adimplente 
		if($dados['dd']->status == '0'){ 
			#redirect('bet');
		}
		
		// get campeonatos
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');

		/*
		SELECT a.vei_nome, a.vei_cor, b.mar_nome FROM Veiculo a
		INNER JOIN Marca b ON a.mar_id = b.mar_id
		*/
		#if($mkt == 'all'){
		/*

			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot_horses  h 
				INNER JOIN runs_horses m ON h.id_mkt = m.marketId
				WHERE  m.status = $status"); */


			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot_horses  h 
				INNER JOIN runs_horses m ON h.id_mkt = m.marketId
				");

		/*

		}else{
			if($mkt == '0.5ht'){
				$mkt = 'First Half Goals 0.5';
			}
			if($mkt == '1.5ht'){
				$mkt = 'First Half Goals 1.5';
			}

			$dados['hots'] = $this->db->query("SELECT h.id, h.id_partida, h.id_mkt, h.selection_id, h.tamanho ,h.odd, h.side, h.tipo, h.resultado, h.dt FROM odds_hot  h 
				INNER JOIN mercados m ON h.id_mkt = m.id_mkt
				WHERE h.resultado = 22 AND m.status = $status AND m.name LIKE '%".$mkt."%' ");

		}
		*/

		if($status > 0){ //query com mais de 100K correspondido
			#$dados['hots'] = $this->db->query("SELECT * FROM odds_hot WHERE "'',$ord='desc',$campo='id',$limit=100,$inicio=0);
		}
		
		
		#$this->load->view('bo/base' , $dados);	
		#$dados['eventos'] = $this->padrao_model->get_qr('bot_eventos');
		
		$this->load->view('bot/a2_horses' , $dados);	 
		
	}
		
}
