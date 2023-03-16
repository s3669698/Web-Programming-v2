<?php
require_once 'modules/top.php';
require_once 'modules/footer.php';

session_start();

if (file_exists('install.php')){
    echo '<p style="font-size: 20px; text-align: center">PHP installation script detected. First-time setup required!</p>';
    echo '<p style="font-size: 20px; text-align: center">Redirecting to installation script in 5 seconds...</p>';
    header('refresh:5, url=install.php');
    die();
}

// top module, then manually specified stylesheets, then navbar module
// edit in 'modules/top.php'
topModule();  
  echo '<link rel="stylesheet" href="css/styles.css">';
navModule("Cinery | Online Shopping Mall");
?>
<?php
include 'phpClass/product_functions.php';
include 'phpClass/store_functions.php';

$products = read_all_products();
$stores = read_all_stores();

$count = 0;
$increase = 0;
$store = 0;
$product = 0;
?>

    <div class="mall">
        <img src="media/mall.png">
    </div>
    <br>
    <!-- featured stores -->
    <h2>New Stores</h2>
    <div class="container">
     <?php
            foreach ($stores as $s) {
                $id = $s['id'];
                $sname = $s['name'];
                echo " <div class=\"column\">
                <a href=\"$sname\"><img src=\"media/blanklogo.jpg\"></a>
                </div>
                ";
                $count++;
                if ($count == 10) {
                    break;
                    }
                }
        ?>
    </div>
<br>    
    <h2>New Products</h2>
    <div class="container">
        <?php
            foreach ($products as $p) {
                $id = $p['id'];
                $name = $p['name'];
                echo " <div class=\"column\">
                <a href=\"$name\"><img src=\"media/blanklogo.jpg\"></a>
                </div>";
                $increase++;
                if ($increase == 10) {
                    break;
                    }
                }
        ?>
    </div>
    <h2>Featured Stores</h2>
    <div class="container">
     <?php
            foreach ($stores as $s) {
                $id = $s['id'];
                $sname = $s['name'];
                echo " <div class=\"column\">
                <a href=\"$sname\"><img src=\"media/blanklogo.jpg\"></a>
                </div>
                ";
                $store++;
                if ($store == 10) {
                    break;
                    }
                }
        ?>
    </div>

    <h2>Featured Products</h2>
    <div class="container">
        <?php
            foreach ($products as $p) {
                $id = $p['id'];
                $name = $p['name'];
                echo " <div class=\"column\">
                <a href=\"$name\"><img src=\"media/blanklogo.jpg\"></a>
                </div>";
                $product++;
                if ($product == 10) {
                    break;
                    }
                }
        ?>
    </div>

<?php
// footer, edit in 'modules/footer.php'
endModule();
?>
<script src="js/carousel.js"></script>
<script src="js/account_redirect.js"></script>

</html>
