<?php

namespace Acme;

class HalfPriceRedWidgetOffer implements OfferInterface
{

    private string $productCode = 'R01';

    public function apply(array $items): float
    {
        $count = count(array_filter($items, fn(Product $p) => $p->code === $this->productCode));
        $discountAvailable = 0.0;

        if ($count > 1) {
            $foundProduct = current(array_filter($items, fn(Product $p) => $p->code === $this->productCode));
            $halfPriceQuantity = intdiv($count, 2);
            $discount = $halfPriceQuantity * ($foundProduct->price / 2);
        }

        return $discountAvailable;
    }
}
