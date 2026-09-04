<?php
require "auth.php";
require "dbc.php";
require "helpers/validation.php";


$results = [];
$searched = false;
$search_term = '';
$error = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $raw_name = $_POST['name'] ?? '';
    $valid_name = validate_text($raw_name, 50);

    if ($valid_name !== false) {
        $searched = true;
        $search_term = mysqli_real_escape_string($conn, $valid_name);
        $sql = "SELECT * FROM users WHERE first_name LIKE '%$search_term%' OR last_name LIKE '%$search_term%'";
        $run = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($run)) {
            $results[] = $row;
        }
    } else {
        $error = "Please enter a valid search name (maximum 50 characters).";
    }
}
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q6 - Search Customers By Name</h3>
            <p class="text-muted mb-0">Find all customers whose first or last name matches your query</p>
        </div>
        <span class="badge bg-success fs-6">Requirement 6</span>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <form action="q6_search_name.php" method="POST">
                        <div class="mb-3">
                            <label for="fname" class="form-label fw-semibold">Customer Name</label>
                            <input type="text" id="fname" name="name" class="form-control form-control-lg" placeholder="e.g. Layla, Pierre, Smith..." value="<?php echo htmlspecialchars($search_term); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Search Customers</button>
                    </form>
                </div>
            </div>

            <?php if ($error) { ?>
                <div class="alert alert-warning text-center shadow-sm"><?php echo $error; ?></div>
            <?php } ?>
        </div>
    </div>

    <?php if ($searched) { ?>
    <div class="card shadow-sm border-0 mt-2">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Results for "<?php echo htmlspecialchars($search_term); ?>"</span>
            <span class="badge bg-primary"><?php echo count($results); ?> Customer(s) Found</span>
        </div>
        <?php if (count($results) > 0) { ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th># ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Orders</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $c) { ?>
                    <tr>
                        <td class="fw-bold"><?php echo $c['id']; ?></td>
                        <td><?php echo $c['first_name']; ?></td>
                        <td><?php echo $c['last_name']; ?></td>
                        <td><?php echo $c['gender']; ?></td>
                        <td><span class="badge bg-success"><?php echo $c['orders']; ?></span></td>
                        <td><?php echo $c['country']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
            <div class="p-4 text-center text-muted">No customers found matching that name.</div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php include "layout/footer.php"; ?>
