<div class="container" style="margin-top:20px;">
    <div class="row">
		<div style="text-align: center; width:50%;margin: auto;background-color: #9c62c7; padding: 0px; color:#fff;height: auto; border-radius: 10px 10px 0px 0px;padding: 5px 3px 5px 3px;color: #313131;box-shadow: 2px 1px 5px #999;"><span style="text-align:center; color:#ffffff; font-family:sans_bold; font-size:20px;"><?=$class[0]['title']?></span></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:#316d98; min-height:300px; border:1px solid #555; color:#ffffff;  padding:15px; direction:rtl; text-align: right; border-radius:9px;">
            <h4 style="font-family:sans_bold;">توضیحات :</h4><p style="width:90%; text-align: right; font-size:15px; margin:auto;"><?=$class[0]['description']?></p><hr>
            <div style="float:left;margin-left:45px; background-color:#da486a; border-radius:5px; padding:20px; font-size:20px;"><span style="padding:10px; font-size:22px;">قیمت</span><?=$class[0]['price']?><span style="padding:10px; font-size:22px;">تومان</span></div>
            <div style="margin: auto; margin-bottom:10px; width:100%; margin-top:120px; text-align:center;">
                <form action="<?=baseUri()?>/user/login" method="post">
                    <input type="hidden" name="price_pay" value="<?=$class[0]['price']?>" />
                    <input type="hidden" name="class_id" value="<?=$class[0]['id']?>" />
                    <input type="hidden" name="className" value="<?=$class[0]['title']?>" />
                    <button onclick="return confirmPay();" type="submit" class="btn btn-success btn-lg">ثبت نام در این دوره کلاس آموزشی</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmPay(){
        var a = confirm("آیا نسبت به پرداخت اطمینان دارید؟");
        if(a == false){
            return false;
        }
    }
</script>