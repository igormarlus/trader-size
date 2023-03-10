<!doctype html>
<html lang="pt-br">
	<head>
	<title>Lomadee</title>
    <meta name="title" content="Lomadee" />
    <meta name="description" content="" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <meta name="robots" content="index, follow" />

    
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
	
	<script type="text/javascript">

		$(document).ready(function() {
			var contador = 0;
			setInterval(function(){  contador++;
				$(".produtos").hide();
				$("#pro"+contador).show();	
				if(contador > 11){
					contador = 0;
				}
			}, 5000);
			
			// key da api lomadee
			//37637355544e6d4a774d453d
			
			//alert("asd");
			/*
			// FORMA 1
			$.getJSON("http://sandbox.buscape.com/service/findProductList/lomadee/37637355544e6d4a774d453d/?keyword=tv",
			 function(data) {
				$("#aqui").html(data);
				alert(data);         
			  });   
			
		
		
		//  FOMRA 2
		$('#ajax').click(function(){         
			 $.ajax({ 
				 type: "GET",
				 dataType: "json",
				 url: "http://sandbox.buscape.com/service/findProductList/lomadee/37637355544e6d4a774d453d/?keyword=tv",
				 success: function(data){        
					alert("OK");
					//alert(data.marca);
				 }
			 });
		});
		*/
		// FORMA 3
		
		//$.getJSON("http://sandbox.buscape.com/service/findProductList/lomadee/564771466d477a4458664d3d/?keyword=tv", function( data ) {
		//$.getJSON("https://sandbox-api.lomadee.com/v2/151844667355446b4c849/offer/_bestsellers", function( data ) {
			//alert("ads");
			//alert(data);
			/*
			var items = [];
			$.each( data, function( key, val ) {
			items.push( "<li id='" + key + "'>" + val + "</li>" );
			});
			$( "<ul/>", {
			"class": "my-new-list",
			html: items.join( "" )
			}).appendTo( "body" );
			*/	
		//});
		
		
	});
	</script>
    

	<!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <script src="js/ie8.js"></script>
    <![endif]-->

	</head>
	<body>

<!-- Container -->
        <div id="container" >
            
             
          <div class="fullwidthbanner-container">
        	<!--<h1>Produtos <?=$key_pro?></h1>-->
            <!--
            <div id="aqui"></div>
            <button id="ajax">Clique</button>
            -->
            
            <p>
            <?
			require_once 'includes/lomadee/Apiki_Buscape_API.php';
			// app token: 151844667355446b4c849
			// source ID
			 #$requestURL = 'http://sandbox-api.lomadee.com/v2/151844667355446b4c849/product/_search?sourceId={SOURCE-ID}&size=9'.$q .'&page=' . $page;              
			 	#$requestURL = "https://sandbox-api.lomadee.com/v2/151844667355446b4c849/offer/_bestsellers";    
				#$json = file_get_contents( $requestURL ); 
				#$product = json_decode( $json, true );
				#$paginas = $product['pagination']['totalPage'];            
				#print_r($product['products']);
				#foreach ($product['products'] as $productItem){ 
				#	echo $productItem['thumbnail']['url'] ;   
				#}
				
			
			
$applicationID = '151844667355446b4c849';
$sourceID = '35943101';
$objBuscaPeApi = new Apiki_Buscape_API( $applicationID, $sourceID );
$objBuscaPeApi->setSandbox();

#$by_key = $objBuscaPeApi->findProductList( array( 'keyword' => 'Celular,Nokia' ) );
#$by_key_dec = json_decode($by_key, true);
#echo $by_key_dec;


#######################################################


#require_once '../Apiki_Buscape_API.php';
#$applicationID = '564771466d477a4458664d3d';
#$sourceID = '';
#$objBuscaPeApi = new Apiki_Buscape_API( $applicationID, $sourceID );
#$objBuscaPeApi->setSandbox();
try {
// Busca uma lista de categorias
//echo $objBuscaPeApi->findCategoryList();
// Busca uma lista de produtos por palavras-chave

$list = $objBuscaPeApi->findProductList( array( 'keyword' => $key_pro ) );

// teste com minha função
#_getContent_by_sandbox
#$list = $objBuscaPeApi->findProductList( array( 'keyword' => 'Geladeria Frost free' ) );

//print_r( $list);
#foreach($list as $l){
#	echo $l->product."<br />";
#}

// Busca ofertas a partir de palavras-chave
// echo $objBuscaPeApi->findOfferList( array( 'keyword' => 'iPhone 5' ) );
// Busca os dados de uma oferta a partir do seu ID
// echo $objBuscaPeApi->findOfferList( array( 'offerId' => 126733147 ) );
// Busca ofertas a partir de um código de barras
// echo $objBuscaPeApi->findOfferList( array( 'barcode' => 9788575222379 ) );
// Busca ofertas a partir de palavras-chave e coordenadas geográficas
// echo $objBuscaPeApi->findOfferList( array(
// 'keyword' => 'celular',
// 'latitude' => '-23.557362',
// 'longitude' => '-46.660927',
// 'radius' => 400 // metros
// ) );
// Busca os produtos mais clicados da última semana
//echo $objBuscaPeApi->topProducts();
// Busca as avaliações dos usuários através do ID do produto
//echo $objBuscaPeApi->viewUserRatings( array( 'productId' => 240493 ) );
// Busca os detalhes de um produto a partir de seu ID
//echo $objBuscaPeApi->viewProductDetails( array( 'productId' => 232685 ) );
// Busca os detalhes de uma loja a partir de seu ID
//echo $objBuscaPeApi->viewSellerDetails( array( 'sellerId' => 335525 ) );
} catch( Exception $e ) {
echo $e->getMessage();
}

$dom = new domDocument();
$dom->loadXML($list);
$xml = simplexml_import_dom($dom); 
?>
            
            </p>
            
      	  </div>
         
        
          <div id="produtos">
          
          <? $pro = 0;
			foreach($xml->product as $x => $dd){ $pro++;
				
				//print_r($dd);
				
				$links = $dd->links[0];
				#echo $links['url'];
				#echo $links->link[0];
				$l = 0;
				foreach($dd->links[0] as $att){ $l++;
					//print_r($dd);
					#$link_site =  $att['url'];
					//echo $att['url'];
					if($l == 1){
						$Urls = explode("http://",$att['url']);
						#echo $att['url'];
						$link_site = $att['url'];
					}
					#echo "<br />";
					#$lomadizado = $objBuscaPeApi->lomadizar($att['url']);
					#echo $lomadizado;
					#$links = $att['url'][0];
					#$urls = explode("http://",$links);
					#echo $urls[2];
					
					$call = '';
					
					foreach($att as $y => $urls) {
						
						//echo $urls['url'];
						//print_r( $urls);
						//echo "asdasdsads  a d";
						
					}
					$call = $dd->links['url'];
					
					
					#$link_site =  $att['url'][0];
					#$call = $att[0];
					$call = $dd->links['url'];
					//print_r($att);
					#print_r($link_site);
				}
			#print_r($dd->thumbnail);
			foreach($dd->thumbnail[0] as $img){
				
				$img_rel = $img['url'];
			}
			
			/*
			$descricao = '';
			foreach($dd->item[0] as $des){
				//print_r($att);
				$descricao .= $des['label']." | ";
			}
			*/
			?>
            
            	<? if($pro == 1){ $display='block'; }else{ $display='none'; }?>
                
				<div class="span8 produtos" id="pro<?=$pro?>" style="display:<?=$display?>;width:300px;border:#000 1px solid" align="center">
					<div class="product">
						<div class="row-fluid">
                        
							<div class="span6">
                            <h3><? #=$dd['id']?> <?=str_replace("Refrigerador","Geladeira",$dd->productName)?> <?=$pro?> <? #=$dd->url?></h3>
								<div class="product-img">
                                <a href="<?=$link_site?>" target="_blank">
									<img width="250px" src="<?=$img_rel?>" alt="" />
                                 </a>
									
								</div>
							</div>
							<div class="span6">
								<div class="product-single-page ">
									<!-- <span>Entre R$ <?=$dd->priceMin?> e R$ <?=$dd->priceMax?></span>-->
								</div>
							</div>
                            
						</div>
					</div>
				</div>
                <? } ?>
          
          
          </div>
          
        </div>
<!-- End Container --> 
</body>
</html>