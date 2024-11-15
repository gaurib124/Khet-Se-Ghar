// Function to calculate the price based on quantity
function updatePrice() {
    var pricePerKg = 100; // Price per kg (₹100)
    var quantity = document.getElementById('grapes-qty').value; // Get the selected quantity

    // Calculate the final price based on the selected quantity
    var finalPrice = 0;

    if (quantity === '250gms') {
        finalPrice = (pricePerKg / 4); // 250gms = 1/4th of a kg
    } else if (quantity === '500gms') {
        finalPrice = (pricePerKg / 2); // 500gms = 1/2 kg
    } else if (quantity === '1kg') {
        finalPrice = pricePerKg; // 1kg
    } else if (quantity === '2kg') {
        finalPrice = pricePerKg * 2; // 2kg
    }

    // Update the displayed price with the calculated final price
    document.getElementById('product-price').innerHTML = '₹' + finalPrice + ' for ' + quantity;
}

// Event listener for quantity selection
document.getElementById('grapes-qty').addEventListener('change', updatePrice);

// Initialize price on page load
updatePrice();


