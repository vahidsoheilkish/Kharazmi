<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:40px auto; padding:10px; background-color: #9fcdff; text-align: center; border-radius:20px; ">
			<div style="display: inline-block;"><span style="font-size:22px;">کاربر گرامی : </span><span style="font-size:22px;"></span>&nbsp<span style="font-size:22px;">در صورت ورود به فرآیند پرداخت کلیک کنید</span></div>
			<hr><form action="<?=baseUri()?>/user/payClass" method="post" enctype="multipart/form-data">
                <span style="float: right; margin:7px; font-size:15px;">انتخاب عکس</span>
				<input type="file" id="picture" name="picture" class="form-control" style="direction:rtl;" /><br/>
				<input type="hidden" name="txt_price" value="<?=$price?>" class="form-control" />
				<input type="hidden" name="txt_classId" value="<?=$_POST['class_id']?>" class="form-control" />
				<input type="hidden" name="txt_ClassName" value="<?=$_POST['className']?>" class="form-control" />
				<input type="submit" class="btn btn-danger" value="پرداخت" />
			</form>
		</div>
	</div>
</div>