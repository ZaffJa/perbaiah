<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatsTable extends Migration {

	public function up()
	{
		Schema::create('chats', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('sender_id')->unsigned();
			$table->integer('receiver_id')->unsigned();
			$table->text('content');
			$table->tinyInteger('read')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('chats');
	}
}