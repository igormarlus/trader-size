<!DOCTYPE html> 
<html lang="en">
<head>

    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
		#loading_cont {margin-left: 50%;}

.back{
	background-color: lightblue;
	float: left;
	width:200px;
	display: block;
}
.lay{
	background-color: pink;
	width:200px;
	display: block;
}

    </style>


    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> ---
<?=$dd_evento->evento?>
</title>



    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-core.js"></script>

    
	<!--<script type="text/javascript" src="<?=base_url()?>js/betfair.js"></script>-->

    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        	
		//	setInterval(function(){  
          /*  $.get("<?=base_url()?>bet/get_odds_only/<?=$id_jogo?>/<?=$id_mkt?>/<?=$type?>" , function(data){
					$("#loading_cont").hide();
					$(".tb_partidas").remove();
					$("#odds").append(data);
					$(".pisc").show('slow');
					//return false;
			});	*/
      //  } , 3000);


			// get odds
			var contador = 0;
			var n_runner = "";
			var s_sel_json = "";
			var u_last_odd_json = "";
			var u_last_size_json = "";
			var nm_class_odd = "";
			var odd_now = ""; // verificar se esta usando 
			var nm_last_price = 0;
			var odd_atual = 0;
			var size_now = "";
			var existe = 0;
			// array precos e volumes
			var preco_back_arr = [];
			var vol_back_arr = [];
			var preco_lay_arr = [];
			var vol_lay_arr = [];
			var cont_b = 0;
			var cont_l = 0;
			var somaback = 0;
			var somalay = 0;
			setInterval(function(){  contador++;
				//alert(<?=$type?>);
				$.getJSON("<?=base_url()?>bet/get_odds_sel/<?=$id_jogo?>/<?=$id_mkt?>" , function(data){
					//return false;
					var ss = 0;
					 $.each(data, function( ticker, last ){
				          //ultimo_btc = last;
				         //console.log(ticker+" - "+last);
				         if(ticker == 'numberOfRunners'){
				         	n_runner = last;
				         }
				         // pegar status
				         if(ticker == 'status'){
				         	$("#status_now").html(last);
				         }

				          if(ticker == 'betDelay'){
				         	$("#delay").html(last);
				         }
				         //status
				         // 
				         if(ticker == "runners"){ 
				         	 for(var r=0; r<n_runner;r++){
				         	 	somaback = 0;
				         	 	somalay = 0;
						         $.each(last[r], function( ticker2, last2 ){
						         	if(ticker2 == "selectionId"){
						         		s_sel_json = last2;
						         	}
						         	if(ticker2 == "lastPriceTraded"){
						         		//u_last_odd_json = last2;
						         		//var u_last_str = String(u_last_odd_json);
						         		//u_last_trat = u_last_str.replace(".","_");
						         		//nm_class_odd = "o_"+s_sel_json+"_"+u_last_trat;
						         		odd_atual = last2;
						         		//console.log("atual "+last2);
						         	}
						         	var cont_b = 0;
						         	var cont_l = 0;
						         	if(ticker2 == "ex"){
						         		$.each(last2.availableToBack, function( tickerb, lastb ){
						         				$.each(lastb, function( tickerbb, lastbb ){
						         						// get odd
						         						if(tickerbb == 'price'){
						         							cont_b++;
						         							preco_back_arr[cont_b] = lastbb;
						         							odd_now = lastbb;
											         		var u_last_str = String(odd_now);
											         		u_last_trat = u_last_str.replace(".","_");
											         		if("<?=$type?>" == 'vertical'){
											         			nm_class_odd = "o_"+s_sel_json+"_"+u_last_trat+"b";
											         		}
											         		if("<?=$type?>" == 'box'){
											         			nm_last_price = "last_"+s_sel_json+"_b";
											         			nm_class_odd = "v_"+s_sel_json+"_b";
											         			nm_class_odd_atual = "p_"+s_sel_json+"_b";
											         			if(cont_b == 1){
							         								$("."+nm_class_odd_atual).html(lastbb);
							         							}
											         		}
											         		
						         						}
						         						// get volume
						         						if(tickerbb == 'size'){
						         							size_now = lastbb;
						         							if("<?=$type?>" == 'vertical'){
							         							$(".volume"+nm_class_odd).html(size_now);
							         						}
							         						if("<?=$type?>" == 'box'){
							         							$("."+nm_last_price).html(odd_atual);
							         							$("."+nm_class_odd).html(size_now);
							         							somaback += size_now;
							         							
							         						}
						         						}
						         						//alert($("."+nm_class_odd+" > .volume ").html());
								         				//alert("Back: "+tickerbb+" "+lastbb+" Class: "+nm_class_odd+" Size: "+size_now);
								         				// verifica se a class existe
										         		/*
										         		if("<?=$type?>" == 'vertical'){
										         			existe = $("."+nm_class_odd).length;
											         		if ( existe == 0 ){
															  // faça algo
															  // carrega novas odds
															  //$("#load_tr").append(data); 
															 $.get("<?=base_url()?>bet/get_odds_only/<?=$id_jogo?>/<?=$id_mkt?>/<?=$type?>" , function(data){
																		$(".tb_partidas").remove();
																		$("#odds").append(data);
																});	
															} 
														} */

														//if(odd_now > 1.90 && odd_now < 2.2){
														//if(odd_now > 3.90 && odd_now < 4.50){
														
														if(odd_now < 2.05){	
											         		var jaentrou = $("#jaentrou").val();
											         		if(jaentrou == 0){

												         		
												         		//alert("-> @"+odd_now+"("+s_sel_json+")");

												         		// realiza entrada
												         		var id_mkt = "<?=$this->uri->segment(4)?>";
																var id_selection = s_sel_json;
																var tipo = "BACK";
																//var size = odd_now;
																var size = 1.5;
																//var valor = 2;
																//var valor = 0.10;
																var valor = 4;
																// if( $("#check"+s_sel_json).is(':checked') ){
																 	$("#estasel").html("Está selecionado (Odd): "+s_sel_json);

																 	$("#jaentrou").val("1");
																 	var name_horse = $("#sel"+s_sel_json).html();
																	$("#estasel").html("Entrando (odd) em.... "+s_sel_json+"("+name_horse+")");
																	$.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) , 'bot_tipo' : 'por odd' } , function(data){
																		
																		//alert(data);
																		$("#callback").html(data);
																		$("#selecao_select").val(id_selection);
																		$("#jaentrou").val("1");
																		$("#horse_entrada").html(" Por Odd -> @"+size+"("+id_selection+")");
																		
																		jaentrou = 1;
																		
																	});
																//}else{
																//	$("#estasel").html("n selecionado: "+s_sel_json);
																	//$("#jaentrou").val("0");
																//}
																//$("#jaentrou").val("1");
																
															} // x if entrou
											         	} // x if 

											         	// tipo de modo de visualização = $type
								         				//console.log(cont_b+" --> Back: "+tickerbb+" "+lastbb+" Class: "+nm_class_odd+" Size: "+size_now+" ["+existe+"]");
								         				
								         		}) // x each lastb
								         		//console.log(n_runner+" BACK "+s_sel_json);
								         		var str_soma = somaback.toFixed(2).split('.');
											    str_soma[0] = str_soma[0].split(/(?=(?:...)*$)/).join('.');
											    str_soma = str_soma.join(',');
								         		$(".somaback"+s_sel_json).val(str_soma);
								         		$("#somaback"+s_sel_json).html(str_soma);
								         		$(".total_somaback"+s_sel_json).html("$"+str_soma);
						         				//alert(tickerb+" "+lastb);
						         		})
						         		$.each(last2.availableToLay, function( tickerl, lastl ){
						         				$.each(lastl, function( tickerll, lastll ){
								         				//alert("Lay: "+tickerll+" "+lastll+" Class: "+nm_class_odd);
								         		
								         			$.each(lastl, function( tickerll, lastll ){
							         						if(tickerll == 'price'){
							         							odd_now = lastll;
												         		var u_last_str = String(odd_now);
												         		u_last_trat = u_last_str.replace(".","_");
												         		nm_class_odd = "o_"+s_sel_json+"_"+u_last_trat+"l";
							         						}
							         						if("<?=$type?>" == 'box'){
							         							nm_last_price = "last_"+s_sel_json+"_l";
											         			nm_class_odd = "v_"+s_sel_json+"_l";
											         			nm_class_odd_atual = "p_"+s_sel_json+"_l";
											         		}
							         						if(tickerll == 'size'){
							         							size_now = lastll;
							         							//$(".volume"+nm_class_odd).html(size_now);
							         							if("<?=$type?>" == 'vertical'){
								         							$(".volume"+nm_class_odd).html(size_now);
								         						}
								         						if("<?=$type?>" == 'box'){
								         							$("."+nm_last_price).html(odd_atual);
								         							$("."+nm_class_odd).html(size_now);
								         							$("."+nm_class_odd_atual).html(odd_atual);
								         							somalay += size_now;
								         						}


							         						}
							         						/* fim linha 292
							         						if(size_now > 5000){	
							         							
											         		var jaentrou = $("#jaentrou").val();
											         		if(jaentrou == 0){
												         		
												         		//alert("-> @"+odd_now+"("+s_sel_json+")");

												         		// realiza entrada
												         		var id_mkt = "<?=$this->uri->segment(4)?>";
																var id_selection = s_sel_json;
																var tipo = "BACK";
																var size = odd_now;
															$("#horse_entrada").html(size_now+" "+id_selection);
																//var valor = 2;
																var valor = 0.10;
																// if( $("#check_vol"+id_selection).is(':checked') ){
																	$("#jaentrou").val("1");
																	$("#estasel").html("Entrando (Size) em.... "+s_sel_json);
																	$.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) , 'bot_tipo' : 'por volume' } , function(data){
																		//alert(data);
																		
																		$("#callback").html(data);
																		$("#selecao_select").val(id_selection);
																		$("#jaentrou").val("1");
																		$("#horse_entrada").html(" Por volume -> @"+size+"("+id_selection+")");
																		//jaentrou = 1;
																		//$("#jaentrou").val("1");
																		$("#jaentrou").val("1");
																		$("#horse_vol").val(id_selection);
																	});
																	
																//}else{
																//	alert("n selecionado");
																//	$("#jaentrou").val("0");
																//}

																
																
															} // x if entrou
											         	} // x if */
							         						//alert($("."+nm_class_odd+" > .volume ").html());
									         				//alert("Back: "+tickerbb+" "+lastbb+" Class: "+nm_class_odd+" Size: "+size_now);
									         				//console.log("Lay: "+tickerll+" "+lastll+" Class: "+nm_class_odd+" Size: "+size_now);
									         		})

								         	//console.log(" LAY "+s_sel_json);	
								         	var str_soma = somalay.toFixed(2).split('.');
										    str_soma[0] = str_soma[0].split(/(?=(?:...)*$)/).join('.');
										    str_soma = str_soma.join(',');
							         		//$(".somalay"+s_sel_json).html(str_soma);
							         		$(".somalay"+s_sel_json).val(str_soma);
								         	$("#somalay"+s_sel_json).html(str_soma);
								         	$(".total_somalay"+s_sel_json).html("$"+str_soma);
								         }) // x each lay lastll
						         				//alert(tickerl+" "+lastl);
						         		}) // x each lastl
						         		
						         	}
						          	//alert(r+" - "+ticker2+ " " + last2+"( "+ n_runner +" )");
						     	 });
						     	// alert("ID seleção: "+s_sel_json+" | @"+u_last_odd_json+" Class:"+nm_class_odd);
						     	 $("."+nm_class_odd+" > .preco ").css("color:blue");
						     	 
						     } // x for
				     	 }

				     	 /////////// TESTE SOMA BACK/LAY
				     	 // CALCULO BACK
	      				var total_sel_back = 0;
	      				var total_sel_lay = 0;
	      				var qtd_sel_back = $(".sel_soma_back").length;
	      				var subtotal = 0;
	      				var size_back = 0;
	      				var size_lay = 0;
	      				//console.log(" opa 2 "+qtd_sel_back);
			     		for(var s=0; s<qtd_sel_back; s++){
			     			subtotal =  $(".sel_soma_back").eq(s).val(); 
			     			subtotal = parseFloat(subtotal);
			     			total_sel_back = parseFloat(total_sel_back);
			     			total_sel_back += subtotal;
			     			var id_sel = $(".sel_soma_back").eq(s).attr('id');  
			     			//console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel_back);
			     			//size_back = $("#somaback"+s_sel_json).html();
			     			//$("#somaback"+s_sel_json).html(sizeback+subtotal);
			     		}
			     		//console.log(total_sel);
			     		for(var s=0; s<qtd_sel_back; s++){
			     			var id_sel = $(".sel_soma_back").eq(s).attr('id');  
			     			var subt = parseFloat($(".sel_soma_back").eq(s).val()); 
			     			//subt = Math.round(subt);
			     			var pecentual_back = (subt * 100) / total_sel_back;
			     			var str_porc = Math.round(pecentual_back);
			     			$("#"+id_sel+"_porc_b").html(str_porc);
			     			//console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_back+"% Total: "+total_sel_back);
			     		}

			     		// CALCULO LAY
			     		var total_sel_lay = 0;
	      				var qtd_sel_lay = $(".sel_soma_lay").length;
	      				var subtotal = 0;
	      				//console.log(" opa 2 "+qtd_sel_back);
			     		for(var s=0; s<qtd_sel_lay; s++){
			     			subtotal =  $(".sel_soma_lay").eq(s).val(); 
			     			subtotal = parseFloat(subtotal);
			     			total_sel_lay = parseFloat(total_sel_lay);
			     			total_sel_lay += subtotal;
			     			var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
			     			//console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel);
			     		}
			     		//console.log(total_sel);
			     		for(var s=0; s<qtd_sel_lay; s++){
			     			var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
			     			var subt = parseFloat($(".sel_soma_lay").eq(s).val()); 
			     			//subt = Math.round(subt);
			     			var pecentual_lay = (subt * 100) / total_sel_lay;
			     			var str_porc = Math.round(pecentual_lay);
			     			//var str_porc = parseInt(pecentual_lay);
			     			$("#"+id_sel+"_porc_l").html(str_porc);
			     			//console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_lay+"% Total: "+total_sel);
			     		}
			     		console.log(s_sel_json+" - "+total_sel_back);
			     		$(".totalback_perc"+s_sel_json).html("Back:::"+total_sel_back);
			     		// XXXX SOMA BACK*LAY

			     		

				         //alert(ticker+" "+last);
				         /* if(ticker == 'selectionId')  { ss++;
				          	var selection_id = last;
				          	alert("Sel: "+ss+" "+selection_id);
				          }  
				          */
				          
				          //alert(ticker+" - "+last);
				     });	 
					
					//
					//var obj = JSON.parse(data);
					//var qtd = obj.length;
			       // alert(qtd);
			       
					//$("#valor_total_only").text(data);
					
					//$("#loading_cont").hide();
					//$(".tb_partidas").remove();
					//$("#odds").append(data);
					//$(".pisc").show('slow');
					//return false;
					
					// por MIM
					//alert("OK 1 a");
					
					$(".set_odd").click(function(){
						//alert("OK 2 b");
						// RESET
						$("#valor_place").val("");
						$("#lay_responsabilidade").html("");
						$("#dd_lay").val("");
						$("#calc").html("");
						$("#result_place").html("Resultado");
						var id_select = $(this).attr('title');
						//var odd = $(this).parent().text();
						//var odd = $(this).children().first().html();
						var odd = $(this).attr('lang');
						
						// pega o nome  da selação
						var tit_sel = $("#sel"+id_select).html();
						//alert(tit_sel);
						<? if($this->uri->segment('5') == 'vertical'){ ?>
						// balanço
							var balanco_atual = $("#balanco_atual").text();
							//alert(balanco_atual);
							$("#valor_place").val(balanco_atual);
						<? } ?>
						//alert(odd);
						
						//alert(odd);
						//var odd =  = $(this).attr('dir');
						//var odd = $(this+":first").html();
						
						if($(this).hasClass('back')){
							var tipo = 'BACK';
							//$("#dd_lay").hide();
						}
						
						if($(this).hasClass('lay')){
							var tipo = 'LAY';
							//$("#dd_lay").show();
						}
						//alert(odd);
						
						$("#bt_place").text('Apostar: '+tit_sel+" - "+tipo);
						
						$("#odd_place").val(odd);
						$("#id_select").val(id_select);
						$("#tipo").val(tipo);
						
                           
						$("#basic-dialog").dialog({
							modal: true,
							minWidth: 300,
							minHeight: 100,
							closeOnEscape: true,dialogClass: "",
							show: "fadeIn"
						});
						$('.ui-widget-overlay').addClass('bg-green opacity-60');
						
						$("#valor_place").focus();
						
						//#valor_place #odd_place
						/*
						$("#valor_place").keyup(function() {
							var odd_place = $(this).val();
							alert(val_odd);
						});
						*/
						$("#valor_place").keyup(function() {
							
						  //alert( "Handler for .keydown() called." );
						  var aposta_valor = $("#valor_place").val();
						  var lucro_calc =  aposta_valor * odd;
						  //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
						  var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
						  //var lucro_float = lucro.replace(".","");
					      //lucro_float = lucro_float.replace(",",".");
						  //lucro_float =  parseFloat(lucro_float);
						  //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
						  $("#calc").html(parseFloat(lucro));
						  $("#sel_balanco_"+id_select).html(parseFloat(lucro));
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
						$('#valor_place').on('change',function() {
						  //alert( "Handler for .keydown() called." );
						  var aposta_valor = $("#valor_place").val();
						  var lucro_calc =  aposta_valor * odd;
						  //var lucro = lucro_calc.toLocaleString("pt-BR", { style: "currency" });
						  var lucro = Math.round(lucro_calc*Math.pow(10,2))/Math.pow(10,2);
						  //var lucro_float = lucro.replace(".","");
					      //lucro_float = lucro_float.replace(",",".");
						  //lucro_float =  parseFloat(lucro_float);
						  //$("#calc").html(aposta_valor+" * "+odd+ " = "+lucro);
						  $("#calc").html(parseFloat(lucro));
						  
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
						
						
						
						
						$("#bt_place").click(function(){
							
							var len = $("#valor_place").val();
							
							if(len < 2){
								alert("Insira um valor válido");
								$("#valor_place").focus();
								//return false;
							}
							var side_tipo = $("#tipo").val();
							// if (confirm('Você confirma sua aposta '+side_tipo+'  no '+tit_sel+' ?')) {
								$("#bt_place").text('Aguarde...');
								$("#status_place").val('aguarde');

								$("#bt_place").attr("disabled","disabled");
							//}else{
							//	$("#bt_place").attr("disabled","");
							//	return false;
							//}
							
							
							
							
							//alert(tipo);
							var id_mkt = $("#id_mkt").val();
							var id_selection = $("#id_select").val();
							var tipo = $("#tipo").val();
							var size = $("#odd_place").val();
							var valor = $("#valor_place").val();
							//alert(parseFloat(size)+" "+parseFloat(valor));
							$.post('<?=base_url()?>bet/place_bet' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){
								
								//$("#bt_place").hide();
								$("#bt_place").attr("disabled",false);
								$("#bt_place").text('Apostar');
								$("#result_place").html("");
								$("#result_place").html(data);
								// fecha janela modal
								
								$(".badge_new_bet").addClass('bg-yellow');
								$(".bt_apostas").show();
								
								$('#basic-dialog').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                            $(this).removeClass();
                            $("#status_place").val('');
                        });
								
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
						
						//alert(id_select+" "+odd);
						
					})
					
					// pie porcentagens
					if(contador > 3){
					
						
					}
					/*
					$('.set_odd').on('touchend click', function(event) {
						eventHandler(event, $(this)); // Handle the event.
						toggle('left'); // Toggle the left Slidbar.
						var id_select = $(this).attr('title');
						//var odd = $(this).parent().text();
						var odd = $(this).children().first().html();
						//var odd =  = $(this).attr('dir');
						//var odd = $(this+":first").html();
						alert(id_select+" "+odd);
						toggle('left');
					});
					
					*/
					
					$(".bt_cashout").click(function(){
						//alert("Opa 10");
						
						
						 if (confirm('Você confirma seu Cashout ?')) {
								cashout(this);
							}else{
								return false;
							}
						
					})
	
	
	
		function cashout(elemento){						
								//var len = $("#valor_place").val();
								var id_mkt = $(elemento).val();
								var id_selection = $(elemento).attr('title');
								var tipo = $(elemento).attr('data-type');
								var size = $(elemento).attr('data-direction');
								var valor = $(elemento).attr('data-title');


								//alert("Info: "+id_mkt+" - "+id_selection+" "+tipo+" Size: "+size+" Price:"+valor);
								//return false;
								//alert("Opa3");
								//return false;

								// aguarde
								$("#pre_cash").show();
								$(".bt_cashout").hide();


								//alert(tipo);
								//var id_mkt = $("#id_mkt").val();
								//var id_selection = $("#id_select").val();
								//var tipo = $("#tipo").val();
								//var size = $("#odd_place").val();
								//var valor = $("#valor_place").val();
								//alert(parseFloat(size)+" "+parseFloat(valor));
								var x=0;
								$.post('<?=base_url()?>bet/cashout' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){ x++;
									alert("dat: "+data);
									alert("Cashout bem Sucedido!");
									if(x > 1){
										$("#pre_cash").hide();
										$(".bt_cashout").show();
									}


								})
								//return false;
		}
					
					//alert("a");
				});		
				
			}, 300);
		});



		// calcula porcentagens
      	// calcula total back
      	setInterval(function(){  
      		/*
      				// CALCULO BACK
      				var total_sel = 0;
      				var qtd_sel_back = $(".sel_soma_back").length;
      				var subtotal = 0;
      				//console.log(" opa 2 "+qtd_sel_back);
		     		for(var s=0; s<qtd_sel_back; s++){
		     			subtotal =  $(".sel_soma_back").eq(s).val(); 
		     			subtotal = parseFloat(subtotal);
		     			total_sel = parseFloat(total_sel);
		     			total_sel += subtotal;
		     			var id_sel = $(".sel_soma_back").eq(s).attr('id');  
		     			console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel);
		     		}
		     		//console.log(total_sel);
		     		for(var s=0; s<qtd_sel_back; s++){
		     			var id_sel = $(".sel_soma_back").eq(s).attr('id');  
		     			var subt = parseFloat($(".sel_soma_back").eq(s).val()); 
		     			//subt = Math.round(subt);
		     			var pecentual_back = (subt * 100) / total_sel;
		     			var str_porc = Math.round(pecentual_back);
		     			$("#"+id_sel+"_porc_b").html(str_porc);
		     			console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_back+"% Total: "+total_sel);
		     		}

		     		// CALCULO LAY
		     		var total_sel = 0;
      				var qtd_sel_lay = $(".sel_soma_lay").length;
      				var subtotal = 0;
      				//console.log(" opa 2 "+qtd_sel_back);
		     		for(var s=0; s<qtd_sel_lay; s++){
		     			subtotal =  $(".sel_soma_lay").eq(s).val(); 
		     			subtotal = parseFloat(subtotal);
		     			total_sel = parseFloat(total_sel);
		     			total_sel += subtotal;
		     			var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
		     			//console.log(s+" id: "+id_sel+" tem "+subtotal+" de "+total_sel);
		     		}
		     		//console.log(total_sel);
		     		for(var s=0; s<qtd_sel_lay; s++){
		     			var id_sel = $(".sel_soma_lay").eq(s).attr('id');  
		     			var subt = parseFloat($(".sel_soma_lay").eq(s).val()); 
		     			//subt = Math.round(subt);
		     			var pecentual_lay = (subt * 100) / total_sel;
		     			var str_porc = Math.round(pecentual_lay);
		     			//var str_porc = parseInt(pecentual_lay);
		     			$("#"+id_sel+"_porc_l").html(str_porc);
		     			//console.log(s+" id: "+id_sel+" tem ("+subt+") "+pecentual_lay+"% Total: "+total_sel);
		     		}
		     		*/
            
			
        } , 1000);
     		
	
    </script>



</head>


<body>
	
<div id="sb-site">

    <? #include("includes/bet/favoritos.php"); ?>

<div class="sb-slidebar bg-black sb-right sb-style-overlay">
<? # include("includes/bet/place_trader-din.php"); ?>
</div>
    <div id="loading">
        <div class="svg-icon-loader">
          
        </div>
    </div>
    
    <input type="text" id="status_place" value="" name="">
    <input type="text" id="jaentrou" value="0" name="">
    <input type="text" value="000" id="selecao_select">
    <p  id="callback"></p>
    <hr>
    <input id="horse_vol"></div>
    <p  id="estasel" style="border:red 1px solid;height:20px" ></p>
    
<!--
    <div id="page-wrapper">
        <div id="mobile-navigation">
    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
</div> -->

<? #include("includes/bet/menu.php"); ?>
        
        <div id="page-content-wrapper">
            <div id="page-content">
                <? #include("includes/dash/header_new.php"); ?>
                

                    


<script type="text/javascript">

    /* Datatables basic */

    
	
	$(document).ready(function(){
		$(".favoritar").click(function(){
			var id_mkt_fav = $(this).attr('title');
			var fav = 0;
			if($(this).hasClass("icon-linecons-star")){
				$(this).removeClass('icon-linecons-star');
				$(this).addClass('icon-star');
				fav = 1;
				//alert("n fav");
			}else{
			
			//if($(this).hasClass("icon-star")){
				$(this).removeClass('icon-star');
				$(this).addClass('icon-linecons-star');
				fav = 0;
				//alert("fav");
			}
			$.post('<?=base_url()?>bet/set_fav' , {'id_mkt' : id_mkt_fav , 'id_evento' : <?=$id_jogo?>  } , function(data){
				//alert(data);
				
			})
			
			//alert("OK");
			
			//$(this).removeClass('icon-linecons-star');
			//$(this).addClass('icon-star');
			//alert(id_mkt_fav);
			return false;
		})
	})

</script>





<? #}  ?>


        


<style type="text/css">
.set_odd{cursor:pointer}
/*
.tb_partidas{
	width:80%;
}

.tb_partidas td{
	border:black 1px solid;
	padding:5px;
	text-align:center;
	font-size:18px;
	width:100px;
	font-weight:bold
}

.tb_partidas td small{
	font-size:12px;
	font-weight:normal;
}
*/
</style>

<? if($this->agent->is_mobile()){ ?>
<div class="content-box">
	
    <h3 class="content-box-header" style="background-color:#ffb80c;color:#000">
        Trader Size
    </h3>
    
</div>
<? } ?>

<div class="row">
    <div class="col-md-12">


<div class="row">
	<div class="col-md-12">
        <div class="content-box">
            
            <h3 class="content-box-header content-box-header-alt bg-blue">
         
            <span class="icon-separator">
                <i class="glyph-icon icon-soccer-ball-o"></i>
            </span>
            <span class="header-wrapper">
                Bem vindo ao Evento -  <?=$evento->name;?> <?=$evento->venue;?> (<?=$evento->countryCode;?>)
                <small title="<?=$dd_evento->id_competition?>">Início: 
				<? #=$this->padrao_model->converte_data(substr($dd_evento->inicio,0,10))?> | 
				<? #=substr($dd_evento->inicio,10,10)?>

                
                 <?														 
				#$data_eve = substr($dd_evento->inicio,0,10);
				#$hora_eve = substr($dd_evento->inicio,11,8);
				
				?>
				<? #=$data_eve?> <? #=$hora_eve?>
				<?#=$data_eve?>
				<?
				#$date_time  = new DateTime( $hora_eve );
				#$diff       = $date_time->diff( new DateTime( '03:00:00' ) );				
				#echo $diff->format( '%H:%i:%S' ); // 05:10:00
                #=$this->padrao_model->get_by_matriz('id_competition',$dd_evento->id_competition,'betfair_competitions')->row()->nome
                #print_r( $evento);
                #echo "<br>";
                if($evento->countryCode == "GB"){
                	echo $this->padrao_model->fuso_dt($evento->openDate,-4,'i',40);
                }else{
	                echo $this->padrao_model->fuso_dt($evento->openDate,-2,'i',40);
	            }
				?>
                </small>
            </span>
               
               <span class="header-buttons">
               <a target="_blank" style="color:#000" href="http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$id_mkt?>"> 
               <i class="glyph-icon icon-share-square"></i>
               </a> 
               |
               <a target="_blank" style="color:#000" href="<?=base_url()?>bet/clear_mkt/<?=$id_mkt?>"> 
               <i class="glyph-icon icon-refresh" title="Limpar Dados do Mercado"></i>
               </a>
               </span>
            </h3>
            
        </div>
    </div>
</div>



<div class="content-box" style="display:none" >
	
    <h3 class="content-box-header" style="background-color:#ffb80c;color:#000">
        <a target="_blank" style="color:#000" href="http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$id_mkt?>"> 
          Bet In Betfair
        </a>
    </h3>
    
</div>

<!--
<div class="row">
	<div class="col-md-12">	
		<iframe src="https://www.betfair.com/exchange/plus/pop-out-live-stream/28751087?feedType=matchStats"></iframe>
	</div>
</div>
-->



	</div>
</div>


<div class="row">
    <div class="col-md-12">
        
        
        <div class="panel">
       	    <!-- DEFINIR MERCADO SUSPENSO -->
            <div class="panel-body" style="background-color:#">
           
            
            
            
            <!--
            <p><?=$this->session->userdata("token")?></p>
            <p><?=$this->session->userdata("token_type")?></p>
            -->
            <div>
            	<h1>Entrada:</h1>
            	<p><div id="horse_entrada"></p>
            </div>
            
                <div id='odds'>
                	<!--============ INICIO DO INCLUDE odds_boxs_base =========================================-->
                	<?php #header('Access-Control-Allow-Origin: *');  ?>

<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/charts/justgage/justgage.css">
<?
require_once('includes/betapi/jsonrpc-futbol.php'); 
	$APP_KEY = 'qD8D8WZ300PJGjbN';
	foreach($this->bet_model->getMkt($APP_KEY, $SESSION_TOKEN,$id_jogo,$id_mkt) as $odd){ 

		//print_r($odd);
		########## 	MOSTRA AS ODDS
		#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
		$marketBook = $this->bet_model->getMarketBook($APP_KEY, $SESSION_TOKEN, $odd->marketId);
#		$this->bet_model->printMarketIdRunnersAndPrices($odd, $marketBook,$id_mkt);
		
							function mostrar($odd, $marketBook,$id_mkt,$id_jogo)
							{
								#$total_matched = number_format($odd->totalMatched, 2, ',', '.');
								$dd_odds = array();
								function printAvailablePrices_odd($selectionId, $marketBook,$id_mkt,$id_jogo)
								{
									
									// Get selection
									$f = 0;
									$ff = 0;
									?>
					
									<?
									
									if($marketBook->status != 'OPEN'){ // defini mercado suspenso ou fechado
										
										if($id_mkt == 'CLOSED'){
												echo $id_mkt."***";
												mysql_query("DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error());
												mysql_query("DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error());
										}


									}
									
									foreach ($marketBook->runners as $runner) 
										if ($runner->selectionId == $selectionId) break;?>
										
                                        
                                        
                                      <!--  
										<div class="example-box-wrapper">
											<div class="row">
												
												<div class="col-md-6 " style="border-bottom:#B2E4FF 1px solid;color:#0083ca;text-align:right;font-weight:bold">
												   
                                                        <!--<span class="bs-badge badge-absolute bg-blue">9</span>
                                                        <span class="bs-label label-info totalback_perc<?=$selectionId?>" > BACK</span>
                                                    <div class="ripple-wrapper"></div>
                                                 
                                                   
												</div>
												
											  
											  
												<div class="col-md-6" style="border-bottom:#FCE2EA 1px solid;color:#e91e63;font-weight:bold">
												
                                                        
                                                        <!--<span class="bs-badge badge-absolute bg-primary" style="float:left">9</span>
                                                        <span class="bs-label label-primary totallay_perc<?=$selectionId?> "> LAY</span>
                                                        
                                                    <div class="ripple-wrapper"></div>
                                                

												</div>
											</div>
										</div>
									-->
										
										<!--
										<thead class="cf">
										<tr style=''>
											<th  style="background-color:#0083ca;color:#fff">Back:</th>
											<th  style="background-color:#f9677e;color:#fff">Lay:</th> 
											</tr>
										<tr>
										</thead>
										-->
										<?
										$total_size_back = 0;
										foreach ($runner->ex->availableToBack as $availableToBack){$f++;
											$total_size_back += $availableToBack->size;														   
										// inseri no banco 		
										/*			
										$dd_odds = array(
											#'id_user' => $this->session->userdata('id'),
											#'id_mkt' => $nextHorseRacingMarket->marketId,
											'selection_id' => $selectionId,
											'tamanho' => $availableToBack->price,
											'odd' => $availableToBack->size
										);
										
										if($f == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}
										
										$qr_num = mysql_query("SELECT id_mkt FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND  selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' "); 	
										
										if(mysql_num_rows($qr_num) == 0){
											mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual` ,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selectionId."', '".$availableToBack->size."', '".$availableToBack->price."', 'back', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
										}else{
											mysql_query("UPDATE `odds_mkt` SET `tamanho` = ".$availableToBack->size." , `dt_update` = CURRENT_TIMESTAMP  WHERE selection_id = '".$selectionId."' AND odd = ".$availableToBack->price." AND tipo = 'back' AND id_mkt = '".$id_mkt."'" );
										}
										*/
										
										
											if($f == 1){

										?>
												<!--- DADOS BACK-->
									   <!-- <td>-->
										<div class="example-box-wrapper">
											<div class="row">
												<div class="col-md-3">
					
														<a href="#" title="Soma dos valores correspondidos nas Seleções BACK dividido pela quantidade de seleções BACK" class="tile-box tile-box-alt <?=$bg_class?>">
															<div class="tile-header total_somaback<?=$selectionId?>" >
															¨¨¨¨
															</div>
															<div class="tile-content-wrapper">
															
															
																
															</div>
														<span class="tile-footer tooltip-button" data-placement="bottom" title="Soma correspondido nos últimos preços em Back">
															Back: 
															<i class="glyph-icon icon-linecons-money"></i>
															<label id="somaback<?=$selectionId?>"><? #=number_format($soma_total_sel_back['soma'], 2, ',', '.')?> </label>
														</span>
														<input type="hidden" id="sel_<?=$selectionId?>_back" class="somaback<?=$selectionId?> sel_soma_back" value="0" >
														</a>
					
					
												</div>
												
												
												<!--</td>
												<td class="set_odd basic-dialog back" style="background-color:;text-align:center;color:#000"  title="<?=$selectionId?>">
												-->
												<!--
													<label class="preco"><?=$availableToBack->price;?></label>
													<br>
													<small><?=$availableToBack->size?></small>
													-->
												<div class="col-md-3">
												
												
													<div class="tile-box tile-box-alt bg-blue set_odd back" lang="<?=$availableToBack->price;?>" title="<?=$selectionId?>">
														<div class="tile-header">
															BACK
														</div>
														<div class="tile-content-wrapper">
															<i class="glyph-icon icon-linecons-tag"></i>
															<div class="tile-content preco">
															
															<?
															// defini classes dinamicas
															$nm_class_last_preco = "last_".$selectionId.'_b';
															$nm_class_preco = "p_".$selectionId.'_b';
															$nm_class_volume = "v_".$selectionId.'_b';
															?>
																
																<label class="preco <?=$nm_class_preco?> back" style="font-weight: bold"><?=$availableToBack->price;?></label>
															</div>
															<small>
																<i class="glyph-icon icon-caret-up"></i>
																<label id="volume" class="<?=$nm_class_volume?> back"><?=$availableToBack->size?></label>
															</small>
														</div>
														<a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="">
															<? #=$total_size_back?>
															<? #=$soma_total_sel_back['soma']?>
														<!--	Last:
															<label class="<?=$nm_class_last_preco?>"></label>
															<i class="glyph-icon icon-linecons-tag"></i>
														-->
														</a>
														</div>
													
												</div>
										   
													
													
											  <!--  </td>-->
										<?
											}
										}
										$L = 0;
										$total_size_lay = 0;												
										foreach ($runner->ex->availableToLay as $availableToLay){ $L++;
											$total_size_lay += $availableToLay->size;												
										// inseri no banco 
										/*
										$dd_odds = array(
											#'id_user' => $this->session->userdata('id'),
											'id_mkt' => $nextHorseRacingMarket->marketId,
											'selection_id' => $selectionId,
											'tamanho' => $availableToBack->price,
											'odd' => $availableToBack->size,
											'tipo' => 'lay'
										);
										
										if($L == 1){
											$atual = 1;
										}else{
											$atual = 0;
										}
										/*
										if(!isset($selectionId)){
											echo "<h1 style='color:red'>SUSPENSO</h1>";
										}
										echo "<h1>".$selectionId."</h1>";
										*/
										/*
										$qr_num = mysql_query("SELECT id_mkt FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' ")or die(mysql_error()); 
										
										if(mysql_num_rows($qr_num) == 0){
											mysql_query("INSERT INTO `odds_mkt` (`id_partida`,`id_mkt`, `selection_id`, `tamanho`, `odd`, `tipo`, `atual`,`dt`,`dt_update`) VALUES ('".$id_jogo."','".$id_mkt."', '".$selectionId."', '".$availableToLay->size."', '".$availableToLay->price."', 'lay', '".$atual."',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
										}else{
											mysql_query("UPDATE `odds_mkt` SET `tamanho` = '".$availableToLay->size."' , `atual` = '".$atual."' , `dt_update` = CURRENT_TIMESTAMP WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = '".$id_mkt."' "  );
										}
										*/
										
											if($L == 1){
												
												
												//limpa os atuais
												#mysql_query("UPDATE `odds_mkt` SET  `agora` = 0  WHERE selection_id = '".$selectionId."'  AND tipo = 'lay' AND id_mkt = '".$id_mkt."'  " );
												
												/*
												$qr_up_atual_lay = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$selectionId." AND odd = ".$availableToLay->price." AND tipo = 'lay' AND id_mkt = ".$id_mkt."" )or die(mysql_error());
												$atual_lay = mysql_fetch_assoc($qr_up_atual_lay);
												mysql_query("UPDATE `odds_mkt` SET `agora` = '1' , `dt_update` = '".date("Y-m-d H:i:s")."' WHERE `odds_mkt`.`id` = ".$atual_lay['id']." ");
												*/
												
												#mysql_query("UPDATE `odds_mkt` SET `atual` = '1' WHERE selection_id = '".$selectionId."' AND odd = ".$availableToLay->price." AND tipo = 'lay'" );
												
											#$qr_selection_lay = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 5 ")or die(mysql_error()); 	
											#$qr_selection_vol_lay = mysql_query("SELECT * FROM odds_mkt WHERE selection_id = ".$selectionId." AND tipo LIKE 'lay' ORDER BY id desc LIMIT 5 ")or die(mysql_error()); 	
											?>
											<!--
												<td style='background-color:;text-align:center;color:#000' class='set_odd basic-dialog lay'  title="<?=$selectionId?>">								<!--
													<label class='preco'><?=$availableToLay->price?></label>
													<br>
													<small><?=$availableToLay->size?></small>
													-->
											  <!--  <td style='background-color:;text-align:center;color:#000' class='basic-dialog'>-->
											  	<!--- LAY -->
												<?
												/*
												$soma_lay_sel = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt."  AND selection_id = ".$selectionId." AND tipo = 'back' order by dt_update desc LIMIT 5  ");
												$soma_lay = mysql_query("SELECT SUM(tamanho) as soma FROM odds_mkt  WHERE id_mkt = ".$id_mkt." AND tipo = 'back' order by dt_update desc LIMIT 5  ");
												$soma_total_sel_lay = mysql_fetch_assoc($soma_lay_sel);
												$soma_total_lay = mysql_fetch_assoc($soma_lay);
												if($soma_total_sel_lay['soma'] > 0){
													$pecentual_lay = ($soma_total_sel_lay['soma'] * 100) / $soma_total_lay['soma'];
												}else{
													$pecentual_lay = 0;
												}
												*/
												#echo number_format($pecentual_lay, 2, ',', '.').'%';
												?>
											
													<div class="col-md-3">
													
													
														<div class="tile-box tile-box-alt bg-primary set_odd lay" lang="<?=$availableToLay->price;?>" title="<?=$selectionId?>">
															<div class="tile-header">
																Lay 
															</div>
															<div class="tile-content-wrapper">
																<i class="glyph-icon icon-linecons-money"></i>
																<div class="tile-content preco">
																	<?
																	// defini classes dinamicas
																    $nm_class_last_preco = "last_".$selectionId.'_b';
																	$nm_class_preco = "p_".$selectionId.'_l';
																	$nm_class_volume = "v_".$selectionId.'_l';
																	?>
																	<label class="preco <?=$nm_class_preco?> lay" style="font-weight: bold"><?=$availableToLay->price;?></label>
																</div>
																<small>
																	<i class="glyph-icon icon-caret-up"></i>
																	<label class="volume <?=$nm_class_volume?> lay"><?=$availableToLay->size?>
																</small>
															</div>
															<a href="#" class="tile-footer tooltip-button" data-placement="bottom" title="">
																<? #=$total_size_lay?>
																<? #=$soma_total_sel_lay['soma']?>
																<!--
																Last:
																
																<i class="glyph-icon icon-linecons-tag"></i>
																<label class="<?=$nm_class_last_preco?>"> </label>
															-->
															</a>
														</div>
														
											   
													</div>
													
												<!--    
												</td>
												<td>
												-->
													
																
															
															
															<?
															#if($pecentual_lay > 85){
															#	$bg_class = "btn-success";
																
																
																
																
																########## LAY - IONSERI NO BANCO
																/*
																if($availableToLay->price > 1.3 && $pecentual_lay < 100){


		$qr_hot = mysql_query("SELECT * FROM odds_hot WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' ");
				if(mysql_num_rows($qr_hot) == 0 ){
					mysql_query("INSERT INTO `odds_hot` (`id_partida`,`id_mkt`, `side`, `selection_id`, `selection_name`, `odd`,`tamanho` ) 
											 VALUES ( ".$id_jogo." ,'".$id_mkt."', 'back', '".$selectionId."', 'Time', '".$availableToLay->price."' , ".$pecentual_lay.")")or die(mysql_error());
				}else{
					mysql_query("UPDATE `odds_hot` SET `odd` = '".$availableToLay->price."' ,  `view` = '0' , `tamanho` = ".$pecentual_lay." WHERE `id_mkt` = '".$id_mkt."' AND `selection_id` = '".$selectionId."' AND  `side` = 'back' ");
				}
																
															}*/
															/*
															if($pecentual_lay > 65 && $pecentual_lay < 85){
																$bg_class = "btn-info";
															}
															
															if($pecentual_lay > 30 && $pecentual_lay < 65){
																$bg_class = "btn-danger";
															}
															
															if($pecentual_lay < 30){
																$bg_class = "bg-purple";
															}
															*/
															?>
															
															
													<div class="col-md-3">
														<a href="#" title="Soma dos valores correspondidos nas Seleções LAY dividido pela quantidade de seleções LAY" class="tile-box tile-box-alt <?=$bg_class?>">
															<div class="tile-header total_somalay<?=$selectionId?>">
															  
																
																<? if($pecentual_lay == 100){ ?>
																	Aguarde...
																<? }else{ ?>
																Soma Lay
																   <? #=number_format($pecentual_lay, 2, ',', '.');?>%
																<? } ?>   
																
															</div>
															<div class="tile-content-wrapper">
															

															
															</div>
															<span class="tile-footer tooltip-button" data-placement="bottom" title="Soma correspondido nos últimos preços em Lay">
																Lay: 
															<i class="glyph-icon icon-linecons-money"></i>
															<label id="somalay<?=$selectionId?>"><?=number_format($soma_total_sel_lay['soma'], 2, ',', '.')?> </label>
														</span>
														<input type="hidden" id="sel_<?=$selectionId?>_lay" class="somalay<?=$selectionId?> sel_soma_lay" value="0" >
															
														</a>
													</div>
																	
												
												</div>
											</div>
															
															
											  <!--  </td>-->
											<?
											}
										}
										?>
										<!--</tr>-->
										
										
									
								<? }
								#echo "<tr>";
								#echo "<h2 class='tb_partidas'>" . $odd->marketName."</h2>";
								?>

								
								<!--
								<h2 class="title-hero tb_partidas" title="">
								Mercado: <strong><?=$odd->marketName?></strong>
								</h2>
								<h2 class="title-hero tb_partidas" title="">
								Correspondido: <strong>$<?=number_format($odd->totalMatched, 2, ',', '.');?></strong>
								</h2>
								-->
								<?
								/*
								$last_match_qr = mysql_query("SELECT total_matched,bg FROM odds_mkt WHERE id_mkt = '$id_mkt' ORDER BY 'dt','desc' LIMIT 1,1")or die(mysql_error());
								$last_match = mysql_fetch_assoc($last_match_qr);
								if($last_match['total_matched'] > $odd->totalMatched){
									$bg = 'red';
									$seta = 'icon-caret-down';
									$sinal = "-";
									$dif = $last_match['total_matched'] -  $odd->totalMatched;
									$diferenca = number_format($dif, 2, ',', '.');
								}
								if($last_match['total_matched'] < $odd->totalMatched){
									$bg = 'green';
									$seta = 'icon-caret-up';
									$sinal = "+";
									$dif =  $odd->totalMatched - $last_match['total_matched'];
									$diferenca = number_format($dif, 2, ',', '.');
								}
								if($last_match['total_matched'] == $odd->totalMatched){
									$bg = $last_match['bg'];
									$seta = $last_match['bg'];;
									$sinal = "";
									$dif = $last_match['diferenca'];
									#$diferenca = number_format($dif, 2, ',', '.');
									$diferenca = $dif;
								}
								*/
								?>
							
								<div class="col-md-12 tb_partidas" style="margin-bottom:30px">
								<? if($marketBook->status == 'OPEN'){ // OPEN, SUSPENDED, CLOSED (settled) ?>
								
                                
                                    <h3 class="content-box-header bg-green" id="status_now">
                                        <i class="glyph-icon icon-cog"></i>
                                        <?=$marketBook->status?>
                                    </h3>
                                    <h2 id="delay"></h2>
								
								<? }else{ ?>
								
								   <h3 class="content-box-header bg-red">
                                        <i class="glyph-icon icon-cog"></i>
                                        <?=$marketBook->status?> 
                                        <? 
                                        if($marketBook->status == "CLOSED"){
                                        mysql_query("DELETE FROM odds_mkt WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error()); 
                                    	mysql_query("DELETE FROM mercados WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error()); 
                                    	mysql_query("DELETE FROM odds_hot WHERE id_mkt = '".$id_mkt."' ")or die(mysql_error()); 
                                    	}
                                        ?>
                                    </h3>
								
								<? } ?>
                                </div>
								<?
								#echo "<small class='tb_partidas'>MarketId: " . $odd->marketId."</small>";
								foreach ($odd->runners as $runner) {
								#	mysql_query("UPDATE `odds_mkt` SET `selection_name` = '".$runner->runnerName."' , `total_matched` = '".$odd->totalMatched."' , `bg` = '".$bg."' , `diferenca` = '".$diferenca."' WHERE selection_id = '".$runner->selectionId."' AND id_mkt = '".$id_mkt."'  ORDER BY dt_update desc LIMIT 1");
								?>	
								
																
								
								<div class="example-box-wrapper tb_partidas" style="border:lightblue 1px solid;float: left;padding:10px;width:200px;">
									<div class="row">
										<div class="col-md-2">
											
											<? #=print_r($runner)?>
											<h3 id="sel<?=$runner->selectionId?>" class='tb_partidas title-hero content-box-header' title="<?=$runner->selectionId?>"><?=$runner->runnerName?> <? if($runner->handicap != 0){ echo $runner->handicap; } ?> </h3>
											<p><input type="checkbox" id="check<?=$runner->selectionId?>" /> Por Odd</p>
											<p><input type="checkbox" id="check_vol<?=$runner->selectionId?>" /> Por Volume</p>
											<? # if( $runner->$handicap <> '0' ){ echo  $runner->$handicap; } ?>
																						
											
										</div>
										
										<div class="col-md-10">
										
										<!--    <table class='tb_partidas table table-bordered table-striped table-condensed cf' style='border:black 0px solid;width:100%'> -->
												<?=printAvailablePrices_odd($runner->selectionId, $marketBook,$odd->marketId,$id_jogo) ?>
										   <!-- </table>-->
										
										</div>
										<!--
										<div class="col-md-4">
										</div>
										-->
										
								   </div>
							   </div>
								
								<?
								}
			
				
				
					} // x mostrar
			
	
	}
				
?>

<div href="#" title="Example box" class="tile-box btn btn-warning tb_partidas">
	<div class="tile-content-wrapper">
		<i class="glyph-icon icon-money"></i>
		<div class="tile-content">
			<span>$</span>
			
			
			<? #=$APP_KEY.' ----- < > ---- '.$SESSION_TOKEN." -> ".$id_mkt?>
			<? /* foreach($this->bet_model->list_bets_atual('6A1cQNtoRmi0GDOS', 'SESSION_TOKEN') as $dd_bet_now_mkt){ count($dd_bet_now_mkt);  ?>

			<? } */ 
			############################################################################################ INICIO CASH OUT
			$entradas = $this->bet_model->list_bets_by_mkt('6A1cQNtoRmi0GDOS', $SESSION_TOKEN,$id_mkt) ;
			$cont_entr_geral = 0;
			$cont_entr = -1;
		
			echo "<br />";
			echo "<span style='font-size:10px'>";
			#print_r($entradas);
			echo "</span>";
			################################################################################################# FIM CASH OUT
			?>
			
			
			
			
		</div>
	</div>
<div class="ripple-wrapper"></div>
</div>

<div class="title-box tile-box-alt bg-<? #=$bg?> tb_partidas" style="margin-bottom:30px;background-color: #ffb80c">
	<div class="tile-header" id="">Bets</div>
	<div class="tile-content-wrapper" style="">
		<i class="glyph-icon icon-money"></i>
		<div class="tile-content" title="100">
			<span>$</span>

			<? #=$APP_KEY.' ----- < > ---- '.$SESSION_TOKEN." -> ".$id_mkt?>
			<? /* foreach($this->bet_model->list_bets_atual('6A1cQNtoRmi0GDOS', 'SESSION_TOKEN') as $dd_bet_now_mkt){ count($dd_bet_now_mkt);  ?>

			<? } */ 
			############################################################################################ INICIO CASH OUT
			$entradas = $this->bet_model->list_bets_by_mkt('6A1cQNtoRmi0GDOS', $SESSION_TOKEN,$id_mkt) ;
			$cont_entr_geral = 0;
			$cont_entr = -1;
			#echo count($entradas)." ++ ";
			#print_r($entradas);
			#if(!empty($entradas)){
				
			
				#for($b=0; $b<count($entradas); $b++){ $cont_entr_geral++;
			echo "<table border='1' style='font-size:12px;width:100%'>";
												   echo "<tr style='font-size:12px;padding:10px'> <td>Seleção</td> <td>Odd Entrada</td>  <td>Odd Atual (Cashout)</td> <td>Stake(Resp.)</td><td>Side</td><td>Lucro</td></tr>";
					$total_back = 0;
					$total_lay = 0;
					$lucro_total = 0;
					$lucro_total_back = 0;
					$lucro_total_lay = 0;
					$stake_total_back = 0;
					$stake_total_lay = 0;
					$odd_total_back = 0;
					$odd_total_lay = 0;
					foreach($entradas as $dd_entr){ $cont_entr++;
												   
						for($e=0; $e<count($dd_entr); $e++){  #$tg++;
							#echo "(((".count($cont_entr).")))";						   
							$id_mkt_entr = $dd_entr[$e]->marketId;

							if($id_mkt_entr == $id_mkt){

								$id_selection_entr = $dd_entr[$e]->selectionId;
								$odd_entrada_entr = 	$dd_entr[$e]->priceSize->price;
								
								// defini vars do cash out
								$bet_price = $dd_entr[$e]->priceSize->price;
								$bet_size = $dd_entr[$e]->priceSize->size;
								$bet_selection_id = $dd_entr[$e]->selectionId;
								$bet_mkt_id = $id_mkt_entr;
								
								$side_entr = 	$dd_entr[$e]->side;
									
								
								if($side_entr == "BACK"){
									$side_cash = 'lay';
									$stake_entr = 	$dd_entr[$e]->priceSize->size;
									$lucro_total_back +=  $dd_entr[$e]->priceSize->price * $dd_entr[$e]->priceSize->size;
									
								}
								if($side_entr == "LAY"){
									$side_cash = 'back';
									$stake_entr = 	($dd_entr[$e]->priceSize->size * $dd_entr[$e]->priceSize->price) - $dd_entr[$e]->priceSize->size;

									$lucro_total_lay += ($dd_entr[$e]->priceSize->size * $dd_entr[$e]->priceSize->price) - $dd_entr[$e]->priceSize->size;
									#$lucro_total_lay = $lucro_total_lay_calc - $stake_entr;
								}
								
										
								$qr_lasts = mysql_query("SELECT * FROM `odds_mkt` WHERE selection_id = ".$id_selection_entr." AND tipo = '".$side_cash."' AND id_mkt = ".$id_mkt_entr." ORDER BY dt_update desc LIMIT 1" )or die(mysql_error());
								
								$dd_last = mysql_fetch_assoc($qr_lasts);
								$odd_atual_entr	 = $dd_last['odd'];		
								
								
								if($side_entr == "BACK"){
									$bg_cash_s = '#0083ca';
									
									$lucro = $odd_entrada_entr * $stake_entr;
									
									#$balanco = ($odd_atual_entr / $odd_entrada_entr) * $stake_entr;
									$balanco = ($odd_entrada_entr / $odd_atual_entr) * $stake_entr;
									#$balanco = round($balanco,2);
									#<td>".$id_mkt_entr."</td>
									$lucro_total += $lucro;
									$stake_total += $stake_entr;
									$stake_total_back += $stake_entr;
									$total_back += $lucro;
									$odd_total_back += $dd_entr[$e]->priceSize->price;
									
									#if($balanco > $stake_entr) {$bg_cash = 'success';}
									#if($balanco < $stake_entr) {$bg_cash = 'danger';}
									#if($balanco == $stake_entr) {$bg_cash = 'danger';}
								}
								if($side_entr == "LAY"){
									
									$lucro = ($odd_entrada_entr * $dd_entr[$e]->priceSize->size) - $stake_entr;
									#$balanco = ($odd_atual_entr / $odd_entrada_entr) * $stake_entr;
									$balanco_lay = (  $odd_entrada_entr / $odd_atual_entr) * $stake_entr;
									$balanco =  $stake_entr - $balanco_lay;
									#$balanco = round($balanco,2);
									#<td>".$id_mkt_entr."</td>
									$lucro_total += $lucro;
									$stake_total += $stake_entr;
									$stake_total_lay += $lucro;
									$bg_cash_s = '#e91e63';
									$total_lay += $lucro;
									$odd_total_lay += $dd_entr[$e]->priceSize->price;
									
									#if($balanco > $stake_entr) {$bg_cash = 'success';}
									#if($balanco < $stake_entr) {$bg_cash = 'danger';}
									#if($balanco == $stake_entr) {$bg_cash = 'danger';}
									
								}
								$nm_mkt_sel = $this->padrao_model->get_by_matriz('selection_id',$id_selection_entr,'odds_mkt')->row()->selection_name;
								
								$nm_mkt_sel = $this->db->query(" SELECT * FROM odds_mkt where selection_id = '".$id_selection_entr."' AND selection_name <> '' ")->row()->selection_name;
								
								echo "<tr style='background-color:".$bg_cash_s.";color:#fff;font-size:12px;padding:10px'>  <td>".$nm_mkt_sel."</td><td>@".$odd_entrada_entr."</td>  <td>@".$odd_atual_entr."</td> <td>$".$stake_entr." (".$lucro.")</td><td>".$side_entr."</td><td>".$lucro."</td></tr>";
								#echo "<br>";
								#echo "$ ".$balanco;
								

								?>
								

						<?		
								#print_r($dd_entr[$cont_entr]);
							} // x if ==
					#}
						} // c for
												   
					} // x foreach
					$total_back = round($total_back,2);
					$total_lay = round($total_lay,2);
			
					if(($total_back == $total_lay) && $stake_total > 0 ) {
						$balanco_atual = ($total_back / $total_lay) * $stake_total;
						$balanco_atual = number_format($balanco_atual, 2, ',', '.');
						#$balanco_atual = 100;
					}else{
						
						$balanco_atual = number_format($balanco, 2, ',', '.');
						#$balanco_atual = 200;
					}
					
					echo "<tr style='background-color:green;color:#fff;font-size:12px;padding:10px'> <td>".$total_back."</td> <td>".$odd_total_back." : ".$odd_total_lay."</td>  <td>".$total_lay."</td> <td>".$stake_total_lay." : ".$stake_total_back."</td><td>".$lucro_total."</td><td id='balanco_atual'>".$balanco_atual."</td></tr>";
			
						echo "</table>";
			
			
			################################################################################################# FIM CASH OUT
			?>
			<? if($total_back == $total_lay){ ?>
				<button type="button" disabled class="btn btn-lg "><?=$balanco_atual?></div> </button>
			<? }else{ ?>
		<!--
				<button type="button" class="btn btn-block btn-<?=$bg_cash?> btn-lg ">Cash Out <BR><?=$balanco_atual?></div></button>
				-->
				<?
				$stakes = $stake_total_back.' - '.$stake_total_lay;
				
				#if($stake_total_back < $stake_total_lay){
					$dif = $stake_total_lay - $stake_total_back;	 
				#}else{
					#$dif =  $stake_total_back - $stake_total_lay;	 
				#}
				
				// define cor de fundo do botao cashout

				$ativo = '';
				if($balanco > 0 && ($balanco > $stake_entr) ) {$bg_cash = 'success'; }				
				
				// lay
				if($stake_total_back < $stake_total_lay){
					if($balanco > 0 && ($odd_total_lay < $odd_atual_entr) ) {$bg_cash = 'success'; }	
				}
				// back
				if($stake_total_back > $stake_total_lay){
					if($balanco < $stake_entr) {
						//  DESATIVA CASHOUT
						if($dif > 0){

							$bg_cash = '';
							$ativo = 'disabled="disabled"'; 
							$ativo = "";


						}else{
							$bg_cash = 'danger';
						}
					}
				}
				if($balanco == 0) {$bg_cash = '';}
				
				?>
				
				<button class="btn-lg btn-block btn-<?=$bg_cash?> bt_cashout" <?=$ativo?> data-type="<?=$side_entr?>" data-price="<?=
						$bet_price?>"  data-title="<?=$bet_price?>" data-direction="<?=$bet_size;?>" data-size="<?=$bet_size;?>" title="<?=$bet_selection_id?>" value="<?=$bet_mkt_id?>" style="font-size: 20px">
						 <?=$lucro_total_back.' - '.$lucro_total_lay?> Cash Out $ 
						<? #if($stake_total_back < $stake_total_lay){ ?>
						<? if($dif > $balanco_atual){ ?>
							
							<? anchor_popup('segments', 'text', attribs); if($dif == $stake_entr) {?>
								
								(<strong><?=number_format($dif, 2, ',', '.');?></strong>) *
							<? }else{ ?>

								<? if( ($odd_total_back > $odd_total_lay) && ($stake_total_back < $stake_total_lay) ){?>
									<?=number_format($dif, 2, ',', '.');?>
								
								<? }else{ ?>
								
								(<strong><?=number_format($balanco_atual, 2, '.', '.');?></strong>)   <?=$balanco_atual?> +
				
								<? #=$balanco.' > 0 && ('.$odd_total_lay.' < '.$odd_atual_entr.'('.$dif.')'?>

								<? } ?>
							<? } ?>



						<? }else{ ?>
							<? if( ($odd_total_back > $odd_total_lay) && ($stake_total_back < $stake_total_lay) ){?>

									<? #=$dif?>
									<?=number_format($dif, 2, ',', '.');?> - #

								<? }else{  ?>

									(<strong><?=number_format($balanco_atual, 2, '.', ',');?></strong>)  - <?=$balanco_atual?>
								<? } ?>	
						<?  } ?>
						<!-- [ <?=$dif.' > '.$balanco_atual.' '.$stake_total?> ] -->
					 <!-- -------- (<?=$stakes.' = '.$dif?>) <?=$total_back.' == '.$total_lay?> -->
				</button>	
		
				<p id="pre_cash" align="center" style="display: none"><img src="<?=base_url()?>assets2/images/svg-loaders/ball-triangle.svg"></div>
			<? } ?>
		</div>
		<small>
			<i class="glyph-icon"></i>
			 
		</small>
	</div>
</div>  


<?
##################################################################
$data = mostrar($odd, $marketBook,$id_mkt,$id_jogo);
#echo $data;
?>
<script type="text/javascript">


$(document).ready(function(){
	
	var nm_mkt = $("#nm_mkt").text();
	var title_atual = $("#nm_evento").html();
	$("title").html(nm_mkt+' '+title_atual);
	
	
	
	
	
	
})

</script>


					<!--============================== FIM INCLUDE odds_boxs_base ==================-->
                </div>

                
                      
                
                
              </div>
                    
              <div class="" id="basic-dialog" title="Apostar" aria-hidden="true" style="display:none;width:30%">
                        <div class="pad10A">
                        
                            <input type="hidden" id="id_select" value="" >
                            <input type="hidden" id="id_mkt" value="<?=$id_mkt?>" >
                            <input type="hidden" id="tipo"  >
                            <!--
                            <input type="number" id="odd_place"   placeholder="Odd">
                            <input type="number"  id="valor_place" value="" placeholder="Valor">
                            -->
                            <div class="input-group bootstrap-touchspin">
                            
                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                            	<input id="odd_place" placeholder="Odd" class="form-control" value="" name="touchspin-demo-4" style="display: block;" type="number"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;">
                            </span>
                                <span class="input-group-btn-vertical"  style="display:none">
                                    <button class="btn btn-default bootstrap-touchspin-up" type="button">
                                        <i class="glyph-icon icon-plus"></i><div class="ripple-wrapper"></div>
                                    </button>
                                    <button class="btn btn-default bootstrap-touchspin-down" type="button">
                                        <i class="glyph-icon icon-minus"></i>
                                    </button>
                                </span>
                            </div>
                            
                            
                            <div class="input-group bootstrap-touchspin">
                            
                            <span class="input-group-addon bootstrap-touchspin-prefix" style="display: none;"></span>
                            	<input id="valor_place" placeholder="Valor" class="form-control" value="" name="touchspin-demo-4" style="display: block;" type="text"><span class="input-group-addon bootstrap-touchspin-postfix" style="display: none;">
                            </span>
                                <span class="input-group-btn-vertical" style="display:none">
                                    <button class="btn btn-default bootstrap-touchspin-up" type="button">
                                        <i class="glyph-icon icon-plus"></i><div class="ripple-wrapper"></div>
                                    </button>
                                    <button class="btn btn-default bootstrap-touchspin-down" type="button">
                                        <i class="glyph-icon icon-minus"></i>
                                    </button>
                                </span>
                            </div>
                            
                            
                            
                        </div>
                        
                        <div class="pad15A">
                            <div class="divider mrg15T mrg15B"></div>
                            <div class="text-center">
                                    <!--<i class="glyph-icon icon-linecons-money"></i>-->
                                    <!--<button type="button"  class="btn btn-blue btn-file" >Apostar</button>-->
                                    <button type="button" class="btn btn-success active" data-toggle="button" id="bt_place">Apostar<div class="ripple-wrapper"></div></button>
                    
                            </div>
                        </div>
                        <p align="center"><button class="btn btn-primary  sb-open-right bt_apostas" style="display:none">
                            Visualizar Apostas
                            <div class="ripple-wrapper"></div>
                        </button></p>
                       
                            <div class="tile-box tile-box-alt bg-green">
                                <div class="tile-header" id="result_place">
                                    Resultado
                                </div>
                                <div class="tile-content-wrapper" id="result_place-antigo">
                                    <i class="glyph-icon icon-linecons-money"></i>
                                    
                                    <div class="tile-content">
                                        <span>$</span>
                                        <label id="calc"></label>
                                    </div>
                                    <small id="dd_lay" style="display:none">
                                        <i class="glyph-icon icon-caret-up"></i>
                                        +<label id="lay_responsabilidade"></label> responsabilidade
                                    </small>
                                    <small>
                                        <i class="glyph-icon icon-caret-up"></i>
                                        <label id="lucro_percentual"></label>
                                    </small>
                                
                                	
                   </div> <!-- X COL painel -->
            
	          </div> <!-- X COL 12 -->
          
        </div> <!-- X COL 12 -->
              
               
                    
            </div>
          </div>
        </div>



    </div>
    
    
    
    
    
    
    <!-- x if -->
</div>

                

  </div>
    </div>
    </div>


    <!-- WIDGETS -->






</div>
</body>
</html>