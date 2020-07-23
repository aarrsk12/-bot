<?php
$sub_menu = "300700";
include_once('./_common.php');

auth_check($auth[$sub_menu], 'r');

$sql_common = 'select * from g5_menu';

$sql = " select count(*) as cnt {$sql_common} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$rows = $config['cf_page_rows'];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page < 1) $page = 1; // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows; // 시작 열을 구함


$g5['title'] = '카테고리설정';
include_once('./admin.head.php');

$sql = " select * from g5_menu order by me_order asc";
$result = sql_query($sql);

for($i=0; $row=sql_fetch_array($result); $i++){

			$list[$i] = $row;
}
?>

<style>
.a_updown{width:20px; height:20px; border:1px solid #eaeaea; display:block; line-height:20px; cursor:pointer; position:absolute; top:5px;}
.a_up {left:15px;}
.a_down {right:15px;}
</style>

<?php if ($is_admin == 'super') { ?>
<div class="btn_insert">
    <a href="javascript:add_menu();" class="btn_insertadd">글쓰기</a>
</div>
<?php } ?>

	<div class="tbl_head01 tbl_wrap">
		<table style="text-align:center">
			<thead>
				<tr>
					<th>순서</th>
					<th>메뉴이름</th>
					<th>보이기</th>
				</tr>
			</thead>
			<tbody>
			<?php
			

        for ($i=0; $i<count($list); $i++) {
			$one_update = '<a href="./menu_form.php?me_id='.$list[$i]['me_id'].'&w=u">수정</a>';
			$one_delete = '<a class="shop_delete" id="'.$list[$i]['me_id'].'">삭제</a>';
			
         ?>
		 
		<tr>
				<td style="position:relative;">
					<?php if($i != '0'){ ?><a class="a_up a_updown" href="./menu_good.php?mode=up&me_order=<?php echo $list[$i]['me_order']?>&me_id=<?php echo $list[$i]['me_id']?>">↑</a><?php } ?>
					<?php echo $list[$i]['me_order']?>
					<?php if($i != count($list) - 1){ ?><a class="a_down a_updown" href="./menu_good.php?mode=down&me_order=<?php echo $list[$i]['me_order']?>&me_id=<?php echo $list[$i]['me_id']?>">↓</a><?php } ?>
				</td>
				<td onclick="javascript:view_menu(<?php echo $list[$i]['me_id']?>);" style="cursor:pointer;"><?php echo $list[$i]['me_name']?></td>
				<td onclick="javascript:view_menu(<?php echo $list[$i]['me_id']?>);" style="cursor:pointer;"><?php if($list[$i]['me_use'] == '1'){ echo "보임"; }else{ echo "숨겨진상태";}?></td>
				
			</tr>
		
		<?php
		}
		 ?>
		 </tbody>
		</table>
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

		$('.shop_delete').on('click', function(){
			var result = confirm('정말로 삭제하겠습니까?');
			if(result){
				var num = $(this).attr('id');
				window.location.href = "menu_delete.php?me_id="+num;
			}else{

			}
		});
	});
	function add_menu()
	{

		var url = "./menu_form.php";
		window.open(url, "add_program", "left=300,top=200,width=750,height=450,scrollbars=yes,resizable=yes");
		return false;
	}
	function view_menu(me_id)
	{

		var url = "./menu_view.php?me_id="+me_id;
		window.open(url, "add_program", "left=300,top=200,width=750,height=450,scrollbars=yes,resizable=yes");
		return false;
	}
</script>

<?php
include_once ('./admin.tail.php');
?>