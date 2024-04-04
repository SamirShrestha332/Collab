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
  console.log('hello');
  let computedStyle = window.getComputedStyle(itemsection);
  let rightValue = computedStyle.getPropertyValue('right');

  if (rightValue === '0px' || rightValue === '0%') {
    itemsection.style.right = '-50%';
  } else {
    itemsection.style.right = '0%';
  }
});

