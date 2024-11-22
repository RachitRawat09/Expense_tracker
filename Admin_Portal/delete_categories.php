<?php
                // Database connection
                include('../Connect/connect.php');
                // Fetch categories
                if (isset($_GET['id'])) {
                    $category_id = $_GET['id'];
                
                    // Step 1: Delete the category
                    $sql_delete = "DELETE FROM categories WHERE categorie_id = $category_id";
                
                    if ($conn->query($sql_delete) === TRUE) {
                        // Step 2: Re-sequence the category IDs
                
                        // Fetch all categories, ordered by the current category_id
                        $sql_fetch_all = "SELECT * FROM categories ORDER BY categorie_id";
                        $result = $conn->query($sql_fetch_all);
                
                        // Initialize new ID counter
                        $new_id = 1;
                
                        // Loop through each category and update its ID
                        while ($row = $result->fetch_assoc()) {
                            $old_id = $row['categorie_id'];
                
                            // Update each category's ID to be sequential
                            $sql_update_id = "UPDATE categories SET categorie_id = $new_id WHERE categorie_id = $old_id";
                            $conn->query($sql_update_id);
                
                            // Increment new ID counter
                            $new_id++;
                        }
                
                        // Step 3: Reset the auto-increment value to the next available ID
                        $sql_reset_ai = "ALTER TABLE categories AUTO_INCREMENT = $new_id";
                        $conn->query($sql_reset_ai);
                
                        echo "<script>
                            alert('Category deleted successfully');
                            window.location.href = 'index.php?view_categories';
                        </script>";
                    } else {
                        echo "<script>
                            alert('Error deleting category');
                            window.location.href = 'index.php?view_categories';
                            
                        </script>";
                    }
                }
                
                // Close connection
                $conn->close();
                
                ?>