<?php

// Include your database configuration file
@include 'config.php';

// CSS styles for the orders table
$css = "
    <style>
        .orders-table-container {
            margin-top: 20px;
            overflow-x: auto;
        }

        .orders-table {
            width: 100%;
            border-collapse: collapse;
        }

        .orders-table th, .orders-table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        .orders-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .orders-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .orders-table tr:hover {
            background-color: #ddd;
        }

        .no-orders {
            margin-top: 20px;
            font-style: italic;
            color: #777;
        }

        .go-back-button {
            margin-top: 20px;
            text-align: center;
        }

        .go-back-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .go-back-button a:hover {
            background-color: #45a049;
        }
    </style>
";

echo $css;

// Query to fetch all orders from the database
$select_orders = mysqli_query($conn, "SELECT * FROM `order`");

// Check if there are any orders
if(mysqli_num_rows($select_orders) > 0) {
    echo '<h2>All Orders</h2>';
    echo '<div class="orders-table-container">';
    echo '<table class="orders-table">';
    echo '<tr><th>Name</th><th>Number</th><th>Email</th><th>Method</th><th>Flat</th><th>Street</th><th>City</th><th>State</th><th>Country</th><th>Pin Code</th></tr>';
    
    // Loop through each order and display the details
    while($row = mysqli_fetch_assoc($select_orders)) {
        echo '<tr>';
        echo '<td>'.$row['name'].'</td>';
        echo '<td>'.$row['number'].'</td>';
        echo '<td>'.$row['email'].'</td>';
        echo '<td>'.$row['method'].'</td>';
        echo '<td>'.$row['flat'].'</td>';
        echo '<td>'.$row['street'].'</td>';
        echo '<td>'.$row['city'].'</td>';
        echo '<td>'.$row['state'].'</td>';
        echo '<td>'.$row['country'].'</td>';
        echo '<td>'.$row['pin_code'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
} else {
    echo '<div class="no-orders">No orders found.</div>';
}

?>

<div class="go-back-button">
    <a href="admin.php">Go Back</a>
</div>
