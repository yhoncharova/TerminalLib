<?php


namespace TerminalLib;


class Basket
{
    /**
     * @var Collection
     */
    private $products;

    /**
     * Create a new Basket
     *
     * @return void
     */
    public function __construct()
    {
        $this->products = new Collection();
    }

    /**
     * Get the products from the Basket
     *
     * @return Collection
     */
    public function products(): Collection
    {
        return $this->products;
    }

    /**
     * Get a product from the Basket
     *
     * @param string $code
     * @return Product
     */
    public function get(string $code): Product
    {
        return $this->products->get($code);
    }

    /**
     * Add a product to the Basket
     *
     * @param string $code
     * @return void
     */
    public function add(string $code)
    {
        if (!$this->products->has($code)) {
            $this->insertProduct($code);
        } else {
            $this->updateProduct($code);
        }
    }

    /**
     * @param string $code
     */
    private function insertProduct(string $code)
    {
        $this->products->add($code, new Product($code));
    }

    /**
     * @param string $code
     */
    private function updateProduct(string $code)
    {
        $this->products->get($code)->increaseQuantity();
    }

    /**
     * Count the products in the basket
     *
     * @return int
     */
    public function count()
    {
        return $this->products->count();
    }

}