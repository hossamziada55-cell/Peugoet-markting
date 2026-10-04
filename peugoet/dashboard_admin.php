<?php
session_start();
include "db.php";

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("🚫 غير مسموح");
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="admin.css">
</head>

<body>

<div class="sidebar">

<h2>👑 Admin Panel</h2>

<a href="dashboard_admin.php">📊 Dashboard</a>
<a href="users.php">👤 Users</a>
<a href="users_cars.php">🚗 Users Cars</a>
<a href="models.php">🏢 Models of Brand</a>
<a href="add_car_of_brand.php">➕ Add Brand Car</a>

</div>

<div class="content">

<h1>Welcome Admin 👋</h1>

</div>

</body>
</html>