<!DOCTYPE html>
<html class="dark">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">	

		<!-- Basic -->


		<!-- Web Fonts  
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700%7CMontserrat:400,700" rel="stylesheet" type="text/css">-->
	<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>
	
	<body data-target="#header" data-spy="scroll" data-offset="100">

		<div class="">
			
 
			

				<div id="tour" class="container  card container-lg py-5 my-5">
					<div class="row mb-12 pb-2">
						<div class="col card text-center">
							<? $a = 0; if($a < 0){ ?>

							<div class="col-sm-12 col-lg-12 text-center px-0">
								<a href="<?=base_url()?>home/login" class="btn btn-primary" ><i class="fab icon-login login"></i> Login</a>
							</div>

							<? }else{ ?>
						

						

							<hr />
							<!--
							<h5 id="entradas">Link de entrada </h5>
							<!--
							<hr>
							<h3>Pegar Mercados</h3>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_05" target="_blank" class="btn btn-warning ">0.5 FT</a>

								<a href="<?=base_url()?>botbet/get_mkt_evento/FIRST_HALF_GOALS_05" target="_blank" class="btn btn-warning ">0.5 HT</a>

								<a href="<?=base_url()?>botbet/get_mkt_evento/FIRST_HALF_GOALS_15" target="_blank" class="btn btn-warning ">1.5 HT</a>

								<a href="<?=base_url()?>botbet/get_mkt_evento/FIRST_HALF_GOALS_25" target="_blank" class="btn btn-warning ">2.5 HT</a>

								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_15" target="_blank" class="btn btn-warning ">1.5 FT</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_25" target="_blank" class="btn btn-warning ">2.5 FT</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_35" target="_blank" class="btn btn-warning ">3.5 FT</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_45" target="_blank" class="btn btn-warning ">4.5 FT</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_55" target="_blank" class="btn btn-warning ">5.5 FT</a>


								<a href="<?=base_url()?>botbet/get_mkt_evento/BOTH_TEAMS_TO_SCORE" target="_blank" class="btn btn-warning ">BTS</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/DRAW_NO_BET" target="_blank" class="btn btn-warning ">DNB</a>
							</div>
							<hr />
						-->

							<br />
							<h3>Bot Horses</h3>
							<p>
								
								<a target="_blank" href="https://thrmovers.com/php/admin.html" class="btn btn-primary">Painel</a>

								<a href="<?=base_url()?>bot_horses" class="btn btn-success">Atualizar Página</a>



								
							</p>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<!--<button value="0" class="btn btn-default bt_mkt">Match Odds</button> -->
								<!--<button value="1.173764056" class="btn btn-default bt_mkt">Pegar Corrida</button> -->

								<? if($qr_win_fila->num_rows() > 0){ ?>

									<? foreach($qr_win_fila->result() as $dd_win){ ?>
										<?
										$qr_num = $this->db->query("SELECT DISTINCT selection_id FROM odds_mkt_horses_dia WHERE id_mkt = '".$dd_win->marketId."' ");
										?>
										<button id="bt_mkt_<?=str_replace(".","",$dd_win->marketId)?>" value="<?=$dd_win->marketId?>" class="btn btn-default bt_mkt"><?=$dd_win->local?> <?=substr($dd_win->data_timezone,10,10)?> (<?=$qr_num->num_rows()?>)</button>
									<? } ?>

								<? } ?>
								
								
							</div>

							<div id="geting" class="row" style="display: block;border: orange 1px solid;position: relative;">
							<? } ?>
						</div>
					</div>
				</div>

				<br /><br /><br /><br /><br />
						
					

					<div class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">


					</div>


				</div>



			

			</div> 

			
		</div>
<script src="https://code.jquery.com/jquery-git.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		//alert("OK");

		$(".bt_mkt").click(function(){
			var val = $(this).val();
			var id_class = val.replace(".","");
			$(this).removeClass("btn-default");
			$(this).addClass("btn-success");
			//get_mkt(val)
			 $('#geting').append("<div class='col-md-4' id='mkt"+id_class+"' style='border:green 1px solid;padding:10px'>Aguarde "+id_class+" </div>");   
			  //var cont[n_mkt] = 0;
			  function start(){
			  	//alert("FOI 2");
				  var c = 0;
				  var bt = "";
				 var add = setInterval(function(){ c++;  //cont[n_mkt]++;
				  					$.get("<?=base_url()?>horses/get_bsp/"+val , function(data){
										//alert(data);
										$("#mkt"+id_class).html(data);
										bt = "<br /><p><button id='mkt_close"+id_class+"' class='btn btn-warning'>Fechar *</button></p>";
										$("#mkt"+id_class).append(bt);

										$("#mkt_close"+id_class).click(function(){
											clearInterval(add);
											$("#mkt"+id_class).remove();
											$("#bt_mkt_"+id_class).removeClass("btn-success");
											$("#bt_mkt_"+id_class).addClass("btn-danger");

											//alert("Fechou");

										});


									});		
				  }, 6000); 
				}
				start();






			//alert("OK "+val);
			//var myVar = setInterval(get_mkt, 3000);
		})
	}) // x ready


	
function get_mkt(n_mkt) {
  $('#geting').append("<div id='mkt"+n_mkt+"'>Aguarde "+n_mkt+" </div>");   
  //var cont[n_mkt] = 0;
  var c = 0;
  setInterval(function(){ c++;  //cont[n_mkt]++;
  					$.get("<?=base_url()?>botbet/get_odds_mkt_a2/"+n_mkt , function(data){
					alert(data);
					
					//$(".tb_partidas").remove();
					//$("#odds").append(data);
					
				});		
  	//alert(c);
  	/*$.get("<?=base_url()?>botbet/get_odds_mkt_a2/" , function(data){
  		alert(c);
  		//$("#mkt"+n_mkt).html("over "+data+" "+c);	
  		$("#mkt"+n_mkt).html("foi  "+c);	
  	});*/
  	
  }, 3000); 

  //var d = new Date();
  //var t = d.toLocaleTimeString();
  //document.getElementById("demo").innerHTML = t;
}

function parar_bet_mkt(fn) {
  clearInterval(fn);
}
</script>
		


	</body>
</html>
