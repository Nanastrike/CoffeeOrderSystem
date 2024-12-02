// This file is written by Jiu Cheng
// Search Products
function searchProducts() {
    // Get the search query
    let query = document.querySelector("#search-input").value.toLowerCase();

    // Select all dynamically generated products
    let products = document.querySelectorAll(".product");

    products.forEach((product) => {
        // Get the product name from the `.product-name` element
        let name = product.querySelector(".product-name").textContent.toLowerCase();

        // Check if the product name includes the search query
        product.style.display = name.includes(query) ? "" : "none";
    });
}

// Filter Products by Price
function filterByPrice() {
    // Get the selected price filter value
    let filter = document.querySelector("#price-filter").value;

    // Select all dynamically generated products
    let products = document.querySelectorAll(".product");

    products.forEach((product) => {
        // Extract the price from the `.product-price` element and parse it as a float
        let price = parseFloat(product.querySelector(".product-price").textContent.replace("$", ""));

        // Determine whether the product matches the selected price filter
        if (
            (filter == "low" && price < 5) ||
            (filter == "mid" && price >= 5 && price <= 10) ||
            (filter == "high" && price > 10) ||
            filter == ""
        ) {
            product.style.display = "";
        } else {
            product.style.display = "none";
        }
    });
}

// Attach Event Listeners
document.querySelector("#search-input").addEventListener("input", searchProducts);
document.querySelector("#price-filter").addEventListener("change", filterByPrice);
