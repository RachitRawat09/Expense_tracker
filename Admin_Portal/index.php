<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboeard</title>
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS link  -->
     <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- navbar  -->
     <div class="container-fluid  p-0">
        <!-- first child  -->
        <div class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" class="logo" alt="">
                <div class="navbar navbar-expand-lg">
                    <div class="navbar-nav">
                        <div class="nav-item">
                            <a href="" class="nav-link">Welcome User !!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- second child  -->
         <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
         </div>

         <!-- third child  -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center justify-content-around">
                <div>
                    <a href="#"><img src="https://img.freepik.com/free-vector/vegetables-icons-set_1284-21276.jpg" class="admin_image" alt="..."></a>
                    <p class="text-light text-center">Hello User !!</p>
                </div>
                <div class="button text-center">

                    <button><a href="../index.php" class="nav-link text-light bg-info my-1"> Home </a></button>
                   
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert-Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View-Categories</a></button>
                    <button><a href="index.php?history" class="nav-link text-light bg-info my-1">History</a></button>
                   
                    
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

     </div>

     <!-- fourth child -->
      <div class="container my-5">
        <?php
        if(isset($_GET['insert_categories'])){
            include('insert_categories.php');
        }
        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['history'])){
            include('history.php');
        }
        ?>
      </div>

      

  <!-- bootstrap js link  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>