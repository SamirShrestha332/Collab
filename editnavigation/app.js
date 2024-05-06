let lighticon = document.querySelector(".light");
let container = document.querySelector(".container");
let logout=document.querySelector(".logout");



const fileInput = document.getElementById('product-image');
fileInput.addEventListener('change', validateFileExtension);

function validateFileExtension() {
    const allowedExtensions = ['.jpg', '.jpeg', '.png'];
    const fileName = fileInput.value;
    const fileExtension = fileName.substring(fileName.lastIndexOf('.')).toLowerCase();

    if (!allowedExtensions.includes(fileExtension)) {
        document.getElementById('file-error').textContent = 'Invalid file format. Please choose a valid image file (JPG, JPEG, or PNG).';
        fileInput.value = ''; // Clear the input
    } else {
        document.getElementById('file-error').textContent = ''; // Clear any previous error message
    }
}


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




