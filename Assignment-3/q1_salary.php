<?php
require "auth.php";
require "dbc.php";

$sql = "SELECT * FROM employee WHERE salary > 20000 ORDER BY salary DESC";
$result = mysqli_query($conn, $sql);
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q1 - Employees With Salary &gt; 20,000</h3>
            <p class="text-muted mb-0">Displaying all personnel earning more than 20,000</p>
        </div>
        <span class="badge bg-primary fs-6">Requirement 1</span>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th># ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Salary</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($result) > 0) {
                    while($emp = mysqli_fetch_assoc($result)) { 
                ?>
                <tr>
                    <td class="fw-bold"><?php echo $emp['id']; ?></td>
                    <td><?php echo $emp['first_name']; ?></td>
                    <td><?php echo $emp['last_name']; ?></td>
                    <td>
                        <span class="badge <?php echo $emp['gender'] == 'Male' ? 'bg-info' : 'bg-danger'; ?>">
                            <?php echo $emp['gender']; ?>
                        </span>
                    </td>
                    <td class="text-success fw-bold">$<?php echo number_format($emp['salary'], 2); ?></td>
                    <td><?php echo $emp['country']; ?></td>
                </tr>
                <?php 
                    } 
                } else {
                ?>
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No employees found with salary &gt; 20,000.</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "layout/footer.php"; ?>
