<?php
class Employee extends Config{
    protected $data = null;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function generateEmpNo(){
        $con    = $this->conn();
        $sql    = "SELECT MAX(emp_no) AS emp_no FROM `employee`";
        $data   = $con->prepare($sql);
        $data->execute();

        $result     = $data->fetchAll();
        $maxEmpNo   = $result[0]['emp_no'];
        return $maxEmpNo;
    }

    public function insert()
    {
        $conn       = $this->conn();
        $firstname  = $conn->quote($this->data['firstname']);
        $lastname   = $conn->quote($this->data['lastname']);
        $address    = $conn->quote($this->data['address']);
        $department = $conn->quote($this->data['department']);
        $position   = $conn->quote($this->data['position']);
        $salary     = $this->data['salary'];
        $status     = $this->data['status'];
        $birthday   = $this->data['birthday'];
        $emp_no     = $this->generateEmpNo() + 1;
        
        $sql = "INSERT INTO `employee`
            (`firstname`, `lastname`, `emp_no`, `address`, `birthday`, `status`, `department`, `position`, `salary`, `created_at`)
            VALUES
            ($firstname,$lastname,'$emp_no',$address,'$birthday','$status',$department,$position,'$salary',NOW())";
        $data = $conn->prepare($sql);
        if($data->execute()){
            return true;
        }
    }

    public function read(){
        $conn = $this->conn();
        $sql = "SELECT * FROM `employee`";
        $data = $conn->prepare($sql);
        if($data->execute())
        {
            $result = $data->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function delete()
    {
        $conn = $this->conn();
        $id = $this->data['empId'];
        $sql = "DELETE FROM `employee` WHERE id = $id";
        $data = $conn->prepare($sql);
        if($data->execute())
        {
            return true;
        }
    }

    public function edit()
    {
        $conn = $this->conn();
        $id = $this->data['id'];
        $sql = "SELECT * FROM `employee` WHERE id = $id";
        $data = $conn->prepare($sql);
        
       if($data->execute())
       {
            $results = $data->fetch();
            return $results;
       }
    }

    public function update()
    {
        $conn       = $this->conn();
        $id         = $this->data['id'];
        $firstname  = $conn->quote($this->data['firstname']);
        $lastname   = $conn->quote($this->data['lastname']);
        $address    = $conn->quote($this->data['address']);
        $department = $conn->quote($this->data['department']);
        $position   = $conn->quote($this->data['position']);
        $salary     = $this->data['salary'];
        $status     = $this->data['status'];
        $birthday   = $this->data['birthday'];
        $sql = "UPDATE `employee` SET `firstname`=$firstname,`lastname`=$lastname,`address`=$address,`birthday`='$birthday',`status`='$status',`department`=$department,`position`=$position,`salary`='$salary',`updated_at`=NOW() WHERE id = '$id'";
        $data = $conn->prepare($sql);

        if($data->execute())
        {
            return true;
        }
    }
}
?>
