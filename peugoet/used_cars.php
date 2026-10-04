<?php
include "db.php";

// 🧠 Query
$sql = "SELECT * FROM users_cars WHERE 1=1";

if(!empty($_GET['model'])){
    $model = $conn->real_escape_string($_GET['model']);
    $sql .= " AND model LIKE '%$model%'";
}

if(!empty($_GET['min_price'])){
    $sql .= " AND price >= ".(int)$_GET['min_price'];
}

if(!empty($_GET['max_price'])){
    $sql .= " AND price <= ".(int)$_GET['max_price'];
}

if(!empty($_GET['year'])){
    $sql .= " AND year = ".(int)$_GET['year'];
}

$sql .= " ORDER BY id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>السيارات المستعملة</title>

<link rel="stylesheet" href="used_cars.css">
</head>

<body>

<h2 class="title">🚗 كل السيارات المستعملة</h2>

<!-- 🔍 فلترة -->
<form method="GET" class="filter-box">

    <input type="text" name="model" placeholder="الموديل">
    <input type="number" name="min_price" placeholder="أقل سعر">
    <input type="number" name="max_price" placeholder="أعلى سعر">
    <input type="number" name="year" placeholder="السنة">

    <button type="submit">🔍 بحث</button>

</form>

<!-- 📦 الكروت -->
<div class="cars-container">

<?php if($result && $result->num_rows > 0){ ?>
<?php while($car = $result->fetch_assoc()){ ?>

<div class="car-card">

    <img src="uploads/<?php echo $car['image1']; ?>">

    <div class="car-info">
        <h3><?php echo $car['car_name']; ?></h3>
        <p><?php echo $car['brand']; ?> - <?php echo $car['model']; ?></p>
        <p>📅 <?php echo $car['year']; ?></p>
        <p class="price">💰 <?php echo $car['price']; ?> جنيه</p>
        <p>📍 <?php echo $car['mileage']; ?> كم</p>

        <div class="contact">
            <a href="tel:<?php echo $car['phone']; ?>">📞</a>
            <a href="https://wa.me/<?php echo $car['whatsapp']; ?>">💬</a>
        </div>
    </div>

</div>

<?php } ?>
<?php } else { ?>
<p class="no-result">لا توجد نتائج</p>
<?php } ?>

</div>

<div class="bottom-buttons">

    <a href="home.php" class="btn-home">
        🏠 الرجوع للرئيسية
    </a>

    <a href="models.php" class="btn-agency">
        🚗 موديلات التوكيل
    </a>

</div>

<script src="used_cars.js"></script>

</body>
</html>