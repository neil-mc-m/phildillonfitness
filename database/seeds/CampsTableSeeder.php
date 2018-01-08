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
            'name' => 'get fit for christmas',
            'duration' => '8',
            'price' => '450',
            'feature_1' => '2 x personal training sessions per week',
            'feature_2' => 'guidance on additional training for the week',
            'active' => '1'
        ]);
    }
}
