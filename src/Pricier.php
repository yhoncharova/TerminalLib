<?php


namespace TerminalLib;


use mysql_xdevapi\Exception;

class Pricier
{
    /**
     * @var Collection
     */
    private $data;

    /**
     * Create a new Pricer
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = new Collection();
    }

    /**
     * @param string $code
     * @param int $quantity
     * @param float $price
     */
    public function add(string $code, int $quantity, float $price)
    {
        $price = new Price($quantity, $price);

        if (!$this->data->has($code)) {
            $prices = new Collection();
            $prices->add($price->quantity(), $price);
            $this->data->add($code, $prices);
        } else {
            $this->data->get($code)->add($price->quantity(), $price);
        }
    }

    /**
     * @param Product $product
     * @return float
     * @throws \Exception
     */
    public function getPrice(Product $product)
    {
        try {
            if ($prices = $this->data->get($product->code())) {
                $prices->sort('krsort');
                $totalPrice = 0.0;
                $quantity = $product->quantity();

                while ($quantity > 0) {
                    foreach ($prices as $price) {
                        $priceQuantity = $price->quantity();
                        if ($priceQuantity <= $quantity) {
                            $totalPrice += $price->value();
                            $quantity -= $priceQuantity;
                            break;
                        }
                    }
                }

                return $totalPrice;
            }

            throw new \UnexpectedValueException("There no price(s) found for product with code: " . $product->code() . " in Pricier.");

        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }

}