<?php

use Acme\Product;

function printit($array, $die = NULL): void
{

    echo '<pre>';
    print_r($array);
    echo '</pre>';

    if($die){
        "<br> die here.. $die";
    }
}

function allProducts(){
    
    return [
        new Product('Red Widget', 'R01', 32.95),
        new Product('Green Widget', 'G01', 24.95),
        new Product('Blue Widget', 'B01', 7.95),
    ];
}

function createBasket() 
{
    // can move content here...
}

