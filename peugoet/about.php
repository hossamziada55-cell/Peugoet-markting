<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>حول Peugeot</title>

  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="about.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

  <!-- NAVBAR -->
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
          <a href="add_car.php" class="btn-add-car"><i class="fas fa-plus"></i> أضف سيارتك</a>
          <div class="user-profile-dropdown" onclick="toggleDropdown(this)">
              <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="profile" class="nav-profile-img">
              <div class="dropdown-menu">
                  <div class="dropdown-user-name"><?php echo $_SESSION['user']; ?></div>
                  <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> لوحة التحكم</a>
                  <a href="logout.php"><i class="fas fa-sign-out-alt"></i> خروج</a>
              </div>
          </div>
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

  <!-- HERO SECTION -->
  <section class="about-hero">
    <h1>حول Peugeot</h1>
    <p>أكثر من 200 عام من الابتكار، الأداء، والفخامة الفرنسية.</p>
  </section>

  <!-- CONTENT SECTION -->
  <section class="about-content">

    <div class="about-box">
      <h2>تاريخ عريق</h2>
      <p>
        تأسست Peugeot عام 1810 في فرنسا، وبدأت كشركة صناعية قبل أن تتحول
        إلى واحدة من أهم شركات صناعة السيارات في العالم.
      </p>
    </div>

    <div class="about-box">
      <h2>تصميم جريء</h2>
      <p>
        تتميز سيارات Peugeot بالهوية العصرية والتصميم الرياضي الجذاب
        مع لمسات أوروبية راقية.
      </p>
    </div>

    <div class="about-box">
      <h2>تكنولوجيا متطورة</h2>
      <p>
        توفر الشركة أحدث أنظمة الأمان، القيادة الذكية،
        والشاشات الرقمية المتطورة.
      </p>
    </div>

  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <p>© 2026 Peugeot Egypt - جميع الحقوق محفوظة</p>
  </footer>

  <script src="about.js"></script>
  <script>
  function toggleDropdown(element) {
      element.classList.toggle('active');
  }
  </script>
</body>

</html>