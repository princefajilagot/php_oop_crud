<?php
require_once 'php/init.php';
check_session();
$errors = update();
$emp_record = getId();
?>
<div class="container mt-5">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none fw-semibold" href="/php_oop_crud">Dashboard</a></li>
            <li class="breadcrumb-item active fw-semibold" aria-current="page">Edit Employee's Record</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-center">
            <h4 class="fw-semi-bold">Edit Employee's Record</h4>
        </div>
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control" type="text" name="firstname" value="<?php echo htmlspecialchars($emp_record['firstname'], ENT_QUOTES); ?>" placeholder="Firstname">
                        <div class="text-danger">
                            <?php echo $errors['firstname'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control" type="text" name="lastname" value="<?php echo htmlspecialchars($emp_record['lastname'], ENT_QUOTES); ?>" placeholder="Lastname">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control" type="text" name="address" value="<?php echo htmlspecialchars($emp_record['address'], ENT_QUOTES); ?>" placeholder="Address">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control" type="date" name="birthday" value="<?php echo $emp_record['birthday']; ?>" placeholder="Birthday">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control" type="text" name="department" value="<?php echo htmlspecialchars($emp_record['department'], ENT_QUOTES); ?>" placeholder="Department">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control" type="text" name="position" value="<?php echo htmlspecialchars($emp_record['position'], ENT_QUOTES); ?>" placeholder="Position">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <select class="form-control" name="status" id="">
                            <option value="">Choose status</option>
                            <option value="Project Based"
                                <?php
                                if($emp_record['status'] == "Project Based"){
                                    echo "selected";
                                }
                                ?>>
                                Project Based
                            </option>
                            <option value="Contractual"
                                <?php
                                    if($emp_record['status'] == "Contractual"){
                                        echo "selected";
                                    }
                                ?>>
                                Contractual
                            </option>
                            <option value="Regular"
                                <?php
                                    if($emp_record['status'] == "Regular"){
                                        echo "selected";
                                    }
                                ?>>
                                Regular
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control <?php echo $errors['salaryInput'] ?? '' ?>" type="text" name="salary" value="<?php echo $emp_record['salary']; ?>" placeholder="Salary">
                        <div class="text-danger">
                            <?php echo $errors['salary'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="emp_no" value="<?php echo $emp_record['emp_no']; ?>">
                <input type="hidden" name="id" value="<?php echo $emp_record['id']; ?>">
                <button class="btn btn-success w-25" type="submit" name="update">Update</button>
            </div>
        </form>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>