<?php
    class HomeController{
        private $data = array();
        public function __construct()
        {
            $this->data['matches_menu'] = UserModel::fetch_all_matches();
            $this->data['last_news'] = UserModel::fetch_last_news();
            $this->data['classes'] = UserModel::fetch_all_classes();
            $this->data['paks'] = UserModel::fetch_all_paks();
            $this->data['events'] = UserModel::fetch_all_events();
            $this->data['title'] = "خانه";
        }

        public function home(){
            View::render("home/index" , $this->data);
        }

        public function callus(){
            $this->data['title'] = "تماس با ما";
            View::render("home/about" , $this->data);
        }

        public function news($pageIndex){
            $data['title'] = "اخبار";
            if(empty($pageIndex) || $pageIndex[0] == ''){
                $pageIndex[0] = 1;
            }
            $count = 3;
            $startIndex = ($pageIndex[0] -1 ) * $count;
            $newsCount = AdminModel::pageCountNews();
            $result = AdminModel::news($startIndex , $count);
            $this->data['pageCount'] = ceil($newsCount[0]['total'] / $count);
            $this->data['news'] = $result;
            $this->data['pageIndex'] = $pageIndex[0];
            $this->data['matches_menu'] = UserModel::fetch_all_matches();
            View::render("home/news" ,  $this->data);
        }

    } // end of class

?>