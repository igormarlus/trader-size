<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemaps_feeds extends CI_Controller {

	
	function index() {
		echo "sitemaps";
	}
	
	
	function competition($nm_competiion,$id_competition){
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 ORDER BY inicio asc LIMIT 10"); // brasileiro seiria A
		$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 LIMIT 10"); // brasileiro seiria A
		
		$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 8616348 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		
		$dados['competition'] = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions')->row();
		
		$dados['jogos'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = ".$id_competition." AND inicio > NOW() "); // brasileiro seiria A
		$this->load->view('front/competition-by-db' , $dados);	
		#$dados['proximos'] = $this->betfront_model->get_mercado_query($APP_KEY, $SESSION_TOKEN,"MATCH_ODDS");
		#$this->load->view('front/competition' , $dados);	
		
		
	}
	


function competition_sitemaps($id_competition){
		
		require_once('includes/betapi/jsonrpc-futbol.php'); 
		$dados['brasileirao'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 13 ORDER BY inicio asc LIMIT 10"); // brasileiro seiria A
		$dados['brasileirao_b'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 321319  ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['mls'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 141 ORDER BY inicio desc LIMIT 5,10"); // MLS
		
		#$dados['bundesliga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 59 LIMIT 10"); // brasileiro seiria A
		$dados['frances'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 55 ORDER BY inicio desc  LIMIT 10"); // brasileiro seiria A
		$dados['la_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 117 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 228 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['uefa_league'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 2005 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['italia'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 81 LIMIT 10"); // brasileiro seiria A
		
		$dados['primeira_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 99 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['premier_liga'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 10932509 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		$dados['amistoso'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 11319314 ORDER BY inicio desc LIMIT 10"); // brasileiro seiria A
		
		$dados['campeonatos'] = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
		
		$dados['competition'] = $this->padrao_model->get_by_matriz('id_competition',$id_competition,'betfair_competitions')->row();
		

		$dados['jogos'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = '".$id_competition."' AND inicio > NOW()  ORDER BY inicio desc "); // brasileiro seiria A
		

		
		
		echo "<textarea style='width:80%;height:80%'>";
		foreach($dados['jogos']->result() as $jogo){ 
			#echo $jogo->inicio." ".$jogo->evento<?=$jogo->id_evento?
			#echo "OPa";
			#return false;
			echo "
			<url>
				<loc>".base_url()."bets/jogo/".url_title($jogo->evento)."/".$jogo->id_evento."</loc>
				<lastmod>".date("Y-m-d")."</lastmod>
				<changefreq>daily</changefreq>
				<priority>0.9</priority>
			</url> 
			";
         } 
         echo "</textarea>";

		
	}

function sitemaps_campeonatos(){
	#echo "Opa";
	#return false;
	$this->load->model("betfront_model");
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	$campeonatos = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
	#print_r($campeonatos);
	#echo count( $campeonatos);
	#return false;
	echo "<textarea style='width:80%;height:80%'>";
	 foreach($campeonatos as $dd){                    
		#$url = base_url()."bets/competition/".=url_title($dd->competition->name)."/".$dd->competition->id."/".$dd->competition->name;
		#echo $url;
	
		echo "
			<url>
				<loc>".base_url()."futebol/competition/".url_title($dd->competition->name)."/".$dd->competition->id."</loc>
				<lastmod>".date("Y-m-d")."</lastmod>
				<changefreq>daily</changefreq>
				<priority>0.9</priority>
			</url> 
			";
			
			#echo $dd->name;
			#echo $dd->competition->name;
			#echo $dd->competition->id;
			#print_r($dd);
		#echo "<br />";
     }  
     echo "</textarea>";
} // x fn


///////////////////////// JOGOS POR CAMPEONATOS
function get_by_competition($id_competition=13){
	#$id_competition = 13 ;// seria A brasil
	// 141 = US major league
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	$qr = $this->betfront_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$id_competition);
	print_r($qr);
	echo "<br><hr>";
	echo "<textarea style='width:80%;height:80%'>";
	foreach($qr as $dd){
		$tit = url_title($dd->event->name);
echo "<url>
<loc>".base_url()."futebol/jogo/".url_title($tit)."/".$dd->event->id."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>
";
echo "<url>
<loc>".base_url()."futebol/prognostico/".url_title($tit)."/".$dd->event->id."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>
";
echo "<url>
<loc>".base_url()."bets/jogo/".url_title($tit)."/".$dd->event->id."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>
";
		#print_r($dd);
		#echo "<br />";
		#echo "<br />";
	}
	 echo "</textarea>";
	

}

function sitemaps_campeonatos_db(){
	#echo "Opa";
	#return false;
	$this->load->model("betfront_model");
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	$campeonatos = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
	#print_r($campeonatos);
	#echo count( $campeonatos);
	#return false;
	echo "<textarea style='width:80%;height:80%'>";
	 foreach($this->db->get('betfair_competitions')->result() as $dd){                    
		#$url = base_url()."bets/competition/".=url_title($dd->competition->name)."/".$dd->competition->id."/".$dd->competition->name;
		#echo $url;
		if($dd->nome_pt == ""){
			$tit = $dd->nome;
		}else{
			$tit = $dd->nome;
		}
		echo "
			<url>
				<loc>".base_url()."bets/competition/".url_title($tit)."/".$dd->id_competition."</loc>
				<lastmod>".date("Y-m-d")."</lastmod>
				<changefreq>daily</changefreq>
				<priority>0.9</priority>
			</url> 
			";
			
			#echo $dd->name;
			#echo $dd->competition->name;
			#echo $dd->competition->id;
			#print_r($dd);
		#echo "<br />";
     }  
     echo "</textarea>";
} // x fn


// PROXIMOS JOGOS
function sitemaps_proximos_jogos(){
	#echo "Opa";
	#return false;
	$this->load->model("betfront_model");
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	#$jogos = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
	#print_r($campeonatos);
	#echo count( $campeonatos);
	#return false;
	#$jogos = $this->db->get('partidas');
	$jogos = $this->db->query('SELECT * FROM partidas WHERE data_betfair > NOW()');
	echo "<textarea style='width:80%;height:80%'>";
	 foreach($jogos->result() as $dd){                    
		#$url = base_url()."bets/competition/".=url_title($dd->competition->name)."/".$dd->competition->id."/".$dd->competition->name;
		#echo $url;
		$times = explode(' v ',$dd->evento); 
		
		#echo "<url><loc>".base_url()."futebol/event/".url_title($dd->evento)."/".$dd->id_evento."</loc><lastmod>".date("Y-m-d")."</lastmod><changefreq>daily</changefreq><priority>0.9</priority></url>";
		
echo "
<url>
<loc>".base_url()."futbol/jogo/".url_title($dd->evento)."/".$dd->id_evento."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>";
echo "
<url>
<loc>".base_url()."bets/jogo/".url_title($dd->evento)."/".$dd->id_evento."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>";
echo "
<url>
<loc>".base_url()."futebol/jogo/".url_title($dd->evento)."/".$dd->id_evento."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>";
echo "
<url>
<loc>".base_url()."futebol/prognostico/".url_title($dd->evento)."/".$dd->id_evento."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>"; 
echo "
<url>
<loc>".base_url()."futebol/amp/".url_title($dd->evento)."/".$dd->id_evento."/</loc>
<lastmod>".date("Y-m-d")."</lastmod>
<changefreq>daily</changefreq>
<priority>0.9</priority>
</url>"; 
		
		#echo $dd->evento.' '.$dd->inicio.'<br>';
			
		
     }  
     echo "</textarea>";
} // x fn

// PROXIMOS JOGOS
function sitemaps_proximos_jogos_news(){
	#echo "Opa";
	#return false;
	$this->load->model("betfront_model");
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	#$jogos = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
	#print_r($campeonatos);
	#echo count( $campeonatos);
	#return false;
	$jogos = $this->db->get('partidas');
	echo "<textarea style='width:80%;height:80%'>";
	 foreach($jogos->result() as $dd){                    
		#$url = base_url()."bets/competition/".=url_title($dd->competition->name)."/".$dd->competition->id."/".$dd->competition->name;
		#echo $url;
		$times = explode(' v ',$dd->evento); 
		/*
		echo "<url>
				<loc>".base_url()."futebol/jogo/".url_title($dd->evento)."/".$dd->id_evento."</loc>
				<lastmod>".date("Y-m-d")."</lastmod>
				<changefreq>daily</changefreq>
				<priority>0.9</priority>
			</url> 
			";
			*/
		echo "
		<url> 
			<loc>".base_url()."futebol/jogo/".url_title($dd->evento)."/".$dd->id_evento."</loc> 
			<news:news> <news:publication> 
				<news:name>".$dd->evento."</news:name> 
				<news:language>pt-BR</news:language> 
			</news:publication> 
			<news:genres>Apostas Online Futebol</news:genres> 
			<news:publication_date>".date("Y-m-d")."</news:publication_date> 
			<news:title>Apostas Online ".$dd->evento." - ".$dd->inicio."</news:title> 
			<news:keywords>".$times[0].",".$times[1].",Apostas Online,Futebol,Bets,Betafir</news:keywords> 
			<news:stock_tickers>BETFAIR:A, BET365:B</news:stock_tickers> 
		</news:news> 
		</url> 
		";	
			#echo $dd->name;
			#echo $dd->competition->name;
			#echo $dd->competition->id;
			#print_r($dd);
		#echo "<br />";
     }  
     echo "</textarea>";
} // x fn

// times
function sitemaps_times(){
	#echo "Opa";
	#return false;
	$this->load->model("betfront_model");
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	#$jogos = $this->betfront_model->getSoccers_competition_all($APP_KEY, $SESSION_TOKEN);
	#print_r($campeonatos);
	#echo count( $campeonatos);
	#return false;
	$jogos = $this->db->get('times');
	echo "<textarea style='width:80%;height:80%'>";
	 foreach($jogos->result() as $dd){                    
		#$url = base_url()."bets/competition/".=url_title($dd->competition->name)."/".$dd->competition->id."/".$dd->competition->name;
		#echo $url;
	
		echo "<url>
				<loc>".base_url()."futebol/time/".url_title($dd->time)."</loc>
				<lastmod>".date("Y-m-d")."</lastmod>
				<changefreq>daily</changefreq>
				<priority>0.9</priority>
			</url> 
			";
			
			#echo $dd->name;
			#echo $dd->competition->name;
			#echo $dd->competition->id;
			#print_r($dd);
		#echo "<br />";
     }  
     echo "</textarea>";
} // x fn


################ FEEDS
function feeds(){
	header("content-type: application/rss+xml; charset=utf-8");
	#header("Content-type: application/xml");
	#echo "Opa";
	#return false;
	
	$feeds = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss></rss>');
	$feeds->addAttribute('version', '2.0');
	 
	// Criar elemento channel, como filho do elemento rss
	$channel = $feeds->addChild('channel');
	$channel->addChild('title', 'TraderSize');
	$channel->addChild('link', 'https://tradersize.com');
	$channel->addChild('description', 'Software Para Trader Esportivo');
	 
	// Percorrer os dados pré-definidos
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc "); // brasileiro seiria A
	
	foreach($dados['copa2018']->result() as $item){ 
	#foreach($data as $item)
	
		#echo $item->evento;
	    // Criar elemento item, como filho do elemento channel
	    $item_channel = $channel->addChild('item');
	    // Criar elementos, filhos do elemento item
	    $item_channel->addChild('title', $item->evento);
	    $item_channel->addChild('link', base_url()."bets/jogo/".url_title($item->evento)."/".$item->id_evento);
	    $item_channel->addChild('description', 'Apostas Bets no Jogo: '.$item->evento);
	    // Simular horário de inserção
	    $item_channel->addChild('pubDate', date('r'));
	}
	 
	// Definir tipo de resposta do script e charset de codificação
	
	 
	// Imprimir XML gerado
	echo $feeds->asXML();
}

function feeds2(){
	#echo "opa";
	#return false;
	header("Content-type: application/xml");
	require_once('includes/betapi/jsonrpc-futbol.php'); 
	$dados['copa2018'] = $this->db->query("SELECT * FROM partidas WHERE id_competition = 5614746 AND inicio > NOW()  ORDER BY inicio desc "); // brasileiro seiria A
	
	
	
	echo '<?xml version="2.0" encoding="UTF-8" ?>';
	echo "
<rss version='2.0'>
    <channel>
        <title>Titulo site - Notícias</title>
        <link>Link do site</link>
        <description>Breve descrição sobre o conteudo do site</description>
        <language>pt-br</language>
        <copyright>Site - Todos os direitos reservados.</copyright>
        <lastBuildDate><?=$data;?></lastBuildDate>
        <ttl>20</ttl>";
       # while($result = mysql_fetch_array($query)) {
        	foreach($dados['copa2018']->result() as $item){ 
           echo " <item>
                <title>asdsad</title>
                <autor>autor</autor>
                <description>descr</description>
                <datePosted>".date("d-m-Y")."</datePosted>
            </item>";
         } 
  echo"  </channel>
</rss>";

}


function feeds3(){
	header("Content-type: application/xml");
	echo "<?xml version='2.0' encoding='UTF-8' ?>
	<rss version='2.0'>
	   <channel>
	       <title>Titulo site - Notícias</title>
	       <link>Link do site</link>
	       <description>Breve descrição sobre o conteudo do site</description>
	       <language>pt-br</language>
	       <copyright>Site - Todos os direitos reservados.</copyright>
	       <lastBuildDate></lastBuildDate>
	       <ttl>20</ttl> <item>
	               <title>asdsad</title>
	               <autor>autor</autor>
	               <description>descr</description>
	               <datePosted>01-06-2018</datePosted>
	           </item> <item>
	               <title>asdsad</title>
	               <autor>autor</autor>
	               <description>descr</description>
	               <datePosted>01-06-2018</datePosted>
	           </item>
	          </channel> 

	</rss>";
}

	
}
