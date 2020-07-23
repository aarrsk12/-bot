<?php
$sub_menu = "900300";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$sql2 = "select count(*)coul from g5_member where mb_recommend != '0' group by mb_recommend";
$row2 = sql_fetch($sql2);
$total_page = ceil($row2['coul'] / 15);
$page = $_GET['page'];
$nuser = "15";
if($page){
$pagw = ($page-1) * 15;
}else{
$page = 1;
$pagw = 0;
}

$g5['title'] = '추천인 적립내용';
include_once('./admin.head.php');

$sql = " select * from g5_member where mb_recommend != '0' group by mb_recommend order by mb_recommend desc limit ".$pagw.", 15 ";
$result = sql_query($sql);

for($i=0; $row=sql_fetch_array($result); $i++){

			$list[$i] = $row;
}
?>



	<div class="tbl_head01 tbl_wrap">
		<table style="text-align:center">
			<thead>
				<tr>
					<th>번호</th>
					<th>회원아이디</th>
					<th>보유추천인</th>
					<th>누적적립금</th>
					<th>최근구매일</th>
				</tr>
			</thead>
			<tbody>
			<?php
			

        for ($i=1; $i<count($list); $i++) {
			$one_update = '<a href="./shopcode_form.php?wr_id='.$list[$i]['wr_id'].'&w=u">수정</a>';
			$one_delete = '<a class="shopcode_delete" id="'.$list[$i]['wr_id'].'">삭제</a>';
			$sqla = "select count(*)cnt from g5_member where mb_recommend = '".$list[$i]['mb_recommend']."'";
			$rowa = sql_fetch($sqla);
			$sqla2 = "select sum(mb_coin)coin from g5_recommend where mb_recommend = '".$list[$i]['mb_recommend']."'";
			$rowa2 = sql_fetch($sqla2);
         ?>
		 
		<tr>
				<td><?php echo $i;?></td>
				<td onclick="javascript:view_menu('<?php echo $list[$i]['mb_recommend']?>');" style="cursor:pointer;"><?php echo $list[$i]['mb_recommend']?></td>
				<td><?php echo $rowa['cnt']?>명</td>
				<td><?php echo number_format($rowa2['coin']);?></td>
				<td><?php echo $list[$i]['re_datetime']?></td>
			</tr>
		
		<?php
		}
		 ?>
		 </tbody>
		</table>
		<?php echo get_paging($nuser, $page, $total_page, './recommend_list.php?page='); ?>
	</div>

<script>
	$(function() {
		$('.permit').on('click', function() {
			$('.cash_type').val('per');
			$(this).parent().submit();
			return false;
		});

		$('.cancel').on('click', function() {
			$('.cash_type').val('can');
			$(this).parent().submit();
			return false;
		});

		$('.shopcode_delete').on('click', function(){
			var result = confirm('정말로 삭제하겠습니까?');
			if(result){
				var num = $(this).attr('id');
				window.location.href = "shopcode_delete.php?wr_id="+num;
			}else{

			}
		});
	});
	function add_menu()
	{

		var url = "./shopcode_form.php";
		window.open(url, "add_program", "left=100,top=100,width=550,height=650,scrollbars=yes,resizable=yes");
		return false;
	}
	function view_menu(mb_id)
	{

		var url = "./recommend_view.php?mb_id="+mb_id;
		window.open(url, "add_program", "left=350,top=150,width=750,height=750,scrollbars=yes,resizable=yes");
		return false;
	}
</script>

<?php
include_once ('./admin.tail.php');
?>