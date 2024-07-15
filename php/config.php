<?php
    $conn = mysqli_connect("localhost", "root", "", "chat");
    if(!$conn){
        echo "veritabanına bağlandı." . mysqli_connect_error();
    }
?>