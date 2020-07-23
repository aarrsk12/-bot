<?php
$sub_menu = "900200";
include_once('./_common.php');

if ($is_admin != 'super')
    alert_close('최고관리자만 접근 가능합니다.');
if($_GET['w']=="u"){
$g5['title'] = '셀러 상세내용';
}else{
$g5['title'] = '셀러 상세내용';
}

include_once(G5_PATH.'/head.sub.php');
$frm_submit = '<div class="btn_insert">
    <a href="./seller_form.php" class="btn_insertadd">수정</a>'.PHP_EOL;
$frm_submit .= '</div>';


	$sql = "select * from g5_config";
	$program = sql_fetch($sql);


?>

<style>
	.tbl_frm01_tssb td{text-align:center;}
</style>
<form name="fboardform" id="fboardform" action="./shopcode_form_update.php" onsubmit="return fboardform_submit(this)" method="post" enctype="multipart/form-data">



<section id="anc_bo_basic">
    <div id="container_title">셀러 상세내용</div>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap">
        <table>
        <caption>셀러 상세내용</caption>
        <colgroup>
            <col width="20%">
            <col width="30%">
            <col width="20%">
			<col width="30%">
        </colgroup>
        <tbody>
        <tr>
            <th scope="row">아이디</th>
            <td><?php echo $program['cf_admin'];?></td>
			<th scope="row">샵이름</th>
			<td><?php echo $program['cf_title'];?></td>
        </tr>
		<tr>
            <th scope="row">톡플러스 아이디</th>
            <td><?php echo $program['cf_8_subj'];?></td>
			<th scope="row">은행명</th>
			<td><?php echo $program['cf_1'];?></td>
        </tr>
		<tr>
            <th scope="row">예금주</th>
            <td><?php echo $program['cf_3'];?></td>
			<th scope="row">계좌번호</th>
			<td><?php echo $program['cf_2'];?></td>
        </tr>
        <tr>
            <th scope="row">payapp 아이디</th>
            <td><?php echo $program['cf_payapp'];?></td>
        </tr>
		<tr>
            <th scope="row">카카오톡</th>
            <td><?php echo $program['cf_10_subj'];?></td>
			<th scope="row">디스코드</th>
			<td><?php echo $program['cf_9_subj'];?></td>
        </tr>
		<tr>
            <th scope="row">VIP 조건</th>
            <td><?php echo $program['cf_4'];?></td>
			<th scope="row">VVIP 조건</th>
			<td><?php echo $program['cf_5'];?></td>
        </tr>
		<tr>
            <th scope="row">회원가입시 적립금</th>
            <td><?php echo $program['cf_register_point'];?></td>
			<th scope="row">매충전 보너스</th>
			<td><?php echo $program['cf_6'];?>원 이상 충전시 <?php echo $program['cf_7'];?>% 적립금 지급</td>
        </tr>
		<tr>
            <th scope="row">등록일</th>
            <td><?php echo $program['cf_admin'];?></td>
			<th scope="row">만료일</th>
			<td><?php echo $program['cf_title'];?></td>
        </tr>
		</tbody>
        </table>
		
    </div>
</section>
<?php echo $frm_submit; ?>
</form>


<script>
	$(function(){
		$('.shop_delete').on('click', function(){
			var result = confirm('정말로 삭제하겠습니까?');
			if(result){
				var num = $(this).attr('id');
				window.location.href = "member_delete.php?mb_id="+num;
			}else{

			}
		});
	});
</script>
<?php
include_once(G5_PATH.'/tail.sub.php');
?>