<?
$url_base = "https://tradersize.com/";
?>
<!DOCTYPE html>
<html ⚡ lang="pt">
<html amp lang="pt-br">
  <head>

    <meta charset="utf-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script> 
    <title>&#129351; <?=str_replace(" v "," x ",$dd->evento)?>  <?=$champ->row()->nome?>  Apostas Esportiva Bets</title>
    <link rel="canonical" href="<?=base_url()?>futebol/jogo/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>/">
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
 
  
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "<?=str_replace(" v "," x ",$dd->evento)?>  <?=$champ->row()->nome?>  Apostas Esportiva Bets",
        "description": "Saiba onde estão as Apostas Esportiva de Futebol",
        "datePublished": "<?=date("Y-m-d")?>T<?=date("H-s-
        i")?>Z",
        "image": [
          "<?=base_url()?>logo/logo.png"
        ]
      }
    </script>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>


<!--
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<amp-analytics type="gtag" data-credentials="include">
<script type="application/json">
{
  "vars" : {
    "gtag_id": "UA-103260353-1",
    "config" : {
      "UA-103260353-1": { "groups": "default" }
    }
  }
}
</script>
</amp-analytics>
-->


  	<p >
  		<a class="navbar-brand" href="<?=base_url()?>"  title="Trader Size - Saiba aonde as pessoas estão apostando.">

  			<amp-img
		    class="grey-placeholder"
		    src="<?=base_url()?>logo/logo-face.jpg"
		    srcset="<?=base_url()?>logo/logo-face.jpg"
		    width="100"
    		height="70"
		    layout="responsive" style="border:0px;width: 50%">
		  </amp-img>

  			

  		</a>

  	</p>

    <a href="https://api.whatsapp.com/send?phone=5581999468046&text=Ol%C3%A1!%20Gostaria%20de%20saber%20sobre%20*Tradersize*" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#25d366;color:#FFF;border-radius:50px;text-align:center;font-size:30px;box-shadow: 1px 1px 2px #888;
    z-index:1000;" target="_blank">
  <i style="margin-top:16px" class="fa fa-whatsapp"></i>
  </a>


    <h1><?=str_replace(" v "," x ",$dd->evento)?></h1>
    <p>
      <!--
    	<amp-img
    	alt="<?=$produto->modelo?>"
    class="grey-placeholder"
    src="<?=base_url()?>imagens/produtos/min/<?=$produto->img_portfolio?>"
    srcset="<?=base_url()?>imagens/produtos/<?=$produto->img_portfolio?>"
    width="100"
    height="100"
    layout="responsive">
  </amp-img> -->
    </p>

    <?  if(strlen($champ->row()->nome) > 5){ ?>
      <h2 class="mb-5"><?=$champ->row()->nome?></h2>
    <? }else{ ?>
    <?

    ?>
      <h2 class="mb-5">Apostas Esportivas</h2>
    <? }  ?>


    <p><? #=$produto->descricao?></p>

    <hr>
    <p>
    	<br />

	 		<a class="calltoaction" id="call2" rel="Comprar <?=$produto->modelo?>" title="Cadastro" data-tipo="2" href="<?=base_url()?>" >Cadastre-se</a>
	</p>
            
	  <br />
	  <br />
	  <br>
	  <p>
	      <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=558196885503">
	      	<amp-img
		    class=""
		    src="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
		    srcset="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
		    width="15px"
		    height="15px"
		    layout="responsive" style="border:0px;width: 10%">
		  </amp-img> Falar AGORA no whatsapp
		</a>
	</p>
	  
	  <br />

    <hr>


    <!--<p class="conteudo"><?=$espec1?></p>-->
    <p> ------ <? #=$produto->especificacoes?></p>
    <!-- DINAMICO --> 

    <section class="content reverse">
    <section class="main">
          
      
            <section class="columns">
              <? if($id_evento == 0){ ?>
              <h2>Jogo Encerrado</h2>
              <? }else{ ?>
              <div vocab="">
                <? if($champ->num_rows() > 0){?>
              <span property="name"><?=$champ->row()->nome?></span>
            <? }else{ ?>
              <span property="name"><?=$dd->evento?></span>
            <? } ?>
          
          <meta property="isLiveBroadcast" content="http://schema.org/True" />
          <div property="broadcastOfEvent" typeof="SportsEvent">
            <? if($champ->num_rows() > 0){?>
              <span property="name"><?=$champ->row()->nome?></span>
            <? }else{ ?>
              <span property="name"><?=$dd->evento?></span>
            <? } ?>


            <div property="competitor" typeof="SportsTeam">
              <meta property="name" content="<?=$times['0']?>" />

            </div>
            <div property="competitor" typeof="SportsTeam">
              <meta property="name" content="<?=$times['1']?>" />
            </div>

            <meta property="startDate" content="<?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))
            ?> <?=substr($dd->inicio,10,10)?>" />
            <meta property="location" content="Betfair" />
          </div>
        </div>
        <h1><span style="font-size: 14px" property="startDate" content="<?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=substr($dd->inicio,10,10)?>"><?=$this->padrao_model->converte_data(substr($dd->inicio,0,10))?> <?=substr($dd->inicio,10,10)?> </span> <br /> <?=$dd->evento?></h1>
                

        <?if($champ->num_rows() > 0){?>
                <h2><span property="description"><?=$champ->row()->nome?></span></h2>
                <? } ?>

                <? } // x  else if fim de jogo ?>
                
                
                <!--<a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142&redirecturl=https://www.betfair.com/sport/football/event?eventId=<?=$dd->id_evento?>">
                <h3 style="padding:20px;background-color:#fdb800;font-weight:bold">
                             Ver na Betfair - Sportbook </span>
                             </h3></a> -->
                    <a target="_blank" href="<?=base_url()?>">
                <h3 style="padding:20px;background-color:#fdb800;font-weight:bold;font-size:14px">
                             Software/Aplicação Web Betfair <br> Saiba Onde Está o Dinheiro nos Mercados. 
                             <strong style="color: #fff">Teste Grátis </strong>
                             </h3>

                    <h2><span>Mercados mais correspondidos:</span></h2>         
                  
                    <div class="col12">
            <? 
            $m = 0; 
            foreach ($mercados as $mercado) { 
            $m++;
            #foreach ($this->bet_model->getMarketings($APP_KEY, $SESSION_TOKEN,$id_evento,'5') as $mercado) { $m++;
            ?>
                        
                            <h3 title="<?=$mercado->marketId?>">
                                <span><?=$m?>º   <?=$mercado->marketName?></span> - 
                                <small>
                                  
                                <a style="font-size:12px;color:#06F" target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$mercado->marketId?>">
                             Betfair Exchange
                             </a>
                                </small>
                                
                            </h3>
                            <h5>Total Matched: $<?=number_format($mercado->totalMatched, 2, ',', '.')?></h5>
                            
                            
                            
                            
                            
                            <?
                            $qr_selecoes = $this->db->query("SELECT DISTINCT selection_name,selection_id FROM odds_mkt WHERE id_mkt = '".$mercado->marketId."' AND   tipo = 'back' AND selection_name <> '' ");   
              #echo "<h2>".$qr_selecoes->num_rows()."</h2>";
              if($qr_selecoes->num_rows() > 0){ ?>
              <table class="pricing" style="width:100%;border:red 0px solid;">
                            <tbody><tr>
                                <th></th>
                                <th>back</th>
                                <th>Lay</th>
                            </tr>
              <? $s=0; foreach($qr_selecoes->result() as $selecao){ $s++;
                #$qr_num = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' ");  
                include("includes/mysqli_con.php");
                $soma_back_sel_ci = $this->db->query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = '".$mercado->marketId."' AND  selection_id = '".$selecao->selection_id."' AND tipo = 'back' order by id desc LIMIT 5  ");
                
                
                $soma_back_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId."  AND selection_id = ".$selecao->selection_id." AND tipo = 'back' order by id desc LIMIT 5  ");
                $soma_back = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId." AND tipo = 'back' order by id desc LIMIT 5  ");
                $soma_total_sel_back = mysqli_fetch_assoc($soma_back_sel);
                $soma_total_back = mysqli_fetch_assoc($soma_back);
                $pecentual_back = ($soma_total_sel_back['soma'] * 100) / $soma_total_back['soma'];
                
                
              ?>
                            
                            <!--- LAY -->
                      <?
                                            $soma_lay_sel = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId."  AND selection_id = ".$selecao->selection_id." AND tipo = 'lay' order by id desc LIMIT 5  ");
                                            $soma_lay = mysqli_query($con,"SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$mercado->marketId." AND tipo = 'lay' order by id desc LIMIT 5  ");
                                            $soma_total_sel_lay = mysqli_fetch_assoc($soma_lay_sel);
                      $soma_total_lay = mysqli_fetch_assoc($soma_lay);
                      $pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
                                            #echo number_format($pecentual_lay, 2, ',', '.').'%';
                                            ?>
                            <!--<p class="progress"><span class="fill"><span><?=$selecao->selection_name?> <?=number_format($pecentual_back, 2, ',', '.');?>%</span></span></p>
                              <h6><?=$selecao->selection_name?> -  - <?=$soma_back_sel_ci->row()->soma?> <p class="price"> <span><?=$pecentual_back?>%</span> </p></h6>-->
                                
                                
                                
                                <tr>
                                    <td><?=$selecao->selection_name?></td>
                                    <td><?=number_format($pecentual_back, 2, ',', '.');?>%</td>
                                    <td style="background-color:#f7f7f7"><?=number_format($pecentual_lay, 2, ',', '.');?>%</td>
                                </tr>
                                
    
    
                                
                    <? } // x forach ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="2">$ <?=number_format($mercado->totalMatched, 2, ',', '.');?> </td>
                        </tr>
                    </tbody>
                    </table>
              <? }else{ // x if`num_rows ?>
                            <p>Dados privados  <a href="<?=base_url()?>" title="Ir para Trader Size" >Saiba Mais</a> </p>
                            <? } ?>
            <?
              
              ?>
                            
                        <? } // x foreacdh ?>
                </div>       
                       <!--<div class="col12">
                            <h3 title="">
                                <span>Betfair</span>
                                
                            </h3>
                            
                            <a href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" target="_blank" >


                            <amp-img
                              class="grey-placeholder"
                              src="<?=base_url()?>imagens/banner/banner-betfair.jpg"
                              srcset="<?=base_url()?>imagens/banner/banner-betfair.jpg"
                              width="300"
                              height="300"
                              layout="responsive" style="border:0px;width: 50%">
                            </amp-img>


                            </a>
                            
                       </div> -->
  
    <!--                   DINAMICO -->

    <hr>
    <p>
    	<br />

	 		<a class="calltoaction" id="call2" rel="Comprar <?=$produto->modelo?>" title="Cadastro" data-tipo="2" href="<?=base_url()?>" >Cadastro</a>
	</p>
            
	  <br />
	  <br />
	  <br>
	  <p>
	      <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=558196885503" rel="Falar no Whatsapp">
	      	<amp-img
		    class=""
		    src="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
		    srcset="https://produtosinovadores.com.br/imagens/whatsapp2.svg"
		    width="15px"
		    height="15px"
		    layout="responsive"  style="border:0px;width: 10%">
		  </amp-img> Falar AGORA no whatsapp
		</a>
	</p>
	  
	  <br />

    <hr>

 <amp-ad width="100vw" height="320"
     type="adsense"
     data-ad-client="ca-pub-4921369568713372"
     data-ad-slot="8463788776"
     data-auto-format="rspv"
     data-full-width="">
  <div overflow=""></div>
</amp-ad>
	</hr>
	<p>   
   Ao saber onde as pessoas estão apostando em jogos de futebol <strong><?=$dd->evento?> <?=$dd->inicio?></strong>, você pode obter informações valiosas sobre as tendências de apostas e as probabilidades de um determinado resultado de cada mercado separadamente. Isso pode ajudar você a tomar decisões informadas sobre suas apostas e aumentar suas chances de ganhar.
  </p>

  <p>
    Uma ferramenta que mostra essas <strong>informações é extremamente útil para os apostadores</strong>. Ela fornece informações sobre onde as pessoas estão apostando, quais são as probabilidades de um determinado resultado e quais são as tendências de apostas. Isso ajuda os apostadores a tomar decisões informadas sobre suas apostas e aumentar suas chances de ganhar.
  </p>
  <p>
    Além disso, essa ferramenta também pode ajudar os <strong>apostadores a entender melhor o mercado de apostas</strong> e a identificar oportunidades de apostas lucrativas. Isso pode ajudar os apostadores a maximizar seus lucros e minimizar seus riscos.
  </p>
  <p>
    Portanto, <strong>saber onde as pessoas estão apostando em jogos de futebol é extremamente importante</strong> para os apostadores. Uma ferramenta que mostra essas informações pode ajudar os apostadores a tomar decisões informadas e aumentar suas chances de ganhar. 
  </p>
	<hr />
    
  </body>
</html>