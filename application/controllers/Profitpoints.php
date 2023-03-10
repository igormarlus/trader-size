<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profitpoints extends CI_Controller {

	
	
	function index() {
		#echo "sad";
		#return false;
		/*
		$this->load->model('transferencias_model');
		
		$dados['bonus'] = $this->usuarios_model->get_bonus($this->session->userdata('id'));
		$dados['rede_e'] = $this->usuarios_model->get_rede($this->session->userdata('id'),'e');
		$dados['rede_d'] = $this->usuarios_model->get_rede($this->session->userdata('id'),'d');
		
		$id_user = $this->session->userdata('id');
		$dados['bonus_e'] = $this->usuarios_model->get_bonus_lado($id_user,'e','0');
		$dados['bonus_d'] = $this->usuarios_model->get_bonus_lado($id_user,'d','0');
		$dados['bonus_e2'] = $this->usuarios_model->get_bonus_lado($id_user,'e','1');
		$dados['bonus_d2'] = $this->usuarios_model->get_bonus_lado($id_user,'d','1');
		
		$dados['bonus_e_total'] = ($dados['bonus_e']-$dados['bonus_e2']) + $dados['bonus_e2'];
		$dados['bonus_d_total'] = ($dados['bonus_d']-$dados['bonus_d2']) + $dados['bonus_d2'];
		
		$dados['wallet'] = $this->transferencias_model->extrato($this->session->userdata('id'));
		$dados['wallet_transfer'] = $this->transferencias_model->extrato($this->session->userdata('id'),'transfer');
		if($this->session->userdata('nivel') == '1'){
			$dados['planos_user'] = $this->padrao_model->get_qr('user_plano','asc','id');
		}else{
			#$where_plano = array('');
			#$this->db->where($where_plano);
			$dados['planos_user'] = $this->padrao_model->get_by_matriz('patrocinador',$this->session->userdata('id'),'user');
		}
		*/
		#echo $dados['wallet'];
		#return false;
		
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		#$this->load->view('bo/base' , $dados);	
		//redirect('');
		$this->load->view('pp/base' , $dados);	
	}
	
	function base() {
		$dados['bonus'] = $this->usuarios_model->get_bonus($this->session->userdata('id'));
		$dados['rede_e'] = $this->usuarios_model->get_rede($this->session->userdata('id'),'e');
		$dados['rede_d'] = $this->usuarios_model->get_rede($this->session->userdata('id'),'d');
		
		$id_user = $this->session->userdata('id');
		$dados['bonus_e'] = $this->usuarios_model->get_bonus_lado($id_user,'e','0');
		$dados['bonus_d'] = $this->usuarios_model->get_bonus_lado($id_user,'d','0');
		$dados['bonus_e2'] = $this->usuarios_model->get_bonus_lado($id_user,'e','1');
		$dados['bonus_d2'] = $this->usuarios_model->get_bonus_lado($id_user,'d','1');
		
		$dados['bonus_e_total'] = ($dados['bonus_e']-$dados['bonus_e2']) + $dados['bonus_e2'];
		$dados['bonus_d_total'] = ($dados['bonus_d']-$dados['bonus_d2']) + $dados['bonus_d2'];
		
		
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		$this->load->view('dash/base' , $dados);	
	}
	
	function base_limpa() {
		
		$dados['bonus'] = $this->usuarios_model->get_bonus($this->session->userdata('id'));
		$dados['rede_e'] = $this->usuarios_model->get_rede($this->session->userdata('id'),'e');
		$dados['rede_d'] = $this->usuarios_model->get_rede($this->session->userdata('id'),'d');
		
		$id_user = $this->session->userdata('id');
		$dados['bonus_e'] = $this->usuarios_model->get_bonus_lado($id_user,'e','0');
		$dados['bonus_d'] = $this->usuarios_model->get_bonus_lado($id_user,'d','0');
		$dados['bonus_e2'] = $this->usuarios_model->get_bonus_lado($id_user,'e','1');
		$dados['bonus_d2'] = $this->usuarios_model->get_bonus_lado($id_user,'d','1');
		
		$dados['bonus_e_total'] = ($dados['bonus_e']-$dados['bonus_e2']) + $dados['bonus_e2'];
		$dados['bonus_d_total'] = ($dados['bonus_d']-$dados['bonus_d2']) + $dados['bonus_d2'];
		
		$dados['dd'] = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
		$this->load->view('dash/base_limpa' , $dados);	
	}
	
	function minha_conta($cb='') {
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['cb'] = $cb;
		$dados['dd'] = $dd;
		#$this->load->view('bo/conta' , $dados);	
		$this->load->view('dash/conta' , $dados);	
	}
	function set_perfil(){
		#print_r($_POST);
		#return false;
		$this->usuarios_model->set_perfil();
		
	}
	
	
	function upImgPortfolio(){
	//echo "teste";
		##################### X IMAGENS #########################
		
		//upload codeigniter lib
		$config['upload_path'] = './imagens/perfil/';
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
	  	$this->load->library('upload', $config);

		
		if (!$this->upload->do_upload('imagem')) {
			$status = 'error';
			$error = array('error' => $this->upload->display_errors());
			$msg = 'erro ao enviar o arquivo, tente novamente'.$error;
			echo $msg;
			print_r($error);
		} else  {
			$data = $this->upload->data();
		 
			$this->load->library('image_lib');
			
			//alterando img principal
			$conf['image_library'] = 'gd2';
			$conf['source_image'] = './imagens/perfil/'.$data['file_name'];
			$conf['new_image'] = './imagens/perfil/min/'.$data['file_name'];
			$conf['maintain_ratio'] = FALSE;
			//$conf['master_dim'] = 'height';
			$conf['height'] = 60;
			$conf['width'] = 80;
			$this->image_lib->initialize($conf); 
			$this->image_lib->resize();
			
			
			
			$conf3['image_library'] = 'gd2';
			$conf3['source_image'] = './imagens/perfil/'.$data['file_name'];
			$conf3['new_image'] = './imagens/perfil/por/'.$data['file_name'];
			$conf3['maintain_ratio'] = FALSE;
			//$conf['master_dim'] = 'height';
			$conf3['height'] = 375;
			$conf3['width'] = 500;
			$this->image_lib->initialize($conf3); 
			$this->image_lib->resize();
			
			$conf2['image_library'] = 'gd2';
			$conf2['source_image'] = './imagens/perfil/'.$data['file_name'];
			$conf2['new_image'] = './imagens/perfil/des/'.$data['file_name'];
			$conf2['maintain_ratio'] = FALSE;
			//$conf['master_dim'] = 'height';
			$conf2['height'] = 120;
			$conf2['width'] = 160;
			$this->image_lib->initialize($conf2); 
			$this->image_lib->resize();
			
			echo "<img src='".base_url()."imagens/perfil/min/".$data['file_name']."'>
					<input name='imagem' type='hidden' value='".$data['file_name']."'>";
		}


	}
	
	function set_lado(){
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		if($dd->lado == 'e'){
			$new_lado = 'd';			
		}else{
			$new_lado = 'e';
		}
		$dd_up_lado = array('lado' => $new_lado);
		$this->db->where('id',$this->session->userdata('id'));
		$this->db->update('user' , $dd_up_lado);
		redirect('dash');
	}
	
	function atividades() {
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['dd'] = $dd;
		#$this->load->view('bo/atividades' , $dados);	
		$this->load->view('dash/atividades' , $dados);	
	}
	
	function upgrade() {
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$dados['planos'] = $this->padrao_model->get_qr('user_plano','asc','id');
		$dados['dd'] = $dd;
		#$this->load->view('bo/upgrade' , $dados);	
		$this->load->view('dash/upgrade' , $dados);	
	}
	
	function set_plano($plano){
		$this->usuarios_model->set_plano($plano);
	}
	
	function rede_binaria($id_user=0){
		if($id_user == 0){
			$id_user = $this->session->userdata('id');
		}
		$dados['dd_user'] = $this->padrao_model->get_by_id($id_user,'user')->row();
		$dd = $this->padrao_model->get_by_id($id_user,'user')->row();
		
		$dados['bonus_e'] = $this->usuarios_model->get_bonus_lado($id_user,'e','0');
		$dados['bonus_d'] = $this->usuarios_model->get_bonus_lado($id_user,'d','0');
		
		$dados['bonus_e2'] = $this->usuarios_model->get_bonus_lado($id_user,'e','1');
		$dados['bonus_d2'] = $this->usuarios_model->get_bonus_lado($id_user,'d','1');
		
		$dados['bonus_e_total'] = ($dados['bonus_e']-$dados['bonus_e2']) + $dados['bonus_e2'];
		$dados['bonus_d_total'] = ($dados['bonus_d']-$dados['bonus_d2']) + $dados['bonus_d2'];
		#echo $dados['bonus_e'];
		
		$dados['rede_e'] = $this->usuarios_model->get_rede($id_user,"e");
		$dados['rede_d'] = $this->usuarios_model->get_rede($id_user,"d");
		$dados['dd'] = $dd;
		$this->load->view('bo/rede_binaria' , $dados);			
	}
	
	### TESTE
	function fim_rede($id_user=60170,$lado='e'){
		
		$f = 0;
		while($f < 1){
			echo "<h1>Linha ".$f."</h1>";
			$qr = $this->usuarios_model->get_rede($id_user,$lado);		
			if($qr->num_rows() == 0){
				echo $id_user." - "."<br />";
				echo "<p>nivel 1 (".$f.")</p>";
				$f++;
				#break;
			}else{	
				/*		
				// verifica quem está abaixo
				$qr_1_nivel = $this->usuarios_model->get_rede($qr->row()->id_user,$lado);
				#echo $qr_1_nivel->num_rows();
				if($qr_1_nivel->num_rows() == 0){
					echo $qr->row()->id_user;
					echo "<p>nivel 2 (".$f.")</p>";
					$f++;
					#break;
					
				}else{
				*/	
					$id_user = $qr->row()->id_user;
					#$id_user = $qr_1_nivel->row()->id_user;
					#$f++;
				#}
			}
		}
		#return false;
		/*
		$f = 0;
		while($f < 1){
			if($qr->num_rows() > 0){
				echo $qr->row()->id_rede;
				fim_rede2($qr->row()->id_user,'e');
				#$f--;
			}else{
				#$f++;	
			}
			$f++;
			echo "<br>";
			echo $f;
		}
		*/
	}
	
	function fim_rede2($id_user=60170,$lado='e'){
		
		$qr = $this->usuarios_model->get_rede($id_user,$lado);
		$f = 0;
		while($f < 1){
			if($qr->num_rows() > 0){
				echo $qr->row()->id_rede;
				fim_rede($qr->row()->id_user,'e');
				#$f--;
			}else{
				#$f++;	
			}
			$f++;
			echo "<br>";
			echo $f;
		}
	}
	
	
	function bonus(){
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$bonus = $this->usuarios_model->get_bonus($this->session->userdata('id'));
		
		
		$dados['bonus'] = $bonus;
		$dados['dd'] = $dd;
		#$this->load->view('bo/rel_bonus' , $dados);			
		$this->load->view('dash/rel_bonus' , $dados);			
	}
	
	
	function estoque(){
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$licencas = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'user_seriais');
		
		
		$dados['licencas'] = $licencas;
		$dados['dd'] = $dd;
		$this->load->view('dash/estoque' , $dados);			
	}
	
	function financeiro(){
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$bonus = $this->usuarios_model->get_financeiro($this->session->userdata('id'));
		
		
		$dados['bonus'] = $bonus;
		$dados['dd'] = $dd;
		$this->load->view('dash/financeiro' , $dados);			
	}
	
	function unilever(){
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$where = array('patrocinador' => $this->session->userdata('id') , 'status' => '1');
		$this->db->where($where);
		$diretos = $this->db->get('user');
		
		
		$dados['diretos'] = $diretos;
		$dados['dd'] = $dd;
		$this->load->view('dash/unilever' , $dados);			
	}

	function sair(){
		$this->session->sess_destroy();
		redirect('');
	}
	// encerrar conta
	function out(){
		$where = array('id' => $this->session->userdata('id'));
		$this->db->where($where);
		$dd = $this->db->get('user')->row();
		
		if($dd->plano == '0'){
			$this->db->where($where);
			$dd = $this->db->delete('user');	
			$this->session->sess_destroy();
			redirect('');
		}else{
			redirect('dash');
		}
	}
	
	################ ADM ####################
	function cadastros(){
		if($this->session->userdata('nivel') <> '1'){
			redirect('dash');
		}
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$this->db->order_by('id','desc');
		$users = $this->db->get('user');
		
		$dados['users'] = $users;
		$dados['dd'] = $dd;
		$this->load->view('bet/cadastrados' , $dados);			
	}

	function mkts(){
		$this->load->model('bet_model');
		
		if($this->session->userdata('nivel') <> '1'){
			#redirect('dash');
		}
		#echo "Opa 1";
		#return false;
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$this->db->order_by('id','desc');
		$jogos = $this->db->query("SELECT DISTINCT id_partida FROM odds_mkt");
		$mercados = $this->db->query("SELECT DISTINCT id_mkt  FROM odds_mkt");
		
		$dados['jogos'] = $jogos;
		$dados['mercados'] = $mercados;
		$dados['dd'] = $dd;
		$dados['total'] = $this->db->get('odds_mkt')->num_rows();
		$this->load->view('bet/adm/mkts' , $dados);			
	}

	function rem_mkt($id_mkt){
		//echo "opa";
		if($this->session->userdata('nivel') <> '1'){
			#redirect('dash');
		}
		$this->db->where('id_mkt',$id_mkt);
		$this->db->delete('odds_mkt');
		//redirect('dash/mkts' , 'refresh');
		$refer	= $this->agent->referrer();
		$rem_base = str_replace(base_url(), "", $refer);
		redirect($rem_base);
	}

	function clear_mkt(){
		if($this->session->userdata('nivel') <> '1'){
			#redirect('dash');
		}
		#$this->db->query(' TRUNCATE TABLE odds_mkt');
		$this->db->where('status',1);
		$qr_mkt = $this->db->get('mercados');
		echo $qr_mkt->num_rows();
		if($qr_mkt->num_rows() > 0){
			foreach($qr_mkt->result() as $mkt){
				echo $mkt->id_mkt;
				echo "<br>";
				$this->db->where('id_mkt',$mkt->id_mkt);
				$this->db->delete('odds_mkt');
			}


			$this->db->where('status',1);
			$this->db->delete('mercados');
		}
		#return false;

		#redirect('dash/mkts' , 'refresh');
	}

	function set_licenca($id_user,$plano){
		if($this->session->userdata('nivel') <> '1'){
			redirect('dash');
		}
		$this->usuarios_model->set_licenca($id_user,$plano);
		redirect('dash/cadastros');
	}

	function del_user($id_user){
		$dd_user = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		if($dd_user->executivo == '1'){
			#echo "OK";
			#return false;
			$where = array('id' => $id_user);
			$this->db->where($where);
			$this->db->delete('user');
		
			redirect('dash/cadastros');

		}else{
			redirect('dash');
		}
	}
	
	function upgrades(){
		if($this->session->userdata('nivel') <> '1'){
			redirect('dash');
		}
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$this->db->order_by('id','desc');
		$upgrades = $this->db->get('user_upgrade');
		
		$dados['upgrades'] = $upgrades;
		$dados['dd'] = $dd;
		$this->load->view('bo/upgrades' , $dados);			
	}
	function set_plano_adm($id_user,$plano){
		if($this->session->userdata('nivel') <> '1'){
			redirect('dash');
		}
		#echo "OK";
		
		$this->usuarios_model->set_plano_adm($id_user,$plano);
		#echo "cb";
		
		redirect('dash/cadastros' , 'refresh');
		
	}
	
	function niveis($id_user,$plano=4){
		if($plano > 1){
			$dd_plano = $this->padrao_model->get_by_id($plano,'user_plano')->row();
			echo "<h1>".$dd_plano->nome." - ".$dd_plano->valor."</h1>";
			echo " <hr/>";
			$dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
			$dd_patr1 = $this->padrao_model->get_by_id($dd_user->patrocinador,'user')->row();
			$dd_patr2 = $this->padrao_model->get_by_id($dd_patr1->patrocinador,'user')->row();
			$dd_patr3 = $this->padrao_model->get_by_id($dd_patr2->patrocinador,'user')->row();
			$dd_patr4 = $this->padrao_model->get_by_id($dd_patr3->patrocinador,'user')->row();
			$dd_patr5 = $this->padrao_model->get_by_id($dd_patr4->patrocinador,'user')->row();
			// nivel 1 10%
			echo "<h1>Nível 1:  ".$dd_patr1->login."</h1>";
			#$porcentagem = $this->padrao_model->get_by_id($dd_user_rede->plano,'user_plano')->row()->ganho;
			$valor = ( 10 / 100 ) * $dd_plano->valor;	
			echo "<p>$".$valor." (já ganhou pela indicação direta)</p>";
			
			// nivel 2 // 2%
			echo "<h2>Nível 2: ".$dd_patr2->login."</h2>";
			$valor = ( 2 / 100 ) * $dd_plano->valor;	
			echo "<p>$".$valor."</p>";
			
			// nivel 3 1.5%
			echo "<h3>Nível 3: ".$dd_patr3->login."</h3>";
			$valor = ( 1.5 / 100 ) * $dd_plano->valor;	
			echo "<p>$".$valor."</p>";
			
			// nivel 4  1%
			echo "<h4>Nível 4: ".$dd_patr4->login."</h4>";
			$valor = ( 1 / 100 ) * $dd_plano->valor;	
			echo "<p>$".$valor."</p>";
			
			// nivel 5 0.5%
			echo "<h5>Nível 5: ".$dd_patr5->login."</h5>";
			$valor = ( 0.5 / 100 ) * $dd_plano->valor;	
			echo "<p>$".$valor."</p>";
		}
		
	}
	
	function subir_bonus_semanal(){
		$qr_user = $this->padrao_model->get_qr('user','asc','id');
		$subir = false;
		foreach($qr_user->result() as $user){
			#$dados['bonus_e_total'] = $this->usuarios_model->get_bonus_lado($id_user,'e','todos');
			#$dados['bonus_d_total'] = $this->usuarios_model->get_bonus_lado($id_user,'d','todos');
			$bonus_e = $this->usuarios_model->get_bonus_lado($user->id,'e','0')-$this->usuarios_model->get_bonus_lado($user->id,'e','1');
			$bonus_d = $this->usuarios_model->get_bonus_lado($user->id,'d','0')-$this->usuarios_model->get_bonus_lado($user->id,'d','1');
			$dd_plano_user = $this->padrao_model->get_by_id($user->plano,'user_plano')->row();
			if($bonus_d > $bonus_e){
				$lado = "d";
				$valor_up = $bonus_e;
				$prox_lado = 'e';	
				$subir = true;			
			}
			
			if($bonus_d < $bonus_e){
				$lado = "e";
				$valor_up = $bonus_d;
				$prox_lado = 'd';
				$subir = true;
			}
			
			if($subir == true){			
				$dd_update_user = array('lado_prox' => $prox_lado);
				$this->db->where('id',$user->id);
				$this->db->update('user' , $dd_update_user);
				
				#echo $dd_plano;
				$dd_pontos = array(
					'id_user' => $user->id,
					'id_user_mov' => 4, // id do user que envia o bonus semanal
					'descricao' => "Binário ",
					'tipo' => 'Bonus Semanal',
					'status' => 1,
					'lado' => $lado,
					'valor' => $valor_up
				);
				// inseri o bonus para subtrair na perna maior
				$this->db->insert('ms',$dd_pontos);
				
				// inseri o bonus para subtrair na outra perna
				$dd_pontos['lado'] = $prox_lado;
				$this->db->insert('ms',$dd_pontos);
				
				// subir valores financeiros de acordo com o plano e a soma dos pontos
				if($valor_up > 0){
					$valor_fincanceiro = ($dd_plano_user->ganho / 100) * $valor_up;
					#echo "(".$user->plano.")".$dd_plano_user->ganho." * ". $valor_up."<br>";
					//( 2 / 100 ) * $dd_plano->valor
					$dd_financeiro = array(
						'id_user' => $user->id,
						'id_user_mov' => 4, // id do user que envia o bonus semanal
						'descricao' => "Binário ",
						'tipo' => 'Bonus Diário',
						'status' => 1,
						#'lado' => $lado,
						'valor' => $valor_fincanceiro
					);
					$this->db->insert('movimento',$dd_financeiro);
				}
				
				
			}
			
			
			
			echo $user->login." ".$bonus_e." <-> ".$bonus_d." ".$lado.": ".$valor_fincanceiro." <br/>";
		}
		echo "OK";
	}
	
	
	

	
	
}
