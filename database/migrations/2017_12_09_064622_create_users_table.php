<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nama', 200);
			$table->string('kata_laluan');
			$table->string('no_ahli')->nullable();
			$table->string('emel', 155)->nullable();
			$table->string('no_kp')->nullable();
			$table->text('alamat')->nullable();
			$table->string('no_tel')->nullable();
			$table->string('no_tel_rumah', 20)->nullable();
			$table->integer('title_id')->unsigned()->default('0');
			$table->integer('job_id')->unsigned()->default('0');
			$table->integer('state_id')->unsigned()->default('0');
			$table->text('gambar')->nullable();
			$table->date('tarikh_daftar', 50)->nullable();
			$table->tinyInteger('keputusan')->default('0');
			$table->smallInteger('gambar_ahli')->default('0');
			$table->smallInteger('serahan_sijil')->default('0');
			$table->smallInteger('serahan_kad_ahli')->default('0');
			$table->smallInteger('kad_ahli')->default('0');
			$table->smallInteger('yuran_kad_ahli')->default('0');
			$table->smallInteger('yuran_masuk')->default('0');
			$table->smallInteger('yuran_tabung_khairat')->default('0');
			$table->smallInteger('role')->default('2');
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}