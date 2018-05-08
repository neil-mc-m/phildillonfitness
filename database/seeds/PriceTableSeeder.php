<?php

use Illuminate\Database\Seeder;

class PriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert(array(
            'price' => '35',
            'type' => 'solo',
            'bulk' => '180 for 6'
        ));
    }
}
