<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apibets extends CI_Controller {

	function __construct() {
        parent::__construct();
        // FONTE  https://betsapi.com/docs/
		#$this->padrao_model->indexador();
        // fonte https://betsapi.com/docs/betfair/
		// key 84995-n9ZbKXYgw3Hnb8
    }

	
	function index(){

		// https://api.b365api.com/v1/events/inplay?sport_id=1&token=YOUR-TOKEN
		#$this->upload->do_upload($field_name);$url = "https://api.b365api.com/v1/events/inplay?sport_id=1&token=84995-qrVGA35UEsjD4H";
		$url = "https://api.b365api.com/v1/betfair/sb/inplay?sport_id=1&token=84995-qrVGA35UEsjD4H";
		#$url = 'https://api.b365api.com/v2/event/odds?token=84995-qrVGA35UEsjD4H&event_id=3516578';
		#$url = "https://betsapi.com/docs/samples/upcoming.json";

	   $site_url = $url;
	   $ch = curl_init();
	   $timeout = 5;
	   curl_setopt ($ch, CURLOPT_URL, $site_url);
	   curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	   ob_start();
	   curl_exec($ch);
	   curl_close($ch);
	   $file_contents = ob_get_contents();
	   ob_end_clean();
	   echo $file_contents;

		echo "OK";
		
	}

	function live(){

		// https://betsapi.com/docs/GLOSSARY.html#r-sportid IDs --------------
		$url = "https://api.b365api.com/v1/betfair/sb/inplay?sport_id=1&token=84995-qrVGA35UEsjD4H";
		#$url = "https://betsapi.com/docs/samples/inplay.json";

	   $site_url = $url;
	   $ch = curl_init();
	   $timeout = 5;
	   curl_setopt ($ch, CURLOPT_URL, $site_url);
	   curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	   ob_start();
	   curl_exec($ch);
	   curl_close($ch);
	   $file_contents = ob_get_contents();
	   ob_end_clean();
	   echo $file_contents;

		echo "OK";
		
	}

	function odds(){

		// https://betsapi.com/docs/GLOSSARY.html#r-sportid IDs --------------
		#$url = "https://api.b365api.com/v1/betfair/odds?token=84995-qrVGA35UEsjD4H&event_id=30581046";
		$url = "https://api.b365api.com/v1/betfair/sb/odds?token=84995-qrVGA35UEsjD4H&event_id=3516578";
		#$url = "https://betsapi.com/docs/samples/event_odds.json";

	   $site_url = $url;
	   $ch = curl_init();
	   $timeout = 5;
	   curl_setopt ($ch, CURLOPT_URL, $site_url);
	   curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	   ob_start();
	   curl_exec($ch);
	   curl_close($ch);
	   $file_contents = ob_get_contents();
	   ob_end_clean();
	   echo $file_contents;

		echo "OK";
		
	}


	function statisticas($id_evento=0){

		// https://betsapi.com/docs/GLOSSARY.html#r-sportid IDs --------------
		#$url =  "https://api.b365api.com/v1/event/stats_trend?token=84995-n9ZbKXYgw3Hnb8N&event_id=294607";
		$url = "https://betsapi.com/docs/samples/event_stats_trend.json";

	   $site_url = $url;
	   $ch = curl_init();
	   $timeout = 5;
	   curl_setopt ($ch, CURLOPT_URL, $site_url);
	   curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	   ob_start();
	   curl_exec($ch);
	   curl_close($ch);
	   $file_contents = ob_get_contents();
	   ob_end_clean();
	   echo $file_contents;

		echo "OK";
		
	}

	
	
}
