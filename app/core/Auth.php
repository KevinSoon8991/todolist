<?php
    class Auth {
        protected $db;
        private $dec_username;
        public function __construct(){
            $this->db = new Database;
        }
        public function Authenticate($uid){
            if(isset($_COOKIE["UID"])){
                $this->db->query('select * from user where username = :username');
                $this->dec_username = openssl_decrypt($uid, "aes-256-cbc", "capuccino");
                $this->db->bind('username', htmlspecialchars($this->dec_username));
                $this->db->execute();
                if($this->db->rowCount()>0){
                    return true;
                }
                return false;
            }
            return false;
        }
    }