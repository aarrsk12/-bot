<?php
include_once('./_common.php');
include_once(G5_LIB_PATH.'/naver_syndi.lib.php');
include_once(G5_CAPTCHA_PATH.'/captcha.lib.php');

	$wr_id = trim($_POST['mode']);
	$day = trim($_POST['day']);
	
	$sql3 = "select count(*)cout from g5_write_code where wr_subject = '$wr_id' and wr_1 = '$day'";
	$result3 = sql_fetch($sql3);
	if($result3 > 0){
		$sql = "select * from g5_write_code where wr_subject = '$wr_id' and wr_1 = '$day' order by wr_id limit 1";
		$result = sql_fetch($sql);

		$sql2 = "select * from g5_write_shop where wr_id = '$wr_id'";
		$result2 = sql_fetch($sql2);
		$money = "";
		if($member['mb_level'] == '5'){
			if($day == "1"){
				$money = $result2['wr_7'];
			}else if($day == "7"){
				$money = $result2['wr_10'];
			}else{
				$money = $result2['wr_13'];
			}
		}else if($member['mb_level'] == '4'){
			if($day == "1"){
				$money = $result2['wr_6'];
			}else if($day == "7"){
				$money = $result2['wr_9'];
			}else{
				$money = $result2['wr_12'];
			}
		}else{
			if($day == "1"){
				$money = $result2['wr_5'];
			}else if($day == "7"){
				$money = $result2['wr_8'];
			}else{
				$money = $result2['wr_11'];
			}
		}
		if($member['mb_point'] < $money){
			echo "2";
		}else{
			$sql4 = "update g5_member set mb_point = mb_point-".$money.", mb_level = '3' where mb_id = '".$member['mb_id']."'";
			sql_query($sql4);
			$wr_subject = $result2['wr_subject']." - ".$day."일 구매";
			$wr_content = $result['wr_content'];
			$wr_num = get_next_num('g5_write_shoplog');
			$sql5 = " insert into g5_write_shoplog
                set wr_num = '$wr_num',
                     wr_reply = '0',
                     wr_comment = 0,
                     ca_name = '0',
                     wr_option = '1',
                     wr_subject = '$wr_subject',
                     wr_content = '$wr_content',
                     wr_link1 = '0',
                     wr_link2 = '0',
                     wr_link1_hit = 0,
                     wr_link2_hit = 0,
                     wr_hit = 0,
                     wr_good = 0,
                     wr_nogood = 0,
                     mb_id = '{$member['mb_id']}',
                     wr_password = '{$member['mb_password']}',	
                     wr_name = '{$member['mb_id']}',
                     wr_email = '1',
                     wr_homepage = '1',
                     wr_datetime = '".G5_TIME_YMDHIS."',
                     wr_last = '".G5_TIME_YMDHIS."',
                     wr_ip = '{$_SERVER['REMOTE_ADDR']}',
                     wr_1 = '$wr_1',
					 wr_2 = '".$result2['wr_id']."',
					 wr_3 = '".$day."'";
			sql_query($sql5);
			$mb = get_member($member['mb_id'], 'mb_point');
			$expire_point = get_expire_point($member['mb_id']);
            $content = $wr_subject;
            $rel_table = '@buy';
            $rel_id = $member['mb_id'];
            $rel_action = 'buy'.'-'.uniqid('');
            $point = $expire_point * (-1);
            $po_mb_point = $mb['mb_point'] - $point;
            $po_expire_date = G5_TIME_YMD;
            $po_expired = 1;
			$sql7 = " insert into {$g5['point_table']}
                        set mb_id = '".$member['mb_id']."',
                            po_datetime = '".G5_TIME_YMDHIS."',
                            po_content = '".addslashes($content)."',
                            po_point = '-".$money."',
                            po_use_point = '0',
                            po_mb_point = '$po_mb_point',
                            po_expired = '$po_expired',
                            po_expire_date = '$po_expire_date',
                            po_rel_table = '$rel_table',
                            po_rel_id = '$rel_id',
                            po_rel_action = '$rel_action' ";
            sql_query($sql7);
			$sql6 = "delete from g5_write_code where wr_id = '".$result['wr_id']."'";
			sql_query($sql6);
			echo "1";
		}
		
	}else{
		echo "3";
	}

?>