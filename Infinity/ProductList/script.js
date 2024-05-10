// Function to open navigation
function openNav() {
    document.querySelector(".closenavdiv").classList.add("opennav");
    document.querySelector(".closenavdiv").classList.remove("clocsebtn-active");
  }
  
  // Function to close navigation
  function closeNav() {
    document.querySelector(".closenavdiv").classList.add("crossbtn-active");
    document.querySelector(".closenavdiv").classList.remove("opennav");
  }// JavaScript function to update product display based on filter options
  function updateProducts(category, size, lowerPrice, higherPrice) {
    const products = document.querySelectorAll('.product-card');
  
    products.forEach(product => {
      const productCategory = product.getAttribute('data-category');
      const productSize = product.getAttribute('data-size');
      const productPrice = parseFloat(product.getAttribute('data-price'));
  
      const isVisible = (
        (category === 'all' || productCategory === category) &&
        (size === 'all' || productSize === size) &&
        (lowerPrice === '' || parseFloat(lowerPrice) <= productPrice) &&
        (higherPrice === '' || parseFloat(higherPrice) >= productPrice)
      );
  
      product.style.display = isVisible ? 'flex' : 'none';
    });
  
    // Align product cards to flex-start after updating visibility
    const productContainer = document.querySelector('.product-cards');
    productContainer.style.justifyContent = 'flex-start';
  }
  
  // Example of calling the updateProducts function when a filter option changes
  document.getElementById("category").addEventListener("change", function() {
    var category = this.value;
    var size = document.getElementById("size").value;
    var lowerPrice = document.getElementById("price-range-lower").value;
    var higherPrice = document.getElementById("price-range-higher").value;
    updateProducts(category, size, lowerPrice, higherPrice);
  });
  
  document.getElementById("size").addEventListener("change", function() {
    var category = document.getElementById("category").value;
    var size = this.value;
    var lowerPrice = document.getElementById("price-range-lower").value;
    var higherPrice = document.getElementById("price-range-higher").value;
    updateProducts(category, size, lowerPrice, higherPrice);
  });
  
  document.getElementById("price-range-lower").addEventListener("input", function() {
    var category = document.getElementById("category").value;
    var size = document.getElementById("size").value;
    var lowerPrice = this.value;
    var higherPrice = document.getElementById("price-range-higher").value;
    updateProducts(category, size, lowerPrice, higherPrice);
  });
  
  document.getElementById("price-range-higher").addEventListener("input", function() {
    var category = document.getElementById("category").value;
    var size = document.getElementById("size").value;
    var lowerPrice = document.getElementById("price-range-lower").value;
    var higherPrice = this.value;
    updateProducts(category, size, lowerPrice, higherPrice);
  });

//  // Select all view more buttons and add event listeners
// const viewMoreBtns = document.querySelectorAll(".view-more-btn");
// viewMoreBtns.forEach((btn) => {
//   btn.addEventListener("click", () => {
//     // Find the parent product card of the clicked button
//     const productCard = btn.closest(".product-card");
//     // Display the product details for the corresponding product card
//     productCard.querySelector(".back").style.display = "flex";
//   });
// });

// // Select all close buttons inside product details and add event listeners
// const viewMoreBtnsClose = document.querySelectorAll(".view-more-btn-close");
// viewMoreBtnsClose.forEach((btn) => {
//   btn.addEventListener("click", () => {
//     // Find the parent product card of the clicked close button
//     const productCard = btn.closest(".product-card");
//     // Hide the product details for the corresponding product card
//     productCard.querySelector(".back").style.display = "none";
//   });
// });
