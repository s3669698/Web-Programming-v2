<?php
$fp = fopen("csv/products.csv", "r");
flock($fp, LOCK_SH);
$headings = fgetcsv($fp);
while ($aLineOfCells = fgetcsv($fp)) {
  $records[] = $aLineOfCells;
}
flock($fp, LOCK_UN);
fclose($fp);

$arr=array();
$row = -1;
if (($handle = fopen("csv/products.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        if ($featured_in_store = true){

        }
        $row++;
        for ($c = 0; $c < $num; $c++) {
            $arr[$row][$c]= $data[$c];
        }
    }
    fclose($handle);
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/storestyle.css">
    <title>Category</title>
</head>
<body>
    <header>
        <div class="navbar">
            <a href="products.php">HOME</a>
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
        <div class="main-a">
            <h1>New Products</h1>
        </div>
        <div class="row">
            <div class="column">
                <a href="products.php"><img src="media/shoes.jpg" alt="Details"></a>
                <a href="products.php"><h2>Shoes</h2></a>
                <p> New Tech </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.45</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="media/shoes1.jpg" alt="Details"></a>
                <a href="products.php"><h2>T-Shirt</h2></a>
                <p> Carbon Fiber</p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.23</p>
            </div>
            <div class="column">
                <a href="products1.php"><img src="media/shoes2.jpg" alt="Details"></a>
                <a href="products1.php"><h2>Shoes</h2></a>
                <p> Flying </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.67</p>
            </div>
            <div class="column">
                <a href="products.php"><img src="media/shoes3.jpg" alt="Details"></a>
                <a href="products.php"><h2>Shirt</h2></a>
                <p> Waterproofs</p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.56</p>
            </div> 
        </div>
        <?php
        echo"        <div class='row'>";
        echo"            <div class='column'>";
        echo"                <a href='products.php'><img src={$records[0][0]} alt='Details'></a>";
        echo"                <a href='products.php'><h2>{$records[0][1]}</h2></a>";
        echo"                <p class='price'>{$records[0][2]}</p>";
        echo"            </div>";
        echo"            <div class='column'>";
        echo"                <a href='products.php'><img src={$records[1][0]} alt='Details'></a>";
        echo"                <a href='products.php'><h2>{$records[1][1]}</h2></a>";
        echo"                <p class='price'>{$records[1][2]}</p>";
        echo"            </div>";
        echo"            <div class='column'>";
        echo"                <a href='products.php'><img src={$records[2][0]} alt='Details'></a>";
        echo"                <a href='products.php'><h2>{$records[2][1]}</h2></a>";
        echo"                <p class='price'>{$records[2][2]}</p>";
        echo"            </div>";
        echo"            <div class='column'>";
        echo"                <a href='products.php'><img src={$records[3][0]} alt='Details'></a>";
        echo"                <a href='products.php'><h2>{$records[3][1]}</h2></a>";
        echo"                <p class='price'>{$records[3][2]}</p>";
        echo"            </div>";  
        echo"        </div>";
        ?>
        <div class="main-b">
            <h1>Featured Products</h1>
        </div>
        <div class="row"> 
            <div class="column">
                <a href="products1.php"><img src="media/shoes4.jpg" alt="Details" sizes="width:30%" ></a>
                <a href="products1.php"><h2>Shirt</h2></a>
                <p> Carbon Fiber</p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.56</p>
            </div>
            <div class="column">
                <a href="products1.php"><img src="media/shoes5.jpg" alt="Details"></a>
                <a href="products1.php"><h2>Shoes</h2></a>
                <p> Waterproofs</p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.67</p>
            </div>
            <div class="column">
                <a href="products1.php"><img src="media/shirt.jpg" alt="Details" sizes="width:30%" ></a>
                <a href="products1.php"><h2>Shoes</h2></a>
                <p> Flying </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.45</p>
            </div>
            <div class="column">
                <a href="products1.php"><img src="media/tshirt.jpg" alt="Details" sizes="width:30%" ></a>
                <a href="products1.php"><h2>T-Shirt</h2></a>
                <p> New Tech </p>
                <p> Release Date: 12/12/2012</p>
                <p class="price">$1.23</p>
            </div>
        </div>
        <?php
        echo"        <div class='row'>";
        echo"            <div class='column'>";
        echo"                <a href='products1.php'><img src={$records[4][0]} alt='Details'></a>";
        echo"                <a href='products1.php'><h2>{$records[4][1]}</h2></a>";
        echo"                <p class='price'>{$records[4][2]}</p>";
        echo"            </div>";
        echo"            <div class='column'>";
        echo"                <a href='products1.php'><img src={$records[5][0]} alt='Details'></a>";
        echo"                <a href='products1.php'><h2>{$records[5][1]}</h2></a>";
        echo"                <p class='price'>{$records[5][2]}</p>";
        echo"            </div>";
        echo"            <div class='column'>";
        echo"                <a href='products1.php'><img src={$records[6][0]} alt='Details'></a>";
        echo"                <a href='products1.php'><h2>{$records[6][1]}</h2></a>";
        echo"                <p class='price'>{$records[6][2]}</p>";
        echo"            </div>";
        echo"            <div class='column'>";
        echo"                <a href='products1.php'><img src={$records[7][0]} alt='Details'></a>";
        echo"                <a href='products1.php'><h2>{$records[7][1]}</h2></a>";
        echo"                <p class='price'>{$records[7][2]}</p>";
        echo"            </div>";
        echo"        </div>";  
        ?>
    </main>
    <footer>
        <div class="navbar-2">
            <a href="copyright.php">Copyright</a>
            <a href="tos.php">Term Of Service</a>
            <a href="pp.php">Privacy Policy</a>
        </div>
    </footer>
</body>
</html>


