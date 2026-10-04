<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تواصل معنا</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <a href="#">PEUGEOT</a>
            </div>

            <ul class="nav-links">
                <li><a href="home.php">الرئيسية</a></li>
                <li><a href="models.php">الموديلات</a></li>
                <li><a href="services.php">الخدمات</a></li>
                <li><a href="about.php">حول Peugeot</a></li>
                <li><a href="contact.php" class="active">تواصل معنا</a></li>
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

            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>

    <div class="background"></div>

    <section class="contact-section reveal">

        <div class="contact-info-box">
            <h3 class="info-title">معلومات التواصل</h3>

            <p><strong>📞 خط خدمة العملاء:</strong><br> +20 0123456789</p>
            <p><strong>📧 البريد الإلكتروني:</strong><br> Graduation_team_@gmail.com</p>
            <p><strong>📍 العنوان:</strong><br>Tanta - Spurbay Junction Street</p>

            <hr>

            <p><strong>🕒 مواعيد العمل:</strong><br> علي مدار اليوم</p>
        </div>

        <div class="contact-form-box">
            <h2 class="title">تواصل معنا</h2>
            <p class="subtitle">يسعدنا تواصلك معنا ❤️</p>

            <form id="contactForm">
                <div class="inputGroup">
                    <label>الاسم كامل</label>
                    <input type="text" id="name" required>
                </div>

                <div class="inputGroup">
                    <label>رقم الهاتف</label>
                    <input type="text" id="phone" required>
                </div>

                <div class="inputGroup">
                    <label>البريد الإلكتروني</label>
                    <input type="email" id="email" required>
                </div>

                <div class="inputGroup">
                    <label>رسالتك</label>
                    <textarea id="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="sendBtn">إرسال الرسالة</button>
            </form>
        </div>

    </section>

    <div class="popup" id="popup">
        <div class="popup-box reveal">
            <h3>✔ تم إرسال رسالتك بنجاح</h3>
            <p>سيتم الرد عليك قريباً</p>
            <button onclick="closePopup()">إغلاق</button>
        </div>
    </div>

    <script src="contact.js"></script>
    <script>
    function toggleDropdown(element) {
        element.classList.toggle('active');
    }
    
    // Mobile menu toggle
    document.getElementById('mobile-menu').addEventListener('click', function() {
        this.classList.toggle('active');
    });
    </script>

</body>

</html>