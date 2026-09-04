<?php
require "dbc.php";
require "helpers/validation.php";

session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $raw_id = $_POST['user_id'] ?? '';
    $raw_password = $_POST['password'] ?? '';
    $valid_id = validate_id($raw_id);
    $valid_password = validate_password($raw_password);

    if ($valid_id !== false && $valid_password !== false) {
        $password = mysqli_real_escape_string($conn, $valid_password);
        $sql = "SELECT id, first_name, password FROM users WHERE id = $valid_id AND password = '$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'];
            header("Location: index.php");
            exit;
        }
    }

    $error = "Invalid customer ID or password.";
}
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h3 class="fw-bold mb-1">Login</h3>
                    <p class="text-muted mb-4">Login to access the MySQL task pages</p>

                    <?php if ($error) { ?>
                        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                    <?php } ?>

                    <form action="login.php" method="POST">
                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-semibold">Customer ID</label>
                            <input type="number" id="user_id" name="user_id" class="form-control" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" id="password" name="password" class="form-control" maxlength="100" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "layout/footer.php"; ?>
