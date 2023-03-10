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

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 
    
  <meta charset="UTF-8">
 
    <title>  Histórico de Corridas</title>
   
   
    <style type="text/css">
      .bt_mkt:active{
        background-color: #ffb900;
      
}      .bt_mkt:hover{
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

 <!--
<script src="<?=base_url()?>highcharts/code/highcharts-3d.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>
-->

<script src="<?=base_url()?>highcharts/code/highcharts.js"></script>

<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />


  </head>



  <body>
  



   
<?php #include("includes/2019/header.php");?>
<!-- NAVBAR END--->

<!-- BREADCRUMB -->
<style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .breadcrumb-item,.breadcrumb-item a{font-size: 11px}
  <? } ?>

</style>

<!-- END BREADCRUMB -->




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">




<!-- CONTAINER MAIN -->
        <div class="container p-0">

          <div class="row">

            <div class="container pl-1 pr-1"> <!-- LINHA -->
              <div class="col-lg-12 col-sm-12 col-12 order-sm-1 border-top"></div>
            </div>


<!-- END COLUNA-1 -->

    


<!-- COLUNA 2 -->
            <div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">



              <div class="row" id="topo"></div>

              

             
              
            <div class="card my-1 slideInUp animated" >

                <div class="card-header flipIn animated">

                  <h2>Filtros <?=$ordem?>º</h2>

                  <form action="<?=base_url()?>horses/favoritos" method="post" style=''>

                    <? if(isset($_POST['tabela'])){ ?>
                      <h3><?=$_POST['tabela']?></h3>
                    <? } ?>

                    <div class="form-group">
                      <select name="tabela" class="form-text text-muted form-control">
                        <? if(isset($_POST['tabela'])){ ?>
                        <h3><?=$_POST['tabela']?></h3>
                          

                          
                          <? if($_POST['tabela'] == 'corridas_cavalos_2020' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_2020" <?=$sel_tabela?> >GB 2020</option>


                          <? if($_POST['tabela'] == 'corridas_cavalos_2019' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_2019" <?=$sel_tabela?> >GB 2019</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2018' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2018" <?=$sel_tabela?> >GB 2018</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2017' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2017" <?=$sel_tabela?> >GB 2017</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2016' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2016" <?=$sel_tabela?> >GB 2016</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2015' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2015" <?=$sel_tabela?> >GB 2015</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2014' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2014" <?=$sel_tabela?> >GB 2014</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2013' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2013" <?=$sel_tabela?> >GB 2013</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2012' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2012" <?=$sel_tabela?> >GB 2012</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2011' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2011" <?=$sel_tabela?> >GB 2011</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2010' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2010" <?=$sel_tabela?> >GB 2010</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2009' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2009" <?=$sel_tabela?> >GB 2009</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_2008' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_2008" <?=$sel_tabela?> >GB 2008</option>


                          <!-- ################## PLACES #################### -->

                          <option value=""> ------------------- PLACES --------------</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2020' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_place_2020" <?=$sel_tabela?> >GB 2020</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2019' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_place_2019" <?=$sel_tabela?> >GB 2019</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2018' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2018" <?=$sel_tabela?> >GB 2018</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2017' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2017" <?=$sel_tabela?> >GB 2017</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2016' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2016" <?=$sel_tabela?> >GB 2016</option>

                          <!-- -->
                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2015' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2015" <?=$sel_tabela?> >GB 2015</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2014' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2014" <?=$sel_tabela?> >GB 2014</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2013' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2013" <?=$sel_tabela?> >GB 2013</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2012' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2012" <?=$sel_tabela?> >GB 2012</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2011' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2011" <?=$sel_tabela?> >GB 2011</option>





                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2010' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2010" <?=$sel_tabela?> >GB 2010</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2009' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2009" <?=$sel_tabela?> >GB 2009</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_place_2008' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_place_2008" <?=$sel_tabela?> >GB 2008</option>



                          <option value=""> ------------------- WIN IRE --------------</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2020' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_ire_2019" <?=$sel_tabela?> >IRE 2020</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2019' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_ire_2019" <?=$sel_tabela?> >IRE 2019 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2018' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2018" <?=$sel_tabela?> >IRE 2018 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2017' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2017" <?=$sel_tabela?> >IRE 2017</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2016' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2016" <?=$sel_tabela?> >IRE 2016</option>

                          <!-- -->
                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2015' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2015" <?=$sel_tabela?> >IRE 2015</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2014' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2014" <?=$sel_tabela?> >IRE 2014</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2013' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2013" <?=$sel_tabela?> >IRE 2013</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2012' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2012" <?=$sel_tabela?> >IRE 2012</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2011' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2011" <?=$sel_tabela?> >IRE 2011</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2010' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2010" <?=$sel_tabela?> >IRE 2010</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2009' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2009" <?=$sel_tabela?> >IRE 2009</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_ire_2008' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_ire_2008" <?=$sel_tabela?> >IRE 2008</option>


                          <option value=""> ------------------- WIN AUS --------------</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2020' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_aus_2019" <?=$sel_tabela?> >AUS 2020</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2019' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_aus_2019" <?=$sel_tabela?> >AUS 2019 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2018' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_aus_2018" <?=$sel_tabela?> >AUS 2018 </option>



                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2017' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_aus_2017" <?=$sel_tabela?> >AUS 2017 </option>


                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2016' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_aus_2016" <?=$sel_tabela?> >AUS 2016 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2015' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_aus_2015" <?=$sel_tabela?> >AUS 2015 </option>



                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2014' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_aus_2014" <?=$sel_tabela?> >AUS 2014 </option>


                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2013' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_aus_2013" <?=$sel_tabela?> >AUS 2013 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_aus_2012' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_aus_2012" <?=$sel_tabela?> >AUS 2012 </option>



                          <option value=""> ------------------- WIN USA --------------</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2020' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_usa_2020" <?=$sel_tabela?> >USA 2020</option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2019' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_usa_2019" <?=$sel_tabela?> >USA 2019 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2018' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_usa_2018" <?=$sel_tabela?> >USA 2018 </option>



                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2017' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_usa_2017" <?=$sel_tabela?> >USA 2017 </option>


                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2016' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_usa_2016" <?=$sel_tabela?> >USA 2016 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2015' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_usa_2015" <?=$sel_tabela?> >USA 2015 </option>



                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2014' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_usa_2014" <?=$sel_tabela?> >USA 2014 </option>


                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2013' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_usa_2013" <?=$sel_tabela?> >USA 2013 </option>

                          <? if($_POST['tabela'] == 'corridas_cavalos_usa_2012' ){ $sel_tabela = 'selected="selected"'; }else{ $sel_tabela = ""; } ?>  
                          <option value="corridas_cavalos_usa_2012" <?=$sel_tabela?> >USA 2012 </option>










                          <!--

                          <? if($_POST['tabela'] == 'corridas_cavalos_ir' ){ $sel_tabela = 'selected'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_ir" selected="<?=$sel_tabela?>">IR</option>>

                          <? if($_POST['tabela'] == 'corridas_cavalos_galgos' ){ $sel_tabela = 'selected'; }else{ $sel_tabela = ""; } ?>
                          <option value="corridas_cavalos_galgos" selected="<?=$sel_tabela?>">Galgos</option>
                        -->
                        
                        <? }else{ ?>  
                          <option value="corridas_cavalos_2020" selected="selected">Cavalos GB 2020</option>
                          <option value="corridas_cavalos_2019" selected="selected">Cavalos GB 2019</option>
                          <option value="corridas_cavalos_2018" selected="selected">Cavalos GB 2018</option>
                          <option value="corridas_cavalos_2017" selected="selected">Cavalos GB 2017</option>
                          <option value="corridas_cavalos_2016" selected="selected">Cavalos GB 2016</option>

                          <option value="corridas_cavalos_2015" selected="selected">Cavalos GB 2015</option>
                          <option value="corridas_cavalos_2014" selected="selected">Cavalos GB 2014</option>
                          <option value="corridas_cavalos_2013" selected="selected">Cavalos GB 2013</option>
                          <option value="corridas_cavalos_2012" selected="selected">Cavalos GB 2012</option>


                          <option value="corridas_cavalos_2011" selected="selected">Cavalos GB 2011</option>
                          <option value="corridas_cavalos_2010" selected="selected">Cavalos GB 2010</option>
                          <option value="corridas_cavalos_2009" selected="selected">Cavalos GB 2009</option>
                          <option value="corridas_cavalos_2008" selected="selected">Cavalos GB 2008</option>


                          <option value="">---------- PLACES  ---------</option>


  
                          <option value="corridas_cavalos_place_2020" selected="selected">Cavalos GB 2020</option>
                          <option value="corridas_cavalos_place_2019" selected="selected">Cavalos GB 2019</option>
                          <option value="corridas_cavalos_place_2018" selected="selected">Cavalos GB 2018</option>
                          <option value="corridas_cavalos_place_2017" selected="selected">Cavalos GB 2017</option>
                          <option value="corridas_cavalos_place_2016" selected="selected">Cavalos GB 2016</option>


                          <option value="corridas_cavalos_place_2015" selected="selected">Cavalos GB 2015</option>
                          <option value="corridas_cavalos_place_2014" selected="selected">Cavalos GB 2014</option>
                          <option value="corridas_cavalos_place_2013" selected="selected">Cavalos GB 2013</option>
                          <option value="corridas_cavalos_place_2012" selected="selected">Cavalos GB 2012</option>
                          <option value="corridas_cavalos_place_2011" selected="selected">Cavalos GB 2011</option>

                          <option value="corridas_cavalos_place_2010" selected="selected">Cavalos GB 2010</option>
                          <option value="corridas_cavalos_place_2009" selected="selected">Cavalos GB 2009</option>
                          <option value="corridas_cavalos_place_2008" selected="selected">Cavalos GB 2008</option>



                          <option value="">---------- IRE WIN  ---------</option>


  
                          <option value="corridas_cavalos_ire_2020" selected="selected">Cavalos IRE 2020</option>
                          <option value="corridas_cavalos_ire_2019" selected="selected">Cavalos IRE 2019</option>
                          <option value="corridas_cavalos_ire_2018" selected="selected">Cavalos IRE 2018</option>

                          <option value="corridas_cavalos_ire_2017" selected="selected">Cavalos IRE 2017</option>
                          <option value="corridas_cavalos_ire_2016" selected="selected">Cavalos IRE 2016</option>
                          <option value="corridas_cavalos_ire_2015" selected="selected">Cavalos IRE 2015</option>
                          <option value="corridas_cavalos_ire_2014" selected="selected">Cavalos IRE 2014</option>
                          <option value="corridas_cavalos_ire_2013" selected="selected">Cavalos IRE 2013</option>
                          <option value="corridas_cavalos_ire_2012" selected="selected">Cavalos IRE 2012</option>
                          <option value="corridas_cavalos_ire_2011" selected="selected">Cavalos IRE 2011</option>
                          <option value="corridas_cavalos_ire_2010" selected="selected">Cavalos IRE 2010</option>
                          <option value="corridas_cavalos_ire_2009" selected="selected">Cavalos IRE 2009</option>
                          <option value="corridas_cavalos_ire_2008" selected="selected">Cavalos IRE 2008</option>



                          <option value="">---------- AUS WIN  ---------</option>


  
                          <option value="corridas_cavalos_aus_2020" selected="selected">Cavalos AUS 2020</option>
                          <option value="corridas_cavalos_aus_2019" selected="selected">Cavalos AUS 2019</option>
                          <option value="corridas_cavalos_aus_2018" selected="selected">Cavalos AUS 2018</option>


                          <option value="corridas_cavalos_aus_2017" selected="selected">Cavalos AUS 2017</option>

                          <option value="corridas_cavalos_aus_2016" selected="selected">Cavalos AUS 2016</option>

                          <option value="corridas_cavalos_aus_2015" selected="selected">Cavalos AUS 2015</option>



                          <option value="corridas_cavalos_aus_2014" selected="selected">Cavalos AUS 2014</option>

                          <option value="corridas_cavalos_aus_2013" selected="selected">Cavalos AUS 2013</option>

                          <option value="corridas_cavalos_aus_2012" selected="selected">Cavalos AUS 2012</option>


                          <option value="">---------- USA WIN  ---------</option>


  
                          <option value="corridas_cavalos_usa_2020" selected="selected">Cavalos USA 2020</option>
                          <option value="corridas_cavalos_usa_2019" selected="selected">Cavalos USA 2019</option>
                          <option value="corridas_cavalos_usa_2018" selected="selected">Cavalos USA 2018</option>


                          <option value="corridas_cavalos_usa_2017" selected="selected">Cavalos USA 2017</option>

                          <option value="corridas_cavalos_usa_2016" selected="selected">Cavalos USA 2016</option>

                          <option value="corridas_cavalos_usa_2015" selected="selected">Cavalos USA 2015</option>



                          <option value="corridas_cavalos_usa_2014" selected="selected">Cavalos USA 2014</option>

                          <option value="corridas_cavalos_usa_2013" selected="selected">Cavalos USA 2013</option>

                          <option value="corridas_cavalos_usa_2012" selected="selected">Cavalos USA 2012</option>





                          
                          
                          
                          

                        <!--  
                          <option value="corridas_cavalos_ir" >Cavalos IR</option>
                          <option value="corridas_cavalos_galgos" >Galgos</option>
                        -->
                        <? } ?>
                    </select> 
                    </div>
                    <div class="form-group">
                      <? if(isset($_POST['ordem'])){ $post_ordem = $_POST['ordem']; }else{ $post_ordem = "1"; } ?>  
                      <input type="number" name="ordem" class="form-control form-text" value="<?=$post_ordem?>" placeholder="ORDEM DE ">
                      <br />

                      <? if(isset($_POST['ordem2'])){ $post_ordem2 = $_POST['ordem2']; }else{ $post_ordem2 = "20"; } ?>  
                      <input type="number" name="ordem2" class="form-control form-text" value="<?=$post_ordem2?>" placeholder="ORDEM ATÉ ">
                      <br />
                      
                      <input type="text"  name="pista" class=" form-control form-text" placeholder="Pista">
                      <br>
                      <!--
                      <select name="pista" class="form-text text-muted">
                        <option value="" selected="selected">Pistas (<?=$pistas->num_rows()?>)</option>>
                        <? /* foreach($pistas->result() as $pista){ ?>
                          <option value="<?=$pista->menu_hint?>"><?=$pista->menu_hint?></option>
                        <? } */  ?>
                      </select> 
                    -->

                      
                      <? if(isset($_POST['distancia'])){ $post_distancia = $_POST['distancia']; }else{ $post_distancia = ""; } ?>
                      <!--<input type="text" value="<?=$post_distancia?>"  name="distancia" class="form-control form-text" placeholder="Distância"> -->
             

                    <div id="data">
                      <select size="1" name="distancia[]" class="form-text text-muted" multiple="multiple" style="height: 300px;width: 300px">
                        <? if($_POST['distancia']){ ?>   
                        <? if(count($_POST['distancia']) > 0 ){ ?>                          
                          <? foreach($_POST['distancia'] as $dist_ipt ){ ?>                          
                            <option value="<?=$dist_ipt?>" selected="selected"><?=$dist_ipt?></option>>
                          <? } // x foreach ?>
                          <? } // x if ?>
                        <? }else{ ?>
                          <option class="form-control form-text" value="" >Distância</option>
                        <? } ?>
                        <optgroup label="Grupo 1"></optgroup>
                        <option class="form-control form-text" value="5F " >5F</option>
                        <option class="form-control form-text" value="6F " >6F</option>
                        <option class="form-control form-text" value="7F " >7F</option>
                        <option class="form-control form-text" value="1m " >1m</option>

                        <optgroup label="Grupo 2"></optgroup>
                        <option class="form-control form-text" value="1m1f" >1m1f</option>
                        <option class="form-control form-text" value="1m2f" >1m2f</option>
                        <option class="form-control form-text" value="1m3f" >1m3f</option>
                        <option class="form-control form-text" value="1m4f" >1m4f</option>
                        <option class="form-control form-text" value="1m5f" >1m5f</option>
                        <option class="form-control form-text" value="1m6f" >1m6f</option>
                        <option class="form-control form-text" value="1m7f" >1m7f</option>
                        <option class="form-control form-text" value="2m " >2m</option>
                        <option class="form-control form-text" value="2m1f" >2m1f</option>
                        <option class="form-control form-text" value="2m2f" >2m2f</option>
                        <option class="form-control form-text" value="2m3f" >2m3f</option>
                        <option class="form-control form-text" value="2m4f" >2m4f</option>


                        <optgroup label="Grupo 3"></optgroup>
                        <option class="form-control form-text" value="2m5f" >2m5f</option>
                        <option class="form-control form-text" value="2m6f" >2m6f</option>
                        <option class="form-control form-text" value="2m7f" >2m7f</option>
                        <option class="form-control form-text" value="3m " >3m</option>
                        <option class="form-control form-text" value="3m1f " >3m1f </option>
                        <option class="form-control form-text" value="3m2f" >3m2f</option>
                        <option class="form-control form-text" value="3m3f" >3m3f</option>
                        <option class="form-control form-text" value="3m4f" >3m4f</option>
                        <option class="form-control form-text" value="3m5f" >3m5f</option>
                        <option class="form-control form-text" value="3m6f" >3m6f</option>
                        <option class="form-control form-text" value="3m7f" >3m7f</option>
                        <option class="form-control form-text" value="1m " >1m</option>

                        <option class="form-control form-text" value="4m " >4m</option>
                        <option class="form-control form-text" value="4m2f" >4m2f</option>     
<!--
                        <optgroup label="Grupo 4"></optgroup>
                        <option class="form-control form-text" value="Hrd " >Hrd</option>
                        <option class="form-control form-text" value="Chs " >Chs</option>
                        <option class="form-control form-text" value="NHF " >NHF</option>
                        <option class="form-control form-text" value="Stks " >Stks</option>
-->
                        <optgroup label="Grupo 4"></optgroup>
                        <option class="form-control form-text" value="1m7f Hcap Chs" >1m7f Hcap Chs</option>
                        <option class="form-control form-text" value="2m Mares Mdn Hrd" >2m Mares Mdn Hrd</option>

                        <optgroup label="Grupo 5 (Austrália)"></optgroup>
                        
                        <option class="form-control form-text" value="900m" >900m</option>
                        <option class="form-control form-text" value="1000m" >1000m</option>
                        <option class="form-control form-text" value="1050m" >1050m</option>
                        <option class="form-control form-text" value="1100m" >1100m</option>

                        <option class="form-control form-text" value="1110m" >1110m</option>

                        <option class="form-control form-text" value="1200m" >1200m</option>
                        <option class="form-control form-text" value="1250m" >1250m</option>
                        <option class="form-control form-text" value="1300m" >1300m</option>
                        <option class="form-control form-text" value="1350m" >1350m</option>
                        <option class="form-control form-text" value="1400m" >1400m</option>
                        <option class="form-control form-text" value="1550m" >1550m</option>
                        <option class="form-control form-text" value="1600m" >1600m</option>
                        <option class="form-control form-text" value="1615m" >1615m</option>
                        <option class="form-control form-text" value="1800m" >1800m</option>
                        <option class="form-control form-text" value="1890m" >1890m</option>
                        <option class="form-control form-text" value="2000m" >2000m</option>
                        <option class="form-control form-text" value="2100m" >2100m</option>
                        <option class="form-control form-text" value="2200m" >2200m</option>
                        <option class="form-control form-text" value="2350m" >2350m</option>
                        <option class="form-control form-text" value="2500m" >2500m</option>

                        

                        
                        
                                   


                        <? /* foreach($pistas->result() as $pista){ ?>
                          <option value="<?=$pista->menu_hint?>"><?=$pista->menu_hint?></option>
                        <? } */  ?>
                      </select> 
                    </div>

                    <br />
                    <hr />
                    <div class="content">
                    <div class="row">
                      <select name="distancia_complemento" class="form-text"  style="width: 300px">
                        <? if($_POST['distancia_complemento'] != ""){ ?>   
                            <option value="<?=$_POST['distancia_complemento']?>" selected="selected"><?=$_POST['distancia_complemento']?></option>>
                        <? }else{ ?>
                          <option class="form-control form-text" value="" >Complemento Distância</option>
                        <? } ?>
                        
                        <option class="form-control form-text" value="" >Nulo</option>
                        <option class="form-control form-text" value="Hrd" >Hrd</option>
                        <option class="form-control form-text" value="Chs" >Chs</option>
                        <option class="form-control form-text" value="NHF" >NHF</option>
                        <option class="form-control form-text" value="Stks" >Stks</option>
                        <option class="form-control form-text" value="Hcap" >Hcap</option>

                      </select> 
                    </div>
                  </div>
                      <br>


                      <? if(isset($_POST['n_sequencia'])){ $post_n_sequencia = $_POST['n_sequencia']; }else{ $post_n_sequencia = "5"; } ?>
                      <input style="border: orange 1px solid" type="number" value="<?=$post_n_sequencia?>"  name="n_sequencia" class="form-control form-text" placeholder="Nº de sequências">





                      




                    <!--
                    <select name="pista" class="form-control">
                      <option class="form-text text-muted" value="" selected="selected">Distâncias  (<?=$distancias->num_rows()?>)</option>>
                      <? /* foreach($distancias->result() as $distancia){ ?>
                        <option class="form-text text-muted" value="<?=$distancia->event_name?>"><?=$distancia->event_name?></option>
                      <? } */ ?>
                    </select>
                  -->
                    <br>

                    

                    <? if(isset($_POST['odd2'])){ $post_odd2 = $_POST['odd2']; }else{ $post_odd2 = ""; } ?>
                    <input type="text" value="<?=$post_odd2?>" name="odd2" class="form-control" style="width: 300px;float: right" placeholder="ODD 2 menor que:" value="1000">


                    <? if(isset($_POST['odd1'])){ $post_odd1 = $_POST['odd1']; }else{ $post_odd1 = ""; } ?>
                    <input type="text" value="<?=$post_odd1?>"  name="odd1" class="form-control" style="width: 300px;" placeholder="ODD 1 Maior que:">

                    <br />

                    <? if(isset($_POST['ipmin'])){ $post_ipmin = $_POST['ipmin']; }else{ $post_ipmin = ""; } ?>
                    <input type="text" value="<?=$post_ipmin?>"  name="ipmin" class="form-control form-text" placeholder="ODD MINIMA AO VIVO">
                    
                    <br>

                    <? if(isset($_POST['ppmin'])){ $post_ppmin = $_POST['ppmin']; }else{ $post_ppmin = ""; } ?>
                    <input type="text" value="<?=$post_ppmin?>"  name="ppmin" class="form-control form-text" placeholder="ODD MINIMA PRE LIVE">

                    <br>

                    <? if(isset($_POST['ppmax'])){ $post_ppmax = $_POST['ppmax']; }else{ $post_ppmax = ""; } ?>
                    <input type="text" value="<?=$post_ppmax?>"  name="ppmax" class="form-control form-text" placeholder="ODD MAXIMA PRE LIVE">
                    
                    <br>

                    <? if(isset($_POST['ipmax'])){ $post_ipmax = $_POST['ipmax']; }else{ $post_ipmax = ""; } ?>
                    <input type="text" value="<?=$post_ipmax?>"  name="ipmax" class="form-control form-text" placeholder="ODD MAXIMA AO VIVO">
                    
                    <br>


                    <? if(isset($_POST['data_de'])){ $post_data_de = $_POST['data_de']; }else{ $post_data_de = ""; } ?>
                    <input type="text" value="<?=$post_data_de?>" name="data_de" class="form-control" style="width: 300px;" placeholder="(Entre) dd/mm/aaaa">



                    <? if(isset($_POST['data_ate'])){ $post_data_ate = $_POST['data_ate']; }else{ $post_data_ate = ""; } ?>
                    <input type="text"  value="<?=$post_data_ate?>" name="data_ate" class="form-control" style="width: 300px;" placeholder="(E) dd/mm/aaaa ">
                    <br />
                    <input type="submit" value="Buscar" class="btn btn-primary">

                  </div>
                    
                  </form>


                </div>
            </div>
            
<!--CARD MODELO -->
              


              <div class="card my-1 slideInUp animated" >

                <div class="card-header flipIn animated">

            
              <? if($_POST){ ?>

                <h3 class="page-header mb60"><?=$qr_datas->num_rows()?> resultados</h3>
                <? if(isset($_POST['distancia'])){ ?>
                  <? if(count($_POST['distancia']) > 0){ $distancias  = "";  ?>
                    <p>
                      <?
                      #if(count($distancia) > 0){
                         # $where .= "AND (";
                          #$where_dt .= "AND (";
                          #$where .= " AND event_name LIKE '%".$distancia."%' ";
                          #$where_dt .= " AND event_name LIKE '%".$distancia."%' ";

                          foreach ($_POST['distancia'] as $dist) {
                                $distancias  .= $dist." |";
                            }
                       # }
                      ?>
                      Distancias: <strong><?=$distancias?></strong>
                      <? if($_POST['distancia_complemento'] != ""){ ?>
                      <span style="color: blue"><?=$_POST['distancia_complemento']?></span>
                    <? } ?>
                    </p>

                  <? } ?>
                <? } ?>

                <? if(strlen($_POST['pista']) > 1){  ?>
                  <p>
                    Pista: <strong><?=$_POST['pista']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['ordem']) > 0){  ?>
                  <p>
                    ORDEM De: <strong><?=$_POST['ordem']?></strong> até ORDEM De: <strong><?=$_POST['ordem2']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['odd1']) > 0){  ?>
                  <p>
                    Odd De: <strong><?=$_POST['odd1']?></strong> até Odd De: <strong><?=$_POST['odd2']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['ipmin']) > 0){  ?>
                  <p>
                    IPMIN <=  <strong><?=$_POST['ipmin']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['ppmin']) > 0){  ?>
                  <p>
                    PPMIN <=  <strong><?=$_POST['ppmin']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['ppmax']) > 0){  ?>
                  <p>
                    PPMAX >=  <strong><?=$_POST['ppmax']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['ipmax']) > 0){  ?>
                  <p>
                    IPMAX >=  <strong><?=$_POST['ipmax']?></strong>
                  </p>
                <? } ?>

                <? if(strlen($_POST['data_de']) > 5){  ?>
                  <p>
                    Entre  <strong><?=$_POST['data_de']?></strong> e <strong><?=$_POST['data_ate']?></strong>
                  </p>
                <? } ?>

              <? }  ?>




                </div>

              <?
              $lucro_total = 0;
              $total_perda = 0;
              $parcial_total = 0;

              //  Atualizações
              $greens = 0;
              $reds = 0;
              $sequencia_green = [];
              $sequencia_red = [];
              $cont_seq_green = 0;
              $cont_seq_red = 0;

              $total_green = 0;
              $total_red = 0;

              ?>

                <? if($qr_datas->num_rows() == 0){ ?>
                    <h3 class="page-header mb60">Nenhuma corrida registrada</h3>
                <? }else{ ?>

                <div class="container">

                  <div class="row">

                    <div id="container" class="box_refresh" style="width: 100%; height: 400px; margin: 0 auto"></div>
                    

                  </div>


                  <div class="row">

                    <!-- #00FF7F -->
                  <div class="col-sm-12" style="background-color:">
                      
                    <h2>EXTRATO  </h2>
                    <form action="<?=base_url()?>horses/del_reg" method="post" target="_blank">
                      <input type="text" name="tb" value="<?=$tb?>">
                    <? 
                    $total_dia = 0;

                    $n_sequencia = 5;
                    if(isset($_POST['n_sequencia'])){
                      $n_sequencia = $_POST['n_sequencia'];
                    }
                    /*
                    $greens = 0;
                    $reds = 0;
                    $sequencia_green = [];
                    $sequencia_red = [];
                    $cont_seq_green = 0;
                    $cont_seq_red = 0;

                    $total_green = 0;
                    $total_red = 0;
                    */

                    foreach($qr_datas->result() as $dt){ 
                      echo "<h2> Data: ".$dt->data_evento."</h2>";
                      $qr_venc_data = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND data_evento = '".$dt->data_evento."'  $where_dt ORDER BY datahora_evento asc ");
                        if($qr_venc_data->num_rows() > 0){?>
                        
                          <!--<p><input type="submit" value="Deletar" class="btn btn-danger"></p>-->

                        <table class="table table-table-striped">
                          <tr class="thead-light">
                            <th>Selection ID</th>
                            <th>Data</th>
                            <th>Resultado</th>
                            <th>Parcial</th>
                            <th>ORDEM</th>
                            <th>BSP</th>
                            <th>IPMIN</th>
                            <th>PPMIN</th>
                            <th>PPMAX</th>
                            <th>IPMAX</th>
                            <th>Corrida</th>
                          </tr>


                        <?  foreach($qr_venc_data->result() as $venc_data){


                          if($_POST){
                            

                            

                              if(strlen($_POST['ipmin']) > 0){

                                $ganho =  ($_POST['ipmin'] * 100) - 100;
                                $multiplicador = $_POST['ipmin'];
                              }else{
                                $ganho =  ($venc_data->bsp * 100) - 100;
                                $multiplicador = $venc_data->bsp;

                              }

                          }else{
                              $ganho =  ($venc_data->bsp * 100) - 100;
                              $multiplicador = $venc_data->bsp;
                          }
                            
                            #$lucro  =  ($multiplicador * 93) - 93;
                            #$lucro_total += $lucro;
                            #$total_dia += $ganho; 
                            ?>


                          <tr id="reg<?=$venc_data->id?>" title="<?=$venc_data->id?>">
                            <td>
                              <? #=$venc_data->id?>
                              <?=$venc_data->selection_name?>
                              <input type="checkbox" name="del_reg[]" value="<?=$venc_data->id?>"> 
                              
                            </td>

                            <td><?=$venc_data->datahora_evento?></td>
                            <? //  GREEN
                              if($venc_data->win_lose == '1'){ 
                                $reds = 0;
                                $greens = $greens+1;
                                $total_green = $total_green+1;

                                if($greens == $n_sequencia){
                                  $cont_seq_green++;
                                  $sequencia_green[$cont_seq_green] = $venc_data->id;
                                }

                                $lucro  =  ($multiplicador * 100) - 100;
                                $lucro_total += $lucro;
                                $parcial_total += $lucro;
                                //$parcial_total = $parcial_total + $lucro;
                                $total_dia += $ganho; 

                            ?>
                              <td  style="color:green">$<u><?=$lucro?></u> (<?=$greens?>)</td>
                            <? 
                              }else{ 
                                // RED
                                $reds = $reds+1;
                                $greens = 0;
                                $total_red = $total_red+1;

                                if($reds == $n_sequencia){
                                  $cont_seq_red++;
                                  $sequencia_red[$cont_seq_red] = $venc_data->id;
                                }

                                $lucro  =  100;
                                $parcial_total = $parcial_total - $lucro;
                                $total_dia =  $total_dia - $lucro; 

                                #$perda = -100;
                                #$total_sub -= 100;
                                $total_perda -= 100;
                                #$total_dia -= $perda;

                            ?>
                              <td style="color:red">$<u><?=$lucro?></u>  (<?=$reds?>)</td>
                            <? } ?>
                            <td>$<u><?=$parcial_total?></u></td>
                            <td><?=$venc_data->ordem?></td>
                            <td><?=$venc_data->bsp?></td>
                            <td><?=$venc_data->ipmin?></td>
                            <td><?=$venc_data->ppmin?></td>
                            <td><?=$venc_data->ppmax?></td>
                            <td><?=$venc_data->ipmax?></td>
                            <td><?=$venc_data->menu_hint?><?=$venc_data->event_name?></td>
                          </tr>



                    <?     }
                        }
                    ?>
                    <tr>
                      <td >Total dia:</td>
                      <td colspan="5"><?=$total_dia?> (<?=$qr_venc_data->num_rows()?>)</td>
                    </tr>
                  
                  </table>
                
                    <!--Total dia: <strong><?=$total_dia?> (<?=$qr_venc_data->num_rows()?>)</strong> -->

                    

                    
                    <? $total_dia = 0; } ?>  
                    <?=$total_dia?>
                
                        <? ############################################################
                        /*
                          $lucro_total = 0;  
                          foreach($qr_vencedores->result() as $dd_venc){
                            if($_POST){
                              if(strlen($_POST['ipmin']) > 0){
                                $lucro =  ($_POST['ipmin'] * 93) - 93;
                                $multiplicador = $_POST['ipmin'];
                              }else{
                                $lucro =  ($dd_venc->bsp * 93) - 93;
                                $multiplicador = $dd_venc->bsp;

                              }
                            }else{
                              $lucro =  ($dd_venc->bsp * 93) - 93;
                              $multiplicador = $dd_venc->bsp;
                            }
                            $lucro_total += $lucro;

                        ?>
                            <p>
                            <strong><?=$dd_venc->data_evento?> - <?=$dd_venc->menu_hint?></strong> <i><?=$dd_venc->event_name?></i> <br/> 
                              $<u><?=$lucro_total?></u> ---- 
                              93 * <?=$multiplicador?> 
                              | Lucro: <strong><?=$lucro?></strong>-- 
                              <br />
                              -----------------IPMIN <strong><?=$dd_venc->ipmin?></strong><br />
                              -----------------BSP <strong><?=$dd_venc->bsp?></strong>
                            </p>
                        <? } */ ?>

                         
                    



                  

              
                  
                
                
                
                <? } // x else ?>

               
                 
                
   

            
                
              </form>
              </div>

              <!--CARD MODELO -->

             

<!--END CARD MODELO -->
<div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify" id="resultado_geral">

  <div class="card my-1 slideInUp animated">

    <div class="card-header flipIn animated">
      Resultado:
    </div>


    <ul>
      <li>Total Ganho: $ <strong style="color:green"><?=number_format($lucro_total, 2, ',', '.')?> (<?=$total_green?>)</strong></li>
      <li>Total Perdido: $ <strong style="color:red"><?=number_format($total_perda, 2, ',', '.')?> (<?=$total_red?>)</strong></li>
    </ul>
    <? if($_POST){ ?>
    <p style="color: red">
      <? #=print_r($sequencia_red)?><br />
      <? $srq_r = 0; foreach($sequencia_red as $seq){ $srq_r++; ?>
        <a style="color: red" href="#reg<?=$seq?>"><? #=$seq?> Sequencia RED <?=$srq_r?></a><br>
      <? } ?>
      
    </p>
    <p style="color: green">
      <? #=print_r($sequencia_green)?>
    <? $srq_g = 0; foreach($sequencia_green as $seq){ $srq_g++; ?>
        <a style="color: green" href="#reg<?=$seq?>"><? #=$seq?> Sequencia GREEN <?=$srq_g?></a><br>
      <? } ?>
    </p>  
    <? } ?>


  </div>

</div>


              
              
              

              

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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=base_url()?>jack/node_modules/jquery/dist/jquery.js"></script>
    
    <script src="<?=base_url()?>jack/node_modules/popper.js/dist/umd/popper.js"></script>
  
    <script src="<?=base_url()?>jack/node_modules/bootstrap/dist/js/bootstrap.js"></script>
  


<!-- JS  CRIADOS -->
<script type="text/javascript">
function testAnim(e,x) {
	$('#'+e).removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	  $(this).removeClass();
	});
};	



  $(document).ready(function(){

    $( "#resultado_geral" ).clone().appendTo( "#topo" );

   $(".clique").click(function(){
     var id_ani = $(this).attr('id');
     //alert(id_ani);
      testAnim(id_ani,'jello');
      //return false;
   })

  }) // x ready

  </script>


  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

  <script type="text/javascript" class="init">
  

$(document).ready(function() {


   

  



  // DataTable
  var table = $('#tb_rel').DataTable();

  // Apply the search
  /*
  table.columns().every( function () {
    var that = this;

    $( 'input', this.footer() ).on( 'keyup change', function () {
      if ( that.search() !== this.value ) {
        that.search( this.value ).draw();
      }
    } );
  } );
  */

} );


  </script>



  <!-- GRAFICOS -->
  <script type="text/javascript">
Highcharts.chart('container', {
    chart: {
            //type: 'area'
            type: 'line',
        
    },
    title: {
        
        text: "GRAFICO"
        
    },
    subtitle: {
        text: 'Fonte: betfair.com'
    },
    xAxis: {
            //categories: ['+15min', '11min', '10min', '9min', '8min', '7min', '6min', '5min', '4min', '3min', '2min', '1min']
            
            categories: [
            <? foreach($qr_datas->result() as $dt){ ?>
                '<?=$dt->data_evento?>',
            <? } ?>
            '<?=$dt->data_evento?>'
            ] 
        <? #} ?>
        <? /* if($tipo == 'odd'){ ?>
            categories: ['+15min', '11min', '10min', '9min', '8min', '7min', '6min', '5min', '4min', '3min', '2min', '1min']
        <? } */ ?>
        
    },
    yAxis: {
        title: {
            text: 'Titulo'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [
        <? #foreach($sels->result() as $sel){ 
            #$sel_nome = "null";
            #$qr_sel = $this->padrao_model->get_by_matriz('id_selection',$sel->selection_id,'selections');
            #if($qr_sel->num_rows() > 0){
                /*if($tipo == 'odd'){
                    if($side == 'back'){
                        $side = 'lay';
                    }
                    if($side == 'lay'){
                        $side = 'back';
                    }
                } */
                #$sel_nome = "Sel nome";
                #$qr_regs = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$sel->selection_id." AND tipo = '".$side."' ORDER BY dt_update desc LIMIT 20");
            #}
        ?>
            {
                name: "Ganhos",
                color: '#0F0',
                data: [

                    <? 
                    $total_dia = 0;
                    foreach($qr_datas->result() as $dt){ 
                      $qr_venc_data = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 1 AND data_evento = '".$dt->data_evento."'  $where_dt ORDER BY datahora_evento asc ");
                        if($qr_venc_data->num_rows() > 0){ 
                          foreach($qr_venc_data->result() as $venc_data){




                            if($_POST){

                              if(strlen($_POST['ipmin']) > 0){
                                $ganho =  ($_POST['ipmin'] * 100) - 100;
                                //$ganho =  $_POST['ipmin'] * 93;
                                #$multiplicador = $_POST['ipmin'];
                              }else{
                                $ganho =  ($venc_data->bsp * 100) - 100;
                                //$ganho =  $dd_venc->bsp * 93;
                                #$multiplicador = $dd_venc->bsp;

                              }

                              /*
                              if(strlen($_POST['ppmax']) > 0){
                                $ganho =  ($_POST['ipmax'] * 93) - 93;
                                //$ganho =  $_POST['ipmin'] * 93;
                                #$multiplicador = $_POST['ipmin'];
                              }
                              */



                            }else{
                              $ganho =  ($venc_data->bsp * 100) - 100;
                              //$ganho = $venc_data->bsp * 93;
                              #$multiplicador = $dd_venc->bsp;
                              #$total_dia += $ganho;
                            }
                            #$lucro_total += $ganho;


                            #$ganho = $venc_data->bsp * 93;
                            $total_dia += $ganho;


                          }
                        }
                    ?>
                    <?=$total_dia?><? #=$qr_venc_data->num_rows()?>,
                    <? $total_dia = 0; } ?>  
                    <?=$total_dia?>

                    
                    <?

                    /*foreach($qr_vencedores->result() as $venc){ 
                     // $qr_data = $this->
                      $ganho = $venc->bsp * 93;
                    ?>
                      <?=$ganho?>,
                    <? } */ ?>
                    <? #=$ganho?>
                    ]
            },
            {
                name: "Perdas",
                color: '#F00',
                data: [

                    <? 
                    $total_dia = 0;
                    foreach($qr_datas->result() as $dt){ 
                      $qr_venc_data = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 0 AND data_evento = '".$dt->data_evento."'  $where_dt ORDER BY datahora_evento asc ");
                        if($qr_venc_data->num_rows() > 0){
                          foreach($qr_venc_data->result() as $venc_data){

                            /* ######################## 
                            if($_POST){

                              if(strlen($_POST['ipmin']) > 0){
                                $lucro =  ($_POST['ipmin'] * 93) - 93;
                                $multiplicador = $_POST['ipmin'];
                              }else{
                                $lucro =  ($dd_venc->bsp * 93) - 93;
                                $multiplicador = $dd_venc->bsp;

                              }

                            }else{
                              $lucro =  ($dd_venc->bsp * 93) - 93;
                              $multiplicador = $dd_venc->bsp;
                            }
                            $lucro_total += $lucro;
                            /* ####################### */


                            // PARTE ANTIGA
                            $ganho = 100;
                            $total_dia += $ganho;
                          }
                        }
                    ?>
                    <?=$total_dia?>,
                    <? $total_dia = 0; } ?>  
                    <?=$total_dia?>
                    
                    <? 
                    /* foreach($qr_perdedores->result() as $perd){ $perda = $perd->bsp * 93; ?>
                      <?=$perda?>,
                    <? } */ ?>
                    <? #=$perda?>
                    ]
            },
            ////////////////////////////////////////////// LUCRO E PERDA
            {
                name: "Resultado/Dia",
                color: '#00F',
                data: [
                    <? 
                    $total_dia = 0;
                    $total_ganho_dia = 0;
                    $total_perda_dia = 0;
                    ################## GANHO DIA
                    foreach($qr_datas->result() as $dt){ 

                      $qr_venc_data = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 1 AND data_evento = '".$dt->data_evento."'  $where_dt ORDER BY datahora_evento asc ");
                        if($qr_venc_data->num_rows() > 0){
                          foreach($qr_venc_data->result() as $venc_data){

                            if($_POST){

                              if(strlen($_POST['ipmin']) > 0){
                                $ganho =  ($_POST['ipmin'] * 100) - 100;
                                //$ganho =  $_POST['ipmin'] * 100;
                                #$multiplicador = $_POST['ipmin'];
                              }else{
                                $ganho =  ($venc_data->bsp * 100) - 100;
                                //$ganho =  $dd_venc->bsp * 100;
                                #$multiplicador = $dd_venc->bsp;

                              }

                            }else{
                              $ganho =  ($dd_venc->bsp * 100) - 100;
                              //$ganho = $venc_data->bsp * 93;
                              #$multiplicador = $dd_venc->bsp;
                              #$total_dia += $ganho;
                            }
                            #$lucro_total += $ganho;


                            #$ganho = $venc_data->bsp * 93;
                            $total_ganho_dia += $ganho;
                          }
                        }
                    ?>



                    <? 
                    ################### PERDA DIA
                    #foreach($qr_datas->result() as $dt){ 
                      $qr_perd_data = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 0 AND data_evento = '".$dt->data_evento."'  $where_dt ORDER BY datahora_evento asc ");
                        if($qr_perd_data->num_rows() > 0){
                          foreach($qr_perd_data->result() as $perda_data){
                            // PARTE ANTIGA
                            $perda = 100;
                            $total_perda_dia += $perda;
                          }
                        }
                    ?>
                    <?
                    $total_dia = $total_ganho_dia - $total_perda_dia;
                    ?>
                    <?=$total_dia?>,
                    <?
                      // RESET 
                      $total_dia = 0; 
                      $total_perda_dia = 0;
                      $total_ganho_dia = 0;
                    } 
                    ?>  
                    <?=$total_dia?>
                    
                    <? 
                    /* foreach($qr_perdedores->result() as $perd){ $perda = $perd->bsp * 93; ?>
                      <?=$perda?>,
                    <? } */ ?>
                    <? #=$perda?>
                    ]
            },
            //////////////////////////////////////////////
            ////////////////////////////////////////////// LUCRO E PERDA
            {
                name: "Acumulado",
                color: '#000',
                data: [
                    <? 
                    $acumulado = 0;
                    $total_dia = 0;
                    $total_ganho_dia = 0;
                    $total_perda_dia = 0;
                    ################## GANHO DIA
                    foreach($qr_datas->result() as $dt){ 

                      $qr_venc_data = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 1 AND data_evento = '".$dt->data_evento."'  $where_dt ORDER BY datahora_evento asc ");
                        if($qr_venc_data->num_rows() > 0){
                          foreach($qr_venc_data->result() as $venc_data){

                            if($_POST){

                              if(strlen($_POST['ipmin']) > 0){
                                $ganho =  ($_POST['ipmin'] * 100) - 100;
                                //$ganho =  $_POST['ipmin'] * 93;
                                #$multiplicador = $_POST['ipmin'];
                              }else{
                                $ganho =  ($venc_data->bsp * 100) - 100;
                                //$ganho =  $dd_venc->bsp * 93;
                                #$multiplicador = $dd_venc->bsp;

                              }

                            }else{
                              $ganho =  ($dd_venc->bsp * 100) - 100;
                              //$ganho = $venc_data->bsp * 93;
                              #$multiplicador = $dd_venc->bsp;
                              #$total_dia += $ganho;
                            }
                            #$lucro_total += $ganho;


                            #$ganho = $venc_data->bsp * 93;
                            $total_ganho_dia += $ganho;
                          }
                        }
                    ?>



                    <? 
                    ################### PERDA DIA
                    #foreach($qr_datas->result() as $dt){ 
                      $qr_perd_data = $this->db->query("SELECT * FROM $tb WHERE $where_ordem AND win_lose = 0 AND data_evento = '".$dt->data_evento."'  $where_dt ORDER BY datahora_evento asc ");
                        if($qr_perd_data->num_rows() > 0){
                          foreach($qr_perd_data->result() as $perda_data){
                            // PARTE ANTIGA
                            $perda = 100;
                            $total_perda_dia += $perda;
                          }
                        }
                    ?>
                    <?
                    $total_dia = $total_ganho_dia - $total_perda_dia;
                    $acumulado += $total_ganho_dia - $total_perda_dia;
                    /*
                    if($total_dia >= 0){
                      $acumulado = $acumulado + $total_dia; 
                    }
                    if($total_dia < 0){
                      $acumulado -=  $total_dia; 
                    }
                    */
                    ?>
                    <?=$acumulado?>,
                    <?
                      // RESET 
                      $total_dia = 0; 
                      $total_perda_dia = 0;
                      $total_ganho_dia = 0;
                    } 
                    ?>  
                    <?=$acumulado?>
                    
                    <? 
                    /* foreach($qr_perdedores->result() as $perd){ $perda = $perd->bsp * 93; ?>
                      <?=$perda?>,
                    <? } */ ?>
                    <? #=$perda?>
                    ]
            } /*,
            //////////////////////////////////////////////
            {
                name: "Testes",
                color: '#c3c3c3',
                    data: [0, 0, 
    {y: 50, marker: { fillColor: '#f00', radius: 10 } }, 0,0]
            } */
    <? #} ?> 
    ]
    
});

      
        </script>

  </body>
</html>