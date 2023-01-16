<?php
session_start();
    include_once("config.php");

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_check_sql = mysqli_query($connect, "SELECT email FROM users WHERE email = '".$email."'");            
            if(mysqli_num_rows($email_check_sql) > 0) {
                echo "This email already exist";
            } else {
                if(isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];                    
                    $img_tmp_name = $_FILES['image']['tmp_name'];
                    // echo $img_type." and ".$img_tmp_name;

                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);
                    $extensions = ['jpeg', 'jpg', 'png'];

                    if(in_array($img_ext, $extensions) === true) {
                        $time = time();
                        $img_new_name = $time.$img_name;

                        if(move_uploaded_file($img_tmp_name, "images/".$img_new_name)) {
                            $status = 1;
                            $insert_sql = "INSERT INTO users (fname, lname, email, pass, image, status)
                                                VALUES ('".$fname."', '".$lname."', '".$email."', '".$password."', '".$img_new_name."', '1')";
                            // echo $insert_sql;
                            $insert_query = mysqli_query($connect, $insert_sql);                            
                            if($insert_query) {
                                $fetch_sql = "SELECT * FROM users WHERE email = '".$email."'";
                                $fetch_query = mysqli_query($connect, $fetch_sql);
                                if(mysqli_num_rows($fetch_query) > 0) {
                                    $row = mysqli_fetch_assoc($fetch_query);
                                    $_SESSION['user_id'] = $row['user_id'];
                                    echo "success";
                                }
                            } else {
                                echo "Something went wrong!";
                            }
                        }
                    } else {
                        echo "Please select an image file - jpeg, jpg or png";
                    }
                } else {
                    echo "Please select an image";
                }
            }            
        } else {
            echo "Enter a valid e-mail";
        }
    }else{
        echo "All fields required";
    }
    
?>