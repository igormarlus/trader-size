<!doctype html>
<? if($this->uri->segment(1) == 'futebol' || $this->uri->segment(1) == 'futbol'  ){ ?>
<html dir="ltr" lang="pt-br">
<? } ?>

<? if($this->uri->segment(1) == 'bets'){ ?>
<html dir="ltr" lang="en-GB">
<? } ?>
  <head>
    <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->

  <link rel="stylesheet" href="<?=base_url()?>jack/node_modules/bootstrap/compilados/bootstrap.css">
   

  <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
  <link rel="stylesheet" href="<?=base_url()?>vendor-porto/simple-line-icons/css/simple-line-icons.min.css">

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Trader Size" />
  <meta name="autor" content="Trader Size" />

  <meta property="og:url" content="<?=base_url()?>futebol/campeonato/<?=url_title($dd->evento)?>/<?=$id_evento?>">
    <meta property="og:title" content=" HOTS Apostas Esportiva Online Futebol ">
  
    <meta property="og:site_name" content="Trader Size HOTS  Apostas  Bets Esportiva Online">
    <meta property="og:image" content="https://www.tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="https://tradersize.com/logo/logo-face.png">
    <meta property="og:image:width" content="240" />
    <meta property="og:image:height" content="206" />
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="HOTS.  ODDS Quentes Vejam onde estão as apostas no trader esportivo em Tempo Real. Acompanhe em modo de porcentagens às Apostas Online de Futebol. Saiba onde está o Dinheiro!">
    
    
    
  <meta charset="UTF-8">
 
    <title>HOTS  Apostas Esportiva Online</title>
      <meta name="title" content="HOTS  Bets Esportiva Online" />
      <meta name="description" content="Apostas Online Futebol campeonato/ | Saiba onde estão as Apostas Esportiva"  />

    <meta name="keywords" content="campeonato/,Betfair, trader, trader esportivo, Apostas Online Futebol,Apostas Esportiva Esportivas,Apostas Esportiva Futebol,<?=$dd_evento?>">
 



 


    <style type="text/css">
      .bt_mkt:active{
        background-color: #ffb900;
      }
      .bt_mkt:hover{
        background-color: #ffb900;
      }

      .bt_mkt .card-body:hover{
        background-color: #ff0000;
      }

      .bgbtmkt:hover{
        background-color: #ffb900;
      }

      .bgbtmkt:active{
        background-color: #ffb900;
      }

       

    </style>

    <script type="text/javascript">
    if('serviceWorker' in navigator) {
      navigator.serviceWorker.register('<?=base_url()?>ts.js').then(function() {
        console.log("Service Worker registered successfully");
      }).catch(function() {
        console.log("Service worker registration failed")
      });
    }
  </script>

  <!--  PARA MOBILE -->
  <!-- icones para mobile -->
  <link rel="icon" href="<?=base_url()?>imagens/icons/icon-32.png" sizes="32x32" />
  <link rel="icon" href="<?=base_url()?>imagens/icons/icon-178.png" sizes="192x192" />
  <link rel="icon" href="<?=base_url()?>imagens/icons/icon-178.png" alt="180.png">
  <meta name="msapplication-TileImage" content="<?=base_url()?>imagens/icons/icon-270.png">


  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>imagens/icons/icon-178.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url()?>assets2/images/icons/favicon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ECD078">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  </head>



  <body>
  
 

  
 
  


  

    <meta itemscope itemprop="name" rel="author"  content="Tradersize.com" />
    <meta itemscope itemprop="name" rel="name"  content="<?=url_title($dd->evento)?>" />
    <meta itemprop="name" content="Apostas Online Futebol">
    <meta itemprop="logo" content="<?=base_url()?>logo/logo.png">
    <meta itemscope itemprop="publisher" rel="publisher"  content="<?=$dd->dt?>" />



   
<?php # include("includes/2019/header.php");?>
<!-- NAVBAR END--->

<!-- BREADCRUMB -->
<style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .breadcrumb-item,.breadcrumb-item a{font-size: 11px}
  <? } ?>

</style>
      <div class="container">

        <nav aria-label="breadcrumb">

            <ol class="breadcrumb mb-0 bg-white">
              <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>futebol">Jogos</a></li>
              <li class="breadcrumb-item active">HOTS</li>
              
            </ol>

        </nav>

      </div>
<!-- END BREADCRUMB -->




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">

<!-- PAGE-TITLE-CONTAINER -->
        <div class="container">

          <div class="row fadeInLeft animated">

            <a class="text-secondary align-middle mr-2 ml-1 mt-1" href="#"><i class="fas fa-bell"></i></a><h2 style="font-size: 25px"><? #=str_replace(" v "," x ",$dd->evento)?></h2>

          </div>

        </div>
<!-- END PAGE TITLE-CONTAINER -->




<!-- CONTAINER MAIN -->
        <div class="container p-0">

          <div class="row">

            <div class="container pl-1 pr-1"> <!-- LINHA -->
              <div class="col-lg-12 col-sm-12 col-12 order-sm-1 border-top"></div>
            </div>

<!-- COLUNA 1-->
            <div class="col-lg-12 col-sm-12 col-md-12 order-xl-2 order-md-2 order-sm-3 pl-1 pr-1 text-justify">

<!-- CARD PADRÃO LETREIRO DE JOG -->
             
<!-- END CARD PADRÃO --LETREIRO--DE--JOGO -->




<!--CARD MODELO -->
                  <? #include("includes/2019/menu_competicoes.php"); ?>

                <?  
               # }
                ?>

            
<!--END CARD MODELO -->

<!--CARD MODELO -->

<!--
              <div class="card my-1">

                <div class="card-body">Área 3</div>

              </div>

              <div class="card my-1">

                <div class="card-body">Área 4</div>

              </div>
-->

<!--END CARD MODELO -->
            </div>
<!-- END COLUNA-1 -->

<!-- COLUNA 2 -->
            <div class="col-lg-12 col-sm-12 col-md-12 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">

              <div class="card mt-3 border-white">

                <!-- 16:9 aspect ratio 
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7zVYuXfD86I"></iframe>
                </div>
              -->

              </div>

<!--CARD MODELO -->
              <!-- HOTS -->


              <div class="card my-1 slideInIp animated">

                <div class="card-header zoomIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#" id="tit_mkt_now" style="font-weight: bold;"> HOTS</a>
                    </li>
                  </ul>
                </div>

                <table cellpadding="0" cellspacing="0" border="0" class="table  table-striped table-bordered table-hover table-fixed tb_rel" data-order='[[ 0, "desc" ]]' data-page-length='50' id="tb_rel">
                                <thead class="thead-warning">
                                <tr>
                                    <th  data-class-name="priority">Regsitro/Atualização</th>
                                    <th>Evento</th>
                                    <th>Mercado</th>
                                    <th>Seleção</th>
                                    <th>Side</th>
                                    <th>Status</th>
                                    <th>Odd</th>
                                    <th>Porcentagem</th>
                                    <th>Bot</th>
                                    <th>Resultado</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? if($hots->num_rows() > 0){ ?>
                                  <? foreach($hots->result() as $dd){ $matched = 0; ?>
                                        <?
                                        $dt_reg = $dd->dt;
                                        $hot_id_mkt = $dd->id_mkt;
                                        $hot_selection = $dd->selection_id;
                                        $hot_odd = $dd->odd;
                                        $hot_volume = $dd->tamanho; 
                                        
                                        $qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> '' LIMIT 1");
                                        $hot_selecao = mysql_fetch_assoc($qr_selecao);
                                        
                                        $qr_evento = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$dd->id_partida."'");
                                        $hot_evento = mysql_fetch_assoc($qr_evento);
                                        
                                        $qr_mercado = mysql_query("SELECT * FROM mercados WHERE id_mkt = '".$hot_id_mkt."'");
                                        $hot_mercado = mysql_fetch_assoc($qr_mercado);
                                        
                                        
                                        if($dd->view == '0'){ 
                                          $dd_view = array('view' => '1');
                                          $this->db->where('id',$dd->id);
                                          $this->db->update('odds_hot' , $dd_view);
                                          $bg_tr = '#ffb900'; 
                                          
                                        }else{ 
                                          $bg_tr = '#fff'; 
                                        }
                                        
                                        if(mysql_num_rows($qr_selecao) > 0){
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
                                        <tr>
                                          <td><?=$dt_reg?></td>
                                          <td>
                                            <a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bets/jogo_by_mkt/<?=$dd->id_mkt?>">
                                              <? if($hot_evento['evento'] == ''){ ?>
                                                Aguardando dados...
                                              <? }else{ ?>
                                                <?=$hot_evento['evento']?>
                                              <? } ?>
                                            </a>
                                          </td>
                                          
                                          <td><?=$hot_mercado['name']?> </td>
                                          <td class="table-active"><?=$hot_selecao['selection_name']?></td>
                                          <td><?=$dd->side?></td>
                                          <td></td>
                                          <td><?=$hot_odd?></td>
                                          <td><?=$hot_volume?>%</td>
                                          <td><?=$dd->resultado?></td>
                                          <!--<td><?=$matched?>  <? #=$hot_selecao['id']?></td> -->
                                          <td style="">
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
                                              
                                      </tr>
                                <? } } // x if e foreach  ?>

                                </tbody> 
                </table>

                <div class="">
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-striped table-bordered table-hover table-fixed tb_rel" data-order='[[ 0, "desc" ]]' data-page-length='50' id="">
                                <thead class="thead-warning">
                                <tr>
                                    <th  data-class-name="priority">Regsitro/Atualização</th>
                                    <!--<th>Início</th>-->
                                    <th>Evento</th>
                                    <th>Mercado</th>
                                    <th>Seleção</th>
                                    <th>Side</th>
                                    <th>Status</th>
                                    <th>Odd</th>
                                    <th>Porcentagem</th>
                                    <th>Bot</th>
                                </tr>
                                </thead>
                                <tbody>
                                <? if($hots->num_rows() > 0){ ?>
                    
            
                              <? foreach($hots->result() as $dd){ $matched = 0; ?>
                    <? #$t=0;  foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$meu->id_competicao) as $jogo) { $t++; ?>
                                            
                      
                                            <?
                                            # if(mysql_num_rows($qr_num) > 0){
                        #while($dd = mysql_fetch_assoc($qr_num)){
                          $dt_reg = $dd->dt;
                          $hot_id_mkt = $dd->id_mkt;
                          $hot_selection = $dd->selection_id;
                          $hot_odd = $dd->odd;
                          $hot_volume = $dd->tamanho; 
                          
                          $qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> '' LIMIT 1");
                          $hot_selecao = mysql_fetch_assoc($qr_selecao);
                          
                          $qr_evento = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$dd->id_partida."'");
                          $hot_evento = mysql_fetch_assoc($qr_evento);
                          
                          $qr_mercado = mysql_query("SELECT * FROM mercados WHERE id_mkt = '".$hot_id_mkt."'");
                          $hot_mercado = mysql_fetch_assoc($qr_mercado);
                          
                          
                          if($dd->view == '0'){ 
                            $dd_view = array('view' => '1');
                            $this->db->where('id',$dd->id);
                            $this->db->update('odds_hot' , $dd_view);
                            $bg_tr = '#ffb900'; 
                            
                          }else{ 
                            $bg_tr = '#fff'; 
                          }
                          
                          if(mysql_num_rows($qr_selecao) > 0){
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
                          <tr class="tr_hots table-primary">
                          
                            <td>
                            
                            <?=$dt_reg?>
                                                        
                                                        <?
                            /*
                            $data_eve = substr($hot_evento['inicio'],0,10);
                            $hora_eve = substr($hot_evento['inicio'],11,8);
                            ?>
                            <?=$data_eve?> <? #=$hora_eve?>
                            <br>
                            <?
                            $agora = date('H:i:s');
                            #echo $agora;
                            $date_time  = new DateTime( $hora_eve );
                            $diff       = $date_time->diff( new DateTime( $agora ) );       
                            echo $diff->format( '%H:%i:%S' ); // 05:10:00
                            */
                            ?>
                                                        
                                                        
                            </td>
                            <!-- <td>
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
                            </td>-->
                            <td>
                              <a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bets/jogo_by_mkt/<?=$dd->id_mkt?>">
                                <? if($hot_evento['evento'] == ''){ ?>
                                  Aguardando dados...
                                <? }else{ ?>
                                  <?=$hot_evento['evento']?>
                                <? } ?>
                              </a>
                                                           
              <!--               
                                         <a href="https://www.betfair.com/exchange/plus/football/market/<?=$hot_id_mkt?>" target="_blank">Betfair</a>-->
                                                     
                                                     
                            </td>
                            
                            <td><?=$hot_mercado['name']?> </td>
                            <td class="table-active"><?=$hot_selecao['selection_name']?>  <? #=mysql_num_rows($qr_selecao)?>  <? #=$hot_id_mkt.' ## '.$hot_selection?> </td>
                                                        <td><?=$dd->side?></td>
                                                        <td>
                                                        <!--<a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$hot_id_mkt?>">
                             Bet
                             </a>-->
                             <? #=$hot_id_mkt." -- ".$hot_selection?>
                             </td>
                            <td><?=$hot_odd?></td>
                            <td><?=$hot_volume?>%</td>
                            <td><?=$dd->resultado?></td>
                            <!--<td><?=$matched?>  <? #=$hot_selecao['id']?></td> -->
                            <td style="display: none;">
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
                                <!--                          
                              <td style="display: none;">
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
                            </td>-->
                            <? } ?>
                            
                            
                          </tr>
                          <? #} // x while ?>
                      <? #} // x if ?>   
                      
                      
                                            
                                            
                                            
                          <? } ?>
                                
                      <? } // x foreach ?>
                                                
                                <? #} // x if num_rows()  ?>
                               
                                </tbody>
                                </table>
                              </div>
                <!-- XXXXXXXXXXXXXXXXXXXXX IMPORTACAO DO CODIGO -->

               
                  

   

                <div class="card-body fadeInLeft animated">
                    
                    <p>Nossos Bots (Robores) estão a todo momento visitando o jogos e retornando os mercados onde tem boas correspondências e Odds a partir de @1.3, ajudando e auxiliando as tomadas de decisões.</p>


                </div>

                

              </div>

              <!--CARD MODELO -->

             

<!--END CARD MODELO -->


              
              
              

              

<!--END CARD MODELO -->



<!--CARD MODELO -->
<!--
              <div class="card my-1">

                <div class="card-body">Área 1.3</div>

              </div>



              <div class="card my-1">

                <div class="card-body">Área 1.4</div>

              </div>
-->
<!--END CARD MODELO -->

            </div>






        </div>

<!-- END CONTAINER MAIN -->

      </div>

<!-- END CONTAINER SECTION -->


<?php include("includes/2019/footer.php");?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="<?=base_url()?>jack/node_modules/jquery/dist/jquery.js"></script>
    
    <script src="<?=base_url()?>jack/node_modules/popper.js/dist/umd/popper.js"></script>
  
    <script src="<?=base_url()?>jack/node_modules/bootstrap/dist/js/bootstrap.js"></script>
    -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  



<script>
  $(document).ready(function(){

    // DataTable
  var table = $('#tb_rel').DataTable();


  })
</script>


  </body>
</html>