
<?
	class UserModel{
		public static function login($user , $pass){
			$db = Db::getConnect();
			$result = $db->query("SELECT * FROM tbl_user WHERE meliCode = :meliCode AND password = :password " , array(
			    'meliCode' => $user,
			    'password' => $pass,
            ));
			return $result;
		}
		public static function register($meliCode , $password , $name , $family  , $fatherName , $schoolName , $course , $paye , $gender){
			$db = Db::getConnect();
			$res = $db->insert("INSERT INTO tbl_user (meliCode , password , name , family , fatherName , schoolName , course , paye , gender) VALUES (:meliCode , :password , :name , :family , :fatherName , :schoolName , :course , :paye , :gender)" , array(
			    'meliCode'       => $meliCode,
                'password'  => $password,
                'name' => $name,
                'family'  => $family,
                'fatherName ' => $fatherName,
                'schoolName'  => $schoolName,
                'course' => $course,
                'paye'  => $paye,
                'gender' => $gender,
            ));
			return $res;
		}
		
        public static function fetch_all_matches(){
		    $db = Db::getConnect();
		    $res = $db->query("SELECT * FROM tbl_match WHERE match_active = 1");
		    return $res;
        }

        public static function fetch_all_news(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_news");
            return $res;
        }

        public static function fetch_one_match($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_match WHERE match_id = :match_id" , array(
                'match_id' => $id
            ));
            return $res;
        }

        public static function fetch_last_news(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_news ORDER BY new_id DESC LIMIT 4" , array(
            ));
            return $res;
        }

        public static function fetch_all_classes(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_class ORDER BY id" , array(
            ));
            return $res;
        }

        public static function fetch_one_class($classId){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_class WHERE id = :id" , array(
                'id' => $classId,
            ));
            return $res;
        }

        public static function saveMatchPay($userId , $matchId , $matchName){
            $db = Db::getConnect();
            $time = currentTime();
            $res = $db->insert("INSERT INTO tbl_match_pay (user_id , match_id , match_name , pay , time) VALUES(:user_id , :match_id , :match_name , :pay , :time)", array(
                'user_id' => $userId ,
                'match_id' => $matchId ,
                'match_name' => $matchName ,
                'pay' => 'fail' ,
                'time' => $time ,
            ));
            return $db->last_insert_id();
        }

        public static function saveClassPay($userId , $classId , $className ){
            $db = Db::getConnect();
            $time = currentTime();
            $res = $db->insert("INSERT INTO tbl_class_pay (user_id , class_id , class_name , pay , time) VALUES(:user_id , :class_id , :class_name , :pay , :time)", array(
                'user_id' => $userId ,
                'class_id' => $classId ,
                'class_name' => $className ,
                'pay' => 'fail' ,
                'time' => $time ,
            ));
            return $db->last_insert_id();
        }

        public static function fetch_callback_ma($oId){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_match_pay WHERE id = :id" , array(
                'id' => $oId,
            ));
            return $res;
        }

        public static function fetch_callback_cl($oId){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_class_pay WHERE id = :id" , array(
                'id' => $oId,
            ));
            return $res;
        }

        public static function fetch_callback_pk($oId){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_pak_pay WHERE id = :id" , array(
                'id' => $oId,
            ));
            return $res;
        }

        public static function fetch_all_paks(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_pak" , array(
            ));
            return $res;
        }

        public static function fetch_pak_price($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_pak WHERE number = :number" , array(
                'number' => $id ,
            ));
            return $res;
        }

        public static function savePakPay($userId , $pakNumber, $pakName){
            $db = Db::getConnect();
            $time = currentTime();
            $res = $db->insert("INSERT INTO tbl_pak_pay (user_id , pak_id , pak_name , pay , time) VALUES(:user_id , :pak_id , :pak_name , :pay , :time)", array(
                'user_id' => $userId ,
                'pak_id' => $pakNumber ,
                'pak_name' => $pakName ,
                'pay' => 'fail' ,
                'time' => $time ,
            ));
            return $db->last_insert_id();
        }
		
		public static function fetch_a_new($id){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_news WHERE new_id = :new_id" , array(
                'new_id' => $id ,
            ));
            return $res;
        }
		
		public static function setSuccessClassPay($oId, $refcode){
			 $db = Db::getConnect();
            $res = $db->modify("UPDATE tbl_class_pay SET pay = :pay, refcode = :refcode WHERE id = :id" , array(
                'pay' => 'success' ,
				'refcode' => $refcode ,
                'id' => $oId ,
            ));
            return $res;
		}
		
		public static function setSuccessMatchPay($oId , $refcode){
			 $db = Db::getConnect();
            $res = $db->modify("UPDATE tbl_match_pay SET pay = :pay, refcode = :refcode WHERE id = :id" , array(
                'pay' => 'success' ,
                'refcode' => $refcode ,
                'id' => $oId ,
            ));
            return $res;
		}
		
		public static function setSuccessPakPay($oId, $refcode){
			 $db = Db::getConnect();
            $res = $db->modify("UPDATE tbl_pak_pay SET pay = :pay, refcode = :refcode WHERE id = :id" , array(
                'pay' => 'success' ,
				'refcode' => $refcode ,
                'id' => $oId ,
            ));
            return $res;
		}

		public static function fetch_search($phrase){
            $db = Db::getConnect();
            $res = $db->query2("SELECT * FROM tbl_news WHERE new_title LIKE '%$phrase%'");
            return $res;
        }

        public static function fetch_all_events(){
            $db = Db::getConnect();
            $res = $db->query("SELECT * FROM tbl_event ORDER BY id DESC LIMIT 10");
            return $res;
        }


	} // end of class

?>