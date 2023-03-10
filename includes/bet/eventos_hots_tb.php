<?
######### INSERI NO BD
$qr_num = mysql_query("SELECT * FROM odds_hot WHERE id_partida = '".$jogo->event->id."'")or die(mysql_error()); 	
#$qr_num = mysql_query("SELECT * FROM odds_hot")or die(mysql_error()); 	
#$qr_num = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$jogo->event->id."'")or die(mysql_error()); 	

if(mysql_num_rows($qr_num) > 0){
	while($dd = mysql_fetch_assoc($qr_num)){
		$dt_reg = $dd['dt'];
		$hot_id_mkt = $dd['id_mkt'];
		$hot_selection = $dd['selection_id'];
		$hot_odd = $dd['odd'];
		$hot_volume = $dd['tamanho']; 
		$qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' LIMIT 1");
		$hot_selecao = mysql_fetch_assoc($qr_selecao);
		
?>
        <tr class="odd gradeA">
        
            <td>
            <?
				$hora_eve = substr($dt_reg,10,10);
				$date_time  = new DateTime( $hora_eve );
				$diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
				echo $diff->format( '%H:%i:%S' ); // 05:10:00
			?>
			<? #=$hora_eve?>
            </td>
             
            <td>
                <a target='_blank' title="<?=$jogo->event->id?>" href="<?=base_url()?>bet/betjogo/<?=$jogo->event->id?>/<?=$hot_id_mkt?>" style="color:#000;font-size:12px">
                <?=$jogo->event->name?>
                </a>
            </td>
            
            <td><?=$hot_id_mkt?> </td>
            <td><?=$hot_selecao['selection_name']?></td>
            <td><?=$hot_odd?></td>
            <td><?=$hot_volume?></td>
        	
            
        </tr>
        <? } // x while ?>
<? } // x if ?>        

        
     