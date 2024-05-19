<!-- search.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search</title>
</head>
<body>
    <h1>Product Search</h1>
    <form method="post" action="search.php">
        <input type="text" name="search" placeholder="Search products...">
        <input type="submit" value="Search">
    </form>

    <?php
    // Database connection (replace with your actual credentials)
    $host = "192.168.1.94";
    $username = "root";
    $password = "";
    $dbname = "infinity";

    $conn = mysqli_connect($host, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Process search query
    if (isset($_POST['search'])) {
        $searchQuery = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM product WHERE name LIKE '%$searchQuery%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . $row['name'] . "</li>";
                echo "<li>" . $row['price'] . "</li>";
                echo "<li>" . $row['description'] . "</li>";
                echo "<li>" . $row['size_S'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No results found.";
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>
