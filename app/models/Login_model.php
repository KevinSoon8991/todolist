<?php

    class Login_model extends Auth{
        //private $db;
        //private $result;
        public function __construct(){
            parent::__construct();
        }

        public function Validate_User($data){
            //$this->db = new Database;
            $this->db->query('select * from user where username = :username');
            $this->db->bind('username', $data["username"]);
            $result = $this->db->single();
            print_r($result);
            if($this->db->rowCount() === 0){
                $_SESSION["err_msg"] = "Username doesn't exist at database";
                return false;
            }
            if(!password_verify(htmlspecialchars($data["password"]),$result["password"])){
                $_SESSION["err_msg"] = "Incorrect Password";
                return false;
            }
            return true;
        }
    }