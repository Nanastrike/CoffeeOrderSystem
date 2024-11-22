// Search Products
function searchProducts() {
    const query = document.querySelector("#search-bar").value.toLowerCase();
    const products = document.querySelectorAll(".product");

    products.forEach((product) => {
        const name = product.querySelector(".product-name").textContent.toLowerCase();
        product.style.display = name.includes(query) ? "block" : "none";
    });
}

function filterByPrice(minPrice, maxPrice) {
    const products = document.querySelectorAll(".product"); // Get all products

    products.forEach((product) => {
        // Extracts the price of each item, removes the dollar sign and converts it to a floating point number.
        const price = parseFloat(product.querySelector(".product-price").textContent.replace("$", ""));
        // Determine whether the product meets the price range, if it meets, it will be shown, if not, it will be hidden.
        product.style.display = price >= minPrice && price <= maxPrice ? "block" : "none";
    });
}


// Apply Price Filter Based on Selected Option
function applyPriceFilter() {
    const filter = document.querySelector("#price-filter").value; // #price-filter would be any id of the dropdown in product-list.php

    switch (filter) {
        case "low":
            filterByPrice(0, 5);
            break;
        case "medium":
            filterByPrice(5, 10);
            break;
        case "high":
            filterByPrice(10, Infinity);
            break;
        default:
            showAllProducts(); 
    }
}

// Show All Products
function showAllProducts() {
    const products = document.querySelectorAll(".product");
    products.forEach((product) => (product.style.display = "block"));
}

// Event Listeners
document.querySelector("#search-bar").addEventListener("input", searchProducts);
document.querySelector("#price-filter").addEventListener("change", applyPriceFilter);
