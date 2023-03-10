
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Trader Size BetFair - Trader Esportivo Futebol - Foco No Volume</title>
    <meta name="title" content="Trader Size BetFair - Foco No Volume" />
    <meta name="description" content="Aplicação Online para Trader Esportivo Futebol Betfair" />
    <meta name="keywords" content="Betfair, Trader, Volume Trader" />
    <meta name="robots" content="index,follow" />
    <meta name="revisit-after" content="2 days" />
    <link rel="shortcut icon" href="<?php echo base_url()?>imagens/favicon.ico">
    
    
    <? if(base_url() == "http://www.xbitcompany.com/" || base_url() == "http://xbitcompany.com/"){ ?>
    	<link rel=”canonical” href="https://www.tradersize.com" />
    <? } ?>
<meta name="DC.title" content="Trader Size BetFair - Foco No Volume" />
    <meta name="contact" content="igor_marlus@yahoo.com.br"/>
    <meta name="url" content="https://www.tradersize.com" />
    <meta name="robots" content="index, follow"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="language" content="pt-br"/>
    <meta name="rating" content="general"/>
    <meta name="expires" content="Never">
    <meta name="company" content="Trader Size BetFair - Foco No Volume" />
    <!--
    <meta name="city" content="Recife" />
    <meta name="state" content="Pernambuco" />
    <meta name="country" content="Brasil" />
    <meta name="geo.region" content="BR-PE" />
    <meta name="geo.placename" content="Recife" />
    <meta name="geo.position" content="-8.038528584963244, -34.89220741256565" />
    -->
    
    <meta name="author" content="Igor Mrlus"/>
    <meta name="reply-to" content="igor@nuvemlab.com.br"/>
    <meta name="web_author" content="Igor Marlus"/>
    
    <!-- STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/global.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/pages/index.css" />
    
    <meta property="og:image" content="https://www.tradersize.com/img/logo.jpg" />
    
    
    
    
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="<?php echo base_url()?>" href="favicon.ico">	
	<!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,400italic' rel='stylesheet' type='text/css'>-->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/motioncss.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/motioncss-widgets.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/style.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/responsive.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/animation.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/colors/color_nl.css">	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/rs-settings.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo base_url()?>css/site/magnific-popup.css">
    
    
    
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datatable/datatable.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/forms.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/helpers/boilerplate.css">    
    
    <!-- JS Core -->

    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-core.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-core.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-widget.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-mouse.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-ui-position.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/transition.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/modernizr.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-cookie.js"></script>
    
    
    
    
    	
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/loading-indicators.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/elements/tables.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datatable/datatable.css">
    
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets2/widgets/datatable/datatable.css">
	<script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable-bootstrap.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets2/widgets/datatable/datatable-tabletools.js"></script>


<script type="text/javascript">

    /* Datatables basic */
/*
    $(document).ready(function() {
       $('.tb_rel').dataTable();
	   table.fnSort( [ [1,'asc'] ] );
    });
	*/
	
	
	$(document).ready(function() {
      // var table =  $('.tb_rel').dataTable();
	   var table = $('.tb_rel').dataTable( {
		   			<? #if($live == ''){ ?>
					paging: false,
					<? #} ?>
					scrollX: true,
					searching: true,
				    ordering:  true
				} );
				
		//		table_new.fnSort( [ [0,'desc'] ] );
	   table.fnSort( [ [0,'desc'] ] );
	   
	    $('.tb_rel').attr("placeholder", "Search...");
	   
	   
	   <? if($live == 'live'){ ?>
	   setInterval(function(){ 
	  // alert("Vai");
		//location.reload();
		
		$.get("<?=base_url()?>bet/hots_only" , function(data){
				//alert(data);
				//$("#valor_total_only").text(data);
				//$(".dd_old").remove();
				//$(".tb_rel").remove();
				
				//$(".tb_rel").clea();
				//$('.tb_rel').dataTable();
				//$(".tb_rel").append(data);
				
				$(".tr_old").remove();
				$("#load_tr").append(data);
				//$(".tb_rel").show('slow');
				
				//var table_new =  $('#DataTables_Table_0').dataTable();
				/*
				$("#collapse1").append(data);
				var table_new = $('.tb_rel').dataTable( {
					paging: false,
					scrollX: true,
					searching: true,
				    ordering:  true
				} );
				*/
				
				//table_new.fnSort( [ [0,'desc'] ] );
				//table_new.append(data);
				
				
				$(".check_resultado").click(function(){
					var id = $(this).val();
					//alert(id);
					var status = 0;
					 if($(this).is(':checked')) { //Retornar true ou false 
						 //alert("CheckBox marcado."); 
						 status = 1;
					 }else{ 
						//alert("CheckBox desmarcado."); 
						status = 0
					 }
					 $.get("<?=base_url()?>botbet/set_hot/"+id+"/"+status , function(data){
						 //alert("OK");
					 })
				}); 
				
				$(".resultado_hot").change(function(){
					
					
					var id = $(this).attr('title');
					
					//alert(id);
					var status = $(this).val();
					 $.get("<?=base_url()?>botbet/set_hot_resultado/"+id+"/"+status , function(data){
						 //alert("OK");
					 })
					
				}); 
				
				$(".resultado_hot").change(function(){
					
					
					var id = $(this).attr('title');
					
					//alert(id);
					var status = $(this).val();
					 $.get("<?=base_url()?>botbet/set_hot_resultado/"+id+"/"+status , function(data){
						 //alert("OK");
					 })
					
				}); 
				/*
				$(".resultado_hot").change(function(){
					alert("The text has been changed.");
				});
				
				*/
				
				
				// table.fnSort( [ [0,'desc'] ] );
				
				
		
				
		
			});		
		
		
		//}, 60000);
		}, 10000);
		
		<? }else{ ?>
		$(".check_resultado").click(function(){
			var id = $(this).val();
			//alert(id);
			var status = 0;
			 if($(this).is(':checked')) { //Retornar true ou false 
				 //alert("CheckBox marcado."); 
				 status = 1;
			 }else{ 
				//alert("CheckBox desmarcado."); 
				status = 0
			 }
			 $.get("<?=base_url()?>botbet/set_hot/"+id+"/"+status , function(data){
				 //alert("OK");
			 })
		}); 
		
		$(".resultado_hot").change(function(){
			
			
			var id = $(this).attr('title');
			
			//alert(id);
			var status = $(this).val();
			 $.get("<?=base_url()?>botbet/set_hot_resultado/"+id+"/"+status , function(data){
				 //alert("OK");
			 })
			
		}); 
		
		
		<? } ?>
	  
    });
</script>
    
</head>

<body class="l-body">

	<!-- CANVAS -->
	<div class="l-canvas type_wide col_cont headerpos_fixed headertype_extended">
		<div class="l-canvas-h">

			<?php include('includes/site/header.php');?>

			<!-- MAIN -->
			<div class="l-main">
				<div class="l-main-h">

				        
                        <div class="l-submain">
                        
                        
                        
							<div class="">
								<h1 style="text-align: center;">Hots</h1>								
								<div class="g-hr type_short">
									<span class="g-hr-h">
										<i class="fa fa-star"></i>
									</span>
								</div>
							
                            <p style="text-align: center; padding:60px 0 0;">
                                <a class="g-btn type_outline" href="<?php echo base_url()?>">
                                <span>Refresh</span></a>
                            </p>
                            <style type="text/css">
                            .tb_rel{
								border:#000 0px solid;
								border-collapse:collapse;
								width:90%;
							}
							.tb_rel th{
								background-color:#09C;
							}
							.tb_rel td, tb_rel th{
								border:#000 0px solid;
								border-collapse:collapse;
								padding:5px;
							}
							tr{
								border:0px;
							}
							tr:hover{background-color:#CEFFDB;}
                            </style>
								
                                    <!-- HOTS -->
                                    <table cellpadding="0" cellspacing="0" border="0" id="" class="table table-striped table-bordered tb_rel" data-order='[[ 0, "desc" ]]' data-page-length='50' style="width:80%">
                                            <thead class="dd_old">
                                            <tr>
                                                <th data-class-name="priority">Data de Regsitro/Atualização</th>
                                                <th>Evento</th>
                                                <th>Mercado</th>
                                                <th>Seleção</th>
                                                <th>Bet</th>
                                                <th>Odd</th>
                                                <th>Porcentagem</th>
                                                <th>Correspondido</th>
                                                <th>Resultado</th>
                                                <?
                                                /*
                                                $dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
                                                if($dd_user_adm > 0){ 
                                                ?>
                                                <th>Ação</th>
                                                <? }*/ ?>
                                                
                                            </tr>
                                            </thead>
                                            <tbody class="dd_old" id="load_tr">
                                            <? if($hots->num_rows() > 0){ ?>
                                
                        
                                                <? foreach($hots->result() as $dd){ ?>
                                                    <? #$t=0;  foreach ($this->bet_model->getSoccers_competition($APP_KEY, $SESSION_TOKEN,$meu->id_competicao) as $jogo) { $t++; ?>
                                                        
                                                        
                                                        <?
                                                        # if(mysql_num_rows($qr_num) > 0){
                                                            #while($dd = mysql_fetch_assoc($qr_num)){
                                                                $dt_reg = $dd->dt;
                                                                $hot_id_mkt = $dd->id_mkt;
                                                                $hot_selection = $dd->selection_id;
                                                                $hot_odd = $dd->odd;
                                                                $hot_volume = $dd->tamanho; 
                                                                
                                                                $qr_selecao = mysql_query("SELECT * FROM odds_mkt WHERE id_mkt = '".$hot_id_mkt."' AND selection_id = '".$hot_selection."' LIMIT 1");
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
																		$matched = $hot_selecao['total_matched'];
																	}else{
																		$matched =  $hot_selecao['total_matched'];
																	}
																	
																	
                                                                }else{
                                                                    $matched = 0;
                                                                }
                                                        ?>
                                                                <tr class="odd gradeA tr_old" style="background-color:<?=$bg_tr?>">
                                                                
                                                                    <td><?=$dt_reg?></td>
                                                                     
                                                                    <td>
                                                                        <!--<a target='_blank' title="<?=$dd->id_partida?>" href="<?=base_url()?>bet/betjogo/<?=$dd->id_partida?>/<?=$hot_id_mkt?>" style="color:#000;font-size:12px">-->
                                                                        <?=$hot_evento['evento']?>
                                                                        <!-- </a>-->
                                                                       
                          <!--               
                                                                 <a href="https://www.betfair.com/exchange/plus/football/market/<?=$hot_id_mkt?>" target="_blank">Betfair</a>-->
                                                                 
                                                                 
                                                                    </td>
                                                                    
                                                                    <td><?=$hot_mercado['name']?> </td>
                                                                    <td><?=$hot_selecao['selection_name']?></td>
                                                                    <td><a target="_blank" class="g-btn type_primary size_small" href="http://ads.betfair.com/redirect.aspx?pid=2816870&zid=1418&redirecturl=https://www.betfair.com/exchange/plus/football/market/<?=$hot_id_mkt?>">
                                         Bet
                                         </a></td>
                                                                    <td><?=$hot_odd?></td>
                                                                    <td><?=$hot_volume?>%</td>
                                                                    <td>$ <?=number_format($matched,2,',','.');?></td>
                                                                    <td>
                                                                        
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
                                                                    /*
                                                                    $dd_user_adm = $this->padrao_model->get_by_id($this->session->userdata('id'),'user')->row()->nivel;
                                                                    if($dd_user_adm > 0){ 
                                                                    ?>
                                                                    
                                                                    <td>
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
                                                                    </td>
                                                                    <? } */ ?>
                                                                    
                                                                    
                                                                </tr>
                                                                <? #} // x while ?>
                                                        <? #} // x if ?>   
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    <? } ?>
                                            
                                                        <? } // x foreach ?>
                                                            
                                            <? #} // x if num_rows()  ?>
                                           
                                            </tbody>
                                            </table>
                                
                                

								
							</div>
						</div>
                        






						

						
						

					</div>
				</div>
			</div>
			<!-- /MAIN -->
		</div>
	</div>
	<!-- /CANVAS -->



<!-- FOOTER -->
<?php include('includes/site/footer2.php');?>

<!-- INÍCIO 

     JAVASCRIPT'S:
     ============================================== -->
	<!--
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery-1.9.1.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/g-alert.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.carousello.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.flexslider.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.isotope.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.magnific-popup.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.parallax.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.simpleplaceholder.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.smoothScroll.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.themepunch.plugins.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/jquery.themepunch.revolution.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/plugins.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/waypoints.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-lang.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-search.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-tabs.js"></script>
     <script type="text/javascript" src="<?php echo base_url()?>js/site/w-timeline.js"></script>

     <script>jQuery(window).load(function(){ jQuery('#parallax_section').parallax('50%', '-1.2'); });</script> 
     -->
     <!--Start of Zopim Live Chat Script
     <script type="text/javascript">
     window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
     d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
     _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
     $.src="//v2.zopim.com/?1bPzfTvgW1Zyf8QHkgcjJc5AizcX03UV";z.t=+new Date;$.
     type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
     </script>
     End of Zopim Live Chat Script-->

</body>
</html>

