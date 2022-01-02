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
<table class="table table-striped" style="min-width:1600px;">
    <thead style="background-color: rgba(255,190,0,0.56)">
    <tr style="font-size: 13px; text-align: center;font-family:sans_bold;">
        <td>کدکاربری</td>
        <td>عنوان پیک نانو</td>
        <td>نام و نام خانوادگی دانش آموز</td>
        <td>کدملی</td>
        <td>زمان پرداخت هزینه</td>
        <td>کدپیگیری پرداخت</td>
		<td class="alert-danger" colspan="2">دسترسی ها</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($pakRegister)) {
        foreach ($pakRegister as $pak) {
            echo '<tr>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $pak['user_id'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $pak['pak_name'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $pak['name'] . " " . $pak['family'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $pak['meliCode'] . '</td>';
            echo '<td style="font-size:13px; text-align: center; direction: ltr;"> ' . $pak['time'] . '</td>';
            echo '<td style="font-size:13px; text-align: center; direction: ltr;"> ' . $pak['refcode'] . '</td>';
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a onclick="return confirmDelete()" href="'.baseUri().'/admin/removePakRegistered/'.$pak['id'].'"><img src="'.baseUri().'/image/remove.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
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



