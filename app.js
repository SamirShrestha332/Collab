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
   


let sizes=document.querySelectorAll(".product_size");
 sizes.forEach(function(size) {
        size.addEventListener("change", function() {
            add(); // Call the add function whenever a size is changed
        });
    });
    sizes.forEach(function(size) {
        size.addEventListener("input", function() {
            if (size.value === "") {
                size.value = "0";
            }
        });
    });




    function add() {
        let totalstock = document.getElementById('totalstock');
        let size_xl = parseInt(document.getElementById('size_xl').value);
        let size_xxl = parseInt(document.getElementById('size_xxl').value);
        let size_m = parseInt(document.getElementById('size_m').value);
        let size_s = parseInt(document.getElementById('size_s').value);
        totalstock.innerHTML = size_m + size_s + size_xl + size_xxl;
    }


// change in options subcategories based on category
        // Define sub-categories for each category
        const subCategories = {
            Men: ['Pant', 'Shirt/T-shirt', 'Jacket','Sweater'],
            Women: ['Jeans', 'Skirt', 'Jacket', 'Tops'],
            Unisex: ['Sweatshirt', 'Sweatpant', 'Windcheater', 'Hoodie']
            // Add more categories and their sub-categories as needed
        };

        // Get references to the Category and Sub-Category select elements
        const categorySelect = document.getElementById('Category');
        const subCategorySelect = document.getElementById('Sub-Category');

        // Function to populate Sub-Category select element based on the selected Category
        function populateSubCategories() {
            const selectedCategory = categorySelect.value;
            subCategorySelect.innerHTML = '<option value="" disabled selected>Select</option>'; // Reset Sub-Category options

            if (selectedCategory && subCategories[selectedCategory]) {
                subCategories[selectedCategory].forEach(subCategory => {
                    const option = document.createElement('option');
                    option.value = subCategory;
                    option.textContent = subCategory;
                    subCategorySelect.appendChild(option);
                });
            }
        }

        // Add event listener to Category select element
        categorySelect.addEventListener('change', populateSubCategories);





