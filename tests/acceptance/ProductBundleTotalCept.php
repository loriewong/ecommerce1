<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage('/clearlocalstorage'); //clear shopping cart

$I->am('New customer'); 
$I->wantTo('Add product to cart'); 
$I->amOnPage('/product/3');
$I->selectOption("select", 'M'); //$2
$I->click("Add to cart");
$I->selectOption("select", 'L'); //$3
$I->click("Add to cart");

$I->amOnPage('/product/5');
$I->selectOption("select", 'L'); //$9.5
$I->click("Add to cart");
$I->click("Add to cart"); //x2

$I->amOnPage('/bundle/3'); //$8.21
$I->selectOption(".//*[@id='selectProductId3']", 'L');
$I->selectOption(".//*[@id='selectProductId4']", 'M');
$I->click("Add to cart");
$I->click("Add to cart"); //x2

$I->amOnPage('/checkout');
$I->see('$40.42');