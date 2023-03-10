<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horse_bot_hist extends CI_Controller {

	
	function index(){
		#echo "OK";
		#return false;
		#$this->load->helper('language');
		#if($this->session->userdata('id')){
			$this->load->model('bet_model');
		#}
		$this->load->model('betfront_model');




		#$this->lang->load('lp','portuguese-brazilian');
		//////////////  X CONF ATUAL
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		
		if(isset($_POST['q'])){
			$dados['busca'] = $this->bet_model->get_evento_query($APP_KEY, $SESSION_TOKEN,1);
		}

		$mercado = "MATCH_ODDS";
		$dados['mercado'] = $mercado;
		
		//$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$hoje = date("Y-d-m");
		$hora = date("h:i:s");
		
		$this->load->view('a2/novo-index' , $dados);
		//$this->load->view('2019/novo-index-estatico' , $dados);
	}



	function placebets($mercado=""){
		#echo "OK";
		#return false;
		#$this->load->helper('language');
		#if($this->session->userdata('id')){
			$this->load->model('bet_model');
		#}
		$this->load->model('betfront_model');




		#$this->lang->load('lp','portuguese-brazilian');
		//////////////  X CONF ATUAL
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		
		

		$mercado = "MATCH_ODDS";
		$dados['mercado'] = $mercado;
		
		//$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		$hoje = date("Y-d-m");
		$hora = date("h:i:s");
		
		$this->load->view('bot/horses/placebets' , $dados);
		//$this->load->view('2019/novo-index-estatico' , $dados);
	}

	function get_hots($cb=""){
		$qr_hots = $this->db->query("SELECT * FROM `odds_hot_horses` WHERE resultado = 2008 AND status  = '0' AND id_user = '".$this->session->userdata('id')."' ORDER BY fila asc LIMIT 1");
		if($qr_hots->num_rows() > 0 ){
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			$this->load->model('bet_model');

			$entrar = true;
			#$this->load->model('bet_model');
			$dd = $qr_hots->row();
			#echo "opa tem novo<br>";
			echo "Evento: ".$dd->id_partida." - ";
			#echo "<br>";
			echo "MKT: <a href='https://www.betfair.com/exchange/plus/football/market/".$dd->id_mkt."'> ".$dd->id_mkt." </a>";
			#echo "<br>";
			echo " - Sel: ".$dd->selection_id;
			#echo "<br>";
			echo " @".$dd->odd;
			echo " | Calback: ";
			
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			#echo "<br>".$APP_KEY, $SESSION_TOKEN.' - '.$dd->id_mkt.' - '.$dd->selection_id;

			$odds_sel_hot = $this->bet_model->getOdds($APP_KEY, $SESSION_TOKEN, $dd->id_mkt, $dd->selection_id);
			#print_r($odds_sel_hot);
			echo "<h1>".$odds_sel_hot->status."</h1>";
			if($odds_sel_hot->status == "CLOSED"){
				$this->db->query("UPDATE `odds_hot_horses` SET `status`= '2' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
			}else{
				foreach($odds_sel_hot->runners as $dd_odd){
						if(isset($dd_odd->selectionId)){
							if($dd_odd->selectionId == $dd->selection_id ){
								$odd_atual = floatval ($dd_odd->ex->availableToBack[0]->price);
								$odd_max = 2.30;
								############## DEFINIR ODD MAXIMA
								/*
								if($odd_atual > $odd_max){
									echo "passou do LIMITE - CANCELADA @".$odd_atual;
									$this->db->query("UPDATE `odds_hot` SET `status`= '4' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
									$entrar = false;
								} // x if atual
								*/

							} //x if seletion == selecion
						} // x isset
				} // x foreach


				#### EVITAR ODDS ALTAS
				$this->db->query("UPDATE `odds_hot_horses` SET `fila`= fila+1 WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
				if($dd->fila > 20){
					$this->db->query("UPDATE `odds_hot_horses` SET `status`= '2' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
				}

				if($entrar == true){ // verifica limite da odd
					$set = $this->bet_model->placeBet_horse($APP_KEY, $SESSION_TOKEN, $dd->id_mkt, $dd->selection_id);
					$this->bet_model->printBetResult($set,$dd->id_mkt);
				}
			}
			
			
			#echo $set;
			


		}else{
			echo '0';
		}
	}

	function check(){
		$this->load->model('padrao_model');
		$this->load->model('bet_model');
		#include("includes/mysqli_con.php");
		#echo "OK 2";
		#return false;
		#$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'US' AND status = '0'  ORDER BY id asc ");
		#$qr_jogos = $this->db->query("SELECT * FROM partidas WHERE data_betfair > NOW()  ORDER BY data_betfair asc ");
		$qr_jogos = $this->db->query("SELECT  DISTINCT o.id_partida , p.id, p.evento, p.data_betfair, o.odd, o.tamanho FROM partidas as p 
			INNER JOIN odds_mkt as o ON p.id_evento  = o.id_partida
			WHERE p.data_betfair > NOW()  ORDER BY p.data_betfair asc ");
		#$qr_run = $this->db->query("SELECT * FROM runs_horses  WHERE status = 0 ORDER BY id desc");
		#echo $qr_jogos->num_rows();
		#return false;
		$dados['qr_jogos'] = $qr_jogos;



		// base de dash/mkts
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$this->db->order_by('id','desc');
		$jogos = $this->db->query("SELECT DISTINCT id_partida FROM odds_mkt");
		$mercados = $this->db->query("SELECT nome, marketName, local , inicio, marketId as id_mkt  FROM runs_horses");
		
		$dados['jogos'] = $jogos;
		$dados['mercados'] = $mercados;
		$dados['dd'] = $dd;
		$dados['total'] = $this->db->get('odds_mkt')->num_rows();
		$this->load->view('bot/horses/check_jogos', $dados);
	} // x fn

	function rem_mkt($id_mkt){
		//echo "opa";
		if($this->session->userdata('nivel') <> '1'){
			#redirect('dash');
		}
		$this->db->where('id_mkt',$id_mkt);
		$this->db->delete('odds_mkt_horses');

		$this->db->where('marketId',$id_mkt);
		$this->db->delete('runs_horses');
		//redirect('dash/mkts' , 'refresh');
		$refer	= $this->agent->referrer();
		$rem_base = str_replace(base_url(), "", $refer);
		redirect($rem_base);
	}


	function set_jogos(){
		#print_r($_POST);
		#return false;
		#echo "<br />";
		#echo "<br />";
		foreach($_POST['runs'] as $run){
			#$odd_mkt_run = $_POST['odd'.$run];
			#echo $run;
			echo "<br>";
			$dd_run = explode('_', $run);
			$id_partida = $dd_run[0]; 
			$id_mkt = $dd_run[1];

			#$id_mkt_betfair = str_replace("11", "1.1", $id_mkt_h);

			$dd_jogo = array(
				'id_partida' => $id_partida,
				'tipo' => 'hist',
				'id_mkt' => $id_mkt
				#'status' => 0
			);
			$this->db->insert('corridas_bet' , $dd_jogo);

			$dd_mercado = array(
				'id_mkt' => $id_mkt
			);
			$this->db->insert('mercados_horses' , $dd_mercado);



			#echo "Jogo: ".$id_partida." ------ MKT: ".$id_mkt_h." ---------- pegar a ".$odd_mkt_run." (".$id_mkt_betfair.") <br>";

			echo "Corrida selecionada: ".$id_partida." ------ ".$id_mkt." <br>";
			echo "<hr>";


		} // x foreach

		echo "<br />";
		echo "<p align='center'><a href='".base_url()."horse_bot_hist/check'> Voltar </a></p>";
	} // x fn

	function sels(){
		$this->db->order_by('id','desc');
		$qr = $this->db->get('partidas_bet');
		/*
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){
				$dd_partida = $this->padrao_model->get_by_matriz('id_evento',$dd->id_partida,'partidas');
				if($dd_partida->num_rows() == 0){
					echo "Indefinido";
				}else{
					echo "<p>".$dd_partida->row()->evento."</p>";
				}

			}
		}
		*/
		$dados['jogos'] = $qr;
		$this->load->view('a2/jogos_selecionados' , $dados);
	}
	

	function csv(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	$dd_insert['selection_name'] = $data[$col];
				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
				          	$this->db->insert('corridas_cavalos' , $dd_insert);
				          	unlink($path."".$file->getFileName());
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  fclose($handle);
			} // x if handle
		if($cont > 20){
		    	return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn


	function csv_place(){
		#echo "OK";
		#return false;
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg > 0){

				          if($cont_cel == 1){
				          	$dd_insert['event_id'] = $data[$col];
				          }
				          if($cont_cel == 2){
				          	$dd_insert['menu_hint'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['event_name'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['event_dt'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['selection_id'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	$dd_insert['selection_name'] = $data[$col];
				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['win_lose'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['bsp'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['ppwap'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['morningwap'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ppmax'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['ppmin'] = $data[$col];
				          }
				          if($cont_cel == 13){
				          	$dd_insert['ipmax'] = $data[$col];
				          }
				          if($cont_cel == 14){
				          	$dd_insert['ipmin'] = $data[$col];
				          }
				          if($cont_cel == 15){
				          	$dd_insert['morningtraderdvol'] = $data[$col];
				          }
				          if($cont_cel == 16){
				          	$dd_insert['pptradedvol'] = $data[$col];
				          }
				          if($cont_cel == 17){
				          	$dd_insert['iptradedvol'] = $data[$col];
				          }
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 17){

			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
				          	$this->db->insert('corridas_cavalos_place' , $dd_insert);
				          	unlink($path."".$file->getFileName());
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	print_r($dd_insert);

			          	echo "<br />";
			          	array_shift($dd_insert);
			          }    
			      } // x for
			  } // x while
			  fclose($handle);
			} // x if handle
		if($cont > 20){
		    	return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn

	function set_ordem_horses(){
		$qr_distinct = $this->db->query("SELECT DISTINCT id_mkt FROM corridas_cavalos_2020 WHERE ordem = 0 LIMIT 500");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('id_mkt',$corrida->id_mkt);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_2020');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						$this->db->update('corridas_cavalos_2020',$dd_numero);
						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->ordem." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}
	
} // x class
