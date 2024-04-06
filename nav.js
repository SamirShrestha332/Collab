// Function to open navigation
function openNav() {
  document.querySelector(".closenavdiv").classList.add("opennav");
  document.querySelector(".closenavdiv").classList.remove("clocsebtn-active");
}

// Function to close navigation
function closeNav() {
  document.querySelector(".closenavdiv").classList.add("crossbtn-active");
  document.querySelector(".closenavdiv").classList.remove("opennav");
}

// JavaScript code to handle the click event on the "Men" link
document
  .querySelector('a[href="#men"]')
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default behavior of the link

    // Show the products associated with men category
    document.querySelectorAll(".product-card.men").forEach(function (product) {
      product.style.display = "block"; // Display the product card
    });

    // Hide the products associated with women category
    document
      .querySelectorAll(".product-card.women")
      .forEach(function (product) {
        product.style.display = "none"; // Hide the product card
      });

    // Hide the products associated with unisex category
    document
      .querySelectorAll(".product-card.unisex")
      .forEach(function (product) {
        product.style.display = "none"; // Hide the product card
      });

    // Show men's product options in the filter section
    document
      .querySelectorAll(".filter-item.men-dropdown")
      .forEach(function (item) {
        item.style.display = "block";
      });

    // Hide women's product options in the filter section
    document
      .querySelectorAll(".filter-item.women-dropdown")
      .forEach(function (item) {
        item.style.display = "none";
      });

    // Hide unisex product options in the filter section
    document
      .querySelectorAll(".filter-item.unisex-dropdown")
      .forEach(function (item) {
        item.style.display = "none";
      });

    document
      .querySelectorAll(".product-card.newin")
      .forEach(function (product) {
        product.style.display = "none"; // Display the product card
      });
  });

// JavaScript code to handle the click event on the "Women" link
document
  .querySelector('a[href="#women"]')
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default behavior of the link

    // Show the products associated with women category
    document
      .querySelectorAll(".product-card.women")
      .forEach(function (product) {
        product.style.display = "block"; // Display the product card
      });

    document
      .querySelectorAll(".product-card.newin")
      .forEach(function (product) {
        product.style.display = "none"; // Display the product card
      });

    // Hide the products associated with men category
    document.querySelectorAll(".product-card.men").forEach(function (product) {
      product.style.display = "none"; // Hide the product card
    });

    // Hide the products associated with unisex category
    document
      .querySelectorAll(".product-card.unisex")
      .forEach(function (product) {
        product.style.display = "none"; // Hide the product card
      });

    // Hide men's product options in the filter section
    document
      .querySelectorAll(".filter-item.men-dropdown")
      .forEach(function (item) {
        item.style.display = "none";
      });

    // Show women's product options in the filter section
    document
      .querySelectorAll(".filter-item.women-dropdown")
      .forEach(function (item) {
        item.style.display = "block";
      });

    // Hide unisex product options in the filter section
    document
      .querySelectorAll(".filter-item.unisex-dropdown")
      .forEach(function (item) {
        item.style.display = "none";
      });
  });

// JavaScript code to handle the click event on the "Unisex" link
document
  .querySelector('a[href="#unisex"]')
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default behavior of the link

    document
      .querySelectorAll(".product-card.newin")
      .forEach(function (product) {
        product.style.display = "none"; // Display the product card
      });

    // Show the products associated with unisex category
    document
      .querySelectorAll(".product-card.unisex")
      .forEach(function (product) {
        product.style.display = "block"; // Display the product card
      });

    // Hide the products associated with men category
    document.querySelectorAll(".product-card.men").forEach(function (product) {
      product.style.display = "none"; // Hide the product card
    });

    // Hide the products associated with women category
    document
      .querySelectorAll(".product-card.women")
      .forEach(function (product) {
        product.style.display = "none"; // Hide the product card
      });

    // Hide men's product options in the filter section
    document
      .querySelectorAll(".filter-item.men-dropdown")
      .forEach(function (item) {
        item.style.display = "none";
      });

    // Hide women's product options in the filter section
    document
      .querySelectorAll(".filter-item.women-dropdown")
      .forEach(function (item) {
        item.style.display = "none";
      });

    // Show unisex product options in the filter section
    document
      .querySelectorAll(".filter-item.unisex-dropdown")
      .forEach(function (item) {
        item.style.display = "block";
      });
  });

// JavaScript code to handle the click event on the "Sale" link
document
  .querySelector('a[href="#Sale"]')
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default behavior of the link

    // Show the products associated with sale category
    document.querySelectorAll(".product-card.sale").forEach(function (product) {
      product.style.display = "block"; // Display the product card
    });

    // Hide the products associated with other categories
    document
      .querySelectorAll(".product-card:not(.sale)")
      .forEach(function (product) {
        product.style.display = "none"; // Hide the product card
      });

    // Show all product options in the filter section
    document.querySelectorAll(".filter-item").forEach(function (item) {
      item.style.display = "block";
    });
  });

// JavaScript code to handle the click event on the "New in" link
document
  .querySelector('a[href="#newin"]')
  .addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default behavior of the link

    // Show the products associated with new in category
    document
      .querySelectorAll(".product-card.newin")
      .forEach(function (product) {
        product.style.display = "block"; // Display the product card
      });

    // Hide the products associated with other categories
    document
      .querySelectorAll(".product-card:not(.newin)")
      .forEach(function (product) {
        product.style.display = "none"; // Hide the product card
      });

    // Show all product options in the filter section
    document.querySelectorAll(".filter-item").forEach(function (item) {
      item.style.display = "block";
    });
  });
