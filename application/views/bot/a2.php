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

  <meta property="og:url" content="<?=base_url()?>bot/a2">
    <meta property="og:title" content=" BOT A2  ">
  
    <meta property="og:site_name" content="Trader Size HOTS  Apostas  Bets Esportiva Online">
    <meta property="og:image" content="https://tradersize.com/logo/logo-face.png">
    <meta property="og:image:type" content="image/png">
    <!--
    <meta property="og:image:width" content="240"> 
    <meta property="og:image:height" content="206"> 
    -->
    <meta property="og:type" content="website">
    
    <meta property="og:description" content="HOTS.  A2 ">
    
    
    
  <meta charset="UTF-8">
 
    <title>BOT A2 <?=$mkt?> <?=date("d-m-Y")?> </title>
      <meta name="title" content="BOT 2" />
      <meta name="description" content=""  />

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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">




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


 <!-- BODOG -->
              <div class="card my-1 bounce,Up animated" style="display: none;">

              
                <div class="card-body fadeInLeft animated">
                  <p class="mt-2 mb-2" align="center">


                    <?  if($this->agent->is_mobile()){ ?>
                    <a href="https://record.bettingpartners.com/_DzHLrGq3dIG2a4LA_kpO2MohXDijJpw6/1/"  target="%TARGET%%"><img src="https://cdn4.imagestore.lv/bodog/affiliates/vivo/Vivo_300x250-pt.gif" width="%WIDTH%%" height="%HEIGHT%%" alt="" style="border:none;"/></a>
                    <? }else{ ?>

                   <a href="https://record.bettingpartners.com/_DzHLrGq3dIG2a4LA_kpO2L7OSOjP4e24/1/"  target="%TARGET%%"><img src="https://cdn4.imagestore.lv/bodog/affiliates/vivo/Vivo_728x90-pt.gif" width="%WIDTH%%" height="%HEIGHT%%" alt="" style="border:none;"/></a>

                   <?  } ?>
                    </p>
                  </p>
                </div>

                

              </div>

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


           <div class="col-lg-12 col-sm-12 col-md-12 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">
                    <div class="card mt-3 border-white">

                      <? if($status == '0'){ ?>
                            <h1>Mercados Abertos
                            <a class="nav-link " href="<?=base_url()?>bot/a2/<?=$mkt?>/1" id="tit_mkt_now" style="font-weight: bold;font-size: 16px"> <span class="label label-success"></span>Ir para Fechados</a>
                            </h1>
                          <? } ?>

                          <? if($status == '1'){ ?>
                            <h1>Mercados Fechados
                            <a class="nav-link " href="<?=base_url()?>bot/a2/<?=$mkt?>/0" id="tit_mkt_now" style="font-weight: bold;font-size: 16px"> <span class="label label-warning"></span>Ir para Abertos</a>
                            </h1>
                          <? } ?>

                    </div>
                </div>


              <div class="card my-1 slideInIp animated">

                <div class="card-header zoomIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <? if($mkt == "all"){ $class_active = 'active'; }else{ $class_active = ''; } ?>
                      <a class="nav-link <?=$class_active?>" href="<?=base_url()?>bot/a2/all/<?=$status?>" id="tit_mkt_now" style="font-weight: bold;"> BOT A2</a>
                    </li>

                    <li class="nav-item">
                      <? if($mkt == "0.5"){ $class_active = 'active'; }else{ $class_active = ''; } ?>
                      <a class="nav-link <?=$class_active?>" href="<?=base_url()?>bot/a2/0.5/<?=$status?>" id="tit_mkt_now" style="font-weight: bold;"> OVER/UNDER 0.5</a>
                    </li>

                    <li class="nav-item">
                      <? if($mkt == "0.5ht"){ $class_active = 'active'; }else{ $class_active = ''; } ?>
                      <a class="nav-link <?=$class_active?>" href="<?=base_url()?>bot/a2/0.5ht/<?=$status?>" id="tit_mkt_now" style="font-weight: bold;"> OVER/UNDER HT 0.5</a>
                    </li>

                    <li class="nav-item">
                      <? if($mkt == "1.5ht"){ $class_active = 'active'; }else{ $class_active = ''; } ?>
                      <a class="nav-link <?=$class_active?>" href="<?=base_url()?>bot/a2/1.5ht/<?=$status?>" id="tit_mkt_now" style="font-weight: bold;"> OVER/UNDER HT 1.5</a>
                    </li>

                    

                    <li class="nav-item">
                      <? if($mkt == "1.5"){ $class_active = 'active'; }else{ $class_active = ''; } ?>
                      <a class="nav-link <?=$class_active?>" href="<?=base_url()?>bot/a2/1.5/<?=$status?>" id="tit_mkt_now" style="font-weight: bold;"> OVER/UNDER 1.5</a>
                    </li>

                    <li class="nav-item">
                      <? if($mkt == "2.5"){ $class_active = 'active'; }else{ $class_active = ''; } ?>
                      <a class="nav-link <?=$class_active?>" href="<?=base_url()?>bot/a2/2.5/<?=$status?>" id="tit_mkt_now" style="font-weight: bold;"> OVER/UNDER 2.5</a>
                    </li>

                    <li class="nav-item">
                      <? if($mkt == "3.5"){ $class_active = 'active'; }else{ $class_active = ''; } ?>
                      <a class="nav-link <?=$class_active?>" href="<?=base_url()?>bot/a2/3.5/<?=$status?>" id="tit_mkt_now" style="font-weight: bold;"> OVER/UNDER 3.5</a>
                    </li>
                    
                  </ul>
                </div>
                <br><br>

                <div class="content">

               <div class="table-responsive">
                                      
                <table cellpadding="0" cellspacing="0" border="0" class="table  table-striped table-bordered table-hover table-fixed tb_rel" data-order='[[ 0, "desc" ]]' data-page-length='500' id="tb_rel">
                                <thead class="thead-primary">
                                <tr class="table-primary">
                                    <th  data-class-name="priority">Regsitro/Atualização</th>
                                    
                                    <th>Inicio</th>
                                    <th>Evento</th>
                                    <th>Mercado</th>
                                    <!--<th>ID MKT</th> -->
                                    <th>Seleção</th>
                                    <th>Side</th>
                                    <!--<th>Status</th>-->
                                    <th>Odd</th>
                                    <th>Porcentagem</th>
                                    <th>Winner</th>
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

                                        #if($status == 0){
                                          
                                            $qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> '' LIMIT 1");
                                            $qr_sel_num = mysql_num_rows($qr_selecao);
                                            $tb = 1;
                                        #}

                                        if($qr_sel_num == 0){
                                          
                                            $qr_selecao = mysql_query("SELECT * FROM odds_mkt_bk WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> '' LIMIT 1");
                                            $qr_sel_num = mysql_num_rows($qr_selecao);
                                            $tb = 1;
                                        }

                                        $qr_selecao_bk = mysql_query("SELECT * FROM odds_mkt_bk WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' AND selection_name <> '' LIMIT 1");
                                            $qr_sel_num_bk = mysql_num_rows($qr_selecao_bk);
                                            if($qr_sel_num_bk == 0){
                                              $tb = 2;
                                            }

                                        $hot_selecao = mysql_fetch_assoc($qr_selecao);
                                        
                                        $qr_evento = mysql_query("SELECT * FROM partidas WHERE id_evento = '".$dd->id_partida."'");
                                        $hot_evento = mysql_fetch_assoc($qr_evento);
                                        
                                        $qr_mercado = mysql_query("SELECT * FROM mercados WHERE id_mkt = '".$hot_id_mkt."'");
                                        $hot_mercado = mysql_fetch_assoc($qr_mercado);
                                        $mercado = str_replace("Over/Under","",$hot_mercado['name']);
                                        
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
                                          <td style="font-size:">
                                            <?=$dt_reg?>
                                            <? if($this->session->userdata('id')){ ?>
                                              <br>
                                              <a href="<?=base_url()?>bot/rem_hots_a2/<?=$dd->id?>/<?=$mkt?>" target="_blank">
                                              Deletar</a>
                                            <? } ?>
                                          </td>
                                          <td><?=$hot_evento['data_betfair']?></td>
                                          <td>
                                            <a target='_blank' title="Ver na Betfair" href="https://www.betfair.com/exchange/plus/football/market/<?=$dd->id_mkt?>">
                                              <? if($hot_evento['evento'] == ''){ ?>
                                                Aguardando dados...
                                              <? }else{ ?>
                                                <?=$hot_evento['evento']?>
                                              <? } ?>
                                            </a>

                                          </td>
                                          
                                          <td><?=$mercado?> <br/> <?=$dd->id_mkt?> </td>
                                          <!--<td><?=$dd->id_mkt?></td> -->
                                          <td class="table-active"><?=$hot_selecao['selection_name']?></td>
                                          <td><?=$dd->side?></td>
                                          <!--
                                          <td>
                                            

                                          </td>
                                        -->
                                          <td><?=$hot_odd?></td>
                                          <td><?=$hot_volume?>%</td>
                                          <td><?=$dd->resultado?> ** (<?=$tb?>) </td>
                                          <td style="">
                                            <?
                                            $this->db->where('id_mercado',$dd->id_mkt);
                                            $qr_resultado = $this->db->get('mkt_result');
                                            if( $qr_resultado->num_rows() > 0 ){
                                              $sel_result = $qr_resultado->row()->winner;
                                              #echo "<strong style='color:green'>".$qr_resultado->row()->winner."</strong>";
                                             # echo "Fechado";
                                            }else{
                                              $sel_result = "";
                                              #echo "Aberto";
                                            }
                                            ?>
    <?#=$sel_result?>
                                            <? if($sel_result != ""){ ?>
                                            
                                                <? if( $hot_selecao['selection_name'] ==  $sel_result){ ?>

                                                  <div class="btn btn-alt btn-hover btn-success">
                                                         <span>GREEN</span>
                                                   </div>
                                                <? }else{ ?>
                                                    <div class="btn btn-alt btn-hover btn-danger">
                                                        <span>REDD</span>
                                                    </div>
                                                <? } ?>

                                            <? }else{ ?>
                                            Aguardando...
                                            <? } ?>
                                            </td>
                                              
                                      </tr>
                                <? } } // x if e foreach  ?>

                                </tbody> 
                </table>
              </div>
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

  <!-- EXPORTAR -->
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

  



<script>
  $(document).ready(function(){

//alert("OK 2");
    $('#tb_rel').DataTable( {
        fixedHeader: true, // fixar header ta table
        colReorder: true, // re orgenar as tabelas pelos campos
        dom: 'Bfrtip', // utilitario para o botao de exportação
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

    // DataTable
   /* 
  var table = $('#tb_rel').DataTable(function(){

    $(".sel_status").change(function(){
      var id = $(this).attr('id');
      var val = $(this).val();
      $.get("<?=base_url()?>botbet/set_status_hot/"+id+"/"+val , function(){
        //alert("FOI");
      })
     // alert(id+" = "+val);
    })
  });
  */


  $(".sel_status").change(function(){
    var id = $(this).attr('id');
    var val = $(this).val();
    $.get("<?=base_url()?>botbet/set_status_hot/"+id+"/"+val , function(){
      //alert("FOI");
    })
   // alert(id+" = "+val);
  })

  })
</script>


  </body>
</html>