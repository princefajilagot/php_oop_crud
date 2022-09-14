<?php
require_once 'php/init.php';
if(isset($_SESSION['user_id']))
{
    header('Location:/php_oop_crud');
}
$errors = signup();
?>

<div class="container mt-5">
    <div class="row">
        <div class="card col-md-4 offset-md-4">
            <div class="card-body">
                <h3 class="fw-bold text-dark text-center">Sign Up Form</h5>

                <div class="form-group mt-4">
                    <form action="" method="POST">
                        <div class="col mb-3">
                            <input class="form-control <?php echo $errors['fNameInput'] ?? '' ?>" type="text" name="fullname" value="<?php echo @($_POST['fullname']); ?>" placeholder="Full Name">
                            <div class="<?php echo $errors['fNameText'] ?? '' ?>">
                                <?php echo $errors['fname'] ?? '' ?>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <input class="form-control <?php echo $errors['uInput'] ?? '' ?>" type="text" name="username" value="<?php echo @($_POST['username']); ?>" placeholder="Username">
                            <div class="<?php echo $errors['uText'] ?? '' ?>">
                                <?php echo $errors['username'] ?? '' ?>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <input class="form-control <?php echo $errors['eInput'] ?? '' ?>" type="text" name="email" value="<?php echo @($_POST['email']); ?>" placeholder="email">
                            <div class="<?php echo $errors['eText'] ?? '' ?>">
                                <?php echo $errors['email'] ?? '' ?>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <input class="form-control <?php echo $errors['pInput'] ?? '' ?>" type="password" name="password" value="<?php echo @($_POST['password']); ?>" placeholder="Password">
                            <div class="<?php echo $errors['pText'] ?? '' ?>">
                                <?php echo $errors['password'] ?? '' ?>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <input class="form-control <?php echo $errors['rpInput'] ?? '' ?>" type="password" name="rpassword" value="<?php echo @($_POST['rpassword']); ?>" placeholder="Password">
                            <div class="<?php echo $errors['rpText'] ?? '' ?>">
                                <?php echo $errors['rpassword'] ?? '' ?>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <input class="btn btn-success w-100" type="submit" name="signup" value="Signup">
                        </div>
                        <span>Have an account? <a class="fw-semibold text-decoration-none" href="login.php">Log in</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>