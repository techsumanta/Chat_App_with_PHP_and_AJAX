<?php
session_start();
if(isset($_SESSION['user_id'])) {
    include_once "config.php";
    $logout_id = $_GET['logout_id'];
    if(isset($logout_id)) {
        // $status = 0;
        $sql = "UPDATE users SET status = '0' WHERE user_id = '{$logout_id}'";
        $query = mysqli_query($connect, $sql);
        if($sql) {
            session_unset();
            session_destroy();
            header("location:../login.php");
        } else {
            header("location:../users.php");
        }
    }
} else {
    header("location:../login.php");
}
?>