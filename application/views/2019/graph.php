<?
#echo $id_mkt.' ******* '.$id_selection."   ++ ".$sels->num_rows;
#echo "<br>";
#echo "Sels: ".$sels->num_rows();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trader Size - Gráficos</title>

		<style type="text/css">

		</style>
	</head>
	<body>
<!--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> 
<script src="<?=base_url()?>highcharts/code/highcharts.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/data.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/series-label.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>
-->
<script src="<?=base_url()?>highcharts/code/highcharts.js"></script>
<!--
<script src="<?=base_url()?>highcharts/code/highcharts-3d.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>
-->
<script src="<?=base_url()?>highcharts/code/modules/exporting.js"></script>
<script src="<?=base_url()?>highcharts/code/modules/export-data.js"></script>

<!-- Additional files for the Highslide popup effect -->
<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Trader Size</title>

		<style type="text/css">

		</style>
	</head>
	<body id="">



<div id="container" class="box_refresh" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<p align="center"><button class="bt_refresh_graph btn btn-success">REFRESH</button></p>



        <script type="text/javascript">
Highcharts.chart('container', {
    chart: {

        <? if($tipo == 'size'){ ?>
            type: 'area'
        <? } ?>
        <? if($tipo == 'odd'){ ?>
            type: 'line',
            events: {
                click: function (event) {
                    var label = this.renderer.label(
                        'x: ' + Highcharts.numberFormat(event.xAxis[0].value, 2) + ', y: ' + Highcharts.numberFormat(event.yAxis[0].value, 2),
                        event.xAxis[0].axis.toPixels(event.xAxis[0].value),
                        event.yAxis[0].axis.toPixels(event.yAxis[0].value)
                    )
                        .attr({
                            fill: Highcharts.getOptions().colors[0],
                            padding: 10,
                            r: 5,
                            zIndex: 8
                        })
                        .css({
                            color: '#FFFFFF'
                        })
                        .add();

                    setTimeout(function () {
                        label.fadeOut();
                    }, 1000);
                } // x click
            } // x events
        <? } ?>
    },
    title: {
        <? if($side == "back"){ ?>
        text: "<label  style='color:#75c2fd'>Lay </label> <?=$tipo?>"
        <? } ?>
        <? if($side == "lay"){ ?>
        text: "<label style='color:lightblue'>Back </label> <?=$tipo?>"
        <? } ?>
    },
    subtitle: {
        text: 'Fonte: betfair.com'
    },
    xAxis: {
        <?
        if($tipo == 'odd'){
            if($side == 'back'){
                $side = 'lay';
            }
            if($side == 'lay'){
                $side = 'back';
            }
        }
        ?>
        <? #if($tipo == 'size'){ 
            $qr_odds = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$id_selection." AND tipo = '".$side."' ORDER BY dt_update desc LIMIT 20");
        ?>
            categories: [
            <? foreach($qr_odds->result() as $odd){ ?>
                '<?=$odd->odd?>',
            <? } ?>
            '<?=$odd->odd?>'
            ]
        <? #} ?>
        <? /* if($tipo == 'odd'){ ?>
            categories: ['+15min', '11min', '10min', '9min', '8min', '7min', '6min', '5min', '4min', '3min', '2min', '1min']
        <? } */ ?>
        
    },
    yAxis: {
        title: {
            text: '<?=$tipo?> '
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
        <? foreach($sels->result() as $sel){ 
            $sel_nome = "null";
            $qr_sel = $this->padrao_model->get_by_matriz('id_selection',$sel->selection_id,'selections');
            if($qr_sel->num_rows() > 0){
                if($tipo == 'odd'){
                    if($side == 'back'){
                        $side = 'lay';
                    }
                    if($side == 'lay'){
                        $side = 'back';
                    }
                }
                $sel_nome = $qr_sel->row()->name;
                $qr_regs = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$sel->selection_id." AND tipo = 'back' ORDER BY dt_update desc LIMIT 20");
                $qr_regs_lay = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$sel->selection_id." AND tipo = 'lay' ORDER BY dt_update desc LIMIT 20");
            }
        ?>
            {
                name: "<?=$sel_nome." | <span style='color:#75c2fd'>BACK</span> - (".$qr_regs->num_rows()?> Odds)",
                <? if($tipo == "size"){ ?>
                    <? if($side == 'all'){ ?>

                    <? }else{ ?>
                        data: [
                            <? foreach($qr_regs->result() as $dd){ ?>
                            <?=$dd->tamanho?>,
                            <? } ?>
                            <?=$dd->tamanho?>
                            ],
                    <? } ?>

                
                            



                <? } ?>
                
                <? if($tipo == "odd"){ ?>
                data: [
                    <? foreach($qr_regs->result() as $dd){ ?>
                    <?=$dd->odd?>,
                    <? } ?>
                    <?=$dd->odd?>
                    ]
                <? } ?>    
            },


            <? if($tipo == "size"){ ?>
            {
                name: "<?=$sel_nome." | <span style='color:#f694aa'>LAY</span> - (".$qr_regs->num_rows()?> Odds)",    
                data: [
                            <? foreach($qr_regs_lay->result() as $dd){ ?>
                            <?=$dd->tamanho?>,
                            <? } ?>
                            <?=$dd->tamanho?>
                            ]

            },
            <? } ?>

    <? } ?> 
    ]
});

        $(document).ready(function(){
            $(".bt_refresh_graph").click(function(){
                
                //return false;
                <?
                if($tipo == 'odd'){
                    if($side == 'back'){
                        $side = 'lay';
                    }
                    if($side == 'lay'){
                        $side = 'back';
                    }
                }
                ?>

                

                var id_mkt_g = <?=$id_mkt?>;
                var id_selection_g = <?=$id_selection?>;
                var tipo_g = '<?=$tipo?>'; 
                var side_g = '<?=$side?>';

                //alert("refresh VAR ");

                    $(".box_refresh").html("Carregando....");
                    $.get("<?=base_url()?>bets/graph/"+id_mkt_g+"/"+id_selection_g+"/"+tipo_g+"/"+side_g , function(data){

                            
                            $(".box_refresh").append(data);

                    });

            })
            //alert("FOI");
        })
        </script>
    </body>
</html>
