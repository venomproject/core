<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSliderTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('sliders', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('filename');
			$table->text('description')->nullable();
			$table->integer('position')->default(0);
			$table->integer('languages_id')->unsigned()->default(1);
			$table->foreign('languages_id')->references('id')->on('languages');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('sliders');
	}
}
