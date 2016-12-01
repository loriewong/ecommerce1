<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */



    public function testExample()
    {
        $this->seeInDatabase('products', ['productId' => '1']);

        $this->seeInDatabase('attributes', ['attributeId' => '1','size' => 'S']);
    }
}
