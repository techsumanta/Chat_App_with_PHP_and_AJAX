<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: login.php");
}
?>
<?php include_once "header.php"; ?>

<body>
    
    <div class="wrapper">
        <section class="chat-area">            
            <header>
                <?php
                include_once "php/config.php";
                $user_id = $_GET['user_id'];
                $sql = "SELECT * FROM users WHERE user_id = '".$user_id."'";
                $query = mysqli_query($connect, $sql);
                if(mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query);
                }                
                ?>
                <a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                <img src="php/images/<?php echo $row['image']; ?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                    <p><?php if($row['status'] == 1) echo "Active now"; ?></p>
                </div>                
            </header>
            
            <div class="chat-box">                                
            </div>
            
            <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['user_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" class="input-msg" name="message" id="message" placeholder="Type your message here..." value="" />                
                <button><i class="fa fa-telegram"></i></button>                
                
            </form>
        </section>
    </div>    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js" integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="js/chat.js"></script>
    <script>
        $('#message').emojioneArea({
            pickerPosition: 'top'
        });
    </script>

</body>
</html>