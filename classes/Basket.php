<?php

namespace Acme;


class Basket{

    private Catalog $catalog;
    private DeliveryLayerInterface $deliveryLayer;
    private array $offers;
    private array $items;

    public function __construct(Catalog $catalog, DeliveryLayerInterface $deliveryLayer, array $offers)
    {
        $this->catalog = $catalog;
        $this->deliveryLayer = $deliveryLayer;
        $this->offers = $offers;
    }


    public function add(string $productCode) : void {
        $product = $this->catalog->get($productCode);
        // printit($product,' $product');
        $this->items[] = $product;

        
    }


    public function total() : float {
        $subTotal = array_sum(array_map(fn($p) => $p->price, $this->items));
    
        $discountApplied = array_sum(array_map(fn($offers) => $offers->apply($this->items), $this->offers));
        
        $deliveryApplied = $this->deliveryLayer->calcuate($subTotal - $discountApplied);
    
        return round($subTotal - $discountApplied + $deliveryApplied, 2);
    }
    

    public function totalXX() : float {
        $subTotal = array_sum(array_map(fn($p) => $p->price, $this->items));

        // printit($this->items, 'items');
        // printit($subTotal, 'subTotal');

        $discountApplied = array_sum(array_map(fn($offers) => $offers->apply($this->items), $this->offers));
        $deliveryApplied = $this->deliveryLayer->calcuate($subTotal - $discountApplied);


        // echo '$subTotal: '.$subTotal.' discountApplied: '.$discountApplied.' deliveryApplied: '.$deliveryApplied; die;

        return round($subTotal - $discountApplied + $deliveryApplied, 2);
    }

}
