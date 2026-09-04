<?php
require "auth.php";
require "dbc.php";
require "helpers/validation.php";


$selected_country = '';
$top_earners = [];
$searched = false;


$countries_res = mysqli_query($conn, "SELECT DISTINCT country FROM employee WHERE country IS NOT NULL AND country != '' ORDER BY country ASC");

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['country'])) {
    $raw_country = $_POST['country'];
    $valid_country = validate_text($raw_country, 50);

    if ($valid_country !== false) {
        $selected_country = mysqli_real_escape_string($conn, $valid_country);
        $searched = true;
        $sql = "SELECT id, first_name, last_name, gender, country, salary 
                FROM employee 
                WHERE country = '$selected_country' 
                ORDER BY salary DESC 
                LIMIT 3";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $top_earners[] = $row;
        }
    }
}
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q9 - Top 3 Richest In City / Country</h3>
            <p class="text-muted mb-0">Discover the top 3 highest salaried individuals in a specific location</p>
        </div>
        <span class="badge bg-dark fs-6">Requirement 9</span>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <form action="q9_top_salary.php" method="POST">
                        <div class="mb-3">
                            <label for="cnt" class="form-label fw-semibold">Choose City / Country</label>
                            <select name="country" id="cnt" class="form-select form-select-lg" required>
                                <option value="" disabled <?php if(empty($selected_country)) echo "selected"; ?>>-- Select Country --</option>
                                <?php while ($c = mysqli_fetch_assoc($countries_res)) { ?>
                                    <option value="<?php echo htmlspecialchars($c['country']); ?>" <?php if($selected_country == $c['country']) echo "selected"; ?>>
                                        <?php echo htmlspecialchars($c['country']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-2 fw-semibold">Show Top 3 Richest</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php if ($searched) { ?>
    <div class="card shadow-sm border-0 mt-2">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Top 3 Highest Paid in <strong><?php echo htmlspecialchars($selected_country); ?></strong></span>
            <span class="badge bg-warning text-dark"><?php echo count($top_earners); ?> Record(s)</span>
        </div>
        <?php if (count($top_earners) > 0) { ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Rank</th>
                        <th># ID</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Country</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rank = 1;
                    foreach ($top_earners as $emp) { 
                    ?>
                    <tr>
                        <td>
                            <span class="badge <?php echo $rank == 1 ? 'bg-warning text-dark' : ($rank == 2 ? 'bg-secondary' : 'bg-dark'); ?> fs-6">
                                #<?php echo $rank++; ?>
                            </span>
                        </td>
                        <td class="fw-bold"><?php echo $emp['id']; ?></td>
                        <td><?php echo $emp['first_name'] . " " . $emp['last_name']; ?></td>
                        <td><?php echo $emp['gender']; ?></td>
                        <td><?php echo $emp['country']; ?></td>
                        <td class="text-success fw-bold fs-6">$<?php echo number_format($emp['salary'], 2); ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
            <div class="p-4 text-center text-muted">No employees found for this location.</div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php include "layout/footer.php"; ?>
