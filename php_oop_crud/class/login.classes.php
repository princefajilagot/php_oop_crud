<?php
class Login extends Config
{
    private $u_id;
    private $pwd;
    private $user = [];
    private $error;

    public function __construct($u_id,$pwd)
    {
        $this->u_id = $u_id;
        $this->pwd = $pwd;
    }

    public function logIn(){
        $conn = $this->conn();
        $u_id = $conn->quote($this->u_id);
        $sql = "SELECT * FROM `user` WHERE `email` = $u_id OR `username` = $u_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() == 1)
        {
            if($result = $stmt->fetch())
            {
                if(password_verify($this->pwd,$result['password']))
                {
                    return $this->user = [
                        'fullname'  => $result['fullname'],
                        'user_id'   => $result['id'],
                        'isUser'    => true
                    ];
                }else{
                    return $this->user = ['isUser' => false];
                }
            }
        }else{
            return $this->user = ['isUser' => false];
        }
    }
}