<!DOCTYPE html> 
<html lang="en">
<head>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(window).load(function(){
           
			// get odds
			setInterval(function(){ 
				
				$.get("<?=base_url()?>botbet/get_odds_mkt" , function(data){
					//alert(data);
					//$("#valor_total_only").text(data);
					//$("#loading_cont").hide();
					$(".tb_partidas").remove();
					$("#odds").append(data);
					//$(".pisc").show('slow');
					
					
					// por MIM
					//alert("OK 1 a");
					
					
					
			
					
			
				});		
				
			}, 5000);
			
			// get graph

		
		});
    </script>

            
            
      
            
                <div id='odds'></div>
               
</div>
</body>
</html>