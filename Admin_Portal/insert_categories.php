<?php
include('../Connect/connect.php');
if (isset($_POST['insert_cat'])) { //if button clicked
    
    $cat_title = $_POST['cat_title']; //storing values of input fied

    // select data from database 
    $select_query="Select * from `categories` where categorie_title='$cat_title'";
    $result_select=mysqli_query($conn,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This category is present inside the database');</script>";
    }
    else{

            // insert query 

            $insert_query = "INSERT INTO `categories` (categorie_title) VALUES ('$cat_title')";
            $result=mysqli_query($conn,$insert_query);
            if ($result) {
                echo "<script>alert('Category has been inserted successfully');</script>";
            }

        }
    
}
?>

<h2 class="text-center" style="overflow:hidden;">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-2 w-90">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
    <input type="text" class="form-control" placeholder="Insert Categories" name="cat_title" aria-label="Categories" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-2 w-10">
    <input type="Submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="Insert Categories"  >
    
</form>