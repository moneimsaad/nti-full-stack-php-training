<?php
require "auth.php";
require "dbc.php";
require "helpers/validation.php";


$found = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $raw_id = $_POST['user_id'] ?? '';
    $valid_id = validate_id($raw_id);

    if ($valid_id !== false) {
        $sql = "SELECT * FROM users WHERE id = $valid_id";
        $result = mysqli_query($conn, $sql);
        $found = mysqli_fetch_assoc($result);
        if (!$found) {
            $error = "No customer found with ID: " . htmlspecialchars($valid_id);
        }
    } else {
        $error = "Please enter a valid positive integer ID.";
    }
}
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q2 - Search Customer By ID</h3>
            <p class="text-muted mb-0">Retrieve all profile data for a customer using their ID</p>
        </div>
        <span class="badge bg-primary fs-6">Requirement 2</span>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <form action="q2_search_id.php" method="POST">
                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-semibold">Customer ID</label>
                            <input type="number" id="user_id" name="user_id" class="form-control form-control-lg" placeholder="e.g. 5" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Fetch Customer Data</button>
                    </form>
                </div>
            </div>

            <?php if ($error) { ?>
                <div class="alert alert-warning text-center shadow-sm"><?php echo $error; ?></div>
            <?php } ?>
        </div>
    </div>

    <?php if ($found != null) { ?>
    <div class="card shadow-sm border-0 mt-2">
        <div class="card-header bg-dark text-white fw-semibold">
            Customer Profile - ID #<?php echo $found['id']; ?>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Orders Count</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold"><?php echo $found['id']; ?></td>
                        <td><?php echo $found['first_name']; ?></td>
                        <td><?php echo $found['last_name']; ?></td>
                        <td><?php echo $found['gender']; ?></td>
                        <td><span class="badge bg-success"><?php echo $found['orders']; ?> Orders</span></td>
                        <td><?php echo $found['country']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</div>

<?php include "layout/footer.php"; ?>
