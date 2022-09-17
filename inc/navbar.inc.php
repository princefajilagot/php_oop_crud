<?php logout(); ?>
<nav class="navbar bg-dark">
    <div class="container">
        
    </div>
</nav>
<nav id="navbar-example2" class="navbar bg-dark px-3 mb-3">
    <div class="container">
        <a class="navbar-brand text-white" href="/php_oop_crud">Employee Management System</a>
        <ul class="nav nav-pills">
            <?php if(!isset($_SESSION['user_id'])){ ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="signup.php">Signup</a>
                </li>
            <?php }else { ?>
                <li class="nav-item dropdown text-white">
                    <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <?php echo $_SESSION['fullname']; ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#scrollspyHeading3">Admin Profile</a></li>
                        <li><a class="dropdown-item" href="#scrollspyHeading4">Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/php_oop_crud?action=logout">Logout</a></li>
                    </ul>
                </li>
                <?php } ?>
        </ul>
    </div>
</nav>