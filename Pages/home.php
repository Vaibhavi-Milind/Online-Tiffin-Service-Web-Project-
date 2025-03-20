<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daabaa Xpress</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            
        }

        /* Body */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-image: url('bg1.jpg'); /* Replace with your image path */
    background-size: cover; /* Ensures the image covers the entire screen */
    background-position: center; /* Centers the image */
    background-repeat: no-repeat; /* Prevents the image from repeating */
    background-attachment: fixed; /* Keeps the background fixed during scrolling */
    /* backdrop-filter: brightness(0.8); */
            /* background-color: white; */
            overflow-x: hidden; /* Prevent horizontal scroll on cart open */
        }

        /* Header */
        .header {
            background-color: #FFC107;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            color: #333;
        }

        .logo span {
            color: #4CAF50;
        }

        .nav-links {
            list-style-type: none;
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .cart-link {
            cursor: pointer;
            color: #333;
            font-weight: bold;
        }

        .subscription-button {
            background-color: rgb(90, 174, 5);
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 20px;
        }

        .hero-image {
            width: 100%;
            max-width: 100%;
            max-height: 350px;
            object-fit: cover;
            border-radius: 10px;
        }

        .hero-text {
            font-size: 28px;
            color: #f7b32a;
            margin-top: 10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: bold;
        }
        .reviews {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }

        .reviews h2 {
            color: #FF9800;
            margin-bottom: 20px;
        }

        .review-item {
            background-color: #f4f4f4;
            border-radius: 10px;
            padding: 15px;
            margin: 10px auto;
            width: 80%;
            max-width: 500px;
            text-align: left;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .review-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .reviewer-name {
            font-weight: bold;
            color: #333;
        }

        .review-rating {
            color: #FFD700; /* Gold star color */
            margin-top: 5px;
        }

        /* Specials Section */
        .specials {
            text-align: center;
            padding: 20px;
        }

        .specials h2 {
            color: #FF9800;
            margin-bottom: 10px;
        }

        .special-items {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .special-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 160px;
            background-color: #fbeab8;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .special-item:hover {
            transform: scale(1.05);
        }

        .special-item img {
            width: 100%;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .special-item p {
            font-weight: bold;
            margin: 5px 0;
        }
        .special-item h4 {
            font-size: 14px;
            color: #4a9a04;
            margin: 5px 0 10px;
        }

        .add-to-cart {
            margin-top: auto;
            padding: 8px 16px;
            background-color: rgb(73, 135, 12);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            width: 100%;
            text-align: center;
        }

        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -300px; /* Hidden initially */
            width: 300px;
            height: 100%;
            background-color: #fffed8;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            padding: 20px;
            overflow-y: auto;
            transition: right 0.3s ease;
        }

        .cart-sidebar.open {
            right: 0; /* Slide in when open */
        }

        .cart-sidebar h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .cart-total {
            font-weight: bold;
            margin-top: 20px;
            font-size: 18px;
        }

        .checkout-button {
            display: block;
            width: 100%;
            background-color: #75b809;
            color: white;
            padding: 10px;
            text-align: center;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #f1f1f1;
            color: #666;
            font-size: 14px;
            border-top: 1px solid #ddd;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header class="header">
        <h1 class="logo">DAABAA<span>Xpress</span></h1>
        <nav>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="chefs.php">Meet our Chefs</a></li>
                <li><a href="#">About Us</a></li>
                <li><span class="cart-link" onclick="toggleCart()">Cart</span></li>
            </ul>
        </nav>
    </header>
    <section class="hero">
        <img src="bg2.jpg" alt="Traditional Indian Meal" class="hero-image">
        <p class="hero-text">"Dabba khule, khushiyon ka jahan, ghar jaisa khana, sabse pyaara samaan!"</p>
    </section>
    
    <main class="content">
        <section class="specials">
            <h2>Today's Special</h2>
            <div class="special-items">
                <div class="special-item" data-name="Gulab Jamun" data-price="10">
                    <p>Gulab Jamun</p>
                    <img src="gulabjamun.png" alt="Gulab Jamun">
                    <h4>2 for Rs 10</h4>
                    <button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button>
                </div>
                <div class="special-item" data-name="Solkadhi" data-price="30">
                    <p>Solkadhi</p>
                    <img src="solkadhi.png" >
                    <h4>Rs 30</h4>
                    <button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button>
                </div>
                <div class="special-item"data-name="Modak" data-price="15">
                    <p>Modak</p>
                    <img src="modak.png" >
                    <h4> Per Rs 15</h4>
                    <button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button>
                </div>
                <!-- <div class="special-item" data-name="Pulav" data-price="300">
                    <p>Pulav</p>
                    
                    <img src="pulav.png" >
                    <h4>500 g for Rs 300 </h4>
                    <button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button>
                </div>
                <div class="special-item" data-name="Ice-Cream" data-price="20">
                    <p>Ice-Cream</p>
                    
                    <img src="ice-cream.png" >
                    <h4>Rs 20</h4>
                    <button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button> -->

                    <?php
                // Connect to the database
                $conn = new mysqli("localhost", "root", "", "tiffin_service_db");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query to get menu items
                $sql = "SELECT name, price, image_path FROM menu";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Loop through each item and create HTML
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="special-item" data-name="' . $row["name"] . '" data-price="' . $row["price"] . '">';
                        echo '<p>' . $row["name"] . '</p>';
                        echo '<img src="' . $row["image_path"] . '" alt="' . $row["name"] . '">';
                        echo '<h4>Rs ' . $row["price"] . '</h4>';
                        echo '<button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>No items available</p>";
                }

                $conn->close();
                ?>
                </div>
                <!-- <div class="special-item" data-name="Soda" data-price="10">
                    <p>Soda</p>
                    
                    <img src="soda.png" >
                    <h4>Rs 10</h4>
                    <button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button>
                </div>
                <div class="special-item" data-name="Lemon-Soda"data-price="15">
                    <p>Lemon-Soda</p>
                    
                    <img src="lemon_soda.png" >
                    <h4>Rs 15</h4>
                    <button class="add-to-cart" onclick="addToCart(this)">Add to Cart</button> -->
            </div>
        </section>
        <section class="reviews">
            <h2>Customer Reviews</h2>
            <div class="review-item">
                <p class="review-text">"Absolutely loved the food! It felt like I was eating at home. Highly recommended!"</p>
                <p class="reviewer-name">- Priya S.</p>
                <p class="review-rating">★★★★★</p>
            </div>
            <div class="review-item">
                <p class="review-text">"The taste, the quality, and the packaging were perfect. Will order again!"</p>
                <p class="reviewer-name">- Rohan M.</p>
                <p class="review-rating">★★★★☆</p>
            </div>
            <div class="review-item">
                <p class="review-text">"Best tiffin service I have experienced! The food is fresh and full of flavors."</p>
                <p class="reviewer-name">- Anjali P.</p>
                <p class="review-rating">★★★★★</p>
            </div>
        </section>
    </main>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <h2>Shopping Cart</h2>
        <div id="cartItems"></div>
        <div class="cart-total">Total: Rs <span id="cartTotal">0</span></div>
        <button class="checkout-button" onclick="location.href='index.html'">Checkout</button>
    </div>

    <footer>
        &copy; 2024 Daabaa Xpress. All rights reserved.
    </footer>

    <script>
        const cartItems = [];
        let cartTotal = 0;

        function toggleCart() {
            document.getElementById('cartSidebar').classList.toggle('open');
        }

        function addToCart(button) {
            const itemName = button.parentElement.getAttribute('data-name');
            const itemPrice = parseInt(button.parentElement.getAttribute('data-price'));

            cartItems.push({ name: itemName, price: itemPrice });
            cartTotal += itemPrice;
            
            updateCart();
            toggleCart(); // Open cart on adding an item
        }

        function updateCart() {
            const cartItemsContainer = document.getElementById('cartItems');
            cartItemsContainer.innerHTML = '';

            cartItems.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('cart-item');
                itemDiv.innerHTML = `<span>${item.name}</span><span>Rs ${item.price}</span>`;
                cartItemsContainer.appendChild(itemDiv);
            });

            document.getElementById('cartTotal').innerText = cartTotal;
        }
    </script>
</body>
</html>
