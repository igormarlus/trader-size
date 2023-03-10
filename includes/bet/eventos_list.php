
 
    <li class="dd-item" data-id="<?=$t?>" style="border:#999 1px solid;padding:10px;background-color:#D9ECFF;width:100%;color:#000;font-size:12px;font-weight:bold">
        <a target='_blank' href="<?=base_url()?>bet/betjogo/<?=$jogo->event->id?>" style="color:#000;font-size:12px">
			<?=$jogo->event->name?>
        </a> ID: 
        <?=$jogo->event->id?>
    </li>
    <div style="display:none">
  <?  foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$jogo->event->id,$query="MATCH_ODDS") as $odd){ ?>
        
        
            
                <p><?=$odd->marketName."[".$odd->selectionId."]".$odd->marketId;?></p>
            
        
            <?
            //print_r($odd);
            ########## 	MOSTRA AS ODDS
            #$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
            #printMarketIdRunnersAndPrices($odd, $marketBook); // mostrar odds
            ?>
      
<?  } ?>
	</div>




       
