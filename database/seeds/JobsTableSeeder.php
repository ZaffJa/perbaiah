<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = ['Penaung', 'Presiden', 'Timbalan Presiden', 'Naib Presiden I', 'Naib Presiden II',' Naib Presiden III', 'Setiausaha Agung', 'Setiausaha Kerja',
    'Bendahari Kehormat', 'Ketua Penerangan', 'Penasihat Undang-undang', 'Ahli Majlis', 'Juru Audit', 'Ahli Biasa'];

        foreach($states as $state) {
            DB::table('jobs')->insert([
                'name' => $state
            ]);
        }
    }
}
