<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    die("🚫 غير مسموح");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

// 🧠 جلب بيانات العربية
$stmt = $conn->prepare("SELECT * FROM users_cars WHERE id=? AND user_id=?");
$stmt->bind_param("ii",$id,$user_id);
$stmt->execute();
$car = $stmt->get_result()->fetch_assoc();

if(!$car){
    die("🚫 غير مسموح");
}

// 🔥 تحديث البيانات
if(isset($_POST['update'])){

    $car_name = $_POST['car_name'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $mileage = $_POST['mileage'];
    $fuel_type = $_POST['fuel_type'];
    $phone = $_POST['phone'];
    $whatsapp = $_POST['whatsapp'];

    // 🖼️ رفع الصور (لو اتغيرت)
    function upload($file, $old){
        if(!empty($_FILES[$file]['name'])){
            $name = time() . "_" . $_FILES[$file]['name'];
            $tmp = $_FILES[$file]['tmp_name'];
            move_uploaded_file($tmp, "uploads/".$name);
            return $name;
        }
        return $old;
    }

    $image1 = upload("image1", $car['image1']);
    $image2 = upload("image2", $car['image2']);
    $image3 = upload("image3", $car['image3']);
    $image4 = upload("image4", $car['image4']);

    $stmt = $conn->prepare("
        UPDATE users_cars 
        SET car_name=?, brand=?, model=?, year=?, price=?, mileage=?, fuel_type=?, phone=?, whatsapp=?, image1=?, image2=?, image3=?, image4=?
        WHERE id=? AND user_id=?
    ");

    $stmt->bind_param(
        "ssssssssssssssi",
        $car_name, $brand, $model, $year, $price, $mileage,
        $fuel_type, $phone, $whatsapp,
        $image1, $image2, $image3, $image4,
        $id, $user_id
    );

    $stmt->execute();

    // 🚀 أهم سطر (حل ERR_CACHE_MISS)
    header("Location: home.php");
    exit();
}
?>

<link rel="stylesheet" href="edit_car.css">

<div class="form-container">

<h2>✏️ تعديل العربية</h2>

<form method="POST" enctype="multipart/form-data">

<div class="form-grid">

<input name="car_name" value="<?php echo $car['car_name']; ?>" required>
<input name="brand" value="<?php echo $car['brand']; ?>" required>

<input name="model" value="<?php echo $car['model']; ?>" required>
<input name="year" value="<?php echo $car['year']; ?>" required>

<input name="price" value="<?php echo $car['price']; ?>" required>
<input name="mileage" value="<?php echo $car['mileage']; ?>" required>

<input name="fuel_type" value="<?php echo $car['fuel_type']; ?>" required>
<input name="phone" value="<?php echo $car['phone']; ?>" required>

<input name="whatsapp" value="<?php echo $car['whatsapp']; ?>" class="full">

<!-- الصور -->
<input type="file" name="image1" class="full">
<input type="file" name="image2" class="full">
<input type="file" name="image3" class="full">
<input type="file" name="image4" class="full">

</div>

<br>

<button name="update">💾 حفظ التعديلات</button>

</form>

</div>
