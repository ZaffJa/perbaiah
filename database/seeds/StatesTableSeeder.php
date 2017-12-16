<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = ['Selangor', 'Johor', 'Sabah', 'Sarawak', 'Perak', 'Kedah', 'Kuala Lumpur', 
        'Pulau Pinang',' Kelantan', 'Pahang', 'Terengganu',' Negeri Sembilan', 'Melaka', 
        'Perlis','Labuan', 'Putrajaya'];

        foreach($states as $state) {
            DB::table('states')->insert([
                'name' => $state
            ]);
        }
    }
}
