<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infinity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders data
$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .orders-container {
            width: 80%;
            margin: 50px auto;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        .orders-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .orders-table th, .orders-table td {
            padding: 10px 15px;
            text-align: left;
            border: 1px solid #dee2e6;
        }
        .orders-table th {
            background-color: #343a40;
            color: #ffffff;
        }
        .orders-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .orders-table tbody tr:hover {
            background-color: #e9ecef;
        }
        .orders-table td {
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="orders-container">
        <h1>Order List</h1>
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Total Price</th>
                    <th>Payment Type</th>
                    <th>Payment Status</th>
                    <th>User ID</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                            <td><?php echo htmlspecialchars($order['payment_type']); ?></td>
                            <td><?php echo htmlspecialchars($order['payment_status']); ?></td>
                            <td><?php echo htmlspecialchars($order['user_id']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
