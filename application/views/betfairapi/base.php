<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BETFAIR</title>
</head>

<body>

<h1>BET API</h1>
<? require_once('includes/betapi/jsonrpc.php'); ?>
<? #require_once('includes/betapi/jsonrpc-futbol.php'); ?>


<h4>Todas os Eventos</h4>

<? #=printMarketIdAndRunners($nextHorseRacingMarket);?>
<? #print_r(getAllEventTypes($APP_KEY, $SESSION_TOKEN))?>


<hr />

<ul>
<?
    foreach (getAllEventTypes($APP_KEY, $SESSION_TOKEN) as $event) {
        echo "<li>Evento: " . $event->eventType->name . " RunnerName: " . $event->EventType->id . "</li>";
    }
?>
</ul>





</body>
</html>