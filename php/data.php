<?php
 while($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages
                                    WHERE (msg_incoming_id = {$row['user_id']} OR msg_outgoing_id = {$row['user_id']})
                                    AND (msg_incoming_id = {$outgoing_id} OR msg_outgoing_id = {$outgoing_id})
                                    ORDER BY msg_id DESC LIMIT 1";                                        
                                    
    $query2 = mysqli_query($connect, $sql2);        
    $row2 = mysqli_fetch_assoc($query2);        
    
    // if(mysqli_num_rows($query2) > 0) {
    //     $result = $row2['msg'];
    // } else {
    //     $result = "No message available";
    // }
    
    if(mysqli_num_rows($query2) == 0) {
        $you = "";
        $result = "No message available";
    } else {
        if($outgoing_id == $row2['msg_outgoing_id']) {
            $you = "You: ";
        } else {
            $you = "";
        }            
        $result = $row2['msg'];
    }
    
    (strlen($result) > 28) ? $msg = substr($result, 0 ,28).'...' : $msg = $result;        
    
    ($row['status'] == 0) ? $offline = "offline" : $offline = "";

    $output .= '<a href="./chat.php?user_id='.$row['user_id'].'">
                    <div class="content">
                        <img src="php/images/'.$row['image'].'" alt="">
                        <div class="details">
                            <span>'.$row['fname']." ".$row['lname'].'</span>
                            <p>'.$you.$msg.'</p>
                        </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fa fa-circle"></i></div>
                </a>';
} 
?>