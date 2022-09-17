<?php
require_once 'php/init.php';
check_session();
$emp_record = getId();
?>
<div class="container mt-5">
    <nav class="card col-md-8 offset-md-2 mb-5" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none fw-semibold" href="/php_oop_crud">Dashboard</a></li>
            <li class="breadcrumb-item active fw-semibold" aria-current="page">Employee's Record</li>
        </ol>
    </nav>
    <div class="card col-md-8 offset-md-2 mb-5">
        <div class="card-header text-center">
            <h4 class="fw-semi-bold">EMPLOYEE PROFILE PAGE</h4></h4>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="asset/img/user-image-icon.jpg" class="rounded" alt="..." height="200" width="200">
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="mb-2" for="#fName"><strong>First Name</strong></label>
                    <input class="form-control" id="fName" id type="text" value="<?php echo htmlspecialchars($emp_record['firstname'], ENT_QUOTES); ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label class="mb-2" for="#lName"><strong>Last Name</strong></label>
                    <input class="form-control" id="lName" id type="text" value="<?php echo htmlspecialchars($emp_record['lastname'], ENT_QUOTES); ?>" disabled>
                </div>
                <div class="col-md-4">
                    <label class="mb-2" for="#empNo"><strong>Employee No.</strong></label>
                    <input class="form-control" id="empNo" id type="text" value="<?php echo $emp_record['emp_no']; ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-9">
                    <label class="mb-2" for="#address"><strong>Address</strong></label>
                    <input class="form-control" id="address" id type="text" value="<?php echo htmlspecialchars($emp_record['address'], ENT_QUOTES); ?>" disabled>
                </div>
                <div class="col">
                    <label class="mb-2" for="#bday"><strong>Birthday</strong></label>
                    <input class="form-control" id="bday" id type="text" value="<?php echo $emp_record['birthday']; ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="mb-2" for="#dept"><strong>Department</strong></label>
                    <input class="form-control" id="dept" id type="text" value="<?php echo htmlspecialchars($emp_record['address'], ENT_QUOTES); ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="mb-2" for="#dept"><strong>Status</strong></label>
                    <input class="form-control" id="stat" id type="text" value="<?php echo htmlspecialchars($emp_record['status'], ENT_QUOTES); ?>" disabled>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="mb-2" for="#position"><strong>Position</strong></label>
                    <input class="form-control" id="position" id type="text" value="<?php echo htmlspecialchars($emp_record['position'], ENT_QUOTES); ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label class="mb-2" for="#salary"><strong>Salary</strong></label>
                    <input class="form-control" id="salary" id type="text" value="<?php echo $emp_record['salary']; ?>" disabled>
                </div>
            </div>
        </div> 
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>
