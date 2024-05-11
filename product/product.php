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
    
    $sql = "SELECT * FROM nav LIMIT 6"; // Replace 'your_table' with your actual table name

    // Execute the query
    $result = $conn->query($sql);
    
    // Initialize an empty string to store the list items
    $listItems = "";
    
    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Add each row's data to the list items string
            $listItems .= "<li><a href='/Infinity/Navgation/nav.html'>" . $row["box_name"] . "</a></li>";
        }
    } else {
        // If less than 6 rows are retrieved, add empty list items to make it 6
        for ($i = 0; $i < 6; $i++) {
            $listItems .= "<li><a href=''>Empty Item</a></li>";
        }
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
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <link rel="stylesheet" href="productstyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
             
              <div class="burger">
                <button onclick="openNav()"><ion-icon name="menu-outline" class="burgericon"  ></ion-icon></button>
               
              </div>
             
                <div class="logo">
                  <a href="/Infinity/index.html"><img src="/Infinity/Images/infinity_logo.png" width="90px"></a>
                </div>
                <div class="search-bar">
                    
                    <input type="text" placeholder="Search...">
                    <lord-icon
    src="https://cdn.lordicon.com/unukghxb.json"
    trigger="hover"
    colors="primary:#121331,secondary:#f49cc8"
    stroke="bold"
    style="width:35px">
                </lord-icon>        
                  
                </div>
                <nav>
                    <ul class="navlinks">
                        <li><a href="#newin">Newin</a></li>
                        <li><a href="#men" class="menindicator">Men</a></li>
                        <li><a href="#women"class="womenindicator">Women</a></li>
                        <li><a href="#unisex"  class="unisexindicator">Unisex</a></li>
                        <li><a href="#Sale">Sale</a></li>
                        <!-- <?php echo $listItems; ?> -->
                       
                    </ul>
                </nav>

                <div class="icons">
                  <a href="#footer">
                    <lord-icon
                    src="https://cdn.lordicon.com/rsvfayfn.json"
                    trigger="hover"
                    style="width:40px ;">
                </lord-icon>
              </a>

              
                <lord-icon
                class="carticon"
                id="carticon"
                src="https://cdn.lordicon.com/odavpkmb.json"
                trigger="hover"
                stroke="bold"
                colors="primary:#121331,secondary:#000"
                style="width:40px">
            </lord-icon>
              
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
            <button onclick="closeNav()"><ion-icon name="close-outline" class="crossbtn" ></ion-icon></button>
            <nav class="menu">
              <ul class="navlinks1">
                  <!-- <li><a href="#newin">New in</a></li>
                  <li><a href="#men"  class="menindicator">Men</a></li>
                  <li><a href="#women">Women</a></li>
                  <li><a href="#unisex">Unisex</a></li>
                  <li><a href="#Sale">Sale</a></li> -->
                  <!-- <?php echo $listItems; ?> -->
                 
              </ul>
          </nav>
          </div>
          <div class="product_container">
           
            <div class="productsection">
              
                <div class="imageside">
                    <div class="imgcontainer">
                        <img id="product_image"src="<?php echo  $productImage ?>" alt="cotton shirt" width="45%">
                    
                    </div>
                    
                    <div class="imgdescription">
                        <h4>Descriprion</h4>
                        <p><?php echo  $productDescription ?></p>
                    </div>
                </div>
                
                <div class="details">
                    <div class="productnameandprice">
                        <h4 id="productname"><?php echo  $productName ?></h4>
                       
                        <div class="productprice">
                        <p>Rs.</p><p class="amount"><?php echo $productPrice ?></p>
                    </div>
                    </div>

                    <div class="Sizes">
                        <h4>Sizes</h4>
                   
                        <div class="sizesection">
                        <div class="size">S</div>
                        <div class="size">XL</div>
                        <div class="size">XXL</div>
                        <div class="size">M</div>
                    </div>
                    </div>
                    <div class="quantitysection">
                        <h4>Quantity</h4>
                        <div class="quantity_btns">
                            <button id="sub_Btn" onclick="subquantity()"><ion-icon name="remove-outline"></ion-icon></button>
                            <span class="quantity" id="num_quantity">1</span>
                            <button id="add_Btn" onclick="addquantity()"><ion-icon name="add-outline"></ion-icon></button>
                        </div>
                </div>
                <div class="totalpricesection">
                    <h4>Total Amount:<?php echo  $productPrice ?></h4>
                     <div class="totalamountsection">
                        <span class="unit">Rs.</span>
                        <span class="totalRs">1200</span>
                     </div>
                </div>


                <div class="cartbuttonsection">
                        <button class="cart_button" onclick="addtocardfun()">Add to Carts <ion-icon name="cart-outline"></ion-icon></button>
                    </div>
                </div>
            </div>
        </d+iv>
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