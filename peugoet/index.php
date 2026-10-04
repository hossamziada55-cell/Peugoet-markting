<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peugeot</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navbar -->
    <header>
            <div class="logo-container">
                <img src="logo.png" alt="Peugeot Logo" class="logo">
            </div>

            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>

    <!-- Hero Video Section -->
    <section class="hero">
        <video autoplay muted loop playsinline class="hero-video">
            <source src="hero.mp4" type="video/mp4">
        </video>

        <div class="overlay"></div>

        <div class="hero-content">
            <h1>قوة الأداء بتقابل الفخامة</h1>
            <p>اكتشف أحدث موديلات Peugeot الكهربائية</p>
            <a href="home.php" class="explore-btn">استكشف الآن</a>
        </div>
    </section>

    <script src="script.js"></script>
</body>

</html>