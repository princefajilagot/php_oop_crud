<?php
class Employee extends Config{
    protected $firstname = null;
    protected $lastname = null;
    protected $employee_no = null;
    protected $address = null;
    protected $birthday = null;
    protected $department = null;
    protected $position = null;
    protected $status = null;
    protected $salary = null;
    protected $id = null;

    public function setId($id){
        $this->id = $id;
    }

    public function setRecords($firstname,$lastname,$employee_no,$address,$birthday,$department,$position,$status,$salary)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->employee_no = $employee_no;
        $this->address = $address;
        $this->birthday = $birthday;
        $this->department = $department;
        $this->position = $position;
        $this->status = $status;
        $this->salary = $salary;
    }

    public function generateEmpNo(){
        $con = $this->conn();
        $sql = "SELECT * FROM `employee`";
        $data = $con->prepare($sql);
        $data->execute();

        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        $totalEmp = count($result);
        return $totalEmp;
    }

    public function insert()
    {
        $conn = $this->conn();
        $firstname = $conn->quote($this->firstname);
        $lastname = $conn->quote($this->lastname);
        $address = $conn->quote($this->address);
        $department = $conn->quote($this->department);
        $position = $conn->quote($this->position);
        $sql = "INSERT INTO `employee`
            (`firstname`, `lastname`, `emp_no`, `address`, `birthday`, `status`, `department`, `position`, `salary`, `created_at`)
            VALUES
            ($firstname,$lastname,'$this->employee_no',$address,'$this->birthday','$this->status',$department,$position,'$this->salary',NOW())";
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
        $sql = "DELETE FROM `employee` WHERE id = $this->id";
        $data = $conn->prepare($sql);
        if($data->execute())
        {
            return true;
        }
    }

    public function edit()
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM `employee` WHERE id = $this->id";
        $data = $conn->prepare($sql);
        
       if($data->execute())
       {
            $results = $data->fetch();
            return $results;
       }
    }

    public function update()
    {
        $conn = $this->conn();
        $firstname = $conn->quote($this->firstname);
        $lastname = $conn->quote($this->lastname);
        $address = $conn->quote($this->address);
        $department = $conn->quote($this->department);
        $position = $conn->quote($this->position);
        $sql = "UPDATE `employee` SET `firstname`=$firstname,`lastname`=$lastname,`address`=$address,`birthday`='$this->birthday',`status`='$this->status',`department`=$department,`position`=$position,`salary`='$this->salary',`updated_at`=NOW() WHERE id = '$this->id'";
        $data = $conn->prepare($sql);

        if($data->execute())
        {
            return true;
        }
    }
}

