<?php
session_start();
$conn = new mysqli("localhost", "root", "", "Peugeot");

$user_id = $_SESSION['user_id'];

if(isset($_POST['update'])){
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("UPDATE users SET password='$pass' WHERE id=$user_id");
    echo "تم التحديث";
}
?>

<form method="POST">
    <input type="password" name="password" placeholder="باسورد جديد">
    <button name="update">تغيير</button>
</form>