<?php

    class Todolist extends Controller {
        public function index($dashboard = "Dashboard"){
            $data["dashboard"] = $dashboard;
            $data["appname"] = $this->model("Home_model")->getAppName();
            $this->view('templates/header');
            $this->view('Todolist/index');
            $this->view('templates/footer');
        }
    }