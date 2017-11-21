<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
            'feature_1' => '2 x personal traing sessions per week',
            'feature_2' => 'guidance on additional traing for the week'
        ]);
    }
}
