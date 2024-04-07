let slideIndex = 0;
let menBtn=document.getElementById("menbutton");
let womenBtn=document.getElementById("womenbutton");
let unisexBtn=document.getElementById("unisexbutton");
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
function openNav() {
  document.querySelector(".closenavdiv").classList.add("opennav");
  document.querySelector(".closenavdiv").classList.remove("clocsebtn-active");
}

function closeNav() {
  document.querySelector(".closenavdiv").classList.add("crossbtn-active");
  document.querySelector(".closenavdiv").classList.remove("opennav");
}




let men_Btn=document.querySelector('.menindicator');

men_Btn.addEventListener('click',()=>{
 
  men_Btn.style.color='rgb(184, 73, 165);'

})
// Function to update the count display with the latest data
function updateCountDisplay() {
  // Retrieve the cart from local storage
  let cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];

  // Get the last item's count if the cart is not empty
  let latestCount = cart.length > 0 ? cart[cart.length - 1].count : 0;

  // Find the element with the class 'count' and update its content
  let countElement = document.querySelector('.count');
  if (countElement) {
    countElement.innerText = latestCount;
  }
}

// Call the function to update the count display
updateCountDisplay();