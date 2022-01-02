<style>
    #box3{
        border:1px solid black;
        border-radius:12px;
        margin:auto;
        background-color: #e1dccb;
        padding:10px;
        margin-top:15px;
        direction:rtl;
        text-align: right;
    }
</style>
<div class="container">
    <div class="row">
        <div id="box3" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h2>پیک نانو</h2><hr/>
            <p>توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات </p><hr/>
            <form action="<?=baseUri()?>/user/buypak" method="post">
                <div style="width:40%; margin:auto;"><select name="select_pak" class="form-control">
                <?
                    foreach ($paks as $pak){
                        echo "<option value='".$pak['number']."'>".$pak['name']."</option>";
                    }
                ?>
                </select><br/>
                </div><hr style="width:75%; background-color:tomato; margin:auto;"/><br/>
                <div style="text-align: center; padding:5px;"><button type="submit" name="btn_submit" class="btn btn-success btn-lg">خرید پیک</button></div>
            </form>
        </div>
    </div>
</div>