<?php

$path = 'http://www.xbitcompany.com/login.xml';

// Get the data from the URL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$path);
//curl_setopt($ch,CURLOPT_HTTPHEADER,array('Accept: application/variant_div(left, right).epg.vrt.be.playlist_1.1+xml'));
curl_setopt($ch, CURLOPT_FAILONERROR,1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_TIMEOUT, 15);
$xmlData = curl_exec($ch);
curl_close($ch);

// Load the XML
#$xml = simplexml_load_string($xmlData);
$req = json_encode(simplexml_load_string($path));
//print_r($xml);
echo $req;

/*
foreach($xml->Envelope as $dd)
{
 echo $dd->username;
#usando o utf8_decode para exibir com acentos
#echo $livro->titulo;
#echo $livro->autor;
#echo $livro->descricao;
#echo $livro->preco;

}
*/
// Parse the XML with SimpleXML here

/*
include 'includes/bet/loginxml.php';

function ParseXML ($xml)
{
	
    //echo $sxml;
    $reader = new XMLReader(); //Initialize the reader
    $reader->xml($xml) or die("File not found"); //open the current xml string
    while($reader->read()) //Read it
    {
        switch($reader->nodeType)
        {
            case constant('XMLREADER::ELEMENT'): //Read element
                if ($reader->name == 'record')
                {
                    $dataa = $reader->readInnerXml(); //get contents for <record> tag.
                    echo $dataa; //Print it to screen.
                }
            break;
        }
    }
    $reader->close(); //close reader
}

ParseXML ($xmlstr);
*/
?>