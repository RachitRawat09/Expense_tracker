<?php
// Step 1: Database connection
include('../Connect/connect.php');

// Step 2: Fetch all data from the database, grouping by month to show monthly comparison
$sql = "SELECT SUM(amount) as total_amount, DATE_FORMAT(Date, '%Y-%m') as month 
        FROM data 
        GROUP BY month";
$result = $conn->query($sql);

// Prepare arrays for chart data
$amounts = [];
$months = [];

while ($row = $result->fetch_assoc()) {
    $amounts[] = $row['total_amount'];
    $months[] = $row['month'];  // Storing data in Y-m format (Year-Month)
}
?>
<!-- Chart for Amount Over Time -->
<div class="container my-5">
    <h3 class="text-center" style="overflow:hidden">Amount Over Time (Monthly)</h3>
    <canvas id="historyChart" width="200" height="100"></canvas>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart.js Script -->
<script>
var ctx = document.getElementById('historyChart').getContext('2d');
var historyChart = new Chart(ctx, {
    type: 'bar',  // Use 'bar' for monthly comparison, you can switch back to 'line' if needed
    data: {
        labels: <?php echo json_encode($months); ?>,  // Months from PHP
        datasets: [{
            label: 'Total Amount',
            data: <?php echo json_encode($amounts); ?>,  // Amounts from PHP
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Amount'
                }
            }
        }
    }
});
</script>
