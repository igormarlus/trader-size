<?

$email = 'igor_marlus@yahoo.com.br';
$token = 'DB8EE18FC38F4E61B710FE3746215A19';



$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

$data['token'] ='DB8EE18FC38F4E61B710FE3746215A19';
$data['email'] = 'igor_marlus@yahoo.com.br';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

$url_transacoes = "https://ws.pagseguro.uol.com.br/v2/transactions
?initialDate=2011-01-01T00:00
&finalDate=2011-01-28T00:00
&page=1
&maxPageResults=100
&email=".data['email']."
&token=".data['token']."";

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;
$status = $xml->status;

if($reference && $status){
	echo $reference;
	$this->db->where('id',$reference);
	$qr_ver = $this->db->get('financeiro');
	if($qr_ver->num_rows() > 0){
		$new_status = array('status_fn' => $status);
		
		
		if($status == '1'){
			$new_status['descricao'] = "Aguardando";	
		}if($status == '2'){
			$new_status['descricao'] = "Indefinico";	
		}
		if($status == '3'){
			$new_status['descricao'] = "Aprovado";	
		}
		
		$this->db->where('id_fn',$reference);
		$this->db->update('financeiro' , $new_status);
			
	}
	 /*
	 include_once 'conecta.php';
	 $conn = new conecta();
	
	 $rs_pedido = $conn->consultarPedido($reference);
	
	 if($rs_pedido){
		 $conn->atualizaPedido($reference,$status);
	 }
	 */
}


echo "<p align='center'><a href='".base_url()."'><img src='".base_url()."logo/logo-face.png'></a></p>";
echo "<p align='center'>Intenção de Pagamento Realizada.</p>";
echo "<p align='center'>Obrigado por escolher o <a href='".base_url()."'>Trader Size</a></p>";
echo "<p align='center'><a href='".base_url()."home/login'>Logar</a> ou <a href='".base_url()."futebol'>Próximos Jogos</a></p>";
?>