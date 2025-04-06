<?php
namespace Acme;

class Product
{

    public $name;
    public $code; 
    public $price;

    public function __construct(string $name, string $code, float $price) {

        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
    }

    public function getName() : string{
        return $this->name;
    }

    public function getCode() : string{
        return $this->code;
    }

    public function getPrice() : float{
        return $this->price;
    }

}
