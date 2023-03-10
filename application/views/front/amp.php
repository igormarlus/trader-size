<?
$url_base = "https://tradersize.com";
?>
<!doctype html>
<html amp lang="pt-br">
  <head>

    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <title>Jogo <?=$dd->evento?> <?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> </title>
    <link rel="canonical" href="<?=base_url()?><?=$ctr?>/optin/<?=$url?>/">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

     <style amp-custom>
	    /* any custom styles go here. */
	    body {
	      background-color: white;
	      padding: 10px
	    }

	    amp-img {
	      border: 5px solid black;
	    }

	    amp-img.grey-placeholder {
	      background-color: grey;
	    }
	    .conteudo > img{
			max-width: 200px
	    }
	    .calltoaction{
	    	background-color: #28a745;
	    	padding:10px;
	    	color: #0f0;
	    	width: 90;
	    	color: #fff;
	    	text-align: center;
	    }
	  </style>
 
  <!--
    <script type="application/ld+json">
      
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "<?=$produto->modelo?>",
        "description": "<?=strip_tags($produto->descricao)?>",
        "datePublished": "<?=date("Y-m-d")?>T<?=date("H-i-
        s")?>",
        "image": [
          "logo.jpg"
        ]
      }
      
    </script>
  -->

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "<?=$dd->evento?>",
      "description": "Apostas esportivas em tempo real",
      "image": [
        "https://www.tradersize.com/logo/logo-face.png",
        "https://www.tradersize.com/logo/logo-face.png",
        "https://www.tradersize.com/logo/logo-face.png"
       ],
      "datePublished": "<?=date("Y-m-d")?>T<?=date("H-i-
        s")?>",
      "dateModified": "<?=date("Y-m-d")?>T<?=date("H-i-
        s")?>",
      "author": [{
          "@type": "Person",
          "name": "Igor Marlus",
          "url": "https://produtosinovadores.com.br"
        },{
          "@type": "Person",
          "name": "A.I",
          "url": "https://produtosinovadores.com.br"
      }]
    }
    </script>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
  </head>
  <body>

    <a href="https://api.whatsapp.com/send?phone=5581999468046&text=Ol%C3%A1!%20Gostaria%20de%20saber%20sobre%20*<?=$produto->modelo?>*" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
    z-index:1000;" target="_blank">
  <!--<i style="margin-top:16px" class="fa fa-whatsapp"></i>-->
  <amp-img
        class="grey-placeholder"
        src="https://produtosinovadores.com.br/catalogo/imagens/whatsapp-logo-1.png"
        srcset="https://produtosinovadores.com.br/catalogo/imagens/whatsapp-logo-1.png"
        width="100"
        height="70"
        layout="responsive" style="border:0px;margin-top:16px;margin-left:8px;width:70%">
      </amp-img>

  </a>
  

	<amp-analytics type="gtag" data-credentials="include">
	<script type="application/json">
	{
	  "vars" : {
	    "gtag_id": "UA-133182005-1",
	    "config" : {
	      "UA-133182005-1": { "groups": "default" }
	    }
	  }
	}
	</script>
	</amp-analytics>

  	<p align="center">
  		<a class="navbar-brand" href="<?=url_base()?>"  title="Trader Size">

  			<amp-img
		    class="grey-placeholder"
		    src="https://www.tradersize.com/logo/logo-face.png"
		    srcset="https://www.tradersize.com/logo/logo-face.png"
		    width="100"
    		height="70"
		    layout="responsive" style="border:0px;width: 50%">
		  </amp-img>

  			

  		</a>

  	</p>

    <? /* if($produto->id == 191){ ?>
      <div class="alert alert-success" style="background-color: #090;padding: 10px;color:white;text-align: center" align="center">
        <h2 class="modal-title">Receba os resultados no seu Whatsapp</h2>
        <p>Resultados da <strong>Lotofácil, Mega Sena, Quina</strong> e muito mais no seu Celular</p>
        <a href="https://api.whatsapp.com/send?phone=5581999468046&text=Ol%C3%A1!%20Gostaria%20de%20receber%20os%20resultados" target="_blank" class="btn btn-success">Eu Quero!</a>
        
      </div>
    <? } */ ?>


    <h1><?=$dd->evento?></h1>
    <!--
    <p>
    	<amp-img
    	alt="<?=$produto->modelo?>"
    class="grey-placeholder"
    src="<?=base_url()?>imagens/produtos/min/<?=$produto->img_portfolio?>"
    srcset="<?=base_url()?>imagens/produtos/<?=$produto->img_portfolio?>"
    width="100"
    height="100"
    layout="responsive">
  </amp-img>
    </p>

   -->
            
	  <br />
	  
	  <p align='center'>
	      <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=5581999468046">
	      	<amp-img
		    class="btn btn-success"
		    src="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
		    srcset="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
		    width="15px"
		    height="15px"
		    layout="responsive" style="border:0px;width: 10%">
		  </amp-img> </a>
      <a class="calltoaction" href="https://api.whatsapp.com/send?phone=5581999468046">Falar AGORA no whatsapp </a>
		
	</p>
	  
	  <br />

    <hr />

    <? 
    if($dd_key->include != "" ){ 
      include("includes/keys/".$dd_key->include."-amp.php");
    }
    ?>

    

    <?
    // trata especificacoes
    #$espec1 = str_replace("<img", "<amp-img", $produto->especificacoes);
    #$espec1 = str_replace("</img", "</amp-img", $produto->especificacoes);

    ?>

    <!--<p class="conteudo"><?=$espec1?></p>-->
    <p><? #=$produto->especificacoes?></p>

    <hr>

            
	  <br />

	  
  <p align='center'>
        <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=5581999468046">
          <amp-img
        class="btn btn-success"
        src="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
        srcset="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
        width="15px"
        height="15px"
        layout="responsive" style="border:0px;width: 10%">
      </amp-img> </a>
      <a class="calltoaction" href="https://api.whatsapp.com/send?phone=5581999468046">Falar AGORA no whatsapp </a>
    
  </p>
	  
	  <br />

    <hr>

    <amp-ad width="100vw" height="320"
         type="adsense"
         data-ad-client="ca-pub-4921369568713372"
         data-ad-slot="4200495078"
         data-auto-format="rspv"
         data-full-width="">
      <div overflow=""></div>
    </amp-ad>
	
	</hr>
	<p></p>
	<hr />







	


    
  </body>
</html>