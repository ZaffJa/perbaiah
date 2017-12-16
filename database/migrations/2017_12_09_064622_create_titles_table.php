<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTitlesTable extends Migration {

	public function up()
	{
		Schema::create('titles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 155);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('titles');
	}
}