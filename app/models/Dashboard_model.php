<?php
    class Dashboard_model extends Auth{
        
        private $query;
        public function __construct(){
            parent::__construct();
        }
        public function DisplayData($data){
            //$this->db = new Database;
            $this->db->query('select * from todolist where user_id = :user_id');
            $this->db->bind('user_id', htmlspecialchars($data));
            return $this->db->resultSet();
        }

        public function AddData($data){
            //$this->db = new Database;
            $this->query = "insert into todolist (user_id, title, description, date_created, last_modified, due_date) values 
            (:user_id, :title, :description, :date_created, :last_modified, :due_date)";
            $this->db->query($this->query);
            $this->db->bind("user_id", htmlspecialchars($data["name"]));
            $this->db->bind("title", htmlspecialchars($data["title"]));
            $this->db->bind("description", htmlspecialchars($data["description"]));
            $this->db->bind("date_created", date('Y-m-d H:i:s'));
            $this->db->bind("last_modified", date('Y-m-d H:i:s'));
            $duedate = date('Y-m-d H:i:s', strtotime($data["duedate"]));
            $this->db->bind("due_date", $duedate);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function UpdateData($data){
            //$this->db = new Database;
            $this->query = "update todolist set user_id = :user_id, title = :title, description = :description, last_modified = :last_modified, due_date = :due_date where id = :id";
            $this->db->query($this->query);
            $this->db->bind("user_id", htmlspecialchars($data["name"]));
            $this->db->bind("title", htmlspecialchars($data["title"]));
            $this->db->bind("description", htmlspecialchars($data["description"]));
            $this->db->bind("last_modified", date('Y-m-d H:i:s'));
            $duedate = date('Y-m-d H:i:s', strtotime($data["duedate"]));
            $this->db->bind("due_date", $duedate);
            $this->db->bind('id', htmlspecialchars($data['id']));
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function DeleteData($id){
            //$this->db = new Database;
            $this->query = "delete from todolist where id = :id";
            $this->db->query($this->query);
            $this->db->bind('id', htmlspecialchars($id));
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function CardSelection($id){
            //$this->db = new Database;
            $this->db->query("select id, user_id, title, description, date_format(due_date, '%Y-%m-%d') as due_date 
            from todolist where id = :id");
            $this->db->bind('id', $id);
            return $this->db->single();
        }

    }