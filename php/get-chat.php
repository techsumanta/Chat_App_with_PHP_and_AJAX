<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: ../login.php");
} else {
    include_once "config.php";
    $outgoing_id = $_POST['outgoing_id'];
    $incoming_id = $_POST['incoming_id'];
    $message = $_POST['message'];
    $output = "";

    $sql = "SELECT * FROM messages
            LEFT JOIN users ON users.user_id = {$incoming_id}
            WHERE (msg_incoming_id = {$incoming_id} AND msg_outgoing_id = {$outgoing_id})
            OR (msg_incoming_id = {$outgoing_id} AND msg_outgoing_id = {$incoming_id}) ORDER BY msg_id";    
            
    $query = mysqli_query($connect, $sql);

    if(mysqli_num_rows($query) > 0) {        
        while($row = mysqli_fetch_assoc($query)) {
            if($row['msg_outgoing_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'.$row['msg'].'</p>
                                </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['image'].'" alt="">
                                <div class="details">
                                    <p>'.$row['msg'].'</p>
                                </div>
                            </div>';
            }             
        }
        echo $output;
    }
}

?>