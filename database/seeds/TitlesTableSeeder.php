<?php

use Illuminate\Database\Seeder;

class TitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Abang Long', 'Abang Ngah', 'Ayahanda', 'Kekanda', 'Paduka Ayahanda','Paduka Tok Ayah', 'Ahli Biasa'];

        foreach($titles as $title) {
            DB::table('titles')->insert([
                'name' => $title
            ]);
        }
    }
}
