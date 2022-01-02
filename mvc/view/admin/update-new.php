<style>
    html{
        width:100%;
        height:100%;
    }
    body{
        background: #8b969b;
    }
</style>
<?php
    $id =$oneNew[0]['new_id'];
    $title =$oneNew[0]['new_title'];
    $body = $oneNew[0]['new_body'];
?>
<script src="<?=baseUri()?>/system/ckeditor/ckeditor.js"></script>
<script src="<?=baseUri()?>/ckeditor/samples/js/sample.js"></script>
<div class="table-responsive">
<form action="<?=baseUri()?>/admin/updateSetNew" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?=$id?>" name="txt_id" />
    <table class="table table-striped table-bordered table-hover">
        <tr>
			<th>عنوان خبر</th>
            <td><input type="text" name="txt_title" class="form-control" placeholder="عنوان خبر" required value="<?=$title?>" /></td>
        </tr>
			<tr>
			  <th>تصویر شاخص</th>
			  <td><input type="file" id="picture" name="picture" /></td>
			</tr>
        <tr>
			<th style="min-width: 10% !important;">متن خبر</th>
            <td><textarea name="txt_body" id="editor" class="form-control" style="resize: vertical; margin:5px; margin:auto"><?=$body?></textarea>
				<script>
					CKEDITOR.replace('editor', {
						extraPlugins: 'bidi',
						contentsLangDirection: 'rtl',
						height: 270
					});
				</script></td>
        </tr>
		<tr>
			<td colspan="2" style="text-align:center;">
				<button type="submit" name="submit" value="ویرایش کاربر" class="btn btn-success btn-sm" > ویرایش خبر</button>
				<button type="button" value="بازگشت به لیست" class="btn btn-danger btn-sm" onclick="window.location='<?=baseUri()?>/admin/news'" >بازگشت به لیست</button>
			</td>
		</tr>
    </table>
    <hr/>
</form>
</div>