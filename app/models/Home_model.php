<?php
    class Home_model extends Auth{
        private $app_name = 'Peminjaman Notebook';
        public function getAppName(){
            return $this->app_name;
        }
    }