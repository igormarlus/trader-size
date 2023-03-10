<?php
class Zap extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('form','url'));
		$this->load->model('adm/usuarios_model');

		//$this->usuarios_model->verSession();

   } // fecha fn USER

	function Index(){
		echo "OK";
	}
	
	function get_dd_zap(){

		header('Access-Control-Allow-Origin: *');
		date_default_timezone_set('America/Recife');
		if($_POST){
			print_r($_POST);
			$nome = $this->input->post('nome');
			$msg = $this->input->post('msg');
			$contato = $this->input->post('contato');
			$id_user = $this->input->post('id_user');
			$id_whats = $this->input->post('id_whats');

			$id_produto = 0;
			if(isset($_POST['id_produto'])){
				$id_produto = $this->input->post('id_produto');
			}
			/*

			##  CERIFICA PALAVRAS NA VARIAVEL
			if (mb_strpos($msg, 'manual') !== false) {
				$id_produto = 186;
			}
			if (mb_strpos($msg, 'Manual') !== false) {
				$id_produto = 186;
			}

			if (mb_strpos($msg, 'natuprost') !== false) {
				$id_produto = 320;
			}

			if (mb_strpos($msg, 'Natuprost') !== false) {
				$id_produto = 320;
			}

			if (mb_strpos($msg, 'Natu prost') !== false) {
				$id_produto = 320;
			}

			if (mb_strpos($msg, 'natu prost') !== false) {
				$id_produto = 320;
			}

			if (mb_strpos($msg, 'Natu prost') !== false) {
				$id_produto = 320;
			}
			if (mb_strpos($msg, 'natu prost') !== false) {
				$id_produto = 320;
			}

			if (mb_strpos($msg, 'Vi isso no Facebook') !== false) {
				$id_produto = 322;
			}

			if (mb_strpos($msg, 'GotaVita') !== false) {
				$id_produto = 322;
			}

			if (mb_strpos($msg, 'Gota Vita') !== false) {
				$id_produto = 322;
			}

			if (mb_strpos($msg, 'Minox-A') !== false) {
				$id_produto = 324;
			}

			if (mb_strpos($msg, 'MinoxA') !== false) {
				$id_produto = 324;
			}

			if($smg == "Sim! eu tenho esses sintomas."){
				$this->set_send_sequencia($contato,2,$id_user);
			}

			if($smg == "Não! Eu não tenho esses sintomas."){
				$this->set_send_sequencia($contato,3,$id_user);
			}
			*/

			



			## X ##################

			$dd_insert = array('id_user' => $id_user ,'nome' => $nome ,'contato' => $contato ,'msg' => $msg, 'id_produto' => $id_produto , 'id_whats' => $id_whats);
			$this->db->insert('pi_whats' , $dd_insert);

			#print_r( $dd_insert);
			#return false;

			$this->db->where('telefone',$contato);
			$qr_ver = $this->db->get("pi_whats_users");
			if($qr_ver->num_rows() == 0){
				$dd_insert_user = array('id_user' => $id_user ,'nome' => $nome ,'telefone' => $contato , 'id_produto' => $id_produto );

				if($id_produto > 0){
					$dd_insert_user['nivel'] = 1;
					$dd_insert_user['status'] = 1;



					#########################  VERIFICA SEQUENCIAS ##################
					/*
					$arr_where = array('id_produto' => $id_produto, 'start' => 1  );
					$this->db->where($arr_where);
					$this->db->order_by('ordem','asc');
					#$this->db->limit(1);
					$qr_pro_seq = $this->db->get("pi_whats_msgs_sequencias");

					#print_r($dd_insert_user);
					#return false;
					if($qr_pro_seq->num_rows() > 0){
						foreach($qr_pro_seq->result() as $seq_user){
							$id_sequencia = $seq_user->id;
							echo "Sequencia: ".$id_sequencia." ".$qr_pro_seq->num_rows()." Id seq: ".$id_sequencia." Contato ".$contato;
							$this->set_send_sequencia($contato,$id_sequencia,$id_user);
						}
						#return false;
					}*/


					######################### X VERIFICA SEQUENCIAS #################
				}

				if(isset($_POST['img'])){
					$dd_insert_user['status'] = $this->input->post('img');
				}

				$this->db->insert('pi_whats_users' , $dd_insert_user);
			}else{
				if($id_produto > 0){
					if($qr_ver->row()->status == 1 ){
						return false;
					}else{
						$id_whats_user = $qr_ver->row()->id;
						$dd_up_whats = array('id_produto' => $id_produto , 'nivel' => 1, 'status' => 1);
						$this->db->where('id',$id_whats_user);
						$this->db->update('pi_whats_users',$dd_up_whats);
					}
				}
			}



		}else{
			$msg = "NADA";
		}
			

	}

	function get_send_msg($id_user=0){
		header('Access-Control-Allow-Origin: *');
		#$this->db->where('enviada',0);
		#$qr = $this->db->get('pi_whats_msgs_sends');
		if($id_user == 0){
			if(isset($_POST['id_user'])){
				$id_user = $this->input->post('id_user');
				$where_user = " AND s.id_user = '".$id_user."' ";
			}else{
				$where_user = "";
			}
		}else{
			$where_user = " AND s.id_user = '".$id_user."' ";
		}
		#if(isset($_POST['versao'])){

			$versao = $this->input->post('versao');
			/*
			if($versao == 'venom'){

				$qr = $this->db->query("SELECT s.id, s.data_envio, s.id_sequencia ,m.video, m.nome, s.id_msg, s.contato, m.mensagem, m.tipo, m.imagem, m.audio, m.audio_venom FROM pi_whats_msgs_sends as s INNER JOIN pi_whats_msgs as m ON s.id_msg = m.id WHERE enviada = 0 AND m.tipo = 2 AND data_envio < NOW() $where_user ORDER BY s.data_envio asc LIMIT 1 ");

			}

			if($versao == 'master'){

				$qr = $this->db->query("SELECT s.id, s.data_envio, s.id_sequencia ,m.video, m.nome, s.id_msg, s.contato, m.mensagem, m.tipo, m.imagem, m.audio, u.nome as nome_user
				FROM pi_whats_msgs_sends as s 
				INNER JOIN pi_whats_msgs as m ON s.id_msg = m.id 
				INNER JOIN pi_whats_users as u ON u.telefone = s.contato
				WHERE enviada = 0 AND data_envio < NOW() $where_user ORDER BY s.data_envio asc LIMIT 1 ");
				
			}

			*/
		#}else{
			$qr = $this->db->query("SELECT s.id, s.data_envio, s.id_sequencia ,m.video, m.nome, s.id_msg, s.cavalo ,s.contato, m.mensagem, m.tipo, m.imagem, m.audio, u.nome as nome_user
				FROM pi_whats_msgs_sends as s 
				INNER JOIN pi_whats_msgs as m ON s.id_msg = m.id 
				INNER JOIN pi_whats_users as u ON u.telefone = s.contato
				WHERE enviada = 0 AND data_envio < NOW() $where_user ORDER BY s.data_envio asc LIMIT 1 ");
		#}
		if($qr->num_rows() > 0){
			#foreach($qr->result() as $dd){
				#echo print_r($dd);
				$puch_json = json_encode($qr->result());
				echo $puch_json;

				#$qr2 = $this->db->query("SELECT s.id s.id_msg, s.contato, m.mensagem, m.tipo, m.imagem, m.audio FROM pi_whats_msgs_sends as s INNER JOIN pi_whats_msgs as m ON s.id_msg = m.id WHERE enviada = 0  ");
				foreach($qr->result() as $dd){
					$dd_new = array('enviada' => 1);
					$this->db->where('id',$dd->id);
					$this->db->update('pi_whats_msgs_sends',$dd_new);
				}

			#}
		}else{
			echo "not";
		}
	} // x fn

	function qr_respota_buttons(){
		header('Access-Control-Allow-Origin: *');	
		$q = $this->input->post('q');
		$contato = $this->input->post('contato');
		$id_user = $this->input->post('id_user');
		$this->db->where('texto',$q);
		$qr_bt = $this->db->get('pi_whats_msgs_buttons');
		if($qr_bt->num_rows() > 0){
			$id_sequencia = $qr_bt->row()->id_sequencia_prox;
			if($id_sequencia == 0){
				echo "0";
			} else{
				$this->set_send_sequencia($contato,$id_sequencia,$id_user);
				echo $id_sequencia;

			}
			 
		}else{
			echo "0";
		}
	}




	function set_send_sequencia($contato=0,$id_sequencia=0,$id_user=0){
	
	#header('Access-Control-Allow-Origin: *');	

	date_default_timezone_set('America/Recife');
	if($contato == 0 && $id_sequencia == 0){
		$id_sequencia = $this->input->post('id_msg');
		$contato = $this->input->post('contato');
	}
	$data_envio = date('Y-m-d h:i:s');
	print_r($POST);

	if($_POST['id_user']){
		$id_user = $this->input->post('id_user');
	}


	echo $data_envio;
	echo "<br>";

	$dt_start = date("Y-m-d H:i:s");
	echo $dt_start;

	$dt_start = date("Y-m-d H:i:s");
	$data_hj = new DateTime($dt_start);
	$dias = 5;
	$segundos = 10000;

	#$data_hj->modify("+".$dias." days"); // soma dias
	#$data_hj->modify("+".$intervalo_farm->format('%s%')." seconds"); // soma segundos
	#$data_send = $data_hj->format('Y-m-d H:i:s');
	/*
	echo "<br>";
	#echo $data_send;
	echo "<br>";
	echo "<hr>";

	print_r($_POST);
	*/

	#return false;

	$qr_sequencia = $this->db->query("SELECT * FROM pi_whats_msgs_sequencias WHERE id = $id_sequencia ");
	if($qr_sequencia->num_rows() > 0){
		$qr_msg_sequencia = $this->db->query("SELECT * FROM pi_whats_msgs_sequencias_send WHERE id_sequencia = ".$qr_sequencia->row()->id." ORDER BY ordem asc ");
		echo $qr_sequencia->num_rows();
		echo '<br>';
		if($qr_msg_sequencia->num_rows() > 0){
			$nivel = $qr_sequencia->row()->nivel;
			$dd_user_seq = array('nivel' => $nivel);
			$this->db->where('telefone',$contato);
			$this->db->update('pi_whats_users' , $dd_user_seq);

			foreach($qr_msg_sequencia->result() as $msg){
				#echo $msg->id." - ".$msg->ordem;
				#echo "<br>";
				// DEFINIR TEMPO DA PRIMXA MENSAGEM
				// $data_envio = "";

				$dt_start = date("Y-m-d H:i:s");
				$data_hj = new DateTime($dt_start);
				$dias = $msg->dias_para_envio;
				$segundos = $msg->segundos_para_envio;
				if($dias > 0){
					$data_hj->modify("+".$dias." days"); // soma dias
				}
				if($segundos > 0){
					$data_hj->modify("+".$segundos." seconds"); // soma segundos
				}
				$data_send = $data_hj->format('Y-m-d H:i:s');
				#echo "-- ";
				#echo $data_send;
				echo "<br>";
				$data_envio = $data_send;



				$dd = array('id_msg' => $msg->id_msg , 'id_sequencia' => $id_sequencia , 'id_user' => $id_user, 'contato' => $contato , 'data_envio' => $data_envio); // 
				if($this->db->insert('pi_whats_msgs_sends' , $dd)){
					#echo "OK ";
					echo $msg->id." - ".$msg->ordem." -- ".$data_envio;
					#echo "<br>";
				}

			}
		}
		//print_r($qr_msg_sequencia->result());
	}

	#print_r($_POST);
	#$dd = array('id_msg' => $id_msg , 'contato' => $contato , 'data_envio' => $data_envio);
	/*if($this->db->insert('pi_whats_msgs_sends' , $dd)){
		echo "OK";
	}
	*/
	
}




	function acompanhamento_ads($id_produto=320){
		echo "OK";
		$this->load->library('user_agent');

		if ($this->agent->is_robot()){

			$ip = $this->agent->robot();
			$pagina = "-";
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
			$pagina = $_SERVER['SCRIPT_NAME'];
		}

		$refer	= $this->agent->referrer();

		$dd_insert = array(
			'ip' => $ip,
			'obs' => $refer,
			'link' => $pagina,
			'id_produto' => $id_produto
		);
		$this->db->insert('acompanhamento_ads' , $dd_insert);

	}

	function get_buttons($number=1,$id_msg=6){
		header('Access-Control-Allow-Origin: *');
		$qr = $this->db->query("SELECT * FROM pi_whats_msgs_buttons WHERE id_msg = $id_msg");
		if($qr->num_rows() > 0){
			#foreach($qr->result() as $dd){
				echo json_encode($qr->result());
			#}
		}
	}
	
} // x class