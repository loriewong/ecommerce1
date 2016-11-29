<?php

use Illuminate\Database\Seeder;

class BundleItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bundle_items')->insert(['bundleId' => 1,'productId' => 1,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 1,'productId' => 1,'attributeId' => 1]);
    }
}
