async function loadProductData() {
    try {
        const response = await fetch('../data/products.csv');
        const csvText = await response.text();
        const products = parseCSV(csvText);
        displayProducts(products);
    } catch (error) {
        console.error('Error loading product data:', error);
    }
}

function parseCSV(csvText) {
    const lines = csvText.split('\n');
    const headers = lines[0].split(',');
    const products = [];

    for (let i = 1; i < lines.length; i++) {
        if (lines[i].trim() === '') continue;
        
        const values = lines[i].split(',');
        const product = {
            name: values[0],
            amazonPrice: parseFloat(values[1]),
            flipkartPrice: parseFloat(values[2]),
            amazonLink: values[3],
            flipkartLink: values[4]
        };
        products.push(product);
    }

    return products;
}

function displayProducts(products) {
    const container = document.querySelector('.container');
    container.innerHTML = ''; // Clear existing content

    products.forEach(product => {
        const productCard = `
            <div class="product-card">
                <h2>${product.name}</h2>
                <div class="price-comparison">
                    <div class="amazon">
                        <h3>Amazon</h3>
                        <p>₹${product.amazonPrice}</p>
                        <a href="${product.amazonLink}" target="_blank">Buy on Amazon</a>
                    </div>
                    <div class="flipkart">
                        <h3>Flipkart</h3>
                        <p>₹${product.flipkartPrice}</p>
                        <a href="${product.flipkartLink}" target="_blank">Buy on Flipkart</a>
                    </div>
                </div>
            </div>
        `;
        container.innerHTML += productCard;
    });
}

// Call loadProductData when the page loads
document.addEventListener('DOMContentLoaded', loadProductData); 