<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("location: users.php");
}
?>
<?php include_once "header.php"; ?>

<body>
    
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-text"></div>                
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter Your Email ID">
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Password">
                    <i class="fa fa-eye"></i>
                </div>                
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>                
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="js/pass_show_hide.js"></script>
    <script src="js/login.js"></script>

</body>
</html>