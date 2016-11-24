<?php

use Illuminate\Database\Seeder;

class ProductAttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('product_attributes')->insert([
              'productId' => '1',
              'attributeId' => '1',
              'price' => '5.2'
          ]
      );
      DB::table('product_attributes')->insert([
                    'productId' => '1',
                    'attributeId' => '2',
                    'price' => '6.2'
                ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '1',
              'attributeId' => '3',
              'price' => '7.2'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '2',
              'attributeId' => '1',
              'price' => '8.2'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '2',
              'attributeId' => '2',
              'price' => '9.2'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '2',
              'attributeId' => '3',
              'price' => '15.2'
          ]
      );

    }
}
