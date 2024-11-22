/* Search and Filter Logic for product-list-simplified.php
*/

// Search Products
function searchProducts() {
    const query = document.querySelector("#search-bar").value.toLowerCase();
    const rows = document.querySelectorAll(".product-row");

    rows.forEach((row) => {
        const productName = row.querySelector(".product-name").textContent.toLowerCase();
        row.style.display = productName.includes(query) ? "table-row" : "none";
    });
}

// Event Listener for Search Bar
document.querySelector("#search-bar").addEventListener("input", searchProducts);

// Filter Products by Price
function filterByPrice() {
    const filter = document.querySelector("#price-filter").value;
    const rows = document.querySelectorAll(".product-row");

    rows.forEach((row) => {
        const price = parseFloat(row.querySelector(".product-price").textContent.replace("$", ""));
        if (
            (filter === "low" && price <= 5) ||
            (filter === "medium" && price > 5 && price <= 10) ||
            (filter === "high" && price > 10) ||
            filter === "all"
        ) {
            row.style.display = "table-row";
        } else {
            row.style.display = "none";
        }
    });
}

// Event Listener for Price Filter
document.querySelector("#price-filter").addEventListener("change", filterByPrice);
