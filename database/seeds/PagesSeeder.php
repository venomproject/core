<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class PagesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$faker = Faker::create ();
		
		foreach ( range ( 1, 100 ) as $index ) {
			DB::table ( 'pages' )->insert ( [ 
					'name' => $faker->sentence ( 5 ),
					'short_description' => str_random ( 10 ) . '@gmail.com',
					'description' => '123' . str_random ( 10 ) 
			] );
		}
	}
}
