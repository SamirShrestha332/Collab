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
    $price = $_POST['product-price'];

    $size_xl = $_POST['size_xl'];
    $size_xxl = $_POST['size_xxl'];
    $size_m = $_POST['size_m'];
    $size_s = $_POST['size_s'];
    $totalStock = $size_xl + $size_xxl + $size_m + $size_s;
    $subcategoriesid_men = null;
    $subcategoriesid_women = null;
    $subcategoriesid_unisex = null;

    if ($category == 'Men') {
        $stmt = $conn->prepare("SELECT ID FROM sub_categories_men WHERE Name = ?");
    } elseif ($category == 'Women') {
        $stmt = $conn->prepare("SELECT ID FROM sub_categories_women WHERE Name = ?");
    } elseif ($category == 'Unisex') {
        $stmt = $conn->prepare("SELECT ID FROM sub_categories_unisex WHERE Name = ?");
    }

    if ($stmt) {
        $stmt->bind_param("s", $subCategory);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($category == 'Men') {
                $subcategoriesid_men = $row['ID'];
            } elseif ($category == 'Women') {
                $subcategoriesid_women = $row['ID'];
            } elseif ($category == 'Unisex') {
                $subcategoriesid_unisex = $row['ID'];
            }
        }
        $stmt->close();
    }

    // Query to select category ID based on category name
    $categoryQuery = "SELECT category_id FROM categories WHERE name = ?";
    $categoryStmt = $conn->prepare($categoryQuery);
    $categoryStmt->bind_param("s", $category);
    $categoryStmt->execute();
    $categoryResult = $categoryStmt->get_result();

    if ($categoryResult->num_rows > 0) {
        $row = $categoryResult->fetch_assoc();
        $categoryId = $row['category_id'];

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
                $productSql = "INSERT INTO product (name, price, description, category_id, image, sub_category_men_id, sub_category_women_id, sub_category_unisex_id, stock, size_XL, size_XXL, size_M, size_S) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($productSql);
                $stmt->bind_param("sdsisiiiiiiii", $productName, $price, $description, $categoryId, $product_image_name, $subcategoriesid_men, $subcategoriesid_women, $subcategoriesid_unisex, $totalStock, $size_xl, $size_xxl, $size_m, $size_s);
                if ($stmt->execute()) {
                    echo "Product added successfully!";
                } else {
                    echo "Error: " . $conn->error;
                }
                $stmt->close();
            } else {
                echo "Error uploading image.";
            }
        } else {
            echo "Error: No image uploaded.";
        }
    } else {
        echo "Error: Category not found.";
    }
    $categoryStmt->close();
}

$conn->close();
?>
