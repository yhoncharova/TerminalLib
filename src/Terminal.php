<?php

namespace TerminalLib;

class Terminal
{
    private $pricier;
    private $basket;

    const DEFAULT_PRICE_PRESISION = 2;

    public function __construct()
    {
        $this->pricier = new Pricier();
        $this->basket = new Basket();
    }

    /**
     * @param string $code
     * @param int $quantity
     * @param float $price
     * @return void
     */
    public function setPricing(string $code, int $quantity, float $price)
    {
        try {
            if (empty($code)) {
                throw new \RangeException("Product code can not be empty");
            }

            if (empty($quantity) || $quantity <= 0) {
                throw new \RangeException("Quantity can not be empty and less than 0.");
            }

            if (empty($price) || $price <= 0) {
                throw new \RangeException("Price can not be empty and less than 0.");
            }

            $this->pricier->add($code, $quantity, $price);
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }

    /**
     * @param string $code
     * @return void
     */
    public function scanCode(string $code)
    {
        try {
            if(empty($code)) {
                throw new \RangeException("Product code can not be empty");
            }

            $this->basket->add($code);
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }

    /**
     * @return float
     */
    public function getTotal():float
    {
        try {
            $total = 0.0;

            foreach ($this->basket->products() as $product) {
                $total += $this->pricier->getPrice($product);
            }

            return round($total, self::DEFAULT_PRICE_PRESISION);
        } catch (\Exception $e) {
            echo $e->getMessage() . "\n";
        }
    }

}