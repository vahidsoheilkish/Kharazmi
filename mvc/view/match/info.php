<div class="container" style="margin-top:20px;">
    <div class="row">
		<div style="text-align: center; width:50%;margin: auto;background-color: #FF5F5F; padding: 0px; color:#fff;height: auto; border-radius: 10px 10px 0px 0px;padding: 5px 3px 5px 3px;color: #313131;box-shadow: 2px 1px 5px #999;"><span style="text-align:center; color:#ffffff; font-family:sans_bold; font-size:20px;"><?=$match[0]['match_title']?></span></div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color:  #ffe186; min-height:400px; border:1px solid #555; color:#000;  padding:15px; direction:rtl; text-align: right; border-radius:9px;">
            <h4 style="font-family:sans_bold;">بخش نامه :</h4><p style="width:90%; text-align: right; font-size:15px; margin:auto;"><?=$match[0]['match_description']?></p><hr>
            <h4 style="font-family:sans_bold;">شیوه نامه :</h4><p style="width:90%; text-align: right; font-size:15px; margin:auto;"><?=$match[0]['match_description']?></p><hr>
            <div style="float:left;margin-left:45px; background-color:#fff; border-radius:5px; padding:20px; font-size:20px;"><span style="padding:10px; font-size:22px;">قیمت</span><?=$match[0]['match_price']?><span style="padding:10px; font-size:22px;">تومان</span></div>
            <div style="margin: auto; margin-bottom:10px; width:100%; margin-top:120px; text-align:center;">
                <form action="<?=baseUri()?>/user/login" method="post">
                    <input type="hidden" name="price_pay" value="<?=$match[0]['match_price']?>" />
                    <input type="hidden" name="match_id" value="<?=$match[0]['match_id']?>" />
                    <input type="hidden" name="matchName" value="<?=$match[0]['match_title']?>" />
                    <button onclick="return confirmPay();" type="submit" class="btn btn-primary btn-lg">ثبت نام در این مسابقه</button>
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