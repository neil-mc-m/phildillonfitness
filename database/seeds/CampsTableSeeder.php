<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Seed class to add a camp to the database 
 */
class CampsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camps')->insert([
            'name' => 'get fit for the new year',
            'duration' => '8',
            'price' => '450',
            'feature_1' => 'weekly body fat and weight measurements',
            'feature_2' => 'weekly guidance and nutritional advice',
            'active' => '1'
        ]);
    }
}
