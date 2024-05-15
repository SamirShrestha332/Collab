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


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
    <div class="logo">
        <a href="http://localhost/Infinity/src"><img src="http://localhost/Infinity//Images/infinity_logo.png" width="80px"></a>
      </div>
<h1 class="checkout-title">Checkout Page</h1>
</div>

<div class="checkout-page">
    <div class="basic-details">
        <form class="checkout-form"id="checkout-form">
            <h4>1. Shipping Details</h4>
            <div class="form-inline">
                <div class="form-group">
                    <label>Name <span class="required-asterisk">*</span></label>
                    <input type="text" name="name" required>
                </div>

            </div>
            <div class="form-group">
                <label>Address <span class="required-asterisk">*</span></label>
                <textarea name="address" rows="3" required></textarea>  
            </div>
            <h4>2. Contact Details</h4>
                <div class="form-group">
                    <label>Contact <span class="required-asterisk">*</span></label>
                    <input type="text" name="contact" required>
                </div>
                <div class="form-group">
                    <label>Email <span class="required-asterisk">*</span></label>
                    <input type="email" name="email" required>
                </div>
            <h4>3. Additional Information (Optional)</h4>
            <div class="form-group">
                <label>Order Note</label>
                <textarea name="order-note" rows="3"></textarea>
            </div>
            
        
    </div>

    <div class="order-summary">
            <div class="summary-box">
                <h4 class="summary-title">Order Summary</h4>
                <div class="summary-details">
                    
                       <div class="productSelected">
                                <div class="productname">
                                    <h6>Product(s) Selected:</h6>
                                    <ul id="productNames">
                                    </ul>
                                </div>

                                <div class="quantity">
                                    <h6>Product(s) quantity:</h6>
                                    <ul id="productQuantity">
                                    </ul>
                                </div>
                                
                                    <div class="productpayment">
                                        <h6>Product(s) Amount:</h6>
                                        <ul id="productAmounts"> 
                                        </ul>
                                    </div>
                         </div>
                    <!-- Display total amount -->
                    <p id="subtotal">Subtotal: Rs. <span id="subtotalAmount"></span></p>
                    <p>Delivery Charge: Rs. <span id="deliveryCharge">300</span></p>
                    <hr>
                    <p id="total">Total: Rs. <span id="totalAmount"></span></p>

                    <!-- Promo code and Payment Method sections -->
                </div>
                <div class="promo-code">
                    <input type="text" placeholder="Enter Promo Code">
                    <button type="button">Apply</button>
                </div>
                <h4 class="summary-title">Payment Method</h4>
                <div class="payment-method">
                <div>
                    <label for="cash-on-delivery">
                        <img src="delivery.png" alt="Cash on Delivery" class="payment-logo">
                    </label>
                    <p>Cash on Delivery</p>
                    <input type="radio" id="cash-on-delivery" name="payment-method" value="cash">
                </div>
                <div>
                    <label for="khalti">
                        <img src="khalti.png" alt="Khalti" class="payment-logo">
                    </label>
                    <p>Khalti</p>
                    <input type="radio" id="khalti" name="payment-method" value="khalti">
                </div>
                <div>
                    <label for="esewa">
                        <img src="esewa.png" alt="esewa" class="payment-logo">
                    </label>
                    <p>Esewa</p>
                    <input type="radio" id="esewa" name="payment-method" value="esewa">
                </div>




            </div>
            <button class="place-order-btn" type="submit">Place Order</button>
        </div>
    </div>
    <script src="script.js"></script>

</body>
</html>