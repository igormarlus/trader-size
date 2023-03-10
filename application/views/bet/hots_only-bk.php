<thead class="dd_old">
<tr>
    <th data-class-name="priority">Data de Regsitro/Atualização</th>
    <th>Evento</th>
    <th>Mercado</th>
    <th>Seleção</th>
    <th>Odd</th>
    <th>Porcentagem</th>
    <th>Resultado</th>
    <?
    $dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
    if($dd_user_adm > 0){ 
    ?>
    <th>Ação</th>
    <? } ?>
    
</tr>
</thead>
<tbody class="dd_old">
<? if($hots->num_rows() > 0){ ?>


    <? foreach($hots->result() as $dd){ ?>
        <? #$t=0;  foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$meu->id_competicao) as $jogo) { $t++; ?>
            
            
            <?
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
                    
                    $qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' LIMIT 1");
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
            ?>
                    <tr class="odd gradeA"  style="background-color:<?=$bg_tr?>">
                    
                        <td><?=$dt_reg?></td>
                         
                        <td>
                            <a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bet/betjogo/<?=$dd->id_partida?>/<?=$hot_id_mkt?>" style="color:#000;font-size:12px">
                            <?=$hot_evento['evento']?>
                            </a>
                            
                            <?php #echo $menos." <br> ".$last_up;?>
                            
                            
                        </td>
                        
                        <td><?=$hot_mercado['name']?> </td>
                        <td><?=$hot_selecao['selection_name']?></td>
                        <td><?=$hot_odd?></td>
                        <td><?=$hot_volume?>%</td>
                        <td>
                            <? if($dd->status == 0){ ?>
                            ...                                          
                            <? }else{ ?>
                            <i class="glyph-icon tooltip-button demo-icon icon-check" title="" data-original-title=".icon-check"></i>
                            <? } ?>
                        </td>
                        <?
                        $dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
                        if($dd_user_adm > 0){ 
                        ?>
                        
                        <td>
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

</tbody>