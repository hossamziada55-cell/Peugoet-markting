<?php
session_start();
include "db.php";

// تأكد إن الأدمن فقط
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    die("🚫 غير مسموح");
}

if(isset($_POST['add'])){

    // البيانات
    $name = $_POST['name'];
    $type = $_POST['type'];
    $engine = $_POST['engine'];
    $power = $_POST['power'];
    $transmission = $_POST['transmission'];
    $fuel = $_POST['fuel'];
    $seats = $_POST['seats'];

    // رفع الصورة
    $img_name = time() . "_" . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    // المسار الصحيح
    $upload_path = "uploads/";

    if(!is_dir($upload_path)){
        mkdir($upload_path, 0777, true);
    }

    move_uploaded_file($tmp_name, $upload_path . $img_name);

    // إدخال البيانات
    $stmt = $conn->prepare("
        INSERT INTO cars 
        (name, type, engine, power, transmission, fuel, seats, image)
        VALUES (?,?,?,?,?,?,?,?)
    ");

    $stmt->bind_param(
        "ssssssis",
        $name,
        $type,
        $engine,
        $power,
        $transmission,
        $fuel,
        $seats,
        $img_name
    );

    $stmt->execute();

    header("Location: models.php");
    exit();
}
?>

<link rel="stylesheet" href="admin.css">

<div class="content">

    <h2>➕ إضافة سيارة جديدة</h2>

    <div class="form-box">

        <form method="POST" enctype="multipart/form-data">

            <input name="name" placeholder="اسم السيارة" required>
            <input name="type" placeholder="نوع السيارة" required>

            <input name="engine" placeholder="المحرك" required>
            <input name="power" placeholder="القوة" required>

            <input name="transmission" placeholder="ناقل الحركة" required>
            <input name="fuel" placeholder="استهلاك الوقود" required>

            <input name="seats" placeholder="عدد المقاعد" required>

            <input type="file" name="image" required>

            <button name="add">إضافة السيارة</button>

        </form>

    </div>

</div>