<? header('Access-Control-Allow-Origin: *'); 
require_once('includes/betapi/jsonrpc-futbol.php'); 
	$APP_KEY = 'qD8D8WZ300PJGjbN';
	foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 
		$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
		function mostrar($odd, $marketBook,$id_mkt,$id_jogo)
		{
			#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
			$dd_odds = array();
			function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
			{		
				// Get selection
				$f = 0;
				$ff = 0;
				foreach ($marketBook->runners as $runner) 
					if ($runner->selectionId == $selectionId) break;
                    
					foreach ($runner->ex->availableToBack as $availableToBack){$f++;					
						if($f == 1){
                            $availableToBack->price;
                            $availableToBack->size;
						}
                    }
					$L = 0;
					foreach ($runner->ex->availableToLay as $availableToLay){ $L++;					
						if($L == 1){
						
                        $availableToLay->price;
						$availableToLay->size;
			 } 
            
			}
			
                        
            
			foreach ($odd->runners as $runner) {				
			
            	printAvailablePrices_odd($runner->selectionId, $marketBook,$odd->marketId,$id_jogo);		
            }	
		}
	}
}
$data = mostrar($odd, $marketBook,$id_mkt,$id_jogo);
