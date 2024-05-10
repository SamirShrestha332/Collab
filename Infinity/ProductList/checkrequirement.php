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

    $sql = "SELECT product.*, categories.name AS category_name
            FROM product
            INNER JOIN categories ON product.category_id = categories.category_id
            WHERE categories.category_id IN (1, 2, 3)"; // Adjust the category IDs as needed

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productName = $row["name"];
            $productPrice = $row["price"];
            $productImage = $row["image"];
            $productCategory = $row["category_name"];
            $sizeXL = $row["size_XL"];
            $sizeXXL = $row["size_XXL"];
            $sizeM = $row["size_M"];
            $sizeS = $row["size_S"];
            $description = $row["description"];

            // Set availability of sizes based on quantity in database
            $dataSize = [];
            if ($sizeXL > 0) {
                $dataSize[] = 'XL';
            }
            if ($sizeXXL > 0) {
                $dataSize[] = 'XXL';
            }
            if ($sizeM > 0) {
                $dataSize[] = 'M';
            }
            if ($sizeS > 0) {
                $dataSize[] = 'S';
            }

            // Output product card with dynamic size availability
            $dataSizeAttribute = implode(" ", $dataSize);

            echo "
            <form>
            <div class=\"product-card\" data-category=\"$productCategory\" data-size=\"$dataSizeAttribute\" data-price=\"$productPrice\">
                      <img src='http://localhost/Infinity/uploads/{$productImage}' alt=\"$productName\">
                      <h3>$productName</h3>
                      <p>Rs.<span>$productPrice</span></p>
                      <span> $productCategory</span>
                      <button class=\"buy-now-btn\">Buy Now</button>
                      <button class=\"view-more-btn\">View More</button>
                      <div class=\"back\">
                          <ion-icon name=\"close-circle-outline\" class=\"view-more-btn-close\"></ion-icon>
                          <h3>Product Details</h3>
                          <p>$description</p>
                      </div>
                  </div>
                  </form>";
        }
    } else {
        echo "No results found. <br> <br>";
    }

    // Close connection
    $conn->close();
    ?>
</div>
</body>
</html>