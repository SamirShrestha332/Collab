<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = ""; // Update password if applicable
$dbname = "infinity";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user inputs
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Function to handle insertion of a new product
function insert_product($conn, $table, $name, $category_id) {
    $name = sanitize_input($name);

    // Validate input fields
    if (empty($name)) {
        echo "Product name is empty.";
        return;
    }

    // Set is_hidden to 0 for newly added products
    $is_hidden = 0;

    $sql = "INSERT INTO $table (Name, is_hidden, category_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $name, $is_hidden, $category_id);
    
    if ($stmt->execute()) {
        echo "New record created successfully";
        // Refresh the page to display the newly added product
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch category ID for Men category
$category_name = 'Men';
$stmt = $conn->prepare("SELECT category_id FROM categories WHERE name = ?");
$stmt->bind_param("s", $category_name);
$stmt->execute();
$stmt->bind_result($category_id);
$stmt->fetch();
$stmt->close();

// Handle insertion of a new product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $category_id = 1; // Replace 1 with the actual category ID from the categories table
    insert_product($conn, "sub_categories_men", $product_name, $category_id);
}

// Handle insertion of a new product
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    insert_product($conn, "sub_categories_men", $product_name);
}

// Get the selected ID from the URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

// Update the is_hidden value to 1
$stmt = $conn->prepare("UPDATE sub_categories_men SET is_hidden = 1 WHERE ID = ?");
$stmt->bind_param("i", $id); // Assuming ID is an integer
if ($stmt->execute()) {
    // Display a success alert using JavaScript
    echo '<script>alert("Record hidden successfully");</script>';
} else {
    echo "Error updating record: " . $stmt->error;
}
$stmt->close();
}

// Fetch data from the database (excluding hidden rows)
$sql = "SELECT * FROM sub_categories_men WHERE is_hidden = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Product Management</h2>

        <!-- Form to add a new product -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" id="product_name">
            <input type="submit" name="add_product" value="Add Product">
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // Output data of each visible row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["ID"] . "</td>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>
                                <a href='editmen.php?id=" . $row["ID"] . "'>Edit</a> |
                                <a href='?id=" . $row["ID"] . "'>Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No visible results";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
