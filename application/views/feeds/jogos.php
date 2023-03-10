<?
$feeds = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss></rss>');
$feeds->addAttribute('version', '2.0');
 
// Criar elemento channel, como filho do elemento rss
$channel = $feeds->addChild('channel');
$channel->addChild('title', 'Criando Feeds RSS com PHP');
$channel->addChild('link', 'http://www.diogomatheus.com.br');
$channel->addChild('description', 'Feed RSS usando SimpleXMLElement');
 
// Percorrer os dados pré-definidos
foreach($data as $item)
{
    // Criar elemento item, como filho do elemento channel
    $item_channel = $channel->addChild('item');
    // Criar elementos, filhos do elemento item
    $item_channel->addChild('title', $item['titulo']);
    $item_channel->addChild('link', $item['link']);
    $item_channel->addChild('description', $item['description']);
    // Simular horário de inserção
    $item_channel->addChild('pubDate', date('r'));
}
 
// Definir tipo de resposta do script e charset de codificação
header("content-type: application/rss+xml; charset=utf-8");
 
// Imprimir XML gerado
echo $feeds->asXML();
?>