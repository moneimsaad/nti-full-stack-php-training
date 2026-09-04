<?php
require "auth.php";
require "dbc.php";


$sql = "SELECT id, name, price, pecies, ROUND(price * pecies, 2) AS total_revenue FROM products ORDER BY pecies DESC";
$result = mysqli_query($conn, $sql);
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q4 - Top Selling Products &amp; Revenue</h3>
            <p class="text-muted mb-0">Showing product sales volume and calculated total profit/revenue</p>
        </div>
        <span class="badge bg-success fs-6">Requirement 4</span>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead class="table-dark">
                <tr>
                    <th># ID</th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Pieces Sold / Stock</th>
                    <th>Total Revenue / Earned</th>
                </tr>
            </thead>
            <tbody>
                <?php while($prod = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="fw-bold"><?php echo $prod['id']; ?></td>
                    <td><?php echo $prod['name']; ?></td>
                    <td>$<?php echo number_format($prod['price'], 2); ?></td>
                    <td>
                        <span class="badge bg-secondary px-3 py-1 fs-6">
                            <?php echo $prod['pecies']; ?> pcs
                        </span>
                    </td>
                    <td class="text-success fw-bold fs-6">$<?php echo number_format($prod['total_revenue'], 2); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "layout/footer.php"; ?>
