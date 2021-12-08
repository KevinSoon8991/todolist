<?php
   /*if(!isset($_SESSION)){
        session_start();
    }*/
    class Register extends Controller {
        public function index(){
            $data["title"] = "Register";
            $data["username"] = $data["email"] = $data["password"] = $data["confirmpassword"] = "";
            $this->view('templates/header', $data);
            $this->view('Register/index', $data);
            $this->view('templates/footer');
        }
        
        public function process(){
            $empty = false;
            $_SESSION = ["username_err" => "", "email_err" => "", "password_err" => "", "confirmpassword_err" => "", "username" => $_POST["username"], "email" => $_POST["email"], "password" => $_POST["password"], "confirmpassword" => $_POST["confirmpassword"], "err_msg" => ""];
            foreach($_POST as $key => $value){
                if($value == "" && $key != "btnregister"){
                    $_SESSION[$key. "_err"] = "* Field ini tidak boleh kosong";
                    $empty = true;
                }
            }
            if($empty){
                header("Location: ". BASEURL . "/register/index");
                exit;
            }
            
            if($_POST["password"] != $_POST["confirmpassword"]){
                $_SESSION["err_msg"] = "Password and Confirm Password didn't match";
                header("Location: ". BASEURL . "/register/index");
                exit;
            }

            if(!$this->model("Register_model")->Check_User($_POST["username"])){
                $_SESSION["err_msg"] = "This username already exists at database";
                header("Location: ". BASEURL . "/register/index");
                exit;
            }

            if($this->model('Register_model')->process_register($_POST) > 0){
                $_SESSION["register"] = "1";
                header("Location: ". BASEURL . "/login");
                exit;
            }
        }
    }