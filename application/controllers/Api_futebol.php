<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_futebol extends CI_Controller {

	##  APIKEY a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d
	## documentacao https://allsportsapi.com/soccer-football-api-documentation#H2H

	function index() {
		echo "OK";
	}

	function paises(){
		$APIkey = "a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d";
		$teamId = $id_time;

		$curl_options = array(
		  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=Countries&APIkey=$APIkey",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_CONNECTTIMEOUT => 5
		);

		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );

		$result = (array) json_decode($result);

		var_dump($result);

	}

	function liga($countryId=""){
		$APIkey = "a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d";
		#$countryId = 135;

		#if($data == ""){
			$curl_options = array(
			  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=Leagues&APIkey=$APIkey&countryId=$countryId",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_HEADER => false,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_CONNECTTIMEOUT => 5
			);
		/*}else{

			$curl_options = array(
			  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=Fixtures&APIkey=!_your_account_APIkey_!&from=2020-08-13&to=2020-08-13",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_HEADER => false,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_CONNECTTIMEOUT => 5
			);

		}*/

		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );

		$result = (array) json_decode($result);

		var_dump($result);

	}

	function time($id_time=2616){
		$APIkey = "a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d";
		$teamId = $id_time;

		$curl_options = array(
		  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=Teams&APIkey=$APIkey&teamId=$teamId",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_CONNECTTIMEOUT => 5
		);

		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );

		$result = (array) json_decode($result);
		#$result =  json_decode($result);
		echo "<h1>".count($result)."</h1>";
		foreach($result["result"] as $key =>  $dd){
			#echo "(".$key.") [".$dd."]";
			#echo "() [".$dd."]";
			#print_r($dd);
			echo "<br><hr>";
			foreach($dd as $key2 => $dd2){
				if(is_array($dd2)){
					foreach($dd2 as $key3 => $dd3){
						echo "<br><hr>";
						if(is_array($dd3)){
							print_r($dd3);
							echo "<br><br>";
						}else{
							#echo "<h2>".$dd3."</h2>";
							var_dump($dd3);
						}
						
					}

				}else{
					echo "<p>".$key2." --- ".$dd2." </p>";
				}

			}
		}

		print_r($result);

	}


	function h2h(){

		$APIkey = "a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d";

		$firstTeamId=2616;
		$secondTeamId=2617;

		$curl_options = array(
		  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=H2H&APIkey=$APIkey&firstTeamId=$firstTeamId&secondTeamId=$secondTeamId",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_CONNECTTIMEOUT => 5
		);

		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );

		$result = (array) json_decode($result);

		var_dump($result);

	}

	function livescore(){

		$APIkey = "a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d";

		$curl_options = array(
		  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=Livescore&APIkey=$APIkey&matchId=160932",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_CONNECTTIMEOUT => 5
		);

		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );

		$result = (array) json_decode($result);

		var_dump($result);

	}

	function topscore(){

		$APIkey = "a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d";

		$curl_options = array(
		  CURLOPT_URL => "https://allsportsapi.com/api/football/?&met=Topscorers&leagueId=46&APIkey=$APIkey",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_CONNECTTIMEOUT => 5
		);

		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );

		$result = (array) json_decode($result);

		var_dump($result);

	}

	function fix(){

		$APIkey = "a51de90c03a5526f214fc6b6837dba82dc485c970d067ecac8a6f0d626797d4d";

		$from = '2020-08-01';
		$to = '2020-08-06';

		$curl_options = array(
		  CURLOPT_URL => "https://allsportsapi.com/api/football/?met=Fixtures&APIkey=$APIkey&from=$from&to=$to",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_HEADER => false,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_CONNECTTIMEOUT => 5
		);

		$curl = curl_init();
		curl_setopt_array( $curl, $curl_options );
		$result = curl_exec( $curl );

		$result = (array) json_decode($result);

		#var_dump($result);
		/*
		foreach ($result as $dd) {

			for($p = 1; $p< count($dd); $p++){

				//print_r($dd[$p]);
				echo $dd[$p]->event_key;
				echo "<br />";
				echo "<hr />";


			}
			#print_r($dd);
			echo "<br />";
			echo "<hr />";
			# code...
		}*/

		$dados['result'] = $result;
		
		$this->load->view('2020/eventos_api' , $dados);
		#echo "OKKOKO";

	}
	
	
		
}
