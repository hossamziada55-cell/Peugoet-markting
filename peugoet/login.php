<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // 👑 حالة الأدمن (لازم تتحط الأول)
    if($email == "admin@gmail.com" && $password == "11223344"){

        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = "Admin";
        $_SESSION['role'] = "admin";

        header("Location: home.php");
        exit();
    }

    // 👤 المستخدمين العاديين
    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result && $result->num_rows > 0){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            header("Location: home.php");
            exit();

        } else {
            $msg = "❌ كلمة السر خطأ";
        }

    } else {
        $msg = "❌ الإيميل غير موجود";
    }
}
?>

<link rel="stylesheet" href="auth.css">

<form method="POST">

<h2>🔐 تسجيل الدخول</h2>

<?php if(isset($msg)) echo "<div class='msg'>$msg</div>"; ?>

<input name="email" placeholder="الإيميل">
<input type="password" name="password" placeholder="الباسورد">

<button name="login">دخول</button>
<div class="no-account">
    <p>معندكش حساب؟</p>
    <a href="register.php">سجل حساب جديد</a>
</div>
</form>