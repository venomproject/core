<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('iso_code', 3);
            $table->timestamps();
        });
		
		DB::insert('insert into languages (id, name, iso_code) values (?, ?, ?)', ['1', 'Polski', 'pl']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('languages');
    }
}
