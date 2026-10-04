<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['change'])){

    $id = $_SESSION['user_id'];
    $current = $_POST['current'];
    $new = $_POST['new'];

    // نجيب الباسورد القديم
    $stmt = $conn->prepare("SELECT password FROM users WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    // تحقق
    if(password_verify($current, $user['password'])){

        $new_pass = password_hash($new, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE users SET password=? WHERE id=?");
        $stmt->bind_param("si",$new_pass,$id);
        $stmt->execute();

        echo "✅ تم تغيير كلمة المرور بنجاح";

    } else {
        echo "❌ الباسورد الحالي غلط";
    }
}
?>