
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_Product</title>
    
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS link  -->
     <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">
            Insert Products
        </h1>

        <!-- form  -->
         <form action="" method="post" enctype="multipart/form-data">
            <!-- first name and last name  -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">First Name</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Your First Name" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Last Name</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Your Last Name" autocomplete="off" required>
            </div>

            <!-- Email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>
            </div>

            <!-- product_keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required>
            </div>

             <!-- Select Category -->
            <div class="form-outline mb-4 w-50 m-auto">
                    
                <select name="product_categories" id=""  class="form-select">
                        <option value="">Select Category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($conn,$select_query);
                        while($row_data=mysqli_fetch_assoc($result_query)){
                            $category_title=$row_data['categorie_title'];
                            $category_id=$row_data['categorie_id'];
                            
                            
                            echo " <option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>

             <!-- Select Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id=""  class="form-select">
                    <option value="">Select Brands</option>
                    <?php
                        $select_qry="Select * from `brands`";
                        $result_qry=mysqli_query($conn,$select_qry);
                        while($row=mysqli_fetch_assoc($result_qry)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo " <option value=''>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>

             <!-- Images -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control"  autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" autocomplete="off" required>
            </div>

             <!-- prices -->
             <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required>
            </div>

             <!-- Submit Button-->
             <div class="form-outline mb-4 w-50 m-auto">
               <input class="btn btn-info mb-3 px-3" type="submit" name="insert_product" value="Insert Product" id="">
            </div>



        </form>
    </div>
</body>
</html>