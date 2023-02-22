<?php
    $to = "yash.mangate1@gmail.com";
    $subject = "Test email via PHP";
    $message = "test";
    $headers = "From: yash.hosting1@gmail.com";

    if(mail($to, $subject, $message, $headers)){
        echo "<h1>Mail sent successfully</h1>";
    }else{
        echo "<h1>Mission Abort</h1>";
    }
?>