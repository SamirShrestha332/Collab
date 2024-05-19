<?php
// Connect to your MySQL database
$mysqli = new mysqli("localhost", "root", " ", "infinity");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// If form is submitted, update the product name
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $sql = "UPDATE sub_categories_women SET Name='$name' WHERE ID=$id";

    if ($mysqli->query($sql) === TRUE) {
        echo "<script>
        alert('Record updated successfully');
        </script>";
    } else {
        echo "Error updating record: " . $mysqli->error;
    }
}

// Fetch product details based on ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT ID, Name FROM sub_categories_women WHERE ID=$id");
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post">
    <a href="http://localhost/subucategories/subcatwomen.php">Back</a>
        <input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
        <input type="text" name="name" value="<?php echo $product['Name']; ?>">
        <input type="submit" name="edit" value="Save">
    </form>
</body>
</html>

<?php
$mysqli->close();
?>
