<?php
require "auth.php";
require "dbc.php";
require "helpers/validation.php";


$items = [];
$searched = false;
$min_pieces = 100;
$error = null;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $raw_input = $_POST['min_pieces'] ?? '';
    $valid_num = validate_range_number($raw_input, 100, 5000);

    if ($valid_num !== false) {
        $searched = true;
        $min_pieces = $valid_num;
        $sql = "SELECT * FROM products WHERE pecies > $min_pieces ORDER BY pecies ASC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $items[] = $row;
        }
    } else {
        $error = "Validation Error: Please enter a valid integer number strictly between 100 and 5000.";
    }
}
include "layout/header.php";
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Q8 - Filter Products By Pieces (100 - 5000)</h3>
            <p class="text-muted mb-0">Show products whose total pieces exceed the entered threshold</p>
        </div>
        <span class="badge bg-dark fs-6">Requirement 8</span>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-4">
                    <form action="q8_pieces.php" method="POST">
                        <div class="mb-3">
                            <label for="min_pcs" class="form-label fw-semibold">Enter Number (100 - 5000)</label>
                            <input type="number" id="min_pcs" name="min_pieces" class="form-control form-control-lg" min="100" max="5000" placeholder="e.g. 150" value="<?php echo htmlspecialchars($min_pieces); ?>" required>
                            <div class="form-text">Range strictly enforced between 100 and 5000.</div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100 py-2 fw-semibold">Filter Products</button>
                    </form>
                </div>
            </div>

            <?php if ($error) { ?>
                <div class="alert alert-danger text-center shadow-sm"><?php echo $error; ?></div>
            <?php } ?>
        </div>
    </div>

    <?php if ($searched) { ?>
    <div class="card shadow-sm border-0 mt-2">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <span>Products with Pieces &gt; <strong><?php echo $min_pieces; ?></strong></span>
            <span class="badge bg-success"><?php echo count($items); ?> Product(s) Found</span>
        </div>
        <?php if (count($items) > 0) { ?>
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th># ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Total Pieces In Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $prod) { ?>
                    <tr>
                        <td class="fw-bold"><?php echo $prod['id']; ?></td>
                        <td><?php echo $prod['name']; ?></td>
                        <td>$<?php echo number_format($prod['price'], 2); ?></td>
                        <td>
                            <span class="badge bg-secondary px-3 py-1 fs-6">
                                <?php echo $prod['pecies']; ?> pcs
                            </span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php } else { ?>
            <div class="p-4 text-center text-muted">No products found with pieces greater than <?php echo $min_pieces; ?>.</div>
        <?php } ?>
    </div>
    <?php } ?>
</div>

<?php include "layout/footer.php"; ?>
