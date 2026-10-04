<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خدمات بيجو</title>

    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <div class="logo">Peugeot</div>

        <ul class="nav-links" id="navMenu">
            <li><a href="home.php">الرئيسية</a></li>
            <li><a href="models.php">الموديلات</a></li>
            <li><a href="services.php" class="active">الخدمات</a></li>
            <li><a href="about.php">حول Peugeot</a></li>
            <li><a href="contact.php">تواصل معنا</a></li>
        </ul>

        <div class="nav-actions">
            <?php if(isset($_SESSION['user'])): ?>
                <a href="dashboard.php" class="btn-dashboard"><i class="fas fa-tachometer-alt"></i> لوحة التحكم</a>
                <a href="logout.php" class="btn-logout"><i class="fas fa-sign-out-alt"></i> خروج</a>
            <?php else: ?>
                <a href="add_car.php" class="btn-add-car"><i class="fas fa-plus"></i> أضف سيارتك</a>
                <a href="auth.php" class="btn-login">تسجيل الدخول</a>
            <?php endif; ?>
        </div>

        <div class="menu-btn" onclick="toggleMenu()">☰</div>
    </nav>

    <header class="hero auto">
        <div class="overlay"></div>
        <h1>خدمات بيجو</h1>
        <p>أفضل صيانة وقطع غيار أصلية لسيارات Peugeot</p>
    </header>

    <section class="services">
        <h2 class="section-title auto">خدمات خاصــة بسيارات بيجو</h2>

        <div class="services-container">

            <div class="service-card auto" onclick="openNearestBranch()">
                <img src="img/parts.jpg" alt="">
                <h3>قطع غيار أصلية</h3>
                <p>جميع قطع غيار سيارات بيجو الأصلية مع ضمان وجودة عالية.</p>
            </div>

            <div class="service-card auto" onclick="openNearestBranch()">
                <img src="img/oil.jpg" alt="">
                <h3>تغيير Oils والفلاتر</h3>
                <p>تغيير زيت وفلاتر بيجو بأعلى جودة مع فحص مجاني.</p>
            </div>

            <div class="service-card auto" onclick="openNearestBranch()">
                <img src="img/check2.jpg" alt="">
                <h3>فحص كمبيوتر</h3>
                <p>أحدث أجهزة فحص أعطال بيجو لجميع الموديلات.</p>
            </div>

            <div class="service-card auto" onclick="openNearestBranch()">
                <img src="img/brake.jpg" alt="">
                <h3>صيانة الفرامل</h3>
                <p>تغيير تيل الفرامل الأصلي وضبط كامل للفرامل.</p>
            </div>

            <div class="service-card auto" onclick="openNearestBranch()">
                <img src="img/ac.jpg" alt="">
                <h3>صيانة التكييف</h3>
                <p>فحص دائرة التبريد وشحن فريون لسيارات بيجو.</p>
            </div>

            <div class="service-card auto" onclick="openNearestBranch()">
                <img src="img/peugeot-special.jpg" alt="">
                <h3>خدمات خاصة لبيجو</h3>
                <p>خدمات لجميع موديلات بيجو: 301 — 3008 — 508 — 5008 وغيرها.</p>
            </div>

        </div>
    </section>

    <footer class="footer auto">
        <div class="footer-content">
            <h3>Peugeot Egypt</h3>
            <p>نقدم أفضل خدمات الصيانة وقطع الغيار لعربيات بيجو.</p>
            <p>© 2025 جميع الحقوق محفوظة.</p>
        </div>
    </footer>

    <script src="services.js"></script>
    <script>
    function toggleDropdown(element) {
        element.classList.toggle('active');
    }
    </script>

</body>

</html>