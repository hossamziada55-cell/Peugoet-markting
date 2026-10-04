<?php
session_start(); 

// اتصال بالداتابيز
$conn = new mysqli("localhost", "root", "", "Peugeot");

if ($conn->connect_error) {
  die("فشل الاتصال");
}

$sql = "SELECT * FROM cars";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الموديلات</title>

  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="models.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

<nav class="navbar" id="navbar">
  <div class="nav-links">
    <a href="home.php">الرئيسية</a>
    <a href="models.php">الموديلات</a>
    <a href="services.php">الخدمات</a>
    <a href="about.php">حول Peugeot</a>
    <a href="contact.php">تواصل معانا</a>
  </div>

  <div class="nav-actions">
    <?php if(isset($_SESSION['user'])): ?>
        <a href="dashboard.php" class="btn-dashboard"><i class="fas fa-tachometer-alt"></i> لوحة التحكم</a>
        <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> خروج</a>
    <?php else: ?>
        <a href="add_car.php" class="btn-add-car"><i class="fas fa-plus"></i> أضف سيارتك</a>
        <a href="auth.php" class="btn-login">تسجيل الدخول</a>
    <?php endif; ?>
  </div>

  <div class="hamburger" id="hamburger">
    <span></span>
    <span></span>
    <span></span>
  </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="index.php">الرئيسية</a>
  <a href="models.php">الموديلات</a>
  <a href="services.php">الخدمات</a>
  <a href="about.php">حول Peugeot</a>
  <a href="contact.php">تواصل معانا</a>
</div>

<section class="header">
  <h1>استكشف موديلاتنا</h1>
  <p>اختار سيارتك المناسبة بكل سهولة</p>
</section>

<div class="filter-section">
  <button class="filter-btn" id="openFilter">فلتر البحث</button>
</div>

<div class="filter-popup" id="filterPopup">
  <div class="popup-content">
    <h3>اختر نوع السيارة</h3>
    <button onclick="filterCars('all')">الكل</button>
    <button onclick="filterCars('sedan')">سيدان</button>
    <button onclick="filterCars('suv')">SUV</button>
    <button onclick="filterCars('sport')">رياضية</button>
    <button class="close-btn" id="closeFilter">إغلاق</button>
  </div>
</div>

<!-- 👇 الجزء المهم -->
<section class="cars">

<?php
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
?>
<div class="car-card" data-type="<?php echo $row['type']; ?>">

    <div class="car-image">
        <img src="./uploads/<?php echo $row['image']; ?>" alt="car">
    </div>

    <div class="car-info">

        <h2>🚗 <?php echo $row['name']; ?></h2>

        <span class="car-type">🏷️ <?php echo $row['type']; ?></span>

        <div class="specs">

            <p>⚙️ المحرك: <?php echo $row['engine']; ?></p>
            <p>💪 القوة: <?php echo $row['power']; ?></p>
            <p>🔄 ناقل الحركة: <?php echo $row['transmission']; ?></p>
            <p>⛽ الوقود: <?php echo $row['fuel']; ?></p>
            <p>🪑 المقاعد: <?php echo $row['seats']; ?></p>

        </div>

        <a href="car_details.php?id=<?php echo $row['id']; ?>" class="more-btn">
            🔍 تعرف على المزيد
        </a>

    </div>

</div>

<?php
  }
} else {
  echo "<p style='text-align:center'>مفيش موديلات حالياً</p>";
}
?>

</section>

<script src="models.js"></script>
<script>
function toggleDropdown(element) {
    element.classList.toggle('active');
}
</script>
</body>
</html>