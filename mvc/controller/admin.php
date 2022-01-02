<?php
class AdminController{

    public function panel(){
        $data['پنل مدیریت'] = "Manager Panel";
        View::renderPanel("admin/panel" , $data);
    }

    public function login(){
        $data['title'] = "ورود به پنل";
        View::login("admin/login");
    }

    public function confirm(){
        $username = validate_input($_POST['adminusername']);
        $password = validate_input($_POST['adminpassword']);
		global $config;
		$password = $config['salt1'].md5($password).$config['salt2'];
        $result = AdminModel::confirm($username , $password);
        if($result[0]['username'] == $username && $result[0]['password'] == $password){
            $_SESSION['admin'] = $username;
            header("Location: ".baseUri()."/admin/panel");
        }else{
            message('fail' , InvalidUP , true);
        }
    }

    public function logout(){
        if($_SESSION['admin'] != null){
            unset($_SESSION['admin']);
            header("Location: ".baseUri()."/admin/login");
        }
    }

    public function addnew(){
        if(isset($_POST['news_body']) && isset($_POST['news_title'])){
            $title = validate_input($_POST['news_title']);
            $body  = htmlspecialchars($_POST['news_body']);
			
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
					$upload_dir = 'uploads/news/';
					$filename = uniqid().".jpg";
					if(move_uploaded_file($_FILES['picture']['tmp_name'],$upload_dir.$filename)) {
						$upload_ok = true;
					}
				}
			}
			
			if(isset($upload_ok)) {
				$result = AdminModel::addnew($title , $body);
				if($result){
					$db = Db::getConnect();					
					rename($upload_dir.$filename,$upload_dir.$db->last_insert_id().".jpg");
					header("Location: ".baseUri()."/admin/news/success");
				}else{
					header("Location: ".baseUri()."/admin/news/success");
				}
			}
			else {
				echo "FILE";
			}
        }
    }

    public function news($pageIndex){
		if(isset($pageIndex[0]) && $pageIndex[0] == 'success') {
			$data['is_success'] = 'yes';
		}
		else {
			$data['is_success'] = 'no';
		}
        if(empty($pageIndex) || $pageIndex[0] == '' || $pageIndex[0] == 'success'){
            $pageIndex[0] = 1;
        }
        $count = 5;
        $startIndex = ($pageIndex[0] -1 ) * $count;
        $newsCount = AdminModel::pageCountNews();
        $result = AdminModel::news($startIndex , $count);
        $data['title'] = "مدیریت خبرها";
        $data['pageCount'] = ceil($newsCount[0]['total'] / $count);
        $data['news'] = $result;
        $data['pageIndex'] = $pageIndex[0];
        View::renderPanel("admin/news" , $data);
    }


    public function removeNews($id){
        $result = AdminModel::removeNews($id[0]);
        if($result){
			$upload_dir = 'uploads/news/';
			unlink($upload_dir.$id[0].'.jpg');
            header("Location: ".baseUri()."/admin/news/success");
        }else{
            header("Location: ".baseUri()."/admin/news/success");
        }
    }

    public function updateNews($id){
        $data['id'] = $id[0];
        $data['oneNew'] = AdminModel::selectOneNew($id[0]);
        View::renderPanel('admin/update-new' , $data);
    }

    public function updateSetNew(){

        if(isset($_POST['txt_id']) && isset($_POST['txt_title']) && isset($_POST['txt_body'])){
            $id = validate_input($_POST['txt_id']);
            $title = validate_input($_POST['txt_title']);
            $body = htmlspecialchars($_POST['txt_body']);

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
					$upload_dir = 'uploads/news/';
					unlink($upload_dir.$id.'.jpg');
					$filename = $id.".jpg";
					if(move_uploaded_file($_FILES['picture']['tmp_name'],$upload_dir.$filename)) {
						$upload_ok = true;
					}
				}
			}
			
            $result = AdminModel::updateNew($id , $title , $body);
            if($result){
                header("Location: ".baseUri()."/admin/news/success");
            }else{
				header("Location: ".baseUri()."/admin/news/success");
            }
        }
        return false;
    }

    public function matches($status){
		if(isset($status[0]) && $status[0] == 'success') {
			$data['is_success'] = 'yes';
		}
		else {
			$data['is_success'] = 'no';
		}
        $data['title'] = "مدیریت مسابقات";
        $data['matches'] = AdminModel::fetchAllMatches();
        View::renderPanel('admin/matches' , $data);
    }

    public function removeMatch($id){
        $result = AdminModel::removeMatch($id[0]);
        if($result){
            header("Location: ".baseUri()."/admin/matches/success");
        }else{
            header("Location: ".baseUri()."/admin/matches/success");
        }
    }

    public function updateMatch($id){
        $data['id'] = $id[0];
        $data['oneMatch'] = AdminModel::selectOneMatch($id[0]);
        View::renderPanel('admin/update-match' , $data);
    }

    public function updateSetMatch(){
        if(isset($_POST['txt_id']) &&  isset($_POST['txt_title']) && isset($_POST['txt_description']) && isset($_POST['txt_part']) && isset($_POST['txt_price']) && isset($_POST['active'])){

            $id = validate_input((int)$_POST['txt_id']);
            $title = validate_input($_POST['txt_title']);
            $description = validate_input($_POST['txt_description']);
            $part = validate_input($_POST['txt_part']);
            $price = validate_input($_POST['txt_price']);
            $active = validate_input($_POST['active']);
            $active = $active == 'active' ? 1 : 0 ;

            $result = AdminModel::updateMatch($id , $title , $description , $part , $price , $active);
            if($result){
                header("Location: ".baseUri()."/admin/matches/success");
            }else{
                header("Location: ".baseUri()."/admin/matches/success");
            }
        }
    }

    public function newMatch(){
        $data['title'] = "افزودن مسابقه جدید";
        View::renderPanel('admin/new-match' , $data);
    }

    public function addNewMatch(){
        if(isset($_POST['txt_title']) && isset($_POST['txt_description']) && isset($_POST['txt_part']) && isset($_POST['txt_price']) && isset($_POST['active'])){

            $title = validate_input($_POST['txt_title']);
            $description = validate_input($_POST['txt_description']);
            $part = validate_input($_POST['txt_part']);
            $price = validate_input($_POST['txt_price']);
            $active = validate_input($_POST['active']);
            $active = $active == 'active' ? 1 : 0 ;

            $result = AdminModel::addMatch($title , $description , $part , $price , $active);
            if($result){
                header("Location: ".baseUri()."/admin/matches/success");
            }else{
                header("Location: ".baseUri()."/admin/matches/success");
            }
        }
    }

    public function user($pageIndex){
		if(isset($pageIndex[0]) && $pageIndex[0] == 'success') {
			$data['is_success'] = 'yes';
		}
		else {
			$data['is_success'] = 'no';
		}
        if(empty($pageIndex) || $pageIndex[0] == '' || $pageIndex[0] == 'success'){
            $pageIndex[0] = 1;
        }
        $count = 10;
        $startIndex = ($pageIndex[0] -1 ) * $count;
        $newsCount = AdminModel::pageCountUser();
        $result = AdminModel::users($startIndex , $count);
        $data['title'] = "مدیریت کاربران";
        $data['pageCount'] = ceil($newsCount[0]['total'] / $count);
        $data['users'] = $result;
        $data['pageIndex'] = $pageIndex[0];
        View::renderPanel("admin/user" , $data);
    }

    public function newNews(){
        $data['title'] = "افزودن خبر جدید";
        View::renderPanel("admin/new-news");
    }
    public function newUser(){
        $data['title'] = "افزودن کاربر جدید";
        View::renderPanel("admin/new-user");
    }

    public function addNewUser(){
        $gender = $_POST['txt_gender'] == 'male' ? 0 : 1 ;
        $is50 = validate_input($_POST['txt_is50percent']);
        $isFree = validate_input($_POST['txt_isFree']);

        $meliCode = validate_input($_POST['txt_meliCode']);
        $name = validate_input($_POST['txt_name']);
        $family = validate_input($_POST['txt_family']);
        $fatherName = validate_input($_POST['txt_fatherName']);
        $schoolName = validate_input($_POST['txt_schoolName']);
        $course = validate_input($_POST['txt_course']);
        $paye = validate_input($_POST['txt_paye']);

        $res = AdminModel::insertNewUser($meliCode , $name , $family, $fatherName, $schoolName, $course, $paye, $gender, $is50 , $isFree);
        if($res){
            header("Location: ".baseUri()."/admin/user/success");
        }else{
            header("Location: ".baseUri()."/admin/user/success");
        }

    }

    public function updateUser($userId){
        $id = $userId[0];
        $data['result'] = AdminModel::fetchOneUser($id);
        View::renderPanel('admin/update-user' , $data);
    }

    public function updateSetUser(){
        $gender = $_POST['txt_gender'] == 'male' ? 0 : 1;
        $id = validate_input($_POST['txt_id']);
        $meliCode = validate_input($_POST['txt_meliCode']);
        $name = validate_input($_POST['txt_name']);
        $family = validate_input($_POST['txt_family']);
        $fatherName = validate_input($_POST['txt_fatherName']);
        $schoolName = validate_input($_POST['txt_schoolName']);
        $course = validate_input($_POST['txt_course']);
        $paye = validate_input($_POST['txt_paye']);
        $is50 = validate_input($_POST['txt_is50percent']);
        $isFree = validate_input($_POST['txt_isFree']);

        $res = AdminModel::updateSetUser($id , $meliCode , $name, $family, $fatherName, $schoolName, $course , $paye , $gender , $is50, $isFree);
        if($res){
			header("Location: ".baseUri()."/admin/user/success");
        }else{
            header("Location: ".baseUri()."/admin/user/success");
        }
    }

    public function removeUser($id){
        $userId = $id[0];
        $res = AdminModel::removeUser($userId);
        if($res){
           header("Location: ".baseUri()."/admin/user/success");
        }else{
           header("Location: ".baseUri()."/admin/user/success");
        }
    }

    public function classes($status){
		if(isset($status[0]) &&$status[0] == 'success') {
			$data['is_success'] = 'yes';
		}
		else {
			$data['is_success'] = 'no';
		}
        $data['title'] = "کلاس های آموزشی";
        $data['classes'] = AdminModel::fetchAllClass();
        View::renderPanel("admin/class" , $data);
    }

    public function updateClass($id){
        $id = $id[0];
        $data['result'] = AdminModel::fetchOneClass($id);
        View::renderPanel('admin/update-class' , $data);
    }

    public function updateSetClass(){
        $id = validate_input($_POST['id']);
        $title = validate_input($_POST['title']);
        $description = validate_input($_POST['description']);
        $price = validate_input($_POST['price']);


        $res = AdminModel::updateSetClass($id , $title , $description, $price);
        if($res){
            header("Location: ".baseUri()."/admin/classes/success");
        }else{
            header("Location: ".baseUri()."/admin/classes/success");
        }
    }

    public function newClass(){
        $data['title'] = "کلاس آموزشی جدید";
        View::renderPanel("admin/newClass" , $data);
    }

    public function SetNewClass(){
        $title = validate_input($_POST['title']);
        $description = validate_input($_POST['description']);
        $price = validate_input($_POST['price']);
        $res = AdminModel::addNewClass($title , $description, $price);
        if($res){
            header("Location: ".baseUri()."/admin/classes/success");
        }else{
            header("Location: ".baseUri()."/admin/classes/success");
        }
    }

    public function removeClass($id){
        $id = $id[0];
        $res = AdminModel::removeClass($id);
        if($res){
            header("Location: ".baseUri()."/admin/classes/success");
        }else{
            header("Location: ".baseUri()."/admin/classes/success");
        }
    }

    public function registerMatch($id){
		if($id[0] == 'success') {
			$data['is_success'] = 'yes';
		}
		else {
			$data['is_success'] = 'no';
		}
        if(empty($id)){
            exit;
        }
        $res = AdminModel::fetchMatchPay($id[0]);
        $data['title'] = 'اسامی ثبت نام شده مسابقات';
        $data['matchRegister'] = $res;
        View::renderPanel("admin/registerMatch" , $data);
    }

    public function registerClass($id){
		if($id[0] == 'success') {
			$data['is_success'] = 'yes';
		}
		else {
			$data['is_success'] = 'no';
		}
        if(empty($id)){
            exit;
        }
        $res = AdminModel::fetchClassPay($id[0]);
        $data['title'] = 'اسامی ثبت نام شده کلاس های آموزشی';
        $data['classRegister'] = $res;
        View::renderPanel("admin/registerClass" , $data);
    }

    public static function removeMatchRegistered($id){
        $id = $id[0];
        $res = AdminModel::removeUserRegistered($id);
        if($res){
            header("Location: ".baseUri()."/admin/registerMatch/success");
        }else{
            header("Location: ".baseUri()."/admin/registerMatch/success");
        }
    }

    public static function removeClassRegistered($id){
        $id = $id[0];
        $res = AdminModel::removeClassRegistered($id);
        if($res){
            header("Location: ".baseUri()."/admin/registerClass/success");
        }else{
            header("Location: ".baseUri()."/admin/registerClass/success");
        }
    }
	
	 public static function removePakRegistered($id){
        $id = $id[0];
        $res = AdminModel::removePakRegistered($id);
        if($res){
            header("Location: ".baseUri()."/admin/registerPak/success");
        }else{
            header("Location: ".baseUri()."/admin/registerPak/success");
        }
    }


    public function registerPak($id){
		if($id[0] == 'success') {
			$data['is_success'] = 'yes';
		}
		else {
			$data['is_success'] = 'no';
		}
        if(empty($id)){
            exit;
        }
        $res = AdminModel::fetchPakPay($id[0]);
        $data['title'] = 'پیک نانو';
        $data['pakRegister'] = $res;
        View::renderPanel("admin/registerPak" , $data);
    }

    public function events($id){
        if(isset($id[0]) && $id[0] == 'success') {
            $data['is_success'] = 'yes';
        }
        else {
            $data['is_success'] = 'no';
        }
        if(empty($id) || $id[0] == '' || $id[0] == 'success'){
            $id[0] = 1;
        }

        $count = 5;
        $startIndex = ($id[0] - 1 ) * $count;

        $eventCount = AdminModel::pageCountEvents();
        $result = AdminModel::fetchAllEvents($startIndex , $count);
        $data['title'] = 'رویدادهای پیش رو';
        $data['pageCount'] = ceil($eventCount[0]['total'] / $count);
        $data['news'] = $result;
        $data['pageIndex'] = $id[0];
        $data['events'] = $result;
        View::renderPanel("admin/event" , $data);
    }

    public function newEvent(){
        $data['title'] = "افزودن رویداد جدید";
        View::renderPanel("admin/new-event" ,$data);
    }

    public function addNewEvent(){
        $title = $_POST['txt_title'];
        $res = AdminModel::addEvent($title);
        if($res){
            header("Location: ".baseUri()."/admin/events/success");
        }else{
            header("Location: ".baseUri()."/admin/events/success");
        }
    }

    public function removeEvent($id){
        $id = $id[0];
        $res = AdminModel::removeEvent($id);
        if($res){
            header("Location: ".baseUri()."/admin/events/success");
        }else{
            header("Location: ".baseUri()."/admin/events/success");
        }
    }






} // end of class
?>