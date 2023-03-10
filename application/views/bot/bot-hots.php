<!DOCTYPE html>
<html class="dark">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">	

		<!-- Basic -->


		<!-- Web Fonts  
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700%7CMontserrat:400,700" rel="stylesheet" type="text/css">-->
	<!-- Última versão CSS compilada e minificada -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>BOT SIZE HOTs</title>

	</head>
	
	<body data-target="#header" data-spy="scroll" data-offset="100">

		<div class="">
			
 
			

				<div id="tour" class="container  card container-lg py-5 my-5">
					<div class="row mb-12 pb-2">
						<div class="col card text-center">
							<? if(!$this->session->userdata('id')){ ?>

							<div class="col-sm-12 col-lg-12 text-center px-0">
								<a href="<?=base_url()?>home/login" class="btn btn-primary" ><i class="fab icon-login login"></i> Login</a>
							</div>
							<? }else{ ?>
							<div class="overflow-hidden">
								<br><br>
								<span class="d-block text-color-light font-weight-bold d-block appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300">Seja Bem Vindo(a) <strong style="color: #ffb900"><?=$this->session->userdata('nome')?></strong> </span>
								<span>Saldo:  <?=$this->bet_model->get_fundos()->availableToBetBalance?></span>
								<span> | Stake:  <input type="text" id="stake" value="5"  placeholder="Stake de entrada" /></span>

								<br>
								<p><a href="<?=base_url()?>bothot" class="btn btn-success">Reset</a></p>
							</div>
							<div class="overflow-hidden">
								<? #if($this->session->userdata('id') == 5){ ?>
								<!--<a href="https://identitysso.betfair.com/view/vendor-login?client_id=74154&response_type=code&redirect_uri=<?=base_url()?>bet" target="_blank">Entrar na Betfair</a>-->
								<? #} ?>

								<a href="https://identitysso.betfair.com/view/vendor-login?client_id=74154&response_type=code&redirect_uri=loginbetfair/login.php" target="_blank">Entrar na Betfair (<?=$this->session->userdata('id')?>)</a>
								 - 
								<a href="<?=base_url()?>bot/a2" class="d-block text-color-light font-weight-bold d-block appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300" target="_blank"><i class="icon-logout icons"></i> Resultados</a>

								-

								<a href="<?=base_url()?>bet/sair" class="d-block text-color-light font-weight-bold d-block appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="300"><i class="icon-logout icons"></i> Sair</a>
							</div>

							<hr />

							<h5 id="entradas">Link de entrada </h5>

							<hr>
							<h3>Pegar Mercados</h3>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<a href="<?=base_url()?>botbet/get_mkt_evento/MATCH_ODDS" target="_blank" class="btn btn-warning ">	MATCH ODDS</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_05" target="_blank" class="btn btn-warning ">0.5 FT</a>

								<a href="<?=base_url()?>botbet/get_mkt_evento/FIRST_HALF_GOALS_05" target="_blank" class="btn btn-warning ">0.5 HT</a>

								<a href="<?=base_url()?>botbet/get_mkt_evento/FIRST_HALF_GOALS_15" target="_blank" class="btn btn-warning ">1.5 HT</a>

								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_15" target="_blank" class="btn btn-warning ">1.5 FT</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_25" target="_blank" class="btn btn-warning ">2.5 FT</a>
								<a href="<?=base_url()?>botbet/get_mkt_evento/OVER_UNDER_35" target="_blank" class="btn btn-warning ">3.5 FT</a>
							</div>
							<hr />

							<br />
							<h3>Pegar Odds</h3>
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<center>
								<button value="0" class="btn btn-default btn-lg btn-larger bt_mkt">Match Odds <br> (Ativar)</button><br /><br />
								
								<button value="05" class="btn btn-default btn-lg bt_mkt">OVER 0.5 FT</button>
								<button value="005" class="btn btn-default btn-lg bt_mkt">OVER 0.5 HT</button>
								<button value="015" class="btn btn-default btn-lg bt_mkt">OVER 1.5 HT</button>

								<button value="1" class="btn btn-default btn-lg bt_mkt">OVER 1.5</button>
								<button value="2" class="btn btn-default btn-lg bt_mkt">UNDER 2.5</button>
								<button value="3" class="btn btn-default btn-lg bt_mkt">OVER 3.5</button>
							</center>
						
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


		<audio id="som_click">
		   <source src="<?=base_url()?>includes/bt.mp3" type="audio/mp3" />
		</audio>

		<audio id="som_pegando">
		   <source src="<?=base_url()?>includes/bt_mkt.mp3" type="audio/mp3" />
		</audio>
<script src="https://code.jquery.com/jquery-git.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		//alert("OK");

		$(".bt_mkt").click(function(){
			var val = $(this).val();
			$(this).removeClass("btn-default");
			$(this).addClass("btn-success");

			var som_click = document.getElementById('som_click');
			som_click.play(); 
			//get_mkt(val)
			 $('#geting').append("<div class='col-md-4' id='mkt"+val+"' style='border:green 1px solid;padding:10px'>Aguarde "+val+" </div>");   
			  //var cont[n_mkt] = 0;
			  var c = 0;
			  setInterval(function(){ c++;  //cont[n_mkt]++;
			  					if(c == 2){
			  						var som_pegando = document.getElementById('som_pegando');
									som_pegando.play(); 
			  					}
			  					$.get("<?=base_url()?>botbet/get_odds_mkt_a2/"+val+"/hot" , function(data){
									//alert(data);
									$("#mkt"+val).html(data);
								});		
			  }, 3000); 




			//alert("OK "+val);
			//var myVar = setInterval(get_mkt, 3000);
		})
	}) // x ready


	
function get_mkt(n_mkt) {
  $('#geting').append("<div id='mkt"+n_mkt+"'>Aguarde "+n_mkt+" </div>");   
  //var cont[n_mkt] = 0;
  var c = 0;
  setInterval(function(){ c++;  //cont[n_mkt]++;
  					$.get("<?=base_url()?>botbet/get_odds_mkt_a2/"+n_mkt+"/hot" , function(data){
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
