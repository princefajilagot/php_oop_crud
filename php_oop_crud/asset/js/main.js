let empBtn;
function setEmpId(empBtn)
{
    let empId = empBtn.value;
    let empHiddenlId = document.getElementById("empId");
    
    let newEmpModalId = empId;
    empHiddenlId.value = newEmpModalId;

}

