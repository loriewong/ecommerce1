<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestLinks extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function TestLinks()
    {
         $this->visit('/')
              ->click('Shop')
              ->seePageIs('shop')
              ->click('Bundles')
              ->seePageIs('/bundles');
    }
}
