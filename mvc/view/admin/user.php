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
		margin-top: -5px;
	}
	
	#close_btn:hover{
		cursor:pointer;
	}
	
	#show_message{
		margin: 10px;
	}
	
	#message_phrase{
		margin:0px 35px 0px 0px; 
		text-align:right;
	}
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
<a href="<?=baseUri()?>/admin/newUser" class="btn btn-success" style="padding:6px; color:#ffffff; margin:5px; float:left;font-size: 14px;padding: 6px 12px 7px 12px;"">
	افزودن کاربر جدید
</a>
<table class="table table-striped" style="min-width:1600px;">
    <thead style="background-color: rgba(255,190,0,0.56)">
    <tr style="font-size: 13px; text-align: center;font-family:sans_bold;">
        <td>#</td>
        <td>کدملی</td>
        <td>رمزعبور</td>
        <td>نام</td>
        <td>نام خانوادگی</td>
        <td>نام پدر</td>
        <td>مدرسه</td>
        <td>مقطع</td>
        <td>پایه تحصیلی</td>
        <td>جنسیت</td>
        <td>50 درصد تخفیف</td>
        <td>رایگان</td>
        <td colspan="2">دسترسی ها</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($users)) {
        foreach ($users as $user) {
            $gender = $user['gender'] == 0 ? 'مرد' : 'زن';
            $is50 = $user['is50percent'] == 1 ? 'فعال' : 'غیرفعال';
            $free = $user['isFree'] == 1 ? 'فعال' : 'غیرفعال';
            echo '<tr>';
            echo '<td style="text-align: center;"> ' . $user['userId'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['meliCode'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['password'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['name'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['family'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['fatherName'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['schoolName'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['course'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $user['paye'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $gender . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $is50 . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $free . '</td>';

            echo '<td style="font-size:13px; width:5%; text-align: center;"><a href="'.baseUri().'/admin/updateUser/'.$user['userId'].'"><img src="'.baseUri().'/image/edit.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a onclick="return confirmDelete()" href="'.baseUri().'/admin/removeUser/'.$user['userId'].'"><img src="'.baseUri().'/image/remove.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>
<div style="margin:20px; padding:20px;text-align: center;direction: rtl;">
	<?=pagination(baseUri().'/admin/user', 3  , 'active' , '' , $pageIndex , $pageCount) ?>
</div>
<script>
    function confirmDelete(){
        var a = confirm('آیا نسبت به حذف کاربر اطمینان دارید؟');
        if(a == false){
            return false;
        }
    }
</script>



