<?php


$I = new AcceptanceTester($scenario);
$I->am('user'); // actor's role
$I->wantTo('view homepage'); // feature to test
$I->amOnPage('/');
$I->see('blog'); // replace this with something on your homepage
$I->amOnPage('/');
$I->wantTo('view products');
$I->click('Products');
$I->amOnPage('/products');


$I->wantTo('view a product');
$I->click('View');
$I->amOnPage('/product/1');

$I->see('add to cart');


$I->wantTo('add to cart');
$I->click('Add to cart');
$I->amOnPage('/product/1');


$I->wantto('view checkout');
//$I->click('checkoutmodal');
//$I->click('/checkout');
$I->click('(//a[contains(text(),"Checkout")])[2]');
$I->amOnPage('/checkout');
$I->see('your cart is empty');