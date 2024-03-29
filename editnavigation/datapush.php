<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Enter your MySQL password here
$dbname = "infinity"; // Replace 'yourdatabase' with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and initialize an array to store box values
    $boxes = array();
    for ($i = 1; $i <= 6; $i++) {
        $boxName = "box" . $i;
        if (isset($_POST[$boxName])) {
            $boxes[$i] = $conn->real_escape_string($_POST[$boxName]);
        }
    }

    // Update records in the database
    foreach ($boxes as $id => $box) {
        $updateQuery = "UPDATE nav SET box_name='$box' WHERE id = $id";
        if ($conn->query($updateQuery) !== TRUE) {
            echo "Error updating record: " . $conn->error;
            // Exit loop if an error occurs
            break;
        }
    }
}

    // Check if all records were updated successfully
  
// Close the database connection

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">




<style>
.container{
    display: flex;
    align-items: center;
    justify-content: center;
    height:100vh;
}
.card-header{
    font-weight: bold;
}
.card-body{
     text-align: center;
}
</style>




</head>
<body>

    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($id == 6) {
                echo '<div class="card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Data Strored Sucessfull</div>
                        <div class="card-body text-success">
                            <img src="./logo/tick.png" alt="Success Icon" width="30%">
                            <p class="card-text">Your  Updata has beeen Change  Sucessfully.</p>
                        </div>
                    </div>';
            }
            else{
                echo'
                <div class="card border-danger mb-3" style="max-width: 18rem;">
  <div class="card-header">Fail to Store Data</div>
  <div class="card-body text-danger">
  <img src="./logo/cros.png" alt="Unsucess Icon" width="30%">
    <p class="card-text">Something is Wrong !!!</p>
  </div>';
            }
        }
        else {
            echo "Form data not submitted";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>