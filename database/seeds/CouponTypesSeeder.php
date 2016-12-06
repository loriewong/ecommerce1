<?php

use Illuminate\Database\Seeder;

class CouponTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupon_types')->insert(['description' => 'Single']);
        DB::table('coupon_types')->insert(['description' => 'Multiple']);
        DB::table('coupon_types')->insert(['description' => 'All']);
    }
}
