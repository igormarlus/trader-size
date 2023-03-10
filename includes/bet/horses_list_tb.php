<?
$dd_evento = $this->bet_model->get_id_evento($APP_KEY, $SESSION_TOKEN,$jogo->marketId);
?>
        <tr class="odd gradeA">
        
            <td>
            <?
			
            #$hora_ld = strtotime(substr($jogo->event->openDate,11,8)); // horario de londres
			#$h_ld   = strtotime(substr($hora_ld,0,2)); // horario de londres
			#$m_ld = strtotime(substr($hora_ld,4,2)); // horario de londres
			#$s_ld = strtotime(substr($hora_ld,8,2)); // horario de londres
			#$hora_aqui = strtotime("now");
			#$diferenca = $hora_ld - $hora_aqui;
			#$unixtime = $diferenca;
			#$time = date("h:i:s", mktime($hora_ld -3 ));
			#$data_soma = date('d/m/Y', mktime(0, 0, 0, $mes_pub, $dia_pub + $dias, $ano_pub));
			
			######### INSERI NO BD
			#$qr_num = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$jogo->event->id."'")or die(mysql_error()); 	
/*
			if(mysql_fetch_assoc($qr_num) == 0){
				#mysql_query("INSERT INTO `partidas` (`id_evento`,`evento`,`id_competition`) VALUES ('".$jogo->event->id."','".$jogo->event->name."' , '".$meu->id_competicao."')")or die(mysql_error());
			}else{
				#$dd_evento = mysql_fetch_assoc($qr_num));
				#print $dd_evento;
				#echo $dd_evento['inicio'];
			}
				*/				
			
			?>
				<? /*=$this->padrao_model->converte_data(substr($jogo->event->openDate,0,10))?> 
             	<br />   
                <?=$time */ ?>
                
                <? #=print_r($jogo) // retorna os cavalos?>
                <?
                $data_eve = substr($dd_evento[0]->event->openDate,0,10);
				$hora_eve = substr($dd_evento[0]->event->openDate,11,8);
				echo $hora_eve;
				?>
                <? #=$data_eve?> <? #=$hora_eve?>
				<? #=$dd_evento[0]->event->openDate?>  
                <?
                #$date_time  = new DateTime( $hora_eve );
				#$diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
				#echo $diff->format( '%H:%i:%S' ); // 05:10:00
				#echo "Betfair: ".$dd_evento[0]->event->openDate;
				#echo "<br>";
				#$data = $diff->format( '%H:%i:%S' );
				
				?>
				<? #=$this->padrao_model->fuso_dt($dd_evento[0]->event->openDate,24)?>
             </td>
             <td><a target='_blank' title="<?=$jogo->event->id?>" href="<?=base_url()?>horse/horse_mkt/<?=$jogo->marketId?>" style="color:#000;font-size:12px"><?=$dd_evento[0]->event->name?> </a> </td>
             <td><?=$dd_evento[0]->event->venue?></td>
             <td><?=$jogo->marketId?></td>

            <td>
                <a target='_blank' title="<?=$jogo->event->id?>" href="<?=base_url()?>horse/horse_mkt/<?=$jogo->marketId?>" style="color:#000;font-size:12px">
                <? #=$jogo->event->name?> <?=$jogo->marketName?><?=$jogo->marketName?> 
                </a>
                 - 
                 <a target='_blank' title="<?=$jogo->event->id?>" href="https://www.betfair.com/exchange/plus/horse-racing/market/<?=$jogo->marketId?>" style="color:#00f;font-size:12px">
                Betfair
                </a>
                
               
            </td>
            <td>
            <?
			
			#print_r($dd_evento[0]->event);
            ?>
			<?=$dd_evento[0]->event->countryCode?>  
            </td>
            <td>$ <?=number_format($jogo->totalMatched, 2, ',', '.')?>
	       <? #=print_r($jogo)?>
        	<?
			/*
			// MATCH odds
            foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$jogo->event->id,$query="MATCH_ODDS") as $odd){ 
					#$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					#$this->bet_model->printMarketIdRunnersAndPrices_list($odd, $marketBook);
			}
			?>
            <a target="_blank" href="<?=base_url()?>bet/betjogo/<?=$jogo->event->id?>/<?=$odd->marketId?>">Match Odds</a> - 
            
            <?
			// OVER UNDER 1.5
            foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$jogo->event->id,$query="OVER_UNDER_15") as $odd){ 
					#$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					#$this->bet_model->printMarketIdRunnersAndPrices_list($odd, $marketBook);
			}
			?>
            <a target="_blank" href="<?=base_url()?>bet/betjogo/<?=$jogo->event->id?>/<?=$odd->marketId?>">O/U 1.5</a> - 
            
            <?
			// RESULTADO CORRETO
            foreach($this->bet_model->getMarketings_query($APP_KEY, $SESSION_TOKEN,$jogo->event->id,$query="CORRECT_SCORE") as $odd){ 
					#$marketBook = getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
					#$this->bet_model->printMarketIdRunnersAndPrices_list($odd, $marketBook);
			}
			?>
            <a target="_blank" href="<?=base_url()?>bet/betjogo/<?=$jogo->event->id?>/<?=$odd->marketId?>">Resultado Correto</a>
            <? */ ?>
            </td>
        	
            
        </tr>

        
     