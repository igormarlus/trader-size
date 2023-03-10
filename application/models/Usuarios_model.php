<?
class Usuarios_model extends CI_Model{
	
	
	function _construct()
	{
		// Call the Model constructor
		parent::_construct();
	}


	function logar(){

	

		$login = $_POST['login'];

		//$senha = $_POST['senha'];

		$senha = md5($_POST['senha']);

		$this->db->where(array('email' => $login, 'senha' => $senha));

		$qr_login = $this->db->get('user');

	

		if($qr_login->num_rows() > 0){

			$dd_user = $qr_login->row();

			$dd_session = array(

								'usr' => true,

								'id' => $dd_user->id,
								
								'bid' => $dd_user->id.'-',

								'nome' => $dd_user->nome,

								'nivel' => $dd_user->nivel,
								
								'plano' => $dd_user->plano,

								'login' => $login

								);

								$this->session->set_userdata($dd_session);
								redirect('futebol');
			/*
			if($dd_user->executivo == '1'){
				redirect('bet');
			}
			
			if($dd_user->endereco == "" || $dd_user->cep == "" ){
				redirect('dash/minha_conta');
			}
			*/
			// verifica pagamento
			$verifica = $this->verifica_licenca_user($dd_user->id);
			#echo $verifica;
			#return false;
			if($verifica == '0'){
				#redirect('home/planos');
			}else{

				$refer	= $this->agent->referrer();
				$verifica_ref = strstr($refer, 'galgos');
				echo $refer;
				if($verifica_ref == 'galgos/login'){
					#echo "é galgo";
					redirect('galgos');
				}else{
					redirect('futebol');
				}
			}
			#echo "logado";
			//print_r($this->session->userdata())
			#return false;

		}else{

			#redirect('admin');

			redirect('home/login/invalid');

		}

	

	}

	



	// VALIDA A NAVEGAÇÃO

	function verSession(){

	

		$ss = $this->session->userdata('usr');

		if(isset($ss)){

			if($ss == true){

			

			}else{

				redirect('admin');

			}

		}

	}

	

	

	// VALIDA A NAVEGAÇÃO

	function verSession_user(){

		#$ss = $this->session->userdata('token');
		$ss = $this->session->userdata('id');
		#$ss = $_SESSION['token'];
		#echo "Opa";
		#return false;
		
		if(isset($ss)){
			#echo $ss;
			#if(!isset($_POST)){
				
				
				
				
				// verifica vencimento
				
				
				/*
				$where_venc = array('id_ass' => $this->session->userdata('id'));
				$this->db->where($where_venc);
				$this->db->order_by('vencimento_fn','desc');
				$this->db->limit(1);
				$dd_financeiro = $this->db->get('financeiro');
				if($dd_financeiro->num_rows() > 0){
					#echo $this->session->userdata('id');
					#echo "<br> --";
					#echo $dd_financeiro->num_rows();
					#echo "<br>---";
					#echo $dd_financeiro->row()->vencimento_fn;
					$data_venc = strtotime($dd_financeiro->row()->vencimento_fn);
					$now = strtotime(date("Y-m-d"));
					if($data_venc < $now){
						// redireciona para pagamento
							#redirect('bet/pagamento');
						
					}
					#return false;
				} else{
					#echo $this->uri->segment(2);
					#return false;
					if($this->uri->segment(2) != 'pagamento' && $this->uri->segment(2) != 'set_licence' ){
						#redirect('bet/pagamento');	
					}else{
						#$redirect('bet/pagamento');
					}
					#redirect('bet/pagamento');
				}
				*/
			#}

			if($ss == true){
			}else{
				#echo "Não foi";
				#return false;
				#redirect('home/login');

			}

		}else{
			redirect('');
		}

	}

	

	function verSession_adm(){

	

		$ss = $this->session->userdata('admin');

		if(isset($ss)){

			if($ss == true){

			

			}else{

				redirect('admin');

			}

		}

	}

	

	function cadastrar() {

		// telefone
		$caracteres = array("-", "(", ")"," ",".");
		$telefone = str_replace($caracteres, "", $_POST['telefone']);
		#$cpf = str_replace($caracteres, "", $_POST['cpf']);

		// define codigo de verificação
		$senha2 = rand(99999999,1);
		$senha2 = substr($senha2,0,5);
		$pin = substr($senha2,1,5);
		
		
		
		#$id_patrocinador = $_POST['id_patrocinador'];
		if(isset($_POST['patrocinador'])){
			$id_patrocinador = $_POST['patrocinador'];
		}
		
		if(isset($_POST['id_patrocinador'])){
			$id_patrocinador = $_POST['id_patrocinador'];
		}
		
		$id_patrocinador_dd = $this->padrao_model->get_by_id($id_patrocinador,'user')->row()->id;
		
		
		// binario
		/*
		if($_POST['lado']){
			$patro_lado = $_POST['lado'];
			$id_patrocinador = $_POST['patrocinador'];
			$id_patrocinador_dd = $this->padrao_model->get_by_id($id_patrocinador,'user')->row()->id;
			
		}else{
			$patro_lado = $this->padrao_model->get_by_id($id_patrocinador,'user')->row()->lado;
		}
		*/
		$dd = array(					
					'patrocinador' => $id_patrocinador_dd,
					'nome' => $this->input->post('nome'),
					#'dt_nascimento' => $this->padrao_model->converte_data($_POST['dt_nascimento']),
					#'telefone' => $telefone,
					#'cpf' => $cpf,
					#'nacionalidade' => $this->input->post("nacionalidade"),
					#'login' => $_POST['login'],
					'plano_cadastro' => $this->input->post('plano_cadastro'),
					'email' => $this->input->post('email'),
					'senha' => md5($this->input->post('senha')),
					'senha2'=> md5($pin),
					'ip' => $this->session->userdata('ip_address')

		);


			$dd['nivel'] = 0; // basico



		

				

		$this->db->insert('user', $dd);

		$id_user = $this->db->insert_id();
		
		// inserir licenca de 30 dias
		$vencimento = $this->calcData(date('d/m/Y'),30,'c'); // habilitacao
		#echo "<p>".$plano.": ".$tempo_vencimento."</p>";
		#echo $vencimento;
		#echo "<br>";
		#echo "Opa";
		$dd_licenca_financeiro = array(
			'id_ass' => $id_user,
			'vencimento_fn' => $this->padrao_model->converte_data($vencimento),
			'pagamento_fn' => date('Y-d-m'),
			'valor_fn' => 0,
			'status_fn' => 'pago',
			'descricao' => "Ativado pelo cadastro"
		);
		$this->db->insert('financeiro' , $dd_licenca_financeiro);

		$dd_config = array('id_user' => $id_user);
		$this->db->insert('user_configs', $dd_config);
		
		$url_link = base_url()."home/confirm/".md5($pin);
		
		
		########### ENVIA E-MAIL
		$conteudo ="
		<p align='center'><img src='".base_url()."logo/logo.png' alt='Logomarca Trader Size'></p>
		<p align='center'>Bem Vindo ao Trader Size</p>
		<p align='center'> Agora você poderá acompanhar todo volume de apostas de futebol em tempo real. <strong>Aproveite!</strong> </p>
<table>

            

            <tbody style='background:#FFFFFF'>

				
				<tr>

                    <th>Plano:</th>

					<td>".$_POST['plano_cadastro']."</td>

                </tr>

				<tr>

                    <th>Nome:</th>

					<td>".$_POST['nome']."</td>

                </tr>

				<tr>

                    <th>E-mail:</th>

					<td>".$_POST['email']."</td>

                </tr>

				
				
				<tbody>
				</table>
				
				<table>
				<tbody>
				
				<tr>

                    <th colspan='2'> </th>

                </tr>

				<tr>

                    <th>Link de confirmação:</th>

					<td><a href='$url_link' target='_blank'>$url_link</td>

                </tr>
                <tr>
                <th colspan='2'>
                <br><br>
	                Links Úteis: <br><br><br>
		                <a href='".base_url()."futebol'> Confira todos os Jogos</a><br><br>
		                <a href='".base_url()."futebol/hots'> HOTS</a><br><br>
		                <a href='".base_url()."futebol/filtro_odds'> Filtro de Odds</a><br><br>
		                <a href='".base_url()."betfair'> Nosso Blog </a><br>
	                </th>
                </tr>
				
            </tbody>

</table>        
<br><br><br>
<p>Atenciosamente,<br>Equipe Trader Size<br>comercial@tradersize.com </p>
";

		
				$this->load->library('email');
				#$config['protocol'] = 'send';
				
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'tradersize.com';
				$config['smtp_port'] = '587';
				#$config['smtp_user'] = 'send@tradersize.com';
				#$config['smtp_pass'] = 'N2019Lab@123*';
				#$config['smtp_port'] = '587';
				$config['smtp_user'] = 'cadastro@tradersize.com';
				$config['smtp_pass'] = 'Qp^d&Nae,@mA';
				
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';


				$this->email->initialize($config);
				$this->email->from("cadastro@tradersize.com");
				$this->email->to($_POST['email']);
				$this->email->cc("igor_marlus@yahoo.com.br"); 
				$this->email->subject("Cadastro Trader Size"); // ttulo
				$this->email->message("$conteudo");	
				$this->email->send();
		
/*
		

		##### ENVIA O SMS

		$user="felipe.dantas@yahoo.com.br"; 

		$password="felipe951"; 

		$codpessoa="3355";#$to="3499999999;1199988888"; //Até 500 números por envio

		$to=$telefone; //Até 500 números por envio

		#$msg="Seu PIN de confirmacao Matriz card: $pin. Sua senha de transacao: $senha2"; 

		$msg="Bem vindo ao site ".base_url()."! Seu PIN de confirmação do cadastro é $pin.";

		$enviarimediato="S"; //S ou N

		$data=""; //exemplo 20/03/2012

		$hora=""; //exemplo 20:15

		$msg = URLEncode($msg);

		$response= file_get_contents("http://web.smscel.com.br/sms/views/getsmscaction.do?user=".$user."&password=".$password."&codpessoa=".$codpessoa."&to=".$to."&msg=".$msg."&enviarimediato=".$enviarimediato."&data=".$data."&hora=".$hora);
*/
		// seta plano silicitado
		#$id_user = $this->session->userdata('id');
		$dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
		$dd_patrocinador = $this->padrao_model->get_by_id($dd_user->patrocinador,'user')->row();

		#if(!$this->session->userdata('id')){	
		#	$this->logar();
		#}else{
			redirect('home/cadastro/'.$id_user.'/'.$_POST['plano_cadastro'].'/seted');	
		#}
		

	}

	function sol_pass(){
			// telefone
		#$caracteres = array("-", "(", ")"," ",".");
		#$telefone = str_replace($caracteres, "", $_POST['telefone']);
		#$cpf = str_replace($caracteres, "", $_POST['cpf']);
		#print_r($_POST);
		#return false;
		// define codigo de verificação
		$email = $this->input->post('email');
		$qr_existe = $this->padrao_model->get_by_matriz('email',$email,'user');
		if($qr_existe->num_rows() == 0){
			redirect('home/login/einvalid');
		}


		

		$dd = $qr_existe->row();
		#echo $dd->senha2;

		
		#echo $qr_existe->num_rows();
		#return false;
		#$senha2 = rand(99999999,1);
		#$senha2 = substr($senha2,0,5);
		$pin = $dd->senha2;

		$id_user = $dd->id;
		
		// inserir licenca de 30 dias
		
		$url_link = base_url()."home/new_pass/".$pin;
		
		
		########### ENVIA E-MAIL
		$conteudo ="
		<p align='center'><img src='".base_url()."logo/logo.png' alt='Logomarca Trader Size'></p>
		<p align='center'>ALterar Senha Trader Size</p>
<table>

            

            <tbody style='background:#FFFFFF'>

				
				

				<tr>

                    <th>Nome:</th>

					<td>".$dd->nome."</td>

                </tr>

				<tr>

                    <th>E-mail:</th>

					<td>".$dd->email."</td>

                </tr>

				
				
				<tbody>
				</table>
				
				<table>
				<tbody>
				
				<tr>

                    <th colspan='2'><strong>Alterar senha acesso</strong>:</th>

                </tr>

				<tr>

                    <th>Link para gerar uma Nova Senha:</th>

					<td><a href='$url_link' target='_blank'>$url_link</td>

                </tr>

                <tr>
                <th colspan='2'>
	                Links Úteis: <br><br><br>
		                <a href='".base_url()."futebol'> Confira todos os Jogos</a><br><br>
		                <a href='".base_url()."betfair'> Nosso Blog </a><br>
	                </th>
                </tr>
				
            </tbody>

</table>        
<br><br><br>
<p>Atenciosamente,<br>Equipe Trader Size </p>
";

				echo "opa 3 <br />";
				$this->load->library('email');
				#$config['protocol'] = 'send';
				
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'euk-94082.eukservers.com';
				$config['smtp_port'] = '587';
				$config['smtp_user'] = 'cadastro@tradersize.com';
				$config['smtp_pass'] = 'Qp^d&Nae,@mA';
				
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'utf-8';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';


				$this->email->initialize($config);
				$this->email->from("cadastro@tradersize.com");
				$this->email->to($_POST['email']);
				$this->email->cc("igor_marlus@yahoo.com.br"); 
				$this->email->subject("Nova Senha  Trader Size"); // ttulo
				$this->email->message("$conteudo");	
				$this->email->send();

				 
				/*
				if ( ! $this->email->send())
				{
					echo "n foi";

					echo $this->email->print_debugger();
				        // Generate error
				}else{
					echo "opa 5";
				}

				*/
				
				redirect('home/login/sol_senha');
				


	} // x fn sol_pass
	
	function set_perfil(){

		

		$logo = $this->input->post('img');

		
		$caracteres = array("-", "(", ")"," ",".");
		$telefone = str_replace($caracteres, "", $_POST['telefone']);
		#$cpf = str_replace($caracteres, "", $_POST['cpf']);

		$dd = array(

			'nome' => $this->input->post('nome'),

			#'email' => $this->input->post('email'),

			'telefone' => $telefone,

			#'cpf' => $this->input->post('cpf'),

			'dt_nascimento' => $this->padrao_model->converte_data($this->input->post('dt_nascimento')),
			
			#'lado' => $this->input->post('lado'),
			'nacionalidade' => $this->input->post('nacionalidade'),
			'cep' => $this->input->post('cep'),
			'endereco' => $this->input->post('endereco'),
			'numero' => $this->input->post('numero'),
			'complemento' => $this->input->post('complemento'),
			'bairro' => $this->input->post('bairro'),
			'cidade' => $this->input->post('cidade'),
			'uf' => $this->input->post('uf')

		);
		
		$senha_seguranca = $this->input->post('senha_seguranca');
		if(strlen($senha_seguranca) > 0){
			$dd['senha2'] = md5($senha_seguranca);
		}

		#if($_FILES[''])

		if(isset($_POST['imagem'])){

			$dd['logo'] = $this->input->post('imagem');

		}

		/*

		if(isset($_POST['cnpj'])){

			$dd['cnpj'] = $this->input->post('cnpj');

		}

		*/

		$this->db->where('id',$this->session->userdata('id'));

		$this->db->update('user' , $dd);

		redirect('dash/minha_conta/seted');

		

		#print_r($_POST);

	}
	
	
	function set_fav(){
		$id_mkt = $this->input->post('id_mkt');
		$id_evento = $this->input->post('id_evento');
		echo $id_mkt.' '.$id_evento;
		$where = array(
			'id_user' => $this->session->userdata('id'),
			'id_evento' => $id_evento,
			'id_mkt' => $id_mkt
		);
		$this->db->where($where);
		$qr_ver = $this->db->get('bet_favoritos');
		if($qr_ver->num_rows() == 0){
			$this->db->insert('bet_favoritos' , $where);
		}else{
			$this->db->where($where);
			$qr_ver = $this->db->delete('bet_favoritos');
		}
	}
	
	function verifica_fav($id_mkt,$id_evento){
		#$id_mkt = $this->input->post('id_mkt');
		#$id_evento = $this->input->post('id_evento');
		#echo $id_mkt.' '.$id_evento;
		$where = array(
			'id_user' => $this->session->userdata('id'),
			'id_evento' => $id_evento,
			'id_mkt' => $id_mkt
		);
		$this->db->where($where);
		$qr_ver = $this->db->get('bet_favoritos');
		if($qr_ver->num_rows() == 0){
			return false;
		}else{
			return true;
		}
	}
	
	// rede binaria
	function get_rede($id_user,$lado='e'){
		/*
		if($id_user == 0){
			$id_user = $this->session->userdata('id');
		}
		*/
		$qr = $this->db->query("SELECT * FROM user_binario WHERE id_rede = '".$id_user."' AND lado = '".$lado."'");
		return $qr;
	}
	
	
	function fim_rede($id_user=60170,$lado='e'){
		
		$f = 0;
		while($f < 1){
			#echo "<h1>Linha ".$f."</h1>";
			$qr = $this->usuarios_model->get_rede($id_user,$lado);		
			
			if($qr->num_rows() == 0){
				
				
				
				#echo $id_user." - "."<br />";
				#echo "<p>nivel 1 (".$f.")</p>";
				return $id_user;
				$f++;
				#break;
			}else{	
				
					$id_user = $qr->row()->id_user;
					#echo "dsdsdsASD";
					#return false;
					
				#}
			}
		}
		
	}
	
	function fim_rede_pontos($id_user=60170,$lado='e'){
		$f = 0;
		$total = 0;
		while($f < 1){
			$qr = $this->usuarios_model->get_rede($id_user,$lado);		
			if($qr->num_rows() == 0){
				#echo $id_user." - "."<br />";
				#echo "<p>nivel 1 (".$f.")</p>";
				return $id_user;
				$f++;
				#break;
			}else{	
					
					$id_user = $qr->row()->id_user;
					$this->db->where('id_user_mov',$id_user);
					
				#}
			}
		}
	}
	
	
	function subir_bonus_upgrade($id_user=60170,$plano){
		#echo "OP";
		#return false;
		
		$f = 0;
		$nivel = 0;
		$dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
		$dd_patrocinador = $this->padrao_model->get_by_id($dd_user->patrocinador,'user')->row();
		
		$dd_user_bin = $this->padrao_model->get_by_matriz('id_user',$id_user,'user_binario')->row(); // pega o lado da subida
		
		#$lado = $dd_patrocinador->lado;
		$lado = $dd_user_bin->lado;
		
		
		
		while($f < 1){
			#echo "<h1>Linha ".$f."</h1>";
			$qr = $this->usuarios_model->get_rede_up($id_user,'td');	 // $lado n ta usando
			$lado = $qr->row()->lado;
			$bonus_patrocinador = 1;
			#echo $qr->num_rows();
			#return false;	
			if($qr->num_rows() == 0){
				#echo $id_user." - "."<br />";
				#echo "<p>nivel 1 (".$f.")</p>";
				#return $id_user;
				#echo "Acabou";
				$f++;
				#break;
			}else{	
					
					//return $id_user;
					#echo "Acabou";
					#return false;
					$nivel++;
					
					// seta plano
					$dd_user_rede = $this->padrao_model->get_by_id($qr->row()->id_rede,'user')->row();
					$dd_plano = $this->padrao_model->get_by_id($plano,'user_plano')->row();
					
					// porcentagem
					// 30% - ouro
					// 20% - prata
					// 10% - bronze
					// recebimentos de bonus binario por pacote - FINANCEIRO
					$porcentagem = $this->padrao_model->get_by_id($dd_user_rede->plano,'user_plano')->row()->ganho;
					$valor = ( $porcentagem * 100 ) / $dd_plano->pontos;	
					
					// subtrai os valores dos planos
					#if($plano == 1){
						$valor_sub_plano = $dd_plano->pontos;
					#}else{
					#	$plano_atual_valor = $this->padrao_model->get_by_id($dd_user->plano,'user_plano')->row()->pontos;
					#	$valor_sub_plano = $dd_plano->pontos - $plano_atual_valor;
					#}
					
					// verifica ativação do binario do patrocinador para que os 2 primeiros n recebam
					#echo "<h2>".$qr->row()->id_rede." ".$dd_patrocinador->id."</h2><br />";
					if($qr->row()->id_rede == $dd_patrocinador->id){
						$where_e = array('id_patrocinador' => $dd_patrocinador->id , 'lado' => 'e');
						$where_d = array('id_patrocinador' => $dd_patrocinador->id , 'lado' => 'd');
						$this->db->where($where_e);
						$get_e = $this->db->get('user_binario');
						$this->db->where($where_d);
						$get_d = $this->db->get('user_binario');
						
						#$where_ = array('id_patrocinador' => $dd_patrocinador->id);
						#$this->db->where($where_);
						#$get_ = $this->db->get('user_binario');
						
						#echo $get_->num_rows();
						if( ($get_e->num_rows() > 1 && $get_d->num_rows() > 0) || ($get_e->num_rows() > 0 && $get_d->num_rows() > 1)){
						#if($get_->num_rows() > 2){
							$bonus_patrocinador = 1;
						}else{
							$bonus_patrocinador = 0;
						}
					}else{
						$bonus_patrocinador = 1;
					}
					
					#echo "<br> (".$bonus_patrocinador.")<br>";

					#echo $dd_plano;
					$dd_pontos = array(
						'id_user' => $qr->row()->id_rede,
						'id_user_mov' => $id_user,
						'descricao' => "Upgrade ".$dd_plano->nome." - ".$dd_user->login,
						'tipo' => 'upgrade',
						'status' => 0,
						'lado' => $lado,
						'valor' => $valor_sub_plano
					);
					#echo $qr->row()->id_rede."( ".$dd_user_rede->login." -> ".$dd_user_rede->plano." ) - ".$nivel." Nivel = ".$dd_plano->pontos."<br />";
					
					#echo "<h1>".$id_user."</h1>"."";
					#echo "<p>id: ".$qr->row()->id." | id_rede: ".$qr->row()->id_rede." (".$qr->row()->lado.")- nivel ".$nivel." (".$f.")".$lado." "."</p>";				
					if($bonus_patrocinador == 1){
						$this->db->insert('ms',$dd_pontos);
					}
					$id_user = $qr->row()->id_rede;
					
					
				#}
			}
		}
		
	}
	
	function get_rede_up($id_user,$lado='e'){
		/*
		if($id_user == 0){
			$id_user = $this->session->userdata('id');
		}
		*/
		if($lado == 'td'){
			$qr = $this->db->query("SELECT * FROM user_binario WHERE id_user = '".$id_user."'");
		}else{
			$qr = $this->db->query("SELECT * FROM user_binario WHERE id_user = '".$id_user."' AND lado = '".$lado."'");
		}
		return $qr;
	}
	
	
	function get_financeiro($id_user){
		$qr = $this->db->query("SELECT * FROM movimento WHERE (id_user = '".$id_user."' OR id_user_mov = '".$id_user."') AND (status = '0'  OR status = '1') ORDER BY id desc");
		return $qr;
	}
	
	
	
	// BONUS INICIO RAPIDO E CONTRUTOR
	function pontos_por_niveis($id_user,$plano=4){
		if($plano > 1){
			$ciclo = 0;
			$dd_plano = $this->padrao_model->get_by_id($plano,'user_plano')->row();
			#echo "<h1>".$dd_plano->nome." - ".$dd_plano->valor."</h1>";
			#echo " <hr/>";
			$dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
			$dd_patr['1'] = $this->padrao_model->get_by_id($dd_user->patrocinador,'user')->row();
			$dd_patr['2'] = $this->padrao_model->get_by_id($dd_patr['1']->patrocinador,'user')->row();
			$dd_patr['3'] = $this->padrao_model->get_by_id($dd_patr['2']->patrocinador,'user')->row();
			$dd_patr['4'] = $this->padrao_model->get_by_id($dd_patr['3']->patrocinador,'user')->row();
			$dd_patr['5'] = $this->padrao_model->get_by_id($dd_patr['4']->patrocinador,'user')->row();
			// nivel 1 10%
			#echo "<h1>Nível 1:  ".$dd_patr1->login."</h1>";
			#$porcentagem = $this->padrao_model->get_by_id($dd_user_rede->plano,'user_plano')->row()->ganho;
			#$valor = ( 10 / 100 ) * $dd_plano->valor;	
			#echo "<p>$".$valor." (já ganhou pela indicação direta)</p>";
			// BONUS INICIO RAPIDO
			#$valor_fincanceiro = ($dd_plano_user->ganho * 100) / $valor_up; // caso seja por percentagem
			#$valor['1'] = $dd_plano->indicacao_direta;
			$valor['1'] = ( 10 / 100 ) * $dd_plano->valor;	
			$valor['2'] = ( 5 / 100 ) * $dd_plano->valor;	
			$valor['3'] = ( 2 / 100 ) * $dd_plano->valor;	
			$valor['4'] = ( 2 / 100 ) * $dd_plano->valor;	
			$valor['5'] = ( 1 / 100 ) * $dd_plano->valor;	
			
			
			$valor_ciclo['1'] = 150;	
			$valor_ciclo['2'] = 100;	
			$valor_ciclo['3'] = 50;	
			$valor_ciclo['4'] = 25;	
			$valor_ciclo['5'] = 15;	
			
			for($n=1;$n<6; $n++){
				
				$dd_financeiro = array(
					'id_user' => $dd_patr[$n]->id,
					'id_user_mov' => $id_user, // id do user que envia o bonus semanal
					'descricao' => "Indicação ".$n."º Nível",
					'tipo' => 'Cadastro',
					'status' => 1,
					#'lado' => $lado,
					'valor' => $valor[$n]
				);
				if($dd_patr[$n]->plano >= 0){
					$this->db->insert('movimento',$dd_financeiro);
				}
				
				#$dd_diretos = $this->padrao_model->get_by_matriz('patrocinador',$dd_patr[$n]->id,'user')->num_rows();
				if($n == 1){
					$dd_where = array('patrocinador' => $dd_patr[$n]->id , 'status' => 1);
					$this->db->where($dd_where);
					$dd_diretos = $this->db->get('user')->num_rows()+1;
					
					$ciclo_calc = $dd_diretos % 5;
					$ciclo_ver = $ciclo_calc;
					if($ciclo_ver == 0){
						$ciclo = 1;							
					}
				}
				
				if($ciclo == 1){
					
					$dd_financeiro = array(
					'id_user' => $dd_patr[$n]->id,
					'id_user_mov' => $id_user, // id do user que envia o bonus semanal
					'descricao' => "Cíclo ".$n."º Nível",
					'tipo' => 'Ciclo',
					'status' => 1,
					#'lado' => $lado,
					'valor' => $valor_ciclo[$n]
				);
				if($dd_patr[$n]->plano >= 0){
					$this->db->insert('movimento',$dd_financeiro);
				}
					
				}
				
				
				echo "<h1>$n nível</h1>";
				echo "<p>(".$n.")".$dd_patr[$n]->login."</p>";
				echo "<p>(".$dd_diretos.") = ".$ciclo."</p>";
			
			} // x for
			
		} // x if plano
		
	} // x fn
	
	function pontos_por_niveis_bk($id_user,$plano=4){
		if($plano > 1){
			$dd_plano = $this->padrao_model->get_by_id($plano,'user_plano')->row();
			#echo "<h1>".$dd_plano->nome." - ".$dd_plano->valor."</h1>";
			#echo " <hr/>";
			$dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
			$dd_patr1 = $this->padrao_model->get_by_id($dd_user->patrocinador,'user')->row();
			$dd_patr2 = $this->padrao_model->get_by_id($dd_patr1->patrocinador,'user')->row();
			$dd_patr3 = $this->padrao_model->get_by_id($dd_patr2->patrocinador,'user')->row();
			$dd_patr4 = $this->padrao_model->get_by_id($dd_patr3->patrocinador,'user')->row();
			$dd_patr5 = $this->padrao_model->get_by_id($dd_patr4->patrocinador,'user')->row();
			// nivel 1 10%
			#echo "<h1>Nível 1:  ".$dd_patr1->login."</h1>";
			#$porcentagem = $this->padrao_model->get_by_id($dd_user_rede->plano,'user_plano')->row()->ganho;
			#$valor = ( 10 / 100 ) * $dd_plano->valor;	
			#echo "<p>$".$valor." (já ganhou pela indicação direta)</p>";
			// BONUS INICIO RAPIDO
			#$valor_fincanceiro = ($dd_plano_user->ganho * 100) / $valor_up; // caso seja por percentagem
			$valor_fincanceiro = $dd_plano->indicacao_direta;
			$dd_financeiro = array(
				'id_user' => $dd_patr1->id,
				'id_user_mov' => $id_user, // id do user que envia o bonus semanal
				'descricao' => "Indicação Direta",
				'tipo' => 'Início Rápido',
				'status' => 1,
				#'lado' => $lado,
				'valor' => $valor_fincanceiro
			);
			if($dd_patr1->plano > 1){
				$this->db->insert('movimento',$dd_financeiro);
			}
			echo "<h1>Direto</h1>";
			echo "<p>".$dd_patr1->login."</p>";
			
			
			
			// nivel 2 // 2%
			#echo "<h2>Nível 2: ".$dd_patr2->login."</h2>";
			$valor2 = ( 2 / 100 ) * $dd_plano->valor;	
			#echo "<p>$".$valor."</p>";
			$dd_financeiro = array(
				'id_user' => $dd_patr2->id,
				'id_user_mov' => $id_user, // id do user que envia o bonus semanal
				'descricao' => "Indicação 2º Nível",
				'tipo' => 'Indicação',
				'status' => 1,
				#'lado' => $lado,
				'valor' => $valor2
			);
			if($dd_patr2->plano > 1){
				$this->db->insert('movimento',$dd_financeiro);
			}
			echo "<h1>Nível 2</h1>";
			echo "<p>".$dd_patr2->login."</p>";
			
			
			// nivel 3 1.5%
			#echo "<h3>Nível 3: ".$dd_patr3->login."</h3>";
			$valor3 = ( 1.5 / 100 ) * $dd_plano->valor;	
			#echo "<p>$".$valor."</p>";
			#echo "<p>$".$valor."</p>";
			$dd_financeiro = array(
				'id_user' => $dd_patr3->id,
				'id_user_mov' => $id_user, // id do user que envia o bonus semanal
				'descricao' => "Indicação 3º Nível",
				'tipo' => 'Indicação',
				'status' => 1,
				#'lado' => $lado,
				'valor' => $valor3
			);
			if($dd_patr3->plano > 2){
				$this->db->insert('movimento',$dd_financeiro);
			}
			echo "<h1>Nível 3</h1>";
			echo "<p>".$dd_patr3->login."</p>";
			
			// nivel 4  1%
			#echo "<h4>Nível 4: ".$dd_patr4->login."</h4>";
			$valor4 = ( 1 / 100 ) * $dd_plano->valor;	
			#echo "<p>$".$valor."</p>";
			
			#echo "<p>$".$valor."</p>";
			$dd_financeiro = array(
				'id_user' => $dd_patr4->id,
				'id_user_mov' => $id_user, // id do user que envia o bonus semanal
				'descricao' => "Indicação 4º Nível",
				'tipo' => 'Indicação',
				'status' => 1,
				#'lado' => $lado,
				'valor' => $valor4
			);
			if($dd_patr4->plano > 3){
				$this->db->insert('movimento',$dd_financeiro);
			}
			echo "<h1>Nível 4</h1>";
			echo "<p>".$dd_patr4->login."</p>";
			
			// nivel 5 0.5%
			#echo "<h5>Nível 5: ".$dd_patr5->login."</h5>";
			$valor5 = ( 0.5 / 100 ) * $dd_plano->valor;	
			#echo "<p>$".$valor."</p>";
			#echo "<p>$".$valor."</p>";
			$dd_financeiro = array(
				'id_user' => $dd_patr5->id,
				'id_user_mov' => $id_user, // id do user que envia o bonus semanal
				'descricao' => "Indicação 5º Nível",
				'tipo' => 'Indicação',
				'status' => 1,
				#'lado' => $lado,
				'valor' => $valor5
			);
			if($dd_patr5->plano > 3){
				$this->db->insert('movimento',$dd_financeiro);
			}
			echo "<h1>Nível 5</h1>";
			echo "<p>".$dd_patr5->login."</p>";
		}
		
	}
	
	
	######## SETAR PLANO - UPGRADE
	function set_plano($plano){
		$id_user = $this->session->userdata('id');
		$dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
		$dd_patrocinador = $this->padrao_model->get_by_id($dd_user->patrocinador,'user')->row();
		$dd_patrocinador_rede = $this->padrao_model->get_by_matriz('id_user',$id_user,'user_binario')->row();
		
		
		// solicita o upgrade a administrção
		$dd_upgrade = array(
			'id_user' => $id_user,
			'id_plano' => $plano, 
			'id_patrocinador' => $dd_patrocinador->id,
		);
		$this->db->where($dd_upgrade);
		$qr_row = $this->db->get('user_upgrade')->num_rows();
		if($qr_row == 0){
			$this->db->insert('user_upgrade' , $dd_upgrade);
		}


		/*
		// verifica a rede para distribuir os pontos
		$this->subir_bonus_upgrade($id_user,$plano);
		// seta plano em user
		$dd_up_plano = array('plano' => $plano);
		$this->db->where('id',$id_user);
		$this->db->update('user' , $dd_up_plano);
		
		$dd_session = array(

								'usr' => true,

								'id' => $dd_user->id,

								'nome' => $dd_user->nome,

								'plano' => $dd_user->plano,
								
								'nivel' => $dd_user->nivel,

								'email' => $dd_user->email

								);

								$this->session->set_userdata($dd_session);
		*/
		redirect("dash/upgrade");
	}
	
	
	

	function login_face(){

		$nome = $this->input->post('nome');

		$uid =  $this->input->post('uid');

		$this->db->where('uid',$uid);

		$qr_verifica = $this->db->get('usuarios');

		if($qr_verifica->num_rows() == 0){

			$dd = array(

				'nome' => $nome,

				'uid' => $uid,

				'status' => 1

			);

			$this->db->insert('usuarios' , $dd);

			$id_user = $this->db->insert_id();

		}else{

			$id_user = $qr_verifica->row()->id;

		}

			$dd_session = array(

				'usr' => true,

				'id' => $id_user,

				'nome' => $dd_user->nome,

				#'nivel' => $dd_user->nivel,

				#'email' => $login

			);

			$this->session->set_userdata($dd_session);

			

		

		echo $qr_verifica->num_rows();

		

	}

	

	



	

	function del_anexo($id_anexo){

		$dd_anexo = $this->padrao_model->get_by_id($id_anexo,'usuarios_docs')->row();

		if($dd_anexo->id_user == $this->session->userdata('id')){

			unlink("files/".$dd_anexo->doc);

			$this->db->where('id',$id_anexo);

			$this->db->delete('usuarios_docs');

			redirect("dash/verificacao/del_doc");

		}else{

			redirect("dash/verificacao");

		}

	}

	

	


	function set_senha(){

		$senha = md5($this->input->post('senha'));

		$nova_senha = $this->input->post('nova_senha');

		$nova_senha_confirm = $this->input->post('nova_senha_confirm');

		$id_user = $this->session->userdata('id');

		

		$where_senha = array('id' => $id_user , 'senha' => $senha);

		$this->db->where($where_senha);

		$qr_senha = $this->db->get('usuarios');

		if($qr_senha->num_rows() == 0){

			redirect('dash/senha/senha_invalida');

		}

		

		if($nova_senha != $nova_senha_confirm){

			redirect('dash/senha/conf_senha_invalida');

		}

		

		$dd_new_senha = array(

			'senha' => md5($nova_senha)			

		);

		$this->db->where($where_senha);

		$this->db->update('usuarios' , $dd_new_senha);

		redirect('dash/senha/seted');

		

		

	}

	
	############### ADM #####################
	function set_plano_adm($id_user,$plano){
		
		$where = array(
			'id_user' => $id_user,
			'id_plano' => $plano
		);
		#$this->db->where($where);
		#$qr_ver = $this->db->get('user_upgrade');
		#echo $qr_ver->num_rows();
		#if($qr_ver->row()->status == '0'){
		
		$patrocinador = $this->padrao_model->get_by_id($id_user,'user')->row()->patrocinador;
		$dd_patrocinador = $this->padrao_model->get_by_id($patrocinador,'user')->row();
		
		#if($plano == '1'){
		$dd_user = $this->padrao_model->get_by_id($id_user,'user')->row();
		$dd_plano = $this->padrao_model->get_by_id($plano,'user_plano')->row();
		
		// BONUS DE INDICAÇÃO DIRETA
		if($plano > 1){ // não recebe caso seja partner				
			$this->pontos_por_niveis($id_user,$plano);
		}
		$this->set_licenca($id_user,$plano);	
			// binario		
			
			/*
			if($dd_user->lado_prox == ""){
				$lado_derrame = $dd_patrocinador->lado;
			}else{
				$lado_derrame = $dd_user->lado_prox;
			}
			$id_rede = $this->usuarios_model->fim_rede($dd_patrocinador->id,$lado_derrame);
			#echo "OKf";
		// verificar o tipo balance = balancear os lados para ficarem proporcionais
			$dd_bin = array(
				'id_user' => $id_user,
				'id_patrocinador' => $dd_patrocinador->id,
				'id_rede' => $id_rede,
				'lado' => $dd_patrocinador->lado
			);
			if($this->padrao_model->get_by_id($id_user,'user')->row()->lado_prox <> ''){
				$dd_bin['lado'] = $this->padrao_model->get_by_id($id_user,'user')->row()->lado_prox;
			}
			$this->db->insert('user_binario' , $dd_bin);
			*/
			#}	
			// verifica a rede para distribuir os pontos
			#$this->subir_bonus_upgrade($id_user,$plano);
			#return false;
			
			// valida a solicitacao do plano
			$status = array(
							'id_user' => $id_user,
							'id_plano' => $plano,
							'id_patrocinador' => $patrocinador,
							'status' => '1'
			);
			#$this->db->where($where);
			#$this->db->update('user_upgrade',$status);
			$this->db->insert('user_upgrade',$status);
			
			// seta plano em user
			$dd_up_plano = array('plano' => $plano , 'status' => '1');
			$this->db->where('id',$id_user);
			$this->db->update('user' , $dd_up_plano);
		#} // x if
		
		
	} // x fn

	

	function set_licenca($id_user,$plano){
		
		$dd_plano = $this->padrao_model->get_by_id($plano,'user_plano')->row();
		// 400
		if($plano == '1' || $plano == '2'){
			$tempo_vencimento = 30;
			$seriais = 0;
			$valor_serial = 10;

			if($plano == '1'){
				$valor_serial = 0;
			}

		}
		
		// 1000
		if($plano == '3'){
			$tempo_vencimento = 365;
			$seriais = 1;
			$valor_serial = 100;
		}
		
		// 2000
		if($plano == '4'){
			$tempo_vencimento = 365;
			$seriais = 20;
			$valor_serial = 100;
		}
		
		## ATIVA USUARIO
		// tb financeiro
		$vencimento = $this->calcData(date('d/m/Y'),$tempo_vencimento,'c'); // habilitacao
		#echo "<p>".$plano.": ".$tempo_vencimento."</p>";
		#echo $vencimento;
		#echo "<br>";
		#echo "Opa";
		$dd_licenca_financeiro = array(
			'id_ass' => $id_user,
			'vencimento_fn' => $this->padrao_model->converte_data($vencimento),
			'pagamento_fn' => date('Y-d-m'),
			'valor_fn' => $dd_plano->valor,
			'status_fn' => 'pago',
			'descricao' => "Ativado pela ADM"
		);
		$this->db->insert('financeiro' , $dd_licenca_financeiro);
		#return false;
		## CADASTRA LICENÇAS		
		for($s=1;$s<$seriais+1;$s++){
			
			$key_dd = "trader".$s.$id_user.$plano."size";
			$key = md5($key);
			
			$dd_serial = array(
				'id_user' => $id_user,
				'valor' => $valor_serial,
				'key_serial' => $key
			);
			$this->db->insert('user_seriais' , $dd_serial);
			#echo "<p>".$s.": ".$key."</p>";
		}
		
		
	} // x fn
	
	function verifica_licenca_user($id_user){
		$qr_fin = $this->db->query("SELECT * FROM financeiro WHERE id_ass = '".$id_user."' AND vencimento_fn > NOW()  ");
		return  $qr_fin->num_rows();
	}

	function calcData($data_publicacao,$dias,$tipo='nc') {

		# $tipo: nc = nao corrido, c = corrido

		# $dias: qtd de dias a ser acrescentados

		

		

		#if($tipo == 'nc'){

			#$dataInicio = $this->proximaDataValida($data_publicacao);	

			#$dias = $dias-2;

		#}else{

			$dataInicio = $data_publicacao;	

		#}

		

			$ar = explode("/",$dataInicio);	

			$dia_pub = $ar[0];

			$mes_pub = $ar[1];

			$ano_pub = $ar[2];

		$data_soma = date('d/m/Y', mktime(0, 0, 0, $mes_pub, $dia_pub + $dias, $ano_pub));

		

		

		#if($tipo == 'nc'){

			#$dataInicio = $this->proximaDataValida($data_publicacao);	

			#$data_habilitacao = $this->proximaDataValida($data_soma);

		#}else{

			$data_habilitacao = $data_soma;	

		#}

			

		return $data_habilitacao;

	}



} // fecha class


?>
