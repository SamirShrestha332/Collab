let cartItems = JSON.parse(localStorage.getItem('cartItems'));

if (cartItems && Array.isArray(cartItems)) {
    cartItems.forEach(function(product) {
        if (product && product.productname && product.totalAmount && product.quantity) {
            // Product Name
            var productNameElement = document.createElement('li');
            productNameElement.textContent = product.productname;
            document.getElementById('productNames').appendChild(productNameElement);

            // Quantity
            var productQuantityElement = document.createElement('li');
            productQuantityElement.textContent =  product.quantity;
            document.getElementById('productQuantity').appendChild(productQuantityElement);

            // Amount
            var productAmountElement = document.createElement('li');
            productAmountElement.textContent = "Rs. " + product.totalAmount;
            document.getElementById('productAmounts').appendChild(productAmountElement);

            // Hidden input field for quantity
            var quantityInput = document.createElement('input');
            quantityInput.type = "hidden";
            quantityInput.name = "quantity[]"; // Assuming you'll submit this as an array
            quantityInput.value = product.quantity;
            document.getElementById('productNames').appendChild(quantityInput);
        }
    });
} else {
    // Display a message if product details are not found or incomplete
    document.getElementById('productNames').innerHTML = "<li>No product details found</li>";
    document.getElementById('productQuantity').innerHTML = "<li>No product details found</li>";
    document.getElementById('productAmounts').innerHTML = "<li>No product details found</li>";
}
let subtotal = 0;
const deliveryCharge = 300; // Assuming fixed delivery charge

if (cartItems && Array.isArray(cartItems)) {
    cartItems.forEach(function(product) {
        if (product && product.totalAmount && product.quantity) {
            subtotal += product.totalAmount;
        }
    });
}

// Display subtotal
document.getElementById('subtotalAmount').textContent = subtotal;

// Calculate and display total
const total = subtotal + deliveryCharge;
document.getElementById('totalAmount').textContent = total;



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