<?php
    class Register_model {
        //private $db;
        private $query;
        public function __construct(){
            $this->db = new Database;
        }
        public function Process_Register($data){
            $this->db->query('insert into user (username, email, password) values 
            (:username, :email, :password)');
            $this->db->bind(':username', htmlspecialchars($data["username"]));
            $this->db->bind(':email', $data["email"]);
            $this->db->bind(':password', password_hash($data["password"],PASSWORD_DEFAULT));
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function Check_User($user){
            $this->db->query('select * from user where username = :username');
            $this->db->bind('username', htmlspecialchars($user));
            if($this->db->single() > 0){
                
                return false;
            }
            return true;
        }
    }