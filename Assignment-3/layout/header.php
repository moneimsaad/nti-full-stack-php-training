<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 11</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Task 11</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="q1_salary.php">Q1</a></li>
                <li class="nav-item"><a class="nav-link" href="q2_search_id.php">Q2</a></li>
                <li class="nav-item"><a class="nav-link" href="q3_orders.php">Q3</a></li>
                <li class="nav-item"><a class="nav-link" href="q4_top_products.php">Q4</a></li>
                <li class="nav-item"><a class="nav-link" href="q5_managers.php">Q5</a></li>
                <li class="nav-item"><a class="nav-link" href="q6_search_name.php">Q6</a></li>
                <li class="nav-item"><a class="nav-link" href="q7_filter_country.php">Q7</a></li>
                <li class="nav-item"><a class="nav-link" href="q8_pieces.php">Q8</a></li>
                <li class="nav-item"><a class="nav-link" href="q9_top_salary.php">Q9</a></li>
                <li class="nav-item"><a class="nav-link" href="q10_product_details.php">Q10</a></li>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="nav-item"><span class="nav-link text-info">Hi, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="logout.php">Logout</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link text-success" href="login.php">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
