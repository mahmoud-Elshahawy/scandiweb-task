<?php

class Database{
    private $connection;
    private $DB_HOST="localhost";
    private $DB_USER="root";
    private $DB_PASS="";
    private $DB_NAME="scandiweb";
    function __construct(){
        $this->open_connection();
    }
    public function get_connection(){
        return $this->connection;
    }
    public function open_connection(){
        $this->connection = new mysqli($this->DB_HOST,$this->DB_USER,$this->DB_PASS,$this->DB_NAME);
        if($this->connection->connect_errno){
            die("Database connection failed". $this->connection->connect_error);
        }
    }

    public function query($sql){
        $result= $this->connection->query($sql);
        return $result;
    }
    private function validation($result){
        if(!$result)
            die("Qurey Failed".$this->connection->error);
    }
    public function escape_strings($string){
        $escaped=$this->connection->real_escape_string($string);
        return $escaped;
    }

}


$database= new Database();
?>