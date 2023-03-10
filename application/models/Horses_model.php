<?
class Horses_model extends CI_Model{
	
	
	function _construct()
	{
		// Call the Model constructor
		parent::_construct();
	}

/////////////

	function getAllEventTypes($appKey, $sessionToken)
{
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'listEventTypes', '{"filter":{}}');
    return $jsonResponse[0]->result;
}
function extractHorseRacingEventTypeId($allEventTypes)
{
    foreach ($allEventTypes as $eventType) {
        if ($eventType->eventType->name == 'Soccer') {
            return $eventType->eventType->id;
        }
    }
}
// pega todos os jogos
function getSoccers($appKey, $sessionToken,$id_evento='1')
{
    $params = '{"filter":{"eventTypeIds":["' . $id_evento . '"],
              "marketStartTime":{"from":"' . date('c') . '"}},
              "sort":"FIRST_TO_START",
              "locale" : "pt",
              "maxResults":"5",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listEvents', $params);
    return $jsonResponse[0]->result;
}
// pega por competição
function getSoccers_competition($appKey, $sessionToken,$id_competition='89219') // default seire A
{
	/*
    $params = '{"filter":{"competitionIds":["' . $id_competition . '"], "maxResults":"10",
              "marketStartTime":{"from":"' . date('c') . '"} ,
              "sort":"FIRST_TO_START",
              "marketProjection":["RUNNER_DESCRIPTION"]}}';
              */

     $params = '{"filter":{"competitionIds":["' . $id_competition . '"],
              "marketStartTime":{"from":"' . date('d') . '"}},
              "sort":"FIRST_TO_START",
              "maxResults":"100"
              }';         
  #  $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listEvents', $params);                  
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listEvents', $params);
    return $jsonResponse[0]->result;
}

function getSoccers_competition_all($appKey, $sessionToken,$event_type='1') // default seire A
{
    $params = '{"filter":{"eventTypeIds":["'.$event_type.'"]},
              "maxResults":"100",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken , 'listCompetitions', $params);
	#$jsonResponse = $this->sportsApingRequest($appKey, $sessionToken , 'listCompetitions', $params);
    return $jsonResponse[0]->result;
}

function getHorses($appKey, $sessionToken,$id_competition='7') // default seire A
{
    $params = '{"filter":{"eventTypeIds":["' . $id_competition . '"],
              "marketStartTime":{"from":"' . date('c') . '"}},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listEvents', $params);
    return $jsonResponse[0]->result;
}

function get_run_Horses($appKey, $sessionToken,$id_competition='7',$limite=20,$country="GB") // default seire A
{
	/*
    $params = '{"filter":{"eventTypeIds":["' . $id_competition . '"]},
              "sort":"MAXIMUM_TRADED",
              "maxResults":"5",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	*/
  $params = '{"filter":{"eventTypeIds":["' . $id_competition . '"], "marketCountries" : ["'.$country.'"] ,
              
              "marketTypeCodes":["WIN"],
              "marketStartTime":{"from":"' . date('c') . '"}},
              "sort":"FIRST_TO_START", 
              "maxResults":"'.$limite.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
  // PEGA GERAL
  $params = '{"filter":{"eventTypeIds":["' . $id_competition . '"],
              
              "marketTypeCodes":["WIN"],
              "marketStartTime":{"from":"' . date('c') . '"}},
              "sort":"FIRST_TO_START", 
              "maxResults":"'.$limite.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
              
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;
}

// pega odds dos jogos
function getMarketings($appKey, $sessionToken,$id_evento,$limit=10)
{
	// http://docs.developer.betfair.com/docs/display/1smk3cen4v3lu3yomq5qye0ni/Betting+Enums#BettingEnums-MarketSort
	$params = '{"filter":{"eventIds":["' . $id_evento . '"]},
              "sort":"MAXIMUM_TRADED", 
              "maxResults":"'.$limit.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}

function getMarketings_horses($appKey, $sessionToken,$id_evento,$limit=10)
{
	// http://docs.developer.betfair.com/docs/display/1smk3cen4v3lu3yomq5qye0ni/Betting+Enums#BettingEnums-MarketSort
	$params = '{"filter":{ "eventTypeIds":["7"] ,"eventIds":["' . $id_evento . '"] },
              "sort":"MAXIMUM_TRADED", 
              "maxResults":"'.$limit.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketTypes', $params);
    return $jsonResponse[0]->result;

	
}

function getMarketings_matchodds($appKey, $sessionToken,$id_evento,$limit=10)
{
	// http://docs.developer.betfair.com/docs/display/1smk3cen4v3lu3yomq5qye0ni/Betting+Enums#BettingEnums-MarketSort
	$params = '{"filter":{"eventIds":"[' . $id_evento . ']",
						"marketTypeCodes":["MATCH_ODDS"]
						},
              "sort":"MAXIMUM_TRADED", 
              "maxResults":"'.$limit.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}



//marketTypes
function getMarketings_query($appKey, $sessionToken,$id_evento=0,$query="OVER_UNDER_15",$id_mkt=0) // OVER_UNDER_15  //MATCH_ODDS
{
	
	if($id_evento == 0){
		$params = '{"filter":{
				"marketTypeCodes":["'.$query.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}else{
		$params = '{"filter":{
				"eventIds":["' . $id_evento . '"],
				"marketTypeCodes":["'.$query.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}
	if($id_mkt != "0"){

		$params = '{"filter":{
				"eventIds":["' . $id_evento . '"],
				"marketIds":["' . $id_mkt . '"],
				"marketTypeCodes":["'.$query.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';


	}
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}

function get_mercado_query($appKey, $sessionToken,$query="OVER_UNDER_15") // OVER_UNDER_15  //MATCH_ODDS
{
	//"competitionIds":["13"], // filtrar por campeonato
	$params = '{"filter":{
				"eventTypeIds":["1"],
				"marketTypeCodes":["'.$query.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"40",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}
// AVB HORSE 
function get_avbs($appKey, $sessionToken,$query="MATCH_BET") // OVER_UNDER_15  //MATCH_ODDS
{
  //"competitionIds":["13"], // filtrar por campeonato
  $params = '{"filter":{
        "eventTypeIds":["7"],
        "marketTypeCodes":["'.$query.'"]
        },
              "sort":"FIRST_TO_START",
              "maxResults":"40",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

  
}

################ BUSCA
function get_evento_query($appKey, $sessionToken,$tipo='1') // OVER_UNDER_15  //MATCH_ODDS
{
	$query = $this->input->post('q');
	/*
	$query = $this->input->post('q');
	$params = '{"filter":{
				"eventTypeIds":["' . $tipo . '"],
				
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;
	*/
	
	$params = '{"filter":{
				"textQuery":"'.$query.'",
              "marketStartTime":{"from":"' . date('c') . '"}
			  },
              "sort":"FIRST_TO_START",
              "maxResults":"5",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listEvents', $params);
    return $jsonResponse[0]->result;
	

	
}


########## GET ID DO EVENTO
function get_id_mkt_api($appKey, $sessionToken,$id_evento=0,$id_mkt="") // OVER_UNDER_15  //MATCH_ODDS
{
	
	

	$params = '{"filter":{
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["EVENT"]}';

    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}


function getMkt($appKey, $sessionToken,$id_evento=0,$id_mkt="") // OVER_UNDER_15  //MATCH_ODDS
{
	
	if($id_evento == 0){

	$params = '{"filter":{
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_METADATA"]}';
		
	}else{
	$params = '{"filter":{
				"eventIds":["' . $id_evento . '"],
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}

	if($id_evento > 0 && $id_mkt == "" ){
		$params = '{"filter":{
				"eventIds":["' . $id_evento . '"],
				"marketTypeCodes":["MATCH_ODDS"]
				
				
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}

    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}

function get_id_evento($appKey, $sessionToken,$id_mkt)
{	
  #echo $id_mkt."  ".$appKey." ".$sessionToken;

	$params = '{"filter":{
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"1",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listEvents', $params);
    return $jsonResponse[0]->result;
	
}

/*
function getMarketings_by_selection($appKey, $sessionToken,$selectionId)
{
	$params = '{"filter":{"selectionId":["' . $selectionId . '"]},
              "sort":"FIRST_TO_START",
              "maxResults":"2",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}

*/

function get_partida_id($appKey, $sessionToken, $id_partida)
{
    $params = '{"filter":{"eventTypeIds":["' . $id_partida . '"],
              "marketStartTime":{"from":"' . date('c') . '"}},
              "sort":"FIRST_TO_START",
              "maxResults":"1",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listMarketCatalogue', $params);
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
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketBook', $params);
    return $jsonResponse[0]->result[0];
}

function getMarketBook_bsp($appKey, $sessionToken, $marketId)
{
    #[{"jsonrpc": "2.0", "method": "SportsAPING/v1.0/listMarketBook", "params": {"marketIds":["1.173114453"],"priceProjection":{"priceData":["SP_AVAILABLE","SP_TRADED","EX_BEST_OFFERS"]}}, "id": 1}]

    $params = '{"marketIds":["' . $marketId . '"], "priceProjection":{"priceData":["SP_AVAILABLE","SP_TRADED","EX_BEST_OFFERS"]}}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketBook', $params);
    return $jsonResponse[0]->result[0];
}

function getMarket_type($appKey, $sessionToken, $marketId)
{
    $params = '{"marketIds":["' . $marketId . '"], "priceProjection":{"priceData":["EX_BEST_OFFERS"]}}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listMarketTypes', $params);
    return $jsonResponse[0]->result[0];
}



/*
function getOdds($appKey, $sessionToken, $marketId,$id_selecion)
{
    $params = '{"marketIds":["' . $marketId . '"], "selectionIds":["' . $id_selecion . '"], "priceProjection":{"priceData":["EX_BEST_OFFERS"]}}';
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'listRunnerBook', $params);
    return $jsonResponse[0]->result[0];
}
*/

function printMarketIdRunnersAndPrices($nextHorseRacingMarket, $marketBook,$id_mkt)
{
	#$id_mkt = $nextHorseRacingMarket->marketId;
	$dd_odds = array();
    function printAvailablePrices($selectionId, $marketBook)
    {
		
        // Get selection
        foreach ($marketBook->runners as $runner) 
            if ($runner->selectionId == $selectionId) break;
        echo "<tr style=''><th colspan='2'>Back:<th><th colspan='2'>Lay:<th> </tr>";
		echo "<tr>";
        foreach ($runner->ex->availableToBack as $availableToBack){
		// inseri no banco 
		
		$dd_odds = array(
			#'id_user' => $this->session->userdata('id'),
			#'id_mkt' => $nextHorseRacingMarket->marketId,
			'selection_id' => $selectionId,
			'tamanho' => $availableToBack->price,
			'odd' => $availableToBack->size
		);
		$qr_num = mysqli_query("SELECT * FROM odds_mkt WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 
		if(mysqli_fetch_assoc($qr_num) == 0){
			mysqli_query("INSERT INTO `odds_mkt` (`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `dt`) VALUES ('".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', CURRENT_TIMESTAMP)");
		}else{
			mysqli_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToBack->size."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back'" );
		}
		//$this->db->insert('odds_mkt' , $dd_odds);
		#$this->db->where($dd_odds);
		#$qr_verifica = $this->db->get('odds_mkt');
		#$qr_verifica = $this->padrap_model->get_by_matriz('id_mkt',$nextHorseRacingMarket->marketId,'odds_mkt');
		
		#if($qr_verifica->num_rows() == 0){
			#$this->db->insert('odds_mkt' , $dd_odds);
		#}
		
		
            echo "<td class='set_odd back basic-dialog' style='background-color:#a6d8ff'  title='".$selectionId."'><label class='preco'>". "" . $availableToBack->price ."</label><br><small>".$availableToBack->size."</small></td>";
		#$arr[$selectionId] =  $availableToBack->price;
		#echo "</tr>";	
        #echo "<tr style='border:red 1px solid'><th colspan='2'>Lay:<th> </tr>";
		#echo "<tr style='border:blue 1px solid'>";
		}
        foreach ($runner->ex->availableToLay as $availableToLay){
		
		// inseri no banco 
		
		$dd_odds = array(
			#'id_user' => $this->session->userdata('id'),
			'id_mkt' => $nextHorseRacingMarket->marketId,
			'selection_id' => $selectionId,
			'tamanho' => $availableToBack->price,
			'odd' => $availableToBack->size,
			'tipo' => 'lay'
		);
		/*
		$this->db->where($dd_odds);
		$qr_verifica = $this->db->get('odds_mkt');
		if($qr_verifica->num_rows() == 0){
			$this->db->insert('odds_mkt' , $dd_odds);
		}
		*/
		#$this->db->insert('odds_mkt' , $dd_odds);
		$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' "); 
		if(mysql_fetch_assoc($qr_num) == 0){
			mysql_query("INSERT INTO `odds_mkt` (`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `dt`) VALUES ('".$id_mkt."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', CURRENT_TIMESTAMP)");
		}else{
			
			mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay'" );
		}
            echo "<td style='background-color:#fac9d1' class='set_odd lay basic-dialog'  title='".$selectionId."'>"." <label class='preco'>".$availableToLay->price ."</label><br><small>".$availableToLay->size."</small></td>";
		}
		echo "</tr>";	
		
    }
	#echo "<tr>";
    echo "<h2 class='tb_partidas'>" . $nextHorseRacingMarket->marketName."</h2>";
	echo "<small class='tb_partidas'>MarketId: " . $nextHorseRacingMarket->marketId."</small>";
    foreach ($nextHorseRacingMarket->runners as $runner) {
        echo "<h2 class='tb_partidas'>SelectionId: " . $runner->selectionId . " Marketing: " . $runner->runnerName . "</h2>";
        echo "<table class='tb_partidas' style='border:black 1px solid'>";
		echo printAvailablePrices($runner->selectionId, $marketBook);
		echo "</table>";
		#echo "Call";
		#echo count($dd_odds);
		#print_r($dd_odds);
		
    }
	
		
		
}

function printMarketIdRunnersAndPrices_list($nextHorseRacingMarket, $marketBook)
{
	$dd_odds = array();
    function printAvailablePrices($selectionId, $marketBook)
    {
		
        // Get selection
        foreach ($marketBook->runners as $runner) 
            if ($runner->selectionId == $selectionId) break;
        echo "<tr style=''><th colspan='2'>Back:<th><th colspan='2'>Lay:<th> </tr>";
		echo "<tr>";
        foreach ($runner->ex->availableToBack as $availableToBack){
		// inseri no banco 
		
		$dd_odds = array(
			#'id_user' => $this->session->userdata('id'),
			#'id_mkt' => $nextHorseRacingMarket->marketId,
			'selection_id' => $selectionId,
			'tamanho' => $availableToBack->price,
			'odd' => $availableToBack->size
		);
		$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 
		if(mysql_fetch_assoc($qr_num) == 0){
			mysql_query("INSERT INTO `odds_mkt` (`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `dt`) VALUES ('".$nextHorseRacingMarket->marketId."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', CURRENT_TIMESTAMP)");
		}else{
			mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToBack->size."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back'" );
		}
		//$this->db->insert('odds_mkt' , $dd_odds);
		#$this->db->where($dd_odds);
		#$qr_verifica = $this->db->get('odds_mkt');
		#$qr_verifica = $this->padrap_model->get_by_matriz('id_mkt',$nextHorseRacingMarket->marketId,'odds_mkt');
		
		#if($qr_verifica->num_rows() == 0){
			#$this->db->insert('odds_mkt' , $dd_odds);
		#}
		
		
            echo "<td class='set_odd basic-dialog' style='background-color:#a6d8ff'  title='".$selectionId."'><label class='preco'>". "" . $availableToBack->price ."</label><br><small>".$availableToBack->size."</small></td>";
		#$arr[$selectionId] =  $availableToBack->price;
		#echo "</tr>";	
        #echo "<tr style='border:red 1px solid'><th colspan='2'>Lay:<th> </tr>";
		#echo "<tr style='border:blue 1px solid'>";
		}
        foreach ($runner->ex->availableToLay as $availableToLay){
		
		// inseri no banco 
		
		$dd_odds = array(
			#'id_user' => $this->session->userdata('id'),
			'id_mkt' => $nextHorseRacingMarket->marketId,
			'selection_id' => $selectionId,
			'tamanho' => $availableToBack->price,
			'odd' => $availableToBack->size,
			'tipo' => 'lay'
		);
		/*
		$this->db->where($dd_odds);
		$qr_verifica = $this->db->get('odds_mkt');
		if($qr_verifica->num_rows() == 0){
			$this->db->insert('odds_mkt' , $dd_odds);
		}
		*/
		#$this->db->insert('odds_mkt' , $dd_odds);
		$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'lay' "); 
		if(mysql_fetch_assoc($qr_num) == 0){
			mysql_query("INSERT INTO `odds_mkt` (`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `dt`) VALUES ('".$nextHorseRacingMarket->marketId."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'lay', CURRENT_TIMESTAMP)");
		}else{
			
			mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay'" );
		}
            echo "<td style='background-color:#fac9d1' class='set_odd basic-dialog'  title='".$selectionId."'>"." <label class='preco'>".$availableToLay->price ."</label><br><small>".$availableToBack->size."</small></td>";
		}
		echo "</tr>";	
		
    }
	#echo "<tr>";
    #echo "<h2 class='tb_partidas'>" . $nextHorseRacingMarket->marketName."</h2>";
	#echo "<small class='tb_partidas'>MarketId: " . $nextHorseRacingMarket->marketId."</small>";
    foreach ($nextHorseRacingMarket->runners as $runner) {
        #echo "<h2 class='tb_partidas'>SelectionId: " . $runner->selectionId . " Marketing: " . $runner->runnerName . "</h2>";
        echo "<table class='tb_partidas' style='border:black 1px solid'>";
		echo $this->printAvailablePrices($runner->selectionId, $marketBook);
		echo "</table>";
		#echo "Call";
		#echo count($dd_odds);
		#print_r($dd_odds);
		
    }
	
		
		
}



function placeBet_bk($appKey, $sessionToken, $marketId, $selectionId)
{
	 $tipo = $this->input->post('tipo');
	 $valor = $this->input->post('valor');
	 $size_post = $this->input->post('size');
	 $size = str_replace(",",".",$size_post);
	// $size = number_format($size_post, 2, ',', '.');
	 #echo $size;
	 #return false;
	 #return false;
    $params = '{"marketId":"' . $marketId . '",
                "instructions":
                     [{"selectionId":"' . $selectionId . '",
                       "handicap":"0",
                       "side":"'.$tipo.'",
                       "orderType":
                       "LIMIT",
                       "limitOrder":{"size":"'.$size_post.'",
                                    "price":"'.$valor.'",
                                    "persistenceType":"LAPSE"}
                       }], "customerRef":"fsdf"}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'placeOrders', $params);
    return $jsonResponse[0]->result;
}


function placeBet($appKey, $sessionToken, $marketId, $selectionId)
{
	$tipo = strtoupper($this->input->post('tipo'));
	$valor = floatval($this->input->post('valor'));
	$size_post = $this->input->post('size');
 	$size = str_replace(",",".",$size_post);
	$size_db = floatval($size_post);
	/*
	if(is_float($size_db)){
		echo "OK";
	}else{
		echo "Nao é";
	}
	return false;
	*/
    $params = '{"marketId":"' . $marketId . '",
                "instructions":
                     [{"selectionId":"' . $selectionId . '",
                       "side":"'.$tipo.'",
                       "orderType":
                       "LIMIT",
                       "limitOrder":{"price":'.$size_db.',
                                    "size":'.$valor.',
                                    "persistenceType":"LAPSE"}
                       }], "customerRef":"tradersize"}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'placeOrders', $params);
    return $jsonResponse[0]->result;
}

function list_bets_atual($appKey, $sessionToken)
{
	
	/*
    $params = '{"marketId":"' . $marketId . '",
                "instructions":
                     [{"selectionId":"' . $selectionId . '",
                       "side":"BACK",
                       "orderType":
                       "LIMIT",
                       "limitOrder":{"price":'.$size_db.',
                                    "size":'.$valor.',
                                    "persistenceType":"LAPSE"}
                       }], "customerRef":"tradersize"}';
					   */
    #$params = '{}';
	
	// refer: http://docs.developer.betfair.com/docs/display/1smk3cen4v3lu3yomq5qye0ni/Betting+Enums#BettingEnums-OrderBy	
	$params = '{"orderBy" : "BY_PLACE_TIME" , "SortDir" : "EARLIEST_TO_LATEST"}';
	#$params = '{"orderBy" : "BY_MATCH_TIME"}';
	#$params = '{"orderBy" : "BY_MATCH_TIME"}';
	#$params = '{"SortDir" : "LATEST_TO_EARLIEST"}';
		
	#$params = '{"orderBy" : "BY_SETTLED_TIME"}';
	
	
	$jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listCurrentOrders', $params);
    return $jsonResponse[0]->result;
}



function printBetResult($betResult)
{
    #echo "Status: " . $betResult->status;
    if ($betResult->status == 'FAILURE') {
        #echo "\nErrorCode: " . $betResult->errorCode;
        #echo "\n\nInstruction Status: " . $betResult->instructionReports[0]->status;
        #echo "\nInstruction ErrorCode: " . $betResult->instructionReports[0]->errorCode;
		
		if($betResult->errorCode == 'MARKET_SUSPENDED'){
			echo "<p style='color:red'>Mercado Suspenso</p>";
		}
		
		
		if($betResult->errorCode == 'INSUFFICIENT_FUNDS'){
			echo "<p style='color:red'>Saldo Insuficiente</p>";
		}
		
		if($betResult->errorCode == 'BET_ACTION_ERROR'){
			echo "<p style='color:red'>Valor Inválido</p>";
		}
		
		
    } else{
		// inseri no banco de dados
        $id_bet = $betResult->instructionReports[0]->betId;
		$selectionId = $betResult->instructionReports[0]->selectionId;
		$marketId = $betResult->instructionReports[0]->marketId;
		#$side = $betResult->instructionReports[0]->side;
		#$size = $betResult->instructionReports[0]->size;
		#$price = $betResult->instructionReports[0]->price;
		
		$averagePriceMatched = $betResult->instructionReports[0]->averagePriceMatched;
		$sizeMatched = $betResult->instructionReports[0]->sizeMatched;
		$placedDate = $betResult->instructionReports[0]->placedDate;
		$status_bet  = $betResult->instructionReports[0]->status;
		//print_r($betResult->instructionReports[0]);
		#echo "<br><br>";
		
		// RESPONSE BETFAIR
		/*
		stdClass Object ( 
			[status] => SUCCESS 
			[instruction] => stdClass Object ( 
				[selectionId] => 58805 
				[limitOrder] => stdClass Object ( 
					[size] => 4 [price] => 4.1 
					[persistenceType] => LAPSE 
				) 
				[orderType] => LIMIT 
				[side] => BACK
			) 
			[betId] => 102451687400 
			[placedDate] => 2017-09-13T18:23:03.000Z 
			[averagePriceMatched] => 4.1 
			[sizeMatched] => 4 
			[orderStatus] => EXECUTION_COMPLETE 
		)

		*/
		
		$dd_bet = array(
			'id_user' => $this->session->userdata('id'),
			'id_bet' => $id_bet,
			'selectionId' => $selectionId,
			'marketId' => $marketId,
			#'side' => $side,
			#'size' => $size,
			#'price' => $price,
			'averagePriceMatched' => $averagePriceMatched,
			'sizeMatched' => $sizeMatched,
			'placedDate' => $placedDate,
			'status' => $status_bet
		);
		$lucro = ($sizeMatched * $averagePriceMatched) - $sizeMatched;
		#$this->db->insert('place_order' , $dd_bet);
		echo "Aposta Realizada!<br>";
		echo "Bet Id: ".$id_bet."<br>";
		//echo "Lucro: ".number_format($lucro, 2, ',', '.')."<br>";
		#print_r($betResult->instructionReports[0]);
	}
		#echo "<br>";
		#print_r($betResult);
}
function sportsApingRequest($appKey, $sessionToken, $operation, $params)
{
    $ch = curl_init();
	
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	$auth =  $this->session->userdata("token_type").' '.$this->session->userdata("token");
    curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/betting/json-rpc/v1");
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
        '[{ "jsonrpc": "2.0", "method": "SportsAPING/v1.0/' . $operation . '", "params" :' . $params . ', "id": 1}]';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $this->debug('Post Data: ' . $postData);
    $response = json_decode(curl_exec($ch));
    $this->debug('Response: ' . json_encode($response));
    curl_close($ch);
    if (isset($response[0]->error)) {
        echo 'Call to api-ng failed: ' . "\n";
        echo  'Response: ' . json_encode($response);
		#redirect('dash/sair');
		#echo  'Response: :';
		#echo "\n";
		#echo "<h1>".$response['0']['errorCode']." **</h1>";
		#print_r($response);
		
        exit(-1);
    } else {
        return $response;
    }
}


public function sportsApingRequest_appkey($appKey, $sessionToken, $operation, $params)
{
    $ch = curl_init();
	#echo $this->session->userdata("token_type").' ** '.$this->session->userdata("token");
	#return false;
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    #echo $appKey." ".$sessionToken;
    #return false;
	
    #curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/account/json-rpc/v1");
	curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/betting/json-rpc/v1");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $appKey,
        #'Authorization:"'. $this->session->userdata("token_type").' '.$this->session->userdata("token").'"',
		'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));
    $postData =
        '[{ "jsonrpc": "2.0", "method": "SportsAPING/v1.0/' . $operation . '", "params" :' . $params . ', "id": 1}]';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $this->debug('Post Data: ' . $postData);
    $response = json_decode(curl_exec($ch));
    $this->debug('Response: ' . json_encode($response));
    curl_close($ch);
    if (isset($response[0]->error)) {
        echo 'Call to api-ng failed: ' . "\n";
        echo  'Response: ' . json_encode($response);
		//redirect('dash/sair');
        exit(-1);
    } else {
        return $response;
    }
}




/*
function getAccountFunds($appKey, $sessionToken)
{
    $ch = curl_init();
	
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
    curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/account/json-rpc/v1");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $appKey,
        'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));
    $postData =
        '[{ "jsonrpc": "2.0", "method": "AccountAPING/v1.0/getAccountFunds", "params": {"wallet":"AUSTRALIAN"}, "id": 1}';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    debug('Post Data: ' . $postData);
    $response = json_decode(curl_exec($ch));
    debug('Response: ' . json_encode($response));
    curl_close($ch);
    if (isset($response)) {
        echo 'Call to api-ng failed: ' . "\n";
        echo  'Response: ' . json_encode($response);
        exit(-1);
    } else {
        return $response;
    }
}
*/

function get_fundos($appKey='6A1cQNtoRmi0GDOS'){
	$params = '{}';
	$ch = curl_init();
	
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
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
        '[{ "jsonrpc": "2.0", "method": "AccountAPING/v1.0/getAccountFunds", "params" :' . $params . ', "id": 1}]';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $this->debug('Post Data: ' . $postData);
    $response = json_decode(curl_exec($ch));
    $this->debug('Response: ' . json_encode($response));
    curl_close($ch);
	//$response[0]->result;
    return $response[0]->result;
//        return $response;
    
	
/*	
	//"{""jsonrpc"": ""2.0"",""method"":""AccountAPING/v1.0/getAccountFunds"",""params"": {""wallet"":""UK""},""id"": 1}"
	//($appKey, $sessionToken, $operation, $params)
	$params = '{}';
	$sessionToken = '';
	#$params = '{"wallet":"UK"}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'getAccountFunds', $params);
    return $jsonResponse[0]->result;

*/	
/*	
	$ch = curl_init();
	
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
    $auth =  $this->session->userdata("token_type").' '.$this->session->userdata("token");
	$endpoint = 'https://api.betfair.com/exchange/account/json-rpc/v1';
    curl_setopt($ch, CURLOPT_URL, $endpoint);
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
        '[{ "jsonrpc": "2.0", "method": "AccountAPING/v1.0/getAccountFunds", "params": {"wallet":"UK"}, "id": 1}';
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $this->debug('Post Data: ' . $postData);
    $response = json_decode(curl_exec($ch));
    $this->debug('Response: ' . json_encode($response));
    curl_close($ch);
    if (isset($response)) {
        echo 'Call to api-ng failed: ' . "\n";
        echo  'Response: ' . json_encode($response);
        exit(-1);
    } else {
        return $response;
    }*/
	
} // x fn

function getAccountFunds($api_method="", $action="", $params=""){
	#$res = send_request($api_method, $action, $params); 
	$params = '{"filter":{}}';
	$action = 'listEventTypes';
	$api_method = 'AccountAPING';
	
	$argv[1] = 'sl4K5RkqJvpsKvPc'; //id de augusto app key
	$argv[2] = 'ZUD8x0AZoahabjzD00ORNyMtA4VlfILacZwWejsg9+A='; // session key
	
	#echo $argv[1];
	#return false;
	$APP_KEY = $argv[1];
	$SESSION_TOKEN = $argv[2];
	
/*	
    if(!isset($_SESSION['session']) or empty($_SESSION['session'])){
        $_SESSION['session'] = login_non_interactive(APP_KEY);
    }
*/

    $endpoint = 'https://api.betfair.com/exchange/account/json-rpc/v1';
	
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
	

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $APP_KEY,
        'X-Authentication: ' . $SESSION_TOKEN,
        'Accept: application/json',
        'Content-Type: application/json'
    ));

    $postData =
        '[{ "jsonrpc": "2.0", "method": "'.$api_method.'/v1.0/' . $action . '", "params" :' . $params . ', "id": 1}]';

    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
	
    if( ! $response = curl_exec($ch)){
        trigger_error(curl_error($ch)); 
    }

    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
	echo $response;
    if ($http_status == 200) {
        return json_decode($response);
    } else {
        echo  'Error: ' . $response;
    }
	
}
function debug($debugString)
{
    global $DEBUG;
    if ($DEBUG)
        echo $debugString . "\n\n";
}
	

function login($appKey,$sessionToken){
	
	$loginEndpoint= "https://identitysso.betfair.com/api/login";
	
	$cookie = "";
	
	$username = "igormarlus";
	$password = "N2009Lab";

	
	$login = "true";
	$redirectmethod = "POST";
	$product = "home.betfair.int";
	$url = "https://www.betfair.com/";

	$fields = array
		(
			'username' => urlencode($username),
			'password' => urlencode($password),
			'login' => urlencode($login),
			'redirectmethod' => urlencode($redirectmethod),
			'product' => urlencode($product),
			'url' => urlencode($url)
		);

	//open connection
	$ch = curl_init($loginEndpoint);
	//url-ify the data for the POST
	$counter = 0;
	$fields_string = "&";
	
	foreach($fields as $key=>$value) 
		{ 
			if ($counter > 0) 
				{
					$fields_string .= '&';
				}
			$fields_string .= $key.'='.$value; 
			$counter++;
		}

	rtrim($fields_string,'&');

	#$curl_setopt($ch, CURLOPT_URL, "https://api.betfair.com/exchange/betting/json-rpc/v1");
	/*
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'X-Application: ' . $appKey,
        'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));
	*/
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
	curl_setopt($ch, CURLOPT_URL, $loginEndpoint);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$fields_string);
	curl_setopt($ch, CURLOPT_HEADER, true);  // DO  RETURN HTTP HEADERS
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // DO RETURN THE CONTENTS OF THE CALL

	//execute post

	$result = curl_exec($ch);


	echo $result;
 
	if($result == false) 
		{
   	 		echo 'Curl error: ' . curl_error($ch);
		} 
	
	else 
		{
			$temp = explode(";", $result);
			$result = $temp[0];
			
			$end = strlen($result);
			$start = strpos($result, 'ssoid=');
			$start = $start + 6;
		
			$cookie = substr($result, $start, $end);
                        
		}
	curl_close($ch);
	
	return $cookie;
}
// minhas
function get_total_volume($selectionId,$lado,$porcentagem=0){
	include("includes/mysqli_con.php");
		/*
		$where = array(
			'selection_id' => $selectionId,
			'tipo' => $lado
		);
		$this->db->where($where);
		$qr = $this->db->get('odds_mkt');
		$total = 0;
		foreach($qr->result() as $dd){
			$total += $dd->tamanho;
		}
		echo $total;
		*/
		$qr_selection_vol = mysqli_query($con,"SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE '".$lado."' ORDER BY id desc LIMIT 10 ")or die(mysql_error()); 
		$total = 0; 
		while ($row_vol = mysqli_fetch_assoc($qr_selection_vol)) { 
			$total += $row_vol["tamanho"];
		}
		echo $total;
	} // x fn
	
	function get_id_mkt($appKey, $sessionToken,$id_evento=0) // OVER_UNDER_15  //MATCH_ODDS
{
	
	
	$params = '{"filter":{
				"eventTypeId" : "7"
				"eventIds":["' . $id_evento . '"],
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"1",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}
	// PEGA INFOR DOS CAVALOS 
	function get_dd_id_mkt($appKey, $sessionToken,$id_mkt=0,$tipo="RUNNER_METADATA") // OVER_UNDER_15  //MATCH_ODDS
{
	
	
	$params = '{"filter":{
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"50",
              "marketProjection":["'.$tipo.'"]}';
	
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}
	
	function get_odds_api($id_evento=0,$id_mkt=0,$side="lay",$odds=0){
		include('includes/betapi/jsonrpc-futbol.php'); 
		#echo " ********".$APP_KEY;
		#$dds = $this->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$id_mkt);
		$mkts = $this->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$id_mkt);
		foreach($mkts as $odd){ 
			$marketBook = $this->betfront_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
			echo  json_encode($marketBook);
			#echo "<br / ><hr /><br>";
		}
		

	}

	function get_percentual_selecions_light($id_evento,$id_mkt=0,$side="lay",$odds=0){
		include("includes/mysqli_con.php");
		#print_r($odds);
		#echo "<br/>";
		#echo "<br />";
		#print_r($odds['back']);

		//echo "<strong> **** ".$odds['back']['47972']." ***</strong>";
		#################### BLOQUEIA CASO N ESTEJA LOGADO ######################
		/*if(!$this->session->userdata('id')){
			echo '<div class="row">
				<p><a class="btn btn-warning" href="'.base_url().'home/login">Login</a> ou <a href="'.base_url().'home/cadastro" class="btn btn-primary"> Cadastre-se </a></p>
				
			</div>';
			return false;
		}*/
		#echo "<br /><hr />";
		#return false;
		#echo $id_mkt;
		#return $odds;
		#return false;
		include('includes/betapi/jsonrpc-futbol.php'); 
		#echo " ********".$APP_KEY;
		$dds = $this->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$id_mkt);
		// echo "<h4 style='color:green'> **** ".$total."</h4>";
		//print_r($dds);
		if($id_mkt == 0){
			foreach($dds as $dd){
				$id_mkt =  $dd->marketId;
				$total =  "$".number_format($dd->totalMatched, 2, ',', '.');
				#$disponivel =  "$".number_format($dd->totalAvailable, 2, ',', '.');

				
			}
		}
		?>

		<script type="text/javascript">
			$(document).ready(function(){
			



				$( ".bt_back" ).hover(
				  function() {
				    //$( this ).append( $( "<span> ***</span>" ) );
				    //$(this).attr("style","opacity: 0.7");
				    //$(".bt_back").attr("style","background-color:#75c2fd");
				    //$("#soma_total_back").attr("style","background-color:#75c2fd");
				    testAnim("soma_total_back","flash");
				  }, function() {
				    //$( this ).find( "span" ).last().remove();
				    //$(".bt_back").attr("style","background-color:none");
				    //$(".bt_lay").attr("style","opacity: 1");
				    //$("#soma_total_back").attr("style","background-color:none");
				  }
				);

				$( ".bt_lay" ).hover(
				  function() {
				    //$( this ).append( $( "<span> ***</span>" ) );
				   // $(this).attr("style","opacity: 0.7");
				    //$(".bt_lay").attr("style","background-color:lightpink");
				    $//("#soma_total_lay").attr("style","background-color:lightpink");
				    testAnim("soma_total_lay","flash");
				  }, function() {
				    //$( this ).find( "span" ).last().remove();
				    //$(".bt_lay").attr("style","background-color:none");
				    //$(".bt_lay").attr("style","opacity: 1");
				     //$("#soma_total_lay").attr("style","background-color:none");
				  }
				);

				$(".bt_graph").click(function(){
					
					<? /* if(!$this->session->userdata('id')){ ?>
						alert("Faça o login");
						return false;
					<? } ?>	
					<? if($this->session->userdata('id')){ ?>
						//alert("Faça o login no Trader Size para ter acesso aos gráficos");
						//return false;
					<? } */ ?>	

					$("#graph_ts").html("");
					var id_selection_g = $(this).val();
					var id_mkt_g = $(this).attr('data-id-mkt');
					var tipo_g = $(this).attr('data-tipo');
					var side_g = $(this).attr('data-side');

					//alert(id_selection_g+" "+id_mkt_g+" "+tipo_g+" "+side_g);

					$("#graph_ts").append("<p align='center'>Carregando...</p>");
					//alert("opa 3");
					$.get("<?=base_url()?>bets/graph/"+id_mkt_g+"/"+id_selection_g+"/"+tipo_g+"/"+side_g , function(data){

						$("#graph_ts").html("");
						$("#graph_ts").append(data);
						//alert("222222 "+id_selection_g+" "+id_mkt_g+" "+tipo_g+" "+side_g);

					});
					//alert("opa 4");
					//alert(id_selection+" - "+id_mkt_g);
				})
				$('#modal_graph').draggable();


				$("#bt_ver_mais").click(function(){
					var val_stat = $(this).val();
					if(val_stat == '0'){
						$(".ipt_size").show();
	        			$(".total_size").show();
	        			$("#bt_ver_mais").val('1');
	        		}
	        		if(val_stat == '1'){
						$(".ipt_size").hide()
	        			$(".total_size").hide();
	        			$("#bt_ver_mais").val('0');
	        		}
		        	//alert("Fooi 44");
		      });


				





			})
		</script>

		<?
		#print_r($dds[0]);
		echo "<h5 id='total_correspondidos' class='card-title text-left' title='' style='color:green'>$ ".number_format($dds[0]->totalMatched, 2, ',', '.')."</h5>";
		echo "<h5 id='status_live' class='card-title text-left' title='' style='color:green'>--</h5>";
		echo "<table class='table'>
				<tr class=''>
						<th> <a href='https://youtu.be/QKR8YGhpE5E' target='_blank' title='Entenda o Trader Size'><img src='".base_url()."imagens/duvidas.png' title='Dúvidas?' /> </a> 
						</th> 
						<th><span style='color:#75c2fd'><strong>A Favor<br>(BACK)</strong></span></th> 
						
						<th><span style='color:#f694aa'><strong>Contra<br>(LAY)</strong></span> </th>
						
					</tr>";
		$qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND   tipo = 'back' AND selection_name <> '' "); 
		$s=0; 
			
			foreach($qr_selecoes->result() as $selecao){ 
			$s++;
			$qr_num = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selecao->selection_id."' AND tipo = '".$side."' "); 	
				$nn = $qr_num->num_rows();			
				#$soma_back_sel_ci = $this->db->query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' order by id desc LIMIT 5  ");
				if($qr_num->num_rows() == 0){
					$pecentual_back = 0;
					echo "
					<li >
						<strong>No data</strong>

					</li>
				";
				}else{
					// back
					$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = '".$side."' order by dt_update desc LIMIT 5  ");
					$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = '".$side."' order by dt_update desc LIMIT 5  ");
					$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
					$soma_total_back = mysqli_fetch_assoc($soma_back);
					#print_r($soma_total_back);
					#return false;
					$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
					// LAY
					$soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 5  ");
					$soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by dt_update desc LIMIT 5  ");
					$soma_total_sel_lay = mysqli_fetch_assoc($soma_lay_sel);
					$soma_total_lay = mysqli_fetch_assoc($soma_lay);
					$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];

					$qr_odd_back = mysqli_query($con,"SELECT  odd FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 1");
					$dd_odd_back = mysqli_fetch_assoc($qr_odd_back);

					$qr_odd_lay = mysqli_query($con,"SELECT  odd FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'lay' order by dt_update desc LIMIT 1");
					$dd_odd_lay = mysqli_fetch_assoc($qr_odd_lay);

				}
				$mostra_odds = false;
				if(isset($odds['back'][$selecao->selection_id]) ){
					$bg_destaque = "";
					if($pecentual_back > 85){
						$bg_destaque = "green";
					}
					if($pecentual_back < 30){
						$bg_destaque = "red";
					}
					$mostra_odds = true;
					echo "
						<tr class=''>
							<th id='sel".$selecao->selection_id."'>".$selecao->selection_name." <br />  


							<div class='input-group mb-3' style=''>
							  <div class='input-group-prepend'>
							    <button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='glyph-icon icon-signal'></i></button>
							    <div class='dropdown-menu'>
							      <button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='lay' class='bt_graph btn btn-outline-primary'><i class='glyph-icon icon-signal'></i></button>

									<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='lay' class='bt_graph btn btn-outline-primary'><i class='glyph-icon icon-tag'></i></button>

									<button  title='Formato Pizza' value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='lay' class='bt_graph btn btn-outline-primary'><i class='glyph-icon icon-pie-chart'></i></button>

								      <div role='separator' class='dropdown-divider'></div>
								      

								      	<button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='back' class='bt_graph btn btn-outline-danger'><i class='glyph-icon icon-signal'></i></button>

										<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='back' class='bt_graph btn btn-outline-danger'><i class='glyph-icon icon-tag'></i></button>

										<button title='Formato Pizza'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='back' class='bt_graph btn btn-outline-danger'><i class='glyph-icon icon-pie-chart'></i></button>


							    </div>
							  </div>
							</div>

							<br /><div id='sel_balanco_<?=$selecao->selection_id?>'></div> 
							</th> 
							<td class='flipInY animated bt_back' data-odd='".$odds['back'][$selecao->selection_id]."' data-selection_id='".$selecao->selection_id."' data-nm_selection='".$selecao->selection_name."' data-lado='BACK' data-id_mkt='".$id_mkt."' title=''>  
							<strong id='odd_back_".$selecao->selection_id."' class='flipInY animated'>".$odds['back'][$selecao->selection_id]."</strong><br /> <label id='percentual_back_".$selecao->selection_id."' style='color:$bg_destaque'> ".round($pecentual_back,2)."% </label> <br />  


                <div class='progress'>
                  <div id='progress_back_".$selecao->selection_id."' class='progress-bar bg-primary' role='progressbar' style='width: ".round($pecentual_back,2)."%;' aria-valuenow='".round($pecentual_back,2)."' aria-valuemin='0' aria-valuemax='100'>".round($pecentual_back,2)."%</div>
                </div>
              
							<input type='text' class='ipt_size' id='size_back_1_".$selecao->selection_id."'>
							<input type='text' class='ipt_size' id='size_back_2_".$selecao->selection_id."'>
							<input type='text' class='ipt_size' id='size_back_3_".$selecao->selection_id."'>
							<input type='text' class='total_size_back total_size' title='".$selecao->selection_id."' id='total_size_back".$selecao->selection_id."'>

							
							</td>"; 
				}
				if(isset($odds['lay'][$selecao->selection_id]) ){	
					$bg_destaque = "";
					if($pecentual_lay > 85){
						$bg_destaque = "green";
					}	
					if($pecentual_lay < 30){
						$bg_destaque = "red";
					}
					$mostra_odds = true;	
					echo "		
							<td class='flipInY animated bt_lay' data-odd='".$odds['lay'][$selecao->selection_id]."' data-selection_id='".$selecao->selection_id."' data-nm_selection='".$selecao->selection_name."' data-lado='LAY' data-id_mkt='".$id_mkt."' title='' title='".$selecao->selection_id."'> 
							<strong id='odd_lay_".$selecao->selection_id."' class='flipInY animated'>".$odds['lay'][$selecao->selection_id]."</strong> 
							<br/ > <label id='percentual_lay_".$selecao->selection_id."' style='color:$bg_destaque'> ".round($pecentual_lay,2)."% </label>  <br />

              <div class='progress'>
                  <div id='progress_lay_".$selecao->selection_id."' class='progress-bar bg-danger' role='progressbar' style='width: ".round($pecentual_lay,2)."%;' aria-valuenow='".round($pecentual_lay,2)."' aria-valuemin='0' aria-valuemax='100'>".round($pecentual_lay,2)."%</div>
                </div>
              
							<input type='text' class='ipt_size'  id='size_lay_1_".$selecao->selection_id."'>
							<input type='text' class='ipt_size'  id='size_lay_2_".$selecao->selection_id."'>
							<input type='text' class='ipt_size'  id='size_lay_3_".$selecao->selection_id."'>
							
              <input type='text' class='total_size_lay total_size' title='".$selecao->selection_id."' id='total_size_lay".$selecao->selection_id."'>
							
							</td>
							
						</tr>

					";
					/*

					

					

					*/
				}
				if($mostra_odds == false){
					echo "<p>No odd</p>";
				}
			} // x foreach
			// link clear
			$clear = "";
			if($this->session->userdata('id')){
				$clear  = "<div class='btn btn-warning btn-outline'><a href='".base_url()."dash/rem_mkt/".$id_mkt."' target='_self' id='bt_clear'><img width='24px' src='".base_url()."imagens/clear.png' title='Limpar dados antigos (Usado após o gol ou caso queira pegar os últimos registros sem dados anteriores)' class='tada animated'></a></div> <button id='bt_ver_mais' class='btn btn-warning btn-outline' value='0'><i class='glyph-icon icon-eye' > </i></div> ";
			}
			if(isset($soma_total_back['soma'])){
				echo "
					<tr class='bg-light'>
							<th> $clear </th> 
							<td class='flipInY animated'  style='font-size:12px;font-weight:bold'>$ <label id='soma_total_back'>".number_format($soma_total_back['soma'], 2, ',', '.')."</label>
							</td> 
							<td class='flipInY animated' style='font-size:12px;font-weight:bold'> $ <label id='soma_total_lay'>".number_format($soma_total_lay['soma'], 2, ',', '.')."</label><td>
							
						</tr>
				";
			}
			echo "
					<tr class='bg-light' style='display:none'>
						<th> Gráficos </th> 
						<td colspan='2' class='flipInY animated' id='soma_total_back'><strong style='font-size:12px'>
							<button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='all' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-signal'></i></button>

							<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='all' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-tag'></i></button>

							<button  title='Formato Pizza' value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='all' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-pie-chart'></i></button>

						</td>

						<!--<td class='flipInY animated' id='soma_total_lay'><strong style='font-size:12px'> 

							<button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='back' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-signal'></i></button>

							<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='back' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-tag'></i></button>

							<button title='Formato Pizza'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='back' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-pie-chart'></i></button>

						 <td> -->
						
					</tr>


					
							
			";
			echo "</table>";
			#echo "<li>Total Matched: <strong> $total  </strong></li>";
		#}
		
	} // x fn

  function list_bets_by_mkt($appKey, $sessionToken,$marketId)
{
  
  
    #$params = '{"marketIds":"' . $marketId . '"}';
  
  #$params = "{'marketId':'".$marketId."'}";    
  
  #$params = '{"marketId" : "'.$marketId.'"}';       
  
  $params = '{"orderBy" : "BY_MATCH_TIME"}';       
    
  
  #$params = '{}';
  
  // refer: http://docs.developer.betfair.com/docs/display/1smk3cen4v3lu3yomq5qye0ni/Betting+Enums#BettingEnums-OrderBy 
  #$params = '{"orderBy" : "BY_PLACE_TIME" , "SortDir" : "EARLIEST_TO_LATEST"}';
  #$params = '{"marketIds" : "marketId" , "SortDir" : "BY_SETTLED_TIME"}';
  #$params = '{"orderBy" : "BY_MARKET" , "SortDir" : "BY_SETTLED_TIME"}';
  
  #$params = '{"orderBy" : "BY_MATCH_TIME" , "SortDir" : "BY_SETTLED_TIME"}';
  #$params = '{"orderBy" : "BY_PLACE_TIME"}';
  #$params = '{"orderBy" : "BY_MATCH_TIME"}';
  
  #$params = '{"SortDir" : "LATEST_TO_EARLIEST"}';
    
  #$params = '{"SortDir" : "BY_MATCH_TIME"}';
  
  
  $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listCurrentOrders', $params);
    return $jsonResponse[0]->result;
  #echo $params;
}

	
	function get_percentual_selecions($id_evento,$id_mkt=0,$side="lay"){
		include("includes/mysqli_con.php");
		#echo $id_mkt;
		#return $odds;
		#return false;
		include('includes/betapi/jsonrpc-futbol.php'); 
		#echo " ********".$APP_KEY;
		$dds = $this->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento);
		#print_r($dds);
		if($id_mkt == 0){
			foreach($dds as $dd){
				$id_mkt =  $dd->marketId;
				$total =  "$".number_format($dd->totalMatched, 2, ',', '.');
			}
		}
		
		$qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND   tipo = 'back' AND selection_name <> '' "); 
		$s=0; 
		
			foreach($qr_selecoes->result() as $selecao){ 
			$s++;
			$qr_num = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selecao->selection_id."' AND tipo = '".$side."' "); 	
				$nn = $qr_num->num_rows();			
				#$soma_back_sel_ci = $this->db->query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' order by id desc LIMIT 5  ");
				if($qr_num->num_rows() == 0){
					$pecentual_back = 0;
					echo "
					<li >
						<strong>No data</strong>

					</li>
				";
				}else{
					
					$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = '".$side."' order by dt_update desc LIMIT 5  ");
					$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = '".$side."' order by dt_update desc LIMIT 5  ");
					$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
					$soma_total_back = mysqli_fetch_assoc($soma_back);
					$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
				}
				$margin_prog = "0";
				if($pecentual_back < 10 ){
					$margin_prog = "-50%";
				}
				if($pecentual_back < 5 ){
					$margin_prog = "-5em";
				}
				if ($this->agent->is_mobile()){
					if($pecentual_back < 50 ){
					$margin_prog = "-50%";
					}
					if($pecentual_back < 5 ){
						$margin_prog = "-5em";
					}
				}
				#$margin_prog = "-15em";
				echo "
					<li data-percent='".$pecentual_back."'>
						<span  title=' ".$selecao->selection_name.": (".count($qr_num).") ".$pecentual_back."%'>".$selecao->selection_name."  </span> <br>
						<div class='progress' title=' ".$selecao->selection_name.": ".$pecentual_back."%'>
							<div class='progress-percent' style='margin-right:".$margin_prog."'><div class='counter counter-inherit counter-instant'><span data-from='0'data-to='".$pecentual_back."' data-refresh-interval='30' data-speed='1000'></span>%</div></div>
						</div>
						

					</li>

				";
			} // x foreach
			#echo "<li>Total Matched: <strong> $total  </strong></li>";
			echo "
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-103260353-1', 'auto');
			  ga('send', 'pageview');

			</script>
			";
		#}
		
	} // x fn

	function get_id_time($time_str){
		$qr = $this->db->query("SELECT * FROM times WHERE time LIKE '%".$time_str."%' ORDER BY id asc LIMIT 1");
		return $qr;
	}



//////////////////////// NOVO FRONT 2019
	// pega mercados mais corerspondidos
function getMarketings_best($appKey, $sessionToken,$id_evento=1,$limit=20,$mercado='')
{
	if($_POST){
		$query = $_POST['query'];
		$params = '{"filter":{ "eventTypeIds":["' . $id_evento . '"], "marketTypeCodes":["'.$query.'"] },
              "sort":"MAXIMUM_TRADED", 
              "maxResults":"'.$limit.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}else{
	// http://docs.developer.betfair.com/docs/display/1smk3cen4v3lu3yomq5qye0ni/Betting+Enums#BettingEnums-MarketSort
	$params = '{"filter":{"eventTypeIds":["' . $id_evento . '"]},
              "sort":"MAXIMUM_TRADED", 
              "maxResults":"'.$limit.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}
	
	if($mercado != ''){
		$params = '{"filter":{ "eventTypeIds":["' . $id_evento . '"], "marketTypeCodes":["'.$mercado.'"] },
              "sort":"MAXIMUM_TRADED", 
              "maxResults":"'.$limit.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}
	
	if($mercado == ""){
		$params = '{"filter":{ "eventTypeIds":["' . $id_evento . '"] },
              "sort":"MAXIMUM_TRADED", 
              "maxResults":"'.$limit.'",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	}

    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}

 ################## HORSES #######################
 function get_percentual_selecions_light_horses($id_evento,$id_mkt=0,$side="lay",$odds=0){
 	#echo "OOOOpa";
 	#return false;
		include("includes/mysqli_con.php");

		// defini variaveis e evita erros
		$total_back_lay = 0;
		
		include('includes/betapi/jsonrpc-futbol.php'); 
		#echo " ********".$APP_KEY;
		$dds = $this->getMkt($APP_KEY, $SESSION_TOKEN,$id_evento,$id_mkt);
		// echo "<h4 style='color:green'> **** ".$total."</h4>";
		#print_r($dds);

		/* 		ORDENAR ARRAY 		*/
		#$sortArray = array(); 
		#$orderby = "sortPriority"; //change this to whatever key you want from the array
		#array_multisort($sortArray[$orderby],SORT_ASC,$dds);
		#echo "<br /><hr />";
		#echo "<h1>ORDENADO</h1>";
		#var_dump($dds); 
		#echo "<br /><hr />";


		if($id_mkt == 0){
			foreach($dds as $dd){
				$id_mkt =  $dd->marketId;
				$total =  "$".number_format($dd->totalMatched, 2, ',', '.');
				#$disponivel =  "$".number_format($dd->totalAvailable, 2, ',', '.');

				
			}
		}
		?>

		<script type="text/javascript">
			$(document).ready(function(){
			



				$( ".bt_back" ).hover(
				  function() {
				    
				    testAnim("soma_total_back","flash");
				  }, function() {
				    
				  }
				);

				$( ".bt_lay" ).hover(
				  function() {
				    
				    testAnim("soma_total_lay","flash");
				  }, function() {
				  }
				);

				$(".bt_graph").click(function(){
					
					
					$("#graph_ts").html("");
					var id_selection_g = $(this).val();
					var id_mkt_g = $(this).attr('data-id-mkt');
					var tipo_g = $(this).attr('data-tipo');
					var side_g = $(this).attr('data-side');

					//alert(id_selection_g+" "+id_mkt_g+" "+tipo_g+" "+side_g);

					$("#graph_ts").append("<p align='center'>Carregando...</p>");
					//alert("opa 3");
					$.get("<?=base_url()?>bets/graph/"+id_mkt_g+"/"+id_selection_g+"/"+tipo_g+"/"+side_g , function(data){

						$("#graph_ts").html("");
						$("#graph_ts").append(data);
						//alert("222222 "+id_selection_g+" "+id_mkt_g+" "+tipo_g+" "+side_g);

					});
					//alert("opa 4");
					//alert(id_selection+" - "+id_mkt_g);
				})
				$('#modal_graph').draggable();


				$("#bt_ver_mais").click(function(){
					var val_stat = $(this).val();
					if(val_stat == '0'){
						$(".ipt_size").show();
	        			$(".total_size").show();
	        			$("#bt_ver_mais").val('1');
	        		}
	        		if(val_stat == '1'){
						$(".ipt_size").hide()
	        			$(".total_size").hide();
	        			$("#bt_ver_mais").val('0');
	        		}
		        	//alert("Fooi 44");
		      });


				





			})
		</script>
		<?
		#echo "<br><hr><br />";
		#print_r($dds[0]);
		echo "<h5 id='total_correspondidos' class='card-title text-left' title='' style='color:green'>$ ".number_format($dds[0]->totalMatched, 2, ',', '.')."</h5>";
		echo "<h5 id='status_live' class='card-title text-left' title='' style='color:green'>--</h5>";
		echo "<table class='table'>
				<tr class=''>
						<th>
						</th> 
						<th><span style='color:#75c2fd'><strong>A Favor<br>(BACK)</strong></span></th> 
						
						<th><span style='color:#f694aa;display:none'><strong>Contra<br>(LAY)</strong></span> </th>
						
					</tr>";
		$qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id,track FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND   tipo = 'back' AND selection_name <> '' "); 
		$s=0; 
			
			#print_r($qr_selecoes->result());
			#echo "<h1>".$qr_selecoes->num_rows()."</h1>";
			foreach($qr_selecoes->result() as $selecao){ 
			$s++;
			#echo "<hr />";
			#echo "<h1>".$s."</h1>";
			$qr_num = $this->db->query("SELECT * FROM odds_mkt_horses WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selecao->selection_id."' AND tipo = '".$side."' "); 	
				$nn = $qr_num->num_rows();			
				#$soma_back_sel_ci = $this->db->query("SELECT SUM(tamanho) as soma FROM odds_mkt_horses  WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' order by id desc LIMIT 5  ");
				if($qr_num->num_rows() == 0){
					$pecentual_back = 0;
					echo "
					<li >
						<strong>No data</strong>
					</li>
				";
				}else{

					$id_partida = $qr_num->row()->id_partida;
					#echo "<h2>".$id_partida." ***</h2>";
					$mercados = $this->betfront_model->getMarketings_horses($APP_KEY, $SESSION_TOKEN,$id_partida);
					#print_r($mercados);
			

					 $m = 0; foreach ($mercados as $mercado) { $m++;
					 	if($mercado->marketType == "MATCH_BET"){
					 		$avb_mkt = $this->betfront_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$id_partida,"MATCH_BET");
					 		#echo "<h1 style='color:red'>".$avb_mkt[0]->marketId."</h1>";
					 		
					 		$dd_avb = array('id_avb' =>  $avb_mkt[0]->marketId);
					 		$this->db->where('id_mkt',$id_mkt);
					 		$this->db->update('odds_mkt_horses' , $dd_avb);
					 		#echo "<h2>".$mercado->marketType." ID  <strong>".$avb_mkt[0]->marketId."</strong></h2>";


					 		// INSERI NA FILA
					 		$qr_verifica_avb = $this->padrao_model->get_by_matriz('marketId',$avb_mkt[0]->marketId,'runs_horses');
					 		if($qr_verifica_avb->num_rows() == 0){
					 			$call = "INSERIDO NA FILA";
					 			$dd_fila = array(
					 				'id_evento' => $id_partida,
					 				'marketId' => $avb_mkt[0]->marketId,
					 				'marketName' => "AVB",
					 				'status' => 1,
					 				'fila' => 0
					 			);
					 			$this->db->insert('runs_horses', $dd_fila);

					 		}else{
					 			#$call = "Ja tem";
					 		}

					 		#echo "<h2 style='color:blue'> ******".$qr_verifica_avb->num_rows()." $call</h2>";



					 	}
					 	#echo "<h2>".$mercado->marketType." </h2>";
					 	#echo "<br></hr>";
					}
					#print_r($mercados);
					#echo $get_id_mkt[0]->marketId." --- ";
					#echo "<br><hr><br>";
					//########### BACK
					$soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = '".$side."' order by dt_update desc LIMIT 3 ");

					$soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = '".$side."' order by dt_update desc LIMIT 3  ");

					// ULTIMAS 3
					$qr_back_sel_last_3 = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = '".$side."' order by dt_update desc LIMIT 5 ");

					$qr_back_sel_last_3_soma = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = '".$side."' order by dt_update desc LIMIT 5 ");

					$total_b_last_3 = 0;
					while($soma_b_3_t = mysqli_fetch_assoc($qr_back_sel_last_3_soma)){
						#echo $soma_b_3_t['tamanho']." (@".$soma_b_3_t['odd'].") + ";
						$total_b_last_3 += $soma_b_3_t['tamanho'];
					}

					// PEGA INFO DO OUTRO CAVALO FRENTE A FRENTE
					if($qr_selecoes->num_rows() == 2){
						$qr_back_sel_last_3_outro = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id <> ".$selecao->selection_id." AND tipo = '".$side."' order by dt_update desc LIMIT 5 ");

						$qr_back_sel_last_3_outro = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id <> ".$selecao->selection_id." AND tipo = '".$side."' order by dt_update desc LIMIT 5 ");

						$total_b_last_3_outro = 0;
						while($soma_b_3_t_outro = mysqli_fetch_assoc($qr_back_sel_last_3_outro)){
							#echo $soma_b_3_t['tamanho']." (@".$soma_b_3_t['odd'].") + ";
							$total_b_last_3_outro += $soma_b_3_t_outro['tamanho'];
						}

						$soma_total_avb = $total_b_last_3 + $total_b_last_3_outro;
						$pecentual_back_avb = ($total_b_last_3 * 100) / $soma_total_avb;
						#$pecentual_back_[$s] = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
					}else{
						$soma_total_avb = 0;
						$pecentual_back_avb = 0;
						$total_b_last_3_outro = 0;
						#$pecentual_back_[$s] = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
					}

					
					

					// ############################

					$qr_soma_back = mysqli_query($con,"SELECT tamanho, odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = '".$side."' order by dt_update desc LIMIT 3  ");


					// pega qtd de odds
					$qr_qtd_back = mysqli_query($con,"SELECT COUNT(id) as qtd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = '".$side."' AND selection_id = ".$selecao->selection_id." order by dt_update desc LIMIT 3  ");



					$soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
					$soma_total_back = mysqli_fetch_assoc($soma_back);
					$qtd_back = mysqli_fetch_assoc($qr_qtd_back);
					
					$pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
					$pecentual_back_total[$s] = $soma_total_sel_back['soma'];

					

					$soma_total_bk =  $soma_total_sel_back['soma'];


					//########## LAY
					$soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 3");
					$soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma, odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by dt_update desc LIMIT 3 ");

					// ULTIMAS 3
					$qr_lay_sel_last_3 = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 5 ");

					$qr_lay_sel_last_3_soma = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 5 ");

					
					$total_l_last_3 = 0;
					while($soma_l_3_t = mysqli_fetch_assoc($qr_lay_sel_last_3_soma)){
						#echo $soma_b_3_t['tamanho']." (@".$soma_b_3_t['odd'].") + ";
						$total_l_last_3 += $soma_l_3_t['tamanho'];
					}

					// PEGA INFO DO OUTRO CAVALO FRENTE A FRENTE
					if($qr_selecoes->num_rows() == 2){
						$qr_lay_sel_last_3_outro = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id <> ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 5 ");

						$qr_lay_sel_last_3_outro = mysqli_query($con,"SELECT tamanho,odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id <> ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 5 ");

						$total_l_last_3_outro = 0;
						while($soma_l_3_t_outro = mysqli_fetch_assoc($qr_lay_sel_last_3_outro)){
							#echo $soma_b_3_t['tamanho']." (@".$soma_b_3_t['odd'].") + ";
							$total_l_last_3_outro += $soma_l_3_t_outro['tamanho'];
						}

						$soma_total_lay_avb = $total_l_last_3 + $total_l_last_3_outro;

						$pecentual_lay_avb = ($total_l_last_3 * 100) / $soma_total_lay_avb;

					}else{
						$total_l_last_3_outro = 0;
						$soma_total_lay_avb = 0;
						$pecentual_lay_avb = 0;
						$qr_lay_sel_last_3_outro = 0;
						#$pecentual_lay_[$s] = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
					}

					
					#$total_last_3 = 0;
					#while($soma_b_3_t = mysqli_fetch_assoc($qr_back_sel_last_3)){
						#echo $soma_b_3_t['tamanho']." (@".$soma_b_3_t['odd'].") + ";
					#	$$total_last_3 += $soma_b_3_t['tamanho'];
					#}

					// pega qtd de odds
					$qr_qtd_lay = mysqli_query($con,"SELECT COUNT(id) as qtd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' AND selection_id = ".$selecao->selection_id." order by dt_update desc LIMIT 3  ");


					$soma_total_sel_lay = mysqli_fetch_assoc($soma_lay_sel);
					$soma_total_lay = mysqli_fetch_assoc($soma_lay);
					$qtd_lay = mysqli_fetch_assoc($qr_qtd_lay);

					$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
					$pecentual_lay_total[$s] = $soma_total_sel_back['soma'];

					$qr_odd_back = mysqli_query($con,"SELECT  odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by dt_update desc LIMIT 1");
					$dd_odd_back = mysqli_fetch_assoc($qr_odd_back);

					$qr_odd_lay = mysqli_query($con,"SELECT  odd FROM odds_mkt_horses  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selecao->selection_id." AND tipo = 'lay' order by dt_update desc LIMIT 1");
					$dd_odd_lay = mysqli_fetch_assoc($qr_odd_lay);


					// SOMA DAS PORCENTAGENS
					$total_sel_back[$s] = $pecentual_back;
					$total_sel_lay[$s] = $pecentual_lay;

					$total_sel_back_avb[$s] = $pecentual_back_avb;
					$total_sel_lay_avb[$s] = $pecentual_lay_avb;

				}
				$mostra_odds = false;
				#print_r($odds['back']);

				#echo "<br />";
				if(isset($odds['back'][$selecao->selection_id]) ){
					$bg_destaque = "";
					if($pecentual_back > 30){
						$bg_destaque = "green";
					}
					if($pecentual_back < 30){
						$bg_destaque = "black";
					}
					$mostra_odds = true;
					echo "
						<tr class=''>
							<th id='sel".$selecao->selection_id."'>".$selecao->selection_name." <br />
							Track: <strong> ".$selecao->track." </strong> 
							<br>
							".$total_back_lay." 
							<br>
							(".$s.") 


							<div class='input-group mb-3' style='display:none'>
							  <div class='input-group-prepend'>
							    <button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='glyph-icon icon-signal'></i></button>
							    <div class='dropdown-menu'>
							      <button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='lay' class='bt_graph btn btn-outline-primary'><i class='glyph-icon icon-signal'></i></button>

									<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='lay' class='bt_graph btn btn-outline-primary'><i class='glyph-icon icon-tag'></i></button>

									<button  title='Formato Pizza' value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='lay' class='bt_graph btn btn-outline-primary'><i class='glyph-icon icon-pie-chart'></i></button>

								      <div role='separator' class='dropdown-divider'></div>
								      

								      	<button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='back' class='bt_graph btn btn-outline-danger'><i class='glyph-icon icon-signal'></i></button>

										<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='back' class='bt_graph btn btn-outline-danger'><i class='glyph-icon icon-tag'></i></button>

										<button title='Formato Pizza'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='back' class='bt_graph btn btn-outline-danger'><i class='glyph-icon icon-pie-chart'></i></button>


							    </div>
							  </div>
							</div>

							<br /><div id='sel_balanco_<?=$selecao->selection_id?>'></div> 
							</th> 
							<td class='flipInY animated bt_back' data-odd='".$odds['back'][$selecao->selection_id]."' data-selection_id='".$selecao->selection_id."' data-nm_selection='".$selecao->selection_name."' data-lado='BACK' data-id_mkt='".$id_mkt."' title=''>  							
							<strong id='odd_back_".$selecao->selection_id."' class='flipInY animated'>".$odds['back'][$selecao->selection_id]."</strong>
							
							

							<div style='background-color:green;display:block;height:12px;width:".round($pecentual_back,2)."%'> &nbsp</div> 
							<strong style='float:right;font-size:16px'>".round($pecentual_back,2)."% (".round($pecentual_back_avb,2)."%) ----<?=$s?>----</strong>
		
							<br />
							";
							
							$sum_back_sel_t = 0;
							while($soma_b_3_t = mysqli_fetch_assoc($qr_back_sel_last_3)){
								#echo $soma_b_3_t['tamanho']." (@".$soma_b_3_t['odd'].") + ";
								$sum_back_sel_t += $soma_b_3_t['tamanho'];
								#echo "(@".$soma_b_3_t['odd'].") <strong>".$soma_b_3_t['tamanho']."</strong> <br>";
								echo "(@".$soma_b_3_t['odd'].") <strong>".$soma_b_3_t['tamanho']."</strong> <br>";
							}
							echo " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong> ".$sum_back_sel_t." (".$total_b_last_3.") [".$total_b_last_3_outro."] </strong> <label style='color:blue'>".round($pecentual_back_avb,2)."%</label> <br />Total atual: <label style='color:blue'> ".$soma_total_sel_back['soma']."  </label> ";
							#echo "  ".$sum_back_total;
							
							#echo " = ".$sum_back_sel;

							echo "<br> Qtd de Odds: ".$qtd_back['qtd']." --
							
							<label style='display:none'>Soma: $".number_format($soma_total_sel_back['soma'], 2, ',', '.')." <br> Qtd de Odds: ".$qtd_back['qtd']."  
							<input type='text' class='ipt_size' id='size_back_1_".$selecao->selection_id."'>
							<input type='text' class='ipt_size' id='size_back_2_".$selecao->selection_id."'>
							<input type='text' class='ipt_size' id='size_back_3_".$selecao->selection_id."'>
							<input type='text' class='total_size_back total_size' title='".$selecao->selection_id."' id='total_size_back".$selecao->selection_id."'>
							</label>

							";
							#print_r($odds);
							echo " 
							</td>"; 
				}
				if(isset($odds['lay'][$selecao->selection_id]) ){	
					$bg_destaque = "";
					if($pecentual_lay > 30){
						$bg_destaque = "green";
					}	
					if($pecentual_lay < 30){
						$bg_destaque = "black";
					}
					$mostra_odds = true;	
					echo "		
							<td class='flipInY animated bt_lay' data-odd='".$odds['lay'][$selecao->selection_id]."' data-selection_id='".$selecao->selection_id."' data-nm_selection='".$selecao->selection_name."' data-lado='LAY' data-id_mkt='".$id_mkt."' title='' title='".$selecao->selection_id."' style='display:'> 
							<strong id='odd_lay_".$selecao->selection_id."' class='flipInY animated'>".$odds['lay'][$selecao->selection_id]."</strong> 
							<br/ > <label id='percentual_lay_".$selecao->selection_id."' style='color:$bg_destaque;display:none'> ".round($pecentual_lay,2)."% </label>";

							echo "<div style='background-color:pink;display:block;height:12px;width:".round($pecentual_lay,2)."%'> &nbsp</div> <strong style='float:right;font-size:16px'>".round($pecentual_lay,2)."% (".round($pecentual_lay_avb,2)."%)</strong>
		
							<br />
							";

							#echo "Soma: $".number_format($soma_total_sel_lay['soma'], 2, ',', '.')." <br/>";

							$sum_lay_sel_t = 0;
							while($soma_l_3_t = mysqli_fetch_assoc($qr_lay_sel_last_3)){
								echo "(@".$soma_l_3_t['odd'].") <strong>".$soma_l_3_t['tamanho']."</strong> <br>";
								$sum_lay_sel_t += $soma_l_3_t['tamanho'];
							}
							echo " &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong> ".$sum_lay_sel_t." (".$total_l_last_3.")</strong> 
							[".$sum_lay_sel_t."]
							(".round($pecentual_lay_avb,2)."%) ** <br />  </span>


							<br>Total atual: <label style='color:red'> ".$soma_total_sel_lay['soma']." </label> ";

							echo "<br />Qtd de Odds: ".$qtd_lay['qtd']."    <br />
							<input type='text' class='ipt_size'  id='size_lay_1_".$selecao->selection_id."'>
							<input type='text' class='ipt_size'  id='size_lay_2_".$selecao->selection_id."'>
							<input type='text' class='ipt_size'  id='size_lay_3_".$selecao->selection_id."'>
							<input type='text' class='total_size size_lay_".$selecao->selection_id."' id='total_size_lay".$selecao->selection_id."'>
							
							</td>
							
						</tr>

					";
					/*

					

					

					*/
				}
				if($mostra_odds == false){
					echo "<p>No odd</p>";
				}
			} // x foreach
			// link clear
			$clear = "";
			if($this->session->userdata('id')){
				$clear  = "<div class='btn btn-warning btn-outline'><a href='".base_url()."dash/rem_mkt/".$id_mkt."' target='_self' id='bt_clear'><img width='24px' src='".base_url()."imagens/clear.png' title='Limpar dados antigos (Usado após o gol ou caso queira pegar os últimos registros sem dados anteriores)' class='tada animated'></a></div> <button id='bt_ver_mais' class='btn btn-warning btn-outline' value='0'><i class='glyph-icon icon-eye' > </i></div> ";
			}
			if(isset($soma_total_back['soma'])){
				if($qr_selecoes->num_rows() < 3){
					$soma_percentual_1 = ($total_sel_back[1] + $total_sel_lay[2]) / 2;
					$soma_percentual_2 = ($total_sel_back[2] + $total_sel_lay[1]) / 2;


					$formula_soma_percentual_1 = "(".$total_sel_back[1]." + ".$total_sel_lay[2].") / 2";
					$formula_soma_percentual_2 = "(".$total_sel_back[2]." + ".$total_sel_lay[1].") / 2";

					if($qr_selecoes->num_rows() == 2){
						$soma_percentual_avb_1 = ($total_sel_back_avb[1] + $total_sel_lay_avb[2]) / 2;
						$soma_percentual_avb_2 = ($total_sel_back_avb[2] + $total_sel_lay_avb[1]) / 2;



						// NOVOS CALCULOS
						#$formula_calc_div_4_1 = "".$total_sel_back[1]." + ".$total_sel_back_avb[1]." + ".$soma_percentual_1." + ".$soma_percentual_avb_1." <strong style='font-size:30px'>/4</strong> ";

						#$formula_calc_div_4_2 = "".$total_sel_back[2]." + ".$total_sel_back_avb[2]." + ".$soma_percentual_2." + ".$soma_percentual_avb_2." <strong style='font-size:30px'>/4</strong>" ;


						$formula_calc_div_4_1 = "".$total_sel_back[1]." + ".$total_sel_back_avb[1]." + ".$soma_percentual_1." + ".$soma_percentual_avb_1." <strong style='font-size:30px'>/4</strong> ";

						$formula_calc_div_4_2 = "".$total_sel_back[2]." + ".$total_sel_back_avb[2]." + ".$soma_percentual_2." + ".$soma_percentual_avb_2." <strong style='font-size:30px'>/4</strong>" ;

						$calc_div_4_1 = ($total_sel_back[1] + $total_sel_back_avb[1] + $soma_percentual_1 + $soma_percentual_avb_1) / 4;

						$calc_div_4_2 = ($total_sel_back[2] + $total_sel_back_avb[2] + $soma_percentual_2 + $soma_percentual_avb_2) / 4;






					}else{
						$soma_percentual_avb_1 = 0;
						$soma_percentual_avb_2 = 0;

					}

					echo "
						<tr class='bg-light' style='display:none'>
								<th> $clear </th> 
								<td class='flipInY animated'  style='font-size:12px;font-weight:bold'>
								".$total_sel_back_avb[1]." + ".$total_sel_lay_avb[2]."
								$ <label id='soma_total_back'>".$total_sel_back_avb[1]." 
								</label>
								</td> 
								<td class='flipInY animated' style='font-size:12px;font-weight:bold;display'> $ <label id='soma_total_lay'>".$total_sel_lay_avb[1]."</label><td>
								
							</tr>
							<tr style='font-size:22px'>
								<th>Somas totais:</th>
								<td>Sel <strong>1</strong>
								(".round($total_sel_back_avb[1],2)."% + ".round($total_sel_lay_avb[2],2)."%) /2 = 
								<span style='font-size:30px'> ".number_format($soma_percentual_avb_1, 2, ',', '.')."</span>%
								
								</td>
								<td>Sel <strong>2</strong>
								(".round($total_sel_back_avb[2],2)."% + ".round($total_sel_lay_avb[1],2)."%) / 2 =
								<span style='font-size:30px'>".number_format($soma_percentual_avb_2, 2, ',', '.')."</span>%
								</td>
							</tr>
					";

					echo "
						<tr class='bg-light' style='display:none'>
								<th> $clear </th> 
								<td class='flipInY animated'  style='font-size:12px;font-weight:bold'>$ <label id='soma_total_back'>".number_format($soma_total_back['soma'], 2, ',', '.')." </label>
								</td> 
								<td class='flipInY animated' style='font-size:12px;font-weight:bold;display'> $ <label id='soma_total_lay'>".number_format($soma_total_lay['soma'], 2, ',', '.')."</label><td>
								
							</tr>
							<tr>
								<th>Somas Percentuais:</th>
								<td> **** Sel <strong>1</strong>: 

								<br>
								".$formula_soma_percentual_1." = 
								<br>

								<span style='font-size:22px'>".number_format($soma_percentual_1, 2, ',', '.')."</span>%
								<span style='font-size:22px'> (".number_format($soma_percentual_avb_1, 2, ',', '.').")</span>%
								
								</td>
								<td>Sel <strong>2</strong>: 
								<br>
								".$formula_soma_percentual_2." = 
								<br>
								<span style='font-size:22px'>".number_format($soma_percentual_2, 2, ',', '.')."</span>%
								<span style='font-size:22px'>(".number_format($soma_percentual_avb_2, 2, ',', '.').")</span>%
								</td>
							</tr>
					";
				}
			}

			if($qr_selecoes->num_rows() == 2){

					echo "
						<tr class='bg-light' style='display:none'>
								<th> $clear </th> 
								<td class='flipInY animated'  style='font-size:12px;font-weight:bold'>
								".$total_sel_back_avb[1]." + ".$total_sel_lay_avb[2]."
								$ <label id='soma_total_back'>".$total_sel_back_avb[1]." 
								</label>
								</td> 
								<td class='flipInY animated' style='font-size:12px;font-weight:bold;display'> $ <label id='soma_total_lay'>".$total_sel_lay_avb[1]."</label><td>
								
							</tr>
							<tr style='font-size:22px'>
								<th>Somas GERAL X4 :</th>
								<td>Sel <strong>1</strong>
								

								<br>
								<span style='color:red;font-size:16px;font-weight:bold'>{{".$formula_calc_div_4_1."}} </span> <br />
								<h2>".round($calc_div_4_1,2)."%</h2>
								
								
								</td>
								<td>Sel <strong>2</strong><br>
								<span style='color:red;font-size:16px;font-weight:bold'>{{".$formula_calc_div_4_2."}} </span> <br />
								<h2>".round($calc_div_4_2,2)."%</h2>
								
								
								</td>
							</tr>
					";
				}
			echo "
					<tr class='bg-light' style='display:none'>
						<th> Gráficos </th> 
						<td colspan='2' class='flipInY animated' id='soma_total_back'><strong style='font-size:12px'>
							<button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='all' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-signal'></i></button>

							<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='all' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-tag'></i></button>

							<button  title='Formato Pizza' value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='all' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-pie-chart'></i></button>

						</td>

						<!--<td class='flipInY animated' id='soma_total_lay'><strong style='font-size:12px'> 

							<button title='Volume de Apostas'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='size' data-side='back' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-signal'></i></button>

							<button title='Gráfico de Odds'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='odd' data-side='back' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-tag'></i></button>

							<button title='Formato Pizza'  value='".$selecao->selection_id."' type='button' data-toggle='modal' data-target='#modal_graph' data-id-mkt='".$id_mkt."' data-tipo='pizza' data-side='back' class='bt_graph btn btn-outline-default'><i class='glyph-icon icon-pie-chart'></i></button>

						 <td> -->
						
					</tr>


					
							
			";
			echo "</table>";
			#echo "<li>Total Matched: <strong> $total  </strong></li>";
		#}
		
	} // x fn


  function jogo_by_mkt_link($id_mkt){
    #if($this->session->userdata('token')){
    #  $this->load->model('bet_model');
     #}
    #$this->load->model('betfront_model');
    require_once('includes/betapi/jsonrpc-futbol.php'); 
    $dados['APP_KEY'] = $APP_KEY;
    $dados['SESSION_TOKEN'] = $SESSION_TOKEN;
    #echo $APP_KEY;
    $dd_evento_qr = $this->get_id_evento($APP_KEY, $SESSION_TOKEN,$id_mkt);
    $dd_evento = $dd_evento_qr[0]->event;
    echo base_url().'futebol/jogo/'.url_title($dd_evento->name).'/'.$dd_evento->id.'/';
    #return base_url().'futebol/jogo/'.url_title($dd_evento->name).'/'.$dd_evento->id.'/';
    #redirect('futebol/jogo/'.url_title($dd_evento->name).'/'.$dd_evento->id.'/' , 'refresh');
    
  }



} // fecha class


?>
