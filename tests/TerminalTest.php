<?php

declare(strict_types=1);

namespace TerminalLib\Tests;


use PHPUnit\Framework\TestCase;
use TerminalLib\Terminal;
use TerminalLib\Basket;

class TerminalTest extends TestCase
{
    /** @var Basket */
    private $terminal;

    public function setUp()
    {
        $prices = [ ['code' => 'ZA', 'count' => 1, 'price' => 2.00]
                  , ['code' => 'ZA', 'count' => 4, 'price' => 7.00]
                  , ['code' => 'FC', 'count' => 1, 'price' => 1.25]
                  , ['code' => 'YB', 'count' => 1, 'price' => 12.00]
                  , ['code' => 'FC', 'count' => 6, 'price' => 6]
                  , ['code' => 'GD', 'count' => 1, 'price' => 0.15]
                  ];

        $this->terminal = new Terminal();

        foreach ($prices as $price) {
            $this->terminal->setPricing($price['code'], $price['count'], $price['price']);
        }

    }

    /** @test
     * @param $expected
     * @param $codesToScan
     * @dataProvider totalPriceForListsOfProductCodes
     * @throws \Exception
     */
    public function testTotalPrice($expected, $codesToScan)
    {
        foreach ($codesToScan as $code) {
            $this->terminal->scanCode($code);
        }

        $this->assertEquals($expected, $this->terminal->getTotal());
    }

    /**
     * @return array
     */
    public function totalPriceForListsOfProductCodes()
    {
        return [
            [32.40, ['ZA','YB','FC','GD','ZA','YB','ZA','ZA']],
            [7.25, ['FC','FC','FC','FC','FC','FC','FC']],
            [15.40, ['ZA', 'YB', 'FC', 'GD']]
        ];
    }

}