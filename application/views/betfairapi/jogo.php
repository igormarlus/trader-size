<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BETFAIR</title>

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
</head>

<body>

<h1>BET API - Jogo</h1>
<? #require_once('includes/betapi/jsonrpc.php'); ?>
<? require_once('includes/betapi/jsonrpc-futbol.php'); ?>


<h1>ODDs: <?=$id_jogo?></h1>
<? #=print_r(getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_jogo))?>



<h1>Brasileirao: <?=$id_jogo?></h1>
<? #=print_r(getMarketings($APP_KEY, $SESSION_TOKEN,$id_jogo))?>


<?

foreach(getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_jogo,$query="MATCH_ODDS") as $odd){ 
				
				echo "<h2>";
					echo  $odd->marketName."[".$odd->selectionId."]".$odd->marketId;
					echo "<p>";
					//print_r($odd);
					########## 	MOSTRA AS ODDS
					$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					printMarketIdRunnersAndPrices($odd, $marketBook);
					echo "</p>";
				echo "</p>";
			}

?>






<h3>Outros</h3>
<ul>
<? $dd = 0;
    foreach (getMarketings($APP_KEY, $SESSION_TOKEN,$id_jogo) as $jogo) { $dd++;
		#if(count($jogo) == 1){
			#if($dd == 1){
			$id_mkt = $jogo->marketId;
			#}
	        echo "<h2>Mercado:".$jogo->marketId." - ".$jogo->marketName."</h2>";
			#$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $jogo->marketId);
			#printMarketIdRunnersAndPrices($jogo, $marketBook);
		#}
		
		
    }
?>
</ul>






</body>
</html>