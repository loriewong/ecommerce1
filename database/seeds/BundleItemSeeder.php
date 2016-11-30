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
        DB::table('bundle_items')->insert(['bundleId' => 1,'productId' => 1,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 1,'productId' => 1,'attributeId' => 3]);
        DB::table('bundle_items')->insert(['bundleId' => 1,'productId' => 2,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 1,'productId' => 2,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 1,'productId' => 2,'attributeId' => 3]);

        DB::table('bundle_items')->insert(['bundleId' => 2,'productId' => 2,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 2,'productId' => 2,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 2,'productId' => 2,'attributeId' => 3]);
        DB::table('bundle_items')->insert(['bundleId' => 2,'productId' => 3,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 2,'productId' => 3,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 2,'productId' => 3,'attributeId' => 3]);

        DB::table('bundle_items')->insert(['bundleId' => 3,'productId' => 3,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 3,'productId' => 3,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 3,'productId' => 3,'attributeId' => 3]);
        DB::table('bundle_items')->insert(['bundleId' => 3,'productId' => 4,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 3,'productId' => 4,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 3,'productId' => 4,'attributeId' => 3]);

        DB::table('bundle_items')->insert(['bundleId' => 4,'productId' => 4,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 4,'productId' => 4,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 4,'productId' => 4,'attributeId' => 3]);
        DB::table('bundle_items')->insert(['bundleId' => 4,'productId' => 5,'attributeId' => 1]);
        DB::table('bundle_items')->insert(['bundleId' => 4,'productId' => 5,'attributeId' => 2]);
        DB::table('bundle_items')->insert(['bundleId' => 4,'productId' => 5,'attributeId' => 3]);


    }
}
