
        <tr class="odd gradeA">
        
            <td>
            <?
            $hora_ld = strtotime(substr($jogo->inicio,11,8)); // horario de londres
			#$h_ld   = strtotime(substr($hora_ld,0,2)); // horario de londres
			#$m_ld = strtotime(substr($hora_ld,4,2)); // horario de londres
			#$s_ld = strtotime(substr($hora_ld,8,2)); // horario de londres
			#$hora_aqui = strtotime("now");
			#$diferenca = $hora_ld - $hora_aqui;
			#$unixtime = $diferenca;
			$time = date("h:i:s", mktime($hora_ld -3 ));
			#$data_soma = date('d/m/Y', mktime(0, 0, 0, $mes_pub, $dia_pub + $dias, $ano_pub));
			
			######### INSERI NO BD
			/*
			$qr_num = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$jogo->id_evento."'")or die(mysql_error()); 	

			if(mysql_fetch_assoc($qr_num) == 0){
				mysql_query("INSERT INTO `partidas` (`id_evento`,`evento`,`id_competition`) VALUES ('".$jogo->event->id."','".$jogo->event->name."' , '".$meu->id_competicao."')")or die(mysql_error());
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
                
                
                <?
                $data_eve = substr($jogo->inicio,0,10);
				$hora_eve = substr($jogo->inicio,11,8);
				?>
                <?=$data_eve?> <? #=$hora_eve?>
                
                <?
                $date_time  = new DateTime( $hora_eve );
				$diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
				echo $data_eve." ".$diff->format( '%H:%i:%S' ); // 05:10:00
				?>
                
                
                
                <? #=$jogo->event->openDate?>
             </td>
             
            <td>
                <a target='_blank' title="<?=$jogo->id_evento?>" href="<?=base_url()?>bet/jogo/<?=$jogo->id_evento?>" style="color:#000;font-size:12px">
                <?=$jogo->evento?> **
                </a>
            </td>
            <td><?=$this->padrao_model->get_by_matriz('id_competition',$meu->id_competicao,'betfair_competitions')->row()->nome?> </td>
            <td>
	       **
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

        
     