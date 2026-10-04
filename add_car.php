<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['add'])){

    $user_id = $_SESSION['user_id'];

    $car_name = $_POST['car_name'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $mileage = $_POST['mileage'];
    $fuel_type = $_POST['fuel_type'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];

    function upload($img){
        $name = $_FILES[$img]['name'];
        $tmp = $_FILES[$img]['tmp_name'];
        move_uploaded_file($tmp,"uploads/".$name);
        return $name;
    }

    $img1 = upload("image1");
    $img2 = upload("image2");
    $img3 = upload("image3");
    $img4 = upload("image4");

    $stmt = $conn->prepare("
    INSERT INTO users_cars
    (user_id, car_name, brand, model, year, price, mileage, fuel_type, phone, whatsapp, image1, image2, image3, image4)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)
    ");

    $stmt->bind_param("isssssssssssss",
        $user_id,$car_name,$brand,$model,$year,$price,$mileage,
        $fuel_type,$phone,$whatsapp,$img1,$img2,$img3,$img4
    );

    $stmt->execute();

    header("Location: home.php");
}
?>

<link rel="stylesheet" href="add_car.css">

<div class="form-container">

<h2>🚗 إضافة سيارة جديدة</h2>

<form method="POST" enctype="multipart/form-data">

<div class="form-grid">

<input name="car_name" placeholder="اسم العربية" required>
<input name="brand" placeholder="الماركة" required>

<input name="model" placeholder="الموديل" required>
<input name="year" placeholder="السنة" required>

<input name="price" placeholder="السعر" required>
<input name="mileage" placeholder="الكيلومترات" required>

<input name="fuel_type" placeholder="نوع الوقود" required>
<input name="phone" placeholder="رقم الهاتف" required>

<input name="whatsapp" placeholder="واتساب" class="full" required>

<input type="file" name="image1" class="full" required>
<input type="file" name="image2" class="full">
<input type="file" name="image3" class="full">
<input type="file" name="image4" class="full">

</div>

<br>

<button name="add">🚀 نشر العربية</button>

</form>

</div>