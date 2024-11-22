// Search Products
function searchProducts() {
    // Get the search query
    const query = document.querySelector("#search-input").value.toLowerCase();

    // Select all dynamically generated products
    const products = document.querySelectorAll(".product");

    products.forEach((product) => {
        // Get the product name from the `.product-name` element
        const name = product.querySelector(".product-name").textContent.toLowerCase();

        // Check if the product name includes the search query
        product.style.display = name.includes(query) ? "block" : "none";
    });
}

// Filter Products by Price
function filterByPrice() {
    // Get the selected price filter value
    const filter = document.querySelector("#price-filter").value;

    // Select all dynamically generated products
    const products = document.querySelectorAll(".product");

    products.forEach((product) => {
        // Extract the price from the `.product-price` element and parse it as a float
        const price = parseFloat(product.querySelector(".product-price").textContent.replace("$", ""));

        // Determine whether the product matches the selected price filter
        if (
            (filter === "low" && price < 5) ||
            (filter === "mid" && price >= 5 && price <= 10) ||
            (filter === "high" && price > 10) ||
            filter === ""
        ) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
}

// Attach Event Listeners
document.querySelector("#search-input").addEventListener("input", searchProducts);
document.querySelector("#price-filter").addEventListener("change", filterByPrice);
