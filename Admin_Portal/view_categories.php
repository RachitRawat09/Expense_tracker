<?php
// Step 1: Database connection
include('../Connect/connect.php');


// Step 2: Fetch all categories from the database
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);

// Step 3: Display categories in HTML format
?>

    <h2 class="text-center" style="overflow:hidden;">View Categories</h2>

        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <!-- Table to display categories -->
                <table class="  table table-bordered table-striped">
                    <thead class="bg-primary text-light">
                        <tr>
                            <th class="text-ceter" >ID</th>
                            <th>Category Name</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Check if there are categories in the result
                        if ($result->num_rows > 0) {
                            // Loop through categories and display them
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['categorie_id'] . "</td>";
                                echo "<td>" . $row['categorie_title'] . "</td>";
                                echo "<td>
                                    <a href='delete_categories.php?id=" . $row['categorie_id'] . "' onclick='return confirm(\"Are you sure you want to delete this category?\");' class='text-danger'>
                                        <i class='fas fa-trash-alt'></i> 
                                    </a>
                                </td>"; // Added delete icon with link to delete script
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