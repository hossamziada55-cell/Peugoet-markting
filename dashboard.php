<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT username, email FROM users WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>لوحة التحكم</title>
<link rel="stylesheet" href="dashboard.css">
</head>

<body>

<div class="dashboard">

    <h2>👤 مرحباً <?php echo $user['username']; ?></h2>

    <div class="card">
        <h3>📋 بياناتي</h3>
        <p><strong>اسم المستخدم:</strong> <?php echo $user['username']; ?></p>
        <p><strong>الإيميل:</strong> <?php echo $user['email']; ?></p>
    </div>

    <div class="card">
        <h3>🔐 تغيير كلمة المرور</h3>

        <form action="change_password.php" method="POST">
            <input type="password" name="current" placeholder="الباسورد الحالي" required>
            <input type="password" name="new" placeholder="الباسورد الجديد" required>
            <button name="change">تغيير</button>
        </form>
    </div>

    <a href="logout.php" class="logout">🚪 تسجيل الخروج</a>

</div>

</body>
</html>