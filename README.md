# Terminal Library

**Set prices for products, scan products and get calculated total price**

##Requirements
The Terminal library has the following requirements:

PHP 7.3+
PHPUnit ^6.5

## Installation

Using [composer](https://packagist.org/packages/yhoncharova/terminal):

```bash
$ composer require yhoncharova/terminal
```

## Terminal 
Create an instance:
```php
$terminal = new Terminal();
```
Set prices for products:
```php
$code = 'AZ';
$quantity = 1;
$price = 2.00;
$terminal->setPricing($code, $quantity, $price);
```
Scan products:
```php
$terminal->scanCode('AZ');
```
Get calculated total price for scanned products:
```php
$terminal->getTotal();
```

## Price
Price for unit volume of products. To create Price object, pass quantity as integer and price as float.
```php
$price = new Price(2, 17.25);
```

##Product
Each item of the basket is encapsulated as an instance of `Product`. 

The `Product` class contains the current state of the each item in the basket. 

To create a new `Product`, pass the product's `code`, `quantity`. Quantity will be set automatically to 1, if no value passed into constructor.
```php
$code  = '1';
$quantity = 2;
$product = new Product($code, $quantity);
```
To increase `quantity`, use `increaseQuantity` method.
```php
$product->increaseQuantity();  // increment `quantity`
$product->increaseQuantity(3); // increase `quantity` by 2 items
```
The `code` should not be changed once the `Product` is created and so there is no setter method for the property on the object.

##Pricier
Collection of Product codes which are linked to collection of their Price objects. 
To fill Pricier with product prices:
```php
$pricier = new Pricier();
$pricier->add($code, $quantity, $price);
$pricier->add($code, $quantity, $price);
```
To get price of particular product:
```php
$pricier->getPrice($product);
```

##Basket
The Basket object manages the adding of products into basket.

To create a new `Basket` instance:
```php
$basket = new Basket();
```

The `Basket` will create a new `Collection` instance in constructor to encapsulate manage the Product instances in basket.

Get the count of the products:
```php
$basket->count();
```
Get a product from the basket via it's `code`:
```php
$product = $basket->get('AZ');
```

To add a product to the basket, pass the `code` to `add` method. If product with the `code` already exists in the basket, then `quantity` will be incremented.
```php
$code  = 'AZ';
$basket->add($code);
```


Thanks for using :)

