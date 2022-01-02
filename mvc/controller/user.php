<?php
class UserController{
    private $data = array();
    public function __construct()
    {
        $this->data['matches_menu'] = UserModel::fetch_all_matches();
        $this->data['last_news'] = UserModel::fetch_last_news();
        $this->data['classes'] = UserModel::fetch_all_classes();
        $this->data['paks'] = UserModel::fetch_all_paks();
        $this->data['events'] = UserModel::fetch_all_events();

    }

    public function logout(){
        if(isset($_SESSION['userId']) || isset($_SESSION['code']) || isset($_SESSION['fullname'])) {
            session_destroy();
            message('success', Logout , true);
        }
    }

    public function login(){
		if(isset($_POST['price_pay']) && isset($_POST['match_id']) && isset($_POST['matchName'])) {
                $this->data['price'] = $_POST['price_pay'];
                $this->data['match_id'] = $_POST['match_id'];
                $this->data['matchName'] = $_POST['matchName'];
                View::render("pay/confirmMatch", $this->data);
            }elseif(isset($_POST['price_pay']) && isset($_POST['class_id']) && isset($_POST['className'])){
                $this->data['price'] = $_POST['price_pay'];
                View::render("pay/confirmClass", $this->data);
            }elseif (isset($_POST['select_pak'])){
                $this->data['select_pak'] = $_POST['select_pak'];
                View::render("pay/confirmPak" , $this->data);
            }elseif(isset($_POST['txt_price']) && isset($_POST['txt_matchId']) && isset($_POST['txt_matchName'])){
				$this->payMatch();
            }elseif(isset($_POST['txt_price']) && isset($_POST['txt_classId']) && isset($_POST['txt_ClassName'])){
				$this->payClass();
			}elseif(isset($_POST['number_pak'])){
                $this->buypak();
            }
	
        if(isset($_POST['log_username']) && isset($_POST['log_password'])){
            $username = validate_input($_POST['log_username']);
            $password = validate_input($_POST['log_password']);
            $res = userModel::login($username , $password);
            if($res[0]['meliCode'] == $username && $res[0]['password'] == $password){
                $_SESSION['userId'] = $res[0]['userId'];
                $_SESSION['code'] = $username;
                $_SESSION['fullname'] = $res[0]['name'] . ' ' . $res[0]['family'];
                message("success" , Login_Welcome);
            }else {
                message("fail",invalidUP , true);
            }
        }
    }

    public function register(){
        $meliCode = validate_input($_POST['code']);
        $password = validate_input($_POST['pass1']);
        $password2 = validate_input($_POST['pass2']);
        $name = validate_input($_POST['name']);
        $family = validate_input($_POST['family']);
        $fatherName = validate_input($_POST['father']);
        $schoolName = validate_input($_POST['school']);
        $course = validate_input($_POST['course']);
        $paye = validate_input($_POST['paye']);
        $gender = validate_input($_POST['gender']) == 'male' ? 0 : 1;


        $mcodeErr = "کد ملی وارد نشده است";
        $passErr = "رمز عبور وارد نشده است";
        $nameErr = "نام وارد نشده است";
        $familyErr = "نام خانوادگی وارد نشده است";
        $fatherErr = "نام پدر وارد نشده است";
        $errors = array();

        if($meliCode == "" ) { $errors[] = $mcodeErr;  }
        if($password == "" ) { $errors[] = $passErr;  }
        if($name == "" ) 	 { $errors[] = $nameErr;  }
        if($family == "" )   { $errors[] = $familyErr;  }
        if($fatherName == "" ) { $errors[] = $fatherErr;  }

        if($errors != null){
            foreach($errors as $err){
                echo $err . "<br/>";
            }
            exit;
        }

        if(strlen($meliCode) != 10 ){
            echo $meliCode;
            echo "کد ملی وارد شده صحیح نمی باشد";
            exit;
        }


        if($password != $password2){
            echo "رمز عبور یکسان نیست";
            exit;
        }

        $result = UserModel::register($meliCode , $password , $name , $family  , $fatherName , $schoolName , $course , $paye , $gender);

        if($result){
            echo 'ثبت نام با موفقیت انجام شد';
        } else{
            echo 'خطا در ثبت نام، لطفا مجددا تلاش کنید';
        }


    } // end of register


    public function payMatch(){
        if( !isset($_SESSION['userId'])  ){
            message('fail' , Login_First , true);
        }
		if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != '')
		{
			$attach_ext		= 'jpg,JPG,gif,png';
			$allow_types	= explode(',', $attach_ext);
			$file_ext		= FileExt($_FILES['picture']['name']);
			
			if(!in_array($file_ext, $allow_types) ){
				echo 'ارسال این نوع فایل مجاز نمی باشد';
				exit();
			}
			else {
				$file_path = 'uploads/match/'.$_SESSION['userId'].".jpg";
				if(move_uploaded_file($_FILES['picture']['tmp_name'],$file_path)) {
					$upload_ok = true;
				}
			}
		}
		
		if(isset($upload_ok)) {
			$price = validate_input($_POST['txt_price']);
			$userId = $_SESSION['userId'];
			$matchId = validate_input($_POST['txt_matchId']);
			$matchName = validate_input($_POST['txt_matchName']);
			$last = UserModel::saveMatchPay($userId , $matchId , $matchName);
			$url = "http://" . $_SERVER['SERVER_NAME'];

			Pay::transaction(20 , $price*10 ,  $url .baseUri() . "/user/callBackMatch/$last" , $last);
		}
		else {
			echo "خطا در آپلود تصویر";
		}
    }

    public function payClass(){
        if(!isset($_SESSION['userId'])){
            message('fail' , Login_First , true);
            exit;
        }
		if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != '')
		{
			$attach_ext		= 'jpg,JPG,gif,png';
			$allow_types	= explode(',', $attach_ext);
			$file_ext		= FileExt($_FILES['picture']['name']);
			
			if(!in_array($file_ext, $allow_types) ){
				echo 'ارسال این نوع فایل مجاز نمی باشد';
				exit();
			}
			else {
				$file_path = 'uploads/class/'.$_SESSION['userId'].".jpg";
				if(move_uploaded_file($_FILES['picture']['tmp_name'],$file_path)) {
					$upload_ok = true;
				}
			}
		}
		
		if(isset($upload_ok)) {
			$price = validate_input($_POST['txt_price']);
			$userId = $_SESSION['userId'];
			$classId = validate_input($_POST['txt_classId']);
			$className = validate_input($_POST['txt_ClassName']);
			$last = UserModel::saveClassPay($userId , $classId , $className);
			$url = "http://" . $_SERVER['SERVER_NAME'];
			Pay::transaction(20 , $price*10 ,  $url .baseUri() . "/user/callBackClass/$last" , $last);
		}
		else {
			echo "خطا در آپلود تصویر";
		}
    }

    public function young(){
        $this->data['title'] = "جشنواره خوارزمی جوان";
        View::render("jashnvare/young" , $this->data);
    }

    public function search(){
        $phrase = validate_input($_POST['input_search']);
        if($phrase == null){
            header("Location: ".baseUri()."/home/home");
        }
        $this->data['title'] = "نتیجه جستجو";
        $this->data['search'] = UserModel::fetch_search($phrase);
        View::render("home/search" , $this->data);
    }

    public function teen(){
        $this->data['title'] = "جشنواره خوارزمی نوجوان";
        View::render("jashnvare/teen" , $this->data);
    }

    public function nanoTutorial(){
        $this->data['title'] = "مطالب آموزشی نانو";
        View::render("nano/tutorial" , $this->data);
    }

    public function olampiIntro(){
        $this->data['title'] = "معرفی المپیاد نانو";
        View::render("nano/olampiIntro" , $this->data);
    }

    public function introLaboratory(){
        $this->data['title'] = "معرفی آزمایشگاه";
        View::render("nano/laboratoryIntro" , $this->data);
    }

    public function callBackMatch($last){
        $this->data['last'] = $last[0];
        $this->data['title'] = "صفحه بازگشت";
        $this->data['data'] = $_POST;
        View::render("message/callbackMatch" , $this->data);
    }

    public function callBackClass($last){
        $this->data['last'] = $last[0];
        $this->data['title'] = "صفحه بازگشت";
        $this->data['data'] = $_POST;
        View::render("message/callbackClass" , $this->data);
    }

    public function callBackPak($last){
        $last = $last[0];
        $this->data['final'] = $last;
        $this->data['title'] = "صفحه بازگشت";
        $this->data = $_POST;
        View::render("message/callbackPak" , $this->data);
    }

    public function pakNano(){
        $this->data['title'] = "پیک نانو";
        View::render("nano/paknano" , $this->data);
    }

    public function buypak(){
        if(!isset($_SESSION['userId'])){
            message('fail' , Login_First , true);
            exit;
        }

        $id = $_POST['number_pak'];
        $result = UserModel::fetch_pak_price($id);
        $userId = $_SESSION['userId'];
        $pakNumber = $result[0]['number'];
        $pakPrice = $result[0]['price'];
        $pakName = $result[0]['name'];
        $last = UserModel::savePakPay($userId , $pakNumber, $pakName);
        $url = "http://" . $_SERVER['SERVER_NAME'];

        Pay::transaction(20 , $pakPrice*10 ,  $url .baseUri() . "/user/callBackPak/$last" , $last);
    }









}



?>