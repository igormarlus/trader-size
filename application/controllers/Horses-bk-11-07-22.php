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

	function hist($qtd=300){
		
		$dados['qtd'] = $qtd;

		#echo $qtd;
		#return false;


		#$qr_run = $this->db->query("SELECT * FROM cavalos_hist WHERE event_id <> '303' AND event_id <> '0'  ORDER BY id desc LIMIT $qtd ");
		$qr_run = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE event_id <> '303' AND event_id <> '0'  ORDER BY id desc LIMIT $qtd ");

		$dados['qr_run'] = $qr_run;
		$this->load->view('augusto/cavalos_hist', $dados);
	} // x fn

	function dd_hist($id_mkt){

		#$this->db->where('id',$id);
		#$qr_id = $this->db->get('cavalos_hist');
		#$hora = $qr_id->row()->hora; 
		#$id_evento = $qr_id->row()->event_id; 
		#echo $qr->num_rows();

		#$where_qr = array('event_id' => $id_evento , 'hora' => $hora);
		$where_qr = array('id_mkt' => $id_mkt);
		$this->db->where($where_qr);
		#$qr = $this->db->get('cavalos_hist');
		#$qr = $this->db->get('cavalos_hist_dia');
		$qr = $this->db->get('cavalos_hist');

		$id_evento = $qr->row()->event_id;
		$dados['qr_run'] = $qr;



		####################3 DEFINE PLACE
		$qtd_horses = $qr->num_rows();
		$win_place = 0;

		if($qtd_horses < 6){
			$classificacao_win_max = 2;
			$classificacao_win_min = 0;
		}
		if($qtd_horses == 6){
			$classificacao_win_max = 3;
		}
		if($qtd_horses > 6 && $qtd_horses <= 14){
			$classificacao_win_max = 4;
		}
		if($qtd_horses >= 15 && $qtd_horses <= 19){
			$classificacao_win_max = 5;
		}
		if($qtd_horses > 19 && $qtd_horses < 24){
			$classificacao_win_max = 6;
		}
		if($qtd_horses >= 24){
			$classificacao_win_max = 7;				
		}
		$win_place = $classificacao_win_max;
		$dados['win_place'] = $win_place;
		#################### X DEFINE PLACE

		#print_r($qr);


		#echo $id_evento;


		#echo "OK 5";
		#return false;
		$this->load->view('augusto/run_hist', $dados);

	}
	

	function lista_jockey_treiner_null(){

		#$this->db->where('id',$id);
		#$qr_id = $this->db->get('cavalos_hist');
		#$hora = $qr_id->row()->hora; 
		#$id_evento = $qr_id->row()->event_id; 
		#echo $qr->num_rows();

		#$where_qr = array('event_id' => $id_evento , 'hora' => $hora);
		$where_qr = array('id_mkt' => $id_mkt);
		$this->db->where($where_qr);
		$qr = $this->db->get('cavalos_hist');

		#$qr = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE  (data_trat  >= '".date('Y-m-d')."') AND jockey = 'Sem Jockey' OR treinador = 'Sem treinador' OR  jockey IS NULL OR  treinador IS NULL  ");

		$qr = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE  data_trat  >= '".date('Y-m-d')."' AND (jockey = 'Sem Jockey' OR treinador = 'Sem treinador' OR  jockey IS NULL OR  treinador IS NULL);");


		echo "<h1>".$qr->num_rows()."</h1>";
		echo "<br>";
		foreach($qr->result() as $dd){
			$where = array(
				'cavalo' => $dd->cavalo,
				'id_mkt' => $dd->id_mkt
			);
			$this->db->where($where);
			$qr_ver = $this->db->get("runs_dd_horses_dia");
			if($qr_ver->num_rows() > 0){
				$dd_ver = $qr_ver->row();
				$dd_up_hist = array(
					'jockey' => $dd_ver->JOCKEY_NAME,
					'treinador' => $dd_ver->TRAINER_NAME
				);
				$this->db->where('id',$dd->id);
				$this->db->update('cavalos_hist_dia' , $dd_up_hist);
				echo "<br />";
				print_r($qr_ver->row());
				echo "<br />";
			}
			echo "<h2>".$dd->cavalo." (".$qr_ver->num_rows().")</h2>";
			print_r($dd);
			
			echo "<br>";
		}

		#$qr_jockey = $this->db->query("SELECT DISTINCT jockey FROM cavalos_hist_dia");
		#$qr_treinador = $this->db->query("SELECT DISTINCT treinador FROM cavalos_hist_dia");

		//$id_evento = $qr->row()->event_id;
		$dados['qr_run'] = $qr;
		$dados['qr_jockey'] = $qr_jockey;
		$dados['qr_treinador'] = $qr_treinador;

		#print_r($qr);


		#echo $id_evento;


		#echo "OK 5";
		#return false;
		#$this->load->view('augusto/lista_jockey_treiner_null', $dados);

		$n = 11;
		$status_checkin = array('status' => 1);
		$this->db->where('id',$n);
		$this->db->update('cron_checkin' , $status_checkin);

	}

	function set_jockey_treinador(){
		#print_r($_POST);
		#echo "<br>";

		$qr_run = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE  jockey = 'Sem Jockey' OR treinador = 'Sem treinador' OR  jockey IS NULL");

		foreach($qr_run->result() as $run){
			$p_j = $this->input->post("j".$run->id);
			$p_t = $this->input->post("t".$run->id);
			if(strlen($p_j) > 1 || strlen($p_t) > 1){
				$dd_up = array(
					'jockey' => $p_j,
					'treinador' => $p_t
				);
				$this->db->where('id',$run->id);
				$this->db->update('cavalos_hist_dia' , $dd_up);

				// cavalos_dia
				#echo $run->id."  (".strlen($p_j).") <br>";
			}

		}

		redirect("horses/lista_jockey_treiner_null");
		
	}

	function set_hist_dia_em_hist(){
		#echo "OK 1";
		#$qr = $this->db->query("select * from cavalos_hist_dia where (data_trat BETWEEN '".date("Y-m-d")."00:00:01' AND '".date("Y-m-d")."23:59:59') ");
		#$qr = $this->db->query("select * from cavalos_hist_dia where data_trat = '".date("Y-m-d")."'");
		
		echo date("Y-m-d");
		echo "<br />";
		echo "<br />";
		$qr = $this->db->query("select * from cavalos_hist_dia where data_trat >= '".date("Y-m-d")."'");

		#$qr = $this->db->query("select * from cavalos_hist_dia where id_mkt >= '1.185748714'");

		
		#$qr = $this->db->query("select * from cavalos_hist_dia where data_trat = '2021-07-20'");

		echo $qr->num_rows();
		echo "<br />";
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){
				$where_hist = array(
					'data_trat' => $dd->data_trat,
					'cavalo' => $dd->cavalo
				);
				$this->db->where($where_hist);
				$qr_hist = $this->db->get('cavalos_hist_dia');

				$dd_sincr = array(
					
					'id_mkt' => $dd->id_mkt,
					'tipologia' => $dd->tipologia,
					'idade' => $dd->idade,
					'premio' => $dd->premio,
					'classe' => $dd->classe,
					'going' => $dd->going,
					'jockey' => $dd->jockey,
					'treinador'  => $dd->treinador
				);
				// if going != ""{ n faz nada }
				$this->db->where($where_hist);
				$qr_ver_g = $this->db->get('cavalos_hist' , $dd_sincr);

				if($qr_ver_g->num_rows() == 0){
					unset($dd->id);
					$this->db->insert('cavalos_hist' , $dd);
				}else{
					$going = $qr_ver_g->row()->going;
					if($going == ""){
					$this->db->where($where_hist);
						$this->db->update('cavalos_hist' , $dd_sincr);
					}
				}
				
				
				echo "<h1>".$dd->cavalo."</h1>";

				echo "<h2 style='color:red'>".$qr_hist->num_rows()."</h2>";
				echo "<p>";
				print_r($dd);
				echo "</p>";
				echo "<br />";
				echo "<p>";
				echo "<strong>Classe:".$dd->classe."</strong><br>";
				echo "<strong>going:".$dd->going."</going><br>";
				echo "<strong>info_adicional:".$dd->info_adicional."</strong><br>";
				echo "<strong>comentario:".$dd->comentario."</strong><br>";
				
				
				
				echo "</p>";
				echo "<br />";

			}
		}
		echo "OK 2";

		$n = 9;
		$status_checkin = array('status' => 1);
		$this->db->where('id',$n);
		$this->db->update('cron_checkin' , $status_checkin);

	}


	function set_classificacao(){
		$id_mkt = $this->input->post('id_mkt');
		$event_id = $this->input->post('event_id');
		$hora = $this->input->post('hora');
		$where = array(
			'id_mkt' => $id_mkt,
		);
		$this->db->where($where);
		$qr = $this->db->get('cavalos_hist');
		foreach($qr->result() as $dd){
			$id = $dd->id;
			echo "<hr>";
			echo "<h1>".$id."</h1>";
			$dd_update = array(
				#'classificacao' => $this->input->post("classificacao_".$id),
				'classificacao' => $_POST["classificacao_".$id],
				'posicionamento' => $this->input->post('posicionamento_'.$id),
				'info_adicional' => $this->input->post('info_'.$id),
				'comentario' =>  $this->input->post('comentario_'.$id),
				'ts' => $this->input->post('ts_'.$id)
			);
			print_r($dd_update);
			echo "<br>";
			$this->db->where('id',$id);
			$this->db->update('cavalos_hist' , $dd_update);
		}
		#redirect('horses/dd_hist/'.$id_mkt,'refresh');
		#print_r($_POST);
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

	function compara_confronto(){

		$n = 13;
		$status_checkin = array('status' => 1);
		$this->db->where('id',$n);
		$this->db->update('cron_checkin' , $status_checkin);

		$dados['qr'] = "";
		$this->load->view('augusto/comprara_confronto', $dados);
	}

	function confronto_sel($id_selection){

	}

	function edit_run($id_mkt){
		#echo "OK";
		#return false;
		#echo $id_mkt;
		#$dados['dd'] = $this->padrao_model->get_by_matriz('marketId',$id_mkt,'runs_horses')->row();
		$dd = $this->db->query("SELECT * FROM runs_horses WHERE marketId = '".$id_mkt."'")->row();
		$classes = $this->db->query("SELECT * FROM classe ORDER BY nome asc ");
		#print_r($dd);
		#echo $classes->num_rows();
		#return false;


		##############  PEGAR cavalos_hist
		$qtd = 0;
		$dadps['qtd'] = $qtd;

		$dd_run = $dd;
		$id_evento = $dd_run->id_evento;
		$hora = substr($dd_run->data_tratada,11,8);
		#echo $id_evento." ".$hora;
		#$qr_hist = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE event_id = '".$id_evento."' AND hora = '".$hora."' ");
		$qr_hist = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE id_mkt = '".$id_mkt."' AND hora = '".$hora."' ");
		

		if($qr_hist->num_rows() > 0){
			$dados['dd_hist'] = $qr_hist->row();
		}

		$dados['dd'] = $dd;
		$dados['classes'] = $classes;
		
		#return false;
		$this->load->view('augusto/edit_run' , $dados);

	}

	function set_dados_run(){
		
		#echo "OK";
		#return false;

		$dd = array(
			 'subtitulo' => $this->input->post('subtitulo'),
			 #'condicoes' => $this->input->post('condicoes'),
			 'classe' => $this->input->post('classe'),
			 'piso' => $this->input->post('piso')
		);
		$this->db->where('marketId',$this->input->post('id_mkt'));
		$this->db->update('runs_horses' , $dd);

		$this->db->where('marketId',$this->input->post('id_mkt'));
		$qr_run = $this->db->get('runs_horses');

		$dd_run = $qr_run->row();
		$id_evento = $dd_run->id_evento;
		$hora = substr($dd_run->data_tratada,11,8);

		#echo $id_evento." ".$hora;
		
		$qr_hist = $this->db->query("SELECT * FROM cavalos_hist_dia WHERE id_mkt = '".$this->input->post('id_mkt')."' AND hora = '".$hora."' ");
		#echo "<h1>COUNT hist = ".$qr_hist->num_rows()."</h1>";
		if($qr_hist->num_rows() > 0){
			$this->db->where('marketId',$this->input->post('id_mkt'));
			$qr_run = $this->db->get('runs_horses');

			$dd_hist = array(
				#'tipologia' => $this->input->post('tipologia'),
				'idade' => $this->input->post('idade'),
				'premio' => $this->input->post('premio'),
				'classe' => $this->input->post('classe'),
				'tipologia' => $this->input->post('tipologia'),
				'tipo' => $this->input->post('tipo'),
				'going' => $this->input->post('piso')
			);
			echo "<br> **** ";
			echo "<h3 style='color:green'>";
			print_r($dd_hist);
			#echo "</h3>";
			$where_hist = array('id_mkt' => $this->input->post('id_mkt') , 'hora' => $hora);
			$this->db->where($where_hist);
			$this->db->update('cavalos_hist_dia' , $dd_hist);


			$where_hist = array('id_mkt' => $this->input->post('id_mkt') , 'hora' => $hora);
			$this->db->where($where_hist);
			$qr_num = $this->db->get('cavalos_hist_dia') ;
			echo "<h1>";
			echo $qr_num->num_rows();
			echo "</h1>";
			#echo "<br> ++++ ";
		}
		print_r($_POST);
		#return false;
		#return false;


		for($p=1; $p<16; $p++){
			if($this->input->post("premio$p") > 0){
				$premio = $this->input->post("premio$p");
				#echo "<br /> Premio $p: ".$premio;
				
				$where = array(
					'id_mkt' => $this->input->post('id_mkt'),
					'posicao' => $p
				);
				$this->db->where($where);
				$qr_verifica = $this->db->get('runs_horses_premiacao');
				#echo $qr_verifica->num_rows();
				$dds =  array(
					'id_mkt' => $this->input->post('id_mkt'),
					'posicao' => $p,
					'valor' => $premio
				);
				
				if($qr_verifica->num_rows() == 0){
					$this->db->insert("runs_horses_premiacao" , $dds);
				
				}else{
					$this->db->where($where);
					$this->db->update("runs_horses_premiacao" , $dds);					
					

				}
				
			} // if post
		} // for
		return false;

		redirect('horses/edit_run/'.$this->input->post('id_mkt'),'refresh');
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

	function sel_calssificacao(){

		$qr_runs = $this->db->query("SELECT * FROM confrontos  WHERE classificacao_sel1 = 0 OR classificacao_sel2 = 0 OR (classificacao_sel1 = 77 OR classificacao_sel1 = 77) ORDER BY id desc   ");

		#$qr_runs = $this->db->query("SELECT * FROM confrontos  WHERE classificacao_sel1 = 77 OR classificacao_sel1 = 77 ORDER BY id desc LIMIT 200  ");

		#$qr_runs = $this->db->query("SELECT * FROM confrontos  WHERE id = 24825 ");

		foreach($qr_runs->result() as $dd_run){
			$data_evento =  substr($dd_run->data_hora,0,10); 
			$nm_cavalo_1 = $dd_run->nm_sel_1;
			$nm_cavalo_2 = $dd_run->nm_sel_2;

			$where_1 = array(
				'cavalo' => $nm_cavalo_1,
				'data_trat' => $data_evento

			);

			$where_2 = array(
				'cavalo' => $nm_cavalo_2,
				'data_trat' => $data_evento

			);


			$this->db->where($where_1);
			#$qr_classificacao_1 = $this->db->get("cavalos_hist");
			$qr_classificacao_1 = $this->db->get("cavalos_hist_dia");

			$this->db->where($where_2);
			#$qr_classificacao_2 = $this->db->get("cavalos_hist");
			$qr_classificacao_2 = $this->db->get("cavalos_hist_dia");

			if($qr_classificacao_1->num_rows() > 0){
				$classificacao_1 = $qr_classificacao_1->row()->classificacao;

				$dd_h = $qr_classificacao_1->row();

			}else{
				$classificacao_1 = 77;
			}

			if($qr_classificacao_2->num_rows() > 0){
				$classificacao_2 = $qr_classificacao_2->row()->classificacao;
			}else{
				$classificacao_2 = 77;
			}

			#print_r($dd_run);
			echo $nm_cavalo_1." (".$classificacao_1.") x ".$nm_cavalo_2." (".$classificacao_2.")";
			echo "<br />";
			echo "<br />";
			$dd_class = array(
				'classificacao_sel1' => $classificacao_1,
				'classificacao_sel2' => $classificacao_2,
				'pista' => $dd_h->pista,
				'hora' => $dd_h->hora,
				'classe' => $dd_h->classe,
				'tipologia' => $dd_h->tipologia,
				'tipo' => $dd_h->tipo,
				'distancia' => $dd_h->distancia,
				'going' => $dd_h->going,
				'corredores' => $dd_h->corredores,
			);
			echo "<p style='color:green'>";
				print_r($dd_class);
			echo "</p>";
			echo "<p style='color:red'>";
				print_r($dd_h);
			echo "</p>";
			echo "<br>";
			$this->db->where("id",$dd_run->id);
			$this->db->update('confrontos' , $dd_class);
		}

		$n = 14;
		$status_checkin = array('status' => 1);
		$this->db->where('id',$n);
		$this->db->update('cron_checkin' , $status_checkin);

	}

	function import_corridas_cavalos_dia(){
		#$this->db->query(" TRUNCATE TABLE corridas_cavalos_dia");
		/*
		$this->load->model('data_model');
		$hoje = date("Y-m-d");
		$dt_ontem = $this->data_model->calcData($this->padrao_model->converte_data($hoje),-4); 
		$dt_antes = $this->padrao_model->converte_data($dt_ontem);

		$qr_teste = $this->db->query("SELECT * FROM  corridas_cavalos_dia where dt BETWEEN '".$dt_antes." 00:00:01' AND  '".$dt_antes." 23:59:59' ");
		*/

		$this->load->model('data_model');
		$hoje = date("Y-m-d");
		
		$dt_ontem = $this->data_model->calcData($this->padrao_model->converte_data($hoje),-3); 
		$dt_antes = $this->padrao_model->converte_data($dt_ontem);

		$dt_ontem2 = $this->data_model->calcData($this->padrao_model->converte_data($hoje),-3); 
		$dt_antes2 = $this->padrao_model->converte_data($dt_ontem2);

		$data1 = $dt_antes." 00:00:01";
		$data2 = $dt_antes." 23:59:59";

		echo $data1." ".$data2."<br>";
		#$qr_teste = $this->db->query("SELECT * FROM  corridas_cavalos_dia where dt BETWEEN '".$data1."' AND '".$data2."' ");


		#echo $data1." ".$qr_teste->num_rows();
		#return false;
		

		$this->db->query("DELETE FROM  corridas_cavalos_dia where dt BETWEEN '".$data1."' AND '".$data2."' ");

		#echo $dt_antes." ".$qr_teste->num_rows();
		#return false;
		
		#$this->db->query("TRUNCATE TABLE confrontos");
		#$this->db->query("DELETE FROM  corridas_cavalos_dia where dt BETWEEN '".$dt_antes." 00:00:01' AND  '".$dt_antes." 23:59:59' ");

		$cont1 = 0;
		$qr_runs = $this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt_horses_dia WHERE foi_import = 0  ORDER BY id_mkt desc LIMIT 20000 "); //  ORIGINAL

		foreach( $qr_runs->result() as $dd_run){ $cont1++;
			


			$qr_run_2 = $this->db->query("SELECT * FROM runs_horses WHERE marketId = '".$dd_run->id_mkt."' ");
			if($qr_run_2->num_rows() > 0){
				$dd_run_2 = $qr_run_2->row();
			}

			#echo $dd_run->id_mkt." (RUN 2 = ".$qr_run_2->num_rows().") <span style='color:red'> Cont1: ".$cont1."</span> ";
			echo "<h1>".$dd_run->id_mkt."</h1>";
			echo "<br />";

			#echo "OK 2";
			#return false;
			
			$qr_mkt_sel = $this->db->query("SELECT DISTINCT selection_id,selection_name  FROM odds_mkt_horses_dia WHERE id_mkt = '".$dd_run->id_mkt."' AND selection_name <> '' ");
			if( $qr_mkt_sel->num_rows() == 0 ){
				echo " -- Sem dados (id_evento)";
				#return false;
			}else{
					foreach ($qr_mkt_sel->result()  as $horse) { #$cont2++;
						$id_sel = $horse->selection_id;
						$nm_horse_principal = $horse->selection_name;
						echo " - ".$nm_horse_principal."<br>";

						$tabela = 'corridas_cavalos_gb';
						$qr_hist = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE selection_id = '".$id_sel."'");

							if($qr_hist->num_rows() == 0){								
								$tabela = 'corridas_cavalos_ire';
								$qr_hist = $this->db->query("SELECT * FROM $tabela WHERE selection_id = '".$id_sel."'");
							}else{
								$tabela = 'corridas_cavalos_gb';
							}


							if($qr_hist->num_rows() > 0){	
					
								#echo "<h1>".$qr_hist->num_rows()."</h1><br>";
								foreach($qr_hist->result() as $dd_h){
									unset($dd_h->id);
									unset($dd_h->dt);
									unset($dd_h->corredores);
									unset($dd_h->foi_corredores);


									$this->db->where($dd_h);
									$qr_tem = $this->db->get('corridas_cavalos_dia'); 
									#if($qr_tem->num_rows() == 0){
										$this->db->insert('corridas_cavalos_dia' , $dd_h);
									#}
									echo "<p style='color:red'>".$tabela." ".$qr_tem->num_rows()." <------ tem?</p><br><br>";
									print_r($dd_h);
									echo "<br><br>";
									echo "<br><hr>";

								}
							}else{
								echo "<h1></h1>";
							}

							$tabela = 'corridas_cavalos_ire';
							$qr_hist_ire = $this->db->query("SELECT * FROM corridas_cavalos_ire WHERE selection_id = '".$id_sel."'");
							if($qr_hist_ire->num_rows() > 0){	
					
								#echo "<h1>".$qr_hist->num_rows()."</h1><br>";
								foreach($qr_hist_ire->result() as $dd_h){
									unset($dd_h->id);
									unset($dd_h->dt);
									unset($dd_h->corredores);
									unset($dd_h->foi_corredores);

									$this->db->where($dd_h);
									$qr_tem = $this->db->get('corridas_cavalos_dia'); 
									if($qr_tem->num_rows() == 0){
										$this->db->insert('corridas_cavalos_dia' , $dd_h);
									}

									echo "<p style='color:red'>".$tabela."</p><br><br>";
									print_r($dd_h);
									echo "<br><br>";
									echo "<br><hr>";

								}
							}

						####################  X  corridas_cavalos
					}

			}

			##  SETA FOI em odds_mkt_horses_dia
			$dd_foi = array('foi_import' => 1);
			$this->db->where('id_mkt',$dd_run->id_mkt);
			$this->db->update('odds_mkt_horses_dia' , $dd_foi);


		} // x foreach

		#$this->db->query("DELETE FROM corridas_cavalos_dia WHERE ipmin = ");
		$n = 8;
		$status_checkin = array('status' => 1);
		$this->db->where('id',$n);
		$this->db->update('cron_checkin' , $status_checkin);


	}


	###########  SET CORREDORES 

	function set_corredores_zero(){
		#$qr_hist = $this->db->query("SELECT DISTINCT event_id  FROM cavalos_hist WHERE corredores IS NULL ");
		/*
		SELECT DISTINCT c.event_dt  FROM corridas_cavalos_gb as c 
INNER JOIN cavalos_hist as h ON c.event_id = h.event_id
WHERE c.foi_corredores = 0  order by c.id desc 
		*/
		$qr_hist = $this->db->query("SELECT DISTINCT event_id  FROM cavalos_hist WHERE corredores IS NULL AND event_id <> 303 AND event_id <> 0 ");
		$qr_hist = $this->db->query("SELECT DISTINCT event_id  FROM cavalos_hist WHERE corredores IS NULL AND event_id <> 303 AND event_id <> 0 ");
		foreach($qr_hist->result() as $dd){
			$qr_gb = $this->db->query("SELECT *  FROM corridas_cavalos_gb WHERE event_id = ".$dd->event_id." ");
			if($qr_gb->num_rows() > 0){
				$foi = array('foi_corredores' => 0);
				$this->db->where('event_id',$dd->event_id);
				$this->db->update('corridas_cavalos_gb' , $foi);
			}
			echo $dd->event_id."  (".$qr_gb->num_rows().") ";
			echo "<br>	";
		}
		echo $qr_hist->num_rows();
	}


	function set_corredores_pais($tb="corridas_cavalos_gb"){
		/*
		if($pais == "gb"){
			$tb = 'corridas_cavalos_gb';
		}
		if($pais == "ire"){
			$tb = 'corridas_cavalos_ire';
		}
		*/
		$qr_hist = $this->db->query("SELECT DISTINCT event_id  FROM $tb WHERE foi_corredores = 0  order by id desc LIMIT 20000");
		/*
		$qr_hist = $this->db->query("SELECT DISTINCT c.event_dt  FROM $tb as c 
									INNER JOIN cavalos_hist as h ON c.event_id = h.event_id
									WHERE c.foi_corredores = 0 AND h.event_id <> 303 and h.event_id <> 0  order by c.id desc 
									");
		*/
		foreach($qr_hist->result() as $dd){

			#$dd_foi = array('foi_corredores' => 1);
			#$this->db->where('event_dt' , $dd->event_dt);
			#$this->db->update('corridas_cavalos_gb' , $dd_foi);

			$this->db->where('event_id' , $dd->event_id);
			$qr_tem = $this->db->get($tb);

			$dd_foi = array('foi_corredores' => 1 , 'corredores' => $qr_tem->num_rows());
			$this->db->where('event_id' , $dd->event_id);
			$this->db->update($tb, $dd_foi);
			
			
			echo $dd->event_id." [".$qr_tem->num_rows()."] ";
			echo "<br>";
		}
	}


		function set_corredores_pais_ire($tb="corridas_cavalos_ire"){
		/*
		if($pais == "gb"){
			$tb = 'corridas_cavalos_gb';
		}
		if($pais == "ire"){
			$tb = 'corridas_cavalos_ire';
		}
		*/
		$qr_hist = $this->db->query("SELECT DISTINCT event_id  FROM $tb WHERE foi_corredores = 0  order by id desc LIMIT 20000");
		/*
		$qr_hist = $this->db->query("SELECT DISTINCT c.event_dt  FROM $tb as c 
									INNER JOIN cavalos_hist as h ON c.event_id = h.event_id
									WHERE c.foi_corredores = 0 AND h.event_id <> 303 and h.event_id <> 0  order by c.id desc 
									");
		*/
		foreach($qr_hist->result() as $dd){

			#$dd_foi = array('foi_corredores' => 1);
			#$this->db->where('event_dt' , $dd->event_dt);
			#$this->db->update('corridas_cavalos_gb' , $dd_foi);

			$this->db->where('event_id' , $dd->event_id);
			$qr_tem = $this->db->get($tb);

			$dd_foi = array('foi_corredores' => 1 , 'corredores' => $qr_tem->num_rows());
			$this->db->where('event_id' , $dd->event_id);
			$this->db->update($tb, $dd_foi);
			
			
			echo $dd->event_id." [".$qr_tem->num_rows()."] ";
			echo "<br>";
		}
	}

	function set_corredores($pais="gb"){
		#return false;
		if($pais == "gb"){
			$tb = 'corridas_cavalos_gb';
		}
		if($pais == "ire"){
			$tb = 'corridas_cavalos_ire';
		}
		/*
		
		*/
		#$qr_hist = $this->db->query("SELECT DISTINCT event_dt  FROM corridas_cavalos_gb WHERE foi_corredores = 0  order by id desc LIMIT 1000");
		$qr_hist = $this->db->query("SELECT DISTINCT c.event_dt  FROM $tb as c 
									INNER JOIN cavalos_hist as h ON c.event_id = h.event_id
									WHERE c.foi_corredores = 1 AND h.event_id <> 303 and h.event_id <> 0  order by c.id desc 
									");
		foreach($qr_hist->result() as $dd){

			

			$qr_num = $this->db->query("SELECT *  FROM corridas_cavalos_gb WHERE event_dt = '".$dd->event_dt."' ");
			if($qr_num->num_rows() > 0){
				$qr_hist_tem = $this->db->query("SELECT *  FROM cavalos_hist WHERE data_trat = '".substr($dd->event_dt,0,10)."' AND cavalo = '".$qr_num->row()->selection_name."' ");	
			}else{
				$qr_hist_tem = $this->db->query("SELECT *  FROM cavalos_hist WHERE data_trat = '".substr($dd->event_dt,0,10)."'  ");	
			}
			
			echo $dd->event_dt." (".$qr_num->num_rows().") [".$qr_hist_tem->num_rows()."] "; //
			if($qr_num->num_rows() > 0){
				foreach($qr_num->result() as $ddd){
					$qr_hist_tem = $this->db->query("SELECT *  FROM cavalos_hist_dia WHERE data_trat = '".$ddd->data_evento."' AND cavalo = '".$ddd->selection_name."' ");	

					$dd_corr = array('corredores' => $qr_num->num_rows());
					$where_corr = array('data_trat' => $ddd->data_evento , 'cavalo' => $ddd->selection_name);
					$this->db->where($where_corr);
					$this->db->update('cavalos_hist' , $dd_corr);
					#$this->db->update('cavalos_hist_dia' , $dd_corr);

					echo "<b style='color:red'>";
					echo $qr_hist_tem->num_rows();
					echo "</b><br>";
					echo "data_trat = '".$ddd->data_evento."' AND cavalo = '".$ddd->selection_name."' ";
					echo "<br>";
					#print_r($ddd);
					echo "<br>";
					echo "<br>";
				}
				$dd_horses = $qr_hist_tem;
				#echo "<b style='color:red'>";
				#print_r($qr_num->result());
				#echo "<b>";
				#echo "<br><hr>";
			}
			$dd_foi = array('foi_corredores' => 2);
			$this->db->where('event_dt' , $dd->event_dt);
			$this->db->update('corridas_cavalos_gb' , $dd_foi);
			echo "<br>";
		} // x foreach
	}

	function set_corredores_by_gb(){
		$qr_hist = $this->db->query("SELECT DISTINCT event_dt  FROM corridas_cavalos_gb WHERE foi_corredores = 0  order by id desc LIMIT 1000");
		foreach($qr_hist->result() as $dd){

			$dd_foi = array('foi_corredores' => 1);
			$this->db->where('event_dt' , $dd->event_dt);
			$this->db->update('corridas_cavalos_gb' , $dd_foi);

			$qr_num = $this->db->query("SELECT *  FROM corridas_cavalos_gb WHERE event_dt = '".$dd->event_dt."' ");
			if($qr_num->num_rows() > 0){
				$qr_hist_tem = $this->db->query("SELECT *  FROM cavalos_hist_dia WHERE data_trat = '".substr($dd->event_dt,0,10)."' AND cavalo = '".$qr_num->row()->selection_name."' ");	
			}else{
				$qr_hist_tem = $this->db->query("SELECT *  FROM cavalos_hist_dia WHERE data_trat = '".substr($dd->event_dt,0,10)."'  ");	
			}
			
			echo $dd->event_dt." (".$qr_num->num_rows().") [".$qr_hist_tem->num_rows()."] ";
			if($qr_num->num_rows() > 0){
				foreach($qr_num->result() as $ddd){
					$qr_hist_tem = $this->db->query("SELECT *  FROM cavalos_hist_dia WHERE data_trat = '".$ddd->data_evento."' AND cavalo = '".$ddd->selection_name."' ");	

					$dd_corr = array('corredores' => $qr_num->num_rows());
					$where_corr = array('data_trat' => $ddd->data_evento , 'cavalo' => $ddd->selection_name);
					$this->db->where($where_corr);
					$this->db->update('cavalos_hist' , $dd_corr);
					#$this->db->update('cavalos_hist_dia' , $dd_corr);

					echo "<b style='color:red'>";
					echo $qr_hist_tem->num_rows();
					echo "</b><br>";
					echo "data_trat = '".$ddd->data_evento."' AND cavalo = '".$ddd->selection_name."' ";
					echo "<br>";
					#print_r($ddd);
					echo "<br>";
					echo "<br>";
				}
				$dd_horses = $qr_hist_tem;
				#echo "<b style='color:red'>";
				#print_r($qr_num->result());
				#echo "<b>";
				#echo "<br><hr>";
			}
			echo "<br>";
		}
	}
	########## X SET CORREDORES


	// ################ cron para comparar cavalos nas corridas
	function compara_runs($id_mkt=""){



		$qtd = 0;
		$cont1 = 0;
		$cont2 = 0;
		#$qr_runs = $this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt_horses  ORDER BY id_mkt asc LIMIT 10");
		if($id_mkt == ""){
			#$qr_runs = $this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt_horses  ORDER BY id_mkt desc LIMIT 187,200 "); //  ORIGINAL
			$qr_runs = $this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt_horses_dia  ORDER BY id_mkt desc LIMIT 187,200 "); //  ORIGINAL
		}
		
		if($id_mkt != ""){
			#$qr_runs = $this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt_horses  WHERE id_mkt = '".$id_mkt."' ");
			$qr_runs = $this->db->query("SELECT DISTINCT id_mkt FROM odds_mkt_horses_dia  WHERE id_mkt = '".$id_mkt."' ");
		}

		echo $id_mkt." -------------- <br>";
		foreach( $qr_runs->result() as $dd_run){ $cont1++;

			$qr_run_2 = $this->db->query("SELECT * FROM runs_horses WHERE marketId = '".$dd_run->id_mkt."' ");
			if($qr_run_2->num_rows() > 0){
				$dd_run_2 = $qr_run_2->row();
			}


			echo $dd_run->id_mkt." (RUN 2 = ".$qr_run_2->num_rows().") <span style='color:red'> Cont1: ".$cont1."</span> ";
			echo "<br />";

			#echo "OK 2";
			#return false;
			
			#$qr_mkt_sel = $this->db->query("SELECT DISTINCT selection_id,selection_name  FROM odds_mkt_horses WHERE id_mkt = '".$dd_run->id_mkt."' AND selection_name <> '' ");
			$qr_mkt_sel = $this->db->query("SELECT DISTINCT selection_id,selection_name  FROM odds_mkt_horses_dia WHERE id_mkt = '".$dd_run->id_mkt."' AND selection_name <> '' ");
			if( $qr_mkt_sel->num_rows() == 0 ){
				echo " -- Sem dados (id_evento)";
				#return false;
			}else{
				echo " -- TEM: ".$qr_mkt_sel->num_rows();
				echo "<br />";
				foreach ($qr_mkt_sel->result()  as $horse) { $cont2++;
					$id_sel = $horse->selection_id;
					$nm_horse_principal = $horse->selection_name;
					echo "<span style='color:red'> Cont2: ".$cont2."</span>";
					#$qr_mkt = $this->db->query("SELECT DISTINCT selection_name  FROM odds_mkt_horses WHERE id_mkt = '".$dd_run->id_mkt."' AND selection_name NOT LIKE '%$nm_horse_principal%' ");
					
					#$qr_mkt = $this->db->query("SELECT DISTINCT selection_id  FROM odds_mkt_horses WHERE id_mkt = '".$dd_run->id_mkt."' AND selection_id <> $id_sel AND selection_name <> '' ");
					$qr_mkt = $this->db->query("SELECT DISTINCT selection_id  FROM odds_mkt_horses_dia WHERE id_mkt = '".$dd_run->id_mkt."' AND selection_id <> $id_sel AND selection_name <> '' ");
					
					if( $qr_mkt->num_rows() > 1){
						foreach($qr_mkt->result() as $sel_conf ){

							#$qr_hist = $this->db->query("SELECT * FROM $tb WHERE selection_name LIKE '%".$nm_horse_confr."%' ");

							// CSV GB
							#$nm_horse_principal = $sel_conf->
							/*
							$qr_hist = $this->db->query("SELECT event_id,selection_id,data_evento,menu_hint FROM corridas_cavalos_gb WHERE selection_id = '".$sel_conf->selection_id."'");

							if($qr_hist->num_rows() == 0){
								$qr_hist = $this->db->query("SELECT event_id,selection_id,data_evento,menu_hint FROM corridas_cavalos_ire WHERE selection_id = '".$sel_conf->selection_id."'");
								$tabela = 'corridas_cavalos_ire';
							}else{
								$tabela = 'corridas_cavalos_gb';
							}
							*/

							$tabela = 'corridas_cavalos_dia';
							$qr_hist = $this->db->query("SELECT event_id,selection_id,data_evento,menu_hint FROM $tabela WHERE selection_id = '".$sel_conf->selection_id."'");


							if($qr_hist->num_rows() > 0){	
					
								#echo "<h1>".$qr_hist->num_rows()."</h1><br>";
								foreach($qr_hist->result() as $dd_h){

									#print_r($dd_h);
									#$qr_match = $this->db->query("SELECT selection_id,win_lose FROM $tb WHERE event_id = ".$dd_h->event_id." AND selection_id = ".$id_sel."    ");
									$qr_match = $this->db->query("SELECT selection_id FROM $tabela WHERE  selection_id = ".$id_sel." AND event_id = '".$dd_h->event_id."'  ");


								#	echo "<h1 style='color:green'> ".$nm_horse_principal." MATCH: ".$qr_match->num_rows()."</h1>";

									if($qr_match->num_rows() > 0){
									
										#$qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses WHERE selection_name <> '' AND selection_id = '".$sel_conf->selection_id."' ");
										$qr_sel = $this->db->query("SELECT selection_name FROM odds_mkt_horses_dia WHERE selection_name <> '' AND selection_id = '".$sel_conf->selection_id."' ");
									
										$nm_cavalo = $qr_sel->row()->selection_name;
									
										$qtd = $qtd + 1;
										$dd_confronto = array(
											'id_mkt' => $dd_run->id_mkt,
											'id_sel1' => $id_sel,
											'id_sel2' => $sel_conf->selection_id,
											'nm_sel_1' => $nm_horse_principal,
											'nm_sel_2' => $nm_cavalo,
											'menu' => $dd_h->menu_hint,

											// novos
											
											#'pista' => $dd_h->menu_hint." ".$dd_h->event_name,
											/*
											'hora' => substr($dd_h->datahora_evento,11,5),
											'classe' => $dd_h->menu_hint,
											'tipologia' => $dd_h->menu_hint,
											'tipo' => $dd_h->menu_hint,
											'distancia' => $dd_h->menu_hint,
											'going' => $dd_h->menu_hint,
											'corredores' => $dd_h->menu_hint,
											*/

											#'classificacao_sel1' => $classificacao_1,
											#'classificacao_sel2' => $classificacao_2,
											#'win' => $dd_run_2->win_lose,
											'data_hora' => $dd_h->data_evento
											#'nm_sel_1' => $qr_sel->row()->selection_name
										);
										/*
										if($pais != "AU"){
											$dd_confronto['id_sel2'] = $sel_conf->selection_id;

											#$nm_horse_confr = str_replace($search, $replace, $nm_cavalo);
											#$dd_confronto['nm_sel_2'] = $nm_horse_confr;
											#$nm_cavalo = $nm_horse_confr;
										}
										*/
										#$this->db->where($dd_confronto);
										#$qr_num_sel = $this->db->get('confrontos');
										$qr_num_sel = $this->db->query("SELECT * FROM confrontos WHERE 
											(nm_sel_1 = '".$nm_horse_principal."' AND nm_sel_2 =  '".$nm_cavalo."' AND data_hora = '".$dd_h->data_evento."' ) OR 
											(nm_sel_1 = '".$nm_cavalo."' AND nm_sel_2 =  '".$nm_horse_principal."' AND data_hora = '".$dd_h->data_evento."') ");
										if($qr_num_sel->num_rows() == 0){								
											$this->db->insert('confrontos',$dd_confronto);
											echo "<h1 style='color:blue'>Insert Confronto</h1>";
										}else{
											echo "<h1 style='color:red'>ja tem Não registrou em Confronto</h1>";
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
										#$qr_num_sel = $this->db->get('selections_horses');
										$qr_num_sel = $this->db->get('selections_horses_dia');
										
										if($qr_num_sel->num_rows() == 0){
											#$this->db->insert('selections_horses' , $dd_sel_insert);
										}

										#echo " - ".$dd_h->event_id." <strong>".$nm_horse_principal."</strong> x <strong>".$nm_cavalo."</strong> (".$qr_match->num_rows().") <br />";
										
										
									} // x num_rows() qr_match



								} // x foreach $qr_hist

							}  // x num_rows qr_hist





						}
					}


					echo " -- ";
					print_r($horse);
					echo "<br />";
				}
			}

			echo "<br />";
		}
	}

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
		$this->load->model('data_model');
		$hoje = date("Y-m-d");
		$dt_ontem = $this->data_model->calcData($this->padrao_model->converte_data($hoje),-1); 
		$dt_antes = $this->padrao_model->converte_data($dt_ontem);

		$dt_menos_4 = $this->data_model->calcData($this->padrao_model->converte_data($hoje),-4); 
		$dt_antes_4 = $this->padrao_model->converte_data($dt_menos_4);
		
		#$this->db->query("TRUNCATE TABLE confrontos");
		$this->db->query("DELETE FROM  confrontos where dt BETWEEN '".$dt_antes_4." 00:00:01' AND  '".$dt_antes_4." 23:59:59' ");
		
		#$this->db->query("TRUNCATE TABLE runs_horses");
		$this->db->query("DELETE FROM  runs_horses where data_timezone BETWEEN '".$dt_antes." 00:00:01' AND  '".$dt_antes." 23:59:59' OR  data_timezone IS NULL");

		#$this->db->query("TRUNCATE TABLE odds_mkt_horses");
		$this->db->query("DELETE FROM  odds_mkt_horses where dt_update BETWEEN '".$dt_antes_4." 00:00:01' AND  '".$dt_antes_4." 23:59:59' ");


		#$this->db->query("TRUNCATE TABLE odds_mkt_horses_dia");
		$this->db->query("DELETE FROM  odds_mkt_horses_dia where dt_update BETWEEN '".$dt_antes_4." 00:00:01' AND  '".$dt_antes_4." 23:59:59' ");

		
		echo $hoje;
		echo "<br>";
		echo $dt_antes;
		echo "<br>";

		echo "<br>";
		echo $dt_antes_4;
		echo "<br>";
		echo "--------";
		echo "<br>";
		$qr_row = $this->db->query("SELECT * FROM  runs_horses where data_timezone BETWEEN '".$dt_antes." 00:00:01' AND  '".$dt_antes." 23:59:59'");
		echo $qr_row->num_rows();

		echo "<br>";
		echo "<hr>";
		echo "<br>";
		echo "<a href='".base_url()."cron/get_runs/1'>Continuar -> </a>";
		
		#return false;
		
		#redirect('cron/get_runs/1');
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
		    	<!-- <option value="csv_place">GB PLACE</option> -->
		    	<option value="csv">GB WIN</option>		    	
		    	<option value="csv_ire">IRE WIN</option>
		    	<!-- <option value="csv_aus">AUS WIN</option> -->
		    	<!-- <option value="csv_usa">USA WIN</option> -->
		    	<!-- <option value="thrpost">THRPOST</option> -->
		    	<option value="csv_thr">CSV THR</option>

		    	

		    </select>
		    Enviar esse arquivo: <input name="userfile" type="file" />
		    <input type="submit" value="Enviar arquivo" />
		</form>
		';
		if($_FILES){
				$pasta = $_POST['pasta'];
				echo $pasta."<br />";
				$config['upload_path']          = "./$pasta/";
                $config['allowed_types']        = 'csv|xlsx';
                $config['max_size']             = 10000;
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




	// UPLOAD DE ARQUIVO CSV
	function upload_cavalos_hist(){
		echo ' 
		<form enctype="multipart/form-data" action="'.base_url().'horses/import_csv_cavalo_hist" method="POST"  target="_blank">
		    <!-- MAX_FILE_SIZE deve preceder o campo input -->
		    
		    Enviar esse arquivo: <input name="userfile" type="file" />
		    <input type="submit" value="Enviar arquivo" />
		</form>
		
		<br><hr>

		<h1>UPload CSV 2</h1>

		<form enctype="multipart/form-data" action="'.base_url().'horses/import_csv_cavalo_hist2" method="POST"  target="_blank">
		    <!-- MAX_FILE_SIZE deve preceder o campo input -->
		    
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
			#echo "<strong style='color:red'>".$id_mkt." </strong><br />";

			$this->db->where('marketId',$id_mkt);
			$qr_verifica = $this->db->get('runs_horses');
			if($qr_verifica->num_rows() == 0 ){
				$dd_insert = array(
					'marketId' => $id_mkt,
					'marketName' => "AVB",
					'countryCode' => "AV",
					#'vez' => $vez,
					#'status' => 0
					'status' => 1
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
		$qr_null = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV' AND data_tratada IS NULL   ORDER BY data_tratada asc");
		echo $qr_null->num_rows();
		if($qr_null->num_rows() > 0){
			#return false;
		}
		// COM LIMITE
		#$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId asc LIMIT 5,10");
		#$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId asc");
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV' AND status < 2  ORDER BY data_tratada asc");
		echo $qr->num_rows();
		echo "<br>";
		#return false;
		$del = 0;
		if($qr->num_rows() > 0){ 
			#$this->db->query("DELETE FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId asc LIMIT 3,10 ");
		
			foreach($qr->result() as $run ){ $del++;
				echo "<h5>".$run->marketId." (".$run->id.") [VEZ: ".$run->vez."] </h5>";
				if($del > 4){
					#$this->db->query("DELETE FROM runs_horses WHERE id = ".$run->id."");
					$new_vez = array('vez' => $del , 'status' => 0);
					$this->db->where('id',$run->id);
					$this->db->update('runs_horses' , $new_vez);
				}else{
					$new_vez = array('vez' => $del , 'status' => 1);
					$this->db->where('id',$run->id);
					$this->db->update('runs_horses' , $new_vez);
				}
			}
		}


		#print_r($avbs);
	}

	function get_dd_cabalos_avb(){
		$qr = $this->db->query("SELECT * FROM selections_avb ORDER BY id asc LIMIT 10000");
		foreach ($qr->result() as $dd) {
			$data_trat = substr($dd->dt,0,10);
			$qr_hist = $this->db->query("SELECT * FROM cavalos_hist WHERE cavalo = '".$dd->selection_name."' AND data_trat = '".$data_trat."' ");
			echo $data_trat." ".$dd->selection_name." (".$qr_hist->num_rows().") ";
			if($qr_hist->num_rows() > 0){
				$dd_up = array(
					'or' => $qr_hist->row()->or,
					'classificacao' => $qr_hist->row()->classificacao
					//'odd' => $qr_hist->row()->bps
				);
				$where_up = array(
					'selection_name' => $dd->selection_name,
					'data_trat' => $data_trat
				);
				$this->db->where($where_up);
				$this->db->update('selections_avb' , $dd_up);

				echo "<span style='color:blue'>---- ".$qr_hist->row()->or." | ".$qr_hist->row()->classificacao." @".$qr_hist->row()->bsp."</span>";
			}
			echo "<br>";
			$dd_foi = array( 'foi' => 1 );
			$this->db->where('id',$dd->id);
			$this->db->update('selections_avb' , $dd_foi);
		}
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
	function get_bsp_bk($id_mkt=0,$vez=0){
		$ordena = false;;
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
		if($id_mkt == 0 && $vez >= 0){
			$qr_win_fila = $this->db->query("SELECT * FROM runs_horses WHERE countryCode <> 'AV'  AND status = 1 ORDER BY marketId LIMIT $vez,1");
			$id_mkt = $qr_win_fila->row()->marketId;
		}
		

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
					$this->db->where('runnerId',$dd->selectionId);
					$this->db->order_by('id','desc');
					$this->db->limit(1);
					$qr_dd_horse = $this->db->get("runs_dd_horses_dia"); 
					if($qr_dd_horse->num_rows() > 0){
						$nm_cavalo_dd = $qr_dd_horse->row()->cavalo;
					}else{
						$nm_cavalo_dd = "N definido";
					}
					echo "<span style='color:green'>".$dd->selectionId." (".$qr_dd_horse->num_rows().")</span> ----- ".$nm_cavalo_dd."<br><br>";
					if(isset($dd->sp)){
						#echo "<p>Tem - </p>";
						foreach($dd->sp as $sp){
							#echo "<br> ---- ";
							$where_sp = array(
								'id_mkt' => $id_mkt,
								'selection_id' => $dd->selectionId								
							);

							######  CAVALOS_HIST
							$where_hist = array(
								'id_mkt' => $id_mkt,
								'cavalo' => $nm_cavalo_dd								
							);
							#$dd_bsp_hist = array('bsp' => round($sp,2));
							#$this->db->where($where_hist);
							#$this->db->update('cavalos_hist_dia' , $dd_bsp_hist);
							echo "<h3 style='color:0088'>UPDATE HIST: ".$sp."</h3>";
							echo "<h6 style='color:0066'>UPDATE HIST: ".$sp." ";
							print_r($where_hist);
							echo "</h6>";
							#if($this->db->update('cavalos_hist' , $dd_bsp_hist)){
							#	echo "<h3 style='color:0088'>UPDATE HIST: ".$sp."</h3>";
							#}
							#### xxxxx 

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
									#$qr_estrategia = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE (bsp BETWEEN 1 AND 4) AND ordem = 1 ");
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


	function get_bsp($id_mkt=0,$vez=0){
		$ordena = false;;
		$this->load->model('betfront_model');
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		
		if($id_mkt == 0 && $vez >= 0){
			$qr_win_fila = $this->db->query("SELECT * FROM runs_horses WHERE countryCode <> 'AV'  AND status = 1 ORDER BY marketId LIMIT $vez,1");
			$id_mkt = $qr_win_fila->row()->marketId;
		}
		

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
					print_r($dd);
					$status_sel = $dd->status;
					$win = 0;
					if($status_sel == "WINNER"){
						$win = 1;
					}
					$this->db->where('runnerId',$dd->selectionId);
					$this->db->order_by('id','desc');
					$this->db->limit(1);
					$qr_dd_horse = $this->db->get("runs_dd_horses_dia"); 
					if($qr_dd_horse->num_rows() > 0){
						$nm_cavalo_dd = $qr_dd_horse->row()->cavalo;
					}else{
						$qr_dd_horse_mkt =  $this->db->query(" SELECT * FROM odds_mkt_horses_dia WHERE selection_id = ".$dd->selectionId." AND selection_name <> '' AND id_mkt = '".$id_mkt."' ");
						echo "<h3 style='color:red'>".$qr_dd_horse_mkt->num_rows()."</h3>";
						if($qr_dd_horse_mkt->num_rows() > 0){
							$nm_cavalo_dd = $qr_dd_horse_mkt->row()->selection_name;
						}else{
							$nm_cavalo_dd = "N definido";
						}
						
					}
					echo "<span style='color:green'>".$dd->selectionId." (".$qr_dd_horse->num_rows().")</span> ----- ".$nm_cavalo_dd."<br><br>";
					if(isset($dd->sp)){
						#echo "<p>Tem - </p>";
						foreach($dd->sp as $sp){
							#echo "<br> ---- ";
							$where_sp = array(
								'id_mkt' => $id_mkt,
								'selection_id' => $dd->selectionId								
							);

							######  CAVALOS_HIST
							$where_hist = array(
								'id_mkt' => $id_mkt,
								'cavalo' => $nm_cavalo_dd								
							);
							$where_hist_dia = array(
								'id_mkt' => $id_mkt,
								'cavalo' => $nm_cavalo_dd								
							);
							$dd_bsp_hist = array('bsp' => round($sp,2) , 'win' => $win);
							$this->db->where($where_hist);
							$this->db->update('cavalos_hist' , $dd_bsp_hist);

							$dd_bsp_hist_dia = array('bsp' => round($sp,2)  , 'win' => $win);
							$this->db->where($where_hist_dia);
							$this->db->update('cavalos_hist_dia' , $dd_bsp_hist_dia);

							echo "<h3 style='color:0088'>UPDATE HIST: ".$sp."</h3>";
							echo "<h6 style='color:0066'>UPDATE HIST: ".$sp." ";
							print_r($where_hist_dia);
							echo "</h6>";
							#if($this->db->update('cavalos_hist' , $dd_bsp_hist)){
							#	echo "<h3 style='color:0088'>UPDATE HIST: ".$sp."</h3>";
							#}
							#### xxxxx 

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
									#$qr_estrategia = $this->db->query("SELECT * FROM corridas_cavalos_gb WHERE (bsp BETWEEN 1 AND 4) AND ordem = 1 ");
									#echo "<p style='color:green'>QTD Estrategia: ".$qr_estrategia->num_rows()."</p>";
								}
								$bsp_sp = array(
									'bsp' => round($sp,2),		
									 'win' => $win							
								);
								
								if(isset($sp[0]->backStakeTaken->actualSP)){
									echo "<h1>".$sp[0]->backStakeTaken['actualSP']." *****</h1>";
									$bsp_sp['status'] = '1';
 								}
								$this->db->where($where_sp);
								$this->db->update('selections_bsp',$bsp_sp);
							}
							
						}
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

	function import_csv_cavalo_hist(){
		$meuArray = Array();
		$arq = $_FILES['userfile']['tmp_name'];
		echo $arq;
		print_r($_FILES);
		echo "<br>";
		
		// MANUPUILANDO DIRETORIOS		
		$path = 'thrpost/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		#foreach ($directory as $file) { $cont++;
		 
		    #echo $file->getFileName();
		    echo "<br>";
		    #return false;

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			$var3_1 = "";
			$var3_2 = "";
			$var3_3 = "";
			if (($handle = fopen($arq, "r")) !== FALSE){
			#if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $dd_where = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg >= 0){

				          if($cont_cel == 1){
				          	#$dd_insert['cavalo'] = str_replace("---", "", $data[$col]);
				          	$nm_horse = str_replace("'", "", $data[$col]);
				          	#$dd_insert['selection_name'] = $nm_horse;
				          	#$dd_where['selection_name'] = $nm_horse;
				          	
				          	$dd_where['cavalo'] = $nm_horse;
				          	#$dd_where['cavalo'] = $data[$col];
				          }


				          if($cont_cel == 2){
				          	#$dd_insert['data'] = str_replace(".", "", $data[$col]);
				          	$dd_where['data'] = str_replace(".", "", $data[$col]);

				          }
				          # ** RESULTADO 
			          	  # ** POSICIONAMENTO, 
			          	  # ** INFO_ADICIONAL, 
			          	  # ** GOING, 
			          	  # ** PREMIO, 
			          	  # ** CLASSE 

				          if($cont_cel == 3){
				          	#$dd_insert['pista'] = $data[$col];
				          	//$pista_csv = str_replace("(AW)", "", $data[$col]);
				          	#$dd_insert['class'] = $data[$col];
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

				          // ---------------------------
				          if($cont_cel == 7){
				          	$dd_insert['premio'] = $data[$col];
				          }
				          if($cont_cel == 8){
				          	#$dd_insert['peso'] = $data[$col];
				          }
				          if($cont_cel == 9){
				          	$dd_insert['info_adicional'] = $data[$col];
				          }
				          if($cont_cel == 10){
				          	$dd_insert['classificacao'] = $data[$col];
				          }
				          if($cont_cel == 11){
				          	$dd_insert['posicionamento'] = $data[$col];
				          }
				          if($cont_cel == 12){
				          	#$dd_insert['bsp'] = $data[$col];
				          }

				          // nomeia o arqvuivo font
				          #$dd_insert['arq'] = $file->getFileName();
				          $dd_insert['arq'] = $arq;
				          
				      }
			         
			          echo 'Linha: '.$row.' e na Coluna <b>'.$cont_cel.'</b> ===== '.$data[$col] . "  -  <br />\n";
			          #echo "Linha: '.$row.' e na Coluna:  ($col - <b>$cont_cel</b>) ";

			         
			          if($cont_cel == 16){
			          	echo "<br>";
			          	echo "<br><p style='color:green'>";
			          	print_r($dd_insert);
						echo "<br>";
						print_r($dd_where);
						echo "</p>";
			          	echo "<br>REG: <b>$reg</b> $cont_cel ";
			          	if($reg >= 0 && $dd_where['cavalo'] != '------------------------------') {
			          		echo "<br />";
			          		echo "<p style='color:blue'>";
			          		print_r($dd_insert);
			          		echo "</p>";
			          		echo "<br />";
			          		$where_insert = array(
			          			'cavalo' => $dd_where['cavalo'],
			          			'data' => $dd_where['data']
			          		);
			          		$this->db->where($where_insert);
			          		$qr_insert = $this->db->get('cavalos_hist');
			          		if($qr_insert->num_rows() == 0){
			          			#$this->db->insert('cavalos_hist' , $dd_insert);
			          		}else{
			          			$this->db->where($dd_where);
			          			$this->db->update('cavalos_hist' , $dd_insert);
			          		}
			          		echo "<br> TEM:  ".$qr_insert->num_rows()." <hr>";
				          	#$this->db->insert('corridas_cavalos_2020' , $dd_insert);
				          	#unlink($path."".$file->getFileName());
				        }


			          	$cont_cel = 0;
			          	$reg++;
			      
				          print_r($dd_insert);

				          	echo "<br />";
				          	array_shift($dd_insert);

				          echo "<br><hr>";
			          	
			          }    
			      } // x for
			  } // x while
			  fclose($handle);
			  unlink($path."".$file->getFileName());
			  fclose($handle);
			} // x if handle
		if($cont > 20){
		    	return false;
		    }
		}
		#} // x laço q percorre os arquivos


	} // x fn

	function import_csv_cavalo_hist2(){
		$meuArray = Array();
		$arq = $_FILES['userfile']['tmp_name'];
		echo $arq;
		print_r($_FILES);
		echo "<br>";
		
		// MANUPUILANDO DIRETORIOS		
		$path = 'thrpost/';
		
		$directory = new RecursiveDirectoryIterator( $path );
		$cont = 0;
		#foreach ($directory as $file) { $cont++;
		 
		    #echo $file->getFileName();
		    echo "<br>";
		    #return false;

			// x man dir
			$row = 1;
			$cont_cel = 0;
			$reg = 0;
			$var3_1 = "";
			$var3_2 = "";
			$var3_3 = "";
			if (($handle = fopen($arq, "r")) !== FALSE){
			#if (($handle = fopen($path."".$file->getFileName(), "r")) !== FALSE)
			{
			  //Passagem pelas linhas
			  while (($data = fgetcsv($handle, null, ",")) !== FALSE)
			  {
			      $dd_insert = [];
			      $dd_where = [];
			      $num = count($data);
			      $row++;
			      // Passagem pelas colunas
			      for ($col = 0; $col < $num; $col++)
			      {
			      	  $cont_cel++;
			          //  DEFININDO CAMPOS DA TABELA DO  DB
			          if($reg >= 0){

				          


				          if($cont_cel == 1){
				          	#$dd_insert['data'] = str_replace(".", "", $data[$col]);
				          	$dd_where['event_id'] = $data[$col];

				          }
				          # ** RESULTADO 
			          	  # ** POSICIONAMENTO, 
			          	  # ** INFO_ADICIONAL, 
			          	  # ** GOING, 
			          	  # ** PREMIO, 
			          	  # ** CLASSE 

				     
				          if($cont_cel == 2){
				          	$dd_insert['tipologia'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$dd_insert['tipologia1'] = $data[$col];
				          }

				          // ---------------------------
				          if($cont_cel == 4){
				          	$dd_insert['tipo'] = $data[$col];
				          }

				          if($cont_cel == 6){
				          	$dd_insert['bsp'] = $data[$col];
				          }

				          if($cont_cel == 5){
				          	$nm_cavalo = str_replace("'", "", $data[$col]);
				          	$dd_where['cavalo'] = $nm_cavalo;
				          	#$dd_where['cavalo'] = $data[$col];
				          }
				          

				          // nomeia o arqvuivo font
				          #$dd_insert['arq'] = $file->getFileName();
				          $dd_insert['arq'] = $arq;
				          
				      }
			         
			          echo 'Linha: '.$row.' e na Coluna <b>'.$cont_cel.'</b> ===== '.$data[$col] . "  -  <br />\n";
			          #echo "Linha: '.$row.' e na Coluna:  ($col - <b>$cont_cel</b>) ";

			         
			          if($cont_cel == 6){
			          	
			          	if($reg >= 0 && $dd_where['cavalo'] != '------------------------------') {
			          		echo "<br>";
				          	echo "<br><p style='color:green'>";
				          	print_r($dd_insert);
							echo "<br>";
							print_r($dd_where);
							echo "</p>";
				          	echo "<br>REG: <b>$reg</b> $cont_cel ";

			          		echo "<br />";
			          		echo "<p style='color:blue'>";
			          		print_r($dd_insert);
			          		echo "</p>";
			          		echo "<br />";
			          		$where_insert = array(
			          			'event_id' => $dd_where['event_id'],
			          			'cavalo' => $dd_where['cavalo']
			          		);
			          		$this->db->where($where_insert);
			          		$qr_insert = $this->db->get('cavalos_hist');
			          		if($qr_insert->num_rows() == 0){
			          			#$this->db->insert('cavalos_hist' , $dd_insert);
			          		}else{
			          			$this->db->where($dd_where);
			          			$this->db->update('cavalos_hist' , $dd_insert);
			          		}
			          		echo "<br> TEM:  ".$qr_insert->num_rows()." <hr>";
				          	#$this->db->insert('corridas_cavalos_2020' , $dd_insert);
				          	#unlink($path."".$file->getFileName());
				        }


			          	$cont_cel = 0;
			          	$reg++;
			      
				          print_r($dd_insert);

				          	echo "<br />";
				          	array_shift($dd_insert);

				          echo "<br><hr>";
			          	
			          }    
			      } // x for
			  } // x while
			  fclose($handle);
			  #unlink($path."".$file->getFileName());
			  #fclose($handle);
			} // x if handle
		if($cont > 20){
		    	return false;
		    }
		}
		#} // x laço q percorre os arquivos


	} // x fn

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
			          if($reg >= 0){

				          if($cont_cel == 1){
				          	$nm_cavalo = str_replace("'", "", $data[$col]);
				          	$dd_insert['cavalo'] = str_replace("---", "", $nm_cavalo);
				          }


				          if($cont_cel == 2){
				          	$dd_insert['data'] = $data[$col];
				          }
				          if($cont_cel == 3){
				          	$pista_csv = str_replace("(AW)", "", $data[$col]);
				          	$var3 = explode(" ", $pista_csv);
				          	#$var3 = explode(",", $data[$col]);
				          	$dd_insert['pista'] = $var3[0];
				          	$count_ex = count($var3);
				          	#echo "<span style='color:green'>".$data[$col]."</span> <strong> [".$count_ex."]<br />";
				          	#if($count_ex == 3){
					          	$meio = $var3[1];
					          	$sigla1 = substr($meio,0,2);
					          	$sigla2 = substr($var3[1],2,10);
					          	#$dd_insert['premio'] = $var3[2];
					          	$dd_insert['premio'] = $var3[2];
					        #}
					        
					        if($count_ex > 3){
					          	$meio = $var3[2];
					          	$sigla1 = substr($meio,0,2);
					          	$sigla2 = substr($meio,2,10);
					          	#$count_ex2 = $count_ex-1;
					          	#$dd_insert['premio'] = $count_ex2;
					          	$dd_insert['premio'] = $var3[$count_ex-1];
					        }


					        if(
					        	$dd_insert['pista'] == "Bal" OR
					        	$dd_insert['pista'] == "Ballinrob" OR
					        	$dd_insert['pista'] == "Bel" OR
					        	$dd_insert['pista'] == "Bellewstown" OR
					        	$dd_insert['pista'] == "Clo" OR
					        	$dd_insert['pista'] == "Clonmel" OR
					        	$dd_insert['pista'] == "Cor" OR
					        	$dd_insert['pista'] == "Cur" OR
					        	$dd_insert['pista'] == "Dun" OR
					        	$dd_insert['pista'] == "Dundalk" OR
					        	$dd_insert['pista'] == "Fai" OR
					        	$dd_insert['pista'] == "Fairyhouse" OR
					        	$dd_insert['pista'] == "Gow" OR
					        	$dd_insert['pista'] == "Kil" OR
					        	$dd_insert['pista'] == "Kildorrery" OR
					        	$dd_insert['pista'] == "Leo" OR
					        	$dd_insert['pista'] == "Lim" OR
					        	$dd_insert['pista'] == "Limerick" OR
					        	$dd_insert['pista'] == "Lisronagh" OR
					        	$dd_insert['pista'] == "Navan" OR
					        	$dd_insert['pista'] == "Nav" OR
					        	$dd_insert['pista'] == "Pun" OR
					        	$dd_insert['pista'] == "Punchestown"  OR
					        	$dd_insert['pista'] == "Ros"  OR
					        	$dd_insert['pista'] == "Sli"  OR
					        	$dd_insert['pista'] == "Tip"  OR
					        	$dd_insert['pista'] == "Tipperary"  OR
					        	$dd_insert['pista'] == "Tra"  OR
					        	$dd_insert['pista'] == "Wex" 

					    		){

					        		$dd_insert['classe'] = "";
				          			$dd_insert['tipo'] = $sigla1.$sigla2;


					        	}else{

					        		$dd_insert['classe'] = $sigla1;
				          			$dd_insert['tipo'] = $sigla2;

					        	}
					        
				          	
				          	#echo "<h2 color:red>".$var3[$count_ex-1]." **** </h2>";
				          	/*
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
				          	*/

				          	
				          	


				          	
				          	#$dd_insert['class'] = $data[$col];
				          }
				          if($cont_cel == 4){
				          	$dd_insert['distancia'] = $data[$col];
				          }
				          if($cont_cel == 5){
				          	$dd_insert['going'] = $data[$col];
				          }
				          if($cont_cel == 6){
				          	#$posicoes = explode("-", $data[$col]);
				          	#$dd_insert['peso'] = $data[$col];
				          	#$trat_peso = explode("-", $data[$col]);
				          	#$mes_1 = $trat_peso[0];
				          	#$mes = $trat_peso[1];



				          	$peso_csv = $data[$col];
				          	$peso_csv = str_replace(["/","."], "-", $peso_csv);
				          	$posicoes = explode("-", $peso_csv);
				          	$dd_insert['peso'] = $peso_csv;
				          	$trat_peso = explode("-", $peso_csv);
				          	$mes_1 = $trat_peso[0];
				          	$mes = $trat_peso[1];



				          	// trata peso
				          	$mes = str_replace(["p","p1","h","b","b1","t","v","v1","t1","tv1","tv"], "", $mes);

				          	if($mes_1 == "jan"){
								$mes_1 = "1";
							}
							if($mes_1 == "fev"){
								$mes_1 = "2";
							}
							if($mes_1 == "mar"){
								$mes_1 = "3";
							}
							if($mes_1 == "Abr"){
								$mes_1 = "04";
							}
							if($mes_1 == "mai"){
								$mes_1 = "5";
							}
							if($mes_1 == "jun"){
								$mes_1 = "6";
							}
							if($mes_1 == "jul"){
								$mes_1 = "7";
							}
							if($mes_1 == "ago"){
								$mes_1 = "8";
							}
							if($mes_1 == "set"){
								$mes_1 = "9";
							}
							if($mes_1 == "out"){
								$mes_1 = "10";
							}
							if($mes_1 == "nov"){
								$mes_1 = "11";
							}
							if($mes_1 == "dez"){
								$mes_1 = "12";
							}
				          	
				          	if($mes == "jan."){
								$mes = "1";
							}
							if($mes == "fev."){
								$mes = "2";
							}
							if($mes == "mar."){
								$mes = "3";
							}
							if($mes == "Abr."){
								$mes = "04";
							}
							if($mes == "mai."){
								$mes = "5";
							}
							if($mes == "jun."){
								$mes = "6";
							}
							if($mes == "jul."){
								$mes = "7";
							}
							if($mes == "ago."){
								$mes = "8";
							}
							if($mes == "set."){
								$mes = "9";
							}
							if($mes == "out."){
								$mes = "10";
							}
							if($mes == "nov."){
								$mes = "11";
							}
							if($mes == "dez."){
								$mes = "12";
							}

							if($mes == "jan"){
								$mes = "1";
							}
							if($mes == "fev"){
								$mes = "2";
							}
							if($mes == "mar"){
								$mes = "3";
							}
							if($mes == "Abr"){
								$mes = "04";
							}
							if($mes == "mai"){
								$mes = "5";
							}
							if($mes == "jun"){
								$mes = "6";
							}
							if($mes == "jul"){
								$mes = "7";
							}
							if($mes == "ago"){
								$mes = "8";
							}
							if($mes == "set"){
								$mes = "9";
							}
							if($mes == "out"){
								$mes = "10";
							}
							if($mes == "nov"){
								$mes = "11";
							}
							if($mes == "dez"){
								$mes = "12";
							}


							$peso_tratado = $mes_1."-".$mes;
							$peso_tratado = str_replace(" 1", "", $peso_tratado);
							$dd_insert['peso'] = $peso_tratado;




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
				          	#$odd_percentual  = explode("/", $dd_insert['odd']);
				          	#$div_odd = $odd_percentual[0] / $odd_percentual[1];
				          	#$dd_insert['odd'] = $div_odd;
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
			          	echo "<br>REG: <b>$reg</b> $cont_cel <hr>";
			          	if($reg >= 0 && $dd_insert['selection_name'] != '------------------------------') {
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
			  unlink($path."".$file->getFileName());
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

		<form action="'.base_url().'horses/set_import" method="post" enctype="multipart/form-data" target="_blank">
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

	function get_cavalos_dia($dia="",$quais=""){
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
				$recente = "";
				#$call = "-- <br />";
				$call = "";
				$qr_csv = "";
				$nuns = "";
				$pais = "";
				
				$qr_hist = $this->db->query("select * from cavalos_hist_dia where cavalo = '".$dd->name."' ORDER BY data_trat desc LIMIT 1");

				#$qr_csv_gb = $this->db->query("select * from corridas_cavalos_gb where selection_name = '".$dd->name."' ORDER BY data_evento desc LIMIT 1");

				#$qr_csv_ire = $this->db->query("select * from corridas_cavalos_ire where selection_name = '".$dd->name."' ORDER BY data_evento desc LIMIT 1");

				$qr_csv = $this->db->query("select * from corridas_cavalos_dia where selection_name = '".$dd->name."' ORDER BY data_evento desc LIMIT 1");

				##  SOMA
				$qr_hist_total = $this->db->query("select * from cavalos_hist_dia where cavalo = '".$dd->name."'")->num_rows();

				$qr_hist_total_ant = $this->db->query("select * from cavalos_hist_dia where cavalo = '".$dd->name."' AND data_trat < '".date("Y-m-d")."'  ")->num_rows();

				#$qr_csv_gb_total = $this->db->query("select * from corridas_cavalos_gb where selection_name = '".$dd->name."' ")->num_rows();

				#$qr_csv_ire_total = $this->db->query("select * from corridas_cavalos_ire where selection_name = '".$dd->name."' ")->num_rows();

				$qr_csv_total = $this->db->query("select * from corridas_cavalos_dia where selection_name = '".$dd->name."' ")->num_rows();

				$total_gb_ire = $qr_csv_total;



				/*
				if($qr_csv_gb->num_rows() > 0){
					$qr_csv = $qr_csv_gb;	
					$pais = "GB";
				}

				if($qr_csv_ire->num_rows() > 0){
					$qr_csv = $qr_csv_ire; 	
					$pais = "IRE";
				}

				#if($qr_csv_gb->num_rows() > 0 && $qr_csv_ire->num_rows() > 0 ){

				

					
					$last_gb = $qr_csv_gb->row()->data_evento; 
					$last_ire = $qr_csv_ire->row()->data_evento; 

					$last_gb_tt = strtotime($last_gb);
					$last_ire_tt = strtotime($last_ire);
					
					if($last_gb_tt > $last_ire_tt){
						$recente = " GB ";
						$qr_csv = $qr_csv_gb;	
					}else{
						$recente = " IRE ";
						$qr_csv = $qr_csv_ire; 	
					}
					#$nuns = "<span style='color:blue'>".$last_gb." (".$last_gb_tt.") | ".$last_ire." (".$last_ire_tt.") ***** ".$recente."</span>";

					#$nuns = " ***** <span style='color:red'>TOTAL HIST: ".$qr_hist_total."  | Total GB: ".$qr_csv_gb_total.") | Total IRE: ".$qr_csv_ire_total." (".$last_ire_tt.")  ".$recente."</span>";
				}else{

					if($qr_csv_gb->num_rows() > 0 || $qr_csv_ire->num_rows() > 0 ){
						#$nuns = "";
						#$nuns = "<span style='color:blue'>  *****+++ "."</span>";
					}
				}
				*/



				if( ($qr_hist_total_ant == 0 && $total_gb_ire == 0) && ($quais == "" OR $quais == "nfoi")){
					$call = $dd->name." <strong>(Não tem cavalos_hist)</strong><br />";
				}else{


					if($qr_hist->num_rows()  > 0){

						$data_hist = $qr_hist->row()->data_trat;
						$data_csv = $qr_csv->row()->data_evento;
						if($data_csv == $data_hist){
							#$call = "<strong style='color:green'>".$data_csv."  "." = ".$data_hist." || ".$pais." ----</strong> -- $runs<br>";	
							$call = "";
						}else{
							if($data_csv != $data_hist){
								if($quais == "" OR $quais == "des" AND ( $qr_hist->num_rows() > 0 )){
									#$call = $dd->name." <strong style='color:red'>".$data_csv."  "." = ".$data_hist." || ".$recente." ****</strong> -- ".$nuns." <br />";	
									#$call = " [".$dd->id."] ".$dd->name."  || ".$recente."   ";	
									$call = " [".$dd->id."] ".$dd->name."  || <br />   ";	


									if($qr_hist_total_ant < $total_gb_ire){
										echo "<span style='color:red'>(((Desatualizado))) - ".$qr_hist_total_ant."<".$total_gb_ire."</span>";
									}else{
										echo "<span style='color:green'>(((Atualizado)))  - ".$qr_hist_total."(<u>".$qr_hist_total_ant."</u>)>".$total_gb_ire."</span>";
									}
								
									}
								}else{
									$call = "";

								}
						}
					}
					

				}
;
				echo $call;
				#echo "<br />";
			}
		}
	}

	function get_cavalos_geral($dia="",$quais=""){
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
				$recente = "";
				#$call = "-- <br />";
				$call = "";
				$qr_csv = "";
				$nuns = "";
				$pais = "";
				
				$qr_hist = $this->db->query("select * from cavalos_hist where cavalo = '".$dd->name."' ORDER BY data_trat desc LIMIT 1");

				#$qr_csv_gb = $this->db->query("select * from corridas_cavalos_gb where selection_name = '".$dd->name."' ORDER BY data_evento desc LIMIT 1");

				#$qr_csv_ire = $this->db->query("select * from corridas_cavalos_ire where selection_name = '".$dd->name."' ORDER BY data_evento desc LIMIT 1");

				$qr_csv = $this->db->query("select * from corridas_cavalos_dia where selection_name = '".$dd->name."' ORDER BY data_evento desc LIMIT 1");

				##  SOMA
				$qr_hist_total = $this->db->query("select * from cavalos_hist where cavalo = '".$dd->name."'")->num_rows();

				$qr_hist_total_ant = $this->db->query("select * from cavalos_hist where cavalo = '".$dd->name."' AND data_trat < '".$dia."'  ")->num_rows();

				$qr_csv_gb_total = $this->db->query("select * from corridas_cavalos_gb where selection_name = '".$dd->name."' ")->num_rows();

				$qr_csv_ire_total = $this->db->query("select * from corridas_cavalos_ire where selection_name = '".$dd->name."' ")->num_rows();

				#$qr_csv_total = $this->db->query("select * from corridas_cavalos_dia where selection_name = '".$dd->name."' ")->num_rows();

				$total_gb_ire = $qr_csv_total;



				/*
				if($qr_csv_gb->num_rows() > 0){
					$qr_csv = $qr_csv_gb;	
					$pais = "GB";
				}

				if($qr_csv_ire->num_rows() > 0){
					$qr_csv = $qr_csv_ire; 	
					$pais = "IRE";
				}

				#if($qr_csv_gb->num_rows() > 0 && $qr_csv_ire->num_rows() > 0 ){

				

					
					$last_gb = $qr_csv_gb->row()->data_evento; 
					$last_ire = $qr_csv_ire->row()->data_evento; 

					$last_gb_tt = strtotime($last_gb);
					$last_ire_tt = strtotime($last_ire);
					
					if($last_gb_tt > $last_ire_tt){
						$recente = " GB ";
						$qr_csv = $qr_csv_gb;	
					}else{
						$recente = " IRE ";
						$qr_csv = $qr_csv_ire; 	
					}
					#$nuns = "<span style='color:blue'>".$last_gb." (".$last_gb_tt.") | ".$last_ire." (".$last_ire_tt.") ***** ".$recente."</span>";

					#$nuns = " ***** <span style='color:red'>TOTAL HIST: ".$qr_hist_total."  | Total GB: ".$qr_csv_gb_total.") | Total IRE: ".$qr_csv_ire_total." (".$last_ire_tt.")  ".$recente."</span>";
				}else{

					if($qr_csv_gb->num_rows() > 0 || $qr_csv_ire->num_rows() > 0 ){
						#$nuns = "";
						#$nuns = "<span style='color:blue'>  *****+++ "."</span>";
					}
				}
				*/



				if( ($qr_hist_total_ant == 0 && $total_gb_ire == 0) && ($quais == "" OR $quais == "nfoi")){
					$call = $dd->name." <strong>(Não tem cavalos_hist)</strong><br />";
				}else{


					if($qr_hist->num_rows()  > 0){

						$data_hist = $qr_hist->row()->data_trat;
						$data_csv = $qr_csv->row()->data_evento;
						if($data_csv == $data_hist){
							#$call = "<strong style='color:green'>".$data_csv."  "." = ".$data_hist." || ".$pais." ----</strong> -- $runs<br>";	
							$call = "";
						}else{
							if($data_csv != $data_hist){
								if($quais == "" OR $quais == "des" AND ( $qr_hist->num_rows() > 0 )){
									#$call = $dd->name." <strong style='color:red'>".$data_csv."  "." = ".$data_hist." || ".$recente." ****</strong> -- ".$nuns." <br />";	
									#$call = " [".$dd->id."] ".$dd->name."  || ".$recente."   ";	
									$call = " [".$dd->id."] ".$dd->name."  || <br />   ";	


									if($qr_hist_total_ant < $total_gb_ire){
										echo "<span style='color:red'>(((Desatualizado))) - ".$qr_hist_total_ant."<".$total_gb_ire."</span>";
									}else{
										echo "<span style='color:green'>(((Atualizado)))  - ".$qr_hist_total."(<u>".$qr_hist_total_ant."</u>)>".$total_gb_ire."</span>";
									}
								
									}
								}else{
									$call = "";

								}
						}
					}
					

				}
;
				echo $call;
				#echo "<br />";
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

function converte_data_str(){
	#$qr = $this->db->query("SELECT id,data FROM cavalos_hist WHERE hora IS NULL");
	$qr = $this->db->query("SELECT id,data FROM cavalos_hist WHERE data_trat IS NULL OR data_trat = '0000-00-00' ");
	echo $qr->num_rows();
	foreach($qr->result() as $dd){
		$data = str_replace(".","", $dd->data);
		$data = str_replace("-","", $data);
		echo $data." = ";

		if(strlen($data) == 6){
			$data = "0".$data;
		}

		$dia = substr($data, 0,2);
		$mes = substr($data, 2,3);
		$ano = substr($data, 5,2);
		if($mes == "jan" || $mes == "Jan"){
			$mes = "01";
		}
		if($mes == "Feb" || $mes == "Feb"){
			$mes = "02";
		}
		if($mes == "mar" || $mes == "Mar"){
			$mes = "03";
		}
		if($mes == "Apr" || $mes == "apr"){
			$mes = "04";
		}
		if($mes == "May" || $mes == "may"){
			$mes = "05";
		}
		if($mes == "jun" || $mes == "Jun"){
			$mes = "06";
		}
		if($mes == "jul" || $mes == "Jul"){
			$mes = "07";
		}
		if($mes == "Aug" || $mes == "aug"){
			$mes = "08";
		}
		if($mes == "Sep" || $mes == "sep"){
			$mes = "09";
		}
		if($mes == "Oct" || $mes == "oct"){
			$mes = "10";
		}
		if($mes == "nov" || $mes == "Nov"){
			$mes = "11";
		}
		if($mes == "Dec" || $mes == "dec"){
			$mes = "12";
		}
		if($ano > 50){
			$data_trat = "19".$ano."-".$mes."-".$dia;
		}else{
			$data_trat = "20".$ano."-".$mes."-".$dia;
		}
		echo $data_trat;
		echo "<br>";
		$dd_data = array("data_trat" => $data_trat);
		$this->db->where('id',$dd->id);
		$this->db->update("cavalos_hist" , $dd_data);
	}
}

function separa_idade_horse(){
	$qr = $this->db->query("select id,classe from cavalos_hist where classe like '%y%'");
	foreach($qr->result() as $dd){
		#$idade = explode("y", $dd->tipo);
		$idade = explode("y", $dd->classe);
		echo $idade[0];
		$idade_sem_y = str_replace("y", "", $idade[0]);
		echo "<br />";
		$new_tipo = str_replace($idade[0]."y", "", $dd->classe);
		$dd_idade = array("idade" => $idade_sem_y[0] , 'classe' => $new_tipo);
		$this->db->where('id',$dd->id);
		$this->db->update("cavalos_hist" , $dd_idade);
	}

}


function separa_campos_horse(){
	$qr = $this->db->query("select DISTINCT classe from cavalos_hist");
	foreach($qr->result() as $dd){
		#$idade = explode("y", $dd->tipo);
		$count = strlen($dd->classe);
		$idade = explode("y", $dd->classe);
		#echo $idade[0];
		echo $dd->classe."  (<strong>".$count.")</strong>";
		echo ' ----------- ';
		if (mb_strpos($dd->classe, 'y') !== false) {
			$pos      = strripos($dd->classe, "y");
			$de = $pos - 1;
			$y = substr($dd->classe,$de,2);
			echo "Y ==== ".$pos." ===== ".$y;
			$new_y = array('idade' => $y);
			$this->db->where('classe',$dd->classe);
			$this->db->update("cavalos_hist" , $new_y);
		}
		/*
		if (mb_strpos($dd->classe, 'C') !== false) {
			$pos      = strripos($dd->classe, "C");
			#$de_C = $pos - 1;
			$c = substr($dd->classe,$pos,2);
			echo " |||||||||||  C ==== ".$pos." ===== ".$c;
			#$classe_ = str_replace("Ac", "", $dd->classe);
			$new_c = array('classe_' => $c);
			$this->db->where('classe',$dd->classe);
			$this->db->update("cavalos_hist" , $new_c);
		}		
		*/
		echo "<br />";
		$new_tipo = str_replace($idade[0]."y", "", $dd->classe);
		$dd_idade = array("idade" => $idade[0] , 'classe' => $new_tipo);
		#$this->db->where('id',$dd->id);
		#$this->db->update("cavalos_hist" , $dd_idade);
	}

}

function separa_y_horse(){

	#comentado por augusto
	#$qr = $this->db->query("select DISTINCT classe from cavalos_hist");
	$qr = $this->db->query("select DISTINCT classe from cavalos_hist WHERE idade IS NULL and (classe IS NOT NULL and classe <> '')");
	foreach($qr->result() as $dd){
		#$idade = explode("y", $dd->tipo);
		$count = strlen($dd->classe);
		$idade = explode("y", $dd->classe);
		#echo $idade[0];
		echo $dd->classe."  (<strong>".$count.")</strong>";
		echo ' ----------- ';
		if (mb_strpos($dd->classe, 'y') !== false) {
			$pos      = strripos($dd->classe, "y");
			$de = $pos - 1;
			$y = substr($dd->classe,$de,2);
			$idade_sem_y = str_replace("y", "", $y);
			echo "Y ==== ".$pos." ===== ".$y;
			$new_y = array('idade' => $idade_sem_y);
			$this->db->where('classe',$dd->classe);
			$this->db->update("cavalos_hist" , $new_y);
		}
		
		echo "<br />";
		
	}

}




function resolve_classe(){
	$qr = $this->db->query("SELECT DISTINCT sigla FROM classe WHERE sigla <> 'L' AND  sigla <> 'FFF' ");
	#$qr = $this->db->query("SELECT DISTINCT sigla FROM classe WHERE sigla = 'C5' ");
	$where_rem = "";
	foreach($qr->result() as $dd){
		$where_rem .= "AND classe NOT LIKE '%".$dd->sigla."%'";

		#augusto adicionou classe IS NOT NULL
		$qr_hist = $this->db->query("SELECT *  FROM cavalos_hist WHERE classe LIKE '%".$dd->sigla."%' AND foi_classe = 0 and classe IS NOT NULL");
		#$qr_hist = $this->db->query("SELECT *  FROM cavalos_hist WHERE id = 11099 ");
		#$qr_hist = $this->db->query("SELECT *  FROM cavalos_hist WHERE id = 18054 ");
		if($qr_hist->num_rows() > 0){

			foreach($qr_hist->result() as $dd2){
				$this->db->query("UPDATE cavalos_hist SET  classe = '".$dd->sigla."' , classe_ = '".$dd2->classe."' , foi_classe = 1 WHERE classe LIKE '%".$dd->sigla."%' ");
				

				#$this->db->query("UPDATE cavalos_hist SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE id LIKE '".$dd->id."' ");
				#$this->db->query("UPDATE cavalos_hist SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE id = '".$dd2->id."' ");
				#$this->db->query("UPDATE cavalos_hist SET classe_ =  classe_ = '".$dd->sigla."' WHERE id = '".$dd2->id."' ");
				echo "Sigla: ".$dd->sigla." rows: ".$qr_hist->num_rows()." ".$dd2->classe." ID: ".$dd2->id;
				echo "<br>";
			}	
		}

		#return false;

		#$qr_hist_rem = $this->db->query("SELECT *  FROM cavalos_hist WHERE classe <> 'L' AND foi_classe = 0 ");

		

		//UPDATE `wwtrad_ts`.`cavalos_hist` SET `classe`='C4' WHERE `id`=16;
		#$this->db->query("UPDATE cavalos_hist SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE classe LIKE '".$dd->sigla."' ");
		#$this->db->query("UPDATE cavalos_hist SET classe_ = '".$dd->sigla."' , classe_ = '".$dd->sigla."' WHERE id LIKE '".$dd->id."' ");

		
	}
	$qr_hist_rem = $this->db->query("SELECT *  FROM cavalos_hist WHERE classe <> 'L' ".$where_rem." AND foi_classe = 0  AND classe IS NOT NULL");
	echo "<br><hr>";
	echo "<h1>".$qr_hist_rem->num_rows()."</h1>";		
	echo "<br><hr>";
	foreach($qr_hist_rem->result() as $dd_rem){
		echo $id_rem = $dd_rem->id;
		echo $dd_rem = $dd_rem->classe;
		echo "<br>";
		print_r($id_rem); 
		echo "<br>";
		$dd_new_class = array('classe' => "" , 'classe_' => $dd_rem);
		print_r($dd_new_class); 
		$this->db->where('id',$id_rem);
		$this->db->update('cavalos_hist' , $dd_new_class);

		echo "<br>";
	}

}

function limpa_cavalo_hist(){
	$this->db->query("DELETE from cavalos_hist where data like '%days break%' or pista like '%Changed%' or pista like '%Gelded%' or classe = 'Su' ");
}


function pistas_str(){
	echo "OK";
}

function set_cavalos_dia_em_cavalos(){
		#$this->db->query("");
		#echo "OK 1";
		#$qr = $this->db->query("select * from cavalos_hist_dia where (data_trat BETWEEN '".date("Y-m-d")."00:00:01' AND '".date("Y-m-d")."23:59:59') ");
		#$qr = $this->db->query("select * from cavalos_hist_dia where data_trat = '".date("Y-m-d")."'");
		
		echo date("Y-m-d");
		echo "<br />";
		echo "<br />";
		#$qr = $this->db->query("select * from cavalos_hist_dia where data_trat >= '".date("Y-m-d")."'");

		
		#$qr = $this->db->query("select * from cavalos_dia WHERE foi_cavalos = 0 LIMIT 700");
		$qr = $this->db->query("select * from cavalos_dia");



		#$qr = $this->db->query("select * from cavalos_dia WHERE nome = 'Shesadabber' ");

		
		#$qr = $this->db->query("select * from cavalos_hist_dia where data_trat = '2021-07-20'");

		echo $qr->num_rows();
		echo "<br />";
		if($qr->num_rows() > 0){



			$contador = 0;
			foreach($qr->result() as $dd){ $contador++;

				$where_dia = array(
					#'data_trat' => $dd->data_trat,
					'nome' => $dd->nome
				);
				$this->db->where($where_dia);
				$qr_dia = $this->db->get('cavalos_dia');

				$dd_sincr = array(
					
					'qtd_corridas' => $dd->qtd_corridas,
					'vitorias' => $dd->vitorias,
					'vitorias_place' => $dd->vitorias_place,
					'porcentagem_win' => $dd->porcentagem_win,
					'porcentagem_win_place' => $dd->porcentagem_win_place,
					#'jockey' => $dd->jockey,
					#'treinador'  => $dd->treinador
				);
				// if going != ""{ n faz nada }
				$this->db->where($where_dia);
				$qr_ver_g = $this->db->get('cavalos');

				if($qr_ver_g->num_rows() > 0){
					$this->db->where($where_dia);
					$this->db->update('cavalos' , $dd_sincr);
					echo "<h3 style='color:green'>UPDATE em cavalos: ";
					echo print_r($dd_sincr);
					echo "</h3>";
				}
				
				
				echo "<h1>".$dd->nome."</h1>";

				echo "<h2 style='color:red'>".$qr_dia->num_rows()."</h2>";
				echo "<p>";
				print_r($dd);
				echo "</p>";
				echo "<br />";
				echo "<p>";
				echo "<strong>QTD Corridas:".$dd->qtd_corridas."</strong><br>";
				echo "<strong>Vitorias:".$dd->vitorias."</going><br>";
				echo "<strong>Vitoria place:".$dd->vitorias_place."</strong><br>";
				echo "<strong>% WIN:".$dd->porcentagem_win."</strong><br>";
				echo "<strong>% Place:".$dd->porcentagem_win_place."</strong><br>";
				
				
				
				echo "</p>";
				echo "<br />";

				$dd_foi_cavalos = array('foi_cavalos' => 1);
				$this->db->where('id',$dd->id);
				$this->db->update('cavalos_dia' , $dd_foi_cavalos);

				$dd_dia = array('dia' => 1);
				$this->db->where('nome',$dd->nome);
				$this->db->update('cavalos',$dd_dia);

			}
		}
		echo "OK 2";

		#$n = 9;
		#$status_checkin = array('status' => 1);
		#$this->db->where('id',$n);
		#$this->db->update('cron_checkin' , $status_checkin);

	}
	
	function resolve_classe_vazia(){

		$this->db->query("UPDATE cavalos_hist SET foi_classe = REPLACE(foi_classe, 0, 1) WHERE classe = '' or classe = 'L'");


			echo "<br>";




	}

	function truncate_tabelas_link_alanna(){


		$this->db->query("truncate table tabela_cavalo_geral");
		$this->db->query("truncate table tabela_cavalo_link");

		

	}

	function delete_runs_horses_nao_gb_ire(){


		$this->db->query("DELETE from runs_horses where countryCode <> 'GB' and countryCode <> 'IE'");
		

	}

	function replace_peso_carregado(){


		$this->db->query("UPDATE cavalos_hist SET  peso_carregado = REPLACE(peso_carregado, '-', '.')");
		

	}
	
	function limpeza_geral(){


		$this->db->query("TRUNCATE TABLE cavalos_dia");
		$this->db->query("TRUNCATE TABLE cavalos_hist_dia");
		$this->db->query("TRUNCATE TABLE corridas_cavalos_dia");
		$this->db->query("TRUNCATE TABLE jockeys_hist_dia");
		$this->db->query("TRUNCATE TABLE odds_mkt_horses_dia");
		$this->db->query("TRUNCATE TABLE runs_dd_horses_dia");
		$this->db->query("TRUNCATE TABLE selections_horses_dia");
		$this->db->query("TRUNCATE TABLE treinadores_dia");
		$this->db->query("TRUNCATE TABLE treinadores_dia");
				

	}
	


	
}

