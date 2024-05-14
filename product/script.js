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
  
  // Click function of size
  
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
  
  // Update total amount
  
  function updatetotalamount() {
    let totalprice = price * number;
    totalRs.innerHTML = totalprice;
  }
  
  updatetotalamount(); // Call the function to update total amount
  
  


// // update   quantity
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




function removeItem(event) {
  // Check if the clicked element is the remove button
  if (event.target.classList.contains('removebtn')) {
    
      const item = event.target.closest('.item');
      
      // Remove the item from the cart
      if (item) {
          // Remove the item from local storage by its index
          let cartItems = localStorage.getItem('cartItem').split('</div>');
          cartItems.splice(cartItems.indexOf(item.innerHTML), 1);
          localStorage.setItem('cartItem', cartItems.join('</div>'));
 
          item.remove();
      }
  }
  countItems();
  updateTotalAmount();
}

function addToCart() {
  // Selecting the container where the items will be added
  let container = document.querySelector('.card_item_container');

  // Getting the active size button
  let activeSize = document.querySelector('.size.size-action');

  // If no size is selected, display an alert and return
  if (!activeSize) {
      alert('Please select a size.');
      return;
  }

  // Get product details
  let productImageSrc = document.querySelector('.imgcontainer img').getAttribute('src');
  let productname = document.querySelector('#productname').innerHTML;
  let productamount = document.querySelector('.totalRs').innerHTML;
  let quantity = document.querySelector('#num_quantity').innerHTML;
  let sizeValue = activeSize.textContent;

  // Check if there is an existing item with the same product name and size
  let existingItem = document.querySelector(`.item .productname[name="addtochartproductname"][data-size="${sizeValue}"]`);
  if (existingItem) {
      // Update the quantity of the existing item
      let existingQuantity = existingItem.parentElement.querySelector('.cart_item_quantity');
      existingQuantity.textContent = parseInt(existingQuantity.textContent) + parseInt(quantity);
      
      // Update the total amount of the existing item
      let existingTotalAmount = existingItem.parentElement.nextElementSibling.querySelector('.total_amount');
      existingTotalAmount.textContent = parseInt(existingTotalAmount.textContent) + parseInt(productamount);
      
      // Update the local storage with the updated item information
      let items = JSON.parse(localStorage.getItem('cartItems')) || [];
      items.forEach(item => {
          if (item.productname === productname && item.size === sizeValue) {
              item.quantity += parseInt(quantity);
              item.totalAmount += parseInt(productamount);
          }
      });
      localStorage.setItem('cartItems', JSON.stringify(items));
  } else {
      // Create a new item
      let newElement = document.createElement('div');
      newElement.innerHTML = `
          <div class="item"> 
              <div class="addtocartproductdetails">
                  <img src="${productImageSrc}" id="img1" alt="product image"/>
                  <p class="productname" name="addtochartproductname" data-size="${sizeValue}">${productname}</p>
                  <p class="cart_item_quantity">${quantity}</p>
              </div>
              <div class="otherdetails">
                  <div class="addtochartproductsize" name="addtochartproductsize">${sizeValue}</div>
                  <div class="addtocartproduct_price">Rs <span class="total_amount">${parseInt(productamount)}</span></div>
                  <!-- Call removeItem function passing event as argument -->
                  <button class="removebtn" onclick="removeItem(event)"><ion-icon name="close-outline" onclick="removeItem(event)"></ion-icon></button>
              </div>
          </div>
      `;

      // Store the new item in local storage
      let items = JSON.parse(localStorage.getItem('cartItems')) || [];
      items.push({
          productname: productname,
          size: sizeValue,
          quantity: parseInt(quantity),
          totalAmount: parseInt(productamount)
      });
      localStorage.setItem('cartItems', JSON.stringify(items));
      
      // Append the new element to the container
      container.appendChild(newElement);
  }

  countItems();
  updateTotalAmount();
}



// function getcode(){
//   // Selecting the container where the items will be added
//   let container = document.querySelector('.card_item_container');
//   let itemHTML = localStorage.getItem('cartItem');
//   if(itemHTML) {
//       let newElement = document.createElement('div');
//       newElement.innerHTML = itemHTML;
//       container.appendChild(newElement);

//       let removeBtns = newElement.querySelectorAll('.removebtn');
//       removeBtns.forEach(removeBtn => {
//           removeBtn.addEventListener('click', function(event) {
//               const item = event.target.closest('.item');
              
//               // Remove the item from local storage
//               let updatedCartItems = itemHTML.replace(item.outerHTML, '');
//               localStorage.setItem('cartItem', updatedCartItems);
              
//               // Update itemHTML to reflect the change in local storage and remove the HTML content of the removed item
//               itemHTML = updatedCartItems;
//               item.remove();
              
//               countItems();
//               updateTotalAmount();
//           });
//       });
//   }
// }


window.onload = function() {

  countItems();
  updateTotalAmount();
}


function updateTotalAmount() {
  let totalAmount = 0;

  // Select all items in the cart
  const items = document.querySelectorAll('.item');

  // Loop through each item
  items.forEach(item => {
      // Get the product amount and quantity for the current item
      const productAmount = parseInt(item.querySelector('.total_amount').innerHTML);

    

      // Add the total amount for the current item to the overall total
      totalAmount += productAmount;

      
  });

  // Update the total amount displayed for all items combined
  document.querySelector('.product_amount').innerHTML = totalAmount;
}


// Function to count the number of items in the cart
function countItems() {
  let itemCount = document.querySelectorAll('.item').length;
  document.querySelector('.count').innerHTML=itemCount
  
}

function crossthecheckout(){
document.querySelector('.cartitems').style.display='none';
}



let cartIcon = document.querySelector('#carticon').addEventListener('click',()=>{
  document.querySelector('.cartitems').style.display='flex';
})

function home(){
  window.href="http://localhost/Infinity/src/";
}








