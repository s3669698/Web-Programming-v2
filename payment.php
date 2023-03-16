<?php
if (isset($_SESSION['isUser']) == FALSE) {
    header('Location: login.php');
}
if (isset($_SESSION['isUser']) == TRUE) {
    header("Location: payment.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="storestyle.css">
    <title>Payment</title>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="store.php">HOME</a>
            <div class="navbar-1">
                <div class="subnav">
                <button class="subnavbtn">PRODUCTS<i class="dropdown"></i></button>
                <div class="subnav-content">
                    <a href="category.php">Browse Products by Category</a>
                    <a href="createdtime.php">Browse Products by Created Time</a>
                </div>
            </div> 
            <a href="aboutus.php">ABOUT US</a>
            <a href="contact.php">CONTACT</a>
            </div>
    </header>
    <main>
    <section class="container content-section">
    <h1 class="sectionheader">CART</h1>
        <div class="cartrow">
            <span class="cartitem cartheader cartcolumn">ITEM</span> 
            <span class="cartprice cartheader cartcolumn">PRICE</span> 
            <span class="cartquantity cartheader cartcolumn">QUANTITY</span> 
        </div>
    <div class="cartitems">
        <div class="cartrow">
            <div class="cartitem cartcolumn">
                <img class="cartitemimage" src="shoes1.jpg" width="150" height="150">
                <span class="cartitemtitle">Shoes1</span>
            </div>
            <span class="cartprice cartcolumn">$1.67</span>
            <div class="cartquantity cartcolumn">
                <input class="quantityinput" type="number" value="1">
                <button class="removeitem" type="button">REMOVE</button>
            </div>
        </div>
        <div class="cartrow">
            <div class="cartitem cartcolumn">
                <img class="cartitemimage" src="shoes2.jpg" width="150" height="150">
                <span class="cartitemtitle">Shoes2</span>
            </div>
            <span class="cartprice cartcolumn">$1.45</span>
            <div class="cartquantity cartcolumn">
                <input class="quantityinput" type="number" value="1">
                <button class="removeitem" type="button">REMOVE</button>
            </div>
        </div>
    </div>
    <div class="coupon">
        <h2>Enter Coupon</h2>
        <input type="text" class='char'>
        <button type="button" onclick='coupon()'>Enter</button>
    </div>
    <div class="carttotal">
        <strong class="carttotaltitle">Total</strong>
        <span class="carttotalprice">$3.12</span>
    </div>
    <div class="afterdis">
        <strong class="carttotaltitle">After Discount</strong>
        <span class="cartafterdis">$3.12</span>
    </div>
    </section>
    <div class="payment-button">
        <button onclick="document.location='products.php'" class="continue">Continue Shopping</button>
        <button onclick="document.location='thankyou.php'" class="order">Order</button>
    </div>
    <div class="recompro">
        <h1>Recommended Products</h1>
    </div>
    <div class="row">
        <div class="column">
            <a href="products.php"><img src="tshirt.jpg" alt="Details"></a>
            <a href="products.php"><h2>T-Shirt</h2></a>
            <p class="price">$1.23</p>
        </div>
        <div class="column">
            <a href="products.php"><img src="shoes.jpg" alt="Details"></a>
            <a href="products.php"><h2>Shoes</h2></a>
            <p class="price">$1.45</p>
        </div>
        <div class="column">
            <a href="products.php"><img src="shirt.jpg" alt="Details"></a>
            <a href="products.php"><h2>Shirt</h2></a>
            <p class="price">$1.56</p>
        </div>
        <div class="column">
            <a href="products.php"><img src="shoes1.jpg" alt="Details"></a>
            <a href="products.php"><h2>Shoes</h2></a>
            <p class="price">$1.67</p>
        </div>
    </div>
</main>
<footer>
    <div class="navbar-2">
        <a href="copyright.php">Copyright</a>
        <a href="ToS.php">Term Of Service</a>
        <a href="PrivacyPolicy.php">Privacy Policy</a>
    </div>
</footer>
<script src="products.js"></script>
</body>
</html>
