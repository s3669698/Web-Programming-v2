<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/storestyle.css">
    <title>Products</title>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="store.php">HOME</a>
            <div class="navbar-1">
                <div class="subnav">
                <button class="subnavbtn">PRODUCTS<i class="dropdown"></i></button>
                <div class="subnav-content">
                    <a href="Category.php">Browse Products by Category</a>
                    <a href="createdtime.php">Browse Products by Created Time</a>
                </div>
            </div> 
            <a href="ABOUTUS.php">ABOUT US</a>
            <a href="CONTACT.php">CONTACT</a>
            </div>
    </header>
    <main>
        <div class="info">
            <img src="media/shoes2.jpg" class="picture">
            <h2 class="productname">Shoes2</h2>
            <p class="productprice">$1.45</p>
            <p>Running, Walking</p>
            <p>High tech, prevent injury</p>
            <div class="buy">
                <button type="button" class="addcart">Add to Cart</button>
                <button onclick="document.location='payment.php'" class="buynow">Move to Cart</button>
            </div>
        </div>
        <div class="recompro">
            <h1>Recommended Products</h1>
        </div>
        <div class="row">
            <div class="column">
                <a href="products.php"><img src="media/tshirt.jpg" alt="Details"></a>
                <a href="products.php"><h2>T-Shirt</h2></a>
                <p class="price">$1.23</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="media/shoes.jpg" alt="Details"></a>
                <a href="products.php"><h2>Shoes</h2></a>
                <p class="price">$1.45</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="media/shirt.jpg" alt="Details"></a>
                <a href="products.php"><h2>Shirt</h2></a>
                <p class="price">$1.56</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="media/shoes1.jpg" alt="Details"></a>
                <a href="products.php"><h2>Shoes</h2></a>
                <p class="price">$1.67</p>
            </div>
        </div>
    </main>
    <footer>
        <div class="navbar-2">
            <a href="Copyright.php">Copyright</a>
            <a href="ToS.php">Term Of Service</a>
            <a href="PrivacyPolicy.php">Privacy Policy</a>
        </div>
    </footer>
    <script src="js/products.js"></script>
</body>
</html>