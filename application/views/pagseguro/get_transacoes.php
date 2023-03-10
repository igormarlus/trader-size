<?

$email = 'igor_marlus@yahoo.com.br';
$token = 'DB8EE18FC38F4E61B710FE3746215A19';


#$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

$data['token'] ='DB8EE18FC38F4E61B710FE3746215A19';
$data['email'] = 'igor_marlus@yahoo.com.br';

#$data = http_build_query($data);

#$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;
$dia = date('d');
$mes = date('m');
$mes_anterior = $mes-1;
$ano = date('Y');

if($mes == '01'){
	$ano_de = $ano-1;
}else{
	$ano_de = $ano;
}

$de = $ano_de.'-'.$mes_anterior.'-'.$dia;
$ate = $ano.'-'.$mes.'-'.$dia;;
$url = "https://ws.pagseguro.uol.com.br/v2/transactions?initialDate=".$de."T00:00&finalDate=".$ate."T00:00&page=1&maxPageResults=100&email=".$data['email']."&token=".$data['token']."";

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);
#print_r($xml);
foreach($xml as $dd){
	print_r($dd->transaction);
	echo "<br>";
	if($dd->transaction->status == 3){ // status pago
		$this->db->where('id_fn',$dd->transaction->reference);
		$qr_pag = $this->db->get('financeiro');
		if($qr_pag->row()->status_fn == '0'){
			$dd_status_pago = array(
				'status_fn' => '1',
				#'code' => $dd->transaction->code,
				'juros_fn' => $dd->transaction->feeAmount,
				'valor_pago_fn' => $dd->transaction->grossAmount,
				'pagamento_fn' => substr($dd->transaction->lastEventDate,0,10)
			);
			$this->db->where('id_fn',$dd->transaction->reference);
			$this->db->update('financeiro',$dd_status_pago);
		}
		echo "<h2>".$dd->transaction->reference.": ".$qr_pag->row()->status_fn." (".$dd->transaction->status.")</h2>";
		
	}
	#echo "<h2>".$dd->transaction->reference.": ".$qr_pag->row()->status_fn." (".$dd->transaction->status.")</h2>";
}
#$reference = $xml->reference;
#$status = $xml->status;
#echo $xml->status;
/*
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
	*/
	
	
	
	 /*
	 include_once 'conecta.php';
	 $conn = new conecta();
	
	 $rs_pedido = $conn->consultarPedido($reference);
	
	 if($rs_pedido){
		 $conn->atualizaPedido($reference,$status);
	 }
	 */
//}


echo "OK";
?>