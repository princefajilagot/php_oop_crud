<?php
require_once 'php/init.php';
check_session();
$errors = insert();
?>
<div class="container mt-5">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-decoration-none fw-semibold" href="/php_oop_crud">Dashboard</a></li>
            <li class="breadcrumb-item active fw-semibold" aria-current="page">Add New Employee</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header text-center">
            <h4>Add New Employee</h4>
        </div>
        <form action="" method="POST">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control <?php echo $errors['fNameInput'] ?? '' ?>" type="text" name="firstname" value="<?php echo @($_POST['firstname']); ?>" placeholder="Firstname">
                        <div class="<?php echo $errors['fNameText'] ?? '' ?>">
                            <?php echo $errors['firstname'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control <?php echo $errors['lNameInput'] ?? '' ?>" type="text" name="lastname" value="<?php echo @($_POST['lastname']); ?>" placeholder="Lastname">
                        <div class="<?php echo $errors['lNameText'] ?? '' ?>">
                            <?php echo $errors['lastname'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control <?php echo $errors['aInput'] ?? '' ?>" type="text" name="address" value="<?php echo @($_POST['address']); ?>" placeholder="Address">
                        <div class="<?php echo $errors['addressText'] ?? '' ?>">
                            <?php echo $errors['address'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control <?php echo $errors['bInput'] ?? '' ?>" type="date" name="birthday" value="<?php echo @($_POST['birthday']); ?>" placeholder="Birthday">
                        <div class="<?php echo $errors['bText'] ?? '' ?>">
                            <?php echo $errors['birthday'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <input class="form-control <?php echo $errors['deptInput'] ?? '' ?>" type="text" name="department" value="<?php echo @($_POST['department']); ?>" placeholder="Department">
                        <div class="<?php echo $errors['deptText'] ?? '' ?>">
                            <?php echo $errors['department'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <input class="form-control <?php echo $errors['posInput'] ?? '' ?>" type="text" name="position" value="<?php echo @($_POST['position']); ?>" placeholder="Position">
                        <div class="<?php echo $errors['posText'] ?? '' ?>">
                            <?php echo $errors['position'] ?? '' ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <select class="form-control <?php echo $errors['statInput'] ?? '' ?>" name="status" id="">
                            <option value="">Choose status</option>
                            <option value="Project Based">Project Based</option>
                            <option value="Contractual">Contractual</option>
                            <option value="Regular">Regular</option>
                        </select>
                        <div class="<?php echo $errors['statText'] ?? '' ?>">
                            <?php echo $errors['status'] ?? '' ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input class="form-control <?php echo $errors['salaryInput'] ?? '' ?>" type="text" name="salary" value="<?php echo @($_POST['salary']); ?>" placeholder="Salary">
                        <div class="<?php echo $errors['salaryText'] ?? '' ?>">
                            <?php echo $errors['salary'] ?? '' ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-success w-25" type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>