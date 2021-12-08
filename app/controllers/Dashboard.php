<?php
    class Dashboard extends Controller {
        public function index(){
            if(!isset($_COOKIE["UID"])){
                header('Location: '. BASEURL. '/login');
                exit;
            }else{
                if(!$this->model('Dashboard_model')->Authenticate($_COOKIE["UID"])){
                    header('Location: '. BASEURL. '/login');
                    exit;
                }
            }
            $username = openssl_decrypt($_COOKIE["UID"], "aes-256-cbc", "capuccino");
            $data["title"] = "Dashboard";
            $data["dashboard"] = $this->model("Dashboard_model")->DisplayData($username);
            $data["name"] = $username;
            $this->view('templates/header', $data);
            $this->view('Dashboard/index', $data);
            $this->view('templates/footer');
        }

        public function add(){
            if($this->model("Dashboard_model")->AddData($_POST) > 0){
                header('Location: '. BASEURL. '/dashboard');
                exit;
            }
        }

        public function update(){
            if($this->model("Dashboard_model")->UpdateData($_POST) > 0){
                header('Location: '. BASEURL. '/dashboard');
                exit;
            }
        }

        public function delete($id){
            if($this->model("Dashboard_model")->DeleteData($id) > 0){
                echo "<script>alert('Deleted data $id')</script>";
                header('Location: '. BASEURL. '/dashboard');
                exit;
            }
        }

        public function cardSelection($id){
            $value = json_encode($this->model('Dashboard_model')->cardSelection($id));
            echo $value;
        }

        public function logout(){
            setcookie("UID", "", time() - 3600, "/");
            header('Location: '. BASEURL. '/login');
            exit;
        }
    }