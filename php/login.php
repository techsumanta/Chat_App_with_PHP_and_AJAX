<?php
session_start();
include_once("config.php");

$email = $_POST['email'];
$password = $_POST['password'];

if(!empty($email) && !empty($password)) {
    $sql = "SELECT * FROM users WHERE email = '".$email."' AND pass = '".$password."'";
    $query = mysqli_query($connect, $sql);
    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $sql2 = "UPDATE users SET status = '1' WHERE user_id = '{$row['user_id']}'";
        $query2 = mysqli_query($connect, $sql2);
        if($query2) {
            $_SESSION['user_id'] = $row['user_id'];
            echo "success";
        }        
    } else {
        echo "Email or password incorrect";
    }

} else {
    echo "All fields required";
}

?>