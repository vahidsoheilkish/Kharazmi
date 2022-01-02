<?php
    class AdminModel{

        public function __construct(){
            if(!isset($_SESSION['admin'])){
                header("Location: ".baseUri()."/admin/login");
            }
        }

        public static function confirm($username , $password){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_admin WHERE username=:username AND password=:password" , array(
                'username' => $username,
                'password' => $password,
            ));
            return $res;
        }

        public static function addnew($title , $body){
            $db = Db::getConnect();
            $res = $db->insert("INSERT INTO tbl_news (new_title , new_body) VALUES (:new_title , :new_body)", array(
                'new_title' => $title,
                'new_body' => $body
            ));
			return $res;
        }

        public static function pageCountNews(){
            $db = Db::getConnect();
            $records = $db->query("SELECT COUNT(*) AS total FROM tbl_news");
            return $records;
        }

        public static function pageCountEvents(){
            $db = Db::getConnect();
            $records = $db->query("SELECT COUNT(*) AS total FROM tbl_event");
            return $records;
        }



        public static function pageCountUser(){
            $db = Db::getConnect();
            $records = $db->query("SELECT COUNT(*) AS total FROM tbl_user");
            return $records;
        }

        public static function news($startIndex , $count){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_news ORDER BY new_id DESC LIMIT $startIndex , $count");
            return $res;
        }

        public static function fetchAllEvents($startIndex , $count){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_event ORDER BY id DESC LIMIT $startIndex , $count" , array(
            ));
            return $res;
        }

        public static function removeNews($id){
            $db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_news WHERE new_id = :new_id" , array(
                'new_id' => $id,
            ));
            return $res;
        }

        public static function selectOneNew($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_news WHERE new_id = :new_id" , array(
                'new_id' => $id
            ));
            return $res;
        }

        public static function updateNew($id , $title , $body){
            $db = Db::getConnect();
            $res = $db->modify("UPDATE tbl_news set new_title=:new_title , new_body=:new_body WHERE new_id=:new_id" , array(
                'new_id' => $id,
                'new_title' => $title,
                'new_body' => $body,
            ));
            return $res;
        }

        public static function fetchAllMatches(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_match");
            return $res;
        }

        public static function removeMatch($id){
            $db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_match WHERE match_id = :match_id" , array(
                'match_id' => $id,
            ));
            return $res;
        }

        public static function selectOneMatch($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_match WHERE match_id = :match_id" , array(
                'match_id' => $id
            ));
            return $res;
        }

        public static function updateMatch($id , $title , $description , $part , $price , $active){
            $db = Db::getConnect();
            $res = $db->modify("UPDATE tbl_match SET match_title=:match_title , match_description=:match_description , match_part=:match_part , match_price=:match_price , match_active=:match_active WHERE match_id=:match_id " , array(
                'match_id' => $id,
                'match_title' => $title,
                'match_description' => $description,
                'match_part' => $part,
                'match_price' => $price,
                'match_active' => $active,
            ));
            return $res;
        }

        public static function addMatch($title , $description , $part , $price , $active){
            $db = Db::getConnect();
            $res = $db->insert("INSERT INTO tbl_match (match_title , match_description, match_part , match_price, match_active) VALUES (:match_title , :match_description, :match_part , :match_price, :match_active)" , array(
                'match_title' => $title,
                'match_description' => $description,
                'match_part' => $part,
                'match_price' => $price,
                'match_active' => $active,
            ));
            return $res;
        }

        public static function fetchAllUsers(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_user ORDER BY userId DESC");
            return $res;
        }

        public static function users($startIndex , $count){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_user ORDER BY userId DESC LIMIT $startIndex , $count");
            return $res;
        }
		
		public static function insertNewUser($meliCode , $name , $family, $fatherName, $schoolName, $course, $paye, $gender, $is50 , $isFree){
			$db = Db::getConnect();
            $res = $db->insert("INSERT INTO tbl_user (meliCode, name, family, fatherName, schoolName, course, paye, gender, is50percent, isFree) VALUES (:meliCode, :name, :family, :fatherName, :schoolName, :course, :paye, :gender, :is50percent, :isFree)" , array(
				'meliCode'   	=>   $meliCode,
				'name'			=>	 $name	,
				'family'		=>	$family,
				'fatherName'	=>	$fatherName,
				'schoolName'	=>	$schoolName,
				'course'		=>	$course,
				'paye'			=>	$paye,
				'gender'		=>	$gender,
				'is50percent' 	=>	$is50,
				'isFree'		=>	$isFree,
			));
            return $res;
		}
		
		public static function fetchOneUser($id){
			$db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_user WHERE userId = :userId" , array(
				'userId' => $id,
			));
            return $res;
		}

		public static function updateSetUser($id , $meliCode , $name, $family, $fatherName, $schoolName, $course , $paye , $gender , $is50, $isFree){
            $db = Db::getConnect();
            $res = $db->modify("UPDATE tbl_user SET meliCode = :meliCode , name = :name, family = :family , fatherName = :fatherName , schoolName = :schoolName , course = :course , paye = :paye , gender = :gender , is50percent = :is50percent , isFree = :isFree WHERE userId = :userId" , array(
                'userId' => $id,
                'meliCode' => $meliCode,
                'name' => $name,
                'family' => $family,
                'fatherName' => $fatherName,
                'schoolName' => $schoolName,
                'course' => $course,
                'paye' => $paye,
                'gender' => $gender,
                'is50percent' => $is50,
                'isFree' => $isFree,
            ));
            return $res;
        }

        public static function removeUser($id){
            $db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_user WHERE userId = :userId" , array(
                'userId' => $id,
            ));
            return $res;
        }

        public static function fetchAllClass(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_class ORDER BY id DESC" , array(
            ));
            return $res;
        }

        public static function fetchOneClass($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_class WHERE id = :id" , array(
                'id' => $id
            ));
            return $res;
        }

        public static function updateSetClass($id , $title , $description, $price){
            $db = Db::getConnect();
            $res = $db->modify("UPDATE tbl_class SET title = :title , description = :description , price = :price WHERE id = :id" , array(
                'id' => $id ,
                'title' => $title ,
                'description' => $description ,
                'price' => $price ,
            ));
            return $res;
        }

        public static function addNewClass($title , $description, $price){
            $db = Db::getConnect();
            $res = $db->insert("INSERT INTO tbl_class (title , description , price) VALUES (:title , :description , :price)" , array(
                'title' => $title ,
                'description' => $description ,
                'price' => $price ,
            ));
            return $res;
        }

        public static function removeClass($id){
            $db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_class WHERE id = :id" , array(
                'id' => $id,
            ));
            return $res;
        }

        public static function fetchMatchPay($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_match_pay INNER JOIN tbl_user ON tbl_match_pay.user_id = tbl_user.userId WHERE match_id = :match_id AND pay = :pay" , array(
                'match_id' => $id,
                'pay' => 'success'
            ));
            return $res;
        }

        public static function fetchPakPay($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_pak_pay INNER JOIN tbl_user ON tbl_pak_pay.user_id = tbl_user.userId WHERE pak_id = :pak_id AND pay = :pay" , array(
                'pak_id' => $id,
                'pay' => 'success'
            ));
            return $res;
        }

        public static function removeUserRegistered($id){
            $db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_match_pay WHERE id = :id" , array(
                'id' => $id,
            ));
            return $res;
        }

        public static function fetchClassPay($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_class_pay INNER JOIN tbl_user ON tbl_class_pay.user_id = tbl_user.userId WHERE class_id = :class_id AND pay = :pay" , array(
                'class_id' => $id,
                'pay' => 'success'
            ));
            return $res;
        }

        public static function removeClassRegistered($id){
            $db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_class_pay WHERE id = :id" , array(
                'id' => $id,
            ));
            return $res;
        }
		
		public static function removePakRegistered($id){
			$db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_pak_pay WHERE id = :id" , array(
                'id' => $id,
            ));
            return $res;
		}

        public static function fetchAllPak(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_pak ORDER BY id DESC" , array(
            ));
            return $res;
        }

        public static function addEvent($title){
            $db = Db::getConnect();
            $res = $db->insert("INSERT INTO tbl_event (name) VALUES (:name)" , array(
                'name' => $title
            ));
            return $res;
        }

        public static function removeEvent($id){
            $db = Db::getConnect();
            $res = $db->modify("DELETE FROM tbl_event WHERE id = :id" , array(
                'id' => $id,
            ));
            return $res;
        }






    } // end of class