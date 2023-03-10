<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagamento extends CI_Controller {


	function __construct() {
        parent::__construct();
		$this->padrao_model->indexador();
    }

	
	function Index(){
		$dados['title'] = '';	
		#echo "saddsa";
		#return false;
		$this->load->view('pagamento/index' , $dados);
	}
	
	
	function sel_pro($id_plano){
		#echo $id_plano;
		$dd_plano = $this->padrao_model->get_by_id($id_plano,'user_plano')->row();
		
		#$nm_tipo[1] = 'Aposentado';	
		#$nm_tipo[2] = 'Servidor';	
		#$nm_tipo[3] = 'vendedor';	
		
		$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
		$valor_calc = $dd_plano->valor * 3.87;
		$valor_br = number_format($valor_calc, 2, ',', '.');
		$valor_br = str_replace(",", ".", $valor_br);
		if($id_plano == 4){
			$valor_br = '3870.00';
		}
		// inseri no DB
		$dd_pay = array(
			'id_ass' => $this->session->userdata('id'),
			'valor_fn' => $valor_br,
			'status_fn' => 0,
			'descricao' => "Plano: ".$dd_plano->nome
		);
		$this->db->insert('financeiro' , $dd_pay);
		$id_ref = $this->db->insert_id();

		#echo $dd_plano->nome;

		#echo $nm_tipo[$tipo];
		#echo "<br>";
		
		######## INICIA PAGSEGURO CURL
				//$data = 'email=seuemail@dominio.com.br&amp;token=95112EE828D94278BD394E91C4388F20&amp;currency=BRL&amp;itemId1=0001&amp;itemDescription1=Notebook Prata&amp;itemAmount1=24300.00&amp;itemQuantity1=1&amp;itemWeight1=1000&amp;itemId2=0002&amp;itemDescription2=Notebook Rosa&amp;itemAmount2=25600.00&amp;itemQuantity2=2&amp;itemWeight2=750&amp;reference=REF1234&amp;senderName=Jose Comprador&amp;senderAreaCode=11&amp;senderPhone=56273440&amp;senderEmail=comprador@uol.com.br&amp;shippingType=1&amp;shippingAddressStreet=Av. Brig. Faria Lima&amp;shippingAddressNumber=1384&amp;shippingAddressComplement=5o andar&amp;shippingAddressDistrict=Jardim Paulistano&amp;shippingAddressPostalCode=01452002&amp;shippingAddressCity=Sao Paulo&amp;shippingAddressState=SP&amp;shippingAddressCountry=BRA';
		/*
		Caso utilizar o formato acima remova todo código abaixo até instrução $data = http_build_query($data);
		*/
		$url = 'https://ws.pagseguro.uol.com.br/v2/checkout'; // original
		//$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/checkout'; // sandbox
		
		#echo $url;
		#return false;
		
		$data['email'] = 'igor_marlus@yahoo.com.br';
		$data['token'] = 'DB8EE18FC38F4E61B710FE3746215A19';
		$data['currency'] = 'BRL';
		$data['itemId1'] = '000'.$id_plano;
		$data['itemDescription1'] = utf8_decode("Plano: ".$dd_plano->nome);
		#$data['itemDescription1'] = 'RBCC - Licença Anual';
		$data['itemAmount1'] = "$valor_br";
		$data['itemQuantity1'] = '1';
		#$data['itemWeight1'] = '1000';
		#$data['itemId2'] = '0002';
		#$data['itemDescription2'] = 'Notebook Rosa';
		#$data['itemAmount2'] = '20.00';
		#$data['itemQuantity2'] = '2';
		#$data['itemWeight2'] = '750';
		#$data['reference'] = 'REF'.date('Y').$this->session->userdata('id');
		$data['reference'] = $id_ref;
		
		$data['senderName'] = $dd->nome;
		#$data['senderAreaCode'] = '11';
		#$data['senderPhone'] = '56273440';
		$data['senderEmail'] = $dd->email;
		#$data['email'] = 'igor_marlus@yahoo.com.br';
		#$data['shippingType'] = '1';
		#$data['shippingAddressStreet'] = 'Av. Brig. Faria Lima';
		#$data['shippingAddressNumber'] = '1384';
		#$data['shippingAddressComplement'] = '5o andar';
		#$data['shippingAddressDistrict'] = 'Jardim Paulistano';
		#$data['shippingAddressPostalCode'] = '01452002';
		#$data['shippingAddressCity'] = 'Sao Paulo';
		#$data['shippingAddressState'] = 'SP';
		#$data['shippingAddressCountry'] = 'BRA';
		//$data['redirectURL'] = base_url()."pagamento";
		
		$data = http_build_query($data);
		
		$curl = curl_init($url);
		
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
		$xml= curl_exec($curl);
		
		if($xml == 'Unauthorized'){
		//Insira seu código de prevenção a erros
		
		header('Location: erro.php?tipo=autenticacao');
		exit;//Mantenha essa linha
		}
		curl_close($curl);
		
		$xml= simplexml_load_string($xml);
		if(count($xml -> error) > 0){
		//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.
		print_r($xml -> error);
		echo $xml -> error;
		#header('Location: erro.php?tipo=dadosInvalidos');
		exit;
		}
		header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);
				
		
		
	}
	
	
	
	// retorno automatico PAGSEGURO
	function retauto(){
		$this->load->view('pagseguro/retorno-automatico');
	}
	
	function get_transacoes(){
		$this->load->view('pagseguro/get_transacoes');
	}





	###################### HOTMART
	function realizado(){
		$dd_fincanceiro = array(
			'id_ass' => $this->session->userdata('id'),
			'vencimento_fn' => date("Y-m")."-28",
			'pagamento_fn' => date("Y-m-d"),
			'status_fn' => 'pago'
		);
		
		$this->db->insert('financeiro' , $dd_fincanceiro);
		redirect('');

	}

	function aguardando(){
		$dd_fincanceiro = array(
			'id_ass' => $this->session->userdata('id'),
			'vencimento_fn' => date("Y-m")."-28",
			'pagamento_fn' => date("Y-m-d"),
			'status_fn' => 'pendente'
		);
		$this->db->insert('financeiro' , $dd_fincanceiro);
		redirect('');
		
	}

	function analise(){
		$dd_fincanceiro = array(
			'id_ass' => $this->session->userdata('id'),
			'vencimento_fn' => date("Y-m")."-28",
			'pagamento_fn' => date("Y-m-d"),
			'status_fn' => 'pendente'
		);
		$this->db->insert('financeiro' , $dd_fincanceiro);
		redirect('');
		
	}

	################  ASTROPAY
	function astropay(){
		echo "Teste Astropay 2";
		#return false;
		require_once("includes/http.php");
		//$request = new HttpRequest();
		$request = new HttpRequest("https://sandbox-api.astropaycard.com/verif/validator", "GET");
		//$request->setUrl('https://sandbox-api.astropaycard.com/verif/validator');
		//$request->setMethod('HTTP_METH_POST');

		$request->setQueryData(array(
		  'x_login' => 'NXE9hDeFLGYjOeN2O9w0HSTJzF8mMGxG',
		  'x_trans_key' => 'WvbwyqStoyHhbom05EZlwDVrqj4M6sKf',
		  'x_type' => 'AUTH_CAPTURE',
		  'x_card_num' => '',
		  'x_card_code' => '',
		  'x_exp_date' => '',
		  'x_amount' => '',
		  'x_currency' => '',
		  'x_unique_id' => '',
		  'x_invoice_num' => ''
		));

		$request->setHeaders(array(
		  'cache-control' => 'no-cache',
		  'Connection' => 'keep-alive',
		  'Content-Length' => '244',
		  'Accept-Encoding' => 'gzip, deflate',
		  'Host' => 'sandbox-api.astropaycard.com',
		  'Cache-Control' => 'no-cache',
		  'Accept' => '*/*',
		  'Content-Type' => 'application/x-www-form-urlencoded'
		));

		$request->setContentType('application/x-www-form-urlencoded');
		$request->setPostFields(array(
		  'x_login' => 'ZegrlkA72ZhruYuT0HeWpGJQxjKnld3j',
		  'x_trans_key' => 'wL3RV5m6F24FcDDGqD2VkLbZsK7Xqx05',
		  'x_type' => 'AUTH_CAPTURE',
		  'x_card_num' => '1111111111111111',
		  'x_card_code' => '1234',
		  'x_exp_date' => '12-2020',
		  'x_amount' => '10.00',
		  'x_currency' => 'USD',
		  'x_unique_id' => '1234567',
		  'x_invoice_num' => '123456789'
		));

		try {
		  $response = $request->send();

		  echo $response->getBody();
		} catch (HttpException $ex) {
		  echo $ex;
		}
	}
	
}
