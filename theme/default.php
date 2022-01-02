<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="true">

    <link rel="stylesheet" href="<?=baseUri()?>/asset/css/style.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/css/main.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap-grid.css" />
    <link rel="stylesheet" href="<?=baseUri()?>/asset/bootstrap/css/bootstrap-reboot.css" />
    <script src="<?=baseUri()?>/asset/js/jquery-1.11.3.min.js"></script>
    <script src="<?=baseUri()?>/asset/bootstrap/bootstrap.min.js"></script>
    <script src="<?=baseUri()?>/asset/bootstrap/popper.js"></script>
    <script src="<?=baseUri()?>/asset/bootstrap/dropdown.js"></script>

    <link rel="stylesheet" type="text/css" href="<?=baseUri()?>/asset/sliderengine/amazingslider-1.css">
    <script src="<?=baseUri()?>/asset/sliderengine/jquery.js"></script>
    <script src="<?=baseUri()?>/asset/sliderengine/amazingslider.js"></script>
    <script src="<?=baseUri()?>/asset/sliderengine/initslider-1.js"></script>

    <link rel="stylesheet" href="<?=baseUri()?>/asset/index_files/mbcsmbmcp.css" type="text/css" />

    <title>
    <?
    if( !isset($data['title']) ){
        echo "";
    }else{
        echo $data['title'];
    }
    ?>  
    </title>
    <script type="text/javascript" src="/asset/index_files/mbjsmbmcp.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#loader-wrapper").fadeOut(1000);
        });

        $( "#accordion" ).accordion();



        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $( "#autocomplete" ).autocomplete({
            source: availableTags
        });
    </script>
    <style>
		@media all and (min-width:500px){ 
			.hidden{
				display:none;
			}
		}
    </style>
</head>
<body>
<div id="dialog-display">
    <img id="img-close" src="<?=baseUri()?>/image/close.png" style="width:20px; float:right; margin:20px; height:20px; vertical-align:middle;" /><br/><hr/>
    <h3 id="dialog-message"> </h3>
</div>
<div id="loader-wrapper"></div>
<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title alert alert-secondary" style="direction:rtl; margin:auto; text-align: center;">لطفا مشخصات را صحیح وارد نمایید.</h3>
                <button type="button" class="close" data-dismiss="modal" style="padding:25px 25px 0px 0px; vertical-align: middle;">&times;</button>
            </div>
            <div class="modal-body" style="direction:rtl;">
                <form method="post">
                    <table class="table table-bordered">
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span><img src="<?=baseUri()?>/image/user.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="text" name="txt_name" id="txt_name" class="form-control" placeholder="نام وارد کنید" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/user.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="text" name="txt_family" id="txt_family" class="form-control" placeholder="نام خانوادگی را وارد کنید" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/fingerprint.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="text" name="txt_codeMeli" id="txt_codeMeli" class="form-control" placeholder="کدملی را وارد کنید" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/lock1.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="password" name="txt_pass" id="txt_pass" class="form-control" placeholder="رمز عبور را وارد کنید" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/lock2.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="password" name="txt_secondPass" id="txt_secondPass" class="form-control" placeholder="تاییده رمز عبور" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/father.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="text" name="txt_fatherName" id="txt_fatherName" class="form-control" placeholder="نام پدر را وارد کنید" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/school.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="text" name="txt_schoolName" id="txt_schoolName" class="form-control" placeholder="نام مدرسه را وارد کنید" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/course.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="text" name="txt_course" id="txt_course" class="form-control" placeholder="دوره تحصیلی را وارد کنید" required /></td>
                        </tr>
                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/paye.png" style="width:25px; height:25px;" /></span> </td>
                            <td><input type="text" name="txt_paye" id="txt_paye" class="form-control" placeholder="مقطع تحصیلی را وارد کنید" required /></td>

                            <input type="text" name="csrfToken" value="" />
                        </tr>

                        <tr>
                            <td style="color:red; vertical-align:middle; text-align:center;"><span class="vertical-middle"><img src="<?=baseUri()?>/image/user.png" style="width:25px; height:25px;" /></span> </td>
                            <td>
                                <div id="gender">
                                    <div style="text-align:center">
                                        <span style="margin:8px;">پسر</span><input type="radio" class="" name="gender" id="male" checked value="male" style="vertical-align:middle; margin:0; width:35px; height:35px;" />
                                    </div><hr/>
                                    <div style="text-align:center">
                                        <span style="margin:8px;">دختر</span><input type="radio" class=""  name="gender" id="female" value="female" style="vertical-align:middle; margin:0; width:35px; height:35px;" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <hr/>
                    <button id="registerBtn" type="button" class="btn btn-success" name="btn-register">ثبت نام</button>
                    <input type="hidden" id="address" value="<?=baseUri()?>" />
                </form>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid">
    <div class="row" id="log">
		<div class="col-lg-10 col-md-10 col-sm-6 col-xs-6">
			<? if(isset($_SESSION['userId']) && isset($_SESSION['code'])) { ?>
				<span id="welcome-message"> <?=$_SESSION['fullname']?>  خوش آمدید </span>
			<? }else{ ?>
				<span id="welcome-message"> کاربر مهمان خوش آمدید </span>
			<?} ?>
		</div>
        <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6" style="margin:0;">
            <img src="<?=baseUri()?>/image/logo-site.png" style="width:200px; height:30px;" />
        </div>
    </div>
    
</div><!-- end of container-fluid -->
<div class="container-fluid">
    <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="menu-bar">

            <nav class="navbar navbar-inverse" style="margin:0; font-size:12px;">

                <div style="float:left; margin:10px; margin-left:50px; vertical-align: middle;">
                    <form action="<?=baseUri()?>/user/search" method="post" class="form-inline">
						<button type="submit" class="btn-search"></button>
                        <input type="text" name="input_search" placeholder="عنوان جستجو ..." class="form-control input" style="font-size:13px; direction:rtl; width:auto;"/>
                    </form>
                </div>
                <ul id="mbmcpebul_table" class="mbmcpebul_menulist css_menu">

                    <li><div class="icon_7 with_img_24 buttonbg" style="width: 120px;"><a href="<?=baseUri()?>/home/home" class="button_7">صفحه اصلی</a></div></li>
                    <li><div class="icon_6 with_img_32 buttonbg" style="width: 93px;"><a href="<?=baseUri()?>/home/news" class="button_6">اخبار</a></div></li>
                    <li><div class="arrow buttonbg"><div class="icon_5 with_img_32"><a class="button_5">مسابقات</a></div></div>
                        <ul>
                            <?
                            foreach ($matches_menu as $match){
                                echo
                                    '<li>
                                        <a href="'.baseUri().'/match/info/'.$match["match_id"].'">'.$match['match_title'].'</a>
                                    </li>';
                            }
                            ?>
                        </ul></li>

                    <li><div class="arrow buttonbg" style="width: 174px;"><div class="icon_4 with_img_24"><a>جشنواره خوارزمی</a></div></div>
                        <ul>
                            <li><a href="<?=baseUri()?>/user/young" title="">جوان</a></li>
                            <li><a href="<?=baseUri()?>/user/teen" title="">نوجوان</a></li>
                        </ul></li>


                    <li><div class="arrow buttonbg" style="width: 92px;"><div class="icon_3 with_img_24"><a>نانو</a></div></div>
                        <ul>
                            <li><a class="with_arrow" title="">المپیاد نانو</a>
                                <ul>
                                    <li><a href="<?=baseUri()?>/user/olampiIntro" title="">معرفی</a></li>
                                    <li><a href="<?=baseUri()?>/class/info/5" title="">ثبت نام</a></li>
                                </ul></li>
                            <li><a class="with_arrow" title="">آزمایشگاه نانو</a>
                                <ul>
                                    <li><a href="<?=baseUri()?>/user/introLaboratory" title="">معرفی</a></li>
                                    <li><a href="<?=baseUri()?>/match/info/11" title="">مسابقات</a></li>
                                </ul></li>
                            <li><a title="">کلاس های نانو</a></li>
                                <li><a href="<?=baseUri()?>/user/nanoTutorial" title="">مطالب آموزشی</a></li>
                            <li><a href="<?=baseUri()?>/user/paknano" title="">پیک نانو</a></li>
                        </ul></li>

                    <li><div class="arrow buttonbg" style="width: 184px;"><div class="icon_2 with_img_24"><a>کلاس های آموزشی</a></div></div>
                        <ul>
                            <?
                                 if(isset($classes)){
                                    foreach ($classes as $class){ ?>
                                        <li><a href="<?=baseUri()?>/class/info/<?=$class['id']?>" title=""><?=$class['title']?></a></li>
                                 <? } } ?>

                        </ul></li>

                    <li><div class="icon_1 with_img_24 buttonbg" style="width: 119px;"><a href="<?=baseUri()?>/home/callus" class="button_1">تماس با ما</a></div></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<hr style="border:1px solid gray; width:100%; margin:0;"/>
<div class="container" style="margin-top:8px;  padding-bottom:3px;">
    <div class="row">
		<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" id="login">
            <form action="<?=baseUri()?>/user/login" method="POST">
                <div style="text-align: center;"><span style=""><img src="<?=baseUri()?>/image/logon.png" draggable="false" style="width:50px; height:50px; margin-top:10px;" /></span></div><br/>
                <? if(!isset($_SESSION['userId']) && !isset($_SESSION['code'])) {?>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <div><span style="float:right; padding-bottom:7px; font-size:13px;" class="log-helper">نام کاربری</span></div><input name="log_username" id="iUsername" class="input100" type="text" required style="color:#fff; height:10%;">
                    <span class="focus-input100" data-placeholder=""></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>

                    <div><span style="float:right; padding-bottom:7px; font-size:13px;" class="log-helper">رمز عبور</span></div><input class="input100" name="log_password" id="iPassword" type="password" required style="color:#fff; height:10%;">
                    <span class="focus-input100" data-placeholder=""></span>
                </div><br/>
				
                <div style="text-align:center;"><span class="badge" style="font-size:14px; margin-top:15px; font-weight: normal; background-color:#1db38987;"><? //echo $_SESSION['code']; ?></span></div>

                <!--                <div class="wrap-input100 validate-input" data-validate=""><br/>-->
                <!--                    <div class="in-div"><span class="log-helper">کد امنیتی</span></div><input class="input100" name="log_code" id="iCode" type="text" required style="color:#fff;">-->
                <!--                    <span class="focus-input100" data-placeholder=""></span>-->
                <!--                </div>-->
                <input type="hidden" name="csrf" value="<?=csrfToken()?>" />
                <div class="container-login100-form-btn" style="margin-top:0px;">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" name="btn-login" id="iLogin" class="login100-form-btn">
                            ورود
                        </button>
                    </div>
                </div>
				
            </form>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:4px; float:right; text-align:right; direction:rtl;">
				<div class="row">
					<span style="color:#fff; margin-top:4px;">ثبت نام نکرده اید ؟</span><button type="button" class="btn btn-warning btn-sm" style="margin-top:0px; margin-right:5px; vertical-align:middle;" data-toggle="modal" data-target="#myModal">ثبت نام</button>
				</div> 
			</div>
            <? } else {  ?>
                <div class="alert alert-success tac" style="direction: rtl; width:100%;">کاربر گرامی در صورت ثبت نام در کلاس ها از منوی بالای سایت استفاده کنید</div><br/>
					<a href="<?=baseUri()?>/user/logout" type="submit" class="btn btn-warning" name="btn_logout"> <img src="<?=baseUri()?>/image/logout.png" style="width:30px; height: 30px;" /> خروج از حساب کاربری </a>
            <? } ?>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" class="hidden" id="slider" style="overflow:hidden;">

            <!-- Insert to your webpage where you want to display the slider -->
            <div id="amazingslider-wrapper-1" style="display:block;position:relative;max-width:100%; padding:3px; border-radius:10px;">
                <div id="amazingslider-1" style="display:block;position:relative;margin:0 auto;">
                    <ul class="amazingslider-slides" style="display:none;">
                        <li><img src="<?=baseUri()?>/image/1.jpg" alt="pic1"  title="pic1" class="img-responsive" draggable="false" />
                            <button class="as-btn-blue-medium">link1</button>
                        </li>
                        <li><img src="<?=baseUri()?>/image/2.jpg" alt="pic2"  title="pic2" class="img-responsive" draggable="false" />
                            <button class="as-btn-blue-medium">link2</button>
                        </li>
                        <li><img src="<?=baseUri()?>/image/3.jpg" alt="pic3"  title="pic3" class="img-responsive" draggable="false" />
                            <button class="as-btn-blue-medium">link3</button>
                        </li>
                        <li><img src="<?=baseUri()?>/image/4.jpg" alt="pic4"  title="pic4" class="img-responsive" draggable="false" />
                            <button class="as-btn-blue-medium">link4</button>
                        </li>
                        <li><img src="<?=baseUri()?>/image/5.jpg" alt="pic5"  title="pic5" class="img-responsive" draggable="false" />
                            <button class="as-btn-blue-medium">link5</button>
                        </li>
                        <li><img src="<?=baseUri()?>/image/6.jpg" alt="pic6"  title="pic6" class="img-responsive" draggable="false" />
                            <button class="as-btn-blue-medium">link6</button>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End of body section HTML codes -->

        </div>
    </div>
</div>
<div class="container" style="margin-top:18px;padding-left:0px !important;">

    <div class="row"  style="padding:22px 3px 15px 3px;">

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<?=$content?>
			<?php if(empty($content)) : ?>
				<? foreach($last_news as $last){ ?>
					<div id="contain">
						<div class="header_news2"><?=$last['new_title']?></div>
						<div class="post">
							<?php if(file_exists(baseUri().'/uploads/news/'.$last['new_id'].'.jpg')) : ?>
								<img src="<?=baseUri()?>/uploads/news/<?=$last['new_id']?>.jpg" class="post-image" />
							<?php else : ?>
								<img src="<?=baseUri()?>/uploads/news/no_img.jpg" class="post-image" />
							<?php endif; ?>
							<div class="post-text">
								<?php
									$strip_body = strip_tags(html_entity_decode($last['new_body']));
									if(strlen($strip_body) > 300) {
										echo mb_substr($strip_body, 0, 300).' ...';
									}
									else {
										echo $strip_body;
									}
								?>
								<a href="<?=baseUri()?>/home/show_new/<?=$last['new_id']?>" target="_blank">(ادامه مطلب)</a>
							</div>
							<div style="clear:both;"></div>
						</div>
					</div>
				<? } ?>
				<a href="<?=baseUri()?>/home/news" class="btn btn-success" style="float:left; margin:10px;">مشاهده تمامی اخبار</a>
			<?php endif; ?>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="padding:10px;">
			<div id="sidebar">
				<div style="text-align:center;margin: -28px 0px 22px 0px;">
					<span class="header_news">رویدادهای پیش رو</span>
				</div>
				<div style="clear:both;"></div>
				<ul class="list-group list-group-item-heading" style="list-style: none;">
                    <?php
                        if(!empty($events)){
                            $rand = array("list-group-item-danger" , "list-group-item-info" , "list-group-item-text" , "list-group-item-success" , "list-group-item-warning");
                            foreach ($events as $event){
                                $randClass = rand(0,4);
                                $class = $rand[$randClass];
                                echo '<li style="border-radius:5px; margin:2px;" class="list-group-item '.$class.'">'.$event['name'].'</li>';
                            }
                        }
                    ?>
				</ul>

				<div class="" id="adv">

				</div>
			</div>
        </div>
    </div>
</div>
<div class="container-fluid" >
    <div class="row" >
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="footer">
            <h4 style="text-align:center;font-size: 15px;">کلیه حقوق برای پژوهش سرای نظامی فسا محفوظ می باشد</h4>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){

        $("#img-close").click(function(){
            $("#dialog-display").fadeOut("fast");
        });

        $("#registerBtn").click(function(){
            var name = document.getElementById("txt_name").value;
            var family = document.getElementById("txt_family").value;
            var code = document.getElementById("txt_codeMeli").value;
            var pass1 = document.getElementById("txt_pass").value;
            var pass2 = document.getElementById("txt_secondPass").value;
            var father = document.getElementById("txt_fatherName").value;
            var school = document.getElementById("txt_schoolName").value;
            var course = document.getElementById("txt_course").value;
            var paye = document.getElementById("txt_paye").value;
            var address = document.getElementById("address").value;
            var gender = document.querySelector('input[name="gender"]:checked').value;
            address = address + "/user/register"
            $.ajax({method : "POST" ,url: address ,
                    data:{
                        name : name,
                        family : family,
                        code : code,
                        pass1 : pass1,
                        pass2 : pass2,
                        father : father,
                        school : school,
                        course : course,
                        paye : paye,
                        gender : gender
                    }, success: function(data){
                        $("#dialog-display").css("display","block");
                        $("#dialog-message").html(data);
                    }

                }
            );
        });

    });
</script>
</body>
</html>
