<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
} else {
    include_once "config.php";    
    $date = date("Y-m-d");
    $outgoing_id = $_POST['outgoing_id'];
    $incoming_id = $_POST['incoming_id'];    
    $message = $_POST['message'];
    
    if(!empty($message)) {
        $sql = "INSERT INTO messages (msg_date, msg_incoming_id, msg_outgoing_id, msg)
                VALUES ('".$date."', '".$incoming_id."', '".$outgoing_id."', '".$message."')";
        $query = mysqli_query($connect, $sql);
        echo $sql;
    }
}

?>