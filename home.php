
<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peugeot | الرئيسية</title>

    <link rel="stylesheet" href="home.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>

<!-- Navbar -->
<header class="navbar">
    <div class="logo">PEUGEOT <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
    <a href="dashboard_admin.php" class="admin-btn">👑</a>
<?php } ?></div>

    <ul class="nav-links" id="navLinks">
        <li><a href="home.php">الرئيسية</a></li>
        <li><a href="models.php">موديلات التوكيل</a></li>
        <li><a href="used_cars.php">موديلات المستعملة</a></li>
        <li><a href="services.php">الخدمات</a></li>
        <li><a href="about.php">حول Peugeot</a></li>
        <li><a href="contact.php">تواصل معنا</a></li>
    </ul>

    <div class="actions">

     <?php if(isset($_SESSION['user_id'])) { ?>
    <a href="add_car.php">
        <button class="btn add-car">+ أضف سيارتك</button>
    </a>
<?php } else { ?>
    <a href="login.php">
        <button class="btn add-car">+ أضف سيارتك</button>
    </a>
<?php } ?>

<?php if(!isset($_SESSION['username'])) { ?>

<a href="login.php" class="login">
    <button class="btn login">تسجيل الدخول</button>
</a>

<?php } else { ?>

<a href="dashboard.php" class="user-icon">
    👤 <?php echo $_SESSION['username']; ?>
</a>

<?php } ?>
</div>

    <div class="menu-icon" id="menuIcon">
        ☰
    </div>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>مرحباً بك في عالم Peugeot</h1>
        <p>منصه رقم 1 في بيع السيارات</p>
    </div>
    </section>
    <section>
    <?php
include "db.php";

$result = $conn->query("
    SELECT * 
    FROM users_cars 
    ORDER BY id DESC 
    LIMIT 5
");
?>

<h2 class="section-title">🔥 أحدث العروض</h2>

<div class="cars-container">

<?php
while($car = $result->fetch_assoc()){
?>

<div class="car-card">

   <div class="slider">

    <?php if(!empty($car['image1'])) { ?>
        <img class="slide active" src="uploads/<?php echo $car['image1']; ?>">
    <?php } ?>

    <?php if(!empty($car['image2'])) { ?>
        <img class="slide" src="uploads/<?php echo $car['image2']; ?>">
    <?php } ?>

    <?php if(!empty($car['image3'])) { ?>
        <img class="slide" src="uploads/<?php echo $car['image3']; ?>">
    <?php } ?>

    <?php if(!empty($car['image4'])) { ?>
        <img class="slide" src="uploads/<?php echo $car['image4']; ?>">
    <?php } ?>

    <!-- الأسهم --> 
     <div class="slider-controls">
    <button class="prev">‹</button>
    <button class="next">›</button>
    </div>

</div>

    <div class="car-info">

        <h3><?php echo $car['car_name']; ?></h3>

        <p><?php echo $car['brand']; ?> - <?php echo $car['model']; ?></p>

        <p>📅 <?php echo $car['year']; ?></p>

        <p>💰 <?php echo $car['price']; ?> جنيه</p>

        <div class="contact">
            <a href="tel:<?php echo $car['phone']; ?>">📞 اتصال</a>
            <a href="https://wa.me/<?php echo $car['whatsapp']; ?>">💬 واتساب</a>
        </div>
        
        <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $car['user_id']) { ?>

    <a href="edit_car.php?id=<?php echo $car['id']; ?>" class="btn btn-edit">✏️ تعديل</a>
    <a href="delete_car.php?id=<?php echo $car['id']; ?>" class="btn btn-delete">🗑 حذف</a>

<?php } ?>

    </div>

</div>

<?php } ?>

</div>
</section>
<section>
<div class="discover-section">

    <a href="used_cars.php" class="discover-btn">
        🚗 اكتشف أجمل السيارات المستعملة
    </a>

</div>

</section>

<script src="home.js"></script>
</body>
</html>