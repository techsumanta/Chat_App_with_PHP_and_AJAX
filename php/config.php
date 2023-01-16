<?php
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DB", "chat_app");

    $connect = mysqli_connect(HOST, USER, PASSWORD, DB);
    if($connect == false){
       die("Server Not Found.......");
    }    
?>