<?php
include "db.php";

$cars = $conn->query("SELECT * FROM cars");
?>

<link rel="stylesheet" href="models.css">

<h2 class="title">🏢 موديلات التوكيل</h2>

<div class="cars-container">

<?php while($car = $cars->fetch_assoc()){ ?>

    <div class="car-card">

        <img src="uploads/<?php echo $car['image1']; ?>" alt="car">

        <h3><?php echo $car['car_name']; ?></h3>

        <p>🚗 <?php echo $car['model']; ?></p>

        <p>💰 <?php echo $car['price']; ?></p>

    </div>

<?php } ?>

</div>