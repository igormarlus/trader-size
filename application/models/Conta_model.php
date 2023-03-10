<?
class Conta_model extends CI_Model{
	
	
	function _construct()
	{
		// Call the Model constructor
		parent::_construct();
	}

function ativar($appKey, $sessionToken)
{
	#require_once('includes/betapi/jsonrpc-futbol.php'); 
	#echo $appKey.' '.$sessionToken;
	#echo "kkkkkkkkkkkkk 20";
	#return false;
	$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
	$id_vendor = $dd->vendor_cliente;
	#$jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'revokeAccessToWebApp', $params);		 
	#print_r(  $jsonResponse[0]->result[0]);
	#print_r( $jsonResponse[0]->result[0];);
	#echo $id_vendor;


	$params = '{}';
	#$params = '{"vendorId" : "'.$id_vendor.'"}';
	#$params = '{"vendorId":["' . $id_vendor . '"], "status":{"priceData":["EX_BEST_OFFERS"]}}';
	$ch = curl_init();
	
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	$auth =  $this->session->userdata("token_type").' '.$this->session->userdata("token");
	 echo $auth;
	$endpoint = 'https://api.betfair.com/exchange/account/json-rpc/v1';

    curl_setopt($ch, CURLOPT_URL, $endpoint);
    #curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/betting/json-rpc/v1");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $appKey,
		#'X-Application: 6A1cQNtoRmi0GDOS',		
		'Authorization: '.$auth,		
		#'Authorization: $auth',
        #'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));

    $postData =
        '[{ "jsonrpc": "2.0", "method": "AccountAPING/v1.0/activateApplicationSubscription", "params" :' . $params . ', "id": 1}]';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
   
    $this->debug('Post Data: ' . $postData);
   #  echo $auth;
     print_r($postData);
    $response = json_decode(curl_exec($ch));
    $this->debug('Response: ' . json_encode($response));
    curl_close($ch);
	//$response[0]->result;
    echo $response[0]->result;
    print_r($response[0]);

   # echo "kkkkkkkkkkkkk 21";
	#return false;


}



function revoke($appKey, $sessionToken)
{
	#echo "kkkkkkkkkkkkk 20";
	$dd = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row();
	$id_vendor = $dd->vendor_cliente;
	#$jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'revokeAccessToWebApp', $params);		 
	#print_r(  $jsonResponse[0]->result[0]);
	#print_r( $jsonResponse[0]->result[0];);
	#echo $id_vendor;


	$params = '{"vendorId" : "53845"}';
	$ch = curl_init();
	

    $auth =  $this->session->userdata("token_type").' '.$this->session->userdata("token");

	$endpoint = 'https://api.betfair.com/exchange/account/json-rpc/v1';

    curl_setopt($ch, CURLOPT_URL, $endpoint);
    #curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/betting/json-rpc/v1");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $appKey,
		#'X-Application: 6A1cQNtoRmi0GDOS',		
		'Authorization: '.$auth,		
		#'Authorization: $auth',
        #'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));

    $postData =
        '[{ "jsonrpc": "2.0", "method": "AccountAPING/v1.0/revokeAccessToWebApp", "params" :' . $params . ', "id": 1}]';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
   
    $this->debug('Post Data: ' . $postData);
     #echo $auth;
  //   print_r($postData);
    $response = json_decode(curl_exec($ch));
    $this->debug('Response: ' . json_encode($response));
    curl_close($ch);
	//$response[0]->result;
    if( $response[0]->result == "SUCCESS"){
    	redirect('');
    }
    redirect('bet/sair');
    #print_r($response[0]);
    #echo "kkkkkkkkkkkkk 21";


}




function debug($debugString)
{
    global $DEBUG;
    if ($DEBUG)
        echo $debugString . "\n\n";
}

} // fecha class


?>
