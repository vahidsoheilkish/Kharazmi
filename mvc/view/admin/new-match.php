<style>
    html{
        width:100%;
        height:100%;
    }
    body{
        background: #8b969b;
    }
</style>
<div class="table-responsive">
    <form action="<?=baseUri()?>/admin/addNewMatch" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="color:#222; vertical-align:middle; text-align:center;"><span style="padding:5px; border-radius:3px;">عنوان مسابقه</span></th>
                <td><input type="text" name="txt_title" class="form-control" placeholder="عنوان مسابقه" required /></td>
            </tr>
            <tr>
                <th style="color:#222; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">شیوه نامه</span></span> </th>
                <td><textarea type="text" name="txt_description"  class="form-control" placeholder="شیوه نامه"></textarea></td>
            </tr>
            <tr>
                <th style="color:#222; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">بخش نامه</span></span> </th>
                <td><textarea type="text" name="txt_part" class="form-control" placeholder="بخش نامه"></textarea></td>
            </tr>
            <tr>
                <th style="color:#222; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">قیمت به تومان</span></span> </th>
                <td><input type="text" name="txt_price"  class="form-control" placeholder="قیمت به تومان" ></td>
            </tr>
            <tr>
                <th style="color:#222; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">وضعیت</span></span> </th>
                <td>
                    <hr>
                    <select name="active" class="form-control">
                        <option></option>
                        <option value="active">فعال</option>
                        <option value="deactive">غیرفعال</option>
                    </select>
                </td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<button type="submit" name="submit" value="ویرایش کاربر" class="btn btn-success btn-sm" >ثبت مسابقه جدید</button>
					<button type="button" value="بازگشت به لیست" class="btn btn-danger btn-sm" onclick="window.location='<?=baseUri()?>/admin/matches'" >بازگشت به لیست</button>
				</td>
			</tr>
        </table>
        <hr/>
    </form>
</div>