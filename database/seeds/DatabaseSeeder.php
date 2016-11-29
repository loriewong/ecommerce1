<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductsTableSeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(ProductAttributesTableSeeder::class);
        $this->call(BundlesSeeder::class);
        $this->call(BundleItemSeeder::class);
    }
}