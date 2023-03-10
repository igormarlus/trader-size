<?

//	curl -k -i -H "Accept: application/json" -H "X-Application: <AppKey>" -X POST -d 'username=<username>&password=<password>' https://identitysso.betfair.com/api/login
 /* 
{
  "token":"SESSION_TOKEN",
  "product":"APP_KEY",
  "status":"SUCCESS",
  "error":""
}
*/

$appKey = "qD8D8WZ300PJGjbN";
#$sessionToken =  "FsvOWzvKy11loxMt4z++d02wZaZjwXKwUddOHfo8F0Q=" ;
$user = "igormarlus";
$senha = "N2009Lab";
$ch = curl_init();
	
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
    curl_setopt($ch, CURLOPT_URL, "https://identitysso.betfair.com/api/keepAlive");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $appKey,
        //'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));
    $postData =
        '[{ "jsonrpc": "2.0", "method": "SportsAPING/v1.0/' . $operation . '",  "username" :' . $user . ', "password": '.$senha.'}]';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    debug('Post Data: ' . $postData);
    $response = json_decode(curl_exec($ch));
    debug('Response: ' . json_encode($response));
    curl_close($ch);
    if (isset($response->error)) {
        echo 'Call to api-ng failed: ' . "\n";
        echo  'Response: ' . json_encode($response);
        exit(-1);
    } else {
        return $response;
    }



function debug($debugString)
{
    global $DEBUG;
    if ($DEBUG)
        echo $debugString . "\n\n";
}


?>