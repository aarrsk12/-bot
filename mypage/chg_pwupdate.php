<?php
include_once('./_common.php');

$mb_password = $_POST['mb_password'];
$chg_pw = $_POST['chg_pw'];

$chg_pw = preg_replace("/[ #\&\+\-%=\/\\\:;,\.'\"\^`~\|\\?\$#<>()\[\]\{\}]/i", "", $chg_pw);
$mb_password = preg_replace("/[ #\&\+\-%=\/\\\:;,\.'\"\^`~\|\\?\$#<>()\[\]\{\}]/i", "", $mb_password);

if(!check_password($mb_password, $member['mb_password'])){
echo "<script>alert('현재 비밀번호가 일치하지 않습니다.');location.href='./chg_pw.php';</script>";
}

$sql = "update g5_member set mb_password = '".get_encrypt_string($chg_pw)."' where mb_id='".$member['mb_id']."'";
sql_query($sql);

echo "<script>alert('비밀번호가 변경되었습니다.');location.href='./mypage.php';</script>";

?>