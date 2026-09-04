<?php
require "auth.php";
require "dbc.php";


$sql = "SELECT id, first_name, last_name, orders FROM users ORDER BY orders DESC";
$result = mysqli_query($conn, $sql);
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q3 - Total Orders Per Customer</h3>
            <p class="text-muted mb-0">Displaying each customer alongside their total orders placed</p>
        </div>
        <span class="badge bg-primary fs-6">Requirement 3</span>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th># ID</th>
                    <th>Customer Name</th>
                    <th>Total Orders</th>
                </tr>
            </thead>
            <tbody>
                <?php while($user = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="fw-bold"><?php echo $user['id']; ?></td>
                    <td><?php echo $user['first_name'] . " " . $user['last_name']; ?></td>
                    <td>
                        <span class="badge bg-primary px-3 py-2 fs-6">
                            <?php echo $user['orders']; ?>
                        </span>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "layout/footer.php"; ?>
