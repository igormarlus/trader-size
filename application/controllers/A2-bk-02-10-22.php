<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A2 extends CI_Controller {

	
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


function set_data(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_2022 WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2022 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_usa',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}

	function set_data_mae_gb(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE data_evento IS NULL ORDER BY id asc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2022 WHERE data_evento = '0000-00-00' LIMIT 50 ");
		foreach($qr->result() as $dd){
			$data = substr($dd->event_dt,0,10);

			$dia = substr($dd->event_dt,0,2);
			$mes = substr($dd->event_dt,3,2);
			$ano = substr($dd->event_dt,6,4);

			$hora = substr($dd->event_dt,10,6).":00";



			$data_trat = $ano."-".$mes."-".$dia;
			echo "<h1>".$dd->id."</h1>";
			echo "<strong>".$ano."-".$mes."-".$dia." $hora</strong>";
			echo "<br />";



			$dd_data = array('data_evento' => $data_trat);
			$dd_data['datahora_evento'] =  $data_trat." ".$hora;
			#$dd_data = array('datahora_evento' => $data_trat." ".$hora);
			print_r($dd_data);
			echo "<br>";
			$this->db->where('id',$dd->id);
			if($this->db->update('corridas_cavalos_gb',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
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
		
		$this->load->view('a2/placebets' , $dados);
		//$this->load->view('2019/novo-index-estatico' , $dados);
	}

	function get_hots($cb=""){
		$qr_hots = $this->db->query("SELECT * FROM `odds_hot` WHERE resultado = 22 AND status  = '0' AND id_user = '".$this->session->userdata('id')."' ORDER BY fila asc LIMIT 1");
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
				$this->db->query("UPDATE `odds_hot` SET `status`= '2' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
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
				$this->db->query("UPDATE `odds_hot` SET `fila`= fila+1 WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
				if($dd->fila > 20){
					$this->db->query("UPDATE `odds_hot` SET `status`= '2' WHERE `id_mkt`= '".$dd->id_mkt."' AND selection_id =  '".$dd->selection_id."'");
				}

				if($entrar == true){ // verifica limite da odd
					$set = $this->bet_model->placeBet_get($APP_KEY, $SESSION_TOKEN, $dd->id_mkt, $dd->selection_id);
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
		$mercados = $this->db->query("SELECT DISTINCT id_mkt  FROM odds_mkt");
		
		$dados['jogos'] = $jogos;
		$dados['mercados'] = $mercados;
		$dados['dd'] = $dd;
		$dados['total'] = $this->db->get('odds_mkt')->num_rows();
		$this->load->view('a2/check_jogos', $dados);
	} // x fn


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
				'tipo' => 'a2',
				'id_mkt' => $id_mkt
				#'status' => 0
			);
			$this->db->insert('partidas_bet' , $dd_jogo);



			#echo "Jogo: ".$id_partida." ------ MKT: ".$id_mkt_h." ---------- pegar a ".$odd_mkt_run." (".$id_mkt_betfair.") <br>";

			echo "Jogo: ".$id_partida." ------ ".$id_mkt." <br>";
			echo "<hr>";


		} // x foreach

		echo "<br />";
		echo "<p align='center'><a href='".base_url()."a2/check'> Voltar </a></p>";
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
				          	$dd_where['event_id'] = $data[$col];

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
				          	#$dd_insert['selection_name'] = $data[$col];
				          	#$dd_where['selection_name'] = $data[$col];
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['selection_name'] = $nm_horse;
				          	$dd_where['selection_name'] = $nm_horse;

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
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("corridas_cavalos_2022");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('corridas_cavalos_2022' , $dd_insert);					          	
					        }
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
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn


	function csv_place(){
		#echo "OK";
		#return false;
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_place/';
		
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
				          	$this->db->insert('corridas_cavalos_place_2020' , $dd_insert);
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
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_2022 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_2022 WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_usa',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}


	function set_ordem_horses_mae_gb(){
		#$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_2022 WHERE ordem = 0 LIMIT 500");
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_gb WHERE ordem = 0 LIMIT 20000");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_gb');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						#$this->db->update('corridas_cavalos_gb',$dd_numero);
						$this->db->update('corridas_cavalos_gb',$dd_numero);

						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}

	############################ REMANEJAMENTO #####################
	function set_mae(){
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_2022 WHERE foi = 0 LIMIT 5000");
		echo $qr->num_rows();
		echo "<br>";
		foreach($qr->result() as $dd){
			unset($dd->id);
			unset($dd->foi);
			#$where = array('event_id' => $dd->event_id, 'selection_name' => $dd->selection_name, 'menu_hint' => $dd->menu_hint);
			$where = array('arq' => $dd->arq, 'selection_name' => $dd->selection_name);
			$this->db->where($where);
			$qr_mae = $this->db->get("corridas_cavalos_gb");
			if($qr_mae->num_rows() > 0){
				echo "Ja tem";
			}
			echo "<h2>".$qr_mae->num_rows()."</h2>";
			if($qr_mae->num_rows() == 0){
				$this->db->insert('corridas_cavalos_gb',$dd);
			}

			$foi = array('foi' => 1);
			$this->db->where($where);
			$this->db->update('corridas_cavalos_2022' , $foi);


			print_r($dd);


			echo "<br /><hr />";
		}
	}

	######################### X R EMANEJAMENTO #####################

	function set_ordem_horses_place(){
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_place_2020 WHERE ordem = 0 LIMIT 500");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_place_2020');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						$this->db->update('corridas_cavalos_place_2020',$dd_numero);
						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}


	function replace_name_tb($tb="corridas_cavalos_2022"){
		$this->db->query("delete from corridas_cavalos_2022 where selection_name like '%lengths%'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Reverse FC'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Forecast'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Reverse Forecast'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name = 'Rrverse FC'");
		$this->db->query("delete from corridas_cavalos_2022 where selection_name like '%£%'");
		$this->db->query("delete from corridas_cavalos_2022 where event_name like '%Forecsat%'");
		$this->db->query("delete from corridas_cavalos_2022 where selection_name = 'yes'");
		$this->db->query("delete from corridas_cavalos_2022 where selection_name = 'no'");

		
		$qr = $this->db->query("SELECT * FROM $tb ORDER BY selection_name asc LIMIT 1000");

		foreach($qr->result() as $dd){
			$arr_replace = array( 
				"1. ", 
				"2. ",
				"3. ", 
				"4. ", 
				"5. ", 
				"6. ", 
				"7. ", 
				"8. ", 
				"9. ", 
				"10. ", 
				"11. ", 
				"12. ", 
				"13. ", 
				"14. ", 
				"15. ", 
				"16. ", 
				"17. ", 
				"18. "
			);
			$new_name = str_replace($arr_replace, "", $dd->selection_name);
			echo $dd->selection_name." = ".$new_name." <br>";

			$new_dd = array( 'selection_name' => $new_name );
			$this->db->where('id',$dd->id);
			$this->db->update($tb,$new_dd);
		}
	} // x fn



	function replace_name_tb_usa($tb="corridas_cavalos_usa_2022"){
		$this->db->query("delete from corridas_cavalos_usa_2022 where selection_name like '%lengths%'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where event_name = 'Reverse FC'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where event_name = 'Forecast'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where event_name = 'Reverse Forecast'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where event_name = 'Rrverse FC'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where selection_name like '%£%'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where event_name like '%Forecsat%'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where selection_name = 'yes'");
		$this->db->query("delete from corridas_cavalos_usa_2022 where selection_name = 'no'");

		
		$qr = $this->db->query("SELECT * FROM $tb ORDER BY selection_name asc LIMIT 1000");

		foreach($qr->result() as $dd){
			$arr_replace = array( 
				"1. ", 
				"2. ",
				"3. ", 
				"4. ", 
				"5. ", 
				"6. ", 
				"7. ", 
				"8. ", 
				"9. ", 
				"10. ", 
				"11. ", 
				"12. ", 
				"13. ", 
				"14. ", 
				"15. ", 
				"16. ", 
				"17. ", 
				"18. "
			);
			$new_name = str_replace($arr_replace, "", $dd->selection_name);
			echo $dd->selection_name." = ".$new_name." <br>";

			$new_dd = array( 'selection_name' => $new_name );
			$this->db->where('id',$dd->id);
			$this->db->update($tb,$new_dd);
		}
	} // x fn

	function replace_name_tb_mae_gb($tb="corridas_cavalos_gb"){
		$this->db->query("delete from corridas_cavalos_gb where selection_name like '%lengths%'");
		$this->db->query("delete from corridas_cavalos_gb where event_name = 'Reverse FC'");
		$this->db->query("delete from corridas_cavalos_gb where event_name = 'Forecast'");
		$this->db->query("delete from corridas_cavalos_gb where event_name = 'Reverse Forecast'");
		$this->db->query("delete from corridas_cavalos_gb where event_name = 'Rrverse FC'");
		$this->db->query("delete from corridas_cavalos_gb where selection_name like '%£%'");
		$this->db->query("delete from corridas_cavalos_gb where event_name like '%Forecsat%'");
		$this->db->query("delete from corridas_cavalos_gb where selection_name = 'yes'");
		$this->db->query("delete from corridas_cavalos_gb where selection_name = 'no'");

		
		$qr = $this->db->query("SELECT * FROM $tb ORDER BY selection_name asc LIMIT 1000");

		foreach($qr->result() as $dd){
			$arr_replace = array( 
				"1. ", 
				"2. ",
				"3. ", 
				"4. ", 
				"5. ", 
				"6. ", 
				"7. ", 
				"8. ", 
				"9. ", 
				"10. ", 
				"11. ", 
				"12. ", 
				"13. ", 
				"14. ", 
				"15. ", 
				"16. ", 
				"17. ", 
				"18. "
			);
			$new_name = str_replace($arr_replace, "", $dd->selection_name);
			echo $dd->selection_name." = ".$new_name." <br>";

			$new_dd = array( 'selection_name' => $new_name );
			$this->db->where('id',$dd->id);
			$this->db->update($tb,$new_dd);
		}
	} // x fn


	function set_bsp_2($tb="corridas_cavalos_2022_"){
		$qr = $this->db->query("SELECT * FROM $tb ORDER BY id asc");
		foreach($qr->result() as $dd){
			$metade = $dd->bsp / 2;

			$new_bsp_2 = array('bsp_2' => $metade);
			$this->db->where('id',$dd->id);
			$this->db->update($tb,$new_bsp_2);

			echo $dd->bsp;
			echo " / = ".$metade;
			echo "<br>";
		}

	}

	// LAY AO PROXIMO
	function lay_ao_prox(){
		$this->load->view('augusto/lay_ao_prox');
	}

	function get_selecions_bsp(){
		header('Access-Control-Allow-Origin: *');
		$id_mkt = "0";
		$qr = $this->db->query("SELECT * FROM selections_bsp ORDER BY dt desc");
		foreach($qr->result() as $dd){
			if($id_mkt =! $dd->id_mkt ){
				echo "<br><hr>";
			}
			$id_mkt = $dd->id_mkt;
			if($dd->ordem > 5 && $dd->win == "1"){
				print_r($dd);
				echo "<p style='color:green'>".$dd->id_mkt." -- ".$dd->ordem." ------ ".$dd->win." EEEEEEEEEEEEEntra </p>";
				if($dd->alerta == 0){ 
					echo "
					<a href='' id='bt".$dd->id."' target='_blank'></a>
					<audio id='audio'>
					   <source src='".base_url()."alert-aug.mpeg' type='audio/mp3' />
					</audio>
					<script>
					$(document).ready(function() {

						//alert('TOCA!');
						//var audio = document.getElementById('audio');
		            	//audio.play();

		            	window.open ('https://www.youtube.com/watch?v=UHjTXLAS4tU', 'popup');

						var text;
						if (confirm('Press a button!') == true) {
						  //text = 'You pressed OK!';
						  window.open ('https://www.betfair.com/exchange/plus/horse-racing/market/".$dd->id_mkt."', 'popup22222');
						} else {
						  //text = 'You canceled!';
						}
						
						//window.open ('https://tradersize.com/alert-aug.mpeg', 'popup2');
						
						

		            	//var audio2 = document.getElementById('audio2');
		            	//audio2.play(); 

		            })

	            	</script>
	            	<script>
	            	$(document).ready(function() {
	            		//window.open ('https://www.betfair.com/exchange/plus/horse-racing/market/".$dd->id_mkt."', 'popup');
	            		window.open ('https://www.youtube.com/watch?v=UHjTXLAS4tU', 'popup');
	            		
	            	})
	            	</script>
					";

					$dd_alerta = array('alerta' => 1);
					$this->db->where('id',$dd->id);
					$this->db->update('selections_bsp' , $dd_alerta);
				}
			}else{
				echo "<p>".$dd->id_mkt." -- ".$dd->ordem." ------ ".$dd->win." </p>";
			}

		}
	}

	function song(){
		echo '<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>';
		echo "

				
					<audio id='audio'>
					   <source src='".base_url()."alert-aug.mpeg' type='audio/mp3' />
					</audio>
				<script>
					$(document).ready(function() {
						
						alert('TOCA! 3333');
						var audio = document.getElementById('audio');
		            	audio.play();

		            
		            })

	            	</script>
		";
	}
	
	function csv_racingpost(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_thr/';
		
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
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	$dd_insert['cavalo'] = $nm_horse;
				          	$dd_where['cavalo'] = $nm_horse;
				          	
				          }
				          if($cont_cel == 2){
				          	$dd_insert['data'] = $data[$col];
				          	#$mes = $data[$col];
				          	#$mes = str_replace("", "set", $mes);
				          	
				          	$dd_where['data'] = str_replace(".", "", $data[$col]);
				          	#$dd_where['data'] = str_replace("Aug", "ago", $dd_where['data']);
				          	#$dd_where['data'] = str_replace("Sep", "set", $dd_where['data']);
				          	#$dd_where['data'] = $data[$col];

				          }
				          
				          if($cont_cel == 3){
				          	$dd_insert['pista'] = $data[$col];
				          	
				          }
				          if($cont_cel == 4){
				          	#$dd_insert['distancia'] = $data[$col];
				          }
				          
				          if($cont_cel == 5){
				          	$dd_insert['going'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	$dd_insert['classe'] = $data[$col];
				          }				         
				          if($cont_cel == 7){
				          	$dd_insert['premio'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['peso_carregado'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['info_adicional'] = $data[$col];
				          }

				          if($cont_cel == 10){
				          	$dd_insert['classificacao'] = $data[$col];
				          }

				          if($cont_cel == 11){
				          	#$dd_insert['bsp'] = $data[$col];
				          	$dd_insert['posicionamento'] = $data[$col];
				          }
				  
				          

				          if($cont_cel == 12){
				          	#$dd_insert['jockey'] = $data[$col];
				          	$dd_insert['odd'] = $data[$col];
				          }
				          
				          
				          if($cont_cel == 13){
				          	#$dd_insert['or'] = $data[$col];
				          	#$dd_insert['ts'] = $data[$col];
				          	#$nm_jockey = str_replace("'", "", $data[$col]);
				          	#$dd_insert['jockey'] = $nm_jockey;
				          }
				          if($cont_cel == 14){
				          	#$dd_insert['ts'] = $data[$col];
				          	#$dd_insert['or'] = $data[$col];
				          }

				          if($cont_cel == 15){
				          	$dd_insert['ts'] = $data[$col];
				          }

				          if($cont_cel == 16){
				          	$dd_insert['rpr'] = $data[$col];
				          }
				          
				          
				        $dd_insert['foi_corredores'] = 0;
				        $dd_insert['foi_classe'] = 0;
				        $dd_insert['foi_bsp'] = 0;
				        $dd_insert['foi_event_id_place'] = 0;
				        #$dd_insert['foi_corredores'] = 0;
	
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linhainha: '.$row.' e na Coluna: '.$data[$col] . " ($col - <b>$cont_cel</b>) <br />\n";
			         
			          if($cont_cel == 16){

			          	if($reg > 0 && $dd_insert['cavalo'] != '------------------------------') {
			          		$this->db->where($dd_where);
			          		// corridas_cavalos_gb
			          		$qr_row = $this->db->get("cavalos_hist");
			          		if($qr_row->num_rows() == 0){
					          	$this->db->insert('cavalos_hist' , $dd_insert);		
					          	echo "<h1 style='color:blue'>DEU INSERT</h1>";			          	
					        }else{
					        	$this->db->where($dd_where);
				          		$qr_row = $this->db->update("cavalos_hist",$dd_insert);
					        	echo "<h1 style='color:red'>DEU UPDATE</h1>";			          	
					        }
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
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 10){
		    	#return false;
		    }
		} // x laço q percorre os arquivos


	} // x fn


} // x class
