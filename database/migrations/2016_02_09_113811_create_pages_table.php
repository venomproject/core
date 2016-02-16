<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreatePagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create ( 'pages', function (Blueprint $table) {
			$table->increments ( 'id' );
			
			$table->string ( 'name' );
			$table->text ( 'short_description' )->nullable ();
			$table->text ( 'description' )->nullable ();
			$table->date ( 'public_date' );
			$table->date ( 'create_date' );
			$table->integer ( 'position' )->default ( 0 );
			$table->string ( 'seo' )->unique();
			$table->string ( 'meta_keywords' )->nullable ();
			$table->string ( 'meta_description' )->nullable ();
			$table->string ( 'meta_title' )->nullable ();
			$table->boolean ( 'show_home' )->default ( 0 );
			$table->boolean ( 'show_menu' )->default ( 0 );
			$table->boolean ( 'show_footer' )->default ( 0 );
			$table->boolean ( 'show_page' )->default ( 1 );
			$table->integer ( 'pages_id' )->unsigned ()->nullable ();
			$table->foreign ( 'pages_id' )->references ( 'id' )->on ( 'pages' );
			$table->integer ( 'users_id' )->unsigned ()->nullable ();
			$table->foreign ( 'users_id' )->references ( 'id' )->on ( 'users' );
			$table->integer ( 'languages_id' )->unsigned ()->default ( 1 );
			$table->foreign ( 'languages_id' )->references ( 'id' )->on ( 'languages' );
			
			$table->rememberToken ();
			$table->timestamps ();
		} );
		
		Schema::create ( 'files', function (Blueprint $table) {
			$table->increments ( 'id' );
			$table->string ( 'name' );
			$table->string ( 'file_name' );
			$table->integer ( 'position' )->default ( 0 );
			$table->boolean ( 'masterPhoto' )->default ( 0 );

			$table->integer ( 'pages_id' )->unsigned ();
			$table->foreign ( 'pages_id' )->references ( 'id' )->on ( 'pages' );
			$table->timestamps ();
		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop ( 'files' );
		Schema::drop ( 'pages' );
	}
}
