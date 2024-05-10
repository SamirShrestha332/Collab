
<!-- <?php
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




// Close connection

?> -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product View</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap">
</head>
<body>
<!-- Navigation Bar -->
<div class="header">
  <div class="container">
    <div class="navbar">
      <div class="burger">
        <button onclick="openNav()">
          <ion-icon name="menu-outline" class="burgericon"></ion-icon>
        </button>
      </div>
      <div class="logo">
        <a href="http://localhost/Infinity/src"><img src="http://localhost/Infinity//Images/infinity_logo.png" width="80px"></a>
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Search...">
        <lord-icon src="https://cdn.lordicon.com/unukghxb.json" trigger="hover" colors="primary:#121331,secondary:#f49cc8" stroke="bold" style="width: 35px"></lord-icon>
      </div>
      <nav>
        <ul class="navlinks">
          <li><a href="#newin">Newin</a></li>
          <li><a href="#men">Men</a></li>
          <li><a href="#women">Women</a></li>
          <li><a href="#unisex">Unisex</a></li>
          <li><a href="#Sale">Sale</a></li>
        </ul>
      </nav>
      <div class="icons">
        <a href="#footer">
          <lord-icon src="https://cdn.lordicon.com/rsvfayfn.json" trigger="hover" style="width: 40px"></lord-icon>
        </a>
        <lord-icon class="carticon" src="https://cdn.lordicon.com/odavpkmb.json" trigger="hover" stroke="bold" colors="primary:#121331,secondary:#000" style="width: 40px"></lord-icon>
        <span class="count">0</span>
      </div>
    </div>
    <div class="cartitems"></div>
    <div class="closenavdiv">
      <button onclick="closeNav()">
        <ion-icon name="close-outline" class="crossbtn"></ion-icon>
      </button>
      <nav class="menu">
        <ul class="navlinks1">
          <li><a href="#newin">Newin</a></li>
          <li><a href="#men">Men</a></li>
          <li><a href="#women">Women</a></li>
          <li><a href="#unisex">Unisex</a></li>
          <li><a href="#Sale">Sale</a></li>
        </ul>
      </nav>
    </div>
</div>
    <div class="content">
    <!-- Filter Options -->
    <div class="filter-options">
      <label for="category">Category:</label>
      <select id="category">
        <option value="all">All</option>
        <option value="men">Men</option>
        <option value="women">Women</option>
        <option value="unisex">Unisex</option>
      </select>
      <label for="size">Size:</label>
      <select id="size">
        <option value="all">All</option>
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
      </select>
      <label for="price-range-lower">Price Range:</label>
      <input type="number" id="price-range-lower" name="price-range-lower" placeholder="Lower">
      <input type="number" id="price-range-higher" name="price-range-higher" placeholder="Higher">
    </div>
    <!-- Product Cards -->

<!--     
    <div class="product-cards">
        <div class="product-card" data-category="men" data-size="S" data-size="XL" data-price="2000">
          <img src="Men_Cottonshirt.png" alt="Product 1" >
          <h3>Cotton Shirt</h3>
          <p>Rs.<span>2000</span></p>
          <button class="buy-now-btn">Buy Now</button>
          <button class="view-more-btn">View More</button>
          <div class="back">
            <ion-icon name="close-circle-outline" class="view-more-btn-close"></ion-icon>
            <h3>Product Details</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil voluptates asperiores ipsam corrupti doloremque. Nemo perferendis doloremque quibusdam delectus fugit assumenda et.</p>
        </div>
        </div>
        <div class="product-card" data-category="unisex" data-size="XL" data-price="2100">
            <img src="Unisex_sweetshirt.png" alt="Product 2">
            <h3>Unisex Sweat Shirt</h3>
            <p>Rs.<span>2100</span></p>
            <button class="buy-now-btn">Buy Now</button>
            <button class="view-more-btn">View More</button>
            <div class="back">
                <ion-icon name="close-circle-outline" class="view-more-btn-close"></ion-icon>
                <h3>Product Details</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores possimus saepe natus dolor omnis laudantium iure, exercitationem accusamus aperiam obcaecati voluptatum quae dignissimos .</p>
            </div>
          </div>
        <div class="product-card" data-category="women" data-size="M" data-price="3000">
          <img src="Women_Jacket.png" alt="Product 3">
          <h3>Women Jacket</h3>
          <p>Rs.<span>3000</span></p>
          <button class="buy-now-btn">Buy Now</button>
          <button class="view-more-btn">View More</button>
          <div class="back">
            <ion-icon name="close-circle-outline" class="view-more-btn-close"></ion-icon>
            <h3>Product Details</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam harum in possimus illo! Sequi aliquid perferendis culpa ipsum neque, vero at earum, sunt quos esse sed. Optio numquam inventore dolores.</p>
        </div>
        </div>
        <div class="product-card" data-category="unisex" data-size="XXL" data-price="2500">
          <img src="Unisex_Hoddie.png" alt="Product 4">
          <h3>Unisex Hoddies</h3>
          <p>Rs.<span>2500</span></p>
          <button class="buy-now-btn">Buy Now</button>
          <button class="view-more-btn">View More</button>
          <div class="back">
            
            <ion-icon name="close-circle-outline" class="view-more-btn-close"></ion-icon>
            <h3>Product Details</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, assumenda? Esse molestias voluptatibus ducimus corrupti, aliquam fugiat debitis repellendus id cupiditate laborum nemo. </p>
        </div>
        </div>
      </div> -->



      <div class="product-cards">
    <?php
   

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
            
            <form action='checkrequirement.php'>
            <div class='product-card' data-category='$productCategory' data-size='$dataSizeAttribute' data-price='$productPrice'>
                      <img src='http://localhost/Infinity/uploads/{$productImage}' alt='$productName'>
                      <h3>$productName</h3>
                      <p>Rs.<span>$productPrice</span></p>
                      <button class='buy-now-btn'>Buy Now</button>
                      <button class='view-more-btn'>View More</button>
                      <div class='back'>
                          <ion-icon name='close-circle-outline' class='view-more-btn-close'></ion-icon>
                          <h3>Product Details</h3>
                          <p>$description</p>
                      </div>
                  </div>
            </form>  ";
        }
    } else {
        echo "No results found. <br> <br>";
    }

    // Close connection
    $conn->close();
    ?>
</div> 

         </div>
      </div>
  
</div>
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</body>
</html>