<?php
include "db.php";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // منع التكرار
    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s",$email);
    $check->execute();
    $res = $check->get_result();

    if($res->num_rows > 0){
        $msg = "❌ الإيميل مستخدم قبل كده";
    } else {

        $stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
        $stmt->bind_param("sss",$username,$email,$password);
        $stmt->execute();

        header("Location: login.php");
        exit();
    }
}
?>

<link rel="stylesheet" href="auth.css">

<form method="POST">

<h2>🟢 إنشاء حساب</h2>

<?php if(isset($msg)) echo "<div class='msg'>$msg</div>"; ?>

<input name="username" placeholder="اسم المستخدم">
<input name="email" placeholder="الإيميل">
<input type="password" name="password" placeholder="الباسورد">

<button name="register">تسجيل</button>

<p>عندك حساب؟ <a href="login.php">دخول</a></p>

</form>