<?php
class Signup extends Config
{
    private $data = null;
    private $user = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function register(){
        $conn   = $this->conn();
        $name   = $conn->quote($this->data['fullname']);
        $uName  = $conn->quote($this->data['username']);
        $email  = $conn->quote($this->data['email']);
        $pwd    = $conn->quote(password_hash($this->data['password'], PASSWORD_DEFAULT));
        $sql    = "INSERT INTO `user`(`fullname`, `username`, `email`, `password`, `created_at`)
                VALUES
                ($name,$uName,$email,$pwd,NOW())";
        $data = $conn->prepare($sql);
        if($data->execute())
        {
            $last_id = $conn->lastInsertId();
           
            return $this->user = [
                'fullname'  => $this->data['fullname'],
                'user_id'   => $last_id
            ];
        }
    }
}
?>
