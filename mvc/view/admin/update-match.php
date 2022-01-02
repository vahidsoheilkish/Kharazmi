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
$id = $oneMatch[0]['match_id'];
$title = $oneMatch[0]['match_title'];
$description = $oneMatch[0]['match_description'];
$part = $oneMatch[0]['match_part'];
$price = $oneMatch[0]['match_price'];
$active = $oneMatch[0]['match_active'] == 1 ? 'فعال' : 'غیرفعال';
?>
<div class="table-responsive">
    <form action="<?=baseUri()?>/admin/updateSetMatch" method="post">
        <input type="hidden" value="<?=$id?>" name="txt_id" />
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="color:#0e0e0e; vertical-align:middle; text-align:center;"><span style="padding:5px; border-radius:3px;">عنوان مسابقه</span></th>
                <td><input type="text" name="txt_title" class="form-control" placeholder="عنوان مسابقه"  value="<?=$oneMatch[0]['match_title']?>" required /></td>
            </tr>
            <tr>
                <th style="color:#0e0e0e; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">شیوه نامه</span></span> </th>
                <td><textarea type="text" name="txt_description"  style="height:120px; font-size:13px;" class="form-control" placeholder="شیوه نامه"><?=$oneMatch[0]['match_description']?></textarea></td>
            </tr>
            <tr>
                <th style="color:#0e0e0e; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">بخش نامه</span></span> </th>
                <td><textarea type="text" name="txt_part" class="form-control" style="height:120px; font-size:13px;" placeholder="بخش نامه"><?=$oneMatch[0]['match_part']?></textarea></td>
            </tr>
            <tr>
                <th style="color:#0e0e0e; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">قیمت به تومان</span></span> </th>
                <td><input type="text" name="txt_price"  class="form-control" placeholder="قیمت به تومان" value="<?=$price?>"></td>
            </tr>
            <tr>
                <th style="color:#0e0e0e; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">وضعیت</span></span> </th>
                <td>
                    <select name="active" class="form-control">
                        <option>انتخاب کنید</option>
                        <option value="active" <?php if($oneMatch[0]['match_active'] == '1') echo 'selected'; ?>>فعال</option>
                        <option value="deactive" <?php if($oneMatch[0]['match_active'] == '0') echo 'selected'; ?>>غیرفعال</option>
                    </select>
                </td>
				<tr>
				<td colspan="2" style="text-align:center;">
					<button name="editNew" type="submit" class="btn btn-success btn-sm" name="btn-register">ویرایش مسابقه</button>
					<button type="button" value="بازگشت به لیست" class="btn btn-danger btn-sm" onclick="window.location='<?=baseUri()?>/admin/matches'" >بازگشت به لیست</button>
				</td>
			</tr>
        </table>
        <hr/>
    </form>
</div>