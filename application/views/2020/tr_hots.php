<? if($hots->num_rows() > 0){ include('includes/mysqli_con.php');  ?>
  <? foreach($hots->result() as $dd){ $matched = 0; ?>
        <?
        mysqli_query($con,"UPDATE odds_hot SET view = 1 WHERE id = ".$dd->id." ") or die(mysqli_error($con));
        $dt_reg = $dd->dt;
        $hot_id_mkt = $dd->id_mkt;
        $hot_selection = $dd->selection_id;
        $hot_odd = $dd->odd;
        $hot_volume = $dd->tamanho; 
        include("includes/mysqli_con.php");
        $qr_selecao = mysqli_query($con,"SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> '' LIMIT 1");
        $qr_sel_num = mysqli_num_rows($qr_selecao);
            $tb = 1;



        if($qr_sel_num == 0){
          
            $qr_selecao = mysqli_query($con,"SELECT * FROM odds_mkt_bk WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> '' LIMIT 1");
            $qr_sel_num = mysqli_num_rows($qr_selecao);
            $tb = 2;
        }

        $hot_selecao = mysqli_fetch_assoc($qr_selecao);
        
        $qr_evento = mysqli_query($con,"SELECT * FROM partidas WHERE id_evento = '".$dd->id_partida."'");
        $hot_evento = mysqli_fetch_assoc($qr_evento);
        
        $qr_mercado = mysqli_query($con,"SELECT * FROM mercados WHERE id_mkt = '".$hot_id_mkt."'");
        $hot_mercado = mysqli_fetch_assoc($qr_mercado);
        $mercado = str_replace("Over/Under","",$hot_mercado['name']);
        $class_mkt = str_replace(" ","",$mercado);
        $class_mkt = str_replace(".","",$class_mkt);
        /*
        if($dd->view == '0'){ 
          $dd_view = array('view' => '1');
          $this->db->where('id',$dd->id);
          $this->db->update('odds_hot' , $dd_view);
          $bg_tr = '#ffb900'; 
          
        }else{ 
          $bg_tr = '#fff'; 
        } */
        
        if(mysqli_num_rows($qr_selecao) > 0){
          #$matched = number_format($hot_selecao['total_matched'], 2, ',', '.');
          #$matched = $hot_selecao['total_matched'];
          
          
          if($hot_selecao['total_matched']){
            $matched = number_format($hot_selecao['total_matched'], 2, ',', '.');
          }else{
            $matched = (float) $hot_selecao['total_matched'];
          }
          
          
        }else{
          $matched = 0;
        }
        ?>
        <tr class="all_mkt bt-warning <?=$class_mkt?>">
          <td>
            <strong style="font-size: 12px"><?=$dt_reg?></strong>
            <? if($this->session->userdata('id')){ ?>
              <br>
              <a href="<?=base_url()?>futebol/rem_hots/<?=$dd->id?>">
              Deletar</a>
            <? } ?>
          </td>
          <td><?=$hot_evento['data_betfair']?></td>
          <td>
            <a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bets/jogo_by_mkt/<?=$dd->id_mkt?>">
              <? if($hot_evento['evento'] == ''){ ?>
              <? $qr_selection = $this->padrao_model->get_by_matriz('id_selection',$dd->selection_id,'selections');  ?>
              (<?=$qr_selection->num_rows()?>)
              <? if($qr_selection->num_rows() > 0){?>
          			<?=$qr_selection->row()->name?>
          		<? }else{ ?>
                	Aguardando dados...
                <? } ?>
              <? }else{ ?>
                <?=$hot_evento['evento']?>
              <? } ?>
            </a>

          </td>
          
          <td><?=$mercado?></td>
          <td class="table-active">
          	<strong style="color:#ffb900">
          	<? #=$hot_selecao['selection_name']?>
          	<?
          	// verifica selection_id
          	$qr_selecao_existe = $this->padrao_model->get_by_matriz('id_selection',$hot_selection,'selections');
          	if($qr_selecao_existe->num_rows() > 0){?>
          		<?=$qr_selecao_existe->row()->name?>
          	<? }else{ ?>
          	(<?=$hot_selection?>)
          	<? } ?>
          		
          	</strong></td>


          <td>
          	<? if($live == '33'){ ?>
          	<? $qr_type = $this->padrao_model->get_by_matriz('id_selection',$dd->selection_id,'selections_types')  ?>
          		<? if($qr_type->num_rows() > 0){ ?>
          			<?=$qr_type->row()->tipo;?> (<?=$qr_type->row()->odd;?>)
          		<? } ?>
          	<? }else{ ?>
          		<?=$dd->side?>
          	<? } ?>
          		
          	</td>
          <td><a href="https://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$dd->id_mkt?>" target="_blank">Apostar na Betfair</a></td>
          <td><?=$hot_odd?></td>
          <td><strong style="color: #ffb900"><?=$hot_volume?>%</td>
          <td title="<?=$tb?>">
          	<?
          	
            $this->db->where('id_mercado',$dd->id_mkt);
            $qr_resultado = $this->db->get('mkt_result');
            if( $qr_resultado->num_rows() > 0 ){
            	$sel_result = $qr_resultado->row()->winner;
              echo "<strong class='badge badge-success'>".$qr_resultado->row()->winner."</strong> (".$qr_resultado->row()->id_selection.")";
            }else{
            	$sel_result = "";
              echo "Aberto";
            }
            
            ?>

            <?
            /*
            $this->db->where('id_mercado',$dd->id_mkt);
            $qr_resultado = $this->db->get('mkt_result');
            if( $qr_resultado->num_rows() > 0 ){
              $sel_result = $qr_resultado->row()->winner;
              #echo "<strong style='color:green'>".$qr_resultado->row()->winner."</strong>";
              #echo "Fechado";
            }else{
              $sel_result = "";
              #echo "Aberto";
            }
            */
            ?>

          	<? #=$dd->resultado?>
          		

          	</td>
          <!--<td><?=$matched?>  <? #=$hot_selecao['id']?></td> -->
          <td style="">

<div style="display: none">

          	<?  if($sel_result != ""){ ?>
            
                <? if( $hot_selecao['selection_name'] ==  $sel_result && $dd->side == "back" ){ ?>

                  <div class="btn btn-alt btn-hover btn-success">
                         <span>GREEN</span>
                   </div>
<? } ?>

            <?  if($hot_selecao['selection_name'] ==  $sel_result && $dd->side == "lay"){ ?>
            	<div class="btn btn-alt btn-hover btn-danger">
                     <span>Red</span>
               </div>
            
            <? } ?>

<?  if($hot_selecao['selection_name'] !=  $sel_result && $dd->side == "back"){ ?>
              <div class="btn btn-alt btn-hover btn-danger">
                  <span>RED</span>
              </div>
            <? } ?>

            <?  if($hot_selecao['selection_name'] !=  $sel_result && $dd->side == "lay"){ ?>
              <div class="btn btn-alt btn-hover btn-success">
                     <span>GREEN</span>
               </div>
            <? }  ?>







            <? }else{ ?>
            Aguardando...
            <? } ?>

        </div>


            </td>
              
      </tr>
<? } }else{ echo "0"; } // x if e foreach  ?>