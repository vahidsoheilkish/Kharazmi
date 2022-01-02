<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:40px auto; padding:10px; background-color: #9fcdff; text-align: center; border-radius:20px; ">
			<div style="display: inline-block;"><span style="font-size:22px;">کاربر گرامی : </span><span style="font-size:22px;"></span>&nbsp<span style="font-size:22px;">در صورت ورود به فرآیند پرداخت کلیک کنید</span></div>
			<hr><form action="<?=baseUri()?>/user/buypak" method="post">
				<input type="hidden" name="number_pak" value="<?=$_POST['select_pak']?>" />
				<input type="submit" class="btn btn-danger" value="پرداخت" />
			</form>
		</div>
	</div>
</div>