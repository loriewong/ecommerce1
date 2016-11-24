<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert(['size' => 'S']);
        DB::table('attributes')->insert(['size' => 'M']);
        DB::table('attributes')->insert(['size' => 'L']);

    }
}
