<style>
    html{
        width:100%;
        height:100%;
    }
    body{
        background: url("http://nezami.asanrank.ir/image/msg-bg.gif") no-repeat center;
        background-size: cover;

    }
    div , a{
        color: rgb(224, 217, 0);
        font-size: 16px;
    }

    #msgbox{
        display: none;
        position:absolute;
        animation-duration: 1s;
        top:10%;
        opacity: 0.8;
    }

    @keyframes scroll {
        from{
            top:0;
        }to{
            top:10%;
        }
    }
</style>
<div id="msgbox" class="tac w100 center">
    <br>
    <img src="<?=baseUri()?>/image/success.png" style="width:250px; height:250px;"/> <br/><br/>
    <div class="well bg-success" style="padding:10px; color:#fff; direction: rtl;"><?=$message?></div>
</div>

<script>
    $(document).ready(function(){
        $("#msgbox").fadeIn("slow");
        $("#msgbox").css("animation-name" , "scroll");
    });
</script>
