// Search Products
function searchProducts() {
    const query = document.querySelector("#search-input").value.toLowerCase();
    const products = document.querySelectorAll(".product");

    products.forEach((product) => {
        const name = product.querySelector(".product-name").textContent.toLowerCase();
        product.style.display = name.includes(query) ? "block" : "none";
    });
}

// Filter Products by Price
function filterByPrice() {
    const filter = document.querySelector("#price-filter").value;
    const products = document.querySelectorAll(".product");

    products.forEach((product) => {
        const price = parseFloat(product.querySelector(".product-price").textContent.replace("$", ""));
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
s