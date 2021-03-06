<?php

$I = new AcceptanceTester($scenario);

$I->amOnPage('/clearlocalstorage'); //clear shopping cart
$I->am('New customer');
$I->wantTo('Add product to cart');
$I->amOnPage('/product/3');
$I->see('Pokemon Set 3');
$I->click('Add to cart');
$I->wait(0.5);
$I->see('Please select product option before adding to cart');

$I->selectOption("select", 'M');
$I->click("Add to cart");
$I->wait(0.5);
$I->see('Added to cart successfully');

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