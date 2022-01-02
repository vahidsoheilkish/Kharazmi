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
<a href="<?=baseUri()?>/admin/newMatch" class="btn btn-success" style="padding:6px; margin:5px; float:left;font-size: 14px;padding: 6px 12px 7px 12px;">
    افزودن مسابقه جدید
</a>
<table class="table table-striped" style="min-width:1400px;">
    <thead style="background-color: rgba(255,190,0,0.56)">
    <tr style="font-size: 13px; text-align: center;font-family:sans_bold;">
        <td>#</td>
        <td>عنوان</td>
        <td>شیوه نامه</td>
        <td>بخش نامه</td>
        <td>قیمت</td>
        <td>وضعیت</td>
        <td class="bg-warning" colspan="2">دسترسی ها</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($matches)) {
        foreach ($matches as $match) {
            $isActive = $match['match_active'] == 1 ? "فعال" : "غیرفعال";
            echo '<tr>';
            echo '<td style="width: 50px; font-size:13px;"> ' . $match['match_id'] . '</td>';
            echo '<td style="width:25%; font-size:13px; width:15%;" class="alert-link"> ' . $match['match_title'] . '</td>';
            echo '<td style="font-size:13px; text-align: center; width:30%;"> ' . $match['match_description'] . '</td>';
            echo '<td style="font-size:13px; text-align: center; width:30$;"> ' . $match['match_part'] . '</td>';
            echo '<td style="font-size:13px; text-align: center;" class="alert-danger"><span style="padding:3px; margin:3px; border-radius:2px;"> ' . number_format($match['match_price']) . '</span>تومان</td>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $isActive . '</td>';
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a href="'.baseUri().'/admin/updateMatch/'.$match['match_id'].'"><img src="'.baseUri().'/image/edit.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a onclick="return confirmDelete()" href="'.baseUri().'/admin/removeMatch/'.$match['match_id'].'"><img src="'.baseUri().'/image/remove.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>

<script>
    function confirmDelete(){
        var a = confirm('آیا نسبت به حذف مسابقه اطمینان دارید؟');
        if(a == false){
            return false;
        }
    }
</script>



