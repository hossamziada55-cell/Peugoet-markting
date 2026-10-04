<?php
session_start();
include "db.php";

$user_id = $_SESSION['user_id'];
$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM users_cars WHERE id=? AND user_id=?");
$stmt->bind_param("ii",$id,$user_id);
$stmt->execute();

// 💥 رسالة نجاح
$_SESSION['msg'] = "🗑 تم حذف العربية بنجاح";

header("Location: home.php");
exit();