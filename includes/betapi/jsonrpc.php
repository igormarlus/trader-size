<?php

#print_r($argv);
$argv = array();
$argv[0] = '';
$argv[1] = 'qD8D8WZ300PJGjbN';
$argv[2] = '6jzxlKFh0NUpuSzqSQFaGufInGxxEs/s9NYVHhcfVu0=';

if (count($argv) != 3) {
    echo 'usage: php -f jsonrpc.php AppKey SessionToken';
    exit(-1);
}

#echo $argv[1];
#return false;
$APP_KEY = $argv[1];
$SESSION_TOKEN = $argv[2];
#$APP_KEY = "qD8D8WZ300PJGjbN";
#$SESSION_TOKEN = "5THE5tO1674mQRF08Wb0/zQA488Zfc5H9omBcfgVh8U=";

#$appKey = "qD8D8WZ300PJGjbN";
#$sessionToken = "5THE5tO1674mQRF08Wb0/zQA488Zfc5H9omBcfgVh8U=";

// Setting DEBUG to true will output all request / responses to api-ng.
$DEBUG = true;
echo "<h1>1. Get all Event Types....</h1>";

$allEventTypes = getAllEventTypes($APP_KEY, $SESSION_TOKEN);

echo "<h1>2. Extract Event Type Id for Horse Racing....</h1>";

$horseRacingEventTypeId = extractHorseRacingEventTypeId($allEventTypes);
echo "<h1>3. EventTypeId for Horse Racing is: $horseRacingEventTypeId </h1>";
echo "<h1>4. Get next horse racing market in the UK....</h1>";
$nextHorseRacingMarket = getNextUkHorseRacingMarket($APP_KEY, $SESSION_TOKEN, $horseRacingEventTypeId);

echo "<h1>5. Print static marketId, name and runners....</h1>";
#printMarketIdAndRunners($nextHorseRacingMarket);

echo "6<h1>. Get volatile info for Market including best 3 exchange prices available...</h1>";
$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $nextHorseRacingMarket->marketId);

echo "<h1>7. Print volatile price data along with static runner info....</h1>";
printMarketIdRunnersAndPrices($nextHorseRacingMarket, $marketBook);

echo "<h1>n8. Place a bet below minimum stake to prevent the bet actually being placed....</h1>";
#$betResult = placeBet($APP_KEY, $SESSION_TOKEN, $nextHorseRacingMarket->marketId, $nextHorseRacingMarket->runners[0]->selectionId);
#echo "<h1>9. Print result of bet....</h1>";
#printBetResult($betResult);


function getAllEventTypes($appKey, $sessionToken)
{
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'listEventTypes', '{"filter":{}}');
    return $jsonResponse[0]->result;
}
function extractHorseRacingEventTypeId($allEventTypes)
{
    foreach ($allEventTypes as $eventType) {
        if ($eventType->eventType->name == 'Horse Racing') {
            return $eventType->eventType->id;
        }
    }
}
function getNextUkHorseRacingMarket($appKey, $sessionToken, $horseRacingEventTypeId)
{
    $params = '{"filter":{"eventTypeIds":["' . $horseRacingEventTypeId . '"],
              "marketCountries":["GB"],
              "marketTypeCodes":["WIN"],
              "marketStartTime":{"from":"' . date('c') . '"}},
              "sort":"FIRST_TO_START",
              "maxResults":"1",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result[0];
}
function printMarketIdAndRunners($nextHorseRacingMarket)
{
    echo "<h1>MarketId: " . $nextHorseRacingMarket->marketId . "</h1>";
    echo "<h2>MarketName: " . $nextHorseRacingMarket->marketName . "</h2>";
	echo "<ul>";
    foreach ($nextHorseRacingMarket->runners as $runner) {
        echo "<li>SelectionId: " . $runner->selectionId . " RunnerName: " . $runner->runnerName . "</li>";
    }
	echo "</ul>";
}
function getMarketBook($appKey, $sessionToken, $marketId)
{
    $params = '{"marketIds":["' . $marketId . '"], "priceProjection":{"priceData":["EX_BEST_OFFERS"]}}';
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'listMarketBook', $params);
    return $jsonResponse[0]->result[0];
}
function printMarketIdRunnersAndPrices($nextHorseRacingMarket, $marketBook)
{
    function printAvailablePrices($selectionId, $marketBook)
    {
        // Get selection
        foreach ($marketBook->runners as $runner)
            if ($runner->selectionId == $selectionId) break;
        echo "\nAvailable to Back: \n";
        foreach ($runner->ex->availableToBack as $availableToBack)
            echo $availableToBack->size . "@" . $availableToBack->price . " | ";
        echo "\n\nAvailable to Lay: \n";
        foreach ($runner->ex->availableToLay as $availableToLay)
            echo $availableToLay->size . "@" . $availableToLay->price . " | ";
    }
    echo "MarketId: " . $nextHorseRacingMarket->marketId . "\n";
    echo "MarketName: " . $nextHorseRacingMarket->marketName;
    foreach ($nextHorseRacingMarket->runners as $runner) {
        echo "\n\n\n===============================================================================\n";
        echo "SelectionId: " . $runner->selectionId . " RunnerName: " . $runner->runnerName . "\n";
        echo printAvailablePrices($runner->selectionId, $marketBook);
    }
}
function placeBet($appKey, $sessionToken, $marketId, $selectionId)
{
    $params = '{"marketId":"' . $marketId . '",
                "instructions":
                     [{"selectionId":"' . $selectionId . '",
                       "handicap":"0",
                       "side":"BACK",
                       "orderType":
                       "LIMIT",
                       "limitOrder":{"size":"1",
                                    "price":"1000",
                                    "persistenceType":"LAPSE"}
                       }], "customerRef":"fsdf"}';
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'placeOrders', $params);
    return $jsonResponse[0]->result;
}
function printBetResult($betResult)
{
    echo "Status: " . $betResult->status;
    if ($betResult->status == 'FAILURE') {
        echo "\nErrorCode: " . $betResult->errorCode;
        echo "\n\nInstruction Status: " . $betResult->instructionReports[0]->status;
        echo "\nInstruction ErrorCode: " . $betResult->instructionReports[0]->errorCode;
    } else
        echo "Warning!!! Bet placement succeeded !!!";
}
function sportsApingRequest($appKey, $sessionToken, $operation, $params)
{
    $ch = curl_init();
	
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
    curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/betting/json-rpc/v1");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $appKey,
        'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));
    $postData =
        '[{ "jsonrpc": "2.0", "method": "SportsAPING/v1.0/' . $operation . '", "params" :' . $params . ', "id": 1}]';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    debug('Post Data: ' . $postData);
    $response = json_decode(curl_exec($ch));
    debug('Response: ' . json_encode($response));
    curl_close($ch);
    if (isset($response[0]->error)) {
        echo 'Call to api-ng failed: ' . "\n";
        echo  'Response: ' . json_encode($response);
        exit(-1);
    } else {
        return $response;
    }
}
function debug($debugString)
{
    global $DEBUG;
    if ($DEBUG)
        echo $debugString . "\n\n";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>