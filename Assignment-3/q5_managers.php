<?php
require "auth.php";
require "dbc.php";

$sql = "SELECT 
            e.id AS emp_id,
            CONCAT(e.first_name, ' ', e.last_name) AS employee_name,
            e.country AS emp_country,
            COALESCE(CONCAT(m.first_name, ' ', m.last_name), e.manger) AS manager_name
        FROM employee e
        LEFT JOIN employee m ON e.manger = m.first_name
        ORDER BY e.id ASC";
$result = mysqli_query($conn, $sql);
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q5 - Employee &amp; Manager (Self-Join)</h3>
            <p class="text-muted mb-0">Correlating employee records with their manager using <code>LEFT JOIN employee ON manager</code></p>
        </div>
        <span class="badge bg-success fs-6">Requirement 5: Self-Join</span>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th># Employee ID</th>
                    <th>Employee Name</th>
                    <th>Country</th>
                    <th>Direct Manager (Self-Join)</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="fw-bold"><?php echo $row['emp_id']; ?></td>
                    <td><?php echo $row['employee_name']; ?></td>
                    <td><?php echo $row['emp_country']; ?></td>
                    <td>
                        <span class="badge bg-info text-dark px-3 py-1 fs-6">
                            <?php echo $row['manager_name']; ?>
                        </span>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "layout/footer.php"; ?>
