<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                'name' => 'Super Mario Bros 3 Forms',
                'description' => 'Handmade with quality Perler beads, place these Marios anywhere to remind yourself that youre never too old to grow up.',
                'image' => 'https://img0.etsystatic.com/059/0/10924417/il_570xN.759304652_l91m.jpg'
            ]
        );
        DB::table('products')->insert([
                'name' => 'Pokemon Gen 1 #86-91',
                'description' => 'Handmade with quality Perler beads, place these Marios anywhere to remind yourself that youre never too old to grow up.',
                'image' => 'https://img1.etsystatic.com/141/0/10924417/il_570xN.1134424161_g20e.jpg'
            ]
        );
    }
}
