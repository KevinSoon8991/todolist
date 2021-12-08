<?php

    class Home extends Controller {
        public function index(){
            $data["title"] = "Home Page";
            if(isset($_COOKIE["UID"])){
                if($this->model('Home_model')->Authenticate($_COOKIE["UID"])){
                    header('Location: '. BASEURL . '/dashboard');
                    exit;
                }
            }
            /*$data["dashboard"] = $dashboard;
            $data['title'] = "Home Page";
            $data["appname"] = $this->model("Home_model")->getAppName();*/
            /*$this->view('templates/header', $data);
            $this->view('Home/index');
            $this->view('templates/footer');*/
            $this->view('templates/header', $data);
            $this->view('Home/index');
            $this->view('templates/footer');
        }
    }