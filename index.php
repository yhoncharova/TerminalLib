<?php

require_once __DIR__. '/vendor/autoload.php';

use TerminalLib\Terminal;

$prices = [ ['code' => 'ZA', 'count' => 1, 'price' => 2.00]
            , ['code' => 'ZA', 'count' => 4, 'price' => 7.00]
            , ['code' => 'FC', 'count' => 1, 'price' => 1.25]
            , ['code' => 'YB', 'count' => 1, 'price' => 12.00]
            , ['code' => 'FC', 'count' => 6, 'price' => 6]
            , ['code' => 'GD', 'count' => 1, 'price' => 0.15]
          ];

//$codesToScan  = ['ZA','YB','FC','GD','ZA','YB','ZA','ZA'];
//$codesToScan  = ['FC','FC','FC','FC','FC','FC','FC'];
$codesToScan  = ['ZA', 'YB', 'FC', 'GD', 'AA'];

$terminal = new Terminal();

foreach ($prices as $price) {
    $terminal->setPricing($price['code'], $price['count'], $price['price']);
}

foreach ($codesToScan as $code) {
    $terminal->scanCode($code);
}


$res = $terminal->getTotal();
print_r($res);