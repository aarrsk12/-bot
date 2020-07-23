<?php
$sub_menu = "200800";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$g5['title'] = '도메인별 접속자집계';
include_once('./visit.sub.php');
$colspan = 5;

$max = 0;
$sum_count = 0;
$sql = " select * from {$g5['visit_table']}
            where vi_date between '{$fr_date}' and '{$to_date}' ";
$result = sql_query($sql);
while ($row=sql_fetch_array($result)) {
    $str = $row['vi_referer'];
    preg_match("/^http[s]*:\/\/([\.\-\_0-9a-zA-Z]*)\//", $str, $match);
    $s = $match[1];
    $s = preg_replace("/^(www\.|search\.|dirsearch\.|dir\.search\.|dir\.|kr\.search\.|myhome\.)(.*)/", "\\2", $s);
    $arr[$s]++;

    if ($arr[$s] > $max) $max = $arr[$s];

    $sum_count++;
}
?>
<div style="padding:20px; font-size:20px; font-weight:bold">Total : <?php echo $sum_count?></div>
<?php
$i = 0;
$j = 0;
$k = 0;
$save_count = -1;
$tot_count = 0;
if (count($arr)) {
	arsort($arr);
	foreach ($arr as $key=>$value) {
		$count = $arr[$key];
		if ($save_count != $count) {
			$i++;
			$no = $i;
			$save_count = $count;
		} else {
			$no = '';
		}
		if (!$key) {
			$link[$j] = '';
			$link2[$j] = '';
			$key = '직접';
		} else {
			$link[$j] = '<a href="./visit_list.php?'.$qstr.'&amp;domain='.$key.'">';
			$link2[$j] = '</a>';
		}

		$rate = ($count / $sum_count * 100);
        $s_rate[$j] = number_format($rate, 1);
		
		$domain[$j] = $key;
		$scount[$j] = $count;
		$j ++;
	}

}
?>

<script type="text/javascript">
	$(function () {
		$('#graph').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: '※ DOMAIN'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				categories: [<?
				for ($m = 0; $m < count($arr); $m++)
				{
					echo "'$domain[$m] ( $s_rate[$m] )%',";
				}	
				?>],
				title: {
					text: null
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Population (millions)',
					align: 'high'
				},
				labels: {
					overflow: 'justify'
				}
			},
			tooltip: {
				valueSuffix: ' millions'
			},
			plotOptions: {
				bar: {
					dataLabels: {
						enabled: true
					}
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -40,
				y: 100,
				floating: true,
				borderWidth: 1,
				backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
				shadow: true
			},
			credits: {
				enabled: false
			},
			series: [{
				name: 'Count',
				data: [<?
				for ($m = 0; $m < count($arr); $m++)
				{
					echo "$scount[$m],";
				}	
				?>]
			}]
		});
	});
</script>
<script src="./js/highcharts.js"></script>
<script src="./js/modules/exporting.js"></script>


<div id="graph" style=" width:98%; height: 400px; margin: 0 auto"></div>
<?php
include_once('./admin.tail.php');
?>
