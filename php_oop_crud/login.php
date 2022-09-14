<?php
require_once 'php/init.php';
if(isset($_SESSION['user_id']))
{
    header('Location:/php_oop_crud');
}
$error = logIn();   
?>
<div class="container mt-5">
    <div class="row">
        <div class="card col-md-4 offset-md-4">
            <div class="card-body">
                <h3 class="fw-bold text-dark text-center">Login Form</h5>

                <div class="form-group mt-4">
                    <form action="" method="POST">
                        <div class="col mb-3">
                            <input class="form-control <?php echo $error['is-invalid'] ?? '' ?>" type="text" name="u_id" placeholder="Enter username or email">
                            <div class="<?php echo $error['text-danger'] ?? '' ?>">
                                <?php echo $error['errorText'] ?? '' ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input class="form-control" type="password" name="password" placeholder="Enter password">
                        </div>
                        <div class="input-group mb-2">
                            <input class="btn btn-success w-100" type="submit" name="login" value="Login">
                        </div>
                        <span>Don't have an account? <a class="fw-semibold text-decoration-none" href="signup.php">Sign up</a></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>