<?php
class Login extends Config
{
    private $data;
    private $user = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function logIn(){
        $conn = $this->conn();
        $u_id = $conn->quote($this->data['u_id']);
        $pwd = $conn->quote($this->data['password']);

        $sql = "SELECT * FROM `user` WHERE `email` = $u_id OR `username` = $u_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount() == 1)
        {
            if($result = $stmt->fetch())
            {
                if(password_verify($this->data['password'],$result['password']))
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
?>
