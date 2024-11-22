<?php
// Step 1: Database connection
include('Connect/connect.php');


// Step 2: Fetch all categories from the database
$sql = "SELECT * FROM data";
$result = $conn->query($sql);

// Step 3: Display categories in HTML format
?>

    <h2 class="text-center" style="overflow:hidden;">History</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <!-- Table to display categories -->
                <table class="  table table-bordered table-striped">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th class="text-ceter" >S No.</th>
                            <th>Product_Id</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if there are categories in the result
                        if ($result->num_rows > 0) {
                            // Loop through categories and display them
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['product_id'] . "</td>";
                                echo "<td>" . $row['categorie_id'] . "</td>";
                                echo "<td>" . $row['amount'] . "</td>";
                                echo "<td>" . $row['Date'] . "</td>";
                               
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='text-center'>No categories found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>