<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Form</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS link  -->
     <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container-fluid my-3">
        <h2 class="text-center">User Login </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6 mt-5">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- User name field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter Your Username" autocomplete="off" required>
                    </div>
        
                    <!-- password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Enter Password</label>
                        <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required>
                    </div>
                   
                    <div class="text-center mt-4 pt-2">
                        <input type="submit" name="user_login" id="" value="Login" class="bg-info py-2 px-3 border-0" >
                    </div>
                    <p class="small fw-bold mt-2 pt-1">Don't have an account? <a class="text-danger" href="user_registration.php">Register</a> </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- php code -->
 <?php
    include('../Connect/connect.php');
    if(isset($_POST['user_login'])){
        $user_username=$_POST['user_username'];
        $user_password=$_POST['user_password'];

        $select_query="Select * from `user_table` where username = '$user_username'";
        $result=mysqli_query($conn , $select_query);
        $row=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        if($row>0){
                if(password_verify($user_password,$row_data['user_password'])){
                    echo '<script>alert("Login Sucessfully")</script>';
                }else{
                    echo '<script>alert("Invalid Credentials")</script>';
                } 
        }else{
            echo '<script>alert("Invalid Credentials")</script>';
        }
    }
 ?>
