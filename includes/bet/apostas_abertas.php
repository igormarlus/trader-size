<? 
$tg = 10; 

	foreach($this->bet_model->list_bets_atual($APP_KEY, $SESSION_TOKEN) as $dd_bet_now){ 
		#if(count($dd_bet_now) > 0){
			for($b=0; $b<count($dd_bet_now); $b++){ $tg++;
				if(isset($dd_bet_now[$b])){
				$bet_idbet = $dd_bet_now[$b]->betId;
				$bet_mkt_id = $dd_bet_now[$b]->marketId;
				$bet_selection_id = $dd_bet_now[$b]->selectionId;
				$dd_bet_where = array('id_mkt' => $bet_mkt_id , 'selection_id' => $bet_selection_id);
				$this->db->where($dd_bet_where);
				$dd_bet_mkt = $this->db->get('odds_mkt');
				
				
			
			if($dd_bet_mkt->num_rows() > 0){
				
				// dados atuais do mercado ja no banco de dados
				$dd_where_selection_atual = array(
					'id_mkt' => $bet_mkt_id,
					'selection_id' => $bet_selection_id,
					'tipo' => $dd_bet_now[$b]->side
				);
				$this->db->where($dd_where_selection_atual);
				$this->db->order_by('id','desc');
				$this->db->limit(1);
				$qr_odds_atual = $this->db->get('odds_mkt');
				$dd_selecion_atual = $qr_odds_atual->row();
			
				$bet_dd_mercado = $dd_bet_mkt->row()->selection_name;
				$lucro = ($dd_bet_now[$b]->averagePriceMatched  * $dd_bet_now[$b]->sizeMatched) - $dd_bet_now[$b]->sizeMatched;
				
			// calculos bet - comparativos
				$balanco_atual = ($dd_selecion_atual->odd  * $dd_bet_now[$b]->sizeMatched) - $dd_bet_now[$b]->sizeMatched;
				$balanco_atual =   $lucro - $balanco_atual;
				
			?>
			
		
                <a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-<?=$tg?>" class="popover-title">
                    <?=$bet_dd_mercado?> 
                    <span class="caret"></span>
                </a>
                <div id="sidebar-toggle-<?=$tg?>" class="collapse in">
                    <div class="pad15A">
                        
                        <? #=print_r($dd_bet_now[$b])?>
                        <!--
                        <p style="color:blue"><?=print_r($dd_bet_now[$b]->priceSize)?></p>
                        
                        <p style="color:green"><?=print_r($dd_bet_now[$b]->orderType)?></p>
                        -->
                    
                        <div class="divider mrg15T mrg15B"></div>
                        
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="border-radius:5px;">
                            <thead>
                            <tr>
                                <th>Aposta **</th>
                                <th>Ordem</th>
                                <th>Valor</th>
                                <th>Lucro</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr class="odd gradeA">
                            	<td><?=$dd_bet_now[$b]->side?>: <?=$bet_dd_mercado?></td>
                                <td><?=$dd_bet_now[$b]->averagePriceMatched?></td>
                                <td><?=$dd_bet_now[$b]->sizeMatched?></td>
                                <td><?=$lucro?></td>
                            </tr>
							<tr class="odd gradeA">
                            	<td>Cash Out **</td>
                                <td><?=$dd_selecion_atual->odd?></td>
                                <td>
                                	<? if( $dd_selecion_atual->odd > $dd_bet_now[$b]->averagePriceMatched){ $color_balance = 'red';}else{ $color_balance = 'green'; } ?>
									<strong style="color:<?=$color_balance?>"><?=$balanco_atual?></strong>
                                </td>
                                <td><?=$lucro?></td>
                                
                            </tr>                           
                                
	                        </tbody>
                        </table>
                        
                        
                        <div class="example-box-wrapper">

                            <button type="button" class="btn btn-primary btn-lg btn-block">Cash Out</button>
            
                        </div>
                    </div>
                    
                    <div class="pad15A">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center font-gray pad5B text-transform-upr font-size-12">Aposta</div>
                                <div class="chart-alt-3 font-gray-dark" data-percent="<?=$dd_bet_now[$b]->sizeMatched?>"><span><?=$dd_bet_now[$b]->sizeMatched?></span></div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center font-gray pad5B text-transform-upr font-size-12">Cash Out</div>
                                <div class="chart-alt-3 font-gray-dark" data-percent="<?=$dd_bet_now[$b]->averagePriceMatched?>"><span><?=$dd_bet_now[$b]->averagePriceMatched?></span>%</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center font-gray pad5B text-transform-upr font-size-12">Lucro</div>
                                <div class="chart-alt-3 font-gray-dark" data-percent="<?=$lucro?>"><span><?=$lucro?></span></div>
                            </div>
                        </div>
                        <div class="divider mrg15T mrg15B"></div>
                        
                    </div>
                    
                    
                    <ul class="progress-box">
                        <li>
                            <div class="progress-title">
                                New features development
                                <b>87%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="87">
                                <div class="progressbar-value bg-azure">
                                    <div class="progressbar-overlay"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="progress-title">
                                Finishing uploading files
                                <b>66%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="66">
                                <div class="progressbar-value bg-red">
                                    <div class="progressbar-overlay"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="progress-title">
                                Creating tutorials
                                <b>58%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="58">
                                <div class="progressbar-value bg-blue-alt"></div>
                            </div>
                        </li>
                        <li>
                            <div class="progress-title">
                                Frontend bonus theme
                                <b>74%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="74">
                                <div class="progressbar-value bg-purple"></div>
                            </div>
                        </li>
                    </ul>
                    
                    
                    
                </div>
                <div class="clear"></div>
		<? } ?>
	<? } ?>
    		
            <? } // x for ?>
<? } // x foreach ?>
