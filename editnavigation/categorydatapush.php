<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = ''; // Replace with your actual password
$dbname = 'infinity';

// Create database connection
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['Category'];
    $subCategory = $_POST['Sub-Category'];
    $productName = $_POST['product-name'];
    $description = $_POST['product-description'];
    $price = floatval($_POST['product-price']);
    $size = $_POST['product-size'];
    $stock = floatval($_POST['product-stock']);

    // Check if file is uploaded
    if (isset($_FILES['product-image']) && $_FILES['product-image']['error'] === UPLOAD_ERR_OK) {
        // Image upload
        $targetDir = 'C:/xampp/htdocs/Infinity/uploads/'; // Define your target directory
        $imageName = uniqid() . '_' . basename($_FILES['product-image']['name']);
        $targetPath = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['product-image']['tmp_name'], $targetPath)) {
            // Image moved successfully
            // Now insert the image filename into the product table
            $product_image_name = $imageName; // Use the generated unique image name

            // Insert product data
            $productSql = "INSERT INTO product (name, price, description, image, size, stock) 
                           VALUES ('$productName', $price, '$description', '$product_image_name', '$size', '$stock')";

            if ($conn->query($productSql) === TRUE) {
                echo "Product added successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Error: No image uploaded.";
    }
}

$conn->close();
?>
