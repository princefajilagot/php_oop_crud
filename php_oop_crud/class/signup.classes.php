<?php
class Signup extends Config
{
    private $name;
    private $uName;
    private $email;
    private $pwd;
    private $user = [];

    public function __construct($name,$uName,$email,$pwd)
    {
        $this->name = $name;
        $this->uName = $uName;
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function register(){
        $conn = $this->conn();
        $name = $conn->quote($this->name);
        $uName = $conn->quote($this->uName);
        $email = $conn->quote($this->email);
        $pwd = $conn->quote($this->pwd);
        $sql = "INSERT INTO `user`(`fullname`, `username`, `email`, `password`, `created_at`)
                VALUES
                ($name,$uName,$email,$pwd,NOW())";
        $data = $conn->prepare($sql);
        if($data->execute())
        {
            $last_id = $conn->lastInsertId();
           
            return $this->user = [
                'fullname'  => $this->name,
                'user_id'   => $last_id
            ];
        }
    }
}