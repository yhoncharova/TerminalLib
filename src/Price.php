<?php


namespace TerminalLib;


class Price
{
    /**
     * @var int
     */
    private $quantity;
    /**
     * @var float
     */
    private $value;

    /**
     * Create a new Price
     *
     * @param int $quantity
     * @param float $value
     */
    public function __construct(int $quantity, float $value)
    {
        $this->quantity = $quantity;
        $this->value    = $value;
    }

    /**
     * @return int
     */
    public function quantity() {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function value() {
        return $this->value;
    }

}