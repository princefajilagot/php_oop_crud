<?php
require_once 'php/init.php';
check_session();
?>
<div class="container mt-5">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active fw-semibold" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <?php alert_message(); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-9">
                    <h5>Employee Records</h5>
                </div>
                <div class="col-md">
                    <a class="btn btn-success btn-sm" href="add-employee.php">Add New Employee</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Employee #</th>
                    <th>Department</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php fetch_data(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="empDelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Delete Employee's record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this record?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                <form action="" method="POST">
                    <input type="hidden" id="empId" name="empId" value="">
                    <button type="submit" class="btn btn-danger btn-sm" name="delete_employee">Delete</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.inc.php'); ?>