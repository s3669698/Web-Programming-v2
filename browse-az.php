<?php
require_once 'modules/top.php';
require_once 'modules/footer.php';

session_start();

// top module, then manually specified stylesheets, then navbar module
// edit in 'modules/top.php'
topModule();  
  echo '<link rel="stylesheet" href="css/browse-az.css">';
  echo '<link rel="stylesheet" href="css/storestyle.css">';
  echo '<link rel="stylesheet" href="css/styles.css">';
navModule("Cinery | Browse Stores");
?>
        <main>
            <div class="main-a">
                <h1>New Products</h1>
            </div>
            <div class="main-div">
                <h1>Filter by alphabetical order</h1>
                <div class="pagination">
                <a href="#">A</a>
                <a href="#">B</a>
                <a href="#">C</a>
                <a href="#">D</a>
                <a href="#">...</a>
                <a href="#">Z</a>
                </div>
              </div>
            <div class="row">
                <div class="column">
                    <a href="products.html"><img src="media/tshirt.jpg" alt="Details"></a>
                    <a href="products.html"><h2>T-Shirt</h2></a>
                    <p class="price">$1.23</p>
                </div>
                <div class="column">
                    <a href="products.html"><img src="media/shoes.jpg" alt="Details"></a>
                    <a href="products.html"><h2>Shoes</h2></a>
                    <p class="price">$1.45</p>
                </div>
                <div class="column">
                    <a href="products.html"><img src="media/shirt.jpg" alt="Details"></a>
                    <a href="products.html"><h2>Shirt</h2></a>
                    <p class="price">$1.56</p>
                </div>
                <div class="column">
                    <a href="products.html"><img src="media/shoes1.jpg" alt="Details"></a>
                    <a href="products.html"><h2>Shoes</h2></a>
                    <p class="price">$1.67</p>
                </div>
            </div>
            <div class="main-b">
                <h1>Featured Products</h1>
            </div>
            <div class="row">
                <div class="column">
                    <a href="products.html"><img src="media/shoes3.jpg" alt="Details"></a>
                    <a href="products.html"><h2>Shoes</h2></a>
                    <p class="price">$1.23</p>
                </div>
                <div class="column">
                    <a href="products.html"><img src="media/shoes2.jpg" alt="Details"></a>
                    <a href="products.html"><h2>Shoes</h2></a>
                    <p class="price">$1.45</p>
                </div>
                <div class="column">
                    <a href="products.html"><img src="media/shoes4.jpg" alt="Details"></a>
                    <a href="products.html"><h2>Shoes</h2></a>
                    <p class="price">$1.56</p>
                </div>
                <div class="column">
                    <a href="products.html"><img src="media/shoes5.jpg" alt="Details"></a>
                    <a href="products.html"><h2>Shoes</h2></a>
                    <p class="price">$1.67</p>
                </div>
    
            </div>
        </main>

<?php
// footer, edit in 'modules/footer.php'
endModule();
?>

</html> 
