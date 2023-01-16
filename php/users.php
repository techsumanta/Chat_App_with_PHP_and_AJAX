<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE NOT user_id = {$outgoing_id}";
$query = mysqli_query($connect, $sql);
$output = "";

if(mysqli_num_rows($query) == 1) {
    $output .= "No users are available to chat";    
} else {
    include "data.php";       
}
echo $output;
?>