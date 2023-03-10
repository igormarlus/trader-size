
<script type="text/javascript">
 
</script>
<? 
require_once('includes/betapi/jsonrpc-futbol.php'); 
$tg = 10; 
$lucro = 0;
$cont_bets = 0;
#echo "Opa1";
#echo "<br>";
#echo $APP_KEY." <> ".$SESSION_TOKEN;
	if(empty($this->bet_model->list_bets_atual($APP_KEY, $SESSION_TOKEN)->currentOrders)){
		echo "Nenhuma aposta realizada";
	}

	foreach($this->bet_model->list_bets_atual($APP_KEY, $SESSION_TOKEN) as $dd_bet_now){ $cont_bets++;
	#echo "Opa 2";
		#if(count($dd_bet_now) > 0){
			$mkt_atual = "";
			#print_r($dd_bet_now);
			// evita erro
			if(empty($dd_bet_now)){
				return false;	
			}
			#echo "passou";
			
			for($b=0; $b<count($dd_bet_now); $b++){ $tg++;
				if(isset($dd_bet_now[$b])){
				
				
					
				$bet_idbet = $dd_bet_now[$b]->betId;
				$bet_mkt_id = $dd_bet_now[$b]->marketId;
				$bet_selection_id = $dd_bet_now[$b]->selectionId;
				$bet_status = $dd_bet_now[$b]->status;
				$dd_bet_where = array('id_mkt' => $bet_mkt_id , 'selection_id' => $bet_selection_id);
				$this->db->where($dd_bet_where);
				$dd_bet_mkt = $this->db->get('odds_mkt');
				
				$bet_price = $dd_bet_now[$b]->averagePriceMatched;
				$bet_size = $dd_bet_now[$b]->sizeMatched;


				//if($bet_status == "EXECUTION_COMPLETE"){ 
				
					// partida
					if($this->padrao_model->get_by_matriz('id_mkt',$bet_mkt_id,'odds_mkt')->num_rows() > 0){
						$id_partida = $this->padrao_model->get_by_matriz('id_mkt',$bet_mkt_id,'odds_mkt')->row()->id_partida;
					}else{
						$id_partida = 0;
					}
					$dd_evento = $this->padrao_model->get_by_matriz('id_evento',$id_partida,'partidas')->row();
					
						
					
					//time				
					#$dif_hora = strtotime("03:00:00");			
					if(isset($dd_bet_now[$b]->matchedDate))	{
						$bet_placed = substr($dd_bet_now[$b]->placedDate,11,9);
						$bet_matched = substr($dd_bet_now[$b]->matchedDate,11,9);
						#$agora = date('H:i:s');
						#$bet_placed_br = gmdate('H:i:s', strtotime( $bet_placed ) - strtotime( "03:00:00" ) );
						#$tempo = gmdate('H:i:s', strtotime( $bet_placed ) - strtotime( $bet_placed_br ) );
						$tempo = $bet_matched;
					}else{
						$tempo = "Indefinido";
					}
					
					#$bet_matched = $bet_matched-$dif_hora;
					
					
				
				if($dd_bet_mkt->num_rows() > 0){
					
					// dados atuais do mercado ja no banco de dados
					if($dd_bet_now[$b]->side == 'BACK'){
						$side_cash_out = "LAY";
					}
					if($dd_bet_now[$b]->side == 'LAY'){
						$side_cash_out = "BACK";
					}
					$dd_where_selection_atual = array(
						'id_mkt' => $bet_mkt_id,
						'selection_id' => $bet_selection_id,
						#'tipo' => $dd_bet_now[$b]->side
						'tipo' => $side_cash_out
						#'atual' => '1'
					);
					$this->db->where($dd_where_selection_atual);
					$this->db->order_by('dt_update','desc');
					$this->db->limit(1);
					$qr_odds_atual = $this->db->get('odds_mkt');
					$dd_selecion_atual = $qr_odds_atual->row();
					
					
					
					$bet_dd_mercado = $dd_bet_mkt->row()->selection_name;
					
					if($dd_bet_now[$b]->averagePriceMatched > 0){
					
						if($dd_bet_now[$b]->side == 'BACK'){
							$lucro = ($dd_bet_now[$b]->averagePriceMatched  * $dd_bet_now[$b]->sizeMatched) - $dd_bet_now[$b]->sizeMatched;
							#$balanco_atual = ($dd_selecion_atual->odd  * $dd_bet_now[$b]->sizeMatched) - $dd_bet_now[$b]->sizeMatched;
							#$balanco_atual =   $lucro - $balanco_atual;

							$balanco_atual =   ( $dd_selecion_atual->odd / $dd_bet_now[$b]->averagePriceMatched ) * $dd_bet_now[$b]->sizeMatched ;
							#$balanco_atual =   round($balanco_atual,2);

						}
						if($dd_bet_now[$b]->side == 'LAY'){
							$responsabilidade = ($dd_bet_now[$b]->sizeMatched * $dd_bet_now[$b]->averagePriceMatched) - $dd_bet_now[$b]->sizeMatched;
							$lucro = ($dd_bet_now[$b]->averagePriceMatched  * $dd_bet_now[$b]->sizeMatched) - $responsabilidade;
							# - $dd_bet_now[$b]->sizeMatched;	
							
							#$balanco_atual = ($dd_selecion_atual->odd  * $dd_bet_now[$b]->sizeMatched) - $dd_bet_now[$b]->sizeMatched;
							#$balanco_atual =  $balanco_atual - $lucro;
							$balanco_atual =   ( $dd_selecion_atual->odd / $dd_bet_now[$b]->averagePriceMatched ) * $dd_bet_now[$b]->sizeMatched ;


						}
					}
					#$lucro = number_format($lucro, 2, ',', '.');
				// calculos bet - comparativos
					
					#if($mkt_atual != $bet_mkt_id){ $tg ++;
				?>
					
					<div class="old_placed">
	                	<a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-<?=$tg?>" class="btn btn-primary" style='font-size:'>
	                        <?=$dd_evento->evento?> <?=$bet_dd_mercado?> 
	                        <span class="caret"></span>
	                    </a>
	                    <div id="sidebar-toggle-<?=$tg?>" class="collapse">
	                <? #} ?>  
						
	                        <div class="pad15A">
								<!--<p><?=$bet_mkt_id?> - <?=$mkt_atual?></p>-->
								<br />
	                    		<p>ID Bet: <?=$bet_idbet?> - 
	                    			<? if( $bet_status == "EXECUTION_COMPLETE"){ ?>
	                    				<strong style="color:green">Aposta realizada</strong>
	                    			<? } ?>
	                    			<? if( $bet_status == "EXECUTABLE"){ ?>
	                    				<strong style="color:red">Não Correspondida</strong>
	                    			<? } ?>
	                    			
	                    		</p>      
	                            <p><?=$tempo?> - <?=date("H:s:i")?></p>
	                            <p><div id="data-hora<?=$bet_idbet?>"> ** </div></p>
	                            <p><div id="diff<?=$bet_idbet?>"> ++ </div></p>
	                            <p><? #=print_r($dd_bet_now[$b])?></p>  
	                            <script type="text/javascript">
	                            	$(document).ready(function(){
	                            		//alert("COD INTERNO");


	                            		function diferencaHoras(horaInicial, horaFinal) 
										{ 
											//alert("opa vai");
											// Tratamento se a hora inicial é menor que a final 
											/*
											if( ! isHoraInicialMenorHoraFinal(horaInicial, horaFinal) )
											{ 
												aux = horaFinal; 
												horaFinal = horaInicial; 
												horaInicial = aux; 
											} 
											*/
											hIni = horaInicial.split(':'); 
											hFim = horaFinal.split(':'); 
											horasTotal = parseInt(hFim[0], 10) - parseInt(hIni[0], 10); 
											minutosTotal = parseInt(hFim[1], 10) - parseInt(hIni[1], 10); 
											if(minutosTotal < 0)
											{ 
												minutosTotal += 60; horasTotal -= 1; 
											} 
											horaFinal = horasTotal + ":" + minutosTotal; 
											return horaFinal; 
										}


	                            		// Função para formatar 1 em 01
										const zeroFill = n => {
											return ('0' + n).slice(-2);
										}

										// Cria intervalo
										const interval = setInterval( function()  {
											// Pega o horário atual
											const now = new Date();
											//console.log("now:: "+now);
											const now_gb = now.toLocaleString('en-GB', { timeZone: 'Europe/London' });

											//console.log("now GB:: "+now_gb);

											// Formata a data conforme dd/mm/aaaa hh:ii:ss
											/*const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());*/
											const dataHora = zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

											// Exibe na tela usando a div#data-hora
											//document.getElementById('data-hora').innerHTML = dataHora;
											$('#data-hora<?=$bet_idbet?>').html(dataHora);

											var data_bet = "<?=$tempo?>";

											 

											//var diferenca = diferencaHoras(data_bet,dataHora);
											var diferenca = diferencaHoras("<?=$tempo?>","<?=date("H:s:i")?>");
											$('#diff<?=$bet_idbet?>').html(diferenca+" min");
											//alert(diferenca);

											//var a = moment('21:03:55');//now
											//var b = moment('20:03:55');
											//var r = a.diff(b, 'hours');


											tconsole.log("<?=$tempo?>"+" -  "+"<?=date("H:s:i")?>"+" = "+diferenca); // 44700
											//console.log(a.diff(b, 'hours')) // 745
											//console.log(a.diff(b, 'days')) // 31
											//console.log(a.diff(b, 'weeks')) // 4


											//var diferenca = somaHora(tempo, dataHora);
											//$('#diff<?=$bet_idbet?>').html(diferenca); 
										}, 1000);




	                            	})
	                            </script>
	                            <? #=print_r($dd_bet_now[$b])?>
	                            <!--
	                            <p style="color:blue"><?=print_r($dd_bet_now[$b]->priceSize)?></p>
	                            
	                            <p style="color:green"><?=print_r($dd_bet_now[$b]->orderType)?></p>
	                            -->
	                        
	                            <div class="divider mrg15T mrg15B"></div>


	                            
	                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" style="border-radius:5px;">
	                                <thead>
	                                <tr>
	                                    <th>Aposta</th>
	                                    <th>Ordem</th>
	                                    <? if($dd_bet_now[$b]->side == 'BACK'){ ?>
	                                        <th>Valor</th>
	                                        <th>Lucro</th>
	                                    <? } ?>
	                                    <? if($dd_bet_now[$b]->side == 'LAY'){ ?>
	                                        <th>Respon.</th>
	                                        <th>Lucro</th>
	                                    <? } ?>
	                                    
	                                </tr>
	                                </thead>
	                                <tbody>
	                                <? if($dd_bet_now[$b]->side == 'BACK'){ $color_tr = '#99B9EF';}else{ $color_tr = "#F9A0EA"; } ?>
	                                <tr class="odd gradeA" style="background-color:<?=$color_tr?>;">
	                                    <td style="color:#000"><?=$dd_bet_now[$b]->side?>: <?=$bet_dd_mercado?></td>
	                                    <? if($dd_bet_now[$b]->side == 'BACK'){ ?>
	                                        <td style="color:#000"><?=$dd_bet_now[$b]->averagePriceMatched?></td>
	                                        <td style="color:#000"><?=$dd_bet_now[$b]->sizeMatched?></td>
	                                    <? } ?>   
	                                    <? if($dd_bet_now[$b]->side == 'LAY'){ ?>
	                                    	<td style="color:#000"><?=$dd_bet_now[$b]->averagePriceMatched?></td>
	                                        <td style="color:#000"><?=$responsabilidade?></td>
	                                    <? } ?>
	                                    <td style="color:#000"><?=number_format($lucro, 2, ',', '.')?></td>
	                                </tr>
	                                <tr class="odd gradeA" style="display: none">
	                                    <td>Cash Out</td>
	                                    <td><?=$dd_selecion_atual->odd?></td>
	                                    
	                                    <? if($dd_bet_now[$b]->side == 'BACK'){ ?>
	                                    <td>
	                                        <? if( $dd_selecion_atual->odd > $dd_bet_now[$b]->averagePriceMatched){ $color_balance = 'red';}else{ $color_balance = 'green'; } ?>
	                                        <strong style="color:<?=$color_balance?>"><?=$balanco_atual?></strong>
	                                    </td>    
	                                    <td style="color:#000"><?=round($lucro, 2);?></td>
	                                    <? } ?>    
	                                    
	                                    <? if($dd_bet_now[$b]->side == 'LAY'){ ?>
	                                    <td><?=$dd_bet_now[$b]->sizeMatched - $dd_bet_now[$b]->averagePriceMatched?></td>
	                                    <td>
	                                        <? if( $dd_selecion_atual->odd < $dd_bet_now[$b]->averagePriceMatched){ $color_balance = 'red';}else{ $color_balance = 'green'; } ?>
	                                        <strong style="color:<?=$color_balance?>"><?=($balanco_atual-$lucro)/2?></strong>
	                                    </td>    
	                                    <? } ?>    
	                                    
	                                    
	                                    
	                                </tr>                           
	                                    
	                                </tbody>
	                            </table>

                            
                            
                            
                            
                        </div>
						
                        
                    
                    <? # if($mkt_atual == $bet_mkt_id){ ?>
						
						<div class="example-box-wrapper" id="idbet<?=$bet_idbet?>">
    
										<!--<a href="https://www.betfair.com/exchange/plus/football/market/<?=$bet_mkt_id?>" target="_blank" class="btn btn-primary btn-lg btn-block">Cash Out **</a>-->
									<? if ($bet_status == "EXECUTABLE"){ ?>
									<button class="btn-danger btn-lg btn-block bt_cancel" data-type="<?=$dd_bet_now[$b]->side?>" data-price="<?=
								$bet_idbet?>"  data-title="<?=$bet_idbet?>" data-direction="<?=$bet_size;?>" data-size="<?=$bet_size;?>" title="<?=$bet_selection_id?>" value="<?=$bet_mkt_id?>">Cancelar</button>

											</div>
									<?  } ?>
							
									<? if ($bet_status == "EXECUTION_COMPLETE"){ ?>
									<!--
										<button class="btn-primary btn-lg btn-block bt_cashout" data-type="<?=$dd_bet_now[$b]->side?>" data-price="<?=
						$bet_price?>"  data-title="<?=$bet_price?>" data-direction="<?=$bet_size;?>" data-size="<?=$bet_size;?>" title="<?=$bet_selection_id?>" value="<?=$bet_mkt_id?>">Cash Out</button>
									-->
									</div>
									<?  } ?>


						<!--

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


								<ul class="progress-box" style="display:">
									<li>
										<div class="progress-title">
											Stake
											<b><?=$dd_bet_now[$b]->sizeMatched?></b>
										</div>
										<div class="progressbar-smaller progressbar" data-value="<?=$dd_bet_now[$b]->sizeMatched?>">
											<div class="progressbar-value bg-azure">
												<div class="progressbar-overlay"></div>
											</div>
										</div>
									</li>

									<? # if() ?>
									<? if( $dd_selecion_atual->odd > $dd_bet_now[$b]->averagePriceMatched){ ?>

									<li>
										<div class="progress-title">
											Red
											<b><?=abs($balanco_atual)?></b>
										</div>
										<div class="progressbar-smaller progressbar" data-value="<?=abs($balanco_atual)?>">
											<div class="progressbar-value bg-red">
												<div class="progressbar-overlay"></div>
											</div>
										</div>
									</li>

									<? }else{  ?>

									<li>
										<div class="progress-title">
											Green
											<b><?=$balanco_atual?></b>
										</div>
										<div class="progressbar-smaller progressbar" data-value="<?=$balanco_atual?>">
											<div class="progressbar-value bg-green"></div>
										</div>
									</li>

									<? } ?>

									<li>
										<div class="progress-title">
											Lucro
											<b><?=$lucro?></b>
										</div>
										<div class="progressbar-smaller progressbar" data-value="<?=$lucro?>">
											<div class="progressbar-value bg-blue-alt"></div>
										</div>
									</li>

								</ul>

						-->
						</div>
					<div class="clear"></div>


					
                </div>
				<? #} // x novo acordion ?>
		<? } ?>
	<? } ?>
    		
            <? 
			$mkt_atual = $bet_mkt_id;									  
			} // x for ?>
<? } // x foreach ?>



<script type="text/javascript">
	/** * Soma duas horas. * Exemplo: 12:35 + 07:20 = 19:55. */ 
function somaHora(horaInicio, horaSomada) 
{ 
	horaIni = horaInicio.split(':'); 
	horaSom = horaSomada.split(':'); 
	horasTotal = parseInt(horaIni[0], 10) + parseInt(horaSom[0], 10); 
	minutosTotal = parseInt(horaIni[1], 10) + parseInt(horaSom[1], 10); 

	if(minutosTotal >= 60){ 
		minutosTotal -= 60; horasTotal += 1; 
	} 
	horaFinal = completaZeroEsquerda(horasTotal) + ":" + completaZeroEsquerda(minutosTotal); 
	return horaFinal; 
}






</script>
