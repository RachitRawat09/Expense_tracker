<?php
    include('../Connect/connect.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration-Form</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS link  -->
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- User name field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required>
                    </div>
                    <!-- email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required>
                    </div>
                    <!-- image field -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" name="user_image" id="user_image" class="form-control" placeholder="Enter Your Email" autocomplete="off" required>
                    </div>
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Enter Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required>
                    </div>
                    <!-- confirm Passowrd field -->
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
                    </div>
                    <!-- Contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact</label>
                        <input type="number" name="user_contact" id="user_contact" class="form-control" placeholder="Enter Mobile Number" autocomplete="off" required>
                    </div>
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" name="user_register" id="" value="Register" class="bg-info py-2 px-3 border-0" >
                    </div>
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a class="text-danger" href="user_login.php">Login</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
 <?php

 if(isset ($_POST['user_register'])){
    $user_name=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $confirm_password=$_POST['confirm_password'];
    $user_contact=$_POST['user_contact'];
    

    // image uploading 
    $user_image=$_FILES['user_image']['name'];
    // temp folder 
    $tmp_image=$_FILES['user_image']['tmp_name'];

    // select query
    $select_query="Select * from `user_table` where username = '$user_name' or user_email='$user_email'";
    $result=mysqli_query($conn,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){

        echo '<script>alert("username or email is already exist")</script>';

    }else if($user_password!=$confirm_password){
        echo '<script>alert("Password Not Match")</script>';
    }
    
    else{
         // Insert Query
    move_uploaded_file($tmp_image,"./user_images/$user_image");
    $insert_query="INSERT INTO `user_table` ( username, user_email, user_password, user_image, user_mobile) VALUES ('$user_name','$user_email','$user_password','$user_image','$user_contact')";
    $result_query=mysqli_query($conn,$insert_query);
    echo '<script>alert("Register successfully")</script>';
    }

    
 }
 ?>