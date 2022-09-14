<?php
function alert_message()
{
    if(isset($_SESSION['message'])){
        echo $_SESSION['message']; 
        unset($_SESSION['message']);
    }
    return delete();
}

function signUp()
{
    if(isset($_POST['signup']))
    {
        $validate = new SignupValidator($_POST);
        $validated = $validate->validatedForm();
        $errors = $validate->validateErrorForm();

        if(count($errors) > 0)
        {
            return $validated;
        }else{
            $name = $_POST['fullname'];
            $uName = $_POST['username'];
            $email = $_POST['email'];
            $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $user = new Signup($name,$uName,$email,$pwd);
            $user = $user->register();
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['user_id'] = $user['user_id'];
            header('Location:/php_oop_crud');
        }
    }
}

function logIn()
{
    if(isset($_POST['login']))
    {
        $u_id = $_POST['u_id'];
        $pwd = $_POST['password'];
        $user = new Login($u_id,$pwd);
        $user = $user->logIn();
        
        if($user['isUser'] == false)
        {
            return $error = [
                'errorText' => 'Sorry, credential was incorrect',
                'is-invalid' => 'is-invalid',
                'text-danger' => 'text-danger'
            ];
        }else{
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['user_id'] = $user['user_id'];
            header('Location:/php_oop_crud');
        }
    }
}

function insert()
{
    if(isset($_POST['submit']))
    {
        $validate = new EmployeeValidator($_POST);
        $validated = $validate->validatedForm();
        $errors = $validate->validateErrorForm();
       
        if(count($errors) > 0)
        {
            return $validated;
        }else{
            $employee = new Employee();
            $totalEmp = $employee->generateEmpNo() + 1;
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $birthday = $_POST['birthday'];
            $department = $_POST['department'];
            $position = $_POST['position'];
            $status = $_POST['status'];
            $salary = $_POST['salary'];
            $employee_no = 'E-NO' . $totalEmp;


            $employee->setRecords($firstname,$lastname,$employee_no,$address,$birthday,$department,$position,$status,$salary);
            if($employee->insert())
            {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Holy guacamole!</strong> You have successfully added new employee!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                header('Location:/php_oop_crud');
            }
        }
    }
}

function delete()
{
    if(isset($_POST['delete_employee']))
    {
        $id = $_POST['empId'];

        $employee = new Employee();
        $employee->setID($id);

        if($employee->delete()){
           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Holy guacamole!</strong> You have successfully deleted an employee' . "'" . 's record!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
}

function getId()
{
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $employee = new Employee();
        $employee->setId($id);

        $employees = $employee->edit();
        return $employees;
    }
}

function update()
{
    if(isset($_POST['update']))
    {
        $validate = new EmployeeValidator($_POST);
        $validated = $validate->validatedForm();
        $errors = $validate->validateErrorForm();
        if(count($errors) > 0)
        {
            return $errors;
        }else{
            $id = $_POST['id'];
            $emp_no = $_POST['emp_no'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $birthday = $_POST['birthday'];
            $department = $_POST['department'];
            $position = $_POST['position'];
            $status = $_POST['status'];
            $salary = $_POST['salary'];
            
            $employee = new Employee();
            $employee->setRecords($firstname,$lastname,$emp_no,$address,$birthday,$department,$position,$status,$salary);
            $employee->setId($id);
            if($employee->update())
            {
                $_SESSION['message'] = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Holy guacamole!</strong> You have successfully updated employee records!
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>';
                header('Location:/php_oop_crud');
            }
        }
    }
}

function fetch_data()
{
    $employee = new Employee();
    $employees = $employee->read();
    foreach ($employees as $key => $employee)
    {
        echo 
        '<tr>
            <td>'. $key+1 . '</td>
            <td>' . $employee['lastname'] . ', ' . $employee['firstname'] . '</td>
            <td>' . $employee['emp_no'] . '</td>
            <td>' . $employee['department'] . '</td>
            <td>
                <a class="btn btn-primary btn-sm me-2" href="view-employee.php?id=' . $employee['id'] .'">View</a>
                <a class="btn btn-secondary btn-sm me-2" href="edit-employee.php?id=' . $employee['id'] .'">Edit</a>
                <button type="button" class="btn btn-danger btn-sm " value="' . $employee['id'] .'" data-bs-toggle="modal" data-bs-target="#empDelModal" onclick="setEmpId(this)">
                    Delete
                </button>
            </td>
        </tr>';
    }
}

function logout()
{
    if(isset($_GET['action']) == 'logout')
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['fullname']);
        session_destroy();
        header('Location:/php_oop_crud');
    }
}

function check_session()
{
    if(!isset($_SESSION['user_id'])){
        header('Location:/php_oop_crud/login.php');
    }
}