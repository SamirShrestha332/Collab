<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<div class="product-cards">
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
    
  
    
    // checkrequirement.php
    
    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the product details from the form submission
        $productDescription = $_POST["product_description"];
        $productName = $_POST["product_name"];
        $productImage = $_POST["product_image"];
        $productSize = $_POST["product_size"];
        $productPrice = $_POST["product_price"];
        // Retrieve sizes from the form submission
        $sizeS = $_POST["sizeS"];
        $sizeXL = $_POST["sizeXL"];
        $sizeXXL = $_POST["sizeXXL"];
        $sizeM = $_POST["sizeM"];
    
        // Now you can use the retrieved product details and sizes as needed
        // For example, you can echo or process each product detail and size
        // echo "Product Description: " . $productDescription . "<br>";
        // echo "Product Name: " . $productName . "<br>";
        // echo "<img src=' $productImage'<br>";
        // echo "Product Size: " . $productSize . "<br>";
        // echo "Product Price: " . $productPrice . "<br>";
        // echo "Size S: " . $sizeS . "<br>";
        // echo "Size XL: " . $sizeXL . "<br>";
        // echo "Size XXL: " . $sizeXXL . "<br>";
        // echo "Size M: " . $sizeM . "<br>";
        // Or perform any other actions with the product details and sizes
    }
    ?>
    
    
    
    
    
    
</div>
</body>
</html>