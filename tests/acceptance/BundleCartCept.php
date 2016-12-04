<?php
use \Codeception\Util\Locator;

$I = new AcceptanceTester($scenario);
$I->am('New customer'); // actor's role
$I->wantTo('Add bundle to cart'); // feature to test
$I->amOnPage('/bundle/3');
$I->see('Pokemon Set 3+4');
$I->click('Add to cart');
$I->wait(0.5);
$I->see('Please select all product options before adding to cart');

$I->selectOption(".//*[@id='selectProductId3']", 'L');
$I->click("Add to cart");
$I->wait(0.5);
$I->see('Please select all product options before adding to cart');

//Add 1st option S from dropdown 
$I->selectOption(".//*[@id='selectProductId4']", 'M');
$I->click("Add to cart");
$I->wait(0.5);
$I->see('Added to cart successfully');
$I->wait(1);
$I->wantTo('view the shopping cart');
$I->click('#checkouticon');
$I->wait(1); 
$I->see('$8.21');
$I->click('Close');

$I->wantTo('go to checkout');
$I->click('(//a[contains(text(),"Checkout")])[2]');
$I->seeCurrentUrlEquals('/checkout');
$I->see('$8.21');

$I->fillField('firstname', 'Lorie');
$I->fillField('lastname', 'Wong');
$I->fillField('email', 'loriewong@outlook.com');
$I->click('Submit');
$I->wait(7);
$I->see('Order received!');

/*
$I->wantTo('view the shopping cart');
$I->click('#checkoutModal');
$I->wait(0.5); 
$I->see('$8.21');
$I->click('Close');
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