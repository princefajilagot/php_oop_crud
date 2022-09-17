<?php
class EmployeeValidator{

    private $data;
    private $error = [];
    private $success = [];
   
    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function validateErrorForm()
    {
        $this->validateFirstname();
        $this->validateLastname();
        $this->validateAddress();
        $this->validateBirthday();
        $this->validateDepartment();
        $this->validatePosition();
        $this->validateStatus();
        $this->validateSalary();
        return $this->error;
    }

    public function validatedForm()
    {
        $this->validateFirstname();
        $this->validateLastname();
        $this->validateAddress();
        $this->validateBirthday();
        $this->validateDepartment();
        $this->validatePosition();
        $this->validateStatus();
        $this->validateSalary();

        return $this->success;
    }

    private function validateFirstname(){
        $val = trim($this->data['firstname']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('firstname', 'This field is required.');
            $this->validated('fNameInput', 'is-invalid');
            $this->validated('fNameText', 'text-danger');
        }else{
            $this->validated('firstname', 'Looks good!');
            $this->validated('fNameInput', 'is-valid');
            $this->validated('fNameText', 'text-success');
        }
    }

    private function validateLastname(){
        $val = trim($this->data['lastname']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('lastname', 'This field is required.');
            $this->validated('lNameInput', 'is-invalid');
            $this->validated('lNameText', 'text-danger');
        }else{
            $this->validated('lastname', 'Looks good!');
            $this->validated('lNameInput', 'is-valid');
            $this->validated('lNameText', 'text-success');
        }
    }

    private function validateAddress(){
        $val = trim($this->data['address']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('address', 'This field is required.');
            $this->validated('aInput', 'is-invalid');
            $this->validated('addressText', 'text-danger');
        }else{
            $this->validated('address', 'Looks good!');
            $this->validated('aInput', 'is-valid');
            $this->validated('addressText', 'text-success');
        }
    }

    private function validateBirthday(){
        $val = trim($this->data['birthday']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('birthday', 'This field is required.');
            $this->validated('bInput', 'is-invalid');
            $this->validated('bText', 'text-danger');
        }else{

            $frmt = 'Y-m-d';
            $d = DateTime::createFromFormat($frmt, $val);
            if($d && $d->format($frmt) === $val)
            {
                $this->validated('birthday', 'Looks good!');
                $this->validated('bInput', 'is-valid');
                $this->validated('bText', 'text-success');
               
            }else{
                $this->addError('error');
                $this->validated('birthday', 'Please use this date format (YYYY-MM-DD');
                $this->validated('bInput', 'is-invalid');
                $this->validated('bText', 'text-danger');
            }
        }
    }

    private function validateDepartment(){
        $val = trim($this->data['department']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('department', 'This field is required.');
            $this->validated('deptInput', 'is-invalid');
            $this->validated('deptText', 'text-danger');
        }else{
            $this->validated('department', 'Looks good!');
            $this->validated('deptInput', 'is-valid');
            $this->validated('deptText', 'text-success');
        }
    }

    private function validatePosition(){
        $val = trim($this->data['position']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('position', 'This field is required.');
            $this->validated('posInput', 'is-invalid');
            $this->validated('posText', 'text-danger');
        }else{
            $this->validated('position', 'Looks good!');
            $this->validated('posInput', 'is-valid');
            $this->validated('posText', 'text-success');
        }
    }

    private function validateStatus(){
        $val = trim($this->data['status']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('status', 'This field is required.');
            $this->validated('statInput', 'is-invalid');
            $this->validated('statText', 'text-danger');
        }else{
            $this->validated('status', 'Looks good!');
            $this->validated('statInput', 'is-valid');
            $this->validated('statText', 'text-success');
        }
    }

    private function validateSalary(){
        $val = trim($this->data['salary']);

        if(empty($val))
        {
            $this->addError('error');
            $this->validated('salary', 'This field is required.');
            $this->validated('salaryInput', 'is-invalid');
            $this->validated('salaryText', 'text-danger');
        }else{
            if(!filter_var($val, FILTER_VALIDATE_INT) && !filter_var($val, FILTER_VALIDATE_FLOAT)){
                $this->addError('error');
                $this->validated('salary', 'Salary field must be a number or with decimal number');
                $this->validated('salaryInput', 'is-invalid');
                $this->validated('salaryText', 'text-danger');
            }else{
                $this->validated('salary', 'Looks good!');
                $this->validated('salaryInput', 'is-valid');
                $this->validated('salaryText', 'text-success');
            }
        }
    }

    private function addError($error)
    {
        $this->error[] = $error;
    }

    private function validated($key, $val){
        $this->success[$key] = $val;
    }
}