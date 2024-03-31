<?php
// Database connection parameters
$servername = "localhost"; // Replace with your server name or IP address
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "infinity"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";




// SQL query to retrieve data (limit to 6 rows)
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
        $listItems .= "<li><a href=''>" . $row["box_name"] . "</a></li>";
    }
} else {
    // If less than 6 rows are retrieved, add empty list items to make it 6
    for ($i = 0; $i < 6; $i++) {
        $listItems .= "<li><a href=''>Empty Item</a></li>";
    }
}


// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce website</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
            
                <div class="logo">
                    <img src="images/infinity_logo.png" width="90px">
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
                    <ul>
                        <!-- <li><a href="#newin">New in</a></li>
                        <li><a href="#men">Men</a></li>
                        <li><a href="#women">Women</a></li>
                        <li><a href="#unisex">Unisex</a></li>
                        <li><a href="#Sale">Sale</a></li> -->
                        <?php echo $listItems; ?>
                       
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

              <a href="">
                <lord-icon
                src="https://cdn.lordicon.com/odavpkmb.json"
                trigger="hover"
                stroke="bold"
                colors="primary:#121331,secondary:#000"
                style="width:40px">
            </lord-icon>
              </a>
                </div>
               
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Your Fashion Adventure Begins Here.<br> Welcome!</h1>
                    <p>Step into a world where style is elevated and comfort is always guaranteed.<br>We invite you to explore our collection of clothing for men and women,
                        <br> designed to help you express your unique personality through fashion.</p>
                    <a href="" class="btn">Explore Now &#8594;</a>
                </div>
              
              <!--Slider of images-->
                <div class="slideshow-container">
                  <div class="mySlides fade">
                    <img src="images/unisexphoto.png" style="width:400px">
                  </div>

                  <div class="mySlides fade">
                    <img src="images/menphotto.png" style="width:400px">
                  
                  </div>

                  <div class="mySlides fade">
                  
                    <img src="images/womenphoto.png" style="width:400px">
                  
                  </div>

              </div>
              <br>

            <div class="dotss" style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>
            </div>
            
        </div>
    </div>

   <!--catergories sections-->     
   <div class="categories">
   
<h2>Categories</h2>


<div class="flex_item">
  <div class="column">
    <img src="images/men.png" alt="men" class="category_image" id="menimage">
    <button id="menbutton"  >men</button>
  </div>
  <div class="column">
    <img src="images/unisex.png" alt="unisex" class="category_image" id="uniseximage">
    <button id="unisexbutton">Unisex</button>
  </div>
  <div class="column">
    <img src="images/women.png" alt="female" class="category_image"id="womenimage">
    <button id="womenbutton">Women</button>
  </div>
</div>
    </div>





    
      



    <div class="assetscontainer">
      <div class="assets_title">
        <h1>!!Our Assets!!</h1> 
      </div>
      <div class="assets"> 
        <div class="items">

          <img src="assets/rectangle1.jpg" loading="lazy" style="width:100%">

          <img src="assets/straight_rectangle7.jpg"  loading="lazy"     style=" width:100%">

          
        </div>
        <div class="items">
          <img src="assets/straight_rectangle1.jpg"  loading="lazy" style="width:100%">
          <img src="assets/rectangle2.jpg" loading="lazy" style="width:100%">
          <img src="assets/straight_rectangle2.jpg"  loading="lazy"  style="width:100%">
         
        </div>  
        <div class="items">
          <img src="assets/straight_rectangle3.jpg" loading="lazy"  style="width:100%">
          <img src="assets/straight_rectangle4.jpg" loading="lazy"   style="width:100%">
          <img src="assets/rectangle3.jpg" style="width:100%">
         
        </div>
        <div class="items">
          <img src="assets/rectangle4.jpg" style="width:100%">
          <img src="assets/straight_rectangle5.jpg" style="width:100%">
          <img src="assets/straight_rectangle6.jpg" style="width:100%">
        
        </div>
      </div>
      </div>

    <!--offer-->
    



   <div class="offer_container">
    <div class="offer_title">
      <h1>!!Offer!!</h1>
    </div>

    <div class="offersection">

      <div class="offer">
       <img src="offer/offerimage1.jpg" class="offer-img" alt="offerimage" width="100%">
       <div class="offerbody">
        <h2>Grab the Huge discount!!!</h2>
        <p> Discount up to 20% on  all products in our store .</p>

        <button class="offer-button">Learn more</button>
       </div>
      </div>
      
      <div class="offer">
      <img src="offer/offerimage2.jpg" alt="offerimage" width="100%">
      <div class="offerbody">
        <h2>Grab the Huge discount!!!</h2>
        <p> Discount up to 30%  for the New Customer.</p>
        <button>Learn more</button>
      </div>
      </div>

      <div class="offer">
        <img src="offer/offerimage3.jpg" alt="offerimage" width="100%">
        <div class="offerbody">
          <h2>Grab Buy One Get One Free!!!</h2>
          <p> Discount up to 30%  for the New Customer.</p>
          <button>Learn more</button>
        </div>
        </div>
      
    </div>

  </div>



    
      <!--footer-->

      <footer class="section__container footer__container" id="footer">
        <div class="footerbody">
        <div class="footer__col">
          <h4 class="footer__heading">CONTACT INFO</h4>
          <p>
            <ion-icon name="location-outline" width="50px"></ion-icon> Kathmandu, Nepal
          </p>
          <p>
            <ion-icon name="mail-open-outline"></ion-icon> infinitydress7090@gmail.com
        </p>
        <p>
          <ion-icon name="phone-portrait-outline"></ion-icon> 9878685848
        </p>
        <p>

          <ion-icon name="call-outline"></ion-icon> 01896754
        </p>
        </div>

        <div class="footer__col">
          <h4 class="footer__heading">COMPANY</h4>
          <p>Home</p>
          <p>About Us</p>
          <p>Our Blog</p>
          <p>Terms & Conditions</p>
        </div>
        <div class="footer__col">
          <h4 class="footer__heading">USEFUL LINK</h4>
          <p>Help</p>
          <p>Men</p>
          <p>Women</p>
          <p>Unisex</p>
        </div>
        <div class="footer__col">
          <h4 class="footer__heading">INSTAGRAM</h4>
          <div class="instagram__grid">
<a href="https://www.instagram.com/_elysian.97/" target="_blank"><ion-icon name="logo-instagram"></ion-icon> <p>@infinity21</p></a>

                   
            
        </div>
      </div>
      </div>
      <hr>
      <div class="section__container footer__bar">
        <div class="copyright">
          Copyright © 2024 Infinity Website. All rights reserved.
        </div>
        </div>
              
       
      </footer>

  


  
   
        
      </div>
      <script src="app.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
      <script src="https://cdn.lordicon.com/lordicon.js"></script>
    </body>
  </html>

    
