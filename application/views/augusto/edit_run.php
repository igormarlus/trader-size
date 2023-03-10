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
 
    <title>Horses</title>
      
   
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

              
              <div class="card my-1" id="end_fila" style="max-height: 100px"> ... </div>
              <div class="card my-1" id="display_call" style="max-height: 500px"> ... </div>

              

            
<!--CARD MODELO -->
              <!-- MATCH ODDS -->


              <div class="card my-1 slideInUp animated">
                <h2><?=$dd->nome?></h2>

                <h4><?=$dd->marketName?></h4>

                <div class="card-header flipIn animated">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      
                      <?
                      #print_r($dd);
                      ?>
                      
                      <?
                      #print_r($dd_hist);
                      ?>
                    </li>





                </div>
                <form method="post" action="<?=base_url()?>horses/set_dados_run">
                  <input type="text" name="id_mkt" value="<?=$dd->marketId?>">
                <table class="table">
                  <tr>
                    <th>Subtítulo:</th>
                    <td><input type="text" class="form-control large" name="subtitulo" value="<?=$dd->subtitulo?>"></td>
                    
                  </tr>
                  <!--
                  <tr>
                    <th>Condições:</th>
                    <td><input type="text" class="form-control large" name="condicoes" value="<?=$dd->condicoes?>"></td>
                    
                  </tr>
                -->
                  <tr>
                    <th>Tipo:</th>
                    <td><input type="text" class="form-control large" name="tipo" value="<?=$dd_hist->tipo?>"></td>
                  </tr>
                  <tr>
                    <th>Tipologia:</th>
                    <td><input type="text" class="form-control large" name="tipologia" value="<?=$dd_hist->tipologia?>"></td>
                  </tr>

                  <tr>
                    <th>Idade:</th>
                    <td><input type="text" class="form-control large" name="idade" value="<?=$dd_hist->idade?>"></td>
                    
                  </tr>
                  <tr>
                    <th>Prêmio:</th>
                    <td><input type="text" class="form-control large" name="premio" value="<?=$dd_hist->premio?>"></td>
                    
                  </tr>
                  <tr>
                    <td>[<?=$dd->classe?>] Classe ** <?=$classes->num_rows()?> </td>
                    <td>

                      <select name="classe">
                        <? if($dd->classe != ""){ ?>
                          <option value="<?=$dd->classe?>" selected="selected"><?=$dd->classe?> (<?=$this->db->query("SELECT * FROM classe WHERE id_classe = '".$dd->classe."' ")->row()->sigla?>)</option>
                        <? } ?>
                        
                        
                        <? foreach($classes->result() as $classe){ ?>
                          <option value="<?=$classe->id_classe?>"><?=$classe->nome?> (<?=$classe->sigla?>)</option>
                        <? } ?>

                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Piso</td>
                    <td>
                      <select name="piso">
                        <option value="<?=$dd->piso?>" selected="selected"><?=$dd->piso?></option>
                        <? foreach($this->db->get('piso')->result() as $piso ){ ?>
                          <? if($dd->piso == $piso->id_piso){ $sel_piso = 'selected="selected"'; }else{ $sel_piso = '';  } ?>
                          <option value="<?=$piso->nome?>" ><?=$piso->nome?> (<?=$piso->sigla_racingpost?>) </option>
                        <? } ?>
                        <!--
                        <option value="Firm">Firm</option>
                        <option value="Good to firm">Good to firm</option>
                        <option value="Good">Good</option>
                        <option value="Good to Soft">Good to Soft</option>
                        <option value="Soft">Soft</option>
                        <option value="Heavy">Heavy</option>
                        <option value="Standard">Standard</option>
                      -->
                        
                      </select>
                    </td>
                  </tr>
                  <? for($p=1; $p<16; $p++){ ?>
                    <tr>
                      <th><?=$p?>º Lugar</th>
                      <td>
                        <?
                        $where_pos = array(
                          'id_mkt' => $dd->marketId,
                          'posicao' => $p
                        );
                        $this->db->where($where_pos);
                        $qr_pos = $this->db->get('runs_horses_premiacao');
                        #echo "<h1>".$qr_pos->num_rows()."</h1>";
                        if($qr_pos->num_rows() > 0){
                          $valor = $qr_pos->row()->valor;
                        }else{
                          $valor = 0;
                        }
                        ?>
                        <input type="text" value="<?=$valor?>" name="premio<?=$p?>">
                      </td>
                    </tr>
                  <? } ?>
                  <tr>
                    <th></th>
                    <td><input type="submit" value="Salvar"></td>

                  </tr>
                </table>
                </form>

               
                 
                
   

            
                

              </div>


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



  </body>
</html>