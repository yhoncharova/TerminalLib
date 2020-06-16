<?php


namespace TerminalLib;


class Product
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var int
     */
    private $quantity;

    const DEFAULT_QUANTITY_VALUE = 1;

    /**
     * Product constructor.
     * @param string $code
     * @param int $quantity
     */
    public function __construct(string $code, int $quantity = self::DEFAULT_QUANTITY_VALUE)
    {
        $this->code = $code;
        $this->quantity = $quantity;
    }

    /**
     * @param int $value
     * @return void
     */
    public function increaseQuantity(int $value = self::DEFAULT_QUANTITY_VALUE)
    {
        $this->quantity += $value;
    }

    /**
     * @return string
     */
    public function code()
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function quantity()
    {
        return $this->quantity;
    }

}