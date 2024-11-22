<?php
if (isset($_POST['insert_product'])) {
    // Capture the form data
    $categorie_id = $_POST['product_category']; // Category ID from dropdown
    $amount = $_POST['amount']; // Amount entered by the user
    $date = $_POST['date']; // Date entered by the user

    // Insert the data into your 'expenses' or relevant table (modify accordingly)
    $insert_query = "INSERT INTO data(categorie_id, amount, date) VALUES ('$categorie_id', '$amount', '$date')";

    // Execute the query and check if it was successful
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        echo "<script>alert('Product inserted successfully');</script>";
    } else {
        echo "<script>alert('Error inserting product: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<form action="" method="post" >
            <!-- title  -->
             <h1 class="text-center">Insert Your Expense</h1>
            <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product Category</label>
            <select name="product_category" id=""  class="form-select" required>
                        <option value="">Select Category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($conn,$select_query);
                        while($row_data=mysqli_fetch_assoc($result_query)){
                            $category_title=$row_data['categorie_title'];
                            $category_id=$row_data['categorie_id'];
                            
                            
                            echo " <option value='$category_title '>$category_title</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="amount" class="form-label">Amount</label>
                <input type="text" name="amount" id="amount" class="form-control" placeholder="Enter Amount" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
               <input class="btn btn-info mb-3 px-3" type="submit" name="insert_product" value="Insert Product" id="">
            </div>
    </form>
  



