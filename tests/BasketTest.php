<?php

declare(strict_types=1);

namespace TerminalLib\Tests;

use PHPUnit\Framework\TestCase;
use TerminalLib\Basket;
use TerminalLib\Product;
use TerminalLib\Collection;

class BasketTest extends TestCase
{
    /** @var Basket */
    private $basket;

    public function setUp()
    {
        $code  = 'ZA';
        $this->basket = new Basket();
        $this->basket->add($code);
    }


    /** @test */
    public function testProductsCollection()
    {
        $this->assertInstanceOf(Collection::class, $this->basket->products());
    }

    /** @test */
    public function testCountProducts()
    {
        $this->assertEquals(1, $this->basket->count());
    }

    /** @test */
    public function testGetPoduct()
    {
        $this->assertInstanceOf(Product::class, $this->basket->get('ZA'));
    }

    /** @test */
    public function testAddProduct()
    {
        $this->basket->add('YB');

        $this->assertEquals(2, $this->basket->count());
    }

    /** @test */
    public function testIncreaseProductQuantity()
    {
        $product = $this->basket->get('ZA');
        $product->increaseQuantity();
        $product->increaseQuantity(2);

        $this->assertEquals(4, $product->quantity());
    }
}