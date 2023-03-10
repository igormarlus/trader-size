<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horses extends CI_Controller {

	
	function index() {
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#echo " Pá";
		#if($dados['dd']->nivel == '0'){ 
#			redirect('bet/hots');
		#}
		
		// get corridas
		#$dados['meus'] = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_competicoes');		
		#$this->load->view('bet/horses' , $dados);	
		echo "OK";
	}

	function get_runs(){

		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 

		$t = 0; foreach ($this->betfront_model->get_run_Horses($APP_KEY, $SESSION_TOKEN,7,50) as $jogo) { $t++;
			$dd_evento = $this->betfront_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$jogo->marketId);
			echo "<h1>".$t."</h1>";
			
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

			print_r($jogo);
			echo "<hr />";
			print_r($dd_evento);

			echo "<br /><br /><br />";




        } // x foreach
		echo "ok";
	}

	function rel_runs(){
		#echo "opa 1";
		$this->load->model('padrao_model');
		$this->db->where('status','0');
		$qr_run = $this->padrao_model->get_qr('runs_horses');
		#echo $qr_run->num_rows();
		if($qr_run->num_rows() > 0){
			foreach($qr_run->result() as $run){
				$qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$run->marketId,'odds_mkt_horses');
				echo $qr_mkt->num_rows();
				if($qr_mkt->num_rows() > 0){
					$qr_sels = $this->db->query("SELECT DISTINCT selection_id, selection_name FROM odds_mkt_horses WHERE id_mkt = '".$run->marketId."' ");
					echo "<h1>".$run->nome." (".$run->countryCode.")</h1>";
					echo "<h3>".$run->inicio."</h3>";
					echo "<ul>";
						foreach($qr_sels->result() as $sel){
							echo "<li>".$sel->selection_name." - ".$sel->odd."</li>";
						}
					echo "</ul>";
					echo "<p>".$qr_sels->num_rows()."</p>";
				}
			}
		}


	}

	function next(){
		#$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'US' AND status = '0'  ORDER BY id asc ");
		$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'GB' AND status = '0'  ORDER BY id asc ");
		#$qr_run = $this->db->query("SELECT * FROM runs_horses  WHERE status = 0 ORDER BY id desc");
		$dados['qr_run'] = $qr_run;
		$this->load->view('augusto/lista_horses', $dados);
	} // x fn

	###################### CONFRONTO ######################
	function confronto($id_mkt){

		#$qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$id_mkt,'odds_mkt_horses'); 
		$qr_mkt = $this->db->query("SELECT DISTINCT selection_id  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' ");
		#echo $qr_mkt->num_rows();
		#echo "<br>";

		if( $qr_mkt->num_rows() > 0 ){
			foreach($qr_mkt->result() as $dd){
				#print_r($dd);
				#$qr_hist = $this->db->query("SELECT * FROM corridas_cavalos WHERE selection_id = '".$dd->selection_id."' ");
				#echo $dd->selection_name.": ".$dd->selection_id."( ".$qr_hist->num_rows()." )";
				#echo $dd->selection_name.": ".$dd->selection_id." ";
				#echo "<br /><br />";

			}
		}
		#return false;
		$dados['id_mkt'] = $id_mkt;
		$dados['qr_run'] = $qr_mkt;
		$this->load->view('augusto/confronto', $dados);
	}

	function compara($id_mkt,$id_sel){
		$tb = "corridas_cavalos_2019";
		$qtd = 0;
		$qr_sel_comp = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$id_sel."' ")->row();
		$nm_horse_principal = $qr_sel_comp->selection_name;

		$qr_mkt = $this->db->query("SELECT DISTINCT selection_id  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_id <> $id_sel ");

		if( $qr_mkt->num_rows() > 1){
			foreach($qr_mkt->result() as $sel_conf ){
				$qr_hist = $this->db->query("SELECT event_id,selection_id FROM $tb WHERE selection_id = '".$sel_conf->selection_id."'");
				


				#echo $nm_cavalo." (".$qr_hist->num_rows().")";
				if($qr_hist->num_rows() > 0){
					#echo "<br>";
					foreach($qr_hist->result() as $dd_h){
						$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE event_id = ".$dd_h->event_id." AND selection_id = ".$id_sel."    ");
						//  MATCH
						if($qr_match->num_rows() > 0){
							$qtd = $qtd + 1;
							$qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$sel_conf->selection_id."' ");
							$nm_cavalo = $qr_sel->row()->selection_name;

							echo " - ".$dd_h->event_id." <strong>".$nm_horse_principal."</strong> x <strong>".$nm_cavalo."</strong> (".$qr_match->num_rows().") <br />";

							if($qr_match->row()->win_lose == 0){
								echo "<span style='color:red'>Lose</span>";
							}else{
								echo "<span style='color:green'>Winner</span>";
							}
							echo "<br />";
						}
					}
					#echo "Teem<br>";
				}
				
			}
		}
		if($qtd == 0){
			echo "Nenhum registro encontrado.";
		}



		#echo "<br>";
		#echo $id_mkt." - ".$id_sel;

	}

	function importar_ano(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE data_evento BETWEEN '2019-01-01' AND '2019-12-30'");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			echo $dd->event_id;
			echo "<br>";
			$this->db->insert('corridas_cavalos_2019' , $dd);
		}
	}

	function finished(){
		$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'GB' AND status = '1'  ORDER BY id desc");
		//$qr_run = $this->db->query("SELECT * FROM runs_horses  ORDER BY id desc");
		$dados['qr_run'] = $qr_run;
		$this->load->view('augusto/lista_horses', $dados);
	} // x fn

	

	function historico(){
		$qr_run = $this->db->query("SELECT * FROM corridas_cavalos order by event_id DESC LIMIT 200");
		if(isset($_POST['horse1'])){
			$horse1 = $_POST['horse1']; 
			$horse2 = $_POST['horse2']; 
			if(strlen($horse2) > 3){
				$qr_run = $this->db->query("SELECT * FROM corridas_cavalos WHERE selection_name LIKE '%$horse1%' OR selection_name LIKE '%$horse2%'");
			}else{
				$qr_run = $this->db->query("SELECT * FROM corridas_cavalos WHERE selection_name LIKE '%$horse1%'");
			}
		}
		//$qr_run = $this->db->query("SELECT * FROM runs_horses  ORDER BY id desc");
		$dados['qr_run'] = $qr_run;
		$this->load->view('augusto/runs_hist', $dados);
	} // x fn

	function favoritos($ordem=1){
		#echo "OK!!";

		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2019");
		#echo $qr->num_rows();
		#return false;

		$dados['ordem'] = $ordem;
		$where_dt = "";
		if($_POST){
			$tb = $this->input->post('tabela');
			$where = "";
			$where_dt = "";
			$ordem = $this->input->post('ordem');
			$ordem2 = $this->input->post('ordem2');

			$pista = $this->input->post('pista');
			$distancia = $this->input->post('distancia');
			$odd1 = $this->input->post('odd1'); // BSP
			$odd2 = $this->input->post('odd2'); // BSP

			$data_de = $this->input->post('data_de');
			$data_ate = $this->input->post('data_ate');

			$ipmin = $this->input->post('ipmin'); // IPMIN
			$ppmin = $this->input->post('ppmin'); // PPMIN

			$ppmax = $this->input->post('ppmax'); // PPMAX


			if(strlen($pista) > 2){
				$where .= " AND menu_hint LIKE '%".$pista."%' ";
				$where_dt .= " AND menu_hint LIKE '%".$pista."%' ";
			}

			if(strlen($distancia) > 1){
				$where .= " AND event_name LIKE '%".$distancia."%' ";
				$where_dt .= " AND event_name LIKE '%".$distancia."%' ";
			}

			if(strlen($odd1) > 0){
				$where .= " AND ( bsp > $odd1 AND bsp < $odd2 )";
				$where_dt .= " AND ( bsp > $odd1 AND bsp < $odd2 )";
				#echo $where;

			}

			if(strlen($ipmin) > 0){
				$where .= " AND ipmin <= $ipmin ";
				$where_dt .= " AND ipmin <= $ipmin ";
			}

			if(strlen($ppmin) > 0){
				$where .= " AND ppmin <= $ppmin ";
				$where_dt .= " AND ppmin <= $ppmin ";
			}

			if(strlen($ppmax) > 0){
				$where .= " AND ppmax >= $ppmax ";
				$where_dt .= " AND ppmax >= $ppmax ";
			}

			if(strlen($data_de) > 0){
				$data1 = $this->padrao_model->converte_data($data_de);
				$data2 = $this->padrao_model->converte_data($data_ate);

				echo $data1." ".$data2;
				

				#$where .= " AND ( event_dt BETWEEN '$data1 00:00:01' AND  '$data2 23:59:29')";
				$where .= " AND ( data_evento BETWEEN '$data1' AND  '$data2')";
				
				echo "<br>";

				echo $where;

				#return false;
			}

			$where_ordem = " ( ordem BETWEEN '".$ordem."' AND  '".$ordem2."' ) ";

			

			$qr_vencedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 1 $where  ");
			$qr_perdedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 0 $where  ");

			#$qr_datas = $this->db->query("SELECT DISTINCT data_evento FROM $tb WHERE where_ordem AND win_lose = 0 $where  ORDER BY data_evento asc ");

			$qr_datas = $this->db->query("SELECT DISTINCT data_evento FROM $tb WHERE $where_ordem  $where  ORDER BY data_evento asc ");

			$qr_datas_win = $this->db->query("SELECT DISTINCT data_evento FROM $tb WHERE $where_ordem AND win_lose = 1 $where  ORDER BY data_evento asc ");



			#echo $qr_vencedores->num_rows();
			#echo "<br />";
			#echo "Pista: ".$pista;
			#echo "<br />";
			#echo "Where: ".$where;
			#echo "<br />";
			#echo "<br />";
			#return false;

			$qr_vencedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 1 $where ");
			$qr_perdedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 0 $where ");

			$dados['ordem'] = $ordem;


		}else{
			$tb = "corridas_cavalos_2019";
			$where_ordem = " ( ordem BETWEEN 1 AND  20 )";
			

			$qr_vencedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 1 LIMIT 10");
			$qr_perdedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 10");

			$qr_datas = $this->db->query("SELECT DISTINCT data_evento FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 10");

			$qr_vencedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 1 LIMIT 10 ");
			$qr_perdedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 10 ");

		}

		#echo $tb;
		#return false;

		
		$dados['where_ordem'] = $where_ordem;
		$dados['qr_vencedores_total'] = $qr_vencedores_total;
		$dados['qr_perdedores_total'] = $qr_perdedores_total;
		$dados['qr_vencedores'] = $qr_vencedores;
		$dados['qr_perdedores'] = $qr_perdedores;

		$dados['qr_datas'] = $qr_datas;

		$dados['where_dt'] = $where_dt;


		//  FILTROS
		$dados['pistas'] = $this->db->query("SELECT DISTINCT menu_hint FROM $tb ORDER BY menu_hint asc ");
		$dados['distancias'] = $this->db->query("SELECT DISTINCT event_name FROM $tb ORDER BY event_name asc ");


		$this->load->view('augusto/favoritos', $dados);
	}


	function set_data(){
		#echo "OK!";
		#return false;
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE data_evento IS NULL ORDER BY id asc LIMIT 100 ");
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_2019 WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 10000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2019 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			#$dd_data = array('data_evento' => $data_trat);
			$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			$this->db->update('corridas_cavalos_2019',$dd_data);
		}
		echo $qr->num_rows();
	}


	

	

	function arq($id_run){
		$dd = array('status' => '1');
		$this->db->where('id',$id_run);
		$this->db->update('runs_horses' , $dd);
		redirect('horses/next');
	}


	function clear(){
		$this->db->query("TRUNCATE TABLE runs_horses");
		$this->db->query("TRUNCATE TABLE odds_mkt_horses");
		redirect('cron/get_runs/1');
	} 

		########################################  HORSES
	function check(){
		$dados['opa'] = "";
		#include("includes/mysqli_con.php");
		#echo "OK 2";
		#return false;
		#$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'US' AND status = '0'  ORDER BY id asc ");
		#$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE (countryCode = 'GB' OR countryCode = 'IR' OR countryCode = 'US') AND status = '0'  ORDER BY id asc ");
		#$qr_run = $this->db->query("SELECT * FROM runs_horses  WHERE status = 0 ORDER BY id desc");
		#echo $qr_run->num_rows();
		#return false;
		#$dados['qr_run'] = $qr_run;
		$this->load->view('augusto/check_horses', $dados);
	} // x fn
	
	function set_horses(){
		#print_r($_POST);
		#echo "<br />";
		#echo "<br />";
		foreach($_POST['runs'] as $run){
			$odd_mkt_run = $_POST['odd'.$run];
			echo $run;
			echo "<br>";
			$dd_run = explode('_', $run);
			$id_mkt_h = $dd_run[0]; 
			$sel_run = $dd_run[1];

			$id_mkt_betfair = str_replace("11", "1.1", $id_mkt_h);

			$dd_hot_horse = array(
				'id_mkt' => $id_mkt_betfair,
				'selection_id' => $sel_run,
				'odd' => $odd_mkt_run,
				'status' => 0
			);
			$this->db->insert('odds_hot_horses' , $dd_hot_horse);



			echo "HORSE: ".$sel_run." ------ MKT: ".$id_mkt_h." ---------- pegar a ".$odd_mkt_run." (".$id_mkt_betfair.") <br>";
			echo "<hr>";


		} // x foreach

		echo "<br />";
		echo "<p align='center'><a href='".base_url()."horses/check'> Voltar </a></p>";
	} // x fn


#########################  BOT HORSE ######################
	function get_hots($cb=""){

		$qr_hots = $this->db->query("SELECT * FROM `odds_hot_horses` WHERE status  = '0' ORDER BY fila asc LIMIT 1");

		#echo $qr_hots->num_rows();
		#return false;
		if($qr_hots->num_rows() > 0 ){
			require_once('includes/betapi/jsonrpc-futbol.php'); 
			$this->load->model('bet_model');

			$entrar = false;
			$dd = $qr_hots->row();
			#echo "opa tem novo<br>";
			#echo "Evento: ".$dd->id_partida." - ";
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
			#return false;
			if($odds_sel_hot->status == "CLOSED"){
				$this->db->query("UPDATE `odds_hot_horses` SET `status`= '2' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
			}else{
				if(is_array($odds_sel_hot->runners)){
					echo "<h2>Continua</h2>";
				}else{
					echo "<h2>Evita erro</h2>";
					

				}
				foreach($odds_sel_hot->runners as $dd_odd){
						if(isset($dd_odd->selectionId)){
							if($dd_odd->selectionId == $dd->selection_id ){
								$odd_atual = floatval ($dd_odd->ex->availableToBack[0]->price);
								$odd_max = 2.30;
								echo "Odd atual: <strong>@".$odd_atual."</strong> |  odd escolhida <strong>@".$dd->odd."</strong>";
								#if($odd_atual > 2 && $odd_atual <  $dd->odd){
								if($odd_atual > 1.5){	
									echo "foii<br><hr>";
									#$this->db->query("UPDATE `odds_hot_horses` SET `status`= '4' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");



									//  FAZ A ENTRADA
									$set = $this->bet_model->placeBet_horse($APP_KEY, $SESSION_TOKEN, $dd->id_mkt, $dd->selection_id);
									$this->bet_model->printBetResult_horse($set,$dd->id_mkt);

									#$this->db->query("UPDATE `odds_hot_horses` SET `status`= '1' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");








									$entrar = true;
								} // x if atual
							} //x if seletion == selecion
						} // x isset
				} // x foreach

				
				#### EVITAR ODDS ALTAS
				$this->db->query("UPDATE `odds_hot_horses` SET `fila`= fila+1 WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
				if($dd->fila > 3){
					#$this->db->query("UPDATE `odds_hot_horses` SET `status`= '2' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");$this->upload->do_upload($field_name);
					$odd_mais = $odd_atual+4;
					$this->db->query("UPDATE `odds_hot_horses` SET `odd`= '".$odd_atual."' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
					echo "Odd atual: <strong>$odd_atual ***</strong> + 4 ".$odd_mais." (desativado)<br/>";
				}

				if($entrar == true){ // verifica limite da odd
					#$set = $this->bet_model->placeBet_horse($APP_KEY, $SESSION_TOKEN, $dd->id_mkt, $dd->selection_id);
					#$this->bet_model->printBetResult_horse($set,$dd->id_mkt);

					#$this->db->query("UPDATE `odds_hot_horses` SET `status`= '1' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
				}
			}
			
			
			#echo $set;
			


		}else{
			echo '0';
		}
	} // x fn

	/*

	function get_horses_post(){
		header('Access-Control-Allow-Origin: *');


		$dados = file_get_contents("php://input");
		$json = json_encode($dados);
		$trat = json_decode($json);
		echo "json: ".$json;
		echo "<br>";
		echo "<br>";
		echo "print_r";
		print_r($json);
		echo "<br>";
		echo "<br>";
		echo "trat: ".$trat;

		$separador = explode('&', $trat);
		echo "<br><hr>";
		echo $separador[0];
		echo "<br />";
		echo $separador[1];

		$id_mkt_trat = str_replace("market_id=", "", $separador[0]);
		$sel_id_trat = str_replace("selection_id=", "", $separador[1]);
		#echo "saasedasdsadsad";
		#echo $json->market_id." ----- ".$json->selection_id;
		#foreach($json as $dd){
			echo "<h1>".$id_mkt_trat."</h1>";
			echo "<h1>".$sel_id_trat."</h1>";
		#}
		#return false;

		
		$selection_name = "";
		foreach($_POST as $campo => $dd){
		//foreach($_POST as $dd){
			$selection_name .= $campo." - ".$dd." ";
		}
		
		
		$dd_post = array(
			'id_mkt' => $id_mkt_trat,
			'selection_id' => $sel_id_trat,
			#'selection_name' => $selection_name,
			'odd' => 100
		);
		$dd_post2 = array(
			'id_mkt' => $id_mkt_trat->id_mkt,
			'selection_id' => $id_mkt_trat->selection_id,
			#'selection_name' => $selection_name,
			'odd' => 90
		);
		print_r($_POST);
		$this->db->insert('odds_hot_horses' , $dd_post);
		$this->db->insert('odds_hot_horses' , $dd_post2);
		#$this->db->insert('odds_hot_horses' , $_POST);
		#$last_id = $this->db->insert_id();

		#$dd_odd = array('odd' => 100);
		#$this->db->where('id',$last_id);
		#$this->db->update('odds_hot_horses',$dd_odd);

		#$json = json_decode($_POST);
		#echo $json;

	}


	*/


	function get_horses_post(){
		header('Access-Control-Allow-Origin: *');
		$this->load->model('Bet_model');


		$dados = file_get_contents("php://input");
		$json = json_encode($dados);
		$trat = json_decode($dados);
	
		print_r($trat);

		echo $trat->id_mkt." +++++ ".$trat->selection_id;
		echo "<br><hr>";

		$cont = 0;

		$dd_insert = array(
			'odd' => 3
		);

		foreach($trat as $dd){ $cont++;
			if($cont == 1){
				$dd_insert['id_mkt'] = $dd;
			}
			if($cont == 2){
				$dd_insert['selection_id'] = $dd;
			}
			if($cont == 3){
				$dd_insert['side'] = $dd;
			}

			if($cont == 4){
				$dd_insert['odd'] = $dd;
			}

			#echo $dd['market_id'];
			echo "Pega de fora: ";
			print_r($dd);
			echo "<br>";

		}
		print_r($dd_insert);
		echo "<br>";
		// PEGA ODD ATUAL
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		echo $APP_KEY." -- ".$SESSION_TOKEN;
		echo "<br>";
		#$odds = $this->Bet_model->getOdds($APP_KEY, $SESSION_TOKEN, $dd_insert['id_mkt'],$dd_insert['selection_id']);
		$odds = $this->Bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN,$dd_insert['id_mkt']);
		foreach($odds->runners as $run){
			echo "<strong>";
			
			if($run->selectionId == $dd_insert['selection_id']){
				print_r($run);
				echo "<strong style='color:#f00'>É ESSE: ".$run->lastPriceTraded." </strong>";
				$dd_insert['odd'] = $run->lastPriceTraded+1;
				$dd_insert['tamanho'] = $run->lastPriceTraded;
			}
			echo "</strong><br />";
			echo "<br />";
		}
		echo "<br /><hr />";
		echo "<br />";
		print_r($odds->runners);
		echo "<br>Acaba aqui...";

		#return false;
		$this->db->insert('odds_hot_horses' , $dd_insert);

		#eturn false;

	
		$dd_post = array(
			'id_mkt' => $trat->id_mkt,
			'selection_id' => $trat->selection_id,
			#'selection_name' => $selection_name,
			#'selection_name' => $trat,
			'odd' => 100
		);
		echo "Seta no DB: ";
		print_r($dd_post);
		echo "<br />";
	
		
		#$this->db->insert('odds_hot_horses' , $dd_post);
	
	}

	function teste_json(){
		echo "...";
		echo "<br>";
		$data = array("id_mkt" => "1.163467140", "selection_id" => "11768986" , "side" => "LAY", "odd" => "5");
	      $data_string = json_encode($data);                                                                                   

	      $ch = curl_init(base_url()."horses/get_horses_post");
	      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	      curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	          'Content-Type: application/json',
	          'Content-Length: ' . strlen($data_string))
	      );                                                                                                                   

	      $result = curl_exec($ch);
	      echo $result;

	}
	
	
}
