<?php
$mysqli_report = mysqli_report(MYSQLI_REPORT_OFF);
$conn = mysqli_connect("localhost", "root", "", "task11");

if ($conn) {
    $password_column = mysqli_query($conn, "SHOW COLUMNS FROM users LIKE 'password'");

    if ($password_column && mysqli_num_rows($password_column) == 0) {
        mysqli_query($conn, "ALTER TABLE users ADD password VARCHAR(100) DEFAULT NULL");
    }

    mysqli_query($conn, "UPDATE users SET password = '123456' WHERE password IS NULL OR password LIKE '\$2y\$%'");
}
?>
