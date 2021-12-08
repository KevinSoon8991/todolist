<?php
    Session::start();
    class Session {
        public static function start(){
            if(!isset($_SESSION)){
                //session_id("ASPNETSessID");
                //ini_set('session.cookie_httponly', 1);
                session_set_cookie_params(["SameSite" => "Strict"]); //none, lax, strict
                //session_set_cookie_params(["Secure" => "true"]); //false, true
                session_set_cookie_params(["HttpOnly" => "true"]); //false, true
                session_start();
            }
        }

        public static function end(){
            if(isset($_SESSION)){
                $_SESSION = [];
                session_unset();
                session_destroy();
            }
        }
    }