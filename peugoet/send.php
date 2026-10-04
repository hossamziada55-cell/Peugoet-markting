<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name    = htmlspecialchars($_POST["name"]);
    $email   = htmlspecialchars($_POST["email"]);
    $phone   = htmlspecialchars($_POST["phone"]);
    $message = htmlspecialchars($_POST["message"]);

    
    $to = "hossamziada55@gmail.com";
    $to = "rashadmohamed11234@gmail.com";
    $to = "gehadreda565@gmail.com";
    $to = "doaaapoelmgd@gmail.com";
    $to = "fsvrx7@gmail.com";
    $to = "kareemadel1611@gmail.com";

    $subject = "رسالة جديدة من موقعك";

    $body = "
    الاسم: $name
    البريد: $email
    الهاتف: $phone

    الرسالة:
    $message
    ";

    $headers = "From: $email";

    if(mail($to, $subject, $body, $headers)){
        echo "success";
    } else {
        echo "error";
    }
}
