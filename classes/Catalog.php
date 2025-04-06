<?php

namespace Acme;


class Catalog
{
    private $products; 

    public function __construct(array $products) {

        foreach($products as $product){
            $this->products[$product->code] = $product;
        }
    }

    public function get(string $code) : Product {

        // printit($code, '$code');
        // printit($this->products, '$this->products');

        if(!isset($this->products[$code])){
            throw new \InvalidArgumentException("Invaild product code: $code");
        }

        // return valid products only
        return $this->products[$code];
    }
}
