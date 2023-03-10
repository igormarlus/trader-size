<? if($hots->num_rows() > 0){ ?>


    <? foreach($hots->result() as $dd){ ?>
        <? 
		$hot_id_mkt = "";
		$hot_selection = "";
            # if(mysql_num_rows($qr_num) > 0){
                #while($dd = mysql_fetch_assoc($qr_num)){
					if($dd->dt_upgrade == "0000-00-00 00:00:00"){
	                    $dt_reg = $dd->dt;
					}else{
						$dt_reg = $dd->dt_upgrade;
					}
                    $hot_id_mkt = $dd->id_mkt;
                    $hot_selection = $dd->selection_id;
                    $hot_odd = $dd->odd;
                    $hot_volume = $dd->tamanho; 
                    
                    $qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> ''  ORDER BY id desc LIMIT 1");
                    $hot_selecao = mysql_fetch_assoc($qr_selecao);
                    
                    $qr_evento = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$dd->id_partida."'");
                    $hot_evento = mysql_fetch_assoc($qr_evento);
                    
                    $qr_mercado = mysql_query("SELECT * FROM mercados WHERE id_mkt = '".$hot_id_mkt."'");
                    $hot_mercado = mysql_fetch_assoc($qr_mercado);
					
					//bg new
					/*
					$agora = date("Y-m-d H:s:m");
					$menos = strtotime($agora);
					$last_up  = strtotime($dd->dt_upgrade+45);
					//if($agora)
					if($menos < $last_up){
						$bg_tr = '#ffb900'; 
					
					*/
					#echo $menos." <br> ".$last_up;
					if($dd->view == '0'){ 
						$dd_view = array('view' => '1');
						$this->db->where('id',$dd->id);
						$this->db->update('odds_hot' , $dd_view);
						$bg_tr = '#ffb900'; 
						
					}else{ 
						$bg_tr = '#fff'; 
					}
					#$qr_mkt = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' order by id desc LIMIT 1");
					
					if(mysql_num_rows($qr_selecao) > 0){
						if($hot_selecao['total_matched']){
							$matched = number_format($hot_selecao['total_matched'], 2, ',', '.');
						}else{
							$matched = (float) $hot_selecao['total_matched'];
						}
					}else{
						$matched = 0;
					}
            ?>
                    <tr class="odd gradeA tr_old"  style="background-color:<?=$bg_tr?>">
                    
                        <td>
						<?
							$hora_eve = substr($dt_reg,10,10);
							$now = date("h:i:s");
							$date_time  = new DateTime( $hora_eve );
							$diff       = $date_time->diff( new DateTime( $now ) );				
							#echo $diff->format( '%H:%i:%S' ); // 05:10:00
						?>
						<? #=$hora_eve?> 
						<?=$dt_reg?>
                        </td>
                        
                        <td>
							 <?
                             
                            $data_eve = substr($hot_evento['inicio'],0,10);
                            $hora_eve = substr($hot_evento['inicio'],11,8);
                            
                            ?>
                            <? #=$data_eve?> <? #=$hora_eve?>
                            <?=$data_eve?>
                            <?
                            $date_time  = new DateTime( $hora_eve );
                            $diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
                            echo $diff->format( '%H:%i:%S' ); // 05:10:00
                            
                            ?>
                         
                         
                         </td>
                         
                        <td>
                            <a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bet/betjogo/<?=$dd->id_partida?>/<?=$hot_id_mkt?>" style="color:#000;font-size:12px">
                            <?=$hot_evento['evento']?>
                            </a>
                            
                             - 
                             
                             <!--<a href="https://www.betfair.com/exchange/plus/football/market/<?=$hot_id_mkt?>" target="_blank">Betfair</a>-->
                             
                            
                            <?php #echo $menos." <br> ".$last_up;?>
                            
                            
                        </td>
                        
                        <td><a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bet/betjogo/<?=$dd->id_partida?>/<?=$hot_id_mkt?>" style="color:#000;font-size:12px"><?=$hot_mercado['name']?></a> </td>
                        <td><?=$hot_selecao['selection_name']?></td>
                        <td><?=$dd->side?></td>
                        <td>
                        <? #=$hot_id_mkt." -- ".$hot_selection?>
                        <!--
                        <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$hot_id_mkt?>">
                             Bet
                             </a>
                            --> 
                             </td>
                        <td><?=$hot_odd?></td>
                        <td><?=$hot_volume?>%</td>
                        <td><?=$matched?> - <?=$hot_selecao['id']?></td>
                        <td>
                            <? if($dd->resultado == 0){ ?>
                            ...
                            <? } ?>
                            
                            <? if($dd->resultado == 1){ ?>
                                <button class="btn btn-alt btn-hover btn-success">
                                    <span>GREEN</span>
                                </button>
                            <? } ?>
                            
                            <? if($dd->resultado == 2){ ?>
                                <button class="btn btn-alt btn-hover btn-danger">
                                    <span>RED</span>
                                </button>
                            <? } ?>
                            
                            
                            
                            
                            <? if($dd->status == 0){ ?>
                            
                            <? }else{ ?>
                            <i class="glyph-icon tooltip-button demo-icon icon-check" title="" data-original-title=".icon-check"></i>
                            <? } ?>
                        </td>
                        <?
                        $dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
                        if($dd_user_adm > 0){ 
                        ?>
                        
                        <td>
                        <select name="resultado_hot" class="resultado_hot" title="<?=$dd->id?>">
                        	<? if($dd->resultado == 0){ $check_resultado = 'selected="selected"';}else{ $check_resultado = ''; } ?>
                        	<option value="0" <?=$check_resultado?>>Aguardando</option>
                            <? if($dd->resultado == 1){ $check_resultado = 'selected="selected"';}else{ $check_resultado = ''; } ?>
                            <option value="1" <?=$check_resultado?> style="background-color:#0C0">Green</option>
                            <? if($dd->resultado == 2){ $check_resultado = 'selected="selected"';}else{ $check_resultado = ''; } ?>
                            <option value="2" <?=$check_resultado?> style="background-color:#F00">Red</option>
                        </select>
                            <? if($dd->status == 1){ $check_sel = 'checked';}else{ $check_sel = ''; } ?>
                            <input type="checkbox" <?=$check_sel?> name="" class="check_resultado" value="<?=$dd->id?>" >
                        </td>
                        <? } ?>
                        
                        
                    </tr>
                    <? #} // x while ?>
            <? #} // x if ?>   
            
            
            
            
            
        <? } ?>

            <? } // x foreach ?>
                
<? #} // x if num_rows()  ?>

