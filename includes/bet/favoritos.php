<div class="sb-slidebar bg-black sb-left sb-style-overlay">
    <div class="scrollable-content scrollable-slim-sideba">
        <div class="pad10A">
            <div class="divider-header"><strong>Favoritos</strong> <button class="sb-close glyph-icon icon-dedent">Close</button></div>
            
            <!-- <div class="divider-header">Ao Vivo</div>-->
            
            <ul class="chat-box">
            <?  
				$qr_fav = $this->padrao_model->get_by_matriz('id_user',$this->session->userdata('id'),'bet_favoritos');
				#echo $qr_fav->num_rows();
				if($qr_fav->num_rows() > 0){
					foreach($qr_fav->result() as $dd_fav){
						$dd_partida = $this->padrao_model->get_by_matriz('id_evento',$dd_fav->id_evento,'partidas');
						
						$inicio = $dd_partida->inicio;
						$date_time  = new DateTime( date('Y-m-d h:i:s') );
						$diff       = $date_time->diff( new DateTime( $inicio ) );				
						$qt_tempo = $diff->format( '%H:%i:%S' ); // 05:10:00
						// remover eventos do favoritos
						if($dd_partida->num_rows() == 0){
							$this->db->where('id',$dd_fav->id);
							$this->db->delete('bet_favoritos');
							//echo "Deletar";
						}
						
			?>
                        <li>
                            <div class="status-badge">
                                <img class="img-circle" width="40" src="<?=base_url()?>img/bola_icon.png" alt="">
                                <div class="small-badge bg-green"></div>
                            </div>
                            <b>
                            	<a target="_blank" href="<?=base_url()?>bet/betjogo/<?=$dd_fav->id_evento?>/<?=$dd_fav->id_mkt?>">
	                                <?=$dd_partida->row()->evento?> 
                                </a>
                            </b>
                            
                            <p>
							<? #=$this->bet_model->getMarket_type($APP_KEY, $SESSION_TOKEN, $dd_fav->id_mkt)?>
                            <?
                            
							?>
                            <?=$this->padrao_model->get_by_matriz('id_mkt',$dd_fav->id_mkt,'mercados')->row()->name?>
                            </p>
                            
                            
                            <a href="<?=base_url()?>bet/betjogo/<?=$dd_fav->id_evento?>/<?=$dd_fav->id_mkt?>" class="btn no-border radius-all-100 btn-black"><i class="glyph-icon icon-check"></i></a>
                        </li>
                    <? } ?>
                <? } ?>
                
            </ul>
            <!--
            <div class="divider-header">Pré-Jogo</div>
            <ul class="chat-box">
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="<?=base_url()?>assets2/image-resources/people/testimonial6.jpg" alt="">
                        <div class="small-badge bg-orange"></div>
                    </div>
                    <b>
                        Jose Kramer
                    </b>
                    <p>Equal blame belongs to those...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="<?=base_url()?>assets2/image-resources/people/testimonial7.jpg" alt="">
                        <div class="small-badge bg-orange"></div>
                    </div>
                    <b>
                        Dan Garcia
                    </b>
                    <p>Weakness of will, which is same...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
                <li>
                    <div class="status-badge">
                        <img class="img-circle" width="40" src="<?=base_url()?>assets2/image-resources/people/testimonial8.jpg" alt="">
                        <div class="small-badge bg-orange"></div>
                    </div>
                    <b>
                        Edward Bridges
                    </b>
                    <p>These cases are perfectly simple...</p>
                    <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                </li>
            </ul>
            -->
        </div>
    </div>
</div>