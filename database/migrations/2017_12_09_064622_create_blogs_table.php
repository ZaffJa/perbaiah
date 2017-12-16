<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration {

	public function up()
	{
		Schema::create('blogs', function(Blueprint $table) {
			$table->increments('id');
			$table->text('name');
			$table->longText('content');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('blogs');
	}
}