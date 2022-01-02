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
<a href="<?=baseUri()?>/admin/newClass" id="new-match" class="btn btn-success" style="padding:6px; color:#ffffff; margin:5px; float:left;font-size: 14px;padding: 6px 12px 7px 12px;">
    اضافه کردن کلاس آموزشی جدید
</a>
<table class="table table-striped" style="min-width:100%;">
    <thead style="background-color: rgba(255,190,0,0.56)">
    <tr style="font-size: 13px; text-align: center;font-family:sans_bold;">
        <td>#</td>
        <td>عنوان</td>
        <td>توضیحات</td>
        <td>قیمت</td>
		<td class="alert-primary" colspan="2">دسترسی ها</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($classes)) {
        foreach ($classes as $class) {
            echo '<tr>';
            echo '<td style="width: 50px; font-size:13px;"> ' . $class['id'] . '</td>';
            echo '<td style="width: 50px; font-size:13px;"> ' . $class['title'] . '</td>';
            echo '<td style="width:25%; font-size:13px; width:15%;"> ' . $class['description'] . '</td>';
            echo '<td style="font-size:13px; text-align: center; width:30%;" class="alert-warning"> ' . number_format($class['price']) . '</td>';
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a href="'.baseUri().'/admin/updateClass/'.$class['id'].'"><img src="'.baseUri().'/image/edit.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a onclick="return confirmDelete()" href="'.baseUri().'/admin/removeClass/'.$class['id'].'"><img src="'.baseUri().'/image/remove.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>

<script>
    function confirmDelete(){
        var a = confirm('آیا نسبت به حذف کلاس آموزشی اطمینان دارید؟');
        if(a == false){
            return false;
        }
    }
</script>



