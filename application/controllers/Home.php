<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->padrao_model->indexador();
    }

	
	function index(){

		$this->load->helper('language');
		$this->load->model('betfront_model');


		//////// CONF ATUAL
		/*
		$url_atual = $_SERVER['REQUEST_URI'];
		#echo $this->uri->total_segments();
		$seg = $this->uri->segment(1);
		$exp_url_barra = explode("/",$url_atual);
		#echo "<br>";
		#print_r($exp_url_barra);
		#echo "<br /><hr>";
		$exp_sufixo_url = explode("?",$exp_url_barra[4]);
		#print_r($exp_sufixo_url);
		if(strlen($exp_url_barra[2]) > 1){
			redirect($exp_url_barra[1]."/".$exp_url_barra[2]."/".$exp_url_barra[3]."/".$exp_sufixo_url[0]."/");
		}
		*/
		

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
		
		#$this->load->view('2019/novo-index' , $dados);
		$this->tradingesportivo();
		
	}

	function tradingesportivo($cb=""){
		/*
		$url_atual = $_SERVER['REQUEST_URI'];
		#echo $this->uri->total_segments();
		$seg = $this->uri->segment(1);
		$exp_url_barra = explode("/",$url_atual);
		#echo "<br>";
		#print_r($exp_url_barra);
		#echo "<br /><hr>";
		$exp_sufixo_url = explode("?",$exp_url_barra[4]);
		#print_r($exp_sufixo_url);
		if(strlen($exp_url_barra[2]) > 1){
			//redirect($exp_url_barra[1]."/".$exp_url_barra[2]."/".$exp_url_barra[3]."/".$exp_sufixo_url[0]."/");
		}
*/

		$this->lang->load('lp','portuguese-brazilian');
		#echo "ss";
		$dados['title'] = '';
		$dados['cb'] = $cb;
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			#$this->load->view('site/hots_home' , $dados);	
			#$this->load->view('site/bts_home' , $dados);	
			$this->load->view('site/bts_home_new' , $dados);	
			
		}else{
			#$this->load->view('site/index' , $dados);	
			$this->load->view('front/lp' , $dados);	
			#$this->load->view('front/lp-monetizze' , $dados);	
		}
	}

	function lp($cb="",$cod=""){
		
		/*
		$url_atual = $_SERVER['REQUEST_URI'];
		#echo "OK";
		#return false;
		#echo $this->uri->total_segments();
		$seg = $this->uri->segment(1);
		$exp_url_barra = explode("/",$url_atual);
		#echo "<br>";
		print_r($exp_url_barra);
		echo "<br /><hr>";
		return false;
		$exp_sufixo_url = explode("?",$exp_url_barra[4]);
		#print_r($exp_sufixo_url);
		if(strlen($exp_url_barra[2]) > 1){
			
			//redirect($exp_url_barra[1]."/".$exp_url_barra[2]."/".$exp_url_barra[3]."/".$exp_sufixo_url[0]."/");
		}
		*/

		$dados['cb'] = $cb;
		$dados['cod'] = $cod;
		$this->lang->load('lp','portuguese-brazilian');
		#echo "OK 2";
		#return false;
		#echo "ss";
		$dados['title'] = '';
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			#$this->load->view('site/hots_home' , $dados);	
			#$this->load->view('site/bts_home' , $dados);	
			#$this->load->view('site/bts_home_new' , $dados);	
			//redirect('futebol');
			$this->load->view('front/lp-monetizze' , $dados);	
		}else{
			#$this->load->view('site/index' , $dados);	
			$this->load->view('front/lp-monetizze' , $dados);	
		}
	}
	
	function en() {
		#echo "ss";
		$this->lang->load('lp','english');
		$dados['title'] = '';
		if($this->session->userdata('id')){
			$dados['hots'] = $this->padrao_model->get_qr('odds_hot',$ord='desc',$campo='id',$limit=20,$inicio=0);
			#$this->load->view('site/hots_home' , $dados);	
			$this->load->view('site/bts_home' , $dados);	
			
		}else{
			#$this->load->view('site/index' , $dados);	
			$this->load->view('front/lp' , $dados);	
		}

	}

	function planos(){
		$dados['title'] = "Cadastro Trade Size - PLANOS";
		$this->lang->load('lp','portuguese-brazilian');
		$this->load->view('front/planos' , $dados);	
		
	}

	function cadastro($login_patrocinador="tradersize",$id_plano=0,$cb='') {
		if($id_plano == 0){
			redirect('home/planos');
		}
		#echo $login_patrocinador;
		#return false;
		if($login_patrocinador == "0"){
		#	$dados['user'] = false;
		}else{
			
			#$qr_verifica_user = $this->db->query("SELECT * FROM user WHERE login = '".$login_patrocinador."' AND plano > 0");
			$qr_verifica_user = $this->db->query("SELECT * FROM user WHERE login = '".$login_patrocinador."' AND plano > 0");
			#echo $qr_verifica_user->num_rows();
			#return false;
			if($qr_verifica_user->num_rows() > 0){
				$dados['user'] = true;
				$dados['dd_user'] = $qr_verifica_user->row();
			}else{
				$dados['user'] = false;
			}
		}
		$dados['cb'] = $cb;
		$dados['id_plano'] = $id_plano;
		$this->load->view('site/cadastro2' , $dados);	

	}
	
	function cadastrar(){
		$this->load->model('usuarios_model');
		$this->usuarios_model->cadastrar();
	}
	
	
	function confirm($pin){
		
		$qr_verifica = $this->padrao_model->get_by_matriz('senha2',$pin,'user');
		#echo $qr_verifica->num_rows();
		#return false;
		if($qr_verifica->num_rows() > 0){
			$dd_user = $qr_verifica->row();
			$dd_verifica = array('verificado' => '1' , 'status' => '1');
			$this->db->where('id',$dd_user->id);
			$this->db->update('user',$dd_verifica);
			
			
			// login
			$dd_user = $qr_verifica->row();

			$dd_session = array(
				'usr' => true,
				'id' => $dd_user->id,
				'nome' => $dd_user->nome,
				'nivel' => $dd_user->nivel,				
				'plano' => $dd_user->plano,
				'login' => $dd_user->login
			);

			$this->session->set_userdata($dd_session);			
			redirect('home/login');
			
		}else{
			redirect('');			
		}
	}
	
	function verifica_patrocinador(){
		$q = $_POST['q'];
		$qr = $this->db->query("SELECT * FROM user WHERE login = '$q'");
		if($qr->num_rows() > 0){
			echo "<input type='hidden' name='id_patrocinador' value='".$qr->row()->id."' /> ".$qr->row()->nome." ";
		}else{
			echo "Nenhum Resultado Encontrado.";
		}
	}
	
	function verifica_login(){
		$q = $_POST['q'];
		$qr = $this->db->query("SELECT * FROM user WHERE login = '$q'");
		if($qr->num_rows() > 0){
			return false;
			echo "0";
		}else{
			#echo "Nenhum Resultado Encontrado.";
			#return true;
			echo "1";
		}
	}
	
	function login($cb='') {
		#echo "ss";
		$dados['cb'] = $cb;
		#$this->load->view('site/login' , $dados);	
		$this->load->view('front/login' , $dados);	
		//redirect('');

	}
	
	function logar(){
		$this->load->model('usuarios_model');
		$this->usuarios_model->logar();
	}

	function sol_pass(){
		$this->load->model('usuarios_model');
		$this->usuarios_model->sol_pass();
	}
	
	function new_pass($pin,$cb='') {
		#echo $pin;
		$qr_ver = $this->padrao_model->get_by_matriz('senha2',$pin,'user');
		if($qr_ver->num_rows() == 0){
			redirect('');
		}
		$dados['dd'] = $qr_ver->row();
		#echo $qr_ver->num_rows();
		#echo "ss";
		$dados['pin'] = $pin;
		$dados['cb'] = $cb;
		#$this->load->view('site/login' , $dados);	
		$this->load->view('front/new_pass' , $dados);	
		//redirect('');

	}

	function set_new_senha(){
		#print_r($_POST);
		$qr_ver = $this->padrao_model->get_by_matriz('senha2',$this->input->post('pin'),'user');
		if ( $qr_ver->num_rows() == 0){
			redirect('');
		}
		$pin = $this->input->post('pin');
		$senha = $this->input->post('senha');
		$senha_confirm = $this->input->post('senha_confirm');
		if($senha != $senha_confirm){
			redirect('home/new_pass/'.$pin."/conf_invalid");
		}
		$dd_senha = array('senha' => md5($senha));
		$this->db->where('senha2',$pin);
		$this->db->update('user',$dd_senha);
		redirect('home/login/alt_senha');
		#echo "ioa";
	}
	
	function loginbetfair($vendor_cliente=''){
		#if($id == ''){
		#	redirect('');
		#}
		#echo $this->session->userdata('id');
		#echo " -- <br>";
		#echo $vendor_cliente;
		#return false;
		$qr = $this->padrao_model->get_by_matriz('vendor_cliente',$vendor_cliente,'user');
		#$qr = $this->padrao_model->get_by_id($this->session->userdata('id'),'user');
		#echo $qr->num_rows();
		#echo "<br>";
		#echo $this->session->userdata('id');
		#return false;
		if($qr->num_rows() > 0){
			$dd = $qr->row();
			//print_r($dd);
			/*
			
			print_r($dd);
			echo "<br>***<br>";
			print_r($_SESSION);
			echo "<br>id: ".$this->session->userdata('id');
			echo "<br>";
			print_r($this->session->userdata);   
			
			echo "&&&&&&& ******<br >";
			echo $dd->id." - ".$this->session->userdata('id');
			echo "<br> opa";
			
			return false;
			*/
			
			if($dd->login == 'temp'){
				#$this->session->userdata('id').' --';
				$dd_temp = $dd;
				
				$dd_refreh_token = array(
					'vendor_cliente' => $dd_temp->vendor_cliente,
					'token' => $dd_temp->token,
					'token_refresh' => $dd_temp->token_refresh,
					'token_type' => $dd_temp->token_type
				);
				
				
			}else{
			
				$dd_refreh_token = array(
					'vendor_cliente' => $dd->vendor_cliente,
					'token' => $dd->token,
					'token_refresh' => $dd->token_refresh,
					'token_type' => $dd->token_type
				);
			}
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->update('user' , $dd_refreh_token);	
			
			
			
			if($dd->login == 'temp'){
				#$this->session->userdata('id').' --';
				$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
			}
			
			
			$dd_user = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		
			$dd_session = array(

				'usr' => true,
		
				'vendor_cliente' => $dd->vendor_cliente,
				
				'token' => $dd->token,
				
				'token_refresh' => $dd->token_refresh,
				
				'token_type' => $dd->token_type,
				
				#'id' => $dd_user->id,

								'id' => $dd->id,
								
								'bid' => $dd->id.'-',

								'nome' => $dd->nome,

								'nivel' => $dd->nivel,
								
								'plano' => $dd->plano,

								'login' => $dd->login

				
				
				// re-session
				#'usr' => true,
				/*
				'id' => $dd_user->id,
				'nome' => $dd_user->nome,
				'nivel' => $dd_user->nivel,				
				'plano' => $dd_user->plano,
				'login' => $dd_user->login
				*/

	/*	
				'nome' => $dd_user->nome,
		
				'nivel' => $dd_user->nivel,
				
				'plano' => $dd_user->plano,
		
				'login' => $login
				*/
	
			);
					
			#$this->session->sess_destroy();
			$this->session->set_userdata($dd_session);
			/*
			print_r($_SESSION);
			echo "<br>id: ".$this->session->userdata('id');
			echo "<br>";
			print_r($this->session->userdata);   
			return false;
			*/
			// remove temp
			#$where_del = array('vendor_cliente' => $dd->vendor_cliente, 'login' => 'temp');
			#$this->db->where($where_del);
			#$this->db->detele('user');
			
			// atualiza sessão e token no usuário cadastrado
			#unset($dd_session['user']);
			#$this->db->where('id',$this->session->userdata('id'));
			#$this->db->update('user' , $dd_session);
			
			#echo $this->session->userdata('token');
			#redirect('bet/hots');
			#redirect('bet/bests');
			#print_r($this->session->userdata());
			#return false;
			redirect('futebol');
			
		}
		
		
		
	}
	
	// go7busness
	function post_mail() {
		header('Access-Control-Allow-Origin: *');
		echo "OPpa";
		print_r($_POST);
		$this->db->where('email',$_POST['email']);
		$qr = $this->db->get('newsletter_emails');
		if($qr->num_rows() > 0){
			echo "<p style='color:red'>E-mail já registrado.</p>";
		}else{
			if($this->db->insert('newsletter_emails' , $_POST)){
				echo "<p style='color:green'>Cadastro realizado com sucesso</p>";
			}
		}
		
		

	}
	
	
	function icones(){
		#echo "asdsd";
		$this->load->view('bet/icones');
	}
	
	function get_total(){
		header('Access-Control-Allow-Origin: *');
		$dd = $this->padrao_model->get_qr('bot_valores')->row();
		echo 'Total P/L $'.number_format($dd->total, 2, ',', '.');
	}
	
	function get_total_strategie(){
		header('Access-Control-Allow-Origin: *');
		$dd = $this->padrao_model->get_qr('bot_valores')->row();
		echo 'Straregies 1/1 Total P/L:  $ '.number_format($dd->total, 2, ',', '.');
	}
	
	function get_total_only(){
		header('Access-Control-Allow-Origin: *');
		$dd = $this->padrao_model->get_qr('bot_valores')->row();
		echo '$'.number_format($dd->total, 2, ',', '.');
	}
	
	function get_eventos(){
		header('Access-Control-Allow-Origin: *');
		#$dd = $this->padrao_model->get_qr('bot_valores')->row();
		$add = 0;
		$conteudo = '';
		$this->db->order_by('id','asc');
		$qr = $this->db->get('bot_eventos');
		$um = 0;
		foreach($qr->result() as $eve){ $um++;
			if($eve->status == 'MATCHED'){
				$color = "#90EE90";
			}else{
				$color = "#C1C1FD";
			}
			
			if($eve->pl == '0.00'){
				$pl = "";
			}else{
				$pl = "&euro;".number_format($eve->pl, 2, ',', '.');
			}
			
			$dd = $this->padrao_model->get_qr('bot_valores')->row();
			if($eve->red == '1'){
				$new_valor = $dd->total-$eve->matched;		
				$color_pl = 'red';
			}else{
				$new_valor = $dd->total+$eve->matched;
				$color_pl = 'green';
			}
			if($um == 1){
				$bg_seta = "images/seta.jpg";
			}else{
				$bg_seta = "images/bg-seta.jpg";
			}
			
			$conteudo .= '
			<tr class="list">
					<td style="background-image:url('.$bg_seta.')">&nbsp;</td>
					<td style="font-family:Verdana, Geneva, sans-serif;padding-left:5px;font-weight:">'.$eve->evento.'</td>
					<td style="background-color:'.$color.';text-align:center;font-family:Tahoma, Geneva, sans-serif;font-size:10px">'.$eve->status.'</td>
					<td style="text-align:center;font-family:Tahoma, Geneva, sans-serif;font-size:9px;padding:0px;font-weight:bold">&euro;'.number_format($eve->matched, 2, ',', '.').'</td>
					<td style=text-align:center;font-family:Tahoma">&euro;0,00</td>
					<td style=""></td>
					<td style="background-color:#00b7ff;text-align:center;font-size:10px;font-family:Tahoma;">BACK</td>
					<td style="text-align:center;font-weight:bold">2</td>
					<td style="text-align:center;font-weight:bold">2</td>
					<td style="color:'.$color_pl.';text-align:center;font-weight:bold"> '.$pl.'</td>
					<td style="text-align:center;font-family:Tahoma;font-size:11px">'.$eve->bet_placed.'</td>
					<td style="text-align:center;font-family:Tahoma;font-size:11px;">'.$eve->bet_id.'</td>
				</tr>
			';
		
			if($eve->debitado == '0' && $eve->status == 'SETELED'){
				$dd_up = array('total' => $new_valor);
				$this->db->update('bot_valores',$dd_up);
				
				$dd_deb = array('debitado' => '1');
				$this->db->where('id',$eve->id);
				$this->db->update('bot_eventos' , $dd_deb);
				$add = 1;
				
			}
		} // x foreach
		#if($add == 1){
			#$conteudo .= "<tr><td style='background-image:url(images/tr_final.jpg);height:31px;' colpan='11'>&nbsp;</td></tr>";
			
			// get valor total
			$total = 0;
			$this->db->where('status','SETTLED');
			$qr_settled = $this->db->get('bot_eventos');
			foreach($qr_settled->result() as $eve_set){ 
				if($eve_set->red == '0'){
					$total += $eve_set->matched;
				}
				if($eve_set->red == '1'){
					$total -= $eve_set->matched;
				}
			}
			
			
			
			/*$conteudo .= "<script>$(document).ready(function(){ $('#valor_total_only , .valor_total').html('$".number_format($this->db->get('bot_valores')->row()->total, 2, ',', '.')."');  })</script>";	*/
			
			$conteudo .= "<script>$(document).ready(function(){ $('#valor_total_only , .valor_total').html('$".number_format($total, 2, ',', '.')."');  })</script>";	
			
			
			
		#}
		echo $conteudo;
	} // x fn
	
	
	function get_img(){
		header('Access-Control-Allow-Origin: *'); 
		#$dd = $this->padrao_model->get_qr('bot_valores')->row();
		$add = 0;
		$src_img = "tes06.jpg";
		$img = "conteudo/bot/html/img_bot/".$src_img;
		#$img = "/img_bot/tes00.jpg";
		
		if(file_exists($img)){
			$imagem = 'img_bot/'.$src_img;
			#$conteudo = "existe";
		}else{
			$imagem = "img_bot/bg.jpg";
			#$conteudo = "Não existe";
		}
			
		$conteudo = "<img class='img' src='".$imagem."' >";
		echo $conteudo;
			
		#}
		#echo "<p style='color:white'>".$conteudo.' '.$img."</p>";
	} // x fn
	
	
	// API BETFAIR
	function logar_bet(){
		$appKey = "6A1cQNtoRmi0GDOS";
		#$sessionToken =  "FsvOWzvKy11loxMt4z++d02wZaZjwXKwUddOHfo8F0Q=" ;
		$user = "igormarlus";
		$senha = "N2009Lab";
		#$user = $this->input->post('username');
		#$senha = $this->input->post('password');
		#echo $user.' '.$senha;
		#return false;
		$ch = curl_init();
			
			// inserida por mim 28-05-17
			#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			//curl -k -i -H "Accept: application/json" -H "X-Application: <AppKey>" -X POST -d 'username=<username>&password=<password>' https://identitysso.betfair.com/api/login
  
			#curl_setopt($ch, CURLOPT_URL, "https://identitysso.betfair.com/api/keepAlive");
			#curl_setopt($ch, CURLOPT_URL, "https://identitysso.betfair.com/api/login");
			#curl_setopt($ch, CURLOPT_URL, "https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=http://tradersize.com/bet");
			
			
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'X-Application: ' . $appKey,
				//'X-Authentication: ' . $sessionToken,
				'Accept: application/json',
				'Content-Type: application/json'
			));
			$postData =
				'[{"username" :"'.$user.'", "password": "'.$senha.'"}]';
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			$this->debug('Post Data: ' . $postData);
			$response = json_decode(curl_exec($ch));
			$this->debug('Response: ' . json_encode($response));
			curl_close($ch);
			if (isset($response->error)) {
				echo 'Call to api-ng failed: ' . "\n";
				echo  'Response: ' . json_encode($response);
				exit(-1);
			} else {
				return $response;
			}
	}
	
	
	 // serve para fn acima	
	function debug($debugString)
	{
		global $DEBUG;
		if ($DEBUG)
			echo $debugString . "\n\n";
	}
	
	function teste(){
		#echo "!";
		#redirect('');
	}
	

	function pagamento($cb=""){
		echo $cb;
		echo "<br>";
		echo "Pagamento em procedimento...";
	}

	function refund(){
		echo "<br>";
		echo "<p align='center'>Suport: contato@tradersize.com</a>";
	}

	function get_btc_now(){
		echo "OK!!2";
		  $URL = "https://api.promasters.net.br/cotacao/v1/valores";
		  $ch = curl_init();
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	      curl_setopt($ch, CURLOPT_URL, $URL);
	      $data = curl_exec($ch);
	      curl_close($ch);
	      $data_json = json_decode($data);
	      #print_r($data);
	      print_r($data_json);
	      echo "<br><br>";
	      foreach($data_json as $dd){
	      	print_r($dd);
	      	echo "<br>-------------<br>";
	      }
	}
	
	
}
