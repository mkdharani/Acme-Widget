<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('header.php');
require 'vendor/autoload.php';
require 'Helper/functions.php';

use Acme\Catalog;
use Acme\Basket;
use Acme\Product;
use Acme\DeliveryLayer;
use Acme\HalfPriceRedWidgetOffer;



function processsExample(array $items): array {
    $productsArr = allProducts();
    
    // printit($productsArr, '$productsArr');

    // function start | can move this par to a ffunction 
    $catalog = new Catalog($productsArr);
    $offers = [new HalfPriceRedWidgetOffer()];
    $deliveryLayer = new DeliveryLayer();

    $basket = new Basket($catalog, $deliveryLayer, $offers);

    $labels = [];
    foreach ($items as $code) {
        $labels[] = $code;
        $basket->add($code);
    }
    $finalLabel = count($labels) ? implode(' | ', $labels) : '-- No products -- ';
    $total = number_format($basket->total(), 2) ;

    return [
        'product' => $finalLabel,
        'total' => $total
    ];

}

/*
    Please the products as needed
*/


$productOutput[] = processsExample(['B01', 'G01']);
$productOutput[] = processsExample(['R01', 'R01']);
$productOutput[] = processsExample(['R01', 'G01']);
$productOutput[] = processsExample(['B01', 'B01', 'R01', 'R01', 'R01']);


if(is_array($productOutput) && count($productOutput)){
    foreach($productOutput as $productNum => $product){
        printit($productOutput, '$productOutput');

    }
}else{
    echo '<div class="p-3 rounded-2" style="background-color: var(--bs-warning-bg-subtle)">
        No product found.
    </div>';
}
?>



<?php
require('footer.php');