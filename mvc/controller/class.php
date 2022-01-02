<?php
    class ClassController{
        private $data = array();
        public function __construct()
        {
            $this->data['matches_menu'] = UserModel::fetch_all_matches();
            $this->data['last_news'] = UserModel::fetch_last_news();
            $this->data['classes'] = UserModel::fetch_all_classes();
            $this->data['events'] = UserModel::fetch_all_events();
            $this->data['paks'] = UserModel::fetch_all_paks();
        }
        public function info($id){
            $classId = $id[0];
            $this->data['title'] = 'کلاس آموزشی';
            $this->data['class'] = UserModel::fetch_one_class($classId);
            View::render('class/info' , $this->data);
        }
    }

?>