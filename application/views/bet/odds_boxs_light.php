<?php header('Access-Control-Allow-Origin: *');  ?>
<style type="text/css">
.tb_odds {
	border-collapse: collapse;
}	
.td_odds tr{
	border-collapse: collapse;
	 display: flex;
  flex-direction: column;
}
.tb_odds td{
	border-collapse: collapse;
	padding: 10px;
	width: 120px;
	border: #999 0.5px solid;
	text-align: center;
	font-size: 12px;
	font-weight: bold;

}

.tb_odds small{
	
	text-align: center;
	font-size: 10px;
	font-weight: normal;
}

</style>
<?
require_once('includes/betapi/jsonrpc-futbol.php'); 
	$APP_KEY = 'qD8D8WZ300PJGjbN';
	foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 

		//print_r($odd);
		########## 	MOSTRA AS ODDS
		#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
		$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
#		$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
		#print_r($marketBook);
		
		foreach ($marketBook->runners as $runner) {
				if ($runner->selectionId == $selectionId) break;

				$B = 0;
				$total_size_back = 0;	
				echo "<table class='tb_partidas tb_odds'>";								
				echo "<tr>";			
				echo "<td>".$runner->selectionId."</td>";
				foreach ($runner->ex->availableToBack as $availableToBack){$B++;
					$total_size_back += $availableToBack->size;				
					if($B == 1){
						echo "<td style='background-color:lightblue;order:<?=$B?>'>".$availableToBack->price." <br> <small>".$availableToBack->size."</small> </td>";									
					}
				}
				#echo "</tr>";
				#echo "</table>";

				$L = 0;
				$total_size_lay = 0;	
				#echo "<table class='tb_partidas'>";								
				#echo "<tr>";														
				foreach ($runner->ex->availableToLay as $availableToLay){ $L++;
					$total_size_lay += $availableToLay->size;		
					if($L == 1){

						echo "<td style='background-color:pink'>".$availableToLay->price." <br> <small>".$availableToBack->size."</small> </td>";		
					}																									
				}
				#echo "<td>".$runner->selectionId."</td>";
				echo "</tr>";
				echo "</table>";


					
		}
	}			
?>



