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

$sql = "SELECT name, price, image FROM product WHERE product_id = 34"; // Adjust the condition as needed
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $productName = $row["name"];
    $productPrice = $row["price"];
    $productImage = $row["image"]; // Assuming image is stored as BLOB
    // Process the data further if needed
  }
} else {
  echo "No results found.";
}


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product View</title>
    <link rel="stylesheet" href="navstyle.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap"
    />
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
            <a href="http://localhost/Infinity/"><img src="Images/infinity_logo.png" width="90px"></a>
          </div>
          <div class="search-bar">
            <input type="text" placeholder="Search..." />
            <lord-icon
              src="https://cdn.lordicon.com/unukghxb.json"
              trigger="hover"
              colors="primary:#121331,secondary:#f49cc8"
              stroke="bold"
              style="width: 35px"
            ></lord-icon>
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
              <lord-icon
                src="https://cdn.lordicon.com/rsvfayfn.json"
                trigger="hover"
                style="width: 40px"
              ></lord-icon>
            </a>
           
              <lord-icon
              class="carticon"
                src="https://cdn.lordicon.com/odavpkmb.json"
                trigger="hover"
                stroke="bold"
                colors="primary:#121331,secondary:#000"
                style="width: 40px"
              ></lord-icon>
              <span class="count">0</span>
            
          </div>
        </div>
        <div class="cartitems">
                <!-- <div class="item"> 
                     <img src="/product/productimage/cottonshirt.jpg"  width="18.65%" id="img1" alt="product image"/>
                    <p class="productname">Cotton Shirt</p>
                    <p class="cart_item_quantity">1</p>
                    <button ><ion-icon name="close-outline" class="item_cross_btn" ></ion-icon></button>
                    
                </div>
            -->
                 <!-- <div class="item">
                    <img src="/product/productimage/cottonshirt2.png"  width="18.65%"  id="img2"  alt="product image"/>
                    <p class="productname">Cotton Shirt</p>
                    <p class="cart_item_quantity">1</p>
                    <button ><ion-icon name="close-outline" class="item_cross_btn" ></ion-icon></button>
                    
                </div>   -->
            </div>
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
    </div>








    <div class="content-wrapper">
      <!-- Filter Section -->
      <div class="filter-section">
        
        <div class="filter-box">
          <h2>Filters</h2>
          <div class="filter-item">
            <label for="category">Categories:</label>
          </div>
          <div class="filter-item men-dropdown">
            <label for="men">Men's Products:</label>
            <select id="men">
              <option value="pant">Shirt / T-shirt</option>
              <option value="shirt">Pant</option>
              <option value="hoodie">Jacket</option>
              <option value="jacket">Sweater</option>
            </select>
          </div>
          <div class="filter-item women-dropdown">
            <label for="women">Women's Products:</label>
            <select id="women">
              <option value="one-piece">Jeans</option>
              <option value="t-shirt">Top</option>
              <option value="Jacket">Jacket</option>
              <option value="Sweater">Jeans</option>
            </select>
          </div>
          <div class="filter-item unisex-dropdown">
            <label for="unisex">Unisex Products:</label>
            <select id="unisex">
              <option value="hoodie">Hoodie</option>
              <option value="windcheater">Windcheater</option>
              <option value="t-shirt">Sweatshirt</option>
              <option value="jacket">Sweatpants</option>
            </select>
          </div>
          <div class="filter-item">
            <label for="size">Size:</label>
            <div id="size">
              <input type="checkbox" id="small" name="size" value="small" />
              <label for="small">S</label>
              <input type="checkbox" id="medium" name="size" value="medium" />
              <label for="medium">M</label>
              <input type="checkbox" id="large" name="size" value="large" />
              <label for="large">L</label>
              <input
                type="checkbox"
                id="extra-large"
                name="size"
                value="extra-large"
              />
              <label for="extra-large">XL</label>
            </div>
          </div>
          <div class="filter-item">
            <label for="price">Price:</label>
            <select id="price">
              <option value="0-50">$0 - $50</option>
              <option value="50-100">$50 - $100</option>
              <option value="100-200">$100 - $200</option>
            </select>
          </div>
          <div class="filter-item">
            <input type="checkbox" id="newin" name="newin" />
            <label for="newin">New in</label>
          </div>
          <div class="filter-item">
            <input type="checkbox" id="sale" name="sale" />
            <label for="newin">Sale</label>
          </div>
          
        </div>
        
      </div>





      <div class="products-grid">
        <div class="product-card newin">

          <div class="product">
          
          <img src="http://localhost/Infinity/uploads/<?php echo $productImage; ?>" alt="Product Image">
            <h3><?php echo $productName; ?></h3>
            <p>Rs<?php echo $productPrice; ?></p>


            <button class="buy">Buy Now</button>
          </div>

        </div>
        <div class="product-card newin">


          <div class="product">
          
            <img src="images/newin.jpg" class="Product_images" alt="Product 1" />
            <h3>Product Name</h3>
            <p>$100</p>


            <button class="buy">Buy Now</button>
          </div>


        </div>
        <div class="product-card newin">


          <div class="product">
          
            <img src="images/newin.jpg" class="Product_images" alt="Product 1" />
            <h3>Product Name</h3>
            <p>$100</p>


            <button class="buy">Buy Now</button>
          </div>


        </div>


        <!--Men section-->

        <div class="product-card men">

          <div class="product">
          
            <img src="images/men.jpg"class="Product_images" alt="Product 4" />
            <h3>Product Name</h3>
            <p>$100</p>


            <button class="buy">Buy Now</button>
          </div>
          
        </div>


        <div class="product-card men">

          <div class="product">
          
            <img src="images/men.jpg" class="Product_images" alt="Product 4" />
            <h3>Product Name</h3
            <p>$100</p>


            <button class="buy">Buy Now</button>
          </div>

        </div>

        <div class="product-card men">

          <div class="product">
          
            <img src="images/men.jpg" class="Product_images" alt="Product 4" />
            <h3>Product Name</h3
            <p>$100</p>


            <button class="buy">Buy Now</button>
          </div>

        
        </div>
<!--women section-->
        <div class="product-card women">
          <div class="product">
          
            <img src="images/women.jpg" class="Product_images" alt="Product 7">
            <h3>Product Name</h3
            <p>$100</p>


            
            <button class="buy">Buy Now</button>
          </div>

        </div>



        <div class="product-card women">

          <div class="product">
          
            <img src="images/women.jpg" class="Product_images" alt=" Product 7">
            <h3>Product Name</h3
            <p>$100</p>


          
            <button class="buy">Buy Now</button>
          </div>

        </div>

        <div class="product-card women">
          <div class="product">
          
            <img src="images/women.jpg" class="Product_images" alt=" Product 7">
            <h3>Product Name</h3
            <p>$100</p>


           
            <button class="buy">Buy Now</button>
          </div>
        </div>


        <div class="product-card unisex">
          <div class="product">
          
            <img src="images/unisex.jpg" class="Product_images" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


           
            <button class="buy">Buy Now</button>
          </div>
        </div>
        <div class="product-card unisex">
          <div class="product">
          
            <img src="images/unisex.jpg" class="Product_images" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


           
            <button class="buy">Buy Now</button>
          </div>
        </div>
        <div class="product-card unisex">
          <div class="product">
          
            <img src="images/unisex.jpg" class="Product_images" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


          
            <button class="buy">Buy Now</button>
          </div>
        </div>
        <div class="product-card sale">
          <div class="product">
          
            <img src="images/women-dropdown.jpg" class="Product_images" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


            
            <button class="buy">Buy Now</button>
          </div>
        </div>
        <div class="product-card sale">
          <div class="product">
          
            <img src="images/women-dropdown.jpg" class="Product_images" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


            
            <button class="buy">Buy Now</button>
          </div>
        </div>

        <div class="product-card sale">
          <div class="product">
          
            <img src="images/women-dropdown.jpg" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


           
            <button class="buy">Buy Now</button>
          </div>
        </div>
        <div class="product-card unisex-dropdown">
          <div class="product">
          
            <img src="images/unisex.jpg" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


            
            <button class="buy">Buy Now</button>
          </div>
        </div>

        <div class="product-card unisex-dropdown">
          <div class="product">
          
            <img src="images/unisex.jpg" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


            
           
            <button class="buy">Buy Now</button>
          </div>
        </div>
        <div class="product-card unisex-dropdown">

          <div class="product">
          

            <img src="images/unisex.jpg" alt="Product 8" />
            <h3>Product Name</h3
            <p>$100</p>


           
            <button class="buy">Buy Now</button>
          </div>

        </div>
      </div>
    </div>
    <script src="nav.js"></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
  </body>
</html>