let lighticon = document.querySelector(".light");
let container = document.querySelector(".container");
let logout=document.querySelector(".logout");

lighticon.addEventListener("click", () => {
    if (lighticon.getAttribute("name") === "moon-outline") {
        lighticon.setAttribute("name", "sunny-outline");
        document.body.classList.remove("darkmode");
        document.querySelector("header").classList.remove("navbar_active");
        
    } else {
        lighticon.setAttribute("name", "moon-outline");
        document.body.classList.add("darkmode");
        document.querySelector("header").classList.add("navbar_active");
    }
});
logout.addEventListener("click",()=>{
    window.location="http://localhost/LogIn";
})
