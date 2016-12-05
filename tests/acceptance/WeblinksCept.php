<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage('/clearlocalstorage'); //clear shopping cart
$I->am('New customer'); 
$I->wantTo('view homepage'); 
$I->amOnPage('/');
$I->see('Features/Implementations'); 
$I->seeCurrentUrlEquals('/');

$I->wantTo('view products');
$I->click('Products');
$I->seeCurrentUrlEquals('/products');

$I->wantTo('view a product');
$I->see('Pokemon Set 5');
$I->click('View'); //clicks on first product
$I->see('Pokemon Set 1');
$I->seeCurrentUrlEquals('/product/1'); //first product link

$I->wantto('go to checkout');
$I->click('(//a[contains(text(),"Checkout")])[2]');
$I->see('Customer Information');
$I->seeCurrentUrlEquals('/checkout');

$I->wantTo('view bundles');
$I->click('Bundles');
$I->see('Pokemon Set 4+5');
$I->seeCurrentUrlEquals('/bundles');

$I->wantTo('view a bundle');
$I->click('View'); //clicks on first product
$I->see('Pokemon Set 1+2');
$I->seeCurrentUrlEquals('/bundle/1');

$I->wantTo('view the shopping cart');
$I->click('#checkouticon');
$I->wait(1); 
$I->see('Shopping Cart');
$I->click('Close');
$I->seeCurrentUrlEquals('/bundle/1');