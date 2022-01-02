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
    <form action="<?=baseUri()?>/admin/addNewEvent" method="post">
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="color:#222; vertical-align:middle; text-align:center;"><span style="padding:5px; border-radius:3px;">عنوان رویداد</span></th>
                <td><input type="text" name="txt_title" class="form-control" placeholder="عنوان رویداد" required /></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <button type="submit" name="submit" value="ویرایش کاربر" class="btn btn-success btn-sm" >ثبت رویداد جدید</button>
                    <button type="button" value="بازگشت به لیست" class="btn btn-danger btn-sm" onclick="window.location='<?=baseUri()?>/admin/events'" >بازگشت به لیست</button>
                </td>
            </tr>
        </table>
        <hr/>
    </form>
</div>