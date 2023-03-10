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
    <!--<link rel="stylesheet" href="<?=base_url()?>css/bootstrap.css"> -->

    <!--<link rel="stylesheet" href="<?=base_url()?>css/bootstrap.css">  -->
    
  <!--
    <link rel="stylesheet" href="<?=base_url()?>jack/node_modules/@fortawesome/fontawesome-free/css/all.css">

    <link rel="stylesheet" href="<?=base_url()?>jack/node_modules/bootstrap/compilados/Style.css">
  -->

    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">

    <!--<link rel="stylesheet" href="<?=base_url()?>vendor-porto/fontawesome-free/css/all.min.css"> -->
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/utils.css">

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/fontawesome/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/icons/linecons/linecons.css">


<!-- -->

  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="author" content="Trader Size" />
  <meta name="autor" content="Trader Size" />

  
  <meta charset="UTF-8">
  
  <title> Galgos </title>
  





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

       #bt_clear:active{
        /*border: silver 1px solid;*/
        opacity: 20%;

       }


       footer {
          position: fixed;
          bottom:0;
          left:0;
          background-color: #ebd077;
          width: 100%;
          height: 20%;
          padding-left: 1em;

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
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ECD078">
  <meta name="msapplication-TileColor" content="#ECD078">
  <meta name="theme-color" content="#ECD078">


<script src="//code.jivosite.com/widget.js" data-jv-id="qPbexb9dvS" async></script>



  </head>



  <body>




    <!-- MODAL -->
    <? if($this->session->userdata('token')){ ?>
    <div class="modal fade" id="modal_bets" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apostas/Bets</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="box" align="center" style="border:red 0px solid;padding:20px;display:none" id="loading_bets">
                    <img src="<?=base_url()?>assets2/images/svg-loaders/three-dots.svg" alt="" width="60">
            </div>

            <div class="pad15A" id="apostas_abertas">
              <p align="center" style="padding:1em;color:#fff"> Nenhuma Aposta </p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            
          </div>
        </div>
      </div>
    </div>

    <!-- Modal GRAFICOS -->
  <div class="modal fade" id="modal_graph" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times; </button>
          
        </div>
        <div class="modal-body" id="graph_ts">
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          
        </div>
      </div>
    </div>
  </div>
</div>


    



    <? } ?>
<?

  ?>


  
<!-- BREADCRUMB -->
<style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .breadcrumb-item,.breadcrumb-item a{font-size: 11px}
  <? } ?>

</style>
      <div class="container">

        <nav aria-label="breadcrumb">

      

        </nav>

      </div>
<!-- END BREADCRUMB -->

<? if($this->session->userdata('login') && !$this->session->userdata('token')) { ?>
  <div class="container" style="margin-top: 3em">
    <div class="alert alert-danger">Para realizar apostas é necessário <a href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=https://tradersize.com/bet">fazer o login na Betfair via Trader Size</a>. Caso não tenha conta na Betfair, <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142">registre-se grátis</a> e <strong>GANHE BÔNUS.</strong> </div>


  <div class="alert alert-danger">

  To place bets you must <a href="https://identitysso.betfair.com/view/vendor-login?client_id=53845&response_type=code&redirect_uri=https://tradersize.com/bet">login to Betfair via Trader Size</a>. If you don't have a Betfair account, <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142">sign up for free </a> and get bonuses.
  </div>

  </div>

<? } ?>




<!-- CONTAINER SECTION -->
      <div class="container pb-3 pt-3 bg-white">

<!-- PAGE-TITLE-CONTAINER -->
        <div class="container">
          <br />
          <br />
          <div class="row">
          
            

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
            <div class="col-lg-12 col-sm-12 col-md-6 order-xl-2 order-md-2 order-sm-3 pl-1 pr-1 text-justify">

<!-- CARD PADRÃO LETREIRO DE JOG -->
              <div class="card border-black mt-3" style="display: none">

                <div class="card-body p-3 text-center bg-white">

                  <div class="row">

                    <div class="container col-4 col-sm-4 m-auto p-0">

                      <div class="media justify-content-center">
                        <img src="<?=base_url()?>jack/img/football_2833.png" style="width: 56px; height: 56px;">
                      </div>

                      <button type="button" class="btn btn-outline-primary btn-sm mt-3">SEGUIR</button>

                    </div>

                    <div class="container col-4 col-sm-4 m-auto p-0">

                      <div class="media justify-content-center">
                        <span class="h2">37 dias</span>
                      </div>

                    </div>


                  </div>

                </div>

              </div>
<!-- END CARD PADRÃO --LETREIRO--DE--JOGO -->

<!-- VOTE BUTTONS ---->
              <div class="card border-white my-2">
                <h2 class="card-title text-center mt-2" style="font-size: 15px">Quem Vence?</h2>
                
                <div class="btn-group btn-block mt-2" role="group" aria-label="vote-buttons-group" style="width:100%">
                  <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" type="button" class="btn btn-success" style="width:33%">1</a>
                  <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" type="button" class="btn btn-secondary" style="width:33%">x</a>
                  <a target="_blank" href="http://ads.betfair.com/redirect.aspx?pid=2816870&bid=8142" type="button" class="btn btn-primary" style="width:33%">2</a>
                </div>
              </div>
<!-- END VOTE BUTTONS --->

<!--CARD MODELO wobble -->
              <div class="card border-white my-1 fadeIn  animated">

                <div class="card-body bg-bggray text-center p-3">
                  <div class="h6" style="font-size: 13px">INFORMAÇÕES DA CORRIDA</div>
                  
                  <h6><a id="link_betfair" style="display: none" href="#" target="_blank">Ver na Betfair</a></h6>
                  <div>
                    <p class="mb-0">
                      <span><strong>Data de início :
                      </strong> 

                              

                      </strong>

                      </span>
                    </p>

                </div>
                </div>

              </div>
              <!--END CARD MODELO -->


                    <!-- SOFASCORE -->
                   
              <!--CARD MODELO -->
              <div class="card my-1 bg-warning rotateInDownLeft animated" id="mercados">
                   
                    <div class="card-body bg-warning"><label>Mercados</label> 


                      <p class="text-right" style="margin-bottom:0px">Por Correspondência</p>
                   

                    </div>
                   
                    
                    
                  </div>

              
                

            
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
            <div class="col-lg-12 col-sm-12 col-md-6 order-xl-3 order-md-3 order-sm-2 pl-1 pr-1 text-justify">

              <div class="card mt-3 border-white">

                <!-- 16:9 aspect ratio 
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/7zVYuXfD86I"></iframe>
                </div>
              -->

              </div>

<!--CARD MODELO -->
              <!-- MATCH ODDS -->
              <div class="card my-1 fadeInUp animated">

                <div class="card-header" id="">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <button data-toggle="tab"  href="#mercado_ativo" class="nav-link active" href="#mercado_ativo" id="tit_mkt_now" style="font-weight: bold;"><label id="tab_tit">Maercado ATUAL</label></a>
                    </li>
                    <? if($this->session->userdata('id')){ ?>
                    <!--
	                    <li class="nav-item">
	                      <!--<button class="nav-link" data-toggle="tab"  href="#box_graph">Graph</button> 
	                      <button type="button" data-toggle="modal" data-target="#modal_graph">Open Modal</button>
	                    </li> -->

                    <? }  ?>
                  <!--  
                    <li class="nav-item">
                      <a class="nav-link" href="#">Contra (LAY)</a>
                    </li>
                  -->
                  </ul>
                </div>
                
                
                <div class="tab-content">

	                <div id="mercado_ativo" class="tab-pane active">	

		                <div class="card-body fadeInLeft animated">

		                  <div align="right" class="float-right">
		                      <div class="form-check form-check-inline checkbox">
		                        <input class="form-check-input" type="checkbox" name="auto" id="bt_auto" value="1" style="">
		                        <label class="form-check-label btn btn-outline-success" for="bt_auto" style="font-family: sans-serif;" > <i class="glyph-icon icon-refresh"></i> AUTO REFRESH</label>
		                      </div>
		                    </div>

		                  <p class="mt-2 mb-2">
		                    <!--<h3 class="card-title text-left " id="tit_mkt_now">Match Odds</h3>-->
		                    

		                    <div class="open_aqui"></div>
                        <h1><?=$id_mkt?> ---* </h1>
		                    
		                    <p align="center">
		                      <button style="display: none;" id="id_mkt_mo" value="<?=$id_mkt?>" class="btn btn-success bt_refresh tada animated" data-idevento="<? #=$dd->id_evento?>" data-idmkt=""> <i class="glyph-icon icon-refresh"></i> Refresh</button>
		                      <button type="button" class="btn btn-warning btn-large text-center wobble animated infinity" id="bt_mkts"><i class="glyph-icon icon-star"></i> Outros mercados</button>
		                    </p>
		                  </p>

		                </div> <!-- X CARD BODY -->
		            </div> <!--  X  TAB PANE -->

		            <div id="box_graph" class="tab-pane fade">
					    <h3>GRAFICOS</h3>

					    <p>Gráficos de Odds.</p>
					  </div>


	            </div> <!-- X TAB-CONTENT -->

                <? #if($this->session->userdata('id')){ ?>
                <br />
                    <div class="card col-full w-100 bg-success mb-3">
                      
                      <div class="card-body">
                        <strong class="card-title" style="color: #fff">REFRESH AUTO</strong>
                      </div>
                      
                        <ol class="breadcrumb mb-0 bg-white">
                          <li class="breadcrumb-item">


                            <!------------>

                            <!------------>

                            <div class="form-group">
                              <select class="form-control" name="tempo" id="tempo">
                                <option value="3">3 Segundos</option>
                                <option value="5" selected="">5 Segundos</option>
                                <option value="10">10 Segundos</option>
                                <option value="15">15 Segundos</option>
                              </select>
                            </div>

                          </li>
                          <li class="breadcrumb-item">


                            

                          </li>

                        </ol>
                    </div>
                  
                    <? #} ?>



                

              </div>






              
<!--END CARD MODELO -->
              
              <!-- BODOG 
              <div class="card my-1 slideInIp animated">

              
                <div class="card-body fadeInLeft animated">
                  <p class="mt-2 mb-2">


                    <?  if($this->agent->is_mobile()){ ?>
                    <a href="https://record.bettingpartners.com/_DzHLrGq3dIG2a4LA_kpO2MohXDijJpw6/1/"  target="%TARGET%%"><img src="https://cdn4.imagestore.lv/bodog/affiliates/vivo/Vivo_300x250-pt.gif" width="%WIDTH%%" height="%HEIGHT%%" alt="" style="border:none;"/></a>
                    <? }else{ ?>

                   <a href="https://record.bettingpartners.com/_DzHLrGq3dIG2a4LA_kpO2L7OSOjP4e24/1/"  target="%TARGET%%"><img src="https://cdn4.imagestore.lv/bodog/affiliates/vivo/Vivo_728x90-pt.gif" width="%WIDTH%%" height="%HEIGHT%%" alt="" style="border:none;"/></a>

                   <?  } ?>
                    </p>
                  </p>
                </div>

                

              </div> -->




              <!-- BETFAIR -->
              <div class="card my-1 slideInIp animated">

              
                <div class="card-body fadeInLeft animated">
                  <p class="mt-2 mb-2">


                    </p>
                  </p>
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

    <!--<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" /> -->

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  


<!-- JS  CRIADOS -->
<script type="text/javascript">
function testAnim(e,x) {
	$('#'+e).removeClass().addClass(x + ' animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	  $(this).removeClass();
	});
};	




  $(document).ready(function(){

  	



    testAnim("bt_clear","flipInX");

    $('#bt_auto').prop('indeterminate', true);

    var tempo = $("#tempo").val();
    var sec = tempo+"000";

    // get id MO MATCH ODDS 
    $.get("<?=base_url()?>galgos/cao/", function(data){
      //alert(data);
      var id_mkt = "<?=$id_mkt?>";
      var id_mkt_mo = id_mkt;
      $("#link_betfair").show().attr('href','http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/'+id_mkt_mo);
      //var str = id_mkt;
      var res = id_mkt_mo.replace(".", "");
      var mkt_trat = res;
      $("#id_mkt_mo").val(mkt_trat);
      $("#id_mkt_mo").attr('data-idmkt',id_mkt_mo);
      $(".open_aqui").attr('id','mkt'+mkt_trat);

      // carrega MO
      $("#mkt"+mkt_trat).html("<p>Loading...</p>");
      $.get("<?=base_url()?>bets/get_percentual_selecions_light/0/"+id_mkt_mo , function(dataini){
          //alert(data);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $("#mkt"+mkt_trat).html(dataini);

          $("#id_mkt_mo").show();
          testAnim("bt_clear","flipInX");


          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");

                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();


                targetOffset = $("#sel"+selection_id_bet).offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);




              });
              $("#cancel_bet").click(function(){

                $("#footer_bet").hide();

              })
          
        })

    }) 



    <? // if($this->session->userdata('id')){ ?>
      var c=1;
      function auto(){
        c++;
        //console.log("opa  "+c);
        var tempo = $("#tempo").val();
          var sec = tempo+"000";
          if(tempo == c){
            console.log("get..."+c);           
            c = 0;
            
            //alert("foi em "+tempo+" "+c+" sec");
          
          
  //alert("foi");
            $('.bt_refresh').html("aguarde...");
            var id_mkt = $(".bt_refresh").attr('data-idmkt');
            var id_evento = $(".bt_refresh").attr('data-idevento');
            var id_elemento = $(".bt_refresh").attr('id');

            //testAnim_c_class("id_mkt_mo","bounceOutRight"); // desktop

            //alert(id_mkt);
            //return false;

            var str = id_mkt;
            var res = str.replace(".", "");
            var mkt_trat = res;

            //$("#mkt"+mkt_trat).html("Loading...<br /><br />");
            /*
            $("#mkt"+mkt_trat).html("<p>Loading...</p>");
            $("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
            */
            $.get("<?=base_url()?>bets/get_percentual_selecions_light/0/"+id_mkt , function(data){
              //alert(data);
              //$.getScript( "<?=base_url()?>js-front/plugins.js");
              $("#mkt"+mkt_trat).html(data);
              $(".open_aqui").html(data);
             // $("#"+id_elemento).html("Refresh");
              $('.bt_refresh').html("Refresh");
              testAnim("bt_clear","flipInX");


              $(".bt_back").hover(function(){

                $(".back").attr("style","background-color:#00f");

              });

              // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");

                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });
              

              $("#cancel_bet").click(function(){

                $("#footer_bet").hide();

              })
              
            }) // x get
          }
      } // x fn
       
       $("#bt_auto").click(function(){
         <? if(!$this->session->userdata('id')){ ?>
          //alert("logar");
          window.location.href = "<?=base_url()?>home/login";
         <? } ?>

        var check = $('#bt_auto').is(':checked');
        if(check == true){
         // $(".item3").show();
         $("#bt_auto > label").removeClass('btn-outline-success');
         $("#bt_auto > label").addClass('btn-success');
         console.log("ativo  ");
         $(".bt_refresh").html("aguarde...");
          var liga = setInterval(auto,1000);
          testAnim("bt_clear","flipInX");
        }else{
          $("#bt_auto > label").removeClass('btn-success');
          $("#bt_auto > label").addClass('btn-outline-success');
         // $(".item3").hide('slow');
         console.log("desativado  ");
         window.location.href = "<?=base_url()?><?=$this->uri->segment(1)?>/<?=$this->uri->segment(2)?>/<?=$this->uri->segment(3)?>/<?=$this->uri->segment(4)?>";
          //clearInterval(liga);
          //clearInterval(auto);

          // BEEEEEEEEEEETS
          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");
                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });
        }
        
      })
      // setInterval(auto,1000);
      //} // fecha var auto
    

    <? //} // x if sesssion ?>

    $(".bt_refresh").click(function(){
        $(this).html("aguarde...");
        var id_mkt = $(this).attr('data-idmkt');
        var id_evento = $(this).attr('data-idevento');
        var id_elemento = $(this).attr('id');

        //testAnim_c_class("id_mkt_mo","bounceOutRight"); // desktop

        //alert(id_mkt);
        //return false;

        var str = id_mkt;
        var res = str.replace(".", "");
        var mkt_trat = res;

       // $("#mkt"+mkt_trat).html("");

        //$("#mkt"+mkt_trat).html("Loading...<br /><br />");
        /*
        $("#mkt"+mkt_trat).html("<p>Loading...</p>");
        $("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
        */
        $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+id_evento+"/"+id_mkt , function(data){
          //alert(mkt_trat);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          
          $("#mkt"+mkt_trat).html(data);
          $(".open_aqui").html(data);
          $("#"+id_elemento).html("Refresh");
          testAnim("bt_clear","flipInX");

          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");
                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });
          
          
        })

        //$("#mkt"+mkt_trat).html(" kkkk ");
        //alert("Opa 7"+mkt_trat+" - "+id_evento);
    
    }) // x bt_refresh

    $(".bt_mkt").click(function(evt){
      
		    evt.preventDefault();
        var delay;

        delay = setInterval(function(){ 
          // animação para subir o a pagina para o top
          targetOffset = $("#tit_mkt_now").offset().top;
          $('html, body').animate({ 
            scrollTop: targetOffset - 100
          }, 1000);
        }, 600);
       // delay;
        
      // testAnim("tit_mkt_now","bounceOutUp");
        
       // alert("OKK 3");
        var id_mkt = $(this).attr('data-idmkt');
        var id_evento = $(this).attr('data-idevento');
        var id_elemento = $(this).attr('id');

		    //testAnim(id_elemento,"bounceOutRight"); // desktop
        //testAnim(id_elemento,"bounceOutUp");
        testAnim(id_elemento,"flipInX");
        //testAnim("tab_tit","flipInX");
        
        //testAnim("tit_mkt_now","flipInY");
        //alert(id_elemento);

        //return false;
        var str = id_mkt;
        var res = str.replace(".", "");
        var mkt_trat = res;
        var nm_mkt = $("#nm_mkt_"+res).html();
        $("#tit_mkt_now").html(nm_mkt);
        //alert(nm_mk);
        $(".open_aqui").html("<p>Loading...</p>");
        $("#id_mkt_mo").attr('value',res);
        $("#id_mkt_mo").attr('data-idevento',<?=$dd->id_evento?>);
        $("#id_mkt_mo").attr('data-idmkt',id_mkt);

        
        /*
        $("#mkt"+mkt_trat).html('<div class="col-md-12 col-sm-12 col-xs-12" style="height: 150px;"><div class="css3-spinner" style="position: absolute; z-index:auto;"><div class="css3-spinner-bounce1"></div><div class="css3-spinner-bounce2"></div><div class="css3-spinner-bounce3"></div></div></div>');
        */

        $.get("<?=base_url()?>bets/get_percentual_selecions_light/"+id_evento+"/"+id_mkt , function(data){
          //alert(data);
          //$.getScript( "<?=base_url()?>js-front/plugins.js");
          $(".open_aqui").html(data);
          //$("#"+id_elemento).html("Refresh");

          // BEEEEEEEEEEETS
          // BEEEEEEEEEEETS
              $(".bt_back,.bt_lay").click(function(){
                var odd = $(this).attr('data-odd');
                var selection_id_bet = $(this).attr('data-selection_id');
                var id_mkt_bet = $(this).attr('data-id_mkt');
                var lado_bet = $(this).attr('data-lado');
                var nm_selection = $(this).attr('data-nm_selection');

                $("#odd_place").val(odd);
                $("#selection_id_bet").val(selection_id_bet);
                $("#id_mkt_bet").val(id_mkt_bet);
                $("#lado_bet").val(lado_bet);
                $("#nm_selection").html(nm_selection);

                if(lado_bet == 'BACK'){
                  $("#footer_bet").attr("style","background-color:#75c2fd");
                }
                if(lado_bet == 'LAY'){
                  $("#footer_bet").attr("style","background-color:#f694aa");
                }

               // alert("Opa 22");
               $("#footer_bet").show(); $("#valor_place").focus();
               targetOffset = $("#tit_mkt_now").offset().top;
                $('html, body').animate({ 
                  scrollTop: targetOffset - 100
                }, 1000);
              });

          clearInterval(delay);
          
        })

        //$("#mkt"+mkt_trat).html(" kkkk ");
        //alert("Opa 7"+mkt_trat+" - "+id_evento);
    
    }) // x bt_refresh


    $("#bt_exptc").click(function(){
      //alert("OK");
      $("#call_expc").html("Aguarde...");
      $.get("<?=base_url()?>bets/expectativ/<?=$id_evento?>" , function(data){
        $("#call_expc").html(data);

        targetOffset = $("#bt_exptc").offset().top;
        $('html, body').animate({ 
          scrollTop: targetOffset - 100
        }, 1000);

      })
    })  // x bt_expct




  // bt_mkts
  $("#bt_mkts").click(function(){
      //alert("OK");
      //$("#call_expc").html("Aguarde...");
     // $.get("<?=base_url()?>bets/expectativ/<?=$id_evento?>" , function(data){
     //$("#call_expc").html(data);

        targetOffset = $("#mercados").offset().top;
        $('html, body').animate({ 
          scrollTop: targetOffset - 200
        }, 1000);



       /* $('.tit_mkts').removeClass().addClass('animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
          $(this).removeClass();
        }); */

     // })
    })  // x bt_expct
      <?  if($this->agent->is_mobile()){ ?>
        $("#valor_place").focus(function(){
          $("#footer_bet").attr("style","margin-bottom:1em;");
          $("#footer_bet").attr("style","height:30%;");
        });
        $("#valor_place").blur(function(){
          $("#footer_bet").attr("style","margin-bottom:0em;");
          $("#footer_bet").attr("style","height:20%;");
        });
      <? } ?>
    // configura campos
    $("#valor_place,#odd_place").keyup(function() {
              
              //alert( "Handler for .keydown() called." );
              var id_select = $("#selection_id_bet").val();
              var tipo = $("#lado_bet").val();
              var odd = $("#odd_place").val();
              odd = parseFloat(odd);
              var aposta_valor = $("#valor_place").val();
              var lucro_calc =  aposta_valor * odd;
              //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
              var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
              //var lucro_float = lucro.replace(".","");
                //lucro_float = lucro_float.replace(",",".");
              //lucro_float =  parseFloat(lucro_float);
              //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
              var lucro_str = parseFloat(lucro);
              $("#calc").html("Lucro: "+lucro_str);
              $("#sel_balanco_"+id_select).html(parseFloat(lucro));
              //$("#bt_place").attr("value","Apostar: "+lucro_str);
              // percentual
              var soma_t = lucro - aposta_valor;
              //var soma_total_lay = mysql_fetch_assoc($soma_lay);
              var pecentual_ganho = (lucro * 100) / soma_t;
              //$("#lucro_percentual").html(lucro+" "+aposta_valor+" ("+soma_t+")="+pecentual_ganho);
              var soma_t_t = Math.round(soma_t*Math.pow(10,2))/Math.pow(10,2);
              //$("#lucro_percentual").html(parseFloat(soma_t_t));
              var lucro_percentual = parseFloat(soma_t_t);
              //alert(lucro_percentual);
              $("#lay_responsabilidade").html(lucro_percentual+aposta_valor);
              
              if(tipo == "BACK"){
                $("#lucro_percentual").html("Lucro: "+lucro_percentual);
              }
              
              if(tipo == "LAY"){
              $("#lucro_percentual").html("Responsabilidade: "+lucro_percentual);
              }
              
              
            });
    // PLACEBET
    String.prototype.stripHTML = function() {return this.replace(/<.*?>/g, '');}
    $("#bt_place").click(function(){
              <? if(!$this->session->userdata('id')){ ?>
                alert("Faça o Login para efetuar a aposta.");
                return false;
                <? } ?>
              
              var len = $("#valor_place").val();
              var id_mkt = $("#id_mkt_bet").val();
              var id_selection = $("#selection_id_bet").val();
              var tipo = $("#lado_bet").val();
              var size = $("#odd_place").val();
              var valor = $("#valor_place").val();
              /*
              if(len < 2){
                alert("Insira um valor válido");
                $("#valor_place").focus();
                //return false;
              }
              */
              var tit_sel = $("#nm_selection").html();
              var tit_sem_tags = tit_sel.stripHTML();
              var side_tipo = tipo;
               if (confirm('Você confirma sua aposta '+side_tipo+'  no '+tit_sem_tags+' na odd '+size+'?')) {
                $("#bt_place").text('Aguarde...');
                $("#result_place").show();
                $("#result_place").append('<img src="https://tradersize.com/assets2/images/svg-loaders/three-dots.svg" alt="" width="60">');
                $("#result_place").val('aguarde');

                $("#bt_place").attr("disabled","disabled");
              }else{
                return false;
              }
              
              
              //alert("foi");
              
              //alert(tipo);
              
              //alert(parseFloat(size)+" "+parseFloat(valor));
              $.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){
                
                //$("#bt_place").hide();
                $("#bt_place").attr("disabled",false);
                $("#bt_place").text('Apostar');
                $("#result_place").html("");
                //$("#result_place").html(data);
                $(".box_place").hide();
                $("#bt_ok").show();
                $("#result_place").html("Aposta Realizada! - BET ID: "+data);

                $("#bt_ok").click(function(){
                  $("#result_place").html("");
                  $("#result_place").hide();
                  $("#valor_place").val("");
                  $("#id_mkt_bet").val("");
                  $("#selection_id_bet").val("");
                  $("#lado_bet").val("");
                  $("#odd_place").val("");
                  $("#valor_place").val("");
                  $("#calc").html("");
                  $(".box_place").show();
                  $("#footer_bet").hide();
                  $("#bt_ok").hide();

                  if(data.length > 3){
                  	$("#bets_refresh").click();
                  	
                  }


                })

                
                // fecha janela modal
                /*
                $(".badge_new_bet").addClass('bg-yellow');
                $(".bt_apostas").show();
                
                $('#basic-dialog').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                                $(this).removeClass();
                                $("#status_place").val('');
                            });
                */
                //$("#basic-dialog").dialog("close");
                
                //open('right');
                
                
                // abre apostas
                //$('html').addClass('sb-active sb-active-right'); // Add active classes.
                //$(".sb-right").addClass('sb-active');
                //animate($right, '-' + $right.css('width'), 'right'); // Animation
                /*
                setTimeout(function() {
                  rightActive = true;
                  if (typeof callback === 'function') callback(); // Run callback function.
                }, 400); // Set active variables.
                */
                //alert("Opa 22");
              })
              //return false;
            })





    // calcula descida das odds por minutos
    $("#bt_calc_cdom").click(function(){
      var odd_calc = $("#odd_place").val();
      var odd_t = parseFloat(odd_calc);
      
      
      var tempo_jogo = parseFloat($("#tempo_jogo").val());
      var tempo_restante = 90 - tempo_jogo;
      var odd_trat_decimal = odd_t.toFixed(2);
      var odd_trat_decimal = odd_trat_decimal.replace(".", "");
      
     
      if(odd_trat_decimal > 100){
        var odd_trat_cem =  odd_trat_decimal - 100;
      }else{

      }
      
      var cdom = odd_trat_cem / tempo_restante ;// C alculo D escida O dds Minuto
      $("#odds_by_min").val(cdom);

      //alert(tempo_jogo+" "+tempo_restante+" odd: "+odd_trat_decimal+" -100 = "+odd_trat_cem+" CDOM = "+cdom );
      //return false;
    })
      
    

  }) // x ready

  </script>


  <!-- JS MODAL -->
    <? if($this->session->userdata('token')){ ?>
    <script type="text/javascript">

      $(document).ready(function(){







      var tmp = 0;

    $("#bets_refresh").click(function(){
      //alert("Oppa");
      $("#loading_bets").show();
      $("#apostas_abertas").html('');
      $.get("<?=base_url()?>bet/apostas_abertas" , function(data){
        //$("#loading_cont").hide();
        //$(".old_placed").remove();
        $("#apostas_abertas").html('');
        $("#apostas_abertas").append(data);
        $("#loading_bets").hide();
        //$(".pisc").show('slow');
        
        //alert("Opa 3");
        
        
        $('.progressbar').each(function() {
          var bar = $(this);
          var max = $(this).attr('data-value');
    
          progress(max, bar);
        });
        
        
      
      
        $(".bt_cashout").click(function(){
          cashout(this);
        })
        
        
        $(".bt_cancel").click(function(){
          cancel_bet(this);
        })
    
    }); 


  
  
  //}, 7000);
  
  }) // x click
    
  $(".bt_cashout").click(function(){
    cashout(this);
  })
  

  $(".bt_cancel").click(function(){
    cancel_bet(this);
  })

  function cancel_bet(elemento){
    var idbet = $(elemento).attr("data-price");
    $.post('<?=base_url()?>bet/cancel_bet' , {'betId' : idbet } , function(data){
        alert(data);
        $("#idbet"+idbet).hide();
    });
      //alert(idbet+"Opaa6");
  }

}); // x ready
    </script>

    <? } // x if token ?>




  <style type="text/css">
  <?  if($this->agent->is_mobile()){ ?>
    .box_place{
      padding-top: 0.5em
    }
    .col-sm{
      padding-left: 0px;
      padding-right:0px;
    }
    #odd_place , #valor_place{
      border: #ffb80c 1px solid;
      height: 2em;
      width: 5em;
      padding: 0.5em;
      
    }
    .nm_selection{
      font-size: 0.6em;
      padding-left: 0.5em
    }
   <? }else{ ?> 
    .box_place{
      padding-top: 1em
    }

    #odd_place , #valor_place{
      border: #ffb80c 1px solid;
      height: 90%;
      width: 90%;
      padding: 0.5em;
    }

    .bt_back{
      text-align:left;
      cursor:pointer;
      background-color: #dbefff;
      
    }
    .bt_back:hover{
    	background-color:#75c2fd;
    }
    .bt_lay{
      text-align:left;
      cursor:pointer;
      background-color: #fee9ee;
      
    }
    .bt_lay:hover{
    	background-color:lightpink;
    }


   <? } ?>
   .col-sm{
      border:red 0px solid;
    }
    
  </style>
  <footer class="footer navbar-fixed-bottom bounceInUp animated" id="footer_bet" style="display:none "> 
    <input type="hidden"  id="selection_id_bet" />
    <input type="hidden"  id="id_mkt_bet" />
    <input type="hidden"  id="lado_bet" />
    
    
    

    <div class="container box_place">

      <div class="row" style="">
        <div class="col-sm">
          <input type="number" step="0.01" id="odd_place" />
        </div>
        <div class="col-sm">
          <input type="number" step="0.01" id="valor_place" placeholder=" valor " />
        </div>
        <div class="col-sm">
          <button id="bt_place"  class="btn btn-success">Apostar</button>
        </div>
      </div>

        <div class="row">
            <div class="col-sm">
              <label id="nm_selection"></label>
            </div>
        
          

          <div class="col-sm">
            <div id="calc" style="color: green;font-weight: bold;font-size: 1em"></div>
            <label id="lucro"></label>

             <? /* if($this->session->userdata('id') ){ ?>
                <input type="number"  id="tempo_jogo" placeholder="Tempo Jogo" title="Tempo de Jogo (Ex: 75 - de 0 à 90)" style="width: 100px">
                <input type="number" step="0.0001" id="odds_by_min" style="width: 100px" title="Cálculo da Descida das Odds por Minuto">
                <button type="button" id="bt_calc_cdom" class="btn" style="width: 100px;border:#fff 2px solid" title="Cálculo de Descida das Odds por Minuto">CDOM</button>
             <? } */ ?>


          </div>

          <div class="col-sm"  style="margin-top: 0.5em">
            <a id="cancel_bet" style="cursor: pointer;color:red;margin-top: 0.5em" >Cancelar</a>
          </div>
        </div>


      </div>

      <p align="center">

	
        <div class="alert alert-success" id="result_place" style="text-align: center;border:red 0px solid;display: none" align="center" >

        	

        
          
        </div>
        <button  id="bt_ok" class="btn btn-success  btn-lg btn-block" style="display: none;t;">OK</button>
    </p>



  </div>
    
  </footer>

  </body>
</html>