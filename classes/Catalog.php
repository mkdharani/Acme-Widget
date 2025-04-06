<?php

namespace Acme;


class Catalog
{
    private $products; 

    public function __construct() {

        // foreach($products as $product){
        //     $this->products[$product->code] = $product;
        // }

        $this->products = [
            new Product('Red Widget', 'R01', 32.95),
            new Product('Green Widget', 'G01', 24.95),
            new Product('Blue Widget', 'B01', 7.95),
        ];

    }

    public function get(string $code): ?Product
    {
        // printit($this->products, '$this->products');
        foreach ($this->products as $product) {
            if ($product->code === $code) {
                return $product;
            }
        }

        return null;
    }
}
