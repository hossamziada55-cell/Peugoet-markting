<?php
session_start();
include "db.php";

if($_SESSION['role'] != 'admin'){
    die("🚫");
}

$cars = $conn->query("
SELECT users_cars.*, users.username 
FROM users_cars 
JOIN users ON users.id = users_cars.user_id
");
?>

<link rel="stylesheet" href="admin.css">

<h2>🚗 Users Cars</h2>

<table border="1" cellpadding="10">

<tr>
<th>Car</th>
<th>Brand</th>
<th>Price</th>
<th>User</th>
</tr>

<?php while($c = $cars->fetch_assoc()){ ?>
<tr>
<td><?= $c['car_name'] ?></td>
<td><?= $c['brand'] ?></td>
<td><?= $c['price'] ?></td>
<td><?= $c['username'] ?></td>
</tr>
<?php } ?>

</table>