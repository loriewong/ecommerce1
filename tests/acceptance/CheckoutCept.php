<?php

$I = new AcceptanceTester($scenario);
$I->amOnPage('/clearlocalstorage'); //clear shopping cart

$I->am('New customer'); // actor's role
$I->wantTo('Checkout'); // feature to test
$I->amOnPage('/checkout');
$I->click('Submit');
$I->see('Your cart is empty');

$I->wantTo('Add product to cart'); // feature to test
$I->amOnPage('/product/3');
$I->selectOption("select", 'M');
$I->click("Add to cart");
$I->amOnPage('/checkout');

$I->click('Submit');
$I->see('The first name field is required.');
$I->see('The last name field is required.');
$I->see('The email field is required.');


$I->fillField('firstname', 'Lorie');
$I->click('Submit');
$I->wait(0.5);
$I->dontSee('The first name field is required.');
$I->see('The last name field is required.');
$I->see('The email field is required.');

$I->fillField('lastname', 'Wong');
$I->click('Submit');
$I->wait(0.5);
$I->dontSee('The first name field is required.');
$I->dontSee('The last name field is required.');
$I->see('The email field is required.');

$I->fillField('email', 'test');
$I->click('Submit');
$I->wait(0.5);
$I->dontSee('The first name field is required.');
$I->dontSee('The last name field is required.');
$I->see('The email must be a valid email address.');

$I->fillField('email', 'loriewong@outlook.com');
$I->click('Submit');
$I->wait(10);
$I->dontSee('The first name field is required.');
$I->dontSee('The last name field is required.');
$I->dontSee('The email must be a valid email address.');
$I->see('Order received!');
