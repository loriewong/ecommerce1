<?php

$I = new AcceptanceTester($scenario);
$I->am('New customer'); // actor's role
$I->wantTo('Add product to cart'); // feature to test
$I->amOnPage('/product/3');
$I->see('Pokemon Set 3');
$I->click('Add to cart');
$I->wait(0.5);
$I->see('Please select product option before adding to cart');

//Add 2nd option M from dropdown $5.00

$I->selectOption("select", 'M');
$I->click("Add to cart");
$I->wait(0.5);
$I->see('Added to cart successfully');

//Add 3rd option L from dropdown $6.00

$I->selectOption("select", 'L');
$I->click("Add to cart");
$I->wait(0.5);
$I->see('Added to cart successfully');
$I->wait(2);
$I->wantTo('view the shopping cart');
$I->click('#checkouticon');
$I->wait(1); 
$I->see('$5.00');
$I->click('Close');

$I->wantTo('go to checkout');
$I->click('(//a[contains(text(),"Checkout")])[2]');
$I->seeCurrentUrlEquals('/checkout');
$I->see('$5.00');

$I->fillField('firstname', 'Lorie');
$I->fillField('lastname', 'Wong');
$I->fillField('email', 'loriewong@outlook.com');
$I->click('Submit');
$I->wait(10);
$I->see('Order received!');


/*$I->amOnPage('/product/1'); //first product link

$I->wantto('go to checkout');
$I->click('(//a[contains(text(),"Checkout")])[2]');
$I->see('Customer Information');
$I->amOnPage('/checkout');

$I->wantTo('view bundles');
$I->click('Bundles');
$I->see('Pokemon Set 4+5');
$I->amOnPage('/bundles');

$I->wantTo('view a bundle');
$I->click('View'); //clicks on first product
$I->see('Pokemon Set 1+2');
$I->amOnPage('/bundle/1');

$I->wantTo('view the shopping cart');
$I->click('#checkoutModal');
$I->wait(1); 
$I->see('Shopping Cart');
$I->click('Close');
$I->amOnPage('/bundle/1');
*/

/*$I->wantTo('view a product');
$I->click('View');
$I->amOnPage('/product/1');

$I->see('add to cart');

$I->wantTo('add to cart');
$I->click('Add to cart');
//$I->see('Please select all product options before adding to cart.');
$I->amOnPage('/product/1');


$option = $I->grabTextFrom('select option:nth-child(2)');
$I->selectOption("select", $option);
$I->click("Add to cart");

$option = $I->grabTextFrom('select#my-element-id option:nth-child(2)');
$I->selectOption("select", $option);
$I->click("Submit");

$I->wantto('checkout');
//$I->click('checkoutmodal');
//$I->click('/checkout');
$I->click('(//a[contains(text(),"Checkout")])[2]');
$I->amOnPage('/checkout');
$I->see('Pokemon Set 1');
$I->see('5.00');*/