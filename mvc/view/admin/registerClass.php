<style>
    #new-match{
        color:#1b1e21;
    }
    #new-match:hover{
        color:#fff;
        transition: .4s;
    }
	#close_btn{
		text-align:center; 
		float:right;
		background:transparent; 
		width:25px;
		height:25px;
		border-radius:20px;
		font-family:sans_bold;
	}
	
	#close_btn:hover{
		cursor:pointer;
	}
	
	#show_message{
		margin: 10px;
	}
	
	#message_phrase{
		margin:10px 35px 0px 0px; 
		text-align:center;
	}		.table td{		vertical-align:middle;	}
</style>
<script>
	$(document).ready(function(){
		$("#close_btn").click(function(){
			$("#show_message").hide("slow");
		});
	});
</script>
<?php if($is_success == 'yes') : ?>
		<div id="show_message" class="alert alert-success">
			<img src="http://nezami.asanrank.ir/image/close_red.png" id="close_btn" />
			<p id="message_phrase">عملیات با موفقیت انجام شد</p>
		</div>
	<?php endif; ?>
<table class="table table-striped" style="min-width:1600px;">
    <thead style="background-color: rgba(255,190,0,0.56)">
    <tr style="font-size: 13px; text-align: center;font-family:sans_bold;">
        <td>کدکاربری</td>
        <td>عنوان کلاس</td>
        <td>نام و نام خانوادگی دانش آموز</td>
        <td>کدملی</td>
        <td>زمان پرداخت هزینه</td>
        <td>کدپیگیری پرداخت</td>		<td>عکس کاربر</td>
		<td style="min-width:10%;" class="alert-danger"> دسترسی ها</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($classRegister)) {
        foreach ($classRegister as $class) {						$date = $class['time'];			$date2 = explode(' ' , $date);				$date3 = jDate($date2[0] , "Y-M-d");			$time = $date2[1];			$image_name = (int)$class['user_id'];
            echo '<tr>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $class['user_id'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $class['class_name'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $class['name'] . " " . $class['family'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $class['meliCode'] . '</td>';
            echo '<td style="font-size:13px; text-align: center; direction: rtl; min-width:30%;"> تاریخ :  ' . $date3 . " | ساعت : " .  $time . '</td>';
            echo '<td style="font-size:13px; text-align: center; direction: ltr;"> ' . $class['refcode'] . '</td>';						?>						<td><img src="<?=baseUri()?>/uploads/class/<?=$image_name?>.jpg" class="post-image" /></td>			<?
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a onclick="return confirmDelete()" href="'.baseUri().'/admin/removeClassRegistered/'.$class['id'].'"><img src="'.baseUri().'/image/remove.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>
<div style="margin:20px; padding:20px;">
<!--    --><?//=pagination(baseUri().'/admin/user', 2  , 'active' , '' , $pageIndex , $pageCount) ?>
</div>
<script>
    function confirmDelete(){
        var a = confirm('آیا نسبت به حذف کاربر اطمینان دارید؟');
        if(a == false){
            return false;
        }
    }
</script>



