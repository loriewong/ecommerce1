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
              'price' => '4.00'
          ]
      );
      DB::table('product_attributes')->insert([
                    'productId' => '1',
                    'attributeId' => '2',
                    'price' => '5.00'
                ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '1',
              'attributeId' => '3',
              'price' => '6.00'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '2',
              'attributeId' => '1',
              'price' => '5.00'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '2',
              'attributeId' => '2',
              'price' => '6.00'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '2',
              'attributeId' => '3',
              'price' => '7.00'
          ]
      );


      DB::table('product_attributes')->insert([
              'productId' => '3',
              'attributeId' => '1',
              'price' => '1.00'
          ]
      );
      DB::table('product_attributes')->insert([
                    'productId' => '3',
                    'attributeId' => '2',
                    'price' => '2.00'
                ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '3',
              'attributeId' => '3',
              'price' => '3.00'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '4',
              'attributeId' => '1',
              'price' => '7.00'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '4',
              'attributeId' => '2',
              'price' => '8.00'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '4',
              'attributeId' => '3',
              'price' => '9.00'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '5',
              'attributeId' => '1',
              'price' => '7.50'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '5',
              'attributeId' => '2',
              'price' => '8.50'
          ]
      );
      DB::table('product_attributes')->insert([
              'productId' => '5',
              'attributeId' => '3',
              'price' => '9.50'
          ]
      );
    }
}
