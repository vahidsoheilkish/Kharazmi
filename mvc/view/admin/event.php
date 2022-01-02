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
        <img src="<?=baseUri()?>/image/close_red.png" id="close_btn" />
        <p id="message_phrase">عملیات با موفقیت انجام شد</p>
    </div>
<?php endif; ?>
<a href="<?=baseUri()?>/admin/newEvent" class="btn btn-success" style="padding:6px; color:#ffffff; margin:5px; float:left;font-size: 14px;padding: 6px 12px 7px 12px;"">
افزودن رویداد جدید
</a>
<table class="table table-striped" style="min-width:100%;">
    <thead style="background-color: rgba(255,190,0,0.56)">
    <tr style="font-size: 13px; text-align: center;font-family:sans_bold;">
        <td>#</td>
        <td>عنوان</td>
        <td style="width:11%!important;">دسترسی ها</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!empty($events)) {
        foreach ($events as $event) {
            echo '<tr>';
            echo '<th style="text-align: center;width:10%;"> ' . $event['id'] . '</th>';
            echo '<td style="font-size:13px; text-align: center;"> ' . $event['name'] . '</td>';
            echo '<td style="font-size:13px; width:5%; text-align: center;"><a onclick="return confirmDelete()" href="'.baseUri().'/admin/removeEvent/'.$event['id'].'"><img src="'.baseUri().'/image/remove.png" style="width:25px; height:25px;" draggable="false"/></a></td>';
            echo '</tr>';
        }
    }
    ?>
    </tbody>
</table>
<div style="margin:20px; padding:20px;text-align: center;direction: rtl;">
   <?=pagination(baseUri().'/admin/events' , 3 , '' ,'' , $pageIndex , $pageCount)?>
</div>
<script>
    function confirmDelete(){
        var a = confirm('آیا نسبت به حذف رویداد اطمینان دارید؟');
        if(a == false){
            return false;
        }
    }
</script>



