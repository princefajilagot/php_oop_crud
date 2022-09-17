<?php
class SignupValidator extends Config
{
    private $data;
    private $error = [];
    private $validated = [];

    public function __construct($post_data)
    {
        $this->data = $post_data;
    }

    public function validateErrorForm()
    {
        $this->validateFullname();
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();
        $this->validateRepeatPassword();

        return $this->error;
    }

    public function validatedForm()
    {
        $this->validateFullname();
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();
        $this->validateRepeatPassword();

        return $this->validated;
    }

    private function validateFullname()
    {
        $val = trim($this->data['fullname']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('fname', 'This field is required.');
            $this->validated('fNameInput', 'is-invalid');
            $this->validated('fNameText', 'text-danger');
        }else{
            $this->validated('fname', 'Looks good!');
            $this->validated('fNameInput', 'is-valid');
            $this->validated('fNameText', 'text-success');
        }
    }

    private function validateUsername()
    {
        $val = $this->data['username'];

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('username', 'This field is required.');
            $this->validated('uInput', 'is-invalid');
            $this->validated('uText', 'text-danger');
        }else{
            $conn = $this->conn();
            $sql = "SELECT `username` FROM `user` WHERE `username` = '$val'";
            $username = $conn->prepare($sql);
            $username->execute();
            $results = $username->fetch();
            
            if ( !preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $val) )
            {
                $this->addError('error');
                $this->validated('username', 'Invalid username! Please provide valid username.');
                $this->validated('uInput', 'is-invalid');
                $this->validated('uText', 'text-danger');
            }else if($results){
                $this->addError('error');
                $this->validated('username', 'Username has already taken.');
                $this->validated('uInput', 'is-invalid');
                $this->validated('uText', 'text-danger');
            
            }else{
                $this->validated('username', 'Looks good!');
                $this->validated('uInput', 'is-valid');
                $this->validated('uText', 'text-success');
            }
        }
    }

    private function validateEmail()
    {
        $val = $this->data['email'];

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('email', 'This field is required.');
            $this->validated('eInput', 'is-invalid');
            $this->validated('eText', 'text-danger');
        }else{
            $conn = $this->conn();
            $sql = "SELECT `email` FROM `user` WHERE `email` = '$val'";
            $email = $conn->prepare($sql);
            $email->execute();
            $results = $email->fetch();
            if(!filter_var($val, FILTER_VALIDATE_EMAIL))
            {
                $this->addError('error');
                $this->validated('email', 'Invalid email! Please provide valid email.');
                $this->validated('eInput', 'is-invalid');
                $this->validated('eText', 'text-danger');
            }else if($results)
            {
                $this->addError('error');
                $this->validated('email', 'Email has already taken.');
                $this->validated('eInput', 'is-invalid');
                $this->validated('eText', 'text-danger');
            }else{
                $this->validated('email', 'Looks good!');
                $this->validated('eInput', 'is-valid');
                $this->validated('eText', 'text-success');
            }
        }
    }

    private function validatePassword()
    {
        $pwd =$this->data['password'];
        if(empty($pwd))
        {
            $this->addError('error');
            $this->validated('password', 'This field is required.');
            $this->validated('pInput', 'is-invalid');
            $this->validated('pText', 'text-danger');
        }else{
            
            if (strlen($pwd) < 8) {
                $this->addError('error');
                $this->validated('password', 'Password too short!');
                $this->validated('pInput', 'is-invalid');
                $this->validated('pText', 'text-danger');
            }else if (!preg_match("#[0-9]+#", $pwd)) {
                $this->addError('error');
                $this->validated('password', 'Password must include at least one number!');
                $this->validated('pInput', 'is-invalid');
                $this->validated('pText', 'text-danger');
            }else if (!preg_match("#[a-zA-Z]+#", $pwd)) {
                $this->addError('error');
                $this->validated('password', 'Password must include at least one letter!');
                $this->validated('pInput', 'is-invalid');
                $this->validated('pText', 'text-danger');
            }else{
                $this->validated('password', 'Looks good!');
                $this->validated('pInput', 'is-valid');
                $this->validated('pText', 'text-success');
            }
        }
    }

    private function validateRepeatPassword()
    {
        $pwd =$this->data['password'];
        $r_pwd =$this->data['rpassword'];
        if(empty($r_pwd))
        {
            $this->addError('error');
            $this->validated('rpassword', 'This field is required.');
            $this->validated('rpInput', 'is-invalid');
            $this->validated('rpText', 'text-danger');
        }else{
            
            if ($pwd != $r_pwd) {
                $this->addError('error');
                $this->validated('rpassword', 'Password do not match!');
                $this->validated('rpInput', 'is-invalid');
                $this->validated('rpText', 'text-danger');
            }else{
                $this->validated('rpassword', 'Looks good!');
                $this->validated('rpInput', 'is-valid');
                $this->validated('rpText', 'text-success');
            }
        }
    }

    private function addError($error)
    {
        $this->error[] = $error;
    }

    private function validated($key, $value)
    {
        $this->validated[$key] = $value;
    }
}