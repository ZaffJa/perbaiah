<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDependentsTable extends Migration {

	public function up()
	{
		Schema::create('dependents', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('nama', 200);
			$table->string('tarikh_lahir', 200);
			$table->string('no_kp');
			$table->string('hubungan', 65);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('dependents');
	}
}