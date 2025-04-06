# Acme-Widget

This is a simple proof-of-concept for Acme Widget Co's new sales system. The basket calculates totals based on product pricing, delivery charges, and special offers.


## How it works

- Three products are available (Red, Green, and Blue widgets), each with a fixed price.
- Delivery cost depends on the basket total:
  - Under $50: $4.95
  - Under $90: $2.95
  - $90 and over: Free delivery
- A special offer is applied: **Buy one red widget (R01), get the second half price**.

The basket takes a product catalog, delivery rules, and available offers when it's initialized. Products can be added by code, and the `total()` method calculates the final price including discounts and delivery.


## Getting Started

clone this repo, and index will show you example and output of

$productOutput[] = processsExample(['B01', 'G01']);
$productOutput[] = processsExample(['R01', 'R01']);
$productOutput[] = processsExample(['R01', 'G01']);
$productOutput[] = processsExample(['B01', 'B01', 'R01', 'R01', 'R01']);