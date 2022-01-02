<?php
    class MatchController{
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
            $matchId = $id[0];
            $this->data['title'] = 'اطلاعات مسابقات';
            $this->data['match'] = UserModel::fetch_one_match($matchId);
            $this->data['matches_menu'] = UserModel::fetch_all_matches();
            View::render('match/info' , $this->data);
        }
    }

?>