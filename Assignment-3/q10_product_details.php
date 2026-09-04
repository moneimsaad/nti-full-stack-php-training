<?php
require "auth.php";
require "dbc.php";
require "helpers/validation.php";


$product = null;
$error = null;
$top_customers = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $raw_id = $_POST['product_id'] ?? '';
    $valid_id = validate_id($raw_id);

    if ($valid_id !== false) {
        $sql = "SELECT *, (price * pecies) AS total_revenue FROM products WHERE id = $valid_id";
        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);

        if ($product) {

            $cust_sql = "SELECT id, first_name, last_name, orders, country FROM users ORDER BY orders DESC LIMIT 5";
            $cust_res = mysqli_query($conn, $cust_sql);
            while ($c = mysqli_fetch_assoc($cust_res)) {
                $top_customers[] = $c;
            }
        } else {
            $error = "No product found with ID: " . htmlspecialchars($valid_id);
        }
    } else {
        $error = "Please enter a valid product ID number.";
    }
}
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q10 - Product Sales &amp; Customer Analytics</h3>
            <p class="text-muted mb-0">Input product ID to view sales frequency, total pieces, and purchasing customers</p>
        </div>
        <span class="badge bg-info text-dark fs-6">Requirement 10</span>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <form action="q10_product_details.php" method="POST">
                        <div class="mb-3">
                            <label for="pid" class="form-label fw-semibold">Enter Product ID</label>
                            <input type="number" id="pid" name="product_id" class="form-control form-control-lg" placeholder="e.g. 1 to 100" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">Fetch Product Analytics</button>
                    </form>
                </div>
            </div>

            <?php if ($error) { ?>
                <div class="alert alert-warning text-center shadow-sm"><?php echo $error; ?></div>
            <?php } ?>
        </div>
    </div>

    <?php if ($product != null) { ?>
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light text-center p-3">
                <div class="text-muted small">Product Name</div>
                <div class="fs-4 fw-bold text-dark mt-1"><?php echo htmlspecialchars($product['name']); ?></div>
                <div class="badge bg-primary mt-2 align-self-center">ID #<?php echo $product['id']; ?></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light text-center p-3">
                <div class="text-muted small">Total Pieces Sold / Stock</div>
                <div class="fs-3 fw-bold text-dark mt-1"><?php echo $product['pecies']; ?> pcs</div>
                <div class="text-success small mt-2">Unit Price: $<?php echo number_format($product['price'], 2); ?></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light text-center p-3">
                <div class="text-muted small">Total Revenue Generated</div>
                <div class="fs-3 fw-bold text-success mt-1">$<?php echo number_format($product['total_revenue'], 2); ?></div>
                <div class="text-muted small mt-2">Calculated Sales Volume</div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Top Purchasing Customers (Ranked by Order Volume)</span>
            <span class="badge bg-primary">Customer Insights</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Country</th>
                        <th>Total Orders Placed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($top_customers as $cust) { ?>
                    <tr>
                        <td class="fw-bold"><?php echo $cust['id']; ?></td>
                        <td><?php echo $cust['first_name'] . " " . $cust['last_name']; ?></td>
                        <td><?php echo $cust['country']; ?></td>
                        <td><span class="badge bg-success"><?php echo $cust['orders']; ?> Orders</span></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>
</div>

<?php include "layout/footer.php"; ?>
