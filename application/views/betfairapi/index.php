<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BETFAIR</title>
</head>
<style type="text/css">
.tb_partidas{
	width:80%;
}

.tb_partidas td{
	border:black 1px solid;
	padding:5px;
	text-align:center;
	font-size:18px;
	width:100px;
	font-weight:bold
}

.tb_partidas td small{
	font-size:12px;
	font-weight:normal;
}
</style>
<body>

<h1>BET API</h1>
<? #require_once('includes/betapi/jsonrpc.php'); ?>
<? require_once('includes/betapi/jsonrpc-futbol.php'); ?>


<h4>Todas os Eventos</h4>

<? #=printMarketIdAndRunners($nextHorseRacingMarket);?>
<? #print_r(getAllEventTypes($APP_KEY, $SESSION_TOKEN))?>
<h1>Todos os Jogos</h1>


<h1>UEFA - Liga do Campeões:</h1>
<? #=print_r(getSoccers_competition($APP_KEY, $SESSION_TOKEN,'228'))?>

<ul>
<?
    foreach (getSoccers_competition($APP_KEY, $SESSION_TOKEN,'228') as $jogo_uefa) {
        echo "<li>Jogo: <a target='_blank' href='".base_url()."bot/betjogo/".$jogo_uefa->event->id."'>" . $jogo_uefa->event->name . "</a> ID: " . $jogo_uefa->event->id . "</li>";
    }
?>
</ul>




<? #=print_r(getSoccers($APP_KEY, $SESSION_TOKEN))?>

<ul>
<? /*
    foreach (getSoccers($APP_KEY, $SESSION_TOKEN) as $jogo) {
        echo "<li>Jogo: <a target='_blank' href='".base_url()."bot/betjogo/".$jogo->event->id."'>" . $jogo->event->name . "</a> ID: " . $jogo->event->id . "</li>";
    }
	*/
?>
</ul>


<h1>Brasileirao Série A:</h1>
<?=print_r(getSoccers_competition($APP_KEY, $SESSION_TOKEN))?>

<ul>
<?
    foreach (getSoccers_competition($APP_KEY, $SESSION_TOKEN) as $jogo_serie_A) {
        echo "<li>Jogo: <a target='_blank' href='".base_url()."bot/betjogo/".$jogo_serie_A->event->id."'>" . $jogo_serie_A->event->name . "</a> ID: " . $jogo_serie_A->event->id . "</li>";
    }
?>
</ul>

<hr />

<h1>Brasileirao Série B:</h1>
<?=print_r(getSoccers_competition($APP_KEY, $SESSION_TOKEN,'321319'))?>

<ul>
<?
    foreach (getSoccers_competition($APP_KEY, $SESSION_TOKEN,'321319') as $jogo) {
        echo "<li>Jogo: <a target='_blank' href='".base_url()."bot/betjogo/".$jogo->event->id."'>" . $jogo->event->name . "</a> ID: " . $jogo->event->id;
		echo "<ul>";
			foreach(getMarketings_query($APP_KEY, $SESSION_TOKEN,$jogo->event->id,$query="MATCH_ODDS") as $odd){
				echo "<li>";
					echo  $odd->marketName."[".$odd->selectionId."]".$odd->marketId;
					echo "<p>";
					//print_r($odd);
					########## 	MOSTRA AS ODDS
					$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					#printMarketIdRunnersAndPrices($odd, $marketBook); // mostrar odds
					
					echo "</p>";
				echo "</li>";
			}
		echo "</ul>";
		echo "</li>";
    }
?>
</ul>


<ul>
<?
    foreach (getAllEventTypes($APP_KEY, $SESSION_TOKEN) as $event) {
        echo "<li>Evento: " . $event->eventType->name . " RunnerName: " . $event->EventType->id . "</li>";
    }
?>
</ul>





</body>
</html>