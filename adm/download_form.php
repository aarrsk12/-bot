<?php
$sub_menu = "300700";
include_once('./_common.php');

if ($is_admin != 'super')
    alert_close('최고관리자만 접근 가능합니다.');
if($_GET['w']=="u"){
$g5['title'] = '다운로드 수정';
}else{
$g5['title'] = '다운로드 수정';
}

include_once(G5_PATH.'/head.sub.php');
$frm_submit = '<div class="btn_insert">
    <input type="submit" value="확인" class="btn_insertadd" accesskey="s">
    <a href="./download.php?'.$qstr.'" class="btn_insertadd">목록</a>'.PHP_EOL;
$frm_submit .= '</div>';

if($_GET["wr_id"] > 0){
	$sql = "select * from g5_write_download where wr_id = '".$_GET["wr_id"]."'";
	$program = sql_fetch($sql);
}$sql2 = " select * from g5_write_shop";
$result2 = sql_query($sql2);

for($i=0; $row=sql_fetch_array($result2); $i++){

			$list[$i] = $row;
}
?>


<form name="fboardform" id="fboardform" action="./download_form_update.php" onsubmit="return fboardform_submit(this)" method="post" enctype="multipart/form-data">



<section id="anc_bo_basic">
    <div id="container_title">다운로드 글쓰기</div>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>다운로드 추가</caption>
        <colgroup>
            <col class="grid_4">
            <col>
            <col class="grid_3">
        </colgroup>
        <tbody>
        <tr>
            <th scope="row"><label for="wr_subject">제목<strong class="sound_only">필수</strong></label></th>
            <td>
				<input type="text" name="wr_subject" class="required frm_input" size="80" maxlength="120" value="<?php echo  $program['wr_subject'];?>">
                <input type="hidden" name="w" value="<?php echo $_GET['w']?>">
				<input type="hidden" name="wr_id" value="<?php echo $program['wr_id']?>">
				</td>
            
        </tr>
		<tr>
            <th scope="row"><label for="wr_link1">URL<strong class="sound_only">필수</strong></label></th>
			<td>
				<input type="text" name="wr_link1" class="required frm_input" size="80" maxlength="120" value="<?php echo  $program['wr_link1'];?>">
			 </td>
		</tr>
		
		
        </tbody>
        </table>
    </div>
</section>
<?php echo $frm_submit; ?>
</form>



<?php
include_once(G5_PATH.'/tail.sub.php');
?>