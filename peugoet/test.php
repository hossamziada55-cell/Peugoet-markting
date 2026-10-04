<?php
include "db.php";

echo "<pre>";

$result = $conn->query("SELECT * FROM users_cars");

if(!$result){
    die("Error: " . $conn->error);
}

while($row = $result->fetch_assoc()){
    print_r($row);
}

echo "</pre>";
?>