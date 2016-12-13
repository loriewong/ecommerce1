<?php

use Illuminate\Database\Seeder;

class BundlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('bundles')->insert([
        'price' => 6.99,
        'name' => "Pokemon Set 1+2",
        'description' => "Any size of set1 and set2",
        'image' => '/img/il_570xN.992662922_h0s7.jpg']);
      DB::table('bundles')->insert([
        'price' => 7.99,
        'name' => "Pokemon Set 2+3",
        'description' => "Any size of set2 and set3",
        'image' => '/img/il_570xN.1050131725_4dj6.jpg']);
      DB::table('bundles')->insert([
        'price' => 8.21,
        'name' => "Pokemon Set 3+4",
        'description' => "Any size of set3 and set4",
        'image' => '/img/il_570xN.1007724873_tmic.jpg']);
      DB::table('bundles')->insert([
        'price' => 5.29,
        'name' => "Pokemon Set 4+5",
        'description' => "Any size of set4 and set5",
        'image' => '/img/il_570xN.1022946671_kbul.jpg']);

    }
}
