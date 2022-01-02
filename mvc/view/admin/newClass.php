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
    <form action="<?=baseUri()?>/admin/SetNewClass" method="post">
        <table class="table table-striped">
            <tr>
                <th style="color:#222222; vertical-align:middle; text-align:center;"><span style="padding:5px; border-radius:3px;">عنوان کلاس</span></th>
                <td><input type="text" name="title" class="form-control" placeholder="عنوان کلاس" required value="" /></td>
            </tr>
            <tr>
                <th style="color:#222222; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">توضیحات</span></span> </th>
                <td><textarea type="text" name="description"  class="form-control" placeholder="توضیحات"></textarea></td>
            </tr>
            <tr>
                <th style="color:#222222; vertical-align:middle; text-align:center;"><span class="vertical-middle"><span style="padding:5px; border-radius:3px;">قیمت به تومان</span></span> </th>
                <td><input type="text" name="price"  class="form-control" placeholder="قیمت به تومان" value=""></td>
            </tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<button type="submit" name="editNew" value="ویرایش کاربر" class="btn btn-success btn-sm" >اضافه کلاس</button>
					<button type="button" value="بازگشت به لیست" class="btn btn-danger btn-sm" onclick="window.location='<?=baseUri()?>/admin/classes'" >بازگشت به لیست</button>
				</td>
			</tr>
        </table>
        <hr/>
    </form>
</div>