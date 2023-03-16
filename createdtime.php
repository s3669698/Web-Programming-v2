<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="storestyle.css">
    <title>Createdtime</title>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="store.php">HOME</a>
            <div class="navbar-1">
                <div class="subnav">
                <button class="subnavbtn">Browse Products by Created Time<i class="dropdown"></i></button>
                <div class="subnav-content">
                    <a href="newold.php">Oldest First</a>
                    <a href="newold.php">Newest First</a>
                </div>
            </div> 
            <a href="aboutus.php">ABOUT US</a>
            <a href="contact.php">CONTACT</a>
            </div>
    </header>
    <main>
        <div class="main-a">
            <h1>New Products</h1>
        </div>
        <div class="row">
            <div class="column">
                <a href="products1.php"><img src="shoes2.jpg" alt="Details"></a>
                <a href="products1.php"><h2>T-Shirt</h2></a>
                <p> High Quality </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.23</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="shoes1.jpg" alt="Details"></a>
                <a href="products.php"><h2>Shoes</h2></a>
                <p> Best seller </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.67</p>
            </div>
            <div class="column">
                <a href="products1.php"><img src="shoes.jpg" alt="Details"></a>
                <a href="products1.php"><h2>Shoes</h2></a>
                <p> Running </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.45</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="shoes3.jpg" alt="Details"></a>
                <a href="products.php"><h2>Shirt</h2></a>
                <p> High Tech </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.56</p>
            </div> 
        </div>
        <div class="main-b">
            <h1>Featured Products</h1>
        </div>
        <div class="row">
            <div class="column">
                <a href="products1.php"><img src="tshirt.jpg" alt="Details" sizes="width:30%" ></a>
                <a href="products1.php"><h2>T-Shirt</h2></a>
                <p> High Quality </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.23</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="shirt.jpg" alt="Details" sizes="width:30%" ></a>
                <a href="products.php"><h2>Shirt</h2></a>
                <p> High Tech </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.56</p>
            </div>
            <div class="column">
                <a href="products1.php"><img src="shoes4.jpg" alt="Details"></a>
                <a href="products1.php"><h2>Shoes</h2></a>
                <p> Running </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.67</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="shoes5.jpg" alt="Details" sizes="width:30%" ></a>
                <a href="products.php"><h2>Shoes</h2></a>
                <p> Best seller </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.45</p>
            </div>
        </div>
<div class="slideshow">
  <img class="slides" src="shoes.jpg" style="width:25%">
  <img class="slides" src="sneaker.jpg" style="width:25%">
  <img class="slides" src="shoes1.jpg" style="width:25%">
  <img class="slides" src="shoes2.jpg" style="width:25%">
  <img class="slides" src="shoes3.jpg" style="width:25%">
  <img class="slides" src="shoes4.jpg" style="width:25%">
  <img class="slides" src="shoes5.jpg" style="width:25%">
  <img class="slides" src="shirt.jpg" style="width:25%">
  <img class="slides" src="tshirt.jpg" style="width:25%">

  <button class="control" onclick="slidepic(-1)">Previous</button>
  <button class="control" onclick="slidepic(1)">Next</button>
</div>
    </main>
    <footer>
        <div class="navbar-2">
            <a href="copyright.php">Copyright</a>
            <a href="ToS.php">Term Of Service</a>
            <a href="PrivacyPolicy.php">Privacy Policy</a>
        </div>
    </footer>
    <script>
    var slideIndex = 1;
showslide(slideIndex);

function slidepic(n) {
showslide(slideIndex += n);
}

function showslide(n) {
    var i;
    var x = document.getElementsByClassName("slides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
  }
    x[slideIndex-1].style.display = "block";  
}
</script>        
</body>
</html>