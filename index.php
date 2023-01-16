<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("location: users.php");
}
?>
<?php include_once "header.php"; ?>

<body>
    
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field input">
                        <label for="firstname">First Name</label>
                        <input type="text" name="fname" placeholder="first Name" required>
                    </div>
                    <div class="field input">
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lname" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter Your Email ID" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Enter Password" required>
                    <i class="fa fa-eye"></i>
                </div>
                <div class="field image">
                    <label for="image">Select Image</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to Chat">
                </div>                
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="js/pass_show_hide.js"></script>
    <script src="js/signup.js"></script>

</body>
</html>