<?
set_time_limit(0);
error_reporting(E_ALL);

Class SimpleCrawler {

    private $url;
    private $userAgent;
    private $httpResponse;

    function __construct() {
        $this->userAgent       = "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:33.0) Gecko/20100101 Firefox/33.0";
        $this->chocolateCookie = "chocolateCookies.txt";
    }

    /**
     * Seta a url alvo
     * @param string $url
     * @return SimpleCrawler
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * Requisição get
     * @return SimpleCrawler
     */
    private function get(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->chocolateCookie);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $this->chocolateCookie);
        $this->httpResponse = curl_exec($ch);
        return $this;
    }

    /**
     * Pega o conteudo da requisição
     * @return SimpleCrawler
     */
    public function getPageContent() {
        // Aqui vc pode fazer o parse do content da página utilizando regex ou seja
        // lá qual for o método utilizado.
        echo "Page Content:\n\n",
             "{$this->httpResponse}\n\n";

        return $this;
    }

    /**
     * Faz a navegação na página especificado por self::setUrl
     * @return SimpleCrawler
     */
    public function navigate() {
        echo "Visiting: {$this->url}\n";
        $this->get();

        return $this;
    }
}

/* Estancia do nosso objeto que se baseia nos seguintes métodos:
 * 
 * Definir uma url: $simpleCrawler->setUrl('site');
 * Navegar em dada url: $simpleCrawler->navigate();
 * E por fim ter acesso ao conteúdo da requisição: $simpleCrawler->getPageContent();
 * 
 */
$simpleCrawler = new SimpleCrawler;

// à partir daqui podemos executar quantas requests quisermos.
// Já que precisamos do mesmo site basta um laço simples para efetuar a navegação
$pageNum = 8;

#for ($i=1;$i<=$pageNum;$i++):
$this->db->limit(2);
$qr = $this->db->get('partidas');

/*
 $simpleCrawler->setUrl("https://tradersize.com/bet/get_odds_only/28296669")
                  ->navigate()
                  ->getPageContent();
*/

foreach($qr->result() as $evento){
    $simpleCrawler->setUrl(base_url()."botbet/get_odd_evento/".$evento->id_evento)
                  ->navigate()
                  ->getPageContent();
}

?>