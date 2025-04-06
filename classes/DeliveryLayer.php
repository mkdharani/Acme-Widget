<?php

namespace Acme;


class DeliveryLayer implements DeliveryLayerInterface
{

    public function calcuate(float $subTotal): float
    {
        $deliveryAmount = 0.0;

        if ($subTotal < 50) {
            $deliveryAmount = 4.95;
        } elseif ($subTotal < 90) {
            $deliveryAmount = 2.95;
        }

        return $deliveryAmount;
    }
}
