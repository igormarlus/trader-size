<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GET ODDS</title>
</head>

<body>
<p><?=$mercado?> </p>

<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->
<script type="text/javascript" src="<?=base_url()?>assets2/js-core/jquery-core.js"></script>

    <script type="text/javascript">
        $(window).load(function(){
           
			// get odds
			var c = 0;
			setInterval(function(){  c++;
			
			if(c > 50){
				location.reload();
			}
				
				$.get("<?=base_url()?>botbet/get_odds_mkt_a2/<?=$mercado?>" , function(data){
					//alert(data);
					//$("#valor_total_only").text(data);
					//$("#loading_cont").hide();
					$(".tb_partidas").remove();
					$("#odds").append(data);
					//$(".pisc").show('slow');
					
					
					// por MIM
					//alert("OK 1 a");
					
					
					
			
					
			
				});		
				
			}, 3000);
			
			// get graph

		
		});
    </script>

            
            
      
            
                <div id='odds'></div>

</body>
</html>