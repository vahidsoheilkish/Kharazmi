<?
if(!isset($_SESSION['admin'])){
    header("Location: /admin/login");
}else{
    $allClass = AdminModel::fetchAllClass();
    $allMatch = AdminModel::fetchAllMatches();
    $allPak = AdminModel::fetchAllPak();
}
?>

<html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap-reboot.css" />
	<script type="text/javascript" src="<?=baseUri()?>/asset/js/jquery-1.11.3.min.js"></script>
    <title><?=isset($title) ? $title : 'پنل مدیریت'?></title>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".menu1").click(function(){
               $(".sub1").slideToggle("slow");
            });

            $(".menu2").click(function(){
                $(".sub2").slideToggle("slow");
            });

            $(".menu3").click(function(){
                $(".sub3").slideToggle("slow");
            });
        });
    </script>
    <style>
        @font-face{
            font-family: 'sans';
            src: url('/asset/fonts/iransans.ttf');
        }
		@font-face {
			font-family: 'sans_bold';
			src: url('/asset/fonts/iranSansBold.ttf') format('truetype');
		}

        a:hover{
            color: #ff8c00;
            text-decoration: none;
        }

        body{
            direction: rtl;
            font-family: 'sans';
            font-size: 15px;
            color: #777;
            text-align: right;
            font-weight: 400;
        }
        .mrg-80 {
            margin: 8vh 0;
            min-height: 80vh;
        }
        .wrapper {
            width: 1150px;
            height: auto;
            overflow: hidden;
            margin: 0 auto;
        }
        .side {
            text-align: center;
            min-width: 350px;
        }
        .pull-left {
            float: left !important;
        }
        .main .panel{margin-bottom:25px;height:auto;overflow-x:auto;}

        .srch {
            display: block;
            height: auto;
            overflow-x: auto;
        }

        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 0px 0px 4px 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
            padding-bottom:20px;
        }

        html {
            direction: rtl;
            margin: 0px;
            padding: 0px;
            font-family: 'sans';
        }
        *{margin:0;padding:0;text-decoration:none;list-style-type:none;}
        *:focus {outline: 0;}
        ::selection {background:#eee;opacity:0.1;}
        ::-webkit-input-placeholder {
            color: #eee;
        }

        :-moz-placeholder { /* Firefox 18- */
            color: #eee;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            color: #eee;
        }

        :-ms-input-placeholder {
            color: #eee;
        }
        .clear{clear:both;}
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(http://nezami.asanrank.ir/img/loader.gif) center no-repeat #fff;
        }
        body {
            height: auto;
            direction: rtl;
            font-size: 13px;
            color: #777;
            text-align: right;
            font-weight: 400;
            margin: auto;
            padding: 0px;
            background: #61637C;
            overflow-x:hidden;
        }
        img {
            user-drag: none;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-drag: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }

        a{color:#263238;}
        b{font-weight:normal;font-family:FontAwesome;}

        .wrapper{width:1150px;height:auto;overflow:hidden;margin:0 auto;}
        .container{width:960px;height:auto;overflow:hidden;margin:0 auto;}

        .mrg-80{margin:8vh 0;min-height:80vh}
        .side{text-align:center;min-width:285px;}
        .side .panel{padding:30px 10px;}
        .side img{width:150px;height:150px;border-radius:100%;border:15px solid #EBEBEB;margin:10px 0;}
        .side .name{padding:10px 0;}
        .side .name span{background:#61637C;color:#fff;padding:0px 5px;border-radius:8px;margin-left:3px;}

        .side .ics{margin:10px 0;}
        .side .ics i{width:40px;height:40px;line-height:40px;border-radius:100%;background:#61637C;color:#fff;}
        .side .ics a:nth-child(1) i{background:#A5D23F;}
        .side .ics a:nth-child(2) i{background:#FF5F5F;}
        .side .ics a:nth-child(3) i{background:#00ADEF;}

        .side .nav{margin-top:30px;text-align:right;color:#777;}
        .side .nav li{background:#eee;border-radius:15px;margin-bottom:5px;}
        .side .nav a{color:#777;border-radius:15px;}
        .side .nav li:hover a{color:#444;}
        .side .nav i{}
        .side .nav .sub {display:none;}

        .side .nav .sub a{background:#ccc;display:block;color:#fff;margin:5px 0px 5px 15px;padding:4px 10px 6px 10px;text-decoration:none;width: 100%;font-size: 13px;}
        .side .nav .sub{padding-bottom:15px;padding-left: 7px;}

        .side .out{padding:10px;color:#fff;border-radius:15px;margin-top:20px;display:block;}

        .srch{display:block;height:auto;overflow-x:auto;}
        .srch input[type=submit]{font-family:FontAwesome;}

        form.form-control{display:block;height:auto;overflow-x:auto;border:0;padding:20px;}
        .control2{padding:7px 10px 8px 0px;border: 1px solid #ddd;border-radius: 8px !important;}
        .control2 a{width: 100%;display: block;font-size:14px;}
        .control2:hover{cursor : pointer; color:tomato}
        .control2 span{color:#777777;}
        .control2 span:hover{color:#444444;}
        .nav>.menu1:hover{color:#444444;}
        .nav>.menu2:hover{color:#444444;}
        .nav>.menu3:hover{color:#444444;}
        .pdg-20{padding:20px;}
        table{font-family:'sans'; text-align:center;}
        thead th{background:#EEEEEE; text-align:center;}

        .panel-heading{background:#ec4242;color:#fff;display:inline-block;margin:10px;border-radius:15px 15px 0px 0px;}

        .main .panel{margin-bottom:25px;height:auto;overflow-x:auto;}
		
		.table-bordered th {
			font-family: sans_bold;
			font-weight: normal;
			font-size: 14px;
			color: #212121;
			max-width: 50px;
		}
		.table-bordered td {
			text-align: right;
		}
		.post-image{
			float: right;
			width: 100px;
			height: 100px;
			margin-left: 5px;
			border: 1px solid #AFAFAF;
			border-radius: 10px;
		}

    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 side mrg-80" style="">

            <div class="panel">

                <a href="<?=baseUri()?>/admin/panel"><img src="<?=baseUri()?>/image/profile.png" draggable="false"/></a>
                <div class="name">به پنل مدیریت خوش آمدید</div>
                <div class="ics">
                    <a href=""><i class="fa fa-search"></i></a>
                    <a href=""><i class="fa fa-edit"></i></a>
                    <a href=""><i class="fa fa-gear"></i></a>
                </div>

                <ul class="nav">
                    <li class="form-control control2"><a href="<?=baseUri()?>/admin/panel"><i class="fa fa-chevron-left"></i>صفحه اصلی</a></li>
                    <li class="form-control control2"><a href="<?=baseUri()?>/admin/user"><i class="fa fa-chevron-left"></i> مدیریت کاربران</a></li>
                    <li class="form-control control2"><a href="<?=baseUri()?>/admin/matches"><i class="fa fa-chevron-left"></i> مسابقات</a></li>
                    <li class="form-control control2"><a href="<?=baseUri()?>/admin/classes"><i class="fa fa-chevron-left"></i>کلاس های آموزشی</a></li>
                    <li class="form-control control2"><a href="<?=baseUri()?>/admin/news"><i class="fa fa-chevron-left"></i> اخبار</a></li>
                    <li class="form-control control2"><a href="<?=baseUri()?>/admin/events"><i class="fa fa-chevron-left"></i>رویدادهای پیش رو</a></li>
                    <li class="form-control control2 menu1">
                        <span style="font-size:14px;"><i class="fa fa-chevron-down"></i>مسابقات ثبت نام شده</span>
                        <div class="sub sub1">
                            <?php
                            foreach ($allMatch as $match){
                                echo '<a href="'.baseUri().'/admin/registerMatch/'.$match['match_id'].'">'.$match['match_title'].'</a>';
                            }
                            ?>
                        </div>
                    </li>
                    <li class="form-control control2 menu2">
                        <span style="font-size:14px;"><i class="fa fa-chevron-down"></i>کلاس های آموزشی ثبت نام شده</span>
                        <div class="sub sub2">
                            <?php
                            foreach ($allClass as $class){
                                echo '<a href="'.baseUri().'/admin/registerClass/'.$class['id'].'">'.$class['title'].'</a>';
                            }
                            ?>
                        </div>
                    </li>

                    <li class="form-control control2 menu3">
                        <span style="font-size:14px;"><i class="fa fa-chevron-down"></i>پیک نانو</span>
                        <div class="sub sub3">
                            <?php
                            foreach ($allPak as $pak){
                                echo '<a href="'.baseUri().'/admin/registerPak/'.$pak['id'].'">'.$pak['name'].'</a>';
                            }
                            ?>
                        </div>
                    </li>
                </ul>

                <a href="<?=baseUri()?>/admin/logout"><div class="out btn btn-danger"><i class="fa fa-power-off"></i> خروج </div></a>

            </div>

        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-left main" style="margin-top:55px;" >


<div style="text-align:center;">
	<div class="panel-heading" style="padding:10px 0px 12px; direction: rtl; width: 100%;font-family: sans_bold;font-size: 15px;margin: 0px !important;">
		<?=isset($title) ? $title : 'پنل مدیریت'?>
	</div>
</div>
            <div class="panel">
                <?=$panel?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
