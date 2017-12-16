<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		$this->call([
			TitlesTableSeeder::class,
			JobsTableSeeder::class,
			StatesTableSeeder::class,
			UsersTableSeeder::class
		]);
	}
}