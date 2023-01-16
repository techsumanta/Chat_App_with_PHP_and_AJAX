<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("location: login.php");
}

include_once "php/config.php";

$sql = "SELECT * FROM users WHERE user_id = '".$_SESSION['user_id']."'";
$query = mysqli_query($connect, $sql);
if(mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}
?>
<?php include_once "header.php"; ?>

<body>
    
    <div class="wrapper">
        <section class="users">            
            <header>
                <div class="content">
                    <img src="php/images/<?php echo $row['image']; ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']." ".$row['lname']; ?></span>
                        <p><?php if($row['status'] == 1) echo "Active now"; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['user_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an User to start Chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fa fa-search"></i></button>
            </div>
            <div class="users-list">                                
            </div>
        </section>
    </div>

    <script src="js/users.js"></script>
</body>
</html>