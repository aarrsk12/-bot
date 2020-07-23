<?php
include_once('./_common.php');
include_once(G5_THEME_PATH.'/head.php');

$sql = " select * from g5_write_shop";
$result = sql_query($sql);

for($i=0; $row=sql_fetch_array($result); $i++){

			$list[$i] = $row;
}
?>
	<link rel="stylesheet" href="./price_style.css">
	<style>
		body{height:100%;}
		#wrapper{height:calc(100% - 62px);}
		#container_wr{height:100%;}
		#wrapper #container_wr > #container {height:100% !important; min-height:100%;}

	</style>
	<div class="price_content">
		<div style="padding:20px; font-family:'Hanna'; font-size:40px; border:1px solid #fff; background:rgb(255,255,255,0.5); position:absolute; top: 30px; left:0; right:0; color:#1d00ff; text-align:center; font-weight:bold;">
			행복핵 배그핵전문샵
		</div>

	<div class="cont">
		<ul class="ult">
			<?php
				for ($i=0; $i<count($list); $i++) {
			?>
			<li class="li">
				<ul class="ul">
					<li><?php echo $list[$i]['wr_subject'];?></li>
					<li>1일
					<?php if($list[$i]['wr_1']!='2'){
					if($list[$i]['wr_2']!='2'){
					if($member['mb_level'] == '5'){ if($list[$i]['wr_7'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_7']);?>원</span><?php }else{ ?>사용안함<?php }?>
					<?php }else if($member['mb_level'] == '4'){ if($list[$i]['wr_6'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_6']);?>원</span><?php }else{ ?>사용안함<?php }?>
					<?php }else{ if($list[$i]['wr_5'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_5']);?>원</span><?php }else{ ?>사용안함<?php } } }else{ echo '사용안함';}}else{ echo '사용안함'; } ?>
					</li>
					<li>7일
					<?php if($list[$i]['wr_1']!='2'){
					if($list[$i]['wr_3']!='2'){
					if($member['mb_level'] == '5'){ if($list[$i]['wr_10'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_10']);?>원</span><?php }else{ ?>사용안함<?php }?>
					<?php }else if($member['mb_level'] == '4'){ if($list[$i]['wr_9'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_9']);?>원</span><?php }else{ ?>사용안함<?php }?>
					<?php }else{ if($list[$i]['wr_8'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_8']);?>원</span><?php }else{ ?>사용안함<?php } } }else{ echo '사용안함';}}else{ echo '사용안함'; } ?>
					</li>
					<li>30일
					<?php if($list[$i]['wr_1']!='2'){
					if($list[$i]['wr_4']!='2'){
					if($member['mb_level'] == '5'){ if($list[$i]['wr_13'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_13']);?>원</span><?php }else{ ?>사용안함<?php }?>
					<?php }else if($member['mb_level'] == '4'){ if($list[$i]['wr_12'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_12']);?>원</span><?php }else{ ?>사용안함<?php }?>
					<?php }else{ if($list[$i]['wr_11'] != '0'){?> : <span style="color:yellow;"><?php echo number_format($list[$i]['wr_11']);?>원</span><?php }else{ ?>사용안함<?php } } }else{ echo '사용안함';}}else{ echo '사용안함'; } ?>
					</li>
				</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<?php
include_once(G5_THEME_PATH.'/tail.php');
?>