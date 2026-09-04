<?php
require "auth.php";
require "dbc.php";
require "helpers/validation.php";


$selected_country = '';
$users = [];
$searched = false;


$countries_res = mysqli_query($conn, "SELECT DISTINCT country FROM users WHERE country IS NOT NULL AND country != '' ORDER BY country ASC");

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['country'])) {
    $raw_country = $_POST['country'];
    $valid_country = validate_text($raw_country, 50);

    if ($valid_country !== false) {
        $selected_country = mysqli_real_escape_string($conn, $valid_country);
        $searched = true;
        $sql = "SELECT * FROM users WHERE country = '$selected_country' ORDER BY first_name ASC, last_name ASC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
}
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q7 - Filter Customers By Country</h3>
            <p class="text-muted mb-0">Select a country to view all local customers ordered alphabetically</p>
        </div>
        <span class="badge bg-dark fs-6">Requirement 7</span>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <form action="q7_filter_country.php" method="POST">
                        <div class="mb-3">
                            <label for="cnt" class="form-label fw-semibold">Choose Country / City</label>
                            <select name="country" id="cnt" class="form-select form-select-lg" required>
                                <option value="" disabled <?php if(empty($selected_country)) echo "selected"; ?>>-- Select Country --</option>
                                <?php while ($c = mysqli_fetch_assoc($countries_res)) { ?>
                                    <option value="<?php echo htmlspecialchars($c['country']); ?>" <?php if($selected_country == $c['country']) echo "selected"; ?>>
                                        <?php echo htmlspecialchars($c['country']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-2 fw-semibold">Filter Customers</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if ($searched) { ?>
    <div class="card shadow-sm border-0 mt-2">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Customers in <strong><?php echo htmlspecialchars($selected_country); ?></strong> (Sorted by Name)</span>
            <span class="badge bg-light text-dark"><?php echo count($users); ?> Found</span>
        </div>
        <?php if (count($users) > 0) { ?>
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
                    <?php foreach ($users as $u) { ?>
                    <tr>
                        <td class="fw-bold"><?php echo $u['id']; ?></td>
                        <td><?php echo $u['first_name']; ?></td>
                        <td><?php echo $u['last_name']; ?></td>
                        <td><?php echo $u['gender']; ?></td>
                        <td><span class="badge bg-primary"><?php echo $u['orders']; ?></span></td>
                        <td><?php echo $u['country']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
            <div class="p-4 text-center text-muted">No customers found for the selected country.</div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php include "layout/footer.php"; ?>
