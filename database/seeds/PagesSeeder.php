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
		$faker = Faker::create ('pl_PL');
		
		foreach ( range ( 1, 10 ) as $index ) {
			DB::table ( 'pages' )->insert ( [ 
					'name' => $faker->name,
					'short_description' => $faker->realText(rand(20,20)),
					'description' => $faker->realText(rand(20,20)),
					'seo' => Illuminate\Support\Str::slug ( $faker->name )
					//'public_date' => date($format = 'd-m-Y', $max = 'now'),
					//'create_date' => date($format = 'd-m-Y', 'now'),
			] );
		}
	}
}