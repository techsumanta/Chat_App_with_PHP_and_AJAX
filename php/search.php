<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['user_id'];
$searchName = $_POST['searchName'];
$output = "";
$sql = "SELECT * FROM users WHERE NOT user_id = {$outgoing_id} AND (fname LIKE '%{$searchName}%' OR lname LIKE '%{$searchName}%')";
// echo $sql;
$query = mysqli_query($connect, $sql);
if(mysqli_num_rows($query) > 0) {
    include "data.php";
} else {
    $output.= "Search Result not found";
}
echo $output;
?>