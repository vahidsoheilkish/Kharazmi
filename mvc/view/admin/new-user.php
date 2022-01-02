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
    <form action="<?=baseUri()?>/admin/addNewUser" method="post">
		<table class="table table-striped table-bordered table-hover">
			<tr>
			  <th>کد ملی</th>
			  <td><input type="text" name="txt_meliCode" class="form-control" placeholder="کدملی" required /></td>
			</tr>
			<tr>
			  <th>نام</th>
			  <td><input type="text" name="txt_name"  class="form-control" placeholder="نام" required></td>
			</tr>
			<tr>
			  <th>نام خانوادگی</th>
			  <td><input type="text" name="txt_family" class="form-control" placeholder="نام خانوادگی" required></td>
			</tr>
			<tr>
			  <th>نام پدر</th>
			  <td><input type="text" name="txt_fatherName"  class="form-control" placeholder="نام پدر" required ></td>
			</tr>
			<tr>
			  <th>مدرسه</th>
			  <td><input type="text" name="txt_schoolName"  class="form-control" placeholder="مدرسه" required></td>
			</tr>
			<tr>
			  <th>پایه تحصیلی</th>
			  <td><input type="text" name="txt_course"  class="form-control" placeholder="مقطع تحصیلی"></td>
			</tr>
			<tr>
			  <th>پایه تحصیلی</th>
			  <td><input type="text" name="txt_paye"  class="form-control" placeholder="پایه تحصیلی"></td>
			</tr>
			<tr>
			  <th>جنسیت</th>
				<td>
				<select name="txt_gender" class="form-control" required>
					<option value="">انتخاب کنید</option>
					<option value="male">مرد</option>
					<option value="female">زن</option>
				</select>
				</td>
			</tr>
			<tr>
			  <th>50 درصد تخفیف</th>
				<td>
				<select name="txt_is50percent" class="form-control">
					<option value="">انتخاب کنید</option>
					<option value="1">بلی</option>
					<option value="0">خیر</option>
				</select>
				</td>
			</tr>
			<tr>
			  <th>رایگان</th>
				<td>
				<select name="txt_isFree" class="form-control">
					<option value="">انتخاب کنید</option>
					<option value="1">بلی</option>
					<option value="0">خیر</option>
				</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<button type="submit" name="submit" value="ویرایش کاربر" class="btn btn-success btn-sm" >افزودن کاربر</button>
					<button type="button" value="بازگشت به لیست" class="btn btn-danger btn-sm" onclick="window.location='<?=baseUri()?>/admin/user'" >بازگشت به لیست</button>
				</td>
			</tr>
		</table>
	</form>
</div>