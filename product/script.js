function openNav() {
    document.querySelector(".closenavdiv").classList.add("opennav");
    document.querySelector(".closenavdiv").classList.remove("clocsebtn-active");
  }
  
  function closeNav() {
    document.querySelector(".closenavdiv").classList.add("crossbtn-active");
    document.querySelector(".closenavdiv").classList.remove("opennav");
  }
  let amount = document.querySelector(".amount");
  let price = parseInt(amount.innerHTML);
  let totalRs = document.querySelector(".totalRs");
  let quantity = document.querySelector(".quantity"); // Corrected spelling of "quantity"
  let number = parseInt(quantity.innerHTML);

//  click funciton of size

  let sizeButtons = document.querySelectorAll(".size");
  let previouslyClickedButton = null;
  
  sizeButtons.forEach(button => {
    button.addEventListener('click', () => {
      if (previouslyClickedButton) {
        previouslyClickedButton.classList.remove('size-action');
      }
      button.classList.add('size-action');
      previouslyClickedButton = button;
    });
  });
  
  //updata total amount
  
  function updatetotalamount(){
    let totalprice = price * number;
    totalRs.innerHTML=totalprice;
  }
  updatetotalamount();


// update   quantity
function addquantity(){
  number++;
  quantity.innerHTML=number;
  updatetotalamount();
}
function subquantity(){
  if (number>1){
    number--;
    quantity.innerHTML=number;
    updatetotalamount();
  }
  else{
    number=1;
    quantity.innerHTML=number;
    updatetotalamount();
  }

}

let carticon = document.getElementById('carticon');
let itemsection = document.querySelector('.cartitems');

carticon.addEventListener('click', () => {
  let computedStyle = window.getComputedStyle(itemsection);
  let rightValue = computedStyle.getPropertyValue('right');

  if (rightValue === '0px' || rightValue === '0%') {
    itemsection.style.right = '-70%';
  } else {
    itemsection.style.right = '0%';
  }
});


function countItems() {
  let items = document.querySelectorAll(".item");
  let count_item=document.querySelector('.count');
  let counter = 0; // Initialize counter outside the loop
  for (let i = 0; i < items.length; i++) {
    counter++; // Increment counter for each item found
  }
  count_item.innerHTML=counter;
}

countItems();
function addtocardfun() {
  // Selecting the container where the items will be added
  let container = document.querySelector('.cartitems');

  // Creating a div element for the item
  let itemChild = document.createElement("div");
  itemChild.setAttribute('class', "item");

  // Creating an image element
  let createImage = document.createElement("img");
  createImage.setAttribute('src', document.getElementById("product_image").getAttribute('src'));
  createImage.style.width="18.65%";
  itemChild.appendChild(createImage);

  // Creating a paragraph for the product name
  let name = document.getElementById('productname').textContent;
  let productName = document.createElement("p");
  productName.textContent = name;
  itemChild.appendChild(productName);

  // Creating a close button with Ionic icon
  let closeButton = document.createElement("button");
  let crossitem = document.createElement("ion-icon");
  crossitem.setAttribute('name',"close-outline");
  crossitem.setAttribute('class',"item_cross_btn");
  closeButton.appendChild(crossitem); // Append the icon to the button
  closeButton.addEventListener("click", function() {
    // Functionality to remove the item when close button is clicked
    itemChild.remove();
    countItems()--;
  });
  itemChild.appendChild(closeButton);

  // Appending the item to the container
  container.appendChild(itemChild);

  countItems();
  addToCart();
  
}


function home(){
  window.href="infinity/index.html"
}
function addToCart() {
  let product = document.getElementById('productname').innerText; // Use innerText to get visible text
  let price = document.querySelector('.totalRs').innerText.replace('Rs.', '').trim(); // Remove 'Rs.' and trim spaces
  let size; // Initialize 'size' outside the loop
  let sizeall = document.querySelectorAll('.size');

  // Loop through all size elements
  for (let i = 0; i < sizeall.length; i++) {
    let style = window.getComputedStyle(sizeall[i]);
    if (style.backgroundColor == 'wheat') {
      size = sizeall[i].innerText; // Define 'size' outside the loop to make it accessible
      break; // Exit loop once the size is found
    }
  }

  // Error handling if 'size' is not selected
 

  let quantity = parseInt(document.querySelector('.quantity').innerText); // Convert quantity to a number
  let productCount = parseInt(document.querySelector('.count').innerText); // Get the product count

  // Create an object for the cart item
  let cartItem = { product: product, price: parseFloat(price), size: size, quantity: quantity, count: productCount };

  // Retrieve the cart from local storage
  let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

  // Add the new item to the cart
  cart.push(cartItem);

  // Store the updated cart in local storage
  localStorage.setItem('cart', JSON.stringify(cart));
}

// Example usage
