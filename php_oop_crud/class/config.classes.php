<?php
class Config{
    protected $servername = 'localhost';
    protected $dbname = 'php_oop_crud';
    protected $username = 'root';
    protected $password = '';
    public $dbCon = null;

    public function conn(){
        try {
            $this->dbCon = new PDO("mysql:host={$this->servername};dbname=" . $this->dbname, $this->username, $this->password);
            
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->dbCon;
    }
}