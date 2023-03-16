<?php

function read_all_products() {
    $file_name = 'csv/products.csv';
    if (file_exists($file_name)){
        $fp = fopen($file_name, 'r');
        $first = fgetcsv($fp);
        $products = [];
        while ($row = fgetcsv($fp)) {
            $i = 0;
            $product = [];
            foreach ($first as $col_name) {
                $product[$col_name] = $row[$i];
                $i++;
            }
            $products[] = $product;
        }
        return $products;
    }    
}

function get_product($product_id) {
    $products = read_all_products();
    foreach ($products as $p) {
        if ($p['id'] == $product_id) {
            return $p;
        }
    }
    return false;
}
?>
