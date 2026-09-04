<?php
require "auth.php";
require "dbc.php";
require "helpers/validation.php";


$found = null;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $valid_pass = validate_password($_POST['pass'] ?? '');
    if ($valid_pass === false) {
        $found = null;
    } else {
    $pass = mysqli_real_escape_string($conn, $valid_pass);
    $sql = "SELECT * FROM employee WHERE password = '$pass'";
    $result = mysqli_query($conn, $sql);
    $found = mysqli_fetch_assoc($result);
    }
}
include "layout/header.php";
?>

<div class="container mt-4">
    <h3 class="mb-3">Q10 - Find Employee By Password</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 mb-4">
                <form action="q10_search_pass.php" method="POST">
                    <div class="mb-3">
                        <label for="emp_pass" class="form-label">Enter Employee Password</label>
                        <input type="text" id="emp_pass" name="pass" class="form-control" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Search</button>
                </form>
            </div>
        </div>
    </div>

    <?php if ($found != null) { ?>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Salary</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $found['id']; ?></td>
                <td><?php echo $found['first_name']; ?></td>
                <td><?php echo $found['last_name']; ?></td>
                <td><?php echo $found['gender']; ?></td>
                <td><?php echo $found['salary']; ?></td>
                <td><?php echo $found['country']; ?></td>
            </tr>
        </tbody>
    </table>
    <?php } ?>
</div>

<?php include "layout/footer.php"; ?>
