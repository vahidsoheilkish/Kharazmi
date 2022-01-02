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
    $id = $result[0]['userId'];
    $meliCode = $result[0]['meliCode'];
    $name = $result[0]['name'];
    $family = $result[0]['family'];
    $fatherName = $result[0]['fatherName'];
    $schoolName = $result[0]['schoolName'];
    $course = $result[0]['course'];
    $paye = $result[0]['paye'];
?>
<div class="table-responsive">
    <form action="<?=baseUri()?>/admin/updateSetUser" method="post">
        <input type="hidden" value="<?=$id?>" name="txt_id" />
		<table class="table table-striped table-bordered table-hover">
			<tr>
			  <th>کد ملی</th>
			  <td><input type="text" name="txt_meliCode" class="form-control" placeholder="کدملی" required value="<?=$meliCode?>" /></td>
			</tr>
			<tr>
			  <th>نام</th>
			  <td><input type="text" name="txt_name"  class="form-control" placeholder="نام" value="<?=$name?>"></td>
			</tr>
			<tr>
			  <th>نام خانوادگی</th>
			  <td><input type="text" name="txt_family" class="form-control" placeholder="نام خانوادگی" value="<?=$family?>"></td>
			</tr>
			<tr>
			  <th>نام پدر</th>
			  <td><input type="text" name="txt_fatherName"  class="form-control" placeholder="نام پدر" value="<?=$fatherName?>"></td>
			</tr>
			<tr>
			  <th>مدرسه</th>
			  <td><input type="text" name="txt_schoolName"  class="form-control" placeholder="مدرسه" value="<?=$schoolName?>" ></td>
			</tr>
			<tr>
			  <th>پایه تحصیلی</th>
			  <td><input type="text" name="txt_course"  class="form-control" placeholder="مقطع تحصیلی" value="<?=$course?>" ></td>
			</tr>
			<tr>
			  <th>پایه تحصیلی</th>
			  <td><input type="text" name="txt_paye"  class="form-control" placeholder="پایه تحصیلی"  value="<?=$paye?>"></td>
			</tr>
			<tr>
			  <th>جنسیت</th>
				<td>
				<select name="txt_gender" class="form-control">
					<option value="">انتخاب کنید</option>
					<option value="male" <?php if($result[0]['gender'] == '0') echo 'selected'; ?>>مرد</option>
					<option value="female" <?php if($result[0]['gender'] == '1') echo 'selected'; ?>>زن</option>
				</select>
				</td>
			</tr>
			<tr>
			  <th>50 درصد تخفیف</th>
				<td>
				<select name="txt_is50percent" class="form-control">
					<option value="">انتخاب کنید</option>
					<option value="1" <?php if($result[0]['is50percent'] == '1') echo 'selected'; ?>>بلی</option>
					<option value="0" <?php if($result[0]['is50percent'] == '0') echo 'selected'; ?>>خیر</option>
				</select>
				</td>
			</tr>
			<tr>
			  <th>رایگان</th>
				<td>
				<select name="txt_isFree" class="form-control">
					<option value="">انتخاب کنید</option>
					<option value="1" <?php if($result[0]['isFree'] == '1') echo 'selected'; ?>>بلی</option>
					<option value="0" <?php if($result[0]['isFree'] == '0') echo 'selected'; ?>>خیر</option>
				</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="text-align:center;">
					<button type="submit" name="submit" value="ویرایش کاربر" class="btn btn-success btn-sm" >ویرایش کاربر</button>
					<button type="button" value="بازگشت به لیست" class="btn btn-danger btn-sm" onclick="window.location='<?=baseUri()?>/admin/user'" >بازگشت به لیست</button>
				</td>
			</tr>
		</table>
	</form>
</div>