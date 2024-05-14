


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
                <p>Subtotal: Rs.4000</p>
                <p>Delivery Charge: Rs.300</p>
                <hr>
                <p>Total: Rs.4300</p>
                <div class="promo-code">
                    <input type="text" placeholder="Enter Promo Code">
                    <button type="button">Apply</button>
                </div>
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
        </form>
    </div>
    </div>
</div> 
<script>

    document.getElementById("checkout-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        if (validateForm()) {
            this.submit(); // Submit the form if validation passes
        }
    });
    function validateForm() {
        const name = document.forms["checkout-form"]["name"].value;
        const address = document.forms["checkout-form"]["address"].value;
        const contact = document.forms["checkout-form"]["contact"].value;
        const email = document.forms["checkout-form"]["email"].value;
        const paymentMethod = document.querySelector('input[name="payment-method"]:checked');
    
        // Validate name, address, contact, and email
        if (!name || !address || !contact || !email) {
            alert("Please fill in all required fields.");
            return false;
        }
    
        // Validate contact number (10 digits)
        const contactRegex = /^\d{10}$/;
        if (!contact.match(contactRegex)) {
            alert("Contact number must be 10 digits.");
            return false;
        }
    
        // Validate email format
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailRegex)) {
            alert("Please enter a valid email address.");
            return false;
        }    
        // Validate payment method selection
        if (!paymentMethod) {
            alert("Please select a payment method.");
            return false;
        }
        
        // Additional validation logic if needed
        return true;
    }
    


</script>
</body> 
</html>