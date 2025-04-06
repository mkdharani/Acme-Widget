<?php

namespace Acme;

class HalfPriceRedWidgetOffer implements OfferInterface
{
    private string $productCode = 'R01';

    public function apply(array $items): float
    {
        $r01Items = array_values(array_filter($items, function (Product $product) {
            return $product->getCode() === $this->productCode;
        }));

        $count = count($r01Items);
        $halfPriceCount = intdiv($count, 2);

        if ($halfPriceCount === 0) {
            return 0.0;
        }

        $price = $r01Items[0]->getPrice();
        // printit($price, '$pruce');

        return $halfPriceCount * ($price / 2);
    }
}
