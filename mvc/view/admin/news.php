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
<a href="<?=baseUri()?>/admin/newNews" class="btn btn-success" style="padding:6px; color:#ffffff; margin:5px; float:left;font-size: 14px;padding: 6px 12px 7px 12px;"">
	افزودن خبر جدید
</a>
<table class="table table-striped">
    <thead style="background-color: rgba(255,190,0,0.56)">
        <tr style="font-size: 13px; text-align: center;font-family:sans_bold;">
            <td width="1%">#</td>
            <td width="1%">تصویر شاخص</td>
            <td>عنوان</td>
			<td class="alert-primary" width="2%" colspan="2">دسترسی ها</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($news)) {
            foreach ($news as $new) {				$id = $new['new_id'];
                echo '<tr>';
                echo '<td style="width: 50px; font-size:13px;"> ' . $new['new_id'] . '</td>'; 								echo '<td><img src=" '.baseUri().'/uploads/news/' . $new['new_id']. '.jpg" class="post-image" /></td>';
				
                echo '<td style="width:25%; font-size:13px;"> ' . $new['new_title'] . '</td>';
                // echo '<td style="font-size:13px; text-align: right;"> ' . html_entity_decode($new['new_body']) . '</td>';
                echo '<td style="font-size:13px; width:5%; text-align: center;"><a href="'.baseUri().'/admin/updateNews/'.$new['new_id'].'"><img src="'.baseUri().'/image/edit.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
                echo '<td style="font-size:13px; width:5%; text-align: center;"><a onclick="return submitRemove()" href="'.baseUri().'/admin/removeNews/'.$new['new_id'].'"><img src="'.baseUri().'/image/remove.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>

<div style="margin:20px; padding:20px;text-align: center;direction: rtl;">
	<?=pagination(baseUri().'/admin/news', 3  , 'active' , '' , $pageIndex , $pageCount) ?>
</div>

<script>
    function submitRemove(){
        var a = confirm("آیا از حذف اطمینان دارید؟");
        if(a == false){
            return false;
        }
    }
</script>

