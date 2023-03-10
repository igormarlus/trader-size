<?
class Bet_model extends CI_Model{
	
	
	function _construct()
	{
		// Call the Model constructor
		parent::_construct();
	}

/////////////

	function getAllEventTypes_($appKey, $sessionToken)
{
    $jsonResponse = sportsApingRequest($appKey, $sessionToken, 'listEventTypes', '{"filter":{}}');
    return $jsonResponse[0]->result;
}
function extractHorseRacingEventTypeId_($allEventTypes)
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

function get_run_Horses($appKey, $sessionToken,$id_competition='7',$limite=20) // default seire A
{
	/*
    $params = '{"filter":{"eventTypeIds":["' . $id_competition . '"]},
              "sort":"MAXIMUM_TRADED",
              "maxResults":"5",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
	*/
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
function getMarketings_query($appKey, $sessionToken,$id_evento=0,$query="OVER_UNDER_15") // OVER_UNDER_15  //MATCH_ODDS
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
              "maxResults":"100",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listMarketCatalogue', $params);
    return $jsonResponse[0]->result;

	
}

################ BUSCA
function get_evento_query($appKey, $sessionToken,$tipo='1') // OVER_UNDER_15  //MATCH_ODDS
{
	$query = $tipo;
  if(isset($_POST['q'])){
    $query = $this->input->post('q');
  }
  #echo "<br />";
  #echo $tipo;

  #echo "<br />";
  #echo "--- fim ";
  #echo "<br />";
	
	
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
	
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listMarketCatalogue', $params);
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
              "marketProjection":["RUNNER_DESCRIPTION"]}';
		
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


function getMkt_logado($appKey, $sessionToken,$id_evento=0,$id_mkt="") // OVER_UNDER_15  //MATCH_ODDS
{
	
	if($id_evento == 0){

	$params = '{"filter":{
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"10",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
		
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

function get_nm_mkt($appKey, $sessionToken,$id_evento=0,$id_mkt) // OVER_UNDER_15  //MATCH_ODDS
{
	
	if($id_evento == 0){

	$params = '{"filter":{
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"1",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
		
	}else{
	$params = '{"filter":{
				"eventIds":["' . $id_evento . '"],
				"marketIds":["'.$id_mkt.'"]
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

	$params = '{"filter":{
				"marketIds":["'.$id_mkt.'"]
				},
              "sort":"FIRST_TO_START",
              "maxResults":"1",
              "marketProjection":["RUNNER_DESCRIPTION"]}';
    $jsonResponse = $this->sportsApingRequest_appkey($appKey, $sessionToken, 'listEvents', $params);
    return $jsonResponse[0]->result;
	
}


function get_id_evento_bot($appKey, $sessionToken,$id_mkt)
{	

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

function getMarket_type($appKey, $sessionToken, $marketId)
{
    $params = '{"marketIds":["' . $marketId . '"], "priceProjection":{"priceData":["EX_BEST_OFFERS"]}}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listMarketTypes', $params);
    return $jsonResponse[0]->result[0];
}


function getOdds($appKey, $sessionToken, $marketId,$id_selecion)
{
    #$params = '{"marketIds":["' . $marketId . '"], "selectionIds":["' . $id_selecion . '"]}';
    #$jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listRunnerBook', $params);
    #return $jsonResponse[0]->result[0];

    $params = '{"marketIds":["' . $marketId . '"], "selectionIds":["' . $id_selecion . '"], "priceProjection":{"priceData":["EX_BEST_OFFERS"]}}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listMarketBook', $params);
    return $jsonResponse[0]->result[0];


}


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
		$qr_num = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 
		if(mysql_fetch_assoc($qr_num) == 0){
			mysql_query("INSERT INTO `odds_mkt` (`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `dt`) VALUES ('".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', CURRENT_TIMESTAMP)");
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


function placeBet_get($appKey, $sessionToken, $marketId, $selectionId)
{
	$tipo = "BACK";
	$valor = 0.05;
	$size_post = 1.9;
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

    #print_r($jsonResponse[0]);

    #if($jsonResponse[0]->result->errorCode == 'INVALID_INPUT_DATA'){
    	
    	//"MERCADO ENCERRADO";
    #}else{
	return $jsonResponse[0]->result;
	#}
}

################ HORSES
function placeBet_horse($appKey, $sessionToken, $marketId, $selectionId)
{
  #$where = array('id_mkt' => $marketId , 'selection_id' => $selectionId);
  #$this->db->where($where);
  #$dd_reg = $this->db->get('odds_hot_horses')->row();
  #print_r($dd_reg);
  #return false;
  #$size_post = $dd_reg->odd;

  #$tipo = $dd_reg->tipo;
  $tipo = "LAY";
  $valor = 0.15;
  #$size_post = $dd_reg->odd;
  $size_post = 15;
  $size = str_replace(",",".",$size_post);
  $size_db = floatval($size_post);
  #$size_db = 1.95;
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

    #print_r($jsonResponse[0]);

    #if($jsonResponse[0]->result->errorCode == 'INVALID_INPUT_DATA'){
      
      //"MERCADO ENCERRADO";
    #}else{
  return $jsonResponse[0]->result;
  #}
}
function placeBet_horse_bk($appKey, $sessionToken, $marketId, $selectionId,$odd=2)
{

	// pega odd registrada pro cavalo
	$where = array('id_mkt' => $marketId , 'selection_id' => $selectionId);
	$this->db->where($where);
	$dd_reg = $this->db->get('odds_hot_horses');
	$size_post = $dd_reg->row()->odd;

	#$tipo = "BACK";
	$tipo = $dd_reg->tipo;
	$valor = 0.10;
	#$size_post = 3;
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
                                    "persistenceType":"PERSIST"}
                       }], "customerRef":"tradersize"}';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'placeOrders', $params);

    #print_r($jsonResponse[0]);

    #if($jsonResponse[0]->result->errorCode == 'INVALID_INPUT_DATA'){
    	
    	//"MERCADO ENCERRADO";
    #}else{
	return $jsonResponse[0]->result;
	#}
}

function cancelBet($appKey, $sessionToken, $betId)
{
    $params = '{"betId":"' . $betId . '" }';
    $jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'cancelOrders', $params);
    if(  $jsonResponse[0]->result->status == "SUCCESS"){
    	echo "Cancelado";
    }else{
    	echo "Tente novamente";
    }
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



function printBetResult($betResult,$id_mkt="")
{
    #echo "Status: " . $betResult->status;
    if ($betResult->status == 'FAILURE') {

        #echo "\nErrorCode: " . $betResult->errorCode;
        #echo "\n\nInstruction Status: " . $betResult->instructionReports[0]->status;
        #echo "\nInstruction ErrorCode: " . $betResult->instructionReports[0]->errorCode;
		
    	if($betResult->errorCode == 'INVALID_INPUT_DATA'){
			echo "<p style='color:red'>Mercado Fechado</p>";
		}

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
		#print_r($betResult->instructionReports[0]);
        $id_bet = $betResult->instructionReports[0]->betId;
		#$selectionId = $betResult->instructionReports[0]->selectionId;
		#$marketId = $betResult->instructionReports[0]->marketId;
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
			#'selectionId' => $selectionId,
			#'marketId' => $marketId,
			#'side' => $side,
			#'size' => $size,
			#'price' => $price,
			'averagePriceMatched' => $averagePriceMatched,
			'sizeMatched' => $sizeMatched,
			'placedDate' => $placedDate,
			'status' => $status_bet
		);
		$lucro = ($sizeMatched * $averagePriceMatched) - $sizeMatched;

		## ALTERAR STATUS DO odds_hots
		#echo "<br>";
		foreach($betResult->instructionReports[0] as $dd_bet){
			#print_r($dd_bet);
			if(isset($dd_bet->selectionId)){
				$id_selection = $dd_bet->selectionId;
				#echo "<h1> 11111 ------ ".$dd_bet->selectionId." ".$id_selection." **** </h1>";
			}
			
		}
		
		#echo "<h1> 2222 ----".$id_selection." **** </h1>";

		#$id_selection = $betResult->instructionReports[0]->selectionId;
		if($id_mkt != ""){
			$dd_set_status = array('id_bet' => $id_bet ,'status' => '1');
			$where_arr = array('id_mkt' => $id_mkt ,'selection_id' => $id_selection , 'status' => '0' , 'id_user' => $this->session->userdata('id') );
			$this->db->where($where_arr);
			$this->db->order_by('id','asc');
			$this->db->limit(1);
			$this->db->update('odds_hot_horses',$dd_set_status);
		}

		


		#echo $betResult->instructionReports[0]['selectionId']." ---*** ";
		#echo "<br>______________________<br>";
		#echo $betResult->instructionReports['selectionId']." ---### ";
		#echo "<br>";




		#$this->db->insert('place_order' , $dd_bet);
		#echo "Aposta Realizada!<br>";
		#echo "Bet Id: ".$id_bet."<br>";
    echo $id_bet;
		//echo "Lucro: ".number_format($lucro, 2, ',', '.')."<br>";
		#print_r($betResult->instructionReports[0]);
	}
		#echo "<br>";
		#print_r($betResult);
} // x fn



function printBetResult_horse($betResult,$id_mkt="")
{
    #echo "Status: " . $betResult->status;
    if ($betResult->status == 'FAILURE') {

        #echo "\nErrorCode: " . $betResult->errorCode;
        #echo "\n\nInstruction Status: " . $betResult->instructionReports[0]->status;
        #echo "\nInstruction ErrorCode: " . $betResult->instructionReports[0]->errorCode;
		
    	if($betResult->errorCode == 'INVALID_INPUT_DATA'){
			echo "<p style='color:red'>Mercado Fechado</p>";
		}

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
		#print_r($betResult->instructionReports[0]);
        $id_bet = $betResult->instructionReports[0]->betId;
		#$selectionId = $betResult->instructionReports[0]->selectionId;
		#$marketId = $betResult->instructionReports[0]->marketId;
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
			#'selectionId' => $selectionId,
			#'marketId' => $marketId,
			#'side' => $side,
			#'size' => $size,
			#'price' => $price,
			'averagePriceMatched' => $averagePriceMatched,
			'sizeMatched' => $sizeMatched,
			'placedDate' => $placedDate,
			'status' => $status_bet
		);
		$lucro = ($sizeMatched * $averagePriceMatched) - $sizeMatched;

		## ALTERAR STATUS DO odds_hots
		#echo "<br>";
		foreach($betResult->instructionReports[0] as $dd_bet){
			#print_r($dd_bet);
			if(isset($dd_bet->selectionId)){
				$id_selection = $dd_bet->selectionId;
				#echo "<h1> 11111 ------ ".$dd_bet->selectionId." ".$id_selection." **** </h1>";
			}
			
		}
		
		#echo "<h1> 2222 ----".$id_selection." **** </h1>";

		#$id_selection = $betResult->instructionReports[0]->selectionId;
		if($id_mkt != ""){
			$dd_set_status = array('id_bet' => $id_bet ,'status' => '1');
			$where_arr = array('id_mkt' => $id_mkt ,'selection_id' => $id_selection , 'status' => '0');
			$this->db->where($where_arr);
			$this->db->order_by('id','asc');
			$this->db->limit(1);
			$this->db->update('odds_hot_horses',$dd_set_status);

			$this->db->query("UPDATE `odds_hot_horses` SET `status`= '3' WHERE `id_mkt`= '".$id_mkt."' AND selection_id <>  '".$id_selection."' ");
		}

		


		#echo $betResult->instructionReports[0]['selectionId']." ---*** ";
		#echo "<br>______________________<br>";
		#echo $betResult->instructionReports['selectionId']." ---### ";
		#echo "<br>";




		#$this->db->insert('place_order' , $dd_bet);
		echo "Aposta Realizada!<br>";
		echo "Bet Id: ".$id_bet."<br>";
		//echo "Lucro: ".number_format($lucro, 2, ',', '.')."<br>";
		#print_r($betResult->instructionReports[0]);
	}
		#echo "<br>";
		#print_r($betResult);
} // x fn horse

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
		#'X-Application: sl4K5RkqJvpsKvPc',		
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

function sportsApingRequest_appkey($appKey, $sessionToken, $operation, $params)
{
    $ch = curl_init();
	#echo $this->session->userdata("token_type").' ** '.$this->session->userdata("token");
	#return false;
	// inserida por mim 28-05-17
	#curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	#curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	
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
		redirect('dash/sair' , 'refresh');
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

function get_fundos($appKey='sl4K5RkqJvpsKvPc'){
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
		#'X-Application: sl4K5RkqJvpsKvPc',		
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
	
	//print_r($response[0]);
	//return false;
    return $response[0]->result;
    //print_r($response[0]);
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
		#'X-Application: sl4K5RkqJvpsKvPc',		
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
	
	
	$jsonResponse = $this->sportsApingRequest($appKey, $sessionToken, 'listCurrentOrders', $params);
    return $jsonResponse[0]->result;
	#echo $params;
}

function get_dd_conta($appKey='sl4K5RkqJvpsKvPc'){
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
		#'X-Application: sl4K5RkqJvpsKvPc',		
		'Authorization: '.$auth,		
		#'Authorization: $auth',
        #'X-Authentication: ' . $sessionToken,
        'Accept: application/json',
        'Content-Type: application/json'
    ));
    $postData =
        '[{ "jsonrpc": "2.0", "method": "AccountAPING/v1.0/getAccountDetails", "params" :' . $params . ', "id": 1}]';
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
		#'X-Application: sl4K5RkqJvpsKvPc',		
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
	$argv[2] = 'drRxgw13d1CZyfQnddweqtMrTR5tG3/6e3qr0GD8xwM='; // session key
	
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
		$qr_selection_vol = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE '".$lado."' ORDER BY id desc LIMIT 10 ")or die(mysql_error()); 
		$total = 0; 
		while ($row_vol = mysql_fetch_assoc($qr_selection_vol)) { 
			$total += $row_vol["tamanho"];
		}
		echo $total;
	} // x fn

	function publi_post($id_evento=0){
		// ID facebook = 10215316871132477
		// TOKEN DE ACESSO = EAABqZApjvtoMBAOOFgNiYm399ZAhMitmBvQKVmi4zGBm9j5fkR61nGV8u7N5g8tLSkXckTBc1i6ZBZAhWBH0ePnCe6SG9OpUN2DGMJLAqSdfZAIfBkh24ZAhap6OGsQgFF5lMZBZCZB41lqm6erbj7JeB99ZBDI5whxV2eYJMKTLpVM5ZAKTZCsHddIpKl4CJ6njUOlSPiXYN8948TT6QAZCoBZCqcplWJRqcS0rixtulSaNhNlQZDZD
		// id _page = 982236548586109
		$dd_evento = $this->padrao_model->get_by_id($id_eveto,'partidas');
		// Dados da API
		$page_id = '982236548586109';
		$page_access_token = 'EAABqZApjvtoMBAJRoNw9TnyEPTqQe4ZB1XnGTu4CBDMrRoMV1gF5Rvs8WGNfjDktUx9UiOYwjh84kxSGpdDQiTIs1F00oZAt6fkwreXTVrryndHNco9gmATRrTyb80GOhvuvGFONynBX68DubZCkGbP2X68sRsGvZAhvTZBiuaH7pNsCNWXwEL98dTVZCh6dySXUm2bGSERHwZDZD';
			
		// Monta o post do FB
		$data['message'] = "Apostas para  Brasil de Pelotas x Coritiba";

		// uma imagem para o seu post (opcional)
		#$data['picture'] = "https://scontent.frec6-1.fna.fbcdn.net/v/t1.0-9/21078742_982241235252307_4954350907449402965_n.png?_nc_cat=0&oh=9a67abfc323c84f74d8414bff11fee1a&oe=5BF92E73";
			
		// um link para quando clicarem no seu post
		$data['link'] = "https://tradersize.com/bets/jogo/Brasil-de-Pelotas-v-Coritiba/28866048";
			
		// descrição do post
		$data['description'] = "Campeonato Brasileiro Série B";
			
		// subtítulo
		$data['caption'] = "Informação atualizada em " . date("d/m/Y H:i:s");
			
		$data['access_token'] = $page_access_token;
			
		// Efetua a chamada da API
		$post_url = 'https://graph.facebook.com/'.$page_id.'/feed';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $post_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$return = curl_exec($ch);
			
		// Escreve na tela o retorno da API
		echo($return);
			
		curl_close($ch);

	}



} // fecha class


?>
