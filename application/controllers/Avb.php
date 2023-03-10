<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avb extends CI_Controller {

	
	function index() {
		
		echo "OK";
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

	function get_dd_cabalos_avb(){
		$qr = $this->db->query("SELECT * FROM selections_avb WHERE foi = 0 ORDER BY id asc LIMIT 10000");
		foreach ($qr->result() as $dd) {
			$data_trat = substr($dd->dt,0,10);
			$qr_hist = $this->db->query("SELECT * FROM cavalos_hist WHERE cavalo = '".$dd->selection_name."' AND data_trat = '".$data_trat."' ");
			echo $data_trat." ".$dd->selection_name." (".$qr_hist->num_rows().") ";
			if($qr_hist->num_rows() > 0){
				$dd_up = array(
					'o_r' => $qr_hist->row()->or,
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

	function calc_win_by_or(){
		echo "OK";
		echo "WIN LOSE<br />";


		$c = 0;
		$parcial = 0;
		$qr = $this->db->query("SELECT DISTINCT id_mkt FROM selections_avb WHERE win_lose IS NOT NULL ORDER BY id asc ");
		echo "<h1>".$qr->num_rows()."</h1>";
		foreach ($qr->result() as $dd) { 
			$qr_nun = $this->db->query("SELECT  * FROM selections_avb WHERE id_mkt = '".$dd->id_mkt."' AND classificacao IS NOT NULL ");
			echo $dd->id_mkt." (".$qr_nun->num_rows().") ";
			if($qr_nun->num_rows() > 1){
				$c = 0;
				foreach($qr_nun->result() as $h){ $c++;
					$cavalo_id[$c] = $h->id;
					$cavalo[$c] = $h->selection_name;
					$cavalo_or[$c] = $h->o_r;
					$odd = $h->odd;
					if($h->odd == 1.71){
						$odd = 2;
					}
					$cavalo_odd[$c] = $odd;
					$cavalo_win[$c] = $h->win_lose;
					$cavalo_classificacao[$c] = $h->classificacao;					
				}
				$dd_lose = array('win_lose' => 0);
				$dd_win = array('win_lose' => 1);
				if($cavalo_or[1] == $cavalo_or[2]){
					echo "IGUAL<br>";
				}else{	
					if( ($cavalo_or[1] > $cavalo_or[2] && $cavalo_win[1] == 1) OR ($cavalo_or[2] > $cavalo_or[1] && $cavalo_win[2] == 1) ){

						$calc = ($cavalo_odd[1] - 1) * 93;
						$parcial = $parcial - $calc;
						
						echo " <span style='color:red'>";
						echo "(".$cavalo_or[1].")".$cavalo[1]." <strong style='color:blue'>".$cavalo_classificacao[1]."</strong> x <strong style='color:blue'>".$cavalo_classificacao[2]."</strong> ".$cavalo[2]."(".$cavalo_or[2].") ============= ".$parcial." [@".$cavalo_odd[1]." @".$cavalo_odd[2]."] ";
						echo "</span> - R$ $calc <br>";

					}else{

						$parcial = $parcial + 93;
						echo " <span style='color:green'>";
						echo "(".$cavalo_or[1].")".$cavalo[1]." <strong style='color:blue'>".$cavalo_classificacao[1]."</strong> x <strong style='color:blue'>".$cavalo_classificacao[2]."</strong> ".$cavalo[2]."(".$cavalo_or[2].") ============= ".$parcial." [@".$cavalo_odd[1]." @".$cavalo_odd[2]."] ";
						echo "</span> + R$ 93<br>";
					}
				}
				
			}
			echo "<br>";
		}
		
	}
	

	function calc_win(){
		echo "WIN LOSE<br />";
		$c = 0;
		$qr = $this->db->query("SELECT DISTINCT id_mkt FROM selections_avb WHERE classificacao IS NOT NULL ORDER BY id asc ");
		foreach ($qr->result() as $dd) { 
			$qr_nun = $this->db->query("SELECT  * FROM selections_avb WHERE id_mkt = '".$dd->id_mkt."' AND classificacao IS NOT NULL ");
			echo $dd->id_mkt." (".$qr_nun->num_rows().") ";
			if($qr_nun->num_rows() > 1){
				$c = 0;
				foreach($qr_nun->result() as $h){ $c++;
					$cavalo_id[$c] = $h->id;
					$cavalo[$c] = $h->selection_name;
					$cavalo_or[$c] = $h->o_r;
					$cavalo_classificacao[$c] = $h->classificacao;					
				}
				$dd_lose = array('win_lose' => 0);
				$dd_win = array('win_lose' => 1);
				if($cavalo_classificacao[1] < $cavalo_classificacao[2]){
					$this->db->where('id',$cavalo_id[1]);
					$this->db->update('selections_avb',$dd_win);
					$this->db->where('id',$cavalo_id[2]);
					$this->db->update('selections_avb',$dd_lose);
				}else{
					$this->db->where('id',$cavalo_id[2]);
					$this->db->update('selections_avb',$dd_win);
					$this->db->where('id',$cavalo_id[1]);
					$this->db->update('selections_avb',$dd_lose);
				}
				echo " <span style='color:green'>";
				echo "(".$cavalo_or[1].")".$cavalo[1]." <strong style='color:blue'>".$cavalo_classificacao[1]."</strong> x <strong style='color:blue'>".$cavalo_classificacao[2]."</strong> ".$cavalo[2]."(".$cavalo_or[2].")";
				echo "</span><br>";
			}
			echo "<br>";
		}
		
	}

	function set_odd(){
		echo "SET  ODD<br />";
		$c = 0;
		$qr = $this->db->query("SELECT * FROM selections_avb WHERE odd IS  NULL ORDER BY id asc");
		echo "<h1>".$qr->num_rows()."</h1>";
		$dd_odd = array( 'odd' =>  1.71);
		foreach ($qr->result() as $dd) { 
			echo $dd->selection_name." ".$dd->odd." -- ";
			$this->db->where('id',$dd->id);
			$this->db->update('selections_avb',$dd_odd);
			#echo $dd->id_mkt." <br> ";
			echo " <br> ";
		}
	}

	function set_classificacao(){
		echo "SET  Classificacao<br />";
		#$c = 0;
		#$qr = $this->db->query("SELECT * FROM selections_avb WHERE classificacao IS  NULL ORDER BY id asc");
		$qr = $this->db->query("SELECT * FROM selections_avb WHERE 
			classificacao = 'PU' OR
			classificacao = 'CO' OR
			classificacao = 'DSQ' OR
			classificacao = 'F' OR
			classificacao = 'REF' OR
			classificacao = 'RO' OR
			classificacao = 'RR' OR
			classificacao = 'UR' 
			ORDER BY id asc");
		echo "<h1>".$qr->num_rows()."</h1>";
		$dd_classificacao = array( 'classificacao' =>  99);
		foreach ($qr->result() as $dd) { 
			echo $dd->selection_name." ".$dd->classificacao." -- ";
			$this->db->where('id',$dd->id);
			$this->db->update('selections_avb',$dd_classificacao);
			#echo $dd->id_mkt." <br> ";
			echo " <br> ";
		}
	}


	function set_or(){
		echo "SET  OR<br />";
		$c = 0;
		$qr = $this->db->query("SELECT * FROM selections_avb WHERE o_r IS  NULL ORDER BY id asc");
		echo "<h1>".$qr->num_rows()."</h1>";
		$dd_odd = array( 'o_r' => 0);
		foreach ($qr->result() as $dd) { 
			echo $dd->selection_name." ".$dd->o_r." -- ";
			$this->db->where('id',$dd->id);
			$this->db->update('selections_avb',$dd_odd);
			#echo $dd->id_mkt." <br> ";
			echo " <br> ";
		}
	}

	function avb_fila(){
		$qr = $this->db->query("SELECT * FROM runs_horses WHERE countryCode = 'AV'  AND status = 1 ORDER BY marketId;");
		if($qr->num_rows() > 0){
			foreach($qr->result() as $dd){
				echo $dd->selection_name." ".$dd->odd." -- ";
				echo "<br>";
			}
		}
	}

	
}

