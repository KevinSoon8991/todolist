<?php
    //if(!isset($_SESSION)) session_start();
    class Login extends Controller {
        public function index(){
            $data["title"] = "Login";
            if(isset($_COOKIE["UID"])){
                if($this->model('Home_model')->Authenticate($_COOKIE["UID"])){
                    header('Location: '. BASEURL . '/dashboard');
                    exit;
                }
            }
            $this->view('templates/header', $data);
            $this->view('Login/index', $data);
            $this->view('templates/footer');
        }

        public function validateuser(){
            $empty = false;
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["password"] = $_POST["password"];
            //print_r($_POST);
            foreach($_POST as $key => $value){
                if($value === "" && $key !== "btnlogin"){
                    $_SESSION[$key. "_err"] = "This field can't be empty";
                    $empty = true;
                }
            }
            if($empty){
                header('Location: '. BASEURL .'/login/index');
                exit;
            }
            if(!$this->model('Login_model')->Validate_User($_POST)){
                
                header('Location: '. BASEURL .'/login/index');
                exit;
            }
            else{
                $enc_username = openssl_encrypt($_POST["username"], "aes-256-cbc", "capuccino");
                if(isset($_POST["checked"])){
                    setcookie("UID", $enc_username, [
                        'path' => '/',
                        'expires' => time() + 365*24*3600,
                        'httponly' => true,
                        'samesite' => 'Strict']);

                }else{
                    setcookie("UID", $enc_username, [
                        'path' => '/',
                        'httponly' => true,
                        'samesite' => 'Strict']);
                }
                header('Location: '. BASEURL .'/dashboard/index');
                exit;
            }
        }
    }