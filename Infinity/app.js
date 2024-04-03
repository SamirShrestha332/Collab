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
 window.location="/Navgation/nav.html";
  men_Btn.style.color='rgb(184, 73, 165);'

})