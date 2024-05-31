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

// Process form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];

    // Update the is_hidden value to 1 for the given product name
    $stmt = $conn->prepare("UPDATE product SET is_hidden = 1 WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        // Display a success alert using JavaScript
        echo '<script>alert("Record Delete successfully");</script>';
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}

// Fetch data from the database (excluding hidden rows)
$sql = "SELECT * FROM product WHERE is_hidden = 0";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
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
        form {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #343a40;
        }
        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .products-table th, .products-table td {
            padding: 10px 15px;
            text-align: left;
            border: 1px solid #dee2e6;
        }
        .products-table th {
            background-color: #343a40;
            color: #ffffff;
        }
        .products-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .products-table tbody tr:hover {
            background-color: #e9ecef;
        }
        .products-table td {
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/editnavigation/">Back</a>
        <h1>Product Management</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="productname">Product ID:</label>
                <input type="text" id="productname" name="product_id" required>
            </div>
            <input type="submit" value="Delete Product">
        </form>

        <h2>Product List</h2>
        <table class="products-table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                   
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['product_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['price']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
