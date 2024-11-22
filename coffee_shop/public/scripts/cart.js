// Cart Object (Single item only, unlimited amount)
let cart = null; // Only one item can be in the cart at any time

// Update Cart Display
function updateCartDisplay() {
    const cartContainer = document.querySelector(".cart-items");
    const totalDisplay = document.querySelector(".cart-total");
    cartContainer.innerHTML = ""; // Clear current item

    if (cart) {
        // Create Cart Item Display
        const cartItem = document.createElement("div");
        cartItem.className = "cart-item";
        cartItem.innerHTML = `
            <h3>${cart.name}</h3>
            <p>Price: $${cart.price}</p>
            <p>Quantity: ${cart.quantity}</p>
            <button onclick="increaseQuantity()">+</button>
            <button onclick="decreaseQuantity()">-</button>
            <button onclick="removeItem()">Remove</button>
        `;
        cartContainer.appendChild(cartItem);

        // Update Total
        const total = cart.price * cart.quantity;
        totalDisplay.textContent = `Total: $${total.toFixed(2)}`;
    } else {
        totalDisplay.textContent = "Total: $0.00";
    }
}

// Add Item to Cart (Replaces the existing item)
function addItem(name, price) {
    cart = { name, price, quantity: 1 };
    updateCartDisplay();
}

// Increase Quantity
function increaseQuantity() {
    if (cart) {
        cart.quantity += 1;
        updateCartDisplay();
    }
}

// Decrease Quantity
function decreaseQuantity() {
    if (cart && cart.quantity > 1) {
        cart.quantity -= 1;
        updateCartDisplay();
    }
}

// Remove Item
function removeItem() {
    cart = null;
    updateCartDisplay();
}
