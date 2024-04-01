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
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}


const navSlide= () => {
  const burger = document.querySelector('.burger');
  const nav = document.querySelector('ul');
  let navlinks = document.querySelectorAll('ul li')
 
  burger.addEventListener('click',() => {
     //toggle nav
     nav.classList.toggle('nav-active');
     //animation links
  navlinks.forEach((link, index) => {
   if(link.style.animation){
     link.style.animation=''
   }
   else{
     link.style.animation = `animationnav 0.3s ease forwards ${index/7+0.5}s`;
     //this index/7 is a basically use for a smooth delay different making  in animation
   }
 });
 burger.classList.toggle('toggle');
});


  } 
navSlide()


