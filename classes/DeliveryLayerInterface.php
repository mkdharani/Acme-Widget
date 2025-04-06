<?php

namespace Acme;


interface DeliveryLayerInterface
{
    public function calcuate(float $subTotal): float;
}
