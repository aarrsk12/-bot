<?php
$sub_menu = "900100";
include_once('./_common.php');

if ($is_admin != 'super')
    alert_close('최고관리자만 접근 가능합니다.');

$g5['title'] = '셀러 상세내용';


include_once(G5_PATH.'/head.sub.php');
$frm_submit = '<div class="btn_insert">
    <input type="submit" value="확인" class="btn_insertadd" accesskey="s">'.PHP_EOL;
$frm_submit .= '</div>';


	$sql = "select * from g5_config";
	$program = sql_fetch($sql);


?>
<style>
	.tbl_frm01 td{text-align:left;}
	.seller_form{height:750px; overflow-y:scroll;}
</style>

<form name="fboardform" id="fboardform" action="./seller_form_update.php" onsubmit="return fboardform_submit(this)" method="post" enctype="multipart/form-data">



<section id="anc_bo_basic">
   <div id="container_title">셀러 상세내용</div>
    <?php echo $pg_anchor ?>

    <div class="tbl_frm01 tbl_wrap seller_form">
        <table border="1" style="border-color:#46494e;">
        <caption>셀러 상세내용</caption>
        <colgroup>
            <col width="30%">
            <col width="70%">
        </colgroup>
        <tbody>
        <tr>
			<th scope="row">아이디</th>
			<td><?php echo $program['cf_admin'];?></td>
        </tr>
		<tr>
			<th scope="row">비밀번호 변경</th>
			<td><input type="password" id="mb_password" name="mb_password" class="frm_input" size="60" maxlength="60" placeholder="변경할 비밀번호를 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">샵 이름</th>
			<td><input type="text" id="cf_title" name="cf_title" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_title'];?>" placeholder="샵이름을 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">은행명</th>
			<td><input type="text" id="cf_1" name="cf_1" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_1'];?>" placeholder="은행명을 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">계좌번호</th>
			<td><input type="text" id="cf_2" name="cf_2" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_2'];?>" placeholder="계좌번호를 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">예금주</th>
			<td><input type="text" id="cf_3" name="cf_3" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_3'];?>" placeholder="예금주를 입력해주세요."></td>
        </tr>
        <tr>
            <th scope="row">payapp 아이디</th>
            <td><input type="text" id="cf_3" name="cf_3" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_payapp'];?>" placeholder="payapp 판매자 아이디(문상자충)."></td>
        </tr>
		<tr>
			<th scope="row">VIP 조건</th>
			<td><input type="text" id="cf_4" name="cf_4" class="frm_input" size="20" maxlength="60" value="<?php echo $program['cf_4'];?>" >원 이상 누적구매시 자동등업(0원시 수동설정)</td>
        </tr>
		<tr>
			<th scope="row">VVIP 조건</th>
			<td><input type="text" id="cf_5" name="cf_5" class="frm_input" size="20" maxlength="60" value="<?php echo $program['cf_5'];?>">원 이상 누적구매시 자동등업(0원시 수동설정)</td>
        </tr>
		<tr>
			<th scope="row">회원가입시 적립금지급</th>
			<td><input type="text" id="cf_register_point" name="cf_register_point" class="frm_input" size="20" maxlength="60" value="<?php echo $program['cf_register_point'];?>">원</td>
        </tr>
		<tr>
			<th scope="row">매충전 보너스</th>
			<td>
				<input type="text" id="cf_6" name="cf_6" class="frm_input" size="20" maxlength="60" value="<?php echo $program['cf_6'];?>">원 이상 충전시<br>
				<input type="text" id="cf_7" name="cf_7" class="frm_input" size="20" maxlength="60" value="<?php echo $program['cf_7'];?>">%의 적립금을 지급
			</td>
        </tr>
		<tr>
			<th scope="row">후기 작성시 적립금 지급</th>
			<td><input type="text" id="cf_10" name="cf_10" class="frm_input" size="20" maxlength="60" value="<?php echo $program['cf_10'];?>">원</td>
        </tr>
		<tr>
			<th scope="row">디코방 링크</th>
			<td><input type="text" id="cf_9" name="cf_9" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_9'];?>" placeholder="디코방 링크를 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">오픈카톡 링크</th>
			<td><input type="text" id="cf_8" name="cf_8" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_8'];?>" placeholder="오픈카톡 링크를 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">디코아이디</th>
			<td><input type="text" id="cf_9_subj" name="cf_9_subj" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_9_subj'];?>" placeholder="디코아이디를 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">카톡아이디</th>
			<td><input type="text" id="cf_10_subj" name="cf_10_subj" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_10_subj'];?>" placeholder="카톡아이디를 입력해주세요."></td>
        </tr>
		<tr>
			<th scope="row">톡플러스 아이디</th>
			<td><input type="text" id="cf_8_subj" name="cf_8_subj" class="frm_input" size="60" maxlength="60" value="<?php echo $program['cf_8_subj'];?>" placeholder="톡플러스 아이디를 입력해주세요."></td>
        </tr>
		
		<tr>
			<th scope="row">우측하단 상담창 활성화</th>
			<td><input type="radio" name="cf_7_subj" value="0" <?php if($program['cf_7_subj'] == 1){}else{?>checked<?php }?>> 비활성화 &nbsp <input type="radio" name="cf_7_subj" value="1" <?php if($program['cf_7_subj'] == 1){?>checked<?php }?>> 활성화</td>
        </tr>
		<tr>
			<th scope="row">문상수동충전 사용여부</th>
			<td><input type="radio" name="cf_6_subj" value="0" <?php if($program['cf_6_subj'] == 1){}else{?>checked<?php }?>> 사용안함 &nbsp <input type="radio" name="cf_6_subj" value="1" <?php if($program['cf_6_subj'] == 1){?>checked<?php }?>> 사용함</td>
        </tr>
		<tr>
			<th scope="row">로고</th>
			<td><input type="text" id="cf_5_subj" name="cf_5_subj" class="frm_input" size="60" maxlength="300" value="<?php echo $program['cf_5_subj'];?>" placeholder="300px * 300px 이하의 URL주소"></td>
        </tr>
		<tr>
			<th scope="row">로그인 배경사진</th>
			<td><input type="text" id="cf_4_subj" name="cf_4_subj" class="frm_input" size="60" maxlength="300" value="<?php echo $program['cf_4_subj'];?>" placeholder="URL주소를 입력해주세요"></td>
        </tr>
		<tr>
			<th scope="row">가격표 배경사진</th>
			<td><input type="text" id="cf_3_subj" name="cf_3_subj" class="frm_input" size="60" maxlength="300" value="<?php echo $program['cf_3_subj'];?>" placeholder="URL주소를 입력해주세요"></td>
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