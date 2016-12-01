<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LinksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        //$this->assertTrue(true);
        $this->visit('/')
            ->click('Shop')
            ->seePageIs('shop')
            ->click('View')
            ->seePageIs('/product/1')
            ->click('Bundles')
            ->seePageIs('/bundles')
            ->click('View')
            ->seePageIs('/bundle/1')
            ->visit('/checkout')
            ->see('Order Summary')
            ->click('THE BEST SHOP')
            ->seePageIs('');
    }
}
