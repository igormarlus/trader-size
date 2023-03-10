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

	function next($qtd=300){
		#echo date("Y-m-d");
		#echo "SELECT * FROM runs_horses WHERE status < 2 AND marketName <> 'AVB'  AND (inicio BETWEEN '".date("Y-m-d")." 00:00:01' AND '".date("Y-m-d")." 23:59:59' ) ORDER BY id asc ";
		#return false;
		#$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'US' AND status = '0'  ORDER BY id asc ");
		#### GB
		#$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'GB' AND status = '0'  ORDER BY id asc ");
		#### AU
		#$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AU' AND status = '0'  ORDER BY id asc ");
		#$qr_run = $this->db->query("SELECT * FROM runs_horses  WHERE status = 0 ORDER BY id desc");

		$dados['qtd'] = $qtd;


		## GERAL
		#$qr_run = $this->db->query("SELECT * FROM runs_horses   ORDER BY id asc ");
		## só as q ainda n acbaram
		$qr_run = $this->db->query("SELECT * FROM runs_horses WHERE (countryCode = 'GB' OR countryCode = 'US' OR countryCode = 'IE' OR countryCode = 'AU' ) AND status < 2 AND marketName <> 'AVB'  AND (data_timezone BETWEEN '".date("Y-m-d")." 00:00:01' AND '".date("Y-m-d")." 23:59:59' ) ORDER BY id asc ");

		$dados['qr_run'] = $qr_run;
		$this->load->view('augusto/lista_horses', $dados);
	} // x fn

	###################### CONFRONTO ######################
	function confronto($id_mkt){

		#$qr_mkt = $this->padrao_model->get_by_matriz('id_mkt',$id_mkt,'odds_mkt_horses'); 
		$qr_mkt = $this->db->query("SELECT DISTINCT selection_id,id_partida  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' ");
		if( $qr_mkt->num_rows() == 0 ){
			echo "Sem dados (id_evento)";
			return false;
		}
		#echo "<br>";
		$id_evento = $qr_mkt->row()->id_partida;
		$qr_run = $this->db->query("SELECT DISTINCT countryCode  FROM runs_horses WHERE id_evento = '".$id_evento."' ");
		$pais = $qr_run->row()->countryCode;
		$dados['pais'] = $pais;

		 $pais_sigla = "";
        if($pais == "GB"){
          $pais_sigla = "";
        }
        if($pais == "AU"){
          $pais_sigla = "_aus";
        }
        if($pais == "US"){
          $pais_sigla = "_usa";
        }

        if($pais == "IE"){
          $pais_sigla = "_ire";
        }

        $dados['pais_sigla'] = $pais_sigla;

		#return false;
		#echo "<br>";

		if( $qr_mkt->num_rows() > 0 ){
			
			#return false;
			#foreach($qr_mkt->result() as $dd){
				#print_r($dd);
				#$qr_hist = $this->db->query("SELECT * FROM corridas_cavalos WHERE selection_id = '".$dd->selection_id."' ");
				#echo $dd->selection_name.": ".$dd->selection_id."( ".$qr_hist->num_rows()." )";
				#echo $dd->selection_name.": ".$dd->selection_id." ";
				#echo "<br /><br />";

			#}
		}else{
			echo "sem dados";
			return false;
		}
		#echo $dd->id_partida;
		#return false;
		#return false;
		$dados['id_mkt'] = $id_mkt;
		$dados['qr_run'] = $qr_mkt;
		$this->load->view('augusto/confronto', $dados);
	}

	function confronto_sel($id_selection){

	}

	function compara($id_mkt,$id_sel,$ano){

		$qr_sel_comp = $this->db->query("SELECT selection_name,id_partida FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$id_sel."' ")->row();




		$id_evento = $qr_sel_comp->id_partida;
		#echo $id_evento;
		$qr_run = $this->db->query("SELECT DISTINCT countryCode  FROM runs_horses WHERE id_evento = '".$id_evento."' ");
		$pais = $qr_run->row()->countryCode;
		$dados['pais'] = $pais;

		$pais_sigla = "";
        if($pais == "GB"){
          $pais_sigla = "";
        }
        if($pais == "AU"){
          $pais_sigla = "_aus";
        }
        if($pais == "US"){
          $pais_sigla = "_usa";
        }

        if($pais == "IE"){
          $pais_sigla = "_ire";
        }

        echo "<h1>".$pais_sigla."</h1>";

        $dados['pais_sigla'] = $pais_sigla;

        $tb = "corridas_cavalos".$pais_sigla."_$ano";

		if($pais == "GB"){
          $tb = "corridas_cavalos_$ano";
        }

		#$tb = "corridas_cavalos".$pais_sigla."_$ano";
		#echo $tb;
		#echo "<br />";
		$qtd = 0;
		
		$nm_horse_principal = $qr_sel_comp->selection_name;

		$qr_mkt = $this->db->query("SELECT DISTINCT selection_id  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_id <> $id_sel ");

		if( $qr_mkt->num_rows() > 1){
			foreach($qr_mkt->result() as $sel_conf ){
				$qr_hist = $this->db->query("SELECT event_id,selection_id FROM $tb WHERE selection_id = '".$sel_conf->selection_id."'");
				
			#for($a=8; $a<20; $a++){ 
				/*
	              $ano_fim = $a;
	              if(strlen($a) == 1){
	                $ano_fim = "0".$a;
	                
	              }
	              */
	            $qr_hist = $this->db->query("SELECT * FROM $tb WHERE selection_id = '".$sel_conf->selection_id."' ");



				
				if($qr_hist->num_rows() > 0){	

					#echo "<br>";
					foreach($qr_hist->result() as $dd_h){
						#print_r($dd_h);
						#$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE event_id = ".$dd_h->event_id." AND selection_id = ".$id_sel."    ");
						$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE  selection_id = ".$id_sel." AND event_id = '".$dd_h->event_id."'  ");

						#$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE  selection_id = ".$id_sel." AND event_id = '".$dd_h->event_id."'  ");

						if($pais == "AU"){
							//selection_name
							$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE  selection_name = '".$dd_h->selection_name."' AND event_id = '".$dd_h->event_id."'  ");
						}

						#echo $qr_sel->row()->selection_name;;
						#echo "<br><hr>";
						//  MATCH
						if($qr_match->num_rows() > 0){
							#echo "<h2>".$sel_conf->selection_id." (".$qr_hist->num_rows().")</h2>";
							#return false;
							#echo "<br />";
							echo "<table border='1' style='width:100%'>";
							$qtd = $qtd + 1;
							$qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$sel_conf->selection_id."' ");
							$nm_cavalo = $qr_sel->row()->selection_name;

							#echo " - ".$dd_h->event_id." <strong>".$nm_horse_principal."</strong> x <strong>".$nm_cavalo."</strong> (".$qr_match->num_rows().") <br />";
							echo "<tr>";
								echo "<td style='width:10%'>".$dd_h->data_evento."</td>";
								echo "<td style='width:10%'>".$dd_h->menu_hint."</td>";								
								echo "<td style='width:10%'><strong>".$nm_horse_principal."</strong></td>";
								echo "<td style='width:3%'><strong style='color:blue'>X</strong></td>";
								echo "<td style='width:10%'>".$nm_cavalo."</td>";
								#echo "<td style='width:10%'>".$qr_match->num_rows()."</td>";
								#echo "<td style='width:10%'>".$qr_hist->num_rows()."</td>";
								#echo "<td style='width:10%'>".$dd_h->event_id."</td>";
								echo "<td style='width:10%'>";
							if($qr_match->row()->win_lose == 0){
								echo "<span style='color:red'>Lose</span>";
							}else{
								echo "<span style='color:green'>Winner</span>";
							}
								echo "</td>";
							echo "</tr>";
							echo "</table>";
						} // x num_rows() qr_match
					}
					#echo "Teem<br'>";
				} // x if num_rows()
			#} // x for
				
			}
		}
		if($qtd == 0){
			echo "Nenhum registro encontrado.";
		}
		#echo $qtd;



		#echo "<br>";
		#echo $id_mkt." - ".$id_sel;

	} // x fn

	function compara_qtd($id_mkt,$id_sel,$ano,$pais="GB"){
		$tb = "corridas_cavalos_$ano";
		#echo $tb;
		#echo "<br />";
		#$pais_sigla = "";
        if($pais == "GB"){
          $pais_sigla = "_";
        }
        if($pais == "AU"){
          $pais_sigla = "_aus";
        }
        if($pais == "US"){
          $pais_sigla = "_usa";
        }

        if($pais == "IE"){
          $pais_sigla = "_ire";
        }

        #echo $pais_sigla;
        #return false;

        #echo "<h1>".$pais_sigla."</h1>";

        #$dados['pais_sigla'] = $pais_sigla;



		$tb = "corridas_cavalos".$pais_sigla."_$ano";

		if($pais == "GB"){
          $tb = "corridas_cavalos_$ano";
        }


		$qtd = 0;
		$qr_sel_comp = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$id_sel."' ")->row();
		$nm_horse_principal = $qr_sel_comp->selection_name;

		


		

		

		if($pais == "AU"){

			$search  = array('1.', '2.', '3.', '4.', '5.','6.','7.','8.','9.','10.','11.','12.');
		    $replace = array('');
		    #$subject = 'A';
		    $nm_horse_principal = str_replace($search, $replace, $nm_horse_principal);

			$qr_mkt = $this->db->query("SELECT DISTINCT selection_name  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_name NOT LIKE '%$nm_horse_principal%' ");

		}else{

			$qr_mkt = $this->db->query("SELECT DISTINCT selection_id  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_id <> $id_sel ");

		}

		#echo "<h1>".$nm_horse_principal."</h1>";

		#echo "<h3>".$qr_mkt->num_rows()." cavalos para comparar </h3>";
		#print_r($qr_mkt->result());
		#echo "<br /><hr />";

		if( $qr_mkt->num_rows() > 1){
			foreach($qr_mkt->result() as $sel_conf ){

				#echo "<h5 style='color:blue'>".$sel_conf->selection_name."</h5>";
				if($pais == "AU"){
					$nm_horse_confr = str_replace($search, $replace, $sel_conf->selection_name);
						#$qr_hist = $this->db->query("SELECT event_id,selection_name FROM $tb WHERE selection_name = '".$sel_conf->selection_name."'");

						$qr_hist = $this->db->query("SELECT * FROM $tb WHERE selection_name LIKE '%".$nm_horse_confr."%' ");

				}else{
					$qr_hist = $this->db->query("SELECT event_id,selection_id FROM $tb WHERE selection_id = '".$sel_conf->selection_id."'");
				}

				#echo "<h4>-- ".$qr_hist->num_rows()." --</h4>";
				
			#for($a=8; $a<20; $a++){ 
				/*
	              $ano_fim = $a;
	              if(strlen($a) == 1){
	                $ano_fim = "0".$a;
	                
	              }
	              */
	              if($pais == "AU"){

	              	
	              	
	              	#echo "********* ".$nm_horse_confr;
	              	#echo "<br>";
	              		$qr_hist = $this->db->query("SELECT * FROM $tb WHERE selection_name LIKE '%".$nm_horse_confr."%' ");

	              }else{
			            $qr_hist = $this->db->query("SELECT * FROM $tb WHERE selection_id = '".$sel_conf->selection_id."' ");
			        }

				#echo "<h2>".$sel_conf->selection_id." (".$qr_hist->num_rows().")</h2>";
				#return false;
				#echo "<br />";
				if($qr_hist->num_rows() > 0){	
					
					#echo "<h1>".$qr_hist->num_rows()."</h1><br>";
					foreach($qr_hist->result() as $dd_h){
						#print_r($dd_h);
						#$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE event_id = ".$dd_h->event_id." AND selection_id = ".$id_sel."    ");
						$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE  selection_id = ".$id_sel." AND event_id = '".$dd_h->event_id."'  ");

						if($pais == "AU"){

							
							//selection_name
							$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE  selection_name LIKE '%".$nm_horse_principal."%' AND event_id = '".$dd_h->event_id."'  ");

							$qr_nm_principal = $this->db->query("SELECT * FROM $tb WHERE selection_name LIKE '%".$nm_horse_principal."%' ");
							#$qr_nm_principal = $qr_hist->row()->selection_name;
						}
						#return false;

						#echo $qr_sel_comp->selection_name." x ".$dd_h->selection_name;


						#echo $qr_match->num_rows();
						#echo "<br>";
						#echo "<strong>".$dd_h->data_evento." </strong> - ".$dd_h->event_id."";
						#echo "<br>";
						//  MATCH
						if($qr_match->num_rows() > 0){
							#echo "<table border='1' style='width:100%'>";
							if($pais == "AU"){
								#echo "<h2>(((".$qr_match->num_rows().")))</h2>";

								#echo $qr_match->num_rows()." - ".$dd_h->data_evento." - ".$dd_h->menu_hint." <strong>".$nm_horse_principal."</strong> (".$id_sel.") x <strong>".$nm_horse_confr."</strong>   ".$dd_h->event_id;
								#echo "<br />";

								$qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_name LIKE '%".$nm_horse_confr."%' ");

							}else{
								$qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$sel_conf->selection_id."' ");
							}
							$nm_cavalo = $qr_sel->row()->selection_name;
							if($pais == "AU"){
								$nm_cavalo = str_replace($search, $replace, $nm_cavalo);

							}
							$qtd = $qtd + 1;
							$dd_confronto = array(
								'id_mkt' => $id_mkt,
								'id_sel1' => $id_sel,
								
								'nm_sel_1' => $nm_horse_principal,
								'nm_sel_2' => $nm_cavalo,
								'menu' => $dd_h->menu_hint,
								'win' => $dd_h->win_lose,
								'data_hora' => $dd_h->data_evento
								#'nm_sel_1' => $qr_sel->row()->selection_name
							);
							if($pais != "AU"){
								$dd_confronto['id_sel2'] = $sel_conf->selection_id;

								#$nm_horse_confr = str_replace($search, $replace, $nm_cavalo);
								#$dd_confronto['nm_sel_2'] = $nm_horse_confr;
								#$nm_cavalo = $nm_horse_confr;
							}
							#$this->db->where($dd_confronto);
							#$qr_num_sel = $this->db->get('confrontos');
							$qr_num_sel = $this->db->query("SELECT * FROM confrontos WHERE 
								(nm_sel_1 = '".$nm_horse_principal."' AND nm_sel_2 =  '".$nm_cavalo."' AND data_hora = '".$dd_h->data_evento."' ) OR 
								(nm_sel_1 = '".$nm_cavalo."' AND nm_sel_2 =  '".$nm_horse_principal."' AND data_hora = '".$dd_h->data_evento."') ");
							if($qr_num_sel->num_rows() == 0){
								$this->db->insert('confrontos',$dd_confronto);
							}
							

							$dd_sel_where = array(
								#'id_selection' => $id_sel,
								'name' => $nm_cavalo
							);
							$dd_sel_insert = array(
								#'id_selection' => $id_sel,
								'name' => $nm_cavalo
							);
							$this->db->where($dd_sel_insert);
							$qr_num_sel = $this->db->get('selections_horses');
							if($qr_num_sel->num_rows() == 0){
								$this->db->insert('selections_horses' , $dd_sel_insert);
							}

							#echo " - ".$dd_h->event_id." <strong>".$nm_horse_principal."</strong> x <strong>".$nm_cavalo."</strong> (".$qr_match->num_rows().") <br />";
							/*
							echo "<tr>";
								echo "<td style='width:10%'>".$dd_h->data_evento."</td>";
								echo "<td style='width:10%'>".$dd_h->menu_hint."</td>";								
								echo "<td style='width:10%'><strong>".$nm_horse_principal."</strong></td>";
								echo "<td style='width:3%'><strong style='color:blue'>X</strong></td>";
								echo "<td style='width:10%'>".$nm_cavalo."</td>";
								echo "<td style='width:10%'>".$qr_match->num_rows()."</td>";
								echo "<td style='width:10%'>".$qr_hist->num_rows()."</td>";
								echo "<td style='width:10%'>".$dd_h->event_id."</td>";
								echo "<td style='width:10%'>";
								*/
							if($qr_match->row()->win_lose == 0){
								#echo "<span style='color:red'>Lose</span>";
							}else{
								#echo "<span style='color:green'>Winner</span>";
							}
								#echo "</td>";
							#echo "</tr>";
							#echo "</table>";
						} // x num_rows() qr_match
					}
					#echo "Teem<br'>";
				} // x if num_rows()
			#} // x for
				
			}
		}
		#if($qtd == 0){
		#	echo "Nenhum registro encontrado.";
		#}
		echo $qtd;



		#echo "<br>";
		#echo $id_mkt." - ".$id_sel;

	} // x fn

	function matches($id_mkt){
		$this->db->where('id_mkt',$id_mkt);
		$qr_confrontos = $this->db->get('confrontos');
		if( $qr_confrontos->num_rows() > 0 ){
			echo "<table style='width:100%'>";
			/*
			echo "<tr>";
				echo "<th align='center'>Cavalo 1</th>";
				echo "<th align='center'>X</th>";
				echo "<th align='center'>Cavalo 2</th>";
				echo "<th align='center'>Menu Hint</th>";
				echo "<th align='center'>Data/Hora</th>";
				echo "<th align='center'>Venceu</th>";

				echo "</tr>";
				*/
				#echo $qr_confrontos->num_rows();
			foreach($qr_confrontos->result() as $dd){
				#$nm1 = "<strong>n definido</strong>.";
				#$nm2 = "n definido.";
				$nm1 = "";
				$nm2 = "";
				#echo "<br>";
				#print_r($dd);
				#echo "<br>";
				#return false;
				$qr_name_1 = $this->padrao_model->get_by_matriz('name',$dd->nm_sel_1,'selections_horses',1);
				$qr_name_2 = $this->padrao_model->get_by_matriz('name',$dd->nm_sel_2,'selections_horses',1);
				#echo " ---- ".$qr_name_1->num_rows()." -----";
				if($qr_name_1->num_rows() > 0 ){
					$nm1 = $qr_name_1->row()->name;
				}else{
					$qr_mkt1 = $this->padrao_model->get_by_matriz('selection_id',$dd->id_sel1,'odds_mkt_horses',1);
					if($qr_mkt1->num_rows() > 0){
						foreach($qr_mkt1->result() as $nm_sel1){
							$nm1 .= $nm_sel1->selection_name."<br>";
						}
					}else{
						$nm1 = $dd->id_sel1." (".$qr_mkt1->num_rows().")  <br> ".$dd->id_sel2;
					}
				}
				if($qr_name_2->num_rows() > 0 ){
					$nm2 = $qr_name_2->row()->name;
				}
				#$nm2 = $this->padrao_model->get_by_matriz('name',$dd->nm_sel_2,'selections_horses')->row()->name;
				echo "<tr>";
				#echo "<td align='center'>".$dd->id." (".$dd->id.")</td>";
				echo "<td align='center'>".$dd->data_hora."</td>";
				echo "<td align='center'>".$nm1."</td>";
				echo "<td align='center'>X</td>";
				echo "<td align='center'>".$nm2."</td>";
				echo "<td align='center'>".$dd->menu."</td>";
				
				echo "<td align='center'>".$dd->win."</td>";

				echo "</tr>";
			}
			echo "</table>";
		}


	}

	function compara_bk($id_mkt,$id_sel){
		$tb = "corridas_cavalos_2019";
		$qtd = 0;
		$qr_sel_comp = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$id_sel."' ")->row();
		$nm_horse_principal = $qr_sel_comp->selection_name;

		$qr_mkt = $this->db->query("SELECT DISTINCT selection_id  FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND selection_id <> $id_sel ");

		if( $qr_mkt->num_rows() > 1){
			foreach($qr_mkt->result() as $sel_conf ){
				$qr_hist = $this->db->query("SELECT event_id,selection_id FROM $tb WHERE selection_id = '".$sel_conf->selection_id."'");
				
			for($a=8; $a<20; $a++){ 
	              $ano_fim = $a;
	              if(strlen($a) == 1){
	                $ano_fim = "0".$a;
	                
	              }
	              $qr_hist = $this->db->query("SELECT * FROM corridas_cavalos_20$ano_fim WHERE selection_id = '".$sel_conf->selection_id."' ");

				#echo $nm_cavalo." (".$qr_hist->num_rows().")";
				if($qr_hist->num_rows() > 0){
					#echo "<br>";
					foreach($qr_hist->result() as $dd_h){
						$qr_match = $this->db->query("SELECT selection_id,win_lose FROM corridas_cavalos_20$ano_fim WHERE event_id = ".$dd_h->event_id." AND selection_id = ".$id_sel."    ");
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
					#echo "Teem<br'>";
				} // x if num_rows()
			} // x for
				
			}
		}
		if($qtd == 0){
			echo "Nenhum registro encontrado.";
		}



		#echo "<br>";
		#echo $id_mkt." - ".$id_sel;

	}
	// SEPARA DADOS EM TABELAS SEPARADAS
	function importar_ano(){

		$qr = $this->db->query("SELECT * FROM corridas_cavalos_place WHERE data_evento BETWEEN '2019-01-01' AND '2019-12-31' LIMIT 0,20000  ");
		echo $qr->num_rows();
		echo "<br>";
		#print_r($qr->result());
		return false;
		
		foreach($qr->result() as $dd){
			#echo "IOPA 3";
			//return false;
			echo $dd->event_id;
			echo "<br>";
			$this->db->insert('corridas_cavalos_place_2019' , $dd);
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
			$ipmax = $this->input->post('ipmax'); // PPMAX
			/*
			echo count($distancia);
			foreach ($distancia as $dist) {
		        echo "distancias '$dist' </br>";
		    }
			return false;
			*/


			if(strlen($pista) > 2){
				$where .= " AND menu_hint LIKE '%".$pista."%' ";
				$where_dt .= " AND menu_hint LIKE '%".$pista."%' ";
			}
			#echo "<h1> ***** ".count($distancia)."</h1>";
			if(count($distancia) > 0){
				$where .= "AND (";
				$where_dt .= "AND (";
				#$where .= " AND event_name LIKE '%".$distancia."%' ";
				#$where_dt .= " AND event_name LIKE '%".$distancia."%' ";

				$parentese = 0;

				foreach ($distancia as $dist) { $parentese++;
			        #echo "distancias '$dist' </br>";
			        if($_POST['distancia_complemento'] != ""){
			        	if($parentese == 1){
			        		$parent = "(";
			        	}else{
			        		$parent = "";
			        	}
			        	$where .= "$parent event_name LIKE '%".$dist."%' AND event_name LIKE '%".$_POST['distancia_complemento']."%'  OR ";
						$where_dt .= "$parent event_name LIKE '%".$dist."%' AND event_name LIKE '%".$_POST['distancia_complemento']."%' OR ";
			        }else{
				        $where .= "event_name LIKE '%".$dist."%' OR ";
						$where_dt .= "event_name LIKE '%".$dist."%' OR ";
					}
			    }

			    	if($_POST['distancia_complemento'] != ""){
			        	$where .= " event_name LIKE '%".$dist."%' AND event_name LIKE '%".$_POST['distancia_complemento']."%' ))";
						$where_dt .= "event_name LIKE '%".$dist."%' AND event_name LIKE '%".$_POST['distancia_complemento']."%'))";
			        }else{
					    $where .= "  event_name LIKE '%".$dist."%' )";
						$where_dt .= " event_name LIKE '%".$dist."%' )";
					}
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

			if(strlen($ipmax) > 0){
				$where .= " AND ipmax >= $ipmax ";
				$where_dt .= " AND ipmax >= $ipmax ";
			}

			if(strlen($data_de) > 0){
				$data1 = $this->padrao_model->converte_data($data_de);
				$data2 = $this->padrao_model->converte_data($data_ate);

				echo $data1." ".$data2;
				

				#$where .= " AND ( event_dt BETWEEN '$data1 00:00:01' AND  '$data2 23:59:29')";
				$where .= " AND ( data_evento BETWEEN '$data1' AND  '$data2')";
				
				echo "<br>";

				echo $where;
				echo "<BR>";
				#echo $where_dt;

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
			$where_ordem = " ( ordem BETWEEN 0 AND  20 )";
			

			$qr_vencedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 1 LIMIT 0");
			$qr_perdedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 0");

			$qr_datas = $this->db->query("SELECT DISTINCT data_evento FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 0");

			$qr_vencedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 1 LIMIT 0 ");
			$qr_perdedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 0 ");

		}

		#echo $tb;
		#return false;
		$dados['tb'] = $tb;
		
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

		// CORRIGIR ERROS
		$dados['total_green'] = 0;
        $dados['total_red'] = 0;


		$this->load->view('augusto/favoritos', $dados);
		#$this->load->view('augusto/favoritos-bk-25-11-19' , $dados);
	}

	function del_reg(){
		//print_r($_POST);
		echo "<br />";
		foreach($_POST['del_reg'] as $id){
			echo $id;
			echo "<br/>";
			$this->db->where('id',$id);
			$this->db->detele($_POST['tb']);
		}
	}


	function set_data(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_2017 WHERE data_evento IS NULL ORDER BY id asc LIMIT 5000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2019 WHERE data_evento = '0000-00-00' LIMIT 50 ");
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
			if($this->db->update('corridas_cavalos_2017',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}

	function set_data_place(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_2020 WHERE data_evento IS NULL ORDER BY id asc LIMIT 5000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2019 WHERE data_evento = '0000-00-00' LIMIT 50 ");
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
			if($this->db->update('corridas_cavalos_2020',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
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



	////////////////////////// ÇOSTAGEM DISTINCT ////////////////////////////
	function pistas(){
		$qr = $this->db->query("SELECT  DISTINCT menu_hint FROM corridas_cavalos_2019 ORDER BY menu_hint ASC");
		#$qr = $this->db->query("SELECT DISTINCT menu_hint FROM $tb ORDER BY menu_hint asc ");
		foreach($qr->result() as $dd){
			echo $dd->menu_hint."<br />";
		}
	}

	function pistas2(){
		
		$qr = $this->db->query("SELECT DISTINCT local FROM runs_horses ORDER BY nome asc ");
		foreach($qr->result() as $dd){
			echo $dd->local."<br />";
		}
	}

	function distancias(){
		$qr = $this->db->query("SELECT  DISTINCT event_name FROM corridas_cavalos_2019 ORDER BY event_name ASC");
		foreach($qr->result() as $dd){
			echo $dd->event_name."<br />";
		}
	}

	// BOT
	function bot(){
		$this->load->view('augusto/bot');
	}


	###################### GET CONTENTS #####################
	function get_content(){

		// https://www.racingpost.com/racecards/187/leopardstown/2020-03-02/752803
		#$url = file_get_contents('https://www.racingpost.com/racecards/187/leopardstown/2020-03-02/752803');
		#$conteudo = preg_match_all('/table>(.+)</table/s', $url, $conteudo);
		//$exibir = $conteudo[0][0];


		#$url = file_get_contents('https://tradersize.com');
		#$conteudo = preg_match_all('/div>(.+)</div/s', $url, $conteudo);

		$ch = curl_init();
		$timeout = 0;
		curl_setopt($ch, CURLOPT_URL, 'https://www.academiadasapostasbrasil.com/stats/match/brasil/paulista-a1/mirassol/oeste/3186488');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$conteudo = curl_exec ($ch);
		curl_close($ch);


		print_r($conteudo);
		echo "OK";

	}

	// UPLOAD DE ARQUIVO CSV
	function upload(){
		echo ' 
		<form enctype="multipart/form-data" action="'.base_url().'horses/upload" method="POST">
		    <!-- MAX_FILE_SIZE deve preceder o campo input -->
		    <select name="pasta">
		    	<option value="csv_place">GB PLACE</option>
		    	<option value="csv">GB WIN</option>		    	
		    	<option value="csv_ire">IRE WIN</option>
		    	<option value="csv_aus">AUS WIN</option>
		    	<option value="csv_usa">USA WIN</option>

		    	

		    </select>
		    Enviar esse arquivo: <input name="userfile" type="file" />
		    <input type="submit" value="Enviar arquivo" />
		</form>
		';
		if($_FILES){
				$pasta = $_POST['pasta'];
				echo $pasta."<br />";
				$config['upload_path']          = "./$pasta/";
                $config['allowed_types']        = 'csv|xsl';
                $config['max_size']             = 1000;
                #$config['max_width']            = 1024;
                #$config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);

                        #$this->load->view('upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        echo "FOI";

                        #$this->load->view('upload_success', $data);
                }

			/*

			$uploaddir = base_url().'csv_auto/';
			$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

			echo '<pre>';
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploaddir)) {
			    echo "Arquivo válido e enviado com sucesso.\n";
			} else {
			    echo "Possível ataque de upload de arquivo!\n";
			}

			echo 'Aqui está mais informações de debug:';
			print_r($_FILES);

			print "</pre>";

			echo "Tem arquivo";
			*/
		}
	}



	############# TOKEN ################ 
	function token(){
		$cb = "";
		echo "ook";

		if($_POST){
			
			$token = $this->input->post('token');
			$dd_token = array('token' => $token);

			$this->db->where('id','1');
			$this->db->update('token',$dd_token);
			echo "<strong style='color:green'>Token Atualizado com Sucesso!</strong>";
		}


		$dados['cb'] = $cb;
		$this->load->view("augusto/token" , $dados);
	}


	function data(){
		$this->load->model('padrao_model');
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE marketName <> 'AVB' AND data_tratada <> ''  ORDER BY inicio asc LIMIT 5");
		echo "<h1>".$qr->num_rows()."</h1>";
		foreach ($qr->result() as $dd) {
			if($dd->data_tratada != ""){
				$new_data = $this->padrao_model->calc_data($dd->data_tratada);
				echo "<br>";
				echo $dd->data_tratada." ===== ".$new_data;
				echo "<br><hr>";
				
			}
			
			# code...
		}
		echo "OK!";
	}

	function get_avbs(){
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['APP_KEY'] = $APP_KEY;
		$dados['SESSION_TOKEN'] = $SESSION_TOKEN;
		$avbs = $this->betfront_model->get_avbs($APP_KEY,$SESSION_TOKEN);
		$vez = 0;
		#print_r($avbs);
		foreach($avbs as  $dd){ $vez++;
			$mkt_name  = $dd->marketName;
			$id_mkt  = $dd->marketId;

			$this->db->where('marketId',$id_mkt);
			$qr_verifica = $this->db->get('runs_horses');
			if($qr_verifica->num_rows() == 0 ){
				$dd_insert = array(
					'marketId' => $id_mkt,
					'marketName' => "AVB",
					'countryCode' => "AV",
					#'vez' => $vez,
					'status' => 0
				);
				$this->db->insert('runs_horses' , $dd_insert);
				#echo "<h1>".$mkt_name." : ".$id_mkt." INSERIDO ******** </h1>";
				#print_r($dd->runners);
				foreach ($dd->runners as $runner) {
					$selection_name = $runner->runnerName;
					$selection_id = $runner->selectionId;
					$dd_sel = array(
						'id_mkt' => $id_mkt,
						'selection_id' => $selection_id,
						'selection_name' => $selection_name
					);
					$this->db->where($dd_sel);
					$qr_tem_sel = $this->db->get('selections_avb');
					if($qr_tem_sel->num_rows() == 0){
						$this->db->insert('selections_avb' , $dd_sel);
						#echo "<h2>".$selection_name."</h2>";
					}
					
				}
				#echo "<hr />";
			}else{
				#echo "<h1>".$mkt_name." : ".$id_mkt." Ja tem </h1>";
			}

			
			#echo "<br />";
			#print_r($dd);
			#echo "<br /><hr>";
			
		}
		// COM LIMITE
		#$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId asc LIMIT 5,10");
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId asc");
		echo $qr->num_rows();
		echo "<br>";
		#return false;
		$del = 0;
		if($qr->num_rows() > 0){ 
			#$this->db->query("DELETE FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId asc LIMIT 3,10 ");
		
			foreach($qr->result() as $run ){ $del++;
				echo "<h5>".$run->marketId." (".$run->id.") </h5>";
				if($del > 4){
					$this->db->query("DELETE FROM runs_horses WHERE id = ".$run->id."");
				}else{
					$new_vez = array('vez' => $del);
					$this->db->where('id',$run->id);
					$this->db->update('runs_horses' , $new_vez);
				}
			}
		}


		#print_r($avbs);
	}

	function avb_fila(){
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId;");
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){
				echo $dd->marketId;
				echo "<br>";
			}
		}
	}

	function win_fila(){
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode <> 'AV'  AND status = 1 ORDER BY marketId;");
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){
				echo $dd->marketId;
				echo "<br>";
			}
		}
	}


	#####################  BSP
	function get_bsp($id_mkt){
		$ordena = false;;
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		echo "<h1>".$id_mkt."</h1>";

		$t = 0; foreach ($this->betfront_model->getMarketBook_bsp($APP_KEY, $SESSION_TOKEN,$id_mkt)  as $key => $run) { $t++;

			if($key == "status"){
				#echo $run->status;
				#echo "<br />";
			}
			#echo $key." : ".$run;

			#if($key == "marketId"){
				#$id_mkt = $run->marketId;
			#}
			$cont_bt_estr = 0;
			if($key == "runners"){

				foreach($run as $dd){
					#print_r($dd);
					#echo "<span>".$dd->selectionId."</span>";
					if(isset($dd->sp)){
						#echo "<p>Tem - </p>";
						foreach($dd->sp as $sp){
							#echo "<br> ---- ";
							$where_sp = array(
								'id_mkt' => $id_mkt,
								'selection_id' => $dd->selectionId								
							);

							$this->db->where($where_sp);
							$qr_verifica = $this->db->get("selections_bsp");
							if($qr_verifica->num_rows() == 0){
								$dd_sp = array(
									'id_mkt' => $id_mkt,
									'selection_id' => $dd->selectionId,
									'bsp' => round($sp,2)
								);
								$this->db->insert('selections_bsp',$dd_sp);
							}else{
								$bsp_reg = $qr_verifica->row()->bsp;
								$ordem_reg = $qr_verifica->row()->ordem;
								if($bsp_reg > 0){
									$ordena = true;
									#echo "<strong style='color:red'>".$bsp_reg." (".$ordem_reg.") BSP gerado</strong>";

									if($ordem_reg > 0 && $cont_bt_estr == 0){
										echo "<a class='btn btn-danger' href='https://thrmovers.com/horses/estrategias/".$id_mkt."/1/1' target='_blank'>Estratégias LAY</a> ";
										echo " <a class='btn btn-primary' href='https://thrmovers.com/horses/estrategias/".$id_mkt."/1/0' target='_blank'>Estratégias BACK</a>";
										echo "<br>";
										$cont_bt_estr++;
									}

									// VERIFICA ESTRATÉGIA
									$qr_estrategia = $this->db->query("SELECT * FROM corridas_cavalos_2020 WHERE (bsp BETWEEN 1 AND 4) AND ordem = 1 ");
									#echo "<p style='color:green'>QTD Estrategia: ".$qr_estrategia->num_rows()."</p>";
								}
								$bsp_sp = array(
									'bsp' => round($sp,2),									
								);
								#echo "<h1>".$sp['actualSP']."</h1>";
								#echo "<br++++++ ";
								#print_r($sp);
								#echo "<br++++ ";
								//$sp['actualSP']
								if(isset($sp[0]->backStakeTaken->actualSP)){
									echo "<h1>".$sp[0]->backStakeTaken['actualSP']." *****</h1>";
									$bsp_sp['status'] = '1';
 								}
								$this->db->where($where_sp);
								$this->db->update('selections_bsp',$bsp_sp);
							}
							#print_r($sp);
							#echo "<p>BSP: <strong> ".$sp[0]->price."</strong></p>";
							#echo "<hr>";
						}
						#echo "<p>ID MKT: ".$id_mkt."  ID SEL: <strong>".$dd->selectionId."</strong> BSP: <strong> ".$sp[0]->price."</strong></p>";
						if($sp[0]->price < 1000 AND $sp[0]->price > 0){
							$dd_sp = array(
								'id_mkt' => $id_mkt,
								'selection_id' => $dd->selectionId,
								'bsp' => round($sp[0]->price,2)
							);
							#$this->db->insert('selections_bsp',$dd_sp);get_cavalo
						}
						
					}
					#echo "<h1>".$dd['selectionId']."</h1>";
					#print_r($dd);
					#echo "<br><hr>";
				}
			}

			#print_r($run);
			#echo "<br />";


		}
		if($cont_bt_estr == 0){
				echo "Aguardando...";
			}
		if($ordena == true){
			$this->set_ordem_bsp($id_mkt);
		}
	}

	function set_ordem_bsp($id_mkt){
		$this->db->where('id_mkt',$id_mkt);
		$this->db->order_by("bsp","asc");
		$qr = $this->db->get("selections_bsp");
		$ordem = 0;
		foreach($qr->result() as $dd){ 

			if($dd->bsp > 0){
				$ordem++;
				$dd_ordem = array('ordem' => $ordem);
				$this->db->where('id',$dd->id);
				$this->db->update('selections_bsp' , $dd_ordem);
			}
			#print_r($dd);
			#echo "<br /><hr />";

		}
	}

	function get_cavalos_bk($pais="gb",$ano="2020"){
		if($pais == "gb"){
			$tb = "corridas_cavalos_".$ano;			
		}else{			
			$tb = "corridas_cavalos_".$pais."_".$ano;
		}
		#$qr = $this->db->query("SELECT DISTINCT selection_name,id FROM $tb LIMIT 1032 ");
		$qr = $this->db->query("SELECT DISTINCT selection_name FROM $tb ORDER BY selection_name asc ");
		echo "<h1>".$qr->num_rows()."</h1>";
		echo "<h4>".$tb."</h4>";
		echo "<br />";
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){

				$numeros = array("1. ", "2. ", "3. ", "4. ", "5. ", "6. ", "7. ", "8. ", "9. ", "10. ","11. ","12. ","13. ","14. ","15. ","1.", "2.", "3.", "4.", "5.", "6.", "7.", "8.", "9.", "10.","11.","12.","13.","14.","15.");
				$name_trat = str_replace($numeros, "", $dd->selection_name);

				echo $dd->selection_name." - ".$name_trat;
				echo "<br>";
				
				
				$this->db->where('name',$name_trat);
				$qr_veri = $this->db->get("selections_horses_names");
				if($qr_veri->num_rows() == 0){
					$dd_sel = array(
						'name' => $name_trat,
						'pais' => $pais
					);
					$this->db->insert("selections_horses_names",$dd_sel);
				}
				
				
			}
		}



	}

	function get_cavalos($pais="todos",$ano="2020"){
		if($pais == "gb"){
			$tb = "corridas_cavalos_".$ano;			
		}else{			
			$tb = "corridas_cavalos_".$pais."_".$ano;
		}
		#$qr = $this->db->query("SELECT DISTINCT selection_name,id FROM $tb"); // insert do CSV para  selections_horses_names
		$qr = $this->db->query("SELECT DISTINCT name FROM selections_horses_names WHERE pais = '$pais' ORDER BY name asc  ");

		if($pais == "todos"){
			$qr = $this->db->query("SELECT DISTINCT name FROM selections_horses_names ORDER BY name asc  ");
		}
		echo "<h1>".$qr->num_rows()."</h1>";
		echo "<h4>".$tb." $pais</h4>";
		echo "<br />";
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){

				$numeros = array("1. ", "2. ", "3. ", "4. ", "5. ", "6. ", "7. ", "8. ", "9. ", "10. ","11. ","12. ","13. ","14. ","15. ","1.", "2.", "3.", "4.", "5.", "6.", "7.", "8.", "9.", "10.","11.","12.","13.","14.","15.");
				#$name_trat = str_replace($numeros, "", $dd->selection_name);
				$name_trat = str_replace($numeros, "", $dd->name);

				#echo $name_trat;
				echo $dd->name;
				echo "<br>";
				// INSERT NOS CAVALOS
				/*
				$this->db->where('name',$name_trat);
				$qr_veri = $this->db->get("selections_horses_names");
				if($qr_veri->num_rows() == 0){
					$dd_sel = array(
						'name' => $name_trat,
						'pais' => $pais
					);
					$this->db->insert("selections_horses_names",$dd_sel);
				}
				*/
				
				
				
			}
		}



	}


	function import_csv_thrpost(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'thrpost/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		foreach ($directory as $file) { $cont++;
		 
		    echo $file->getFileName();
		    echo "<br>";
		    #return false;

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			$var3_1 = "";
			$var3_2 = "";
			$var3_3 = "";
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
				          	$dd_insert['cavalo'] = str_replace("---", "", $data[$col]);
				          }
				          if($cont_cel == 2){
				          	$dd_insert['data'] = $data[$col];
				          }
				          if($cont_cel == 3){

				          	$var3 = explode(" ", $data[$col]);
				          	$dd_insert['pista'] = $var3[0];
				          	$count_ex = count($var3);
				          	echo "<span style='color:green'>".$data[$col]."</span> <strong> [".$count_ex."]<br />";
				          	if($count_ex == 3){
					          	$meio = $var3[1];
					          	$sigla1 = substr($meio,0,2);
					          	$sigla2 = substr($var3[1],2,10);
					          	#$dd_insert['premio'] = $var3[2];
					          	$dd_insert['premio'] = $var3[2];
					        }
					        if($count_ex > 3){
					          	$meio = $var3[2];
					          	$sigla1 = substr($meio,0,2);
					          	$sigla2 = substr($var3[3],2,10);
					          	#$count_ex2 = $count_ex-1;
					          	#$dd_insert['premio'] = $count_ex2;
					          	$dd_insert['premio'] = $var3[$count_ex-1];
					        }
				          	$dd_insert['classe'] = $sigla1;
				          	$dd_insert['tipo'] = $sigla2;
				          	#echo "<h2 color:red>".$var3[$count_ex-1]." **** </h2>";

				          	if(strlen($dd_insert['pista']) > 5 ){
				          		$var3_ = explode(" ", $var3[0]);
				          		$pista = $var3_[0];

				          		#$dd_insert['tipo'] = $sigla2;
					          	#$dd_insert['premio'] = $var3_[2];
					          	echo "<h5>QTD VAR".count($var3_)."</h5>";
					          	echo "<p style='color:red'>Pista: ".$pista."  </h2>";
					          	echo "<p style='color:red'>Premio: ".$var3_[2]."  </h2>";
					          	echo "<p style='color:red'>Classe: ".$sigla1."</p>";
					          	echo "<p style='color:red'>Tipo: ".$sigla2."</p>";

				          	}

				          	
				          	


				          	
				          	#$dd_insert['class'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['distancia'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['going'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	$posicoes = explode("-", $data[$col]);
				          	$dd_insert['peso'] = $data[$col];
				          	#$dd_insert['p1'] = $posicoes[0];
				          	#$dd_insert['p2'] = $posicoes[1];
				          }

				          // ---------------------------
				          if($cont_cel == 7){
				          	$var4 = explode(" ", $data[$col]);
				          	$barra1 = $var4[0]; 
				          	$barra_expl = explode("/", $barra1);
				          	$dd_insert['classificacao'] = $barra_expl[0];
				          	$dd_insert['corredores'] = $barra_expl[1];
				          	#$dd_insert['tipo'] = $var4[1];
				          	$dd_insert['posicionamento'] = $var4[1]." ".$var4[2];
				          	#$dd_insert['info_adicional'] = str_replace($var4[0]." ".$var4[1], "", $data[$col]);
				          	$dd_insert['info_adicional'] = str_replace($var4[0]." ".$var4[1]." ".$var4[2]." ", "", $data[$col]);
				          	#$dd_insert['n2'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	$dd_insert['odd'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['jockey'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['or'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['ts'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	$dd_insert['rpr'] = $data[$col];
				          }
				          /*
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
				          */
				          // nomeia o arqvuivo font
				          $dd_insert['arq'] = $file->getFileName();
				          
				      }
			         
			          echo 'Linha: '.$row.' e na Coluna <b>'.$cont_cel.'</b> ===== '.$data[$col] . "  -  <br />\n";
			          #echo "Linha: '.$row.' e na Coluna:  ($col - <b>$cont_cel</b>) ";
			         
			          if($cont_cel == 12){
			          	echo "<br>REG: <b>$reg</b><hr>";
			          	if($reg > 0 && $dd_insert['selection_name'] != '------------------------------') {
			          		echo "<br />";
			          		echo "<p style='color:blue'>";
			          		print_r($dd_insert);
			          		echo "</p>";
			          		echo "<br />";
			          		$where_insert = array(
			          			'cavalo' => $dd_insert['cavalo'],
			          			'data' => $dd_insert['data']
			          		);
			          		$this->db->where($where_insert);
			          		$qr_insert = $this->db->get('cavalos_hist');
			          		if($qr_insert->num_rows() == 0){
			          			$this->db->insert('cavalos_hist' , $dd_insert);
			          		}
				          	#$this->db->insert('corridas_cavalos_2020' , $dd_insert);
				          	#unlink($path."".$file->getFileName());
				        }


			          	$cont_cel = 0;
			          	$reg++;
			          	if(empty($dd_insert['ts'])){
			          		
				          	echo "<h2> Days Break  </h2>";	
				          #}else{
				          
				          }

				          print_r($dd_insert);

				          	echo "<br />";
				          	array_shift($dd_insert);

				          echo "<br><hr>";
			          	
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

	######################IMPORTAR CAVALOS EXCLUSAO ###############

	function upload_exclusao(){
		echo ' 

		<form action="'.base_url().'horses/set_import" method="post" enctype="multipart/form-data">
        		<input type="hidden" name="id_user" value="27" />
            	<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Seleciona o Arquivo .txt</label>
				  <div class="col-sm-10">
					<input type="file" name="arqTxt" class="form-control" />
				  </div>
				</div>
				
				<div class="form-group row">
				  <label for="example-text-input" class="col-sm-2 col-form-label">Defina o Separador *</label>
				  <div class="col-sm-10">
					  <input type="text" name="separador"  value="," class="form-control" size="1" maxlength="1"/>
					   
				  </div>
					
				</div>
					
				
					
				<div class="box-footer">
					<button type="reset" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn btn-info pull-right">Salvar</button>
				  </div>	
				</form>	


		';
	}
	function set_import(){
	
	if(isset($_FILES["arqTxt"])) {
	
      // copia o arquivo
		#echo "OK";
		#return false;

      $erro = $config = array();



      // Prepara a variável do arquivo

      $arquivo = isset($_FILES["arqTxt"]) ? $_FILES["arqTxt"] : FALSE;



      // Tamanho máximo do arquivo (em bytes)

      $config["tamanho"] = 906883;





      // Formulário GETado... executa as ações

      if ($arquivo) {
		  


          // Imprime as mensagens de erro

          if (sizeof($erro)) {

            foreach ($erro as $err) {

                echo " - " . $err . "<BR>";

            }

            //echo "<a href=\"arquivos/upload.php\">Fazer Upload de Outro arquivo</a>";

          } else {

             // Verificação de dados OK, nenhum erro ocorrido, executa então o upload...

             // Pega extensão do arquivo

             preg_match("/\.(txt|xls|csv){1}$/i", $arquivo["name"], $ext);



             // Gera um nome único para a imagem

             $imagem_nome = md5(uniqid(time())) . "." . $ext[1];

             

             // Caminho de onde a imagem ficará

             $imagem_dir = "csv/" . $imagem_nome;



             // Faz o upload da imagem

             $teste = move_uploaded_file($arquivo["tmp_name"], $imagem_dir);



	         

	         // ler arquivo
			  #echo $imagem_dir;
			  #return false;
		 	 $ler = fopen($imagem_dir, "r");

			
			  
			 

			  #######################################
			  //print_r($dds);
		 	 $cont = 0;
			 while ($valores = fgetcsv($ler, 2048, $_POST["separador"])) { $cont++;
				 
				$qtd_dados = count($valores);                #
			  
				if($qtd_dados > 1){                          #

			 	$nome = str_replace('\'','',$valores[1]);    #

				}else{				                         # ADD por igor

					$nome = "";                              #

				}                                        #

					

				$cavalo = str_replace('\'','',$valores[0]); 
				$numeros = array("1. ", "2. ", "3. ", "4. ", "5. ", "6. ", "7. ", "8. ", "9. ", "10. ","11. ","12. ","13. ","14. ","15. ","1.", "2.", "3.", "4.", "5.", "6.", "7.", "8.", "9.", "10.","11.","12.","13.","14.","15.","1", "2", "3", "4", "5", "6", "7", "8", "9", "10","11","12","13","14","15");

				// Lucie Manette 

				$name_trat = str_replace($numeros, "", $cavalo);

				$this->db->where('name',$name_trat);
				$qr = $this->db->get('selections_horses_names');
				#$qr = $this->db->query("SELECT * FROM selections_horses_names WHERE name LIKE '%".$name_trat."%' ");
				echo $name_trat;
				echo " (".$qr->num_rows().")";
				echo "<br>";
				if($qr->num_rows() > 0){
					$this->db->where('name',$name_trat);
					$qr = $this->db->delete('selections_horses_names');
				}
				

				} // x if rw

			 }

             

			 	    

			 fclose($ler);

			 // fim

	          }

		  

	     }

		  echo "<h1>$cont</h1>";
		#redirect('adm/contatos_cat/'.$_POST['categoria']);

	} // x fn

	function get_cavalos_dia($dia=""){
		if($dia == ""){
			$dia = date("Y-m-d");
		}

		$this->db->where('data_corrida',$dia);
		$qr_dia = $this->db->get('selections_horses');
		$qr_dia = $this->db->query("SELECT * FROM selections_horses WHERE data_corrida = '$dia' AND (pais = 'IE' OR pais = 'GB' ) ");
		echo "<strong>".$qr_dia->num_rows()." </strong> Cavalos na data <strong> ".$dia."</strong>";
		echo "<br>";		
		echo "<br><hr />";
		if($qr_dia->num_rows() > 0){
			foreach($qr_dia->result() as $dd){
				echo $dd->name;
				echo "<br />";
			}
		}
	}


	function get_cavalos_avb($dia=""){
		if($dia == ""){
			$dia = date("Y-m-d");
		}

		#$this->db->where('data_corrida',$dia);
		#$qr_dia = $this->db->get('selections_horses');

		$qr_data = $this->db->query("SELECT DISTINCT data FROM selections_avb ORDER BY data desc ");


		foreach($qr_data->result() as $data){

				echo "<h2>".$qr_data->num_rows()."  ".$data->data."</h2>";

				$qr_dia = $this->db->query("SELECT * FROM selections_avb WHERE data = '".$data->data."' AND odd > 0 AND selection_name <> '' ");
				echo "<h4>".$qr_dia->num_rows()." </strong> Cavalos AVB na data  ".$dia."</h4>";
				echo "<br>";		
				#echo "<br><hr />";
				if($qr_dia->num_rows() > 0){
					$br = 0;
					foreach($qr_dia->result() as $dd){ $br++;

						$divisao = $br % 2;
						
						
						echo $dd->id_mkt." - ";
						echo "<strong>";
						echo $dd->selection_name;
						echo "</strong>";
						echo " - ";
						echo "<strong>";
						echo "@".$dd->odd;
						echo "</strong>";
						echo " - ";
						echo $dd->percentual."%";
						if($divisao == 0){
							echo "<br /><br />";
						}else{
							echo "<br />";
						}
					}
				}

				echo "<br><hr />";

			}
		}

############## REMANAJAMENTO DOS CAVALOS #########

function move_horses(){
	#$qr = $this->db->query("SELECT DISTINCT(selection_name)  FROM corridas_cavalos_gb LIMIT 10");
	#$qr = $this->db->query("SELECT DISTINCT(selection_name)  FROM corridas_cavalos_ire");
	$qr = $this->db->query("SELECT *  FROM selections_horses_migracao WHERE pais = 'IE' AND foi = 0 ORDER BY name asc LIMIT 500");
	#echo $qr->num_rows();
	#echo "<br />";
	$tem = 0;
	$n_tem = 0;
	foreach($qr->result() as $dd){
		echo $dd->name;
		echo "<br />";
		$dd_insert = array( 'name' => $dd->name , 'pais' => 'IE' );
		#$dd_insert = array( 'name' => $dd->selection_name , 'pais' => 'IE' );
		$this->db->where($dd_insert);
		$qr_row = $this->db->get("selections_horses");
		if($qr_row->num_rows() == 0){
			$n_tem++;
			$dd_insert_csv = array( 'name' => $dd->name , 'pais' => 'IE' , 'csv' => 1);
			$this->db->insert("selections_horses" , $dd_insert_csv);


		}else{
			$tem++;
		}

		$dd_up = array('foi' => 1);
		$this->db->where($dd_insert);
		$this->db->update("selections_horses_migracao" , $dd_up);

		#$this->db->insert("selections_horses_migracao" , $dd_insert);
	}

	echo "<h3>Tem: $tem</h3>";
	echo "<h3>Não Tem: $n_tem</h3>";
}
	
	
}
