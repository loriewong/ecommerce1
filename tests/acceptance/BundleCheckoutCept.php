<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage('/clearlocalstorage'); //clear shopping cart

$I->am('New customer');
$I->wantTo('Add bundle to cart');
$I->amOnPage('/bundle/3');
$I->see('Pokemon Set 3+4');
$I->click('Add to cart');
$I->wait(0.5);
$I->see('Please select all product options before adding to cart');

$I->selectOption(".//*[@id='selectProductId3']", 'L');
$I->click("Add to cart");
$I->wait(0.5);
$I->see('Please select all product options before adding to cart');

$I->selectOption(".//*[@id='selectProductId4']", 'M');
$I->click("Add to cart");
$I->wait(0.5);

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
$I->wait(10);
$I->see('Order received!');