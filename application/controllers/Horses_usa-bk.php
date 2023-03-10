<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horses_usa extends CI_Controller {

	
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

	function confronto_sel($id_selection){

	}

	function compara($id_mkt,$id_sel,$ano){
		$tb = "corridas_cavalos_$ano";
		echo $tb;
		echo "<br />";
		$qtd = 0;
		$qr_sel_comp = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$id_sel."' ")->row();
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

				echo "<h2>".$sel_conf->selection_id." (".$qr_hist->num_rows().")</h2>";
				#return false;
				echo "<br />";
				if($qr_hist->num_rows() > 0){	
					#echo "<br>";
					foreach($qr_hist->result() as $dd_h){
						#print_r($dd_h);
						#$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE event_id = ".$dd_h->event_id." AND selection_id = ".$id_sel."    ");
						$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE  selection_id = ".$id_sel." AND event_id = '".$dd_h->event_id."'  ");
						//  MATCH
						if($qr_match->num_rows() > 0){
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
								echo "<td style='width:10%'>".$qr_match->num_rows()."</td>";
								echo "<td style='width:10%'>".$qr_hist->num_rows()."</td>";
								echo "<td style='width:10%'>".$dd_h->event_id."</td>";
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
		echo $qtd;



		#echo "<br>";
		#echo $id_mkt." - ".$id_sel;

	} // x fn

	function compara_qtd($id_mkt,$id_sel,$ano){
		$tb = "corridas_cavalos_$ano";
		#echo $tb;
		#echo "<br />";
		$qtd = 0;
		$qr_sel_comp = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$id_sel."' ")->row();
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

				#echo "<h2>".$sel_conf->selection_id." (".$qr_hist->num_rows().")</h2>";
				#return false;
				#echo "<br />";
				if($qr_hist->num_rows() > 0){	
					#echo "<br>";
					foreach($qr_hist->result() as $dd_h){
						#print_r($dd_h);
						#$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE event_id = ".$dd_h->event_id." AND selection_id = ".$id_sel."    ");
						$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE  selection_id = ".$id_sel." AND event_id = '".$dd_h->event_id."'  ");
						//  MATCH
						if($qr_match->num_rows() > 0){
							#echo "<table border='1' style='width:100%'>";
							$qtd = $qtd + 1;
							$qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$sel_conf->selection_id."' ");
							$nm_cavalo = $qr_sel->row()->selection_name;

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

	function compara_bk($id_mkt,$id_sel){
		$tb = "corridas_cavalos_2018";
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

		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2018");
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
			$tb = "corridas_cavalos_2018";
			$where_ordem = " ( ordem BETWEEN 0 AND  20 )";
			

			$qr_vencedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 1 LIMIT 10");
			$qr_perdedores = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 10");

			$qr_datas = $this->db->query("SELECT DISTINCT data_evento FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 10");

			$qr_vencedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 1 LIMIT 10 ");
			$qr_perdedores_total = $this->db->query("SELECT count(id) as tudo FROM $tb WHERE $where_ordem AND win_lose = 0 LIMIT 10 ");

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

	########################## IMPORTAÇÃO DE ARQUIVOS CSVs ############################

	function csv(){
		$meuArray = Array();
	
		// MANUPUILANDO DIRETORIOS		
		$path = 'csv_usa/';
		
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
				          	$this->db->insert('corridas_cavalos_usa_2020' , $dd_insert);
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
		$path = 'csv_usa_place/';
		
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
				          	$this->db->insert('corridas_cavalos_ire_place_2019' , $dd_insert);
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
		$qr_distinct = $this->db->query("SELECT DISTINCT event_id FROM corridas_cavalos_usa_2020 WHERE ordem = 0 LIMIT 500");
		echo "<h1>".$qr_distinct->num_rows()."</h1>";
		if($qr_distinct->num_rows() > 0){
			foreach($qr_distinct->result() as $corrida){
				$this->db->where('event_id',$corrida->event_id);
				$this->db->order_by('bsp','asc');
				$qr_horses = $this->db->get('corridas_cavalos_usa_2020');
				if($qr_horses->num_rows() > 0){
					$numero = 0;
					echo "<ul>";
					foreach($qr_horses->result() as $horse){ $numero++;
						$dd_numero = array(
							'ordem' => $numero
						);
						$this->db->where('id',$horse->id);
						$this->db->update('corridas_cavalos_usa_2020',$dd_numero);
						echo "<li> (<b>$numero</b>) ".$horse->selection_id." - ".$horse->selection_name." <strong> @".$horse->bsp." </strong> </li>";
					}
					echo "</ul>";
				}
			}
		}
		echo "<br />";
		echo "OK";
	}

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


	function set_data(){
		#echo "OK!";
		#return false;
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_usa_2020 WHERE data_evento IS NULL ORDER BY id asc LIMIT 5000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2018 WHERE data_evento = '0000-00-00' LIMIT 50 ");
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
			if($this->db->update('corridas_cavalos_usa_2020',$dd_data)){
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
		$qr = $this->db->query("SELECT * FROM corridas_cavalos_place_2020 WHERE data_evento IS NULL ORDER BY id asc LIMIT 5000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos WHERE datahora_evento IS NULL AND (data_evento BETWEEN '2019-01-01' AND '2019-12-31')   ORDER BY data_evento desc LIMIT 50000 ");
		#$qr = $this->db->query("SELECT * FROM corridas_cavalos_2018 WHERE data_evento = '0000-00-00' LIMIT 50 ");
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
			if($this->db->update('corridas_cavalos_place_2020',$dd_data)){
				echo "foooooi";
			}else{
				echo "naaaaaaaao";
			}
		}
		echo $qr->num_rows();
	}


	

	
}
