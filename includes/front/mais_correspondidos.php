<section class="columns popular-objects">
	<h2><span>Mais Correspondidos</span></h2>
	<?
	$qr_hots = $this->padrao_model->get_qr('odds_hot','desc','id',10);
	if($qr_hots->num_rows() > 0){
		foreach($qr_hots->result() as $hot){ 
			$dd_evento = $this->padrao_model->get_by_matriz('id_evento',$hot->id_partida,'partidas')->row();
			$dd_mkt = $this->padrao_model->get_by_matriz('id_mkt',$hot->id_mkt,'mercados')->row();
			$qr_selecao = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot->id_mkt."' AND selection_id = '".$hot->selection_id."' AND selection_name <> '' LIMIT 1")->row();
	?><div class="col6"><div class="img"><a href="<?=base_url()?>"><img src="<?=base_url()?>imagens/goltrader.jpg" alt=""></a></div><a href="#" title="<?=$dd_evento->evento?>"><?=$dd_mkt->name?></a><br><span class="price"><strong><?=$hot->tamanho?></strong> %</span></div>
	<? } ?>
<? } ?>			

</section>