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
        'price' => 4.99,
        'name' => "small poke mario set",
        'description' => "this is a set that includes small of pokemon and small of mario",
        'image' => 'https://img0.etsystatic.com/065/0/10924417/il_570xN.759304632_oe9p.jpg']);
      DB::table('bundles')->insert([
        'price' => 8.99,
        'name' => "large poke mario set",
        'description' => "this is a set that includes LARGE of pokemon and LARGE of mario",
        'image' => 'https://img1.etsystatic.com/123/0/10924417/il_570xN.1050131725_4dj6.jpg']);

    }
}
