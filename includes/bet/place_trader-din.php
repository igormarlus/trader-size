<div class="scrollable-content scrollable-slim-sidebar">

<!-- <button class="sb-close glyph-icon icon-dedent">Close </button> -->
<!--<button class="glyph-icon icon-refresh" id="bets_refresh">Refresh </button>-->


<div class="box" align="center">
    <button class="btn btn-alt btn-hover btn-info sb-close">
        <span>Close</span>
        <i class="glyph-icon icon-dedent"></i>
    <div class="ripple-wrapper"></div></button>
    <button class="btn btn-alt btn-hover btn-success" id="bets_refresh" title="Refresh">
        <span>Refresh</span>
        <i class="glyph-icon icon-refresh"></i>
    <div class="ripple-wrapper"></div></button>
	<!--
    <button href="#" class="btn vertical-button remove-border btn-success" id="bets_refresh" title="Refresh">
            <span class="glyph-icon icon-separator-vertical">
                <i class="glyph-icon icon-refresh"></i>
            </span>
            <span class="button-content">Refresh Bets</span>
        <div class="ripple-wrapper"></div>
    </button>
    -->
</div>
<div class="box" align="center" style="border:red 0px solid;padding:20px;display:none" id="loading_bets">

        <img src="<?=base_url()?>assets2/images/svg-loaders/three-dots.svg" alt="" width="60">

</div>

<p align="center" style="padding:10px;display:none">Apenas entradas "BACK"</p>
<div class="pad15A" id="apostas_abertas">

</div>
</div>
<script language="javascript">
$(document).ready(function(){
	//alert("opa2");
	// carrega apostas abertas
	$.get("<?=base_url()?>bet/apostas_abertas" , function(data){
			$("#apostas_abertas").html('');
			$("#apostas_abertas").append(data);
		});	
	
	
	var tmp = 0;
	//setInterval(function(){ tmp++;
	


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
	
	function cashout(elemento){						
							//var len = $("#valor_place").val();
							var id_mkt = $(elemento).val();
							var id_selection = $(elemento).attr('title');
							var tipo = $(elemento).attr('data-type');
							var size = $(elemento).attr('data-direction');
							var valor = $(elemento).attr('data-title');
							
							
							alert("Opa 8 "+id_mkt+" - "+id_selection+" "+tipo+" Size: "+size+" Price:"+valor);
							return false;
							//alert("Opa3");
							//return false;
							
							
							
							
							//alert(tipo);
							//var id_mkt = $("#id_mkt").val();
							//var id_selection = $("#id_select").val();
							//var tipo = $("#tipo").val();
							//var size = $("#odd_place").val();
							//var valor = $("#valor_place").val();
							//alert(parseFloat(size)+" "+parseFloat(valor));
							$.post('<?=base_url()?>bet/cashout' , {'id_mkt' : id_mkt , 'id_selection' : id_selection , 'tipo' : tipo, 'size' : parseFloat(size) , 'valor' : parseFloat(valor) } , function(data){
								alert(data);
							
								
							})
							//return false;
	}
	
		
})
</script>