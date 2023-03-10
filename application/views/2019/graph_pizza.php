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
<script src="<?=base_url()?>highcharts/code/highcharts-3d.js"></script>
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
		<title>Trader Size Graph</title>

		<style type="text/css">

		</style>
	</head>
	<body>



<div id="container" style="height: 400px"></div>


		<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: 'Pizza Size'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [

            <?  foreach($sels->result() as $sel){ 
                $total_sel = 0;
            $sel_nome = "null";
            $qr_sel = $this->padrao_model->get_by_matriz('id_selection',$sel->selection_id,'selections');
            if($qr_sel->num_rows() > 0){
                $sel_nome = $qr_sel->row()->name;
                $qr_regs = $this->db->query("SELECT * FROM odds_mkt WHERE id_mkt = '".$id_mkt."' AND selection_id = ".$sel->selection_id." AND tipo = '".$side."' ORDER BY dt_update desc LIMIT 20");
            
        ?>
    
            <? foreach($qr_regs->result() as $dd){ 
                $total_sel += $dd->tamanho;
                ?>
            
            <? } ?>
            ['<?=$sel_nome?>', <?=$total_sel?>],
            <? }  ?> 
    <? } ?> 
           // ['IE', 26.8],
            /*
            {
                name: 'Chrome',
                y: 12.8,
                sliced: true,
                selected: true
            },
            */
           // ['Others', 0.7]
        ]
    }]
});
		</script>
	</body>
</html>
